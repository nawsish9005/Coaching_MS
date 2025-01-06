<?php
session_start();
require_once("../includes/db_session_chk.php");

$route_issue_id = $_POST['route_issue_id'];
$greige_issunce_id = $_POST['greige_issunce_id'];
$pp_no_id = $_POST['pp_no_id'];
$pp_details_id = $_POST['pp_details_id'];
$singe_id = $_POST['singe_id'];

if ($route_issue_id == "" || is_null($route_issue_id) || empty($route_issue_id) || 
    $singe_id == "" || is_null($singe_id) || empty($singe_id)) 
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
		        <h2>Singing Edit Form</h2>
		        <ul class="nav navbar-right panel_toolbox">
		          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
		          </li>
		        </ul>
		        <div class="clearfix"></div>
		      </div>
		      <div class="x_content">
		        <br />

		        <?php
		          $sql_for_singe = "SELECT *
		                         FROM singe
		                         WHERE route_issue_id = '$route_issue_id'
		                         AND singe_id = '$singe_id'
		                         AND active = '1'
		                        ";
		          $res_for_singe  = mysqli_query($con, $sql_for_singe);
		          $row_singe  = mysqli_fetch_assoc($res_for_singe);
		        ?>

		        <form id="singe_form" name="singe_form" data-parsley-validate class="form-horizontal form-label-left">

		          <div class="form-group">
		            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="pp">Date <span class="required">*</span>
		            </label>
		            <div class="col-md-6 col-sm-6 col-xs-6">
		              <div class='input-group date' id='myDatepicker2'>
		                <input type='text' readonly class="form-control" id="custom_date" name="custom_date" value="<?php echo $row_singe['date'] ?>"/>
		                <span class="input-group-addon">
		                   <span class="glyphicon glyphicon-calendar"></span>
		                </span>
		              </div>
		            </div>
		          </div>

		          <div class="form-group">
		            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="batcher">Batcher <span class="required">*</span>
		            </label>
		            <div class="col-md-6 col-sm-6 col-xs-12">
		              <input type="text" id="batcher" readonly name="batcher" value="<?php echo $row_singe['batcher'] ?>" class="form-control col-md-7 col-xs-12">
		            </div>
		          </div>

		          <div class="form-group">
		            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="p_width">Process Width <span class="required">*</span>
		            </label>
		            <div class="col-md-6 col-sm-6 col-xs-12">
		              <input type="text" id="p_width" readonly name="p_width" value="<?php echo $row_singe['p_width'] ?>" class="form-control col-md-7 col-xs-12">
		            </div>
		          </div>

		          <div class="form-group">
		            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="p_qty">Process Qantity <span class="required">*</span>
		            </label>
		            <div class="col-md-6 col-sm-6 col-xs-12">
		              <input type="text" id="p_qty" readonly name="p_qty" value="<?php echo $row_singe['p_qty'] ?>" class="form-control col-md-7 col-xs-12">
		            </div>
		          </div>

		          <div class="form-group">
		            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="m_c_name">Machine Name <span class="required">*</span>
		            </label>
		            <div class="col-md-6 col-sm-6 col-xs-12">
		              <input type="text" id="m_c_name" readonly name="m_c_name" value="<?php echo $row_singe['m_c_name'] ?>" class="form-control col-md-7 col-xs-12">
		            </div>
		          </div>

		          <div class="form-group">
		            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="flame">Flame Intensity (mbar) <span class="required">*</span>
		            </label>
		            <div class="col-md-6 col-sm-6 col-xs-12">
		              <input type="text" id="flame" readonly name="flame" value="<?php echo $row_singe['flame'] ?>" class="form-control col-md-7 col-xs-12">
		            </div>
		          </div>

		          <div class="form-group">
		            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="speed">Speed (M/Min) <span class="required">*</span>
		            </label>
		            <div class="col-md-6 col-sm-6 col-xs-12">
		              <input type="text" id="speed" readonly name="speed" value="<?php echo $row_singe['speed'] ?>" class="form-control col-md-7 col-xs-12">
		            </div>
		          </div>

		          <div class="form-group">
		            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="temp">Bath Temparature (C) <span class="required">*</span>
		            </label>
		            <div class="col-md-6 col-sm-6 col-xs-12">
		              <input type="text" id="temp" readonly name="temp" value="<?php echo $row_singe['temp'] ?>" class="form-control col-md-7 col-xs-12">
		            </div>
		          </div>

		          <!-- <div class="form-group">
		            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="singe_quality">Singe Quality <span class="required">*</span>
		            </label>
		            <div class="col-md-6 col-sm-6 col-xs-12">
		              <input type="text" id="singe_quality" value="<?php echo $row_singe['singe_quality'] ?>" name="singe_quality" class="form-control col-md-7 col-xs-12">
		            </div>
		          </div> -->

		          <div class="form-group">
		            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ph">Bath pH <span class="required">*</span>
		            </label>
		            <div class="col-md-6 col-sm-6 col-xs-12">
		              <input type="text" id="ph" readonly name="ph" value="<?php echo $row_singe['ph'] ?>" class="form-control col-md-7 col-xs-12">
		            </div>
		          </div>

		          <div class="form-group">
		            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="visual_assessment">Visual Assessment(Singe Quality) <span class="required">*</span>
		            </label>
		            <div class="col-md-6 col-sm-6 col-xs-12">
		              <input type="text" id="visual_assessment" readonly name="visual_assessment" value="<?php echo $row_singe['visual_assessment'] ?>" class="form-control col-md-7 col-xs-12">
		            </div>
		          </div>

		          <div class="form-group">
		            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="status">Status <span class="required">*</span>
		            </label>
		            <div readonly class="col-md-6 col-sm-6 col-xs-12">
		              <p>
		                 OK :
		                <input type="radio" class="flat" name="status" id="ok" value="1" <?php if($row_singe['status'] == '1') echo "checked"; ?> />
		                 Not OK :
		                <input type="radio" class="flat" name="status" id="notok" value="0" <?php if($row_singe['status'] == '0') echo "checked"; ?>/>
		              </p>
		            </div>
		          </div>

		          <div class="form-group">
		            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="remarks">Remarks <span class="required">*</span>
		            </label>
		            <div class="col-md-6 col-sm-6 col-xs-12">
		              <input type="text" readonly id="remarks" name="remarks" value="<?php echo $row_singe['remarks'] ?>" class="form-control col-md-7 col-xs-12">
		            </div>
		          </div>

		        </form>

		        <form action="edit_singe.php" method="post" style="display: inline; padding-left: 200px;">
		          <input type="hidden" id="route_issue_id" name="route_issue_id" value="<?php echo $route_issue_id; ?>">
		          <input type="hidden" id="singe_id" name="singe_id" value="<?php echo $singe_id; ?>">
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
