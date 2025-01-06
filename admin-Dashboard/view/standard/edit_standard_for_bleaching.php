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

$sql_for_bleaching_standard = "SELECT * FROM bleaching_standard WHERE pp_no_id = '$pp_no_id' AND pp_details_id = '$pp_details_id' AND active = '1' ";
$res_for_bleaching_standard = mysqli_query($con , $sql_for_bleaching_standard);
$row_for_bleaching_standard = mysqli_fetch_array($res_for_bleaching_standard);
?>


<div class="x_panel">
  <div class="x_title">
    <h2>Bleaching Standards Edit Form</h2>
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

    <form id="bleaching_standard_form" name="bleaching_standard_form" data-parsley-validate class="form-horizontal form-label-left">
      
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
        
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="absorbency">Absorbency<span class="required">*</span>
        </label>
        <div class="col-md-1 col-sm-1 col-xs-2">
          <input type="text" id="absorbency_tol_value1" name="absorbency_tol_value1" oninput="absorbency_tol_cal_1();" class="absorbency_tol_value1 form-control col-md-7 col-xs-12">
        </div>
        <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
          <select id="absorbency_tol_cond" name="absorbency_tol_cond" onchange="absorbency_tol_condition();" class="absorbency_tol_cond select2 pp_number form-control col-md-12 col-xs-12">
            <option value="1" selected="selected" > &plusmn; </option>
            <option value="2" > + </option>
            <option value="3" > - </option>
          </select>
        </div> 
        <div class="col-md-1 col-sm-1 col-xs-2">
          <input type="text" id="absorbency_tol_value2" name="absorbency_tol_value2" oninput="absorbency_tol_cal_2();" class="absorbency_tol_value2 form-control col-md-7 col-xs-12">
        </div>
        <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
          % 
        </div>

        <div class="col-md-1 col-sm-1 col-xs-2">
          <select id="absorbency_cond1" name="absorbency_cond1" onchange="absorbency_condition()" class="absorbency_cond1 form-control col-md-12 col-xs-12">
            <option value="">Select Condition</option>
            <option value="1" <?php if($row_for_bleaching_standard['absorbency_cond1'] == 1) {echo "selected";} ?> >(</option>
            <option <?php if($row_for_bleaching_standard['absorbency_cond1'] == 2) {echo "selected";} ?> value="2">[</option>
          </select>
        </div>
        <div class="col-md-1 col-sm-1 col-xs-2">
          <input type="text" id="absorbency_value1" value="<?php echo $row_for_bleaching_standard['absorbency_value1']; ?>" name="absorbency_value1" class="absorbency_value1 form-control col-md-7 col-xs-12">
        </div>
        <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
          --
        </div> 
        <div class="col-md-1 col-sm-1 col-xs-2">
          <input type="text" id="absorbency_value2" value="<?php echo $row_for_bleaching_standard['absorbency_value2']; ?>" name="absorbency_value2" class="absorbency_value2 form-control col-md-7 col-xs-12">
        </div>
        <div class="col-md-1 col-sm-1 col-xs-2">
          <select id="absorbency_cond2" name="absorbency_cond2" class="absorbency_cond2 form-control col-md-12 col-xs-12">
            <option value="">Select Condition</option>
            <option <?php if($row_for_bleaching_standard['absorbency_cond2'] == 1) {echo "selected";} ?> value="1">)</option>
            <option <?php if($row_for_bleaching_standard['absorbency_cond2'] == 2) {echo "selected";} ?>  value="2">]</option>
          </select>
        </div>
      </div>

      <br>

      <div class="form-group">

        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="sizing">Resudual Sizing Material<span class="required">*</span>
        </label>
        <div class="col-md-1 col-sm-1 col-xs-2">
          <input type="text" id="sizing_tol_value1" name="sizing_tol_value1" oninput="sizing_tol_cal_1();" class="sizing_tol_value1 form-control col-md-7 col-xs-12">
        </div>
        <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
          <select id="sizing_tol_cond" name="sizing_tol_cond" onchange="sizing_tol_condition();" class="sizing_tol_cond select2 pp_number form-control col-md-12 col-xs-12">
            <option value="1" selected="selected" > &plusmn; </option>
            <option value="2" > + </option>
            <option value="3" > - </option>
          </select>
        </div> 
        <div class="col-md-1 col-sm-1 col-xs-2">
          <input type="text" id="sizing_tol_value2" name="sizing_tol_value2" oninput="sizing_tol_cal_2();" class="sizing_tol_value2 form-control col-md-7 col-xs-12">
        </div>
        <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
          % 
        </div>

        <div class="col-md-1 col-sm-1 col-xs-2">
          <select id="sizing_cond1" name="sizing_cond1" onchange="sizing_condition()" class="sizing_cond1 form-control col-md-12 col-xs-12">
            <option value="">Select Condition</option>
            <option <?php if($row_for_bleaching_standard['sizing_cond1'] == 1) {echo "selected";} ?>  value="1">(</option>
            <option <?php if($row_for_bleaching_standard['sizing_cond1'] == 2) {echo "selected";} ?> value="2">[</option>
          </select>
        </div>
        <div class="col-md-1 col-sm-1 col-xs-2">
          <input type="text" id="sizing_value1" value="<?php echo $row_for_bleaching_standard['sizing_value1']; ?>" name="sizing_value1" class="sizing_value1 form-control col-md-7 col-xs-12">
        </div>
        <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
          --
        </div> 
        <div class="col-md-1 col-sm-1 col-xs-2">
          <input type="text" id="sizing_value2" value="<?php echo $row_for_bleaching_standard['sizing_value2']; ?>" name="sizing_value2" class="sizing_value2 form-control col-md-7 col-xs-12">
        </div>
        <div class="col-md-1 col-sm-1 col-xs-2">
          <select id="sizing_cond2" name="sizing_cond2" class="sizing_cond2 form-control col-md-12 col-xs-12">
            <option value="">Select Condition</option>
            <option <?php if($row_for_bleaching_standard['sizing_cond2'] == 1) {echo "selected";} ?> value="1">)</option>
            <option <?php if($row_for_bleaching_standard['sizing_cond2'] == 2) {echo "selected";} ?> value="2">]</option>
          </select>
        </div>
      </div>

      <br>

      <div class="form-group">

        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="whiteness">Whiteness (Barger)<span class="required">*</span>
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
          % 
        </div>

        <div class="col-md-1 col-sm-1 col-xs-2">
          <select id="whiteness_cond1" name="whiteness_cond1" onchange="whiteness_condition()" class="whiteness_cond1 form-control col-md-12 col-xs-12">
            <option value="">Select Condition</option>
            <option <?php if($row_for_bleaching_standard['whiteness_cond1'] == 1) {echo "selected";} ?> value="1">(</option>
            <option <?php if($row_for_bleaching_standard['whiteness_cond1'] == 2) {echo "selected";} ?>  value="2">[</option>
          </select>
        </div>
        <div class="col-md-1 col-sm-1 col-xs-2">
          <input type="text" id="whiteness_value1" value="<?php echo $row_for_bleaching_standard['whiteness_value1']; ?>" name="whiteness_value1" class="whiteness_value1 form-control col-md-7 col-xs-12">
        </div>
        <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
          --
        </div> 
        <div class="col-md-1 col-sm-1 col-xs-2">
          <input type="text" id="whiteness_value2" value="<?php echo $row_for_bleaching_standard['whiteness_value2']; ?>" name="whiteness_value2" class="whiteness_value2 form-control col-md-7 col-xs-12">
        </div>
        <div class="col-md-1 col-sm-1 col-xs-2">
          <select id="whiteness_cond2" name="whiteness_cond2" class="whiteness_cond2 form-control col-md-12 col-xs-12">
            <option value="">Select Condition</option>
            <option <?php if($row_for_bleaching_standard['whiteness_cond2'] == 1) {echo "selected";} ?> value="1">)</option>
            <option <?php if($row_for_bleaching_standard['whiteness_cond2'] == 2) {echo "selected";} ?> value="2">]</option>
          </select>
        </div>
      </div>

      <br>

      <div class="form-group">

        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="pilling">Pilling (ISO 12945-2) <span class="required">*</span>
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
            <option value="">Select Condition</option>
            <option <?php if($row_for_bleaching_standard['pilling_cond1'] == 1) {echo "selected";} ?> value="1">(</option>
            <option <?php if($row_for_bleaching_standard['pilling_cond1'] == 2) {echo "selected";} ?> value="2">[</option>
          </select>
        </div>
        <div class="col-md-1 col-sm-1 col-xs-2">
          <input type="text" id="pilling_value1" value="<?php echo $row_for_bleaching_standard['pilling_value1']; ?>" name="pilling_value1" class="pilling_value1 form-control col-md-7 col-xs-12">
        </div>
        <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
          --
        </div> 
        <div class="col-md-1 col-sm-1 col-xs-2">
          <input type="text" id="pilling_value2" value="<?php echo $row_for_bleaching_standard['pilling_value2']; ?>" name="pilling_value2" class="pilling_value2 form-control col-md-7 col-xs-12">
        </div>
        <div class="col-md-1 col-sm-1 col-xs-2">
          <select id="pilling_cond2" name="pilling_cond2" class="pilling_cond2 form-control col-md-12 col-xs-12">
            <option value="">Select Condition</option>
            <option <?php if($row_for_bleaching_standard['pilling_cond2'] == 1) {echo "selected";} ?> value="1">)</option>
            <option <?php if($row_for_bleaching_standard['pilling_cond2'] == 2) {echo "selected";} ?> value="2">]</option>
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
          % 
        </div>

        <div class="col-md-1 col-sm-1 col-xs-2">
          <select id="ph_cond1" name="ph_cond1" onchange="ph_condition()" class="ph_cond1 form-control col-md-12 col-xs-12">
            <option value="">Select Condition</option>
            <option <?php if($row_for_bleaching_standard['ph_cond1'] == 1) {echo "selected";} ?> value="1">(</option>
            <option <?php if($row_for_bleaching_standard['ph_cond1'] == 2) {echo "selected";} ?> value="2">[</option>
          </select>
        </div>
        <div class="col-md-1 col-sm-1 col-xs-2">
          <input type="text" id="ph_value1" value="<?php echo $row_for_bleaching_standard['ph_value1']; ?>" name="ph_value1" class="ph_value1 form-control col-md-7 col-xs-12">
        </div>
        <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
          --
        </div> 
        <div class="col-md-1 col-sm-1 col-xs-2">
          <input type="text" id="ph_value2" value="<?php echo $row_for_bleaching_standard['ph_value2']; ?>" name="ph_value2" class="ph_value2 form-control col-md-7 col-xs-12">
        </div>
        <div class="col-md-1 col-sm-1 col-xs-2">
          <select id="ph_cond2" name="ph_cond2" class="ph_cond2 form-control col-md-12 col-xs-12">
            <option value="">Select Condition</option>
            <option <?php if($row_for_bleaching_standard['ph_cond2'] == 1) {echo "selected";} ?> value="1">)</option>
            <option <?php if($row_for_bleaching_standard['ph_cond2'] == 2) {echo "selected";} ?> value="2">]</option>
          </select>
        </div>
      </div>

      <div class="ln_solid"></div>
      <div class="form-group">
        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
          <input type="hidden" id="pp_no_id" name="pp_no_id" value="<?php echo $pp_no_id; ?>">
          <input type="hidden" id="pp_details_id" name="pp_details_id" value="<?php echo $pp_details_id; ?>">
          <input type="hidden" id="bleaching_standard_id" name="bleaching_standard_id" value="<?php echo $row_for_bleaching_standard['bleaching_standard_id']; ?>">
          <button type="button" name="submit" id="submit" onclick="update_edit_bleaching_standard_data('<?php echo $pp_details_id; ?>');" class="btn btn-success" >Update</button>
          <button type="button" name="submit" id="submit" onclick="cancel_edit_bleaching_standard_data();" class="btn btn-success" >Cancel</button>
        </div>
      </div>

    </form>
  </div>
</div>


<?php  ?>