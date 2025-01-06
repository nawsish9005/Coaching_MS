<?php
?>
<!-- main content again -->

<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12" id="retrieve_edit_data" style="padding-bottom: 20px;">
    
    <!-- add greige standard of single pp number -->
    <div class="x_panel">
      <div class="x_title">
        <h2>Standard for Sanforizing Process Form</h2>
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

            <label class="control-label col-md-6 col-sm-6 col-xs-12" for="wash_dry_warp_before_iron">Dimensional Change to Washing & Drying Warp (Befor Iron)
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

            <label class="control-label col-md-6 col-sm-6 col-xs-12" for="wash_dry_weft_before_iron">Dimensional Change to Washing & Drying Weft (Befor Iron)
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

            <label class="control-label col-md-6 col-sm-6 col-xs-12" for="wash_dry_warp_after_iron">Dimensional Change to Washing & Drying Warp (After Iron)
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

            <label class="control-label col-md-6 col-sm-6 col-xs-12" for="wash_dry_weft_after_iron">Dimensional Change to Washing & Drying Weft (After Iron)
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


          <!-- <div class="form-group">

            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="mass_per_unit_per_area">Mass per Unit per Area (%)<span class="required">*</span>
            </label>

            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="mass_per_unit_per_area_tol_value1" name="mass_per_unit_per_area_tol_value1" oninput="mass_per_unit_per_area_tol_condition();" class="mass_per_unit_per_area_tol_value1 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              <select id="mass_per_unit_per_area_tol_cond" name="mass_per_unit_per_area_tol_cond" onchange="mass_per_unit_per_area_tol_condition();" class="mass_per_unit_per_area_tol_cond select2 pp_number form-control col-md-12 col-xs-12">
                <option value="1" selected="selected" > &plusmn; </option>
                <option value="2" > + </option>
                <option value="3" > - </option>
              </select> 
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="mass_per_unit_per_area_tol_value2" name="mass_per_unit_per_area_tol_value2" oninput="mass_per_unit_per_area_tol_condition();" class="mass_per_unit_per_area_tol_value2 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              <select id="mass_per_unit_per_area_unit" name="mass_per_unit_per_area_unit" class="mass_per_unit_per_area_unit form-control col-md-12 col-xs-12">
                <option value="gm/m2" selected <?php echo ($_POST['mass_per_unit_per_area_unit'] == 'gm/m2') ? 'selected' : '' ?> >gm/m2</option>
                <option value="oz/yd2" <?php echo ($_POST['mass_per_unit_per_area_unit'] == 'oz/yd2') ? 'selected' : '' ?> >oz/yd2</option>
              </select>
            </div>

            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="mass_per_unit_per_area_cond1" name="mass_per_unit_per_area_cond1" onchange="mass_per_unit_per_area_tol_condition()" class="mass_per_unit_per_area_cond1 form-control col-md-12 col-xs-12">
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
          </div> -->



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



    
         <!--  <input type="hidden" id="update" name="update" value="2" > -->

          <br>

          

          <!-- start seam slipage -->
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

          <!-- end seam slipage -->

          <br>

          <div class="ln_solid"></div>
          <div class="form-group">
            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
              <input type="hidden" id="pp_id_number" name="pp_id_number" value="<?php echo $pp_no_id; ?>">
              <input type="hidden" id="pp_details_id" name="pp_details_id" value="<?php echo $pp_version; ?>">
              <button type="button" name="submit" id="submit" class="btn btn-success" onclick="send_data_of_define_standard_of_sanforizing_form_to_database('<?php echo $pp_version;?>');">Submit</button>
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

    
    
    
</script>