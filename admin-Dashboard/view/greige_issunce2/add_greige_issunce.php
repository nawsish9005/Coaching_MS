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
                      customers.customers_id,
                      customers.customers_name,
                      details.pp_no_id,
                      details.version,
                      details.color,
                      c.color_id,
                      c.color_name,
                      details.gray_width,
                      details.finish_width,
                      details.quantity,
                      gv.*

               FROM pp AS p, pp_details AS details, customers AS customers, color AS c, gray_variable as gv 

               WHERE p.pp_id = '$pp_no_id'
               AND details.pp_id = '$pp_details_id'
               AND details.pp_no_id = '$pp_no_id'
               AND details.active = '1'
               AND p.pp_id = details.pp_no_id
               AND p.customers = customers.customers_id
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
      <h2>Greige Issuance Add Form</h2>
      <ul class="nav navbar-right panel_toolbox">
        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
        </li>
      </ul>
      <div class="clearfix"></div>
    </div>
    <div class="x_content">
      <br />

      <form id="gray_issue_form" name="gray_issue_form" data-parsley-validate class="form-horizontal form-label-left">

        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="pp">Date <span class="required">*</span>
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

        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fiber_count_warp">Fiber Content Warp<span class="required">*</span>
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" id="fiber_count_warp" name="fiber_count_warp" autocomplete="off"
              placeholder="
                <?php 
                if ($row['fiber_warp_cond1'] == 1) 
                {
                  $first_condition = "(";
                }
                elseif ($row['fiber_warp_cond1'] == 2) 
                {
                  $first_condition = "[";
                }
                else
                {
                  $first_condition = "]";
                }


                if ($row['fiber_warp_cond2'] == 1) 
                {
                  $second_condition = ")";
                }
                elseif ($row['fiber_warp_cond2'] == 2) 
                {
                  $second_condition = "]";
                }
                else
                {
                  $second_condition = "[";
                }

                echo "Yarn Warp. Result between ". $first_condition . " " . $row['fiber_warp_value1'] . " - " . $row['fiber_warp_value2'] . " " . $second_condition;
                ?>
              " 
              class="fiber_count_warp form-control col-md-7 col-xs-12" onkeyup="fiberWarpCheck()">
              <input type="hidden" id="fiber_warp_cond1" name="fiber_warp_cond1" value="<?php echo $first_condition; ?>">
              <input type="hidden" id="fiber_warp_value1" name="fiber_warp_value1" value="<?php echo $row['fiber_warp_value1']; ?>">
              <input type="hidden" id="fiber_warp_value2" name="fiber_warp_value2" value="<?php echo $row['fiber_warp_value2']; ?>">
              <input type="hidden" id="fiber_warp_cond2" name="fiber_warp_cond2" value="<?php echo $second_condition; ?>">
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fiber_count_weft">Fiber Content Weft<span class="required">*</span>
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" id="fiber_count_weft" name="fiber_count_weft" autocomplete="off"
              placeholder="
                <?php 
                if ($row['fiber_weft_cond1'] == 1) 
                {
                  $first_condition = "(";
                }
                elseif ($row['fiber_weft_cond1'] == 2) 
                {
                  $first_condition = "[";
                }
                else
                {
                  $first_condition = "]";
                }


                if ($row['fiber_weft_cond2'] == 1) 
                {
                  $second_condition = ")";
                }
                elseif ($row['fiber_weft_cond2'] == 2) 
                {
                  $second_condition = "]";
                }
                else
                {
                  $second_condition = "[";
                }

                echo "Fiber Weft. Result between ". $first_condition . " " . $row['fiber_weft_value1'] . " - " . $row['fiber_weft_value2'] . " " . $second_condition;
                ?>
              " 
              class="fiber_count_weft form-control col-md-7 col-xs-12" onkeyup="fiberWeftCheck()">
              <input type="hidden" id="fiber_weft_cond1" name="fiber_weft_cond1" value="<?php echo $first_condition; ?>">
              <input type="hidden" id="fiber_weft_value1" name="fiber_weft_value1" value="<?php echo $row['fiber_weft_value1']; ?>">
              <input type="hidden" id="fiber_weft_value2" name="fiber_weft_value2" value="<?php echo $row['fiber_weft_value2']; ?>">
              <input type="hidden" id="fiber_weft_cond2" name="fiber_weft_cond2" value="<?php echo $second_condition; ?>">
          </div>
        </div>


        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="width">Width <span class="required">*</span>
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" id="width" name="width" class="width form-control col-md-7 col-xs-12">
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="composition">Fabric composition (incase of blend) <span class="required">*</span>
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" id="composition" name="composition" class="composition form-control col-md-7 col-xs-12">
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
            <button type="button" onclick="add_new_greige_issunce();" class="btn btn-success">Submit</button>
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