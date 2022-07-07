<?php

namespace Controllers;

require_once __DIR__ . '/../models/Order.php';

class OrderController
{
    public function order_details()
    {
        require_once __DIR__ . '/../views/order/order_details.php';
    }

    public function order_shipping()
    {
        require_once __DIR__ . '/../views/order/order_shipping.php';
    }

    public function checkout_payment()
    {
        require_once __DIR__ . '/../views/order/checkout_payment.php';
    }

    public function checkout_review()
    {
        require_once __DIR__ . '/../views/order/checkout_review.php';
    }

    public function checkout_complete()
    {
        require_once __DIR__ . '/../views/order/checkout_complete.php';
    }

    public function order_tracking()
    {
        require_once __DIR__ . '/../views/order/order_tracking.php';
    }
}
