<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BranchModel;
use App\Models\OrdersModel;
use App\Models\UserModel;

class OrdersController extends BaseController
{
    private function createMpdf(): \Mpdf\Mpdf
    {
        $tempDir = WRITEPATH . 'mpdf';
        if (!is_dir($tempDir)) {
            mkdir($tempDir, 0777, true);
        }

        return new \Mpdf\Mpdf([
            'tempDir' => $tempDir,
        ]);
    }

    public function index()
    {
        $branch = $this->getBranch();
        $search = $this->request->getGet('search');
        if ($search) {
            $orders = model('OrdersModel')->search($search, $branch);
            return view('orders/index', $orders);
        }
        $orders = model('OrdersModel')->getOrders(10, $branch);
        return view('orders/index', $orders);
    }

    private function getBranch(): ?string
    {
        if (session('position') === 'Admin') {
            return null; // null = no filter (admin sees all)
        }
        $branch = session('branch');
        return ($branch !== null && $branch !== '') ? $branch : '__none__';
    }


    public function create()
    {
        return view('orders/create');
    }

    public function store()
    {
        $user_id = session('user_id');
       if(! $this->validate([
           'customer' => 'required',
           'phone' => 'required',
           'order_type' => 'required',
           'budget' => 'required',
           'cost' => 'required',
           'expenses' => 'required',
       ])){
           return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
       }

       $validatedData = $this->validator->getValidated();

    //    dd($validatedData);

      
       $validatedData['budget'] = str_replace(',', '', $validatedData['budget']);
       $validatedData['cost'] = str_replace(',', '', $validatedData['cost']);

    //    dd($validatedData);

       model(OrdersModel::class)->save(['user_id' => $user_id, ...$validatedData]);

       
       return redirect()->back()->with('successcreate','Order added successfully');
    }

    public function edit($id)
    {
        $order = model(OrdersModel::class)->find($id);
        if (!$order) {
            return redirect()->to('/orders');
        }

        $branch = $this->getBranch();
        if ($branch !== null && $branch !== '__none__') {
            $owner = model(UserModel::class)->find($order->user_id);
            if (!$owner || $owner->branch !== $branch) {
                return redirect()->to('/orders')->with('errors', 'Unauthorized order access');
            }
        }

        return view('orders/edit',['order' => $order]);
    }

    public function delete()
{
    $id = $this->request->getPost('id');
        $order = model(OrdersModel::class)->find($id);
        if (!$order) {
            return redirect()->back();
        }

        $branch = $this->getBranch();
        if ($branch !== null && $branch !== '__none__') {
            $owner = model(UserModel::class)->find($order->user_id);
            if (!$owner || $owner->branch !== $branch) {
                return redirect()->back()->with('errors', 'Unauthorized delete action');
            }
        }

        model(OrdersModel::class)->delete($id);
    return redirect()->back();
}

public function update()
{
   if(!$this->validate([
    'customer' => 'required',
    'phone'=> 'required',
    'order_type'=> 'required',
    'budget'=> 'required',
    'cost'=> 'required',
    'expenses'=> 'required',
    ])){

        dd($this->validator->getErrors());

        return redirect()->back()->withInput()->with('errors','error occured');


       
}

else{
 $id=$this->request->getPost('id');
 $order_data=$this->validator->getvalidated();

 $order = model(OrdersModel::class)->find($id);
 if (!$order) {
     return redirect()->to('/orders');
 }

 $branch = $this->getBranch();
 if ($branch !== null && $branch !== '__none__') {
     $owner = model(UserModel::class)->find($order->user_id);
     if (!$owner || $owner->branch !== $branch) {
          return redirect()->to('/orders')->with('errors', 'Unauthorized update action');
     }
 }

model(OrdersModel::class)->where('id',$id)->set($order_data)->update();

return redirect ('orders');

}


}

public function todayOrders()
{
    $isAdmin = session('position') === 'Admin';

    $from = $this->request->getGet('from') ?: date('Y-m-d');
    $to   = $this->request->getGet('to') ?: date('Y-m-d');
    $selectedBranch = $isAdmin ? trim((string) ($this->request->getGet('branch') ?? '')) : '';

    if ($from > $to) {
        [$from, $to] = [$to, $from];
    }

    $orders = $this->getOrdersByFilters($from, $to, $selectedBranch, $isAdmin);

    $data = [
        'orders'          => $orders,
        'isAdmin'         => $isAdmin,
        'branches'        => $isAdmin ? model(BranchModel::class)->orderBy('name', 'ASC')->findAll() : [],
        'selectedBranch'  => $selectedBranch,
        'from'            => $from,
        'to'              => $to,
    ];

    return view('orders/todayorders', $data);
}

public function downloadTodayOrders()
{
    $isAdmin = session('position') === 'Admin';

    $from = $this->request->getGet('from') ?: date('Y-m-d');
    $to   = $this->request->getGet('to') ?: date('Y-m-d');
    $selectedBranch = $isAdmin ? trim((string) ($this->request->getGet('branch') ?? '')) : '';

    if ($from > $to) {
        [$from, $to] = [$to, $from];
    }

    $orders = $this->getOrdersByFilters($from, $to, $selectedBranch, $isAdmin);

    $titleParts = ["ORDER REPORT"]; 
    $titleParts[] = "FROM {$from} TO {$to}";
    if ($isAdmin && $selectedBranch !== '') {
        $titleParts[] = "BRANCH: {$selectedBranch}";
    }

    $mpdf = $this->createMpdf();
    $mpdf->AddPage('L');
    $html = view('reports/ordersReport', [
        'orders' => $orders,
        'title'  => implode(' | ', $titleParts),
    ]);
    $mpdf->WriteHTML($html);
    $this->response->setHeader('Content-Type', 'application/pdf');
    $mpdf->Output('orders_report.pdf', 'I');
}

private function getOrdersByFilters(string $from, string $to, string $selectedBranch, bool $isAdmin): array
{
    $builder = db_connect()->table('orders')
        ->select('orders.*, users.username, users.branch')
        ->join('users', 'orders.user_id = users.id')
        ->where('DATE(orders.created_at) >=', $from)
        ->where('DATE(orders.created_at) <=', $to)
        ->orderBy('orders.created_at', 'DESC');

    if ($isAdmin) {
        if ($selectedBranch !== '') {
            $builder->where('users.branch', $selectedBranch);
        }
    } else {
        $staffBranch = session('branch');
        if ($staffBranch === null || $staffBranch === '') {
            $builder->where('1', '0');
        } else {
            $builder->where('users.branch', $staffBranch);
        }
    }

    return $builder->get()->getResult();
}



public function oldOrders()
{
    $start = $this->request->getGet('start');
    $end = $this->request->getGet('end');

    
    //    dd($start);
    
    
    $branch = $this->getBranch();

    if (!empty($start) && !empty($end)) {
        $ordersModel = model(OrdersModel::class);
        if ($branch === '__none__') {
            $orders = [];
        } else {
            $ordersModel->join('users', 'orders.user_id = users.id');
            if ($branch !== null) {
                $ordersModel->where('users.branch', $branch);
            }
            $orders = $ordersModel
                ->where('orders.created_at >=', $start)
                ->where('orders.created_at <=', $end)
                ->findAll();
        }

        $date = "<b class='font-semibold text-gray-900 dark:text-white'>$start</b> to <b>$end</b>";
        return view('orders/oldorders', ['orders' => $orders, 'data' => $date]);

    } elseif (empty($start) && empty($end)) {
        $orders = model('OrdersModel')->getTodayOrders($branch);
        $date   = date('d-m-Y');
        return view('orders/oldorders', ['orders' => $orders, 'data' => $date]);
    }
}

public function todayreport()

{
    $branch = $this->getBranch();
    $orders = model('OrdersModel')->getTodayOrders($branch);

        //  dd($orders); 
    $mpdf = $this->createMpdf();
    $mpdf->AddPage('L');
		$html = view('reports/ordersReport',['orders'=>$orders]);
		$mpdf->WriteHTML($html);
		$this->response->setHeader('Content-Type', 'application/pdf');
		$mpdf->Output('Order.pdf','I'); 
       

    return view ('orders/create');
}

}

