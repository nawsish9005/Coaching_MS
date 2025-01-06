<?php
session_start();
require_once('../includes/db_session_chk.php');


    $pp_id = mysqli_real_escape_string($con, stripslashes(trim($_POST['pp'])));
	$res = 	$res = "<option selected='selected' value=''>Select Version</option>";


	
	$sql_for_pp = "SELECT pp.week,pp.design,pp.customers,pp_details.version,pp_details.pp_id,
					ifnull(concat('cotton:',pp.fiber_cotton,', polyster:',pp.fiber_polyster,', others:',pp.fiber_others_value),'') fiber_composition,
					pp_details.gray_width  FROM 
					pp left join pp_details on pp.pp_id=pp_details.pp_no_id
					WHERE pp.pp_id = '$pp_id' ";
    $pp_res = mysqli_query($con, $sql_for_pp) or die(mysqli_error($con));
    while ($row = mysqli_fetch_assoc($pp_res)) 
	{
		$res .= "<option value='".$row['pp_id']."'>".$row['version']."</option>";	
		$week=$row['week'];
		$design=$row['design'];			
		$customers=$row['customers'];			
		$fiber_composition=$row['fiber_composition'];			
		$gray_width=$row['gray_width'];



		
	}
	
	$data=array("week"=>$week, "design"=>$design,"customers"=>$customers,"fiber_composition"=>$fiber_composition,"gray_width"=>$gray_width,"version"=>$res); // This is your data array/result
			echo json_encode($data);

?>

