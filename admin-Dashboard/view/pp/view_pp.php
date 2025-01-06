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
                        <li>Process Program</li>
                        <li><a href="pp_monitoring.php">PP Monitoring</a></li>
                        <li>PP (Process Program) View Form</li>
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

                          <!-- <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="construction">Construction <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select disabled id="construction" name="construction" onchange="construction_head()" class="construction_issue select2 form-control col-md-12 col-xs-12">
                                  <option value="" selected="selected">Select Construction</option>
                                  <?php
                                    $construction = $pp_row['construction'];

                                    $construction_sql = "SELECT * FROM construction";
                                    $construction_res = mysqli_query($con, $construction_sql) or die(mysqli_error($con));
                                    while ($construction_row = mysqli_fetch_assoc($construction_res)) 
                                    {
                                        $yarn_count_warp_total = "";
                                        $yarn_count_weft_total = "";
                                        $thread_count_warp_insertion_total = "";
                                        $yarn_count_warp_total = "";

                                        $yarn_count_warp_ply = $construction_row['yarn_count_warp_ply'];
                                        $yarn_count_weft_ply = $construction_row['yarn_count_weft_ply'];
                                        $thread_count_warp_insertion = $construction_row['thread_count_warp_insertion'];
                                        $thread_count_weft_insertion = $construction_row['thread_count_weft_insertion'];

                                        if ($yarn_count_warp_ply == '1') 
                                        {
                                            $yarn_count_warp_total = $construction_row['yarn_count_warp_value'].".";
                                        }

                                        else
                                        {
                                            $yarn_count_warp_total = $construction_row['yarn_count_warp_value']."^".$construction_row['yarn_count_warp_ply'].".";
                                        }

                                        if ($yarn_count_weft_ply == '1') 
                                        {
                                            $yarn_count_weft_total = $construction_row['yarn_count_weft_value']."/";
                                        }

                                        else
                                        {
                                            $yarn_count_weft_total = $construction_row['yarn_count_weft_value']."^".$construction_row['yarn_count_weft_ply']."/";
                                        }



                                        if ($thread_count_warp_insertion == '1') 
                                        {
                                            $thread_count_warp_insertion_total = $construction_row['thread_count_warp_value'].".";
                                        }

                                        else
                                        {
                                            $thread_count_warp_insertion_total = $construction_row['thread_count_warp_value']."(".$construction_row['thread_count_warp_insertion'].").";
                                        }

                                        if ($thread_count_weft_insertion == '1') 
                                        {
                                            $thread_count_weft_insertion_total = $construction_row['thread_count_weft_value'];
                                        }

                                        else
                                        {
                                            $thread_count_weft_insertion_total = $construction_row['thread_count_weft_value']."(".$construction_row['thread_count_weft_insertion'].")";
                                        }

                                        $display = $yarn_count_warp_total. $yarn_count_weft_total. $thread_count_warp_insertion_total . $thread_count_weft_insertion_total;

                                        ?>
                                        <option <?php if($construction_row['construction_id'] == $construction ){echo "selected";}?> value="<?php echo $construction_row['construction_id'];?>"> <?php echo $display;?></option>
                                        <?php
                                    }
                                  ?>
                                </select>
                            </div> -->

                            <!-- <div class="col-md-2 col-sm-2 col-xs-4">
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
 -->
                         <!--  <div class="form-group">
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
 -->
                          

                         <!--  <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="process">Process Technique (Program Type) <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <select disabled id="process" name="process" class="process_issue select2 form-control col-md-12 col-xs-12">
                                <option value=""  selected="selected">Select Program Type</option>
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
                          </div> -->
                        <!-- </form> -->
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- main content finished -->

                <!-- main content again -->
                <div class="clearfix"></div>
                <div class="row">
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                      <div class="x_title">
                        <h2>PP Version Information (Line)</h2>
                        <ul class="nav navbar-right panel_toolbox">
                          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                          </li>
                        </ul>
                        <div class="clearfix"></div>
                      </div>
                      <div class="x_content">
                        <div class="col-md-12 center-margin">
                          <!-- <form id="pp_multiple_data_send_form" data-parsley-validate class="form-horizontal form-label-left"> -->
                            <div class="form-group">
                                <div class="full_row col-md-12 col-sm-12 col-xs-12" >
                                  <div class="col-md-1 col-sm-1 col-xs-4">
                                    <label class="control-label">Version <span class="required">*</span>
                                    </label>
                                  </div>

                                  <div class="col-md-1 col-sm-1 col-xs-2">
                                    <label class="control-label">Color <span class="required">*</span>
                                    </label>
                                  </div>

                                  <div class="col-md-1 col-sm-1 col-xs-2">
                                    <label class="control-label">Construction 
                                    </label>
                                  </div>

                                  <div class="col-md-1 col-sm-1 col-xs-4">
                                    <label class="control-label">Greige Width (Inch) <span class="required">*</span>
                                    </label>
                                  </div>

                                  <div class="col-md-1 col-sm-1 col-xs-4">
                                    <label class="control-label" for="finish_width">Finish Width (Inch) <span class="required">*</span>
                                    </label>
                                  </div>

                                  <div class="col-md-1 col-sm-1 col-xs-4">
                                    <label class="control-label">Process Technique <br/>(Program Type)<span class="required">*</span>
                                  </div>

                                  <div class="col-md-1 col-sm-1 col-xs-4">
                                    <label class="control-label">Fiber Cotton (%)
                                    </label>
                                  </div>

                                  <div class="col-md-1 col-sm-1 col-xs-4">
                                    <label class="control-label">Fiber Polyster (%)
                                    </label>
                                  </div>

                                  <div class="col-md-1 col-sm-1 col-xs-4">
                                    <label class="control-label">Fiber Others (%) 
                                    </label>
                                  </div>

                                  <div class="col-md-1 col-sm-1 col-xs-4">
                                    <label class="control-label" for="quantity">Quantity (Meter)<span class="required">*</span>
                                    </label>
                                  </div>
                                </div>

                                <?php
                                $i = 1;
                                $total_amount = 0;
                                  while ($pp_details_row = mysqli_fetch_assoc($pp_details_res)) 
                                  {
                                     $total_amount = $total_amount + $pp_details_row['quantity'];

                                    ?>

                                    <div class="full_row col-md-12 col-sm-12 col-xs-12" id="<?php echo ($i); ?>" >
                                        <div class="col-md-1 col-sm-1 col-xs-4">
                                          <!-- <input id="<?php echo "version".$i; ?>" name="<?php echo "version".$i; ?>" value="<?php echo $pp_details_row['version'] ?>" placeholder="Version" class="version-class date-picker form-control col-md-12 col-xs-12" type="text"> -->
                                          <select disabled id="<?php echo "version".$i; ?>" name="<?php echo "version".$i; ?>" class="version-class select2 form-control col-md-12 col-xs-12">
                                            <option value="" selected="selected">Select Version</option>
                                            <?php
                                              $pp_version = $pp_details_row['version'];

                                              $version_sql = "SELECT * FROM version ORDER BY version_name";
                                              $version_res = mysqli_query($con, $version_sql) or die(mysqli_error($con));
                                              while ($version_row = mysqli_fetch_assoc($version_res)) 
                                              {
                                                  ?>

                                                  <option <?php if($version_row['version_id'] == $pp_version){echo "selected";}?> value="<?php echo $version_row['version_id'];?>"> <?php echo $version_row['version_name'];?></option>

                                                  <?php
                                              }
                                            ?>
                                          </select>
                                        </div>

                                        <div class="col-md-1 col-sm-1 col-xs-2">
                                          <select disabled id="<?php echo "color".$i; ?>" name="<?php echo "color".$i; ?>" class="version-color select2 form-control col-md-12 col-xs-12">
                                            <option value="" selected="selected">Select Color</option>
                                            <?php
                                              $pp_color = $pp_details_row['color'];

                                              $color_sql = "SELECT * FROM color ORDER BY color_name";
                                              $color_res = mysqli_query($con, $color_sql) or die(mysqli_error($con));
                                              while ($color_row = mysqli_fetch_assoc($color_res)) 
                                              {
                                                  ?>

                                                  <option <?php if($color_row['color_id'] == $pp_color){echo "selected";}?> value="<?php echo $color_row['color_id'];?>"> <?php echo $color_row['color_name'];?></option>

                                                  <?php
                                              }
                                            ?>
                                          </select>
                                        </div>

                                        <div class="col-md-1 col-sm-1 col-xs-2">
                                          <?php 

                                              if (!($pp_details_row['construction'])) 
                                              {
                                                  ?>
                                                      <!-- <input readonly type="text" id="<?php echo "construction".$i; ?>" name="<?php echo "construction".$i; ?>" value="<?php echo $pp_details_row['construction'] ?>" class="version-construction form-control col-md-12 col-xs-12"> -->

                                                      <select disabled id="<?php echo "construction".$i; ?>" name="<?php echo "construction".$i; ?>" class="version-construction select2 form-control col-md-12 col-xs-12">
                                                        <option value="" selected="selected">Select Construction</option>
                                                      </select>
                                                  <?php
                                              }
                                              else
                                              {
                                                  ?>
                                                      <!-- <input type="text" id="<?php echo "construction".$i; ?>" name="<?php echo "construction".$i; ?>" value="<?php echo $pp_details_row['construction'] ?>" class="version-construction form-control col-md-12 col-xs-12"> -->

                                                      <select disabled id="<?php echo "construction".$i; ?>" name="<?php echo "construction".$i; ?>" class="version-construction select2 form-control col-md-12 col-xs-12">
                                                        <!-- <option value="" selected="selected">Select Construction</option> -->
                                                          <?php
                                                            $construction = $pp_details_row['construction'];

                                                            $construction_sql = "SELECT * FROM construction where construction_id = '$construction'";
                                                            $construction_res = mysqli_query($con, $construction_sql) or die(mysqli_error($con));
                                                            while ($construction_row = mysqli_fetch_assoc($construction_res)) 
                                                            {
                                                                $yarn_count_warp_total = "";
                                                                $yarn_count_weft_total = "";
                                                                $thread_count_warp_insertion_total = "";
                                                                $yarn_count_warp_total = "";

                                                                $yarn_count_warp_ply = $construction_row['yarn_count_warp_ply'];
                                                                $yarn_count_weft_ply = $construction_row['yarn_count_weft_ply'];
                                                                $thread_count_warp_insertion = $construction_row['thread_count_warp_insertion'];
                                                                $thread_count_weft_insertion = $construction_row['thread_count_weft_insertion'];

                                                                if ($yarn_count_warp_ply == '1') 
                                                                {
                                                                    $yarn_count_warp_total = $construction_row['yarn_count_warp_value'].".";
                                                                }

                                                                else
                                                                {
                                                                    $yarn_count_warp_total = $construction_row['yarn_count_warp_value']."^".$construction_row['yarn_count_warp_ply'].".";
                                                                }

                                                                if ($yarn_count_weft_ply == '1') 
                                                                {
                                                                    $yarn_count_weft_total = $construction_row['yarn_count_weft_value']."/";
                                                                }

                                                                else
                                                                {
                                                                    $yarn_count_weft_total = $construction_row['yarn_count_weft_value']."^".$construction_row['yarn_count_weft_ply']."/";
                                                                }



                                                                if ($thread_count_warp_insertion == '1') 
                                                                {
                                                                    $thread_count_warp_insertion_total = $construction_row['thread_count_warp_value'].".";
                                                                }

                                                                else
                                                                {
                                                                    $thread_count_warp_insertion_total = $construction_row['thread_count_warp_value']."(".$construction_row['thread_count_warp_insertion'].").";
                                                                }

                                                                if ($thread_count_weft_insertion == '1') 
                                                                {
                                                                    $thread_count_weft_insertion_total = $construction_row['thread_count_weft_value'];
                                                                }

                                                                else
                                                                {
                                                                    $thread_count_weft_insertion_total = $construction_row['thread_count_weft_value']."(".$construction_row['thread_count_weft_insertion'].")";
                                                                }

                                                                $display = $yarn_count_warp_total. $yarn_count_weft_total. $thread_count_warp_insertion_total . $thread_count_weft_insertion_total;

                                                                ?>
                                                                <option <?php if($construction_row['construction_id'] == $construction ){echo "selected";}?> value="<?php echo $construction_row['construction_id'];?>"> <?php echo $display;?></option>
                                                                <?php
                                                            }
                                                          ?>
                                                      </select>
                                                  <?php
                                              }
                                          ?>

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

                                        <div class="col-md-1 col-sm-1 col-xs-4">
                                          <input readonly id="<?php echo "gray_width".$i; ?>" name="<?php echo "gray_width".$i; ?>" value="<?php echo $pp_details_row['gray_width'] ?>" placeholder="Gray Width" class="version-gray-width form-control col-md-12 col-xs-12" type="text">
                                        </div>

                                        <div class="col-md-1 col-sm-1 col-xs-4">
                                          <input readonly id="<?php echo "finish_width".$i; ?>" name="<?php echo "finish_width".$i; ?>" value="<?php echo $pp_details_row['finish_width'] ?>" placeholder="Finish Width" class="version-finish-width form-control col-md-12 col-xs-12" type="text">
                                        </div>

                                        <?php 
                                            //greige margin calculation
                                            $greige_width = $pp_details_row['gray_width'];
                                            $finish_width = $pp_details_row['finish_width'];
                                            $greige_margin = (($greige_width - $finish_width) / $greige_width) * 100;
                                        ?>

                                        <div class="col-md-1 col-sm-1 col-xs-4">
                                          <input readonly value="<?php echo $pp_details_row['process_line']; ?>" class="form-control col-md-12 col-xs-12" type="text">
                                        </div>

                                        <div class="col-md-1 col-sm-1 col-xs-2">
                                            <input readonly id="<?php echo "fiber_cotton".$i; ?>" name="<?php echo "fiber_cotton".$i; ?>" value="<?php echo $pp_details_row['fiber_cotton'] ?>" class="version-fiber-cotton form-control col-md-6 col-xs-6" type="text">
                                        </div>

                                        <div class="col-md-1 col-sm-1 col-xs-2">
                                            

                                            <input readonly id="<?php echo "fiber_polyster".$i; ?>" name="<?php echo "fiber_polyster".$i; ?>" value="<?php echo $pp_details_row['fiber_polyster'] ?>" class="version-fiber-polyster form-control col-md-6 col-xs-6" type="text">
                                        </div>

                                        <div class="col-md-1 col-sm-1 col-xs-2">
                                           <input readonly type="text" id="fiber_others_value" name="fiber_others_value" value="<?php echo $pp_row['fiber_others_value']; ?>" placeholder="Others Value %" oninput="fiber_head()" class="fiber_others_value_issue form-control col-md-7 col-xs-12">
                                             <br/>
                                            <input readonly id="<?php echo "fiber_others".$i; ?>" name="<?php echo "fiber_others".$i; ?>" value="<?php echo $pp_details_row['fiber_others_value'] ?>" class="version-fiber-others form-control col-md-6 col-xs-6" type="text">
                                        </div>

                                        <div class="col-md-1 col-sm-1 col-xs-2">
                                          <input readonly id="<?php echo "quantity".$i; ?>" name="<?php echo "quantity".$i; ?>" value="<?php echo $pp_details_row['quantity'] ?>" placeholder="Order Quantity" class="version-quantity date-picker form-control col-md-12 col-xs-12" type="text">
                                        </div>

                                        <!-- <div class="col-md-2 col-sm-2 col-xs-4">
                                          <form id="go_to_acceptance_criteria_form" name="go_to_acceptance_criteria_form">
                                            <input type="hidden" id="<?php echo "pp_no_id".$i; ?>" name="<?php echo "pp_no_id".$i; ?>" value="<?php echo $pp_row['pp_no']; ?>">
                                            <input type="hidden" id="<?php echo "pp_details_id".$i; ?>" name="<?php echo "pp_details_id".$i; ?>" value="<?php echo $pp_details_row['pp_id']; ?>">
                                            <button type="button" onClick="go_to_acceptance_criteria(<?php echo $i; ?>)" class="btn btn-xs btn-info">Route issue and Acceptance</button>
                                          </form>
                                        </div> -->

                                        <div class="col-md-1 col-sm-1 col-xs-4">
                                          <form action="route_issue_define.php" method="post" target="_blank">
                                            <input type="hidden" id="pp_no_id" name="pp_no_id" value="<?php echo $pp_row['pp_id']; ?>">
                                            <input type="hidden" id="pp_details_id" name="pp_details_id" value="<?php echo $pp_details_row['pp_id']; ?>">
                                            <input type="submit" name="submit" value="Standard" />
                                          </form>
                                        </div>

                                      </div>


                                    <?php
                                    ++$i;
                                  }
                                    
                                //}
                              ?>

                              <div style="margin-left: 280px !important;" class="text-center"> Total Order Quantity = <?php echo $total_amount; ?> </div>
                              <div class="col-md-1 col-sm-1 col-xs-4">
                                <form action="route_issue_define_only_pp.php" method="post" target="_blank">
                                  <input type="hidden" id="pp_no_id" name="pp_no_id" value="<?php echo $pp_row['pp_id']; ?>">
                                  <input type="submit" name="submit" value="All Version Standard" />
                                </form>
                              </div>
                            </div>
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