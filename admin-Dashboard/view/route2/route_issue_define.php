<?php
session_start();
require_once("../includes/db_session_chk.php");
?>

<!DOCTYPE html>
<html lang="en">

<?php
require_once('../includes/header.php');
?>

<!-- Bootstrap -->
<link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Font Awesome -->
<link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
<!-- NProgress -->
<link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
<!-- iCheck -->
<link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
<!-- bootstrap-wysiwyg -->
<link href="../vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">
<!-- Select2 -->
<link href="../vendors/select2/dist/css/select2.min.css" rel="stylesheet">
<!-- Switchery -->
<link href="../vendors/switchery/dist/switchery.min.css" rel="stylesheet">
<!-- starrr -->
<link href="../vendors/starrr/dist/starrr.css" rel="stylesheet">
<!-- bootstrap-daterangepicker -->
<link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

<!-- Custom Theme Style -->
<link href="../build/css/custom.min.css" rel="stylesheet">

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

  <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="../vendors/moment/min/moment.min.js"></script>
    <script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap-wysiwyg -->
    <script src="../vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
    <script src="../vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
    <script src="../vendors/google-code-prettify/src/prettify.js"></script>
    <!-- jQuery Tags Input -->
    <script src="../vendors/jquery.tagsinput/src/jquery.tagsinput.js"></script>
    <!-- Switchery -->
    <script src="../vendors/switchery/dist/switchery.min.js"></script>
    <!-- Select2 -->
    <script src="../vendors/select2/dist/js/select2.full.min.js"></script>
    <!-- Parsley -->
    <script src="../vendors/parsleyjs/dist/parsley.min.js"></script>
    <!-- Autosize -->
    <script src="../vendors/autosize/dist/autosize.min.js"></script>
    <!-- jQuery autocomplete -->
    <script src="../vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
    <!-- starrr -->
    <script src="../vendors/starrr/dist/starrr.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>

  <script type="text/javascript">
    $(function () 
    {
        //Initialize Select2 Elements
        $('.select2').select2();
    });

    $(document).ready(function()
    {
        $('#retrieve_data').click(function()
        {
            var pp_no_id = document.getElementById("pp_no_id").value;
            var pp_version = document.getElementById("pp_version").value;
            //var formdata = new FormData(document.getElementById("define-standard-form"));

            $.ajax(
            {
                type: "POST",
                url: "route_issue_process.php",
                method: "POST",
                data: 
                {
                  pp_no_id: pp_no_id, 
                  pp_version: pp_version
                },
                success:function(data)
                {
                    $('#retrieve_general_data').html(data);
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

<script type="text/javascript">
  var counter = 1;
  var name_counter = 1;
  var get_select = '';

  function addCounter()
  {
    counter = parseInt(counter) + 1;
    name_counter = parseInt(name_counter) + 1;
    document.getElementById('row-counter').value = counter;
    document.getElementById('row-name-counter').value = name_counter;
  }

  function removeCounter()
  {
    counter = parseInt(counter) - 1;
    document.getElementById('row-counter').value = counter;
  }

  //function to initialize select2
  function initializeSelect2(selectElementObj) 
  {
    selectElementObj.select2(
    {
      width: "100%",
      tags: true
    });
  }

  function add_new_route()
  {
      addCounter();
      $.ajax({  
      url:"routesearch.php",  
      method:"POST",  
      dataType: "text",  
      success:function(data)  
      {

        var dynamically_created_dropzone = $('<div class="full_row col-md-12 col-sm-12 col-xs-12" id="'+counter+'">'
                                            +'<div class="col-md-5 col-sm-5 col-xs-4">'
                                            +'<select id="route'+name_counter+'" name="route'+name_counter+'" class="version-route select2 form-control col-md-12 col-xs-12">'
                                            +'<option value="" selected="selected">Select Route</option>'
                                            +data
                                            +'</select>'
                                            +'</div>'
                                            +'<div class="col-md-5 col-sm-5 col-xs-4">'
                                            +'<select id="process'+name_counter+'" name="process'+name_counter+'" class="version-process select2 form-control col-md-12 col-xs-12">'
                                            +'<option value="process" selected="selected">Process</option>'
                                            +'<option value="reprocess">Reprocess</option>'
                                            +'</select>'
                                            +'</div>'
                                            +'<div class="col-md-1 col-sm-1 col-xs-4">'
                                            +' <input id="process_number'+name_counter+'" value="" name="process_number'+name_counter+'" placeholder="Number" class="version-number date-picker form-control col-md-12 col-xs-12" type="text">'
                                            +'</div>'
                                            +'<div class="col-md-1 col-sm-1 col-xs-2">'
                                            +' <button type="button" class="btn-xs btn-danger btn_remove" id="'+counter+'" onclick="rmv_row(this.id);">X</button>'
                                            +'</div>'
                                            +'</div>');

        $("#new_dropzone_section_version").append(dynamically_created_dropzone);
        get_select = $('.select2');
        initializeSelect2(get_select);

      }

    });
  }

  function on_submit_for_route_issue_data()
  {
      var row_counter = document.getElementById("row-counter").value;
      var name_counter = document.getElementById("row-name-counter").value;

      for (var i = 0; i < row_counter; i++) 
      {
        if(document.getElementsByClassName("version-route")[i].value == "")
        {
            missing_alert_for_class("version-route", i);
            return false;
        }

        if(document.getElementsByClassName("version-number")[i].value == "")
        {
            missing_alert_for_class("version-number", i);
            return false;
        }
      }

      var formdata = new FormData(document.getElementById('route_selected_form'));
      for (var i = 1; i <= 20; i++) 
      {
          if(document.getElementsByName("process_number"+i)[0])
          {
              formdata.append('route'+i,document.getElementsByName("route"+i)[0].value);
              formdata.append('process'+i,document.getElementsByName("process"+i)[0].value);
              formdata.append('process_number'+i,document.getElementsByName("process_number"+i)[0].value);
          }
      }

      $.ajax(
      {
        type: "POST",
        url: "route_selection_for_version_saving.php",
        data: formdata,
        processData: false,
        contentType: false,
        error: function(jqXHR, textStatus, errorMessage) 
        {
            alert(errorMessage);
        },
        success: function(data) 
        {
            // if (data == "Duplicate Process Number")
            // {
            //   info_alert("Duplicate Process Number");
            // }
            // else if (data == "Not insert new pp details")
            // {
            //   info_alert("Data not insert in Database");
            // }
            // else
            // {
            //   //var pp_id_number = document.getElementById("pp_no_id").value;
            //   success_alert("All Data Update Successfully", "../route/route_issue_define.php");
            // }

            alert(data);
              
        } 
      });
  }

 $(document).ready(function() 
 {
    $(function () 
    {
      //Initialize Select2 Elements
      $('.select2').select2();
    });

    //onload: call the above function

    $(".select2").each(function() 
    {
      initializeSelect2($(this));
    });

  });

  function rmv_row(counter_id)
  {
      alert(counter_id);
      $("#"+counter_id).remove();
      removeCounter();
  }

  </script>
</body>
</html>