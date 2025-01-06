<?php
session_start();
require_once("../includes/db_session_chk.php");

$route_issue_id = $_POST['route_issue_id'];
$greige_issunce_id = $_POST['greige_issunce_id'];
$pp_no_id = $_POST['pp_no_id'];
$pp_details_id = $_POST['pp_details_id'];
$scouring_bleaching_id = $_POST['scouring_bleaching_id'];

if ($route_issue_id == "" || is_null($route_issue_id) || empty($route_issue_id) || 
    $bleaching_id == "" || is_null($bleaching_id) || empty($bleaching_id)) 
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
                        <h2>Scouring & Bleaching Form View</h2>
                        <ul class="nav navbar-right panel_toolbox">
                          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                          </li>
                        </ul>
                        <div class="clearfix"></div>
                      </div>
                      <div class="x_content">
                        <br />
                        <?php
                          $sql_for_scouring_bleaching = "SELECT *
                                         FROM scouring_bleaching
                                         WHERE route_issue_id = '$route_issue_id'
                                         AND scouring_bleaching_id = '$scouring_bleaching_id'
                                        ";
                          $res_for_scouring_bleaching = mysqli_query($con, $sql_for_scouring_bleaching);
                          $row_bleaching = mysqli_fetch_assoc($res_for_scouring_bleaching);
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

                          <div class="form-group text-center">
                            <label style="margin-top: 10px;" class="control-label col-md-3 col-sm-3 col-xs-12" for="absorbency">Absorbency <span class="required">*</span>
                            </label>
                            <div class="col-md-2 col-sm-2 col-xs-4">
                              <span>Left</span>
                              <input type="text" id="absorbency_left" readonly name="absorbency_left" value="<?php echo $row_bleaching['absorbency_left'];?>" class="form-control col-md-7 col-xs-12">
                            </div>
                            <div class="col-md-2 col-sm-2 col-xs-4">
                              <span>Center</span>
                              <input type="text" id="absorbency_center" readonly name="absorbency_center" value="<?php echo $row_bleaching['absorbency_center'];?>" class="form-control col-md-7 col-xs-12">
                            </div>
                            <div class="col-md-2 col-sm-2 col-xs-4">
                              <span>Right</span>
                              <input type="text" id="absorbency_right" readonly name="absorbency_right" value="<?php echo $row_bleaching['absorbency_right'];?>" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <br>

                          <div class="form-group text-center">
                            <label style="margin-top: 10px;" class="control-label col-md-3 col-sm-3 col-xs-12" for="size">Size <span class="required">*</span>
                            </label>
                            <div class="col-md-2 col-sm-2 col-xs-4">
                              <span>Left</span>
                              <input type="text" id="size_left" readonly name="size_left" value="<?php echo $row_bleaching['size_left'];?>" class="form-control col-md-7 col-xs-12">
                            </div>
                            <div class="col-md-2 col-sm-2 col-xs-4">
                              <span>Center</span>
                              <input type="text" id="size_center" readonly name="size_center" value="<?php echo $row_bleaching['size_center'];?>" class="form-control col-md-7 col-xs-12">
                            </div>
                            <div class="col-md-2 col-sm-2 col-xs-4">
                              <span>Right</span>
                              <input type="text" id="size_right" readonly name="size_right" value="<?php echo $row_bleaching['size_right'];?>" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <br>

                          <div class="form-group text-center">
                            <label style="margin-top: 10px;" class="control-label col-md-3 col-sm-3 col-xs-12" for="whiteness">Whiteness <span class="required">*</span>
                            </label>
                            <div class="col-md-2 col-sm-2 col-xs-4">
                              <span>Left</span>
                              <input type="text" id="whiteness_left" readonly name="whiteness_left" value="<?php echo $row_bleaching['whiteness_left'];?>" class="form-control col-md-7 col-xs-12">
                            </div>
                            <div class="col-md-2 col-sm-2 col-xs-4">
                              <span>Center</span>
                              <input type="text" id="whiteness_center" readonly name="whiteness_center" value="<?php echo $row_bleaching['whiteness_center'];?>" class="form-control col-md-7 col-xs-12">
                            </div>
                            <div class="col-md-2 col-sm-2 col-xs-4">
                              <span>Right</span>
                              <input type="text" id="whiteness_right" readonly name="whiteness_right" value="<?php echo $row_bleaching['whiteness_right'];?>" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <br>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="pilling">Pilling <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="pilling" name="pilling" readonly value="<?php echo $row_bleaching['pilling'];?>" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <br>

                          <div class="form-group text-center">
                            <label style="margin-top: 10px;" class="control-label col-md-3 col-sm-3 col-xs-12" for="ph">pH <span class="required">*</span>
                            </label>
                            <div class="col-md-2 col-sm-2 col-xs-4">
                              <span>Left</span>
                              <input type="text" id="ph_left" readonly name="ph_left" value="<?php echo $row_bleaching['ph_left'];?>" class="form-control col-md-7 col-xs-12">
                              <input type="hidden" id="route_issue_id" name="route_issue_id" value="<?php echo $route_issue_id; ?>">
                            </div>
                            <div class="col-md-2 col-sm-2 col-xs-4">
                              <span>Center</span>
                              <input type="text" id="ph_center" readonly name="ph_center" value="<?php echo $row_bleaching['ph_center'];?>" class="form-control col-md-7 col-xs-12">
                            </div>
                            <div class="col-md-2 col-sm-2 col-xs-4">
                              <span>Right</span>
                              <input type="text" id="ph_right" readonly name="ph_right" value="<?php echo $row_bleaching['ph_right'];?>" class="form-control col-md-7 col-xs-12">
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


                        <form action="edit_scouring_bleaching.php" method="post" style="display: inline; padding-left: 200px;">
                          <input type="hidden" id="route_issue_id" name="route_issue_id" value="<?php echo $route_issue_id; ?>">
        				          <input type="hidden" id="scouring_bleaching_id" name="scouring_bleaching_id" value="<?php echo $scouring_bleaching_id; ?>">
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
