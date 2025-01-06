<?php
?>
<!-- main content again -->
<!-- <button type="button" name="previous_data" id="previous_data" value="<?php echo $pp_version; ?>" data-toggle="modal" data-target=".bs-example-modal-lg"   class="btn btn-success text-center" onclick="pass_version_id(this.value);">Copy from previous PP Version</button>
 -->
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12" id="retrieve_edit_data" style="padding-bottom: 20px;">
    
    <!-- add greige standard of single pp number -->
    <div class="x_panel">
      <div class="x_title">
        <h2>Standard for Finishing Process Form</h2>
        <ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
          </li>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <br />

        <form id="finishing_variable_form" name="finishing_variable_form" data-parsley-validate class="form-horizontal form-label-left">

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
                <option value="1" <?php echo ($_POST['cf_rubbing_dry_cond1'] == '1') ? 'selected' : '' ?> >(</option>
                <option value="2" <?php echo ($_POST['cf_rubbing_dry_cond1'] == '2') ? 'selected' : '' ?> >[</option>
              </select>
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="cf_rubbing_dry_value1" name="cf_rubbing_dry_value1" value="<?php echo isset($_POST['cf_rubbing_dry_value1']) ? $_POST['cf_rubbing_dry_value1'] : "" ?>" class="cf_rubbing_dry_value1 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              --
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="cf_rubbing_dry_value2" name="cf_rubbing_dry_value2" value="<?php echo isset($_POST['cf_rubbing_dry_value2']) ? $_POST['cf_rubbing_dry_value2'] : "" ?>" class="cf_rubbing_dry_value2 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="cf_rubbing_dry_cond2" name="cf_rubbing_dry_cond2" class="cf_rubbing_dry_cond2 form-control col-md-12 col-xs-12">
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($_POST['cf_rubbing_dry_cond2'] == '1') ? 'selected' : '' ?> >)</option>
                <option value="2" <?php echo ($_POST['cf_rubbing_dry_cond2'] == '2') ? 'selected' : '' ?> >]</option>
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
                <option value="1" <?php echo ($_POST['cf_rubbing_wet_cond1'] == '1') ? 'selected' : '' ?> >(</option>
                <option value="2" <?php echo ($_POST['cf_rubbing_wet_cond1'] == '2') ? 'selected' : '' ?> >[</option>
              </select>
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="cf_rubbing_wet_value1" name="cf_rubbing_wet_value1" value="<?php echo isset($_POST['cf_rubbing_wet_value1']) ? $_POST['cf_rubbing_wet_value1'] : "" ?>" class="cf_rubbing_wet_value1 form-control col-md-7 col-xs-12">
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              --
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="cf_rubbing_wet_value2" name="cf_rubbing_wet_value2" value="<?php echo isset($_POST['cf_rubbing_wet_value2']) ? $_POST['cf_rubbing_wet_value2'] : "" ?>" class="cf_rubbing_wet_value2 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="cf_rubbing_wet_cond2" name="cf_rubbing_wet_cond2" class="cf_rubbing_wet_cond2 form-control col-md-12 col-xs-12">
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($_POST['cf_rubbing_wet_cond2'] == '1') ? 'selected' : '' ?> >)</option>
                <option value="2" <?php echo ($_POST['cf_rubbing_wet_cond2'] == '2') ? 'selected' : '' ?> >]</option>
              </select>
            </div>
          </div>

          <br>


          <div class="form-group">

            <label class="control-label col-md-6 col-sm-6 col-xs-12" for="wash_dry_warp_before_iron">Dimensional Change to Washing & Drying Warp (Befor Iron) <span class="required">*</span>
            </label>

            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              %
            </div>

            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="wash_dry_warp_before_iron_cond1" name="wash_dry_warp_before_iron_cond1" onchange="wash_dry_warp_before_iron_condition()" class="cf_rubbing_wet_cond1 form-control col-md-12 col-xs-12">
                <option value="2" selected="selected" <?php echo ($_POST['wash_dry_warp_before_iron_cond1'] == '2') ? 'selected' : '' ?> >[</option>
                <option value="1" <?php echo ($_POST['wash_dry_warp_before_iron_cond1'] == '1') ? 'selected' : '' ?> >(</option>
              </select>
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="wash_dry_warp_before_iron_value1" name="wash_dry_warp_before_iron_value1" value="<?php echo isset($_POST['wash_dry_warp_before_iron_value1']) ? $_POST['wash_dry_warp_before_iron_value1'] : "" ?>" class="wash_dry_warp_before_iron_value1 form-control col-md-7 col-xs-12">
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              --
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="wash_dry_warp_before_iron_value2" name="wash_dry_warp_before_iron_value2" value="<?php echo isset($_POST['wash_dry_warp_before_iron_value2']) ? $_POST['wash_dry_warp_before_iron_value2'] : "" ?>" class="wash_dry_warp_before_iron_value2 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="wash_dry_warp_before_iron_cond2" name="wash_dry_warp_before_iron_cond2" class="wash_dry_warp_before_iron_cond2 form-control col-md-12 col-xs-12">
                <option value="2" selected="selected" <?php echo ($_POST['wash_dry_warp_before_iron_cond2'] == '2') ? 'selected' : '' ?> >]</option>
                <option value="1" <?php echo ($_POST['wash_dry_warp_before_iron_cond2'] == '1') ? 'selected' : '' ?> >)</option>
              </select>
            </div>
          </div>

          <br>


          <div class="form-group">

            <label class="control-label col-md-6 col-sm-6 col-xs-12" for="wash_dry_weft_before_iron">Dimensional Change to Washing & Drying Weft (Befor Iron) <span class="required">*</span>
            </label>

            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              %
            </div>

            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="wash_dry_weft_before_iron_cond1" name="wash_dry_weft_before_iron_cond1" onchange="wash_dry_weft_before_iron_condition()" class="wash_dry_weft_before_iron_cond1 form-control col-md-12 col-xs-12">
                <option value="2" selected="selected" <?php echo ($_POST['wash_dry_warp_before_iron_cond1'] == '2') ? 'selected' : '' ?> >[</option>
                <option value="1" <?php echo ($_POST['wash_dry_warp_before_iron_cond1'] == '1') ? 'selected' : '' ?> >(</option>
              </select>
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="wash_dry_weft_before_iron_value1" name="wash_dry_weft_before_iron_value1" value="<?php echo isset($_POST['wash_dry_weft_before_iron_value1']) ? $_POST['wash_dry_weft_before_iron_value1'] : "" ?>" class="wash_dry_weft_before_iron_value1 form-control col-md-7 col-xs-12">
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              --
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="wash_dry_weft_before_iron_value2" name="wash_dry_weft_before_iron_value2" value="<?php echo isset($_POST['wash_dry_weft_before_iron_value2']) ? $_POST['wash_dry_weft_before_iron_value2'] : "" ?>" class="wash_dry_weft_before_iron_value2 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="wash_dry_weft_before_iron_cond2" name="wash_dry_weft_before_iron_cond2" class="wash_dry_weft_before_iron_cond2 form-control col-md-12 col-xs-12">
                <option value="2" selected="selected" <?php echo ($_POST['wash_dry_weft_before_iron_cond2'] == '2') ? 'selected' : '' ?> >]</option>
                <option value="1" <?php echo ($_POST['wash_dry_weft_before_iron_cond2'] == '1') ? 'selected' : '' ?> >)</option>
              </select>
            </div>
          </div>

          <br>


          <div class="form-group">

            <label class="control-label col-md-6 col-sm-6 col-xs-12" for="wash_dry_warp_after_iron">Dimensional Change to Washing & Drying Warp (After Iron) <span class="required">*</span>
            </label>

            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              %
            </div>

            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="wash_dry_warp_after_iron_cond1" name="wash_dry_warp_after_iron_cond1" onchange="wash_dry_warp_after_iron_condition()" class="cf_rubbing_wet_cond1 form-control col-md-12 col-xs-12">
                <option value="2" selected="selected" <?php echo ($_POST['wash_dry_warp_after_iron_cond1'] == '2') ? 'selected' : '' ?> >[</option>
                <option value="1" <?php echo ($_POST['wash_dry_warp_after_iron_cond1'] == '1') ? 'selected' : '' ?> >(</option>
              </select>
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="wash_dry_warp_after_iron_value1" name="wash_dry_warp_after_iron_value1" value="<?php echo isset($_POST['wash_dry_warp_after_iron_value1']) ? $_POST['wash_dry_warp_after_iron_value1'] : "" ?>" class="wash_dry_warp_after_iron_value1 form-control col-md-7 col-xs-12">
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              --
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="wash_dry_warp_after_iron_value2" name="wash_dry_warp_after_iron_value2" value="<?php echo isset($_POST['wash_dry_warp_after_iron_value2']) ? $_POST['wash_dry_warp_after_iron_value2'] : "" ?>" class="wash_dry_warp_after_iron_value2 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="wash_dry_warp_after_iron_cond2" name="wash_dry_warp_after_iron_cond2" class="wash_dry_warp_after_iron_cond2 form-control col-md-12 col-xs-12">
                <option value="2" selected="selected" <?php echo ($_POST['wash_dry_warp_after_iron_cond2'] == '2') ? 'selected' : '' ?> >]</option>
                <option value="1" <?php echo ($_POST['wash_dry_warp_after_iron_cond2'] == '1') ? 'selected' : '' ?> >)</option>
              </select>
            </div>
          </div>

          <br>


          <div class="form-group">

            <label class="control-label col-md-6 col-sm-6 col-xs-12" for="wash_dry_weft_after_iron">Dimensional Change to Washing & Drying Weft (After Iron) <span class="required">*</span>
            </label>

            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              %
            </div>

            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="wash_dry_weft_after_iron_cond1" name="wash_dry_weft_after_iron_cond1" onchange="wash_dry_weft_after_iron_condition()" class="wash_dry_weft_after_iron_cond1 form-control col-md-12 col-xs-12">
                <option value="2" selected="selected" <?php echo ($_POST['wash_dry_warp_after_iron_cond1'] == '2') ? 'selected' : '' ?> >[</option>
                <option value="1" <?php echo ($_POST['wash_dry_warp_after_iron_cond1'] == '1') ? 'selected' : '' ?> >(</option>
              </select>
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="wash_dry_weft_after_iron_value1" name="wash_dry_weft_after_iron_value1" value="<?php echo isset($_POST['wash_dry_weft_after_iron_value1']) ? $_POST['wash_dry_weft_after_iron_value1'] : "" ?>" class="wash_dry_weft_after_iron_value1 form-control col-md-7 col-xs-12">
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              --
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="wash_dry_weft_after_iron_value2" name="wash_dry_weft_after_iron_value2" value="<?php echo isset($_POST['wash_dry_weft_after_iron_value2']) ? $_POST['wash_dry_weft_after_iron_value2'] : "" ?>" class="wash_dry_weft_after_iron_value2 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="wash_dry_weft_after_iron_cond2" name="wash_dry_weft_after_iron_cond2" class="wash_dry_weft_after_iron_cond2 form-control col-md-12 col-xs-12">
                <option value="2" selected="selected" <?php echo ($_POST['wash_dry_weft_after_iron_cond2'] == '2') ? 'selected' : '' ?> >]</option>
                <option value="1" <?php echo ($_POST['wash_dry_weft_after_iron_cond2'] == '1') ? 'selected' : '' ?> >)</option>
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
                <option value="2" selected="selected" <?php echo ($_POST['dry_cleaning_warp_cond1'] == '2') ? 'selected' : '' ?> >[</option>
                <option value="1" <?php echo ($_POST['dry_cleaning_warp_cond1'] == '1') ? 'selected' : '' ?> >(</option>
              </select>
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="dry_cleaning_warp_value1" name="dry_cleaning_warp_value1" value="<?php echo isset($_POST['dry_cleaning_warp_value1']) ? $_POST['dry_cleaning_warp_value1'] : "" ?>" class="dry_cleaning_warp_value1 form-control col-md-7 col-xs-12">
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              --
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="dry_cleaning_warp_value2" name="dry_cleaning_warp_value2" value="<?php echo isset($_POST['dry_cleaning_warp_value2']) ? $_POST['dry_cleaning_warp_value2'] : "" ?>" class="dry_cleaning_warp_value2 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="dry_cleaning_warp_cond2" name="dry_cleaning_warp_cond2" class="dry_cleaning_warp_cond2 form-control col-md-12 col-xs-12">
                <option value="2" selected="selected" <?php echo ($_POST['dry_cleaning_warp_cond2'] == '2') ? 'selected' : '' ?> >]</option>
                <option value="1" <?php echo ($_POST['dry_cleaning_warp_cond2'] == '1') ? 'selected' : '' ?> >)</option>
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
                <option value="2" selected="selected" <?php echo ($_POST['dry_cleaning_weft_cond1'] == '2') ? 'selected' : '' ?> >[</option>
                <option value="1" <?php echo ($_POST['dry_cleaning_weft_cond1'] == '1') ? 'selected' : '' ?> >(</option>
              </select>
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="dry_cleaning_weft_value1" name="dry_cleaning_weft_value1" value="<?php echo isset($_POST['dry_cleaning_weft_value1']) ? $_POST['dry_cleaning_weft_value1'] : "" ?>" class="dry_cleaning_weft_value1 form-control col-md-7 col-xs-12">
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              --
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="dry_cleaning_weft_value2" name="dry_cleaning_weft_value2" value="<?php echo isset($_POST['dry_cleaning_weft_value2']) ? $_POST['dry_cleaning_weft_value2'] : "" ?>" class="dry_cleaning_weft_value2 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="dry_cleaning_weft_cond2" name="dry_cleaning_weft_cond2" class="dry_cleaning_weft_cond2 form-control col-md-12 col-xs-12">
                <option value="2" selected="selected" <?php echo ($_POST['dry_cleaning_weft_cond2'] == '2') ? 'selected' : '' ?> >]</option>
                <option value="1" <?php echo ($_POST['dry_cleaning_weft_cond2'] == '1') ? 'selected' : '' ?> >)</option>
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
                <option value="Ne" selected <?php echo ($_POST['yarn_count_warp_unit'] == 'Ne') ? 'selected' : '' ?> >Ne</option>
                <option value="Nm" <?php echo ($_POST['yarn_count_warp_unit'] == 'Nm') ? 'selected' : '' ?> >Nm</option>
                <option value="den" <?php echo ($_POST['yarn_count_warp_unit'] == 'den') ? 'selected' : '' ?> >den</option>
                <option value="tex" <?php echo ($_POST['yarn_count_warp_unit'] == 'tex') ? 'selected' : '' ?> >tex</option>
                <option value="dtex" <?php echo ($_POST['yarn_count_warp_unit'] == 'dtex') ? 'selected' : '' ?> >dtex</option>
              </select>
            </div>

            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="yarn_count_warp_cond1" name="yarn_count_warp_cond1" onchange="yarn_count_warp_tol_condition()" class="yarn_count_warp_cond1 form-control col-md-12 col-xs-12">
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($_POST['yarn_count_warp_cond1'] == '1') ? 'selected' : '' ?> >(</option>
                <option value="2" <?php echo ($_POST['yarn_count_warp_cond1'] == '2') ? 'selected' : '' ?> >[</option>
              </select>
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="yarn_count_warp_value1" name="yarn_count_warp_value1" value="<?php echo isset($_POST['yarn_count_warp_value1']) ? $_POST['yarn_count_warp_value1'] : "" ?>" class="yarn_count_warp_value1 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              --
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="yarn_count_warp_value2" name="yarn_count_warp_value2" value="<?php echo isset($_POST['yarn_count_warp_value2']) ? $_POST['yarn_count_warp_value2'] : "" ?>" class="yarn_count_warp_value2 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="yarn_count_warp_cond2" name="yarn_count_warp_cond2" class="yarn_count_warp_cond2 form-control col-md-12 col-xs-12">
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($_POST['yarn_count_warp_cond2'] == '1') ? 'selected' : '' ?> >)</option>
                <option value="2" <?php echo ($_POST['yarn_count_warp_cond2'] == '2') ? 'selected' : '' ?> >]</option>
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
                <option value="Ne" selected <?php echo ($_POST['yarn_count_weft_unit'] == 'Ne') ? 'selected' : '' ?> >Ne</option>
                <option value="Nm" <?php echo ($_POST['yarn_count_weft_unit'] == 'Nm') ? 'selected' : '' ?> >Nm</option>
                <option value="den" <?php echo ($_POST['yarn_count_weft_unit'] == 'den') ? 'selected' : '' ?> >den</option>
                <option value="tex" <?php echo ($_POST['yarn_count_weft_unit'] == 'tex') ? 'selected' : '' ?> >tex</option>
                <option value="dtex" <?php echo ($_POST['yarn_count_weft_unit'] == 'dtex') ? 'selected' : '' ?> >dtex</option>
              </select>
            </div>

            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="yarn_count_weft_cond1" name="yarn_count_weft_cond1" onchange="yarn_count_weft_tol_condition()" class="yarn_count_weft_cond1 form-control col-md-12 col-xs-12">
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($_POST['yarn_count_weft_cond1'] == '1') ? 'selected' : '' ?> >(</option>
                <option value="2" <?php echo ($_POST['yarn_count_weft_cond1'] == '2') ? 'selected' : '' ?> >[</option>
              </select>
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="yarn_count_weft_value1" name="yarn_count_weft_value1" value="<?php echo isset($_POST['yarn_count_weft_value1']) ? $_POST['yarn_count_weft_value1'] : "" ?>" class="yarn_count_weft_value1 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              --
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="yarn_count_weft_value2" name="yarn_count_weft_value2" value="<?php echo isset($_POST['yarn_count_weft_value2']) ? $_POST['yarn_count_weft_value2'] : "" ?>" class="yarn_count_weft_value2 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="yarn_count_weft_cond2" name="yarn_count_weft_cond2" class="yarn_count_weft_cond2 form-control col-md-12 col-xs-12">
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($_POST['yarn_count_weft_cond2'] == '1') ? 'selected' : '' ?> >)</option>
                <option value="2" <?php echo ($_POST['yarn_count_weft_cond2'] == '2') ? 'selected' : '' ?> >]</option>
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
                <option value="th/inch" selected <?php echo ($_POST['number_thread_warp_unit'] == 'th/inch') ? 'selected' : '' ?> >th/inch</option>
                <option value="th/cm" <?php echo ($_POST['number_thread_warp_unit'] == 'th/cm') ? 'selected' : '' ?> >th/cm</option>
              </select>
            </div>

            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="number_thread_warp_cond1" name="number_thread_warp_cond1" onchange="number_thread_warp_tol_condition()" class="number_thread_warp_cond1 form-control col-md-12 col-xs-12">
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($_POST['number_thread_warp_cond1'] == '1') ? 'selected' : '' ?> >(</option>
                <option value="2" <?php echo ($_POST['number_thread_warp_cond1'] == '2') ? 'selected' : '' ?> >[</option>
              </select>
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="number_thread_warp_value1" name="number_thread_warp_value1" value="<?php echo isset($_POST['number_thread_warp_value1']) ? $_POST['number_thread_warp_value1'] : "" ?>" class="number_thread_warp_value1 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              --
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="number_thread_warp_value2" name="number_thread_warp_value2" value="<?php echo isset($_POST['number_thread_warp_value2']) ? $_POST['number_thread_warp_value2'] : "" ?>" class="number_thread_warp_value2 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="number_thread_warp_cond2" name="number_thread_warp_cond2" class="number_thread_warp_cond2 form-control col-md-12 col-xs-12">
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($_POST['number_thread_warp_cond2'] == '1') ? 'selected' : '' ?> >)</option>
                <option value="2" <?php echo ($_POST['number_thread_warp_cond2'] == '2') ? 'selected' : '' ?> >]</option>
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
                <option value="th/inch" selected <?php echo ($_POST['number_thread_weft_unit'] == 'th/inch') ? 'selected' : '' ?> >th/inch</option>
                <option value="th/cm" <?php echo ($_POST['number_thread_weft_unit'] == 'th/cm') ? 'selected' : '' ?> >th/cm</option>
              </select>
            </div>

            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="number_thread_weft_cond1" name="number_thread_weft_cond1" onchange="number_thread_weft_tol_condition()" class="number_thread_weft_cond1 form-control col-md-12 col-xs-12">
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($_POST['number_thread_weft_cond1'] == '1') ? 'selected' : '' ?> >(</option>
                <option value="2" <?php echo ($_POST['number_thread_weft_cond1'] == '2') ? 'selected' : '' ?> >[</option>
              </select>
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="number_thread_weft_value1" name="number_thread_weft_value1" value="<?php echo isset($_POST['number_thread_weft_value1']) ? $_POST['number_thread_weft_value1'] : "" ?>" class="number_thread_weft_value1 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              --
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="number_thread_weft_value2" name="number_thread_weft_value2" value="<?php echo isset($_POST['number_thread_weft_value2']) ? $_POST['number_thread_weft_value2'] : "" ?>" class="number_thread_weft_value2 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="number_thread_weft_cond2" name="number_thread_weft_cond2" class="number_thread_weft_cond2 form-control col-md-12 col-xs-12">
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($_POST['number_thread_weft_cond2'] == '1') ? 'selected' : '' ?> >)</option>
                <option value="2" <?php echo ($_POST['number_thread_weft_cond2'] == '2') ? 'selected' : '' ?> >]</option>
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
                <option value="gm/m2" selected <?php echo ($_POST['mass_per_unit_per_area_unit'] == 'gm/m2') ? 'selected' : '' ?> >gm/m2</option>
                <option value="oz/yd2" <?php echo ($_POST['mass_per_unit_per_area_unit'] == 'oz/yd2') ? 'selected' : '' ?> >oz/yd2</option>
              </select>
            </div>

            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="mass_per_unit_per_area_cond1" name="mass_per_unit_per_area_cond1" onchange="mass_per_unit_per_area_condition()" class="mass_per_unit_per_area_cond1 form-control col-md-12 col-xs-12">
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($_POST['mass_per_unit_per_area_cond1'] == '1') ? 'selected' : '' ?> >(</option>
                <option value="2" <?php echo ($_POST['mass_per_unit_per_area_cond1'] == '2') ? 'selected' : '' ?> >[</option>
              </select>
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="mass_per_unit_per_area_value1" name="mass_per_unit_per_area_value1" value="<?php echo isset($_POST['mass_per_unit_per_area_value1']) ? $_POST['mass_per_unit_per_area_value1'] : "" ?>" class="mass_per_unit_per_area_value1 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              --
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="mass_per_unit_per_area_value2" name="mass_per_unit_per_area_value2" value="<?php echo isset($_POST['mass_per_unit_per_area_value2']) ? $_POST['mass_per_unit_per_area_value2'] : "" ?>" class="mass_per_unit_per_area_value2 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="mass_per_unit_per_area_cond2" name="mass_per_unit_per_area_cond2" class="mass_per_unit_per_area_cond2 form-control col-md-12 col-xs-12">
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($_POST['mass_per_unit_per_area_cond2'] == '1') ? 'selected' : '' ?> >)</option>
                <option value="2" <?php echo ($_POST['mass_per_unit_per_area_cond2'] == '2') ? 'selected' : '' ?> >]</option>
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
                <option value="1" <?php echo ($_POST['surface_pilling_cond1'] == '1') ? 'selected' : '' ?> >(</option>
                <option value="2" <?php echo ($_POST['surface_pilling_cond1'] == '2') ? 'selected' : '' ?> >[</option>
              </select>
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="surface_pilling_value1" name="surface_pilling_value1" value="<?php echo isset($_POST['surface_pilling_value1']) ? $_POST['surface_pilling_value1'] : "" ?>" class="surface_pilling_value1 form-control col-md-7 col-xs-12">
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              --
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="surface_pilling_value2" name="surface_pilling_value2" value="<?php echo isset($_POST['surface_pilling_value2']) ? $_POST['surface_pilling_value2'] : "" ?>" class="surface_pilling_value2 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="surface_pilling_cond2" name="surface_pilling_cond2" class="surface_pilling_cond2 form-control col-md-12 col-xs-12">
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($_POST['surface_pilling_cond2'] == '1') ? 'selected' : '' ?> >)</option>
                <option value="2" <?php echo ($_POST['surface_pilling_cond2'] == '2') ? 'selected' : '' ?> >]</option>
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
                <option value="N" selected <?php echo ($_POST['tensile_warp_unit'] == 'N') ? 'selected' : '' ?> >N</option>
                <option value="kg" <?php echo ($_POST['tensile_warp_unit'] == 'kg') ? 'selected' : '' ?> >kg</option>
                <option value="lbf" <?php echo ($_POST['tensile_warp_unit'] == 'lbf') ? 'selected' : '' ?> >lbf</option>
                <option value="gm" <?php echo ($_POST['tensile_warp_unit'] == 'gm') ? 'selected' : '' ?> >gm</option>
                <option value="daN" <?php echo ($_POST['tensile_warp_unit'] == 'daN') ? 'selected' : '' ?> >daN</option>
                <option value="oz" <?php echo ($_POST['tensile_warp_unit'] == 'oz') ? 'selected' : '' ?> >oz</option>
              </select>
            </div>

            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="tensile_warp_cond1" name="tensile_warp_cond1" onchange="tensile_warp_condition()" class="tensile_warp_cond1 form-control col-md-12 col-xs-12">
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($_POST['tensile_warp_cond1'] == '1') ? 'selected' : '' ?> >(</option>
                <option value="2" <?php echo ($_POST['tensile_warp_cond1'] == '2') ? 'selected' : '' ?> >[</option>
              </select>
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="tensile_warp_value1" name="tensile_warp_value1" value="<?php echo isset($_POST['tensile_warp_value1']) ? $_POST['tensile_warp_value1'] : "" ?>" class="tensile_warp_value1 form-control col-md-7 col-xs-12">
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              --
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="tensile_warp_value2" name="tensile_warp_value2" value="<?php echo isset($_POST['tensile_warp_value2']) ? $_POST['tensile_warp_value2'] : "" ?>" class="tensile_warp_value2 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="tensile_warp_cond2" name="tensile_warp_cond2" class="tensile_warp_cond2 form-control col-md-12 col-xs-12">
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($_POST['tensile_warp_cond2'] == '1') ? 'selected' : '' ?> >)</option>
                <option value="2" <?php echo ($_POST['tensile_warp_cond2'] == '2') ? 'selected' : '' ?> >]</option>
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
                <option value="N" selected <?php echo ($_POST['tensile_weft_unit'] == 'N') ? 'selected' : '' ?> >N</option>
                <option value="kg" <?php echo ($_POST['tensile_weft_unit'] == 'kg') ? 'selected' : '' ?> >kg</option>
                <option value="lbf" <?php echo ($_POST['tensile_weft_unit'] == 'lbf') ? 'selected' : '' ?> >lbf</option>
                <option value="gm" <?php echo ($_POST['tensile_weft_unit'] == 'gm') ? 'selected' : '' ?> >gm</option>
                <option value="daN" <?php echo ($_POST['tensile_weft_unit'] == 'daN') ? 'selected' : '' ?> >daN</option>
                <option value="oz" <?php echo ($_POST['tensile_weft_unit'] == 'oz') ? 'selected' : '' ?> >oz</option>
              </select>
            </div>

            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="tensile_weft_cond1" name="tensile_weft_cond1" onchange="tensile_weft_condition()" class="tensile_weft_cond1 form-control col-md-12 col-xs-12">
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($_POST['tensile_weft_cond1'] == '1') ? 'selected' : '' ?> >(</option>
                <option value="2" <?php echo ($_POST['tensile_weft_cond1'] == '2') ? 'selected' : '' ?> >[</option>
              </select>
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="tensile_weft_value1" name="tensile_weft_value1" value="<?php echo isset($_POST['tensile_weft_value1']) ? $_POST['tensile_weft_value1'] : "" ?>" class="tensile_weft_value1 form-control col-md-7 col-xs-12">
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              --
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="tensile_weft_value2" name="tensile_weft_value2" value="<?php echo isset($_POST['tensile_weft_value2']) ? $_POST['tensile_weft_value2'] : "" ?>" class="tensile_weft_value2 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="tensile_weft_cond2" name="tensile_weft_cond2" class="tensile_weft_cond2 form-control col-md-12 col-xs-12">
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($_POST['tensile_weft_cond2'] == '1') ? 'selected' : '' ?> >)</option>
                <option value="2" <?php echo ($_POST['tensile_weft_cond2'] == '2') ? 'selected' : '' ?> >]</option>
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
                <option value="N" selected <?php echo ($_POST['tear_force_warp_unit'] == 'N') ? 'selected' : '' ?> >N</option>
                <option value="kg" <?php echo ($_POST['tear_force_warp_unit'] == 'kg') ? 'selected' : '' ?> >kg</option>
                <option value="lbf" <?php echo ($_POST['tear_force_warp_unit'] == 'lbf') ? 'selected' : '' ?> >lbf</option>
                <option value="gm" <?php echo ($_POST['tear_force_warp_unit'] == 'gm') ? 'selected' : '' ?> >gm</option>
                <option value="daN" <?php echo ($_POST['tear_force_warp_unit'] == 'daN') ? 'selected' : '' ?> >daN</option>
                <option value="oz" <?php echo ($_POST['tear_force_warp_unit'] == 'oz') ? 'selected' : '' ?> >oz</option>
              </select>
            </div>

            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="tear_force_warp_cond1" name="tear_force_warp_cond1" onchange="tear_force_warp_condition()" class="tear_force_warp_cond1 form-control col-md-12 col-xs-12">
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($_POST['tear_force_warp_cond1'] == '1') ? 'selected' : '' ?> >(</option>
                <option value="2" <?php echo ($_POST['tear_force_warp_cond1'] == '2') ? 'selected' : '' ?> >[</option>
              </select>
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="tear_force_warp_value1" name="tear_force_warp_value1" value="<?php echo isset($_POST['tear_force_warp_value1']) ? $_POST['tear_force_warp_value1'] : "" ?>" class="tear_force_warp_value1 form-control col-md-7 col-xs-12">
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              --
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="tear_force_warp_value2" name="tear_force_warp_value2" value="<?php echo isset($_POST['tear_force_warp_value2']) ? $_POST['tear_force_warp_value2'] : "" ?>" class="tear_force_warp_value2 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="tear_force_warp_cond2" name="tear_force_warp_cond2" class="tear_force_warp_cond2 form-control col-md-12 col-xs-12">
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($_POST['tear_force_warp_cond2'] == '1') ? 'selected' : '' ?> >)</option>
                <option value="2" <?php echo ($_POST['tear_force_warp_cond2'] == '2') ? 'selected' : '' ?> >]</option>
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
                <option value="N" selected <?php echo ($_POST['tear_force_weft_unit'] == 'N') ? 'selected' : '' ?> >N</option>
                <option value="kg" <?php echo ($_POST['tear_force_weft_unit'] == 'kg') ? 'selected' : '' ?> >kg</option>
                <option value="lbf" <?php echo ($_POST['tear_force_weft_unit'] == 'lbf') ? 'selected' : '' ?> >lbf</option>
                <option value="gm" <?php echo ($_POST['tear_force_weft_unit'] == 'gm') ? 'selected' : '' ?> >gm</option>
                <option value="daN" <?php echo ($_POST['tear_force_weft_unit'] == 'daN') ? 'selected' : '' ?> >daN</option>
                <option value="oz" <?php echo ($_POST['tear_force_weft_unit'] == 'oz') ? 'selected' : '' ?> >oz</option>
              </select>
            </div>

            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="tear_force_weft_cond1" name="tear_force_weft_cond1" onchange="tear_force_weft_condition()" class="tear_force_weft_cond1 form-control col-md-12 col-xs-12">
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($_POST['tear_force_weft_cond1'] == '1') ? 'selected' : '' ?> >(</option>
                <option value="2" <?php echo ($_POST['tear_force_weft_cond1'] == '2') ? 'selected' : '' ?> >[</option>
              </select>
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="tear_force_weft_value1" name="tear_force_weft_value1" value="<?php echo isset($_POST['tear_force_weft_value1']) ? $_POST['tear_force_weft_value1'] : "" ?>" class="tear_force_weft_value1 form-control col-md-7 col-xs-12">
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              --
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="tear_force_weft_value2" name="tear_force_weft_value2" value="<?php echo isset($_POST['tear_force_weft_value2']) ? $_POST['tear_force_weft_value2'] : "" ?>" class="tear_force_weft_value2 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="tear_force_weft_cond2" name="tear_force_weft_cond2" class="tear_force_weft_cond2 form-control col-md-12 col-xs-12">
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($_POST['tear_force_weft_cond2'] == '1') ? 'selected' : '' ?> >)</option>
                <option value="2" <?php echo ($_POST['tear_force_weft_cond2'] == '2') ? 'selected' : '' ?> >]</option>
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
                <option value="N" selected <?php echo ($_POST['seam_strength_warp_unit'] == 'N') ? 'selected' : '' ?> >N</option>
                <option value="kg" <?php echo ($_POST['seam_strength_warp_unit'] == 'kg') ? 'selected' : '' ?> >kg</option>
                <option value="lbf" <?php echo ($_POST['seam_strength_warp_unit'] == 'lbf') ? 'selected' : '' ?> >lbf</option>
                <option value="gm" <?php echo ($_POST['seam_strength_warp_unit'] == 'gm') ? 'selected' : '' ?> >gm</option>
                <option value="daN" <?php echo ($_POST['seam_strength_warp_unit'] == 'daN') ? 'selected' : '' ?> >daN</option>
                <option value="oz" <?php echo ($_POST['seam_strength_warp_unit'] == 'oz') ? 'selected' : '' ?> >oz</option>
              </select>
            </div>

            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="seam_strength_warp_cond1" name="seam_strength_warp_cond1" onchange="seam_strength_warp_condition()" class="seam_strength_warp_cond1 form-control col-md-12 col-xs-12">
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($_POST['seam_strength_warp_cond1'] == '1') ? 'selected' : '' ?> >(</option>
                <option value="2" <?php echo ($_POST['seam_strength_warp_cond1'] == '2') ? 'selected' : '' ?> >[</option>
              </select>
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="seam_strength_warp_value1" name="seam_strength_warp_value1" value="<?php echo isset($_POST['seam_strength_warp_value1']) ? $_POST['seam_strength_warp_value1'] : "" ?>" class="seam_strength_warp_value1 form-control col-md-7 col-xs-12">
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              --
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="seam_strength_warp_value2" name="seam_strength_warp_value2" value="<?php echo isset($_POST['seam_strength_warp_value2']) ? $_POST['seam_strength_warp_value2'] : "" ?>" class="seam_strength_warp_value2 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="seam_strength_warp_cond2" name="seam_strength_warp_cond2" class="seam_strength_warp_cond2 form-control col-md-12 col-xs-12">
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($_POST['seam_strength_warp_cond2'] == '1') ? 'selected' : '' ?> >)</option>
                <option value="2" <?php echo ($_POST['seam_strength_warp_cond2'] == '2') ? 'selected' : '' ?> >]</option>
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
                <option value="N" selected <?php echo ($_POST['seam_strength_weft_unit'] == 'N') ? 'selected' : '' ?> >N</option>
                <option value="kg" <?php echo ($_POST['seam_strength_weft_unit'] == 'kg') ? 'selected' : '' ?> >kg</option>
                <option value="lbf" <?php echo ($_POST['seam_strength_weft_unit'] == 'lbf') ? 'selected' : '' ?> >lbf</option>
                <option value="gm" <?php echo ($_POST['seam_strength_weft_unit'] == 'gm') ? 'selected' : '' ?> >gm</option>
                <option value="daN" <?php echo ($_POST['seam_strength_weft_unit'] == 'daN') ? 'selected' : '' ?> >daN</option>
                <option value="oz" <?php echo ($_POST['seam_strength_weft_unit'] == 'oz') ? 'selected' : '' ?> >oz</option>
              </select>
            </div>

            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="seam_strength_weft_cond1" name="seam_strength_weft_cond1" onchange="seam_strength_weft_condition()" class="seam_strength_weft_cond1 form-control col-md-12 col-xs-12">
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($_POST['seam_strength_weft_cond1'] == '1') ? 'selected' : '' ?> >(</option>
                <option value="2" <?php echo ($_POST['seam_strength_weft_cond1'] == '2') ? 'selected' : '' ?> >[</option>
              </select>
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="seam_strength_weft_value1" name="seam_strength_weft_value1" value="<?php echo isset($_POST['seam_strength_weft_value1']) ? $_POST['seam_strength_weft_value1'] : "" ?>" class="seam_strength_weft_value1 form-control col-md-7 col-xs-12">
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              --
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="seam_strength_weft_value2" name="seam_strength_weft_value2" value="<?php echo isset($_POST['seam_strength_weft_value2']) ? $_POST['seam_strength_weft_value2'] : "" ?>" class="seam_strength_weft_value2 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="seam_strength_weft_cond2" name="seam_strength_weft_cond2" class="seam_strength_weft_cond2 form-control col-md-12 col-xs-12">
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($_POST['seam_strength_weft_cond2'] == '1') ? 'selected' : '' ?> >)</option>
                <option value="2" <?php echo ($_POST['seam_strength_weft_cond2'] == '2') ? 'selected' : '' ?> >]</option>
              </select>
            </div>
          </div>

          <br>


          <div class="form-group">

            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="abrasion_resistance"> Abrasion Resistance S.Change
            </label>

            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              <select id="abrasion_resistance_cond" name="abrasion_resistance_cond" onchange="abrasion_resistance_condition();" class="abrasion_resistance_cond select2 pp_number form-control col-md-12 col-xs-12">
                <option value="1" selected="selected" > &ge; </option>
                <option value="2" > &le; </option>
              </select> 
            </div> 

            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              <select id="abrasion_resistance_value" name="abrasion_resistance_value" onchange="abrasion_resistance_condition();" class="abrasion_resistance_value select2 pp_number form-control col-md-12 col-xs-12">
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
              <select id="abrasion_resistance_cond1" name="abrasion_resistance_cond1" onchange="abrasion_resistance_condition()" class="abrasion_resistance_cond1 form-control col-md-12 col-xs-12">
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($_POST['abrasion_resistance_cond1'] == '1') ? 'selected' : '' ?> >(</option>
                <option value="2" <?php echo ($_POST['abrasion_resistance_cond1'] == '2') ? 'selected' : '' ?> >[</option>
              </select>
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="abrasion_resistance_value1" name="abrasion_resistance_value1" value="<?php echo isset($_POST['abrasion_resistance_value1']) ? $_POST['abrasion_resistance_value1'] : "" ?>" class="abrasion_resistance_value1 form-control col-md-7 col-xs-12">
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              --
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="abrasion_resistance_value2" name="abrasion_resistance_value2" value="<?php echo isset($_POST['abrasion_resistance_value2']) ? $_POST['abrasion_resistance_value2'] : "" ?>" class="abrasion_resistance_value2 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="abrasion_resistance_cond2" name="abrasion_resistance_cond2" class="abrasion_resistance_cond2 form-control col-md-12 col-xs-12">
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($_POST['abrasion_resistance_cond2'] == '1') ? 'selected' : '' ?> >)</option>
                <option value="2" <?php echo ($_POST['abrasion_resistance_cond2'] == '2') ? 'selected' : '' ?> >]</option>
              </select>
            </div>
          </div>

          <br>


          <div class="form-group">

            <label class="control-label col-md-3 col-sm-3 col-xs-6" for="abrasion_resistance_thread_break"> Abrasion Resistance Thread Break
            </label>

            <div class="col-md-3 col-sm-3 col-xs-6">
              <input type="text" id="abrasion_resistance_thread_break" name="abrasion_resistance_thread_break" value="<?php echo isset($_POST['abrasion_resistance_thread_break']) ? $_POST['abrasion_resistance_thread_break'] : "" ?>" class="abrasion_resistance_thread_break form-control col-md-7 col-xs-12">
            </div>

            <div class="col-md-6 col-sm-6 col-xs-6">
              
            </div>
          </div>

          <br>

          <div class="form-group">

            <label class="control-label col-md-3 col-sm-3 col-xs-6" for="revolution"> Revolution
            </label>

            <div class="col-md-3 col-sm-3 col-xs-6">
              <input type="text" id="revolution" name="revolution" placeholder="Shade change , Thread Break" value="<?php echo isset($_POST['revolution']) ? $_POST['revolution'] : "" ?>" class="revolution form-control col-md-7 col-xs-12">
            </div>

            <div class="col-md-6 col-sm-6 col-xs-6">
              
            </div>
          </div>

          <br>

          <div class="form-group">

            <label class="control-label col-md-3 col-sm-3 col-xs-6" for="print_durability"> Print Durability
            </label>

            <div class="col-md-3 col-sm-3 col-xs-6" style='text-align: center;'>
              <select id="print_durability" name="print_durability" class="print_durability form-control col-md-12 col-xs-12">
                <option value="No" selected <?php echo ($_POST['print_durability'] == 'No') ? 'selected' : '' ?> >No</option>
                <option value="Negligible" <?php echo ($_POST['print_durability'] == 'Negligible') ? 'selected' : '' ?> >Negligible</option>
                <option value="Slight" <?php echo ($_POST['print_durability'] == 'Slight') ? 'selected' : '' ?> >Slight</option>
                <option value="Distinct/Complete" <?php echo ($_POST['print_durability'] == 'Distinct/Complete') ? 'selected' : '' ?> >Distinct/Complete</option>
              </select>
            </div>

            <div class="col-md-6 col-sm-6 col-xs-6">
              
            </div>

          </div>

          <br>

          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="abrasion_resistance_lose"> Mass Loss in Abrasion test
            </label>

            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              <select id="abrasion_resistance_lose_cond" name="abrasion_resistance_lose_cond" onchange="abrasion_resistance_lose_condition();" class="abrasion_resistance_lose_cond select2 pp_number form-control col-md-12 col-xs-12">
                <option value="1" > &ge; </option>
                <option value="2" selected="selected" > &le; </option>
              </select> 
            </div> 

            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              <input type="text" id="abrasion_resistance_lose_value" name="abrasion_resistance_lose_value" oninput="abrasion_resistance_lose_condition();" value="<?php echo isset($_POST['abrasion_resistance_lose_value']) ? $_POST['abrasion_resistance_lose_value'] : "" ?>" class="abrasion_resistance_lose_value form-control col-md-7 col-xs-12">
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="hidden"   class="form-control col-md-7 col-xs-12">
            </div>


            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              % 
            </div>

            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="abrasion_resistance_lose_cond1" name="abrasion_resistance_lose_cond1" onchange="abrasion_resistance_lose_condition()" class="abrasion_resistance_lose_cond1 form-control col-md-12 col-xs-12">
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($_POST['abrasion_resistance_lose_cond1'] == '1') ? 'selected' : '' ?> >(</option>
                <option value="2" <?php echo ($_POST['abrasion_resistance_lose_cond1'] == '2') ? 'selected' : '' ?> >[</option>
              </select>
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="abrasion_resistance_lose_value1" name="abrasion_resistance_lose_value1" value="<?php echo isset($_POST['abrasion_resistance_lose_value1']) ? $_POST['abrasion_resistance_lose_value1'] : "" ?>" class="abrasion_resistance_lose_value1 form-control col-md-7 col-xs-12">
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              --
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="abrasion_resistance_lose_value2" name="abrasion_resistance_lose_value2" value="<?php echo isset($_POST['abrasion_resistance_lose_value2']) ? $_POST['abrasion_resistance_lose_value2'] : "" ?>" class="abrasion_resistance_lose_value2 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="abrasion_resistance_lose_cond2" name="abrasion_resistance_lose_cond2" class="abrasion_resistance_lose_cond2 form-control col-md-12 col-xs-12">
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($_POST['abrasion_resistance_lose_cond2'] == '1') ? 'selected' : '' ?> >)</option>
                <option value="2" <?php echo ($_POST['abrasion_resistance_lose_cond2'] == '2') ? 'selected' : '' ?> >]</option>
              </select>
            </div>
          </div>





          <br>

          <div class="form-group">

            <label class="control-label col-md-3 col-sm-3 col-xs-6" for="washing_ph">pH<span class="required">*</span>
            </label>

            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="washing_ph_cond1" name="washing_ph_cond1" onchange="washing_ph_condition()" class="cf_rubbing_wet_cond1 form-control col-md-12 col-xs-12">
                <option value="2" selected="selected" <?php echo ($_POST['washing_ph_cond1'] == '2') ? 'selected' : '' ?> >[</option>
                <option value="1" <?php echo ($_POST['washing_ph_cond1'] == '1') ? 'selected' : '' ?> >(</option>
              </select>
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="washing_ph_value1" name="washing_ph_value1" value="<?php echo isset($_POST['washing_ph_value1']) ? $_POST['washing_ph_value1'] : "" ?>" class="washing_ph_value1 form-control col-md-7 col-xs-12">
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              --
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="washing_ph_value2" name="washing_ph_value2" value="<?php echo isset($_POST['washing_ph_value2']) ? $_POST['washing_ph_value2'] : "" ?>" class="washing_ph_value2 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="washing_ph_cond2" name="washing_ph_cond2" class="washing_ph_cond2 form-control col-md-12 col-xs-12">
                <option value="2" selected="selected" <?php echo ($_POST['washing_ph_cond2'] == '2') ? 'selected' : '' ?> >]</option>
                <option value="1" <?php echo ($_POST['washing_ph_cond2'] == '1') ? 'selected' : '' ?> >)</option>
              </select>
            </div>

            <div class="col-md-4 col-sm-4 col-xs-6">
              
            </div>
          </div>


          <br>


          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="formaldehyde_content"> Formaldehyde Content <span class="required">*</span>
            </label>

            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              <select id="formaldehyde_content_cond" name="formaldehyde_content_cond" onchange="formaldehyde_content_condition();" class="formaldehyde_content_cond select2 pp_number form-control col-md-12 col-xs-12">
                <option value="1" selected="selected" > > </option>
                <option value="2" > < </option> 
              </select> 
            </div> 

            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              <input type="text" id="formaldehyde_content_value" name="formaldehyde_content_value" oninput="formaldehyde_content_condition();" class="formaldehyde_content_value form-control col-md-7 col-xs-12">
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="hidden" class="form-control col-md-7 col-xs-12">
            </div>

            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              <select id="formaldehyde_content_unit" name="formaldehyde_content_unit" class="formaldehyde_content_unit form-control col-md-12 col-xs-12">
                <option value="PPM" selected <?php echo ($_POST['formaldehyde_content_unit'] == 'PPM') ? 'selected' : '' ?> >PPM</option>
                <option value="mg/kg" <?php echo ($_POST['formaldehyde_content_unit'] == 'mg/kg') ? 'selected' : '' ?> >mg/kg</option>
              </select>
            </div>

            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="formaldehyde_content_cond1" name="formaldehyde_content_cond1" onchange="formaldehyde_content_condition()" class="formaldehyde_content_cond1 form-control col-md-12 col-xs-12">
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($_POST['formaldehyde_content_cond1'] == '1') ? 'selected' : '' ?> >(</option>
                <option value="2" <?php echo ($_POST['formaldehyde_content_cond1'] == '2') ? 'selected' : '' ?> >[</option>
              </select>
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="formaldehyde_content_value1" name="formaldehyde_content_value1" value="<?php echo isset($_POST['formaldehyde_content_value1']) ? $_POST['formaldehyde_content_value1'] : "" ?>" class="formaldehyde_content_value1 form-control col-md-7 col-xs-12">
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              --
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="formaldehyde_content_value2" name="formaldehyde_content_value2" value="<?php echo isset($_POST['formaldehyde_content_value2']) ? $_POST['formaldehyde_content_value2'] : "" ?>" class="formaldehyde_content_value2 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="formaldehyde_content_cond2" name="formaldehyde_content_cond2" class="formaldehyde_content_cond2 form-control col-md-12 col-xs-12">
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($_POST['formaldehyde_content_cond2'] == '1') ? 'selected' : '' ?> >)</option>
                <option value="2" <?php echo ($_POST['formaldehyde_content_cond2'] == '2') ? 'selected' : '' ?> >]</option>
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
                <option value="1" <?php echo ($_POST['cf_dry_cleaning_c_change_cond1'] == '1') ? 'selected' : '' ?> >(</option>
                <option value="2" <?php echo ($_POST['cf_dry_cleaning_c_change_cond1'] == '2') ? 'selected' : '' ?> >[</option>
              </select>
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="cf_dry_cleaning_c_change_value1" name="cf_dry_cleaning_c_change_value1" value="<?php echo isset($_POST['cf_dry_cleaning_c_change_value1']) ? $_POST['cf_dry_cleaning_c_change_value1'] : "" ?>" class="cf_dry_cleaning_c_change_value1 form-control col-md-7 col-xs-12">
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              --
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="cf_dry_cleaning_c_change_value2" name="cf_dry_cleaning_c_change_value2" value="<?php echo isset($_POST['cf_dry_cleaning_c_change_value2']) ? $_POST['cf_dry_cleaning_c_change_value2'] : "" ?>" class="cf_dry_cleaning_c_change_value2 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="cf_dry_cleaning_c_change_cond2" name="cf_dry_cleaning_c_change_cond2" class="cf_dry_cleaning_c_change_cond2 form-control col-md-12 col-xs-12">
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($_POST['cf_dry_cleaning_c_change_cond2'] == '1') ? 'selected' : '' ?> >)</option>
                <option value="2" <?php echo ($_POST['cf_dry_cleaning_c_change_cond2'] == '2') ? 'selected' : '' ?> >]</option>
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
                <option value="1" <?php echo ($_POST['cf_dry_cleaning_staining_cond1'] == '1') ? 'selected' : '' ?> >(</option>
                <option value="2" <?php echo ($_POST['cf_dry_cleaning_staining_cond1'] == '2') ? 'selected' : '' ?> >[</option>
              </select>
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="cf_dry_cleaning_staining_value1" name="cf_dry_cleaning_staining_value1" value="<?php echo isset($_POST['cf_dry_cleaning_staining_value1']) ? $_POST['cf_dry_cleaning_staining_value1'] : "" ?>" class="cf_dry_cleaning_staining_value1 form-control col-md-7 col-xs-12">
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              --
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="cf_dry_cleaning_staining_value2" name="cf_dry_cleaning_staining_value2" value="<?php echo isset($_POST['cf_dry_cleaning_staining_value2']) ? $_POST['cf_dry_cleaning_staining_value2'] : "" ?>" class="cf_dry_cleaning_staining_value2 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="cf_dry_cleaning_staining_cond2" name="cf_dry_cleaning_staining_cond2" class="cf_dry_cleaning_staining_cond2 form-control col-md-12 col-xs-12">
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($_POST['cf_dry_cleaning_staining_cond2'] == '1') ? 'selected' : '' ?> >)</option>
                <option value="2" <?php echo ($_POST['cf_dry_cleaning_staining_cond2'] == '2') ? 'selected' : '' ?> >]</option>
              </select>
            </div>
          </div>

          <br>

          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cf_washing_c_change"> Color Fastness to Washing Color Change 
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
                <option value="1" <?php echo ($_POST['cf_washing_c_change_cond1'] == '1') ? 'selected' : '' ?> >(</option>
                <option value="2" <?php echo ($_POST['cf_washing_c_change_cond1'] == '2') ? 'selected' : '' ?> >[</option>
              </select>
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="cf_washing_c_change_value1" name="cf_washing_c_change_value1" value="<?php echo isset($_POST['cf_washing_c_change_value1']) ? $_POST['cf_washing_c_change_value1'] : "" ?>" class="cf_washing_c_change_value1 form-control col-md-7 col-xs-12">
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              --
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="cf_washing_c_change_value2" name="cf_washing_c_change_value2" value="<?php echo isset($_POST['cf_washing_c_change_value2']) ? $_POST['cf_washing_c_change_value2'] : "" ?>" class="cf_washing_c_change_value2 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="cf_washing_c_change_cond2" name="cf_washing_c_change_cond2" class="cf_washing_c_change_cond2 form-control col-md-12 col-xs-12">
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($_POST['cf_washing_c_change_cond2'] == '1') ? 'selected' : '' ?> >)</option>
                <option value="2" <?php echo ($_POST['cf_washing_c_change_cond2'] == '2') ? 'selected' : '' ?> >]</option>
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
                <option value="1" <?php echo ($_POST['cf_washing_staining_cond1'] == '1') ? 'selected' : '' ?> >(</option>
                <option value="2" <?php echo ($_POST['cf_washing_staining_cond1'] == '2') ? 'selected' : '' ?> >[</option>
              </select>
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="cf_washing_staining_value1" name="cf_washing_staining_value1" value="<?php echo isset($_POST['cf_washing_staining_value1']) ? $_POST['cf_washing_staining_value1'] : "" ?>" class="cf_washing_staining_value1 form-control col-md-7 col-xs-12">
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              --
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="cf_washing_staining_value2" name="cf_washing_staining_value2" value="<?php echo isset($_POST['cf_washing_staining_value2']) ? $_POST['cf_washing_staining_value2'] : "" ?>" class="cf_washing_staining_value2 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="cf_washing_staining_cond2" name="cf_washing_staining_cond2" class="cf_washing_staining_cond2 form-control col-md-12 col-xs-12">
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($_POST['cf_washing_staining_cond2'] == '1') ? 'selected' : '' ?> >)</option>
                <option value="2" <?php echo ($_POST['cf_washing_staining_cond2'] == '2') ? 'selected' : '' ?> >]</option>
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
                <option value="1" <?php echo ($_POST['cf_perspiration_acis_c_change_cond1'] == '1') ? 'selected' : '' ?> >(</option>
                <option value="2" <?php echo ($_POST['cf_perspiration_acis_c_change_cond1'] == '2') ? 'selected' : '' ?> >[</option>
              </select>
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="cf_perspiration_acis_c_change_value1" name="cf_perspiration_acis_c_change_value1" value="<?php echo isset($_POST['cf_perspiration_acis_c_change_value1']) ? $_POST['cf_perspiration_acis_c_change_value1'] : "" ?>" class="cf_perspiration_acis_c_change_value1 form-control col-md-7 col-xs-12">
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              --
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="cf_perspiration_acis_c_change_value2" name="cf_perspiration_acis_c_change_value2" value="<?php echo isset($_POST['cf_perspiration_acis_c_change_value2']) ? $_POST['cf_perspiration_acis_c_change_value2'] : "" ?>" class="cf_perspiration_acis_c_change_value2 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="cf_perspiration_acis_c_change_cond2" name="cf_perspiration_acis_c_change_cond2" class="cf_perspiration_acis_c_change_cond2 form-control col-md-12 col-xs-12">
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($_POST['cf_perspiration_acis_c_change_cond2'] == '1') ? 'selected' : '' ?> >)</option>
                <option value="2" <?php echo ($_POST['cf_perspiration_acis_c_change_cond2'] == '2') ? 'selected' : '' ?> >]</option>
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
                <option value="1" <?php echo ($_POST['cf_perspiration_acis_staining_cond1'] == '1') ? 'selected' : '' ?> >(</option>
                <option value="2" <?php echo ($_POST['cf_perspiration_acis_staining_cond1'] == '2') ? 'selected' : '' ?> >[</option>
              </select>
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="cf_perspiration_acis_staining_value1" name="cf_perspiration_acis_staining_value1" value="<?php echo isset($_POST['cf_perspiration_acis_staining_value1']) ? $_POST['cf_perspiration_acis_staining_value1'] : "" ?>" class="cf_perspiration_acis_staining_value1 form-control col-md-7 col-xs-12">
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              --
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="cf_perspiration_acis_staining_value2" name="cf_perspiration_acis_staining_value2" value="<?php echo isset($_POST['cf_perspiration_acis_staining_value2']) ? $_POST['cf_perspiration_acis_staining_value2'] : "" ?>" class="cf_perspiration_acis_staining_value2 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="cf_perspiration_acis_staining_cond2" name="cf_perspiration_acis_staining_cond2" class="cf_perspiration_acis_staining_cond2 form-control col-md-12 col-xs-12">
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($_POST['cf_perspiration_acis_staining_cond2'] == '1') ? 'selected' : '' ?> >)</option>
                <option value="2" <?php echo ($_POST['cf_perspiration_acis_staining_cond2'] == '2') ? 'selected' : '' ?> >]</option>
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
                <option value="1" <?php echo ($_POST['cf_perspiration_alkali_c_change_cond1'] == '1') ? 'selected' : '' ?> >(</option>
                <option value="2" <?php echo ($_POST['cf_perspiration_alkali_c_change_cond1'] == '2') ? 'selected' : '' ?> >[</option>
              </select>
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="cf_perspiration_alkali_c_change_value1" name="cf_perspiration_alkali_c_change_value1" value="<?php echo isset($_POST['cf_perspiration_alkali_c_change_value1']) ? $_POST['cf_perspiration_alkali_c_change_value1'] : "" ?>" class="cf_perspiration_alkali_c_change_value1 form-control col-md-7 col-xs-12">
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              --
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="cf_perspiration_alkali_c_change_value2" name="cf_perspiration_alkali_c_change_value2" value="<?php echo isset($_POST['cf_perspiration_alkali_c_change_value2']) ? $_POST['cf_perspiration_alkali_c_change_value2'] : "" ?>" class="cf_perspiration_alkali_c_change_value2 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="cf_perspiration_alkali_c_change_cond2" name="cf_perspiration_alkali_c_change_cond2" class="cf_perspiration_alkali_c_change_cond2 form-control col-md-12 col-xs-12">
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($_POST['cf_perspiration_alkali_c_change_cond2'] == '1') ? 'selected' : '' ?> >)</option>
                <option value="2" <?php echo ($_POST['cf_perspiration_alkali_c_change_cond2'] == '2') ? 'selected' : '' ?> >]</option>
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
                <option value="1" <?php echo ($_POST['cf_perspiration_alkali_staining_cond1'] == '1') ? 'selected' : '' ?> >(</option>
                <option value="2" <?php echo ($_POST['cf_perspiration_alkali_staining_cond1'] == '2') ? 'selected' : '' ?> >[</option>
              </select>
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="cf_perspiration_alkali_staining_value1" name="cf_perspiration_alkali_staining_value1" value="<?php echo isset($_POST['cf_perspiration_alkali_staining_value1']) ? $_POST['cf_perspiration_alkali_staining_value1'] : "" ?>" class="cf_perspiration_alkali_staining_value1 form-control col-md-7 col-xs-12">
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              --
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="cf_perspiration_alkali_staining_value2" name="cf_perspiration_alkali_staining_value2" value="<?php echo isset($_POST['cf_perspiration_alkali_staining_value2']) ? $_POST['cf_perspiration_alkali_staining_value2'] : "" ?>" class="cf_perspiration_alkali_staining_value2 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="cf_perspiration_alkali_staining_cond2" name="cf_perspiration_alkali_staining_cond2" class="cf_perspiration_alkali_staining_cond2 form-control col-md-12 col-xs-12">
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($_POST['cf_perspiration_alkali_staining_cond2'] == '1') ? 'selected' : '' ?> >)</option>
                <option value="2" <?php echo ($_POST['cf_perspiration_alkali_staining_cond2'] == '2') ? 'selected' : '' ?> >]</option>
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
                <option value="1" <?php echo ($_POST['cf_water_c_change_cond1'] == '1') ? 'selected' : '' ?> >(</option>
                <option value="2" <?php echo ($_POST['cf_water_c_change_cond1'] == '2') ? 'selected' : '' ?> >[</option>
              </select>
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="cf_water_c_change_value1" name="cf_water_c_change_value1" value="<?php echo isset($_POST['cf_water_c_change_value1']) ? $_POST['cf_water_c_change_value1'] : "" ?>" class="cf_water_c_change_value1 form-control col-md-7 col-xs-12">
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              --
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="cf_water_c_change_value2" name="cf_water_c_change_value2" value="<?php echo isset($_POST['cf_water_c_change_value2']) ? $_POST['cf_water_c_change_value2'] : "" ?>" class="cf_water_c_change_value2 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="cf_water_c_change_cond2" name="cf_water_c_change_cond2" class="cf_water_c_change_cond2 form-control col-md-12 col-xs-12">
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($_POST['cf_water_c_change_cond2'] == '1') ? 'selected' : '' ?> >)</option>
                <option value="2" <?php echo ($_POST['cf_water_c_change_cond2'] == '2') ? 'selected' : '' ?> >]</option>
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
                <option value="1" <?php echo ($_POST['cf_water_staining_cond1'] == '1') ? 'selected' : '' ?> >(</option>
                <option value="2" <?php echo ($_POST['cf_water_staining_cond1'] == '2') ? 'selected' : '' ?> >[</option>
              </select>
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="cf_water_staining_value1" name="cf_water_staining_value1" value="<?php echo isset($_POST['cf_water_staining_value1']) ? $_POST['cf_water_staining_value1'] : "" ?>" class="cf_water_staining_value1 form-control col-md-7 col-xs-12">
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              --
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="cf_water_staining_value2" name="cf_water_staining_value2" value="<?php echo isset($_POST['cf_water_staining_value2']) ? $_POST['cf_water_staining_value2'] : "" ?>" class="cf_water_staining_value2 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="cf_water_staining_cond2" name="cf_water_staining_cond2" class="cf_water_staining_cond2 form-control col-md-12 col-xs-12">
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($_POST['cf_water_staining_cond2'] == '1') ? 'selected' : '' ?> >)</option>
                <option value="2" <?php echo ($_POST['cf_water_staining_cond2'] == '2') ? 'selected' : '' ?> >]</option>
              </select>
            </div>
          </div>

          <br>


          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cf_water_sotting_staining"> Color Fastness to Water Spotting Staining 
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
                <option value="1" <?php echo ($_POST['cf_water_sotting_staining_cond1'] == '1') ? 'selected' : '' ?> >(</option>
                <option value="2" <?php echo ($_POST['cf_water_sotting_staining_cond1'] == '2') ? 'selected' : '' ?> >[</option>
              </select>
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="cf_water_sotting_staining_value1" name="cf_water_sotting_staining_value1" value="<?php echo isset($_POST['cf_water_sotting_staining_value1']) ? $_POST['cf_water_sotting_staining_value1'] : "" ?>" class="cf_water_sotting_staining_value1 form-control col-md-7 col-xs-12">
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              --
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="cf_water_sotting_staining_value2" name="cf_water_sotting_staining_value2" value="<?php echo isset($_POST['cf_water_sotting_staining_value2']) ? $_POST['cf_water_sotting_staining_value2'] : "" ?>" class="cf_water_sotting_staining_value2 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="cf_water_sotting_staining_cond2" name="cf_water_sotting_staining_cond2" class="cf_water_sotting_staining_cond2 form-control col-md-12 col-xs-12">
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($_POST['cf_water_sotting_staining_cond2'] == '1') ? 'selected' : '' ?> >)</option>
                <option value="2" <?php echo ($_POST['cf_water_sotting_staining_cond2'] == '2') ? 'selected' : '' ?> >]</option>
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
                <option value="1" <?php echo ($_POST['cf_water_wetting_staining_cond1'] == '1') ? 'selected' : '' ?> >(</option>
                <option value="2" <?php echo ($_POST['cf_water_wetting_staining_cond1'] == '2') ? 'selected' : '' ?> >[</option>
              </select>
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="cf_water_wetting_staining_value1" name="cf_water_wetting_staining_value1" value="<?php echo isset($_POST['cf_water_wetting_staining_value1']) ? $_POST['cf_water_wetting_staining_value1'] : "" ?>" class="cf_water_wetting_staining_value1 form-control col-md-7 col-xs-12">
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              --
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="cf_water_wetting_staining_value2" name="cf_water_wetting_staining_value2" value="<?php echo isset($_POST['cf_water_wetting_staining_value2']) ? $_POST['cf_water_wetting_staining_value2'] : "" ?>" class="cf_water_wetting_staining_value2 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="cf_water_wetting_staining_cond2" name="cf_water_wetting_staining_cond2" class="cf_water_wetting_staining_cond2 form-control col-md-12 col-xs-12">
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($_POST['cf_water_wetting_staining_cond2'] == '1') ? 'selected' : '' ?> >)</option>
                <option value="2" <?php echo ($_POST['cf_water_wetting_staining_cond2'] == '2') ? 'selected' : '' ?> >]</option>
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
                <option value="1" <?php echo ($_POST['cf_hyd_reactive_dyes_c_change_cond1'] == '1') ? 'selected' : '' ?> >(</option>
                <option value="2" <?php echo ($_POST['cf_hyd_reactive_dyes_c_change_cond1'] == '2') ? 'selected' : '' ?> >[</option>
              </select>
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="cf_hyd_reactive_dyes_c_change_value1" name="cf_hyd_reactive_dyes_c_change_value1" value="<?php echo isset($_POST['cf_hyd_reactive_dyes_c_change_value1']) ? $_POST['cf_hyd_reactive_dyes_c_change_value1'] : "" ?>" class="cf_hyd_reactive_dyes_c_change_value1 form-control col-md-7 col-xs-12">
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              --
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="cf_hyd_reactive_dyes_c_change_value2" name="cf_hyd_reactive_dyes_c_change_value2" value="<?php echo isset($_POST['cf_hyd_reactive_dyes_c_change_value2']) ? $_POST['cf_hyd_reactive_dyes_c_change_value2'] : "" ?>" class="cf_hyd_reactive_dyes_c_change_value2 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="cf_hyd_reactive_dyes_c_change_cond2" name="cf_hyd_reactive_dyes_c_change_cond2" class="cf_hyd_reactive_dyes_c_change_cond2 form-control col-md-12 col-xs-12">
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($_POST['cf_hyd_reactive_dyes_c_change_cond2'] == '1') ? 'selected' : '' ?> >)</option>
                <option value="2" <?php echo ($_POST['cf_hyd_reactive_dyes_c_change_cond2'] == '2') ? 'selected' : '' ?> >]</option>
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
                <option value="1" <?php echo ($_POST['cf_hyd_reactive_dyes_staining_cond1'] == '1') ? 'selected' : '' ?> >(</option>
                <option value="2" <?php echo ($_POST['cf_hyd_reactive_dyes_staining_cond1'] == '2') ? 'selected' : '' ?> >[</option>
              </select>
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="cf_hyd_reactive_dyes_staining_value1" name="cf_hyd_reactive_dyes_staining_value1" value="<?php echo isset($_POST['cf_hyd_reactive_dyes_staining_value1']) ? $_POST['cf_hyd_reactive_dyes_staining_value1'] : "" ?>" class="cf_hyd_reactive_dyes_staining_value1 form-control col-md-7 col-xs-12">
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              --
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="cf_hyd_reactive_dyes_staining_value2" name="cf_hyd_reactive_dyes_staining_value2" value="<?php echo isset($_POST['cf_hyd_reactive_dyes_staining_value2']) ? $_POST['cf_hyd_reactive_dyes_staining_value2'] : "" ?>" class="cf_hyd_reactive_dyes_staining_value2 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="cf_hyd_reactive_dyes_staining_cond2" name="cf_hyd_reactive_dyes_staining_cond2" class="cf_hyd_reactive_dyes_staining_cond2 form-control col-md-12 col-xs-12">
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($_POST['cf_hyd_reactive_dyes_staining_cond2'] == '1') ? 'selected' : '' ?> >)</option>
                <option value="2" <?php echo ($_POST['cf_hyd_reactive_dyes_staining_cond2'] == '2') ? 'selected' : '' ?> >]</option>
              </select>
            </div>
          </div>

          <br>


          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cf_oidative_damage_c_change"> Color Fastness to Oxidative Bleach Damage Color Change 
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
                <option value="1" <?php echo ($_POST['cf_oidative_damage_c_change_cond1'] == '1') ? 'selected' : '' ?> >(</option>
                <option value="2" <?php echo ($_POST['cf_oidative_damage_c_change_cond1'] == '2') ? 'selected' : '' ?> >[</option>
              </select>
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="cf_oidative_damage_c_change_value1" name="cf_oidative_damage_c_change_value1" value="<?php echo isset($_POST['cf_oidative_damage_c_change_value1']) ? $_POST['cf_oidative_damage_c_change_value1'] : "" ?>" class="cf_oidative_damage_c_change_value1 form-control col-md-7 col-xs-12">
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              --
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="cf_oidative_damage_c_change_value2" name="cf_oidative_damage_c_change_value2" value="<?php echo isset($_POST['cf_oidative_damage_c_change_value2']) ? $_POST['cf_oidative_damage_c_change_value2'] : "" ?>" class="cf_oidative_damage_c_change_value2 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="cf_oidative_damage_c_change_cond2" name="cf_oidative_damage_c_change_cond2" class="cf_oidative_damage_c_change_cond2 form-control col-md-12 col-xs-12">
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($_POST['cf_oidative_damage_c_change_cond2'] == '1') ? 'selected' : '' ?> >)</option>
                <option value="2" <?php echo ($_POST['cf_oidative_damage_c_change_cond2'] == '2') ? 'selected' : '' ?> >]</option>
              </select>
            </div>
          </div>

          <br>


          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cf_phenolic_staining"> Color Fastness to Phenolic Yellowing Color Change  
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
                <option value="1" <?php echo ($_POST['cf_phenolic_staining_cond1'] == '1') ? 'selected' : '' ?> >(</option>
                <option value="2" <?php echo ($_POST['cf_phenolic_staining_cond1'] == '2') ? 'selected' : '' ?> >[</option>
              </select>
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="cf_phenolic_staining_value1" name="cf_phenolic_staining_value1" value="<?php echo isset($_POST['cf_phenolic_staining_value1']) ? $_POST['cf_phenolic_staining_value1'] : "" ?>" class="cf_phenolic_staining_value1 form-control col-md-7 col-xs-12">
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              --
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="cf_phenolic_staining_value2" name="cf_phenolic_staining_value2" value="<?php echo isset($_POST['cf_phenolic_staining_value2']) ? $_POST['cf_phenolic_staining_value2'] : "" ?>" class="cf_phenolic_staining_value2 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="cf_phenolic_staining_cond2" name="cf_phenolic_staining_cond2" class="cf_phenolic_staining_cond2 form-control col-md-12 col-xs-12">
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($_POST['cf_phenolic_staining_cond2'] == '1') ? 'selected' : '' ?> >)</option>
                <option value="2" <?php echo ($_POST['cf_phenolic_staining_cond2'] == '2') ? 'selected' : '' ?> >]</option>
              </select>
            </div>
          </div>

          <br>


          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cf_pvc_migration_staining"> Migration of Color into PVC
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
                <option value="1" <?php echo ($_POST['cf_pvc_migration_staining_cond1'] == '1') ? 'selected' : '' ?> >(</option>
                <option value="2" <?php echo ($_POST['cf_pvc_migration_staining_cond1'] == '2') ? 'selected' : '' ?> >[</option>
              </select>
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="cf_pvc_migration_staining_value1" name="cf_pvc_migration_staining_value1" value="<?php echo isset($_POST['cf_pvc_migration_staining_value1']) ? $_POST['cf_pvc_migration_staining_value1'] : "" ?>" class="cf_pvc_migration_staining_value1 form-control col-md-7 col-xs-12">
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              --
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="cf_pvc_migration_staining_value2" name="cf_pvc_migration_staining_value2" value="<?php echo isset($_POST['cf_pvc_migration_staining_value2']) ? $_POST['cf_pvc_migration_staining_value2'] : "" ?>" class="cf_pvc_migration_staining_value2 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="cf_pvc_migration_staining_cond2" name="cf_pvc_migration_staining_cond2" class="cf_pvc_migration_staining_cond2 form-control col-md-12 col-xs-12">
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($_POST['cf_pvc_migration_staining_cond2'] == '1') ? 'selected' : '' ?> >)</option>
                <option value="2" <?php echo ($_POST['cf_pvc_migration_staining_cond2'] == '2') ? 'selected' : '' ?> >]</option>
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
                <option value="1" <?php echo ($_POST['cf_saliva_c_change_cond1'] == '1') ? 'selected' : '' ?> >(</option>
                <option value="2" <?php echo ($_POST['cf_saliva_c_change_cond1'] == '2') ? 'selected' : '' ?> >[</option>
              </select>
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="cf_saliva_c_change_value1" name="cf_saliva_c_change_value1" value="<?php echo isset($_POST['cf_saliva_c_change_value1']) ? $_POST['cf_saliva_c_change_value1'] : "" ?>" class="cf_saliva_c_change_value1 form-control col-md-7 col-xs-12">
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              --
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="cf_saliva_c_change_value2" name="cf_saliva_c_change_value2" value="<?php echo isset($_POST['cf_saliva_c_change_value2']) ? $_POST['cf_saliva_c_change_value2'] : "" ?>" class="cf_saliva_c_change_value2 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="cf_saliva_c_change_cond2" name="cf_saliva_c_change_cond2" class="cf_saliva_c_change_cond2 form-control col-md-12 col-xs-12">
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($_POST['cf_saliva_c_change_cond2'] == '1') ? 'selected' : '' ?> >)</option>
                <option value="2" <?php echo ($_POST['cf_saliva_c_change_cond2'] == '2') ? 'selected' : '' ?> >]</option>
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
                <option value="1" <?php echo ($_POST['cf_saliva_staining_cond1'] == '1') ? 'selected' : '' ?> >(</option>
                <option value="2" <?php echo ($_POST['cf_saliva_staining_cond1'] == '2') ? 'selected' : '' ?> >[</option>
              </select>
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="cf_saliva_staining_value1" name="cf_saliva_staining_value1" value="<?php echo isset($_POST['cf_saliva_staining_value1']) ? $_POST['cf_saliva_staining_value1'] : "" ?>" class="cf_saliva_staining_value1 form-control col-md-7 col-xs-12">
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              --
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="cf_saliva_staining_value2" name="cf_saliva_staining_value2" value="<?php echo isset($_POST['cf_saliva_staining_value2']) ? $_POST['cf_saliva_staining_value2'] : "" ?>" class="cf_saliva_staining_value2 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="cf_saliva_staining_cond2" name="cf_saliva_staining_cond2" class="cf_saliva_staining_cond2 form-control col-md-12 col-xs-12">
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($_POST['cf_saliva_staining_cond2'] == '1') ? 'selected' : '' ?> >)</option>
                <option value="2" <?php echo ($_POST['cf_saliva_staining_cond2'] == '2') ? 'selected' : '' ?> >]</option>
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
                <option value="1" <?php echo ($_POST['cf_chlorinated_water_c_change_cond1'] == '1') ? 'selected' : '' ?> >(</option>
                <option value="2" <?php echo ($_POST['cf_chlorinated_water_c_change_cond1'] == '2') ? 'selected' : '' ?> >[</option>
              </select>
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="cf_chlorinated_water_c_change_value1" name="cf_chlorinated_water_c_change_value1" value="<?php echo isset($_POST['cf_chlorinated_water_c_change_value1']) ? $_POST['cf_chlorinated_water_c_change_value1'] : "" ?>" class="cf_chlorinated_water_c_change_value1 form-control col-md-7 col-xs-12">
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              --
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="cf_chlorinated_water_c_change_value2" name="cf_chlorinated_water_c_change_value2" value="<?php echo isset($_POST['cf_chlorinated_water_c_change_value2']) ? $_POST['cf_chlorinated_water_c_change_value2'] : "" ?>" class="cf_chlorinated_water_c_change_value2 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="cf_chlorinated_water_c_change_cond2" name="cf_chlorinated_water_c_change_cond2" class="cf_chlorinated_water_c_change_cond2 form-control col-md-12 col-xs-12">
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($_POST['cf_chlorinated_water_c_change_cond2'] == '1') ? 'selected' : '' ?> >)</option>
                <option value="2" <?php echo ($_POST['cf_chlorinated_water_c_change_cond2'] == '2') ? 'selected' : '' ?> >]</option>
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
                <option value="1" <?php echo ($_POST['cf_chlorinated_water_staining_cond1'] == '1') ? 'selected' : '' ?> >(</option>
                <option value="2" <?php echo ($_POST['cf_chlorinated_water_staining_cond1'] == '2') ? 'selected' : '' ?> >[</option>
              </select>
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="cf_chlorinated_water_staining_value1" name="cf_chlorinated_water_staining_value1" value="<?php echo isset($_POST['cf_chlorinated_water_staining_value1']) ? $_POST['cf_chlorinated_water_staining_value1'] : "" ?>" class="cf_chlorinated_water_staining_value1 form-control col-md-7 col-xs-12">
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              --
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="cf_chlorinated_water_staining_value2" name="cf_chlorinated_water_staining_value2" value="<?php echo isset($_POST['cf_chlorinated_water_staining_value2']) ? $_POST['cf_chlorinated_water_staining_value2'] : "" ?>" class="cf_chlorinated_water_staining_value2 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="cf_chlorinated_water_staining_cond2" name="cf_chlorinated_water_staining_cond2" class="cf_chlorinated_water_staining_cond2 form-control col-md-12 col-xs-12">
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($_POST['cf_chlorinated_water_staining_cond2'] == '1') ? 'selected' : '' ?> >)</option>
                <option value="2" <?php echo ($_POST['cf_chlorinated_water_staining_cond2'] == '2') ? 'selected' : '' ?> >]</option>
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
                <option value="1" <?php echo ($_POST['cf_cholorine_bleach_c_change_cond1'] == '1') ? 'selected' : '' ?> >(</option>
                <option value="2" <?php echo ($_POST['cf_cholorine_bleach_c_change_cond1'] == '2') ? 'selected' : '' ?> >[</option>
              </select>
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="cf_cholorine_bleach_c_change_value1" name="cf_cholorine_bleach_c_change_value1" value="<?php echo isset($_POST['cf_cholorine_bleach_c_change_value1']) ? $_POST['cf_cholorine_bleach_c_change_value1'] : "" ?>" class="cf_cholorine_bleach_c_change_value1 form-control col-md-7 col-xs-12">
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              --
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="cf_cholorine_bleach_c_change_value2" name="cf_cholorine_bleach_c_change_value2" value="<?php echo isset($_POST['cf_cholorine_bleach_c_change_value2']) ? $_POST['cf_cholorine_bleach_c_change_value2'] : "" ?>" class="cf_cholorine_bleach_c_change_value2 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="cf_cholorine_bleach_c_change_cond2" name="cf_cholorine_bleach_c_change_cond2" class="cf_cholorine_bleach_c_change_cond2 form-control col-md-12 col-xs-12">
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($_POST['cf_cholorine_bleach_c_change_cond2'] == '1') ? 'selected' : '' ?> >)</option>
                <option value="2" <?php echo ($_POST['cf_cholorine_bleach_c_change_cond2'] == '2') ? 'selected' : '' ?> >]</option>
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
                <option value="1" <?php echo ($_POST['cf_cholorine_bleach_staining_cond1'] == '1') ? 'selected' : '' ?> >(</option>
                <option value="2" <?php echo ($_POST['cf_cholorine_bleach_staining_cond1'] == '2') ? 'selected' : '' ?> >[</option>
              </select>
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="cf_cholorine_bleach_staining_value1" name="cf_cholorine_bleach_staining_value1" value="<?php echo isset($_POST['cf_cholorine_bleach_staining_value1']) ? $_POST['cf_cholorine_bleach_staining_value1'] : "" ?>" class="cf_cholorine_bleach_staining_value1 form-control col-md-7 col-xs-12">
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              --
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="cf_cholorine_bleach_staining_value2" name="cf_cholorine_bleach_staining_value2" value="<?php echo isset($_POST['cf_cholorine_bleach_staining_value2']) ? $_POST['cf_cholorine_bleach_staining_value2'] : "" ?>" class="cf_cholorine_bleach_staining_value2 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="cf_cholorine_bleach_staining_cond2" name="cf_cholorine_bleach_staining_cond2" class="cf_cholorine_bleach_staining_cond2 form-control col-md-12 col-xs-12">
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($_POST['cf_cholorine_bleach_staining_cond2'] == '1') ? 'selected' : '' ?> >)</option>
                <option value="2" <?php echo ($_POST['cf_cholorine_bleach_staining_cond2'] == '2') ? 'selected' : '' ?> >]</option>
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
                <option value="1" <?php echo ($_POST['cf_peroxide_bleach_c_change_cond1'] == '1') ? 'selected' : '' ?> >(</option>
                <option value="2" <?php echo ($_POST['cf_peroxide_bleach_c_change_cond1'] == '2') ? 'selected' : '' ?> >[</option>
              </select>
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="cf_peroxide_bleach_c_change_value1" name="cf_peroxide_bleach_c_change_value1" value="<?php echo isset($_POST['cf_peroxide_bleach_c_change_value1']) ? $_POST['cf_peroxide_bleach_c_change_value1'] : "" ?>" class="cf_peroxide_bleach_c_change_value1 form-control col-md-7 col-xs-12">
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              --
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="cf_peroxide_bleach_c_change_value2" name="cf_peroxide_bleach_c_change_value2" value="<?php echo isset($_POST['cf_peroxide_bleach_c_change_value2']) ? $_POST['cf_peroxide_bleach_c_change_value2'] : "" ?>" class="cf_peroxide_bleach_c_change_value2 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="cf_peroxide_bleach_c_change_cond2" name="cf_peroxide_bleach_c_change_cond2" class="cf_peroxide_bleach_c_change_cond2 form-control col-md-12 col-xs-12">
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($_POST['cf_peroxide_bleach_c_change_cond2'] == '1') ? 'selected' : '' ?> >)</option>
                <option value="2" <?php echo ($_POST['cf_peroxide_bleach_c_change_cond2'] == '2') ? 'selected' : '' ?> >]</option>
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
                <option value="1" <?php echo ($_POST['cf_peroxide_bleach_staining_cond1'] == '1') ? 'selected' : '' ?> >(</option>
                <option value="2" <?php echo ($_POST['cf_peroxide_bleach_staining_cond1'] == '2') ? 'selected' : '' ?> >[</option>
              </select>
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="cf_peroxide_bleach_staining_value1" name="cf_peroxide_bleach_staining_value1" value="<?php echo isset($_POST['cf_peroxide_bleach_staining_value1']) ? $_POST['cf_peroxide_bleach_staining_value1'] : "" ?>" class="cf_peroxide_bleach_staining_value1 form-control col-md-7 col-xs-12">
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              --
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="cf_peroxide_bleach_staining_value2" name="cf_peroxide_bleach_staining_value2" value="<?php echo isset($_POST['cf_peroxide_bleach_staining_value2']) ? $_POST['cf_peroxide_bleach_staining_value2'] : "" ?>" class="cf_peroxide_bleach_staining_value2 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="cf_peroxide_bleach_staining_cond2" name="cf_peroxide_bleach_staining_cond2" class="cf_peroxide_bleach_staining_cond2 form-control col-md-12 col-xs-12">
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($_POST['cf_peroxide_bleach_staining_cond2'] == '1') ? 'selected' : '' ?> >)</option>
                <option value="2" <?php echo ($_POST['cf_peroxide_bleach_staining_cond2'] == '2') ? 'selected' : '' ?> >]</option>
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
                <option value="1" <?php echo ($_POST['cross_staining_cond1'] == '1') ? 'selected' : '' ?> >(</option>
                <option value="2" <?php echo ($_POST['cross_staining_cond1'] == '2') ? 'selected' : '' ?> >[</option>
              </select>
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="cross_staining_value1" name="cross_staining_value1" value="<?php echo isset($_POST['cross_staining_value1']) ? $_POST['cross_staining_value1'] : "" ?>" class="cross_staining_value1 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              --
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="cross_staining_value2" name="cross_staining_value2" value="<?php echo isset($_POST['cross_staining_value2']) ? $_POST['cross_staining_value2'] : "" ?>" class="cross_staining_value2 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="cross_staining_cond2" name="cross_staining_cond2" class="cross_staining_cond2 form-control col-md-12 col-xs-12">
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($_POST['cross_staining_cond2'] == '1') ? 'selected' : '' ?> >)</option>
                <option value="2" <?php echo ($_POST['cross_staining_cond2'] == '2') ? 'selected' : '' ?> >]</option>
              </select>
            </div>
          </div>

          <!-- <br>

          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cf_artificial_light_c_change"> Color Fastness to Artificial Light Color Change 
            </label>

            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              <select id="cf_artificial_light_c_change_cond" name="cf_artificial_light_c_change_cond" onchange="cf_artificial_light_c_change_condition();" class="cf_artificial_light_c_change_cond select2 pp_number form-control col-md-12 col-xs-12">
                <option value="1" selected="selected" > &ge; </option>
                <option value="2" > &le; </option>
              </select> 
            </div> 

            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              <select id="cf_artificial_light_c_change_value" name="cf_artificial_light_c_change_value" onchange="cf_artificial_light_c_change_condition();" class="cf_artificial_light_c_change_value select2 pp_number form-control col-md-12 col-xs-12">
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
              <select id="cf_artificial_light_c_change_cond1" name="cf_artificial_light_c_change_cond1" onchange="cf_artificial_light_c_change_condition()" class="cf_artificial_light_c_change_cond1 form-control col-md-12 col-xs-12">
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($_POST['cf_artificial_light_c_change_cond1'] == '1') ? 'selected' : '' ?> >(</option>
                <option value="2" <?php echo ($_POST['cf_artificial_light_c_change_cond1'] == '2') ? 'selected' : '' ?> >[</option>
              </select>
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="cf_artificial_light_c_change_value1" name="cf_artificial_light_c_change_value1" value="<?php echo isset($_POST['cf_artificial_light_c_change_value1']) ? $_POST['cf_artificial_light_c_change_value1'] : "" ?>" class="cf_artificial_light_c_change_value1 form-control col-md-7 col-xs-12">
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              --
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="cf_artificial_light_c_change_value2" name="cf_artificial_light_c_change_value2" value="<?php echo isset($_POST['cf_artificial_light_c_change_value2']) ? $_POST['cf_artificial_light_c_change_value2'] : "" ?>" class="cf_artificial_light_c_change_value2 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="cf_artificial_light_c_change_cond2" name="cf_artificial_light_c_change_cond2" class="cf_artificial_light_c_change_cond2 form-control col-md-12 col-xs-12">
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($_POST['cf_artificial_light_c_change_cond2'] == '1') ? 'selected' : '' ?> >)</option>
                <option value="2" <?php echo ($_POST['cf_artificial_light_c_change_cond2'] == '2') ? 'selected' : '' ?> >]</option>
              </select>
            </div>
          </div> -->




          <br>

          <div class="form-group">

            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="water_absorption"> Water Absorption
            </label>

            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              <select id="water_absorption_cond" name="water_absorption_cond" onchange="water_absorption_condition();" class="water_absorption_cond select2 pp_number form-control col-md-12 col-xs-12">
                <option value="1" selected="selected" > &ge; </option>
                <option value="2" > &le; </option>
              </select> 
            </div> 

            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              <select id="water_absorption_value" name="water_absorption_value" onchange="water_absorption_condition();" class="water_absorption_value select2 pp_number form-control col-md-12 col-xs-12">
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
              <input type="hidden" class="form-control col-md-7 col-xs-12">
            </div>


            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              <select id="water_absorption_unit" name="water_absorption_unit" class="water_absorption_unit form-control col-md-12 col-xs-12">
                <option value="Sec" selected <?php echo ($_POST['water_absorption_unit'] == 'Sec') ? 'selected' : '' ?> >Sec</option>
                <option value="mm" <?php echo ($_POST['water_absorption_unit'] == 'mm') ? 'selected' : '' ?> >mm</option>
                <option value="%" <?php echo ($_POST['water_absorption_unit'] == '%') ? 'selected' : '' ?> >%</option>
              </select>
            </div>

            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="water_absorption_cond1" name="water_absorption_cond1" onchange="water_absorption_tol_condition()" class="water_absorption_cond1 form-control col-md-12 col-xs-12">
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($_POST['water_absorption_cond1'] == '1') ? 'selected' : '' ?> >(</option>
                <option value="2" <?php echo ($_POST['water_absorption_cond1'] == '2') ? 'selected' : '' ?> >[</option>
              </select>
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="water_absorption_value1" name="water_absorption_value1" value="<?php echo isset($_POST['water_absorption_value1']) ? $_POST['water_absorption_value1'] : "" ?>" class="water_absorption_value1 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              --
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="water_absorption_value2" name="water_absorption_value2" value="<?php echo isset($_POST['water_absorption_value2']) ? $_POST['water_absorption_value2'] : "" ?>" class="water_absorption_value2 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="water_absorption_cond2" name="water_absorption_cond2" class="water_absorption_cond2 form-control col-md-12 col-xs-12">
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($_POST['water_absorption_cond2'] == '1') ? 'selected' : '' ?> >)</option>
                <option value="2" <?php echo ($_POST['water_absorption_cond2'] == '2') ? 'selected' : '' ?> >]</option>
              </select>
            </div>
          </div>

          <br>

          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="spirality"> Spirality
            </label>

            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              <select id="spirality_cond" name="spirality_cond" onchange="spirality_condition();" class="spirality_cond select2 pp_number form-control col-md-12 col-xs-12">
                <option value="1" > &ge; </option>
                <option value="2" selected="selected" > &le; </option>
              </select> 
            </div> 

            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              <input type="text" id="spirality_value" name="spirality_value" oninput="spirality_condition();" value="<?php echo isset($_POST['spirality_value']) ? $_POST['spirality_value'] : "" ?>" class="spirality_value form-control col-md-7 col-xs-12">
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="hidden"   class="form-control col-md-7 col-xs-12">
            </div>


            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              % 
            </div>

            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="spirality_cond1" name="spirality_cond1" onchange="spirality_condition()" class="spirality_cond1 form-control col-md-12 col-xs-12">
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($_POST['spirality_cond1'] == '1') ? 'selected' : '' ?> >(</option>
                <option value="2" <?php echo ($_POST['spirality_cond1'] == '2') ? 'selected' : '' ?> >[</option>
              </select>
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="spirality_value1" name="spirality_value1" value="<?php echo isset($_POST['spirality_value1']) ? $_POST['spirality_value1'] : "" ?>" class="spirality_value1 form-control col-md-7 col-xs-12">
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              --
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="spirality_value2" name="spirality_value2" value="<?php echo isset($_POST['spirality_value2']) ? $_POST['spirality_value2'] : "" ?>" class="spirality_value2 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="spirality_cond2" name="spirality_cond2" class="spirality_cond2 form-control col-md-12 col-xs-12">
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($_POST['spirality_cond2'] == '1') ? 'selected' : '' ?> >)</option>
                <option value="2" <?php echo ($_POST['spirality_cond2'] == '2') ? 'selected' : '' ?> >]</option>
              </select>
            </div>
          </div>

          <br>


          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="durable_press"> Durable Press 
            </label>

            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              <select id="durable_press_cond" name="durable_press_cond" onchange="durable_press_condition();" class="durable_press_cond select2 pp_number form-control col-md-12 col-xs-12">
                <option value="1" selected="selected" > &ge; </option>
                <option value="2" > &le; </option>
              </select> 
            </div> 

            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              <select id="durable_press_value" name="durable_press_value" onchange="durable_press_condition();" class="durable_press_value select2 pp_number form-control col-md-12 col-xs-12">
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
              <select id="durable_press_cond1" name="durable_press_cond1" onchange="durable_press_condition()" class="durable_press_cond1 form-control col-md-12 col-xs-12">
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($_POST['durable_press_cond1'] == '1') ? 'selected' : '' ?> >(</option>
                <option value="2" <?php echo ($_POST['durable_press_cond1'] == '2') ? 'selected' : '' ?> >[</option>
              </select>
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="durable_press_value1" name="durable_press_value1" value="<?php echo isset($_POST['durable_press_value1']) ? $_POST['durable_press_value1'] : "" ?>" class="durable_press_value1 form-control col-md-7 col-xs-12">
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              --
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="durable_press_value2" name="durable_press_value2" value="<?php echo isset($_POST['durable_press_value2']) ? $_POST['durable_press_value2'] : "" ?>" class="durable_press_value2 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="durable_press_cond2" name="durable_press_cond2" class="durable_press_cond2 form-control col-md-12 col-xs-12">
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($_POST['durable_press_cond2'] == '1') ? 'selected' : '' ?> >)</option>
                <option value="2" <?php echo ($_POST['durable_press_cond2'] == '2') ? 'selected' : '' ?> >]</option>
              </select>
            </div>
          </div>

          <br>

          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ironability"> Ironability of Woven Fabric 
            </label>

            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              <select id="ironability_cond" name="ironability_cond" onchange="ironability_condition();" class="ironability_cond select2 pp_number form-control col-md-12 col-xs-12">
                <option value="1" selected="selected" > &ge; </option>
                <option value="2" > &le; </option>
              </select> 
            </div> 

            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              <select id="ironability_value" name="ironability_value" onchange="ironability_condition();" class="ironability_value select2 pp_number form-control col-md-12 col-xs-12">
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
              <select id="ironability_cond1" name="ironability_cond1" onchange="ironability_condition()" class="ironability_cond1 form-control col-md-12 col-xs-12">
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($_POST['ironability_cond1'] == '1') ? 'selected' : '' ?> >(</option>
                <option value="2" <?php echo ($_POST['ironability_cond1'] == '2') ? 'selected' : '' ?> >[</option>
              </select>
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="ironability_value1" name="ironability_value1" value="<?php echo isset($_POST['ironability_value1']) ? $_POST['ironability_value1'] : "" ?>" class="ironability_value1 form-control col-md-7 col-xs-12">
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              --
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="ironability_value2" name="ironability_value2" value="<?php echo isset($_POST['ironability_value2']) ? $_POST['ironability_value2'] : "" ?>" class="ironability_value2 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="ironability_cond2" name="ironability_cond2" class="ironability_cond2 form-control col-md-12 col-xs-12">
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($_POST['ironability_cond2'] == '1') ? 'selected' : '' ?> >)</option>
                <option value="2" <?php echo ($_POST['ironability_cond2'] == '2') ? 'selected' : '' ?> >]</option>
              </select>
            </div>
          </div>

          <br>


          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cf_artificial_light"> Color Fastness to Artificial Light 
            </label>

            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              <select id="cf_artificial_light_cond" name="cf_artificial_light_cond" onchange="cf_artificial_light_condition();" class="cf_artificial_light_cond select2 pp_number form-control col-md-12 col-xs-12">
                <option value="1" selected="selected" > &ge; </option>
                <option value="2" > &le; </option>
              </select> 
            </div> 

            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              <select id="cf_artificial_light_value" name="cf_artificial_light_value" onchange="cf_artificial_light_condition();" class="cf_artificial_light_value select2 pp_number form-control col-md-12 col-xs-12">
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
              <select id="cf_artificial_light_cond1" name="cf_artificial_light_cond1" onchange="cf_artificial_light_condition()" class="cf_artificial_light_cond1 form-control col-md-12 col-xs-12">
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($_POST['cf_artificial_light_cond1'] == '1') ? 'selected' : '' ?> >(</option>
                <option value="2" <?php echo ($_POST['cf_artificial_light_cond1'] == '2') ? 'selected' : '' ?> >[</option>
              </select>
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="cf_artificial_light_value1" name="cf_artificial_light_value1" value="<?php echo isset($_POST['cf_artificial_light_value1']) ? $_POST['cf_artificial_light_value1'] : "" ?>" class="cf_artificial_light_value1 form-control col-md-7 col-xs-12">
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              --
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="cf_artificial_light_value2" name="cf_artificial_light_value2" value="<?php echo isset($_POST['cf_artificial_light_value2']) ? $_POST['cf_artificial_light_value2'] : "" ?>" class="cf_artificial_light_value2 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="cf_artificial_light_cond2" name="cf_artificial_light_cond2" class="cf_artificial_light_cond2 form-control col-md-12 col-xs-12">
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($_POST['cf_artificial_light_cond2'] == '1') ? 'selected' : '' ?> >)</option>
                <option value="2" <?php echo ($_POST['cf_artificial_light_cond2'] == '2') ? 'selected' : '' ?> >]</option>
              </select>
            </div>
          </div>

          <br>


          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-6" for="moisture_content">Moisture Content (%)
            </label>

            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="moisture_content_cond1" name="moisture_content_cond1" onchange="moisture_content_condition()" class="cf_rubbing_wet_cond1 form-control col-md-12 col-xs-12">
                <option value="2" selected="selected" <?php echo ($_POST['moisture_content_cond1'] == '2') ? 'selected' : '' ?> >[</option>
                <option value="1" <?php echo ($_POST['moisture_content_cond1'] == '1') ? 'selected' : '' ?> >(</option>
              </select>
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="moisture_content_value1" name="moisture_content_value1" value="<?php echo isset($_POST['moisture_content_value1']) ? $_POST['moisture_content_value1'] : "" ?>" class="moisture_content_value1 form-control col-md-7 col-xs-12">
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              --
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="moisture_content_value2" name="moisture_content_value2" value="<?php echo isset($_POST['moisture_content_value2']) ? $_POST['moisture_content_value2'] : "" ?>" class="moisture_content_value2 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="moisture_content_cond2" name="moisture_content_cond2" class="moisture_content_cond2 form-control col-md-12 col-xs-12">
                <option value="2" selected="selected" <?php echo ($_POST['moisture_content_cond2'] == '2') ? 'selected' : '' ?> >]</option>
                <option value="1" <?php echo ($_POST['moisture_content_cond2'] == '1') ? 'selected' : '' ?> >)</option>
              </select>
            </div>

            <div class="col-md-4 col-sm-4 col-xs-6">
              
            </div>

          </div>

          <br>

          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-6" for="evaporation_rate">Evaporation Rate (%)
            </label>

            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="evaporation_rate_cond1" name="evaporation_rate_cond1" onchange="evaporation_rate_condition()" class="cf_rubbing_wet_cond1 form-control col-md-12 col-xs-12">
                <option value="2" selected="selected" <?php echo ($_POST['evaporation_rate_cond1'] == '2') ? 'selected' : '' ?> >[</option>
                <option value="1" <?php echo ($_POST['evaporation_rate_cond1'] == '1') ? 'selected' : '' ?> >(</option>
              </select>
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="evaporation_rate_value1" name="evaporation_rate_value1" value="<?php echo isset($_POST['evaporation_rate_value1']) ? $_POST['evaporation_rate_value1'] : "" ?>" class="evaporation_rate_value1 form-control col-md-7 col-xs-12">
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              --
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="evaporation_rate_value2" name="evaporation_rate_value2" value="<?php echo isset($_POST['evaporation_rate_value2']) ? $_POST['evaporation_rate_value2'] : "" ?>" class="evaporation_rate_value2 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="evaporation_rate_cond2" name="evaporation_rate_cond2" class="evaporation_rate_cond2 form-control col-md-12 col-xs-12">
                <option value="2" selected="selected" <?php echo ($_POST['evaporation_rate_cond2'] == '2') ? 'selected' : '' ?> >]</option>
                <option value="1" <?php echo ($_POST['evaporation_rate_cond2'] == '1') ? 'selected' : '' ?> >)</option>
              </select>
            </div>

            <div class="col-md-4 col-sm-4 col-xs-6">
              
            </div>

          </div>

          <br>  









    
         <!--  <input type="hidden" id="update" name="update" value="2" > -->

          <br>

          <?php $fiber_content_select = $_POST["fiber_content_select"]; ?>

          <input type="hidden" id="fiber_content_select" name="fiber_content_select" value="<?php echo $fiber_content_select; ?>" >

          <div class="form-check form-check-inline text-center">
            <input class="form-check-input" type="radio" name="fiber_content" id="fiber_total" value="fiber_total" <?php if($fiber_content_select == '1') echo "checked"; ?> onclick="select_fiber_content(this.value)">
            <label class="form-check-label" for="fiber_total">Fiber Total</label>
          
            <input class="form-check-input" type="radio" name="fiber_content" id="fiber_warp_weft" value="fiber_warp_weft" <?php if($fiber_content_select == '2') echo "checked"; ?> onclick="select_fiber_content(this.value)">
            <label class="form-check-label" for="fiber_warp_weft">Fiber Warp & Weft</label>
          
            <input class="form-check-input" type="radio" name="fiber_content" checked id="fiber_both" value="fiber_both" <?php if($fiber_content_select == '3') echo "checked"; ?> onclick="select_fiber_content(this.value)">
            <label class="form-check-label" for="fiber_both">Both</label>
          </div>
          
          <br>

          <div id="fiber_content_selected">
            
          </div>


          <br>


          <input type="hidden" id="update" name="update" value="2" >

          <?php $seam_slipage_resistance = $_POST["seam_slipage_resistance"]; ?>

          <input type="hidden" id="seam_slipage_resistance" name="seam_slipage_resistance" value="<?php echo $seam_slipage_resistance; ?>" >

          <div class="form-check form-check-inline text-center">
            <input class="form-check-input" type="radio" name="seam_slipage_resistance_selection" id="seam_slipage_resistance_selection_method_1"  value="seam_slipage_resistance_selection_method_1" <?php if($seam_slipage_resistance == '1') echo "checked"; ?> onclick="select_seam_slipage_resistance(this.value)">
            <label class="form-check-label" for="seam_slipage_resistance_selection_method_1">Seam Slipage Resistance ISO 13936-1</label>
          
            <input class="form-check-input" type="radio" name="seam_slipage_resistance_selection" id="seam_slipage_resistance_selection_method_2" checked value="seam_slipage_resistance_selection_method_2" <?php if($seam_slipage_resistance == '2') echo "checked"; ?> onclick="select_seam_slipage_resistance(this.value)">
            <label class="form-check-label" for="seam_slipage_resistance_selection_method_2">Seam Slipage Resistance ISO 13936-2</label>
          </div>
          
          <br>

          <div id="seam_slipage_resistance_content_selected">
            
          </div>

          <br>

          <div class="ln_solid"></div>
          <div class="form-group">
            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
              <input type="hidden" id="pp_id_number" name="pp_id_number" value="<?php echo $pp_no_id; ?>">
              <input type="hidden" id="pp_details_id" name="pp_details_id" value="<?php echo $pp_version; ?>">
              <button type="button" name="submit" id="submit" class="btn btn-success" onclick="send_data_of_define_standard_of_finishing_form_to_database('<?php echo $pp_version; ?>');">Submit</button>
              <button type="reset" name="reset" id="reset" class="btn btn-info">Reset</button>
            </div>
          </div>

        </form>
      </div>
    </div>                            
    <!-- finished add greige standard of single pp number -->
    
  </div>
</div>
<!-- main content again finished -->
<?php
?>


<script type="text/javascript">

  var fiber_content_select = document.getElementById("fiber_content_select").value;
    var seam_slipage_resistance = document.getElementById("seam_slipage_resistance").value;

    if ( (seam_slipage_resistance != "") || (seam_slipage_resistance != null)  ) 
    {
        select_seam_slipage_resistance(seam_slipage_resistance);
    }

    function select_seam_slipage_resistance(seam_slipage_resistance_method)
    {
        if (seam_slipage_resistance_method == "seam_slipage_resistance_selection_method_1")
        {
            var total_content = "";

                total_content += '<div class="form-group">'
                                    +'<input type="hidden" id="seam_slipage_resistance_for_number" name="seam_slipage_resistance_for_number" value="1" >'
                                  +'<label class="control-label col-md-3 col-sm-3 col-xs-12" for=""> Seam Slipage Resistance Warp(N)'
                                  +'</label>'

                                  +'<div class="col-md-1 col-sm-1 col-xs-2" style="text-align: center;">'
                                    +'<select id="seam_resistance_method1_warp_cond" name="seam_resistance_method1_warp_cond" onchange="seam_resistance_method1_warp_condition();" class="seam_resistance_method1_warp_cond select2 pp_number form-control col-md-12 col-xs-12">'
                                      +'<option value="1" selected="selected" > &ge; </option>'
                                      +'<option value="2" > &le; </option>'
                                    +'</select>'
                                  +'</div>'

                                  +'<div class="col-md-1 col-sm-1 col-xs-2" style="text-align: center;">'
                                    +'<input type="text" id="seam_resistance_method1_warp_value" name="seam_resistance_method1_warp_value" oninput="seam_resistance_method1_warp_condition();" class="seam_resistance_method1_warp_value form-control col-md-7 col-xs-12">'
                                  +'</div>'
                                  +'<div class="col-md-1 col-sm-1 col-xs-2">'
                                    +'<input type="hidden" class="form-control col-md-7 col-xs-12">'
                                  +'</div>'

                                  // +'<div class="col-md-1 col-sm-1 col-xs-2" style="text-align: center;">'
                                  //  +'=' 
                                  // +'</div>'

                                  +'<div class="col-md-1 col-sm-1 col-xs-2" style="text-align: center;">'
                                    +'<select id="seam_resistance_method1_warp_unit" name="seam_resistance_method1_warp_unit" class="seam_resistance_method1_warp_unit form-control col-md-12 col-xs-12">'
                                      +'<option value="N" selected <?php echo ($_POST["seam_resistance_method1_warp_unit"] == "N") ? "selected" : "" ?> >N</option>'
                                      +'<option value="kg" <?php echo ($_POST["seam_resistance_method1_warp_unit"] == "kg") ? "selected" : "" ?> >kg</option>'
                                      +'<option value="lbf" <?php echo ($_POST["seam_resistance_method1_warp_unit"] == "lbf") ? "selected" : "" ?> >lbf</option>'
                                      +'<option value="gm" <?php echo ($_POST["seam_resistance_method1_warp_unit"] == "gm") ? "selected" : "" ?> >gm</option>'
                                      +'<option value="daN" <?php echo ($_POST["seam_resistance_method1_warp_unit"] == "daN") ? "selected" : "" ?> >daN</option>'
                                      +'<option value="oz" <?php echo ($_POST["seam_resistance_method1_warp_unit"] == "oz") ? "selected" : "" ?> >oz</option>'
                                    +'</select>'
                                  +'</div>'

                                  +'<div class="col-md-1 col-sm-1 col-xs-2">'
                                    +'<select id="seam_resistance_method1_warp_cond1" name="seam_resistance_method1_warp_cond1" onchange="seam_resistance_method1_warp_condition()" class="seam_resistance_method1_warp_cond1 form-control col-md-12 col-xs-12">'
                                      +'<option value="" selected="selected">Select Condition</option>'
                                      +'<option value="1" <?php echo ($_POST["seam_resistance_method1_warp_cond1"] == "1") ? "selected" : "" ?> >(</option>'
                                      +'<option value="2" <?php echo ($_POST["seam_resistance_method1_warp_cond1"] == "2") ? "selected" : "" ?> >[</option>'
                                    +'</select>'
                                  +'</div>'
                                  +'<div class="col-md-1 col-sm-1 col-xs-2">'
                                    +'<input type="text" id="seam_resistance_method1_warp_value1" name="seam_resistance_method1_warp_value1" value="<?php echo isset($_POST["seam_resistance_method1_warp_value1"]) ? $_POST["seam_resistance_method1_warp_value1"] : "" ?>" class="seam_resistance_method1_warp_value1 form-control col-md-7 col-xs-12">'
                                  +'</div>'
                                  +'<div class="col-md-1 col-sm-1 col-xs-2" style="text-align: center;">'
                                    +'--'
                                  +'</div>' 
                                  +'<div class="col-md-1 col-sm-1 col-xs-2">'
                                    +'<input type="text" id="seam_resistance_method1_warp_value2" name="seam_resistance_method1_warp_value2" value="<?php echo isset($_POST["seam_resistance_method1_warp_value2"]) ? $_POST["seam_resistance_method1_warp_value2"] : "" ?>" class="seam_resistance_method1_warp_value2 form-control col-md-7 col-xs-12">'
                                  +'</div>'
                                  +'<div class="col-md-1 col-sm-1 col-xs-2">'
                                    +'<select id="seam_resistance_method1_warp_cond2" name="seam_resistance_method1_warp_cond2" class="seam_resistance_method1_warp_cond2 form-control col-md-12 col-xs-12">'
                                      +'<option value="" selected="selected">Select Condition</option>'
                                      +'<option value="1" <?php echo ($_POST["seam_resistance_method1_warp_cond2"] == "1") ? "selected" : "" ?> >)</option>'
                                      +'<option value="2" <?php echo ($_POST["seam_resistance_method1_warp_cond2"] == "2") ? "selected" : "" ?> >]</option>'
                                    +'</select>'
                                  +'</div>'
                                +'</div>'

                                +'<div class="form-group">'

                                  +'<label class="control-label col-md-3 col-sm-3 col-xs-12" for=""> Seam Slipage Resistance Weft(N)'
                                  +'</label>'

                                  +'<div class="col-md-1 col-sm-1 col-xs-2" style="text-align: center;">'
                                    +'<select id="seam_resistance_method1_weft_cond" name="seam_resistance_method1_weft_cond" onchange="seam_resistance_method1_weft_condition();" class="seam_resistance_method1_weft_cond select2 pp_number form-control col-md-12 col-xs-12">'
                                      +'<option value="1" selected="selected" > &ge; </option>'
                                      +'<option value="2" > &le; </option>'
                                    +'</select>'
                                  +'</div>' 

                                  +'<div class="col-md-1 col-sm-1 col-xs-2" style="text-align: center;"">'
                                    +'<input type="text" id="seam_resistance_method1_weft_value" name="seam_resistance_method1_weft_value" oninput="seam_resistance_method1_weft_condition();" class="seam_resistance_method1_weft_value form-control col-md-7 col-xs-12">'
                                  +'</div>'
                                  +'<div class="col-md-1 col-sm-1 col-xs-2">'
                                    +'<input type="hidden" class="form-control col-md-7 col-xs-12">'
                                  +'</div>'

                                  +'<div class="col-md-1 col-sm-1 col-xs-2" style="text-align: center;">'
                                    +'<select id="seam_resistance_method1_weft_unit" name="seam_resistance_method1_weft_unit" class="seam_resistance_method1_weft_unit form-control col-md-12 col-xs-12">'
                                      +'<option value="N" selected <?php echo ($_POST["seam_resistance_method1_weft_unit"] == "N") ? "selected" : "" ?> >N</option>'
                                      +'<option value="kg" <?php echo ($_POST["seam_resistance_method1_weft_unit"] == "kg") ? "selected" : "" ?> >kg</option>'
                                      +'<option value="lbf" <?php echo ($_POST["seam_resistance_method1_weft_unit"] == "lbf") ? "selected" : "" ?> >lbf</option>'
                                      +'<option value="gm" <?php echo ($_POST["seam_resistance_method1_weft_unit"] == "gm") ? "selected" : "" ?> >gm</option>'
                                      +'<option value="daN" <?php echo ($_POST["seam_resistance_method1_weft_unit"] == "daN") ? "selected" : "" ?> >daN</option>'
                                      +'<option value="oz" <?php echo ($_POST["seam_resistance_method1_weft_unit"] == "oz") ? "selected" : "" ?> >oz</option>'
                                    +'</select>'
                                  +'</div>'

                                  +'<div class="col-md-1 col-sm-1 col-xs-2">'
                                    +'<select id="seam_resistance_method1_weft_cond1" name="seam_resistance_method1_weft_cond1" onchange="seam_resistance_method1_weft_condition()" class="seam_resistance_method1_weft_cond1 form-control col-md-12 col-xs-12">'
                                      +'<option value="" selected="selected">Select Condition</option>'
                                      +'<option value="1" <?php echo ($_POST["seam_resistance_method1_weft_cond1"] == "1") ? "selected" : "" ?> >(</option>'
                                      +'<option value="2" <?php echo ($_POST["seam_resistance_method1_weft_cond1"] == "2") ? "selected" : "" ?> >[</option>'
                                    +'</select>'
                                  +'</div>'
                                  +'<div class="col-md-1 col-sm-1 col-xs-2">'
                                    +'<input type="text" id="seam_resistance_method1_weft_value1" name="seam_resistance_method1_weft_value1" value="<?php echo isset($_POST["seam_resistance_method1_weft_value1"]) ? $_POST["seam_resistance_method1_weft_value1"] : "" ?>" class="seam_resistance_method1_weft_value1 form-control col-md-7 col-xs-12">'
                                  +'</div>'
                                  +'<div class="col-md-1 col-sm-1 col-xs-2" style="text-align: center;">'
                                    +'--'
                                  +'</div>'
                                  +'<div class="col-md-1 col-sm-1 col-xs-2">'
                                    +'<input type="text" id="seam_resistance_method1_weft_value2" name="seam_resistance_method1_weft_value2" value="<?php echo isset($_POST["seam_resistance_method1_weft_value2"]) ? $_POST["seam_resistance_method1_weft_value2"] : "" ?>" class="seam_resistance_method1_weft_value2 form-control col-md-7 col-xs-12">'
                                  +'</div>'
                                  +'<div class="col-md-1 col-sm-1 col-xs-2">'
                                    +'<select id="seam_resistance_method1_weft_cond2" name="seam_resistance_method1_weft_cond2" class="seam_resistance_method1_weft_cond2 form-control col-md-12 col-xs-12">'
                                      +'<option value="" selected="selected">Select Condition</option>'
                                      +'<option value="1" <?php echo ($_POST["seam_resistance_method1_weft_cond2"] == "1") ? "selected" : "" ?> >)</option>'
                                     +'<option value="2" <?php echo ($_POST["seam_resistance_method1_weft_cond2"] == "2") ? "selected" : "" ?> >]</option>'
                                    +'</select>'
                                  +'</div>'
                                +'</div>';

            $('#seam_slipage_resistance_content_selected').html(total_content);
        }

        else
        {
            var total_content = "";

            total_content += '<div class="form-group">'
                                  +'<input type="hidden" id="seam_slipage_resistance_for_number" name="seam_slipage_resistance_for_number" value="2" >'
                                  +'<label class="control-label col-md-3 col-sm-3 col-xs-12" for="seam_resistance_method2_warp"> Seam Slipage Resistance Warp (mm)'
                                  +'</label>'

                                  +'<div class="col-md-1 col-sm-1 col-xs-2" style="text-align: center;">'
                                    +'<select id="seam_resistance_method2_warp_cond" name="seam_resistance_method2_warp_cond" onchange="seam_resistance_method2_warp_condition();" class="seam_resistance_method2_warp_cond select2 pp_number form-control col-md-12 col-xs-12">'
                                      +'<option value="1" selected="selected" > &ge; </option>'
                                      +'<option value="2" > &le; </option>'
                                    +'</select>'
                                  +'</div>'

                                  +'<div class="col-md-1 col-sm-1 col-xs-2" style="text-align: center;">'
                                    +'<input type="text" id="seam_resistance_method2_warp_value" name="seam_resistance_method2_warp_value" oninput="seam_resistance_method2_warp_condition();" class="seam_resistance_method2_warp_value form-control col-md-7 col-xs-12">'
                                  +'</div>'
                                  +'<div class="col-md-1 col-sm-1 col-xs-2">'
                                    +'<input type="hidden" class="form-control col-md-7 col-xs-12">'
                                  +'</div>'

                                  +'<div class="col-md-1 col-sm-1 col-xs-2" style="text-align: center;">'
                                    +'<select id="seam_resistance_method2_warp_unit" name="seam_resistance_method2_warp_unit" class="seam_resistance_method2_warp_unit form-control col-md-12 col-xs-12">'
                                      +'<option value="N" selected <?php echo ($_POST["seam_resistance_method2_warp_unit"] == "N") ? "selected" : "" ?> >N</option>'
                                      +'<option value="kg" <?php echo ($_POST["seam_resistance_method2_warp_unit"] == "kg") ? "selected" : "" ?> >kg</option>'
                                      +'<option value="lbf" <?php echo ($_POST["seam_resistance_method2_warp_unit"] == "lbf") ? "selected" : "" ?> >lbf</option>'
                                      +'<option value="gm" <?php echo ($_POST["seam_resistance_method2_warp_unit"] == "gm") ? "selected" : "" ?> >gm</option>'
                                      +'<option value="daN" <?php echo ($_POST["seam_resistance_method2_warp_unit"] == "daN") ? "selected" : "" ?> >daN</option>'
                                      +'<option value="oz" <?php echo ($_POST["seam_resistance_method2_warp_unit"] == "oz") ? "selected" : "" ?> >oz</option>'
                                    +'</select>'
                                  +'</div>'

                                  +'<div class="col-md-1 col-sm-1 col-xs-2">'
                                    +'<select id="seam_resistance_method2_warp_cond1" name="seam_resistance_method2_warp_cond1" onchange="seam_resistance_method2_warp_condition()" class="seam_resistance_method2_warp_cond1 form-control col-md-12 col-xs-12">'
                                      +'<option value="" selected="selected">Select Condition</option>'
                                      +'<option value="1" <?php echo ($_POST["seam_resistance_method2_warp_cond1"] == "1") ? "selected" : "" ?> >(</option>'
                                      +'<option value="2" <?php echo ($_POST["seam_resistance_method2_warp_cond1"] == "2") ? "selected" : "" ?> >[</option>'
                                    +'</select>'
                                  +'</div>'
                                  +'<div class="col-md-1 col-sm-1 col-xs-2">'
                                    +'<input type="text" id="seam_resistance_method2_warp_value1" name="seam_resistance_method2_warp_value1" value="<?php echo isset($_POST["seam_resistance_method2_warp_value1"]) ? $_POST["seam_resistance_method2_warp_value1"] : "" ?>" class="seam_resistance_method2_warp_value1 form-control col-md-7 col-xs-12">'
                                  +'</div>'
                                  +'<div class="col-md-1 col-sm-1 col-xs-2" style="text-align: center;">'
                                    +'--'
                                  +'</div>' 
                                  +'<div class="col-md-1 col-sm-1 col-xs-2">'
                                    +'<input type="text" id="seam_resistance_method2_warp_value2" name="seam_resistance_method2_warp_value2" value="<?php echo isset($_POST["seam_resistance_method2_warp_value2"]) ? $_POST["seam_resistance_method2_warp_value2"] : "" ?>" class="seam_resistance_method2_warp_value2 form-control col-md-7 col-xs-12">'
                                  +'</div>'
                                  +'<div class="col-md-1 col-sm-1 col-xs-2">'
                                    +'<select id="seam_resistance_method2_warp_cond2" name="seam_resistance_method2_warp_cond2" class="seam_resistance_method2_warp_cond2 form-control col-md-12 col-xs-12">'
                                      +'<option value="" selected="selected">Select Condition</option>'
                                      +'<option value="1" <?php echo ($_POST["seam_resistance_method2_warp_cond2"] == "1") ? "selected" : "" ?> >)</option>'
                                      +'<option value="2" <?php echo ($_POST["seam_resistance_method2_warp_cond2"] == "2") ? "selected" : "" ?> >]</option>'
                                    +'</select>'
                                  +'</div>'
                                +'</div>'

                                +'<div class="form-group">'

                                  +'<label class="control-label col-md-3 col-sm-3 col-xs-12" for="seam_resistance_method2_weft"> Seam Slipage Resistance Weft (mm)'
                                  +'</label>'

                                  +'<div class="col-md-1 col-sm-1 col-xs-2" style="text-align: center;">'
                                    +'<select id="seam_resistance_method2_weft_cond" name="seam_resistance_method2_weft_cond" onchange="seam_resistance_method2_weft_condition();" class="seam_resistance_method2_weft_cond select2 pp_number form-control col-md-12 col-xs-12">'
                                      +'<option value="1" selected="selected" > &ge; </option>'
                                      +'<option value="2" > &le; </option>'
                                    +'</select>'
                                  +'</div>' 

                                  +'<div class="col-md-1 col-sm-1 col-xs-2" style="text-align: center;"">'
                                    +'<input type="text" id="seam_resistance_method2_weft_value" name="seam_resistance_method2_weft_value" oninput="seam_resistance_method2_weft_condition();" class="seam_resistance_method2_weft_value form-control col-md-7 col-xs-12">'
                                  +'</div>'
                                  +'<div class="col-md-1 col-sm-1 col-xs-2">'
                                    +'<input type="hidden" class="form-control col-md-7 col-xs-12">'
                                  +'</div>'

                                  +'<div class="col-md-1 col-sm-1 col-xs-2" style="text-align: center;">'
                                    +'<select id="seam_resistance_method2_weft_unit" name="seam_resistance_method2_weft_unit" class="seam_resistance_method2_weft_unit form-control col-md-12 col-xs-12">'
                                      +'<option value="N" selected <?php echo ($_POST["seam_resistance_method2_weft_unit"] == "N") ? "selected" : "" ?> >N</option>'
                                      +'<option value="kg" <?php echo ($_POST["seam_resistance_method2_weft_unit"] == "kg") ? "selected" : "" ?> >kg</option>'
                                      +'<option value="lbf" <?php echo ($_POST["seam_resistance_method2_weft_unit"] == "lbf") ? "selected" : "" ?> >lbf</option>'
                                      +'<option value="gm" <?php echo ($_POST["seam_resistance_method2_weft_unit"] == "gm") ? "selected" : "" ?> >gm</option>'
                                      +'<option value="daN" <?php echo ($_POST["seam_resistance_method2_weft_unit"] == "daN") ? "selected" : "" ?> >daN</option>'
                                      +'<option value="oz" <?php echo ($_POST["seam_resistance_method2_weft_unit"] == "oz") ? "selected" : "" ?> >oz</option>'
                                    +'</select>'
                                  +'</div>'

                                  +'<div class="col-md-1 col-sm-1 col-xs-2">'
                                    +'<select id="seam_resistance_method2_weft_cond1" name="seam_resistance_method2_weft_cond1" onchange="seam_resistance_method2_weft_condition()" class="seam_resistance_method2_weft_cond1 form-control col-md-12 col-xs-12">'
                                      +'<option value="" selected="selected">Select Condition</option>'
                                      +'<option value="1" <?php echo ($_POST["seam_resistance_method2_weft_cond1"] == "1") ? "selected" : "" ?> >(</option>'
                                      +'<option value="2" <?php echo ($_POST["seam_resistance_method2_weft_cond1"] == "2") ? "selected" : "" ?> >[</option>'
                                    +'</select>'
                                  +'</div>'
                                  +'<div class="col-md-1 col-sm-1 col-xs-2">'
                                    +'<input type="text" id="seam_resistance_method2_weft_value1" name="seam_resistance_method2_weft_value1" value="<?php echo isset($_POST["seam_resistance_method2_weft_value1"]) ? $_POST["seam_resistance_method2_weft_value1"] : "" ?>" class="seam_resistance_method2_weft_value1 form-control col-md-7 col-xs-12">'
                                  +'</div>'
                                  +'<div class="col-md-1 col-sm-1 col-xs-2" style="text-align: center;">'
                                    +'--'
                                  +'</div>'
                                  +'<div class="col-md-1 col-sm-1 col-xs-2">'
                                    +'<input type="text" id="seam_resistance_method2_weft_value2" name="seam_resistance_method2_weft_value2" value="<?php echo isset($_POST["seam_resistance_method2_weft_value2"]) ? $_POST["seam_resistance_method2_weft_value2"] : "" ?>" class="seam_resistance_method2_weft_value2 form-control col-md-7 col-xs-12">'
                                  +'</div>'
                                  +'<div class="col-md-1 col-sm-1 col-xs-2">'
                                    +'<select id="seam_resistance_method2_weft_cond2" name="seam_resistance_method2_weft_cond2" class="seam_resistance_method2_weft_cond2 form-control col-md-12 col-xs-12">'
                                      +'<option value="" selected="selected">Select Condition</option>'
                                      +'<option value="1" <?php echo ($_POST["seam_resistance_method2_weft_cond2"] == "1") ? "selected" : "" ?> >)</option>'
                                     +'<option value="2" <?php echo ($_POST["seam_resistance_method2_weft_cond2"] == "2") ? "selected" : "" ?> >]</option>'
                                    +'</select>'
                                  +'</div>'
                                +'</div>';

            $('#seam_slipage_resistance_content_selected').html(total_content);
        }
    }


    if ( (fiber_content_select != "") || (fiber_content_select != null)  ) 
    {
        select_fiber_content(fiber_content_select);
    }

    function select_fiber_content(select_fiber_content)
    {
        if (select_fiber_content == "fiber_total")
        {
            var total_content = "";

                total_content += '<div class="form-group">'
                +'<input type="hidden" id="fiber_content_selected_for_number" name="fiber_content_selected_for_number" value="1" >'
                +'<label class="control-label col-md-3 col-sm-3 col-xs-12" for="fiber_total">Total Fiber Content'
                +'</label>'
                +'<!-- start polyster -->'
                +'<div class="col-md-1 col-sm-1 col-xs-2">'
                  +'<input type="text" id="fiber_total_name_polyester" name="fiber_total_name_polyester" value="polyester" readonly class="fiber_total_name_polyester form-control col-md-7 col-xs-12">'
                +'</div>'

                +'<div class="col-md-1 col-sm-1 col-xs-2">'
                  +'<input type="text" id="fiber_total_polyester_tol_value1" name="fiber_total_polyester_tol_value1" oninput="fiber_total_polyester_tol_cal_1();" class="fiber_total_polyester_tol_value1 form-control col-md-7 col-xs-12">'
                +'</div>'

                +'<div class="col-md-1 col-sm-1 col-xs-2" style="text-align: center;">'
                  +'<select id="fiber_total_polyester_tol_cond" name="fiber_total_polyester_tol_cond" onchange="fiber_total_polyester_tol_condition();" class="fiber_total_polyester_tol_cond select2 pp_number form-control col-md-12 col-xs-12">'
                    +'<option value="1" selected="selected" > &plusmn; </option>'
                    +'<option value="2" > + </option>'
                    +'<option value="3" > - </option>'
                  +'</select> '
                +'</div> '

                +'<div class="col-md-1 col-sm-1 col-xs-2" style="text-align: center;">'
                  +'<input type="text" id="fiber_total_polyester_tol_value2" name="fiber_total_polyester_tol_value2" oninput="fiber_total_polyester_tol_cal_2();" class="fiber_total_polyester_tol_value2 form-control col-md-7 col-xs-12">'
                +'</div>'

                +'<div class="col-md-1 col-sm-1 col-xs-2">'
                  +'<select id="fiber_total_polyester_cond1" name="fiber_total_polyester_cond1" onchange="fiber_total_polyester_condition()" class="fiber_total_polyester_cond1 form-control col-md-12 col-xs-12">'
                    +'<option value="" selected="selected">Select Condition</option>'
                    +'<option value="1" <?php echo ($_POST["fiber_total_polyester_cond1"] == "1") ? "selected" : "" ?> >(</option>'
                    +'<option value="2" <?php echo ($_POST["fiber_total_polyester_cond1"] == "2") ? "selected" : "" ?> >[</option>'
                  +'</select>'
                +'</div>'
                +'<div class="col-md-1 col-sm-1 col-xs-2">'
                  +'<input type="text" id="fiber_total_polyester_value1" name="fiber_total_polyester_value1" value="<?php echo isset($_POST["fiber_total_polyester_value1"]) ? $_POST["fiber_total_polyester_value1"] : "" ?>" class="fiber_total_polyester_value1 form-control col-md-7 col-xs-12">'
                +'</div>'
                +'<div class="col-md-1 col-sm-1 col-xs-2" style="text-align: center;">'
                  +'--'
                +'</div>'
                +'<div class="col-md-1 col-sm-1 col-xs-2">'
                  +'<input type="text" id="fiber_total_polyester_value2" name="fiber_total_polyester_value2" value="<?php echo isset($_POST["fiber_total_polyester_value2"]) ? $_POST["fiber_total_polyester_value2"] : "" ?>" class="fiber_total_polyester_value2 form-control col-md-7 col-xs-12">'
                +'</div>'
                +'<div class="col-md-1 col-sm-1 col-xs-2">'
                  +'<select id="fiber_total_polyester_cond2" name="fiber_total_polyester_cond2" class="fiber_total_polyester_cond2 form-control col-md-12 col-xs-12">'
                    +'<option value="" selected="selected">Select Condition</option>'
                    +'<option value="1" <?php echo ($_POST["fiber_total_polyester_cond2"] == "1") ? "selected" : "" ?> >)</option>'
                    +'<option value="2" <?php echo ($_POST["fiber_total_polyester_cond2"] == "2") ? "selected" : "" ?> >]</option>'
                  +'</select>'
                +'</div>'

                +'<!-- start cotton -->'
                +'<label class="control-label col-md-3 col-sm-3 col-xs-12" for="fiber_weft">'
                +'</label>'
                +'<div class="col-md-1 col-sm-1 col-xs-2">'
                  +'<input type="text" id="fiber_total_name_cotton" name="fiber_total_name_cotton" value="cotton" readonly class="fiber_total_name_cotton form-control col-md-7 col-xs-12">'
                +'</div>'

                +'<div class="col-md-1 col-sm-1 col-xs-2">'
                  +'<input type="text" id="fiber_total_cotton_tol_value1" name="fiber_total_cotton_tol_value1" oninput="fiber_total_cotton_tol_cal_1();" class="fiber_total_cotton_tol_value1 form-control col-md-7 col-xs-12">'
                +'</div>'

                +'<div class="col-md-1 col-sm-1 col-xs-2" style="text-align: center;">'
                  +'<select id="fiber_total_cotton_tol_cond" name="fiber_total_cotton_tol_cond" onchange="fiber_total_cotton_tol_condition();" class="fiber_total_cotton_tol_cond select2 pp_number form-control col-md-12 col-xs-12">'
                    +'<option value="1" selected="selected" > &plusmn; </option>'
                    +'<option value="2" > + </option>'
                    +'<option value="3" > - </option>'
                  +'</select> '
                +'</div> '

                +'<div class="col-md-1 col-sm-1 col-xs-2" style="text-align: center;">'
                  +'<input type="text" id="fiber_total_cotton_tol_value2" name="fiber_total_cotton_tol_value2" oninput="fiber_total_cotton_tol_cal_2();" class="fiber_total_cotton_tol_value2 form-control col-md-7 col-xs-12">'
                +'</div>'

                +'<div class="col-md-1 col-sm-1 col-xs-2">'
                  +'<select id="fiber_total_cotton_cond1" name="fiber_total_cotton_cond1" onchange="fiber_total_cotton_condition()" class="fiber_total_cotton_cond1 form-control col-md-12 col-xs-12">'
                    +'<option value="" selected="selected">Select Condition</option>'
                    +'<option value="1" <?php echo ($_POST["fiber_total_cotton_cond1"] == "1") ? "selected" : "" ?> >(</option>'
                    +'<option value="2" <?php echo ($_POST["fiber_total_cotton_cond1"] == "2") ? "selected" : "" ?> >[</option>'
                  +'</select>'
                +'</div>'
                +'<div class="col-md-1 col-sm-1 col-xs-2">'
                  +'<input type="text" id="fiber_total_cotton_value1" name="fiber_total_cotton_value1" value="<?php echo isset($_POST["fiber_total_cotton_value1"]) ? $_POST["fiber_total_cotton_value1"] : "" ?>" class="fiber_total_cotton_value1 form-control col-md-7 col-xs-12">'
                +'</div>'
                +'<div class="col-md-1 col-sm-1 col-xs-2" style="text-align: center;">'
                  +'--'
                +'</div>'
                +'<div class="col-md-1 col-sm-1 col-xs-2">'
                  +'<input type="text" id="fiber_total_cotton_value2" name="fiber_total_cotton_value2" value="<?php echo isset($_POST["fiber_total_cotton_value2"]) ? $_POST["fiber_total_cotton_value2"] : "" ?>" class="fiber_total_cotton_value2 form-control col-md-7 col-xs-12">'
                +'</div>'
                +'<div class="col-md-1 col-sm-1 col-xs-2">'
                  +'<select id="fiber_total_cotton_cond2" name="fiber_total_cotton_cond2" class="fiber_total_cotton_cond2 form-control col-md-12 col-xs-12">'
                    +'<option value="" selected="selected">Select Condition</option>'
                    +'<option value="1" <?php echo ($_POST["fiber_total_cotton_cond2"] == "1") ? "selected" : "" ?> >)</option>'
                    +'<option value="2" <?php echo ($_POST["fiber_total_cotton_cond2"] == "2") ? "selected" : "" ?> >]</option>'
                  +'</select>'
                +'</div>'

                +'<!-- start thired option -->'
                +'<label class="control-label col-md-3 col-sm-3 col-xs-12" for="fiber_total">'
                +'</label>'
                +'<div class="col-md-1 col-sm-1 col-xs-2">'
                  +'<input type="text" id="fiber_total_name_thired" name="fiber_total_name_thired" value="" class="fiber_total_name_thired form-control col-md-7 col-xs-12">'
                +'</div>'

                +'<div class="col-md-1 col-sm-1 col-xs-2">'
                  +'<input type="text" id="fiber_total_thired_tol_value1" name="fiber_total_thired_tol_value1" oninput="fiber_total_thired_tol_cal_1();" class="fiber_total_thired_tol_value1 form-control col-md-7 col-xs-12">'
                +'</div>'

                +'<div class="col-md-1 col-sm-1 col-xs-2" style="text-align: center;">'
                  +'<select id="fiber_total_thired_tol_cond" name="fiber_total_thired_tol_cond" onchange="fiber_total_thired_tol_condition();" class="fiber_total_thired_tol_cond select2 pp_number form-control col-md-12 col-xs-12">'
                    +'<option value="1" selected="selected" > &plusmn; </option>'
                    +'<option value="2" > + </option>'
                    +'<option value="3" > - </option>'
                  +'</select>'
                +'</div>'

                +'<div class="col-md-1 col-sm-1 col-xs-2" style="text-align: center;">'
                  +'<input type="text" id="fiber_total_thired_tol_value2" name="fiber_total_thired_tol_value2" oninput="fiber_total_thired_tol_cal_2();" class="fiber_total_thired_tol_value2 form-control col-md-7 col-xs-12">'
                +'</div>'

                +'<div class="col-md-1 col-sm-1 col-xs-2">'
                  +'<select id="fiber_total_thired_cond1" name="fiber_total_thired_cond1" onchange="fiber_total_thired_condition()" class="fiber_total_thired_cond1 form-control col-md-12 col-xs-12">'
                    +'<option value="" selected="selected">Select Condition</option>'
                    +'<option value="1" <?php echo ($_POST["fiber_total_thired_cond1"] == "1") ? "selected" : "" ?> >(</option>'
                    +'<option value="2" <?php echo ($_POST["fiber_total_thired_cond1"] == "2") ? "selected" : "" ?> >[</option>'
                  +'</select>'
                +'</div>'
                +'<div class="col-md-1 col-sm-1 col-xs-2">'
                  +'<input type="text" id="fiber_total_thired_value1" name="fiber_total_thired_value1" value="<?php echo isset($_POST["fiber_total_thired_value1"]) ? $_POST["fiber_total_thired_value1"] : "" ?>" class="fiber_total_thired_value1 form-control col-md-7 col-xs-12">'
                +'</div>'
                +'<div class="col-md-1 col-sm-1 col-xs-2" style="text-align: center;">'
                  +'--'
                +'</div>'
                +'<div class="col-md-1 col-sm-1 col-xs-2">'
                  +'<input type="text" id="fiber_total_thired_value2" name="fiber_total_thired_value2" value="<?php echo isset($_POST["fiber_total_thired_value2"]) ? $_POST["fiber_total_thired_value2"] : "" ?>" class="fiber_total_thired_value2 form-control col-md-7 col-xs-12">'
                +'</div>'
                +'<div class="col-md-1 col-sm-1 col-xs-2">'
                  +'<select id="fiber_total_thired_cond2" name="fiber_total_thired_cond2" class="fiber_total_thired_cond2 form-control col-md-12 col-xs-12">'
                    +'<option value="" selected="selected">Select Condition</option>'
                    +'<option value="1" <?php echo ($_POST["fiber_total_thired_cond2"] == "1") ? "selected" : "" ?> >)</option>'
                    +'<option value="2" <?php echo ($_POST["fiber_total_thired_cond2"] == "2") ? "selected" : "" ?> >]</option>'
                  +'</select>'
                +'</div>'

                +'<!-- start fourth option -->'
                +'<label class="control-label col-md-3 col-sm-3 col-xs-12" for="fiber_total">'
                +'</label>'
                +'<div class="col-md-1 col-sm-1 col-xs-2">'
                  +'<input type="text" id="fiber_total_name_fourth" name="fiber_total_name_fourth" value="" class="fiber_total_name_fourth form-control col-md-7 col-xs-12">'
                +'</div>'

                +'<div class="col-md-1 col-sm-1 col-xs-2">'
                  +'<input type="text" id="fiber_total_fourth_tol_value1" name="fiber_total_fourth_tol_value1" oninput="fiber_total_fourth_tol_cal_1();" class="fiber_total_fourth_tol_value1 form-control col-md-7 col-xs-12">'
                +'</div>'

                +'<div class="col-md-1 col-sm-1 col-xs-2" style="text-align: center;">'
                  +'<select id="fiber_total_fourth_tol_cond" name="fiber_total_fourth_tol_cond" onchange="fiber_total_fourth_tol_condition();" class="fiber_total_fourth_tol_cond select2 pp_number form-control col-md-12 col-xs-12">'
                    +'<option value="1" selected="selected" > &plusmn; </option>'
                    +'<option value="2" > + </option>'
                    +'<option value="3" > - </option>'
                  +'</select>'
                +'</div>'

                +'<div class="col-md-1 col-sm-1 col-xs-2" style="text-align: center;">'
                  +'<input type="text" id="fiber_total_fourth_tol_value2" name="fiber_total_fourth_tol_value2" oninput="fiber_total_fourth_tol_cal_2();" class="fiber_total_fourth_tol_value2 form-control col-md-7 col-xs-12">'
                +'</div>'

                +'<div class="col-md-1 col-sm-1 col-xs-2">'
                  +'<select id="fiber_total_fourth_cond1" name="fiber_total_fourth_cond1" onchange="fiber_total_fourth_condition()" class="fiber_total_fourth_cond1 form-control col-md-12 col-xs-12">'
                    +'<option value="" selected="selected">Select Condition</option>'
                    +'<option value="1" <?php echo ($_POST["fiber_total_fourth_cond1"] == "1") ? "selected" : "" ?> >(</option>'
                    +'<option value="2" <?php echo ($_POST["fiber_total_fourth_cond1"] == "2") ? "selected" : "" ?> >[</option>'
                  +'</select>'
                +'</div>'
                +'<div class="col-md-1 col-sm-1 col-xs-2">'
                  +'<input type="text" id="fiber_total_fourth_value1" name="fiber_total_fourth_value1" value="<?php echo isset($_POST["fiber_total_fourth_value1"]) ? $_POST["fiber_total_fourth_value1"] : '' ?>" class="fiber_total_fourth_value1 form-control col-md-7 col-xs-12">'
                +'</div>'
                +'<div class="col-md-1 col-sm-1 col-xs-2" style="text-align: center;">'
                 +'--'
                +'</div>'
                +'<div class="col-md-1 col-sm-1 col-xs-2">'
                  +'<input type="text" id="fiber_total_fourth_value2" name="fiber_total_fourth_value2" value="<?php echo isset($_POST["fiber_total_fourth_value2"]) ? $_POST["fiber_total_fourth_value2"] : '' ?>" class="fiber_total_fourth_value2 form-control col-md-7 col-xs-12">'
                +'</div>'
                +'<div class="col-md-1 col-sm-1 col-xs-2">'
                  +'<select id="fiber_total_fourth_cond2" name="fiber_total_fourth_cond2" class="fiber_total_fourth_cond2 form-control col-md-12 col-xs-12">'
                    +'<option value="" selected="selected">Select Condition</option>'
                    +'<option value="1" <?php echo ($_POST["fiber_total_fourth_cond2"] == "1") ? "selected" : "" ?> >)</option>'
                    +'<option value="2" <?php echo ($_POST["fiber_total_fourth_cond2"] == "2") ? "selected" : "" ?> >]</option>'
                  +'</select>'
                +'</div>'

              +'</div>';

            $('#fiber_content_selected').html(total_content);
        }

        else if (select_fiber_content == "fiber_warp_weft")
        {
            var total_content = "";
            total_content += '<!-- change for new formet -->'
            +'<input type="hidden" id="fiber_content_selected_for_number" name="fiber_content_selected_for_number" value="2" >'
            +'<div class="form-group">'  
              +'<label class="control-label col-md-3 col-sm-3 col-xs-12" for="fiber_warp">Warp Fiber Content'
              +'</label>'
              +'<!-- start polyster -->'
              +'<div class="col-md-1 col-sm-1 col-xs-2">'
                +'<input type="text" id="fiber_warp_name_polyester" name="fiber_warp_name_polyester" value="<?php echo isset($_POST["fiber_warp_name_polyester"]) ? $_POST["fiber_warp_name_polyester"] : "polyester" ?>" readonly class="fiber_warp_name_polyester form-control col-md-7 col-xs-12">'
              +'</div>'

              +'<div class="col-md-1 col-sm-1 col-xs-2">'
                +'<input type="text" id="fiber_warp_polyester_tol_value1" name="fiber_warp_polyester_tol_value1" oninput="fiber_warp_polyester_tol_cal_1();" class="fiber_warp_polyester_tol_value1 form-control col-md-7 col-xs-12">'
              +'</div>'

              +'<div class="col-md-1 col-sm-1 col-xs-2" style="text-align: center;">'
                +'<select id="fiber_warp_polyester_tol_cond" name="fiber_warp_polyester_tol_cond" onchange="fiber_warp_polyester_tol_condition();" class="fiber_warp_polyester_tol_cond select2 pp_number form-control col-md-12 col-xs-12">'
                  +'<option value="1" selected="selected" > &plusmn; </option>'
                  +'<option value="2" > + </option>'
                  +'<option value="3" > - </option>'
                +'</select> '
              +'</div> '

              +'<div class="col-md-1 col-sm-1 col-xs-2" style="text-align: center;">'
                +'<input type="text" id="fiber_warp_polyester_tol_value2" name="fiber_warp_polyester_tol_value2" oninput="fiber_warp_polyester_tol_cal_2();" class="fiber_warp_polyester_tol_value2 form-control col-md-7 col-xs-12"> '
              +'</div>'

              +'<div class="col-md-1 col-sm-1 col-xs-2">'
                +'<select id="fiber_warp_polyester_cond1" name="fiber_warp_polyester_cond1" onchange="fiber_warp_polyester_condition()" class="fiber_warp_polyester_cond1 form-control col-md-12 col-xs-12">'
                  +'<option value="" selected="selected">Select Condition</option>'
                  +'<option value="1" <?php echo ($_POST["fiber_warp_polyester_cond1"] == "1") ? "selected" : "" ?> >(</option>'
                  +'<option value="2" <?php echo ($_POST["fiber_warp_polyester_cond1"] == "2") ? "selected" : "" ?> >[</option>'
                +'</select>'
              +'</div>'
              +'<div class="col-md-1 col-sm-1 col-xs-2">'
                +'<input type="text" id="fiber_warp_polyester_value1" name="fiber_warp_polyester_value1" value="<?php echo isset($_POST["fiber_warp_polyester_value1"]) ? $_POST["fiber_warp_polyester_value1"] : "" ?>" class="fiber_warp_polyester_value1 form-control col-md-7 col-xs-12">'
              +'</div>'
              +'<div class="col-md-1 col-sm-1 col-xs-2" style="text-align: center;">'
                +'--'
              +'</div> '
              +'<div class="col-md-1 col-sm-1 col-xs-2">'
                +'<input type="text" id="fiber_warp_polyester_value2" name="fiber_warp_polyester_value2" value="<?php echo isset($_POST["fiber_warp_polyester_value2"]) ? $_POST["fiber_warp_polyester_value2"] : "" ?>" class="fiber_warp_polyester_value2 form-control col-md-7 col-xs-12">'
              +'</div>'
              +'<div class="col-md-1 col-sm-1 col-xs-2">'
                +'<select id="fiber_warp_polyester_cond2" name="fiber_warp_polyester_cond2" class="fiber_warp_polyester_cond2 form-control col-md-12 col-xs-12">'
                  +'<option value="" selected="selected">Select Condition</option>'
                  +'<option value="1" <?php echo ($_POST["fiber_warp_polyester_cond2"] == "1") ? "selected" : "" ?> >)</option>'
                  +'<option value="2" <?php echo ($_POST["fiber_warp_polyester_cond2"] == "2") ? "selected" : "" ?> >]</option>'
                +'</select>'
              +'</div>'

              +'<!-- start cotton -->'
              +'<label class="control-label col-md-3 col-sm-3 col-xs-12" for="fiber_weft">'
              +'</label>'
              +'<div class="col-md-1 col-sm-1 col-xs-2">'
                +'<input type="text" id="fiber_warp_name_cotton" name="fiber_warp_name_cotton" value="<?php echo isset($_POST["fiber_warp_name_cotton"]) ? $_POST["fiber_warp_name_cotton"] : "cotton" ?>" readonly class="fiber_warp_name_cotton form-control col-md-7 col-xs-12">'
              +'</div>'

              +'<div class="col-md-1 col-sm-1 col-xs-2">'
                +'<input type="text" id="fiber_warp_cotton_tol_value1" name="fiber_warp_cotton_tol_value1" oninput="fiber_warp_cotton_tol_cal_1();" class="fiber_warp_cotton_tol_value1 form-control col-md-7 col-xs-12">'
              +'</div>'

              +'<div class="col-md-1 col-sm-1 col-xs-2" style="text-align: center;">'
                +'<select id="fiber_warp_cotton_tol_cond" name="fiber_warp_cotton_tol_cond" onchange="fiber_warp_cotton_tol_condition();" class="fiber_warp_cotton_tol_cond select2 pp_number form-control col-md-12 col-xs-12">'
                  +'<option value="1" selected="selected" > &plusmn; </option>'
                  +'<option value="2" > + </option>'
                  +'<option value="3" > - </option>'
                +'</select> '
              +'</div> '

              +'<div class="col-md-1 col-sm-1 col-xs-2" style="text-align: center;">'
                +'<input type="text" id="fiber_warp_cotton_tol_value2" name="fiber_warp_cotton_tol_value2" oninput="fiber_warp_cotton_tol_cal_2();" class="fiber_warp_cotton_tol_value2 form-control col-md-7 col-xs-12"> '
              +'</div>'

              +'<div class="col-md-1 col-sm-1 col-xs-2">'
                +'<select id="fiber_warp_cotton_cond1" name="fiber_warp_cotton_cond1" onchange="fiber_warp_cotton_condition()" class="fiber_warp_cotton_cond1 form-control col-md-12 col-xs-12">'
                  +'<option value="" selected="selected">Select Condition</option>'
                  +'<option value="1" <?php echo ($_POST["fiber_warp_cotton_cond1"] == "1") ? "selected" : "" ?> >(</option>'
                  +'<option value="2" <?php echo ($_POST["fiber_warp_cotton_cond1"] == "2") ? "selected" : "" ?> >[</option>'
                +'</select>'
              +'</div>'
              +'<div class="col-md-1 col-sm-1 col-xs-2">'
                +'<input type="text" id="fiber_warp_cotton_value1" name="fiber_warp_cotton_value1" value="<?php echo isset($_POST["fiber_warp_cotton_value1"]) ? $_POST["fiber_warp_cotton_value1"] : "" ?>" class="fiber_warp_cotton_value1 form-control col-md-7 col-xs-12">'
              +'</div>'
              +'<div class="col-md-1 col-sm-1 col-xs-2" style="text-align: center;">'
                +'--'
              +'</div> '
              +'<div class="col-md-1 col-sm-1 col-xs-2">'
                +'<input type="text" id="fiber_warp_cotton_value2" name="fiber_warp_cotton_value2" value="<?php echo isset($_POST["fiber_warp_cotton_value2"]) ? $_POST["fiber_warp_cotton_value2"] : "" ?>" class="fiber_warp_cotton_value2 form-control col-md-7 col-xs-12">'
              +'</div>'
              +'<div class="col-md-1 col-sm-1 col-xs-2">'
                +'<select id="fiber_warp_cotton_cond2" name="fiber_warp_cotton_cond2" class="fiber_warp_cotton_cond2 form-control col-md-12 col-xs-12">'
                  +'<option value="" selected="selected">Select Condition</option>'
                  +'<option value="1" <?php echo ($_POST["fiber_warp_cotton_cond2"] == "1") ? "selected" : "" ?> >)</option>'
                  +'<option value="2" <?php echo ($_POST["fiber_warp_cotton_cond2"] == "2") ? "selected" : "" ?> >]</option>'
                +'</select>'
              +'</div>'

              +'<!-- start thired option -->'
              +'<label class="control-label col-md-3 col-sm-3 col-xs-12" for="fiber_warp">'
              +'</label>'
              +'<div class="col-md-1 col-sm-1 col-xs-2">'
                +'<input type="text" id="fiber_warp_name_thired" name="fiber_warp_name_thired" value="<?php echo isset($_POST["fiber_warp_name_thired"]) ? $_POST["fiber_warp_name_thired"] : "" ?>" class="fiber_warp_name_thired form-control col-md-7 col-xs-12">'
              +'</div>'

              +'<div class="col-md-1 col-sm-1 col-xs-2">'
                +'<input type="text" id="fiber_warp_thired_tol_value1" name="fiber_warp_thired_tol_value1" oninput="fiber_warp_thired_tol_cal_1();" class="fiber_warp_thired_tol_value1 form-control col-md-7 col-xs-12">'
              +'</div>'

              +'<div class="col-md-1 col-sm-1 col-xs-2" style="text-align: center;">'
                +'<select id="fiber_warp_thired_tol_cond" name="fiber_warp_thired_tol_cond" onchange="fiber_warp_thired_tol_condition();" class="fiber_warp_thired_tol_cond select2 pp_number form-control col-md-12 col-xs-12">'
                  +'<option value="1" selected="selected" > &plusmn; </option>'
                  +'<option value="2" > + </option>'
                  +'<option value="3" > - </option>'
                +'</select> '
              +'</div> '

              +'<div class="col-md-1 col-sm-1 col-xs-2" style="text-align: center;">'
                +'<input type="text" id="fiber_warp_thired_tol_value2" name="fiber_warp_thired_tol_value2" oninput="fiber_warp_thired_tol_cal_2();" class="fiber_warp_thired_tol_value2 form-control col-md-7 col-xs-12"> '
              +'</div>'

              +'<div class="col-md-1 col-sm-1 col-xs-2">'
                +'<select id="fiber_warp_thired_cond1" name="fiber_warp_thired_cond1" onchange="fiber_warp_thired_condition()" class="fiber_warp_thired_cond1 form-control col-md-12 col-xs-12">'
                  +'<option value="" selected="selected">Select Condition</option>'
                  +'<option value="1" <?php echo ($_POST["fiber_warp_thired_cond1"] == "1") ? "selected" : "" ?> >(</option>'
                  +'<option value="2" <?php echo ($_POST["fiber_warp_thired_cond1"] == "2") ? "selected" : "" ?> >[</option>'
                +'</select>'
              +'</div>'
              +'<div class="col-md-1 col-sm-1 col-xs-2">'
                +'<input type="text" id="fiber_warp_thired_value1" name="fiber_warp_thired_value1" value="<?php echo isset($_POST["fiber_warp_thired_value1"]) ? $_POST["fiber_warp_thired_value1"] : "" ?>" class="fiber_warp_thired_value1 form-control col-md-7 col-xs-12">'
              +'</div>'
              +'<div class="col-md-1 col-sm-1 col-xs-2" style="text-align: center;">'
                +'--'
              +'</div> '
              +'<div class="col-md-1 col-sm-1 col-xs-2">'
                +'<input type="text" id="fiber_warp_thired_value2" name="fiber_warp_thired_value2" value="<?php echo isset($_POST["fiber_warp_thired_value2"]) ? $_POST["fiber_warp_thired_value2"] : "" ?>" class="fiber_warp_thired_value2 form-control col-md-7 col-xs-12">'
              +'</div>'
              +'<div class="col-md-1 col-sm-1 col-xs-2">'
                +'<select id="fiber_warp_thired_cond2" name="fiber_warp_thired_cond2" class="fiber_warp_thired_cond2 form-control col-md-12 col-xs-12">'
                  +'<option value="" selected="selected">Select Condition</option>'
                  +'<option value="1" <?php echo ($_POST["fiber_warp_thired_cond2"] == "1") ? "selected" : "" ?> >)</option>'
                  +'<option value="2" <?php echo ($_POST["fiber_warp_thired_cond2"] == "2") ? "selected" : "" ?> >]</option>'
                +'</select>'
              +'</div>'

              +'<!-- start fourth option -->'
              +'<label class="control-label col-md-3 col-sm-3 col-xs-12" for="fiber_warp">'
              +'</label>'
              +'<div class="col-md-1 col-sm-1 col-xs-2">'
                +'<input type="text" id="fiber_warp_name_fourth" name="fiber_warp_name_fourth" value="<?php echo isset($_POST["fiber_warp_name_fourth"]) ? $_POST["fiber_warp_name_fourth"] : "" ?>" class="fiber_warp_name_fourth form-control col-md-7 col-xs-12">'
              +'</div>'

              +'<div class="col-md-1 col-sm-1 col-xs-2">'
                +'<input type="text" id="fiber_warp_fourth_tol_value1" name="fiber_warp_fourth_tol_value1" oninput="fiber_warp_fourth_tol_cal_1();" class="fiber_warp_fourth_tol_value1 form-control col-md-7 col-xs-12">'
              +'</div>'

              +'<div class="col-md-1 col-sm-1 col-xs-2" style="text-align: center;">'
                +'<select id="fiber_warp_fourth_tol_cond" name="fiber_warp_fourth_tol_cond" onchange="fiber_warp_fourth_tol_condition();" class="fiber_warp_fourth_tol_cond select2 pp_number form-control col-md-12 col-xs-12">'
                  +'<option value="1" selected="selected" > &plusmn; </option>'
                  +'<option value="2" > + </option>'
                  +'<option value="3" > - </option>'
                +'</select> '
              +'</div> '

              +'<div class="col-md-1 col-sm-1 col-xs-2" style="text-align: center;">'
                +'<input type="text" id="fiber_warp_fourth_tol_value2" name="fiber_warp_fourth_tol_value2" oninput="fiber_warp_fourth_tol_cal_2();" class="fiber_warp_fourth_tol_value2 form-control col-md-7 col-xs-12"> '
              +'</div>'

              +'<div class="col-md-1 col-sm-1 col-xs-2">'
                +'<select id="fiber_warp_fourth_cond1" name="fiber_warp_fourth_cond1" onchange="fiber_warp_fourth_condition()" class="fiber_warp_fourth_cond1 form-control col-md-12 col-xs-12">'
                  +'<option value="" selected="selected">Select Condition</option>'
                  +'<option value="1" <?php echo ($_POST["fiber_warp_fourth_cond1"] == "1") ? "selected" : "" ?> >(</option>'
                  +'<option value="2" <?php echo ($_POST["fiber_warp_fourth_cond1"] == "2") ? "selected" : "" ?> >[</option>'
                +'</select>'
              +'</div>'
              +'<div class="col-md-1 col-sm-1 col-xs-2">'
                +'<input type="text" id="fiber_warp_fourth_value1" name="fiber_warp_fourth_value1" value="<?php echo isset($_POST["fiber_warp_fourth_value1"]) ? $_POST["fiber_warp_fourth_value1"] : "" ?>" class="fiber_warp_fourth_value1 form-control col-md-7 col-xs-12">'
              +'</div>'
              +'<div class="col-md-1 col-sm-1 col-xs-2" style="text-align: center;">'
                +'--'
              +'</div> '
              +'<div class="col-md-1 col-sm-1 col-xs-2">'
                +'<input type="text" id="fiber_warp_fourth_value2" name="fiber_warp_fourth_value2" value="<?php echo isset($_POST["fiber_warp_fourth_value2"]) ? $_POST["fiber_warp_fourth_value2"] : "" ?>" class="fiber_warp_fourth_value2 form-control col-md-7 col-xs-12">'
              +'</div>'
              +'<div class="col-md-1 col-sm-1 col-xs-2">'
                +'<select id="fiber_warp_fourth_cond2" name="fiber_warp_fourth_cond2" class="fiber_warp_fourth_cond2 form-control col-md-12 col-xs-12">'
                  +'<option value="" selected="selected">Select Condition</option>'
                  +'<option value="1" <?php echo ($_POST["fiber_warp_fourth_cond2"] == "1") ? "selected" : "" ?> >)</option>'
                  +'<option value="2" <?php echo ($_POST["fiber_warp_fourth_cond2"] == "2") ? "selected" : "" ?> >]</option>'
                +'</select>'
              +'</div>'

            +'</div>'
            +'<!-- end of new formet change -->'


            +'<br>'
            +'<!-- change for new formet -->'
            +'<div class="form-group">  '
              +'<label class="control-label col-md-3 col-sm-3 col-xs-12" for="fiber_weft">Weft Fiber Content'
              +'</label>'
              +'<!-- start polyster -->'
              +'<div class="col-md-1 col-sm-1 col-xs-2">'
                +'<input type="text" id="fiber_weft_name_polyester" name="fiber_weft_name_polyester" value="<?php echo isset($_POST["fiber_weft_name_polyester"]) ? $_POST["fiber_weft_name_polyester"] : "polyester" ?>" readonly class="fiber_weft_name_polyester form-control col-md-7 col-xs-12">'
              +'</div>'

              +'<div class="col-md-1 col-sm-1 col-xs-2">'
                +'<input type="text" id="fiber_weft_polyester_tol_value1" name="fiber_weft_polyester_tol_value1" oninput="fiber_weft_polyester_tol_cal_1();" class="fiber_weft_polyester_tol_value1 form-control col-md-7 col-xs-12">'
              +'</div>'

              +'<div class="col-md-1 col-sm-1 col-xs-2" style="text-align: center;">'
                +'<select id="fiber_weft_polyester_tol_cond" name="fiber_weft_polyester_tol_cond" onchange="fiber_weft_polyester_tol_condition();" class="fiber_weft_polyester_tol_cond select2 pp_number form-control col-md-12 col-xs-12">'
                  +'<option value="1" selected="selected" > &plusmn; </option>'
                  +'<option value="2" > + </option>'
                  +'<option value="3" > - </option>'
                +'</select> '
              +'</div> '

              +'<div class="col-md-1 col-sm-1 col-xs-2" style="text-align: center;">'
                +'<input type="text" id="fiber_weft_polyester_tol_value2" name="fiber_weft_polyester_tol_value2" oninput="fiber_weft_polyester_tol_cal_2();" class="fiber_weft_polyester_tol_value2 form-control col-md-7 col-xs-12"> '
              +'</div>'

              +'<div class="col-md-1 col-sm-1 col-xs-2">'
                +'<select id="fiber_weft_polyester_cond1" name="fiber_weft_polyester_cond1" onchange="fiber_weft_polyester_condition()" class="fiber_weft_polyester_cond1 form-control col-md-12 col-xs-12">'
                  +'<option value="" selected="selected">Select Condition</option>'
                  +'<option value="1" <?php echo ($_POST["fiber_weft_polyester_cond1"] == "1") ? "selected" : "" ?> >(</option>'
                  +'<option value="2" <?php echo ($_POST["fiber_weft_polyester_cond1"] == "2") ? "selected" : "" ?> >[</option>'
                +'</select>'
              +'</div>'
              +'<div class="col-md-1 col-sm-1 col-xs-2">'
                +'<input type="text" id="fiber_weft_polyester_value1" name="fiber_weft_polyester_value1" value="<?php echo isset($_POST["fiber_weft_polyester_value1"]) ? $_POST["fiber_weft_polyester_value1"] : "" ?>" class="fiber_weft_polyester_value1 form-control col-md-7 col-xs-12">'
              +'</div>'
              +'<div class="col-md-1 col-sm-1 col-xs-2" style="text-align: center;">'
                +'--'
              +'</div> '
              +'<div class="col-md-1 col-sm-1 col-xs-2">'
                +'<input type="text" id="fiber_weft_polyester_value2" name="fiber_weft_polyester_value2" value="<?php echo isset($_POST["fiber_weft_polyester_value2"]) ? $_POST["fiber_weft_polyester_value2"] : "" ?>" class="fiber_weft_polyester_value2 form-control col-md-7 col-xs-12">'
              +'</div>'
              +'<div class="col-md-1 col-sm-1 col-xs-2">'
                +'<select id="fiber_weft_polyester_cond2" name="fiber_weft_polyester_cond2" class="fiber_weft_polyester_cond2 form-control col-md-12 col-xs-12">'
                  +'<option value="" selected="selected">Select Condition</option>'
                  +'<option value="1" <?php echo ($_POST["fiber_weft_polyester_cond2"] == "1") ? "selected" : "" ?> >)</option>'
                  +'<option value="2" <?php echo ($_POST["fiber_weft_polyester_cond2"] == "2") ? "selected" : "" ?> >]</option>'
                +'</select>'
              +'</div>'

              +'<!-- start cotton -->'
              +'<label class="control-label col-md-3 col-sm-3 col-xs-12" for="fiber_weft">'
              +'</label>'
              +'<div class="col-md-1 col-sm-1 col-xs-2">'
                +'<input type="text" id="fiber_weft_name_cotton" name="fiber_weft_name_cotton" value="<?php echo isset($_POST["fiber_weft_name_cotton"]) ? $_POST["fiber_weft_name_cotton"] : "cotton" ?>" readonly class="fiber_weft_name_cotton form-control col-md-7 col-xs-12">'
              +'</div>'

              +'<div class="col-md-1 col-sm-1 col-xs-2">'
                +'<input type="text" id="fiber_weft_cotton_tol_value1" name="fiber_weft_cotton_tol_value1" oninput="fiber_weft_cotton_tol_cal_1();" class="fiber_weft_cotton_tol_value1 form-control col-md-7 col-xs-12">'
              +'</div>'

              +'<div class="col-md-1 col-sm-1 col-xs-2" style="text-align: center;">'
                +'<select id="fiber_weft_cotton_tol_cond" name="fiber_weft_cotton_tol_cond" onchange="fiber_weft_cotton_tol_condition();" class="fiber_weft_cotton_tol_cond select2 pp_number form-control col-md-12 col-xs-12">'
                  +'<option value="1" selected="selected" > &plusmn; </option>'
                  +'<option value="2" > + </option>'
                  +'<option value="3" > - </option>'
                +'</select>'
              +'</div> '

              +'<div class="col-md-1 col-sm-1 col-xs-2" style="text-align: center;">'
                +'<input type="text" id="fiber_weft_cotton_tol_value2" name="fiber_weft_cotton_tol_value2" oninput="fiber_weft_cotton_tol_cal_2();" class="fiber_weft_cotton_tol_value2 form-control col-md-7 col-xs-12"> '
              +'</div>'

              +'<div class="col-md-1 col-sm-1 col-xs-2">'
                +'<select id="fiber_weft_cotton_cond1" name="fiber_weft_cotton_cond1" onchange="fiber_weft_cotton_condition()" class="fiber_weft_cotton_cond1 form-control col-md-12 col-xs-12">'
                  +'<option value="" selected="selected">Select Condition</option>'
                  +'<option value="1" <?php echo ($_POST["fiber_weft_cotton_cond1"] == "1") ? "selected" : "" ?> >(</option>'
                  +'<option value="2" <?php echo ($_POST["fiber_weft_cotton_cond1"] == "2") ? "selected" : "" ?> >[</option>'
                +'</select>'
              +'</div>'
              +'<div class="col-md-1 col-sm-1 col-xs-2">'
                +'<input type="text" id="fiber_weft_cotton_value1" name="fiber_weft_cotton_value1" value="<?php echo isset($_POST["fiber_weft_cotton_value1"]) ? $_POST["fiber_weft_cotton_value1"] : "" ?>" class="fiber_weft_cotton_value1 form-control col-md-7 col-xs-12">'
              +'</div>'
              +'<div class="col-md-1 col-sm-1 col-xs-2" style="text-align: center;">'
                +'--'
              +'</div> '
              +'<div class="col-md-1 col-sm-1 col-xs-2">'
                +'<input type="text" id="fiber_weft_cotton_value2" name="fiber_weft_cotton_value2" value="<?php echo isset($_POST["fiber_weft_cotton_value2"]) ? $_POST["fiber_weft_cotton_value2"] : "" ?>" class="fiber_weft_cotton_value2 form-control col-md-7 col-xs-12">'
              +'</div>'
              +'<div class="col-md-1 col-sm-1 col-xs-2">'
                +'<select id="fiber_weft_cotton_cond2" name="fiber_weft_cotton_cond2" class="fiber_weft_cotton_cond2 form-control col-md-12 col-xs-12">'
                  +'<option value="" selected="selected">Select Condition</option>'
                  +'<option value="1" <?php echo ($_POST["fiber_weft_cotton_cond2"] == "1") ? "selected" : "" ?> >)</option>'
                  +'<option value="2" <?php echo ($_POST["fiber_weft_cotton_cond2"] == "2") ? "selected" : "" ?> >]</option>'
                +'</select>'
              +'</div>'

              +'<!-- start thired option -->'
              +'<label class="control-label col-md-3 col-sm-3 col-xs-12" for="fiber_weft">'
              +'</label>'
              +'<div class="col-md-1 col-sm-1 col-xs-2">'
                +'<input type="text" id="fiber_weft_name_thired" name="fiber_weft_name_thired" value="<?php echo isset($_POST["fiber_weft_name_thired"]) ? $_POST["fiber_weft_name_thired"] : "" ?>" class="fiber_weft_name_thired form-control col-md-7 col-xs-12">'
              +'</div>'

              +'<div class="col-md-1 col-sm-1 col-xs-2">'
                +'<input type="text" id="fiber_weft_thired_tol_value1" name="fiber_weft_thired_tol_value1" oninput="fiber_weft_thired_tol_cal_1();" class="fiber_weft_thired_tol_value1 form-control col-md-7 col-xs-12">'
              +'</div>'

              +'<div class="col-md-1 col-sm-1 col-xs-2" style="text-align: center;">'
                +'<select id="fiber_weft_thired_tol_cond" name="fiber_weft_thired_tol_cond" onchange="fiber_weft_thired_tol_condition();" class="fiber_weft_thired_tol_cond select2 pp_number form-control col-md-12 col-xs-12">'
                  +'<option value="1" selected="selected" > &plusmn; </option>'
                  +'<option value="2" > + </option>'
                  +'<option value="3" > - </option>'
                +'</select> '
              +'</div> '

              +'<div class="col-md-1 col-sm-1 col-xs-2" style="text-align: center;">'
                +'<input type="text" id="fiber_weft_thired_tol_value2" name="fiber_weft_thired_tol_value2" oninput="fiber_weft_thired_tol_cal_2();" class="fiber_weft_thired_tol_value2 form-control col-md-7 col-xs-12"> '
              +'</div>'

              +'<div class="col-md-1 col-sm-1 col-xs-2">'
                +'<select id="fiber_weft_thired_cond1" name="fiber_weft_thired_cond1" onchange="fiber_weft_thired_condition()" class="fiber_weft_thired_cond1 form-control col-md-12 col-xs-12">'
                  +'<option value="" selected="selected">Select Condition</option>'
                  +'<option value="1" <?php echo ($_POST["fiber_weft_thired_cond1"] == "1") ? "selected" : "" ?> >(</option>'
                  +'<option value="2" <?php echo ($_POST["fiber_weft_thired_cond1"] == "2") ? "selected" : "" ?> >[</option>'
                +'</select>'
              +'</div>'
              +'<div class="col-md-1 col-sm-1 col-xs-2">'
                +'<input type="text" id="fiber_weft_thired_value1" name="fiber_weft_thired_value1" value="<?php echo isset($_POST["fiber_weft_thired_value1"]) ? $_POST["fiber_weft_thired_value1"] : "" ?>" class="fiber_weft_thired_value1 form-control col-md-7 col-xs-12">'
              +'</div>'
              +'<div class="col-md-1 col-sm-1 col-xs-2" style="text-align: center;">'
                +'--'
              +'</div> '
              +'<div class="col-md-1 col-sm-1 col-xs-2">'
                +'<input type="text" id="fiber_weft_thired_value2" name="fiber_weft_thired_value2" value="<?php echo isset($_POST["fiber_weft_thired_value2"]) ? $_POST["fiber_weft_thired_value2"] : "" ?>" class="fiber_weft_thired_value2 form-control col-md-7 col-xs-12">'
              +'</div>'
              +'<div class="col-md-1 col-sm-1 col-xs-2">'
                +'<select id="fiber_weft_thired_cond2" name="fiber_weft_thired_cond2" class="fiber_weft_thired_cond2 form-control col-md-12 col-xs-12">'
                  +'<option value="" selected="selected">Select Condition</option>'
                  +'<option value="1" <?php echo ($_POST["fiber_weft_thired_cond2"] == "1") ? "selected" : "" ?> >)</option>'
                  +'<option value="2" <?php echo ($_POST["fiber_weft_thired_cond2"] == "2") ? "selected" : "" ?> >]</option>'
                +'</select>'
              +'</div>'

              +'<!-- start fourth option -->'
              +'<label class="control-label col-md-3 col-sm-3 col-xs-12" for="fiber_weft">'
              +'</label>'
              +'<div class="col-md-1 col-sm-1 col-xs-2">'
                +'<input type="text" id="fiber_weft_name_fourth" name="fiber_weft_name_fourth" value="<?php echo isset($_POST["fiber_weft_name_fourth"]) ? $_POST["fiber_weft_name_fourth"] : "" ?>"  class="fiber_weft_name_fourth form-control col-md-7 col-xs-12">'
              +'</div>'

              +'<div class="col-md-1 col-sm-1 col-xs-2">'
                +'<input type="text" id="fiber_weft_fourth_tol_value1" name="fiber_weft_fourth_tol_value1" oninput="fiber_weft_fourth_tol_cal_1();" class="fiber_weft_fourth_tol_value1 form-control col-md-7 col-xs-12">'
              +'</div>'

              +'<div class="col-md-1 col-sm-1 col-xs-2" style="text-align: center;">'
                +'<select id="fiber_weft_fourth_tol_cond" name="fiber_weft_fourth_tol_cond" onchange="fiber_weft_fourth_tol_condition();" class="fiber_weft_fourth_tol_cond select2 pp_number form-control col-md-12 col-xs-12">'
                  +'<option value="1" selected="selected" > &plusmn; </option>'
                  +'<option value="2" > + </option>'
                  +'<option value="3" > - </option>'
                +'</select> '
              +'</div> '

              +'<div class="col-md-1 col-sm-1 col-xs-2" style="text-align: center;">'
                +'<input type="text" id="fiber_weft_fourth_tol_value2" name="fiber_weft_fourth_tol_value2" oninput="fiber_weft_fourth_tol_cal_2();" class="fiber_weft_fourth_tol_value2 form-control col-md-7 col-xs-12"> '
              +'</div>'

              +'<div class="col-md-1 col-sm-1 col-xs-2">'
                +'<select id="fiber_weft_fourth_cond1" name="fiber_weft_fourth_cond1" onchange="fiber_weft_fourth_condition()" class="fiber_weft_fourth_cond1 form-control col-md-12 col-xs-12">'
                  +'<option value="" selected="selected">Select Condition</option>'
                  +'<option value="1" <?php echo ($_POST["fiber_weft_fourth_cond1"] == "1") ? "selected" : "" ?> >(</option>'
                  +'<option value="2" <?php echo ($_POST["fiber_weft_fourth_cond1"] == "2") ? "selected" : "" ?> >[</option>'
                +'</select>'
              +'</div>'
              +'<div class="col-md-1 col-sm-1 col-xs-2">'
                +'<input type="text" id="fiber_weft_fourth_value1" name="fiber_weft_fourth_value1" value="<?php echo isset($_POST["fiber_weft_fourth_value1"]) ? $_POST["fiber_weft_fourth_value1"] : "" ?>" class="fiber_weft_fourth_value1 form-control col-md-7 col-xs-12">'
              +'</div>'
              +'<div class="col-md-1 col-sm-1 col-xs-2" style="text-align: center;">'
                +'--'
              +'</div> '
              +'<div class="col-md-1 col-sm-1 col-xs-2">'
                +'<input type="text" id="fiber_weft_fourth_value2" name="fiber_weft_fourth_value2" value="<?php echo isset($_POST["fiber_weft_fourth_value2"]) ? $_POST["fiber_weft_fourth_value2"] : "" ?>" class="fiber_weft_fourth_value2 form-control col-md-7 col-xs-12">'
              +'</div>'
              +'<div class="col-md-1 col-sm-1 col-xs-2">'
                +'<select id="fiber_weft_fourth_cond2" name="fiber_weft_fourth_cond2" class="fiber_weft_fourth_cond2 form-control col-md-12 col-xs-12">'
                  +'<option value="" selected="selected">Select Condition</option>'
                  +'<option value="1" <?php echo ($_POST["fiber_weft_fourth_cond2"] == "1") ? "selected" : "" ?> >)</option>'
                  +'<option value="2" <?php echo ($_POST["fiber_weft_fourth_cond2"] == "2") ? "selected" : "" ?> >]</option>'
                +'</select>'
              +'</div>'

            +'</div>'
            +'<!-- end of new formet change -->';

            $('#fiber_content_selected').html(total_content);
        }

        else
        {
            var total_content = "";

            total_content += '<div class="form-group">'
                +'<input type="hidden" id="fiber_content_selected_for_number" name="fiber_content_selected_for_number" value="3" >'
                +'<label class="control-label col-md-3 col-sm-3 col-xs-12" for="fiber_total">Total Fiber Content'
                +'</label>'
                +'<!-- start polyster -->'
                +'<div class="col-md-1 col-sm-1 col-xs-2">'
                  +'<input type="text" id="fiber_total_name_polyester" name="fiber_total_name_polyester" value="polyester" readonly class="fiber_total_name_polyester form-control col-md-7 col-xs-12">'
                +'</div>'

                +'<div class="col-md-1 col-sm-1 col-xs-2">'
                  +'<input type="text" id="fiber_total_polyester_tol_value1" name="fiber_total_polyester_tol_value1" oninput="fiber_total_polyester_tol_cal_1();" class="fiber_total_polyester_tol_value1 form-control col-md-7 col-xs-12">'
                +'</div>'

                +'<div class="col-md-1 col-sm-1 col-xs-2" style="text-align: center;">'
                  +'<select id="fiber_total_polyester_tol_cond" name="fiber_total_polyester_tol_cond" onchange="fiber_total_polyester_tol_condition();" class="fiber_total_polyester_tol_cond select2 pp_number form-control col-md-12 col-xs-12">'
                    +'<option value="1" selected="selected" > &plusmn; </option>'
                    +'<option value="2" > + </option>'
                    +'<option value="3" > - </option>'
                  +'</select> '
                +'</div> '

                +'<div class="col-md-1 col-sm-1 col-xs-2" style="text-align: center;">'
                  +'<input type="text" id="fiber_total_polyester_tol_value2" name="fiber_total_polyester_tol_value2" oninput="fiber_total_polyester_tol_cal_2();" class="fiber_total_polyester_tol_value2 form-control col-md-7 col-xs-12">'
                +'</div>'

                +'<div class="col-md-1 col-sm-1 col-xs-2">'
                  +'<select id="fiber_total_polyester_cond1" name="fiber_total_polyester_cond1" onchange="fiber_total_polyester_condition()" class="fiber_total_polyester_cond1 form-control col-md-12 col-xs-12">'
                    +'<option value="" selected="selected">Select Condition</option>'
                    +'<option value="1" <?php echo ($_POST["fiber_total_polyester_cond1"] == "1") ? "selected" : "" ?> >(</option>'
                    +'<option value="2" <?php echo ($_POST["fiber_total_polyester_cond1"] == "2") ? "selected" : "" ?> >[</option>'
                  +'</select>'
                +'</div>'
                +'<div class="col-md-1 col-sm-1 col-xs-2">'
                  +'<input type="text" id="fiber_total_polyester_value1" name="fiber_total_polyester_value1" value="<?php echo isset($_POST["fiber_total_polyester_value1"]) ? $_POST["fiber_total_polyester_value1"] : "" ?>" class="fiber_total_polyester_value1 form-control col-md-7 col-xs-12">'
                +'</div>'
                +'<div class="col-md-1 col-sm-1 col-xs-2" style="text-align: center;">'
                  +'--'
                +'</div>'
                +'<div class="col-md-1 col-sm-1 col-xs-2">'
                  +'<input type="text" id="fiber_total_polyester_value2" name="fiber_total_polyester_value2" value="<?php echo isset($_POST["fiber_total_polyester_value2"]) ? $_POST["fiber_total_polyester_value2"] : "" ?>" class="fiber_total_polyester_value2 form-control col-md-7 col-xs-12">'
                +'</div>'
                +'<div class="col-md-1 col-sm-1 col-xs-2">'
                  +'<select id="fiber_total_polyester_cond2" name="fiber_total_polyester_cond2" class="fiber_total_polyester_cond2 form-control col-md-12 col-xs-12">'
                    +'<option value="" selected="selected">Select Condition</option>'
                    +'<option value="1" <?php echo ($_POST["fiber_total_polyester_cond2"] == "1") ? "selected" : "" ?> >)</option>'
                    +'<option value="2" <?php echo ($_POST["fiber_total_polyester_cond2"] == "2") ? "selected" : "" ?> >]</option>'
                  +'</select>'
                +'</div>'

                +'<!-- start cotton -->'
                +'<label class="control-label col-md-3 col-sm-3 col-xs-12" for="fiber_weft">'
                +'</label>'
                +'<div class="col-md-1 col-sm-1 col-xs-2">'
                  +'<input type="text" id="fiber_total_name_cotton" name="fiber_total_name_cotton" value="cotton" readonly class="fiber_total_name_cotton form-control col-md-7 col-xs-12">'
                +'</div>'

                +'<div class="col-md-1 col-sm-1 col-xs-2">'
                  +'<input type="text" id="fiber_total_cotton_tol_value1" name="fiber_total_cotton_tol_value1" oninput="fiber_total_cotton_tol_cal_1();" class="fiber_total_cotton_tol_value1 form-control col-md-7 col-xs-12">'
                +'</div>'

                +'<div class="col-md-1 col-sm-1 col-xs-2" style="text-align: center;">'
                  +'<select id="fiber_total_cotton_tol_cond" name="fiber_total_cotton_tol_cond" onchange="fiber_total_cotton_tol_condition();" class="fiber_total_cotton_tol_cond select2 pp_number form-control col-md-12 col-xs-12">'
                    +'<option value="1" selected="selected" > &plusmn; </option>'
                    +'<option value="2" > + </option>'
                    +'<option value="3" > - </option>'
                  +'</select> '
                +'</div> '

                +'<div class="col-md-1 col-sm-1 col-xs-2" style="text-align: center;">'
                  +'<input type="text" id="fiber_total_cotton_tol_value2" name="fiber_total_cotton_tol_value2" oninput="fiber_total_cotton_tol_cal_2();" class="fiber_total_cotton_tol_value2 form-control col-md-7 col-xs-12">'
                +'</div>'

                +'<div class="col-md-1 col-sm-1 col-xs-2">'
                  +'<select id="fiber_total_cotton_cond1" name="fiber_total_cotton_cond1" onchange="fiber_total_cotton_condition()" class="fiber_total_cotton_cond1 form-control col-md-12 col-xs-12">'
                    +'<option value="" selected="selected">Select Condition</option>'
                    +'<option value="1" <?php echo ($_POST["fiber_total_cotton_cond1"] == "1") ? "selected" : "" ?> >(</option>'
                    +'<option value="2" <?php echo ($_POST["fiber_total_cotton_cond1"] == "2") ? "selected" : "" ?> >[</option>'
                  +'</select>'
                +'</div>'
                +'<div class="col-md-1 col-sm-1 col-xs-2">'
                  +'<input type="text" id="fiber_total_cotton_value1" name="fiber_total_cotton_value1" value="<?php echo isset($_POST["fiber_total_cotton_value1"]) ? $_POST["fiber_total_cotton_value1"] : "" ?>" class="fiber_total_cotton_value1 form-control col-md-7 col-xs-12">'
                +'</div>'
                +'<div class="col-md-1 col-sm-1 col-xs-2" style="text-align: center;">'
                  +'--'
                +'</div>'
                +'<div class="col-md-1 col-sm-1 col-xs-2">'
                  +'<input type="text" id="fiber_total_cotton_value2" name="fiber_total_cotton_value2" value="<?php echo isset($_POST["fiber_total_cotton_value2"]) ? $_POST["fiber_total_cotton_value2"] : "" ?>" class="fiber_total_cotton_value2 form-control col-md-7 col-xs-12">'
                +'</div>'
                +'<div class="col-md-1 col-sm-1 col-xs-2">'
                  +'<select id="fiber_total_cotton_cond2" name="fiber_total_cotton_cond2" class="fiber_total_cotton_cond2 form-control col-md-12 col-xs-12">'
                    +'<option value="" selected="selected">Select Condition</option>'
                    +'<option value="1" <?php echo ($_POST["fiber_total_cotton_cond2"] == "1") ? "selected" : "" ?> >)</option>'
                    +'<option value="2" <?php echo ($_POST["fiber_total_cotton_cond2"] == "2") ? "selected" : "" ?> >]</option>'
                  +'</select>'
                +'</div>'

                +'<!-- start thired option -->'
                +'<label class="control-label col-md-3 col-sm-3 col-xs-12" for="fiber_total">'
                +'</label>'
                +'<div class="col-md-1 col-sm-1 col-xs-2">'
                  +'<input type="text" id="fiber_total_name_thired" name="fiber_total_name_thired" value="" class="fiber_total_name_thired form-control col-md-7 col-xs-12">'
                +'</div>'

                +'<div class="col-md-1 col-sm-1 col-xs-2">'
                  +'<input type="text" id="fiber_total_thired_tol_value1" name="fiber_total_thired_tol_value1" oninput="fiber_total_thired_tol_cal_1();" class="fiber_total_thired_tol_value1 form-control col-md-7 col-xs-12">'
                +'</div>'

                +'<div class="col-md-1 col-sm-1 col-xs-2" style="text-align: center;">'
                  +'<select id="fiber_total_thired_tol_cond" name="fiber_total_thired_tol_cond" onchange="fiber_total_thired_tol_condition();" class="fiber_total_thired_tol_cond select2 pp_number form-control col-md-12 col-xs-12">'
                    +'<option value="1" selected="selected" > &plusmn; </option>'
                    +'<option value="2" > + </option>'
                    +'<option value="3" > - </option>'
                  +'</select>'
                +'</div>'

                +'<div class="col-md-1 col-sm-1 col-xs-2" style="text-align: center;">'
                  +'<input type="text" id="fiber_total_thired_tol_value2" name="fiber_total_thired_tol_value2" oninput="fiber_total_thired_tol_cal_2();" class="fiber_total_thired_tol_value2 form-control col-md-7 col-xs-12">'
                +'</div>'

                +'<div class="col-md-1 col-sm-1 col-xs-2">'
                  +'<select id="fiber_total_thired_cond1" name="fiber_total_thired_cond1" onchange="fiber_total_thired_condition()" class="fiber_total_thired_cond1 form-control col-md-12 col-xs-12">'
                    +'<option value="" selected="selected">Select Condition</option>'
                    +'<option value="1" <?php echo ($_POST["fiber_total_thired_cond1"] == "1") ? "selected" : "" ?> >(</option>'
                    +'<option value="2" <?php echo ($_POST["fiber_total_thired_cond1"] == "2") ? "selected" : "" ?> >[</option>'
                  +'</select>'
                +'</div>'
                +'<div class="col-md-1 col-sm-1 col-xs-2">'
                  +'<input type="text" id="fiber_total_thired_value1" name="fiber_total_thired_value1" value="<?php echo isset($_POST["fiber_total_thired_value1"]) ? $_POST["fiber_total_thired_value1"] : "" ?>" class="fiber_total_thired_value1 form-control col-md-7 col-xs-12">'
                +'</div>'
                +'<div class="col-md-1 col-sm-1 col-xs-2" style="text-align: center;">'
                  +'--'
                +'</div>'
                +'<div class="col-md-1 col-sm-1 col-xs-2">'
                  +'<input type="text" id="fiber_total_thired_value2" name="fiber_total_thired_value2" value="<?php echo isset($_POST["fiber_total_thired_value2"]) ? $_POST["fiber_total_thired_value2"] : "" ?>" class="fiber_total_thired_value2 form-control col-md-7 col-xs-12">'
                +'</div>'
                +'<div class="col-md-1 col-sm-1 col-xs-2">'
                  +'<select id="fiber_total_thired_cond2" name="fiber_total_thired_cond2" class="fiber_total_thired_cond2 form-control col-md-12 col-xs-12">'
                    +'<option value="" selected="selected">Select Condition</option>'
                    +'<option value="1" <?php echo ($_POST["fiber_total_thired_cond2"] == "1") ? "selected" : "" ?> >)</option>'
                    +'<option value="2" <?php echo ($_POST["fiber_total_thired_cond2"] == "2") ? "selected" : "" ?> >]</option>'
                  +'</select>'
                +'</div>'

                +'<!-- start fourth option -->'
                +'<label class="control-label col-md-3 col-sm-3 col-xs-12" for="fiber_total">'
                +'</label>'
                +'<div class="col-md-1 col-sm-1 col-xs-2">'
                  +'<input type="text" id="fiber_total_name_fourth" name="fiber_total_name_fourth" value="" class="fiber_total_name_fourth form-control col-md-7 col-xs-12">'
                +'</div>'

                +'<div class="col-md-1 col-sm-1 col-xs-2">'
                  +'<input type="text" id="fiber_total_fourth_tol_value1" name="fiber_total_fourth_tol_value1" oninput="fiber_total_fourth_tol_cal_1();" class="fiber_total_fourth_tol_value1 form-control col-md-7 col-xs-12">'
                +'</div>'

                +'<div class="col-md-1 col-sm-1 col-xs-2" style="text-align: center;">'
                  +'<select id="fiber_total_fourth_tol_cond" name="fiber_total_fourth_tol_cond" onchange="fiber_total_fourth_tol_condition();" class="fiber_total_fourth_tol_cond select2 pp_number form-control col-md-12 col-xs-12">'
                    +'<option value="1" selected="selected" > &plusmn; </option>'
                    +'<option value="2" > + </option>'
                    +'<option value="3" > - </option>'
                  +'</select>'
                +'</div>'

                +'<div class="col-md-1 col-sm-1 col-xs-2" style="text-align: center;">'
                  +'<input type="text" id="fiber_total_fourth_tol_value2" name="fiber_total_fourth_tol_value2" oninput="fiber_total_fourth_tol_cal_2();" class="fiber_total_fourth_tol_value2 form-control col-md-7 col-xs-12">'
                +'</div>'

                +'<div class="col-md-1 col-sm-1 col-xs-2">'
                  +'<select id="fiber_total_fourth_cond1" name="fiber_total_fourth_cond1" onchange="fiber_total_fourth_condition()" class="fiber_total_fourth_cond1 form-control col-md-12 col-xs-12">'
                    +'<option value="" selected="selected">Select Condition</option>'
                    +'<option value="1" <?php echo ($_POST["fiber_total_fourth_cond1"] == "1") ? "selected" : "" ?> >(</option>'
                    +'<option value="2" <?php echo ($_POST["fiber_total_fourth_cond1"] == "2") ? "selected" : "" ?> >[</option>'
                  +'</select>'
                +'</div>'
                +'<div class="col-md-1 col-sm-1 col-xs-2">'
                  +'<input type="text" id="fiber_total_fourth_value1" name="fiber_total_fourth_value1" value="<?php echo isset($_POST["fiber_total_fourth_value1"]) ? $_POST["fiber_total_fourth_value1"] : '' ?>" class="fiber_total_fourth_value1 form-control col-md-7 col-xs-12">'
                +'</div>'
                +'<div class="col-md-1 col-sm-1 col-xs-2" style="text-align: center;">'
                 +'--'
                +'</div>'
                +'<div class="col-md-1 col-sm-1 col-xs-2">'
                  +'<input type="text" id="fiber_total_fourth_value2" name="fiber_total_fourth_value2" value="<?php echo isset($_POST["fiber_total_fourth_value2"]) ? $_POST["fiber_total_fourth_value2"] : '' ?>" class="fiber_total_fourth_value2 form-control col-md-7 col-xs-12">'
                +'</div>'
                +'<div class="col-md-1 col-sm-1 col-xs-2">'
                  +'<select id="fiber_total_fourth_cond2" name="fiber_total_fourth_cond2" class="fiber_total_fourth_cond2 form-control col-md-12 col-xs-12">'
                    +'<option value="" selected="selected">Select Condition</option>'
                    +'<option value="1" <?php echo ($_POST["fiber_total_fourth_cond2"] == "1") ? "selected" : "" ?> >)</option>'
                    +'<option value="2" <?php echo ($_POST["fiber_total_fourth_cond2"] == "2") ? "selected" : "" ?> >]</option>'
                  +'</select>'
                +'</div>'

              +'</div>'
              +'<br>';

            total_content += '<!-- change for new formet -->'
            +'<div class="form-group">'  
              +'<label class="control-label col-md-3 col-sm-3 col-xs-12" for="fiber_warp">Warp Fiber Content'
              +'</label>'
              +'<!-- start polyster -->'
              +'<div class="col-md-1 col-sm-1 col-xs-2">'
                +'<input type="text" id="fiber_warp_name_polyester" name="fiber_warp_name_polyester" value="<?php echo isset($_POST["fiber_warp_name_polyester"]) ? $_POST["fiber_warp_name_polyester"] : "polyester" ?>" readonly class="fiber_warp_name_polyester form-control col-md-7 col-xs-12">'
              +'</div>'

              +'<div class="col-md-1 col-sm-1 col-xs-2">'
                +'<input type="text" id="fiber_warp_polyester_tol_value1" name="fiber_warp_polyester_tol_value1" oninput="fiber_warp_polyester_tol_cal_1();" class="fiber_warp_polyester_tol_value1 form-control col-md-7 col-xs-12">'
              +'</div>'

              +'<div class="col-md-1 col-sm-1 col-xs-2" style="text-align: center;">'
                +'<select id="fiber_warp_polyester_tol_cond" name="fiber_warp_polyester_tol_cond" onchange="fiber_warp_polyester_tol_condition();" class="fiber_warp_polyester_tol_cond select2 pp_number form-control col-md-12 col-xs-12">'
                  +'<option value="1" selected="selected" > &plusmn; </option>'
                  +'<option value="2" > + </option>'
                  +'<option value="3" > - </option>'
                +'</select> '
              +'</div> '

              +'<div class="col-md-1 col-sm-1 col-xs-2" style="text-align: center;">'
                +'<input type="text" id="fiber_warp_polyester_tol_value2" name="fiber_warp_polyester_tol_value2" oninput="fiber_warp_polyester_tol_cal_2();" class="fiber_warp_polyester_tol_value2 form-control col-md-7 col-xs-12"> '
              +'</div>'

              +'<div class="col-md-1 col-sm-1 col-xs-2">'
                +'<select id="fiber_warp_polyester_cond1" name="fiber_warp_polyester_cond1" onchange="fiber_warp_polyester_condition()" class="fiber_warp_polyester_cond1 form-control col-md-12 col-xs-12">'
                  +'<option value="" selected="selected">Select Condition</option>'
                  +'<option value="1" <?php echo ($_POST["fiber_warp_polyester_cond1"] == "1") ? "selected" : "" ?> >(</option>'
                  +'<option value="2" <?php echo ($_POST["fiber_warp_polyester_cond1"] == "2") ? "selected" : "" ?> >[</option>'
                +'</select>'
              +'</div>'
              +'<div class="col-md-1 col-sm-1 col-xs-2">'
                +'<input type="text" id="fiber_warp_polyester_value1" name="fiber_warp_polyester_value1" value="<?php echo isset($_POST["fiber_warp_polyester_value1"]) ? $_POST["fiber_warp_polyester_value1"] : "" ?>" class="fiber_warp_polyester_value1 form-control col-md-7 col-xs-12">'
              +'</div>'
              +'<div class="col-md-1 col-sm-1 col-xs-2" style="text-align: center;">'
                +'--'
              +'</div> '
              +'<div class="col-md-1 col-sm-1 col-xs-2">'
                +'<input type="text" id="fiber_warp_polyester_value2" name="fiber_warp_polyester_value2" value="<?php echo isset($_POST["fiber_warp_polyester_value2"]) ? $_POST["fiber_warp_polyester_value2"] : "" ?>" class="fiber_warp_polyester_value2 form-control col-md-7 col-xs-12">'
              +'</div>'
              +'<div class="col-md-1 col-sm-1 col-xs-2">'
                +'<select id="fiber_warp_polyester_cond2" name="fiber_warp_polyester_cond2" class="fiber_warp_polyester_cond2 form-control col-md-12 col-xs-12">'
                  +'<option value="" selected="selected">Select Condition</option>'
                  +'<option value="1" <?php echo ($_POST["fiber_warp_polyester_cond2"] == "1") ? "selected" : "" ?> >)</option>'
                  +'<option value="2" <?php echo ($_POST["fiber_warp_polyester_cond2"] == "2") ? "selected" : "" ?> >]</option>'
                +'</select>'
              +'</div>'

              +'<!-- start cotton -->'
              +'<label class="control-label col-md-3 col-sm-3 col-xs-12" for="fiber_weft">'
              +'</label>'
              +'<div class="col-md-1 col-sm-1 col-xs-2">'
                +'<input type="text" id="fiber_warp_name_cotton" name="fiber_warp_name_cotton" value="<?php echo isset($_POST["fiber_warp_name_cotton"]) ? $_POST["fiber_warp_name_cotton"] : "cotton" ?>" readonly class="fiber_warp_name_cotton form-control col-md-7 col-xs-12">'
              +'</div>'

              +'<div class="col-md-1 col-sm-1 col-xs-2">'
                +'<input type="text" id="fiber_warp_cotton_tol_value1" name="fiber_warp_cotton_tol_value1" oninput="fiber_warp_cotton_tol_cal_1();" class="fiber_warp_cotton_tol_value1 form-control col-md-7 col-xs-12">'
              +'</div>'

              +'<div class="col-md-1 col-sm-1 col-xs-2" style="text-align: center;">'
                +'<select id="fiber_warp_cotton_tol_cond" name="fiber_warp_cotton_tol_cond" onchange="fiber_warp_cotton_tol_condition();" class="fiber_warp_cotton_tol_cond select2 pp_number form-control col-md-12 col-xs-12">'
                  +'<option value="1" selected="selected" > &plusmn; </option>'
                  +'<option value="2" > + </option>'
                  +'<option value="3" > - </option>'
                +'</select> '
              +'</div> '

              +'<div class="col-md-1 col-sm-1 col-xs-2" style="text-align: center;">'
                +'<input type="text" id="fiber_warp_cotton_tol_value2" name="fiber_warp_cotton_tol_value2" oninput="fiber_warp_cotton_tol_cal_2();" class="fiber_warp_cotton_tol_value2 form-control col-md-7 col-xs-12"> '
              +'</div>'

              +'<div class="col-md-1 col-sm-1 col-xs-2">'
                +'<select id="fiber_warp_cotton_cond1" name="fiber_warp_cotton_cond1" onchange="fiber_warp_cotton_condition()" class="fiber_warp_cotton_cond1 form-control col-md-12 col-xs-12">'
                  +'<option value="" selected="selected">Select Condition</option>'
                  +'<option value="1" <?php echo ($_POST["fiber_warp_cotton_cond1"] == "1") ? "selected" : "" ?> >(</option>'
                  +'<option value="2" <?php echo ($_POST["fiber_warp_cotton_cond1"] == "2") ? "selected" : "" ?> >[</option>'
                +'</select>'
              +'</div>'
              +'<div class="col-md-1 col-sm-1 col-xs-2">'
                +'<input type="text" id="fiber_warp_cotton_value1" name="fiber_warp_cotton_value1" value="<?php echo isset($_POST["fiber_warp_cotton_value1"]) ? $_POST["fiber_warp_cotton_value1"] : "" ?>" class="fiber_warp_cotton_value1 form-control col-md-7 col-xs-12">'
              +'</div>'
              +'<div class="col-md-1 col-sm-1 col-xs-2" style="text-align: center;">'
                +'--'
              +'</div> '
              +'<div class="col-md-1 col-sm-1 col-xs-2">'
                +'<input type="text" id="fiber_warp_cotton_value2" name="fiber_warp_cotton_value2" value="<?php echo isset($_POST["fiber_warp_cotton_value2"]) ? $_POST["fiber_warp_cotton_value2"] : "" ?>" class="fiber_warp_cotton_value2 form-control col-md-7 col-xs-12">'
              +'</div>'
              +'<div class="col-md-1 col-sm-1 col-xs-2">'
                +'<select id="fiber_warp_cotton_cond2" name="fiber_warp_cotton_cond2" class="fiber_warp_cotton_cond2 form-control col-md-12 col-xs-12">'
                  +'<option value="" selected="selected">Select Condition</option>'
                  +'<option value="1" <?php echo ($_POST["fiber_warp_cotton_cond2"] == "1") ? "selected" : "" ?> >)</option>'
                  +'<option value="2" <?php echo ($_POST["fiber_warp_cotton_cond2"] == "2") ? "selected" : "" ?> >]</option>'
                +'</select>'
              +'</div>'

              +'<!-- start thired option -->'
              +'<label class="control-label col-md-3 col-sm-3 col-xs-12" for="fiber_warp">'
              +'</label>'
              +'<div class="col-md-1 col-sm-1 col-xs-2">'
                +'<input type="text" id="fiber_warp_name_thired" name="fiber_warp_name_thired" value="<?php echo isset($_POST["fiber_warp_name_thired"]) ? $_POST["fiber_warp_name_thired"] : "" ?>" class="fiber_warp_name_thired form-control col-md-7 col-xs-12">'
              +'</div>'

              +'<div class="col-md-1 col-sm-1 col-xs-2">'
                +'<input type="text" id="fiber_warp_thired_tol_value1" name="fiber_warp_thired_tol_value1" oninput="fiber_warp_thired_tol_cal_1();" class="fiber_warp_thired_tol_value1 form-control col-md-7 col-xs-12">'
              +'</div>'

              +'<div class="col-md-1 col-sm-1 col-xs-2" style="text-align: center;">'
                +'<select id="fiber_warp_thired_tol_cond" name="fiber_warp_thired_tol_cond" onchange="fiber_warp_thired_tol_condition();" class="fiber_warp_thired_tol_cond select2 pp_number form-control col-md-12 col-xs-12">'
                  +'<option value="1" selected="selected" > &plusmn; </option>'
                  +'<option value="2" > + </option>'
                  +'<option value="3" > - </option>'
                +'</select> '
              +'</div> '

              +'<div class="col-md-1 col-sm-1 col-xs-2" style="text-align: center;">'
                +'<input type="text" id="fiber_warp_thired_tol_value2" name="fiber_warp_thired_tol_value2" oninput="fiber_warp_thired_tol_cal_2();" class="fiber_warp_thired_tol_value2 form-control col-md-7 col-xs-12"> '
              +'</div>'

              +'<div class="col-md-1 col-sm-1 col-xs-2">'
                +'<select id="fiber_warp_thired_cond1" name="fiber_warp_thired_cond1" onchange="fiber_warp_thired_condition()" class="fiber_warp_thired_cond1 form-control col-md-12 col-xs-12">'
                  +'<option value="" selected="selected">Select Condition</option>'
                  +'<option value="1" <?php echo ($_POST["fiber_warp_thired_cond1"] == "1") ? "selected" : "" ?> >(</option>'
                  +'<option value="2" <?php echo ($_POST["fiber_warp_thired_cond1"] == "2") ? "selected" : "" ?> >[</option>'
                +'</select>'
              +'</div>'
              +'<div class="col-md-1 col-sm-1 col-xs-2">'
                +'<input type="text" id="fiber_warp_thired_value1" name="fiber_warp_thired_value1" value="<?php echo isset($_POST["fiber_warp_thired_value1"]) ? $_POST["fiber_warp_thired_value1"] : "" ?>" class="fiber_warp_thired_value1 form-control col-md-7 col-xs-12">'
              +'</div>'
              +'<div class="col-md-1 col-sm-1 col-xs-2" style="text-align: center;">'
                +'--'
              +'</div> '
              +'<div class="col-md-1 col-sm-1 col-xs-2">'
                +'<input type="text" id="fiber_warp_thired_value2" name="fiber_warp_thired_value2" value="<?php echo isset($_POST["fiber_warp_thired_value2"]) ? $_POST["fiber_warp_thired_value2"] : "" ?>" class="fiber_warp_thired_value2 form-control col-md-7 col-xs-12">'
              +'</div>'
              +'<div class="col-md-1 col-sm-1 col-xs-2">'
                +'<select id="fiber_warp_thired_cond2" name="fiber_warp_thired_cond2" class="fiber_warp_thired_cond2 form-control col-md-12 col-xs-12">'
                  +'<option value="" selected="selected">Select Condition</option>'
                  +'<option value="1" <?php echo ($_POST["fiber_warp_thired_cond2"] == "1") ? "selected" : "" ?> >)</option>'
                  +'<option value="2" <?php echo ($_POST["fiber_warp_thired_cond2"] == "2") ? "selected" : "" ?> >]</option>'
                +'</select>'
              +'</div>'

              +'<!-- start fourth option -->'
              +'<label class="control-label col-md-3 col-sm-3 col-xs-12" for="fiber_warp">'
              +'</label>'
              +'<div class="col-md-1 col-sm-1 col-xs-2">'
                +'<input type="text" id="fiber_warp_name_fourth" name="fiber_warp_name_fourth" value="<?php echo isset($_POST["fiber_warp_name_fourth"]) ? $_POST["fiber_warp_name_fourth"] : "" ?>" class="fiber_warp_name_fourth form-control col-md-7 col-xs-12">'
              +'</div>'

              +'<div class="col-md-1 col-sm-1 col-xs-2">'
                +'<input type="text" id="fiber_warp_fourth_tol_value1" name="fiber_warp_fourth_tol_value1" oninput="fiber_warp_fourth_tol_cal_1();" class="fiber_warp_fourth_tol_value1 form-control col-md-7 col-xs-12">'
              +'</div>'

              +'<div class="col-md-1 col-sm-1 col-xs-2" style="text-align: center;">'
                +'<select id="fiber_warp_fourth_tol_cond" name="fiber_warp_fourth_tol_cond" onchange="fiber_warp_fourth_tol_condition();" class="fiber_warp_fourth_tol_cond select2 pp_number form-control col-md-12 col-xs-12">'
                  +'<option value="1" selected="selected" > &plusmn; </option>'
                  +'<option value="2" > + </option>'
                  +'<option value="3" > - </option>'
                +'</select> '
              +'</div> '

              +'<div class="col-md-1 col-sm-1 col-xs-2" style="text-align: center;">'
                +'<input type="text" id="fiber_warp_fourth_tol_value2" name="fiber_warp_fourth_tol_value2" oninput="fiber_warp_fourth_tol_cal_2();" class="fiber_warp_fourth_tol_value2 form-control col-md-7 col-xs-12"> '
              +'</div>'

              +'<div class="col-md-1 col-sm-1 col-xs-2">'
                +'<select id="fiber_warp_fourth_cond1" name="fiber_warp_fourth_cond1" onchange="fiber_warp_fourth_condition()" class="fiber_warp_fourth_cond1 form-control col-md-12 col-xs-12">'
                  +'<option value="" selected="selected">Select Condition</option>'
                  +'<option value="1" <?php echo ($_POST["fiber_warp_fourth_cond1"] == "1") ? "selected" : "" ?> >(</option>'
                  +'<option value="2" <?php echo ($_POST["fiber_warp_fourth_cond1"] == "2") ? "selected" : "" ?> >[</option>'
                +'</select>'
              +'</div>'
              +'<div class="col-md-1 col-sm-1 col-xs-2">'
                +'<input type="text" id="fiber_warp_fourth_value1" name="fiber_warp_fourth_value1" value="<?php echo isset($_POST["fiber_warp_fourth_value1"]) ? $_POST["fiber_warp_fourth_value1"] : "" ?>" class="fiber_warp_fourth_value1 form-control col-md-7 col-xs-12">'
              +'</div>'
              +'<div class="col-md-1 col-sm-1 col-xs-2" style="text-align: center;">'
                +'--'
              +'</div> '
              +'<div class="col-md-1 col-sm-1 col-xs-2">'
                +'<input type="text" id="fiber_warp_fourth_value2" name="fiber_warp_fourth_value2" value="<?php echo isset($_POST["fiber_warp_fourth_value2"]) ? $_POST["fiber_warp_fourth_value2"] : "" ?>" class="fiber_warp_fourth_value2 form-control col-md-7 col-xs-12">'
              +'</div>'
              +'<div class="col-md-1 col-sm-1 col-xs-2">'
                +'<select id="fiber_warp_fourth_cond2" name="fiber_warp_fourth_cond2" class="fiber_warp_fourth_cond2 form-control col-md-12 col-xs-12">'
                  +'<option value="" selected="selected">Select Condition</option>'
                  +'<option value="1" <?php echo ($_POST["fiber_warp_fourth_cond2"] == "1") ? "selected" : "" ?> >)</option>'
                  +'<option value="2" <?php echo ($_POST["fiber_warp_fourth_cond2"] == "2") ? "selected" : "" ?> >]</option>'
                +'</select>'
              +'</div>'

            +'</div>'
            +'<!-- end of new formet change -->'


            +'<br>'
            +'<!-- change for new formet -->'
            +'<div class="form-group">  '
              +'<label class="control-label col-md-3 col-sm-3 col-xs-12" for="fiber_weft">Weft Fiber Content'
              +'</label>'
              +'<!-- start polyster -->'
              +'<div class="col-md-1 col-sm-1 col-xs-2">'
                +'<input type="text" id="fiber_weft_name_polyester" name="fiber_weft_name_polyester" value="<?php echo isset($_POST["fiber_weft_name_polyester"]) ? $_POST["fiber_weft_name_polyester"] : "polyester" ?>" readonly class="fiber_weft_name_polyester form-control col-md-7 col-xs-12">'
              +'</div>'

              +'<div class="col-md-1 col-sm-1 col-xs-2">'
                +'<input type="text" id="fiber_weft_polyester_tol_value1" name="fiber_weft_polyester_tol_value1" oninput="fiber_weft_polyester_tol_cal_1();" class="fiber_weft_polyester_tol_value1 form-control col-md-7 col-xs-12">'
              +'</div>'

              +'<div class="col-md-1 col-sm-1 col-xs-2" style="text-align: center;">'
                +'<select id="fiber_weft_polyester_tol_cond" name="fiber_weft_polyester_tol_cond" onchange="fiber_weft_polyester_tol_condition();" class="fiber_weft_polyester_tol_cond select2 pp_number form-control col-md-12 col-xs-12">'
                  +'<option value="1" selected="selected" > &plusmn; </option>'
                  +'<option value="2" > + </option>'
                  +'<option value="3" > - </option>'
                +'</select> '
              +'</div> '

              +'<div class="col-md-1 col-sm-1 col-xs-2" style="text-align: center;">'
                +'<input type="text" id="fiber_weft_polyester_tol_value2" name="fiber_weft_polyester_tol_value2" oninput="fiber_weft_polyester_tol_cal_2();" class="fiber_weft_polyester_tol_value2 form-control col-md-7 col-xs-12"> '
              +'</div>'

              +'<div class="col-md-1 col-sm-1 col-xs-2">'
                +'<select id="fiber_weft_polyester_cond1" name="fiber_weft_polyester_cond1" onchange="fiber_weft_polyester_condition()" class="fiber_weft_polyester_cond1 form-control col-md-12 col-xs-12">'
                  +'<option value="" selected="selected">Select Condition</option>'
                  +'<option value="1" <?php echo ($_POST["fiber_weft_polyester_cond1"] == "1") ? "selected" : "" ?> >(</option>'
                  +'<option value="2" <?php echo ($_POST["fiber_weft_polyester_cond1"] == "2") ? "selected" : "" ?> >[</option>'
                +'</select>'
              +'</div>'
              +'<div class="col-md-1 col-sm-1 col-xs-2">'
                +'<input type="text" id="fiber_weft_polyester_value1" name="fiber_weft_polyester_value1" value="<?php echo isset($_POST["fiber_weft_polyester_value1"]) ? $_POST["fiber_weft_polyester_value1"] : "" ?>" class="fiber_weft_polyester_value1 form-control col-md-7 col-xs-12">'
              +'</div>'
              +'<div class="col-md-1 col-sm-1 col-xs-2" style="text-align: center;">'
                +'--'
              +'</div> '
              +'<div class="col-md-1 col-sm-1 col-xs-2">'
                +'<input type="text" id="fiber_weft_polyester_value2" name="fiber_weft_polyester_value2" value="<?php echo isset($_POST["fiber_weft_polyester_value2"]) ? $_POST["fiber_weft_polyester_value2"] : "" ?>" class="fiber_weft_polyester_value2 form-control col-md-7 col-xs-12">'
              +'</div>'
              +'<div class="col-md-1 col-sm-1 col-xs-2">'
                +'<select id="fiber_weft_polyester_cond2" name="fiber_weft_polyester_cond2" class="fiber_weft_polyester_cond2 form-control col-md-12 col-xs-12">'
                  +'<option value="" selected="selected">Select Condition</option>'
                  +'<option value="1" <?php echo ($_POST["fiber_weft_polyester_cond2"] == "1") ? "selected" : "" ?> >)</option>'
                  +'<option value="2" <?php echo ($_POST["fiber_weft_polyester_cond2"] == "2") ? "selected" : "" ?> >]</option>'
                +'</select>'
              +'</div>'

              +'<!-- start cotton -->'
              +'<label class="control-label col-md-3 col-sm-3 col-xs-12" for="fiber_weft">'
              +'</label>'
              +'<div class="col-md-1 col-sm-1 col-xs-2">'
                +'<input type="text" id="fiber_weft_name_cotton" name="fiber_weft_name_cotton" value="<?php echo isset($_POST["fiber_weft_name_cotton"]) ? $_POST["fiber_weft_name_cotton"] : "cotton" ?>" readonly class="fiber_weft_name_cotton form-control col-md-7 col-xs-12">'
              +'</div>'

              +'<div class="col-md-1 col-sm-1 col-xs-2">'
                +'<input type="text" id="fiber_weft_cotton_tol_value1" name="fiber_weft_cotton_tol_value1" oninput="fiber_weft_cotton_tol_cal_1();" class="fiber_weft_cotton_tol_value1 form-control col-md-7 col-xs-12">'
              +'</div>'

              +'<div class="col-md-1 col-sm-1 col-xs-2" style="text-align: center;">'
                +'<select id="fiber_weft_cotton_tol_cond" name="fiber_weft_cotton_tol_cond" onchange="fiber_weft_cotton_tol_condition();" class="fiber_weft_cotton_tol_cond select2 pp_number form-control col-md-12 col-xs-12">'
                  +'<option value="1" selected="selected" > &plusmn; </option>'
                  +'<option value="2" > + </option>'
                  +'<option value="3" > - </option>'
                +'</select>'
              +'</div> '

              +'<div class="col-md-1 col-sm-1 col-xs-2" style="text-align: center;">'
                +'<input type="text" id="fiber_weft_cotton_tol_value2" name="fiber_weft_cotton_tol_value2" oninput="fiber_weft_cotton_tol_cal_2();" class="fiber_weft_cotton_tol_value2 form-control col-md-7 col-xs-12"> '
              +'</div>'

              +'<div class="col-md-1 col-sm-1 col-xs-2">'
                +'<select id="fiber_weft_cotton_cond1" name="fiber_weft_cotton_cond1" onchange="fiber_weft_cotton_condition()" class="fiber_weft_cotton_cond1 form-control col-md-12 col-xs-12">'
                  +'<option value="" selected="selected">Select Condition</option>'
                  +'<option value="1" <?php echo ($_POST["fiber_weft_cotton_cond1"] == "1") ? "selected" : "" ?> >(</option>'
                  +'<option value="2" <?php echo ($_POST["fiber_weft_cotton_cond1"] == "2") ? "selected" : "" ?> >[</option>'
                +'</select>'
              +'</div>'
              +'<div class="col-md-1 col-sm-1 col-xs-2">'
                +'<input type="text" id="fiber_weft_cotton_value1" name="fiber_weft_cotton_value1" value="<?php echo isset($_POST["fiber_weft_cotton_value1"]) ? $_POST["fiber_weft_cotton_value1"] : "" ?>" class="fiber_weft_cotton_value1 form-control col-md-7 col-xs-12">'
              +'</div>'
              +'<div class="col-md-1 col-sm-1 col-xs-2" style="text-align: center;">'
                +'--'
              +'</div> '
              +'<div class="col-md-1 col-sm-1 col-xs-2">'
                +'<input type="text" id="fiber_weft_cotton_value2" name="fiber_weft_cotton_value2" value="<?php echo isset($_POST["fiber_weft_cotton_value2"]) ? $_POST["fiber_weft_cotton_value2"] : "" ?>" class="fiber_weft_cotton_value2 form-control col-md-7 col-xs-12">'
              +'</div>'
              +'<div class="col-md-1 col-sm-1 col-xs-2">'
                +'<select id="fiber_weft_cotton_cond2" name="fiber_weft_cotton_cond2" class="fiber_weft_cotton_cond2 form-control col-md-12 col-xs-12">'
                  +'<option value="" selected="selected">Select Condition</option>'
                  +'<option value="1" <?php echo ($_POST["fiber_weft_cotton_cond2"] == "1") ? "selected" : "" ?> >)</option>'
                  +'<option value="2" <?php echo ($_POST["fiber_weft_cotton_cond2"] == "2") ? "selected" : "" ?> >]</option>'
                +'</select>'
              +'</div>'

              +'<!-- start thired option -->'
              +'<label class="control-label col-md-3 col-sm-3 col-xs-12" for="fiber_weft">'
              +'</label>'
              +'<div class="col-md-1 col-sm-1 col-xs-2">'
                +'<input type="text" id="fiber_weft_name_thired" name="fiber_weft_name_thired" value="<?php echo isset($_POST["fiber_weft_name_thired"]) ? $_POST["fiber_weft_name_thired"] : "" ?>" class="fiber_weft_name_thired form-control col-md-7 col-xs-12">'
              +'</div>'

              +'<div class="col-md-1 col-sm-1 col-xs-2">'
                +'<input type="text" id="fiber_weft_thired_tol_value1" name="fiber_weft_thired_tol_value1" oninput="fiber_weft_thired_tol_cal_1();" class="fiber_weft_thired_tol_value1 form-control col-md-7 col-xs-12">'
              +'</div>'

              +'<div class="col-md-1 col-sm-1 col-xs-2" style="text-align: center;">'
                +'<select id="fiber_weft_thired_tol_cond" name="fiber_weft_thired_tol_cond" onchange="fiber_weft_thired_tol_condition();" class="fiber_weft_thired_tol_cond select2 pp_number form-control col-md-12 col-xs-12">'
                  +'<option value="1" selected="selected" > &plusmn; </option>'
                  +'<option value="2" > + </option>'
                  +'<option value="3" > - </option>'
                +'</select> '
              +'</div> '

              +'<div class="col-md-1 col-sm-1 col-xs-2" style="text-align: center;">'
                +'<input type="text" id="fiber_weft_thired_tol_value2" name="fiber_weft_thired_tol_value2" oninput="fiber_weft_thired_tol_cal_2();" class="fiber_weft_thired_tol_value2 form-control col-md-7 col-xs-12"> '
              +'</div>'

              +'<div class="col-md-1 col-sm-1 col-xs-2">'
                +'<select id="fiber_weft_thired_cond1" name="fiber_weft_thired_cond1" onchange="fiber_weft_thired_condition()" class="fiber_weft_thired_cond1 form-control col-md-12 col-xs-12">'
                  +'<option value="" selected="selected">Select Condition</option>'
                  +'<option value="1" <?php echo ($_POST["fiber_weft_thired_cond1"] == "1") ? "selected" : "" ?> >(</option>'
                  +'<option value="2" <?php echo ($_POST["fiber_weft_thired_cond1"] == "2") ? "selected" : "" ?> >[</option>'
                +'</select>'
              +'</div>'
              +'<div class="col-md-1 col-sm-1 col-xs-2">'
                +'<input type="text" id="fiber_weft_thired_value1" name="fiber_weft_thired_value1" value="<?php echo isset($_POST["fiber_weft_thired_value1"]) ? $_POST["fiber_weft_thired_value1"] : "" ?>" class="fiber_weft_thired_value1 form-control col-md-7 col-xs-12">'
              +'</div>'
              +'<div class="col-md-1 col-sm-1 col-xs-2" style="text-align: center;">'
                +'--'
              +'</div> '
              +'<div class="col-md-1 col-sm-1 col-xs-2">'
                +'<input type="text" id="fiber_weft_thired_value2" name="fiber_weft_thired_value2" value="<?php echo isset($_POST["fiber_weft_thired_value2"]) ? $_POST["fiber_weft_thired_value2"] : "" ?>" class="fiber_weft_thired_value2 form-control col-md-7 col-xs-12">'
              +'</div>'
              +'<div class="col-md-1 col-sm-1 col-xs-2">'
                +'<select id="fiber_weft_thired_cond2" name="fiber_weft_thired_cond2" class="fiber_weft_thired_cond2 form-control col-md-12 col-xs-12">'
                  +'<option value="" selected="selected">Select Condition</option>'
                  +'<option value="1" <?php echo ($_POST["fiber_weft_thired_cond2"] == "1") ? "selected" : "" ?> >)</option>'
                  +'<option value="2" <?php echo ($_POST["fiber_weft_thired_cond2"] == "2") ? "selected" : "" ?> >]</option>'
                +'</select>'
              +'</div>'

              +'<!-- start fourth option -->'
              +'<label class="control-label col-md-3 col-sm-3 col-xs-12" for="fiber_weft">'
              +'</label>'
              +'<div class="col-md-1 col-sm-1 col-xs-2">'
                +'<input type="text" id="fiber_weft_name_fourth" name="fiber_weft_name_fourth" value="<?php echo isset($_POST["fiber_weft_name_fourth"]) ? $_POST["fiber_weft_name_fourth"] : "" ?>"  class="fiber_weft_name_fourth form-control col-md-7 col-xs-12">'
              +'</div>'

              +'<div class="col-md-1 col-sm-1 col-xs-2">'
                +'<input type="text" id="fiber_weft_fourth_tol_value1" name="fiber_weft_fourth_tol_value1" oninput="fiber_weft_fourth_tol_cal_1();" class="fiber_weft_fourth_tol_value1 form-control col-md-7 col-xs-12">'
              +'</div>'

              +'<div class="col-md-1 col-sm-1 col-xs-2" style="text-align: center;">'
                +'<select id="fiber_weft_fourth_tol_cond" name="fiber_weft_fourth_tol_cond" onchange="fiber_weft_fourth_tol_condition();" class="fiber_weft_fourth_tol_cond select2 pp_number form-control col-md-12 col-xs-12">'
                  +'<option value="1" selected="selected" > &plusmn; </option>'
                  +'<option value="2" > + </option>'
                  +'<option value="3" > - </option>'
                +'</select> '
              +'</div> '

              +'<div class="col-md-1 col-sm-1 col-xs-2" style="text-align: center;">'
                +'<input type="text" id="fiber_weft_fourth_tol_value2" name="fiber_weft_fourth_tol_value2" oninput="fiber_weft_fourth_tol_cal_2();" class="fiber_weft_fourth_tol_value2 form-control col-md-7 col-xs-12"> '
              +'</div>'

              +'<div class="col-md-1 col-sm-1 col-xs-2">'
                +'<select id="fiber_weft_fourth_cond1" name="fiber_weft_fourth_cond1" onchange="fiber_weft_fourth_condition()" class="fiber_weft_fourth_cond1 form-control col-md-12 col-xs-12">'
                  +'<option value="" selected="selected">Select Condition</option>'
                  +'<option value="1" <?php echo ($_POST["fiber_weft_fourth_cond1"] == "1") ? "selected" : "" ?> >(</option>'
                  +'<option value="2" <?php echo ($_POST["fiber_weft_fourth_cond1"] == "2") ? "selected" : "" ?> >[</option>'
                +'</select>'
              +'</div>'
              +'<div class="col-md-1 col-sm-1 col-xs-2">'
                +'<input type="text" id="fiber_weft_fourth_value1" name="fiber_weft_fourth_value1" value="<?php echo isset($_POST["fiber_weft_fourth_value1"]) ? $_POST["fiber_weft_fourth_value1"] : "" ?>" class="fiber_weft_fourth_value1 form-control col-md-7 col-xs-12">'
              +'</div>'
              +'<div class="col-md-1 col-sm-1 col-xs-2" style="text-align: center;">'
                +'--'
              +'</div> '
              +'<div class="col-md-1 col-sm-1 col-xs-2">'
                +'<input type="text" id="fiber_weft_fourth_value2" name="fiber_weft_fourth_value2" value="<?php echo isset($_POST["fiber_weft_fourth_value2"]) ? $_POST["fiber_weft_fourth_value2"] : "" ?>" class="fiber_weft_fourth_value2 form-control col-md-7 col-xs-12">'
              +'</div>'
              +'<div class="col-md-1 col-sm-1 col-xs-2">'
                +'<select id="fiber_weft_fourth_cond2" name="fiber_weft_fourth_cond2" class="fiber_weft_fourth_cond2 form-control col-md-12 col-xs-12">'
                  +'<option value="" selected="selected">Select Condition</option>'
                  +'<option value="1" <?php echo ($_POST["fiber_weft_fourth_cond2"] == "1") ? "selected" : "" ?> >)</option>'
                  +'<option value="2" <?php echo ($_POST["fiber_weft_fourth_cond2"] == "2") ? "selected" : "" ?> >]</option>'
                +'</select>'
              +'</div>'

            +'</div>'
            +'<!-- end of new formet change -->';

            $('#fiber_content_selected').html(total_content);
        }
    }


</script>