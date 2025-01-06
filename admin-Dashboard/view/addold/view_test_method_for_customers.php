<?php
session_start();
require_once("../includes/db_session_chk.php");
$customers_id = $_POST['customers_id'];

$sql = "SELECT * FROM customers WHERE customers_id = '$customers_id'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">

<?php
require_once('../includes/header.php');
?>


<!-- Bootstrap -->
<link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Font Awesome -->
<link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
<!-- NProgress -->
<link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
<!-- iCheck -->
<link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
<!-- bootstrap-wysiwyg -->
<link href="../vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">
<!-- Select2 -->
<link href="../vendors/select2/dist/css/select2.min.css" rel="stylesheet">
<!-- Switchery -->
<link href="../vendors/switchery/dist/switchery.min.css" rel="stylesheet">
<!-- starrr -->
<link href="../vendors/starrr/dist/starrr.css" rel="stylesheet">
<!-- bootstrap-daterangepicker -->
<link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

<!-- Custom Theme Style -->
<link href="../build/css/custom.min.css" rel="stylesheet">

</head>
<body class="nav-md">
    <div class="container body">
        <div class="

            <!-- page content -->main_container">

            <?php
            require_once('../includes/sidebar.php');
            require_once('../includes/top_nav.php');
            ?>
            <div class="right_col" role="main" style="margin-bottom: 10px;">
              <div class="">
                <div class="page-title">
                  <div class="title_left">
                    <ol class="breadcrumb">
                        <li><a href="../home/dashboard.php">Dashboard</a></li>
                        <li>Settings</li>
                        <li><a href="add_methodSelection.php">Add Test Method for Customer</a></li>
                        <li>Customer Wise Test Method Lists</li>
                    </ol>
                  </div>
                </div>
                <!-- main content again -->
                <div class="clearfix"></div>
                <div class="row">
                   <div class="col-md-12 col-sm-12 col-xs-12">
                      <div class="x_panel">
                        <div class="x_title">
                          <h2>Add Test Method Form</h2>
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
                            

                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="customer">Customer Name <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="customer" readonly name="customer" value="<?php echo $row['customers_name'] ?>" class="form-control col-md-7 col-xs-12">
                              <input type="hidden" id="customers_name" name="customers_name" value="<?php echo $row['customers_name'] ?>">
                              <input type="hidden"  type="text" id="demo2" name="demo2" value="">



                          </div>
                          </div>



                          <div class="ln_solid"></div>
                          <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            </div>
                          </div>

                        </form>
                      </div>






                        <div class="x_content">
                          <table id="datatable-buttons" class="table table-striped table-bordered">
                            <thead>
                              <tr>
                                <th>SI</th>
                                <th>Test Names</th>
                                <th>Test Method</th>

                              </tr>
                            </thead>
                            
                            <tbody>


                              <?php                                
                                $s1 = 1;
                                $customers_nameCheck= $row['customers_name'] ;


                                $sql_for_color = "SELECT * FROM savetestnames";

                                $res_for_color = mysqli_query($con, $sql_for_color);

                                while ($row = mysqli_fetch_assoc($res_for_color)) 
                                {
                                    $saveNameIDCheck=$row['saveNameID'];
                                    $sql_for_duplicate = "SELECT * FROM `customer_selection` WHERE `saveNameID`='$saveNameIDCheck' and `cutomer_name`='$customers_nameCheck' "; 
                                    $res_for_duplicate = mysqli_query($con, $sql_for_duplicate);
                                    $row_for_duplicate = mysqli_num_rows($res_for_duplicate);
                                    if ($row_for_duplicate >= 1) 
                                    {
                                        ?>
                                          <tr>
                                            <td><?php echo $s1; ?></td>                                
                                            <td><?php echo $row['TestName'] ?></td>
                                            <td><?php echo $row['testmethod'] ?></td>
                                          </tr>  
                                        <?php
                                    }
                                    ++$s1;
                               }

                              ?>
                              <?php

                              $name = $_GET['color'];

                              // optional
                              // echo "You chose the following color(s): <br>";

                              foreach ($name as $color){ 
                                  echo $color."<br />";
                              }

                              ?>

                            </tbody>
                          </table>



                              <!-- <button type="button" name="submit" id="submit" class="btn btn-success" onclick="selection12()">ADD</button> -->
                          <p id="text" style="display:none">Checkbox is CHECKED!</p>

                          <?php 
                            
                            
                           echo "<p id='demo'></p>";


                          ?> 
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

    
    <script type="text/javascript">
     
      function selection12()
      {
            var total_length = document.getElementsByName('copy_test_box_select').length;
            var checkResult = Array();
            var i;
            var j=0;
            for (i=0; i< total_length; i++) 
            {
                if (document.getElementsByName('copy_test_box_select')[i].checked) 
                {

                    checkResult[j] = document.getElementsByName('copy_test_box_select')[i].value;
                                                         alert(checkResult[j]);

                j++;
                }

            }

         

            // var arr = [ "John", "Peter1", "Sally", "Jane" ];
            var myJSON = JSON.stringify(checkResult);
            // document.getElementById("demo2").value = myJSON;
                         // Converting JSON data to string 
                        
             var inputF = document.getElementById("demo2"); 
              
             inputF.value = checkResult; 
      

       
              var formdata = new FormData(document.getElementById('add_customer_form'));
              var demo2=document.getElementById("demo2").value;
              
              $.ajax({
              type: "POST",
              url: "SaveCustomerMethodSelection.php",// where you wanna post
              data: formdata,
              processData: false,
              contentType: false,
              error: function(jqXHR, textStatus, errorMessage) 
              {
                  alert(errorMessage);
              },
              success: function(data) 
              {
                alert("successfully Added Test Method Aginst Customer");
                
                   //info_alert(data);
                   window.location = "navidcustomers_list.php";
                
              } 
            });
          

 }
      
    </script>



       <?php
    require_once('../includes/footer.php');
    ?>




  <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="../vendors/moment/min/moment.min.js"></script>
    <script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap-wysiwyg -->
    <script src="../vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
    <script src="../vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
    <script src="../vendors/google-code-prettify/src/prettify.js"></script>
    <!-- jQuery Tags Input -->
    <script src="../vendors/jquery.tagsinput/src/jquery.tagsinput.js"></script>
    <!-- Switchery -->
    <script src="../vendors/switchery/dist/switchery.min.js"></script>
    <!-- Select2 -->
    <script src="../vendors/select2/dist/js/select2.full.min.js"></script>
    <!-- Parsley -->
    <script src="../vendors/parsleyjs/dist/parsley.min.js"></script>
    <!-- Autosize -->
    <script src="../vendors/autosize/dist/autosize.min.js"></script>
    <!-- jQuery autocomplete -->
    <script src="../vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
    <!-- starrr -->
    <script src="../vendors/starrr/dist/starrr.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>

</body>
</html>