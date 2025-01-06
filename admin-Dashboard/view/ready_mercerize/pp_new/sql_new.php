<?php
//fetch.php
session_start();
require_once("../includes/db_session_chk.php");
if(isset($_POST["action"]))
{
 $output = '';

 if($_POST["action"] == "pp_version")
 {	
 	  $pp_no_id = $_POST["pp_no_id"];
	  $query_change = $_POST["query"];
	  $query = "SELECT * FROM route_issue_main WHERE pp_no_id = '$pp_no_id' AND pp_details_id = '$query_change' AND active = '1'";
	  $result = mysqli_query($con, $query);
	  $output .= '<option value="" selected="selected">Select Process</option>';
	  $output .= '<option value="1" >Greige Standrad</option>';

	  while($row = mysqli_fetch_array($result))
	  {
	  		
	  	   $route_select = $row["route"];
	  	   $query_for_route = "SELECT * FROM route WHERE route_id = '$route_select'";
	       $result_for_route = mysqli_query($con, $query_for_route);
	       $row_for_route = mysqli_fetch_array($result_for_route);

	       if ($route_select == 1) 
	       {
	       		$manual_route = 2;
	       }

	       else if ($route_select == 2) 
	       {
	       		$manual_route = 3;
	       }

	       else if ($route_select == 3) 
	       {
	       		$manual_route = 5;
	       }

	       else if ($route_select == 4) 
	       {
	       		$manual_route = 4;
	       }

	       else if ($route_select == 5) 
	       {
	       		$manual_route = 6;
	       }

	       else if ($route_select == 6) 
	       {
	       		$manual_route = 7;
	       }

	       else if ($route_select == 7) 
	       {
	       		$manual_route = 8;
	       }

	       else if ($route_select == 8) 
	       {
	       		// $manual_route = 2;
	       }

	       else if ($route_select == 9) 
	       {
	       		$manual_route = 12;
	       }

	       else if ($route_select == 10) 
	       {
	       		$manual_route = 9;
	       }

	       else if ($route_select == 11) 
	       {
	       		$manual_route = 13;
	       }

	       else if ($route_select == 12) 
	       {
	       		$manual_route = 14;
	       }

	       else if ($route_select == 13) 
	       {
	       		$manual_route = 15;
	       }

	       else if ($route_select == 14) 
	       {
	       		// $manual_route = 2;
	       }

	       else if ($route_select == 15) 
	       {
	       		$manual_route = 10;
	       }

	       else if ($route_select == 16) 
	       {
	       		$manual_route = 11;
	       }

	       else if ($route_select == 17) 
	       {
	       		$manual_route = 17;
	       }

	       else if ($route_select == 18) 
	       {
	       		$manual_route = 18;
	       }

	       else if ($route_select == 19) 
	       {
	       		$manual_route = 16;
	       }

	       else if ($route_select == 20) 
	       {
	       		// $manual_route = 2;
	       }

	       else 
	       {
	       		$manual_route = 1;
	       }

	       $output .= '<option value="'.$manual_route.'">'.$row_for_route["route_name"].'</option>';


	        //$output .= '<option value="'.$row["route"].'">'.$row["version"].'</option>';
	  }
 }





 // if($_POST["action"] == "version")
 // {
 //  $query = "SELECT DISTINCT color FROM pp WHERE version = '".$_POST["query"]."'";
 //  $result = mysqli_query($con, $query);
 //  $output .= '<option value="">Select Color</option>';
 //  while($row = mysqli_fetch_array($result))
 //  {
 //   $output .= '<option value="'.$row["color"].'">'.$row["color"].'</option>';
 //  }
 // }
 // if($_POST["action"] == "color")
 // {
 //  $query = "SELECT DISTINCT gray_width FROM pp WHERE color = '".$_POST["query"]."'";
 //  $result = mysqli_query($con, $query);
 //  $output .= '<option value="">Select Gray Width</option>';
 //  while($row = mysqli_fetch_array($result))
 //  {
 //   $output .= '<option value="'.$row["gray_width"].'">'.$row["gray_width"].'</option>';
 //  }
 // }
 echo $output;
}
?>