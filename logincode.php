<?php

include("conn.php");


$Username = $_POST['email'];
$Password = $_POST['pass'];

$sql = "SELECT * FROM users WHERE email='$Username'";
$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) > 0) {




    // output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        // Check if the password entered by the user matches the hashed password



        if (password_verify($Password, $row['password'])) {

            $_SESSION['Username'] = $row['username'];
            $_SESSION['authenticated'] = 'true';
            if ($row['role'] == 'admin') {
                $_SESSION['role'] = $row['role'];
                echo '<script>alert("Login successful."); window.location = "admin/index.php";</script>';
            } else {
                $_SESSION['role'] = $row['role'];
                echo '<script>alert("Login successful."); window.location = "index.php";</script>';
            }


            exit();
        }
    }
} else {

    echo '<script>alert("Invalid username or password."); window.location = "login.php";</script>';
}
