<?php
session_start();
require_once("../includes/db_session_chk.php");
$construction_id = $_POST['construction_id'];

$sql = "SELECT * FROM construction_for_version WHERE construction_id = '$construction_id'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);

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
                        <li><a href="../home/dashboard.php">Dashboard</a></li>
                        <li>Settings</li>
                        <li><a href="add_construction.php">Add Construction for Version</a></li>
                        <li>Edit construction for Version</li>
                    </ol>
                  </div>
                </div>

                <!-- main content again -->
                <div class="row">
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                      <div class="x_title">
                        <h2>Edit construction Form</h2>
                        <ul class="nav navbar-right panel_toolbox">
                          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                          </li>
                        </ul>
                        <div class="clearfix"></div>
                      </div>
                      <div class="x_content">
                        <br />

                        <form id="add_construction_form" name="add_construction_form" data-parsley-validate class="form-horizontal form-label-left">

                          <!-- <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="construction">construction Name <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="construction" name="construction" value="<?php echo $row['construction_name'] ?>" class="form-control col-md-7 col-xs-12">
                              <input type="hidden" id="construction_id" name="construction_id" value="<?php echo $row['construction_id'] ?>">
                            </div>
                          </div> -->

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="yarn_count_warp_value">Yarn count (Warp) <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="yarn_count_warp_value" name="yarn_count_warp_value" value="<?php echo $row['warp_yarn_count'] ?>"  class="form-control col-md-7 col-xs-12">
                              <input type="hidden" id="construction_id" name="construction_id" value="<?php echo $row['construction_id'] ?>">

                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="yarn_count_warp_ply">No. of Ply for Warp Yarn <span class="required">*</span>
                            </label>

                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <select id="yarn_count_warp_ply" name="yarn_count_warp_ply" class="yarn_count_warp_ply form-control col-md-12 col-xs-12">
                                <option value="1" selected <?php echo ($row['no_of_ply_for_warp_yarn'] == '1') ? 'selected' : '' ?> >1</option>
                                <option value="2" <?php echo ($row['no_of_ply_for_warp_yarn'] == '2') ? 'selected' : '' ?> >2</option>
                                <option value="3" <?php echo ($row['no_of_ply_for_warp_yarn'] == '3') ? 'selected' : '' ?> >3</option>
                                <option value="4" <?php echo ($row['no_of_ply_for_warp_yarn'] == '4') ? 'selected' : '' ?> >4</option>
                              </select> 
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="yarn_count_warp_unit">UOM (Warp) <span class="required">*</span>
                            </label>

                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <select id="yarn_count_warp_unit" name="yarn_count_warp_unit" class="yarn_count_warp_unit form-control col-md-12 col-xs-12">
                                <option value="Ne" selected <?php echo ($row['uom_of_warp_yarn'] == 'Ne') ? 'selected' : '' ?> >Ne</option>
                                <option value="Nm" <?php echo ($row['uom_of_warp_yarn'] == 'Nm') ? 'selected' : '' ?> >Nm</option>
                                <option value="Den" <?php echo ($row['uom_of_warp_yarn'] == 'Den') ? 'selected' : '' ?> >Den</option>
                                <option value="Tex" <?php echo ($row['uom_of_warp_yarn'] == 'Tex') ? 'selected' : '' ?> >Tex</option>
                                <option value="Dtex" <?php echo ($row['uom_of_warp_yarn'] == 'Dtex') ? 'selected' : '' ?> >Dtex</option>
                              </select> 
                            </div>
                          </div>

                          <br>
                          <br>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="yarn_count_weft_value">Yarn count (Weft) <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="yarn_count_weft_value" name="yarn_count_weft_value" value="<?php echo $row['weft_yarn_count'] ?>" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="yarn_count_weft_ply">No. of Ply for Weft Yarn <span class="required">*</span>
                            </label>

                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <select id="yarn_count_weft_ply" name="yarn_count_weft_ply" class="yarn_count_weft_ply form-control col-md-12 col-xs-12">
                                <option value="1" selected <?php echo ($row['no_of_ply_for_weft_yarn'] == '1') ? 'selected' : '' ?> >1</option>
                                <option value="2" <?php echo ($row['no_of_ply_for_weft_yarn'] == '2') ? 'selected' : '' ?> >2</option>
                                <option value="3" <?php echo ($row['no_of_ply_for_weft_yarn'] == '3') ? 'selected' : '' ?> >3</option>
                                <option value="4" <?php echo ($row['no_of_ply_for_weft_yarn'] == '4') ? 'selected' : '' ?> >4</option>
                              </select> 
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="yarn_count_weft_unit">UOM (Weft) <span class="required">*</span>
                            </label>

                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <select id="yarn_count_weft_unit" name="yarn_count_weft_unit" class="yarn_count_weft_unit form-control col-md-12 col-xs-12">
                                <option value="Ne" selected <?php echo ($row['uom_of_weft_yarn'] == 'Ne') ? 'selected' : '' ?> >Ne</option>
                                <option value="Nm" <?php echo ($row['uom_of_weft_yarn'] == 'Nm') ? 'selected' : '' ?> >Nm</option>
                                <option value="Den" <?php echo ($row['uom_of_weft_yarn'] == 'Den') ? 'selected' : '' ?> >Den</option>
                                <option value="Tex" <?php echo ($row['uom_of_weft_yarn'] == 'Tex') ? 'selected' : '' ?> >Tex</option>
                                <option value="Dtex" <?php echo ($row['uom_of_weft_yarn'] == 'Dtex') ? 'selected' : '' ?> >Dtex</option>
                              </select> 
                            </div>
                          </div>

                          <br>
                          <br>


                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="thread_count_warp_value">No. of Threads/ inch Warp <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="thread_count_warp_value" name="thread_count_warp_value" value="<?php echo $row['no_of_threads_per_inch_in_warp'] ?>" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="thread_count_warp_insertion">Warp Insertion <span class="required">*</span>
                            </label>

                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <select id="thread_count_warp_insertion" name="thread_count_warp_insertion" class="thread_count_warp_insertion form-control col-md-12 col-xs-12">
                                <option value="1" selected <?php echo ($row['warp_insertion'] == '1') ? 'selected' : '' ?> >1</option>
                                <option value="2" <?php echo ($row['warp_insertion'] == '2') ? 'selected' : '' ?> >2</option>
                                <option value="3" <?php echo ($row['warp_insertion'] == '3') ? 'selected' : '' ?> >3</option>
                                <option value="4" <?php echo ($row['warp_insertion'] == '4') ? 'selected' : '' ?> >4</option>
                              </select> 
                            </div>
                          </div>

                          <br>
                          <br>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="thread_count_weft_value">No. of Threads/ inch Weft <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="thread_count_weft_value" name="thread_count_weft_value" value="<?php echo $row['no_of_threads_per_inch_in_weft'] ?>" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="thread_count_weft_insertion">Weft Insertion <span class="required">*</span>
                            </label>

                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <select id="thread_count_weft_insertion" name="thread_count_weft_insertion" class="thread_count_weft_insertion form-control col-md-12 col-xs-12">
                                <option value="1" selected <?php echo ($row['weft_insertion'] == '1') ? 'selected' : '' ?> >1</option>
                                <option value="2" <?php echo ($row['weft_insertion'] == '2') ? 'selected' : '' ?> >2</option>
                                <option value="3" <?php echo ($row['weft_insertion'] == '3') ? 'selected' : '' ?> >3</option>
                                <option value="4" <?php echo ($row['weft_insertion'] == '4') ? 'selected' : '' ?> >4</option>
                              </select> 
                            </div>
                          </div>

                          <div class="ln_solid"></div>
                          <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                              <button type="button" name="submit" id="submit" class="btn btn-success">Update</button>
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

      $('#submit').click(function()
      {
          if(document.getElementById("yarn_count_warp_value").value == "")
          {
              missing_alert("yarn_count_warp_value");
              return false;
          }

          else if(document.getElementById("yarn_count_weft_value").value == "")
          {
              missing_alert("yarn_count_weft_value");
              return false;
          }

          else if(document.getElementById("yarn_count_warp_ply").value == "")
          {
              missing_alert("yarn_count_warp_ply");
              return false;
          }

          else if(document.getElementById("yarn_count_weft_ply").value == "")
          {
              missing_alert("yarn_count_weft_ply");
              return false;
          }

          else if(document.getElementById("yarn_count_warp_unit").value == "")
          {
              missing_alert("yarn_count_warp_unit");
              return false;
          }

          else if(document.getElementById("yarn_count_weft_unit").value == "")
          {
              missing_alert("yarn_count_weft_unit");
              return false;
          }


          else if(document.getElementById("thread_count_warp_value").value == "")
          {
              missing_alert("thread_count_warp_value");
              return false;
          }

          else if(document.getElementById("thread_count_weft_value").value == "")
          {
              missing_alert("thread_count_weft_value");
              return false;
          }


          else if(document.getElementById("thread_count_warp_insertion").value == "")
          {
              missing_alert("thread_count_warp_insertion");
              return false;
          }

          else if(document.getElementById("thread_count_weft_insertion").value == "")
          {
              missing_alert("thread_count_weft_insertion");
              return false;
          }

          else
          {
              var formdata = new FormData(document.getElementById('add_construction_form'));
              $.ajax({
              type: "POST",
              url: "edit_construction_saving.php",// where you wanna post
              data: formdata,
              processData: false,
              contentType: false,
              error: function(jqXHR, textStatus, errorMessage) 
              {
                  alert(errorMessage);
              },
              success: function(data) 
              {
                if (data == "Input construction Name") 
                {
                    info_alert(data);
                }

                else if(data == "construction Name Already Exists")
                {
                    info_alert(data);
                }

                else if(data == "Data Not Inserted")
                {
                    info_alert(data);
                }

                else
                {
                    info_alert(data);
                    window.location = "construction_list.php";
                }
              } 
            });
          }


      });
  });
  </script>
</body>
</html>