<?php

require_once __DIR__ . '/../config.php';

require_once __DIR__ . '/../models/Product.php';

echo ('<pre>');
echo print_r($_POST);
echo ('</pre>');

// echo ('<pre>');
// echo print_r($_FILES);
// echo ('</pre>');

// echo ('<pre>');
// echo print_r($_GET);
// echo ('</pre>');

$title = $_POST['title'];
$description = $_POST['description'];
$price = $_POST['price'];
$old_price = $_POST['old_price'];
$category_id = $_POST['subcategory'];
$brand_id = $_POST['brand'];
$color = $_POST['color'];
$size = $_POST['size'];
$status = $_POST['status'];

if (!empty($_FILES['files']['name'])) {

    if (is_uploaded_file($_FILES['files']['tmp_name'])) {
        echo "Файл " . $_FILES['files']['name'] . " есть в папке temp.\n";

        $uploaddir = $_SERVER['DOCUMENT_ROOT'] . '/uploads/';
        $uploadfile = $uploaddir . $_FILES['files']['name'];

        echo '<pre>';
        if (move_uploaded_file($_FILES['files']['tmp_name'], $uploadfile)) {
            echo "Файл корректен и был успешно загружен в папку uploads.\n";
            $img = '/uploads/' . $_FILES['files']['name'];
        } else {
            echo "Возможная атака с помощью файловой загрузки!\n";
        }
        print "</pre>";
    }
}

$create_product = new \Models\Product;
$create_product = $create_product->create_product($img, $title, $description, $price, $old_price, $category_id, $brand_id, $color, $size, $status);

echo "<script>location.href='" . PATH . "/admin/products" . "';</script>";
