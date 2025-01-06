<?php
//fetch.php
session_start();
require_once("../includes/db_session_chk.php");
if(isset($_POST["calendering_standard_id"]))
{
 	$calendering_standard_id = $_POST["calendering_standard_id"];
 	$sql = "SELECT * FROM calendering_standard WHERE calendering_standard_id = '$calendering_standard_id' AND active = '1' ";
 	$res = mysqli_query($con, $sql);
 	$row = mysqli_fetch_array($res);
    echo json_encode($row);
}
?>