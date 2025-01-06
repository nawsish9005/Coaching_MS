<?php
//fetch.php
session_start();
require_once("../includes/db_session_chk.php");
if(isset($_POST["action"]))
{
 $output = '';
 if($_POST["action"] == "pp_no_id")
 {
  $query = "SELECT version, pp_no_id, id FROM pp_details WHERE pp_no_id = '".$_POST["query"]."' ";
  $result = mysqli_query($con, $query);
  $output .= '<option value="" selected="selected">Select PP Version</option>';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '<option value="'.$row["id"].'">'.$row["version"].'</option>';
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