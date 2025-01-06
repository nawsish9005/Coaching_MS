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
                        <li><a href="../home/dashboard.php">Dashboard</a></li>
                        <li>Settings</li>
                        <li><a href="add_construction.php">Add Construction for Version</a></li>
                        <li>Construction for Version Lists</li>
                    </ol>
                  </div>
                </div>

                <!-- main content again -->
                <div class="clearfix"></div>
                <div class="row">
                   <div class="col-md-12 col-sm-12 col-xs-12">
                      <div class="x_panel">
                        <a type="button" href="add_construction.php" class="btn btn-primary btn-xs"> Add New construction</a>
                        <div class="x_title">
                          <h2>Construction</h2>
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
                                <th>Construction Name</th>
                                <th>Action</th>
                              </tr>
                            </thead>
                            
                            <tbody>
                              <?php 
                                $s1 = 1;
                                $sql_for_construction = "SELECT * FROM construction";

                                $res_for_construction = mysqli_query($con, $sql_for_construction);

                                while ($row = mysqli_fetch_assoc($res_for_construction)) 
                                {
                              ?>
                              <tr>
                                <td><?php echo $s1; ?></td>
                                <td>
                                    <?php
                                      $yarn_count_warp_total = "";
                                      $yarn_count_weft_total = "";
                                      $thread_count_warp_insertion_total = "";
                                      $yarn_count_warp_total = "";

                                      $yarn_count_warp_ply = $row['yarn_count_warp_ply'];
                                      $yarn_count_weft_ply = $row['yarn_count_weft_ply'];
                                      $thread_count_warp_insertion = $row['thread_count_warp_insertion'];
                                      $thread_count_weft_insertion = $row['thread_count_weft_insertion'];

                                      if ($yarn_count_warp_ply == '1') 
                                      {
                                          $yarn_count_warp_total = $row['yarn_count_warp_value'].".";
                                      }

                                      else
                                      {
                                          $yarn_count_warp_total = $row['yarn_count_warp_value']."<sup>".$row['yarn_count_warp_ply']."</sup>.";
                                      }

                                      if ($yarn_count_weft_ply == '1') 
                                      {
                                          $yarn_count_weft_total = $row['yarn_count_weft_value']."/";
                                      }

                                      else
                                      {
                                          $yarn_count_weft_total = $row['yarn_count_weft_value']."<sup>".$row['yarn_count_weft_ply']."</sup>/";
                                      }



                                      if ($thread_count_warp_insertion == '1') 
                                      {
                                          $thread_count_warp_insertion_total = $row['thread_count_warp_value'].".";
                                      }

                                      else
                                      {
                                          $thread_count_warp_insertion_total = $row['thread_count_warp_value']."(".$row['thread_count_warp_insertion'].").";
                                      }

                                      if ($thread_count_weft_insertion == '1') 
                                      {
                                          $thread_count_weft_insertion_total = $row['thread_count_weft_value'];
                                      }

                                      else
                                      {
                                          $thread_count_weft_insertion_total = $row['thread_count_weft_value']."(".$row['thread_count_weft_insertion'].")";
                                      }

                                      echo $display = $yarn_count_warp_total. $yarn_count_weft_total. $thread_count_warp_insertion_total . $thread_count_weft_insertion_total;


                                      // if ($row['yarn_count_warp_ply'] == '1'  && $row['yarn_count_weft_ply'] == '1' && $row['thread_count_warp_insertion'] == '1' && $row['thread_count_weft_insertion'] == '1' ) 
                                      // {
                                      //     echo $display= $row['yarn_count_warp_value'].".".$row['yarn_count_weft_value']."/".$row['thread_count_warp_value'].".".$row['thread_count_weft_value'];
                                      // }

                                      // elseif ($row['yarn_count_warp_ply'] != '1'  && $row['yarn_count_weft_ply'] == '1' && $row['thread_count_warp_insertion'] == '1' && $row['thread_count_weft_insertion'] == '1')
                                      // {
                                      //     echo $display= $row['yarn_count_warp_value']."<sup>".$row['yarn_count_warp_ply']."</sup>.".$row['yarn_count_weft_value']."/".$row['thread_count_warp_value'].".".$row['thread_count_weft_value'];
                                      // }

                                      // elseif($row['yarn_count_warp_ply'] != '1'  && $row['yarn_count_weft_ply'] != '1' && $row['thread_count_warp_insertion'] == '1' && $row['thread_count_weft_insertion'] == '1')
                                      // {

                                      // }

                                      // else
                                      // {
                                      //     echo $display= $row['yarn_count_warp_value']."<sup>".$row['yarn_count_warp_ply']."</sup>.".$row['yarn_count_weft_value']."<sup>".$row['yarn_count_weft_ply']."</sup> /".$row['thread_count_warp_value']."(".$row['thread_count_warp_insertion'].").".$row['thread_count_weft_value']."(".$row['thread_count_weft_insertion'].")";
                                      // }
                                     
                                    ?>
                                </td>
                                <td>
                                  <form action="edit_construction.php" method="post" style="display: inline;">
                                    <input type="hidden" id="construction_id" name="construction_id" value="<?php echo $row['construction_id']; ?>">
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