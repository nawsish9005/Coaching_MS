<?php
session_start();
require_once("../includes/db_session_chk.php");
$greige_issunce_id = $_POST['greige_issunce_id'];
$pp_no_id = $_POST['pp_no_id'];
$pp_details_id = $_POST['pp_details_id'];
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

                      <div class="">
                      <div class="page-title">
                        <div class="title_left">
                          <ol class="breadcrumb">
                          </ol>
                        </div>
                      </div>

                      <!-- main content again -->
                      <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_content">
                              <table class="table table-striped table-bordered">
                                <thead>
                                  <tr>
                                    <th>SI</th>
                                    <th>PP Number</th>
                                    <th>Version</th>
                                    <th>Color</th>
                                    <th>Gray Width</th>
                                    <th>Quantity</th>
                                    <th>Yarn Warp</th>
                                    <th>Yarn Weft</th>
                                    <th>Thread EPI</th>
                                    <th>Thread PPI</th>
                                    <th>Fiber Warp</th>
                                    <th>Fiber Weft</th>
                                    <th>GSM</th>
                                    <th>Width</th>
                                    <th>Composition</th>
                                  </tr>
                                </thead>
                                
                                <tbody>
                                  <?php 
                                    $sql_for_gray_issue = "SELECT p.pp_id, 
                                                          p.pp_no,
                                                          p.issue_date,
                                                          p.customers,
                                                          p.construction,
                                                          p.week,
                                                          p.design,
                                                          customers.customers_id,
                                                          customers.customers_name,
                                                          details.pp_no_id,
                                                          details.version,
                                                          details.color,
                                                          c.color_id,
                                                          c.color_name,
                                                          details.gray_width,
                                                          details.finish_width,
                                                          details.quantity,
                                                          gi.*


                                                   FROM pp AS p, pp_details AS details, customers AS customers, color AS c, greige_issunce AS gi

                                                   WHERE p.pp_id = '$pp_no_id'
                                                   AND details.id = '$pp_details_id'
                                                   AND details.pp_no_id = '$pp_no_id'
                                                   AND gi.greige_issunce_id = '$greige_issunce_id'
                                                   AND p.pp_id = details.pp_no_id
                                                   AND p.customers = customers.customers_id
                                                   AND details.color = c.color_id";

                                    $res_for_gray_issue = mysqli_query($con, $sql_for_gray_issue);

                                    $row = mysqli_fetch_array($res_for_gray_issue)
                                  ?>
                                  <tr>
                                    <td>1</td>
                                    <td><?php echo $row['pp_no'] ?></td>
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
                                    <td><?php echo $row['width'] ?></td>
                                    <td><?php echo $row['composition'] ?></td>
                                  </tr>
                                </tbody>
                              </table>
                            </div>
                          </div>
                        </div>
                      </div>


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
                              <table id="datatable-buttons" class="table table-striped table-bordered">
                                <thead>
                                  <tr>
                                    <th>SI</th>
                                    <th>Route</th>
                                    <th>Process/Reprocess</th>
                                    <th>Action</th>
                                  </tr>
                                </thead>
                                
                                <tbody>
                                  <?php 
                                    $s1 = 1;
                                    $sql_for_pp = "SELECT route_issue.*, greige_issunce.*
                                                   FROM route_issue, greige_issunce  
                                                   WHERE route_issue.greige_issunce_id = '$greige_issunce_id'
                                                   AND route_issue.greige_issunce_id = greige_issunce.greige_issunce_id
                                                   AND route_issue.active = '1'
                                                   ORDER BY route_issue.process_number ASC
                                                   ";

                                    $res_for_pp = mysqli_query($con, $sql_for_pp);
                                    while ($row = mysqli_fetch_assoc($res_for_pp)) 
                                    {
                                      ?>
                                      <tr>
                                        <td><?php echo $s1; ?></td>
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
                                          <?php 
                                            $route_id = $row['route'];
                                            $complete = $row['complete'];
                                            if ($complete == 0) {
                                              if ($route_id == 1) 
                                              {
                                                $route_action_path = "../singe/add_singe.php";
                                              }
                                              elseif ($route_id == 2) 
                                              {
                                                $route_action_path = "../bleaching/add_bleaching.php";
                                              }
                                              elseif ($route_id == 3) 
                                              {
                                                $route_action_path = "../mercerize/add_mercerize.php";
                                              }
                                              elseif ($route_id == 4) 
                                              {
                                                $route_action_path = "../ready_mercerize/add_ready_mercerize.php";
                                              }
                                              elseif ($route_id == 5) 
                                              {
                                                $route_action_path = "../equalize/add_equalize.php";
                                              }
                                              elseif ($route_id == 6) 
                                              {
                                                $route_action_path = "../printing/add_printing.php";
                                              }
                                              elseif ($route_id == 7) 
                                              {
                                                $route_action_path = "../curing_steaming/add_curing_steaming.php";
                                              }
                                              elseif ($route_id == 8) 
                                              {
                                                $route_action_path = "../dyeing/add_dyeing.php";
                                              }
                                              elseif ($route_id == 9) 
                                              {
                                                $route_action_path = "../washing/add_washing.php";
                                              }
                                              elseif ($route_id == 10) 
                                              {
                                                $route_action_path = "../finishing/add_finishing.php";
                                              }
                                              elseif ($route_id == 11) 
                                              {
                                                $route_action_path = "../calender/add_calender.php";
                                              }
                                              elseif ($route_id == 12) 
                                              {
                                                $route_action_path = "../sanforize/add_sanforize.php";
                                              }
                                              else
                                              {
                                                $route_action_path = "../raising/add_raising.php";
                                              }

                                              ?>
                                                <form action="<?php echo $route_action_path; ?>" method="post" style="display: inline;">
                                                  <input type="hidden" id="pp_no" name="pp_no" value="<?php echo $row['pp_no']; ?>">
                                                  <input type="hidden" id="route_issue_id" name="route_issue_id" value="<?php echo $row['id']; ?>">
                                                  <input type="hidden" id="gray_issue_id" name="gray_issue_id" value="<?php echo $row['gray_issue_id']; ?>">
                                                  <button type="submit" id="gray_issue_add_btn" name="gray_issue_add_btn" class="btn btn-primary btn-xs">
                                                      Add
                                                  </button>
                                                </form>
                                              <?php
                                            }

                                            else
                                            {
                                              if ($route_id == 1) 
                                              {
                                                $route_action_path = "../singe/edit_singe.php";
                                                $route_view = "../singe/view_singe.php";
                                              }
                                              elseif ($route_id == 2) 
                                              {
                                                $route_action_path = "../bleaching/edit_bleaching.php";
                                                $route_view = "../bleaching/view_bleaching.php";
                                              }
                                              elseif ($route_id == 3) 
                                              {
                                                $route_action_path = "../mercerize/edit_mercerize.php";
                                                $route_view = "../mercerize/view_mercerize.php";
                                              }
                                              elseif ($route_id == 4) 
                                              {
                                                $route_action_path = "../ready_mercerize/edit_ready_mercerize.php";
                                                $route_view = "../ready_mercerize/view_ready_mercerize.php";
                                              }
                                              elseif ($route_id == 5) 
                                              {
                                                $route_action_path = "../equalize/edit_equalize.php";
                                                $route_view = "../equalize/view_equalize.php";
                                              }
                                              elseif ($route_id == 6) 
                                              {
                                                $route_action_path = "../printing/edit_printing.php";
                                                $route_view = "../printing/view_printing.php";
                                              }
                                              elseif ($route_id == 7) 
                                              {
                                                $route_action_path = "../curing_steaming/edit_curing_steaming.php";
                                                $route_view = "../curing_steaming/view_curing_steaming.php";
                                              }
                                              elseif ($route_id == 8) 
                                              {
                                                $route_action_path = "../dyeing/edit_dyeing.php";
                                                $route_view = "../dyeing/view_dyeing.php";
                                              }
                                              elseif ($route_id == 9) 
                                              {
                                                $route_action_path = "../washing/edit_washing.php";
                                                $route_view = "../washing/view_washing.php";
                                              }
                                              elseif ($route_id == 10) 
                                              {
                                                $route_action_path = "../finishing/edit_finishing.php";
                                                $route_view = "../finishing/view_finishing.php";
                                              }
                                              elseif ($route_id == 11) 
                                              {
                                                $route_action_path = "../calender/edit_calender.php";
                                                $route_view = "../calender/view_calender.php";
                                              }
                                              elseif ($route_id == 12) 
                                              {
                                                $route_action_path = "../sanforize/edit_sanforize.php";
                                                $route_view = "../sanforize/view_sanforize.php";
                                              }
                                              else
                                              {
                                                $route_action_path = "../raising/edit_raising.php";
                                                $route_view = "../raising/view_raising.php";
                                              }

                                              ?>
                                                <form action="<?php echo $route_action_path; ?>" method="post" style="display: inline;">
                                                  <input type="hidden" id="pp_no" name="pp_no" value="<?php echo $row['pp_no']; ?>">
                                                  <input type="hidden" id="route_issue_id" name="route_issue_id" value="<?php echo $row['id']; ?>">
                                                  <input type="hidden" id="gray_issue_id" name="gray_issue_id" value="<?php echo $row['gray_issue_id']; ?>">
                                                  <button type="submit" id="gray_issue_add_btn" name="gray_issue_add_btn" class="btn btn-primary btn-xs">
                                                      Edit
                                                  </button>
                                                </form>

                                                <form action="<?php echo $route_view; ?>" method="post" style="display: inline;">
                                                  <input type="hidden" id="route_issue_id" name="route_issue_id" value="<?php echo $row['id']; ?>">
                                                  <button type="submit" id="gray_issue_add_btn" name="gray_issue_add_btn" class="btn btn-primary btn-xs">
                                                      View
                                                  </button>
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