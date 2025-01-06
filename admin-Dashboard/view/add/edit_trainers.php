<?php
session_start();
require_once("../includes/db_session_chk.php");
$trainer_id= $_POST['trainer_id'];

$sql = "SELECT * FROM mowgli_trainer WHERE trainer_id='$trainer_id'";
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
                        <li><a href="add_trainer.php">Add Trainer</a></li>
                        <li>Edit Trainers</li>
                    </ol>
                  </div>
                </div>

                <!-- main content again -->
                <div class="row">
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                      <div class="x_title">
                        <h2>Edit Trainer Form</h2>
                        <ul class="nav navbar-right panel_toolbox">
                          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                          </li>
                        </ul>
                        <div class="clearfix"></div>
                      </div>
                      <div class="x_content">
                        <br />

                        <form id="add_trainers_form" name="add_trainers_form" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">

						  <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="trainer_name">Trainer Name<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="trainer_name" name="trainer_name" value="<?php echo $row['trainer_name'] ?>" class="form-control col-md-7 col-xs-12">
                              <input type="hidden" id="trainer_id" name="trainer_id" value="<?php echo $row['trainer_id'] ?>">
                            </div>
                        </div>
						
						<div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="trainer_contact">Trainer Contact<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="trainer_contact" name="trainer_contact" value="<?php echo $row['trainer_contact'] ?>" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
						
						<div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="trainer_email">Trainer Email<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="trainer_email" name="trainer_email" value="<?php echo $row['trainer_email'] ?>" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
						
						<div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="trainer_designation">Trainer Designation<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="trainer_designation" name="trainer_designation" value="<?php echo $row['trainer_designation'] ?>" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="trainer_description">Customer Description 
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                            <textarea class="form-control" rows="4" id="trainer_description" name="trainer_description"><?php echo $row['trainer_description'] ?></textarea>
                            </div>
                         </div>
						  
						<div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="experience">Trainer Experience<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="experience" name="experience" value="<?php echo $row['experience'] ?>" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
						
						<div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="specializing_skill">Specializing Skill 
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                            <textarea class="form-control" rows="4" id="specializing_skill" name="specializing_skill"><?php echo $row['specializing_skill'] ?></textarea>
                            </div>
                         </div>
						
						<div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="trainer_image">Trainer Image<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="file" id="trainer_image" name="trainer_image" value="<?php echo $row['trainer_image'] ?>" class="form-control col-md-7 col-xs-12">
                              <img src="../../build/user_pic/<?php echo $row['trainer_image'] ?>" height="60" width="60"/> 
                            </div>
							<div>
								<input type="hidden" name="trainer_image" value="<?php echo $row['trainer_image'] ?>" />
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



      $('#submit').click(function()
      {
          if(document.getElementById("trainer_name").value == "")
          {
              missing_alert("trainer_name");
              return false;
          }
          else
          {
              var formdata = new FormData(document.getElementById('add_trainers_form'));
              $.ajax({
              type: "POST",
              url: "edit_trainer_saving.php",// where you wanna post
              data: formdata,
              processData: false,
              contentType: false,
              error: function(jqXHR, textStatus, errorMessage) 
              {
                  alert(errorMessage);
              },
              success: function(data) 
              {
                  if (data == "Input Trainer Name") 
                  {
                      info_alert(data);
                  }

                  else if(data == "Trainer Name Already Exists")
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
                      window.location = "trainers_list.php";
                  }
              } 
            });
          }


      });
  });
  </script>
</body>
</html>