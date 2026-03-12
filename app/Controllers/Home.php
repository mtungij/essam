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
    public function index()
    {
       if(!session('user_id')){

           return redirect('login');
       }
       $users=model(UserModel::class)->findAll();
       $usercount=count($users);

       $today = date('Y-m-d');

    $todaydata = model(OrdersModel::class)->where('DATE(created_at)',$today)->findAll();
    $monthlydata = model(SalioModel::class)->where('MONTH(created_time)',date("m"))->findAll();
    $yeardata = model(OrdersModel::class)->where('YEAR(created_at)',date("Y"))->findAll();
    $monthlysalary = model(SalaryModel::class)->where('MONTH(created_at)',date('m'))->selectSum('amount')->first();
    $monthlyOrders = model(OrdersModel::class)->where('MONTH(created_at)',$today)->findAll();
    
    
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

$monthlyProfit -= $monthlysalary->amount;


    
    $data = [
            'usercount'=> $usercount,
            'customercount'=>$customercount,
            'todaybudget'=>$todaybudget,
            'monthlybalance'=> $monthlybalanace,
            'todayprofit'=> $todayprofit,
            'yearprofit' => $yearprofit,
            
            'monthlyprofit' => $monthlyProfit,
            'monthlysalary' => $monthlysalary->amount,
    ];


       
        return view('dashboard',$data);
        

    }

    
}
