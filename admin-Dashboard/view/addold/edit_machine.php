<?php
session_start();
require_once("../includes/db_session_chk.php");
$machine_id = $_POST['machine_id'];

$sql = "SELECT * FROM machine WHERE machine_id = '$machine_id'";
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
                        <li><a href="add_machine.php">Add Machine Name</a></li>
                        <li>Edit Machine</li>
                    </ol>
                  </div>
                </div>

                <!-- main content again -->
                <div class="row">
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                      <div class="x_title">
                        <h2>Edit Machine Form</h2>
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
                              <input type="text" id="machine" name="machine" value="<?php echo $row['machine_name'] ?>" class="form-control col-md-7 col-xs-12">
                              <input type="hidden" id="machine_id" name="machine_id" value="<?php echo $row['machine_id'] ?>">
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="route_id">Process Name <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <select id="route_id" name="route_id" class="route_id_issue select2 form-control col-md-12 col-xs-12">
                                <option value="" selected="selected">Select Process Name</option>
                                <?php
                                  $route_id = $row['route_id'];

                                  $process_sql = "SELECT * FROM route ORDER BY route_name";
                                  $process_res = mysqli_query($con, $process_sql) or die(mysqli_error($con));
                                  while ($process_row = mysqli_fetch_assoc($process_res)) 
                                  {
                                      ?>
                                          <option <?php if($process_row['route_id'] == $route_id ){echo "selected";}?> value="<?php echo $process_row['route_id'];?>"> <?php echo $process_row['route_name'];?></option>
                                      <?php
                                  }
                                ?>
                              </select>
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
          else if(document.getElementById("route_id").value == "")
          {
              missing_alert("route_id");
              return false;
          }
          else
          {
              var formdata = new FormData(document.getElementById('add_route_form'));
              $.ajax({
              type: "POST",
              url: "edit_machine_saving.php",// where you wanna post
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