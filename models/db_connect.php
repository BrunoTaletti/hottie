<?php 
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "hottie_db";

    $db_connection = mysqli_connect($servename, $username, $password, $database);

    if(mysqli_connect_errno()){
        echo "Failed to connect to MySQL Database. Error: " . mysqli_connect_error();
        exit();
    }
?>