<?php 
	session_start();
	require_once("../includes/db_session_chk.php");

	$data_previously_saved = 'No';
	$data_insertion_hampering = 'No';
	$uploaded_file_insertion_hamperings = 'No';
	$directory_already_created = 'No';

	$pp_no_id = mysqli_real_escape_string($con, stripslashes(trim($_POST['pp_no_id'])));
	$pp_details_id = mysqli_real_escape_string($con, stripslashes(trim($_POST['pp_details_id'])));

	$custom_date = mysqli_real_escape_string($con, stripslashes(trim($_POST['custom_date'])));
	$received_quantity = mysqli_real_escape_string($con, stripslashes(trim($_POST['received_quantity'])));
	$yarn_count_warp = mysqli_real_escape_string($con, stripslashes(trim($_POST['yarn_count_warp'])));
	$yarn_count_weft = mysqli_real_escape_string($con, stripslashes(trim($_POST['yarn_count_weft'])));
	$thread_epi = mysqli_real_escape_string($con, stripslashes(trim($_POST['thread_epi'])));
	$thread_ppi = mysqli_real_escape_string($con, stripslashes(trim($_POST['thread_ppi'])));
	$gsm = mysqli_real_escape_string($con, stripslashes(trim($_POST['gsm_count_warp'])));

  $fiber_total_polyester = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_total_polyester'])));
  $fiber_total_cotton = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_total_cotton'])));
  $fiber_total_thired = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_total_thired'])));
  $fiber_total_fourth = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_total_fourth'])));

  $fiber_warp_polyester = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_warp_polyester'])));
  $fiber_warp_cotton = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_warp_cotton'])));
  $fiber_warp_thired = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_warp_thired'])));
	$fiber_warp_fourth = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_warp_fourth'])));
  
  $fiber_weft_polyester = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_weft_polyester'])));
  $fiber_weft_cotton = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_weft_cotton'])));
  $fiber_weft_thired = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_weft_thired'])));
	$fiber_weft_fourth = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_weft_fourth'])));

	$width = mysqli_real_escape_string($con, stripslashes(trim($_POST['width'])));
	$remarks = mysqli_real_escape_string($con, stripslashes(trim($_POST['remarks'])));
	$status = mysqli_real_escape_string($con, stripslashes(trim($_POST['status'])));
	$active = 1;

	if (($pp_no_id == '') || (empty($pp_no_id)) || is_null($pp_no_id) || ($pp_details_id == '') || (empty($pp_details_id)) || is_null($pp_details_id) 
		|| ($custom_date == '') || (empty($custom_date)) || is_null($custom_date) || ($received_quantity == '') || (empty($received_quantity))
		|| is_null($received_quantity) || ($yarn_count_warp == '') || (empty($yarn_count_warp)) || is_null($yarn_count_warp) || 
		($yarn_count_weft == '') || (empty($yarn_count_weft)) || is_null($yarn_count_weft) || ($thread_epi == '') ||
		(empty($thread_epi)) || is_null($thread_epi) || ($thread_ppi == '') || (empty($thread_ppi)) || is_null($thread_ppi) 
		|| ($gsm == '') || (empty($gsm)) || is_null($gsm) || ($width == '') || (empty($width)) 
		|| is_null($width) ) 
	{
	   echo "No data found";
	}

	else
	{
      $sql = 'SELECT id
              FROM greige_receiving_process_info 
              ORDER BY id 
              DESC LIMIT 1';
      $sql_res = mysqli_query($con, $sql) or die(mysqli_error($con));
      $sql_row = mysqli_fetch_assoc($sql_res);
      $greige_issunce_id = $sql_row['id'] + 1;

    	$insert_sql_statement = "INSERT INTO `greige_receiving_process_info` 
                                 ( 
                                  `greige_issunce_id`,
                                  `pp_no_id`, 
                                  `pp_details_id`, 
                                  `custom_date`,
                                  `received_quantity`,
                                  `yarn_warp`,
                                  `yarn_weft`,
                                  `thread_epi`,
                                  `thread_ppi`,
                                  `gsm`,
                                  `fiber_total_polyester`,
                                  `fiber_total_cotton`,
                                  `fiber_total_thired`,
                                  `fiber_total_fourth`,
                                  `fiber_warp_polyester`,
                                  `fiber_warp_cotton`,
                                  `fiber_warp_thired`,
                                  `fiber_warp_fourth`,
                                  `fiber_weft_polyester`,
                                  `fiber_weft_cotton`,
                                  `fiber_weft_thired`,
                                  `fiber_weft_fourth`,
                                  `width`,
                                  `status`,
                                  `remarks`,
                                  `active`,
                                  `recording_person_id`, 
                                  `recording_person_name`, 
                                  `recording_time`, 
                                  `modifying_person_id`, 
                                  `modification_time` 
                                 ) 
                            VALUES 
                                 ( 
                                  '$greige_issunce_id',
                                  '$pp_no_id', 
                                  '$pp_details_id', 
                                  '$custom_date',
                                  '$received_quantity',
                                  '$yarn_count_warp',
                                  '$yarn_count_weft',
                                  '$thread_epi',
                                  '$thread_ppi',
                                  '$gsm',
                                  '$fiber_total_polyester',
                                  '$fiber_total_cotton',
                                  '$fiber_total_thired',
                                  '$fiber_total_fourth',
                                  '$fiber_warp_polyester',
                                  '$fiber_warp_cotton',
                                  '$fiber_warp_thired',
                                  '$fiber_warp_fourth',
                                  '$fiber_weft_polyester',
                                  '$fiber_weft_cotton',
                                  '$fiber_weft_thired',
                                  '$fiber_weft_fourth',
                                  '$width',
                                  '$status',
                                  '$remarks',
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
	        echo $data_insertion_hampering = 'greige_issunce No';
	    }
	    else
	    {
	    	  $last_greige_issunce_id = mysqli_insert_id($con);

          //add route process if previous in route_issue_main

          $sql_for_route_issue = "SELECT *
                                    FROM process_name_define
                                   WHERE pp_no_id = '$pp_no_id' 
                                     AND pp_details_id = '$pp_details_id'
                                     AND active = '1'
                                 ";
          $sql_res_for_route_issue = mysqli_query($con, $sql_for_route_issue) or die(mysqli_error($con));
          $sql_row_for_route_issue_counter = mysqli_num_rows($sql_res_for_route_issue);
          if ($sql_row_for_route_issue_counter >= 1) 
          {
              
              while ($row_for_route_issue = mysqli_fetch_assoc($sql_res_for_route_issue)) 
              {
                  $route = $row_for_route_issue['route'];
                  $process = $row_for_route_issue['process'];
                  $process_number = $row_for_route_issue['process_number'];

                  $sql = 'SELECT id
                      FROM process_name_define_after_greige_receiving ORDER BY id DESC LIMIT 1';
                  $sql_res = mysqli_query($con, $sql) or die(mysqli_error($con));
                  $sql_row = mysqli_fetch_assoc($sql_res);
                  $route_issue_id = $sql_row['id'] + 1;

                  $insert_pp_details_statement = "INSERT INTO `process_name_define_after_greige_receiving` 
                                                   ( 
                                                    `route_issue_id`,
                                                    `greige_issunce_id`, 
                                                    `route`,
                                                    `original`, 
                                                    `process`,
                                                    `process_number`,
                                                    `active`,
                                                    `complete`,
                                                    `recording_person_id`, 
                                                    `recording_person_name`, 
                                                    `recording_time`, 
                                                    `modifying_person_id`, 
                                                    `modification_time` 
                                                   ) 
                                              VALUES 
                                                   ( 
                                                    '$route_issue_id',
                                                    '$greige_issunce_id', 
                                                    '$route', 
                                                    '0',
                                                    '$process',
                                                    '$process_number',
                                                    '$active',
                                                    '$complete',
                                                    '$edfms_logged_user_id', 
                                                    '$edfms_logged_first_name $edfms_logged_last_name', 
                                                    NOW(), 
                                                    '$edfms_logged_user_id', 
                                                    NOW() 
                                                   )";
                  mysqli_query($con, $insert_pp_details_statement) or die(mysqli_error($con));
                
                    if(mysqli_affected_rows($con) <> 1)
                    {
                        echo $data_insertion_hampering = 'Not insert new pp details';
                    }

                    else
                    {
                      
                    }
              }
          }

          //add route process if previous pp and pp version under route issue occure priviously

          // $sql_for_route_issue = "SELECT route_issue.* 
          //                           FROM route_issue, greige_issunce 
          //                          WHERE  greige_issunce.pp_no_id = '$pp_no_id' 
          //                            AND greige_issunce.pp_details_id = '$pp_details_id'
          //                            AND greige_issunce.greige_issunce_id = route_issue.greige_issunce_id
          //                            AND route_issue.original = '1'
          //                        ";
          // $sql_res_for_route_issue = mysqli_query($con, $sql_for_route_issue) or die(mysqli_error($con));
          // $sql_row_for_route_issue_counter = mysqli_num_rows($sql_res_for_route_issue);
          // if ($sql_row_for_route_issue_counter >= 1) 
          // {
              
          //     while ($row_for_route_issue = mysqli_fetch_assoc($sql_res_for_route_issue)) 
          //     {
          //         $route = $row_for_route_issue['route'];
          //         $process = $row_for_route_issue['process'];
          //         $process_number = $row_for_route_issue['process_number'];

          //         $sql = 'SELECT id
          //             FROM route_issue ORDER BY id DESC LIMIT 1';
          //         $sql_res = mysqli_query($con, $sql) or die(mysqli_error($con));
          //         $sql_row = mysqli_fetch_assoc($sql_res);
          //         $route_issue_id = $sql_row['id'] + 1;

          //         $insert_pp_details_statement = "INSERT INTO `route_issue` 
          //                                          ( 
          //                                           `route_issue_id`,
          //                                           `greige_issunce_id`, 
          //                                           `route`,
          //                                           `original`, 
          //                                           `process`,
          //                                           `process_number`,
          //                                           `active`,
          //                                           `complete`,
          //                                           `recording_person_id`, 
          //                                           `recording_person_name`, 
          //                                           `recording_time`, 
          //                                           `modifying_person_id`, 
          //                                           `modification_time` 
          //                                          ) 
          //                                     VALUES 
          //                                          ( 
          //                                           '$route_issue_id',
          //                                           '$greige_issunce_id', 
          //                                           '$route', 
          //                                           '0',
          //                                           '$process',
          //                                           '$process_number',
          //                                           '$active',
          //                                           '$complete',
          //                                           '$edfms_logged_user_id', 
          //                                           '$edfms_logged_first_name $edfms_logged_last_name', 
          //                                           NOW(), 
          //                                           '$edfms_logged_user_id', 
          //                                           NOW() 
          //                                          )";
          //         mysqli_query($con, $insert_pp_details_statement) or die(mysqli_error($con));
                
          //           if(mysqli_affected_rows($con) <> 1)
          //           {
          //               echo $data_insertion_hampering = 'Not insert new pp details';
          //           }

          //           else
          //           {
                      
          //           }
          //     }
          // }

	    }


      //update pp version againest process route status
      $insert_sql_pp_statement = "UPDATE `version_wise_process_program_info` 
                    SET `greige_receive_status`= '1',
                      `modifying_person_id`= '$edfms_logged_user_id',
                      `modification_time`= NOW()
                  WHERE `pp_no_id` = '$pp_no_id'
                    AND `pp_id` = '$pp_details_id'";

      mysqli_query($con, $insert_sql_pp_statement) or die(mysqli_error($con));
		
	}
?>