<?php

if (!isset($_SESSION)) {
    session_start();
}

require_once __DIR__ . '/../../config.php';

require_once __DIR__ . '/../../models/User.php';

$id = $_SESSION['user_id'];

$name = $_POST['name'];

$sirname = $_POST['sirname'];

$display_name = $_POST['display_name'];

$email = $_POST['email'];

$password = $_POST['password'];

$new_password = $_POST['new_password'];

$confirm_password = $_POST['confirm_password'];

if ($new_password !== "................." && $new_password === $confirm_password) {
    $password = $new_password;
}

$ResultUpdateUchyotnayaZapisById = new \Models\User;
$ResultUpdateUchyotnayaZapisById = $ResultUpdateUchyotnayaZapisById->update_uchyotnaya_zapis_by_id($id, $name, $sirname, $display_name, $email, $password);

echo "<script>location.href='" . PATH . "/user/uchyotnaya-zapis';</script>";
