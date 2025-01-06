<?php
//fetch.php
session_start();
require_once("../includes/db_session_chk.php");
if(isset($_POST["equalize_standard_id"]))
{
 	$equalize_standard_id = $_POST["equalize_standard_id"];
 	$sql = "SELECT * FROM equalize_standard WHERE equalize_standard_id = '$equalize_standard_id' AND active = '1' ";
 	$res = mysqli_query($con, $sql);
 	$row = mysqli_fetch_array($res);
    echo json_encode($row);
}
?>