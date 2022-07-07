<?php

if (!isset($_SESSION)) {
    session_start();
}

$id = $_POST['id'];

if (!isset($_SESSION['wishlist'])) {
    $_SESSION['wishlist'] = array();
}

if (!in_array($id, $_SESSION['wishlist'])) {
    array_push($_SESSION['wishlist'], $id);
}

// echo ('<pre>');
// echo print_r($_SESSION['wishlist'], true);
// echo ('</pre>');
