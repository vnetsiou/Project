<?php
	$servername = "db";
	$username = "root";
	$password = "root_password";
	$db= "MyDB";

	$mysqli = new mysqli($servername, $username, $password, $db);
	if ($mysqli->connect_error) 
	{
		echo 'Connection Error [', $mysqli->connect_error, ']: ', $mysqli->connect_error;
	} 
	
?>
