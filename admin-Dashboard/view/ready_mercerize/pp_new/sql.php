<?php
//fetch.php
session_start();
require_once("../includes/db_session_chk.php");


if(isset($_POST["action"]))
{
 $output = '';
 if($_POST["action"] == "pp_no_id")
 {
	  $query_change = $_POST["query"];
	  $query = "SELECT version, pp_no_id, pp_id, color, gray_width FROM pp_details WHERE pp_no_id = '$query_change' AND active = '1'  GROUP BY version";
	  $result = mysqli_query($con, $query);
	  $output .= '<option value="" selected="selected">Select PP Version</option>';
	  while($row = mysqli_fetch_array($result))
	  {
	  	   //for version
	  	   $version_select = $row["version"];
	  	   $query_for_version = "SELECT version_name FROM version WHERE version_id = '$version_select'";
	       $result_for_version = mysqli_query($con, $query_for_version);
	       $row_for_version = mysqli_fetch_array($result_for_version);

	       //for version
	  	   $color_select = $row["color"];
	  	   $query_for_color = "SELECT color_name FROM color WHERE color_id = '$color_select'";
	       $result_for_color = mysqli_query($con, $query_for_color);
	       $row_for_color = mysqli_fetch_array($result_for_color);

	       $output .= '<option value="'.$row["pp_id"].'">Version: '.$row_for_version["version_name"].', Color:'.$row_for_color['color_name'].', Greige Width:'.$row['gray_width'].'</option>';
	       //$output .= '<option value="'.$row["pp_id"].'">'.$version_select.'</option>';
	  }
 }

 echo $output;
 
}


?>