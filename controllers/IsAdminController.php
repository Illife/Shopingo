<?php

namespace Controllers;

require_once __DIR__ . '/../config.php';

class IsAdminController
{
    public function __construct()
    {
        if ($_SESSION['user'] !== 'admin') {
            echo "<script>location.href='" . PATH . "/admin" . "';</script>";
        }
    }
}
