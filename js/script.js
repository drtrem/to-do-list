add_task(); // Call the add_task function
delete_task(); // Call the delete_task function
add_task2();
delete_task2()

function add_task() {

	$('.add').click(function(){
        
        var new_task = prompt("Please enter the name of new project");

		if(new_task != ''){

			$.post('includes/add-task.php', { task: new_task }, function( data ) {

                $(data).appendTo('.list').hide().fadeIn();
                
				delete_task();
			});
		}

		return false; // Ensure that the form does not submit twice
	});
}

function delete_task() {

	$('.delete-button-top').click(function(){

		var current_element = $(this);

		var id = $(this).attr('id');
        
		$.post('includes/delete-task.php', { task_id: id }, function() {

			current_element.parent().fadeOut("fast", function() { $("div[class='" +id+ "']").remove(); });
		});
	});
}

function add_task2() {

	$('.add-task-btn').click(function(){
        
        var id = $(this).attr('id');
        
        var new_task = $("input[class='" +id+ "']").val();
        console.log(id);
		if(new_task != ''){

			$.post('includes/add-task2.php', { task2: new_task, project_id: id }, function( data ) {

				delete_task();
			});
		}

		return false; // Ensure that the form does not submit twice
	});
}

function delete_task2() {

	$('.delete-button').click(function(){

		var current_element = $(this);

		var id = $(this).attr('id');
   
		$.post('includes/delete-task2.php', { project_id: id }, function() {

			current_element.parent().fadeOut("fast", function() { $("div[id='" +id+ "']").remove(); });
		});
	});
}