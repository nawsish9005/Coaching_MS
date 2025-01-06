<?php 
	session_start();
	require_once("../includes/db_session_chk.php");

	$data_previously_saved = 'No';
	$data_insertion_hampering = 'No';
	$uploaded_file_insertion_hamperings = 'No';
	$directory_already_created = 'No';

	$pp_no_id = mysqli_real_escape_string($con, stripslashes(trim($_POST['pp_id_number'])));
	$pp_details_id = mysqli_real_escape_string($con, stripslashes(trim($_POST['pp_details_id'])));

	//for whiteness
	$whiteness_cond1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['whiteness_cond1'])));
	$whiteness_value1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['whiteness_value1'])));
	$whiteness_value2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['whiteness_value2'])));
	$whiteness_cond2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['whiteness_cond2'])));

	//for pilling
	$bowing_and_skew_cond1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['bowing_and_skew_cond1'])));
	$bowing_and_skew_value1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['bowing_and_skew_value1'])));
	$bowing_and_skew_value2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['bowing_and_skew_value2'])));
	$bowing_and_skew_cond2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['bowing_and_skew_cond2'])));

  //for ph
  $ph_cond1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['ph_cond1'])));
  $ph_value1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['ph_value1'])));
  $ph_value2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['ph_value2'])));
  $ph_cond2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['ph_cond2'])));


	$active = 1;
  $lock_or_unlock = 1;

  //chcek last insert id
  $sql = 'SELECT id
            FROM ready_mercerize_standard ORDER BY id DESC LIMIT 1';
  $sql_res = mysqli_query($con, $sql) or die(mysqli_error($con));
  $sql_row = mysqli_fetch_assoc($sql_res);
  $ready_mercerize_standard_id = $sql_row['id'] + 1;

	$insert_sql_statement = "INSERT INTO `ready_mercerize_standard` 
                             ( 
                              `ready_mercerize_standard_id`,
                              `pp_no_id`, 
                              `pp_details_id`, 
                              `whiteness_cond1`,
                              `whiteness_value1`,
                              `whiteness_value2`,
                              `whiteness_cond2`,
                              `bowing_and_skew_cond1`,
                              `bowing_and_skew_value1`,
                              `bowing_and_skew_value2`,
                              `bowing_and_skew_cond2`,
                              `ph_cond1`,
                              `ph_value1`,
                              `ph_value2`,
                              `ph_cond2`,
                              `active`,
                              `lock_or_unlock`,
                              `recording_person_id`, 
                              `recording_person_name`, 
                              `recording_time`, 
                              `modifying_person_id`, 
                              `modification_time` 
                             ) 
                        VALUES 
                             ( 
                              '$ready_mercerize_standard_id',
                              '$pp_no_id', 
                              '$pp_details_id', 
                              '$whiteness_cond1',
                              '$whiteness_value1',
                              '$whiteness_value2',
                              '$whiteness_cond2',
                              '$bowing_and_skew_cond1',
                              '$bowing_and_skew_value1',
                              '$bowing_and_skew_value2',
                              '$bowing_and_skew_cond2',
                              '$ph_cond1',
                              '$ph_value1',
                              '$ph_value2',
                              '$ph_cond2', 
                              '$active',
                              '$lock_or_unlock',
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