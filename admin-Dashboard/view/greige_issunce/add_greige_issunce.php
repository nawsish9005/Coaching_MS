<?php
session_start();
require_once("../includes/db_session_chk.php");
$pp_details_id = $_POST['pp_details_id'];
$pp_no_id = $_POST['pp_no_id'];

if (($pp_details_id == '') || (empty($pp_details_id)) || is_null($pp_details_id) || ($pp_no_id == '') || (empty($pp_no_id)) || is_null($pp_no_id) ) 
{
   header("Location: gray_issue.php");
}


$sql_for_pp = "SELECT p.pp_id, 
                      p.pp_no,
                      p.issue_date,
                      p.customers,
                      p.construction,
                      p.week,
                      p.design,
                      customers.customer_id,
                      customers.customer_name,
                      details.pp_no_id,
                      details.version,
                      details.color,
                      c.color_id,
                      c.color_name,
                      details.gray_width,
                      details.finish_width,
                      details.quantity,
                      gv.*

               FROM process_program_info AS p, version_wise_process_program_info AS details, customer AS customers, color AS c, defining_gray_receiving_qc_standard as gv 

               WHERE p.pp_id = '$pp_no_id'
               AND details.pp_id = '$pp_details_id'
               AND details.pp_no_id = '$pp_no_id'
               AND details.active = '1'
               AND p.pp_id = details.pp_no_id
               AND p.customers = customers.customer_id
               AND details.color = c.color_id
               AND gv.pp_no_id = p.pp_id
               AND gv.pp_details_id = details.pp_id
               AND gv.active = '1' ";

$res_for_pp = mysqli_query($con, $sql_for_pp);

$row = mysqli_fetch_array($res_for_pp)
?>
<!-- main content again -->
<!-- <div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12" id="greige_issunce_add_data" style="padding-bottom: 20px;"> -->
  
  <div class="x_panel">
    <div class="x_title">
      <h2>Greige Receive Add Form</h2>
      <ul class="nav navbar-right panel_toolbox">
        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
        </li>
      </ul>
      <div class="clearfix"></div>
    </div>
    <div class="x_content">
      <br />

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


      <form id="gray_issue_form" name="gray_issue_form" data-parsley-validate class="form-horizontal form-label-left">

        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="pp">Greige Receive Date <span class="required">*</span>
          </label>
          <div class="col-md-6 col-sm-6 col-xs-6">
            <div class='input-group date' id='datepicker_for_add' onclick="datetimePicker();">
              <input type='text' class="custom_date form-control" id="custom_date" name="custom_date"/>
              <span class="input-group-addon">
                 <span class="glyphicon glyphicon-calendar"></span>
              </span>
            </div>
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="received_quantity">Received Quantity <span class="required">*</span>
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" id="received_quantity" name="received_quantity" class="received_quantity form-control col-md-7 col-xs-12">
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="yarn_count_warp">Yarn Count Warp<span class="required">*</span>
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" id="yarn_count_warp" name="yarn_count_warp" autocomplete="off"
              placeholder="
                <?php 
                if ($row['yarn_warp_cond1'] == 1) 
                {
                  $first_condition = "(";
                }
                elseif ($row['yarn_warp_cond1'] == 2) 
                {
                  $first_condition = "[";
                }
                else
                {
                  $first_condition = "]";
                }


                if ($row['yarn_warp_cond2'] == 1) 
                {
                  $second_condition = ")";
                }
                elseif ($row['yarn_warp_cond2'] == 2) 
                {
                  $second_condition = "]";
                }
                else
                {
                  $second_condition = "[";
                }

                echo "Yarn Warp. Result between ". $first_condition . " " . $row['yarn_warp_value1'] . " - " . $row['yarn_warp_value2'] . " " . $second_condition;
                ?>
              " 
              class="yarn_count_warp form-control col-md-7 col-xs-12" onkeyup="yarnWarpCheck()">
              <input type="hidden" id="yarn_warp_cond1" name="yarn_warp_cond1" value="<?php echo $first_condition; ?>">
              <input type="hidden" id="yarn_warp_value1" name="yarn_warp_value1" value="<?php echo $row['yarn_warp_value1']; ?>">
              <input type="hidden" id="yarn_warp_value2" name="yarn_warp_value2" value="<?php echo $row['yarn_warp_value2']; ?>">
              <input type="hidden" id="yarn_warp_cond2" name="yarn_warp_cond2" value="<?php echo $second_condition; ?>">
          </div>
        </div>


        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="yarn_count_weft">Yarn Count Weft<span class="required">*</span>
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" id="yarn_count_weft" name="yarn_count_weft" autocomplete="off"
              placeholder="
                <?php 
                if ($row['yarn_weft_cond1'] == 1) 
                {
                  $first_condition = "(";
                }
                elseif ($row['yarn_weft_cond1'] == 2) 
                {
                  $first_condition = "[";
                }
                else
                {
                  $first_condition = "]";
                }


                if ($row['yarn_weft_cond2'] == 1) 
                {
                  $second_condition = ")";
                }
                elseif ($row['yarn_weft_cond2'] == 2) 
                {
                  $second_condition = "]";
                }
                else
                {
                  $second_condition = "[";
                }

                echo "Yarn Weft. Result between ". $first_condition . " " . $row['yarn_weft_value1'] . " - " . $row['yarn_weft_value2'] . " " . $second_condition;
                ?>
              " 
              class="yarn_count_weft form-control col-md-7 col-xs-12" onkeyup="yarnWeftCheck()">
              <input type="hidden" id="yarn_weft_cond1" name="yarn_weft_cond1" value="<?php echo $first_condition; ?>">
              <input type="hidden" id="yarn_weft_value1" name="yarn_weft_value1" value="<?php echo $row['yarn_weft_value1']; ?>">
              <input type="hidden" id="yarn_weft_value2" name="yarn_weft_value2" value="<?php echo $row['yarn_weft_value2']; ?>">
              <input type="hidden" id="yarn_weft_cond2" name="yarn_weft_cond2" value="<?php echo $second_condition; ?>">
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="thread_epi">Thread Count EPI<span class="required">*</span>
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" id="thread_epi" name="thread_epi" autocomplete="off"
              placeholder="
                <?php 
                if ($row['thread_epi_cond1'] == 1) 
                {
                  $first_condition = "(";
                }
                elseif ($row['thread_epi_cond1'] == 2) 
                {
                  $first_condition = "[";
                }
                else
                {
                  $first_condition = "]";
                }


                if ($row['thread_epi_cond2'] == 1) 
                {
                  $second_condition = ")";
                }
                elseif ($row['thread_epi_cond2'] == 2) 
                {
                  $second_condition = "]";
                }
                else
                {
                  $second_condition = "[";
                }

                echo "Thread EPI Result between ". $first_condition . " " . $row['thread_epi_value1'] . " - " . $row['thread_epi_value2'] . " " . $second_condition;
                ?>
              " 
              class="thread_epi form-control col-md-7 col-xs-12" onkeyup="threadEpiCheck()">
              <input type="hidden" id="thread_epi_cond1" name="thread_epi_cond1" value="<?php echo $first_condition; ?>">
              <input type="hidden" id="thread_epi_value1" name="thread_epi_value1" value="<?php echo $row['thread_epi_value1']; ?>">
              <input type="hidden" id="thread_epi_value2" name="thread_epi_value2" value="<?php echo $row['thread_epi_value2']; ?>">
              <input type="hidden" id="thread_epi_cond2" name="thread_epi_cond2" value="<?php echo $second_condition; ?>">
          </div>
        </div>


        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="thread_ppi">Thread Count PPI<span class="required">*</span>
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" id="thread_ppi" name="thread_ppi" autocomplete="off"
              placeholder="
                <?php 
                if ($row['thread_ppi_cond1'] == 1) 
                {
                  $first_condition = "(";
                }
                elseif ($row['thread_ppi_cond1'] == 2) 
                {
                  $first_condition = "[";
                }
                else
                {
                  $first_condition = "]";
                }


                if ($row['thread_ppi_cond2'] == 1) 
                {
                  $second_condition = ")";
                }
                elseif ($row['thread_ppi_cond2'] == 2) 
                {
                  $second_condition = "]";
                }
                else
                {
                  $second_condition = "[";
                }

                echo "Thread PPI Result between ". $first_condition . " " . $row['thread_ppi_value1'] . " - " . $row['thread_ppi_value2'] . " " . $second_condition;
                ?>
              " 
              class="thread_ppi form-control col-md-7 col-xs-12" onkeyup="threadPpiCheck()">
              <input type="hidden" id="thread_ppi_cond1" name="thread_ppi_cond1" value="<?php echo $first_condition; ?>">
              <input type="hidden" id="thread_ppi_value1" name="thread_ppi_value1" value="<?php echo $row['thread_ppi_value1']; ?>">
              <input type="hidden" id="thread_ppi_value2" name="thread_ppi_value2" value="<?php echo $row['thread_ppi_value2']; ?>">
              <input type="hidden" id="thread_ppi_cond2" name="thread_ppi_cond2" value="<?php echo $second_condition; ?>">
          </div>
        </div>


        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="gsm_count_warp">GSM<span class="required">*</span>
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" id="gsm_count_warp" name="gsm_count_warp" autocomplete="off"
              placeholder="
                <?php 
                if ($row['gsm_warp_cond1'] == 1) 
                {
                  $first_condition = "(";
                }
                elseif ($row['gsm_warp_cond1'] == 2) 
                {
                  $first_condition = "[";
                }
                else
                {
                  $first_condition = "]";
                }


                if ($row['gsm_warp_cond2'] == 1) 
                {
                  $second_condition = ")";
                }
                elseif ($row['gsm_warp_cond2'] == 2) 
                {
                  $second_condition = "]";
                }
                else
                {
                  $second_condition = "[";
                }

                echo "GSM Result between ". $first_condition . " " . $row['gsm_warp_value1'] . " - " . $row['gsm_warp_value2'] . " " . $second_condition;
                ?>
              " 
              class="gsm_count_warp form-control col-md-7 col-xs-12" onkeyup="gsmCheck()">
              <input type="hidden" id="gsm_warp_cond1" name="gsm_warp_cond1" value="<?php echo $first_condition; ?>">
              <input type="hidden" id="gsm_warp_value1" name="gsm_warp_value1" value="<?php echo $row['gsm_warp_value1']; ?>">
              <input type="hidden" id="gsm_warp_value2" name="gsm_warp_value2" value="<?php echo $row['gsm_warp_value2']; ?>">
              <input type="hidden" id="gsm_warp_cond2" name="gsm_warp_cond2" value="<?php echo $second_condition; ?>">
          </div>
        </div>

        <br>

        <?php
              if ($row['fiber_total_polyester_value1'] != 0)
              {
                  ?>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fiber_total_polyester">Fiber Content total for Polyester <span class="required">*</span>
                      </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="fiber_total_polyester" name="fiber_total_polyester" autocomplete="off"
                            placeholder="
                              <?php 
                              if ($row['fiber_total_polyester_cond1'] == 1) 
                              {
                                $first_condition = "(";
                              }
                              elseif ($row['fiber_total_polyester_cond1'] == 2) 
                              {
                                $first_condition = "[";
                              }
                              else
                              {
                                $first_condition = "]";
                              }


                              if ($row['fiber_total_polyester_cond2'] == 1) 
                              {
                                $second_condition = ")";
                              }
                              elseif ($row['fiber_total_polyester_cond2'] == 2) 
                              {
                                $second_condition = "]";
                              }
                              else
                              {
                                $second_condition = "[";
                              }

                              echo "Fiber Content total. Polyester Result between ". $first_condition . " " . $row['fiber_total_polyester_value1'] . " - " . $row['fiber_total_polyester_value2'] . " " . $second_condition;
                              ?>
                            " 
                            class="fiber_total_polyester form-control col-md-7 col-xs-12" onkeyup="fiberTotalPolyesterCheck()">
                            <input type="hidden" id="fiber_total_name_polyester" name="fiber_total_name_polyester" value="polyester">
                            <input type="hidden" id="fiber_total_polyester_cond1" name="fiber_total_polyester_cond1" value="<?php echo $first_condition; ?>">
                            <input type="hidden" id="fiber_total_polyester_value1" name="fiber_total_polyester_value1" value="<?php echo $row['fiber_total_polyester_value1']; ?>">
                            <input type="hidden" id="fiber_total_polyester_value2" name="fiber_total_polyester_value2" value="<?php echo $row['fiber_total_polyester_value2']; ?>">
                            <input type="hidden" id="fiber_total_polyester_cond2" name="fiber_total_polyester_cond2" value="<?php echo $second_condition; ?>">
                        </div>
                    </div>
                  <?php
              }
        ?>

        <?php 
              if ($row['fiber_total_cotton_value1'] != 0)
              {
                  ?>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fiber_total_cotton"> Cotton <span class="required">*</span>
                      </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="fiber_total_cotton" name="fiber_total_cotton" autocomplete="off"
                            placeholder="
                              <?php 
                              if ($row['fiber_total_cotton_cond1'] == 1) 
                              {
                                $first_condition = "(";
                              }
                              elseif ($row['fiber_total_cotton_cond1'] == 2) 
                              {
                                $first_condition = "[";
                              }
                              else
                              {
                                $first_condition = "]";
                              }


                              if ($row['fiber_total_cotton_cond2'] == 1) 
                              {
                                $second_condition = ")";
                              }
                              elseif ($row['fiber_total_cotton_cond2'] == 2) 
                              {
                                $second_condition = "]";
                              }
                              else
                              {
                                $second_condition = "[";
                              }

                              echo "Fiber Content total. Cotton Result between ". $first_condition . " " . $row['fiber_total_cotton_value1'] . " - " . $row['fiber_total_cotton_value2'] . " " . $second_condition;
                              ?>
                            " 
                            class="fiber_total_cotton form-control col-md-7 col-xs-12" onkeyup="fiberTotalCottonCheck()">
                            <input type="hidden" id="fiber_total_name_cotton" name="fiber_total_name_cotton" value="cotton">
                            <input type="hidden" id="fiber_total_cotton_cond1" name="fiber_total_cotton_cond1" value="<?php echo $first_condition; ?>">
                            <input type="hidden" id="fiber_total_cotton_value1" name="fiber_total_cotton_value1" value="<?php echo $row['fiber_total_cotton_value1']; ?>">
                            <input type="hidden" id="fiber_total_cotton_value2" name="fiber_total_cotton_value2" value="<?php echo $row['fiber_total_cotton_value2']; ?>">
                            <input type="hidden" id="fiber_total_cotton_cond2" name="fiber_total_cotton_cond2" value="<?php echo $second_condition; ?>">
                        </div>
                    </div>
                  <?php
              }
          ?>

        <?php 
            if ($row['fiber_total_thired_value1'] != 0)
            {
                ?>
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fiber_total_thired"> <?php echo $row['fiber_total_name_thired'] ?> <span class="required">*</span>
                    </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="fiber_total_thired" name="fiber_total_thired" autocomplete="off"
                          placeholder="
                            <?php 
                            if ($row['fiber_total_thired_cond1'] == 1) 
                            {
                              $first_condition = "(";
                            }
                            elseif ($row['fiber_total_thired_cond1'] == 2) 
                            {
                              $first_condition = "[";
                            }
                            else
                            {
                              $first_condition = "]";
                            }


                            if ($row['fiber_total_thired_cond2'] == 1) 
                            {
                              $second_condition = ")";
                            }
                            elseif ($row['fiber_total_thired_cond2'] == 2) 
                            {
                              $second_condition = "]";
                            }
                            else
                            {
                              $second_condition = "[";
                            }

                            echo "Fiber Content total. thired Result between ". $first_condition . " " . $row['fiber_total_thired_value1'] . " - " . $row['fiber_total_thired_value2'] . " " . $second_condition;
                            ?>
                          " 
                          class="fiber_total_thired form-control col-md-7 col-xs-12" onkeyup="fiberTotalThiredCheck()">
                          <input type="hidden" id="fiber_total_name_thired" name="fiber_total_name_thired" value="<?php echo $row['fiber_total_name_thired'] ?>">
                          <input type="hidden" id="fiber_total_thired_cond1" name="fiber_total_thired_cond1" value="<?php echo $first_condition; ?>">
                          <input type="hidden" id="fiber_total_thired_value1" name="fiber_total_thired_value1" value="<?php echo $row['fiber_total_thired_value1']; ?>">
                          <input type="hidden" id="fiber_total_thired_value2" name="fiber_total_thired_value2" value="<?php echo $row['fiber_total_thired_value2']; ?>">
                          <input type="hidden" id="fiber_total_thired_cond2" name="fiber_total_thired_cond2" value="<?php echo $second_condition; ?>">
                      </div>
                  </div>
                <?php
            }
        ?>

        <?php 
            if ($row['fiber_total_fourth_value1'] != 0)
            {
                ?>
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fiber_total_fourth"> <?php echo $row['fiber_total_name_fourth'] ?> <span class="required">*</span>
                    </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="fiber_total_fourth" name="fiber_total_fourth" autocomplete="off"
                          placeholder="
                            <?php 
                            if ($row['fiber_total_fourth_cond1'] == 1) 
                            {
                              $first_condition = "(";
                            }
                            elseif ($row['fiber_total_fourth_cond1'] == 2) 
                            {
                              $first_condition = "[";
                            }
                            else
                            {
                              $first_condition = "]";
                            }


                            if ($row['fiber_total_fourth_cond2'] == 1) 
                            {
                              $second_condition = ")";
                            }
                            elseif ($row['fiber_total_fourth_cond2'] == 2) 
                            {
                              $second_condition = "]";
                            }
                            else
                            {
                              $second_condition = "[";
                            }

                            echo "Fiber Content total. fourth Result between ". $first_condition . " " . $row['fiber_total_fourth_value1'] . " - " . $row['fiber_total_fourth_value2'] . " " . $second_condition;
                            ?>
                          " 
                          class="fiber_total_fourth form-control col-md-7 col-xs-12" onkeyup="fiberTotalFourthCheck()">
                          <input type="hidden" id="fiber_total_name_fourth" name="fiber_total_name_fourth" value="<?php echo $row['fiber_total_name_fourth'] ?>">
                          <input type="hidden" id="fiber_total_fourth_cond1" name="fiber_total_fourth_cond1" value="<?php echo $first_condition; ?>">
                          <input type="hidden" id="fiber_total_fourth_value1" name="fiber_total_fourth_value1" value="<?php echo $row['fiber_total_fourth_value1']; ?>">
                          <input type="hidden" id="fiber_total_fourth_value2" name="fiber_total_fourth_value2" value="<?php echo $row['fiber_total_fourth_value2']; ?>">
                          <input type="hidden" id="fiber_total_fourth_cond2" name="fiber_total_fourth_cond2" value="<?php echo $second_condition; ?>">
                      </div>
                  </div>
                <?php
            }
        ?>

        <br>
        
        <?php
              if ($row['fiber_warp_polyester_value1'] != 0)
              {
                  ?>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fiber_warp_polyester">Fiber Content Warp for Polyester <span class="required">*</span>
                      </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="fiber_warp_polyester" name="fiber_warp_polyester" autocomplete="off"
                            placeholder="
                              <?php 
                              if ($row['fiber_warp_polyester_cond1'] == 1) 
                              {
                                $first_condition = "(";
                              }
                              elseif ($row['fiber_warp_polyester_cond1'] == 2) 
                              {
                                $first_condition = "[";
                              }
                              else
                              {
                                $first_condition = "]";
                              }


                              if ($row['fiber_warp_polyester_cond2'] == 1) 
                              {
                                $second_condition = ")";
                              }
                              elseif ($row['fiber_warp_polyester_cond2'] == 2) 
                              {
                                $second_condition = "]";
                              }
                              else
                              {
                                $second_condition = "[";
                              }

                              echo "Fiber Content Warp. Polyester Result between ". $first_condition . " " . $row['fiber_warp_polyester_value1'] . " - " . $row['fiber_warp_polyester_value2'] . " " . $second_condition;
                              ?>
                            " 
                            class="fiber_warp_polyester form-control col-md-7 col-xs-12" onkeyup="fiberWarpPolyesterCheck()">
                            <input type="hidden" id="fiber_warp_name_polyester" name="fiber_warp_name_polyester" value="polyester">
                            <input type="hidden" id="fiber_warp_polyester_cond1" name="fiber_warp_polyester_cond1" value="<?php echo $first_condition; ?>">
                            <input type="hidden" id="fiber_warp_polyester_value1" name="fiber_warp_polyester_value1" value="<?php echo $row['fiber_warp_polyester_value1']; ?>">
                            <input type="hidden" id="fiber_warp_polyester_value2" name="fiber_warp_polyester_value2" value="<?php echo $row['fiber_warp_polyester_value2']; ?>">
                            <input type="hidden" id="fiber_warp_polyester_cond2" name="fiber_warp_polyester_cond2" value="<?php echo $second_condition; ?>">
                        </div>
                    </div>
                  <?php
              }
        ?>

        <?php 
              if ($row['fiber_warp_cotton_value1'] != 0)
              {
                  ?>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fiber_warp_cotton"> Cotton <span class="required">*</span>
                      </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="fiber_warp_cotton" name="fiber_warp_cotton" autocomplete="off"
                            placeholder="
                              <?php 
                              if ($row['fiber_warp_cotton_cond1'] == 1) 
                              {
                                $first_condition = "(";
                              }
                              elseif ($row['fiber_warp_cotton_cond1'] == 2) 
                              {
                                $first_condition = "[";
                              }
                              else
                              {
                                $first_condition = "]";
                              }


                              if ($row['fiber_warp_cotton_cond2'] == 1) 
                              {
                                $second_condition = ")";
                              }
                              elseif ($row['fiber_warp_cotton_cond2'] == 2) 
                              {
                                $second_condition = "]";
                              }
                              else
                              {
                                $second_condition = "[";
                              }

                              echo "Fiber Content Warp. Cotton Result between ". $first_condition . " " . $row['fiber_warp_cotton_value1'] . " - " . $row['fiber_warp_cotton_value2'] . " " . $second_condition;
                              ?>
                            " 
                            class="fiber_warp_cotton form-control col-md-7 col-xs-12" onkeyup="fiberWarpCottonCheck()">
                            <input type="hidden" id="fiber_warp_name_cotton" name="fiber_warp_name_cotton" value="cotton">
                            <input type="hidden" id="fiber_warp_cotton_cond1" name="fiber_warp_cotton_cond1" value="<?php echo $first_condition; ?>">
                            <input type="hidden" id="fiber_warp_cotton_value1" name="fiber_warp_cotton_value1" value="<?php echo $row['fiber_warp_cotton_value1']; ?>">
                            <input type="hidden" id="fiber_warp_cotton_value2" name="fiber_warp_cotton_value2" value="<?php echo $row['fiber_warp_cotton_value2']; ?>">
                            <input type="hidden" id="fiber_warp_cotton_cond2" name="fiber_warp_cotton_cond2" value="<?php echo $second_condition; ?>">
                        </div>
                    </div>
                  <?php
              }
          ?>

        <?php 
            if ($row['fiber_warp_thired_value1'] != 0)
            {
                ?>
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fiber_warp_thired"> <?php echo $row['fiber_warp_name_thired'] ?> <span class="required">*</span>
                    </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="fiber_warp_thired" name="fiber_warp_thired" autocomplete="off"
                          placeholder="
                            <?php 
                            if ($row['fiber_warp_thired_cond1'] == 1) 
                            {
                              $first_condition = "(";
                            }
                            elseif ($row['fiber_warp_thired_cond1'] == 2) 
                            {
                              $first_condition = "[";
                            }
                            else
                            {
                              $first_condition = "]";
                            }


                            if ($row['fiber_warp_thired_cond2'] == 1) 
                            {
                              $second_condition = ")";
                            }
                            elseif ($row['fiber_warp_thired_cond2'] == 2) 
                            {
                              $second_condition = "]";
                            }
                            else
                            {
                              $second_condition = "[";
                            }

                            echo "Fiber Content Warp. thired Result between ". $first_condition . " " . $row['fiber_warp_thired_value1'] . " - " . $row['fiber_warp_thired_value2'] . " " . $second_condition;
                            ?>
                          " 
                          class="fiber_warp_thired form-control col-md-7 col-xs-12" onkeyup="fiberWarpThiredCheck()">
                          <input type="hidden" id="fiber_warp_name_thired" name="fiber_warp_name_thired" value="<?php echo $row['fiber_warp_name_thired'] ?>">
                          <input type="hidden" id="fiber_warp_thired_cond1" name="fiber_warp_thired_cond1" value="<?php echo $first_condition; ?>">
                          <input type="hidden" id="fiber_warp_thired_value1" name="fiber_warp_thired_value1" value="<?php echo $row['fiber_warp_thired_value1']; ?>">
                          <input type="hidden" id="fiber_warp_thired_value2" name="fiber_warp_thired_value2" value="<?php echo $row['fiber_warp_thired_value2']; ?>">
                          <input type="hidden" id="fiber_warp_thired_cond2" name="fiber_warp_thired_cond2" value="<?php echo $second_condition; ?>">
                      </div>
                  </div>
                <?php
            }
        ?>

        <?php 
            if ($row['fiber_warp_fourth_value1'] != 0)
            {
                ?>
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fiber_warp_fourth"> <?php echo $row['fiber_warp_name_fourth'] ?> <span class="required">*</span>
                    </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="fiber_warp_fourth" name="fiber_warp_fourth" autocomplete="off"
                          placeholder="
                            <?php 
                            if ($row['fiber_warp_fourth_cond1'] == 1) 
                            {
                              $first_condition = "(";
                            }
                            elseif ($row['fiber_warp_fourth_cond1'] == 2) 
                            {
                              $first_condition = "[";
                            }
                            else
                            {
                              $first_condition = "]";
                            }


                            if ($row['fiber_warp_fourth_cond2'] == 1) 
                            {
                              $second_condition = ")";
                            }
                            elseif ($row['fiber_warp_fourth_cond2'] == 2) 
                            {
                              $second_condition = "]";
                            }
                            else
                            {
                              $second_condition = "[";
                            }

                            echo "Fiber Content Warp. fourth Result between ". $first_condition . " " . $row['fiber_warp_fourth_value1'] . " - " . $row['fiber_warp_fourth_value2'] . " " . $second_condition;
                            ?>
                          " 
                          class="fiber_warp_fourth form-control col-md-7 col-xs-12" onkeyup="fiberWarpFourthCheck()">
                          <input type="hidden" id="fiber_warp_name_fourth" name="fiber_warp_name_fourth" value="<?php echo $row['fiber_warp_name_fourth'] ?>">
                          <input type="hidden" id="fiber_warp_fourth_cond1" name="fiber_warp_fourth_cond1" value="<?php echo $first_condition; ?>">
                          <input type="hidden" id="fiber_warp_fourth_value1" name="fiber_warp_fourth_value1" value="<?php echo $row['fiber_warp_fourth_value1']; ?>">
                          <input type="hidden" id="fiber_warp_fourth_value2" name="fiber_warp_fourth_value2" value="<?php echo $row['fiber_warp_fourth_value2']; ?>">
                          <input type="hidden" id="fiber_warp_fourth_cond2" name="fiber_warp_fourth_cond2" value="<?php echo $second_condition; ?>">
                      </div>
                  </div>
                <?php
            }
        ?>

        <br>

        <?php
            if ($row['fiber_weft_polyester_value1'] != 0)
            {
                ?>
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fiber_weft_polyester">Fiber Content Weft for Polyester <span class="required">*</span>
                    </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="fiber_weft_polyester" name="fiber_weft_polyester" autocomplete="off"
                          placeholder="
                            <?php 
                            if ($row['fiber_weft_polyester_cond1'] == 1) 
                            {
                              $first_condition = "(";
                            }
                            elseif ($row['fiber_weft_polyester_cond1'] == 2) 
                            {
                              $first_condition = "[";
                            }
                            else
                            {
                              $first_condition = "]";
                            }


                            if ($row['fiber_weft_polyester_cond2'] == 1) 
                            {
                              $second_condition = ")";
                            }
                            elseif ($row['fiber_weft_polyester_cond2'] == 2) 
                            {
                              $second_condition = "]";
                            }
                            else
                            {
                              $second_condition = "[";
                            }

                            echo "Fiber Content weft. Polyester Result between ". $first_condition . " " . $row['fiber_weft_polyester_value1'] . " - " . $row['fiber_weft_polyester_value2'] . " " . $second_condition;
                            ?>
                          " 
                          class="fiber_weft_polyester form-control col-md-7 col-xs-12" onkeyup="fiberWeftPolyesterCheck()">
                          <input type="hidden" id="fiber_weft_name_polyester" name="fiber_weft_name_polyester" value="polyester">
                          <input type="hidden" id="fiber_weft_polyester_cond1" name="fiber_weft_polyester_cond1" value="<?php echo $first_condition; ?>">
                          <input type="hidden" id="fiber_weft_polyester_value1" name="fiber_weft_polyester_value1" value="<?php echo $row['fiber_weft_polyester_value1']; ?>">
                          <input type="hidden" id="fiber_weft_polyester_value2" name="fiber_weft_polyester_value2" value="<?php echo $row['fiber_weft_polyester_value2']; ?>">
                          <input type="hidden" id="fiber_weft_polyester_cond2" name="fiber_weft_polyester_cond2" value="<?php echo $second_condition; ?>">
                      </div>
                  </div>
                <?php
            }
        ?>

        <?php
            if ($row['fiber_weft_cotton_value1'] != 0)
            {
                ?>
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fiber_weft_cotton"> Cotton <span class="required">*</span>
                    </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="fiber_weft_cotton" name="fiber_weft_cotton" autocomplete="off"
                          placeholder="
                            <?php 
                            if ($row['fiber_weft_cotton_cond1'] == 1) 
                            {
                              $first_condition = "(";
                            }
                            elseif ($row['fiber_weft_cotton_cond1'] == 2) 
                            {
                              $first_condition = "[";
                            }
                            else
                            {
                              $first_condition = "]";
                            }


                            if ($row['fiber_weft_cotton_cond2'] == 1) 
                            {
                              $second_condition = ")";
                            }
                            elseif ($row['fiber_weft_cotton_cond2'] == 2) 
                            {
                              $second_condition = "]";
                            }
                            else
                            {
                              $second_condition = "[";
                            }

                            echo "Fiber Content weft. Cotton Result between ". $first_condition . " " . $row['fiber_weft_cotton_value1'] . " - " . $row['fiber_weft_cotton_value2'] . " " . $second_condition;
                            ?>
                          " 
                          class="fiber_weft_cotton form-control col-md-7 col-xs-12" onkeyup="fiberWeftCottonCheck()">
                          <input type="hidden" id="fiber_weft_name_cotton" name="fiber_weft_name_cotton" value="cotton">
                          <input type="hidden" id="fiber_weft_cotton_cond1" name="fiber_weft_cotton_cond1" value="<?php echo $first_condition; ?>">
                          <input type="hidden" id="fiber_weft_cotton_value1" name="fiber_weft_cotton_value1" value="<?php echo $row['fiber_weft_cotton_value1']; ?>">
                          <input type="hidden" id="fiber_weft_cotton_value2" name="fiber_weft_cotton_value2" value="<?php echo $row['fiber_weft_cotton_value2']; ?>">
                          <input type="hidden" id="fiber_weft_cotton_cond2" name="fiber_weft_cotton_cond2" value="<?php echo $second_condition; ?>">
                      </div>
                  </div>
                <?php
            }
        ?>

        <?php
            if ($row['fiber_weft_thired_value1'] != 0)
            {
                ?>
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fiber_weft_thired"> <?php echo $row['fiber_weft_name_thired']; ?> <span class="required">*</span>
                    </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="fiber_weft_thired" name="fiber_weft_thired" autocomplete="off"
                          placeholder="
                            <?php 
                            if ($row['fiber_weft_thired_cond1'] == 1) 
                            {
                              $first_condition = "(";
                            }
                            elseif ($row['fiber_weft_thired_cond1'] == 2) 
                            {
                              $first_condition = "[";
                            }
                            else
                            {
                              $first_condition = "]";
                            }


                            if ($row['fiber_weft_thired_cond2'] == 1) 
                            {
                              $second_condition = ")";
                            }
                            elseif ($row['fiber_weft_thired_cond2'] == 2) 
                            {
                              $second_condition = "]";
                            }
                            else
                            {
                              $second_condition = "[";
                            }

                            echo "Fiber Content weft. ".  $row['fiber_weft_name_thired'] ." Result between ". $first_condition . " " . $row['fiber_weft_thired_value1'] . " - " . $row['fiber_weft_thired_value2'] . " " . $second_condition;
                            ?>
                          " 
                          class="fiber_weft_thired form-control col-md-7 col-xs-12" onkeyup="fiberWeftThiredCheck()">
                          <input type="hidden" id="fiber_weft_name_thired" name="fiber_weft_name_thired" value="<?php echo $row['fiber_weft_name_thired']; ?>">
                          <input type="hidden" id="fiber_weft_thired_cond1" name="fiber_weft_thired_cond1" value="<?php echo $first_condition; ?>">
                          <input type="hidden" id="fiber_weft_thired_value1" name="fiber_weft_thired_value1" value="<?php echo $row['fiber_weft_thired_value1']; ?>">
                          <input type="hidden" id="fiber_weft_thired_value2" name="fiber_weft_thired_value2" value="<?php echo $row['fiber_weft_thired_value2']; ?>">
                          <input type="hidden" id="fiber_weft_thired_cond2" name="fiber_weft_thired_cond2" value="<?php echo $second_condition; ?>">
                      </div>
                  </div>
                <?php
            }
        ?>

        <?php
            if ($row['fiber_weft_fourth_value1'] != 0)
            {
                ?>
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fiber_weft_fourth"> <?php echo $row['fiber_weft_name_fourth']; ?> <span class="required">*</span>
                    </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="fiber_weft_fourth" name="fiber_weft_fourth" autocomplete="off"
                          placeholder="
                            <?php 
                            if ($row['fiber_weft_fourth_cond1'] == 1) 
                            {
                              $first_condition = "(";
                            }
                            elseif ($row['fiber_weft_fourth_cond1'] == 2) 
                            {
                              $first_condition = "[";
                            }
                            else
                            {
                              $first_condition = "]";
                            }


                            if ($row['fiber_weft_fourth_cond2'] == 1) 
                            {
                              $second_condition = ")";
                            }
                            elseif ($row['fiber_weft_fourth_cond2'] == 2) 
                            {
                              $second_condition = "]";
                            }
                            else
                            {
                              $second_condition = "[";
                            }

                            echo "Fiber Content weft. ".  $row['fiber_weft_name_fourth'] ." Result between ". $first_condition . " " . $row['fiber_weft_fourth_value1'] . " - " . $row['fiber_weft_fourth_value2'] . " " . $second_condition;
                            ?>
                          " 
                          class="fiber_weft_fourth form-control col-md-7 col-xs-12" onkeyup="fiberWeftFourthCheck()">
                          <input type="hidden" id="fiber_weft_name_fourth" name="fiber_weft_name_fourth" value="<?php echo $row['fiber_weft_name_fourth']; ?>">
                          <input type="hidden" id="fiber_weft_fourth_cond1" name="fiber_weft_fourth_cond1" value="<?php echo $first_condition; ?>">
                          <input type="hidden" id="fiber_weft_fourth_value1" name="fiber_weft_fourth_value1" value="<?php echo $row['fiber_weft_fourth_value1']; ?>">
                          <input type="hidden" id="fiber_weft_fourth_value2" name="fiber_weft_fourth_value2" value="<?php echo $row['fiber_weft_fourth_value2']; ?>">
                          <input type="hidden" id="fiber_weft_fourth_cond2" name="fiber_weft_fourth_cond2" value="<?php echo $second_condition; ?>">
                      </div>
                  </div>
                <?php
            }
        ?>

        <br>


        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="width">Width <span class="required">*</span>
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" id="width" name="width" class="width form-control col-md-7 col-xs-12">
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="status">Status <span class="required">*</span>
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <p>
               OK :
              <input type="radio" class="flat" name="status" id="ok" value="1" checked/> 
               Not OK :
              <input type="radio" class="flat" name="status" id="notok" value="0" />
            </p>
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="remarks">Remarks
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" id="remarks" name="remarks" class="remarks form-control col-md-7 col-xs-12">
          </div>
        </div>

        <div class="ln_solid"></div>
        <div class="form-group">
          <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
            <input type="hidden" id="pp_no_id" name="pp_no_id" value="<?php echo $pp_no_id; ?>">
            <input type="hidden" id="pp_details_id" name="pp_details_id" value="<?php echo $pp_details_id; ?>">
            <button type="button" onclick="add_new_greige_issunce('<?php echo $pp_details_id; ?>');" class="btn btn-success">Submit</button>
            <button type="reset" name="reset" id="reset" class="btn btn-info">Reset</button>
          </div>
        </div>

      </form>
    </div>
  </div>

<script type="text/javascript">

    // $(document).ready(function()
    // {

    //     $('#datepicker_for_add').datetimepicker(
    //     {
    //       format: 'DD.MM.YYYY'
    //     });

    // }

</script>

<!--   </div>
</div> -->
<!-- main content again finished -->
                  
<?php 
  
?>