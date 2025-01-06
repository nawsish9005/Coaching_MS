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
                        <!-- <li><a href="../add/customers_list.php">Customers Lists</a></li> -->
                        <li>Settings</li>
                        <li>Add Trainer</li>
                    </ol>
                  </div>
                </div>

                <!-- main content again -->
                <div class="row">
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                      <div class="x_title">
                        <h2>Add Trainer Form</h2>
                        <ul class="nav navbar-right panel_toolbox">
                          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                          </li>
                        </ul>
                        <div class="clearfix"></div>
                      </div>
                      <div class="x_content">
                        <br />

                        <form id="add_trainer_form" name="add_trainer_form" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="trainer_name">Trainer Name <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="trainer_name" name="trainer_name" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>
						  
						  <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="trainer_contact">Trainer Contact<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="trainer_contact" name="trainer_contact" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>
						  
						  <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="trainer_email">Trainer Email <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="trainer_email" name="trainer_email" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>
						  
						  <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="trainer_designation">Trainer Designation <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="trainer_designation" name="trainer_designation" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="trainer_description">Trainer Description 
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <textarea class="form-control" rows="4" id="trainer_description" name="trainer_description"></textarea>
                            </div>
                          </div>
						  
						  <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="experience">Experience <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="experience" name="experience" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>
						  
						  <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="specializing_skill">Specializing Skill 
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <textarea class="form-control" rows="4" id="specializing_skill" name="specializing_skill"></textarea>
                            </div>
                          </div>
						  
						  <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="trainer_image">Trainer Image <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="file" id="trainer_image" name="trainer_image" class="form-control col-md-7 col-xs-12">
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
                          <h2>Customers</h2>
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
                                <th>Trainer Name</th>
                                <th>Trainer Contact</th>
                                <th>Trainer Email</th>
                                <th>Trainer Designation</th>
                                <th>Trainer Description</th>
                                <th>Experience</th>
                                <th>Specializing Skill</th>
                                <th>Trainer Image</th>
                                <th>Action</th>
                              </tr>
                            </thead>
                            
                            <tbody>
                              <?php 
                                $s1 = 1;
                                $sql_for_trainers = "SELECT * FROM mowgli_trainer";

                                $res_for_trainers = mysqli_query($con, $sql_for_trainers);

                                while ($row = mysqli_fetch_assoc($res_for_trainers)) 
                                {
                              ?>
                              <tr>
                                <td><?php echo $s1; ?></td>
                                <td><?php echo $row['trainer_name'] ?></td>
                                <td><?php echo $row['trainer_contact'] ?></td>
                                <td><?php echo $row['trainer_email'] ?></td>
                                <td><?php echo $row['trainer_designation'] ?></td>
                                <td><?php echo $row['trainer_description'] ?></td>
                                <td><?php echo $row['experience'] ?></td>
                                <td><?php echo $row['specializing_skill'] ?></td>
								<td>
									<image class="" target="_blank" href="../../build/user_pic/<?=$row['trainer_image']?>" ><img src="../../build/user_pic/<?=$row['trainer_image']?>" height="70px" width="50px"/>
								</td>

                                <td>
                                  <form action="edit_trainers.php" method="post" style="display: inline;">
                                    <input type="hidden" id="trainer_id" name="trainer_id" value="<?php echo $row['trainer_id']; ?>">
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
        /* if(document.getElementById("customer_address").value == "")
          {
              missing_alert("customer_address");
              return false;
          }
          if(document.getElementById("customer_country").value == "")
          {
              missing_alert("customer_country");
              return false;
          }
          if(document.getElementById("phone_number").value == "")
          {
              missing_alert("phone_number");
              return false;
          }*/

          else
          {
              var formdata = new FormData(document.getElementById('add_trainer_form'));
              $.ajax({
              type: "POST",
              url: "add_trainer_saving.php",// where you wanna post
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