<?php
$userId = isset($_SESSION['login_user_id']) ? $_SESSION['login_user_id'] : null;
if (!$userId) {
    header('Location:index.php');
} else {
    unset($_SESSION['login_user_id']);
    header('Location:index.php');
}
?>