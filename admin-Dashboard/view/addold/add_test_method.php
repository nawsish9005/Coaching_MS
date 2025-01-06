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
                        <li>Settings</li>
                        <li>Add Test Method Name</li>
                    </ol>
                  </div>
                </div>

                <!-- main content again -->
                <div class="row">
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                      <div class="x_title">
                        <h2>Add Test Method Name Form</h2>
                        <ul class="nav navbar-right panel_toolbox">
                          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                          </li>
                        </ul>
                        <div class="clearfix"></div>
                      </div>
                      <div class="x_content">
                        <br />

                        <form id="add_customer_form" name="add_customer_form" data-parsley-validate class="form-horizontal form-label-left">
                            
                        
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
                                     
                                      if ($customers_row['test_name']==$row['test_name']) {
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
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="testmethod">Test Method <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="testmethod" name="testmethod" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="testmethod">Criteria (Testing Lab) <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                             
                               <select name="Lab" id="Lab" class="form-control col-md-7 col-xs-12">
                                <option value="" selected="selected">Select Lab</option>
                                  <option value="Physical_Lab">Physical Lab</option>
                                  <option value="Washing_Lab">Washing Lab</option>
                                  <option value="Chemical_Lab">Chemical Lab</option>
                                </select>
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
                                <th>Test Name</th>
                                <th> Method Name</th>
                                <th>Criteria (Testing Lab)</th>
                                <th>  </th>

                              </tr>
                            </thead>
                            
                            <tbody>
                              <?php                                

                                $s1 = 1;
                                 $sql_for_color = "SELECT * FROM savetestnames";

                                $res_for_color = mysqli_query($con, $sql_for_color);

                                while ($row = mysqli_fetch_assoc($res_for_color)) 
                                {
                              ?>
                              <tr>
                                <td><?php echo $s1; ?></td>
                                
                                <td><?php echo $row['TestName'] ?></td>
                                  <td><?php echo $row['testmethod'] ?></td>
                                    <td><?php echo $row['criteria'] ?></td> 
                                <td>
                                  <form action="edit_test_method.php" method="post" style="display: inline;">
                                    <input type="hidden" id="color_id" name="color_id" value="<?php echo $row['saveNameID']; ?>">
                                   
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
    <script type="text/javascript">
     $(document).ready(function(){ 

      $('#submit').click(function()
      {
          if(document.getElementById("testname").value == "")
          {
              missing_alert("testname");
              return false;
          }
           if(document.getElementById("testmethod").value == "")
          {
              missing_alert("Name");
              return false;
          }

           if(document.getElementById("Lab").value == "")
          {
              missing_alert("Criteria");
              return false;
          }
          else
          {
              var formdata = new FormData(document.getElementById('add_customer_form'));
              $.ajax({
              type: "POST",
              url: "add_test_method_saving.php",// where you wanna post
              data: formdata,
              processData: false,
              contentType: false,
              error: function(jqXHR, textStatus, errorMessage) 
              {
                  alert(errorMessage);
              },
              success: function(data) 
              {
                if (data == "Input Name") 
                {
                    info_alert(data);
                }

                else if(data == "Name Already Exists")
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