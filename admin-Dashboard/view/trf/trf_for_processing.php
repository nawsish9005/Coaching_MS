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
                        <li>Process Lists</li>
                    </ol>
                  </div>
                </div>

                <!-- main content again -->
                <div class="clearfix"></div>
                <div class="row">
                   <div class="col-md-12 col-sm-12 col-xs-12">
                      <div class="x_panel">
                        <div class="x_title">
                          <h2>Process</h2>
                          <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                          </ul>
                          <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
						<form id="process" name="process" method='get' action = 'trf_fabric_information.php' target ='_blank'>
                          <table id="process_list_table" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%"
                            <thead>
                              <tr>
                                <th style="width : 20px">Selection</th>
                                <th>Process Name</th>
                                <th></th>
                              </tr>
                            </thead>
                            
                            <tbody>
                              <?php 
                                $s1 = 1;
                                $sql_for_process = "SELECT * FROM ROUTE";

                                $res_for_process = mysqli_query($con, $sql_for_process);

                                while ($row = mysqli_fetch_assoc($res_for_process)) 
                                {
                              ?>
                              <tr>
								
                                <td style="width : 20px"><?php echo '<input type="checkbox" id="route" name="route[]" value="'.$row["route_id"].'">'; ?></td>
                                <td><?php echo $row['route_name'] ?></td>
                                <td>
                                  <input type='hidden' id='total_route' name='total_route' value='' >
                                </td>
                              </tr>
                              <?php 
                                ++$s1;
                               }
							   echo  "<input type='hidden' id='total_route' name='total_route' value='".$s1."' >"
                              ?>
                            </tbody>
                          </table>
						   <button type="submit" class="btn btn-success" >Submit</button>
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

 
<script>

	$(document).ready(function () 
        {
            $('#process_list_table').DataTable(
            {
                dom: "Blfrtip",
				        pageLength: 30
                //scrollY:  "350px",
               
            });
        });
        
    </script>
</body>
</html>"