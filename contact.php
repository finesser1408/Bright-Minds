<?php

include("conn.php");



// Retrieve form values
$name = mysqli_real_escape_string($con, $_POST['name']);
$email = mysqli_real_escape_string($con, $_POST['email']);
$subject = mysqli_real_escape_string($con, $_POST['phone']);
$message = mysqli_real_escape_string($con, $_POST['message']);

// Generate a timestamp


// SQL query for insertion
$sql = "INSERT INTO messages (name, email, subject, message) VALUES ('$name', '$email', '$subject', '$message')";

// Execute the query
if ($con->query($sql) === TRUE) {
    // Insertion successful
    echo '<script>alert("Message Sent successfully."); window.location = "index.php";</script>';
    exit();
} else {
    // Error occurred
    echo '<script>alert("Message failed."); window.location = "index.php";</script>';
    exit();
}


?>