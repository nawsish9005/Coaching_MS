<?php
session_start();
require_once("../includes/db_session_chk.php");

$pp_no_id = $_POST['pp_no_id'];
$pp_version = $_POST['pp_version'];

if ($pp_no_id == "" || is_null($pp_no_id) || empty($pp_no_id) || 
    $pp_version == "" || is_null($pp_version) || empty($pp_version)) 
{
    echo "No data found";
}
else
{
    $sql_for_pp = "SELECT process_program_info.*
                     FROM process_program_info
                    WHERE process_program_info.pp_id = '$pp_no_id'";

    $res_for_pp = mysqli_query($con, $sql_for_pp);
    $row_check = mysqli_num_rows($res_for_pp);

    if ($row_check >= 1)
    {
        $row = mysqli_fetch_array($res_for_pp);

        $sql_for_pp = "SELECT 
                              greige_receiving_process_info.*, 
                              version_wise_process_program_info.*, 
                              process_program_info.*, 
                              process_name_define_after_greige_receiving.*, 
                              COUNT(process_name_define_after_greige_receiving.greige_issunce_id) AS row_counter
                         FROM 
                              greige_receiving_process_info, 
                              version_wise_process_program_info, 
                              process_program_info, 
                              process_name_define_after_greige_receiving
                        WHERE greige_receiving_process_info.pp_no_id = '$pp_no_id'
                          AND greige_receiving_process_info.status = '1'
                          AND greige_receiving_process_info.active = '1'
                          AND greige_receiving_process_info.greige_issunce_id = process_name_define_after_greige_receiving.greige_issunce_id
                          AND version_wise_process_program_info.pp_no_id = greige_receiving_process_info.pp_no_id
                          AND version_wise_process_program_info.pp_id = greige_receiving_process_info.pp_details_id
                          AND process_program_info.pp_id = version_wise_process_program_info.pp_no_id
                          AND version_wise_process_program_info.pp_id = '$pp_version'
                     GROUP BY process_name_define_after_greige_receiving.greige_issunce_id";



      $res_for_pp = mysqli_query($con, $sql_for_pp);
      $row_num_counter = mysqli_num_rows($res_for_pp);
      if ($row_num_counter >= 1) 
      {

        ?>
        <div class="clearfix"></div>
          <div class="row">
             <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>PP Number: <span style="color:red;"> <?php echo $row['pp_no']; ?> </span></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">
                    <table class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>SI</th>
                          <th>Customer</th>
                          <th>Week</th>
                          <th>Design</th>
                          <th>Total Required Quantity</th>
                          <th>Version</th>
                          <th>Color</th>
                          <th>Greige Width</th>
                        </tr>
                      </thead>
                      
                      <tbody>
                        <?php 
                          $s1 = 1;
                          
                          $row_for_details = mysqli_fetch_assoc($res_for_pp);
                          
                            ?>
                            <tr>
                              <td><input type="hidden" id="database_row" name="database_row" value="<?php echo $row['row_counter']; ?>"><?php echo $s1; ?></td>
                              <td>
                                <?php 
                                  $customers_id = $row['customers'];
                                  $sql_for_customers = "SELECT customer_name FROM customer WHERE customer_id = '$customers_id'";
                                  $res_for_customers = mysqli_query($con, $sql_for_customers);
                                  $row_for_customers = mysqli_fetch_assoc($res_for_customers);
                                  echo $row_for_customers['customer_name'];
                                ?>
                              </td>
                              <td><?php echo $row['week'] ?></td>
                              <td><?php echo $row['design'] ?></td>
                              <td>
                                <?php 
                                  $sql_for_total_quantity = "SELECT SUM(quantity) AS total_quantity FROM version_wise_process_program_info WHERE pp_no_id = '$pp_no_id'";
                                  $res_for_total_quantity = mysqli_query($con, $sql_for_total_quantity);
                                  $row_for_total_quantity = mysqli_fetch_assoc($res_for_total_quantity);
                                  echo $row_for_total_quantity['total_quantity'];
                                ?>
                              </td> 
                              <td>
                                <?php 
                                  $version_id = $row_for_details['version'];
                                  $sql_for_version = "SELECT version_name FROM version_name WHERE version_id = '$version_id'";
                                  $res_for_version = mysqli_query($con, $sql_for_version);
                                  $row_for_version = mysqli_fetch_assoc($res_for_version);
                                  echo $row_for_version['version_name'];
                                ?>
                              </td>
                              <td>
                                <?php 
                                  $color_id = $row_for_details['color'];
                                  $sql_for_color = "SELECT color_name FROM color WHERE color_id = '$color_id'";
                                  $res_for_color = mysqli_query($con, $sql_for_color);
                                  $row_for_color = mysqli_fetch_assoc($res_for_color);
                                  echo $row_for_color['color_name'];
                                ?>
                              </td>
                              <td><?php echo $row_for_details['gray_width'] ?></td>
                            </tr>
                      </tbody> 
                    </table>
                  </div>
                </div>
              </div>
          </div>


        <div class="clearfix"></div>
          <div class="row">
             <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">

                  <div class="x_content">
                    <table id="datatable-buttons" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>SI</th>
                          <th>Greige Required Quantity</th>
                          <th>Yarn Warp</th>
                          <th>Yarn Weft</th>
                          <th>Thread EPI</th>
                          <th>Thread PPI</th>
                          <th>GSM</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      
                      <tbody>
                        <?php 
                          $s1 = 1;
                          $total_received_quantity = 0;
                          $sql_for_pp_details = "SELECT 
                                                greige_receiving_process_info.*, 
                                                version_wise_process_program_info.*, 
                                                process_program_info.*, 
                                                process_name_define_after_greige_receiving.*, 
                                                COUNT(process_name_define_after_greige_receiving.greige_issunce_id) AS row_counter
                                           FROM 
                                                greige_receiving_process_info, 
                                                version_wise_process_program_info, 
                                                process_program_info, 
                                                process_name_define_after_greige_receiving
                                          WHERE greige_receiving_process_info.pp_no_id = '$pp_no_id'
                                            AND greige_receiving_process_info.status = '1'
                                            AND greige_receiving_process_info.active = '1'
                                            AND greige_receiving_process_info.greige_issunce_id = process_name_define_after_greige_receiving.greige_issunce_id
                                            AND version_wise_process_program_info.pp_no_id = greige_receiving_process_info.pp_no_id
                                            AND version_wise_process_program_info.pp_id = greige_receiving_process_info.pp_details_id
                                            AND process_program_info.pp_id = version_wise_process_program_info.pp_no_id
                                            AND version_wise_process_program_info.pp_id = '$pp_version'
                                       GROUP BY process_name_define_after_greige_receiving.greige_issunce_id";



                        $res_for_pp_details = mysqli_query($con, $sql_for_pp_details);
                          
                          while ($row_details_for_pp = mysqli_fetch_assoc($res_for_pp_details)) 
                          {
                              $total_received_quantity += $row_details_for_pp['received_quantity'];
                            ?>
                            <tr>
                              <td><input type="hidden" id="database_row" name="database_row" value="<?php echo $row['row_counter']; ?>"><?php echo $s1; ?></td>
                              <td><?php echo $row_details_for_pp['received_quantity'] ?></td>
                              <td><?php echo $row_details_for_pp['yarn_warp'] ?></td>
                              <td><?php echo $row_details_for_pp['yarn_weft'] ?></td>
                              <td><?php echo $row_details_for_pp['thread_epi'] ?></td>
                              <td><?php echo $row_details_for_pp['thread_ppi'] ?></td>
                              <td><?php echo $row_details_for_pp['gsm'] ?></td>
                              <td style="width: 100px;">
                                <?php 
                                  $greige_issunce_id  = $row_details_for_pp['greige_issunce_id'];
                                  $sql_for_greige_issunce = "SELECT * FROM process_name_define_after_greige_receiving WHERE greige_issunce_id = '$greige_issunce_id' AND active = '1' ";
                                  $res_for_greige_issunce = mysqli_query($con, $sql_for_greige_issunce);
                                  $row_for_greige_issunce = mysqli_num_rows($res_for_greige_issunce);

                                  if ($row_for_greige_issunce >= 1) 
                                  {
                                    ?>
                                      <input type="hidden" id="greige_issunce_id_for_edit" name="greige_issunce_id_for_edit" class="greige_issunce_id_for_<?php echo $s1; ?>" value="<?php echo $greige_issunce_id ?>">
                                      <input type="hidden" id="pp_no_id_for_edit" name="pp_no_id_for_edit" value="<?php echo $pp_no_id ?>">
                                      <input type="hidden" id="pp_details_id_for_edit" name="pp_details_id_for_edit" value="<?php echo $pp_version ?>">
                                      <input type="hidden" id="route_issue_id_for_edit" name="route_issue_id_for_edit" class="route_issue_id_for_<?php echo $s1; ?>" value="<?php echo $row_details_for_pp['route_issue_id'] ?>">
                                      <button type="button" id="select_route_btn" name="select_route_btn" class="btn btn-primary btn-xs" value="<?php echo $s1 ?>" onclick="editroute(this.value);">Edit</button>
                                    <?php
                                  }

                                  if ($row_for_greige_issunce >= 1)
                                  {
                                    ?>
                                      <input type="hidden" id="greige_issunce_id_for_view" name="greige_issunce_id_for_view" class="greige_issunce_id_for_<?php echo $s1; ?>" value="<?php echo $greige_issunce_id ?>">
                                      <input type="hidden" id="pp_no_id_for_view" name="pp_no_id_for_view" value="<?php echo $pp_no_id ?>">
                                      <input type="hidden" id="pp_details_id_for_view" name="pp_details_id_for_view" value="<?php echo $pp_version ?>">
                                      <input type="hidden" id="route_issue_id_for_view" name="route_issue_id_for_view" class="route_issue_id_for_<?php echo $s1; ?>" value="<?php echo $row_details_for_pp['route_issue_id'] ?>">
                                      <button type="button " id="select_route_btn" name="select_route_btn" class="btn btn-primary btn-xs" value="<?php echo $s1; ?>" onclick="viewroute(this.value);">View</button>
                                    <?php
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
                    <h2>Total Required Quantity = <?php echo $total_received_quantity; ?> </h2>
                  </div>
                </div>
              </div>
          </div>
        <?php
      }

      else
      {
         ?>
            <h2 style="color:red;" class="text-center">Please ensure greige issue and version wise route selection first !</h2>
         <?php
      }

  }

  else
  {
      echo "Data Not Found!";
  }
}
?>