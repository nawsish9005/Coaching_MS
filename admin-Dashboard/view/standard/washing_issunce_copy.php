<?php
//fetch.php
session_start();
require_once("../includes/db_session_chk.php");
if(isset($_POST["washing_standard_id"]))
{
 	$washing_standard_id = $_POST["washing_standard_id"];
 	$sql = "SELECT * FROM washing_standard WHERE washing_standard_id = '$washing_standard_id' AND active = '1' ";
 	$res = mysqli_query($con, $sql);
 	$row = mysqli_fetch_array($res);
    echo json_encode($row);
}
?>