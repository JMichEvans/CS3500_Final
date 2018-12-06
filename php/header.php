<?php
if (session_status() !== PHP_SESSION_ACTIVE) { session_start(); }
?>

<header>
  <div class="custom-container">
    <nav>
      <div id="custom-branding">
        <a href = "landing.php">JJD</a>
      </div>

      <div class="nav-login">
        <form class="form-login" action="includes/login.inc.php" method="post">
          <input type="text" name="mailuid" placeholder="Username/Email...">
          <input type="password" name="pwd" placeholder="Password...">
          <button type="submit" name="login-submit">Login</button>
        </form>
        <ul class="ul-left">
          <li class="li-left"><a href="threads.php">Threads</a></li>
          <li class="li-left"><a href="eula.php">EULA</a></li>
          <!--<li><a href="#"><img src="../img/menu_red.png" alt="Menu Icon"></a></li> -->
        </ul>

      </div>
    </nav>
  </div>
</header>
