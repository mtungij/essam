<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use CodeIgniter\HTTP\RedirectResponse;

class Login extends BaseController
{
    public function index(): string
    {
        helper('form');

        return view('Auth/login');
    }

    public function auth()
    {

        if(! $this->validate([
            'username' => 'required',
            'password' => 'required',
        ])) {
            return redirect('index');
        }

        $validUser = $this->validator->getValidated();

        $user = model(UserModel::class)->where('username', $validUser['username'])->first();

        if($user) {
            if(password_verify($validUser['password'], $user->password)) {
                //initialize sessions
                session()->set('user_id', $user->id);
                session()->set('username', $user->username);
                session()->set('name', $user->name);
                session()->set('position', $user->position);
                return redirect()->to('/');
            } {
                session()->setFlashdata("login_error", "Incorrect username or password");
                return redirect()->back()->withInput();
            }
        } {
            session()->setFlashdata("login_error", "Incorrect username or password");
            return redirect()->back()->withInput();
        }
        
    }
}
