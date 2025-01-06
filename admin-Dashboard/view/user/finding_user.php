<?php
session_start();
require_once("../includes/db_session_chk.php");

$res = "";

if(isset($_POST['id']) || isset($_POST['user_id']))
{

    $id = isset($_POST['id']) ? $_POST['id'] : "";
    $id = str_replace("Plus_Smbl", "+", $id);
    $id = str_replace('Ampersand_Smbl','&', $id);
    $id = str_replace("'","''", $id);

    $user_id = isset($_POST['user_id']) ? $_POST['user_id'] : "";
    $user_id = str_replace("Plus_Smbl", "+", $user_id);
    $user_id = str_replace('Ampersand_Smbl','&', $user_id);
    $user_id = str_replace("'","''", $user_id);

    if($id != "")
    {
      $sql = " SELECT usl.*,
                      depi.department_name,
                      desi.short_form
                 FROM `user_login` usl
            LEFT JOIN `department_info` depi ON usl.department = depi.id
            LEFT JOIN `designation_info` desi ON usl.designation = desi.id
                WHERE usl.id = '$id'";
    }
    else if($user_id != "")
    {
      $sql = " SELECT usl.*,
                      depi.department_name,
                      desi.short_form
                 FROM `user_login` usl
            LEFT JOIN `department_info` depi ON usl.department = depi.id
            LEFT JOIN `designation_info` desi ON usl.designation = desi.id
                WHERE usl.user_id = '$user_id'";
    }
    $result = mysqli_query($con, $sql);
    $sl = 0;

    while ($row = mysqli_fetch_assoc($result))
    {

        $res .= '<div class="col-md-3 col-sm-3 col-xs-12 profile_left">
                        <div class="demo anim-underline">
                          <label for="new_image_src">
                              <figure class="imghvr-zoom-in">
                                <img src="../../build/user_pic/'.$row["image_src"].'" alt="picture">
                                <figcaption>
                                  <i class="fa fa-camera-retro fa-3x" style="padding-top: 50px;"></i>
                                  <p class="hover hover-1">Change Picture</p>
                                </figcaption>
                              </figure>
                          </label>
                        </div>
                        <h3>'.$row["first_name"].'</h3>

                        <ul class="list-unstyled user_data">
                            <li>
                                <strong><i class="fa fa-map-marker user-profile-icon"></i></strong> Corporate Office: Adamjee Court Main Building (4th & 5th Floor), 115-120, Motijheel C/A, Dhaka-1000, Bangladesh.
                            </li>
                            <li>
                                <i class="fa fa-phone user-profile-icon"></i> +88 02 9578401-02, 9578407-08, 7124793, Fax : +88 02 9564336
                            </li>
                            <li class="m-top-xs">
                                <i class="fa fa-external-link user-profile-icon"></i>
                                <a href="http://www.nomangroup.com" target="_blank">http://www.nomangroup.com</a>
                            </li>
                        </ul>
                        <button type="button" id="user_edit_btn" value="" onclick="undo_disable();" class="btn btn-success">
                            <i class="fa fa-edit m-right-xs"></i> Edit Profile
                        </button>
                        <button type="button" id="user_pass_change_view" value="'.$row['id'].'" onclick="user_pass_view_function()" class="btn btn-success"  data-toggle="modal" data-target=".user-pass-view-modal-lg">
                            <i class="fa fa-key m-right-xs"></i> Edit Password
                        </button>
                        <br />
                    </div>
                    <div class="col-md-9 col-sm-9 col-xs-12">

                    <form id="user_profile_edit_form" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left">

                      <input type="hidden" id="id" name="id" value="'.$row['id'].'">
                      <input type="file" id="new_image_src" name="new_image_src" style="display: none;">
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="new_first_name">First Name</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" disabled="disabled" style="cursor: text;" id="new_first_name" name="new_first_name" value="'.$row["first_name"].'" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="new_last_name">Last Name</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" disabled="disabled" style="cursor: text;" id="new_last_name" name="new_last_name" value="'.$row["last_name"].'" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="new_middle_name">Middle Name / Initial</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" disabled="disabled" style="cursor: text;" id="new_middle_name" name="new_middle_name" value="'.$row["middle_name"].'" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="new_user_id">User ID</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" disabled="disabled" style="cursor: text;" id="new_user_id" name="new_user_id" value="'.$row["user_id"].'" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="new_email">Email</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" disabled="disabled" style="cursor: text;" id="new_email" name="new_email" value="'.$row["email"].'" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="new_contact_no">Contact No.</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" disabled="disabled" style="cursor: text;" id="new_contact_no" name="new_contact_no" value="'.$row["contact_no"].'" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>';
        if($_SESSION['edfms_user_type'] == 'Super Admin')
        {              
          $res .=     '<div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="new_department">Department</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select disabled="disabled" id="new_department" name="new_department" class="form-control">
                            <option value="">Select Department</option>';
                                
                              $sql_for_dept = "SELECT * FROM department_info";
                              $res_for_dept = mysqli_query($con, $sql_for_dept) or die(mysqli_error($con));
                              while($row_for_dept = mysqli_fetch_array($res_for_dept))
                              {
                                $res .= "<option "; 
                                $res .= $row['department'] == $row_for_dept["id"] ? "selected='selected' " : "";
                                $res .= "value='".$row_for_dept['id']."'>".$row_for_dept['department_name']."</option>";
                              }

          $res .=         '</select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="new_designation">Designation</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select disabled="disabled" id="new_designation" name="new_designation" class="form-control">
                            <option value="">Select Designation</option>';
                                
                              $sql_for_desg = "SELECT * FROM designation_info";
                              $res_for_desg = mysqli_query($con, $sql_for_desg) or die(mysqli_error($con));
                              while($row_for_desg = mysqli_fetch_array($res_for_desg))
                              {
                                $res .= "<option "; 
                                $res .= $row['designation'] == $row_for_desg["id"] ? "selected='selected' " : "";
                                $res .= "value='".$row_for_desg['id']."'>".$row_for_desg['short_form']."</option>";
                              }
                                
          $res .=         '</select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="new_user_type">User Type</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select disabled="disabled" id="new_user_type" name="new_user_type" class="form-control">';

                            $res .= "<option "; 
                            $res .= $row['user_type'] == "User" ? "selected='selected' " : "";
                            $res .= "value='User'>User</option>";
                            $res .= "<option "; 
                            $res .= $row['user_type'] == "Admin" ? "selected='selected' " : "";
                            $res .= "value='Admin'>Admin</option>";
                            $res .= "<option "; 
                            $res .= $row['user_type'] == "Super Admin" ? "selected='selected' " : "";
                            $res .= "value='Super Admin'>Super Admin</option>";
                            $res .= "<option "; 
                            $res .= $row['user_type'] == "Viewer" ? "selected='selected' " : "";
                            $res .= "value='Viewer'>Viewer</option>";
                                
          $res .=         '</select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="new_status">User Status</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select disabled="disabled" id="new_status" name="new_status" class="form-control">';

                            $res .= "<option "; 
                            $res .= $row['user_type'] == "Active" ? "selected='selected' " : "";
                            $res .= "value='Active'>Active</option>";
                            $res .= "<option "; 
                            $res .= $row['user_type'] == "Inactive" ? "selected='selected' " : "";
                            $res .= "value='Inactive'>Inactive</option>";
                                
          $res .=         '</select>
                        </div>
                      </div>

                    </form>
                    </div>';
        }

    }

}

$res .= "";

echo $res;

?>