<?php
session_start();
require_once("../includes/db_session_chk.php");
?>

<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
<script src="../vendors/custom/jQuery.js"></script>  
<!-- bootstrap-daterangepicker -->
<link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
<!-- bootstrap-datetimepicker -->
<link href="../vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css" rel="stylesheet">
<!-- bootstrap-daterangepicker -->
<script src="../vendors/moment/min/moment.min.js"></script>
<script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- bootstrap-datetimepicker -->    
<script src="../vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
           
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
                        <li><a href="../pp/pp_details_list.php">PP List</a></li>
                        <li>PP Create Form</li>
                    </ol>
                  </div>
                </div>

                <!-- main content again -->
                <div class="clearfix"></div>
                <div class="row">
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                      <div class="x_title">
                        <h2>PP Information (Header)</h2>
                        <ul class="nav navbar-right panel_toolbox">
                          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                          </li>
                        </ul>
                        <div class="clearfix"></div>
                      </div>
                      <div class="x_content">
                        <br />
                        <form id="pp_fixed_data_form" name="pp_fixed_data_form" data-parsley-validate class="form-horizontal form-label-left">

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="pp">Date <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-6">
                              <div class='input-group date' id='myDatepicker2'>
                                <input type='text' class="date_issue form-control" id="custom_date" name="custom_date"/>
                                <span class="input-group-addon">
                                   <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                              </div>
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="pp">PP Number <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="pp" name="pp" class="pp_issue form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="greige_demand">Greige Demand No <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="greige_demand" name="greige_demand" class="greige_demand_issue form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="week">Week (Beginning of Production)
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="week" name="week" class="week_issue form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="design">Design <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="design" name="design" class="design_issue form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="construction_select">Select <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <p>
                                 English:
                                <input type="radio" class="flat" name="construction_select" id="english" value="english" onClick="validateConstruction()" checked/>
                                 Mixed:
                                <input type="radio" class="flat" name="construction_select" id="mixed" value="mixed" onClick="validateConstruction()" />
                              </p>
                            </div>
                          </div>

                          <div id="construction_area">
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="customer">Customer <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <select id="customer" name="customer" class="customer_issue select2 form-control col-md-12 col-xs-12">
                                <option value="" selected="selected">Select Customer</option>
                                <?php
                                  $customers_sql = "SELECT * FROM customers ORDER BY customers_name";
                                  $customers_res = mysqli_query($con, $customers_sql) or die(mysqli_error($con));
                                  while ($customers_row = mysqli_fetch_assoc($customers_res)) 
                                  {
                                      echo "<option value='".$customers_row['customers_id']."'>";
                                      echo $customers_row['customers_name'];
                                      echo "</option>";
                                  }
                                ?>
                              </select>

                              <input type="hidden" value="1" id="row-counter" name="row-counter" class="form-control col-md-7 col-xs-12">
                              <input type="hidden" value="1" id="row-name-counter" name="row-name-counter" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="process">Process <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <select id="process" name="process" class="process_issue select2 form-control col-md-12 col-xs-12">
                                <option value="" selected="selected">Select Process</option>
                                <?php
                                  $process_sql = "SELECT * FROM process ORDER BY process_name";
                                  $process_res = mysqli_query($con, $process_sql) or die(mysqli_error($con));
                                  while ($process_row = mysqli_fetch_assoc($process_res)) 
                                  {
                                      echo "<option value='".$process_row['process_id']."'>";
                                      echo $process_row['process_name'];
                                      echo "</option>";
                                  }
                                ?>
                              </select>
                            </div>
                          </div>
                        <!-- </form> -->
                      </div>
                    </div>
                  </div>
                </div>
                <!-- main content finished -->

                <!-- main content again -->
                <div class="clearfix"></div>
                <div class="row">
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                      <div class="x_title">
                        <h2>PP Version Information (Line)</h2>
                        <ul class="nav navbar-right panel_toolbox">
                          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                          </li>
                        </ul>
                        <div class="clearfix"></div>
                      </div>
                      <div class="x_content">
                        <div class="col-md-12 center-margin">
                          <!-- <form id="pp_multiple_data_send_form" data-parsley-validate class="form-horizontal form-label-left"> -->
                            <div class="form-group">
                              <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="col-md-2 col-sm-2 col-xs-4">
                                  <label class="control-label" for="version">Version <span class="required">*</span>
                                  </label>
                                  <input id="version1" name="version1" placeholder="Version" class="version-class date-picker form-control col-md-12 col-xs-12" type="text">
                                </div>

                                <div class="col-md-2 col-sm-2 col-xs-4">
                                  <label class="control-label" for="color">Color <span class="required">*</span>
                                  </label>
                                  <select id="color1" name="color1" class="version-color select2 form-control col-md-12 col-xs-12">
                                    <option value="" selected="selected">Select Color</option>
                                    <?php
                                      $sql = "SELECT * FROM color ORDER BY color_name";
                                      $res = mysqli_query($con, $sql) or die(mysqli_error($con));
                                      while ($row = mysqli_fetch_assoc($res)) 
                                      {
                                          echo "<option value='".$row['color_id']."'>";
                                          echo $row['color_name'];
                                          echo "</option>";
                                      }
                                    ?>
                                  </select>
                                </div>

                                <div class="col-md-2 col-sm-2 col-xs-4">
                                  <label class="control-label" for="gray_width">Gray Width <span class="required">*</span>
                                  </label>
                                  <input id="gray_width1" name="gray_width1" placeholder="Greige Width" class="version-gray-width form-control col-md-12 col-xs-12" type="text">
                                </div>

                                <div class="col-md-2 col-sm-2 col-xs-4">
                                  <label class="control-label" for="finish_width">Finish Width <span class="required">*</span>
                                  </label>
                                  <input id="finish_width1" name="finish_width1" placeholder="Finish Width" class="version-finish-width form-control col-md-12 col-xs-12" type="text">
                                </div>

                                <div class="col-md-2 col-sm-2 col-xs-4">
                                  <label class="control-label" for="quantity">Order Quantity <span class="required">*</span>
                                  </label>
                                  <input id="quantity1" name="quantity1" placeholder="Order Quantity" class="version-quantity date-picker form-control col-md-12 col-xs-12" type="text">
                                </div>
                              </div>

                              <div id="new_dropzone_section_version">
                              </div>

                            </div>

                            <button type='button' class="btn-xs btn-success" id='add_version_btn' value='' style="margin-top: 3px;" onclick=''>Add Row</button>
                            
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
    var counter = 1;
    var name_counter = 1;
		$(function () 
    {
        //Initialize Select2 Elements
        //$('.select2').select2();
    });

    function addCounter()
    {
      counter = counter + 1;
      name_counter = name_counter + 1;
      document.getElementById('row-counter').value = counter;
      document.getElementById('row-name-counter').value = name_counter;
    }

    function removeCounter()
    {
      counter = counter - 1;
      document.getElementById('row-counter').value = counter;
    }

    function validateConstruction() 
    {
        alert("ok");
        // if(document.getElementById('english').checked == true) 
        // {
        //   var dynamically_created_constraction_zone = $('<div id="for_english">'
        //                                         +'<div class="form-group">'
        //                                         +' <label class="control-label col-md-3 col-sm-3 col-xs-3" for="construction">Construction English <span class="required">*</span> </label>'
        //                                         +' <div class="col-md-6 col-sm-6 col-xs-12">'
        //                                         +'   <input type="text" id="construction" name="construction" class="construction_issue form-control col-md-7 col-xs-12" data-inputmask="mask: 99-9/99-9/99-99">'
        //                                         +' </div>'
        //                                         +' <div class="col-md-2 col-sm-2 col-xs-4">'
        //                                         +'   <select id="con" name="construction_standard" class="construction_standard select2 form-control col-md-12 col-xs-12">'
        //                                         +'     <option value="spi" selected="selected">SPI</option>'
        //                                         +'     <option value="dpi" >DPI</option>'
        //                                         +'   </select>'
        //                                         +' </div>'
        //                                         +'</div>'
        //                                         +'</div>');

        //     $("#construction_area").append(dynamically_created_constraction_zone);
        //    // document.getElementById("for_english").style.visibility = "visible";
        //    // document.getElementById("for_mixed").style.visibility = "hidden";

        //    // document.getElementById("for_english1").style.visibility = "visible";
        //    // document.getElementById("for_mixed1").style.visibility = "hidden";
        // }
        // else if(document.getElementById('mixed').checked == true) 
        // {
        //    // document.getElementById("for_english").style.visibility = "hidden";
        //    // document.getElementById("for_mixed").style.visibility = "visible";

        //    // document.getElementById("for_english1").style.visibility = "hidden";
        //    // document.getElementById("for_mixed1").style.visibility = "visible";
        // }

        // else
        // {
        //     alert("nothing");
        // }
    }

    $(document).ready(function() 
    {
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
      $("#add_version_btn").on("click", function() 
      {
          addCounter();
          $.ajax({  
          url:"colorsearch.php",  
          method:"POST",  
          dataType: "text",  
          success:function(data)  
          {

            var dynamically_created_dropzone = $('<div class="full_row col-md-12 col-sm-12 col-xs-12" id="'+counter+'">'
                                                +'<div class="col-md-2 col-sm-2 col-xs-4">'
                                                +' <input id="version'+name_counter+'" name="version'+name_counter+'" placeholder="Version" class="version-class date-picker form-control col-md-12 col-xs-12" type="text">'
                                                +'</div>'
                                                +'<div class="col-md-2 col-sm-2 col-xs-4">'
                                                +'<select id="color'+name_counter+'" name="color'+name_counter+'" class="version-color select2 form-control col-md-12 col-xs-12">'
                                                +'<option value="" selected="selected">Select Color</option>'
                                                +data
                                                +'</select>'
                                                +'</div>'
                                                +'<div class="col-md-2 col-sm-2 col-xs-4">'
                                                +' <input id="gray_width'+name_counter+'" name="gray_width'+name_counter+'" placeholder="Gray Width" class="version-gray-width form-control col-md-12 col-xs-12" type="text">'
                                                +'</div>'
                                                +'<div class="col-md-2 col-sm-2 col-xs-4">'
                                                +' <input id="finish_width'+name_counter+'" name="finish_width'+name_counter+'" placeholder="Finish Width" class="version-finish-width form-control col-md-12 col-xs-12" type="text">'
                                                +'</div>'
                                                +'<div class="col-md-2 col-sm-2 col-xs-4">'
                                                +' <input id="quantity'+name_counter+'" name="quantity'+name_counter+'" placeholder="Order Quantity" class="version-quantity form-control col-md-12 col-xs-12" type="text">'
                                                +'</div>'
                                                +'<div class="col-md-1 col-sm-1 col-xs-2">'
                                                +' <button type="button" class="btn-xs btn-danger btn_remove" id="'+counter+'" onclick="rmv_row(this.id);">X</button>'
                                                +'</div>'
                                                +'</div>');

            $("#new_dropzone_section_version").append(dynamically_created_dropzone);
            var get_select = $('.select2');
            initializeSelect2(get_select);

          }

        });

      });

    });
		
	</script>

  <script type="text/javascript">

  function rmv_row(row_id)
  {
      alert(row_id);
      $("#"+row_id).remove();
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
          var row_counter = document.getElementById("row-counter").value;
          var name_counter = document.getElementById("row-name-counter").value;

          if(document.getElementsByClassName("date_issue")[0].value == "")
          {
              missing_alert_for_class("date_issue", 0);
              return false;
          }
          if(document.getElementsByClassName("pp_issue")[0].value == "")
          {
              missing_alert_for_class("pp_issue", 0);
              return false;
          }
          if(document.getElementsByClassName("greige_demand_issue")[0].value == "")
          {
              missing_alert_for_class("greige_demand_issue", 0);
              return false;
          }
          if(isNaN(document.getElementsByClassName("week_issue")[0].value))
          {
              number_alert_for_class("week_issue", 0);
              return false;
          }
          if(document.getElementsByClassName("design_issue")[0].value == "")
          {
              missing_alert_for_class("design_issue", 0);
              return false;
          }
          if(document.getElementsByClassName("construction_issue")[0].value == "")
          {
              missing_alert_for_class("construction_issue", 0);
              return false;
          }
          if(document.getElementsByClassName("customer_issue")[0].value == "")
          {
              missing_alert_for_class("customer_issue", 0);
              return false;
          }
          if(document.getElementsByClassName("process_issue")[0].value == "")
          {
              missing_alert_for_class("process_issue", 0);
              return false;
          }

          else
          {

            for (var i = 0; i < row_counter; i++) 
            {
                if(document.getElementsByClassName("version-class")[i].value == "")
                {
                    missing_alert_for_class("version-class", i);
                    return false;
                }

                if(document.getElementsByClassName("version-color")[i].value == "")
                {
                    missing_alert_for_class("version-color", i);
                    return false;
                }

                if(document.getElementsByClassName("version-gray-width")[i].value == "")
                {
                    missing_alert_for_class("version-gray-width", i);
                    return false;
                }

                if(isNaN(document.getElementsByClassName("version-gray-width")[i].value))
                {
                    number_alert_for_class("version-gray-width", i);
                    return false;
                }

                if(document.getElementsByClassName("version-finish-width")[i].value == "")
                {
                    missing_alert_for_class("version-finish-width", i);
                    return false;
                }

                if(isNaN(document.getElementsByClassName("version-finish-width")[i].value))
                {
                    number_alert_for_class("version-finish-width", i);
                    return false;
                }

                if(document.getElementsByClassName("version-quantity")[i].value == "")
                {
                    missing_alert_for_class("version-quantity", i);
                    return false;
                }

                if(isNaN(document.getElementsByClassName("version-quantity")[i].value))
                {
                    number_alert_for_class("version-quantity", i);
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

            var formdata = new FormData(document.getElementById('pp_fixed_data_form'));

            for (var i = 1; i <= name_counter; i++) 
            {
                if(document.getElementsByName("version"+i)[0])
                {
                    formdata.append('version'+i,document.getElementsByName("version"+i)[0].value);
                    formdata.append('color'+i,document.getElementsByName("color"+i)[0].value);
                    formdata.append('gray_width'+i,document.getElementsByName("gray_width"+i)[0].value);
                    formdata.append('finish_width'+i,document.getElementsByName("finish_width"+i)[0].value);
                    formdata.append('quantity'+i,document.getElementsByName("quantity"+i)[0].value);
                }
            }

            $.ajax(
            {
              type: "POST",
              url: "pp_saving.php",
              data: formdata,
              processData: false,
              contentType: false,
              error: function(jqXHR, textStatus, errorMessage) 
              {
                  alert(errorMessage);
              },
              success: function(data) 
              {
                
                if (data == "Few Data Missing")
                {
                  info_alert("Few Data Missing");
                }
                else if (data == "No Customer Found")
                {
                  info_alert("No Customer Found");
                }
                else if (data == "No Color Found")
                {
                  info_alert("No Color Found");
                }
                else if (data == "No Process Found")
                {
                  info_alert("No Process Found");
                }
                else if (data == "Duplicate PP Number")
                {
                  info_alert("Duplicate PP Number");
                }
                else if (data == "Duplicate Data")
                {
                  info_alert("Duplicate Data");
                }
                else if (data == "Data Not Inserted In PP")
                {
                  info_alert("Data Not Inserted In PP");
                }
                else if (data == "Data Not Inserted In PP Detsils")
                {
                  info_alert("Data Not Inserted In PP Detsils");
                }
                else
                {
                  success_alert("All Data Save Successfully", "../pp/view_pp.php?pp_no="+data);
                  //window.location = 'pp_details_list.php';
                }
              } 
            });
          }
          
      });

  });

  </script>

</body>
</html>
