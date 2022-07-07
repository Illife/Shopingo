<?php
require_once __DIR__ . '/../../config.php';
// echo ('<pre>');
// echo print_r($_POST, true);
// echo ('</pre>');

$color = $_POST['color'];
$category_id = $_POST['category'];

echo PATH . "/search?category=" . $category_id . "&color=" . $color;
