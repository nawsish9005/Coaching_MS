<?php
$sql_for_logged_user = "SELECT * FROM `user_login` WHERE user_id = '".$_SESSION['edfms_user_id']."'";
$result_for_logged_user = mysqli_query($con, $sql_for_logged_user);
$row_for_logged_user = mysqli_fetch_assoc($result_for_logged_user);

$sql_for_logged_user_access_management = "SELECT * FROM `user_access_management` WHERE user_id = '".$_SESSION['edfms_user_id']."'";
$result_for_logged_user_access_management = mysqli_query($con, $sql_for_logged_user_access_management);
while ($row_for_logged_user_access_management = mysqli_fetch_array($result_for_logged_user_access_management)) 
{
    $user_id = $row_for_logged_user_access_management['user_id'];

    $access_check_users = $row_for_logged_user_access_management['users'];
    $access_check_create_user = $row_for_logged_user_access_management['create_user'];
    $access_check_user_list = $row_for_logged_user_access_management['user_list'];

    $access_check_files = $row_for_logged_user_access_management['files'];
    $access_check_file_create = $row_for_logged_user_access_management['file_create'];
    $access_check_file_list = $row_for_logged_user_access_management['file_list'];

    $access_check_lc_and_pi = $row_for_logged_user_access_management['lc_and_pi'];
    $access_check_lc_and_pi_doc = $row_for_logged_user_access_management['lc_and_pi_doc'];
    $access_check_lc_and_pi_acceptance_doc = $row_for_logged_user_access_management['lc_and_pi_acceptance_doc'];

    $access_check_b2b = $row_for_logged_user_access_management['b2b'];
    $access_check_b2b_lc_and_pi_weave_doc = $row_for_logged_user_access_management['b2b_lc_and_pi_weave_doc'];
    $access_check_b2b_lc_and_pi_spin_doc = $row_for_logged_user_access_management['b2b_lc_and_pi_spin_doc'];
    $access_check_b2b_doc_weave_doc = $row_for_logged_user_access_management['b2b_doc_weave_doc'];
    $access_check_b2b_doc_spin_doc = $row_for_logged_user_access_management['b2b_doc_spin_doc'];

    $access_check_btma_and_cash = $row_for_logged_user_access_management['btma_and_cash'];
    $access_check_btma_weave_doc = $row_for_logged_user_access_management['btma_weave_doc'];
    $access_check_btma_spin_doc = $row_for_logged_user_access_management['btma_spin_doc'];
    $access_check_cash_weave_doc = $row_for_logged_user_access_management['cash_weave_doc'];

    $access_check_banking = $row_for_logged_user_access_management['banking'];
    $access_check_banking_bank_acceptance_doc = $row_for_logged_user_access_management['banking_bank_acceptance_doc'];

    $access_check_prc = $row_for_logged_user_access_management['prc'];
    $access_check_prc_duration_doc = $row_for_logged_user_access_management['prc_duration_doc'];

    $access_check_others = $row_for_logged_user_access_management['others'];
    $access_check_backup_docs = $row_for_logged_user_access_management['backup_doc'];

    $access_check_settings = $row_for_logged_user_access_management['settings'];
}
?>
            <div class="col-md-3 left_col">
              <div class="left_col scroll-view">
                <div class="navbar nav_title" style="border: 0;">
                  <a href="../home/dashboard.php" class="site_title">
                    <!-- <i class="fa fa-paw"></i> -->
                    <img src="../../build/images/logo1.png" alt="..." style="width: 30px; margin-bottom: 4px; background: #ffffff;" class="img-circle">
                    <span>Mowgli IT</span>
                  </a>
                </div>

                <div class="clearfix"></div>

                <!-- menu profile quick info -->
                <div class="profile clearfix">
                  <div class="profile_pic">
                    <img src="../../build/user_pic/<?php echo $row_for_logged_user['image_src'] ?>" alt="..." class="img-circle profile_img">
                  </div>
                  <div class="profile_info">
                    <span>Welcome,</span>
                    <h2><?php echo $row_for_logged_user['first_name'] ?></h2>
                  </div>
                </div>
                <!-- /menu profile quick info -->

                <br />

                <!-- sidebar menu -->
                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                  <div class="menu_section">
                    <h3>General</h3>
                    <ul class="nav side-menu">

                      <?php
                      if($access_check_users == 1)
                      {
                        echo '<li><a><i class="fa fa-users"></i>Users <span class="fa fa-chevron-down"></span></a>';
                          echo '<ul class="nav child_menu">';
                          if($access_check_create_user == 1)
                            echo '<li><a href="../user/user_create.php">Create User</a></li>';
                          if($access_check_user_list == 1)
                            echo '<li><a href="../user/user_list.php">User List</a></li>';
                          echo '</ul>';
                        echo '</li>';
                      }
                      ?>

                      <?php
                      if($access_check_users == 1)
                      {
                        echo '<li><a><i class="fa fa-plus"></i>Settings (Add) <span class="fa fa-chevron-down"></span></a>';
                          echo '<ul class="nav child_menu">';
						
						if($access_check_create_user == 1)
                            echo '<li><a href="../add/add_graphics.php">Add Graphics</a></li>';

                          if($access_check_create_user == 1)
                            echo '<li><a href="../add/add_digital.php">Add Digital Marketing</a></li>';
						
						if($access_check_create_user == 1)
                            echo '<li><a href="../add/add_web.php">Add Web Design Development</a></li>';

                            if($access_check_create_user == 1)
                            echo '<li><a href="../add/add_trainer.php">Add Trainers</a></li>';
						
                          echo '</ul>';
                        echo '</li>';
                      }
                      ?>

                      <?php
                      if($access_check_files == 1)
                      {
                        echo '<li><a><i class="fa fa-ticket"></i>Students List <span class="fa fa-chevron-down"></span></a>';
                          echo '<ul class="nav child_menu">';

                          if($access_check_file_create == 1)
                            echo '<li><a href="../add/students_list.php">Students List</a></li>';

                          //if($access_check_file_create == 1)
                            //echo '<li><a href="../pp_new/pp_wise_version_create.php">PP Wise Version Creation</a></li>';


                          echo '</ul>';
                        echo '</li>';
                      }
                      ?>


                      <?php
                      if($access_check_files == 1)
                      {
                        echo '<li><a><i class="fa fa-ticket"></i>Greige Receiving <span class="fa fa-chevron-down"></span></a>';
                          echo '<ul class="nav child_menu">';
                          // if($access_check_file_list == 1)
                          //   echo '<li><a href="../gray_issue/gray_issue.php">Gray Issue</a></li>';
                          if($access_check_file_list == 1)
                            echo '<li><a href="../greige_issunce/define_process_wise_standard.php">Greige Receiving Acceptance Criteria</a></li>';
                          if($access_check_file_list == 1)
                            echo '<li><a href="../greige_issunce/greige_issunce.php">Version Wise Greige Receiving</a></li>';
                          echo '</ul>';
                        echo '</li>';
                      }
                      ?>

                     
                      
                      
                    </ul>
                  </div>

                </div>
                <!-- /sidebar menu -->

                <!-- /menu footer buttons -->
                <div class="sidebar-footer hidden-small">
                  <!-- <a data-toggle="tooltip" data-placement="top" title="Settings">
                    <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                  </a>
                  <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                    <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                  </a>
                  <a data-toggle="tooltip" data-placement="top" title="Lock">
                    <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                  </a> -->
                  <a data-toggle="tooltip" data-placement="top" title="Logout" href="../includes/logout.php">
                    <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                  </a>
                </div>
                <!-- /menu footer buttons -->
              </div>
            </div>




