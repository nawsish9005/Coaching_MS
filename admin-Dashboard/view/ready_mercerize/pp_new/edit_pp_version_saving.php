<?php 
	session_start();
	require_once("../includes/db_session_chk.php");

	$data_previously_saved = 'No';
	$data_insertion_hampering = 'No';
	$uploaded_file_insertion_hamperings = 'No';
	$directory_already_created = 'No';

	$pp_id = mysqli_real_escape_string($con, stripslashes(trim($_POST['pp_id'])));
	$pp_no_id = mysqli_real_escape_string($con, stripslashes(trim($_POST['pp_no_id'])));

	$version = mysqli_real_escape_string($con, stripslashes(trim($_POST['version'])));
	$color = mysqli_real_escape_string($con, stripslashes(trim($_POST['color'])));

	$construction = mysqli_real_escape_string($con, stripslashes(trim($_POST['construction'])));
	$construction_standard = mysqli_real_escape_string($con, stripslashes(trim($_POST['construction_standard'])));

	$fiber_cotton = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_cotton'])));
	$fiber_polyster = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_polyster'])));
	$fiber_others_name = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_others_name'])));
	$fiber_others_value = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_others_value'])));
	
	$gray_width = mysqli_real_escape_string($con, stripslashes(trim($_POST['gray_width'])));
	$finish_width = mysqli_real_escape_string($con, stripslashes(trim($_POST['finish_width'])));
	$process_line = mysqli_real_escape_string($con, stripslashes(trim($_POST['process_line'])));
	$quantity = mysqli_real_escape_string($con, stripslashes(trim($_POST['quantity'])));

	$active = 1;
	$complete = 0;


	//check process
	$process_check_query = "SELECT * FROM process WHERE process_id = '$process_line'";
	$process_check_res = mysqli_query($con, $process_check_query) or die(mysqli_error($con));

	if (mysqli_num_rows($process_check_res) != 1)
	{
		echo "No Process Found";
		exit();
	}

	else
	{ 
		$update_pp_details_statement = "UPDATE `pp_details` 
										   SET `active`= '0',
										   	   `modifying_person_id`= '$edfms_logged_user_id',
										   	   `modification_time`= NOW()
										 WHERE `pp_no_id`= '$pp_no_id'";

		mysqli_query($con, $update_pp_details_statement) or die(mysqli_error($con));


		// $sql = 'SELECT id FROM pp_details ORDER BY id DESC LIMIT 1';
		// $sql_res = mysqli_query($con, $sql) or die(mysqli_error($con));
		// $sql_row = mysqli_fetch_assoc($sql_res);
		// $pp_id = $sql_row['id'] + 1;

		$insert_pp_details_statement = "INSERT INTO `pp_details` 
						                             ( 
						                              `pp_id`,
						                              `pp_no_id`, 
						                              `version`, 
						                              `color`,
						                              `construction`,
						                              `construction_standard`,
						                              `fiber_cotton`,
						                              `fiber_polyster`,
						                              `fiber_others_name`,
						                              `fiber_others_value`,
						                              `gray_width`,
						                              `finish_width`,
						                              `process_line`,
						                              `quantity`,
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
						                              '$pp_id',
						                              '$pp_no_id', 
						                              '$version', 
						                              '$color',
						                              '$construction',
						                              '$construction_standard',
						                              '$fiber_cotton',
						                              '$fiber_polyster',
						                              '$fiber_others_name',
						                              '$fiber_others_value',
						                              '$gray_width',
						                              '$finish_width',
						                              '$process_line',
						                              '$quantity',
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
	        echo "Data Not Inserted In PP Detsils";
	        exit();
	    }
	    else
	    {
	    	echo $pp_no_id;
	    }
		
	}


?>