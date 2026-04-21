<?php

require_once __DIR__ . '/../models/OrderModel.php';

class CheckoutController
{
    private $model;

    public function __construct()
    {
        $this->model = new OrderModel();
    }

    // ===== VIEW CHECKOUT =====
    public function index()
    {
        // ❌ KHÔNG session_start() nữa
        $cart = $_SESSION['cart'] ?? [];

        require 'views/client/checkout.php';
    }

    // ===== PROCESS ORDER =====
    public function process()
    {
        // ❌ KHÔNG session_start() nữa

        $cart = $_SESSION['cart'] ?? [];

        if (empty($cart)) {
            header("Location: index.php?url=cart");
            exit;
        }

        // ===== CHECK LOGIN =====
        if (!isset($_SESSION['user']['id'])) {
            header("Location: index.php?url=login");
            exit;
        }

        $user_id = $_SESSION['user']['id'];

        // ===== TOTAL PRICE =====
        $total_price = 0;

        foreach ($cart as $item) {
            $total_price += $item['price'] * $item['quantity'];
        }

        // shipping
        $shipping = 10000;
        $total_price += $shipping;

        // ===== INSERT ORDER =====
        $order_id = $this->model->createOrder($user_id, $total_price);

        // ===== INSERT ORDER DETAILS =====
        foreach ($cart as $item) {
            $this->model->createOrderDetail(
                $order_id,
                $item['name'],
                $item['price'],
                $item['quantity']
            );
        }

        // ===== CLEAR CART =====
        unset($_SESSION['cart']);

        // redirect
        header("Location: index.php?url=cart");
        exit;
    }
}