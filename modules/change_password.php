<?php
$userId = isset($_SESSION['login_user_id']) ? $_SESSION['login_user_id'] : null;
if (!$userId) {
    header('Location:index.php');
}

$isSuccess = isset($_GET['success']) ? $_GET['success']: null;

if (!empty($_POST)) {
    $current = md5($_POST['current']);
    $update = md5($_POST['update']);
    $confirm = md5($_POST['confirming']);

    $search_current_password = "SELECT password FROM users WHERE id = $userId LIMIT 1";
    $result = $mysql->query($search_current_password);
    $user = $result->fetch_array() ?? false;

    if ($update === $confirm && $current === $user['password']) {
        $update_password = "UPDATE users SET password = '$update' WHERE id = $userId";
        $result2 = $mysql->query($update_password) ?? false;
        if ($result2) {
            header('Location: index.php?m=change_password&success=true');
        } 
    }
    else {
            echo "<p>"."failed to update your password"."</p>";
    }
}


?>

<!-- MAIN content -->
<div id="main">
    <div id="main-content">
        <h3>Update password</h3>
        <?php
        // Check if user not registered, show form
        if (!$isSuccess) { ?>
            <form method="post" class="form-register">
                <p>
                    <label>Current password: </label>
                    <input type="password" name="current" />
                </p>
                <p>
                    <label>New password: </label>
                    <input type="password" name="update" />
                </p>
                <p>
                    <label>Confirm new password: </label>
                    <input type="password" name="confirming" />
                </p>
                <p><input type="submit" value="Update" /></p>
            </form>
        <?php // if user registered, show welcome message 
        } else {
            echo "<p>Succeeded in updating password.</p>";
        } ?>
    </div>
    <!-- embed sidbar.php -->
    <?php require __DIR__. '/partials/sidebar.php'; ?>
</div>
