<?php 
	session_start();
	require_once("../includes/db_session_chk.php");

	$select_pp_version = $_POST['select_pp_version'];
	$select_pp_no_id = $_POST['select_pp_no_id'];
  $select_pp_version_standard = $_POST['select_pp_version_standard'];

  if ($select_pp_version_standard == 1) 
  {
      $update_sql_statement = "UPDATE `gray_variable` 
                    SET 
                      `lock_or_unlock` = '0',
                      `modifying_person_id`= '$edfms_logged_user_id',
                      `modification_time`= NOW()
                  WHERE `pp_no_id` = '$select_pp_no_id'
                    AND `pp_details_id` = '$select_pp_version'
                    AND `active` = '1'
                    AND `lock_or_unlock` = '1' ";
  }

  else if($select_pp_version_standard == 2)
  {
      $update_sql_statement = "UPDATE `singe_standard` 
                    SET 
                      `lock_or_unlock` = '0',
                      `modifying_person_id`= '$edfms_logged_user_id',
                      `modification_time`= NOW()
                  WHERE `pp_no_id` = '$select_pp_no_id'
                    AND `pp_details_id` = '$select_pp_version'
                    AND `active` = '1'
                    AND `lock_or_unlock` = '1' ";
  }

  else if($select_pp_version_standard == 3)
  {
      $update_sql_statement = "UPDATE `bleaching_standard` 
                    SET 
                      `lock_or_unlock` = '0',
                      `modifying_person_id`= '$edfms_logged_user_id',
                      `modification_time`= NOW()
                  WHERE `pp_no_id` = '$select_pp_no_id'
                    AND `pp_details_id` = '$select_pp_version'
                    AND `active` = '1'
                    AND `lock_or_unlock` = '1' ";
  }

  else if($select_pp_version_standard == 4)
  {
      $update_sql_statement = "UPDATE `ready_mercerize_standard` 
                    SET 
                      `lock_or_unlock` = '0',
                      `modifying_person_id`= '$edfms_logged_user_id',
                      `modification_time`= NOW()
                  WHERE `pp_no_id` = '$select_pp_no_id'
                    AND `pp_details_id` = '$select_pp_version'
                    AND `active` = '1'
                    AND `lock_or_unlock` = '1' ";
  }

  else if($select_pp_version_standard == 5)
  {
      $update_sql_statement = "UPDATE `mercerize_standard` 
                    SET 
                      `lock_or_unlock` = '0',
                      `modifying_person_id`= '$edfms_logged_user_id',
                      `modification_time`= NOW()
                  WHERE `pp_no_id` = '$select_pp_no_id'
                    AND `pp_details_id` = '$select_pp_version'
                    AND `active` = '1'
                    AND `lock_or_unlock` = '1' ";
  }

  else if($select_pp_version_standard == 6)
  {
      $update_sql_statement = "UPDATE `equalize_standard` 
                    SET 
                      `lock_or_unlock` = '0',
                      `modifying_person_id`= '$edfms_logged_user_id',
                      `modification_time`= NOW()
                  WHERE `pp_no_id` = '$select_pp_no_id'
                    AND `pp_details_id` = '$select_pp_version'
                    AND `active` = '1'
                    AND `lock_or_unlock` = '1' ";
  }

  else if($select_pp_version_standard == 7)
  {
      $update_sql_statement = "UPDATE `printing_standard` 
                    SET 
                      `lock_or_unlock` = '0',
                      `modifying_person_id`= '$edfms_logged_user_id',
                      `modification_time`= NOW()
                  WHERE `pp_no_id` = '$select_pp_no_id'
                    AND `pp_details_id` = '$select_pp_version'
                    AND `active` = '1'
                    AND `lock_or_unlock` = '1' ";
  }

  else if($select_pp_version_standard == 8)
  {
      $update_sql_statement = "UPDATE `curing_standard` 
                    SET 
                      `lock_or_unlock` = '0',
                      `modifying_person_id`= '$edfms_logged_user_id',
                      `modification_time`= NOW()
                  WHERE `pp_no_id` = '$select_pp_no_id'
                    AND `pp_details_id` = '$select_pp_version'
                    AND `active` = '1'
                    AND `lock_or_unlock` = '1' ";
  }

  else
  {
      echo "nothing found";
  }

  mysqli_query($con, $update_sql_statement) or die(mysqli_error($con));

?>