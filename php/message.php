<?php
  require 'landing.php';
  require 'dbh.inc.php';
  $image = isset($_POST['image']) ? $_POST['image']:'';
  $comment = $_POST['text-upload'];
  $table = "comment";
  $sql = "SELECT * FROM comment ORDER BY Comment_Likes ASC";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
      // output data of each row
      echo "<table class=\"feed\">";
      $count = 0;
      while($row = $result->fetch_assoc()) {
        echo "<tr>";
          echo "<td><img class=\"uploaded-image\" src=\"".$row["Comment_Picture"]."\"></td>";
          echo "<td class=\"comments\">".$row["Comment_Text"]."</td>";
          echo "<td  class=\"comments\"> Likes: <b id=\"".$count."\">".$row["Comment_Likes"]."</b></td>";
          echo "<td class=\"comments\"><button type=\"button\" onclick=\"like_function('".$count."')\">Like!</button></td>";
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
