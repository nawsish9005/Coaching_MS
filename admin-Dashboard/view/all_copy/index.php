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
                        <li>Copy From Old PP Version</li>
                    </ol>
                  </div>
                </div>

                <!-- main content again -->
                <div class="clearfix"></div>
                <div class="row">
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                      <div class="x_title">
                        <h2>Select PP No. </h2>
                        <ul class="nav navbar-right panel_toolbox">
                          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                          </li>
                        </ul>
                        <div class="clearfix"></div>
                      </div>
                      <div class="x_content">
                        <form id="define-standard-form" action="" method="" data-parsley-validate class="form-horizontal form-label-left">
                          <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                            <label class="control-label col-md-2 col-sm-3 col-xs-12" for="customer">PP Number <span class="required">*</span>
                            </label>
                            <div class="col-md-4 col-sm-6 col-xs-12">
                              <select id="pp_no_id" name="pp_no_id" class="action select2 pp_number form-control col-md-12 col-xs-12" onchange="">
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

                      </div>
                    </div>

                    <div class="x_panel">
                      <div class="x_title">
                        <h2>Select Copy PP Version </h2>
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
                              <button type="button" id="retrieve_data_for_all_copy" class="btn btn-success">Search</button>
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


<script>
    $(function ()
  {
      $('.select2').select2();
  });

  $(document).ready(function()
  {

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
                  url:"sql_model.php",
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
                  info_alert(data);
              }
          });
      });
  });



</script>

</body>
</html>
