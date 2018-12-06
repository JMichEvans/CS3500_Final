<?php
if (session_status() !== PHP_SESSION_ACTIVE) { session_start(); }
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
    <?php require "header.php";?>

    <!-- Brief Jumbotron -->
    <section class="jumbotron">
      <div class="custom-container">
        <!-- "Default: Welcome, Gamer; cycle through Warlock/ADC/Yasuo Main..." -->
        <h1>Greetings, Gamer</h1>
      </div>
    </section>

<!-- Thread highlight -->
    <section class="landing-thread-highlight">
      <div class="custom-container">
        <h2>Top thread:</h2>
      </div>
    </section>

    <div class="landing-signup">
      <div class="custom-container">
        <h3>Let's talk shop. Sign up below!</h3>
      </div>
    </div>
    <!-- Footer -->
  </body>
</html>
