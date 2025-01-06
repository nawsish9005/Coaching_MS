<?php
session_start();
require_once('../includes/db_connection_class.php');
$obj = new DB_Connection_Class();
$obj->connection();

$user_id    = $_POST['user_id'];
/*$password   = md5($_POST['password']);
*/
$password   = $_POST['password'];

$sql_for_user_privilege = "SELECT * 
                             FROM `user_login` 
                            WHERE user_id = '$user_id' 
                              AND password = '$password' 
                              AND status = 'Active'";
$res_for_user_privilege = mysqli_query($con, $sql_for_user_privilege) or die(mysqli_error($con));

if(mysqli_num_rows($res_for_user_privilege) > 0)
{
    while($row_for_user_privilege = mysqli_fetch_array($res_for_user_privilege))
    {
        /********** Session Variable defined here **********/
        $_SESSION['edfms_id']            = $row_for_user_privilege['id'];   
        $_SESSION['edfms_user_id']       = $row_for_user_privilege['user_id'];   
        $_SESSION['edfms_first_name']    = $row_for_user_privilege['first_name'];           
        $_SESSION['edfms_last_name']     = $row_for_user_privilege['last_name'];           
        $_SESSION['edfms_middle_name']   = $row_for_user_privilege['middle_name'];           
        $_SESSION['edfms_password']      = $row_for_user_privilege['password'];
        $_SESSION['edfms_user_type']     = $row_for_user_privilege['user_type'];
        $_SESSION['edfms_status']        = $row_for_user_privilege['status'];
        $_SESSION['edfms_last_activity'] = time();
    }
    
    header('Location: ../home/dashboard.php');
}
else
{
    header('Location: logout.php');
}

$obj->disconnection();
?>