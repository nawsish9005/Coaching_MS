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

$sql_for_gray_variable = "SELECT * FROM defining_washing_qc_standard WHERE pp_no_id = '$pp_no_id' AND pp_details_id = '$pp_details_id' AND active = '1' ";
$res_for_gray_variable = mysqli_query($con , $sql_for_gray_variable);
$row_for_gray_variable = mysqli_fetch_array($res_for_gray_variable);
?>


<div class="x_panel">
  <div class="x_title">
    <h2>Washing Standards Edit Form</h2>
    <ul class="nav navbar-right panel_toolbox">
      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
      </li>
    </ul>
    <div class="clearfix"></div>
  </div>
  <div class="x_content">
    <br />

    <form id="washing_variable_form" name="washing_variable_form" data-parsley-validate class="form-horizontal form-label-left">
      

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

      <!-- customise for tolarance --> 

          <div class="form-group">

            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cf_rubbing_dry">Color Fastness to Rubbing Dry
            </label>

            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              <select id="cf_rubbing_dry_cond" name="cf_rubbing_dry_cond" onchange="cf_rubbing_dry_condition();" class="cf_rubbing_dry_cond select2 pp_number form-control col-md-12 col-xs-12">
                <option value="1" selected="selected" > &ge; </option>
                <option value="2" > &le; </option>
              </select> 
            </div> 

            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              <select id="cf_rubbing_dry_value" name="cf_rubbing_dry_value" onchange="cf_rubbing_dry_condition();" class="cf_rubbing_dry_value select2 pp_number form-control col-md-12 col-xs-12">
                <option value="5" > 5 </option>
                <option value="4.5" > 4-5 </option>
                <option value="4" > 4 </option>
                <option value="3.5" > 3-4 </option>
                <option value="3" > 3 </option>
                <option value="2.5" > 2-3 </option>
                <option value="2" > 2 </option>
                <option value="1.5" > 1-2 </option>
                <option value="1" > 1 </option>
                <option value="NA" > N/A </option>
              </select> 
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="hidden"   class="form-control col-md-7 col-xs-12">
            </div>


            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              =
            </div>

            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="cf_rubbing_dry_cond1" name="cf_rubbing_dry_cond1" onchange="cf_rubbing_dry_condition()" class="cf_rubbing_dry_cond1 form-control col-md-12 col-xs-12">
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($row_for_gray_variable['cf_rubbing_dry_cond1'] == '1') ? 'selected' : '' ?> >(</option>
                <option value="2" <?php echo ($row_for_gray_variable['cf_rubbing_dry_cond1'] == '2') ? 'selected' : '' ?> >[</option>
              </select>
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="cf_rubbing_dry_value1" name="cf_rubbing_dry_value1" value="<?php echo isset($row_for_gray_variable['cf_rubbing_dry_value1']) ? $row_for_gray_variable['cf_rubbing_dry_value1'] : "" ?>" class="cf_rubbing_dry_value1 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              --
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="cf_rubbing_dry_value2" name="cf_rubbing_dry_value2" value="<?php echo isset($row_for_gray_variable['cf_rubbing_dry_value2']) ? $row_for_gray_variable['cf_rubbing_dry_value2'] : "" ?>" class="cf_rubbing_dry_value2 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="cf_rubbing_dry_cond2" name="cf_rubbing_dry_cond2" class="cf_rubbing_dry_cond2 form-control col-md-12 col-xs-12">
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($row_for_gray_variable['cf_rubbing_dry_cond2'] == '1') ? 'selected' : '' ?> >)</option>
                <option value="2" <?php echo ($row_for_gray_variable['cf_rubbing_dry_cond2'] == '2') ? 'selected' : '' ?> >]</option>
              </select>
            </div>
          </div>

          <br>


          <div class="form-group">

            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cf_rubbing_wet">Color Fastness to Rubbing Wet
            </label>

            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              <select id="cf_rubbing_wet_cond" name="cf_rubbing_wet_cond" onchange="cf_rubbing_wet_condition();" class="cf_rubbing_wet_cond select2 pp_number form-control col-md-12 col-xs-12">
                <option value="1" selected="selected" > &ge; </option>
                <option value="2" > &le; </option>
              </select> 
            </div> 

            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              <select id="cf_rubbing_wet_value" name="cf_rubbing_wet_value" onchange="cf_rubbing_wet_condition();" class="cf_rubbing_wet_value select2 pp_number form-control col-md-12 col-xs-12">
                <option value="5" > 5 </option>
                <option value="4.5" > 4-5 </option>
                <option value="4" > 4 </option>
                <option value="3.5" > 3-4 </option>
                <option value="3" > 3 </option>
                <option value="2.5" > 2-3 </option>
                <option value="2" > 2 </option>
                <option value="1.5" > 1-2 </option>
                <option value="1" > 1 </option>
                <option value="NA" > N/A </option>
              </select> 
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="hidden"   class="form-control col-md-7 col-xs-12">
            </div>


            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              =
            </div>

            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="cf_rubbing_wet_cond1" name="cf_rubbing_wet_cond1" onchange="cf_rubbing_wet_condition()" class="cf_rubbing_wet_cond1 form-control col-md-12 col-xs-12">
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($row_for_gray_variable['cf_rubbing_wet_cond1'] == '1') ? 'selected' : '' ?> >(</option>
                <option value="2" <?php echo ($row_for_gray_variable['cf_rubbing_wet_cond1'] == '2') ? 'selected' : '' ?> >[</option>
              </select>
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="cf_rubbing_wet_value1" name="cf_rubbing_wet_value1" value="<?php echo isset($row_for_gray_variable['cf_rubbing_wet_value1']) ? $row_for_gray_variable['cf_rubbing_wet_value1'] : "" ?>" class="cf_rubbing_wet_value1 form-control col-md-7 col-xs-12">
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              --
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="cf_rubbing_wet_value2" name="cf_rubbing_wet_value2" value="<?php echo isset($row_for_gray_variable['cf_rubbing_wet_value2']) ? $row_for_gray_variable['cf_rubbing_wet_value2'] : "" ?>" class="cf_rubbing_wet_value2 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="cf_rubbing_wet_cond2" name="cf_rubbing_wet_cond2" class="cf_rubbing_wet_cond2 form-control col-md-12 col-xs-12">
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($row_for_gray_variable['cf_rubbing_wet_cond2'] == '1') ? 'selected' : '' ?> >)</option>
                <option value="2" <?php echo ($row_for_gray_variable['cf_rubbing_wet_cond2'] == '2') ? 'selected' : '' ?> >]</option>
              </select>
            </div>
          </div>

          <br>

          <div class="form-group">
            <label class="control-label col-md-7 col-sm-7 col-xs-12" for="washing_ph">pH<span class="required">*</span>
            </label>

            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="washing_ph_cond1" name="washing_ph_cond1" onchange="washing_ph_condition()" class="cf_rubbing_wet_cond1 form-control col-md-12 col-xs-12">
                <option value="2" selected="selected" <?php echo ($row_for_gray_variable['washing_ph_cond1'] == '2') ? 'selected' : '' ?> >[</option>
                <option value="1" <?php echo ($row_for_gray_variable['washing_ph_cond1'] == '1') ? 'selected' : '' ?> >(</option>
              </select>
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="washing_ph_value1" name="washing_ph_value1" value="<?php echo isset($row_for_gray_variable['washing_ph_value1']) ? $row_for_gray_variable['washing_ph_value1'] : "" ?>" class="washing_ph_value1 form-control col-md-7 col-xs-12">
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              --
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="washing_ph_value2" name="washing_ph_value2" value="<?php echo isset($row_for_gray_variable['washing_ph_value2']) ? $row_for_gray_variable['washing_ph_value2'] : "" ?>" class="washing_ph_value2 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="washing_ph_cond2" name="washing_ph_cond2" class="washing_ph_cond2 form-control col-md-12 col-xs-12">
                <option value="2" selected="selected" <?php echo ($row_for_gray_variable['washing_ph_cond2'] == '2') ? 'selected' : '' ?> >]</option>
                <option value="1" <?php echo ($row_for_gray_variable['washing_ph_cond2'] == '1') ? 'selected' : '' ?> >)</option>
              </select>
            </div>
          </div>


          <br>
          <div class="form-group">

            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cf_dry_cleaning_c_change"> Color Fastness to Dry Cleaning Color Change 
            </label>

            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              <select id="cf_dry_cleaning_c_change_cond" name="cf_dry_cleaning_c_change_cond" onchange="cf_dry_cleaning_c_change_condition();" class="cf_dry_cleaning_c_change_cond select2 pp_number form-control col-md-12 col-xs-12">
                <option value="1" selected="selected" > &ge; </option>
                <option value="2" > &le; </option>
              </select> 
            </div> 

            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              <select id="cf_dry_cleaning_c_change_value" name="cf_dry_cleaning_c_change_value" onchange="cf_dry_cleaning_c_change_condition();" class="cf_dry_cleaning_c_change_value select2 pp_number form-control col-md-12 col-xs-12">
                <option value="5" > 5 </option>
                <option value="4.5" > 4-5 </option>
                <option value="4" > 4 </option>
                <option value="3.5" > 3-4 </option>
                <option value="3" > 3 </option>
                <option value="2.5" > 2-3 </option>
                <option value="2" > 2 </option>
                <option value="1.5" > 1-2 </option>
                <option value="1" > 1 </option>
                <option value="NA" > N/A </option>
              </select> 
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="hidden"   class="form-control col-md-7 col-xs-12">
            </div>


            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              = 
            </div>

            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="cf_dry_cleaning_c_change_cond1" name="cf_dry_cleaning_c_change_cond1" onchange="cf_dry_cleaning_c_change_condition()" class="cf_dry_cleaning_c_change_cond1 form-control col-md-12 col-xs-12">
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($row_for_gray_variable['cf_dry_cleaning_c_change_cond1'] == '1') ? 'selected' : '' ?> >(</option>
                <option value="2" <?php echo ($row_for_gray_variable['cf_dry_cleaning_c_change_cond1'] == '2') ? 'selected' : '' ?> >[</option>
              </select>
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="cf_dry_cleaning_c_change_value1" name="cf_dry_cleaning_c_change_value1" value="<?php echo isset($row_for_gray_variable['cf_dry_cleaning_c_change_value1']) ? $row_for_gray_variable['cf_dry_cleaning_c_change_value1'] : "" ?>" class="cf_dry_cleaning_c_change_value1 form-control col-md-7 col-xs-12">
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              --
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="cf_dry_cleaning_c_change_value2" name="cf_dry_cleaning_c_change_value2" value="<?php echo isset($row_for_gray_variable['cf_dry_cleaning_c_change_value2']) ? $row_for_gray_variable['cf_dry_cleaning_c_change_value2'] : "" ?>" class="cf_dry_cleaning_c_change_value2 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="cf_dry_cleaning_c_change_cond2" name="cf_dry_cleaning_c_change_cond2" class="cf_dry_cleaning_c_change_cond2 form-control col-md-12 col-xs-12">
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($row_for_gray_variable['cf_dry_cleaning_c_change_cond2'] == '1') ? 'selected' : '' ?> >)</option>
                <option value="2" <?php echo ($row_for_gray_variable['cf_dry_cleaning_c_change_cond2'] == '2') ? 'selected' : '' ?> >]</option>
              </select>
            </div>
          </div>

          <br>


          <div class="form-group">

            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cf_dry_cleaning_staining"> Color Fastness to Dry Cleaning Staining 
            </label>

            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              <select id="cf_dry_cleaning_staining_cond" name="cf_dry_cleaning_staining_cond" onchange="cf_dry_cleaning_staining_condition();" class="cf_dry_cleaning_staining_cond select2 pp_number form-control col-md-12 col-xs-12">
                <option value="1" selected="selected" > &ge; </option>
                <option value="2" > &le; </option>
              </select> 
            </div> 

            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              <select id="cf_dry_cleaning_staining_value" name="cf_dry_cleaning_staining_value" onchange="cf_dry_cleaning_staining_condition();" class="cf_dry_cleaning_staining_value select2 pp_number form-control col-md-12 col-xs-12">
                <option value="5" > 5 </option>
                <option value="4.5" > 4-5 </option>
                <option value="4" > 4 </option>
                <option value="3.5" > 3-4 </option>
                <option value="3" > 3 </option>
                <option value="2.5" > 2-3 </option>
                <option value="2" > 2 </option>
                <option value="1.5" > 1-2 </option>
                <option value="1" > 1 </option>
                <option value="NA" > N/A </option>
              </select> 
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="hidden"   class="form-control col-md-7 col-xs-12">
            </div>


            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              = 
            </div>

            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="cf_dry_cleaning_staining_cond1" name="cf_dry_cleaning_staining_cond1" onchange="cf_dry_cleaning_staining_condition()" class="cf_dry_cleaning_staining_cond1 form-control col-md-12 col-xs-12">
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($row_for_gray_variable['cf_dry_cleaning_staining_cond1'] == '1') ? 'selected' : '' ?> >(</option>
                <option value="2" <?php echo ($row_for_gray_variable['cf_dry_cleaning_staining_cond1'] == '2') ? 'selected' : '' ?> >[</option>
              </select>
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="cf_dry_cleaning_staining_value1" name="cf_dry_cleaning_staining_value1" value="<?php echo isset($row_for_gray_variable['cf_dry_cleaning_staining_value1']) ? $row_for_gray_variable['cf_dry_cleaning_staining_value1'] : "" ?>" class="cf_dry_cleaning_staining_value1 form-control col-md-7 col-xs-12">
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              --
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="cf_dry_cleaning_staining_value2" name="cf_dry_cleaning_staining_value2" value="<?php echo isset($row_for_gray_variable['cf_dry_cleaning_staining_value2']) ? $row_for_gray_variable['cf_dry_cleaning_staining_value2'] : "" ?>" class="cf_dry_cleaning_staining_value2 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="cf_dry_cleaning_staining_cond2" name="cf_dry_cleaning_staining_cond2" class="cf_dry_cleaning_staining_cond2 form-control col-md-12 col-xs-12">
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($row_for_gray_variable['cf_dry_cleaning_staining_cond2'] == '1') ? 'selected' : '' ?> >)</option>
                <option value="2" <?php echo ($row_for_gray_variable['cf_dry_cleaning_staining_cond2'] == '2') ? 'selected' : '' ?> >]</option>
              </select>
            </div>
          </div>

          <br>

          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cf_c_change"> Color Fastness to Washing Color Change 
            </label>

            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              <select id="cf_washing_c_change_cond" name="cf_washing_c_change_cond" onchange="cf_washing_c_change_condition();" class="cf_washing_c_change_cond select2 pp_number form-control col-md-12 col-xs-12">
                <option value="1" selected="selected" > &ge; </option>
                <option value="2" > &le; </option>
              </select> 
            </div> 

            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              <select id="cf_washing_c_change_value" name="cf_washing_c_change_value" onchange="cf_washing_c_change_condition();" class="cf_washing_c_change_value select2 pp_number form-control col-md-12 col-xs-12">
                <option value="5" > 5 </option>
                <option value="4.5" > 4-5 </option>
                <option value="4" > 4 </option>
                <option value="3.5" > 3-4 </option>
                <option value="3" > 3 </option>
                <option value="2.5" > 2-3 </option>
                <option value="2" > 2 </option>
                <option value="1.5" > 1-2 </option>
                <option value="1" > 1 </option>
                <option value="NA" > N/A </option>
              </select> 
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="hidden"   class="form-control col-md-7 col-xs-12">
            </div>


            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              = 
            </div>

            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="cf_washing_c_change_cond1" name="cf_washing_c_change_cond1" onchange="cf_washing_c_change_condition()" class="cf_washing_c_change_cond1 form-control col-md-12 col-xs-12">
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($row_for_gray_variable['cf_washing_c_change_cond1'] == '1') ? 'selected' : '' ?> >(</option>
                <option value="2" <?php echo ($row_for_gray_variable['cf_washing_c_change_cond1'] == '2') ? 'selected' : '' ?> >[</option>
              </select>
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="cf_washing_c_change_value1" name="cf_washing_c_change_value1" value="<?php echo isset($row_for_gray_variable['cf_washing_c_change_value1']) ? $row_for_gray_variable['cf_washing_c_change_value1'] : "" ?>" class="cf_washing_c_change_value1 form-control col-md-7 col-xs-12">
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              --
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="cf_washing_c_change_value2" name="cf_washing_c_change_value2" value="<?php echo isset($row_for_gray_variable['cf_washing_c_change_value2']) ? $row_for_gray_variable['cf_washing_c_change_value2'] : "" ?>" class="cf_washing_c_change_value2 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="cf_washing_c_change_cond2" name="cf_washing_c_change_cond2" class="cf_washing_c_change_cond2 form-control col-md-12 col-xs-12">
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($row_for_gray_variable['cf_washing_c_change_cond2'] == '1') ? 'selected' : '' ?> >)</option>
                <option value="2" <?php echo ($row_for_gray_variable['cf_washing_c_change_cond2'] == '2') ? 'selected' : '' ?> >]</option>
              </select>
            </div>
          </div>

          <br>


          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cf_washing_staining"> Color Fastness to Washing Staining 
            </label>

            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              <select id="cf_washing_staining_cond" name="cf_washing_staining_cond" onchange="cf_washing_staining_condition();" class="cf_washing_staining_cond select2 pp_number form-control col-md-12 col-xs-12">
                <option value="1" selected="selected" > &ge; </option>
                <option value="2" > &le; </option>
              </select> 
            </div> 

            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              <select id="cf_washing_staining_value" name="cf_washing_staining_value" onchange="cf_washing_staining_condition();" class="cf_washing_staining_value select2 pp_number form-control col-md-12 col-xs-12">
                <option value="5" > 5 </option>
                <option value="4.5" > 4-5 </option>
                <option value="4" > 4 </option>
                <option value="3.5" > 3-4 </option>
                <option value="3" > 3 </option>
                <option value="2.5" > 2-3 </option>
                <option value="2" > 2 </option>
                <option value="1.5" > 1-2 </option>
                <option value="1" > 1 </option>
                <option value="NA" > N/A </option>
              </select> 
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="hidden"   class="form-control col-md-7 col-xs-12">
            </div>


            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              = 
            </div>

            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="cf_washing_staining_cond1" name="cf_washing_staining_cond1" onchange="cf_washing_staining_condition()" class="cf_washing_staining_cond1 form-control col-md-12 col-xs-12">
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($row_for_gray_variable['cf_washing_staining_cond1'] == '1') ? 'selected' : '' ?> >(</option>
                <option value="2" <?php echo ($row_for_gray_variable['cf_washing_staining_cond1'] == '2') ? 'selected' : '' ?> >[</option>
              </select>
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="cf_washing_staining_value1" name="cf_washing_staining_value1" value="<?php echo isset($row_for_gray_variable['cf_washing_staining_value1']) ? $row_for_gray_variable['cf_washing_staining_value1'] : "" ?>" class="cf_washing_staining_value1 form-control col-md-7 col-xs-12">
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              --
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="cf_washing_staining_value2" name="cf_washing_staining_value2" value="<?php echo isset($row_for_gray_variable['cf_washing_staining_value2']) ? $row_for_gray_variable['cf_washing_staining_value2'] : "" ?>" class="cf_washing_staining_value2 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="cf_washing_staining_cond2" name="cf_washing_staining_cond2" class="cf_washing_staining_cond2 form-control col-md-12 col-xs-12">
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($row_for_gray_variable['cf_washing_staining_cond2'] == '1') ? 'selected' : '' ?> >)</option>
                <option value="2" <?php echo ($row_for_gray_variable['cf_washing_staining_cond2'] == '2') ? 'selected' : '' ?> >]</option>
              </select>
            </div>
          </div>

          <br>

          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cf_perspiration_acis_c_change"> Color Fastness to Perspiration (Acid) Color Change 
            </label>

            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              <select id="cf_perspiration_acis_c_change_cond" name="cf_perspiration_acis_c_change_cond" onchange="cf_perspiration_acis_c_change_condition();" class="cf_perspiration_acis_c_change_cond select2 pp_number form-control col-md-12 col-xs-12">
                <option value="1" selected="selected" > &ge; </option>
                <option value="2" > &le; </option>
              </select> 
            </div> 

            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              <select id="cf_perspiration_acis_c_change_value" name="cf_perspiration_acis_c_change_value" onchange="cf_perspiration_acis_c_change_condition();" class="cf_perspiration_acis_c_change_value select2 pp_number form-control col-md-12 col-xs-12">
                <option value="5" > 5 </option>
                <option value="4.5" > 4-5 </option>
                <option value="4" > 4 </option>
                <option value="3.5" > 3-4 </option>
                <option value="3" > 3 </option>
                <option value="2.5" > 2-3 </option>
                <option value="2" > 2 </option>
                <option value="1.5" > 1-2 </option>
                <option value="1" > 1 </option>
                <option value="NA" > N/A </option>
              </select> 
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="hidden"   class="form-control col-md-7 col-xs-12">
            </div>


            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              = 
            </div>

            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="cf_perspiration_acis_c_change_cond1" name="cf_perspiration_acis_c_change_cond1" onchange="cf_perspiration_acis_c_change_condition()" class="cf_perspiration_acis_c_change_cond1 form-control col-md-12 col-xs-12">
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($row_for_gray_variable['cf_perspiration_acis_c_change_cond1'] == '1') ? 'selected' : '' ?> >(</option>
                <option value="2" <?php echo ($row_for_gray_variable['cf_perspiration_acis_c_change_cond1'] == '2') ? 'selected' : '' ?> >[</option>
              </select>
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="cf_perspiration_acis_c_change_value1" name="cf_perspiration_acis_c_change_value1" value="<?php echo isset($row_for_gray_variable['cf_perspiration_acis_c_change_value1']) ? $row_for_gray_variable['cf_perspiration_acis_c_change_value1'] : "" ?>" class="cf_perspiration_acis_c_change_value1 form-control col-md-7 col-xs-12">
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              --
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="cf_perspiration_acis_c_change_value2" name="cf_perspiration_acis_c_change_value2" value="<?php echo isset($row_for_gray_variable['cf_perspiration_acis_c_change_value2']) ? $row_for_gray_variable['cf_perspiration_acis_c_change_value2'] : "" ?>" class="cf_perspiration_acis_c_change_value2 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="cf_perspiration_acis_c_change_cond2" name="cf_perspiration_acis_c_change_cond2" class="cf_perspiration_acis_c_change_cond2 form-control col-md-12 col-xs-12">
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($row_for_gray_variable['cf_perspiration_acis_c_change_cond2'] == '1') ? 'selected' : '' ?> >)</option>
                <option value="2" <?php echo ($row_for_gray_variable['cf_perspiration_acis_c_change_cond2'] == '2') ? 'selected' : '' ?> >]</option>
              </select>
            </div>
          </div>

          <br>


          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cf_perspiration_acis_staining"> Color Fastness to Perspiration (Acid) Staining 
            </label>

            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              <select id="cf_perspiration_acis_staining_cond" name="cf_perspiration_acis_staining_cond" onchange="cf_perspiration_acis_staining_condition();" class="cf_perspiration_acis_staining_cond select2 pp_number form-control col-md-12 col-xs-12">
                <option value="1" selected="selected" > &ge; </option>
                <option value="2" > &le; </option>
              </select> 
            </div> 

            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              <select id="cf_perspiration_acis_staining_value" name="cf_perspiration_acis_staining_value" onchange="cf_perspiration_acis_staining_condition();" class="cf_perspiration_acis_staining_value select2 pp_number form-control col-md-12 col-xs-12">
                <option value="5" > 5 </option>
                <option value="4.5" > 4-5 </option>
                <option value="4" > 4 </option>
                <option value="3.5" > 3-4 </option>
                <option value="3" > 3 </option>
                <option value="2.5" > 2-3 </option>
                <option value="2" > 2 </option>
                <option value="1.5" > 1-2 </option>
                <option value="1" > 1 </option>
                <option value="NA" > N/A </option>
              </select> 
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="hidden"   class="form-control col-md-7 col-xs-12">
            </div>


            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              = 
            </div>

            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="cf_perspiration_acis_staining_cond1" name="cf_perspiration_acis_staining_cond1" onchange="cf_perspiration_acis_staining_condition()" class="cf_perspiration_acis_staining_cond1 form-control col-md-12 col-xs-12">
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($row_for_gray_variable['cf_perspiration_acis_staining_cond1'] == '1') ? 'selected' : '' ?> >(</option>
                <option value="2" <?php echo ($row_for_gray_variable['cf_perspiration_acis_staining_cond1'] == '2') ? 'selected' : '' ?> >[</option>
              </select>
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="cf_perspiration_acis_staining_value1" name="cf_perspiration_acis_staining_value1" value="<?php echo isset($row_for_gray_variable['cf_perspiration_acis_staining_value1']) ? $row_for_gray_variable['cf_perspiration_acis_staining_value1'] : "" ?>" class="cf_perspiration_acis_staining_value1 form-control col-md-7 col-xs-12">
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              --
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="cf_perspiration_acis_staining_value2" name="cf_perspiration_acis_staining_value2" value="<?php echo isset($row_for_gray_variable['cf_perspiration_acis_staining_value2']) ? $row_for_gray_variable['cf_perspiration_acis_staining_value2'] : "" ?>" class="cf_perspiration_acis_staining_value2 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="cf_perspiration_acis_staining_cond2" name="cf_perspiration_acis_staining_cond2" class="cf_perspiration_acis_staining_cond2 form-control col-md-12 col-xs-12">
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($row_for_gray_variable['cf_perspiration_acis_staining_cond2'] == '1') ? 'selected' : '' ?> >)</option>
                <option value="2" <?php echo ($row_for_gray_variable['cf_perspiration_acis_staining_cond2'] == '2') ? 'selected' : '' ?> >]</option>
              </select>
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cf_perspiration_alkali_c_change"> Color Fastness to Perspiration (Alkali) Color Change 
            </label>

            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              <select id="cf_perspiration_alkali_c_change_cond" name="cf_perspiration_alkali_c_change_cond" onchange="cf_perspiration_alkali_c_change_condition();" class="cf_perspiration_alkali_c_change_cond select2 pp_number form-control col-md-12 col-xs-12">
                <option value="1" selected="selected" > &ge; </option>
                <option value="2" > &le; </option>
              </select> 
            </div> 

            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              <select id="cf_perspiration_alkali_c_change_value" name="cf_perspiration_alkali_c_change_value" onchange="cf_perspiration_alkali_c_change_condition();" class="cf_perspiration_alkali_c_change_value select2 pp_number form-control col-md-12 col-xs-12">
                <option value="5" > 5 </option>
                <option value="4.5" > 4-5 </option>
                <option value="4" > 4 </option>
                <option value="3.5" > 3-4 </option>
                <option value="3" > 3 </option>
                <option value="2.5" > 2-3 </option>
                <option value="2" > 2 </option>
                <option value="1.5" > 1-2 </option>
                <option value="1" > 1 </option>
                <option value="NA" > N/A </option>
              </select> 
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="hidden"   class="form-control col-md-7 col-xs-12">
            </div>


            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              = 
            </div>

            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="cf_perspiration_alkali_c_change_cond1" name="cf_perspiration_alkali_c_change_cond1" onchange="cf_perspiration_alkali_c_change_condition()" class="cf_perspiration_alkali_c_change_cond1 form-control col-md-12 col-xs-12">
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($row_for_gray_variable['cf_perspiration_alkali_c_change_cond1'] == '1') ? 'selected' : '' ?> >(</option>
                <option value="2" <?php echo ($row_for_gray_variable['cf_perspiration_alkali_c_change_cond1'] == '2') ? 'selected' : '' ?> >[</option>
              </select>
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="cf_perspiration_alkali_c_change_value1" name="cf_perspiration_alkali_c_change_value1" value="<?php echo isset($row_for_gray_variable['cf_perspiration_alkali_c_change_value1']) ? $row_for_gray_variable['cf_perspiration_alkali_c_change_value1'] : "" ?>" class="cf_perspiration_alkali_c_change_value1 form-control col-md-7 col-xs-12">
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              --
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="cf_perspiration_alkali_c_change_value2" name="cf_perspiration_alkali_c_change_value2" value="<?php echo isset($row_for_gray_variable['cf_perspiration_alkali_c_change_value2']) ? $row_for_gray_variable['cf_perspiration_alkali_c_change_value2'] : "" ?>" class="cf_perspiration_alkali_c_change_value2 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="cf_perspiration_alkali_c_change_cond2" name="cf_perspiration_alkali_c_change_cond2" class="cf_perspiration_alkali_c_change_cond2 form-control col-md-12 col-xs-12">
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($row_for_gray_variable['cf_perspiration_alkali_c_change_cond2'] == '1') ? 'selected' : '' ?> >)</option>
                <option value="2" <?php echo ($row_for_gray_variable['cf_perspiration_alkali_c_change_cond2'] == '2') ? 'selected' : '' ?> >]</option>
              </select>
            </div>
          </div>

          <br>


          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cf_perspiration_alkali_staining"> Color Fastness to Perspiration (Alkali) Staining 
            </label>

            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              <select id="cf_perspiration_alkali_staining_cond" name="cf_perspiration_alkali_staining_cond" onchange="cf_perspiration_alkali_staining_condition();" class="cf_perspiration_alkali_staining_cond select2 pp_number form-control col-md-12 col-xs-12">
                <option value="1" selected="selected" > &ge; </option>
                <option value="2" > &le; </option>
              </select> 
            </div> 

            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              <select id="cf_perspiration_alkali_staining_value" name="cf_perspiration_alkali_staining_value" onchange="cf_perspiration_alkali_staining_condition();" class="cf_perspiration_alkali_staining_value select2 pp_number form-control col-md-12 col-xs-12">
                <option value="5" > 5 </option>
                <option value="4.5" > 4-5 </option>
                <option value="4" > 4 </option>
                <option value="3.5" > 3-4 </option>
                <option value="3" > 3 </option>
                <option value="2.5" > 2-3 </option>
                <option value="2" > 2 </option>
                <option value="1.5" > 1-2 </option>
                <option value="1" > 1 </option>
                <option value="NA" > N/A </option>
              </select> 
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="hidden"   class="form-control col-md-7 col-xs-12">
            </div>


            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              = 
            </div>

            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="cf_perspiration_alkali_staining_cond1" name="cf_perspiration_alkali_staining_cond1" onchange="cf_perspiration_alkali_staining_condition()" class="cf_perspiration_alkali_staining_cond1 form-control col-md-12 col-xs-12">
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($row_for_gray_variable['cf_perspiration_alkali_staining_cond1'] == '1') ? 'selected' : '' ?> >(</option>
                <option value="2" <?php echo ($row_for_gray_variable['cf_perspiration_alkali_staining_cond1'] == '2') ? 'selected' : '' ?> >[</option>
              </select>
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="cf_perspiration_alkali_staining_value1" name="cf_perspiration_alkali_staining_value1" value="<?php echo isset($row_for_gray_variable['cf_perspiration_alkali_staining_value1']) ? $row_for_gray_variable['cf_perspiration_alkali_staining_value1'] : "" ?>" class="cf_perspiration_alkali_staining_value1 form-control col-md-7 col-xs-12">
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              --
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="cf_perspiration_alkali_staining_value2" name="cf_perspiration_alkali_staining_value2" value="<?php echo isset($row_for_gray_variable['cf_perspiration_alkali_staining_value2']) ? $row_for_gray_variable['cf_perspiration_alkali_staining_value2'] : "" ?>" class="cf_perspiration_alkali_staining_value2 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="cf_perspiration_alkali_staining_cond2" name="cf_perspiration_alkali_staining_cond2" class="cf_perspiration_alkali_staining_cond2 form-control col-md-12 col-xs-12">
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($row_for_gray_variable['cf_perspiration_alkali_staining_cond2'] == '1') ? 'selected' : '' ?> >)</option>
                <option value="2" <?php echo ($row_for_gray_variable['cf_perspiration_alkali_staining_cond2'] == '2') ? 'selected' : '' ?> >]</option>
              </select>
            </div>
          </div>

          <br>


          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cf_water_c_change"> Color Fastness to Water Color Change 
            </label>

            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              <select id="cf_water_c_change_cond" name="cf_water_c_change_cond" onchange="cf_water_c_change_condition();" class="cf_water_c_change_cond select2 pp_number form-control col-md-12 col-xs-12">
                <option value="1" selected="selected" > &ge; </option>
                <option value="2" > &le; </option>
              </select> 
            </div> 

            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              <select id="cf_water_c_change_value" name="cf_water_c_change_value" onchange="cf_water_c_change_condition();" class="cf_water_c_change_value select2 pp_number form-control col-md-12 col-xs-12">
                <option value="5" > 5 </option>
                <option value="4.5" > 4-5 </option>
                <option value="4" > 4 </option>
                <option value="3.5" > 3-4 </option>
                <option value="3" > 3 </option>
                <option value="2.5" > 2-3 </option>
                <option value="2" > 2 </option>
                <option value="1.5" > 1-2 </option>
                <option value="1" > 1 </option>
                <option value="NA" > N/A </option>
              </select> 
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="hidden"   class="form-control col-md-7 col-xs-12">
            </div>


            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              = 
            </div>

            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="cf_water_c_change_cond1" name="cf_water_c_change_cond1" onchange="cf_water_c_change_condition()" class="cf_water_c_change_cond1 form-control col-md-12 col-xs-12">
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($row_for_gray_variable['cf_water_c_change_cond1'] == '1') ? 'selected' : '' ?> >(</option>
                <option value="2" <?php echo ($row_for_gray_variable['cf_water_c_change_cond1'] == '2') ? 'selected' : '' ?> >[</option>
              </select>
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="cf_water_c_change_value1" name="cf_water_c_change_value1" value="<?php echo isset($row_for_gray_variable['cf_water_c_change_value1']) ? $row_for_gray_variable['cf_water_c_change_value1'] : "" ?>" class="cf_water_c_change_value1 form-control col-md-7 col-xs-12">
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              --
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="cf_water_c_change_value2" name="cf_water_c_change_value2" value="<?php echo isset($row_for_gray_variable['cf_water_c_change_value2']) ? $row_for_gray_variable['cf_water_c_change_value2'] : "" ?>" class="cf_water_c_change_value2 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="cf_water_c_change_cond2" name="cf_water_c_change_cond2" class="cf_water_c_change_cond2 form-control col-md-12 col-xs-12">
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($row_for_gray_variable['cf_water_c_change_cond2'] == '1') ? 'selected' : '' ?> >)</option>
                <option value="2" <?php echo ($row_for_gray_variable['cf_water_c_change_cond2'] == '2') ? 'selected' : '' ?> >]</option>
              </select>
            </div>
          </div>

          <br>


          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cf_water_staining"> Color Fastness to Water Staining 
            </label>

            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              <select id="cf_water_staining_cond" name="cf_water_staining_cond" onchange="cf_water_staining_condition();" class="cf_water_staining_cond select2 pp_number form-control col-md-12 col-xs-12">
                <option value="1" selected="selected" > &ge; </option>
                <option value="2" > &le; </option>
              </select> 
            </div> 

            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              <select id="cf_water_staining_value" name="cf_water_staining_value" onchange="cf_water_staining_condition();" class="cf_water_staining_value select2 pp_number form-control col-md-12 col-xs-12">
                <option value="5" > 5 </option>
                <option value="4.5" > 4-5 </option>
                <option value="4" > 4 </option>
                <option value="3.5" > 3-4 </option>
                <option value="3" > 3 </option>
                <option value="2.5" > 2-3 </option>
                <option value="2" > 2 </option>
                <option value="1.5" > 1-2 </option>
                <option value="1" > 1 </option>
                <option value="NA" > N/A </option>
              </select> 
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="hidden"   class="form-control col-md-7 col-xs-12">
            </div>


            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              = 
            </div>

            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="cf_water_staining_cond1" name="cf_water_staining_cond1" onchange="cf_water_staining_condition()" class="cf_water_staining_cond1 form-control col-md-12 col-xs-12">
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($row_for_gray_variable['cf_water_staining_cond1'] == '1') ? 'selected' : '' ?> >(</option>
                <option value="2" <?php echo ($row_for_gray_variable['cf_water_staining_cond1'] == '2') ? 'selected' : '' ?> >[</option>
              </select>
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="cf_water_staining_value1" name="cf_water_staining_value1" value="<?php echo isset($row_for_gray_variable['cf_water_staining_value1']) ? $row_for_gray_variable['cf_water_staining_value1'] : "" ?>" class="cf_water_staining_value1 form-control col-md-7 col-xs-12">
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              --
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="cf_water_staining_value2" name="cf_water_staining_value2" value="<?php echo isset($row_for_gray_variable['cf_water_staining_value2']) ? $row_for_gray_variable['cf_water_staining_value2'] : "" ?>" class="cf_water_staining_value2 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="cf_water_staining_cond2" name="cf_water_staining_cond2" class="cf_water_staining_cond2 form-control col-md-12 col-xs-12">
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($row_for_gray_variable['cf_water_staining_cond2'] == '1') ? 'selected' : '' ?> >)</option>
                <option value="2" <?php echo ($row_for_gray_variable['cf_water_staining_cond2'] == '2') ? 'selected' : '' ?> >]</option>
              </select>
            </div>
          </div>

          <br>


          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cf_water_sotting_staining"> Color Fastness to Water Sotting Staining 
            </label>

            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              <select id="cf_water_sotting_staining_cond" name="cf_water_sotting_staining_cond" onchange="cf_water_sotting_staining_condition();" class="cf_water_sotting_staining_cond select2 pp_number form-control col-md-12 col-xs-12">
                <option value="1" selected="selected" > &ge; </option>
                <option value="2" > &le; </option>
              </select> 
            </div> 

            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              <select id="cf_water_sotting_staining_value" name="cf_water_sotting_staining_value" onchange="cf_water_sotting_staining_condition();" class="cf_water_sotting_staining_value select2 pp_number form-control col-md-12 col-xs-12">
                <option value="5" > 5 </option>
                <option value="4.5" > 4-5 </option>
                <option value="4" > 4 </option>
                <option value="3.5" > 3-4 </option>
                <option value="3" > 3 </option>
                <option value="2.5" > 2-3 </option>
                <option value="2" > 2 </option>
                <option value="1.5" > 1-2 </option>
                <option value="1" > 1 </option>
                <option value="NA" > N/A </option>
              </select> 
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="hidden"   class="form-control col-md-7 col-xs-12">
            </div>


            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              = 
            </div>

            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="cf_water_sotting_staining_cond1" name="cf_water_sotting_staining_cond1" onchange="cf_water_sotting_staining_condition()" class="cf_water_sotting_staining_cond1 form-control col-md-12 col-xs-12">
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($row_for_gray_variable['cf_water_sotting_staining_cond1'] == '1') ? 'selected' : '' ?> >(</option>
                <option value="2" <?php echo ($row_for_gray_variable['cf_water_sotting_staining_cond1'] == '2') ? 'selected' : '' ?> >[</option>
              </select>
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="cf_water_sotting_staining_value1" name="cf_water_sotting_staining_value1" value="<?php echo isset($row_for_gray_variable['cf_water_sotting_staining_value1']) ? $row_for_gray_variable['cf_water_sotting_staining_value1'] : "" ?>" class="cf_water_sotting_staining_value1 form-control col-md-7 col-xs-12">
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              --
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="cf_water_sotting_staining_value2" name="cf_water_sotting_staining_value2" value="<?php echo isset($row_for_gray_variable['cf_water_sotting_staining_value2']) ? $row_for_gray_variable['cf_water_sotting_staining_value2'] : "" ?>" class="cf_water_sotting_staining_value2 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="cf_water_sotting_staining_cond2" name="cf_water_sotting_staining_cond2" class="cf_water_sotting_staining_cond2 form-control col-md-12 col-xs-12">
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($row_for_gray_variable['cf_water_sotting_staining_cond2'] == '1') ? 'selected' : '' ?> >)</option>
                <option value="2" <?php echo ($row_for_gray_variable['cf_water_sotting_staining_cond2'] == '2') ? 'selected' : '' ?> >]</option>
              </select>
            </div>
          </div>

          <br>


          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cf_water_wetting_staining"> Color Fastness to Surface Wetting Staining 
            </label>

            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              <select id="cf_water_wetting_staining_cond" name="cf_water_wetting_staining_cond" onchange="cf_water_wetting_staining_condition();" class="cf_water_wetting_staining_cond select2 pp_number form-control col-md-12 col-xs-12">
                <option value="1" selected="selected" > &ge; </option>
                <option value="2" > &le; </option>
              </select> 
            </div> 

            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              <select id="cf_water_wetting_staining_value" name="cf_water_wetting_staining_value" onchange="cf_water_wetting_staining_condition();" class="cf_water_wetting_staining_value select2 pp_number form-control col-md-12 col-xs-12">
                <option value="5" > 5 </option>
                <option value="4.5" > 4-5 </option>
                <option value="4" > 4 </option>
                <option value="3.5" > 3-4 </option>
                <option value="3" > 3 </option>
                <option value="2.5" > 2-3 </option>
                <option value="2" > 2 </option>
                <option value="1.5" > 1-2 </option>
                <option value="1" > 1 </option>
                <option value="NA" > N/A </option>
              </select> 
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="hidden"   class="form-control col-md-7 col-xs-12">
            </div>


            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              = 
            </div>

            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="cf_water_wetting_staining_cond1" name="cf_water_wetting_staining_cond1" onchange="cf_water_wetting_staining_condition()" class="cf_water_wetting_staining_cond1 form-control col-md-12 col-xs-12">
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($row_for_gray_variable['cf_water_wetting_staining_cond1'] == '1') ? 'selected' : '' ?> >(</option>
                <option value="2" <?php echo ($row_for_gray_variable['cf_water_wetting_staining_cond1'] == '2') ? 'selected' : '' ?> >[</option>
              </select>
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="cf_water_wetting_staining_value1" name="cf_water_wetting_staining_value1" value="<?php echo isset($row_for_gray_variable['cf_water_wetting_staining_value1']) ? $row_for_gray_variable['cf_water_wetting_staining_value1'] : "" ?>" class="cf_water_wetting_staining_value1 form-control col-md-7 col-xs-12">
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              --
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="cf_water_wetting_staining_value2" name="cf_water_wetting_staining_value2" value="<?php echo isset($row_for_gray_variable['cf_water_wetting_staining_value2']) ? $row_for_gray_variable['cf_water_wetting_staining_value2'] : "" ?>" class="cf_water_wetting_staining_value2 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="cf_water_wetting_staining_cond2" name="cf_water_wetting_staining_cond2" class="cf_water_wetting_staining_cond2 form-control col-md-12 col-xs-12">
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($row_for_gray_variable['cf_water_wetting_staining_cond2'] == '1') ? 'selected' : '' ?> >)</option>
                <option value="2" <?php echo ($row_for_gray_variable['cf_water_wetting_staining_cond2'] == '2') ? 'selected' : '' ?> >]</option>
              </select>
            </div>
          </div>

          <br>

          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cf_hyd_reactive_dyes_c_change"> Color Fastness to Hydrolysis of Reactive Dyes Color Change 
            </label>

            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              <select id="cf_hyd_reactive_dyes_c_change_cond" name="cf_hyd_reactive_dyes_c_change_cond" onchange="cf_hyd_reactive_dyes_c_change_condition();" class="cf_hyd_reactive_dyes_c_change_cond select2 pp_number form-control col-md-12 col-xs-12">
                <option value="1" selected="selected" > &ge; </option>
                <option value="2" > &le; </option>
              </select> 
            </div> 

            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              <select id="cf_hyd_reactive_dyes_c_change_value" name="cf_hyd_reactive_dyes_c_change_value" onchange="cf_hyd_reactive_dyes_c_change_condition();" class="cf_hyd_reactive_dyes_c_change_value select2 pp_number form-control col-md-12 col-xs-12">
                <option value="5" > 5 </option>
                <option value="4.5" > 4-5 </option>
                <option value="4" > 4 </option>
                <option value="3.5" > 3-4 </option>
                <option value="3" > 3 </option>
                <option value="2.5" > 2-3 </option>
                <option value="2" > 2 </option>
                <option value="1.5" > 1-2 </option>
                <option value="1" > 1 </option>
                <option value="NA" > N/A </option>
              </select> 
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="hidden"   class="form-control col-md-7 col-xs-12">
            </div>


            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              = 
            </div>

            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="cf_hyd_reactive_dyes_c_change_cond1" name="cf_hyd_reactive_dyes_c_change_cond1" onchange="cf_hyd_reactive_dyes_c_change_condition()" class="cf_hyd_reactive_dyes_c_change_cond1 form-control col-md-12 col-xs-12">
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($row_for_gray_variable['cf_hyd_reactive_dyes_c_change_cond1'] == '1') ? 'selected' : '' ?> >(</option>
                <option value="2" <?php echo ($row_for_gray_variable['cf_hyd_reactive_dyes_c_change_cond1'] == '2') ? 'selected' : '' ?> >[</option>
              </select>
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="cf_hyd_reactive_dyes_c_change_value1" name="cf_hyd_reactive_dyes_c_change_value1" value="<?php echo isset($row_for_gray_variable['cf_hyd_reactive_dyes_c_change_value1']) ? $row_for_gray_variable['cf_hyd_reactive_dyes_c_change_value1'] : "" ?>" class="cf_hyd_reactive_dyes_c_change_value1 form-control col-md-7 col-xs-12">
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              --
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="cf_hyd_reactive_dyes_c_change_value2" name="cf_hyd_reactive_dyes_c_change_value2" value="<?php echo isset($row_for_gray_variable['cf_hyd_reactive_dyes_c_change_value2']) ? $row_for_gray_variable['cf_hyd_reactive_dyes_c_change_value2'] : "" ?>" class="cf_hyd_reactive_dyes_c_change_value2 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="cf_hyd_reactive_dyes_c_change_cond2" name="cf_hyd_reactive_dyes_c_change_cond2" class="cf_hyd_reactive_dyes_c_change_cond2 form-control col-md-12 col-xs-12">
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($row_for_gray_variable['cf_hyd_reactive_dyes_c_change_cond2'] == '1') ? 'selected' : '' ?> >)</option>
                <option value="2" <?php echo ($row_for_gray_variable['cf_hyd_reactive_dyes_c_change_cond2'] == '2') ? 'selected' : '' ?> >]</option>
              </select>
            </div>
          </div>

          <br>


          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cf_hyd_reactive_dyes_staining"> Color Fastness to Hydrolysis of Reactive Dyes Staining 
            </label>

            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              <select id="cf_hyd_reactive_dyes_staining_cond" name="cf_hyd_reactive_dyes_staining_cond" onchange="cf_hyd_reactive_dyes_staining_condition();" class="cf_hyd_reactive_dyes_staining_cond select2 pp_number form-control col-md-12 col-xs-12">
                <option value="1" selected="selected" > &ge; </option>
                <option value="2" > &le; </option>
              </select> 
            </div> 

            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              <select id="cf_hyd_reactive_dyes_staining_value" name="cf_hyd_reactive_dyes_staining_value" onchange="cf_hyd_reactive_dyes_staining_condition();" class="cf_hyd_reactive_dyes_staining_value select2 pp_number form-control col-md-12 col-xs-12">
                <option value="5" > 5 </option>
                <option value="4.5" > 4-5 </option>
                <option value="4" > 4 </option>
                <option value="3.5" > 3-4 </option>
                <option value="3" > 3 </option>
                <option value="2.5" > 2-3 </option>
                <option value="2" > 2 </option>
                <option value="1.5" > 1-2 </option>
                <option value="1" > 1 </option>
                <option value="NA" > N/A </option>
              </select> 
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="hidden"   class="form-control col-md-7 col-xs-12">
            </div>


            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              = 
            </div>

            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="cf_hyd_reactive_dyes_staining_cond1" name="cf_hyd_reactive_dyes_staining_cond1" onchange="cf_hyd_reactive_dyes_staining_condition()" class="cf_hyd_reactive_dyes_staining_cond1 form-control col-md-12 col-xs-12">
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($row_for_gray_variable['cf_hyd_reactive_dyes_staining_cond1'] == '1') ? 'selected' : '' ?> >(</option>
                <option value="2" <?php echo ($row_for_gray_variable['cf_hyd_reactive_dyes_staining_cond1'] == '2') ? 'selected' : '' ?> >[</option>
              </select>
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="cf_hyd_reactive_dyes_staining_value1" name="cf_hyd_reactive_dyes_staining_value1" value="<?php echo isset($row_for_gray_variable['cf_hyd_reactive_dyes_staining_value1']) ? $row_for_gray_variable['cf_hyd_reactive_dyes_staining_value1'] : "" ?>" class="cf_hyd_reactive_dyes_staining_value1 form-control col-md-7 col-xs-12">
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              --
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="cf_hyd_reactive_dyes_staining_value2" name="cf_hyd_reactive_dyes_staining_value2" value="<?php echo isset($row_for_gray_variable['cf_hyd_reactive_dyes_staining_value2']) ? $row_for_gray_variable['cf_hyd_reactive_dyes_staining_value2'] : "" ?>" class="cf_hyd_reactive_dyes_staining_value2 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="cf_hyd_reactive_dyes_staining_cond2" name="cf_hyd_reactive_dyes_staining_cond2" class="cf_hyd_reactive_dyes_staining_cond2 form-control col-md-12 col-xs-12">
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($row_for_gray_variable['cf_hyd_reactive_dyes_staining_cond2'] == '1') ? 'selected' : '' ?> >)</option>
                <option value="2" <?php echo ($row_for_gray_variable['cf_hyd_reactive_dyes_staining_cond2'] == '2') ? 'selected' : '' ?> >]</option>
              </select>
            </div>
          </div>

          <br>


          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cf_oidative_damage_c_change"> Color Fastness to Oidative Bleach Damage Color Change 
            </label>

            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              <select id="cf_oidative_damage_c_change_cond" name="cf_oidative_damage_c_change_cond" onchange="cf_oidative_damage_c_change_condition();" class="cf_oidative_damage_c_change_cond select2 pp_number form-control col-md-12 col-xs-12">
                <option value="1" selected="selected" > &ge; </option>
                <option value="2" > &le; </option>
              </select> 
            </div> 

            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              <select id="cf_oidative_damage_c_change_value" name="cf_oidative_damage_c_change_value" onchange="cf_oidative_damage_c_change_condition();" class="cf_oidative_damage_c_change_value select2 pp_number form-control col-md-12 col-xs-12">
                <option value="5" > 5 </option>
                <option value="4.5" > 4-5 </option>
                <option value="4" > 4 </option>
                <option value="3.5" > 3-4 </option>
                <option value="3" > 3 </option>
                <option value="2.5" > 2-3 </option>
                <option value="2" > 2 </option>
                <option value="1.5" > 1-2 </option>
                <option value="1" > 1 </option>
                <option value="NA" > N/A </option>
              </select> 
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="hidden"   class="form-control col-md-7 col-xs-12">
            </div>


            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              = 
            </div>

            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="cf_oidative_damage_c_change_cond1" name="cf_oidative_damage_c_change_cond1" onchange="cf_oidative_damage_c_change_condition()" class="cf_oidative_damage_c_change_cond1 form-control col-md-12 col-xs-12">
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($row_for_gray_variable['cf_oidative_damage_c_change_cond1'] == '1') ? 'selected' : '' ?> >(</option>
                <option value="2" <?php echo ($row_for_gray_variable['cf_oidative_damage_c_change_cond1'] == '2') ? 'selected' : '' ?> >[</option>
              </select>
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="cf_oidative_damage_c_change_value1" name="cf_oidative_damage_c_change_value1" value="<?php echo isset($row_for_gray_variable['cf_oidative_damage_c_change_value1']) ? $row_for_gray_variable['cf_oidative_damage_c_change_value1'] : "" ?>" class="cf_oidative_damage_c_change_value1 form-control col-md-7 col-xs-12">
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              --
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="cf_oidative_damage_c_change_value2" name="cf_oidative_damage_c_change_value2" value="<?php echo isset($row_for_gray_variable['cf_oidative_damage_c_change_value2']) ? $row_for_gray_variable['cf_oidative_damage_c_change_value2'] : "" ?>" class="cf_oidative_damage_c_change_value2 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="cf_oidative_damage_c_change_cond2" name="cf_oidative_damage_c_change_cond2" class="cf_oidative_damage_c_change_cond2 form-control col-md-12 col-xs-12">
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($row_for_gray_variable['cf_oidative_damage_c_change_cond2'] == '1') ? 'selected' : '' ?> >)</option>
                <option value="2" <?php echo ($row_for_gray_variable['cf_oidative_damage_c_change_cond2'] == '2') ? 'selected' : '' ?> >]</option>
              </select>
            </div>
          </div>

          <br>


          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cf_phenolic_staining"> Color Fastness to Phenolic Yellowing Staining 
            </label>

            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              <select id="cf_phenolic_staining_cond" name="cf_phenolic_staining_cond" onchange="cf_phenolic_staining_condition();" class="cf_phenolic_staining_cond select2 pp_number form-control col-md-12 col-xs-12">
                <option value="1" selected="selected" > &ge; </option>
                <option value="2" > &le; </option>
              </select> 
            </div> 

            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              <select id="cf_phenolic_staining_value" name="cf_phenolic_staining_value" onchange="cf_phenolic_staining_condition();" class="cf_phenolic_staining_value select2 pp_number form-control col-md-12 col-xs-12">
                <option value="5" > 5 </option>
                <option value="4.5" > 4-5 </option>
                <option value="4" > 4 </option>
                <option value="3.5" > 3-4 </option>
                <option value="3" > 3 </option>
                <option value="2.5" > 2-3 </option>
                <option value="2" > 2 </option>
                <option value="1.5" > 1-2 </option>
                <option value="1" > 1 </option>
                <option value="NA" > N/A </option>
              </select> 
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="hidden"   class="form-control col-md-7 col-xs-12">
            </div>


            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              = 
            </div>

            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="cf_phenolic_staining_cond1" name="cf_phenolic_staining_cond1" onchange="cf_phenolic_staining_condition()" class="cf_phenolic_staining_cond1 form-control col-md-12 col-xs-12">
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($row_for_gray_variable['cf_phenolic_staining_cond1'] == '1') ? 'selected' : '' ?> >(</option>
                <option value="2" <?php echo ($row_for_gray_variable['cf_phenolic_staining_cond1'] == '2') ? 'selected' : '' ?> >[</option>
              </select>
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="cf_phenolic_staining_value1" name="cf_phenolic_staining_value1" value="<?php echo isset($row_for_gray_variable['cf_phenolic_staining_value1']) ? $row_for_gray_variable['cf_phenolic_staining_value1'] : "" ?>" class="cf_phenolic_staining_value1 form-control col-md-7 col-xs-12">
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              --
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="cf_phenolic_staining_value2" name="cf_phenolic_staining_value2" value="<?php echo isset($row_for_gray_variable['cf_phenolic_staining_value2']) ? $row_for_gray_variable['cf_phenolic_staining_value2'] : "" ?>" class="cf_phenolic_staining_value2 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="cf_phenolic_staining_cond2" name="cf_phenolic_staining_cond2" class="cf_phenolic_staining_cond2 form-control col-md-12 col-xs-12">
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($row_for_gray_variable['cf_phenolic_staining_cond2'] == '1') ? 'selected' : '' ?> >)</option>
                <option value="2" <?php echo ($row_for_gray_variable['cf_phenolic_staining_cond2'] == '2') ? 'selected' : '' ?> >]</option>
              </select>
            </div>
          </div>

          <br>


          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cf_pvc_migration_staining"> Color Fastness to PVC Migration Staining 
            </label>

            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              <select id="cf_pvc_migration_staining_cond" name="cf_pvc_migration_staining_cond" onchange="cf_pvc_migration_staining_condition();" class="cf_pvc_migration_staining_cond select2 pp_number form-control col-md-12 col-xs-12">
                <option value="1" selected="selected" > &ge; </option>
                <option value="2" > &le; </option>
              </select> 
            </div> 

            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              <select id="cf_pvc_migration_staining_value" name="cf_pvc_migration_staining_value" onchange="cf_pvc_migration_staining_condition();" class="cf_pvc_migration_staining_value select2 pp_number form-control col-md-12 col-xs-12">
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
              <select id="cf_pvc_migration_staining_cond1" name="cf_pvc_migration_staining_cond1" onchange="cf_pvc_migration_staining_condition()" class="cf_pvc_migration_staining_cond1 form-control col-md-12 col-xs-12">
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($row_for_gray_variable['cf_pvc_migration_staining_cond1'] == '1') ? 'selected' : '' ?> >(</option>
                <option value="2" <?php echo ($row_for_gray_variable['cf_pvc_migration_staining_cond1'] == '2') ? 'selected' : '' ?> >[</option>
              </select>
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="cf_pvc_migration_staining_value1" name="cf_pvc_migration_staining_value1" value="<?php echo isset($row_for_gray_variable['cf_pvc_migration_staining_value1']) ? $row_for_gray_variable['cf_pvc_migration_staining_value1'] : "" ?>" class="cf_pvc_migration_staining_value1 form-control col-md-7 col-xs-12">
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              --
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="cf_pvc_migration_staining_value2" name="cf_pvc_migration_staining_value2" value="<?php echo isset($row_for_gray_variable['cf_pvc_migration_staining_value2']) ? $row_for_gray_variable['cf_pvc_migration_staining_value2'] : "" ?>" class="cf_pvc_migration_staining_value2 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="cf_pvc_migration_staining_cond2" name="cf_pvc_migration_staining_cond2" class="cf_pvc_migration_staining_cond2 form-control col-md-12 col-xs-12">
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($row_for_gray_variable['cf_pvc_migration_staining_cond2'] == '1') ? 'selected' : '' ?> >)</option>
                <option value="2" <?php echo ($row_for_gray_variable['cf_pvc_migration_staining_cond2'] == '2') ? 'selected' : '' ?> >]</option>
              </select>
            </div>
          </div>

          <br>


          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cf_saliva_c_change"> Color Fastness to Saliva Color Change 
            </label>

            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              <select id="cf_saliva_c_change_cond" name="cf_saliva_c_change_cond" onchange="cf_saliva_c_change_condition();" class="cf_saliva_c_change_cond select2 pp_number form-control col-md-12 col-xs-12">
                <option value="1" selected="selected" > &ge; </option>
                <option value="2" > &le; </option>
              </select> 
            </div> 

            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              <select id="cf_saliva_c_change_value" name="cf_saliva_c_change_value" onchange="cf_saliva_c_change_condition();" class="cf_saliva_c_change_value select2 pp_number form-control col-md-12 col-xs-12">
                <option value="5" > 5 </option>
                <option value="4.5" > 4-5 </option>
                <option value="4" > 4 </option>
                <option value="3.5" > 3-4 </option>
                <option value="3" > 3 </option>
                <option value="2.5" > 2-3 </option>
                <option value="2" > 2 </option>
                <option value="1.5" > 1-2 </option>
                <option value="1" > 1 </option>
                <option value="NA" > N/A </option>
              </select> 
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="hidden"   class="form-control col-md-7 col-xs-12">
            </div>


            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              = 
            </div>

            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="cf_saliva_c_change_cond1" name="cf_saliva_c_change_cond1" onchange="cf_saliva_c_change_condition()" class="cf_saliva_c_change_cond1 form-control col-md-12 col-xs-12">
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($row_for_gray_variable['cf_saliva_c_change_cond1'] == '1') ? 'selected' : '' ?> >(</option>
                <option value="2" <?php echo ($row_for_gray_variable['cf_saliva_c_change_cond1'] == '2') ? 'selected' : '' ?> >[</option>
              </select>
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="cf_saliva_c_change_value1" name="cf_saliva_c_change_value1" value="<?php echo isset($row_for_gray_variable['cf_saliva_c_change_value1']) ? $row_for_gray_variable['cf_saliva_c_change_value1'] : "" ?>" class="cf_saliva_c_change_value1 form-control col-md-7 col-xs-12">
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              --
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="cf_saliva_c_change_value2" name="cf_saliva_c_change_value2" value="<?php echo isset($row_for_gray_variable['cf_saliva_c_change_value2']) ? $row_for_gray_variable['cf_saliva_c_change_value2'] : "" ?>" class="cf_saliva_c_change_value2 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="cf_saliva_c_change_cond2" name="cf_saliva_c_change_cond2" class="cf_saliva_c_change_cond2 form-control col-md-12 col-xs-12">
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($row_for_gray_variable['cf_saliva_c_change_cond2'] == '1') ? 'selected' : '' ?> >)</option>
                <option value="2" <?php echo ($row_for_gray_variable['cf_saliva_c_change_cond2'] == '2') ? 'selected' : '' ?> >]</option>
              </select>
            </div>
          </div>

          <br>


          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cf_saliva_staining"> Color Fastness to Saliva Staining 
            </label>

            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              <select id="cf_saliva_staining_cond" name="cf_saliva_staining_cond" onchange="cf_saliva_staining_condition();" class="cf_saliva_staining_cond select2 pp_number form-control col-md-12 col-xs-12">
                <option value="1" selected="selected" > &ge; </option>
                <option value="2" > &le; </option>
              </select> 
            </div> 

            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              <select id="cf_saliva_staining_value" name="cf_saliva_staining_value" onchange="cf_saliva_staining_condition();" class="cf_saliva_staining_value select2 pp_number form-control col-md-12 col-xs-12">
                <option value="5" > 5 </option>
                <option value="4.5" > 4-5 </option>
                <option value="4" > 4 </option>
                <option value="3.5" > 3-4 </option>
                <option value="3" > 3 </option>
                <option value="2.5" > 2-3 </option>
                <option value="2" > 2 </option>
                <option value="1.5" > 1-2 </option>
                <option value="1" > 1 </option>
                <option value="NA" > N/A </option>
              </select> 
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="hidden"   class="form-control col-md-7 col-xs-12">
            </div>


            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              = 
            </div>

            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="cf_saliva_staining_cond1" name="cf_saliva_staining_cond1" onchange="cf_saliva_staining_condition()" class="cf_saliva_staining_cond1 form-control col-md-12 col-xs-12">
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($row_for_gray_variable['cf_saliva_staining_cond1'] == '1') ? 'selected' : '' ?> >(</option>
                <option value="2" <?php echo ($row_for_gray_variable['cf_saliva_staining_cond1'] == '2') ? 'selected' : '' ?> >[</option>
              </select>
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="cf_saliva_staining_value1" name="cf_saliva_staining_value1" value="<?php echo isset($row_for_gray_variable['cf_saliva_staining_value1']) ? $row_for_gray_variable['cf_saliva_staining_value1'] : "" ?>" class="cf_saliva_staining_value1 form-control col-md-7 col-xs-12">
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              --
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="cf_saliva_staining_value2" name="cf_saliva_staining_value2" value="<?php echo isset($row_for_gray_variable['cf_saliva_staining_value2']) ? $row_for_gray_variable['cf_saliva_staining_value2'] : "" ?>" class="cf_saliva_staining_value2 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="cf_saliva_staining_cond2" name="cf_saliva_staining_cond2" class="cf_saliva_staining_cond2 form-control col-md-12 col-xs-12">
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($row_for_gray_variable['cf_saliva_staining_cond2'] == '1') ? 'selected' : '' ?> >)</option>
                <option value="2" <?php echo ($row_for_gray_variable['cf_saliva_staining_cond2'] == '2') ? 'selected' : '' ?> >]</option>
              </select>
            </div>
          </div>

          <br>


          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cf_chlorinated_water_c_change"> Color Fastness to Chlorinated Water Color Change 
            </label>

            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              <select id="cf_chlorinated_water_c_change_cond" name="cf_chlorinated_water_c_change_cond" onchange="cf_chlorinated_water_c_change_condition();" class="cf_chlorinated_water_c_change_cond select2 pp_number form-control col-md-12 col-xs-12">
                <option value="1" selected="selected" > &ge; </option>
                <option value="2" > &le; </option>
              </select> 
            </div> 

            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              <select id="cf_chlorinated_water_c_change_value" name="cf_chlorinated_water_c_change_value" onchange="cf_chlorinated_water_c_change_condition();" class="cf_chlorinated_water_c_change_value select2 pp_number form-control col-md-12 col-xs-12">
                <option value="5" > 5 </option>
                <option value="4.5" > 4-5 </option>
                <option value="4" > 4 </option>
                <option value="3.5" > 3-4 </option>
                <option value="3" > 3 </option>
                <option value="2.5" > 2-3 </option>
                <option value="2" > 2 </option>
                <option value="1.5" > 1-2 </option>
                <option value="1" > 1 </option>
                <option value="NA" > N/A </option>
              </select> 
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="hidden"   class="form-control col-md-7 col-xs-12">
            </div>


            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              = 
            </div>

            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="cf_chlorinated_water_c_change_cond1" name="cf_chlorinated_water_c_change_cond1" onchange="cf_chlorinated_water_c_change_condition()" class="cf_chlorinated_water_c_change_cond1 form-control col-md-12 col-xs-12">
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($row_for_gray_variable['cf_chlorinated_water_c_change_cond1'] == '1') ? 'selected' : '' ?> >(</option>
                <option value="2" <?php echo ($row_for_gray_variable['cf_chlorinated_water_c_change_cond1'] == '2') ? 'selected' : '' ?> >[</option>
              </select>
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="cf_chlorinated_water_c_change_value1" name="cf_chlorinated_water_c_change_value1" value="<?php echo isset($row_for_gray_variable['cf_chlorinated_water_c_change_value1']) ? $row_for_gray_variable['cf_chlorinated_water_c_change_value1'] : "" ?>" class="cf_chlorinated_water_c_change_value1 form-control col-md-7 col-xs-12">
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              --
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="cf_chlorinated_water_c_change_value2" name="cf_chlorinated_water_c_change_value2" value="<?php echo isset($row_for_gray_variable['cf_chlorinated_water_c_change_value2']) ? $row_for_gray_variable['cf_chlorinated_water_c_change_value2'] : "" ?>" class="cf_chlorinated_water_c_change_value2 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="cf_chlorinated_water_c_change_cond2" name="cf_chlorinated_water_c_change_cond2" class="cf_chlorinated_water_c_change_cond2 form-control col-md-12 col-xs-12">
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($row_for_gray_variable['cf_chlorinated_water_c_change_cond2'] == '1') ? 'selected' : '' ?> >)</option>
                <option value="2" <?php echo ($row_for_gray_variable['cf_chlorinated_water_c_change_cond2'] == '2') ? 'selected' : '' ?> >]</option>
              </select>
            </div>
          </div>

          <br>


          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cf_chlorinated_water_staining"> Color Fastness to Chlorinated Water Staining 
            </label>

            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              <select id="cf_chlorinated_water_staining_cond" name="cf_chlorinated_water_staining_cond" onchange="cf_chlorinated_water_staining_condition();" class="cf_chlorinated_water_staining_cond select2 pp_number form-control col-md-12 col-xs-12">
                <option value="1" selected="selected" > &ge; </option>
                <option value="2" > &le; </option>
              </select> 
            </div> 

            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              <select id="cf_chlorinated_water_staining_value" name="cf_chlorinated_water_staining_value" onchange="cf_chlorinated_water_staining_condition();" class="cf_chlorinated_water_staining_value select2 pp_number form-control col-md-12 col-xs-12">
                <option value="5" > 5 </option>
                <option value="4.5" > 4-5 </option>
                <option value="4" > 4 </option>
                <option value="3.5" > 3-4 </option>
                <option value="3" > 3 </option>
                <option value="2.5" > 2-3 </option>
                <option value="2" > 2 </option>
                <option value="1.5" > 1-2 </option>
                <option value="1" > 1 </option>
                <option value="NA" > N/A </option>
              </select> 
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="hidden"   class="form-control col-md-7 col-xs-12">
            </div>


            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              = 
            </div>

            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="cf_chlorinated_water_staining_cond1" name="cf_chlorinated_water_staining_cond1" onchange="cf_chlorinated_water_staining_condition()" class="cf_chlorinated_water_staining_cond1 form-control col-md-12 col-xs-12">
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($row_for_gray_variable['cf_chlorinated_water_staining_cond1'] == '1') ? 'selected' : '' ?> >(</option>
                <option value="2" <?php echo ($row_for_gray_variable['cf_chlorinated_water_staining_cond1'] == '2') ? 'selected' : '' ?> >[</option>
              </select>
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="cf_chlorinated_water_staining_value1" name="cf_chlorinated_water_staining_value1" value="<?php echo isset($row_for_gray_variable['cf_chlorinated_water_staining_value1']) ? $row_for_gray_variable['cf_chlorinated_water_staining_value1'] : "" ?>" class="cf_chlorinated_water_staining_value1 form-control col-md-7 col-xs-12">
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              --
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="cf_chlorinated_water_staining_value2" name="cf_chlorinated_water_staining_value2" value="<?php echo isset($row_for_gray_variable['cf_chlorinated_water_staining_value2']) ? $row_for_gray_variable['cf_chlorinated_water_staining_value2'] : "" ?>" class="cf_chlorinated_water_staining_value2 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="cf_chlorinated_water_staining_cond2" name="cf_chlorinated_water_staining_cond2" class="cf_chlorinated_water_staining_cond2 form-control col-md-12 col-xs-12">
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($row_for_gray_variable['cf_chlorinated_water_staining_cond2'] == '1') ? 'selected' : '' ?> >)</option>
                <option value="2" <?php echo ($row_for_gray_variable['cf_chlorinated_water_staining_cond2'] == '2') ? 'selected' : '' ?> >]</option>
              </select>
            </div>
          </div>

          <br>


          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cf_cholorine_bleach_c_change"> Color Fastness to Cholorine Bleach Color Change 
            </label>

            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              <select id="cf_cholorine_bleach_c_change_cond" name="cf_cholorine_bleach_c_change_cond" onchange="cf_cholorine_bleach_c_change_condition();" class="cf_cholorine_bleach_c_change_cond select2 pp_number form-control col-md-12 col-xs-12">
                <option value="1" selected="selected" > &ge; </option>
                <option value="2" > &le; </option>
              </select> 
            </div> 

            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              <select id="cf_cholorine_bleach_c_change_value" name="cf_cholorine_bleach_c_change_value" onchange="cf_cholorine_bleach_c_change_condition();" class="cf_cholorine_bleach_c_change_value select2 pp_number form-control col-md-12 col-xs-12">
                <option value="5" > 5 </option>
                <option value="4.5" > 4-5 </option>
                <option value="4" > 4 </option>
                <option value="3.5" > 3-4 </option>
                <option value="3" > 3 </option>
                <option value="2.5" > 2-3 </option>
                <option value="2" > 2 </option>
                <option value="1.5" > 1-2 </option>
                <option value="1" > 1 </option>
                <option value="NA" > N/A </option>
              </select> 
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="hidden"   class="form-control col-md-7 col-xs-12">
            </div>


            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              = 
            </div>

            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="cf_cholorine_bleach_c_change_cond1" name="cf_cholorine_bleach_c_change_cond1" onchange="cf_cholorine_bleach_c_change_condition()" class="cf_cholorine_bleach_c_change_cond1 form-control col-md-12 col-xs-12">
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($row_for_gray_variable['cf_cholorine_bleach_c_change_cond1'] == '1') ? 'selected' : '' ?> >(</option>
                <option value="2" <?php echo ($row_for_gray_variable['cf_cholorine_bleach_c_change_cond1'] == '2') ? 'selected' : '' ?> >[</option>
              </select>
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="cf_cholorine_bleach_c_change_value1" name="cf_cholorine_bleach_c_change_value1" value="<?php echo isset($row_for_gray_variable['cf_cholorine_bleach_c_change_value1']) ? $row_for_gray_variable['cf_cholorine_bleach_c_change_value1'] : "" ?>" class="cf_cholorine_bleach_c_change_value1 form-control col-md-7 col-xs-12">
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              --
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="cf_cholorine_bleach_c_change_value2" name="cf_cholorine_bleach_c_change_value2" value="<?php echo isset($row_for_gray_variable['cf_cholorine_bleach_c_change_value2']) ? $row_for_gray_variable['cf_cholorine_bleach_c_change_value2'] : "" ?>" class="cf_cholorine_bleach_c_change_value2 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="cf_cholorine_bleach_c_change_cond2" name="cf_cholorine_bleach_c_change_cond2" class="cf_cholorine_bleach_c_change_cond2 form-control col-md-12 col-xs-12">
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($row_for_gray_variable['cf_cholorine_bleach_c_change_cond2'] == '1') ? 'selected' : '' ?> >)</option>
                <option value="2" <?php echo ($row_for_gray_variable['cf_cholorine_bleach_c_change_cond2'] == '2') ? 'selected' : '' ?> >]</option>
              </select>
            </div>
          </div>

          <br>


          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cf_cholorine_bleach_staining"> Color Fastness to Cholorine Bleach Staining 
            </label>

            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              <select id="cf_cholorine_bleach_staining_cond" name="cf_cholorine_bleach_staining_cond" onchange="cf_cholorine_bleach_staining_condition();" class="cf_cholorine_bleach_staining_cond select2 pp_number form-control col-md-12 col-xs-12">
                <option value="1" selected="selected" > &ge; </option>
                <option value="2" > &le; </option>
              </select> 
            </div> 

            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              <select id="cf_cholorine_bleach_staining_value" name="cf_cholorine_bleach_staining_value" onchange="cf_cholorine_bleach_staining_condition();" class="cf_cholorine_bleach_staining_value select2 pp_number form-control col-md-12 col-xs-12">
                <option value="5" > 5 </option>
                <option value="4.5" > 4-5 </option>
                <option value="4" > 4 </option>
                <option value="3.5" > 3-4 </option>
                <option value="3" > 3 </option>
                <option value="2.5" > 2-3 </option>
                <option value="2" > 2 </option>
                <option value="1.5" > 1-2 </option>
                <option value="1" > 1 </option>
                <option value="NA" > N/A </option>
              </select> 
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="hidden"   class="form-control col-md-7 col-xs-12">
            </div>


            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              = 
            </div>

            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="cf_cholorine_bleach_staining_cond1" name="cf_cholorine_bleach_staining_cond1" onchange="cf_cholorine_bleach_staining_condition()" class="cf_cholorine_bleach_staining_cond1 form-control col-md-12 col-xs-12">
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($row_for_gray_variable['cf_cholorine_bleach_staining_cond1'] == '1') ? 'selected' : '' ?> >(</option>
                <option value="2" <?php echo ($row_for_gray_variable['cf_cholorine_bleach_staining_cond1'] == '2') ? 'selected' : '' ?> >[</option>
              </select>
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="cf_cholorine_bleach_staining_value1" name="cf_cholorine_bleach_staining_value1" value="<?php echo isset($row_for_gray_variable['cf_cholorine_bleach_staining_value1']) ? $row_for_gray_variable['cf_cholorine_bleach_staining_value1'] : "" ?>" class="cf_cholorine_bleach_staining_value1 form-control col-md-7 col-xs-12">
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              --
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="cf_cholorine_bleach_staining_value2" name="cf_cholorine_bleach_staining_value2" value="<?php echo isset($row_for_gray_variable['cf_cholorine_bleach_staining_value2']) ? $row_for_gray_variable['cf_cholorine_bleach_staining_value2'] : "" ?>" class="cf_cholorine_bleach_staining_value2 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="cf_cholorine_bleach_staining_cond2" name="cf_cholorine_bleach_staining_cond2" class="cf_cholorine_bleach_staining_cond2 form-control col-md-12 col-xs-12">
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($row_for_gray_variable['cf_cholorine_bleach_staining_cond2'] == '1') ? 'selected' : '' ?> >)</option>
                <option value="2" <?php echo ($row_for_gray_variable['cf_cholorine_bleach_staining_cond2'] == '2') ? 'selected' : '' ?> >]</option>
              </select>
            </div>
          </div>

          <br>


          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cf_peroxide_bleach_c_change"> Color Fastness to Peroxide Bleach Color Change 
            </label>

            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              <select id="cf_peroxide_bleach_c_change_cond" name="cf_peroxide_bleach_c_change_cond" onchange="cf_peroxide_bleach_c_change_condition();" class="cf_peroxide_bleach_c_change_cond select2 pp_number form-control col-md-12 col-xs-12">
                <option value="1" selected="selected" > &ge; </option>
                <option value="2" > &le; </option>
              </select> 
            </div> 

            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              <select id="cf_peroxide_bleach_c_change_value" name="cf_peroxide_bleach_c_change_value" onchange="cf_peroxide_bleach_c_change_condition();" class="cf_peroxide_bleach_c_change_value select2 pp_number form-control col-md-12 col-xs-12">
                <option value="5" > 5 </option>
                <option value="4.5" > 4-5 </option>
                <option value="4" > 4 </option>
                <option value="3.5" > 3-4 </option>
                <option value="3" > 3 </option>
                <option value="2.5" > 2-3 </option>
                <option value="2" > 2 </option>
                <option value="1.5" > 1-2 </option>
                <option value="1" > 1 </option>
                <option value="NA" > N/A </option>
              </select> 
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="hidden"   class="form-control col-md-7 col-xs-12">
            </div>


            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              = 
            </div>

            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="cf_peroxide_bleach_c_change_cond1" name="cf_peroxide_bleach_c_change_cond1" onchange="cf_peroxide_bleach_c_change_condition()" class="cf_peroxide_bleach_c_change_cond1 form-control col-md-12 col-xs-12">
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($row_for_gray_variable['cf_peroxide_bleach_c_change_cond1'] == '1') ? 'selected' : '' ?> >(</option>
                <option value="2" <?php echo ($row_for_gray_variable['cf_peroxide_bleach_c_change_cond1'] == '2') ? 'selected' : '' ?> >[</option>
              </select>
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="cf_peroxide_bleach_c_change_value1" name="cf_peroxide_bleach_c_change_value1" value="<?php echo isset($row_for_gray_variable['cf_peroxide_bleach_c_change_value1']) ? $row_for_gray_variable['cf_peroxide_bleach_c_change_value1'] : "" ?>" class="cf_peroxide_bleach_c_change_value1 form-control col-md-7 col-xs-12">
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              --
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="cf_peroxide_bleach_c_change_value2" name="cf_peroxide_bleach_c_change_value2" value="<?php echo isset($row_for_gray_variable['cf_peroxide_bleach_c_change_value2']) ? $row_for_gray_variable['cf_peroxide_bleach_c_change_value2'] : "" ?>" class="cf_peroxide_bleach_c_change_value2 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="cf_peroxide_bleach_c_change_cond2" name="cf_peroxide_bleach_c_change_cond2" class="cf_peroxide_bleach_c_change_cond2 form-control col-md-12 col-xs-12">
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($row_for_gray_variable['cf_peroxide_bleach_c_change_cond2'] == '1') ? 'selected' : '' ?> >)</option>
                <option value="2" <?php echo ($row_for_gray_variable['cf_peroxide_bleach_c_change_cond2'] == '2') ? 'selected' : '' ?> >]</option>
              </select>
            </div>
          </div>


          <br>


          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cf_peroxide_bleach_staining"> Color Fastness to Peroxide Bleach Staining 
            </label>

            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              <select id="cf_peroxide_bleach_staining_cond" name="cf_peroxide_bleach_staining_cond" onchange="cf_peroxide_bleach_staining_condition();" class="cf_peroxide_bleach_staining_cond select2 pp_number form-control col-md-12 col-xs-12">
                <option value="1" selected="selected" > &ge; </option>
                <option value="2" > &le; </option>
              </select> 
            </div> 

            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              <select id="cf_peroxide_bleach_staining_value" name="cf_peroxide_bleach_staining_value" onchange="cf_peroxide_bleach_staining_condition();" class="cf_peroxide_bleach_staining_value select2 pp_number form-control col-md-12 col-xs-12">
                <option value="5" > 5 </option>
                <option value="4.5" > 4-5 </option>
                <option value="4" > 4 </option>
                <option value="3.5" > 3-4 </option>
                <option value="3" > 3 </option>
                <option value="2.5" > 2-3 </option>
                <option value="2" > 2 </option>
                <option value="1.5" > 1-2 </option>
                <option value="1" > 1 </option>
                <option value="NA" > N/A </option>
              </select> 
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="hidden"   class="form-control col-md-7 col-xs-12">
            </div>


            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              = 
            </div>

            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="cf_peroxide_bleach_staining_cond1" name="cf_peroxide_bleach_staining_cond1" onchange="cf_peroxide_bleach_staining_condition()" class="cf_peroxide_bleach_staining_cond1 form-control col-md-12 col-xs-12">
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($row_for_gray_variable['cf_peroxide_bleach_staining_cond1'] == '1') ? 'selected' : '' ?> >(</option>
                <option value="2" <?php echo ($row_for_gray_variable['cf_peroxide_bleach_staining_cond1'] == '2') ? 'selected' : '' ?> >[</option>
              </select>
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="cf_peroxide_bleach_staining_value1" name="cf_peroxide_bleach_staining_value1" value="<?php echo isset($row_for_gray_variable['cf_peroxide_bleach_staining_value1']) ? $row_for_gray_variable['cf_peroxide_bleach_staining_value1'] : "" ?>" class="cf_peroxide_bleach_staining_value1 form-control col-md-7 col-xs-12">
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              --
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="cf_peroxide_bleach_staining_value2" name="cf_peroxide_bleach_staining_value2" value="<?php echo isset($row_for_gray_variable['cf_peroxide_bleach_staining_value2']) ? $row_for_gray_variable['cf_peroxide_bleach_staining_value2'] : "" ?>" class="cf_peroxide_bleach_staining_value2 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="cf_peroxide_bleach_staining_cond2" name="cf_peroxide_bleach_staining_cond2" class="cf_peroxide_bleach_staining_cond2 form-control col-md-12 col-xs-12">
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($row_for_gray_variable['cf_peroxide_bleach_staining_cond2'] == '1') ? 'selected' : '' ?> >)</option>
                <option value="2" <?php echo ($row_for_gray_variable['cf_peroxide_bleach_staining_cond2'] == '2') ? 'selected' : '' ?> >]</option>
              </select>
            </div>
          </div>


          <br>


          <div class="form-group">

            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cross_staining"> Cross Staining 
            </label>

            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              <select id="cross_staining_cond" name="cross_staining_cond" onchange="cross_staining_condition();" class="cross_staining_cond select2 pp_number form-control col-md-12 col-xs-12">
                <option value="1" selected="selected" > &ge; </option>
                <option value="2" > &le; </option>
              </select> 
            </div> 

            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              <select id="cross_staining_value" name="cross_staining_value" onchange="cross_staining_condition();" class="cross_staining_value select2 pp_number form-control col-md-12 col-xs-12">
                <option value="5" > 5 </option>
                <option value="4.5" > 4-5 </option>
                <option value="4" > 4 </option>
                <option value="3.5" > 3-4 </option>
                <option value="3" > 3 </option>
                <option value="2.5" > 2-3 </option>
                <option value="2" > 2 </option>
                <option value="1.5" > 1-2 </option>
                <option value="1" > 1 </option>
                <option value="NA" > N/A </option>
              </select> 
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="hidden" class="form-control col-md-7 col-xs-12">
            </div>


            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              =
            </div>

            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="cross_staining_cond1" name="cross_staining_cond1" onchange="cross_staining_tol_condition()" class="cross_staining_cond1 form-control col-md-12 col-xs-12">
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($row_for_gray_variable['cross_staining_cond1'] == '1') ? 'selected' : '' ?> >(</option>
                <option value="2" <?php echo ($row_for_gray_variable['cross_staining_cond1'] == '2') ? 'selected' : '' ?> >[</option>
              </select>
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="cross_staining_value1" name="cross_staining_value1" value="<?php echo isset($row_for_gray_variable['cross_staining_value1']) ? $row_for_gray_variable['cross_staining_value1'] : "" ?>" class="cross_staining_value1 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              --
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="cross_staining_value2" name="cross_staining_value2" value="<?php echo isset($row_for_gray_variable['cross_staining_value2']) ? $row_for_gray_variable['cross_staining_value2'] : "" ?>" class="cross_staining_value2 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="cross_staining_cond2" name="cross_staining_cond2" class="cross_staining_cond2 form-control col-md-12 col-xs-12">
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($row_for_gray_variable['cross_staining_cond2'] == '1') ? 'selected' : '' ?> >)</option>
                <option value="2" <?php echo ($row_for_gray_variable['cross_staining_cond2'] == '2') ? 'selected' : '' ?> >]</option>
              </select>
            </div>
          </div>

      <br>

      <input type="hidden" id="update" name="update" value="yes" >

      <br>

      <br>
        

      <div class="ln_solid"></div>
      <div class="form-group">n
        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
          <input type="hidden" id="pp_no_id" name="pp_no_id" value="<?php echo $pp_no_id; ?>">
          <input type="hidden" id="pp_details_id" name="pp_details_id" value="<?php echo $pp_details_id; ?>">
          <input type="hidden" id="washing_standard_id" name="washing_standard_id" value="<?php echo $row_for_gray_variable['washing_standard_id']; ?>">
          <button type="button" name="submit" id="submit" onclick="update_edit_washing_standard_data('<?php echo $pp_details_id; ?>');" class="btn btn-success" >Update</button>
          <button type="button" name="submit" id="submit" onclick="cancel_edit_standard_data();" class="btn btn-success" >Cancel</button>
        </div>
      </div>

    </form>
  </div>
</div>

<?php  ?>