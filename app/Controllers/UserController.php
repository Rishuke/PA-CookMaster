<?php

namespace App\Controllers;



class UserController extends Controller {

    public function register()
    {
        return $this->view('auth.register');
    }

    public function login()
    {
        return $this->view('auth.login');
    }

   
}
