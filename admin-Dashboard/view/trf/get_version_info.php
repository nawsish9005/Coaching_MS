<?php
session_start();
require_once('../includes/db_session_chk.php');


    $pp_id = mysqli_real_escape_string($con, stripslashes(trim($_POST['pp'])));
    
    $route_id = mysqli_real_escape_string($con, stripslashes(trim($_POST['route_id_all'])));


    $pp_version = mysqli_real_escape_string($con, stripslashes(trim($_POST['version'])));





    $pp_id = mysqli_real_escape_string($con, stripslashes(trim($_POST['pp'])));
	$pp_version = mysqli_real_escape_string($con, stripslashes(trim($_POST['version'])));


		
	$sql_for_getting_greige_issunce_id ="select greige_issunce_id from greige_issunce where pp_no_id='$pp_id' and pp_details_id='$pp_version' and active=1";


	$pp_res_sql_for_getting_greige_issunce_id = mysqli_query($con, $sql_for_getting_greige_issunce_id) or die(mysqli_error($con));

	  while ($row = mysqli_fetch_assoc($pp_res_sql_for_getting_greige_issunce_id)) 
	{
				
		$greige_issunce_id=$row['greige_issunce_id'];



		
	}

	$sql_for_getting_process_number="select process_number from route_issue where greige_issunce_id='$greige_issunce_id' and route='$route_id' and active=1";

	$pp_res_getting_process_number= mysqli_query($con, $sql_for_getting_process_number) or die(mysqli_error($con));

	  while ($row1 = mysqli_fetch_assoc($pp_res_getting_process_number)) 
	{
				
		$process_number=$row1['process_number'];



		
	}


	if ($process_number<=1) {
		echo "Still No Before Trolley/Batcher added";

		exit();

	}

	$process_number=$process_number-1;

	$sql_for_getting_route_number="select route_issue_id,route from route_issue where greige_issunce_id='$greige_issunce_id' and process_number='$process_number' and active=1";

    $sql_for_getting_route_number;
	$pp_res_getting_route_number= mysqli_query($con, $sql_for_getting_route_number) or die(mysqli_error($con));

	  while ($row2 = mysqli_fetch_assoc($pp_res_getting_route_number)) 
	{
				
		$route_number=$row2['route'];
		$route_issue_id=$row2['route_issue_id'];



		
	}


		if ($route_number==10)
		{
			$sql_for_getting_b_batcher="select b_batcher from finishing where route_issue_id='$route_issue_id' ";		
			# code...
		
			$pp_res_getting_b_batcher= mysqli_query($con, $sql_for_getting_b_batcher) or die(mysqli_error($con));

			  while ($row2 = mysqli_fetch_assoc($pp_res_getting_b_batcher)) 
			{
						
				$b_batcher=$row2['b_batcher'];			



				
			}

			$data=array("b_batcher"=>$b_batcher); // This is your data array/result
			echo json_encode($data);
		

		}

		elseif ($route_number==3) 
		{
			$sql_for_getting_b_batcher="select b_batcher from mercerize where route_issue_id='$route_issue_id'";		
			# code...
		
			$pp_res_getting_b_batcher= mysqli_query($con, $sql_for_getting_b_batcher) or die(mysqli_error($con));

			  while ($row2 = mysqli_fetch_assoc($pp_res_getting_b_batcher)) 
			{
						
				$b_batcher=$row2['b_batcher'];			
				
			}

			$data=array("b_batcher"=>$b_batcher); // This is your data array/result
			echo json_encode($data);
		}


		elseif ($route_number==1) 
		{
			$sql_for_getting_b_batcher="select b_batcher from singe where route_issue_id='$route_issue_id'";		
			# code...
		
			$pp_res_getting_b_batcher= mysqli_query($con, $sql_for_getting_b_batcher) or die(mysqli_error($con));

			  while ($row2 = mysqli_fetch_assoc($pp_res_getting_b_batcher)) 
			{
						
				$b_batcher=$row2['b_batcher'];			
				
			}

			$data=array("b_batcher"=>$b_batcher); // This is your data array/result
			echo json_encode($data);
		}

		elseif ($route_number==2) 
		{
			$sql_for_getting_b_batcher="select b_batcher from bleaching where route_issue_id='$route_issue_id'";		
			# code...
		
			$pp_res_getting_b_batcher= mysqli_query($con, $sql_for_getting_b_batcher) or die(mysqli_error($con));

			  while ($row2 = mysqli_fetch_assoc($pp_res_getting_b_batcher)) 
			{
						
				$b_batcher=$row2['b_batcher'];			
				
			}

			$data=array("b_batcher"=>$b_batcher); // This is your data array/result
			echo json_encode($data);
		}

		elseif ($route_number==4) 
		{
			$sql_for_getting_b_batcher="select b_batcher from ready_mercerize where route_issue_id='$route_issue_id'";		
			# code...
		
			$pp_res_getting_b_batcher= mysqli_query($con, $sql_for_getting_b_batcher) or die(mysqli_error($con));

			  while ($row2 = mysqli_fetch_assoc($pp_res_getting_b_batcher)) 
			{
						
				$b_batcher=$row2['b_batcher'];			
				
			}

			$data=array("b_batcher"=>$b_batcher); // This is your data array/result
			echo json_encode($data);
		}

		elseif ($route_number==5) 
		{
			$sql_for_getting_b_batcher="select b_batcher from equalize where route_issue_id='$route_issue_id'";		
			# code...
		
			$pp_res_getting_b_batcher= mysqli_query($con, $sql_for_getting_b_batcher) or die(mysqli_error($con));

			  while ($row2 = mysqli_fetch_assoc($pp_res_getting_b_batcher)) 
			{
						
				$b_batcher=$row2['b_batcher'];			
				
			}

			$data=array("b_batcher"=>$b_batcher); // This is your data array/result
			echo json_encode($data);
		}

		elseif ($route_number==6) 
		{
			$sql_for_getting_b_batcher="select b_batcher from printing where route_issue_id='$route_issue_id'";		
			# code...
		
			$pp_res_getting_b_batcher= mysqli_query($con, $sql_for_getting_b_batcher) or die(mysqli_error($con));

			  while ($row2 = mysqli_fetch_assoc($pp_res_getting_b_batcher)) 
			{
						
				$b_batcher=$row2['b_batcher'];			
				
			}

			$data=array("b_batcher"=>$b_batcher); // This is your data array/result
			echo json_encode($data);
		}

		elseif ($route_number==7) 
		{
			$sql_for_getting_b_batcher="select b_batcher from curing where route_issue_id='$route_issue_id'";		
			# code...
		
			$pp_res_getting_b_batcher= mysqli_query($con, $sql_for_getting_b_batcher) or die(mysqli_error($con));

			  while ($row2 = mysqli_fetch_assoc($pp_res_getting_b_batcher)) 
			{
						
				$b_batcher=$row2['b_batcher'];			
				
			}

			$data=array("b_batcher"=>$b_batcher); // This is your data array/result
			echo json_encode($data);
		}

		elseif ($route_number==8) 
		{
			
		}

		elseif ($route_number==9) 
		{
			$sql_for_getting_b_batcher="select b_batcher from washing where route_issue_id='$route_issue_id'";		
			# code...
		
			$pp_res_getting_b_batcher= mysqli_query($con, $sql_for_getting_b_batcher) or die(mysqli_error($con));

			  while ($row2 = mysqli_fetch_assoc($pp_res_getting_b_batcher)) 
			{
						
				$b_batcher=$row2['b_batcher'];			
				
			}

			$data=array("b_batcher"=>$b_batcher); // This is your data array/result
			echo json_encode($data);
		}


		elseif ($route_number==11) 
		{
			$sql_for_getting_b_batcher="select b_batcher from calendering where route_issue_id='$route_issue_id'";		
			# code...
		
			$pp_res_getting_b_batcher= mysqli_query($con, $sql_for_getting_b_batcher) or die(mysqli_error($con));

			  while ($row2 = mysqli_fetch_assoc($pp_res_getting_b_batcher)) 
			{
						
				$b_batcher=$row2['b_batcher'];			
				
			}

			$data=array("b_batcher"=>$b_batcher); // This is your data array/result
			echo json_encode($data);
		}


		elseif ($route_number==12) 
		{
			$sql_for_getting_b_batcher="select b_batcher from sanforizing where route_issue_id='$route_issue_id'";		
			# code...
		
			$pp_res_getting_b_batcher= mysqli_query($con, $sql_for_getting_b_batcher) or die(mysqli_error($con));

			  while ($row2 = mysqli_fetch_assoc($pp_res_getting_b_batcher)) 
			{
						
				$b_batcher=$row2['b_batcher'];			
				
			}

			$data=array("b_batcher"=>$b_batcher); // This is your data array/result
			echo json_encode($data);
		}


		elseif ($route_number==13) 
		{
			$sql_for_getting_b_batcher="select b_batcher from raising where route_issue_id='$route_issue_id'";		
			# code...
		
			$pp_res_getting_b_batcher= mysqli_query($con, $sql_for_getting_b_batcher) or die(mysqli_error($con));

			  while ($row2 = mysqli_fetch_assoc($pp_res_getting_b_batcher)) 
			{
						
				$b_batcher=$row2['b_batcher'];			
				
			}

			$data=array("b_batcher"=>$b_batcher); // This is your data array/result
			echo json_encode($data);
		}

		elseif ($route_number==15) 
		{
			$sql_for_getting_b_batcher="select b_batcher from scouring_bleaching where route_issue_id='$route_issue_id'";		
			# code...
		
			$pp_res_getting_b_batcher= mysqli_query($con, $sql_for_getting_b_batcher) or die(mysqli_error($con));

			  while ($row2 = mysqli_fetch_assoc($pp_res_getting_b_batcher)) 
			{
						
				$b_batcher=$row2['b_batcher'];			
				
			}

			$data=array("b_batcher"=>$b_batcher); // This is your data array/result
			echo json_encode($data);
		}

		elseif ($route_number==16) 
		{
			$sql_for_getting_b_batcher="select b_batcher from scouring where route_issue_id='$route_issue_id'";		
			# code...
		
			$pp_res_getting_b_batcher= mysqli_query($con, $sql_for_getting_b_batcher) or die(mysqli_error($con));

			  while ($row2 = mysqli_fetch_assoc($pp_res_getting_b_batcher)) 
			{
						
				$b_batcher=$row2['b_batcher'];			
				
			}

			$data=array("b_batcher"=>$b_batcher); // This is your data array/result
			echo json_encode($data);
		}

		elseif ($route_number==17) 
		{
			$sql_for_getting_b_batcher="select b_batcher from ready_for_print where route_issue_id='$route_issue_id'";		
			# code...
		
			$pp_res_getting_b_batcher= mysqli_query($con, $sql_for_getting_b_batcher) or die(mysqli_error($con));

			  while ($row2 = mysqli_fetch_assoc($pp_res_getting_b_batcher)) 
			{
						
				$b_batcher=$row2['b_batcher'];			
				
			}

			$data=array("b_batcher"=>$b_batcher); // This is your data array/result
			echo json_encode($data);
		}

		elseif ($route_number==18) 
		{
			$sql_for_getting_b_batcher="select b_batcher from ready_for_dye where route_issue_id='$route_issue_id'";		
			# code...
		
			$pp_res_getting_b_batcher= mysqli_query($con, $sql_for_getting_b_batcher) or die(mysqli_error($con));

			  while ($row2 = mysqli_fetch_assoc($pp_res_getting_b_batcher)) 
			{
						
				$b_batcher=$row2['b_batcher'];			
				
			}

			$data=array("b_batcher"=>$b_batcher); // This is your data array/result
			echo json_encode($data);
		}


		elseif ($route_number==19) 
		{
			$sql_for_getting_b_batcher="select b_batcher from ready_for_raising where route_issue_id='$route_issue_id'";		
			# code...
		
			$pp_res_getting_b_batcher= mysqli_query($con, $sql_for_getting_b_batcher) or die(mysqli_error($con));

			  while ($row2 = mysqli_fetch_assoc($pp_res_getting_b_batcher)) 
			{
						
				$b_batcher=$row2['b_batcher'];			
				
			}

			$data=array("b_batcher"=>$b_batcher); // This is your data array/result
			echo json_encode($data);
		}
		

	exit();
	

		
/*



    $pp_Get_before_trolley_batcher = mysqli_query($con, $sql_for_before_trolley_batcher) or die(mysqli_error($con));


    while ($row = mysqli_fetch_assoc($pp_Get_before_trolley_batcher)) 
	{
					
		$Get_before_trolley_batcher=$row['before_trolley_batcher'];

		
		
	}
	
	$data=array("before_trolley_batcher"=>$Get_before_trolley_batcher); // This is your data array/result
			echo json_encode($data);


*/

?>



?>

