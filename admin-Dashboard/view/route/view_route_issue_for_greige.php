<?php
session_start();
require_once("../includes/db_session_chk.php");
$greige_issunce_id = $_POST['greige_issunce_id_for_view'];
$pp_no_id = $_POST['pp_no_id_for_view'];
$pp_details_id = $_POST['pp_details_id_for_view'];
$route_issue_id = $_POST['route_issue_id_for_view'];
?>

<div class="x_panel">
    <div class="x_title">
      <h2>Route Issue</h2>
      <ul class="nav navbar-right panel_toolbox">
        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
        </li>
      </ul>
      <div class="clearfix"></div>
    </div>

    <?php 

    $sql_for_pp = "SELECT process_program_info.*
                     FROM process_program_info
                    WHERE process_program_info.pp_id = '$pp_no_id'";

    $res_for_pp = mysqli_query($con, $sql_for_pp);
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
                          AND version_wise_process_program_info.pp_id = '$pp_details_id'
                     GROUP BY process_name_define_after_greige_receiving.greige_issunce_id";



      $res_for_pp = mysqli_query($con, $sql_for_pp);

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
                                  $sql_for_total_quantity = "SELECT SUM(quantity) AS total_quantity FROM pp_details WHERE pp_no_id = '$pp_no_id'";
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
                          <th>Greige Received Quantity</th>
                          <th>Yarn Warp</th>
                          <th>Yarn Weft</th>
                          <th>Thread EPI</th>
                          <th>Thread PPI</th>
                          <th>GSM</th>
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
                                            AND process_name_define_after_greige_receiving.greige_issunce_id = '$greige_issunce_id'
                                            AND version_wise_process_program_info.pp_id = '$pp_details_id'
                                       GROUP BY process_name_define_after_greige_receiving.greige_issunce_id";



                        $res_for_pp_details = mysqli_query($con, $sql_for_pp_details);
                          
                          while ($row_details_for_pp = mysqli_fetch_assoc($res_for_pp_details)) 
                          {
                              $total_received_quantity += $row_details_for_pp['received_quantity'];
                            ?>
                            <tr>
                              <input type="hidden" id="database_row" name="database_row" value="<?php echo $row['row_counter']; ?>">
                              <td><?php echo $row_details_for_pp['received_quantity'] ?></td>
                              <td><?php echo $row_details_for_pp['yarn_warp'] ?></td>
                              <td><?php echo $row_details_for_pp['yarn_weft'] ?></td>
                              <td><?php echo $row_details_for_pp['thread_epi'] ?></td>
                              <td><?php echo $row_details_for_pp['thread_ppi'] ?></td>
                              <td><?php echo $row_details_for_pp['gsm'] ?></td>
                            </tr>
                            <?php 
                              ++$s1;
                           }
                        
                        ?>
                      </tbody> 
                    </table>
                  </div>
                </div>
              </div>
          </div>
    
    <div>
      <form action="greige_details_view.php" method="post" style="display: inline;">
        <input type="hidden" id="greige_issunce_id" name="greige_issunce_id" value="<?php echo $greige_issunce_id; ?>">
        <input type="hidden" id="pp_no_id" name="pp_no_id" value="<?php echo $pp_no_id; ?>">
         <input type="hidden" id="route_issue_id" name="route_issue_id" value="<?php echo $route_issue_id; ?>">
        <input type="hidden" id="pp_details_id" name="pp_details_id" value="<?php echo $pp_details_id; ?>">
        <button type="submit" id="gray_issue_add_btn" name="gray_issue_add_btn" class="btn btn-primary btn-xs">
            Go This Greige Deatils
        </button>
      </form>
    </div>

    <div class="x_content">
      <table id="datatable-buttons" class="table table-striped table-bordered">
        <thead>
          <tr>
            <th>SI</th>
            <th>Process Name</th>
            <th>Process/Reprocess</th>
            <th>Action</th>
          </tr>
        </thead>

        <tbody>
          <?php
            $s1 = 1;
            $sql_for_pp = "SELECT *
                           FROM
                            (SELECT * FROM process_name_define_after_greige_receiving WHERE greige_issunce_id = '$greige_issunce_id' AND active = '1' ORDER BY id DESC) AS t
                           GROUP BY route_issue_id
                           ";

            $res_for_pp = mysqli_query($con, $sql_for_pp);
            while ($row = mysqli_fetch_assoc($res_for_pp))
            {
              ?>
              <tr>
                <td><?php echo $s1; ?></td>
                <td>
                  <?php
                    $route_id = $row['route'];
                    $sql_for_route = "SELECT process_name FROM process_name WHERE process_id = '$route_id'";
                    $res_for_route = mysqli_query($con, $sql_for_route);
                    $row_for_route = mysqli_fetch_assoc($res_for_route);
                    echo $row_for_route['process_name'];
                   ?>
                </td>
                <td><?php echo $row['process'] ?></td>
                <td>
                  <?php
                    $route_id = $row['route'];
                    $active_now = $row['active'];
                    $complete = $row['complete'];
                    
                      if ($route_id == 1)
                      {
                        $route_action_path = "../singe/add_singe.php";
                      }
                      elseif ($route_id == 2)
                      {
                        $route_action_path = "../bleaching/add_bleaching.php";
                      }
                      elseif ($route_id == 3)
                      {
                        $route_action_path = "../mercerize/add_mercerize.php";
                      }
                      elseif ($route_id == 4)
                      {
                        $route_action_path = "../ready_mercerize/add_ready_mercerize.php";
                      }
                      elseif ($route_id == 5)
                      {
                        $route_action_path = "../equalize/add_equalize.php";
                      }
                      elseif ($route_id == 6)
                      {
                        $route_action_path = "../printing/add_printing.php";
                      }
                      elseif ($route_id == 7)
                      {
                        $route_action_path = "../curing_steaming/add_curing_steaming.php";
                      }
                      elseif ($route_id == 8)
                      {
                        $route_action_path = "../dyeing/add_dyeing.php";
                      }
                      elseif ($route_id == 9)
                      {
                        $route_action_path = "../washing/add_washing.php";
                      }
                      elseif ($route_id == 10)
                      {
                        $route_action_path = "../finishing/add_finishing.php";
                      }
                      elseif ($route_id == 11)
                      {
                        $route_action_path = "../calendering/add_calendering.php";
                      }
                      elseif ($route_id == 12)
                      {
                        $route_action_path = "../sanforize/add_sanforize.php";
                      }
                      elseif ($route_id == 13)
                      {
                        $route_action_path = "../raising/add_raising.php";
                      }
                      // elseif ($route_id == 14)
                      // {
                      //   $route_action_path = "../sanforize/add_sanforize.php";
                      // }
                      elseif ($route_id == 15)
                      {
                        $route_action_path = "../scouring_bleaching/add_scouring_bleaching.php";
                      }
                      elseif ($route_id == 16)
                      {
                        $route_action_path = "../scouring/add_scouring.php";
                      }
                      elseif ($route_id == 17)
                      {
                        $route_action_path = "../ready_for_print/add_ready_for_print.php";
                      }
                      elseif ($route_id == 18)
                      {
                        $route_action_path = "../ready_for_dye/add_ready_for_dye.php";
                      }
                      elseif ($route_id == 19)
                      {
                        $route_action_path = "../ready_raising/add_ready_for_raising.php";
                      }
                       elseif ($route_id ==20)
                      {
                       $route_action_path = "../steaming/add_steaming.php";
                                          
                      }
                      else
                      {
                        $route_action_path = "../raising/add_raising.php";
                      }

                      ?>
                        <form action="<?php echo $route_action_path; ?>" method="post" style="display: inline;">
                          <input type="hidden" id="route_issue_id" name="route_issue_id" value="<?php echo $row['route_issue_id']; ?>">
                          <input type="hidden" id="greige_issunce_id" name="greige_issunce_id" value="<?php echo $row['greige_issunce_id']; ?>">
                          <input type="hidden" id="pp_no_id" name="pp_no_id" value="<?php echo $pp_no_id; ?>">
                          <input type="hidden" id="pp_details_id" name="pp_details_id" value="<?php echo $pp_details_id; ?>">
                          <button type="submit" id="gray_issue_add_btn" name="gray_issue_add_btn" class="btn btn-primary btn-xs">
                              Add 
                          </button>
                        </form>
                      <?php

                    if ($complete == 1)
                    {
                      if ($route_id == 1)
                      {
                        $route_action_path = "../singe/edit_singe.php";
                        $route_view = "../singe/view_singe.php";
                      }
                      elseif ($route_id == 2)
                      {
                        $route_action_path = "../bleaching/edit_bleaching.php";
                        $route_view = "../bleaching/view_bleaching.php";
                      }
                      elseif ($route_id == 3)
                      {
                        $route_action_path = "../mercerize/edit_mercerize.php";
                        $route_view = "../mercerize/view_mercerize.php";
                      }
                      elseif ($route_id == 4)
                      {
                        $route_action_path = "../ready_mercerize/edit_ready_mercerize.php";
                        $route_view = "../ready_mercerize/view_ready_mercerize.php";
                      }
                      elseif ($route_id == 5)
                      {
                        $route_action_path = "../equalize/edit_equalize.php";
                        $route_view = "../equalize/view_equalize.php";
                      }
                      elseif ($route_id == 6)
                      {
                        $route_action_path = "../printing/edit_printing.php";
                        $route_view = "../printing/view_printing.php";
                      }
                      elseif ($route_id == 7)
                      {
                        $route_action_path = "../curing_steaming/edit_curing_steaming.php";
                        $route_view = "../curing_steaming/view_curing_steaming.php";
                      }
                      elseif ($route_id == 8)
                      {
                        $route_action_path = "../dyeing/edit_dyeing.php";
                        $route_view = "../dyeing/view_dyeing.php";
                      }
                      elseif ($route_id == 9)
                      {
                        $route_action_path = "../washing/edit_washing.php";
                        $route_view = "../washing/view_washing.php";
                      }
                      elseif ($route_id == 10)
                      {
                        $route_action_path = "../finishing/edit_finishing.php";
                        $route_view = "../finishing/view_finishing.php";
                      }
                      elseif ($route_id == 11)
                      {
                        $route_action_path = "../calender/edit_calender.php";
                        $route_view = "../calender/view_calender.php";
                      }
                      elseif ($route_id == 12)
                      {
                        $route_action_path = "../sanforize/edit_sanforize.php";
                        $route_view = "../sanforize/view_sanforize.php";
                      }

                      elseif ($route_id == 13)
                      {
                        //$route_action_path = "../raising/add_raising.php";
                        $route_action_path = "../raising/edit_raising.php";
                        $route_view = "../raising/view_raising.php";
                      }
                      // elseif ($route_id == 14)
                      // {
                      //   $route_action_path = "../sanforize/add_sanforize.php";
                      // }
                      elseif ($route_id == 15)
                      {
                        //$route_action_path = "../bleaching/add_bleaching.php";
                        $route_action_path = "../scouring_bleaching/edit_scouring_bleaching.php";
                        $route_view = "../scouring_bleaching/view_scouring_bleaching.php";
                      }
                      elseif ($route_id == 16)
                      {
                        //$route_action_path = "../scouring/add_scouring.php";
                        $route_action_path = "../scouring/edit_scouring.php";
                        $route_view = "../scouring/view_scouring.php";
                      }
                      elseif ($route_id == 17)
                      {
                        //$route_action_path = "../ready_for_print/add_ready_for_print.php";
                        $route_action_path = "../ready_for_print/edit_ready_for_print.php";
                        $route_view = "../ready_for_print/view_ready_for_print.php";
                      }
                      elseif ($route_id == 18)
                      {
                        //$route_action_path = "../ready_for_dye/add_ready_for_dye.php";
                        $route_action_path = "../ready_for_dye/edit_ready_for_dye.php";
                        $route_view = "../ready_for_dye/view_ready_for_dye.php";
                      }
                      elseif ($route_id == 19)
                      {
                        //$route_action_path = "../ready_raising/add_ready_for_raising.php";
                        $route_action_path = "../ready_raising/edit_ready_for_raising.php";
                        $route_view = "../ready_raising/view_ready_for_raising.php";
                      }
                      elseif ($route_id == 20)
                      {
                        //$route_action_path = "../ready_raising/add_ready_for_raising.php";
                        $route_action_path = "../steaming/edit_steaming.php";
                        $route_view = "../steaming/view_steaming.php";
                      }


                      else
                      {
                        $route_action_path = "../raising/edit_raising.php";
                        $route_view = "../raising/view_raising.php";
                      }

                      ?>
                        <!-- <form action="<?php echo $route_action_path; ?>" method="post" style="display: inline;">
                          <input type="hidden" id="route_issue_id" name="route_issue_id" value="<?php echo $row['route_issue_id']; ?>">
                          <input type="hidden" id="greige_issunce_id" name="greige_issunce_id" value="<?php echo $row['greige_issunce_id']; ?>">
                          <input type="hidden" id="pp_no_id" name="pp_no_id" value="<?php echo $pp_no_id; ?>">
                          <input type="hidden" id="pp_details_id" name="pp_details_id" value="<?php echo $pp_details_id; ?>">
                          <button type="submit" id="gray_issue_add_btn" name="gray_issue_add_btn" class="btn btn-primary btn-xs">
                              Edit
                          </button>
                        </form> -->

                        <form action="<?php echo $route_view; ?>" method="GET" style="display: inline;">
                          <input type="hidden" id="route_issue_id" name="route_issue_id" value="<?php echo $row['route_issue_id']; ?>">
                          <input type="hidden" id="greige_issunce_id" name="greige_issunce_id" value="<?php echo $row['greige_issunce_id']; ?>">
                          <input type="hidden" id="pp_no_id" name="pp_no_id" value="<?php echo $pp_no_id; ?>">
                          <input type="hidden" id="pp_details_id" name="pp_details_id" value="<?php echo $pp_details_id; ?>">
                          <button type="submit" id="gray_issue_add_btn" name="gray_issue_add_btn" class="btn btn-primary btn-xs">
                              View 
                          </button>
                        </form>
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

<?php  ?>
