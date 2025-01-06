<?php
session_start();
require_once("../includes/db_session_chk.php");
$pp_no_id = $_POST['pp_no_id'];
$pp_details_id = $_POST['pp_details_id'];
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
                        <li>Process Program</li>
                        <li><a href="pp_monitoring.php">PP Monitoring</a></li>
                        <li>PP (Process Program) View Form</li>

                        <li>Define PP Version Standard</li>
                    </ol>
                  </div>
                </div>

                <!-- main content again -->
                <div class="clearfix"></div>
                <div class="row">
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                      <div class="x_title">
                        <h2>Define Process against PP No. </h2>
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
                              <?php 
                                  $pp_sql = "SELECT * FROM pp WHERE pp_id = '$pp_no_id'";
                                  $pp_res = mysqli_query($con, $pp_sql) or die(mysqli_error($con));
                                  $pp_row = mysqli_fetch_assoc($pp_res);
                              ?>
                              <input id="pp_no" readonly name="pp_no" value="<?php echo $pp_row['pp_no']; ?>" class="form-control col-md-12 col-xs-12" type="text">
                              <input id="pp_no_id" readonly name="pp_no_id" value="<?php echo $pp_no_id; ?>" class="form-control col-md-12 col-xs-12" type="hidden">
                            </div>
                          </div>
                          <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                            <label class="control-label col-md-2 col-sm-3 col-xs-12" for="customer">PP Version <span class="required">*</span>
                            </label>
                            <div class="col-md-4 col-sm-6 col-xs-12">
                              <?php 
                                  $pp_details_sql = "SELECT * FROM pp_details WHERE pp_id = '$pp_details_id'";
                                  $pp_details_res = mysqli_query($con, $pp_details_sql) or die(mysqli_error($con));
                                  $pp_details_row = mysqli_fetch_assoc($pp_details_res);
                              ?>
                              <input id="pp_version" readonly name="pp_version" value="<?php echo $pp_details_row['version']; ?>" class="form-control col-md-12 col-xs-12" type="text">
                              <input id="pp_details_id" readonly name="pp_details_id" value="<?php echo $pp_details_id; ?>" class="form-control col-md-12 col-xs-12" type="hidden">
                            </div>
                          </div>
                          <!-- <div class="ln_solid"></div> -->
                          <!-- <div class="form-group" style="padding-left: 7px;">
                            <div class="col-md-12 col-sm-12 col-xs-12 col-md-offset-2">
                              <button type="button" disabled class="btn btn-success">Search</button>
                            </div>
                          </div> -->
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

                <!-- another content again -->
                <div class="row">
                  <div class="col-md-12 col-sm-12 col-xs-12" id="retrieve_details_data">
                  </div>
                </div>
                <!-- another content finished -->


                <!-- another content again -->
                <div class="row">
                  <div class="col-md-12 col-sm-12 col-xs-12" id="retrieve_process_details">
                  </div>
                </div>
                <!-- another content finished -->

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

    $(document).ready(function()
    {
        var pp_no_id = document.getElementById("pp_no_id").value;
        var pp_details_id = document.getElementById("pp_details_id").value;

        $.ajax(
        {
            type: "POST",
            url: "show_details_of_pp_version.php",
            method: "POST",
            data: 
            {
              pp_no_id: pp_no_id, 
              pp_version: pp_details_id
            },
            success:function(data)
            {
                $('#retrieve_general_data').html(data);
                $('#retrieve_details_data').html("");
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
      var row_name_counter = document.getElementById("row-name-counter").value;

      alert(row_counter);
      alert(row_name_counter);

      for (var i = 0; i < row_name_counter; i++) 
      {
          if(document.getElementsByClassName("version-route")[i])
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
            counter = 1;
            name_counter = 1;
            var pp_no_id = document.getElementById("pp_no_id_add").value;
            var pp_version = document.getElementById("pp_version_add").value;
            //var greige_issunce_id = document.getElementById("greige_issunce_id_add").value;

            $.ajax(
            {
                url: "route_issue_process.php",
                method: "POST",
                data: {pp_no_id: pp_no_id, pp_version: pp_version},
                success:function(data)
                {
                    $('#retrieve_details_data').html(data);
                }
            }); 
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

  function view_standard_select(serial)
  {
      var pp_no_id = document.getElementById("pp_no_id_"+serial).value;
      var pp_version = document.getElementById("pp_version_"+serial).value;

      $.ajax(
      {
          url: "route_issue_process.php",
          method: "POST",
          data: {pp_no_id: pp_no_id, pp_version: pp_version, work: 1},
          success:function(data)
          {
              $('#retrieve_details_data').html(data);
          }
      });
  }

  function edit_route_standard_select(serial)
  {
      var pp_no_id = document.getElementById("pp_no_id_"+serial).value;
      var pp_version = document.getElementById("pp_version_"+serial).value;

      $.ajax(
      {
          url: "route_issue_process.php",
          method: "POST",
          data: {pp_no_id: pp_no_id, pp_version: pp_version, work: 2},
          success:function(data)
          {
              $('#retrieve_details_data').html(data);
          }
      });
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

  </script>

  <!-- route issue main edit part -->
  <script type="text/javascript">

      var counter = "";
      var name_counter = "";
      var get_select = '';

      function addCounter()
      {
          if(counter == "" && name_counter == "")
          {
              counter = parseInt(document.getElementById('database_row_count').value);
              name_counter = parseInt(document.getElementById('database_row_count').value);
          }
          counter = parseInt(counter) + 1;
          name_counter = parseInt(name_counter) + 1;
          document.getElementById('row-counter').value = counter;
          document.getElementById('row-name-counter').value = name_counter;
      }

      function removeCounter()
      {
          if(counter == "")
          {
              counter = parseInt(document.getElementById('database_row_count').value);
              name_counter = parseInt(document.getElementById('database_row_count').value);
          }
          counter = parseInt(counter) - 1;
          name_counter = parseInt(name_counter);
          document.getElementById('row-counter').value = counter;
          document.getElementById('row-name-counter').value = name_counter;
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


      //dynamically added selects
      function addnewroute(serial) 
      {
          addCounter();
          $.ajax(
          {  
              url:"routeprocessselect.php",
              method:"POST", 
              data: {serial: serial}, 
              dataType: "text",  
              success:function(data)  
              {

                  var dynamically_created_dropzone = $('<div class="full_row col-md-12 col-sm-12 col-xs-12" id="'+counter+'">'
                                                      +'<div class="col-md-5 col-sm-5 col-xs-4">'
                                                      +'<select id="route'+name_counter+'" name="route'+name_counter+'" class="version-route select2 form-control col-md-12 col-xs-12">'
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
                                                      +' <button type="button" class="btn-xs btn-danger btn_remove" id="'+counter+'" onclick="rmv_row_for_edit(this.id);">X</button>'
                                                      +'</div>'
                                                      +'</div>');

                  $("#new_dropzone_section_version").append(dynamically_created_dropzone);
                  get_select = $('.select2');
                  initializeSelect2(get_select);

              }

          });

      }


      function rmv_row_for_edit(counter_id)
      {
          $("#"+counter_id).remove();
          removeCounter();
      }
          
      function update_route_data()
      {
          var name_counter = parseInt(document.getElementById("row-name-counter").value);
          var row_counter = parseInt(document.getElementById("row-counter").value);

          for (var i = 0; i < row_counter; i++) 
          {
              if(document.getElementsByClassName("version-route")[i].value == "")
              {
                  missing_alert_for_class("version-route", i);
                  return false;
              }

              if(document.getElementsByClassName("version-process")[i].value == "")
              {
                  missing_alert_for_class("version-process", i);
                  return false;
              }

              if(document.getElementsByClassName("version-number")[i].value == "")
              {
                  missing_alert_for_class("version-number", i);
                  return false;
              }
          }

          var formdata = new FormData(document.getElementById('route_selected_form'));
          for (var i = 1; i < name_counter; i++) 
          {
              if(document.getElementsByName("process"+i)[0])
              {
                  formdata.append('route'+i,document.getElementsByName("route"+i)[0].value);
                  formdata.append('process'+i,document.getElementsByName("process"+i)[0].value);
                  formdata.append('process_number'+i,document.getElementsByName("process_number"+i)[0].value);
                  if (document.getElementsByName("complete"+i)[0]) 
                  {
                      formdata.append('complete'+i,document.getElementsByName("complete"+i)[0].value);
                  }

                  else
                  {
                      formdata.append('complete'+i, 0);
                  }
                  
              }
              
          }



          $.ajax(
          {
              type: "POST",
              url: "edit_route_selection_for_greige_saving.php",
              data: formdata,
              processData: false,
              contentType: false,
              error: function(jqXHR, textStatus, errorMessage) 
              {
                  alert(errorMessage);
              },
              success: function(data) 
              {
                  counter = 1;
                  name_counter = 1;
                  //info_alert(data);
                  if (data == "Duplicate Process Number")
                  {
                    info_alert("Duplicate Process Number");
                  }
                  else if (data == "Not insert new pp details")
                  {
                    info_alert("Data not insert in Database");
                  }
                  else
                  {
                      //alert(data);
                      var pp_no_id = document.getElementById("pp_no_id").value;
                      var pp_version = document.getElementById("pp_details_id").value;
                      $.ajax(
                      {
                            type: "POST",
                            url: "show_details_of_pp_version.php",
                            method: "POST",
                            data: 
                            {
                              pp_no_id: pp_no_id, 
                              pp_version: pp_version
                            },
                            success:function(data)
                            {
                                $.ajax(
                                {
                                    url: "route_issue_process.php",
                                    method: "POST",
                                    data: {pp_no_id: pp_no_id, pp_version: pp_version, work: 1},
                                    success:function(data)
                                    {
                                        $('#retrieve_details_data').html(data);
                                    }
                                });
                                // $('#retrieve_general_data').html(data);
                                // $('#retrieve_route_data').html("");
                            }
                      });

                  }
              } 
          });
            
      }
  </script>




</body>
</html>