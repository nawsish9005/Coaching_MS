<?php
session_start();
require_once("../includes/db_session_chk.php");
$pp_id = mysqli_real_escape_string($con, stripslashes(trim($_POST['pp_id'])));
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
                        <li>PP Wise Version Edit Form</li>
                    </ol>
                  </div>
                </div>

                <?php
                  $sql_for_pp = "SELECT * FROM pp_details WHERE pp_id = '$pp_id' and active = '1' LIMIT 1";
                  $pp_res = mysqli_query($con, $sql_for_pp) or die(mysqli_error($con));
                  $pp_row = mysqli_fetch_assoc($pp_res);
                ?>

                <!-- main content again -->
                <div class="clearfix"></div>
                <div class="row">
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                      <div class="x_title">
                        <h2>PP Wise Version Edit Form </h2>
                        <ul class="nav navbar-right panel_toolbox">
                          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                          </li>
                        </ul>
                        <div class="clearfix"></div>
                      </div>
                      <div class="x_content">
                        <form id="creation_pp_wise_version" name="creation_pp_wise_version" action="" method="" data-parsley-validate class="form-horizontal form-label-left">
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="customer">PP Number <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <select id="pp_no_id" name="pp_no_id" class="version_pp_no_id action_desc select2 pp_number form-control col-md-12 col-xs-12" onchange="add_desc()">
                                <option value="" selected="selected">Select PP Number</option>
                                <?php
                                  $pp_no_id = $pp_row['pp_no_id'];

                                  $pp_id_sql = "SELECT * FROM pp ORDER BY pp_id DESC";
                                  $pp_id_res = mysqli_query($con, $pp_id_sql) or die(mysqli_error($con));
                                  while ($pp_id_row = mysqli_fetch_assoc($pp_id_res)) 
                                  {
                                      ?>

                                      <option <?php if($pp_id_row['pp_id'] == $pp_no_id){echo "selected";}?> value="<?php echo $pp_id_row['pp_id'];?>"> <?php echo $pp_id_row['pp_no'];?></option>

                                      <?php
                                  }
                                ?>

                              </select> 
                            </div>

                           </div>

                           <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" > 
                            </label>

                             <div class="col-md-6 col-sm-6 col-xs-12" id="pp_desc" style="display:none">

                              </div>
                            </div>  
                           <br>


                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="version">Version <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-6">
                              <select id="version" name="version" class="version_class select2 form-control col-md-12 col-xs-12">

                                <option value="" selected="selected">Select Version</option>
                                <?php
                                  $version_id = $pp_row['version'];

                                  $version_sql = "SELECT * FROM version";
                                  $version_res = mysqli_query($con, $version_sql) or die(mysqli_error($con));
                                  while ($version_row = mysqli_fetch_assoc($version_res)) 
                                  {
                                      ?>

                                      <option <?php if($version_row['version_id'] == $version_id){echo "selected";}?> value="<?php echo $version_row['version_id'];?>"> <?php echo $version_row['version_name'];?></option>

                                      <?php
                                  }
                                ?>
                              </select>
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="color">Color <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-6">
                              <select id="color" name="color" class="version_color select2 form-control col-md-12 col-xs-12">
                                <option value="" selected="selected">Select Color</option>
                                <?php
                                  $color_id = $pp_row['color'];

                                  $color_sql = "SELECT * FROM color";
                                  $color_res = mysqli_query($con, $color_sql) or die(mysqli_error($con));
                                  while ($color_row = mysqli_fetch_assoc($color_res)) 
                                  {
                                      ?>

                                      <option <?php if($color_row['color_id'] == $color_id){echo "selected";}?> value="<?php echo $color_row['color_id'];?>"> <?php echo $color_row['color_name'];?></option>

                                      <?php
                                  }
                                ?>

                              </select>
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="construction">Construction <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-6">
                              <select id="construction" name="construction" class="version_construction select2 form-control col-md-12 col-xs-12">
                                <option value="" selected="selected">Select Construction</option>
                                <?php
                                  $construction = $pp_row['construction'];

                                  $construction_sql = "SELECT * FROM construction";
                                  $construction_res = mysqli_query($con, $construction_sql) or die(mysqli_error($con));
                                  while ($construction_row = mysqli_fetch_assoc($construction_res)) 
                                  {
                                      $yarn_count_warp_total = "";
                                      $yarn_count_weft_total = "";
                                      $thread_count_warp_insertion_total = "";
                                      $yarn_count_warp_total = "";

                                      $yarn_count_warp_ply = $construction_row['yarn_count_warp_ply'];
                                      $yarn_count_weft_ply = $construction_row['yarn_count_weft_ply'];
                                      $thread_count_warp_insertion = $construction_row['thread_count_warp_insertion'];
                                      $thread_count_weft_insertion = $construction_row['thread_count_weft_insertion'];

                                      if ($yarn_count_warp_ply == '1') 
                                      {
                                          $yarn_count_warp_total = $construction_row['yarn_count_warp_value'].".";
                                      }

                                      else
                                      {
                                          $yarn_count_warp_total = $construction_row['yarn_count_warp_value']."^".$construction_row['yarn_count_warp_ply'].".";
                                      }

                                      if ($yarn_count_weft_ply == '1') 
                                      {
                                          $yarn_count_weft_total = $construction_row['yarn_count_weft_value']."/";
                                      }

                                      else
                                      {
                                          $yarn_count_weft_total = $construction_row['yarn_count_weft_value']."^".$construction_row['yarn_count_weft_ply']."/";
                                      }



                                      if ($thread_count_warp_insertion == '1') 
                                      {
                                          $thread_count_warp_insertion_total = $construction_row['thread_count_warp_value'].".";
                                      }

                                      else
                                      {
                                          $thread_count_warp_insertion_total = $construction_row['thread_count_warp_value']."(".$construction_row['thread_count_warp_insertion'].").";
                                      }

                                      if ($thread_count_weft_insertion == '1') 
                                      {
                                          $thread_count_weft_insertion_total = $construction_row['thread_count_weft_value'];
                                      }

                                      else
                                      {
                                          $thread_count_weft_insertion_total = $construction_row['thread_count_weft_value']."(".$construction_row['thread_count_weft_insertion'].")";
                                      }

                                      $display = $yarn_count_warp_total. $yarn_count_weft_total. $thread_count_warp_insertion_total . $thread_count_weft_insertion_total;

                                      ?>
                                      <option <?php if($construction_row['construction_id'] == $construction ){echo "selected";}?> value="<?php echo $construction_row['construction_id'];?>"> <?php echo $display;?></option>
                                      <?php
                                  }
                                ?>

                              </select>
                            </div>

                            <div class="col-md-2 col-sm-2 col-xs-4">
                              <select id="con" name="construction_standard" class="version_construction_standard form-control col-md-12 col-xs-12">
                                <?php
                                  $pp_customer = $pp_row['construction_standard'];
                                  ?>
                                    <option <?php if('spi' == $pp_customer){echo "selected";}?> value="spi"> SPI </option>
                                    <option <?php if('dpi' == $pp_customer){echo "selected";}?> value="dpi"> DPI </option>
                                  <?php
                                ?>
                              </select> 
                            </div>

                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="gray_width">Greige Width (Inch)<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input id="gray_width" name="gray_width" value="<?php echo $pp_row['gray_width']; ?>" placeholder="Greige Width" class="version_gray_width form-control col-md-12 col-xs-12" type="text">

                              <input id="pp_id" name="pp_id" value="<?php echo $pp_id; ?>" type="hidden">
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="finish_width">Finish Width (Inch)<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input id="finish_width" name="finish_width" value="<?php echo $pp_row['finish_width']; ?>" placeholder="Finish Width" class="version_finish_width form-control col-md-12 col-xs-12" type="text">
                            </div>
                          </div>



                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="process_line">Process Technique (Program Type) <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <select id="process_line" name="process_line" class="version_process_line select2 form-control col-md-12 col-xs-12">

                                <option value="" selected="selected">Select Program Type</option>
                                <?php
                                  $process_id = $pp_row['process_line'];

                                  $process_sql = "SELECT * FROM process";
                                  $process_res = mysqli_query($con, $process_sql) or die(mysqli_error($con));
                                  while ($process_row = mysqli_fetch_assoc($process_res)) 
                                  {
                                      ?>

                                      <option <?php if($process_row['process_id'] == $process_id){echo "selected";}?> value="<?php echo $process_row['process_id'];?>"> <?php echo $process_row['process_name'];?></option>

                                      <?php
                                  }
                                ?>
                              </select>
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fiber_cotton">Fiber Cotton 
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input id="fiber_cotton" value="<?php echo $pp_row['fiber_cotton']; ?>" name="fiber_cotton" placeholder="Fiber Cotton" class="version_fiber_cotton form-control col-md-6 col-xs-6" type="text">
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fiber_polyster">Fiber Polyster 
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input id="fiber_polyster" value="<?php echo $pp_row['fiber_polyster']; ?>" name="fiber_polyster" placeholder="Polyster" class="version_fiber_polyster form-control col-md-6 col-xs-6" type="text">
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fiber_others_name">Fiber Others Name 
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input id="fiber_others_name" value="<?php echo $pp_row['fiber_others_name']; ?>" name="fiber_others_name" placeholder="Fiber Others Name" class="version_fiber_others_name form-control col-md-6 col-xs-6" type="text">
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fiber_others_value">Fiber Others Value 
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input id="fiber_others_value" value="<?php echo $pp_row['fiber_others_value']; ?>" name="fiber_others_value" placeholder="Fiber Others Value" class="version_fiber_others_value form-control col-md-6 col-xs-6" type="text">
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="quantity">Quantity <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input id="quantity" value="<?php echo $pp_row['quantity']; ?>" name="quantity" placeholder="Quantity" class="version_quantity form-control col-md-12 col-xs-12" type="text">
                            </div>
                          </div>

                          <div class="ln_solid"></div>
                            <div class="form-group text-center">
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


   <script type="text/javascript">

    function add_desc()
    {
       var pp_desc= document.getElementById("pp_desc");
       pp_desc.style.display='block';


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


    $('#submit').click(function()
    {

          if(document.getElementsByClassName("version_pp_no_id")[0].value == "")
          {
              missing_alert_for_class("version_pp_no_id", 0);
              return false;
          }

          if(document.getElementsByClassName("version_class")[0].value == "")
          {
              missing_alert_for_class("version_class", 0);
              return false;
          }

          if(document.getElementsByClassName("version_color")[0].value == "")
          {
              missing_alert_for_class("version_color", 0);
              return false;
          }

          if(document.getElementsByClassName("version_construction")[0].value == "")
          {
              missing_alert_for_class("version_construction", 0);
              return false;
          }

          if(document.getElementsByClassName("version_process_line")[0].value == "")
          {
              missing_alert_for_class("version_process_line", 0);
              return false;
          }

          if(document.getElementsByClassName("version_gray_width")[0].value == "")
          {
              missing_alert_for_class("version_gray_width", 0);
              return false;
          }

          if(document.getElementsByClassName("version_finish_width")[0].value == "")
          {
              missing_alert_for_class("finish_width", 0);
              return false;
          }

          if(document.getElementsByClassName("version_quantity")[0].value == "")
          {
              missing_alert_for_class("version_quantity", 0);
              return false;
          }

          var formdata = new FormData(document.getElementById('creation_pp_wise_version'));
          $.ajax(
          {
            type: "POST",
            url: "edit_pp_version_saving.php",
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
                 info_alert("Data Update Successfully");
                //success_alert("All Data Save Successfully", "../pp/view_pp.php?pp_no="+data);
                 window.location = 'pp_wise_version_create.php';
              }
            } 
          });
          
    });

</script>


</body>
</html>