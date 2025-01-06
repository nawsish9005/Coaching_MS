<?php 
	session_start();
	require_once("../includes/db_session_chk.php");

	$data_previously_saved = 'No';
	$data_insertion_hampering = 'No';
	$uploaded_file_insertion_hamperings = 'No';
	$directory_already_created = 'No';

	$name_counter = mysqli_real_escape_string($con, stripslashes(trim($_POST['row-name-counter'])));
	$greige_issunce_id = mysqli_real_escape_string($con, stripslashes(trim($_POST['greige_issunce_id'])));
	$active = mysqli_real_escape_string($con, stripslashes(trim($_POST['active'])));
	$active_update = 1;
	$complete = 0;

 	for ($i=1; $i <= $name_counter; $i++)
 	{
 
 		if($_POST['route'.$i])
 		{
			$route = mysqli_real_escape_string($con, stripslashes(trim($_POST['route'.$i])));
			$process = mysqli_real_escape_string($con, stripslashes(trim($_POST['process'.$i])));
			$process_number = mysqli_real_escape_string($con, stripslashes(trim($_POST['process_number'.$i])));

			if ($i == 1)
			{
				
				$insert_sql_statement = "UPDATE `greige_issunce` 
							    SET `active`= '$active',
							   		`modifying_person_id`= '$edfms_logged_user_id',
							   		`modification_time`= NOW()
							  WHERE `greige_issunce_id` = '$greige_issunce_id'";

			    mysqli_query($con, $insert_sql_statement) or die(mysqli_error($con));
				    
			}

			$insert_pp_details_statement = "INSERT INTO `route_issue` 
			                                 ( 
			                                  `greige_issunce_id`, 
			                                  `route`, 
			                                  `process`,
			                                  `process_number`,
			                                  `active`,
			                                  `complete`,
			                                  `recording_person_id`, 
			                                  `recording_person_name`, 
			                                  `recording_time`, 
			                                  `modifying_person_id`, 
			                                  `modification_time` 
			                                 ) 
			                            VALUES 
			                                 ( 
			                                  '$greige_issunce_id', 
			                                  '$route', 
			                                  '$process',
			                                  '$process_number',
			                                  '$active',
			                                  '$complete',
			                                  '$edfms_logged_user_id', 
			                                  '$edfms_logged_first_name $edfms_logged_last_name', 
			                                  NOW(), 
			                                  '$edfms_logged_user_id', 
			                                  NOW() 
			                                 )";
			mysqli_query($con, $insert_pp_details_statement) or die(mysqli_error($con));
    
		    if(mysqli_affected_rows($con) <> 1)
		    {
		        echo $data_insertion_hampering = 'Not insert new pp details';
		        exit();
		    }

		    else
		    {
		    	
		    }
			
		}
	}
?>