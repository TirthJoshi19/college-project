<?php

require_once "config/database.php";

$sql = "SELECT * FROM users";
$result = mysqli_query($conn, $sql);

echo "<h1>Users</h1>";

echo "Number of users: " . mysqli_num_rows($result);

echo "<hr>";

while ($row = mysqli_fetch_assoc($result)) {

    echo "ID: " . $row["id"] . "<br>";
    echo "Username: " . $row["username"] . "<br>";
    echo "Password: " . $row["password"] . "<br>";
    echo "Role: " . $row["role"] . "<br>";
    echo "Created: " . $row["created_at"] . "<br>";

    echo "<hr>";
}

?>