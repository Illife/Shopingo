<?php

if (!isset($_SESSION)) {
    session_start();
}

require_once __DIR__ . '/../../config.php';

require_once __DIR__ . '/../../models/User.php';

$name = $_POST['name'];

$email = $_POST['email'];

$password = $_POST['password'];

$ResultCreateUser = new \Models\User;
$ResultCreateUser = $ResultCreateUser->create_user($name, $email, $password);

if ($ResultCreateUser === "success") {
    $ResultReadLastUser = new \Models\User;
    $ResultReadLastUser = $ResultReadLastUser->read_last_user();
    foreach ($ResultReadLastUser as $user) {
    }
    $_SESSION['user'] = "user";
    $_SESSION['user_id'] = $user['id'];
    echo "<script>location.href='" . PATH . "/user/signup';</script>";
}
