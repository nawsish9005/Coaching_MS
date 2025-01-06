<?php
session_start();
require_once("../includes/db_session_chk.php");
$pp_no = $_POST['pp_no'];
$color = $_POST['color'];
$version = $_POST['version'];
$gray_width = $_POST['gray_width'];
$pp_no_id = $_POST['pp_no_id'];
$pp_details_id = $_POST['pp_details_id'];

if (($pp_no == '') || (empty($pp_no)) || is_null($pp_no) || ($color == '') || (empty($color)) || is_null($color) || ($version == '') || (empty($version)) || is_null($version) || ($gray_width == '') || (empty($gray_width)) || is_null($gray_width) || ($pp_no_id == '') || (empty($pp_no_id)) || is_null($pp_no_id) || ($pp_details_id == '') || (empty($pp_details_id)) || is_null($pp_details_id)) {
   header("Location: gray_issue.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<?php
require_once('../includes/header.php');
?>


<!-- bootstrap-daterangepicker -->
<link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
<!-- bootstrap-datetimepicker -->
<link href="../vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css" rel="stylesheet">
<!-- bootstrap-daterangepicker -->
<script src="../vendors/moment/min/moment.min.js"></script>
<script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- bootstrap-datetimepicker -->    
<script src="../vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>

</head>
<body class="nav-md">
    <div class="container body">
        <div class="main_container">

            <?php
            require_once('../includes/sidebar.php');
            require_once('../includes/top_nav.php');
            ?>

            <!-- page content -->
            <div class="right_col" role="main" style="margin-bottom: 10px;">
              <div class="">
                <div class="page-title">
                  <div class="title_left">
                    <ol class="breadcrumb">
                        <li><a href="../home/dashboard.php">Dashboard</a></li>
                        <li><a href="../variable/gray_variable.php?pp_no_id=<?php echo $pp_no_id; ?>">Greige Standards for PP No: <span style="color:red;"><?php echo $pp_no; ?></span></a></li>
                        <li>Greige Standards Edit</li>
                    </ol>
                  </div>
                </div>

                <!-- main content again -->
                <div class="row">
                  <div class="col-md-12 col-sm-12 col-xs-12">
                      <div class="x_content">
                        <table class="table table-striped table-bordered">
                          <thead>
                            <tr>
                              <th>SI</th>
                              <th>PP Number</th>
                              <th>Issue Date</th>
                              <th>Customer</th>
                              <th>Construction</th>
                              <th>Version</th>
                              <th>Color</th>
                              <th>Gray Width</th>
                              <th>Finish Width</th>
                              <th>Week</th>
                              <th>Quantity</th>
                            </tr>
                          </thead>
                          
                          <tbody>
                            <?php 
                              $sql_for_pp = "SELECT p.pp_id, 
                                                    p.pp_no,
                                                    p.issue_date,
                                                    p.customers,
                                                    p.construction,
                                                    p.week,
                                                    p.design,
                                                    customers.customers_id,
                                                    customers.customers_name,
                                                    details.id,
                                                    details.pp_no_id,
                                                    details.version,
                                                    details.color,
                                                    c.color_id,
                                                    c.color_name,
                                                    details.gray_width,
                                                    details.finish_width,
                                                    details.quantity

                                             FROM pp AS p, pp_details AS details, customers AS customers, color AS c  

                                             WHERE p.pp_no = '$pp_no'
                                             AND details.color = '$color'
                                             AND details.version = '$version'
                                             AND details.gray_width = '$gray_width'
                                             AND p.pp_id = details.pp_no_id
                                             AND p.customers = customers.customers_id
                                             AND details.color = c.color_id";

                              $res_for_pp = mysqli_query($con, $sql_for_pp);

                              $row = mysqli_fetch_array($res_for_pp)
                            ?>
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
                              <td><?php echo $row['week'] ?></td>
                              <td><?php echo $row['quantity'] ?></td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>

                <?php 
                  $sql_for_gray_variable = "SELECT * FROM gray_variable WHERE pp_no_id = '$pp_no_id' AND pp_details_id = '$pp_details_id' AND active = '1' ";
                  $res_for_gray_variable = mysqli_query($con , $sql_for_gray_variable);
                  $row_for_gray_variable = mysqli_fetch_array($res_for_gray_variable);
                ?>

                <div class="row">
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                      <div class="x_title">
                        <h2>Greige Standards Edit Form</h2>
                        <ul class="nav navbar-right panel_toolbox">
                          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                          </li>
                        </ul>
                        <div class="clearfix"></div>
                      </div>
                      <div class="x_content">
                        <br />

                        <form id="gray_variable_form" name="gray_variable_form" data-parsley-validate class="form-horizontal form-label-left">
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="yarn_count">Yarn Count Warp<span class="required">*</span>
                            </label>
                            <div class="col-md-1 col-sm-1 col-xs-2">
                              <select id="yarn_warp_cond1" name="yarn_warp_cond1" onchange="yarn_warp_condition()" class="yarn_warp_cond1 form-control col-md-12 col-xs-12">
                                <option value="">Select Condition</option>
                                <option value="1" <?php if($row_for_gray_variable['yarn_warp_cond1'] == 1) {echo "selected";} ?> >(</option>
                                <option <?php if($row_for_gray_variable['yarn_warp_cond1'] == 2) {echo "selected";} ?> value="2">[</option>
                              </select>
                            </div>
                            <div class="col-md-1 col-sm-1 col-xs-2">
                              <input type="text" id="yarn_warp_value1" value="<?php echo $row_for_gray_variable['yarn_warp_value1']; ?>" name="yarn_warp_value1" class="yarn_warp_value1 form-control col-md-7 col-xs-12">
                            </div>
                            <div class="col-md-1 col-sm-1 col-xs-2">
                            </div> 
                            <div class="col-md-1 col-sm-1 col-xs-2">
                              --
                            </div> 
                            <div class="col-md-1 col-sm-1 col-xs-2">
                              <input type="text" id="yarn_warp_value2" value="<?php echo $row_for_gray_variable['yarn_warp_value2']; ?>" name="yarn_warp_value2" class="yarn_warp_value2 form-control col-md-7 col-xs-12">
                            </div>
                            <div class="col-md-1 col-sm-1 col-xs-2">
                              <select id="yarn_warp_cond2" name="yarn_warp_cond2" class="yarn_warp_cond2 form-control col-md-12 col-xs-12">
                                <option value="">Select Condition</option>
                                <option <?php if($row_for_gray_variable['yarn_warp_cond2'] == 1) {echo "selected";} ?> value="1">)</option>
                                <option <?php if($row_for_gray_variable['yarn_warp_cond2'] == 2) {echo "selected";} ?>  value="2">]</option>
                              </select>
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="yarn_count">Yarn Count Weft<span class="required">*</span>
                            </label>
                            <div class="col-md-1 col-sm-1 col-xs-2">
                              <select id="yarn_weft_cond1" name="yarn_weft_cond1" onchange="yarn_weft_condition()" class="yarn_weft_cond1 form-control col-md-12 col-xs-12">
                                <option value="">Select Condition</option>
                                <option <?php if($row_for_gray_variable['yarn_weft_cond1'] == 1) {echo "selected";} ?>  value="1">(</option>
                                <option <?php if($row_for_gray_variable['yarn_weft_cond1'] == 2) {echo "selected";} ?> value="2">[</option>
                              </select>
                            </div>
                            <div class="col-md-1 col-sm-1 col-xs-2">
                              <input type="text" id="yarn_weft_value1" value="<?php echo $row_for_gray_variable['yarn_weft_value1']; ?>" name="yarn_weft_value1" class="yarn_weft_value1 form-control col-md-7 col-xs-12">
                            </div>
                            <div class="col-md-1 col-sm-1 col-xs-2">
                            </div> 
                            <div class="col-md-1 col-sm-1 col-xs-2">
                              --
                            </div> 
                            <div class="col-md-1 col-sm-1 col-xs-2">
                              <input type="text" id="yarn_weft_value2" value="<?php echo $row_for_gray_variable['yarn_weft_value2']; ?>" name="yarn_weft_value2" class="yarn_weft_value2 form-control col-md-7 col-xs-12">
                            </div>
                            <div class="col-md-1 col-sm-1 col-xs-2">
                              <select id="yarn_weft_cond2" name="yarn_weft_cond2" class="yarn_weft_cond2 form-control col-md-12 col-xs-12">
                                <option value="">Select Condition</option>
                                <option <?php if($row_for_gray_variable['yarn_weft_cond2'] == 1) {echo "selected";} ?> value="1">)</option>
                                <option <?php if($row_for_gray_variable['yarn_weft_cond2'] == 2) {echo "selected";} ?> value="2">]</option>
                              </select>
                            </div>
                          </div>

                          <br>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="yarn_count">Thread Count EPI<span class="required">*</span>
                            </label>
                            <div class="col-md-1 col-sm-1 col-xs-2">
                              <select id="thread_epi_cond1" name="thread_epi_cond1" onchange="thread_epi_condition()" class="thread_epi_cond1 form-control col-md-12 col-xs-12">
                                <option value="">Select Condition</option>
                                <option <?php if($row_for_gray_variable['thread_epi_cond1'] == 1) {echo "selected";} ?> value="1">(</option>
                                <option <?php if($row_for_gray_variable['thread_epi_cond1'] == 2) {echo "selected";} ?>  value="2">[</option>
                              </select>
                            </div>
                            <div class="col-md-1 col-sm-1 col-xs-2">
                              <input type="text" id="thread_epi_value1" value="<?php echo $row_for_gray_variable['thread_epi_value1']; ?>" name="thread_epi_value1" class="thread_epi_value1 form-control col-md-7 col-xs-12">
                            </div>
                            <div class="col-md-1 col-sm-1 col-xs-2">
                            </div> 
                            <div class="col-md-1 col-sm-1 col-xs-2">
                              --
                            </div> 
                            <div class="col-md-1 col-sm-1 col-xs-2">
                              <input type="text" id="thread_epi_value2" value="<?php echo $row_for_gray_variable['thread_epi_value2']; ?>" name="thread_epi_value2" class="thread_epi_value2 form-control col-md-7 col-xs-12">
                            </div>
                            <div class="col-md-1 col-sm-1 col-xs-2">
                              <select id="thread_epi_cond2" name="thread_epi_cond2" class="thread_epi_cond2 form-control col-md-12 col-xs-12">
                                <option value="">Select Condition</option>
                                <option <?php if($row_for_gray_variable['thread_epi_cond2'] == 1) {echo "selected";} ?> value="1">)</option>
                                <option <?php if($row_for_gray_variable['thread_epi_cond2'] == 2) {echo "selected";} ?> value="2">]</option>
                              </select>
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="yarn_count">Thread Count PPI<span class="required">*</span>
                            </label>
                            <div class="col-md-1 col-sm-1 col-xs-2">
                              <select id="thread_ppi_cond1" name="thread_ppi_cond1" onchange="thread_ppi_condition()" class="thread_ppi_cond1 form-control col-md-12 col-xs-12">
                                <option value="">Select Condition</option>
                                <option <?php if($row_for_gray_variable['thread_ppi_cond1'] == 1) {echo "selected";} ?> value="1">(</option>
                                <option <?php if($row_for_gray_variable['thread_ppi_cond1'] == 2) {echo "selected";} ?> value="2">[</option>
                              </select>
                            </div>
                            <div class="col-md-1 col-sm-1 col-xs-2">
                              <input type="text" id="thread_ppi_value1" value="<?php echo $row_for_gray_variable['thread_ppi_value1']; ?>" name="thread_ppi_value1" class="thread_ppi_value1 form-control col-md-7 col-xs-12">
                            </div>
                            <div class="col-md-1 col-sm-1 col-xs-2">
                            </div> 
                            <div class="col-md-1 col-sm-1 col-xs-2">
                              --
                            </div> 
                            <div class="col-md-1 col-sm-1 col-xs-2">
                              <input type="text" id="thread_ppi_value2" value="<?php echo $row_for_gray_variable['thread_ppi_value2']; ?>" name="thread_ppi_value2" class="thread_ppi_value2 form-control col-md-7 col-xs-12">
                            </div>
                            <div class="col-md-1 col-sm-1 col-xs-2">
                              <select id="thread_ppi_cond2" name="thread_ppi_cond2" class="thread_ppi_cond2 form-control col-md-12 col-xs-12">
                                <option value="">Select Condition</option>
                                <option <?php if($row_for_gray_variable['thread_ppi_cond2'] == 1) {echo "selected";} ?> value="1">)</option>
                                <option <?php if($row_for_gray_variable['thread_ppi_cond2'] == 2) {echo "selected";} ?> value="2">]</option>
                              </select>
                            </div>
                          </div>

                          <br>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="yarn_count">GSM<span class="required">*</span>
                            </label>
                            <div class="col-md-1 col-sm-1 col-xs-2">
                              <select id="gsm_warp_cond1" name="gsm_warp_cond1" onchange="gsm_condition()" class="gsm_warp_cond1 form-control col-md-12 col-xs-12">
                                <option value="">Select Condition</option>
                                <option <?php if($row_for_gray_variable['gsm_warp_cond1'] == 1) {echo "selected";} ?> value="1">(</option>
                                <option <?php if($row_for_gray_variable['gsm_warp_cond1'] == 2) {echo "selected";} ?> value="2">[</option>
                              </select>
                            </div>
                            <div class="col-md-1 col-sm-1 col-xs-2">
                              <input type="text" id="gsm_warp_value1" value="<?php echo $row_for_gray_variable['gsm_warp_value1']; ?>" name="gsm_warp_value1" class="gsm_warp_value1 form-control col-md-7 col-xs-12">
                            </div>
                            <div class="col-md-1 col-sm-1 col-xs-2">
                            </div> 
                            <div class="col-md-1 col-sm-1 col-xs-2">
                              --
                            </div> 
                            <div class="col-md-1 col-sm-1 col-xs-2">
                              <input type="text" id="gsm_warp_value2" value="<?php echo $row_for_gray_variable['gsm_warp_value2']; ?>" name="gsm_warp_value2" class="gsm_warp_value2 form-control col-md-7 col-xs-12">
                            </div>
                            <div class="col-md-1 col-sm-1 col-xs-2">
                              <select id="gsm_warp_cond2" name="gsm_warp_cond2" class="gsm_warp_cond2 form-control col-md-12 col-xs-12">
                                <option value="">Select Condition</option>
                                <option <?php if($row_for_gray_variable['gsm_warp_cond2'] == 1) {echo "selected";} ?> value="1">)</option>
                                <option <?php if($row_for_gray_variable['gsm_warp_cond2'] == 2) {echo "selected";} ?> value="2">]</option>
                              </select>
                            </div>
                          </div>

                          <br>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="yarn_count">Fiber Content Warp<span class="required">*</span>
                            </label>
                            <div class="col-md-1 col-sm-1 col-xs-2">
                              <select id="fiber_warp_cond1" name="fiber_warp_cond1" onchange="fiber_warp_condition()" class="fiber_warp_cond1 form-control col-md-12 col-xs-12">
                                <option value="">Select Condition</option>
                                <option <?php if($row_for_gray_variable['fiber_warp_cond1'] == 1) {echo "selected";} ?> value="1">(</option>
                                <option <?php if($row_for_gray_variable['fiber_warp_cond1'] == 2) {echo "selected";} ?> value="2">[</option>
                              </select>
                            </div>
                            <div class="col-md-1 col-sm-1 col-xs-2">
                              <input type="text" id="fiber_warp_value1" value="<?php echo $row_for_gray_variable['fiber_warp_value1']; ?>" name="fiber_warp_value1" class="fiber_warp_value1 form-control col-md-7 col-xs-12">
                            </div>
                            <div class="col-md-1 col-sm-1 col-xs-2">
                            </div> 
                            <div class="col-md-1 col-sm-1 col-xs-2">
                              --
                            </div> 
                            <div class="col-md-1 col-sm-1 col-xs-2">
                              <input type="text" id="fiber_warp_value2" value="<?php echo $row_for_gray_variable['fiber_warp_value2']; ?>" name="fiber_warp_value2" class="fiber_warp_value2 form-control col-md-7 col-xs-12">
                            </div>
                            <div class="col-md-1 col-sm-1 col-xs-2">
                              <select id="fiber_warp_cond2" name="fiber_warp_cond2" class="fiber_warp_cond2 form-control col-md-12 col-xs-12">
                                <option value="">Select Condition</option>
                                <option <?php if($row_for_gray_variable['fiber_warp_cond2'] == 1) {echo "selected";} ?> value="1">)</option>
                                <option <?php if($row_for_gray_variable['fiber_warp_cond2'] == 2) {echo "selected";} ?> value="2">]</option>
                              </select>
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="yarn_count">Fiber Content Weft<span class="required">*</span>
                            </label>
                            <div class="col-md-1 col-sm-1 col-xs-2">
                              <select id="fiber_weft_cond1" name="fiber_weft_cond1" onchange="fiber_weft_condition()" class="fiber_weft_cond1 form-control col-md-12 col-xs-12">
                                <option value="">Select Condition</option>
                                <option <?php if($row_for_gray_variable['fiber_weft_cond1'] == 1) {echo "selected";} ?> value="1">(</option>
                                <option <?php if($row_for_gray_variable['fiber_weft_cond1'] == 2) {echo "selected";} ?> value="2">[</option>
                              </select>
                            </div>
                            <div class="col-md-1 col-sm-1 col-xs-2">
                              <input type="text" id="fiber_weft_value1" value="<?php echo $row_for_gray_variable['fiber_weft_value1']; ?>" name="fiber_weft_value1" class="fiber_weft_value1 form-control col-md-7 col-xs-12">
                            </div>
                            <div class="col-md-1 col-sm-1 col-xs-2">
                            </div> 
                            <div class="col-md-1 col-sm-1 col-xs-2">
                              --
                            </div> 
                            <div class="col-md-1 col-sm-1 col-xs-2">
                              <input type="text" id="fiber_weft_value2" value="<?php echo $row_for_gray_variable['fiber_weft_value2']; ?>" name="fiber_weft_value2" class="fiber_weft_value2 form-control col-md-7 col-xs-12">
                            </div>
                            <div class="col-md-1 col-sm-1 col-xs-2">
                              <select id="fiber_weft_cond2" name="fiber_weft_cond2" class="fiber_weft_cond2 form-control col-md-12 col-xs-12">
                                <option value="">Select Condition</option>
                                <option <?php if($row_for_gray_variable['fiber_weft_cond2'] == 1) {echo "selected";} ?> value="1">)</option>
                                <option <?php if($row_for_gray_variable['fiber_weft_cond2'] == 2) {echo "selected";} ?> value="2">]</option>
                              </select>
                            </div>
                          </div>

                          <div class="ln_solid"></div>
                          <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                              <input type="hidden" id="pp_no_id" name="pp_no_id" value="<?php echo $row['pp_no_id']; ?>">
                              <input type="hidden" id="pp_details_id" name="pp_details_id" value="<?php echo $row['id']; ?>">
                              <input type="hidden" id="gray_variable_id" name="gray_variable_id" value="<?php echo $row_for_gray_variable['gray_variable_id']; ?>">
                              <button type="button" name="submit" id="submit" class="btn btn-success">Update</button>
                            </div>
                          </div>

                        </form>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- main content finished -->

              </div>
            </div>
            <!-- /page content -->

            <?php
            require_once('../includes/footer_body.php');
            ?>

        </div>
    </div>

    <?php
    require_once('../includes/footer.php');
    ?>
    <script type="text/javascript">
    function yarn_warp_condition() 
    {
      if (document.getElementById("yarn_warp_cond1").value == 1) 
      {
        document.getElementById("yarn_warp_cond2").value = 1;
      }
      else
      {
        document.getElementById("yarn_warp_cond2").value = 2;
      }
    }

    function yarn_weft_condition() 
    {
      if (document.getElementById("yarn_weft_cond1").value == 1) 
      {
        document.getElementById("yarn_weft_cond2").value = 1;
      }
      else
      {
        document.getElementById("yarn_weft_cond2").value = 2;
      }
    }

    function thread_epi_condition() 
    {
      if (document.getElementById("thread_epi_cond1").value == 1) 
      {
        document.getElementById("thread_epi_cond2").value = 1;
      }
      else
      {
        document.getElementById("thread_epi_cond2").value = 2;
      }
    }

    function thread_ppi_condition() 
    {
      if (document.getElementById("thread_ppi_cond1").value == 1) 
      {
        document.getElementById("thread_ppi_cond2").value = 1;
      }
      else
      {
        document.getElementById("thread_ppi_cond2").value = 2;
      }
    }

    function gsm_condition() 
    {
      if (document.getElementById("gsm_warp_cond1").value == 1) 
      {
        document.getElementById("gsm_warp_cond2").value = 1;
      }
      else
      {
        document.getElementById("gsm_warp_cond2").value = 2;
      }
    }

    function fiber_warp_condition() 
    {
      if (document.getElementById("fiber_warp_cond1").value == 1) 
      {
        document.getElementById("fiber_warp_cond2").value = 1;
      }
      else
      {
        document.getElementById("fiber_warp_cond2").value = 2;
      }
    }

    function fiber_weft_condition() 
    {
      if (document.getElementById("fiber_weft_cond1").value == 1) 
      {
        document.getElementById("fiber_weft_cond2").value = 1;
      }
      else
      {
        document.getElementById("fiber_weft_cond2").value = 2;
      }
    }

     $(document).ready(function(){ 

      $('#myDatepicker2').datetimepicker({
        format: 'DD.MM.YYYY'
      });

      $('#submit').click(function()
      {
          //start yarn warp
          if(document.getElementById("yarn_warp_cond1").value == "")
          {
              missing_alert("yarn_warp_cond1");
              return false;
          }
          if(document.getElementById("yarn_warp_value1").value == "")
          {
              missing_alert("yarn_warp_value1");
              return false;
          }
          if(isNaN(document.getElementById("yarn_warp_value1").value))
          {
              number_alert("yarn_warp_value1");
              return false;
          }
          if(document.getElementById("yarn_warp_value2").value == "")
          {
              missing_alert("yarn_warp_value2");
              return false;
          }
          if(isNaN(document.getElementById("yarn_warp_value2").value))
          {
              number_alert("yarn_warp_value2");
              return false;
          }
          if(document.getElementById("yarn_warp_cond1").value == 1 && (parseFloat(document.getElementById("yarn_warp_value2").value)) <= (parseFloat(document.getElementById("yarn_warp_value1").value)))
          {
              warning_alert("Should be Bigger", "yarn_warp_value2");
              return false;
          }
          if(document.getElementById("yarn_warp_cond1").value == 2 && (parseFloat(document.getElementById("yarn_warp_value2").value)) < (parseFloat(document.getElementById("yarn_warp_value1").value)))
          {
              warning_alert("Should be Bigger or Equal", "yarn_warp_value2");
              return false;
          }
          if(document.getElementById("yarn_warp_cond2").value == "")
          {
              missing_alert("yarn_warp_cond2");
              return false;
          }
          

          //start yarn weft
          if(document.getElementById("yarn_weft_cond1").value == "")
          {
              missing_alert("yarn_weft_cond1");
              return false;
          }
          if(document.getElementById("yarn_weft_value1").value == "")
          {
              missing_alert("yarn_weft_value1");
              return false;
          }
          if(isNaN(document.getElementById("yarn_weft_value1").value))
          {
              number_alert("yarn_weft_value1");
              return false;
          }
          if(document.getElementById("yarn_weft_value2").value == "")
          {
              missing_alert("yarn_weft_value2");
              return false;
          }
          if(isNaN(document.getElementById("yarn_weft_value2").value))
          {
              number_alert("yarn_weft_value2");
              return false;
          }
          if(document.getElementById("yarn_weft_cond1").value == 1 && (parseFloat(document.getElementById("yarn_weft_value2").value)) <= (parseFloat(document.getElementById("yarn_weft_value1").value)))
          {
              warning_alert("Should be Bigger", "yarn_weft_value2");
              return false;
          }
          if(document.getElementById("yarn_weft_cond1").value == 2 && (parseFloat(document.getElementById("yarn_weft_value2").value)) < (parseFloat(document.getElementById("yarn_weft_value1").value)))
          {
              warning_alert("Should be Bigger or Equal", "yarn_weft_value2");
              return false;
          }
          if(document.getElementById("yarn_weft_cond2").value == "")
          {
              missing_alert("yarn_weft_cond2");
              return false;
          }

          //start thread epi
          if(document.getElementById("thread_epi_cond1").value == "")
          {
              missing_alert("thread_epi_cond1");
              return false;
          }
          if(document.getElementById("thread_epi_value1").value == "")
          {
              missing_alert("thread_epi_value1");
              return false;
          }
          if(isNaN(document.getElementById("thread_epi_value1").value))
          {
              number_alert("thread_epi_value1");
              return false;
          }
          if(document.getElementById("thread_epi_value2").value == "")
          {
              missing_alert("thread_epi_value2");
              return false;
          }
          if(isNaN(document.getElementById("thread_epi_value2").value))
          {
              number_alert("thread_epi_value2");
              return false;
          }
          if(document.getElementById("thread_epi_cond1").value == 1 && (parseFloat(document.getElementById("thread_epi_value2").value)) <= (parseFloat(document.getElementById("thread_epi_value1").value)))
          {
              warning_alert("Should be Bigger", "thread_epi_value2");
              return false;
          }
          if(document.getElementById("thread_epi_cond1").value == 2 && (parseFloat(document.getElementById("thread_epi_value2").value)) < (parseFloat(document.getElementById("thread_epi_value1").value)))
          {
              warning_alert("Should be Bigger or Equal", "thread_epi_value2");
              return false;
          }
          if(document.getElementById("thread_epi_cond2").value == "")
          {
              missing_alert("thread_epi_cond2");
              return false;
          }

          //start thread ppi
          if(document.getElementById("thread_ppi_cond1").value == "")
          {
              missing_alert("thread_ppi_cond1");
              return false;
          }
          if(document.getElementById("thread_ppi_value1").value == "")
          {
              missing_alert("thread_ppi_value1");
              return false;
          }
          if(isNaN(document.getElementById("thread_ppi_value1").value))
          {
              number_alert("thread_ppi_value1");
              return false;
          }
          if(document.getElementById("thread_ppi_value2").value == "")
          {
              missing_alert("thread_ppi_value2");
              return false;
          }
          if(isNaN(document.getElementById("thread_ppi_value2").value))
          {
              number_alert("thread_ppi_value2");
              return false;
          }
          if(document.getElementById("thread_ppi_cond1").value == 1 && (parseFloat(document.getElementById("thread_ppi_value2").value)) <= (parseFloat(document.getElementById("thread_ppi_value1").value)))
          {
              warning_alert("Should be Bigger", "thread_ppi_value2");
              return false;
          }
          if(document.getElementById("thread_ppi_cond1").value == 2 && (parseFloat(document.getElementById("thread_ppi_value2").value)) < (parseFloat(document.getElementById("thread_ppi_value1").value)))
          {
              warning_alert("Should be Bigger or Equal", "thread_ppi_value2");
              return false;
          }
          if(document.getElementById("thread_ppi_cond2").value == "")
          {
              missing_alert("thread_ppi_cond2");
              return false;
          }

          //start gsm warp
          if(document.getElementById("gsm_warp_cond1").value == "")
          {
              missing_alert("gsm_warp_cond1");
              return false;
          }
          if(document.getElementById("gsm_warp_value1").value == "")
          {
              missing_alert("gsm_warp_value1");
              return false;
          }
          if(isNaN(document.getElementById("gsm_warp_value1").value))
          {
              number_alert("gsm_warp_value1");
              return false;
          }
          if(document.getElementById("gsm_warp_value2").value == "")
          {
              missing_alert("gsm_warp_value2");
              return false;
          }
          if(isNaN(document.getElementById("gsm_warp_value2").value))
          {
              number_alert("gsm_warp_value2");
              return false;
          }
          if(document.getElementById("gsm_warp_cond1").value == 1 && (parseFloat(document.getElementById("gsm_warp_value2").value)) <= (parseFloat(document.getElementById("gsm_warp_value1").value)))
          {
              warning_alert("Should be Bigger", "gsm_warp_value2");
              return false;
          }
          if(document.getElementById("gsm_warp_cond1").value == 2 && (parseFloat(document.getElementById("gsm_warp_value2").value)) < (parseFloat(document.getElementById("gsm_warp_value1").value)))
          {
              warning_alert("Should be Bigger or Equal", "gsm_warp_value2");
              return false;
          }
          if(document.getElementById("gsm_warp_cond2").value == "")
          {
              missing_alert("gsm_warp_cond2");
              return false;
          }

          //start fiber warp
          if(document.getElementById("fiber_warp_cond1").value == "")
          {
              missing_alert("fiber_warp_cond1");
              return false;
          }
          if(document.getElementById("fiber_warp_value1").value == "")
          {
              missing_alert("fiber_warp_value1");
              return false;
          }
          if(isNaN(document.getElementById("fiber_warp_value1").value))
          {
              number_alert("fiber_warp_value1");
              return false;
          }
          if(document.getElementById("fiber_warp_value2").value == "")
          {
              missing_alert("fiber_warp_value2");
              return false;
          }
          if(isNaN(document.getElementById("fiber_warp_value2").value))
          {
              number_alert("fiber_warp_value2");
              return false;
          }
          if(document.getElementById("fiber_warp_cond1").value == 1 && (parseFloat(document.getElementById("fiber_warp_value2").value)) <= (parseFloat(document.getElementById("fiber_warp_value1").value)))
          {
              warning_alert("Should be Bigger", "fiber_warp_value2");
              return false;
          }
          if(document.getElementById("fiber_warp_cond1").value == 2 && (parseFloat(document.getElementById("fiber_warp_value2").value)) < (parseFloat(document.getElementById("fiber_warp_value1").value)))
          {
              warning_alert("Should be Bigger or Equal", "fiber_warp_value2");
              return false;
          }
          if(document.getElementById("fiber_warp_cond2").value == "")
          {
              missing_alert("fiber_warp_cond2");
              return false;
          }

          //start fiber weft
          if(document.getElementById("fiber_weft_cond1").value == "")
          {
              missing_alert("fiber_weft_cond1");
              return false;
          }
          if(document.getElementById("fiber_weft_value1").value == "")
          {
              missing_alert("fiber_weft_value1");
              return false;
          }
          if(isNaN(document.getElementById("fiber_weft_value1").value))
          {
              number_alert("fiber_weft_value1");
              return false;
          }
          if(document.getElementById("fiber_weft_value2").value == "")
          {
              missing_alert("fiber_weft_value2");
              return false;
          }
          if(isNaN(document.getElementById("fiber_weft_value2").value))
          {
              number_alert("fiber_weft_value2");
              return false;
          }
          if(document.getElementById("fiber_weft_cond1").value == 1 && (parseFloat(document.getElementById("fiber_weft_value2").value)) <= (parseFloat(document.getElementById("fiber_weft_value1").value)))
          {
              warning_alert("Should be Bigger", "fiber_weft_value2");
              return false;
          }
          if(document.getElementById("fiber_weft_cond1").value == 2 && (parseFloat(document.getElementById("fiber_weft_value2").value)) < (parseFloat(document.getElementById("fiber_weft_value1").value)))
          {
              warning_alert("Should be Bigger or Equal", "fiber_weft_value2");
              return false;
          }
          if(document.getElementById("fiber_weft_cond2").value == "")
          {
              missing_alert("fiber_weft_cond2");
              return false;
          }
          else
          {
              var formdata = new FormData(document.getElementById('gray_variable_form'));
              $.ajax({
              type: "POST",
              url: "edit_gray_variable_saving.php",// where you wanna post
              data: formdata,
              processData: false,
              contentType: false,
              error: function(jqXHR, textStatus, errorMessage) 
              {
                  alert(errorMessage);
              },
              success: function(data) 
              {
                //info_alert(data);
                var pp_id_number = document.getElementById("pp_no_id").value;
                success_alert("All Data Update Successfully", "../variable/gray_variable.php?pp_no_id="+pp_id_number);
                //window.location = 'gray_issue.php';
              } 
            });
          }


      });
  });
  </script>
</body>
</html>