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
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="process_program_info">PP Creation Date <span class="required">*</span>
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
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="process_program_info">PP Number <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="process_program_info" name="process_program_info" class="pp_issue form-control col-md-7 col-xs-12">
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
                                  $customer_sql = "SELECT * FROM customer ORDER BY customer_name";
                                  $customer_res = mysqli_query($con, $customer_sql) or die(mysqli_error($con));
                                  while ($customer_row = mysqli_fetch_assoc($customer_res)) 
                                  {
                                      echo "<option value='".$customer_row['customer_id']."'>";
                                      echo $customer_row['customer_name'];
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
                                  $process_sql = "SELECT * FROM process_name ORDER BY process_name";
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
                              <input type="text" id="design" name="design"  class="design_issue form-control col-md-7 col-xs-12">
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
                                $sql_for_process_program_info = "SELECT * FROM process_program_info";
                                $res_for_process_program_info = mysqli_query($con, $sql_for_process_program_info);
                                $s1 = 1;
                                while ($row = mysqli_fetch_assoc($res_for_process_program_info)) 
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

                                    $sql_for_customer = "SELECT customer_name FROM customer WHERE customer_id = '$customer_id'";
                                    $res_for_customer = mysqli_query($con, $sql_for_customer);
                                    $row_for_customer = mysqli_fetch_assoc($res_for_customer);
                                    echo $row_for_customer['customer_name'];
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
                                    else if (data == "Data Not Inserted In process_program_info")
                                    {
                                      info_alert("Data Not Inserted In process_program_info");
                                    }
                                    else if (data == "Data Not Inserted In process_program_info Detsils")
                                    {
                                      info_alert("Data Not Inserted In process_program_info Detsils");
                                    }
                                    else
                                    {
                                      success_alert("All Data Save Successfully", "../pp_new/pp_create_form_without_version.php?pp_no="+data);
                                    }
                                  } 
                                });
                              });
                              
                          });

                      

                      </script>




</body>
</html>
