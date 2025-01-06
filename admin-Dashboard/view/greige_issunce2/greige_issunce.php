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
                        <li>Define Greige Issunce</li>
                    </ol>
                  </div>
                </div>

                <!-- main content again -->
                <div class="clearfix"></div>
                <div class="row">
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                      <div class="x_title">
                        <h2>Define Greige Issunce against PP No. </h2>
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
                                  $pp_sql = "SELECT DISTINCT pp_no, pp_id FROM pp ORDER BY pp_no";
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
                              <button type="button" id="retrieve_data" class="btn btn-success">Submit</button>
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
              url: "define_greige_issunce_standards.php",
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

  // function update_edit_standard_data()
  // {
  //     var formValidation = Form_Validation();

  //     if(formValidation != false)
  //     {
  //       var formdata = new FormData(document.getElementById('gray_variable_form'));
  //       $.ajax(
  //       {
  //           type: "POST",
  //           url: "edit_gray_variable_saving.php",// where you wanna post
  //           data: formdata,
  //           processData: false,
  //           contentType: false,
  //           error: function(jqXHR, textStatus, errorMessage)
  //           {
  //               alert(errorMessage);
  //           },
  //           success: function(data)
  //           {
  //             //info_alert(data);
  //             // var pp_id_number = document.getElementById("pp_no_id").value;
  //             // success_alert("All Data Update Successfully", "../variable/gray_variable.php?pp_no_id="+pp_id_number);

  //             //var pp_id_number = document.getElementById("pp_no_id").value;
  //             //var pp_details_id = document.getElementById("pp_details_id").value;
  //             //success_alert("All Data Save Successfully", "../standard/gray_variable.php?pp_no_id="+pp_id_number+"&pp_version="+pp_details_id+"&pp_version_standard=1");
  //             if (data == "Yes")
  //             {
  //                 info_alert("Data not Submitted");
  //             }
  //             else
  //             {
  //                 success_alert("Data Update Successfully", "../standard/gray_variable.php");
  //             }
  //           }
  //       });
  //     }
  // }

</script>

</body>
</html>
