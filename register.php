<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <link rel="icon" href="./images/detach.svg" />
    <title>Detach</title>
</head>
<body>
    <nav class="primary-nav flex container">
        <div class="primary-nav__logo-container flex xsm-gap">
          <img src="./images/detach.svg" alt="detach" />
          <p>detach</p>
        </div>
        <div class="flex bg-gap">
          <a href="#">How to use</a>
          <a href="#">Tools & API</a>
          <a href="#">Pricing</a>
          <a href="#">Contact</a>
        </div>
        <div class="flex bg-gap">
          <?php
            if(isset($_SESSION["logged_in"])) {
              echo "<a href='account.php'>Account</a>";
              echo "<a href='logout.php'>Log out</a>";
            }else {
              echo "<a href='login.php'>Log in</a>";
              echo "<a href='register.php'>Sign up</a>";
            }
          ?>
        </div>
      </nav>

        <form action="register.php" method="post">
            <div>
                <label for="first-name">First name</label>
                <input type="text" id="first-name" name="first-name" required>
            </div>

            <div>
                <label for="last-name">Last name</label>
                <input type="text" id="last-name" name="last-name" required>
            </div>

            <div>
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>

            <div>
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>

            <div>
                <label for="confirm-password">Confirm password</label>
                <input type="password" id="confirm-password" name="confirm-password" required>
            </div>

            <button type="submit">Register</button>
        </form>

        <?php
            require_once("connection.php");

            if($_SERVER["REQUEST_METHOD"] == "POST") {
                $first_name = $_POST["first-name"];
                $last_name = $_POST["last-name"];
                $email = $_POST["email"];
                $password = $_POST["password"];
                $confirm_password = $_POST["confirm-password"];

                if (empty($first_name) || empty($last_name) || empty($email) || empty($password) || empty($confirm_password)) {
                    die("Required values are empty");
                }

                if($password !== $confirm_password) {
                    die("Passwords don't match");
                }

                $sql = "SELECT * FROM users WHERE email = '$email'";

                if($results = $conn->query($sql)) {
                    $number_of_users = $results->num_rows;
                    mysqli_free_result($results);

                    if($number_of_users > 0) {
                        die("User already exist");
                    } else {
                        $password = password_hash($password, PASSWORD_DEFAULT);

                        $sql = "INSERT INTO users (first_name, last_name, email, password) VALUES ('$first_name', '$last_name', '$email', '$password')";

                        if($conn->query($sql) == "TRUE") {
                            header("Location: login.php");
                        }
                    }
                } else {
                    die("Something went wrong");
                }
            }

            $conn->close();
        ?>
</body>
</html>