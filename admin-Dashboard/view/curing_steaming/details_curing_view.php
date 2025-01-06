<?php
session_start();
require_once("../includes/db_session_chk.php");

$route_issue_id = $_POST['route_issue_id'];
$greige_issunce_id = $_POST['greige_issunce_id'];
$pp_no_id = $_POST['pp_no_id'];
$pp_details_id = $_POST['pp_details_id'];
$curing_id = $_POST['curing_id'];

if ($route_issue_id == "" || is_null($route_issue_id) || empty($route_issue_id) || 
    $curing_id == "" || is_null($curing_id) || empty($curing_id)) 
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
                        <h2>Curing/Streaming Form View</h2>
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
                                         FROM curing
                                         WHERE route_issue_id = '$route_issue_id'
                                         AND curing_id = '$curing_id'
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

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="total_quantity">Total Quantity <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="total_quantity" name="total_quantity" readonly value="<?php echo $row_bleaching['total_quantity'];?>" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="time">Time <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="time" name="time" readonly value="<?php echo $row_bleaching['time'];?>" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="temp">Temp (C) <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="temp" name="temp" readonly value="<?php echo $row_bleaching['temp'];?>" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <br>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="yarn_count_warp">Yarn Count Warp
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" readonly id="yarn_count_warp" value="<?php echo $row_bleaching['yarn_count_warp'];?>" name="yarn_count_warp" autocomplete="off"
                                class="yarn_count_warp form-control col-md-7 col-xs-12">
                            </div>
                          </div>


                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="yarn_count_weft">Yarn Count Weft
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" readonly id="yarn_count_weft" value="<?php echo $row_bleaching['yarn_count_weft'];?>" name="yarn_count_weft" autocomplete="off"
                                
                                class="yarn_count_weft form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="thread_epi">Thread Count EPI
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" readonly id="thread_epi" value="<?php echo $row_bleaching['thread_epi'];?>" name="thread_epi" autocomplete="off"
                                
                                class="thread_epi form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <br>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="thread_ppi">Thread Count PPI
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" readonly id="thread_ppi" value="<?php echo $row_bleaching['thread_ppi'];?>" name="thread_ppi" autocomplete="off"
                                
                                class="thread_ppi form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <br>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="gsm_count_warp">GSM
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" readonly id="gsm_count_warp" value="<?php echo $row_bleaching['gsm_count_warp'];?>" name="gsm_count_warp" autocomplete="off"
                                
                                class="gsm_count_warp form-control col-md-7 col-xs-12" >
                            </div>
                          </div>

                          <br>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="wash_dry_warp_before_iron">Dimensional Change to Washing & Drying Warp (Befor Iron) (%) <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" readonly id="wash_dry_warp_before_iron" value="<?php echo $row_bleaching['wash_dry_warp_before_iron'];?>" name="wash_dry_warp_before_iron" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <br>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="wash_dry_weft_before_iron">Dimensional Change to Washing & Drying Weft (Befor Iron) (%) <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" readonly id="wash_dry_weft_before_iron" value="<?php echo $row_bleaching['wash_dry_weft_before_iron'];?>" name="wash_dry_weft_before_iron" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <br>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="wash_dry_warp_after_iron">Dimensional Change to Washing & Drying Warp (After Iron) (%) <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" readonly id="wash_dry_warp_after_iron" value="<?php echo $row_bleaching['wash_dry_warp_after_iron'];?>" name="wash_dry_warp_after_iron" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <br>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="wash_dry_weft_after_iron">Dimensional Change to Washing & Drying Weft (After Iron) (%) <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" readonly id="wash_dry_weft_after_iron" value="<?php echo $row_bleaching['wash_dry_weft_after_iron'];?>" name="wash_dry_weft_after_iron" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <br>

                          <div class="form-group text-center">
                            <label style="margin-top: 10px;" class="control-label col-md-3 col-sm-3 col-xs-12" for="rubbing">Rubbing 
                            </label>
                            <div class="col-md-3 col-sm-3 col-xs-5">
                              <span>Rubbing Dry</span>
                              <input type="text" readonly id="rubbing_dry" name="rubbing_dry" value="<?php echo $row_bleaching['rubbing_dry'];?>" class="form-control col-md-7 col-xs-12">
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-5">
                              <span>Rubbing Wet</span>
                              <input type="text" readonly id="rubbing_wet" name="rubbing_wet" value="<?php echo $row_bleaching['rubbing_wet'];?>" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <br>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tensile_warp">Tensile Properties Warp ( <?php echo $row_for_finishing_standard['tensile_warp_unit'] ?> ) 
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" readonly id="tensile_warp" value="<?php echo $row_bleaching['tensile_warp'];?>" name="tensile_warp" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <br>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tensile_weft">Tensile Properties Weft ( <?php echo $row_for_finishing_standard['tensile_weft_unit'] ?> ) 
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" readonly id="tensile_weft" value="<?php echo $row_bleaching['tensile_weft'];?>" name="tensile_weft" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <br>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tear_force_warp">Tear Force Warp ( <?php echo $row_for_finishing_standard['tear_force_warp_unit'] ?> ) 
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" readonly id="tear_force_warp" value="<?php echo $row_bleaching['tear_force_warp'];?>" name="tear_force_warp" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <br>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tear_force_weft">Tear Force Weft ( <?php echo $row_for_finishing_standard['tear_force_weft_unit'] ?> ) 
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" readonly id="tear_force_weft" value="<?php echo $row_bleaching['tear_force_weft'];?>" name="tear_force_weft" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <br>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="washing_ph">Fabric pH
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" readonly id="washing_ph" value="<?php echo $row_bleaching['washing_ph'];?>" name="washing_ph" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <br>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="pilling">Pilling
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" readonly id="pilling" value="<?php echo $row_bleaching['pilling'];?>" name="pilling" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <br>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="status">Status <span class="required">*</span>
                            </label>
                            <div readonly class="col-md-6 col-sm-6 col-xs-12">
                              <p>
                                 OK :
                                <input type="radio" class="flat" name="status" id="ok" value="1" <?php if($row_bleaching['status'] == '1') echo 'checked'; ?> />
                                 Not OK :
                                <input type="radio" class="flat" name="status" id="notok" value="0" <?php if($row_bleaching['status'] == '0') echo 'checked'; ?> />
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

                        <form action="edit_curing_steaming.php" method="post" style="display: inline; padding-left: 200px;">
                          <input type="hidden" id="curing_id" name="curing_id" value="<?php echo $curing_id; ?>">
                          <input type="hidden" id="route_issue_id" name="route_issue_id" value="<?php echo $route_issue_id; ?>">
                          <input type="hidden" id="greige_issunce_id" name="greige_issunce_id" value="<?php echo $greige_issunce_id; ?>">
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
