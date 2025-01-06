<?php
session_start();
require_once("../includes/db_session_chk.php");
$web_id = $_POST['web_id'];

$sql = "SELECT * FROM all_web WHERE web_id = '$web_id'";
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

<script src="js/latest.js" type="text/javascript"></script>

<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>

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
                        <li><a href="add_web.php">Add Subject</a></li>
                        <li>Edit Subject</li>
                    </ol>
                  </div>
                </div>

                <!-- main content again -->
                <div class="row">
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                      <div class="x_title">
                        <h2>Edit Web Basic Form</h2>
                        <ul class="nav navbar-right panel_toolbox">
                          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                          </li>
                        </ul>
                        <div class="clearfix"></div>
                      </div>
                      <div class="x_content">
                        <br />

                    <form id="add_mowgli_subject_form" name="add_mowgli_subject_form" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left">

						<div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="subject_web">Add Subject<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="subject_web" name="subject_web" value="<?php echo $row['subject_web'] ?>" class="form-control col-md-7 col-xs-12">
                              <input type="hidden" id="web_id" name="web_id" value="<?php echo $row['web_id'] ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="web_about">About Course 
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                    
                              <textarea class="form-control" rows="4" id="web_about" name="web_about"><?php echo $row['web_about'] ?></textarea>
                            </div>
                        </div>
						  
						<div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="web_price">Course Price<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="web_price" name="web_price" value="<?php echo $row['web_price'] ?>" class="form-control col-md-7 col-xs-12">
                              
                            </div>
                        </div>
						  
						<div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="web_image">Course Image<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="file" id="web_image" name="web_image" value="<?php echo $row['web_image'] ?>" class="form-control col-md-7 col-xs-12">
                              <img src="../../build/user_pic/<?php echo $row['web_image'] ?>" height="60" width="60"/> 
                            </div>
                        </div>
						  
						<div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="web_duration">Course Duration<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="web_duration" name="web_duration" value="<?php echo $row['web_duration'] ?>" class="form-control col-md-7 col-xs-12">
                              
                            </div>
                        </div>
						  
						<div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="web_effort">Course Effort<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="web_effort" name="web_effort" value="<?php echo $row['web_effort'] ?>" class="form-control col-md-7 col-xs-12">
                              
                            </div>
                        </div>
						  
						<div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="web_certificate">Certifate<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <select id="web_certificate" name="web_certificate" class="customer_country_issue select2 form-control col-md-12 col-xs-12">
                                <option value="" selected="selected">Select Certifate</option>
                                <option value="<?php echo $row['web_certificate'] ?>" selected=""><?php echo $row['web_certificate'] ?></option>
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                                
                              </select>
                            </div>
                          </div>

						<div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="web_total_class">Total Class<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="web_total_class" name="web_total_class" value="<?php echo $row['web_total_class'] ?>" class="form-control col-md-7 col-xs-12">
                              
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
    <script type="text/javascript" src="https://cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
    <script type="text/javascript">
     $(document).ready(function(){ 

      $('#submit').click(function()
      {
          if(document.getElementById("subject_web").value == "")
          {
              missing_alert("subject_web");
              return false;
          }
          else
          {
             
               var nicInstance = nicEditors.findEditor('web_about'); 
			  var messageContent = nicInstance.getContent();
			  
              var formdata = new FormData(document.getElementById('add_mowgli_subject_form'));
              formdata.append('web_about', messageContent);
              $.ajax({
              type: "POST",
              url: "edit_web_saving.php",// where you wanna post
              data: formdata,
              processData: false,
              contentType: false,
              error: function(jqXHR, textStatus, errorMessage) 
              {
                  alert(errorMessage);
              },
              success: function(data) 
              {
                if (data == "Input Subject Name") 
                {
                    info_alert(data);
                }

                else if(data == "Subject Name Already Exists")
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
                    window.location = "web_list.php";
                }
              } 
            });
          }


      });
  });
  </script>
</body>
</html>