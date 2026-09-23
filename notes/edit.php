<?php

session_start();

if (!isset($_SESSION["user_id"])) {
    header("Location: ../auth/login.php");
    exit;
}

require_once "../config/database.php";

$user_id = $_SESSION["user_id"];

$note_id = $_GET["id"];

$sql = "SELECT * FROM notes
        WHERE id = '$note_id'
        AND user_id = '$user_id'";

$result = mysqli_query($conn, $sql);

$note = mysqli_fetch_assoc($result);

if (!$note) {
    echo "Note not found.";
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $title = $_POST["title"];
    $content = $_POST["content"];

    $sql = "UPDATE notes
            SET title = '$title',
                content = '$content'
            WHERE id = '$note_id'
            AND user_id = '$user_id'";

    mysqli_query($conn, $sql);

    header("Location: index.php");
    exit;
}

?>

<!DOCTYPE html>

<html>

<head>

    <title>Edit Note - TrustNote</title>

    <link rel="stylesheet" href="css/style.css">

    <style>

        .note-form {
            max-width: 700px;
            margin: 0 auto;
            background: #fffaf0;
            padding: 30px;
            border-radius: 14px;
            border: 1px solid #dfd1b8;
            box-shadow: 0 4px 12px rgba(70, 50, 100, 0.08);
        }

        .note-form label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #342653;
        }

        .note-form input,
        .note-form textarea {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #d8c9ad;
            border-radius: 8px;
            background: #fffdf8;
            font-family: inherit;
            font-size: 16px;
        }

        .note-form textarea {
            min-height: 250px;
            resize: vertical;
        }

        .note-form input:focus,
        .note-form textarea:focus {
            outline: none;
            border-color: #7652c9;
        }

        .save-button {
            border: none;
            background: #7652c9;
            color: white;
            padding: 12px 20px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 15px;
        }

        .save-button:hover {
            background: #6040ad;
        }

        .back-button {
            display: inline-block;
            margin-top: 15px;
            color: #6d4bc3;
            text-decoration: none;
        }

    </style>

</head>

<body>

    <div class="app">

        <aside class="sidebar">

            <h1>TrustNote</h1>

            <p>
                Welcome, <?php echo $_SESSION["username"]; ?>!
            </p>

            <a href="index.php">
                My Notes
            </a>

            <a href="create.php">
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

                <h2>Edit Note</h2>

            </div>


            <div class="note-form">

                <form method="POST">

                    <label>Title</label>

                    <input
                        type="text"
                        name="title"
                        value="<?php echo $note["title"]; ?>"
                        required
                    >


                    <label>Content</label>

                    <textarea
                        name="content"
                        required
                    ><?php echo $note["content"]; ?></textarea>


                    <button
                        type="submit"
                        class="save-button"
                    >
                        Save Changes
                    </button>

                </form>

                <a
                    href="index.php"
                    class="back-button"
                >
                    ← Back to Notes
                </a>

            </div>

        </main>

    </div>

</body>

</html>