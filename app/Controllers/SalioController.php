<?php

namespace App\Controllers;


use App\Controllers\BaseController;
use App\Models\SalaryModel;
use App\Models\SalioModel;
use App\Models\UserModel;

class SalioController extends BaseController
{
    public function salio()
    {
        $branch = $this->getBranch();
        $balanc = model(SalioModel::class)->BalanceByBranch($branch);
        $salio  = model(SalioModel::class)->getByBranch($branch);
        return view('salio/balance', ['salio' => $salio, 'balanc' => $balanc]);
    }

    private function getBranch(): ?string
    {
        if (session('position') === 'Admin') {
            return null;
        }
        $branch = session('branch');
        return ($branch !== null && $branch !== '') ? $branch : '__none__';
    }

    public function create()
    {

        $user_id = session('user_id');

        if (!$this->validate([
                
                'created_time' => 'required',
                'income' => 'required',
                'payment_method' => 'required',
            ])) {

            return redirect()->back()->withInput()->with('errors','Please fill all the fields');
        }
        $validatedData = $this->validator->getValidated();
         
        // dd(
        //     ['user_id'=>$user_id]
        // );
      
       model(SalioModel::class)->save(['user_id' => $user_id, 'created_time' => $validatedData['created_time'], 'income' => $validatedData['income'], 'payment_method' => $validatedData['payment_method']]);

       
       return redirect()->back()->with('successcreate','Order added successfully');

       

            
        
    }


}
