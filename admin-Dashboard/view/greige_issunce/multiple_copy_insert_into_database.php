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
          $update_sql_statement = "UPDATE `gray_variable` 
                            SET `active`= '0',
                              `lock_or_unlock` = '1',
                              `modifying_person_id`= '$edfms_logged_user_id',
                              `modification_time`= NOW()
                          WHERE `pp_no_id` = '$pp_no_id' AND pp_details_id = '$pp_details_id' ";

           mysqli_query($con, $update_sql_statement) or die(mysqli_error($con));
          // end of update privious data

          //demo test

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



          //fiber content polyester selection for database
          $fiber_total_name_polyester = "";
          $fiber_total_polyester_cond1 = "";
          $fiber_total_polyester_value1 = "";
          $fiber_total_polyester_value2 = "";
          $fiber_total_polyester_cond2 = "";

          //for fiber warp polyester
          $fiber_warp_name_polyester = "";
          $fiber_warp_polyester_cond1 = "";
          $fiber_warp_polyester_value1 = "";
          $fiber_warp_polyester_value2 = "";
          $fiber_warp_polyester_cond2 = "";

          //for fiber weft polyester
          $fiber_weft_name_polyester = "";
          $fiber_weft_polyester_cond1 = "";
          $fiber_weft_polyester_value1 = "";
          $fiber_weft_polyester_value2 = "";
          $fiber_weft_polyester_cond2 = "";


          //fiber content cotton selection for database
          $fiber_total_name_cotton = "";
          $fiber_total_cotton_cond1 = "";
          $fiber_total_cotton_value1 = "";
          $fiber_total_cotton_value2 = "";
          $fiber_total_cotton_cond2 = "";

          //for fiber warp cotton
          $fiber_warp_name_cotton = "";
          $fiber_warp_cotton_cond1 = "";
          $fiber_warp_cotton_value1 = "";
          $fiber_warp_cotton_value2 = "";
          $fiber_warp_cotton_cond2 = "";

          //for fiber weft cotton
          $fiber_weft_name_cotton = "";
          $fiber_weft_cotton_cond1 = "";
          $fiber_weft_cotton_value1 = "";
          $fiber_weft_cotton_value2 = "";
          $fiber_weft_cotton_cond2 = "";


          //fiber content thired selection for database
          $fiber_total_name_thired = "";
          $fiber_total_thired_cond1 = "";
          $fiber_total_thired_value1 = "";
          $fiber_total_thired_value2 = "";
          $fiber_total_thired_cond2 = "";

          //for fiber warp thired
          $fiber_warp_name_thired = "";
          $fiber_warp_thired_cond1 = "";
          $fiber_warp_thired_value1 = "";
          $fiber_warp_thired_value2 = "";
          $fiber_warp_thired_cond2 = "";

          //for fiber weft thired
          $fiber_weft_name_thired = "";
          $fiber_weft_thired_cond1 = "";
          $fiber_weft_thired_value1 = "";
          $fiber_weft_thired_value2 = "";
          $fiber_weft_thired_cond2 = "";


          //fiber content fourth selection for database
          $fiber_total_name_fourth = "";
          $fiber_total_fourth_cond1 = "";
          $fiber_total_fourth_value1 = "";
          $fiber_total_fourth_value2 = "";
          $fiber_total_fourth_cond2 = "";

          //for fiber warp fourth
          $fiber_warp_name_fourth = "";
          $fiber_warp_fourth_cond1 = "";
          $fiber_warp_fourth_value1 = "";
          $fiber_warp_fourth_value2 = "";
          $fiber_warp_fourth_cond2 = "";

          //for fiber weft fourth
          $fiber_weft_name_fourth = "";
          $fiber_weft_fourth_cond1 = "";
          $fiber_weft_fourth_value1 = "";
          $fiber_weft_fourth_value2 = "";
          $fiber_weft_fourth_cond2 = "";

          $fiber_content_selected_for_number = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_content_select'])));

          if ($fiber_content_selected_for_number == '1') 
          {
              $fiber_total_name_polyester = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_total_name_polyester'])));
              $fiber_total_polyester_cond1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_total_polyester_cond1'])));
              $fiber_total_polyester_value1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_total_polyester_value1'])));
              $fiber_total_polyester_value2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_total_polyester_value2'])));
              $fiber_total_polyester_cond2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_total_polyester_cond2'])));

              $fiber_total_name_cotton = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_total_name_cotton'])));
              $fiber_total_cotton_cond1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_total_cotton_cond1'])));
              $fiber_total_cotton_value1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_total_cotton_value1'])));
              $fiber_total_cotton_value2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_total_cotton_value2'])));
              $fiber_total_cotton_cond2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_total_cotton_cond2'])));

              $fiber_total_name_thired = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_total_name_thired'])));
              $fiber_total_thired_cond1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_total_thired_cond1'])));
              $fiber_total_thired_value1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_total_thired_value1'])));
              $fiber_total_thired_value2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_total_thired_value2'])));
              $fiber_total_thired_cond2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_total_thired_cond2'])));

              $fiber_total_name_fourth = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_total_name_fourth'])));
              $fiber_total_fourth_cond1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_total_fourth_cond1'])));
              $fiber_total_fourth_value1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_total_fourth_value1'])));
              $fiber_total_fourth_value2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_total_fourth_value2'])));
              $fiber_total_fourth_cond2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_total_fourth_cond2'])));
          }

          else if ($fiber_content_selected_for_number == '2') 
          {
              $fiber_warp_name_polyester = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_warp_name_polyester'])));
              $fiber_warp_polyester_cond1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_warp_polyester_cond1'])));
              $fiber_warp_polyester_value1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_warp_polyester_value1'])));
              $fiber_warp_polyester_value2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_warp_polyester_value2'])));
              $fiber_warp_polyester_cond2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_warp_polyester_cond2'])));

              $fiber_weft_name_polyester = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_weft_name_polyester'])));
              $fiber_weft_polyester_cond1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_weft_polyester_cond1'])));
              $fiber_weft_polyester_value1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_weft_polyester_value1'])));
              $fiber_weft_polyester_value2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_weft_polyester_value2'])));
              $fiber_weft_polyester_cond2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_weft_polyester_cond2'])));

              $fiber_warp_name_cotton = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_warp_name_cotton'])));
              $fiber_warp_cotton_cond1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_warp_cotton_cond1'])));
              $fiber_warp_cotton_value1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_warp_cotton_value1'])));
              $fiber_warp_cotton_value2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_warp_cotton_value2'])));
              $fiber_warp_cotton_cond2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_warp_cotton_cond2'])));

              $fiber_weft_name_cotton = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_weft_name_cotton'])));
              $fiber_weft_cotton_cond1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_weft_cotton_cond1'])));
              $fiber_weft_cotton_value1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_weft_cotton_value1'])));
              $fiber_weft_cotton_value2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_weft_cotton_value2'])));
              $fiber_weft_cotton_cond2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_weft_cotton_cond2'])));

              $fiber_warp_name_thired = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_warp_name_thired'])));
              $fiber_warp_thired_cond1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_warp_thired_cond1'])));
              $fiber_warp_thired_value1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_warp_thired_value1'])));
              $fiber_warp_thired_value2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_warp_thired_value2'])));
              $fiber_warp_thired_cond2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_warp_thired_cond2'])));

              $fiber_weft_name_thired = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_weft_name_thired'])));
              $fiber_weft_thired_cond1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_weft_thired_cond1'])));
              $fiber_weft_thired_value1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_weft_thired_value1'])));
              $fiber_weft_thired_value2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_weft_thired_value2'])));
              $fiber_weft_thired_cond2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_weft_thired_cond2'])));

              $fiber_warp_name_fourth = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_warp_name_fourth'])));
              $fiber_warp_fourth_cond1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_warp_fourth_cond1'])));
              $fiber_warp_fourth_value1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_warp_fourth_value1'])));
              $fiber_warp_fourth_value2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_warp_fourth_value2'])));
              $fiber_warp_fourth_cond2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_warp_fourth_cond2'])));

              $fiber_weft_name_fourth = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_weft_name_fourth'])));
              $fiber_weft_fourth_cond1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_weft_fourth_cond1'])));
              $fiber_weft_fourth_value1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_weft_fourth_value1'])));
              $fiber_weft_fourth_value2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_weft_fourth_value2'])));
              $fiber_weft_fourth_cond2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_weft_fourth_cond2'])));
          }

          else
          {
              $fiber_total_name_polyester = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_total_name_polyester'])));
              $fiber_total_polyester_cond1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_total_polyester_cond1'])));
              $fiber_total_polyester_value1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_total_polyester_value1'])));
              $fiber_total_polyester_value2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_total_polyester_value2'])));
              $fiber_total_polyester_cond2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_total_polyester_cond2'])));

              $fiber_warp_name_polyester = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_warp_name_polyester'])));
              $fiber_warp_polyester_cond1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_warp_polyester_cond1'])));
              $fiber_warp_polyester_value1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_warp_polyester_value1'])));
              $fiber_warp_polyester_value2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_warp_polyester_value2'])));
              $fiber_warp_polyester_cond2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_warp_polyester_cond2'])));

              $fiber_weft_name_polyester = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_weft_name_polyester'])));
              $fiber_weft_polyester_cond1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_weft_polyester_cond1'])));
              $fiber_weft_polyester_value1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_weft_polyester_value1'])));
              $fiber_weft_polyester_value2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_weft_polyester_value2'])));
              $fiber_weft_polyester_cond2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_weft_polyester_cond2'])));

              $fiber_total_name_cotton = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_total_name_cotton'])));
              $fiber_total_cotton_cond1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_total_cotton_cond1'])));
              $fiber_total_cotton_value1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_total_cotton_value1'])));
              $fiber_total_cotton_value2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_total_cotton_value2'])));
              $fiber_total_cotton_cond2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_total_cotton_cond2'])));

              $fiber_warp_name_cotton = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_warp_name_cotton'])));
              $fiber_warp_cotton_cond1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_warp_cotton_cond1'])));
              $fiber_warp_cotton_value1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_warp_cotton_value1'])));
              $fiber_warp_cotton_value2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_warp_cotton_value2'])));
              $fiber_warp_cotton_cond2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_warp_cotton_cond2'])));

              $fiber_weft_name_cotton = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_weft_name_cotton'])));
              $fiber_weft_cotton_cond1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_weft_cotton_cond1'])));
              $fiber_weft_cotton_value1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_weft_cotton_value1'])));
              $fiber_weft_cotton_value2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_weft_cotton_value2'])));
              $fiber_weft_cotton_cond2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_weft_cotton_cond2'])));

              $fiber_total_name_thired = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_total_name_thired'])));
              $fiber_total_thired_cond1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_total_thired_cond1'])));
              $fiber_total_thired_value1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_total_thired_value1'])));
              $fiber_total_thired_value2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_total_thired_value2'])));
              $fiber_total_thired_cond2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_total_thired_cond2'])));

              $fiber_warp_name_thired = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_warp_name_thired'])));
              $fiber_warp_thired_cond1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_warp_thired_cond1'])));
              $fiber_warp_thired_value1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_warp_thired_value1'])));
              $fiber_warp_thired_value2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_warp_thired_value2'])));
              $fiber_warp_thired_cond2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_warp_thired_cond2'])));

              $fiber_weft_name_thired = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_weft_name_thired'])));
              $fiber_weft_thired_cond1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_weft_thired_cond1'])));
              $fiber_weft_thired_value1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_weft_thired_value1'])));
              $fiber_weft_thired_value2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_weft_thired_value2'])));
              $fiber_weft_thired_cond2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_weft_thired_cond2'])));

              $fiber_total_name_fourth = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_total_name_fourth'])));
              $fiber_total_fourth_cond1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_total_fourth_cond1'])));
              $fiber_total_fourth_value1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_total_fourth_value1'])));
              $fiber_total_fourth_value2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_total_fourth_value2'])));
              $fiber_total_fourth_cond2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_total_fourth_cond2'])));

              $fiber_warp_name_fourth = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_warp_name_fourth'])));
              $fiber_warp_fourth_cond1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_warp_fourth_cond1'])));
              $fiber_warp_fourth_value1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_warp_fourth_value1'])));
              $fiber_warp_fourth_value2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_warp_fourth_value2'])));
              $fiber_warp_fourth_cond2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_warp_fourth_cond2'])));

              $fiber_weft_name_fourth = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_weft_name_fourth'])));
              $fiber_weft_fourth_cond1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_weft_fourth_cond1'])));
              $fiber_weft_fourth_value1 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_weft_fourth_value1'])));
              $fiber_weft_fourth_value2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_weft_fourth_value2'])));
              $fiber_weft_fourth_cond2 = mysqli_real_escape_string($con, stripslashes(trim($_POST['fiber_weft_fourth_cond2'])));
          }

          $active = 1;

          //chcek last insert id
          $sql = 'SELECT id
                    FROM gray_variable ORDER BY id DESC LIMIT 1';
          $sql_res = mysqli_query($con, $sql) or die(mysqli_error($con));
          $sql_row = mysqli_fetch_assoc($sql_res);
          $gray_variable_id = $sql_row['id'] + 1;


          $insert_sql_statement = "INSERT INTO `gray_variable` 
                                     ( 
                                      `gray_variable_id`,
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
                                      `fiber_content_select`,
                                      `fiber_total_name_polyester`,
                                      `fiber_total_polyester_cond1`,
                                      `fiber_total_polyester_value1`,
                                      `fiber_total_polyester_value2`,
                                      `fiber_total_polyester_cond2`,
                                      `fiber_total_name_cotton`,
                                      `fiber_total_cotton_cond1`,
                                      `fiber_total_cotton_value1`,
                                      `fiber_total_cotton_value2`,
                                      `fiber_total_cotton_cond2`, 
                                      `fiber_total_name_thired`,
                                      `fiber_total_thired_cond1`,
                                      `fiber_total_thired_value1`,
                                      `fiber_total_thired_value2`,
                                      `fiber_total_thired_cond2`, 
                                      `fiber_total_name_fourth`,
                                      `fiber_total_fourth_cond1`,
                                      `fiber_total_fourth_value1`,
                                      `fiber_total_fourth_value2`,
                                      `fiber_total_fourth_cond2`,
                                      `fiber_warp_name_polyester`,
                                      `fiber_warp_polyester_cond1`,
                                      `fiber_warp_polyester_value1`,
                                      `fiber_warp_polyester_value2`,
                                      `fiber_warp_polyester_cond2`,
                                      `fiber_warp_name_cotton`,
                                      `fiber_warp_cotton_cond1`,
                                      `fiber_warp_cotton_value1`,
                                      `fiber_warp_cotton_value2`,
                                      `fiber_warp_cotton_cond2`, 
                                      `fiber_warp_name_thired`,
                                      `fiber_warp_thired_cond1`,
                                      `fiber_warp_thired_value1`,
                                      `fiber_warp_thired_value2`,
                                      `fiber_warp_thired_cond2`, 
                                      `fiber_warp_name_fourth`,
                                      `fiber_warp_fourth_cond1`,
                                      `fiber_warp_fourth_value1`,
                                      `fiber_warp_fourth_value2`,
                                      `fiber_warp_fourth_cond2`, 
                                      `fiber_weft_name_polyester`,
                                      `fiber_weft_polyester_cond1`,
                                      `fiber_weft_polyester_value1`,
                                      `fiber_weft_polyester_value2`,
                                      `fiber_weft_polyester_cond2`,
                                      `fiber_weft_name_cotton`,
                                      `fiber_weft_cotton_cond1`,
                                      `fiber_weft_cotton_value1`,
                                      `fiber_weft_cotton_value2`,
                                      `fiber_weft_cotton_cond2`, 
                                      `fiber_weft_name_thired`,
                                      `fiber_weft_thired_cond1`,
                                      `fiber_weft_thired_value1`,
                                      `fiber_weft_thired_value2`,
                                      `fiber_weft_thired_cond2`, 
                                      `fiber_weft_name_fourth`,
                                      `fiber_weft_fourth_cond1`,
                                      `fiber_weft_fourth_value1`,
                                      `fiber_weft_fourth_value2`,
                                      `fiber_weft_fourth_cond2`, 
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
                                      '$gray_variable_id',
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
                                      '$fiber_content_selected_for_number',
                                      '$fiber_total_name_polyester',
                                      '$fiber_total_polyester_cond1',
                                      '$fiber_total_polyester_value1',
                                      '$fiber_total_polyester_value2',
                                      '$fiber_total_polyester_cond2',
                                      '$fiber_total_name_cotton',
                                      '$fiber_total_cotton_cond1',
                                      '$fiber_total_cotton_value1',
                                      '$fiber_total_cotton_value2',
                                      '$fiber_total_cotton_cond2',
                                      '$fiber_total_name_thired',
                                      '$fiber_total_thired_cond1',
                                      '$fiber_total_thired_value1',
                                      '$fiber_total_thired_value2',
                                      '$fiber_total_thired_cond2',
                                      '$fiber_total_name_fourth',
                                      '$fiber_total_fourth_cond1',
                                      '$fiber_total_fourth_value1',
                                      '$fiber_total_fourth_value2',
                                      '$fiber_total_fourth_cond2',
                                      '$fiber_warp_name_polyester',
                                      '$fiber_warp_polyester_cond1',
                                      '$fiber_warp_polyester_value1',
                                      '$fiber_warp_polyester_value2',
                                      '$fiber_warp_polyester_cond2',
                                      '$fiber_warp_name_cotton',
                                      '$fiber_warp_cotton_cond1',
                                      '$fiber_warp_cotton_value1',
                                      '$fiber_warp_cotton_value2',
                                      '$fiber_warp_cotton_cond2',
                                      '$fiber_warp_name_thired',
                                      '$fiber_warp_thired_cond1',
                                      '$fiber_warp_thired_value1',
                                      '$fiber_warp_thired_value2',
                                      '$fiber_warp_thired_cond2',
                                      '$fiber_warp_name_fourth',
                                      '$fiber_warp_fourth_cond1',
                                      '$fiber_warp_fourth_value1',
                                      '$fiber_warp_fourth_value2',
                                      '$fiber_warp_fourth_cond2',
                                      '$fiber_weft_name_polyester',
                                      '$fiber_weft_polyester_cond1',
                                      '$fiber_weft_polyester_value1',
                                      '$fiber_weft_polyester_value2',
                                      '$fiber_weft_polyester_cond2',
                                      '$fiber_weft_name_cotton',
                                      '$fiber_weft_cotton_cond1',
                                      '$fiber_weft_cotton_value1',
                                      '$fiber_weft_cotton_value2',
                                      '$fiber_weft_cotton_cond2',
                                      '$fiber_weft_name_thired',
                                      '$fiber_weft_thired_cond1',
                                      '$fiber_weft_thired_value1',
                                      '$fiber_weft_thired_value2',
                                      '$fiber_weft_thired_cond2',
                                      '$fiber_weft_name_fourth',
                                      '$fiber_weft_fourth_cond1',
                                      '$fiber_weft_fourth_value1',
                                      '$fiber_weft_fourth_value2',
                                      '$fiber_weft_fourth_cond2',
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