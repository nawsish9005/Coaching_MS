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

$sql_for_gray_variable = "SELECT * FROM sanforizing_standard WHERE pp_no_id = '$pp_no_id' AND pp_details_id = '$pp_details_id' AND active = '1' ";
$res_for_gray_variable = mysqli_query($con , $sql_for_gray_variable);
$row_for_gray_variable = mysqli_fetch_array($res_for_gray_variable);
?>


<div class="x_panel">
  <div class="x_title">
    <h2>sanforizing Standards Edit Form</h2>
    <ul class="nav navbar-right panel_toolbox">
      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
      </li>
    </ul>
    <div class="clearfix"></div>
  </div>
  <div class="x_content">
    <br />

    <form id="sanforizing_variable_form" name="sanforizing_variable_form" data-parsley-validate class="form-horizontal form-label-left">
      

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

            <label class="control-label col-md-6 col-sm-6 col-xs-12" for="wash_dry_warp_before_iron">Dimensional Change to Washing & Drying Warp (Befor Iron)
            </label>

            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              %
            </div>

            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="wash_dry_warp_before_iron_cond1" name="wash_dry_warp_before_iron_cond1" onchange="wash_dry_warp_before_iron_condition()" class="cf_rubbing_wet_cond1 form-control col-md-12 col-xs-12">
                <option value="2" selected="selected" <?php echo ($row_for_gray_variable['wash_dry_warp_before_iron_cond1'] == '2') ? 'selected' : '' ?> >[</option>
                <option value="1" <?php echo ($row_for_gray_variable['wash_dry_warp_before_iron_cond1'] == '1') ? 'selected' : '' ?> >(</option>
              </select>
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="wash_dry_warp_before_iron_value1" name="wash_dry_warp_before_iron_value1" value="<?php echo isset($row_for_gray_variable['wash_dry_warp_before_iron_value1']) ? $row_for_gray_variable['wash_dry_warp_before_iron_value1'] : "" ?>" class="wash_dry_warp_before_iron_value1 form-control col-md-7 col-xs-12">
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              --
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="wash_dry_warp_before_iron_value2" name="wash_dry_warp_before_iron_value2" value="<?php echo isset($row_for_gray_variable['wash_dry_warp_before_iron_value2']) ? $row_for_gray_variable['wash_dry_warp_before_iron_value2'] : "" ?>" class="wash_dry_warp_before_iron_value2 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="wash_dry_warp_before_iron_cond2" name="wash_dry_warp_before_iron_cond2" class="wash_dry_warp_before_iron_cond2 form-control col-md-12 col-xs-12">
                <option value="2" selected="selected" <?php echo ($row_for_gray_variable['wash_dry_warp_before_iron_cond2'] == '2') ? 'selected' : '' ?> >]</option>
                <option value="1" <?php echo ($row_for_gray_variable['wash_dry_warp_before_iron_cond2'] == '1') ? 'selected' : '' ?> >)</option>
              </select>
            </div>
          </div>

          <br>


          <div class="form-group">

            <label class="control-label col-md-6 col-sm-6 col-xs-12" for="wash_dry_weft_before_iron">Dimensional Change to Washing & Drying Weft (Befor Iron)
            </label>

            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              %
            </div>

            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="wash_dry_weft_before_iron_cond1" name="wash_dry_weft_before_iron_cond1" onchange="wash_dry_weft_before_iron_condition()" class="wash_dry_weft_before_iron_cond1 form-control col-md-12 col-xs-12">
                <option value="2" selected="selected" <?php echo ($row_for_gray_variable['wash_dry_warp_before_iron_cond1'] == '2') ? 'selected' : '' ?> >[</option>
                <option value="1" <?php echo ($row_for_gray_variable['wash_dry_warp_before_iron_cond1'] == '1') ? 'selected' : '' ?> >(</option>
              </select>
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="wash_dry_weft_before_iron_value1" name="wash_dry_weft_before_iron_value1" value="<?php echo isset($row_for_gray_variable['wash_dry_weft_before_iron_value1']) ? $row_for_gray_variable['wash_dry_weft_before_iron_value1'] : "" ?>" class="wash_dry_weft_before_iron_value1 form-control col-md-7 col-xs-12">
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              --
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="wash_dry_weft_before_iron_value2" name="wash_dry_weft_before_iron_value2" value="<?php echo isset($row_for_gray_variable['wash_dry_weft_before_iron_value2']) ? $row_for_gray_variable['wash_dry_weft_before_iron_value2'] : "" ?>" class="wash_dry_weft_before_iron_value2 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="wash_dry_weft_before_iron_cond2" name="wash_dry_weft_before_iron_cond2" class="wash_dry_weft_before_iron_cond2 form-control col-md-12 col-xs-12">
                <option value="2" selected="selected" <?php echo ($row_for_gray_variable['wash_dry_weft_before_iron_cond2'] == '2') ? 'selected' : '' ?> >]</option>
                <option value="1" <?php echo ($row_for_gray_variable['wash_dry_weft_before_iron_cond2'] == '1') ? 'selected' : '' ?> >)</option>
              </select>
            </div>
          </div>

          <br>


          <div class="form-group">

            <label class="control-label col-md-6 col-sm-6 col-xs-12" for="wash_dry_warp_after_iron">Dimensional Change to Washing & Drying Warp (After Iron)
            </label>

            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              %
            </div>

            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="wash_dry_warp_after_iron_cond1" name="wash_dry_warp_after_iron_cond1" onchange="wash_dry_warp_after_iron_condition()" class="cf_rubbing_wet_cond1 form-control col-md-12 col-xs-12">
                <option value="2" selected="selected" <?php echo ($row_for_gray_variable['wash_dry_warp_after_iron_cond1'] == '2') ? 'selected' : '' ?> >[</option>
                <option value="1" <?php echo ($row_for_gray_variable['wash_dry_warp_after_iron_cond1'] == '1') ? 'selected' : '' ?> >(</option>
              </select>
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="wash_dry_warp_after_iron_value1" name="wash_dry_warp_after_iron_value1" value="<?php echo isset($row_for_gray_variable['wash_dry_warp_after_iron_value1']) ? $row_for_gray_variable['wash_dry_warp_after_iron_value1'] : "" ?>" class="wash_dry_warp_after_iron_value1 form-control col-md-7 col-xs-12">
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              --
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="wash_dry_warp_after_iron_value2" name="wash_dry_warp_after_iron_value2" value="<?php echo isset($row_for_gray_variable['wash_dry_warp_after_iron_value2']) ? $row_for_gray_variable['wash_dry_warp_after_iron_value2'] : "" ?>" class="wash_dry_warp_after_iron_value2 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="wash_dry_warp_after_iron_cond2" name="wash_dry_warp_after_iron_cond2" class="wash_dry_warp_after_iron_cond2 form-control col-md-12 col-xs-12">
                <option value="2" selected="selected" <?php echo ($row_for_gray_variable['wash_dry_warp_after_iron_cond2'] == '2') ? 'selected' : '' ?> >]</option>
                <option value="1" <?php echo ($row_for_gray_variable['wash_dry_warp_after_iron_cond2'] == '1') ? 'selected' : '' ?> >)</option>
              </select>
            </div>
          </div>

          <br>


          <div class="form-group">

            <label class="control-label col-md-6 col-sm-6 col-xs-12" for="wash_dry_weft_after_iron">Dimensional Change to Washing & Drying Weft (After Iron)
            </label>

            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              %
            </div>

            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="wash_dry_weft_after_iron_cond1" name="wash_dry_weft_after_iron_cond1" onchange="wash_dry_weft_after_iron_condition()" class="wash_dry_weft_after_iron_cond1 form-control col-md-12 col-xs-12">
                <option value="2" selected="selected" <?php echo ($row_for_gray_variable['wash_dry_warp_after_iron_cond1'] == '2') ? 'selected' : '' ?> >[</option>
                <option value="1" <?php echo ($row_for_gray_variable['wash_dry_warp_after_iron_cond1'] == '1') ? 'selected' : '' ?> >(</option>
              </select>
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="wash_dry_weft_after_iron_value1" name="wash_dry_weft_after_iron_value1" value="<?php echo isset($row_for_gray_variable['wash_dry_weft_after_iron_value1']) ? $row_for_gray_variable['wash_dry_weft_after_iron_value1'] : "" ?>" class="wash_dry_weft_after_iron_value1 form-control col-md-7 col-xs-12">
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              --
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="wash_dry_weft_after_iron_value2" name="wash_dry_weft_after_iron_value2" value="<?php echo isset($row_for_gray_variable['wash_dry_weft_after_iron_value2']) ? $row_for_gray_variable['wash_dry_weft_after_iron_value2'] : "" ?>" class="wash_dry_weft_after_iron_value2 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="wash_dry_weft_after_iron_cond2" name="wash_dry_weft_after_iron_cond2" class="wash_dry_weft_after_iron_cond2 form-control col-md-12 col-xs-12">
                <option value="2" selected="selected" <?php echo ($row_for_gray_variable['wash_dry_weft_after_iron_cond2'] == '2') ? 'selected' : '' ?> >]</option>
                <option value="1" <?php echo ($row_for_gray_variable['wash_dry_weft_after_iron_cond2'] == '1') ? 'selected' : '' ?> >)</option>
              </select>
            </div>
          </div>

          <br>


          <div class="form-group">

            <label class="control-label col-md-6 col-sm-6 col-xs-12" for="dry_cleaning_warp">Dimensional Change to Dry Cleaning Warp 
            </label>

            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              %
            </div>

            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="dry_cleaning_warp_cond1" name="dry_cleaning_warp_cond1" onchange="dry_cleaning_warp_condition()" class="dry_cleaning_warp_cond1 form-control col-md-12 col-xs-12">
                <option value="2" selected="selected" <?php echo ($row_for_gray_variable['dry_cleaning_warp_cond1'] == '2') ? 'selected' : '' ?> >[</option>
                <option value="1" <?php echo ($row_for_gray_variable['dry_cleaning_warp_cond1'] == '1') ? 'selected' : '' ?> >(</option>
              </select>
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="dry_cleaning_warp_value1" name="dry_cleaning_warp_value1" value="<?php echo isset($row_for_gray_variable['dry_cleaning_warp_value1']) ? $row_for_gray_variable['dry_cleaning_warp_value1'] : "" ?>" class="dry_cleaning_warp_value1 form-control col-md-7 col-xs-12">
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              --
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="dry_cleaning_warp_value2" name="dry_cleaning_warp_value2" value="<?php echo isset($row_for_gray_variable['dry_cleaning_warp_value2']) ? $row_for_gray_variable['dry_cleaning_warp_value2'] : "" ?>" class="dry_cleaning_warp_value2 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="dry_cleaning_warp_cond2" name="dry_cleaning_warp_cond2" class="dry_cleaning_warp_cond2 form-control col-md-12 col-xs-12">
                <option value="2" selected="selected" <?php echo ($row_for_gray_variable['dry_cleaning_warp_cond2'] == '2') ? 'selected' : '' ?> >]</option>
                <option value="1" <?php echo ($row_for_gray_variable['dry_cleaning_warp_cond2'] == '1') ? 'selected' : '' ?> >)</option>
              </select>
            </div>
          </div>

          <br>


          <div class="form-group">

            <label class="control-label col-md-6 col-sm-6 col-xs-12" for="dry_cleaning_weft">Dimensional Change to Dry Cleaning Weft
            </label>

            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              %
            </div>

            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="dry_cleaning_weft_cond1" name="dry_cleaning_weft_cond1" onchange="dry_cleaning_weft_condition()" class="dry_cleaning_weft_cond1 form-control col-md-12 col-xs-12">
                <option value="2" selected="selected" <?php echo ($row_for_gray_variable['dry_cleaning_weft_cond1'] == '2') ? 'selected' : '' ?> >[</option>
                <option value="1" <?php echo ($row_for_gray_variable['dry_cleaning_weft_cond1'] == '1') ? 'selected' : '' ?> >(</option>
              </select>
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="dry_cleaning_weft_value1" name="dry_cleaning_weft_value1" value="<?php echo isset($row_for_gray_variable['dry_cleaning_weft_value1']) ? $row_for_gray_variable['dry_cleaning_weft_value1'] : "" ?>" class="dry_cleaning_weft_value1 form-control col-md-7 col-xs-12">
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              --
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="dry_cleaning_weft_value2" name="dry_cleaning_weft_value2" value="<?php echo isset($row_for_gray_variable['dry_cleaning_weft_value2']) ? $row_for_gray_variable['dry_cleaning_weft_value2'] : "" ?>" class="dry_cleaning_weft_value2 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="dry_cleaning_weft_cond2" name="dry_cleaning_weft_cond2" class="dry_cleaning_weft_cond2 form-control col-md-12 col-xs-12">
                <option value="2" selected="selected" <?php echo ($row_for_gray_variable['dry_cleaning_weft_cond2'] == '2') ? 'selected' : '' ?> >]</option>
                <option value="1" <?php echo ($row_for_gray_variable['dry_cleaning_weft_cond2'] == '1') ? 'selected' : '' ?> >)</option>
              </select>
            </div>
          </div>

          <br>

          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="yarn_count_warp">Yarn Count for Warp (%)<span class="required">*</span>
            </label>

            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="yarn_count_warp_tol_value1" name="yarn_count_warp_tol_value1" oninput="yarn_count_warp_tol_condition();" class="yarn_count_warp_tol_value1 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              <select id="yarn_count_warp_tol_cond" name="yarn_count_warp_tol_cond" onchange="yarn_count_warp_tol_condition();" class="yarn_count_warp_tol_cond select2 pp_number form-control col-md-12 col-xs-12">
                <option value="1" selected="selected" > &plusmn; </option>
                <option value="2" > + </option>
                <option value="3" > - </option>
              </select> 
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="yarn_count_warp_tol_value2" name="yarn_count_warp_tol_value2" oninput="yarn_count_warp_tol_condition();" class="yarn_count_warp_tol_value2 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              <select id="yarn_count_warp_unit" name="yarn_count_warp_unit" class="yarn_count_warp_unit form-control col-md-12 col-xs-12">
                <option value="Ne" selected <?php echo ($row_for_gray_variable['yarn_count_warp_unit'] == 'Ne') ? 'selected' : '' ?> >Ne</option>
                <option value="Nm" <?php echo ($row_for_gray_variable['yarn_count_warp_unit'] == 'Nm') ? 'selected' : '' ?> >Nm</option>
                <option value="den" <?php echo ($row_for_gray_variable['yarn_count_warp_unit'] == 'den') ? 'selected' : '' ?> >den</option>
                <option value="tex" <?php echo ($row_for_gray_variable['yarn_count_warp_unit'] == 'tex') ? 'selected' : '' ?> >tex</option>
                <option value="dtex" <?php echo ($row_for_gray_variable['yarn_count_warp_unit'] == 'dtex') ? 'selected' : '' ?> >dtex</option>
              </select>
            </div>

            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="yarn_count_warp_cond1" name="yarn_count_warp_cond1" onchange="yarn_count_warp_tol_condition()" class="yarn_count_warp_cond1 form-control col-md-12 col-xs-12">
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($row_for_gray_variable['yarn_count_warp_cond1'] == '1') ? 'selected' : '' ?> >(</option>
                <option value="2" <?php echo ($row_for_gray_variable['yarn_count_warp_cond1'] == '2') ? 'selected' : '' ?> >[</option>
              </select>
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="yarn_count_warp_value1" name="yarn_count_warp_value1" value="<?php echo isset($row_for_gray_variable['yarn_count_warp_value1']) ? $row_for_gray_variable['yarn_count_warp_value1'] : "" ?>" class="yarn_count_warp_value1 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              --
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="yarn_count_warp_value2" name="yarn_count_warp_value2" value="<?php echo isset($row_for_gray_variable['yarn_count_warp_value2']) ? $row_for_gray_variable['yarn_count_warp_value2'] : "" ?>" class="yarn_count_warp_value2 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="yarn_count_warp_cond2" name="yarn_count_warp_cond2" class="yarn_count_warp_cond2 form-control col-md-12 col-xs-12">
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($row_for_gray_variable['yarn_count_warp_cond2'] == '1') ? 'selected' : '' ?> >)</option>
                <option value="2" <?php echo ($row_for_gray_variable['yarn_count_warp_cond2'] == '2') ? 'selected' : '' ?> >]</option>
              </select>
            </div>
          </div> 

          <br>


          <div class="form-group">

            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="yarn_count_weft">Yarn Count for Weft (%)<span class="required">*</span>
            </label>

            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="yarn_count_weft_tol_value1" name="yarn_count_weft_tol_value1" oninput="yarn_count_weft_tol_condition();" class="yarn_count_weft_tol_value1 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              <select id="yarn_count_weft_tol_cond" name="yarn_count_weft_tol_cond" onchange="yarn_count_weft_tol_condition();" class="yarn_count_weft_tol_cond select2 pp_number form-control col-md-12 col-xs-12">
                <option value="1" selected="selected" > &plusmn; </option>
                <option value="2" > + </option>
                <option value="3" > - </option>
              </select> 
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="yarn_count_weft_tol_value2" name="yarn_count_weft_tol_value2" oninput="yarn_count_weft_tol_condition();" class="yarn_count_weft_tol_value2 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              <select id="yarn_count_weft_unit" name="yarn_count_weft_unit" class="yarn_count_weft_unit form-control col-md-12 col-xs-12">
                <option value="Ne" selected <?php echo ($row_for_gray_variable['yarn_count_weft_unit'] == 'Ne') ? 'selected' : '' ?> >Ne</option>
                <option value="Nm" <?php echo ($row_for_gray_variable['yarn_count_weft_unit'] == 'Nm') ? 'selected' : '' ?> >Nm</option>
                <option value="den" <?php echo ($row_for_gray_variable['yarn_count_weft_unit'] == 'den') ? 'selected' : '' ?> >den</option>
                <option value="tex" <?php echo ($row_for_gray_variable['yarn_count_weft_unit'] == 'tex') ? 'selected' : '' ?> >tex</option>
                <option value="dtex" <?php echo ($row_for_gray_variable['yarn_count_weft_unit'] == 'dtex') ? 'selected' : '' ?> >dtex</option>
              </select>
            </div>

            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="yarn_count_weft_cond1" name="yarn_count_weft_cond1" onchange="yarn_count_weft_tol_condition()" class="yarn_count_weft_cond1 form-control col-md-12 col-xs-12">
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($row_for_gray_variable['yarn_count_weft_cond1'] == '1') ? 'selected' : '' ?> >(</option>
                <option value="2" <?php echo ($row_for_gray_variable['yarn_count_weft_cond1'] == '2') ? 'selected' : '' ?> >[</option>
              </select>
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="yarn_count_weft_value1" name="yarn_count_weft_value1" value="<?php echo isset($row_for_gray_variable['yarn_count_weft_value1']) ? $row_for_gray_variable['yarn_count_weft_value1'] : "" ?>" class="yarn_count_weft_value1 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              --
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="yarn_count_weft_value2" name="yarn_count_weft_value2" value="<?php echo isset($row_for_gray_variable['yarn_count_weft_value2']) ? $row_for_gray_variable['yarn_count_weft_value2'] : "" ?>" class="yarn_count_weft_value2 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="yarn_count_weft_cond2" name="yarn_count_weft_cond2" class="yarn_count_weft_cond2 form-control col-md-12 col-xs-12">
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($row_for_gray_variable['yarn_count_weft_cond2'] == '1') ? 'selected' : '' ?> >)</option>
                <option value="2" <?php echo ($row_for_gray_variable['yarn_count_weft_cond2'] == '2') ? 'selected' : '' ?> >]</option>
              </select>
            </div>
          </div> 

          <br>

          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number_thread_warp">Number of Threads Warp (%)<span class="required">*</span>
            </label>

            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="number_thread_warp_tol_value1" name="number_thread_warp_tol_value1" oninput="number_thread_warp_tol_condition();" class="number_thread_warp_tol_value1 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              <select id="number_thread_warp_tol_cond" name="number_thread_warp_tol_cond" onchange="number_thread_warp_tol_condition();" class="number_thread_warp_tol_cond select2 pp_number form-control col-md-12 col-xs-12">
                <option value="1" selected="selected" > &plusmn; </option>
                <option value="2" > + </option>
                <option value="3" > - </option>
              </select> 
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="number_thread_warp_tol_value2" name="number_thread_warp_tol_value2" oninput="number_thread_warp_tol_condition();" class="number_thread_warp_tol_value2 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              <select id="number_thread_warp_unit" name="number_thread_warp_unit" class="number_thread_warp_unit form-control col-md-12 col-xs-12">
                <option value="th/inch" selected <?php echo ($row_for_gray_variable['number_thread_warp_unit'] == 'th/inch') ? 'selected' : '' ?> >th/inch</option>
                <option value="th/cm" <?php echo ($row_for_gray_variable['number_thread_warp_unit'] == 'th/cm') ? 'selected' : '' ?> >th/cm</option>
              </select>
            </div>

            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="number_thread_warp_cond1" name="number_thread_warp_cond1" onchange="number_thread_warp_tol_condition()" class="number_thread_warp_cond1 form-control col-md-12 col-xs-12">
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($row_for_gray_variable['number_thread_warp_cond1'] == '1') ? 'selected' : '' ?> >(</option>
                <option value="2" <?php echo ($row_for_gray_variable['number_thread_warp_cond1'] == '2') ? 'selected' : '' ?> >[</option>
              </select>
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="number_thread_warp_value1" name="number_thread_warp_value1" value="<?php echo isset($row_for_gray_variable['number_thread_warp_value1']) ? $row_for_gray_variable['number_thread_warp_value1'] : "" ?>" class="number_thread_warp_value1 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              --
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="number_thread_warp_value2" name="number_thread_warp_value2" value="<?php echo isset($row_for_gray_variable['number_thread_warp_value2']) ? $row_for_gray_variable['number_thread_warp_value2'] : "" ?>" class="number_thread_warp_value2 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="number_thread_warp_cond2" name="number_thread_warp_cond2" class="number_thread_warp_cond2 form-control col-md-12 col-xs-12">
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($row_for_gray_variable['number_thread_warp_cond2'] == '1') ? 'selected' : '' ?> >)</option>
                <option value="2" <?php echo ($row_for_gray_variable['number_thread_warp_cond2'] == '2') ? 'selected' : '' ?> >]</option>
              </select>
            </div>
          </div> 

          <br>


          <div class="form-group">

            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number_thread_weft">Number of Threads Weft (%)<span class="required">*</span>
            </label>

            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="number_thread_weft_tol_value1" name="number_thread_weft_tol_value1" oninput="number_thread_weft_tol_condition();" class="number_thread_weft_tol_value1 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              <select id="number_thread_weft_tol_cond" name="number_thread_weft_tol_cond" onchange="number_thread_weft_tol_condition();" class="number_thread_weft_tol_cond select2 pp_number form-control col-md-12 col-xs-12">
                <option value="1" selected="selected" > &plusmn; </option>
                <option value="2" > + </option>
                <option value="3" > - </option>
              </select> 
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="number_thread_weft_tol_value2" name="number_thread_weft_tol_value2" oninput="number_thread_weft_tol_condition();" class="number_thread_weft_tol_value2 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              <select id="number_thread_weft_unit" name="number_thread_weft_unit" class="number_thread_weft_unit form-control col-md-12 col-xs-12">
                <option value="th/inch" selected <?php echo ($row_for_gray_variable['number_thread_weft_unit'] == 'th/inch') ? 'selected' : '' ?> >th/inch</option>
                <option value="th/cm" <?php echo ($row_for_gray_variable['number_thread_weft_unit'] == 'th/cm') ? 'selected' : '' ?> >th/cm</option>
              </select>
            </div>

            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="number_thread_weft_cond1" name="number_thread_weft_cond1" onchange="number_thread_weft_tol_condition()" class="number_thread_weft_cond1 form-control col-md-12 col-xs-12">
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($row_for_gray_variable['number_thread_weft_cond1'] == '1') ? 'selected' : '' ?> >(</option>
                <option value="2" <?php echo ($row_for_gray_variable['number_thread_weft_cond1'] == '2') ? 'selected' : '' ?> >[</option>
              </select>
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="number_thread_weft_value1" name="number_thread_weft_value1" value="<?php echo isset($row_for_gray_variable['number_thread_weft_value1']) ? $row_for_gray_variable['number_thread_weft_value1'] : "" ?>" class="number_thread_weft_value1 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              --
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="number_thread_weft_value2" name="number_thread_weft_value2" value="<?php echo isset($row_for_gray_variable['number_thread_weft_value2']) ? $row_for_gray_variable['number_thread_weft_value2'] : "" ?>" class="number_thread_weft_value2 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="number_thread_weft_cond2" name="number_thread_weft_cond2" class="number_thread_weft_cond2 form-control col-md-12 col-xs-12">
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($row_for_gray_variable['number_thread_weft_cond2'] == '1') ? 'selected' : '' ?> >)</option>
                <option value="2" <?php echo ($row_for_gray_variable['number_thread_weft_cond2'] == '2') ? 'selected' : '' ?> >]</option>
              </select>
            </div>
          </div> 

          <br>
          
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="mass_per_unit_per_area">Mass per Unit per Area (%)<span class="required">*</span>
            </label>

            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="mass_per_unit_per_area_tol_value" name="mass_per_unit_per_area_tol_value" oninput="mass_per_unit_per_area_tol();" class="mass_per_unit_per_area_tol_value1 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              <input type="text" id="mass_per_unit_per_area_tol_positive" placeholder="For +" name="mass_per_unit_per_area_tol_positive" oninput="mass_per_unit_per_area_tol();" class="mass_per_unit_per_area_tol_positive form-control col-md-7 col-xs-12">
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="mass_per_unit_per_area_tol_negative" placeholder="For -" name="mass_per_unit_per_area_tol_negative" oninput="mass_per_unit_per_area_tol();" class="mass_per_unit_per_area_tol_negative form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              <select id="mass_per_unit_per_area_unit" name="mass_per_unit_per_area_unit" class="mass_per_unit_per_area_unit form-control col-md-12 col-xs-12">
                <option value="gm/m2" selected <?php echo ($row_for_gray_variable['mass_per_unit_per_area_unit'] == 'gm/m2') ? 'selected' : '' ?> >gm/m2</option>
                <option value="oz/yd2" <?php echo ($row_for_gray_variable['mass_per_unit_per_area_unit'] == 'oz/yd2') ? 'selected' : '' ?> >oz/yd2</option>
              </select>
            </div>

            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="mass_per_unit_per_area_cond1" name="mass_per_unit_per_area_cond1" onchange="mass_per_unit_per_area_condition()" class="mass_per_unit_per_area_cond1 form-control col-md-12 col-xs-12">
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($row_for_gray_variable['mass_per_unit_per_area_cond1'] == '1') ? 'selected' : '' ?> >(</option>
                <option value="2" <?php echo ($row_for_gray_variable['mass_per_unit_per_area_cond1'] == '2') ? 'selected' : '' ?> >[</option>
              </select>
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="mass_per_unit_per_area_value1" name="mass_per_unit_per_area_value1" value="<?php echo isset($row_for_gray_variable['mass_per_unit_per_area_value1']) ? $row_for_gray_variable['mass_per_unit_per_area_value1'] : "" ?>" class="mass_per_unit_per_area_value1 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              --
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="mass_per_unit_per_area_value2" name="mass_per_unit_per_area_value2" value="<?php echo isset($row_for_gray_variable['mass_per_unit_per_area_value2']) ? $row_for_gray_variable['mass_per_unit_per_area_value2'] : "" ?>" class="mass_per_unit_per_area_value2 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="mass_per_unit_per_area_cond2" name="mass_per_unit_per_area_cond2" class="mass_per_unit_per_area_cond2 form-control col-md-12 col-xs-12">
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($row_for_gray_variable['mass_per_unit_per_area_cond2'] == '1') ? 'selected' : '' ?> >)</option>
                <option value="2" <?php echo ($row_for_gray_variable['mass_per_unit_per_area_cond2'] == '2') ? 'selected' : '' ?> >]</option>
              </select>
            </div>
          </div>

          <br>


          <div class="form-group">

            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="surface_pilling"> Surface Fuzzing & to Pilling
            </label>

            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              <select id="surface_pilling_cond" name="surface_pilling_cond" onchange="surface_pilling_condition();" class="surface_pilling_cond select2 pp_number form-control col-md-12 col-xs-12">
                <option value="1" selected="selected" > &ge; </option>
                <option value="2" > &le; </option>
              </select> 
            </div> 

            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              <select id="surface_pilling_value" name="surface_pilling_value" onchange="surface_pilling_condition();" class="surface_pilling_value select2 pp_number form-control col-md-12 col-xs-12">
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
              <select id="surface_pilling_cond1" name="surface_pilling_cond1" onchange="surface_pilling_condition()" class="surface_pilling_cond1 form-control col-md-12 col-xs-12">
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($row_for_gray_variable['surface_pilling_cond1'] == '1') ? 'selected' : '' ?> >(</option>
                <option value="2" <?php echo ($row_for_gray_variable['surface_pilling_cond1'] == '2') ? 'selected' : '' ?> >[</option>
              </select>
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="surface_pilling_value1" name="surface_pilling_value1" value="<?php echo isset($row_for_gray_variable['surface_pilling_value1']) ? $row_for_gray_variable['surface_pilling_value1'] : "" ?>" class="surface_pilling_value1 form-control col-md-7 col-xs-12">
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              --
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="surface_pilling_value2" name="surface_pilling_value2" value="<?php echo isset($row_for_gray_variable['surface_pilling_value2']) ? $row_for_gray_variable['surface_pilling_value2'] : "" ?>" class="surface_pilling_value2 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="surface_pilling_cond2" name="surface_pilling_cond2" class="surface_pilling_cond2 form-control col-md-12 col-xs-12">
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($row_for_gray_variable['surface_pilling_cond2'] == '1') ? 'selected' : '' ?> >)</option>
                <option value="2" <?php echo ($row_for_gray_variable['surface_pilling_cond2'] == '2') ? 'selected' : '' ?> >]</option>
              </select>
            </div>
          </div>

          <br>


          <div class="form-group">

            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tensile_warp"> Tensile Properties Warp
            </label>

            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              <select id="tensile_warp_cond" name="tensile_warp_cond" onchange="tensile_warp_condition();" class="tensile_warp_cond select2 pp_number form-control col-md-12 col-xs-12">
                <option value="1" selected="selected" > &ge; </option>
                <option value="2" > &le; </option>
              </select> 
            </div> 

            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              <input type="text" id="tensile_warp_value" name="tensile_warp_value" oninput="tensile_warp_condition();" class="tensile_warp_value form-control col-md-7 col-xs-12">
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="hidden" class="form-control col-md-7 col-xs-12">
            </div>

            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              <select id="tensile_warp_unit" name="tensile_warp_unit" class="tensile_warp_unit form-control col-md-12 col-xs-12">
                <option value="N" selected <?php echo ($row_for_gray_variable['tensile_warp_unit'] == 'N') ? 'selected' : '' ?> >N</option>
                <option value="kg" <?php echo ($row_for_gray_variable['tensile_warp_unit'] == 'kg') ? 'selected' : '' ?> >kg</option>
                <option value="lbf" <?php echo ($row_for_gray_variable['tensile_warp_unit'] == 'lbf') ? 'selected' : '' ?> >lbf</option>
                <option value="gm" <?php echo ($row_for_gray_variable['tensile_warp_unit'] == 'gm') ? 'selected' : '' ?> >gm</option>
                <option value="daN" <?php echo ($row_for_gray_variable['tensile_warp_unit'] == 'daN') ? 'selected' : '' ?> >daN</option>
                <option value="oz" <?php echo ($row_for_gray_variable['tensile_warp_unit'] == 'oz') ? 'selected' : '' ?> >oz</option>
              </select>
            </div>

            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="tensile_warp_cond1" name="tensile_warp_cond1" onchange="tensile_warp_condition()" class="tensile_warp_cond1 form-control col-md-12 col-xs-12">
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($row_for_gray_variable['tensile_warp_cond1'] == '1') ? 'selected' : '' ?> >(</option>
                <option value="2" <?php echo ($row_for_gray_variable['tensile_warp_cond1'] == '2') ? 'selected' : '' ?> >[</option>
              </select>
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="tensile_warp_value1" name="tensile_warp_value1" value="<?php echo isset($row_for_gray_variable['tensile_warp_value1']) ? $row_for_gray_variable['tensile_warp_value1'] : "" ?>" class="tensile_warp_value1 form-control col-md-7 col-xs-12">
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              --
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="tensile_warp_value2" name="tensile_warp_value2" value="<?php echo isset($row_for_gray_variable['tensile_warp_value2']) ? $row_for_gray_variable['tensile_warp_value2'] : "" ?>" class="tensile_warp_value2 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="tensile_warp_cond2" name="tensile_warp_cond2" class="tensile_warp_cond2 form-control col-md-12 col-xs-12">
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($row_for_gray_variable['tensile_warp_cond2'] == '1') ? 'selected' : '' ?> >)</option>
                <option value="2" <?php echo ($row_for_gray_variable['tensile_warp_cond2'] == '2') ? 'selected' : '' ?> >]</option>
              </select>
            </div>
          </div>

          <br>

          <div class="form-group">

            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tensile_weft"> Tensile Properties Weft
            </label>

            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              <select id="tensile_weft_cond" name="tensile_weft_cond" onchange="tensile_weft_condition();" class="tensile_weft_cond select2 pp_number form-control col-md-12 col-xs-12">
                <option value="1" selected="selected" > &ge; </option>
                <option value="2" > &le; </option>
              </select> 
            </div> 

            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              <input type="text" id="tensile_weft_value" name="tensile_weft_value" oninput="tensile_weft_condition();" class="tensile_weft_value form-control col-md-7 col-xs-12">
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="hidden" class="form-control col-md-7 col-xs-12">
            </div>

            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              <select id="tensile_weft_unit" name="tensile_weft_unit" class="tensile_weft_unit form-control col-md-12 col-xs-12">
                <option value="N" selected <?php echo ($row_for_gray_variable['tensile_weft_unit'] == 'N') ? 'selected' : '' ?> >N</option>
                <option value="kg" <?php echo ($row_for_gray_variable['tensile_weft_unit'] == 'kg') ? 'selected' : '' ?> >kg</option>
                <option value="lbf" <?php echo ($row_for_gray_variable['tensile_weft_unit'] == 'lbf') ? 'selected' : '' ?> >lbf</option>
                <option value="gm" <?php echo ($row_for_gray_variable['tensile_weft_unit'] == 'gm') ? 'selected' : '' ?> >gm</option>
                <option value="daN" <?php echo ($row_for_gray_variable['tensile_weft_unit'] == 'daN') ? 'selected' : '' ?> >daN</option>
                <option value="oz" <?php echo ($row_for_gray_variable['tensile_weft_unit'] == 'oz') ? 'selected' : '' ?> >oz</option>
              </select>
            </div>

            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="tensile_weft_cond1" name="tensile_weft_cond1" onchange="tensile_weft_condition()" class="tensile_weft_cond1 form-control col-md-12 col-xs-12">
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($row_for_gray_variable['tensile_weft_cond1'] == '1') ? 'selected' : '' ?> >(</option>
                <option value="2" <?php echo ($row_for_gray_variable['tensile_weft_cond1'] == '2') ? 'selected' : '' ?> >[</option>
              </select>
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="tensile_weft_value1" name="tensile_weft_value1" value="<?php echo isset($row_for_gray_variable['tensile_weft_value1']) ? $row_for_gray_variable['tensile_weft_value1'] : "" ?>" class="tensile_weft_value1 form-control col-md-7 col-xs-12">
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              --
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="tensile_weft_value2" name="tensile_weft_value2" value="<?php echo isset($row_for_gray_variable['tensile_weft_value2']) ? $row_for_gray_variable['tensile_weft_value2'] : "" ?>" class="tensile_weft_value2 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="tensile_weft_cond2" name="tensile_weft_cond2" class="tensile_weft_cond2 form-control col-md-12 col-xs-12">
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($row_for_gray_variable['tensile_weft_cond2'] == '1') ? 'selected' : '' ?> >)</option>
                <option value="2" <?php echo ($row_for_gray_variable['tensile_weft_cond2'] == '2') ? 'selected' : '' ?> >]</option>
              </select>
            </div>
          </div>

          <br>

          <div class="form-group">

            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tear_force_warp"> Tear Force Warp
            </label>

            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              <select id="tear_force_warp_cond" name="tear_force_warp_cond" onchange="tear_force_warp_condition();" class="tear_force_warp_cond select2 pp_number form-control col-md-12 col-xs-12">
                <option value="1" selected="selected" > &ge; </option>
                <option value="2" > &le; </option>
              </select> 
            </div> 

            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              <input type="text" id="tear_force_warp_value" name="tear_force_warp_value" oninput="tear_force_warp_condition();" class="tear_force_warp_value form-control col-md-7 col-xs-12">
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="hidden" class="form-control col-md-7 col-xs-12">
            </div>

            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              <select id="tear_force_warp_unit" name="tear_force_warp_unit" class="tear_force_warp_unit form-control col-md-12 col-xs-12">
                <option value="N" selected <?php echo ($row_for_gray_variable['tear_force_warp_unit'] == 'N') ? 'selected' : '' ?> >N</option>
                <option value="kg" <?php echo ($row_for_gray_variable['tear_force_warp_unit'] == 'kg') ? 'selected' : '' ?> >kg</option>
                <option value="lbf" <?php echo ($row_for_gray_variable['tear_force_warp_unit'] == 'lbf') ? 'selected' : '' ?> >lbf</option>
                <option value="gm" <?php echo ($row_for_gray_variable['tear_force_warp_unit'] == 'gm') ? 'selected' : '' ?> >gm</option>
                <option value="daN" <?php echo ($row_for_gray_variable['tear_force_warp_unit'] == 'daN') ? 'selected' : '' ?> >daN</option>
                <option value="oz" <?php echo ($row_for_gray_variable['tear_force_warp_unit'] == 'oz') ? 'selected' : '' ?> >oz</option>
              </select>
            </div>

            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="tear_force_warp_cond1" name="tear_force_warp_cond1" onchange="tear_force_warp_condition()" class="tear_force_warp_cond1 form-control col-md-12 col-xs-12">
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($row_for_gray_variable['tear_force_warp_cond1'] == '1') ? 'selected' : '' ?> >(</option>
                <option value="2" <?php echo ($row_for_gray_variable['tear_force_warp_cond1'] == '2') ? 'selected' : '' ?> >[</option>
              </select>
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="tear_force_warp_value1" name="tear_force_warp_value1" value="<?php echo isset($row_for_gray_variable['tear_force_warp_value1']) ? $row_for_gray_variable['tear_force_warp_value1'] : "" ?>" class="tear_force_warp_value1 form-control col-md-7 col-xs-12">
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              --
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="tear_force_warp_value2" name="tear_force_warp_value2" value="<?php echo isset($row_for_gray_variable['tear_force_warp_value2']) ? $row_for_gray_variable['tear_force_warp_value2'] : "" ?>" class="tear_force_warp_value2 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="tear_force_warp_cond2" name="tear_force_warp_cond2" class="tear_force_warp_cond2 form-control col-md-12 col-xs-12">
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($row_for_gray_variable['tear_force_warp_cond2'] == '1') ? 'selected' : '' ?> >)</option>
                <option value="2" <?php echo ($row_for_gray_variable['tear_force_warp_cond2'] == '2') ? 'selected' : '' ?> >]</option>
              </select>
            </div>
          </div>

          <br>

          <div class="form-group">

            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tear_force_weft"> Tear Force Weft
            </label>

            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              <select id="tear_force_weft_cond" name="tear_force_weft_cond" onchange="tear_force_weft_condition();" class="tear_force_weft_cond select2 pp_number form-control col-md-12 col-xs-12">
                <option value="1" selected="selected" > &ge; </option>
                <option value="2" > &le; </option>
              </select> 
            </div> 

            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              <input type="text" id="tear_force_weft_value" name="tear_force_weft_value" oninput="tear_force_weft_condition();" class="tear_force_weft_value form-control col-md-7 col-xs-12">
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="hidden" class="form-control col-md-7 col-xs-12">
            </div>

            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              <select id="tear_force_weft_unit" name="tear_force_weft_unit" class="tear_force_weft_unit form-control col-md-12 col-xs-12">
                <option value="N" selected <?php echo ($row_for_gray_variable['tear_force_weft_unit'] == 'N') ? 'selected' : '' ?> >N</option>
                <option value="kg" <?php echo ($row_for_gray_variable['tear_force_weft_unit'] == 'kg') ? 'selected' : '' ?> >kg</option>
                <option value="lbf" <?php echo ($row_for_gray_variable['tear_force_weft_unit'] == 'lbf') ? 'selected' : '' ?> >lbf</option>
                <option value="gm" <?php echo ($row_for_gray_variable['tear_force_weft_unit'] == 'gm') ? 'selected' : '' ?> >gm</option>
                <option value="daN" <?php echo ($row_for_gray_variable['tear_force_weft_unit'] == 'daN') ? 'selected' : '' ?> >daN</option>
                <option value="oz" <?php echo ($row_for_gray_variable['tear_force_weft_unit'] == 'oz') ? 'selected' : '' ?> >oz</option>
              </select>
            </div>

            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="tear_force_weft_cond1" name="tear_force_weft_cond1" onchange="tear_force_weft_condition()" class="tear_force_weft_cond1 form-control col-md-12 col-xs-12">
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($row_for_gray_variable['tear_force_weft_cond1'] == '1') ? 'selected' : '' ?> >(</option>
                <option value="2" <?php echo ($row_for_gray_variable['tear_force_weft_cond1'] == '2') ? 'selected' : '' ?> >[</option>
              </select>
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="tear_force_weft_value1" name="tear_force_weft_value1" value="<?php echo isset($row_for_gray_variable['tear_force_weft_value1']) ? $row_for_gray_variable['tear_force_weft_value1'] : "" ?>" class="tear_force_weft_value1 form-control col-md-7 col-xs-12">
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              --
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="tear_force_weft_value2" name="tear_force_weft_value2" value="<?php echo isset($row_for_gray_variable['tear_force_weft_value2']) ? $row_for_gray_variable['tear_force_weft_value2'] : "" ?>" class="tear_force_weft_value2 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="tear_force_weft_cond2" name="tear_force_weft_cond2" class="tear_force_weft_cond2 form-control col-md-12 col-xs-12">
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($row_for_gray_variable['tear_force_weft_cond2'] == '1') ? 'selected' : '' ?> >)</option>
                <option value="2" <?php echo ($row_for_gray_variable['tear_force_weft_cond2'] == '2') ? 'selected' : '' ?> >]</option>
              </select>
            </div>
          </div>

          <br>

          <div class="form-group">

            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="seam_strength_warp"> Seam Strength Warp
            </label>

            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              <select id="seam_strength_warp_cond" name="seam_strength_warp_cond" onchange="seam_strength_warp_condition();" class="seam_strength_warp_cond select2 pp_number form-control col-md-12 col-xs-12">
                <option value="1" selected="selected" > &ge; </option>
                <option value="2" > &le; </option>
              </select> 
            </div> 

            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              <input type="text" id="seam_strength_warp_value" name="seam_strength_warp_value" oninput="seam_strength_warp_condition();" class="seam_strength_warp_value form-control col-md-7 col-xs-12">
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="hidden" class="form-control col-md-7 col-xs-12">
            </div>

            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              <select id="seam_strength_warp_unit" name="seam_strength_warp_unit" class="seam_strength_warp_unit form-control col-md-12 col-xs-12">
                <option value="N" selected <?php echo ($row_for_gray_variable['seam_strength_warp_unit'] == 'N') ? 'selected' : '' ?> >N</option>
                <option value="kg" <?php echo ($row_for_gray_variable['seam_strength_warp_unit'] == 'kg') ? 'selected' : '' ?> >kg</option>
                <option value="lbf" <?php echo ($row_for_gray_variable['seam_strength_warp_unit'] == 'lbf') ? 'selected' : '' ?> >lbf</option>
                <option value="gm" <?php echo ($row_for_gray_variable['seam_strength_warp_unit'] == 'gm') ? 'selected' : '' ?> >gm</option>
                <option value="daN" <?php echo ($row_for_gray_variable['seam_strength_warp_unit'] == 'daN') ? 'selected' : '' ?> >daN</option>
                <option value="oz" <?php echo ($row_for_gray_variable['seam_strength_warp_unit'] == 'oz') ? 'selected' : '' ?> >oz</option>
              </select>
            </div>

            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="seam_strength_warp_cond1" name="seam_strength_warp_cond1" onchange="seam_strength_warp_condition()" class="seam_strength_warp_cond1 form-control col-md-12 col-xs-12">
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($row_for_gray_variable['seam_strength_warp_cond1'] == '1') ? 'selected' : '' ?> >(</option>
                <option value="2" <?php echo ($row_for_gray_variable['seam_strength_warp_cond1'] == '2') ? 'selected' : '' ?> >[</option>
              </select>
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="seam_strength_warp_value1" name="seam_strength_warp_value1" value="<?php echo isset($row_for_gray_variable['seam_strength_warp_value1']) ? $row_for_gray_variable['seam_strength_warp_value1'] : "" ?>" class="seam_strength_warp_value1 form-control col-md-7 col-xs-12">
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              --
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="seam_strength_warp_value2" name="seam_strength_warp_value2" value="<?php echo isset($row_for_gray_variable['seam_strength_warp_value2']) ? $row_for_gray_variable['seam_strength_warp_value2'] : "" ?>" class="seam_strength_warp_value2 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="seam_strength_warp_cond2" name="seam_strength_warp_cond2" class="seam_strength_warp_cond2 form-control col-md-12 col-xs-12">
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($row_for_gray_variable['seam_strength_warp_cond2'] == '1') ? 'selected' : '' ?> >)</option>
                <option value="2" <?php echo ($row_for_gray_variable['seam_strength_warp_cond2'] == '2') ? 'selected' : '' ?> >]</option>
              </select>
            </div>
          </div>

          <br>

          <div class="form-group">

            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="seam_strength_weft"> Seam Strength Weft
            </label>

            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              <select id="seam_strength_weft_cond" name="seam_strength_weft_cond" onchange="seam_strength_weft_condition();" class="seam_strength_weft_cond select2 pp_number form-control col-md-12 col-xs-12">
                <option value="1" selected="selected" > &ge; </option>
                <option value="2" > &le; </option>
              </select> 
            </div> 

            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              <input type="text" id="seam_strength_weft_value" name="seam_strength_weft_value" oninput="seam_strength_weft_condition();" class="seam_strength_weft_value form-control col-md-7 col-xs-12">
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="hidden" class="form-control col-md-7 col-xs-12">
            </div>

            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              <select id="seam_strength_weft_unit" name="seam_strength_weft_unit" class="seam_strength_weft_unit form-control col-md-12 col-xs-12">
                <option value="N" selected <?php echo ($row_for_gray_variable['seam_strength_weft_unit'] == 'N') ? 'selected' : '' ?> >N</option>
                <option value="kg" <?php echo ($row_for_gray_variable['seam_strength_weft_unit'] == 'kg') ? 'selected' : '' ?> >kg</option>
                <option value="lbf" <?php echo ($row_for_gray_variable['seam_strength_weft_unit'] == 'lbf') ? 'selected' : '' ?> >lbf</option>
                <option value="gm" <?php echo ($row_for_gray_variable['seam_strength_weft_unit'] == 'gm') ? 'selected' : '' ?> >gm</option>
                <option value="daN" <?php echo ($row_for_gray_variable['seam_strength_weft_unit'] == 'daN') ? 'selected' : '' ?> >daN</option>
                <option value="oz" <?php echo ($row_for_gray_variable['seam_strength_weft_unit'] == 'oz') ? 'selected' : '' ?> >oz</option>
              </select>
            </div>

            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="seam_strength_weft_cond1" name="seam_strength_weft_cond1" onchange="seam_strength_weft_condition()" class="seam_strength_weft_cond1 form-control col-md-12 col-xs-12">
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($row_for_gray_variable['seam_strength_weft_cond1'] == '1') ? 'selected' : '' ?> >(</option>
                <option value="2" <?php echo ($row_for_gray_variable['seam_strength_weft_cond1'] == '2') ? 'selected' : '' ?> >[</option>
              </select>
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="seam_strength_weft_value1" name="seam_strength_weft_value1" value="<?php echo isset($row_for_gray_variable['seam_strength_weft_value1']) ? $row_for_gray_variable['seam_strength_weft_value1'] : "" ?>" class="seam_strength_weft_value1 form-control col-md-7 col-xs-12">
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              --
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="seam_strength_weft_value2" name="seam_strength_weft_value2" value="<?php echo isset($row_for_gray_variable['seam_strength_weft_value2']) ? $row_for_gray_variable['seam_strength_weft_value2'] : "" ?>" class="seam_strength_weft_value2 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="seam_strength_weft_cond2" name="seam_strength_weft_cond2" class="seam_strength_weft_cond2 form-control col-md-12 col-xs-12">
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($row_for_gray_variable['seam_strength_weft_cond2'] == '1') ? 'selected' : '' ?> >)</option>
                <option value="2" <?php echo ($row_for_gray_variable['seam_strength_weft_cond2'] == '2') ? 'selected' : '' ?> >]</option>
              </select>
            </div>
          </div>


      <br>

      <input type="hidden" id="update" name="update" value="yes" >

      <br>



            <!-- <input type="hidden" id="update" name="update" value="2" > -->

      <?php $seam_slipage_resistance = $row_for_gray_variable["seam_slipage_resistance"]; ?>

      <input type="hidden" id="seam_slipage_resistance" name="seam_slipage_resistance" value="<?php echo $seam_slipage_resistance; ?>" >

      <div class="form-check form-check-inline text-center">
        <input class="form-check-input" type="radio" name="seam_slipage_resistance_selection" id="seam_slipage_resistance_selection_method_1"  value="seam_slipage_resistance_selection_method_1" <?php if($seam_slipage_resistance != '1') echo "disabled"; else echo "checked"; ?> >
        <label class="form-check-label" for="seam_slipage_resistance_selection_method_1">Seam Slipage Resistance ISO 13936-1</label>
      
        <input class="form-check-input" type="radio" name="seam_slipage_resistance_selection" id="seam_slipage_resistance_selection_method_2" checked value="seam_slipage_resistance_selection_method_2" <?php if($seam_slipage_resistance == '1') echo "disabled"; else echo "checked"; ?> >
        <label class="form-check-label" for="seam_slipage_resistance_selection_method_2">Seam Slipage Resistance ISO 13936-2</label>
      </div>
      
      <br>

      <?php 

      if ( $seam_slipage_resistance == "1" )
      {
          ?>
            <div class="form-group">
                <input type="hidden" id="seam_slipage_resistance_for_number" name="seam_slipage_resistance_for_number" value="1" >
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="seam_resistance_method1_warp"> Seam Slipage Resistance Warp(N)<span class="required">*</span>
              </label>

              <div class="col-md-1 col-sm-1 col-xs-2" style="text-align: center;">
                <select id="seam_resistance_method1_warp_cond" name="seam_resistance_method1_warp_cond" onchange="seam_resistance_method1_warp_condition();" class="seam_resistance_method1_warp_cond select2 pp_number form-control col-md-12 col-xs-12">
                  <option value="1" selected="selected" > &ge; </option>
                  <option value="2" > &le; </option>
                </select>
              </div>

              <div class="col-md-1 col-sm-1 col-xs-2" style="text-align: center;">
                <input type="text" id="seam_resistance_method1_warp_value" name="seam_resistance_method1_warp_value" oninput="seam_resistance_method1_warp_condition();" class="seam_resistance_method1_warp_value form-control col-md-7 col-xs-12">
              </div>
              <div class="col-md-1 col-sm-1 col-xs-2">
                <input type="hidden" class="form-control col-md-7 col-xs-12">
              </div>

              <div class="col-md-1 col-sm-1 col-xs-2" style="text-align: center;">
                <select id="seam_resistance_method1_warp_unit" name="seam_resistance_method1_warp_unit" class="seam_resistance_method1_warp_unit form-control col-md-12 col-xs-12">
                    <option value="N" selected <?php echo ($row_for_gray_variable["seam_resistance_method1_warp_unit"] == "N") ? "selected" : "" ?> >N</option>
                    <option value="kg" <?php echo ($row_for_gray_variable["seam_resistance_method1_warp_unit"] == "kg") ? "selected" : "" ?> >kg</option>
                    <option value="ibf" <?php echo ($row_for_gray_variable["seam_resistance_method1_warp_unit"] == "ibf") ? "selected" : "" ?> >ibf</option>
                    <option value="gm" <?php echo ($row_for_gray_variable["seam_resistance_method1_warp_unit"] == "gm") ? "selected" : "" ?> >gm</option>
                    <option value="daN" <?php echo ($row_for_gray_variable["seam_resistance_method1_warp_unit"] == "daN") ? "selected" : "" ?> >daN</option>
                    <option value="oz" <?php echo ($row_for_gray_variable["seam_resistance_method1_warp_unit"] == "oz") ? "selected" : "" ?> >oz</option>
                </select>
              </div>

              <div class="col-md-1 col-sm-1 col-xs-2">
                <select id="seam_resistance_method1_warp_cond1" name="seam_resistance_method1_warp_cond1" onchange="seam_resistance_method1_warp_condition()" class="seam_resistance_method1_warp_cond1 form-control col-md-12 col-xs-12">
                  <option value="" selected="selected">Select Condition</option>
                  <option value="1" <?php echo ($row_for_gray_variable["seam_resistance_method1_warp_cond1"] == "1") ? "selected" : "" ?> >(</option>
                  <option value="2" <?php echo ($row_for_gray_variable["seam_resistance_method1_warp_cond1"] == "2") ? "selected" : "" ?> >[</option>
                </select>
              </div>
              <div class="col-md-1 col-sm-1 col-xs-2">
                <input type="text" id="seam_resistance_method1_warp_value1" name="seam_resistance_method1_warp_value1" value="<?php echo isset($row_for_gray_variable["seam_resistance_method1_warp_value1"]) ? $row_for_gray_variable["seam_resistance_method1_warp_value1"] : "" ?>" class="seam_resistance_method1_warp_value1 form-control col-md-7 col-xs-12">
              </div>
              <div class="col-md-1 col-sm-1 col-xs-2" style="text-align: center;">
                --
              </div>
              <div class="col-md-1 col-sm-1 col-xs-2">
                <input type="text" id="seam_resistance_method1_warp_value2" name="seam_resistance_method1_warp_value2" value="<?php echo isset($row_for_gray_variable["seam_resistance_method1_warp_value2"]) ? $row_for_gray_variable["seam_resistance_method1_warp_value2"] : "" ?>" class="seam_resistance_method1_warp_value2 form-control col-md-7 col-xs-12">
              </div>
              <div class="col-md-1 col-sm-1 col-xs-2">
                <select id="seam_resistance_method1_warp_cond2" name="seam_resistance_method1_warp_cond2" class="seam_resistance_method1_warp_cond2 form-control col-md-12 col-xs-12">
                  <option value="" selected="selected">Select Condition</option>
                  <option value="1" <?php echo ($row_for_gray_variable["seam_resistance_method1_warp_cond2"] == "1") ? "selected" : "" ?> >)</option>
                  <option value="2" <?php echo ($row_for_gray_variable["seam_resistance_method1_warp_cond2"] == "2") ? "selected" : "" ?> >]</option>
                </select>
              <div>
            </div>
          </div>

            <div class="form-group">

              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="seam_resistance_method1_weft"> Seam Slipage Resistance weft<span class="required">*</span>
              </label>

              <div class="col-md-1 col-sm-1 col-xs-2" style="text-align: center;">
                <select id="seam_resistance_method1_weft_cond" name="seam_resistance_method1_weft_cond" onchange="seam_resistance_method1_weft_condition();" class="seam_resistance_method1_weft_cond select2 pp_number form-control col-md-12 col-xs-12">
                  <option value="1" selected="selected" > &ge; </option>
                  <option value="2" > &le; </option>
                </select>
              </div>

              <div class="col-md-1 col-sm-1 col-xs-2" style="text-align: center;">
                <input type="text" id="seam_resistance_method1_weft_value" name="seam_resistance_method1_weft_value" oninput="seam_resistance_method1_weft_condition();" class="seam_resistance_method1_weft_value form-control col-md-7 col-xs-12">
              </div>
              <div class="col-md-1 col-sm-1 col-xs-2">
                <input type="hidden" class="form-control col-md-7 col-xs-12">
              </div>

              <div class="col-md-1 col-sm-1 col-xs-2" style="text-align: center;">
                <select id="seam_resistance_method1_weft_unit" name="seam_resistance_method1_weft_unit" class="seam_resistance_method1_weft_unit form-control col-md-12 col-xs-12">
                    <option value="N" selected <?php echo ($row_for_gray_variable["seam_resistance_method1_weft_unit"] == "N") ? "selected" : "" ?> >N</option>
                    <option value="kg" <?php echo ($row_for_gray_variable["seam_resistance_method1_weft_unit"] == "kg") ? "selected" : "" ?> >kg</option>
                    <option value="ibf" <?php echo ($row_for_gray_variable["seam_resistance_method1_weft_unit"] == "ibf") ? "selected" : "" ?> >ibf</option>
                    <option value="gm" <?php echo ($row_for_gray_variable["seam_resistance_method1_weft_unit"] == "gm") ? "selected" : "" ?> >gm</option>
                    <option value="daN" <?php echo ($row_for_gray_variable["seam_resistance_method1_weft_unit"] == "daN") ? "selected" : "" ?> >daN</option>
                    <option value="oz" <?php echo ($row_for_gray_variable["seam_resistance_method1_weft_unit"] == "oz") ? "selected" : "" ?> >oz</option>
                </select>
              </div>

              <div class="col-md-1 col-sm-1 col-xs-2">
                <select id="seam_resistance_method1_weft_cond1" name="seam_resistance_method1_weft_cond1" onchange="seam_resistance_method1_weft_condition()" class="seam_resistance_method1_weft_cond1 form-control col-md-12 col-xs-12">
                  <option value="" selected="selected">Select Condition</option>
                  <option value="1" <?php echo ($row_for_gray_variable["seam_resistance_method1_weft_cond1"] == "1") ? "selected" : "" ?> >(</option>
                  <option value="2" <?php echo ($row_for_gray_variable["seam_resistance_method1_weft_cond1"] == "2") ? "selected" : "" ?> >[</option>
                </select>
              </div>
              <div class="col-md-1 col-sm-1 col-xs-2">
                <input type="text" id="seam_resistance_method1_weft_value1" name="seam_resistance_method1_weft_value1" value="<?php echo isset($row_for_gray_variable["seam_resistance_method1_weft_value1"]) ? $row_for_gray_variable["seam_resistance_method1_weft_value1"] : "" ?>" class="seam_resistance_method1_weft_value1 form-control col-md-7 col-xs-12">
              </div>
              <div class="col-md-1 col-sm-1 col-xs-2" style="text-align: center;">
                --
              </div>
              <div class="col-md-1 col-sm-1 col-xs-2">
                <input type="text" id="seam_resistance_method1_weft_value2" name="seam_resistance_method1_weft_value2" value="<?php echo isset($row_for_gray_variable["seam_resistance_method1_weft_value2"]) ? $row_for_gray_variable["seam_resistance_method1_weft_value2"] : "" ?>" class="seam_resistance_method1_weft_value2 form-control col-md-7 col-xs-12">
              </div>
              <div class="col-md-1 col-sm-1 col-xs-2">
                <select id="seam_resistance_method1_weft_cond2" name="seam_resistance_method1_weft_cond2" class="seam_resistance_method1_weft_cond2 form-control col-md-12 col-xs-12">'
                  <option value="" selected="selected">Select Condition</option>
                  <option value="1" <?php echo ($row_for_gray_variable["seam_resistance_method1_weft_cond2"] == "1") ? "selected" : "" ?> >)</option>
                 <option value="2" <?php echo ($row_for_gray_variable["seam_resistance_method1_weft_cond2"] == "2") ? "selected" : "" ?> >]</option>
                </select>
              </div>
            </div>
          <?php
      }

        else
        {
          ?>
              <div class="form-group">
                  <input type="hidden" id="seam_slipage_resistance_for_number" name="seam_slipage_resistance_for_number" value="2" >
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="seam_resistance_method2_warp"> Seam Slipage Resistance Warp (mm)<span class="required">*</span>
                  </label>

                  <div class="col-md-1 col-sm-1 col-xs-2" style="text-align: center;">
                    <select id="seam_resistance_method2_warp_cond" name="seam_resistance_method2_warp_cond" onchange="seam_resistance_method2_warp_condition();" class="seam_resistance_method2_warp_cond select2 pp_number form-control col-md-12 col-xs-12">
                      <option value="1" selected="selected" > &ge; </option>
                      <option value="2" > &le; </option>
                    </select>
                  </div>

                  <div class="col-md-1 col-sm-1 col-xs-2" style="text-align: center;">
                    <input type="text" id="seam_resistance_method2_warp_value" name="seam_resistance_method2_warp_value" oninput="seam_resistance_method2_warp_condition();" class="seam_resistance_method2_warp_value form-control col-md-7 col-xs-12">
                  </div>
                  <div class="col-md-1 col-sm-1 col-xs-2">
                    <input type="hidden" class="form-control col-md-7 col-xs-12">
                  </div>

                  <div class="col-md-1 col-sm-1 col-xs-2" style="text-align: center;">
                    <select id="seam_resistance_method2_warp_unit" name="seam_resistance_method2_warp_unit" class="seam_resistance_method2_warp_unit form-control col-md-12 col-xs-12">
                        <option value="N" selected <?php echo ($row_for_gray_variable["seam_resistance_method2_warp_unit"] == "N") ? "selected" : "" ?> >N</option>
                        <option value="kg" <?php echo ($row_for_gray_variable["seam_resistance_method2_warp_unit"] == "kg") ? "selected" : "" ?> >kg</option>
                        <option value="ibf" <?php echo ($row_for_gray_variable["seam_resistance_method2_warp_unit"] == "ibf") ? "selected" : "" ?> >ibf</option>
                        <option value="gm" <?php echo ($row_for_gray_variable["seam_resistance_method2_warp_unit"] == "gm") ? "selected" : "" ?> >gm</option>
                        <option value="daN" <?php echo ($row_for_gray_variable["seam_resistance_method2_warp_unit"] == "daN") ? "selected" : "" ?> >daN</option>
                        <option value="oz" <?php echo ($row_for_gray_variable["seam_resistance_method2_warp_unit"] == "oz") ? "selected" : "" ?> >oz</option>
                    </select>
                  </div>

                  <div class="col-md-1 col-sm-1 col-xs-2">
                    <select id="seam_resistance_method2_warp_cond1" name="seam_resistance_method2_warp_cond1" onchange="seam_resistance_method2_warp_condition()" class="seam_resistance_method2_warp_cond1 form-control col-md-12 col-xs-12">
                      <option value="" selected="selected">Select Condition</option>
                      <option value="1" <?php echo ($row_for_gray_variable["seam_resistance_method2_warp_cond1"] == "1") ? "selected" : "" ?> >(</option>
                      <option value="2" <?php echo ($row_for_gray_variable["seam_resistance_method2_warp_cond1"] == "2") ? "selected" : "" ?> >[</option>
                    </select>
                  </div>
                  <div class="col-md-1 col-sm-1 col-xs-2">
                    <input type="text" id="seam_resistance_method2_warp_value1" name="seam_resistance_method2_warp_value1" value="<?php echo isset($row_for_gray_variable["seam_resistance_method2_warp_value1"]) ? $row_for_gray_variable["seam_resistance_method2_warp_value1"] : "" ?>" class="seam_resistance_method2_warp_value1 form-control col-md-7 col-xs-12">
                  </div>
                  <div class="col-md-1 col-sm-1 col-xs-2" style="text-align: center;">
                    --
                  </div>
                  <div class="col-md-1 col-sm-1 col-xs-2">
                    <input type="text" id="seam_resistance_method2_warp_value2" name="seam_resistance_method2_warp_value2" value="<?php echo isset($row_for_gray_variable["seam_resistance_method2_warp_value2"]) ? $row_for_gray_variable["seam_resistance_method2_warp_value2"] : "" ?>" class="seam_resistance_method2_warp_value2 form-control col-md-7 col-xs-12">
                  </div>
                  <div class="col-md-1 col-sm-1 col-xs-2">
                    <select id="seam_resistance_method2_warp_cond2" name="seam_resistance_method2_warp_cond2" class="seam_resistance_method2_warp_cond2 form-control col-md-12 col-xs-12">
                      <option value="" selected="selected">Select Condition</option>
                      <option value="1" <?php echo ($row_for_gray_variable["seam_resistance_method2_warp_cond2"] == "1") ? "selected" : "" ?> >)</option>
                      <option value="2" <?php echo ($row_for_gray_variable["seam_resistance_method2_warp_cond2"] == "2") ? "selected" : "" ?> >]</option>
                    </select>
                  </div>
                </div>

                <div class="form-group">

                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="seam_resistance_method2_weft"> Seam Slipage Resistance weft<span class="required">*</span>
                  </label>

                  <div class="col-md-1 col-sm-1 col-xs-2" style="text-align: center;">
                    <select id="seam_resistance_method2_weft_cond" name="seam_resistance_method2_weft_cond" onchange="seam_resistance_method2_weft_condition();" class="seam_resistance_method2_weft_cond select2 pp_number form-control col-md-12 col-xs-12">
                      <option value="1" selected="selected" > &ge; </option>
                      <option value="2" > &le; </option>
                    </select>
                  </div>

                  <div class="col-md-1 col-sm-1 col-xs-2" style="text-align: center;">
                    <input type="text" id="seam_resistance_method2_weft_value" name="seam_resistance_method2_weft_value" oninput="seam_resistance_method2_weft_condition();" class="seam_resistance_method2_weft_value form-control col-md-7 col-xs-12">
                  </div>
                  <div class="col-md-1 col-sm-1 col-xs-2">
                    <input type="hidden" class="form-control col-md-7 col-xs-12">
                  </div>

                  <div class="col-md-1 col-sm-1 col-xs-2" style="text-align: center;">
                    <select id="seam_resistance_method2_weft_unit" name="seam_resistance_method2_weft_unit" class="seam_resistance_method2_weft_unit form-control col-md-12 col-xs-12">
                        <option value="N" selected <?php echo ($row_for_gray_variable["seam_resistance_method2_weft_unit"] == "N") ? "selected" : "" ?> >N</option>
                        <option value="kg" <?php echo ($row_for_gray_variable["seam_resistance_method2_weft_unit"] == "kg") ? "selected" : "" ?> >kg</option>
                        <option value="ibf" <?php echo ($row_for_gray_variable["seam_resistance_method2_weft_unit"] == "ibf") ? "selected" : "" ?> >ibf</option>
                        <option value="gm" <?php echo ($row_for_gray_variable["seam_resistance_method2_weft_unit"] == "gm") ? "selected" : "" ?> >gm</option>
                        <option value="daN" <?php echo ($row_for_gray_variable["seam_resistance_method2_weft_unit"] == "daN") ? "selected" : "" ?> >daN</option>
                        <option value="oz" <?php echo ($row_for_gray_variable["seam_resistance_method2_weft_unit"] == "oz") ? "selected" : "" ?> >oz</option>
                    </select>
                  </div>

                  <div class="col-md-1 col-sm-1 col-xs-2">
                    <select id="seam_resistance_method2_weft_cond1" name="seam_resistance_method2_weft_cond1" onchange="seam_resistance_method2_weft_condition()" class="seam_resistance_method2_weft_cond1 form-control col-md-12 col-xs-12">
                      <option value="" selected="selected">Select Condition</option>
                      <option value="1" <?php echo ($row_for_gray_variable["seam_resistance_method2_weft_cond1"] == "1") ? "selected" : "" ?> >(</option>
                      <option value="2" <?php echo ($row_for_gray_variable["seam_resistance_method2_weft_cond1"] == "2") ? "selected" : "" ?> >[</option>
                    </select>
                  </div>
                  <div class="col-md-1 col-sm-1 col-xs-2">
                    <input type="text" id="seam_resistance_method2_weft_value1" name="seam_resistance_method2_weft_value1" value="<?php echo isset($row_for_gray_variable["seam_resistance_method2_weft_value1"]) ? $row_for_gray_variable["seam_resistance_method2_weft_value1"] : "" ?>" class="seam_resistance_method2_weft_value1 form-control col-md-7 col-xs-12">
                  </div>
                  <div class="col-md-1 col-sm-1 col-xs-2" style="text-align: center;">
                    --
                  </div>
                  <div class="col-md-1 col-sm-1 col-xs-2">
                    <input type="text" id="seam_resistance_method2_weft_value2" name="seam_resistance_method2_weft_value2" value="<?php echo isset($row_for_gray_variable["seam_resistance_method2_weft_value2"]) ? $row_for_gray_variable["seam_resistance_method2_weft_value2"] : "" ?>" class="seam_resistance_method2_weft_value2 form-control col-md-7 col-xs-12">
                  </div>
                  <div class="col-md-1 col-sm-1 col-xs-2">
                    <select id="seam_resistance_method2_weft_cond2" name="seam_resistance_method2_weft_cond2" class="seam_resistance_method2_weft_cond2 form-control col-md-12 col-xs-12">
                      <option value="" selected="selected">Select Condition</option>
                      <option value="1" <?php echo ($row_for_gray_variable["seam_resistance_method2_weft_cond2"] == "1") ? "selected" : "" ?> >)</option>
                     <option value="2" <?php echo ($row_for_gray_variable["seam_resistance_method2_weft_cond2"] == "2") ? "selected" : "" ?> >]</option>
                    </select>
                  </div>
                </div>
          <?php
          }
        ?>

      <br> 

      <div class="ln_solid"></div>
      <div class="form-group">n
        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
          <input type="hidden" id="pp_no_id" name="pp_no_id" value="<?php echo $pp_no_id; ?>">
          <input type="hidden" id="pp_details_id" name="pp_details_id" value="<?php echo $pp_details_id; ?>">
          <input type="hidden" id="sanforizing_standard_id" name="sanforizing_standard_id" value="<?php echo $row_for_gray_variable['sanforizing_standard_id']; ?>">
          <button type="button" name="submit" id="submit" onclick="update_edit_sanforizing_standard_data('<?php echo $pp_details_id; ?>');" class="btn btn-success" >Update</button>
          <button type="button" name="submit" id="submit" onclick="cancel_edit_standard_data();" class="btn btn-success" >Cancel</button>
        </div>
      </div>

    </form>
  </div>
</div>

<?php  ?>