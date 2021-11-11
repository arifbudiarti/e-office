<?php

namespace App\Controllers;

class Auth extends BaseController
{
    public function index()
    {
        $data['title'] = 'Login';
        //echo phpinfo();
        return view('pages/auth/login', $data);
        //return view('pages/auth/login');
    }

    public function checkAuth()
    {
        return redirect()->to(base_url('Apps'));
    }
}
