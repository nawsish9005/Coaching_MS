<?php
session_start();
require_once("../includes/db_session_chk.php");
?>

<!DOCTYPE html>
<html lang="en">

<?php
require_once('../includes/header.php');
?>

</head>
<body class="nav-md">
    <div class="container body">
        <div class="main_container">

            <?php
            require_once('../includes/sidebar.php');
            require_once('../includes/top_nav.php');
            ?>

            <!-- page content -->
            <div class="right_col" role="main" style="margin-bottom: 10px;">
              <div class="">
                <div class="page-title">
                  <div class="title_left">
                    <ol class="breadcrumb">
                        <li><a href="../home/dashboard.php">Dashboard</a></li>
                        <li class="active">User Create</li>
                    </ol>
                  </div>
                </div>

                <!-- main content -->
                <div class="row">
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                      <div class="x_title">
                        <h2>Create User <small></small></h2>
                        <ul class="nav navbar-right panel_toolbox">
                          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                        </ul>
                        <div class="clearfix"></div>
                      </div>
                      <div class="x_content">
                        <form action="" method="post" enctype="multipart/form-data" id="user_create_form" name="user_create_form" data-parsley-validate class="form-horizontal form-label-left">

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first_name">First Name <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="first_name" name="first_name" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last_name">Last Name <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="last_name" name="last_name" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="middle_name" class="control-label col-md-3 col-sm-3 col-xs-12">Middle Name / Initial</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="middle_name" name="middle_name" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="user_id">User ID <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="user_id" name="user_id" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="password">Password <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="password" id="password" name="password" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="con_password">Confrim Password <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="password" id="con_password" name="con_password" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="email" name="email" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="contact_no">Contact No. <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="contact_no" name="contact_no" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="department">Department</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                              <select id="department" name="department" class="form-control">
                                <option selected="selected" value="">Select Department</option>
                                <?php
                                $sql_for_dept = "SELECT * FROM department_info";
                                $res_for_dept = mysqli_query($con, $sql_for_dept) or die(mysqli_error($con));
                                while($row_for_dept = mysqli_fetch_array($res_for_dept))
                                {
                                    echo "<option value='".$row_for_dept['id']."'>".$row_for_dept['department_name']."</option>";
                                }
                                ?>
                              </select>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="designation">Designation</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                              <select id="designation" name="designation" class="form-control">
                                <option selected="selected" value="">Select Designation</option>
                                <?php
                                $sql_for_desg = "SELECT * FROM designation_info";
                                $res_for_desg = mysqli_query($con, $sql_for_desg) or die(mysqli_error($con));
                                while($row_for_desg = mysqli_fetch_array($res_for_desg))
                                {
                                    echo "<option value='".$row_for_desg['id']."'>".$row_for_desg['short_form']."</option>";
                                }
                                ?>
                              </select>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="user_type">User Type</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                              <select id="user_type" name="user_type" class="form-control">
                                <option selected='selected' value=''>User</option>
                                <?php
                                  if ($edfms_logged_user_type == "admin") {
                                    $sql_for_user_type = "SELECT * FROM user_type WHERE NOT id = 1";
                                  }
                                  else
                                  {
                                    $sql_for_user_type = "SELECT * FROM user_type";
                                  }
                                  $res_for_user_type = mysqli_query($con, $sql_for_user_type) or die(mysqli_error($con));
                                  while($row_for_user_type = mysqli_fetch_array($res_for_user_type))
                                  {
                                      echo "<option value='".$row_for_user_type['short_name']."'>".$row_for_user_type['name']."</option>";
                                  }
                                ?>
                              </select>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="status">User Status</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                              <select id="status" name="status" class="form-control">
                                <option selected='selected' value='Active'>Active</option>
                                <option value='Inactive'>Inactive</option>
                              </select>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Attach Profile Picture <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="file" id="image_src" name="image_src" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>
                          <div class="ln_solid"></div>
                          <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                              <!-- <button class="btn btn-primary" type="button">Cancel</button> -->
                              <button class="btn btn-primary" type="reset">Reset</button>
                              <button type="button" class="btn btn-success" onclick='sending_data_of_user_create_form_for_saving_in_database()'>Submit</button>
                            </div>
                          </div>

                        </form>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /main content -->

              </div>
            </div>
            <!-- /page content -->

            <?php
            require_once('../includes/footer_body.php');
            ?>

        </div>
    </div>

    <?php
    require_once('../includes/footer.php');
    ?>

    <script type='text/javascript' src='user_create_form_validation.js'></script>
    <script>

        function sending_data_of_user_create_form_for_saving_in_database()
        {
            var validation = Form_Validation();

            if(validation == false)
            {
                return false;
            }

            var form = document.forms.namedItem("user_create_form");
            var form_data = new FormData(form);

            if (window.XMLHttpRequest)
            {
                var xmlhttp = new XMLHttpRequest();
            }
            else
            {
                var xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }

            xmlhttp.open("POST","user_create_saving.php",true);
            //xmlhttp.setRequestHeader("Content-type","multipart/form-data");
            xmlhttp.send(form_data);  
            xmlhttp.onreadystatechange = function()
            {
                if (xmlhttp.readyState != 4) // Means data is not received from server.
                {

                }
                if (xmlhttp.readyState == 4)
                {
                    var data = xmlhttp.responseText;
                    if(data == "User ID already exists!" || data == "User creation is failed!")
                    {
                        fail_alert_2(data,"user_id","Sorry!");
                    }
                    else
                    {
                        success_alert(data,"user_list.php","Success!");
                    }
                }
            }

        } // End of function sending_data_of_user_create_form_for_saving_in_database()

    </script>
    
</body>
</html>