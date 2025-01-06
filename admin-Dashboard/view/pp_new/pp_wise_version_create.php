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
                        <li>PP Wise Version Creation</li>
                    </ol>
                  </div>
                </div>

                <!-- main content again -->
                <div class="clearfix"></div>
                <div class="row">
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                      <div class="x_title">
                        <h2>PP Wise Version Creation Form </h2>
                        <ul class="nav navbar-right panel_toolbox">
                          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                          </li>
                        </ul>
                        <div class="clearfix"></div>
                      </div>
                      <div class="x_content">
                        <form id="pp_wise_version_creation" name="pp_wise_version_creation" action="" method="" data-parsley-validate class="form-horizontal form-label-left">
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="customer">PP Number <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <select id="pp_no_id" name="pp_no_id" class="version_pp_no_id action_desc select2 pp_number form-control col-md-12 col-xs-12" onchange="add_desc()">
                                <option value="" selected="selected">Select PP Number</option>
                                <?php
                                  $pp_sql = "SELECT pp_no, pp_id, pp_desc FROM process_program_info ORDER BY pp_id DESC";
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
                              <select id="version_name" name="version_name" class="version_class select2 form-control col-md-12 col-xs-12">
                                <option value="" selected="selected">Select Version</option>
                                <?php
                                  $sql = "SELECT * FROM version_name";
                                  $res = mysqli_query($con, $sql) or die(mysqli_error($con));
                                  while ($row = mysqli_fetch_assoc($res)) 
                                  {
                                      echo "<option value='".$row['version_id']."'>";
                                      echo $row['version_name'];
                                      echo "</option>";
                                  }
                                ?>
                              </select>
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="color">Color <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-6">
                              <select id="color_name" name="color_name" class="version_color select2 form-control col-md-12 col-xs-12">
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
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="construction">Construction <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-6">
                              <select id="construction_for_version" name="construction_for_version" class="construction_for_version select2 form-control col-md-12 col-xs-12">
                                <option value="" selected="selected">Select Construction</option>
                                <?php
                                  $construction_sql = "SELECT * FROM construction_for_version";
                                  $construction_res = mysqli_query($con, $construction_sql) or die(mysqli_error($con));
                                  while ($construction_row = mysqli_fetch_assoc($construction_res)) 
                                  {
                                      $yarn_count_warp_total = "";
                                      $yarn_count_weft_total = "";
                                      $thread_count_warp_insertion_total = "";
                                      $yarn_count_warp_total = "";

                                      $no_of_ply_for_warp_yarn = $construction_row['no_of_ply_for_warp_yarn'];
                                      $no_of_ply_for_weft_yarn = $construction_row['no_of_ply_for_weft_yarn'];
                                      $thread_count_warp_insertion = $construction_row['  warp_insertion'];
                                      $thread_count_weft_insertion = $construction_row['weft_insertion'];

                                      if ($no_of_ply_for_warp_yarn == '1') 
                                      {
                                          $yarn_count_warp_total = $construction_row['warp_yarn_count'].".";
                                      }

                                      else
                                      {
                                          $yarn_count_warp_total = $construction_row['warp_yarn_count']."^".$construction_row['no_of_ply_for_warp_yarn'].".";
                                      }

                                      if ($no_of_ply_for_weft_yarn == '1') 
                                      {
                                          $yarn_count_weft_total = $construction_row['weft_yarn_count']."/";
                                      }

                                      else
                                      {
                                          $yarn_count_weft_total = $construction_row['weft_yarn_count']."^".$construction_row['no_of_ply_for_weft_yarn']."/";
                                      }



                                      if ($thread_count_warp_insertion == '1') 
                                      {
                                          $thread_count_warp_insertion_total = $construction_row['no_of_threads_per_inch_in_warp'].".";
                                      }

                                      else
                                      {
                                          $thread_count_warp_insertion_total = $construction_row['no_of_threads_per_inch_in_warp']."(".$construction_row['warp_insertion'].").";
                                      }

                                      if ($thread_count_weft_insertion == '1') 
                                      {
                                          $thread_count_weft_insertion_total = $construction_row['no_of_threads_per_inch_in_weft'];
                                      }

                                      else
                                      {
                                          $thread_count_weft_insertion_total = $construction_row['no_of_threads_per_inch_in_weft']."(".$construction_row['weft_insertion'].")";
                                      }

                                      $display = $yarn_count_warp_total. $yarn_count_weft_total. $thread_count_warp_insertion_total . $thread_count_weft_insertion_total;

                                      echo "<option value='".$construction_row['construction_id']."'>";
                                      
                                      echo $display;
                                      echo "</option>";
                                  }
                                ?>
                              </select>
                            </div>

                            <div class="col-md-2 col-sm-2 col-xs-4">
                              <select id="con" name="construction_standard" class="version_construction_standard form-control col-md-12 col-xs-12">
                                <option value="spi" selected="selected">SPI</option>
                                <option value="dpi" >DPI</option>
                              </select> 
                            </div>

                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="gray_width">Greige Width (Inch)<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input id="gray_width" name="gray_width" placeholder="Greige Width" class="version_gray_width form-control col-md-12 col-xs-12" type="text">
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="finish_width">Finish Width (Inch)<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input id="finish_width" name="finish_width" placeholder="Finish Width" class="version_finish_width form-control col-md-12 col-xs-12" type="text">
                            </div>
                          </div>



                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="process_line">Process Technique (Program Type) <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <select id="process_line" name="process_line" class="version_process_line select2 form-control col-md-12 col-xs-12">
                                <option value="" selected="selected">Select Program Type</option>
                                <?php
                                  $process_sql = "SELECT * FROM process_technique_or_program_type ORDER BY process_technique_name";
                                  $process_res = mysqli_query($con, $process_sql) or die(mysqli_error($con));
                                  while ($process_row = mysqli_fetch_assoc($process_res)) 
                                  {
                                      echo "<option value='".$process_row['process_id']."'>";
                                      echo $process_row['process_technique_name'];
                                      echo "</option>";
                                  }
                                ?>
                              </select>
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fiber_cotton">Fiber Cotton 
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input id="fiber_cotton" name="fiber_cotton" placeholder="Fiber Cotton" class="version_fiber_cotton form-control col-md-6 col-xs-6" type="text">
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fiber_polyster">Fiber Polyster 
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input id="fiber_polyster" name="fiber_polyster" placeholder="Polyster" class="version_fiber_polyster form-control col-md-6 col-xs-6" type="text">
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fiber_others_name">Fiber Others Name 
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input id="fiber_others_name" name="fiber_others_name" placeholder="Fiber Others Name" class="version_fiber_others_name form-control col-md-6 col-xs-6" type="text">
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fiber_others_value">Fiber Others Value 
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input id="fiber_others_value" name="fiber_others_value" placeholder="Fiber Others Value" class="version_fiber_others_value form-control col-md-6 col-xs-6" type="text">
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="quantity">Quantity <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input id="quantity" name="quantity" placeholder="Quantity" class="version_quantity form-control col-md-12 col-xs-12" type="text">
                            </div>
                          </div>

                          <div class="ln_solid"></div>
                            <div class="form-group">
                              <div class="col-md-offset-3 col-sm-6 col-xs-12">
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


                <!-- main content finished -->

                <div class="clearfix"></div>
                <div class="row">
                   <div class="col-md-12 col-sm-12 col-xs-12">
                      <div class="x_panel">

                        <div class="x_title">
                          <h2>Version Wise Process Program List</h2>
                          <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                          </ul>
                          <div class="clearfix"></div>
                        </div>

                        <div class="x_content">
                          <table id="datatable-buttons" class="table table-striped table-bordered">
                            <thead>
                              <tr>
                                <th>SI</th>
                                <th>PP Number</th>
                                <th>Version</th>
                                <th>Color</th>
                                <th>Greige Width (Inch)</th>
                                <th>Finish Width (Inch)</th>
                                <th>Quantity</th>
                                <th>Action</th>
                              </tr>
                            </thead>
                            
                            <tbody>
                              <?php 

                                $sql_for_pp = "SELECT * FROM version_wise_process_program_info where active = '1' ORDER BY pp_id DESC";
                                $res_for_pp = mysqli_query($con, $sql_for_pp);
                                $s1 = 1;
                                while ($row = mysqli_fetch_assoc($res_for_pp)) 
                                {
                                  $pp_id = $row['pp_id'];
                              ?>
                              <tr>
                                <td> <?php echo $s1; ?> </td>
                                <td>
                                  <?php 
                                    $pp_no_id = $row['pp_no_id'];
                                    $sql_for_pp_details = "SELECT pp_no FROM process_program_info WHERE pp_id = '$pp_no_id'";
                                      $res_for_pp_details = mysqli_query($con, $sql_for_pp_details);
                                      $row_for_pp_details = mysqli_fetch_assoc($res_for_pp_details);
                                      echo $row_for_pp_details['pp_no'];
                                  ?>
                                </td>
                                <td>
                                  <?php 
                                    $version_id = $row['version'];
                                    $sql_for_version = "SELECT version_name FROM version_name WHERE version_id = '$version_id'";
                                      $res_for_version = mysqli_query($con, $sql_for_version);
                                      $row_for_version = mysqli_fetch_assoc($res_for_version);
                                      echo $row_for_version['version_name'];
                                  ?>
                                </td>
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
                                <td><?php echo $row['finish_width'] ?></td>
                                <td><?php echo $row['quantity'] ?></td>
                                <td>
                                  <form action="edit_pp__wise_version_creation.php" method="post" style="display: inline-block;">
                                    <input type="hidden" id="pp_id" name="pp_id" value="<?php echo $row['pp_id']; ?>">
                                    <button type="submit" id="gray_issue_add_btn" name="gray_issue_add_btn" class="btn btn-primary btn-xs"> Edit Version </button>
                                  </form>

                                  <!-- <form action="view_pp.php" method="get" style="display: inline-block;">
                                    <input type="hidden" id="pp_no" name="pp_no" value="<?php echo $row['pp_no']; ?>">
                                    <button type="submit" class="btn btn-primary btn-xs"> View </button>
                                  </form> -->
                                </td>
                              </tr>
                              <?php 
                                ++$s1;
                               }
                              ?>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>

                </div>

                <!-- end main context -->

                


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

          if(document.getElementsByClassName("construction_for_version")[0].value == "")
          {
              missing_alert_for_class("construction_for_version", 0);
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

          var formdata = new FormData(document.getElementById('pp_wise_version_creation'));
          $.ajax(
          {
            type: "POST",
            url: "pp_version_saving.php",
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
                 info_alert("Data Save Successfully");
                //success_alert("All Data Save Successfully", "../pp/view_pp.php?pp_no="+data);
                 window.location = 'pp_wise_version_create.php';
              }
            } 
          });
          
    });

</script>


</body>
</html>