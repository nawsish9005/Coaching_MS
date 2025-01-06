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
                        <li>Process Program</li>
                        <li>Adding Process to Version</li>
                    </ol>
                  </div>
                </div>

                <!-- main content again -->
                <div class="clearfix"></div>
                <div class="row">
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                      <div class="x_title">
                        <h2>Adding Process to Version </h2>
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
                              <select id="pp_no_id" name="pp_no_id" class="action select2 pp_number action_desc form-control col-md-12 col-xs-12" onchange="add_desc()">
                                <option value="" selected="selected">Select PP Number</option>
                                <?php
                                  $pp_sql = "SELECT pp_no, pp_id FROM pp ORDER BY pp_id DESC";
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

                            <div class="col-md-6 col-sm-4 col-xs-12" id="pp_desc" style="display:none">
                               
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

                          <!-- <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                            <label class="control-label col-md-2 col-sm-3 col-xs-12" for="customer">Standard <span class="required">*</span>
                            </label>
                            <div class="col-md-4 col-sm-6 col-xs-12">
                              <select id="pp_version_standard" name="pp_version_standard" class="pp_version_standard select2 pp_number form-control col-md-12 col-xs-12">
                                <option value="" selected="selected">Select Standard</option>
                                <option value="2" >Singe & Desize Process Standard</option>
                                <option value="3" >Bleaching Standard</option>
                                <option value="4" >Ready For Mercerize</option>
                                <option value="5" >Mercerize</option>
                                <option value="6" >Equalize</option>
                                <option value="7" >Printing</option>
                                <option value="8" >Curing</option>
                                <option value="9" >Finishing</option>
                                <option value="10" >Scouring & Bleaching</option>
                                <option value="11" >Scouring </option>
                                <option value="12" >Washing </option>
                                <option value="13" >Calendering </option>
                                <option value="14" >Sanforizing </option>
                                <option value="15" >Raising </option>
                                <option value="16" >Ready for Raising </option>
                                <option value="17" >Ready for Print </option>
                                <option value="18" >Ready for Dying </option>
                              </select> 
                            </div>
                          </div> -->

                          <!-- <div class="ln_solid"></div> -->
                          <div class="form-group" style="padding-left: 7px;">
                            <div class="col-md-12 col-sm-12 col-xs-12 col-md-offset-2">
                              <button type="button" id="retrieve_data" class="btn btn-success">Search</button>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>      
                </div>
                <!-- main content finished -->

                <div id="retrieve_general_data">
                </div>

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

  function add_desc()
  {
     var pp_desc= document.getElementById("pp_desc");
     pp_desc.style.display='block';
  }


  function initializeSelect2(selectElementObj) 
  {
    selectElementObj.select2(
    {
      width: "100%",
      tags: true
    });
  }

  $(function () 
  {
      //Initialize Select2 Elements
      $('.select2').select2();
  });

 

  $(document).ready(function()
  {

      $(function () 
      {
          //Initialize Select2 Elements
          $('.select2').select2();
      });


      $('#retrieve_data').click(function()
      {
          var pp_no_id = document.getElementById("pp_no_id").value;
          var pp_version = document.getElementById("pp_version").value;
          //var pp_version_standard = document.getElementById("pp_version_standard").value;

          //var formdata = new FormData(document.getElementById("define-standard-form"));
          //alert(formdata);

          $.ajax(
          {
              type: "POST",
              url: "route_issue_process.php",
              method: "POST",
              data: 
              {
                pp_no_id: pp_no_id, 
                pp_version: pp_version,
                work: '1'
              },
              success:function(data)
              {
                  $('#retrieve_general_data').html(data);
                  //$('select#pp_version_standard_model').val(pp_version_standard);
                  $('#others_retrieve_general_data').html("");
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


      $('.action_desc').change(function()
      {
          if($(this).val() != '')
          {
              var action = $(this).attr("id");
              var query = $(this).val();
              var result = '';
              
              if(action == "pp_no_id")
              {
                  result = 'pp_desc';
              }

              $.ajax(
              {
                  url:"sql_desc.php",
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


      //for new data saving 

      function on_submit_for_route_issue_data()
      {
          var row_counter = document.getElementById("row-counter").value;
          var row_name_counter = document.getElementById("row-name-counter").value;

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
                    data: {pp_no_id: pp_no_id, pp_version: pp_version, work: '1'},
                    success:function(data)
                    {
                        $('#retrieve_general_data').html(data);
                    }
                }); 
             } 
          });
      }
  </script>


</body>
</html>