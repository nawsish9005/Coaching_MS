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

$sql_for_gray_variable = "SELECT * FROM defining_gray_receiving_qc_standard WHERE pp_no_id = '$pp_no_id' AND pp_details_id = '$pp_details_id' AND active = '1' ";
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

    <table class="table table-striped table-bordered">
        <thead>
          <tr>
            <th>SI</th>
            <th>PP Version</th>
            <th>Color</th>
            <th>Greige Width (Inch)</th>
            <th>Finish Width (Inch)</th>
            <th>Order Quantity (Meter)</th>
          </tr>
        </thead>
        <?php 
            $sql = "SELECT * FROM pp_details
                      WHERE pp_id = '$pp_details_id' AND active = '1' ";
            $res = mysqli_query($con, $sql);
            $sl = 1;
            while($row_for_pp_details = mysqli_fetch_array($res))
            {
                ?>
                    <tbody>
                      <tr>
                        <td>1</td>
                        <td><?php echo $row_for_pp_details['version'] ?></td>
                        <td>
                          <?php 
                            $color_id = $row_for_pp_details['color'];
                            $sql_for_color = "SELECT color_name FROM color WHERE color_id = '$color_id'";
                            $res_for_color = mysqli_query($con, $sql_for_color);
                            $row_for_color = mysqli_fetch_assoc($res_for_color);
                            echo $row_for_color['color_name'];
                          ?>
                        </td>
                        <td><?php echo $row_for_pp_details['gray_width'] ?></td>
                        <td><?php echo $row_for_pp_details['finish_width'] ?></td>
                        <td><?php echo $row_for_pp_details['quantity'] ?></td>                   
                      </tr>
                    </tbody>
                <?php
                ++$sl;
            }
        ?>
      </table>

    <form id="gray_variable_form" name="gray_variable_form" data-parsley-validate class="form-horizontal form-label-left">
      

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
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="yarn_count">Yarn Count Warp For Tolarance<span class="required">*</span>
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
          
        </div>

        <div class="col-md-1 col-sm-1 col-xs-2">
          <select id="yarn_warp_cond1" name="yarn_warp_cond1" onchange="yarn_condition()" class="yarn_warp_cond1 form-control col-md-12 col-xs-12">
            <option value="" selected="selected">Select Condition</option>
            <option value="1" <?php echo ($row_for_gray_variable['yarn_warp_cond1'] == '1') ? 'selected' : '' ?> >(</option>
            <option value="2" <?php echo ($row_for_gray_variable['yarn_warp_cond1'] == '2') ? 'selected' : '' ?> >[</option>
          </select>
        </div>
        <div class="col-md-1 col-sm-1 col-xs-2">
          <input type="text" id="yarn_warp_value1" name="yarn_warp_value1" value="<?php echo isset($row_for_gray_variable['yarn_warp_value1']) ? $row_for_gray_variable['yarn_warp_value1'] : "" ?>" class="yarn_warp_value1 form-control col-md-7 col-xs-12">
        </div>
        <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
          --
        </div> 
        <div class="col-md-1 col-sm-1 col-xs-2">
          <input type="text" id="yarn_warp_value2" name="yarn_warp_value2" value="<?php echo isset($row_for_gray_variable['yarn_warp_value2']) ? $row_for_gray_variable['yarn_warp_value2'] : "" ?>" class="yarn_warp_value2 form-control col-md-7 col-xs-12">
        </div>
        <div class="col-md-1 col-sm-1 col-xs-2">
          <select id="yarn_warp_cond2" name="yarn_warp_cond2" class="yarn_warp_cond2 form-control col-md-12 col-xs-12">
            <option value="" selected="selected">Select Condition</option>
            <option value="1" <?php echo ($row_for_gray_variable['yarn_warp_cond2'] == '1') ? 'selected' : '' ?> >)</option>
            <option value="2" <?php echo ($row_for_gray_variable['yarn_warp_cond2'] == '2') ? 'selected' : '' ?> >]</option>
          </select>
        </div>
      </div>

      <br>

      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="yarn_count">Yarn Count Weft For Tolarance<span class="required">*</span>
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
          
        </div>

        <div class="col-md-1 col-sm-1 col-xs-2">
          <select id="yarn_weft_cond1" name="yarn_weft_cond1" onchange="yarn_condition()" class="yarn_weft_cond1 form-control col-md-12 col-xs-12">
            <option value="" selected="selected">Select Condition</option>
            <option value="1" <?php echo ($row_for_gray_variable['yarn_weft_cond1'] == '1') ? 'selected' : '' ?> >(</option>
            <option value="2" <?php echo ($row_for_gray_variable['yarn_weft_cond1'] == '2') ? 'selected' : '' ?> >[</option>
          </select>
        </div>
        <div class="col-md-1 col-sm-1 col-xs-2">
          <input type="text" id="yarn_weft_value1" name="yarn_weft_value1" value="<?php echo isset($row_for_gray_variable['yarn_weft_value1']) ? $row_for_gray_variable['yarn_weft_value1'] : "" ?>" class="yarn_weft_value1 form-control col-md-7 col-xs-12">
        </div>
        <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
          --
        </div> 
        <div class="col-md-1 col-sm-1 col-xs-2">
          <input type="text" id="yarn_weft_value2" name="yarn_weft_value2" value="<?php echo isset($row_for_gray_variable['yarn_weft_value2']) ? $row_for_gray_variable['yarn_weft_value2'] : "" ?>" class="yarn_weft_value2 form-control col-md-7 col-xs-12">
        </div>
        <div class="col-md-1 col-sm-1 col-xs-2">
          <select id="yarn_weft_cond2" name="yarn_weft_cond2" class="yarn_weft_cond2 form-control col-md-12 col-xs-12">
            <option value="" selected="selected">Select Condition</option>
            <option value="1" <?php echo ($row_for_gray_variable['yarn_weft_cond2'] == '1') ? 'selected' : '' ?> >)</option>
            <option value="2" <?php echo ($row_for_gray_variable['yarn_weft_cond2'] == '2') ? 'selected' : '' ?> >]</option>
          </select>
        </div>
      </div>

      <br>

      <div class="form-group">

        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="thread_epi">Thread Count EPI For Tolarance<span class="required">*</span>
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
           
        </div>

        <div class="col-md-1 col-sm-1 col-xs-2">
          <select id="thread_epi_cond1" name="thread_epi_cond1" onchange="thread_epi_condition()" class="thread_epi_cond1 form-control col-md-12 col-xs-12">
            <option value="" selected="selected">Select Condition</option>
            <option value="1" <?php echo ($row_for_gray_variable['thread_epi_cond1'] == '1') ? 'selected' : '' ?> >(</option>
            <option value="2" <?php echo ($row_for_gray_variable['thread_epi_cond1'] == '2') ? 'selected' : '' ?> >[</option>
          </select>
        </div>
        <div class="col-md-1 col-sm-1 col-xs-2">
          <input type="text" id="thread_epi_value1" name="thread_epi_value1" value="<?php echo isset($row_for_gray_variable['thread_epi_value1']) ? $row_for_gray_variable['thread_epi_value1'] : "" ?>" class="thread_epi_value1 form-control col-md-7 col-xs-12">
        </div>
        <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
          --
        </div> 
        <div class="col-md-1 col-sm-1 col-xs-2">
          <input type="text" id="thread_epi_value2" name="thread_epi_value2" value="<?php echo isset($row_for_gray_variable['thread_epi_value2']) ? $row_for_gray_variable['thread_epi_value2'] : "" ?>" class="thread_epi_value2 form-control col-md-7 col-xs-12">
        </div>
        <div class="col-md-1 col-sm-1 col-xs-2">
          <select id="thread_epi_cond2" name="thread_epi_cond2" class="thread_epi_cond2 form-control col-md-12 col-xs-12">
            <option value="" selected="selected">Select Condition</option>
            <option value="1" <?php echo ($row_for_gray_variable['thread_epi_cond2'] == '1') ? 'selected' : '' ?> >)</option>
            <option value="2" <?php echo ($row_for_gray_variable['thread_epi_cond2'] == '2') ? 'selected' : '' ?> >]</option>
          </select>
        </div>
      </div>

      <br>

      <div class="form-group">
        
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="thread_ppi">Thread Count PPI For Tolarance<span class="required">*</span>
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
          
        </div>

        <div class="col-md-1 col-sm-1 col-xs-2">
          <select id="thread_ppi_cond1" name="thread_ppi_cond1" onchange="thread_ppi_condition()" class="thread_ppi_cond1 form-control col-md-12 col-xs-12">
            <option value="" selected="selected">Select Condition</option>
            <option value="1" <?php echo ($row_for_gray_variable['thread_ppi_cond1'] == '1') ? 'selected' : '' ?> >(</option>
            <option value="2" <?php echo ($row_for_gray_variable['thread_ppi_cond1'] == '2') ? 'selected' : '' ?> >[</option>
          </select>
        </div>
        <div class="col-md-1 col-sm-1 col-xs-2">
          <input type="text" id="thread_ppi_value1" name="thread_ppi_value1" value="<?php echo isset($row_for_gray_variable['thread_ppi_value1']) ? $row_for_gray_variable['thread_ppi_value1'] : "" ?>" class="thread_ppi_value1 form-control col-md-7 col-xs-12">
        </div>
        <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
          --
        </div> 
        <div class="col-md-1 col-sm-1 col-xs-2">
          <input type="text" id="thread_ppi_value2" name="thread_ppi_value2" value="<?php echo isset($row_for_gray_variable['thread_ppi_value2']) ? $row_for_gray_variable['thread_ppi_value2'] : "" ?>" class="thread_ppi_value2 form-control col-md-7 col-xs-12">
        </div>
        <div class="col-md-1 col-sm-1 col-xs-2">
          <select id="thread_ppi_cond2" name="thread_ppi_cond2" class="thread_ppi_cond2 form-control col-md-12 col-xs-12">
            <option value="" selected="selected">Select Condition</option>
            <option value="1" <?php echo ($row_for_gray_variable['thread_ppi_cond2'] == '1') ? 'selected' : '' ?> >)</option>
            <option value="2" <?php echo ($row_for_gray_variable['thread_ppi_cond2'] == '2') ? 'selected' : '' ?> >]</option>
          </select>
        </div>
      </div>

      <br>

      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="gsm_warp">GSM For Tolarance<span class="required">*</span>
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
           
        </div>

        <div class="col-md-1 col-sm-1 col-xs-2">
          <select id="gsm_warp_cond1" name="gsm_warp_cond1" onchange="gsm_condition()" class="gsm_warp_cond1 form-control col-md-12 col-xs-12">
            <option value="" selected="selected">Select Condition</option>
            <option value="1" <?php echo ($row_for_gray_variable['gsm_warp_cond1'] == '1') ? 'selected' : '' ?> >(</option>
            <option value="2" <?php echo ($row_for_gray_variable['gsm_warp_cond1'] == '2') ? 'selected' : '' ?> >[</option>
          </select>
        </div>
        <div class="col-md-1 col-sm-1 col-xs-2">
          <input type="text" id="gsm_warp_value1" name="gsm_warp_value1" value="<?php echo isset($row_for_gray_variable['gsm_warp_value1']) ? $row_for_gray_variable['gsm_warp_value1'] : "" ?>" class="gsm_warp_value1 form-control col-md-7 col-xs-12">
        </div>
        <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
          --
        </div> 
        <div class="col-md-1 col-sm-1 col-xs-2">
          <input type="text" id="gsm_warp_value2" name="gsm_warp_value2" value="<?php echo isset($row_for_gray_variable['gsm_warp_value2']) ? $row_for_gray_variable['gsm_warp_value2'] : "" ?>" class="gsm_warp_value2 form-control col-md-7 col-xs-12">
        </div>
        <div class="col-md-1 col-sm-1 col-xs-2">
          <select id="gsm_warp_cond2" name="gsm_warp_cond2" class="gsm_warp_cond2 form-control col-md-12 col-xs-12">
            <option value="" selected="selected">Select Condition</option>
            <option value="1" <?php echo ($row_for_gray_variable['gsm_warp_cond2'] == '1') ? 'selected' : '' ?> >)</option>
            <option value="2" <?php echo ($row_for_gray_variable['gsm_warp_cond2'] == '2') ? 'selected' : '' ?> >]</option>
          </select>
        </div>
      </div>

      <br>

      <div class="form-group">
        
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="greige_width">Greige Width<span class="required">*</span>
        </label>

        <div class="col-md-1 col-sm-1 col-xs-2">
          <input type="text" id="greige_width_tol_value1" name="greige_width_tol_value1" oninput="greige_width_tol_cal_1();" class="greige_width_tol_value1 form-control col-md-7 col-xs-12">
        </div>
        <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
          <select id="greige_width_tol_cond" name="greige_width_tol_cond" onchange="greige_width_tol_condition();" class="greige_width_tol_cond select2 pp_number form-control col-md-12 col-xs-12">
            <option value="1" selected="selected" > &plusmn; </option>
            <option value="2" > + </option>
            <option value="3" > - </option>
          </select> 
        </div> 
        <div class="col-md-1 col-sm-1 col-xs-2">
          <input type="text" id="greige_width_tol_value2" name="greige_width_tol_value2" oninput="greige_width_tol_cal_2();" class="greige_width_tol_value2 form-control col-md-7 col-xs-12">
        </div>
        <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
          
        </div>

        <div class="col-md-1 col-sm-1 col-xs-2">
          <select id="greige_width_cond1" name="greige_width_cond1" onchange="greige_width_condition()" class="greige_width_cond1 form-control col-md-12 col-xs-12">
            <option value="" selected="selected">Select Condition</option>
            <option value="1" <?php echo ($row_for_gray_variable['greige_width_cond1'] == '1') ? 'selected' : '' ?> >(</option>
            <option value="2" <?php echo ($row_for_gray_variable['greige_width_cond1'] == '2') ? 'selected' : '' ?> >[</option>
          </select>
        </div>
        <div class="col-md-1 col-sm-1 col-xs-2">
          <input type="text" id="greige_width_value1" name="greige_width_value1" value="<?php echo isset($row_for_gray_variable['greige_width_value1']) ? $row_for_gray_variable['greige_width_value1'] : "" ?>" class="greige_width_value1 form-control col-md-7 col-xs-12">
        </div>
        <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
          --
        </div> 
        <div class="col-md-1 col-sm-1 col-xs-2">
          <input type="text" id="greige_width_value2" name="greige_width_value2" value="<?php echo isset($row_for_gray_variable['greige_width_value2']) ? $row_for_gray_variable['greige_width_value2'] : "" ?>" class="greige_width_value2 form-control col-md-7 col-xs-12">
        </div>
        <div class="col-md-1 col-sm-1 col-xs-2">
          <select id="greige_width_cond2" name="greige_width_cond2" class="greige_width_cond2 form-control col-md-12 col-xs-12">
            <option value="" selected="selected">Select Condition</option>
            <option value="1" <?php echo ($row_for_gray_variable['greige_width_cond2'] == '1') ? 'selected' : '' ?> >)</option>
            <option value="2" <?php echo ($row_for_gray_variable['greige_width_cond2'] == '2') ? 'selected' : '' ?> >]</option>
          </select>
        </div>
      </div>

      <br>

      <input type="hidden" id="update" name="update" value="yes" >

      <br>

      <?php 
          $fiber_content_select = $row_for_gray_variable['fiber_content_select'];
      ?>

      <div class="form-check form-check-inline text-center">
        <input class="form-check-input" type="radio" name="fiber_content" id="fiber_total" value="fiber_total" <?php if($fiber_content_select != '1') echo "disabled"; else echo "checked"; ?> >
        <label class="form-check-label" for="fiber_total">Fiber Total</label>
      
        <input class="form-check-input" type="radio" name="fiber_content" id="fiber_warp_weft" value="fiber_warp_weft" <?php if($fiber_content_select != '2') echo "disabled"; else echo "checked"; ?> >
        <label class="form-check-label" for="fiber_warp_weft">Fiber Warp & Weft</label>
      
        <input class="form-check-input" type="radio" name="fiber_content" id="fiber_both" value="fiber_both" <?php if($fiber_content_select != '3') echo "disabled"; else echo "checked"; ?> >
        <label class="form-check-label" for="fiber_both">Both</label>
      </div>
      
      <br>

      <?php 

      if ( $fiber_content_select == "1" )
      {
          ?>
          <div class="form-group">
                <input type="hidden" id="fiber_content_selected_for_number" name="fiber_content_selected_for_number" value="1" >
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fiber_total">Total Fiber Content<span class="required">*</span>
                </label>
                <!-- start polyster -->
                <div class="col-md-1 col-sm-1 col-xs-2">
                  <input type="text" id="fiber_total_name_polyester" name="fiber_total_name_polyester" value="polyester" readonly class="fiber_total_name_polyester form-control col-md-7 col-xs-12">
                </div>

                <div class="col-md-1 col-sm-1 col-xs-2">
                  <input type="text" id="fiber_total_polyester_tol_value1" name="fiber_total_polyester_tol_value1" oninput="fiber_total_polyester_tol_cal_1();" class="fiber_total_polyester_tol_value1_class form-control col-md-7 col-xs-12">
                </div>

                <div class="col-md-1 col-sm-1 col-xs-2" style="text-align: center;">
                  <select id="fiber_total_polyester_tol_cond" name="fiber_total_polyester_tol_cond" onchange="fiber_total_polyester_tol_condition();" class="fiber_total_polyester_tol_cond select2 pp_number form-control col-md-12 col-xs-12">
                    <option value="1" selected="selected" > &plusmn; </option>
                    <option value="2" > + </option>
                    <option value="3" > - </option>
                  </select> 
                </div> 

                <div class="col-md-1 col-sm-1 col-xs-2" style="text-align: center;">
                  <input type="text" id="fiber_total_polyester_tol_value2" name="fiber_total_polyester_tol_value2" oninput="fiber_total_polyester_tol_cal_2();" class="fiber_total_polyester_tol_value2_class form-control col-md-7 col-xs-12">
                </div>

                <div class="col-md-1 col-sm-1 col-xs-2">
                  <select id="fiber_total_polyester_cond1" name="fiber_total_polyester_cond1" onchange="fiber_total_polyester_condition()" class="fiber_total_polyester_cond1 form-control col-md-12 col-xs-12">
                    <option value="" selected="selected">Select Condition</option>
                    <option value="1" <?php echo ($row_for_gray_variable["fiber_total_polyester_cond1"] == "1") ? "selected" : "" ?> >(</option>
                    <option value="2" <?php echo ($row_for_gray_variable["fiber_total_polyester_cond1"] == "2") ? "selected" : "" ?> >[</option>
                  </select>
                </div>
                <div class="col-md-1 col-sm-1 col-xs-2">
                  <input type="text" id="fiber_total_polyester_value1" name="fiber_total_polyester_value1" value="<?php echo isset($row_for_gray_variable["fiber_total_polyester_value1"]) ? $row_for_gray_variable["fiber_total_polyester_value1"] : "" ?>" class="fiber_total_polyester_value1 form-control col-md-7 col-xs-12">
                </div>
                <div class="col-md-1 col-sm-1 col-xs-2" style="text-align: center;">
                  --
                </div>
                <div class="col-md-1 col-sm-1 col-xs-2">
                  <input type="text" id="fiber_total_polyester_value2" name="fiber_total_polyester_value2" value="<?php echo isset($row_for_gray_variable["fiber_total_polyester_value2"]) ? $row_for_gray_variable["fiber_total_polyester_value2"] : "" ?>" class="fiber_total_polyester_value2 form-control col-md-7 col-xs-12">
                </div>
                <div class="col-md-1 col-sm-1 col-xs-2">
                  <select id="fiber_total_polyester_cond2" name="fiber_total_polyester_cond2" class="fiber_total_polyester_cond2 form-control col-md-12 col-xs-12">
                    <option value="" selected="selected">Select Condition</option>
                    <option value="1" <?php echo ($row_for_gray_variable["fiber_total_polyester_cond2"] == "1") ? "selected" : "" ?> >)</option>
                    <option value="2" <?php echo ($row_for_gray_variable["fiber_total_polyester_cond2"] == "2") ? "selected" : "" ?> >]</option>
                  </select>
                </div>

                <!-- start cotton -->
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fiber_weft">
                </label>
                <div class="col-md-1 col-sm-1 col-xs-2">
                  <input type="text" id="fiber_total_name_cotton" name="fiber_total_name_cotton" value="cotton" readonly class="fiber_total_name_cotton form-control col-md-7 col-xs-12">
                </div>

                <div class="col-md-1 col-sm-1 col-xs-2">
                  <input type="text" id="fiber_total_cotton_tol_value1" name="fiber_total_cotton_tol_value1" oninput="fiber_total_cotton_tol_cal_1();" class="fiber_total_cotton_tol_value1_class form-control col-md-7 col-xs-12">
                </div>

                <div class="col-md-1 col-sm-1 col-xs-2" style="text-align: center;">
                  <select id="fiber_total_cotton_tol_cond" name="fiber_total_cotton_tol_cond" onchange="fiber_total_cotton_tol_condition();" class="fiber_total_cotton_tol_cond select2 pp_number form-control col-md-12 col-xs-12">
                    <option value="1" selected="selected" > &plusmn; </option>
                    <option value="2" > + </option>
                    <option value="3" > - </option>
                  </select> 
                </div> 
                <div class="col-md-1 col-sm-1 col-xs-2" style="text-align: center;">
                  <input type="text" id="fiber_total_cotton_tol_value2" name="fiber_total_cotton_tol_value2" oninput="fiber_total_cotton_tol_cal_2();" class="fiber_total_cotton_tol_value2 form-control col-md-7 col-xs-12">
                </div>

                <div class="col-md-1 col-sm-1 col-xs-2">
                  <select id="fiber_total_cotton_cond1" name="fiber_total_cotton_cond1" onchange="fiber_total_cotton_condition()" class="fiber_total_cotton_cond1 form-control col-md-12 col-xs-12">
                    <option value="" selected="selected">Select Condition</option>
                    <option value="1" <?php echo ($row_for_gray_variable["fiber_total_cotton_cond1"] == "1") ? "selected" : "" ?> >(</option>
                    <option value="2" <?php echo ($row_for_gray_variable["fiber_total_cotton_cond1"] == "2") ? "selected" : "" ?> >[</option>
                  </select>
                </div>
                <div class="col-md-1 col-sm-1 col-xs-2">
                  <input type="text" id="fiber_total_cotton_value1" name="fiber_total_cotton_value1" value="<?php echo isset($row_for_gray_variable["fiber_total_cotton_value1"]) ? $row_for_gray_variable["fiber_total_cotton_value1"] : "" ?>" class="fiber_total_cotton_value1 form-control col-md-7 col-xs-12">
                </div>
                <div class="col-md-1 col-sm-1 col-xs-2" style="text-align: center;">
                  --
                </div>
                <div class="col-md-1 col-sm-1 col-xs-2">
                  <input type="text" id="fiber_total_cotton_value2" name="fiber_total_cotton_value2" value="<?php echo isset($row_for_gray_variable["fiber_total_cotton_value2"]) ? $row_for_gray_variable["fiber_total_cotton_value2"] : "" ?>" class="fiber_total_cotton_value2 form-control col-md-7 col-xs-12">
                </div>
                <div class="col-md-1 col-sm-1 col-xs-2">
                  <select id="fiber_total_cotton_cond2" name="fiber_total_cotton_cond2" class="fiber_total_cotton_cond2 form-control col-md-12 col-xs-12">'
                    <option value="" selected="selected">Select Condition</option>
                    <option value="1" <?php echo ($row_for_gray_variable["fiber_total_cotton_cond2"] == "1") ? "selected" : "" ?> >)</option>
                    <option value="2" <?php echo ($row_for_gray_variable["fiber_total_cotton_cond2"] == "2") ? "selected" : "" ?> >]</option>
                  </select>
                </div>

                <!-- start thired option -->
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fiber_total">
                </label>
                <div class="col-md-1 col-sm-1 col-xs-2">
                  <input type="text" id="fiber_total_name_thired" name="fiber_total_name_thired" value="" class="fiber_total_name_thired form-control col-md-7 col-xs-12">
                </div>

                <div class="col-md-1 col-sm-1 col-xs-2">
                  <input type="text" id="fiber_total_thired_tol_value1" name="fiber_total_thired_tol_value1" oninput="fiber_total_thired_tol_cal_1();" class="fiber_total_thired_tol_value1_class form-control col-md-7 col-xs-12">
                </div>

                <div class="col-md-1 col-sm-1 col-xs-2" style="text-align: center;">
                  <select id="fiber_total_thired_tol_cond" name="fiber_total_thired_tol_cond" onchange="fiber_total_thired_tol_condition();" class="fiber_total_thired_tol_cond select2 pp_number form-control col-md-12 col-xs-12">
                    <option value="1" selected="selected" > &plusmn; </option>
                    <option value="2" > + </option>
                    <option value="3" > - </option>
                  </select>
                </div>

                <div class="col-md-1 col-sm-1 col-xs-2" style="text-align: center;">
                  <input type="text" id="fiber_total_thired_tol_value2" name="fiber_total_thired_tol_value2" oninput="fiber_total_thired_tol_cal_2();" class="fiber_total_thired_tol_value2 form-control col-md-7 col-xs-12">
                </div>

                <div class="col-md-1 col-sm-1 col-xs-2">
                  <select id="fiber_total_thired_cond1" name="fiber_total_thired_cond1" onchange="fiber_total_thired_condition()" class="fiber_total_thired_cond1 form-control col-md-12 col-xs-12">
                    <option value="" selected="selected">Select Condition</option>
                    <option value="1" <?php echo ($row_for_gray_variable["fiber_total_thired_cond1"] == "1") ? "selected" : "" ?> >(</option>
                    <option value="2" <?php echo ($row_for_gray_variable["fiber_total_thired_cond1"] == "2") ? "selected" : "" ?> >[</option>
                  </select>
                </div>
                <div class="col-md-1 col-sm-1 col-xs-2">
                  <input type="text" id="fiber_total_thired_value1" name="fiber_total_thired_value1" value="<?php echo isset($row_for_gray_variable["fiber_total_thired_value1"]) ? $row_for_gray_variable["fiber_total_thired_value1"] : "" ?>" class="fiber_total_thired_value1 form-control col-md-7 col-xs-12">
                </div>
                <div class="col-md-1 col-sm-1 col-xs-2" style="text-align: center;">
                  --
                </div>
                <div class="col-md-1 col-sm-1 col-xs-2">
                  <input type="text" id="fiber_total_thired_value2" name="fiber_total_thired_value2" value="<?php echo isset($row_for_gray_variable["fiber_total_thired_value2"]) ? $row_for_gray_variable["fiber_total_thired_value2"] : "" ?>" class="fiber_total_thired_value2 form-control col-md-7 col-xs-12">
                </div>
                <div class="col-md-1 col-sm-1 col-xs-2">
                  <select id="fiber_total_thired_cond2" name="fiber_total_thired_cond2" class="fiber_total_thired_cond2 form-control col-md-12 col-xs-12">
                    <option value="" selected="selected">Select Condition</option>
                    <option value="1" <?php echo ($row_for_gray_variable["fiber_total_thired_cond2"] == "1") ? "selected" : "" ?> >)</option>
                    <option value="2" <?php echo ($row_for_gray_variable["fiber_total_thired_cond2"] == "2") ? "selected" : "" ?> >]</option>
                  </select>
                </div>

                <!-- start fourth option -->
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fiber_total">
                </label>
                <div class="col-md-1 col-sm-1 col-xs-2">
                  <input type="text" id="fiber_total_name_fourth" name="fiber_total_name_fourth" value="" class="fiber_total_name_fourth form-control col-md-7 col-xs-12">
                </div>

                <div class="col-md-1 col-sm-1 col-xs-2">
                  <input type="text" id="fiber_total_fourth_tol_value1" name="fiber_total_fourth_tol_value1" oninput="fiber_total_fourth_tol_cal_1();" class="fiber_total_fourth_tol_value1_class form-control col-md-7 col-xs-12">
                </div>

                <div class="col-md-1 col-sm-1 col-xs-2" style="text-align: center;">
                  <select id="fiber_total_fourth_tol_cond" name="fiber_total_fourth_tol_cond" onchange="fiber_total_fourth_tol_condition();" class="fiber_total_fourth_tol_cond select2 pp_number form-control col-md-12 col-xs-12">
                    <option value="1" selected="selected" > &plusmn; </option>
                    <option value="2" > + </option>
                    <option value="3" > - </option>
                  </select>
                </div>

                <div class="col-md-1 col-sm-1 col-xs-2" style="text-align: center;">
                  <input type="text" id="fiber_total_fourth_tol_value2" name="fiber_total_fourth_tol_value2" oninput="fiber_total_fourth_tol_cal_2();" class="fiber_total_fourth_tol_value2 form-control col-md-7 col-xs-12">
                </div>

                <div class="col-md-1 col-sm-1 col-xs-2">
                  <select id="fiber_total_fourth_cond1" name="fiber_total_fourth_cond1" onchange="fiber_total_fourth_condition()" class="fiber_total_fourth_cond1 form-control col-md-12 col-xs-12">
                    <option value="" selected="selected">Select Condition</option>
                    <option value="1" <?php echo ($row_for_gray_variable["fiber_total_fourth_cond1"] == "1") ? "selected" : "" ?> >(</option>
                    <option value="2" <?php echo ($row_for_gray_variable["fiber_total_fourth_cond1"] == "2") ? "selected" : "" ?> >[</option>
                  </select>
                </div>
                <div class="col-md-1 col-sm-1 col-xs-2">
                  <input type="text" id="fiber_total_fourth_value1" name="fiber_total_fourth_value1" value="<?php echo isset($row_for_gray_variable["fiber_total_fourth_value1"]) ? $row_for_gray_variable["fiber_total_fourth_value1"] : '' ?>" class="fiber_total_fourth_value1 form-control col-md-7 col-xs-12">
                </div>
                <div class="col-md-1 col-sm-1 col-xs-2" style="text-align: center;">
                 --
                </div>
                <div class="col-md-1 col-sm-1 col-xs-2">
                  <input type="text" id="fiber_total_fourth_value2" name="fiber_total_fourth_value2" value="<?php echo isset($row_for_gray_variable["fiber_total_fourth_value2"]) ? $row_for_gray_variable["fiber_total_fourth_value2"] : '' ?>" class="fiber_total_fourth_value2 form-control col-md-7 col-xs-12">
                </div>
                <div class="col-md-1 col-sm-1 col-xs-2">
                  <select id="fiber_total_fourth_cond2" name="fiber_total_fourth_cond2" class="fiber_total_fourth_cond2 form-control col-md-12 col-xs-12">
                    <option value="" selected="selected">Select Condition</option>
                    <option value="1" <?php echo ($row_for_gray_variable["fiber_total_fourth_cond2"] == "1") ? "selected" : "" ?> >)</option>
                    <option value="2" <?php echo ($row_for_gray_variable["fiber_total_fourth_cond2"] == "2") ? "selected" : "" ?> >]</option>
                  </select>
                </div>

              </div>
            <?php
        }

        else if ( $fiber_content_select == "2" )
        {
            ?>
            <!-- change for new formet -->
            <input type="hidden" id="fiber_content_selected_for_number" name="fiber_content_selected_for_number" value="2" >
            <div class="form-group"> 
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fiber_warp">Warp Fiber Content<span class="required">*</span>
              </label>
              <!-- start polyster -->
              <div class="col-md-1 col-sm-1 col-xs-2">
                <input type="text" id="fiber_warp_name_polyester" name="fiber_warp_name_polyester" value="<?php echo isset($row_for_gray_variable["fiber_warp_name_polyester"]) ? $row_for_gray_variable["fiber_warp_name_polyester"] : "polyester" ?>" readonly class="fiber_warp_name_polyester form-control col-md-7 col-xs-12">
              </div>

              <div class="col-md-1 col-sm-1 col-xs-2">
                <input type="text" id="fiber_warp_polyester_tol_value1" name="fiber_warp_polyester_tol_value1" oninput="fiber_warp_polyester_tol_cal_1();" class="fiber_warp_polyester_tol_value1 form-control col-md-7 col-xs-12">
              </div>

              <div class="col-md-1 col-sm-1 col-xs-2" style="text-align: center;">
                <select id="fiber_warp_polyester_tol_cond" name="fiber_warp_polyester_tol_cond" onchange="fiber_warp_polyester_tol_condition();" class="fiber_warp_polyester_tol_cond select2 pp_number form-control col-md-12 col-xs-12">
                  <option value="1" selected="selected" > &plusmn; </option>
                  <option value="2" > + </option>
                  <option value="3" > - </option>
                </select> 
              </div> 

              <div class="col-md-1 col-sm-1 col-xs-2" style="text-align: center;">
                <input type="text" id="fiber_warp_polyester_tol_value2" name="fiber_warp_polyester_tol_value2" oninput="fiber_warp_polyester_tol_cal_2();" class="fiber_warp_polyester_tol_value2 form-control col-md-7 col-xs-12"> 
              </div>

              <div class="col-md-1 col-sm-1 col-xs-2">
                <select id="fiber_warp_polyester_cond1" name="fiber_warp_polyester_cond1" onchange="fiber_warp_polyester_condition()" class="fiber_warp_polyester_cond1 form-control col-md-12 col-xs-12">
                  <option value="" selected="selected">Select Condition</option>
                  <option value="1" <?php echo ($row_for_gray_variable["fiber_warp_polyester_cond1"] == "1") ? "selected" : "" ?> >(</option>
                  <option value="2" <?php echo ($row_for_gray_variable["fiber_warp_polyester_cond1"] == "2") ? "selected" : "" ?> >[</option>
                </select>
              </div>
              <div class="col-md-1 col-sm-1 col-xs-2">
                <input type="text" id="fiber_warp_polyester_value1" name="fiber_warp_polyester_value1" value="<?php echo isset($row_for_gray_variable["fiber_warp_polyester_value1"]) ? $row_for_gray_variable["fiber_warp_polyester_value1"] : "" ?>" class="fiber_warp_polyester_value1 form-control col-md-7 col-xs-12">
              </div>
              <div class="col-md-1 col-sm-1 col-xs-2" style="text-align: center;">
                --
              </div> 
              <div class="col-md-1 col-sm-1 col-xs-2">
                <input type="text" id="fiber_warp_polyester_value2" name="fiber_warp_polyester_value2" value="<?php echo isset($row_for_gray_variable["fiber_warp_polyester_value2"]) ? $row_for_gray_variable["fiber_warp_polyester_value2"] : "" ?>" class="fiber_warp_polyester_value2 form-control col-md-7 col-xs-12">
              </div>
              <div class="col-md-1 col-sm-1 col-xs-2">
                <select id="fiber_warp_polyester_cond2" name="fiber_warp_polyester_cond2" class="fiber_warp_polyester_cond2 form-control col-md-12 col-xs-12">
                  <option value="" selected="selected">Select Condition</option>
                  <option value="1" <?php echo ($row_for_gray_variable["fiber_warp_polyester_cond2"] == "1") ? "selected" : "" ?> >)</option>
                  <option value="2" <?php echo ($row_for_gray_variable["fiber_warp_polyester_cond2"] == "2") ? "selected" : "" ?> >]</option>
                </select>
              </div>

              <!-- start cotton -->
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fiber_weft">
              </label>
              <div class="col-md-1 col-sm-1 col-xs-2">
                <input type="text" id="fiber_warp_name_cotton" name="fiber_warp_name_cotton" value="<?php echo isset($row_for_gray_variable["fiber_warp_name_cotton"]) ? $row_for_gray_variable["fiber_warp_name_cotton"] : "cotton" ?>" readonly class="fiber_warp_name_cotton form-control col-md-7 col-xs-12">
              </div>

              <div class="col-md-1 col-sm-1 col-xs-2">
                <input type="text" id="fiber_warp_cotton_tol_value1" name="fiber_warp_cotton_tol_value1" oninput="fiber_warp_cotton_tol_cal_1();" class="fiber_warp_cotton_tol_value1 form-control col-md-7 col-xs-12">
              </div>

              <div class="col-md-1 col-sm-1 col-xs-2" style="text-align: center;">
                <select id="fiber_warp_cotton_tol_cond" name="fiber_warp_cotton_tol_cond" onchange="fiber_warp_cotton_tol_condition();" class="fiber_warp_cotton_tol_cond select2 pp_number form-control col-md-12 col-xs-12">
                  <option value="1" selected="selected" > &plusmn; </option>
                  <option value="2" > + </option>
                  <option value="3" > - </option>
                </select> 
              </div> 

              <div class="col-md-1 col-sm-1 col-xs-2" style="text-align: center;">
                <input type="text" id="fiber_warp_cotton_tol_value2" name="fiber_warp_cotton_tol_value2" oninput="fiber_warp_cotton_tol_cal_2();" class="fiber_warp_cotton_tol_value2 form-control col-md-7 col-xs-12"> 
              </div>

              <div class="col-md-1 col-sm-1 col-xs-2">
                <select id="fiber_warp_cotton_cond1" name="fiber_warp_cotton_cond1" onchange="fiber_warp_cotton_condition()" class="fiber_warp_cotton_cond1 form-control col-md-12 col-xs-12">
                  <option value="" selected="selected">Select Condition</option>
                  <option value="1" <?php echo ($row_for_gray_variable["fiber_warp_cotton_cond1"] == "1") ? "selected" : "" ?> >(</option>
                  <option value="2" <?php echo ($row_for_gray_variable["fiber_warp_cotton_cond1"] == "2") ? "selected" : "" ?> >[</option>
                </select>
              </div>
              <div class="col-md-1 col-sm-1 col-xs-2">
                <input type="text" id="fiber_warp_cotton_value1" name="fiber_warp_cotton_value1" value="<?php echo isset($row_for_gray_variable["fiber_warp_cotton_value1"]) ? $row_for_gray_variable["fiber_warp_cotton_value1"] : "" ?>" class="fiber_warp_cotton_value1 form-control col-md-7 col-xs-12">
              </div>
              <div class="col-md-1 col-sm-1 col-xs-2" style="text-align: center;">
                --
              </div> 
              <div class="col-md-1 col-sm-1 col-xs-2">
                <input type="text" id="fiber_warp_cotton_value2" name="fiber_warp_cotton_value2" value="<?php echo isset($row_for_gray_variable["fiber_warp_cotton_value2"]) ? $row_for_gray_variable["fiber_warp_cotton_value2"] : "" ?>" class="fiber_warp_cotton_value2 form-control col-md-7 col-xs-12">
              </div>
              <div class="col-md-1 col-sm-1 col-xs-2">
                <select id="fiber_warp_cotton_cond2" name="fiber_warp_cotton_cond2" class="fiber_warp_cotton_cond2 form-control col-md-12 col-xs-12">
                  <option value="" selected="selected">Select Condition</option>
                  <option value="1" <?php echo ($row_for_gray_variable["fiber_warp_cotton_cond2"] == "1") ? "selected" : "" ?> >)</option>
                  <option value="2" <?php echo ($row_for_gray_variable["fiber_warp_cotton_cond2"] == "2") ? "selected" : "" ?> >]</option>
                </select>
              </div>

              <!-- start thired option -->
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fiber_warp">
              </label>
              <div class="col-md-1 col-sm-1 col-xs-2">
                <input type="text" id="fiber_warp_name_thired" name="fiber_warp_name_thired" value="<?php echo isset($row_for_gray_variable["fiber_warp_name_thired"]) ? $row_for_gray_variable["fiber_warp_name_thired"] : "" ?>" class="fiber_warp_name_thired form-control col-md-7 col-xs-12">
              </div>

              <div class="col-md-1 col-sm-1 col-xs-2">
                <input type="text" id="fiber_warp_thired_tol_value1" name="fiber_warp_thired_tol_value1" oninput="fiber_warp_thired_tol_cal_1();" class="fiber_warp_thired_tol_value1 form-control col-md-7 col-xs-12">
              </div>

              <div class="col-md-1 col-sm-1 col-xs-2" style="text-align: center;">
                <select id="fiber_warp_thired_tol_cond" name="fiber_warp_thired_tol_cond" onchange="fiber_warp_thired_tol_condition();" class="fiber_warp_thired_tol_cond select2 pp_number form-control col-md-12 col-xs-12">
                  <option value="1" selected="selected" > &plusmn; </option>
                  <option value="2" > + </option>
                  <option value="3" > - </option>
                </select> 
              </div> 

              <div class="col-md-1 col-sm-1 col-xs-2" style="text-align: center;">
                <input type="text" id="fiber_warp_thired_tol_value2" name="fiber_warp_thired_tol_value2" oninput="fiber_warp_thired_tol_cal_2();" class="fiber_warp_thired_tol_value2 form-control col-md-7 col-xs-12"> 
              </div>

              <div class="col-md-1 col-sm-1 col-xs-2">
                <select id="fiber_warp_thired_cond1" name="fiber_warp_thired_cond1" onchange="fiber_warp_thired_condition()" class="fiber_warp_thired_cond1 form-control col-md-12 col-xs-12">
                  <option value="" selected="selected">Select Condition</option>
                  <option value="1" <?php echo ($row_for_gray_variable["fiber_warp_thired_cond1"] == "1") ? "selected" : "" ?> >(</option>
                  <option value="2" <?php echo ($row_for_gray_variable["fiber_warp_thired_cond1"] == "2") ? "selected" : "" ?> >[</option>
                </select>
              </div>
              <div class="col-md-1 col-sm-1 col-xs-2">
                <input type="text" id="fiber_warp_thired_value1" name="fiber_warp_thired_value1" value="<?php echo isset($row_for_gray_variable["fiber_warp_thired_value1"]) ? $row_for_gray_variable["fiber_warp_thired_value1"] : "" ?>" class="fiber_warp_thired_value1 form-control col-md-7 col-xs-12">
              </div>
              <div class="col-md-1 col-sm-1 col-xs-2" style="text-align: center;">
                --
              </div> 
              <div class="col-md-1 col-sm-1 col-xs-2">
                <input type="text" id="fiber_warp_thired_value2" name="fiber_warp_thired_value2" value="<?php echo isset($row_for_gray_variable["fiber_warp_thired_value2"]) ? $row_for_gray_variable["fiber_warp_thired_value2"] : "" ?>" class="fiber_warp_thired_value2 form-control col-md-7 col-xs-12">
              </div>
              <div class="col-md-1 col-sm-1 col-xs-2">
                <select id="fiber_warp_thired_cond2" name="fiber_warp_thired_cond2" class="fiber_warp_thired_cond2 form-control col-md-12 col-xs-12">
                  <option value="" selected="selected">Select Condition</option>
                  <option value="1" <?php echo ($row_for_gray_variable["fiber_warp_thired_cond2"] == "1") ? "selected" : "" ?> >)</option>
                  <option value="2" <?php echo ($row_for_gray_variable["fiber_warp_thired_cond2"] == "2") ? "selected" : "" ?> >]</option>
                </select>
              </div>

              <!-- start fourth option -->
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fiber_warp">
              </label>
              <div class="col-md-1 col-sm-1 col-xs-2">
                <input type="text" id="fiber_warp_name_fourth" name="fiber_warp_name_fourth" value="<?php echo isset($row_for_gray_variable["fiber_warp_name_fourth"]) ? $row_for_gray_variable["fiber_warp_name_fourth"] : "" ?>" class="fiber_warp_name_fourth form-control col-md-7 col-xs-12">
              </div>

              <div class="col-md-1 col-sm-1 col-xs-2">
                <input type="text" id="fiber_warp_fourth_tol_value1" name="fiber_warp_fourth_tol_value1" oninput="fiber_warp_fourth_tol_cal_1();" class="fiber_warp_fourth_tol_value1 form-control col-md-7 col-xs-12">
              </div>

              <div class="col-md-1 col-sm-1 col-xs-2" style="text-align: center;">
                <select id="fiber_warp_fourth_tol_cond" name="fiber_warp_fourth_tol_cond" onchange="fiber_warp_fourth_tol_condition();" class="fiber_warp_fourth_tol_cond select2 pp_number form-control col-md-12 col-xs-12">
                  <option value="1" selected="selected" > &plusmn; </option>
                  <option value="2" > + </option>
                  <option value="3" > - </option>
                </select> 
              </div> 

              <div class="col-md-1 col-sm-1 col-xs-2" style="text-align: center;">
                <input type="text" id="fiber_warp_fourth_tol_value2" name="fiber_warp_fourth_tol_value2" oninput="fiber_warp_fourth_tol_cal_2();" class="fiber_warp_fourth_tol_value2 form-control col-md-7 col-xs-12"> 
              </div>

              <div class="col-md-1 col-sm-1 col-xs-2">
                <select id="fiber_warp_fourth_cond1" name="fiber_warp_fourth_cond1" onchange="fiber_warp_fourth_condition()" class="fiber_warp_fourth_cond1 form-control col-md-12 col-xs-12">
                  <option value="" selected="selected">Select Condition</option>
                  <option value="1" <?php echo ($row_for_gray_variable["fiber_warp_fourth_cond1"] == "1") ? "selected" : "" ?> >(</option>
                  <option value="2" <?php echo ($row_for_gray_variable["fiber_warp_fourth_cond1"] == "2") ? "selected" : "" ?> >[</option>
                </select>
              </div>
              <div class="col-md-1 col-sm-1 col-xs-2">
                <input type="text" id="fiber_warp_fourth_value1" name="fiber_warp_fourth_value1" value="<?php echo isset($row_for_gray_variable["fiber_warp_fourth_value1"]) ? $row_for_gray_variable["fiber_warp_fourth_value1"] : "" ?>" class="fiber_warp_fourth_value1 form-control col-md-7 col-xs-12">
              </div>
              <div class="col-md-1 col-sm-1 col-xs-2" style="text-align: center;">
                --
              </div> 
              <div class="col-md-1 col-sm-1 col-xs-2">
                <input type="text" id="fiber_warp_fourth_value2" name="fiber_warp_fourth_value2" value="<?php echo isset($row_for_gray_variable["fiber_warp_fourth_value2"]) ? $row_for_gray_variable["fiber_warp_fourth_value2"] : "" ?>" class="fiber_warp_fourth_value2 form-control col-md-7 col-xs-12">
              </div>
              <div class="col-md-1 col-sm-1 col-xs-2">
                <select id="fiber_warp_fourth_cond2" name="fiber_warp_fourth_cond2" class="fiber_warp_fourth_cond2 form-control col-md-12 col-xs-12">
                  <option value="" selected="selected">Select Condition</option>
                  <option value="1" <?php echo ($row_for_gray_variable["fiber_warp_fourth_cond2"] == "1") ? "selected" : "" ?> >)</option>
                  <option value="2" <?php echo ($row_for_gray_variable["fiber_warp_fourth_cond2"] == "2") ? "selected" : "" ?> >]</option>
                </select>
              </div>

            </div>
            <!-- end of new formet change -->


            <br>
            <!-- change for new formet -->
            <div class="form-group">  
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fiber_weft">Weft Fiber Content<span class="required">*</span>
              </label>
              <!-- start polyster -->
              <div class="col-md-1 col-sm-1 col-xs-2">
                <input type="text" id="fiber_weft_name_polyester" name="fiber_weft_name_polyester" value="<?php echo isset($row_for_gray_variable["fiber_weft_name_polyester"]) ? $row_for_gray_variable["fiber_weft_name_polyester"] : "polyester" ?>" readonly class="fiber_weft_name_polyester form-control col-md-7 col-xs-12">
              </div>

              <div class="col-md-1 col-sm-1 col-xs-2">
                <input type="text" id="fiber_weft_polyester_tol_value1" name="fiber_weft_polyester_tol_value1" oninput="fiber_weft_polyester_tol_cal_1();" class="fiber_weft_polyester_tol_value1 form-control col-md-7 col-xs-12">
              </div>

              <div class="col-md-1 col-sm-1 col-xs-2" style="text-align: center;">
                <select id="fiber_weft_polyester_tol_cond" name="fiber_weft_polyester_tol_cond" onchange="fiber_weft_polyester_tol_condition();" class="fiber_weft_polyester_tol_cond select2 pp_number form-control col-md-12 col-xs-12">
                  <option value="1" selected="selected" > &plusmn; </option>
                  <option value="2" > + </option>
                  <option value="3" > - </option>
                </select> 
              </div> 

              <div class="col-md-1 col-sm-1 col-xs-2" style="text-align: center;">
                <input type="text" id="fiber_weft_polyester_tol_value2" name="fiber_weft_polyester_tol_value2" oninput="fiber_weft_polyester_tol_cal_2();" class="fiber_weft_polyester_tol_value2 form-control col-md-7 col-xs-12"> 
              </div>

              <div class="col-md-1 col-sm-1 col-xs-2">
                <select id="fiber_weft_polyester_cond1" name="fiber_weft_polyester_cond1" onchange="fiber_weft_polyester_condition()" class="fiber_weft_polyester_cond1 form-control col-md-12 col-xs-12">
                  <option value="" selected="selected">Select Condition</option>
                  <option value="1" <?php echo ($row_for_gray_variable["fiber_weft_polyester_cond1"] == "1") ? "selected" : "" ?> >(</option>
                  <option value="2" <?php echo ($row_for_gray_variable["fiber_weft_polyester_cond1"] == "2") ? "selected" : "" ?> >[</option>
                </select>
              </div>
              <div class="col-md-1 col-sm-1 col-xs-2">
                <input type="text" id="fiber_weft_polyester_value1" name="fiber_weft_polyester_value1" value="<?php echo isset($row_for_gray_variable["fiber_weft_polyester_value1"]) ? $row_for_gray_variable["fiber_weft_polyester_value1"] : "" ?>" class="fiber_weft_polyester_value1 form-control col-md-7 col-xs-12">
              </div>
              <div class="col-md-1 col-sm-1 col-xs-2" style="text-align: center;">
                --
              </div> 
              <div class="col-md-1 col-sm-1 col-xs-2">
                <input type="text" id="fiber_weft_polyester_value2" name="fiber_weft_polyester_value2" value="<?php echo isset($row_for_gray_variable["fiber_weft_polyester_value2"]) ? $row_for_gray_variable["fiber_weft_polyester_value2"] : "" ?>" class="fiber_weft_polyester_value2 form-control col-md-7 col-xs-12">
              </div>
              <div class="col-md-1 col-sm-1 col-xs-2">
                <select id="fiber_weft_polyester_cond2" name="fiber_weft_polyester_cond2" class="fiber_weft_polyester_cond2 form-control col-md-12 col-xs-12">
                  <option value="" selected="selected">Select Condition</option>
                  <option value="1" <?php echo ($row_for_gray_variable["fiber_weft_polyester_cond2"] == "1") ? "selected" : "" ?> >)</option>
                  <option value="2" <?php echo ($row_for_gray_variable["fiber_weft_polyester_cond2"] == "2") ? "selected" : "" ?> >]</option>
                </select>
              </div>

              <!-- start cotton -->
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fiber_weft">
              </label>
              <div class="col-md-1 col-sm-1 col-xs-2">
                <input type="text" id="fiber_weft_name_cotton" name="fiber_weft_name_cotton" value="<?php echo isset($row_for_gray_variable["fiber_weft_name_cotton"]) ? $row_for_gray_variable["fiber_weft_name_cotton"] : "cotton" ?>" readonly class="fiber_weft_name_cotton form-control col-md-7 col-xs-12">
              </div>

              <div class="col-md-1 col-sm-1 col-xs-2">
                <input type="text" id="fiber_weft_cotton_tol_value1" name="fiber_weft_cotton_tol_value1" oninput="fiber_weft_cotton_tol_cal_1();" class="fiber_weft_cotton_tol_value1 form-control col-md-7 col-xs-12">
              </div>

              <div class="col-md-1 col-sm-1 col-xs-2" style="text-align: center;">
                <select id="fiber_weft_cotton_tol_cond" name="fiber_weft_cotton_tol_cond" onchange="fiber_weft_cotton_tol_condition();" class="fiber_weft_cotton_tol_cond select2 pp_number form-control col-md-12 col-xs-12">
                  <option value="1" selected="selected" > &plusmn; </option>
                  <option value="2" > + </option>
                  <option value="3" > - </option>
                </select>
              </div> 

              <div class="col-md-1 col-sm-1 col-xs-2" style="text-align: center;">
                <input type="text" id="fiber_weft_cotton_tol_value2" name="fiber_weft_cotton_tol_value2" oninput="fiber_weft_cotton_tol_cal_2();" class="fiber_weft_cotton_tol_value2 form-control col-md-7 col-xs-12"> 
              </div>

              <div class="col-md-1 col-sm-1 col-xs-2">
                <select id="fiber_weft_cotton_cond1" name="fiber_weft_cotton_cond1" onchange="fiber_weft_cotton_condition()" class="fiber_weft_cotton_cond1 form-control col-md-12 col-xs-12">
                  <option value="" selected="selected">Select Condition</option>
                  <option value="1" <?php echo ($row_for_gray_variable["fiber_weft_cotton_cond1"] == "1") ? "selected" : "" ?> >(</option>
                  <option value="2" <?php echo ($row_for_gray_variable["fiber_weft_cotton_cond1"] == "2") ? "selected" : "" ?> >[</option>
                </select>
              </div>
              <div class="col-md-1 col-sm-1 col-xs-2">
                <input type="text" id="fiber_weft_cotton_value1" name="fiber_weft_cotton_value1" value="<?php echo isset($row_for_gray_variable["fiber_weft_cotton_value1"]) ? $row_for_gray_variable["fiber_weft_cotton_value1"] : "" ?>" class="fiber_weft_cotton_value1 form-control col-md-7 col-xs-12">
              </div>
              <div class="col-md-1 col-sm-1 col-xs-2" style="text-align: center;">
                --
              </div> 
              <div class="col-md-1 col-sm-1 col-xs-2">
                <input type="text" id="fiber_weft_cotton_value2" name="fiber_weft_cotton_value2" value="<?php echo isset($row_for_gray_variable["fiber_weft_cotton_value2"]) ? $row_for_gray_variable["fiber_weft_cotton_value2"] : "" ?>" class="fiber_weft_cotton_value2 form-control col-md-7 col-xs-12">
              </div>
              <div class="col-md-1 col-sm-1 col-xs-2">
                <select id="fiber_weft_cotton_cond2" name="fiber_weft_cotton_cond2" class="fiber_weft_cotton_cond2 form-control col-md-12 col-xs-12">
                  <option value="" selected="selected">Select Condition</option>
                  <option value="1" <?php echo ($row_for_gray_variable["fiber_weft_cotton_cond2"] == "1") ? "selected" : "" ?> >)</option>
                  <option value="2" <?php echo ($row_for_gray_variable["fiber_weft_cotton_cond2"] == "2") ? "selected" : "" ?> >]</option>
                </select>
              </div>

              <!-- start thired option -->
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fiber_weft">
              </label>
              <div class="col-md-1 col-sm-1 col-xs-2">
                <input type="text" id="fiber_weft_name_thired" name="fiber_weft_name_thired" value="<?php echo isset($row_for_gray_variable["fiber_weft_name_thired"]) ? $row_for_gray_variable["fiber_weft_name_thired"] : "" ?>" class="fiber_weft_name_thired form-control col-md-7 col-xs-12">
              </div>

              <div class="col-md-1 col-sm-1 col-xs-2">
                <input type="text" id="fiber_weft_thired_tol_value1" name="fiber_weft_thired_tol_value1" oninput="fiber_weft_thired_tol_cal_1();" class="fiber_weft_thired_tol_value1 form-control col-md-7 col-xs-12">
              </div>

              <div class="col-md-1 col-sm-1 col-xs-2" style="text-align: center;">
                <select id="fiber_weft_thired_tol_cond" name="fiber_weft_thired_tol_cond" onchange="fiber_weft_thired_tol_condition();" class="fiber_weft_thired_tol_cond select2 pp_number form-control col-md-12 col-xs-12">
                  <option value="1" selected="selected" > &plusmn; </option>
                  <option value="2" > + </option>
                  <option value="3" > - </option>
                </select> 
              </div> 

              <div class="col-md-1 col-sm-1 col-xs-2" style="text-align: center;">
                <input type="text" id="fiber_weft_thired_tol_value2" name="fiber_weft_thired_tol_value2" oninput="fiber_weft_thired_tol_cal_2();" class="fiber_weft_thired_tol_value2 form-control col-md-7 col-xs-12"> 
              </div>

              <div class="col-md-1 col-sm-1 col-xs-2">
                <select id="fiber_weft_thired_cond1" name="fiber_weft_thired_cond1" onchange="fiber_weft_thired_condition()" class="fiber_weft_thired_cond1 form-control col-md-12 col-xs-12">
                  <option value="" selected="selected">Select Condition</option>
                  <option value="1" <?php echo ($row_for_gray_variable["fiber_weft_thired_cond1"] == "1") ? "selected" : "" ?> >(</option>
                  <option value="2" <?php echo ($row_for_gray_variable["fiber_weft_thired_cond1"] == "2") ? "selected" : "" ?> >[</option>
                </select>
              </div>
              <div class="col-md-1 col-sm-1 col-xs-2">
                <input type="text" id="fiber_weft_thired_value1" name="fiber_weft_thired_value1" value="<?php echo isset($row_for_gray_variable["fiber_weft_thired_value1"]) ? $row_for_gray_variable["fiber_weft_thired_value1"] : "" ?>" class="fiber_weft_thired_value1 form-control col-md-7 col-xs-12">
              </div>
              <div class="col-md-1 col-sm-1 col-xs-2" style="text-align: center;">
                --
              </div> 
              <div class="col-md-1 col-sm-1 col-xs-2">
                <input type="text" id="fiber_weft_thired_value2" name="fiber_weft_thired_value2" value="<?php echo isset($row_for_gray_variable["fiber_weft_thired_value2"]) ? $row_for_gray_variable["fiber_weft_thired_value2"] : "" ?>" class="fiber_weft_thired_value2 form-control col-md-7 col-xs-12">
              </div>
              <div class="col-md-1 col-sm-1 col-xs-2">
                <select id="fiber_weft_thired_cond2" name="fiber_weft_thired_cond2" class="fiber_weft_thired_cond2 form-control col-md-12 col-xs-12">
                  <option value="" selected="selected">Select Condition</option>
                  <option value="1" <?php echo ($row_for_gray_variable["fiber_weft_thired_cond2"] == "1") ? "selected" : "" ?> >)</option>
                  <option value="2" <?php echo ($row_for_gray_variable["fiber_weft_thired_cond2"] == "2") ? "selected" : "" ?> >]</option>
                </select>
              </div>

              <!-- start fourth option -->
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fiber_weft">
              </label>
              <div class="col-md-1 col-sm-1 col-xs-2">
                <input type="text" id="fiber_weft_name_fourth" name="fiber_weft_name_fourth" value="<?php echo isset($row_for_gray_variable["fiber_weft_name_fourth"]) ? $row_for_gray_variable["fiber_weft_name_fourth"] : "" ?>"  class="fiber_weft_name_fourth form-control col-md-7 col-xs-12">
              </div>

              <div class="col-md-1 col-sm-1 col-xs-2">
                <input type="text" id="fiber_weft_fourth_tol_value1" name="fiber_weft_fourth_tol_value1" oninput="fiber_weft_fourth_tol_cal_1();" class="fiber_weft_fourth_tol_value1 form-control col-md-7 col-xs-12">
              </div>

              <div class="col-md-1 col-sm-1 col-xs-2" style="text-align: center;">
                <select id="fiber_weft_fourth_tol_cond" name="fiber_weft_fourth_tol_cond" onchange="fiber_weft_fourth_tol_condition();" class="fiber_weft_fourth_tol_cond select2 pp_number form-control col-md-12 col-xs-12">
                  <option value="1" selected="selected" > &plusmn; </option>
                  <option value="2" > + </option>
                  <option value="3" > - </option>
                </select> 
              </div> 

              <div class="col-md-1 col-sm-1 col-xs-2" style="text-align: center;">
                <input type="text" id="fiber_weft_fourth_tol_value2" name="fiber_weft_fourth_tol_value2" oninput="fiber_weft_fourth_tol_cal_2();" class="fiber_weft_fourth_tol_value2 form-control col-md-7 col-xs-12"> 
              </div>

              <div class="col-md-1 col-sm-1 col-xs-2">
                <select id="fiber_weft_fourth_cond1" name="fiber_weft_fourth_cond1" onchange="fiber_weft_fourth_condition()" class="fiber_weft_fourth_cond1 form-control col-md-12 col-xs-12">
                  <option value="" selected="selected">Select Condition</option>
                  <option value="1" <?php echo ($row_for_gray_variable["fiber_weft_fourth_cond1"] == "1") ? "selected" : "" ?> >(</option>
                  <option value="2" <?php echo ($row_for_gray_variable["fiber_weft_fourth_cond1"] == "2") ? "selected" : "" ?> >[</option>
                </select>
              </div>
              <div class="col-md-1 col-sm-1 col-xs-2">
                <input type="text" id="fiber_weft_fourth_value1" name="fiber_weft_fourth_value1" value="<?php echo isset($row_for_gray_variable["fiber_weft_fourth_value1"]) ? $row_for_gray_variable["fiber_weft_fourth_value1"] : "" ?>" class="fiber_weft_fourth_value1 form-control col-md-7 col-xs-12">
              </div>
              <div class="col-md-1 col-sm-1 col-xs-2" style="text-align: center;">
                --
              </div> 
              <div class="col-md-1 col-sm-1 col-xs-2">
                <input type="text" id="fiber_weft_fourth_value2" name="fiber_weft_fourth_value2" value="<?php echo isset($row_for_gray_variable["fiber_weft_fourth_value2"]) ? $row_for_gray_variable["fiber_weft_fourth_value2"] : "" ?>" class="fiber_weft_fourth_value2 form-control col-md-7 col-xs-12">
              </div>
              <div class="col-md-1 col-sm-1 col-xs-2">
                <select id="fiber_weft_fourth_cond2" name="fiber_weft_fourth_cond2" class="fiber_weft_fourth_cond2 form-control col-md-12 col-xs-12">
                  <option value="" selected="selected">Select Condition</option>
                  <option value="1" <?php echo ($row_for_gray_variable["fiber_weft_fourth_cond2"] == "1") ? "selected" : "" ?> >)</option>
                  <option value="2" <?php echo ($row_for_gray_variable["fiber_weft_fourth_cond2"] == "2") ? "selected" : "" ?> >]</option>
                </select>
              </div>

            </div>
            <!-- end of new formet change -->

            <?php
        }

        else
        {
            ?>

              <div class="form-group">
                <input type="hidden" id="fiber_content_selected_for_number" name="fiber_content_selected_for_number" value="3" >
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fiber_total">Total Fiber Content<span class="required">*</span>
                </label>
                <!-- start polyster -->
                <div class="col-md-1 col-sm-1 col-xs-2">
                  <input type="text" id="fiber_total_name_polyester" name="fiber_total_name_polyester" value="polyester" readonly class="fiber_total_name_polyester form-control col-md-7 col-xs-12">
                </div>

                <div class="col-md-1 col-sm-1 col-xs-2">
                  <input type="text" id="fiber_total_polyester_tol_value1" name="fiber_total_polyester_tol_value1" oninput="fiber_total_polyester_tol_cal_1();" class="fiber_total_polyester_tol_value1_class form-control col-md-7 col-xs-12">
                </div>

                <div class="col-md-1 col-sm-1 col-xs-2" style="text-align: center;">
                  <select id="fiber_total_polyester_tol_cond" name="fiber_total_polyester_tol_cond" onchange="fiber_total_polyester_tol_condition();" class="fiber_total_polyester_tol_cond select2 pp_number form-control col-md-12 col-xs-12">
                    <option value="1" selected="selected" > &plusmn; </option>
                    <option value="2" > + </option>
                    <option value="3" > - </option>
                  </select> 
                </div> 

                <div class="col-md-1 col-sm-1 col-xs-2" style="text-align: center;">
                  <input type="text" id="fiber_total_polyester_tol_value2" name="fiber_total_polyester_tol_value2" oninput="fiber_total_polyester_tol_cal_2();" class="fiber_total_polyester_tol_value2 form-control col-md-7 col-xs-12">
                </div>

                <div class="col-md-1 col-sm-1 col-xs-2">
                  <select id="fiber_total_polyester_cond1" name="fiber_total_polyester_cond1" onchange="fiber_total_polyester_condition()" class="fiber_total_polyester_cond1 form-control col-md-12 col-xs-12">
                    <option value="" selected="selected">Select Condition</option>
                    <option value="1" <?php echo ($row_for_gray_variable["fiber_total_polyester_cond1"] == "1") ? "selected" : "" ?> >(</option>
                    <option value="2" <?php echo ($row_for_gray_variable["fiber_total_polyester_cond1"] == "2") ? "selected" : "" ?> >[</option>
                  </select>
                </div>
                <div class="col-md-1 col-sm-1 col-xs-2">
                  <input type="text" id="fiber_total_polyester_value1" name="fiber_total_polyester_value1" value="<?php echo isset($row_for_gray_variable["fiber_total_polyester_value1"]) ? $row_for_gray_variable["fiber_total_polyester_value1"] : "" ?>" class="fiber_total_polyester_value1 form-control col-md-7 col-xs-12">
                </div>
                <div class="col-md-1 col-sm-1 col-xs-2" style="text-align: center;">
                  --
                </div>
                <div class="col-md-1 col-sm-1 col-xs-2">
                  <input type="text" id="fiber_total_polyester_value2" name="fiber_total_polyester_value2" value="<?php echo isset($row_for_gray_variable["fiber_total_polyester_value2"]) ? $row_for_gray_variable["fiber_total_polyester_value2"] : "" ?>" class="fiber_total_polyester_value2 form-control col-md-7 col-xs-12">
                </div>
                <div class="col-md-1 col-sm-1 col-xs-2">
                  <select id="fiber_total_polyester_cond2" name="fiber_total_polyester_cond2" class="fiber_total_polyester_cond2 form-control col-md-12 col-xs-12">
                    <option value="" selected="selected">Select Condition</option>
                    <option value="1" <?php echo ($row_for_gray_variable["fiber_total_polyester_cond2"] == "1") ? "selected" : "" ?> >)</option>
                    <option value="2" <?php echo ($row_for_gray_variable["fiber_total_polyester_cond2"] == "2") ? "selected" : "" ?> >]</option>
                  </select>
                </div>

                <!-- start cotton -->
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fiber_weft">
                </label>
                <div class="col-md-1 col-sm-1 col-xs-2">
                  <input type="text" id="fiber_total_name_cotton" name="fiber_total_name_cotton" value="cotton" readonly class="fiber_total_name_cotton form-control col-md-7 col-xs-12">
                </div>

                <div class="col-md-1 col-sm-1 col-xs-2">
                  <input type="text" id="fiber_total_cotton_tol_value1" name="fiber_total_cotton_tol_value1" oninput="fiber_total_cotton_tol_cal_1();" class="fiber_total_cotton_tol_value1_class form-control col-md-7 col-xs-12">
                </div>

                <div class="col-md-1 col-sm-1 col-xs-2" style="text-align: center;">
                  <select id="fiber_total_cotton_tol_cond" name="fiber_total_cotton_tol_cond" onchange="fiber_total_cotton_tol_condition();" class="fiber_total_cotton_tol_cond select2 pp_number form-control col-md-12 col-xs-12">
                    <option value="1" selected="selected" > &plusmn; </option>
                    <option value="2" > + </option>
                    <option value="3" > - </option>
                  </select> 
                </div> 
                <div class="col-md-1 col-sm-1 col-xs-2" style="text-align: center;">
                  <input type="text" id="fiber_total_cotton_tol_value2" name="fiber_total_cotton_tol_value2" oninput="fiber_total_cotton_tol_cal_2();" class="fiber_total_cotton_tol_value2 form-control col-md-7 col-xs-12">
                </div>

                <div class="col-md-1 col-sm-1 col-xs-2">
                  <select id="fiber_total_cotton_cond1" name="fiber_total_cotton_cond1" onchange="fiber_total_cotton_condition()" class="fiber_total_cotton_cond1 form-control col-md-12 col-xs-12">
                    <option value="" selected="selected">Select Condition</option>
                    <option value="1" <?php echo ($row_for_gray_variable["fiber_total_cotton_cond1"] == "1") ? "selected" : "" ?> >(</option>
                    <option value="2" <?php echo ($row_for_gray_variable["fiber_total_cotton_cond1"] == "2") ? "selected" : "" ?> >[</option>
                  </select>
                </div>
                <div class="col-md-1 col-sm-1 col-xs-2">
                  <input type="text" id="fiber_total_cotton_value1" name="fiber_total_cotton_value1" value="<?php echo isset($row_for_gray_variable["fiber_total_cotton_value1"]) ? $row_for_gray_variable["fiber_total_cotton_value1"] : "" ?>" class="fiber_total_cotton_value1 form-control col-md-7 col-xs-12">
                </div>
                <div class="col-md-1 col-sm-1 col-xs-2" style="text-align: center;">
                  --
                </div>
                <div class="col-md-1 col-sm-1 col-xs-2">
                  <input type="text" id="fiber_total_cotton_value2" name="fiber_total_cotton_value2" value="<?php echo isset($row_for_gray_variable["fiber_total_cotton_value2"]) ? $row_for_gray_variable["fiber_total_cotton_value2"] : "" ?>" class="fiber_total_cotton_value2 form-control col-md-7 col-xs-12">
                </div>
                <div class="col-md-1 col-sm-1 col-xs-2">
                  <select id="fiber_total_cotton_cond2" name="fiber_total_cotton_cond2" class="fiber_total_cotton_cond2 form-control col-md-12 col-xs-12">'
                    <option value="" selected="selected">Select Condition</option>
                    <option value="1" <?php echo ($row_for_gray_variable["fiber_total_cotton_cond2"] == "1") ? "selected" : "" ?> >)</option>
                    <option value="2" <?php echo ($row_for_gray_variable["fiber_total_cotton_cond2"] == "2") ? "selected" : "" ?> >]</option>
                  </select>
                </div>

                <!-- start thired option -->
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fiber_total">
                </label>
                <div class="col-md-1 col-sm-1 col-xs-2">
                  <input type="text" id="fiber_total_name_thired" name="fiber_total_name_thired" value="" class="fiber_total_name_thired form-control col-md-7 col-xs-12">
                </div>

                <div class="col-md-1 col-sm-1 col-xs-2">
                  <input type="text" id="fiber_total_thired_tol_value1" name="fiber_total_thired_tol_value1" oninput="fiber_total_thired_tol_cal_1();" class="fiber_total_thired_tol_value1_class form-control col-md-7 col-xs-12">
                </div>

                <div class="col-md-1 col-sm-1 col-xs-2" style="text-align: center;">
                  <select id="fiber_total_thired_tol_cond" name="fiber_total_thired_tol_cond" onchange="fiber_total_thired_tol_condition();" class="fiber_total_thired_tol_cond select2 pp_number form-control col-md-12 col-xs-12">
                    <option value="1" selected="selected" > &plusmn; </option>
                    <option value="2" > + </option>
                    <option value="3" > - </option>
                  </select>
                </div>

                <div class="col-md-1 col-sm-1 col-xs-2" style="text-align: center;">
                  <input type="text" id="fiber_total_thired_tol_value2" name="fiber_total_thired_tol_value2" oninput="fiber_total_thired_tol_cal_2();" class="fiber_total_thired_tol_value2 form-control col-md-7 col-xs-12">
                </div>

                <div class="col-md-1 col-sm-1 col-xs-2">
                  <select id="fiber_total_thired_cond1" name="fiber_total_thired_cond1" onchange="fiber_total_thired_condition()" class="fiber_total_thired_cond1 form-control col-md-12 col-xs-12">
                    <option value="" selected="selected">Select Condition</option>
                    <option value="1" <?php echo ($row_for_gray_variable["fiber_total_thired_cond1"] == "1") ? "selected" : "" ?> >(</option>
                    <option value="2" <?php echo ($row_for_gray_variable["fiber_total_thired_cond1"] == "2") ? "selected" : "" ?> >[</option>
                  </select>
                </div>
                <div class="col-md-1 col-sm-1 col-xs-2">
                  <input type="text" id="fiber_total_thired_value1" name="fiber_total_thired_value1" value="<?php echo isset($row_for_gray_variable["fiber_total_thired_value1"]) ? $row_for_gray_variable["fiber_total_thired_value1"] : "" ?>" class="fiber_total_thired_value1 form-control col-md-7 col-xs-12">
                </div>
                <div class="col-md-1 col-sm-1 col-xs-2" style="text-align: center;">
                  --
                </div>
                <div class="col-md-1 col-sm-1 col-xs-2">
                  <input type="text" id="fiber_total_thired_value2" name="fiber_total_thired_value2" value="<?php echo isset($row_for_gray_variable["fiber_total_thired_value2"]) ? $row_for_gray_variable["fiber_total_thired_value2"] : "" ?>" class="fiber_total_thired_value2 form-control col-md-7 col-xs-12">
                </div>
                <div class="col-md-1 col-sm-1 col-xs-2">
                  <select id="fiber_total_thired_cond2" name="fiber_total_thired_cond2" class="fiber_total_thired_cond2 form-control col-md-12 col-xs-12">
                    <option value="" selected="selected">Select Condition</option>
                    <option value="1" <?php echo ($row_for_gray_variable["fiber_total_thired_cond2"] == "1") ? "selected" : "" ?> >)</option>
                    <option value="2" <?php echo ($row_for_gray_variable["fiber_total_thired_cond2"] == "2") ? "selected" : "" ?> >]</option>
                  </select>
                </div>

                <!-- start fourth option -->
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fiber_total">
                </label>
                <div class="col-md-1 col-sm-1 col-xs-2">
                  <input type="text" id="fiber_total_name_fourth" name="fiber_total_name_fourth" value="" class="fiber_total_name_fourth form-control col-md-7 col-xs-12">
                </div>

                <div class="col-md-1 col-sm-1 col-xs-2">
                  <input type="text" id="fiber_total_fourth_tol_value1" name="fiber_total_fourth_tol_value1" oninput="fiber_total_fourth_tol_cal_1();" class="fiber_total_fourth_tol_value1_class form-control col-md-7 col-xs-12">
                </div>

                <div class="col-md-1 col-sm-1 col-xs-2" style="text-align: center;">
                  <select id="fiber_total_fourth_tol_cond" name="fiber_total_fourth_tol_cond" onchange="fiber_total_fourth_tol_condition();" class="fiber_total_fourth_tol_cond select2 pp_number form-control col-md-12 col-xs-12">
                    <option value="1" selected="selected" > &plusmn; </option>
                    <option value="2" > + </option>
                    <option value="3" > - </option>
                  </select>
                </div>

                <div class="col-md-1 col-sm-1 col-xs-2" style="text-align: center;">
                  <input type="text" id="fiber_total_fourth_tol_value2" name="fiber_total_fourth_tol_value2" oninput="fiber_total_fourth_tol_cal_2();" class="fiber_total_fourth_tol_value2 form-control col-md-7 col-xs-12">
                </div>

                <div class="col-md-1 col-sm-1 col-xs-2">
                  <select id="fiber_total_fourth_cond1" name="fiber_total_fourth_cond1" onchange="fiber_total_fourth_condition()" class="fiber_total_fourth_cond1 form-control col-md-12 col-xs-12">
                    <option value="" selected="selected">Select Condition</option>
                    <option value="1" <?php echo ($row_for_gray_variable["fiber_total_fourth_cond1"] == "1") ? "selected" : "" ?> >(</option>
                    <option value="2" <?php echo ($row_for_gray_variable["fiber_total_fourth_cond1"] == "2") ? "selected" : "" ?> >[</option>
                  </select>
                </div>
                <div class="col-md-1 col-sm-1 col-xs-2">
                  <input type="text" id="fiber_total_fourth_value1" name="fiber_total_fourth_value1" value="<?php echo isset($row_for_gray_variable["fiber_total_fourth_value1"]) ? $row_for_gray_variable["fiber_total_fourth_value1"] : '' ?>" class="fiber_total_fourth_value1 form-control col-md-7 col-xs-12">
                </div>
                <div class="col-md-1 col-sm-1 col-xs-2" style="text-align: center;">
                 --
                </div>
                <div class="col-md-1 col-sm-1 col-xs-2">
                  <input type="text" id="fiber_total_fourth_value2" name="fiber_total_fourth_value2" value="<?php echo isset($row_for_gray_variable["fiber_total_fourth_value2"]) ? $row_for_gray_variable["fiber_total_fourth_value2"] : '' ?>" class="fiber_total_fourth_value2 form-control col-md-7 col-xs-12">
                </div>
                <div class="col-md-1 col-sm-1 col-xs-2">
                  <select id="fiber_total_fourth_cond2" name="fiber_total_fourth_cond2" class="fiber_total_fourth_cond2 form-control col-md-12 col-xs-12">
                    <option value="" selected="selected">Select Condition</option>
                    <option value="1" <?php echo ($row_for_gray_variable["fiber_total_fourth_cond2"] == "1") ? "selected" : "" ?> >)</option>
                    <option value="2" <?php echo ($row_for_gray_variable["fiber_total_fourth_cond2"] == "2") ? "selected" : "" ?> >]</option>
                  </select>
                </div>

              </div>


              <br>


            <!-- change for new formet -->

            <div class="form-group"> 
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fiber_warp">Warp Fiber Content<span class="required">*</span>
              </label>
              <!-- start polyster -->
              <div class="col-md-1 col-sm-1 col-xs-2">
                <input type="text" id="fiber_warp_name_polyester" name="fiber_warp_name_polyester" value="<?php echo isset($row_for_gray_variable["fiber_warp_name_polyester"]) ? $row_for_gray_variable["fiber_warp_name_polyester"] : "polyester" ?>" readonly class="fiber_warp_name_polyester form-control col-md-7 col-xs-12">
              </div>

              <div class="col-md-1 col-sm-1 col-xs-2">
                <input type="text" id="fiber_warp_polyester_tol_value1" name="fiber_warp_polyester_tol_value1" oninput="fiber_warp_polyester_tol_cal_1();" class="fiber_warp_polyester_tol_value1_class form-control col-md-7 col-xs-12">
              </div>

              <div class="col-md-1 col-sm-1 col-xs-2" style="text-align: center;">
                <select id="fiber_warp_polyester_tol_cond" name="fiber_warp_polyester_tol_cond" onchange="fiber_warp_polyester_tol_condition();" class="fiber_warp_polyester_tol_cond select2 pp_number form-control col-md-12 col-xs-12">
                  <option value="1" selected="selected" > &plusmn; </option>
                  <option value="2" > + </option>
                  <option value="3" > - </option>
                </select> 
              </div> 

              <div class="col-md-1 col-sm-1 col-xs-2" style="text-align: center;">
                <input type="text" id="fiber_warp_polyester_tol_value2" name="fiber_warp_polyester_tol_value2" oninput="fiber_warp_polyester_tol_cal_2();" class="fiber_warp_polyester_tol_value2 form-control col-md-7 col-xs-12"> 
              </div>

              <div class="col-md-1 col-sm-1 col-xs-2">
                <select id="fiber_warp_polyester_cond1" name="fiber_warp_polyester_cond1" onchange="fiber_warp_polyester_condition()" class="fiber_warp_polyester_cond1 form-control col-md-12 col-xs-12">
                  <option value="" selected="selected">Select Condition</option>
                  <option value="1" <?php echo ($row_for_gray_variable["fiber_warp_polyester_cond1"] == "1") ? "selected" : "" ?> >(</option>
                  <option value="2" <?php echo ($row_for_gray_variable["fiber_warp_polyester_cond1"] == "2") ? "selected" : "" ?> >[</option>
                </select>
              </div>
              <div class="col-md-1 col-sm-1 col-xs-2">
                <input type="text" id="fiber_warp_polyester_value1" name="fiber_warp_polyester_value1" value="<?php echo isset($row_for_gray_variable["fiber_warp_polyester_value1"]) ? $row_for_gray_variable["fiber_warp_polyester_value1"] : "" ?>" class="fiber_warp_polyester_value1 form-control col-md-7 col-xs-12">
              </div>
              <div class="col-md-1 col-sm-1 col-xs-2" style="text-align: center;">
                --
              </div> 
              <div class="col-md-1 col-sm-1 col-xs-2">
                <input type="text" id="fiber_warp_polyester_value2" name="fiber_warp_polyester_value2" value="<?php echo isset($row_for_gray_variable["fiber_warp_polyester_value2"]) ? $row_for_gray_variable["fiber_warp_polyester_value2"] : "" ?>" class="fiber_warp_polyester_value2 form-control col-md-7 col-xs-12">
              </div>
              <div class="col-md-1 col-sm-1 col-xs-2">
                <select id="fiber_warp_polyester_cond2" name="fiber_warp_polyester_cond2" class="fiber_warp_polyester_cond2 form-control col-md-12 col-xs-12">
                  <option value="" selected="selected">Select Condition</option>
                  <option value="1" <?php echo ($row_for_gray_variable["fiber_warp_polyester_cond2"] == "1") ? "selected" : "" ?> >)</option>
                  <option value="2" <?php echo ($row_for_gray_variable["fiber_warp_polyester_cond2"] == "2") ? "selected" : "" ?> >]</option>
                </select>
              </div>

              <!-- start cotton -->
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fiber_weft">
              </label>
              <div class="col-md-1 col-sm-1 col-xs-2">
                <input type="text" id="fiber_warp_name_cotton" name="fiber_warp_name_cotton" value="<?php echo isset($row_for_gray_variable["fiber_warp_name_cotton"]) ? $row_for_gray_variable["fiber_warp_name_cotton"] : "cotton" ?>" readonly class="fiber_warp_name_cotton form-control col-md-7 col-xs-12">
              </div>

              <div class="col-md-1 col-sm-1 col-xs-2">
                <input type="text" id="fiber_warp_cotton_tol_value1" name="fiber_warp_cotton_tol_value1" oninput="fiber_warp_cotton_tol_cal_1();" class="fiber_warp_cotton_tol_value1_class form-control col-md-7 col-xs-12">
              </div>

              <div class="col-md-1 col-sm-1 col-xs-2" style="text-align: center;">
                <select id="fiber_warp_cotton_tol_cond" name="fiber_warp_cotton_tol_cond" onchange="fiber_warp_cotton_tol_condition();" class="fiber_warp_cotton_tol_cond select2 pp_number form-control col-md-12 col-xs-12">
                  <option value="1" selected="selected" > &plusmn; </option>
                  <option value="2" > + </option>
                  <option value="3" > - </option>
                </select> 
              </div> 

              <div class="col-md-1 col-sm-1 col-xs-2" style="text-align: center;">
                <input type="text" id="fiber_warp_cotton_tol_value2" name="fiber_warp_cotton_tol_value2" oninput="fiber_warp_cotton_tol_cal_2();" class="fiber_warp_cotton_tol_value2 form-control col-md-7 col-xs-12"> 
              </div>

              <div class="col-md-1 col-sm-1 col-xs-2">
                <select id="fiber_warp_cotton_cond1" name="fiber_warp_cotton_cond1" onchange="fiber_warp_cotton_condition()" class="fiber_warp_cotton_cond1 form-control col-md-12 col-xs-12">
                  <option value="" selected="selected">Select Condition</option>
                  <option value="1" <?php echo ($row_for_gray_variable["fiber_warp_cotton_cond1"] == "1") ? "selected" : "" ?> >(</option>
                  <option value="2" <?php echo ($row_for_gray_variable["fiber_warp_cotton_cond1"] == "2") ? "selected" : "" ?> >[</option>
                </select>
              </div>
              <div class="col-md-1 col-sm-1 col-xs-2">
                <input type="text" id="fiber_warp_cotton_value1" name="fiber_warp_cotton_value1" value="<?php echo isset($row_for_gray_variable["fiber_warp_cotton_value1"]) ? $row_for_gray_variable["fiber_warp_cotton_value1"] : "" ?>" class="fiber_warp_cotton_value1 form-control col-md-7 col-xs-12">
              </div>
              <div class="col-md-1 col-sm-1 col-xs-2" style="text-align: center;">
                --
              </div> 
              <div class="col-md-1 col-sm-1 col-xs-2">
                <input type="text" id="fiber_warp_cotton_value2" name="fiber_warp_cotton_value2" value="<?php echo isset($row_for_gray_variable["fiber_warp_cotton_value2"]) ? $row_for_gray_variable["fiber_warp_cotton_value2"] : "" ?>" class="fiber_warp_cotton_value2 form-control col-md-7 col-xs-12">
              </div>
              <div class="col-md-1 col-sm-1 col-xs-2">
                <select id="fiber_warp_cotton_cond2" name="fiber_warp_cotton_cond2" class="fiber_warp_cotton_cond2 form-control col-md-12 col-xs-12">
                  <option value="" selected="selected">Select Condition</option>
                  <option value="1" <?php echo ($row_for_gray_variable["fiber_warp_cotton_cond2"] == "1") ? "selected" : "" ?> >)</option>
                  <option value="2" <?php echo ($row_for_gray_variable["fiber_warp_cotton_cond2"] == "2") ? "selected" : "" ?> >]</option>
                </select>
              </div>

              <!-- start thired option -->
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fiber_warp">
              </label>
              <div class="col-md-1 col-sm-1 col-xs-2">
                <input type="text" id="fiber_warp_name_thired" name="fiber_warp_name_thired" value="<?php echo isset($row_for_gray_variable["fiber_warp_name_thired"]) ? $row_for_gray_variable["fiber_warp_name_thired"] : "" ?>" class="fiber_warp_name_thired form-control col-md-7 col-xs-12">
              </div>

              <div class="col-md-1 col-sm-1 col-xs-2">
                <input type="text" id="fiber_warp_thired_tol_value1" name="fiber_warp_thired_tol_value1" oninput="fiber_warp_thired_tol_cal_1();" class="fiber_warp_thired_tol_value1_class form-control col-md-7 col-xs-12">
              </div>

              <div class="col-md-1 col-sm-1 col-xs-2" style="text-align: center;">
                <select id="fiber_warp_thired_tol_cond" name="fiber_warp_thired_tol_cond" onchange="fiber_warp_thired_tol_condition();" class="fiber_warp_thired_tol_cond select2 pp_number form-control col-md-12 col-xs-12">
                  <option value="1" selected="selected" > &plusmn; </option>
                  <option value="2" > + </option>
                  <option value="3" > - </option>
                </select> 
              </div> 

              <div class="col-md-1 col-sm-1 col-xs-2" style="text-align: center;">
                <input type="text" id="fiber_warp_thired_tol_value2" name="fiber_warp_thired_tol_value2" oninput="fiber_warp_thired_tol_cal_2();" class="fiber_warp_thired_tol_value2 form-control col-md-7 col-xs-12"> 
              </div>

              <div class="col-md-1 col-sm-1 col-xs-2">
                <select id="fiber_warp_thired_cond1" name="fiber_warp_thired_cond1" onchange="fiber_warp_thired_condition()" class="fiber_warp_thired_cond1 form-control col-md-12 col-xs-12">
                  <option value="" selected="selected">Select Condition</option>
                  <option value="1" <?php echo ($row_for_gray_variable["fiber_warp_thired_cond1"] == "1") ? "selected" : "" ?> >(</option>
                  <option value="2" <?php echo ($row_for_gray_variable["fiber_warp_thired_cond1"] == "2") ? "selected" : "" ?> >[</option>
                </select>
              </div>
              <div class="col-md-1 col-sm-1 col-xs-2">
                <input type="text" id="fiber_warp_thired_value1" name="fiber_warp_thired_value1" value="<?php echo isset($row_for_gray_variable["fiber_warp_thired_value1"]) ? $row_for_gray_variable["fiber_warp_thired_value1"] : "" ?>" class="fiber_warp_thired_value1 form-control col-md-7 col-xs-12">
              </div>
              <div class="col-md-1 col-sm-1 col-xs-2" style="text-align: center;">
                --
              </div> 
              <div class="col-md-1 col-sm-1 col-xs-2">
                <input type="text" id="fiber_warp_thired_value2" name="fiber_warp_thired_value2" value="<?php echo isset($row_for_gray_variable["fiber_warp_thired_value2"]) ? $row_for_gray_variable["fiber_warp_thired_value2"] : "" ?>" class="fiber_warp_thired_value2 form-control col-md-7 col-xs-12">
              </div>
              <div class="col-md-1 col-sm-1 col-xs-2">
                <select id="fiber_warp_thired_cond2" name="fiber_warp_thired_cond2" class="fiber_warp_thired_cond2 form-control col-md-12 col-xs-12">
                  <option value="" selected="selected">Select Condition</option>
                  <option value="1" <?php echo ($row_for_gray_variable["fiber_warp_thired_cond2"] == "1") ? "selected" : "" ?> >)</option>
                  <option value="2" <?php echo ($row_for_gray_variable["fiber_warp_thired_cond2"] == "2") ? "selected" : "" ?> >]</option>
                </select>
              </div>

              <!-- start fourth option -->
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fiber_warp">
              </label>
              <div class="col-md-1 col-sm-1 col-xs-2">
                <input type="text" id="fiber_warp_name_fourth" name="fiber_warp_name_fourth" value="<?php echo isset($row_for_gray_variable["fiber_warp_name_fourth"]) ? $row_for_gray_variable["fiber_warp_name_fourth"] : "" ?>" class="fiber_warp_name_fourth form-control col-md-7 col-xs-12">
              </div>

              <div class="col-md-1 col-sm-1 col-xs-2">
                <input type="text" id="fiber_warp_fourth_tol_value1" name="fiber_warp_fourth_tol_value1" oninput="fiber_warp_fourth_tol_cal_1();" class="fiber_warp_fourth_tol_value1_class form-control col-md-7 col-xs-12">
              </div>

              <div class="col-md-1 col-sm-1 col-xs-2" style="text-align: center;">
                <select id="fiber_warp_fourth_tol_cond" name="fiber_warp_fourth_tol_cond" onchange="fiber_warp_fourth_tol_condition();" class="fiber_warp_fourth_tol_cond select2 pp_number form-control col-md-12 col-xs-12">
                  <option value="1" selected="selected" > &plusmn; </option>
                  <option value="2" > + </option>
                  <option value="3" > - </option>
                </select> 
              </div> 

              <div class="col-md-1 col-sm-1 col-xs-2" style="text-align: center;">
                <input type="text" id="fiber_warp_fourth_tol_value2" name="fiber_warp_fourth_tol_value2" oninput="fiber_warp_fourth_tol_cal_2();" class="fiber_warp_fourth_tol_value2 form-control col-md-7 col-xs-12"> 
              </div>

              <div class="col-md-1 col-sm-1 col-xs-2">
                <select id="fiber_warp_fourth_cond1" name="fiber_warp_fourth_cond1" onchange="fiber_warp_fourth_condition()" class="fiber_warp_fourth_cond1 form-control col-md-12 col-xs-12">
                  <option value="" selected="selected">Select Condition</option>
                  <option value="1" <?php echo ($row_for_gray_variable["fiber_warp_fourth_cond1"] == "1") ? "selected" : "" ?> >(</option>
                  <option value="2" <?php echo ($row_for_gray_variable["fiber_warp_fourth_cond1"] == "2") ? "selected" : "" ?> >[</option>
                </select>
              </div>
              <div class="col-md-1 col-sm-1 col-xs-2">
                <input type="text" id="fiber_warp_fourth_value1" name="fiber_warp_fourth_value1" value="<?php echo isset($row_for_gray_variable["fiber_warp_fourth_value1"]) ? $row_for_gray_variable["fiber_warp_fourth_value1"] : "" ?>" class="fiber_warp_fourth_value1 form-control col-md-7 col-xs-12">
              </div>
              <div class="col-md-1 col-sm-1 col-xs-2" style="text-align: center;">
                --
              </div> 
              <div class="col-md-1 col-sm-1 col-xs-2">
                <input type="text" id="fiber_warp_fourth_value2" name="fiber_warp_fourth_value2" value="<?php echo isset($row_for_gray_variable["fiber_warp_fourth_value2"]) ? $row_for_gray_variable["fiber_warp_fourth_value2"] : "" ?>" class="fiber_warp_fourth_value2 form-control col-md-7 col-xs-12">
              </div>
              <div class="col-md-1 col-sm-1 col-xs-2">
                <select id="fiber_warp_fourth_cond2" name="fiber_warp_fourth_cond2" class="fiber_warp_fourth_cond2 form-control col-md-12 col-xs-12">
                  <option value="" selected="selected">Select Condition</option>
                  <option value="1" <?php echo ($row_for_gray_variable["fiber_warp_fourth_cond2"] == "1") ? "selected" : "" ?> >)</option>
                  <option value="2" <?php echo ($row_for_gray_variable["fiber_warp_fourth_cond2"] == "2") ? "selected" : "" ?> >]</option>
                </select>
              </div>

            </div>
            <!-- end of new formet change -->


            <br>
            <!-- change for new formet -->
            <div class="form-group">  
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fiber_weft">Weft Fiber Content<span class="required">*</span>
              </label>
              <!-- start polyster -->
              <div class="col-md-1 col-sm-1 col-xs-2">
                <input type="text" id="fiber_weft_name_polyester" name="fiber_weft_name_polyester" value="<?php echo isset($row_for_gray_variable["fiber_weft_name_polyester"]) ? $row_for_gray_variable["fiber_weft_name_polyester"] : "polyester" ?>" readonly class="fiber_weft_name_polyester form-control col-md-7 col-xs-12">
              </div>

              <div class="col-md-1 col-sm-1 col-xs-2">
                <input type="text" id="fiber_weft_polyester_tol_value1" name="fiber_weft_polyester_tol_value1" oninput="fiber_weft_polyester_tol_cal_1();" class="fiber_weft_polyester_tol_value1_class form-control col-md-7 col-xs-12">
              </div>

              <div class="col-md-1 col-sm-1 col-xs-2" style="text-align: center;">
                <select id="fiber_weft_polyester_tol_cond" name="fiber_weft_polyester_tol_cond" onchange="fiber_weft_polyester_tol_condition();" class="fiber_weft_polyester_tol_cond select2 pp_number form-control col-md-12 col-xs-12">
                  <option value="1" selected="selected" > &plusmn; </option>
                  <option value="2" > + </option>
                  <option value="3" > - </option>
                </select> 
              </div> 

              <div class="col-md-1 col-sm-1 col-xs-2" style="text-align: center;">
                <input type="text" id="fiber_weft_polyester_tol_value2" name="fiber_weft_polyester_tol_value2" oninput="fiber_weft_polyester_tol_cal_2();" class="fiber_weft_polyester_tol_value2 form-control col-md-7 col-xs-12"> 
              </div>

              <div class="col-md-1 col-sm-1 col-xs-2">
                <select id="fiber_weft_polyester_cond1" name="fiber_weft_polyester_cond1" onchange="fiber_weft_polyester_condition()" class="fiber_weft_polyester_cond1 form-control col-md-12 col-xs-12">
                  <option value="" selected="selected">Select Condition</option>
                  <option value="1" <?php echo ($row_for_gray_variable["fiber_weft_polyester_cond1"] == "1") ? "selected" : "" ?> >(</option>
                  <option value="2" <?php echo ($row_for_gray_variable["fiber_weft_polyester_cond1"] == "2") ? "selected" : "" ?> >[</option>
                </select>
              </div>
              <div class="col-md-1 col-sm-1 col-xs-2">
                <input type="text" id="fiber_weft_polyester_value1" name="fiber_weft_polyester_value1" value="<?php echo isset($row_for_gray_variable["fiber_weft_polyester_value1"]) ? $row_for_gray_variable["fiber_weft_polyester_value1"] : "" ?>" class="fiber_weft_polyester_value1 form-control col-md-7 col-xs-12">
              </div>
              <div class="col-md-1 col-sm-1 col-xs-2" style="text-align: center;">
                --
              </div> 
              <div class="col-md-1 col-sm-1 col-xs-2">
                <input type="text" id="fiber_weft_polyester_value2" name="fiber_weft_polyester_value2" value="<?php echo isset($row_for_gray_variable["fiber_weft_polyester_value2"]) ? $row_for_gray_variable["fiber_weft_polyester_value2"] : "" ?>" class="fiber_weft_polyester_value2 form-control col-md-7 col-xs-12">
              </div>
              <div class="col-md-1 col-sm-1 col-xs-2">
                <select id="fiber_weft_polyester_cond2" name="fiber_weft_polyester_cond2" class="fiber_weft_polyester_cond2 form-control col-md-12 col-xs-12">
                  <option value="" selected="selected">Select Condition</option>
                  <option value="1" <?php echo ($row_for_gray_variable["fiber_weft_polyester_cond2"] == "1") ? "selected" : "" ?> >)</option>
                  <option value="2" <?php echo ($row_for_gray_variable["fiber_weft_polyester_cond2"] == "2") ? "selected" : "" ?> >]</option>
                </select>
              </div>

              <!-- start cotton -->
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fiber_weft">
              </label>
              <div class="col-md-1 col-sm-1 col-xs-2">
                <input type="text" id="fiber_weft_name_cotton" name="fiber_weft_name_cotton" value="<?php echo isset($row_for_gray_variable["fiber_weft_name_cotton"]) ? $row_for_gray_variable["fiber_weft_name_cotton"] : "cotton" ?>" readonly class="fiber_weft_name_cotton form-control col-md-7 col-xs-12">
              </div>

              <div class="col-md-1 col-sm-1 col-xs-2">
                <input type="text" id="fiber_weft_cotton_tol_value1" name="fiber_weft_cotton_tol_value1" oninput="fiber_weft_cotton_tol_cal_1();" class="fiber_weft_cotton_tol_value1_class form-control col-md-7 col-xs-12">
              </div>

              <div class="col-md-1 col-sm-1 col-xs-2" style="text-align: center;">
                <select id="fiber_weft_cotton_tol_cond" name="fiber_weft_cotton_tol_cond" onchange="fiber_weft_cotton_tol_condition();" class="fiber_weft_cotton_tol_cond select2 pp_number form-control col-md-12 col-xs-12">
                  <option value="1" selected="selected" > &plusmn; </option>
                  <option value="2" > + </option>
                  <option value="3" > - </option>
                </select>
              </div> 

              <div class="col-md-1 col-sm-1 col-xs-2" style="text-align: center;">
                <input type="text" id="fiber_weft_cotton_tol_value2" name="fiber_weft_cotton_tol_value2" oninput="fiber_weft_cotton_tol_cal_2();" class="fiber_weft_cotton_tol_value2 form-control col-md-7 col-xs-12"> 
              </div>

              <div class="col-md-1 col-sm-1 col-xs-2">
                <select id="fiber_weft_cotton_cond1" name="fiber_weft_cotton_cond1" onchange="fiber_weft_cotton_condition()" class="fiber_weft_cotton_cond1 form-control col-md-12 col-xs-12">
                  <option value="" selected="selected">Select Condition</option>
                  <option value="1" <?php echo ($row_for_gray_variable["fiber_weft_cotton_cond1"] == "1") ? "selected" : "" ?> >(</option>
                  <option value="2" <?php echo ($row_for_gray_variable["fiber_weft_cotton_cond1"] == "2") ? "selected" : "" ?> >[</option>
                </select>
              </div>
              <div class="col-md-1 col-sm-1 col-xs-2">
                <input type="text" id="fiber_weft_cotton_value1" name="fiber_weft_cotton_value1" value="<?php echo isset($row_for_gray_variable["fiber_weft_cotton_value1"]) ? $row_for_gray_variable["fiber_weft_cotton_value1"] : "" ?>" class="fiber_weft_cotton_value1 form-control col-md-7 col-xs-12">
              </div>
              <div class="col-md-1 col-sm-1 col-xs-2" style="text-align: center;">
                --
              </div> 
              <div class="col-md-1 col-sm-1 col-xs-2">
                <input type="text" id="fiber_weft_cotton_value2" name="fiber_weft_cotton_value2" value="<?php echo isset($row_for_gray_variable["fiber_weft_cotton_value2"]) ? $row_for_gray_variable["fiber_weft_cotton_value2"] : "" ?>" class="fiber_weft_cotton_value2 form-control col-md-7 col-xs-12">
              </div>
              <div class="col-md-1 col-sm-1 col-xs-2">
                <select id="fiber_weft_cotton_cond2" name="fiber_weft_cotton_cond2" class="fiber_weft_cotton_cond2 form-control col-md-12 col-xs-12">
                  <option value="" selected="selected">Select Condition</option>
                  <option value="1" <?php echo ($row_for_gray_variable["fiber_weft_cotton_cond2"] == "1") ? "selected" : "" ?> >)</option>
                  <option value="2" <?php echo ($row_for_gray_variable["fiber_weft_cotton_cond2"] == "2") ? "selected" : "" ?> >]</option>
                </select>
              </div>

              <!-- start thired option -->
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fiber_weft">
              </label>
              <div class="col-md-1 col-sm-1 col-xs-2">
                <input type="text" id="fiber_weft_name_thired" name="fiber_weft_name_thired" value="<?php echo isset($row_for_gray_variable["fiber_weft_name_thired"]) ? $row_for_gray_variable["fiber_weft_name_thired"] : "" ?>" class="fiber_weft_name_thired form-control col-md-7 col-xs-12">
              </div>

              <div class="col-md-1 col-sm-1 col-xs-2">
                <input type="text" id="fiber_weft_thired_tol_value1" name="fiber_weft_thired_tol_value1" oninput="fiber_weft_thired_tol_cal_1();" class="fiber_weft_thired_tol_value1_class form-control col-md-7 col-xs-12">
              </div>

              <div class="col-md-1 col-sm-1 col-xs-2" style="text-align: center;">
                <select id="fiber_weft_thired_tol_cond" name="fiber_weft_thired_tol_cond" onchange="fiber_weft_thired_tol_condition();" class="fiber_weft_thired_tol_cond select2 pp_number form-control col-md-12 col-xs-12">
                  <option value="1" selected="selected" > &plusmn; </option>
                  <option value="2" > + </option>
                  <option value="3" > - </option>
                </select> 
              </div> 

              <div class="col-md-1 col-sm-1 col-xs-2" style="text-align: center;">
                <input type="text" id="fiber_weft_thired_tol_value2" name="fiber_weft_thired_tol_value2" oninput="fiber_weft_thired_tol_cal_2();" class="fiber_weft_thired_tol_value2 form-control col-md-7 col-xs-12"> 
              </div>

              <div class="col-md-1 col-sm-1 col-xs-2">
                <select id="fiber_weft_thired_cond1" name="fiber_weft_thired_cond1" onchange="fiber_weft_thired_condition()" class="fiber_weft_thired_cond1 form-control col-md-12 col-xs-12">
                  <option value="" selected="selected">Select Condition</option>
                  <option value="1" <?php echo ($row_for_gray_variable["fiber_weft_thired_cond1"] == "1") ? "selected" : "" ?> >(</option>
                  <option value="2" <?php echo ($row_for_gray_variable["fiber_weft_thired_cond1"] == "2") ? "selected" : "" ?> >[</option>
                </select>
              </div>
              <div class="col-md-1 col-sm-1 col-xs-2">
                <input type="text" id="fiber_weft_thired_value1" name="fiber_weft_thired_value1" value="<?php echo isset($row_for_gray_variable["fiber_weft_thired_value1"]) ? $row_for_gray_variable["fiber_weft_thired_value1"] : "" ?>" class="fiber_weft_thired_value1 form-control col-md-7 col-xs-12">
              </div>
              <div class="col-md-1 col-sm-1 col-xs-2" style="text-align: center;">
                --
              </div> 
              <div class="col-md-1 col-sm-1 col-xs-2">
                <input type="text" id="fiber_weft_thired_value2" name="fiber_weft_thired_value2" value="<?php echo isset($row_for_gray_variable["fiber_weft_thired_value2"]) ? $row_for_gray_variable["fiber_weft_thired_value2"] : "" ?>" class="fiber_weft_thired_value2 form-control col-md-7 col-xs-12">
              </div>
              <div class="col-md-1 col-sm-1 col-xs-2">
                <select id="fiber_weft_thired_cond2" name="fiber_weft_thired_cond2" class="fiber_weft_thired_cond2 form-control col-md-12 col-xs-12">
                  <option value="" selected="selected">Select Condition</option>
                  <option value="1" <?php echo ($row_for_gray_variable["fiber_weft_thired_cond2"] == "1") ? "selected" : "" ?> >)</option>
                  <option value="2" <?php echo ($row_for_gray_variable["fiber_weft_thired_cond2"] == "2") ? "selected" : "" ?> >]</option>
                </select>
              </div>

              <!-- start fourth option -->
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fiber_weft">
              </label>
              <div class="col-md-1 col-sm-1 col-xs-2">
                <input type="text" id="fiber_weft_name_fourth" name="fiber_weft_name_fourth" value="<?php echo isset($row_for_gray_variable["fiber_weft_name_fourth"]) ? $row_for_gray_variable["fiber_weft_name_fourth"] : "" ?>"  class="fiber_weft_name_fourth form-control col-md-7 col-xs-12">
              </div>

              <div class="col-md-1 col-sm-1 col-xs-2">
                <input type="text" id="fiber_weft_fourth_tol_value1" name="fiber_weft_fourth_tol_value1" oninput="fiber_weft_fourth_tol_cal_1();" class="fiber_weft_fourth_tol_value1_class form-control col-md-7 col-xs-12">
              </div>

              <div class="col-md-1 col-sm-1 col-xs-2" style="text-align: center;">
                <select id="fiber_weft_fourth_tol_cond" name="fiber_weft_fourth_tol_cond" onchange="fiber_weft_fourth_tol_condition();" class="fiber_weft_fourth_tol_cond select2 pp_number form-control col-md-12 col-xs-12">
                  <option value="1" selected="selected" > &plusmn; </option>
                  <option value="2" > + </option>
                  <option value="3" > - </option>
                </select> 
              </div> 

              <div class="col-md-1 col-sm-1 col-xs-2" style="text-align: center;">
                <input type="text" id="fiber_weft_fourth_tol_value2" name="fiber_weft_fourth_tol_value2" oninput="fiber_weft_fourth_tol_cal_2();" class="fiber_weft_fourth_tol_value2 form-control col-md-7 col-xs-12"> 
              </div>

              <div class="col-md-1 col-sm-1 col-xs-2">
                <select id="fiber_weft_fourth_cond1" name="fiber_weft_fourth_cond1" onchange="fiber_weft_fourth_condition()" class="fiber_weft_fourth_cond1 form-control col-md-12 col-xs-12">
                  <option value="" selected="selected">Select Condition</option>
                  <option value="1" <?php echo ($row_for_gray_variable["fiber_weft_fourth_cond1"] == "1") ? "selected" : "" ?> >(</option>
                  <option value="2" <?php echo ($row_for_gray_variable["fiber_weft_fourth_cond1"] == "2") ? "selected" : "" ?> >[</option>
                </select>
              </div>
              <div class="col-md-1 col-sm-1 col-xs-2">
                <input type="text" id="fiber_weft_fourth_value1" name="fiber_weft_fourth_value1" value="<?php echo isset($row_for_gray_variable["fiber_weft_fourth_value1"]) ? $row_for_gray_variable["fiber_weft_fourth_value1"] : "" ?>" class="fiber_weft_fourth_value1 form-control col-md-7 col-xs-12">
              </div>
              <div class="col-md-1 col-sm-1 col-xs-2" style="text-align: center;">
                --
              </div> 
              <div class="col-md-1 col-sm-1 col-xs-2">
                <input type="text" id="fiber_weft_fourth_value2" name="fiber_weft_fourth_value2" value="<?php echo isset($row_for_gray_variable["fiber_weft_fourth_value2"]) ? $row_for_gray_variable["fiber_weft_fourth_value2"] : "" ?>" class="fiber_weft_fourth_value2 form-control col-md-7 col-xs-12">
              </div>
              <div class="col-md-1 col-sm-1 col-xs-2">
                <select id="fiber_weft_fourth_cond2" name="fiber_weft_fourth_cond2" class="fiber_weft_fourth_cond2 form-control col-md-12 col-xs-12">
                  <option value="" selected="selected">Select Condition</option>
                  <option value="1" <?php echo ($row_for_gray_variable["fiber_weft_fourth_cond2"] == "1") ? "selected" : "" ?> >)</option>
                  <option value="2" <?php echo ($row_for_gray_variable["fiber_weft_fourth_cond2"] == "2") ? "selected" : "" ?> >]</option>
                </select>
              </div>

            </div>
            <!-- end of new formet change -->


            <?php
        }
      ?>

      <div class="ln_solid"></div>
      <div class="form-group">
        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
          <input type="hidden" id="pp_no_id" name="pp_no_id" value="<?php echo $pp_no_id; ?>">
          <input type="hidden" id="pp_details_id" name="pp_details_id" value="<?php echo $pp_details_id; ?>">
          <input type="hidden" id="gray_variable_id" name="gray_variable_id" value="<?php echo $row_for_gray_variable['gray_variable_id']; ?>">
          <button type="button" name="submit" id="submit" onclick="update_edit_standard_data('<?php echo $pp_details_id; ?>');" class="btn btn-success" >Update</button>
          <button type="button" name="submit" id="submit" onclick="cancel_edit_standard_data();" class="btn btn-success" >Cancel</button>
        </div>
      </div>

    </form>
  </div>
</div>

<?php  ?>