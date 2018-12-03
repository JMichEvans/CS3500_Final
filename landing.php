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
    <script type="text/javascript" src="../js/landing.js"></script>
    
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
    <div class="upload-container">
          <p>Upload file or text:</p><br><br>
          <form name="form" action="message.php" method="post">
            <input id="upload" type="file" name="image-upload" accept="image/*" capture>
            <input id="text-upload" type="text"name="text-upload" required placeholder="Maximum 200 characters" capture>
          </form> 
    </div>
    <!-- Footer -->
  </body>
</html>
