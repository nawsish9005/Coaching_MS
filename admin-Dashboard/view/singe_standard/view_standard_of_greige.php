<?php
?>
<div class="x_panel">
  <div class="x_title">
    <h2>PP Number : <span style="color:red;"> <?php echo $row['pp_no']; ?> </span> - Greige Standards</h2>                  <div class="clearfix"></div>
  </div>
  <div class="x_content">
    <table id="datatable-buttons" class="table table-striped table-bordered">
      <thead>
        <tr>
          <th>SI</th>
          <th>Version</th>
          <th>Color</th>
          <th>Gray Width</th>
          <th>Yarn Count Warp</th>
          <th>Yarn Count Weft</th>
          <th>Thread Count EPI</th>
          <th>Thread Count PPI</th>
          <th>GSM</th>
          <th>Fiber Content Warp</th>
          <th>Fiber Content Weft</th>
          <th>Action</th>
        </tr>
      </thead>
      
      <tbody>
        <?php 
          $s1 = 1;
          $sql_for_pp = "SELECT 
                            pp.pp_no,
                            pp.pp_id,
                            pp_details.id,
                            pp_details.pp_no_id,
                            pp_details.version,
                            pp_details.color,
                            pp_details.gray_width,
                            pp_details.quantity,
                            gray_variable.*

                         FROM 
                            pp, pp_details, gray_variable   
                         WHERE 
                            pp.pp_id = '$pp_no_id'
                            AND pp.pp_id = pp_details.pp_no_id
                            AND pp_details.id = '$pp_version'
                            AND gray_variable.pp_no_id = pp_details.pp_no_id
                            AND gray_variable.pp_details_id = pp_details.id
                            AND gray_variable.active = '1'
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
            <?php 
              if ($row['fiber_warp_cond1'] == 1) 
              {
                echo "( ";
              }
              elseif ($row['fiber_warp_cond1'] == 2) 
              {
                echo "[ ";
              }
              else
              {
                echo "] ";
              }
              
              echo $row['fiber_warp_value1'];
              echo " - ";
              echo $row['fiber_warp_value2'];

              if ($row['fiber_warp_cond2'] == 1) 
              {
                echo " )";
              }
              elseif ($row['fiber_warp_cond2'] == 2) 
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
              if ($row['fiber_weft_cond1'] == 1) 
              {
                echo "( ";
              }
              elseif ($row['fiber_weft_cond1'] == 2) 
              {
                echo "[ ";
              }
              else
              {
                echo "] ";
              }
              
              echo $row['fiber_weft_value1'];
              echo " - ";
              echo $row['fiber_weft_value2'];

              if ($row['fiber_weft_cond2'] == 1) 
              {
                echo " )";
              }
              elseif ($row['fiber_weft_cond2'] == 2) 
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
              <button type="submit" id="gray_issue_add_btn" name="gray_issue_add_btn" onclick="edit_for_gray_standard();" class="btn btn-primary btn-xs"> Edit </button>
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
<?php
?>