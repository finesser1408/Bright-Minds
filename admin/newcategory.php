<?php

include("../conn.php");
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $title = $_POST["title"];
    $image = $_FILES["image"]["name"];
    $text = $_POST["text"];

    // Sanitize the data
    $title = mysqli_real_escape_string($con, $title);
    $image = mysqli_real_escape_string($con, $image);

    $text = mysqli_real_escape_string($con, $text);

    // Move uploaded image to folder
    $targetDirectory = "uploads/"; // Set the target directory
    $targetFilePath = $targetDirectory . basename($image); // Get the file path

    if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)) {
        // File moved successfully, insert data into the database
        $sql = "INSERT INTO categories (title, image, description) VALUES ('$title', '$targetFilePath', '$text')";
        
        if ($con->query($sql) === TRUE) {
            header("Location:index.php?message=success");
        } else {
            header("Location:index.php?message=failed");
        }
    } else {
        // Failed to move the uploaded file
        echo "Error uploading the file.";
    }
}
?>