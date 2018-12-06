<?php
session_start();
 ?>

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
    <?php
    require "header.php";
    ?>

<!-- Registration form -->
    <div class="landing-signup">
      <div class="custom-container">
        <h3>Let's talk shop. Sign up below!</h3>
      </div>

      <div class="form-container">
        <div class="custom-container">
          <?php
          if (isset($_GET['error'])) {
            if($_GET['error'] == "emptyfields") {
              echo '<p class="signuperror">Fill in all fields!</p>';
            }
            else if($_GET['error'] == "invaliduidmail") {
              echo '<p class="signuperror">Invalid username and email!</p>';
            }
            else if($_GET['error'] == "invaliduid") {
              echo '<p class="signuperror">Invalid username!</p>';
            }
            else if($_GET['error'] == "invalidmail") {
              echo '<p class="signuperror">Invalid username and email!</p>';
            }
            else if($_GET['error'] == "passwordcheck") {
              echo '<p class="signuperror">Your passwords do not match!</p>';
            }
            else if($_GET['error'] == "usertaken") {
              echo '<p class="signuperror">Username is already taken!</p>';
            }
          }
          else if (isset($_GET['signup'])) {
            if ($_GET['signup'] == 'success') {
              echo '<p class="signupsuccess">Signup successful!</p>';
              $dir = "../uploads/user_img";
              $username = $_GET['username'];
              if(!mkdir("$dir/$username", 0700)) {
                printf("THERE IS NO DIR!!");
              } else {
                printf("You good.");
              }
            }
          }
          ?>
          <form class="form-registration" action="../php/includes/signup.inc.php" method="post">
            <input type="text" name="Username" placeholder="Username">
            <input type="text" name="Email" placeholder="Email">
            <input type="password" name="Pwd" placeholder="Password">
            <input type="password" name="Pwd-repeat" placeholder="Re-enter password">
            <button type="submit" name="signup-submit">Sign up</button>
          </form>
        </div>
      </div>
    </div>
    <!-- Footer -->
  </body>
</html>