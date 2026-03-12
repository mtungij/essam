<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SalaryModel;
use App\Models\UserModel;

class PayrollController extends BaseController
{
    public function index()
    {
        $user=model(SalaryModel::class)->getSalary();
         return view('users/payroll',['user'=>$user]);
    }

    
    public function Report()

   {
    
         $from=$this->request->getGet('from');
         $to=$this->request->getGet('to');
       
         dd($from,$to);

        
        if(!empty($from) && !empty($to))
        {
            $user=model(UserModel::class)->findAll();
            $salary=model('SalaryModel')
            ->where('created_at >=',$from)
            ->where('created_at <=',$to)
            ->findAll();
            
            dd ($salary);

            return view('users/payroll',['salary'=>$salary,'user'=>$user]);  
        }
             elseif(empty($from) && empty($to)){
            $salary=model(SalaryModel::class)->getTodaySalary();

        
          return view('users/payroll',['salary'=>$salary]);

        }


}
}
