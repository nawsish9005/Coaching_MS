<?php
session_start();
require_once("../includes/db_session_chk.php");

$pp_no_id = $_POST['pp_no_id'];
$pp_version_standard = $_POST['pp_version_standard'];

if ($pp_no_id == "" || is_null($pp_no_id) || empty($pp_no_id) || 
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

<?php
    
    $pp_no_id = $_POST['pp_no_id'];
    $pp_version_standard = $_POST['pp_version_standard'];
    $yarn_warp_value1 = $_POST['yarn_warp_value1'];


    if ($pp_no_id == "" || is_null($pp_no_id) || empty($pp_no_id) ||  
        $pp_version_standard == "" || is_null($pp_version_standard) || empty($pp_version_standard)) 
    {
        echo "No data found";
    }

    //for copy data
    else if (isset($yarn_warp_value1))
    {

        if ($pp_version_standard == 1)
          {
              $sql_for_gray_variable = "SELECT gray_variable.*
                                      FROM gray_variable
                                     WHERE gray_variable.pp_no_id = '$pp_no_id' 
                                       AND active = '1'";

              $res_for_gray_variable = mysqli_query($con, $sql_for_gray_variable);
              $row_gray_variable = mysqli_num_rows($res_for_gray_variable);
              if ($row_gray_variable >= 1)
              {
                  require_once("view_standard_of_greige_pp.php");
              }
              else
              {
                  require_once("define_standard_of_greige_pp.php");
              }
          }

          else if ($pp_version_standard == 2)
          {
              $sql_for_singe_standard = "SELECT singe_standard.*
                                      FROM singe_standard
                                     WHERE singe_standard.pp_no_id = '$pp_no_id' 
                                       AND active = '1'";

              $res_for_singe_standard = mysqli_query($con, $sql_for_singe_standard);
              $row_singe_standard = mysqli_num_rows($res_for_singe_standard);
              if ($row_singe_standard >= 1)
              {
                  require_once("view_standard_of_singe_pp.php");
              }
              else
              {
                  require_once("define_standard_of_singe_pp.php");
              }
          }

          else if ($pp_version_standard == 3)
          {
             $sql_for_bleaching_standard = "SELECT bleaching_standard.*
                                      FROM bleaching_standard
                                     WHERE bleaching_standard.pp_no_id = '$pp_no_id' 
                                       AND active = '1'";

              $res_for_bleaching_standard = mysqli_query($con, $sql_for_bleaching_standard);
              $row_bleaching_standard = mysqli_num_rows($res_for_bleaching_standard);
              if ($row_bleaching_standard >= 1)
              {
                  require_once("view_standard_of_bleaching_pp.php");
              }
              else
              {
                  require_once("define_standard_of_bleaching_pp.php");
              }
          }

          else if ($pp_version_standard == 4)
          {
             $sql_for_ready_mercerize_standard = "SELECT ready_mercerize_standard.*
                                      FROM ready_mercerize_standard
                                     WHERE ready_mercerize_standard.pp_no_id = '$pp_no_id' 
                                       AND active = '1'";

              $res_for_ready_mercerize_standard = mysqli_query($con, $sql_for_ready_mercerize_standard);
              $row_ready_mercerize_standard = mysqli_num_rows($res_for_ready_mercerize_standard);
              if ($row_ready_mercerize_standard >= 1)
              {
                  require_once("view_standard_of_ready_mercerize_pp.php");
              }
              else
              {
                  require_once("define_standard_of_ready_mercerize_pp.php");
              }
          }

          else if ($pp_version_standard == 5)
          {
             $sql_for_mercerize_standard = "SELECT mercerize_standard.*
                                      FROM mercerize_standard
                                     WHERE mercerize_standard.pp_no_id = '$pp_no_id' 
                                       AND active = '1'";

              $res_for_mercerize_standard = mysqli_query($con, $sql_for_mercerize_standard);
              $row_mercerize_standard = mysqli_num_rows($res_for_mercerize_standard);
              if ($row_mercerize_standard >= 1)
              {
                  require_once("view_standard_of_mercerize_pp.php");
              }
              else
              {
                  require_once("define_standard_of_mercerize_pp.php");
              }
          }

          else if ($pp_version_standard == 6)
          {
             $sql_for_equalize_standard = "SELECT equalize_standard.*
                                      FROM equalize_standard
                                     WHERE equalize_standard.pp_no_id = '$pp_no_id' 
                                       AND active = '1'";

              $res_for_equalize_standard = mysqli_query($con, $sql_for_equalize_standard);
              $row_equalize_standard = mysqli_num_rows($res_for_equalize_standard);
              if ($row_equalize_standard >= 1)
              {
                  require_once("view_standard_of_equalize_pp.php");
              }
              else
              {
                  require_once("define_standard_of_equalize_pp.php");
              }
          }

          else if ($pp_version_standard == 7)
          {
             $sql_for_printing_standard = "SELECT printing_standard.*
                                      FROM printing_standard
                                     WHERE printing_standard.pp_no_id = '$pp_no_id' 
                                       AND active = '1'";

              $res_for_printing_standard = mysqli_query($con, $sql_for_printing_standard);
              $row_printing_standard = mysqli_num_rows($res_for_printing_standard);
              if ($row_printing_standard >= 1)
              {
                  require_once("view_standard_of_printing_pp.php");
              }
              else
              {
                  require_once("define_standard_of_printing_pp.php");
              }
          }

          else if ($pp_version_standard == 8)
          {
             $sql_for_curing_standard = "SELECT curing_standard.*
                                      FROM curing_standard
                                     WHERE curing_standard.pp_no_id = '$pp_no_id' 
                                       AND active = '1'";

              $res_for_curing_standard = mysqli_query($con, $sql_for_curing_standard);
              $row_curing_standard = mysqli_num_rows($res_for_curing_standard);
              if ($row_curing_standard >= 1)
              {
                  require_once("view_standard_of_curing_pp.php");
              }
              else
              {
                  require_once("define_standard_of_curing_pp.php");
              }
          }

          else if ($pp_version_standard == 9)
          {
             $sql_for_finishing_standard = "SELECT finishing_standard.*
                                      FROM finishing_standard
                                     WHERE finishing_standard.pp_no_id = '$pp_no_id' 
                                       AND active = '1'";

              $res_for_finishing_standard = mysqli_query($con, $sql_for_finishing_standard);
              $row_finishing_standard = mysqli_num_rows($res_for_finishing_standard);
              if ($row_finishing_standard >= 1)
              {
                  require_once("view_standard_of_finishing_pp.php");
              }
              else
              {
                  require_once("define_standard_of_finishing_pp.php");
              }
          }

          else if ($pp_version_standard == 10)
          {
             $sql_for_scouring_bleaching_standard = "SELECT scouring_bleaching_standard.*
                                      FROM scouring_bleaching_standard
                                     WHERE scouring_bleaching_standard.pp_no_id = '$pp_no_id' 
                                       AND active = '1'";

              $res_for_scouring_bleaching_standard = mysqli_query($con, $sql_for_scouring_bleaching_standard);
              $row_scouring_bleaching_standard = mysqli_num_rows($res_for_scouring_bleaching_standard);
              if ($row_scouring_bleaching_standard >= 1)
              {
                  require_once("view_standard_of_scouring_bleaching_pp.php");
              }
              else
              {
                  require_once("define_standard_of_scouring_bleaching_pp.php");
              }
          }

          else if ($pp_version_standard == 11)
          {
             $sql_for_scouring_standard = "SELECT scouring_standard.*
                                      FROM scouring_standard
                                     WHERE scouring_standard.pp_no_id = '$pp_no_id' 
                                       AND active = '1'";

              $res_for_scouring_standard = mysqli_query($con, $sql_for_scouring_standard);
              $row_scouring_standard = mysqli_num_rows($res_for_scouring_standard);
              if ($row_scouring_standard >= 1)
              {
                  require_once("view_standard_of_scouring_pp.php");
              }
              else
              {
                  require_once("define_standard_of_scouring_pp.php");
              }
          }



          else if ($pp_version_standard == 12)
          {
             $sql_for_washing_standard = "SELECT washing_standard.*
                                      FROM washing_standard
                                     WHERE washing_standard.pp_no_id = '$pp_no_id' 
                                       AND active = '1'";

              $res_for_washing_standard = mysqli_query($con, $sql_for_washing_standard);
              $row_washing_standard = mysqli_num_rows($res_for_washing_standard);
              if ($row_washing_standard >= 1)
              {
                  require_once("view_standard_of_washing_pp.php");
              }
              else
              {
                  require_once("define_standard_of_washing_pp.php");
              }
          }

          else if ($pp_version_standard == 13)
          {
             $sql_for_calendering_standard = "SELECT calendering_standard.*
                                      FROM calendering_standard
                                     WHERE calendering_standard.pp_no_id = '$pp_no_id' 
                                       AND active = '1'";

              $res_for_calendering_standard = mysqli_query($con, $sql_for_calendering_standard);
              $row_calendering_standard = mysqli_num_rows($res_for_calendering_standard);
              if ($row_calendering_standard >= 1)
              {
                  require_once("view_standard_of_calendering_pp.php");
              }
              else
              {
                  require_once("define_standard_of_calendering_pp.php");
              }
          }

          else if ($pp_version_standard == 14)
          {
             $sql_for_sanforizing_standard = "SELECT sanforizing_standard.*
                                      FROM sanforizing_standard
                                     WHERE sanforizing_standard.pp_no_id = '$pp_no_id'                                        AND active = '1'";

              $res_for_sanforizing_standard = mysqli_query($con, $sql_for_sanforizing_standard);
              $row_sanforizing_standard = mysqli_num_rows($res_for_sanforizing_standard);
              if ($row_sanforizing_standard >= 1)
              {
                  require_once("view_standard_of_sanforizing_pp.php");
              }
              else
              {
                  require_once("define_standard_of_sanforizing_pp.php");
              }
          }

          else if ($pp_version_standard == 15)
          {
             $sql_for_sanforizing_standard = "SELECT raising_standard.*
                                      FROM raising_standard
                                     WHERE raising_standard.pp_no_id = '$pp_no_id'                                        AND active = '1'";

              $res_for_sanforizing_standard = mysqli_query($con, $sql_for_sanforizing_standard);
              $row_sanforizing_standard = mysqli_num_rows($res_for_sanforizing_standard);
              if ($row_sanforizing_standard >= 1)
              {
                  require_once("view_standard_of_raising_pp.php");
              }
              else
              {
                  require_once("define_standard_of_raising_pp.php");
              }
          }

          else if ($pp_version_standard == 16)
          {
             $sql_for_sanforizing_standard = "SELECT ready_for_raising_standard.*
                                      FROM ready_for_raising_standard
                                     WHERE ready_for_raising_standard.pp_no_id = '$pp_no_id'                                        AND active = '1'";

              $res_for_sanforizing_standard = mysqli_query($con, $sql_for_sanforizing_standard);
              $row_sanforizing_standard = mysqli_num_rows($res_for_sanforizing_standard);
              if ($row_sanforizing_standard >= 1)
              {
                  require_once("view_standard_of_ready_raising_pp.php");
              }
              else
              {
                  require_once("define_standard_of_ready_raising_pp.php");
              }
          }


          else if ($pp_version_standard == 17)
          {
             $sql_for_sanforizing_standard = "SELECT ready_for_print_standard.*
                                      FROM ready_for_print_standard
                                     WHERE ready_for_print_standard.pp_no_id = '$pp_no_id'                                        AND active = '1'";

              $res_for_sanforizing_standard = mysqli_query($con, $sql_for_sanforizing_standard);
              $row_sanforizing_standard = mysqli_num_rows($res_for_sanforizing_standard);
              if ($row_sanforizing_standard >= 1)
              {
                  require_once("view_standard_of_ready_for_print_pp.php");
              }
              else
              {
                  require_once("define_standard_of_ready_for_print_pp.php");
              }
          }

          else if ($pp_version_standard == 18)
          {
             $sql_for_sanforizing_standard = "SELECT ready_for_dying_standard.*
                                      FROM ready_for_dying_standard
                                     WHERE ready_for_dying_standard.pp_no_id = '$pp_no_id'                                        AND active = '1'";

              $res_for_sanforizing_standard = mysqli_query($con, $sql_for_sanforizing_standard);
              $row_sanforizing_standard = mysqli_num_rows($res_for_sanforizing_standard);
              if ($row_sanforizing_standard >= 1)
              {
                  require_once("view_standard_of_ready_for_dying_pp.php");
              }
              else
              {
                  require_once("define_standard_of_ready_for_dying_pp.php");
              }
          }


          else
          {
             echo "no one selected";
          }
    }


    else
    {

        if ($pp_version_standard == 1)
          {
              $sql_for_gray_variable = "SELECT gray_variable.*
                                      FROM gray_variable
                                     WHERE gray_variable.pp_no_id = '$pp_no_id' 
                                       AND active = '1'";

              $res_for_gray_variable = mysqli_query($con, $sql_for_gray_variable);
              $row_gray_variable = mysqli_num_rows($res_for_gray_variable);
              if ($row_gray_variable >= 1)
              {
                  require_once("view_standard_of_greige_pp.php");
              }
              else
              {
                  require_once("define_standard_of_greige_pp.php");
              }
          }

          else if ($pp_version_standard == 2)
          {
              $sql_for_singe_standard = "SELECT singe_standard.*
                                      FROM singe_standard
                                     WHERE singe_standard.pp_no_id = '$pp_no_id' 
                                       AND active = '1'";

              $res_for_singe_standard = mysqli_query($con, $sql_for_singe_standard);
              $row_singe_standard = mysqli_num_rows($res_for_singe_standard);
              if ($row_singe_standard >= 1)
              {
                  require_once("view_standard_of_singe_pp.php");
              }
              else
              {
                  require_once("define_standard_of_singe_pp.php");
              }
          }

          else if ($pp_version_standard == 3)
          {
             $sql_for_bleaching_standard = "SELECT bleaching_standard.*
                                      FROM bleaching_standard
                                     WHERE bleaching_standard.pp_no_id = '$pp_no_id' 
                                       AND active = '1'";

              $res_for_bleaching_standard = mysqli_query($con, $sql_for_bleaching_standard);
              $row_bleaching_standard = mysqli_num_rows($res_for_bleaching_standard);
              if ($row_bleaching_standard >= 1)
              {
                  require_once("view_standard_of_bleaching_pp.php");
              }
              else
              {
                  require_once("define_standard_of_bleaching_pp.php");
              }
          }

          else if ($pp_version_standard == 4)
          {
             $sql_for_ready_mercerize_standard = "SELECT ready_mercerize_standard.*
                                      FROM ready_mercerize_standard
                                     WHERE ready_mercerize_standard.pp_no_id = '$pp_no_id' 
                                       AND active = '1'";

              $res_for_ready_mercerize_standard = mysqli_query($con, $sql_for_ready_mercerize_standard);
              $row_ready_mercerize_standard = mysqli_num_rows($res_for_ready_mercerize_standard);
              if ($row_ready_mercerize_standard >= 1)
              {
                  require_once("view_standard_of_ready_mercerize_pp.php");
              }
              else
              {
                  require_once("define_standard_of_ready_mercerize_pp.php");
              }
          }

          else if ($pp_version_standard == 5)
          {
             $sql_for_mercerize_standard = "SELECT mercerize_standard.*
                                      FROM mercerize_standard
                                     WHERE mercerize_standard.pp_no_id = '$pp_no_id' 
                                       AND active = '1'";

              $res_for_mercerize_standard = mysqli_query($con, $sql_for_mercerize_standard);
              $row_mercerize_standard = mysqli_num_rows($res_for_mercerize_standard);
              if ($row_mercerize_standard >= 1)
              {
                  require_once("view_standard_of_mercerize_pp.php");
              }
              else
              {
                  require_once("define_standard_of_mercerize_pp.php");
              }
          }

          else if ($pp_version_standard == 6)
          {
             $sql_for_equalize_standard = "SELECT equalize_standard.*
                                      FROM equalize_standard
                                     WHERE equalize_standard.pp_no_id = '$pp_no_id' 
                                       AND active = '1'";

              $res_for_equalize_standard = mysqli_query($con, $sql_for_equalize_standard);
              $row_equalize_standard = mysqli_num_rows($res_for_equalize_standard);
              if ($row_equalize_standard >= 1)
              {
                  require_once("view_standard_of_equalize_pp.php");
              }
              else
              {
                  require_once("define_standard_of_equalize_pp.php");
              }
          }

          else if ($pp_version_standard == 7)
          {
             $sql_for_printing_standard = "SELECT printing_standard.*
                                      FROM printing_standard
                                     WHERE printing_standard.pp_no_id = '$pp_no_id' 
                                       AND active = '1'";

              $res_for_printing_standard = mysqli_query($con, $sql_for_printing_standard);
              $row_printing_standard = mysqli_num_rows($res_for_printing_standard);
              if ($row_printing_standard >= 1)
              {
                  require_once("view_standard_of_printing_pp.php");
              }
              else
              {
                  require_once("define_standard_of_printing_pp.php");
              }
          }

          else if ($pp_version_standard == 8)
          {
             $sql_for_curing_standard = "SELECT curing_standard.*
                                      FROM curing_standard
                                     WHERE curing_standard.pp_no_id = '$pp_no_id' 
                                       AND active = '1'";

              $res_for_curing_standard = mysqli_query($con, $sql_for_curing_standard);
              $row_curing_standard = mysqli_num_rows($res_for_curing_standard);
              if ($row_curing_standard >= 1)
              {
                  require_once("view_standard_of_curing_pp.php");
              }
              else
              {
                  require_once("define_standard_of_curing_pp.php");
              }
          }

          else if ($pp_version_standard == 9)
          {
             $sql_for_finishing_standard = "SELECT finishing_standard.*
                                      FROM finishing_standard
                                     WHERE finishing_standard.pp_no_id = '$pp_no_id' 
                                       AND active = '1'";

              $res_for_finishing_standard = mysqli_query($con, $sql_for_finishing_standard);
              $row_finishing_standard = mysqli_num_rows($res_for_finishing_standard);
              if ($row_finishing_standard >= 1)
              {
                  require_once("view_standard_of_finishing_pp.php");
              }
              else
              {
                  require_once("define_standard_of_finishing_pp.php");
              }
          }

          else if ($pp_version_standard == 10)
          {
             $sql_for_scouring_bleaching_standard = "SELECT scouring_bleaching_standard.*
                                      FROM scouring_bleaching_standard
                                     WHERE scouring_bleaching_standard.pp_no_id = '$pp_no_id' 
                                       AND active = '1'";

              $res_for_scouring_bleaching_standard = mysqli_query($con, $sql_for_scouring_bleaching_standard);
              $row_scouring_bleaching_standard = mysqli_num_rows($res_for_scouring_bleaching_standard);
              if ($row_scouring_bleaching_standard >= 1)
              {
                  require_once("view_standard_of_scouring_bleaching_pp.php");
              }
              else
              {
                  require_once("define_standard_of_scouring_bleaching_pp.php");
              }
          }

          else if ($pp_version_standard == 11)
          {
             $sql_for_scouring_standard = "SELECT scouring_standard.*
                                      FROM scouring_standard
                                     WHERE scouring_standard.pp_no_id = '$pp_no_id' 
                                       AND active = '1'";

              $res_for_scouring_standard = mysqli_query($con, $sql_for_scouring_standard);
              $row_scouring_standard = mysqli_num_rows($res_for_scouring_standard);
              if ($row_scouring_standard >= 1)
              {
                  require_once("view_standard_of_scouring_pp.php");
              }
              else
              {
                  require_once("define_standard_of_scouring_pp.php");
              }
          }

          else if ($pp_version_standard == 12)
          {
             $sql_for_washing_standard = "SELECT washing_standard.*
                                      FROM washing_standard
                                     WHERE washing_standard.pp_no_id = '$pp_no_id' 
                                       AND active = '1'";

              $res_for_washing_standard = mysqli_query($con, $sql_for_washing_standard);
              $row_washing_standard = mysqli_num_rows($res_for_washing_standard);
              if ($row_washing_standard >= 1)
              {
                  require_once("view_standard_of_washing_pp.php");
              }
              else
              {
                  require_once("define_standard_of_washing_pp.php");
              }
          }

          else if ($pp_version_standard == 13)
          {
             $sql_for_calendering_standard = "SELECT calendering_standard.*
                                      FROM calendering_standard
                                     WHERE calendering_standard.pp_no_id = '$pp_no_id' 
                                       AND active = '1'";

              $res_for_calendering_standard = mysqli_query($con, $sql_for_calendering_standard);
              $row_calendering_standard = mysqli_num_rows($res_for_calendering_standard);
              if ($row_calendering_standard >= 1)
              {
                  require_once("view_standard_of_calendering_pp.php");
              }
              else
              {
                  require_once("define_standard_of_calendering_pp.php");
              }
          }

          else if ($pp_version_standard == 14)
          {
             $sql_for_sanforizing_standard = "SELECT sanforizing_standard.*
                                      FROM sanforizing_standard
                                     WHERE sanforizing_standard.pp_no_id = '$pp_no_id' 
                                       AND active = '1'";

              $res_for_sanforizing_standard = mysqli_query($con, $sql_for_sanforizing_standard);
              $row_sanforizing_standard = mysqli_num_rows($res_for_sanforizing_standard);
              if ($row_sanforizing_standard >= 1)
              {
                  require_once("view_standard_of_sanforizing_pp.php");
              }
              else
              {
                  require_once("define_standard_of_sanforizing_pp.php");
              }
          }

          else if ($pp_version_standard == 15)
          {
             $sql_for_sanforizing_standard = "SELECT raising_standard.*
                                      FROM raising_standard
                                     WHERE raising_standard.pp_no_id = '$pp_no_id'                                        AND active = '1'";

              $res_for_sanforizing_standard = mysqli_query($con, $sql_for_sanforizing_standard);
              $row_sanforizing_standard = mysqli_num_rows($res_for_sanforizing_standard);
              if ($row_sanforizing_standard >= 1)
              {
                  require_once("view_standard_of_raising_pp.php");
              }
              else
              {
                  require_once("define_standard_of_raising_pp.php");
              }
          }

          else if ($pp_version_standard == 16)
          {
             $sql_for_sanforizing_standard = "SELECT ready_for_raising_standard.*
                                      FROM ready_for_raising_standard
                                     WHERE ready_for_raising_standard.pp_no_id = '$pp_no_id'                                        AND active = '1'";

              $res_for_sanforizing_standard = mysqli_query($con, $sql_for_sanforizing_standard);
              $row_sanforizing_standard = mysqli_num_rows($res_for_sanforizing_standard);
              if ($row_sanforizing_standard >= 1)
              {
                  require_once("view_standard_of_ready_raising_pp.php");
              }
              else
              {
                  require_once("define_standard_of_ready_raising_pp.php");
              }
          }

          else if ($pp_version_standard == 17)
          {
             $sql_for_sanforizing_standard = "SELECT ready_for_print_standard.*
                                      FROM ready_for_print_standard
                                     WHERE ready_for_print_standard.pp_no_id = '$pp_no_id'                                        AND active = '1'";

              $res_for_sanforizing_standard = mysqli_query($con, $sql_for_sanforizing_standard);
              $row_sanforizing_standard = mysqli_num_rows($res_for_sanforizing_standard);
              if ($row_sanforizing_standard >= 1)
              {
                  require_once("view_standard_of_ready_for_print_pp.php");
              }
              else
              {
                  require_once("define_standard_of_ready_for_print_pp.php");
              }
          }

          else if ($pp_version_standard == 18)
          {
             $sql_for_sanforizing_standard = "SELECT ready_for_dying_standard.*
                                      FROM ready_for_dying_standard
                                     WHERE ready_for_dying_standard.pp_no_id = '$pp_no_id'                                        AND active = '1'";

              $res_for_sanforizing_standard = mysqli_query($con, $sql_for_sanforizing_standard);
              $row_sanforizing_standard = mysqli_num_rows($res_for_sanforizing_standard);
              if ($row_sanforizing_standard >= 1)
              {
                  require_once("view_standard_of_ready_for_dying_pp.php");
              }
              else
              {
                  require_once("define_standard_of_ready_for_dying_pp.php");
              }
          }

          else
          {
             echo "no one selected";
          }
    }
        
    }
    else
    {
        echo "Data Not Found!";
    }
}
?>