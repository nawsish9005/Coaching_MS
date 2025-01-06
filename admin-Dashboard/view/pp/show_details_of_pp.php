<?php
session_start();
require_once("../includes/db_session_chk.php");

$pp_no_id = $_POST['pp_no_id'];

if ($pp_no_id == "" || is_null($pp_no_id) || empty($pp_no_id)) 
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
                  <th>Total PP Quantity</th>
                  <th>Action</th>
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
                  <td>
                      <input type="hidden" id="pp_no_id_<?php echo $sl; ?>" name="pp_no_id_<?php echo $sl; ?>" value="<?php echo $pp_no_id; ?>">

                      <!-- after add view purpose -->
                      <input type="hidden" id="pp_no_id" name="pp_no_id" value="<?php echo $pp_no_id; ?>">
                      <button type="button" id="gray_issue_add_btn" value="<?php echo $sl; ?>" name="gray_issue_add_btn" onclick="view_standard_select_pp(this.value);" class="btn btn-primary btn-xs"> View / Add Process Route </button>
                  </td>                   
                </tr>
              </tbody>
            </table>
          </div>
        </div>


        <h2 class="text-center">Copy Process Wise Standard: PP - <?php echo $row['pp_no']; ?></h2>
        <!-- main content again -->
        <div class="clearfix"></div>
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">

            <div class="x_panel">
              <div class="x_title">
                <h2>Select Copy PP Version Information </h2>
                <ul class="nav navbar-right panel_toolbox">
                  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                  </li>
                </ul>
                <div class="clearfix"></div>
              </div>
              <div class="x_content">

                  <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                    <label class="control-label col-md-2 col-sm-3 col-xs-12" for="customers">Customer <span class="required">*</span>
                    </label>
                    <input type="hidden" id="copy_for_this_pp_id" name="copy_for_this_pp_id" value="">
                    <input type="hidden" id="pp_no_id" name="pp_no_id" value="<?php echo $pp_no_id ; ?>">
                    <div class="col-md-4 col-sm-6 col-xs-12">
                      <select id="customers_model" name="customers_model" class="model_action select2 pp_number form-control col-md-12 col-xs-12" onchange="">
                        <option value="" selected="selected">Select Customer</option>
                        <?php
                          $customers_sql = "SELECT *  FROM customers";
                          $customers_res = mysqli_query($con, $customers_sql) or die(mysqli_error($con));
                          while ($customers_row = mysqli_fetch_assoc($customers_res)) 
                          {
                              echo "<option value='".$customers_row['customers_id']."'>";
                              echo $customers_row['customers_name'];
                              echo "</option>";
                          }
                        ?>
                      </select>
                    </div>
                  </div>

                  <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                    <label class="control-label col-md-2 col-sm-3 col-xs-12">Design <span class="required">*</span>
                    </label>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                      <select id="design_id" name="design_id" class="model_action design_id select2 form-control col-md-12 col-xs-12">
                        <option value="" selected="selected">Select Design</option>
                      </select>
                    </div>
                  </div>

                  <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                    <label class="control-label col-md-2 col-sm-3 col-xs-12">Version <span class="required">*</span>
                    </label>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                      <select id="version_id" name="version_id" class="model_action select2 version_id form-control col-md-12 col-xs-12">
                        <option value="" selected="selected">Select Version</option>
                      </select>
                    </div>
                  </div>


                  <!-- main content again -->
                  <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12" id="model_retrieve_general_data">
                    </div>
                  </div>
                  <!-- main content again finished -->

                  <!-- <div class="ln_solid"></div> -->
                  <div class="form-group" style="padding-left: 7px;">
                    <div class="col-md-12 col-sm-12 col-xs-12 col-md-offset-2">
                      <button type="button" id="retrieve_data_for_all_copy" class="btn btn-success">Copy</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>

          </div>
        </div>
        <!-- main content finished -->
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
                  //alert(data);
                  info_alert("All Data Copied Successfully");
              }
          });
      });
  });
</script>