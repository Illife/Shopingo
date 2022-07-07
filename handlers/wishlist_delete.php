<?php

if (!isset($_SESSION)) {
    session_start();
}

require_once __DIR__ . '/../config.php';

if (!isset($_SESSION['wishlist'])) {
    $_SESSION['wishlist'] = array();
}

$id = $_POST['id'];

$key = array_search($id, $_SESSION['wishlist']);

unset($_SESSION['wishlist'][$key]);

echo PATH . "/izbrannoe";
