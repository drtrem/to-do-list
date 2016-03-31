<?php
	$server = "localhost";
	$db_name = "todo"; // Enter your database name
	$db_user = "admin"; // Enter your username
	$db_pass = "1111"; // Enter your password
	

	mysql_connect($server, $db_user, $db_pass) or die("Could not connect to server!");
	mysql_select_db($db_name) or die("Could not connect to database!");
?> 