<?php
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'dbcrud';
    $conn = mysqli_connect($host,$username,$password);
    mysqli_select_db($conn,$database);

    if ($conn->connect_error){
        die("Connection Failed:" . $conn->connect_error);
    }
?>