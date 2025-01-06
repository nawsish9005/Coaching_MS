<?php
session_start();
require_once("../includes/db_session_chk.php");
?>

<?php

    $pp_no = $_POST['pp_no_id'];
    $pp_details_id = $_POST['pp_version'];

    $sql_for_pp_header = "SELECT * FROM process_program_info WHERE pp_id = '$pp_no'";
    $res_for_pp_header = mysqli_query($con, $sql_for_pp_header);

    if(mysqli_num_rows($res_for_pp_header) >= 1)
    {
      $row_for_pp_header = mysqli_fetch_assoc($res_for_pp_header);
    ?>

    <div class="x_panel">
      <div class="x_title">
        <h2>All Versions of PP Number : <span style="color:red;"><?php echo $row_for_pp_header['pp_no']; ?></span></h2>
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
              <th>Version</th>
              <th>Color</th>
              <th>Greige Width (Inch)</th>
              <th>Design</th>
              <th>Finish Width (Inch)</th>
              <th>Order Quantity (Meter)</th>
              <th>Greige Required Quantity</th>
              <th>Short/Excess</th> 
              <th>Short/Excess Quantity</th> 
              <th>Action</th>
            </tr>
          </thead>

          <tbody>
            <?php
              $sql_for_pp = "SELECT
                                    new_table.pp_details_version,
                                    new_table.pp_details_color_name,
                                    new_table.pp_details_grey_width,
                                    new_table.pp_design,
                                    new_table.pp_details_fin_width,
                                    new_table.pp_details_qty,
                                    new_table.pp_id,
                                    new_table.pp_details_id,
                                    SUM(gis.received_quantity) AS total_received_quantity
                               FROM (
                                     SELECT
                                            p.pp_id AS pp_id,
                                            p.design AS pp_design,
                                            details.pp_id AS pp_details_id,
                                            details.version AS pp_details_version,
                                            details.color AS pp_details_color_id,
                                            c.color_name AS pp_details_color_name,
                                            details.gray_width AS pp_details_grey_width,
                                            details.finish_width AS pp_details_fin_width,
                                            details.quantity AS pp_details_qty

                                       FROM
                                            process_program_info AS p,
                                            version_wise_process_program_info AS details,
                                            customer AS customers,
                                            color AS c

                                       WHERE p.pp_id = '$pp_no'
                                       AND details.pp_id = '$pp_details_id'
                                       AND p.pp_id = details.pp_no_id
                                       AND p.customers = customers.customer_id
                                       AND details.color = c.color_id
                                       AND details.active = '1'
                                    ) AS new_table

                             LEFT JOIN  greige_receiving_process_info AS gis
                                    ON new_table.pp_details_id = gis.pp_details_id
                                   AND gis.active = '1'
                             GROUP BY new_table.pp_details_id";


              $res_for_pp = mysqli_query($con, $sql_for_pp);
              $s1 = 1;
              while ($row = mysqli_fetch_assoc($res_for_pp))
              {
            ?>
            <tr>
              <td><?php echo $s1; ?></td>
              <td><?php echo $row['pp_details_version'] ?></td>
              <td><?php echo $row['pp_details_color_name']; ?></td>
              <td><?php echo $row['pp_details_grey_width'] ?></td>
              <td><?php echo $row['pp_design'] ?></td>
              <td><?php echo $row['pp_details_fin_width'] ?></td>
              <td><?php echo $row['pp_details_qty'] ?></td>
              <td><?php echo $row['total_received_quantity'] == NULL ? "0" : $row['total_received_quantity']; ?></td>
              <td>
                <?php
                  if ($row['pp_details_qty'] > $row['total_received_quantity'])
                  {
                     $short_count = (($row['pp_details_qty'] - $row['total_received_quantity']) / $row['pp_details_qty']) * 100;

                     echo number_format((float)$short_count, 2, '.', '')."% short";
                  }

                  else
                  {
                     $excess_count = (($row['total_received_quantity'] - $row['pp_details_qty']) / $row['pp_details_qty']) * 100;
                     echo number_format((float)$excess_count, 2, '.', '')."% excess";
                  }
                ?>
              </td>
              <td>
                <?php
                  if ($row['pp_details_qty'] > $row['total_received_quantity'])
                  {
                     $short_count = ($row['pp_details_qty'] - $row['total_received_quantity']);
                     echo $short_count." short";
                  }

                  else
                  {
                     $excess_count = ($row['total_received_quantity'] - $row['pp_details_qty']);
                     echo $excess_count." excess";
                  }
                ?>
              </td>
              <td>

                <?php
                  $pp_no_id = $row['pp_id'];
                  $pp_details_id = $row['pp_details_id'];
                  $sql_for_gray_variable_check = "SELECT * FROM defining_gray_receiving_qc_standard WHERE pp_no_id = '$pp_no_id' AND pp_details_id = '$pp_details_id' AND active = '1' ";
                  $res_for_gray_variable_check = mysqli_query( $con, $sql_for_gray_variable_check);
                  $row_for_gray_variable_check = mysqli_num_rows($res_for_gray_variable_check);
                  if ($row_for_gray_variable_check >= 1)
                  {
                    ?>
                      <!-- <form action="add_greige_issunce.php" method="post" style="display: inline;"> -->
                        <input type="hidden" id="pp_details_id" name="pp_details_id" value="<?php echo $pp_details_id; ?>">
                        <input type="hidden" id="pp_no_id" name="pp_no_id" value="<?php echo $pp_no_id; ?>">
                        <button type="submit" id="gray_issue_add_btn" onclick="greige_issunce_add();" name="gray_issue_add_btn" class="btn btn-primary btn-xs">New Greige Receiving</button>
                      <!-- </form> -->
                    <?php
                  }
                ?>

                <?php
                  $sql_for_gray_issue = "SELECT * FROM greige_receiving_process_info
                                         WHERE pp_no_id = '$pp_no_id'
                                         AND pp_details_id = '$pp_details_id' ";
                  $res_for_gray_issue = mysqli_query($con, $sql_for_gray_issue);
                  $row_for_gray_issue = mysqli_num_rows($res_for_gray_issue);

                  if ($row_for_gray_issue >= 1)
                  {
                    ?>
                      <input type="hidden" id="pp_details_id" name="pp_details_id" value="<?php echo $pp_details_id; ?>">
                      <input type="hidden" id="pp_no_id" name="pp_no_id" value="<?php echo $pp_no_id; ?>">
                      <button type="submit" class="btn btn-primary btn-xs" onclick="greige_issunce_view();"> View </button>
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
        <?php
          if ( !($row_for_gray_variable_check >= 1) )
          {
              ?>
                <h2 class="text-center" style="color: red;">Please ensure Greige Standard first. <a href="../standard/gray_variable.php">Click here</a> </h2>
              <?php
          }
        ?>
      </div>
    </div>
    <?php
    }
  ?>
