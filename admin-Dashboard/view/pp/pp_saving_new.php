<?php 
	session_start();
	require_once("../includes/db_session_chk.php");

	$data_previously_saved = 'No';
	$data_insertion_hampering = 'No';
	$uploaded_file_insertion_hamperings = 'No';
	$directory_already_created = 'No';
	$date = mysqli_real_escape_string($con, stripslashes(trim($_POST['custom_date'])));
	$pp_no = mysqli_real_escape_string($con, stripslashes(trim($_POST['pp'])));
	$pp_desc = mysqli_real_escape_string($con, stripslashes(trim($_POST['pp_desc'])));
	$greige_demand = mysqli_real_escape_string($con, stripslashes(trim($_POST['greige_demand'])));
	$week = mysqli_real_escape_string($con, stripslashes(trim($_POST['week'])));
	$design = mysqli_real_escape_string($con, stripslashes(trim($_POST['design'])));


	$customer = mysqli_real_escape_string($con, stripslashes(trim($_POST['customer'])));
	$counter = mysqli_real_escape_string($con, stripslashes(trim($_POST['row-counter'])));
	$process_line1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['process_line1'])));

	$name_counter = mysqli_real_escape_string($con, stripslashes(trim($_POST['row-name-counter'])));
	$active = 1;
	$complete = 0;

/*	|| ($_POST['version1'] == '') ||
		(empty($_POST['version1'])) || is_null($_POST['version1']) || ($_POST['color1'] == '') || (empty($_POST['color1'])) || is_null($_POST['color1']) || ($_POST['gray_width1'] == '') || (empty($_POST['gray_width1'])) || is_null($_POST['gray_width1']) || ($_POST['finish_width1'] == '') || (empty($_POST['finish_width1'])) || is_null($_POST['finish_width1']) || ($_POST['quantity1'] == '') || (empty($_POST['quantity1'])) || is_null($_POST['quantity1']) */

	if (($date == '') || (empty($date)) || is_null($date) || ($pp_no == '') || (empty($pp_no)) || is_null($pp_no) || ($greige_demand == '') 
		|| (empty($greige_demand)) || is_null($greige_demand) || ($design == '') || (empty($design)) || is_null($design)
		|| ($customer == '') || (empty($customer)) || (empty($counter)) || is_null($counter) || (empty($process_line1)) || (empty($process_line1)) || is_null($process_line1)) 
	{
	   echo "Few Data Missing";
	   exit();
	}

	//duplicate data check
	for ($i=1; $i <= $name_counter; $i++)
 	{
		$version = mysqli_real_escape_string($con, stripslashes(trim($_POST['version'.$i])));
		$color = mysqli_real_escape_string($con, stripslashes(trim($_POST['color'.$i])));
		$gray_width = mysqli_real_escape_string($con, stripslashes(trim($_POST['gray_width'.$i])));

		//check color
		if (isset($_POST['version'.$i]) || isset($_POST['color'.$i]) || isset($_POST['gray_width'.$i]))
		{
			$color_check_query = "SELECT * FROM color WHERE color_id = '$color'";
			$color_check_res = mysqli_query($con, $color_check_query) or die(mysqli_error($con));

			if (mysqli_num_rows($color_check_res) != 1)
			{
				echo "No Color Found";
				exit();
			}
		}
		


		for ($j = ($i+1); $j <= $name_counter; $j++) 
		{ 
			$version_check = mysqli_real_escape_string($con, stripslashes(trim($_POST['version'.$j])));
			$color_check = mysqli_real_escape_string($con, stripslashes(trim($_POST['color'.$j])));
			$gray_width_check = mysqli_real_escape_string($con, stripslashes(trim($_POST['gray_width'.$j])));

			//duplicacy check
			if (($version == $version_check) && ($color == $color_check) && ($gray_width == $gray_width_check) )
			{
				echo "Duplicate Data";
				exit();
			}

		} 	
			
	}

	//check customers
	$customer_check_query = "SELECT * FROM customers WHERE customers_id = '$customer'";
	$customer_check_res = mysqli_query($con, $customer_check_query) or die(mysqli_error($con));

	if (mysqli_num_rows($customer_check_res) != 1)
	{
		echo "No Customer Found";
		exit();
	}

	//check process
	/*$process_check_query = "SELECT * FROM process WHERE process_id = '$process'";
	$process_check_res = mysqli_query($con, $process_check_query) or die(mysqli_error($con));

	if (mysqli_num_rows($process_check_res) != 1)
	{
		echo "No Process Found";
		exit();
	}*/

	//duplicate pp check
	$pp_check_query = "SELECT * FROM pp WHERE pp_no = '$pp_no'";
	$pp_check_res = mysqli_query($con, $pp_check_query) or die(mysqli_error($con));

	if (mysqli_num_rows($pp_check_res) > 0)
	{
		echo "Duplicate PP Number";
		exit();
	}

	else
	{ 
	 	for ($i=1; $i <= $name_counter; $i++)
	 	{
	 
	 		if($_POST['version'.$i])
	 		{
				$version = mysqli_real_escape_string($con, stripslashes(trim($_POST['version'.$i])));
				$color = mysqli_real_escape_string($con, stripslashes(trim($_POST['color'.$i])));

				$construction_value = mysqli_real_escape_string($con, stripslashes(trim($_POST['construction'.$i])));
				$fiber_cotton_value = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_cotton'.$i])));
				$fiber_polyster_value = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_polyster'.$i])));
				$fiber_others_value2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_others'.$i])));
			    $fiber_others_name = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_others_name'.$i])));
				$construction_standard = mysqli_real_escape_string($con, stripslashes(trim($_POST['construction_standard'.$i])));
				
				$gray_width = mysqli_real_escape_string($con, stripslashes(trim($_POST['gray_width'.$i])));
				$finish_width = mysqli_real_escape_string($con, stripslashes(trim($_POST['finish_width'.$i])));
				$process_line = mysqli_real_escape_string($con, stripslashes(trim($_POST['process_line'.$i])));
				$quantity = mysqli_real_escape_string($con, stripslashes(trim($_POST['quantity'.$i])));

				if ($i == 1)
				{
					$insert_sql_statement = "INSERT INTO `pp` 
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
				    }
				}

				$sql = 'SELECT id
						FROM pp_details ORDER BY id DESC LIMIT 1';
				$sql_res = mysqli_query($con, $sql) or die(mysqli_error($con));
				$sql_row = mysqli_fetch_assoc($sql_res);
				$pp_id = $sql_row['id'] + 1;
					
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
                              '$construction_value',
                              '$construction_standard_value',
                              '$fiber_cotton_value',
                              '$fiber_polyster_value',
                              '$fiber_others_name',
                              '$fiber_others_value2',
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
			    	if ($i == $name_counter) 
			    	{
			    		echo $pp_no;
			    	}
			    }
				
			}
		}
		
	}


?>