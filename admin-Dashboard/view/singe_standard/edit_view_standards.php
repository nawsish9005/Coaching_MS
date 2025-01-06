<?php
session_start();
require_once("../includes/db_session_chk.php");
$pp_no = $_POST['pp_no'];
$color = $_POST['color'];
$version = $_POST['version'];
$gray_width = $_POST['gray_width'];
$pp_no_id = $_POST['pp_id_number'];
$pp_details_id = $_POST['pp_details_id'];

if (($pp_no == '') || (empty($pp_no)) || is_null($pp_no) || ($color == '') || (empty($color)) || is_null($color) || ($version == '') || (empty($version)) || is_null($version) || ($gray_width == '') || (empty($gray_width)) || is_null($gray_width) || ($pp_no_id == '') || (empty($pp_no_id)) || is_null($pp_no_id) || ($pp_details_id == '') || (empty($pp_details_id)) || is_null($pp_details_id)) 
{
   header("Location: gray_issue.php");
}

$sql_for_gray_variable = "SELECT * FROM gray_variable WHERE pp_no_id = '$pp_no_id' AND pp_details_id = '$pp_details_id' AND active = '1' ";
$res_for_gray_variable = mysqli_query($con , $sql_for_gray_variable);
$row_for_gray_variable = mysqli_fetch_array($res_for_gray_variable);
?>


<div class="x_panel">
  <div class="x_title">
    <h2>Greige Standards Edit Form</h2>
    <ul class="nav navbar-right panel_toolbox">
      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
      </li>
    </ul>
    <div class="clearfix"></div>
  </div>
  <div class="x_content">
    <br />

    <form id="gray_variable_form" name="gray_variable_form" data-parsley-validate class="form-horizontal form-label-left">
      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="yarn_count">Yarn Count Warp<span class="required">*</span>
        </label>
        <div class="col-md-1 col-sm-1 col-xs-2">
          <select id="yarn_warp_cond1" name="yarn_warp_cond1" onchange="yarn_warp_condition()" class="yarn_warp_cond1 form-control col-md-12 col-xs-12">
            <option value="">Select Condition</option>
            <option value="1" <?php if($row_for_gray_variable['yarn_warp_cond1'] == 1) {echo "selected";} ?> >(</option>
            <option <?php if($row_for_gray_variable['yarn_warp_cond1'] == 2) {echo "selected";} ?> value="2">[</option>
          </select>
        </div>
        <div class="col-md-1 col-sm-1 col-xs-2">
          <input type="text" id="yarn_warp_value1" value="<?php echo $row_for_gray_variable['yarn_warp_value1']; ?>" name="yarn_warp_value1" class="yarn_warp_value1 form-control col-md-7 col-xs-12">
        </div>
        <div class="col-md-1 col-sm-1 col-xs-2">
        </div> 
        <div class="col-md-1 col-sm-1 col-xs-2">
          --
        </div> 
        <div class="col-md-1 col-sm-1 col-xs-2">
          <input type="text" id="yarn_warp_value2" value="<?php echo $row_for_gray_variable['yarn_warp_value2']; ?>" name="yarn_warp_value2" class="yarn_warp_value2 form-control col-md-7 col-xs-12">
        </div>
        <div class="col-md-1 col-sm-1 col-xs-2">
          <select id="yarn_warp_cond2" name="yarn_warp_cond2" class="yarn_warp_cond2 form-control col-md-12 col-xs-12">
            <option value="">Select Condition</option>
            <option <?php if($row_for_gray_variable['yarn_warp_cond2'] == 1) {echo "selected";} ?> value="1">)</option>
            <option <?php if($row_for_gray_variable['yarn_warp_cond2'] == 2) {echo "selected";} ?>  value="2">]</option>
          </select>
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="yarn_count">Yarn Count Weft<span class="required">*</span>
        </label>
        <div class="col-md-1 col-sm-1 col-xs-2">
          <select id="yarn_weft_cond1" name="yarn_weft_cond1" onchange="yarn_weft_condition()" class="yarn_weft_cond1 form-control col-md-12 col-xs-12">
            <option value="">Select Condition</option>
            <option <?php if($row_for_gray_variable['yarn_weft_cond1'] == 1) {echo "selected";} ?>  value="1">(</option>
            <option <?php if($row_for_gray_variable['yarn_weft_cond1'] == 2) {echo "selected";} ?> value="2">[</option>
          </select>
        </div>
        <div class="col-md-1 col-sm-1 col-xs-2">
          <input type="text" id="yarn_weft_value1" value="<?php echo $row_for_gray_variable['yarn_weft_value1']; ?>" name="yarn_weft_value1" class="yarn_weft_value1 form-control col-md-7 col-xs-12">
        </div>
        <div class="col-md-1 col-sm-1 col-xs-2">
        </div> 
        <div class="col-md-1 col-sm-1 col-xs-2">
          --
        </div> 
        <div class="col-md-1 col-sm-1 col-xs-2">
          <input type="text" id="yarn_weft_value2" value="<?php echo $row_for_gray_variable['yarn_weft_value2']; ?>" name="yarn_weft_value2" class="yarn_weft_value2 form-control col-md-7 col-xs-12">
        </div>
        <div class="col-md-1 col-sm-1 col-xs-2">
          <select id="yarn_weft_cond2" name="yarn_weft_cond2" class="yarn_weft_cond2 form-control col-md-12 col-xs-12">
            <option value="">Select Condition</option>
            <option <?php if($row_for_gray_variable['yarn_weft_cond2'] == 1) {echo "selected";} ?> value="1">)</option>
            <option <?php if($row_for_gray_variable['yarn_weft_cond2'] == 2) {echo "selected";} ?> value="2">]</option>
          </select>
        </div>
      </div>

      <br>

      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="yarn_count">Thread Count EPI<span class="required">*</span>
        </label>
        <div class="col-md-1 col-sm-1 col-xs-2">
          <select id="thread_epi_cond1" name="thread_epi_cond1" onchange="thread_epi_condition()" class="thread_epi_cond1 form-control col-md-12 col-xs-12">
            <option value="">Select Condition</option>
            <option <?php if($row_for_gray_variable['thread_epi_cond1'] == 1) {echo "selected";} ?> value="1">(</option>
            <option <?php if($row_for_gray_variable['thread_epi_cond1'] == 2) {echo "selected";} ?>  value="2">[</option>
          </select>
        </div>
        <div class="col-md-1 col-sm-1 col-xs-2">
          <input type="text" id="thread_epi_value1" value="<?php echo $row_for_gray_variable['thread_epi_value1']; ?>" name="thread_epi_value1" class="thread_epi_value1 form-control col-md-7 col-xs-12">
        </div>
        <div class="col-md-1 col-sm-1 col-xs-2">
        </div> 
        <div class="col-md-1 col-sm-1 col-xs-2">
          --
        </div> 
        <div class="col-md-1 col-sm-1 col-xs-2">
          <input type="text" id="thread_epi_value2" value="<?php echo $row_for_gray_variable['thread_epi_value2']; ?>" name="thread_epi_value2" class="thread_epi_value2 form-control col-md-7 col-xs-12">
        </div>
        <div class="col-md-1 col-sm-1 col-xs-2">
          <select id="thread_epi_cond2" name="thread_epi_cond2" class="thread_epi_cond2 form-control col-md-12 col-xs-12">
            <option value="">Select Condition</option>
            <option <?php if($row_for_gray_variable['thread_epi_cond2'] == 1) {echo "selected";} ?> value="1">)</option>
            <option <?php if($row_for_gray_variable['thread_epi_cond2'] == 2) {echo "selected";} ?> value="2">]</option>
          </select>
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="yarn_count">Thread Count PPI<span class="required">*</span>
        </label>
        <div class="col-md-1 col-sm-1 col-xs-2">
          <select id="thread_ppi_cond1" name="thread_ppi_cond1" onchange="thread_ppi_condition()" class="thread_ppi_cond1 form-control col-md-12 col-xs-12">
            <option value="">Select Condition</option>
            <option <?php if($row_for_gray_variable['thread_ppi_cond1'] == 1) {echo "selected";} ?> value="1">(</option>
            <option <?php if($row_for_gray_variable['thread_ppi_cond1'] == 2) {echo "selected";} ?> value="2">[</option>
          </select>
        </div>
        <div class="col-md-1 col-sm-1 col-xs-2">
          <input type="text" id="thread_ppi_value1" value="<?php echo $row_for_gray_variable['thread_ppi_value1']; ?>" name="thread_ppi_value1" class="thread_ppi_value1 form-control col-md-7 col-xs-12">
        </div>
        <div class="col-md-1 col-sm-1 col-xs-2">
        </div> 
        <div class="col-md-1 col-sm-1 col-xs-2">
          --
        </div> 
        <div class="col-md-1 col-sm-1 col-xs-2">
          <input type="text" id="thread_ppi_value2" value="<?php echo $row_for_gray_variable['thread_ppi_value2']; ?>" name="thread_ppi_value2" class="thread_ppi_value2 form-control col-md-7 col-xs-12">
        </div>
        <div class="col-md-1 col-sm-1 col-xs-2">
          <select id="thread_ppi_cond2" name="thread_ppi_cond2" class="thread_ppi_cond2 form-control col-md-12 col-xs-12">
            <option value="">Select Condition</option>
            <option <?php if($row_for_gray_variable['thread_ppi_cond2'] == 1) {echo "selected";} ?> value="1">)</option>
            <option <?php if($row_for_gray_variable['thread_ppi_cond2'] == 2) {echo "selected";} ?> value="2">]</option>
          </select>
        </div>
      </div>

      <br>

      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="yarn_count">GSM<span class="required">*</span>
        </label>
        <div class="col-md-1 col-sm-1 col-xs-2">
          <select id="gsm_warp_cond1" name="gsm_warp_cond1" onchange="gsm_condition()" class="gsm_warp_cond1 form-control col-md-12 col-xs-12">
            <option value="">Select Condition</option>
            <option <?php if($row_for_gray_variable['gsm_warp_cond1'] == 1) {echo "selected";} ?> value="1">(</option>
            <option <?php if($row_for_gray_variable['gsm_warp_cond1'] == 2) {echo "selected";} ?> value="2">[</option>
          </select>
        </div>
        <div class="col-md-1 col-sm-1 col-xs-2">
          <input type="text" id="gsm_warp_value1" value="<?php echo $row_for_gray_variable['gsm_warp_value1']; ?>" name="gsm_warp_value1" class="gsm_warp_value1 form-control col-md-7 col-xs-12">
        </div>
        <div class="col-md-1 col-sm-1 col-xs-2">
        </div> 
        <div class="col-md-1 col-sm-1 col-xs-2">
          --
        </div> 
        <div class="col-md-1 col-sm-1 col-xs-2">
          <input type="text" id="gsm_warp_value2" value="<?php echo $row_for_gray_variable['gsm_warp_value2']; ?>" name="gsm_warp_value2" class="gsm_warp_value2 form-control col-md-7 col-xs-12">
        </div>
        <div class="col-md-1 col-sm-1 col-xs-2">
          <select id="gsm_warp_cond2" name="gsm_warp_cond2" class="gsm_warp_cond2 form-control col-md-12 col-xs-12">
            <option value="">Select Condition</option>
            <option <?php if($row_for_gray_variable['gsm_warp_cond2'] == 1) {echo "selected";} ?> value="1">)</option>
            <option <?php if($row_for_gray_variable['gsm_warp_cond2'] == 2) {echo "selected";} ?> value="2">]</option>
          </select>
        </div>
      </div>

      <br>

      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="yarn_count">Fiber Content Warp<span class="required">*</span>
        </label>
        <div class="col-md-1 col-sm-1 col-xs-2">
          <select id="fiber_warp_cond1" name="fiber_warp_cond1" onchange="fiber_warp_condition()" class="fiber_warp_cond1 form-control col-md-12 col-xs-12">
            <option value="">Select Condition</option>
            <option <?php if($row_for_gray_variable['fiber_warp_cond1'] == 1) {echo "selected";} ?> value="1">(</option>
            <option <?php if($row_for_gray_variable['fiber_warp_cond1'] == 2) {echo "selected";} ?> value="2">[</option>
          </select>
        </div>
        <div class="col-md-1 col-sm-1 col-xs-2">
          <input type="text" id="fiber_warp_value1" value="<?php echo $row_for_gray_variable['fiber_warp_value1']; ?>" name="fiber_warp_value1" class="fiber_warp_value1 form-control col-md-7 col-xs-12">
        </div>
        <div class="col-md-1 col-sm-1 col-xs-2">
        </div> 
        <div class="col-md-1 col-sm-1 col-xs-2">
          --
        </div> 
        <div class="col-md-1 col-sm-1 col-xs-2">
          <input type="text" id="fiber_warp_value2" value="<?php echo $row_for_gray_variable['fiber_warp_value2']; ?>" name="fiber_warp_value2" class="fiber_warp_value2 form-control col-md-7 col-xs-12">
        </div>
        <div class="col-md-1 col-sm-1 col-xs-2">
          <select id="fiber_warp_cond2" name="fiber_warp_cond2" class="fiber_warp_cond2 form-control col-md-12 col-xs-12">
            <option value="">Select Condition</option>
            <option <?php if($row_for_gray_variable['fiber_warp_cond2'] == 1) {echo "selected";} ?> value="1">)</option>
            <option <?php if($row_for_gray_variable['fiber_warp_cond2'] == 2) {echo "selected";} ?> value="2">]</option>
          </select>
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="yarn_count">Fiber Content Weft<span class="required">*</span>
        </label>
        <div class="col-md-1 col-sm-1 col-xs-2">
          <select id="fiber_weft_cond1" name="fiber_weft_cond1" onchange="fiber_weft_condition()" class="fiber_weft_cond1 form-control col-md-12 col-xs-12">
            <option value="">Select Condition</option>
            <option <?php if($row_for_gray_variable['fiber_weft_cond1'] == 1) {echo "selected";} ?> value="1">(</option>
            <option <?php if($row_for_gray_variable['fiber_weft_cond1'] == 2) {echo "selected";} ?> value="2">[</option>
          </select>
        </div>
        <div class="col-md-1 col-sm-1 col-xs-2">
          <input type="text" id="fiber_weft_value1" value="<?php echo $row_for_gray_variable['fiber_weft_value1']; ?>" name="fiber_weft_value1" class="fiber_weft_value1 form-control col-md-7 col-xs-12">
        </div>
        <div class="col-md-1 col-sm-1 col-xs-2">
        </div> 
        <div class="col-md-1 col-sm-1 col-xs-2">
          --
        </div> 
        <div class="col-md-1 col-sm-1 col-xs-2">
          <input type="text" id="fiber_weft_value2" value="<?php echo $row_for_gray_variable['fiber_weft_value2']; ?>" name="fiber_weft_value2" class="fiber_weft_value2 form-control col-md-7 col-xs-12">
        </div>
        <div class="col-md-1 col-sm-1 col-xs-2">
          <select id="fiber_weft_cond2" name="fiber_weft_cond2" class="fiber_weft_cond2 form-control col-md-12 col-xs-12">
            <option value="">Select Condition</option>
            <option <?php if($row_for_gray_variable['fiber_weft_cond2'] == 1) {echo "selected";} ?> value="1">)</option>
            <option <?php if($row_for_gray_variable['fiber_weft_cond2'] == 2) {echo "selected";} ?> value="2">]</option>
          </select>
        </div>
      </div>

      <div class="ln_solid"></div>
      <div class="form-group">
        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
          <input type="hidden" id="pp_no_id" name="pp_no_id" value="<?php echo $pp_no_id; ?>">
          <input type="hidden" id="pp_details_id" name="pp_details_id" value="<?php echo $pp_details_id; ?>">
          <input type="hidden" id="gray_variable_id" name="gray_variable_id" value="<?php echo $row_for_gray_variable['gray_variable_id']; ?>">
          <button type="button" name="submit" id="submit" onclick="update_edit_standard_data();" class="btn btn-success" >Update</button>
        </div>
      </div>

    </form>
  </div>
</div>


<?php  ?>