<?php 
	session_start();
	require_once("../includes/db_session_chk.php");

	$data_previously_saved = 'No';
	$data_insertion_hampering = 'No';
	$uploaded_file_insertion_hamperings = 'No';
	$directory_already_created = 'No';

	$pp_no_id = mysqli_real_escape_string($con, stripslashes(trim($_POST['pp_no_id'])));
  $pp_details_id = mysqli_real_escape_string($con, stripslashes(trim($_POST['pp_details_id'])));
  $bleaching_standard_id = mysqli_real_escape_string($con, stripslashes(trim($_POST['bleaching_standard_id'])));

	//for absorbency
	$absorbency_cond1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['absorbency_cond1'])));
	$absorbency_value1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['absorbency_value1'])));
	$absorbency_value2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['absorbency_value2'])));
	$absorbency_cond2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['absorbency_cond2'])));

	//for sizing
	$sizing_cond1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['sizing_cond1'])));
	$sizing_value1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['sizing_value1'])));
	$sizing_value2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['sizing_value2'])));
	$sizing_cond2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['sizing_cond2'])));

	//for whiteness
	$whiteness_cond1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['whiteness_cond1'])));
	$whiteness_value1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['whiteness_value1'])));
	$whiteness_value2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['whiteness_value2'])));
	$whiteness_cond2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['whiteness_cond2'])));

	//for pilling
	$pilling_cond1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['pilling_cond1'])));
	$pilling_value1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['pilling_value1'])));
	$pilling_value2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['pilling_value2'])));
	$pilling_cond2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['pilling_cond2'])));

  //for ph
  $ph_cond1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['ph_cond1'])));
  $ph_value1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['ph_value1'])));
  $ph_value2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['ph_value2'])));
  $ph_cond2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['ph_cond2'])));


	$previous_active = 0;
  $new_active = 1;

  $update_sql_statement = "UPDATE `defining_bleaching_qc_standard` 
                    SET `active`= '$previous_active',
                      `modifying_person_id`= '$edfms_logged_user_id',
                      `modification_time`= NOW()
                  WHERE `bleaching_standard_id` = '$bleaching_standard_id'";

   mysqli_query($con, $update_sql_statement) or die(mysqli_error($con));

	$insert_sql_statement = "INSERT INTO `defining_bleaching_qc_standard` 
                             ( 
                              `bleaching_standard_id`,
                              `pp_no_id`, 
                              `pp_details_id`, 
                              `absorbency_cond1`,
                              `absorbency_value1`,
                              `absorbency_value2`,
                              `absorbency_cond2`,
                              `sizing_cond1`,
                              `sizing_value1`,
                              `sizing_value2`,
                              `sizing_cond2`, 
                              `whiteness_cond1`,
                              `whiteness_value1`,
                              `whiteness_value2`,
                              `whiteness_cond2`,
                              `pilling_cond1`,
                              `pilling_value1`,
                              `pilling_value2`,
                              `pilling_cond2`,
                              `ph_cond1`,
                              `ph_value1`,
                              `ph_value2`,
                              `ph_cond2`,
                              `active`,
                              `recording_person_id`, 
                              `recording_person_name`, 
                              `recording_time`, 
                              `modifying_person_id`, 
                              `modification_time` 
                             ) 
                        VALUES 
                             ( 
                              '$bleaching_standard_id',
                              '$pp_no_id', 
                              '$pp_details_id', 
                              '$absorbency_cond1',
                              '$absorbency_value1',
                              '$absorbency_value2',
                              '$absorbency_cond2',
                              '$sizing_cond1',
                              '$sizing_value1',
                              '$sizing_value2',
                              '$sizing_cond2', 
                              '$whiteness_cond1',
                              '$whiteness_value1',
                              '$whiteness_value2',
                              '$whiteness_cond2',
                              '$pilling_cond1',
                              '$pilling_value1',
                              '$pilling_value2',
                              '$pilling_cond2',
                              '$ph_cond1',
                              '$ph_value1',
                              '$ph_value2',
                              '$ph_cond2', 
                              '$new_active',
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