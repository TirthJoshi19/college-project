<?php

require_once "../config/database.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST["username"];

    $password = $_POST["password"];

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (username, password, role)
            VALUES ('$username', '$hashedPassword', 'user')";

    mysqli_query($conn, $sql);

    $success = "User created successfully!";

}

?>

<!DOCTYPE html>

<html>

<head>

    <title>Register - TrustNote</title>

    <link rel="stylesheet" href="css/style.css">

</head>

<body>

    <div class="auth-page">

        <div class="auth-card">

            <h1>
                TrustNote
            </h1>

            <p class="subtitle">
                Create your TrustNote account.
            </p>


            <?php if (isset($success)) { ?>

                <p class="success">
                    <?php echo $success; ?>
                </p>

            <?php } ?>


            <form method="POST">

                <label>
                    Username
                </label>

                <input
                    type="text"
                    name="username"
                    placeholder="Choose a username"
                    required
                >


                <label>
                    Password
                </label>

                <input
                    type="password"
                    name="password"
                    placeholder="Choose a password"
                    required
                >


                <button type="submit">
                    Register
                </button>

            </form>


            <p class="register-text">

                Already have an account?

                <a href="login.php">
                    Login
                </a>

            </p>

        </div>

    </div>

</body>

</html>