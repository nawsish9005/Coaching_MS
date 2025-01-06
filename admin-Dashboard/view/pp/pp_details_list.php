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
                        <li>Process Program</li>
                        <li>Edit PP Version</li>
                    </ol>
                  </div>
                </div>



                <!-- main content again -->
                <div class="clearfix"></div>
                <div class="row">
                   <div class="col-md-12 col-sm-12 col-xs-12">
                      <div class="x_panel">

                        <div class="x_title">
                          <h2>PP (Process Program) List</h2>
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
                                <th>Construction</th>
                                <th>Total PP Quantity</th>
                                <th>Action</th>
                              </tr>
                            </thead>
                            
                            <tbody>
                              <?php 

                                $sql_for_pp = "SELECT * FROM pp";
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
                                <td><?php echo $row['construction'] ?></td>
                                <td>
                                <?php 
                                  $sql_for_pp_details = "SELECT SUM(quantity) AS quantity FROM pp_details WHERE pp_no_id = '$pp_id' AND active = '1'";
                                  $res_for_pp_details = mysqli_query($con, $sql_for_pp_details);
                                  $row_quantity = mysqli_fetch_assoc($res_for_pp_details);
                                  echo $row_quantity['quantity'];
                                ?>
                                </td>
                                <td>
                                  <form action="edit_pp.php" method="post" style="display: inline-block;">
                                    <input type="hidden" id="pp_no" name="pp_no" value="<?php echo $row['pp_no']; ?>">
                                    <button type="submit" id="gray_issue_add_btn" name="gray_issue_add_btn" class="btn btn-primary btn-xs"> Edit Version </button>
                                  </form>

                                  <form action="view_pp.php" method="get" style="display: inline-block;">
                                    <input type="hidden" id="pp_no" name="pp_no" value="<?php echo $row['pp_no']; ?>">
                                    <button type="submit" class="btn btn-primary btn-xs"> View </button>
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

    <script type="text/javascript">
      // $(document).ready(function() {
      //   $("#submit").click(function () {
      //     var pp_no = $("#pp_no_select" ).val();
      //     $.ajax({
      //       type: "POST",
      //       url: "pp_info_query.php",// where you wanna post
      //       data: {pp_no:pp_no},
      //       processData: false,
      //       contentType: false,
      //       error: function(jqXHR, textStatus, errorMessage) 
      //       {
      //           alert(errorMessage);
      //       },
      //       success: function(data) 
      //       {
      //           // data = data.replace(/(\r\n|\n|\r)/gm, "");
      //           if(data == "No directory available with that File no.!")
      //           {
      //               info_alert(data);
      //           }
      //           else
      //           {
      //               alert("data receive");
      //           }
      //       } 
      //     });
      //   });
      // });

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
      });   

    </script>
</body>
</html>