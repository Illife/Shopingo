<?php
require_once __DIR__ . '/../../config.php';
require_once __DIR__ . '/../../models/Product.php';
// echo ('<pre>');
// echo print_r($_POST, true);
// echo ('</pre>');

$size = $_POST['size'];
$category_id = $_POST['category'];

echo PATH . "/search?category=" . $category_id . "&size=" . $size;