<?php
session_start();
require_once("../includes/db_session_chk.php");
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
                        <li>PP (Process Program) Creation</li>
                    </ol>
                  </div>
                </div>

                <!-- main content again -->
                <div class="clearfix"></div>
                <div class="row">
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                      <div class="x_title">
                        <h2>PP Information (Header)</h2>
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
                                <input type='text' class="date_issue form-control" id="custom_date" name="custom_date"/>
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
                              <input type="text" id="pp" name="pp" class="pp_issue form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="pp_desc">PP Description
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <TEXTAREA type="text" id="pp_desc" name="pp_desc" class="pp_desc_issue form-control col-md-7 col-xs-12" rows="2"></TEXTAREA>
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="customer">Customer <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <select id="customer" name="customer" class="customer_issue select2 form-control col-md-12 col-xs-12">
                                <option value="" selected="selected">Select Customer</option>
                                <?php
                                  $customers_sql = "SELECT * FROM customers ORDER BY customers_name";
                                  $customers_res = mysqli_query($con, $customers_sql) or die(mysqli_error($con));
                                  while ($customers_row = mysqli_fetch_assoc($customers_res)) 
                                  {
                                      echo "<option value='".$customers_row['customers_id']."'>";
                                      echo $customers_row['customers_name'];
                                      echo "</option>";
                                  }
                                ?>
                              </select>

                              <input type="hidden" value="1" id="row-counter" name="row-counter" class="form-control col-md-7 col-xs-12">
                              <input type="hidden" value="1" id="row-name-counter" name="row-name-counter" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="greige_demand">Greige Demand No <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="greige_demand" name="greige_demand" class="greige_demand_issue form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="week">Total Weeks
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="week" name="week" class="week_issue form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <!-- <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="construction">Construction <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                             
                              <select id="construction" name="construction" onchange="construction_head()" class="construction_issue select2 form-control col-md-12 col-xs-12">
                                <option value="" selected="selected">Select Construction </option>
                                <?php
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

                                      echo "<option value='".$construction_row['construction_id']."'>";
                                      echo $display;
                                      echo "</option>";
                                  }
                                ?>
                              </select>
                            </div>

                            <div class="col-md-2 col-sm-2 col-xs-4">
                              <select id="con" name="construction_standard" class="construction_standard form-control col-md-12 col-xs-12">
                                <option value="spi" selected="selected">SPI</option>
                                <option value="dpi" >DPI</option>
                              </select> 
                            </div>
                          </div> -->

                         <!--  <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fiber">Fiber Content <span class="required">*</span>
                            </label>
                            <div class="col-md-2 col-sm-2 col-xs-4">
                              <input type="text" id="fiber_cotton" name="fiber_cotton" placeholder="Cotton %" oninput="fiber_head()"  class="fiber_cotton_issue form-control col-md-7 col-xs-12">
                            </div>
                            <div class="col-md-2 col-sm-2 col-xs-46">
                              <input type="text" id="fiber_polyster" name="fiber_polyster" placeholder="Polyster %" oninput="fiber_head()" class="fiber_polyster_issue form-control col-md-7 col-xs-12">
                            </div>
                            <div class="col-md-2 col-sm-2 col-xs-46">
                              <input type="text" id="fiber_others_name" name="fiber_others_name" placeholder="Others Name %" class="fiber_others_name_issue form-control col-md-7 col-xs-12">
                            </div>
                            <div class="col-md-2 col-sm-2 col-xs-46">
                              <input type="text" id="fiber_others_value" name="fiber_others_value" placeholder="Others Value %" oninput="fiber_head()" class="fiber_others_value_issue form-control col-md-7 col-xs-12">
                            </div>
                          </div>
                          -->
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="design">Design <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="design" name="design" class="design_issue form-control col-md-7 col-xs-12">
                            </div>
                          </div> 

                         <!--  <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="process">Process Technique (Program Type) <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <select id="process" name="process" onchange="process_head()" class="process_issue select2 form-control col-md-12 col-xs-12">
                                <option value="" selected="selected">Select Process Technique (Program Type)</option>
                                <?php
                                  $process_sql = "SELECT * FROM process ORDER BY process_name";
                                  $process_res = mysqli_query($con, $process_sql) or die(mysqli_error($con));
                                  while ($process_row = mysqli_fetch_assoc($process_res)) 
                                  {
                                      echo "<option value='".$process_row['process_id']."'>";
                                      echo $process_row['process_name'];
                                      echo "</option>";
                                  }
                                ?>
                              </select>
                            </div>
                          </div> -->
                        <!-- </form> -->
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
                                    <label class="control-label">Gray Width (Inch) <span class="required">*</span>
                                    </label>
                                  </div>

                                  <div class="col-md-1 col-sm-1 col-xs-4">
                                    <label class="control-label">Finish Width (Inch) <span class="required">*</span>
                                    </label>
                                  </div>

                                  <div class="col-md-2 col-sm-2 col-xs-4">
                                    <label class="control-label">Process Technique <br/> (Program Type) <span class="required">*</span>
                                    </label>
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
                                    <label class="control-label" for="quantity">Quantity (Meter) <span class="required">*</span>
                                    </label>
                                  </div>
                              </div>


                              <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="col-md-1 col-sm-1 col-xs-4">
                                  <!-- <input id="version1" name="version1" placeholder="Version" class="version-class date-picker form-control col-md-12 col-xs-12" type="text"> -->

                                  <select id="version1" name="version1" class="version-class select2 form-control col-md-12 col-xs-12">
                                    <option value="" selected="selected">Select Version</option>
                                    <?php
                                      $sql = "SELECT * FROM version";
                                      $res = mysqli_query($con, $sql) or die(mysqli_error($con));
                                      while ($row = mysqli_fetch_assoc($res)) 
                                      {
                                          echo "<option value='".$row['version_id']."'>";
                                          echo $row['version_name'];
                                          echo "</option>";
                                      }
                                    ?>
                                  </select>
                                </div>

                                <div class="col-md-1 col-sm-1 col-xs-2">
                                  <select id="color1" name="color1" class="version-color select2 form-control col-md-12 col-xs-12">
                                    <option value="" selected="selected">Select Color</option>
                                    <?php
                                      $sql = "SELECT * FROM color ORDER BY color_name";
                                      $res = mysqli_query($con, $sql) or die(mysqli_error($con));
                                      while ($row = mysqli_fetch_assoc($res)) 
                                      {
                                          echo "<option value='".$row['color_id']."'>";
                                          echo $row['color_name'];
                                          echo "</option>";
                                      }
                                    ?>
                                  </select>
                                </div>

                                <div class="col-md-1 col-sm-1 col-xs-2">
                                  <!-- <input type="text" id="construction1" placeholder="Construction" name="construction1" class="version-construction form-control col-md-12 col-xs-12"> -->
                                  

                                  <select id="construction1" name="construction1" class="version-construction select2 form-control col-md-12 col-xs-12">
                                    <option value="" selected="selected">Select Construction</option>
                                    <?php
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

                                          echo "<option value='".$construction_row['construction_id']."'>";
                                          
                                          echo $display;
                                          echo "</option>";
                                      }
                                    ?>
                                  </select>

                                <select id="con" name="construction_standard" class="construction_standard form-control col-md-12 col-xs-12">
                                      <option value="spi" selected="selected">SPI</option>
                                      <option value="dpi" >DPI</option>
                                </select> <br/>

                                </div>

                                <div class="col-md-1 col-sm-1 col-xs-4">
                                  <input id="gray_width1" name="gray_width1" placeholder="Greige" class="version-gray-width form-control col-md-12 col-xs-12" type="text">
                                </div>

                                <div class="col-md-1 col-sm-1 col-xs-4">
                                  <input id="finish_width1" name="finish_width1" placeholder="Finish" class="version-finish-width form-control col-md-12 col-xs-12" type="text">
                                </div>

                                <div class="col-md-2 col-sm-2 col-xs-4">
                                  <select id="process_line1" name="process_line1" class="version-process-line select2 form-control col-md-12 col-xs-12">
                                    <option value="" selected="selected">Select Program Type</option>
                                    <?php
                                      $process_sql = "SELECT * FROM process ORDER BY process_name";
                                      $process_res = mysqli_query($con, $process_sql) or die(mysqli_error($con));
                                      while ($process_row = mysqli_fetch_assoc($process_res)) 
                                      {
                                          echo "<option value='".$process_row['process_id']."'>";
                                          echo $process_row['process_name'];
                                          echo "</option>";
                                      }
                                    ?>
                                  </select>
                                </div>

                                 <div class="col-md-1 col-sm-1 col-xs-2">
                                    <input id="fiber_cotton1" name="fiber_cotton1" placeholder="Cotton" class="version-fiber-cotton form-control col-md-6 col-xs-6" type="text">
                                </div>

                                <div class="col-md-1 col-sm-1 col-xs-2">
                                    <input id="fiber_polyster1" name="fiber_polyster1" placeholder="Polyster" class="version-fiber-polyster form-control col-md-6 col-xs-6" type="text">
                                </div>

                                <div class="col-md-1 col-sm-1 col-xs-2">
                                  <input type="text" id="fiber_others_name" name="fiber_others_name" placeholder="Others Name %" class="fiber_others_name_issue form-control col-md-7 col-xs-12"> <br/>
                                    <input id="fiber_others1" name="fiber_others1" placeholder="Others" class="version-fiber-others form-control col-md-6 col-xs-6" type="text">
                                </div>

                                <div class="col-md-1 col-sm-1 col-xs-4">

                                  <input id="quantity1" name="quantity1" placeholder="Quantity" oninput="fiber_total_content1()" class="version-quantity date-picker form-control col-md-12 col-xs-12" type="text">
                                </div>
                              </div>

                              <div id="new_dropzone_section_version">
                              </div>

                            </div>

                            <button type='button' class="btn-xs btn-success" id='add_version_btn' value='' style="margin-top: 3px;" onclick=''>Add Version</button>
                            
                            <div class="ln_solid"></div>
                            <div class="form-group">
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <button type="button" name="submit" id="submit" class="btn btn-success">Submit</button>
                              </div>
                            </div>
                            </form>
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
    var counter = 1;
    var name_counter = 1;
		$(function () 
    {
        //Initialize Select2 Elements
        //$('.select2').select2();
    });

    function construction_head()
    {
        document.getElementById('construction1').disabled = true; 
    }

    function process_head()
    {
        document.getElementById('process_line1').disabled = true; 
    }

    function fiber_head()
    {
        document.getElementById('fiber_cotton1').readOnly = true; 
        document.getElementById('fiber_polyster1').readOnly = true; 
        document.getElementById('fiber_others1').readOnly = true; 
    }

  /*  function varify_fiber()
    {
        var fiber_cotton_main = parseFloat(document.getElementById('fiber_cotton').value ? document.getElementById('fiber_cotton').value : 0); 
        var fiber_polyster_main = parseFloat(document.getElementById('fiber_polyster').value ? document.getElementById('fiber_polyster').value : 0);  
        var fiber_others_main = parseFloat(document.getElementById('fiber_others_value').value ? document.getElementById('fiber_others_value').value : 0); 

        var fiber_total_main = parseFloat(fiber_cotton_main + fiber_polyster_main + fiber_others_main);
        if (fiber_total_main != 100) 
        {
            info_alert("Fiber content must be 100");
            return false;
        }
    }*/

   /* function fiber_total_content1()
    {
        if ( document.getElementById('fiber_cotton').value || document.getElementById('fiber_polyster').value || document.getElementById('fiber_others_value').value ) 
        {
            
        }

        else
        {
            var fiber_cotton_main = parseFloat(document.getElementById('fiber_cotton1').value ? document.getElementById('fiber_cotton1').value : 0); 
            var fiber_polyster_main = parseFloat(document.getElementById('fiber_polyster1').value ? document.getElementById('fiber_polyster1').value : 0);  
            var fiber_others_main = parseFloat(document.getElementById('fiber_others1').value ? document.getElementById('fiber_others1').value : 0); 

            var fiber_total_main = parseFloat(fiber_cotton_main + fiber_polyster_main + fiber_others_main);
            if (fiber_total_main != 100) 
            {
                info_alert("1st line Fiber content must be 100");
                return false;
            }
        }
        
    }*/

    function fiber_total_content1(id)
    {
         var fiber_cotton_main = parseFloat(document.getElementById('fiber_cotton1').value ? document.getElementById('fiber_cotton1').value : 0); 
            var fiber_polyster_main = parseFloat(document.getElementById('fiber_polyster1').value ? document.getElementById('fiber_polyster1').value : 0);  
            var fiber_others_main = parseFloat(document.getElementById('fiber_others1').value ? document.getElementById('fiber_others1').value : 0); 

            var fiber_total_main = parseFloat(fiber_cotton_main + fiber_polyster_main + fiber_others_main);
            if (fiber_total_main != 100) 
            {
                info_alert("1st line Fiber content must be 100");
                return false;
            }
    }

    function addCounter()
    {
      counter = counter + 1;
      name_counter = name_counter + 1;
      document.getElementById('row-counter').value = counter;
      document.getElementById('row-name-counter').value = name_counter;
    }

    function removeCounter()
    {
      counter = counter - 1;
      document.getElementById('row-counter').value = counter;
    }

    $(document).ready(function() 
    {
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

      //dynamically added selects
      $("#add_version_btn").on("click", function() 
      {
          addCounter();

          var version_id = document.getElementsByName("version"+(name_counter-1))[0].value;
          var color_id = document.getElementsByName("color"+(name_counter-1))[0].value;
          //var gray_width_value = document.getElementsByName("gray_width"+(name_counter-1))[0].value;

          var fiber_cotton_head_value = document.getElementById('fiber_cotton1').readOnly;
          var fiber_polyster_head_value = document.getElementById('fiber_polyster1').readOnly;
          var fiber_others_head_value = document.getElementById('fiber_others1').readOnly;
          var fiber_others_head_value = document.getElementById('fiber_others_name').readOnly;


          var process_technique = document.getElementById('process_line1').readOnly;
          var construction_head_value = document.getElementById('construction1').disabled;



          $.ajax({  
          url:"colorsearch_new.php", 
          data: {color_id: color_id, version_id: version_id}, 
          method:"POST",  
          dataType: "json",
          success:function(data)  
          {
            var color_json = data[0]['color'];
            var process_json = data[0]['process'];
            var version_json = data[0]['version'];
            var construction_json = data[0]['construction'];

            
           

                var dynamically_created_dropzone = $('<div class="full_row col-md-12 col-sm-12 col-xs-12" id="'+counter+'">'
                                                +'<div class="col-md-1 col-sm-1 col-xs-4">'
                                                +'<select id="version'+name_counter+'" name="version'+name_counter+'" class="version-class select2 form-control col-md-12 col-xs-12">'
                                                +'<option value="">Select Version</option>'
                                                +version_json
                                                +'</select>'
                                                +'</div>'
                                                +'<div class="col-md-1 col-sm-1 col-xs-4">'
                                                +'<select id="color'+name_counter+'" name="color'+name_counter+'" class="version-color select2 form-control col-md-12 col-xs-12">'
                                                +'<option value="">Select Color</option>'
                                                +color_json
                                                +'</select>'
                                                +'</div>'

                                                +'<div class="col-md-1 col-sm-1 col-xs-4">'
                                                +'<select id="construction'+name_counter+'" name="construction'+name_counter+'" class="version-construction select2 form-control col-md-12 col-xs-12">'
                                                +'<option value="">Select Construction</option>'
                                                +construction_json
                                                +'</select>'
                                                +' <select id="con'+name_counter+'" name="construction_standard'+name_counter+'" class="construction_standard form-control col-md-12 col-xs-12"><option value="spi" selected="selected">SPI</option><option value="dpi" >DPI</option></select> <br/>'
                                                +'</div>'

                                                +'<div class="col-md-1 col-sm-1 col-xs-4">'
                                                +' <input id="gray_width'+name_counter+'" name="gray_width'+name_counter+'"  placeholder="Greige" class="version-gray-width form-control col-md-12 col-xs-12" type="text">'
                                                +'</div>'
                                                +'<div class="col-md-1 col-sm-1 col-xs-4">'
                                                +' <input id="finish_width'+name_counter+'" name="finish_width'+name_counter+'" placeholder="Finish" class="version-finish-width form-control col-md-12 col-xs-12" type="text">'
                                                +'</div>'

                                                +'<div class="col-md-2 col-sm-2 col-xs-4">'
                                                +'<select id="process_line'+name_counter+'" name="process_line'+name_counter+'" class="version-process-line select2 form-control col-md-12 col-xs-12">'
                                                +'<option value="">Select Program Type</option>'
                                                +process_json
                                                +'</select>'
                                                +'</div>'

                                                +'<div class="col-md-1 col-sm-1 col-xs-4">'
                                                +' <input id="fiber_cotton'+name_counter+'" name="fiber_cotton'+name_counter+'" placeholder="Cotton" class="version-fiber-cotton form-control col-md-12 col-xs-12" type="text">'
                                                +'</div>'

                                                +'<div class="col-md-1 col-sm-1 col-xs-4">'
                                                +' <input id="fiber_polyster'+name_counter+'" name="fiber_polyster'+name_counter+'" placeholder="Polyster" class="version-fiber-polyster form-control col-md-12 col-xs-12" type="text">'
                                                +'</div>'

                                                +'<div class="col-md-1 col-sm-1 col-xs-4">'
                                                +'<input type="text" id="fiber_others_name'+name_counter+'" name="fiber_others_name'+name_counter+'"  placeholder="Others Name %" class="fiber_others_name_issue form-control col-md-7 col-xs-12"> <br/>'
                                                +' <input id="fiber_others'+name_counter+'" name="fiber_others'+name_counter+'" placeholder="Others value" class="version-fiber-others form-control col-md-12 col-xs-12" type="text">'
                                                +'</div>'

                                                +'<div class="col-md-1 col-sm-1 col-xs-4">'
                                                +' <input id="quantity'+name_counter+'" name="quantity'+name_counter+'" placeholder="Quantity" oninput="fiber_total_content('+name_counter+')" class="version-quantity form-control col-md-12 col-xs-12" type="text">'
                                                +'</div>'
                                                +'<div class="col-md-1 col-sm-1 col-xs-2">'
                                                +' <button type="button" class="btn-xs btn-danger btn_remove" id="'+counter+'" onclick="rmv_row(this.id);">X</button>'
                                                +'</div>'
                                                +'</div>');
           

            

            $("#new_dropzone_section_version").append(dynamically_created_dropzone);
            var get_select = $('.select2');
            initializeSelect2(get_select);

          }

        });

      });

    });
		
	</script>

  <script type="text/javascript">

  function rmv_row(row_id)
  {
      $("#"+row_id).remove();
      removeCounter();
  }

  $(document).ready(function() 
  { 
      $('#myDatepicker2').datetimepicker(
      {
        format: 'DD.MM.YYYY'
      });

      $('#submit').click(function()
      {
          var row_counter = document.getElementById("row-counter").value;
          var name_counter = document.getElementById("row-name-counter").value;

          if(document.getElementsByClassName("date_issue")[0].value == "")
          {
              missing_alert_for_class("date_issue", 0);
              return false;
          }
          if(document.getElementsByClassName("pp_issue")[0].value == "")
          {
              missing_alert_for_class("pp_issue", 0);
              return false;
          }
          if(document.getElementsByClassName("greige_demand_issue")[0].value == "")
          {
              missing_alert_for_class("greige_demand_issue", 0);
              return false;
          }
          if(isNaN(document.getElementsByClassName("week_issue")[0].value))
          {
              number_alert_for_class("week_issue", 0);
              return false;
          }
          if(document.getElementsByClassName("design_issue")[0].value == "")
          {
              missing_alert_for_class("design_issue", 0);
              return false;
          }
          if(document.getElementsByClassName("customer_issue")[0].value == "")
          {
              missing_alert_for_class("customer_issue", 0);
              return false;
          }


          else
          {

            for (var i = 0; i < row_counter; i++) 
            {
                if(document.getElementsByClassName("version-class")[i].value == "")
                {
                    missing_alert_for_class("version-class", i);
                    return false;
                }

                if(document.getElementsByClassName("version-color")[i].value == "")
                {
                    missing_alert_for_class("version-color", i);
                    return false;
                }

                if(document.getElementsByClassName("version-gray-width")[i].value == "")
                {
                    missing_alert_for_class("version-gray-width", i);
                    return false;
                }

                if(isNaN(document.getElementsByClassName("version-gray-width")[i].value))
                {
                    number_alert_for_class("version-gray-width", i);
                    return false;
                }

                if(document.getElementsByClassName("version-finish-width")[i].value == "")
                {
                    missing_alert_for_class("version-finish-width", i);
                    return false;
                }

                if(isNaN(document.getElementsByClassName("version-finish-width")[i].value))
                {
                    number_alert_for_class("version-finish-width", i);
                    return false;
                }

                if(document.getElementsByClassName("version-quantity")[i].value == "")
                {
                    missing_alert_for_class("version-quantity", i);
                    return false;
                } 
                 

                

                if(isNaN(document.getElementsByClassName("version-quantity")[i].value))
                {
                    number_alert_for_class("version-quantity", i);
                    return false;
                }
            }

            var formdata = new FormData(document.getElementById('pp_fixed_data_form'));

            for (var i = 1; i <= name_counter; i++) 
            {
                if(document.getElementsByName("version"+i)[0])
                {
                    formdata.append('version'+i,document.getElementsByName("version"+i)[0].value);
                    formdata.append('color'+i,document.getElementsByName("color"+i)[0].value);

                    if (document.getElementsByName("construction"+i)[0]) 
                    {
                        formdata.append('construction'+i,document.getElementsByName("construction"+i)[0].value);
                    }

                    formdata.append('gray_width'+i,document.getElementsByName("gray_width"+i)[0].value);
                    formdata.append('finish_width'+i,document.getElementsByName("finish_width"+i)[0].value);

                    if (document.getElementsByName("fiber_cotton"+i)[0]) 
                    {
                        formdata.append('fiber_cotton'+i,document.getElementsByName("fiber_cotton"+i)[0].value);
                    }
                    
                    if (document.getElementsByName("fiber_polyster"+i)[0]) 
                    {
                        formdata.append('fiber_polyster'+i,document.getElementsByName("fiber_polyster"+i)[0].value);
                    }
                    
                    if (document.getElementsByName("fiber_others"+i)[0]) 
                    {
                        formdata.append('fiber_others'+i,document.getElementsByName("fiber_others"+i)[0].value);
                    }

                    if (document.getElementsByName("process_line"+i)[0]) 
                    {
                        formdata.append('process_line'+i,document.getElementsByName("process_line"+i)[0].value);
                    }
                    
                    formdata.append('quantity'+i,document.getElementsByName("quantity"+i)[0].value);
                }
            }

            $.ajax(
            {
              type: "POST",
              url: "pp_saving_new.php",
              data: formdata,
              processData: false,
              contentType: false,
              error: function(jqXHR, textStatus, errorMessage) 
              {
                  alert(errorMessage);
              },
              success: function(data) 
              {
                if (data == "Few Data Missing")
                {
                  info_alert("Few Data Missing");
                }
                else if (data == "No Customer Found")
                {
                  info_alert("No Customer Found");
                }
                else if (data == "No Color Found")
                {
                  info_alert("No Color Found");
                }
                /*else if (data == "No Process Found")
                {
                  info_alert("No Process Found");
                }*/
                else if (data == "Duplicate PP Number")
                {
                  info_alert("Duplicate PP Number");
                }
                else if (data == "Duplicate Data")
                {
                  info_alert("Duplicate Data");
                }
                else if (data == "Data Not Inserted In PP")
                {
                  info_alert("Data Not Inserted In PP");
                }
                else if (data == "Data Not Inserted In PP Detsils")
                {
                  info_alert("Data Not Inserted In PP Detsils");
                }
                else
                {
                 /* alert(data);*/
                  success_alert("All Data Save Successfully", "../pp/view_pp.php?pp_no="+data);
                  //window.location = 'pp_details_list.php';
                }
              } 
            });
          }
          
      });

  });

  </script>

</body>
</html>
