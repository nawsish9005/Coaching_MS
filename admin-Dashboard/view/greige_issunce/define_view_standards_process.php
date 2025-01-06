<?php
session_start();
require_once("../includes/db_session_chk.php");

$pp_no_id = $_POST['pp_no_id'];
$pp_version = $_POST['pp_version'];
$pp_version_standard = $_POST['pp_version_standard'];

if ($pp_no_id == "" || is_null($pp_no_id) || empty($pp_no_id) || 
    $pp_version == "" || is_null($pp_version) || empty($pp_version) || 
    $pp_version_standard == "" || is_null($pp_version_standard) || empty($pp_version_standard)) 
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

        <button type="button" name="multiple_copy" id="multiple_copy" value="<?php echo $pp_version; ?>" data-toggle="modal" data-target=".bs-example-modal-lg-for-multiple-copy" class="btn btn-success text-center" onclick="multiple_copy_for_all_pp(this.value);">Multiple PP Version Copy</button>

        <!-- for pp details -->
        <div class="x_panel">
          <div class="x_content">
            <table class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>SI</th>
                  <th>Select</th>
                  <th>Lock/Unlock</th>
                  <th>PP Version</th>
                  <th>Color</th>
                  <th>Gray Width (Inch)</th>
                  <th>Finish Width (Inch)</th>
                  <th>Order Quantity (Meter)</th> 
                  <th>Action</th>
                </tr>
              </thead>
              <?php 
                  $sql_version_select = "SELECT * FROM pp_details
                            WHERE pp_id = '$pp_version' AND active = '1' ;"; 
                  $res_version_select = mysqli_query($con, $sql_version_select);
                  // $row_version_select = mysqli_fetch_assoc($res_version_select);
                  // $pp_version_name = $row_version_select['version'];
                  // $sql = "SELECT * FROM pp_details
                  //           WHERE version LIKE '$pp_version_name' AND pp_no_id = '$pp_no_id' AND active = '1';";
                  // $res = mysqli_query($con, $sql);
                  $sl = 1;
                  while($row_for_pp_details = mysqli_fetch_array($res_version_select))
                  {
                      ?>
                        <form name="custom_form" id="custom_form">
                          <tbody>
                            <tr>
                              <td><?php echo $sl ?></td>
                              
                              <td>
                                  <!-- glyphicon glyphicon-ok -->
                                  <?php 

                                      if ($pp_version_standard == 1) 
                                      { 
                                          $select_pp_version = $row_for_pp_details['pp_id'];
                                          $select_pp_no_id = $row_for_pp_details['pp_no_id'];
                                          $sql_for_gray_select = "SELECT * FROM gray_variable
                                                                  WHERE pp_no_id = '$select_pp_no_id' AND  pp_details_id = '$select_pp_version' AND active = '1' "; 
                                          $res_for_gray_select = mysqli_query($con, $sql_for_gray_select);
                                          $row_for_gray_select = mysqli_fetch_assoc($res_for_gray_select);  

                                          if ($row_for_gray_select['lock_or_unlock'] == '0') 
                                          {
                                              ?>
                                                  <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="<?php echo $select_pp_version;?>" name="copy_test_box_select">
                                                  </div>
                                              <?php 
                                          }

                                          else if ($row_for_gray_select['lock_or_unlock'] == '1') 
                                          {
                                              ?>
                                                  <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="<?php echo $select_pp_version;?>" name="copy_test_box_select" disabled>
                                                  </div>
                                              <?php
                                          }

                                          else if (is_null($row_for_gray_select['lock_or_unlock']))
                                          {
                                              ?>
                                                  <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="<?php echo $select_pp_version;?>" name="copy_test_box_select">
                                                  </div>
                                              <?php 
                                          }

                                          else
                                          {
                                              ?>
                                                  <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="<?php echo $select_pp_version;?>" name="copy_test_box_select">
                                                  </div>
                                              <?php 
                                          }
                                      }

                                      else if($pp_version_standard == 2)
                                      {
                                          $select_pp_version = $row_for_pp_details['pp_id'];
                                          $select_pp_no_id = $row_for_pp_details['pp_no_id'];
                                          $sql_for_singe_select = "SELECT * FROM singe_standard
                                                                  WHERE pp_no_id = '$select_pp_no_id' AND  pp_details_id = '$select_pp_version' AND active = '1' "; 
                                          $res_for_singe_select = mysqli_query($con, $sql_for_singe_select);
                                          $row_for_singe_select = mysqli_fetch_assoc($res_for_singe_select);
                                          if ($row_for_singe_select['lock_or_unlock'] == '0') 
                                          {
                                              ?>
                                                  <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="<?php echo $select_pp_version;?>" name="copy_test_box_select">
                                                  </div>
                                              <?php 
                                          }

                                          else if ($row_for_singe_select['lock_or_unlock'] == '1') 
                                          {
                                              ?>
                                                  <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="<?php echo $select_pp_version;?>" name="copy_test_box_select" disabled>
                                                  </div>
                                              <?php
                                          }

                                          else if (is_null($row_for_singe_select['lock_or_unlock']))
                                          {
                                              ?>
                                                  <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="<?php echo $select_pp_version;?>" name="copy_test_box_select">
                                                  </div>
                                              <?php 
                                          }

                                          else
                                          {
                                              ?>
                                                  <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="<?php echo $select_pp_version;?>" name="copy_test_box_select">
                                                  </div>
                                              <?php 
                                          }
                                      }

                                      else if($pp_version_standard == 3)
                                      {
                                          $select_pp_version = $row_for_pp_details['pp_id'];
                                          $select_pp_no_id = $row_for_pp_details['pp_no_id'];
                                          $sql_for_bleaching_select = "SELECT * FROM bleaching_standard
                                                                  WHERE pp_no_id = '$select_pp_no_id' AND  pp_details_id = '$select_pp_version' AND active = '1' "; 
                                          $res_for_bleaching_select = mysqli_query($con, $sql_for_bleaching_select);
                                          $row_for_bleaching_select = mysqli_fetch_assoc($res_for_bleaching_select);
                                          if ($row_for_bleaching_select['lock_or_unlock'] == '0') 
                                          {
                                              ?>
                                                  <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="<?php echo $select_pp_version;?>" name="copy_test_box_select">
                                                  </div>
                                              <?php 
                                          }

                                          else if ($row_for_bleaching_select['lock_or_unlock'] == '1') 
                                          {
                                              ?>
                                                  <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="<?php echo $select_pp_version;?>" name="copy_test_box_select" disabled>
                                                  </div>
                                              <?php
                                          }

                                          else if (is_null($row_for_bleaching_select['lock_or_unlock']))
                                          {
                                              ?>
                                                  <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="<?php echo $select_pp_version;?>" name="copy_test_box_select">
                                                  </div>
                                              <?php 
                                          }

                                          else
                                          {
                                              ?>
                                                  <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="<?php echo $select_pp_version;?>" name="copy_test_box_select">
                                                  </div>
                                              <?php 
                                          }
                                      }

                                      else if($pp_version_standard == 4)
                                      {
                                          $select_pp_version = $row_for_pp_details['pp_id'];
                                          $select_pp_no_id = $row_for_pp_details['pp_no_id'];
                                          $sql_for_ready_mercerize_select = "SELECT * FROM ready_mercerize_standard
                                                                  WHERE pp_no_id = '$select_pp_no_id' AND  pp_details_id = '$select_pp_version' AND active = '1' "; 
                                          $res_for_ready_mercerize_select = mysqli_query($con, $sql_for_ready_mercerize_select);
                                          $row_for_ready_mercerize_select = mysqli_fetch_assoc($res_for_ready_mercerize_select);
                                          if ($row_for_ready_mercerize_select['lock_or_unlock'] == '0') 
                                          {
                                              ?>
                                                  <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="<?php echo $select_pp_version;?>" name="copy_test_box_select">
                                                  </div>
                                              <?php 
                                          }

                                          else if ($row_for_ready_mercerize_select['lock_or_unlock'] == '1') 
                                          {
                                              ?>
                                                  <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="<?php echo $select_pp_version;?>" name="copy_test_box_select" disabled>
                                                  </div>
                                              <?php
                                          }

                                          else if (is_null($row_for_ready_mercerize_select['lock_or_unlock']))
                                          {
                                              ?>
                                                  <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="<?php echo $select_pp_version;?>" name="copy_test_box_select">
                                                  </div>
                                              <?php 
                                          }

                                          else
                                          {
                                              ?>
                                                  <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="<?php echo $select_pp_version;?>" name="copy_test_box_select">
                                                  </div>
                                              <?php 
                                          }
                                      }


                                      else if($pp_version_standard == 5)
                                      {
                                          $select_pp_version = $row_for_pp_details['pp_id'];
                                          $select_pp_no_id = $row_for_pp_details['pp_no_id'];
                                          $sql_for_mercerize_select = "SELECT * FROM mercerize_standard
                                                                  WHERE pp_no_id = '$select_pp_no_id' AND  pp_details_id = '$select_pp_version' AND active = '1' "; 
                                          $res_for_mercerize_select = mysqli_query($con, $sql_for_mercerize_select);
                                          $row_for_mercerize_select = mysqli_fetch_assoc($res_for_mercerize_select);
                                          if ($row_for_mercerize_select['lock_or_unlock'] == '0') 
                                          {
                                              ?>
                                                  <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="<?php echo $select_pp_version;?>" name="copy_test_box_select">
                                                  </div>
                                              <?php 
                                          }

                                          else if ($row_for_mercerize_select['lock_or_unlock'] == '1') 
                                          {
                                              ?>
                                                  <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="<?php echo $select_pp_version;?>" name="copy_test_box_select" disabled>
                                                  </div>
                                              <?php
                                          }

                                          else if (is_null($row_for_mercerize_select['lock_or_unlock']))
                                          {
                                              ?>
                                                  <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="<?php echo $select_pp_version;?>" name="copy_test_box_select">
                                                  </div>
                                              <?php 
                                          }

                                          else
                                          {
                                              ?>
                                                  <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="<?php echo $select_pp_version;?>" name="copy_test_box_select">
                                                  </div>
                                              <?php 
                                          }
                                      }


                                      else if($pp_version_standard == 6)
                                      {
                                          $select_pp_version = $row_for_pp_details['pp_id'];
                                          $select_pp_no_id = $row_for_pp_details['pp_no_id'];
                                          $sql_for_equalize_select = "SELECT * FROM equalize_standard
                                                                  WHERE pp_no_id = '$select_pp_no_id' AND  pp_details_id = '$select_pp_version' AND active = '1' "; 
                                          $res_for_equalize_select = mysqli_query($con, $sql_for_equalize_select);
                                          $row_for_equalize_select = mysqli_fetch_assoc($res_for_equalize_select);
                                          if ($row_for_equalize_select['lock_or_unlock'] == '0') 
                                          {
                                              ?>
                                                  <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="<?php echo $select_pp_version;?>" name="copy_test_box_select">
                                                  </div>
                                              <?php 
                                          }

                                          else if ($row_for_equalize_select['lock_or_unlock'] == '1') 
                                          {
                                              ?>
                                                  <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="<?php echo $select_pp_version;?>" name="copy_test_box_select" disabled>
                                                  </div>
                                              <?php
                                          }

                                          else if (is_null($row_for_equalize_select['lock_or_unlock']))
                                          {
                                              ?>
                                                  <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="<?php echo $select_pp_version;?>" name="copy_test_box_select">
                                                  </div>
                                              <?php 
                                          }

                                          else
                                          {
                                              ?>
                                                  <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="<?php echo $select_pp_version;?>" name="copy_test_box_select">
                                                  </div>
                                              <?php 
                                          }
                                      }

                                      else if($pp_version_standard == 7)
                                      {
                                          $select_pp_version = $row_for_pp_details['pp_id'];
                                          $select_pp_no_id = $row_for_pp_details['pp_no_id'];
                                          $sql_for_printing_select = "SELECT * FROM printing_standard
                                                                  WHERE pp_no_id = '$select_pp_no_id' AND  pp_details_id = '$select_pp_version' AND active = '1' "; 
                                          $res_for_printing_select = mysqli_query($con, $sql_for_printing_select);
                                          $row_for_printing_select = mysqli_fetch_assoc($res_for_printing_select);
                                          if ($row_for_printing_select['lock_or_unlock'] == '0') 
                                          {
                                              ?>
                                                  <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="<?php echo $select_pp_version;?>" name="copy_test_box_select">
                                                  </div>
                                              <?php 
                                          }

                                          else if ($row_for_printing_select['lock_or_unlock'] == '1') 
                                          {
                                              ?>
                                                  <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="<?php echo $select_pp_version;?>" name="copy_test_box_select" disabled>
                                                  </div>
                                              <?php
                                          }

                                          else if (is_null($row_for_printing_select['lock_or_unlock']))
                                          {
                                              ?>
                                                  <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="<?php echo $select_pp_version;?>" name="copy_test_box_select">
                                                  </div>
                                              <?php 
                                          }

                                          else
                                          {
                                              ?>
                                                  <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="<?php echo $select_pp_version;?>" name="copy_test_box_select">
                                                  </div>
                                              <?php 
                                          }
                                      }

                                      else if($pp_version_standard == 8)
                                      {
                                          $select_pp_version = $row_for_pp_details['pp_id'];
                                          $select_pp_no_id = $row_for_pp_details['pp_no_id'];
                                          $sql_for_curing_select = "SELECT * FROM curing_standard
                                                                  WHERE pp_no_id = '$select_pp_no_id' AND  pp_details_id = '$select_pp_version' AND active = '1' "; 
                                          $res_for_curing_select = mysqli_query($con, $sql_for_curing_select);
                                          $row_for_curing_select = mysqli_fetch_assoc($res_for_curing_select);
                                          if ($row_for_curing_select['lock_or_unlock'] == '0') 
                                          {
                                              ?>
                                                  <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="<?php echo $select_pp_version;?>" name="copy_test_box_select">
                                                  </div>
                                              <?php 
                                          }

                                          else if ($row_for_curing_select['lock_or_unlock'] == '1') 
                                          {
                                              ?>
                                                  <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="<?php echo $select_pp_version;?>" name="copy_test_box_select" disabled>
                                                  </div>
                                              <?php
                                          }

                                          else if (is_null($row_for_curing_select['lock_or_unlock']))
                                          {
                                              ?>
                                                  <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="<?php echo $select_pp_version;?>" name="copy_test_box_select">
                                                  </div>
                                              <?php 
                                          }

                                          else
                                          {
                                              ?>
                                                  <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="<?php echo $select_pp_version;?>" name="copy_test_box_select">
                                                  </div>
                                              <?php 
                                          }
                                      }

                                      else if($pp_version_standard == 9)
                                      {
                                          $select_pp_version = $row_for_pp_details['pp_id'];
                                          $select_pp_no_id = $row_for_pp_details['pp_no_id'];
                                          $sql_for_finishing_select = "SELECT * FROM finishing_standard
                                                                  WHERE pp_no_id = '$select_pp_no_id' AND  pp_details_id = '$select_pp_version' AND active = '1' "; 
                                          $res_for_finishing_select = mysqli_query($con, $sql_for_finishing_select);
                                          $row_for_finishing_select = mysqli_fetch_assoc($res_for_finishing_select);
                                          if ($row_for_finishing_select['lock_or_unlock'] == '0') 
                                          {
                                              ?>
                                                  <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="<?php echo $select_pp_version;?>" name="copy_test_box_select">
                                                  </div>
                                              <?php 
                                          }

                                          else if ($row_for_finishing_select['lock_or_unlock'] == '1') 
                                          {
                                              ?>
                                                  <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="<?php echo $select_pp_version;?>" name="copy_test_box_select" disabled>
                                                  </div>
                                              <?php
                                          }

                                          else if (is_null($row_for_finishing_select['lock_or_unlock']))
                                          {
                                              ?>
                                                  <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="<?php echo $select_pp_version;?>" name="copy_test_box_select">
                                                  </div>
                                              <?php 
                                          }

                                          else
                                          {
                                              ?>
                                                  <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="<?php echo $select_pp_version;?>" name="copy_test_box_select">
                                                  </div>
                                              <?php 
                                          }
                                      }

                                      else if($pp_version_standard == 10) 
                                      {
                                          $select_pp_version = $row_for_pp_details['pp_id'];
                                          $select_pp_no_id = $row_for_pp_details['pp_no_id'];
                                          $sql_for_scouring_bleaching_select = "SELECT * FROM scouring_bleaching_standard
                                                                  WHERE pp_no_id = '$select_pp_no_id' AND  pp_details_id = '$select_pp_version' AND active = '1' "; 
                                          $res_for_scouring_bleaching_select = mysqli_query($con, $sql_for_scouring_bleaching_select);
                                          $row_for_scouring_bleaching_select = mysqli_fetch_assoc($res_for_scouring_bleaching_select);
                                          if ($row_for_scouring_bleaching_select['lock_or_unlock'] == '0') 
                                          {
                                              ?>
                                                  <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="<?php echo $select_pp_version;?>" name="copy_test_box_select">
                                                  </div>
                                              <?php 
                                          }

                                          else if ($row_for_scouring_bleaching_select['lock_or_unlock'] == '1') 
                                          {
                                              ?>
                                                  <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="<?php echo $select_pp_version;?>" name="copy_test_box_select" disabled>
                                                  </div>
                                              <?php
                                          }

                                          else if (is_null($row_for_scouring_bleaching_select['lock_or_unlock']))
                                          {
                                              ?>
                                                  <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="<?php echo $select_pp_version;?>" name="copy_test_box_select">
                                                  </div>
                                              <?php 
                                          }

                                          else
                                          {
                                              ?>
                                                  <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="<?php echo $select_pp_version;?>" name="copy_test_box_select">
                                                  </div>
                                              <?php 
                                          }
                                      }


                                      else if($pp_version_standard == 11) 
                                      {
                                          $select_pp_version = $row_for_pp_details['pp_id'];
                                          $select_pp_no_id = $row_for_pp_details['pp_no_id'];
                                          $sql_for_scouring_select = "SELECT * FROM scouring_standard
                                                                  WHERE pp_no_id = '$select_pp_no_id' AND  pp_details_id = '$select_pp_version' AND active = '1' "; 
                                          $res_for_scouring_select = mysqli_query($con, $sql_for_scouring_select);
                                          $row_for_scouring_select = mysqli_fetch_assoc($res_for_scouring_select);
                                          

                                          if ($row_for_scouring_select['lock_or_unlock'] == '0') 
                                          {
                                              ?>

                                                  <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="<?php echo $select_pp_version;?>" name="copy_test_box_select">
                                                  </div>
                                              <?php 
                                          }

                                          else if ($row_for_scouring_select['lock_or_unlock'] == '1') 
                                          {
                                              ?>
                                                  <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="<?php echo $select_pp_version;?>" name="copy_test_box_select" disabled>
                                                  </div>
                                              <?php
                                          }

                                          else if (is_null($row_for_scouring_select['lock_or_unlock']))
                                          {
                                              ?>
                                                  <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="<?php echo $select_pp_version;?>" name="copy_test_box_select">
                                                  </div>
                                              <?php 
                                          }

                                          else
                                          {
                                              ?>
                                                  <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="<?php echo $select_pp_version;?>" name="copy_test_box_select">
                                                  </div>
                                              <?php 
                                          }
                                      }

                                      else if($pp_version_standard == 12) 
                                      {
                                          $select_pp_version = $row_for_pp_details['pp_id'];
                                          $select_pp_no_id = $row_for_pp_details['pp_no_id'];
                                          $sql_for_washing_select = "SELECT * FROM washing_standard
                                                                  WHERE pp_no_id = '$select_pp_no_id' AND  pp_details_id = '$select_pp_version' AND active = '1' "; 
                                          $res_for_washing_select = mysqli_query($con, $sql_for_washing_select);
                                          $row_for_washing_select = mysqli_fetch_assoc($res_for_washing_select);
                                          if ($row_for_washing_select['lock_or_unlock'] == '0') 
                                          {
                                              ?>
                                                  <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="<?php echo $select_pp_version;?>" name="copy_test_box_select">
                                                  </div>
                                              <?php 
                                          }

                                          else if ($row_for_washing_select['lock_or_unlock'] == '1') 
                                          {
                                              ?>
                                                  <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="<?php echo $select_pp_version;?>" name="copy_test_box_select" disabled>
                                                  </div>
                                              <?php
                                          }

                                          else if (is_null($row_for_washing_select['lock_or_unlock']))
                                          {
                                              ?>
                                                  <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="<?php echo $select_pp_version;?>" name="copy_test_box_select">
                                                  </div>
                                              <?php 
                                          }

                                          else
                                          {
                                              ?>
                                                  <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="<?php echo $select_pp_version;?>" name="copy_test_box_select">
                                                  </div>
                                              <?php 
                                          }
                                      }

                                      else if($pp_version_standard == 13) 
                                      {
                                          $select_pp_version = $row_for_pp_details['pp_id'];
                                          $select_pp_no_id = $row_for_pp_details['pp_no_id'];
                                          $sql_for_calendering_select = "SELECT * FROM calendering_standard
                                                                  WHERE pp_no_id = '$select_pp_no_id' AND  pp_details_id = '$select_pp_version' AND active = '1' "; 
                                          $res_for_calendering_select = mysqli_query($con, $sql_for_calendering_select);
                                          $row_for_calendering_select = mysqli_fetch_assoc($res_for_calendering_select);
                                          if ($row_for_calendering_select['lock_or_unlock'] == '0') 
                                          {
                                              ?>
                                                  <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="<?php echo $select_pp_version;?>" name="copy_test_box_select">
                                                  </div>
                                              <?php 
                                          }

                                          else if ($row_for_calendering_select['lock_or_unlock'] == '1') 
                                          {
                                              ?>
                                                  <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="<?php echo $select_pp_version;?>" name="copy_test_box_select" disabled>
                                                  </div>
                                              <?php
                                          }

                                          else if (is_null($row_for_calendering_select['lock_or_unlock']))
                                          {
                                              ?>
                                                  <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="<?php echo $select_pp_version;?>" name="copy_test_box_select">
                                                  </div>
                                              <?php 
                                          }

                                          else
                                          {
                                              ?>
                                                  <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="<?php echo $select_pp_version;?>" name="copy_test_box_select">
                                                  </div>
                                              <?php 
                                          }
                                      }

                                      else if($pp_version_standard == 14) 
                                      {
                                          $select_pp_version = $row_for_pp_details['pp_id'];
                                          $select_pp_no_id = $row_for_pp_details['pp_no_id'];
                                          $sql_for_sanforizing_select = "SELECT * FROM sanforizing_standard
                                                                  WHERE pp_no_id = '$select_pp_no_id' AND  pp_details_id = '$select_pp_version' AND active = '1' "; 
                                          $res_for_sanforizing_select = mysqli_query($con, $sql_for_sanforizing_select);
                                          $row_for_sanforizing_select = mysqli_fetch_assoc($res_for_sanforizing_select);
                                          if ($row_for_sanforizing_select['lock_or_unlock'] == '0') 
                                          {
                                              ?>
                                                  <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="<?php echo $select_pp_version;?>" name="copy_test_box_select">
                                                  </div>
                                              <?php 
                                          }

                                          else if ($row_for_sanforizing_select['lock_or_unlock'] == '1') 
                                          {
                                              ?>
                                                  <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="<?php echo $select_pp_version;?>" name="copy_test_box_select" disabled>
                                                  </div>
                                              <?php
                                          }

                                          else if (is_null($row_for_sanforizing_select['lock_or_unlock']))
                                          {
                                              ?>
                                                  <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="<?php echo $select_pp_version;?>" name="copy_test_box_select">
                                                  </div>
                                              <?php 
                                          }

                                          else
                                          {
                                              ?>
                                                  <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="<?php echo $select_pp_version;?>" name="copy_test_box_select">
                                                  </div>
                                              <?php 
                                          }
                                      }


                                      else if($pp_version_standard == 15) 
                                      {
                                          $select_pp_version = $row_for_pp_details['pp_id'];
                                          $select_pp_no_id = $row_for_pp_details['pp_no_id'];
                                          $sql_for_raising_select = "SELECT * FROM raising_standard
                                                                  WHERE pp_no_id = '$select_pp_no_id' AND  pp_details_id = '$select_pp_version' AND active = '1' "; 
                                          $res_for_raising_select = mysqli_query($con, $sql_for_raising_select);
                                          $row_for_raising_select = mysqli_fetch_assoc($res_for_raising_select);
                                          if ($row_for_raising_select['lock_or_unlock'] == '0') 
                                          {
                                              ?>
                                                  <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="<?php echo $select_pp_version;?>" name="copy_test_box_select">
                                                  </div>
                                              <?php 
                                          }

                                          else if ($row_for_raising_select['lock_or_unlock'] == '1') 
                                          {
                                              ?>
                                                  <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="<?php echo $select_pp_version;?>" name="copy_test_box_select" disabled>
                                                  </div>
                                              <?php
                                          }

                                          else if (is_null($row_for_raising_select['lock_or_unlock']))
                                          {
                                              ?>
                                                  <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="<?php echo $select_pp_version;?>" name="copy_test_box_select">
                                                  </div>
                                              <?php 
                                          }

                                          else
                                          {
                                              ?>
                                                  <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="<?php echo $select_pp_version;?>" name="copy_test_box_select">
                                                  </div>
                                              <?php 
                                          }
                                      }

                                      else if($pp_version_standard == 16) 
                                      {
                                          $select_pp_version = $row_for_pp_details['pp_id'];
                                          $select_pp_no_id = $row_for_pp_details['pp_no_id'];
                                          $sql_for_ready_for_raising_select = "SELECT * FROM ready_for_raising_standard
                                                                  WHERE pp_no_id = '$select_pp_no_id' AND  pp_details_id = '$select_pp_version' AND active = '1' "; 
                                          $res_for_ready_for_raising_select = mysqli_query($con, $sql_for_ready_for_raising_select);
                                          $row_for_ready_for_raising_select = mysqli_fetch_assoc($res_for_ready_for_raising_select);
                                          if ($row_for_ready_for_raising_select['lock_or_unlock'] == '0') 
                                          {
                                              ?>
                                                  <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="<?php echo $select_pp_version;?>" name="copy_test_box_select">
                                                  </div>
                                              <?php 
                                          }

                                          else if ($row_for_ready_for_raising_select['lock_or_unlock'] == '1') 
                                          {
                                              ?>
                                                  <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="<?php echo $select_pp_version;?>" name="copy_test_box_select" disabled>
                                                  </div>
                                              <?php
                                          }

                                          else if (is_null($row_for_ready_for_raising_select['lock_or_unlock']))
                                          {
                                              ?>
                                                  <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="<?php echo $select_pp_version;?>" name="copy_test_box_select">
                                                  </div>
                                              <?php 
                                          }

                                          else
                                          {
                                              ?>
                                                  <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="<?php echo $select_pp_version;?>" name="copy_test_box_select">
                                                  </div>
                                              <?php 
                                          }
                                      }

                                      else if($pp_version_standard == 17) 
                                      {
                                          $select_pp_version = $row_for_pp_details['pp_id'];
                                          $select_pp_no_id = $row_for_pp_details['pp_no_id'];
                                          $sql_for_ready_for_print_select = "SELECT * FROM ready_for_print_standard
                                                                  WHERE pp_no_id = '$select_pp_no_id' AND  pp_details_id = '$select_pp_version' AND active = '1' "; 
                                          $res_for_ready_for_print_select = mysqli_query($con, $sql_for_ready_for_print_select);
                                          $row_for_ready_for_print_select = mysqli_fetch_assoc($res_for_ready_for_print_select);
                                          if ($row_for_ready_for_print_select['lock_or_unlock'] == '0') 
                                          {
                                              ?>
                                                  <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="<?php echo $select_pp_version;?>" name="copy_test_box_select">
                                                  </div>
                                              <?php 
                                          }

                                          else if ($row_for_ready_for_print_select['lock_or_unlock'] == '1') 
                                          {
                                              ?>
                                                  <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="<?php echo $select_pp_version;?>" name="copy_test_box_select" disabled>
                                                  </div>
                                              <?php
                                          }

                                          else if (is_null($row_for_ready_for_print_select['lock_or_unlock']))
                                          {
                                              ?>
                                                  <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="<?php echo $select_pp_version;?>" name="copy_test_box_select">
                                                  </div>
                                              <?php 
                                          }

                                          else
                                          {
                                              ?>
                                                  <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="<?php echo $select_pp_version;?>" name="copy_test_box_select">
                                                  </div>
                                              <?php 
                                          }
                                      }

                                      else if($pp_version_standard == 18) 
                                      {
                                          $select_pp_version = $row_for_pp_details['pp_id'];
                                          $select_pp_no_id = $row_for_pp_details['pp_no_id'];
                                          $sql_for_ready_for_dying_select = "SELECT * FROM ready_for_dying_standard
                                                                  WHERE pp_no_id = '$select_pp_no_id' AND  pp_details_id = '$select_pp_version' AND active = '1' "; 
                                          $res_for_ready_for_dying_select = mysqli_query($con, $sql_for_ready_for_dying_select);
                                          $row_for_ready_for_dying_select = mysqli_fetch_assoc($res_for_ready_for_dying_select);
                                          if ($row_for_ready_for_dying_select['lock_or_unlock'] == '0') 
                                          {
                                              ?>
                                                  <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="<?php echo $select_pp_version;?>" name="copy_test_box_select">
                                                  </div>
                                              <?php 
                                          }

                                          else if ($row_for_ready_for_dying_select['lock_or_unlock'] == '1') 
                                          {
                                              ?>
                                                  <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="<?php echo $select_pp_version;?>" name="copy_test_box_select" disabled>
                                                  </div>
                                              <?php
                                          }

                                          else if (is_null($row_for_ready_for_dying_select['lock_or_unlock']))
                                          {
                                              ?>
                                                  <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="<?php echo $select_pp_version;?>" name="copy_test_box_select">
                                                  </div>
                                              <?php 
                                          }

                                          else
                                          {
                                              ?>
                                                  <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="<?php echo $select_pp_version;?>" name="copy_test_box_select">
                                                  </div>
                                              <?php 
                                          }
                                      }

                                      else
                                      {
                                          echo "no process selected";
                                      }
                                  ?>
                              </td>
                              <td>
                                  <!-- glyphicon glyphicon-ok -->
                                  <?php 
                                      if ($pp_version_standard == 1) 
                                      {

                                          if ($row_for_gray_select['lock_or_unlock'] == '0') 
                                          {
                                              ?>
                                                  <button class="btn btn-success" onclick="click_for_lock(<?php echo $select_pp_version; ?> , <?php echo $select_pp_no_id; ?> , <?php echo $pp_version_standard; ?>);">
                                                    <i class="glyphicon glyphicon-ok"></i> Unlock
                                                  </button>
                                              <?php 
                                          }

                                          else if ($row_for_gray_select['lock_or_unlock'] == '1') 
                                          {
                                              ?>
                                                  <button class="btn btn-success" onclick="click_for_unlock(<?php echo $select_pp_version; ?> , <?php echo $select_pp_no_id; ?> , <?php echo $pp_version_standard; ?>);">
                                                    <i class="glyphicon glyphicon-remove"></i> Lock
                                                  </button>
                                              <?php
                                          }

                                          else if (is_null($row_for_gray_select['lock_or_unlock']))
                                          {
                                              
                                          }

                                          else
                                          {

                                          }
                                      }

                                      else if ($pp_version_standard == 2) 
                                      {
                                          if ($row_for_singe_select['lock_or_unlock'] == '0') 
                                          {
                                              ?>
                                                  <button class="btn btn-success" onclick="click_for_lock(<?php echo $select_pp_version; ?> , <?php echo $select_pp_no_id; ?> , <?php echo $pp_version_standard; ?>);">
                                                    <i class="glyphicon glyphicon-ok"></i> Unlock
                                                  </button>
                                              <?php 
                                          }

                                          else if ($row_for_singe_select['lock_or_unlock'] == '1') 
                                          {
                                              ?>
                                                  <button class="btn btn-success" onclick="click_for_unlock(<?php echo $select_pp_version; ?> , <?php echo $select_pp_no_id; ?> , <?php echo $pp_version_standard; ?>);">
                                                    <i class="glyphicon glyphicon-remove"></i> Lock
                                                  </button>
                                              <?php
                                          }

                                          else if (is_null($row_for_singe_select['lock_or_unlock']))
                                          {
                                              
                                          }

                                          else
                                          {

                                          }
                                      }

                                      else if ($pp_version_standard == 3)
                                      {
                                          if ($row_for_bleaching_select['lock_or_unlock'] == '0') 
                                          {
                                              ?>
                                                  <button class="btn btn-success" onclick="click_for_lock(<?php echo $select_pp_version; ?> , <?php echo $select_pp_no_id; ?> , <?php echo $pp_version_standard; ?>);">
                                                    <i class="glyphicon glyphicon-ok"></i> Unlock
                                                  </button>
                                              <?php 
                                          }

                                          else if ($row_for_bleaching_select['lock_or_unlock'] == '1') 
                                          {
                                              ?>
                                                  <button class="btn btn-success" onclick="click_for_unlock(<?php echo $select_pp_version; ?> , <?php echo $select_pp_no_id; ?> , <?php echo $pp_version_standard; ?>);">
                                                    <i class="glyphicon glyphicon-remove"></i> Lock
                                                  </button>
                                              <?php
                                          }

                                          else if (is_null($row_for_bleaching_select['lock_or_unlock']))
                                          {
                                              
                                          }

                                          else
                                          {

                                          }
                                      }


                                      else if ($pp_version_standard == 4)
                                      {
                                          if ($row_for_ready_mercerize_select['lock_or_unlock'] == '0') 
                                          {
                                              ?>
                                                  <button class="btn btn-success" onclick="click_for_lock(<?php echo $select_pp_version; ?> , <?php echo $select_pp_no_id; ?> , <?php echo $pp_version_standard; ?>);">
                                                    <i class="glyphicon glyphicon-ok"></i> Unlock
                                                  </button>
                                              <?php 
                                          }

                                          else if ($row_for_ready_mercerize_select['lock_or_unlock'] == '1') 
                                          {
                                              ?>
                                                  <button class="btn btn-success" onclick="click_for_unlock(<?php echo $select_pp_version; ?> , <?php echo $select_pp_no_id; ?> , <?php echo $pp_version_standard; ?>);">
                                                    <i class="glyphicon glyphicon-remove"></i> Lock
                                                  </button>
                                              <?php
                                          }

                                          else if (is_null($row_for_ready_mercerize_select['lock_or_unlock']))
                                          {
                                              
                                          }

                                          else
                                          {

                                          }
                                      }


                                      else if ($pp_version_standard == 5)
                                      {
                                          if ($row_for_mercerize_select['lock_or_unlock'] == '0') 
                                          {
                                              ?>
                                                  <button class="btn btn-success" onclick="click_for_lock(<?php echo $select_pp_version; ?> , <?php echo $select_pp_no_id; ?> , <?php echo $pp_version_standard; ?>);">
                                                    <i class="glyphicon glyphicon-ok"></i> Unlock
                                                  </button>
                                              <?php 
                                          }

                                          else if ($row_for_mercerize_select['lock_or_unlock'] == '1') 
                                          {
                                              ?>
                                                  <button class="btn btn-success" onclick="click_for_unlock(<?php echo $select_pp_version; ?> , <?php echo $select_pp_no_id; ?> , <?php echo $pp_version_standard; ?>);">
                                                    <i class="glyphicon glyphicon-remove"></i> Lock
                                                  </button>
                                              <?php
                                          }

                                          else if (is_null($row_for_mercerize_select['lock_or_unlock']))
                                          {
                                              
                                          }

                                          else
                                          {

                                          }
                                      }


                                      else if ($pp_version_standard == 6)
                                      { 
                                          if ($row_for_equalize_select['lock_or_unlock'] == '0') 
                                          {
                                              ?>
                                                  <button class="btn btn-success" onclick="click_for_lock(<?php echo $select_pp_version; ?> , <?php echo $select_pp_no_id; ?> , <?php echo $pp_version_standard; ?>);">
                                                    <i class="glyphicon glyphicon-ok"></i> Unlock
                                                  </button>
                                              <?php 
                                          }

                                          else if ($row_for_equalize_select['lock_or_unlock'] == '1') 
                                          {
                                              ?>
                                                  <button class="btn btn-success" onclick="click_for_unlock(<?php echo $select_pp_version; ?> , <?php echo $select_pp_no_id; ?> , <?php echo $pp_version_standard; ?>);">
                                                    <i class="glyphicon glyphicon-remove"></i> Lock
                                                  </button>
                                              <?php
                                          }

                                          else if (is_null($row_for_equalize_select['lock_or_unlock']))
                                          {
                                              
                                          }

                                          else
                                          {

                                          }
                                      }

                                      else if ($pp_version_standard == 7)
                                      { 
                                          if ($row_for_printing_select['lock_or_unlock'] == '0') 
                                          {
                                              ?>
                                                  <button class="btn btn-success" onclick="click_for_lock(<?php echo $select_pp_version; ?> , <?php echo $select_pp_no_id; ?> , <?php echo $pp_version_standard; ?>);">
                                                    <i class="glyphicon glyphicon-ok"></i> Unlock
                                                  </button>
                                              <?php 
                                          }

                                          else if ($row_for_printing_select['lock_or_unlock'] == '1') 
                                          {
                                              ?>
                                                  <button class="btn btn-success" onclick="click_for_unlock(<?php echo $select_pp_version; ?> , <?php echo $select_pp_no_id; ?> , <?php echo $pp_version_standard; ?>);">
                                                    <i class="glyphicon glyphicon-remove"></i> Lock
                                                  </button>
                                              <?php
                                          }

                                          else if (is_null($row_for_printing_select['lock_or_unlock']))
                                          {
                                              
                                          }

                                          else
                                          {

                                          }
                                      }

                                      else if ($pp_version_standard == 8) 
                                      { 
                                          if ($row_for_curing_select['lock_or_unlock'] == '0') 
                                          {
                                              ?>
                                                  <button class="btn btn-success" onclick="click_for_lock(<?php echo $select_pp_version; ?> , <?php echo $select_pp_no_id; ?> , <?php echo $pp_version_standard; ?>);">
                                                    <i class="glyphicon glyphicon-ok"></i> Unlock
                                                  </button>
                                              <?php 
                                          }

                                          else if ($row_for_curing_select['lock_or_unlock'] == '1') 
                                          {
                                              ?>
                                                  <button class="btn btn-success" onclick="click_for_unlock(<?php echo $select_pp_version; ?> , <?php echo $select_pp_no_id; ?> , <?php echo $pp_version_standard; ?>);">
                                                    <i class="glyphicon glyphicon-remove"></i> Lock
                                                  </button>
                                              <?php
                                          }

                                          else if (is_null($row_for_curing_select['lock_or_unlock']))
                                          {
                                              
                                          }

                                          else
                                          {

                                          }
                                      }

                                      else if ($pp_version_standard == 9)
                                      { 
                                          if ($row_for_finishing_select['lock_or_unlock'] == '0') 
                                          {
                                              ?>
                                                  <button class="btn btn-success" onclick="click_for_lock(<?php echo $select_pp_version; ?> , <?php echo $select_pp_no_id; ?> , <?php echo $pp_version_standard; ?>);">
                                                    <i class="glyphicon glyphicon-ok"></i> Unlock
                                                  </button>
                                              <?php 
                                          }

                                          else if ($row_for_finishing_select['lock_or_unlock'] == '1') 
                                          {
                                              ?>
                                                  <button class="btn btn-success" onclick="click_for_unlock(<?php echo $select_pp_version; ?> , <?php echo $select_pp_no_id; ?> , <?php echo $pp_version_standard; ?>);">
                                                    <i class="glyphicon glyphicon-remove"></i> Lock
                                                  </button>
                                              <?php
                                          }

                                          else if (is_null($row_for_finishing_select['lock_or_unlock']))
                                          {
                                              
                                          }

                                          else
                                          {

                                          }
                                      }

                                      else if ($pp_version_standard == 10 ) 
                                      { 
                                          if ($row_for_scouring_bleaching_select['lock_or_unlock'] == '0') 
                                          {
                                              ?>
                                                  <button class="btn btn-success" onclick="click_for_lock(<?php echo $select_pp_version; ?> , <?php echo $select_pp_no_id; ?> , <?php echo $pp_version_standard; ?>);">
                                                    <i class="glyphicon glyphicon-ok"></i> Unlock
                                                  </button>
                                              <?php 
                                          }

                                          else if ($row_for_scouring_bleaching_select['lock_or_unlock'] == '1') 
                                          {
                                              ?>
                                                  <button class="btn btn-success" onclick="click_for_unlock(<?php echo $select_pp_version; ?> , <?php echo $select_pp_no_id; ?> , <?php echo $pp_version_standard; ?>);">
                                                    <i class="glyphicon glyphicon-remove"></i> Lock
                                                  </button>
                                              <?php
                                          }

                                          else if (is_null($row_for_scouring_bleaching_select['lock_or_unlock']))
                                          {
                                              
                                          }

                                          else
                                          {

                                          }
                                      }

                                      else if ($pp_version_standard == 11 ) 
                                      { 
                                          if ($row_for_scouring_select['lock_or_unlock'] == '0') 
                                          {
                                              ?> 
                                                  <button class="btn btn-success" onclick="click_for_lock(<?php echo $select_pp_version; ?> , <?php echo $select_pp_no_id; ?> , <?php echo $pp_version_standard; ?>);">
                                                    <i class="glyphicon glyphicon-ok"></i> Unlock
                                                  </button>
                                              <?php 
                                          }

                                          else if ($row_for_scouring_select['lock_or_unlock'] == '1') 
                                          {
                                              ?>
                                                  <button class="btn btn-success" onclick="click_for_unlock(<?php echo $select_pp_version; ?> , <?php echo $select_pp_no_id; ?> , <?php echo $pp_version_standard; ?>);">
                                                    <i class="glyphicon glyphicon-remove"></i> Lock
                                                  </button>
                                              <?php
                                          }

                                          else if (is_null($row_for_scouring_select['lock_or_unlock']))
                                          {
                                              
                                          }

                                          else
                                          {

                                          }
                                      }

                                      else if ($pp_version_standard == 12) 
                                      { 
                                          if ($row_for_washing_select['lock_or_unlock'] == '0') 
                                          {
                                              ?>
                                                  <button class="btn btn-success" onclick="click_for_lock(<?php echo $select_pp_version; ?> , <?php echo $select_pp_no_id; ?> , <?php echo $pp_version_standard; ?>);">
                                                    <i class="glyphicon glyphicon-ok"></i> Unlock
                                                  </button>
                                              <?php 
                                          }

                                          else if ($row_for_washing_select['lock_or_unlock'] == '1') 
                                          {
                                              ?>
                                                  <button class="btn btn-success" onclick="click_for_unlock(<?php echo $select_pp_version; ?> , <?php echo $select_pp_no_id; ?> , <?php echo $pp_version_standard; ?>);">
                                                    <i class="glyphicon glyphicon-remove"></i> Lock
                                                  </button>
                                              <?php
                                          }

                                          else if (is_null($row_for_washing_select['lock_or_unlock']))
                                          {
                                              
                                          }

                                          else
                                          {

                                          }
                                      }

                                      else if ($pp_version_standard == 13) 
                                      { 
                                          if ($row_for_calendering_select['lock_or_unlock'] == '0') 
                                          {
                                              ?>
                                                  <button class="btn btn-success" onclick="click_for_lock(<?php echo $select_pp_version; ?> , <?php echo $select_pp_no_id; ?> , <?php echo $pp_version_standard; ?>);">
                                                    <i class="glyphicon glyphicon-ok"></i> Unlock
                                                  </button>
                                              <?php 
                                          }

                                          else if ($row_for_calendering_select['lock_or_unlock'] == '1') 
                                          {
                                              ?>
                                                  <button class="btn btn-success" onclick="click_for_unlock(<?php echo $select_pp_version; ?> , <?php echo $select_pp_no_id; ?> , <?php echo $pp_version_standard; ?>);">
                                                    <i class="glyphicon glyphicon-remove"></i> Lock
                                                  </button>
                                              <?php
                                          }

                                          else if (is_null($row_for_calendering_select['lock_or_unlock']))
                                          {
                                              
                                          }

                                          else
                                          {

                                          }
                                      }

                                      else if ($pp_version_standard == 14) 
                                      { 
                                          if ($row_for_sanforizing_select['lock_or_unlock'] == '0') 
                                          {
                                              ?>
                                                  <button class="btn btn-success" onclick="click_for_lock(<?php echo $select_pp_version; ?> , <?php echo $select_pp_no_id; ?> , <?php echo $pp_version_standard; ?>);">
                                                    <i class="glyphicon glyphicon-ok"></i> Unlock
                                                  </button>
                                              <?php 
                                          }

                                          else if ($row_for_sanforizing_select['lock_or_unlock'] == '1') 
                                          {
                                              ?>
                                                  <button class="btn btn-success" onclick="click_for_unlock(<?php echo $select_pp_version; ?> , <?php echo $select_pp_no_id; ?> , <?php echo $pp_version_standard; ?>);">
                                                    <i class="glyphicon glyphicon-remove"></i> Lock
                                                  </button>
                                              <?php
                                          }

                                          else if (is_null($row_for_sanforizing_select['lock_or_unlock']))
                                          {
                                              
                                          }

                                          else
                                          {

                                          }
                                      }

                                      else if ($pp_version_standard == 15) 
                                      { 
                                          if ($row_for_raising_select['lock_or_unlock'] == '0') 
                                          {
                                              ?>
                                                  <button class="btn btn-success" onclick="click_for_lock(<?php echo $select_pp_version; ?> , <?php echo $select_pp_no_id; ?> , <?php echo $pp_version_standard; ?>);">
                                                    <i class="glyphicon glyphicon-ok"></i> Unlock
                                                  </button>
                                              <?php 
                                          }

                                          else if ($row_for_raising_select['lock_or_unlock'] == '1') 
                                          {
                                              ?>
                                                  <button class="btn btn-success" onclick="click_for_unlock(<?php echo $select_pp_version; ?> , <?php echo $select_pp_no_id; ?> , <?php echo $pp_version_standard; ?>);">
                                                    <i class="glyphicon glyphicon-remove"></i> Lock
                                                  </button>
                                              <?php
                                          }

                                          else if (is_null($row_for_raising_select['lock_or_unlock']))
                                          {
                                              
                                          }

                                          else
                                          {

                                          }
                                      }


                                      else if ($pp_version_standard == 16) 
                                      { 
                                          if ($row_for_ready_for_raising_select['lock_or_unlock'] == '0') 
                                          {
                                              ?>
                                                  <button class="btn btn-success" onclick="click_for_lock(<?php echo $select_pp_version; ?> , <?php echo $select_pp_no_id; ?> , <?php echo $pp_version_standard; ?>);">
                                                    <i class="glyphicon glyphicon-ok"></i> Unlock
                                                  </button>
                                              <?php 
                                          }

                                          else if ($row_for_ready_for_raising_select['lock_or_unlock'] == '1') 
                                          {
                                              ?>
                                                  <button class="btn btn-success" onclick="click_for_unlock(<?php echo $select_pp_version; ?> , <?php echo $select_pp_no_id; ?> , <?php echo $pp_version_standard; ?>);">
                                                    <i class="glyphicon glyphicon-remove"></i> Lock
                                                  </button>
                                              <?php
                                          }

                                          else if (is_null($row_for_ready_for_raising_select['lock_or_unlock']))
                                          {
                                              
                                          }

                                          else
                                          {

                                          }
                                      }

                                      else if ($pp_version_standard == 17) 
                                      { 
                                          if ($row_for_ready_for_print_select['lock_or_unlock'] == '0') 
                                          {
                                              ?>
                                                  <button class="btn btn-success" onclick="click_for_lock(<?php echo $select_pp_version; ?> , <?php echo $select_pp_no_id; ?> , <?php echo $pp_version_standard; ?>);">
                                                    <i class="glyphicon glyphicon-ok"></i> Unlock
                                                  </button>
                                              <?php 
                                          }

                                          else if ($row_for_ready_for_print_select['lock_or_unlock'] == '1') 
                                          {
                                              ?>
                                                  <button class="btn btn-success" onclick="click_for_unlock(<?php echo $select_pp_version; ?> , <?php echo $select_pp_no_id; ?> , <?php echo $pp_version_standard; ?>);">
                                                    <i class="glyphicon glyphicon-remove"></i> Lock
                                                  </button>
                                              <?php
                                          }

                                          else if (is_null($row_for_ready_for_print_select['lock_or_unlock']))
                                          {
                                              
                                          }

                                          else
                                          {

                                          }
                                      }

                                      else if ($pp_version_standard == 18) 
                                      { 
                                          if ($row_for_ready_for_dying_select['lock_or_unlock'] == '0') 
                                          {
                                              ?>
                                                  <button class="btn btn-success" onclick="click_for_lock(<?php echo $select_pp_version; ?> , <?php echo $select_pp_no_id; ?> , <?php echo $pp_version_standard; ?>);">
                                                    <i class="glyphicon glyphicon-ok"></i> Unlock
                                                  </button>
                                              <?php 
                                          }

                                          else if ($row_for_ready_for_dying_select['lock_or_unlock'] == '1') 
                                          {
                                              ?>
                                                  <button class="btn btn-success" onclick="click_for_unlock(<?php echo $select_pp_version; ?> , <?php echo $select_pp_no_id; ?> , <?php echo $pp_version_standard; ?>);">
                                                    <i class="glyphicon glyphicon-remove"></i> Lock
                                                  </button>
                                              <?php
                                          }

                                          else if (is_null($row_for_ready_for_dying_select['lock_or_unlock']))
                                          {
                                              
                                          }

                                          else
                                          {

                                          }
                                      }

                                      else
                                      {
                                          echo "no process selected";
                                      }
                                      
                                  ?>
                              </td>
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
                              <td>
                                  <input type="hidden" id="pp_no_id_<?php echo $sl; ?>" name="pp_no_id_<?php echo $sl; ?>" value="<?php echo $pp_no_id; ?>">
                                  <input type="hidden" id="pp_version_<?php echo $sl; ?>" name="pp_version_<?php echo $sl; ?>" value="<?php echo ($row_for_pp_details['pp_id'] == "") ? $pp_version : $row_for_pp_details['pp_id']; ?>">
                                  <input type="hidden" id="pp_version_standard_<?php echo $sl; ?>" name="pp_version_standard_<?php echo $sl; ?>" value="<?php echo $pp_version_standard; ?>">

                                  <!-- after add view purpose -->
                                  <input type="hidden" id="pp_no_id" name="pp_no_id" value="<?php echo $pp_no_id; ?>">
                                  <input type="hidden" id="pp_version" name="pp_version" value="<?php echo $row_for_pp_details['pp_id']; ?>">
                                  <input type="hidden" id="pp_version_standard" name="pp_version_standard" value="<?php echo $pp_version_standard; ?>">
                                  <button type="button" id="gray_issue_add_btn" value="<?php echo $sl; ?>" name="gray_issue_add_btn" onclick="view_standard_select(this.value);" class="btn btn-primary btn-xs"> Action </button>
                              </td>                       
                            </tr>
                          </tbody>
                        </form>
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