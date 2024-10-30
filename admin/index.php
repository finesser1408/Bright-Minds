<?php include("../conn.php")  ;

// Check if user is authenticated
if (!isset($_SESSION['authenticated'])) {
    // Redirect to the login page or display an error message
    header("Location: ../login.php");
    exit;
}
if ($_SESSION['role'] <> 'admin') {
    // Redirect to the login page or display an error message
    echo '<script>alert("Oops youre not an admin."); window.location = "../index.php";</script>';
    exit;
}

?>
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        * {
            box-sizing: border-box
        }

        body {
            font-family: "Lato", sans-serif;
        }

        /* Style the tab */
        .tab {
            float: left;
            border: 1px solid #ccc;
            background-color: #f1f1f1;
            width: 30%;
            height: 300px;
        }

        /* Style the buttons inside the tab */
        .tab button {
            display: block;
            background-color: inherit;
            color: black;
            padding: 22px 16px;
            width: 100%;
            border: none;
            outline: none;
            text-align: left;
            cursor: pointer;
            transition: 0.3s;
            font-size: 17px;
        }

        /* Change background color of buttons on hover */
        .tab button:hover {
            background-color: #ddd;
        }

        /* Create an active/current "tab button" class */
        .tab button.active {
            background-color: #ccc;
        }

        /* Style the tab content */
        .tabcontent {
            float: left;
            padding: 0px 12px;
            border: 1px solid #ccc;
            width: 70%;
            border-left: none;
            height: 300px;
        }

        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: #333;
        }

        li {
            float: left;
        }

        li a {
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        li a:hover:not(.active) {
            background-color: #111;
        }

        .active {
            background-color: #04AA6D;
        }

        input[type=text],
        select,
        textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            resize: vertical;
        }

        label {
            padding: 12px 12px 12px 0;
            display: inline-block;
        }

        input[type=submit] {
            background-color: #04AA6D;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            float: right;
        }

        input[type=submit]:hover {
            background-color: #45a049;
        }

        .container {
            border-radius: 5px;
            background-color: #f2f2f2;
            padding: 20px;
        }

        .col-25 {
            float: left;
            width: 25%;
            margin-top: 6px;
        }

        .col-75 {
            float: left;
            width: 75%;
            margin-top: 6px;
        }

        /* Clear floats after the columns */
        .row::after {
            content: "";
            display: table;
            clear: both;
        }

        /* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
        @media screen and (max-width: 600px) {

            .col-25,
            .col-75,
            input[type=submit] {
                width: 100%;
                margin-top: 0;
            }
        }
    </style>
</head>

<body>


    <ul>
        <li><a href="../index.php">Home</a></li>
        <li><a href="../poems.php">News</a></li>

        <li style="float:right"><a class="active" href="#about">Hello <?php  echo $_SESSION['Username'] ?></a></li>
        <li style="float:right"><a  href="../logout.php">Logout</a></li>
    </ul>
    <br><br><br>
    <div class="content" style="padding: 20px;">
        <div class="tab" style="height: 80vh;">
            <button class="tablinks" onclick="openCity(event, 'London')" id="defaultOpen">Dashboard</button>
            <button class="tablinks" onclick="openCity(event, 'Paris')">Poems</button>
            <button class="tablinks" onclick="openCity(event, 'Tokyo')">Projects</button>
            <button class="tablinks" onclick="openCity(event, 'Projects')">Categories</button>
            <button class="tablinks" onclick="openCity(event, 'Users')">Users</button>
            <button class="tablinks" onclick="openCity(event, 'Messages')">Messages</button>
        </div>

        <div id="London" style="height: 80vh;" class="tabcontent">
            <center>
                <h3>Welcome Admin</h3>
                <p>this is your admin panel where you can add poems</p><?php
                                                                        if (isset($_GET['message'])) {
                                                                            $message = $_GET['message'];

                                                                        ?>
                    <?php if ($message == 'success') { ?>

                        <div class="message" style="background-color: green; width:400px; height:50px; padding-top:1px">
                            <center>
                                <p style="color:white">

                                    POST UPLOADED SUCCESSFULLY

                                </p>
                            </center>
                        </div> <?php
                                                                            } else {
                                ?>


                        <div class="message" style="background-color: red; width:400px; height:50px; padding-top:1px">
                            <center>
                                <p style="color:white">

                                    POST UPLOAD FAILED

                                </p>
                            </center>
                        </div>
            </center>
    <?php
                                                                            }
                                                                        }
    ?>
    <style>
        .stats {
            display: flex;
        }

        .stat {
            flex: 1;
            /* Additional styling for the stat columns */
        }
    </style>
    <br><br><br>
    <div class="stats">
        <div class="stat">
            <?php $sql = "SELECT COUNT(*) AS category_count FROM projects";
            $result = $con->query($sql);

            // Check if the query was successful
            if ($result) {
                // Fetch the result row
                $row = $result->fetch_assoc();

                // Retrieve the category count
                $categoryCount = $row['category_count'];

                // Display the category count

            } ?>

            <center>
                <h3 style="text-transform: uppercase;">total Categories</h3>
                <h1>
                    <?php echo $categoryCount; ?>
                </h1>
            </center>
        </div>
        <div class="stat">
            <?php $sql = "SELECT COUNT(*) AS poem_count FROM poems";
            $result = $con->query($sql);

            // Check if the query was successful
            if ($result) {
                // Fetch the result row
                $row = $result->fetch_assoc();

                // Retrieve the category count
                $poemCount = $row['poem_count'];

                // Display the category count

            } ?>

            <center>
                <h3 style="text-transform: uppercase;">total Poems</h3>
                <h1>
                    <?php echo $poemCount; ?>
                </h1>
            </center>
        </div>
        <div class="stat">
            <?php $sql = "SELECT COUNT(*) AS project_count FROM categories";
            $result = $con->query($sql);

            // Check if the query was successful
            if ($result) {
                // Fetch the result row
                $row = $result->fetch_assoc();

                // Retrieve the category count
                $projectCount = $row['project_count'];

                // Display the category count

            } ?>

            <center>
                <h3 style="text-transform: uppercase;">total projects</h3>
                <h1>
                    <?php echo $projectCount; ?>
                </h1>
            </center>
        </div>
        <br>
        <br>
        <div class="stat">
            <?php $sqlLikes = "SELECT SUM(likes) AS total_likes FROM poems";
            $resultLikes = $con->query($sqlLikes);

            $totalLikes = 0;

            // Check if the query was successful
            if ($resultLikes) {
                // Fetch the result row
                $rowLikes = $resultLikes->fetch_assoc();

                // Retrieve the category count
                $totalLikes = $rowLikes['total_likes'];

                // Display the category count

            } ?>

            <center>
                <h3 style="text-transform: uppercase;">total Likes</h3>
                <h1>
                    <?php echo $totalLikes; ?>
                </h1>
            </center>
        </div>
        <div class="stat2">
            <?php $sqlDislikes = "SELECT SUM(dislikes) AS total_dislikes FROM poems";
            $resultDislikes = $con->query($sqlDislikes);

            $totalDislikes = 0;

            // Check if the query was successful
            if ($resultDislikes) {
                // Fetch the result row
                $rowDislikes = $resultDislikes->fetch_assoc();

                // Retrieve the category count
                $totalDislikes = $rowDislikes['total_dislikes'];

                // Display the category count

            } ?>

            <center>
                <h3 style="text-transform: uppercase;">total Dislikes</h3>
                <h1>
                    <?php echo $totalDislikes; ?>
                </h1>
            </center>
        </div>
    </div>

        </div>

        <div id="Paris" class="tabcontent">
            <div class="container">
                <center>
                    <h3>View Poems</h3>
                    <br>

                    <?php
                    $sql = "SELECT * FROM poems";
                    $result = $con->query($sql);

                    // Check if records exist
                    if ($result->num_rows > 0) {
                        echo "<table>";
                        echo "<tr><th>Title</th><th>Image</th><th>Description</th><th>category</th><th>operations</th></tr>";

                        // Output data of each row
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["title"] . "</td>";

                            if (isset($row["image"])) {
                                echo "<td> <span style='color:green'>&#10003; </span> </td>";
                            }
                            echo "<td>" . substr($row["text"], 0, 100) . "</td>";
                            echo "<td>" . $row["category"] . "</td>";
                            echo "<td> <a href='delete.php?name=poems&id=" . $row["id"] . "'>Delete</a></td>";
                            echo "</tr>";
                        }

                        echo "</table>";
                    } else {
                        echo "No records found.";
                    }
                    ?>
                    <br>
                    
                    <h3>Add Poems</h3>
                    <br>
                </center>
                <form action="newpost.php" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-25">
                            <label for="fname">Title</label>
                        </div>
                        <div class="col-75">
                            <input type="text" id="fname" name="title" placeholder="Your title..">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="lname">Image</label>
                        </div>
                        <br>
                        <div class="col-75">
                            <input type="file" id="lname" name="image" placeholder="Your last name..">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="country">Category</label>
                        </div>
                        <div class="col-75">
                            <select id="country" name="category">
                            <?php
                    $sql = "SELECT * FROM projects";
                    $result = $con->query($sql);

                    // Check if records exist
                    if ($result->num_rows > 0) {
                
                        // Output data of each row
                        while ($row = $result->fetch_assoc()) { ?>
                                <option value="<?php echo $row["title"] ;  ?>"><?php echo $row["title"] ;  ?></option>
                                <?php  }} ?>
                        
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="subject">Text</label>
                        </div>
                        <div class="col-75">
                            <textarea id="subject" name="text" placeholder="Write something.." style="height:200px"></textarea>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <input type="submit" value="Submit">
                    </div>
                </form>

                
   <form action="newpost.php" method="POST" enctype="multipart/form-data">
       <input type="text" name="title" placeholder="Title">
       <input type="file" name="image">
       <select name="category">
           <?php
           $sql = "SELECT * FROM projects";
           $result = $con->query($sql);
           if ($result->num_rows > 0) {
               while ($row = $result->fetch_assoc()) {
                   echo "<option value='" . $row["title"] . "'>" . $row["title"] . "</option>";
               }
           }
           ?>
       </select>
       <textarea name="text" placeholder="Text"></textarea>
       <input type="submit" value="Submit">
   </form>

            </div>
        </div>
        <div id="Tokyo" class="tabcontent">
            <div class="container">
                <center>
                    <h3>View Projects</h3>
                    <br>

                    <?php
                    $sql = "SELECT * FROM categories";
                    $result = $con->query($sql);

                    // Check if records exist
                    if ($result->num_rows > 0) {
                        echo "<table>";
                        echo "<tr><th>Title</th><th>Image</th><th>Description</th><th>operations</th></tr>";

                        // Output data of each row
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["title"] . "</td>";

                            if (isset($row["image"])) {
                                echo "<td> <span style='color:green'>&#10003; </span> </td>";
                            }
                            echo "<td>" . $row["description"] . "</td>";
                            echo "<td> <a href='delete.php?name=categories&id=" . $row["id"] . "'>Delete</a></td>";
                            echo "</tr>";
                        }

                        echo "</table>";
                    } else {
                        echo "No records found.";
                    }
                    ?>
                    <br>
                    <br>
                    <h3>Add Projects</h3>
                    <br>
                </center>
                <form action="newcategory.php" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-25">
                            <label for="fname">Title</label>
                        </div>
                        <div class="col-75">
                            <input type="text" id="fname" name="title" placeholder="Your title..">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-25">
                            <label for="lname">Image</label>
                        </div>
                        <br>
                        <div class="col-75">
                            <input type="file" id="lname" name="image" placeholder="Your last name..">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-25">
                            <label for="subject">Text</label>
                        </div>
                        <div class="col-75">
                            <textarea id="subject" name="text" placeholder="Write something.." style="height:200px"></textarea>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <input type="submit" value="Submit">
                    </div>
                </form>
            </div>
        </div>
        <div id="Projects" class="tabcontent">
            <div class="container">
                <style>
                    table {
                        width: 50%;
                        border-collapse: collapse;
                    }

                    table,
                    th,
                    td {
                        border: 1px solid black;
                    }

                    th,
                    td {
                        padding: 8px;
                    }

                    th {
                        background-color: #f2f2f2;
                    }
                </style>
                <center>
                    <h3>View Categories</h3>
                    <br>

                    <?php
                    $sql = "SELECT * FROM projects";
                    $result = $con->query($sql);

                    // Check if records exist
                    if ($result->num_rows > 0) {
                        echo "<table>";
                        echo "<tr><th>Title</th><th>Image</th><th>Description</th><th>link</th><th>operations</th></tr>";

                        // Output data of each row
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["title"] . "</td>";

                            if (isset($row["image"])) {
                                echo "<td> <span style='color:green'>&#10003; </span> </td>";
                            }
                            echo "<td>" . $row["description"] . "</td>";
                            echo "<td><a href='" . $row["link"] . "' downoload>DOWNLOAD</a></td>";
                            echo "<td> <a href='delete.php?name=projects&id=" . $row["id"] . "'>Delete</a></td>";
                            echo "</tr>";
                        }

                        echo "</table>";
                    } else {
                        echo "No records found.";
                    }
                    ?>
                    <br>
                    <h3>Add Categories</h3>
                    <br>
                </center>
                <form action="newproject.php" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-25">
                            <label for="fname">Title</label>
                        </div>
                        <div class="col-75">
                            <input type="text" id="fname" name="title" placeholder="Your title..">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="fname">link</label>
                        </div>
                        <div class="col-75">
                            <input type="text" id="fname" name="link" placeholder="http://...">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="lname">Image</label>
                        </div>
                        <br>
                        <div class="col-75">
                            <input type="file" id="lname" name="image" placeholder="Your last name..">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-25">
                            <label for="subject">Text</label>
                        </div>
                        <div class="col-75">
                            <textarea id="subject" name="text" placeholder="Write something.." style="height:200px"></textarea>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <input type="submit" value="Submit">
                    </div>
                </form>
            </div>
        </div>
        <div id="Users" class="tabcontent">
            <div class="container">
                <style>
                    table {
                        width: 50%;
                        border-collapse: collapse;
                    }

                    table,
                    th,
                    td {
                        border: 1px solid black;
                    }

                    th,
                    td {
                        padding: 8px;
                    }

                    th {
                        background-color: #f2f2f2;
                    }
                </style>
                <center>
                    <h3>View Users</h3>
                    <br>

                    <?php
                    $sql = "SELECT * FROM users";
                    $result = $con->query($sql);

                    // Check if records exist
                    if ($result->num_rows > 0) {
                        echo "<table>";
                        echo "<tr><th>Username</th><th>Email</th><th>Role</th><th>operations</th></tr>";

                        // Output data of each row
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["username"] . "</td>";

                        
                            echo "<td>" . $row["email"] . "</td>";
                            echo "<td>" . $row["role"] . "</td>";
                            echo "<td> <a href='delete.php?name=users&id=" . $row["id"] . "'>Delete</a></td>";
                            echo "</tr>";
                        }

                        echo "</table>";
                    } else {
                        echo "No records found.";
                    }
                    ?>
                    <br>
              
                </center>
     
            </div>
        </div>
        <div id="Messages" class="tabcontent">
            <div class="container">
                <style>
                    table {
                        width: 50%;
                        border-collapse: collapse;
                    }

                    table,
                    th,
                    td {
                        border: 1px solid black;
                    }

                    th,
                    td {
                        padding: 8px;
                    }

                    th {
                        background-color: #f2f2f2;
                    }
                </style>
                <center>
                    <h3>View Messages</h3>
                    <br>

                    <?php
                    $sql = "SELECT * FROM messages";
                    $result = $con->query($sql);

                    // Check if records exist
                    if ($result->num_rows > 0) {
                        echo "<table>";
                        echo "<tr><th>username</th><th>Email</th><th>Phone number</th><th>Poem</th><th>operations</th></tr>";

                        // Output data of each row
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["name"] . "</td>";

                        
                            echo "<td>" . $row["email"] . "</td>";
                            echo "<td>" . $row["subject"] . "</td>";
                            echo "<td>" . $row["message"] . "</td>";
                            echo "<td> <a href='delete.php?name=messages&id=" . $row["id"] . "'>Delete</a></td>";
                            echo "</tr>";
                        }

                        echo "</table>";
                    } else {
                        echo "No records found.";
                    }
                    ?>
                    <br>
                      
                      <h3>View Poems</h3>
                      <br>
                      <?php
                      $sql = "SELECT id, title, likes, dislikes FROM poems";
                      $result = $con->query($sql);

                      if ($result->num_rows > 0){
                        echo "<table>";
                        echo "<tr> <th> Title </th> <th> Likes </th> <th> Dislikes </th> </tr>";
                         
                        while ($row = $result->fetch_assoc()){
                            echo "<tr>";
                            echo "<td>" . $row['title'] . "</td>";
                            echo "<td>" . $row['likes'] . "</td>";
                            echo "<td>" . $row['dislikes'] . "</td>";
                            echo "</tr>";
                        }
                        echo "</table>";
                      }
                      else {
                        echo "No records found.";
                      }
                    ?>
                </center>
     
            </div>
        </div>
    </div>


    </div>

    <script>
        function openCity(evt, cityName) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            document.getElementById(cityName).style.display = "block";
            evt.currentTarget.className += " active";
        }

        // Get the element with id="defaultOpen" and click on it
        document.getElementById("defaultOpen").click();
    </script>

</body>

</html>