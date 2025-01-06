<?php  
  // echo $pp_no_id;
  // echo "<br>";
  // echo $pp_version;
  // exit();
?>
<!-- main content again -->
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12" id="retrieve_edit_data" style="padding-bottom: 20px;">

    <div class="x_panel">
      <div class="x_title">
        <h2>Bleaching Standards</h2>         
      </div>
      <div class="x_content">
        <table id="datatable-buttons" class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>SI</th>
              <th>Version</th>
              <th>Color</th>
              <th>Greige Width(inch)</th>
              <th>Absorbency</th>
              <th>Resudual Sizing Material</th>
              <th>Whiteness (Barger)</th>
              <th>Pilling</th>
              <th>pH</th>
              <th>Action</th>
            </tr>
          </thead>
          
          <tbody>
            <?php 
              $s1 = 1;
              $sql_for_pp = "SELECT 
                                process_program_info.pp_no,
                                process_program_info.pp_id,
                                version_wise_process_program_info.pp_id,
                                version_wise_process_program_info.pp_no_id,
                                version_wise_process_program_info.version,
                                version_wise_process_program_info.color,
                                version_wise_process_program_info.gray_width,
                                version_wise_process_program_info.quantity,
                                defining_bleaching_qc_standard.*

                             FROM 
                                process_program_info, version_wise_process_program_info, defining_bleaching_qc_standard   
                             WHERE 
                                process_program_info.pp_id = '$pp_no_id'
                                AND process_program_info.pp_id = version_wise_process_program_info.pp_no_id
                                AND version_wise_process_program_info.pp_id = '$pp_version'
                                AND defining_bleaching_qc_standard.pp_no_id = version_wise_process_program_info.pp_no_id
                                AND defining_bleaching_qc_standard.pp_details_id = version_wise_process_program_info.pp_id
                                AND defining_bleaching_qc_standard.active = '1'
                                AND version_wise_process_program_info.active = '1'
                             ";



              $res_for_pp = mysqli_query($con, $sql_for_pp);

              while ($row = mysqli_fetch_assoc($res_for_pp)) 
              {
            ?>
            <tr>
              <td><?php echo $s1; ?></td>
              <td><?php echo $row['version'] ?></td>
              <td>
                <?php 
                  $color_id = $row['color'];
                  $sql_for_color = "SELECT color_name FROM color WHERE color_id = '$color_id'";
                  $res_for_color = mysqli_query($con, $sql_for_color);
                  $row_for_color = mysqli_fetch_assoc($res_for_color);
                  echo $row_for_color['color_name'];
                ?>
              </td>
              <td><?php echo $row['gray_width'] ?></td>
              <td>
                <?php 
                  if ($row['absorbency_cond1'] == 1) 
                  {
                    echo "( ";
                  }
                  elseif ($row['absorbency_cond1'] == 2) 
                  {
                    echo "[ ";
                  }
                  else
                  {
                    echo "] ";
                  }
                  
                  echo $row['absorbency_value1'];
                  echo " - ";
                  echo $row['absorbency_value2'];

                  if ($row['absorbency_cond2'] == 1) 
                  {
                    echo " )";
                  }
                  elseif ($row['absorbency_cond2'] == 2) 
                  {
                    echo " ]";
                  }
                  else
                  {
                    echo " [";
                  }
                ?>
              </td>
              <td>
                <?php 
                  if ($row['sizing_cond1'] == 1) 
                  {
                    echo "( ";
                  }
                  elseif ($row['sizing_cond1'] == 2) 
                  {
                    echo "[ ";
                  }
                  else
                  {
                    echo "] ";
                  }
                  
                  echo $row['sizing_value1'];
                  echo " - ";
                  echo $row['sizing_value2'];

                  if ($row['sizing_cond2'] == 1) 
                  {
                    echo " )";
                  }
                  elseif ($row['sizing_cond2'] == 2) 
                  {
                    echo " ]";
                  }
                  else
                  {
                    echo " [";
                  }
                ?>
              </td>
              <td>
                <?php 
                  if ($row['whiteness_cond1'] == 1) 
                  {
                    echo "( ";
                  }
                  elseif ($row['whiteness_cond1'] == 2) 
                  {
                    echo "[ ";
                  }
                  else
                  {
                    echo "] ";
                  }
                  
                  echo $row['whiteness_value1'];
                  echo " - ";
                  echo $row['whiteness_value2'];

                  if ($row['whiteness_cond2'] == 1) 
                  {
                    echo " )";
                  }
                  elseif ($row['whiteness_cond2'] == 2) 
                  {
                    echo " ]";
                  }
                  else
                  {
                    echo " [";
                  }
                ?>
              </td>
              <td>
                <?php 
                  if ($row['pilling_cond1'] == 1) 
                  {
                    echo "( ";
                  }
                  elseif ($row['pilling_cond1'] == 2) 
                  {
                    echo "[ ";
                  }
                  else
                  {
                    echo "] ";
                  }
                  
                  echo $row['pilling_value1'];
                  echo " - ";
                  echo $row['pilling_value2'];

                  if ($row['pilling_cond2'] == 1) 
                  {
                    echo " )";
                  }
                  elseif ($row['pilling_cond2'] == 2) 
                  {
                    echo " ]";
                  }
                  else
                  {
                    echo " [";
                  }
                ?>
              </td>
              <td>
                <?php 
                  if ($row['ph_cond1'] == 1) 
                  {
                    echo "( ";
                  }
                  elseif ($row['ph_cond1'] == 2) 
                  {
                    echo "[ ";
                  }
                  else
                  {
                    echo "] ";
                  }
                  
                  echo $row['ph_value1'];
                  echo " - ";
                  echo $row['ph_value2'];

                  if ($row['ph_cond2'] == 1) 
                  {
                    echo " )";
                  }
                  elseif ($row['ph_cond2'] == 2) 
                  {
                    echo " ]";
                  }
                  else
                  {
                    echo " [";
                  }
                ?>
              </td>
              <td>
                <!-- <form action="gray_varibale_edit.php" method="post" style="display: inline-block;"> -->
                  <input type="hidden" id="pp_no" name="pp_no" value="<?php echo $row['pp_no']; ?>">
                  <input type="hidden" id="color" name="color" value="<?php echo $row['color']; ?>">
                  <input type="hidden" id="version" name="version" value="<?php echo $row['version']; ?>">
                  <input type="hidden" id="gray_width" name="gray_width" value="<?php echo $row['gray_width']; ?>">
                  <input type="hidden" id="pp_id_number" name="pp_id_number" value="<?php echo $pp_no_id; ?>">
                  <input type="hidden" id="pp_details_id" name="pp_details_id" value="<?php echo $pp_version; ?>">
                  <button type="submit" id="singe_standard_add_btn" name="singe_standard_add_btn" onclick="edit_for_bleaching_standard();" class="btn btn-primary btn-xs"> Edit </button>
                <!-- </form> --> 
              </td>
            </tr>
            <?php 
              ++$s1;
             }
            ?>
          </tbody> 
        </table>
      </div>
    </div>

  </div>
</div>
<!-- main content again finished -->
<?php
?>