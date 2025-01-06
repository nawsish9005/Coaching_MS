<?php
session_start();
require_once("../includes/db_session_chk.php");
?>

<!DOCTYPE html>
<html lang="en">

<?php
require_once('../includes/header.php');
?>

<!-- Bootstrap -->
<link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Font Awesome -->
<link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
<!-- NProgress -->
<link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
<!-- iCheck -->
<link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
<!-- bootstrap-wysiwyg -->
<link href="../vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">
<!-- Select2 -->
<link href="../vendors/select2/dist/css/select2.min.css" rel="stylesheet">
<!-- Switchery -->
<link href="../vendors/switchery/dist/switchery.min.css" rel="stylesheet">
<!-- starrr -->
<link href="../vendors/starrr/dist/starrr.css" rel="stylesheet">
<!-- bootstrap-daterangepicker -->
<link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

<!-- Custom Theme Style -->
<link href="../build/css/custom.min.css" rel="stylesheet">

</head>
<body class="nav-md">
    <div class="container body">
        <div class="main_container">

            <?php
            require_once('../includes/sidebar.php');
            require_once('../includes/top_nav.php');
            ?>

            <!-- page content -->
            <div class="right_col" role="main" style="margin-bottom: 50px;">
              <div class="">
                <div class="page-title">
                  <div class="title_left">
                    <ol class="breadcrumb">
                    </ol>
                  </div>
                </div>

                <!-- main content again -->
                <div class="clearfix"></div>
                <div class="row">
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                      <div class="x_title">
                        <h2>Route Issue</h2>
                        <ul class="nav navbar-right panel_toolbox">
                          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                          </li>
                        </ul>
                        <div class="clearfix"></div>
                      </div>
                      <div class="x_content">
                        <br />
                        <form id="demo-form2" action="" method="get" data-parsley-validate class="form-horizontal form-label-left">
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="customer">Process Program <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <select id="pp_no_id" name="pp_no_id" class="select2 pp_number form-control col-md-12 col-xs-12">
                                <option value="" selected="selected">Select PP Number</option>
                                <?php
                                  $pp_sql = "SELECT DISTINCT pp_no, pp_id FROM pp ORDER BY pp_no";
                                  $pp_res = mysqli_query($con, $pp_sql) or die(mysqli_error($con));
                                  while ($pp_row = mysqli_fetch_assoc($pp_res)) 
                                  {
                                      echo "<option value='".$pp_row['pp_id']."'>";
                                      echo $pp_row['pp_no'];
                                      echo "</option>";
                                  }
                                ?>
                              </select>
                            </div>
                          </div>
                          <div class="ln_solid"></div>
                          <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                              <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                  
                  <?php
                    $pp_no_id = $_GET['pp_no_id'];

                    if ($pp_no_id == "" || is_null($pp_no_id) || empty($pp_no_id)) {
                      
                    }

                    else
                    {
                      
                    ?>

                      <!-- main content again -->
                      <div class="col-md-12 col-sm-12 col-xs-12">
                          <div class="x_content">
                            <table class="table table-striped table-bordered">
                              <thead>
                                <tr>
                                  <th>SI</th>
                                  <th>PP Number</th>
                                  <th>Issue Date</th>
                                  <th>Customer</th>
                                  <th>Construction</th>
                                  <th>Week</th>
                                  <th>Quantity</th>
                                </tr>
                              </thead>
                              
                              <tbody>
                                <?php 
                                  $sql_for_pp = "SELECT pp.*

                                                 FROM pp

                                                 WHERE pp.pp_id = '$pp_no_id' ";

                                  $res_for_pp = mysqli_query($con, $sql_for_pp);

                                  $row = mysqli_fetch_array($res_for_pp)
                                ?>
                                <tr>
                                  <td>1</td>
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
                                  <td><?php echo $row['construction'] ?></td>
                                  <td><?php echo $row['week'] ?></td>
                                  <td>
                                    <?php 
                                      $sql_for_total_quantity = "SELECT SUM(quantity) AS total_quantity FROM pp_details WHERE pp_no_id = '$pp_no_id'";
                                      $res_for_total_quantity = mysqli_query($con, $sql_for_total_quantity);
                                      $row_for_total_quantity = mysqli_fetch_assoc($res_for_total_quantity);
                                      echo $row_for_total_quantity['total_quantity'];
                                    ?>
                                  </td>                            
                                </tr>
                              </tbody>
                            </table>
                          </div>
                        </div>


                       <div class="col-md-12 col-sm-12 col-xs-12">
                          <div class="x_panel">
                            <div class="x_title">
                              <h2>PP Number: <span style="color:red;"> <?php echo $row['pp_no'] ?> </span></h2>
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
                                    <th>Version</th>
                                    <th>Color</th>
                                    <th>Gray Width</th>
                                    <th>Receive Quantity</th>
                                    <th>Yarn Warp</th>
                                    <th>Yarn Weft</th>
                                    <th>Thread EPI</th>
                                    <th>Thread PPI</th>
                                    <th>Fiber Warp</th>
                                    <th>Fiber Weft</th>
                                    <th>GSM</th>
                                    <th>Action</th>
                                  </tr>
                                </thead>
                                
                                <tbody>
                                  <?php 
                                    $s1 = 1;
                                    $sql_for_pp = "SELECT greige_issunce.*, pp_details.*
                                                   FROM greige_issunce , pp_details
                                                   WHERE greige_issunce.pp_no_id = '$pp_no_id'
                                                   AND greige_issunce.status = '1'
                                                   AND greige_issunce.active = '1'
                                                   AND pp_details.pp_no_id = greige_issunce.pp_no_id
                                                   AND pp_details.id = greige_issunce.pp_details_id
                                                   ";



                                    $res_for_pp = mysqli_query($con, $sql_for_pp);

                                    while ($row = mysqli_fetch_assoc($res_for_pp)) 
                                    {
                                  ?>
                                  <tr>
                                    <td><?php echo $s1; ?></td>
                                    <td><?php echo $row['version'] ?></td>
                                    <td>
                                      <?php 
                                        $color_id = $row['color'];
                                        $sql_for_color = "SELECT color_name FROM color WHERE color_id = '$color_id'";
                                        $res_for_color = mysqli_query($con, $sql_for_color);
                                        $row_for_color = mysqli_fetch_assoc($res_for_color);
                                        echo $row_for_color['color_name'];
                                      ?>
                                    </td>
                                    <td><?php echo $row['gray_width'] ?></td>
                                    <td><?php echo $row['received_quantity'] ?></td>
                                    <td><?php echo $row['yarn_warp'] ?></td>
                                    <td><?php echo $row['yarn_weft'] ?></td>
                                    <td><?php echo $row['thread_epi'] ?></td>
                                    <td><?php echo $row['thread_ppi'] ?></td>
                                    <td><?php echo $row['fiber_warp'] ?></td>
                                    <td><?php echo $row['fiber_weft'] ?></td>
                                    <td><?php echo $row['gsm'] ?></td>
                                    <td>
                                      <?php 
                                        $greige_issunce_id  = $row['greige_issunce_id'];
                                        $sql_for_greige_issunce = "SELECT * FROM route_issue WHERE greige_issunce_id = '$greige_issunce_id' AND active = '1' ";
                                        $res_for_greige_issunce = mysqli_query($con, $sql_for_greige_issunce);
                                        $row_for_greige_issunce = mysqli_num_rows($res_for_greige_issunce);
                                        if ($row_for_greige_issunce <= 0) {
                                          ?>
                                            <form action="add_route_issue.php" method="post" style="display: inline;">
                                              <input type="hidden" id="greige_issunce_id" name="greige_issunce_id" value="<?php echo $greige_issunce_id ?>">
                                              <input type="hidden" id="pp_no_id" name="pp_no_id" value="<?php echo $pp_no_id ?>">
                                              <input type="hidden" id="pp_details_id" name="pp_details_id" value="<?php echo $row['pp_details_id'] ?>">
                                              <button type="submit" id="select_route_btn" name="select_route_btn" class="btn btn-primary btn-xs"> Route Selection </button>
                                            </form>
                                          <?php
                                        }

                                        if ($row_for_greige_issunce >= 1) {
                                          ?>
                                            <form action="edit_route_issue.php" method="post" style="display: inline;">
                                              <input type="hidden" id="greige_issunce_id" name="greige_issunce_id" value="<?php echo $greige_issunce_id ?>">
                                              <input type="hidden" id="pp_no_id" name="pp_no_id" value="<?php echo $pp_no_id ?>">
                                              <input type="hidden" id="pp_details_id" name="pp_details_id" value="<?php echo $row['pp_details_id'] ?>">
                                              <button type="submit" id="select_route_btn" name="select_route_btn" class="btn btn-primary btn-xs"> Edit Route </button>
                                            </form>
                                          <?php
                                        }

                                        if ($row_for_greige_issunce >= 1){
                                          ?>
                                            <form action="view_route_issue.php" method="post" style="display: inline;">
                                              <input type="hidden" id="greige_issunce_id" name="greige_issunce_id" value="<?php echo $greige_issunce_id ?>">
                                              <input type="hidden" id="pp_no_id" name="pp_no_id" value="<?php echo $pp_no_id ?>">
                                              <input type="hidden" id="pp_details_id" name="pp_details_id" value="<?php echo $row['pp_details_id'] ?>">
                                              <button type="submit" id="select_route_btn" name="select_route_btn" class="btn btn-primary btn-xs"> View Route </button>
                                            </form>
                                          <?php
                                        }
                                      ?>
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
                       <?php 
                    }
                    ?>

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

  <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="../vendors/moment/min/moment.min.js"></script>
    <script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap-wysiwyg -->
    <script src="../vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
    <script src="../vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
    <script src="../vendors/google-code-prettify/src/prettify.js"></script>
    <!-- jQuery Tags Input -->
    <script src="../vendors/jquery.tagsinput/src/jquery.tagsinput.js"></script>
    <!-- Switchery -->
    <script src="../vendors/switchery/dist/switchery.min.js"></script>
    <!-- Select2 -->
    <script src="../vendors/select2/dist/js/select2.full.min.js"></script>
    <!-- Parsley -->
    <script src="../vendors/parsleyjs/dist/parsley.min.js"></script>
    <!-- Autosize -->
    <script src="../vendors/autosize/dist/autosize.min.js"></script>
    <!-- jQuery autocomplete -->
    <script src="../vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
    <!-- starrr -->
    <script src="../vendors/starrr/dist/starrr.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>

    <script type="text/javascript">
      $(function () 
      {
          //Initialize Select2 Elements
          $('.select2').select2();
      });
    </script>
</body>
</html>