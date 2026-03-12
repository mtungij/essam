<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SalaryModel;
use App\Models\UserModel;

class User extends BaseController
{
    public function index()
    {
        helper('form');
        return view('users/index', ['users' => model(UserModel::class)->findAll()]);
    }

    public function create()
    {
        if (
            !$this->validate([
                'name' => 'required',
                'username' => 'required|is_unique[users.username]',
                'position' => 'required',
                'password' => 'required',
                'confirm_password' => 'required|matches[password]'
            ])
        ) {
            return redirect()->back()->withInput();
        }

        $user_input = $this->validator->getValidated();
        $user_input['password'] = password_hash($user_input['password'], PASSWORD_BCRYPT, ['cost'=>12]);

        unset($user_input['confirm_password']);

        // dd($user_input);

        model(UserModel::class)->insert($user_input);

        return redirect()->back()->with('create_user' ,'Staff Registered Successfully ');
    }

    public function delete()
    {
        $id = $this->request->getPost('id');
        model(UserModel::class)->delete($id);
        return redirect()->back()->with('delete','staff deleted sucessfully');
    }

    public function edit($id)
    {
       $user=model(userModel::class)->find($id);
        return view('users/edit',["user"=> $user]);
    }

   public function update()
   {
       if (
           !$this->validate([
               'name' => 'required',
               'username' => 'required',
               'position' => 'required',
           ])

       ) {
              return redirect()->back()->withInput();
       } else {
              $id = $this->request->getPost('id');
              $user_input = $this->validator->getValidated();

              model(UserModel::class)->where('id', $id)->set($user_input)->update();
              return redirect('users')->with('edit_user','Staff Updated Successfully');
       }

       
   }


   public function salary()
   {
     $salary=model(SalaryModel::class)->TodaySalary();
     $user=model(UserModel::class)->findAll();
    return view('users/salary',['user'=>$user,'salary'=> $salary]);
   }

   public function paysalary()
   {
     $userId= $this->request->getPost('userId');
     $amount =$this->request->getPost('amount');

     $data =['user_id'=>$userId,'amount'=>$amount];

     $salary=model(SalaryModel::class)->insert($data);


     return redirect('salary');



   }

   

   

public function logout()

{
    session()->destroy();
    return redirect ('login');
}


}