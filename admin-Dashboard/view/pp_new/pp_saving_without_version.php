<?php 
	session_start();
	require_once("../includes/db_session_chk.php");


	$data_previously_saved = 'No';
	$data_insertion_hampering = 'No';
	$uploaded_file_insertion_hamperings = 'No';
	$directory_already_created = 'No';
	$date = mysqli_real_escape_string($con, stripslashes(trim($_POST['custom_date'])));
	$pp_no = mysqli_real_escape_string($con, stripslashes(trim($_POST['process_program_info'])));
	$pp_desc = mysqli_real_escape_string($con, stripslashes(trim($_POST['pp_desc'])));
	$greige_demand = mysqli_real_escape_string($con, stripslashes(trim($_POST['greige_demand'])));
	$week = mysqli_real_escape_string($con, stripslashes(trim($_POST['week'])));
	$design = mysqli_real_escape_string($con, stripslashes(trim($_POST['design'])));
	//$construction = mysqli_real_escape_string($con, stripslashes(trim($_POST['construction'])));

	//$construction_standard = mysqli_real_escape_string($con, stripslashes(trim($_POST['construction_standard'])));
	// $fiber_cotton = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_cotton'])));
	// $fiber_polyster = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_polyster'])));
	// $fiber_others_name = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_others_name'])));
	// $fiber_others_value = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_others_value'])));

	$customer = mysqli_real_escape_string($con, stripslashes(trim($_POST['customer'])));

	//$process = mysqli_real_escape_string($con, stripslashes(trim($_POST['process'])));

	//$counter = mysqli_real_escape_string($con, stripslashes(trim($_POST['row-counter'])));
	//$name_counter = mysqli_real_escape_string($con, stripslashes(trim($_POST['row-name-counter'])));
	$active = 1;
	$complete = 0;

	if (($date == '') || (empty($date)) || is_null($date) || ($pp_no == '') || (empty($pp_no)) || is_null($pp_no) || ($greige_demand == '') 
		|| (empty($greige_demand)) || is_null($greige_demand) || ($design == '') || (empty($design)) || is_null($design)
		|| ($customer == '') || (empty($customer))
		|| is_null($customer)) 
	{
	   echo "Few Data Missing";
	   exit();
	}


		
	//check customers
	$customer_check_query = "SELECT * FROM customer WHERE customer_id = '$customer'";

	$customer_check_res = mysqli_query($con, $customer_check_query) or die(mysqli_error($con));

	if (mysqli_num_rows($customer_check_res) != 1)
	{
		echo "No Customer Found";
		exit();
	}

	//check process
	// $process_check_query = "SELECT * FROM process WHERE process_id = '$process'";
	// $process_check_res = mysqli_query($con, $process_check_query) or die(mysqli_error($con));

	// if (mysqli_num_rows($process_check_res) != 1)
	// {
	// 	echo "No Process Found";
	// 	exit();
	// }

	//duplicate pp check
	$pp_check_query = "SELECT * FROM process_program_info WHERE pp_no = '$pp_no'";
	$pp_check_res = mysqli_query($con, $pp_check_query) or die(mysqli_error($con));

	if (mysqli_num_rows($pp_check_res) > 0)
	{
		echo "Duplicate PP Number";
		exit();
	}

	else
	{ 

					$insert_sql_statement = "INSERT INTO `process_program_info` 
	                                     ( 
	                                      `pp_no`, 
	                                      `pp_desc`, 
	                                      `issue_date`, 
	                                      `customers`,
	                                      `greige_demand`,
	                                      `week`,
	                                      `design`,
	                                      `recording_person_id`, 
	                                      `recording_person_name`, 
	                                      `recording_time`, 
	                                      `modifying_person_id`, 
	                                      `modification_time` 
	                                     ) 
	                                VALUES 
	                                     ( 
	                                      '$pp_no', 
	                                      '$pp_desc', 
	                                      '$date', 
	                                      '$customer',
	                                      '$greige_demand',
	                                      '$week',
	                                      '$design',
	                                      '$edfms_logged_user_id', 
	                                      '$edfms_logged_first_name $edfms_logged_last_name', 
	                                      NOW(), 
	                                      '$edfms_logged_user_id', 
	                                      NOW() 
	                                     )";

				    mysqli_query($con, $insert_sql_statement) or die(mysqli_error($con));
				    
				    if(mysqli_affected_rows($con) <> 1)
				    {
				        echo "Data Not Inserted In PP";
				        exit();
				    }
				    else
				    {
				    	$pp_no_id = mysqli_insert_id($con);
				    	echo $pp_no;
				    }
				}

	


?>