


<!-- main content again -->
<div class="clearfix"></div>
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12" id="retrieve_edit_data" style="padding-bottom: 20px;">
    <div class="x_panel">
      <div class="x_title">
          <h2>PP Number : <span style="color:red;"> <?php echo $row['pp_no']; ?> </span> - Raising Standards</h2> 
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
                                pp.pp_no,
                                pp.pp_id,
                                pp_details.pp_id,
                                pp_details.pp_no_id,
                                pp_details.version,
                                pp_details.color,
                                pp_details.gray_width,
                                pp_details.quantity,
                                raising_standard.*

                             FROM 
                                pp, pp_details, raising_standard   
                             WHERE 
                                pp.pp_id = '$pp_no_id'
                                AND pp.pp_id = pp_details.pp_no_id
                                AND pp_details.pp_id = '$pp_version'
                                AND raising_standard.pp_no_id = pp_details.pp_no_id
                                AND raising_standard.pp_details_id = pp_details.pp_id
                                AND raising_standard.active = '1'
                                AND pp_details.active = '1'
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
                  <input type="hidden" id="process" name="process" value="<?php echo $process; ?>">
                  <input type="hidden" id="pp_details_id" name="pp_details_id" value="<?php echo $pp_version; ?>">
                  <button type="submit" id="gray_issue_add_btn" name="gray_issue_add_btn" onclick="edit_for_raising_standard(<?php echo $pp_version ?>);" class="btn btn-primary btn-xs"> Edit </button>
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