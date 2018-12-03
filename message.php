<?php
	$image = $_POST['image-upload'];
	$text = $_POST['text-upload'];
	$servername = "localhost";
	$user = "root";
	$pass = "";
	$db = "Forums";
	$dbconnect = mysql_connect($servername,$user,$pass,$db);
	mysql_select_db($db);
	$sql = "INSERT INTO ".$db." (FORUM_SUBJECT, FORUM_PICTURE) VALUES ('".$text."', ".$image.")";
	mysql_close($dbconnect);
?>