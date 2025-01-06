<?php
session_start();
require_once("../includes/db_session_chk.php");

$pp_no_id = $_POST['pp_no_id'];
$pp_version = $_POST['pp_version'];

if ($pp_no_id == "" || is_null($pp_no_id) || empty($pp_no_id) || 
    $pp_version == "" || is_null($pp_version) || empty($pp_version)) 
{
    echo "No data found";
}

else
{
    $sql_for_pp = "SELECT pp.*
                     FROM pp
                    WHERE pp.pp_id = '$pp_no_id'";

    $res_for_pp = mysqli_query($con, $sql_for_pp);
    $row_check = mysqli_num_rows($res_for_pp);

    if ($row_check >= 1)
    {
        $row = mysqli_fetch_array($res_for_pp);
    ?>
        <div class="x_panel">
          <div class="x_title">
            <h2>PP Number : <span style="color:red;"><?php echo $row['pp_no']; ?></span> - (Basic Information) </h2>
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
                  <th>Greige Demand No</th>
                  <th>Total PP Quantity </th>
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
                      $sql_for_total_quantity = "SELECT SUM(quantity) AS total_quantity FROM pp_details WHERE pp_no_id = '$pp_no_id' AND active = '1' ";
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

        <!-- for pp details -->
        <div class="x_panel">
          <div class="x_content">
            <table class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>SI</th>
                  <th>PP Version</th>
                  <th>Color</th>
                  <th>Greige Width (Inch)</th>
                  <th>Finish Width (Inch)</th>
                  <th>Order Quantity (Meter)</th>
                  <th>Action</th>
                </tr>
              </thead>
              <?php 
                  $sql_version_select = "SELECT * FROM pp_details
                            WHERE pp_id = '$pp_version';"; 
                  $res_version_select = mysqli_query($con, $sql_version_select);
                  $row_version_select = mysqli_fetch_assoc($res_version_select);

                ?>
                          <tbody>
                            <tr>
                              <td>1</td>
                              <td><?php echo $row_version_select['version'] ?></td>
                              <td>
                                <?php 
                                  $color_id = $row_version_select['color'];
                                  $sql_for_color = "SELECT color_name FROM color WHERE color_id = '$color_id'";
                                  $res_for_color = mysqli_query($con, $sql_for_color);
                                  $row_for_color = mysqli_fetch_assoc($res_for_color);
                                  echo $row_for_color['color_name'];
                                ?>
                              </td>
                              <td><?php echo $row_version_select['gray_width'] ?></td>
                              <td><?php echo $row_version_select['finish_width'] ?></td>
                              <td><?php echo $row_version_select['quantity'] ?></td>
                              <td>
                                  <input type="hidden" id="pp_no_id_<?php echo $sl; ?>" name="pp_no_id_<?php echo $sl; ?>" value="<?php echo $pp_no_id; ?>">
                                  <input type="hidden" id="pp_version_<?php echo $sl; ?>" name="pp_version_<?php echo $sl; ?>" value="<?php echo ($row_version_select['pp_id'] == "") ? $pp_version : $row_version_select['pp_id']; ?>">

                                  <!-- after add view purpose -->
                                  <input type="hidden" id="pp_no_id" name="pp_no_id" value="<?php echo $pp_no_id; ?>">
                                  <input type="hidden" id="pp_version" name="pp_version" value="<?php echo $row_version_select['pp_id']; ?>">
                                  <button type="button" id="gray_issue_add_btn" value="<?php echo $sl; ?>" name="gray_issue_add_btn" onclick="view_standard_select(this.value);" class="btn btn-primary btn-xs"> View / Add Route </button>
                                  <?php 
                                      $pp_version = $row_version_select['pp_id'];
                                      $sql_for_pp = "SELECT *
                                                       FROM route_issue_main
                                                       WHERE pp_no_id = '$pp_no_id'
                                                       AND pp_details_id = '$pp_version'
                                                       AND active = '1'";

                                      $res_for_pp = mysqli_query($con, $sql_for_pp);
                                      $row = mysqli_num_rows($res_for_pp);

                                      if ($row >= 1) 
                                      {
                                          ?>
                                            <button type="button" id="gray_issue_add_btn" value="<?php echo $sl; ?>" name="gray_issue_add_btn" onclick="edit_route_standard_select(this.value);" class="btn btn-primary btn-xs"> Edit Route </button>
                                          <?php
                                      }
                                  ?>
                                  
                              </td>                       
                            </tr>
                          </tbody>
                      <?php
              ?>
            </table>
          </div>
        </div>

<?php
        
    }
    else
    {
        echo "Data Not Found!";
    }
}
?>



 <!-- for all copy  -->
 <script>
  $(function ()
  {
      $('.select2').select2();
  });

  $(document).ready(function()
  {
      $(function ()
      {
          $('.select2').select2();
      });

      $('.model_action').change(function()
      {
          if($(this).val() != '')
          {
              var action = $(this).attr("id");
              var query = $(this).val();
              var result = '';

              if(action == "customers_model")
              {
                  result = 'design_id';
              }
              else if (action == "design_id")
              {
               result = 'version_id';
              }
              else
              {

              }
              $.ajax(
              {
                  url:"sql_for_all_copy.php",
                  method:"POST",
                  data:{action:action, query:query},
                  success:function(data)
                  {
                      $('#'+result).html(data);
                  }
              });
          }
      });


      $('#myDatepicker2').datetimepicker(
      {
        format: 'DD.MM.YYYY'
      });


      // for model dada
      $('#retrieve_data_for_all_copy').click(function()
      {
          var pp_no_id = document.getElementById("pp_no_id").value;
          var customers_model = document.getElementById("customers_model").value;
          var design_id = document.getElementById("design_id").value;
          var version_id = document.getElementById("version_id").value;

          $.ajax(
          {
              type: "POST",
              url: "copy_all_details.php",
              method: "POST",
              data: 
              {
                customers_model: customers_model, 
                design_id: design_id,
                version_id: version_id,
                pp_no_id: pp_no_id
              },
              success:function(data)
              {
                  //$('#model_retrieve_general_data').html(data);
                  alert(data);
              }
          });
      });
  });
</script>