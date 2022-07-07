<?php

if (!isset($_SESSION)) {
    session_start();
}

require_once __DIR__ . '/../../config.php';

unset($_SESSION['user']);
unset($_SESSION['user_id']);

echo "<script>location.href='" . PATH . "/user/signup';</script>";
