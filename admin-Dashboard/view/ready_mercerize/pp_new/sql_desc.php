<?php
//fetch.php
session_start();
require_once("../includes/db_session_chk.php");


// if(isset($_POST["action"]))
// {
	 $output = '';
	 // if($_POST["action"] == "pp_no_id")
	 // {
		  $query_change = $_POST["query"];
		  $query = "SELECT * FROM pp WHERE pp_id = '$query_change' ";
		  $result = mysqli_query($con, $query);
		  $row = mysqli_fetch_array($result);
		  $output .= 'Description: '.$row['pp_desc'];
	 //}


	 echo $output;
 
//}


?>