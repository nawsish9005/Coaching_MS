<?php
session_start();
require_once("../includes/db_session_chk.php");

$route_issue_id = $_POST['route_issue_id'];
$greige_issunce_id = $_POST['greige_issunce_id'];
$pp_no_id = $_POST['pp_no_id'];
$pp_details_id = $_POST['pp_details_id'];
$calendering_id = $_POST['calendering_id'];

if ($route_issue_id == "" || is_null($route_issue_id) || empty($route_issue_id) || 
    $calendering_id == "" || is_null($calendering_id) || empty($calendering_id)) 
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
                        <h2>calendering Form View</h2>
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
                                         FROM calendering
                                         WHERE route_issue_id = '$route_issue_id'
                                         AND calendering_id = '$calendering_id'
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
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="machine">Machine Name <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="machine" name="machine" readonly value="<?php echo $row_bleaching['machine'];?>" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <br>



                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="face_back">Face Back <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="face_back" name="face_back" readonly value="<?php echo $row_bleaching['face_back'];?>" class="form-control col-md-7 col-xs-12">
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




                          <br>

                          <?php
                                if ($row_bleaching['seam_resistance_method1_warp_value2'] != 0)
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
                                if ($row_bleaching['seam_resistance_method1_weft_value2'] != 0)
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
                              if ($row_bleaching['seam_resistance_method2_warp_value2'] != 0)
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
                              if ($row_bleaching['seam_resistance_method2_weft_value2'] != 0)
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
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="hand_feel">Hand Feel <span class="required">*</span>
                            </label>
                            <div readonly class="col-md-6 col-sm-6 col-xs-12">
                              <p>
                                 OK :
                                <input disabled type="radio" class="flat" name="hand_feel" id="ok" value="1" <?php if($row_bleaching['hand_feel'] == '1') echo 'checked'; ?> />
                                 Not OK :
                                <input disabled type="radio" class="flat" name="hand_feel" id="notok" value="0" <?php if($row_bleaching['hand_feel'] == '0') echo 'checked'; ?> />
                              </p>
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


                        <form action="edit_calendering.php" method="post" style="display: inline; padding-left: 200px;">
                          <input type="hidden" id="route_issue_id" name="route_issue_id" value="<?php echo $route_issue_id; ?>">
        				          <input type="hidden" id="calendering_id" name="calendering_id" value="<?php echo $calendering_id; ?>">
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
