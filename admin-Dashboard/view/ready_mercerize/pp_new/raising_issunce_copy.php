<?php
//fetch.php
session_start();
require_once("../includes/db_session_chk.php");
if(isset($_POST["raising_standard_id"]))
{
 	$raising_standard_id = $_POST["raising_standard_id"];
 	$sql = "SELECT * FROM raising_standard WHERE raising_standard_id = '$raising_standard_id' AND active = '1' ";
 	$res = mysqli_query($con, $sql);
 	$row = mysqli_fetch_array($res);
    echo json_encode($row);
}
?>