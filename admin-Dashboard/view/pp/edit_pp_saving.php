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
	$pp_no_id = mysqli_real_escape_string($con, stripslashes(trim($_POST['pp_no_id'])));
	$week = mysqli_real_escape_string($con, stripslashes(trim($_POST['week'])));
	$design = mysqli_real_escape_string($con, stripslashes(trim($_POST['design'])));

	$customer = mysqli_real_escape_string($con, stripslashes(trim($_POST['customer'])));
	$process_line1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['process_line1'])));

	$counter = mysqli_real_escape_string($con, stripslashes(trim($_POST['row-counter'])));
	$name_counter = mysqli_real_escape_string($con, stripslashes(trim($_POST['row-name-counter'])));
	$database_row = mysqli_real_escape_string($con, stripslashes(trim($_POST['database_row'])));
	$update_active = 0;
	$new_active = 1;
	$complete = 0;

	
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

	

		for ($i=1; $i <= $database_row; $i++)
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
				$pp_id = mysqli_real_escape_string($con, stripslashes(trim($_POST['pp_id'.$i])));

				if ($i == 1)
				{
					
					$insert_sql_statement = "UPDATE `pp` 
								    SET `issue_date`= '$date',
								        `pp_desc`= '$pp_desc',
								   		`customers`= '$customer',
								   		`greige_demand` = '$greige_demand',
								   		`week`= '$week',
								   		`design`= '$design',
								   		`modifying_person_id`= '$edfms_logged_user_id',
								   		`modification_time`= NOW()
								  WHERE `pp_no` = '$pp_no'";

				    mysqli_query($con, $insert_sql_statement) or die(mysqli_error($con));
				    	
			    	// $delete_pp_no = "DELETE FROM pp_details WHERE pp_no_id = '$pp_id' ";

				    // mysqli_query($con, $delete_pp_no) or die(mysqli_error($con));
					    
				}

				$update_pp_details_statement = "UPDATE `pp_details` 
											    SET `active`= '$update_active',
											   		`modifying_person_id`= '$edfms_logged_user_id',
											   		`modification_time`= NOW()
											  WHERE `pp_no_id`= '$pp_no_id'";

				mysqli_query($con, $update_pp_details_statement) or die(mysqli_error($con));
	    
			    // if(mysqli_affected_rows($con) <> 1)
			    // {
			    //     echo $data_insertion_hampering = 'Data Not Updated In PP Detsils';
			    //     exit();
			    // }

			    // else
			    // {

			    // }
				
			}
		}


		for ($i=1; $i <= $database_row; $i++)
	 	{
	 
	 		if($_POST['version'.$i])
	 		{
				// $version = mysqli_real_escape_string($con, stripslashes(trim($_POST['version'.$i])));
				// $color = mysqli_real_escape_string($con, stripslashes(trim($_POST['color'.$i])));
				// $gray_width = mysqli_real_escape_string($con, stripslashes(trim($_POST['gray_width'.$i])));
				// $finish_width = mysqli_real_escape_string($con, stripslashes(trim($_POST['finish_width'.$i])));
				// $quantity = mysqli_real_escape_string($con, stripslashes(trim($_POST['quantity'.$i])));
				// $pp_id = mysqli_real_escape_string($con, stripslashes(trim($_POST['pp_id'.$i])));

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
				$pp_id = mysqli_real_escape_string($con, stripslashes(trim($_POST['pp_id'.$i])));

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
                              '$construction_standard',
                              '$fiber_cotton_value',
                              '$fiber_polyster_value',
                              '$fiber_others_name',
                              '$fiber_others_value2',
                              '$gray_width',
                              '$finish_width',
                              '$process_line',
                              '$quantity',
                              '$new_active',
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
			    	//echo $pp_no;
			    }
				
			}
		}


		for ($i= ($database_row + 1); $i <= $name_counter; $i++)
	 	{
	 
	 		if($_POST['version'.$i])
	 		{
				// $version = mysqli_real_escape_string($con, stripslashes(trim($_POST['version'.$i])));
				// $color = mysqli_real_escape_string($con, stripslashes(trim($_POST['color'.$i])));
				// $gray_width = mysqli_real_escape_string($con, stripslashes(trim($_POST['gray_width'.$i])));
				// $finish_width = mysqli_real_escape_string($con, stripslashes(trim($_POST['finish_width'.$i])));
				// $quantity = mysqli_real_escape_string($con, stripslashes(trim($_POST['quantity'.$i])));

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
				$pp_id = mysqli_real_escape_string($con, stripslashes(trim($_POST['pp_id'.$i])));

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
                              '$construction_standard',
                              '$fiber_cotton_value',
                              '$fiber_polyster_value',
                              '$fiber_others_name',
                              '$fiber_others_value2',
                              '$gray_width',
                              '$finish_width',
                              '$process_line',
                              '$quantity',
                              '$new_active',
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
			    	//echo $pp_no;
			    }
				
			}
		}
	

	echo $pp_no;
?>