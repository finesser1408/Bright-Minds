<?php

include("conn.php") ;

$username=$_POST['username'];
$email = $_POST['email'];
$Password= $_POST['pass'];
$role = 'user';


$hashed_password = password_hash($Password, PASSWORD_DEFAULT);

$stmt = $con->prepare("INSERT INTO users (username,email, password,role) VALUES (?, ?,?, ?)");
$stmt->bind_param("ssss", $username,$email,$hashed_password,$role);

if ($stmt->execute()) {
  echo "<script>alert('User successfully added you may now login'); window.location = 'login.php';</script>";

} else {
  echo "<script>alert('Something went wrong'); window.location = 'signup.php';</script>";
}


$stmt->close();
$con->close();