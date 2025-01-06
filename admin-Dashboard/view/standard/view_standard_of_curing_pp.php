<?php  
?>
<!-- main content again -->
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12" id="retrieve_edit_data" style="padding-bottom: 20px;">

    <div class="x_panel">
      <div class="x_title">
        <h2>PP Number : <span style="color:red;"> <?php echo $row['pp_no']; ?> </span> - Curing Standards</h2>                  <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <table id="datatable-buttons" class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>SI</th>
              <th>Rubbing Dry</th>
              <th>Rubbing Wet</th>
              <th>Yarn Count Warp</th>
              <th>Yarn Count Weft</th>
              <th>Thread Count EPI</th>
              <th>Thread Count PPI</th>
              <th>GSM</th>
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
                                curing_standard.*

                             FROM 
                                pp, pp_details, curing_standard   
                             WHERE 
                                pp.pp_id = '$pp_no_id'
                                AND pp.pp_id = pp_details.pp_no_id
                                AND curing_standard.pp_no_id = pp_details.pp_no_id
                                AND curing_standard.pp_details_id = pp_details.pp_id
                                AND curing_standard.active = '1'
                                AND pp_details.active = '1'
                             ";



              $res_for_pp = mysqli_query($con, $sql_for_pp);

              $row = mysqli_fetch_assoc($res_for_pp);
            ?>
            <tr>
              <td><?php echo $s1; ?></td>
              <td>
                <?php 
                  if ($row['rubbing_dry_cond1'] == 1) 
                  {
                    echo "( ";
                  }
                  elseif ($row['rubbing_dry_cond1'] == 2) 
                  {
                    echo "[ ";
                  }
                  else
                  {
                    echo "] ";
                  }
                  
                  echo $row['rubbing_dry_value1'];
                  echo " - ";
                  echo $row['rubbing_dry_value2'];

                  if ($row['rubbing_dry_cond2'] == 1) 
                  {
                    echo " )";
                  }
                  elseif ($row['rubbing_dry_cond2'] == 2) 
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
                  if ($row['rubbing_wet_cond1'] == 1) 
                  {
                    echo "( ";
                  }
                  elseif ($row['rubbing_wet_cond1'] == 2) 
                  {
                    echo "[ ";
                  }
                  else
                  {
                    echo "] ";
                  }
                  
                  echo $row['rubbing_wet_value1'];
                  echo " - ";
                  echo $row['rubbing_wet_value2'];

                  if ($row['rubbing_wet_cond2'] == 1) 
                  {
                    echo " )";
                  }
                  elseif ($row['rubbing_wet_cond2'] == 2) 
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
                  if ($row['yarn_warp_cond1'] == 1) 
                  {
                    echo "( ";
                  }
                  elseif ($row['yarn_warp_cond1'] == 2) 
                  {
                    echo "[ ";
                  }
                  else
                  {
                    echo "] ";
                  }
                  
                  echo $row['yarn_warp_value1'];
                  echo " - ";
                  echo $row['yarn_warp_value2'];

                  if ($row['yarn_warp_cond2'] == 1) 
                  {
                    echo " )";
                  }
                  elseif ($row['yarn_warp_cond2'] == 2) 
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
                  if ($row['yarn_weft_cond1'] == 1) 
                  {
                    echo "( ";
                  }
                  elseif ($row['yarn_weft_cond1'] == 2) 
                  {
                    echo "[ ";
                  }
                  else
                  {
                    echo "] ";
                  }
                  
                  echo $row['yarn_weft_value1'];
                  echo " - ";
                  echo $row['yarn_weft_value2'];

                  if ($row['yarn_weft_cond2'] == 1) 
                  {
                    echo " )";
                  }
                  elseif ($row['yarn_weft_cond2'] == 2) 
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
                  if ($row['thread_epi_cond1'] == 1) 
                  {
                    echo "( ";
                  }
                  elseif ($row['thread_epi_cond1'] == 2) 
                  {
                    echo "[ ";
                  }
                  else
                  {
                    echo "] ";
                  }
                  
                  echo $row['thread_epi_value1'];
                  echo " - ";
                  echo $row['thread_epi_value2'];

                  if ($row['thread_epi_cond2'] == 1) 
                  {
                    echo " )";
                  }
                  elseif ($row['thread_epi_cond2'] == 2) 
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
                  if ($row['thread_ppi_cond1'] == 1) 
                  {
                    echo "( ";
                  }
                  elseif ($row['thread_ppi_cond1'] == 2) 
                  {
                    echo "[ ";
                  }
                  else
                  {
                    echo "] ";
                  }
                  
                  echo $row['thread_ppi_value1'];
                  echo " - ";
                  echo $row['thread_ppi_value2'];

                  if ($row['thread_ppi_cond2'] == 1) 
                  {
                    echo " )";
                  }
                  elseif ($row['thread_ppi_cond2'] == 2) 
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
                  if ($row['gsm_warp_cond1'] == 1) 
                  {
                    echo "( ";
                  }
                  elseif ($row['gsm_warp_cond1'] == 2) 
                  {
                    echo "[ ";
                  }
                  else
                  {
                    echo "] ";
                  }
                  
                  echo $row['gsm_warp_value1'];
                  echo " - ";
                  echo $row['gsm_warp_value2'];

                  if ($row['gsm_warp_cond2'] == 1) 
                  {
                    echo " )";
                  }
                  elseif ($row['gsm_warp_cond2'] == 2) 
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
                  <button type="submit" id="curing_standard_add_btn" name="curing_standard_add_btn" onclick="edit_for_curing_standard();" class="btn btn-primary btn-xs"> Edit </button>
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