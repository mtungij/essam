<?php

namespace App\Controllers;
use App\Models\SalaryModel;
use App\Models\SalioModel;
use CodeIgniter\View\View;
use App\Models\UserModel;
use App\Models\OrdersModel;
use App\Models\MaintananceModel;


class Home extends BaseController
{
    private function getBranch(): ?string
    {
        if (session('position') === 'Admin') {
            return null;
        }
        $branch = session('branch');
        return ($branch !== null && $branch !== '') ? $branch : '__none__';
    }

    public function index()
    {
       if(!session('user_id')){

           return redirect('login');
       }

       $branch = $this->getBranch();

       if ($branch === '__none__') {
           $users = [];
       } elseif ($branch !== null) {
           $users = model(UserModel::class)->where('branch', $branch)->findAll();
       } else {
           $users = model(UserModel::class)->findAll();
       }
       $usercount=count($users);

       $today = date('Y-m-d');

    if ($branch === '__none__') {
        $todaydata = [];
        $monthlydata = [];
        $yeardata = [];
        $monthlyOrders = [];
        $monthlysalary = (object) ['amount' => 0];
    } else {
        $db = db_connect();

        $ordersTodayBuilder = $db->table('orders')
            ->select('orders.*')
            ->join('users', 'users.id = orders.user_id')
            ->where('DATE(orders.created_at)', $today);
        $ordersYearBuilder = $db->table('orders')
            ->select('orders.*')
            ->join('users', 'users.id = orders.user_id')
            ->where('YEAR(orders.created_at)', date('Y'));
        $ordersMonthBuilder = $db->table('orders')
            ->select('orders.*')
            ->join('users', 'users.id = orders.user_id')
            ->where('MONTH(orders.created_at)', date('m'));
        $salioMonthBuilder = $db->table('salio')
            ->select('salio.*')
            ->join('users', 'users.id = salio.user_id')
            ->where('MONTH(salio.created_time)', date('m'));
        $salaryMonthBuilder = $db->table('salary')
            ->selectSum('salary.amount', 'amount')
            ->join('users', 'users.id = salary.user_id')
            ->where('MONTH(salary.created_at)', date('m'));

        if ($branch !== null) {
            $ordersTodayBuilder->where('users.branch', $branch);
            $ordersYearBuilder->where('users.branch', $branch);
            $ordersMonthBuilder->where('users.branch', $branch);
            $salioMonthBuilder->where('users.branch', $branch);
            $salaryMonthBuilder->where('users.branch', $branch);
        }

        $todaydata = $ordersTodayBuilder->get()->getResult();
        $monthlydata = $salioMonthBuilder->get()->getResult();
        $yeardata = $ordersYearBuilder->get()->getResult();
        $monthlyOrders = $ordersMonthBuilder->get()->getResult();
        $monthlysalary = $salaryMonthBuilder->get()->getRow() ?? (object) ['amount' => 0];
    }
    
    
    $customercount=count($todaydata);
    
      
    // dd([$customer]);
    $todayprofit= 0;
    $todaybudget= 0;
    foreach ($todaydata as $order) {
        $todaybudget += $order->budget;
        $todayprofit += ($order->budget - $order->cost);
    }

    $yearprofit =  0;

    foreach ($yeardata as $order) {
        $yearprofit += ($order->budget - $order->cost);
    }

    $monthlybalanace = 0; 
    
    foreach ($monthlydata as $salio) {
        $monthlybalanace += $salio->income;
    }
    
    $monthlyProfit = 0;

    foreach ($monthlyOrders as $order) {
        $monthlyProfit += ($order->budget - $order->cost);
    }

$monthlyProfit -= (int) ($monthlysalary->amount ?? 0);


    
    $data = [
            'usercount'=> $usercount,
            'customercount'=>$customercount,
            'todaybudget'=>$todaybudget,
            'monthlybalance'=> $monthlybalanace,
            'todayprofit'=> $todayprofit,
            'yearprofit' => $yearprofit,
            
            'monthlyprofit' => $monthlyProfit,
                'monthlysalary' => (int) ($monthlysalary->amount ?? 0),
    ];


       
        return view('dashboard',$data);
        

    }

    
}
