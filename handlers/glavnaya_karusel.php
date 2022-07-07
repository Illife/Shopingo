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

$id = $_POST['id'];
$title = $_POST['title'];
$subtitle = $_POST['subtitle'];
$text = $_POST['text'];
$btn = $_POST['btn'];
$img = $_POST['img'];

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

$update_slide = new \Models\Slider;
$update_slide = $update_slide->update_slide($id, $title, $subtitle, $text, $btn, $img);

$ResultReadSlide = new \Models\Slider;
$ResultReadSlide = $ResultReadSlide->read_slide_by_id($id);

foreach ($ResultReadSlide as $slide) {
    // echo $slide['img'];
    // // echo "<script>const new_img=" . $slide['img'] . "</script>";
    // echo ('<div class="d-none new_img"><p>' . $slide['img'] . '</p></div>');
    // // echo $slide['img'];
    // $_POST['img'] = 'blablabla';
}
// echo $html = file_get_contents('PATH.');

// echo "<script>location.href='" . PATH . "/admin/slajd/?id=" . $id . "';</script>";
