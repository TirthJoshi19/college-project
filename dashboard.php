<?php

session_start();

if (!isset($_SESSION["user_id"])) {
    header("Location: auth/login.php");
    exit;
}

?>

<!DOCTYPE html>

<html>

<head>

    <title>TrustNote - Dashboard</title>

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

        .dashboard {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 30px;
        }

        .dashboard-card {
            width: 100%;
            max-width: 700px;
            background: #fffaf0;
            padding: 40px;
            border-radius: 16px;
            border: 1px solid #dfd1b8;
            box-shadow: 0 8px 25px rgba(70, 50, 100, 0.10);
        }

        .logo {
            margin: 0;
            color: #6d4bc3;
            font-size: 32px;
        }

        .welcome {
            margin-top: 8px;
            color: #5d5668;
            font-size: 18px;
        }

        .welcome span {
            color: #5d3faa;
            font-weight: bold;
        }

        .description {
            margin-top: 30px;
            margin-bottom: 20px;
            color: #665d72;
        }

        .actions {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 15px;
        }

        .action-card {
            display: block;
            padding: 20px;
            background: #eee2cc;
            border: 1px solid #d8c9ad;
            border-radius: 12px;
            text-decoration: none;
            color: #342653;
        }

        .action-card:hover {
            background: #e2d5bc;
        }

        .action-card h3 {
            margin: 0 0 8px 0;
            color: #5d3faa;
        }

        .action-card p {
            margin: 0;
            color: #665d72;
            font-size: 14px;
        }

        .admin-card {
            margin-top: 15px;
            background: #e8def5;
            border-color: #cdbce5;
        }

        .logout {
            display: inline-block;
            margin-top: 25px;
            color: #6d4bc3;
            text-decoration: none;
        }

        .logout:hover {
            color: #4f329c;
            text-decoration: underline;
        }

        .user-info {
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #dfd1b8;
            color: #665d72;
            font-size: 14px;
        }

        .user-info p {
            margin: 6px 0;
        }

        .user-info strong {
            color: #342653;
        }

        @media (max-width: 600px) {

            .dashboard {
                padding: 15px;
            }

            .dashboard-card {
                padding: 25px;
            }

            .actions {
                grid-template-columns: 1fr;
            }

        }

    </style>

</head>

<body>

    <div class="dashboard">

        <div class="dashboard-card">

            <h1 class="logo">
                TrustNote
            </h1>

            <p class="welcome">
                Welcome, 
                <span>
                    <?php echo $_SESSION["username"]; ?>
                </span>!
            </p>


            <p class="description">
                What would you like to do?
            </p>


            <div class="actions">

                <a
                    href="notes/index.php"
                    class="action-card"
                >

                    <h3>
                        My Notes
                    </h3>

                    <p>
                        View and manage your notes.
                    </p>

                </a>


                <a
                    href="notes/create.php"
                    class="action-card"
                >

                    <h3>
                        Create Note
                    </h3>

                    <p>
                        Create a new note.
                    </p>

                </a>

            </div>


            <?php if ($_SESSION["role"] == "admin") { ?>

                <a
                    href="admin/index.php"
                    class="action-card admin-card"
                >

                    <h3>
                        Admin Dashboard
                    </h3>

                    <p>
                        Manage TrustNote users.
                    </p>

                </a>

            <?php } ?>


            <a
                href="auth/logout.php"
                class="logout"
            >
                Logout
            </a>


            <div class="user-info">

                <p>
                    <strong>User ID:</strong>
                    <?php echo $_SESSION["user_id"]; ?>
                </p>

                <p>
                    <strong>Role:</strong>
                    <?php echo $_SESSION["role"]; ?>
                </p>

            </div>

        </div>

    </div>

</body>

</html>