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
    
    
    <title>Home</title>
  </head>

  <body>
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
    <div class="top-post">
      <p id="top-text"></p>
      <img id="top-img"></img>
    </div>
<?php
  $comment = "";
  $servername = "localhost";
  $user = "Jake_Adkisson";
  $pass = "testpassword2";
  $db = "phpmyadmin";
  $table = "Comments";
  $dbconnect = mysqli_connect($servername,$user,$pass,$db);
   if(isset($_FILES['image'])){
      $errors= array();
      $file_name = $_FILES['image']['name'];
      $file_size =$_FILES['image']['size'];
      $file_tmp =$_FILES['image']['tmp_name'];
      
      if($file_size > 1048576){
         $errors[]='File size must be 1MB or less';
      }
      
      if(empty($errors)==true){
         move_uploaded_file($file_tmp,"../img/".$file_name);
         echo "Success";
      }
      else{
         print_r($errors);
      }
      $sql = "INSERT INTO ".$table." (Comment_Picture) VALUES (../img/".$file_name.")";
   }
   if(isset($comment)){
      /*$servername = "localhost";
      $user = "Jake_Adkisson";
      $pass = "testpassword2";
      $db = "phpmyadmin";
      $table = "Comments";
      $dbconnect = mysqli_connect($servername,$user,$pass,$db) or die(mysql_error());
      mysql_select_db($dbconnect, $table) or die("cannot connect to database");*/
      $sql = "INSERT INTO ".$table." (Comment_Text) VALUES (".$comment.")";
      
      /*try{
        $connString = "mysql:host=localhost;dbname=init";
        $pdo = new PDO($connString, $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO ".$db." (Comment_Text) VALUES (".$comment.")";
        $result = $pdo->query($sql);
        while($row = $result->fetch()){
          echo $row['ID'] . " - " . $row['CategoryName'] . "<br/>";
        }
        $pdo = null;
      }
      catch (PDOException $e){
        die($e->getMessage());
      }*/
   }
   mysqli_close($dbconnect);
?>
    <div class="upload-container">
          <p>Upload file or text:</p><br><br>
          <form name="form" action="" method="POST">
            <input id="upload" type="file" name="image-upload" accept="image/*" capture>
            <input id="text-upload" type="text"name="text-upload" required placeholder="Maximum 200 characters" value = "<?php echo $comment;?>"capture>
            <input type="submit" value="Submit">
          </form> 
    </div>
    <!-- Footer -->
  </body>
</html>
