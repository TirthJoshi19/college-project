<?php

session_start();

require_once "../config/database.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST["username"];

    $password = $_POST["password"];

    $sql = "SELECT * FROM users WHERE username = '$username'";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {

        $user = mysqli_fetch_assoc($result);

        if (password_verify($password, $user["password"])) {

            $_SESSION["user_id"] = $user["id"];
            $_SESSION["username"] = $user["username"];
            $_SESSION["role"] = $user["role"];


            if ($user["role"] == "admin") {

                header("Location: ../admin/index.php");
                exit;

            } else {

                header("Location: ../dashboard.php");
                exit;

            }

        } else {

            $error = "Wrong password!";

        }

    } else {

        $error = "User not found!";

    }

}

?>

<!DOCTYPE html>

<html>

<head>

    <title>Login - TrustNote</title>

    <link rel="stylesheet" href="css/style.css">

</head>

<body>

    <div class="auth-page">

        <div class="auth-card">

            <h1>
                TrustNote
            </h1>

            <p class="subtitle">
                Welcome back! Login to your account.
            </p>


            <?php if (isset($error)) { ?>

                <p class="error">
                    <?php echo $error; ?>
                </p>

            <?php } ?>


            <form method="POST">

                <label>
                    Username
                </label>

                <input
                    type="text"
                    name="username"
                    placeholder="Enter your username"
                    required
                >


                <label>
                    Password
                </label>

                <input
                    type="password"
                    name="password"
                    placeholder="Enter your password"
                    required
                >


                <button type="submit">
                    Login
                </button>

            </form>


            <p class="register-text">
                Don't have an account?
                <a href="register.php">
                    Register
                </a>
            </p>

        </div>

    </div>

</body>

</html>