<?php
require_once __DIR__ . '/../../config.php';
require_once __DIR__ . '/../../models/Product.php';
// echo ('<pre>');
// echo print_r($_POST, true);
// echo ('</pre>');

$brand_id = $_POST['brand_id'];
$category_id = $_POST['category'];

echo PATH . "/search?category=" . $category_id . "&brand=" . $brand_id;


