<?php

namespace App\Controllers;

class SubscriptionController extends Controller
{

    public function free()
    {
        $this->isLogged();
        $this->view('subscription.free');
    }

    public function freeMonthly()
    {
        $this->isLogged();
        $this->view('subscription.freeMonthly');
    }

    public function freeYearly()
    {
        $this->isLogged();
        $this->view('subscription.freeYearly');
    }

    public function starter()
    {
        $this->isLogged();
        $this->view('subscription.starter');
    }

    public function starterMonthly()
    {
        $this->isLogged();
        $this->view('subscription.starterMonthly');
    }

    public function starterYearly()
    {
        $this->isLogged();
        $this->view('subscription.starterYearly');
    }

    public function master()
    {
        $this->isLogged();
        $this->view('subscription.master');
    }

    public function masterMonthly()
    {
        $this->isLogged();
        $this->view('subscription.masterMonthly');
    }

    public function masterYearly()
    {
        $this->isLogged();
        $this->view('subscription.masterYearly');
    }
}
