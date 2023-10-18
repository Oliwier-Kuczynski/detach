<?php
    session_start();
    session_unset();
    header("Location: login.php");
    exit();
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