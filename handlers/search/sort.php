<?php
require_once __DIR__ . '/../../config.php';

$sort = $_POST['sort'];
$category_id = $_POST['category'];

echo PATH . "/search?category=" . $category_id . "&sort=" . $sort;
