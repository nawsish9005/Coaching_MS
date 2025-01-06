


<!-- main content again -->
<div class="clearfix"></div>
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12" id="retrieve_edit_data" style="padding-bottom: 20px;">
    <div class="x_panel">
      <div class="x_title">
          <h2>PP Number : <span style="color:red;"> <?php echo $row['pp_no']; ?> </span> - Greige Standards</h2> 
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
              <th>Version</th>
              <th>Color</th>
              <th>Gray Width</th>
              <th>Color Fastness to Rubbing Dry</th>
              <th>Color Fastness to Rubbing Wet</th>
              <th>Wash Dry Warp before Iron</th>
              <th>Wash Dry Weft before Iron</th>
              <th>Wash Dry Warp After Iron</th>
              <th>Wash Dry Weft After Iron</th>
              <th>Dry Cleaning Warp</th>
              <th>Dry Cleaning Weft</th>
              <th>Yarn Count Warp</th>
              <th>Yarn Count Weft</th>
            </tr>
          </thead>
          
          <tbody>
            <?php 
              $s1 = 1;
              $sql_for_pp = "SELECT 
                                pp.pp_no,
                                pp.pp_id,
                                pp_details.pp_id,
                                pp_details.pp_no_id,
                                pp_details.version,
                                pp_details.color,
                                pp_details.gray_width,
                                pp_details.quantity,
                                finishing_standard.*

                             FROM 
                                pp, pp_details, finishing_standard   
                             WHERE 
                                pp.pp_id = '$pp_no_id'
                                AND pp.pp_id = pp_details.pp_no_id
                                AND finishing_standard.pp_no_id = pp_details.pp_no_id
                                AND finishing_standard.pp_details_id = pp_details.pp_id
                                AND finishing_standard.active = '1'
                                AND pp_details.active = '1'
                             ";



              $res_for_pp = mysqli_query($con, $sql_for_pp);

              $row1 = mysqli_fetch_assoc($res_for_pp);
            ?>
            <tr>
              <td><?php echo $s1; ?></td>
              <td><?php echo $row1['version'] ?></td>
              <td>
                <?php 
                  $color_id = $row1['color'];
                  $sql_for_color = "SELECT color_name FROM color WHERE color_id = '$color_id'";
                  $res_for_color = mysqli_query($con, $sql_for_color);
                  $row_for_color = mysqli_fetch_assoc($res_for_color);
                  echo $row_for_color['color_name'];
                ?>
              </td>
              <td><?php echo $row1['gray_width'] ?></td>
              <td>
                <?php 
                  if ($row1['cf_rubbing_dry_cond1'] == 1) 
                  {
                    echo "( ";
                  }
                  elseif ($row1['cf_rubbing_dry_cond1'] == 2) 
                  {
                    echo "[ ";
                  }
                  else
                  {
                    echo "] ";
                  }
                  
                  echo $row1['cf_rubbing_dry_value1'];
                  echo " - ";
                  echo $row1['cf_rubbing_dry_value2'];

                  if ($row1['cf_rubbing_dry_cond2'] == 1) 
                  {
                    echo " )";
                  }
                  elseif ($row1['cf_rubbing_dry_cond2'] == 2) 
                  {
                    echo " ]";
                  }
                  else
                  {
                    echo " [";
                  }
                ?>
              </td>

              <td>
                <?php 
                  if ($row1['cf_rubbing_wet_cond1'] == 1) 
                  {
                    echo "( ";
                  }
                  elseif ($row1['cf_rubbing_wet_cond1'] == 2) 
                  {
                    echo "[ ";
                  }
                  else
                  {
                    echo "] ";
                  }
                  
                  echo $row1['cf_rubbing_wet_value1'];
                  echo " - ";
                  echo $row1['cf_rubbing_wet_value2'];

                  if ($row1['cf_rubbing_wet_cond2'] == 1) 
                  {
                    echo " )";
                  }
                  elseif ($row1['cf_rubbing_wet_cond2'] == 2) 
                  {
                    echo " ]";
                  }
                  else
                  {
                    echo " [";
                  }
                ?>
              </td>

              <td>
                <?php 
                  if ($row1['wash_dry_warp_before_iron_cond1'] == 1) 
                  {
                    echo "( ";
                  }
                  elseif ($row1['wash_dry_warp_before_iron_cond1'] == 2) 
                  {
                    echo "[ ";
                  }
                  else
                  {
                    echo "] ";
                  }
                  
                  echo $row1['wash_dry_warp_before_iron_value1'];
                  echo " - ";
                  echo $row1['wash_dry_warp_before_iron_value2'];

                  if ($row1['wash_dry_warp_before_iron_cond2'] == 1) 
                  {
                    echo " )";
                  }
                  elseif ($row1['wash_dry_warp_before_iron_cond2'] == 2) 
                  {
                    echo " ]";
                  }
                  else
                  {
                    echo " [";
                  }
                ?>
              </td>

              <td>
                <?php 
                  if ($row1['wash_dry_weft_before_iron_cond1'] == 1) 
                  {
                    echo "( ";
                  }
                  elseif ($row1['wash_dry_weft_before_iron_cond1'] == 2) 
                  {
                    echo "[ ";
                  }
                  else
                  {
                    echo "] ";
                  }
                  
                  echo $row1['wash_dry_weft_before_iron_value1'];
                  echo " - ";
                  echo $row1['wash_dry_weft_before_iron_value2'];

                  if ($row1['wash_dry_weft_before_iron_cond2'] == 1) 
                  {
                    echo " )";
                  }
                  elseif ($row1['wash_dry_weft_before_iron_cond2'] == 2) 
                  {
                    echo " ]";
                  }
                  else
                  {
                    echo " [";
                  }
                ?>
              </td>
              
              <td>
                <?php 
                  if ($row1['wash_dry_warp_after_iron_cond1'] == 1) 
                  {
                    echo "( ";
                  }
                  elseif ($row1['wash_dry_warp_after_iron_cond1'] == 2) 
                  {
                    echo "[ ";
                  }
                  else
                  {
                    echo "] ";
                  }
                  
                  echo $row1['wash_dry_warp_after_iron_value1'];
                  echo " - ";
                  echo $row1['wash_dry_warp_after_iron_value2'];

                  if ($row1['wash_dry_warp_after_iron_cond2'] == 1) 
                  {
                    echo " )";
                  }
                  elseif ($row1['wash_dry_warp_after_iron_cond2'] == 2) 
                  {
                    echo " ]";
                  }
                  else
                  {
                    echo " [";
                  }
                ?>
              </td>

              <td>
                <?php 
                  if ($row1['wash_dry_weft_after_iron_cond1'] == 1) 
                  {
                    echo "( ";
                  }
                  elseif ($row1['wash_dry_weft_after_iron_cond1'] == 2) 
                  {
                    echo "[ ";
                  }
                  else
                  {
                    echo "] ";
                  }
                  
                  echo $row1['wash_dry_weft_after_iron_value1'];
                  echo " - ";
                  echo $row1['wash_dry_weft_after_iron_value2'];

                  if ($row1['wash_dry_weft_after_iron_cond2'] == 1) 
                  {
                    echo " )";
                  }
                  elseif ($row1['wash_dry_weft_after_iron_cond2'] == 2) 
                  {
                    echo " ]";
                  }
                  else
                  {
                    echo " [";
                  }
                ?>
              </td>

              <td>
                <?php 
                  if ($row1['dry_cleaning_warp_cond1'] == 1) 
                  {
                    echo "( ";
                  }
                  elseif ($row1['dry_cleaning_warp_cond1'] == 2) 
                  {
                    echo "[ ";
                  }
                  else
                  {
                    echo "] ";
                  }
                  
                  echo $row1['dry_cleaning_warp_value1'];
                  echo " - ";
                  echo $row1['dry_cleaning_warp_value2'];

                  if ($row1['dry_cleaning_warp_cond2'] == 1) 
                  {
                    echo " )";
                  }
                  elseif ($row1['dry_cleaning_warp_cond2'] == 2) 
                  {
                    echo " ]";
                  }
                  else
                  {
                    echo " [";
                  }
                ?>
              </td>

              <td>
                <?php 
                  if ($row1['dry_cleaning_weft_cond1'] == 1) 
                  {
                    echo "( ";
                  }
                  elseif ($row1['dry_cleaning_weft_cond1'] == 2) 
                  {
                    echo "[ ";
                  }
                  else
                  {
                    echo "] ";
                  }
                  
                  echo $row1['dry_cleaning_weft_value1'];
                  echo " - ";
                  echo $row1['dry_cleaning_weft_value2'];

                  if ($row1['dry_cleaning_weft_cond2'] == 1) 
                  {
                    echo " )";
                  }
                  elseif ($row1['dry_cleaning_weft_cond2'] == 2) 
                  {
                    echo " ]";
                  }
                  else
                  {
                    echo " [";
                  }
                ?>
              </td>

              <td>
                <?php 
                  if ($row1['yarn_count_warp_cond1'] == 1) 
                  {
                    echo "( ";
                  }
                  elseif ($row1['yarn_count_warp_cond1'] == 2) 
                  {
                    echo "[ ";
                  }
                  else
                  {
                    echo "] ";
                  }
                  
                  echo $row1['yarn_count_warp_value1'];
                  echo " - ";
                  echo $row1['yarn_count_warp_value2'];

                  if ($row1['yarn_count_warp_cond2'] == 1) 
                  {
                    echo " )";
                  }
                  elseif ($row1['yarn_count_warp_cond2'] == 2) 
                  {
                    echo " ]";
                  }
                  else
                  {
                    echo " [";
                  }
                ?>
              </td>


              <td>
                <?php 
                  if ($row1['yarn_count_weft_cond1'] == 1) 
                  {
                    echo "( ";
                  }
                  elseif ($row1['yarn_count_weft_cond1'] == 2) 
                  {
                    echo "[ ";
                  }
                  else
                  {
                    echo "] ";
                  }
                  
                  echo $row1['yarn_count_weft_value1'];
                  echo " - ";
                  echo $row1['yarn_count_weft_value2'];

                  if ($row1['yarn_count_weft_cond2'] == 1) 
                  {
                    echo " )";
                  }
                  elseif ($row1['yarn_count_weft_cond2'] == 2) 
                  {
                    echo " ]";
                  }
                  else
                  {
                    echo " [";
                  }
                ?>
              </td>
            </tr>
          </tbody> 
        </table>
       </div>

      <div class="x_content">
        <table id="datatable-buttons" class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>SI</th>

              <th>Fiber Total Polyester</th>
              <th>Fiber Total Cotton</th>
              <th>Fiber Total Thired</th>
              <th>Fiber Total Fourth</th>

              <th>Fiber Warp Polyester</th>
              <th>Fiber Warp Cotton</th>
              <th>Fiber Warp Thired</th>
              <th>Fiber Warp Fourth</th>


              <th>Fiber Weft Polyester</th>
              <th>Fiber Weft Cotton</th>
              <th>Fiber Weft Thired</th>
              <th>Fiber Weft Fourth</th>

              <th>Action</th>
            </tr>
          </thead>
          
          <tbody>
            <?php 
              $s1 = 1;
              $sql_for_pp = "SELECT 
                                pp.pp_no,
                                pp.pp_id,
                                pp_details.pp_id,
                                pp_details.pp_no_id,
                                pp_details.version,
                                pp_details.color,
                                pp_details.gray_width,
                                pp_details.quantity,
                                finishing_standard.*

                             FROM 
                                pp, pp_details, finishing_standard   
                             WHERE 
                                pp.pp_id = '$pp_no_id'
                                AND pp.pp_id = pp_details.pp_no_id
                                AND finishing_standard.pp_no_id = pp_details.pp_no_id
                                AND finishing_standard.pp_details_id = pp_details.pp_id
                                AND finishing_standard.active = '1'
                                AND pp_details.active = '1'
                             ";



              $res_for_pp = mysqli_query($con, $sql_for_pp);

              $row = mysqli_fetch_assoc($res_for_pp);
            ?>
            <tr>
              <td><?php echo $s1; ?></td>

              <td>
                <?php 
                  if ($row['fiber_total_polyester_cond1'] == 1) 
                  {
                    echo "( ";
                  }
                  elseif ($row['fiber_total_polyester_cond1'] == 2) 
                  {
                    echo "[ ";
                  }
                  else
                  {
                    echo "] ";
                  }
                  
                  echo $row['fiber_total_polyester_value1'];
                  echo " - ";
                  echo $row['fiber_total_polyester_value2'];

                  if ($row['fiber_total_polyester_cond2'] == 1) 
                  {
                    echo " )";
                  }
                  elseif ($row['fiber_total_polyester_cond2'] == 2) 
                  {
                    echo " ]";
                  }
                  else
                  {
                    echo " [";
                  }
                ?>
              </td>

              <td>
                <?php 
                  if ($row['fiber_total_cotton_cond1'] == 1) 
                  {
                    echo "( ";
                  }
                  elseif ($row['fiber_total_cotton_cond1'] == 2) 
                  {
                    echo "[ ";
                  }
                  else
                  {
                    echo "] ";
                  }
                  
                  echo $row['fiber_total_cotton_value1'];
                  echo " - ";
                  echo $row['fiber_total_cotton_value2'];

                  if ($row['fiber_total_cotton_cond2'] == 1) 
                  {
                    echo " )";
                  }
                  elseif ($row['fiber_total_cotton_cond2'] == 2) 
                  {
                    echo " ]";
                  }
                  else
                  {
                    echo " [";
                  }
                ?>
              </td>
              <td>
                <?php 
                  echo $row['fiber_total_name_thired'];

                  if ($row['fiber_total_thired_cond1'] == 1) 
                  {
                    echo "( ";
                  }
                  elseif ($row['fiber_total_thired_cond1'] == 2) 
                  {
                    echo "[ ";
                  }
                  elseif ($row['fiber_total_thired_cond1'] == 0) 
                  {
                    echo "[ ";
                  }
                  else
                  {
                    echo "] ";
                  }
                  
                  echo $row['fiber_total_thired_value1'];
                  echo " - ";
                  echo $row['fiber_total_thired_value2'];

                  if ($row['fiber_total_thired_cond2'] == 1) 
                  {
                    echo " )";
                  }
                  elseif ($row['fiber_total_thired_cond2'] == 2) 
                  {
                    echo " ]";
                  }
                  elseif ($row['fiber_total_thired_cond2'] == 0) 
                  {
                    echo " ]";
                  }

                  else
                  {
                    echo " [";
                  }
                ?>
              </td>

              <td>
                <?php 
                  echo $row['fiber_total_name_fourth'];
                  
                  if ($row['fiber_total_fourth_cond1'] == 1) 
                  {
                    echo "( ";
                  }
                  elseif ($row['fiber_total_fourth_cond1'] == 2) 
                  {
                    echo "[ ";
                  }
                  elseif ($row['fiber_total_fourth_cond1'] == 0) 
                  {
                    echo "[ ";
                  }
                  else
                  {
                    echo "] ";
                  }
                  
                  echo $row['fiber_total_fourth_value1'];
                  echo " - ";
                  echo $row['fiber_total_fourth_value2'];

                  if ($row['fiber_total_fourth_cond2'] == 1) 
                  {
                    echo " )";
                  }
                  elseif ($row['fiber_total_fourth_cond2'] == 2) 
                  {
                    echo " ]";
                  }
                  elseif ($row['fiber_total_fourth_cond2'] == 0) 
                  {
                    echo " ]";
                  }
                  else
                  {
                    echo " [";
                  }
                ?>
              </td>

              <td>
                <?php 
                  if ($row['fiber_warp_polyester_cond1'] == 1) 
                  {
                    echo "( ";
                  }
                  elseif ($row['fiber_warp_polyester_cond1'] == 2) 
                  {
                    echo "[ ";
                  }
                  elseif ($row['fiber_warp_polyester_cond1'] == 0) 
                  {
                    echo "[ ";
                  }
                  else
                  {
                    echo "] ";
                  }
                  
                  echo $row['fiber_warp_polyester_value1'];
                  echo " - ";
                  echo $row['fiber_warp_polyester_value2'];  

                  if ($row['fiber_warp_polyester_cond2'] == 1)  
                  {
                    echo " )";
                  }
                  elseif ($row['fiber_warp_polyester_cond2'] == 2) 
                  {
                    echo " ]";
                  }
                  elseif ($row['fiber_warp_polyester_cond2'] == 0) 
                  {
                    echo " ]";
                  }
                  else
                  {
                    echo " [";
                  }
                ?>
              </td>

              <td>
                <?php 
                  if ($row['fiber_warp_cotton_cond1'] == 1) 
                  {
                    echo "( ";
                  }
                  elseif ($row['fiber_warp_cotton_cond1'] == 2) 
                  {
                    echo "[ ";
                  }
                  elseif ($row['fiber_warp_cotton_cond1'] == 0) 
                  {
                    echo "[ ";
                  }
                  else
                  {
                    echo "] ";
                  }
                  
                  echo $row['fiber_warp_cotton_value1'];
                  echo " - ";
                  echo $row['fiber_warp_cotton_value2'];

                  if ($row['fiber_warp_cotton_cond2'] == 1) 
                  {
                    echo " )";
                  }
                  elseif ($row['fiber_warp_cotton_cond2'] == 2) 
                  {
                    echo " ]";
                  }
                  elseif ($row['fiber_warp_cotton_cond2'] == 0) 
                  {
                    echo " ]";
                  }
                  else
                  {
                    echo " [";
                  }
                ?>
              </td>
              <td>
                <?php 
                  echo $row['fiber_warp_name_thired'];

                  if ($row['fiber_warp_thired_cond1'] == 1) 
                  {
                    echo "( ";
                  }
                  elseif ($row['fiber_warp_thired_cond1'] == 2) 
                  {
                    echo "[ ";
                  }
                  elseif ($row['fiber_warp_thired_cond1'] == 0) 
                  {
                    echo "[ ";
                  }
                  else
                  {
                    echo "] ";
                  }
                  
                  echo $row['fiber_warp_thired_value1'];
                  echo " - ";
                  echo $row['fiber_warp_thired_value2'];

                  if ($row['fiber_warp_thired_cond2'] == 1) 
                  {
                    echo " )";
                  }
                  elseif ($row['fiber_warp_thired_cond2'] == 2) 
                  {
                    echo " ]";
                  }
                  elseif ($row['fiber_warp_thired_cond2'] == 0) 
                  {
                    echo " ]";
                  }
                  else
                  {
                    echo " [";
                  }
                ?>
              </td>

              <td>
                <?php 
                  echo $row['fiber_warp_name_fourth'];
                  
                  if ($row['fiber_warp_fourth_cond1'] == 1) 
                  {
                    echo "( ";
                  }
                  elseif ($row['fiber_warp_fourth_cond1'] == 2) 
                  {
                    echo "[ ";
                  }
                  elseif ($row['fiber_warp_fourth_cond1'] == 0) 
                  {
                    echo "[ ";
                  }
                  else
                  {
                    echo "] ";
                  }
                  
                  echo $row['fiber_warp_fourth_value1'];
                  echo " - ";
                  echo $row['fiber_warp_fourth_value2'];

                  if ($row['fiber_warp_fourth_cond2'] == 1) 
                  {
                    echo " )";
                  }
                  elseif ($row['fiber_warp_fourth_cond2'] == 2) 
                  {
                    echo " ]";
                  }
                  elseif ($row['fiber_warp_fourth_cond2'] == 0) 
                  {
                    echo " ]";
                  }
                  else
                  {
                    echo " [";
                  }
                ?>
              </td>


              <td>
                <?php 
                  if ($row['fiber_weft_polyester_cond1'] == 1) 
                  {
                    echo "( ";
                  }
                  elseif ($row['fiber_weft_polyester_cond1'] == 2) 
                  {
                    echo "[ ";
                  }
                  elseif ($row['fiber_weft_polyester_cond1'] == 0) 
                  {
                    echo "[ ";
                  }
                  else
                  {
                    echo "] ";
                  }
                  
                  echo $row['fiber_weft_polyester_value1'];
                  echo " - ";
                  echo $row['fiber_weft_polyester_value2'];

                  if ($row['fiber_weft_polyester_cond2'] == 1) 
                  {
                    echo " )";
                  }
                  elseif ($row['fiber_weft_polyester_cond2'] == 2) 
                  {
                    echo " ]";
                  }
                  elseif ($row['fiber_weft_polyester_cond2'] == 0) 
                  {
                    echo " ]";
                  }
                  else
                  {
                    echo " [";
                  }
                ?>
              </td>

              <td>
                <?php 
                  if ($row['fiber_weft_cotton_cond1'] == 1) 
                  {
                    echo "( ";
                  }
                  elseif ($row['fiber_weft_cotton_cond1'] == 2) 
                  {
                    echo "[ ";
                  }
                  elseif ($row['fiber_weft_cotton_cond1'] == 0) 
                  {
                    echo "[ ";
                  }
                  else
                  {
                    echo "] ";
                  }
                  
                  echo $row['fiber_weft_cotton_value1'];
                  echo " - ";
                  echo $row['fiber_weft_cotton_value2'];

                  if ($row['fiber_weft_cotton_cond2'] == 1) 
                  {
                    echo " )";
                  }
                  elseif ($row['fiber_weft_cotton_cond2'] == 2) 
                  {
                    echo " ]";
                  }
                  elseif ($row['fiber_weft_cotton_cond2'] == 0) 
                  {
                    echo " ]";
                  }
                  else
                  {
                    echo " [";
                  }
                ?>
              </td>
              <td>
                <?php 
                  echo $row['fiber_weft_name_thired'];

                  if ($row['fiber_weft_thired_cond1'] == 1) 
                  {
                    echo "( ";
                  }
                  elseif ($row['fiber_weft_thired_cond1'] == 2) 
                  {
                    echo "[ ";
                  }
                  elseif ($row['fiber_weft_thired_cond1'] == 0) 
                  {
                    echo "[ ";
                  }
                  else
                  {
                    echo "] ";
                  }
                  
                  echo $row['fiber_weft_thired_value1'];
                  echo " - ";
                  echo $row['fiber_weft_thired_value2'];

                  if ($row['fiber_weft_thired_cond2'] == 1) 
                  {
                    echo " )";
                  }
                  elseif ($row['fiber_weft_thired_cond2'] == 2) 
                  {
                    echo " ]";
                  }
                  elseif ($row['fiber_weft_thired_cond2'] == 0) 
                  {
                    echo " ]";
                  }
                  else
                  {
                    echo " [";
                  }
                ?>
              </td>

              <td>
                <?php 
                  echo $row['fiber_weft_name_fourth'];
                  
                  if ($row['fiber_weft_fourth_cond1'] == 1) 
                  {
                    echo "( ";
                  }
                  elseif ($row['fiber_weft_fourth_cond1'] == 2) 
                  {
                    echo "[ ";
                  }
                  elseif ($row['fiber_weft_fourth_cond1'] == 0) 
                  {
                    echo "[ ";
                  }
                  else
                  {
                    echo "] ";
                  }
                  
                  echo $row['fiber_weft_fourth_value1'];
                  echo " - ";
                  echo $row['fiber_weft_fourth_value2'];

                  if ($row['fiber_weft_fourth_cond2'] == 1) 
                  {
                    echo " )";
                  }
                  elseif ($row['fiber_weft_fourth_cond2'] == 2) 
                  {
                    echo " ]";
                  }
                  elseif ($row['fiber_weft_fourth_cond2'] == 0) 
                  {
                    echo " ]";
                  }
                  else
                  {
                    echo " [";
                  }
                ?>
              </td>

              <td>
                <!-- <form action="gray_varibale_edit.php" method="post" style="display: inline-block;"> -->
                  <input type="hidden" id="pp_no" name="pp_no" value="<?php echo $row['pp_no']; ?>">
                  <input type="hidden" id="color" name="color" value="<?php echo $row['color']; ?>">
                  <input type="hidden" id="version" name="version" value="<?php echo $row['version']; ?>">
                  <input type="hidden" id="gray_width" name="gray_width" value="<?php echo $row['gray_width']; ?>">
                  <input type="hidden" id="pp_id_number" name="pp_id_number" value="<?php echo $pp_no_id; ?>">
                  <button type="submit" id="gray_issue_add_btn" name="gray_issue_add_btn" onclick="edit_for_finishing_standard();" class="btn btn-primary btn-xs"> Edit </button>
                <!-- </form> -->
              </td>
            </tr>
          </tbody> 
        </table>
      </div>

    </div>
  </div>
</div>
<!-- main content again finished -->
<?php
?>