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
                        <h2>Process Ongoing</h2>
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
                                    <th>Color</th>
                                    <th>Version</th>
                                    <th>Gray Width</th>
                                    <th>Recv. Quantiry</th>
                                    <th>Yarn Count</th>
                                    <th>Thread Count</th>
                                    <th>GSM</th>
                                    <th>Process/Reprocess</th>
                                    <th>Route</th>
                                  </tr>
                                </thead>
                                
                                <tbody>
                                  <?php 
                                    $s1 = 1;
                                    $sql_for_pp = "SELECT route_issue.*, gray_issue.*
                                                   FROM route_issue, gray_issue  
                                                   WHERE route_issue.pp_no = '$pp_no'
                                                   AND route_issue.gray_issue_id = gray_issue.gray_issue_id
                                                   AND route_issue.complete = '0'
                                                   ORDER BY route_issue.process_number ASC
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
                                        $color_id = $row['color'];
                                        $sql_for_color = "SELECT color_name FROM color WHERE color_id = '$color_id'";
                                        $res_for_color = mysqli_query($con, $sql_for_color);
                                        $row_for_color = mysqli_fetch_assoc($res_for_color);
                                        echo $row_for_color['color_name'];
                                      ?>
                                    </td>
                                    <td><?php echo $row['version'] ?></td>
                                    <td><?php echo $row['gray_width'] ?></td>
                                    <td><?php echo $row['received_quantity'] ?></td>
                                    <td><?php echo $row['yarn_count'] ?></td>
                                    <td><?php echo $row['thread_count'] ?></td>
                                    <td><?php echo $row['gsm'] ?></td>
                                    <td><?php echo $row['process'] ?></td>
                                    <td>
                                      <?php 
                                        $route_id = $row['route'];
                                        if ($route_id == 1) {
                                          $route_action_path = "../singe/edit_singe.php";
                                        }
                                        elseif ($route_id == 2) {
                                          $route_action_path = "../bleaching/edit_bleaching.php";
                                        }
                                        elseif ($route_id == 3) {
                                          $route_action_path = "../mercerize/edit_mercerize.php";
                                        }
                                        elseif ($route_id == 4) {
                                          $route_action_path = "../ready_mercerize/edit_ready_mercerize.php";
                                        }
                                        elseif ($route_id == 5) {
                                          $route_action_path = "../equalize/edit_equalize.php";
                                        }
                                        elseif ($route_id == 6) {
                                          $route_action_path = "../printing/edit_printing.php";
                                        }
                                        elseif ($route_id == 7) {
                                          $route_action_path = "../curing_steaming/edit_curing_steaming.php";
                                        }
                                        elseif ($route_id == 8) {
                                          $route_action_path = "../dyeing/edit_dyeing.php";
                                        }
                                        elseif ($route_id == 9) {
                                          $route_action_path = "../washing/edit_washing.php";
                                        }
                                        elseif ($route_id == 10) {
                                          $route_action_path = "../finishing/edit_finishing.php";
                                        }
                                        elseif ($route_id == 11) {
                                          $route_action_path = "../calender/edit_calender.php";
                                        }
                                        elseif ($route_id == 12) {
                                          $route_action_path = "../sanforize/edit_sanforize.php";
                                        }
                                        else{
                                          $route_action_path = "../raising/edit_raising.php";
                                        }

                                        $sql_for_route = "SELECT route_name FROM route WHERE route_id = '$route_id'";
                                        $res_for_route = mysqli_query($con, $sql_for_route);
                                        $row_for_route = mysqli_fetch_assoc($res_for_route);
                                        $route_name_select = $row_for_route['route_name'];
                                      ?> 
                                      <form action="<?php echo $route_action_path; ?>" method="post" style="display: inline;">
                                        <input type="hidden" id="pp_no" name="pp_no" value="<?php echo $row['pp_no']; ?>">
                                        <input type="hidden" id="route_issue_id" name="route_issue_id" value="<?php echo $row['id']; ?>">
                                        <input type="hidden" id="gray_issue_id" name="gray_issue_id" value="<?php echo $row['gray_issue_id']; ?>">
                                        <button type="submit" id="gray_issue_add_btn" name="gray_issue_add_btn" class="btn btn-primary btn-xs">
                                            <?php echo $route_name_select; ?>
                                        </button>
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