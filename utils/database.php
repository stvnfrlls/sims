<?php
    global $conn;
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection Failed: ". $conn->connect_error);
    }
