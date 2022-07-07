<?php

require_once __DIR__ . '/../config.php';

require_once __DIR__ . '/../models/Category.php';

require_once __DIR__ . '/../controllers/AdminController.php';

$status = $_POST['select'];

echo "<script>location.href='" . PATH . "/admin/products-by-status/?status=" . $status . "';</script>";
