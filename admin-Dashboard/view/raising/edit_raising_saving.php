<?php 
	session_start();
	require_once("../includes/db_session_chk.php");

	$data_previously_saved = 'No';
	$data_insertion_hampering = 'No';
	$uploaded_file_insertion_hamperings = 'No';
	$directory_already_created = 'No';

	$route_issue_id = mysqli_real_escape_string($con, stripslashes(trim($_POST['route_issue_id'])));
	$raising_id = mysqli_real_escape_string($con, stripslashes(trim($_POST['raising_id'])));

	$route_issue_id = mysqli_real_escape_string($con, stripslashes(trim($_POST['route_issue_id'])));
	$date = mysqli_real_escape_string($con, stripslashes(trim($_POST['custom_date'])));
	$b_batcher = mysqli_real_escape_string($con, stripslashes(trim($_POST['b_batcher'])));
	$a_batcher = mysqli_real_escape_string($con, stripslashes(trim($_POST['a_batcher'])));
	$p_width = mysqli_real_escape_string($con, stripslashes(trim($_POST['p_width'])));
	$p_qty = mysqli_real_escape_string($con, stripslashes(trim($_POST['p_qty'])));
	$s_or_e = mysqli_real_escape_string($con, stripslashes(trim($_POST['s_or_e'])));
	
	$trf = mysqli_real_escape_string($con, stripslashes(trim($_POST['trf'])));
	$machine = mysqli_real_escape_string($con, stripslashes(trim($_POST['machine'])));
	$face_back = mysqli_real_escape_string($con, stripslashes(trim($_POST['face_back'])));

	

	$tensile_warp = mysqli_real_escape_string($con, stripslashes(trim($_POST['tensile_warp'])));
	$tensile_weft = mysqli_real_escape_string($con, stripslashes(trim($_POST['tensile_weft'])));

	$tear_force_warp = mysqli_real_escape_string($con, stripslashes(trim($_POST['tear_force_warp'])));
	$tear_force_weft = mysqli_real_escape_string($con, stripslashes(trim($_POST['tear_force_weft'])));

    
    $hand_feel = mysqli_real_escape_string($con, stripslashes(trim($_POST['hand_feel'])));
    $raising_quality = mysqli_real_escape_string($con, stripslashes(trim($_POST['raising_quality'])));
	$status = mysqli_real_escape_string($con, stripslashes(trim($_POST['status'])));
	$remarks = mysqli_real_escape_string($con, stripslashes(trim($_POST['remarks'])));


	
	$insert_pp_details_statement = "UPDATE `raising` 
								    SET `date`= '$date',
								   		`b_batcher`= '$b_batcher',
								   		`a_batcher`= '$a_batcher',
								   		`p_width`= '$p_width',
								   		`p_qty`= '$p_qty',
								   		`s_or_e`= '$s_or_e',
								   		`trf`='$trf',
		                                `machine`='machine',
		                                `face_back`='face_back',

		                                  `tensile_warp` = '$tensile_warp',
		                                  `tensile_weft` = '$tensile_weft',
		                                  `tear_force_warp` = '$tear_force_warp',
		                                  `tear_force_weft` = '$tear_force_weft',
		                                  
                                        `hand_feel`= '$hand_feel',
                                        `raising_quality`= '$raising_quality',
								   		`status`= '$status',
								   		`remarks`= '$remarks',
								   		`modifying_person_id`= '$edfms_logged_user_id',
								   		`modification_time`= NOW()
								  WHERE `route_issue_id` = '$route_issue_id' AND raising_id='$raising_id' ";
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