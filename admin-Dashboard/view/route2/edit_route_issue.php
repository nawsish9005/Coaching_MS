<?php
session_start();
require_once("../includes/db_session_chk.php");
$greige_issunce_id = $_POST['greige_issunce_id'];
$pp_no_id = $_POST['pp_no_id'];
$pp_details_id = $_POST['pp_details_id'];
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
                              <th>Version</th>
                              <th>Color</th>
                              <th>Gray Width</th>
                              <th>Quantity</th>
                              <th>Yarn Warp</th>
                              <th>Yarn Weft</th>
                              <th>Thread EPI</th>
                              <th>Thread PPI</th>
                              <th>Fiber Warp</th>
                              <th>Fiber Weft</th>
                              <th>GSM</th>
                              <th>Width</th>
                              <th>Composition</th>
                            </tr>
                          </thead>
                          
                          <tbody>
                            <?php 
                              $sql_for_gray_issue = "SELECT p.pp_id, 
                                                    p.pp_no,
                                                    p.issue_date,
                                                    p.customers,
                                                    p.construction,
                                                    p.week,
                                                    p.design,
                                                    customers.customers_id,
                                                    customers.customers_name,
                                                    details.pp_no_id,
                                                    details.version,
                                                    details.color,
                                                    c.color_id,
                                                    c.color_name,
                                                    details.gray_width,
                                                    details.finish_width,
                                                    details.quantity,
                                                    gi.*


                                             FROM pp AS p, pp_details AS details, customers AS customers, color AS c, greige_issunce AS gi

                                             WHERE p.pp_id = '$pp_no_id'
                                             AND details.id = '$pp_details_id'
                                             AND details.pp_no_id = '$pp_no_id'
                                             AND gi.greige_issunce_id = '$greige_issunce_id'
                                             AND p.pp_id = details.pp_no_id
                                             AND p.customers = customers.customers_id
                                             AND details.color = c.color_id";

                              $res_for_gray_issue = mysqli_query($con, $sql_for_gray_issue);

                              $row = mysqli_fetch_array($res_for_gray_issue)
                            ?>
                            <tr>
                              <td>1</td>
                              <td><?php echo $row['pp_no'] ?></td>
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
                              <td><?php echo $row['received_quantity'] ?></td>
                              <td><?php echo $row['yarn_warp'] ?></td>
                              <td><?php echo $row['yarn_weft'] ?></td>
                              <td><?php echo $row['thread_epi'] ?></td>
                              <td><?php echo $row['thread_ppi'] ?></td>
                              <td><?php echo $row['fiber_warp'] ?></td>
                              <td><?php echo $row['fiber_weft'] ?></td>
                              <td><?php echo $row['gsm'] ?></td>
                              <td><?php echo $row['width'] ?></td>
                              <td><?php echo $row['composition'] ?></td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- select route area -->
                <!-- main content again -->
                <div class="clearfix"></div>
                <div class="row">
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                      <div class="x_title">
                        <h2>Edit Route Selection Form</h2>
                        <ul class="nav navbar-right panel_toolbox">
                          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                          </li>
                        </ul>
                        <div class="clearfix"></div>
                      </div>

                      <?php 
                        $pp_details_sql = "SELECT 
                                                *
                                           FROM
                                                route_issue
                                           WHERE
                                                greige_issunce_id = '$greige_issunce_id'

                                           ORDER BY process_number ASC
                                          ";
                        $pp_details_res = mysqli_query($con, $pp_details_sql) or die(mysqli_error($con));
                        $number_row = mysqli_num_rows($pp_details_res);
                      ?>

                      <div class="x_content">
                        <div class="col-md-12 center-margin">
                          <form id="route_selected_form" name="route_selected_form" data-parsley-validate class="form-horizontal form-label-left">
                            <div>
                                <input type="hidden" id="database_row" name="database_row" value="<?php echo $number_row; ?>">
                                <input type="hidden" value="<?php echo $number_row; ?>" id="row-counter" name="row-counter" class="form-control col-md-7 col-xs-12">
                                <input type="hidden" value="<?php echo $greige_issunce_id; ?>" id="greige_issunce_id" name="greige_issunce_id" class="form-control col-md-7 col-xs-12">
                                <input type="hidden" value="<?php echo $pp_no_id ?>" id="pp_no_id" name="pp_no_id" class="form-control col-md-7 col-xs-12">
                                <input type="hidden" value="<?php echo $pp_details_id ?>" id="pp_details_id" name="pp_details_id" class="form-control col-md-7 col-xs-12">
                                <input type="hidden" value="<?php echo $row['pp_no'] ?>" id="pp_no" name="pp_no" class="form-control col-md-7 col-xs-12">
                                <input type="hidden" value="<?php echo $number_row; ?>" id="row-name-counter" name="row-name-counter" class="form-control col-md-7 col-xs-12">
                            </div>
                            <?php 
                              $gray_issue_details_sql = "SELECT 
                                                      *
                                                 FROM
                                                      greige_issunce
                                                 WHERE
                                                      greige_issunce_id = '$greige_issunce_id'

                                                 ORDER BY greige_issunce_id ASC
                                                ";
                              $gray_issue_details_res = mysqli_query($con, $gray_issue_details_sql) or die(mysqli_error($con));
                              $gray_issue_row = mysqli_fetch_assoc($gray_issue_details_res);
                            ?>
                            <div class="form-group">
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <p>
                                   Active :
                                  <input type="radio" class="flat" name="active" id="active" value="1" <?php if($gray_issue_row['active']=='1') echo "checked"; ?>/> 

                                   Not Active :
                                  <input type="radio" class="flat" name="active" id="notactive" value="0" <?php if($gray_issue_row['active']=='0') echo "checked"; ?> />
                                </p>
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="control-label" for="version">Route Selection <span class="required">*</span>
                              </label>
                              <?php 
                                $i = 1;
                                  while ($pp_details_row = mysqli_fetch_assoc($pp_details_res)) 
                                  {
                              ?>
                                <div class="full_row col-md-12 col-sm-12 col-xs-12" id="<?php echo $i; ?>">
                                  <div class="col-md-5 col-sm-5 col-xs-4">
                                    <select id="<?php echo "route".$i; ?>" name="<?php echo "route".$i; ?>" class="version-route select2 form-control col-md-12 col-xs-12">
                                      <option value="" selected="selected">Select Route</option>
                                      <?php
                                        $pp_route = $pp_details_row['route'];

                                        $route_sql = "SELECT * FROM route ORDER BY route_name";
                                        $route_res = mysqli_query($con, $route_sql) or die(mysqli_error($con));
                                        while ($route_row = mysqli_fetch_assoc($route_res)) 
                                        {
                                            ?>

                                            <option <?php if($route_row['route_id'] == $pp_route){echo "selected";}?> value="<?php echo $route_row['route_id'];?>"> <?php echo $route_row['route_name'];?></option>

                                            <?php
                                        }
                                      ?>
                                    </select>
                                  </div>

                                  <div class="col-md-5 col-sm-5 col-xs-4">
                                    <select id="<?php echo "process".$i; ?>" name="<?php echo "process".$i; ?>" class="version-process select2 form-control col-md-12 col-xs-12">
                                      <?php 
                                        $process = $pp_details_row['process'];
                                      ?>
                                      <option <?php if($process == 'process') echo"selected" ;?> value="process">Process</option>
                                      <option value="reprocess" <?php if($process == 'reprocess') echo"selected";?> >Reprocess</option>
                                    </select>
                                  </div>

                                  <div class="col-md-1 col-sm-1 col-xs-4">
                                    <input id="<?php echo "process_number".$i; ?>" name="<?php echo "process_number".$i; ?>" value="<?php echo $pp_details_row['process_number'] ?>" value="1" placeholder="Number" class="version-number form-control col-md-12 col-xs-12" type="text">
                                  </div>

                                  <?php 
                                    if ($i !== 1) 
                                    {
                                      ?>
                                        <div class="col-md-1 col-sm-1 col-xs-2">
                                          <button type="button" class="btn-xs btn-danger btn_remove" id="<?php echo ($i); ?>" onclick="rmv_row(this.id);">X</button>
                                        </div>
                                      <?php
                                    }
                                  ?>
                                </div>
                              <?php 
                                ++$i;
                              }
                              ?>

                              <div id="new_dropzone_section_version">
                              </div>

                            </div>

                            <button type='button' class="btn-xs btn-success" id='add_route_btn' value='' style="margin-top: 3px;" onclick="">Add Route</button>
                            
                            <div class="ln_solid"></div>
                            <div class="form-group">
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <button type="button" name="submit" id="submit" class="btn btn-success">Submit</button>
                              </div>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- main content finished -->
                <!-- done select route area -->
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
    var counter = parseInt(document.getElementById('database_row').value);
    var name_counter = parseInt(document.getElementById('database_row').value);
    var get_select = '';
    // $(document).ready(function() 
    // {
        // $(function () 
        // {
        //     //Initialize Select2 Elements
        //     //$('.select2').select2();
        // });

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

          //onload: call the above function 
          $(".select2").each(function() 
          {
            initializeSelect2($(this));
          });

          //dynamically added selects
          $("#add_route_btn").on("click", function() 
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

          });


  function rmv_row(counter_id)
  {
      alert(counter_id);
      $("#"+counter_id).remove();
      removeCounter();
  }


  $(document).ready(function() 
  { 
      $('#myDatepicker2').datetimepicker(
      {
        format: 'DD.MM.YYYY'
      });

      $('#submit').click(function()
      {
        var name_counter = document.getElementById("row-name-counter").value;
        var row_counter = document.getElementById("row-counter").value;
        alert(row_counter);

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



        // var output = '';
        // for (var property in formdata) {
        //   output += property + ': ' + formdata[property]+'; ';
        // }
        
        // for (var key of formdata.keys()) {
        //    console.log(key); 
        // }
        //var version = document.getElementsByName('version2')[0].value;
        //alert(version);

        //var formdata = new FormData(document.getElementById('route_selected_form'));
        var formdata = new FormData(document.getElementById('route_selected_form'));
        for (var i = 1; i <= name_counter; i++) 
        {
            if(document.getElementsByName("process"+i)[0])
            {
                formdata.append('route'+i,document.getElementsByName("route"+i)[0].value);
                formdata.append('process'+i,document.getElementsByName("process"+i)[0].value);
                formdata.append('process_number'+i,document.getElementsByName("process_number"+i)[0].value);
                //alert(document.getElementsByName("process_number2")[0].value);
            }

            
        }

        $.ajax(
        {
          type: "POST",
          url: "edit_route_selection_saving.php",
          data: formdata,
          processData: false,
          contentType: false,
          error: function(jqXHR, textStatus, errorMessage) 
          {
              alert(errorMessage);
          },
          success: function(data) 
          {
            if (data == "No data found")
            {
              info_alert("Not All Data Found");
            }
            else
            {
              // info_alert("Data Submit Successfully");
              // window.location = "route_issue_list.php";
              var pp_id_number = document.getElementById("pp_no_id").value;
              success_alert("All Data Update Successfully", "../route/route_issue.php?pp_no_id="+pp_id_number);
            }
          } 
        });
          
    });

  });

  </script>
</body>
</html>