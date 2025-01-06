<?php
?>
<!-- main content again -->
<button type="button" name="previous_data" id="previous_data" value="<?php echo $pp_version; ?>" data-toggle="modal" data-target=".bs-example-modal-lg"   class="btn btn-success text-center" onclick="pass_version_id(this.value);">Copy from previous PP Version</button>
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12" id="retrieve_edit_data" style="padding-bottom: 20px;">

    <!-- add greige standard of single pp number -->
    <div class="x_panel">
      <div class="x_title">
        <h2>Printing Standards Add Form</h2>
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
                        WHERE pp_id = '$pp_version' AND active = '1' ";
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

            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="rubbing">Rubbing <span class="required">*</span>
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
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($_POST['rubbing_cond1'] == '1') ? 'selected' : '' ?> >(</option>
                <option value="2" <?php echo ($_POST['rubbing_cond1'] == '2') ? 'selected' : '' ?> >[</option>
              </select>
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="rubbing_value1" name="rubbing_value1" value="<?php echo isset($_POST['rubbing_value1']) ? $_POST['rubbing_value1'] : '' ?>" class="rubbing_value1 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              --
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="rubbing_value2" name="rubbing_value2" value="<?php echo isset($_POST['rubbing_value2']) ? $_POST['rubbing_value2'] : '' ?>" class="rubbing_value2 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="rubbing_cond2" name="rubbing_cond2" class="rubbing_cond2 form-control col-md-12 col-xs-12">
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($_POST['rubbing_cond2'] == '1') ? 'selected' : '' ?> >)</option>
                <option value="2" <?php echo ($_POST['rubbing_cond2'] == '2') ? 'selected' : '' ?> >]</option>
              </select>
            </div>
          </div>

          <div class="ln_solid"></div>
          <div class="form-group">
            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
              <input type="hidden" id="pp_id_number" name="pp_id_number" value="<?php echo $pp_no_id; ?>">
              <input type="hidden" id="pp_details_id" name="pp_details_id" value="<?php echo $pp_version; ?>">
              <button type="button" name="submit" id="submit" class="btn btn-success" onclick="send_data_of_define_standard_of_printing_form_to_database('<?php echo $pp_version; ?>');">Submit</button>
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