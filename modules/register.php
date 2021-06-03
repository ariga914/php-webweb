<?php
// Define variable to check if user is not registered, show register form
$isSuccess = $_GET['success'];

// Receive post data
if (!empty($_POST)) {
    // Receive post form dat   a
    $fullname = addslashes($_POST['fullname']);
    $username = addslashes($_POST['username']);
    $email = addslashes($_POST['email']);
    // hashing password
    $password = md5($_POST['password']); 
    
    // Define and execute SQL Query
    $sql = "INSERT INTO users(fullname, username, email, password)
        VALUE('$fullname', '$username', '$email', '$password')";

    // Define an array to contain errors when execute query,
    //  if there are errors, we will ouput to screen
    $errors = [];
    try {
        $result = $mysql->query($sql);
        // After insert data to MySQL, set form to hidden
        header('Location: index.php?m=register&success=true');
        exit;
    } catch (Exception $e) {
        // if there is error, push the error message to array $error
        array_push($errors, $e->getMessage());
    }
}
?>

<!-- MAIN content -->
<div id="main">
    <div id="main-content">
        <h3>Register User</h3>
        
        <!--Check if there is any error, ouput the error to screen. -->
        <?php if (isset($errors) && !empty($errors)):?>
            <?php foreach ($errors as $error): ?>
                <p><?php echo $error ?></p>
            <?php endforeach ?>
        <?php endif ?>
        
        
        <!--Check if user not registered, show form-->
        <?php if (!$isSuccess): ?>

        <form method="post" class="form-register">
            <p>
                <label>Username: </label>
                <input type="text" name="fullname" />
            </p>
            <p>
                <label>Email: </label>
                <input type="text" name="email" />
            </p>
            <p>
                <label>Full Name: </label>
                <input type="text" name="fullname" />
            </p>
            <p>
                <label>Password: </label>
                <input type="password" name="password" />
            </p>
            <p><input type="submit" value="Register" /></p>
        </form>
    <?php else: ?>
        <?php echo "<p>Welcome to our website!</p>"; ?>
    <?php endif ?>
    </div>
    <!-- embed sidbar.php -->
    <?php require __DIR__. '/partials/sidebar.php'; ?>
</div>
