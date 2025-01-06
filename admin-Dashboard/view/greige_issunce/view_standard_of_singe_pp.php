<?php  
?>
<!-- main content again -->
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12" id="retrieve_edit_data" style="padding-bottom: 20px;">

    <div class="x_panel">
      <div class="x_title">
        <h2>PP Number : <span style="color:red;"> <?php echo $row['pp_no']; ?> </span> - Singe & Desize Standards</h2>                  <div class="clearfix"></div>
        
      </div>
      <div class="x_content">
        <table id="datatable-buttons" class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>SI</th>
              <th>Flame Intensity (mbar)</th>
              <th>Speed ((Max / Min))</th>
              <th>Bath Temp.(C°)</th>
              <th>Bath pH</th>
              <th>Action</th>
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
                                singe_standard.*

                             FROM 
                                pp, pp_details, singe_standard   
                             WHERE 
                                pp.pp_id = '$pp_no_id'
                                AND pp.pp_id = pp_details.pp_no_id
                                AND singe_standard.pp_no_id = pp_details.pp_no_id
                                AND singe_standard.pp_details_id = pp_details.pp_id
                                AND singe_standard.active = '1'
                                AND pp_details.active = '1'
                             ";



              $res_for_pp = mysqli_query($con, $sql_for_pp);

              $row = mysqli_fetch_assoc($res_for_pp);
            ?>
            <tr>
              <td><?php echo $s1; ?></td>
              <td>
                <?php 
                  if ($row['intensity_cond1'] == 1) 
                  {
                    echo "( ";
                  }
                  elseif ($row['intensity_cond1'] == 2) 
                  {
                    echo "[ ";
                  }
                  else
                  {
                    echo "] ";
                  }
                  
                  echo $row['intensity_value1'];
                  echo " - ";
                  echo $row['intensity_value2'];

                  if ($row['intensity_cond2'] == 1) 
                  {
                    echo " )";
                  }
                  elseif ($row['intensity_cond2'] == 2) 
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
                  if ($row['speed_cond1'] == 1) 
                  {
                    echo "( ";
                  }
                  elseif ($row['speed_cond1'] == 2) 
                  {
                    echo "[ ";
                  }
                  else
                  {
                    echo "] ";
                  }
                  
                  echo $row['speed_value1'];
                  echo " - ";
                  echo $row['speed_value2'];

                  if ($row['speed_cond2'] == 1) 
                  {
                    echo " )";
                  }
                  elseif ($row['speed_cond2'] == 2) 
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
                  if ($row['temp_cond1'] == 1) 
                  {
                    echo "( ";
                  }
                  elseif ($row['temp_cond1'] == 2) 
                  {
                    echo "[ ";
                  }
                  else
                  {
                    echo "] ";
                  }
                  
                  echo $row['temp_value1'];
                  echo " - ";
                  echo $row['temp_value2'];

                  if ($row['temp_cond2'] == 1) 
                  {
                    echo " )";
                  }
                  elseif ($row['temp_cond2'] == 2) 
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
                  <button type="submit" id="singe_standard_add_btn" name="singe_standard_add_btn" onclick="edit_for_singe_standard();" class="btn btn-primary btn-xs"> Edit </button>
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