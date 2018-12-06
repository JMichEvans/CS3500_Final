<!DOCTYPE html>
<!-- Landing page -->

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <meta name="description" content="The round table of all things gaming. Take a seat.">
    <meta name="keywords" content="gaming site, gaming forum, esports forum">
    <meta name="author" content="JMichEvans, Jake Adkisson">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/main-mobile.css">
    <script src="../js/landing.js"></script>
    <title>Terms of Service</title>
  </head>
    <!-- Brief Jumbotron w/header -->
    <!-- Top Forums -->

<?php
  require "header.php";
  require "includes/dbh.inc.php";
  $image = isset($_POST['image']) ? $_POST['image']:'';
  $comment = isset($_POST['text-upload']) ? $_POST['text-upload']:'';
  $sql = "SELECT DISTINCT * FROM comment ORDER BY Comment_Likes ASC";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
      // output data of each row
      echo "<table class=\"feed\">";
      $count = 0;
      while($row = $result->fetch_assoc()) {
        echo "<tr>";
          echo "<td><img class=\"uploaded-image\" src=\"".$row["Comment_Picture"]."\"></td>";
          echo "<td class=\"comments\">".$row["Comment_Text"]."</td>";
          echo "<td  class=\"comments\"> <br>Likes: <b id=\"".$count."\">".$row["Comment_Likes"]."</b>";
          echo "<br><button type=\"button\" onclick=\"like_function('".$count."')\">Like!</button></td>";
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
      //echo "FILE = ".$file;
      $sql = "INSERT INTO COMMENT (Comment_Text, Comment_Picture) VALUES ('$comment', '$file')";
      if ($conn->query($sql) === TRUE) {
        //echo "New record created successfully";
      }
      else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
   }
   elseif(isset($comment)){
      $sql = "INSERT INTO COMMENT (Comment_Text) VALUES ('$comment')";
      if ($conn->query($sql) === TRUE) {
        //echo "New record created successfully";
      }
      else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
   }
  //require "message.php";
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
