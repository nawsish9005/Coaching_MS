<?php
session_start();
require_once("../includes/db_session_chk.php");

$route_issue_id = $_POST['route_issue_id'];
$greige_issunce_id = $_POST['greige_issunce_id'];
$pp_no_id = $_POST['pp_no_id'];
$pp_details_id = $_POST['pp_details_id'];
$washing_id = $_POST['washing_id'];

if ($route_issue_id == "" || is_null($route_issue_id) || empty($route_issue_id) || 
    $washing_id == "" || is_null($washing_id) || empty($washing_id)) 
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
                        <h2>Washing Form View</h2>
                        <ul class="nav navbar-right panel_toolbox">
                          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                          </li>
                        </ul>
                        <div class="clearfix"></div>
                      </div>
                      <div class="x_content">
                        <br />
                        <?php
                          $sql_for_washing = "SELECT *
                                         FROM washing
                                         WHERE route_issue_id = '$route_issue_id'
                                         AND washing_id = '$washing_id'
                                        ";
                          $res_for_washing = mysqli_query($con, $sql_for_washing);
                          $row_washing = mysqli_fetch_assoc($res_for_washing);
                        ?>
                        <form id="washing_form" name="washing_form" data-parsley-validate class="form-horizontal form-label-left">

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

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="machine">Machine Name <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="machine" name="machine" readonly value="<?php echo $row_bleaching['machine'];?>" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="machine_temp">Machine Temperature <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="machine_temp" name="machine_temp" readonly value="<?php echo $row_bleaching['machine_temp'];?>" class="form-control col-md-7 col-xs-12">
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
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="washing_ph">pH<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="washing_ph" name="washing_ph" readonly value="<?php echo $row_bleaching['washing_ph'];?>" class="form-control col-md-7 col-xs-12">
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


                        <form action="edit_washing.php" method="post" style="display: inline; padding-left: 200px;">
                          <input type="hidden" id="route_issue_id" name="route_issue_id" value="<?php echo $route_issue_id; ?>">
        				          <input type="hidden" id="washing_id" name="washing_id" value="<?php echo $washing_id; ?>">
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
