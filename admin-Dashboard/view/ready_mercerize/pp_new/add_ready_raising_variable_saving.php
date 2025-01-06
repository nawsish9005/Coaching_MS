<?php 
  session_start();
  require_once("../includes/db_session_chk.php");

  $data_previously_saved = 'No';
  $data_insertion_hampering = 'No';
  $uploaded_file_insertion_hamperings = 'No';
  $directory_already_created = 'No';

  $pp_no_id = mysqli_real_escape_string($con, stripslashes(trim($_POST['pp_id_number'])));
  $pp_details_id = mysqli_real_escape_string($con, stripslashes(trim($_POST['pp_details_id'])));

 

  //for Tensile Properties Warp
  $tensile_warp_cond1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['tensile_warp_cond1'])));
  $tensile_warp_value1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['tensile_warp_value1'])));
  $tensile_warp_value2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['tensile_warp_value2'])));
  $tensile_warp_cond2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['tensile_warp_cond2'])));
  $tensile_warp_unit = mysqli_real_escape_string($con, stripslashes(trim($_POST['tensile_warp_unit'])));

  //for Tensile Properties Weft
  $tensile_weft_cond1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['tensile_weft_cond1'])));
  $tensile_weft_value1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['tensile_weft_value1'])));
  $tensile_weft_value2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['tensile_weft_value2'])));
  $tensile_weft_cond2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['tensile_weft_cond2'])));
  $tensile_weft_unit = mysqli_real_escape_string($con, stripslashes(trim($_POST['tensile_weft_unit'])));

  //for Tear Force Warp
  $tear_force_warp_cond1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['tear_force_warp_cond1'])));
  $tear_force_warp_value1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['tear_force_warp_value1'])));
  $tear_force_warp_value2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['tear_force_warp_value2'])));
  $tear_force_warp_cond2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['tear_force_warp_cond2'])));
  $tear_force_warp_unit = mysqli_real_escape_string($con, stripslashes(trim($_POST['tear_force_warp_unit'])));

  //for Tear Force Weft
  $tear_force_weft_cond1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['tear_force_weft_cond1'])));
  $tear_force_weft_value1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['tear_force_weft_value1'])));
  $tear_force_weft_value2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['tear_force_weft_value2'])));
  $tear_force_weft_cond2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['tear_force_weft_cond2'])));
  $tear_force_weft_unit = mysqli_real_escape_string($con, stripslashes(trim($_POST['tear_force_weft_unit'])));



  $active = 1;

  //chcek last insert id
  $sql = 'SELECT id
            FROM ready_for_raising_standard ORDER BY id DESC LIMIT 1';
  $sql_res = mysqli_query($con, $sql) or die(mysqli_error($con));
  $sql_row = mysqli_fetch_assoc($sql_res);
  $ready_for_raising_standard_id = $sql_row['id'] + 1;


  $insert_sql_statement = "INSERT INTO `ready_for_raising_standard` 
                             ( 
                              `ready_for_raising_standard_id`,
                              `pp_no_id`, 
                              `pp_details_id`, 



                              `tensile_warp_cond1` ,
                              `tensile_warp_value1` ,
                              `tensile_warp_value2` ,
                              `tensile_warp_cond2` ,
                              `tensile_warp_unit` ,

                              `tensile_weft_cond1` ,
                              `tensile_weft_value1` ,
                              `tensile_weft_value2` ,
                              `tensile_weft_cond2` ,
                              `tensile_weft_unit` ,

                              `tear_force_warp_cond1` ,
                              `tear_force_warp_value1` ,
                              `tear_force_warp_value2` ,
                              `tear_force_warp_cond2` ,
                              `tear_force_warp_unit` ,

                              `tear_force_weft_cond1` ,
                              `tear_force_weft_value1` ,
                              `tear_force_weft_value2` ,
                              `tear_force_weft_cond2` ,
                              `tear_force_weft_unit`,
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
                              '$ready_for_raising_standard_id',
                              '$pp_no_id', 
                              '$pp_details_id', 

                              '$tensile_warp_cond1',
                              '$tensile_warp_value1',
                              '$tensile_warp_value2',
                              '$tensile_warp_cond2',
                              '$tensile_warp_unit',

                              '$tensile_weft_cond1',
                              '$tensile_weft_value1',
                              '$tensile_weft_value2',
                              '$tensile_weft_cond2',
                              '$tensile_weft_unit',

                              '$tear_force_warp_cond1',
                              '$tear_force_warp_value1',
                              '$tear_force_warp_value2',
                              '$tear_force_warp_cond2',
                              '$tear_force_warp_unit',

                              '$tear_force_weft_cond1',
                              '$tear_force_weft_value1',
                              '$tear_force_weft_value2',
                              '$tear_force_weft_cond2',
                              '$tear_force_weft_unit',

                              
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
      echo $last_id = mysqli_insert_id($con);
    }
?>