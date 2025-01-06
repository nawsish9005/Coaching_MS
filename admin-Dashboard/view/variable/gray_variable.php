<?php
session_start();
require_once("../includes/db_session_chk.php");
?>

<!DOCTYPE html>
<html lang="en">

<?php
require_once('../includes/header.php');
?>


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
                        <li>Define Greige Standards</li>
                    </ol>
                  </div>
                </div>

                <!-- main content again -->
                <div class="clearfix"></div>
                <div class="row">
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                      <div class="x_title">
                        <h2>Define Greige Standards against PP No. </h2>
                        <ul class="nav navbar-right panel_toolbox">
                          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                          </li>
                        </ul>
                        <div class="clearfix"></div>
                      </div>
                      <div class="x_content">
                        <br />
                        <form id="demo-form2" action="" method="get" data-parsley-validate class="form-horizontal form-label-left">
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="customer">PP Number <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <select id="pp_no_id" name="pp_no_id" class="select2 pp_number form-control col-md-12 col-xs-12">
                                <option value="" selected="selected">Select PP Number</option>
                                <?php
                                  $pp_sql = "SELECT DISTINCT pp_no, pp_id FROM pp ORDER BY pp_no";
                                  $pp_res = mysqli_query($con, $pp_sql) or die(mysqli_error($con));
                                  while ($pp_row = mysqli_fetch_assoc($pp_res)) 
                                  {
                                      echo "<option value='".$pp_row['pp_id']."'>";
                                      echo $pp_row['pp_no'];
                                      echo "</option>";
                                  }
                                ?>
                              </select> 
                            </div>
                          </div>
                          <div class="ln_solid"></div>
                          <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                              <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                  
                  <?php
                    $pp_no = $_GET['pp_no_id'];


                    if ($pp_no == "" || is_null($pp_no) || empty($pp_no)) {
                      
                    }

                    else
                    {

                      $sql_for_pp = "SELECT pp.*

                                     FROM pp

                                     WHERE pp.pp_id = '$pp_no' ";

                      $res_for_pp = mysqli_query($con, $sql_for_pp);

                      $row = mysqli_fetch_array($res_for_pp)
                    ?>

                      <!-- main content again -->
                      <div class="col-md-12 col-sm-12 col-xs-12">
                          <div class="x_title">
                            <h2>PP Number : <span style="color:red;"><?php echo $row['pp_no']; ?></span> - (Basic Information) </h2>
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
                                  <th>SI</th>
                                  <th>PP Number</th>
                                  <th>Issue Date</th>
                                  <th>Customer</th>
                                  <th>Construction</th>
                                  <th>Week</th>
                                  <th>Greige Demand</th>
                                  <th>Received Quantity</th>
                                </tr>
                              </thead>
                              
                              <tbody>
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
                                  <td><?php echo $row['week'] ?></td>
                                  <td><?php echo $row['greige_demand'] ?></td>
                                  <td>
                                    <?php 
                                      $sql_for_total_quantity = "SELECT SUM(quantity) AS total_quantity FROM pp_details WHERE pp_no_id = '$pp_no'";
                                      $res_for_total_quantity = mysqli_query($con, $sql_for_total_quantity);
                                      $row_for_total_quantity = mysqli_fetch_assoc($res_for_total_quantity);
                                      echo $row_for_total_quantity['total_quantity'];
                                    ?>
                                  </td>                            
                                </tr>
                              </tbody>
                            </table>
                          </div>
                        </div>


                       <div class="col-md-12 col-sm-12 col-xs-12">

                          <?php
                          $sql_for_pp_header = "SELECT * FROM pp WHERE pp_id = '$pp_no'";
                          $res_for_pp_header = mysqli_query($con, $sql_for_pp_header);

                          if(mysqli_num_rows($res_for_pp_header) == 1)
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
                                    <th>Gray Width</th>
                                    <th>Finish Width</th>
                                    <th>Week</th>
                                    <th>Total Quant.</th>
                                    <th>Action</th>
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

                                                   WHERE p.pp_id = '$pp_no'
                                                   AND p.pp_id = details.pp_no_id
                                                   AND p.customers = customers.customers_id
                                                   AND details.color = c.color_id";



                                    $res_for_pp = mysqli_query($con, $sql_for_pp);
                                    $s1 = 1;
                                    while ($row = mysqli_fetch_assoc($res_for_pp)) 
                                    {
                                  ?>
                                  <tr>
                                    <td><?php echo $s1; ?></td>
                                    <td><?php echo $row['version'] ?></td>
                                    <td>
                                      <?php 
                                        $color_id = $row['color'];
                                        $pp_no_id = $row['pp_no_id'];
                                        $pp_no = $row['pp_no'];
                                        $pp_details_id = $row['id'];
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
                                    <td>
                                      <?php 
                                        // if ($row['quantity'] != $row['received_quantity']) 
                                        // {
                                          $sql_for_gray_variable = "SELECT * FROM gray_variable WHERE pp_no_id = '$pp_no_id' AND pp_details_id = '$pp_details_id' AND active = '1' ";
                                          $res_for_gray_variable = mysqli_query($con, $sql_for_gray_variable);
                                          $row_for_gray_variable = mysqli_num_rows($res_for_gray_variable);
                                          if ($row_for_gray_variable == 0) 
                                          {
                                          ?>
                                            <form action="add_gray_variable.php" method="post" style="display: inline-block;">
                                              <input type="hidden" id="pp_no_id" name="pp_no_id" value="<?php echo $pp_no_id; ?>">
                                              <input type="hidden" id="pp_no" name="pp_no" value="<?php echo $row['pp_no']; ?>">
                                              <input type="hidden" id="version" name="version" value="<?php echo $row['version']; ?>">
                                              <input type="hidden" id="color" name="color" value="<?php echo $row['color']; ?>">
                                              <input type="hidden" id="gray_width" name="gray_width" value="<?php echo $row['gray_width']; ?>">
                                              <button type="submit" id="gray_issue_add_btn" name="gray_issue_add_btn" class="btn btn-primary btn-xs"> PP Variable Add </button>
                                            </form>
                                          <?php
                                          }
                                        // }

                                          else
                                          {
                                            ?>
                                            <form action="gray_varibale_view.php" method="post" style="display: inline-block;">
                                              <input type="hidden" id="pp_no_id" name="pp_no_id" value="<?php echo $pp_no_id; ?>">
                                              <input type="hidden" id="pp_details_id" name="pp_details_id" value="<?php echo $pp_details_id; ?>">
                                              <button type="submit" id="gray_issue_add_btn" name="gray_issue_add_btn" class="btn btn-primary btn-xs"> View </button>
                                            </form>
                                            <form action="gray_varibale_edit.php" method="post" style="display: inline-block;">
                                              <input type="hidden" id="pp_no" name="pp_no" value="<?php echo $row['pp_no']; ?>">
                                              <input type="hidden" id="version" name="version" value="<?php echo $row['version']; ?>">
                                              <input type="hidden" id="color" name="color" value="<?php echo $row['color']; ?>">
                                              <input type="hidden" id="gray_width" name="gray_width" value="<?php echo $row['gray_width']; ?>">
                                              <input type="hidden" id="pp_no_id" name="pp_no_id" value="<?php echo $pp_no_id; ?>">
                                              <input type="hidden" id="pp_details_id" name="pp_details_id" value="<?php echo $pp_details_id; ?>">
                                              <button type="submit" id="gray_issue_add_btn" name="gray_issue_add_btn" class="btn btn-primary btn-xs"> Edit </button>
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

                          <?php
                          }
                          ?>

                        </div>
                       <?php 
                      }
                    ?>

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

  $(function () 
  {
      //Initialize Select2 Elements
      $('.select2').select2();
  });
</script>

</body>
</html>