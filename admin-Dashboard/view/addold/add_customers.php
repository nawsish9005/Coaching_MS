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
                        <!-- <li><a href="../add/customers_list.php">Customers Lists</a></li> -->
                        <li>Settings</li>
                        <li>Add Customer</li>
                    </ol>
                  </div>
                </div>

                <!-- main content again -->
                <div class="row">
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                      <div class="x_title">
                        <h2>Add Customer Form</h2>
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
                              <input type="text" id="customer" name="customer" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="customer_address">Customer Address 
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <!-- <textarea type="text" id="customer_address" name="customer_address" class="form-control" rows="4" cols="50">
                             
                                </textarea> -->

                              <textarea class="form-control" rows="4" id="customer_address" name="customer_address"></textarea>
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="customer_country">Country of Origin
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                               <select id="customer_country" name="customer_country" class="form-control select2 col-md-7 col-xs-12" onchange="">
                                <option value="" selected="selected">Select Country of Origin</option>
                                <?php
                                  $pp_sql = "SELECT DISTINCT name FROM country ORDER BY name";
                                  $pp_res = mysqli_query($con, $pp_sql) or die(mysqli_error($con));
                                  while ($pp_row = mysqli_fetch_assoc($pp_res)) 
                                  {
                                      echo "<option value='".$pp_row['name']."'>";
                                      echo $pp_row['name'];
                                      echo "</option>";
                                  }
                                ?>
                              </select> 
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="key_account_manager">Key Account Manager (ZZ)
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                               <select id="key_account_manager" name="key_account_manager" class="form-control select2 col-md-7 col-xs-12" onchange="">
                                <option value="" selected="selected">Select Key Account Manager</option>
                                <?php
                                  $pp_sql = "SELECT * FROM key_account_manager ORDER BY key_account_manager_name";
                                  $pp_res = mysqli_query($con, $pp_sql) or die(mysqli_error($con));
                                  while ($pp_row = mysqli_fetch_assoc($pp_res)) 
                                  {
                                      echo "<option value='".$pp_row['key_account_manager_id']."'>";
                                      echo $pp_row['key_account_manager_name'];
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
                          <h2>Customers</h2>
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
                                <th>Customer Name</th>
                                <th>Customer Address</th>
                                <th>Country of Origin</th>
                                <th>Key Account Manager (ZZ)</th>
                                <th>Key Account Manager Phone No</th>
                                <th>Action</th>
                              </tr>
                            </thead>
                            
                            <tbody>
                              <?php 
                                $s1 = 1;
                                $sql_for_customers = "SELECT * FROM customers";

                                $res_for_customers = mysqli_query($con, $sql_for_customers);

                                while ($row = mysqli_fetch_assoc($res_for_customers)) 
                                {
                              ?>
                              <tr>
                                <td><?php echo $s1; ?></td>
                                <td><?php echo $row['customers_name'] ?></td>
                                <td><?php echo $row['customer_address'] ?></td>
                                <td><?php echo $row['customer_country'] ?></td>

                                <!-- <td><?php echo $row['key_account_manager'] ?></td> -->

                                <td>
                                  <?php 
                                    $key_account_manager_id = $row['key_account_manager'];
                                    $sql_for_key_account_manager = "SELECT key_account_manager_name, phone_number FROM key_account_manager WHERE key_account_manager_id = '$key_account_manager_id'";
                                    $res_for_key_account_manager = mysqli_query($con, $sql_for_key_account_manager);
                                    $row_for_key_account_manager = mysqli_fetch_assoc($res_for_key_account_manager);
                                    echo $row_for_key_account_manager['key_account_manager_name'];
                                  ?>
                                </td>

                                <td>
                                    <?php 
                                      echo $row_for_key_account_manager['phone_number'];
                                    ?>
                                </td>

                                <td>
                                  <form action="edit_customers.php" method="post" style="display: inline;">
                                    <input type="hidden" id="customers_id" name="customers_id" value="<?php echo $row['customers_id']; ?>">
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
        /* if(document.getElementById("customer_address").value == "")
          {
              missing_alert("customer_address");
              return false;
          }
          if(document.getElementById("customer_country").value == "")
          {
              missing_alert("customer_country");
              return false;
          }
          if(document.getElementById("phone_number").value == "")
          {
              missing_alert("phone_number");
              return false;
          }*/

          else
          {
              var formdata = new FormData(document.getElementById('add_customer_form'));
              $.ajax({
              type: "POST",
              url: "add_customer_saving.php",// where you wanna post
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