<?php
session_start();
require_once("../includes/db_session_chk.php");

if(isset($_POST["user_view"]) && $_POST["user_view"] == "user_view")
{
    $profile_user_id = $_POST["user"]
}
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
                <div class="breadcrumbs">
                    <div class="col-sm-4">
                        <div class="float-left">
                            <div class="page-title">
                                <h4>User Create Form</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="../home/dashboard.php">Dashboard</a></li>
                                    <li class="active">User Create</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>

                <!-- main content -->
                <div class="row">
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                      <div class="x_title">
                        <h2>Create User <small></small></h2>
                        <ul class="nav navbar-right panel_toolbox">
                          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                        </ul>
                        <div class="clearfix"></div>
                      </div>
                      <div class="x_content">
                        <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
                            <div class="profile_img">
                                <div id="crop-avatar">
                                  <img class="img-responsive avatar-view" src="../../build/user_pic/<?php echo $_SESSION["image_src"]; ?>" alt="Profile Image" title="Profile Image">
                                </div>
                            </div>
                            <h3><?php echo $_SESSION["first_name"]; ?></h3>

                            <ul class="list-unstyled user_data">
                                <li>
                                    <i class="fa fa-map-marker user-profile-icon"></i> Noman Group.
                                </li>
                                <li>
                                    <i class="fa fa-briefcase user-profile-icon"></i> <?php echo $_SESSION["designation"] ?>
                                </li>
                                <li class="m-top-xs">
                                    <i class="fa fa-external-link user-profile-icon"></i>
                                    <a href="#" target="_self"><?php echo $_SESSION["email"] ?></a>
                                </li>
                            </ul>

                            <a class="btn btn-success"><i class="fa fa-edit m-right-xs"></i>Edit Profile</a>
                            <br />
                        </div>
                        <div class="col-md-9 col-sm-9 col-xs-12">

                        <form data-parsley-validate class="form-horizontal form-label-left">

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first_name">First Name</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" disabled="disabled" style="cursor: text;" id="first_name" name="first_name" value="<?php echo $_SESSION["first_name"]; ?>" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last_name">Last Name</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="last_name" name="last_name" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="middle_name" class="control-label col-md-3 col-sm-3 col-xs-12">Middle Name / Initial</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="middle_name" name="middle_name" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="user_id">User ID</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="user_id" name="user_id" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="contact_no">Contact No.</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="contact_no" name="contact_no" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="department">Department</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="contact_no" name="contact_no" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="designation">Designation</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="contact_no" name="contact_no" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="user_type">User Type</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="contact_no" name="contact_no" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="status">User Status</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="contact_no" name="contact_no" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                        </form>
                        </div>
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

        $(document).ready(function () 
        {
        });
        
    </script>
</body>
</html>