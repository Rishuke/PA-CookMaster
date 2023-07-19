<?php

namespace App\Controllers;

use Stripe\Stripe;



class StripePaymentController extends Controller
{

    public function __construct(private string $clientSecret)
    {
        Stripe::setApiKey($this->clientSecret);
        Stripe::setApiVersion('2022-11-15');
    }

    public function startPayment()
    {
    }


    public function success()
    {
        return $this->view('payment.success');
    }

    public function cancel()
    {
        return $this->view('payment.cancel');
    }
}
