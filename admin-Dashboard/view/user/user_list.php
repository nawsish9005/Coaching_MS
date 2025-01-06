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
                        <li class="active">User List</li>
                    </ol>
                  </div>
                </div>

                <!-- main content -->
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>All User <small></small></h2>
                                <ul class="nav navbar-right panel_toolbox">
                                  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <table id="user_list_table" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                  <thead>
                                    <tr>
                                      <th>Sl.</th>
                                      <th>First Name</th>
                                      <th>Last Name</th>
                                      <th>User ID</th>
                                      <th>Email</th>
                                      <th>Contact No.</th>
                                      <th>Department</th>
                                      <th>Designation</th>
                                      <th>User Type</th>
                                      <th>Status</th>
                                      <?php
                                      if($_SESSION['edfms_user_type'] == "Super Admin")
                                      {
                                        echo "<th>View</th>";
                                        echo "<th>Action</th>";
                                      }
                                      ?>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php

                                    if ($edfms_logged_user_type == "super_admin") 
                                    {
                                        $sql_for_user = "SELECT usl.*,
                                                            depi.department_name,
                                                            desi.short_form
                                                       FROM `user_login` usl
                                                  LEFT JOIN `department_info` depi ON usl.department = depi.id
                                                  LEFT JOIN `designation_info` desi ON usl.designation = desi.id
                                                   ORDER BY usl.id";
                                    }

                                    else
                                    {
                                        $sql_for_user = "SELECT usl.*,
                                                            depi.department_name,
                                                            desi.short_form
                                                       FROM `user_login` usl
                                                  LEFT JOIN `department_info` depi ON usl.department = depi.id
                                                  LEFT JOIN `designation_info` desi ON usl.designation = desi.id
                                                  WHERE NOT user_type = 'super_admin'
                                                   ORDER BY usl.id";
                                    }
                                    
                                    $res_for_user = mysqli_query($con, $sql_for_user);
                                    $sl = 0;

                                    while ($row = mysqli_fetch_assoc($res_for_user)) 
                                    {

                                    ?>

                                    <tr>
                                        <td><?php echo ++$sl ?></td>
                                        <td><?php echo $row['first_name']; ?> </td>
                                        <td><?php echo $row['last_name']; ?> </td>
                                        <td><?php echo $row['user_id']; ?> </td>
                                        <td><?php echo $row['email']; ?> </td>
                                        <td><?php echo $row['contact_no']; ?> </td>
                                        <td><?php echo $row['department_name']; ?> </td>
                                        <td><?php echo $row['short_form']; ?> </td>
                                        <td><?php echo $row['user_type']; ?> </td>
                                        <td><?php echo $row['status']; ?> </td>

                                        <?php
                                        if($_SESSION['edfms_user_type'] == "Super Admin")
                                        {
                                            echo '<td>
                                                    <button type="button" id="user_view'.$sl.'" value="'.$row['id'].'" onclick="user_view_function(\'user_view'.$sl.'\')" class="btn btn-success btn-xs"  data-toggle="modal" data-target=".user-view-modal-lg">
                                                        VIEW
                                                    </button>
                                                  </td>';
                                            echo '<td>
                                                    <button type="button" id="" value="" onclick="sending_data_of_user_list_form_for_deleting_in_database(\''.$row['id'].'\')" class="btn btn-danger btn-xs">
                                                        DELETE
                                                    </button>
                                                  </td>';
                                        }
                                        ?>
                                    </tr>

                                    <?php
                                        }
                                    ?>
                                  </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /main content -->

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

        function sending_data_of_user_list_form_for_deleting_in_database(del_id)
        {
            if (window.XMLHttpRequest)
            {
                var xmlhttp = new XMLHttpRequest();
            }
            else
            {
                var xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }

            xmlhttp.open("POST","user_profile_deleting.php",true);
            xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xmlhttp.send("id=" + del_id);  
            xmlhttp.onreadystatechange = function()
            {
                if (xmlhttp.readyState != 4) // Means data is not received from server.
                {

                }
                if (xmlhttp.readyState == 4)
                {
                    var data = xmlhttp.responseText;
                    if(data == "User profile delete is failed!")
                    {
                        fail_alert(data,"user_list.php","Sorry!");
                    }
                    else
                    {
                        success_alert(data,"user_list.php","Success!");
                    }
                }
            }

        } // End of function sending_data_of_user_list_form_for_deleting_in_database()
        
        function user_view_function(serial) 
        {

            var id = document.getElementById(serial).value;
            var xmlhttp;

            if (window.XMLHttpRequest) 
            {
                xmlhttp = new XMLHttpRequest();
            }
            else 
            {
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }

            xmlhttp.open("POST", "finding_user.php", true);
            xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xmlhttp.send("id=" + id);

            xmlhttp.onreadystatechange = function () {

                if (xmlhttp.readyState != 4) // Means data is not received from server.
                {
                }
                if (xmlhttp.readyState == 4) 
                {
                    var data = xmlhttp.responseText;
                    document.getElementById("user_profile_view").innerHTML = data;
                }

            }
        }

    </script>

    <script type="text/javascript">

        $(document).ready(function () 
        {
            $('#user_list_table').DataTable(
            {
                dom: "Blfrtip",
                buttons: 
                [
                    {
                      extend: "copy",
                      className: "btn-sm"
                    },
                    {
                      extend: "csv",
                      className: "btn-sm"
                    },
                    {
                      extend: "excel",
                      className: "btn-sm"
                    },
                    {
                      extend: "pdfHtml5",
                      className: "btn-sm"
                    },
                    {
                      extend: "print",
                      className: "btn-sm"
                    },
                ],
            });
        });
        
    </script>
</body>
</html>