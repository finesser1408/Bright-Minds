<?php

include("../conn.php");
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $title = $_POST["title"];
    $image = $_FILES["image"]["name"];
    $category = $_POST["category"];
    $text = $_POST["text"];

    // Sanitize the data
    $title = mysqli_real_escape_string($con, $title);
    $image = mysqli_real_escape_string($con, $image);
    $category = mysqli_real_escape_string($con, $category);
    $text = mysqli_real_escape_string($con, $text);

    // Move uploaded image to folder
    $targetDirectory = "uploads/"; // Set the target directory
    $targetFilePath = $targetDirectory . basename($image); // Get the file path

    if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)) {
        // File moved successfully, insert data into the database
        $sql = "INSERT INTO poems (title, image, category, text) VALUES ('$title', '$targetFilePath', '$category', '$text')";
        
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


include("../conn.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $category = $_POST['category'];
    $text = $_POST['text'];
    $image = $_FILES['image']['name'];
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);

    // Upload the image
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        $sql = "INSERT INTO poems (title, image, text, category) VALUES ('$title', '$image', '$text', '$category')";
        if ($con->query($sql) === TRUE) {
            header("Location: dashboard.php?message=success");
        } else {
            header("Location: dashboard.php?message=failure");
        }
    } else {
        echo "Error uploading file.";
    }
}
?>
