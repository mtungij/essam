<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\OrdersModel;
use App\Models\UserModel;

class OrdersController extends BaseController
{
    public function index()
    {
        $search = $this->request->getGet('search');
        if ($search) {
            $orders = model('OrdersModel')->search($search);
            return view('orders/index', $orders);
        }
        $orders = model('OrdersModel')->getOrders(10);
        return view('orders/index', $orders);
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
        return view('orders/edit',['order' => $order]);
    }

    public function delete()
{
    $id = $this->request->getPost('id');
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
model(OrdersModel::class)->where('id',$id)->set($order_data)->update();

return redirect ('orders');

}


}

public function todayOrders()
{

$orders = model('OrdersModel')->getTodayOrders();

  return view('orders/todayorders',['orders'=>$orders]);


}



public function oldOrders()
{
    $start = $this->request->getGet('start');
    $end = $this->request->getGet('end');

    
    //    dd($start);
    
    
    if (!empty($start) && !empty($end)) {
        $orders = model('OrdersModel')
        ->where('created_at >=', $start)
        ->where('created_at <=', $end)
        ->findAll();
        
        $date = "<b class='font-semibold text-gray-900 dark:text-white'>$start</b> to <b>$end</b>";

        return view('orders/oldorders', ['orders' => $orders,'data'=> $date]);

       
        
    } elseif (empty($startDate) && empty($endDate)) {
        $orders = model('OrdersModel')->getTodayOrders();
        $date = date('d-m-Y');
        return view('orders/oldorders', ['orders' => $orders,'data'=> $date]);
    }
}

public function todayreport()

{
    $orders = model('OrdersModel')->getTodayOrders();

        //  dd($orders); 
    $mpdf = new \Mpdf\Mpdf();
    $mpdf->AddPage('L');
		$html = view('reports/ordersReport',['orders'=>$orders]);
		$mpdf->WriteHTML($html);
		$this->response->setHeader('Content-Type', 'application/pdf');
		$mpdf->Output('Order.pdf','I'); 
       

    return view ('orders/create');
}

}

