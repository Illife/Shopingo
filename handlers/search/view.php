<?php
require_once __DIR__ . '/../../config.php';
require_once __DIR__ . '/../../models/Product.php';

$id = $_POST['id'];

$ResultReadProductById = new \Models\Product;
$ResultReadProductById = $ResultReadProductById->read_product_by_id($id);
foreach ($ResultReadProductById as $products) {
    $view = $products['view'];
}

$view++;

$ResultUpdateProductView = new \Models\Product;
$ResultUpdateProductView = $ResultUpdateProductView->update_product_view($view, $id);
