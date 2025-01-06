<?php
session_start();
require_once("../includes/db_session_chk.php");

$pp_no_id = $_POST['pp_no_id'];
$pp_version = $_POST['pp_version'];
$work = $_POST['work'];
//$greige_issunce_id = $_POST['greige_issunce_id'];

if ($pp_no_id == "" || is_null($pp_no_id) || empty($pp_no_id) || 
    $pp_version == "" || is_null($pp_version) || empty($pp_version)) 
{
    echo "No data found";
}

else
{

    if ($work == 1) 
    {
        $sql_for_pp = "SELECT pp.*, pp_details.*
                     FROM pp, pp_details
                    WHERE pp.pp_id = '$pp_no_id'
                    AND pp_details.pp_id = '$pp_version' ";

        $res_for_pp = mysqli_query($con, $sql_for_pp);
        $row_check = mysqli_num_rows($res_for_pp);

        if ($row_check >= 1)
        {
            $row = mysqli_fetch_array($res_for_pp);

            $sql_for_route_issue = "SELECT route_issue_main.*
                                        FROM route_issue_main
                                       WHERE route_issue_main.pp_no_id = '$pp_no_id' 
                                         AND route_issue_main.pp_details_id = '$pp_version'
                                         AND route_issue_main.active = '1' ";

            $res_for_route_issue = mysqli_query($con, $sql_for_route_issue);
            $row_route_issue = mysqli_fetch_assoc($res_for_route_issue);
            $row_route_issue_count = mysqli_num_rows($res_for_route_issue);
            if ($row_route_issue_count >= 1)
            {
                ?>
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
                          // $sql_for_pp = "SELECT *
                          //                FROM
                          //                 (SELECT * FROM route_issue WHERE greige_issunce_id = '$greige_issunce_id' AND active = '1' ORDER BY id DESC) AS t
                          //                GROUP BY route_issue_id
                          //                ";

                          $sql_for_pp = "SELECT *
                                         FROM route_issue_main
                                         WHERE pp_no_id = '$pp_no_id'
                                         AND pp_details_id = '$pp_version'
                                         AND active = '1'";

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
                                  // if ($complete == 0)
                                  // {

                                    if ($route_id == 1)
                                    {
                                      //$route_action_path = "../singe/add_singe.php";
                                      $route_action_path = "../standard/gray_variable_process.php";
                                      $process_number = 2;
                                    }
                                    elseif ($route_id == 2)
                                    {
                                      //$route_action_path = "../bleaching/add_bleaching.php";
                                      $route_action_path = "../standard/gray_variable_process.php";
                                      $process_number = 3;
                                    }
                                    elseif ($route_id == 3)
                                    {
                                      //$route_action_path = "../mercerize/add_mercerize.php";
                                      $route_action_path = "../standard/gray_variable_process.php";
                                      $process_number = 5;
                                    }
                                    elseif ($route_id == 4)
                                    {
                                      //$route_action_path = "../ready_mercerize/add_ready_mercerize.php";
                                      $route_action_path = "../standard/gray_variable_process.php";
                                      $process_number = 4;
                                    }
                                    elseif ($route_id == 5)
                                    {
                                      //$route_action_path = "../equalize/add_equalize.php";
                                      $route_action_path = "../standard/gray_variable_process.php";
                                      $process_number = 6;
                                    }
                                    elseif ($route_id == 6)
                                    {
                                      //$route_action_path = "../printing/add_printing.php";
                                      $route_action_path = "../standard/gray_variable_process.php";
                                      $process_number = 7;
                                    }
                                    elseif ($route_id == 7)
                                    {
                                      //$route_action_path = "../curing_steaming/add_curing_steaming.php";
                                      $route_action_path = "../standard/gray_variable_process.php";
                                      $process_number = 8;
                                    }
                                    elseif ($route_id == 8)
                                    {
                                      $route_action_path = "../dyeing/add_dyeing.php";
                                    }
                                    elseif ($route_id == 9)
                                    {
                                      //$route_action_path = "../washing/add_washing.php";
                                      $route_action_path = "../standard/gray_variable_process.php";
                                      $process_number = 12;
                                    }
                                    elseif ($route_id == 10)
                                    {
                                      //$route_action_path = "../finishing/add_finishing.php";
                                      $route_action_path = "../standard/gray_variable_process.php";
                                      $process_number = 9;
                                    }
                                    elseif ($route_id == 11)
                                    {
                                      //$route_action_path = "../calender/add_calender.php";
                                      $route_action_path = "../standard/gray_variable_process.php";
                                      $process_number = 13;
                                    }
                                    elseif ($route_id == 12)
                                    {
                                      //$route_action_path = "../sanforize/add_sanforize.php";
                                      $route_action_path = "../standard/gray_variable_process.php";
                                      $process_number = 14;
                                    }
                                    elseif ($route_id == 13)
                                    {
                                      //$route_action_path = "../raising/add_raising.php";
                                      $route_action_path = "../standard/gray_variable_process.php";
                                      $process_number = 15;
                                    }
                                    
                                    // elseif ($route_id == 14)
                                    // {
                                    //   //$route_action_path = "../sanforize/add_sanforize.php";
                                    //   $route_action_path = "../standard/gray_variable_process.php";
                                    //   $process_number = 10;
                                    // }
                                    elseif ($route_id == 15)
                                    {
                                      //$route_action_path = "../bleaching/add_bleaching.php";
                                      $route_action_path = "../standard/gray_variable_process.php";
                                      $process_number = 10;
                                    }

                                    elseif ($route_id == 16)
                                    {
                                      //$route_action_path = "../scouring/add_scouring.php";
                                      $route_action_path = "../standard/gray_variable_process.php";
                                      $process_number = 11;
                                    }
                                    elseif ($route_id == 17)
                                    {
                                      //$route_action_path = "../ready_print/add_ready_print.php";
                                      $route_action_path = "../standard/gray_variable_process.php";
                                      $process_number = 17;
                                    }
                                    elseif ($route_id == 18)
                                    {
                                      //$route_action_path = "../ready_dyeing/add_ready_dyeing.php";
                                      $route_action_path = "../standard/gray_variable_process.php";
                                      $process_number = 18;
                                    }
                                    elseif ($route_id == 19)
                                    {
                                      //$route_action_path = "../sanforize/add_sanforize.php";
                                      $route_action_path = "../standard/gray_variable_process.php";
                                      $process_number = 16;
                                    }
                                    else
                                    {
                                      //$route_action_path = "../raising/add_raising.php";
                                      $route_action_path = "../standard/gray_variable_process.php";
                                      $process_number = 1;
                                    }

                                    ?>
                                      <form action="<?php echo $route_action_path; ?>" method="post" style="display: inline;" target="_blank">
                                        <input type="hidden" id="route_issue_id" name="route_issue_id" value="<?php echo $row['route_issue_main_id']; ?>">
                                        <input type="hidden" id="process_number" name="process_number" value="<?php echo $process_number; ?>">
                                        <input type="hidden" id="pp_no_id" name="pp_no_id" value="<?php echo $pp_no_id; ?>">
                                        <input type="hidden" id="pp_version" name="pp_version" value="<?php echo $pp_version; ?>">
                                        <button type="submit" id="gray_issue_add_btn" name="gray_issue_add_btn" class="btn btn-primary btn-xs">
                                            Add/Change QC Standard
                                        </button>
                                      </form>
                                    <?php
                                  //}

                                  // else 
                                  // {
                                  //   if ($route_id == 1)
                                  //   {
                                  //     $route_action_path = "../singe/edit_singe.php";
                                  //     $route_view = "../singe/view_singe.php";
                                  //   }
                                  //   elseif ($route_id == 2)
                                  //   {
                                  //     $route_action_path = "../bleaching/edit_bleaching.php";
                                  //     $route_view = "../bleaching/view_bleaching.php";
                                  //   }
                                  //   elseif ($route_id == 3)
                                  //   {
                                  //     $route_action_path = "../mercerize/edit_mercerize.php";
                                  //     $route_view = "../mercerize/view_mercerize.php";
                                  //   }
                                  //   elseif ($route_id == 4)
                                  //   {
                                  //     $route_action_path = "../ready_mercerize/edit_ready_mercerize.php";
                                  //     $route_view = "../ready_mercerize/view_ready_mercerize.php";
                                  //   }
                                  //   elseif ($route_id == 5)
                                  //   {
                                  //     $route_action_path = "../equalize/edit_equalize.php";
                                  //     $route_view = "../equalize/view_equalize.php";
                                  //   }
                                  //   elseif ($route_id == 6)
                                  //   {
                                  //     $route_action_path = "../printing/edit_printing.php";
                                  //     $route_view = "../printing/view_printing.php";
                                  //   }
                                  //   elseif ($route_id == 7)
                                  //   {
                                  //     $route_action_path = "../curing_steaming/edit_curing_steaming.php";
                                  //     $route_view = "../curing_steaming/view_curing_steaming.php";
                                  //   }
                                  //   elseif ($route_id == 8)
                                  //   {
                                  //     $route_action_path = "../dyeing/edit_dyeing.php";
                                  //     $route_view = "../dyeing/view_dyeing.php";
                                  //   }
                                  //   elseif ($route_id == 9)
                                  //   {
                                  //     $route_action_path = "../washing/edit_washing.php";
                                  //     $route_view = "../washing/view_washing.php";
                                  //   }
                                  //   elseif ($route_id == 10)
                                  //   {
                                  //     $route_action_path = "../finishing/edit_finishing.php";
                                  //     $route_view = "../finishing/view_finishing.php";
                                  //   }
                                  //   elseif ($route_id == 11)
                                  //   {
                                  //     $route_action_path = "../calender/edit_calender.php";
                                  //     $route_view = "../calender/view_calender.php";
                                  //   }
                                  //   elseif ($route_id == 12)
                                  //   {
                                  //     $route_action_path = "../sanforize/edit_sanforize.php";
                                  //     $route_view = "../sanforize/view_sanforize.php";
                                  //   }
                                  //   else
                                  //   {
                                  //     $route_action_path = "../raising/edit_raising.php";
                                  //     $route_view = "../raising/view_raising.php";
                                  //   }

                                  //   ?>
                                       <!-- <form action="<?php echo $route_action_path; ?>" method="post" style="display: inline;">
                                         <input type="hidden" id="route_issue_id" name="route_issue_id" value="<?php echo $row['route_issue_id']; ?>">
                                         <input type="hidden" id="greige_issunce_id" name="greige_issunce_id" value="<?php echo $row['greige_issunce_id']; ?>">
                                         <input type="hidden" id="pp_no_id" name="pp_no_id" value="<?php echo $pp_no_id; ?>">
                                         <input type="hidden" id="pp_details_id" name="pp_details_id" value="<?php echo $pp_details_id; ?>">
                                         <button type="submit" id="gray_issue_add_btn" name="gray_issue_add_btn" class="btn btn-primary btn-xs">
                                             Edit
                                         </button>
                                      </form>

                                       <form action="<?php echo $route_view; ?>" method="GET" style="display: inline;">
                                         <input type="hidden" id="route_issue_id" name="route_issue_id" value="<?php echo $row['route_issue_id']; ?>">
                                         <input type="hidden" id="greige_issunce_id" name="greige_issunce_id" value="<?php echo $row['greige_issunce_id']; ?>">
                                         <input type="hidden" id="pp_no_id" name="pp_no_id" value="<?php echo $pp_no_id; ?>">
                                         <input type="hidden" id="pp_details_id" name="pp_details_id" value="<?php echo $pp_details_id; ?>">
                                         <button type="submit" id="gray_issue_add_btn" name="gray_issue_add_btn" class="btn btn-primary btn-xs">
                                             View
                                         </button>
                                       </form> -->
                                    <?php
                                  // }

                                ?>
                              </td>
                            </tr>
                            <?php
                            ++$s1;
                          }
                        ?>
                        <tr>
                          <td><?php echo $s1; ?></td>
                          <td>Greige Issunce</td>
                          <td>Mandatory</td>
                          <td>
                              <?php 
                                  $route_action_path = "../standard/gray_variable_process.php";
                                  $process_number = 1;
                              ?>
                              <form action="<?php echo $route_action_path; ?>" method="post" style="display: inline;" target="_blank">
                                <input type="hidden" id="route_issue_id" name="route_issue_id" value="<?php echo $row['route_issue_main_id']; ?>">
                                <input type="hidden" id="process_number" name="process_number" value="<?php echo $process_number; ?>">
                                <input type="hidden" id="pp_no_id" name="pp_no_id" value="<?php echo $pp_no_id; ?>">
                                <input type="hidden" id="pp_version" name="pp_version" value="<?php echo $pp_version; ?>">
                                <button type="submit" id="gray_issue_add_btn" name="gray_issue_add_btn" class="btn btn-primary btn-xs">
                                    Add/Change QC Standard
                                </button>
                              </form>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>


                <?php
            }
            else
            {   
                require_once("add_route_issue_for_version.php");
            }
        }
        else
        {
            echo "Data Not Found!";
        }
    }

    else
    {
        $pp_details_sql = "SELECT 
                                *
                           FROM
                                route_issue_main
                           WHERE
                                pp_no_id = '$pp_no_id'
                            AND pp_details_id = '$pp_version'
                            AND active = '1'

                           ORDER BY process_number ASC
                          ";
        $pp_details_res = mysqli_query($con, $pp_details_sql) or die(mysqli_error($con));
        $number_row = mysqli_num_rows($pp_details_res);
        ?>

        <div class="x_content">
          <div class="col-md-12 center-margin">
            <form id="route_selected_form" name="route_selected_form" data-parsley-validate class="form-horizontal form-label-left">
              <div>
                  <input type="hidden" value="<?php echo $number_row; ?>" id="row-counter" name="row-counter" class="form-control col-md-7 col-xs-12">
                  <input type="hidden" value="<?php echo $pp_no_id ?>" id="pp_no_id" name="pp_no_id" class="form-control col-md-7 col-xs-12">
                  <input type="hidden" value="<?php echo $pp_version ?>" id="pp_details_id" name="pp_details_id" class="form-control col-md-7 col-xs-12">
                  <input type="hidden" value="<?php echo $number_row; ?>" id="row-name-counter" name="row-name-counter" class="form-control col-md-7 col-xs-12">
                  <input type="hidden" value="<?php echo $number_row; ?>" id="database_row_count" name="database_row_count" class="form-control col-md-7 col-xs-12">
              </div>

              <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <p>
                     Active :
                    <input type="radio" class="flat" name="active" id="active" value="1" checked/> 

                     Not Active :
                    <input type="radio" class="flat" name="active" id="notactive" value="0" />
                  </p>
                </div>
              </div>


              <?php 

                  $sql = "SELECT * FROM route ORDER BY route_name";
                  $res = mysqli_query($con, $sql) or die(mysqli_error($con));
                  while ($row = mysqli_fetch_assoc($res)) 
                  {
                      echo '<div class="btn-group" role="group" aria-label="Basic example">';
                      //echo '<input type="checkbox" id="route_process'.$row['route_id'].'" name="route_process'.$row['route_id'].'" onclick="addRouteProcess('.$row['route_id'].')">';
                      echo '<button type="button" id="route_process'.$row['route_id'].'" name="route_process'.$row['route_id'].'" onclick="addnewroute('.$row['route_id'].')" class="btn btn-success">'.$row['route_name'].'</button>';
                      echo "</div>";
                  }
              ?>


              <div class="form-group">
                <label class="control-label" for="version">Process Route Selection <span class="required">*</span>
                </label>
                <?php 
                  $i = 1;
                    while ($pp_details_row = mysqli_fetch_assoc($pp_details_res)) 
                    {
                      $complete = $pp_details_row['complete'];

                    ?>
                      <div class="full_row col-md-12 col-sm-12 col-xs-12" id="<?php echo $i; ?>" style="<?php if($complete == 1) echo "pointer-events: none;" ?>">
                        <div class="col-md-5 col-sm-5 col-xs-4">
                          <select id="<?php echo "route".$i; ?>" name="<?php echo "route".$i; ?>" class="version-route select2 form-control col-md-12 col-xs-12">
                            <?php
                              $pp_route = $pp_details_row['route'];

                              $route_sql = "SELECT * FROM route WHERE route_id = '$pp_route' ";
                              $route_res = mysqli_query($con, $route_sql) or die(mysqli_error($con));
                              while ($route_row = mysqli_fetch_assoc($route_res)) 
                              {
                                  ?>

                                  <option <?php if($route_row['route_id'] == $pp_route){echo "selected";}?> value="<?php echo $route_row['route_id'];?>"> <?php echo $route_row['route_name'];?></option>

                                  <?php
                              }
                            ?>
                          </select>
                        </div>

                        <div class="col-md-5 col-sm-5 col-xs-4">
                          <select id="<?php echo "process".$i; ?>" name="<?php echo "process".$i; ?>" class="version-process select2 form-control col-md-12 col-xs-12">
                            <?php 
                              $process = $pp_details_row['process'];
                            ?>
                            <option <?php if($process == 'process') echo"selected" ;?> value="process">Process</option>
                            <option value="reprocess" <?php if($process == 'reprocess') echo"selected";?> >Reprocess</option>
                          </select>
                        </div>

                        <div class="col-md-1 col-sm-1 col-xs-4">
                          <input id="<?php echo "process_number".$i; ?>" name="<?php echo "process_number".$i; ?>" value="<?php echo $pp_details_row['process_number'] ?>" placeholder="Number" class="version-number form-control col-md-12 col-xs-12" type="text">
                          <input id="<?php echo "route_issue_main_id".$i; ?>" name="<?php echo "route_issue_main_id".$i; ?>" value="<?php echo $pp_details_row['route_issue_main_id'] ?>" type="hidden">
                          <input id="<?php echo "complete".$i; ?>" name="<?php echo "complete".$i; ?>" value="<?php echo $pp_details_row['complete'] ?>" type="hidden">
                        </div>

                        <?php 
                          if ($i !== 1) 
                          {
                            ?>
                              <div class="col-md-1 col-sm-1 col-xs-2">
                                <button type="button" class="btn-xs btn-danger btn_remove" id="<?php echo ($i); ?>" onclick="rmv_row_for_edit(this.id);">X</button>
                              </div>
                            <?php
                          }
                        ?>
                      </div>
                    <?php 
                      ++$i;
                    }
                  ?>

                <div id="new_dropzone_section_version">
                </div>
              </div>

              <!-- <button type='button' class="btn-xs btn-success" id='add_route_btn' value='' style="margin-top: 3px;" onclick="addnewroute();">Add Route</button> -->
              
              <div class="ln_solid"></div>
              <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <button type="button" onclick="update_route_data();" class="btn btn-success">Update</button>
                </div>
              </div>
            </form>
          </div>
        </div>

        <?php
    }
}
?>

<script type="text/javascript">
  $(document).ready(function()
  {

      //onload: call the above function 
      $(".select2").each(function() 
      {
        initializeSelect2($(this));
      });

  });
</script>