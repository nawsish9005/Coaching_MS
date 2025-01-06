<?php
session_start();
require_once("../includes/db_session_chk.php");

$needed_pp_no_id = $_POST['pp_no_id'];
$customer = $_POST['customers_model'];
$design_id = $_POST['design_id'];
$copy_pp_details_id = $_POST['version_id'];

//find out copy pp no from copy_pp_details_id
$copy_pp_sql = "SELECT * FROM pp_details where pp_id = '$copy_pp_details_id'";
$copy_pp_res = mysqli_query($con, $copy_pp_sql) or die(mysqli_error($con));
$copy_pp_row = mysqli_fetch_assoc($copy_pp_res);
$copy_pp_no_id = $copy_pp_row['pp_no_id'];

//needed pp all the version searching 
$pp_sql = "SELECT * FROM pp_details where pp_no_id = '$needed_pp_no_id'";
$pp_res = mysqli_query($con, $pp_sql) or die(mysqli_error($con));
while ($pp_row = mysqli_fetch_assoc($pp_res))
{
  	$needed_pp_details_id = $pp_row['pp_id'];

  	$pp_no_id = $needed_pp_no_id;
	$pp_details_id = $needed_pp_details_id;

  	//for route issue copy
	//first find out copy route issue details
	$copy_route_issue_sql = "SELECT * FROM route_issue_main where pp_no_id = '$copy_pp_no_id' and pp_details_id = '$copy_pp_details_id' and active = '1' ";
	$copy_route_issue_res = mysqli_query($con, $copy_route_issue_sql) or die(mysqli_error($con));
	while ($copy_route_issue_row = mysqli_fetch_assoc($copy_route_issue_res))
	{
		$route =  $copy_route_issue_row['route'];
		$process =  $copy_route_issue_row['process'];
		$process_number =  $copy_route_issue_row['process_number'];

		  //chcek last insert id
		  $sql = 'SELECT id
		            FROM route_issue_main ORDER BY id DESC LIMIT 1';
		  $sql_res = mysqli_query($con, $sql) or die(mysqli_error($con));
		  $sql_row = mysqli_fetch_assoc($sql_res);
		  $route_issue_main_id = $sql_row['id'] + 1;

			$insert_sql_statement = "INSERT INTO `route_issue_main` 
		                             ( 
		                              `route_issue_main_id`,
		                              `pp_no_id`, 
		                              `pp_details_id`, 
		                              `route`,
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
		                              '$route_issue_main_id',
		                              '$pp_no_id', 
		                              '$pp_details_id', 
		                              '$route',
		                              '$process',
		                              '$process_number',
		                              '1',
		                              '0',
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

		    }
	}	

	



  	//for greige issunce standard copy
  	//first copy pp and pp_details greige issunce find out
  	$copy_greige_issunce_sql = "SELECT * FROM gray_variable where pp_no_id = '$copy_pp_no_id' and pp_details_id = '$copy_pp_details_id'";
	$copy_greige_issunce_res = mysqli_query($con, $copy_greige_issunce_sql) or die(mysqli_error($con));
	$copy_greige_issunce_row = mysqli_fetch_assoc($copy_greige_issunce_res);

	  //for yarn warp
	  $yarn_warp_cond1 = $copy_greige_issunce_row['yarn_warp_cond1'];
	  $yarn_warp_value1 = $copy_greige_issunce_row['yarn_warp_value1'];
	  $yarn_warp_value2 = $copy_greige_issunce_row['yarn_warp_value2'];
	  $yarn_warp_cond2 = $copy_greige_issunce_row['yarn_warp_cond2'];

	  //for yarn weft
	  $yarn_weft_cond1 = $copy_greige_issunce_row['yarn_weft_cond1'];
	  $yarn_weft_value1 = $copy_greige_issunce_row['yarn_weft_value1'];
	  $yarn_weft_value2 = $copy_greige_issunce_row['yarn_weft_value2'];
	  $yarn_weft_cond2 = $copy_greige_issunce_row['yarn_weft_cond2'];

	  //for thread epi
	  $thread_epi_cond1 = $copy_greige_issunce_row['thread_epi_cond1'];
	  $thread_epi_value1 = $copy_greige_issunce_row['thread_epi_value1'];
	  $thread_epi_value2 = $copy_greige_issunce_row['thread_epi_value2'];
	  $thread_epi_cond2 = $copy_greige_issunce_row['thread_epi_cond2'];

	  //for thread ppi
	  $thread_ppi_cond1 = $copy_greige_issunce_row['thread_ppi_cond1'];
	  $thread_ppi_value1 = $copy_greige_issunce_row['thread_ppi_value1'];
	  $thread_ppi_value2 = $copy_greige_issunce_row['thread_ppi_value2'];
	  $thread_ppi_cond2 = $copy_greige_issunce_row['thread_ppi_cond2'];

	  //for gsm warp
	  $gsm_warp_cond1 = $copy_greige_issunce_row['gsm_warp_cond1'];
	  $gsm_warp_value1 = $copy_greige_issunce_row['gsm_warp_value1'];
	  $gsm_warp_value2 = $copy_greige_issunce_row['gsm_warp_value2'];
	  $gsm_warp_cond2 = $copy_greige_issunce_row['gsm_warp_cond2'];

	  //for gsm warp
	  $greige_width_cond1 = $copy_greige_issunce_row['greige_width_cond1'];
	  $greige_width_value1 = $copy_greige_issunce_row['greige_width_value1'];
	  $greige_width_value2 = $copy_greige_issunce_row['greige_width_value2'];
	  $greige_width_cond2 = $copy_greige_issunce_row['greige_width_cond2'];



	  //fiber content polyester selection for database
	  $fiber_total_name_polyester = $copy_greige_issunce_row['fiber_total_name_polyester'];
	  $fiber_total_polyester_cond1 = $copy_greige_issunce_row['fiber_total_polyester_cond1'];
	  $fiber_total_polyester_value1 = $copy_greige_issunce_row['fiber_total_polyester_value1'];
	  $fiber_total_polyester_value2 = $copy_greige_issunce_row['fiber_total_polyester_value2'];
	  $fiber_total_polyester_cond2 = $copy_greige_issunce_row['fiber_total_polyester_cond2'];

	  //for fiber warp polyester
	  $fiber_warp_name_polyester = $copy_greige_issunce_row['fiber_warp_name_polyester'];
	  $fiber_warp_polyester_cond1 = $copy_greige_issunce_row['fiber_warp_polyester_cond1'];
	  $fiber_warp_polyester_value1 = $copy_greige_issunce_row['fiber_warp_polyester_value1'];
	  $fiber_warp_polyester_value2 = $copy_greige_issunce_row['fiber_warp_polyester_value2'];
	  $fiber_warp_polyester_cond2 = $copy_greige_issunce_row['fiber_warp_polyester_cond2'];

	  //for fiber weft polyester
	  $fiber_weft_name_polyester = $copy_greige_issunce_row['fiber_weft_name_polyester'];
	  $fiber_weft_polyester_cond1 = $copy_greige_issunce_row['fiber_weft_polyester_cond1'];
	  $fiber_weft_polyester_value1 = $copy_greige_issunce_row['fiber_weft_polyester_value1'];
	  $fiber_weft_polyester_value2 = $copy_greige_issunce_row['fiber_weft_polyester_value2'];
	  $fiber_weft_polyester_cond2 = $copy_greige_issunce_row['fiber_weft_polyester_cond2'];


	  //fiber content cotton selection for database
	  $fiber_total_name_cotton = $copy_greige_issunce_row['fiber_total_name_cotton'];
	  $fiber_total_cotton_cond1 = $copy_greige_issunce_row['fiber_total_cotton_cond1'];
	  $fiber_total_cotton_value1 = $copy_greige_issunce_row['fiber_total_cotton_value1'];
	  $fiber_total_cotton_value2 = $copy_greige_issunce_row['fiber_total_cotton_value2'];
	  $fiber_total_cotton_cond2 = $copy_greige_issunce_row['fiber_total_cotton_cond2'];

	  //for fiber warp cotton
	  $fiber_warp_name_cotton = $copy_greige_issunce_row['fiber_warp_name_cotton'];
	  $fiber_warp_cotton_cond1 = $copy_greige_issunce_row['fiber_warp_cotton_cond1'];
	  $fiber_warp_cotton_value1 = $copy_greige_issunce_row['fiber_warp_cotton_value1'];
	  $fiber_warp_cotton_value2 = $copy_greige_issunce_row['fiber_warp_cotton_value2'];
	  $fiber_warp_cotton_cond2 = $copy_greige_issunce_row['fiber_warp_cotton_cond2'];

	  //for fiber weft cotton
	  $fiber_weft_name_cotton = $copy_greige_issunce_row['fiber_weft_name_cotton'];
	  $fiber_weft_cotton_cond1 = $copy_greige_issunce_row['fiber_weft_cotton_cond1'];
	  $fiber_weft_cotton_value1 = $copy_greige_issunce_row['fiber_weft_cotton_value1'];
	  $fiber_weft_cotton_value2 = $copy_greige_issunce_row['fiber_weft_cotton_value2'];
	  $fiber_weft_cotton_cond2 = $copy_greige_issunce_row['fiber_weft_cotton_cond2'];


	  //fiber content thired selection for database
	  $fiber_total_name_thired = $copy_greige_issunce_row['fiber_total_name_thired'];
	  $fiber_total_thired_cond1 = $copy_greige_issunce_row['fiber_total_thired_cond1'];
	  $fiber_total_thired_value1 = $copy_greige_issunce_row['fiber_total_thired_value1'];
	  $fiber_total_thired_value2 = $copy_greige_issunce_row['fiber_total_thired_value2'];
	  $fiber_total_thired_cond2 = $copy_greige_issunce_row['fiber_total_thired_cond2'];

	  //for fiber warp thired
	  $fiber_warp_name_thired = $copy_greige_issunce_row['fiber_warp_name_thired'];
	  $fiber_warp_thired_cond1 = $copy_greige_issunce_row['fiber_warp_thired_cond1'];
	  $fiber_warp_thired_value1 = $copy_greige_issunce_row['fiber_warp_thired_value1'];
	  $fiber_warp_thired_value2 = $copy_greige_issunce_row['fiber_warp_thired_value2'];
	  $fiber_warp_thired_cond2 = $copy_greige_issunce_row['fiber_warp_thired_cond2'];

	  //for fiber weft thired
	  $fiber_weft_name_thired = $copy_greige_issunce_row['fiber_weft_name_thired'];
	  $fiber_weft_thired_cond1 = $copy_greige_issunce_row['fiber_weft_thired_cond1'];
	  $fiber_weft_thired_value1 = $copy_greige_issunce_row['fiber_weft_thired_value1'];
	  $fiber_weft_thired_value2 = $copy_greige_issunce_row['fiber_weft_thired_value2'];
	  $fiber_weft_thired_cond2 = $copy_greige_issunce_row['fiber_weft_thired_cond2'];


	  //fiber content fourth selection for database
	  $fiber_total_name_fourth = $copy_greige_issunce_row['fiber_total_name_fourth'];
	  $fiber_total_fourth_cond1 = $copy_greige_issunce_row['fiber_total_fourth_cond1'];
	  $fiber_total_fourth_value1 = $copy_greige_issunce_row['fiber_total_fourth_value1'];
	  $fiber_total_fourth_value2 = $copy_greige_issunce_row['fiber_total_fourth_value2'];
	  $fiber_total_fourth_cond2 = $copy_greige_issunce_row['fiber_total_fourth_cond2'];

	  //for fiber warp fourth
	  $fiber_warp_name_fourth = $copy_greige_issunce_row['fiber_warp_name_fourth'];
	  $fiber_warp_fourth_cond1 = $copy_greige_issunce_row['fiber_warp_fourth_cond1'];
	  $fiber_warp_fourth_value1 = $copy_greige_issunce_row['fiber_warp_fourth_value1'];
	  $fiber_warp_fourth_value2 = $copy_greige_issunce_row['fiber_warp_fourth_value2'];
	  $fiber_warp_fourth_cond2 = $copy_greige_issunce_row['fiber_warp_fourth_cond2'];

	  //for fiber weft fourth
	  $fiber_weft_name_fourth = $copy_greige_issunce_row['fiber_weft_name_fourth'];
	  $fiber_weft_fourth_cond1 = $copy_greige_issunce_row['fiber_weft_fourth_cond1'];;
	  $fiber_weft_fourth_value1 = $copy_greige_issunce_row['fiber_weft_fourth_value1'];
	  $fiber_weft_fourth_value2 = $copy_greige_issunce_row['fiber_weft_fourth_value2'];
	  $fiber_weft_fourth_cond2 = $copy_greige_issunce_row['fiber_weft_fourth_cond2'];

	  $fiber_content_selected_for_number = $copy_greige_issunce_row['fiber_content_select'];

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
	                              `greige_width_cond1`,
	                              `greige_width_value1`,
	                              `greige_width_value2`,
	                              `greige_width_cond2`,
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
	                              '$greige_width_cond1',
	                              '$greige_width_value1',
	                              '$greige_width_value2',
	                              '$greige_width_cond2',
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
	      $last_gray_variable_id = $gray_variable_id;

	      //bleaching standard copy
	      //find out needed bleaching standard 

	      $copy_bleaching_standard_sql = "SELECT * FROM bleaching_standard where pp_no_id = '$copy_pp_no_id' and pp_details_id = '$copy_pp_details_id'";
		  $copy_bleaching_standard_res = mysqli_query($con, $copy_bleaching_standard_sql) or die(mysqli_error($con));
		  $copy_bleaching_standard_row = mysqli_fetch_assoc($copy_bleaching_standard_res);


		    //for absorbency
			$absorbency_cond1 = $copy_bleaching_standard_row['absorbency_cond1'];
			$absorbency_value1 = $copy_bleaching_standard_row['absorbency_value1'];
			$absorbency_value2 = $copy_bleaching_standard_row['absorbency_value2'];
			$absorbency_cond2 = $copy_bleaching_standard_row['absorbency_cond2'];

			//for sizing
			$sizing_cond1 = $copy_bleaching_standard_row['sizing_cond1'];
			$sizing_value1 = $copy_bleaching_standard_row['sizing_value1'];
			$sizing_value2 = $copy_bleaching_standard_row['sizing_value2'];
			$sizing_cond2 = $copy_bleaching_standard_row['sizing_cond2'];

			//for whiteness
			$whiteness_cond1 = $copy_bleaching_standard_row['whiteness_cond1'];
			$whiteness_value1 = $copy_bleaching_standard_row['whiteness_value1'];
			$whiteness_value2 = $copy_bleaching_standard_row['whiteness_value2'];
			$whiteness_cond2 = $copy_bleaching_standard_row['whiteness_cond2'];

			//for pilling
			$pilling_cond1 = $copy_bleaching_standard_row['pilling_cond1'];
			$pilling_value1 = $copy_bleaching_standard_row['pilling_value1'];
			$pilling_value2 = $copy_bleaching_standard_row['pilling_value2'];
			$pilling_cond2 = $copy_bleaching_standard_row['pilling_cond2'];

		  //for ph
		  $ph_cond1 = $copy_bleaching_standard_row['ph_cond1'];
		  $ph_value1 = $copy_bleaching_standard_row['ph_value1'];
		  $ph_value2 = $copy_bleaching_standard_row['ph_value2'];
		  $ph_cond2 = $copy_bleaching_standard_row['ph_cond2'];


		  $active = 1;

		  //chcek last insert id
		  $sql = 'SELECT id
		            FROM bleaching_standard ORDER BY id DESC LIMIT 1';
		  $sql_res = mysqli_query($con, $sql) or die(mysqli_error($con));
		  $sql_row = mysqli_fetch_assoc($sql_res);
		  $bleaching_standard_id = $sql_row['id'] + 1;

			$insert_sql_statement = "INSERT INTO `bleaching_standard` 
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
		        $bleaching_standard_insert_id = mysqli_insert_id($con);

		        //curing standard copy
		        $copy_curing_standard_sql = "SELECT * FROM curing_standard where pp_no_id = '$copy_pp_no_id' and pp_details_id = '$copy_pp_details_id'";
				$copy_curing_standard_res = mysqli_query($con, $copy_curing_standard_sql) or die(mysqli_error($con));
				$copy_curing_standard_row = mysqli_fetch_assoc($copy_curing_standard_res);

				//for rubbing
				$rubbing_cond1 = $copy_curing_standard_row['rubbing_cond1'];
				$rubbing_value1 = $copy_curing_standard_row['rubbing_value1'];
				$rubbing_value2 = $copy_curing_standard_row['rubbing_value2'];
				$rubbing_cond2 = $copy_curing_standard_row['rubbing_cond2'];


				$active = 1;
				$lock_or_unlock = 1;

				//chcek last insert id
				$sql = 'SELECT id
				            FROM curing_standard ORDER BY id DESC LIMIT 1';
				$sql_res = mysqli_query($con, $sql) or die(mysqli_error($con));
				$sql_row = mysqli_fetch_assoc($sql_res);
				$curing_standard_id = $sql_row['id'] + 1;

				$insert_sql_statement = "INSERT INTO `curing_standard` 
			                             ( 
			                              `curing_standard_id`,
			                              `pp_no_id`, 
			                              `pp_details_id`, 
			                              `rubbing_cond1`,
			                              `rubbing_value1`,
			                              `rubbing_value2`,
			                              `rubbing_cond2`,
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
			                              '$curing_standard_id',
			                              '$pp_no_id', 
			                              '$pp_details_id', 
			                              '$rubbing_cond1',
			                              '$rubbing_value1',
			                              '$rubbing_value2',
			                              '$rubbing_cond2',
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
			        $curing_standard_last_id = mysqli_insert_id($con);

			        //copy equlize standard
			        $copy_equalize_standard_sql = "SELECT * FROM equalize_standard where pp_no_id = '$copy_pp_no_id' and pp_details_id = '$copy_pp_details_id'";
					$copy_equalize_standard_res = mysqli_query($con, $copy_equalize_standard_sql) or die(mysqli_error($con));
					$copy_equalize_standard_row = mysqli_fetch_assoc($copy_equalize_standard_res);

					//for whiteness
					$whiteness_cond1 = $copy_equalize_standard_row['whiteness_cond1'];
					$whiteness_value1 = $copy_equalize_standard_row['whiteness_value1'];
					$whiteness_value2 = $copy_equalize_standard_row['whiteness_value2'];
					$whiteness_cond2 = $copy_equalize_standard_row['whiteness_cond2'];

					//for pilling
					$bowing_and_skew_cond1 = $copy_equalize_standard_row['bowing_and_skew_cond1'];
					$bowing_and_skew_value1 = $copy_equalize_standard_row['bowing_and_skew_value1'];
					$bowing_and_skew_value2 = $copy_equalize_standard_row['bowing_and_skew_value2'];
					$bowing_and_skew_cond2 = $copy_equalize_standard_row['bowing_and_skew_cond2'];

				  //for ph
				  $ph_cond1 = $copy_equalize_standard_row['ph_cond1'];
				  $ph_value1 = $copy_equalize_standard_row['ph_value1'];
				  $ph_value2 = $copy_equalize_standard_row['ph_value2'];
				  $ph_cond2 = $copy_equalize_standard_row['ph_cond2'];


					$active = 1;
				  $lock_or_unlock = 1;

				  //chcek last insert id
				  $sql = 'SELECT id
				            FROM equalize_standard ORDER BY id DESC LIMIT 1';
				  $sql_res = mysqli_query($con, $sql) or die(mysqli_error($con));
				  $sql_row = mysqli_fetch_assoc($sql_res);
				  $equalize_standard_id = $sql_row['id'] + 1;

					$insert_sql_statement = "INSERT INTO `equalize_standard` 
				                             ( 
				                              `equalize_standard_id`,
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
				                              '$equalize_standard_id',
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
				      	$equalize_standard_last_id = mysqli_insert_id($con);

				      	//copy mercerize_standard 
				      	$copy_mercerize_standard_sql = "SELECT * FROM mercerize_standard where pp_no_id = '$copy_pp_no_id' and pp_details_id = '$copy_pp_details_id'";
						$copy_mercerize_standard_res = mysqli_query($con, $copy_mercerize_standard_sql) or die(mysqli_error($con));
						$copy_mercerize_standard_row = mysqli_fetch_assoc($copy_mercerize_standard_res);

						//for whiteness
						$whiteness_cond1 = $copy_mercerize_standard_row['whiteness_cond1'];
						$whiteness_value1 = $copy_mercerize_standard_row['whiteness_value1'];
						$whiteness_value2 = $copy_mercerize_standard_row['whiteness_value2'];
						$whiteness_cond2 = $copy_mercerize_standard_row['whiteness_cond2'];

						//for absorbency
						$absorbency_cond1 = $copy_mercerize_standard_row['absorbency_cond1'];
						$absorbency_value1 = $copy_mercerize_standard_row['absorbency_value1'];
						$absorbency_value2 = $copy_mercerize_standard_row['absorbency_value2'];
						$absorbency_cond2 = $copy_mercerize_standard_row['absorbency_cond2'];

					  //for sizing
					  $sizing_cond1 = $copy_mercerize_standard_row['sizing_cond1'];
					  $sizing_value1 = $copy_mercerize_standard_row['sizing_value1'];
					  $sizing_value2 = $copy_mercerize_standard_row['sizing_value2'];
					  $sizing_cond2 = $copy_mercerize_standard_row['sizing_cond2'];

					  //for ph
					  $ph_cond1 = $copy_mercerize_standard_row['ph_cond1'];
					  $ph_value1 = $copy_mercerize_standard_row['ph_value1'];
					  $ph_value2 = $copy_mercerize_standard_row['ph_value2'];
					  $ph_cond2 = $copy_mercerize_standard_row['ph_cond2'];


						$active = 1;
					  $lock_or_unlock = 1;

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
					        $mercerize_standard_last_id = mysqli_insert_id($con);

					        //copy printing_standard
					        $copy_printing_standard_sql = "SELECT * FROM printing_standard where pp_no_id = '$copy_pp_no_id' and pp_details_id = '$copy_pp_details_id'";
							$copy_printing_standard_res = mysqli_query($con, $copy_printing_standard_sql) or die(mysqli_error($con));
							$copy_printing_standard_row = mysqli_fetch_assoc($copy_printing_standard_res);

							//for rubbing
							$rubbing_cond1 = $copy_printing_standard_row['rubbing_cond1'];
							$rubbing_value1 = $copy_printing_standard_row['rubbing_value1'];
							$rubbing_value2 = $copy_printing_standard_row['rubbing_value2'];
							$rubbing_cond2 = $copy_printing_standard_row['rubbing_cond2'];


						  $active = 1;
						  $lock_or_unlock = 1;

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
						                              `rubbing_cond1`,
						                              `rubbing_value1`,
						                              `rubbing_value2`,
						                              `rubbing_cond2`,
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
						                              '$printing_standard_id',
						                              '$pp_no_id', 
						                              '$pp_details_id', 
						                              '$rubbing_cond1',
						                              '$rubbing_value1',
						                              '$rubbing_value2',
						                              '$rubbing_cond2',
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
						      	$printing_standard_last_id = mysqli_insert_id($con);

						      	//copy ready_mercerize_standard
						      	$copy_ready_mercerize_standard_sql = "SELECT * FROM ready_mercerize_standard where pp_no_id = '$copy_pp_no_id' and pp_details_id = '$copy_pp_details_id'";
								$copy_ready_mercerize_standard_res = mysqli_query($con, $copy_ready_mercerize_standard_sql) or die(mysqli_error($con));
								$copy_ready_mercerize_standard_row = mysqli_fetch_assoc($copy_ready_mercerize_standard_res);

								//for whiteness
								$whiteness_cond1 = $copy_ready_mercerize_standard_row['whiteness_cond1'];
								$whiteness_value1 = $copy_ready_mercerize_standard_row['whiteness_value1'];
								$whiteness_value2 = $copy_ready_mercerize_standard_row['whiteness_value2'];
								$whiteness_cond2 = $copy_ready_mercerize_standard_row['whiteness_cond2'];

								//for pilling
								$bowing_and_skew_cond1 = $copy_ready_mercerize_standard_row['bowing_and_skew_cond1'];
								$bowing_and_skew_value1 = $copy_ready_mercerize_standard_row['bowing_and_skew_value1'];
								$bowing_and_skew_value2 = $copy_ready_mercerize_standard_row['bowing_and_skew_value2'];
								$bowing_and_skew_cond2 = $copy_ready_mercerize_standard_row['bowing_and_skew_cond2'];

							  //for ph
							  $ph_cond1 = $copy_ready_mercerize_standard_row['ph_cond1'];
							  $ph_value1 = $copy_ready_mercerize_standard_row['ph_value1'];
							  $ph_value2 = $copy_ready_mercerize_standard_row['ph_value2'];
							  $ph_cond2 = $copy_ready_mercerize_standard_row['ph_cond2'];


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
							        $ready_mercerize_standard_last_id = mysqli_insert_id($con);

							        //copy singe_standard
							        $copy_singe_standard_sql = "SELECT * FROM singe_standard where pp_no_id = '$copy_pp_no_id' and pp_details_id = '$copy_pp_details_id'";
									$copy_singe_standard_res = mysqli_query($con, $copy_singe_standard_sql) or die(mysqli_error($con));
									$copy_singe_standard_row = mysqli_fetch_assoc($copy_singe_standard_res);


									//for yarn warp
									$intensity_cond1 = $copy_singe_standard_row['intensity_cond1'];
									$intensity_value1 = $copy_singe_standard_row['intensity_value1'];
									$intensity_value2 = $copy_singe_standard_row['intensity_value2'];
									$intensity_cond2 = $copy_singe_standard_row['intensity_cond2'];

									//for yarn weft
									$speed_cond1 = $copy_singe_standard_row['speed_cond1'];
									$speed_value1 = $copy_singe_standard_row['speed_value1'];
									$speed_value2 = $copy_singe_standard_row['speed_value2'];
									$speed_cond2 = $copy_singe_standard_row['speed_cond2'];

									//for thread epi
									$temp_cond1 = $copy_singe_standard_row['temp_cond1'];
									$temp_value1 = $copy_singe_standard_row['temp_value1'];
									$temp_value2 = $copy_singe_standard_row['temp_value2'];
									$temp_cond2 = $copy_singe_standard_row['temp_cond2'];

									//for thread ppi
									$ph_cond1 = $copy_singe_standard_row['ph_cond1'];
									$ph_value1 = $copy_singe_standard_row['ph_value1'];
									$ph_value2 = $copy_singe_standard_row['ph_value2'];
									$ph_cond2 = $copy_singe_standard_row['ph_cond2'];

									$active = 1;

								  //chcek last insert id
								  $sql = 'SELECT id
								            FROM singe_standard ORDER BY id DESC LIMIT 1';
								  $sql_res = mysqli_query($con, $sql) or die(mysqli_error($con));
								  $sql_row = mysqli_fetch_assoc($sql_res);
								  $singe_standard_id = $sql_row['id'] + 1;

									$insert_sql_statement = "INSERT INTO `singe_standard` 
								                             ( 
								                              `singe_standard_id`,
								                              `pp_no_id`, 
								                              `pp_details_id`, 
								                              `intensity_cond1`,
								                              `intensity_value1`,
								                              `intensity_value2`,
								                              `intensity_cond2`,
								                              `speed_cond1`,
								                              `speed_value1`,
								                              `speed_value2`,
								                              `speed_cond2`, 
								                              `temp_cond1`,
								                              `temp_value1`,
								                              `temp_value2`,
								                              `temp_cond2`,
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
								                              '$singe_standard_id', 
								                              '$pp_no_id', 
								                              '$pp_details_id', 
								                              '$intensity_cond1',
								                              '$intensity_value1',
								                              '$intensity_value2',
								                              '$intensity_cond2',
								                              '$speed_cond1',
								                              '$speed_value1',
								                              '$speed_value2',
								                              '$speed_cond2', 
								                              '$temp_cond1',
								                              '$temp_value1',
								                              '$temp_value2',
								                              '$temp_cond2',
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
								        $singe_standard_last_id = mysqli_insert_id($con);
								    }
							    }

						    }
					    }

				    }
			    }
		    }





	  //       //copy route issue select 
	  //       $copy_route_issue_sql = "SELECT * FROM route_issue where greige_issunce_id = '$last_gray_variable_id' and active = '1'";
			// $copy_route_issue_res = mysqli_query($con, $copy_route_issue_sql) or die(mysqli_error($con));
			// while ($copy_route_issue_row = mysqli_fetch_assoc($copy_route_issue_res))
			// {

			// 	//insert data to route issue 
			// 	$route = $copy_route_issue_row['route'];
			// 	$process = $copy_route_issue_row['process'.$i];
			// 	$process_number = $copy_route_issue_row['process_number'];
			// 	//$complete = $copy_route_issue_row['complete'];
			// 	$original = $copy_route_issue_row['original'];

			// 	$sql = 'SELECT id
			// 			FROM route_issue ORDER BY id DESC LIMIT 1';
			// 	$sql_res = mysqli_query($con, $sql) or die(mysqli_error($con));
			// 	$sql_row = mysqli_fetch_assoc($sql_res);
			// 	$route_issue_id = $sql_row['id'] + 1;

			// 	$insert_pp_details_statement = "INSERT INTO `route_issue` 
			// 	                                 ( 
			// 	                                  `route_issue_id`,
			// 	                                  `greige_issunce_id`,
			// 	                                  `route`, 
			// 	                                  `original`,
			// 	                                  `process`,
			// 	                                  `process_number`,
			// 	                                  `active`,
			// 	                                  `complete`,
			// 	                                  `recording_person_id`, 
			// 	                                  `recording_person_name`, 
			// 	                                  `recording_time`, 
			// 	                                  `modifying_person_id`, 
			// 	                                  `modification_time` 
			// 	                                 ) 
			// 	                            VALUES 
			// 	                                 ( 
			// 	                                  '$route_issue_id',
			// 	                                  '$last_gray_variable_id', 
			// 	                                  '$route',
			// 	                                  '$original', 
			// 	                                  '$process',
			// 	                                  '$process_number',
			// 	                                  '$active',
			// 	                                  '0',
			// 	                                  '$edfms_logged_user_id', 
			// 	                                  '$edfms_logged_first_name $edfms_logged_last_name', 
			// 	                                  NOW(), 
			// 	                                  '$edfms_logged_user_id', 
			// 	                                  NOW() 
			// 	                                 )";
			// 	mysqli_query($con, $insert_pp_details_statement) or die(mysqli_error($con));
	    
			//     if(mysqli_affected_rows($con) <> 1)
			//     {
			//         echo $data_insertion_hampering = 'Not insert new pp details';
			//         exit();
			//     }

			//     else
			//     {
			//     	echo "all data save";
			//     }
			// }

	    }
	 //end of greige issunce copy all 

}

?>