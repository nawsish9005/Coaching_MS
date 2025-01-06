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
                        <li><a href="../pp_new/pp_create_form_without_version.php">Process Program List</a></li>
                        <li>PP (Process Program) Edit</li>
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
                                <input type='text' class="date_issue form-control" id="custom_date" name="custom_date" value="<?php echo $pp_row['issue_date']; ?>"/>
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
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="pp_desc">PP Description 
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="pp_desc" name="pp_desc" value="<?php echo $pp_row['pp_desc']; ?>" class="pp_desc_issue form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="customer">Customer <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <select id="customer" name="customer" class="customer_issue select2 form-control col-md-12 col-xs-12">
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
                              <input type="hidden" id="pp_no_id" name="pp_no_id" value="<?php echo $pp_row['pp_id']; ?>">
                              <input type="hidden" value="<?php echo $number_row; ?>" id="row-counter" name="row-counter" class="form-control col-md-7 col-xs-12">
                              <input type="hidden" value="<?php echo $number_row; ?>" id="row-name-counter" name="row-name-counter" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="greige_demand">Greige Demand No <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="greige_demand" name="greige_demand" value="<?php echo $pp_row['greige_demand']; ?>" class="greige_demand_issue form-control col-md-7 col-xs-12">
                            </div>
                          </div>


                         <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="week">Total Weeks 
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="week" name="week" value="<?php echo $pp_row['week']; ?>" class="week_issue form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="design">Design <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="design" name="design" value="<?php echo $pp_row['design']; ?>" class="design_issue form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                         <!--  <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="construction">Construction <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="construction" name="construction" value="<?php echo $pp_row['construction']; ?>" oninput="construction_head()" class="construction_issue form-control col-md-7 col-xs-12">
                            </div>

 -->
                            
                             <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="construction">Construction
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <select id="construction" name="construction" onchange="construction_head()" class="construction_issue select2 form-control col-md-12 col-xs-12">
                                <option value="" selected="selected"><?php echo $pp_row['construction']; ?> </option>
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
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fiber">Fiber Content
                            </label>
                            <div class="col-md-2 col-sm-2 col-xs-4">
                              <input type="text" id="fiber_cotton" name="fiber_cotton" value="<?php echo $pp_row['fiber_cotton']; ?>" placeholder="Cotton %" oninput="fiber_head()"  class="fiber_cotton_issue form-control col-md-7 col-xs-12">
                            </div>
                            <div class="col-md-2 col-sm-2 col-xs-46">
                              <input type="text" id="fiber_polyster" name="fiber_polyster" value="<?php echo $pp_row['fiber_polyster']; ?>" placeholder="Ployster %" oninput="fiber_head()" class="fiber_polyster_issue form-control col-md-7 col-xs-12">
                            </div>
                            <div class="col-md-2 col-sm-2 col-xs-46">
                              <input type="text" id="fiber_others_name" name="fiber_others_name" value="<?php echo $pp_row['fiber_others_name']; ?>" placeholder="Others Name %" class="fiber_others_name_issue form-control col-md-7 col-xs-12">
                            </div>
                            <div class="col-md-2 col-sm-2 col-xs-46">
                              <input type="text" id="fiber_others_value" name="fiber_others_value" value="<?php echo $pp_row['fiber_others_value']; ?>" placeholder="Others Value %" oninput="fiber_head()" class="fiber_others_value_issue form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="process">Process Technique(Program Type)
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <select id="process" name="process" class="process_issue select2 form-control col-md-12 col-xs-12">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="process">Process Technique(Program Type) <span class="required">*</span>
                                <option value="" selected="selected">Select Program Type</option>
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


                          <div class="ln_solid"></div>
                            <div class="form-group">
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <button type="button" name="submit" id="submit" class="btn btn-success">Save</button>
                              </div>
                            </div>
                        <!-- </form> -->
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
        
    }

    function process_head()
    {
     
    }

    function fiber_head()
    {

    }

    function varify_fiber()
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
      
		
	</script>

  <script type="text/javascript">


  $(document).ready(function() 
  { 
      $('#myDatepicker').datetimepicker(
      {
        format: 'DD.MM.YYYY'
      });

      $('#submit').click(function()
      {
         
            var formdata = new FormData(document.getElementById('pp_fixed_data_form'));

           

            $.ajax(
            {
              type: "POST",
              url: "edit_pp_saving_without_version.php",
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
                else if (data == "No Process Found")
                {
                  info_alert("No Process Found");
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
                  success_alert("All Data Saved Successfully", "../pp_new/pp_create_form_without_version.php");
                  //window.location = 'pp_details_list.php';
                }
              } 
            });
          });
          
      });

  

  </script>

  

</body>
</html>
