<?php 
	session_start();
	require_once("../includes/db_session_chk.php");

	$data_previously_saved = 'No';
	$data_insertion_hampering = 'No';
	$uploaded_file_insertion_hamperings = 'No';
	$directory_already_created = 'No';

	$pp_no_id = mysqli_real_escape_string($con, stripslashes(trim($_POST['pp_no_id'])));
  $printing_standard_id = mysqli_real_escape_string($con, stripslashes(trim($_POST['printing_standard_id'])));

	//for rubbing dry
  $rubbing_dry_cond1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['rubbing_dry_cond1'])));
  $rubbing_dry_value1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['rubbing_dry_value1'])));
  $rubbing_dry_value2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['rubbing_dry_value2'])));
  $rubbing_dry_cond2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['rubbing_dry_cond2'])));

  //for rubbing wet
  $rubbing_wet_cond1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['rubbing_wet_cond1'])));
  $rubbing_wet_value1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['rubbing_wet_value1'])));
  $rubbing_wet_value2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['rubbing_wet_value2'])));
  $rubbing_wet_cond2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['rubbing_wet_cond2'])));

	$previous_active = 0;
  $new_active = 1;

  $update_sql_statement = "UPDATE `printing_standard` 
                    SET `active`= '$previous_active',
                      `modifying_person_id`= '$edfms_logged_user_id',
                      `modification_time`= NOW()
                  WHERE `pp_no_id` = '$pp_no_id'";

   mysqli_query($con, $update_sql_statement) or die(mysqli_error($con));

   //find out pp details id
   $sql_for_pp_details = "SELECT *
          FROM pp_details WHERE pp_no_id = '$pp_no_id' AND active = '1'";
   $sql_res_for_pp_details = mysqli_query($con, $sql_for_pp_details) or die(mysqli_error($con));
   while( $sql_row_for_pp_details = mysqli_fetch_assoc($sql_res_for_pp_details))
   { 
       $pp_details_id = $sql_row_for_pp_details['pp_id'];
       
       //chcek last insert id
       $sql = 'SELECT id
                FROM printing_standard ORDER BY id DESC LIMIT 1';
       $sql_res = mysqli_query($con, $sql) or die(mysqli_error($con));
       $sql_row = mysqli_fetch_assoc($sql_res);
       $printing_standard_id = $sql_row['id'] + 1;

      	$insert_sql_statement = "INSERT INTO `printing_standard` 
                                   ( 
                                    `printing_standard_id`,
                                    `pp_no_id`, 
                                    `pp_details_id`,

                                    `rubbing_dry_cond1`,
                                    `rubbing_dry_value1`,
                                    `rubbing_dry_value2`,
                                    `rubbing_dry_cond2`,

                                    `rubbing_wet_cond1`,
                                    `rubbing_wet_value1`,
                                    `rubbing_wet_value2`,
                                    `rubbing_wet_cond2`,

                                    `active`,
                                    `recording_person_id`, 
                                    `recording_person_name`, 
                                    `recording_time`, 
                                    `modifying_person_id`, 
                                    `modification_time` 
                                   ) 
                              VALUES 
                                   ( 
                                    '$printing_standard_id',
                                    '$pp_no_id', 
                                    '$pp_details_id',

                                    '$rubbing_dry_cond1',
                                    '$rubbing_dry_value1',
                                    '$rubbing_dry_value2',
                                    '$rubbing_dry_cond2',

                                    '$rubbing_wet_cond1',
                                    '$rubbing_wet_value1',
                                    '$rubbing_wet_value2',
                                    '$rubbing_wet_cond2',
                                    
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
    }
?>