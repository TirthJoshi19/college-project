<?php

session_start();

?>

<!DOCTYPE html>

<html>

<head>

    <title>TrustNote</title>

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

        .home {
            min-height: 100vh;

            display: flex;
            justify-content: center;
            align-items: center;

            padding: 30px;
        }

        .home-card {
            width: 100%;
            max-width: 750px;

            text-align: center;

            background: #fffaf0;

            padding: 60px 40px;

            border-radius: 18px;

            border: 1px solid #dfd1b8;

            box-shadow: 0 8px 25px rgba(70, 50, 100, 0.10);
        }

        .logo {
            margin: 0;

            color: #6d4bc3;

            font-size: 48px;
        }

        .tagline {
            margin-top: 12px;

            color: #665d72;

            font-size: 19px;

            line-height: 1.5;
        }

        .features {
            display: grid;

            grid-template-columns: repeat(3, 1fr);

            gap: 15px;

            margin: 40px 0;
        }

        .feature {
            background: #eee2cc;

            border: 1px solid #d8c9ad;

            border-radius: 10px;

            padding: 20px 12px;
        }

        .feature h3 {
            margin: 0 0 8px;

            color: #5d3faa;

            font-size: 16px;
        }

        .feature p {
            margin: 0;

            color: #665d72;

            font-size: 13px;

            line-height: 1.4;
        }

        .buttons {
            display: flex;

            justify-content: center;

            gap: 15px;
        }

        .button {
            display: inline-block;

            padding: 13px 25px;

            border-radius: 8px;

            text-decoration: none;

            font-size: 15px;
        }

        .login-button {
            background: #7652c9;

            color: white;
        }

        .login-button:hover {
            background: #6040ad;
        }

        .register-button {
            background: #eee2cc;

            color: #5d3faa;

            border: 1px solid #d8c9ad;
        }

        .register-button:hover {
            background: #e2d5bc;
        }

        .dashboard-button {
            margin-top: 15px;

            color: #6d4bc3;

            text-decoration: none;

            font-size: 14px;
        }

        .dashboard-button:hover {
            text-decoration: underline;
        }

        @media (max-width: 650px) {

            .home-card {
                padding: 40px 25px;
            }

            .logo {
                font-size: 38px;
            }

            .features {
                grid-template-columns: 1fr;
            }

            .buttons {
                flex-direction: column;
            }

            .button {
                width: 100%;
            }

        }

    </style>

</head>

<body>

    <div class="home">

        <div class="home-card">

            <h1 class="logo">
                TrustNote
            </h1>

            <p class="tagline">
                A simple and secure place to create,
                manage, and organize your notes.
            </p>


            <div class="features">

                <div class="feature">

                    <h3>
                        Create Notes
                    </h3>

                    <p>
                        Quickly create and save your notes.
                    </p>

                </div>


                <div class="feature">

                    <h3>
                        Stay Organized
                    </h3>

                    <p>
                        Keep all your notes in one place.
                    </p>

                </div>


                <div class="feature">

                    <h3>
                        Your Notes
                    </h3>

                    <p>
                        Access and manage your personal notes.
                    </p>

                </div>

            </div>


            <?php if (isset($_SESSION["user_id"])) { ?>

                <div class="buttons">

                    <a
                        href="dashboard.php"
                        class="button login-button"
                    >
                        Go to Dashboard
                    </a>

                </div>

                <br>

                <a
                    href="auth/logout.php"
                    class="dashboard-button"
                >
                    Logout
                </a>

            <?php } else { ?>

                <div class="buttons">

                    <a
                        href="auth/login.php"
                        class="button login-button"
                    >
                        Login
                    </a>

                    <a
                        href="auth/register.php"
                        class="button register-button"
                    >
                        Register
                    </a>

                </div>

            <?php } ?>

        </div>

    </div>

</body>

</html>