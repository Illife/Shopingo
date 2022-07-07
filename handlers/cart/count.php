<?php

require_once __DIR__ . '/../../models/Product.php';

if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

foreach ($_SESSION['cart'] as $product_id) {
    if ($_POST['id'] === $product_id) {
        $id = $_POST['id'];
        $count = $_POST['count'];
        $ResultReadProductById = new \Models\Product;
        $ResultReadProductById = $ResultReadProductById->read_product_by_id($id);
        foreach ($ResultReadProductById as $products) {
        }
        $total_1 = $products['price'] * $count;
    } else {
        $id = $product_id;
        $count = 1;
        $ResultReadProductById = new \Models\Product;
        $ResultReadProductById = $ResultReadProductById->read_product_by_id($id);
        foreach ($ResultReadProductById as $products) {
        }
        $total_2 = $total_2 + $products['price'] * $count;
    }
}
echo $total = $total_1 + $total_2;

// echo $count;
// echo ('<br>');
// echo $id;

// echo PATH . "/shop-cart/?";
