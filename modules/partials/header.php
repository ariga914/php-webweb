<?php
// Define an array to contain page titles
$pageTitles = array(
    'home' => "Home",
    "profile" => "My Profile",
);
// Get page title depend on what is using module. 
$pageTitle = $pageTitles[$module];
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
            <h4>The logo</h4>
        </div>
        <div>
                <h2 class="slogan">The header slogan</h2>
        </div>
        <div id="form">
            <ul>
                <li>Hi <span>Guest</span></li>
                <li><a href="javascript:void(0)" onclick="showLoginForm()">Login</a></li>
            </ul>
            
            <form id="login">
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
            <nav>
    <ul>
        <li><a href="./index.php">Home</a></li>
        <li><a href="./index.php?m=profile">My Profile</a></li>
    </ul>
</nav>

            </ul>
        </nav>
