<?php 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "brightminds";

// Create connection
$con = new mysqli($servername, $username, $password, $dbname);




if($con->connect_error) {
    die("Failed to connect : ".$con->connect_error);
} 

session_start() ;