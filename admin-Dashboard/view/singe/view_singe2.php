<?php
session_start();
require_once("../includes/db_session_chk.php");
$route_issue_id = $_GET['route_issue_id'];
$greige_issunce_id = $_GET['greige_issunce_id'];
?>

<?php
      $sql_for_gray_variable = "SELECT singe_standard.*, greige_issunce.* 

                          FROM singe_standard, greige_issunce

                         WHERE greige_issunce.greige_issunce_id ='$greige_issunce_id'
                         AND  singe_standard.pp_details_id = greige_issunce.pp_details_id
                         AND  singe_standard.pp_no_id = greige_issunce.pp_no_id
                         AND greige_issunce.active = '1'
                         AND singe_standard.active = '1'
                         ";
      $res_for_gray_variable = mysqli_query($con, $sql_for_gray_variable);
      $row_gray_variable = mysqli_fetch_assoc($res_for_gray_variable);

      $greige_received_quantity = $row_gray_variable['received_quantity'];

      $intensity_cond1 = $row_gray_variable['intensity_cond1'];
      $intensity_value1 = $row_gray_variable['intensity_value1'];
      $intensity_value2 = $row_gray_variable['intensity_value2'];
      $intensity_cond2 = $row_gray_variable['intensity_cond2'];

      $speed_cond1 = $row_gray_variable['speed_cond1'];
      $speed_value1 = $row_gray_variable['speed_value1'];
      $speed_value2 = $row_gray_variable['speed_value2'];
      $speed_cond2 = $row_gray_variable['speed_cond2'];

      $temp_cond1 = $row_gray_variable['temp_cond1'];
      $temp_value1 = $row_gray_variable['temp_value1'];
      $temp_value2 = $row_gray_variable['temp_value2'];
      $temp_cond2 = $row_gray_variable['temp_cond2'];

      $ph_cond1 = $row_gray_variable['ph_cond1'];
      $ph_value1 = $row_gray_variable['ph_value1'];
      $ph_value2 = $row_gray_variable['ph_value2'];
      $ph_cond2 = $row_gray_variable['ph_cond2'];
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
                    </ol>
                  </div>
                </div>

                <!-- main content again -->
                <div class="clearfix"></div>
                <div class="row">

                      <div class="page-title">
                        <div class="title_left">
                          <ol class="breadcrumb">
                          </ol>
                        </div>
                      </div>


                       <div class="col-md-12 col-sm-12 col-xs-12">
                          <div class="x_panel">
                            <div class="x_title">
                              <h2>Singing Process</h2>
                              <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                              </ul>
                              <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                              <table  class="table table-striped table-bordered">
                                <thead>
                                  <tr>
                                    <th>SI</th>
                                    <th>Route</th>
                                    <th>Process/Reprocess</th>
                                    <th>Greige Received Quantity</th>
                                    <th>Batcher/Trolly</th>
                                    <th>Process Width</th>
                                    <th>Visual Assessment(Singe Quality)</th>
                                    <th>After Singe Quantity</th>
                                    <th>Machine Name</th>
                                    <th>Flame Intensity (mbar)</th>
                                    <th>Speed</th>
                                    <th>Temperature</th>
                                    <th>pH</th>
                                  </tr>
                                </thead>

                                <tbody>
                                  <?php
                                    $s1 = 1;
                                    $sql_for_pp = "SELECT route_issue.*, singe.*
                                                   FROM route_issue, singe
                                                   WHERE singe.route_issue_id = '$route_issue_id'
                                                   AND route_issue.route_issue_id = singe.route_issue_id
                                                   AND singe.active = '1'
                                                   AND route_issue.active = '1'
                                                   ORDER BY singe.singe_id ASC
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
                                    <td><?php echo $greige_received_quantity ?></td>
                                    <td><?php echo $row['batcher'] ?></td>
                                    <td><?php echo $row['p_width'] ?></td>
                                    <td><?php echo $row['visual_assessment'] ?></td>
                                    <td><?php echo $row['p_qty'] ?></td>
                                    <td><?php echo $row['m_c_name'] ?></td>

                                    <!-- for intensity condition -->
                                    <?php

                                        $problem_condition1 = "";
                                        $problem_condition2 = "";
                                        $ok1 = "";
                                        $ok2 = "";

                                        if($intensity_cond1 == '1')
                                        {
                                          if ( !($intensity_value1 < $row['flame']) )
                                          {
                                            $problem_condition1 = "problem";
                                          }
                                          else
                                          {
                                            $ok1 = "ok";
                                          }
                                        }
                                        else
                                        {
                                          if ( !($intensity_value1 <= $row['flame']) )
                                          {
                                            $problem_condition1 = "problem";
                                          }
                                          else
                                          {
                                            $ok1 = "ok";
                                          }
                                        }

                                        if($intensity_cond2 == '1')
                                        {
                                          if ( !($intensity_value2 > $row['flame']) )
                                          {
                                            $problem_condition2 = "problem";
                                          }
                                          else
                                          {
                                            $ok2 = "ok";
                                          }
                                        }

                                        else
                                        {
                                          if ( !($intensity_value2 >= $row['flame']) )
                                          {
                                            $problem_condition2 = "problem";
                                          }
                                          else
                                          {
                                            $ok2 = "ok";
                                          }
                                        }


                                        if (($problem_condition1 == "problem") && ($problem_condition2 == "problem"))
                                        {
                                          ?>
                                          <td bgcolor="#FF0000" ><?php echo $row['flame'] ?></td>
                                          <?php
                                        }

                                        else if ( ($ok1 == "ok") && ($ok2 == "ok") )
                                        {
                                          ?>
                                            <td bgcolor="#00FF00"><?php echo $row['flame'] ?></td>
                                          <?php
                                        }

                                        else
                                        {
                                          ?>
                                            <td bgcolor="#FF0000" ><?php echo $row['flame'] ?></td>
                                          <?php
                                        }

                                    ?>

                                    <!-- for speed condition -->
                                    <?php

                                        $problem_condition1 = "";
                                        $problem_condition2 = "";
                                        $ok1 = "";
                                        $ok2 = "";

                                        if($speed_cond1 == '1')
                                        {
                                          if ( !($speed_value1 < $row['speed']) )
                                          {
                                            $problem_condition1 = "problem";
                                          }
                                          else
                                          {
                                            $ok1 = "ok";
                                          }
                                        }
                                        else
                                        {
                                          if ( !($speed_value1 <= $row['speed']) )
                                          {
                                            $problem_condition1 = "problem";
                                          }
                                          else
                                          {
                                            $ok1 = "ok";
                                          }
                                        }

                                        if($speed_cond2 == '1')
                                        {
                                          if ( !($speed_value2 > $row['speed']) )
                                          {
                                            $problem_condition2 = "problem";
                                          }
                                          else
                                          {
                                            $ok2 = "ok";
                                          }
                                        }

                                        else
                                        {
                                          if ( !($speed_value2 >= $row['speed']) )
                                          {
                                            $problem_condition2 = "problem";
                                          }
                                          else
                                          {
                                            $ok2 = "ok";
                                          }
                                        }


                                        if (($problem_condition1 == "problem") && ($problem_condition2 == "problem"))
                                        {
                                          ?>
                                          <td bgcolor="#FF0000" ><?php echo $row['speed'] ?></td>
                                          <?php
                                        }

                                        else if ( ($ok1 == "ok") && ($ok2 == "ok") )
                                        {
                                          ?>
                                            <td bgcolor="#00FF00"><?php echo $row['speed'] ?></td>
                                          <?php
                                        }

                                        else
                                        {
                                          ?>
                                            <td bgcolor="#FF0000" ><?php echo $row['speed'] ?></td>
                                          <?php
                                        }

                                    ?>

                                    <!-- for temp condition -->
                                    <?php

                                        $problem_condition1 = "";
                                        $problem_condition2 = "";
                                        $ok1 = "";
                                        $ok2 = "";

                                        if($temp_cond1 == '1')
                                        {
                                          if ( !($temp_value1 < $row['temp']) )
                                          {
                                            $problem_condition1 = "problem";
                                          }
                                          else
                                          {
                                            $ok1 = "ok";
                                          }
                                        }
                                        else
                                        {
                                          if ( !($temp_value1 <= $row['temp']) )
                                          {
                                            $problem_condition1 = "problem";
                                          }
                                          else
                                          {
                                            $ok1 = "ok";
                                          }
                                        }

                                        if($temp_cond2 == '1')
                                        {
                                          if ( !($temp_value2 > $row['temp']) )
                                          {
                                            $problem_condition2 = "problem";
                                          }
                                          else
                                          {
                                            $ok2 = "ok";
                                          }
                                        }

                                        else
                                        {
                                          if ( !($temp_value2 >= $row['temp']) )
                                          {
                                            $problem_condition2 = "problem";
                                          }
                                          else
                                          {
                                            $ok2 = "ok";
                                          }
                                        }


                                        if (($problem_condition1 == "problem") && ($problem_condition2 == "problem"))
                                        {
                                          ?>
                                          <td bgcolor="#FF0000" ><?php echo $row['temp'] ?></td>
                                          <?php
                                        }

                                        else if ( ($ok1 == "ok") && ($ok2 == "ok") )
                                        {
                                          ?>
                                            <td bgcolor="#00FF00"><?php echo $row['temp'] ?></td>
                                          <?php
                                        }

                                        else
                                        {
                                          ?>
                                            <td bgcolor="#FF0000" ><?php echo $row['temp'] ?></td>
                                          <?php
                                        }

                                    ?>

                                    <!-- for ph condition -->
                                    <?php

                                        $problem_condition1 = "";
                                        $problem_condition2 = "";
                                        $ok1 = "";
                                        $ok2 = "";

                                        if($ph_cond1 == '1')
                                        {
                                          if ( !($ph_value1 < $row['ph']) )
                                          {
                                            $problem_condition1 = "problem";
                                          }
                                          else
                                          {
                                            $ok1 = "ok";
                                          }
                                        }
                                        else
                                        {
                                          if ( !($ph_value1 <= $row['ph']) )
                                          {
                                            $problem_condition1 = "problem";
                                          }
                                          else
                                          {
                                            $ok1 = "ok";
                                          }
                                        }

                                        if($ph_cond2 == '1')
                                        {
                                          if ( !($ph_value2 > $row['ph']) )
                                          {
                                            $problem_condition2 = "problem";
                                          }
                                          else
                                          {
                                            $ok2 = "ok";
                                          }
                                        }

                                        else
                                        {
                                          if ( !($ph_value2 >= $row['ph']) )
                                          {
                                            $problem_condition2 = "problem";
                                          }
                                          else
                                          {
                                            $ok2 = "ok";
                                          }
                                        }


                                        if (($problem_condition1 == "problem") && ($problem_condition2 == "problem"))
                                        {
                                          ?>
                                          <td bgcolor="#FF0000"><?php echo $row['ph'] ?></td>
                                          <?php
                                        }

                                        else if ( ($ok1 == "ok") && ($ok2 == "ok") )
                                        {
                                          ?>
                                            <td bgcolor="#00FF00"><?php echo $row['ph'] ?></td>
                                          <?php
                                        }

                                        else
                                        {
                                          ?>
                                            <td bgcolor="#FF0000"><?php echo $row['ph'] ?></td>
                                          <?php
                                        }

                                    ?>
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

</body>
</html>
