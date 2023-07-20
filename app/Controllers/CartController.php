<?php

namespace App\Controllers;

class CartController extends Controller
{


    public function getId(): string
    {
        return uniqid();
    }
    public function getProducts(): array
    {
        return [
            [
                'name' => 'Peluche ratonlaveur',
                'price' => 1499

            ],

            [
                'name' => 'Peluche Panda Roux',
                'price' => 2099
            ]

        ];
    }

    public function setSessionId(string $id): void
    {
        file_put_contents(__DIR__. '/cart_session_id.txt', $id);
    }

    public function getSessionId(string $id): string
    {
        return file_get_contents(__DIR__. '/cart_session_id.txt');
    }

    public function getTotal(): int
    {
        return array_reduce($this->getProducts(), fn(int $acc, array $product) =>
            $acc +  $product['price'], 0);
    }

    public function cart()
    {
        $this->isLogged();
        $products = $this->getProducts();
        return $this->view('cart.panier', compact('products'));
    }

}