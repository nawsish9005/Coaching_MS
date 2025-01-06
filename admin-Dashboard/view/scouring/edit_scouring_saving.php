<?php 
	session_start();
	require_once("../includes/db_session_chk.php");

	$data_previously_saved = 'No';
	$data_insertion_hampering = 'No';
	$uploaded_file_insertion_hamperings = 'No';
	$directory_already_created = 'No';

	$route_issue_id = mysqli_real_escape_string($con, stripslashes(trim($_POST['route_issue_id'])));
	$scouring_id = mysqli_real_escape_string($con, stripslashes(trim($_POST['scouring_id'])));

	$date = mysqli_real_escape_string($con, stripslashes(trim($_POST['custom_date'])));
	$b_batcher = mysqli_real_escape_string($con, stripslashes(trim($_POST['b_batcher'])));
	$a_batcher = mysqli_real_escape_string($con, stripslashes(trim($_POST['a_batcher'])));
	$p_width = mysqli_real_escape_string($con, stripslashes(trim($_POST['p_width'])));
	$p_qty = mysqli_real_escape_string($con, stripslashes(trim($_POST['p_qty'])));
	$s_or_e = mysqli_real_escape_string($con, stripslashes(trim($_POST['s_or_e'])));

	$absorbency_left = mysqli_real_escape_string($con, stripslashes(trim($_POST['absorbency_left'])));
	$absorbency_center = mysqli_real_escape_string($con, stripslashes(trim($_POST['absorbency_center'])));
	$absorbency_right = mysqli_real_escape_string($con, stripslashes(trim($_POST['absorbency_right'])));

	$size_left = mysqli_real_escape_string($con, stripslashes(trim($_POST['size_left'])));
	$size_center = mysqli_real_escape_string($con, stripslashes(trim($_POST['size_center'])));
	$size_right = mysqli_real_escape_string($con, stripslashes(trim($_POST['size_right'])));


	$pilling = mysqli_real_escape_string($con, stripslashes(trim($_POST['pilling'])));

	if (strpos($pilling, '-') !== false) 
	{
	    $test = explode("-",$pilling);
		$pilling = ($test[0] + $test[1])/2;
	}

	$ph_left = mysqli_real_escape_string($con, stripslashes(trim($_POST['ph_left'])));
	$ph_center = mysqli_real_escape_string($con, stripslashes(trim($_POST['ph_center'])));
	$ph_right = mysqli_real_escape_string($con, stripslashes(trim($_POST['ph_right'])));

	$status = mysqli_real_escape_string($con, stripslashes(trim($_POST['status'])));
	$remarks = mysqli_real_escape_string($con, stripslashes(trim($_POST['remarks'])));

	
	$insert_pp_details_statement = "UPDATE `scouring` 
								    SET `date`= '$date',
								   		`b_batcher`= '$b_batcher',
								   		`a_batcher`= '$a_batcher',
								   		`p_width`= '$p_width',
								   		`p_qty`= '$p_qty',
								   		`s_or_e`= '$s_or_e',
								   		`absorbency_left`= '$absorbency_left',
								   		`absorbency_center`= '$absorbency_center',
								   		`absorbency_right`= '$absorbency_right',
								   		`size_left`= '$size_left',
								   		`size_center`= '$size_center',
								   		`size_right`= '$size_right',
								   		`pilling`= '$pilling',
								   		`ph_left`= '$ph_left',
								   		`ph_center`= '$ph_center',
								   		`ph_right`= '$ph_right',
								   		`status`= '$status',
								   		`remarks`= '$remarks',
								   		`modifying_person_id`= '$edfms_logged_user_id',
								   		`modification_time`= NOW()
								  WHERE `route_issue_id` = '$route_issue_id' AND scouring_id='$scouring_id' ";
	mysqli_query($con, $insert_pp_details_statement) or die(mysqli_error($con));

    if(mysqli_affected_rows($con) <> 1)
    {
        echo $data_insertion_hampering = 'Not insert new scouring';
        exit();
    }

    else
    {
    	echo "Update Data Successfully";
    }
?>