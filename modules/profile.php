<?php
if (!$_SESSION["login_user_id"]) {
    header('Location:index.php');
}
?>

<!-- MAIN content -->
<div id="main">
    <div id="main-content">
        <h3>My profile.</h3>
        <p>Name: Lorem Ipsum</p>
    </div>
    <!-- embed sidbar.php -->
    <?php require __DIR__. '/partials/sidebar.php'; ?>
</div>
