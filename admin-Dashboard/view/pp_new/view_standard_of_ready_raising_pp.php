


<!-- main content again -->
<div class="clearfix"></div>
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12" id="retrieve_edit_data" style="padding-bottom: 20px;">
    <div class="x_panel">
      <div class="x_title">
          <h2>PP Number : <span style="color:red;"> <?php echo $row['pp_no']; ?> </span> -Ready for Raising Standards</h2> 
          <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>
          </ul>                 
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <table id="datatable-buttons" class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>SI</th>
              <th>Version</th>
              <th>Color</th>
              <th>Greige Width(inch)</th>
              <th>tensile warp</th>
              <th>tensile weft</th>
              <th>tear warp</th>
              <th>tear weft</th>
              
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
                                defining_ready_for_raising_qc_standard.*

                             FROM 
                                process_program_info, version_wise_process_program_info, defining_ready_for_raising_qc_standard   
                             WHERE 
                                process_program_info.pp_id = '$pp_no_id'
                                AND process_program_info.pp_id = version_wise_process_program_info.pp_no_id
                                AND defining_ready_for_raising_qc_standard.pp_no_id = version_wise_process_program_info.pp_no_id
                                AND defining_ready_for_raising_qc_standard.pp_details_id = version_wise_process_program_info.pp_id
                                AND defining_ready_for_raising_qc_standard.active = '1'
                                AND version_wise_process_program_info.active = '1'
                             ";



              $res_for_pp = mysqli_query($con, $sql_for_pp);

              $row = mysqli_fetch_assoc($res_for_pp);
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
              <td><?php echo $row['gray_width']; ?></td>

              <td>
                <?php 
                  if ($row['tensile_warp_cond1'] == 1) 
                  {
                    echo "( ";
                  }
                  elseif ($row['tensile_warp_cond1'] == 2) 
                  {
                    echo "[ ";
                  }
                  else
                  {
                    echo "] ";
                  }
                  
                  echo $row['tensile_warp_value1'];
                  echo " - ";
                  echo $row['tensile_warp_value2'];

                  if ($row['tensile_warp_cond2'] == 1) 
                  {
                    echo " )";
                  }
                  elseif ($row['tensile_warp_cond2'] == 2) 
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
                  if ($row['tensile_weft_cond1'] == 1) 
                  {
                    echo "( ";
                  }
                  elseif ($row['tensile_weft_cond1'] == 2) 
                  {
                    echo "[ ";
                  }
                  else
                  {
                    echo "] ";
                  }
                  
                  echo $row['tensile_weft_value1'];
                  echo " - ";
                  echo $row['tensile_weft_value2'];

                  if ($row['tensile_weft_cond2'] == 1) 
                  {
                    echo " )";
                  }
                  elseif ($row['tensile_weft_cond2'] == 2) 
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
                  if ($row['tear_force_warp_cond1'] == 1) 
                  {
                    echo "( ";
                  }
                  elseif ($row['tear_force_warp_cond1'] == 2) 
                  {
                    echo "[ ";
                  }
                  else
                  {
                    echo "] ";
                  }
                  
                  echo $row['tear_force_warp_value1'];
                  echo " - ";
                  echo $row['tear_force_warp_value2'];

                  if ($row['tear_force_warp_cond2'] == 1) 
                  {
                    echo " )";
                  }
                  elseif ($row['tear_force_warp_cond2'] == 2) 
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
                  if ($row['tear_force_weft_cond1'] == 1) 
                  {
                    echo "( ";
                  }
                  elseif ($row['tear_force_weft_cond1'] == 2) 
                  {
                    echo "[ ";
                  }
                  else
                  {
                    echo "] ";
                  }
                  
                  echo $row['tear_force_weft_value1'];
                  echo " - ";
                  echo $row['tear_force_weft_value2'];

                  if ($row['tear_force_weft_cond2'] == 1) 
                  {
                    echo " )";
                  }
                  elseif ($row['tear_force_weft_cond2'] == 2) 
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
                  <button type="submit" id="gray_issue_add_btn" name="gray_issue_add_btn" onclick="edit_for_ready_for_raising_standard();" class="btn btn-primary btn-xs"> Edit </button>
                <!-- </form> -->
              </td>
            </tr>
          </tbody> 
        </table>
      </div>

    </div>
  </div>
</div>
<!-- main content again finished -->
<?php
?>