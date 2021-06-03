<?php
// Start the session at the top of page
session_start();
?>
<!DOCTYPE html>
<html>
<body>

<?php
$sessionName = 'cart';
$sessionValue = 'dress,watch';

// check if session not exist, create it
if (!isset($_SESSION[$sessionName])) {
    // Set session
    $_SESSION[$sessionName] = $sessionValue;
    echo "Set session: name=$sessionName, value=$sessionValue";
} else {
    // get session
    $cart = $_SESSION[$sessionName];
    echo "Sesion $sessionName has value $cart";
}
?>

</body>
</html>
