<?php
session_start();
require_once("../includes/db_session_chk.php");
$pp_no = mysqli_real_escape_string($con, stripslashes(trim($_GET['pp_no'])));

?>

<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
<script src="../vendors/custom/jQuery.js"></script>  
<!-- bootstrap-daterangepicker -->
<link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
<!-- bootstrap-datetimepicker -->
<link href="../vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css" rel="stylesheet">
<!-- bootstrap-daterangepicker -->
<script src="../vendors/moment/min/moment.min.js"></script>
<script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- bootstrap-datetimepicker -->    
<script src="../vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
           
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
                        <li><a href="../pp_new/pp_create_form_without_version.php">PP Creation</a></li>
                        <li>PP View Form</li>
                    </ol>
                  </div>
                </div>

                <?php
                  $sql_for_pp = "SELECT * FROM pp WHERE pp_no = '$pp_no' LIMIT 1";
                  $pp_res = mysqli_query($con, $sql_for_pp) or die(mysqli_error($con));
                  $pp_row = mysqli_fetch_assoc($pp_res);
                ?>

                <!-- main content again -->
                <div class="clearfix"></div>
                <div class="row">
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                      <div class="x_title">
                        <h2>PP Number : <span style="color:red;"><?php echo $pp_row['pp_no']; ?></span></h2>
                        <ul class="nav navbar-right panel_toolbox">
                          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                          </li>
                        </ul>
                        <div class="clearfix"></div>
                      </div>
                      <div class="x_content">
                        <br />
                        <form id="pp_fixed_data_form" name="pp_fixed_data_form" data-parsley-validate class="form-horizontal form-label-left">

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="pp">PP Creation Date <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-6">
                              <div class='input-group date' id='myDatepicker2'>
                                <input type='text' class="date_issue form-control" readonly id="custom_date" name="custom_date" value="<?php echo $pp_row['issue_date']; ?>"/>
                                <span class="input-group-addon">
                                   <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                              </div>
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="pp">PP Number <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="pp" name="pp" value="<?php echo $pp_row['pp_no']; ?>" class="pp_issue form-control col-md-7 col-xs-12" readonly>
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="pp_desc">PP Description <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="pp_desc" name="pp_desc" value="<?php echo $pp_row['pp_desc']; ?>" class="pp_desc_issue form-control col-md-7 col-xs-12" readonly>
                            </div>
                          </div>


                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="customer">Customer <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <select disabled id="customer" name="customer" class="customer_issue select2 form-control col-md-12 col-xs-12">
                                <option value="" selected="selected">Select Customer</option>
                                <?php
                                  $pp_customer = $pp_row['customers'];

                                  $customers_sql = "SELECT * FROM customers ORDER BY customers_name";
                                  $customers_res = mysqli_query($con, $customers_sql) or die(mysqli_error($con));
                                  while ($customers_row = mysqli_fetch_assoc($customers_res)) 
                                  {
                                      ?>

                                      <option <?php if($customers_row['customers_id'] == $pp_customer){echo "selected";}?> value="<?php echo $customers_row['customers_id'];?>"> <?php echo $customers_row['customers_name'];?></option>

                                      <?php
                                  }
                                ?>
                              </select>

                              
                              <?php 
                                $pp_details_sql = "SELECT 
                                                        pp_details.*
                                                   FROM
                                                        pp, pp_details
                                                   WHERE
                                                        pp.pp_no = '$pp_no'
                                                   AND pp.pp_id = pp_details.pp_no_id
                                                   AND pp_details.active = '1'

                                                   ORDER BY pp_details.id ASC
                                                  ";
                                $pp_details_res = mysqli_query($con, $pp_details_sql) or die(mysqli_error($con));
                                $number_row = mysqli_num_rows($pp_details_res);
                                ?>

                              <input type="hidden" id="database_row" name="database_row" value="<?php echo $number_row; ?>">
                              <input type="hidden" id="pp_id" name="pp_id" value="<?php echo $pp_row['pp_id']; ?>">
                              <input type="hidden" value="<?php echo $number_row; ?>" id="row-counter" name="row-counter" class="form-control col-md-7 col-xs-12">
                              <input type="hidden" value="<?php echo $number_row; ?>" id="row-name-counter" name="row-name-counter" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="greige_demand">Greige Demand No <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="greige_demand" readonly name="greige_demand" value="<?php echo $pp_row['greige_demand']; ?>" class="greige_demand_issue form-control col-md-7 col-xs-12">
                            </div>
                          </div>


                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="week">Week 
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="week" readonly name="week" value="<?php echo $pp_row['week']; ?>" class="week_issue form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="design">Design <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="design" readonly name="design" value="<?php echo $pp_row['design']; ?>" class="design_issue form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="construction">Construction <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="construction" readonly name="construction" value="<?php echo $pp_row['construction']; ?>" class="construction_issue form-control col-md-7 col-xs-12">
                            </div>

                            <div class="col-md-2 col-sm-2 col-xs-4">
                              <select disabled id="con" name="construction_standard" class="construction_standard form-control col-md-12 col-xs-12">
                                
                                <?php
                                  $pp_customer = $pp_row['construction_standard'];
                                  ?>
                                    <option <?php if('spi' == $pp_customer){echo "selected";}?> value="spi"> SPI </option>
                                    <option <?php if('dpi' == $pp_customer){echo "selected";}?> value="dpi"> DPI </option>
                                  <?php
                                ?>
                              </select> 
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fiber">Fiber Content <span class="required">*</span>
                            </label>
                            <div class="col-md-2 col-sm-2 col-xs-4">
                              <input type="text" readonly id="fiber_cotton" name="fiber_cotton" value="<?php echo $pp_row['fiber_cotton']; ?>" placeholder="Cotton %" oninput="fiber_head()"  class="fiber_cotton_issue form-control col-md-7 col-xs-12">
                            </div>
                            <div class="col-md-2 col-sm-2 col-xs-46">
                              <input type="text" readonly id="fiber_polyster" name="fiber_polyster" value="<?php echo $pp_row['fiber_polyster']; ?>" placeholder="Ployster %" oninput="fiber_head()" class="fiber_polyster_issue form-control col-md-7 col-xs-12">
                            </div>
                            <div class="col-md-2 col-sm-2 col-xs-46">
                              <input type="text" readonly id="fiber_others_name" name="fiber_others_name" value="<?php echo $pp_row['fiber_others_name']; ?>" placeholder="Others Name %" class="fiber_others_name_issue form-control col-md-7 col-xs-12">
                            </div>
                            <div class="col-md-2 col-sm-2 col-xs-46">
                              <input type="text" readonly id="fiber_others_value" name="fiber_others_value" value="<?php echo $pp_row['fiber_others_value']; ?>" placeholder="Others Value %" oninput="fiber_head()" class="fiber_others_value_issue form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="process">Process <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <select disabled id="process" name="process" class="process_issue select2 form-control col-md-12 col-xs-12">
                                <option value=""  selected="selected">Select Process</option>
                                <?php
                                  $process = $pp_row['process'];

                                  $process_sql = "SELECT * FROM process ORDER BY process_name";
                                  $process_res = mysqli_query($con, $process_sql) or die(mysqli_error($con));
                                  while ($process_row = mysqli_fetch_assoc($process_res)) 
                                  {
                                      ?>

                                      <option <?php if($process_row['process_id'] == $process ){echo "selected";}?> value="<?php echo $process_row['process_id'];?>"> <?php echo $process_row['process_name'];?></option>

                                      <?php
                                  }
                                ?>
                              </select>
                            </div>
                          </div>
                        <!-- </form> -->
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- main content finished -->

                <!-- main content again -->
              
                            <!-- </form> -->
                        </div>
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

<script>

// function go_to_acceptance_criteria(serial)
// {
//     var pp_no_id = document.getElementById("pp_no_id"+serial).value;
//     var pp_details_id = document.getElementById("pp_details_id"+serial).value;

//     var formdata = new FormData(document.getElementById('go_to_acceptance_criteria_form'));
//     formdata.append('pp_no_id', pp_no_id);
//     formdata.append('pp_details_id', pp_details_id);

//     $.ajax(
//     {
//       type: "POST",
//       url: "route_issue_define.php",
//       data: formdata,
//       processData: false,
//       contentType: false,
//       error: function(jqXHR, textStatus, errorMessage) 
//       {
//           alert(errorMessage);
//       },
//       success: function(data) 
//       {
//           alert(data);
//       } 
//     });
// }

</script>

</body>
</html>