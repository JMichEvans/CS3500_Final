<!DOCTYPE html>
<!-- Landing page -->

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <meta name="description" content="The round table of all things gaming. Take a seat.">
    <meta name="keywords" content="gaming site, gaming forum, esports forum">
    <meta name="author" content="JMichEvans, Jake Adkisson">
    <!--<link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/main-mobile.css">
    <script src="../js/landing.js"></script>-->
    
    <!-- Header -->
    <header>
      <div class="custom-container">
        <div id="custom-branding">
          <a href = "landing.php">JJD</a>
        </div>
        <nav>
          <ul class="">
            <li class="li-right"><a href="#">FORUMS</a></li>
            <li class="li-right"><a href="#">LOGIN</a></li>
            <!--<li><a href="#"><img src="../img/menu_red.png" alt="Menu Icon"></a></li> -->
          </ul>
        </nav>

      </div>
    </header>

    <!-- Brief Jumbotron w/header -->
    <!-- Top Forums -->

<?php
  require 'dbh.inc.php';
  $image = isset($_POST['image']) ? $_POST['image']:'';
  $comment = $_POST['text-upload'];
  $table = "comment";
  $sql = "SELECT * FROM comment ORDER BY Comment_Likes ASC";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
      // output data of each row
      echo "<table>";
      $count = 0;
      while($row = $result->fetch_assoc()) {
        echo "<tr>";
          echo "<td><img src=\"".$row["Comment_Picture"]."\"></td>";
          echo "<td>".$row["Comment_Text"]."</td>";
          echo "<td> Likes: ".$row["Comment_Likes"];
        echo "</tr>";
        $count = $count+1;
      }
      
      echo "</table>";
  } else {
      echo "0 results";
  }
   if(isset($image)){
      move_uploaded_file($_FILES["image"]["tmp_name"],"../img/" . $_FILES["image"]["name"]);
      $file="../img/".$_FILES["image"]["name"];
      echo "FILE = ".$file;
      $sql = "INSERT INTO ".$table." (Comment_Text, Comment_Picture) VALUES ('$comment', '$file')";
      if ($conn->query($sql) === TRUE) {
        //echo "New record created successfully";
      }
      else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
   }
   elseif(isset($comment)){
      $sql = "INSERT INTO ".$table." (Comment_Text) VALUES ('$comment')";
      if ($conn->query($sql) === TRUE) {
        //echo "New record created successfully";
      }
      else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
   }
?>
    <div class="upload-container">
          <p>Upload file or text:</p><br><br>
          <form name="form" action="" method="POST" enctype="multipart/form-data">
            <input type="file" name="image" accept="image/*" capture>
            <input id="text-upload" type="text"name="text-upload" required placeholder="Maximum 200 characters" capture>
            <input type="submit" value="Submit">
          </form> 
    </div>
    <!-- Footer -->
  </body>
</html>
