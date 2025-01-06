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

    <table class="table table-striped table-bordered">
        <thead>
          <tr>
            <th>SI</th>
            <th>PP Version</th>
            <th>Color</th>
            <th>Gray Width</th>
            <th>Finish Width</th>
            <th>Order Quantity</th>
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

        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="rubbing">Rubbing<span class="required">*</span>
        </label>
        <div class="col-md-1 col-sm-1 col-xs-2">
          <input type="text" id="rubbing_tol_value1" name="rubbing_tol_value1" oninput="rubbing_tol_cal_1();" class="rubbing_tol_value1 form-control col-md-7 col-xs-12">
        </div>
        <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
          <select id="rubbing_tol_cond" name="rubbing_tol_cond" onchange="rubbing_tol_condition();" class="rubbing_tol_cond select2 pp_number form-control col-md-12 col-xs-12">
            <option value="1" selected="selected" > &plusmn; </option>
            <option value="2" > + </option>
            <option value="3" > - </option>
          </select>
        </div> 
        <div class="col-md-1 col-sm-1 col-xs-2">
          <input type="text" id="rubbing_tol_value2" name="rubbing_tol_value2" oninput="rubbing_tol_cal_2();" class="rubbing_tol_value2 form-control col-md-7 col-xs-12">
        </div>
        <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
          % 
        </div>

        <div class="col-md-1 col-sm-1 col-xs-2">
          <select id="rubbing_cond1" name="rubbing_cond1" onchange="rubbing_condition()" class="rubbing_cond1 form-control col-md-12 col-xs-12">
            <option value="">Select Condition</option>
            <option <?php if($row_for_printing_standard['rubbing_cond1'] == 1) {echo "selected";} ?> value="1">(</option>
            <option <?php if($row_for_printing_standard['rubbing_cond1'] == 2) {echo "selected";} ?>  value="2">[</option>
          </select>
        </div>
        <div class="col-md-1 col-sm-1 col-xs-2">
          <input type="text" id="rubbing_value1" value="<?php echo $row_for_printing_standard['rubbing_value1']; ?>" name="rubbing_value1" class="rubbing_value1 form-control col-md-7 col-xs-12">
        </div>
        <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
          --
        </div> 
        <div class="col-md-1 col-sm-1 col-xs-2">
          <input type="text" id="rubbing_value2" value="<?php echo $row_for_printing_standard['rubbing_value2']; ?>" name="rubbing_value2" class="rubbing_value2 form-control col-md-7 col-xs-12">
        </div>
        <div class="col-md-1 col-sm-1 col-xs-2">
          <select id="rubbing_cond2" name="rubbing_cond2" class="rubbing_cond2 form-control col-md-12 col-xs-12">
            <option value="">Select Condition</option>
            <option <?php if($row_for_printing_standard['rubbing_cond2'] == 1) {echo "selected";} ?> value="1">)</option>
            <option <?php if($row_for_printing_standard['rubbing_cond2'] == 2) {echo "selected";} ?> value="2">]</option>
          </select>
        </div>
      </div>

      

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