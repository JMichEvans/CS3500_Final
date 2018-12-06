<?php
$servername = "localhost"; # localhost for running on local server
$dbUsername = "root";
$password = ""; # blank for root
$dbName = "martialboards_db";
$conn = mysqli_connect($servername, $dbUsername, $password, $dbName);
if (!$conn) {
  die("connection failed: ".mysqli_connect_error());
}
?>