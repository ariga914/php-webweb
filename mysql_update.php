<!DOCTYPE html>
<head>
    <title>PHP MySQL - Update Data</title>
</head>
<body>
    <h2>Update an User</h2>
    <?php
        // Define user ID that you want to update
        $user_id = $_GET['id'];

        // Create MySQL Connection
        $connection = new mysqli("localhost", "root", "", "php_web");

        // if connection is error, ouput error message on screen
        if ($connection->connect_error != null) {
            echo "<p>Failed to connect to MySQL: " . $connection->connect_error . '</p>';
        } else { // If there is no error, process to select data
            
            // Check if the form is submited, process to update the user
            if (!empty($_POST)) {
                $fullname = $_POST['fullname'];
                $username = $_POST['username'];
                $password = $_POST['password'];
                $email = $_POST['email'];

                $sql = "UPDATE users SET
                    fullname = '$fullname',
                    username = '$username',
                    password = '$password',
                    email = '$email' 
                    WHERE id = $user_id";
                // use connection to execute the query
                if (!$connection->query($sql)) {
                    // If update failed, show error.
                    echo "<p>Failed to update data. Error: " . $connection->error. "</p>";
                } else {
                    // If update user successfully, show message and link to mysql_query.php to check the users list
                    echo '<p>Updated user successfully, access <a target="_blank" href="./mysql_query.php">Here</a> to check</p>';
                }
            }


            // Define SQL Query to select data of the user from MySQL
            $sql_query = "SELECT * FROM users WHERE id = $user_id";
            // Call method query of the object $connection to execute a query
            $result = $connection->query($sql_query);
            
            // Assign query data to variable $user
            //  below syntax mean if there is no record, $user is false (there is no user)
            $user = $result->fetch_array() ?? false;
        }

    ?>
    <!-- Check if there is user, show form to update -->
    <?php if ($user) { ?>
    <form action="./mysql_update.php?id=<?php echo $user_id; ?>" method="post">
        <p>Full Name: <input type="text" name="fullname" value="<?php echo $user['fullname'] ;?>"></p>
        <p>Username: <input type="text" name="username" value="<?php echo $user['username'] ;?>"></p>
        <p>Password: <input type="password" name="password" value="<?php echo $user['password'] ;?>"></p>
        <p>E-mail: <input type="text" name="email" value="<?php echo $user['email'] ;?>"></p>
        <p><input type="submit" value="Update User"></p>
    </form>
    <!-- If there is no user (id is not exist), show error messge -->
    <?php } else { ?>
    <p>User not found</p>
    <?php } ?>
</body>
</html>
?>
