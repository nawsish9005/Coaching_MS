<?php
session_start();
require_once("../includes/db_session_chk.php");
$pp_no = $_POST['pp_no'];
$color = $_POST['color'];
$version = $_POST['version'];
$gray_width = $_POST['gray_width'];
$pp_no_id = $_POST['pp_id_number'];

if (($pp_no == '') || (empty($pp_no)) || is_null($pp_no) || ($color == '') || (empty($color)) || is_null($color) || ($version == '') || (empty($version)) || is_null($version) || ($gray_width == '') || (empty($gray_width)) || is_null($gray_width) || ($pp_no_id == '') || (empty($pp_no_id)) || is_null($pp_no_id)) 
{
   header("Location: gray_variable.php");
}

$sql_for_curing_standard = "SELECT * FROM defining_curing_qc_standard WHERE pp_no_id = '$pp_no_id' AND active = '1' ";
$res_for_curing_standard = mysqli_query($con , $sql_for_curing_standard);
$row_for_curing_standard = mysqli_fetch_array($res_for_curing_standard);
?>


<div class="x_panel">
  <div class="x_title">
    <h2>Curing Standards Edit Form</h2>
    <ul class="nav navbar-right panel_toolbox">
      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
      </li>
    </ul>
    <div class="clearfix"></div>
  </div>
  <div class="x_content">
    <br />

    <form id="curing_standard_form" name="curing_standard_form" data-parsley-validate class="form-horizontal form-label-left">
      
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

            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="rubbing_dry"> Rubbing Dry 
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
                <option value="1" <?php echo ($row_for_curing_standard['rubbing_dry_cond1'] == '1') ? 'selected' : '' ?> >(</option>
                <option value="2" <?php echo ($row_for_curing_standard['rubbing_dry_cond1'] == '2') ? 'selected' : '' ?> >[</option>
              </select>
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="rubbing_dry_value1" name="rubbing_dry_value1" value="<?php echo isset($row_for_curing_standard['rubbing_dry_value1']) ? $row_for_curing_standard['rubbing_dry_value1'] : "" ?>" class="rubbing_dry_value1 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              --
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="rubbing_dry_value2" name="rubbing_dry_value2" value="<?php echo isset($row_for_curing_standard['rubbing_dry_value2']) ? $row_for_curing_standard['rubbing_dry_value2'] : "" ?>" class="rubbing_dry_value2 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="rubbing_dry_cond2" name="rubbing_dry_cond2" class="rubbing_dry_cond2 form-control col-md-12 col-xs-12">
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($row_for_curing_standard['rubbing_dry_cond2'] == '1') ? 'selected' : '' ?> >)</option>
                <option value="2" <?php echo ($row_for_curing_standard['rubbing_dry_cond2'] == '2') ? 'selected' : '' ?> >]</option>
              </select>
            </div>
          </div>

          <br>


          <div class="form-group">

            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="rubbing_wet"> Rubbing Wet 
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
                <option value="1" <?php echo ($row_for_curing_standard['rubbing_wet_cond1'] == '1') ? 'selected' : '' ?> >(</option>
                <option value="2" <?php echo ($row_for_curing_standard['rubbing_wet_cond1'] == '2') ? 'selected' : '' ?> >[</option>
              </select>
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="rubbing_wet_value1" name="rubbing_wet_value1" value="<?php echo isset($row_for_curing_standard['rubbing_wet_value1']) ? $row_for_curing_standard['rubbing_wet_value1'] : "" ?>" class="rubbing_wet_value1 form-control col-md-7 col-xs-12">
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              --
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="rubbing_wet_value2" name="rubbing_wet_value2" value="<?php echo isset($row_for_curing_standard['rubbing_wet_value2']) ? $row_for_curing_standard['rubbing_wet_value2'] : "" ?>" class="rubbing_wet_value2 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="rubbing_wet_cond2" name="rubbing_wet_cond2" class="rubbing_wet_cond2 form-control col-md-12 col-xs-12">
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($row_for_curing_standard['rubbing_wet_cond2'] == '1') ? 'selected' : '' ?> >)</option>
                <option value="2" <?php echo ($row_for_curing_standard['rubbing_wet_cond2'] == '2') ? 'selected' : '' ?> >]</option>
              </select>
            </div>
          </div>

          <br>


          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="yarn_count">Yarn Count Warp For Tolarance
            </label>

            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="yarn_warp_tol_value" name="yarn_warp_tol_value" oninput="yarn_warp_tol();" class="yarn_warp_tol_value1 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              <input type="text" id="yarn_warp_tol_positive" placeholder="For +" name="yarn_warp_tol_positive" oninput="yarn_warp_tol();" class="yarn_warp_tol_positive form-control col-md-7 col-xs-12">
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="yarn_warp_tol_negative" placeholder="For -" name="yarn_warp_tol_negative" oninput="yarn_warp_tol();" class="yarn_warp_tol_negative form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              % 
            </div>

            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="yarn_warp_cond1" name="yarn_warp_cond1" onchange="yarn_condition()" class="yarn_warp_cond1 form-control col-md-12 col-xs-12">
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($row_for_curing_standard['yarn_warp_cond1'] == '1') ? 'selected' : '' ?> >(</option>
                <option value="2" <?php echo ($row_for_curing_standard['yarn_warp_cond1'] == '2') ? 'selected' : '' ?> >[</option>
              </select>
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="yarn_warp_value1" name="yarn_warp_value1" value="<?php echo isset($row_for_curing_standard['yarn_warp_value1']) ? $row_for_curing_standard['yarn_warp_value1'] : "" ?>" class="yarn_warp_value1 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              --
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="yarn_warp_value2" name="yarn_warp_value2" value="<?php echo isset($row_for_curing_standard['yarn_warp_value2']) ? $row_for_curing_standard['yarn_warp_value2'] : "" ?>" class="yarn_warp_value2 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="yarn_warp_cond2" name="yarn_warp_cond2" class="yarn_warp_cond2 form-control col-md-12 col-xs-12">
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($row_for_curing_standard['yarn_warp_cond2'] == '1') ? 'selected' : '' ?> >)</option>
                <option value="2" <?php echo ($row_for_curing_standard['yarn_warp_cond2'] == '2') ? 'selected' : '' ?> >]</option>
              </select>
            </div>
          </div>

          <br>

          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="yarn_count">Yarn Count Weft For Tolarance
            </label>

            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="yarn_weft_tol_value" name="yarn_weft_tol_value" oninput="yarn_weft_tol();" class="yarn_weft_tol_value1 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              <input type="text" id="yarn_weft_tol_positive" placeholder="For +" name="yarn_weft_tol_positive" oninput="yarn_weft_tol();" class="yarn_weft_tol_positive form-control col-md-7 col-xs-12">
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="yarn_weft_tol_negative" placeholder="For -" name="yarn_weft_tol_negative" oninput="yarn_weft_tol();" class="yarn_weft_tol_negative form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              % 
            </div>

            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="yarn_weft_cond1" name="yarn_weft_cond1" onchange="yarn_condition()" class="yarn_weft_cond1 form-control col-md-12 col-xs-12">
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($row_for_curing_standard['yarn_weft_cond1'] == '1') ? 'selected' : '' ?> >(</option>
                <option value="2" <?php echo ($row_for_curing_standard['yarn_weft_cond1'] == '2') ? 'selected' : '' ?> >[</option>
              </select>
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="yarn_weft_value1" name="yarn_weft_value1" value="<?php echo isset($row_for_curing_standard['yarn_weft_value1']) ? $row_for_curing_standard['yarn_weft_value1'] : "" ?>" class="yarn_weft_value1 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              --
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="yarn_weft_value2" name="yarn_weft_value2" value="<?php echo isset($row_for_curing_standard['yarn_weft_value2']) ? $row_for_curing_standard['yarn_weft_value2'] : "" ?>" class="yarn_weft_value2 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="yarn_weft_cond2" name="yarn_weft_cond2" class="yarn_weft_cond2 form-control col-md-12 col-xs-12">
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($row_for_curing_standard['yarn_weft_cond2'] == '1') ? 'selected' : '' ?> >)</option>
                <option value="2" <?php echo ($row_for_curing_standard['yarn_weft_cond2'] == '2') ? 'selected' : '' ?> >]</option>
              </select>
            </div>
          </div>

          <br>

          <div class="form-group">

            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="thread_epi">Thread Count EPI For Tolarance
            </label>

            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="thread_epi_tol_value1" name="thread_epi_tol_value1" oninput="thread_epi_tol_cal_1();" class="thread_epi_tol_value1 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              <select id="thread_epi_tol_cond" name="thread_epi_tol_cond" onchange="thread_epi_tol_condition();" class="thread_epi_tol_cond select2 pp_number form-control col-md-12 col-xs-12">
                <option value="1" selected="selected" > &plusmn; </option>
                <option value="2" > + </option>
                <option value="3" > - </option>
              </select> 
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="thread_epi_tol_value2" name="thread_epi_tol_value2" oninput="thread_epi_tol_cal_2();" class="thread_epi_tol_value2 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              = 
            </div>

            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="thread_epi_cond1" name="thread_epi_cond1" onchange="thread_epi_condition()" class="thread_epi_cond1 form-control col-md-12 col-xs-12">
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($row_for_curing_standard['thread_epi_cond1'] == '1') ? 'selected' : '' ?> >(</option>
                <option value="2" <?php echo ($row_for_curing_standard['thread_epi_cond1'] == '2') ? 'selected' : '' ?> >[</option>
              </select>
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="thread_epi_value1" name="thread_epi_value1" value="<?php echo isset($row_for_curing_standard['thread_epi_value1']) ? $row_for_curing_standard['thread_epi_value1'] : "" ?>" class="thread_epi_value1 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              --
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="thread_epi_value2" name="thread_epi_value2" value="<?php echo isset($row_for_curing_standard['thread_epi_value2']) ? $row_for_curing_standard['thread_epi_value2'] : "" ?>" class="thread_epi_value2 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="thread_epi_cond2" name="thread_epi_cond2" class="thread_epi_cond2 form-control col-md-12 col-xs-12">
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($row_for_curing_standard['thread_epi_cond2'] == '1') ? 'selected' : '' ?> >)</option>
                <option value="2" <?php echo ($row_for_curing_standard['thread_epi_cond2'] == '2') ? 'selected' : '' ?> >]</option>
              </select>
            </div>
          </div>

          <br>

          <div class="form-group">
            
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="thread_ppi">Thread Count PPI For Tolarance
            </label>

            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="thread_ppi_tol_value1" name="thread_ppi_tol_value1" oninput="thread_ppi_tol_cal_1();" class="thread_ppi_tol_value1 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              <select id="thread_ppi_tol_cond" name="thread_ppi_tol_cond" onchange="thread_ppi_tol_condition();" class="thread_ppi_tol_cond select2 pp_number form-control col-md-12 col-xs-12">
                <option value="1" selected="selected" > &plusmn; </option>
                <option value="2" > + </option>
                <option value="3" > - </option>
              </select> 
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="thread_ppi_tol_value2" name="thread_ppi_tol_value2" oninput="thread_ppi_tol_cal_2();" class="thread_ppi_tol_value2 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              = 
            </div>

            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="thread_ppi_cond1" name="thread_ppi_cond1" onchange="thread_ppi_condition()" class="thread_ppi_cond1 form-control col-md-12 col-xs-12">
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($row_for_curing_standard['thread_ppi_cond1'] == '1') ? 'selected' : '' ?> >(</option>
                <option value="2" <?php echo ($row_for_curing_standard['thread_ppi_cond1'] == '2') ? 'selected' : '' ?> >[</option>
              </select>
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="thread_ppi_value1" name="thread_ppi_value1" value="<?php echo isset($row_for_curing_standard['thread_ppi_value1']) ? $row_for_curing_standard['thread_ppi_value1'] : "" ?>" class="thread_ppi_value1 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              --
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="thread_ppi_value2" name="thread_ppi_value2" value="<?php echo isset($row_for_curing_standard['thread_ppi_value2']) ? $row_for_curing_standard['thread_ppi_value2'] : "" ?>" class="thread_ppi_value2 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="thread_ppi_cond2" name="thread_ppi_cond2" class="thread_ppi_cond2 form-control col-md-12 col-xs-12">
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($row_for_curing_standard['thread_ppi_cond2'] == '1') ? 'selected' : '' ?> >)</option>
                <option value="2" <?php echo ($row_for_curing_standard['thread_ppi_cond2'] == '2') ? 'selected' : '' ?> >]</option>
              </select>
            </div>
          </div>

          <br>

          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="gsm_warp">GSM For Tolarance
            </label>

            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="gsm_warp_tol_value" name="gsm_warp_tol_value" oninput="gsm_warp_tol();" class="gsm_warp_tol_value1 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              <input type="text" id="gsm_warp_tol_positive" placeholder="For +" name="gsm_warp_tol_positive" oninput="gsm_warp_tol();" class="gsm_warp_tol_positive form-control col-md-7 col-xs-12">
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="gsm_warp_tol_negative" placeholder="For -" name="gsm_warp_tol_negative" oninput="gsm_warp_tol();" class="gsm_warp_tol_negative form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              % 
            </div>

            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="gsm_warp_cond1" name="gsm_warp_cond1" onchange="gsm_condition()" class="gsm_warp_cond1 form-control col-md-12 col-xs-12">
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($row_for_curing_standard['gsm_warp_cond1'] == '1') ? 'selected' : '' ?> >(</option>
                <option value="2" <?php echo ($row_for_curing_standard['gsm_warp_cond1'] == '2') ? 'selected' : '' ?> >[</option>
              </select>
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="gsm_warp_value1" name="gsm_warp_value1" value="<?php echo isset($row_for_curing_standard['gsm_warp_value1']) ? $row_for_curing_standard['gsm_warp_value1'] : "" ?>" class="gsm_warp_value1 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              --
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="gsm_warp_value2" name="gsm_warp_value2" value="<?php echo isset($row_for_curing_standard['gsm_warp_value2']) ? $row_for_curing_standard['gsm_warp_value2'] : "" ?>" class="gsm_warp_value2 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="gsm_warp_cond2" name="gsm_warp_cond2" class="gsm_warp_cond2 form-control col-md-12 col-xs-12">
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($row_for_curing_standard['gsm_warp_cond2'] == '1') ? 'selected' : '' ?> >)</option>
                <option value="2" <?php echo ($row_for_curing_standard['gsm_warp_cond2'] == '2') ? 'selected' : '' ?> >]</option>
              </select>
            </div>
          </div>


          <br>

          <div class="form-group">

            <label class="control-label col-md-6 col-sm-6 col-xs-12" for="time">Time/Minute <span class="required">*</span>
            </label>

            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              =
            </div>

            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="time_cond1" name="time_cond1" onchange="time_condition()" class="cf_rubbing_wet_cond1 form-control col-md-12 col-xs-12">
                <option value="2" selected="selected" <?php echo ($row_for_curing_standard['time_cond1'] == '2') ? 'selected' : '' ?> >[</option>
                <option value="1" <?php echo ($row_for_curing_standard['time_cond1'] == '1') ? 'selected' : '' ?> >(</option>
              </select>
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="time_value1" name="time_value1" value="<?php echo isset($row_for_curing_standard['time_value1']) ? $row_for_curing_standard['time_value1'] : "" ?>" class="time_value1 form-control col-md-7 col-xs-12">
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              --
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="time_value2" name="time_value2" value="<?php echo isset($row_for_curing_standard['time_value2']) ? $row_for_curing_standard['time_value2'] : "" ?>" class="time_value2 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="time_cond2" name="time_cond2" class="time_cond2 form-control col-md-12 col-xs-12">
                <option value="2" selected="selected" <?php echo ($row_for_curing_standard['time_cond2'] == '2') ? 'selected' : '' ?> >]</option>
                <option value="1" <?php echo ($row_for_curing_standard['time_cond2'] == '1') ? 'selected' : '' ?> >)</option>
              </select>
            </div>
          </div>

          <br>


          <div class="form-group">

            <label class="control-label col-md-6 col-sm-6 col-xs-12" for="temp">Temperature <span class="required">*</span>
            </label>

            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              =
            </div>

            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="temp_cond1" name="temp_cond1" onchange="temp_condition()" class="cf_rubbing_wet_cond1 form-control col-md-12 col-xs-12">
                <option value="2" selected="selected" <?php echo ($row_for_curing_standard['temp_cond1'] == '2') ? 'selected' : '' ?> >[</option>
                <option value="1" <?php echo ($row_for_curing_standard['temp_cond1'] == '1') ? 'selected' : '' ?> >(</option>
              </select>
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="temp_value1" name="temp_value1" value="<?php echo isset($row_for_curing_standard['temp_value1']) ? $row_for_curing_standard['temp_value1'] : "" ?>" class="temp_value1 form-control col-md-7 col-xs-12">
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              --
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="temp_value2" name="temp_value2" value="<?php echo isset($row_for_curing_standard['temp_value2']) ? $row_for_curing_standard['temp_value2'] : "" ?>" class="temp_value2 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="temp_cond2" name="temp_cond2" class="temp_cond2 form-control col-md-12 col-xs-12">
                <option value="2" selected="selected" <?php echo ($row_for_curing_standard['temp_cond2'] == '2') ? 'selected' : '' ?> >]</option>
                <option value="1" <?php echo ($row_for_curing_standard['temp_cond2'] == '1') ? 'selected' : '' ?> >)</option>
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
                <option value="2" selected="selected" <?php echo ($row_for_curing_standard['wash_dry_warp_before_iron_cond1'] == '2') ? 'selected' : '' ?> >[</option>
                <option value="1" <?php echo ($row_for_curing_standard['wash_dry_warp_before_iron_cond1'] == '1') ? 'selected' : '' ?> >(</option>
              </select>
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="wash_dry_warp_before_iron_value1" name="wash_dry_warp_before_iron_value1" value="<?php echo isset($row_for_curing_standard['wash_dry_warp_before_iron_value1']) ? $row_for_curing_standard['wash_dry_warp_before_iron_value1'] : "" ?>" class="wash_dry_warp_before_iron_value1 form-control col-md-7 col-xs-12">
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              --
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="wash_dry_warp_before_iron_value2" name="wash_dry_warp_before_iron_value2" value="<?php echo isset($row_for_curing_standard['wash_dry_warp_before_iron_value2']) ? $row_for_curing_standard['wash_dry_warp_before_iron_value2'] : "" ?>" class="wash_dry_warp_before_iron_value2 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="wash_dry_warp_before_iron_cond2" name="wash_dry_warp_before_iron_cond2" class="wash_dry_warp_before_iron_cond2 form-control col-md-12 col-xs-12">
                <option value="2" selected="selected" <?php echo ($row_for_curing_standard['wash_dry_warp_before_iron_cond2'] == '2') ? 'selected' : '' ?> >]</option>
                <option value="1" <?php echo ($row_for_curing_standard['wash_dry_warp_before_iron_cond2'] == '1') ? 'selected' : '' ?> >)</option>
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
                <option value="2" selected="selected" <?php echo ($row_for_curing_standard['wash_dry_warp_before_iron_cond1'] == '2') ? 'selected' : '' ?> >[</option>
                <option value="1" <?php echo ($row_for_curing_standard['wash_dry_warp_before_iron_cond1'] == '1') ? 'selected' : '' ?> >(</option>
              </select>
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="wash_dry_weft_before_iron_value1" name="wash_dry_weft_before_iron_value1" value="<?php echo isset($row_for_curing_standard['wash_dry_weft_before_iron_value1']) ? $row_for_curing_standard['wash_dry_weft_before_iron_value1'] : "" ?>" class="wash_dry_weft_before_iron_value1 form-control col-md-7 col-xs-12">
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              --
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="wash_dry_weft_before_iron_value2" name="wash_dry_weft_before_iron_value2" value="<?php echo isset($row_for_curing_standard['wash_dry_weft_before_iron_value2']) ? $row_for_curing_standard['wash_dry_weft_before_iron_value2'] : "" ?>" class="wash_dry_weft_before_iron_value2 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="wash_dry_weft_before_iron_cond2" name="wash_dry_weft_before_iron_cond2" class="wash_dry_weft_before_iron_cond2 form-control col-md-12 col-xs-12">
                <option value="2" selected="selected" <?php echo ($row_for_curing_standard['wash_dry_weft_before_iron_cond2'] == '2') ? 'selected' : '' ?> >]</option>
                <option value="1" <?php echo ($row_for_curing_standard['wash_dry_weft_before_iron_cond2'] == '1') ? 'selected' : '' ?> >)</option>
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
                <option value="2" selected="selected" <?php echo ($row_for_curing_standard['wash_dry_warp_after_iron_cond1'] == '2') ? 'selected' : '' ?> >[</option>
                <option value="1" <?php echo ($row_for_curing_standard['wash_dry_warp_after_iron_cond1'] == '1') ? 'selected' : '' ?> >(</option>
              </select>
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="wash_dry_warp_after_iron_value1" name="wash_dry_warp_after_iron_value1" value="<?php echo isset($row_for_curing_standard['wash_dry_warp_after_iron_value1']) ? $row_for_curing_standard['wash_dry_warp_after_iron_value1'] : "" ?>" class="wash_dry_warp_after_iron_value1 form-control col-md-7 col-xs-12">
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              --
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="wash_dry_warp_after_iron_value2" name="wash_dry_warp_after_iron_value2" value="<?php echo isset($row_for_curing_standard['wash_dry_warp_after_iron_value2']) ? $row_for_curing_standard['wash_dry_warp_after_iron_value2'] : "" ?>" class="wash_dry_warp_after_iron_value2 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="wash_dry_warp_after_iron_cond2" name="wash_dry_warp_after_iron_cond2" class="wash_dry_warp_after_iron_cond2 form-control col-md-12 col-xs-12">
                <option value="2" selected="selected" <?php echo ($row_for_curing_standard['wash_dry_warp_after_iron_cond2'] == '2') ? 'selected' : '' ?> >]</option>
                <option value="1" <?php echo ($row_for_curing_standard['wash_dry_warp_after_iron_cond2'] == '1') ? 'selected' : '' ?> >)</option>
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
                <option value="2" selected="selected" <?php echo ($row_for_curing_standard['wash_dry_warp_after_iron_cond1'] == '2') ? 'selected' : '' ?> >[</option>
                <option value="1" <?php echo ($row_for_curing_standard['wash_dry_warp_after_iron_cond1'] == '1') ? 'selected' : '' ?> >(</option>
              </select>
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="wash_dry_weft_after_iron_value1" name="wash_dry_weft_after_iron_value1" value="<?php echo isset($row_for_curing_standard['wash_dry_weft_after_iron_value1']) ? $row_for_curing_standard['wash_dry_weft_after_iron_value1'] : "" ?>" class="wash_dry_weft_after_iron_value1 form-control col-md-7 col-xs-12">
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              --
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="wash_dry_weft_after_iron_value2" name="wash_dry_weft_after_iron_value2" value="<?php echo isset($row_for_curing_standard['wash_dry_weft_after_iron_value2']) ? $row_for_curing_standard['wash_dry_weft_after_iron_value2'] : "" ?>" class="wash_dry_weft_after_iron_value2 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="wash_dry_weft_after_iron_cond2" name="wash_dry_weft_after_iron_cond2" class="wash_dry_weft_after_iron_cond2 form-control col-md-12 col-xs-12">
                <option value="2" selected="selected" <?php echo ($row_for_curing_standard['wash_dry_weft_after_iron_cond2'] == '2') ? 'selected' : '' ?> >]</option>
                <option value="1" <?php echo ($row_for_curing_standard['wash_dry_weft_after_iron_cond2'] == '1') ? 'selected' : '' ?> >)</option>
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
                <option value="N" selected <?php echo ($row_for_curing_standard['tensile_warp_unit'] == 'N') ? 'selected' : '' ?> >N</option>
                <option value="kg" <?php echo ($row_for_curing_standard['tensile_warp_unit'] == 'kg') ? 'selected' : '' ?> >kg</option>
                <option value="lbf" <?php echo ($row_for_curing_standard['tensile_warp_unit'] == 'lbf') ? 'selected' : '' ?> >lbf</option>
                <option value="gm" <?php echo ($row_for_curing_standard['tensile_warp_unit'] == 'gm') ? 'selected' : '' ?> >gm</option>
                <option value="daN" <?php echo ($row_for_curing_standard['tensile_warp_unit'] == 'daN') ? 'selected' : '' ?> >daN</option>
                <option value="oz" <?php echo ($row_for_curing_standard['tensile_warp_unit'] == 'oz') ? 'selected' : '' ?> >oz</option>
              </select>
            </div>

            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="tensile_warp_cond1" name="tensile_warp_cond1" onchange="tensile_warp_condition()" class="tensile_warp_cond1 form-control col-md-12 col-xs-12">
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($row_for_curing_standard['tensile_warp_cond1'] == '1') ? 'selected' : '' ?> >(</option>
                <option value="2" <?php echo ($row_for_curing_standard['tensile_warp_cond1'] == '2') ? 'selected' : '' ?> >[</option>
              </select>
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="tensile_warp_value1" name="tensile_warp_value1" value="<?php echo isset($row_for_curing_standard['tensile_warp_value1']) ? $row_for_curing_standard['tensile_warp_value1'] : "" ?>" class="tensile_warp_value1 form-control col-md-7 col-xs-12">
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              --
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="tensile_warp_value2" name="tensile_warp_value2" value="<?php echo isset($row_for_curing_standard['tensile_warp_value2']) ? $row_for_curing_standard['tensile_warp_value2'] : "" ?>" class="tensile_warp_value2 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="tensile_warp_cond2" name="tensile_warp_cond2" class="tensile_warp_cond2 form-control col-md-12 col-xs-12">
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($row_for_curing_standard['tensile_warp_cond2'] == '1') ? 'selected' : '' ?> >)</option>
                <option value="2" <?php echo ($row_for_curing_standard['tensile_warp_cond2'] == '2') ? 'selected' : '' ?> >]</option>
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
                <option value="N" selected <?php echo ($row_for_curing_standard['tensile_weft_unit'] == 'N') ? 'selected' : '' ?> >N</option>
                <option value="kg" <?php echo ($row_for_curing_standard['tensile_weft_unit'] == 'kg') ? 'selected' : '' ?> >kg</option>
                <option value="lbf" <?php echo ($row_for_curing_standard['tensile_weft_unit'] == 'lbf') ? 'selected' : '' ?> >lbf</option>
                <option value="gm" <?php echo ($row_for_curing_standard['tensile_weft_unit'] == 'gm') ? 'selected' : '' ?> >gm</option>
                <option value="daN" <?php echo ($row_for_curing_standard['tensile_weft_unit'] == 'daN') ? 'selected' : '' ?> >daN</option>
                <option value="oz" <?php echo ($row_for_curing_standard['tensile_weft_unit'] == 'oz') ? 'selected' : '' ?> >oz</option>
              </select>
            </div>

            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="tensile_weft_cond1" name="tensile_weft_cond1" onchange="tensile_weft_condition()" class="tensile_weft_cond1 form-control col-md-12 col-xs-12">
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($row_for_curing_standard['tensile_weft_cond1'] == '1') ? 'selected' : '' ?> >(</option>
                <option value="2" <?php echo ($row_for_curing_standard['tensile_weft_cond1'] == '2') ? 'selected' : '' ?> >[</option>
              </select>
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="tensile_weft_value1" name="tensile_weft_value1" value="<?php echo isset($row_for_curing_standard['tensile_weft_value1']) ? $row_for_curing_standard['tensile_weft_value1'] : "" ?>" class="tensile_weft_value1 form-control col-md-7 col-xs-12">
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              --
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="tensile_weft_value2" name="tensile_weft_value2" value="<?php echo isset($row_for_curing_standard['tensile_weft_value2']) ? $row_for_curing_standard['tensile_weft_value2'] : "" ?>" class="tensile_weft_value2 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="tensile_weft_cond2" name="tensile_weft_cond2" class="tensile_weft_cond2 form-control col-md-12 col-xs-12">
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($row_for_curing_standard['tensile_weft_cond2'] == '1') ? 'selected' : '' ?> >)</option>
                <option value="2" <?php echo ($row_for_curing_standard['tensile_weft_cond2'] == '2') ? 'selected' : '' ?> >]</option>
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
                <option value="N" selected <?php echo ($row_for_curing_standard['tear_force_warp_unit'] == 'N') ? 'selected' : '' ?> >N</option>
                <option value="kg" <?php echo ($row_for_curing_standard['tear_force_warp_unit'] == 'kg') ? 'selected' : '' ?> >kg</option>
                <option value="lbf" <?php echo ($row_for_curing_standard['tear_force_warp_unit'] == 'lbf') ? 'selected' : '' ?> >lbf</option>
                <option value="gm" <?php echo ($row_for_curing_standard['tear_force_warp_unit'] == 'gm') ? 'selected' : '' ?> >gm</option>
                <option value="daN" <?php echo ($row_for_curing_standard['tear_force_warp_unit'] == 'daN') ? 'selected' : '' ?> >daN</option>
                <option value="oz" <?php echo ($row_for_curing_standard['tear_force_warp_unit'] == 'oz') ? 'selected' : '' ?> >oz</option>
              </select>
            </div>

            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="tear_force_warp_cond1" name="tear_force_warp_cond1" onchange="tear_force_warp_condition()" class="tear_force_warp_cond1 form-control col-md-12 col-xs-12">
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($row_for_curing_standard['tear_force_warp_cond1'] == '1') ? 'selected' : '' ?> >(</option>
                <option value="2" <?php echo ($row_for_curing_standard['tear_force_warp_cond1'] == '2') ? 'selected' : '' ?> >[</option>
              </select>
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="tear_force_warp_value1" name="tear_force_warp_value1" value="<?php echo isset($row_for_curing_standard['tear_force_warp_value1']) ? $row_for_curing_standard['tear_force_warp_value1'] : "" ?>" class="tear_force_warp_value1 form-control col-md-7 col-xs-12">
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              --
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="tear_force_warp_value2" name="tear_force_warp_value2" value="<?php echo isset($row_for_curing_standard['tear_force_warp_value2']) ? $row_for_curing_standard['tear_force_warp_value2'] : "" ?>" class="tear_force_warp_value2 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="tear_force_warp_cond2" name="tear_force_warp_cond2" class="tear_force_warp_cond2 form-control col-md-12 col-xs-12">
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($row_for_curing_standard['tear_force_warp_cond2'] == '1') ? 'selected' : '' ?> >)</option>
                <option value="2" <?php echo ($row_for_curing_standard['tear_force_warp_cond2'] == '2') ? 'selected' : '' ?> >]</option>
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
                <option value="N" selected <?php echo ($row_for_curing_standard['tear_force_weft_unit'] == 'N') ? 'selected' : '' ?> >N</option>
                <option value="kg" <?php echo ($row_for_curing_standard['tear_force_weft_unit'] == 'kg') ? 'selected' : '' ?> >kg</option>
                <option value="lbf" <?php echo ($row_for_curing_standard['tear_force_weft_unit'] == 'lbf') ? 'selected' : '' ?> >lbf</option>
                <option value="gm" <?php echo ($row_for_curing_standard['tear_force_weft_unit'] == 'gm') ? 'selected' : '' ?> >gm</option>
                <option value="daN" <?php echo ($row_for_curing_standard['tear_force_weft_unit'] == 'daN') ? 'selected' : '' ?> >daN</option>
                <option value="oz" <?php echo ($row_for_curing_standard['tear_force_weft_unit'] == 'oz') ? 'selected' : '' ?> >oz</option>
              </select>
            </div>

            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="tear_force_weft_cond1" name="tear_force_weft_cond1" onchange="tear_force_weft_condition()" class="tear_force_weft_cond1 form-control col-md-12 col-xs-12">
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($row_for_curing_standard['tear_force_weft_cond1'] == '1') ? 'selected' : '' ?> >(</option>
                <option value="2" <?php echo ($row_for_curing_standard['tear_force_weft_cond1'] == '2') ? 'selected' : '' ?> >[</option>
              </select>
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="tear_force_weft_value1" name="tear_force_weft_value1" value="<?php echo isset($row_for_curing_standard['tear_force_weft_value1']) ? $row_for_curing_standard['tear_force_weft_value1'] : "" ?>" class="tear_force_weft_value1 form-control col-md-7 col-xs-12">
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              --
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="tear_force_weft_value2" name="tear_force_weft_value2" value="<?php echo isset($row_for_curing_standard['tear_force_weft_value2']) ? $row_for_curing_standard['tear_force_weft_value2'] : "" ?>" class="tear_force_weft_value2 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="tear_force_weft_cond2" name="tear_force_weft_cond2" class="tear_force_weft_cond2 form-control col-md-12 col-xs-12">
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($row_for_curing_standard['tear_force_weft_cond2'] == '1') ? 'selected' : '' ?> >)</option>
                <option value="2" <?php echo ($row_for_curing_standard['tear_force_weft_cond2'] == '2') ? 'selected' : '' ?> >]</option>
              </select>
            </div>
          </div>

          <br>

          <div class="form-group">

            <label class="control-label col-md-3 col-sm-3 col-xs-6" for="washing_ph">Fabric pH
            </label>

            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="washing_ph_cond1" name="washing_ph_cond1" onchange="washing_ph_condition()" class="cf_rubbing_wet_cond1 form-control col-md-12 col-xs-12">
                <option value="2" selected="selected" <?php echo ($row_for_curing_standard['washing_ph_cond1'] == '2') ? 'selected' : '' ?> >[</option>
                <option value="1" <?php echo ($row_for_curing_standard['washing_ph_cond1'] == '1') ? 'selected' : '' ?> >(</option>
              </select>
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="washing_ph_value1" name="washing_ph_value1" value="<?php echo isset($row_for_curing_standard['washing_ph_value1']) ? $row_for_curing_standard['washing_ph_value1'] : "" ?>" class="washing_ph_value1 form-control col-md-7 col-xs-12">
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              --
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="washing_ph_value2" name="washing_ph_value2" value="<?php echo isset($row_for_curing_standard['washing_ph_value2']) ? $row_for_curing_standard['washing_ph_value2'] : "" ?>" class="washing_ph_value2 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="washing_ph_cond2" name="washing_ph_cond2" class="washing_ph_cond2 form-control col-md-12 col-xs-12">
                <option value="2" selected="selected" <?php echo ($row_for_curing_standard['washing_ph_cond2'] == '2') ? 'selected' : '' ?> >]</option>
                <option value="1" <?php echo ($row_for_curing_standard['washing_ph_cond2'] == '1') ? 'selected' : '' ?> >)</option>
              </select>
            </div>

            <div class="col-md-4 col-sm-4 col-xs-6">
              
            </div>
          </div>


          <br>

          <div class="form-group">

            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="pilling">Pilling (ISO 12945-2)
            </label>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="pilling_tol_value1" name="pilling_tol_value1" oninput="pilling_tol_cal_1();" class="pilling_tol_value1 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              <select id="pilling_tol_cond" name="pilling_tol_cond" onchange="pilling_tol_condition();" class="pilling_tol_cond select2 pp_number form-control col-md-12 col-xs-12">
                <option value="1" selected="selected" > &plusmn; </option>
                <option value="2" > + </option>
                <option value="3" > - </option>
              </select>
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="pilling_tol_value2" name="pilling_tol_value2" oninput="pilling_tol_cal_2();" class="pilling_tol_value2 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              % 
            </div>

            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="pilling_cond1" name="pilling_cond1" onchange="pilling_condition()" class="pilling_cond1 form-control col-md-12 col-xs-12">
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($row_for_curing_standard['pilling_cond1'] == '1') ? 'selected' : '' ?> >(</option>
                <option value="2" <?php echo ($row_for_curing_standard['pilling_cond1'] == '2') ? 'selected' : '' ?> >[</option>
              </select>
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="pilling_value1" name="pilling_value1" value="<?php echo isset($row_for_curing_standard['pilling_value1']) ? $row_for_curing_standard['pilling_value1'] : '' ?>" class="pilling_value1 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              --
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="pilling_value2" name="pilling_value2"  value="<?php echo isset($row_for_curing_standard['pilling_value2']) ? $row_for_curing_standard['pilling_value2'] : '' ?>"class="pilling_value2 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="pilling_cond2" name="pilling_cond2" class="pilling_cond2 form-control col-md-12 col-xs-12">
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($row_for_curing_standard['pilling_cond2'] == '1') ? 'selected' : '' ?> >)</option>
                <option value="2" <?php echo ($row_for_curing_standard['pilling_cond2'] == '2') ? 'selected' : '' ?> >]</option>
              </select>
            </div>
          </div>

          <br>

      <div class="ln_solid"></div>
      <div class="form-group">
        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
          <input type="hidden" id="pp_no_id" name="pp_no_id" value="<?php echo $pp_no_id; ?>">
          <input type="hidden" id="pp_version_standard" name="pp_version_standard" value="8">
          <input type="hidden" id="curing_standard_id" name="curing_standard_id" value="<?php echo $row_for_curing_standard['curing_standard_id']; ?>">
          <button type="button" name="submit" id="submit" onclick="update_edit_curing_standard_data('<?php echo $pp_no_id; ?>');" class="btn btn-success" >Update</button>
          <button type="button" name="submit" id="submit" onclick="cancel_edit_curing_standard_data();" class="btn btn-success" >Cancel</button>
        </div>
      </div>

    </form>
  </div>
</div>


<?php  ?>