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
   header("Location: gray_variable.php");
}

$sql_for_printing_standard = "SELECT * FROM printing_standard WHERE pp_no_id = '$pp_no_id' AND pp_details_id = '$pp_details_id' AND active = '1' ";
$res_for_printing_standard = mysqli_query($con , $sql_for_printing_standard);
$row_for_printing_standard = mysqli_fetch_array($res_for_printing_standard);
?>


<div class="x_panel">
  <div class="x_title">
    <h2>Printing Standards Edit Form</h2>
    <ul class="nav navbar-right panel_toolbox">
      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
      </li>
    </ul>
    <div class="clearfix"></div>
  </div>
  <div class="x_content">
    <br />

    <form id="printing_standard_form" name="printing_standard_form" data-parsley-validate class="form-horizontal form-label-left">
      
      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="">
        </label>
        <div class="col-md-1 col-sm-1 col-xs-2">
          <p>Value</p>
        </div>
        <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
          
        </div> 
        <div class="col-md-1 col-sm-1 col-xs-2">
          <p>Tolerance</p>
        </div>
        <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
          
        </div> 

        <div class="col-md-1 col-sm-1 col-xs-2">
        </div>
        <div class="col-md-1 col-sm-1 col-xs-2">
          <p>Minimum</p>
        </div>
        <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
          
        </div> 
        <div class="col-md-1 col-sm-1 col-xs-2">
          <p>Maximum</p>
        </div>
        <div class="col-md-1 col-sm-1 col-xs-2">
        </div>
      </div>

      <div class="form-group">

            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="rubbing_dry"> Rubbing Dry <span class="required">*</span>
            </label>

            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              <select id="rubbing_dry_cond" name="rubbing_dry_cond" onchange="rubbing_dry_condition();" class="rubbing_dry_cond select2 pp_number form-control col-md-12 col-xs-12">
                <option value="1" selected="selected" > &ge; </option>
                <option value="2" > &le; </option>
              </select> 
            </div> 

            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              <select id="rubbing_dry_value" name="rubbing_dry_value" onchange="rubbing_dry_condition();" class="rubbing_dry_value select2 pp_number form-control col-md-12 col-xs-12">
                <option value="5" > 5 </option>
                <option value="4.5" > 4-5 </option>
                <option value="4" > 4 </option>
                <option value="3.5" > 3-4 </option>
                <option value="3" > 3 </option>
                <option value="2.5" > 2-3 </option>
                <option value="2" > 2 </option>
                <option value="1.5" > 1-2 </option>
                <option value="1" > 1 </option>
              </select> 
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="hidden"   class="form-control col-md-7 col-xs-12">
            </div>


            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              =
            </div>

            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="rubbing_dry_cond1" name="rubbing_dry_cond1" onchange="rubbing_dry_condition()" class="rubbing_dry_cond1 form-control col-md-12 col-xs-12">
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($row_for_printing_standard['rubbing_dry_cond1'] == '1') ? 'selected' : '' ?> >(</option>
                <option value="2" <?php echo ($row_for_printing_standard['rubbing_dry_cond1'] == '2') ? 'selected' : '' ?> >[</option>
              </select>
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="rubbing_dry_value1" name="rubbing_dry_value1" value="<?php echo isset($row_for_printing_standard['rubbing_dry_value1']) ? $row_for_printing_standard['rubbing_dry_value1'] : "" ?>" class="rubbing_dry_value1 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              --
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="rubbing_dry_value2" name="rubbing_dry_value2" value="<?php echo isset($row_for_printing_standard['rubbing_dry_value2']) ? $row_for_printing_standard['rubbing_dry_value2'] : "" ?>" class="rubbing_dry_value2 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="rubbing_dry_cond2" name="rubbing_dry_cond2" class="rubbing_dry_cond2 form-control col-md-12 col-xs-12">
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($row_for_printing_standard['rubbing_dry_cond2'] == '1') ? 'selected' : '' ?> >)</option>
                <option value="2" <?php echo ($row_for_printing_standard['rubbing_dry_cond2'] == '2') ? 'selected' : '' ?> >]</option>
              </select>
            </div>
          </div>

          <br>


          <div class="form-group">

            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="rubbing_wet"> Rubbing Wet <span class="required">*</span>
            </label>

            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              <select id="rubbing_wet_cond" name="rubbing_wet_cond" onchange="rubbing_wet_condition();" class="rubbing_wet_cond select2 pp_number form-control col-md-12 col-xs-12">
                <option value="1" selected="selected" > &ge; </option>
                <option value="2" > &le; </option>
              </select> 
            </div> 

            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              <select id="rubbing_wet_value" name="rubbing_wet_value" onchange="rubbing_wet_condition();" class="rubbing_wet_value select2 pp_number form-control col-md-12 col-xs-12">
                <option value="5" > 5 </option>
                <option value="4.5" > 4-5 </option>
                <option value="4" > 4 </option>
                <option value="3.5" > 3-4 </option>
                <option value="3" > 3 </option>
                <option value="2.5" > 2-3 </option>
                <option value="2" > 2 </option>
                <option value="1.5" > 1-2 </option>
                <option value="1" > 1 </option>
              </select> 
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="hidden"   class="form-control col-md-7 col-xs-12">
            </div>


            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              =
            </div>

            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="rubbing_wet_cond1" name="rubbing_wet_cond1" onchange="rubbing_wet_condition()" class="rubbing_wet_cond1 form-control col-md-12 col-xs-12">
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($row_for_printing_standard['rubbing_wet_cond1'] == '1') ? 'selected' : '' ?> >(</option>
                <option value="2" <?php echo ($row_for_printing_standard['rubbing_wet_cond1'] == '2') ? 'selected' : '' ?> >[</option>
              </select>
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="rubbing_wet_value1" name="rubbing_wet_value1" value="<?php echo isset($row_for_printing_standard['rubbing_wet_value1']) ? $row_for_printing_standard['rubbing_wet_value1'] : "" ?>" class="rubbing_wet_value1 form-control col-md-7 col-xs-12">
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              --
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="rubbing_wet_value2" name="rubbing_wet_value2" value="<?php echo isset($row_for_printing_standard['rubbing_wet_value2']) ? $row_for_printing_standard['rubbing_wet_value2'] : "" ?>" class="rubbing_wet_value2 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="rubbing_wet_cond2" name="rubbing_wet_cond2" class="rubbing_wet_cond2 form-control col-md-12 col-xs-12">
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($row_for_printing_standard['rubbing_wet_cond2'] == '1') ? 'selected' : '' ?> >)</option>
                <option value="2" <?php echo ($row_for_printing_standard['rubbing_wet_cond2'] == '2') ? 'selected' : '' ?> >]</option>
              </select>
            </div>
          </div>

          <br>

      

      <div class="ln_solid"></div>
      <div class="form-group">
        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
          <input type="hidden" id="pp_no_id" name="pp_no_id" value="<?php echo $pp_no_id; ?>">
          <input type="hidden" id="pp_details_id" name="pp_details_id" value="<?php echo $pp_details_id; ?>">
          <input type="hidden" id="printing_standard_id" name="printing_standard_id" value="<?php echo $row_for_printing_standard['printing_standard_id']; ?>">
          <button type="button" name="submit" id="submit" onclick="update_edit_printing_standard_data('<?php echo $pp_details_id; ?>');" class="btn btn-success" >Update</button>
          <button type="button" name="submit" id="submit" onclick="cancel_edit_printing_standard_data();" class="btn btn-success" >Cancel</button>
        </div>
      </div>

    </form>
  </div>
</div>


<?php  ?>