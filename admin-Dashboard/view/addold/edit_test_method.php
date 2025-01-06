<?php
session_start();
require_once("../includes/db_session_chk.php");
$color_id = $_POST['color_id'];
$test_name = $_POST['TestName'];
$testmethod = $_POST['testmethod'];
$criteria = $_POST['criteria'];





$sql = "SELECT * FROM savetestnames where saveNameID = '$color_id'";
//$sql = "SELECT * FROM testnames WHERE name_ID = '$color_id'";
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
                        <li><a href="add_test_method.php">Add Test Method</a></li>
                        <li>Edit Test Method</li>
                    </ol>
                  </div>
                </div>

                <!-- main content again -->
                <div class="row">
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                      <div class="x_title">
                        <h2>Edit Test Method Form</h2>
                        <ul class="nav navbar-right panel_toolbox">
                          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                          </li>
                        </ul>
                        <div class="clearfix"></div>
                      </div>
                      <div class="x_content">
                        <br />

                        <form id="add_color_form" name="add_color_form" data-parsley-validate class="form-horizontal form-label-left">

                          <!-- <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="color">Test Name <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">                              


                              <select  id="color" name="color" class="customer_issue select2 form-control col-md-12 col-xs-12">
                                 <option value="" selected="selected">Select Method</option>

                                <?php



                                  $customers_sql = "SELECT * FROM testnames ORDER BY name_ID";
                                  $customers_res = mysqli_query($con, $customers_sql) or die(mysqli_error($con));
                                  while ($customers_row = mysqli_fetch_assoc($customers_res)) 
                                  {
                                     
                                      if ($customers_row['test_name']==$row['TestName']) {
                                        # code...
                                        echo "<option selected='selected' value='".$customers_row['test_name']."'>";
                                        echo $customers_row['test_name'];
                                        echo "</option>";

                                      }
                                      else
                                      {
                                         echo "<option value='".$customers_row['test_name']."'>";
                                          echo $customers_row['test_name'];
                                          echo "</option>";
                                      }
                                  }
                                ?>
                              </select>






                            </div>

                          </div>



 -->
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="testmethod">Test Name<span class="required">*</span>
                            </label>


                            <!-- <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="testname" name="testname" value="<?php  echo $row['TestName']?>" class="form-control col-md-7 col-xs-12">
        


                              

                            </div> -->

                            <div class="col-md-6 col-sm-6 col-xs-12">                              


                              <select  id="testname" name="testname" class="customer_issue select2 form-control col-md-12 col-xs-12">
                                 <option value="" selected="selected">Select Name</option>

                                <?php



                                  $customers_sql = "SELECT * FROM testnames ";
                                  $customers_res = mysqli_query($con, $customers_sql) or die(mysqli_error($con));
                                  while ($customers_row = mysqli_fetch_assoc($customers_res)) 
                                  {
                                     
                                      if ($customers_row['test_name']==$row['TestName']) {
                                        # code...
                                        echo "<option selected='selected' value='".$customers_row['test_name']."'>";
                                        echo $customers_row['test_name'];
                                        echo "</option>";

                                      }
                                      else
                                      {
                                         echo "<option value='".$customers_row['test_name']."'>";
                                          echo $customers_row['test_name'];
                                          echo "</option>";
                                      }
                                  }
                                ?>
                              </select>

                            </div>

                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="testmethod">Test Method<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="testmethod" name="testmethod" value="<?php  echo $row['testmethod']?>" class="form-control col-md-7 col-xs-12">
        


                              <input type="hidden" id="saveNameID" name="saveNameID" value="<?php echo $row['saveNameID'] ?>">

                            </div>

                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="color">Criteria (Testing Lab)<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                             
                               <select name="Lab" id="Lab" class="form-control col-md-7 col-xs-12">
                                <?php $criteria = $row['criteria']; ?>
                                <?php 
                                  if ($criteria == 'Physical_Lab')
                                  {
                                      ?>
                                          <option value="Physical_Lab" selected >Physical Lab</option>
                                          <option value="Washing_Lab" >Washing Lab</option>
                                          <option value="Chemical_Lab" >Chemical Lab</option>
                                      <?php 
                                  } 

                                  elseif ($criteria == 'Washing_Lab') 
                                  {
                                      ?>
                                          <option value="Physical_Lab" >Physical Lab</option>
                                          <option value="Washing_Lab" selected >Washing Lab</option>
                                          <option value="Chemical_Lab" >Chemical Lab</option>
                                      <?php 
                                  }

                                  else
                                  {
                                      ?>
                                          <option value="Physical_Lab" >Physical Lab</option>
                                          <option value="Washing_Lab" >Washing Lab</option>
                                          <option value="Chemical_Lab" selected >Chemical Lab</option>
                                      <?php 
                                  }
                                ?>

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
          if(document.getElementById("testname").value == "")
          {
              info_alert("testname");
              return false;
          }
         
          else
          {
            
              var formdata = new FormData(document.getElementById('add_color_form'));
              $.ajax({
              type: "POST",
              url: "edit_test_method_saving.php",// where you wanna post
              data: formdata,
              processData: false,
              contentType: false,
              error: function(jqXHR, textStatus, errorMessage) 
              {
                  alert(errorMessage);
              },
              success: function(data) 
              {
                 if(data == "Data Not Inserted")
                {
                    info_alert(data);
                }

                else
                {
                    info_alert(data);
                    window.location = "test_method_list.php";
                }
              } 
            });
          }


      });
  });
  </script>
</body>
</html>