<?php 
	session_start();
	require_once("../includes/db_session_chk.php");

	$data_previously_saved = 'No';
	$data_insertion_hampering = 'No';
	$uploaded_file_insertion_hamperings = 'No';
	$directory_already_created = 'No';

	$pp_no_id = mysqli_real_escape_string($con, stripslashes(trim($_POST['pp_no_id'])));
	$pp_details_id = mysqli_real_escape_string($con, stripslashes(trim($_POST['pp_details_id'])));

	//for yarn warp
	$yarn_warp_cond1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['yarn_warp_cond1'])));
	$yarn_warp_value1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['yarn_warp_value1'])));
	$yarn_warp_value2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['yarn_warp_value2'])));
	$yarn_warp_cond2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['yarn_warp_cond2'])));

	//for yarn weft
	$yarn_weft_cond1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['yarn_weft_cond1'])));
	$yarn_weft_value1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['yarn_weft_value1'])));
	$yarn_weft_value2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['yarn_weft_value2'])));
	$yarn_weft_cond2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['yarn_weft_cond2'])));

	//for thread epi
	$thread_epi_cond1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['thread_epi_cond1'])));
	$thread_epi_value1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['thread_epi_value1'])));
	$thread_epi_value2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['thread_epi_value2'])));
	$thread_epi_cond2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['thread_epi_cond2'])));

	//for thread ppi
	$thread_ppi_cond1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['thread_ppi_cond1'])));
	$thread_ppi_value1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['thread_ppi_value1'])));
	$thread_ppi_value2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['thread_ppi_value2'])));
	$thread_ppi_cond2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['thread_ppi_cond2'])));

	//for gsm warp
	$gsm_warp_cond1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['gsm_warp_cond1'])));
	$gsm_warp_value1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['gsm_warp_value1'])));
	$gsm_warp_value2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['gsm_warp_value2'])));
	$gsm_warp_cond2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['gsm_warp_cond2'])));

	//for fiber warp
	$fiber_warp_cond1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_warp_cond1'])));
	$fiber_warp_value1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_warp_value1'])));
	$fiber_warp_value2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_warp_value2'])));
	$fiber_warp_cond2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_warp_cond2'])));

	//for gsm weft
	$fiber_weft_cond1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_weft_cond1'])));
	$fiber_weft_value1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_weft_value1'])));
	$fiber_weft_value2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_weft_value2'])));
	$fiber_weft_cond2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_weft_cond2'])));

	$active = 1;


	$insert_sql_statement = "INSERT INTO `gray_variable` 
                             ( 
                              `pp_no_id`, 
                              `pp_details_id`, 
                              `yarn_warp_cond1`,
                              `yarn_warp_value1`,
                              `yarn_warp_value2`,
                              `yarn_warp_cond2`,
                              `yarn_weft_cond1`,
                              `yarn_weft_value1`,
                              `yarn_weft_value2`,
                              `yarn_weft_cond2`, 
                              `thread_epi_cond1`,
                              `thread_epi_value1`,
                              `thread_epi_value2`,
                              `thread_epi_cond2`,
                              `thread_ppi_cond1`,
                              `thread_ppi_value1`,
                              `thread_ppi_value2`,
                              `thread_ppi_cond2`,
                              `gsm_warp_cond1`,
                              `gsm_warp_value1`,
                              `gsm_warp_value2`,
                              `gsm_warp_cond2`,
                              `fiber_warp_cond1`,
                              `fiber_warp_value1`,
                              `fiber_warp_value2`,
                              `fiber_warp_cond2`,
                              `fiber_weft_cond1`,
                              `fiber_weft_value1`,
                              `fiber_weft_value2`,
                              `fiber_weft_cond2`,  
                              `active`,
                              `recording_person_id`, 
                              `recording_person_name`, 
                              `recording_time`, 
                              `modifying_person_id`, 
                              `modification_time` 
                             ) 
                        VALUES 
                             ( 
                              '$pp_no_id', 
                              '$pp_details_id', 
                              '$yarn_warp_cond1',
                              '$yarn_warp_value1',
                              '$yarn_warp_value2',
                              '$yarn_warp_cond2',
                              '$yarn_weft_cond1',
                              '$yarn_weft_value1',
                              '$yarn_weft_value2',
                              '$yarn_weft_cond2', 
                              '$thread_epi_cond1',
                              '$thread_epi_value1',
                              '$thread_epi_value2',
                              '$thread_epi_cond2',
                              '$thread_ppi_cond1',
                              '$thread_ppi_value1',
                              '$thread_ppi_value2',
                              '$thread_ppi_cond2',
                              '$gsm_warp_cond1',
                              '$gsm_warp_value1',
                              '$gsm_warp_value2',
                              '$gsm_warp_cond2',
                              '$fiber_warp_cond1',
                              '$fiber_warp_value1',
                              '$fiber_warp_value2',
                              '$fiber_warp_cond2',
                              '$fiber_weft_cond1',
                              '$fiber_weft_value1',
                              '$fiber_weft_value2',
                              '$fiber_weft_cond2',  
                              '$active',
                              '$edfms_logged_user_id', 
                              '$edfms_logged_first_name $edfms_logged_last_name', 
                              NOW(), 
                              '$edfms_logged_user_id', 
                              NOW() 
                             )";

    mysqli_query($con, $insert_sql_statement) or die(mysqli_error($con));
    
    if(mysqli_affected_rows($con) <> 1)
    {
        echo $data_insertion_hampering = 'Yes';
    }
    else
    {
      echo $last_id = mysqli_insert_id($con);
    }
?>