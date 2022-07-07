<?php

require_once __DIR__ . '/../config.php';

require_once __DIR__ . '/../models/Category.php';

require_once __DIR__ . '/../models/Brand.php';

require_once __DIR__ . '/../models/Product.php';

echo ('<pre>');
echo print_r($_POST);
echo ('</pre>');

echo ('<pre>');
echo print_r($_FILES);
echo ('</pre>');

echo ('<br>');
echo $_POST['category'];
echo ('<br>');

echo ('<br>');
echo $_POST['brand'];
echo ('<br>');

echo ('<br>');
echo $_POST['status'];
echo ('<br>');
// echo ('<pre>');
// echo print_r($_GET);
// echo ('</pre>');

$id = $_POST['id'];
$img = $_POST['old_img'];
$title = $_POST['title'];
$price = $_POST['price'];
$old_price = $_POST['old_price'];
$category_id = $_POST['category'];
$brand_id = $_POST['brand'];
$color = $_POST['color'];
$size = $_POST['size'];
$status_id = $_POST['status'];
$ResultReadStatusById = new \Models\Brand;
$ResultReadStatusById = $ResultReadStatusById->read_status_by_id($status_id);
foreach ($ResultReadStatusById as $status) {
}
$status = $status['value'];
$date = $_POST['date'];

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

$update_product = new \Models\Product;
$update_product = $update_product->update_product($id, $img, $title, $price, $old_price, $category_id, $brand_id, $color, $size, $status, $date);

echo "<script>location.href='" . PATH . "/admin/product/?id=" . $id . "';</script>";
