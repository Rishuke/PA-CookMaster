<?php

namespace App\Controllers;



class HomeController extends Controller {

    public function welcome()
    {
        return $this->view('home.welcome');
    }

   
}
