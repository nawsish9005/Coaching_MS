<?php
session_start();
require_once("../includes/db_session_chk.php");
$customers_id = $_POST['customers_id'];

$sql = "SELECT * FROM customers WHERE customers_id = '$customers_id'";
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
                        <li><a href="add_customers.php">Add Customer</a></li>
                        <li>Edit Customers</li>
                    </ol>
                  </div>
                </div>

                <!-- main content again -->
                <div class="row">
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                      <div class="x_title">
                        <h2>Edit Customer Form</h2>
                        <ul class="nav navbar-right panel_toolbox">
                          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                          </li>
                        </ul>
                        <div class="clearfix"></div>
                      </div>
                      <div class="x_content">
                        <br />

                        <form id="add_customer_form" name="add_customer_form" data-parsley-validate class="form-horizontal form-label-left">

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="customer">Customer Name <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="customer" name="customer" value="<?php echo $row['customers_name'] ?>" class="form-control col-md-7 col-xs-12">
                              <input type="hidden" id="customer_id" name="customer_id" value="<?php echo $row['customers_id'] ?>">
                            </div>
                          </div>

                         <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="customer_address">Customer Address 
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <!-- <textarea type="text" id="customer_address" name="customer_address"  class="form-control col-md-7 col-xs-12" rows="4" cols="50">
                                    <?php echo $row['customer_address']; ?>
                                </textarea> -->

                              <textarea class="form-control" rows="4" id="customer_address" name="customer_address"><?php echo $row['customer_address'] ?></textarea>
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="customer_country">Country of Origin <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <select id="customer_country" name="customer_country" class="customer_country_issue select2 form-control col-md-12 col-xs-12">
                                <option value="" selected="selected">Select Customer Country</option>
                                <?php
                                  $process = $row['customer_country'];

                                  $process_sql = "SELECT * FROM country ";
                                  $process_res = mysqli_query($con, $process_sql) or die(mysqli_error($con));
                                  while ($process_row = mysqli_fetch_assoc($process_res)) 
                                  {
                                      ?>

                                      <option <?php if($process_row['name'] == $process ){echo "selected";}?> value="<?php echo $process_row['name'];?>"> <?php echo $process_row['name'];?></option>

                                      <?php
                                  }
                                ?>
                              </select>
                            </div>
                          </div>


                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="key_account_manager">Key Account Manager <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <select id="key_account_manager" name="key_account_manager" class="customer_country_issue select2 form-control col-md-12 col-xs-12">
                                <option value="" selected="selected">Select Key Account Manager</option>
                                <?php
                                  $process = $row['key_account_manager'];

                                  $process_sql = "SELECT * FROM key_account_manager ";
                                  $process_res = mysqli_query($con, $process_sql) or die(mysqli_error($con));
                                  while ($process_row = mysqli_fetch_assoc($process_res)) 
                                  {
                                      ?>

                                      <option <?php if($process_row['key_account_manager_id'] == $process ){echo "selected";}?> value="<?php echo $process_row['key_account_manager_id'];?>"> <?php echo $process_row['key_account_manager_name'];?></option>

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
     $(document).ready(function(){ 
 //function to initialize select2
      function initializeSelect2(selectElementObj) 
      {
        selectElementObj.select2(
        {
          width: "100%",
          tags: true
        });
      }

      //onload: call the above function 
      $(".select2").each(function() 
      {
        initializeSelect2($(this));
      });



      $('#submit').click(function()
      {
          if(document.getElementById("customer").value == "")
          {
              missing_alert("customer");
              return false;
          }
          else
          {
              var formdata = new FormData(document.getElementById('add_customer_form'));
              $.ajax({
              type: "POST",
              url: "edit_customer_saving.php",// where you wanna post
              data: formdata,
              processData: false,
              contentType: false,
              error: function(jqXHR, textStatus, errorMessage) 
              {
                  alert(errorMessage);
              },
              success: function(data) 
              {
                  if (data == "Input Customer Name") 
                  {
                      info_alert(data);
                  }

                  else if(data == "Customer Name Already Exists")
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
                      window.location = "customers_list.php";
                  }
              } 
            });
          }


      });
  });
  </script>
</body>
</html>