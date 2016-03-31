<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Todo list</title>
    <link rel="stylesheet" type="text/css" href="css/grid.css">
    <link rel="stylesheet" type="text/css" href="css/style.css"> 
</head>

<body>
    <div class="container">
    	<div class="row">
           	<div class="col-lg-12">
                <h1>Simple todo list</h1>
                <h2>From ruby garage</h2> 
                <div class="list">
                    <?php 
				        require("includes/connect.php");

				        $query = mysql_query("SELECT * FROM tasks ORDER BY date ASC, time ASC");
				        $numrows = mysql_num_rows($query);

				        if($numrows>0){
					       while( $row = mysql_fetch_assoc( $query ) ){

						      $task_id = $row['id'];
						      $task_name = $row['task'];

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
                               
                               
                                $query2 = mysql_query("SELECT * FROM tasks2 ORDER BY date ASC, time ASC");
				                $numrows2 = mysql_num_rows($query2);
                                
				                if($numrows2>0){
					               while( $row = mysql_fetch_assoc( $query2 ) ){

						              $task_id2 = $row['id2'];
						              $task_name2 = $row['task2'];
                                      $project_id = $row['project_id'];
                                      if($project_id==$task_id){ 
                                          
						              echo
                                        '<div id="'.$task_id2.'" class="'.$task_id.'">
                                        <div class="col-lg-offset-2 col-lg-8 check-task">
                                            <form class="'.$task_id2.'" autocomplete="off">
                                                <input type="checkbox">
                                                <span>'.$task_name2.'</span>
                                                <a id="'.$task_id2.'" class="delete-button" href="#"><img src="img/delete.png" alt=""/></a>
                                                <a href="#"><img src="img/edit.png" alt=""/></a>
                                                <a href="#"><img src="img/move.png" alt=""/></a>
                                            </form>
                                            </div>
                                        </div>';
                                    }
                                }
                                }
                            }
                        }
                    ?>
                </div>
                <button class="add">Add todo list</button>
            </div>
        </div>
    </div>
    <script src="js/jquery-1.11.3.min.js"></script>
    <script src="js/script.js"></script>
</body>
</html>