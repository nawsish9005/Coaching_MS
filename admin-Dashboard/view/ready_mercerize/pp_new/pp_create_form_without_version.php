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
                        <h2>PP Create Form</h2>
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
                              <textarea type="text" id="pp_desc" rows="2" name="pp_desc" class="pp_desc_issue form-control col-md-7 col-xs-12"> </textarea>
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

                          <!-- <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="process">Process Technique (Program Type) 
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

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="greige_demand">Greige Demand No <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="greige_demand" name="greige_demand" class="greige_demand_issue form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="week">Week (YYWW)
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="week" name="week" class="week_issue form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <!-- <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="construction">Construction Method
                            </label> -->
                            <!-- <div class="col-md-6 col-sm-6 col-xs-12">
                              <select disabled id="construction" name="construction" onchange="construction_head()" class="construction_issue select2 form-control col-md-12 col-xs-12">
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
                            </div> -->

                            <!-- <div class="col-md-6 col-sm-6 col-xs-6">
                              <select id="con" name="construction_standard" class="construction_standard form-control col-md-12 col-xs-12">
                                <option value="spi" selected="selected">SPI</option>
                                <option value="dpi" >DPI</option>
                              </select> 
                            </div>
                          </div> -->

                          <!-- <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fiber">Fiber Content
                            </label>
                            <div class="col-md-2 col-sm-2 col-xs-4">
                              <input readonly type="text" id="fiber_cotton" name="fiber_cotton" placeholder="Cotton %" oninput="fiber_head()"  class="fiber_cotton_issue form-control col-md-7 col-xs-12">
                            </div>
                            <div class="col-md-2 col-sm-2 col-xs-46">
                              <input readonly type="text" id="fiber_polyster" name="fiber_polyster" placeholder="Polyster %" oninput="fiber_head()" class="fiber_polyster_issue form-control col-md-7 col-xs-12">
                            </div>
                            <div class="col-md-2 col-sm-2 col-xs-46">
                              <input readonly type="text" id="fiber_others_name" name="fiber_others_name" placeholder="Others Name %" class="fiber_others_name_issue form-control col-md-7 col-xs-12">
                            </div>
                            <div class="col-md-2 col-sm-2 col-xs-46">
                              <input readonly type="text" id="fiber_others_value" name="fiber_others_value" placeholder="Others Value %" oninput="fiber_head()" class="fiber_others_value_issue form-control col-md-7 col-xs-12">
                            </div>
                          </div> -->

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="design">Design <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="design" name="design" oninput="varify_fiber()" class="design_issue form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          
                           <div class="ln_solid"></div>
                            <div class="form-group">
                              <div class=" col-md-offset-3 col-sm-6 col-xs-12">
                                <button type="button" name="submit" id="submit" class="btn btn-success" >Submit</button>
                              </div>
                            </div>
                        <!-- </form> -->
                      </div>
                    </div>
                  </div>
                </div>
                <!-- main content finished -->
                <div class="clearfix"></div>

                <div class="row">
                   <div class="col-md-12 col-sm-12 col-xs-12">
                      <div class="x_panel">
                        <div class="x_title">
                          
                          <div class="clearfix"></div>
                          <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" id="process_selection" name="process_selection">
                              
                          </form>
                          <?php

                            $sql_for_pp = "SELECT * FROM pp ORDER BY pp_id DESC"; 

                            if (isset($_REQUEST['submit_btn'])) 
                            {                               
                                $process_position_selection = $_POST['process_position_selection'];

                                if ($_POST['process_position_selection'] == 'all') 
                                {
                                    $sql_for_pp = "SELECT * FROM pp";
                                }

                                elseif ($_POST['process_position_selection'] == 'route_issue') 
                                {
                                    $sql_for_pp = "SELECT DISTINCT pp.* 
                                                     FROM pp, pp_details
                                                     WHERE pp.pp_id = pp_details.pp_no_id
                                                     AND pp_details.active = '1'
                                                     AND pp_details.process_route_status = '0'
                                                     ";
                                }

                                elseif ($_POST['process_position_selection'] == 'greige_issue') 
                                {
                                    $sql_for_pp = "SELECT DISTINCT pp.* 
                                                     FROM pp, pp_details
                                                     WHERE pp.pp_id = pp_details.pp_no_id
                                                     AND pp_details.active = '1'
                                                     AND pp_details.greige_receive_status = '0'
                                                     ";
                                }

                                elseif ($_POST['process_position_selection'] == 'process') 
                                {
                                    $sql_for_pp = "SELECT DISTINCT pp.* 
                                                     FROM pp, pp_details, greige_issunce, route_issue
                                                     WHERE pp.pp_id = greige_issunce.pp_no_id
                                                     AND pp.pp_id = pp_details.pp_no_id
                                                     AND pp_details.pp_id = greige_issunce.pp_details_id
                                                     AND greige_issunce.greige_issunce_id = route_issue.greige_issunce_id
                                                     AND pp_details.active = '1'
                                                     AND greige_issunce.active = '1'
                                                     AND route_issue.active = '1'
                                                     ";
                                }

                                elseif ($_POST['process_position_selection'] == 'complete')
                                {
                                    // $sql_for_pp = "SELECT DISTINCT pp.* 
                                    //                  FROM pp, pp_details, greige_issunce, route_issue
                                    //                  WHERE pp.pp_id = greige_issunce.pp_no_id
                                    //                  AND pp.pp_id = pp_details.pp_no_id
                                    //                  AND pp_details.pp_id = greige_issunce.pp_details_id
                                    //                  AND greige_issunce.greige_issunce_id = route_issue.greige_issunce_id
                                    //                  AND pp_details.active = '1'
                                    //                  AND greige_issunce.active = '1'
                                    //                  AND route_issue.active = '1'
                                    //                  ";

                                    $sql_for_pp = "";
                                }
                            }
                          ?>
                          <div class="clearfix"></div>
                        </div>

                        <div class="x_title">
                          <h2>Process Program List</h2>
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
                                <th>PP Number</th>
                                <th>PP Creation Date</th>
                                <th>Customer</th>
                                <th>Design</th>
                                <th>Greige Demand No</th>
                                <!-- <th>Construction</th> -->
                                <th>Action</th>
                              </tr>
                            </thead>
                            
                            <tbody>
                              <?php 
                                $res_for_pp = mysqli_query($con, $sql_for_pp);
                                $s1 = 1;
                                while ($row = mysqli_fetch_assoc($res_for_pp)) 
                                {
                                  $pp_id = $row['pp_id'];
                              ?>
                              <tr>
                                <td><?php echo $s1; ?></td>
                                <td><?php echo $row['pp_no'] ?></td>
                                <td><?php echo $row['issue_date'] ?></td>
                                <td>
                                  <?php 
                                    $customer_id = $row['customers'];
                                    $sql_for_customer = "SELECT customers_name FROM customers WHERE customers_id = '$customer_id'";
                                    $res_for_customer = mysqli_query($con, $sql_for_customer);
                                    $row_for_customer = mysqli_fetch_assoc($res_for_customer);
                                    echo $row_for_customer['customers_name'];
                                  ?>
                                </td>
                                <td><?php echo $row['design'] ?></td>
                                <td><?php echo $row['greige_demand'] ?></td>
                                <!-- <td><?php echo $display ?></td> -->
                                
                                <td>
                                  <form method="get" style="display: inline-block;">
                                    <input type="hidden" id="pp_no" name="pp_no" value="<?php echo $row['pp_no']; ?>">
                                    <button type="button" class="btn btn-primary btn-xs"><a href='../pp_new/pp_edit_without_version.php?pp_no=<?php echo $row['pp_no']; ?>' style="color:white"> Edit </a></button>
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

                <!-- main content again -->
               
                            
                           
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
                          $('#myDatepicker2').datetimepicker(
                          {
                            format: 'DD.MM.YYYY'
                          });

                          $('#submit').click(function()
                          {
                             
                                var formdata = new FormData(document.getElementById('pp_fixed_data_form'));

                               

                                $.ajax(
                                {
                                  type: "POST",
                                  url: "pp_saving_without_version.php",
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
                                      success_alert("All Data Save Successfully", "../pp_new/pp_create_form_without_version.php?pp_no="+data);
                                      //window.location = 'pp_details_list.php';
                                    }
                                  } 
                                });
                              });
                              
                          });

                      

                      </script>




</body>
</html>
