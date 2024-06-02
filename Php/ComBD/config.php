<?php
    $host = '127.0.0.1';
    $user = 'teste';
    $password = 'teste2024';
    $database = 'teste';
    $port = 3306;
    $conn = new mysqli($host, $user, $password, $database, $port);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
?>
