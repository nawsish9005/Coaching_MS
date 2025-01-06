<?php
session_start();
require_once("../includes/db_session_chk.php");
$pp_details_id = $_POST['pp_details_id'];
$pp_no_id = $_POST['pp_no_id'];

if (($pp_details_id == '') || (empty($pp_details_id)) || is_null($pp_details_id) || ($pp_no_id == '') || (empty($pp_no_id)) || is_null($pp_no_id) ) 
{
   header("Location: greige_issunce.php");
}

$sql_for_pp = "SELECT *

                FROM process_program_info

               WHERE pp_id ='$pp_no_id'
               ";
$res_for_pp = mysqli_query($con, $sql_for_pp);
$row_pp = mysqli_fetch_assoc($res_for_pp);
?>

<!-- main content again -->
<!-- <div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12" id="greige_issunce_view_data"> -->

  <div class="x_panel">
    <div class="x_title">
      <h2>Greige Receive List</h2>
      <ul class="nav navbar-right panel_toolbox">
        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
        </li>
      </ul>
      <div class="clearfix"></div>
    </div>

    <table class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>SI</th>
              <th>PP Version</th>
              <th>Color</th>
              <th>Greige Width (Inch)</th>
              <th>Finish Width (Inch)</th>
              <th>Order Quantity (Meter)</th>
            </tr>
          </thead>
          <?php 
              $sql = "SELECT * FROM version_wise_process_program_info
                        WHERE pp_id = '$pp_details_id' AND pp_no_id = '$pp_no_id' AND active = '1' ";
              $res = mysqli_query($con, $sql);
              $sl = 1;
              while($row_for_pp_details = mysqli_fetch_array($res))
              {
                  ?>
                      <tbody>
                        <tr>
                          <td>1</td>
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
                        </tr>
                      </tbody>
                  <?php
                  ++$sl;
              }
          ?>
    </table>

    <?php 
      $sql_for_gray_variable = "SELECT defining_gray_receiving_qc_standard.*

                          FROM defining_gray_receiving_qc_standard

                         WHERE pp_no_id ='$pp_no_id'
                         AND  pp_details_id = '$pp_details_id'
                         AND active = '1'
                         ";
      $res_for_gray_variable = mysqli_query($con, $sql_for_gray_variable);
      $row_gray_variable = mysqli_fetch_assoc($res_for_gray_variable);

      $yarn_warp_cond1 = $row_gray_variable['yarn_warp_cond1'];
      $yarn_warp_value1 = $row_gray_variable['yarn_warp_value1'];
      $yarn_warp_value2 = $row_gray_variable['yarn_warp_value2'];
      $yarn_warp_cond2 = $row_gray_variable['yarn_warp_cond2'];

      $yarn_weft_cond1 = $row_gray_variable['yarn_weft_cond1'];
      $yarn_weft_value1 = $row_gray_variable['yarn_weft_value1'];
      $yarn_weft_value2 = $row_gray_variable['yarn_weft_value2'];
      $yarn_weft_cond2 = $row_gray_variable['yarn_weft_cond2'];

      $thread_epi_cond1 = $row_gray_variable['thread_epi_cond1'];
      $thread_epi_value1 = $row_gray_variable['thread_epi_value1'];
      $thread_epi_value2 = $row_gray_variable['thread_epi_value2'];
      $thread_epi_cond2 = $row_gray_variable['thread_epi_cond2'];

      $thread_ppi_cond1 = $row_gray_variable['thread_ppi_cond1'];
      $thread_ppi_value1 = $row_gray_variable['thread_ppi_value1'];
      $thread_ppi_value2 = $row_gray_variable['thread_ppi_value2'];
      $thread_ppi_cond2 = $row_gray_variable['thread_ppi_cond2'];

      $gsm_warp_cond1 = $row_gray_variable['gsm_warp_cond1'];
      $gsm_warp_value1 = $row_gray_variable['gsm_warp_value1'];
      $gsm_warp_value2 = $row_gray_variable['gsm_warp_value2'];
      $gsm_warp_cond2 = $row_gray_variable['gsm_warp_cond2'];




      $fiber_content_select = $row_gray_variable['fiber_content_select'];



      $fiber_total_name_polyester = $row_gray_variable['fiber_total_name_polyester'];
      $fiber_total_polyester_cond1 = $row_gray_variable['fiber_total_polyester_cond1'];
      $fiber_total_polyester_value1 = $row_gray_variable['fiber_total_polyester_value1'];
      $fiber_total_polyester_value2 = $row_gray_variable['fiber_total_polyester_value2'];
      $fiber_total_polyester_cond2 = $row_gray_variable['fiber_total_polyester_cond2'];

      $fiber_total_name_cotton = $row_gray_variable['fiber_total_name_cotton'];
      $fiber_total_cotton_cond1 = $row_gray_variable['fiber_total_cotton_cond1'];
      $fiber_total_cotton_value1 = $row_gray_variable['fiber_total_cotton_value1'];
      $fiber_total_cotton_value2 = $row_gray_variable['fiber_total_cotton_value2'];
      $fiber_total_cotton_cond2 = $row_gray_variable['fiber_total_cotton_cond2'];

      $fiber_total_name_thired = $row_gray_variable['fiber_total_name_thired'];
      $fiber_total_thired_cond1 = $row_gray_variable['fiber_total_thired_cond1'];
      $fiber_total_thired_value1 = $row_gray_variable['fiber_total_thired_value1'];
      $fiber_total_thired_value2 = $row_gray_variable['fiber_total_thired_value2'];
      $fiber_total_thired_cond2 = $row_gray_variable['fiber_total_thired_cond2'];

      $fiber_total_name_fourth = $row_gray_variable['fiber_total_name_fourth'];
      $fiber_total_fourth_cond1 = $row_gray_variable['fiber_total_fourth_cond1'];
      $fiber_total_fourth_value1 = $row_gray_variable['fiber_total_fourth_value1'];
      $fiber_total_fourth_value2 = $row_gray_variable['fiber_total_fourth_value2'];
      $fiber_total_fourth_cond2 = $row_gray_variable['fiber_total_fourth_cond2'];

      
      $fiber_warp_name_polyester = $row_gray_variable['fiber_warp_name_polyester'];
      $fiber_warp_polyester_cond1 = $row_gray_variable['fiber_warp_polyester_cond1'];
      $fiber_warp_polyester_value1 = $row_gray_variable['fiber_warp_polyester_value1'];
      $fiber_warp_polyester_value2 = $row_gray_variable['fiber_warp_polyester_value2'];
      $fiber_warp_polyester_cond2 = $row_gray_variable['fiber_warp_polyester_cond2'];

      $fiber_warp_name_cotton = $row_gray_variable['fiber_warp_name_cotton'];
      $fiber_warp_cotton_cond1 = $row_gray_variable['fiber_warp_cotton_cond1'];
      $fiber_warp_cotton_value1 = $row_gray_variable['fiber_warp_cotton_value1'];
      $fiber_warp_cotton_value2 = $row_gray_variable['fiber_warp_cotton_value2'];
      $fiber_warp_cotton_cond2 = $row_gray_variable['fiber_warp_cotton_cond2'];

      $fiber_warp_name_thired = $row_gray_variable['fiber_warp_name_thired'];
      $fiber_warp_thired_cond1 = $row_gray_variable['fiber_warp_thired_cond1'];
      $fiber_warp_thired_value1 = $row_gray_variable['fiber_warp_thired_value1'];
      $fiber_warp_thired_value2 = $row_gray_variable['fiber_warp_thired_value2'];
      $fiber_warp_thired_cond2 = $row_gray_variable['fiber_warp_thired_cond2'];

      $fiber_warp_name_fourth = $row_gray_variable['fiber_warp_name_fourth'];
      $fiber_warp_fourth_cond1 = $row_gray_variable['fiber_warp_fourth_cond1'];
      $fiber_warp_fourth_value1 = $row_gray_variable['fiber_warp_fourth_value1'];
      $fiber_warp_fourth_value2 = $row_gray_variable['fiber_warp_fourth_value2'];
      $fiber_warp_fourth_cond2 = $row_gray_variable['fiber_warp_fourth_cond2'];


      $fiber_weft_name_polyester = $row_gray_variable['fiber_weft_name_polyester'];
      $fiber_weft_polyester_cond1 = $row_gray_variable['fiber_weft_polyester_cond1'];
      $fiber_weft_polyester_value1 = $row_gray_variable['fiber_weft_polyester_value1'];
      $fiber_weft_polyester_value2 = $row_gray_variable['fiber_weft_polyester_value2'];
      $fiber_weft_polyester_cond2 = $row_gray_variable['fiber_weft_polyester_cond2'];

      $fiber_weft_name_cotton = $row_gray_variable['fiber_weft_name_cotton'];
      $fiber_weft_cotton_cond1 = $row_gray_variable['fiber_weft_cotton_cond1'];
      $fiber_weft_cotton_value1 = $row_gray_variable['fiber_weft_cotton_value1'];
      $fiber_weft_cotton_value2 = $row_gray_variable['fiber_weft_cotton_value2'];
      $fiber_weft_cotton_cond2 = $row_gray_variable['fiber_weft_cotton_cond2'];

      $fiber_weft_name_thired = $row_gray_variable['fiber_weft_name_thired'];
      $fiber_weft_thired_cond1 = $row_gray_variable['fiber_weft_thired_cond1'];
      $fiber_weft_thired_value1 = $row_gray_variable['fiber_weft_thired_value1'];
      $fiber_weft_thired_value2 = $row_gray_variable['fiber_weft_thired_value2'];
      $fiber_weft_thired_cond2 = $row_gray_variable['fiber_weft_thired_cond2'];

      $fiber_weft_name_fourth = $row_gray_variable['fiber_weft_name_fourth'];
      $fiber_weft_fourth_cond1 = $row_gray_variable['fiber_weft_fourth_cond1'];
      $fiber_weft_fourth_value1 = $row_gray_variable['fiber_weft_fourth_value1'];
      $fiber_weft_fourth_value2 = $row_gray_variable['fiber_weft_fourth_value2'];
      $fiber_weft_fourth_cond2 = $row_gray_variable['fiber_weft_fourth_cond2'];
    ?>

    <div class="x_content">
      <table id="datatable-buttons" class="table table-striped table-bordered">
        <thead>
          <tr>
            <th>SI</th>
            <th>Greige Receive Date</th>
            <th>Receive Quantity</th>
            <th>Yarn Warp</th>
            <th>Yarn Weft</th>
            <th>Thread EPI</th>
            <th>Thread PPI</th>
            <th>GSM</th>
            <!-- <th>Fiber Warp Polyster</th>
            <th>Fiber Warp Cotton</th>
            <th>Fiber Warp </th>
            <th>Fiber Warp</th>
            <th>Fiber Weft</th> -->
            <th>Width</th>
          </tr>
        </thead>
        
        <tbody>
          <?php 
            $s1 = 1;
            $sql_for_pp = "SELECT greige_receiving_process_info.*

                           FROM greige_receiving_process_info

                           WHERE greige_receiving_process_info.pp_no_id = '$pp_no_id'
                           AND greige_receiving_process_info.pp_details_id = '$pp_details_id'
                           AND greige_receiving_process_info.status = '1'
                           AND greige_receiving_process_info.active = '1'
                           ";

            $res_for_pp = mysqli_query($con, $sql_for_pp);

            while ($row = mysqli_fetch_assoc($res_for_pp)) 
            {
          ?>
          <tr>
            <td><?php echo $s1; ?></td>
            <td><?php echo $row['custom_date']; ?></td>
            <td><?php echo $row['received_quantity'] ?></td>

            <?php

              $problem_condition1 = "";
              $problem_condition2 = "";
              $ok1 = "";
              $ok2 = "";

              if($yarn_warp_cond1 == '1')
              {
                if ( !($yarn_warp_value1 < $row['yarn_warp']) )
                {
                  $problem_condition1 = "problem";
                }
                else
                {
                  $ok1 = "ok";
                }
              }
              else
              {
                if ( !($yarn_warp_value1 <= $row['yarn_warp']) )
                {
                  $problem_condition1 = "problem";
                }
                else
                {
                  $ok1 = "ok";
                }
              }

              if($yarn_warp_cond2 == '1')
              {
                if ( !($yarn_warp_value2 > $row['yarn_warp']) )
                {
                  $problem_condition2 = "problem";
                }
                else
                {
                  $ok2 = "ok";
                }
              }

              else
              {
                if ( !($yarn_warp_value2 >= $row['yarn_warp']) )
                {
                  $problem_condition2 = "problem";
                }
                else
                {
                  $ok2 = "ok";
                }
              }


              if (($problem_condition1 == "problem") && ($problem_condition2 == "problem")) 
              {
                ?>
                <td bgcolor="#FF0000" ><?php echo $row['yarn_warp'] ?></td>
                <?php
              }

              else if ( ($ok1 == "ok") && ($ok2 == "ok") )
              {
                ?>
                  <td bgcolor="#00FF00"><?php echo $row['yarn_warp'] ?></td>
                <?php
              }

              else
              {
                ?>
                  <td bgcolor="#FF0000" ><?php echo $row['yarn_warp'] ?></td>
                <?php
              }
              
            ?>


            <!-- php code for yarn weft -->
            <?php
              $problem_yarn_weft1 = "";
              $problem_yarn_weft2 = "";
              $ok_yarn_weft1 = "";
              $ok_yarn_weft2 = "";
              if($yarn_weft_cond1 == 1)
              {
                if ( !($yarn_weft_value1 < $row['yarn_weft']) )
                {
                  $problem_yarn_weft1 = "problem";
                }
                else
                {
                  $ok_yarn_weft1 = "ok";
                }
              }
              
              else
              {
                if ( !($yarn_weft_value1 <=  $row['yarn_weft']) )
                {
                  $problem_yarn_weft1 = "problem";
                }
                else
                {
                  $ok_yarn_weft1 = "ok";
                }
              }

              if($yarn_weft_cond2 == 1)
              {
                if ( !($yarn_weft_value2 > $row['yarn_weft']) )
                {
                  $problem_yarn_weft2 = "problem";
                }
                else
                {
                  $ok_yarn_weft2 = "ok";
                }
              }

              else 
              {
                if ( !($yarn_weft_value2 >= $row['yarn_weft']) )
                {
                  $problem_yarn_weft2 = "problem";
                }
                else
                {
                  $ok_yarn_weft2 = "ok";
                }
              }

              if (($problem_yarn_weft1 == "problem") && ($problem_yarn_weft2 == "problem")) 
              {
                ?>
                <td bgcolor="#FF0000" ><?php echo $row['yarn_weft'] ?></td>
                <?php
              }

              else if ( ($ok_yarn_weft1 == "ok") && ($ok_yarn_weft2 == "ok") )
              {
                ?>
                  <td bgcolor="#00FF00"><?php echo $row['yarn_weft'] ?></td>
                <?php
              }

              else
              {
                ?>
                  <td bgcolor="#FF0000" ><?php echo $row['yarn_weft'] ?></td>
                <?php
              }
            ?>

            <!-- thread epi condition -->
            <?php
              $problem_thread_epi1 = "";
              $problem_thread_epi2 = "";
              $ok_thread_epi1 = "";
              $ok_thread_epi2 = "";
              if($thread_epi_cond1 == 1)
              {
                if ( !($thread_epi_value1 < $row['thread_epi']) )
                {
                  $problem_thread_epi1 = "problem";
                }
                else
                {
                  $ok_thread_epi1 = "ok";
                }
              }
              else
              {
                if ( !($thread_epi_value1 <=  $row['thread_epi']) )
                {
                  $problem_thread_epi1 = "problem";
                }
                else
                {
                  $ok_thread_epi1 = "ok";
                }
              }

              if($thread_epi_cond2 == 1)
              {
                if ( !($thread_epi_value2 > $row['thread_epi']) )
                {
                  $problem_thread_epi2 = "problem";
                }
                else
                {
                  $ok_thread_epi2 = "ok";
                }
              }

              else 
              {
                if ( !($thread_epi_value2 >= $row['thread_epi']) )
                {
                  $problem_thread_epi2 = "problem";
                }
                else
                {
                  $ok_thread_epi2 = "ok";
                }
              }

              if (($problem_thread_epi1 == "problem") && ($problem_thread_epi2 == "problem")) 
              {
                ?>
                <td bgcolor="#FF0000" ><?php echo $row['thread_epi'] ?></td>
                <?php
              }

              else if ( ($ok_thread_epi1 == "ok") && ($ok_thread_epi2 == "ok") )
              {
                ?>
                  <td bgcolor="#00FF00"><?php echo $row['thread_epi'] ?></td>
                <?php
              }

              else
              {
                ?>
                  <td bgcolor="#FF0000" ><?php echo $row['thread_epi'] ?></td>
                <?php
              }
            ?>

            <!-- thread ppi condition -->
            <?php
              $problem_thread_ppi1 = "";
              $problem_thread_ppi2 = "";
              $ok_thread_ppi1 = "";
              $ok_thread_ppi2 = "";
              if($thread_ppi_cond1 == 1)
              {
                if ( !($thread_ppi_value1 < $row['thread_ppi']) )
                {
                  $problem_thread_ppi1 = "problem";
                }
                else
                {
                  $ok_thread_ppi1 = "ok";
                }
              }
              else
              {
                if ( !($thread_ppi_value1 <=  $row['thread_ppi']) )
                {
                  $problem_thread_ppi1 = "problem";
                }
                else
                {
                  $ok_thread_ppi1 = "ok";
                }
              }

              if($thread_ppi_cond2 == 1)
              {
                if ( !($thread_ppi_value2 > $row['thread_ppi']) )
                {
                  $problem_thread_ppi2 = "problem";
                }
                else
                {
                  $ok_thread_ppi2 = "ok";
                }
              }

              else 
              {
                if ( !($thread_ppi_value2 >= $row['thread_ppi']) )
                {
                  $problem_thread_ppi2 = "problem";
                }
                else
                {
                  $ok_thread_ppi2 = "ok";
                }
              }

              if (($problem_thread_ppi1 == "problem") && ($problem_thread_ppi2 == "problem")) 
              {
                ?>
                <td bgcolor="#FF0000" ><?php echo $row['thread_ppi'] ?></td>
                <?php
              }

              else if ( ($ok_thread_ppi1 == "ok") && ($ok_thread_ppi2 == "ok") )
              {
                ?>
                  <td bgcolor="#00FF00"><?php echo $row['thread_ppi'] ?></td>
                <?php
              }

              else
              {
                ?>
                  <td bgcolor="#FF0000" ><?php echo $row['thread_ppi'] ?></td>
                <?php
              }
            ?>

            <!-- gsm condition -->
            <?php
              $problem_gsm1 = "";
              $problem_gsm2 = "";
              $ok_gsm1 = "";
              $ok_gsm2 = "";
              if($gsm_warp_cond1 == 1)
              {
                if ( !($gsm_warp_value1 < $row['gsm']) )
                {
                  $problem_gsm1 = "problem";
                }
                else
                {
                  $ok_gsm1 = "ok";
                }
              }
              else
              {
                if ( !($gsm_warp_value1 <=  $row['gsm']) )
                {
                  $problem_gsm1 = "problem";
                }
                else
                {
                  $ok_gsm1 = "ok";
                }
              }

              if($gsm_warp_cond2 == 1)
              {
                if ( !($gsm_warp_value2 > $row['gsm']) )
                {
                  $problem_gsm2 = "problem";
                }
                else
                {
                  $ok_gsm2 = "ok";
                }
              }

              else 
              {
                if ( !($gsm_warp_value2 >= $row['gsm']) )
                {
                  $problem_gsm2 = "problem";
                }
                else
                {
                  $ok_gsm2 = "ok";
                }
              }

              if (($problem_gsm1 == "problem") && ($problem_gsm2 == "problem")) 
              {
                ?>
                <td bgcolor="#FF0000" ><?php echo $row['gsm'] ?></td>
                <?php
              }

              else if ( ($ok_gsm1 == "ok") && ($ok_gsm2 == "ok") )
              {
                ?>
                  <td bgcolor="#00FF00"><?php echo $row['gsm'] ?></td>
                <?php
              }

              else
              {
                ?>
                  <td bgcolor="#FF0000" ><?php echo $row['gsm'] ?></td>
                <?php
              }
            ?>

            <!-- fiber wamp condition -->
            <?php
              $problem_fiber_warp1 = "";
              $problem_fiber_warp2 = "";
              $ok_fiber_warp1 = "";
              $ok_fiber_warp2 = "";
              if($fiber_warp_cond1 == 1)
              {
                if ( !($fiber_warp_value1 < $row['fiber_warp']) )
                {
                  $problem_fiber_warp1 = "problem";
                }
                else
                {
                  $ok_fiber_warp1 = "ok";
                }
              }
              else
              {
                if ( !($fiber_warp_value1 <=  $row['fiber_warp']) )
                {
                  $problem_fiber_warp1 = "problem";
                }
                else
                {
                  $ok_fiber_warp1 = "ok";
                }
              }

              if($fiber_warp_cond2 == 1)
              {
                if ( !($fiber_warp_value2 > $row['fiber_warp']) )
                {
                  $problem_fiber_warp2 = "problem";
                }
                else
                {
                  $ok_fiber_warp2 = "ok";
                }
              }

              else 
              {
                if ( !($fiber_warp_value2 >= $row['fiber_warp']) )
                {
                  $problem_fiber_warp2 = "problem";
                }
                else
                {
                  $ok_fiber_warp2 = "ok";
                }
              }

              if (($problem_fiber_warp1 == "problem") && ($problem_fiber_warp2 == "problem")) 
              {
                ?>
                <!-- <td bgcolor="#FF0000" ><?php echo $row['fiber_warp'] ?></td> -->
                <?php
              }

              else if ( ($ok_fiber_warp1 == "ok") && ($ok_fiber_warp2 == "ok") )
              {
                ?>
                  <!-- <td bgcolor="#00FF00"><?php echo $row['fiber_warp'] ?></td> -->
                <?php
              }

              else
              {
                ?>
                  <!-- <td bgcolor="#FF0000" ><?php echo $row['fiber_warp'] ?></td> -->
                <?php
              }
            ?>

            <!-- thread ppi condition -->
            <?php
              $problem_fiber_weft1 = "";
              $problem_fiber_weft2 = "";
              $ok_fiber_weft1 = "";
              $ok_fiber_weft2 = "";
              if($fiber_weft_cond1 == 1)
              {
                if ( !($fiber_weft_value1 < $row['fiber_weft']) )
                {
                  $problem_fiber_weft1 = "problem";
                }
                else
                {
                  $ok_fiber_weft1 = "ok";
                }
              }
              else
              {
                if ( !($fiber_weft_value1 <=  $row['fiber_weft']) )
                {
                  $problem_fiber_weft1 = "problem";
                }
                else
                {
                  $ok_fiber_weft1 = "ok";
                }
              }

              if($fiber_weft_cond2 == 1)
              {
                if ( !($fiber_weft_value2 > $row['fiber_weft']) )
                {
                  $problem_fiber_weft2 = "problem";
                }
                else
                {
                  $ok_fiber_weft2 = "ok";
                }
              }

              else 
              {
                if ( !($fiber_weft_value2 >= $row['fiber_weft']) )
                {
                  $problem_fiber_weft2 = "problem";
                }
                else
                {
                  $ok_fiber_weft2 = "ok";
                }
              }

              if (($problem_fiber_weft1 == "problem") && ($problem_fiber_weft2 == "problem")) 
              {
                ?>
                <!-- <td bgcolor="#FF0000" ><?php echo $row['fiber_weft'] ?></td> -->
                <?php
              }

              else if ( ($ok_fiber_weft1 == "ok") && ($ok_fiber_weft2 == "ok") )
              {
                ?>
                  <!-- <td bgcolor="#00FF00" ><?php echo $row['fiber_weft'] ?></td> -->
                <?php
              }

              else
              {
                ?>
                  <!-- <td bgcolor="#FF0000" ><?php echo $row['fiber_weft'] ?></td> -->
                <?php
              }
            ?>
            
            <td><?php echo $row['width'] ?></td>
          </tr>
          <?php 
            ++$s1;
           }
          ?>
        </tbody> 
      </table>

      <table id="datatable-buttons" class="table table-striped table-bordered">
        <thead>
          <tr>

            <?php 
                if ($fiber_content_select == 1) 
                {
                    ?>
                        <th>SI</th>
                        <th>Fiber Total Polyster</th>
                        <th>Fiber Total Cotton</th>
                        <th>Fiber Total <?php echo $fiber_total_name_thired; ?></th>
                        <th>Fiber Total <?php echo $fiber_total_name_fourth; ?></th>
                        <th>Action</th>
                    <?php
                }

                elseif ($fiber_content_select == 2) 
                {
                    ?>
                        <th>SI</th>
                        <th>Fiber Warp Polyster</th>
                        <th>Fiber Warp Cotton</th>
                        <th>Fiber Warp <?php echo $fiber_warp_name_thired; ?></th>
                        <th>Fiber Warp <?php echo $fiber_warp_name_fourth; ?></th>

                        <th>Fiber Weft Polyster</th>
                        <th>Fiber Weft Cotton</th>
                        <th>Fiber Weft <?php echo $fiber_weft_name_thired; ?></th>
                        <th>Fiber Weft <?php echo $fiber_weft_name_fourth; ?></th>
                        <th>Action</th>
                    <?php
                }

                else
                {
                    ?>
                        <th>SI</th>

                        <th>Fiber Total Polyster</th>
                        <th>Fiber Total Cotton</th>
                        <th>Fiber Total <?php echo $fiber_total_name_thired; ?></th>
                        <th>Fiber Total <?php echo $fiber_total_name_fourth; ?></th>

                        <th>Fiber Warp Polyster</th>
                        <th>Fiber Warp Cotton</th>
                        <th>Fiber Warp <?php echo $fiber_warp_name_thired; ?></th>
                        <th>Fiber Warp <?php echo $fiber_warp_name_fourth; ?></th>

                        <th>Fiber Weft Polyster</th>
                        <th>Fiber Weft Cotton</th>
                        <th>Fiber Weft <?php echo $fiber_weft_name_thired; ?></th>
                        <th>Fiber Weft <?php echo $fiber_weft_name_fourth; ?></th>

                        <th>Action</th>
                    <?php
                }
            ?>
            
          </tr>
        </thead>
        
        <tbody>
          <?php 
            $s1 = 1;
            $sql_for_pp = "SELECT greige_receiving_process_info.*

                           FROM greige_receiving_process_info

                           WHERE greige_receiving_process_info.pp_no_id = '$pp_no_id'
                           AND greige_receiving_process_info.pp_details_id = '$pp_details_id'
                           AND greige_receiving_process_info.status = '1'
                           AND greige_receiving_process_info.active = '1'
                           ";

            $res_for_pp = mysqli_query($con, $sql_for_pp);

            while ($row = mysqli_fetch_assoc($res_for_pp)) 
            {
          ?>

          <?php 
              if ($fiber_content_select == 1) 
              {
                  ?>
                      <tr>
                        <td><?php echo $s1; ?></td>

                        <!-- fiber total polyester condition -->
                        <?php
                          $problem_fiber_total_polyester1 = "";
                          $problem_fiber_total_polyester2 = "";
                          $ok_fiber_total_polyester1 = "";
                          $ok_fiber_total_polyester2 = "";
                          if($fiber_total_polyester_cond1 == 1)
                          {
                            if ( !($fiber_total_polyester_value1 < $row['fiber_total_polyester']) )
                            {
                              $problem_fiber_total_polyester1 = "problem";
                            }
                            else
                            {
                              $ok_fiber_total_polyester1 = "ok";
                            }
                          }
                          else
                          {
                            if ( !($fiber_total_polyester_value1 <=  $row['fiber_total_polyester']) )
                            {
                              $problem_fiber_total_polyester1 = "problem";
                            }
                            else
                            {
                              $ok_fiber_total_polyester1 = "ok";
                            }
                          }

                          if($fiber_total_polyester_cond2 == 1)
                          {
                            if ( !($fiber_total_polyester_value2 > $row['fiber_total_polyester']) )
                            {
                              $problem_fiber_total_polyester2 = "problem";
                            }
                            else
                            {
                              $ok_fiber_total_polyester2 = "ok";
                            }
                          }

                          else 
                          {
                            if ( !($fiber_total_polyester_value2 >= $row['fiber_total_polyester']) )
                            {
                              $problem_fiber_total_polyester2 = "problem";
                            }
                            else
                            {
                              $ok_fiber_total_polyester2 = "ok";
                            }
                          }

                          if (($problem_fiber_total_polyester1 == "problem") && ($problem_fiber_total_polyester2 == "problem")) 
                          {
                            ?>
                            <td bgcolor="#FF0000" ><?php echo $row['fiber_total_polyester'] ?></td>
                            <?php
                          }

                          else if ( ($ok_fiber_total_polyester1 == "ok") && ($ok_fiber_total_polyester2 == "ok") )
                          {
                            ?>
                              <td bgcolor="#00FF00"><?php echo $row['fiber_total_polyester'] ?></td> 
                            <?php
                          }

                          else
                          {
                            ?>
                              <td bgcolor="#FF0000" ><?php echo $row['fiber_total_polyester'] ?></td> 
                            <?php
                          }
                        ?>

                        <!-- fiber total cotton condition -->
                        <?php
                          $problem_fiber_total_cotton1 = "";
                          $problem_fiber_total_cotton2 = "";
                          $ok_fiber_total_cotton1 = "";
                          $ok_fiber_total_cotton2 = "";
                          if($fiber_total_cotton_cond1 == 1)
                          {
                            if ( !($fiber_total_cotton_value1 < $row['fiber_total_cotton']) )
                            {
                              $problem_fiber_total_cotton1 = "problem";
                            }
                            else
                            {
                              $ok_fiber_total_cotton1 = "ok";
                            }
                          }
                          else
                          {
                            if ( !($fiber_total_cotton_value1 <=  $row['fiber_total_cotton']) )
                            {
                              $problem_fiber_total_cotton1 = "problem";
                            }
                            else
                            {
                              $ok_fiber_total_cotton1 = "ok";
                            }
                          }

                          if($fiber_total_cotton_cond2 == 1)
                          {
                            if ( !($fiber_total_cotton_value2 > $row['fiber_total_cotton']) )
                            {
                              $problem_fiber_total_cotton2 = "problem";
                            }
                            else
                            {
                              $ok_fiber_total_cotton2 = "ok";
                            }
                          }

                          else 
                          {
                            if ( !($fiber_total_cotton_value2 >= $row['fiber_total_cotton']) )
                            {
                              $problem_fiber_total_cotton2 = "problem";
                            }
                            else
                            {
                              $ok_fiber_total_cotton2 = "ok";
                            }
                          }

                          if (($problem_fiber_total_cotton1 == "problem") && ($problem_fiber_total_cotton2 == "problem")) 
                          {
                            ?>
                            <td bgcolor="#FF0000" ><?php echo $row['fiber_total_cotton'] ?></td>
                            <?php
                          }

                          else if ( ($ok_fiber_total_cotton1 == "ok") && ($ok_fiber_total_cotton2 == "ok") )
                          {
                            ?>
                              <td bgcolor="#00FF00"><?php echo $row['fiber_total_cotton'] ?></td> 
                            <?php
                          }

                          else
                          {
                            ?>
                              <td bgcolor="#FF0000" ><?php echo $row['fiber_total_cotton'] ?></td> 
                            <?php
                          }
                        ?>


                        <!-- fiber total thired condition -->
                        <?php
                          $problem_fiber_total_thired1 = "";
                          $problem_fiber_total_thired2 = "";
                          $ok_fiber_total_thired1 = "";
                          $ok_fiber_total_thired2 = "";
                          if($fiber_total_thired_cond1 == 1)
                          {
                            if ( !($fiber_total_thired_value1 < $row['fiber_total_thired']) )
                            {
                              $problem_fiber_total_thired1 = "problem";
                            }
                            else
                            {
                              $ok_fiber_total_thired1 = "ok";
                            }
                          }
                          else
                          {
                            if ( !($fiber_total_thired_value1 <=  $row['fiber_total_thired']) )
                            {
                              $problem_fiber_total_thired1 = "problem";
                            }
                            else
                            {
                              $ok_fiber_total_thired1 = "ok";
                            }
                          }

                          if($fiber_total_thired_cond2 == 1)
                          {
                            if ( !($fiber_total_thired_value2 > $row['fiber_total_thired']) )
                            {
                              $problem_fiber_total_thired2 = "problem";
                            }
                            else
                            {
                              $ok_fiber_total_thired2 = "ok";
                            }
                          }

                          else 
                          {
                            if ( !($fiber_total_thired_value2 >= $row['fiber_total_thired']) )
                            {
                              $problem_fiber_total_thired2 = "problem";
                            }
                            else
                            {
                              $ok_fiber_total_thired2 = "ok";
                            }
                          }

                          if (($problem_fiber_total_thired1 == "problem") && ($problem_fiber_total_thired2 == "problem")) 
                          {
                            ?>
                            <td bgcolor="#FF0000" ><?php echo $row['fiber_total_thired'] ?></td>
                            <?php
                          }

                          else if ( ($ok_fiber_total_thired1 == "ok") && ($ok_fiber_total_thired2 == "ok") )
                          {
                            ?>
                              <td bgcolor="#00FF00"><?php echo $row['fiber_total_thired'] ?></td> 
                            <?php
                          }

                          else
                          {
                            ?>
                              <td bgcolor="#FF0000" ><?php echo $row['fiber_total_thired'] ?></td> 
                            <?php
                          }
                        ?>

                        <!-- fiber total fourth condition -->
                        <?php
                          $problem_fiber_total_fourth1 = "";
                          $problem_fiber_total_fourth2 = "";
                          $ok_fiber_total_fourth1 = "";
                          $ok_fiber_total_fourth2 = "";
                          if($fiber_total_fourth_cond1 == 1)
                          {
                            if ( !($fiber_total_fourth_value1 < $row['fiber_total_fourth']) )
                            {
                              $problem_fiber_total_fourth1 = "problem";
                            }
                            else
                            {
                              $ok_fiber_total_fourth1 = "ok";
                            }
                          }
                          else
                          {
                            if ( !($fiber_total_fourth_value1 <=  $row['fiber_total_fourth']) )
                            {
                              $problem_fiber_total_fourth1 = "problem";
                            }
                            else
                            {
                              $ok_fiber_total_fourth1 = "ok";
                            }
                          }

                          if($fiber_total_fourth_cond2 == 1)
                          {
                            if ( !($fiber_total_fourth_value2 > $row['fiber_total_fourth']) )
                            {
                              $problem_fiber_total_fourth2 = "problem";
                            }
                            else
                            {
                              $ok_fiber_total_fourth2 = "ok";
                            }
                          }

                          else 
                          {
                            if ( !($fiber_total_fourth_value2 >= $row['fiber_total_fourth']) )
                            {
                              $problem_fiber_total_fourth2 = "problem";
                            }
                            else
                            {
                              $ok_fiber_total_fourth2 = "ok";
                            }
                          }

                          if (($problem_fiber_total_fourth1 == "problem") && ($problem_fiber_total_fourth2 == "problem")) 
                          {
                            ?>
                            <td bgcolor="#FF0000" ><?php echo $row['fiber_total_fourth'] ?></td>
                            <?php
                          }

                          else if ( ($ok_fiber_total_fourth1 == "ok") && ($ok_fiber_total_fourth2 == "ok") )
                          {
                            ?>
                              <td bgcolor="#00FF00"><?php echo $row['fiber_total_fourth'] ?></td> 
                            <?php
                          }

                          else
                          {
                            ?>
                              <td bgcolor="#FF0000" ><?php echo $row['fiber_total_fourth'] ?></td> 
                            <?php
                          }
                        ?>

                        <td>
                          <!-- <form action="edit_greige_issunce.php" method="post" style="display: inline;"> -->
                            <input type="hidden" id="pp_no_id" name="pp_no_id" value="<?php echo $pp_no_id; ?>">
                            <input type="hidden" id="pp_details_id" name="pp_details_id" value="<?php echo $pp_details_id; ?>">
                            <input type="hidden" id="greige_issunce_id" name="greige_issunce_id" value="<?php echo $row['greige_issunce_id']; ?>">
                            <button type="submit" id="gray_issue_add_btn" value="<?php echo ($s1-1); ?>" name="gray_issue_add_btn" onclick="greige_issunce_edit_form(this.value);" class="btn btn-primary btn-xs"> Edit </button>
                          <!-- </form> -->
                        </td>
                      </tr>
                  <?php
              }

              elseif ($fiber_content_select == 2) 
              {
                  
                  ?>
                      <tr>
                        <td><?php echo $s1; ?></td>

                        <!-- fiber warp polyester condition -->
                        <?php
                          $problem_fiber_warp_polyester1 = "";
                          $problem_fiber_warp_polyester2 = "";
                          $ok_fiber_warp_polyester1 = "";
                          $ok_fiber_warp_polyester2 = "";
                          if($fiber_warp_polyester_cond1 == 1)
                          {
                            if ( !($fiber_warp_polyester_value1 < $row['fiber_warp_polyester']) )
                            {
                              $problem_fiber_warp_polyester1 = "problem";
                            }
                            else
                            {
                              $ok_fiber_warp_polyester1 = "ok";
                            }
                          }
                          else
                          {
                            if ( !($fiber_warp_polyester_value1 <=  $row['fiber_warp_polyester']) )
                            {
                              $problem_fiber_warp_polyester1 = "problem";
                            }
                            else
                            {
                              $ok_fiber_warp_polyester1 = "ok";
                            }
                          }

                          if($fiber_warp_polyester_cond2 == 1)
                          {
                            if ( !($fiber_warp_polyester_value2 > $row['fiber_warp_polyester']) )
                            {
                              $problem_fiber_warp_polyester2 = "problem";
                            }
                            else
                            {
                              $ok_fiber_warp_polyester2 = "ok";
                            }
                          }

                          else 
                          {
                            if ( !($fiber_warp_polyester_value2 >= $row['fiber_warp_polyester']) )
                            {
                              $problem_fiber_warp_polyester2 = "problem";
                            }
                            else
                            {
                              $ok_fiber_warp_polyester2 = "ok";
                            }
                          }

                          if (($problem_fiber_warp_polyester1 == "problem") && ($problem_fiber_warp_polyester2 == "problem")) 
                          {
                            ?>
                            <td bgcolor="#FF0000" ><?php echo $row['fiber_warp_polyester'] ?></td>
                            <?php
                          }

                          else if ( ($ok_fiber_warp_polyester1 == "ok") && ($ok_fiber_warp_polyester2 == "ok") )
                          {
                            ?>
                              <td bgcolor="#00FF00"><?php echo $row['fiber_warp_polyester'] ?></td> 
                            <?php
                          }

                          else
                          {
                            ?>
                              <td bgcolor="#FF0000" ><?php echo $row['fiber_warp_polyester'] ?></td> 
                            <?php
                          }
                        ?>

                        <!-- fiber warp cotton condition -->
                        <?php
                          $problem_fiber_warp_cotton1 = "";
                          $problem_fiber_warp_cotton2 = "";
                          $ok_fiber_warp_cotton1 = "";
                          $ok_fiber_warp_cotton2 = "";
                          if($fiber_warp_cotton_cond1 == 1)
                          {
                            if ( !($fiber_warp_cotton_value1 < $row['fiber_warp_cotton']) )
                            {
                              $problem_fiber_warp_cotton1 = "problem";
                            }
                            else
                            {
                              $ok_fiber_warp_cotton1 = "ok";
                            }
                          }
                          else
                          {
                            if ( !($fiber_warp_cotton_value1 <=  $row['fiber_warp_cotton']) )
                            {
                              $problem_fiber_warp_cotton1 = "problem";
                            }
                            else
                            {
                              $ok_fiber_warp_cotton1 = "ok";
                            }
                          }

                          if($fiber_warp_cotton_cond2 == 1)
                          {
                            if ( !($fiber_warp_cotton_value2 > $row['fiber_warp_cotton']) )
                            {
                              $problem_fiber_warp_cotton2 = "problem";
                            }
                            else
                            {
                              $ok_fiber_warp_cotton2 = "ok";
                            }
                          }

                          else 
                          {
                            if ( !($fiber_warp_cotton_value2 >= $row['fiber_warp_cotton']) )
                            {
                              $problem_fiber_warp_cotton2 = "problem";
                            }
                            else
                            {
                              $ok_fiber_warp_cotton2 = "ok";
                            }
                          }

                          if (($problem_fiber_warp_cotton1 == "problem") && ($problem_fiber_warp_cotton2 == "problem")) 
                          {
                            ?>
                            <td bgcolor="#FF0000" ><?php echo $row['fiber_warp_cotton'] ?></td>
                            <?php
                          }

                          else if ( ($ok_fiber_warp_cotton1 == "ok") && ($ok_fiber_warp_cotton2 == "ok") )
                          {
                            ?>
                              <td bgcolor="#00FF00"><?php echo $row['fiber_warp_cotton'] ?></td> 
                            <?php
                          }

                          else
                          {
                            ?>
                              <td bgcolor="#FF0000" ><?php echo $row['fiber_warp_cotton'] ?></td> 
                            <?php
                          }
                        ?>


                        <!-- fiber warp thired condition -->
                        <?php
                          $problem_fiber_warp_thired1 = "";
                          $problem_fiber_warp_thired2 = "";
                          $ok_fiber_warp_thired1 = "";
                          $ok_fiber_warp_thired2 = "";
                          if($fiber_warp_thired_cond1 == 1)
                          {
                            if ( !($fiber_warp_thired_value1 < $row['fiber_warp_thired']) )
                            {
                              $problem_fiber_warp_thired1 = "problem";
                            }
                            else
                            {
                              $ok_fiber_warp_thired1 = "ok";
                            }
                          }
                          else
                          {
                            if ( !($fiber_warp_thired_value1 <=  $row['fiber_warp_thired']) )
                            {
                              $problem_fiber_warp_thired1 = "problem";
                            }
                            else
                            {
                              $ok_fiber_warp_thired1 = "ok";
                            }
                          }

                          if($fiber_warp_thired_cond2 == 1)
                          {
                            if ( !($fiber_warp_thired_value2 > $row['fiber_warp_thired']) )
                            {
                              $problem_fiber_warp_thired2 = "problem";
                            }
                            else
                            {
                              $ok_fiber_warp_thired2 = "ok";
                            }
                          }

                          else 
                          {
                            if ( !($fiber_warp_thired_value2 >= $row['fiber_warp_thired']) )
                            {
                              $problem_fiber_warp_thired2 = "problem";
                            }
                            else
                            {
                              $ok_fiber_warp_thired2 = "ok";
                            }
                          }

                          if (($problem_fiber_warp_thired1 == "problem") && ($problem_fiber_warp_thired2 == "problem")) 
                          {
                            ?>
                            <td bgcolor="#FF0000" ><?php echo $row['fiber_warp_thired'] ?></td>
                            <?php
                          }

                          else if ( ($ok_fiber_warp_thired1 == "ok") && ($ok_fiber_warp_thired2 == "ok") )
                          {
                            ?>
                              <td bgcolor="#00FF00"><?php echo $row['fiber_warp_thired'] ?></td> 
                            <?php
                          }

                          else
                          {
                            ?>
                              <td bgcolor="#FF0000" ><?php echo $row['fiber_warp_thired'] ?></td> 
                            <?php
                          }
                        ?>

                        <!-- fiber warp fourth condition -->
                        <?php
                          $problem_fiber_warp_fourth1 = "";
                          $problem_fiber_warp_fourth2 = "";
                          $ok_fiber_warp_fourth1 = "";
                          $ok_fiber_warp_fourth2 = "";
                          if($fiber_warp_fourth_cond1 == 1)
                          {
                            if ( !($fiber_warp_fourth_value1 < $row['fiber_warp_fourth']) )
                            {
                              $problem_fiber_warp_fourth1 = "problem";
                            }
                            else
                            {
                              $ok_fiber_warp_fourth1 = "ok";
                            }
                          }
                          else
                          {
                            if ( !($fiber_warp_fourth_value1 <=  $row['fiber_warp_fourth']) )
                            {
                              $problem_fiber_warp_fourth1 = "problem";
                            }
                            else
                            {
                              $ok_fiber_warp_fourth1 = "ok";
                            }
                          }

                          if($fiber_warp_fourth_cond2 == 1)
                          {
                            if ( !($fiber_warp_fourth_value2 > $row['fiber_warp_fourth']) )
                            {
                              $problem_fiber_warp_fourth2 = "problem";
                            }
                            else
                            {
                              $ok_fiber_warp_fourth2 = "ok";
                            }
                          }

                          else 
                          {
                            if ( !($fiber_warp_fourth_value2 >= $row['fiber_warp_fourth']) )
                            {
                              $problem_fiber_warp_fourth2 = "problem";
                            }
                            else
                            {
                              $ok_fiber_warp_fourth2 = "ok";
                            }
                          }

                          if (($problem_fiber_warp_fourth1 == "problem") && ($problem_fiber_warp_fourth2 == "problem")) 
                          {
                            ?>
                            <td bgcolor="#FF0000" ><?php echo $row['fiber_warp_fourth'] ?></td>
                            <?php
                          }

                          else if ( ($ok_fiber_warp_fourth1 == "ok") && ($ok_fiber_warp_fourth2 == "ok") )
                          {
                            ?>
                              <td bgcolor="#00FF00"><?php echo $row['fiber_warp_fourth'] ?></td> 
                            <?php
                          }

                          else
                          {
                            ?>
                              <td bgcolor="#FF0000" ><?php echo $row['fiber_warp_fourth'] ?></td> 
                            <?php
                          }
                        ?>

                        <!-- start fiber weft --> 

                        <!-- fiber weft polyester condition -->
                        <?php
                          $problem_fiber_weft_polyester1 = "";
                          $problem_fiber_weft_polyester2 = "";
                          $ok_fiber_weft_polyester1 = "";
                          $ok_fiber_weft_polyester2 = "";
                          if($fiber_weft_polyester_cond1 == 1)
                          {
                            if ( !($fiber_weft_polyester_value1 < $row['fiber_weft_polyester']) )
                            {
                              $problem_fiber_weft_polyester1 = "problem";
                            }
                            else
                            {
                              $ok_fiber_weft_polyester1 = "ok";
                            }
                          }
                          else
                          {
                            if ( !($fiber_weft_polyester_value1 <=  $row['fiber_weft_polyester']) )
                            {
                              $problem_fiber_weft_polyester1 = "problem";
                            }
                            else
                            {
                              $ok_fiber_weft_polyester1 = "ok";
                            }
                          }

                          if($fiber_weft_polyester_cond2 == 1)
                          {
                            if ( !($fiber_weft_polyester_value2 > $row['fiber_weft_polyester']) )
                            {
                              $problem_fiber_weft_polyester2 = "problem";
                            }
                            else
                            {
                              $ok_fiber_weft_polyester2 = "ok";
                            }
                          }

                          else 
                          {
                            if ( !($fiber_weft_polyester_value2 >= $row['fiber_weft_polyester']) )
                            {
                              $problem_fiber_weft_polyester2 = "problem";
                            }
                            else
                            {
                              $ok_fiber_weft_polyester2 = "ok";
                            }
                          }

                          if (($problem_fiber_weft_polyester1 == "problem") && ($problem_fiber_weft_polyester2 == "problem")) 
                          {
                            ?>
                            <td bgcolor="#FF0000" ><?php echo $row['fiber_weft_polyester'] ?></td>
                            <?php
                          }

                          else if ( ($ok_fiber_weft_polyester1 == "ok") && ($ok_fiber_weft_polyester2 == "ok") )
                          {
                            ?>
                              <td bgcolor="#00FF00"><?php echo $row['fiber_weft_polyester'] ?></td> 
                            <?php
                          }

                          else
                          {
                            ?>
                              <td bgcolor="#FF0000" ><?php echo $row['fiber_weft_polyester'] ?></td> 
                            <?php
                          }
                        ?>

                        <!-- fiber weft cotton condition -->
                        <?php
                          $problem_fiber_weft_cotton1 = "";
                          $problem_fiber_weft_cotton2 = "";
                          $ok_fiber_weft_cotton1 = "";
                          $ok_fiber_weft_cotton2 = "";
                          if($fiber_weft_cotton_cond1 == 1)
                          {
                            if ( !($fiber_weft_cotton_value1 < $row['fiber_weft_cotton']) )
                            {
                              $problem_fiber_weft_cotton1 = "problem";
                            }
                            else
                            {
                              $ok_fiber_weft_cotton1 = "ok";
                            }
                          }
                          else
                          {
                            if ( !($fiber_weft_cotton_value1 <=  $row['fiber_weft_cotton']) )
                            {
                              $problem_fiber_weft_cotton1 = "problem";
                            }
                            else
                            {
                              $ok_fiber_weft_cotton1 = "ok";
                            }
                          }

                          if($fiber_weft_cotton_cond2 == 1)
                          {
                            if ( !($fiber_weft_cotton_value2 > $row['fiber_weft_cotton']) )
                            {
                              $problem_fiber_weft_cotton2 = "problem";
                            }
                            else
                            {
                              $ok_fiber_weft_cotton2 = "ok";
                            }
                          }

                          else 
                          {
                            if ( !($fiber_weft_cotton_value2 >= $row['fiber_weft_cotton']) )
                            {
                              $problem_fiber_weft_cotton2 = "problem";
                            }
                            else
                            {
                              $ok_fiber_weft_cotton2 = "ok";
                            }
                          }

                          if (($problem_fiber_weft_cotton1 == "problem") && ($problem_fiber_weft_cotton2 == "problem")) 
                          {
                            ?>
                            <td bgcolor="#FF0000" ><?php echo $row['fiber_weft_cotton'] ?></td>
                            <?php
                          }

                          else if ( ($ok_fiber_weft_cotton1 == "ok") && ($ok_fiber_weft_cotton2 == "ok") )
                          {
                            ?>
                              <td bgcolor="#00FF00"><?php echo $row['fiber_weft_cotton'] ?></td> 
                            <?php
                          }

                          else
                          {
                            ?>
                              <td bgcolor="#FF0000" ><?php echo $row['fiber_weft_cotton'] ?></td> 
                            <?php
                          }
                        ?>


                        <!-- fiber weft thired condition -->
                        <?php
                          $problem_fiber_weft_thired1 = "";
                          $problem_fiber_weft_thired2 = "";
                          $ok_fiber_weft_thired1 = "";
                          $ok_fiber_weft_thired2 = "";
                          if($fiber_weft_thired_cond1 == 1)
                          {
                            if ( !($fiber_weft_thired_value1 < $row['fiber_weft_thired']) )
                            {
                              $problem_fiber_weft_thired1 = "problem";
                            }
                            else
                            {
                              $ok_fiber_weft_thired1 = "ok";
                            }
                          }
                          else
                          {
                            if ( !($fiber_weft_thired_value1 <=  $row['fiber_weft_thired']) )
                            {
                              $problem_fiber_weft_thired1 = "problem";
                            }
                            else
                            {
                              $ok_fiber_weft_thired1 = "ok";
                            }
                          }

                          if($fiber_weft_thired_cond2 == 1)
                          {
                            if ( !($fiber_weft_thired_value2 > $row['fiber_weft_thired']) )
                            {
                              $problem_fiber_weft_thired2 = "problem";
                            }
                            else
                            {
                              $ok_fiber_weft_thired2 = "ok";
                            }
                          }

                          else 
                          {
                            if ( !($fiber_weft_thired_value2 >= $row['fiber_weft_thired']) )
                            {
                              $problem_fiber_weft_thired2 = "problem";
                            }
                            else
                            {
                              $ok_fiber_weft_thired2 = "ok";
                            }
                          }

                          if (($problem_fiber_weft_thired1 == "problem") && ($problem_fiber_weft_thired2 == "problem")) 
                          {
                            ?>
                            <td bgcolor="#FF0000" ><?php echo $row['fiber_weft_thired'] ?></td>
                            <?php
                          }

                          else if ( ($ok_fiber_weft_thired1 == "ok") && ($ok_fiber_weft_thired2 == "ok") )
                          {
                            ?>
                              <td bgcolor="#00FF00"><?php echo $row['fiber_weft_thired'] ?></td> 
                            <?php
                          }

                          else
                          {
                            ?>
                              <td bgcolor="#FF0000" ><?php echo $row['fiber_weft_thired'] ?></td> 
                            <?php
                          }
                        ?>

                        <!-- fiber weft fourth condition -->
                        <?php
                          $problem_fiber_weft_fourth1 = "";
                          $problem_fiber_weft_fourth2 = "";
                          $ok_fiber_weft_fourth1 = "";
                          $ok_fiber_weft_fourth2 = "";
                          if($fiber_weft_fourth_cond1 == 1)
                          {
                            if ( !($fiber_weft_fourth_value1 < $row['fiber_weft_fourth']) )
                            {
                              $problem_fiber_weft_fourth1 = "problem";
                            }
                            else
                            {
                              $ok_fiber_weft_fourth1 = "ok";
                            }
                          }
                          else
                          {
                            if ( !($fiber_weft_fourth_value1 <=  $row['fiber_weft_fourth']) )
                            {
                              $problem_fiber_weft_fourth1 = "problem";
                            }
                            else
                            {
                              $ok_fiber_weft_fourth1 = "ok";
                            }
                          }

                          if($fiber_weft_fourth_cond2 == 1)
                          {
                            if ( !($fiber_weft_fourth_value2 > $row['fiber_weft_fourth']) )
                            {
                              $problem_fiber_weft_fourth2 = "problem";
                            }
                            else
                            {
                              $ok_fiber_weft_fourth2 = "ok";
                            }
                          }

                          else 
                          {
                            if ( !($fiber_weft_fourth_value2 >= $row['fiber_weft_fourth']) )
                            {
                              $problem_fiber_weft_fourth2 = "problem";
                            }
                            else
                            {
                              $ok_fiber_weft_fourth2 = "ok";
                            }
                          }

                          if (($problem_fiber_weft_fourth1 == "problem") && ($problem_fiber_weft_fourth2 == "problem")) 
                          {
                            ?>
                            <td bgcolor="#FF0000" ><?php echo $row['fiber_weft_fourth'] ?></td>
                            <?php
                          }

                          else if ( ($ok_fiber_weft_fourth1 == "ok") && ($ok_fiber_weft_fourth2 == "ok") )
                          {
                            ?>
                              <td bgcolor="#00FF00"><?php echo $row['fiber_weft_fourth'] ?></td> 
                            <?php
                          }

                          else
                          {
                            ?>
                              <td bgcolor="#FF0000" ><?php echo $row['fiber_weft_fourth'] ?></td> 
                            <?php
                          }
                        ?>

                        <td>
                          <!-- <form action="edit_greige_issunce.php" method="post" style="display: inline;"> -->
                            <input type="hidden" id="pp_no_id" name="pp_no_id" value="<?php echo $pp_no_id; ?>">
                            <input type="hidden" id="pp_details_id" name="pp_details_id" value="<?php echo $pp_details_id; ?>">
                            <input type="hidden" id="greige_issunce_id" name="greige_issunce_id" value="<?php echo $row['greige_issunce_id']; ?>">
                            <button type="submit" id="gray_issue_add_btn" value="<?php echo ($s1-1); ?>" name="gray_issue_add_btn" onclick="greige_issunce_edit_form(this.value);" class="btn btn-primary btn-xs"> Edit </button>
                          <!-- </form> -->
                        </td>
                      </tr>
                  <?php
              }

              else
              {

                  ?>
                      <tr>
                        <td><?php echo $s1; ?></td>

                        <!-- fiber total polyester condition -->
                        <?php
                          $problem_fiber_total_polyester1 = "";
                          $problem_fiber_total_polyester2 = "";
                          $ok_fiber_total_polyester1 = "";
                          $ok_fiber_total_polyester2 = "";
                          if($fiber_total_polyester_cond1 == 1)
                          {
                            if ( !($fiber_total_polyester_value1 < $row['fiber_total_polyester']) )
                            {
                              $problem_fiber_total_polyester1 = "problem";
                            }
                            else
                            {
                              $ok_fiber_total_polyester1 = "ok";
                            }
                          }
                          else
                          {
                            if ( !($fiber_total_polyester_value1 <=  $row['fiber_total_polyester']) )
                            {
                              $problem_fiber_total_polyester1 = "problem";
                            }
                            else
                            {
                              $ok_fiber_total_polyester1 = "ok";
                            }
                          }

                          if($fiber_total_polyester_cond2 == 1)
                          {
                            if ( !($fiber_total_polyester_value2 > $row['fiber_total_polyester']) )
                            {
                              $problem_fiber_total_polyester2 = "problem";
                            }
                            else
                            {
                              $ok_fiber_total_polyester2 = "ok";
                            }
                          }

                          else 
                          {
                            if ( !($fiber_total_polyester_value2 >= $row['fiber_total_polyester']) )
                            {
                              $problem_fiber_total_polyester2 = "problem";
                            }
                            else
                            {
                              $ok_fiber_total_polyester2 = "ok";
                            }
                          }

                          if (($problem_fiber_total_polyester1 == "problem") && ($problem_fiber_total_polyester2 == "problem")) 
                          {
                            ?>
                            <td bgcolor="#FF0000" ><?php echo $row['fiber_total_polyester'] ?></td>
                            <?php
                          }

                          else if ( ($ok_fiber_total_polyester1 == "ok") && ($ok_fiber_total_polyester2 == "ok") )
                          {
                            ?>
                              <td bgcolor="#00FF00"><?php echo $row['fiber_total_polyester'] ?></td> 
                            <?php
                          }

                          else
                          {
                            ?>
                              <td bgcolor="#FF0000" ><?php echo $row['fiber_total_polyester'] ?></td> 
                            <?php
                          }
                        ?>

                        <!-- fiber total cotton condition -->
                        <?php
                          $problem_fiber_total_cotton1 = "";
                          $problem_fiber_total_cotton2 = "";
                          $ok_fiber_total_cotton1 = "";
                          $ok_fiber_total_cotton2 = "";
                          if($fiber_total_cotton_cond1 == 1)
                          {
                            if ( !($fiber_total_cotton_value1 < $row['fiber_total_cotton']) )
                            {
                              $problem_fiber_total_cotton1 = "problem";
                            }
                            else
                            {
                              $ok_fiber_total_cotton1 = "ok";
                            }
                          }
                          else
                          {
                            if ( !($fiber_total_cotton_value1 <=  $row['fiber_total_cotton']) )
                            {
                              $problem_fiber_total_cotton1 = "problem";
                            }
                            else
                            {
                              $ok_fiber_total_cotton1 = "ok";
                            }
                          }

                          if($fiber_total_cotton_cond2 == 1)
                          {
                            if ( !($fiber_total_cotton_value2 > $row['fiber_total_cotton']) )
                            {
                              $problem_fiber_total_cotton2 = "problem";
                            }
                            else
                            {
                              $ok_fiber_total_cotton2 = "ok";
                            }
                          }

                          else 
                          {
                            if ( !($fiber_total_cotton_value2 >= $row['fiber_total_cotton']) )
                            {
                              $problem_fiber_total_cotton2 = "problem";
                            }
                            else
                            {
                              $ok_fiber_total_cotton2 = "ok";
                            }
                          }

                          if (($problem_fiber_total_cotton1 == "problem") && ($problem_fiber_total_cotton2 == "problem")) 
                          {
                            ?>
                            <td bgcolor="#FF0000" ><?php echo $row['fiber_total_cotton'] ?></td>
                            <?php
                          }

                          else if ( ($ok_fiber_total_cotton1 == "ok") && ($ok_fiber_total_cotton2 == "ok") )
                          {
                            ?>
                              <td bgcolor="#00FF00"><?php echo $row['fiber_total_cotton'] ?></td> 
                            <?php
                          }

                          else
                          {
                            ?>
                              <td bgcolor="#FF0000" ><?php echo $row['fiber_total_cotton'] ?></td> 
                            <?php
                          }
                        ?>


                        <!-- fiber total thired condition -->
                        <?php
                          $problem_fiber_total_thired1 = "";
                          $problem_fiber_total_thired2 = "";
                          $ok_fiber_total_thired1 = "";
                          $ok_fiber_total_thired2 = "";
                          if($fiber_total_thired_cond1 == 1)
                          {
                            if ( !($fiber_total_thired_value1 < $row['fiber_total_thired']) )
                            {
                              $problem_fiber_total_thired1 = "problem";
                            }
                            else
                            {
                              $ok_fiber_total_thired1 = "ok";
                            }
                          }
                          else
                          {
                            if ( !($fiber_total_thired_value1 <=  $row['fiber_total_thired']) )
                            {
                              $problem_fiber_total_thired1 = "problem";
                            }
                            else
                            {
                              $ok_fiber_total_thired1 = "ok";
                            }
                          }

                          if($fiber_total_thired_cond2 == 1)
                          {
                            if ( !($fiber_total_thired_value2 > $row['fiber_total_thired']) )
                            {
                              $problem_fiber_total_thired2 = "problem";
                            }
                            else
                            {
                              $ok_fiber_total_thired2 = "ok";
                            }
                          }

                          else 
                          {
                            if ( !($fiber_total_thired_value2 >= $row['fiber_total_thired']) )
                            {
                              $problem_fiber_total_thired2 = "problem";
                            }
                            else
                            {
                              $ok_fiber_total_thired2 = "ok";
                            }
                          }

                          if (($problem_fiber_total_thired1 == "problem") && ($problem_fiber_total_thired2 == "problem")) 
                          {
                            ?>
                            <td bgcolor="#FF0000" ><?php echo $row['fiber_total_thired'] ?></td>
                            <?php
                          }

                          else if ( ($ok_fiber_total_thired1 == "ok") && ($ok_fiber_total_thired2 == "ok") )
                          {
                            ?>
                              <td bgcolor="#00FF00"><?php echo $row['fiber_total_thired'] ?></td> 
                            <?php
                          }

                          else
                          {
                            ?>
                              <td bgcolor="#FF0000" ><?php echo $row['fiber_total_thired'] ?></td> 
                            <?php
                          }
                        ?>

                        <!-- fiber total fourth condition -->
                        <?php
                          $problem_fiber_total_fourth1 = "";
                          $problem_fiber_total_fourth2 = "";
                          $ok_fiber_total_fourth1 = "";
                          $ok_fiber_total_fourth2 = "";
                          if($fiber_total_fourth_cond1 == 1)
                          {
                            if ( !($fiber_total_fourth_value1 < $row['fiber_total_fourth']) )
                            {
                              $problem_fiber_total_fourth1 = "problem";
                            }
                            else
                            {
                              $ok_fiber_total_fourth1 = "ok";
                            }
                          }
                          else
                          {
                            if ( !($fiber_total_fourth_value1 <=  $row['fiber_total_fourth']) )
                            {
                              $problem_fiber_total_fourth1 = "problem";
                            }
                            else
                            {
                              $ok_fiber_total_fourth1 = "ok";
                            }
                          }

                          if($fiber_total_fourth_cond2 == 1)
                          {
                            if ( !($fiber_total_fourth_value2 > $row['fiber_total_fourth']) )
                            {
                              $problem_fiber_total_fourth2 = "problem";
                            }
                            else
                            {
                              $ok_fiber_total_fourth2 = "ok";
                            }
                          }

                          else 
                          {
                            if ( !($fiber_total_fourth_value2 >= $row['fiber_total_fourth']) )
                            {
                              $problem_fiber_total_fourth2 = "problem";
                            }
                            else
                            {
                              $ok_fiber_total_fourth2 = "ok";
                            }
                          }

                          if (($problem_fiber_total_fourth1 == "problem") && ($problem_fiber_total_fourth2 == "problem")) 
                          {
                            ?>
                            <td bgcolor="#FF0000" ><?php echo $row['fiber_total_fourth'] ?></td>
                            <?php
                          }

                          else if ( ($ok_fiber_total_fourth1 == "ok") && ($ok_fiber_total_fourth2 == "ok") )
                          {
                            ?>
                              <td bgcolor="#00FF00"><?php echo $row['fiber_total_fourth'] ?></td> 
                            <?php
                          }

                          else
                          {
                            ?>
                              <td bgcolor="#FF0000" ><?php echo $row['fiber_total_fourth'] ?></td> 
                            <?php
                          }
                        ?>


                        <!-- fiber warp polyester condition -->
                        <?php
                          $problem_fiber_warp_polyester1 = "";
                          $problem_fiber_warp_polyester2 = "";
                          $ok_fiber_warp_polyester1 = "";
                          $ok_fiber_warp_polyester2 = "";
                          if($fiber_warp_polyester_cond1 == 1)
                          {
                            if ( !($fiber_warp_polyester_value1 < $row['fiber_warp_polyester']) )
                            {
                              $problem_fiber_warp_polyester1 = "problem";
                            }
                            else
                            {
                              $ok_fiber_warp_polyester1 = "ok";
                            }
                          }
                          else
                          {
                            if ( !($fiber_warp_polyester_value1 <=  $row['fiber_warp_polyester']) )
                            {
                              $problem_fiber_warp_polyester1 = "problem";
                            }
                            else
                            {
                              $ok_fiber_warp_polyester1 = "ok";
                            }
                          }

                          if($fiber_warp_polyester_cond2 == 1)
                          {
                            if ( !($fiber_warp_polyester_value2 > $row['fiber_warp_polyester']) )
                            {
                              $problem_fiber_warp_polyester2 = "problem";
                            }
                            else
                            {
                              $ok_fiber_warp_polyester2 = "ok";
                            }
                          }

                          else 
                          {
                            if ( !($fiber_warp_polyester_value2 >= $row['fiber_warp_polyester']) )
                            {
                              $problem_fiber_warp_polyester2 = "problem";
                            }
                            else
                            {
                              $ok_fiber_warp_polyester2 = "ok";
                            }
                          }

                          if (($problem_fiber_warp_polyester1 == "problem") && ($problem_fiber_warp_polyester2 == "problem")) 
                          {
                            ?>
                            <td bgcolor="#FF0000" ><?php echo $row['fiber_warp_polyester'] ?></td>
                            <?php
                          }

                          else if ( ($ok_fiber_warp_polyester1 == "ok") && ($ok_fiber_warp_polyester2 == "ok") )
                          {
                            ?>
                              <td bgcolor="#00FF00"><?php echo $row['fiber_warp_polyester'] ?></td> 
                            <?php
                          }

                          else
                          {
                            ?>
                              <td bgcolor="#FF0000" ><?php echo $row['fiber_warp_polyester'] ?></td> 
                            <?php
                          }
                        ?>

                        <!-- fiber warp cotton condition -->
                        <?php
                          $problem_fiber_warp_cotton1 = "";
                          $problem_fiber_warp_cotton2 = "";
                          $ok_fiber_warp_cotton1 = "";
                          $ok_fiber_warp_cotton2 = "";
                          if($fiber_warp_cotton_cond1 == 1)
                          {
                            if ( !($fiber_warp_cotton_value1 < $row['fiber_warp_cotton']) )
                            {
                              $problem_fiber_warp_cotton1 = "problem";
                            }
                            else
                            {
                              $ok_fiber_warp_cotton1 = "ok";
                            }
                          }
                          else
                          {
                            if ( !($fiber_warp_cotton_value1 <=  $row['fiber_warp_cotton']) )
                            {
                              $problem_fiber_warp_cotton1 = "problem";
                            }
                            else
                            {
                              $ok_fiber_warp_cotton1 = "ok";
                            }
                          }

                          if($fiber_warp_cotton_cond2 == 1)
                          {
                            if ( !($fiber_warp_cotton_value2 > $row['fiber_warp_cotton']) )
                            {
                              $problem_fiber_warp_cotton2 = "problem";
                            }
                            else
                            {
                              $ok_fiber_warp_cotton2 = "ok";
                            }
                          }

                          else 
                          {
                            if ( !($fiber_warp_cotton_value2 >= $row['fiber_warp_cotton']) )
                            {
                              $problem_fiber_warp_cotton2 = "problem";
                            }
                            else
                            {
                              $ok_fiber_warp_cotton2 = "ok";
                            }
                          }

                          if (($problem_fiber_warp_cotton1 == "problem") && ($problem_fiber_warp_cotton2 == "problem")) 
                          {
                            ?>
                            <td bgcolor="#FF0000" ><?php echo $row['fiber_warp_cotton'] ?></td>
                            <?php
                          }

                          else if ( ($ok_fiber_warp_cotton1 == "ok") && ($ok_fiber_warp_cotton2 == "ok") )
                          {
                            ?>
                              <td bgcolor="#00FF00"><?php echo $row['fiber_warp_cotton'] ?></td> 
                            <?php
                          }

                          else
                          {
                            ?>
                              <td bgcolor="#FF0000" ><?php echo $row['fiber_warp_cotton'] ?></td> 
                            <?php
                          }
                        ?>


                        <!-- fiber warp thired condition -->
                        <?php
                          $problem_fiber_warp_thired1 = "";
                          $problem_fiber_warp_thired2 = "";
                          $ok_fiber_warp_thired1 = "";
                          $ok_fiber_warp_thired2 = "";
                          if($fiber_warp_thired_cond1 == 1)
                          {
                            if ( !($fiber_warp_thired_value1 < $row['fiber_warp_thired']) )
                            {
                              $problem_fiber_warp_thired1 = "problem";
                            }
                            else
                            {
                              $ok_fiber_warp_thired1 = "ok";
                            }
                          }
                          else
                          {
                            if ( !($fiber_warp_thired_value1 <=  $row['fiber_warp_thired']) )
                            {
                              $problem_fiber_warp_thired1 = "problem";
                            }
                            else
                            {
                              $ok_fiber_warp_thired1 = "ok";
                            }
                          }

                          if($fiber_warp_thired_cond2 == 1)
                          {
                            if ( !($fiber_warp_thired_value2 > $row['fiber_warp_thired']) )
                            {
                              $problem_fiber_warp_thired2 = "problem";
                            }
                            else
                            {
                              $ok_fiber_warp_thired2 = "ok";
                            }
                          }

                          else 
                          {
                            if ( !($fiber_warp_thired_value2 >= $row['fiber_warp_thired']) )
                            {
                              $problem_fiber_warp_thired2 = "problem";
                            }
                            else
                            {
                              $ok_fiber_warp_thired2 = "ok";
                            }
                          }

                          if (($problem_fiber_warp_thired1 == "problem") && ($problem_fiber_warp_thired2 == "problem")) 
                          {
                            ?>
                            <td bgcolor="#FF0000" ><?php echo $row['fiber_warp_thired'] ?></td>
                            <?php
                          }

                          else if ( ($ok_fiber_warp_thired1 == "ok") && ($ok_fiber_warp_thired2 == "ok") )
                          {
                            ?>
                              <td bgcolor="#00FF00"><?php echo $row['fiber_warp_thired'] ?></td> 
                            <?php
                          }

                          else
                          {
                            ?>
                              <td bgcolor="#FF0000" ><?php echo $row['fiber_warp_thired'] ?></td> 
                            <?php
                          }
                        ?>

                        <!-- fiber warp fourth condition -->
                        <?php
                          $problem_fiber_warp_fourth1 = "";
                          $problem_fiber_warp_fourth2 = "";
                          $ok_fiber_warp_fourth1 = "";
                          $ok_fiber_warp_fourth2 = "";
                          if($fiber_warp_fourth_cond1 == 1)
                          {
                            if ( !($fiber_warp_fourth_value1 < $row['fiber_warp_fourth']) )
                            {
                              $problem_fiber_warp_fourth1 = "problem";
                            }
                            else
                            {
                              $ok_fiber_warp_fourth1 = "ok";
                            }
                          }
                          else
                          {
                            if ( !($fiber_warp_fourth_value1 <=  $row['fiber_warp_fourth']) )
                            {
                              $problem_fiber_warp_fourth1 = "problem";
                            }
                            else
                            {
                              $ok_fiber_warp_fourth1 = "ok";
                            }
                          }

                          if($fiber_warp_fourth_cond2 == 1)
                          {
                            if ( !($fiber_warp_fourth_value2 > $row['fiber_warp_fourth']) )
                            {
                              $problem_fiber_warp_fourth2 = "problem";
                            }
                            else
                            {
                              $ok_fiber_warp_fourth2 = "ok";
                            }
                          }

                          else 
                          {
                            if ( !($fiber_warp_fourth_value2 >= $row['fiber_warp_fourth']) )
                            {
                              $problem_fiber_warp_fourth2 = "problem";
                            }
                            else
                            {
                              $ok_fiber_warp_fourth2 = "ok";
                            }
                          }

                          if (($problem_fiber_warp_fourth1 == "problem") && ($problem_fiber_warp_fourth2 == "problem")) 
                          {
                            ?>
                            <td bgcolor="#FF0000" ><?php echo $row['fiber_warp_fourth'] ?></td>
                            <?php
                          }

                          else if ( ($ok_fiber_warp_fourth1 == "ok") && ($ok_fiber_warp_fourth2 == "ok") )
                          {
                            ?>
                              <td bgcolor="#00FF00"><?php echo $row['fiber_warp_fourth'] ?></td> 
                            <?php
                          }

                          else
                          {
                            ?>
                              <td bgcolor="#FF0000" ><?php echo $row['fiber_warp_fourth'] ?></td> 
                            <?php
                          }
                        ?>

                        <!-- start fiber weft --> 

                        <!-- fiber weft polyester condition -->
                        <?php
                          $problem_fiber_weft_polyester1 = "";
                          $problem_fiber_weft_polyester2 = "";
                          $ok_fiber_weft_polyester1 = "";
                          $ok_fiber_weft_polyester2 = "";
                          if($fiber_weft_polyester_cond1 == 1)
                          {
                            if ( !($fiber_weft_polyester_value1 < $row['fiber_weft_polyester']) )
                            {
                              $problem_fiber_weft_polyester1 = "problem";
                            }
                            else
                            {
                              $ok_fiber_weft_polyester1 = "ok";
                            }
                          }
                          else
                          {
                            if ( !($fiber_weft_polyester_value1 <=  $row['fiber_weft_polyester']) )
                            {
                              $problem_fiber_weft_polyester1 = "problem";
                            }
                            else
                            {
                              $ok_fiber_weft_polyester1 = "ok";
                            }
                          }

                          if($fiber_weft_polyester_cond2 == 1)
                          {
                            if ( !($fiber_weft_polyester_value2 > $row['fiber_weft_polyester']) )
                            {
                              $problem_fiber_weft_polyester2 = "problem";
                            }
                            else
                            {
                              $ok_fiber_weft_polyester2 = "ok";
                            }
                          }

                          else 
                          {
                            if ( !($fiber_weft_polyester_value2 >= $row['fiber_weft_polyester']) )
                            {
                              $problem_fiber_weft_polyester2 = "problem";
                            }
                            else
                            {
                              $ok_fiber_weft_polyester2 = "ok";
                            }
                          }

                          if (($problem_fiber_weft_polyester1 == "problem") && ($problem_fiber_weft_polyester2 == "problem")) 
                          {
                            ?>
                            <td bgcolor="#FF0000" ><?php echo $row['fiber_weft_polyester'] ?></td>
                            <?php
                          }

                          else if ( ($ok_fiber_weft_polyester1 == "ok") && ($ok_fiber_weft_polyester2 == "ok") )
                          {
                            ?>
                              <td bgcolor="#00FF00"><?php echo $row['fiber_weft_polyester'] ?></td> 
                            <?php
                          }

                          else
                          {
                            ?>
                              <td bgcolor="#FF0000" ><?php echo $row['fiber_weft_polyester'] ?></td> 
                            <?php
                          }
                        ?>

                        <!-- fiber weft cotton condition -->
                        <?php
                          $problem_fiber_weft_cotton1 = "";
                          $problem_fiber_weft_cotton2 = "";
                          $ok_fiber_weft_cotton1 = "";
                          $ok_fiber_weft_cotton2 = "";
                          if($fiber_weft_cotton_cond1 == 1)
                          {
                            if ( !($fiber_weft_cotton_value1 < $row['fiber_weft_cotton']) )
                            {
                              $problem_fiber_weft_cotton1 = "problem";
                            }
                            else
                            {
                              $ok_fiber_weft_cotton1 = "ok";
                            }
                          }
                          else
                          {
                            if ( !($fiber_weft_cotton_value1 <=  $row['fiber_weft_cotton']) )
                            {
                              $problem_fiber_weft_cotton1 = "problem";
                            }
                            else
                            {
                              $ok_fiber_weft_cotton1 = "ok";
                            }
                          }

                          if($fiber_weft_cotton_cond2 == 1)
                          {
                            if ( !($fiber_weft_cotton_value2 > $row['fiber_weft_cotton']) )
                            {
                              $problem_fiber_weft_cotton2 = "problem";
                            }
                            else
                            {
                              $ok_fiber_weft_cotton2 = "ok";
                            }
                          }

                          else 
                          {
                            if ( !($fiber_weft_cotton_value2 >= $row['fiber_weft_cotton']) )
                            {
                              $problem_fiber_weft_cotton2 = "problem";
                            }
                            else
                            {
                              $ok_fiber_weft_cotton2 = "ok";
                            }
                          }

                          if (($problem_fiber_weft_cotton1 == "problem") && ($problem_fiber_weft_cotton2 == "problem")) 
                          {
                            ?>
                            <td bgcolor="#FF0000" ><?php echo $row['fiber_weft_cotton'] ?></td>
                            <?php
                          }

                          else if ( ($ok_fiber_weft_cotton1 == "ok") && ($ok_fiber_weft_cotton2 == "ok") )
                          {
                            ?>
                              <td bgcolor="#00FF00"><?php echo $row['fiber_weft_cotton'] ?></td> 
                            <?php
                          }

                          else
                          {
                            ?>
                              <td bgcolor="#FF0000" ><?php echo $row['fiber_weft_cotton'] ?></td> 
                            <?php
                          }
                        ?>


                        <!-- fiber weft thired condition -->
                        <?php
                          $problem_fiber_weft_thired1 = "";
                          $problem_fiber_weft_thired2 = "";
                          $ok_fiber_weft_thired1 = "";
                          $ok_fiber_weft_thired2 = "";
                          if($fiber_weft_thired_cond1 == 1)
                          {
                            if ( !($fiber_weft_thired_value1 < $row['fiber_weft_thired']) )
                            {
                              $problem_fiber_weft_thired1 = "problem";
                            }
                            else
                            {
                              $ok_fiber_weft_thired1 = "ok";
                            }
                          }
                          else
                          {
                            if ( !($fiber_weft_thired_value1 <=  $row['fiber_weft_thired']) )
                            {
                              $problem_fiber_weft_thired1 = "problem";
                            }
                            else
                            {
                              $ok_fiber_weft_thired1 = "ok";
                            }
                          }

                          if($fiber_weft_thired_cond2 == 1)
                          {
                            if ( !($fiber_weft_thired_value2 > $row['fiber_weft_thired']) )
                            {
                              $problem_fiber_weft_thired2 = "problem";
                            }
                            else
                            {
                              $ok_fiber_weft_thired2 = "ok";
                            }
                          }

                          else 
                          {
                            if ( !($fiber_weft_thired_value2 >= $row['fiber_weft_thired']) )
                            {
                              $problem_fiber_weft_thired2 = "problem";
                            }
                            else
                            {
                              $ok_fiber_weft_thired2 = "ok";
                            }
                          }

                          if (($problem_fiber_weft_thired1 == "problem") && ($problem_fiber_weft_thired2 == "problem")) 
                          {
                            ?>
                            <td bgcolor="#FF0000" ><?php echo $row['fiber_weft_thired'] ?></td>
                            <?php
                          }

                          else if ( ($ok_fiber_weft_thired1 == "ok") && ($ok_fiber_weft_thired2 == "ok") )
                          {
                            ?>
                              <td bgcolor="#00FF00"><?php echo $row['fiber_weft_thired'] ?></td> 
                            <?php
                          }

                          else
                          {
                            ?>
                              <td bgcolor="#FF0000" ><?php echo $row['fiber_weft_thired'] ?></td> 
                            <?php
                          }
                        ?>

                        <!-- fiber weft fourth condition -->
                        <?php
                          $problem_fiber_weft_fourth1 = "";
                          $problem_fiber_weft_fourth2 = "";
                          $ok_fiber_weft_fourth1 = "";
                          $ok_fiber_weft_fourth2 = "";
                          if($fiber_weft_fourth_cond1 == 1)
                          {
                            if ( !($fiber_weft_fourth_value1 < $row['fiber_weft_fourth']) )
                            {
                              $problem_fiber_weft_fourth1 = "problem";
                            }
                            else
                            {
                              $ok_fiber_weft_fourth1 = "ok";
                            }
                          }
                          else
                          {
                            if ( !($fiber_weft_fourth_value1 <=  $row['fiber_weft_fourth']) )
                            {
                              $problem_fiber_weft_fourth1 = "problem";
                            }
                            else
                            {
                              $ok_fiber_weft_fourth1 = "ok";
                            }
                          }

                          if($fiber_weft_fourth_cond2 == 1)
                          {
                            if ( !($fiber_weft_fourth_value2 > $row['fiber_weft_fourth']) )
                            {
                              $problem_fiber_weft_fourth2 = "problem";
                            }
                            else
                            {
                              $ok_fiber_weft_fourth2 = "ok";
                            }
                          }

                          else 
                          {
                            if ( !($fiber_weft_fourth_value2 >= $row['fiber_weft_fourth']) )
                            {
                              $problem_fiber_weft_fourth2 = "problem";
                            }
                            else
                            {
                              $ok_fiber_weft_fourth2 = "ok";
                            }
                          }

                          if (($problem_fiber_weft_fourth1 == "problem") && ($problem_fiber_weft_fourth2 == "problem")) 
                          {
                            ?>
                            <td bgcolor="#FF0000" ><?php echo $row['fiber_weft_fourth'] ?></td>
                            <?php
                          }

                          else if ( ($ok_fiber_weft_fourth1 == "ok") && ($ok_fiber_weft_fourth2 == "ok") )
                          {
                            ?>
                              <td bgcolor="#00FF00"><?php echo $row['fiber_weft_fourth'] ?></td> 
                            <?php
                          }

                          else
                          {
                            ?>
                              <td bgcolor="#FF0000" ><?php echo $row['fiber_weft_fourth'] ?></td> 
                            <?php
                          }
                        ?>

                        <td>
                          <!-- <form action="edit_greige_issunce.php" method="post" style="display: inline;"> -->
                            <input type="hidden" id="pp_no_id" name="pp_no_id" value="<?php echo $pp_no_id; ?>">
                            <input type="hidden" id="pp_details_id" name="pp_details_id" value="<?php echo $pp_details_id; ?>">
                            <input type="hidden" id="greige_issunce_id" name="greige_issunce_id" value="<?php echo $row['greige_issunce_id']; ?>">
                            <button type="submit" id="gray_issue_add_btn" value="<?php echo ($s1-1); ?>" name="gray_issue_add_btn" onclick="greige_issunce_edit_form(this.value);" class="btn btn-primary btn-xs"> Edit </button>
                          <!-- </form> -->
                        </td>
                      </tr>
                  <?php
              }
          ?>

          <?php 
            ++$s1;
           }
          ?>
        </tbody> 
      </table>
    </div>
  </div>

 <!--  </div>
</div> -->
<!-- main content again finished -->

<?php  ?>
                        

        