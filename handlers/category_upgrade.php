<?php

require_once __DIR__ . '/../config.php';

require_once __DIR__ . '/../models/Category.php';

echo ('<pre>');
echo print_r($_POST);
echo ('</pre>');

echo ('<pre>');
echo print_r($_FILES);
echo ('</pre>');

// echo ('<pre>');
// echo print_r($_GET);
// echo ('</pre>');

$id = $_POST['id'];
$img = $_POST['old_img'];
$parent_id = $_POST['parent_id'];
$title = $_POST['title'];
$slug = $_POST['slug'];


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

$update_category = new \Models\Category;
$update_category = $update_category->update_category($id, $img, $parent_id, $title, $slug);

echo "<script>location.href='" . PATH . "/admin/kategorii-tovarov';</script>";
