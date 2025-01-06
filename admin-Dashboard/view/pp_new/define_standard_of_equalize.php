<?php
?>

<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12" id="retrieve_edit_data" style="padding-bottom: 20px;">

    <!-- add greige standard of single pp number -->
    <div class="x_panel">
      <div class="x_title">
        <h2>Standard for Equalize Process Form</h2>
        <ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
          </li>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <br />

        <form id="equalize_standard_form" name="equalize_standard_form" data-parsley-validate class="form-horizontal form-label-left">
          
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

            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="whiteness">Whiteness-Barger (°) <span class="required">*</span>
            </label>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="whiteness_tol_value1" name="whiteness_tol_value1" oninput="whiteness_tol_cal_1();" class="whiteness_tol_value1 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              <select id="whiteness_tol_cond" name="whiteness_tol_cond" onchange="whiteness_tol_condition();" class="whiteness_tol_cond select2 pp_number form-control col-md-12 col-xs-12">
                <option value="1" selected="selected" > &plusmn; </option>
                <option value="2" > + </option>
                <option value="3" > - </option>
              </select>
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="whiteness_tol_value2" name="whiteness_tol_value2" oninput="whiteness_tol_cal_2();" class="whiteness_tol_value2 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
               
            </div>

            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="whiteness_cond1" name="whiteness_cond1" onchange="whiteness_condition()" class="whiteness_cond1 form-control col-md-12 col-xs-12">
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($_POST['whiteness_cond1'] == '1') ? 'selected' : '' ?> >(</option>
                <option value="2" <?php echo ($_POST['whiteness_cond1'] == '2') ? 'selected' : '' ?> >[</option>
              </select>
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="whiteness_value1" name="whiteness_value1" value="<?php echo isset($_POST['whiteness_value1']) ? $_POST['whiteness_value1'] : '' ?>" class="whiteness_value1 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              --
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="whiteness_value2" name="whiteness_value2" value="<?php echo isset($_POST['whiteness_value2']) ? $_POST['whiteness_value2'] : '' ?>" class="whiteness_value2 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="whiteness_cond2" name="whiteness_cond2" class="whiteness_cond2 form-control col-md-12 col-xs-12">
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($_POST['whiteness_cond2'] == '1') ? 'selected' : '' ?> >)</option>
                <option value="2" <?php echo ($_POST['whiteness_cond2'] == '2') ? 'selected' : '' ?> >]</option>
              </select>
            </div>
          </div>

          <br>

          <div class="form-group">

            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="bowing_and_skew">Bowing & Skew <span class="required">*</span>
            </label>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="bowing_and_skew_tol_value1" name="bowing_and_skew_tol_value1" oninput="bowing_and_skew_tol_cal_1();" class="bowing_and_skew_tol_value1 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              <select id="bowing_and_skew_tol_cond" name="bowing_and_skew_tol_cond" onchange="bowing_and_skew_tol_condition();" class="bowing_and_skew_tol_cond select2 pp_number form-control col-md-12 col-xs-12">
                <option value="1" selected="selected" > &plusmn; </option>
                <option value="2" > + </option>
                <option value="3" > - </option>
              </select>
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="bowing_and_skew_tol_value2" name="bowing_and_skew_tol_value2" oninput="bowing_and_skew_tol_cal_2();" class="bowing_and_skew_tol_value2 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              
            </div>

            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="bowing_and_skew_cond1" name="bowing_and_skew_cond1" onchange="bowing_and_skew_condition()" class="bowing_and_skew_cond1 form-control col-md-12 col-xs-12">
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($_POST['bowing_and_skew_cond1'] == '1') ? 'selected' : '' ?> >(</option>
                <option value="2" <?php echo ($_POST['bowing_and_skew_cond1'] == '2') ? 'selected' : '' ?> >[</option>
              </select>
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="bowing_and_skew_value1" name="bowing_and_skew_value1" value="<?php echo isset($_POST['bowing_and_skew_value1']) ? $_POST['bowing_and_skew_value1'] : '' ?>" class="bowing_and_skew_value1 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              --
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="bowing_and_skew_value2" name="bowing_and_skew_value2"  value="<?php echo isset($_POST['bowing_and_skew_value2']) ? $_POST['bowing_and_skew_value2'] : '' ?>"class="bowing_and_skew_value2 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="bowing_and_skew_cond2" name="bowing_and_skew_cond2" class="bowing_and_skew_cond2 form-control col-md-12 col-xs-12">
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($_POST['bowing_and_skew_cond2'] == '1') ? 'selected' : '' ?> >)</option>
                <option value="2" <?php echo ($_POST['bowing_and_skew_cond2'] == '2') ? 'selected' : '' ?> >]</option>
              </select>
            </div>
          </div>

          <br>

          <div class="form-group">

            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ph">pH <span class="required">*</span>
            </label>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="ph_tol_value1" name="ph_tol_value1" oninput="ph_tol_cal_1();" class="ph_tol_value1 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              <select id="ph_tol_cond" name="ph_tol_cond" onchange="ph_tol_condition();" class="ph_tol_cond select2 pp_number form-control col-md-12 col-xs-12">
                <option value="1" selected="selected" > &plusmn; </option>
                <option value="2" > + </option>
                <option value="3" > - </option>
              </select>
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="ph_tol_value2" name="ph_tol_value2" oninput="ph_tol_cal_2();" class="ph_tol_value2 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
               
            </div>

            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="ph_cond1" name="ph_cond1" onchange="ph_condition()" class="ph_cond1 form-control col-md-12 col-xs-12">
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($_POST['ph_cond1'] == '1') ? 'selected' : '' ?> >(</option>
                <option value="2" <?php echo ($_POST['ph_cond1'] == '2') ? 'selected' : '' ?> >[</option>
              </select>
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="ph_value1" name="ph_value1" value="<?php echo isset($_POST['ph_value1']) ? $_POST['ph_value1'] : '' ?>" class="ph_value1 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              --
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="ph_value2" name="ph_value2" value="<?php echo isset($_POST['ph_value2']) ? $_POST['ph_value2'] : '' ?>" class="ph_value2 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="ph_cond2" name="ph_cond2" class="ph_cond2 form-control col-md-12 col-xs-12">
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($_POST['ph_cond2'] == '1') ? 'selected' : '' ?> >)</option>
                <option value="2" <?php echo ($_POST['ph_cond2'] == '2') ? 'selected' : '' ?> >]</option>
              </select>
            </div>
          </div>

          <div class="ln_solid"></div>
          <div class="form-group">
            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
              <input type="hidden" id="pp_id_number" name="pp_id_number" value="<?php echo $pp_no_id; ?>">
              <input type="hidden" id="pp_details_id" name="pp_details_id" value="<?php echo $pp_version; ?>">
              <button type="button" name="submit" id="submit" class="btn btn-success" onclick="send_data_of_define_standard_of_equalize_form_to_database('<?php echo $pp_version; ?>');">Submit</button>
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