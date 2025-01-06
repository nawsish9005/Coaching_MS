<?php
session_start();
require_once("../includes/db_session_chk.php");
?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title> PP Details Information </title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>  
           <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>            
           <script src="https://cdn.datatables.net/fixedcolumns/3.3.1/js/dataTables.fixedColumns.min.js"></script>            
           <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />  
           <link rel="stylesheet" href="https://cdn.datatables.net/fixedcolumns/3.3.1/css/fixedColumns.bootstrap4.min.css" />  
      </head>  
      <body>  
           <br /><br />  
           <div class="container">  
                <h3 align="center">PP Details Information</h3> 
                <button class="btn btn-success"><a href="../home/dashboard.php">Back to Homepage</a></button> 
                <br />  
                <div class="table-responsive">  
                     <table id="employee_data" class="table table-striped table-bordered">  
                          <thead>  
                               <tr>  
                                    <th>SI</th>
                                    <th>PP Number</th>
                                    <th>Issue Date</th>
                                    <th>Customer</th>
                                    <th>Design</th>
                                    <th>Construction</th>
                                    <th>Greige Demand</th>
                                    <th>Color</th>
                                    <th>Version</th>
                                    <th>Gray Width</th>
                                    <th>Finish Width</th>
                                    <th>Quantity</th>
                                    <th>Greige Receive Quantity</th>
                                    <th>Yarn Warp</th>
                                    <th>Yarn Weft</th>
                                    <th>Thread EPI</th>
                                    <th>Thread PPI</th>
                                    <th>GSM</th>
                                    <th>Width</th>  

                                    <th>Bleaching Before Batcher</th>
                                    <th>Bleaching After Batcher</th>
                                    <th>Bleaching Process Width</th>
                               </tr>  
                          </thead>

                          <tbody>  
                          <?php 
                                $sql_for_pp = "SELECT pp.*, 
                                                     pp_details.*, 
                                                     gi.*, 
                                                     route_issue.*,
                                                     bleaching.*,
                                                     curing.*,
                                                     equalize.*,
                                                     mercerize.*,
                                                     printing.*,
                                                     ready_mercerize.*,
                                                     singe.*
                                                FROM pp 
                                           LEFT JOIN pp_details ON pp_details.pp_no_id = pp.pp_id AND pp_details.active = '1'
                                           LEFT JOIN greige_issunce AS gi ON gi.pp_no_id = pp_details.pp_no_id AND gi.pp_details_id = pp_details.pp_id AND gi.active = '1'
                                           LEFT JOIN route_issue ON route_issue.greige_issunce_id = gi.greige_issunce_id AND route_issue.active='1'
                                           LEFT JOIN bleaching ON bleaching.route_issue_id = route_issue.route_issue_id AND bleaching.status='1'
                                           LEFT JOIN curing ON curing.route_issue_id = route_issue.route_issue_id AND curing.status='1'
                                           LEFT JOIN equalize ON equalize.route_issue_id = route_issue.route_issue_id AND equalize.status='1'
                                           LEFT JOIN mercerize ON mercerize.route_issue_id = route_issue.route_issue_id AND mercerize.status='1'
                                           LEFT JOIN printing ON printing.route_issue_id = route_issue.route_issue_id AND printing.status='1'
                                           LEFT JOIN ready_mercerize ON ready_mercerize.route_issue_id = route_issue.route_issue_id AND ready_mercerize.status='1'
                                           LEFT JOIN singe ON singe.route_issue_id = route_issue.route_issue_id AND singe.status='1'";

                                $res_for_pp = mysqli_query($con, $sql_for_pp);

                                $s1 = 1;
                                while ($row = mysqli_fetch_assoc($res_for_pp)) 
                                {
                                  $pp_id = $row['pp_id'];
                              ?>
                              <tr>
                                <td><?php echo $s1; ?></td>
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
                                <td><?php echo $row['design'] ?></td>
                                <td><?php echo $row['construction'] ?></td>
                                <td><?php echo $row['greige_demand'] ?></td>


                                <td>
                                  <?php 
                                    $color_id = $row['color'];
                                    $sql_for_customer = "SELECT color_name FROM color WHERE color_id = '$color_id'";
                                    $res_for_customer = mysqli_query($con, $sql_for_customer);
                                    $row_for_customer = mysqli_fetch_assoc($res_for_customer);
                                    echo $row_for_customer['color_name'];
                                  ?>
                                </td>
                                <td><?php echo $row['version'] ?></td>
                                <td><?php echo $row['gray_width'] ?></td>
                                <td><?php echo $row['finish_width'] ?></td>
                                <td><?php echo $row['quantity'] ?></td>
                                <td><?php echo $row['received_quantity'] ?></td>

                                <td><?php echo $row['yarn_warp'] ?></td>
                                <td><?php echo $row['yarn_weft'] ?></td>
                                <td><?php echo $row['thread_epi'] ?></td>
                                <td><?php echo $row['thread_ppi'] ?></td>
                                <td><?php echo $row['gsm'] ?></td>
                                <td><?php echo $row['width'] ?></td>

                                <td><?php echo $row['b_batcher'] ?></td>
                                <td><?php echo $row['a_batcher'] ?></td>
                                <td><?php echo $row['p_width'] ?></td>
                              </tr>
                              <?php 
                                ++$s1;
                               }
                              ?>

                        </tbody>
                     </table>  
                </div>  
           </div>  
      </body>  
 </html>  
 <script>  
 // $(document).ready(function(){  
 //      $('#employee_data').DataTable();  
 // });  

 $(document).ready(function() {
    var table = $('#employee_data').DataTable( {
        scrollY:        true,
        scrollX:        true,
        scrollCollapse: true,
        paging:         true,
        fixedColumns: 
        {
            leftColumns: 4,
            rightColumns: 0,
        }
    } );
 });
 </script>  