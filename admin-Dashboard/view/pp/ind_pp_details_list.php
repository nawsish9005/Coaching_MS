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
                    </ol>
                  </div>
                </div>

                <!-- main content again -->
                <div class="clearfix"></div>
                <div class="row">
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                      <div class="x_title">
                        <h2>Process Program</h2>
                        <ul class="nav navbar-right panel_toolbox">
                          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                          </li>
                        </ul>
                        <div class="clearfix"></div>
                      </div>
                      <div class="x_content">
                        <br />
                        <form id="demo-form2" action="" method="post" data-parsley-validate class="form-horizontal form-label-left">
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="customer">Process Program <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <select id="pp_no_select" name="pp_no_select" class="select2 pp_number form-control col-md-12 col-xs-12">
                                <option value="" selected="selected">Select PP Number</option>
                                <?php
                                  $pp_sql = "SELECT DISTINCT pp_no FROM pp ORDER BY pp_no";
                                  $pp_res = mysqli_query($con, $pp_sql) or die(mysqli_error($con));
                                  while ($pp_row = mysqli_fetch_assoc($pp_res)) 
                                  {
                                      echo "<option value='".$pp_row['pp_no']."'>";
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
                              <button type="submit" name="submit" id="submit" class="btn btn-success">Submit</button>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                  
                  <?php
                    $pp_no = $_POST['pp_no_select'];

                    if ($pp_no == "" || is_null($pp_no) || empty($pp_no)) {
                      
                    }

                    else
                    {
                      
                    ?>
                       <div class="col-md-12 col-sm-12 col-xs-12">
                          <div class="x_panel">
                            <div class="x_title">
                              <h2>PP Number</h2>
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
                                    <th>PP Number</th>
                                    <th>Issue Date</th>
                                    <th>Customer</th>
                                    <th>Construction</th>
                                    <th>Version</th>
                                    <th>Color</th>
                                    <th>Gray Width</th>
                                    <th>Finish Width</th>
                                    <th>Week</th>
                                    <th>Total Quant.</th>
                                    <th>Recv. Quant.</th>
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
                                                          details.total_received_quantity,
                                                          customers.customers_id,
                                                          customers.customers_name,
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
                                                   AND p.pp_id = details.pp_no_id
                                                   AND p.customers = customers.customers_id
                                                   AND details.color = c.color_id";



                                    $res_for_pp = mysqli_query($con, $sql_for_pp);

                                    while ($row = mysqli_fetch_assoc($res_for_pp)) 
                                    {
                                  ?>
                                  <tr>
                                    <td><?php echo $row['pp_id'] ?></td>
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
                                    <td><?php echo $row['received_quantity'] ?></td>
                                  </tr>
                                  <?php 
                                   }
                                  ?>
                                </tbody> 
                              </table>
                              <?php 
                                $sql_for_pp_details = "SELECT SUM(quantity) AS quantity FROM pp_details, pp WHERE pp.pp_no = '$pp_no' AND pp_details.pp_no_id = pp.pp_id";
                                $res_for_pp_details = mysqli_query($con, $sql_for_pp_details);
                                $row_quantity = mysqli_fetch_assoc($res_for_pp_details);
                                echo '<h2>Total Quantity = '.$row_quantity['quantity'].'</h2>';
                              ?>                            </div>
                          </div>
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