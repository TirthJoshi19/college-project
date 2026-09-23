<?php

session_start();

if (!isset($_SESSION["user_id"])) {
    header("Location: ../auth/login.php");
    exit;
}

require_once "../config/database.php";

$user_id = $_SESSION["user_id"];

$note_id = $_GET["id"];

$sql = "DELETE FROM notes
        WHERE id = '$note_id'
        AND user_id = '$user_id'";

mysqli_query($conn, $sql);

header("Location: index.php");
exit;

?>
