<?php
session_start();
require_once("../includes/db_session_chk.php");
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
                        <li>Add Key Account Manager</li>
                    </ol>
                  </div>
                </div>

                <!-- main content again -->
                <div class="row">
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                      <div class="x_title">
                        <h2>Add Key Account Manager Form</h2>
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
                              <input type="text" id="key_account_manager" name="key_account_manager" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="department">Department</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
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
                            <div class="col-md-6 col-sm-6 col-xs-12">
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
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="phone_number"> Phone No
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="phone_number" name="phone_number" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <div class="ln_solid"></div>
                          <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                              <button type="button" name="submit" id="submit" class="btn btn-success">ADD</button>
                              <button type="reset" name="reset" id="reset" class="btn btn-info">Reset</button>
                            </div>
                          </div>

                        </form>
                      </div>
                    </div>
                  </div>
                </div>


                 <div class="clearfix"></div>
                <div class="row">
                   <div class="col-md-12 col-sm-12 col-xs-12">
                      <div class="x_panel">
                        <div class="x_title">
                          <h2>Key Account Manager</h2>
                          <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                          </ul>
                          <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                          <table id="datatable-buttons" class="table table-striped table-bordered">
                            <thead>
                              <tr>
                                <th>SI</th>
                                <th>Key Account Manager Name</th>
                                <th>Department</th>
                                <th>Designation</th>
                                <th>Phone No</th>
                                <th>Action</th>
                              </tr>
                            </thead>
                            
                            <tbody>
                              <?php 
                                $s1 = 1;
                                $sql_for_key_account_manager = "SELECT * FROM key_account_manager";

                                $res_for_key_account_manager = mysqli_query($con, $sql_for_key_account_manager);

                                while ($row = mysqli_fetch_assoc($res_for_key_account_manager)) 
                                {
                              ?>
                              <tr>
                                <td><?php echo $s1; ?></td>
                                <td><?php echo $row['key_account_manager_name'] ?></td>

                                

                                <td>
                                  <?php 
                                    $customer_id = $row['department'];
                                    $sql_for_customer = "SELECT department_name FROM department_info WHERE id = '$customer_id'";
                                    $res_for_customer = mysqli_query($con, $sql_for_customer);
                                    $row_for_customer = mysqli_fetch_assoc($res_for_customer);
                                    echo $row_for_customer['department_name'];
                                  ?>
                                </td>

                                <td>
                                  <?php 
                                    $customer_id = $row['designation'];
                                    $sql_for_customer = "SELECT designation FROM designation_info WHERE id = '$customer_id'";
                                    $res_for_customer = mysqli_query($con, $sql_for_customer);
                                    $row_for_customer = mysqli_fetch_assoc($res_for_customer);
                                    echo $row_for_customer['designation'];
                                  ?>
                                </td>

                                <td><?php echo $row['phone_number'] ?></td>

                                <td>
                                  <form action="edit_key_account_manager.php" method="post" style="display: inline;">
                                    <input type="hidden" id="key_account_manager_id" name="key_account_manager_id" value="<?php echo $row['key_account_manager_id']; ?>">
                                    <button type="submit" id="gray_issue_add_btn" name="gray_issue_add_btn" class="btn btn-primary btn-xs"> Edit </button>
                                  </form>
                                </td>
                              </tr>
                              <?php 
                                ++$s1;
                               }
                              ?>
                            </tbody>
                          </table>
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
              url: "add_key_account_manager_saving.php",// where you wanna post
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