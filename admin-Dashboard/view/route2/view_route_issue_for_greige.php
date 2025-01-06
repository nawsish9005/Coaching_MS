<?php
session_start();
require_once("../includes/db_session_chk.php");
$greige_issunce_id = $_POST['greige_issunce_id'];
$pp_no_id = $_POST['pp_no_id'];
$pp_details_id = $_POST['pp_details_id'];
$route_issue_id = $_POST['route_issue_id'];
?>

<div class="x_panel">
    <div class="x_title">
      <h2>Route Issue</h2>
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
            <th>Route</th>
            <th>Process/Reprocess</th>
            <th>Action</th>
          </tr>
        </thead>

        <tbody>
          <?php
            $s1 = 1;
            $sql_for_pp = "SELECT *
                           FROM
                            (SELECT * FROM route_issue WHERE greige_issunce_id = '1' AND active = '1' ORDER BY id DESC) AS t
                           GROUP BY route_issue_id
                           ";

            $res_for_pp = mysqli_query($con, $sql_for_pp);
            while ($row = mysqli_fetch_assoc($res_for_pp))
            {
              ?>
              <tr>
                <td><?php echo $s1; ?></td>
                <td>
                  <?php
                    $route_id = $row['route'];
                    $sql_for_route = "SELECT route_name FROM route WHERE route_id = '$route_id'";
                    $res_for_route = mysqli_query($con, $sql_for_route);
                    $row_for_route = mysqli_fetch_assoc($res_for_route);
                    echo $row_for_route['route_name'];
                   ?>
                </td>
                <td><?php echo $row['process'] ?></td>
                <td>
                  <?php
                    $route_id = $row['route'];
                    $active_now = $row['active'];
                    $complete = $row['complete'];
                    if ($complete == 0)
                    {
                      if ($route_id == 1)
                      {
                        $route_action_path = "../singe/add_singe.php";
                      }
                      elseif ($route_id == 2)
                      {
                        $route_action_path = "../bleaching/add_bleaching.php";
                      }
                      elseif ($route_id == 3)
                      {
                        $route_action_path = "../mercerize/add_mercerize.php";
                      }
                      elseif ($route_id == 4)
                      {
                        $route_action_path = "../ready_mercerize/add_ready_mercerize.php";
                      }
                      elseif ($route_id == 5)
                      {
                        $route_action_path = "../equalize/add_equalize.php";
                      }
                      elseif ($route_id == 6)
                      {
                        $route_action_path = "../printing/add_printing.php";
                      }
                      elseif ($route_id == 7)
                      {
                        $route_action_path = "../curing_steaming/add_curing_steaming.php";
                      }
                      elseif ($route_id == 8)
                      {
                        $route_action_path = "../dyeing/add_dyeing.php";
                      }
                      elseif ($route_id == 9)
                      {
                        $route_action_path = "../washing/add_washing.php";
                      }
                      elseif ($route_id == 10)
                      {
                        $route_action_path = "../finishing/add_finishing.php";
                      }
                      elseif ($route_id == 11)
                      {
                        $route_action_path = "../calender/add_calender.php";
                      }
                      elseif ($route_id == 12)
                      {
                        $route_action_path = "../sanforize/add_sanforize.php";
                      }
                      else
                      {
                        $route_action_path = "../raising/add_raising.php";
                      }

                      ?>
                        <form action="<?php echo $route_action_path; ?>" method="post" style="display: inline;">
                          <input type="hidden" id="route_issue_id" name="route_issue_id" value="<?php echo $row['route_issue_id']; ?>">
                          <input type="hidden" id="greige_issunce_id" name="greige_issunce_id" value="<?php echo $row['greige_issunce_id']; ?>">
                          <button type="submit" id="gray_issue_add_btn" name="gray_issue_add_btn" class="btn btn-primary btn-xs">
                              Add
                          </button>
                        </form>
                      <?php
                    }

                    else 
                    {
                      if ($route_id == 1)
                      {
                        $route_action_path = "../singe/edit_singe.php";
                        $route_view = "../singe/view_singe.php";
                      }
                      elseif ($route_id == 2)
                      {
                        $route_action_path = "../bleaching/edit_bleaching.php";
                        $route_view = "../bleaching/view_bleaching.php";
                      }
                      elseif ($route_id == 3)
                      {
                        $route_action_path = "../mercerize/edit_mercerize.php";
                        $route_view = "../mercerize/view_mercerize.php";
                      }
                      elseif ($route_id == 4)
                      {
                        $route_action_path = "../ready_mercerize/edit_ready_mercerize.php";
                        $route_view = "../ready_mercerize/view_ready_mercerize.php";
                      }
                      elseif ($route_id == 5)
                      {
                        $route_action_path = "../equalize/edit_equalize.php";
                        $route_view = "../equalize/view_equalize.php";
                      }
                      elseif ($route_id == 6)
                      {
                        $route_action_path = "../printing/edit_printing.php";
                        $route_view = "../printing/view_printing.php";
                      }
                      elseif ($route_id == 7)
                      {
                        $route_action_path = "../curing_steaming/edit_curing_steaming.php";
                        $route_view = "../curing_steaming/view_curing_steaming.php";
                      }
                      elseif ($route_id == 8)
                      {
                        $route_action_path = "../dyeing/edit_dyeing.php";
                        $route_view = "../dyeing/view_dyeing.php";
                      }
                      elseif ($route_id == 9)
                      {
                        $route_action_path = "../washing/edit_washing.php";
                        $route_view = "../washing/view_washing.php";
                      }
                      elseif ($route_id == 10)
                      {
                        $route_action_path = "../finishing/edit_finishing.php";
                        $route_view = "../finishing/view_finishing.php";
                      }
                      elseif ($route_id == 11)
                      {
                        $route_action_path = "../calender/edit_calender.php";
                        $route_view = "../calender/view_calender.php";
                      }
                      elseif ($route_id == 12)
                      {
                        $route_action_path = "../sanforize/edit_sanforize.php";
                        $route_view = "../sanforize/view_sanforize.php";
                      }
                      else
                      {
                        $route_action_path = "../raising/edit_raising.php";
                        $route_view = "../raising/view_raising.php";
                      }

                      ?>
                        <form action="<?php echo $route_action_path; ?>" method="post" style="display: inline;">
                          <input type="hidden" id="route_issue_id" name="route_issue_id" value="<?php echo $row['route_issue_id']; ?>">
                          <input type="hidden" id="greige_issunce_id" name="greige_issunce_id" value="<?php echo $row['greige_issunce_id']; ?>">
                          <button type="submit" id="gray_issue_add_btn" name="gray_issue_add_btn" class="btn btn-primary btn-xs">
                              Edit
                          </button>
                        </form>

                        <form action="<?php echo $route_view; ?>" method="post" style="display: inline;">
                          <input type="hidden" id="route_issue_id" name="route_issue_id" value="<?php echo $row['route_issue_id']; ?>">
                          <input type="hidden" id="greige_issunce_id" name="greige_issunce_id" value="<?php echo $row['greige_issunce_id']; ?>">
                          <button type="submit" id="gray_issue_add_btn" name="gray_issue_add_btn" class="btn btn-primary btn-xs">
                              View
                          </button>
                        </form>
                      <?php
                    }

                  ?>
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

<?php  ?>
