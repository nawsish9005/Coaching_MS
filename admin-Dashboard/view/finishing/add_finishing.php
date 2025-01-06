<?php
session_start();
require_once("../includes/db_session_chk.php");
$greige_issunce_id = $_POST['greige_issunce_id'];
$route_issue_id = $_POST['route_issue_id'];
$pp_no_id = $_POST['pp_no_id'];
$pp_details_id = $_POST['pp_details_id'];

if (($greige_issunce_id == '') || (empty($greige_issunce_id)) || is_null($greige_issunce_id)||
  ($route_issue_id == '') || (empty($route_issue_id)) || is_null($route_issue_id)) {
   header("Location: finishing_list.php");
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
                              <!-- <th>Fiber Warp</th>
                              <th>Fiber Weft</th> -->
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
                                                   AND greige_issunce.pp_details_id = pp_details.pp_id
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
                              <!-- <td><?php echo $row_pp_details['fiber_warp'] ?></td>
                              <td><?php echo $row_pp_details['fiber_weft'] ?></td> -->
                              <td><?php echo $row['received_quantity'] ?></td>
                              <td><?php echo $row['process'] ?></td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>

                <?php 
                    $sql_for_finishing_standard = "SELECT *
                                     FROM finishing_standard
                                     WHERE pp_no_id = '$pp_no_id'
                                     AND pp_details_id = '$pp_details_id'
                                     AND active = '1'
                                    ";

                    $res_for_finishing_standard = mysqli_query($con, $sql_for_finishing_standard);

                    $row_for_finishing_standard = mysqli_fetch_array($res_for_finishing_standard);
                ?>

                <div class="row">
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                      <div class="x_title">
                        <h2>Finishing Form</h2>
                        <ul class="nav navbar-right panel_toolbox">
                          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                          </li>
                        </ul>
                        <div class="clearfix"></div>
                      </div>
                      <div class="x_content">
                        <br />

                        <form id="finishing_form" name="finishing_form" data-parsley-validate class="form-horizontal form-label-left">

                          <input type="hidden" id="route_issue_id" name="route_issue_id" value="<?php echo $route_issue_id; ?>">
                          <input type="hidden" id="greige_issunce_id" name="greige_issunce_id" value="<?php echo $greige_issunce_id; ?>">

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="pp">Date <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-6">
                              <div class='input-group date' id='myDatepicker2'>
                                <input type='text' class="form-control" id="custom_date" name="custom_date"/>
                                <span class="input-group-addon">
                                   <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                              </div>
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="b_batcher">Before Trolly/Batcher <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="b_batcher" name="b_batcher" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="a_batcher">After Trolly/Batcher <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="a_batcher" name="a_batcher" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="p_width">Process Width <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="p_width" name="p_width" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="p_qty">Process Quantity <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="p_qty" name="p_qty" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="s_or_e">Short/Excess <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="s_or_e" name="s_or_e" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="trf">TRF No <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="trf" name="trf" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <br>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cf_rubbing_dry">Color Fastness to Rubbing Dry 
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="cf_rubbing_dry" name="cf_rubbing_dry" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <br>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cf_rubbing_wet">Color Fastness to Rubbing Wet 
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="cf_rubbing_wet" name="cf_rubbing_wet" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <br>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="width_and_length_of_fabric">Width &  Length of fabric 
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="width_and_length_of_fabric" name="width_and_length_of_fabric" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>


                          <br>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="wash_dry_warp_before_iron">Dimensional Change to Washing & Drying Warp (Befor Iron) (%)
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="wash_dry_warp_before_iron" name="wash_dry_warp_before_iron" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <br>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="wash_dry_weft_before_iron">Dimensional Change to Washing & Drying Weft (Befor Iron) (%)
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="wash_dry_weft_before_iron" name="wash_dry_weft_before_iron" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <br>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="wash_dry_warp_after_iron">Dimensional Change to Washing & Drying Warp (After Iron) (%)
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="wash_dry_warp_after_iron" name="wash_dry_warp_after_iron" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <br>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="wash_dry_weft_after_iron">Dimensional Change to Washing & Drying Weft (After Iron) (%) 
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="wash_dry_weft_after_iron" name="wash_dry_weft_after_iron" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <br>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="dry_cleaning_warp">Dimensional Change to Dry Cleaning Warp (%)
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="dry_cleaning_warp" name="dry_cleaning_warp" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <br>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="dry_cleaning_weft">Dimensional Change to Dry Cleaning Weft (%) 
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="dry_cleaning_weft" name="dry_cleaning_weft" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <br>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="yarn_count_warp">Yarn Count for Warp <span class="required">*</span> ( <?php echo $row_for_finishing_standard['yarn_count_warp_unit'] ?> )
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="yarn_count_warp" name="yarn_count_warp" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <br>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="yarn_count_weft">Yarn Count for Weft <span class="required">*</span> ( <?php echo $row_for_finishing_standard['yarn_count_weft_unit'] ?> )
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="yarn_count_weft" name="yarn_count_weft" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <br>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number_thread_warp">Number of Threads Warp <span class="required">*</span> ( <?php echo $row_for_finishing_standard['number_thread_warp_unit'] ?> )
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="number_thread_warp" name="number_thread_warp" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <br>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number_thread_weft">Number of Threads weft <span class="required">*</span> ( <?php echo $row_for_finishing_standard['number_thread_weft_unit'] ?> )
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="number_thread_weft" name="number_thread_weft" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <br>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="mass_per_unit_per_area">Mass per Unit per Area <span class="required">*</span> ( <?php echo $row_for_finishing_standard['mass_per_unit_per_area_unit'] ?> )
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="mass_per_unit_per_area" name="mass_per_unit_per_area" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <br>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="surface_pilling">Surface Fuzzing & to Pilling 
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="surface_pilling" name="surface_pilling" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <br>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tensile_warp">Tensile Properties Warp ( <?php echo $row_for_finishing_standard['tensile_warp_unit'] ?> ) 
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="tensile_warp" name="tensile_warp" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <br>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tensile_weft">Tensile Properties Weft ( <?php echo $row_for_finishing_standard['tensile_weft_unit'] ?> ) 
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="tensile_weft" name="tensile_weft" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <br>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tear_force_warp">Tear Force Warp ( <?php echo $row_for_finishing_standard['tear_force_warp_unit'] ?> ) 
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="tear_force_warp" name="tear_force_warp" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <br>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tear_force_weft">Tear Force Weft ( <?php echo $row_for_finishing_standard['tear_force_weft_unit'] ?> ) 
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="tear_force_weft" name="tear_force_weft" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <br>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="seam_strength_warp">Seam Strength Warp ( <?php echo $row_for_finishing_standard['seam_strength_warp_unit'] ?> ) 
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="seam_strength_warp" name="seam_strength_warp" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <br>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="seam_strength_weft">Seam Strength Weft ( <?php echo $row_for_finishing_standard['seam_strength_weft_unit'] ?> )
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="seam_strength_weft" name="seam_strength_weft" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <br>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="abrasion_resistance">Abrasion Resistance S.Change 
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="abrasion_resistance" name="abrasion_resistance" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <br>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="abrasion_resistance_lose">Mass Loss in Abrasion test (%)
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="abrasion_resistance_lose" name="abrasion_resistance_lose" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <br>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="washing_ph">pH<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="washing_ph" name="washing_ph" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <br>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="formaldehyde_content">Formaldehyde Content (PPM) <span class="required">*</span> ( <?php echo $row_for_finishing_standard['formaldehyde_content_unit'] ?> )
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="formaldehyde_content" name="formaldehyde_content" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <br>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cf_dry_cleaning_c_change">Color Fastness to Dry Cleaning Color Change 
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="cf_dry_cleaning_c_change" name="cf_dry_cleaning_c_change" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <br>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cf_dry_cleaning_staining">Color Fastness to Dry Cleaning Staining
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="cf_dry_cleaning_staining" name="cf_dry_cleaning_staining" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <br>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cf_washing_c_change">Color Fastness to Washing Color Change
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="cf_washing_c_change" name="cf_washing_c_change" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <br>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cf_washing_staining">Color Fastness to Washing Staining
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="cf_washing_staining" name="cf_washing_staining" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <br>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cf_perspiration_acis_c_change">Color Fastness to Perspiration (Acid) Color Change
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="cf_perspiration_acis_c_change" name="cf_perspiration_acis_c_change" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <br>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cf_perspiration_acis_staining">Color Fastness to Perspiration (Acid) Staining
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="cf_perspiration_acis_staining" name="cf_perspiration_acis_staining" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <br>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cf_perspiration_alkali_c_change">Color Fastness to Perspiration (Alkali) Color Change
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="cf_perspiration_alkali_c_change" name="cf_perspiration_alkali_c_change" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <br>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cf_perspiration_alkali_staining">Color Fastness to Perspiration (Alkali) Staining
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="cf_perspiration_alkali_staining" name="cf_perspiration_alkali_staining" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <br>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cf_water_c_change">Color Fastness to Water Color Change
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="cf_water_c_change" name="cf_water_c_change" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <br>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cf_water_staining">Color Fastness to Water Staining
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="cf_water_staining" name="cf_water_staining" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>


                          <br>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cf_water_sotting_staining">Color Fastness to Water Sotting Staining
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="cf_water_sotting_staining" name="cf_water_sotting_staining" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <br>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cf_water_wetting_staining">Color Fastness to Surface Wetting Staining
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="cf_water_wetting_staining" name="cf_water_wetting_staining" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <br>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cf_hyd_reactive_dyes_c_change">Color Fastness to Hydrolysis of Reactive Dyes Color Change
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="cf_hyd_reactive_dyes_c_change" name="cf_hyd_reactive_dyes_c_change" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <br>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cf_hyd_reactive_dyes_staining">Color Fastness to Hydrolysis of Reactive Dyes Staining 
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="cf_hyd_reactive_dyes_staining" name="cf_hyd_reactive_dyes_staining" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <br>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cf_oidative_damage_c_change">Color Fastness to Oidative Bleach Damage Color Change
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="cf_oidative_damage_c_change" name="cf_oidative_damage_c_change" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <br>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cf_phenolic_staining">Color Fastness to Phenolic Yellowing Staining 
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="cf_phenolic_staining" name="cf_phenolic_staining" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <br>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cf_pvc_migration_staining">Color Fastness to PVC Migration Staining 
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="cf_pvc_migration_staining" name="cf_pvc_migration_staining" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>


                          <br>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cf_saliva_c_change">Color Fastness to Saliva Color Change 
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="cf_saliva_c_change" name="cf_saliva_c_change" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <br>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cf_saliva_staining">Color Fastness to Saliva Staining
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="cf_saliva_staining" name="cf_saliva_staining" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <br>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cf_chlorinated_water_c_change">Color Fastness to Chlorinated Water Color Change 
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="cf_chlorinated_water_c_change" name="cf_chlorinated_water_c_change" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <br>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cf_chlorinated_water_staining">Color Fastness to Chlorinated Water Staining 
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="cf_chlorinated_water_staining" name="cf_chlorinated_water_staining" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <br>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cf_cholorine_bleach_c_change">Color Fastness to Cholorine Bleach Color Change
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="cf_cholorine_bleach_c_change" name="cf_cholorine_bleach_c_change" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <br>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cf_cholorine_bleach_staining">Color Fastness to Cholorine Bleach Staining
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="cf_cholorine_bleach_staining" name="cf_cholorine_bleach_staining" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <br>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cf_peroxide_bleach_c_change">Color Fastness to Peroxide Bleach Color Change
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="cf_peroxide_bleach_c_change" name="cf_peroxide_bleach_c_change" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <br>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cross_staining">Cross Staining
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="cross_staining" name="cross_staining" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <br>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="water_absorption">Water Absorption ( <?php echo $row_for_finishing_standard['water_absorption_unit'] ?> )
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="water_absorption" name="water_absorption" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <br>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="spirality">Spirality ( % )
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="spirality" name="spirality" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <br>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="durable_press">Durable Press
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="durable_press" name="durable_press" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <br>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ironability">Ironability of Woven Fabric
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="ironability" name="ironability" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <br>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cf_artificial_light">Color Fastness to Artificial Light
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="cf_artificial_light" name="cf_artificial_light" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <br>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="moisture_content">Moisture Content (%)
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="moisture_content" name="moisture_content" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <br>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="evaporation_rate">Evaporation Rate (%)
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="evaporation_rate" name="evaporation_rate" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>


                          <br>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="abrasion_resistance_thread_break">Abrasion Resistance Thread Break
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="abrasion_resistance_thread_break" name="abrasion_resistance_thread_break" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <br>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="print_durability">Print Durability
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="print_durability" name="print_durability" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <br>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="revolution">Revolution 
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="revolution" name="revolution" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>


                          <br>

                          <?php
                                if ($row_for_finishing_standard['fiber_total_polyester_value1'] != 0)
                                {
                                    ?>
                                      <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fiber_total_polyester">Fiber Content total for Polyester <span class="required">*</span>
                                        </label>
                                          <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" id="fiber_total_polyester" name="fiber_total_polyester" autocomplete="off" class="fiber_total_polyester form-control col-md-7 col-xs-12" onkeyup="fiberTotalPolyesterCheck()">
                                              <input type="hidden" id="fiber_total_name_polyester" name="fiber_total_name_polyester" value="polyester">
                                              <input type="hidden" id="fiber_total_polyester_cond1" name="fiber_total_polyester_cond1" value="<?php echo $first_condition; ?>">
                                              <input type="hidden" id="fiber_total_polyester_value1" name="fiber_total_polyester_value1" value="<?php echo $row_for_finishing_standard['fiber_total_polyester_value1']; ?>">
                                              <input type="hidden" id="fiber_total_polyester_value2" name="fiber_total_polyester_value2" value="<?php echo $row_for_finishing_standard['fiber_total_polyester_value2']; ?>">
                                              <input type="hidden" id="fiber_total_polyester_cond2" name="fiber_total_polyester_cond2" value="<?php echo $second_condition; ?>">
                                          </div>
                                      </div>
                                    <?php
                                }
                          ?>

                          <?php 
                                if ($row_for_finishing_standard['fiber_total_cotton_value1'] != 0)
                                {
                                    ?>
                                      <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fiber_total_cotton"> Cotton <span class="required">*</span>
                                        </label>
                                          <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" id="fiber_total_cotton" name="fiber_total_cotton" autocomplete="off" class="fiber_total_cotton form-control col-md-7 col-xs-12" onkeyup="fiberTotalCottonCheck()">
                                              <input type="hidden" id="fiber_total_name_cotton" name="fiber_total_name_cotton" value="cotton">
                                              <input type="hidden" id="fiber_total_cotton_cond1" name="fiber_total_cotton_cond1" value="<?php echo $first_condition; ?>">
                                              <input type="hidden" id="fiber_total_cotton_value1" name="fiber_total_cotton_value1" value="<?php echo $row_for_finishing_standard['fiber_total_cotton_value1']; ?>">
                                              <input type="hidden" id="fiber_total_cotton_value2" name="fiber_total_cotton_value2" value="<?php echo $row_for_finishing_standard['fiber_total_cotton_value2']; ?>">
                                              <input type="hidden" id="fiber_total_cotton_cond2" name="fiber_total_cotton_cond2" value="<?php echo $second_condition; ?>">
                                          </div>
                                      </div>
                                    <?php
                                }
                            ?>

                          <?php 
                              if ($row_for_finishing_standard['fiber_total_thired_value1'] != 0)
                              {
                                  ?>
                                    <div class="form-group">
                                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fiber_total_thired"> <?php echo $row_for_finishing_standard['fiber_total_name_thired'] ?> <span class="required">*</span>
                                      </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                          <input type="text" id="fiber_total_thired" name="fiber_total_thired" autocomplete="off"
                                            class="fiber_total_thired form-control col-md-7 col-xs-12" onkeyup="fiberTotalThiredCheck()">
                                            <input type="hidden" id="fiber_total_name_thired" name="fiber_total_name_thired" value="<?php echo $row_for_finishing_standard['fiber_total_name_thired'] ?>">
                                            <input type="hidden" id="fiber_total_thired_cond1" name="fiber_total_thired_cond1" value="<?php echo $first_condition; ?>">
                                            <input type="hidden" id="fiber_total_thired_value1" name="fiber_total_thired_value1" value="<?php echo $row_for_finishing_standard['fiber_total_thired_value1']; ?>">
                                            <input type="hidden" id="fiber_total_thired_value2" name="fiber_total_thired_value2" value="<?php echo $row_for_finishing_standard['fiber_total_thired_value2']; ?>">
                                            <input type="hidden" id="fiber_total_thired_cond2" name="fiber_total_thired_cond2" value="<?php echo $second_condition; ?>">
                                        </div>
                                    </div>
                                  <?php
                              }
                          ?>

                          <?php 
                              if ($row_for_finishing_standard['fiber_total_fourth_value1'] != 0)
                              {
                                  ?>
                                    <div class="form-group">
                                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fiber_total_fourth"> <?php echo $row_for_finishing_standard['fiber_total_name_fourth'] ?> <span class="required">*</span>
                                      </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                          <input type="text" id="fiber_total_fourth" name="fiber_total_fourth" autocomplete="off"
                                            class="fiber_total_fourth form-control col-md-7 col-xs-12" onkeyup="fiberTotalFourthCheck()">
                                            <input type="hidden" id="fiber_total_name_fourth" name="fiber_total_name_fourth" value="<?php echo $row_for_finishing_standard['fiber_total_name_fourth'] ?>">
                                            <input type="hidden" id="fiber_total_fourth_cond1" name="fiber_total_fourth_cond1" value="<?php echo $first_condition; ?>">
                                            <input type="hidden" id="fiber_total_fourth_value1" name="fiber_total_fourth_value1" value="<?php echo $row_for_finishing_standard['fiber_total_fourth_value1']; ?>">
                                            <input type="hidden" id="fiber_total_fourth_value2" name="fiber_total_fourth_value2" value="<?php echo $row_for_finishing_standard['fiber_total_fourth_value2']; ?>">
                                            <input type="hidden" id="fiber_total_fourth_cond2" name="fiber_total_fourth_cond2" value="<?php echo $second_condition; ?>">
                                        </div>
                                    </div>
                                  <?php
                              }
                          ?>

                          <br>
                          
                          <?php
                                if ($row_for_finishing_standard['fiber_warp_polyester_value1'] != 0)
                                {
                                    ?>
                                      <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fiber_warp_polyester">Fiber Content Warp for Polyester <span class="required">*</span>
                                        </label>
                                          <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" id="fiber_warp_polyester" name="fiber_warp_polyester" autocomplete="off"
                                              class="fiber_warp_polyester form-control col-md-7 col-xs-12" onkeyup="fiberWarpPolyesterCheck()">
                                              <input type="hidden" id="fiber_warp_name_polyester" name="fiber_warp_name_polyester" value="polyester">
                                              <input type="hidden" id="fiber_warp_polyester_cond1" name="fiber_warp_polyester_cond1" value="<?php echo $first_condition; ?>">
                                              <input type="hidden" id="fiber_warp_polyester_value1" name="fiber_warp_polyester_value1" value="<?php echo $row_for_finishing_standard['fiber_warp_polyester_value1']; ?>">
                                              <input type="hidden" id="fiber_warp_polyester_value2" name="fiber_warp_polyester_value2" value="<?php echo $row_for_finishing_standard['fiber_warp_polyester_value2']; ?>">
                                              <input type="hidden" id="fiber_warp_polyester_cond2" name="fiber_warp_polyester_cond2" value="<?php echo $second_condition; ?>">
                                          </div>
                                      </div>
                                    <?php
                                }
                          ?>

                          <?php 
                                if ($row_for_finishing_standard['fiber_warp_cotton_value1'] != 0)
                                {
                                    ?>
                                      <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fiber_warp_cotton"> Cotton <span class="required">*</span>
                                        </label>
                                          <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" id="fiber_warp_cotton" name="fiber_warp_cotton" autocomplete="off"
                                              class="fiber_warp_cotton form-control col-md-7 col-xs-12" onkeyup="fiberWarpCottonCheck()">
                                              <input type="hidden" id="fiber_warp_name_cotton" name="fiber_warp_name_cotton" value="cotton">
                                              <input type="hidden" id="fiber_warp_cotton_cond1" name="fiber_warp_cotton_cond1" value="<?php echo $first_condition; ?>">
                                              <input type="hidden" id="fiber_warp_cotton_value1" name="fiber_warp_cotton_value1" value="<?php echo $row_for_finishing_standard['fiber_warp_cotton_value1']; ?>">
                                              <input type="hidden" id="fiber_warp_cotton_value2" name="fiber_warp_cotton_value2" value="<?php echo $row_for_finishing_standard['fiber_warp_cotton_value2']; ?>">
                                              <input type="hidden" id="fiber_warp_cotton_cond2" name="fiber_warp_cotton_cond2" value="<?php echo $second_condition; ?>">
                                          </div>
                                      </div>
                                    <?php
                                }
                            ?>

                          <?php 
                              if ($row_for_finishing_standard['fiber_warp_thired_value1'] != 0)
                              {
                                  ?>
                                    <div class="form-group">
                                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fiber_warp_thired"> <?php echo $row_for_finishing_standard['fiber_warp_name_thired'] ?> <span class="required">*</span>
                                      </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                          <input type="text" id="fiber_warp_thired" name="fiber_warp_thired" autocomplete="off"
                                            class="fiber_warp_thired form-control col-md-7 col-xs-12" onkeyup="fiberWarpThiredCheck()">
                                            <input type="hidden" id="fiber_warp_name_thired" name="fiber_warp_name_thired" value="<?php echo $row_for_finishing_standard['fiber_warp_name_thired'] ?>">
                                            <input type="hidden" id="fiber_warp_thired_cond1" name="fiber_warp_thired_cond1" value="<?php echo $first_condition; ?>">
                                            <input type="hidden" id="fiber_warp_thired_value1" name="fiber_warp_thired_value1" value="<?php echo $row_for_finishing_standard['fiber_warp_thired_value1']; ?>">
                                            <input type="hidden" id="fiber_warp_thired_value2" name="fiber_warp_thired_value2" value="<?php echo $row_for_finishing_standard['fiber_warp_thired_value2']; ?>">
                                            <input type="hidden" id="fiber_warp_thired_cond2" name="fiber_warp_thired_cond2" value="<?php echo $second_condition; ?>">
                                        </div>
                                    </div>
                                  <?php
                              }
                          ?>

                          <?php 
                              if ($row_for_finishing_standard['fiber_warp_fourth_value1'] != 0)
                              {
                                  ?>
                                    <div class="form-group">
                                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fiber_warp_fourth"> <?php echo $row_for_finishing_standard['fiber_warp_name_fourth'] ?> <span class="required">*</span>
                                      </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                          <input type="text" id="fiber_warp_fourth" name="fiber_warp_fourth" autocomplete="off"
                                            class="fiber_warp_fourth form-control col-md-7 col-xs-12" onkeyup="fiberWarpFourthCheck()">
                                            <input type="hidden" id="fiber_warp_name_fourth" name="fiber_warp_name_fourth" value="<?php echo $row_for_finishing_standard['fiber_warp_name_fourth'] ?>">
                                            <input type="hidden" id="fiber_warp_fourth_cond1" name="fiber_warp_fourth_cond1" value="<?php echo $first_condition; ?>">
                                            <input type="hidden" id="fiber_warp_fourth_value1" name="fiber_warp_fourth_value1" value="<?php echo $row_for_finishing_standard['fiber_warp_fourth_value1']; ?>">
                                            <input type="hidden" id="fiber_warp_fourth_value2" name="fiber_warp_fourth_value2" value="<?php echo $row_for_finishing_standard['fiber_warp_fourth_value2']; ?>">
                                            <input type="hidden" id="fiber_warp_fourth_cond2" name="fiber_warp_fourth_cond2" value="<?php echo $second_condition; ?>">
                                        </div>
                                    </div>
                                  <?php
                              }
                          ?>

                          <br>

                          <?php
                              if ($row_for_finishing_standard['fiber_weft_polyester_value1'] != 0)
                              {
                                  ?>
                                    <div class="form-group">
                                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fiber_weft_polyester">Fiber Content Weft for Polyester <span class="required">*</span>
                                      </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                          <input type="text" id="fiber_weft_polyester" name="fiber_weft_polyester" autocomplete="off"
                                            class="fiber_weft_polyester form-control col-md-7 col-xs-12" onkeyup="fiberWeftPolyesterCheck()">
                                            <input type="hidden" id="fiber_weft_name_polyester" name="fiber_weft_name_polyester" value="polyester">
                                            <input type="hidden" id="fiber_weft_polyester_cond1" name="fiber_weft_polyester_cond1" value="<?php echo $first_condition; ?>">
                                            <input type="hidden" id="fiber_weft_polyester_value1" name="fiber_weft_polyester_value1" value="<?php echo $row_for_finishing_standard['fiber_weft_polyester_value1']; ?>">
                                            <input type="hidden" id="fiber_weft_polyester_value2" name="fiber_weft_polyester_value2" value="<?php echo $row_for_finishing_standard['fiber_weft_polyester_value2']; ?>">
                                            <input type="hidden" id="fiber_weft_polyester_cond2" name="fiber_weft_polyester_cond2" value="<?php echo $second_condition; ?>">
                                        </div>
                                    </div>
                                  <?php
                              }
                          ?>

                          <?php
                              if ($row_for_finishing_standard['fiber_weft_cotton_value1'] != 0)
                              {
                                  ?>
                                    <div class="form-group">
                                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fiber_weft_cotton"> Cotton <span class="required">*</span>
                                      </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                          <input type="text" id="fiber_weft_cotton" name="fiber_weft_cotton" autocomplete="off"
                                            class="fiber_weft_cotton form-control col-md-7 col-xs-12" onkeyup="fiberWeftCottonCheck()">
                                            <input type="hidden" id="fiber_weft_name_cotton" name="fiber_weft_name_cotton" value="cotton">
                                            <input type="hidden" id="fiber_weft_cotton_cond1" name="fiber_weft_cotton_cond1" value="<?php echo $first_condition; ?>">
                                            <input type="hidden" id="fiber_weft_cotton_value1" name="fiber_weft_cotton_value1" value="<?php echo $row_for_finishing_standard['fiber_weft_cotton_value1']; ?>">
                                            <input type="hidden" id="fiber_weft_cotton_value2" name="fiber_weft_cotton_value2" value="<?php echo $row_for_finishing_standard['fiber_weft_cotton_value2']; ?>">
                                            <input type="hidden" id="fiber_weft_cotton_cond2" name="fiber_weft_cotton_cond2" value="<?php echo $second_condition; ?>">
                                        </div>
                                    </div>
                                  <?php
                              }
                          ?>

                          <?php
                              if ($row_for_finishing_standard['fiber_weft_thired_value1'] != 0)
                              {
                                  ?>
                                    <div class="form-group">
                                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fiber_weft_thired"> <?php echo $row_for_finishing_standard['fiber_weft_name_thired']; ?> <span class="required">*</span>
                                      </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                          <input type="text" id="fiber_weft_thired" name="fiber_weft_thired" autocomplete="off"
                                            class="fiber_weft_thired form-control col-md-7 col-xs-12" onkeyup="fiberWeftThiredCheck()">
                                            <input type="hidden" id="fiber_weft_name_thired" name="fiber_weft_name_thired" value="<?php echo $row_for_finishing_standard['fiber_weft_name_thired']; ?>">
                                            <input type="hidden" id="fiber_weft_thired_cond1" name="fiber_weft_thired_cond1" value="<?php echo $first_condition; ?>">
                                            <input type="hidden" id="fiber_weft_thired_value1" name="fiber_weft_thired_value1" value="<?php echo $row_for_finishing_standard['fiber_weft_thired_value1']; ?>">
                                            <input type="hidden" id="fiber_weft_thired_value2" name="fiber_weft_thired_value2" value="<?php echo $row_for_finishing_standard['fiber_weft_thired_value2']; ?>">
                                            <input type="hidden" id="fiber_weft_thired_cond2" name="fiber_weft_thired_cond2" value="<?php echo $second_condition; ?>">
                                        </div>
                                    </div>
                                  <?php
                              }
                          ?>

                          <?php
                              if ($row_for_finishing_standard['fiber_weft_fourth_value1'] != 0)
                              {
                                  ?>
                                    <div class="form-group">
                                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fiber_weft_fourth"> <?php echo $row_for_finishing_standard['fiber_weft_name_fourth']; ?> <span class="required">*</span>
                                      </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                          <input type="text" id="fiber_weft_fourth" name="fiber_weft_fourth" autocomplete="off"
                                            class="fiber_weft_fourth form-control col-md-7 col-xs-12" onkeyup="fiberWeftFourthCheck()">
                                            <input type="hidden" id="fiber_weft_name_fourth" name="fiber_weft_name_fourth" value="<?php echo $row_for_finishing_standard['fiber_weft_name_fourth']; ?>">
                                            <input type="hidden" id="fiber_weft_fourth_cond1" name="fiber_weft_fourth_cond1" value="<?php echo $first_condition; ?>">
                                            <input type="hidden" id="fiber_weft_fourth_value1" name="fiber_weft_fourth_value1" value="<?php echo $row_for_finishing_standard['fiber_weft_fourth_value1']; ?>">
                                            <input type="hidden" id="fiber_weft_fourth_value2" name="fiber_weft_fourth_value2" value="<?php echo $row_for_finishing_standard['fiber_weft_fourth_value2']; ?>">
                                            <input type="hidden" id="fiber_weft_fourth_cond2" name="fiber_weft_fourth_cond2" value="<?php echo $second_condition; ?>">
                                        </div>
                                    </div>
                                  <?php
                              }
                          ?>

                          <br>






                          <br>

                          <?php
                                if ($row_for_finishing_standard['seam_resistance_method1_warp_value2'] != 0)
                                {
                                    ?>
                                      <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="seam_resistance_method1_warp_value">Seam Slipage Resistance Warp (N) <span class="required">*</span>
                                        </label>
                                          <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" id="seam_resistance_method1_warp_value" name="seam_resistance_method1_warp_value" autocomplete="off" class="seam_resistance_method1_warp_value form-control col-md-7 col-xs-12">
                                          </div>

                                        
                                      </div>

                                      <div class="form-group">
                                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="seam_resistance_method1_warp_value">Remarks <span class="required">*</span>
                                        </label>
                                          <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" id="seam_resistance_method1_warp_remarks" name="seam_resistance_method1_warp_remarks" autocomplete="off" class="seam_resistance_method1_warp_remarks form-control col-md-7 col-xs-12">
                                          </div>

                                      </div>
                                    <?php
                                }
                          ?>

                          <?php 
                                if ($row_for_finishing_standard['seam_resistance_method1_weft_value2'] != 0)
                                {
                                    ?>
                                      <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="seam_resistance_method1_weft_value"> Seam Slipage Resistance Weft (N) <span class="required">*</span>
                                        </label>
                                          <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" id="seam_resistance_method1_weft_value" name="seam_resistance_method1_weft_value" autocomplete="off" class="seam_resistance_method1_weft_value form-control col-md-7 col-xs-12">
                                          </div>

                                        
                                      </div>

                                      <div class="form-group">
                                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="seam_resistance_method1_weft_value">Remarks <span class="required">*</span>
                                        </label>
                                          <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" id="seam_resistance_method1_weft_remarks" name="seam_resistance_method1_weft_remarks" autocomplete="off" class="seam_resistance_method1_weft_remarks form-control col-md-7 col-xs-12">
                                          </div>

                                       </div>
                                    <?php
                                }
                            ?>

                          <?php 
                              if ($row_for_finishing_standard['seam_resistance_method2_warp_value2'] != 0)
                              {
                                  ?>
                                    <div class="form-group">
                                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fiber_total_thired"> Seam Slipage Resistance Warp (mm) <span class="required">*</span>
                                      </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                          <input type="text" id=" seam_resistance_method2_warp_value" name="seam_resistance_method2_warp_value" autocomplete="off" class="  seam_resistance_method2_warp_value form-control col-md-7 col-xs-12">
                                        </div>

                                      
                                      </div>
                                      <div class="form-group">
                                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="seam_resistance_method2_warp_value">Remarks <span class="required">*</span>
                                        </label>
                                          <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" id="seam_resistance_method2_warp_remarks" name="seam_resistance_method2_warp_remarks" autocomplete="off" class="seam_resistance_method2_warp_remarks form-control col-md-7 col-xs-12">
                                          </div>

                                      </div>
                                  <?php
                              }
                          ?>

                          <?php 
                              if ($row_for_finishing_standard['seam_resistance_method2_weft_value2'] != 0)
                              {
                                  ?>
                                    <div class="form-group">
                                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fiber_total_fourth"> Seam Slipage Resistance Weft (mm) <span class="required">*</span>
                                      </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                          <input type="text" id="seam_resistance_method2_weft_value" name="seam_resistance_method2_weft_value" autocomplete="off" class="seam_resistance_method2_weft_value form-control col-md-7 col-xs-12">
                                        </div>

                                        <br>

                                        
                                    </div>

                                    <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="seam_resistance_method2_weft_value">Remarks 
                                        </label>
                                          <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" id="seam_resistance_method2_weft_remarks" name="seam_resistance_method2_weft_remarks" autocomplete="off" class="seam_resistance_method2_weft_remarks form-control col-md-7 col-xs-12">
                                          </div>

                                     </div>
                                  <?php
                              }
                          ?>

                          <br>







                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="status">Status <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <p>
                                 OK :
                                <input type="radio" class="flat" name="status" id="ok" value="1" checked/>
                                 Not OK :
                                <input type="radio" class="flat" name="status" id="notok" value="0" />
                              </p>
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="remarks">Remarks <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="remarks" name="remarks" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <div class="ln_solid"></div>
                          <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                              <button type="button" name="submit" id="submit" class="btn btn-success">Submit</button>
                              <button type="reset" name="reset" id="reset" class="btn btn-info">Reset</button>
                            </div>
                          </div>

                        </form>
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
    <script type="text/javascript">
     $(document).ready(function(){

      $('#myDatepicker2').datetimepicker({
        format: 'DD.MM.YYYY'
      });

      $('#submit').click(function()
      {
          if(document.getElementById("custom_date").value == "")
          {
              missing_alert("custom_date");
              return false;
           }
          else if(document.getElementById("b_batcher").value == "")
          {
              missing_alert("b_batcher");
              return false;
          }
          else if(document.getElementById("a_batcher").value == "")
          {
              missing_alert("a_batcher");
              return false;
          }
          else if(document.getElementById("p_width").value == "")
          {
              missing_alert("p_width");
              return false;
          }
          else if(document.getElementById("p_qty").value == "")
          {
              missing_alert("p_qty");
              return false;
          }
          else if(document.getElementById("s_or_e").value == "")
          {
              missing_alert("s_or_e");
              return false;
          }
          // else if(document.getElementById("absorbency_left").value == "")
          // {
          //     missing_alert("absorbency_left");
          //     return false;
          // }
          // else if(document.getElementById("absorbency_center").value == "")
          // {
          //     missing_alert("absorbency_center");
          //     return false;
          // }
          // else if(document.getElementById("absorbency_right").value == "")
          // {
          //     missing_alert("absorbency_right");
          //     return false;
          // }
          // else if(document.getElementById("size_left").value == "")
          // {
          //     missing_alert("size_left");
          //     return false;
          // }
          // else if(document.getElementById("size_center").value == "")
          // {
          //     missing_alert("size_center");
          //     return false;
          // }
          // else if(document.getElementById("size_right").value == "")
          // {
          //     missing_alert("size_right");
          //     return false;
          // }
          // else if(document.getElementById("whiteness_left").value == "")
          // {
          //     missing_alert("whiteness_left");
          //     return false;
          // }
          // else if(document.getElementById("whiteness_center").value == "")
          // {
          //     missing_alert("whiteness_center");
          //     return false;
          // }
          // else if(document.getElementById("whiteness_right").value == "")
          // {
          //     missing_alert("whiteness_right");
          //     return false;
          // }
          // else if(document.getElementById("pilling").value == "")
          // {
          //     missing_alert("pilling");
          //     return false;
          // }
          // else if(document.getElementById("ph_left").value == "")
          // {
          //     missing_alert("ph_left");
          //     return false;
          // }
          // else if(document.getElementById("ph_center").value == "")
          // {
          //     missing_alert("ph_center");
          //     return false;
          // }
          // else if(document.getElementById("ph_right").value == "")
          // {
          //     missing_alert("ph_right");
          //     return false;
          // }

          else if(document.getElementById("remarks").value == "")
          {
              missing_alert("remarks");
              return false;
          }
          else
          {
              var formdata = new FormData(document.getElementById('finishing_form'));
              formdata.append("route_issue_id", <?php echo $route_issue_id; ?> );
              $.ajax({
              type: "POST",
              url: "add_finishing_saving.php",// where you wanna post
              data: formdata,
              processData: false,
              contentType: false,
              error: function(jqXHR, textStatus, errorMessage)
              {
                  alert(errorMessage);
              },
              success: function(data)
              {
                  if(data == "No data found")
                  {
                      info_alert(data);
                  }
                  else
                  {
                      //info_alert(data);
                      //window.location = "";
                      var greige_issunce_id = document.getElementById("greige_issunce_id").value;
                      var route_issue_id = document.getElementById("route_issue_id").value;
                      success_alert("Data Save Successfully", "view_finishing.php?greige_issunce_id="+greige_issunce_id+"&route_issue_id="+route_issue_id);
                  }
              }
            });
          }


      });
  });
  </script>
</body>
</html>
