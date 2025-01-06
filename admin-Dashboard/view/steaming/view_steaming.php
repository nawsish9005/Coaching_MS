<?php
session_start();
require_once("../includes/db_session_chk.php");
$greige_issunce_id = $_GET['greige_issunce_id'];
$route_issue_id = $_GET['route_issue_id'];
$pp_no_id = $_GET['pp_no_id'];
$pp_details_id = $_GET['pp_details_id'];

if (($greige_issunce_id == '') || (empty($greige_issunce_id)) || is_null($greige_issunce_id)||
  ($route_issue_id == '') || (empty($route_issue_id)) || is_null($route_issue_id)) {
   header("Location: steaming_list.php");
}
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
                    </ol>
                  </div>
                </div>

                <div>
                  <form action="../route/greige_details_view.php" method="post" style="display: inline;">
                    <input type="hidden" id="greige_issunce_id" name="greige_issunce_id" value="<?php echo $greige_issunce_id; ?>">
                    <input type="hidden" id="pp_no_id" name="pp_no_id" value="<?php echo $pp_no_id; ?>">
                     <input type="hidden" id="route_issue_id" name="route_issue_id" value="<?php echo $route_issue_id; ?>">
                    <input type="hidden" id="pp_details_id" name="pp_details_id" value="<?php echo $pp_details_id; ?>">
                    <button type="submit" id="gray_issue_add_btn" name="gray_issue_add_btn" class="btn btn-primary btn-xs">
                        Go This Greige Details
                    </button>
                  </form>
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
                              <th>Color</th>
                              <th>Version</th>
                              <th>Design</th>
                              <th>Greige Width</th>
                              <th>Finish Width</th>
                              <th>Yarn Warp</th>
                              <th>Yarn Weft</th>
                              <th>Thread EPI</th>
                              <th>Thread PPI</th>
                              <th>GSM</th>
                              <th>Receive Quantiry</th>
                              <th>Process/Reprocess</th>
                            </tr>
                          </thead>

                          <tbody>
                            <?php
                              $sql_for_pp = "SELECT route_issue.*, greige_issunce.*
                                                   FROM route_issue, greige_issunce
                                                   WHERE route_issue.greige_issunce_id = '$greige_issunce_id'
                                                   AND route_issue.route_issue_id = '$route_issue_id'
                                                   AND route_issue.active = '1'
                                                   AND greige_issunce.active = '1'
                                                   ";

                              $res_for_pp = mysqli_query($con, $sql_for_pp);

                              $row = mysqli_fetch_array($res_for_pp);

                              $sql_for_pp_details = "SELECT greige_issunce.*, pp.*, pp_details.*
                                                   FROM greige_issunce, pp, pp_details
                                                   WHERE greige_issunce.greige_issunce_id = '$greige_issunce_id'
                                                   AND greige_issunce.active = '1'
                                                   AND greige_issunce.pp_no_id = pp.pp_id
                                                   AND greige_issunce.pp_details_id = pp_details.PP_id
                                                   ";

                              $res_for_pp_details = mysqli_query($con, $sql_for_pp_details);

                              $row_pp_details = mysqli_fetch_array($res_for_pp_details);
                            ?>
                            <tr>
                              <td>1</td>
                              <td><?php echo $row_pp_details['pp_no'] ?></td>
                              <td>
                                <?php
                                  $color_id = $row_pp_details['color'];
                                  $sql_for_color = "SELECT color_name FROM color WHERE color_id = '$color_id'";
                                  $res_for_color = mysqli_query($con, $sql_for_color);
                                  $row_for_color = mysqli_fetch_assoc($res_for_color);
                                  echo $row_for_color['color_name'];
                                ?>
                              </td>
                              <td><?php echo $row_pp_details['version'] ?></td>
                              <td><?php echo $row_pp_details['design'] ?></td>
                              <td><?php echo $row_pp_details['gray_width'] ?></td>
                              <td><?php echo $row_pp_details['finish_width'] ?></td>
                              <td><?php echo $row_pp_details['yarn_warp'] ?></td>
                              <td><?php echo $row_pp_details['yarn_weft'] ?></td>
                              <td><?php echo $row_pp_details['thread_epi'] ?></td>
                              <td><?php echo $row_pp_details['thread_ppi'] ?></td>
                              <td><?php echo $row_pp_details['gsm'] ?></td>
                              <td><?php echo $row['received_quantity'] ?></td>
                              <td><?php echo $row['process'] ?></td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
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
                                <th>Date</th>
                                <th>Batcher</th>
                                <th>Process Width</th>
                                <th>Process Quantity</th>
                                <th>Action</th>
                              </tr>
                            </thead>

                            <tbody>
                              <?php

                                $sql_for_pp_details = "SELECT *
                                                     FROM steaming
                                                     WHERE route_issue_id = '$route_issue_id'
                                                     ";

                                $res_for_pp_details = mysqli_query($con, $sql_for_pp_details);
                                $sl = 1;
                                while($row_pp_details = mysqli_fetch_assoc($res_for_pp_details))
                                {
                                    $steaming_id = $row_pp_details['steaming_id'];
                                    $route_issue_id = $row_pp_details['route_issue_id'];
                                ?>
                                  <tr>
                                    <td><?php echo $sl; ?></td>
                                    <td><?php echo $row_pp_details['date'] ?></td>
                                    <td>
                                      <?php echo $row_pp_details['a_batcher'] ?>
                                    </td>
                                    <td><?php echo $row_pp_details['p_width'] ?></td>
                                    <td><?php echo $row_pp_details['p_qty'] ?></td>
                                    
                                    <td>
                                        <input type="hidden" id="route_issue_id<?php echo $steaming_id; ?>" name="route_issue_id<?php echo $steaming_id; ?>" value="<?php echo $route_issue_id; ?>">
                                        <input type="hidden" id="greige_issunce_id<?php echo $steaming_id; ?>" name="greige_issunce_id<?php echo $steaming_id; ?>" value="<?php echo $greige_issunce_id; ?>">
                                        <input type="hidden" id="pp_no_id<?php echo $steaming_id; ?>" name="pp_no_id<?php echo $steaming_id; ?>" value="<?php echo $pp_no_id; ?>">
                                        <input type="hidden" id="pp_details_id<?php echo $steaming_id; ?>" name="pp_details_id<?php echo $steaming_id; ?>" value="<?php echo $pp_details_id; ?>">
                                        <button type="button" id="gray_issue_add_btn" value="<?php echo $steaming_id; ?>" name="gray_issue_add_btn" onclick="steaming_view(this.value);" class="btn btn-primary btn-xs"> Action </button>
                                    </td>
                                  </tr>
                                <?php 
                                  ++$sl;
                                 }
                                ?>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>


                <div id="view_content_area">
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
  function steaming_view(steaming_id)
  {
      var route_issue_id = document.getElementById("route_issue_id"+steaming_id).value;
      var greige_issunce_id = document.getElementById("greige_issunce_id"+steaming_id).value;
      var pp_no_id = document.getElementById("pp_no_id"+steaming_id).value;
      var pp_details_id = document.getElementById("pp_details_id"+steaming_id).value;

      $.ajax(
      {
          type: "POST",
          url: "details_steaming_view.php",
          method: "POST",
          data: {route_issue_id: route_issue_id, greige_issunce_id: greige_issunce_id, pp_no_id: pp_no_id, pp_details_id: pp_details_id, steaming_id: steaming_id},
          success:function(data)
          {
              $('#view_content_area').html(data);
          }
      });
  }
</script>

</body>
</html>
