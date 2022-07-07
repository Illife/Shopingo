<?php

require_once __DIR__ . '/../config.php';

require_once __DIR__ . '/../models/Slider.php';

echo ('<pre>');
echo print_r($_POST);
echo ('</pre>');

echo ('<pre>');
echo print_r($_FILES);
echo ('</pre>');

// echo ('<pre>');
// echo print_r($_GET);
// echo ('</pre>');

$title = $_POST['title'];
$subtitle = $_POST['subtitle'];
$text = $_POST['text'];
$btn = $_POST['btn'];

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
$create_slide = new \Models\Slider;
$create_slide = $create_slide->create_slide($title, $subtitle, $text, $btn, $img);

echo "<script>location.href='" . PATH . "/admin/slajdy" . "';</script>";
