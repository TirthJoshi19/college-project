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

$sql = "SELECT id, username, role, created_at FROM users";

$result = mysqli_query($conn, $sql);

$user_count = mysqli_num_rows($result);

?>

<!DOCTYPE html>

<html>

<head>

    <title>TrustNote - Admin Dashboard</title>

    <style>

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f3ead8;
            color: #29213d;
        }

        .admin-page {
            min-height: 100vh;
            padding: 40px;
        }

        .container {
            max-width: 1000px;
            margin: 0 auto;
        }

        .header {
            margin-bottom: 30px;
        }

        .header h1 {
            margin: 0;
            color: #6d4bc3;
            font-size: 32px;
        }

        .header p {
            color: #665d72;
            margin-top: 8px;
        }

        .stats-card {
            display: inline-block;
            background: #fffaf0;
            border: 1px solid #dfd1b8;
            border-radius: 12px;
            padding: 20px 30px;
            margin-bottom: 30px;
            box-shadow: 0 4px 12px rgba(70, 50, 100, 0.08);
        }

        .stats-card h2 {
            margin: 0;
            color: #5d3faa;
            font-size: 30px;
        }

        .stats-card p {
            margin: 5px 0 0;
            color: #665d72;
        }

        .users-section {
            background: #fffaf0;
            border: 1px solid #dfd1b8;
            border-radius: 14px;
            padding: 25px;
            box-shadow: 0 4px 12px rgba(70, 50, 100, 0.08);
        }

        .users-section h2 {
            margin-top: 0;
            color: #342653;
        }

        .user-card {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;

            padding: 18px;
            margin-top: 12px;

            background: #eee2cc;
            border: 1px solid #d8c9ad;
            border-radius: 10px;
        }

        .user-info {
            flex: 1;
        }

        .user-info strong {
            color: #5d3faa;
            font-size: 17px;
        }

        .user-info p {
            margin: 5px 0;
            color: #665d72;
            font-size: 14px;
        }

        .role {
            display: inline-block;
            padding: 5px 10px;
            border-radius: 20px;
            background: #e8def5;
            color: #5d3faa;
            font-size: 13px;
            font-weight: bold;
        }

        .delete-button {
            text-decoration: none;
            color: #9b3f52;
            background: #f3dce0;
            padding: 9px 14px;
            border-radius: 7px;
            font-size: 14px;
        }

        .delete-button:hover {
            background: #eac8ce;
        }

        .navigation {
            margin-top: 25px;
        }

        .navigation a {
            display: inline-block;
            text-decoration: none;
            color: #6d4bc3;
            margin-right: 20px;
        }

        .navigation a:hover {
            color: #4f329c;
            text-decoration: underline;
        }

        @media (max-width: 600px) {

            .admin-page {
                padding: 20px;
            }

            .user-card {
                align-items: flex-start;
                flex-direction: column;
            }

            .delete-button {
                width: 100%;
                text-align: center;
            }

        }

    </style>

</head>

<body>

    <div class="admin-page">

        <div class="container">


            <div class="header">

                <h1>
                    TrustNote Admin
                </h1>

                <p>
                    Welcome, <?php echo $_SESSION["username"]; ?>!
                </p>

            </div>


            <div class="stats-card">

                <h2>
                    <?php echo $user_count; ?>
                </h2>

                <p>
                    Total Users
                </p>

            </div>


            <div class="users-section">

                <h2>
                    All Users
                </h2>


                <?php

                while ($user = mysqli_fetch_assoc($result)) {

                ?>

                    <div class="user-card">

                        <div class="user-info">

                            <strong>
                                <?php echo $user["username"]; ?>
                            </strong>

                            <p>
                                User ID: <?php echo $user["id"]; ?>
                            </p>

                            <p>
                                Created: <?php echo $user["created_at"]; ?>
                            </p>

                        </div>


                        <span class="role">
                            <?php echo $user["role"]; ?>
                        </span>


                        <a
                            href="delete-user.php?id=<?php echo $user["id"]; ?>"
                            class="delete-button"
                        >
                            Delete
                        </a>

                    </div>

                <?php

                }

                ?>

            </div>


            <div class="navigation">

                <a href="../dashboard.php">
                    ← Back to Dashboard
                </a>

                <a href="../auth/logout.php">
                    Logout
                </a>

            </div>


        </div>

    </div>

</body>

</html>