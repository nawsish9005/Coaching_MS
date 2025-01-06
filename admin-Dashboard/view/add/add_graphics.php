<?php
session_start();
require_once("../includes/db_session_chk.php");
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
                        <li>Add Subjects</li>
                    </ol>
                  </div>
                </div>

                <!-- main content again -->
                <div class="row">
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                      <div class="x_title">
                        <h2>Add Subjects</h2>
                        <ul class="nav navbar-right panel_toolbox">
                          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                          </li>
                        </ul>
                        <div class="clearfix"></div>
                      </div>
                      <div class="x_content">
                        <br />

                        <form id="add_graphics_form" name="add_graphics_form" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left">

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="subject_graphics">Subject Name<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="subject_graphics" name="subject_graphics" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>
												<!-- E n d F o r m!-->
						 
						  <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="about_graphics">About Course </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <textarea class="form-control" rows="4" id="about_graphics" name="about_graphics"></textarea>
                            </div>
                          </div>
												<!-- E n d F o r m!-->
						  <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="price_graphics">Course Price<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="price_graphics" name="price_graphics" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>
												<!-- E n d F o r m!-->
						  <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="image_graphics">Course Image<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="file" id="image_graphics" name="image_graphics" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>
													<!-- E n d F o r m!-->
						  <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="duration_graphics">Course Duration<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="duration_graphics" name="duration_graphics" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>
													<!-- E n d F o r m!-->
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="effort_graphics">Course Effort<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="effort_graphics" name="effort_graphics" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>
													<!-- E n d F o r m!-->
						  <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="certificate_graphics">Certifate<span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <select id="certificate_graphics" name="certificate_graphics" class="form-control">
                                <option selected="" value="">Select Department</option>
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                              </select>
                            </div>
                          </div>
												<!-- E n d F o r m!-->
						  <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="total_class_graphics">Total Class<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="total_class_graphics" name="total_class_graphics" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <div class="ln_solid"></div>
                          <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                              <button type="button" name="submit" id="submit" class="btn btn-success">ADD</button>
                              <button type="reset" name="reset" id="reset" class="btn btn-info">Reset</button>
                            </div>
                          </div>

                        </form>
                      </div>
                    </div>
                  </div>
                </div>

                 <div class="clearfix"></div>
                <div class="row">
                   <div class="col-md-12 col-sm-12 col-xs-12">
                      <div class="x_panel">
                        <div class="x_title">
                          <h2>Key Account Manager</h2>
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
                                <th>Course Subject</th>
                                <th>About Courses</th>
                                <th>Courses Price</th>
                                <th>Course Duration</th>
                                <th>Courses Effort</th>
                                <th>Image</th>
                                <th>Certificate</th>
                                <th>Total Class</th>
                                <th>Action</th>
                              </tr>
                            </thead>
                            
                            <tbody>
                              <?php 
                                $s1 = 1;
                                $sql_for_m_courses = "SELECT * FROM all_graphics";

                                $res_for_m_courses_mogli = mysqli_query($con, $sql_for_m_courses);

                                while ($row = mysqli_fetch_assoc($res_for_m_courses_mogli)) 
                                {
                              ?>
                              <tr>
                                <td><?php echo $s1; ?></td>
                                <td><?php echo $row['subject_graphics'] ?></td>

                                <td>
                                  <?php echo $row['about_graphics'] ?>
                                </td>
								
								<td>
                                  <?php echo $row['price_graphics'] ?>
                                </td>


                                <td>
                									<?php echo $row['duration_graphics'] ?>
                								</td>
                								
                								<td>
                									<?php echo $row['effort_graphics'] ?>
                								</td>
                								
                								<td>
                									<image class="" target="_blank" href="../../build/user_pic/<?=$row['image_graphics']?>" ><img src="../../build/user_pic/<?=$row['image_graphics']?>" height="70px" width="50px"/>
                								</td>
                								
                								<td>
                									<?php echo $row['certificate_graphics'] ?>
                								</td>
                								
                								<td>
                									<?php echo $row['total_class_graphics'] ?>
                								</td>

                                <td>
                                  <form action="edit_graphics.php" method="post" style="display: inline;">
                                    <input type="hidden" id="graphics_id" name="graphics_id" value="<?php echo $row['graphics_id']; ?>">
                                    <button type="submit" id="gray_issue_add_btn" name="gray_issue_add_btn" class="btn btn-primary btn-xs"> Edit </button>
                                  </form>
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
          if(document.getElementById("subject_graphics").value == "")
          {
              missing_alert("subject_graphics");
              return false;
          }
          else
          {
              var nicInstance = nicEditors.findEditor('about_graphics'); 
              var messageContent = nicInstance.getContent();
              var formdata = new FormData(document.getElementById('add_graphics_form'));
              formdata.append('about_graphics', messageContent);
              $.ajax({
              type: "POST",
              url: "add_graphics_saving.php",// where you wanna post
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
                    window.location = "graphics_list.php";
                }
              } 
            });
          }


      });
  });
  </script>
</body>
</html>