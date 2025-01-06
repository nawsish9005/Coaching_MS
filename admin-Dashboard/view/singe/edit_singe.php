<?php
session_start();
require_once("../includes/db_session_chk.php");
$greige_issunce_id = $_POST['greige_issunce_id'];
$route_issue_id = $_POST['route_issue_id'];
$singe_id = $_POST['singe_id'];
$pp_no_id = $_POST['pp_no_id'];
$pp_details_id = $_POST['pp_details_id'];

if (($singe_id == '') || (empty($singe_id)) || is_null($singe_id)||
  ($route_issue_id == '') || (empty($route_issue_id)) || is_null($route_issue_id)) {
   header("Location: route_issue.php");
}

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
                    </ol>
                  </div>
                </div>

                <div>
                  <form action="../route/greige_details_view.php" method="post" style="display: inline;">
                    <input type="hidden" id="greige_issunce_id" name="greige_issunce_id" value="<?php echo $greige_issunce_id; ?>">
                    <input type="hidden" id="pp_no_id" name="pp_no_id" value="<?php echo $pp_no_id; ?>">
                     <input type="hidden" id="route_issue_id" name="route_issue_id" value="<?php echo $route_issue_id; ?>">
                    <input type="hidden" id="pp_details_id" name="pp_details_id" value="<?php echo $pp_details_id; ?>">
                    <button type="submit" id="gray_issue_add_btn" name="gray_issue_add_btn" class="btn btn-primary btn-xs">
                        Go This Greige Details
                    </button>
                  </form>
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
                              <th>Color</th>
                              <th>Version</th>
                              <th>Design</th>
                              <th>Greige Width</th>
                              <th>Finish Width</th>
                              <th>Yarn Warp</th>
                              <th>Yarn Weft</th>
                              <th>Thread EPI</th>
                              <th>Thread PPI</th>
                              <th>GSM</th>
                              <!-- <th>Fiber Warp</th>
                              <th>Fiber Weft</th> -->
                              <th>Greige Receive Quantity</th>
                              <th>Process/Reprocess</th>
                            </tr>
                          </thead>

                          <tbody>
                            <?php
                              $sql_for_pp = "SELECT route_issue.*, greige_issunce.*
                                                   FROM route_issue, greige_issunce
                                                   WHERE route_issue.greige_issunce_id = '$greige_issunce_id'
                                                   AND route_issue.route_issue_id = '$route_issue_id'
                                                   AND route_issue.active = '1'
                                                   AND greige_issunce.active = '1'
                                                   ";

                              $res_for_pp = mysqli_query($con, $sql_for_pp);

                              $row = mysqli_fetch_array($res_for_pp);

                              $sql_for_pp_details = "SELECT greige_issunce.*, pp.*, pp_details.*
                                                   FROM greige_issunce, pp, pp_details
                                                   WHERE greige_issunce.greige_issunce_id = '$greige_issunce_id'
                                                   AND greige_issunce.active = '1'
                                                   AND greige_issunce.pp_no_id = pp.pp_id
                                                   AND greige_issunce.pp_details_id = pp_details.pp_id
                                                   ";

                              $res_for_pp_details = mysqli_query($con, $sql_for_pp_details);

                              $row_pp_details = mysqli_fetch_array($res_for_pp_details);
                            ?>
                            <tr>
                              <td>1</td>
                              <td><?php echo $row_pp_details['pp_no'] ?></td>
                              <td>
                                <?php
                                  $color_id = $row_pp_details['color'];
                                  $sql_for_color = "SELECT color_name FROM color WHERE color_id = '$color_id'";
                                  $res_for_color = mysqli_query($con, $sql_for_color);
                                  $row_for_color = mysqli_fetch_assoc($res_for_color);
                                  echo $row_for_color['color_name'];
                                ?>
                              </td>
                              <td><?php echo $row_pp_details['version'] ?></td>
                              <td><?php echo $row_pp_details['design'] ?></td>
                              <td><?php echo $row_pp_details['gray_width'] ?></td>
                              <td><?php echo $row_pp_details['finish_width'] ?></td>
                              <td><?php echo $row_pp_details['yarn_warp'] ?></td>
                              <td><?php echo $row_pp_details['yarn_weft'] ?></td>
                              <td><?php echo $row_pp_details['thread_epi'] ?></td>
                              <td><?php echo $row_pp_details['thread_ppi'] ?></td>
                              <td><?php echo $row_pp_details['gsm'] ?></td>
                              <td><?php echo $row['received_quantity'] ?></td>
                              <td><?php echo $row['process'] ?></td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                      <div class="x_title">
                        <h2>Singing Edit Form</h2>
                        <ul class="nav navbar-right panel_toolbox">
                          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                          </li>
                        </ul>
                        <div class="clearfix"></div>
                      </div>
                      <div class="x_content">
                        <br />

                        <?php
                          $sql_for_singe = "SELECT *
                                         FROM singe
                                         WHERE route_issue_id = '$route_issue_id'
                                         AND singe_id = '$singe_id'
                                         AND active = '1'
                                        ";
                          $res_for_singe  = mysqli_query($con, $sql_for_singe);
                          $row_singe  = mysqli_fetch_assoc($res_for_singe);
                        ?>

                        <form id="singe_form" name="singe_form" data-parsley-validate class="form-horizontal form-label-left">

                          <input type="hidden" id="route_issue_id" name="route_issue_id" value="<?php echo $route_issue_id; ?>">
                          <input type="hidden" id="greige_issunce_id" name="greige_issunce_id" value="<?php echo $greige_issunce_id; ?>">
                          
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="pp">Date <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-6">
                              <div class='input-group date' id='myDatepicker2'>
                                <input type='text' class="form-control" id="custom_date" name="custom_date" value="<?php echo $row_singe['date'] ?>"/>
                                <span class="input-group-addon">
                                   <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                              </div>
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="batcher">Batcher <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="batcher" name="batcher" value="<?php echo $row_singe['batcher'] ?>" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="p_width">Process Width <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="p_width" name="p_width" value="<?php echo $row_singe['p_width'] ?>" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="p_qty">Process Qantity <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="p_qty" name="p_qty" value="<?php echo $row_singe['p_qty'] ?>" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="m_c_name">Machine Name <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="m_c_name" name="m_c_name" value="<?php echo $row_singe['m_c_name'] ?>" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="flame">Flame Intensity (mbar) <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="flame" name="flame" value="<?php echo $row_singe['flame'] ?>" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="speed">Speed (M/Min) <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="speed" name="speed" value="<?php echo $row_singe['speed'] ?>" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="temp">Bath Temparature (C) <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="temp" name="temp" value="<?php echo $row_singe['temp'] ?>" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <!-- <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="singe_quality">Singe Quality <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="singe_quality" value="<?php echo $row_singe['singe_quality'] ?>" name="singe_quality" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div> -->

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ph">Bath pH <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="ph" name="ph" value="<?php echo $row_singe['ph'] ?>" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="visual_assessment">Visual Assessment(Singe Quality) <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="visual_assessment" name="visual_assessment" value="<?php echo $row_singe['visual_assessment'] ?>" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="status">Status <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <p>
                                 OK :
                                <input type="radio" class="flat" name="status" id="ok" value="1" <?php if($row_singe['status'] == '1') echo "checked"; ?> />
                                 Not OK :
                                <input type="radio" class="flat" name="status" id="notok" value="0" <?php if($row_singe['status'] == '0') echo "checked"; ?>/>
                              </p>
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="remarks">Remarks <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="remarks" name="remarks" value="<?php echo $row_singe['remarks'] ?>" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <div class="ln_solid"></div>
                          <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                              <button type="button" name="submit" id="submit" class="btn btn-success">Submit</button>
                              <button type="reset" name="reset" id="reset" class="btn btn-info">Reset</button>
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
    <script type="text/javascript">
     $(document).ready(function(){

      $('#myDatepicker2').datetimepicker({
        format: 'DD.MM.YYYY'
      });

      $('#submit').click(function()
      {
          if(document.getElementById("custom_date").value == "")
          {
              missing_alert("custom_date");
              return false;
           }
          else if(document.getElementById("batcher").value == "")
          {
              missing_alert("batcher");
              return false;
          }
          else if(document.getElementById("p_width").value == "")
          {
              missing_alert("p_width");
              return false;
          }
          else if(isNaN(document.getElementById("p_width").value))
          {
            missing_alert_2("p_width","p_width");
            return false;
          }
          else if(document.getElementById("p_qty").value == "")
          {
              missing_alert("p_qty");
              return false;
          }
          else if(isNaN(document.getElementById("p_qty").value))
          {
            missing_alert_2("p_qty","p_qty");
            return false;
          }
          else if(document.getElementById("m_c_name").value == "")
          {
              missing_alert("m_c_name");
              return false;
          }
          else if(document.getElementById("flame").value == "")
          {
              missing_alert("flame");
              return false;
          }
          else if(document.getElementById("speed").value == "")
          {
              missing_alert("speed");
              return false;
          }
          else if(isNaN(document.getElementById("speed").value))
          {
            missing_alert_2("speed","speed");
            return false;
          }
          else if(document.getElementById("temp").value == "")
          {
              missing_alert("temp");
              return false;
          }
          else if(document.getElementById("ph").value == "")
          {
              missing_alert("ph");
              return false;
          }
          else if(document.getElementById("visual_assessment").value == "")
          {
              missing_alert("visual_assessment");
              return false;
          }
          else if(document.getElementById("remarks").value == "")
          {
              missing_alert("remarks");
              return false;
          }
          else
          {
              var formdata = new FormData(document.getElementById('singe_form'));
              formdata.append("route_issue_id", <?php echo $route_issue_id; ?> );
              formdata.append("singe_id", <?php echo $singe_id; ?> );
              $.ajax({
              type: "POST",
              url: "edit_singe_saving.php",
              data: formdata,
              processData: false,
              contentType: false,
              error: function(jqXHR, textStatus, errorMessage)
              {
                  alert(errorMessage);
              },
              success: function(data)
              {
                  if(data == "No data found")
                  {
                      info_alert(data);
                  }
                  else
                  {
                      var greige_issunce_id = document.getElementById("greige_issunce_id").value;
                      var route_issue_id = document.getElementById("route_issue_id").value;
                      success_alert("Data Save Successfully", "view_singe.php?greige_issunce_id="+greige_issunce_id+"&route_issue_id="+route_issue_id);
                  }
              }
            });
          }


      });
  });
  </script>
</body>
</html>
