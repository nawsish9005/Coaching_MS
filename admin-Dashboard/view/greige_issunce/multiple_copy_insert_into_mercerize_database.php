<?php 
  session_start();
  require_once("../includes/db_session_chk.php");

  $data_previously_saved = 'No';
  $data_insertion_hampering = 'No';
  $uploaded_file_insertion_hamperings = 'No';
  $directory_already_created = 'No';

  $selection_of_multiple_pp_version_for_copy = mysqli_real_escape_string($con, stripslashes(trim($_POST['selection_of_multiple_pp_version_for_copy'])));
  $pp_no_id = mysqli_real_escape_string($con, stripslashes(trim($_POST['pp_no_id'])));

  //this is important for me
  $result = explode(",", $selection_of_multiple_pp_version_for_copy);
  $total_length = count($result);

  for ($i=0; $i < $total_length; $i++) 
  { 
      if ($result[$i] != "") 
      {
          $pp_details_id = $result[$i]; 
      
          //update privious data
          $update_sql_statement = "UPDATE `mercerize_standard` 
                            SET `active`= '0',
                              `lock_or_unlock` = '1',
                              `modifying_person_id`= '$edfms_logged_user_id',
                              `modification_time`= NOW()
                          WHERE `pp_no_id` = '$pp_no_id' AND pp_details_id = '$pp_details_id' ";

           mysqli_query($con, $update_sql_statement) or die(mysqli_error($con));
          // end of update privious data

          //demo test

           $absorbency_cond1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['absorbency_cond1'])));
          $absorbency_value1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['absorbency_value1'])));
          $absorbency_value2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['absorbency_value2'])));
          $absorbency_cond2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['absorbency_cond2'])));

          $sizing_cond1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['sizing_cond1'])));
          $sizing_value1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['sizing_value1'])));
          $sizing_value2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['sizing_value2'])));
          $sizing_cond2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['sizing_cond2'])));

          //for temp
          $whiteness_cond1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['whiteness_cond1'])));
          $whiteness_value1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['whiteness_value1'])));
          $whiteness_value2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['whiteness_value2'])));
          $whiteness_cond2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['whiteness_cond2'])));

          //for ph
          $ph_cond1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['ph_cond1'])));
          $ph_value1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['ph_value1'])));
          $ph_value2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['ph_value2'])));
          $ph_cond2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['ph_cond2'])));



          $active = 1;

          //chcek last insert id
          $sql = 'SELECT id
                    FROM mercerize_standard ORDER BY id DESC LIMIT 1';
          $sql_res = mysqli_query($con, $sql) or die(mysqli_error($con));
          $sql_row = mysqli_fetch_assoc($sql_res);
          $mercerize_standard_id = $sql_row['id'] + 1;


          $insert_sql_statement = "INSERT INTO `mercerize_standard` 
                                     ( 
                                      `mercerize_standard_id`,
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
                                      `ph_cond1`,
                                      `ph_value1`,
                                      `ph_value2`,
                                      `ph_cond2`,
                                      `lock_or_unlock`,
                                      `active`,
                                      `recording_person_id`, 
                                      `recording_person_name`, 
                                      `recording_time`, 
                                      `modifying_person_id`, 
                                      `modification_time` 
                                     ) 
                                VALUES 
                                     ( 
                                      '$mercerize_standard_id',
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
                                      '$ph_cond1',
                                      '$ph_value1',
                                      '$ph_value2',
                                      '$ph_cond2',
                                      '1',
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
               $last_id = mysqli_insert_id($con);
            }

      //demo test end
    }
  }
  //this is important for me
?>