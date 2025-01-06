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

                FROM pp

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
      <h2>All Greige Issuance List</h2>
      <ul class="nav navbar-right panel_toolbox">
        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
        </li>
      </ul>
      <div class="clearfix"></div>
    </div>

    <?php 
      $sql_for_gray_variable = "SELECT gray_variable.*

                          FROM gray_variable

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

      $fiber_warp_cond1 = $row_gray_variable['fiber_warp_cond1'];
      $fiber_warp_value1 = $row_gray_variable['fiber_warp_value1'];
      $fiber_warp_value2 = $row_gray_variable['fiber_warp_value2'];
      $fiber_warp_cond2 = $row_gray_variable['fiber_warp_cond2'];

      $fiber_weft_cond1 = $row_gray_variable['fiber_weft_cond1'];
      $fiber_weft_value1 = $row_gray_variable['fiber_weft_value1'];
      $fiber_weft_value2 = $row_gray_variable['fiber_weft_value2'];
      $fiber_weft_cond2 = $row_gray_variable['fiber_weft_cond2'];
    ?>

    <div class="x_content">
      <table id="datatable-buttons" class="table table-striped table-bordered">
        <thead>
          <tr>
            <th>SI</th>
            <th>Receive Quantity</th>
            <th>Yarn Warp</th>
            <th>Yarn Weft</th>
            <th>Thread EPI</th>
            <th>Thread PPI</th>
            <th>GSM</th>
            <th>Fiber Warp</th>
            <th>Fiber Weft</th>
            <th>Width</th>
            <th>Composition</th>
            <th>Action</th>
          </tr>
        </thead>
        
        <tbody>
          <?php 
            $s1 = 1;
            $sql_for_pp = "SELECT greige_issunce.*

                           FROM greige_issunce

                           WHERE greige_issunce.pp_no_id = '$pp_no_id'
                           AND greige_issunce.pp_details_id = '$pp_details_id'
                           AND greige_issunce.status = '1'
                           AND greige_issunce.active = '1'
                           ";



            $res_for_pp = mysqli_query($con, $sql_for_pp);

            while ($row = mysqli_fetch_assoc($res_for_pp)) 
            {
          ?>
          <tr>
            <td><?php echo $s1; ?></td>
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
                <td bgcolor="#FF0000" ><?php echo $row['fiber_warp'] ?></td>
                <?php
              }

              else if ( ($ok_fiber_warp1 == "ok") && ($ok_fiber_warp2 == "ok") )
              {
                ?>
                  <td bgcolor="#00FF00"><?php echo $row['fiber_warp'] ?></td>
                <?php
              }

              else
              {
                ?>
                  <td bgcolor="#FF0000" ><?php echo $row['fiber_warp'] ?></td>
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
                <td bgcolor="#FF0000" ><?php echo $row['fiber_weft'] ?></td>
                <?php
              }

              else if ( ($ok_fiber_weft1 == "ok") && ($ok_fiber_weft2 == "ok") )
              {
                ?>
                  <td bgcolor="#00FF00" ><?php echo $row['fiber_weft'] ?></td>
                <?php
              }

              else
              {
                ?>
                  <td bgcolor="#FF0000" ><?php echo $row['fiber_weft'] ?></td>
                <?php
              }
            ?>
            
            <td><?php echo $row['width'] ?></td>
            <td><?php echo $row['composition'] ?></td>
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
                        

        