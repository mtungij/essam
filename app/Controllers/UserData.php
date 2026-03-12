<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class UserData extends BaseController
{
    public function index()
    {
        return view('form');
    }

    public function create()
    {
        $username = $this->request->getGet('username');
        $password = $this->request->getGet('password');

        $data = ["username" => $username,"password"=> $password];

        return view('success', $data);
    }

    public function store()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        if($username != "kado") {
            return redirect()->back()->withInput();
        } else {
            return redirect('/');
        }
        
    }
}
