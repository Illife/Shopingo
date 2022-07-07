<?php

require_once __DIR__ . '/../models/Product.php';

require_once __DIR__ . '/../config.php';

$ResultReadProductsSearchByPrice = new \Models\Product;
$ResultReadProductsSearchByPrice = $ResultReadProductsSearchByPrice->read_products_sort_by_price_desc();

foreach ($ResultReadProductsSearchByPrice as $product) {
}

if (isset($_POST['category'])) {
    $category_id = $_POST['category'];
} else {
    $category_id = 1;
}

$max_price_db = $product['price'];

$min = $_POST['min'];

$min_price = $max_price_db / 100 * $min;

echo $min_price = round($min_price);

echo (' - ');

$max = $_POST['max'];

$max_price = $max_price_db / 100 * $max;

echo $max_price = round($max_price);

// $ResultReadProductsByPriceRange = new \Models\Product;
// $ResultReadProductsByPriceRange = $ResultReadProductsByPriceRange->read_products_by_price_range($min_price, $max_price);

echo "<script>location.href='" . PATH . "/search/?category=" . $category_id . "&min_price=" . $min_price . "&max_price=" . $max_price . "';</script>";
