<?php 
	$project_id = strip_tags( $_POST['project_id'] );

	require("connect.php");

	mysql_query("DELETE FROM tasks2 WHERE id2='$project_id'");
?> 