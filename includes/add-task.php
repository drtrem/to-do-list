<?php 
	$task = strip_tags( $_POST['task'] );
	$date = date('Y-m-d');
	$time = date('H:i:s');

	require("connect.php");

	mysql_query("INSERT INTO tasks VALUES ('', '$task', '$date', '$time')");

	$query = mysql_query("SELECT * FROM tasks WHERE task='$task' and date='$date' and time='$time'");

	while( $row = mysql_fetch_assoc($query) ){
		$task_id = $row['id'];
		$task_name = $row['task'];
	};

	mysql_close();

    echo 
        '<div class="'.$task_id.'">
                                <div class="col-lg-offset-2 col-lg-8 task">
                                    <img src="img/icon-top.png" alt=""/>
                                    <span>'.$task_name.'</span>
                                    <a id="'.$task_id.'" class="delete-button-top" href="#"><img src="img/delete-top.png" alt=""/></a>
                                    <a href="#"><img src="img/edit-top.png" alt=""/></a>
                                </div>
                                <div class="col-lg-offset-2 col-lg-8 add-task">
                                    <form class="inputtop" autocomplete="off">
                                        <img src="img/plus.png" alt=""/>
                                        <input class="'.$task_id.'" type="text" name="new-task" placeholder="Add a new item..." />
                                        <button id="'.$task_id.'" class="add-task-btn">Add Task</button>
                                    </form>
                                    </div>
                                </div>';
?>