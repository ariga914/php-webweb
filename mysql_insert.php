<!DOCTYPE html>
<head>
    <title>PHP MySQL - Insert Data</title>
</head>
<body>
    <h2>Create an User</h2>
    <form action="./mysql_insert.php" method="post">
        <p>Full Name: <input type="text" name="fullname"></p>
        <p>Username: <input type="text" name="username"></p>
        <p>Password: <input type="password" name="password"></p>
        <p>E-mail: <input type="text" name="email"></p>
        <p><input type="submit" value="Create User"></p>
    </form>
    <!-- Check if there is submiting data from form, receive and output to screen -->
    <?php
    // check if form is submited
    if (!empty($_POST)) {
        // Receive data by using $_POST
        $fullname = $_POST['fullname'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];
       
        // Create MySQL connection
        $connection = new mysqli("localhost", "root", "", "php_web");
        // if connection is error, ouput error message on screen and do stops
        if ($connection->connect_error != null) {
            echo "<p>Failed to connect to MySQL: " . $connection->connect_error . '</p>';
        } else {
            // define sql query to insert data
            $sql = "INSERT INTO users(`fullname`, `username`, `password`, `email`) VALUE ('$fullname',' $username', '$password', '$email')";
            // use connection to execute the query
            if (!$connection->query($sql)) {
                // If insert failed, show error.
                echo "<p>Failed to insert data. Error: " . $connection->error. "</p>";
            } else {
                // If created successfully, show message and link to mysql_query.php to check the users list
                echo '<p>Created a new records successfully, access <a target="_blank" href="./mysql_query.php">Here</a> to check</p>';
            }
        }

    }
    ?> 

</body>
</html>
