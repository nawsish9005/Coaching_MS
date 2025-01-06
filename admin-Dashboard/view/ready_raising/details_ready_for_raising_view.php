<?php
session_start();
require_once("../includes/db_session_chk.php");

$route_issue_id = $_POST['route_issue_id'];
$greige_issunce_id = $_POST['greige_issunce_id'];
$pp_no_id = $_POST['pp_no_id'];
$pp_details_id = $_POST['pp_details_id'];
$ready_for_raising_id = $_POST['ready_for_raising_id'];

if ($route_issue_id == "" || is_null($route_issue_id) || empty($route_issue_id) || 
    $ready_for_raising_id == "" || is_null($ready_for_raising_id) || empty($ready_for_raising_id)) 
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
                        <h2>ready_for_raising Form View</h2>
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
                                         FROM ready_for_raising
                                         WHERE route_issue_id = '$route_issue_id'
                                         AND ready_for_raising_id = '$ready_for_raising_id'
                                        ";
                          $res_for_bleaching = mysqli_query($con, $sql_for_bleaching);
                          $row_bleaching = mysqli_fetch_assoc($res_for_bleaching);
                        ?>
                        <form id="ready_for_raising_form" name="ready_for_raising_form" data-parsley-validate class="form-horizontal form-label-left">

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
                          <br>


                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="p_qty">P. Qty <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="p_qty" name="p_qty" readonly value="<?php echo $row_bleaching['p_qty'];?>" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>
                          <br>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="s_or_e">Short/Excess <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="s_or_e" name="s_or_e" readonly value="<?php echo $row_bleaching['s_or_e'];?>" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <br>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="trf">TRF No. <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="trf" name="trf" readonly value="<?php echo $row_bleaching['trf'];?>" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>
                          <br>

                           <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="machine">Machine <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="machine" name="machine" readonly value="<?php echo $row_bleaching['machine'];?>" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>
                          <br>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="face_back">Face/Back <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="face_back" name="face_back" readonly value="<?php echo $row_bleaching['face_back'];?>" class="form-control col-md-7 col-xs-12">
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

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ready_for_raising_quality">Face/Back <span class="required">*</span>
                            </label>
                            <div readonly class="col-md-6 col-sm-6 col-xs-12">
                              <p>
                                 OK :
                                <input disabled type="radio" class="flat" name="ready_for_raising_quality" id="ok" value="1" <?php if($row_bleaching['ready_for_raising_quality'] == '1') echo 'checked'; ?> />
                                 Not OK :
                                <input disabled type="radio" class="flat" name="ready_for_raising_quality" id="notok" value="0" <?php if($row_bleaching['ready_for_raising_quality'] == '0') echo 'checked'; ?> />
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


                        <form action="edit_ready_for_raising.php" method="post" style="display: inline; padding-left: 200px;">
                          <input type="hidden" id="route_issue_id" name="route_issue_id" value="<?php echo $route_issue_id; ?>">
        				          <input type="hidden" id="ready_for_raising_id" name="ready_for_raising_id" value="<?php echo $ready_for_raising_id; ?>">
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
