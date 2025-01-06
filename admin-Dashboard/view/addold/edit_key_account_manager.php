<?php
session_start();
require_once("../includes/db_session_chk.php");
$key_account_manager_id = $_POST['key_account_manager_id'];

$sql = "SELECT * FROM key_account_manager WHERE key_account_manager_id = '$key_account_manager_id'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">

<?php
require_once('../includes/header.php');
?>


<!-- bootstrap-daterangepicker -->
<link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
<!-- bootstrap-datetimepicker -->
<link href="../vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css" rel="stylesheet">
<!-- bootstrap-daterangepicker -->
<script src="../vendors/moment/min/moment.min.js"></script>
<script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- bootstrap-datetimepicker -->    
<script src="../vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>

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
                        <li>Settings</li>
                        <li><a href="add_key_account_manager.php">Add Key Account Manager Name</a></li>
                        <li>Edit Key Account Manager</li>
                    </ol>
                  </div>
                </div>

                <!-- main content again -->
                <div class="row">
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                      <div class="x_title">
                        <h2>Edit Key Account Manager Form</h2>
                        <ul class="nav navbar-right panel_toolbox">
                          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                          </li>
                        </ul>
                        <div class="clearfix"></div>
                      </div>
                      <div class="x_content">
                        <br />

                        <form id="add_key_account_manager_form" name="add_key_account_manager_form" data-parsley-validate class="form-horizontal form-label-left">

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="key_account_manager">Key Account Manager Name <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="key_account_manager" name="key_account_manager" value="<?php echo $row['key_account_manager_name'] ?>" class="form-control col-md-7 col-xs-12">
                              <input type="hidden" id="key_account_manager_id" name="key_account_manager_id" value="<?php echo $row['key_account_manager_id'] ?>">
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="department">Department <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <select id="department" name="department" class="department_issue select2 form-control col-md-12 col-xs-12">
                                <option value="" selected="selected">Select Department</option>
                                <?php
                                  $department = $row['department'];

                                  $department_sql = "SELECT * FROM department_info";
                                  $department_res = mysqli_query($con, $department_sql) or die(mysqli_error($con));
                                  while ($department_row = mysqli_fetch_assoc($department_res)) 
                                  {
                                      ?>

                                      <option <?php if($department_row['id'] == $department ){echo "selected";}?> value="<?php echo $department_row['id'];?>"> <?php echo $department_row['department_name'];?></option>

                                      <?php
                                  }
                                ?>
                              </select>
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="designation">Designation <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <select id="designation" name="designation" class="designation_issue select2 form-control col-md-12 col-xs-12">
                                <option value="" selected="selected">Select Designation </option>
                                <?php
                                  $designation = $row['designation'];

                                  $designation_sql = "SELECT * FROM designation_info ";
                                  $designation_res = mysqli_query($con, $designation_sql) or die(mysqli_error($con));
                                  while ($designation_row = mysqli_fetch_assoc($designation_res)) 
                                  {
                                      ?>

                                      <option <?php if($designation_row['id'] == $designation ){echo "selected";}?> value="<?php echo $designation_row['id'];?>"> <?php echo $designation_row['short_form'];?></option>

                                      <?php
                                  }
                                ?>
                              </select>
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="phone_number"> Phone No 
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="phone_number" name="phone_number" value="<?php echo $row['phone_number'] ?>" class="form-control col-md-7 col-xs-12">
                              
                            </div>
                          </div>

                          <div class="ln_solid"></div>
                          <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                              <button type="button" name="submit" id="submit" class="btn btn-success">Update</button>
                            </div>
                          </div>

                        </form>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- main content finished -->

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
    <script type="text/javascript">
     $(document).ready(function(){ 

      $('#submit').click(function()
      {
          if(document.getElementById("key_account_manager").value == "")
          {
              missing_alert("key_account_manager");
              return false;
          }
          else
          {
              var formdata = new FormData(document.getElementById('add_key_account_manager_form'));
              $.ajax({
              type: "POST",
              url: "edit_key_account_manager_saving.php",// where you wanna post
              data: formdata,
              processData: false,
              contentType: false,
              error: function(jqXHR, textStatus, errorMessage) 
              {
                  alert(errorMessage);
              },
              success: function(data) 
              {
                if (data == "Input Key Account Manager Name") 
                {
                    info_alert(data);
                }

                else if(data == "Key Account Manager Name Already Exists")
                {
                    info_alert(data);
                }

                else if(data == "Data Not Inserted")
                {
                    info_alert(data);
                }

                else
                {
                    info_alert(data);
                    window.location = "key_account_manager_list.php";
                }
              } 
            });
          }


      });
  });
  </script>
</body>
</html>