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
                        <li>Add Machine Name</li>
                    </ol>
                  </div>
                </div>

                <!-- main content again -->
                <div class="row">
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                      <div class="x_title">
                        <h2>Add Machine Name Form</h2>
                        <ul class="nav navbar-right panel_toolbox">
                          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                          </li>
                        </ul>
                        <div class="clearfix"></div>
                      </div>
                      <div class="x_content">
                        <br />

                        <form id="add_route_form" name="add_route_form" data-parsley-validate class="form-horizontal form-label-left">

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="machine">Machine Name <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="machine" name="machine" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="route_id">Process Name <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <select id="route_id" name="route_id" class="route_id_issue select2 form-control col-md-12 col-xs-12">
                                <option value="" selected="selected">Select Process Name</option>
                                <?php
                                  $process_sql = "SELECT * FROM route ORDER BY route_name";
                                  $process_res = mysqli_query($con, $process_sql) or die(mysqli_error($con));
                                  while ($process_row = mysqli_fetch_assoc($process_res)) 
                                  {
                                      echo "<option value='".$process_row['route_id']."'>";
                                      echo $process_row['route_name'];
                                      echo "</option>";
                                  }
                                ?>
                              </select>
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
                          <h2>Machine</h2>
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
                                <th>Process Name</th>
                                <th>Machine Name</th>
                                <th>Action</th>
                              </tr>
                            </thead>
                            
                            <tbody>
                              <?php 
                                $s1 = 1;
                                $sql_for_machine = "SELECT * FROM machine";

                                $res_for_machine = mysqli_query($con, $sql_for_machine);

                                while ($row = mysqli_fetch_assoc($res_for_machine)) 
                                {
                              ?>
                              <tr>
                                <td><?php echo $s1; ?></td>
                                <td>
                                    <?php 
                                      $route_id = $row['route_id'];
                                      $sql_for_customer = "SELECT * FROM route WHERE route_id = '$route_id'";
                                      $res_for_customer = mysqli_query($con, $sql_for_customer);
                                      $row_for_customer = mysqli_fetch_assoc($res_for_customer);
                                      echo $row_for_customer['route_name'];
                                    ?>
                                </td>
                                <td><?php echo $row['machine_name'] ?></td>
                                <td>
                                  <form action="edit_machine.php" method="post" style="display: inline;">
                                    <input type="hidden" id="machine_id" name="machine_id" value="<?php echo $row['machine_id']; ?>">
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

    function initializeSelect2(selectElementObj) 
    {
      selectElementObj.select2(
      {
        width: "100%",
        tags: true
      });
    }

     $(document).ready(function(){ 

      //onload: call the above function 
      $(".select2").each(function() 
      {
        initializeSelect2($(this));
      });

      $('#submit').click(function()
      {
          if(document.getElementById("machine").value == "")
          {
              missing_alert("machine");
              return false;
          }
          else if(document.getElementsByClassName("route_id_issue")[0].value == "")
          {
              missing_alert_for_class("route_id_issue", 0);
              return false;
          }
          else
          {
              var formdata = new FormData(document.getElementById('add_route_form'));
              $.ajax({
              type: "POST",
              url: "add_machine_saving.php",// where you wanna post
              data: formdata,
              processData: false,
              contentType: false,
              error: function(jqXHR, textStatus, errorMessage) 
              {
                  alert(errorMessage);
              },
              success: function(data) 
              { 
                if (data == "Input Route Name") 
                {
                    info_alert(data);
                }

                else if(data == "Route Name Already Exists")
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
                    window.location = "machine_list.php";
                }
              } 
            });
          }


      });
  });
  </script>
</body>
</html>