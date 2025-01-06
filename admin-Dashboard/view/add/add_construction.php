<?php
session_start();
require_once("../includes/db_session_chk.php");
?>

<!DOCTYPE html>
<html lang="en">

<?php
require_once('../includes/header.php');
?>


<!-- bootstrap-daterangepicker -->
<link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
<!-- bootstrap-datetimepicker -->
<link href="../vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css" rel="stylesheet">
<!-- bootstrap-daterangepicker -->
<script src="../vendors/moment/min/moment.min.js"></script>
<script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- bootstrap-datetimepicker -->    
<script src="../vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>

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
                        <li>Settings</li>
                        <li>Add Construction for Version</li>
                    </ol>
                  </div>
                </div>

                <!-- main content again -->
                <div class="row">
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                      <div class="x_title">
                        <h2>Add Construction Form</h2>
                        <ul class="nav navbar-right panel_toolbox">
                          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                          </li>
                        </ul>
                        <div class="clearfix"></div>
                      </div>
                      <div class="x_content">
                        <br />

                        <form id="add_customer_form" name="add_customer_form" data-parsley-validate class="form-horizontal form-label-left">

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="yarn_count_warp_value">Yarn count (Warp) <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="yarn_count_warp_value" name="yarn_count_warp_value" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="yarn_count_warp_ply">No. of Ply for Warp Yarn <span class="required">*</span>
                            </label>

                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <select id="yarn_count_warp_ply" name="yarn_count_warp_ply" class="yarn_count_warp_ply form-control col-md-12 col-xs-12">
                                <option value="1" selected="selected">1</option>
                                <option value="2" >2</option>
                                <option value="3" >3</option>
                                <option value="4" >4</option>
                              </select> 
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="yarn_count_warp_unit">UOM (Warp) <span class="required">*</span>
                            </label>

                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <select id="yarn_count_warp_unit" name="yarn_count_warp_unit" class="yarn_count_warp_unit form-control col-md-12 col-xs-12">
                                <option value="Ne" selected="selected">Ne</option>
                                <option value="Nm" >Nm</option>
                                <option value="tex" >Tex</option>
                                <option value="Den" >Den</option>
                                <option value="Dtex" >Dtex</option>
                              </select> 
                            </div>
                          </div>

                          <br>
                          <br>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="yarn_count_weft_value">Yarn count (Weft) <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="yarn_count_weft_value" name="yarn_count_weft_value" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="yarn_count_weft_ply">No. of Ply for Weft Yarn <span class="required">*</span>
                            </label>

                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <select id="yarn_count_weft_ply" name="yarn_count_weft_ply" class="yarn_count_weft_ply form-control col-md-12 col-xs-12">
                                <option value="1" selected="selected">1</option>
                                <option value="2" >2</option>
                                <option value="3" >3</option>
                                <option value="4" >4</option>
                              </select> 
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="yarn_count_weft_unit">UOM (Weft) <span class="required">*</span>
                            </label>

                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <select id="yarn_count_weft_unit" name="yarn_count_weft_unit" class="yarn_count_weft_unit form-control col-md-12 col-xs-12">
                                <option value="Ne" selected="selected">Ne</option>
                                <option value="Nm" >Nm</option>
                                <option value="tex" >Tex</option>
                                <option value="Den" >Den</option>
                                <option value="Dtex" >Dtex</option>
                              </select> 
                            </div>
                          </div>

                          <br>
                          <br>


                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="thread_count_warp_value">No. of Threads/ inch Warp <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="thread_count_warp_value" name="thread_count_warp_value" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="thread_count_warp_insertion">Warp Insertion <span class="required">*</span>
                            </label>

                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <select id="thread_count_warp_insertion" name="thread_count_warp_insertion" class="thread_count_warp_insertion form-control col-md-12 col-xs-12">
                                <option value="1" selected="selected">1</option>
                                <option value="2" >2</option>
                                <option value="3" >3</option>
                                <option value="4" >4</option>
                              </select> 
                            </div>
                          </div>

                          <br>
                          <br>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="thread_count_weft_value">No. of Threads/ inch Weft <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="thread_count_weft_value" name="thread_count_weft_value" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="thread_count_weft_insertion">Weft Insertion <span class="required">*</span>
                            </label>

                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <select id="thread_count_weft_insertion" name="thread_count_weft_insertion" class="thread_count_weft_insertion form-control col-md-12 col-xs-12">
                                <option value="1" selected="selected">1</option>
                                <option value="2" >2</option>
                                <option value="3" >3</option>
                                <option value="4" >4</option>
                              </select> 
                            </div>
                          </div>


                          <div class="ln_solid"></div>
                          <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                              <button type="button" name="submit" id="submit" class="btn btn-success">Save</button>
                              <button type="reset" name="reset" id="reset" class="btn btn-info">Reset</button>
                            </div>
                          </div>

                        </form>
                      </div>
                    </div>
                  </div>
                </div>


                 <div class="clearfix"></div>
                <div class="row">
                   <div class="col-md-12 col-sm-12 col-xs-12">
                      <div class="x_panel">
                        <div class="x_title">
                          <h2>Construction</h2>
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
                                <th>Construction Name</th>
                                <th>Action</th>
                              </tr>
                            </thead>
                            
                            <tbody>
                              <?php 
                                $s1 = 1;
                                $sql_for_construction = "SELECT * FROM construction_for_version";

                                $res_for_construction = mysqli_query($con, $sql_for_construction);

                                while ($row = mysqli_fetch_assoc($res_for_construction)) 
                                {
                              ?>
                              <tr>
                                <td><?php echo $s1; ?></td>
                                <td>
                                    <?php
                                      $yarn_count_warp_total = "";
                                      $yarn_count_weft_total = "";
                                      $thread_count_warp_insertion_total = "";
                                      $yarn_count_warp_total = "";

                                      $yarn_count_warp_ply = $row['no_of_ply_for_warp_yarn'];
                                      $yarn_count_weft_ply = $row['no_of_ply_for_weft_yarn'];
                                      $thread_count_warp_insertion = $row['warp_insertion'];
                                      $thread_count_weft_insertion = $row['weft_insertion'];

                                      if ($yarn_count_warp_ply == '1') 
                                      {
                                          $yarn_count_warp_total = $row['warp_yarn_count'].".";
                                      }

                                      else
                                      {
                                          $yarn_count_warp_total = $row['warp_yarn_count']."<sup>".$row['no_of_ply_for_warp_yarn']."</sup>.";
                                      }

                                      if ($yarn_count_weft_ply == '1') 
                                      {
                                          $yarn_count_weft_total = $row['weft_yarn_count']."/";
                                      }

                                      else
                                      {
                                          $yarn_count_weft_total = $row['weft_yarn_count']."<sup>".$row['no_of_ply_for_weft_yarn']."</sup>/";
                                      }



                                      if ($thread_count_warp_insertion == '1') 
                                      {
                                          $thread_count_warp_insertion_total = $row['no_of_threads_per_inch_in_warp'].".";
                                      }

                                      else
                                      {
                                          $thread_count_warp_insertion_total = $row['no_of_threads_per_inch_in_warp']."(".$row['warp_insertion'].").";
                                      }

                                      if ($thread_count_weft_insertion == '1') 
                                      {
                                          $thread_count_weft_insertion_total = $row['no_of_threads_per_inch_in_weft'];
                                      }

                                      else
                                      {
                                          $thread_count_weft_insertion_total = $row['no_of_threads_per_inch_in_weft']."(".$row['weft_insertion'].")";
                                      }

                                      echo $display = $yarn_count_warp_total. $yarn_count_weft_total. $thread_count_warp_insertion_total . $thread_count_weft_insertion_total;

                                      // if ($row['yarn_count_warp_ply'] == '1'  && $row['yarn_count_weft_ply'] == '1' && $row['thread_count_warp_insertion'] == '1' && $row['thread_count_weft_insertion'] == '1' ) 
                                      // {
                                      //     echo $display= $row['yarn_count_warp_value'].".".$row['yarn_count_weft_value']."/".$row['thread_count_warp_value'].".".$row['thread_count_weft_value'];
                                      // }

                                      // elseif ($row['yarn_count_warp_ply'] != '1'  && $row['yarn_count_weft_ply'] == '1' && $row['thread_count_warp_insertion'] == '1' && $row['thread_count_weft_insertion'] == '1')
                                      // {
                                      //     echo $display= $row['yarn_count_warp_value']."<sup>".$row['yarn_count_warp_ply']."</sup>.".$row['yarn_count_weft_value']."/".$row['thread_count_warp_value'].".".$row['thread_count_weft_value'];
                                      // }

                                      // elseif($row['yarn_count_warp_ply'] != '1'  && $row['yarn_count_weft_ply'] != '1' && $row['thread_count_warp_insertion'] == '1' && $row['thread_count_weft_insertion'] == '1')
                                      // {

                                      // }

                                      // else
                                      // {
                                      //     echo $display= $row['yarn_count_warp_value']."<sup>".$row['yarn_count_warp_ply']."</sup>.".$row['yarn_count_weft_value']."<sup>".$row['yarn_count_weft_ply']."</sup> /".$row['thread_count_warp_value']."(".$row['thread_count_warp_insertion'].").".$row['thread_count_weft_value']."(".$row['thread_count_weft_insertion'].")";
                                      // }
                                     
                                    ?>
                                <td>
                                  <form action="edit_construction.php" method="post" style="display: inline;">
                                    <input type="hidden" id="construction_id" name="construction_id" value="<?php echo $row['construction_id']; ?>">
                                    <button type="submit" id="gray_issue_add_btn" name="gray_issue_add_btn" class="btn btn-primary btn-xs"> Edit </button>
                                  </form>
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
    <script type="text/javascript">
     $(document).ready(function(){ 

      $('#submit').click(function()
      {
          if(document.getElementById("yarn_count_warp_value").value == "")
          {
              missing_alert("yarn_count_warp_value");
              return false;
          }

          else if(document.getElementById("yarn_count_weft_value").value == "")
          {
              missing_alert("yarn_count_weft_value");
              return false;
          }

          else if(document.getElementById("yarn_count_warp_ply").value == "")
          {
              missing_alert("yarn_count_warp_ply");
              return false;
          }

          else if(document.getElementById("yarn_count_weft_ply").value == "")
          {
              missing_alert("yarn_count_weft_ply");
              return false;
          }

          else if(document.getElementById("yarn_count_warp_unit").value == "")
          {
              missing_alert("yarn_count_warp_unit");
              return false;
          }

          else if(document.getElementById("yarn_count_weft_unit").value == "")
          {
              missing_alert("yarn_count_weft_unit");
              return false;
          }


          else if(document.getElementById("thread_count_warp_value").value == "")
          {
              missing_alert("thread_count_warp_value");
              return false;
          }

          else if(document.getElementById("thread_count_weft_value").value == "")
          {
              missing_alert("thread_count_weft_value");
              return false;
          }


          else if(document.getElementById("thread_count_warp_insertion").value == "")
          {
              missing_alert("thread_count_warp_insertion");
              return false;
          }

          else if(document.getElementById("thread_count_weft_insertion").value == "")
          {
              missing_alert("thread_count_weft_insertion");
              return false;
          }

          else
          {
              var formdata = new FormData(document.getElementById('add_customer_form'));
              $.ajax({
              type: "POST",
              url: "add_construction_saving.php",// where you wanna post
              data: formdata,
              processData: false,
              contentType: false,
              error: function(jqXHR, textStatus, errorMessage) 
              {
                  alert(errorMessage);
              },
              success: function(data) 
              {
                if (data == "Missing Value") 
                {
                    info_alert(data);
                }

                else if(data == "construction Name Already Exists")
                {
                    info_alert(data);
                }

                else if(data == "Data Not Inserted")
                {
                    info_alert(data);
                }

                else
                {
                   //alert(data);
                    info_alert(data);
                    window.location = "construction_list.php";
                }
              } 
            });
          }


      });
  });
  </script>
</body>
</html>