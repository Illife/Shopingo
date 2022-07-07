<?php

if (!isset($_SESSION)) {
    session_start();
}

$id = $_POST['id'];

$pos = strpos($id, " ");

if ($pos === false) {
    $id = $_POST['id'];
} else {
    $arrayId = explode(" ", $id);
    $id = $arrayId[0];
}

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

if (!in_array($id, $_SESSION['cart'])) {
    array_push($_SESSION['cart'], $id);
}

// echo ('<pre>');
// echo print_r($_SESSION['wishlist'], true);
// echo ('</pre>');
