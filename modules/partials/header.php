<?php
    // Define an array to contain page titles
    $pageTitles = array(
        'home' => "Home",
        "profile" => "My Profile",
        "register" => "Regiser",
        "change_password" => "Change Password"
    );
    // Get page title depend on what is using module
    $pageTitle = array_key_exists($module, $pageTitles) ? $pageTitles[$module] : null;

    // Get session for checking user logged-in or not
    $userId = array_key_exists('login_user_id', $_SESSION) ? $_SESSION['login_user_id'] : null;
    // Default, user is not logged-in
    $user = false;
    if ($userId) {
        // query user data by $username and $password
        $sql = "SELECT id, username, email, fullname 
            FROM users 
            WHERE id = $userId
            LIMIT 0,1";

        $result = $mysql->query($sql);
        $user = $result->fetch_array() ?? false;
    }

    // Define fullname to show on header
    $fullname = $user ? $user['fullname'] : 'Guest';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" href="normalize.css">
        <meta charset="utf-8">
        <!-- use defined variable to render page title in HTML -->
        <title><?php echo $pageTitle; ?></title>
        <link rel="stylesheet" href="./assets/css/index.css" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

        <script src="./assets/js/index.js"></script>
    </head>
    <body>
        <!-- The Header -->
        <header>
        <div>
            <?php if(array_key_exists('login_user_id', $_SESSION)): ?>
                <h4>The logo<?php echo $_SESSION['login_user_id']; ?> </h4>
            <?php else: ?>
                <h4>The logo</h4>
            <?php endif ?>
        </div>
        <div>
                <h2 class="slogan">The header slogan</h2>
        </div>
        <div id="form">
            <ul>
                <li>Hi <span><?php echo $fullname; ?></span></li>
                <?php if(!$userId): ?>
                    <li><a href="javascript:void(0)" onclick="showLoginForm()">Login</a></li>
                <?php else:?>
                    <li><a href="./index.php?m=logout">Logout</a></li>
                <?php endif ?>            
            </ul>

            <form id="login" action="index.php?m=login" method="post">
                <input type="text" name="username" placeholder="User name" />
                <input type="password" name="password" placeholder="Password"/>
                <label><input type="checkbox" name="rememberUsername" />Remember user name </label>
                <button type="submit" name="Login">Login</button>
            </form>
            <form method="GET" id="search">
                <input type="text" name="keyword" />
                <i class="material-icons">search</i>
            </form>
        </div>
        </header>

        <!-- The menu -->
        <nav>
            <ul>
                <li><a href="./index.php">Home</a></li>
                <?php if (!$userId): ?>
                    <li><a href="./index.php?m=register">Register</a></li>
                <?php else: ?>                
                    <li><a href="./index.php?m=profile">My Profile</a></li>                    
                    <li><a href="./index.php?m=change_password">Change Password</a></li>
                <?php endif ?>
            </ul>
        </nav>
