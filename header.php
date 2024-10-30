<?php  include("conn.php")  ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Bright Minds</title>
</head>

<body>
  <!-- Header -->
  <section id="header" style="background-color: #2D3742; z-index:99">
    <div class="header container" style="background-color: #2D3742; z-index:99">
      <div class="nav-bar">
        <div class="brand">
          <a href="#hero">
            <h1>
              <b><span>B</span>right <span>M</span>inds <span>P</span>oetry</b>
            </h1>
          </a>
        </div>
        <div class="nav-list">
          <div class="hamburger">
            <div class="bar"></div>
          </div>
          <ul>
            <li><a href="index.php" data-after="Home">Home</a></li>
            <li><a href="services.php" data-after="Service">Services</a></li>
       
            <li><a href="about.php" data-after="About">About</a></li>
            <li><a href="cont.php" data-after="Contact">Contact</a></li>

            <?php if (!isset($_SESSION['Username'])){ ?>
            <li><a href="login.php" data-after="Login">Login</a></li>
            <li><a href="signup.php" data-after="Register">Register</a></li>
            <?php }else{  ?>
                <?php if ($_SESSION['role'] == 'admin' ){ ?>
              <li><a href="admin/index.php" data-after="Hello User">Hello  <?php  echo $_SESSION['Username'] ?></a></li>
              <?php }else{  ?>

                <li><a href="signup.php" data-after="Hello User">Hello  <?php  echo $_SESSION['Username'] ?></a></li>
                <?php } ; ?>
              <li><a href="logout.php" data-after="Logout">Logout</a></li>
              <?php } ; ?>
          </ul>
        </div>
      </div>
    </div>
  </section>
  <script src="./app.js"></script>
</body>
</html>