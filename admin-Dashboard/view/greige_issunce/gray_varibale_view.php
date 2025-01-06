<?php
session_start();
require_once("../includes/db_session_chk.php");
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

            <?php 
              $sql_for_pp = "SELECT pp_no FROM pp WHERE pp_id = '$pp_no_id'";
              $res_for_pp = mysqli_query($con, $sql_for_pp);
              $row_for_pp = mysqli_fetch_assoc($res_for_pp);
            ?>

            <!-- page content -->
            <div class="right_col" role="main" style="margin-bottom: 10px;">
              <div class="">
                <div class="page-title">
                  <div class="title_left">
                    <ol class="breadcrumb">
                        <li><a href="../home/dashboard.php">Dashboard</a></li>
                        <li><a href="../variable/gray_variable.php?pp_no_id=<?php echo $pp_no_id; ?>">Greige Standards for PP No: <span style="color:red;"><?php echo $row_for_pp['pp_no']; ?></span></a></li>
                        <li>Greige Standards View</li>
                    </ol>
                  </div>
                </div>

                <!-- main content again -->
                <div class="clearfix"></div>
                <div class="row">

                       <div class="col-md-12 col-sm-12 col-xs-12">
                          <div class="x_panel">
                            <div class="x_title">
                              <h2>PP Number : <span style="color:red;"> <?php echo $row_for_pp['pp_no']; ?> </span> - Greige Standards</h2>
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
                                    <th>Yarn Count Warp</th>
                                    <th>Yarn Count Weft</th>
                                    <th>Thread Count EPI</th>
                                    <th>Thread Count PPI</th>
                                    <th>GSM</th>
                                    <th>Fiber Content Warp</th>
                                    <th>Fiber Content Weft</th>
                                  </tr>
                                </thead>
                                
                                <tbody>
                                  <?php 
                                    $s1 = 1;
                                    $sql_for_pp = "SELECT 
                                                      pp.pp_no,
                                                      pp.pp_id,
                                                      pp_details.id,
                                                      pp_details.pp_no_id,
                                                      pp_details.version,
                                                      pp_details.color,
                                                      pp_details.gray_width,
                                                      pp_details.quantity,
                                                      gray_variable.*

                                                   FROM 
                                                      pp, pp_details, gray_variable   
                                                   WHERE 
                                                      pp.pp_id = '$pp_no_id'
                                                      AND pp.pp_id = pp_details.pp_no_id
                                                      AND pp_details.id = '$pp_details_id'
                                                      AND gray_variable.pp_no_id = pp_details.pp_no_id
                                                      AND gray_variable.pp_details_id = pp_details.id
                                                      AND gray_variable.active = '1'
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
                                    <td>
                                      <?php 
                                        if ($row['yarn_warp_cond1'] == 1) 
                                        {
                                          echo "( ";
                                        }
                                        elseif ($row['yarn_warp_cond1'] == 2) 
                                        {
                                          echo "[ ";
                                        }
                                        else
                                        {
                                          echo "] ";
                                        }
                                        
                                        echo $row['yarn_warp_value1'];
                                        echo " - ";
                                        echo $row['yarn_warp_value2'];

                                        if ($row['yarn_warp_cond2'] == 1) 
                                        {
                                          echo " )";
                                        }
                                        elseif ($row['yarn_warp_cond2'] == 2) 
                                        {
                                          echo " ]";
                                        }
                                        else
                                        {
                                          echo " [";
                                        }
                                      ?>
                                    </td>

                                    <td>
                                      <?php 
                                        if ($row['yarn_weft_cond1'] == 1) 
                                        {
                                          echo "( ";
                                        }
                                        elseif ($row['yarn_weft_cond1'] == 2) 
                                        {
                                          echo "[ ";
                                        }
                                        else
                                        {
                                          echo "] ";
                                        }
                                        
                                        echo $row['yarn_weft_value1'];
                                        echo " - ";
                                        echo $row['yarn_weft_value2'];

                                        if ($row['yarn_weft_cond2'] == 1) 
                                        {
                                          echo " )";
                                        }
                                        elseif ($row['yarn_weft_cond2'] == 2) 
                                        {
                                          echo " ]";
                                        }
                                        else
                                        {
                                          echo " [";
                                        }
                                      ?>
                                    </td>

                                    <td>
                                      <?php 
                                        if ($row['thread_epi_cond1'] == 1) 
                                        {
                                          echo "( ";
                                        }
                                        elseif ($row['thread_epi_cond1'] == 2) 
                                        {
                                          echo "[ ";
                                        }
                                        else
                                        {
                                          echo "] ";
                                        }
                                        
                                        echo $row['thread_epi_value1'];
                                        echo " - ";
                                        echo $row['thread_epi_value2'];

                                        if ($row['thread_epi_cond2'] == 1) 
                                        {
                                          echo " )";
                                        }
                                        elseif ($row['thread_epi_cond2'] == 2) 
                                        {
                                          echo " ]";
                                        }
                                        else
                                        {
                                          echo " [";
                                        }
                                      ?>
                                    </td>

                                    <td>
                                      <?php 
                                        if ($row['thread_ppi_cond1'] == 1) 
                                        {
                                          echo "( ";
                                        }
                                        elseif ($row['thread_ppi_cond1'] == 2) 
                                        {
                                          echo "[ ";
                                        }
                                        else
                                        {
                                          echo "] ";
                                        }
                                        
                                        echo $row['thread_ppi_value1'];
                                        echo " - ";
                                        echo $row['thread_ppi_value2'];

                                        if ($row['thread_ppi_cond2'] == 1) 
                                        {
                                          echo " )";
                                        }
                                        elseif ($row['thread_ppi_cond2'] == 2) 
                                        {
                                          echo " ]";
                                        }
                                        else
                                        {
                                          echo " [";
                                        }
                                      ?>
                                    </td>
                                    
                                    <td>
                                      <?php 
                                        if ($row['gsm_warp_cond1'] == 1) 
                                        {
                                          echo "( ";
                                        }
                                        elseif ($row['gsm_warp_cond1'] == 2) 
                                        {
                                          echo "[ ";
                                        }
                                        else
                                        {
                                          echo "] ";
                                        }
                                        
                                        echo $row['gsm_warp_value1'];
                                        echo " - ";
                                        echo $row['gsm_warp_value2'];

                                        if ($row['gsm_warp_cond2'] == 1) 
                                        {
                                          echo " )";
                                        }
                                        elseif ($row['gsm_warp_cond2'] == 2) 
                                        {
                                          echo " ]";
                                        }
                                        else
                                        {
                                          echo " [";
                                        }
                                      ?>
                                    </td>

                                    <td>
                                      <?php 
                                        if ($row['fiber_warp_cond1'] == 1) 
                                        {
                                          echo "( ";
                                        }
                                        elseif ($row['fiber_warp_cond1'] == 2) 
                                        {
                                          echo "[ ";
                                        }
                                        else
                                        {
                                          echo "] ";
                                        }
                                        
                                        echo $row['fiber_warp_value1'];
                                        echo " - ";
                                        echo $row['fiber_warp_value2'];

                                        if ($row['fiber_warp_cond2'] == 1) 
                                        {
                                          echo " )";
                                        }
                                        elseif ($row['fiber_warp_cond2'] == 2) 
                                        {
                                          echo " ]";
                                        }
                                        else
                                        {
                                          echo " [";
                                        }
                                      ?>
                                    </td>

                                    <td>
                                      <?php 
                                        if ($row['fiber_weft_cond1'] == 1) 
                                        {
                                          echo "( ";
                                        }
                                        elseif ($row['fiber_weft_cond1'] == 2) 
                                        {
                                          echo "[ ";
                                        }
                                        else
                                        {
                                          echo "] ";
                                        }
                                        
                                        echo $row['fiber_weft_value1'];
                                        echo " - ";
                                        echo $row['fiber_weft_value2'];

                                        if ($row['fiber_weft_cond2'] == 1) 
                                        {
                                          echo " )";
                                        }
                                        elseif ($row['fiber_weft_cond2'] == 2) 
                                        {
                                          echo " ]";
                                        }
                                        else
                                        {
                                          echo " [";
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