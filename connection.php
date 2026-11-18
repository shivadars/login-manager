<?php
    $db_server = getenv('MYSQLHOST') ?: "localhost";
    $db_user   = getenv('MYSQLUSER') ?: "root";
    $db_pass   = getenv('MYSQLPASSWORD') ?: "";
    $db_name   = getenv('MYSQLDATABASE') ?: "login_database";
    $db_port   = getenv('MYSQLPORT') ?: "3306";

    $conn = mysqli_connect($db_server, $db_user, $db_pass, $db_name, (int)$db_port);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
?>