<?php
session_start();
require_once("../includes/db_session_chk.php");

$greige_issunce_id = $_POST['greige_issunce_id_for_edit'];
$pp_no_id = $_POST['pp_no_id_for_edit'];
$pp_details_id = $_POST['pp_details_id_for_edit'];
$route_issue_id = $_POST['route_issue_id_for_edit'];

?>

<div class="x_panel">
	<div class="x_title">
		<h2>Edit Route Selection Form</h2>
		<ul class="nav navbar-right panel_toolbox">
		  	<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
		  	</li>
		</ul>
		<div class="clearfix"></div>
	</div>

	<?php 

    $sql_for_pp = "SELECT process_program_info.*
                     FROM process_program_info
                    WHERE process_program_info.pp_id = '$pp_no_id'";

    $res_for_pp = mysqli_query($con, $sql_for_pp);
    $row = mysqli_fetch_array($res_for_pp);

    $sql_for_pp = "SELECT 
                              greige_receiving_process_info.*, 
                              version_wise_process_program_info.*, 
                              process_program_info.*, 
                              process_name_define_after_greige_receiving.*, 
                              COUNT(process_name_define_after_greige_receiving.greige_issunce_id) AS row_counter
                         FROM 
                              greige_receiving_process_info, 
                              version_wise_process_program_info, 
                              process_program_info, 
                              process_name_define_after_greige_receiving
                        WHERE greige_receiving_process_info.pp_no_id = '$pp_no_id'
                          AND greige_receiving_process_info.status = '1'
                          AND greige_receiving_process_info.active = '1'
                          AND greige_receiving_process_info.greige_issunce_id = process_name_define_after_greige_receiving.greige_issunce_id
                          AND version_wise_process_program_info.pp_no_id = greige_receiving_process_info.pp_no_id
                          AND version_wise_process_program_info.pp_id = greige_receiving_process_info.pp_details_id
                          AND process_program_info.pp_id = version_wise_process_program_info.pp_no_id
                          AND version_wise_process_program_info.pp_id = '$pp_details_id'
                     GROUP BY process_name_define_after_greige_receiving.greige_issunce_id";



      $res_for_pp = mysqli_query($con, $sql_for_pp);

        ?>
        <div class="clearfix"></div>
          <div class="row">
             <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>PP Number: <span style="color:red;"> <?php echo $row['pp_no']; ?> </span></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">
                    <table class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Customer</th>
                          <th>Week</th>
                          <th>Design</th>
                          <th>Total Required Quantity</th>
                          <th>Version</th>
                          <th>Color</th>
                          <th>Greige Width</th>
                        </tr>
                      </thead>
                      
                      <tbody>
                        <?php 
                          $s1 = 1;
                          
                          $row_for_details = mysqli_fetch_assoc($res_for_pp);
                          
                            ?>
                            <tr>
                              <td>
                                <?php 
                                  $customers_id = $row['customers'];
                                  $sql_for_customers = "SELECT customer_name FROM customer WHERE customer_id = '$customers_id'";
                                  $res_for_customers = mysqli_query($con, $sql_for_customers);
                                  $row_for_customers = mysqli_fetch_assoc($res_for_customers);
                                  echo $row_for_customers['customer_name'];
                                ?>
                              </td>
                              <td><?php echo $row['week'] ?></td>
                              <td><?php echo $row['design'] ?></td>
                              <td>
                                <?php 
                                  $sql_for_total_quantity = "SELECT SUM(quantity) AS total_quantity FROM version_wise_process_program_info WHERE pp_no_id = '$pp_no_id'";
                                  $res_for_total_quantity = mysqli_query($con, $sql_for_total_quantity);
                                  $row_for_total_quantity = mysqli_fetch_assoc($res_for_total_quantity);
                                  echo $row_for_total_quantity['total_quantity'];
                                ?>
                              </td> 
                              <td>
                                <?php 
                                  $version_id = $row_for_details['version'];
                                  $sql_for_version = "SELECT version_name FROM version_name WHERE version_id = '$version_id'";
                                  $res_for_version = mysqli_query($con, $sql_for_version);
                                  $row_for_version = mysqli_fetch_assoc($res_for_version);
                                  echo $row_for_version['version_name'];
                                ?>
                              </td>
                              <td>
                                <?php 
                                  $color_id = $row_for_details['color'];
                                  $sql_for_color = "SELECT color_name FROM color WHERE color_id = '$color_id'";
                                  $res_for_color = mysqli_query($con, $sql_for_color);
                                  $row_for_color = mysqli_fetch_assoc($res_for_color);
                                  echo $row_for_color['color_name'];
                                ?>
                              </td>
                              <td><?php echo $row_for_details['gray_width'] ?></td>
                            </tr>
                      </tbody> 
                    </table>
                  </div>
                </div>
              </div>
          </div>


        <div class="clearfix"></div>
          <div class="row">
             <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">

                  <div class="x_content">
                    <table id="datatable-buttons" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Greige Received Quantity</th>
                          <th>Yarn Warp</th>
                          <th>Yarn Weft</th>
                          <th>Thread EPI</th>
                          <th>Thread PPI</th>
                          <th>GSM</th>
                        </tr>
                      </thead>
                      
                      <tbody>
                        <?php 
                          $s1 = 1;
                          $total_received_quantity = 0;
                          $sql_for_pp_details = "SELECT 
                                                greige_receiving_process_info.*, 
                                                version_wise_process_program_info.*, 
                                                process_program_info.*, 
                                                process_name_define_after_greige_receiving.*, 
                                                COUNT(process_name_define_after_greige_receiving.greige_issunce_id) AS row_counter
                                           FROM 
                                                greige_receiving_process_info, 
                                                version_wise_process_program_info, 
                                                process_program_info, 
                                                process_name_define_after_greige_receiving
                                          WHERE greige_receiving_process_info.pp_no_id = '$pp_no_id'
                                            AND greige_receiving_process_info.status = '1'
                                            AND greige_receiving_process_info.active = '1'
                                            AND greige_receiving_process_info.greige_issunce_id = process_name_define_after_greige_receiving.greige_issunce_id
                                            AND version_wise_process_program_info.pp_no_id = greige_receiving_process_info.pp_no_id
                                            AND version_wise_process_program_info.pp_id = greige_receiving_process_info.pp_details_id
                                            AND process_program_info.pp_id = version_wise_process_program_info.pp_no_id
                                            AND process_name_define_after_greige_receiving.greige_issunce_id = '$greige_issunce_id'
                                            AND version_wise_process_program_info.pp_id = '$pp_details_id'
                                       GROUP BY process_name_define_after_greige_receiving.greige_issunce_id";



                        $res_for_pp_details = mysqli_query($con, $sql_for_pp_details);
                          
                          while ($row_details_for_pp = mysqli_fetch_assoc($res_for_pp_details)) 
                          {
                              $total_received_quantity += $row_details_for_pp['received_quantity'];
                            ?>
                            <tr>
                              <input type="hidden" id="database_row" name="database_row" value="<?php echo $row['row_counter']; ?>">
                              <td><?php echo $row_details_for_pp['received_quantity'] ?></td>
                              <td><?php echo $row_details_for_pp['yarn_warp'] ?></td>
                              <td><?php echo $row_details_for_pp['yarn_weft'] ?></td>
                              <td><?php echo $row_details_for_pp['thread_epi'] ?></td>
                              <td><?php echo $row_details_for_pp['thread_ppi'] ?></td>
                              <td><?php echo $row_details_for_pp['gsm'] ?></td>
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

	<?php 
	$pp_details_sql = "SELECT 
	                        *
	                   FROM
	                        process_name_define_after_greige_receiving
	                   WHERE
	                        greige_issunce_id = '$greige_issunce_id'
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
  	        <input type="hidden" value="<?php echo $greige_issunce_id; ?>" id="greige_issunce_id" name="greige_issunce_id" class="form-control col-md-7 col-xs-12">
  	        <input type="hidden" value="<?php echo $pp_no_id ?>" id="pp_no_id" name="pp_no_id" class="form-control col-md-7 col-xs-12">
  	        <input type="hidden" value="<?php echo $pp_details_id ?>" id="pp_details_id" name="pp_details_id" class="form-control col-md-7 col-xs-12">
  	        <input type="hidden" value="<?php echo $row['pp_no'] ?>" id="pp_no" name="pp_no" class="form-control col-md-7 col-xs-12">
  	        <input type="hidden" value="<?php echo $number_row; ?>" id="row-name-counter" name="row-name-counter" class="form-control col-md-7 col-xs-12">
  	        <input type="hidden" value="<?php echo $number_row; ?>" id="database_row_count" name="database_row_count" class="form-control col-md-7 col-xs-12">
  	    </div>
  	    <?php 
  	      $gray_issue_details_sql = "SELECT 
  			                              *
  			                         FROM
  			                              greige_receiving_process_info
  			                         WHERE
  			                              greige_issunce_id = '$greige_issunce_id'
  			                          AND active = '1'

  			                         ORDER BY greige_issunce_id ASC
  			                        ";
  	      $gray_issue_details_res = mysqli_query($con, $gray_issue_details_sql) or die(mysqli_error($con));
  	      $gray_issue_row = mysqli_fetch_assoc($gray_issue_details_res);
  	    ?>
  	    <div class="form-group">
  	      <div class="col-md-6 col-sm-6 col-xs-12">
  	        <p>
  	           Active :
  	          <input type="radio" class="flat" name="active" id="active" value="1" <?php if($gray_issue_row['active']=='1') echo "checked"; ?>/> 

  	           Not Active :
  	          <input type="radio" class="flat" name="active" id="notactive" value="0" <?php if($gray_issue_row['active']=='0') echo "checked"; ?> />
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
  	      <label class="control-label" for="version">Route Selection <span class="required">*</span>
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

      	                $route_sql = "SELECT * FROM process_name WHERE process_id = '$pp_route' ";
      	                $route_res = mysqli_query($con, $route_sql) or die(mysqli_error($con));
      	                while ($route_row = mysqli_fetch_assoc($route_res)) 
      	                {
      	                    ?>

      	                    <option <?php if($route_row['process_id'] == $pp_route){echo "selected";}?> value="<?php echo $route_row['process_id'];?>"> <?php echo $route_row['process_name'];?></option>

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
      	            <input id="<?php echo "route_issue_id".$i; ?>" name="<?php echo "route_issue_id".$i; ?>" value="<?php echo $pp_details_row['route_issue_id'] ?>" type="hidden">
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
</div>

<?php  ?>

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