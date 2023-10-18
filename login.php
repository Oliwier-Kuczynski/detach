<?php
    session_start()
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

        <form action="login.php" method="post">
            <div>
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>

            <div>
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>

            <button type="submit">Login</button>
        </form>

        <?php
            require_once("connection.php");

            if($_SERVER["REQUEST_METHOD"] == "POST") {
                $email = $_POST["email"];
                $password = $_POST["password"];

                $sql = "SELECT * FROM users WHERE email='$email'";

                if($results = $conn->query($sql)) {
                    $number_of_users = $results->num_rows;
                    
                    
                    if($number_of_users > 0) {
                        $row = $results->fetch_assoc();
                        
                        if(password_verify($password, $row["password"])) {
                            $_SESSION["logged_in"] = true;
                            $_SESSION["first_name"] = $row["first_name"];
                            $_SESSION["last_name"] = $row["first_name"];
                            $_SESSION["email"] = $row["email"];
                            $_SESSION["avatar"] = $row["avatar"];

                            header("Location: account.php");
                        }else {
                            die("Passwords don't match");
                        }
                    }else {
                        die("User doesn't exist");
                    }

                    mysqli_free_result($results);
                } else {
                    die("Something went wrong");
                }
            }

            $conn->close();
        ?>
</body>
</html>