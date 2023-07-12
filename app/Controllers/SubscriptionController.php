<?php

namespace App\Controllers;

class SubscriptionController extends Controller
{

    public function free()
    {
        $this->view('subscription.free');
    }

    public function freeMonthly()
    {
        $this->view('subscription.freeMonthly');
    }

    public function freeYearly()
    {
        $this->view('subscription.freeYearly');
    }

    public function starter()
    {
        $this->view('subscription.starter');
    }

    public function starterMonthly()
    {
        $this->view('subscription.starterMonthly');
    }

    public function starterYearly()
    {
        $this->view('subscription.starterYearly');
    }

    public function master()
    {
        $this->view('subscription.master');
    }

    public function masterMonthly()
    {
        $this->view('subscription.masterMonthly');
    }

    public function masterYearly()
    {
        $this->view('subscription.masterYearly');
    }
}
