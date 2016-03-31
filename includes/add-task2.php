<?php 
	$task2 = strip_tags( $_POST['task2'] );
    $project_id = strip_tags( $_POST['project_id'] );
	$date = date('Y-m-d');
	$time = date('H:i:s');

	require("connect.php");

	mysql_query("INSERT INTO tasks2 VALUES ('', '$task2', '$date', '$time', '$project_id')");

	$query2 = mysql_query("SELECT * FROM tasks2 WHERE task2='$task2' and date='$date' and time='$time' and project_id='$project_id'");

	while( $row = mysql_fetch_assoc($query2) ){
		$task_id2 = $row['id2'];
		$task_name2 = $row['task2'];
        $project_id = $row['project_id'];
	}

	mysql_close();

    echo 
        '<div class="'.$task_id2.'">
			<div class="col-lg-offset-2 col-lg-8 check-task">
				<form class="'.$task_id2.'" autocomplete="off">
                    <input type="checkbox">
                    <span>'.$task_name2.'</span>
                    <a href="#"><img src="img/delete.png" alt=""/></a>
                    <a href="#"><img src="img/edit.png" alt=""/></a>
                    <a href="#"><img src="img/move.png" alt=""/></a>
                </form>
            </div>
        </div>';
?>