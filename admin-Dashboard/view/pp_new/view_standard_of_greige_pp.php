


<!-- main content again -->
<div class="clearfix"></div>
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12" id="retrieve_edit_data" style="padding-bottom: 20px;">
    <div class="x_panel">
      <div class="x_title">
          <h2>Greige Receiving Standards</h2> 
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
              <th>Yarn Count Warp</th>
              <th>Yarn Count Weft</th>
              <th>Thread Count EPI</th>
              <th>Thread Count PPI</th>
              <th>GSM</th>
              <th>Greige Width (inch)</th>
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
                                  defining_gray_receiving_qc_standard.*

                             FROM 
                                process_program_info, version_wise_process_program_info,   defining_gray_receiving_qc_standard   
                             WHERE 
                                process_program_info.pp_id = '$pp_no_id'
                                AND process_program_info.pp_id = version_wise_process_program_info.pp_no_id
                                AND  defining_gray_receiving_qc_standard.pp_no_id = version_wise_process_program_info.pp_no_id
                                AND  defining_gray_receiving_qc_standard.pp_details_id = version_wise_process_program_info.pp_id
                                AND  defining_gray_receiving_qc_standard.active = '1'
                                AND  version_wise_process_program_info.active = '1'
                             ";



              $res_for_pp = mysqli_query($con, $sql_for_pp);

              $row1 = mysqli_fetch_assoc($res_for_pp);
            ?>
            <tr>
              <td><?php echo $s1; ?></td>
              <td>
                <?php 
                  if ($row1['yarn_warp_cond1'] == 1) 
                  {
                    echo "( ";
                  }
                  elseif ($row1['yarn_warp_cond1'] == 2) 
                  {
                    echo "[ ";
                  }
                  else
                  {
                    echo "] ";
                  }
                  
                  echo $row1['yarn_warp_value1'];
                  echo " - ";
                  echo $row1['yarn_warp_value2'];

                  if ($row1['yarn_warp_cond2'] == 1) 
                  {
                    echo " )";
                  }
                  elseif ($row1['yarn_warp_cond2'] == 2) 
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
                  if ($row1['yarn_weft_cond1'] == 1) 
                  {
                    echo "( ";
                  }
                  elseif ($row1['yarn_weft_cond1'] == 2) 
                  {
                    echo "[ ";
                  }
                  else
                  {
                    echo "] ";
                  }
                  
                  echo $row1['yarn_weft_value1'];
                  echo " - ";
                  echo $row1['yarn_weft_value2'];

                  if ($row1['yarn_weft_cond2'] == 1) 
                  {
                    echo " )";
                  }
                  elseif ($row1['yarn_weft_cond2'] == 2) 
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
                  if ($row1['thread_epi_cond1'] == 1) 
                  {
                    echo "( ";
                  }
                  elseif ($row1['thread_epi_cond1'] == 2) 
                  {
                    echo "[ ";
                  }
                  else
                  {
                    echo "] ";
                  }
                  
                  echo $row1['thread_epi_value1'];
                  echo " - ";
                  echo $row1['thread_epi_value2'];

                  if ($row1['thread_epi_cond2'] == 1) 
                  {
                    echo " )";
                  }
                  elseif ($row1['thread_epi_cond2'] == 2) 
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
                  if ($row1['thread_ppi_cond1'] == 1) 
                  {
                    echo "( ";
                  }
                  elseif ($row1['thread_ppi_cond1'] == 2) 
                  {
                    echo "[ ";
                  }
                  else
                  {
                    echo "] ";
                  }
                  
                  echo $row1['thread_ppi_value1'];
                  echo " - ";
                  echo $row1['thread_ppi_value2'];

                  if ($row1['thread_ppi_cond2'] == 1) 
                  {
                    echo " )";
                  }
                  elseif ($row1['thread_ppi_cond2'] == 2) 
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
                  if ($row1['gsm_warp_cond1'] == 1) 
                  {
                    echo "( ";
                  }
                  elseif ($row1['gsm_warp_cond1'] == 2) 
                  {
                    echo "[ ";
                  }
                  else
                  {
                    echo "] ";
                  }
                  
                  echo $row1['gsm_warp_value1'];
                  echo " - ";
                  echo $row1['gsm_warp_value2'];

                  if ($row1['gsm_warp_cond2'] == 1) 
                  {
                    echo " )";
                  }
                  elseif ($row1['gsm_warp_cond2'] == 2) 
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
                  if ($row1['greige_width_cond1'] == 1) 
                  {
                    echo "( ";
                  }
                  elseif ($row1['greige_width_cond1'] == 2) 
                  {
                    echo "[ ";
                  }
                  else
                  {
                    echo "] ";
                  }
                  
                  echo $row1['greige_width_value1'];
                  echo " - ";
                  echo $row1['greige_width_value2'];

                  if ($row1['greige_width_cond2'] == 1) 
                  {
                    echo " )";
                  }
                  elseif ($row1['greige_width_cond2'] == 2) 
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
          </tbody> 
        </table>
      </div>

      <div class="x_content">
        <table id="datatable-buttons" class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>SI</th>

              <th>Fiber Polyester</th>
              <th>Fiber Cotton</th>

              <th>Action</th>
            </tr>
          </thead>
          
          <tbody>
            <?php 
              $s1 = 1;
              $sql_for_pp = "
              $sql_for_pp = "SELECT 
                                process_program_info.pp_no,
                                process_program_info.pp_id,
                                version_wise_process_program_info.pp_id,
                                version_wise_process_program_info.pp_no_id,
                                version_wise_process_program_info.version,
                                version_wise_process_program_info.color,
                                version_wise_process_program_info.gray_width,
                                version_wise_process_program_info.quantity,
                                  defining_gray_receiving_qc_standard.*

                             FROM 
                                process_program_info, pp_details,   defining_gray_receiving_qc_standard   
                             WHERE 
                                process_program_info.pp_id = '$pp_no_id'
                                AND pp.pp_id = pp_details.pp_no_id
                                AND  defining_gray_receiving_qc_standard.pp_no_id = pp_details.pp_no_id
                                AND  defining_gray_receiving_qc_standard.pp_details_id = pp_details.pp_id
                                AND  defining_gray_receiving_qc_standard.active = '1'
                                AND pp_details.active = '1'
                             ";



              $res_for_pp = mysqli_query($con, $sql_for_pp);

              $row = mysqli_fetch_assoc($res_for_pp);
            ?>
            <tr>
              <td><?php echo $s1; ?></td>

              <td>
                <?php 
                  
                  echo $row['fiber_total_polyester_value1'];
                  echo "%";
                ?>
              </td>

              <td>
                <?php 
                  
                  echo $row['fiber_total_cotton_value1'];
                  echo "%";
                ?>
              </td>

              

              <td>
                <!-- <form action="gray_varibale_edit.php" method="post" style="display: inline-block;"> -->
                  <input type="hidden" id="pp_no" name="pp_no" value="<?php echo $row['pp_no']; ?>">
                  <input type="hidden" id="color" name="color" value="<?php echo $row['color']; ?>">
                  <input type="hidden" id="version" name="version" value="<?php echo $row['version']; ?>">
                  <input type="hidden" id="gray_width" name="gray_width" value="<?php echo $row['gray_width']; ?>">
                  <input type="hidden" id="pp_id_number" name="pp_id_number" value="<?php echo $pp_no_id; ?>">
                  <button type="submit" id="gray_issue_add_btn" name="gray_issue_add_btn" onclick="edit_for_gray_standard();" class="btn btn-primary btn-xs"> Edit </button>
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