<?php

namespace App\Controllers;


class PaymentController extends Controller
{
    public function pay()
    {
        $cart = new CartController($this->getDB());
        $payment = new StripePaymentController(STRIPE_API_KEY);
        $payment->startPayment($cart);

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