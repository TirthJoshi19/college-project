<?php

session_start();

if (!isset($_SESSION["user_id"])) {
    header("Location: ../auth/login.php");
    exit;
}

require_once "../config/database.php";

$user_id = $_SESSION["user_id"];

$sql = "SELECT * FROM notes
        WHERE user_id = '$user_id'
        ORDER BY created_at DESC";

$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>

<html>

<head>

    <title>TrustNote</title>

    <link rel="stylesheet" href="css/style.css">

</head>

<body>

    <div class="app">

        <aside class="sidebar">

            <h1>TrustNote</h1>

            <p>
                Welcome, <?php echo $_SESSION["username"]; ?>!
            </p>

            <a href="create.php" class="create-button">
                + Create Note
            </a>

            <a href="../dashboard.php">
                Dashboard
            </a>

            <a href="../auth/logout.php">
                Logout
            </a>

        </aside>


        <main class="main-content">

            <div class="top-bar">

                <h2>My Notes</h2>

            </div>


            <div class="notes-grid">

                <?php

                if (mysqli_num_rows($result) == 0) {

                    echo "<p>You don't have any notes yet.</p>";

                } else {

                    while ($note = mysqli_fetch_assoc($result)) {

                ?>

                        <div class="note-card">

                            <h3><?php echo $note["title"]; ?></h3>

                            <p><?php echo $note["content"]; ?></p>

                            <div class="note-actions">

                                <a href="edit.php?id=<?php echo $note["id"]; ?>">
                                    Edit
                                </a>

                                <a href="delete.php?id=<?php echo $note["id"]; ?>">
                                    Delete
                                </a>

                            </div>

                        </div>

                <?php

                    }

                }

                ?>

            </div>

        </main>

    </div>

</body>

</html>