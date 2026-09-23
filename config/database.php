<?php
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "notes_app";

    $conn = mysqli_connect($host, $username, $password, $database);

    if(!$conn) {
        die( mysqli_connect_error());
    }
?>