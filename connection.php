<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    if (!function_exists('mysqli_connect')) {
        die("<h3>PHP mysqli extension missing</h3><p>The mysqli extension is not enabled on this server.</p>");
    }

    $db_server = getenv('MYSQLHOST') ?: "localhost";
    $db_user   = getenv('MYSQLUSER') ?: "root";
    $db_pass   = getenv('MYSQLPASSWORD') ?: "";
    $db_name   = getenv('MYSQLDATABASE') ?: "login_database";
    $db_port   = getenv('MYSQLPORT') ?: "3306";

    mysqli_report(MYSQLI_REPORT_OFF);

    $conn = @mysqli_connect($db_server, $db_user, $db_pass, $db_name, (int)$db_port);

    if (!$conn) {
        die("<h3>Database Connection Error:</h3> " . mysqli_connect_error() . "<br><br><b>Host:</b> {$db_server}<br><b>User:</b> {$db_user}<br><b>Database:</b> {$db_name}<br><b>Port:</b> {$db_port}");
    }
?>
