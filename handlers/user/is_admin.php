<?php

if (!isset($_SESSION)) session_start();

require_once __DIR__ . '/../../models/User.php';

require_once __DIR__ . '/../../config.php';

$name = $_POST['name'];
$password = $_POST['password'];

$ResultReadUsers = new \Models\User;
$ResultReadUsers = $ResultReadUsers->is_admin($name, $password);

foreach ($ResultReadUsers as $user) {
    if ($user['role'] === 'admin') {
        $_SESSION['user'] = 'admin';
        echo "<script>location.href='" . PATH . "/admin" . "';</script>";
    } else {
        echo "<script>location.href='" . PATH . "/admin" . "';</script>";
    }
}
