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
<body class="account container">
    <nav class="primary-nav flex">
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
    <?php
        if(!isset($_SESSION["logged_in"])) {
            header("Location: login.php");
            exit();
        }

        
        echo "<h1>Welcome, {$_SESSION["first_name"]} 👋</h1>";

        if (isset($_SESSION["avatar"])) {
            echo "<img src='{$_SESSION["avatar"]}' alt='User Avatar' class='avatar'>";
        } else {
            echo "<img src='./images/default-avatar.png' alt='Default Avatar' class='avatar'>";
        }

        echo <<<END
        <form action="account.php" method="post" enctype="multipart/form-data">
            <lable for="file">Upload your avatar</label>
            <input type="file" name="file" id="file">
            <button type="submit">Upload</button>
        </form>
        <table>
            <thead>
                <tr>
                    <th colspan="2">Dane Uzytkownika</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Imie</td>
                    <td>{$_SESSION["first_name"]}</td>
                </tr>
                <tr>
                    <td>Nazwisko</td>
                    <td>{$_SESSION["last_name"]}</td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>{$_SESSION["email"]}</td>
                </tr>
            </tbody>
        </table>
        END;

        require_once("connection.php");

        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $target_dir = "uploads/";
            $target_file = $target_dir . basename($_FILES["file"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

            $sql = "UPDATE users SET avatar='$target_file' WHERE email='{$_SESSION["email"]}'";

            if(isset($_POST["submit"])) {
                $check = getimagesize($_FILES["file"]["tmp_name"]);
                if($check !== false) {
                    echo "File is an image - " . $check["mime"] . ".";
                    $uploadOk = 1;
                }else {
                    echo "File is not an image.";
                    $uploadOk = 0;
                }
            }

            if(file_exists($target_file)) {
                echo "Sorry, file already exists.";
                $uploadOk = 0;
            }

            if($_FILES["file"]["size"] > 5000000) {
                echo "Sorry, your file is too large.";
                $uploadOk = 0;
            }

            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
                echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                $uploadOk = 0;
            }

            if($uploadOk == 0) {
                echo "Sorry, your file was not uploaded.";
            }else {
                if(move_uploaded_file($_FILES["file"]["tmp_name"], $target_file) && $conn->query($sql)) {
                    $_SESSION["avatar"] = $target_file;
                    echo "The file " . htmlspecialchars(basename($_FILES["file"]["name"])) . " has been uploaded.";
                    header("Location: account.php");
                }else {
                    echo "Sorry, there was an error uploading your file.";
                }
            }
        }

        $conn->close();
    ?>
</body>
</html>