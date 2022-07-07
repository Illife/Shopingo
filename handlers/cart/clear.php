<?php

if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

unset($_SESSION['cart']);

// echo PATH . "/izbrannoe";
