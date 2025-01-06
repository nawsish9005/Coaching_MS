


<!-- main content again -->
<div class="clearfix"></div>
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12" id="retrieve_edit_data" style="padding-bottom: 20px;">
    <div class="x_panel">
      <div class="x_title">
          <h2>PP Number : <span style="color:red;"> <?php echo $row['pp_no']; ?> </span> - Washing Standards</h2> 
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
              <th>Color Fastness to Rubbing Dry</th>
              <th>Color Fastness to Rubbing Wet</th>
              <th>Color Fastness to Dry Cleaning Color Change</th>
              <th>Color Fastness to Dry Cleaning Staining</th>
              <th>Color Fastness to Washing Color Change</th>
              <th>Color Fastness to Washing Staining</th>
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
                                defining_washing_qc_standard.*

                             FROM 
                                process_program_info, version_wise_process_program_info, defining_washing_qc_standard   
                             WHERE 
                                process_program_info.pp_id = '$pp_no_id'
                                AND process_program_info.pp_id = version_wise_process_program_info.pp_no_id
                                AND version_wise_process_program_info.pp_id = '$pp_version'
                                AND defining_washing_qc_standard.pp_no_id = version_wise_process_program_info.pp_no_id
                                AND defining_washing_qc_standard.pp_details_id = version_wise_process_program_info.pp_id
                                AND defining_washing_qc_standard.active = '1'
                                AND version_wise_process_program_info.active = '1'
                             ";



              $res_for_pp = mysqli_query($con, $sql_for_pp);

              while ($row1 = mysqli_fetch_assoc($res_for_pp)) 
              {
            ?>
            <tr>
              <td><?php echo $s1; ?></td>
              <td><?php echo $row1['version'] ?></td>
              <td>
                <?php 
                  $color_id = $row1['color'];
                  $sql_for_color = "SELECT color_name FROM color WHERE color_id = '$color_id'";
                  $res_for_color = mysqli_query($con, $sql_for_color);
                  $row_for_color = mysqli_fetch_assoc($res_for_color);
                  echo $row_for_color['color_name'];
                ?>
              </td>
              <td><?php echo $row1['gray_width']; ?></td>
              <td>
                <?php 
                  if ($row1['cf_rubbing_dry_cond1'] == 1) 
                  {
                    echo "( ";
                  }
                  elseif ($row1['cf_rubbing_dry_cond1'] == 2) 
                  {
                    echo "[ ";
                  }
                  else
                  {
                    echo "] ";
                  }
                  
                  echo $row1['cf_rubbing_dry_value1'];
                  echo " - ";
                  echo $row1['cf_rubbing_dry_value2'];

                  if ($row1['cf_rubbing_dry_cond2'] == 1) 
                  {
                    echo " )";
                  }
                  elseif ($row1['cf_rubbing_dry_cond2'] == 2) 
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
                  if ($row1['cf_rubbing_wet_cond1'] == 1) 
                  {
                    echo "( ";
                  }
                  elseif ($row1['cf_rubbing_wet_cond1'] == 2) 
                  {
                    echo "[ ";
                  }
                  else
                  {
                    echo "] ";
                  }
                  
                  echo $row1['cf_rubbing_wet_value1'];
                  echo " - ";
                  echo $row1['cf_rubbing_wet_value2'];

                  if ($row1['cf_rubbing_wet_cond2'] == 1) 
                  {
                    echo " )";
                  }
                  elseif ($row1['cf_rubbing_wet_cond2'] == 2) 
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
                  if ($row1['cf_dry_cleaning_c_change_cond1'] == 1) 
                  {
                    echo "( ";
                  }
                  elseif ($row1['cf_dry_cleaning_c_change_cond1'] == 2) 
                  {
                    echo "[ ";
                  }
                  else
                  {
                    echo "] ";
                  }
                  
                  echo $row1['cf_dry_cleaning_c_change_value1'];
                  echo " - ";
                  echo $row1['cf_dry_cleaning_c_change_value2'];

                  if ($row1['cf_dry_cleaning_c_change_cond2'] == 1) 
                  {
                    echo " )";
                  }
                  elseif ($row1['cf_dry_cleaning_c_change_cond2'] == 2) 
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
                  if ($row1['cf_dry_cleaning_staining_cond1'] == 1) 
                  {
                    echo "( ";
                  }
                  elseif ($row1['cf_dry_cleaning_staining_cond1'] == 2) 
                  {
                    echo "[ ";
                  }
                  else
                  {
                    echo "] ";
                  }
                  
                  echo $row1['cf_dry_cleaning_staining_value1'];
                  echo " - ";
                  echo $row1['cf_dry_cleaning_staining_value2'];

                  if ($row1['cf_dry_cleaning_staining_cond2'] == 1) 
                  {
                    echo " )";
                  }
                  elseif ($row1['cf_dry_cleaning_staining_cond2'] == 2) 
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
                  if ($row1['cf_washing_c_change_cond1'] == 1) 
                  {
                    echo "( ";
                  }
                  elseif ($row1['cf_washing_c_change_cond1'] == 2) 
                  {
                    echo "[ ";
                  }
                  else
                  {
                    echo "] ";
                  }
                  
                  echo $row1['cf_washing_c_change_value1'];
                  echo " - ";
                  echo $row1['cf_washing_c_change_value2'];

                  if ($row1['cf_washing_c_change_cond2'] == 1) 
                  {
                    echo " )";
                  }
                  elseif ($row1['cf_washing_c_change_cond2'] == 2) 
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
                  if ($row1['cf_washing_staining_cond1'] == 1) 
                  {
                    echo "( ";
                  }
                  elseif ($row1['cf_washing_staining_cond1'] == 2) 
                  {
                    echo "[ ";
                  }
                  else
                  {
                    echo "] ";
                  }
                  
                  echo $row1['cf_washing_staining_value1'];
                  echo " - ";
                  echo $row1['cf_washing_staining_value2'];

                  if ($row1['cf_washing_staining_cond2'] == 1) 
                  {
                    echo " )";
                  }
                  elseif ($row1['cf_washing_staining_cond2'] == 2) 
                  {
                    echo " ]";
                  }
                  else
                  {
                    echo " [";
                  }
                ?>
              </td>
            </tr>
            <?php 
              ++$s1;
             }
            ?>
          </tbody> 
        </table>
      </div>

      <div class="x_content">
        <table id="datatable-buttons" class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>SI</th>
              <th>Color Fastness to Water Color Change</th>
              <th>Color Fastness to Water Staining</th>
              <th>Color Fastness to Water Sotting Staining</th>
              <th>Color Fastness to Hydrolysis of Reactive Dyes Color Change</th>
              <th>Color Fastness to Hydrolysis of Reactive Dyes Staining</th>
              <th>Color Fastness to Oidative Bleach Damage Color Change</th>
              <th>Color Fastness to PVC Migration Staining</th>
              <th>Color Fastness to Saliva Color Change</th>
              <th>Color Fastness to Saliva Staining</th>
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
                                defining_washing_qc_standard.*

                             FROM 
                                process_program_info, version_wise_process_program_info, defining_washing_qc_standard   
                             WHERE 
                                process_program_info.pp_id = '$pp_no_id'
                                AND process_program_info.pp_id = version_wise_process_program_info.pp_no_id
                                AND version_wise_process_program_info.pp_id = '$pp_version'
                                AND defining_washing_qc_standard.pp_no_id = version_wise_process_program_info.pp_no_id
                                AND defining_washing_qc_standard.pp_details_id = version_wise_process_program_info.pp_id
                                AND defining_washing_qc_standard.active = '1'
                                AND version_wise_process_program_info.active = '1'
                             ";



              $res_for_pp = mysqli_query($con, $sql_for_pp);

              while ($row = mysqli_fetch_assoc($res_for_pp)) 
              {
            ?>
            <tr>
              <td><?php echo $s1; ?></td>
              <td>
                <?php 
                  if ($row['cf_water_c_change_cond1'] == 1) 
                  {
                    echo "( ";
                  }
                  elseif ($row['cf_water_c_change_cond1'] == 2) 
                  {
                    echo "[ ";
                  }
                  else
                  {
                    echo "] ";
                  }
                  
                  echo $row['cf_water_c_change_value1'];
                  echo " - ";
                  echo $row['cf_water_c_change_value1'];

                  if ($row['cf_water_c_change_cond2'] == 1) 
                  {
                    echo " )";
                  }
                  elseif ($row['cf_water_c_change_cond2'] == 2) 
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
                  if ($row['cf_water_staining_cond1'] == 1) 
                  {
                    echo "( ";
                  }
                  elseif ($row['cf_water_staining_cond1'] == 2) 
                  {
                    echo "[ ";
                  }
                  else
                  {
                    echo "] ";
                  }
                  
                  echo $row['cf_water_staining_value1'];
                  echo " - ";
                  echo $row['cf_water_staining_value1'];

                  if ($row['cf_water_staining_cond2'] == 1) 
                  {
                    echo " )";
                  }
                  elseif ($row['cf_water_staining_cond2'] == 2) 
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
                  if ($row['cf_water_sotting_staining_cond1'] == 1) 
                  {
                    echo "( ";
                  }
                  elseif ($row['cf_water_sotting_staining_cond1'] == 2) 
                  {
                    echo "[ ";
                  }
                  else
                  {
                    echo "] ";
                  }
                  
                  echo $row['cf_water_sotting_staining_value1'];
                  echo " - ";
                  echo $row['cf_water_sotting_staining_value1'];

                  if ($row['cf_water_sotting_staining_cond2'] == 1) 
                  {
                    echo " )";
                  }
                  elseif ($row['cf_water_sotting_staining_cond2'] == 2) 
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
                  if ($row['cf_hyd_reactive_dyes_c_change_cond1'] == 1) 
                  {
                    echo "( ";
                  }
                  elseif ($row['cf_hyd_reactive_dyes_c_change_cond1'] == 2) 
                  {
                    echo "[ ";
                  }
                  else
                  {
                    echo "] ";
                  }
                  
                  echo $row['cf_hyd_reactive_dyes_c_change_value1'];
                  echo " - ";
                  echo $row['cf_hyd_reactive_dyes_c_change_value1'];

                  if ($row['cf_hyd_reactive_dyes_c_change_cond2'] == 1) 
                  {
                    echo " )";
                  }
                  elseif ($row['cf_hyd_reactive_dyes_c_change_cond2'] == 2) 
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
                  if ($row['cf_hyd_reactive_dyes_staining_cond1'] == 1) 
                  {
                    echo "( ";
                  }
                  elseif ($row['cf_hyd_reactive_dyes_staining_cond1'] == 2) 
                  {
                    echo "[ ";
                  }
                  else
                  {
                    echo "] ";
                  }
                  
                  echo $row['cf_hyd_reactive_dyes_staining_value1'];
                  echo " - ";
                  echo $row['cf_hyd_reactive_dyes_staining_value1'];

                  if ($row['cf_hyd_reactive_dyes_staining_cond2'] == 1) 
                  {
                    echo " )";
                  }
                  elseif ($row['cf_hyd_reactive_dyes_staining_cond2'] == 2) 
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
                  if ($row['cf_oidative_damage_c_change_cond1'] == 1) 
                  {
                    echo "( ";
                  }
                  elseif ($row['cf_oidative_damage_c_change_cond1'] == 2) 
                  {
                    echo "[ ";
                  }
                  else
                  {
                    echo "] ";
                  }
                  
                  echo $row['cf_oidative_damage_c_change_value1'];
                  echo " - ";
                  echo $row['cf_oidative_damage_c_change_value1'];

                  if ($row['cf_oidative_damage_c_change_cond2'] == 1) 
                  {
                    echo " )";
                  }
                  elseif ($row['cf_oidative_damage_c_change_cond2'] == 2) 
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
                  if ($row['cf_pvc_migration_staining_cond1'] == 1) 
                  {
                    echo "( ";
                  }
                  elseif ($row['cf_pvc_migration_staining_cond1'] == 2) 
                  {
                    echo "[ ";
                  }
                  else
                  {
                    echo "] ";
                  }
                  
                  echo $row['cf_pvc_migration_staining_value1'];
                  echo " - ";
                  echo $row['cf_pvc_migration_staining_value1'];

                  if ($row['cf_pvc_migration_staining_cond2'] == 1) 
                  {
                    echo " )";
                  }
                  elseif ($row['cf_pvc_migration_staining_cond1'] == 2) 
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
                  if ($row['cf_saliva_c_change_cond1'] == 1) 
                  {
                    echo "( ";
                  }
                  elseif ($row['cf_saliva_c_change_cond1'] == 2) 
                  {
                    echo "[ ";
                  }
                  else
                  {
                    echo "] ";
                  }
                  
                  echo $row[' cf_saliva_c_change_value1'];
                  echo " - ";
                  echo $row[' cf_saliva_c_change_value1'];

                  if ($row['cf_saliva_c_change_cond2'] == 1) 
                  {
                    echo " )";
                  }
                  elseif ($row['cf_saliva_c_change_cond2'] == 2) 
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
                  if ($row['cf_saliva_staining_cond1'] == 1) 
                  {
                    echo "( ";
                  }
                  elseif ($row['cf_saliva_staining_cond1'] == 2) 
                  {
                    echo "[ ";
                  }
                  else
                  {
                    echo "] ";
                  }
                  
                  echo $row[' cf_saliva_staining_value1'];
                  echo " - ";
                  echo $row[' cf_saliva_staining_value1'];

                  if ($row['cf_saliva_staining_cond2'] == 1) 
                  {
                    echo " )";
                  }
                  elseif ($row['cf_saliva_staining_cond2'] == 2) 
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
                  <input type="hidden" id="process" name="process" value="<?php echo $process; ?>">
                  <input type="hidden" id="pp_details_id" name="pp_details_id" value="<?php echo $pp_version; ?>">
                  <button type="submit" id="gray_issue_add_btn" name="gray_issue_add_btn" onclick="edit_for_washing_standard();" class="btn btn-primary btn-xs"> Edit </button>
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