<?php 
	session_start();
	require_once("../includes/db_session_chk.php");

	$data_previously_saved = 'No';
	$data_insertion_hampering = 'No';
	$uploaded_file_insertion_hamperings = 'No';
	$directory_already_created = 'No';

	$name_counter = mysqli_real_escape_string($con, stripslashes(trim($_POST['row-name-counter'])));
	$row_counter = mysqli_real_escape_string($con, stripslashes(trim($_POST['row-counter'])));
	$active = mysqli_real_escape_string($con, stripslashes(trim($_POST['active'])));
	$active_update = 1;
	$complete = 0;

	$pp_no_id = mysqli_real_escape_string($con, stripslashes(trim($_POST['pp_no_id_add'])));

	// //duplicate data check
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

	for ($i=1; $i <= $name_counter; $i++)
 	{
 		if($_POST['route'.$i])
 		{
			$route = mysqli_real_escape_string($con, stripslashes(trim($_POST['route'.$i])));
			$process = mysqli_real_escape_string($con, stripslashes(trim($_POST['process'.$i])));
			$process_number = mysqli_real_escape_string($con, stripslashes(trim($_POST['process_number'.$i])));

			$sql = 'SELECT id
					FROM route_issue_main ORDER BY id DESC LIMIT 1';
			$sql_res = mysqli_query($con, $sql) or die(mysqli_error($con));
			$sql_row = mysqli_fetch_assoc($sql_res);
			$route_issue_main_id = $sql_row['id'] + 1;

			$sql_for_pp_details = "SELECT *
					FROM pp_details WHERE pp_no_id = '$pp_no_id' AND active = '1'";
			$sql_res_for_pp_details = mysqli_query($con, $sql_for_pp_details) or die(mysqli_error($con));
			while( $sql_row_for_pp_details = mysqli_fetch_assoc($sql_res_for_pp_details))
			{	
				$pp_version = $sql_row_for_pp_details['pp_id'];

				// $sql_for_row_data = " SELECT id FROM route_issue_main WHERE pp_no_id = '$pp_no_id' AND pp_details_id = '$pp_version' AND active = '1' ";
				// $res_for_row_data = mysqli_query( $con, $sql_for_row_data);
				// $row_for_row_data = mysqli_num_rows($res_for_row_data);

				// //for update previous data
				// for ($i = 1; $i <= $row_for_row_data; $i++)
			 // 	{
				// 	$insert_sql_statement = "UPDATE `route_issue_main` 
				// 				    SET `active`= '0',
				// 				   		`modifying_person_id`= '$edfms_logged_user_id',
				// 				   		`modification_time`= NOW()
				// 				  WHERE `pp_no_id` = '$pp_no_id'
				// 				    AND `pp_details_id` = '$pp_version'";

				//     mysqli_query($con, $insert_sql_statement) or die(mysqli_error($con));
				// }

				$insert_pp_details_statement = "INSERT INTO `route_issue_main` 
			                                 ( 
			                                  `route_issue_main_id`,
			                                  `pp_no_id`, 
			                                  `pp_details_id`,
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
			                                  '$route_issue_main_id',
			                                  '$pp_no_id', 
			                                  '$pp_version',
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
			    	echo $last_id = mysqli_insert_id($con);
			    }

			    //update pp version againest process route status
				$insert_sql_pp_statement = "UPDATE `pp_details` 
									    SET `process_route_status`= '1',
									   		`modifying_person_id`= '$edfms_logged_user_id',
									   		`modification_time`= NOW()
									  WHERE `pp_no_id` = '$pp_no_id'
									    AND `pp_id` = '$pp_version'";

			    mysqli_query($con, $insert_sql_pp_statement) or die(mysqli_error($con));

			}
			
		}
	}

?>