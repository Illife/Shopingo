<?php

if (!isset($_SESSION)) {
    session_start();
}

require_once __DIR__ . '/../../config.php';

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

$id = $_POST['id'];

$key = array_search($id, $_SESSION['cart']);

unset($_SESSION['cart'][$key]);
