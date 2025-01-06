<?php
session_start();
require_once("../includes/db_session_chk.php");

$route_issue_id = $_POST['route_issue_id'];
$greige_issunce_id = $_POST['greige_issunce_id'];
$pp_no_id = $_POST['pp_no_id'];
$pp_details_id = $_POST['pp_details_id'];
$finishing_id = $_POST['finishing_id'];

if ($route_issue_id == "" || is_null($route_issue_id) || empty($route_issue_id) || 
    $finishing_id == "" || is_null($finishing_id) || empty($finishing_id)) 
{
    echo "No data found";
}

else
{
	?>
		        <div class="row">
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                      <div class="x_title">
                        <h2>Finishing Form View</h2>
                        <ul class="nav navbar-right panel_toolbox">
                          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                          </li>
                        </ul>
                        <div class="clearfix"></div>
                      </div>
                      <div class="x_content">
                        <br />
                        <?php
                          $sql_for_bleaching = "SELECT *
                                         FROM finishing
                                         WHERE route_issue_id = '$route_issue_id'
                                         AND finishing_id = '$finishing_id'
                                        ";
                          $res_for_bleaching = mysqli_query($con, $sql_for_bleaching);
                          $row_bleaching = mysqli_fetch_assoc($res_for_bleaching);
                        ?>
                        <form id="singe_form" name="singe_form" data-parsley-validate class="form-horizontal form-label-left">

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="pp">Date <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-6">
                              <div class='input-group date' id='myDatepicker2'>
                                <input type='text' class="form-control" id="custom_date" readonly name="custom_date" value="<?php echo $row_bleaching['date']; ?>"/>
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
                              <input type="text" id="b_batcher" name="b_batcher" readonly value="<?php echo $row_bleaching['b_batcher']; ?>" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="a_batcher">After Trolly/Batcher <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="a_batcher" name="a_batcher" readonly value="<?php echo $row_bleaching['a_batcher']; ?>" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="p_width">Process Width <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="p_width" name="p_width" readonly value="<?php echo $row_bleaching['p_width'];?>" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="p_qty">P. Qty <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="p_qty" name="p_qty" readonly value="<?php echo $row_bleaching['p_qty'];?>" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="s_or_e">Short/Excess <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="s_or_e" name="s_or_e" readonly value="<?php echo $row_bleaching['s_or_e'];?>" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <br>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cf_rubbing_dry">Color Fastness to Rubbing Dry <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="cf_rubbing_dry" readonly value="<?php echo $row_bleaching['cf_rubbing_dry'];?>" name="cf_rubbing_dry" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <br>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cf_rubbing_wet">Color Fastness to Rubbing Wet <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="cf_rubbing_wet" readonly value="<?php echo $row_bleaching['cf_rubbing_wet'];?>" name="cf_rubbing_wet" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <br>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="wash_dry_warp_before_iron">Dimensional Change to Washing & Drying Warp (Befor Iron) <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="wash_dry_warp_before_iron" readonly value="<?php echo $row_bleaching['wash_dry_warp_before_iron'];?>" name="wash_dry_warp_before_iron" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <br>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="wash_dry_weft_before_iron">Dimensional Change to Washing & Drying Weft (Befor Iron) <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="wash_dry_weft_before_iron" readonly value="<?php echo $row_bleaching['wash_dry_weft_before_iron'];?>" name="wash_dry_weft_before_iron" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <br>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="wash_dry_warp_after_iron">Dimensional Change to Washing & Drying Warp (After Iron) <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="wash_dry_warp_after_iron" readonly value="<?php echo $row_bleaching['wash_dry_warp_after_iron'];?>" name="wash_dry_warp_after_iron" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <br>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="wash_dry_weft_after_iron">Dimensional Change to Washing & Drying Weft (After Iron) <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="wash_dry_weft_after_iron" readonly value="<?php echo $row_bleaching['wash_dry_weft_after_iron'];?>" name="wash_dry_weft_after_iron" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <br>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="dry_cleaning_warp">Dimensional Change to Dry Cleaning Warp <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="dry_cleaning_warp" readonly value="<?php echo $row_bleaching['dry_cleaning_warp'];?>" name="dry_cleaning_warp" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <br>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="dry_cleaning_weft">Dimensional Change to Dry Cleaning Weft <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="dry_cleaning_weft" readonly value="<?php echo $row_bleaching['dry_cleaning_weft'];?>" name="dry_cleaning_weft" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <br>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="yarn_count_warp">Yarn Count for Warp <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="yarn_count_warp" readonly value="<?php echo $row_bleaching['yarn_count_warp'];?>" name="yarn_count_warp" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <br>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="yarn_count_weft">Yarn Count for Weft <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="yarn_count_weft" readonly value="<?php echo $row_bleaching['yarn_count_weft'];?>" name="yarn_count_weft" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <br>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number_thread_warp">Number of Threads Warp <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="number_thread_warp" readonly value="<?php echo $row_bleaching['number_thread_warp'];?>" name="number_thread_warp" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <br>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number_thread_weft">Number of Threads weft <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="number_thread_weft" readonly value="<?php echo $row_bleaching['number_thread_weft'];?>" name="number_thread_weft" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <br>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="mass_per_unit_per_area">Mass per Unit per Area <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="mass_per_unit_per_area" readonly value="<?php echo $row_bleaching['mass_per_unit_per_area'];?>" name="mass_per_unit_per_area" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <br>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="surface_pilling">Surface Fuzzing & to Pilling <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="surface_pilling" readonly value="<?php echo $row_bleaching['surface_pilling'];?>" name="surface_pilling" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <br>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tensile_warp">Tensile Properties Warp <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="tensile_warp" readonly value="<?php echo $row_bleaching['tensile_warp'];?>" name="tensile_warp" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <br>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tensile_weft">Tensile Properties Weft <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="tensile_weft" readonly value="<?php echo $row_bleaching['tensile_weft'];?>" name="tensile_weft" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <br>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tear_force_warp">Tear Force Warp <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="tear_force_warp" readonly value="<?php echo $row_bleaching['tear_force_warp'];?>" name="tear_force_warp" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <br>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tear_force_weft">Tear Force Weft <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="tear_force_weft" readonly value="<?php echo $row_bleaching['tear_force_weft'];?>" name="tear_force_weft" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <br>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="seam_strength_warp">Seam Strength Warp <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12"> 
                              <input type="text" id="seam_strength_warp" readonly value="<?php echo $row_bleaching['seam_strength_warp'];?>" name="seam_strength_warp" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <br>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="seam_strength_weft">Seam Strength Weft <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="seam_strength_weft" readonly value="<?php echo $row_bleaching['seam_strength_weft'];?>" name="seam_strength_weft" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <br>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="abrasion_resistance">Abrasion Resistance S.Change <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="abrasion_resistance" readonly value="<?php echo $row_bleaching['abrasion_resistance'];?>" name="abrasion_resistance" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <br>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="abrasion_resistance_thread_break">Abrasion Resistance Thread Break <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="abrasion_resistance_thread_break" readonly value="<?php echo $row_bleaching['abrasion_resistance_thread_break'];?>" name="abrasion_resistance_thread_break" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <br>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="abrasion_resistance_lose">Mass Loss in Abrasion test <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="abrasion_resistance_lose" readonly value="<?php echo $row_bleaching['abrasion_resistance_lose'];?>" name="abrasion_resistance_lose" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <br>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="washing_ph">pH<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="washing_ph" name="washing_ph" readonly value="<?php echo $row_bleaching['washing_ph'];?>" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <br>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="formaldehyde_content">Formaldehyde Content (PPM)<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="formaldehyde_content" readonly value="<?php echo $row_bleaching['formaldehyde_content'];?>" name="formaldehyde_content" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <br>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cf_dry_cleaning_c_change">Color Fastness to Dry Cleaning Color Change<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="cf_dry_cleaning_c_change" readonly value="<?php echo $row_bleaching['cf_dry_cleaning_c_change'];?>" name="cf_dry_cleaning_c_change" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <br>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cf_dry_cleaning_staining">Color Fastness to Dry Cleaning Staining<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="cf_dry_cleaning_staining" readonly value="<?php echo $row_bleaching['cf_dry_cleaning_staining'];?>" name="cf_dry_cleaning_staining" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <br>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cf_washing_c_change">Color Fastness to Washing Color Change<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="cf_washing_c_change" readonly value="<?php echo $row_bleaching['cf_washing_c_change'];?>" name="cf_washing_c_change" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <br>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cf_washing_staining">Color Fastness to Washing Staining<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="cf_washing_staining" readonly value="<?php echo $row_bleaching['cf_washing_staining'];?>" name="cf_washing_staining" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <br>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cf_perspiration_acis_c_change">Color Fastness to Perspiration (Acid) Color Change<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="cf_perspiration_acis_c_change" readonly value="<?php echo $row_bleaching['cf_perspiration_acis_c_change'];?>" name="cf_perspiration_acis_c_change" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <br>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cf_perspiration_acis_staining">Color Fastness to Perspiration (Acid) Staining<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="cf_perspiration_acis_staining" readonly value="<?php echo $row_bleaching['cf_perspiration_acis_staining'];?>" name="cf_perspiration_acis_staining" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <br>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cf_perspiration_alkali_c_change">Color Fastness to Perspiration (Alkali) Color Change<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="cf_perspiration_alkali_c_change" readonly value="<?php echo $row_bleaching['cf_perspiration_alkali_c_change'];?>" name="cf_perspiration_alkali_c_change" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <br>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cf_perspiration_alkali_staining">Color Fastness to Perspiration (Alkali) Staining<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="cf_perspiration_alkali_staining" readonly value="<?php echo $row_bleaching['cf_perspiration_alkali_staining'];?>" name="cf_perspiration_alkali_staining" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <br>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cf_water_c_change">Color Fastness to Water Color Change<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="cf_water_c_change" readonly value="<?php echo $row_bleaching['cf_water_c_change'];?>" name="cf_water_c_change" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <br>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cf_water_staining">Color Fastness to Water Staining<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="cf_water_staining" readonly value="<?php echo $row_bleaching['cf_water_staining'];?>" name="cf_water_staining" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>













                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cf_water_sotting_staining">Color Fastness to Water Sotting Staining
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="cf_water_sotting_staining" readonly value="<?php echo $row_bleaching['cf_water_sotting_staining'];?>" name="cf_water_sotting_staining" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <br>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cf_water_wetting_staining">Color Fastness to Surface Wetting Staining
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="cf_water_wetting_staining" readonly value="<?php echo $row_bleaching['cf_water_wetting_staining'];?>" name="cf_water_wetting_staining" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <br>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cf_hyd_reactive_dyes_c_change">Color Fastness to Hydrolysis of Reactive Dyes Color Change
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="cf_hyd_reactive_dyes_c_change" readonly value="<?php echo $row_bleaching['cf_hyd_reactive_dyes_c_change'];?>" name="cf_hyd_reactive_dyes_c_change" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <br>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cf_hyd_reactive_dyes_staining">Color Fastness to Hydrolysis of Reactive Dyes Staining 
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="cf_hyd_reactive_dyes_staining" readonly value="<?php echo $row_bleaching['cf_hyd_reactive_dyes_staining'];?>" name="cf_hyd_reactive_dyes_staining" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <br>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cf_oidative_damage_c_change">Color Fastness to Oidative Bleach Damage Color Change
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="cf_oidative_damage_c_change" readonly value="<?php echo $row_bleaching['cf_oidative_damage_c_change'];?>" name="cf_oidative_damage_c_change" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <br>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cf_phenolic_staining">Color Fastness to Phenolic Yellowing Staining 
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="cf_phenolic_staining" readonly value="<?php echo $row_bleaching['cf_phenolic_staining'];?>" name="cf_phenolic_staining" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <br>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cf_pvc_migration_staining">Color Fastness to PVC Migration Staining 
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="cf_pvc_migration_staining" readonly value="<?php echo $row_bleaching['cf_pvc_migration_staining'];?>" name="cf_pvc_migration_staining" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>


                          <br>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cf_saliva_c_change">Color Fastness to Saliva Color Change 
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="cf_saliva_c_change" readonly value="<?php echo $row_bleaching['cf_saliva_c_change'];?>" name="cf_saliva_c_change" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <br>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cf_saliva_staining">Color Fastness to Saliva Staining
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="cf_saliva_staining" readonly value="<?php echo $row_bleaching['cf_saliva_staining'];?>" name="cf_saliva_staining" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <br>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cf_chlorinated_water_c_change">Color Fastness to Chlorinated Water Color Change 
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="cf_chlorinated_water_c_change" readonly value="<?php echo $row_bleaching['cf_chlorinated_water_c_change'];?>" name="cf_chlorinated_water_c_change" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <br>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cf_chlorinated_water_staining">Color Fastness to Chlorinated Water Staining 
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="cf_chlorinated_water_staining" readonly value="<?php echo $row_bleaching['cf_chlorinated_water_staining'];?>" name="cf_chlorinated_water_staining" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <br>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cf_cholorine_bleach_c_change">Color Fastness to Cholorine Bleach Color Change
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="cf_cholorine_bleach_c_change" readonly value="<?php echo $row_bleaching['cf_cholorine_bleach_c_change'];?>" name="cf_cholorine_bleach_c_change" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <br>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cf_cholorine_bleach_staining">Color Fastness to Cholorine Bleach Staining
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="cf_cholorine_bleach_staining" readonly value="<?php echo $row_bleaching['cf_cholorine_bleach_staining'];?>" name="cf_cholorine_bleach_staining" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <br>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cf_peroxide_bleach_c_change">Color Fastness to Peroxide Bleach Color Change
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="cf_peroxide_bleach_c_change" readonly value="<?php echo $row_bleaching['cf_peroxide_bleach_c_change'];?>" name="cf_peroxide_bleach_c_change" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <br>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cross_staining">Cross Staining
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="cross_staining" readonly value="<?php echo $row_bleaching['cross_staining'];?>" name="cross_staining" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <br>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="water_absorption">Water Absorption ( <?php echo $row_for_finishing_standard['water_absorption_unit'] ?> )
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="water_absorption" readonly value="<?php echo $row_bleaching['water_absorption'];?>" name="water_absorption" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <br>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="spirality">Spirality ( % )
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="spirality" readonly value="<?php echo $row_bleaching['spirality'];?>" name="spirality" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <br>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="durable_press">Durable Press
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="durable_press" readonly value="<?php echo $row_bleaching['durable_press'];?>" name="durable_press" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <br>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ironability">Ironability of Woven Fabric
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="ironability" readonly value="<?php echo $row_bleaching['ironability'];?>" name="ironability" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <br>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cf_artificial_light">Color Fastness to Artificial Light
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="cf_artificial_light" readonly value="<?php echo $row_bleaching['cf_artificial_light'];?>" name="cf_artificial_light" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <br>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="moisture_content">Moisture Content (%)
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="moisture_content" readonly value="<?php echo $row_bleaching['moisture_content'];?>" name="moisture_content" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <br>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="evaporation_rate">Evaporation Rate (%)
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="evaporation_rate" readonly value="<?php echo $row_bleaching['evaporation_rate'];?>" name="evaporation_rate" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>


                          <br>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="abrasion_resistance_thread_break">Abrasion Resistance Thread Break
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" readonly id="abrasion_resistance_thread_break" value="<?php echo $row_bleaching['abrasion_resistance_thread_break'];?>" name="abrasion_resistance_thread_break" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <br>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="print_durability">Print Durability
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="print_durability" readonly value="<?php echo $row_bleaching['print_durability'];?>" name="print_durability" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <br>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="revolution">Revolution 
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="revolution" readonly value="<?php echo $row_bleaching['revolution'];?>" name="revolution" class="form-control col-md-7 col-xs-12">
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
                                            <input readonly type="text" id="fiber_total_polyester" value="<?php echo $row_bleaching['fiber_total_polyester'];?>" name="fiber_total_polyester" autocomplete="off" class="fiber_total_polyester form-control col-md-7 col-xs-12" >
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
                                            <input type="text" readonly id="fiber_total_cotton" value="<?php echo $row_bleaching['fiber_total_cotton'];?>" name="fiber_total_cotton" autocomplete="off" class="fiber_total_cotton form-control col-md-7 col-xs-12" >
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
                                          <input type="text" readonly id="fiber_total_thired" value="<?php echo $row_bleaching['fiber_total_thired'];?>" name="fiber_total_thired" autocomplete="off"
                                            class="fiber_total_thired form-control col-md-7 col-xs-12" >
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
                                          <input type="text" readonly id="fiber_total_fourth" value="<?php echo $row_bleaching['fiber_total_fourth'];?>" name="fiber_total_fourth" autocomplete="off"
                                            class="fiber_total_fourth form-control col-md-7 col-xs-12" >
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
                                            <input type="text" readonly id="fiber_warp_polyester" value="<?php echo $row_bleaching['fiber_warp_polyester'];?>" name="fiber_warp_polyester" autocomplete="off"
                                              class="fiber_warp_polyester form-control col-md-7 col-xs-12" >
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
                                            <input type="text" readonly id="fiber_warp_cotton" value="<?php echo $row_bleaching['fiber_warp_cotton'];?>" name="fiber_warp_cotton" autocomplete="off"
                                              class="fiber_warp_cotton form-control col-md-7 col-xs-12" >
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
                                          <input type="text" readonly id="fiber_warp_thired" value="<?php echo $row_bleaching['fiber_warp_thired'];?>" name="fiber_warp_thired" autocomplete="off"
                                            class="fiber_warp_thired form-control col-md-7 col-xs-12" >
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
                                          <input type="text" readonly id="fiber_warp_fourth" value="<?php echo $row_bleaching['fiber_warp_fourth'];?>" name="fiber_warp_fourth" autocomplete="off"
                                            class="fiber_warp_fourth form-control col-md-7 col-xs-12">
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
                                          <input type="text" readonly id="fiber_weft_polyester" value="<?php echo $row_bleaching['fiber_weft_polyester'];?>" name="fiber_weft_polyester" autocomplete="off"
                                            class="fiber_weft_polyester form-control col-md-7 col-xs-12">
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
                                          <input type="text" readonly id="fiber_weft_cotton" value="<?php echo $row_bleaching['fiber_weft_cotton'];?>" name="fiber_weft_cotton" autocomplete="off"
                                            class="fiber_weft_cotton form-control col-md-7 col-xs-12">
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
                                          <input type="text" readonly id="fiber_weft_thired" value="<?php echo $row_bleaching['fiber_weft_thired'];?>" name="fiber_weft_thired" autocomplete="off"
                                            class="fiber_weft_thired form-control col-md-7 col-xs-12" >
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
                                          <input type="text" readonly id="fiber_weft_fourth" value="<?php echo $row_bleaching['fiber_weft_fourth'];?>" name="fiber_weft_fourth" autocomplete="off"
                                            class="fiber_weft_fourth form-control col-md-7 col-xs-12" >
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
                                            <input type="text" readonly id="seam_resistance_method1_warp_value" value="<?php echo $row_bleaching['seam_resistance_method1_warp_value'];?>" name="seam_resistance_method1_warp_value" autocomplete="off" class="seam_resistance_method1_warp_value form-control col-md-7 col-xs-12">
                                          </div>
                                      </div>
                                      <div class="form-group">
                                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="seam_resistance_method1_warp_value">Remarks <span class="required">*</span>
                                        </label>
                                          <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" readonly id="seam_resistance_method1_warp_remarks" value="<?php echo $row_bleaching['seam_resistance_method1_warp_remarks'];?>" name="seam_resistance_method1_warp_remarks" autocomplete="off" class="seam_resistance_method1_warp_remarks form-control col-md-7 col-xs-12">
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
                                            <input type="text" readonly id="seam_resistance_method1_weft_value" value="<?php echo $row_bleaching['seam_resistance_method1_weft_value'];?>" name="seam_resistance_method1_weft_value" autocomplete="off" class="seam_resistance_method1_weft_value form-control col-md-7 col-xs-12">
                                          </div>

                                        
                                      </div>
                                      <div class="form-group">
                                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="seam_resistance_method1_weft_value">Remarks <span class="required">*</span>
                                        </label>
                                          <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" readonly id="seam_resistance_method1_weft_remarks" value="<?php echo $row_bleaching['seam_resistance_method1_weft_remarks'];?>" name="seam_resistance_method1_weft_remarks" autocomplete="off" class="seam_resistance_method1_weft_remarks form-control col-md-7 col-xs-12">
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
                                          <input type="text" readonly id=" seam_resistance_method2_warp_value" value="<?php echo $row_bleaching['seam_resistance_method2_warp_value'];?>" name="seam_resistance_method2_warp_value" autocomplete="off" class="  seam_resistance_method2_warp_value form-control col-md-7 col-xs-12">
                                        </div>

                                      
                                      </div>
                                      <div class="form-group">
                                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="seam_resistance_method2_warp_value">Remarks <span class="required">*</span>
                                        </label>
                                          <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" readonly id="seam_resistance_method2_warp_remarks" value="<?php echo $row_bleaching['seam_resistance_method2_warp_remarks'];?>" name="seam_resistance_method2_warp_remarks" autocomplete="off" class="seam_resistance_method2_warp_remarks form-control col-md-7 col-xs-12">
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
                                          <input type="text" readonly id="seam_resistance_method2_weft_value" value="<?php echo $row_bleaching['seam_resistance_method2_weft_value'];?>" name="seam_resistance_method2_weft_value" autocomplete="off" class="seam_resistance_method2_weft_value form-control col-md-7 col-xs-12">
                                        </div>


                                        
                                    </div>
                                    <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="seam_resistance_method2_weft_value">Remarks 
                                        </label>
                                          <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" readonly id="seam_resistance_method2_weft_remarks" value="<?php echo $row_bleaching['seam_resistance_method2_weft_remarks'];?>" name="seam_resistance_method2_weft_remarks" autocomplete="off" class="seam_resistance_method2_weft_remarks form-control col-md-7 col-xs-12">
                                          </div>
                                    </div>
                                  <?php
                              }
                          ?>

                          <br>







                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="status">Status <span class="required">*</span>
                            </label>
                            <div readonly class="col-md-6 col-sm-6 col-xs-12">
                              <p>
                                 OK :
                                <input disabled type="radio" class="flat" name="status" id="ok" value="1" <?php if($row_bleaching['status'] == '1') echo 'checked'; ?> />
                                 Not OK :
                                <input disabled type="radio" class="flat" name="status" id="notok" value="0" <?php if($row_bleaching['status'] == '0') echo 'checked'; ?> />
                              </p>
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="remarks">Remarks <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="remarks" readonly name="remarks" value="<?php echo $row['remarks']; ?>" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                        </form>


                        <form action="edit_finishing.php" method="post" style="display: inline; padding-left: 200px;">
                          <input type="hidden" id="route_issue_id" name="route_issue_id" value="<?php echo $route_issue_id; ?>">
        				          <input type="hidden" id="finishing_id" name="finishing_id" value="<?php echo $finishing_id; ?>">
        				          <input type="hidden" id="greige_issunce_id" name="greige_issunce_id" value="<?php echo $greige_issunce_id; ?>">
        				          <input type="hidden" id="pp_no_id" name="pp_no_id" value="<?php echo $pp_no_id; ?>">
        				          <input type="hidden" id="pp_details_id" name="pp_details_id" value="<?php echo $pp_details_id; ?>">

                          <div class="ln_solid"></div>
                          <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <button type="submit" class="btn btn-primary">
                                Edit
                            </button>
                          </div>
                        </form>


                      </div>
                    </div>
                  </div>
                </div>
	<?php
}

?>
