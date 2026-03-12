<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\OrdersModel;
use App\Models\UserModel;
use App\Models\SalaryModel;

class SallaryController extends BaseController
{
    public function index()
    {
        //
    }


   public function salary()
   {
     $salary=model(SalaryModel::class)->getSalary();
    return view('users/salary',['salary'=>$salary]);
   }

   public function paysalary()
   {
     $userId= $this->request->getPost('userId');
     $amount =$this->request->getPost('amount');

     $data =['user_id'=>$userId,'amount'=>$amount];

     $salary=model(SalaryModel::class)->insert($data);


     return redirect('salary');



   }

    public function payroll()

   {
        $salary=model(SalaryModel::class)->getSalary();
        return view('users/payroll',['salary'=>$salary]);


   }

   public function salaryReport()

   {
         $from=$this->request->getPost('from');
         $to=$this->request->getPost('to');
       
        //  dd($from,$to);

        
        if(!empty($from) && !empty($to))
        {
          $user=model(UserModel::class)->findAll();
            $salary=model(SalaryModel::class)
            ->where('created_at >=',$from)
            ->where('created_at <=',$to)
            ->findAll();

            // dd($user);
          
        } elseif(empty($from) && empty($to)){
            $user=model(UserModel::class)->findAll();
            $salary=model(SalaryModel::class)->TodaySalary();

                

          return view('users/salary',['user'=> $user]);

        }


}
}

