<?php
include("../conn.php");

// Get the ID of the record you want to delete
$id = $_GET['id'];
$name = $_GET['name'];
// Prepare the delete statement
// SQL query for deletion
$sql = "DELETE FROM $name WHERE id = '$id'";

// Execute the query
if ($con->query($sql) === TRUE) {
    // Deletion successful
    echo '<script>alert("Delete successful."); window.location = "index.php";</script>';
    exit();
} else {
    // Error occurred
    header("Location: index.php?message=failed");
    exit();
}
?>