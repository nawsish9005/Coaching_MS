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
    $sql_for_pp = "SELECT pp.*
                     FROM pp
                    WHERE pp.pp_id = '$pp_no_id'";

    $res_for_pp = mysqli_query($con, $sql_for_pp);
    $row_check = mysqli_num_rows($res_for_pp);

    if ($row_check >= 1)
    {
        $row = mysqli_fetch_array($res_for_pp);

        $sql_for_pp = "SELECT 
                              greige_issunce.*, 
                              pp_details.*, 
                              pp.*, 
                              route_issue.*, 
                              COUNT(route_issue.greige_issunce_id) AS row_counter
                         FROM 
                              greige_issunce, 
                              pp_details, 
                              pp, 
                              route_issue
                        WHERE greige_issunce.pp_no_id = '$pp_no_id'
                          AND greige_issunce.status = '1'
                          AND greige_issunce.active = '1'
                          AND greige_issunce.greige_issunce_id = route_issue.greige_issunce_id
                          AND pp_details.pp_no_id = greige_issunce.pp_no_id
                          AND pp_details.pp_id = greige_issunce.pp_details_id
                          AND pp.pp_id = pp_details.pp_no_id
                          AND pp_details.pp_id = '$pp_version'
                     GROUP BY route_issue.greige_issunce_id";



      $res_for_pp = mysqli_query($con, $sql_for_pp);
      $row_num_counter = mysqli_num_rows($res_for_pp);
      if ($row_num_counter >= 1) 
      {

        ?>
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
                <table id="datatable-buttons" class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>SI</th>
                      <th>Customer</th>
                      <th>Week</th>
                      <th>Design</th>
                      <th>Total Required Quantity</th>
                      <th>Version</th>
                      <th>Color</th>
                      <th>Gray Width</th>
                      <th>Greige Received Quantity</th>
                      <th>Yarn Warp</th>
                      <th>Yarn Weft</th>
                      <th>Thread EPI</th>
                      <th>Thread PPI</th>
                      <th>Fiber Warp</th>
                      <th>Fiber Weft</th>
                      <th>GSM</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  
                  <tbody>
                    <?php 
                      $s1 = 1;
                      
                      while ($row = mysqli_fetch_assoc($res_for_pp)) 
                      {
                        ?>
                        <tr>
                          <td><input type="hidden" id="database_row" name="database_row" value="<?php echo $row['row_counter']; ?>"><?php echo $s1; ?></td>
                          <td>
                            <?php 
                              $customers_id = $row['customers'];
                              $sql_for_customers = "SELECT customers_name FROM customers WHERE customers_id = '$customers_id'";
                              $res_for_customers = mysqli_query($con, $sql_for_customers);
                              $row_for_customers = mysqli_fetch_assoc($res_for_customers);
                              echo $row_for_customers['customers_name'];
                            ?>
                          </td>
                          <td><?php echo $row['week'] ?></td>
                          <td><?php echo $row['design'] ?></td>
                          <td>
                            <?php 
                              $sql_for_total_quantity = "SELECT SUM(quantity) AS total_quantity FROM pp_details WHERE pp_no_id = '$pp_no_id'";
                              $res_for_total_quantity = mysqli_query($con, $sql_for_total_quantity);
                              $row_for_total_quantity = mysqli_fetch_assoc($res_for_total_quantity);
                              echo $row_for_total_quantity['total_quantity'];
                            ?>
                          </td> 
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
                          <td><?php echo $row['received_quantity'] ?></td>
                          <td><?php echo $row['yarn_warp'] ?></td>
                          <td><?php echo $row['yarn_weft'] ?></td>
                          <td><?php echo $row['thread_epi'] ?></td>
                          <td><?php echo $row['thread_ppi'] ?></td>
                          <td><?php echo $row['fiber_warp'] ?></td>
                          <td><?php echo $row['fiber_weft'] ?></td>
                          <td><?php echo $row['gsm'] ?></td>
                          <td>
                            <?php 
                              $greige_issunce_id  = $row['greige_issunce_id'];
                              $sql_for_greige_issunce = "SELECT * FROM route_issue WHERE greige_issunce_id = '$greige_issunce_id' AND active = '1' ";
                              $res_for_greige_issunce = mysqli_query($con, $sql_for_greige_issunce);
                              $row_for_greige_issunce = mysqli_num_rows($res_for_greige_issunce);

                              if ($row_for_greige_issunce >= 1) 
                              {
                                ?>
                                  <input type="hidden" id="greige_issunce_id_for_edit" name="greige_issunce_id_for_edit" value="<?php echo $greige_issunce_id ?>">
                                  <input type="hidden" id="pp_no_id" name="pp_no_id" value="<?php echo $pp_no_id ?>">
                                  <input type="hidden" id="pp_details_id" name="pp_details_id" value="<?php echo $row['pp_details_id'] ?>">
                                  <input type="hidden" id="route_issue_id" name="route_issue_id" value="<?php echo $row['route_issue_id'] ?>">
                                  <button type="button" id="select_route_btn" name="select_route_btn" class="btn btn-primary btn-xs" value="<?php echo $s1 ?>" onclick="editroute(this.value);"> Edit Route </button>
                                <?php
                              }

                              if ($row_for_greige_issunce >= 1)
                              {
                                ?>
                                  <input type="hidden" id="greige_issunce_id_for_view" name="greige_issunce_id_for_view" value="<?php echo $greige_issunce_id ?>">
                                  <input type="hidden" id="pp_no_id" name="pp_no_id" value="<?php echo $pp_no_id ?>">
                                  <input type="hidden" id="pp_details_id" name="pp_details_id" value="<?php echo $row['pp_details_id'] ?>">
                                  <input type="hidden" id="route_issue_id" name="route_issue_id" value="<?php echo $row['route_issue_id'] ?>">
                                  <button type="button " id="select_route_btn" name="select_route_btn" class="btn btn-primary btn-xs" value="<?php echo $s1 ?>" onclick="viewroute(this.value);"> View Route </button>
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