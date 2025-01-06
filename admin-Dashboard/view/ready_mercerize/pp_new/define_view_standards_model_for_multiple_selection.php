<?php
session_start();
require_once("../includes/db_session_chk.php");

$pp_version_standard = $_POST['pp_version_standard'];

$customers_id = $_POST['customers_model'];
$design_id = $_POST['design_id'];
$version_id = $_POST['version_id'];

$copy_for_this_pp_id = $_POST['copy_for_this_pp_id'];
$selection_of_multiple_pp_version_for_copy = $_POST['selection_of_multiple_pp_version_for_copy'];


if (isset($copy_for_this_pp_id)) 
{
    $pp_version_for_this = $copy_for_this_pp_id;
}

if ($customers_id == "" || is_null($customers_id) || empty($customers_id) || 
    $design_id == "" || is_null($design_id) || empty($design_id) || 
    $version_id == "" || is_null($version_id) || empty($version_id)) 
{
    echo "No data found";
}
else
{
    $sql_for_pp = "SELECT pp.*
                     FROM pp
                    WHERE pp.customers = '$customers_id' AND pp.design = '$design_id' ";

    $res_for_pp = mysqli_query($con, $sql_for_pp);
    $row_check = mysqli_num_rows($res_for_pp);

    if ($row_check >= 1)
    {
        $row = mysqli_fetch_array($res_for_pp);
    ?>
        <div class="x_panel">
          <div class="x_title">
            <h2>PP Number : <span style="color:red;"><?php echo $row['pp_no']; ?></span> - (Basic Information) </h2>

            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <table class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>SI</th>
                  <th>PP Number</th>
                  <th>Issue Date</th>
                  <th>Customer</th>
                  <th>Construction</th>
                  <th>Week</th>
                  <th>Greige Demand</th>
                  <th>Received Quantity</th>
                </tr>
              </thead>
              
              <tbody>
                <tr>
                  <td>1</td>
                  <td><?php echo $row['pp_no'] ?></td>
                  <td><?php echo $row['issue_date'] ?></td>
                  <td>
                    <?php 
                      $customer_id = $row['customers'];
                      $sql_for_customer = "SELECT customers_name FROM customers WHERE customers_id = '$customer_id'";
                      $res_for_customer = mysqli_query($con, $sql_for_customer);
                      $row_for_customer = mysqli_fetch_assoc($res_for_customer);
                      echo $row_for_customer['customers_name'];
                    ?>
                  </td>
                  <td><?php echo $row['construction'] ?></td>
                  <td><?php echo $row['week'] ?></td>
                  <td><?php echo $row['greige_demand'] ?></td>
                  <td>
                    <?php 
                      $sql_for_total_quantity = "SELECT SUM(quantity) AS total_quantity FROM pp_details WHERE pp_no_id = '$pp_no_id' AND active = '1' ";
                      $res_for_total_quantity = mysqli_query($con, $sql_for_total_quantity);
                      $row_for_total_quantity = mysqli_fetch_assoc($res_for_total_quantity);
                      echo $row_for_total_quantity['total_quantity'];
                    ?>
                  </td>                       
                </tr>
              </tbody>
            </table>
          </div>
        </div>

        <?php 
            //check which standard you use
            if ($pp_version_standard == '1') 
            {
                ?>
                    <!-- for pp details -->
                    <div class="x_panel">
                      <div class="x_content">
                        <table class="table table-striped table-bordered">
                          <thead>
                            <tr>
                              <th>SI</th>
                              <th>PP Version</th>
                              <th>Color</th>
                              <th>Gray Width</th>
                              <th>Finish Width</th>
                              <th>Order Quantity</th>
                              <th>Yarn Count Warp</th>
                              <th>Yarn Count Weft</th>
                              <th>Thread Count EPI</th>
                              <th>Thread Count PPI</th>
                              <th>GSM</th>
                              <!-- <th>Fiber Content Warp</th>
                              <th>Fiber Content Weft</th> -->
                              <th>Action</th>
                            </tr>
                          </thead>
                          <?php 

                              $sql_version_select = "SELECT * FROM pp_details
                                        WHERE version = '$version_id';"; 
                              $res_version_select = mysqli_query($con, $sql_version_select);
                              $row_version_select = mysqli_fetch_assoc($res_version_select);
                              $pp_version_name = $row_version_select['version'];
                              $sql = "SELECT * FROM pp_details
                                        WHERE version LIKE '$pp_version_name' AND active = '1' ";
                              $res = mysqli_query($con, $sql);
                              $sl = 1;
                              while($row_for_pp_details = mysqli_fetch_array($res))
                              {
                                  ?>
                                      <tbody>
                                        <tr>
                                          <td><?php echo $sl ?></td>
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
                                          <?php 
                                              $pp_no_id = $row_for_pp_details['pp_no_id'];
                                              $pp_details_id = $row_for_pp_details['pp_id'];
                                              $sql_model_gray_variable = "SELECT * FROM gray_variable
                                                        WHERE pp_no_id = '$pp_no_id' AND pp_details_id = '$pp_details_id' AND active = '1' ";
                                              $res_model_gray_variable = mysqli_query($con, $sql_model_gray_variable);
                                              $row_model_gray_variable = mysqli_fetch_assoc($res_model_gray_variable);
                                          ?>
                                          <td>
                                            <?php 
                                                if($row_model_gray_variable['yarn_warp_value1'] != '')
                                                {
                                                    if ($row_model_gray_variable['yarn_warp_cond1'] == 1) 
                                                    {
                                                      echo "( ";
                                                    }
                                                    elseif ($row_model_gray_variable['yarn_warp_cond1'] == 2) 
                                                    {
                                                      echo "[ ";
                                                    }
                                                    else
                                                    {
                                                      echo "] ";
                                                    }
                                                    
                                                    echo $row_model_gray_variable['yarn_warp_value1'];
                                                    echo " - ";
                                                    echo $row_model_gray_variable['yarn_warp_value2'];

                                                    if ($row_model_gray_variable['yarn_warp_cond2'] == 1) 
                                                    {
                                                      echo " )";
                                                    }
                                                    elseif ($row_model_gray_variable['yarn_warp_cond2'] == 2) 
                                                    {
                                                      echo " ]";
                                                    }
                                                    else
                                                    {
                                                      echo " [";
                                                    }
                                                }

                                                else
                                                {
                                                    echo "Empty";
                                                }

                                                
                                            ?>
                                          </td>

                                          <td>
                                            <?php 
                                                if($row_model_gray_variable['yarn_weft_value1'] != '')
                                                {
                                                    if ($row_model_gray_variable['yarn_weft_cond1'] == 1) 
                                                    {
                                                      echo "( ";
                                                    }
                                                    elseif ($row_model_gray_variable['yarn_weft_cond1'] == 2) 
                                                    {
                                                      echo "[ ";
                                                    }
                                                    else
                                                    {
                                                      echo "] ";
                                                    }
                                                    
                                                    echo $row_model_gray_variable['yarn_weft_value1'];
                                                    echo " - ";
                                                    echo $row_model_gray_variable['yarn_weft_value2'];

                                                    if ($row_model_gray_variable['yarn_weft_cond2'] == 1) 
                                                    {
                                                      echo " )";
                                                    }
                                                    elseif ($row_model_gray_variable['yarn_weft_cond2'] == 2) 
                                                    {
                                                      echo " ]";
                                                    }
                                                    else
                                                    {
                                                      echo " [";
                                                    }
                                                }

                                                else
                                                {
                                                    echo "Empty";
                                                }
                                                
                                            ?>
                                          </td>

                                          <td>
                                            <?php 
                                                if($row_model_gray_variable['thread_epi_value1'] != '')
                                                {
                                                    if ($row_model_gray_variable['thread_epi_cond1'] == 1) 
                                                    {
                                                      echo "( ";
                                                    }
                                                    elseif ($row_model_gray_variable['thread_epi_cond1'] == 2) 
                                                    {
                                                      echo "[ ";
                                                    }
                                                    else
                                                    {
                                                      echo "] ";
                                                    }
                                                    
                                                    echo $row_model_gray_variable['thread_epi_value1'];
                                                    echo " - ";
                                                    echo $row_model_gray_variable['thread_epi_value2'];

                                                    if ($row_model_gray_variable['thread_epi_cond2'] == 1) 
                                                    {
                                                      echo " )";
                                                    }
                                                    elseif ($row_model_gray_variable['thread_epi_cond2'] == 2) 
                                                    {
                                                      echo " ]";
                                                    }
                                                    else
                                                    {
                                                      echo " [";
                                                    }
                                                }

                                                else
                                                {
                                                    echo "Empty";
                                                }
                                                
                                            ?>
                                          </td>

                                          <td>
                                            <?php 
                                                if($row_model_gray_variable['thread_ppi_value1'] != '')
                                                {
                                                    if ($row_model_gray_variable['thread_ppi_cond1'] == 1) 
                                                    {
                                                      echo "( ";
                                                    }
                                                    elseif ($row_model_gray_variable['thread_ppi_cond1'] == 2) 
                                                    {
                                                      echo "[ ";
                                                    }
                                                    else
                                                    {
                                                      echo "] ";
                                                    }
                                                    
                                                    echo $row_model_gray_variable['thread_ppi_value1'];
                                                    echo " - ";
                                                    echo $row_model_gray_variable['thread_ppi_value2'];

                                                    if ($row_model_gray_variable['thread_ppi_cond2'] == 1) 
                                                    {
                                                      echo " )";
                                                    }
                                                    elseif ($row_model_gray_variable['thread_ppi_cond2'] == 2) 
                                                    {
                                                      echo " ]";
                                                    }
                                                    else
                                                    {
                                                      echo " [";
                                                    }
                                                }

                                                else
                                                {
                                                    echo "Empty";
                                                }
                                                
                                            ?>
                                          </td>

                                          <td>
                                            <?php 
                                                if($row_model_gray_variable['gsm_warp_value1'] != '')
                                                {
                                                    if ($row_model_gray_variable['gsm_warp_cond1'] == 1) 
                                                    {
                                                      echo "( ";
                                                    }
                                                    elseif ($row_model_gray_variable['gsm_warp_cond1'] == 2) 
                                                    {
                                                      echo "[ ";
                                                    }
                                                    else
                                                    {
                                                      echo "] ";
                                                    }
                                                    
                                                    echo $row_model_gray_variable['gsm_warp_value1'];
                                                    echo " - ";
                                                    echo $row_model_gray_variable['gsm_warp_value2'];

                                                    if ($row_model_gray_variable['gsm_warp_cond2'] == 1) 
                                                    {
                                                      echo " )";
                                                    }
                                                    elseif ($row_model_gray_variable['gsm_warp_cond2'] == 2) 
                                                    {
                                                      echo " ]";
                                                    }
                                                    else
                                                    {
                                                      echo " [";
                                                    }
                                                }

                                                else
                                                {
                                                    echo "Empty";
                                                }
                                                
                                            ?>
                                          </td>

                                          <!-- <td>
                                            <?php 
                                                if($row_model_gray_variable['fiber_warp_value1'] != '')
                                                {
                                                    if ($row_model_gray_variable['fiber_warp_cond1'] == 1) 
                                                    {
                                                      echo "( ";
                                                    }
                                                    elseif ($row_model_gray_variable['fiber_warp_cond1'] == 2) 
                                                    {
                                                      echo "[ ";
                                                    }
                                                    else
                                                    {
                                                      echo "] ";
                                                    }
                                                    
                                                    echo $row_model_gray_variable['fiber_warp_value1'];
                                                    echo " - ";
                                                    echo $row_model_gray_variable['fiber_warp_value2'];

                                                    if ($row_model_gray_variable['fiber_warp_cond2'] == 1) 
                                                    {
                                                      echo " )";
                                                    }
                                                    elseif ($row_model_gray_variable['fiber_warp_cond2'] == 2) 
                                                    {
                                                      echo " ]";
                                                    }
                                                    else
                                                    {
                                                      echo " [";
                                                    }
                                                }

                                                else
                                                {
                                                    echo "Empty";
                                                }
                                                
                                            ?>
                                          </td>

                                          <td>
                                            <?php 
                                                if($row_model_gray_variable['fiber_weft_value1'] != '')
                                                {
                                                    if ($row_model_gray_variable['fiber_weft_cond1'] == 1) 
                                                    {
                                                      echo "( ";
                                                    }
                                                    elseif ($row_model_gray_variable['fiber_weft_cond1'] == 2) 
                                                    {
                                                      echo "[ ";
                                                    }
                                                    else
                                                    {
                                                      echo "] ";
                                                    }
                                                    
                                                    echo $row_model_gray_variable['fiber_weft_value1'];
                                                    echo " - ";
                                                    echo $row_model_gray_variable['fiber_weft_value2'];

                                                    if ($row_model_gray_variable['fiber_weft_cond2'] == 1) 
                                                    {
                                                      echo " )";
                                                    }
                                                    elseif ($row_model_gray_variable['fiber_weft_cond2'] == 2) 
                                                    {
                                                      echo " ]";
                                                    }
                                                    else
                                                    {
                                                      echo " [";
                                                    }
                                                }

                                                else
                                                {
                                                    echo "Empty";
                                                }
                                                
                                            ?>
                                          </td> -->

                                          <td>
                                            <?php 
                                                if($row_model_gray_variable['gsm_warp_value1'] != '')
                                                {
                                                    ?>
                                                      <form id="copy_pp_version_details" name="copy_pp_version_details" style="display: inline-block;">
                                                        <!-- data store for copy and next step -->
                                                        <input type="hidden" id="pp_no_id" name="pp_no_id" value="<?php echo $pp_no_id; ?>">
                                                        <input type="hidden" id="pp_version_for_this" name="pp_version_for_this" value="<?php echo $pp_version_for_this; ?>">

                                                        <input type="hidden" id="selection_of_multiple_pp_version_for_copy" name="selection_of_multiple_pp_version_for_copy" value="<?php echo $selection_of_multiple_pp_version_for_copy; ?>">

                                                        <input type="hidden" id="pp_version_standard" name="pp_version_standard" value="<?php echo $pp_version_standard; ?>">
                                                        <button type="button" class="btn btn-sm btn-success text-center" onclick="copy_greige_issunce_for_multiple_copy('<?php echo $row_model_gray_variable['gray_variable_id']; ?>');">Copy</button>
                                                      </form>
                                                    <?php
                                                }
                                                else
                                                {
                                                    echo " ";
                                                }
                                                
                                            ?>
                                          </td>
                                        </tr>
                                      </tbody>
                                  <?php
                                  ++$sl;
                              }
                          ?>
                        </table>
                      </div>
                    </div>
                <?php
            }

            else if ($pp_version_standard == '2') 
            {
                ?>
                    <div class="x_panel">
                        <div class="x_title">
                          <h2>PP Number : <span style="color:red;"> <?php echo $row['pp_no']; ?> </span> - Singe & Desize Standards</h2>                  <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                          <table id="datatable-buttons" class="table table-striped table-bordered">
                            <thead>
                              <tr>
                                <th>SI</th>
                                <th>Version</th>
                                <th>Color</th>
                                <th>Gray Width</th>
                                <th>Flame Intensity (mbar)</th>
                                <th>Speed ((Max / Min))</th>
                                <th>Bath Temp.(C°)</th>
                                <th>Bath pH</th>
                                <th>Action</th>
                              </tr>
                            </thead>
                            
                            <tbody>
                              <?php 
                                // $sql_for_pp = "SELECT 
                                //                   pp.pp_no,
                                //                   pp.pp_id,
                                //                   pp_details.pp_id,
                                //                   pp_details.pp_no_id,
                                //                   pp_details.version,
                                //                   pp_details.color,
                                //                   pp_details.gray_width,
                                //                   pp_details.quantity,
                                //                   singe_standard.*

                                //                FROM 
                                //                   pp, pp_details, singe_standard   
                                //                WHERE 
                                //                   pp.pp_id = '$pp_no_id'
                                //                   AND pp.pp_id = pp_details.pp_no_id
                                //                   AND pp_details.pp_id = '$pp_version'
                                //                   AND singe_standard.pp_no_id = pp_details.pp_no_id
                                //                   AND singe_standard.pp_details_id = pp_details.pp_id
                                //                   AND singe_standard.active = '1'
                                //                   AND pp_details.active = '1'
                                //                ";

                                $sql_version_select = "SELECT * FROM pp_details
                                        WHERE version = '$version_id';";
                                $res_version_select = mysqli_query($con, $sql_version_select);
                                $row_version_select = mysqli_fetch_assoc($res_version_select);
                                $pp_version_name = $row_version_select['version'];
                                $sql = "SELECT * FROM pp_details
                                          WHERE version LIKE '$pp_version_name' AND active = '1' ";
                                $res = mysqli_query($con, $sql);
                                $sl = 1;

                                //$res_for_pp = mysqli_query($con, $sql_for_pp);

                                while ($row = mysqli_fetch_assoc($res)) 
                                {
                              ?>
                              <tr>
                                <td><?php echo $sl; ?></td>
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
                                <td>
                                    <?php 
                                      echo $row['gray_width'];
                                    ?>
                                </td>
                                <?php 
                                    $pp_no_id = $row['pp_no_id'];
                                    $pp_details_id = $row['pp_id'];
                                    $sql_model_gray_variable = "SELECT * FROM singe_standard
                                              WHERE pp_no_id = '$pp_no_id' AND pp_details_id = '$pp_details_id' AND active = '1' ";
                                    $res_model_gray_variable = mysqli_query($con, $sql_model_gray_variable);
                                    $row_model_gray_variable = mysqli_fetch_assoc($res_model_gray_variable);
                                ?>
                                <td>
                                  <?php 
                                    if (isset($row_model_gray_variable['intensity_cond1'])) 
                                    {
                                        if ($row_model_gray_variable['intensity_cond1'] == 1) 
                                        {
                                          echo "( ";
                                        }
                                        elseif ($row_model_gray_variable['intensity_cond1'] == 2) 
                                        {
                                          echo "[ ";
                                        }
                                        else
                                        {
                                          echo "] ";
                                        }
                                        
                                        echo $row_model_gray_variable['intensity_value1'];
                                        echo " - ";
                                        echo $row_model_gray_variable['intensity_value2'];

                                        if ($row_model_gray_variable['intensity_cond2'] == 1) 
                                        {
                                          echo " )";
                                        }
                                        elseif ($row_model_gray_variable['intensity_cond2'] == 2) 
                                        {
                                          echo " ]";
                                        }
                                        else
                                        {
                                          echo " [";
                                        }
                                    }

                                    else
                                    {
                                        echo "empty";
                                    }

                                    
                                  ?>
                                </td>
                                <td>
                                  <?php 
                                    if (isset($row_model_gray_variable['intensity_cond1'])) 
                                    {
                                        if ($row_model_gray_variable['speed_cond1'] == 1) 
                                        {
                                          echo "( ";
                                        }
                                        elseif ($row_model_gray_variable['speed_cond1'] == 2) 
                                        {
                                          echo "[ ";
                                        }
                                        else
                                        {
                                          echo "] ";
                                        }
                                        
                                        echo $row_model_gray_variable['speed_value1'];
                                        echo " - ";
                                        echo $row_model_gray_variable['speed_value2'];

                                        if ($row_model_gray_variable['speed_cond2'] == 1) 
                                        {
                                          echo " )";
                                        }
                                        elseif ($row_model_gray_variable['speed_cond2'] == 2) 
                                        {
                                          echo " ]";
                                        }
                                        else
                                        {
                                          echo " [";
                                        }
                                    }

                                    else
                                    {
                                        echo "empty";
                                    }
                                  ?>
                                </td>
                                <td>
                                  <?php 
                                    if (isset($row_model_gray_variable['intensity_cond1'])) 
                                    {
                                        if ($row_model_gray_variable['temp_cond1'] == 1) 
                                        {
                                          echo "( ";
                                        }
                                        elseif ($row_model_gray_variable['temp_cond1'] == 2) 
                                        {
                                          echo "[ ";
                                        }
                                        else
                                        {
                                          echo "] ";
                                        }
                                        
                                        echo $row_model_gray_variable['temp_value1'];
                                        echo " - ";
                                        echo $row_model_gray_variable['temp_value2'];

                                        if ($row_model_gray_variable['temp_cond2'] == 1) 
                                        {
                                          echo " )";
                                        }
                                        elseif ($row_model_gray_variable['temp_cond2'] == 2) 
                                        {
                                          echo " ]";
                                        }
                                        else
                                        {
                                          echo " [";
                                        }
                                    }

                                    else
                                    {
                                        echo "empty";
                                    }
                                  ?>
                                </td>
                                <td>
                                  <?php 

                                    if (isset($row_model_gray_variable['intensity_cond1'])) 
                                    {
                                        if ($row_model_gray_variable['ph_cond1'] == 1) 
                                        {
                                          echo "( ";
                                        }
                                        elseif ($row_model_gray_variable['ph_cond1'] == 2) 
                                        {
                                          echo "[ ";
                                        }
                                        else
                                        {
                                          echo "] ";
                                        }
                                        
                                        echo $row_model_gray_variable['ph_value1'];
                                        echo " - ";
                                        echo $row_model_gray_variable['ph_value2'];

                                        if ($row_model_gray_variable['ph_cond2'] == 1) 
                                        {
                                          echo " )";
                                        }
                                        elseif ($row_model_gray_variable['ph_cond2'] == 2) 
                                        {
                                          echo " ]";
                                        }
                                        else
                                        {
                                          echo " [";
                                        }
                                    }

                                    else
                                    {
                                        echo "empty";
                                    }

                                    
                                  ?>
                                </td>
                                <td>
                                  <?php 
                                      if (isset($row_model_gray_variable['intensity_cond1'])) 
                                      {
                                          ?>
                                            <!-- <form action="gray_varibale_edit.php" method="post" style="display: inline-block;"> -->
                                              <!-- <input type="hidden" id="pp_no" name="pp_no" value="<?php echo $row['pp_no']; ?>">
                                              <input type="hidden" id="color" name="color" value="<?php echo $row['color']; ?>">
                                              <input type="hidden" id="version" name="version" value="<?php echo $row['version']; ?>">
                                              <input type="hidden" id="gray_width" name="gray_width" value="<?php echo $row['gray_width']; ?>">
                                              <input type="hidden" id="pp_id_number" name="pp_id_number" value="<?php echo $pp_no_id; ?>">
                                              <input type="hidden" id="pp_details_id" name="pp_details_id" value="<?php echo $pp_version; ?>">
                                              <button type="submit" id="singe_standard_add_btn" name="singe_standard_add_btn" onclick="edit_for_singe_standard();" class="btn btn-primary btn-xs"> Copy </button> -->
                                            <!-- </form> --> 

                                            <form id="copy_pp_version_details" name="copy_pp_version_details" style="display: inline-block;">
                                              <!-- data store for copy and next step -->
                                              <input type="hidden" id="pp_no_id" name="pp_no_id" value="<?php echo $pp_no_id; ?>">
                                              <input type="hidden" id="pp_version_for_this" name="pp_version_for_this" value="<?php echo $pp_version_for_this; ?>">
                                                        
                                              <input type="hidden" id="selection_of_multiple_pp_version_for_copy" name="selection_of_multiple_pp_version_for_copy" value="<?php echo $selection_of_multiple_pp_version_for_copy; ?>">

                                              <input type="hidden" id="pp_version_standard" name="pp_version_standard" value="<?php echo $pp_version_standard; ?>">
                                              <button type="button" class="btn btn-xs btn-success text-center" onclick="copy_greige_issunce_for_multiple_copy('<?php echo $row_model_gray_variable['singe_standard_id']; ?>');">Copy</button>
                                            </form>
                                          <?php
                                      }

                                      else
                                      {
                                          echo "";
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
                      </div>
                <?php
            }

            else if ($pp_version_standard == '3')
            {
                ?>
                    <div class="x_panel">
                        <div class="x_title">
                          <h2>PP Number : <span style="color:red;"> <?php echo $row['pp_no']; ?> </span> - Bleaching Standards</h2>                  <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                          <table id="datatable-buttons" class="table table-striped table-bordered">
                            <thead>
                              <tr>
                                <th>SI</th>
                                <th>Version</th>
                                <th>Color</th>
                                <th>Gray Width</th>
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
                                // $s1 = 1;
                                // $sql_for_pp = "SELECT 
                                //                   pp.pp_no,
                                //                   pp.pp_id,
                                //                   pp_details.pp_id,
                                //                   pp_details.pp_no_id,
                                //                   pp_details.version,
                                //                   pp_details.color,
                                //                   pp_details.gray_width,
                                //                   pp_details.quantity,
                                //                   bleaching_standard.*

                                //                FROM 
                                //                   pp, pp_details, bleaching_standard   
                                //                WHERE 
                                //                   pp.pp_id = '$pp_no_id'
                                //                   AND pp.pp_id = pp_details.pp_no_id
                                //                   AND pp_details.pp_id = '$pp_version'
                                //                   AND bleaching_standard.pp_no_id = pp_details.pp_no_id
                                //                   AND bleaching_standard.pp_details_id = pp_details.pp_id
                                //                   AND bleaching_standard.active = '1'
                                //                   AND pp_details.active = '1'
                                //                ";



                                // $res_for_pp = mysqli_query($con, $sql_for_pp);

                                $sql_version_select = "SELECT * FROM pp_details
                                        WHERE version = '$version_id';"; 
                                $res_version_select = mysqli_query($con, $sql_version_select);
                                $row_version_select = mysqli_fetch_assoc($res_version_select);
                                $pp_version_name = $row_version_select['version'];
                                $sql = "SELECT * FROM pp_details
                                          WHERE version LIKE '$pp_version_name' AND active = '1' ";
                                $res = mysqli_query($con, $sql);
                                $sl = 1;

                                while ($row = mysqli_fetch_assoc($res)) 
                                {
                              ?>
                              <tr>
                                <td><?php echo $sl; ?></td>
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
                                <?php 
                                    $pp_no_id = $row['pp_no_id'];
                                    $pp_details_id = $row['pp_id'];
                                    $sql_model_gray_variable = "SELECT * FROM bleaching_standard
                                              WHERE pp_no_id = '$pp_no_id' AND pp_details_id = '$pp_details_id' AND active = '1' ";
                                    $res_model_gray_variable = mysqli_query($con, $sql_model_gray_variable);
                                    $row_model_gray_variable = mysqli_fetch_assoc($res_model_gray_variable);
                                ?>
                                <td><?php echo $row['gray_width'] ?></td>
                                <td>
                                  <?php 

                                    if (isset($row_model_gray_variable['absorbency_cond1'])) 
                                    {
                                        if ($row_model_gray_variable['absorbency_cond1'] == 1) 
                                        {
                                          echo "( ";
                                        }
                                        elseif ($row_model_gray_variable['absorbency_cond1'] == 2) 
                                        {
                                          echo "[ ";
                                        }
                                        else
                                        {
                                          echo "] ";
                                        }
                                        
                                        echo $row_model_gray_variable['absorbency_value1'];
                                        echo " - ";
                                        echo $row_model_gray_variable['absorbency_value2'];

                                        if ($row_model_gray_variable['absorbency_cond2'] == 1) 
                                        {
                                          echo " )";
                                        }
                                        elseif ($row_model_gray_variable['absorbency_cond2'] == 2) 
                                        {
                                          echo " ]";
                                        }
                                        else
                                        {
                                          echo " [";
                                        }
                                    }

                                    else
                                    {
                                        echo "empty";
                                    }
                                  ?>
                                </td>
                                <td>
                                  <?php

                                    if (isset($row_model_gray_variable['sizing_cond1'])) 
                                    {
                                        if ($row_model_gray_variable['sizing_cond1'] == 1) 
                                        {
                                          echo "( ";
                                        }
                                        elseif ($row_model_gray_variable['sizing_cond1'] == 2) 
                                        {
                                          echo "[ ";
                                        }
                                        else
                                        {
                                          echo "] ";
                                        }
                                        
                                        echo $row_model_gray_variable['sizing_value1'];
                                        echo " - ";
                                        echo $row_model_gray_variable['sizing_value2'];

                                        if ($row_model_gray_variable['sizing_cond2'] == 1) 
                                        {
                                          echo " )";
                                        }
                                        elseif ($row_model_gray_variable['sizing_cond2'] == 2) 
                                        {
                                          echo " ]";
                                        }
                                        else
                                        {
                                          echo " [";
                                        }
                                    }

                                    else
                                    {
                                        echo "empty";
                                    }
                                  ?>
                                </td>
                                <td>
                                  <?php 

                                    if (isset($row_model_gray_variable['whiteness_cond1'])) 
                                    {
                                        if ($row_model_gray_variable['whiteness_cond1'] == 1) 
                                        {
                                          echo "( ";
                                        }
                                        elseif ($row_model_gray_variable['whiteness_cond1'] == 2) 
                                        {
                                          echo "[ ";
                                        }
                                        else
                                        {
                                          echo "] ";
                                        }
                                        
                                        echo $row_model_gray_variable['whiteness_value1'];
                                        echo " - ";
                                        echo $row_model_gray_variable['whiteness_value2'];

                                        if ($row_model_gray_variable['whiteness_cond2'] == 1) 
                                        {
                                          echo " )";
                                        }
                                        elseif ($row_model_gray_variable['whiteness_cond2'] == 2) 
                                        {
                                          echo " ]";
                                        }
                                        else
                                        {
                                          echo " [";
                                        }
                                    }

                                    else
                                    {
                                        echo "empty";
                                    }
                                  ?>
                                </td>
                                <td>
                                  <?php 

                                    if (isset($row_model_gray_variable['pilling_cond1'])) 
                                    {
                                       if ($row_model_gray_variable['pilling_cond1'] == 1) 
                                        {
                                          echo "( ";
                                        }
                                        elseif ($row_model_gray_variable['pilling_cond1'] == 2) 
                                        {
                                          echo "[ ";
                                        }
                                        else
                                        {
                                          echo "] ";
                                        }
                                        
                                        echo $row_model_gray_variable['pilling_value1'];
                                        echo " - ";
                                        echo $row_model_gray_variable['pilling_value2'];

                                        if ($row_model_gray_variable['pilling_cond2'] == 1) 
                                        {
                                          echo " )";
                                        }
                                        elseif ($row_model_gray_variable['pilling_cond2'] == 2) 
                                        {
                                          echo " ]";
                                        }
                                        else
                                        {
                                          echo " [";
                                        } 
                                    }

                                    else
                                    {
                                        echo "empty";
                                    }
                                  ?>
                                </td>
                                <td>
                                  <?php 

                                    if (isset($row_model_gray_variable['ph_cond1'])) 
                                    {
                                        if ($row_model_gray_variable['ph_cond1'] == 1) 
                                        {
                                          echo "( ";
                                        }
                                        elseif ($row_model_gray_variable['ph_cond1'] == 2) 
                                        {
                                          echo "[ ";
                                        }
                                        else
                                        {
                                          echo "] ";
                                        }
                                        
                                        echo $row_model_gray_variable['ph_value1'];
                                        echo " - ";
                                        echo $row_model_gray_variable['ph_value2'];

                                        if ($row_model_gray_variable['ph_cond2'] == 1) 
                                        {
                                          echo " )";
                                        }
                                        elseif ($row_model_gray_variable['ph_cond2'] == 2) 
                                        {
                                          echo " ]";
                                        }
                                        else
                                        {
                                          echo " [";
                                        }
                                    }

                                    else
                                    {
                                        echo "empty";
                                    }

                                  ?>
                                </td>
                                <td>
                                  <!-- <form action="gray_varibale_edit.php" method="post" style="display: inline-block;"> -->
                                    <!-- <input type="hidden" id="pp_no" name="pp_no" value="<?php echo $row['pp_no']; ?>">
                                    <input type="hidden" id="color" name="color" value="<?php echo $row['color']; ?>">
                                    <input type="hidden" id="version" name="version" value="<?php echo $row['version']; ?>">
                                    <input type="hidden" id="gray_width" name="gray_width" value="<?php echo $row['gray_width']; ?>">
                                    <input type="hidden" id="pp_id_number" name="pp_id_number" value="<?php echo $pp_no_id; ?>">
                                    <input type="hidden" id="pp_details_id" name="pp_details_id" value="<?php echo $pp_version; ?>">
                                    <button type="submit" id="singe_standard_add_btn" name="singe_standard_add_btn" onclick="edit_for_bleaching_standard();" class="btn btn-primary btn-xs"> Edit </button> -->
                                  <!-- </form> --> 

                                  <?php 
                                      if (isset($row_model_gray_variable['absorbency_cond1'])) 
                                      {
                                        ?>
                                          <form id="copy_pp_version_details" name="copy_pp_version_details" style="display: inline-block;">
                                            <!-- data store for copy and next step -->
                                            <input type="hidden" id="pp_no_id" name="pp_no_id" value="<?php echo $pp_no_id; ?>">
                                            <input type="hidden" id="pp_version_for_this" name="pp_version_for_this" value="<?php echo $pp_version_for_this; ?>">
                                                        
                                            <input type="hidden" id="selection_of_multiple_pp_version_for_copy" name="selection_of_multiple_pp_version_for_copy" value="<?php echo $selection_of_multiple_pp_version_for_copy; ?>">

                                            <input type="hidden" id="pp_version_standard" name="pp_version_standard" value="<?php echo $pp_version_standard; ?>">
                                            <button type="button" class="btn btn-xs btn-success text-center" onclick="copy_greige_issunce_for_multiple_copy('<?php echo $row_model_gray_variable['bleaching_standard_id']; ?>');">Copy</button>
                                          </form>
                                        <?php
                                      }

                                      else
                                      {
                                          echo "";
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
                      </div>
                <?php
            }


            else if ($pp_version_standard == '4')
            {
                ?>
                    <div class="x_panel">
                        <div class="x_title">
                          <h2>PP Number : <span style="color:red;"> <?php echo $row['pp_no']; ?> </span> - Ready For Mercerize Standards</h2>                  <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                          <table id="datatable-buttons" class="table table-striped table-bordered">
                            <thead>
                              <tr>
                                <th>SI</th>
                                <th>Version</th>
                                <th>Color</th>
                                <th>Gray Width</th>
                                <th>Whiteness (Barger)</th>
                                <th>Bowing & Skew</th>
                                <th>pH</th>
                                <th>Action</th>
                              </tr>
                            </thead>
                            
                            <tbody>
                              <?php 

                                $sql_version_select = "SELECT * FROM pp_details
                                        WHERE version = '$version_id';"; 
                                $res_version_select = mysqli_query($con, $sql_version_select);
                                $row_version_select = mysqli_fetch_assoc($res_version_select);
                                $pp_version_name = $row_version_select['version'];
                                $sql = "SELECT * FROM pp_details
                                          WHERE version LIKE '$pp_version_name' AND active = '1' ";
                                $res = mysqli_query($con, $sql);
                                $sl = 1;

                                while ($row = mysqli_fetch_assoc($res)) 
                                {
                              ?>
                              <tr>
                                <td><?php echo $sl; ?></td>
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
                                <?php 
                                    $pp_no_id = $row['pp_no_id'];
                                    $pp_details_id = $row['pp_id'];
                                    $sql_model_gray_variable = "SELECT * FROM ready_mercerize_standard
                                              WHERE pp_no_id = '$pp_no_id' AND pp_details_id = '$pp_details_id' AND active = '1' ";
                                    $res_model_gray_variable = mysqli_query($con, $sql_model_gray_variable);
                                    $row_model_gray_variable = mysqli_fetch_assoc($res_model_gray_variable);
                                ?>
                                <td><?php echo $row['gray_width'] ?></td>
                                <td>
                                  <?php 

                                    if (isset($row_model_gray_variable['whiteness_cond1'])) 
                                    {
                                        if ($row_model_gray_variable['whiteness_cond1'] == 1) 
                                        {
                                          echo "( ";
                                        }
                                        elseif ($row_model_gray_variable['whiteness_cond1'] == 2) 
                                        {
                                          echo "[ ";
                                        }
                                        else
                                        {
                                          echo "] ";
                                        }
                                        
                                        echo $row_model_gray_variable['whiteness_value1'];
                                        echo " - ";
                                        echo $row_model_gray_variable['whiteness_value2'];

                                        if ($row_model_gray_variable['whiteness_cond2'] == 1) 
                                        {
                                          echo " )";
                                        }
                                        elseif ($row_model_gray_variable['whiteness_cond2'] == 2) 
                                        {
                                          echo " ]";
                                        }
                                        else
                                        {
                                          echo " [";
                                        }
                                    }

                                    else
                                    {
                                        echo "empty";
                                    }
                                  ?>
                                </td>
                                <td>
                                  <?php 

                                    if (isset($row_model_gray_variable['bowing_and_skew_cond1'])) 
                                    {
                                       if ($row_model_gray_variable['bowing_and_skew_cond1'] == 1) 
                                        {
                                          echo "( ";
                                        }
                                        elseif ($row_model_gray_variable['bowing_and_skew_cond1'] == 2) 
                                        {
                                          echo "[ ";
                                        }
                                        else
                                        {
                                          echo "] ";
                                        }
                                        
                                        echo $row_model_gray_variable['bowing_and_skew_value1'];
                                        echo " - ";
                                        echo $row_model_gray_variable['bowing_and_skew_value2'];

                                        if ($row_model_gray_variable['bowing_and_skew_cond2'] == 1) 
                                        {
                                          echo " )";
                                        }
                                        elseif ($row_model_gray_variable['bowing_and_skew_cond2'] == 2) 
                                        {
                                          echo " ]";
                                        }
                                        else
                                        {
                                          echo " [";
                                        } 
                                    }

                                    else
                                    {
                                        echo "empty";
                                    }
                                  ?>
                                </td>
                                <td>
                                  <?php 

                                    if (isset($row_model_gray_variable['ph_cond1'])) 
                                    {
                                        if ($row_model_gray_variable['ph_cond1'] == 1) 
                                        {
                                          echo "( ";
                                        }
                                        elseif ($row_model_gray_variable['ph_cond1'] == 2) 
                                        {
                                          echo "[ ";
                                        }
                                        else
                                        {
                                          echo "] ";
                                        }
                                        
                                        echo $row_model_gray_variable['ph_value1'];
                                        echo " - ";
                                        echo $row_model_gray_variable['ph_value2'];

                                        if ($row_model_gray_variable['ph_cond2'] == 1) 
                                        {
                                          echo " )";
                                        }
                                        elseif ($row_model_gray_variable['ph_cond2'] == 2) 
                                        {
                                          echo " ]";
                                        }
                                        else
                                        {
                                          echo " [";
                                        }
                                    }

                                    else
                                    {
                                        echo "empty";
                                    }

                                  ?>
                                </td>
                                <td>

                                  <?php 
                                      if (isset($row_model_gray_variable['ph_cond1'])) 
                                      {
                                        ?>
                                          <form id="copy_pp_version_details" name="copy_pp_version_details" style="display: inline-block;">
                                            <!-- data store for copy and next step -->
                                            <input type="hidden" id="pp_no_id" name="pp_no_id" value="<?php echo $pp_no_id; ?>">
                                            <input type="hidden" id="pp_version_for_this" name="pp_version_for_this" value="<?php echo $pp_version_for_this; ?>">
                                                        
                                            <input type="hidden" id="selection_of_multiple_pp_version_for_copy" name="selection_of_multiple_pp_version_for_copy" value="<?php echo $selection_of_multiple_pp_version_for_copy; ?>">

                                            <input type="hidden" id="pp_version_standard" name="pp_version_standard" value="<?php echo $pp_version_standard; ?>">
                                            <button type="button" class="btn btn-xs btn-success text-center" onclick="copy_greige_issunce_for_multiple_copy('<?php echo $row_model_gray_variable['ready_mercerize_standard_id']; ?>');">Copy</button>
                                          </form>
                                        <?php
                                      }

                                      else
                                      {
                                          echo "";
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
                      </div>
                <?php
            }


            else if ($pp_version_standard == '5')
            {
                ?>
                    <div class="x_panel">
                        <div class="x_title">
                          <h2>PP Number : <span style="color:red;"> <?php echo $row['pp_no']; ?> </span> - Mercerize Standards</h2>                  <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                          <table id="datatable-buttons" class="table table-striped table-bordered">
                            <thead>
                              <tr>
                                <th>SI</th>
                                <th>Version</th>
                                <th>Color</th>
                                <th>Gray Width</th>
                                <th>Absorbency</th>
                                <th>Sizing</th>
                                <th>Whiteness (Barger)</th>
                                <th>pH</th>
                                <th>Action</th>
                              </tr>
                            </thead>
                            
                            <tbody>
                              <?php 

                                $sql_version_select = "SELECT * FROM pp_details
                                        WHERE version = '$version_id';"; 
                                $res_version_select = mysqli_query($con, $sql_version_select);
                                $row_version_select = mysqli_fetch_assoc($res_version_select);
                                $pp_version_name = $row_version_select['version'];
                                $sql = "SELECT * FROM pp_details
                                          WHERE version LIKE '$pp_version_name' AND active = '1' ";
                                $res = mysqli_query($con, $sql);
                                $sl = 1;

                                while ($row = mysqli_fetch_assoc($res)) 
                                {
                              ?>
                              <tr>
                                <td><?php echo $sl; ?></td>
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
                                <?php 
                                    $pp_no_id = $row['pp_no_id'];
                                    $pp_details_id = $row['pp_id'];
                                    $sql_model_gray_variable = "SELECT * FROM mercerize_standard
                                              WHERE pp_no_id = '$pp_no_id' AND pp_details_id = '$pp_details_id' AND active = '1' ";
                                    $res_model_gray_variable = mysqli_query($con, $sql_model_gray_variable);
                                    $row_model_gray_variable = mysqli_fetch_assoc($res_model_gray_variable);
                                ?>
                                <td><?php echo $row['gray_width'] ?></td>

                                <td>
                                  <?php 

                                    if (isset($row_model_gray_variable['absorbency_cond1'])) 
                                    {
                                       if ($row_model_gray_variable['absorbency_cond1'] == 1) 
                                        {
                                          echo "( ";
                                        }
                                        elseif ($row_model_gray_variable['absorbency_cond1'] == 2) 
                                        {
                                          echo "[ ";
                                        }
                                        else
                                        {
                                          echo "] ";
                                        }
                                        
                                        echo $row_model_gray_variable['absorbency_value1'];
                                        echo " - ";
                                        echo $row_model_gray_variable['absorbency_value2'];

                                        if ($row_model_gray_variable['absorbency_cond2'] == 1) 
                                        {
                                          echo " )";
                                        }
                                        elseif ($row_model_gray_variable['absorbency_cond2'] == 2) 
                                        {
                                          echo " ]";
                                        }
                                        else
                                        {
                                          echo " [";
                                        } 
                                    }

                                    else
                                    {
                                        echo "empty";
                                    }
                                  ?>
                                </td>


                                <td>
                                  <?php 

                                    if (isset($row_model_gray_variable['sizing_cond1'])) 
                                    {
                                       if ($row_model_gray_variable['sizing_cond1'] == 1) 
                                        {
                                          echo "( ";
                                        }
                                        elseif ($row_model_gray_variable['sizing_cond1'] == 2) 
                                        {
                                          echo "[ ";
                                        }
                                        else
                                        {
                                          echo "] ";
                                        }
                                        
                                        echo $row_model_gray_variable['sizing_value1'];
                                        echo " - ";
                                        echo $row_model_gray_variable['sizing_value2'];

                                        if ($row_model_gray_variable['sizing_cond2'] == 1) 
                                        {
                                          echo " )";
                                        }
                                        elseif ($row_model_gray_variable['sizing_cond2'] == 2) 
                                        {
                                          echo " ]";
                                        }
                                        else
                                        {
                                          echo " [";
                                        } 
                                    }

                                    else
                                    {
                                        echo "empty";
                                    }
                                  ?>
                                </td>


                                <td>
                                  <?php 

                                    if (isset($row_model_gray_variable['whiteness_cond1'])) 
                                    {
                                        if ($row_model_gray_variable['whiteness_cond1'] == 1) 
                                        {
                                          echo "( ";
                                        }
                                        elseif ($row_model_gray_variable['whiteness_cond1'] == 2) 
                                        {
                                          echo "[ ";
                                        }
                                        else
                                        {
                                          echo "] ";
                                        }
                                        
                                        echo $row_model_gray_variable['whiteness_value1'];
                                        echo " - ";
                                        echo $row_model_gray_variable['whiteness_value2'];

                                        if ($row_model_gray_variable['whiteness_cond2'] == 1) 
                                        {
                                          echo " )";
                                        }
                                        elseif ($row_model_gray_variable['whiteness_cond2'] == 2) 
                                        {
                                          echo " ]";
                                        }
                                        else
                                        {
                                          echo " [";
                                        }
                                    }

                                    else
                                    {
                                        echo "empty";
                                    }
                                  ?>
                                </td>
                                
                                <td>
                                  <?php 

                                    if (isset($row_model_gray_variable['ph_cond1'])) 
                                    {
                                        if ($row_model_gray_variable['ph_cond1'] == 1) 
                                        {
                                          echo "( ";
                                        }
                                        elseif ($row_model_gray_variable['ph_cond1'] == 2) 
                                        {
                                          echo "[ ";
                                        }
                                        else
                                        {
                                          echo "] ";
                                        }
                                        
                                        echo $row_model_gray_variable['ph_value1'];
                                        echo " - ";
                                        echo $row_model_gray_variable['ph_value2'];

                                        if ($row_model_gray_variable['ph_cond2'] == 1) 
                                        {
                                          echo " )";
                                        }
                                        elseif ($row_model_gray_variable['ph_cond2'] == 2) 
                                        {
                                          echo " ]";
                                        }
                                        else
                                        {
                                          echo " [";
                                        }
                                    }

                                    else
                                    {
                                        echo "empty";
                                    }

                                  ?>
                                </td>
                                <td>

                                  <?php 
                                      if (isset($row_model_gray_variable['ph_cond1'])) 
                                      {
                                        ?>
                                          <form id="copy_pp_version_details" name="copy_pp_version_details" style="display: inline-block;">
                                            <!-- data store for copy and next step -->
                                            <input type="hidden" id="pp_no_id" name="pp_no_id" value="<?php echo $pp_no_id; ?>">
                                            <input type="hidden" id="pp_version_for_this" name="pp_version_for_this" value="<?php echo $pp_version_for_this; ?>">
                                                        
                                            <input type="hidden" id="selection_of_multiple_pp_version_for_copy" name="selection_of_multiple_pp_version_for_copy" value="<?php echo $selection_of_multiple_pp_version_for_copy; ?>">

                                            <input type="hidden" id="pp_version_standard" name="pp_version_standard" value="<?php echo $pp_version_standard; ?>">
                                            <button type="button" class="btn btn-xs btn-success text-center" onclick="copy_greige_issunce_for_multiple_copy('<?php echo $row_model_gray_variable['mercerize_standard_id']; ?>');">Copy</button>
                                          </form>
                                        <?php
                                      }

                                      else
                                      {
                                          echo "";
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
                      </div>
                <?php
            }


            else if ($pp_version_standard == '6')
            {
                ?>
                    <div class="x_panel">
                        <div class="x_title">
                          <h2>PP Number : <span style="color:red;"> <?php echo $row['pp_no']; ?> </span> - Equalize Standards</h2>                  <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                          <table id="datatable-buttons" class="table table-striped table-bordered">
                            <thead>
                              <tr>
                                <th>SI</th>
                                <th>Version</th>
                                <th>Color</th>
                                <th>Gray Width</th>
                                <th>Whiteness (Barger)</th>
                                <th>Bowing & Skew</th>
                                <th>pH</th>
                                <th>Action</th>
                              </tr>
                            </thead>
                            
                            <tbody>
                              <?php 

                                $sql_version_select = "SELECT * FROM pp_details
                                        WHERE version = '$version_id';"; 
                                $res_version_select = mysqli_query($con, $sql_version_select);
                                $row_version_select = mysqli_fetch_assoc($res_version_select);
                                $pp_version_name = $row_version_select['version'];
                                $sql = "SELECT * FROM pp_details
                                          WHERE version LIKE '$pp_version_name' AND active = '1' ";
                                $res = mysqli_query($con, $sql);
                                $sl = 1;

                                while ($row = mysqli_fetch_assoc($res)) 
                                {
                              ?>
                              <tr>
                                <td><?php echo $sl; ?></td>
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
                                <?php 
                                    $pp_no_id = $row['pp_no_id'];
                                    $pp_details_id = $row['pp_id'];
                                    $sql_model_gray_variable = "SELECT * FROM equalize_standard
                                              WHERE pp_no_id = '$pp_no_id' AND pp_details_id = '$pp_details_id' AND active = '1' ";
                                    $res_model_gray_variable = mysqli_query($con, $sql_model_gray_variable);
                                    $row_model_gray_variable = mysqli_fetch_assoc($res_model_gray_variable);
                                ?>
                                <td><?php echo $row['gray_width'] ?></td>
                                <td>
                                  <?php 

                                    if (isset($row_model_gray_variable['whiteness_cond1'])) 
                                    {
                                        if ($row_model_gray_variable['whiteness_cond1'] == 1) 
                                        {
                                          echo "( ";
                                        }
                                        elseif ($row_model_gray_variable['whiteness_cond1'] == 2) 
                                        {
                                          echo "[ ";
                                        }
                                        else
                                        {
                                          echo "] ";
                                        }
                                        
                                        echo $row_model_gray_variable['whiteness_value1'];
                                        echo " - ";
                                        echo $row_model_gray_variable['whiteness_value2'];

                                        if ($row_model_gray_variable['whiteness_cond2'] == 1) 
                                        {
                                          echo " )";
                                        }
                                        elseif ($row_model_gray_variable['whiteness_cond2'] == 2) 
                                        {
                                          echo " ]";
                                        }
                                        else
                                        {
                                          echo " [";
                                        }
                                    }

                                    else
                                    {
                                        echo "empty";
                                    }
                                  ?>
                                </td>
                                <td>
                                  <?php 

                                    if (isset($row_model_gray_variable['bowing_and_skew_cond1'])) 
                                    {
                                       if ($row_model_gray_variable['bowing_and_skew_cond1'] == 1) 
                                        {
                                          echo "( ";
                                        }
                                        elseif ($row_model_gray_variable['bowing_and_skew_cond1'] == 2) 
                                        {
                                          echo "[ ";
                                        }
                                        else
                                        {
                                          echo "] ";
                                        }
                                        
                                        echo $row_model_gray_variable['bowing_and_skew_value1'];
                                        echo " - ";
                                        echo $row_model_gray_variable['bowing_and_skew_value2'];

                                        if ($row_model_gray_variable['bowing_and_skew_cond2'] == 1) 
                                        {
                                          echo " )";
                                        }
                                        elseif ($row_model_gray_variable['bowing_and_skew_cond2'] == 2) 
                                        {
                                          echo " ]";
                                        }
                                        else
                                        {
                                          echo " [";
                                        } 
                                    }

                                    else
                                    {
                                        echo "empty";
                                    }
                                  ?>
                                </td>
                                <td>
                                  <?php 

                                    if (isset($row_model_gray_variable['ph_cond1'])) 
                                    {
                                        if ($row_model_gray_variable['ph_cond1'] == 1) 
                                        {
                                          echo "( ";
                                        }
                                        elseif ($row_model_gray_variable['ph_cond1'] == 2) 
                                        {
                                          echo "[ ";
                                        }
                                        else
                                        {
                                          echo "] ";
                                        }
                                        
                                        echo $row_model_gray_variable['ph_value1'];
                                        echo " - ";
                                        echo $row_model_gray_variable['ph_value2'];

                                        if ($row_model_gray_variable['ph_cond2'] == 1) 
                                        {
                                          echo " )";
                                        }
                                        elseif ($row_model_gray_variable['ph_cond2'] == 2) 
                                        {
                                          echo " ]";
                                        }
                                        else
                                        {
                                          echo " [";
                                        }
                                    }

                                    else
                                    {
                                        echo "empty";
                                    }

                                  ?>
                                </td>
                                <td>

                                  <?php 
                                      if (isset($row_model_gray_variable['ph_cond1'])) 
                                      {
                                        ?>
                                          <form id="copy_pp_version_details" name="copy_pp_version_details" style="display: inline-block;">
                                            <!-- data store for copy and next step -->
                                            <input type="hidden" id="pp_no_id" name="pp_no_id" value="<?php echo $pp_no_id; ?>">
                                            <input type="hidden" id="pp_version_for_this" name="pp_version_for_this" value="<?php echo $pp_version_for_this; ?>">
                                                        
                                            <input type="hidden" id="selection_of_multiple_pp_version_for_copy" name="selection_of_multiple_pp_version_for_copy" value="<?php echo $selection_of_multiple_pp_version_for_copy; ?>">

                                            <input type="hidden" id="pp_version_standard" name="pp_version_standard" value="<?php echo $pp_version_standard; ?>">
                                            <button type="button" class="btn btn-xs btn-success text-center" onclick="copy_greige_issunce_for_multiple_copy('<?php echo $row_model_gray_variable['equalize_standard_id']; ?>');">Copy</button>
                                          </form>
                                        <?php
                                      }

                                      else
                                      {
                                          echo "";
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
                      </div>
                <?php
            }


            else if ($pp_version_standard == '7')
            {
                ?>
                    <div class="x_panel">
                        <div class="x_title">
                          <h2>PP Number : <span style="color:red;"> <?php echo $row['pp_no']; ?> </span> - Printing Standards</h2>                  <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                          <table id="datatable-buttons" class="table table-striped table-bordered">
                            <thead>
                              <tr>
                                <th>SI</th>
                                <th>Version</th>
                                <th>Color</th>
                                <th>Gray Width</th>
                                <th>Rubbing</th>
                                <th>Action</th>
                              </tr>
                            </thead>
                            
                            <tbody>
                              <?php 

                                $sql_version_select = "SELECT * FROM pp_details
                                        WHERE version = '$version_id';"; 
                                $res_version_select = mysqli_query($con, $sql_version_select);
                                $row_version_select = mysqli_fetch_assoc($res_version_select);
                                $pp_version_name = $row_version_select['version'];
                                $sql = "SELECT * FROM pp_details
                                          WHERE version LIKE '$pp_version_name' AND active = '1' ";
                                $res = mysqli_query($con, $sql);
                                $sl = 1;

                                while ($row = mysqli_fetch_assoc($res)) 
                                {
                              ?>
                              <tr>
                                <td><?php echo $sl; ?></td>
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
                                <?php 
                                    $pp_no_id = $row['pp_no_id'];
                                    $pp_details_id = $row['pp_id'];
                                    $sql_model_gray_variable = "SELECT * FROM printing_standard
                                              WHERE pp_no_id = '$pp_no_id' AND pp_details_id = '$pp_details_id' AND active = '1' ";
                                    $res_model_gray_variable = mysqli_query($con, $sql_model_gray_variable);
                                    $row_model_gray_variable = mysqli_fetch_assoc($res_model_gray_variable);
                                ?>
                                <td><?php echo $row['gray_width'] ?></td>
                                <td>
                                  <?php 

                                    if (isset($row_model_gray_variable['rubbing_cond1'])) 
                                    {
                                        if ($row_model_gray_variable['rubbing_cond1'] == 1) 
                                        {
                                          echo "( ";
                                        }
                                        elseif ($row_model_gray_variable['rubbing_cond1'] == 2) 
                                        {
                                          echo "[ ";
                                        }
                                        else
                                        {
                                          echo "] ";
                                        }
                                        
                                        echo $row_model_gray_variable['rubbing_value1'];
                                        echo " - ";
                                        echo $row_model_gray_variable['rubbing_value2'];

                                        if ($row_model_gray_variable['rubbing_cond2'] == 1) 
                                        {
                                          echo " )";
                                        }
                                        elseif ($row_model_gray_variable['rubbing_cond2'] == 2) 
                                        {
                                          echo " ]";
                                        }
                                        else
                                        {
                                          echo " [";
                                        }
                                    }

                                    else
                                    {
                                        echo "empty";
                                    }
                                  ?>
                                </td>
                                
                                <td>

                                  <?php 
                                      if (isset($row_model_gray_variable['rubbing_cond1'])) 
                                      {
                                        ?>
                                          <form id="copy_pp_version_details" name="copy_pp_version_details" style="display: inline-block;">
                                            <!-- data store for copy and next step -->
                                            <input type="hidden" id="pp_no_id" name="pp_no_id" value="<?php echo $pp_no_id; ?>">
                                            <input type="hidden" id="pp_version_for_this" name="pp_version_for_this" value="<?php echo $pp_version_for_this; ?>">
                                                        
                                            <input type="hidden" id="selection_of_multiple_pp_version_for_copy" name="selection_of_multiple_pp_version_for_copy" value="<?php echo $selection_of_multiple_pp_version_for_copy; ?>">

                                            <input type="hidden" id="pp_version_standard" name="pp_version_standard" value="<?php echo $pp_version_standard; ?>">
                                            <button type="button" class="btn btn-xs btn-success text-center" onclick="copy_greige_issunce_for_multiple_copy('<?php echo $row_model_gray_variable['printing_standard_id']; ?>');">Copy</button>
                                          </form>
                                        <?php
                                      }

                                      else
                                      {
                                          echo "";
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
                      </div>
                <?php
            }


            else if ($pp_version_standard == '8')
            {
                ?>
                    <div class="x_panel">
                        <div class="x_title">
                          <h2>PP Number : <span style="color:red;"> <?php echo $row['pp_no']; ?> </span> - Curing/Streaming Standards</h2>                  <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                          <table id="datatable-buttons" class="table table-striped table-bordered">
                            <thead>
                              <tr>
                                <th>SI</th>
                                <th>Version</th>
                                <th>Color</th>
                                <th>Gray Width</th>
                                <th>Rubbing</th>
                                <th>Action</th>
                              </tr>
                            </thead>
                            
                            <tbody>
                              <?php 

                                $sql_version_select = "SELECT * FROM pp_details
                                        WHERE version = '$version_id';"; 
                                $res_version_select = mysqli_query($con, $sql_version_select);
                                $row_version_select = mysqli_fetch_assoc($res_version_select);
                                $pp_version_name = $row_version_select['version'];
                                $sql = "SELECT * FROM pp_details
                                          WHERE version LIKE '$pp_version_name' AND active = '1' ";
                                $res = mysqli_query($con, $sql);
                                $sl = 1;

                                while ($row = mysqli_fetch_assoc($res)) 
                                {
                              ?>
                              <tr>
                                <td><?php echo $sl; ?></td>
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
                                <?php 
                                    $pp_no_id = $row['pp_no_id'];
                                    $pp_details_id = $row['pp_id'];
                                    $sql_model_gray_variable = "SELECT * FROM curing_standard
                                              WHERE pp_no_id = '$pp_no_id' AND pp_details_id = '$pp_details_id' AND active = '1' ";
                                    $res_model_gray_variable = mysqli_query($con, $sql_model_gray_variable);
                                    $row_model_gray_variable = mysqli_fetch_assoc($res_model_gray_variable);
                                ?>
                                <td><?php echo $row['gray_width'] ?></td>
                                <td>
                                  <?php 

                                    if (isset($row_model_gray_variable['rubbing_cond1'])) 
                                    {
                                        if ($row_model_gray_variable['rubbing_cond1'] == 1) 
                                        {
                                          echo "( ";
                                        }
                                        elseif ($row_model_gray_variable['rubbing_cond1'] == 2) 
                                        {
                                          echo "[ ";
                                        }
                                        else
                                        {
                                          echo "] ";
                                        }
                                        
                                        echo $row_model_gray_variable['rubbing_value1'];
                                        echo " - ";
                                        echo $row_model_gray_variable['rubbing_value2'];

                                        if ($row_model_gray_variable['rubbing_cond2'] == 1) 
                                        {
                                          echo " )";
                                        }
                                        elseif ($row_model_gray_variable['rubbing_cond2'] == 2) 
                                        {
                                          echo " ]";
                                        }
                                        else
                                        {
                                          echo " [";
                                        }
                                    }

                                    else
                                    {
                                        echo "empty";
                                    }
                                  ?>
                                </td>
                                
                                <td>

                                  <?php 
                                      if (isset($row_model_gray_variable['rubbing_cond1'])) 
                                      {
                                        ?>
                                          <form id="copy_pp_version_details" name="copy_pp_version_details" style="display: inline-block;">
                                            <!-- data store for copy and next step -->
                                            <input type="hidden" id="pp_no_id" name="pp_no_id" value="<?php echo $pp_no_id; ?>">
                                            <input type="hidden" id="pp_version_for_this" name="pp_version_for_this" value="<?php echo $pp_version_for_this; ?>">
                                                        
                                            <input type="hidden" id="selection_of_multiple_pp_version_for_copy" name="selection_of_multiple_pp_version_for_copy" value="<?php echo $selection_of_multiple_pp_version_for_copy; ?>">

                                            <input type="hidden" id="pp_version_standard" name="pp_version_standard" value="<?php echo $pp_version_standard; ?>">
                                            <button type="button" class="btn btn-xs btn-success text-center" onclick="copy_greige_issunce_for_multiple_copy('<?php echo $row_model_gray_variable['curing_standard_id']; ?>');">Copy</button>
                                          </form>
                                        <?php
                                      }

                                      else
                                      {
                                          echo "";
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
                      </div>
                <?php
            }

            else if ($pp_version_standard == '9')
            {
                ?>
                    <div class="x_panel">
                        <div class="x_title">
                          <h2>PP Number : <span style="color:red;"> <?php echo $row['pp_no']; ?> </span> - Curing/Steaming Standards</h2>                  <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                          <table id="datatable-buttons" class="table table-striped table-bordered">
                            <thead>
                              <tr>
                                <th>SI</th>
                                <th>Version</th>
                                <th>Color</th>
                                <th>Gray Width</th>

                                <th>Color Fastness to Rubbing Dry</th>
                                <th>Color Fastness to Rubbing Wet</th>
                                <th>Wash Dry Warp before Iron</th>
                                <th>Wash Dry Weft before Iron</th>
                                <th>Wash Dry Warp After Iron</th>
                                <th>Wash Dry Weft After Iron</th>
                                <th>Dry Cleaning Warp</th>
                                <th>Dry Cleaning Weft</th>
                                <th>Yarn Count Warp</th>
                                <th>Yarn Count Weft</th>

                                <th>Action</th>
                              </tr>
                            </thead>
                            
                            <tbody>
                              <?php 

                                $sql_version_select = "SELECT * FROM pp_details
                                        WHERE version = '$version_id';"; 
                                $res_version_select = mysqli_query($con, $sql_version_select);
                                $row_version_select = mysqli_fetch_assoc($res_version_select);
                                $pp_version_name = $row_version_select['version'];
                                $sql = "SELECT * FROM pp_details
                                          WHERE version LIKE '$pp_version_name' AND active = '1' ";
                                $res = mysqli_query($con, $sql);
                                $sl = 1;

                                while ($row = mysqli_fetch_assoc($res)) 
                                {
                              ?>
                              <tr>
                                <td><?php echo $sl; ?></td>
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
                                <?php 
                                    $pp_no_id = $row['pp_no_id'];
                                    $pp_details_id = $row['pp_id']; 
                                    $sql_model_gray_variable = "SELECT * FROM finishing_standard
                                              WHERE pp_no_id = '$pp_no_id' AND pp_details_id = '$pp_details_id' AND active = '1' ";
                                    $res_model_gray_variable = mysqli_query($con, $sql_model_gray_variable);
                                    $row_model_gray_variable = mysqli_fetch_assoc($res_model_gray_variable);
                                ?>
                                <td><?php echo $row['gray_width'] ?></td>
                                <td>
                                    <?php 
                                      if ($row_model_gray_variable['cf_rubbing_dry_cond1'] == 1) 
                                      {
                                        echo "( ";
                                      }
                                      elseif ($row_model_gray_variable['cf_rubbing_dry_cond1'] == 2) 
                                      {
                                        echo "[ ";
                                      }
                                      else
                                      {
                                        echo "] ";
                                      }
                                      
                                      echo $row_model_gray_variable['cf_rubbing_dry_value1'];
                                      echo " - ";
                                      echo $row_model_gray_variable['cf_rubbing_dry_value2'];

                                      if ($row_model_gray_variable['cf_rubbing_dry_cond2'] == 1) 
                                      {
                                        echo " )";
                                      }
                                      elseif ($row_model_gray_variable['cf_rubbing_dry_cond2'] == 2) 
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
                                      if ($row_model_gray_variable['cf_rubbing_wet_cond1'] == 1) 
                                      {
                                        echo "( ";
                                      }
                                      elseif ($row_model_gray_variable['cf_rubbing_wet_cond1'] == 2) 
                                      {
                                        echo "[ ";
                                      }
                                      else
                                      {
                                        echo "] ";
                                      }
                                      
                                      echo $row_model_gray_variable['cf_rubbing_wet_value1'];
                                      echo " - ";
                                      echo $row_model_gray_variable['cf_rubbing_wet_value2'];

                                      if ($row_model_gray_variable['cf_rubbing_wet_cond2'] == 1) 
                                      {
                                        echo " )";
                                      }
                                      elseif ($row_model_gray_variable['cf_rubbing_wet_cond2'] == 2) 
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
                                      if ($row_model_gray_variable['wash_dry_warp_before_iron_cond1'] == 1) 
                                      {
                                        echo "( ";
                                      }
                                      elseif ($row_model_gray_variable['wash_dry_warp_before_iron_cond1'] == 2) 
                                      {
                                        echo "[ ";
                                      }
                                      else
                                      {
                                        echo "] ";
                                      }
                                      
                                      echo $row_model_gray_variable['wash_dry_warp_before_iron_value1'];
                                      echo " - ";
                                      echo $row_model_gray_variable['wash_dry_warp_before_iron_value2'];

                                      if ($row_model_gray_variable['wash_dry_warp_before_iron_cond2'] == 1) 
                                      {
                                        echo " )";
                                      }
                                      elseif ($row_model_gray_variable['wash_dry_warp_before_iron_cond2'] == 2) 
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
                                      if ($row_model_gray_variable['wash_dry_weft_before_iron_cond1'] == 1) 
                                      {
                                        echo "( ";
                                      }
                                      elseif ($row_model_gray_variable['wash_dry_weft_before_iron_cond1'] == 2) 
                                      {
                                        echo "[ ";
                                      }
                                      else
                                      {
                                        echo "] ";
                                      }
                                      
                                      echo $row_model_gray_variable['wash_dry_weft_before_iron_value1'];
                                      echo " - ";
                                      echo $row_model_gray_variable['wash_dry_weft_before_iron_value2'];

                                      if ($row_model_gray_variable['wash_dry_weft_before_iron_cond2'] == 1) 
                                      {
                                        echo " )";
                                      }
                                      elseif ($row_model_gray_variable['wash_dry_weft_before_iron_cond2'] == 2) 
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
                                      if ($row_model_gray_variable['wash_dry_warp_after_iron_cond1'] == 1) 
                                      {
                                        echo "( ";
                                      }
                                      elseif ($row_model_gray_variable['wash_dry_warp_after_iron_cond1'] == 2) 
                                      {
                                        echo "[ ";
                                      }
                                      else
                                      {
                                        echo "] ";
                                      }
                                      
                                      echo $row_model_gray_variable['wash_dry_warp_after_iron_value1'];
                                      echo " - ";
                                      echo $row_model_gray_variable['wash_dry_warp_after_iron_value2'];

                                      if ($row_model_gray_variable['wash_dry_warp_after_iron_cond2'] == 1) 
                                      {
                                        echo " )";
                                      }
                                      elseif ($row_model_gray_variable['wash_dry_warp_after_iron_cond2'] == 2) 
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
                                      if ($row_model_gray_variable['wash_dry_weft_after_iron_cond1'] == 1) 
                                      {
                                        echo "( ";
                                      }
                                      elseif ($row_model_gray_variable['wash_dry_weft_after_iron_cond1'] == 2) 
                                      {
                                        echo "[ ";
                                      }
                                      else
                                      {
                                        echo "] ";
                                      }
                                      
                                      echo $row_model_gray_variable['wash_dry_weft_after_iron_value1'];
                                      echo " - ";
                                      echo $row_model_gray_variable['wash_dry_weft_after_iron_value2'];

                                      if ($row_model_gray_variable['wash_dry_weft_after_iron_cond2'] == 1) 
                                      {
                                        echo " )";
                                      }
                                      elseif ($row_model_gray_variable['wash_dry_weft_after_iron_cond2'] == 2) 
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
                                      if ($row_model_gray_variable['dry_cleaning_warp_cond1'] == 1) 
                                      {
                                        echo "( ";
                                      }
                                      elseif ($row_model_gray_variable['dry_cleaning_warp_cond1'] == 2) 
                                      {
                                        echo "[ ";
                                      }
                                      else
                                      {
                                        echo "] ";
                                      }
                                      
                                      echo $row_model_gray_variable['dry_cleaning_warp_value1'];
                                      echo " - ";
                                      echo $row_model_gray_variable['dry_cleaning_warp_value2'];

                                      if ($row_model_gray_variable['dry_cleaning_warp_cond2'] == 1) 
                                      {
                                        echo " )";
                                      }
                                      elseif ($row_model_gray_variable['dry_cleaning_warp_cond2'] == 2) 
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
                                      if ($row_model_gray_variable['dry_cleaning_weft_cond1'] == 1) 
                                      {
                                        echo "( ";
                                      }
                                      elseif ($row_model_gray_variable['dry_cleaning_weft_cond1'] == 2) 
                                      {
                                        echo "[ ";
                                      }
                                      else
                                      {
                                        echo "] ";
                                      }
                                      
                                      echo $row_model_gray_variable['dry_cleaning_weft_value1'];
                                      echo " - ";
                                      echo $row_model_gray_variable['dry_cleaning_weft_value2'];

                                      if ($row_model_gray_variable['dry_cleaning_weft_cond2'] == 1) 
                                      {
                                        echo " )";
                                      }
                                      elseif ($row_model_gray_variable['dry_cleaning_weft_cond2'] == 2) 
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
                                      if ($row_model_gray_variable['yarn_count_warp_cond1'] == 1) 
                                      {
                                        echo "( ";
                                      }
                                      elseif ($row_model_gray_variable['yarn_count_warp_cond1'] == 2) 
                                      {
                                        echo "[ ";
                                      }
                                      else
                                      {
                                        echo "] ";
                                      }
                                      
                                      echo $row_model_gray_variable['yarn_count_warp_value1'];
                                      echo " - ";
                                      echo $row_model_gray_variable['yarn_count_warp_value2'];

                                      if ($row_model_gray_variable['yarn_count_warp_cond2'] == 1) 
                                      {
                                        echo " )";
                                      }
                                      elseif ($row_model_gray_variable['yarn_count_warp_cond2'] == 2) 
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
                                      if ($row_model_gray_variable['yarn_count_weft_cond1'] == 1) 
                                      {
                                        echo "( ";
                                      }
                                      elseif ($row_model_gray_variable['yarn_count_weft_cond1'] == 2) 
                                      {
                                        echo "[ ";
                                      }
                                      else
                                      {
                                        echo "] ";
                                      }
                                      
                                      echo $row_model_gray_variable['yarn_count_weft_value1'];
                                      echo " - ";
                                      echo $row_model_gray_variable['yarn_count_weft_value2'];

                                      if ($row_model_gray_variable['yarn_count_weft_cond2'] == 1) 
                                      {
                                        echo " )";
                                      }
                                      elseif ($row_model_gray_variable['yarn_count_weft_cond2'] == 2) 
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
                                      if (isset($row_model_gray_variable['cf_rubbing_dry_value1'])) 
                                      {
                                        ?>
                                          <form id="copy_pp_version_details" name="copy_pp_version_details" style="display: inline-block;">
                                            <!-- data store for copy and next step -->
                                            <input type="hidden" id="pp_no_id" name="pp_no_id" value="<?php echo $pp_no_id; ?>">
                                            <input type="hidden" id="pp_version_for_this" name="pp_version_for_this" value="<?php echo $pp_version_for_this; ?>">
                                            <input type="hidden" id="selection_of_multiple_pp_version_for_copy" name="selection_of_multiple_pp_version_for_copy" value="<?php echo $selection_of_multiple_pp_version_for_copy; ?>">
                                            <input type="hidden" id="pp_version_standard" name="pp_version_standard" value="<?php echo $pp_version_standard; ?>">
                                            <button type="button" class="btn btn-xs btn-success text-center" onclick="copy_greige_issunce_for_multiple_copy('<?php echo $row_model_gray_variable['finishing_standard_id']; ?>');">Copy</button>
                                          </form>
                                        <?php
                                      }

                                      else
                                      {
                                          echo "";
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
                      </div>
                <?php
            }

            else if ($pp_version_standard == '10')
            {
                ?>
                    <div class="x_panel">
                        <div class="x_title">
                          <h2>PP Number : <span style="color:red;"> <?php echo $row['pp_no']; ?> </span> - Scouring & Bleaching Standards</h2>                  <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                          <table id="datatable-buttons" class="table table-striped table-bordered">
                            <thead>
                              <tr>
                                <th>SI</th>
                                <th>Version</th>
                                <th>Color</th>
                                <th>Gray Width</th>
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

                                $sql_version_select = "SELECT * FROM pp_details
                                        WHERE version = '$version_id';"; 
                                $res_version_select = mysqli_query($con, $sql_version_select);
                                $row_version_select = mysqli_fetch_assoc($res_version_select);
                                $pp_version_name = $row_version_select['version'];
                                $sql = "SELECT * FROM pp_details
                                          WHERE version LIKE '$pp_version_name' AND active = '1' ";
                                $res = mysqli_query($con, $sql);
                                $sl = 1;

                                while ($row = mysqli_fetch_assoc($res)) 
                                {
                              ?>
                              <tr>
                                <td><?php echo $sl; ?></td>
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
                                <?php 
                                    $pp_no_id = $row['pp_no_id'];
                                    $pp_details_id = $row['pp_id'];
                                    $sql_model_gray_variable = "SELECT * FROM scouring_bleaching_standard
                                              WHERE pp_no_id = '$pp_no_id' AND pp_details_id = '$pp_details_id' AND active = '1' ";
                                    $res_model_gray_variable = mysqli_query($con, $sql_model_gray_variable);
                                    $row_model_gray_variable = mysqli_fetch_assoc($res_model_gray_variable);
                                ?>
                                <td><?php echo $row['gray_width'] ?></td>
                                <td>
                                  <?php 

                                    if (isset($row_model_gray_variable['absorbency_cond1'])) 
                                    {
                                        if ($row_model_gray_variable['absorbency_cond1'] == 1) 
                                        {
                                          echo "( ";
                                        }
                                        elseif ($row_model_gray_variable['absorbency_cond1'] == 2) 
                                        {
                                          echo "[ ";
                                        }
                                        else
                                        {
                                          echo "] ";
                                        }
                                        
                                        echo $row_model_gray_variable['absorbency_value1'];
                                        echo " - ";
                                        echo $row_model_gray_variable['absorbency_value2'];

                                        if ($row_model_gray_variable['absorbency_cond2'] == 1) 
                                        {
                                          echo " )";
                                        }
                                        elseif ($row_model_gray_variable['absorbency_cond2'] == 2) 
                                        {
                                          echo " ]";
                                        }
                                        else
                                        {
                                          echo " [";
                                        }
                                    }

                                    else
                                    {
                                        echo "empty";
                                    }
                                  ?>
                                </td>
                                <td>
                                  <?php

                                    if (isset($row_model_gray_variable['sizing_cond1'])) 
                                    {
                                        if ($row_model_gray_variable['sizing_cond1'] == 1) 
                                        {
                                          echo "( ";
                                        }
                                        elseif ($row_model_gray_variable['sizing_cond1'] == 2) 
                                        {
                                          echo "[ ";
                                        }
                                        else
                                        {
                                          echo "] ";
                                        }
                                        
                                        echo $row_model_gray_variable['sizing_value1'];
                                        echo " - ";
                                        echo $row_model_gray_variable['sizing_value2'];

                                        if ($row_model_gray_variable['sizing_cond2'] == 1) 
                                        {
                                          echo " )";
                                        }
                                        elseif ($row_model_gray_variable['sizing_cond2'] == 2) 
                                        {
                                          echo " ]";
                                        }
                                        else
                                        {
                                          echo " [";
                                        }
                                    }

                                    else
                                    {
                                        echo "empty";
                                    }
                                  ?>
                                </td>
                                <td>
                                  <?php 

                                    if (isset($row_model_gray_variable['whiteness_cond1'])) 
                                    {
                                        if ($row_model_gray_variable['whiteness_cond1'] == 1) 
                                        {
                                          echo "( ";
                                        }
                                        elseif ($row_model_gray_variable['whiteness_cond1'] == 2) 
                                        {
                                          echo "[ ";
                                        }
                                        else
                                        {
                                          echo "] ";
                                        }
                                        
                                        echo $row_model_gray_variable['whiteness_value1'];
                                        echo " - ";
                                        echo $row_model_gray_variable['whiteness_value2'];

                                        if ($row_model_gray_variable['whiteness_cond2'] == 1) 
                                        {
                                          echo " )";
                                        }
                                        elseif ($row_model_gray_variable['whiteness_cond2'] == 2) 
                                        {
                                          echo " ]";
                                        }
                                        else
                                        {
                                          echo " [";
                                        }
                                    }

                                    else
                                    {
                                        echo "empty";
                                    }
                                  ?>
                                </td>
                                <td>
                                  <?php 

                                    if (isset($row_model_gray_variable['pilling_cond1'])) 
                                    {
                                       if ($row_model_gray_variable['pilling_cond1'] == 1) 
                                        {
                                          echo "( ";
                                        }
                                        elseif ($row_model_gray_variable['pilling_cond1'] == 2) 
                                        {
                                          echo "[ ";
                                        }
                                        else
                                        {
                                          echo "] ";
                                        }
                                        
                                        echo $row_model_gray_variable['pilling_value1'];
                                        echo " - ";
                                        echo $row_model_gray_variable['pilling_value2'];

                                        if ($row_model_gray_variable['pilling_cond2'] == 1) 
                                        {
                                          echo " )";
                                        }
                                        elseif ($row_model_gray_variable['pilling_cond2'] == 2) 
                                        {
                                          echo " ]";
                                        }
                                        else
                                        {
                                          echo " [";
                                        } 
                                    }

                                    else
                                    {
                                        echo "empty";
                                    }
                                  ?>
                                </td>
                                <td>
                                  <?php 

                                    if (isset($row_model_gray_variable['ph_cond1'])) 
                                    {
                                        if ($row_model_gray_variable['ph_cond1'] == 1) 
                                        {
                                          echo "( ";
                                        }
                                        elseif ($row_model_gray_variable['ph_cond1'] == 2) 
                                        {
                                          echo "[ ";
                                        }
                                        else
                                        {
                                          echo "] ";
                                        }
                                        
                                        echo $row_model_gray_variable['ph_value1'];
                                        echo " - ";
                                        echo $row_model_gray_variable['ph_value2'];

                                        if ($row_model_gray_variable['ph_cond2'] == 1) 
                                        {
                                          echo " )";
                                        }
                                        elseif ($row_model_gray_variable['ph_cond2'] == 2) 
                                        {
                                          echo " ]";
                                        }
                                        else
                                        {
                                          echo " [";
                                        }
                                    }

                                    else
                                    {
                                        echo "empty";
                                    }

                                  ?>
                                </td>
                                <td>

                                  <?php 
                                      if (isset($row_model_gray_variable['absorbency_cond1'])) 
                                      {
                                        ?>
                                          <form id="copy_pp_version_details" name="copy_pp_version_details" style="display: inline-block;">
                                            <!-- data store for copy and next step -->
                                            <input type="hidden" id="pp_no_id" name="pp_no_id" value="<?php echo $pp_no_id; ?>">
                                            <input type="hidden" id="pp_version_for_this" name="pp_version_for_this" value="<?php echo $pp_version_for_this; ?>">
                                                        
                                            <input type="hidden" id="selection_of_multiple_pp_version_for_copy" name="selection_of_multiple_pp_version_for_copy" value="<?php echo $selection_of_multiple_pp_version_for_copy; ?>">

                                            <input type="hidden" id="pp_version_standard" name="pp_version_standard" value="<?php echo $pp_version_standard; ?>">
                                            <button type="button" class="btn btn-xs btn-success text-center" onclick="copy_greige_issunce_for_multiple_copy('<?php echo $row_model_gray_variable['scouring_bleaching_standard_id']; ?>');">Copy</button>
                                          </form>
                                        <?php
                                      }

                                      else
                                      {
                                          echo "";
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
                      </div>
                <?php
            }


            else if ($pp_version_standard == '11')
            {
                ?>
                    <div class="x_panel">
                        <div class="x_title">
                          <h2>PP Number : <span style="color:red;"> <?php echo $row['pp_no']; ?> </span> - Scouring Standards</h2>                  <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                          <table id="datatable-buttons" class="table table-striped table-bordered">
                            <thead>
                              <tr>
                                <th>SI</th>
                                <th>Version</th>
                                <th>Color</th>
                                <th>Gray Width</th>
                                <th>Absorbency</th>
                                <th>Resudual Sizing Material</th>
                                <th>Pilling</th>
                                <th>pH</th>
                                <th>Action</th>
                              </tr>
                            </thead>
                            
                            <tbody>
                              <?php 

                                $sql_version_select = "SELECT * FROM pp_details
                                        WHERE version = '$version_id';"; 
                                $res_version_select = mysqli_query($con, $sql_version_select);
                                $row_version_select = mysqli_fetch_assoc($res_version_select);
                                $pp_version_name = $row_version_select['version'];
                                $sql = "SELECT * FROM pp_details
                                          WHERE version LIKE '$pp_version_name' AND active = '1' ";
                                $res = mysqli_query($con, $sql);
                                $sl = 1;

                                while ($row = mysqli_fetch_assoc($res)) 
                                {
                              ?>
                              <tr>
                                <td><?php echo $sl; ?></td>
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
                                <?php 
                                    $pp_no_id = $row['pp_no_id'];
                                    $pp_details_id = $row['pp_id'];
                                    $sql_model_gray_variable = "SELECT * FROM scouring_standard
                                              WHERE pp_no_id = '$pp_no_id' AND pp_details_id = '$pp_details_id' AND active = '1' ";
                                    $res_model_gray_variable = mysqli_query($con, $sql_model_gray_variable);
                                    $row_model_gray_variable = mysqli_fetch_assoc($res_model_gray_variable);
                                ?>
                                <td><?php echo $row['gray_width'] ?></td>
                                <td>
                                  <?php 

                                    if (isset($row_model_gray_variable['absorbency_cond1'])) 
                                    {
                                        if ($row_model_gray_variable['absorbency_cond1'] == 1) 
                                        {
                                          echo "( ";
                                        }
                                        elseif ($row_model_gray_variable['absorbency_cond1'] == 2) 
                                        {
                                          echo "[ ";
                                        }
                                        else
                                        {
                                          echo "] ";
                                        }
                                        
                                        echo $row_model_gray_variable['absorbency_value1'];
                                        echo " - ";
                                        echo $row_model_gray_variable['absorbency_value2'];

                                        if ($row_model_gray_variable['absorbency_cond2'] == 1) 
                                        {
                                          echo " )";
                                        }
                                        elseif ($row_model_gray_variable['absorbency_cond2'] == 2) 
                                        {
                                          echo " ]";
                                        }
                                        else
                                        {
                                          echo " [";
                                        }
                                    }

                                    else
                                    {
                                        echo "empty";
                                    }
                                  ?>
                                </td>
                                <td>
                                  <?php

                                    if (isset($row_model_gray_variable['sizing_cond1'])) 
                                    {
                                        if ($row_model_gray_variable['sizing_cond1'] == 1) 
                                        {
                                          echo "( ";
                                        }
                                        elseif ($row_model_gray_variable['sizing_cond1'] == 2) 
                                        {
                                          echo "[ ";
                                        }
                                        else
                                        {
                                          echo "] ";
                                        }
                                        
                                        echo $row_model_gray_variable['sizing_value1'];
                                        echo " - ";
                                        echo $row_model_gray_variable['sizing_value2'];

                                        if ($row_model_gray_variable['sizing_cond2'] == 1) 
                                        {
                                          echo " )";
                                        }
                                        elseif ($row_model_gray_variable['sizing_cond2'] == 2) 
                                        {
                                          echo " ]";
                                        }
                                        else
                                        {
                                          echo " [";
                                        }
                                    }

                                    else
                                    {
                                        echo "empty";
                                    }
                                  ?>
                                </td>
                                <td>
                                  <?php 

                                    if (isset($row_model_gray_variable['pilling_cond1'])) 
                                    {
                                       if ($row_model_gray_variable['pilling_cond1'] == 1) 
                                        {
                                          echo "( ";
                                        }
                                        elseif ($row_model_gray_variable['pilling_cond1'] == 2) 
                                        {
                                          echo "[ ";
                                        }
                                        else
                                        {
                                          echo "] ";
                                        }
                                        
                                        echo $row_model_gray_variable['pilling_value1'];
                                        echo " - ";
                                        echo $row_model_gray_variable['pilling_value2'];

                                        if ($row_model_gray_variable['pilling_cond2'] == 1) 
                                        {
                                          echo " )";
                                        }
                                        elseif ($row_model_gray_variable['pilling_cond2'] == 2) 
                                        {
                                          echo " ]";
                                        }
                                        else
                                        {
                                          echo " [";
                                        } 
                                    }

                                    else
                                    {
                                        echo "empty";
                                    }
                                  ?>
                                </td>
                                <td>
                                  <?php 

                                    if (isset($row_model_gray_variable['ph_cond1'])) 
                                    {
                                        if ($row_model_gray_variable['ph_cond1'] == 1) 
                                        {
                                          echo "( ";
                                        }
                                        elseif ($row_model_gray_variable['ph_cond1'] == 2) 
                                        {
                                          echo "[ ";
                                        }
                                        else
                                        {
                                          echo "] ";
                                        }
                                        
                                        echo $row_model_gray_variable['ph_value1'];
                                        echo " - ";
                                        echo $row_model_gray_variable['ph_value2'];

                                        if ($row_model_gray_variable['ph_cond2'] == 1) 
                                        {
                                          echo " )";
                                        }
                                        elseif ($row_model_gray_variable['ph_cond2'] == 2) 
                                        {
                                          echo " ]";
                                        }
                                        else
                                        {
                                          echo " [";
                                        }
                                    }

                                    else
                                    {
                                        echo "empty";
                                    }

                                  ?>
                                </td>
                                <td>

                                  <?php 
                                      if (isset($row_model_gray_variable['absorbency_cond1'])) 
                                      {
                                        ?>
                                          <form id="copy_pp_version_details" name="copy_pp_version_details" style="display: inline-block;">
                                            <!-- data store for copy and next step -->
                                            <input type="hidden" id="pp_no_id" name="pp_no_id" value="<?php echo $pp_no_id; ?>">
                                            <input type="hidden" id="pp_version_for_this" name="pp_version_for_this" value="<?php echo $pp_version_for_this; ?>">
                                                        
                                            <input type="hidden" id="selection_of_multiple_pp_version_for_copy" name="selection_of_multiple_pp_version_for_copy" value="<?php echo $selection_of_multiple_pp_version_for_copy; ?>">

                                            <input type="hidden" id="pp_version_standard" name="pp_version_standard" value="<?php echo $pp_version_standard; ?>">
                                            <button type="button" class="btn btn-xs btn-success text-center" onclick="copy_greige_issunce_for_multiple_copy('<?php echo $row_model_gray_variable['scouring_bleaching_standard_id']; ?>');">Copy</button>
                                          </form>
                                        <?php
                                      }

                                      else
                                      {
                                          echo "";
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
                      </div>
                <?php
            }

            else if ($pp_version_standard == '12')
            {
                ?>
                    <div class="x_panel">
                        <div class="x_title">
                          <h2>PP Number : <span style="color:red;"> <?php echo $row['pp_no']; ?> </span> - Washing Standards</h2>                  <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                          <table id="datatable-buttons" class="table table-striped table-bordered">
                            <thead>
                              <tr>
                                <th>SI</th>
                                <th>Version</th>
                                <th>Color</th>
                                <th>Gray Width</th>

                                <th>Color Fastness to Rubbing Dry</th>
                                <th>Color Fastness to Rubbing Wet</th>
                                <th>Color Fastness to Dry Cleaning Color Change</th>
                                <th>Color Fastness to Dry Cleaning Staining</th>
                                <th>Color Fastness to Washing Color Change</th>
                                <th>Color Fastness to Washing Staining</th>

                                <th>Action</th>
                              </tr>
                            </thead>
                            
                            <tbody>
                              <?php 

                                $sql_version_select = "SELECT * FROM pp_details
                                        WHERE version = '$version_id';"; 
                                $res_version_select = mysqli_query($con, $sql_version_select);
                                $row_version_select = mysqli_fetch_assoc($res_version_select);
                                $pp_version_name = $row_version_select['version'];
                                $sql = "SELECT * FROM pp_details
                                          WHERE version LIKE '$pp_version_name' AND active = '1' ";
                                $res = mysqli_query($con, $sql);
                                $sl = 1;

                                while ($row = mysqli_fetch_assoc($res)) 
                                {
                              ?>
                              <tr>
                                <td><?php echo $sl; ?></td>
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
                                <?php 
                                    $pp_no_id = $row['pp_no_id'];
                                    $pp_details_id = $row['pp_id'];
                                    $sql_model_gray_variable = "SELECT * FROM washing_standard
                                              WHERE pp_no_id = '$pp_no_id' AND pp_details_id = '$pp_details_id' AND active = '1' ";
                                    $res_model_gray_variable = mysqli_query($con, $sql_model_gray_variable);
                                    $row_model_gray_variable = mysqli_fetch_assoc($res_model_gray_variable);
                                ?>
                                <td><?php echo $row['gray_width'] ?></td>

                                <td>
                                <?php 
                                  if ($row_model_gray_variable['cf_rubbing_dry_cond1'] == 1) 
                                  {
                                    echo "( ";
                                  }
                                  elseif ($row_model_gray_variable['cf_rubbing_dry_cond1'] == 2) 
                                  {
                                    echo "[ ";
                                  }
                                  else
                                  {
                                    echo "] ";
                                  }
                                  
                                  echo $row_model_gray_variable['cf_rubbing_dry_value1'];
                                  echo " - ";
                                  echo $row_model_gray_variable['cf_rubbing_dry_value2'];

                                  if ($row_model_gray_variable['cf_rubbing_dry_cond2'] == 1) 
                                  {
                                    echo " )";
                                  }
                                  elseif ($row_model_gray_variable['cf_rubbing_dry_cond2'] == 2) 
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
                                  if ($row_model_gray_variable['cf_rubbing_wet_cond1'] == 1) 
                                  {
                                    echo "( ";
                                  }
                                  elseif ($row_model_gray_variable['cf_rubbing_wet_cond1'] == 2) 
                                  {
                                    echo "[ ";
                                  }
                                  else
                                  {
                                    echo "] ";
                                  }
                                  
                                  echo $row_model_gray_variable['cf_rubbing_wet_value1'];
                                  echo " - ";
                                  echo $row_model_gray_variable['cf_rubbing_wet_value2'];

                                  if ($row_model_gray_variable['cf_rubbing_wet_cond2'] == 1) 
                                  {
                                    echo " )";
                                  }
                                  elseif ($row_model_gray_variable['cf_rubbing_wet_cond2'] == 2) 
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
                                  if ($row_model_gray_variable['cf_dry_cleaning_c_change_cond1'] == 1) 
                                  {
                                    echo "( ";
                                  }
                                  elseif ($row_model_gray_variable['cf_dry_cleaning_c_change_cond1'] == 2) 
                                  {
                                    echo "[ ";
                                  }
                                  else
                                  {
                                    echo "] ";
                                  }
                                  
                                  echo $row_model_gray_variable['cf_dry_cleaning_c_change_value1'];
                                  echo " - ";
                                  echo $row_model_gray_variable['cf_dry_cleaning_c_change_value2'];

                                  if ($row_model_gray_variable['cf_dry_cleaning_c_change_cond2'] == 1) 
                                  {
                                    echo " )";
                                  }
                                  elseif ($row_model_gray_variable['cf_dry_cleaning_c_change_cond2'] == 2) 
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
                                  if ($row_model_gray_variable['cf_dry_cleaning_staining_cond1'] == 1) 
                                  {
                                    echo "( ";
                                  }
                                  elseif ($row_model_gray_variable['cf_dry_cleaning_staining_cond1'] == 2) 
                                  {
                                    echo "[ ";
                                  }
                                  else
                                  {
                                    echo "] ";
                                  }
                                  
                                  echo $row_model_gray_variable['cf_dry_cleaning_staining_value1'];
                                  echo " - ";
                                  echo $row_model_gray_variable['cf_dry_cleaning_staining_value2'];

                                  if ($row_model_gray_variable['cf_dry_cleaning_staining_cond2'] == 1) 
                                  {
                                    echo " )";
                                  }
                                  elseif ($row_model_gray_variable['cf_dry_cleaning_staining_cond2'] == 2) 
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
                                  if ($row_model_gray_variable['cf_washing_c_change_cond1'] == 1) 
                                  {
                                    echo "( ";
                                  }
                                  elseif ($row_model_gray_variable['cf_washing_c_change_cond1'] == 2) 
                                  {
                                    echo "[ ";
                                  }
                                  else
                                  {
                                    echo "] ";
                                  }
                                  
                                  echo $row_model_gray_variable['cf_washing_c_change_value1'];
                                  echo " - ";
                                  echo $row_model_gray_variable['cf_washing_c_change_value2'];

                                  if ($row_model_gray_variable['cf_washing_c_change_cond2'] == 1) 
                                  {
                                    echo " )";
                                  }
                                  elseif ($row_model_gray_variable['cf_washing_c_change_cond2'] == 2) 
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
                                  if ($row_model_gray_variable['cf_washing_staining_cond1'] == 1) 
                                  {
                                    echo "( ";
                                  }
                                  elseif ($row_model_gray_variable['cf_washing_staining_cond1'] == 2) 
                                  {
                                    echo "[ ";
                                  }
                                  else
                                  {
                                    echo "] ";
                                  }
                                  
                                  echo $row_model_gray_variable['cf_washing_staining_value1'];
                                  echo " - ";
                                  echo $row_model_gray_variable['cf_washing_staining_value2'];

                                  if ($row_model_gray_variable['cf_washing_staining_cond2'] == 1) 
                                  {
                                    echo " )";
                                  }
                                  elseif ($row_model_gray_variable['cf_washing_staining_cond2'] == 2) 
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
                                      if (isset($row_model_gray_variable['cf_rubbing_dry_value1'])) 
                                      {
                                        ?>
                                          <form id="copy_pp_version_details" name="copy_pp_version_details" style="display: inline-block;">
                                            <!-- data store for copy and next step -->
                                            <input type="hidden" id="pp_no_id" name="pp_no_id" value="<?php echo $pp_no_id; ?>">
                                            <input type="hidden" id="pp_version_for_this" name="pp_version_for_this" value="<?php echo $pp_version_for_this; ?>">
                                                        
                                            <input type="hidden" id="selection_of_multiple_pp_version_for_copy" name="selection_of_multiple_pp_version_for_copy" value="<?php echo $selection_of_multiple_pp_version_for_copy; ?>">

                                            <input type="hidden" id="pp_version_standard" name="pp_version_standard" value="<?php echo $pp_version_standard; ?>">
                                            <button type="button" class="btn btn-xs btn-success text-center" onclick="copy_greige_issunce_for_multiple_copy('<?php echo $row_model_gray_variable['washing_standard_id']; ?>');">Copy</button>
                                          </form>
                                        <?php
                                      }

                                      else
                                      {
                                          echo "";
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
                      </div>
                <?php
            }

            else if ($pp_version_standard == '13')
            {
                ?>
                    <div class="x_panel">
                        <div class="x_title">
                          <h2>PP Number : <span style="color:red;"> <?php echo $row['pp_no']; ?> </span> - Calendering Standards</h2>                  <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                          <table id="datatable-buttons" class="table table-striped table-bordered">
                            <thead>
                              <tr>
                                <th>SI</th>
                                <th>Version</th>
                                <th>Color</th>
                                <th>Gray Width</th>

                                <th>Color Fastness to Rubbing Dry</th>
                                <th>Color Fastness to Rubbing Wet</th>
                                <th>Wash Dry Warp before Iron</th>
                                <th>Wash Dry Weft before Iron</th>
                                <th>Wash Dry Warp After Iron</th>
                                <th>Wash Dry Weft After Iron</th>
                                <th>Dry Cleaning Warp</th>
                                <th>Dry Cleaning Weft</th>
                                <th>Yarn Count Warp</th>
                                <th>Yarn Count Weft</th>

                                <th>Action</th>
                              </tr>
                            </thead>
                            
                            <tbody>
                              <?php 

                                $sql_version_select = "SELECT * FROM pp_details
                                        WHERE version = '$version_id';"; 
                                $res_version_select = mysqli_query($con, $sql_version_select);
                                $row_version_select = mysqli_fetch_assoc($res_version_select);
                                $pp_version_name = $row_version_select['version'];
                                $sql = "SELECT * FROM pp_details
                                          WHERE version LIKE '$pp_version_name' AND active = '1' ";
                                $res = mysqli_query($con, $sql);
                                $sl = 1;

                                while ($row = mysqli_fetch_assoc($res)) 
                                {
                              ?>
                              <tr>
                                <td><?php echo $sl; ?></td>
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
                                <?php 
                                    $pp_no_id = $row['pp_no_id'];
                                    $pp_details_id = $row['pp_id'];
                                    $sql_model_gray_variable = "SELECT * FROM calendering_standard
                                              WHERE pp_no_id = '$pp_no_id' AND pp_details_id = '$pp_details_id' AND active = '1' ";
                                    $res_model_gray_variable = mysqli_query($con, $sql_model_gray_variable);
                                    $row_model_gray_variable = mysqli_fetch_assoc($res_model_gray_variable);
                                ?>
                                <td><?php echo $row['gray_width'] ?></td>

                                <td>
                                  <?php 
                                    if ($row_model_gray_variable['cf_rubbing_dry_cond1'] == 1) 
                                    {
                                      echo "( ";
                                    }
                                    elseif ($row_model_gray_variable['cf_rubbing_dry_cond1'] == 2) 
                                    {
                                      echo "[ ";
                                    }
                                    else
                                    {
                                      echo "] ";
                                    }
                                    
                                    echo $row_model_gray_variable['cf_rubbing_dry_value1'];
                                    echo " - ";
                                    echo $row_model_gray_variable['cf_rubbing_dry_value2'];

                                    if ($row_model_gray_variable['cf_rubbing_dry_cond2'] == 1) 
                                    {
                                      echo " )";
                                    }
                                    elseif ($row_model_gray_variable['cf_rubbing_dry_cond2'] == 2) 
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
                                    if ($row_model_gray_variable['cf_rubbing_wet_cond1'] == 1) 
                                    {
                                      echo "( ";
                                    }
                                    elseif ($row_model_gray_variable['cf_rubbing_wet_cond1'] == 2) 
                                    {
                                      echo "[ ";
                                    }
                                    else
                                    {
                                      echo "] ";
                                    }
                                    
                                    echo $row_model_gray_variable['cf_rubbing_wet_value1'];
                                    echo " - ";
                                    echo $row_model_gray_variable['cf_rubbing_wet_value2'];

                                    if ($row_model_gray_variable['cf_rubbing_wet_cond2'] == 1) 
                                    {
                                      echo " )";
                                    }
                                    elseif ($row_model_gray_variable['cf_rubbing_wet_cond2'] == 2) 
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
                                    if ($row_model_gray_variable['wash_dry_warp_before_iron_cond1'] == 1) 
                                    {
                                      echo "( ";
                                    }
                                    elseif ($row_model_gray_variable['wash_dry_warp_before_iron_cond1'] == 2) 
                                    {
                                      echo "[ ";
                                    }
                                    else
                                    {
                                      echo "] ";
                                    }
                                    
                                    echo $row_model_gray_variable['wash_dry_warp_before_iron_value1'];
                                    echo " - ";
                                    echo $row_model_gray_variable['wash_dry_warp_before_iron_value2'];

                                    if ($row_model_gray_variable['wash_dry_warp_before_iron_cond2'] == 1) 
                                    {
                                      echo " )";
                                    }
                                    elseif ($row_model_gray_variable['wash_dry_warp_before_iron_cond2'] == 2) 
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
                                    if ($row_model_gray_variable['wash_dry_weft_before_iron_cond1'] == 1) 
                                    {
                                      echo "( ";
                                    }
                                    elseif ($row_model_gray_variable['wash_dry_weft_before_iron_cond1'] == 2) 
                                    {
                                      echo "[ ";
                                    }
                                    else
                                    {
                                      echo "] ";
                                    }
                                    
                                    echo $row_model_gray_variable['wash_dry_weft_before_iron_value1'];
                                    echo " - ";
                                    echo $row_model_gray_variable['wash_dry_weft_before_iron_value2'];

                                    if ($row_model_gray_variable['wash_dry_weft_before_iron_cond2'] == 1) 
                                    {
                                      echo " )";
                                    }
                                    elseif ($row_model_gray_variable['wash_dry_weft_before_iron_cond2'] == 2) 
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
                                    if ($row_model_gray_variable['wash_dry_warp_after_iron_cond1'] == 1) 
                                    {
                                      echo "( ";
                                    }
                                    elseif ($row_model_gray_variable['wash_dry_warp_after_iron_cond1'] == 2) 
                                    {
                                      echo "[ ";
                                    }
                                    else
                                    {
                                      echo "] ";
                                    }
                                    
                                    echo $row_model_gray_variable['wash_dry_warp_after_iron_value1'];
                                    echo " - ";
                                    echo $row_model_gray_variable['wash_dry_warp_after_iron_value2'];

                                    if ($row_model_gray_variable['wash_dry_warp_after_iron_cond2'] == 1) 
                                    {
                                      echo " )";
                                    }
                                    elseif ($row_model_gray_variable['wash_dry_warp_after_iron_cond2'] == 2) 
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
                                    if ($row_model_gray_variable['wash_dry_weft_after_iron_cond1'] == 1) 
                                    {
                                      echo "( ";
                                    }
                                    elseif ($row_model_gray_variable['wash_dry_weft_after_iron_cond1'] == 2) 
                                    {
                                      echo "[ ";
                                    }
                                    else
                                    {
                                      echo "] ";
                                    }
                                    
                                    echo $row_model_gray_variable['wash_dry_weft_after_iron_value1'];
                                    echo " - ";
                                    echo $row_model_gray_variable['wash_dry_weft_after_iron_value2'];

                                    if ($row_model_gray_variable['wash_dry_weft_after_iron_cond2'] == 1) 
                                    {
                                      echo " )";
                                    }
                                    elseif ($row_model_gray_variable['wash_dry_weft_after_iron_cond2'] == 2) 
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
                                    if ($row_model_gray_variable['dry_cleaning_warp_cond1'] == 1) 
                                    {
                                      echo "( ";
                                    }
                                    elseif ($row_model_gray_variable['dry_cleaning_warp_cond1'] == 2) 
                                    {
                                      echo "[ ";
                                    }
                                    else
                                    {
                                      echo "] ";
                                    }
                                    
                                    echo $row_model_gray_variable['dry_cleaning_warp_value1'];
                                    echo " - ";
                                    echo $row_model_gray_variable['dry_cleaning_warp_value2'];

                                    if ($row_model_gray_variable['dry_cleaning_warp_cond2'] == 1) 
                                    {
                                      echo " )";
                                    }
                                    elseif ($row_model_gray_variable['dry_cleaning_warp_cond2'] == 2) 
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
                                    if ($row_model_gray_variable['dry_cleaning_weft_cond1'] == 1) 
                                    {
                                      echo "( ";
                                    }
                                    elseif ($row_model_gray_variable['dry_cleaning_weft_cond1'] == 2) 
                                    {
                                      echo "[ ";
                                    }
                                    else
                                    {
                                      echo "] ";
                                    }
                                    
                                    echo $row_model_gray_variable['dry_cleaning_weft_value1'];
                                    echo " - ";
                                    echo $row_model_gray_variable['dry_cleaning_weft_value2'];

                                    if ($row_model_gray_variable['dry_cleaning_weft_cond2'] == 1) 
                                    {
                                      echo " )";
                                    }
                                    elseif ($row_model_gray_variable['dry_cleaning_weft_cond2'] == 2) 
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
                                    if ($row_model_gray_variable['yarn_count_warp_cond1'] == 1) 
                                    {
                                      echo "( ";
                                    }
                                    elseif ($row_model_gray_variable['yarn_count_warp_cond1'] == 2) 
                                    {
                                      echo "[ ";
                                    }
                                    else
                                    {
                                      echo "] ";
                                    }
                                    
                                    echo $row_model_gray_variable['yarn_count_warp_value1'];
                                    echo " - ";
                                    echo $row_model_gray_variable['yarn_count_warp_value2'];

                                    if ($row_model_gray_variable['yarn_count_warp_cond2'] == 1) 
                                    {
                                      echo " )";
                                    }
                                    elseif ($row_model_gray_variable['yarn_count_warp_cond2'] == 2) 
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
                                    if ($row_model_gray_variable['yarn_count_weft_cond1'] == 1) 
                                    {
                                      echo "( ";
                                    }
                                    elseif ($row_model_gray_variable['yarn_count_weft_cond1'] == 2) 
                                    {
                                      echo "[ ";
                                    }
                                    else
                                    {
                                      echo "] ";
                                    }
                                    
                                    echo $row_model_gray_variable['yarn_count_weft_value1'];
                                    echo " - ";
                                    echo $row_model_gray_variable['yarn_count_weft_value2'];

                                    if ($row_model_gray_variable['yarn_count_weft_cond2'] == 1) 
                                    {
                                      echo " )";
                                    }
                                    elseif ($row_model_gray_variable['yarn_count_weft_cond2'] == 2) 
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
                                      if (isset($row_model_gray_variable['cf_rubbing_dry_value1'])) 
                                      {
                                        ?>
                                          <form id="copy_pp_version_details" name="copy_pp_version_details" style="display: inline-block;">
                                            <!-- data store for copy and next step -->
                                            <input type="hidden" id="pp_no_id" name="pp_no_id" value="<?php echo $pp_no_id; ?>">
                                            <input type="hidden" id="pp_version_for_this" name="pp_version_for_this" value="<?php echo $pp_version_for_this; ?>">
                                                        
                                            <input type="hidden" id="selection_of_multiple_pp_version_for_copy" name="selection_of_multiple_pp_version_for_copy" value="<?php echo $selection_of_multiple_pp_version_for_copy; ?>">

                                            <input type="hidden" id="pp_version_standard" name="pp_version_standard" value="<?php echo $pp_version_standard; ?>">
                                            <button type="button" class="btn btn-xs btn-success text-center" onclick="copy_greige_issunce_for_multiple_copy('<?php echo $row_model_gray_variable['calendering_standard_id']; ?>');">Copy</button>
                                          </form>
                                        <?php
                                      }

                                      else
                                      {
                                          echo "";
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
                      </div>
                <?php
            }

            else if ($pp_version_standard == '14')
            {
                ?>
                    <div class="x_panel">
                        <div class="x_title">
                          <h2>PP Number : <span style="color:red;"> <?php echo $row['pp_no']; ?> </span> - Sanforizing Standards</h2>                  <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                          <table id="datatable-buttons" class="table table-striped table-bordered">
                            <thead>
                              <tr>
                                <th>SI</th>
                                <th>Version</th>
                                <th>Color</th>
                                <th>Gray Width</th>

                                <th>Color Fastness to Rubbing Dry</th>
                                <th>Color Fastness to Rubbing Wet</th>
                                <th>Wash Dry Warp before Iron</th>
                                <th>Wash Dry Weft before Iron</th>
                                <th>Wash Dry Warp After Iron</th>
                                <th>Wash Dry Weft After Iron</th>
                                <th>Dry Cleaning Warp</th>
                                <th>Dry Cleaning Weft</th>
                                <th>Yarn Count Warp</th>
                                <th>Yarn Count Weft</th>

                                <th>Action</th>
                              </tr>
                            </thead>
                            
                            <tbody>
                              <?php 

                                $sql_version_select = "SELECT * FROM pp_details
                                        WHERE version = '$version_id';"; 
                                $res_version_select = mysqli_query($con, $sql_version_select);
                                $row_version_select = mysqli_fetch_assoc($res_version_select);
                                $pp_version_name = $row_version_select['version'];
                                $sql = "SELECT * FROM pp_details
                                          WHERE version LIKE '$pp_version_name' AND active = '1' ";
                                $res = mysqli_query($con, $sql);
                                $sl = 1;

                                while ($row = mysqli_fetch_assoc($res)) 
                                {
                              ?>
                              <tr>
                                <td><?php echo $sl; ?></td>
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
                                <?php 
                                    $pp_no_id = $row['pp_no_id'];
                                    $pp_details_id = $row['pp_id'];
                                    $sql_model_gray_variable = "SELECT * FROM sanforizing_standard
                                              WHERE pp_no_id = '$pp_no_id' AND pp_details_id = '$pp_details_id' AND active = '1' ";
                                    $res_model_gray_variable = mysqli_query($con, $sql_model_gray_variable);
                                    $row_model_gray_variable = mysqli_fetch_assoc($res_model_gray_variable);
                                ?>
                                <td><?php echo $row['gray_width'] ?></td>

                                <td>
                                  <?php 
                                    if ($row_model_gray_variable['cf_rubbing_dry_cond1'] == 1) 
                                    {
                                      echo "( ";
                                    }
                                    elseif ($row_model_gray_variable['cf_rubbing_dry_cond1'] == 2) 
                                    {
                                      echo "[ ";
                                    }
                                    else
                                    {
                                      echo "] ";
                                    }
                                    
                                    echo $row_model_gray_variable['cf_rubbing_dry_value1'];
                                    echo " - ";
                                    echo $row_model_gray_variable['cf_rubbing_dry_value2'];

                                    if ($row_model_gray_variable['cf_rubbing_dry_cond2'] == 1) 
                                    {
                                      echo " )";
                                    }
                                    elseif ($row_model_gray_variable['cf_rubbing_dry_cond2'] == 2) 
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
                                    if ($row_model_gray_variable['cf_rubbing_wet_cond1'] == 1) 
                                    {
                                      echo "( ";
                                    }
                                    elseif ($row_model_gray_variable['cf_rubbing_wet_cond1'] == 2) 
                                    {
                                      echo "[ ";
                                    }
                                    else
                                    {
                                      echo "] ";
                                    }
                                    
                                    echo $row_model_gray_variable['cf_rubbing_wet_value1'];
                                    echo " - ";
                                    echo $row_model_gray_variable['cf_rubbing_wet_value2'];

                                    if ($row_model_gray_variable['cf_rubbing_wet_cond2'] == 1) 
                                    {
                                      echo " )";
                                    }
                                    elseif ($row_model_gray_variable['cf_rubbing_wet_cond2'] == 2) 
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
                                    if ($row_model_gray_variable['wash_dry_warp_before_iron_cond1'] == 1) 
                                    {
                                      echo "( ";
                                    }
                                    elseif ($row_model_gray_variable['wash_dry_warp_before_iron_cond1'] == 2) 
                                    {
                                      echo "[ ";
                                    }
                                    else
                                    {
                                      echo "] ";
                                    }
                                    
                                    echo $row_model_gray_variable['wash_dry_warp_before_iron_value1'];
                                    echo " - ";
                                    echo $row_model_gray_variable['wash_dry_warp_before_iron_value2'];

                                    if ($row_model_gray_variable['wash_dry_warp_before_iron_cond2'] == 1) 
                                    {
                                      echo " )";
                                    }
                                    elseif ($row_model_gray_variable['wash_dry_warp_before_iron_cond2'] == 2) 
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
                                    if ($row_model_gray_variable['wash_dry_weft_before_iron_cond1'] == 1) 
                                    {
                                      echo "( ";
                                    }
                                    elseif ($row_model_gray_variable['wash_dry_weft_before_iron_cond1'] == 2) 
                                    {
                                      echo "[ ";
                                    }
                                    else
                                    {
                                      echo "] ";
                                    }
                                    
                                    echo $row_model_gray_variable['wash_dry_weft_before_iron_value1'];
                                    echo " - ";
                                    echo $row_model_gray_variable['wash_dry_weft_before_iron_value2'];

                                    if ($row_model_gray_variable['wash_dry_weft_before_iron_cond2'] == 1) 
                                    {
                                      echo " )";
                                    }
                                    elseif ($row_model_gray_variable['wash_dry_weft_before_iron_cond2'] == 2) 
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
                                    if ($row_model_gray_variable['wash_dry_warp_after_iron_cond1'] == 1) 
                                    {
                                      echo "( ";
                                    }
                                    elseif ($row_model_gray_variable['wash_dry_warp_after_iron_cond1'] == 2) 
                                    {
                                      echo "[ ";
                                    }
                                    else
                                    {
                                      echo "] ";
                                    }
                                    
                                    echo $row_model_gray_variable['wash_dry_warp_after_iron_value1'];
                                    echo " - ";
                                    echo $row_model_gray_variable['wash_dry_warp_after_iron_value2'];

                                    if ($row_model_gray_variable['wash_dry_warp_after_iron_cond2'] == 1) 
                                    {
                                      echo " )";
                                    }
                                    elseif ($row_model_gray_variable['wash_dry_warp_after_iron_cond2'] == 2) 
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
                                    if ($row_model_gray_variable['wash_dry_weft_after_iron_cond1'] == 1) 
                                    {
                                      echo "( ";
                                    }
                                    elseif ($row_model_gray_variable['wash_dry_weft_after_iron_cond1'] == 2) 
                                    {
                                      echo "[ ";
                                    }
                                    else
                                    {
                                      echo "] ";
                                    }
                                    
                                    echo $row_model_gray_variable['wash_dry_weft_after_iron_value1'];
                                    echo " - ";
                                    echo $row_model_gray_variable['wash_dry_weft_after_iron_value2'];

                                    if ($row_model_gray_variable['wash_dry_weft_after_iron_cond2'] == 1) 
                                    {
                                      echo " )";
                                    }
                                    elseif ($row_model_gray_variable['wash_dry_weft_after_iron_cond2'] == 2) 
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
                                    if ($row_model_gray_variable['dry_cleaning_warp_cond1'] == 1) 
                                    {
                                      echo "( ";
                                    }
                                    elseif ($row_model_gray_variable['dry_cleaning_warp_cond1'] == 2) 
                                    {
                                      echo "[ ";
                                    }
                                    else
                                    {
                                      echo "] ";
                                    }
                                    
                                    echo $row_model_gray_variable['dry_cleaning_warp_value1'];
                                    echo " - ";
                                    echo $row_model_gray_variable['dry_cleaning_warp_value2'];

                                    if ($row_model_gray_variable['dry_cleaning_warp_cond2'] == 1) 
                                    {
                                      echo " )";
                                    }
                                    elseif ($row_model_gray_variable['dry_cleaning_warp_cond2'] == 2) 
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
                                    if ($row_model_gray_variable['dry_cleaning_weft_cond1'] == 1) 
                                    {
                                      echo "( ";
                                    }
                                    elseif ($row_model_gray_variable['dry_cleaning_weft_cond1'] == 2) 
                                    {
                                      echo "[ ";
                                    }
                                    else
                                    {
                                      echo "] ";
                                    }
                                    
                                    echo $row_model_gray_variable['dry_cleaning_weft_value1'];
                                    echo " - ";
                                    echo $row_model_gray_variable['dry_cleaning_weft_value2'];

                                    if ($row_model_gray_variable['dry_cleaning_weft_cond2'] == 1) 
                                    {
                                      echo " )";
                                    }
                                    elseif ($row_model_gray_variable['dry_cleaning_weft_cond2'] == 2) 
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
                                    if ($row_model_gray_variable['yarn_count_warp_cond1'] == 1) 
                                    {
                                      echo "( ";
                                    }
                                    elseif ($row_model_gray_variable['yarn_count_warp_cond1'] == 2) 
                                    {
                                      echo "[ ";
                                    }
                                    else
                                    {
                                      echo "] ";
                                    }
                                    
                                    echo $row_model_gray_variable['yarn_count_warp_value1'];
                                    echo " - ";
                                    echo $row_model_gray_variable['yarn_count_warp_value2'];

                                    if ($row_model_gray_variable['yarn_count_warp_cond2'] == 1) 
                                    {
                                      echo " )";
                                    }
                                    elseif ($row_model_gray_variable['yarn_count_warp_cond2'] == 2) 
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
                                    if ($row_model_gray_variable['yarn_count_weft_cond1'] == 1) 
                                    {
                                      echo "( ";
                                    }
                                    elseif ($row_model_gray_variable['yarn_count_weft_cond1'] == 2) 
                                    {
                                      echo "[ ";
                                    }
                                    else
                                    {
                                      echo "] ";
                                    }
                                    
                                    echo $row_model_gray_variable['yarn_count_weft_value1'];
                                    echo " - ";
                                    echo $row_model_gray_variable['yarn_count_weft_value2'];

                                    if ($row_model_gray_variable['yarn_count_weft_cond2'] == 1) 
                                    {
                                      echo " )";
                                    }
                                    elseif ($row_model_gray_variable['yarn_count_weft_cond2'] == 2) 
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
                                      if (isset($row_model_gray_variable['cf_rubbing_dry_value1'])) 
                                      {
                                        ?>
                                          <form id="copy_pp_version_details" name="copy_pp_version_details" style="display: inline-block;">
                                            <!-- data store for copy and next step -->
                                            <input type="hidden" id="pp_no_id" name="pp_no_id" value="<?php echo $pp_no_id; ?>">
                                            <input type="hidden" id="pp_version_for_this" name="pp_version_for_this" value="<?php echo $pp_version_for_this; ?>">
                                                        
                                            <input type="hidden" id="selection_of_multiple_pp_version_for_copy" name="selection_of_multiple_pp_version_for_copy" value="<?php echo $selection_of_multiple_pp_version_for_copy; ?>">

                                            <input type="hidden" id="pp_version_standard" name="pp_version_standard" value="<?php echo $pp_version_standard; ?>">
                                            <button type="button" class="btn btn-xs btn-success text-center" onclick="copy_greige_issunce_for_multiple_copy('<?php echo $row_model_gray_variable['sanforizing_standard_id']; ?>');">Copy</button>
                                          </form>
                                        <?php
                                      }

                                      else
                                      {
                                          echo "";
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
                      </div>
                <?php
            }

            else if ($pp_version_standard == '15')
            {
                ?>
                    <div class="x_panel">
                        <div class="x_title">
                          <h2>PP Number : <span style="color:red;"> <?php echo $row['pp_no']; ?> </span> - Raising Standards</h2>                  <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                          <table id="datatable-buttons" class="table table-striped table-bordered">
                            <thead>
                              <tr>
                                <th>SI</th>
                                <th>Version</th>
                                <th>Color</th>
                                <th>Gray Width</th>

                                <th>tensile warp</th>
                                <th>tensile weft</th>
                                <th>tear warp</th>
                                <th>tear weft</th>

                                <th>Action</th>
                              </tr>
                            </thead>
                            
                            <tbody>
                              <?php 

                                $sql_version_select = "SELECT * FROM pp_details
                                        WHERE version = '$version_id';"; 
                                $res_version_select = mysqli_query($con, $sql_version_select);
                                $row_version_select = mysqli_fetch_assoc($res_version_select);
                                $pp_version_name = $row_version_select['version'];
                                $sql = "SELECT * FROM pp_details
                                          WHERE version LIKE '$pp_version_name' AND active = '1' ";
                                $res = mysqli_query($con, $sql);
                                $sl = 1;

                                while ($row = mysqli_fetch_assoc($res)) 
                                {
                              ?>
                              <tr>
                                <td><?php echo $sl; ?></td>
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
                                <?php 
                                    $pp_no_id = $row['pp_no_id'];
                                    $pp_details_id = $row['pp_id'];
                                    $sql_model_gray_variable = "SELECT * FROM raising_standard
                                              WHERE pp_no_id = '$pp_no_id' AND pp_details_id = '$pp_details_id' AND active = '1' ";
                                    $res_model_gray_variable = mysqli_query($con, $sql_model_gray_variable);
                                    $row_model_gray_variable = mysqli_fetch_assoc($res_model_gray_variable);
                                ?>
                                <td><?php echo $row['gray_width'] ?></td>

                                <td>
                                    <?php 
                                      if ($row_model_gray_variable['tensile_warp_cond1'] == 1) 
                                      {
                                        echo "( ";
                                      }
                                      elseif ($row_model_gray_variable['tensile_warp_cond1'] == 2) 
                                      {
                                        echo "[ ";
                                      }
                                      else
                                      {
                                        echo "] ";
                                      }
                                      
                                      echo $row_model_gray_variable['tensile_warp_value1'];
                                      echo " - ";
                                      echo $row_model_gray_variable['tensile_warp_value2'];

                                      if ($row_model_gray_variable['tensile_warp_cond2'] == 1) 
                                      {
                                        echo " )";
                                      }
                                      elseif ($row_model_gray_variable['tensile_warp_cond2'] == 2) 
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
                                      if ($row_model_gray_variable['tensile_weft_cond1'] == 1) 
                                      {
                                        echo "( ";
                                      }
                                      elseif ($row_model_gray_variable['tensile_weft_cond1'] == 2) 
                                      {
                                        echo "[ ";
                                      }
                                      else
                                      {
                                        echo "] ";
                                      }
                                      
                                      echo $row_model_gray_variable['tensile_weft_value1'];
                                      echo " - ";
                                      echo $row_model_gray_variable['tensile_weft_value2'];

                                      if ($row_model_gray_variable['tensile_weft_cond2'] == 1) 
                                      {
                                        echo " )";
                                      }
                                      elseif ($row_model_gray_variable['tensile_weft_cond2'] == 2) 
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
                                      if ($row_model_gray_variable['tear_force_warp_cond1'] == 1) 
                                      {
                                        echo "( ";
                                      }
                                      elseif ($row_model_gray_variable['tear_force_warp_cond1'] == 2) 
                                      {
                                        echo "[ ";
                                      }
                                      else
                                      {
                                        echo "] ";
                                      }
                                      
                                      echo $row_model_gray_variable['tear_force_warp_value1'];
                                      echo " - ";
                                      echo $row_model_gray_variable['tear_force_warp_value2'];

                                      if ($row_model_gray_variable['tear_force_warp_cond2'] == 1) 
                                      {
                                        echo " )";
                                      }
                                      elseif ($row_model_gray_variable['tear_force_warp_cond2'] == 2) 
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
                                      if ($row_model_gray_variable['tear_force_weft_cond1'] == 1) 
                                      {
                                        echo "( ";
                                      }
                                      elseif ($row_model_gray_variable['tear_force_weft_cond1'] == 2) 
                                      {
                                        echo "[ ";
                                      }
                                      else
                                      {
                                        echo "] ";
                                      }
                                      
                                      echo $row_model_gray_variable['tear_force_weft_value1'];
                                      echo " - ";
                                      echo $row_model_gray_variable['tear_force_weft_value2'];

                                      if ($row_model_gray_variable['tear_force_weft_cond2'] == 1) 
                                      {
                                        echo " )";
                                      }
                                      elseif ($row_model_gray_variable['tear_force_weft_cond2'] == 2) 
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
                                      if (isset($row_model_gray_variable['tensile_warp_value1'])) 
                                      {
                                        ?>
                                          <form id="copy_pp_version_details" name="copy_pp_version_details" style="display: inline-block;">
                                            <!-- data store for copy and next step -->
                                            <input type="hidden" id="pp_no_id" name="pp_no_id" value="<?php echo $pp_no_id; ?>">
                                            <input type="hidden" id="pp_version_for_this" name="pp_version_for_this" value="<?php echo $pp_version_for_this; ?>">
                                                        
                                            <input type="hidden" id="selection_of_multiple_pp_version_for_copy" name="selection_of_multiple_pp_version_for_copy" value="<?php echo $selection_of_multiple_pp_version_for_copy; ?>">

                                            <input type="hidden" id="pp_version_standard" name="pp_version_standard" value="<?php echo $pp_version_standard; ?>">
                                            <button type="button" class="btn btn-xs btn-success text-center" onclick="copy_greige_issunce_for_multiple_copy('<?php echo $row_model_gray_variable['raising_standard_id']; ?>');">Copy</button>
                                          </form>
                                        <?php
                                      }

                                      else
                                      {
                                          echo "";
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
                      </div>
                <?php
            }

            else if ($pp_version_standard == '16')
            {
                ?>
                    <div class="x_panel">
                        <div class="x_title">
                          <h2>PP Number : <span style="color:red;"> <?php echo $row['pp_no']; ?> </span> - Ready for Raising Standards</h2>                  <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                          <table id="datatable-buttons" class="table table-striped table-bordered">
                            <thead>
                              <tr>
                                <th>SI</th>
                                <th>Version</th>
                                <th>Color</th>
                                <th>Gray Width</th>

                                <th>tensile warp</th>
                                <th>tensile weft</th>
                                <th>tear warp</th>
                                <th>tear weft</th>

                                <th>Action</th>
                              </tr>
                            </thead>
                            
                            <tbody>
                              <?php 

                                $sql_version_select = "SELECT * FROM pp_details
                                        WHERE version = '$version_id';"; 
                                $res_version_select = mysqli_query($con, $sql_version_select);
                                $row_version_select = mysqli_fetch_assoc($res_version_select);
                                $pp_version_name = $row_version_select['version'];
                                $sql = "SELECT * FROM pp_details
                                          WHERE version LIKE '$pp_version_name' AND active = '1' ";
                                $res = mysqli_query($con, $sql);
                                $sl = 1;

                                while ($row = mysqli_fetch_assoc($res)) 
                                {
                              ?>
                              <tr>
                                <td><?php echo $sl; ?></td>
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
                                <?php 
                                    $pp_no_id = $row['pp_no_id'];
                                    $pp_details_id = $row['pp_id'];
                                    $sql_model_gray_variable = "SELECT * FROM ready_for_raising_standard
                                              WHERE pp_no_id = '$pp_no_id' AND pp_details_id = '$pp_details_id' AND active = '1' ";
                                    $res_model_gray_variable = mysqli_query($con, $sql_model_gray_variable);
                                    $row_model_gray_variable = mysqli_fetch_assoc($res_model_gray_variable);
                                ?>
                                <td><?php echo $row['gray_width'] ?></td>

                                <td>
                                    <?php 
                                      if ($row_model_gray_variable['tensile_warp_cond1'] == 1) 
                                      {
                                        echo "( ";
                                      }
                                      elseif ($row_model_gray_variable['tensile_warp_cond1'] == 2) 
                                      {
                                        echo "[ ";
                                      }
                                      else
                                      {
                                        echo "] ";
                                      }
                                      
                                      echo $row_model_gray_variable['tensile_warp_value1'];
                                      echo " - ";
                                      echo $row_model_gray_variable['tensile_warp_value2'];

                                      if ($row_model_gray_variable['tensile_warp_cond2'] == 1) 
                                      {
                                        echo " )";
                                      }
                                      elseif ($row_model_gray_variable['tensile_warp_cond2'] == 2) 
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
                                      if ($row_model_gray_variable['tensile_weft_cond1'] == 1) 
                                      {
                                        echo "( ";
                                      }
                                      elseif ($row_model_gray_variable['tensile_weft_cond1'] == 2) 
                                      {
                                        echo "[ ";
                                      }
                                      else
                                      {
                                        echo "] ";
                                      }
                                      
                                      echo $row_model_gray_variable['tensile_weft_value1'];
                                      echo " - ";
                                      echo $row_model_gray_variable['tensile_weft_value2'];

                                      if ($row_model_gray_variable['tensile_weft_cond2'] == 1) 
                                      {
                                        echo " )";
                                      }
                                      elseif ($row_model_gray_variable['tensile_weft_cond2'] == 2) 
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
                                      if ($row_model_gray_variable['tear_force_warp_cond1'] == 1) 
                                      {
                                        echo "( ";
                                      }
                                      elseif ($row_model_gray_variable['tear_force_warp_cond1'] == 2) 
                                      {
                                        echo "[ ";
                                      }
                                      else
                                      {
                                        echo "] ";
                                      }
                                      
                                      echo $row_model_gray_variable['tear_force_warp_value1'];
                                      echo " - ";
                                      echo $row_model_gray_variable['tear_force_warp_value2'];

                                      if ($row_model_gray_variable['tear_force_warp_cond2'] == 1) 
                                      {
                                        echo " )";
                                      }
                                      elseif ($row_model_gray_variable['tear_force_warp_cond2'] == 2) 
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
                                      if ($row_model_gray_variable['tear_force_weft_cond1'] == 1) 
                                      {
                                        echo "( ";
                                      }
                                      elseif ($row_model_gray_variable['tear_force_weft_cond1'] == 2) 
                                      {
                                        echo "[ ";
                                      }
                                      else
                                      {
                                        echo "] ";
                                      }
                                      
                                      echo $row_model_gray_variable['tear_force_weft_value1'];
                                      echo " - ";
                                      echo $row_model_gray_variable['tear_force_weft_value2'];

                                      if ($row_model_gray_variable['tear_force_weft_cond2'] == 1) 
                                      {
                                        echo " )";
                                      }
                                      elseif ($row_model_gray_variable['tear_force_weft_cond2'] == 2) 
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
                                      if (isset($row_model_gray_variable['tear_force_weft_value1'])) 
                                      {
                                        ?>
                                          <form id="copy_pp_version_details" name="copy_pp_version_details" style="display: inline-block;">
                                            <!-- data store for copy and next step -->
                                            <input type="hidden" id="pp_no_id" name="pp_no_id" value="<?php echo $pp_no_id; ?>">
                                            <input type="hidden" id="pp_version_for_this" name="pp_version_for_this" value="<?php echo $pp_version_for_this; ?>">
                                                        
                                            <input type="hidden" id="selection_of_multiple_pp_version_for_copy" name="selection_of_multiple_pp_version_for_copy" value="<?php echo $selection_of_multiple_pp_version_for_copy; ?>">

                                            <input type="hidden" id="pp_version_standard" name="pp_version_standard" value="<?php echo $pp_version_standard; ?>">
                                            <button type="button" class="btn btn-xs btn-success text-center" onclick="copy_greige_issunce_for_multiple_copy('<?php echo $row_model_gray_variable['ready_for_raising_standard_id']; ?>');">Copy</button>
                                          </form>
                                        <?php
                                      }

                                      else
                                      {
                                          echo "";
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
                      </div>
                <?php
            }

            else if ($pp_version_standard == '17')
            {
                ?>
                    <div class="x_panel">
                        <div class="x_title">
                          <h2>PP Number : <span style="color:red;"> <?php echo $row['pp_no']; ?> </span> - Ready for Print Standards</h2>                  <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                          <table id="datatable-buttons" class="table table-striped table-bordered">
                            <thead>
                              <tr>
                                <th>SI</th>
                                <th>Version</th>
                                <th>Color</th>
                                <th>Gray Width</th>

                                <th>Whiteness (Barger)</th>
                                <th>Pilling</th>
                                <th>pH</th>

                                <th>Action</th>
                              </tr>
                            </thead>
                            
                            <tbody>
                              <?php 

                                $sql_version_select = "SELECT * FROM pp_details
                                        WHERE version = '$version_id';"; 
                                $res_version_select = mysqli_query($con, $sql_version_select);
                                $row_version_select = mysqli_fetch_assoc($res_version_select);
                                $pp_version_name = $row_version_select['version'];
                                $sql = "SELECT * FROM pp_details
                                          WHERE version LIKE '$pp_version_name' AND active = '1' ";
                                $res = mysqli_query($con, $sql);
                                $sl = 1;

                                while ($row = mysqli_fetch_assoc($res)) 
                                {
                              ?>
                              <tr>
                                <td><?php echo $sl; ?></td>
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
                                <?php 
                                    $pp_no_id = $row['pp_no_id'];
                                    $pp_details_id = $row['pp_id'];
                                    $sql_model_gray_variable = "SELECT * FROM ready_for_print_standard
                                              WHERE pp_no_id = '$pp_no_id' AND pp_details_id = '$pp_details_id' AND active = '1' ";
                                    $res_model_gray_variable = mysqli_query($con, $sql_model_gray_variable);
                                    $row_model_gray_variable = mysqli_fetch_assoc($res_model_gray_variable);
                                ?>
                                <td><?php echo $row['gray_width'] ?></td>

                                <td>
                                    <?php 
                                      if ($row_model_gray_variable['whiteness_cond1'] == 1) 
                                      {
                                        echo "( ";
                                      }
                                      elseif ($row_model_gray_variable['whiteness_cond1'] == 2) 
                                      {
                                        echo "[ ";
                                      }
                                      else
                                      {
                                        echo "] ";
                                      }
                                      
                                      echo $row_model_gray_variable['whiteness_value1'];
                                      echo " - ";
                                      echo $row_model_gray_variable['whiteness_value2'];

                                      if ($row_model_gray_variable['whiteness_cond2'] == 1) 
                                      {
                                        echo " )";
                                      }
                                      elseif ($row_model_gray_variable['whiteness_cond2'] == 2) 
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
                                      if ($row_model_gray_variable['bowing_and_skew_cond1'] == 1) 
                                      {
                                        echo "( ";
                                      }
                                      elseif ($row_model_gray_variable['bowing_and_skew_cond1'] == 2) 
                                      {
                                        echo "[ ";
                                      }
                                      else
                                      {
                                        echo "] ";
                                      }
                                      
                                      echo $row_model_gray_variable['bowing_and_skew_value1'];
                                      echo " - ";
                                      echo $row_model_gray_variable['bowing_and_skew_value2'];

                                      if ($row_model_gray_variable['bowing_and_skew_cond2'] == 1) 
                                      {
                                        echo " )";
                                      }
                                      elseif ($row_model_gray_variable['bowing_and_skew_cond2'] == 2) 
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
                                      if ($row_model_gray_variable['ph_cond1'] == 1) 
                                      {
                                        echo "( ";
                                      }
                                      elseif ($row_model_gray_variable['ph_cond1'] == 2) 
                                      {
                                        echo "[ ";
                                      }
                                      else
                                      {
                                        echo "] ";
                                      }
                                      
                                      echo $row_model_gray_variable['ph_value1'];
                                      echo " - ";
                                      echo $row_model_gray_variable['ph_value2'];

                                      if ($row_model_gray_variable['ph_cond2'] == 1) 
                                      {
                                        echo " )";
                                      }
                                      elseif ($row_model_gray_variable['ph_cond2'] == 2) 
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
                                      if (isset($row_model_gray_variable['ph_value1'])) 
                                      {
                                        ?>
                                          <form id="copy_pp_version_details" name="copy_pp_version_details" style="display: inline-block;">
                                            <!-- data store for copy and next step -->
                                            <input type="hidden" id="pp_no_id" name="pp_no_id" value="<?php echo $pp_no_id; ?>">
                                            <input type="hidden" id="pp_version_for_this" name="pp_version_for_this" value="<?php echo $pp_version_for_this; ?>">
                                                        
                                            <input type="hidden" id="selection_of_multiple_pp_version_for_copy" name="selection_of_multiple_pp_version_for_copy" value="<?php echo $selection_of_multiple_pp_version_for_copy; ?>">

                                            <input type="hidden" id="pp_version_standard" name="pp_version_standard" value="<?php echo $pp_version_standard; ?>">
                                            <button type="button" class="btn btn-xs btn-success text-center" onclick="copy_greige_issunce_for_multiple_copy('<?php echo $row_model_gray_variable['ready_for_print_standard_id']; ?>');">Copy</button>
                                          </form>
                                        <?php
                                      }

                                      else
                                      {
                                          echo "";
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
                      </div>
                <?php
            }


            else if ($pp_version_standard == '18')
            {
                ?>
                    <div class="x_panel">
                        <div class="x_title">
                          <h2>PP Number : <span style="color:red;"> <?php echo $row['pp_no']; ?> </span> - Ready for Dying Standards</h2>                  <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                          <table id="datatable-buttons" class="table table-striped table-bordered">
                            <thead>
                              <tr>
                                <th>SI</th>
                                <th>Version</th>
                                <th>Color</th>
                                <th>Gray Width</th>

                                <th>Whiteness (Barger)</th>
                                <th>Pilling</th>
                                <th>pH</th>

                                <th>Action</th>
                              </tr>
                            </thead>
                            
                            <tbody>
                              <?php 

                                $sql_version_select = "SELECT * FROM pp_details
                                        WHERE version = '$version_id';"; 
                                $res_version_select = mysqli_query($con, $sql_version_select);
                                $row_version_select = mysqli_fetch_assoc($res_version_select);
                                $pp_version_name = $row_version_select['version'];
                                $sql = "SELECT * FROM pp_details
                                          WHERE version LIKE '$pp_version_name' AND active = '1' ";
                                $res = mysqli_query($con, $sql);
                                $sl = 1;

                                while ($row = mysqli_fetch_assoc($res)) 
                                {
                              ?>
                              <tr>
                                <td><?php echo $sl; ?></td>
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
                                <?php 
                                    $pp_no_id = $row['pp_no_id'];
                                    $pp_details_id = $row['pp_id'];
                                    $sql_model_gray_variable = "SELECT * FROM ready_for_dying_standard
                                              WHERE pp_no_id = '$pp_no_id' AND pp_details_id = '$pp_details_id' AND active = '1' ";
                                    $res_model_gray_variable = mysqli_query($con, $sql_model_gray_variable);
                                    $row_model_gray_variable = mysqli_fetch_assoc($res_model_gray_variable);
                                ?>
                                <td><?php echo $row['gray_width'] ?></td>

                                <td>
                                    <?php 
                                      if ($row_model_gray_variable['whiteness_cond1'] == 1) 
                                      {
                                        echo "( ";
                                      }
                                      elseif ($row_model_gray_variable['whiteness_cond1'] == 2) 
                                      {
                                        echo "[ ";
                                      }
                                      else
                                      {
                                        echo "] ";
                                      }
                                      
                                      echo $row_model_gray_variable['whiteness_value1'];
                                      echo " - ";
                                      echo $row_model_gray_variable['whiteness_value2'];

                                      if ($row_model_gray_variable['whiteness_cond2'] == 1) 
                                      {
                                        echo " )";
                                      }
                                      elseif ($row_model_gray_variable['whiteness_cond2'] == 2) 
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
                                      if ($row_model_gray_variable['bowing_and_skew_cond1'] == 1) 
                                      {
                                        echo "( ";
                                      }
                                      elseif ($row_model_gray_variable['bowing_and_skew_cond1'] == 2) 
                                      {
                                        echo "[ ";
                                      }
                                      else
                                      {
                                        echo "] ";
                                      }
                                      
                                      echo $row_model_gray_variable['bowing_and_skew_value1'];
                                      echo " - ";
                                      echo $row_model_gray_variable['bowing_and_skew_value2'];

                                      if ($row_model_gray_variable['bowing_and_skew_cond2'] == 1) 
                                      {
                                        echo " )";
                                      }
                                      elseif ($row_model_gray_variable['bowing_and_skew_cond2'] == 2) 
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
                                      if ($row_model_gray_variable['ph_cond1'] == 1) 
                                      {
                                        echo "( ";
                                      }
                                      elseif ($row_model_gray_variable['ph_cond1'] == 2) 
                                      {
                                        echo "[ ";
                                      }
                                      else
                                      {
                                        echo "] ";
                                      }
                                      
                                      echo $row_model_gray_variable['ph_value1'];
                                      echo " - ";
                                      echo $row_model_gray_variable['ph_value2'];

                                      if ($row_model_gray_variable['ph_cond2'] == 1) 
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

                                  <?php 
                                      if (isset($row_model_gray_variable['ph_value1'])) 
                                      {
                                        ?>
                                          <form id="copy_pp_version_details" name="copy_pp_version_details" style="display: inline-block;">
                                            <!-- data store for copy and next step -->
                                            <input type="hidden" id="pp_no_id" name="pp_no_id" value="<?php echo $pp_no_id; ?>">
                                            <input type="hidden" id="pp_version_for_this" name="pp_version_for_this" value="<?php echo $pp_version_for_this; ?>">
                                                        
                                            <input type="hidden" id="selection_of_multiple_pp_version_for_copy" name="selection_of_multiple_pp_version_for_copy" value="<?php echo $selection_of_multiple_pp_version_for_copy; ?>">

                                            <input type="hidden" id="pp_version_standard" name="pp_version_standard" value="<?php echo $pp_version_standard; ?>">
                                            <button type="button" class="btn btn-xs btn-success text-center" onclick="copy_greige_issunce_for_multiple_copy('<?php echo $row_model_gray_variable['ready_for_dying_standard_id']; ?>');">Copy</button>
                                          </form>
                                        <?php
                                      }

                                      else
                                      {
                                          echo "";
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
                      </div>
                <?php
            }

            else
            {
                echo "none";
            }
        ?>
        
<?php
        
    }
    else
    {
        echo "Data Not Found!";
    }
}
?>