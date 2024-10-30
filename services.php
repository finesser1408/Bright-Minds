<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .poem {
            border: 2px solid #333;
            padding: 20px;
            margin-bottom: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 600px;
            margin: auto;
        }

        .poem h2 {
            text-align: center;
            margin-bottom: 15px;
            font-size: 24px;
        }

        .poem img {
            display: block;
            margin: 0 auto 20px;
            max-width: 100%;
            height: auto;
        }

        .poem p {
            text-align: justify;
            font-size: 18px;
            line-height: 1.6;
            color: #555;
        }

        .like-dislike {
            text-align: center;
            margin-top: 20px;
        }

        .like-dislike button {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            margin: 5px;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .like-dislike button:hover {
            background-color: #45a049;
        }

        .dislike-btn {
            background-color: #f44336;
        }

        .dislike-btn:hover {
            background-color: #e53935;
        }

        /* Center the poem container */
        .poem-container {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 30px;
        }
    </style>
</head>
<body>
<?php  include("header.php")  ?>

<!-- Service Section -->
<section id="services">
    <div class="services container">
      <div class="service-top">
        <h1 class="section-title">Serv<span>i</span>ces</h1>

        <br>
        <br>
        <h2>Bright <span style="color: crimson">Minds</span> Poetry offers services like: 
          <br>Poems and Novels compiled by our various authors and poets.
        </h2>
        <p>Bright Minds Poetry is a online platform for posting and challenging your mind in writing and creating wonderful works of art.
          For example the poems below written by young talented minds.</p>
      </div>
     

      </div>
    </div>
  </section>
  <!-- End Service Section -->
<section>

<section id="projects">
    <div class="projects container">
      <div class="projects-header">
        <h1 class="section-title">Recent <span>Projects</span></h1>
      </div>
      <div class="all-projects">


      <?php
              // Display records
              $sql = "SELECT * FROM categories ORDER BY id";
              $result = mysqli_query($con, $sql);
              if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {


              ?>
        <div class="project-item">
          <div class="project-info">
            <h1><?php echo  $row['title']; ?></h1>
            <h2><?php echo  $row['description']; ?></h2>
            <p>
              
            </p>
          </div>
          <div class="project-img">
            <img src="admin/<?php echo  $row['image']; ?>" alt="img">
          </div>
        </div>

        <?php
                }
              } else {
                echo "<h2>0 results</h2>";
              }
              ?>

 

      </div>
    </div>
  </section>
    
<div class="poem-container">

<?php
// Assuming you have a database query to fetch the poem
$sql = "SELECT * FROM poems";
$result = $con->query($sql);

// Check if records exist
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<div class='poem'>";
        echo "<h2>" . $row['title'] . "</h2>";
        /*
        echo "<img src='../uploads-folder/uploads/" . $row['image'] . "' alt='Poem Image'>";
        */
        echo "<p class='justified-text'>" . $row['text'] . "</p>";
        echo "
        <div class='like-dislike'>
            <form action='like_dislike.php' method='POST'>
                <input type='hidden' name='poem_id' value='" . $row['id'] . "'>
                <button type='submit' name='action' value='like'>👍 Like(" . $row['likes'] . ")</button>
                <button type='submit' class='dislike-btn' name='action' value='dislike'>👎 Dislike (" . $row['dislikes'] . ")</button>
            </form>
        </div>";
        echo "</div>";
    }
} else {
    echo "No records found.";
}
?>

</div>
 
  
</section>


<?php  include("footer.php")  ?>
</body>
</html>