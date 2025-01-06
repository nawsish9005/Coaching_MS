<?php
session_start();
require_once("../includes/db_session_chk.php");
$greige_issunce_id = $_POST['greige_issunce_id'];
$pp_no_id = $_POST['pp_no_id'];
$pp_details_id = $_POST['pp_details_id'];
?>

<div class="x_panel">
	<div class="x_title">
		<h2>Edit Route Selection Form</h2>
		<ul class="nav navbar-right panel_toolbox">
		  	<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
		  	</li>
		</ul>
		<div class="clearfix"></div>
	</div>

	<?php 
	$pp_details_sql = "SELECT 
	                        *
	                   FROM
	                        route_issue
	                   WHERE
	                        greige_issunce_id = '$greige_issunce_id'
	                    AND active = '1'

	                   ORDER BY process_number ASC
	                  ";
	$pp_details_res = mysqli_query($con, $pp_details_sql) or die(mysqli_error($con));
	$number_row = mysqli_num_rows($pp_details_res);
	?>

	<div class="x_content">
	<div class="col-md-12 center-margin">
	  <form id="route_selected_form" name="route_selected_form" data-parsley-validate class="form-horizontal form-label-left">
	    <div>
	        <input type="hidden" value="<?php echo $number_row; ?>" id="row-counter" name="row-counter" class="form-control col-md-7 col-xs-12">
	        <input type="hidden" value="<?php echo $greige_issunce_id; ?>" id="greige_issunce_id" name="greige_issunce_id" class="form-control col-md-7 col-xs-12">
	        <input type="hidden" value="<?php echo $pp_no_id ?>" id="pp_no_id" name="pp_no_id" class="form-control col-md-7 col-xs-12">
	        <input type="hidden" value="<?php echo $pp_details_id ?>" id="pp_details_id" name="pp_details_id" class="form-control col-md-7 col-xs-12">
	        <input type="hidden" value="<?php echo $row['pp_no'] ?>" id="pp_no" name="pp_no" class="form-control col-md-7 col-xs-12">
	        <input type="hidden" value="<?php echo $number_row; ?>" id="row-name-counter" name="row-name-counter" class="form-control col-md-7 col-xs-12">
	        <input type="hidden" value="<?php echo $number_row; ?>" id="database_row_count" name="database_row_count" class="form-control col-md-7 col-xs-12">
	    </div>
	    <?php 
	      $gray_issue_details_sql = "SELECT 
			                              *
			                         FROM
			                              greige_issunce
			                         WHERE
			                              greige_issunce_id = '$greige_issunce_id'
			                          AND active = '1'

			                         ORDER BY greige_issunce_id ASC
			                        ";
	      $gray_issue_details_res = mysqli_query($con, $gray_issue_details_sql) or die(mysqli_error($con));
	      $gray_issue_row = mysqli_fetch_assoc($gray_issue_details_res);
	    ?>
	    <div class="form-group">
	      <div class="col-md-6 col-sm-6 col-xs-12">
	        <p>
	           Active :
	          <input type="radio" class="flat" name="active" id="active" value="1" <?php if($gray_issue_row['active']=='1') echo "checked"; ?>/> 

	           Not Active :
	          <input type="radio" class="flat" name="active" id="notactive" value="0" <?php if($gray_issue_row['active']=='0') echo "checked"; ?> />
	        </p>
	      </div>
	    </div>
	    <div class="form-group">
	      <label class="control-label" for="version">Route Selection <span class="required">*</span>
	      </label>
	      <?php 
	        $i = 1;
	          while ($pp_details_row = mysqli_fetch_assoc($pp_details_res)) 
	          {
	          	$complete = $pp_details_row['complete'];



	      ?>
	        <div class="full_row col-md-12 col-sm-12 col-xs-12" id="<?php echo $i; ?>" style="<?php if($complete == 1) echo "pointer-events: none;" ?>">
	          <div class="col-md-5 col-sm-5 col-xs-4">
	            <select id="<?php echo "route".$i; ?>" name="<?php echo "route".$i; ?>" class="version-route select2 form-control col-md-12 col-xs-12">
	              <option value="" selected="selected">Select Route</option>
	              <?php
	                $pp_route = $pp_details_row['route'];

	                $route_sql = "SELECT * FROM route ORDER BY route_name";
	                $route_res = mysqli_query($con, $route_sql) or die(mysqli_error($con));
	                while ($route_row = mysqli_fetch_assoc($route_res)) 
	                {
	                    ?>

	                    <option <?php if($route_row['route_id'] == $pp_route){echo "selected";}?> value="<?php echo $route_row['route_id'];?>"> <?php echo $route_row['route_name'];?></option>

	                    <?php
	                }
	              ?>
	            </select>
	          </div>

	          <div class="col-md-5 col-sm-5 col-xs-4">
	            <select id="<?php echo "process".$i; ?>" name="<?php echo "process".$i; ?>" class="version-process select2 form-control col-md-12 col-xs-12">
	              <?php 
	                $process = $pp_details_row['process'];
	              ?>
	              <option <?php if($process == 'process') echo"selected" ;?> value="process">Process</option>
	              <option value="reprocess" <?php if($process == 'reprocess') echo"selected";?> >Reprocess</option>
	            </select>
	          </div>

	          <div class="col-md-1 col-sm-1 col-xs-4">
	            <input id="<?php echo "process_number".$i; ?>" name="<?php echo "process_number".$i; ?>" value="<?php echo $pp_details_row['process_number'] ?>" placeholder="Number" class="version-number form-control col-md-12 col-xs-12" type="text">
	            <input id="<?php echo "route_issue_id".$i; ?>" name="<?php echo "route_issue_id".$i; ?>" value="<?php echo $pp_details_row['route_issue_id'] ?>" type="hidden">
	            <input id="<?php echo "complete".$i; ?>" name="<?php echo "complete".$i; ?>" value="<?php echo $pp_details_row['complete'] ?>" type="hidden">
	          </div>

	          <?php 
	            if ($i !== 1) 
	            {
	              ?>
	                <div class="col-md-1 col-sm-1 col-xs-2">
	                  <button type="button" class="btn-xs btn-danger btn_remove" id="<?php echo ($i); ?>" onclick="rmv_row_for_edit(this.id);">X</button>
	                </div>
	              <?php
	            }
	          ?>
	        </div>
	      <?php 
	        ++$i;
	      }
	      ?>

	      <div id="new_dropzone_section_version">
	      </div>
	    </div>

	    <button type='button' class="btn-xs btn-success" id='add_route_btn' value='' style="margin-top: 3px;" onclick="addnewroute();">Add Route</button>
	    
	    <div class="ln_solid"></div>
	    <div class="form-group">
	      <div class="col-md-6 col-sm-6 col-xs-12">
	        <button type="button" onclick="update_route_data();" class="btn btn-success">Update</button>
	      </div>
	    </div>
	  </form>
	</div>
</div>
</div>

<?php  ?>