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
            <div class="right_col" role="main" style="margin-bottom: 10px;">
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
                        <form id="demo-form2" action="" method="post" data-parsley-validate class="form-horizontal form-label-left">
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="customer">Process Program <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <select id="pp_no_select" name="pp_no_select" class="select2 pp_number form-control col-md-12 col-xs-12">
                                <option value="" selected="selected">Select PP Number</option>
                                <?php
                                  $pp_sql = "SELECT DISTINCT pp_no FROM pp ORDER BY pp_no";
                                  $pp_res = mysqli_query($con, $pp_sql) or die(mysqli_error($con));
                                  while ($pp_row = mysqli_fetch_assoc($pp_res)) 
                                  {
                                      echo "<option value='".$pp_row['pp_no']."'>";
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
                              <button type="submit" name="submit" id="submit" class="btn btn-success">Submit</button>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                  
                  <?php
                    $pp_no = $_POST['pp_no_select'];

                    if ($pp_no == "" || is_null($pp_no) || empty($pp_no)) {
                      
                    }

                    else
                    {
                      
                    ?>
                       <div class="col-md-12 col-sm-12 col-xs-12">
                          <div class="x_panel">
                            <div class="x_title">
                              <h2>PP Number</h2>
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
                                    <th>Route</th>
                                    <th>Process/Reprocess</th>
                                    <th>Action</th>
                                  </tr>
                                </thead>
                                
                                <tbody>
                                  <?php 
                                    $s1 = 1;
                                    $sql_for_pp = "SELECT *
                                                   FROM route_issue  
                                                   WHERE pp_no = '$pp_no'
                                                   AND complete = '0'
                                                   AND route = '2'
                                                   ORDER BY process_number DESC
                                                   ";



                                    $res_for_pp = mysqli_query($con, $sql_for_pp);

                                    while ($row = mysqli_fetch_assoc($res_for_pp)) 
                                    {
                                  ?>
                                  <tr>
                                    <td><?php echo $s1; ?></td>
                                    <td><?php echo $row['pp_no'] ?></td>
                                    <td>
                                      <?php 
                                        $route_id = $row['route'];
                                        $sql_for_route = "SELECT route_name FROM route WHERE route_id = '$route_id'";
                                        $res_for_route = mysqli_query($con, $sql_for_route);
                                        $row_for_route = mysqli_fetch_assoc($res_for_route);
                                        echo $row_for_route['route_name'];
                                      ?>
                                    </td>
                                    <td><?php echo $row['process'] ?></td>
                                    <td>
                                      <form action="add_bleaching.php" method="post" style="display: inline;">
                                        <input type="hidden" id="gray_issue_id" name="gray_issue_id" value="<?php echo $row['gray_issue_id']; ?>">
                                        <input type="hidden" id="pp_no" name="pp_no" value="<?php echo $row['pp_no']; ?>">
                                        <button type="submit" id="select_route_btn" name="select_route_btn" class="btn btn-primary btn-xs"> Add Scouring </button>
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

</body>
</html>