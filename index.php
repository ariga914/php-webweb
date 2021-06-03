<?php
ob_start();
session_start();
// Get modules need to use for main content by using $_GET
$module = $_GET['m'];

// If there is no get param to load page, set $module default to home page
if ($module == null) {
    $module = 'home';
}

require __DIR__.'/config.php';
require __DIR__.'/libs/db.php';

$mysql = new DB(
    $dbConfig['host'],
    $dbConfig['user'],
    $dbConfig['password'],
    $dbConfig['db_name'],
);

# Include header
require __DIR__ . "/modules/partials/header.php";
# Include main contain
require __DIR__ . "/modules/$module.php";
# Include footer
require __DIR__ . "/modules/partials/footer.php";
ob_end_flush();
