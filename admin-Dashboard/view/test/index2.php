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

                                    <th>Singing After Batcher</th>
                                    <th>Singing Process Width</th>
                                    <th>Singing Quantity</th>
                                    <th>Singing Machine Name</th>
                                    <th>Singing Flame</th>
                                    <th>Singing Speed</th>
                                    <th>Singing Temp</th>
                                    <th>Singing Ph</th>

                                    <th>Bleaching Before Batcher</th>
                                    <th>Bleaching After Batcher</th>
                                    <th>Bleaching Process Width</th>
                                    <th>Bleaching Quantity</th>
                                    <th>Bleaching Absorbency Left</th>
                                    <th>Bleaching Absorbency Center</th>
                                    <th>Bleaching Absorbency Right</th>
                                    <th>Bleaching Size Left</th>
                                    <th>Bleaching Size Center</th>
                                    <th>Bleaching Size Right</th>
                                    <th>Bleaching Whiteness Left</th>
                                    <th>Bleaching Whiteness Center</th>
                                    <th>Bleaching Whiteness Right</th>
                                    <th>Bleaching Piling</th>
                                    <th>Bleaching Ph Left</th>
                                    <th>Bleaching Ph Center</th>
                                    <th>Bleaching Ph Right</th>

                                    <th>Curing Before Batcher</th>
                                    <th>Curing After Batcher</th>
                                    <th>Curing Process Width</th>
                                    <th>Curing Quantity</th>
                                    <th>Curing Machine</th>
                                    <th>Curing Time</th>
                                    <th>Curing Temp.</th>
                                    <th>Curing Rubbing Dry</th>
                                    <th>Curing Rubbing Wet</th>

                                    <th>Equalize Before Batcher</th>
                                    <th>Equalize After Batcher</th>
                                    <th>Equalize Process Width</th>
                                    <th>Equalize Quantity</th>
                                    <th>Equalize Whiteness Left</th>
                                    <th>Equalize Whiteness Center</th>
                                    <th>Equalize Whiteness Right</th>
                                    <th>Equalize Bowing and Skew</th>
                                    <th>Equalize Ph Left</th>
                                    <th>Equalize Ph Center</th>
                                    <th>Equalize Ph Right</th>

                                    <th>Mercerize Before Batcher</th>
                                    <th>Mercerize After Batcher</th>
                                    <th>Mercerize Process Width</th>
                                    <th>Mercerize Quantity</th>
                                    <th>Mercerize Absorbency Left</th>
                                    <th>Mercerize Absorbency Center</th>
                                    <th>Mercerize Absorbency Right</th>
                                    <th>Mercerize Size Left</th>
                                    <th>Mercerize Size Center</th>
                                    <th>Mercerize Size Right</th>
                                    <th>Mercerize Whiteness Left</th>
                                    <th>Mercerize Whiteness Center</th>
                                    <th>Mercerize Whiteness Right</th>
                                    <th>Mercerize Ph Left</th>
                                    <th>Mercerize Ph Center</th>
                                    <th>Mercerize Ph Right</th>

                                    <th>Printing Before Batcher</th>
                                    <th>Printing After Batcher</th>
                                    <th>Printing Process Width</th>
                                    <th>Printing Quantity</th>
                                    <th>Printing Rubbing Dry</th>
                                    <th>Printing Rubbing Wet</th>

                                    <th>Ready for Mercerize Before Batcher</th>
                                    <th>Ready for Mercerize After Batcher</th>
                                    <th>Ready for Mercerize Process Width</th>
                                    <th>Ready for Mercerize Quantity</th>
                                    <th>Ready for Mercerize Whiteness Left</th>
                                    <th>Ready for Mercerize Whiteness Center</th>
                                    <th>Ready for Mercerize Whiteness Right</th>
                                    <th>Ready for Mercerize Bowing and Skew</th>
                                    <th>Ready for Mercerize Ph Left</th>
                                    <th>Ready for Mercerize Ph Center</th>
                                    <th>Ready for Mercerize Ph Right</th>

                               </tr>  
                          </thead>

                          <tbody>  
                          <?php 
                                // $sql_for_pp = "SELECT pp.*, 
                                //                      pp_details.*, 
                                //                      greige_issunce.*, 
                                //                      route_issue.*,
                                //                      bleaching.*,
                                //                      curing.*,
                                //                      equalize.*,
                                //                      mercerize.*,
                                //                      printing.*,
                                //                      ready_mercerize.*,
                                //                      singe.*
                                //                 FROM pp 
                                //            LEFT JOIN pp_details ON pp_details.pp_no_id = pp.pp_id AND pp_details.active = '1'
                                //            LEFT JOIN greige_issunce ON greige_issunce.pp_no_id = pp_details.pp_no_id AND greige_issunce.pp_details_id = pp_details.pp_id AND greige_issunce.active = '1'
                                //            LEFT JOIN route_issue ON route_issue.greige_issunce_id = greige_issunce.greige_issunce_id AND route_issue.active='1'
                                //            LEFT JOIN bleaching ON bleaching.route_issue_id = route_issue.route_issue_id AND bleaching.status='1'
                                //            LEFT JOIN curing ON curing.route_issue_id = route_issue.route_issue_id AND curing.status='1'
                                //            LEFT JOIN equalize ON equalize.route_issue_id = route_issue.route_issue_id AND equalize.status='1'
                                //            LEFT JOIN mercerize ON mercerize.route_issue_id = route_issue.route_issue_id AND mercerize.status='1'
                                //            LEFT JOIN printing ON printing.route_issue_id = route_issue.route_issue_id AND printing.status='1'
                                //            LEFT JOIN ready_mercerize ON ready_mercerize.route_issue_id = route_issue.route_issue_id AND ready_mercerize.status='1'
                                //            LEFT JOIN singe ON singe.route_issue_id = route_issue.route_issue_id AND singe.status='1'";

                              $sql_for_pp = "SELECT pp.*, 
                                                     pp_details.*, 
                                                     greige_issunce.*, 
                                                     route_issue.*,

                                                     bleaching.b_batcher AS bleaching_before_batcher,
                                                     bleaching.a_batcher AS bleaching_after_batcher,
                                                     bleaching.p_width AS bleaching_process_width,
                                                     bleaching.p_qty AS bleaching_p_qty,
                                                     bleaching.absorbency_left AS bleaching_absorbency_left,
                                                     bleaching.absorbency_center AS bleaching_absorbency_center,
                                                     bleaching.absorbency_right AS bleaching_absorbency_right,
                                                     bleaching.size_left AS bleaching_size_left,
                                                     bleaching.size_center AS bleaching_size_center,
                                                     bleaching.size_right AS bleaching_size_right,
                                                     bleaching.whiteness_left AS bleaching_whiteness_left,
                                                     bleaching.whiteness_center AS bleaching_whiteness_center,
                                                     bleaching.whiteness_right AS bleaching_whiteness_right,
                                                     bleaching.pilling AS bleaching_pilling,
                                                     bleaching.ph_left AS bleaching_ph_left,
                                                     bleaching.ph_center AS bleaching_ph_center,
                                                     bleaching.ph_right AS bleaching_ph_right,

                                                     curing.b_batcher AS curing_before_batcher,
                                                     curing.a_batcher AS curing_after_batcher,
                                                     curing.p_width AS curing_process_width,
                                                     curing.p_qty AS curing_p_qty,
                                                     curing.machine AS curing_machine,
                                                     curing.time AS curing_time,
                                                     curing.temp AS curing_temp,
                                                     curing.rubbing_dry AS curing_rubbing_dry,
                                                     curing.rubbing_wet AS curing_rubbing_wet,

                                                     equalize.b_batcher AS equalize_before_batcher,
                                                     equalize.a_batcher AS equalize_after_batcher,
                                                     equalize.p_width AS equalize_process_width,
                                                     equalize.p_qty AS equalize_p_qty,
                                                     equalize.whiteness_left AS equalize_whiteness_left,
                                                     equalize.whiteness_center AS equalize_whiteness_center,
                                                     equalize.whiteness_right AS equalize_whiteness_right,
                                                     equalize.bowing_and_skew AS equalize_bowing_and_skew,
                                                     equalize.ph_left AS equalize_ph_left,
                                                     equalize.ph_center AS equalize_ph_center,
                                                     equalize.ph_right AS equalize_ph_right,

                                                     mercerize.b_batcher AS mercerize_before_batcher,
                                                     mercerize.a_batcher AS mercerize_after_batcher,
                                                     mercerize.p_width AS mercerize_process_width,
                                                     mercerize.p_qty AS mercerize_p_qty,
                                                     mercerize.absorbency_left AS mercerize_absorbency_left,
                                                     mercerize.absorbency_center AS mercerize_absorbency_center,
                                                     mercerize.absorbency_right AS mercerize_absorbency_right,
                                                     mercerize.size_left AS mercerize_size_left,
                                                     mercerize.size_center AS mercerize_size_center,
                                                     mercerize.size_right AS mercerize_size_right,
                                                     mercerize.whiteness_left AS mercerize_whiteness_left,
                                                     mercerize.whiteness_center AS mercerize_whiteness_center,
                                                     mercerize.whiteness_right AS mercerize_whiteness_right,
                                                     mercerize.ph_left AS mercerize_ph_left,
                                                     mercerize.ph_center AS mercerize_ph_center,
                                                     mercerize.ph_right AS mercerize_ph_right,

                                                     printing.b_batcher AS printing_before_batcher,
                                                     printing.a_batcher AS printing_after_batcher,
                                                     printing.p_width AS printing_process_width,
                                                     printing.p_qty AS printing_p_qty,
                                                     printing.rubbing_dry AS printing_rubbing_dry,
                                                     printing.rubbing_wet AS printing_rubbing_wet,

                                                     ready_mercerize.b_batcher AS ready_mercerize_before_batcher,
                                                     ready_mercerize.a_batcher AS ready_mercerize_after_batcher,
                                                     ready_mercerize.p_width AS ready_mercerize_process_width,
                                                     ready_mercerize.p_qty AS ready_mercerize_p_qty,
                                                     ready_mercerize.whiteness_left AS ready_mercerize_whiteness_left,
                                                     ready_mercerize.whiteness_center AS ready_mercerize_whiteness_center,
                                                     ready_mercerize.whiteness_right AS ready_mercerize_whiteness_right,
                                                     ready_mercerize.bowing_and_skew AS ready_mercerize_bowing_and_skew,
                                                     ready_mercerize.ph_left AS ready_mercerize_ph_left,
                                                     ready_mercerize.ph_center AS ready_mercerize_ph_center,
                                                     ready_mercerize.ph_right AS ready_mercerize_ph_right,
                                                     
                                                     singe.batcher AS singe_batcher,
                                                     singe.p_width AS singe_process_width,
                                                     singe.p_qty AS singe_p_qty,
                                                     singe.m_c_name AS singe_m_c_name,
                                                     singe.flame AS singe_flame,
                                                     singe.speed AS singe_speed,
                                                     singe.temp AS singe_temp,
                                                     singe.ph AS singe_ph
                                                FROM pp 
                                           LEFT JOIN pp_details ON pp_details.pp_no_id = pp.pp_id AND pp_details.active = '1'
                                           LEFT JOIN greige_issunce ON greige_issunce.pp_no_id = pp_details.pp_no_id AND greige_issunce.pp_details_id = pp_details.pp_id AND greige_issunce.active = '1'
                                           LEFT JOIN route_issue ON route_issue.greige_issunce_id = greige_issunce.greige_issunce_id AND route_issue.active='1'
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

                                <!-- greige receive -->
                                <td><?php echo $row['yarn_warp'] ?></td>
                                <td><?php echo $row['yarn_weft'] ?></td>
                                <td><?php echo $row['thread_epi'] ?></td>
                                <td><?php echo $row['thread_ppi'] ?></td>
                                <td><?php echo $row['gsm'] ?></td>
                                <td><?php echo $row['width'] ?></td>

                                <!-- curing -->
                                <td><?php echo $row['singe_batcher'] ?></td>
                                <td><?php echo $row['singe_process_width'] ?></td>
                                <td><?php echo $row['singe_p_qty'] ?></td>
                                <td><?php echo $row['singe_m_c_name'] ?></td>
                                <td><?php echo $row['singe_flame'] ?></td>
                                <td><?php echo $row['singe_speed'] ?></td>
                                <td><?php echo $row['singe_temp'] ?></td>
                                <td><?php echo $row['singe_ph'] ?></td>

                                <!-- bleaching -->
                                <td><?php echo $row['bleaching_before_batcher'] ?></td>
                                <td><?php echo $row['bleaching_after_batcher'] ?></td>
                                <td><?php echo $row['bleaching_process_width'] ?></td>
                                <td><?php echo $row['bleaching_p_qty'] ?></td>
                                <td><?php echo $row['bleaching_absorbency_left'] ?></td>
                                <td><?php echo $row['bleaching_absorbency_center'] ?></td>
                                <td><?php echo $row['bleaching_absorbency_right'] ?></td>
                                <td><?php echo $row['bleaching_size_left'] ?></td>
                                <td><?php echo $row['bleaching_size_center'] ?></td>
                                <td><?php echo $row['bleaching_size_right'] ?></td>
                                <td><?php echo $row['bleaching_whiteness_left'] ?></td>
                                <td><?php echo $row['bleaching_whiteness_center'] ?></td>
                                <td><?php echo $row['bleaching_whiteness_right'] ?></td>
                                <td><?php echo $row['bleaching_pilling'] ?></td>
                                <td><?php echo $row['bleaching_ph_left'] ?></td>
                                <td><?php echo $row['bleaching_ph_center'] ?></td>
                                <td><?php echo $row['bleaching_ph_right'] ?></td>

                                <!-- curing -->
                                <td><?php echo $row['curing_before_batcher'] ?></td>
                                <td><?php echo $row['curing_after_batcher'] ?></td>
                                <td><?php echo $row['curing_process_width'] ?></td>
                                <td><?php echo $row['curing_p_qty'] ?></td>
                                <td><?php echo $row['curing_machine'] ?></td>
                                <td><?php echo $row['curing_time'] ?></td>
                                <td><?php echo $row['curing_temp'] ?></td>
                                <td><?php echo $row['curing_rubbing_dry'] ?></td>
                                <td><?php echo $row['curing_rubbing_wet'] ?></td>

                                <!-- equalize -->
                                <td><?php echo $row['equalize_before_batcher'] ?></td>
                                <td><?php echo $row['equalize_after_batcher'] ?></td>
                                <td><?php echo $row['equalize_process_width'] ?></td>
                                <td><?php echo $row['equalize_p_qty'] ?></td>
                                <td><?php echo $row['equalize_whiteness_left'] ?></td>
                                <td><?php echo $row['equalize_whiteness_center'] ?></td>
                                <td><?php echo $row['equalize_whiteness_right'] ?></td>
                                <td><?php echo $row['equalize_bowing_and_skew'] ?></td>
                                <td><?php echo $row['equalize_ph_left'] ?></td>
                                <td><?php echo $row['equalize_ph_center'] ?></td>
                                <td><?php echo $row['equalize_ph_right'] ?></td>

                                <!-- mercerize -->
                                <td><?php echo $row['mercerize_before_batcher'] ?></td>
                                <td><?php echo $row['mercerize_after_batcher'] ?></td>
                                <td><?php echo $row['mercerize_process_width'] ?></td>
                                <td><?php echo $row['mercerize_p_qty'] ?></td>
                                <td><?php echo $row['mercerize_absorbency_left'] ?></td>
                                <td><?php echo $row['mercerize_absorbency_center'] ?></td>
                                <td><?php echo $row['mercerize_absorbency_right'] ?></td>
                                <td><?php echo $row['mercerize_size_left'] ?></td>
                                <td><?php echo $row['mercerize_size_center'] ?></td>
                                <td><?php echo $row['mercerize_size_right'] ?></td>
                                <td><?php echo $row['mercerize_whiteness_left'] ?></td>
                                <td><?php echo $row['mercerize_whiteness_center'] ?></td>
                                <td><?php echo $row['mercerize_whiteness_right'] ?></td>
                                <td><?php echo $row['mercerize_ph_left'] ?></td>
                                <td><?php echo $row['mercerize_ph_center'] ?></td>
                                <td><?php echo $row['mercerize_ph_right'] ?></td>

                                <!-- printing -->
                                <td><?php echo $row['printing_before_batcher'] ?></td>
                                <td><?php echo $row['printing_after_batcher'] ?></td>
                                <td><?php echo $row['printing_process_width'] ?></td>
                                <td><?php echo $row['printing_p_qty'] ?></td>
                                <td><?php echo $row['printing_rubbing_dry'] ?></td>
                                <td><?php echo $row['printing_rubbing_wet'] ?></td>

                                <!-- ready_mercerize -->
                                <td><?php echo $row['ready_mercerize_before_batcher'] ?></td>
                                <td><?php echo $row['ready_mercerize_after_batcher'] ?></td>
                                <td><?php echo $row['ready_mercerize_process_width'] ?></td>
                                <td><?php echo $row['ready_mercerize_p_qty'] ?></td>
                                <td><?php echo $row['ready_mercerize_whiteness_left'] ?></td>
                                <td><?php echo $row['ready_mercerize_whiteness_center'] ?></td>
                                <td><?php echo $row['ready_mercerize_whiteness_right'] ?></td>
                                <td><?php echo $row['ready_mercerize_bowing_and_skew'] ?></td>
                                <td><?php echo $row['ready_mercerize_ph_left'] ?></td>
                                <td><?php echo $row['ready_mercerize_ph_center'] ?></td>
                                <td><?php echo $row['ready_mercerize_ph_right'] ?></td>

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