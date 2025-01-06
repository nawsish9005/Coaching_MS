<?php
?>
<!-- main content again -->
<button type="button" name="previous_data" id="previous_data" value="<?php echo $pp_version; ?>" data-toggle="modal" data-target=".bs-example-modal-lg"   class="btn btn-success text-center" onclick="pass_version_id(this.value);">Copy from previous PP Version</button>
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12" id="retrieve_edit_data" style="padding-bottom: 20px;">

    <!-- add greige standard of single pp number -->
    <div class="x_panel">
      <div class="x_title">
        <h2>Mercerize Standards Add Form</h2>
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

        <form id="mercerize_standard_form" name="mercerize_standard_form" data-parsley-validate class="form-horizontal form-label-left">
          
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

            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="absorbency">Absorbency <span class="required">*</span>
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
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($_POST['absorbency_cond1'] == '1') ? 'selected' : '' ?> >(</option>
                <option value="2" <?php echo ($_POST['absorbency_cond1'] == '2') ? 'selected' : '' ?> >[</option>
              </select>
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="absorbency_value1" name="absorbency_value1" value="<?php echo isset($_POST['absorbency_value1']) ? $_POST['absorbency_value1'] : '' ?>" class="absorbency_value1 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              --
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="absorbency_value2" name="absorbency_value2" value="<?php echo isset($_POST['absorbency_value2']) ? $_POST['absorbency_value2'] : '' ?>" class="absorbency_value2 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="absorbency_cond2" name="absorbency_cond2" class="absorbency_cond2 form-control col-md-12 col-xs-12">
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($_POST['absorbency_cond2'] == '1') ? 'selected' : '' ?> >)</option>
                <option value="2" <?php echo ($_POST['absorbency_cond2'] == '2') ? 'selected' : '' ?> >]</option>
              </select>
            </div>
          </div>

          <br>

          <div class="form-group">

            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="sizing"> Sizing <span class="required">*</span>
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
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($_POST['sizing_cond1'] == '1') ? 'selected' : '' ?> >(</option>
                <option value="2" <?php echo ($_POST['sizing_cond1'] == '2') ? 'selected' : '' ?> >[</option>
              </select>
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="sizing_value1" name="sizing_value1" value="<?php echo isset($_POST['sizing_value1']) ? $_POST['sizing_value1'] : '' ?>" class="sizing_value1 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2" style='text-align: center;'>
              --
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2">
              <input type="text" id="sizing_value2" name="sizing_value2" value="<?php echo isset($_POST['sizing_value2']) ? $_POST['sizing_value2'] : '' ?>" class="sizing_value2 form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-2">
              <select id="sizing_cond2" name="sizing_cond2" class="sizing_cond2 form-control col-md-12 col-xs-12">
                <option value="" selected="selected">Select Condition</option>
                <option value="1" <?php echo ($_POST['sizing_cond2'] == '1') ? 'selected' : '' ?> >)</option>
                <option value="2" <?php echo ($_POST['sizing_cond2'] == '2') ? 'selected' : '' ?> >]</option>
              </select>
            </div>
          </div>

          <br>

          <div class="form-group">

            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="whiteness">Whiteness (Barger) <span class="required">*</span>
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
              <button type="button" name="submit" id="submit" class="btn btn-success" onclick="send_data_of_define_standard_of_mercerize_form_to_database('<?php echo $pp_version; ?>');">Submit</button>
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