<?php
$servername = "localhost";
$username = "root"; // Default username for XAMPP
$password = ""; // Default password for XAMPP (usually empty)
$dbname = "brightminds"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT action, item FROM actions";
$result = $conn->query($sql);

$actions = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $actions[] = $row;
    }
}
$conn->close();

// Return the results as a JSON response
header('Content-Type: application/json');
echo json_encode($actions);
?>