<?php

namespace App\Controllers;



class HomeController extends Controller
{

    public function welcome()
    {
        return $this->view('home.welcome');
    }

    public function menu()
    {
        return $this->view('home.menu');
    }

    public function events()
    {
        return $this->view('home.events');
    }

    public function createevents()
    {
        return $this->view('home.createevent');
    }

    public function joinmeetings()
    {
        return $this->view('home.meeting');
    }

    public function chefs()
    {
        return $this->view('home.chefs');
    }

    public function contact()
    {
        return $this->view('home.contact');
    }


    public function dashboard()
    {
        $this->isLogged();
        return $this->view('home.dashboard');
    }

    public function subscription()
    {
        $this->isLogged();
        return $this->view('home.subscription');
    }
}
