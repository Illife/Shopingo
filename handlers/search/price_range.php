<?php
require_once __DIR__ . '/../../config.php';
// echo ('<pre>');
// echo print_r($_POST, true);
// echo ('</pre>');
if (isset($_POST['category'])) {
    $category_id = $_POST['category'];
} else {
    $category_id = 1;
}
$min_price = round($_POST['min_price']);
// echo $min_price;
// echo (" - ");
$max_price = round($_POST['max_price']);
// echo $max_price;

// echo ('<input type="number" value="' . $min_price . '" class="d-flex" style="width: 47%; border: 1px solid #ced4da; outline: 1px solid #ced4da; border-radius:3px;">');
// echo ('<input type="number" value="' . $max_price . '" class="d-flex ms-1 max_price" style="width: 47%; border: 1px solid #ced4da; outline: 1px solid #ced4da; border-radius:3px;">');

echo PATH . "/search?category=" . $category_id . "&search=" . $search . "&min_price=" . $min_price . "&max_price=" . $max_price;
