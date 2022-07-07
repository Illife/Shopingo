<?php

require_once __DIR__ . '/../config.php';

require_once __DIR__ . '/../models/Category.php';

$title = $_POST['title'];
$slug = $_POST['slug'];
$parent_id = $_POST['parent_id'];
$img = 'empty';

if (!empty($_FILES['files']['name'])) {

    if (is_uploaded_file($_FILES['files']['tmp_name'])) {
        echo "Файл " . $_FILES['files']['name'] . " есть в папке temp.\n";

        $uploaddir = $_SERVER['DOCUMENT_ROOT'] . '/uploads/';
        $uploadfile = $uploaddir . $_FILES['files']['name'];

        echo '<pre>';
        if (move_uploaded_file($_FILES['files']['tmp_name'], $uploadfile)) {
            echo "Файл корректен и был успешно загружен в папку uploads.\n";
            $img = 'uploads/' . $_FILES['files']['name'];
        } else {
            echo "Возможная атака с помощью файловой загрузки!\n";
        }
        print "</pre>";
    }
}

$create_category = new \Models\Category;
$create_category = $create_category->create_category($title, $slug, $parent_id, $img);

echo "<script>location.href='" . PATH . "/admin/kategorii-tovarov" . "';</script>";
