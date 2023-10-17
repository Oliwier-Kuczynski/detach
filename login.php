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
                        $_SESSION["first_name"] = $row["first_name"];
                        $_SESSION["first_name"] = $row["first_name"];
                        $_SESSION["email"] = $row["email"];
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