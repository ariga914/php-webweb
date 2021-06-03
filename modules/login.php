<?php
// Receive form data 
$username = addslashes($_POST['username']);
$password = md5($_POST["password"]);


// query user data by $username and $password
$sql = "SELECT id, username, password 
    FROM users 
    WHERE username = '$username' AND password = '$password'
    LIMIT 0,1";

$result = $mysql->query($sql);
$user = $result->fetch_array() ?? false;

if (!$user) {
    echo "<p>Login failed</p>";
} else {
    // Set session for login
    $_SESSION["login_user_id"] = $user['id'];
    // Redirect to home page after login
    header('Location: index.php');
}
?>
