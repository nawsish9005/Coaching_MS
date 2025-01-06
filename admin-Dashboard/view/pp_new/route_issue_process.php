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
        $sql_for_pp = "SELECT process_program_info.*, version_wise_process_program_info.*
                     FROM process_program_info, version_wise_process_program_info
                    WHERE process_program_info.pp_id = '$pp_no_id'
                    AND version_wise_process_program_info.pp_id = '$pp_version' ";

        $res_for_pp = mysqli_query($con, $sql_for_pp);
        $row_check = mysqli_num_rows($res_for_pp);

        if ($row_check >= 1)
        {
            $row = mysqli_fetch_array($res_for_pp);

            $sql_for_route_issue = "SELECT process_name_define.*
                                        FROM process_name_define
                                       WHERE process_name_define.pp_no_id = '$pp_no_id' 
                                         AND process_name_define.pp_details_id = '$pp_version'
                                         AND process_name_define.active = '1' ";

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
                          <th>Process Name</th>
                          <th>Process/Reprocess</th>
                        </tr>
                      </thead>

                      <tbody>

                        <tr>
                          <td>1</td>
                          <td>Greige Receive</td>
                          <td>Mandatory</td>
                        </tr>

                        <?php
                          $s1 = 2;
                          // $sql_for_pp = "SELECT *
                          //                FROM
                          //                 (SELECT * FROM route_issue WHERE greige_issunce_id = '$greige_issunce_id' AND active = '1' ORDER BY id DESC) AS t
                          //                GROUP BY route_issue_id
                          //                ";

                          $sql_for_pp = "SELECT *
                                         FROM process_name_define
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
                                  $sql_for_route = "SELECT process_name FROM process_name WHERE process_id = '$route_id'";
                                  $res_for_route = mysqli_query($con, $sql_for_route);
                                  $row_for_route = mysqli_fetch_assoc($res_for_route);
                                  echo $row_for_route['process_name'];
                                 ?>
                              </td>
                              <td><?php echo $row['process'] ?></td>
                              
                            </tr>
                            <?php
                            ++$s1;
                          }
                        ?>
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
                                process_name_define
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

                  $sql = "SELECT * FROM process_name ORDER BY process_name";
                  $res = mysqli_query($con, $sql) or die(mysqli_error($con));
                  while ($row = mysqli_fetch_assoc($res)) 
                  {
                      echo '<div class="btn-group" role="group" aria-label="Basic example">';
                      //echo '<input type="checkbox" id="route_process'.$row['route_id'].'" name="route_process'.$row['route_id'].'" onclick="addRouteProcess('.$row['route_id'].')">';
                      echo '<button type="button" id="route_process'.$row['process_id'].'" name="route_process'.$row['process_id'].'" onclick="addnewroute('.$row['process_id'].')" class="btn btn-success">'.$row['process_name'].'</button>';
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

                              $route_sql = "SELECT * FROM process_technique_or_program_type WHERE process_id = '$pp_route' ";
                              $route_res = mysqli_query($con, $route_sql) or die(mysqli_error($con));
                              while ($route_row = mysqli_fetch_assoc($route_res)) 
                              {
                                  ?>

                                  <option <?php if($route_row['process_id'] == $pp_route){echo "selected";}?> value="<?php echo $route_row['process_id'];?>"> <?php echo $route_row['process_technique_name'];?></option>

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