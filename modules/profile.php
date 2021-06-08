<?php
if (!$_SESSION["login_user_id"]) {
    header('Location:index.php');
    exit();
}
?>

<!-- MAIN content -->
<div id="main">
    <div id="main-content">
        <h3>My profile.</h3>
        <?php 
        $userId = array_key_exists('login_user_id', $_SESSION) ? $_SESSION['login_user_id'] : null;
        try {
            if ($userId) {
                $extract_data = "SELECT * from users where id = $userId";    
            }
            $result = $mysql->query($extract_data);
            $user = $result->fetch_array() ?? false;
            
            echo '<p>'.'ID : '.$user['id'].'</p>';
            echo '<p>'.'User name : '.$user['username'].'</p>';
            echo '<p>'.'Full name : '.$user['fullname'].'</p>';
            echo '<p>'.'E-mail : '.$user['email'].'</p>';
            
        } catch (Exception $e) {
            $errors = [];
            array_push($errors, $e->getMessage());
            if (isset($errors) && !empty($errors)) {
                foreach ($errors as $error) {
                    echo '<p>'. $error . '</p>';
                }
            }
        }
        ?>
            
    </div>
    <!-- embed sidbar.php -->
    <?php require __DIR__. '/partials/sidebar.php'; ?>
</div>
