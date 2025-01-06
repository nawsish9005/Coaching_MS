<?php 
	session_start();
	require_once("../includes/db_session_chk.php");

	$data_previously_saved = 'No';
	$data_insertion_hampering = 'No';
	$uploaded_file_insertion_hamperings = 'No';
	$directory_already_created = 'No';

	$route_issue_id = mysqli_real_escape_string($con, stripslashes(trim($_POST['route_issue_id'])));
	$ready_for_print_id = mysqli_real_escape_string($con, stripslashes(trim($_POST['ready_for_print_id'])));

	$date = mysqli_real_escape_string($con, stripslashes(trim($_POST['custom_date'])));
	$b_batcher = mysqli_real_escape_string($con, stripslashes(trim($_POST['b_batcher'])));
	$a_batcher = mysqli_real_escape_string($con, stripslashes(trim($_POST['a_batcher'])));
	$p_width = mysqli_real_escape_string($con, stripslashes(trim($_POST['p_width'])));
	$p_qty = mysqli_real_escape_string($con, stripslashes(trim($_POST['p_qty'])));
	$s_or_e = mysqli_real_escape_string($con, stripslashes(trim($_POST['s_or_e'])));

	$whiteness_left = mysqli_real_escape_string($con, stripslashes(trim($_POST['whiteness_left'])));
	$whiteness_center = mysqli_real_escape_string($con, stripslashes(trim($_POST['whiteness_center'])));
	$whiteness_right = mysqli_real_escape_string($con, stripslashes(trim($_POST['whiteness_right'])));

	$bowing_and_skew = mysqli_real_escape_string($con, stripslashes(trim($_POST['bowing_and_skew'])));

	$ph_left = mysqli_real_escape_string($con, stripslashes(trim($_POST['ph_left'])));
	$ph_center = mysqli_real_escape_string($con, stripslashes(trim($_POST['ph_center'])));
	$ph_right = mysqli_real_escape_string($con, stripslashes(trim($_POST['ph_right'])));

	$status = mysqli_real_escape_string($con, stripslashes(trim($_POST['status'])));
	$remarks = mysqli_real_escape_string($con, stripslashes(trim($_POST['remarks'])));

	
	$insert_pp_details_statement = "UPDATE `ready_for_print` 
								    SET `date`= '$date',
								   		`b_batcher`= '$b_batcher',
								   		`a_batcher`= '$a_batcher',
								   		`p_width`= '$p_width',
								   		`p_qty`= '$p_qty',
								   		`s_or_e`= '$s_or_e',
								   		`whiteness_left`= '$whiteness_left',
								   		`whiteness_center`= '$whiteness_center',
								   		`whiteness_right`= '$whiteness_right',
								   		`bowing_and_skew`= '$bowing_and_skew',
								   		`ph_left`= '$ph_left',
								   		`ph_center`= '$ph_center',
								   		`ph_right`= '$ph_right',
								   		`status`= '$status',
								   		`remarks`= '$remarks',
								   		`modifying_person_id`= '$edfms_logged_user_id',
								   		`modification_time`= NOW()
								  WHERE `route_issue_id` = '$route_issue_id' AND ready_for_print_id = '$ready_for_print_id' ";
	mysqli_query($con, $insert_pp_details_statement) or die(mysqli_error($con));

    if(mysqli_affected_rows($con) <> 1)
    {
        echo $data_insertion_hampering = 'Not insert new bleaching';
        exit();
    }

    else
    {
    	echo "Update Data Successfully";
    }
?>