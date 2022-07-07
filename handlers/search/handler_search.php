<?php
require_once __DIR__ . '/../../config.php';

$category = $_POST['select_search'];

if (!empty($_POST['input_search'])) {
    $search = $_POST['input_search'];
    echo "<script>location.href='" . PATH . "/search/?category=" . $category . "&search=" . $search . "';</script>";
} else {
    echo "<script>location.href='" . PATH . "/search/?category=" . $category . "';</script>";
}
