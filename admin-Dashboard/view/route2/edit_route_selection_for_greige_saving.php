<?php 
	session_start();
	require_once("../includes/db_session_chk.php");

	$data_previously_saved = 'No';
	$data_insertion_hampering = 'No';
	$uploaded_file_insertion_hamperings = 'No';
	$directory_already_created = 'No';

	$name_counter = mysqli_real_escape_string($con, stripslashes(trim($_POST['row-name-counter'])));
	$row_counter = mysqli_real_escape_string($con, stripslashes(trim($_POST['row-counter'])));
	$greige_issunce_id = mysqli_real_escape_string($con, stripslashes(trim($_POST['greige_issunce_id'])));
	$active = mysqli_real_escape_string($con, stripslashes(trim($_POST['active'])));
	//$complete = mysqli_real_escape_string($con, stripslashes(trim($_POST['complete'])));
	//$complete = 0;

	//duplicate data check
	for ($i=1; $i <= $name_counter; $i++)
  	{
  		if (isset($_POST['process_number'.$i]))
		{
			$process_number = mysqli_real_escape_string($con, stripslashes(trim($_POST['process_number'.$i])));
		
			for ($j = ($i+1); $j <= $name_counter; $j++) 
			{ 
				if (isset($_POST['process_number'.$j]))
				{
					$process_number_check = mysqli_real_escape_string($con, stripslashes(trim($_POST['process_number'.$j])));

					//duplicacy check
					if (($process_number == $process_number_check) )
					{
						echo "Duplicate Process Number";
						exit();
					}
				}

			} 
  		}	
			
	}

	$sql_for_row_data = " SELECT id FROM route_issue WHERE 	greige_issunce_id = '$greige_issunce_id' ";
	$res_for_row_data = mysqli_query( $con, $sql_for_row_data);
	$row_for_row_data = mysqli_num_rows($res_for_row_data);

	//for update previous data
	for ($i = 1; $i <= $row_for_row_data; $i++)
 	{
 
 		if($_POST['route'.$i])
 		{
				
			$insert_sql_statement = "UPDATE `route_issue` 
						    SET `active`= '0',
						   		`modifying_person_id`= '$edfms_logged_user_id',
						   		`modification_time`= NOW()
						  WHERE `greige_issunce_id` = '$greige_issunce_id'";

		    mysqli_query($con, $insert_sql_statement) or die(mysqli_error($con));
			
		}
	}

	//for insert previous data 
	// for ($i = 1; $i <= $row_for_row_data; $i++)
 // 	{
 
 // 		if($_POST['route'.$i])
 // 		{
				
	// 		$insert_sql_statement = "UPDATE `greige_issunce` 
	// 					    SET `active`= '0',
	// 					   		`modifying_person_id`= '$edfms_logged_user_id',
	// 					   		`modification_time`= NOW()
	// 					  WHERE `greige_issunce_id` = '$greige_issunce_id'";

	// 	    mysqli_query($con, $insert_sql_statement) or die(mysqli_error($con));
			
	// 	}
	// }


	//for insert privious update data
 	for ($i = 1; $i <= $name_counter; $i++)
 	{
 
 		if($_POST['route'.$i] && $_POST['route_issue_id'.$i])
 		{
		    $route = mysqli_real_escape_string($con, stripslashes(trim($_POST['route'.$i])));
			$process = mysqli_real_escape_string($con, stripslashes(trim($_POST['process'.$i])));
			$process_number = mysqli_real_escape_string($con, stripslashes(trim($_POST['process_number'.$i])));
			$route_issue_id = mysqli_real_escape_string($con, stripslashes(trim($_POST['route_issue_id'.$i])));
			$complete = mysqli_real_escape_string($con, stripslashes(trim($_POST['complete'.$i])));

			$insert_pp_details_statement = "INSERT INTO `route_issue` 
			                                 ( 
			                                  `route_issue_id`,
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
			                                  '$route_issue_id',
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


	//for insert new data
 	for ($i = 1; $i <= $name_counter; $i++)
 	{
 
 		if($_POST['route'.$i] && ($_POST['route_issue_id'.$i] == ''))
 		{
		    $route = mysqli_real_escape_string($con, stripslashes(trim($_POST['route'.$i])));
			$process = mysqli_real_escape_string($con, stripslashes(trim($_POST['process'.$i])));
			$process_number = mysqli_real_escape_string($con, stripslashes(trim($_POST['process_number'.$i])));
			$complete = mysqli_real_escape_string($con, stripslashes(trim($_POST['complete'.$i])));

			$sql = 'SELECT id
						FROM route_issue ORDER BY id DESC LIMIT 1';
			$sql_res = mysqli_query($con, $sql) or die(mysqli_error($con));
			$sql_row = mysqli_fetch_assoc($sql_res);
			$route_issue_id = $sql_row['id'] + 1;

			$insert_pp_details_statement = "INSERT INTO `route_issue` 
			                                 ( 
			                                  `route_issue_id`,
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
			                                  '$route_issue_id',
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