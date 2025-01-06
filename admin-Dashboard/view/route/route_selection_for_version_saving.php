<?php 
	session_start();
	require_once("../includes/db_session_chk.php");

	$data_previously_saved = 'No';
	$data_insertion_hampering = 'No';
	$uploaded_file_insertion_hamperings = 'No';
	$directory_already_created = 'No';

	$name_counter = mysqli_real_escape_string($con, stripslashes(trim($_POST['row-name-counter'])));
	$row_counter = mysqli_real_escape_string($con, stripslashes(trim($_POST['row-counter'])));
	//$greige_issunce_id = mysqli_real_escape_string($con, stripslashes(trim($_POST['greige_issunce_id_add'])));
	$active = mysqli_real_escape_string($con, stripslashes(trim($_POST['active'])));
	$active_update = 1;
	$complete = 0;

	$pp_no_id = mysqli_real_escape_string($con, stripslashes(trim($_POST['pp_no_id_add'])));;
	$pp_version = mysqli_real_escape_string($con, stripslashes(trim($_POST['pp_version_add'])));

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

	$sql_for_pp = " SELECT greige_receiving_process_info.*, version_wise_process_program_info.*, process_program_info.*
					FROM greige_receiving_process_info , version_wise_process_program_info, process_program_info
					WHERE greige_receiving_process_info.pp_no_id = '$pp_no_id'
					AND greige_receiving_process_info.status = '1'
					AND greige_receiving_process_info.active = '1'
					AND version_wise_process_program_info.pp_no_id = greige_receiving_process_info.pp_no_id
					AND version_wise_process_program_info.pp_id = greige_receiving_process_info.pp_details_id
					AND process_program_info.pp_id = version_wise_process_program_info.pp_no_id
					AND version_wise_process_program_info.pp_id = '$pp_version'
					AND version_wise_process_program_info.active = '1'
				  ";	

	$res_for_pp = mysqli_query($con, $sql_for_pp);
	$greige_issunce_id_counter = 1;

	while ($row = mysqli_fetch_assoc($res_for_pp)) 
	{
		$greige_issunce_id = $row['greige_issunce_id'];

	 	for ($i=1; $i <= $name_counter; $i++)
	 	{
	 
	 		if($_POST['route'.$i])
	 		{

	 			if ( $greige_issunce_id_counter == 1 ) 
	 			{
	 				$route = mysqli_real_escape_string($con, stripslashes(trim($_POST['route'.$i])));
					$process = mysqli_real_escape_string($con, stripslashes(trim($_POST['process'.$i])));
					$process_number = mysqli_real_escape_string($con, stripslashes(trim($_POST['process_number'.$i])));

					$sql = 'SELECT id
							FROM process_name_define_after_greige_receiving ORDER BY id DESC LIMIT 1';
					$sql_res = mysqli_query($con, $sql) or die(mysqli_error($con));
					$sql_row = mysqli_fetch_assoc($sql_res);
					$route_issue_id = $sql_row['id'] + 1;

					$insert_pp_details_statement = "INSERT INTO `process_name_define_after_greige_receiving` 
					                                 ( 
					                                  `route_issue_id`,
					                                  `greige_issunce_id`, 
					                                  `route`,
					                                  `original`, 
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
					                                  '1',
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

	 			else
	 			{
	 				$route = mysqli_real_escape_string($con, stripslashes(trim($_POST['route'.$i])));
					$process = mysqli_real_escape_string($con, stripslashes(trim($_POST['process'.$i])));
					$process_number = mysqli_real_escape_string($con, stripslashes(trim($_POST['process_number'.$i])));

					$sql = 'SELECT id
							FROM process_name_define_after_greige_receiving ORDER BY id DESC LIMIT 1';
					$sql_res = mysqli_query($con, $sql) or die(mysqli_error($con));
					$sql_row = mysqli_fetch_assoc($sql_res);
					$route_issue_id = $sql_row['id'] + 1;

					$insert_pp_details_statement = "INSERT INTO `process_name_define_after_greige_receiving` 
					                                 ( 
					                                  `route_issue_id`,
					                                  `greige_issunce_id`, 
					                                  `route`, 
					                                  `original`,
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
					                                  '0', 
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
	 			}
				
			}
		}
		++$greige_issunce_id_counter;
	}
?>