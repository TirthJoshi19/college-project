<?php

require_once "../config/database.php";

$sql = "SELECT * FROM users";
$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_assoc($result)) {
    echo $row["id"] . "<br>";
    echo $row["name"] . "<br>";
    echo $row["email"] . "<br>";
    echo $row["role"] . "<br>";
    echo "<hr>";
}

?>