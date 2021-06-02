<?php
// Get modules need to use for main content by using $_GET
$module = $_GET['m'];

// If there is no get param to load page, set $module default to home page
if ($module == null) {
    $module = 'home';
}

# Include header
require __DIR__ . "/modules/partials/header.php";
# Include main contain
require __DIR__ . "/modules/$module.php";
# Include footer
require __DIR__ . "/modules/partials/footer.php";
