<?php
// Checks to see if the user accesses this file via the submit button on the login form.
if (isset($_POST['login-submit'])) {
  # Database connection script
  require 'dbh.inc.php';
  $mailuid = $_POST['mailuid'];
  $password = $_POST['pwd'];
  # If the user left mailuid and/or password blank
  if (empty($mailuid) || (empty($password))) {
    header("Location: ../landing.php?error=emptyfields");
    exit();
  }
  else {
    $sql = "SELECT * FROM Users WHERE Username=? OR Email=?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      header("Location: ../landing.php?error=sqlerror");
      exit();
    }
    else {
      mysqli_stmt_bind_param($stmt, "ss", $mailuid, $mailuid);
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);
      if ($row = mysqli_fetch_assoc($result)) {
        $pwdCheck = password_verify($password, $row['Password']);
        if ($pwdCheck == false) {
          header("Location: ../landing.php?error=wrongpwd");
          exit();
        }
        else if ($pwdCheck == true) {
          session_start();
          $_SESSION['User_ID'] = $row['User_ID'];
          $_SESSION['Username'] = $row['Username'];
          header("Location: ../landing.php?login=success");
          exit();
        }
        else {
          header("Location: ../landing.php?error=wrongpwd");
          exit();
        }
      }
      else {
        header("Location: ../landing.php?error=nouser");
        exit();
      }
    }
  }
  # mysqli automatically closes the connection and stmt once they are out of scope.
}
# Returns the user to the landing page if they attempt to access
# this script via its URL directly.
else {
  header("Location: ../landing.php");
  exit();
}
 ?>