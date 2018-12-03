<?php
if(isset($_POST['signup-submit'])) {

  require 'dbh.inc.php';

  $username = $_POST['Username'];
  $email = $_POST['Email'];
  $password = $_POST['Pwd'];
  $passwordRepeat = $_POST['Pwd-repeat'];

  #error handlers
  if (empty($username) || empty($email) || empty($password) || empty($passwordRepeat)) {
    header("Location: ../landing.php?error=emptyfields&Username=".$username."&Email=".$email);
    exit();
  }

  else if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)) {
    header("Location: ../landing.php?error=invalidemailuid");
    exit();
  }

  else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header("Location: ../landing.php?error=invalidemail&Username=".$username);
    exit();
  }

  else if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
    header("Location: ../landing.php?error=invaliduid&Email=".$email);
    exit();
  }

  else if ($password !== $passwordRepeat) {
    header("Location: ../landing.php?error=passwordcheck&Username=".$username."&Email=".$email);
    exit();
  }

  else {
    $sql = "SELECT User_ID FROM Users WHERE User_ID=?";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql)) {
      header("Location: ../landing.php?error=sqlerror");
      exit();
    }

    else {
      mysqli_stmt_bind_param($stmt, "ss", $usename, $email);
      mysqli_stmt_execute($stmt);
      mysqli_stmt_store_result($stmt);

      $resultcheck = mysqli_stmt_num_rows($stmt);
      if ($resultcheck > 0) {
        header("Location: ../landing.php?error=useremailtaken");
        exit();
      }

      else {
        $sql = "INSERT INTO Users (Username, Email, Password, User_Icon, User_Type) VALUES (?,?,?,?,?)";
        $stmt = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt, $sql)) {
          header("Location: ../landing.php?error=sqlerror");
          exit();
        }

        else {
          $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
          $user_icon = '../img/user_img/defaults/default_icon.png';
          $user_type = 'user';
          mysqli_stmt_bind_param($stmt, "sssss", $username, $email, $hashedPwd, $user_icon, $user_type);
          mysqli_stmt_execute($stmt);
          header("Location: ../landing.php?signup=success");
          exit();
        }
      }
    }
  }
  mysqli_stmt_close($stmt);
  $mysqli_close($conn);
}

else {
  header("Location: ../landing.php");
  exit();
}
?>
