<?php include("conn.php")  ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Bright Minds</title>
</head>

<body>
<?php  include("header.php")  ?>

    <br><br> <br><br> <br><br> <br><br> <br><br>

    <div class="login" style="height: 20pc; padding-left: 300px;">

        <h1>Welcome New User !!</h1>
        <p>please sign up Now</p>
        <br><br>
        <form action="register.php" method="POST" class="sign-in-form">
            <h2 class="title">Sign up</h2>
            <br>
            <div class="input-field">
                <i class="fas fa-user"></i>
                <input type="text" placeholder="Username" name="username" style="padding: 10px; margin-bottom: 10px; width: 300px;" />
            </div>
            <div cla
            <div class="input-field">
                <i class="fas fa-user"></i>
                <input type="email" placeholder="email" name="email" style="padding: 10px; margin-bottom: 10px; width: 300px;" />
            </div>
            <div class="input-field">
                <i class="fas fa-lock"></i>
                <input type="password" placeholder="Password" name="pass" style="padding: 10px; margin-bottom: 10px; width: 300px;" />
            </div>
            <input type="submit" value="Sign Up" class="btn solid" style="padding: 10px 20px; background-color: #4CAF50; color: #fff; border: none; cursor: pointer;" />
         
        </form>
    </div>


    <br> <br><br><br><br>
    <?php  include("footer.php")  ?>
    <script src="./app.js"></script>
</body>

</html>