<?php
if (!isset($_SESSION)) {
    session_start();
}
?>

<?php
require_once __DIR__ . '/views/header.php';
require_once __DIR__ . '/router.php';
require_once __DIR__ . '/views/footer.php';
?>

