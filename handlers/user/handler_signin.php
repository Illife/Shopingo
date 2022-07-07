<?php

if (!isset($_SESSION)) {
    session_start();
}

require_once __DIR__ . '/../../config.php';

require_once __DIR__ . '/../../models/User.php';

$email = $_POST['email'];

$password = $_POST['password'];

$ResultReadUsers = new \Models\User;
$ResultReadUsers = $ResultReadUsers->read_users();

foreach ($ResultReadUsers as $user) {
    if ($email === $user['email'] && $password === $user['password']) {
        $_SESSION['user'] = "user";
        $_SESSION['user_id'] = $user['id'];
        echo "<script>location.href='" . PATH . "/user/signup';</script>";
    }
}
