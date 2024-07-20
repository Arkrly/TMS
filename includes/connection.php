<?php
    $servername = "localhost";
    $username = "root";
    $password = ""; // Make sure to use your actual password
    $dbname = "tms_db"; // Make sure to use your actual database name

    // Create connection
    $connection = mysqli_connect($servername, $username, $password, $dbname);

    // Check connection
    if (!$connection) {
        die("Connection failed: " . mysqli_connect_error());
    }
?>
