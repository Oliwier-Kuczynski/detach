<?php
    $servername = "localhost";
    $db_username = "root";
    $db_password = "";
    $db_name = "detach";
    $port = 3306;

    $conn = new mysqli($servername, $db_username, $db_password, $db_name, $port);

    if($conn->connect_error) {
        die("Connection failed" . $conn->connect_error);
    }
?>

<!-- if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
    $file = $_FILES['file'];
    
    // Specify the directory where you want to save the uploaded file
    $uploadDir = 'uploads/';
    
    // Create a unique filename to avoid overwriting existing files
    $uploadFile = $uploadDir . uniqid() . '_' . $file['name'];
    
    // Move the uploaded file to the desired location
    if (move_uploaded_file($file['tmp_name'], $uploadFile)) {
        echo "File has been successfully uploaded!";
    } else {
        echo "Failed to move the file to the target directory.";
    }
} else {
    echo "Error occurred during file upload.";
} -->