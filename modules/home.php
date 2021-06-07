<div id="main">
    <div id="main-content">
        <?php
        $userId =  isset($_SESSION["login_user_id"]) ? $_SESSION["login_user_id"] : null;
        if (!$userId):?>
            <h3> Welcome to the website! Login to see users list.</h3>
        <?php else: 
            $sql_query = "SELECT * FROM users";
            // Call method query of the object $connection to execute a query
            $result = $mysql->query($sql_query);                
        ?>
    

            <h2>Users</h2>

            <table>
                <tr>
                    <th>ID</th>
                    <th>Fullname</th>
                    <th>Username</th>
                    <th>Email</th>
                </tr>
                <?php if ($result->num_rows>0): ?>
                    <?php while ($row = $result->fetch_array()): ?>
                        <tr>
                            <td><a href="./mysql_update.php?id=<?php echo $row['id'] ?>"><?php echo $row['id'] ?></a></td>
                            <td><?php echo $row['fullname'] ?></td>
                            <td><?php echo $row['username'] ?></td>
                            <td><?php echo $row['email'] ?></td>
                        </tr>
                    <?php endwhile ?>
                <?php endif ?>
            </table>
        <?php endif?>
    </div>
    <!-- embed sidbar.php -->
    <?php require __DIR__ . '/partials/sidebar.php' ?>
</div>
