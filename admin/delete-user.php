<?php

session_start();

if (!isset($_SESSION["user_id"])) {
    header("Location: ../auth/login.php");
    exit;
}

if ($_SESSION["role"] != "admin") {
    echo "Access denied.";
    exit;
}

require_once "../config/database.php";

$user_id = $_GET["id"];

$sql = "DELETE FROM users
        WHERE id = '$user_id'";

mysqli_query($conn, $sql);

header("Location: index.php");
exit;

?>