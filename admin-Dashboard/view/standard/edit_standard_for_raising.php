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

$sql_for_gray_variable = "SELECT * FROM raising_standard WHERE pp_no_id = '$pp_no_id' AND pp_details_id = '$pp_details_id' AND active = '1' ";
$res_for_gray_variable = mysqli_query($con , $sql_for_gray_variable);
$row_for_gray_variable = mysqli_fetch_array($res_for_gray_variable);
?>


<div class="x_panel">
  <div class="x_title">
    <h2>Raising Standards Edit Form</h2>
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

      <br>

     

            

      <div class="ln_solid"></div>
      <div class="form-group">n
        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
          <input type="hidden" id="pp_no_id" name="pp_no_id" value="<?php echo $pp_no_id; ?>">
          <input type="hidden" id="pp_details_id" name="pp_details_id" value="<?php echo $pp_details_id; ?>">
          <input type="hidden" id="raising_standard_id" name="raising_standard_id" value="<?php echo $row_for_gray_variable['raising_standard_id']; ?>">
          <button type="button" name="submit" id="submit" onclick="update_edit_raising_standard_data('<?php echo $pp_details_id; ?>');" class="btn btn-success" >Update</button>
          <button type="button" name="submit" id="submit" onclick="cancel_edit_standard_data();" class="btn btn-success" >Cancel</button>
        </div>
      </div>

    </form>
  </div>
</div>

<?php  ?>