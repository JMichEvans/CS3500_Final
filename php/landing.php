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
  </head>
    <!-- Brief Jumbotron w/header -->
    <!-- Top Forums -->

<?php
  require 'message.php'
?>
<div class="comment-test">
          <p>Upload file or text:</p><br><br>
          <form name="form-b" action="" method="POST" enctype="multipart/form-data">
            <input id="comment" type="text"name="comment" required placeholder="Maximum 200 characters" capture>
            <input type="submit" value="Submit">
          </form> 
    </div>
    <div class="upload-container">
          <p>Upload file or text:</p><br><br>
          <form name="form" action="message.php" method="POST" enctype="multipart/form-data">
            <input type="file" name="image" accept="image/*" capture>
            <input id="text-upload" type="text"name="text-upload" required placeholder="Maximum 200 characters" capture>
            <input type="submit" value="Submit">
          </form> 
    </div>
    <!-- Footer -->
  </body>
</html>
