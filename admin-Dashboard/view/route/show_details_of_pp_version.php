<?php
session_start();
require_once("../includes/db_session_chk.php");

$pp_no_id = $_POST['pp_no_id'];
$pp_version = $_POST['pp_version'];
if (isset($_POST['pp_version_id'])) 
{
    $pp_version = $_POST['pp_version_id'];
}

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
                  <th>PP Creation Date</th>
                  <th>Customer</th>
                  <th>Week</th>
                  <th>Greige Demand No</th>
                  <th>Total PP Quantity</th>
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
                      $sql_for_customer = "SELECT customer_name FROM customer WHERE customer_id = '$customer_id'";
                      $res_for_customer = mysqli_query($con, $sql_for_customer);
                      $row_for_customer = mysqli_fetch_assoc($res_for_customer);
                      echo $row_for_customer['customers_name'];
                    ?>
                  </td>
                  <td><?php echo $row['week'] ?></td>
                  <td><?php echo $row['greige_demand'] ?></td>
                  <td>
                    <?php 
                      $sql_for_total_quantity = "SELECT SUM(quantity) AS total_quantity FROM version_wise_process_program_info WHERE pp_no_id = '$pp_no_id' AND active = '1' ";
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

        <!-- for pp details -->
        <div class="x_panel">
          <div class="x_content">
            <table class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>SI</th>
                  <th>PP Version</th>
                  <th>Color</th>
                  <th>Greige Width (Inch)</th>
                  <th>Finish Width (Inch)</th>
                  <th>Order Quantity (Meter)</th>
                  <th>Action</th>
                </tr>
              </thead>
              <?php 
                  $sql_version_select = "SELECT * FROM version_wise_process_program_info
                            WHERE pp_id = '$pp_version';"; 
                  $res_version_select = mysqli_query($con, $sql_version_select);
                  $row_version_select = mysqli_fetch_assoc($res_version_select);
                  $pp_version_name = $row_version_select['version'];
                  $sql = "SELECT * FROM version_wise_process_program_info
                            WHERE version LIKE '$pp_version_name' AND pp_no_id = '$pp_no_id' AND active = '1';";
                  $res = mysqli_query($con, $sql);
                  $sl = 1;
                  while($row_for_pp_details = mysqli_fetch_array($res))
                  {
                      ?>
                          <tbody>
                            <tr>
                              <td><?php echo $sl ?></td>
                              <td>
                                <?php 
                                  $version_id = $row_for_pp_details['version'];
                                  $sql_for_version = "SELECT version_name FROM version_name WHERE version_id = '$version_id'";
                                  $res_for_version = mysqli_query($con, $sql_for_version);
                                  $row_for_version = mysqli_fetch_assoc($res_for_version);
                                  echo $row_for_version['version_name'];
                                ?>
                              </td>
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
                              <td>
                                  <input type="hidden" id="pp_no_id_<?php echo $sl; ?>" name="pp_no_id_<?php echo $sl; ?>" value="<?php echo $pp_no_id; ?>">
                                  <input type="hidden" id="pp_version_<?php echo $sl; ?>" name="pp_version_<?php echo $sl; ?>" value="<?php echo ($row_for_pp_details['pp_id'] == "") ? $pp_version : $row_for_pp_details['pp_id']; ?>">

                                  <!-- after add view purpose -->
                                  <input type="hidden" id="pp_no_id" name="pp_no_id" value="<?php echo $pp_no_id; ?>">
                                  <input type="hidden" id="pp_version" name="pp_version" value="<?php echo $row_for_pp_details['pp_id']; ?>">
                                  <button type="button" id="gray_issue_add_btn" value="<?php echo $sl; ?>" name="gray_issue_add_btn" onclick="view_standard_select(this.value);" class="btn btn-primary btn-xs"> View PP Process Route </button>
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
    else
    {
        echo "Data Not Found!";
    }
}
?>