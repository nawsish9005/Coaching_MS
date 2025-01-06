<?php
session_start();
require_once("../includes/db_session_chk.php");
if ($_POST['pp_no_id'] && $_POST['pp_version_standard']) 
{
    $pp_no_id = $_POST['pp_no_id'];
    $pp_version_standard = $_POST['pp_version_standard'];
}

?>

<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12" id="retrieve_edit_data" style="padding-bottom: 20px;">
    
    <!-- add greige standard of single pp number -->
    <div class="x_panel">
      <div class="x_title">
        <h2>Standard for Raising Process Form</h2>
        <ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
          </li>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <br />

        <form id="raising_variable_form" name="raising_variable_form" data-parsley-validate class="form-horizontal form-label-left">

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

        <div class="ln_solid"></div>
          <div class="form-group">
            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
              <input type="hidden" id="pp_id_number" name="pp_id_number" value="<?php echo $pp_no_id; ?>">
              <input type="hidden" id="pp_version_standard" name="pp_version_standard" value="<?php echo $pp_version_standard; ?>">
              <button type="button" name="submit" id="submit" class="btn btn-success" onclick="send_data_of_define_standard_of_raising_form_to_database('<?php echo $pp_no_id; ?>');">Submit</button>
              <button type="reset" name="reset" id="reset" class="btn btn-info">Reset</button>
            </div>
          </div>
    
  </div>
</div>
<!-- main content again finished -->
<?php
?>


<script type="text/javascript">

  
</script>