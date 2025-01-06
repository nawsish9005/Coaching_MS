<?php
session_start();
require_once("../includes/db_session_chk.php");

$pp_no_id = $_POST['pp_no_id'];
$pp_version = $_POST['pp_version'];
//$greige_issunce_id = $_POST['greige_issunce_id'];

if ($pp_no_id == "" || is_null($pp_no_id) || empty($pp_no_id) || 
    $pp_version == "" || is_null($pp_version) || empty($pp_version)) 
{
    echo "No data found";
}

else
{

  $sql_for_pp = "SELECT greige_issunce.*, pp_details.*, pp.*
                 FROM greige_issunce , pp_details, pp
                 WHERE greige_issunce.pp_no_id = '$pp_no_id'
                 AND greige_issunce.status = '1'
                 AND greige_issunce.active = '1'
                 AND pp_details.pp_no_id = greige_issunce.pp_no_id
                 AND pp_details.pp_id = greige_issunce.pp_details_id
                 AND pp.pp_id = pp_details.pp_no_id
                 ANd pp_details.pp_id = '$pp_version'
                 LIMIT 1
               ";

  $res_for_pp = mysqli_query($con, $sql_for_pp);
  $res_for_pp_row_check = mysqli_num_rows($res_for_pp);

  if ($res_for_pp_row_check >= 1)
  {
      $sql_for_pp = "SELECT pp.*, pp_details.*
                     FROM pp, pp_details
                    WHERE pp.pp_id = '$pp_no_id'
                    AND pp_details.pp_id = '$pp_version' ";

    $res_for_pp = mysqli_query($con, $sql_for_pp);
    $row_check = mysqli_num_rows($res_for_pp);

      if ($row_check >= 1)
      {
          $row = mysqli_fetch_array($res_for_pp);

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
                        <th>Date</th>
                        <th>Customer</th>
                        <th>Week</th>
                        <th>Version</th>
                        <th>Color</th>
                        <th>Greige Width</th>
                        <th>Finish Width</th>
                        <th>Order Quantity</th>
                      </tr>
                    </thead>
                    
                    <tbody>
                      <?php 
                        $s1 = 1;
                        $sql_for_pp = "SELECT greige_issunce.*, pp_details.*, pp.*
                                       FROM greige_issunce , pp_details, pp
                                       WHERE greige_issunce.pp_no_id = '$pp_no_id'
                                       AND greige_issunce.status = '1'
                                       AND greige_issunce.active = '1'
                                       AND pp_details.pp_no_id = greige_issunce.pp_no_id
                                       AND pp_details.pp_id = greige_issunce.pp_details_id
                                       AND pp.pp_id = pp_details.pp_no_id
                                       ANd pp_details.pp_id = '$pp_version'
                                       AND pp_details.active = '1'
                                       LIMIT 1
                                     ";

                      $res_for_pp = mysqli_query($con, $sql_for_pp);
                      
                        while ($row = mysqli_fetch_assoc($res_for_pp)) 
                        {
                        ?>
                        <tr>
                          <td><?php echo $s1; ?></td>
                          <td><?php echo $row['issue_date'] ?></td>
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
                          <td><?php echo $row['finish_width'] ?></td>
                          <td><?php echo $row['quantity'] ?></td>
                          <?php 
                              if (isset($_POST['greige_issunce_id'])) 
                              {
                                  echo $greige_issunce_id  = $_POST['greige_issunce_id'];
                              }
                              else
                              {
                                  echo $greige_issunce_id  = $row['greige_issunce_id'];
                              }
                              $sql_for_greige_issunce = "SELECT * FROM route_issue WHERE greige_issunce_id = '$greige_issunce_id' AND active = '1' ";
                              $res_for_greige_issunce = mysqli_query($con, $sql_for_greige_issunce);
                              $row_for_greige_issunce = mysqli_num_rows($res_for_greige_issunce);
                            ?>
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

          $sql_for_route_issue = "SELECT greige_issunce.*, route_issue.*
                                      FROM greige_issunce, route_issue
                                     WHERE greige_issunce.pp_no_id = '$pp_no_id' 
                                       AND greige_issunce.pp_details_id = '$pp_version'
                                       AND greige_issunce.active = '1'
                                       AND route_issue.greige_issunce_id = greige_issunce.greige_issunce_id
                                       AND route_issue.active = '1' ";

          // $sql_for_route_issue = "SELECT greige_issunce.*, pp_details.*, pp.*
          //                              FROM greige_issunce , pp_details, pp
          //                              WHERE greige_issunce.pp_no_id = '$pp_no_id'
          //                              AND greige_issunce.status = '1'
          //                              AND greige_issunce.active = '1'
          //                              AND pp_details.pp_no_id = greige_issunce.pp_no_id
          //                              AND pp_details.id = greige_issunce.pp_details_id
          //                              AND pp.pp_id = pp_details.pp_no_id
          //                              ANd pp_details.id = '$pp_version'
          //                              LIMIT 1";


          $res_for_route_issue = mysqli_query($con, $sql_for_route_issue);
          $row_route_issue = mysqli_fetch_assoc($res_for_route_issue);
          $row_route_issue_count = mysqli_num_rows($res_for_route_issue);
          if ($row_route_issue_count >= 1)
          {
              //echo "data already store";
              //require_once("view_route_issue_for_version.php");
              ?>
                <h2 class="text-center" style="color:red; margin: 40px 0px;">For edit and add Route Issue go this place. <a href="route_issue.php">Click Here</a></h2>
              <?php
          }
          else
          {   
              //echo $row_route_issue['greige_issunce.greige_issunce_id'];
              require_once("add_route_issue_for_version.php");
          }
      }
      else
      {
          echo "Data Not Found!";
      }
    }

    else
    {
      echo "<h2 class='text-center' style='color: red;'>Please define greige issunce first</h2>";
    }
}
?>