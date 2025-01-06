<?php
session_start();
require_once("../includes/db_session_chk.php");
$route_issue_id = $_POST['route_issue_id'];
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

                      <div class="page-title">
                        <div class="title_left">
                          <ol class="breadcrumb">
                          </ol>
                        </div>
                      </div>


                       <div class="col-md-12 col-sm-12 col-xs-12">
                          <div class="x_panel">
                            <div class="x_title">
                              <h2>Bleaching Process</h2>
<!--                               <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                              </ul> -->
                              <!-- id="datatable-buttons" -->
                              <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                              <table  class="table table-striped table-bordered">
                                <thead>
                                  <tr>
                                    <th>SI</th>
                                    <th>Route</th>
                                    <th>Process/Reprocess</th>
                                    <th>Before Batcher/Trolly</th>
                                    <th>After Batcher/Trolly</th>
                                    <th>Process Width</th>
                                    <th>Product Quantity</th>
                                    <th>Shortage/Excess</th>
                                    <th>Absorbency Left</th>
                                    <th>Absorbency Center</th>
                                    <th>Absorbency Right</th>
                                    <th>Size</th>
                                    <th>Whiteness</th>
                                    <th>Pilling</th>
                                    <th>pH</th>
                                  </tr>
                                </thead>

                                <tbody>
                                  <?php
                                    $s1 = 1;
                                    $sql_for_pp = "SELECT route_issue.*, bleaching.*
                                                   FROM route_issue, bleaching
                                                   WHERE bleaching.route_issue_id = '$route_issue_id'
                                                   AND route_issue.route_issue_id = bleaching.route_issue_id
                                                   AND route_issue.active = '1'
                                                   ORDER BY bleaching.bleaching_id ASC
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
                                    <td><?php echo $row['b_batcher'] ?></td>
                                    <td><?php echo $row['a_batcher'] ?></td>
                                    <td><?php echo $row['p_width'] ?></td>
                                    <td><?php echo $row['p_qty'] ?></td>
                                    <td><?php echo $row['s_or_e'] ?></td>
                                    <td><?php echo $row['absorbency_left'] ?></td>
                                    <td><?php echo $row['absorbency_center'] ?></td>
                                    <td><?php echo $row['absorbency_right'] ?></td>
                                    <td><?php echo $row['size'] ?></td>
                                    <td><?php echo $row['whiteness'] ?></td>
                                    <td><?php echo $row['pilling'] ?></td>
                                    <td><?php echo $row['ph'] ?></td>
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
