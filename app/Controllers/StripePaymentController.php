<?php

namespace App\Controllers;

use Stripe\Checkout\Session;
use Stripe\Stripe;



class StripePaymentController
{

    public function __construct(readonly private string $clientSecret)
    {
        Stripe::setApiKey($this->clientSecret);
        Stripe::setApiVersion('2022-11-15');
    }




    public function startPayment(CartController $cart)
    {
        $cardId = $cart->getId();
        $session = Session::create([
            'line_items'                  => [
                array_map(fn(array $product) => [
                    'quantity'   => 1,
                    'price_data' => [
                        'currency'     => 'EUR',
                        'product_data' => [
                            'name' => $product['name']
                        ],
                        'unit_amount'  => $product['price']
                    ]
                ], $cart->getProducts())
            ],
            'mode' => 'payment',
            'success_url' => STRIPE_SUCCESS_URL,
            'cancel_url' => STRIPE_CANCEL_URL,
            'billing_address_collection'  => 'required',
            'shipping_address_collection' => [
                'allowed_countries' => ['FR']
            ],
            'metadata' => [
                'cart_id' => $cardId
            ]
        ]);

        $cart->setSessionId($session->id);
        header("HTTP/1.1 303 See Other");
        header("Location: " . $session->url);
    }




}
