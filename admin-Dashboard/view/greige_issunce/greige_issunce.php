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
                        <li>Greige Receving</li>
                        <li>Version Wise Greige Receiving</li>
                    </ol>
                  </div>
                </div>

                <!-- main content again -->
                <div class="clearfix"></div>
                <div class="row">
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                      <div class="x_title">
                        <h2>Version Wise Greige Receiving </h2>
                        <ul class="nav navbar-right panel_toolbox">
                          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                          </li>
                        </ul>
                        <div class="clearfix"></div>
                      </div>
                      <div class="x_content">
                        <form id="define-standard-form" action="" method="" data-parsley-validate class="form-horizontal form-label-left">
                          <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                            <label class="control-label col-md-2 col-sm-3 col-xs-12" for="customer">PP Number <span class="required">*</span>
                            </label>
                            <div class="col-md-4 col-sm-6 col-xs-12">
                              <select id="pp_no_id" name="pp_no_id" class="action select2 pp_number form-control col-md-12 col-xs-12" onchange="">
                                <option value="" selected="selected">Select PP Number</option>
                                <?php
                                  $pp_sql = "SELECT pp_no, pp_id FROM process_program_info ORDER BY pp_id DESC";
                                  $pp_res = mysqli_query($con, $pp_sql) or die(mysqli_error($con));
                                  while ($pp_row = mysqli_fetch_assoc($pp_res))
                                  {
                                      echo "<option value='".$pp_row['pp_id']."'>";
                                      echo $pp_row['pp_no'];
                                      echo "</option>";
                                  }
                                ?>
                              </select>
                            </div>
                          </div>
                          <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                            <label class="control-label col-md-2 col-sm-3 col-xs-12" for="customer">PP Version <span class="required">*</span>
                            </label>
                            <div class="col-md-4 col-sm-6 col-xs-12">
                              <select id="pp_version" name="pp_version" class="select2 pp_version form-control col-md-12 col-xs-12">
                                <option value="" selected="selected">Select PP Version</option>
                              </select>
                            </div>
                          </div>

                          <!-- <div class="ln_solid"></div> -->
                          <div class="form-group" style="padding-left: 7px;">
                            <div class="col-md-12 col-sm-12 col-xs-12 col-md-offset-2">
                              <button type="button" id="retrieve_data" class="btn btn-success">Search</button>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- main content finished -->

                <!-- main content again -->
                <div class="row">
                  <div class="col-md-12 col-sm-12 col-xs-12" id="retrieve_general_data">
                  </div>
                </div>
                <!-- main content again finished -->

                <!-- main content again -->
                <div class="row">
                  <div class="col-md-12 col-sm-12 col-xs-12" id="retrieve_details_data">
                  </div>
                </div>
                <!-- main content again finished -->

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

<script type="text/javascript" src="add_greige_issunce.js"></script>
<script type="text/javascript" src="edit_greige_issunce.js"></script>
<script type="text/javascript">


function fiberTotalPolyesterCheck() 
{
  //condition for yarn warp polyester
  var fiber_total_polyester = document.getElementsByClassName("fiber_total_polyester")[0].value;
  var fiber_total_polyester_input_result = parseFloat(fiber_total_polyester);
  var fiber_total_polyester_cond1 = document.getElementById("fiber_total_polyester_cond1").value;
  var fiber_total_polyester_cond2 = document.getElementById("fiber_total_polyester_cond2").value;
  var fiber_total_polyester_value1 = document.getElementById("fiber_total_polyester_value1").value;
  var fiber_total_polyester_value2 = document.getElementById("fiber_total_polyester_value2").value;
  var problem_condition1 = "";
  var problem_condition2 = "";
  var ok1 = "";
  var ok2 = "";

  if(fiber_total_polyester_cond1 == '(')
  {
    if ( !(fiber_total_polyester_value1 < fiber_total_polyester_input_result) )
    {
      problem_condition1 = "problem";
    }
    else
    {
      ok1 = "ok";
    }
  }
  else if(fiber_total_polyester_cond1 == '[')
  {
    if ( !(fiber_total_polyester_value1 <= fiber_total_polyester_input_result) )
    {
      problem_condition1 = "problem";
    }
    else
    {
      ok1 = "ok";
    }
  }
  else
  {
    if ( !(fiber_total_polyester_value1 >= fiber_total_polyester_input_result) )
    {
      problem_condition1 = "problem";
    }
    else
    {
      ok1 = "ok";
    }
  }

  if(fiber_total_polyester_cond2 == ')')
  {
    if ( !(fiber_total_polyester_value2 > fiber_total_polyester_input_result) )
    {
      problem_condition2 = "problem";
    }
    else
    {
      ok2 = "ok";
    }
  }

  else if(fiber_total_polyester_cond2 == ']')
  {
    if ( !(fiber_total_polyester_value2 >= fiber_total_polyester_input_result) )
    {
      problem_condition2 = "problem";
    }
    else
    {
      ok2 = "ok";
    }
  }

  else
  {
    if ( !(fiber_total_polyester_value2 <= fiber_total_polyester_input_result) )
    {
      problem_condition2 = "problem";
    }
    else
    {
      ok2 = "ok";
    }
  }

  if ((problem_condition1 == "problem") && (problem_condition2 == "problem")) 
  {
    document.getElementById("fiber_total_polyester").style.color = "#ff0000";
  }

  else if ( (ok1 == "ok") && (ok2 == "ok") )
  {
    document.getElementById("fiber_total_polyester").style.color = "green";
  }

  else
  {
    document.getElementById("fiber_total_polyester").style.color = "#ff0000";
  }

}


function fiberTotalCottonCheck() 
{
  //condition for yarn warp polyester
  var fiber_total_cotton = document.getElementsByClassName("fiber_total_cotton")[0].value;
  var fiber_total_cotton_input_result = parseFloat(fiber_total_cotton);
  var fiber_total_cotton_cond1 = document.getElementById("fiber_total_cotton_cond1").value;
  var fiber_total_cotton_cond2 = document.getElementById("fiber_total_cotton_cond2").value;
  var fiber_total_cotton_value1 = document.getElementById("fiber_total_cotton_value1").value;
  var fiber_total_cotton_value2 = document.getElementById("fiber_total_cotton_value2").value;
  var problem_condition1 = "";
  var problem_condition2 = "";
  var ok1 = "";
  var ok2 = "";

  if(fiber_total_cotton_cond1 == '(')
  {
    if ( !(fiber_total_cotton_value1 < fiber_total_cotton_input_result) )
    {
      problem_condition1 = "problem";
    }
    else
    {
      ok1 = "ok";
    }
  }
  else if(fiber_total_cotton_cond1 == '[')
  {
    if ( !(fiber_total_cotton_value1 <= fiber_total_cotton_input_result) )
    {
      problem_condition1 = "problem";
    }
    else
    {
      ok1 = "ok";
    }
  }
  else
  {
    if ( !(fiber_total_cotton_value1 >= fiber_total_cotton_input_result) )
    {
      problem_condition1 = "problem";
    }
    else
    {
      ok1 = "ok";
    }
  }

  if(fiber_total_cotton_cond2 == ')')
  {
    if ( !(fiber_total_cotton_value2 > fiber_total_cotton_input_result) )
    {
      problem_condition2 = "problem";
    }
    else
    {
      ok2 = "ok";
    }
  }

  else if(fiber_total_cotton_cond2 == ']')
  {
    if ( !(fiber_total_cotton_value2 >= fiber_total_cotton_input_result) )
    {
      problem_condition2 = "problem";
    }
    else
    {
      ok2 = "ok";
    }
  }

  else
  {
    if ( !(fiber_total_cotton_value2 <= fiber_total_cotton_input_result) )
    {
      problem_condition2 = "problem";
    }
    else
    {
      ok2 = "ok";
    }
  }

  if ((problem_condition1 == "problem") && (problem_condition2 == "problem")) 
  {
    document.getElementById("fiber_total_cotton").style.color = "#ff0000";
  }

  else if ( (ok1 == "ok") && (ok2 == "ok") )
  {
    document.getElementById("fiber_total_cotton").style.color = "green";
  }

  else
  {
    document.getElementById("fiber_total_cotton").style.color = "#ff0000";
  }

}

function fiberTotalThiredCheck() 
{
  //condition for yarn total polyester
  var fiber_total_thired = document.getElementsByClassName("fiber_total_thired")[0].value;
  var fiber_total_thired_input_result = parseFloat(fiber_total_thired);
  var fiber_total_thired_cond1 = document.getElementById("fiber_total_thired_cond1").value;
  var fiber_total_thired_cond2 = document.getElementById("fiber_total_thired_cond2").value;
  var fiber_total_thired_value1 = document.getElementById("fiber_total_thired_value1").value;
  var fiber_total_thired_value2 = document.getElementById("fiber_total_thired_value2").value;
  var problem_condition1 = "";
  var problem_condition2 = "";
  var ok1 = "";
  var ok2 = "";

  if(fiber_total_thired_cond1 == '(')
  {
    if ( !(fiber_total_thired_value1 < fiber_total_thired_input_result) )
    {
      problem_condition1 = "problem";
    }
    else
    {
      ok1 = "ok";
    }
  }
  else if(fiber_total_thired_cond1 == '[')
  {
    if ( !(fiber_total_thired_value1 <= fiber_total_thired_input_result) )
    {
      problem_condition1 = "problem";
    }
    else
    {
      ok1 = "ok";
    }
  }
  else
  {
    if ( !(fiber_total_thired_value1 >= fiber_total_thired_input_result) )
    {
      problem_condition1 = "problem";
    }
    else
    {
      ok1 = "ok";
    }
  }

  if(fiber_total_thired_cond2 == ')')
  {
    if ( !(fiber_total_thired_value2 > fiber_total_thired_input_result) )
    {
      problem_condition2 = "problem";
    }
    else
    {
      ok2 = "ok";
    }
  }

  else if(fiber_total_thired_cond2 == ']')
  {
    if ( !(fiber_total_thired_value2 >= fiber_total_thired_input_result) )
    {
      problem_condition2 = "problem";
    }
    else
    {
      ok2 = "ok";
    }
  }

  else
  {
    if ( !(fiber_total_thired_value2 <= fiber_total_thired_input_result) )
    {
      problem_condition2 = "problem";
    }
    else
    {
      ok2 = "ok";
    }
  }

  if ((problem_condition1 == "problem") && (problem_condition2 == "problem")) 
  {
    document.getElementById("fiber_total_thired").style.color = "#ff0000";
  }

  else if ( (ok1 == "ok") && (ok2 == "ok") )
  {
    document.getElementById("fiber_total_thired").style.color = "green";
  }

  else
  {
    document.getElementById("fiber_total_thired").style.color = "#ff0000";
  }

}

function fiberTotalFourthCheck() 
{
  //condition for yarn total polyester
  var fiber_total_fourth = document.getElementsByClassName("fiber_total_fourth")[0].value;
  var fiber_total_fourth_input_result = parseFloat(fiber_total_fourth);
  var fiber_total_fourth_cond1 = document.getElementById("fiber_total_fourth_cond1").value;
  var fiber_total_fourth_cond2 = document.getElementById("fiber_total_fourth_cond2").value;
  var fiber_total_fourth_value1 = document.getElementById("fiber_total_fourth_value1").value;
  var fiber_total_fourth_value2 = document.getElementById("fiber_total_fourth_value2").value;
  var problem_condition1 = "";
  var problem_condition2 = "";
  var ok1 = "";
  var ok2 = "";

  if(fiber_total_fourth_cond1 == '(')
  {
    if ( !(fiber_total_fourth_value1 < fiber_total_fourth_input_result) )
    {
      problem_condition1 = "problem";
    }
    else
    {
      ok1 = "ok";
    }
  }
  else if(fiber_total_fourth_cond1 == '[')
  {
    if ( !(fiber_total_fourth_value1 <= fiber_total_fourth_input_result) )
    {
      problem_condition1 = "problem";
    }
    else
    {
      ok1 = "ok";
    }
  }
  else
  {
    if ( !(fiber_total_fourth_value1 >= fiber_total_fourth_input_result) )
    {
      problem_condition1 = "problem";
    }
    else
    {
      ok1 = "ok";
    }
  }

  if(fiber_total_fourth_cond2 == ')')
  {
    if ( !(fiber_total_fourth_value2 > fiber_total_fourth_input_result) )
    {
      problem_condition2 = "problem";
    }
    else
    {
      ok2 = "ok";
    }
  }

  else if(fiber_total_fourth_cond2 == ']')
  {
    if ( !(fiber_total_fourth_value2 >= fiber_total_fourth_input_result) )
    {
      problem_condition2 = "problem";
    }
    else
    {
      ok2 = "ok";
    }
  }

  else
  {
    if ( !(fiber_total_fourth_value2 <= fiber_total_fourth_input_result) )
    {
      problem_condition2 = "problem";
    }
    else
    {
      ok2 = "ok";
    }
  }

  if ((problem_condition1 == "problem") && (problem_condition2 == "problem")) 
  {
    document.getElementById("fiber_total_fourth").style.color = "#ff0000";
  }

  else if ( (ok1 == "ok") && (ok2 == "ok") )
  {
    document.getElementById("fiber_total_fourth").style.color = "green";
  }

  else
  {
    document.getElementById("fiber_total_fourth").style.color = "#ff0000";
  }

}

function fiberWarpCottonCheck() 
{
  //condition for yarn warp polyester
  var fiber_warp_cotton = document.getElementsByClassName("fiber_warp_cotton")[0].value;
  var fiber_warp_cotton_input_result = parseFloat(fiber_warp_cotton);
  var fiber_warp_cotton_cond1 = document.getElementById("fiber_warp_cotton_cond1").value;
  var fiber_warp_cotton_cond2 = document.getElementById("fiber_warp_cotton_cond2").value;
  var fiber_warp_cotton_value1 = document.getElementById("fiber_warp_cotton_value1").value;
  var fiber_warp_cotton_value2 = document.getElementById("fiber_warp_cotton_value2").value;
  var problem_condition1 = "";
  var problem_condition2 = "";
  var ok1 = "";
  var ok2 = "";

  if(fiber_warp_cotton_cond1 == '(')
  {
    if ( !(fiber_warp_cotton_value1 < fiber_warp_cotton_input_result) )
    {
      problem_condition1 = "problem";
    }
    else
    {
      ok1 = "ok";
    }
  }
  else if(fiber_warp_cotton_cond1 == '[')
  {
    if ( !(fiber_warp_cotton_value1 <= fiber_warp_cotton_input_result) )
    {
      problem_condition1 = "problem";
    }
    else
    {
      ok1 = "ok";
    }
  }
  else
  {
    if ( !(fiber_warp_cotton_value1 >= fiber_warp_cotton_input_result) )
    {
      problem_condition1 = "problem";
    }
    else
    {
      ok1 = "ok";
    }
  }

  if(fiber_warp_cotton_cond2 == ')')
  {
    if ( !(fiber_warp_cotton_value2 > fiber_warp_cotton_input_result) )
    {
      problem_condition2 = "problem";
    }
    else
    {
      ok2 = "ok";
    }
  }

  else if(fiber_warp_cotton_cond2 == ']')
  {
    if ( !(fiber_warp_cotton_value2 >= fiber_warp_cotton_input_result) )
    {
      problem_condition2 = "problem";
    }
    else
    {
      ok2 = "ok";
    }
  }

  else
  {
    if ( !(fiber_warp_cotton_value2 <= fiber_warp_cotton_input_result) )
    {
      problem_condition2 = "problem";
    }
    else
    {
      ok2 = "ok";
    }
  }

  if ((problem_condition1 == "problem") && (problem_condition2 == "problem")) 
  {
    document.getElementById("fiber_warp_cotton").style.color = "#ff0000";
  }

  else if ( (ok1 == "ok") && (ok2 == "ok") )
  {
    document.getElementById("fiber_warp_cotton").style.color = "green";
  }

  else
  {
    document.getElementById("fiber_warp_cotton").style.color = "#ff0000";
  }

}

function fiberWarpThiredCheck() 
{
  //condition for yarn warp polyester
  var fiber_warp_thired = document.getElementsByClassName("fiber_warp_thired")[0].value;
  var fiber_warp_thired_input_result = parseFloat(fiber_warp_thired);
  var fiber_warp_thired_cond1 = document.getElementById("fiber_warp_thired_cond1").value;
  var fiber_warp_thired_cond2 = document.getElementById("fiber_warp_thired_cond2").value;
  var fiber_warp_thired_value1 = document.getElementById("fiber_warp_thired_value1").value;
  var fiber_warp_thired_value2 = document.getElementById("fiber_warp_thired_value2").value;
  var problem_condition1 = "";
  var problem_condition2 = "";
  var ok1 = "";
  var ok2 = "";

  if(fiber_warp_thired_cond1 == '(')
  {
    if ( !(fiber_warp_thired_value1 < fiber_warp_thired_input_result) )
    {
      problem_condition1 = "problem";
    }
    else
    {
      ok1 = "ok";
    }
  }
  else if(fiber_warp_thired_cond1 == '[')
  {
    if ( !(fiber_warp_thired_value1 <= fiber_warp_thired_input_result) )
    {
      problem_condition1 = "problem";
    }
    else
    {
      ok1 = "ok";
    }
  }
  else
  {
    if ( !(fiber_warp_thired_value1 >= fiber_warp_thired_input_result) )
    {
      problem_condition1 = "problem";
    }
    else
    {
      ok1 = "ok";
    }
  }

  if(fiber_warp_thired_cond2 == ')')
  {
    if ( !(fiber_warp_thired_value2 > fiber_warp_thired_input_result) )
    {
      problem_condition2 = "problem";
    }
    else
    {
      ok2 = "ok";
    }
  }

  else if(fiber_warp_thired_cond2 == ']')
  {
    if ( !(fiber_warp_thired_value2 >= fiber_warp_thired_input_result) )
    {
      problem_condition2 = "problem";
    }
    else
    {
      ok2 = "ok";
    }
  }

  else
  {
    if ( !(fiber_warp_thired_value2 <= fiber_warp_thired_input_result) )
    {
      problem_condition2 = "problem";
    }
    else
    {
      ok2 = "ok";
    }
  }

  if ((problem_condition1 == "problem") && (problem_condition2 == "problem")) 
  {
    document.getElementById("fiber_warp_thired").style.color = "#ff0000";
  }

  else if ( (ok1 == "ok") && (ok2 == "ok") )
  {
    document.getElementById("fiber_warp_thired").style.color = "green";
  }

  else
  {
    document.getElementById("fiber_warp_thired").style.color = "#ff0000";
  }

}

function fiberWarpFourthCheck() 
{
  //condition for yarn warp polyester
  var fiber_warp_fourth = document.getElementsByClassName("fiber_warp_fourth")[0].value;
  var fiber_warp_fourth_input_result = parseFloat(fiber_warp_fourth);
  var fiber_warp_fourth_cond1 = document.getElementById("fiber_warp_fourth_cond1").value;
  var fiber_warp_fourth_cond2 = document.getElementById("fiber_warp_fourth_cond2").value;
  var fiber_warp_fourth_value1 = document.getElementById("fiber_warp_fourth_value1").value;
  var fiber_warp_fourth_value2 = document.getElementById("fiber_warp_fourth_value2").value;
  var problem_condition1 = "";
  var problem_condition2 = "";
  var ok1 = "";
  var ok2 = "";

  if(fiber_warp_fourth_cond1 == '(')
  {
    if ( !(fiber_warp_fourth_value1 < fiber_warp_fourth_input_result) )
    {
      problem_condition1 = "problem";
    }
    else
    {
      ok1 = "ok";
    }
  }
  else if(fiber_warp_fourth_cond1 == '[')
  {
    if ( !(fiber_warp_fourth_value1 <= fiber_warp_fourth_input_result) )
    {
      problem_condition1 = "problem";
    }
    else
    {
      ok1 = "ok";
    }
  }
  else
  {
    if ( !(fiber_warp_fourth_value1 >= fiber_warp_fourth_input_result) )
    {
      problem_condition1 = "problem";
    }
    else
    {
      ok1 = "ok";
    }
  }

  if(fiber_warp_fourth_cond2 == ')')
  {
    if ( !(fiber_warp_fourth_value2 > fiber_warp_fourth_input_result) )
    {
      problem_condition2 = "problem";
    }
    else
    {
      ok2 = "ok";
    }
  }

  else if(fiber_warp_fourth_cond2 == ']')
  {
    if ( !(fiber_warp_fourth_value2 >= fiber_warp_fourth_input_result) )
    {
      problem_condition2 = "problem";
    }
    else
    {
      ok2 = "ok";
    }
  }

  else
  {
    if ( !(fiber_warp_fourth_value2 <= fiber_warp_fourth_input_result) )
    {
      problem_condition2 = "problem";
    }
    else
    {
      ok2 = "ok";
    }
  }

  if ((problem_condition1 == "problem") && (problem_condition2 == "problem")) 
  {
    document.getElementById("fiber_warp_fourth").style.color = "#ff0000";
  }

  else if ( (ok1 == "ok") && (ok2 == "ok") )
  {
    document.getElementById("fiber_warp_fourth").style.color = "green";
  }

  else
  {
    document.getElementById("fiber_warp_fourth").style.color = "#ff0000";
  }

}

function fiberWeftPolyesterCheck() 
{
  //condition for yarn weft polyester
  var fiber_weft_polyester = document.getElementsByClassName("fiber_weft_polyester")[0].value;
  var fiber_weft_polyester_input_result = parseFloat(fiber_weft_polyester);
  var fiber_weft_polyester_cond1 = document.getElementById("fiber_weft_polyester_cond1").value;
  var fiber_weft_polyester_cond2 = document.getElementById("fiber_weft_polyester_cond2").value;
  var fiber_weft_polyester_value1 = document.getElementById("fiber_weft_polyester_value1").value;
  var fiber_weft_polyester_value2 = document.getElementById("fiber_weft_polyester_value2").value;
  var problem_condition1 = "";
  var problem_condition2 = "";
  var ok1 = "";
  var ok2 = "";

  if(fiber_weft_polyester_cond1 == '(')
  {
    if ( !(fiber_weft_polyester_value1 < fiber_weft_polyester_input_result) )
    {
      problem_condition1 = "problem";
    }
    else
    {
      ok1 = "ok";
    }
  }
  else if(fiber_weft_polyester_cond1 == '[')
  {
    if ( !(fiber_weft_polyester_value1 <= fiber_weft_polyester_input_result) )
    {
      problem_condition1 = "problem";
    }
    else
    {
      ok1 = "ok";
    }
  }
  else
  {
    if ( !(fiber_weft_polyester_value1 >= fiber_weft_polyester_input_result) )
    {
      problem_condition1 = "problem";
    }
    else
    {
      ok1 = "ok";
    }
  }

  if(fiber_weft_polyester_cond2 == ')')
  {
    if ( !(fiber_weft_polyester_value2 > fiber_weft_polyester_input_result) )
    {
      problem_condition2 = "problem";
    }
    else
    {
      ok2 = "ok";
    }
  }

  else if(fiber_weft_polyester_cond2 == ']')
  {
    if ( !(fiber_weft_polyester_value2 >= fiber_weft_polyester_input_result) )
    {
      problem_condition2 = "problem";
    }
    else
    {
      ok2 = "ok";
    }
  }

  else
  {
    if ( !(fiber_weft_polyester_value2 <= fiber_weft_polyester_input_result) )
    {
      problem_condition2 = "problem";
    }
    else
    {
      ok2 = "ok";
    }
  }

  if ((problem_condition1 == "problem") && (problem_condition2 == "problem")) 
  {
    document.getElementById("fiber_weft_polyester").style.color = "#ff0000";
  }

  else if ( (ok1 == "ok") && (ok2 == "ok") )
  {
    document.getElementById("fiber_weft_polyester").style.color = "green";
  }

  else
  {
    document.getElementById("fiber_weft_polyester").style.color = "#ff0000";
  }

}

function fiberWeftCottonCheck() 
{
  //condition for yarn weft cotton
  var fiber_weft_cotton = document.getElementsByClassName("fiber_weft_cotton")[0].value;
  var fiber_weft_cotton_input_result = parseFloat(fiber_weft_cotton);
  var fiber_weft_cotton_cond1 = document.getElementById("fiber_weft_cotton_cond1").value;
  var fiber_weft_cotton_cond2 = document.getElementById("fiber_weft_cotton_cond2").value;
  var fiber_weft_cotton_value1 = document.getElementById("fiber_weft_cotton_value1").value;
  var fiber_weft_cotton_value2 = document.getElementById("fiber_weft_cotton_value2").value;
  var problem_condition1 = "";
  var problem_condition2 = "";
  var ok1 = "";
  var ok2 = "";

  if(fiber_weft_cotton_cond1 == '(')
  {
    if ( !(fiber_weft_cotton_value1 < fiber_weft_cotton_input_result) )
    {
      problem_condition1 = "problem";
    }
    else
    {
      ok1 = "ok";
    }
  }
  else if(fiber_weft_cotton_cond1 == '[')
  {
    if ( !(fiber_weft_cotton_value1 <= fiber_weft_cotton_input_result) )
    {
      problem_condition1 = "problem";
    }
    else
    {
      ok1 = "ok";
    }
  }
  else
  {
    if ( !(fiber_weft_cotton_value1 >= fiber_weft_cotton_input_result) )
    {
      problem_condition1 = "problem";
    }
    else
    {
      ok1 = "ok";
    }
  }

  if(fiber_weft_cotton_cond2 == ')')
  {
    if ( !(fiber_weft_cotton_value2 > fiber_weft_cotton_input_result) )
    {
      problem_condition2 = "problem";
    }
    else
    {
      ok2 = "ok";
    }
  }

  else if(fiber_weft_cotton_cond2 == ']')
  {
    if ( !(fiber_weft_cotton_value2 >= fiber_weft_cotton_input_result) )
    {
      problem_condition2 = "problem";
    }
    else
    {
      ok2 = "ok";
    }
  }

  else
  {
    if ( !(fiber_weft_cotton_value2 <= fiber_weft_cotton_input_result) )
    {
      problem_condition2 = "problem";
    }
    else
    {
      ok2 = "ok";
    }
  }

  if ((problem_condition1 == "problem") && (problem_condition2 == "problem")) 
  {
    document.getElementById("fiber_weft_cotton").style.color = "#ff0000";
  }

  else if ( (ok1 == "ok") && (ok2 == "ok") )
  {
    document.getElementById("fiber_weft_cotton").style.color = "green";
  }

  else
  {
    document.getElementById("fiber_weft_cotton").style.color = "#ff0000";
  }

}

function fiberWeftThiredCheck() 
{
  //condition for yarn weft thired
  var fiber_weft_thired = document.getElementsByClassName("fiber_weft_thired")[0].value;
  var fiber_weft_thired_input_result = parseFloat(fiber_weft_thired);
  var fiber_weft_thired_cond1 = document.getElementById("fiber_weft_thired_cond1").value;
  var fiber_weft_thired_cond2 = document.getElementById("fiber_weft_thired_cond2").value;
  var fiber_weft_thired_value1 = document.getElementById("fiber_weft_thired_value1").value;
  var fiber_weft_thired_value2 = document.getElementById("fiber_weft_thired_value2").value;
  var problem_condition1 = "";
  var problem_condition2 = "";
  var ok1 = "";
  var ok2 = "";

  if(fiber_weft_thired_cond1 == '(')
  {
    if ( !(fiber_weft_thired_value1 < fiber_weft_thired_input_result) )
    {
      problem_condition1 = "problem";
    }
    else
    {
      ok1 = "ok";
    }
  }
  else if(fiber_weft_thired_cond1 == '[')
  {
    if ( !(fiber_weft_thired_value1 <= fiber_weft_thired_input_result) )
    {
      problem_condition1 = "problem";
    }
    else
    {
      ok1 = "ok";
    }
  }
  else
  {
    if ( !(fiber_weft_thired_value1 >= fiber_weft_thired_input_result) )
    {
      problem_condition1 = "problem";
    }
    else
    {
      ok1 = "ok";
    }
  }

  if(fiber_weft_thired_cond2 == ')')
  {
    if ( !(fiber_weft_thired_value2 > fiber_weft_thired_input_result) )
    {
      problem_condition2 = "problem";
    }
    else
    {
      ok2 = "ok";
    }
  }

  else if(fiber_weft_thired_cond2 == ']')
  {
    if ( !(fiber_weft_thired_value2 >= fiber_weft_thired_input_result) )
    {
      problem_condition2 = "problem";
    }
    else
    {
      ok2 = "ok";
    }
  }

  else
  {
    if ( !(fiber_weft_thired_value2 <= fiber_weft_thired_input_result) )
    {
      problem_condition2 = "problem";
    }
    else
    {
      ok2 = "ok";
    }
  }

  if ((problem_condition1 == "problem") && (problem_condition2 == "problem")) 
  {
    document.getElementById("fiber_weft_thired").style.color = "#ff0000";
  }

  else if ( (ok1 == "ok") && (ok2 == "ok") )
  {
    document.getElementById("fiber_weft_thired").style.color = "green";
  }

  else
  {
    document.getElementById("fiber_weft_thired").style.color = "#ff0000";
  }

}

function fiberWeftFourthCheck() 
{
  //condition for yarn weft fourth
  var fiber_weft_fourth = document.getElementsByClassName("fiber_weft_fourth")[0].value;
  var fiber_weft_fourth_input_result = parseFloat(fiber_weft_fourth);
  var fiber_weft_fourth_cond1 = document.getElementById("fiber_weft_fourth_cond1").value;
  var fiber_weft_fourth_cond2 = document.getElementById("fiber_weft_fourth_cond2").value;
  var fiber_weft_fourth_value1 = document.getElementById("fiber_weft_fourth_value1").value;
  var fiber_weft_fourth_value2 = document.getElementById("fiber_weft_fourth_value2").value;
  var problem_condition1 = "";
  var problem_condition2 = "";
  var ok1 = "";
  var ok2 = "";

  if(fiber_weft_fourth_cond1 == '(')
  {
    if ( !(fiber_weft_fourth_value1 < fiber_weft_fourth_input_result) )
    {
      problem_condition1 = "problem";
    }
    else
    {
      ok1 = "ok";
    }
  }
  else if(fiber_weft_fourth_cond1 == '[')
  {
    if ( !(fiber_weft_fourth_value1 <= fiber_weft_fourth_input_result) )
    {
      problem_condition1 = "problem";
    }
    else
    {
      ok1 = "ok";
    }
  }
  else
  {
    if ( !(fiber_weft_fourth_value1 >= fiber_weft_fourth_input_result) )
    {
      problem_condition1 = "problem";
    }
    else
    {
      ok1 = "ok";
    }
  }

  if(fiber_weft_fourth_cond2 == ')')
  {
    if ( !(fiber_weft_fourth_value2 > fiber_weft_fourth_input_result) )
    {
      problem_condition2 = "problem";
    }
    else
    {
      ok2 = "ok";
    }
  }

  else if(fiber_weft_fourth_cond2 == ']')
  {
    if ( !(fiber_weft_fourth_value2 >= fiber_weft_fourth_input_result) )
    {
      problem_condition2 = "problem";
    }
    else
    {
      ok2 = "ok";
    }
  }

  else
  {
    if ( !(fiber_weft_fourth_value2 <= fiber_weft_fourth_input_result) )
    {
      problem_condition2 = "problem";
    }
    else
    {
      ok2 = "ok";
    }
  }

  if ((problem_condition1 == "problem") && (problem_condition2 == "problem")) 
  {
    document.getElementById("fiber_weft_fourth").style.color = "#ff0000";
  }

  else if ( (ok1 == "ok") && (ok2 == "ok") )
  {
    document.getElementById("fiber_weft_fourth").style.color = "green";
  }

  else
  {
    document.getElementById("fiber_weft_fourth").style.color = "#ff0000";
  }

}








  function datetimePicker()
  {
      $('#datepicker_for_add').datetimepicker(
      {
        format: 'DD.MM.YYYY'
      });
  }

  function editdatetimePicker()
  {
      $('#edit_date_time_picker').datetimepicker(
      {
        format: 'DD.MM.YYYY'
      });
  }

  $(function ()
  {
      $('.select2').select2();
  });

  $(document).ready(function()
  {

      $('#myDatepicker2').datetimepicker(
      {
        format: 'DD.MM.YYYY'
      });

      $('#retrieve_data').click(function()
      {
          var pp_no_id = document.getElementById("pp_no_id").value;
          var pp_version = document.getElementById("pp_version").value;

          $.ajax(
          {
              type: "POST",
              //url: "define_greige_issunce_standards.php",
              url: "show_details_of_pp_version.php",
              data:
              {
                pp_no_id: pp_no_id,
                pp_version: pp_version
              },
              success:function(data)
              {
                  $('#retrieve_general_data').html(data);
                  $('#retrieve_details_data').html("");
              }
          });
      });

      $('.action').change(function()
      {
          if($(this).val() != '')
          {
              var action = $(this).attr("id");
              var query = $(this).val();
              var result = '';

              if(action == "pp_no_id")
              {
                  result = 'pp_version';
              }

              $.ajax(
              {
                  url:"sql.php",
                  method:"POST",
                  data:{action:action, query:query},
                  success:function(data)
                  {
                      $('#'+result).html(data);
                  }
              });
          }
      });
  });


  function greige_issunce_view()
  {
      var pp_no_id = document.getElementById("pp_no_id").value;
      var pp_details_id = document.getElementById("pp_details_id").value;

      $.ajax(
      {
          type: "POST",
          url: "greige_issunce_view.php",
          data:
          {
            pp_no_id: pp_no_id,
            pp_details_id: pp_details_id
          },
          success:function(data)
          {
              $('#retrieve_details_data').html(data);
          }
      });
  }


  function greige_issunce_add()
  {
      var pp_no_id = document.getElementById("pp_no_id").value;
      var pp_details_id = document.getElementById("pp_details_id").value;

      $.ajax(
      {
          type: "POST",
          url: "add_greige_issunce.php",
          data:
          {
            pp_no_id: pp_no_id,
            pp_details_id: pp_details_id
          },
          success:function(data)
          {
              $('#retrieve_details_data').html(data);
          }
      });
  }


  function greige_issunce_edit_form(serial)
  {
      var pp_no_id = document.getElementById("pp_no_id").value;
      var pp_details_id = document.getElementById("pp_details_id").value;
      var greige_issunce_id = document.getElementsByName("greige_issunce_id")[serial].value;

      $.ajax(
      {
          type: "POST",
          url: "edit_greige_issunce.php",
          method: "POST",
          data:
          {
            pp_no_id: pp_no_id,
            pp_details_id: pp_details_id,
            greige_issunce_id: greige_issunce_id
          },
          success:function(data)
          {
              $('#retrieve_details_data').html(data);
          }
      });
  }

  function view_standard_select(serial)
  {
      var pp_no_id = document.getElementById("pp_no_id_"+serial).value;
      var pp_version = document.getElementById("pp_version_"+serial).value;
      
      //var formdata = new FormData(document.getElementById("define-standard-form"));

      $.ajax(
      {
          url: "define_greige_issunce_standards.php",
          method: "POST",
          data: {pp_no_id: pp_no_id, pp_version: pp_version},
          success:function(data)
          {
              $('#retrieve_details_data').html(data);
          }
      });
  }

</script>

</body>
</html>
