<?php
session_start();
require_once("../includes/db_session_chk.php");

$res = "";

if(isset($_POST['id']))
{

    $id = $_POST['id'];
    $id = str_replace("Plus_Smbl", "+", $id);
    $id = str_replace('Ampersand_Smbl','&', $id);
    $id = str_replace("'","''", $id);

    $sql = " SELECT *
               FROM `user_login` usl
              WHERE usl.id = '$id'";
    $result = mysqli_query($con, $sql);
    $sl = 0;

    while ($row = mysqli_fetch_assoc($result))
    {

        $res .= '<div class="col-md-9 col-sm-9 col-xs-12">

                    <form id="user_pass_change_form" name="user_pass_change_form" data-parsley-validate class="form-horizontal form-label-left">

                      <input type="hidden" id="pass_id" name="pass_id" value="'.$row["id"].'">
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="old_password">Old Password</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="password" id="old_password" name="old_password" value="" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="new_password">New Password</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="password" id="new_password" name="new_password" value="" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="con_password">Confirm Password</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="password" id="con_password" name="con_password" value="" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                    </form>
                </div>';

    }

}

$res .= "";

echo $res;

?>