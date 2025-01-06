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
                        <li>Route Issuance</li>
                    </ol>
                  </div>
                </div>

                <!-- main content again -->
                <div class="clearfix"></div>
                <div class="row">
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                      <div class="x_title">
                        <h2>Define Route Issunace against PP No. </h2>
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
                          <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                            <label class="control-label col-md-2 col-sm-3 col-xs-12" for="customer">PP Version <span class="required">*</span>
                            </label>
                            <div class="col-md-4 col-sm-6 col-xs-12">
                              <select id="pp_version" name="pp_version" class="select2 pp_version form-control col-md-12 col-xs-12">
                                <option value="" selected="selected">Select PP Version</option>
                              </select> 
                            </div>
                          </div>
                          <!-- <div class="ln_solid"></div> -->
                          <div class="form-group" style="padding-left: 7px;">
                            <div class="col-md-12 col-sm-12 col-xs-12 col-md-offset-2">
                              <button type="button" id="retrieve_data" class="btn btn-success">Submit</button>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>      
                </div>
                <!-- main content finished -->

                <!-- main content again -->
                <div class="row">
                  <div class="col-md-12 col-sm-12 col-xs-12" id="retrieve_general_data">
                  </div>
                </div>
                <!-- main content again finished -->

                <!-- main content again -->
                <div class="row">
                  <div class="col-md-12 col-sm-12 col-xs-12" id="retrieve_route_data">
                  </div>
                </div>
                <!-- main content again finished -->

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

    <!-- Custom JS for Edit Route Issue -->
    <script src="editrouteissue.js"></script>

    <script type="text/javascript">
      $(function () 
      {
          //Initialize Select2 Elements
          $('.select2').select2();
      });

      function editroute(serial)
      {

        var greige_issunce_id = parseInt(document.getElementsByName("greige_issunce_id_for_edit")[serial-1].value);
        var pp_no_id = document.getElementById("pp_no_id").value;
        var pp_details_id = document.getElementById("pp_details_id").value;
        var route_issue_id = document.getElementById("route_issue_id").value;

        $.ajax(
        {
            type: "POST",
            url: "edit_route_issue_for_greige.php",
            method: "POST",
            data: 
            {
              pp_no_id: pp_no_id, 
              pp_details_id: pp_details_id,
              greige_issunce_id: greige_issunce_id,
              route_issue_id: route_issue_id
            },
            success:function(data)
            {
                $('#retrieve_route_data').html(data);
                $('#retrieve_route_data').show();
            }
        });
      }

      function viewroute(serial)
      {

        var greige_issunce_id = parseInt(document.getElementsByName("greige_issunce_id_for_edit")[serial-1].value);
        var pp_no_id = document.getElementById("pp_no_id").value;
        var pp_details_id = document.getElementById("pp_details_id").value;
        var route_issue_id = document.getElementById("route_issue_id").value;

        $.ajax(
        {
            type: "POST",
            url: "view_route_issue_for_greige.php",
            method: "POST",
            data: 
            {
              pp_no_id: pp_no_id, 
              pp_details_id: pp_details_id,
              greige_issunce_id: greige_issunce_id,
              route_issue_id: route_issue_id
            },
            success:function(data)
            {
                $('#retrieve_route_data').html(data);
                $('#retrieve_route_data').show();
            }
        });
      }

    </script>

    <script type="text/javascript">

      $(document).ready(function()
      {
          $('#retrieve_data').click(function()
          {
              var pp_no_id = document.getElementById("pp_no_id").value;
              var pp_version = document.getElementById("pp_version").value;
              //var formdata = new FormData(document.getElementById("define-standard-form"));
              //alert(formdata);

              $.ajax(
              {
                  type: "POST",
                  url: "define_route_issue.php",
                  method: "POST",
                  data: 
                  {
                    pp_no_id: pp_no_id, 
                    pp_version: pp_version
                  },
                  success:function(data)
                  {
                      $('#retrieve_general_data').html(data);
                      $('#retrieve_route_data').html("");
                  }
              });
          });

          $('.action').change(function()
          {
              if($(this).val() != '')
              {
                  var action = $(this).attr("id");
                  var query = $(this).val();
                  var result = '';

                  if(action == "pp_no_id")
                  {
                      result = 'pp_version';
                  }
                  // else if (action == "version")
                  // {
                  //  result = 'color';
                  // }
                  // else
                  // {
                  //  result = 'gray_width';
                  // }
                  $.ajax(
                  {
                      url:"sql.php",
                      method:"POST",
                      data:{action:action, query:query},
                      success:function(data)
                      {
                          $('#'+result).html(data);
                      }
                  });
              }
          });
      });

  </script>
</body>
</html>