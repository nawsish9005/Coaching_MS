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
                        <li>Process Program</li>
                        <li>Define Process Wise QC Standard</li>
                    </ol>
                  </div>
                </div>

                <!-- main content again -->
                <div class="clearfix"></div>
                <div class="row">
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                      <div class="x_title">
                        <h2>Define Process Wise QC Standard</h2>
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
                              <select id="pp_no_id" name="pp_no_id" class="action select2 pp_number action_desc form-control col-md-12 col-xs-12" onchange="add_desc()" onclick="">
                                <option value="" selected="selected">Select PP Number</option>
                                <?php
                                  $pp_sql = "SELECT pp_no, pp_id FROM pp ORDER BY pp_id DESC";
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
                        
                            <div class="col-md-6 col-sm-4 col-xs-12" id="pp_desc" style="display:none">
                               
                            </div>
                          </div>

                          <!-- <div class="form-group">
                            <?php
                                  $pp_sql = "SELECT * FROM pp";
                                  $pp_res = mysqli_query($con, $pp_sql) or die(mysqli_error($con));
                                  while ($pp_row = mysqli_fetch_assoc($pp_res)) 
                                  {
                            ?>
                               <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                              <label readonly id="pp_desc" name="pp_desc" style="display:none" value="<?php echo $pp_row['pp_desc'];?>" class="version_gray_width form-control col-md-12 col-xs-12" ><?php echo $pp_row['pp_desc'];?></label>
                              <?php 
                            }
                            ?>
                                
                            </div>
                          </div>
 -->
                          <div class="form-group">
                            <label class="control-label col-md-2 col-sm-3 col-xs-12" for="pp_descl" id="pp_descl" style="display:none">PP Description</span>
                            </label>
                            <div class="col-md-4 col-sm-6 col-xs-12">
                              
                            </div>
                          </div>


                          <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                            <label class="control-label col-md-2 col-sm-3 col-xs-12" for="customer">PP Version <span class="required">*</span>
                            </label>
                            <div class="col-md-4 col-sm-6 col-xs-12">
                              <select id="pp_version" name="pp_version" class="select2 action_new pp_version form-control col-md-12 col-xs-12">
                                <option value="" selected="selected">Select PP Version</option>
                              </select> 
                            </div>
                          </div>
                          <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                            <label class="control-label col-md-2 col-sm-3 col-xs-12" for="customer">Standard For<span class="required">*</span>
                            </label>
                            <div class="col-md-4 col-sm-6 col-xs-12">
                              <select id="pp_version_standard" name="pp_version_standard" class="pp_version_standard select2 pp_number form-control col-md-12 col-xs-12">
                                <option value="" selected="selected">Select Standard</option>
                                <!-- <option value="1" >Greige Issuance Standard</option>
                                <option value="2" >Singe & Desize Process Standard</option>
                                <option value="3" >Bleaching Standard</option>
                                <option value="4" >Ready For Mercerize</option>
                                <option value="5" >Mercerize</option>
                                <option value="6" >Equalize</option>
                                <option value="7" >Printing</option>
                                <option value="8" >Curing</option>
                                <option value="9" >Finishing</option>
                                <option value="10" >Scouring & Bleaching</option>
                                <option value="11" >Scouring </option>
                                <option value="12" >Washing </option>
                                <option value="13" >Calendering </option>
                                <option value="14" >Sanforizing </option>
                                <option value="15" >Raising </option>
                                <option value="16" >Ready for Raising </option>
                                <option value="17" >Ready for Print </option>
                                <option value="18" >Ready for Dying </option> -->
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

                <!-- others content again -->
                <div class="row">
                  <div class="col-md-12 col-sm-12 col-xs-12" id="others_retrieve_general_data">
                  </div>
                </div>
                <!-- others content again finished -->
              </div>
            </div>
            <!-- /page content -->



          <!-- modals -->
            <!-- Large modal -->
            <form id="add_requirement_form" name="add_requirement_form" data-parsley-validate class="form-horizontal form-label-left">
              <div class="modal fade bs-example-modal-lg" role="dialog" aria-hidden="true">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">

                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel"> Define Greige Standard from existing one </h4>
                  </div>
                  <div class="modal-body">
                      <form id="define-standard-form" action="" method="" data-parsley-validate class="form-horizontal form-label-left">
                          <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                            <label class="control-label col-md-2 col-sm-3 col-xs-12" for="customers">Customer <span class="required">*</span>
                            </label>
                            <input type="hidden" id="copy_for_this_pp_id" name="copy_for_this_pp_id" value="">
                            <div class="col-md-10 col-sm-9 col-xs-12">
                              <select id="customers_model" name="customers_model" class="model_action select2 pp_number form-control col-md-12 col-xs-12" onchange="">
                                <option value="" selected="selected">Select Customer</option>
                                <?php
                                  $customers_sql = "SELECT *  FROM customers";
                                  $customers_res = mysqli_query($con, $customers_sql) or die(mysqli_error($con));
                                  while ($customers_row = mysqli_fetch_assoc($customers_res)) 
                                  {
                                      echo "<option value='".$customers_row['customers_id']."'>";
                                      echo $customers_row['customers_name'];
                                      echo "</option>";
                                  }
                                ?>
                              </select> 
                            </div>
                          </div>

                          <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                            <label class="control-label col-md-2 col-sm-3 col-xs-12">Design <span class="required">*</span>
                            </label>
                            <div class="col-md-4 col-sm-6 col-xs-12">
                              <select id="design_id" name="design_id" class="model_action design_id select2 form-control col-md-12 col-xs-12">
                                <option value="" selected="selected">Select Design</option>
                              </select>
                            </div>
                          </div>

                          <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                            <label class="control-label col-md-2 col-sm-3 col-xs-12">Version <span class="required">*</span>
                            </label>
                            <div class="col-md-4 col-sm-6 col-xs-12">
                              <select id="version_id" name="version_id" class="model_action select2 version_id form-control col-md-12 col-xs-12">
                                <option value="" selected="selected">Select Version</option>
                              </select>
                            </div>
                          </div>
                          <!-- <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                            <label class="control-label col-md-2 col-sm-3 col-xs-12" for="customer">Standard <span class="required">*</span>
                            </label>
                            <div class="col-md-4 col-sm-6 col-xs-12">
                              <select id="pp_version_standard_model" name="pp_version_standard_model" class="pp_version_standard select2 pp_number form-control col-md-12 col-xs-12">
                                  
                                <option value="1"  >Greige Issuance Standard</option>
                                <option value="2" >Singe & Desize Standard</option>
                              </select> 
                            </div>
                          </div> -->
                          <!-- <div class="ln_solid"></div> -->
                          <div class="form-group" style="padding-left: 7px;">
                            <div class="col-md-12 col-sm-12 col-xs-12 col-md-offset-2">
                              <button type="button" id="model_retrieve_data" class="btn btn-success">Search</button>
                            </div>
                          </div>
                      </form>

                      <!-- main content again -->
                      <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12" id="model_retrieve_general_data">
                        </div>
                      </div>
                      <!-- main content again finished -->
                  </div>
                  <!-- <div class="modal-footer">
                      
                  </div> -->
                </div>
              </div>
            </div>
            </form>
            <!-- model edit click -->





            <!-- model for multiple copy -->
            <!-- modals multiple copy -->
            <!-- Large modal for multiple copy -->
            <form id="add_requirement_form_multiple_copy" name="add_requirement_form_multiple_copy" data-parsley-validate class="form-horizontal form-label-left">
              <div class="modal fade bs-example-modal-lg-for-multiple-copy" role="dialog" aria-hidden="true">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">

                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel"> Copy Multiple from existing one </h4>
                  </div>
                  <div class="modal-body">
                      <form id="define-standard-form" action="" method="" data-parsley-validate class="form-horizontal form-label-left">
                          <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                            <label class="control-label col-md-2 col-sm-3 col-xs-12" for="customers">Customer <span class="required">*</span>
                            </label>
                            <input type="hidden" id="copy_for_this_pp_id_for_multiple_selection" name="copy_for_this_pp_id_for_multiple_selection" value="">

                            <input type="hidden" id="selection_of_multiple_pp_version_for_copy" name="selection_of_multiple_pp_version_for_copy" value="">

                            <div class="col-md-10 col-sm-9 col-xs-12">
                              <select id="customers_model_for_multiple_selection" name="customers_model_for_multiple_selection" class="model_action_for_multiple_selection select2 pp_number form-control col-md-12 col-xs-12" onchange="">
                                <option value="" selected="selected">Select Customer</option>
                                <?php
                                  $customers_sql = "SELECT *  FROM customers";
                                  $customers_res = mysqli_query($con, $customers_sql) or die(mysqli_error($con));
                                  while ($customers_row = mysqli_fetch_assoc($customers_res)) 
                                  {
                                      echo "<option value='".$customers_row['customers_id']."'>";
                                      echo $customers_row['customers_name'];
                                      echo "</option>";
                                  }
                                ?>
                              </select> 
                            </div>
                          </div>

                          <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                            <label class="control-label col-md-2 col-sm-3 col-xs-12">Design <span class="required">*</span>
                            </label>
                            <div class="col-md-4 col-sm-6 col-xs-12">
                              <select id="design_id_for_multiple_selection" name="design_id_for_multiple_selection" class="model_action_for_multiple_selection design_id select2 form-control col-md-12 col-xs-12">
                                <option value="" selected="selected">Select Design</option>
                              </select>
                            </div>
                          </div>

                          <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                            <label class="control-label col-md-2 col-sm-3 col-xs-12">Version <span class="required">*</span>
                            </label>
                            <div class="col-md-4 col-sm-6 col-xs-12">
                              <select id="version_id_for_multiple_selection" name="version_id_for_multiple_selection" class="model_action_for_multiple_selection select2 version_id form-control col-md-12 col-xs-12">
                                <option value="" selected="selected">Select Version</option>
                              </select>
                            </div>
                          </div>
                          <!-- <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                            <label class="control-label col-md-2 col-sm-3 col-xs-12" for="customer">Standard <span class="required">*</span>
                            </label>
                            <div class="col-md-4 col-sm-6 col-xs-12">
                              <select id="pp_version_standard_model" name="pp_version_standard_model" class="pp_version_standard select2 pp_number form-control col-md-12 col-xs-12">
                                  
                                <option value="1"  >Greige Issuance Standard</option>
                                <option value="2" >Singe & Desize Standard</option>
                              </select> 
                            </div>
                          </div> -->
                          <!-- <div class="ln_solid"></div> -->
                          <div class="form-group" style="padding-left: 7px;">
                            <div class="col-md-12 col-sm-12 col-xs-12 col-md-offset-2">
                              <button type="button" id="model_retrieve_data_for_multiple_selection" class="btn btn-success">Search</button>
                            </div>
                          </div>
                      </form>

                      <!-- main content again -->
                      <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12" id="model_retrieve_general_data_for_multiple_selection">
                        </div>
                      </div>
                      <!-- main content again finished -->
                  </div>
                  <!-- <div class="modal-footer">
                      
                  </div> -->
                </div>
              </div>
            </div>
            </form>
            <!-- end of model multiple copy -->

            <?php
            require_once('../includes/footer_body.php');
            ?>

        </div>
    </div>

    <?php
    require_once('../includes/footer.php');
    ?>

<script type="text/javascript" src="../standard/validation_for_standard_of_greige.js"></script>
<script type="text/javascript" src="../standard/validation_for_standard_of_singe.js"></script>
<script type="text/javascript" src="../standard/validation_for_standard_of_bleaching.js"></script>
<script type="text/javascript" src="../standard/validation_for_standard_of_ready_mercerize.js"></script>
<script type="text/javascript" src="../standard/validation_for_standard_of_mercerize.js"></script>
<script type="text/javascript" src="../standard/validation_for_standard_of_equalize.js"></script>
<script type="text/javascript" src="../standard/validation_for_standard_of_printing.js"></script>
<script type="text/javascript" src="../standard/validation_for_standard_of_curing.js"></script>
<script type="text/javascript" src="../standard/validation_for_standard_of_finishing.js"></script>
<script type="text/javascript" src="../standard/validation_for_standard_of_scouring_bleaching.js"></script>
<script type="text/javascript" src="../standard/validation_for_standard_of_scouring.js"></script>
<script type="text/javascript" src="../standard/validation_for_standard_of_washing.js"></script>
<script type="text/javascript" src="../standard/validation_for_standard_of_calendering.js"></script>
<script type="text/javascript" src="../standard/validation_for_standard_of_sanforizing.js"></script>
<script type="text/javascript" src="../standard/validation_for_standard_of_raising.js"></script>
<script type="text/javascript" src="../standard/validation_for_standard_of_ready_raising.js"></script>
<script type="text/javascript" src="../standard/validation_for_standard_of_ready_for_print.js"></script>
<script type="text/javascript" src="../standard/validation_for_standard_of_ready_for_dying.js"></script>

<script type="text/javascript">

  function add_desc()
  {
     var pp_desc= document.getElementById("pp_desc");
     pp_desc.style.display='block';
  }

  function show_output()
  {
      var pp_no_id = document.getElementById("pp_no_id").value;
      var pp_version = document.getElementById("pp_version").value;
      var pp_version_standard = document.getElementById("pp_version_standard").value;
      
      var formdata = new FormData(document.getElementById("define-standard-form"));

      $.ajax(
      {
          url: "view_standard_of_greige.php",
          method: "POST",
          data: formdata,
          success:function(data)
          {
              //alert(data);
              $('#'+result).html(data);
          }
      });
  }

  function view_standard_select(serial)
  {
      var pp_no_id = document.getElementById("pp_no_id_"+serial).value;
      var pp_version = document.getElementById("pp_version_"+serial).value;
      var pp_version_standard = document.getElementById("pp_version_standard_"+serial).value;
      
      //var formdata = new FormData(document.getElementById("define-standard-form"));

      $.ajax(
      {
          url: "view_standard_select.php",
          method: "POST",
          data: {pp_no_id: pp_no_id, pp_version: pp_version, pp_version_standard: pp_version_standard},
          success:function(data)
          {
              //alert(data);
              $('#others_retrieve_general_data').html(data);
          }
      });
  }

  function click_for_lock(select_pp_version, select_pp_no_id, select_pp_version_standard)
  {
     
      $.ajax(
      {
          type: "POST",
          url: "apply_for_lock.php",
          method: "POST",
          data: 
          {
            select_pp_version: select_pp_version, 
            select_pp_no_id: select_pp_no_id,
            select_pp_version_standard: select_pp_version_standard
          },
          success:function(data)
          {
              $.ajax(
              {
                  type: "POST",
                  url: "define_view_standards.php",
                  method: "POST",
                  data: 
                  {
                    pp_no_id: select_pp_no_id, 
                    pp_version: select_pp_version,
                    pp_version_standard: select_pp_version_standard
                  },
                  success:function(data)
                  {
                      $('#retrieve_general_data').html(data);
                      $('select#pp_version_standard_model').val(pp_version_standard);
                      $('#others_retrieve_general_data').html("");
                  }
              });
          }
      });
  }

  function multiple_copy_for_all_pp(version_id)
  {

      var total_length = document.getElementsByName('copy_test_box_select').length;
      var checkResult = Array();
      var i;
      for (i=0; i< total_length; i++) 
      {
          if (document.getElementsByName('copy_test_box_select')[i].checked) 
          {
              checkResult[i] = document.getElementsByName('copy_test_box_select')[i].value;
          }
      }

      var pp_id = version_id;
      $("#copy_for_this_pp_id_for_multiple_selection").val(pp_id);
      $("#selection_of_multiple_pp_version_for_copy").val(checkResult);
      
  }

  function click_for_unlock(select_pp_version, select_pp_no_id, select_pp_version_standard)
  {
      $.ajax(
      {
          type: "POST",
          url: "apply_for_unlock.php",
          method: "POST",
          data: 
          {
            select_pp_version: select_pp_version, 
            select_pp_no_id: select_pp_no_id,
            select_pp_version_standard: select_pp_version_standard
          },
          success:function(data)
          {
              $.ajax(
              {
                  type: "POST",
                  url: "define_view_standards.php",
                  method: "POST",
                  data: 
                  {
                    pp_no_id: select_pp_no_id, 
                    pp_version: select_pp_version,
                    pp_version_standard: select_pp_version_standard
                  },
                  success:function(data)
                  {
                      $('#retrieve_general_data').html(data);
                      $('select#pp_version_standard_model').val(pp_version_standard);
                      $('#others_retrieve_general_data').html("");
                  }
              });
          }
      });
  }

  // function initializeSelect2(selectElementObj) 
  // {
  //   selectElementObj.select2(
  //   {
  //     width: "100%",
  //     tags: true
  //   });
  // }

  $(function () 
  {
      //Initialize Select2 Elements
      $('.select2').select2();
  });

  // $(".select2").each(function() 
  // {
  //   initializeSelect2($(this));
  // });

  function pass_version_id(x)
  {
      var pp_id = x;
      $("#copy_for_this_pp_id").val(pp_id);
  }

  $(document).ready(function()
  {
      $('#retrieve_data').click(function()
      {
          var pp_no_id = document.getElementById("pp_no_id").value;
          var pp_version = document.getElementById("pp_version").value;
          var pp_version_standard = document.getElementById("pp_version_standard").value;
          //var formdata = new FormData(document.getElementById("define-standard-form"));

          $.ajax(
          {
              type: "POST",
              url: "view_standard_select.php",
              method: "POST",
              data: 
              {
                pp_no_id: pp_no_id, 
                pp_version: pp_version,
                pp_version_standard: pp_version_standard
              },
              success:function(data)
              {
                  $('#retrieve_general_data').html(data);
                  //$('select#pp_version_standard_model').val(pp_version_standard);
                  $('#others_retrieve_general_data').html("");
              }
          });
      });

      $('.action').change(function()
      {
          if($(this).val() != '')
          {
              var action = $(this).attr("id");
              var query = $(this).val();
              //var pp_no_id = $(this).val("pp_no_id");
              var result = '';

              if(action == "pp_no_id")
              {
                  result = 'pp_version';
              }
              // else if (action == "pp_version")
              // {
              //     result = 'pp_version_standard';
              // }
              // else
              // {
              //  result = 'gray_width';
              // }
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


      $('.action_new').change(function()
      {
          if($(this).val() != '')
          {
              var action = $(this).attr("id");
              var query = $(this).val();
              var pp_no_id = document.getElementById("pp_no_id").value;
              var result = '';

              if (action == "pp_version")
              {
                  result = 'pp_version_standard';
              }
              // else
              // {
              //  result = 'gray_width';
              // }
              $.ajax(
              {
                  url:"sql_new.php",
                  method:"POST",
                  data:{action:action, query:query, pp_no_id: pp_no_id},
                  success:function(data)
                  {
                      $('#'+result).html(data);
                  }
              });
          }
      });


      $('.action_desc').change(function()
      {
          if($(this).val() != '')
          {
              var action = $(this).attr("id");
              var query = $(this).val();
              var result = '';
              
              if(action == "pp_no_id")
              {
                  result = 'pp_desc';
              }

              $.ajax(
              {
                  url:"sql_desc.php",
                  method:"POST",
                  data:{action:action, query:query},
                  success:function(data)
                  {
                      $('#'+result).html(data);
                  }
              });
          }
      });

      // for model dada
      $('#model_retrieve_data').click(function()
      {
          //var customers = document.getElementById("customers_model").value;
          //var pp_version = document.getElementById("pp_version_model").value;
          var pp_version_standard = document.getElementById("pp_version_standard").value;
          //var pp_version_standard = document.getElementById("pp_version_standard_model").value;
          var copy_for_this_pp_id = document.getElementById("copy_for_this_pp_id").value;
          //var formdata = new FormData(document.getElementById("define-standard-form"));
          //alert(formdata);

          var customers_model = document.getElementById("customers_model").value;
          var design_id = document.getElementById("design_id").value;
          var version_id = document.getElementById("version_id").value;

          $.ajax(
          {
              type: "POST",
              url: "define_view_standards_for_model.php",
              method: "POST",
              data: 
              {
                customers_model: customers_model, 
                design_id: design_id,
                version_id: version_id,
                pp_version_standard: pp_version_standard,
                copy_for_this_pp_id: copy_for_this_pp_id
              },
              success:function(data)
              {
                  $('#model_retrieve_general_data').html(data);
              }
          });
      });

      $('.model_action').change(function()
      {
          if($(this).val() != '')
          {
              var action = $(this).attr("id");
              var query = $(this).val();
              var result = '';

              if(action == "customers_model")
              {
                  result = 'design_id';
              }
              else if (action == "design_id")
              {
               result = 'version_id';
              }
              else
              {

              }
              $.ajax(
              {
                  url:"sql_model.php",
                  method:"POST",
                  data:{action:action, query:query},
                  success:function(data)
                  {
                      $('#'+result).html(data);
                  }
              });
          }
      });


      // model dada for multiple selection
      $('#model_retrieve_data_for_multiple_selection').click(function()
      {

          var pp_version_standard = document.getElementById("pp_version_standard").value;
          var copy_for_this_pp_id = document.getElementById("copy_for_this_pp_id_for_multiple_selection").value;
          var selection_of_multiple_pp_version_for_copy = document.getElementById("selection_of_multiple_pp_version_for_copy").value;
          var customers_model = document.getElementById("customers_model_for_multiple_selection").value;
          var design_id = document.getElementById("design_id_for_multiple_selection").value;
          var version_id = document.getElementById("version_id_for_multiple_selection").value;

          $.ajax(
          {
              type: "POST",
              url: "define_view_standards_model_for_multiple_selection.php",
              method: "POST",
              data: 
              {
                customers_model: customers_model, 
                design_id: design_id,
                version_id: version_id,
                pp_version_standard: pp_version_standard,
                copy_for_this_pp_id: copy_for_this_pp_id,
                selection_of_multiple_pp_version_for_copy: selection_of_multiple_pp_version_for_copy
              },
              success:function(data)
              {
                  $('#model_retrieve_general_data_for_multiple_selection').html(data);
              }
          });
      });

      $('.model_action_for_multiple_selection').change(function()
      {
          if($(this).val() != '')
          {
              var action = $(this).attr("id");
              var query = $(this).val();
              var result = '';

              if(action == "customers_model_for_multiple_selection")
              {
                  result = 'design_id_for_multiple_selection';
              }
              else if (action == "design_id_for_multiple_selection")
              {
               result = 'version_id_for_multiple_selection';
              }
              else
              {

              }
              $.ajax(
              {
                  url:"sql_model_for_multiple_selection.php",
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

  function copy_greige_issunce_for_multiple_copy(standard_id)
  {
      $('.bs-example-modal-lg-for-multiple-copy').modal('hide');
      var pp_no_id = document.getElementById("pp_no_id").value;
      var pp_version = document.getElementById("pp_version_for_this").value;
      var pp_version_standard = document.getElementById("pp_version_standard").value;
      var selection_of_multiple_pp_version_for_copy = document.getElementById("selection_of_multiple_pp_version_for_copy").value;
      if (pp_version_standard == 1) 
      {
          $.ajax(
          {
              type: "POST",
              url: "greige_issunce_copy.php",
              method: "POST",
              dataType:"JSON",
              data: 
              {
                greige_standard_id: standard_id
              },
              success:function(data)
              {
                  $('#others_retrieve_general_data').html("");

                  var yarn_warp_value2 = data.yarn_warp_value2;
                  var yarn_warp_value1 = data.yarn_warp_value1;
                  var yarn_warp_cond1 = data.yarn_warp_cond1;
                  var yarn_warp_cond2 = data.yarn_warp_cond2;

                  var yarn_weft_value2 = data.yarn_weft_value2;
                  var yarn_weft_value1 = data.yarn_weft_value1;
                  var yarn_weft_cond1 = data.yarn_weft_cond1;
                  var yarn_weft_cond2 = data.yarn_weft_cond2;

                  var thread_epi_cond1 = data.thread_epi_cond1;
                  var thread_epi_value1 = data.thread_epi_value1;
                  var thread_epi_value2 = data.thread_epi_value2;
                  var thread_epi_cond2 = data.thread_epi_cond2;

                  var thread_ppi_cond1 = data.thread_ppi_cond1;
                  var thread_ppi_value1 = data.thread_ppi_value1;
                  var thread_ppi_value2 = data.thread_ppi_value2;
                  var thread_ppi_cond2 = data.thread_ppi_cond2;

                  var gsm_warp_value2 = data.gsm_warp_value2;
                  var gsm_warp_value1 = data.gsm_warp_value1;
                  var gsm_warp_cond1 = data.gsm_warp_cond1;
                  var gsm_warp_cond2 = data.gsm_warp_cond2;

                  var fiber_content_select = data.fiber_content_select;

                  var fiber_total_name_polyester = data.fiber_total_name_polyester;
                  var fiber_total_polyester_value2 = data.fiber_total_polyester_value2;
                  var fiber_total_polyester_value1 = data.fiber_total_polyester_value1;
                  var fiber_total_polyester_cond1 = data.fiber_total_polyester_cond1;
                  var fiber_total_polyester_cond2 = data.fiber_total_polyester_cond2;

                  var fiber_total_name_cotton = data.fiber_total_name_cotton;
                  var fiber_total_cotton_value2 = data.fiber_total_cotton_value2;
                  var fiber_total_cotton_value1 = data.fiber_total_cotton_value1;
                  var fiber_total_cotton_cond1 = data.fiber_total_cotton_cond1;
                  var fiber_total_cotton_cond2 = data.fiber_total_cotton_cond2;

                  var fiber_total_name_thired = data.fiber_total_name_thired;
                  var fiber_total_thired_value2 = data.fiber_total_thired_value2;
                  var fiber_total_thired_value1 = data.fiber_total_thired_value1;
                  var fiber_total_thired_cond1 = data.fiber_total_thired_cond1;
                  var fiber_total_thired_cond2 = data.fiber_total_thired_cond2;

                  var fiber_total_name_fourth = data.fiber_total_name_fourth;
                  var fiber_total_fourth_value2 = data.fiber_total_fourth_value2;
                  var fiber_total_fourth_value1 = data.fiber_total_fourth_value1;
                  var fiber_total_fourth_cond1 = data.fiber_total_fourth_cond1;
                  var fiber_total_fourth_cond2 = data.fiber_total_fourth_cond2;

                  var fiber_warp_name_polyester = data.fiber_warp_name_polyester;
                  var fiber_warp_polyester_value2 = data.fiber_warp_polyester_value2;
                  var fiber_warp_polyester_value1 = data.fiber_warp_polyester_value1;
                  var fiber_warp_polyester_cond1 = data.fiber_warp_polyester_cond1;
                  var fiber_warp_polyester_cond2 = data.fiber_warp_polyester_cond2;

                  var fiber_warp_name_cotton = data.fiber_warp_name_cotton;
                  var fiber_warp_cotton_value2 = data.fiber_warp_cotton_value2;
                  var fiber_warp_cotton_value1 = data.fiber_warp_cotton_value1;
                  var fiber_warp_cotton_cond1 = data.fiber_warp_cotton_cond1;
                  var fiber_warp_cotton_cond2 = data.fiber_warp_cotton_cond2;

                  var fiber_warp_name_thired = data.fiber_warp_name_thired;
                  var fiber_warp_thired_value2 = data.fiber_warp_thired_value2;
                  var fiber_warp_thired_value1 = data.fiber_warp_thired_value1;
                  var fiber_warp_thired_cond1 = data.fiber_warp_thired_cond1;
                  var fiber_warp_thired_cond2 = data.fiber_warp_thired_cond2;

                  var fiber_warp_name_fourth = data.fiber_warp_name_fourth;
                  var fiber_warp_fourth_value2 = data.fiber_warp_fourth_value2;
                  var fiber_warp_fourth_value1 = data.fiber_warp_fourth_value1;
                  var fiber_warp_fourth_cond1 = data.fiber_warp_fourth_cond1;
                  var fiber_warp_fourth_cond2 = data.fiber_warp_fourth_cond2;

                  var fiber_weft_name_polyester = data.fiber_weft_name_polyester;
                  var fiber_weft_polyester_value2 = data.fiber_weft_polyester_value2;
                  var fiber_weft_polyester_value1 = data.fiber_weft_polyester_value1;
                  var fiber_weft_polyester_cond1 = data.fiber_weft_polyester_cond1;
                  var fiber_weft_polyester_cond2 = data.fiber_weft_polyester_cond2;

                  var fiber_weft_name_cotton = data.fiber_weft_name_cotton;
                  var fiber_weft_cotton_value2 = data.fiber_weft_cotton_value2;
                  var fiber_weft_cotton_value1 = data.fiber_weft_cotton_value1;
                  var fiber_weft_cotton_cond1 = data.fiber_weft_cotton_cond1;
                  var fiber_weft_cotton_cond2 = data.fiber_weft_cotton_cond2;

                  var fiber_weft_name_thired = data.fiber_weft_name_thired;
                  var fiber_weft_thired_value2 = data.fiber_weft_thired_value2;
                  var fiber_weft_thired_value1 = data.fiber_weft_thired_value1;
                  var fiber_weft_thired_cond1 = data.fiber_weft_thired_cond1;
                  var fiber_weft_thired_cond2 = data.fiber_weft_thired_cond2;

                  var fiber_weft_name_fourth = data.fiber_weft_name_fourth;
                  var fiber_weft_fourth_value2 = data.fiber_weft_fourth_value2;
                  var fiber_weft_fourth_value1 = data.fiber_weft_fourth_value1;
                  var fiber_weft_fourth_cond1 = data.fiber_weft_fourth_cond1;
                  var fiber_weft_fourth_cond2 = data.fiber_weft_fourth_cond2;

                  $.ajax(
                  {
                      url: "multiple_copy_insert_into_database.php",
                      method: "POST",
                      data: {
                        pp_no_id: pp_no_id, 
                        pp_version: pp_version, 
                        pp_version_standard: pp_version_standard,
                        selection_of_multiple_pp_version_for_copy: selection_of_multiple_pp_version_for_copy,

                        yarn_weft_cond1: yarn_weft_cond1,
                        yarn_weft_cond2: yarn_weft_cond2,
                        yarn_weft_value2: yarn_weft_value2,
                        yarn_weft_value1: yarn_weft_value1,

                        yarn_warp_cond1: yarn_warp_cond1,
                        yarn_warp_cond2: yarn_warp_cond2,
                        yarn_warp_value2: yarn_warp_value2,
                        yarn_warp_value1: yarn_warp_value1,

                        thread_epi_cond1: thread_epi_cond1,
                        thread_epi_value1: thread_epi_value1,
                        thread_epi_value2: thread_epi_value2,
                        thread_epi_cond2: thread_epi_cond2,

                        thread_ppi_cond1: thread_ppi_cond1,
                        thread_ppi_value1: thread_ppi_value1,
                        thread_ppi_value2: thread_ppi_value2,
                        thread_ppi_cond2: thread_ppi_cond2,

                        gsm_warp_cond1: gsm_warp_cond1,
                        gsm_warp_cond2: gsm_warp_cond2,
                        gsm_warp_value2: gsm_warp_value2,
                        gsm_warp_value1: gsm_warp_value1,

                        fiber_content_select: fiber_content_select,

                        fiber_total_name_polyester: fiber_total_name_polyester,
                        fiber_total_polyester_cond1: fiber_total_polyester_cond1,
                        fiber_total_polyester_cond2: fiber_total_polyester_cond2,
                        fiber_total_polyester_value2: fiber_total_polyester_value2,
                        fiber_total_polyester_value1: fiber_total_polyester_value1,

                        fiber_total_name_cotton: fiber_total_name_cotton,
                        fiber_total_cotton_cond1: fiber_total_cotton_cond1,
                        fiber_total_cotton_cond2: fiber_total_cotton_cond2,
                        fiber_total_cotton_value2: fiber_total_cotton_value2,
                        fiber_total_cotton_value1: fiber_total_cotton_value1,

                        fiber_total_name_thired: fiber_total_name_thired,
                        fiber_total_thired_cond1: fiber_total_thired_cond1,
                        fiber_total_thired_cond2: fiber_total_thired_cond2,
                        fiber_total_thired_value2: fiber_total_thired_value2,
                        fiber_total_thired_value1: fiber_total_thired_value1,

                        fiber_total_name_fourth: fiber_total_name_fourth,
                        fiber_total_fourth_cond1: fiber_total_fourth_cond1,
                        fiber_total_fourth_cond2: fiber_total_fourth_cond2,
                        fiber_total_fourth_value2: fiber_total_fourth_value2,
                        fiber_total_fourth_value1: fiber_total_fourth_value1,

                        fiber_warp_name_polyester: fiber_warp_name_polyester,
                        fiber_warp_polyester_cond1: fiber_warp_polyester_cond1,
                        fiber_warp_polyester_cond2: fiber_warp_polyester_cond2,
                        fiber_warp_polyester_value2: fiber_warp_polyester_value2,
                        fiber_warp_polyester_value1: fiber_warp_polyester_value1,

                        fiber_warp_name_cotton: fiber_warp_name_cotton,
                        fiber_warp_cotton_cond1: fiber_warp_cotton_cond1,
                        fiber_warp_cotton_cond2: fiber_warp_cotton_cond2,
                        fiber_warp_cotton_value2: fiber_warp_cotton_value2,
                        fiber_warp_cotton_value1: fiber_warp_cotton_value1,

                        fiber_warp_name_thired: fiber_warp_name_thired,
                        fiber_warp_thired_cond1: fiber_warp_thired_cond1,
                        fiber_warp_thired_cond2: fiber_warp_thired_cond2,
                        fiber_warp_thired_value2: fiber_warp_thired_value2,
                        fiber_warp_thired_value1: fiber_warp_thired_value1,

                        fiber_warp_name_fourth: fiber_warp_name_fourth,
                        fiber_warp_fourth_cond1: fiber_warp_fourth_cond1,
                        fiber_warp_fourth_cond2: fiber_warp_fourth_cond2,
                        fiber_warp_fourth_value2: fiber_warp_fourth_value2,
                        fiber_warp_fourth_value1: fiber_warp_fourth_value1,

                        fiber_weft_name_polyester: fiber_weft_name_polyester,
                        fiber_weft_polyester_cond1: fiber_weft_polyester_cond1,
                        fiber_weft_polyester_cond2: fiber_weft_polyester_cond2,
                        fiber_weft_polyester_value2: fiber_weft_polyester_value2,
                        fiber_weft_polyester_value1: fiber_weft_polyester_value1,

                        fiber_weft_name_cotton: fiber_weft_name_cotton,
                        fiber_weft_cotton_cond1: fiber_weft_cotton_cond1,
                        fiber_weft_cotton_cond2: fiber_weft_cotton_cond2,
                        fiber_weft_cotton_value2: fiber_weft_cotton_value2,
                        fiber_weft_cotton_value1: fiber_weft_cotton_value1,

                        fiber_weft_name_thired: fiber_weft_name_thired,
                        fiber_weft_thired_cond1: fiber_weft_thired_cond1,
                        fiber_weft_thired_cond2: fiber_weft_thired_cond2,
                        fiber_weft_thired_value2: fiber_weft_thired_value2,
                        fiber_weft_thired_value1: fiber_weft_thired_value1,

                        fiber_weft_name_fourth: fiber_weft_name_fourth,
                        fiber_weft_fourth_cond1: fiber_weft_fourth_cond1,
                        fiber_weft_fourth_cond2: fiber_weft_fourth_cond2,
                        fiber_weft_fourth_value2: fiber_weft_fourth_value2,
                        fiber_weft_fourth_value1: fiber_weft_fourth_value1,

                      },
                      success:function(new_data)
                      {
                          //after copy then first submit change data
                          $.ajax(
                          {
                              type: "POST",
                              url: "define_view_standards.php",
                              method: "POST",
                              data: 
                              {
                                pp_no_id: pp_no_id, 
                                pp_version: pp_version,
                                pp_version_standard: pp_version_standard
                              },
                              success:function(data)
                              {
                                  $('#retrieve_general_data').html(data);
                                  $('select#pp_version_standard_model').val(pp_version_standard);
                                  $('#others_retrieve_general_data').html("");
                              }
                          });
                          //and then after submit button next the change occure
                          view_standard_select(pp_version_standard);
                      }
                  });
                   
              }
          });
      }

      else if (pp_version_standard == 2)
      {
          $.ajax(
          {
              type: "POST",
              url: "singe_issunce_copy.php",
              method: "POST",
              dataType:"JSON",
              data: 
              {
                singe_standard_id: standard_id
              },
              success:function(data)
              {
                  $('#others_retrieve_general_data').html("");

                  var intensity_cond1 = data.intensity_cond1;
                  var intensity_value1 = data.intensity_value1;
                  var intensity_value2 = data.intensity_value2;
                  var intensity_cond2 = data.intensity_cond2;

                  var speed_cond1 = data.speed_cond1;
                  var speed_value1 = data.speed_value1;
                  var speed_value2 = data.speed_value2;
                  var speed_cond2 = data.speed_cond2;

                  var temp_cond1 = data.temp_cond1;
                  var temp_value1 = data.temp_value1;
                  var temp_value2 = data.temp_value2;
                  var temp_cond2 = data.temp_cond2;

                  var ph_cond1 = data.ph_cond1;
                  var ph_value1 = data.ph_value1;
                  var ph_value2 = data.ph_value2;
                  var ph_cond2 = data.ph_cond2;

                  $.ajax(
                  {
                      type: "POST",
                      url: "multiple_copy_insert_into_singe_database.php",
                      method: "POST",
                      data: {
                        pp_no_id: pp_no_id, 
                        pp_version: pp_version, 
                        pp_version_standard: pp_version_standard,
                        selection_of_multiple_pp_version_for_copy: selection_of_multiple_pp_version_for_copy,

                        intensity_cond1: intensity_cond1,
                        intensity_value1: intensity_value1,
                        intensity_value2: intensity_value2,
                        intensity_cond2: intensity_cond2,

                        speed_cond1: speed_cond1,
                        speed_value1: speed_value1,
                        speed_value2: speed_value2,
                        speed_cond2: speed_cond2,

                        temp_cond1: temp_cond1,
                        temp_value1: temp_value1,
                        temp_value2: temp_value2,
                        temp_cond2: temp_cond2,

                        ph_cond1: ph_cond1,
                        ph_value1: ph_value1,
                        ph_value2: ph_value2,
                        ph_cond2: ph_cond2

                      },
                      success:function(new_data)
                      {
                          //after copy then first submit change data
                          $.ajax(
                          {
                              type: "POST",
                              url: "define_view_standards.php",
                              method: "POST",
                              data: 
                              {
                                pp_no_id: pp_no_id, 
                                pp_version: pp_version,
                                pp_version_standard: pp_version_standard
                              },
                              success:function(data)
                              {
                                  $('#retrieve_general_data').html(data);
                                  $('select#pp_version_standard_model').val(pp_version_standard);
                                  $('#others_retrieve_general_data').html("");
                              }
                          });
                          //and then after submit button next the change occure
                          view_standard_select(pp_version_standard);
                      }
                  });
                   
              }
          });
      }

      else if (pp_version_standard == 3)
      {
          $.ajax(
          {
              type: "POST",
              url: "bleaching_issunce_copy.php",
              method: "POST",
              dataType:"JSON",
              data: 
              {
                bleaching_standard_id: standard_id
              },
              success:function(data)
              {
                  $('#others_retrieve_general_data').html("");

                  var absorbency_cond1 = data.absorbency_cond1;
                  var absorbency_value1 = data.absorbency_value1;
                  var absorbency_value2 = data.absorbency_value2;
                  var absorbency_cond2 = data.absorbency_cond2;

                  var sizing_cond1 = data.sizing_cond1;
                  var sizing_value1 = data.sizing_value1;
                  var sizing_value2 = data.sizing_value2;
                  var sizing_cond2 = data.sizing_cond2;

                  var whiteness_cond1 = data.whiteness_cond1;
                  var whiteness_value1 = data.whiteness_value1;
                  var whiteness_value2 = data.whiteness_value2;
                  var whiteness_cond2 = data.whiteness_cond2;

                  var pilling_cond1 = data.pilling_cond1;
                  var pilling_value1 = data.pilling_value1;
                  var pilling_value2 = data.pilling_value2;
                  var pilling_cond2 = data.pilling_cond2;

                  var ph_cond1 = data.ph_cond1;
                  var ph_value1 = data.ph_value1;
                  var ph_value2 = data.ph_value2;
                  var ph_cond2 = data.ph_cond2;

                  $.ajax(
                  {
                      url: "multiple_copy_insert_into_bleaching_database.php",
                      method: "POST",
                      data: {
                        pp_no_id: pp_no_id, 
                        pp_version: pp_version, 
                        pp_version_standard: pp_version_standard,
                        selection_of_multiple_pp_version_for_copy: selection_of_multiple_pp_version_for_copy,

                        absorbency_cond1: absorbency_cond1,
                        absorbency_value1: absorbency_value1,
                        absorbency_value2: absorbency_value2,
                        absorbency_cond2: absorbency_cond2,

                        sizing_cond1: sizing_cond1,
                        sizing_value1: sizing_value1,
                        sizing_value2: sizing_value2,
                        sizing_cond2: sizing_cond2,

                        whiteness_cond1: whiteness_cond1,
                        whiteness_value1: whiteness_value1,
                        whiteness_value2: whiteness_value2,
                        whiteness_cond2: whiteness_cond2,

                        pilling_cond1: pilling_cond1,
                        pilling_value1: pilling_value1,
                        pilling_value2: pilling_value2,
                        pilling_cond2: pilling_cond2,

                        ph_cond1: ph_cond1,
                        ph_value1: ph_value1,
                        ph_value2: ph_value2,
                        ph_cond2: ph_cond2

                      },
                      success:function(new_data)
                      {
                          //after copy then first submit change data
                          $.ajax(
                          {
                              type: "POST",
                              url: "define_view_standards.php",
                              method: "POST",
                              data: 
                              {
                                pp_no_id: pp_no_id, 
                                pp_version: pp_version,
                                pp_version_standard: pp_version_standard
                              },
                              success:function(data)
                              {
                                  $('#retrieve_general_data').html(data);
                                  $('select#pp_version_standard_model').val(pp_version_standard);
                                  $('#others_retrieve_general_data').html("");
                              }
                          });
                          //and then after submit button next the change occure
                          view_standard_select(pp_version_standard);
                      }
                  });
                   
              }
          });
      }


      else if (pp_version_standard == 4)
      {
          $.ajax(
          {
              type: "POST",
              url: "ready_mercerize_issunce_copy.php",
              method: "POST",
              dataType:"JSON",
              data: 
              {
                ready_mercerize_standard_id: standard_id
              },
              success:function(data)
              {
                  $('#others_retrieve_general_data').html("");

                  var whiteness_cond1 = data.whiteness_cond1;
                  var whiteness_value1 = data.whiteness_value1;
                  var whiteness_value2 = data.whiteness_value2;
                  var whiteness_cond2 = data.whiteness_cond2;

                  var bowing_and_skew_cond1 = data.bowing_and_skew_cond1;
                  var bowing_and_skew_value1 = data.bowing_and_skew_value1;
                  var bowing_and_skew_value2 = data.bowing_and_skew_value2;
                  var bowing_and_skew_cond2 = data.bowing_and_skew_cond2;

                  var ph_cond1 = data.ph_cond1;
                  var ph_value1 = data.ph_value1;
                  var ph_value2 = data.ph_value2;
                  var ph_cond2 = data.ph_cond2;

                  $.ajax(
                  {
                      url: "multiple_copy_insert_into_ready_mercerize_database.php",
                      method: "POST",
                      data: {
                        pp_no_id: pp_no_id, 
                        pp_version: pp_version, 
                        pp_version_standard: pp_version_standard,
                        selection_of_multiple_pp_version_for_copy: selection_of_multiple_pp_version_for_copy,

                        whiteness_cond1: whiteness_cond1,
                        whiteness_value1: whiteness_value1,
                        whiteness_value2: whiteness_value2,
                        whiteness_cond2: whiteness_cond2,

                        bowing_and_skew_cond1: bowing_and_skew_cond1,
                        bowing_and_skew_value1: bowing_and_skew_value1,
                        bowing_and_skew_value2: bowing_and_skew_value2,
                        bowing_and_skew_cond2: bowing_and_skew_cond2,

                        ph_cond1: ph_cond1,
                        ph_value1: ph_value1,
                        ph_value2: ph_value2,
                        ph_cond2: ph_cond2

                      },
                      success:function(new_data)
                      {
                          //after copy then first submit change data
                          $.ajax(
                          {
                              type: "POST",
                              url: "define_view_standards.php",
                              method: "POST",
                              data: 
                              {
                                pp_no_id: pp_no_id, 
                                pp_version: pp_version,
                                pp_version_standard: pp_version_standard
                              },
                              success:function(data)
                              {
                                  $('#retrieve_general_data').html(data);
                                  $('select#pp_version_standard_model').val(pp_version_standard);
                                  $('#others_retrieve_general_data').html("");
                              }
                          });
                          //and then after submit button next the change occure
                          view_standard_select(pp_version_standard);
                      }
                  });
                   
              }
          });
      }


      else if (pp_version_standard == 5)
      {
          $.ajax(
          {
              type: "POST",
              url: "mercerize_issunce_copy.php",
              method: "POST",
              dataType:"JSON",
              data: 
              {
                mercerize_standard_id: standard_id
              },
              success:function(data)
              {
                  $('#others_retrieve_general_data').html("");

                  var absorbency_cond1 = data.absorbency_cond1;
                  var absorbency_value1 = data.absorbency_value1;
                  var absorbency_value2 = data.absorbency_value2;
                  var absorbency_cond2 = data.absorbency_cond2;

                  var sizing_cond1 = data.sizing_cond1;
                  var sizing_value1 = data.sizing_value1;
                  var sizing_value2 = data.sizing_value2;
                  var sizing_cond2 = data.sizing_cond2;

                  var whiteness_cond1 = data.whiteness_cond1;
                  var whiteness_value1 = data.whiteness_value1;
                  var whiteness_value2 = data.whiteness_value2;
                  var whiteness_cond2 = data.whiteness_cond2;

                  var ph_cond1 = data.ph_cond1;
                  var ph_value1 = data.ph_value1;
                  var ph_value2 = data.ph_value2;
                  var ph_cond2 = data.ph_cond2;

                  $.ajax(
                  {
                      url: "multiple_copy_insert_into_mercerize_database.php",
                      method: "POST",
                      data: {
                        pp_no_id: pp_no_id, 
                        pp_version: pp_version, 
                        pp_version_standard: pp_version_standard,
                        selection_of_multiple_pp_version_for_copy: selection_of_multiple_pp_version_for_copy,

                        absorbency_cond1: absorbency_cond1,
                        absorbency_value1: absorbency_value1,
                        absorbency_value2: absorbency_value2,
                        absorbency_cond2: absorbency_cond2,

                        sizing_cond1: sizing_cond1,
                        sizing_value1: sizing_value1,
                        sizing_value2: sizing_value2,
                        sizing_cond2: sizing_cond2,

                        whiteness_cond1: whiteness_cond1,
                        whiteness_value1: whiteness_value1,
                        whiteness_value2: whiteness_value2,
                        whiteness_cond2: whiteness_cond2,

                        ph_cond1: ph_cond1,
                        ph_value1: ph_value1,
                        ph_value2: ph_value2,
                        ph_cond2: ph_cond2

                      },
                      success:function(new_data)
                      {
                          //after copy then first submit change data
                          $.ajax(
                          {
                              type: "POST",
                              url: "define_view_standards.php",
                              method: "POST",
                              data: 
                              {
                                pp_no_id: pp_no_id, 
                                pp_version: pp_version,
                                pp_version_standard: pp_version_standard
                              },
                              success:function(data)
                              {
                                  $('#retrieve_general_data').html(data);
                                  $('select#pp_version_standard_model').val(pp_version_standard);
                                  $('#others_retrieve_general_data').html("");
                              }
                          });
                          //and then after submit button next the change occure
                          view_standard_select(pp_version_standard);
                      }
                  });
                   
              }
          });
      }


      else if (pp_version_standard == 6)
      {
          $.ajax(
          {
              type: "POST",
              url: "equalize_issunce_copy.php",
              method: "POST",
              dataType:"JSON",
              data: 
              {
                equalize_standard_id: standard_id
              },
              success:function(data)
              {
                  $('#others_retrieve_general_data').html("");

                  var whiteness_cond1 = data.whiteness_cond1;
                  var whiteness_value1 = data.whiteness_value1;
                  var whiteness_value2 = data.whiteness_value2;
                  var whiteness_cond2 = data.whiteness_cond2;

                  var bowing_and_skew_cond1 = data.bowing_and_skew_cond1;
                  var bowing_and_skew_value1 = data.bowing_and_skew_value1;
                  var bowing_and_skew_value2 = data.bowing_and_skew_value2;
                  var bowing_and_skew_cond2 = data.bowing_and_skew_cond2;

                  var ph_cond1 = data.ph_cond1;
                  var ph_value1 = data.ph_value1;
                  var ph_value2 = data.ph_value2;
                  var ph_cond2 = data.ph_cond2;

                  $.ajax(
                  {
                      url: "multiple_copy_insert_into_equalize_database.php",
                      method: "POST",
                      data: {
                        pp_no_id: pp_no_id, 
                        pp_version: pp_version, 
                        pp_version_standard: pp_version_standard,
                        selection_of_multiple_pp_version_for_copy: selection_of_multiple_pp_version_for_copy,

                        whiteness_cond1: whiteness_cond1,
                        whiteness_value1: whiteness_value1,
                        whiteness_value2: whiteness_value2,
                        whiteness_cond2: whiteness_cond2,

                        bowing_and_skew_cond1: bowing_and_skew_cond1,
                        bowing_and_skew_value1: bowing_and_skew_value1,
                        bowing_and_skew_value2: bowing_and_skew_value2,
                        bowing_and_skew_cond2: bowing_and_skew_cond2,

                        ph_cond1: ph_cond1,
                        ph_value1: ph_value1,
                        ph_value2: ph_value2,
                        ph_cond2: ph_cond2

                      },
                      success:function(new_data)
                      {
                          //after copy then first submit change data
                          $.ajax(
                          {
                              type: "POST",
                              url: "define_view_standards.php",
                              method: "POST",
                              data: 
                              {
                                pp_no_id: pp_no_id, 
                                pp_version: pp_version,
                                pp_version_standard: pp_version_standard
                              },
                              success:function(data)
                              {
                                  $('#retrieve_general_data').html(data);
                                  $('select#pp_version_standard_model').val(pp_version_standard);
                                  $('#others_retrieve_general_data').html("");
                              }
                          });
                          //and then after submit button next the change occure
                          view_standard_select(pp_version_standard);
                      }
                  });
                   
              }
          });
      }


      else if (pp_version_standard == 7)
      {
          $.ajax(
          {
              type: "POST",
              url: "printing_issunce_copy.php",
              method: "POST",
              dataType:"JSON",
              data: 
              {
                printing_standard_id: standard_id
              },
              success:function(data)
              {
                  $('#others_retrieve_general_data').html("");

                  var rubbing_dry_cond1 = data.rubbing_dry_cond1;
                  var rubbing_dry_value1 = data.rubbing_dry_value1;
                  var rubbing_dry_value2 = data.rubbing_dry_value2;
                  var rubbing_dry_cond2 = data.rubbing_dry_cond2;

                  var rubbing_wet_cond1 = data.rubbing_wet_cond1;
                  var rubbing_wet_value1 = data.rubbing_wet_value1;
                  var rubbing_wet_value2 = data.rubbing_wet_value2;
                  var rubbing_wet_cond2 = data.rubbing_wet_cond2;

                  $.ajax(
                  {
                      url: "multiple_copy_insert_into_printing_database.php",
                      method: "POST",
                      data: {
                        pp_no_id: pp_no_id, 
                        pp_version: pp_version, 
                        pp_version_standard: pp_version_standard,
                        selection_of_multiple_pp_version_for_copy: selection_of_multiple_pp_version_for_copy,

                        rubbing_dry_cond1: rubbing_dry_cond1,
                        rubbing_dry_value1: rubbing_dry_value1,
                        rubbing_dry_value2: rubbing_dry_value2,
                        rubbing_dry_cond2: rubbing_dry_cond2,

                        rubbing_wet_cond1: rubbing_wet_cond1,
                        rubbing_wet_value1: rubbing_wet_value1,
                        rubbing_wet_value2: rubbing_wet_value2,
                        rubbing_wet_cond2: rubbing_wet_cond2

                      },
                      success:function(new_data)
                      {
                          //after copy then first submit change data
                          $.ajax(
                          {
                              type: "POST",
                              url: "define_view_standards.php",
                              method: "POST",
                              data: 
                              {
                                pp_no_id: pp_no_id, 
                                pp_version: pp_version,
                                pp_version_standard: pp_version_standard
                              },
                              success:function(data)
                              {
                                  $('#retrieve_general_data').html(data);
                                  $('select#pp_version_standard_model').val(pp_version_standard);
                                  $('#others_retrieve_general_data').html("");
                              }
                          });
                          //and then after submit button next the change occure
                          view_standard_select(pp_version_standard);
                      }
                  });
                   
              }
          });
      }


      else if (pp_version_standard == 8)
      {
          $.ajax(
          {
              type: "POST",
              url: "curing_issunce_copy.php",
              method: "POST",
              dataType:"JSON",
              data: 
              {
                curing_standard_id: standard_id
              },
              success:function(data)
              {
                  $('#others_retrieve_general_data').html("");

                  var rubbing_dry_cond1 = data.rubbing_dry_cond1;
                  var rubbing_dry_value1 = data.rubbing_dry_value1;
                  var rubbing_dry_value2 = data.rubbing_dry_value2;
                  var rubbing_dry_cond2 = data.rubbing_dry_cond2;

                  var rubbing_wet_cond1 = data.rubbing_wet_cond1;
                  var rubbing_wet_value1 = data.rubbing_wet_value1;
                  var rubbing_wet_value2 = data.rubbing_wet_value2;
                  var rubbing_wet_cond2 = data.rubbing_wet_cond2;

                  var time_cond1 = data.time_cond1;
                  var time_value1 = data.time_value1;
                  var time_value2 = data.time_value2;
                  var time_cond2 = data.time_cond2;

                  var temp_cond1 = data.temp_cond1;
                  var temp_value1 = data.temp_value1;
                  var temp_value2 = data.temp_value2;
                  var temp_cond2 = data.temp_cond2;

                  var yarn_warp_value2 = data.yarn_warp_value2;
                  var yarn_warp_value1 = data.yarn_warp_value1;
                  var yarn_warp_cond1 = data.yarn_warp_cond1;
                  var yarn_warp_cond2 = data.yarn_warp_cond2;

                  var yarn_weft_value2 = data.yarn_weft_value2;
                  var yarn_weft_value1 = data.yarn_weft_value1;
                  var yarn_weft_cond1 = data.yarn_weft_cond1;
                  var yarn_weft_cond2 = data.yarn_weft_cond2;

                  var thread_epi_cond1 = data.thread_epi_cond1;
                  var thread_epi_value1 = data.thread_epi_value1;
                  var thread_epi_value2 = data.thread_epi_value2;
                  var thread_epi_cond2 = data.thread_epi_cond2;

                  var thread_ppi_cond1 = data.thread_ppi_cond1;
                  var thread_ppi_value1 = data.thread_ppi_value1;
                  var thread_ppi_value2 = data.thread_ppi_value2;
                  var thread_ppi_cond2 = data.thread_ppi_cond2;

                  var gsm_warp_value2 = data.gsm_warp_value2;
                  var gsm_warp_value1 = data.gsm_warp_value1;
                  var gsm_warp_cond1 = data.gsm_warp_cond1;
                  var gsm_warp_cond2 = data.gsm_warp_cond2;

                  var wash_dry_warp_before_iron_cond1 = data.wash_dry_warp_before_iron_cond1;
                  var wash_dry_warp_before_iron_value1 = data.wash_dry_warp_before_iron_value1;
                  var wash_dry_warp_before_iron_value2 = data.wash_dry_warp_before_iron_value2;
                  var wash_dry_warp_before_iron_cond2 = data.wash_dry_warp_before_iron_cond2;

                  var wash_dry_weft_before_iron_cond1 = data.wash_dry_weft_before_iron_cond1;
                  var wash_dry_weft_before_iron_value1 = data.wash_dry_weft_before_iron_value1;
                  var wash_dry_weft_before_iron_value2 = data.wash_dry_weft_before_iron_value2;
                  var wash_dry_weft_before_iron_cond2 = data.wash_dry_weft_before_iron_cond2;

                  var wash_dry_warp_after_iron_value2 = data.wash_dry_warp_after_iron_value2;
                  var wash_dry_warp_after_iron_value1 = data.wash_dry_warp_after_iron_value1;
                  var wash_dry_warp_after_iron_cond1 = data.wash_dry_warp_after_iron_cond1;
                  var wash_dry_warp_after_iron_cond2 = data.wash_dry_warp_after_iron_cond2;

                  var wash_dry_weft_after_iron_cond1 = data.wash_dry_weft_after_iron_cond1;
                  var wash_dry_weft_after_iron_value1 = data.wash_dry_weft_after_iron_value1;
                  var wash_dry_weft_after_iron_value2 = data.wash_dry_weft_after_iron_value2;
                  var wash_dry_weft_after_iron_cond2 = data.wash_dry_weft_after_iron_cond2;

                  var tensile_warp_cond1 = data.tensile_warp_cond1;
                  var tensile_warp_value1 = data.tensile_warp_value1;
                  var tensile_warp_value2 = data.tensile_warp_value2;
                  var tensile_warp_cond2 = data.tensile_warp_cond2;
                  var tensile_warp_unit = data.tensile_warp_unit;

                  var tensile_weft_cond1 = data.tensile_weft_cond1;
                  var tensile_weft_value1 = data.tensile_weft_value1;
                  var tensile_weft_value2 = data.tensile_weft_value2;
                  var tensile_weft_cond2 = data.tensile_weft_cond2;
                  var tensile_weft_unit = data.tensile_weft_unit;

                  var tear_force_warp_cond1 = data.tear_force_warp_cond1;
                  var tear_force_warp_value1 = data.tear_force_warp_value1;
                  var tear_force_warp_value2 = data.tear_force_warp_value2;
                  var tear_force_warp_cond2 = data.tear_force_warp_cond2;
                  var tear_force_warp_unit = data.tear_force_warp_unit;

                  var tear_force_weft_cond1 = data.tear_force_weft_cond1;
                  var tear_force_weft_value1 = data.tear_force_weft_value1;
                  var tear_force_weft_value2 = data.tear_force_weft_value2;
                  var tear_force_weft_cond2 = data.tear_force_weft_cond2;
                  var tear_force_weft_unit = data.tear_force_weft_unit;

                  var washing_ph_cond1 = data.washing_ph_cond1;
                  var washing_ph_value1 = data.washing_ph_value1;
                  var washing_ph_value2 = data.washing_ph_value2;
                  var washing_ph_cond2 = data.washing_ph_cond2;

                  var pilling_cond1 = data.pilling_cond1;
                  var pilling_value1 = data.pilling_value1;
                  var pilling_value2 = data.pilling_value2;
                  var pilling_cond2 = data.pilling_cond2;


                  $.ajax(
                  {
                      url: "multiple_copy_insert_into_curing_database.php",
                      method: "POST",
                      data: {
                        pp_no_id: pp_no_id, 
                        pp_version: pp_version, 
                        pp_version_standard: pp_version_standard,
                        selection_of_multiple_pp_version_for_copy: selection_of_multiple_pp_version_for_copy,

                        rubbing_dry_cond1: rubbing_dry_cond1,
                        rubbing_dry_value1: rubbing_dry_value1,
                        rubbing_dry_value2: rubbing_dry_value2,
                        rubbing_dry_cond2: rubbing_dry_cond2,

                        rubbing_wet_cond1: rubbing_wet_cond1,
                        rubbing_wet_value1: rubbing_wet_value1,
                        rubbing_wet_value2: rubbing_wet_value2,
                        rubbing_wet_cond2: rubbing_wet_cond2,

                        time_cond1: time_cond1,
                        time_value1: time_value1,
                        time_value2: time_value2,
                        time_cond2: time_cond2,

                        temp_cond1: temp_cond1,
                        temp_value1: temp_value1,
                        temp_value2: temp_value2,
                        temp_cond2: temp_cond2,

                        yarn_weft_cond1: yarn_weft_cond1,
                        yarn_weft_cond2: yarn_weft_cond2,
                        yarn_weft_value2: yarn_weft_value2,
                        yarn_weft_value1: yarn_weft_value1,

                        yarn_warp_cond1: yarn_warp_cond1,
                        yarn_warp_cond2: yarn_warp_cond2,
                        yarn_warp_value2: yarn_warp_value2,
                        yarn_warp_value1: yarn_warp_value1,

                        thread_epi_cond1: thread_epi_cond1,
                        thread_epi_value1: thread_epi_value1,
                        thread_epi_value2: thread_epi_value2,
                        thread_epi_cond2: thread_epi_cond2,

                        thread_ppi_cond1: thread_ppi_cond1,
                        thread_ppi_value1: thread_ppi_value1,
                        thread_ppi_value2: thread_ppi_value2,
                        thread_ppi_cond2: thread_ppi_cond2,

                        gsm_warp_cond1: gsm_warp_cond1,
                        gsm_warp_cond2: gsm_warp_cond2,
                        gsm_warp_value2: gsm_warp_value2,
                        gsm_warp_value1: gsm_warp_value1,

                        wash_dry_warp_before_iron_cond1 : wash_dry_warp_before_iron_cond1,
                        wash_dry_warp_before_iron_value1 : wash_dry_warp_before_iron_value1,
                        wash_dry_warp_before_iron_value2 : wash_dry_warp_before_iron_value2,
                        wash_dry_warp_before_iron_cond2 : wash_dry_warp_before_iron_cond2,

                        wash_dry_weft_before_iron_cond1 : wash_dry_weft_before_iron_cond1,
                        wash_dry_weft_before_iron_value1 : wash_dry_weft_before_iron_value1,
                        wash_dry_weft_before_iron_value2 : wash_dry_weft_before_iron_value2,
                        wash_dry_weft_before_iron_cond2 : wash_dry_weft_before_iron_cond2,

                        wash_dry_warp_after_iron_value2 : wash_dry_warp_after_iron_value2,
                        wash_dry_warp_after_iron_value1 : wash_dry_warp_after_iron_value1,
                        wash_dry_warp_after_iron_cond1 : wash_dry_warp_after_iron_cond1,
                        wash_dry_warp_after_iron_cond2 : wash_dry_warp_after_iron_cond2,

                        wash_dry_weft_after_iron_cond1 : wash_dry_weft_after_iron_cond1,
                        wash_dry_weft_after_iron_value1 : wash_dry_weft_after_iron_value1,
                        wash_dry_weft_after_iron_value2 : wash_dry_weft_after_iron_value2,
                        wash_dry_weft_after_iron_cond2 : wash_dry_weft_after_iron_cond2,

                        tensile_warp_cond1 : tensile_warp_cond1,
                        tensile_warp_value1 : tensile_warp_value1,
                        tensile_warp_value2 : tensile_warp_value2,
                        tensile_warp_cond2 : tensile_warp_cond2,
                        tensile_warp_unit : tensile_warp_unit,

                        tensile_weft_cond1 : tensile_weft_cond1,
                        tensile_weft_value1 : tensile_weft_value1,
                        tensile_weft_value2 : tensile_weft_value2,
                        tensile_weft_cond2 : tensile_weft_cond2,
                        tensile_weft_unit : tensile_weft_unit,

                        tear_force_warp_cond1 : tear_force_warp_cond1,
                        tear_force_warp_value1 : tear_force_warp_value1,
                        tear_force_warp_value2 : tear_force_warp_value2,
                        tear_force_warp_cond2 : tear_force_warp_cond2,
                        tear_force_warp_unit : tear_force_warp_unit,

                        tear_force_weft_cond1 : tear_force_weft_cond1,
                        tear_force_weft_value1 : tear_force_weft_value1,
                        tear_force_weft_value2 : tear_force_weft_value2,
                        tear_force_weft_cond2 : tear_force_weft_cond2,
                        tear_force_weft_unit : tear_force_weft_unit,

                        washing_ph_cond1 : washing_ph_cond1,
                        washing_ph_value1 : washing_ph_value1,
                        washing_ph_value2 : washing_ph_value2,
                        washing_ph_cond2 : washing_ph_cond2,

                        pilling_cond1: pilling_cond1,
                        pilling_value1: pilling_value1,
                        pilling_value2: pilling_value2,
                        pilling_cond2: pilling_cond2

                      },
                      success:function(new_data)
                      {
                          //after copy then first submit change data
                          $.ajax(
                          {
                              type: "POST",
                              url: "define_view_standards.php",
                              method: "POST",
                              data: 
                              {
                                pp_no_id: pp_no_id, 
                                pp_version: pp_version,
                                pp_version_standard: pp_version_standard
                              },
                              success:function(data)
                              {
                                  $('#retrieve_general_data').html(data);
                                  $('select#pp_version_standard_model').val(pp_version_standard);
                                  $('#others_retrieve_general_data').html("");
                              }
                          });
                          //and then after submit button next the change occure
                          view_standard_select(pp_version_standard);
                      }
                  });
                   
              }
          });
      }

      else if (pp_version_standard == 9)
      {
          $.ajax(
          {
              type: "POST",
              url: "finishing_issunce_copy.php",
              method: "POST",
              dataType:"JSON",
              data: 
              {
                finishing_standard_id: standard_id
              },
              success:function(data)
              {
                  $('#others_retrieve_general_data').html("");

                  var cf_rubbing_dry_cond1 = data.cf_rubbing_dry_cond1;
                  var cf_rubbing_dry_value1 = data.cf_rubbing_dry_value1;
                  var cf_rubbing_dry_value2 = data.cf_rubbing_dry_value2;
                  var cf_rubbing_dry_cond2 = data.cf_rubbing_dry_cond2;

                  var cf_rubbing_wet_value1 = data.cf_rubbing_wet_value1;
                  var cf_rubbing_wet_value2 = data.cf_rubbing_wet_value2;
                  var cf_rubbing_wet_cond1 = data.cf_rubbing_wet_cond1;
                  var cf_rubbing_wet_cond2 = data.cf_rubbing_wet_cond2;

                  var wash_dry_warp_before_iron_cond1 = data.wash_dry_warp_before_iron_cond1;
                  var wash_dry_warp_before_iron_value1 = data.wash_dry_warp_before_iron_value1;
                  var wash_dry_warp_before_iron_value2 = data.wash_dry_warp_before_iron_value2;
                  var wash_dry_warp_before_iron_cond2 = data.wash_dry_warp_before_iron_cond2;

                  var wash_dry_weft_before_iron_cond1 = data.wash_dry_weft_before_iron_cond1;
                  var wash_dry_weft_before_iron_value1 = data.wash_dry_weft_before_iron_value1;
                  var wash_dry_weft_before_iron_value2 = data.wash_dry_weft_before_iron_value2;
                  var wash_dry_weft_before_iron_cond2 = data.wash_dry_weft_before_iron_cond2;

                  var wash_dry_warp_after_iron_value2 = data.wash_dry_warp_after_iron_value2;
                  var wash_dry_warp_after_iron_value1 = data.wash_dry_warp_after_iron_value1;
                  var wash_dry_warp_after_iron_cond1 = data.wash_dry_warp_after_iron_cond1;
                  var wash_dry_warp_after_iron_cond2 = data.wash_dry_warp_after_iron_cond2;


                  var wash_dry_weft_after_iron_cond1 = data.wash_dry_weft_after_iron_cond1;
                  var wash_dry_weft_after_iron_value1 = data.wash_dry_weft_after_iron_value1;
                  var wash_dry_weft_after_iron_value2 = data.wash_dry_weft_after_iron_value2;
                  var wash_dry_weft_after_iron_cond2 = data.wash_dry_weft_after_iron_cond2;

                  var dry_cleaning_warp_cond1 = data.dry_cleaning_warp_cond1;
                  var dry_cleaning_warp_value1 = data.dry_cleaning_warp_value1;
                  var dry_cleaning_warp_value2 = data.dry_cleaning_warp_value2;
                  var dry_cleaning_warp_cond2 = data.dry_cleaning_warp_cond2;

                  var dry_cleaning_weft_cond1 = data.dry_cleaning_weft_cond1;
                  var dry_cleaning_weft_value1 = data.dry_cleaning_weft_value1;
                  var dry_cleaning_weft_value2 = data.dry_cleaning_weft_value2;
                  var dry_cleaning_weft_cond2 = data.dry_cleaning_weft_cond2;

                  var yarn_count_warp_cond1 = data.yarn_count_warp_cond1;
                  var yarn_count_warp_value1 = data.yarn_count_warp_value1;
                  var yarn_count_warp_value2 = data.yarn_count_warp_value2;
                  var yarn_count_warp_cond2 = data.yarn_count_warp_cond2;
                  var yarn_count_warp_unit = data.yarn_count_warp_unit;

                  var yarn_count_weft_cond1 = data.yarn_count_weft_cond1;
                  var yarn_count_weft_value1 = data.yarn_count_weft_value1;
                  var yarn_count_weft_value2 = data.yarn_count_weft_value2;
                  var yarn_count_weft_cond2 = data.yarn_count_weft_cond2;
                  var yarn_count_weft_unit = data.yarn_count_weft_unit;

                  var number_thread_warp_cond1 = data.number_thread_warp_cond1;
                  var number_thread_warp_value1 = data.number_thread_warp_value1;
                  var number_thread_warp_value2 = data.number_thread_warp_value2;
                  var number_thread_warp_cond2 = data.number_thread_warp_cond2;
                  var number_thread_warp_unit = data.number_thread_warp_unit;

                  var number_thread_weft_cond1 = data.number_thread_weft_cond1;
                  var number_thread_weft_value1 = data.number_thread_weft_value1;
                  var number_thread_weft_value2 = data.number_thread_weft_value2;
                  var number_thread_weft_cond2 = data.number_thread_weft_cond2;
                  var number_thread_weft_unit = data.number_thread_weft_unit;

                  var mass_per_unit_per_area_cond1 = data.mass_per_unit_per_area_cond1;
                  var mass_per_unit_per_area_value1 = data.mass_per_unit_per_area_value1;
                  var mass_per_unit_per_area_value2 = data.mass_per_unit_per_area_value2;
                  var mass_per_unit_per_area_cond2 = data.mass_per_unit_per_area_cond2;
                  var mass_per_unit_per_area_unit = data.mass_per_unit_per_area_unit;

                  var surface_pilling_cond1 = data.surface_pilling_cond1;
                  var surface_pilling_value1 = data.surface_pilling_value1;
                  var surface_pilling_value2 = data.surface_pilling_value2;
                  var surface_pilling_cond2 = data.surface_pilling_cond2;

                  var tensile_warp_cond1 = data.tensile_warp_cond1;
                  var tensile_warp_value1 = data.tensile_warp_value1;
                  var tensile_warp_value2 = data.tensile_warp_value2;
                  var tensile_warp_cond2 = data.tensile_warp_cond2;
                  var tensile_warp_unit = data.tensile_warp_unit;

                  var tensile_weft_cond1 = data.tensile_weft_cond1;
                  var tensile_weft_value1 = data.tensile_weft_value1;
                  var tensile_weft_value2 = data.tensile_weft_value2;
                  var tensile_weft_cond2 = data.tensile_weft_cond2;
                  var tensile_weft_unit = data.tensile_weft_unit;

                  var tear_force_warp_cond1 = data.tear_force_warp_cond1;
                  var tear_force_warp_value1 = data.tear_force_warp_value1;
                  var tear_force_warp_value2 = data.tear_force_warp_value2;
                  var tear_force_warp_cond2 = data.tear_force_warp_cond2;
                  var tear_force_warp_unit = data.tear_force_warp_unit;

                  var tear_force_weft_cond1 = data.tear_force_weft_cond1;
                  var tear_force_weft_value1 = data.tear_force_weft_value1;
                  var tear_force_weft_value2 = data.tear_force_weft_value2;
                  var tear_force_weft_cond2 = data.tear_force_weft_cond2;
                  var tear_force_weft_unit = data.tear_force_weft_unit;

                  var seam_strength_warp_cond1 = data.seam_strength_warp_cond1;
                  var seam_strength_warp_value1 = data.seam_strength_warp_value1;
                  var seam_strength_warp_value2 = data.seam_strength_warp_value2;
                  var seam_strength_warp_cond2 = data.seam_strength_warp_cond2;
                  var seam_strength_warp_unit = data.seam_strength_warp_unit;

                  var seam_strength_weft_cond1 = data.seam_strength_weft_cond1;
                  var seam_strength_weft_value1 = data.seam_strength_weft_value1;
                  var seam_strength_weft_value2 = data.seam_strength_weft_value2;
                  var seam_strength_weft_cond2 = data.seam_strength_weft_cond2;
                  var seam_strength_weft_unit = data.seam_strength_weft_unit;

                  var abrasion_resistance_cond1 = data.abrasion_resistance_cond1;
                  var abrasion_resistance_value1 = data.abrasion_resistance_value1;
                  var abrasion_resistance_value2 = data.abrasion_resistance_value2;
                  var abrasion_resistance_cond2 = data.abrasion_resistance_cond2;

                  var abrasion_resistance_lose_cond1 = data.abrasion_resistance_lose_cond1;
                  var abrasion_resistance_lose_value1 = data.abrasion_resistance_lose_value1;
                  var abrasion_resistance_lose_value2 = data.abrasion_resistance_lose_value2;
                  var abrasion_resistance_lose_cond2 = data.abrasion_resistance_lose_cond2;

                  var abrasion_resistance_thread_break = data.abrasion_resistance_thread_break;
                  var print_durability = data.print_durability;
                  var revolution = data.revolution;

                  var washing_ph_cond1 = data.washing_ph_cond1;
                  var washing_ph_value1 = data.washing_ph_value1;
                  var washing_ph_value2 = data.washing_ph_value2;
                  var washing_ph_cond2 = data.washing_ph_cond2;

                  var formaldehyde_content_cond1 = data.formaldehyde_content_cond1;
                  var formaldehyde_content_value1 = data.formaldehyde_content_value1;
                  var formaldehyde_content_value2 = data.formaldehyde_content_value2;
                  var formaldehyde_content_cond2 = data.formaldehyde_content_cond2;
                  var formaldehyde_content_unit = data.formaldehyde_content_unit;

                  var cf_dry_cleaning_c_change_cond1 = data.cf_dry_cleaning_c_change_cond1;
                  var cf_dry_cleaning_c_change_value1 = data.cf_dry_cleaning_c_change_value1;
                  var cf_dry_cleaning_c_change_value2 = data.cf_dry_cleaning_c_change_value2;
                  var cf_dry_cleaning_c_change_cond2 = data.cf_dry_cleaning_c_change_cond2;

                  var cf_dry_cleaning_staining_cond1 = data.cf_dry_cleaning_staining_cond1;
                  var cf_dry_cleaning_staining_value1 = data.cf_dry_cleaning_staining_value1;
                  var cf_dry_cleaning_staining_value2 = data.cf_dry_cleaning_staining_value2;
                  var cf_dry_cleaning_staining_cond2 = data.cf_dry_cleaning_staining_cond2;

                  var cf_washing_c_change_cond1 = data.cf_washing_c_change_cond1;
                  var cf_washing_c_change_value1 = data.cf_washing_c_change_value1;
                  var cf_washing_c_change_value2 = data.cf_washing_c_change_value2;
                  var cf_washing_c_change_cond2 = data.cf_washing_c_change_cond2;

                  var cf_washing_staining_cond1 = data.cf_washing_staining_cond1;
                  var cf_washing_staining_value1 = data.cf_washing_staining_value1;
                  var cf_washing_staining_value2 = data.cf_washing_staining_value2;
                  var cf_washing_staining_cond2 = data.cf_washing_staining_cond2;

                  var cf_perspiration_acis_c_change_cond1 = data.cf_perspiration_acis_c_change_cond1;
                  var cf_perspiration_acis_c_change_value1 = data.cf_perspiration_acis_c_change_value1;
                  var cf_perspiration_acis_c_change_value2 = data.cf_perspiration_acis_c_change_value2;
                  var cf_perspiration_acis_c_change_cond2 = data.cf_perspiration_acis_c_change_cond2;

                  var cf_perspiration_acis_staining_cond1 = data.cf_perspiration_acis_staining_cond1;
                  var cf_perspiration_acis_staining_value1 = data.cf_perspiration_acis_staining_value1;
                  var cf_perspiration_acis_staining_value2 = data.cf_perspiration_acis_staining_value2;
                  var cf_perspiration_acis_staining_cond2 = data.cf_perspiration_acis_staining_cond2;

                  var cf_perspiration_alkali_c_change_cond1 = data.cf_perspiration_alkali_c_change_cond1;
                  var cf_perspiration_alkali_c_change_value1 = data.cf_perspiration_alkali_c_change_value1;
                  var cf_perspiration_alkali_c_change_value2 = data.cf_perspiration_alkali_c_change_value2;
                  var cf_perspiration_alkali_c_change_cond2 = data.cf_perspiration_alkali_c_change_cond2;

                  var cf_perspiration_alkali_staining_cond1 = data.cf_perspiration_alkali_staining_cond1;
                  var cf_perspiration_alkali_staining_value1 = data.cf_perspiration_alkali_staining_value1;
                  var cf_perspiration_alkali_staining_value2 = data.cf_perspiration_alkali_staining_value2;
                  var cf_perspiration_alkali_staining_cond2 = data.cf_perspiration_alkali_staining_cond2;

                  var cf_water_c_change_cond1 = data.cf_water_c_change_cond1;
                  var cf_water_c_change_value1 = data.cf_water_c_change_value1;
                  var cf_water_c_change_value2 = data.cf_water_c_change_value2;
                  var cf_water_c_change_cond2 = data.cf_water_c_change_cond2;

                  var cf_water_staining_cond1 = data.cf_water_staining_cond1;
                  var cf_water_staining_value1 = data.cf_water_staining_value1;
                  var cf_water_staining_value2 = data.cf_water_staining_value2;
                  var cf_water_staining_cond2 = data.cf_water_staining_cond2;

                  var cf_water_sotting_staining_cond1 = data.cf_water_sotting_staining_cond1;
                  var cf_water_sotting_staining_value1 = data.cf_water_sotting_staining_value1;
                  var cf_water_sotting_staining_value2 = data.cf_water_sotting_staining_value2;
                  var cf_water_sotting_staining_cond2 = data.cf_water_sotting_staining_cond2;

                  var cf_water_wetting_staining_cond1 = data.cf_water_wetting_staining_cond1;
                  var cf_water_wetting_staining_value1 = data.cf_water_wetting_staining_value1;
                  var cf_water_wetting_staining_value2 = data.cf_water_wetting_staining_value2;
                  var cf_water_wetting_staining_cond2 = data.cf_water_wetting_staining_cond2;

                  var cf_hyd_reactive_dyes_c_change_cond1 = data.cf_hyd_reactive_dyes_c_change_cond1;
                  var cf_hyd_reactive_dyes_c_change_value1 = data.cf_hyd_reactive_dyes_c_change_value1;
                  var cf_hyd_reactive_dyes_c_change_value2 = data.cf_hyd_reactive_dyes_c_change_value2;
                  var cf_hyd_reactive_dyes_c_change_cond2 = data.cf_hyd_reactive_dyes_c_change_cond2;

                  var cf_hyd_reactive_dyes_staining_cond1 = data.cf_hyd_reactive_dyes_staining_cond1;
                  var cf_hyd_reactive_dyes_staining_value1 = data.cf_hyd_reactive_dyes_staining_value1;
                  var cf_hyd_reactive_dyes_staining_value2 = data.cf_hyd_reactive_dyes_staining_value2;
                  var cf_hyd_reactive_dyes_staining_cond2 = data.cf_hyd_reactive_dyes_staining_cond2;

                  var cf_oidative_damage_c_change_cond1 = data.cf_oidative_damage_c_change_cond1;
                  var cf_oidative_damage_c_change_value1 = data.cf_oidative_damage_c_change_value1;
                  var cf_oidative_damage_c_change_value2 = data.cf_oidative_damage_c_change_value2;
                  var cf_oidative_damage_c_change_cond2 = data.cf_oidative_damage_c_change_cond2;

                  var cf_phenolic_staining_cond1 = data.cf_phenolic_staining_cond1;
                  var cf_phenolic_staining_value1 = data.cf_phenolic_staining_value1;
                  var cf_phenolic_staining_value2 = data.cf_phenolic_staining_value2;
                  var cf_phenolic_staining_cond2 = data.cf_phenolic_staining_cond2;

                  var cf_pvc_migration_staining_cond1 = data.cf_pvc_migration_staining_cond1;
                  var cf_pvc_migration_staining_value1 = data.cf_pvc_migration_staining_value1;
                  var cf_pvc_migration_staining_value2 = data.cf_pvc_migration_staining_value2;
                  var cf_pvc_migration_staining_cond2 = data.cf_pvc_migration_staining_cond2;

                  var cf_saliva_c_change_cond1 = data.cf_saliva_c_change_cond1;
                  var cf_saliva_c_change_value1 = data.cf_saliva_c_change_value1;
                  var cf_saliva_c_change_value2 = data.cf_saliva_c_change_value2;
                  var cf_saliva_c_change_cond2 = data.cf_saliva_c_change_cond2;

                  var cf_saliva_staining_cond1 = data.cf_saliva_staining_cond1;
                  var cf_saliva_staining_value1 = data.cf_saliva_staining_value1;
                  var cf_saliva_staining_value2 = data.cf_saliva_staining_value2;
                  var cf_saliva_staining_cond2 = data.cf_saliva_staining_cond2;

                  var cf_chlorinated_water_c_change_cond1 = data.cf_chlorinated_water_c_change_cond1;
                  var cf_chlorinated_water_c_change_value1 = data.cf_chlorinated_water_c_change_value1;
                  var cf_chlorinated_water_c_change_value2 = data.cf_chlorinated_water_c_change_value2;
                  var cf_chlorinated_water_c_change_cond2 = data.cf_chlorinated_water_c_change_cond2;

                  var cf_chlorinated_water_staining_cond1 = data.cf_chlorinated_water_staining_cond1;
                  var cf_chlorinated_water_staining_value1 = data.cf_chlorinated_water_staining_value1;
                  var cf_chlorinated_water_staining_value2 = data.cf_chlorinated_water_staining_value2;
                  var cf_chlorinated_water_staining_cond2 = data.cf_chlorinated_water_staining_cond2;

                  var cf_cholorine_bleach_c_change_cond1 = data.cf_cholorine_bleach_c_change_cond1;
                  var cf_cholorine_bleach_c_change_value1 = data.cf_cholorine_bleach_c_change_value1;
                  var cf_cholorine_bleach_c_change_value2 = data.cf_cholorine_bleach_c_change_value2;
                  var cf_cholorine_bleach_c_change_cond2 = data.cf_cholorine_bleach_c_change_cond2;

                  var cf_cholorine_bleach_staining_cond1 = data.cf_cholorine_bleach_staining_cond1;
                  var cf_cholorine_bleach_staining_value1 = data.cf_cholorine_bleach_staining_value1;
                  var cf_cholorine_bleach_staining_value2 = data.cf_cholorine_bleach_staining_value2;
                  var cf_cholorine_bleach_staining_cond2 = data.cf_cholorine_bleach_staining_cond2;

                  var cf_peroxide_bleach_c_change_cond1 = data.cf_peroxide_bleach_c_change_cond1;
                  var cf_peroxide_bleach_c_change_value1 = data.cf_peroxide_bleach_c_change_value1;
                  var cf_peroxide_bleach_c_change_value2 = data.cf_peroxide_bleach_c_change_value2;
                  var cf_peroxide_bleach_c_change_cond2 = data.cf_peroxide_bleach_c_change_cond2;

                  var cf_peroxide_bleach_staining_cond1 = data.cf_peroxide_bleach_staining_cond1;
                  var cf_peroxide_bleach_staining_value1 = data.cf_peroxide_bleach_staining_value1;
                  var cf_peroxide_bleach_staining_value2 = data.cf_peroxide_bleach_staining_value2;
                  var cf_peroxide_bleach_staining_cond2 = data.cf_peroxide_bleach_staining_cond2;

                  var cross_staining_cond1 = data.cross_staining_cond1;
                  var cross_staining_value1 = data.cross_staining_value1;
                  var cross_staining_value2 = data.cross_staining_value2;
                  var cross_staining_cond2 = data.cross_staining_cond2;

                  // var cf_artificial_light_c_change_cond1 = data.cf_artificial_light_c_change_cond1;
                  // var cf_artificial_light_c_change_value1 = data.cf_artificial_light_c_change_value1;
                  // var cf_artificial_light_c_change_value2 = data.cf_artificial_light_c_change_value2;
                  // var cf_artificial_light_c_change_cond2 = data.cf_artificial_light_c_change_cond2;

                  var spirality_cond1 = data.spirality_cond1;
                  var spirality_value1 = data.spirality_value1;
                  var spirality_value2 = data.spirality_value2;
                  var spirality_cond2 = data.spirality_cond2;

                  var water_absorption_cond1 = data.water_absorption_cond1;
                  var water_absorption_value1 = data.water_absorption_value1;
                  var water_absorption_value2 = data.water_absorption_value2;
                  var water_absorption_cond2 = data.water_absorption_cond2;
                  var water_absorption_unit = data.water_absorption_unit;

                  var durable_press_cond1 = data.durable_press_cond1;
                  var durable_press_value1 = data.durable_press_value1;
                  var durable_press_value2 = data.durable_press_value2;
                  var durable_press_cond2 = data.durable_press_cond2;

                  var ironability_cond1 = data.ironability_cond1;
                  var ironability_value1 = data.ironability_value1;
                  var ironability_value2 = data.ironability_value2;
                  var ironability_cond2 = data.ironability_cond2;

                  var cf_artificial_light_cond1 = data.cf_artificial_light_cond1;
                  var cf_artificial_light_value1 = data.cf_artificial_light_value1;
                  var cf_artificial_light_value2 = data.cf_artificial_light_value2;
                  var cf_artificial_light_cond2 = data.cf_artificial_light_cond2;

                  var moisture_content_cond1 = data.moisture_content_cond1;
                  var moisture_content_value1 = data.moisture_content_value1;
                  var moisture_content_value2 = data.moisture_content_value2;
                  var moisture_content_cond2 = data.moisture_content_cond2;

                  var evaporation_rate_cond1 = data.evaporation_rate_cond1;
                  var evaporation_rate_value1 = data.evaporation_rate_value1;
                  var evaporation_rate_value2 = data.evaporation_rate_value2;
                  var evaporation_rate_cond2 = data.evaporation_rate_cond2;

                  var seam_slipage_resistance = data.seam_slipage_resistance;

                  var seam_resistance_method1_warp_cond1 = data.seam_resistance_method1_warp_cond1;
                  var seam_resistance_method1_warp_value1 = data.seam_resistance_method1_warp_value1;
                  var seam_resistance_method1_warp_value2 = data.seam_resistance_method1_warp_value2;
                  var seam_resistance_method1_warp_cond2 = data.seam_resistance_method1_warp_cond2;
                  var seam_resistance_method1_warp_unit = data.seam_resistance_method1_warp_unit;

                  //Seam Slipage Resistance weft
                  var seam_resistance_method1_weft_cond1 = data.seam_resistance_method1_weft_cond1;
                  var seam_resistance_method1_weft_value1 = data.seam_resistance_method1_weft_value1;
                  var seam_resistance_method1_weft_value2 = data.seam_resistance_method1_weft_value2;
                  var seam_resistance_method1_weft_cond2 = data.seam_resistance_method1_weft_cond2;
                  var seam_resistance_method1_weft_unit = data.seam_resistance_method1_weft_unit;

                  //Seam Slipage Resistance Warp (mm)
                  var seam_resistance_method2_warp_cond1 = data.seam_resistance_method2_warp_cond1;
                  var seam_resistance_method2_warp_value1 = data.seam_resistance_method2_warp_value1;
                  var seam_resistance_method2_warp_value2 = data.seam_resistance_method2_warp_value2;
                  var seam_resistance_method2_warp_cond2 = data.seam_resistance_method2_warp_cond2;
                  var seam_resistance_method2_warp_unit = data.seam_resistance_method2_warp_unit;

                  //Seam Slipage Resistance weft
                  var seam_resistance_method2_weft_cond1 = data.seam_resistance_method2_weft_cond1;
                  var seam_resistance_method2_weft_value1 = data.seam_resistance_method2_weft_value1;
                  var seam_resistance_method2_weft_value2 = data.seam_resistance_method2_weft_value2;
                  var seam_resistance_method2_weft_cond2 = data.seam_resistance_method2_weft_cond2;
                  var seam_resistance_method2_weft_unit = data.seam_resistance_method2_weft_unit;


                  var fiber_content_select = data.fiber_content_select;

                  var fiber_total_name_polyester = data.fiber_total_name_polyester;
                  var fiber_total_polyester_value2 = data.fiber_total_polyester_value2;
                  var fiber_total_polyester_value1 = data.fiber_total_polyester_value1;
                  var fiber_total_polyester_cond1 = data.fiber_total_polyester_cond1;
                  var fiber_total_polyester_cond2 = data.fiber_total_polyester_cond2;

                  var fiber_total_name_cotton = data.fiber_total_name_cotton;
                  var fiber_total_cotton_value2 = data.fiber_total_cotton_value2;
                  var fiber_total_cotton_value1 = data.fiber_total_cotton_value1;
                  var fiber_total_cotton_cond1 = data.fiber_total_cotton_cond1;
                  var fiber_total_cotton_cond2 = data.fiber_total_cotton_cond2;

                  var fiber_total_name_thired = data.fiber_total_name_thired;
                  var fiber_total_thired_value2 = data.fiber_total_thired_value2;
                  var fiber_total_thired_value1 = data.fiber_total_thired_value1;
                  var fiber_total_thired_cond1 = data.fiber_total_thired_cond1;
                  var fiber_total_thired_cond2 = data.fiber_total_thired_cond2;

                  var fiber_total_name_fourth = data.fiber_total_name_fourth;
                  var fiber_total_fourth_value2 = data.fiber_total_fourth_value2;
                  var fiber_total_fourth_value1 = data.fiber_total_fourth_value1;
                  var fiber_total_fourth_cond1 = data.fiber_total_fourth_cond1;
                  var fiber_total_fourth_cond2 = data.fiber_total_fourth_cond2;

                  var fiber_warp_name_polyester = data.fiber_warp_name_polyester;
                  var fiber_warp_polyester_value2 = data.fiber_warp_polyester_value2;
                  var fiber_warp_polyester_value1 = data.fiber_warp_polyester_value1;
                  var fiber_warp_polyester_cond1 = data.fiber_warp_polyester_cond1;
                  var fiber_warp_polyester_cond2 = data.fiber_warp_polyester_cond2;

                  var fiber_warp_name_cotton = data.fiber_warp_name_cotton;
                  var fiber_warp_cotton_value2 = data.fiber_warp_cotton_value2;
                  var fiber_warp_cotton_value1 = data.fiber_warp_cotton_value1;
                  var fiber_warp_cotton_cond1 = data.fiber_warp_cotton_cond1;
                  var fiber_warp_cotton_cond2 = data.fiber_warp_cotton_cond2;

                  var fiber_warp_name_thired = data.fiber_warp_name_thired;
                  var fiber_warp_thired_value2 = data.fiber_warp_thired_value2;
                  var fiber_warp_thired_value1 = data.fiber_warp_thired_value1;
                  var fiber_warp_thired_cond1 = data.fiber_warp_thired_cond1;
                  var fiber_warp_thired_cond2 = data.fiber_warp_thired_cond2;

                  var fiber_warp_name_fourth = data.fiber_warp_name_fourth;
                  var fiber_warp_fourth_value2 = data.fiber_warp_fourth_value2;
                  var fiber_warp_fourth_value1 = data.fiber_warp_fourth_value1;
                  var fiber_warp_fourth_cond1 = data.fiber_warp_fourth_cond1;
                  var fiber_warp_fourth_cond2 = data.fiber_warp_fourth_cond2;

                  var fiber_weft_name_polyester = data.fiber_weft_name_polyester;
                  var fiber_weft_polyester_value2 = data.fiber_weft_polyester_value2;
                  var fiber_weft_polyester_value1 = data.fiber_weft_polyester_value1;
                  var fiber_weft_polyester_cond1 = data.fiber_weft_polyester_cond1;
                  var fiber_weft_polyester_cond2 = data.fiber_weft_polyester_cond2;

                  var fiber_weft_name_cotton = data.fiber_weft_name_cotton;
                  var fiber_weft_cotton_value2 = data.fiber_weft_cotton_value2;
                  var fiber_weft_cotton_value1 = data.fiber_weft_cotton_value1;
                  var fiber_weft_cotton_cond1 = data.fiber_weft_cotton_cond1;
                  var fiber_weft_cotton_cond2 = data.fiber_weft_cotton_cond2;

                  var fiber_weft_name_thired = data.fiber_weft_name_thired;
                  var fiber_weft_thired_value2 = data.fiber_weft_thired_value2;
                  var fiber_weft_thired_value1 = data.fiber_weft_thired_value1;
                  var fiber_weft_thired_cond1 = data.fiber_weft_thired_cond1;
                  var fiber_weft_thired_cond2 = data.fiber_weft_thired_cond2;

                  var fiber_weft_name_fourth = data.fiber_weft_name_fourth;
                  var fiber_weft_fourth_value2 = data.fiber_weft_fourth_value2;
                  var fiber_weft_fourth_value1 = data.fiber_weft_fourth_value1;
                  var fiber_weft_fourth_cond1 = data.fiber_weft_fourth_cond1;
                  var fiber_weft_fourth_cond2 = data.fiber_weft_fourth_cond2;

                  $.ajax(
                  {
                      url: "multiple_copy_insert_into_finishing_database.php",
                      method: "POST",
                      data: 
                      {
                          pp_no_id: pp_no_id, 
                          pp_version: pp_version, 
                          pp_version_standard: pp_version_standard,
                          selection_of_multiple_pp_version_for_copy: selection_of_multiple_pp_version_for_copy,

                          cf_rubbing_dry_cond1 : cf_rubbing_dry_cond1,
                        cf_rubbing_dry_value1 : cf_rubbing_dry_value1,
                        cf_rubbing_dry_value2 : cf_rubbing_dry_value2,
                        cf_rubbing_dry_cond2 : cf_rubbing_dry_cond2,

                        cf_rubbing_wet_value1 : cf_rubbing_wet_value1,
                        cf_rubbing_wet_value2 : cf_rubbing_wet_value2,
                        cf_rubbing_wet_cond1 : cf_rubbing_wet_cond1,
                        cf_rubbing_wet_cond2 : cf_rubbing_wet_cond2,

                        wash_dry_warp_before_iron_cond1 : wash_dry_warp_before_iron_cond1,
                        wash_dry_warp_before_iron_value1 : wash_dry_warp_before_iron_value1,
                        wash_dry_warp_before_iron_value2 : wash_dry_warp_before_iron_value2,
                        wash_dry_warp_before_iron_cond2 : wash_dry_warp_before_iron_cond2,

                        wash_dry_weft_before_iron_cond1 : wash_dry_weft_before_iron_cond1,
                        wash_dry_weft_before_iron_value1 : wash_dry_weft_before_iron_value1,
                        wash_dry_weft_before_iron_value2 : wash_dry_weft_before_iron_value2,
                        wash_dry_weft_before_iron_cond2 : wash_dry_weft_before_iron_cond2,

                        wash_dry_warp_after_iron_value2 : wash_dry_warp_after_iron_value2,
                        wash_dry_warp_after_iron_value1 : wash_dry_warp_after_iron_value1,
                        wash_dry_warp_after_iron_cond1 : wash_dry_warp_after_iron_cond1,
                        wash_dry_warp_after_iron_cond2 : wash_dry_warp_after_iron_cond2,


                        wash_dry_weft_after_iron_cond1 : wash_dry_weft_after_iron_cond1,
                        wash_dry_weft_after_iron_value1 : wash_dry_weft_after_iron_value1,
                        wash_dry_weft_after_iron_value2 : wash_dry_weft_after_iron_value2,
                        wash_dry_weft_after_iron_cond2 : wash_dry_weft_after_iron_cond2,

                        dry_cleaning_warp_cond1 : dry_cleaning_warp_cond1,
                        dry_cleaning_warp_value1 : dry_cleaning_warp_value1,
                        dry_cleaning_warp_value2 : dry_cleaning_warp_value2,
                        dry_cleaning_warp_cond2 : dry_cleaning_warp_cond2,

                        dry_cleaning_weft_cond1 : dry_cleaning_weft_cond1,
                        dry_cleaning_weft_value1 : dry_cleaning_weft_value1,
                        dry_cleaning_weft_value2 : dry_cleaning_weft_value2,
                        dry_cleaning_weft_cond2 : dry_cleaning_weft_cond2,

                        yarn_count_warp_cond1 : yarn_count_warp_cond1,
                        yarn_count_warp_value1 : yarn_count_warp_value1,
                        yarn_count_warp_value2 : yarn_count_warp_value2,
                        yarn_count_warp_cond2 : yarn_count_warp_cond2,
                        yarn_count_warp_unit : yarn_count_warp_unit,

                        yarn_count_weft_cond1 : yarn_count_weft_cond1,
                        yarn_count_weft_value1 : yarn_count_weft_value1,
                        yarn_count_weft_value2 : yarn_count_weft_value2,
                        yarn_count_weft_cond2 : yarn_count_weft_cond2,
                        yarn_count_weft_unit : yarn_count_weft_unit,

                        number_thread_warp_cond1 : number_thread_warp_cond1,
                        number_thread_warp_value1 : number_thread_warp_value1,
                        number_thread_warp_value2 : number_thread_warp_value2,
                        number_thread_warp_cond2 : number_thread_warp_cond2,
                        number_thread_warp_unit : number_thread_warp_unit,

                        number_thread_weft_cond1 : number_thread_weft_cond1,
                        number_thread_weft_value1 : number_thread_weft_value1,
                        number_thread_weft_value2 : number_thread_weft_value2,
                        number_thread_weft_cond2 : number_thread_weft_cond2,
                        number_thread_weft_unit : number_thread_weft_unit,

                        mass_per_unit_per_area_cond1 : mass_per_unit_per_area_cond1,
                        mass_per_unit_per_area_value1 : mass_per_unit_per_area_value1,
                        mass_per_unit_per_area_value2 : mass_per_unit_per_area_value2,
                        mass_per_unit_per_area_cond2 : mass_per_unit_per_area_cond2,
                        mass_per_unit_per_area_unit : mass_per_unit_per_area_unit,

                        surface_pilling_cond1 : surface_pilling_cond1,
                        surface_pilling_value1 : surface_pilling_value1,
                        surface_pilling_value2 : surface_pilling_value2,
                        surface_pilling_cond2 : surface_pilling_cond2,

                        tensile_warp_cond1 : tensile_warp_cond1,
                        tensile_warp_value1 : tensile_warp_value1,
                        tensile_warp_value2 : tensile_warp_value2,
                        tensile_warp_cond2 : tensile_warp_cond2,
                        tensile_warp_unit : tensile_warp_unit,

                        tensile_weft_cond1 : tensile_weft_cond1,
                        tensile_weft_value1 : tensile_weft_value1,
                        tensile_weft_value2 : tensile_weft_value2,
                        tensile_weft_cond2 : tensile_weft_cond2,
                        tensile_weft_unit : tensile_weft_unit,

                        tear_force_warp_cond1 : tear_force_warp_cond1,
                        tear_force_warp_value1 : tear_force_warp_value1,
                        tear_force_warp_value2 : tear_force_warp_value2,
                        tear_force_warp_cond2 : tear_force_warp_cond2,
                        tear_force_warp_unit : tear_force_warp_unit,

                        tear_force_weft_cond1 : tear_force_weft_cond1,
                        tear_force_weft_value1 : tear_force_weft_value1,
                        tear_force_weft_value2 : tear_force_weft_value2,
                        tear_force_weft_cond2 : tear_force_weft_cond2,
                        tear_force_weft_unit : tear_force_weft_unit,

                        seam_strength_warp_cond1 : seam_strength_warp_cond1,
                        seam_strength_warp_value1 : seam_strength_warp_value1,
                        seam_strength_warp_value2 : seam_strength_warp_value2,
                        seam_strength_warp_cond2 : seam_strength_warp_cond2,
                        seam_strength_warp_unit : seam_strength_warp_unit,

                        seam_strength_weft_cond1 : seam_strength_weft_cond1,
                        seam_strength_weft_value1 : seam_strength_weft_value1,
                        seam_strength_weft_value2 : seam_strength_weft_value2,
                        seam_strength_weft_cond2 : seam_strength_weft_cond2,
                        seam_strength_weft_unit : seam_strength_weft_unit,

                        abrasion_resistance_cond1 : abrasion_resistance_cond1,
                        abrasion_resistance_value1 : abrasion_resistance_value1,
                        abrasion_resistance_value2 : abrasion_resistance_value2,
                        abrasion_resistance_cond2 : abrasion_resistance_cond2,

                        abrasion_resistance_lose_cond1 : abrasion_resistance_lose_cond1,
                        abrasion_resistance_lose_value1 : abrasion_resistance_lose_value1,
                        abrasion_resistance_lose_value2 : abrasion_resistance_lose_value2,
                        abrasion_resistance_lose_cond2 : abrasion_resistance_lose_cond2,

                        abrasion_resistance_thread_break : abrasion_resistance_thread_break,
                        print_durability : print_durability,
                        revolution : revolution,

                        washing_ph_cond1 : washing_ph_cond1,
                        washing_ph_value1 : washing_ph_value1,
                        washing_ph_value2 : washing_ph_value2,
                        washing_ph_cond2 : washing_ph_cond2,

                        formaldehyde_content_cond1 : formaldehyde_content_cond1,
                        formaldehyde_content_value1 : formaldehyde_content_value1,
                        formaldehyde_content_value2 : formaldehyde_content_value2,
                        formaldehyde_content_cond2 : formaldehyde_content_cond2,
                        formaldehyde_content_unit : formaldehyde_content_unit,

                        cf_dry_cleaning_c_change_cond1 : cf_dry_cleaning_c_change_cond1,
                        cf_dry_cleaning_c_change_value1 : cf_dry_cleaning_c_change_value1,
                        cf_dry_cleaning_c_change_value2 : cf_dry_cleaning_c_change_value2,
                        cf_dry_cleaning_c_change_cond2 : cf_dry_cleaning_c_change_cond2,

                        cf_dry_cleaning_staining_cond1 : cf_dry_cleaning_staining_cond1,
                        cf_dry_cleaning_staining_value1 : cf_dry_cleaning_staining_value1,
                        cf_dry_cleaning_staining_value2 : cf_dry_cleaning_staining_value2,
                        cf_dry_cleaning_staining_cond2 : cf_dry_cleaning_staining_cond2,

                        cf_washing_c_change_cond1 : cf_washing_c_change_cond1,
                        cf_washing_c_change_value1 : cf_washing_c_change_value1,
                        cf_washing_c_change_value2 : cf_washing_c_change_value2,
                        cf_washing_c_change_cond2 : cf_washing_c_change_cond2,

                        cf_washing_staining_cond1 : cf_washing_staining_cond1,
                        cf_washing_staining_value1 : cf_washing_staining_value1,
                        cf_washing_staining_value2 : cf_washing_staining_value2,
                        cf_washing_staining_cond2 : cf_washing_staining_cond2,

                        cf_perspiration_acis_c_change_cond1 : cf_perspiration_acis_c_change_cond1,
                        cf_perspiration_acis_c_change_value1 : cf_perspiration_acis_c_change_value1,
                        cf_perspiration_acis_c_change_value2 : cf_perspiration_acis_c_change_value2,
                        cf_perspiration_acis_c_change_cond2 : cf_perspiration_acis_c_change_cond2,

                        cf_perspiration_acis_staining_cond1 : cf_perspiration_acis_staining_cond1,
                        cf_perspiration_acis_staining_value1 : cf_perspiration_acis_staining_value1,
                        cf_perspiration_acis_staining_value2 : cf_perspiration_acis_staining_value2,
                        cf_perspiration_acis_staining_cond2 : cf_perspiration_acis_staining_cond2,

                        cf_perspiration_alkali_c_change_cond1 : cf_perspiration_alkali_c_change_cond1,
                        cf_perspiration_alkali_c_change_value1 : cf_perspiration_alkali_c_change_value1,
                        cf_perspiration_alkali_c_change_value2 : cf_perspiration_alkali_c_change_value2,
                        cf_perspiration_alkali_c_change_cond2 : cf_perspiration_alkali_c_change_cond2,

                        cf_perspiration_alkali_staining_cond1 : cf_perspiration_alkali_staining_cond1,
                        cf_perspiration_alkali_staining_value1 : cf_perspiration_alkali_staining_value1,
                        cf_perspiration_alkali_staining_value2 : cf_perspiration_alkali_staining_value2,
                        cf_perspiration_alkali_staining_cond2 : cf_perspiration_alkali_staining_cond2,

                        cf_water_c_change_cond1 : cf_water_c_change_cond1,
                        cf_water_c_change_value1 : cf_water_c_change_value1,
                        cf_water_c_change_value2 : cf_water_c_change_value2,
                        cf_water_c_change_cond2 : cf_water_c_change_cond2,

                        cf_water_staining_cond1 : cf_water_staining_cond1,
                        cf_water_staining_value1 : cf_water_staining_value1,
                        cf_water_staining_value2 : cf_water_staining_value2,
                        cf_water_staining_cond2 : cf_water_staining_cond2,

                        cf_water_sotting_staining_cond1 : cf_water_sotting_staining_cond1,
                        cf_water_sotting_staining_value1 : cf_water_sotting_staining_value1,
                        cf_water_sotting_staining_value2 : cf_water_sotting_staining_value2,
                        cf_water_sotting_staining_cond2 : cf_water_sotting_staining_cond2,

                        cf_water_wetting_staining_cond1 : cf_water_wetting_staining_cond1,
                        cf_water_wetting_staining_value1 : cf_water_wetting_staining_value1,
                        cf_water_wetting_staining_value2 : cf_water_wetting_staining_value2,
                        cf_water_wetting_staining_cond2 : cf_water_wetting_staining_cond2,

                        cf_hyd_reactive_dyes_c_change_cond1 : cf_hyd_reactive_dyes_c_change_cond1,
                        cf_hyd_reactive_dyes_c_change_value1 : cf_hyd_reactive_dyes_c_change_value1,
                        cf_hyd_reactive_dyes_c_change_value2 : cf_hyd_reactive_dyes_c_change_value2,
                        cf_hyd_reactive_dyes_c_change_cond2 : cf_hyd_reactive_dyes_c_change_cond2,

                        cf_hyd_reactive_dyes_staining_cond1 : cf_hyd_reactive_dyes_staining_cond1,
                        cf_hyd_reactive_dyes_staining_value1 : cf_hyd_reactive_dyes_staining_value1,
                        cf_hyd_reactive_dyes_staining_value2 : cf_hyd_reactive_dyes_staining_value2,
                        cf_hyd_reactive_dyes_staining_cond2 : cf_hyd_reactive_dyes_staining_cond2,

                        cf_oidative_damage_c_change_cond1 : cf_oidative_damage_c_change_cond1,
                        cf_oidative_damage_c_change_value1 : cf_oidative_damage_c_change_value1,
                        cf_oidative_damage_c_change_value2 : cf_oidative_damage_c_change_value2,
                        cf_oidative_damage_c_change_cond2 : cf_oidative_damage_c_change_cond2,

                        cf_phenolic_staining_cond1 : cf_phenolic_staining_cond1,
                        cf_phenolic_staining_value1 : cf_phenolic_staining_value1,
                        cf_phenolic_staining_value2 : cf_phenolic_staining_value2,
                        cf_phenolic_staining_cond2 : cf_phenolic_staining_cond2,

                        cf_pvc_migration_staining_cond1 : cf_pvc_migration_staining_cond1,
                        cf_pvc_migration_staining_value1 : cf_pvc_migration_staining_value1,
                        cf_pvc_migration_staining_value2 : cf_pvc_migration_staining_value2,
                        cf_pvc_migration_staining_cond2 : cf_pvc_migration_staining_cond2,

                        cf_saliva_c_change_cond1 : cf_saliva_c_change_cond1,
                        cf_saliva_c_change_value1 : cf_saliva_c_change_value1,
                        cf_saliva_c_change_value2 : cf_saliva_c_change_value2,
                        cf_saliva_c_change_cond2 : cf_saliva_c_change_cond2,

                        cf_saliva_staining_cond1 : cf_saliva_staining_cond1,
                        cf_saliva_staining_value1 : cf_saliva_staining_value1,
                        cf_saliva_staining_value2 : cf_saliva_staining_value2,
                        cf_saliva_staining_cond2 : cf_saliva_staining_cond2,

                        cf_chlorinated_water_c_change_cond1 : cf_chlorinated_water_c_change_cond1,
                        cf_chlorinated_water_c_change_value1 : cf_chlorinated_water_c_change_value1,
                        cf_chlorinated_water_c_change_value2 : cf_chlorinated_water_c_change_value2,
                        cf_chlorinated_water_c_change_cond2 : cf_chlorinated_water_c_change_cond2,

                        cf_chlorinated_water_staining_cond1 : cf_chlorinated_water_staining_cond1,
                        cf_chlorinated_water_staining_value1 : cf_chlorinated_water_staining_value1,
                        cf_chlorinated_water_staining_value2 : cf_chlorinated_water_staining_value2,
                        cf_chlorinated_water_staining_cond2 : cf_chlorinated_water_staining_cond2,

                        cf_cholorine_bleach_c_change_cond1 : cf_cholorine_bleach_c_change_cond1,
                        cf_cholorine_bleach_c_change_value1 : cf_cholorine_bleach_c_change_value1,
                        cf_cholorine_bleach_c_change_value2 : cf_cholorine_bleach_c_change_value2,
                        cf_cholorine_bleach_c_change_cond2 : cf_cholorine_bleach_c_change_cond2,

                        cf_cholorine_bleach_staining_cond1 : cf_cholorine_bleach_staining_cond1,
                        cf_cholorine_bleach_staining_value1 : cf_cholorine_bleach_staining_value1,
                        cf_cholorine_bleach_staining_value2 : cf_cholorine_bleach_staining_value2,
                        cf_cholorine_bleach_staining_cond2 : cf_cholorine_bleach_staining_cond2,

                        cf_peroxide_bleach_c_change_cond1 : cf_peroxide_bleach_c_change_cond1,
                        cf_peroxide_bleach_c_change_value1 : cf_peroxide_bleach_c_change_value1,
                        cf_peroxide_bleach_c_change_value2 : cf_peroxide_bleach_c_change_value2,
                        cf_peroxide_bleach_c_change_cond2 : cf_peroxide_bleach_c_change_cond2,

                        cf_peroxide_bleach_staining_cond1 : cf_peroxide_bleach_staining_cond1,
                        cf_peroxide_bleach_staining_value1 : cf_peroxide_bleach_staining_value1,
                        cf_peroxide_bleach_staining_value2 : cf_peroxide_bleach_staining_value2,
                        cf_peroxide_bleach_staining_cond2 : cf_peroxide_bleach_staining_cond2,

                        cross_staining_cond1 : cross_staining_cond1,
                        cross_staining_value1 : cross_staining_value1,
                        cross_staining_value2 : cross_staining_value2,
                        cross_staining_cond2 : cross_staining_cond2,

                        // cf_artificial_light_c_change_cond1 : cf_artificial_light_c_change_cond1,
                        // cf_artificial_light_c_change_value1 : cf_artificial_light_c_change_value1,
                        // cf_artificial_light_c_change_value2 : cf_artificial_light_c_change_value2,
                        // cf_artificial_light_c_change_cond2 : cf_artificial_light_c_change_cond2,

                        spirality_cond1 : spirality_cond1,
                        spirality_value1 : spirality_value1,
                        spirality_value2 : spirality_value2,
                        spirality_cond2 : spirality_cond2,

                        water_absorption_cond1 : water_absorption_cond1,
                        water_absorption_value1 : water_absorption_value1,
                        water_absorption_value2 : water_absorption_value2,
                        water_absorption_cond2 : water_absorption_cond2,
                        water_absorption_unit : water_absorption_unit,

                        durable_press_cond1 : durable_press_cond1,
                        durable_press_value1 : durable_press_value1,
                        durable_press_value2 : durable_press_value2,
                        durable_press_cond2 : durable_press_cond2,

                        ironability_cond1 : ironability_cond1,
                        ironability_value1 : ironability_value1,
                        ironability_value2 : ironability_value2,
                        ironability_cond2 : ironability_cond2,

                        cf_artificial_light_cond1 : cf_artificial_light_cond1,
                        cf_artificial_light_value1 : cf_artificial_light_value1,
                        cf_artificial_light_value2 : cf_artificial_light_value2,
                        cf_artificial_light_cond2 : cf_artificial_light_cond2,

                        moisture_content_cond1 : moisture_content_cond1,
                        moisture_content_value1 : moisture_content_value1,
                        moisture_content_value2 : moisture_content_value2,
                        moisture_content_cond2 : moisture_content_cond2,

                        evaporation_rate_cond1 : evaporation_rate_cond1,
                        evaporation_rate_value1 : evaporation_rate_value1,
                        evaporation_rate_value2 : evaporation_rate_value2,
                        evaporation_rate_cond2 : evaporation_rate_cond2,

                        seam_slipage_resistance : seam_slipage_resistance,

                        seam_resistance_method1_warp_cond1 : seam_resistance_method1_warp_cond1,
                        seam_resistance_method1_warp_value1 : seam_resistance_method1_warp_value1,
                        seam_resistance_method1_warp_value2 : seam_resistance_method1_warp_value2,
                        seam_resistance_method1_warp_cond2 : seam_resistance_method1_warp_cond2,
                        seam_resistance_method1_warp_unit : seam_resistance_method1_warp_unit,

                        //Seam Slipage Resistance weft
                        seam_resistance_method1_weft_cond1 : seam_resistance_method1_weft_cond1,
                        seam_resistance_method1_weft_value1 : seam_resistance_method1_weft_value1,
                        seam_resistance_method1_weft_value2 : seam_resistance_method1_weft_value2,
                        seam_resistance_method1_weft_cond2 : seam_resistance_method1_weft_cond2,
                        seam_resistance_method1_weft_unit : seam_resistance_method1_weft_unit,

                        //Seam Slipage Resistance Warp (mm)
                        seam_resistance_method2_warp_cond1 : seam_resistance_method2_warp_cond1,
                        seam_resistance_method2_warp_value1 : seam_resistance_method2_warp_value1,
                        seam_resistance_method2_warp_value2 : seam_resistance_method2_warp_value2,
                        seam_resistance_method2_warp_cond2 : seam_resistance_method2_warp_cond2,
                        seam_resistance_method2_warp_unit : seam_resistance_method2_warp_unit,

                        //Seam Slipage Resistance weft
                        seam_resistance_method2_weft_cond1 : seam_resistance_method2_weft_cond1,
                        seam_resistance_method2_weft_value1 : seam_resistance_method2_weft_value1,
                        seam_resistance_method2_weft_value2 : seam_resistance_method2_weft_value2,
                        seam_resistance_method2_weft_cond2 : seam_resistance_method2_weft_cond2,
                        seam_resistance_method2_weft_unit : seam_resistance_method2_weft_unit,

                        fiber_content_select: fiber_content_select,

                        fiber_total_name_polyester: fiber_total_name_polyester,
                        fiber_total_polyester_cond1: fiber_total_polyester_cond1,
                        fiber_total_polyester_cond2: fiber_total_polyester_cond2,
                        fiber_total_polyester_value2: fiber_total_polyester_value2,
                        fiber_total_polyester_value1: fiber_total_polyester_value1,

                        fiber_total_name_cotton: fiber_total_name_cotton,
                        fiber_total_cotton_cond1: fiber_total_cotton_cond1,
                        fiber_total_cotton_cond2: fiber_total_cotton_cond2,
                        fiber_total_cotton_value2: fiber_total_cotton_value2,
                        fiber_total_cotton_value1: fiber_total_cotton_value1,

                        fiber_total_name_thired: fiber_total_name_thired,
                        fiber_total_thired_cond1: fiber_total_thired_cond1,
                        fiber_total_thired_cond2: fiber_total_thired_cond2,
                        fiber_total_thired_value2: fiber_total_thired_value2,
                        fiber_total_thired_value1: fiber_total_thired_value1,

                        fiber_total_name_fourth: fiber_total_name_fourth,
                        fiber_total_fourth_cond1: fiber_total_fourth_cond1,
                        fiber_total_fourth_cond2: fiber_total_fourth_cond2,
                        fiber_total_fourth_value2: fiber_total_fourth_value2,
                        fiber_total_fourth_value1: fiber_total_fourth_value1,

                        fiber_warp_name_polyester: fiber_warp_name_polyester,
                        fiber_warp_polyester_cond1: fiber_warp_polyester_cond1,
                        fiber_warp_polyester_cond2: fiber_warp_polyester_cond2,
                        fiber_warp_polyester_value2: fiber_warp_polyester_value2,
                        fiber_warp_polyester_value1: fiber_warp_polyester_value1,

                        fiber_warp_name_cotton: fiber_warp_name_cotton,
                        fiber_warp_cotton_cond1: fiber_warp_cotton_cond1,
                        fiber_warp_cotton_cond2: fiber_warp_cotton_cond2,
                        fiber_warp_cotton_value2: fiber_warp_cotton_value2,
                        fiber_warp_cotton_value1: fiber_warp_cotton_value1,

                        fiber_warp_name_thired: fiber_warp_name_thired,
                        fiber_warp_thired_cond1: fiber_warp_thired_cond1,
                        fiber_warp_thired_cond2: fiber_warp_thired_cond2,
                        fiber_warp_thired_value2: fiber_warp_thired_value2,
                        fiber_warp_thired_value1: fiber_warp_thired_value1,

                        fiber_warp_name_fourth: fiber_warp_name_fourth,
                        fiber_warp_fourth_cond1: fiber_warp_fourth_cond1,
                        fiber_warp_fourth_cond2: fiber_warp_fourth_cond2,
                        fiber_warp_fourth_value2: fiber_warp_fourth_value2,
                        fiber_warp_fourth_value1: fiber_warp_fourth_value1,

                        fiber_weft_name_polyester: fiber_weft_name_polyester,
                        fiber_weft_polyester_cond1: fiber_weft_polyester_cond1,
                        fiber_weft_polyester_cond2: fiber_weft_polyester_cond2,
                        fiber_weft_polyester_value2: fiber_weft_polyester_value2,
                        fiber_weft_polyester_value1: fiber_weft_polyester_value1,

                        fiber_weft_name_cotton: fiber_weft_name_cotton,
                        fiber_weft_cotton_cond1: fiber_weft_cotton_cond1,
                        fiber_weft_cotton_cond2: fiber_weft_cotton_cond2,
                        fiber_weft_cotton_value2: fiber_weft_cotton_value2,
                        fiber_weft_cotton_value1: fiber_weft_cotton_value1,

                        fiber_weft_name_thired: fiber_weft_name_thired,
                        fiber_weft_thired_cond1: fiber_weft_thired_cond1,
                        fiber_weft_thired_cond2: fiber_weft_thired_cond2,
                        fiber_weft_thired_value2: fiber_weft_thired_value2,
                        fiber_weft_thired_value1: fiber_weft_thired_value1,

                        fiber_weft_name_fourth: fiber_weft_name_fourth,
                        fiber_weft_fourth_cond1: fiber_weft_fourth_cond1,
                        fiber_weft_fourth_cond2: fiber_weft_fourth_cond2,
                        fiber_weft_fourth_value2: fiber_weft_fourth_value2,
                        fiber_weft_fourth_value1: fiber_weft_fourth_value1

                      },
                      success:function(new_data)
                      {
                          //after copy then first submit change data
                          $.ajax(
                          {
                              type: "POST",
                              url: "define_view_standards.php",
                              method: "POST",
                              data: 
                              {
                                pp_no_id: pp_no_id, 
                                pp_version: pp_version,
                                pp_version_standard: pp_version_standard
                              },
                              success:function(data)
                              {
                                  $('#retrieve_general_data').html(data);
                                  $('select#pp_version_standard_model').val(pp_version_standard);
                                  $('#others_retrieve_general_data').html("");
                              }
                          });
                          //and then after submit button next the change occure
                          view_standard_select(pp_version_standard);
                      }
                  });
                   
              }

          });
      }

      else if (pp_version_standard == 10)
      {
          $.ajax(
          {
              type: "POST",
              url: "scouring_bleaching_issunce_copy.php",
              method: "POST",
              dataType:"JSON",
              data: 
              {
                scouring_bleaching_standard_id: standard_id
              },
              success:function(data)
              {
                  $('#others_retrieve_general_data').html("");

                  var absorbency_cond1 = data.absorbency_cond1;
                  var absorbency_value1 = data.absorbency_value1;
                  var absorbency_value2 = data.absorbency_value2;
                  var absorbency_cond2 = data.absorbency_cond2;

                  var sizing_cond1 = data.sizing_cond1;
                  var sizing_value1 = data.sizing_value1;
                  var sizing_value2 = data.sizing_value2;
                  var sizing_cond2 = data.sizing_cond2;

                  var whiteness_cond1 = data.whiteness_cond1;
                  var whiteness_value1 = data.whiteness_value1;
                  var whiteness_value2 = data.whiteness_value2;
                  var whiteness_cond2 = data.whiteness_cond2;

                  var pilling_cond1 = data.pilling_cond1;
                  var pilling_value1 = data.pilling_value1;
                  var pilling_value2 = data.pilling_value2;
                  var pilling_cond2 = data.pilling_cond2;

                  var ph_cond1 = data.ph_cond1;
                  var ph_value1 = data.ph_value1;
                  var ph_value2 = data.ph_value2;
                  var ph_cond2 = data.ph_cond2;

                  $.ajax(
                  {
                      url: "multiple_copy_insert_into_scouring_bleaching_database.php",
                      method: "POST",
                      data: {
                        pp_no_id: pp_no_id, 
                        pp_version: pp_version, 
                        pp_version_standard: pp_version_standard,
                        selection_of_multiple_pp_version_for_copy: selection_of_multiple_pp_version_for_copy,

                        absorbency_cond1: absorbency_cond1,
                        absorbency_value1: absorbency_value1,
                        absorbency_value2: absorbency_value2,
                        absorbency_cond2: absorbency_cond2,

                        sizing_cond1: sizing_cond1,
                        sizing_value1: sizing_value1,
                        sizing_value2: sizing_value2,
                        sizing_cond2: sizing_cond2,

                        whiteness_cond1: whiteness_cond1,
                        whiteness_value1: whiteness_value1,
                        whiteness_value2: whiteness_value2,
                        whiteness_cond2: whiteness_cond2,

                        pilling_cond1: pilling_cond1,
                        pilling_value1: pilling_value1,
                        pilling_value2: pilling_value2,
                        pilling_cond2: pilling_cond2,

                        ph_cond1: ph_cond1,
                        ph_value1: ph_value1,
                        ph_value2: ph_value2,
                        ph_cond2: ph_cond2

                      },
                      success:function(new_data)
                      {
                          //after copy then first submit change data
                          $.ajax(
                          {
                              type: "POST",
                              url: "define_view_standards.php",
                              method: "POST",
                              data: 
                              {
                                pp_no_id: pp_no_id, 
                                pp_version: pp_version,
                                pp_version_standard: pp_version_standard
                              },
                              success:function(data)
                              {
                                  $('#retrieve_general_data').html(data);
                                  $('select#pp_version_standard_model').val(pp_version_standard);
                                  $('#others_retrieve_general_data').html("");
                              }
                          });
                          //and then after submit button next the change occure
                          view_standard_select(pp_version_standard);
                      }
                  });
                   
              }
          });
      }

      else if (pp_version_standard == 11)
      {
          $.ajax(
          {
              type: "POST",
              url: "scouring_issunce_copy.php",
              method: "POST",
              dataType:"JSON",
              data: 
              {
                scouring_standard_id: standard_id
              },
              success:function(data)
              {
                  $('#others_retrieve_general_data').html("");

                  var absorbency_cond1 = data.absorbency_cond1;
                  var absorbency_value1 = data.absorbency_value1;
                  var absorbency_value2 = data.absorbency_value2;
                  var absorbency_cond2 = data.absorbency_cond2;

                  var sizing_cond1 = data.sizing_cond1;
                  var sizing_value1 = data.sizing_value1;
                  var sizing_value2 = data.sizing_value2;
                  var sizing_cond2 = data.sizing_cond2;

                  var pilling_cond1 = data.pilling_cond1;
                  var pilling_value1 = data.pilling_value1;
                  var pilling_value2 = data.pilling_value2;
                  var pilling_cond2 = data.pilling_cond2;

                  var ph_cond1 = data.ph_cond1;
                  var ph_value1 = data.ph_value1;
                  var ph_value2 = data.ph_value2;
                  var ph_cond2 = data.ph_cond2;

                  $.ajax(
                  {
                      url: "multiple_copy_insert_into_scouring_database.php",
                      method: "POST",
                      data: {
                        pp_no_id: pp_no_id, 
                        pp_version: pp_version, 
                        pp_version_standard: pp_version_standard,
                        selection_of_multiple_pp_version_for_copy: selection_of_multiple_pp_version_for_copy,

                        absorbency_cond1: absorbency_cond1,
                        absorbency_value1: absorbency_value1,
                        absorbency_value2: absorbency_value2,
                        absorbency_cond2: absorbency_cond2,

                        sizing_cond1: sizing_cond1,
                        sizing_value1: sizing_value1,
                        sizing_value2: sizing_value2,
                        sizing_cond2: sizing_cond2,

                        pilling_cond1: pilling_cond1,
                        pilling_value1: pilling_value1,
                        pilling_value2: pilling_value2,
                        pilling_cond2: pilling_cond2,

                        ph_cond1: ph_cond1,
                        ph_value1: ph_value1,
                        ph_value2: ph_value2,
                        ph_cond2: ph_cond2

                      },
                      success:function(new_data)
                      {
                          //after copy then first submit change data
                          $.ajax(
                          {
                              type: "POST",
                              url: "define_view_standards.php",
                              method: "POST",
                              data: 
                              {
                                pp_no_id: pp_no_id, 
                                pp_version: pp_version,
                                pp_version_standard: pp_version_standard
                              },
                              success:function(data)
                              {
                                  $('#retrieve_general_data').html(data);
                                  $('select#pp_version_standard_model').val(pp_version_standard);
                                  $('#others_retrieve_general_data').html("");
                              }
                          });
                          //and then after submit button next the change occure
                          view_standard_select(pp_version_standard);
                      }
                  });
                   
              }
          });
      }

      else if (pp_version_standard == 12)
      {
          $.ajax(
          {
              type: "POST",
              url: "washing_issunce_copy.php",
              method: "POST",
              dataType:"JSON",
              data: 
              {
                washing_standard_id: standard_id
              },
              success:function(data)
              {
                  $('#others_retrieve_general_data').html("");

                  var cf_rubbing_dry_cond1 = data.cf_rubbing_dry_cond1;
                  var cf_rubbing_dry_value1 = data.cf_rubbing_dry_value1;
                  var cf_rubbing_dry_value2 = data.cf_rubbing_dry_value2;
                  var cf_rubbing_dry_cond2 = data.cf_rubbing_dry_cond2;

                  var cf_rubbing_wet_value1 = data.cf_rubbing_wet_value1;
                  var cf_rubbing_wet_value2 = data.cf_rubbing_wet_value2;
                  var cf_rubbing_wet_cond1 = data.cf_rubbing_wet_cond1;
                  var cf_rubbing_wet_cond2 = data.cf_rubbing_wet_cond2;

                  var washing_ph_cond1 = data.washing_ph_cond1;
                  var washing_ph_value1 = data.washing_ph_value1;
                  var washing_ph_value2 = data.washing_ph_value2;
                  var washing_ph_cond2 = data.washing_ph_cond2;

                  var cf_dry_cleaning_c_change_cond1 = data.cf_dry_cleaning_c_change_cond1;
                  var cf_dry_cleaning_c_change_value1 = data.cf_dry_cleaning_c_change_value1;
                  var cf_dry_cleaning_c_change_value2 = data.cf_dry_cleaning_c_change_value2;
                  var cf_dry_cleaning_c_change_cond2 = data.cf_dry_cleaning_c_change_cond2;

                  var cf_dry_cleaning_staining_cond1 = data.cf_dry_cleaning_staining_cond1;
                  var cf_dry_cleaning_staining_value1 = data.cf_dry_cleaning_staining_value1;
                  var cf_dry_cleaning_staining_value2 = data.cf_dry_cleaning_staining_value2;
                  var cf_dry_cleaning_staining_cond2 = data.cf_dry_cleaning_staining_cond2;

                  var cf_washing_c_change_cond1 = data.cf_washing_c_change_cond1;
                  var cf_washing_c_change_value1 = data.cf_washing_c_change_value1;
                  var cf_washing_c_change_value2 = data.cf_washing_c_change_value2;
                  var cf_washing_c_change_cond2 = data.cf_washing_c_change_cond2;

                  var cf_washing_staining_cond1 = data.cf_washing_staining_cond1;
                  var cf_washing_staining_value1 = data.cf_washing_staining_value1;
                  var cf_washing_staining_value2 = data.cf_washing_staining_value2;
                  var cf_washing_staining_cond2 = data.cf_washing_staining_cond2;

                  var cf_perspiration_acis_c_change_cond1 = data.cf_perspiration_acis_c_change_cond1;
                  var cf_perspiration_acis_c_change_value1 = data.cf_perspiration_acis_c_change_value1;
                  var cf_perspiration_acis_c_change_value2 = data.cf_perspiration_acis_c_change_value2;
                  var cf_perspiration_acis_c_change_cond2 = data.cf_perspiration_acis_c_change_cond2;

                  var cf_perspiration_acis_staining_cond1 = data.cf_perspiration_acis_staining_cond1;
                  var cf_perspiration_acis_staining_value1 = data.cf_perspiration_acis_staining_value1;
                  var cf_perspiration_acis_staining_value2 = data.cf_perspiration_acis_staining_value2;
                  var cf_perspiration_acis_staining_cond2 = data.cf_perspiration_acis_staining_cond2;

                  var cf_perspiration_alkali_c_change_cond1 = data.cf_perspiration_alkali_c_change_cond1;
                  var cf_perspiration_alkali_c_change_value1 = data.cf_perspiration_alkali_c_change_value1;
                  var cf_perspiration_alkali_c_change_value2 = data.cf_perspiration_alkali_c_change_value2;
                  var cf_perspiration_alkali_c_change_cond2 = data.cf_perspiration_alkali_c_change_cond2;

                  var cf_perspiration_alkali_staining_cond1 = data.cf_perspiration_alkali_staining_cond1;
                  var cf_perspiration_alkali_staining_value1 = data.cf_perspiration_alkali_staining_value1;
                  var cf_perspiration_alkali_staining_value2 = data.cf_perspiration_alkali_staining_value2;
                  var cf_perspiration_alkali_staining_cond2 = data.cf_perspiration_alkali_staining_cond2;

                  var cf_water_c_change_cond1 = data.cf_water_c_change_cond1;
                  var cf_water_c_change_value1 = data.cf_water_c_change_value1;
                  var cf_water_c_change_value2 = data.cf_water_c_change_value2;
                  var cf_water_c_change_cond2 = data.cf_water_c_change_cond2;

                  var cf_water_staining_cond1 = data.cf_water_staining_cond1;
                  var cf_water_staining_value1 = data.cf_water_staining_value1;
                  var cf_water_staining_value2 = data.cf_water_staining_value2;
                  var cf_water_staining_cond2 = data.cf_water_staining_cond2;

                  var cf_water_sotting_staining_cond1 = data.cf_water_sotting_staining_cond1;
                  var cf_water_sotting_staining_value1 = data.cf_water_sotting_staining_value1;
                  var cf_water_sotting_staining_value2 = data.cf_water_sotting_staining_value2;
                  var cf_water_sotting_staining_cond2 = data.cf_water_sotting_staining_cond2;

                  var cf_water_wetting_staining_cond1 = data.cf_water_wetting_staining_cond1;
                  var cf_water_wetting_staining_value1 = data.cf_water_wetting_staining_value1;
                  var cf_water_wetting_staining_value2 = data.cf_water_wetting_staining_value2;
                  var cf_water_wetting_staining_cond2 = data.cf_water_wetting_staining_cond2;

                  var cf_hyd_reactive_dyes_c_change_cond1 = data.cf_hyd_reactive_dyes_c_change_cond1;
                  var cf_hyd_reactive_dyes_c_change_value1 = data.cf_hyd_reactive_dyes_c_change_value1;
                  var cf_hyd_reactive_dyes_c_change_value2 = data.cf_hyd_reactive_dyes_c_change_value2;
                  var cf_hyd_reactive_dyes_c_change_cond2 = data.cf_hyd_reactive_dyes_c_change_cond2;

                  var cf_hyd_reactive_dyes_staining_cond1 = data.cf_hyd_reactive_dyes_staining_cond1;
                  var cf_hyd_reactive_dyes_staining_value1 = data.cf_hyd_reactive_dyes_staining_value1;
                  var cf_hyd_reactive_dyes_staining_value2 = data.cf_hyd_reactive_dyes_staining_value2;
                  var cf_hyd_reactive_dyes_staining_cond2 = data.cf_hyd_reactive_dyes_staining_cond2;

                  var cf_oidative_damage_c_change_cond1 = data.cf_oidative_damage_c_change_cond1;
                  var cf_oidative_damage_c_change_value1 = data.cf_oidative_damage_c_change_value1;
                  var cf_oidative_damage_c_change_value2 = data.cf_oidative_damage_c_change_value2;
                  var cf_oidative_damage_c_change_cond2 = data.cf_oidative_damage_c_change_cond2;

                  var cf_phenolic_staining_cond1 = data.cf_phenolic_staining_cond1;
                  var cf_phenolic_staining_value1 = data.cf_phenolic_staining_value1;
                  var cf_phenolic_staining_value2 = data.cf_phenolic_staining_value2;
                  var cf_phenolic_staining_cond2 = data.cf_phenolic_staining_cond2;

                  var cf_pvc_migration_staining_cond1 = data.cf_pvc_migration_staining_cond1;
                  var cf_pvc_migration_staining_value1 = data.cf_pvc_migration_staining_value1;
                  var cf_pvc_migration_staining_value2 = data.cf_pvc_migration_staining_value2;
                  var cf_pvc_migration_staining_cond2 = data.cf_pvc_migration_staining_cond2;

                  var cf_saliva_c_change_cond1 = data.cf_saliva_c_change_cond1;
                  var cf_saliva_c_change_value1 = data.cf_saliva_c_change_value1;
                  var cf_saliva_c_change_value2 = data.cf_saliva_c_change_value2;
                  var cf_saliva_c_change_cond2 = data.cf_saliva_c_change_cond2;

                  var cf_saliva_staining_cond1 = data.cf_saliva_staining_cond1;
                  var cf_saliva_staining_value1 = data.cf_saliva_staining_value1;
                  var cf_saliva_staining_value2 = data.cf_saliva_staining_value2;
                  var cf_saliva_staining_cond2 = data.cf_saliva_staining_cond2;

                  var cf_chlorinated_water_c_change_cond1 = data.cf_chlorinated_water_c_change_cond1;
                  var cf_chlorinated_water_c_change_value1 = data.cf_chlorinated_water_c_change_value1;
                  var cf_chlorinated_water_c_change_value2 = data.cf_chlorinated_water_c_change_value2;
                  var cf_chlorinated_water_c_change_cond2 = data.cf_chlorinated_water_c_change_cond2;

                  var cf_chlorinated_water_staining_cond1 = data.cf_chlorinated_water_staining_cond1;
                  var cf_chlorinated_water_staining_value1 = data.cf_chlorinated_water_staining_value1;
                  var cf_chlorinated_water_staining_value2 = data.cf_chlorinated_water_staining_value2;
                  var cf_chlorinated_water_staining_cond2 = data.cf_chlorinated_water_staining_cond2;

                  var cf_cholorine_bleach_c_change_cond1 = data.cf_cholorine_bleach_c_change_cond1;
                  var cf_cholorine_bleach_c_change_value1 = data.cf_cholorine_bleach_c_change_value1;
                  var cf_cholorine_bleach_c_change_value2 = data.cf_cholorine_bleach_c_change_value2;
                  var cf_cholorine_bleach_c_change_cond2 = data.cf_cholorine_bleach_c_change_cond2;

                  var cf_cholorine_bleach_staining_cond1 = data.cf_cholorine_bleach_staining_cond1;
                  var cf_cholorine_bleach_staining_value1 = data.cf_cholorine_bleach_staining_value1;
                  var cf_cholorine_bleach_staining_value2 = data.cf_cholorine_bleach_staining_value2;
                  var cf_cholorine_bleach_staining_cond2 = data.cf_cholorine_bleach_staining_cond2;

                  var cf_peroxide_bleach_c_change_cond1 = data.cf_peroxide_bleach_c_change_cond1;
                  var cf_peroxide_bleach_c_change_value1 = data.cf_peroxide_bleach_c_change_value1;
                  var cf_peroxide_bleach_c_change_value2 = data.cf_peroxide_bleach_c_change_value2;
                  var cf_peroxide_bleach_c_change_cond2 = data.cf_peroxide_bleach_c_change_cond2;

                  var cf_peroxide_bleach_staining_cond1 = data.cf_peroxide_bleach_staining_cond1;
                  var cf_peroxide_bleach_staining_value1 = data.cf_peroxide_bleach_staining_value1;
                  var cf_peroxide_bleach_staining_value2 = data.cf_peroxide_bleach_staining_value2;
                  var cf_peroxide_bleach_staining_cond2 = data.cf_peroxide_bleach_staining_cond2;

                  var cross_staining_cond1 = data.cross_staining_cond1;
                  var cross_staining_value1 = data.cross_staining_value1;
                  var cross_staining_value2 = data.cross_staining_value2;
                  var cross_staining_cond2 = data.cross_staining_cond2;

                  var cf_artificial_light_c_change_cond1 = data.cf_artificial_light_c_change_cond1;
                  var cf_artificial_light_c_change_value1 = data.cf_artificial_light_c_change_value1;
                  var cf_artificial_light_c_change_value2 = data.cf_artificial_light_c_change_value2;
                  var cf_artificial_light_c_change_cond2 = data.cf_artificial_light_c_change_cond2;

                  var cf_artificial_light_cond1 = data.cf_artificial_light_cond1;
                  var cf_artificial_light_value1 = data.cf_artificial_light_value1;
                  var cf_artificial_light_value2 = data.cf_artificial_light_value2;
                  var cf_artificial_light_cond2 = data.cf_artificial_light_cond2;

                  $.ajax(
                  {
                      url: "multiple_copy_insert_into_washing_database.php",
                      method: "POST",
                      data: 
                      {
                          pp_no_id: pp_no_id, 
                          pp_version: pp_version, 
                          pp_version_standard: pp_version_standard,
                          selection_of_multiple_pp_version_for_copy: selection_of_multiple_pp_version_for_copy,

                        cf_rubbing_dry_cond1 : cf_rubbing_dry_cond1,
                        cf_rubbing_dry_value1 : cf_rubbing_dry_value1,
                        cf_rubbing_dry_value2 : cf_rubbing_dry_value2,
                        cf_rubbing_dry_cond2 : cf_rubbing_dry_cond2,

                        cf_rubbing_wet_value1 : cf_rubbing_wet_value1,
                        cf_rubbing_wet_value2 : cf_rubbing_wet_value2,
                        cf_rubbing_wet_cond1 : cf_rubbing_wet_cond1,
                        cf_rubbing_wet_cond2 : cf_rubbing_wet_cond2,

                        washing_ph_cond1 : washing_ph_cond1,
                        washing_ph_value1 : washing_ph_value1,
                        washing_ph_value2 : washing_ph_value2,
                        washing_ph_cond2 : washing_ph_cond2,

                        cf_dry_cleaning_c_change_cond1 : cf_dry_cleaning_c_change_cond1,
                        cf_dry_cleaning_c_change_value1 : cf_dry_cleaning_c_change_value1,
                        cf_dry_cleaning_c_change_value2 : cf_dry_cleaning_c_change_value2,
                        cf_dry_cleaning_c_change_cond2 : cf_dry_cleaning_c_change_cond2,

                        cf_dry_cleaning_staining_cond1 : cf_dry_cleaning_staining_cond1,
                        cf_dry_cleaning_staining_value1 : cf_dry_cleaning_staining_value1,
                        cf_dry_cleaning_staining_value2 : cf_dry_cleaning_staining_value2,
                        cf_dry_cleaning_staining_cond2 : cf_dry_cleaning_staining_cond2,

                        cf_washing_c_change_cond1 : cf_washing_c_change_cond1,
                        cf_washing_c_change_value1 : cf_washing_c_change_value1,
                        cf_washing_c_change_value2 : cf_washing_c_change_value2,
                        cf_washing_c_change_cond2 : cf_washing_c_change_cond2,

                        cf_washing_staining_cond1 : cf_washing_staining_cond1,
                        cf_washing_staining_value1 : cf_washing_staining_value1,
                        cf_washing_staining_value2 : cf_washing_staining_value2,
                        cf_washing_staining_cond2 : cf_washing_staining_cond2,

                        cf_perspiration_acis_c_change_cond1 : cf_perspiration_acis_c_change_cond1,
                        cf_perspiration_acis_c_change_value1 : cf_perspiration_acis_c_change_value1,
                        cf_perspiration_acis_c_change_value2 : cf_perspiration_acis_c_change_value2,
                        cf_perspiration_acis_c_change_cond2 : cf_perspiration_acis_c_change_cond2,

                        cf_perspiration_acis_staining_cond1 : cf_perspiration_acis_staining_cond1,
                        cf_perspiration_acis_staining_value1 : cf_perspiration_acis_staining_value1,
                        cf_perspiration_acis_staining_value2 : cf_perspiration_acis_staining_value2,
                        cf_perspiration_acis_staining_cond2 : cf_perspiration_acis_staining_cond2,

                        cf_perspiration_alkali_c_change_cond1 : cf_perspiration_alkali_c_change_cond1,
                        cf_perspiration_alkali_c_change_value1 : cf_perspiration_alkali_c_change_value1,
                        cf_perspiration_alkali_c_change_value2 : cf_perspiration_alkali_c_change_value2,
                        cf_perspiration_alkali_c_change_cond2 : cf_perspiration_alkali_c_change_cond2,

                        cf_perspiration_alkali_staining_cond1 : cf_perspiration_alkali_staining_cond1,
                        cf_perspiration_alkali_staining_value1 : cf_perspiration_alkali_staining_value1,
                        cf_perspiration_alkali_staining_value2 : cf_perspiration_alkali_staining_value2,
                        cf_perspiration_alkali_staining_cond2 : cf_perspiration_alkali_staining_cond2,

                        cf_water_c_change_cond1 : cf_water_c_change_cond1,
                        cf_water_c_change_value1 : cf_water_c_change_value1,
                        cf_water_c_change_value2 : cf_water_c_change_value2,
                        cf_water_c_change_cond2 : cf_water_c_change_cond2,

                        cf_water_staining_cond1 : cf_water_staining_cond1,
                        cf_water_staining_value1 : cf_water_staining_value1,
                        cf_water_staining_value2 : cf_water_staining_value2,
                        cf_water_staining_cond2 : cf_water_staining_cond2,

                        cf_water_sotting_staining_cond1 : cf_water_sotting_staining_cond1,
                        cf_water_sotting_staining_value1 : cf_water_sotting_staining_value1,
                        cf_water_sotting_staining_value2 : cf_water_sotting_staining_value2,
                        cf_water_sotting_staining_cond2 : cf_water_sotting_staining_cond2,

                        cf_water_wetting_staining_cond1 : cf_water_wetting_staining_cond1,
                        cf_water_wetting_staining_value1 : cf_water_wetting_staining_value1,
                        cf_water_wetting_staining_value2 : cf_water_wetting_staining_value2,
                        cf_water_wetting_staining_cond2 : cf_water_wetting_staining_cond2,

                        cf_hyd_reactive_dyes_c_change_cond1 : cf_hyd_reactive_dyes_c_change_cond1,
                        cf_hyd_reactive_dyes_c_change_value1 : cf_hyd_reactive_dyes_c_change_value1,
                        cf_hyd_reactive_dyes_c_change_value2 : cf_hyd_reactive_dyes_c_change_value2,
                        cf_hyd_reactive_dyes_c_change_cond2 : cf_hyd_reactive_dyes_c_change_cond2,

                        cf_hyd_reactive_dyes_staining_cond1 : cf_hyd_reactive_dyes_staining_cond1,
                        cf_hyd_reactive_dyes_staining_value1 : cf_hyd_reactive_dyes_staining_value1,
                        cf_hyd_reactive_dyes_staining_value2 : cf_hyd_reactive_dyes_staining_value2,
                        cf_hyd_reactive_dyes_staining_cond2 : cf_hyd_reactive_dyes_staining_cond2,

                        cf_oidative_damage_c_change_cond1 : cf_oidative_damage_c_change_cond1,
                        cf_oidative_damage_c_change_value1 : cf_oidative_damage_c_change_value1,
                        cf_oidative_damage_c_change_value2 : cf_oidative_damage_c_change_value2,
                        cf_oidative_damage_c_change_cond2 : cf_oidative_damage_c_change_cond2,

                        cf_phenolic_staining_cond1 : cf_phenolic_staining_cond1,
                        cf_phenolic_staining_value1 : cf_phenolic_staining_value1,
                        cf_phenolic_staining_value2 : cf_phenolic_staining_value2,
                        cf_phenolic_staining_cond2 : cf_phenolic_staining_cond2,

                        cf_pvc_migration_staining_cond1 : cf_pvc_migration_staining_cond1,
                        cf_pvc_migration_staining_value1 : cf_pvc_migration_staining_value1,
                        cf_pvc_migration_staining_value2 : cf_pvc_migration_staining_value2,
                        cf_pvc_migration_staining_cond2 : cf_pvc_migration_staining_cond2,

                        cf_saliva_c_change_cond1 : cf_saliva_c_change_cond1,
                        cf_saliva_c_change_value1 : cf_saliva_c_change_value1,
                        cf_saliva_c_change_value2 : cf_saliva_c_change_value2,
                        cf_saliva_c_change_cond2 : cf_saliva_c_change_cond2,

                        cf_saliva_staining_cond1 : cf_saliva_staining_cond1,
                        cf_saliva_staining_value1 : cf_saliva_staining_value1,
                        cf_saliva_staining_value2 : cf_saliva_staining_value2,
                        cf_saliva_staining_cond2 : cf_saliva_staining_cond2,

                        cf_chlorinated_water_c_change_cond1 : cf_chlorinated_water_c_change_cond1,
                        cf_chlorinated_water_c_change_value1 : cf_chlorinated_water_c_change_value1,
                        cf_chlorinated_water_c_change_value2 : cf_chlorinated_water_c_change_value2,
                        cf_chlorinated_water_c_change_cond2 : cf_chlorinated_water_c_change_cond2,

                        cf_chlorinated_water_staining_cond1 : cf_chlorinated_water_staining_cond1,
                        cf_chlorinated_water_staining_value1 : cf_chlorinated_water_staining_value1,
                        cf_chlorinated_water_staining_value2 : cf_chlorinated_water_staining_value2,
                        cf_chlorinated_water_staining_cond2 : cf_chlorinated_water_staining_cond2,

                        cf_cholorine_bleach_c_change_cond1 : cf_cholorine_bleach_c_change_cond1,
                        cf_cholorine_bleach_c_change_value1 : cf_cholorine_bleach_c_change_value1,
                        cf_cholorine_bleach_c_change_value2 : cf_cholorine_bleach_c_change_value2,
                        cf_cholorine_bleach_c_change_cond2 : cf_cholorine_bleach_c_change_cond2,

                        cf_cholorine_bleach_staining_cond1 : cf_cholorine_bleach_staining_cond1,
                        cf_cholorine_bleach_staining_value1 : cf_cholorine_bleach_staining_value1,
                        cf_cholorine_bleach_staining_value2 : cf_cholorine_bleach_staining_value2,
                        cf_cholorine_bleach_staining_cond2 : cf_cholorine_bleach_staining_cond2,

                        cf_peroxide_bleach_c_change_cond1 : cf_peroxide_bleach_c_change_cond1,
                        cf_peroxide_bleach_c_change_value1 : cf_peroxide_bleach_c_change_value1,
                        cf_peroxide_bleach_c_change_value2 : cf_peroxide_bleach_c_change_value2,
                        cf_peroxide_bleach_c_change_cond2 : cf_peroxide_bleach_c_change_cond2,

                        cf_peroxide_bleach_staining_cond1 : cf_peroxide_bleach_staining_cond1,
                        cf_peroxide_bleach_staining_value1 : cf_peroxide_bleach_staining_value1,
                        cf_peroxide_bleach_staining_value2 : cf_peroxide_bleach_staining_value2,
                        cf_peroxide_bleach_staining_cond2 : cf_peroxide_bleach_staining_cond2,

                        cross_staining_cond1 : cross_staining_cond1,
                        cross_staining_value1 : cross_staining_value1,
                        cross_staining_value2 : cross_staining_value2,
                        cross_staining_cond2 : cross_staining_cond2,

                        cf_artificial_light_c_change_cond1 : cf_artificial_light_c_change_cond1,
                        cf_artificial_light_c_change_value1 : cf_artificial_light_c_change_value1,
                        cf_artificial_light_c_change_value2 : cf_artificial_light_c_change_value2,
                        cf_artificial_light_c_change_cond2 : cf_artificial_light_c_change_cond2,

                        cf_artificial_light_cond1 : cf_artificial_light_cond1,
                        cf_artificial_light_value1 : cf_artificial_light_value1,
                        cf_artificial_light_value2 : cf_artificial_light_value2,
                        cf_artificial_light_cond2 : cf_artificial_light_cond2

                      },
                      success:function(new_data)
                      {
                          //after copy then first submit change data
                          $.ajax(
                          {
                              type: "POST",
                              url: "define_view_standards.php",
                              method: "POST",
                              data: 
                              {
                                pp_no_id: pp_no_id, 
                                pp_version: pp_version,
                                pp_version_standard: pp_version_standard
                              },
                              success:function(data)
                              {
                                  $('#retrieve_general_data').html(data);
                                  $('select#pp_version_standard_model').val(pp_version_standard);
                                  $('#others_retrieve_general_data').html("");
                              }
                          });
                          //and then after submit button next the change occure
                          view_standard_select(pp_version_standard);
                      }
                  });
                   
              }

          });
      }

      else if (pp_version_standard == 13)
      {
          $.ajax(
          {
              type: "POST",
              url: "calendering_issunce_copy.php",
              method: "POST",
              dataType:"JSON",
              data: 
              {
                calendering_standard_id: standard_id
              },
              success:function(data)
              {
                  $('#others_retrieve_general_data').html("");

                  var cf_rubbing_dry_cond1 = data.cf_rubbing_dry_cond1;
                  var cf_rubbing_dry_value1 = data.cf_rubbing_dry_value1;
                  var cf_rubbing_dry_value2 = data.cf_rubbing_dry_value2;
                  var cf_rubbing_dry_cond2 = data.cf_rubbing_dry_cond2;

                  var cf_rubbing_wet_value1 = data.cf_rubbing_wet_value1;
                  var cf_rubbing_wet_value2 = data.cf_rubbing_wet_value2;
                  var cf_rubbing_wet_cond1 = data.cf_rubbing_wet_cond1;
                  var cf_rubbing_wet_cond2 = data.cf_rubbing_wet_cond2;

                  var wash_dry_warp_before_iron_cond1 = data.wash_dry_warp_before_iron_cond1;
                  var wash_dry_warp_before_iron_value1 = data.wash_dry_warp_before_iron_value1;
                  var wash_dry_warp_before_iron_value2 = data.wash_dry_warp_before_iron_value2;
                  var wash_dry_warp_before_iron_cond2 = data.wash_dry_warp_before_iron_cond2;

                  var wash_dry_weft_before_iron_cond1 = data.wash_dry_weft_before_iron_cond1;
                  var wash_dry_weft_before_iron_value1 = data.wash_dry_weft_before_iron_value1;
                  var wash_dry_weft_before_iron_value2 = data.wash_dry_weft_before_iron_value2;
                  var wash_dry_weft_before_iron_cond2 = data.wash_dry_weft_before_iron_cond2;

                  var wash_dry_warp_after_iron_value2 = data.wash_dry_warp_after_iron_value2;
                  var wash_dry_warp_after_iron_value1 = data.wash_dry_warp_after_iron_value1;
                  var wash_dry_warp_after_iron_cond1 = data.wash_dry_warp_after_iron_cond1;
                  var wash_dry_warp_after_iron_cond2 = data.wash_dry_warp_after_iron_cond2;


                  var wash_dry_weft_after_iron_cond1 = data.wash_dry_weft_after_iron_cond1;
                  var wash_dry_weft_after_iron_value1 = data.wash_dry_weft_after_iron_value1;
                  var wash_dry_weft_after_iron_value2 = data.wash_dry_weft_after_iron_value2;
                  var wash_dry_weft_after_iron_cond2 = data.wash_dry_weft_after_iron_cond2;

                  var dry_cleaning_warp_cond1 = data.dry_cleaning_warp_cond1;
                  var dry_cleaning_warp_value1 = data.dry_cleaning_warp_value1;
                  var dry_cleaning_warp_value2 = data.dry_cleaning_warp_value2;
                  var dry_cleaning_warp_cond2 = data.dry_cleaning_warp_cond2;

                  var dry_cleaning_weft_cond1 = data.dry_cleaning_weft_cond1;
                  var dry_cleaning_weft_value1 = data.dry_cleaning_weft_value1;
                  var dry_cleaning_weft_value2 = data.dry_cleaning_weft_value2;
                  var dry_cleaning_weft_cond2 = data.dry_cleaning_weft_cond2;

                  var yarn_count_warp_cond1 = data.yarn_count_warp_cond1;
                  var yarn_count_warp_value1 = data.yarn_count_warp_value1;
                  var yarn_count_warp_value2 = data.yarn_count_warp_value2;
                  var yarn_count_warp_cond2 = data.yarn_count_warp_cond2;
                  var yarn_count_warp_unit = data.yarn_count_warp_unit;

                  var yarn_count_weft_cond1 = data.yarn_count_weft_cond1;
                  var yarn_count_weft_value1 = data.yarn_count_weft_value1;
                  var yarn_count_weft_value2 = data.yarn_count_weft_value2;
                  var yarn_count_weft_cond2 = data.yarn_count_weft_cond2;
                  var yarn_count_weft_unit = data.yarn_count_weft_unit;

                  var number_thread_warp_cond1 = data.number_thread_warp_cond1;
                  var number_thread_warp_value1 = data.number_thread_warp_value1;
                  var number_thread_warp_value2 = data.number_thread_warp_value2;
                  var number_thread_warp_cond2 = data.number_thread_warp_cond2;
                  var number_thread_warp_unit = data.number_thread_warp_unit;

                  var number_thread_weft_cond1 = data.number_thread_weft_cond1;
                  var number_thread_weft_value1 = data.number_thread_weft_value1;
                  var number_thread_weft_value2 = data.number_thread_weft_value2;
                  var number_thread_weft_cond2 = data.number_thread_weft_cond2;
                  var number_thread_weft_unit = data.number_thread_weft_unit;

                  var mass_per_unit_per_area_cond1 = data.mass_per_unit_per_area_cond1;
                  var mass_per_unit_per_area_value1 = data.mass_per_unit_per_area_value1;
                  var mass_per_unit_per_area_value2 = data.mass_per_unit_per_area_value2;
                  var mass_per_unit_per_area_cond2 = data.mass_per_unit_per_area_cond2;
                  var mass_per_unit_per_area_unit = data.mass_per_unit_per_area_unit;

                  var surface_pilling_cond1 = data.surface_pilling_cond1;
                  var surface_pilling_value1 = data.surface_pilling_value1;
                  var surface_pilling_value2 = data.surface_pilling_value2;
                  var surface_pilling_cond2 = data.surface_pilling_cond2;

                  var tensile_warp_cond1 = data.tensile_warp_cond1;
                  var tensile_warp_value1 = data.tensile_warp_value1;
                  var tensile_warp_value2 = data.tensile_warp_value2;
                  var tensile_warp_cond2 = data.tensile_warp_cond2;
                  var tensile_warp_unit = data.tensile_warp_unit;

                  var tensile_weft_cond1 = data.tensile_weft_cond1;
                  var tensile_weft_value1 = data.tensile_weft_value1;
                  var tensile_weft_value2 = data.tensile_weft_value2;
                  var tensile_weft_cond2 = data.tensile_weft_cond2;
                  var tensile_weft_unit = data.tensile_weft_unit;

                  var tear_force_warp_cond1 = data.tear_force_warp_cond1;
                  var tear_force_warp_value1 = data.tear_force_warp_value1;
                  var tear_force_warp_value2 = data.tear_force_warp_value2;
                  var tear_force_warp_cond2 = data.tear_force_warp_cond2;
                  var tear_force_warp_unit = data.tear_force_warp_unit;

                  var tear_force_weft_cond1 = data.tear_force_weft_cond1;
                  var tear_force_weft_value1 = data.tear_force_weft_value1;
                  var tear_force_weft_value2 = data.tear_force_weft_value2;
                  var tear_force_weft_cond2 = data.tear_force_weft_cond2;
                  var tear_force_weft_unit = data.tear_force_weft_unit;

                  var seam_strength_warp_cond1 = data.seam_strength_warp_cond1;
                  var seam_strength_warp_value1 = data.seam_strength_warp_value1;
                  var seam_strength_warp_value2 = data.seam_strength_warp_value2;
                  var seam_strength_warp_cond2 = data.seam_strength_warp_cond2;
                  var seam_strength_warp_unit = data.seam_strength_warp_unit;

                  var seam_strength_weft_cond1 = data.seam_strength_weft_cond1;
                  var seam_strength_weft_value1 = data.seam_strength_weft_value1;
                  var seam_strength_weft_value2 = data.seam_strength_weft_value2;
                  var seam_strength_weft_cond2 = data.seam_strength_weft_cond2;
                  var seam_strength_weft_unit = data.seam_strength_weft_unit;


                  var seam_slipage_resistance = data.seam_slipage_resistance;

                  var seam_resistance_method1_warp_cond1 = data.seam_resistance_method1_warp_cond1;
                  var seam_resistance_method1_warp_value1 = data.seam_resistance_method1_warp_value1;
                  var seam_resistance_method1_warp_value2 = data.seam_resistance_method1_warp_value2;
                  var seam_resistance_method1_warp_cond2 = data.seam_resistance_method1_warp_cond2;
                  var seam_resistance_method1_warp_unit = data.seam_resistance_method1_warp_unit;

                  //Seam Slipage Resistance weft
                  var seam_resistance_method1_weft_cond1 = data.seam_resistance_method1_weft_cond1;
                  var seam_resistance_method1_weft_value1 = data.seam_resistance_method1_weft_value1;
                  var seam_resistance_method1_weft_value2 = data.seam_resistance_method1_weft_value2;
                  var seam_resistance_method1_weft_cond2 = data.seam_resistance_method1_weft_cond2;
                  var seam_resistance_method1_weft_unit = data.seam_resistance_method1_weft_unit;

                  //Seam Slipage Resistance Warp (mm)
                  var seam_resistance_method2_warp_cond1 = data.seam_resistance_method2_warp_cond1;
                  var seam_resistance_method2_warp_value1 = data.seam_resistance_method2_warp_value1;
                  var seam_resistance_method2_warp_value2 = data.seam_resistance_method2_warp_value2;
                  var seam_resistance_method2_warp_cond2 = data.seam_resistance_method2_warp_cond2;
                  var seam_resistance_method2_warp_unit = data.seam_resistance_method2_warp_unit;

                  //Seam Slipage Resistance weft
                  var seam_resistance_method2_weft_cond1 = data.seam_resistance_method2_weft_cond1;
                  var seam_resistance_method2_weft_value1 = data.seam_resistance_method2_weft_value1;
                  var seam_resistance_method2_weft_value2 = data.seam_resistance_method2_weft_value2;
                  var seam_resistance_method2_weft_cond2 = data.seam_resistance_method2_weft_cond2;
                  var seam_resistance_method2_weft_unit = data.seam_resistance_method2_weft_unit;

                  $.ajax(
                  {
                      url: "multiple_copy_insert_into_calendering_database.php",
                      method: "POST",
                      data: 
                      {
                        pp_no_id: pp_no_id, 
                        pp_version: pp_version, 
                        pp_version_standard: pp_version_standard,
                        selection_of_multiple_pp_version_for_copy: selection_of_multiple_pp_version_for_copy,

                        cf_rubbing_dry_cond1 : cf_rubbing_dry_cond1,
                        cf_rubbing_dry_value1 : cf_rubbing_dry_value1,
                        cf_rubbing_dry_value2 : cf_rubbing_dry_value2,
                        cf_rubbing_dry_cond2 : cf_rubbing_dry_cond2,

                        cf_rubbing_wet_value1 : cf_rubbing_wet_value1,
                        cf_rubbing_wet_value2 : cf_rubbing_wet_value2,
                        cf_rubbing_wet_cond1 : cf_rubbing_wet_cond1,
                        cf_rubbing_wet_cond2 : cf_rubbing_wet_cond2,

                        wash_dry_warp_before_iron_cond1 : wash_dry_warp_before_iron_cond1,
                        wash_dry_warp_before_iron_value1 : wash_dry_warp_before_iron_value1,
                        wash_dry_warp_before_iron_value2 : wash_dry_warp_before_iron_value2,
                        wash_dry_warp_before_iron_cond2 : wash_dry_warp_before_iron_cond2,

                        wash_dry_weft_before_iron_cond1 : wash_dry_weft_before_iron_cond1,
                        wash_dry_weft_before_iron_value1 : wash_dry_weft_before_iron_value1,
                        wash_dry_weft_before_iron_value2 : wash_dry_weft_before_iron_value2,
                        wash_dry_weft_before_iron_cond2 : wash_dry_weft_before_iron_cond2,

                        wash_dry_warp_after_iron_value2 : wash_dry_warp_after_iron_value2,
                        wash_dry_warp_after_iron_value1 : wash_dry_warp_after_iron_value1,
                        wash_dry_warp_after_iron_cond1 : wash_dry_warp_after_iron_cond1,
                        wash_dry_warp_after_iron_cond2 : wash_dry_warp_after_iron_cond2,


                        wash_dry_weft_after_iron_cond1 : wash_dry_weft_after_iron_cond1,
                        wash_dry_weft_after_iron_value1 : wash_dry_weft_after_iron_value1,
                        wash_dry_weft_after_iron_value2 : wash_dry_weft_after_iron_value2,
                        wash_dry_weft_after_iron_cond2 : wash_dry_weft_after_iron_cond2,

                        dry_cleaning_warp_cond1 : dry_cleaning_warp_cond1,
                        dry_cleaning_warp_value1 : dry_cleaning_warp_value1,
                        dry_cleaning_warp_value2 : dry_cleaning_warp_value2,
                        dry_cleaning_warp_cond2 : dry_cleaning_warp_cond2,

                        dry_cleaning_weft_cond1 : dry_cleaning_weft_cond1,
                        dry_cleaning_weft_value1 : dry_cleaning_weft_value1,
                        dry_cleaning_weft_value2 : dry_cleaning_weft_value2,
                        dry_cleaning_weft_cond2 : dry_cleaning_weft_cond2,

                        yarn_count_warp_cond1 : yarn_count_warp_cond1,
                        yarn_count_warp_value1 : yarn_count_warp_value1,
                        yarn_count_warp_value2 : yarn_count_warp_value2,
                        yarn_count_warp_cond2 : yarn_count_warp_cond2,
                        yarn_count_warp_unit : yarn_count_warp_unit,

                        yarn_count_weft_cond1 : yarn_count_weft_cond1,
                        yarn_count_weft_value1 : yarn_count_weft_value1,
                        yarn_count_weft_value2 : yarn_count_weft_value2,
                        yarn_count_weft_cond2 : yarn_count_weft_cond2,
                        yarn_count_weft_unit : yarn_count_weft_unit,

                        number_thread_warp_cond1 : number_thread_warp_cond1,
                        number_thread_warp_value1 : number_thread_warp_value1,
                        number_thread_warp_value2 : number_thread_warp_value2,
                        number_thread_warp_cond2 : number_thread_warp_cond2,
                        number_thread_warp_unit : number_thread_warp_unit,

                        number_thread_weft_cond1 : number_thread_weft_cond1,
                        number_thread_weft_value1 : number_thread_weft_value1,
                        number_thread_weft_value2 : number_thread_weft_value2,
                        number_thread_weft_cond2 : number_thread_weft_cond2,
                        number_thread_weft_unit : number_thread_weft_unit,

                        mass_per_unit_per_area_cond1 : mass_per_unit_per_area_cond1,
                        mass_per_unit_per_area_value1 : mass_per_unit_per_area_value1,
                        mass_per_unit_per_area_value2 : mass_per_unit_per_area_value2,
                        mass_per_unit_per_area_cond2 : mass_per_unit_per_area_cond2,
                        mass_per_unit_per_area_unit : mass_per_unit_per_area_unit,

                        surface_pilling_cond1 : surface_pilling_cond1,
                        surface_pilling_value1 : surface_pilling_value1,
                        surface_pilling_value2 : surface_pilling_value2,
                        surface_pilling_cond2 : surface_pilling_cond2,

                        tensile_warp_cond1 : tensile_warp_cond1,
                        tensile_warp_value1 : tensile_warp_value1,
                        tensile_warp_value2 : tensile_warp_value2,
                        tensile_warp_cond2 : tensile_warp_cond2,
                        tensile_warp_unit : tensile_warp_unit,

                        tensile_weft_cond1 : tensile_weft_cond1,
                        tensile_weft_value1 : tensile_weft_value1,
                        tensile_weft_value2 : tensile_weft_value2,
                        tensile_weft_cond2 : tensile_weft_cond2,
                        tensile_weft_unit : tensile_weft_unit,

                        tear_force_warp_cond1 : tear_force_warp_cond1,
                        tear_force_warp_value1 : tear_force_warp_value1,
                        tear_force_warp_value2 : tear_force_warp_value2,
                        tear_force_warp_cond2 : tear_force_warp_cond2,
                        tear_force_warp_unit : tear_force_warp_unit,

                        tear_force_weft_cond1 : tear_force_weft_cond1,
                        tear_force_weft_value1 : tear_force_weft_value1,
                        tear_force_weft_value2 : tear_force_weft_value2,
                        tear_force_weft_cond2 : tear_force_weft_cond2,
                        tear_force_weft_unit : tear_force_weft_unit,

                        seam_strength_warp_cond1 : seam_strength_warp_cond1,
                        seam_strength_warp_value1 : seam_strength_warp_value1,
                        seam_strength_warp_value2 : seam_strength_warp_value2,
                        seam_strength_warp_cond2 : seam_strength_warp_cond2,
                        seam_strength_warp_unit : seam_strength_warp_unit,

                        seam_strength_weft_cond1 : seam_strength_weft_cond1,
                        seam_strength_weft_value1 : seam_strength_weft_value1,
                        seam_strength_weft_value2 : seam_strength_weft_value2,
                        seam_strength_weft_cond2 : seam_strength_weft_cond2,
                        seam_strength_weft_unit : seam_strength_weft_unit,


                        seam_slipage_resistance : seam_slipage_resistance,

                        seam_resistance_method1_warp_cond1 : seam_resistance_method1_warp_cond1,
                        seam_resistance_method1_warp_value1 : seam_resistance_method1_warp_value1,
                        seam_resistance_method1_warp_value2 : seam_resistance_method1_warp_value2,
                        seam_resistance_method1_warp_cond2 : seam_resistance_method1_warp_cond2,
                        seam_resistance_method1_warp_unit : seam_resistance_method1_warp_unit,

                        //Seam Slipage Resistance weft
                        seam_resistance_method1_weft_cond1 : seam_resistance_method1_weft_cond1,
                        seam_resistance_method1_weft_value1 : seam_resistance_method1_weft_value1,
                        seam_resistance_method1_weft_value2 : seam_resistance_method1_weft_value2,
                        seam_resistance_method1_weft_cond2 : seam_resistance_method1_weft_cond2,
                        seam_resistance_method1_weft_unit : seam_resistance_method1_weft_unit,

                        //Seam Slipage Resistance Warp (mm)
                        seam_resistance_method2_warp_cond1 : seam_resistance_method2_warp_cond1,
                        seam_resistance_method2_warp_value1 : seam_resistance_method2_warp_value1,
                        seam_resistance_method2_warp_value2 : seam_resistance_method2_warp_value2,
                        seam_resistance_method2_warp_cond2 : seam_resistance_method2_warp_cond2,
                        seam_resistance_method2_warp_unit : seam_resistance_method2_warp_unit,

                        //Seam Slipage Resistance weft
                        seam_resistance_method2_weft_cond1 : seam_resistance_method2_weft_cond1,
                        seam_resistance_method2_weft_value1 : seam_resistance_method2_weft_value1,
                        seam_resistance_method2_weft_value2 : seam_resistance_method2_weft_value2,
                        seam_resistance_method2_weft_cond2 : seam_resistance_method2_weft_cond2,
                        seam_resistance_method2_weft_unit : seam_resistance_method2_weft_unit

                      },
                      success:function(new_data)
                      {
                          //after copy then first submit change data
                          $.ajax(
                          {
                              type: "POST",
                              url: "define_view_standards.php",
                              method: "POST",
                              data: 
                              {
                                pp_no_id: pp_no_id, 
                                pp_version: pp_version,
                                pp_version_standard: pp_version_standard
                              },
                              success:function(data)
                              {
                                  $('#retrieve_general_data').html(data);
                                  $('select#pp_version_standard_model').val(pp_version_standard);
                                  $('#others_retrieve_general_data').html("");
                              }
                          });
                          //and then after submit button next the change occure
                          view_standard_select(pp_version_standard);
                      }
                  });
                   
              }

          });
      }

      else if (pp_version_standard == 14)
      {
          $.ajax(
          {
              type: "POST",
              url: "sanforizing_issunce_copy.php",
              method: "POST",
              dataType:"JSON",
              data: 
              {
                sanforizing_standard_id: standard_id
              },
              success:function(data)
              {
                  $('#others_retrieve_general_data').html("");

                  var cf_rubbing_dry_cond1 = data.cf_rubbing_dry_cond1;
                  var cf_rubbing_dry_value1 = data.cf_rubbing_dry_value1;
                  var cf_rubbing_dry_value2 = data.cf_rubbing_dry_value2;
                  var cf_rubbing_dry_cond2 = data.cf_rubbing_dry_cond2;

                  var cf_rubbing_wet_value1 = data.cf_rubbing_wet_value1;
                  var cf_rubbing_wet_value2 = data.cf_rubbing_wet_value2;
                  var cf_rubbing_wet_cond1 = data.cf_rubbing_wet_cond1;
                  var cf_rubbing_wet_cond2 = data.cf_rubbing_wet_cond2;

                  var wash_dry_warp_before_iron_cond1 = data.wash_dry_warp_before_iron_cond1;
                  var wash_dry_warp_before_iron_value1 = data.wash_dry_warp_before_iron_value1;
                  var wash_dry_warp_before_iron_value2 = data.wash_dry_warp_before_iron_value2;
                  var wash_dry_warp_before_iron_cond2 = data.wash_dry_warp_before_iron_cond2;

                  var wash_dry_weft_before_iron_cond1 = data.wash_dry_weft_before_iron_cond1;
                  var wash_dry_weft_before_iron_value1 = data.wash_dry_weft_before_iron_value1;
                  var wash_dry_weft_before_iron_value2 = data.wash_dry_weft_before_iron_value2;
                  var wash_dry_weft_before_iron_cond2 = data.wash_dry_weft_before_iron_cond2;

                  var wash_dry_warp_after_iron_value2 = data.wash_dry_warp_after_iron_value2;
                  var wash_dry_warp_after_iron_value1 = data.wash_dry_warp_after_iron_value1;
                  var wash_dry_warp_after_iron_cond1 = data.wash_dry_warp_after_iron_cond1;
                  var wash_dry_warp_after_iron_cond2 = data.wash_dry_warp_after_iron_cond2;


                  var wash_dry_weft_after_iron_cond1 = data.wash_dry_weft_after_iron_cond1;
                  var wash_dry_weft_after_iron_value1 = data.wash_dry_weft_after_iron_value1;
                  var wash_dry_weft_after_iron_value2 = data.wash_dry_weft_after_iron_value2;
                  var wash_dry_weft_after_iron_cond2 = data.wash_dry_weft_after_iron_cond2;

                  var dry_cleaning_warp_cond1 = data.dry_cleaning_warp_cond1;
                  var dry_cleaning_warp_value1 = data.dry_cleaning_warp_value1;
                  var dry_cleaning_warp_value2 = data.dry_cleaning_warp_value2;
                  var dry_cleaning_warp_cond2 = data.dry_cleaning_warp_cond2;

                  var dry_cleaning_weft_cond1 = data.dry_cleaning_weft_cond1;
                  var dry_cleaning_weft_value1 = data.dry_cleaning_weft_value1;
                  var dry_cleaning_weft_value2 = data.dry_cleaning_weft_value2;
                  var dry_cleaning_weft_cond2 = data.dry_cleaning_weft_cond2;

                  var yarn_count_warp_cond1 = data.yarn_count_warp_cond1;
                  var yarn_count_warp_value1 = data.yarn_count_warp_value1;
                  var yarn_count_warp_value2 = data.yarn_count_warp_value2;
                  var yarn_count_warp_cond2 = data.yarn_count_warp_cond2;
                  var yarn_count_warp_unit = data.yarn_count_warp_unit;

                  var yarn_count_weft_cond1 = data.yarn_count_weft_cond1;
                  var yarn_count_weft_value1 = data.yarn_count_weft_value1;
                  var yarn_count_weft_value2 = data.yarn_count_weft_value2;
                  var yarn_count_weft_cond2 = data.yarn_count_weft_cond2;
                  var yarn_count_weft_unit = data.yarn_count_weft_unit;

                  var number_thread_warp_cond1 = data.number_thread_warp_cond1;
                  var number_thread_warp_value1 = data.number_thread_warp_value1;
                  var number_thread_warp_value2 = data.number_thread_warp_value2;
                  var number_thread_warp_cond2 = data.number_thread_warp_cond2;
                  var number_thread_warp_unit = data.number_thread_warp_unit;

                  var number_thread_weft_cond1 = data.number_thread_weft_cond1;
                  var number_thread_weft_value1 = data.number_thread_weft_value1;
                  var number_thread_weft_value2 = data.number_thread_weft_value2;
                  var number_thread_weft_cond2 = data.number_thread_weft_cond2;
                  var number_thread_weft_unit = data.number_thread_weft_unit;

                  var mass_per_unit_per_area_cond1 = data.mass_per_unit_per_area_cond1;
                  var mass_per_unit_per_area_value1 = data.mass_per_unit_per_area_value1;
                  var mass_per_unit_per_area_value2 = data.mass_per_unit_per_area_value2;
                  var mass_per_unit_per_area_cond2 = data.mass_per_unit_per_area_cond2;
                  var mass_per_unit_per_area_unit = data.mass_per_unit_per_area_unit;

                  var surface_pilling_cond1 = data.surface_pilling_cond1;
                  var surface_pilling_value1 = data.surface_pilling_value1;
                  var surface_pilling_value2 = data.surface_pilling_value2;
                  var surface_pilling_cond2 = data.surface_pilling_cond2;

                  var tensile_warp_cond1 = data.tensile_warp_cond1;
                  var tensile_warp_value1 = data.tensile_warp_value1;
                  var tensile_warp_value2 = data.tensile_warp_value2;
                  var tensile_warp_cond2 = data.tensile_warp_cond2;
                  var tensile_warp_unit = data.tensile_warp_unit;

                  var tensile_weft_cond1 = data.tensile_weft_cond1;
                  var tensile_weft_value1 = data.tensile_weft_value1;
                  var tensile_weft_value2 = data.tensile_weft_value2;
                  var tensile_weft_cond2 = data.tensile_weft_cond2;
                  var tensile_weft_unit = data.tensile_weft_unit;

                  var tear_force_warp_cond1 = data.tear_force_warp_cond1;
                  var tear_force_warp_value1 = data.tear_force_warp_value1;
                  var tear_force_warp_value2 = data.tear_force_warp_value2;
                  var tear_force_warp_cond2 = data.tear_force_warp_cond2;
                  var tear_force_warp_unit = data.tear_force_warp_unit;

                  var tear_force_weft_cond1 = data.tear_force_weft_cond1;
                  var tear_force_weft_value1 = data.tear_force_weft_value1;
                  var tear_force_weft_value2 = data.tear_force_weft_value2;
                  var tear_force_weft_cond2 = data.tear_force_weft_cond2;
                  var tear_force_weft_unit = data.tear_force_weft_unit;

                  var seam_strength_warp_cond1 = data.seam_strength_warp_cond1;
                  var seam_strength_warp_value1 = data.seam_strength_warp_value1;
                  var seam_strength_warp_value2 = data.seam_strength_warp_value2;
                  var seam_strength_warp_cond2 = data.seam_strength_warp_cond2;
                  var seam_strength_warp_unit = data.seam_strength_warp_unit;

                  var seam_strength_weft_cond1 = data.seam_strength_weft_cond1;
                  var seam_strength_weft_value1 = data.seam_strength_weft_value1;
                  var seam_strength_weft_value2 = data.seam_strength_weft_value2;
                  var seam_strength_weft_cond2 = data.seam_strength_weft_cond2;
                  var seam_strength_weft_unit = data.seam_strength_weft_unit;


                  var seam_slipage_resistance = data.seam_slipage_resistance;

                  var seam_resistance_method1_warp_cond1 = data.seam_resistance_method1_warp_cond1;
                  var seam_resistance_method1_warp_value1 = data.seam_resistance_method1_warp_value1;
                  var seam_resistance_method1_warp_value2 = data.seam_resistance_method1_warp_value2;
                  var seam_resistance_method1_warp_cond2 = data.seam_resistance_method1_warp_cond2;
                  var seam_resistance_method1_warp_unit = data.seam_resistance_method1_warp_unit;

                  //Seam Slipage Resistance weft
                  var seam_resistance_method1_weft_cond1 = data.seam_resistance_method1_weft_cond1;
                  var seam_resistance_method1_weft_value1 = data.seam_resistance_method1_weft_value1;
                  var seam_resistance_method1_weft_value2 = data.seam_resistance_method1_weft_value2;
                  var seam_resistance_method1_weft_cond2 = data.seam_resistance_method1_weft_cond2;
                  var seam_resistance_method1_weft_unit = data.seam_resistance_method1_weft_unit;

                  //Seam Slipage Resistance Warp (mm)
                  var seam_resistance_method2_warp_cond1 = data.seam_resistance_method2_warp_cond1;
                  var seam_resistance_method2_warp_value1 = data.seam_resistance_method2_warp_value1;
                  var seam_resistance_method2_warp_value2 = data.seam_resistance_method2_warp_value2;
                  var seam_resistance_method2_warp_cond2 = data.seam_resistance_method2_warp_cond2;
                  var seam_resistance_method2_warp_unit = data.seam_resistance_method2_warp_unit;

                  //Seam Slipage Resistance weft
                  var seam_resistance_method2_weft_cond1 = data.seam_resistance_method2_weft_cond1;
                  var seam_resistance_method2_weft_value1 = data.seam_resistance_method2_weft_value1;
                  var seam_resistance_method2_weft_value2 = data.seam_resistance_method2_weft_value2;
                  var seam_resistance_method2_weft_cond2 = data.seam_resistance_method2_weft_cond2;
                  var seam_resistance_method2_weft_unit = data.seam_resistance_method2_weft_unit;

                  $.ajax(
                  {
                      url: "multiple_copy_insert_into_sanforizing_database.php",
                      method: "POST",
                      data: 
                      {
                        pp_no_id: pp_no_id, 
                        pp_version: pp_version, 
                        pp_version_standard: pp_version_standard,
                        selection_of_multiple_pp_version_for_copy: selection_of_multiple_pp_version_for_copy,

                        cf_rubbing_dry_cond1 : cf_rubbing_dry_cond1,
                        cf_rubbing_dry_value1 : cf_rubbing_dry_value1,
                        cf_rubbing_dry_value2 : cf_rubbing_dry_value2,
                        cf_rubbing_dry_cond2 : cf_rubbing_dry_cond2,

                        cf_rubbing_wet_value1 : cf_rubbing_wet_value1,
                        cf_rubbing_wet_value2 : cf_rubbing_wet_value2,
                        cf_rubbing_wet_cond1 : cf_rubbing_wet_cond1,
                        cf_rubbing_wet_cond2 : cf_rubbing_wet_cond2,

                        wash_dry_warp_before_iron_cond1 : wash_dry_warp_before_iron_cond1,
                        wash_dry_warp_before_iron_value1 : wash_dry_warp_before_iron_value1,
                        wash_dry_warp_before_iron_value2 : wash_dry_warp_before_iron_value2,
                        wash_dry_warp_before_iron_cond2 : wash_dry_warp_before_iron_cond2,

                        wash_dry_weft_before_iron_cond1 : wash_dry_weft_before_iron_cond1,
                        wash_dry_weft_before_iron_value1 : wash_dry_weft_before_iron_value1,
                        wash_dry_weft_before_iron_value2 : wash_dry_weft_before_iron_value2,
                        wash_dry_weft_before_iron_cond2 : wash_dry_weft_before_iron_cond2,

                        wash_dry_warp_after_iron_value2 : wash_dry_warp_after_iron_value2,
                        wash_dry_warp_after_iron_value1 : wash_dry_warp_after_iron_value1,
                        wash_dry_warp_after_iron_cond1 : wash_dry_warp_after_iron_cond1,
                        wash_dry_warp_after_iron_cond2 : wash_dry_warp_after_iron_cond2,


                        wash_dry_weft_after_iron_cond1 : wash_dry_weft_after_iron_cond1,
                        wash_dry_weft_after_iron_value1 : wash_dry_weft_after_iron_value1,
                        wash_dry_weft_after_iron_value2 : wash_dry_weft_after_iron_value2,
                        wash_dry_weft_after_iron_cond2 : wash_dry_weft_after_iron_cond2,

                        dry_cleaning_warp_cond1 : dry_cleaning_warp_cond1,
                        dry_cleaning_warp_value1 : dry_cleaning_warp_value1,
                        dry_cleaning_warp_value2 : dry_cleaning_warp_value2,
                        dry_cleaning_warp_cond2 : dry_cleaning_warp_cond2,

                        dry_cleaning_weft_cond1 : dry_cleaning_weft_cond1,
                        dry_cleaning_weft_value1 : dry_cleaning_weft_value1,
                        dry_cleaning_weft_value2 : dry_cleaning_weft_value2,
                        dry_cleaning_weft_cond2 : dry_cleaning_weft_cond2,

                        yarn_count_warp_cond1 : yarn_count_warp_cond1,
                        yarn_count_warp_value1 : yarn_count_warp_value1,
                        yarn_count_warp_value2 : yarn_count_warp_value2,
                        yarn_count_warp_cond2 : yarn_count_warp_cond2,
                        yarn_count_warp_unit : yarn_count_warp_unit,

                        yarn_count_weft_cond1 : yarn_count_weft_cond1,
                        yarn_count_weft_value1 : yarn_count_weft_value1,
                        yarn_count_weft_value2 : yarn_count_weft_value2,
                        yarn_count_weft_cond2 : yarn_count_weft_cond2,
                        yarn_count_weft_unit : yarn_count_weft_unit,

                        number_thread_warp_cond1 : number_thread_warp_cond1,
                        number_thread_warp_value1 : number_thread_warp_value1,
                        number_thread_warp_value2 : number_thread_warp_value2,
                        number_thread_warp_cond2 : number_thread_warp_cond2,
                        number_thread_warp_unit : number_thread_warp_unit,

                        number_thread_weft_cond1 : number_thread_weft_cond1,
                        number_thread_weft_value1 : number_thread_weft_value1,
                        number_thread_weft_value2 : number_thread_weft_value2,
                        number_thread_weft_cond2 : number_thread_weft_cond2,
                        number_thread_weft_unit : number_thread_weft_unit,

                        mass_per_unit_per_area_cond1 : mass_per_unit_per_area_cond1,
                        mass_per_unit_per_area_value1 : mass_per_unit_per_area_value1,
                        mass_per_unit_per_area_value2 : mass_per_unit_per_area_value2,
                        mass_per_unit_per_area_cond2 : mass_per_unit_per_area_cond2,
                        mass_per_unit_per_area_unit : mass_per_unit_per_area_unit,

                        surface_pilling_cond1 : surface_pilling_cond1,
                        surface_pilling_value1 : surface_pilling_value1,
                        surface_pilling_value2 : surface_pilling_value2,
                        surface_pilling_cond2 : surface_pilling_cond2,

                        tensile_warp_cond1 : tensile_warp_cond1,
                        tensile_warp_value1 : tensile_warp_value1,
                        tensile_warp_value2 : tensile_warp_value2,
                        tensile_warp_cond2 : tensile_warp_cond2,
                        tensile_warp_unit : tensile_warp_unit,

                        tensile_weft_cond1 : tensile_weft_cond1,
                        tensile_weft_value1 : tensile_weft_value1,
                        tensile_weft_value2 : tensile_weft_value2,
                        tensile_weft_cond2 : tensile_weft_cond2,
                        tensile_weft_unit : tensile_weft_unit,

                        tear_force_warp_cond1 : tear_force_warp_cond1,
                        tear_force_warp_value1 : tear_force_warp_value1,
                        tear_force_warp_value2 : tear_force_warp_value2,
                        tear_force_warp_cond2 : tear_force_warp_cond2,
                        tear_force_warp_unit : tear_force_warp_unit,

                        tear_force_weft_cond1 : tear_force_weft_cond1,
                        tear_force_weft_value1 : tear_force_weft_value1,
                        tear_force_weft_value2 : tear_force_weft_value2,
                        tear_force_weft_cond2 : tear_force_weft_cond2,
                        tear_force_weft_unit : tear_force_weft_unit,

                        seam_strength_warp_cond1 : seam_strength_warp_cond1,
                        seam_strength_warp_value1 : seam_strength_warp_value1,
                        seam_strength_warp_value2 : seam_strength_warp_value2,
                        seam_strength_warp_cond2 : seam_strength_warp_cond2,
                        seam_strength_warp_unit : seam_strength_warp_unit,

                        seam_strength_weft_cond1 : seam_strength_weft_cond1,
                        seam_strength_weft_value1 : seam_strength_weft_value1,
                        seam_strength_weft_value2 : seam_strength_weft_value2,
                        seam_strength_weft_cond2 : seam_strength_weft_cond2,
                        seam_strength_weft_unit : seam_strength_weft_unit,


                        seam_slipage_resistance : seam_slipage_resistance,

                        seam_resistance_method1_warp_cond1 : seam_resistance_method1_warp_cond1,
                        seam_resistance_method1_warp_value1 : seam_resistance_method1_warp_value1,
                        seam_resistance_method1_warp_value2 : seam_resistance_method1_warp_value2,
                        seam_resistance_method1_warp_cond2 : seam_resistance_method1_warp_cond2,
                        seam_resistance_method1_warp_unit : seam_resistance_method1_warp_unit,

                        //Seam Slipage Resistance weft
                        seam_resistance_method1_weft_cond1 : seam_resistance_method1_weft_cond1,
                        seam_resistance_method1_weft_value1 : seam_resistance_method1_weft_value1,
                        seam_resistance_method1_weft_value2 : seam_resistance_method1_weft_value2,
                        seam_resistance_method1_weft_cond2 : seam_resistance_method1_weft_cond2,
                        seam_resistance_method1_weft_unit : seam_resistance_method1_weft_unit,

                        //Seam Slipage Resistance Warp (mm)
                        seam_resistance_method2_warp_cond1 : seam_resistance_method2_warp_cond1,
                        seam_resistance_method2_warp_value1 : seam_resistance_method2_warp_value1,
                        seam_resistance_method2_warp_value2 : seam_resistance_method2_warp_value2,
                        seam_resistance_method2_warp_cond2 : seam_resistance_method2_warp_cond2,
                        seam_resistance_method2_warp_unit : seam_resistance_method2_warp_unit,

                        //Seam Slipage Resistance weft
                        seam_resistance_method2_weft_cond1 : seam_resistance_method2_weft_cond1,
                        seam_resistance_method2_weft_value1 : seam_resistance_method2_weft_value1,
                        seam_resistance_method2_weft_value2 : seam_resistance_method2_weft_value2,
                        seam_resistance_method2_weft_cond2 : seam_resistance_method2_weft_cond2,
                        seam_resistance_method2_weft_unit : seam_resistance_method2_weft_unit

                      },
                      success:function(new_data)
                      {
                          //after copy then first submit change data
                          $.ajax(
                          {
                              type: "POST",
                              url: "define_view_standards.php",
                              method: "POST",
                              data: 
                              {
                                pp_no_id: pp_no_id, 
                                pp_version: pp_version,
                                pp_version_standard: pp_version_standard
                              },
                              success:function(data)
                              {
                                  $('#retrieve_general_data').html(data);
                                  $('select#pp_version_standard_model').val(pp_version_standard);
                                  $('#others_retrieve_general_data').html("");
                              }
                          });
                          //and then after submit button next the change occure
                          view_standard_select(pp_version_standard);
                      }
                  });
                   
              }

          });
      }

      else if (pp_version_standard == 15)
      {
          $.ajax(
          {
              type: "POST",
              url: "raising_issunce_copy.php",
              method: "POST",
              dataType:"JSON",
              data: 
              {
                finishing_standard_id: standard_id
              },
              success:function(data)
              {
                  $('#others_retrieve_general_data').html("");

                  var tensile_warp_cond1 = data.tensile_warp_cond1;
                  var tensile_warp_value1 = data.tensile_warp_value1;
                  var tensile_warp_value2 = data.tensile_warp_value2;
                  var tensile_warp_cond2 = data.tensile_warp_cond2;
                  var tensile_warp_unit = data.tensile_warp_unit;

                  var tensile_weft_cond1 = data.tensile_weft_cond1;
                  var tensile_weft_value1 = data.tensile_weft_value1;
                  var tensile_weft_value2 = data.tensile_weft_value2;
                  var tensile_weft_cond2 = data.tensile_weft_cond2;
                  var tensile_weft_unit = data.tensile_weft_unit;

                  var tear_force_warp_cond1 = data.tear_force_warp_cond1;
                  var tear_force_warp_value1 = data.tear_force_warp_value1;
                  var tear_force_warp_value2 = data.tear_force_warp_value2;
                  var tear_force_warp_cond2 = data.tear_force_warp_cond2;
                  var tear_force_warp_unit = data.tear_force_warp_unit;

                  var tear_force_weft_cond1 = data.tear_force_weft_cond1;
                  var tear_force_weft_value1 = data.tear_force_weft_value1;
                  var tear_force_weft_value2 = data.tear_force_weft_value2;
                  var tear_force_weft_cond2 = data.tear_force_weft_cond2;
                  var tear_force_weft_unit = data.tear_force_weft_unit;


                  $.ajax(
                  {
                      url: "multiple_copy_insert_into_raising_database.php",
                      method: "POST",
                      data: 
                      {
                          pp_no_id: pp_no_id, 
                          pp_version: pp_version, 
                          pp_version_standard: pp_version_standard,
                          selection_of_multiple_pp_version_for_copy: selection_of_multiple_pp_version_for_copy,

                        

                        tensile_warp_cond1 : tensile_warp_cond1,
                        tensile_warp_value1 : tensile_warp_value1,
                        tensile_warp_value2 : tensile_warp_value2,
                        tensile_warp_cond2 : tensile_warp_cond2,
                        tensile_warp_unit : tensile_warp_unit,

                        tensile_weft_cond1 : tensile_weft_cond1,
                        tensile_weft_value1 : tensile_weft_value1,
                        tensile_weft_value2 : tensile_weft_value2,
                        tensile_weft_cond2 : tensile_weft_cond2,
                        tensile_weft_unit : tensile_weft_unit,

                        tear_force_warp_cond1 : tear_force_warp_cond1,
                        tear_force_warp_value1 : tear_force_warp_value1,
                        tear_force_warp_value2 : tear_force_warp_value2,
                        tear_force_warp_cond2 : tear_force_warp_cond2,
                        tear_force_warp_unit : tear_force_warp_unit,

                        tear_force_weft_cond1 : tear_force_weft_cond1,
                        tear_force_weft_value1 : tear_force_weft_value1,
                        tear_force_weft_value2 : tear_force_weft_value2,
                        tear_force_weft_cond2 : tear_force_weft_cond2,
                        tear_force_weft_unit : tear_force_weft_unit

                      },
                      success:function(new_data)
                      {
                          //after copy then first submit change data
                          $.ajax(
                          {
                              type: "POST",
                              url: "define_view_standards.php",
                              method: "POST",
                              data: 
                              {
                                pp_no_id: pp_no_id, 
                                pp_version: pp_version,
                                pp_version_standard: pp_version_standard
                              },
                              success:function(data)
                              {
                                  $('#retrieve_general_data').html(data);
                                  $('select#pp_version_standard_model').val(pp_version_standard);
                                  $('#others_retrieve_general_data').html("");
                              }
                          });
                          //and then after submit button next the change occure
                          view_standard_select(pp_version_standard);
                      }
                  });
                   
              }

          });
      }

      else if (pp_version_standard == 16)
      {
          $.ajax(
          {
              type: "POST",
              url: "ready_for_raising_issunce_copy.php",
              method: "POST",
              dataType:"JSON",
              data: 
              {
                ready_for_raising_standard_id: standard_id
              },
              success:function(data)
              {
                  $('#others_retrieve_general_data').html("");

                  var tensile_warp_cond1 = data.tensile_warp_cond1;
                  var tensile_warp_value1 = data.tensile_warp_value1;
                  var tensile_warp_value2 = data.tensile_warp_value2;
                  var tensile_warp_cond2 = data.tensile_warp_cond2;
                  var tensile_warp_unit = data.tensile_warp_unit;

                  var tensile_weft_cond1 = data.tensile_weft_cond1;
                  var tensile_weft_value1 = data.tensile_weft_value1;
                  var tensile_weft_value2 = data.tensile_weft_value2;
                  var tensile_weft_cond2 = data.tensile_weft_cond2;
                  var tensile_weft_unit = data.tensile_weft_unit;

                  var tear_force_warp_cond1 = data.tear_force_warp_cond1;
                  var tear_force_warp_value1 = data.tear_force_warp_value1;
                  var tear_force_warp_value2 = data.tear_force_warp_value2;
                  var tear_force_warp_cond2 = data.tear_force_warp_cond2;
                  var tear_force_warp_unit = data.tear_force_warp_unit;

                  var tear_force_weft_cond1 = data.tear_force_weft_cond1;
                  var tear_force_weft_value1 = data.tear_force_weft_value1;
                  var tear_force_weft_value2 = data.tear_force_weft_value2;
                  var tear_force_weft_cond2 = data.tear_force_weft_cond2;
                  var tear_force_weft_unit = data.tear_force_weft_unit;


                  $.ajax(
                  {
                      url: "multiple_copy_insert_into_ready_raising_database.php",
                      method: "POST",
                      data: 
                      {
                          pp_no_id: pp_no_id, 
                          pp_version: pp_version, 
                          pp_version_standard: pp_version_standard,
                          selection_of_multiple_pp_version_for_copy: selection_of_multiple_pp_version_for_copy,

                        

                        tensile_warp_cond1 : tensile_warp_cond1,
                        tensile_warp_value1 : tensile_warp_value1,
                        tensile_warp_value2 : tensile_warp_value2,
                        tensile_warp_cond2 : tensile_warp_cond2,
                        tensile_warp_unit : tensile_warp_unit,

                        tensile_weft_cond1 : tensile_weft_cond1,
                        tensile_weft_value1 : tensile_weft_value1,
                        tensile_weft_value2 : tensile_weft_value2,
                        tensile_weft_cond2 : tensile_weft_cond2,
                        tensile_weft_unit : tensile_weft_unit,

                        tear_force_warp_cond1 : tear_force_warp_cond1,
                        tear_force_warp_value1 : tear_force_warp_value1,
                        tear_force_warp_value2 : tear_force_warp_value2,
                        tear_force_warp_cond2 : tear_force_warp_cond2,
                        tear_force_warp_unit : tear_force_warp_unit,

                        tear_force_weft_cond1 : tear_force_weft_cond1,
                        tear_force_weft_value1 : tear_force_weft_value1,
                        tear_force_weft_value2 : tear_force_weft_value2,
                        tear_force_weft_cond2 : tear_force_weft_cond2,
                        tear_force_weft_unit : tear_force_weft_unit

                      },
                      success:function(new_data)
                      {
                          //after copy then first submit change data
                          $.ajax(
                          {
                              type: "POST",
                              url: "define_view_standards.php",
                              method: "POST",
                              data: 
                              {
                                pp_no_id: pp_no_id, 
                                pp_version: pp_version,
                                pp_version_standard: pp_version_standard
                              },
                              success:function(data)
                              {
                                  $('#retrieve_general_data').html(data);
                                  $('select#pp_version_standard_model').val(pp_version_standard);
                                  $('#others_retrieve_general_data').html("");
                              }
                          });
                          //and then after submit button next the change occure
                          view_standard_select(pp_version_standard);
                      }
                  });
                   
              }

          });
      }

      else if (pp_version_standard == 17)
      {
          $.ajax(
          {
              type: "POST",
              url: "ready_for_print_issunce_copy.php",
              method: "POST",
              dataType:"JSON",
              data: 
              {
                ready_for_print_standard_id: standard_id
              },
              success:function(data)
              {
                  $('#others_retrieve_general_data').html("");

                  var whiteness_cond1 = data.whiteness_cond1;
                  var whiteness_value1 = data.whiteness_value1;
                  var whiteness_value2 = data.whiteness_value2;
                  var whiteness_cond2 = data.whiteness_cond2;

                  var bowing_and_skew_cond1 = data.bowing_and_skew_cond1;
                  var bowing_and_skew_value1 = data.bowing_and_skew_value1;
                  var bowing_and_skew_value2 = data.bowing_and_skew_value2;
                  var bowing_and_skew_cond2 = data.bowing_and_skew_cond2;

                  var ph_cond1 = data.ph_cond1;
                  var ph_value1 = data.ph_value1;
                  var ph_value2 = data.ph_value2;
                  var ph_cond2 = data.ph_cond2;

                  $.ajax(
                  {
                      url: "multiple_copy_insert_into_ready_for_print_database.php",
                      method: "POST",
                      data: {
                        pp_no_id: pp_no_id, 
                        pp_version: pp_version, 
                        pp_version_standard: pp_version_standard,
                        selection_of_multiple_pp_version_for_copy: selection_of_multiple_pp_version_for_copy,

                        whiteness_cond1: whiteness_cond1,
                        whiteness_value1: whiteness_value1,
                        whiteness_value2: whiteness_value2,
                        whiteness_cond2: whiteness_cond2,

                        bowing_and_skew_cond1: bowing_and_skew_cond1,
                        bowing_and_skew_value1: bowing_and_skew_value1,
                        bowing_and_skew_value2: bowing_and_skew_value2,
                        bowing_and_skew_cond2: bowing_and_skew_cond2,

                        ph_cond1: ph_cond1,
                        ph_value1: ph_value1,
                        ph_value2: ph_value2,
                        ph_cond2: ph_cond2

                      },
                      success:function(new_data)
                      {
                          //after copy then first submit change data
                          $.ajax(
                          {
                              type: "POST",
                              url: "define_view_standards.php",
                              method: "POST",
                              data: 
                              {
                                pp_no_id: pp_no_id, 
                                pp_version: pp_version,
                                pp_version_standard: pp_version_standard
                              },
                              success:function(data)
                              {
                                  $('#retrieve_general_data').html(data);
                                  $('select#pp_version_standard_model').val(pp_version_standard);
                                  $('#others_retrieve_general_data').html("");
                              }
                          });
                          //and then after submit button next the change occure
                          view_standard_select(pp_version_standard);
                      }
                  });
                   
              }
          });
      }

      else if (pp_version_standard == 18)
      {
          $.ajax(
          {
              type: "POST",
              url: "ready_for_dying_issunce_copy.php",
              method: "POST",
              dataType:"JSON",
              data: 
              {
                ready_for_dying_standard_id: standard_id
              },
              success:function(data)
              {
                  $('#others_retrieve_general_data').html("");

                  var whiteness_cond1 = data.whiteness_cond1;
                  var whiteness_value1 = data.whiteness_value1;
                  var whiteness_value2 = data.whiteness_value2;
                  var whiteness_cond2 = data.whiteness_cond2;

                  var bowing_and_skew_cond1 = data.bowing_and_skew_cond1;
                  var bowing_and_skew_value1 = data.bowing_and_skew_value1;
                  var bowing_and_skew_value2 = data.bowing_and_skew_value2;
                  var bowing_and_skew_cond2 = data.bowing_and_skew_cond2;

                  var ph_cond1 = data.ph_cond1;
                  var ph_value1 = data.ph_value1;
                  var ph_value2 = data.ph_value2;
                  var ph_cond2 = data.ph_cond2;

                  $.ajax(
                  {
                      url: "multiple_copy_insert_into_ready_for_dying_database.php",
                      method: "POST",
                      data: {
                        pp_no_id: pp_no_id, 
                        pp_version: pp_version, 
                        pp_version_standard: pp_version_standard,
                        selection_of_multiple_pp_version_for_copy: selection_of_multiple_pp_version_for_copy,

                        whiteness_cond1: whiteness_cond1,
                        whiteness_value1: whiteness_value1,
                        whiteness_value2: whiteness_value2,
                        whiteness_cond2: whiteness_cond2,

                        bowing_and_skew_cond1: bowing_and_skew_cond1,
                        bowing_and_skew_value1: bowing_and_skew_value1,
                        bowing_and_skew_value2: bowing_and_skew_value2,
                        bowing_and_skew_cond2: bowing_and_skew_cond2,

                        ph_cond1: ph_cond1,
                        ph_value1: ph_value1,
                        ph_value2: ph_value2,
                        ph_cond2: ph_cond2

                      },
                      success:function(new_data)
                      {
                          //after copy then first submit change data
                          $.ajax(
                          {
                              type: "POST",
                              url: "define_view_standards.php",
                              method: "POST",
                              data: 
                              {
                                pp_no_id: pp_no_id, 
                                pp_version: pp_version,
                                pp_version_standard: pp_version_standard
                              },
                              success:function(data)
                              {
                                  $('#retrieve_general_data').html(data);
                                  $('select#pp_version_standard_model').val(pp_version_standard);
                                  $('#others_retrieve_general_data').html("");
                              }
                          });
                          //and then after submit button next the change occure
                          view_standard_select(pp_version_standard);
                      }
                  });
                   
              }
          });
      }

      else
      {

      }
      
  }


  function copy_greige_issunce(standard_id)
  {
      $('.bs-example-modal-lg').modal('hide');
      var pp_no_id = document.getElementById("pp_no_id").value;
      var pp_version = document.getElementById("pp_version_for_this").value;
      var pp_version_standard = document.getElementById("pp_version_standard").value;
      if (pp_version_standard == 1) 
      {
          $.ajax(
          {
              type: "POST",
              url: "greige_issunce_copy.php",
              method: "POST",
              dataType:"JSON",
              data: 
              {
                greige_standard_id: standard_id
              },
              success:function(data)
              {
                  $('#others_retrieve_general_data').html("");

                  var yarn_warp_value2 = data.yarn_warp_value2;
                  var yarn_warp_value1 = data.yarn_warp_value1;
                  var yarn_warp_cond1 = data.yarn_warp_cond1;
                  var yarn_warp_cond2 = data.yarn_warp_cond2;

                  var yarn_weft_value2 = data.yarn_weft_value2;
                  var yarn_weft_value1 = data.yarn_weft_value1;
                  var yarn_weft_cond1 = data.yarn_weft_cond1;
                  var yarn_weft_cond2 = data.yarn_weft_cond2;

                  var thread_epi_cond1 = data.thread_epi_cond1;
                  var thread_epi_value1 = data.thread_epi_value1;
                  var thread_epi_value2 = data.thread_epi_value2;
                  var thread_epi_cond2 = data.thread_epi_cond2;

                  var thread_ppi_cond1 = data.thread_ppi_cond1;
                  var thread_ppi_value1 = data.thread_ppi_value1;
                  var thread_ppi_value2 = data.thread_ppi_value2;
                  var thread_ppi_cond2 = data.thread_ppi_cond2;

                  var gsm_warp_value2 = data.gsm_warp_value2;
                  var gsm_warp_value1 = data.gsm_warp_value1;
                  var gsm_warp_cond1 = data.gsm_warp_cond1;
                  var gsm_warp_cond2 = data.gsm_warp_cond2;

                  var fiber_content_select = data.fiber_content_select;

                  var fiber_total_name_polyester = data.fiber_total_name_polyester;
                  var fiber_total_polyester_value2 = data.fiber_total_polyester_value2;
                  var fiber_total_polyester_value1 = data.fiber_total_polyester_value1;
                  var fiber_total_polyester_cond1 = data.fiber_total_polyester_cond1;
                  var fiber_total_polyester_cond2 = data.fiber_total_polyester_cond2;

                  var fiber_total_name_cotton = data.fiber_total_name_cotton;
                  var fiber_total_cotton_value2 = data.fiber_total_cotton_value2;
                  var fiber_total_cotton_value1 = data.fiber_total_cotton_value1;
                  var fiber_total_cotton_cond1 = data.fiber_total_cotton_cond1;
                  var fiber_total_cotton_cond2 = data.fiber_total_cotton_cond2;

                  var fiber_total_name_thired = data.fiber_total_name_thired;
                  var fiber_total_thired_value2 = data.fiber_total_thired_value2;
                  var fiber_total_thired_value1 = data.fiber_total_thired_value1;
                  var fiber_total_thired_cond1 = data.fiber_total_thired_cond1;
                  var fiber_total_thired_cond2 = data.fiber_total_thired_cond2;

                  var fiber_total_name_fourth = data.fiber_total_name_fourth;
                  var fiber_total_fourth_value2 = data.fiber_total_fourth_value2;
                  var fiber_total_fourth_value1 = data.fiber_total_fourth_value1;
                  var fiber_total_fourth_cond1 = data.fiber_total_fourth_cond1;
                  var fiber_total_fourth_cond2 = data.fiber_total_fourth_cond2;

                  var fiber_warp_name_polyester = data.fiber_warp_name_polyester;
                  var fiber_warp_polyester_value2 = data.fiber_warp_polyester_value2;
                  var fiber_warp_polyester_value1 = data.fiber_warp_polyester_value1;
                  var fiber_warp_polyester_cond1 = data.fiber_warp_polyester_cond1;
                  var fiber_warp_polyester_cond2 = data.fiber_warp_polyester_cond2;

                  var fiber_warp_name_cotton = data.fiber_warp_name_cotton;
                  var fiber_warp_cotton_value2 = data.fiber_warp_cotton_value2;
                  var fiber_warp_cotton_value1 = data.fiber_warp_cotton_value1;
                  var fiber_warp_cotton_cond1 = data.fiber_warp_cotton_cond1;
                  var fiber_warp_cotton_cond2 = data.fiber_warp_cotton_cond2;

                  var fiber_warp_name_thired = data.fiber_warp_name_thired;
                  var fiber_warp_thired_value2 = data.fiber_warp_thired_value2;
                  var fiber_warp_thired_value1 = data.fiber_warp_thired_value1;
                  var fiber_warp_thired_cond1 = data.fiber_warp_thired_cond1;
                  var fiber_warp_thired_cond2 = data.fiber_warp_thired_cond2;

                  var fiber_warp_name_fourth = data.fiber_warp_name_fourth;
                  var fiber_warp_fourth_value2 = data.fiber_warp_fourth_value2;
                  var fiber_warp_fourth_value1 = data.fiber_warp_fourth_value1;
                  var fiber_warp_fourth_cond1 = data.fiber_warp_fourth_cond1;
                  var fiber_warp_fourth_cond2 = data.fiber_warp_fourth_cond2;

                  var fiber_weft_name_polyester = data.fiber_weft_name_polyester;
                  var fiber_weft_polyester_value2 = data.fiber_weft_polyester_value2;
                  var fiber_weft_polyester_value1 = data.fiber_weft_polyester_value1;
                  var fiber_weft_polyester_cond1 = data.fiber_weft_polyester_cond1;
                  var fiber_weft_polyester_cond2 = data.fiber_weft_polyester_cond2;

                  var fiber_weft_name_cotton = data.fiber_weft_name_cotton;
                  var fiber_weft_cotton_value2 = data.fiber_weft_cotton_value2;
                  var fiber_weft_cotton_value1 = data.fiber_weft_cotton_value1;
                  var fiber_weft_cotton_cond1 = data.fiber_weft_cotton_cond1;
                  var fiber_weft_cotton_cond2 = data.fiber_weft_cotton_cond2;

                  var fiber_weft_name_thired = data.fiber_weft_name_thired;
                  var fiber_weft_thired_value2 = data.fiber_weft_thired_value2;
                  var fiber_weft_thired_value1 = data.fiber_weft_thired_value1;
                  var fiber_weft_thired_cond1 = data.fiber_weft_thired_cond1;
                  var fiber_weft_thired_cond2 = data.fiber_weft_thired_cond2;

                  var fiber_weft_name_fourth = data.fiber_weft_name_fourth;
                  var fiber_weft_fourth_value2 = data.fiber_weft_fourth_value2;
                  var fiber_weft_fourth_value1 = data.fiber_weft_fourth_value1;
                  var fiber_weft_fourth_cond1 = data.fiber_weft_fourth_cond1;
                  var fiber_weft_fourth_cond2 = data.fiber_weft_fourth_cond2;

                  $.ajax(
                  {
                      url: "view_standard_select.php",
                      method: "POST",
                      data: {
                        pp_no_id: pp_no_id, 
                        pp_version: pp_version, 
                        pp_version_standard: pp_version_standard,

                        yarn_weft_cond1: yarn_weft_cond1,
                        yarn_weft_cond2: yarn_weft_cond2,
                        yarn_weft_value2: yarn_weft_value2,
                        yarn_weft_value1: yarn_weft_value1,

                        yarn_warp_cond1: yarn_warp_cond1,
                        yarn_warp_cond2: yarn_warp_cond2,
                        yarn_warp_value2: yarn_warp_value2,
                        yarn_warp_value1: yarn_warp_value1,

                        thread_epi_cond1: thread_epi_cond1,
                        thread_epi_value1: thread_epi_value1,
                        thread_epi_value2: thread_epi_value2,
                        thread_epi_cond2: thread_epi_cond2,

                        thread_ppi_cond1: thread_ppi_cond1,
                        thread_ppi_value1: thread_ppi_value1,
                        thread_ppi_value2: thread_ppi_value2,
                        thread_ppi_cond2: thread_ppi_cond2,

                        gsm_warp_cond1: gsm_warp_cond1,
                        gsm_warp_cond2: gsm_warp_cond2,
                        gsm_warp_value2: gsm_warp_value2,
                        gsm_warp_value1: gsm_warp_value1,

                        fiber_content_select: fiber_content_select,

                        fiber_total_name_polyester: fiber_total_name_polyester,
                        fiber_total_polyester_cond1: fiber_total_polyester_cond1,
                        fiber_total_polyester_cond2: fiber_total_polyester_cond2,
                        fiber_total_polyester_value2: fiber_total_polyester_value2,
                        fiber_total_polyester_value1: fiber_total_polyester_value1,

                        fiber_total_name_cotton: fiber_total_name_cotton,
                        fiber_total_cotton_cond1: fiber_total_cotton_cond1,
                        fiber_total_cotton_cond2: fiber_total_cotton_cond2,
                        fiber_total_cotton_value2: fiber_total_cotton_value2,
                        fiber_total_cotton_value1: fiber_total_cotton_value1,

                        fiber_total_name_thired: fiber_total_name_thired,
                        fiber_total_thired_cond1: fiber_total_thired_cond1,
                        fiber_total_thired_cond2: fiber_total_thired_cond2,
                        fiber_total_thired_value2: fiber_total_thired_value2,
                        fiber_total_thired_value1: fiber_total_thired_value1,

                        fiber_total_name_fourth: fiber_total_name_fourth,
                        fiber_total_fourth_cond1: fiber_total_fourth_cond1,
                        fiber_total_fourth_cond2: fiber_total_fourth_cond2,
                        fiber_total_fourth_value2: fiber_total_fourth_value2,
                        fiber_total_fourth_value1: fiber_total_fourth_value1,

                        fiber_warp_name_polyester: fiber_warp_name_polyester,
                        fiber_warp_polyester_cond1: fiber_warp_polyester_cond1,
                        fiber_warp_polyester_cond2: fiber_warp_polyester_cond2,
                        fiber_warp_polyester_value2: fiber_warp_polyester_value2,
                        fiber_warp_polyester_value1: fiber_warp_polyester_value1,

                        fiber_warp_name_cotton: fiber_warp_name_cotton,
                        fiber_warp_cotton_cond1: fiber_warp_cotton_cond1,
                        fiber_warp_cotton_cond2: fiber_warp_cotton_cond2,
                        fiber_warp_cotton_value2: fiber_warp_cotton_value2,
                        fiber_warp_cotton_value1: fiber_warp_cotton_value1,

                        fiber_warp_name_thired: fiber_warp_name_thired,
                        fiber_warp_thired_cond1: fiber_warp_thired_cond1,
                        fiber_warp_thired_cond2: fiber_warp_thired_cond2,
                        fiber_warp_thired_value2: fiber_warp_thired_value2,
                        fiber_warp_thired_value1: fiber_warp_thired_value1,

                        fiber_warp_name_fourth: fiber_warp_name_fourth,
                        fiber_warp_fourth_cond1: fiber_warp_fourth_cond1,
                        fiber_warp_fourth_cond2: fiber_warp_fourth_cond2,
                        fiber_warp_fourth_value2: fiber_warp_fourth_value2,
                        fiber_warp_fourth_value1: fiber_warp_fourth_value1,

                        fiber_weft_name_polyester: fiber_weft_name_polyester,
                        fiber_weft_polyester_cond1: fiber_weft_polyester_cond1,
                        fiber_weft_polyester_cond2: fiber_weft_polyester_cond2,
                        fiber_weft_polyester_value2: fiber_weft_polyester_value2,
                        fiber_weft_polyester_value1: fiber_weft_polyester_value1,

                        fiber_weft_name_cotton: fiber_weft_name_cotton,
                        fiber_weft_cotton_cond1: fiber_weft_cotton_cond1,
                        fiber_weft_cotton_cond2: fiber_weft_cotton_cond2,
                        fiber_weft_cotton_value2: fiber_weft_cotton_value2,
                        fiber_weft_cotton_value1: fiber_weft_cotton_value1,

                        fiber_weft_name_thired: fiber_weft_name_thired,
                        fiber_weft_thired_cond1: fiber_weft_thired_cond1,
                        fiber_weft_thired_cond2: fiber_weft_thired_cond2,
                        fiber_weft_thired_value2: fiber_weft_thired_value2,
                        fiber_weft_thired_value1: fiber_weft_thired_value1,

                        fiber_weft_name_fourth: fiber_weft_name_fourth,
                        fiber_weft_fourth_cond1: fiber_weft_fourth_cond1,
                        fiber_weft_fourth_cond2: fiber_weft_fourth_cond2,
                        fiber_weft_fourth_value2: fiber_weft_fourth_value2,
                        fiber_weft_fourth_value1: fiber_weft_fourth_value1,

                      },
                      success:function(new_data)
                      {
                          $('#others_retrieve_general_data').html(new_data);
                      }
                  });
                   
              }
          });
      }

      else if (pp_version_standard == 2)
      {
          $.ajax(
          {
              type: "POST",
              url: "singe_issunce_copy.php",
              method: "POST",
              dataType:"JSON",
              data: 
              {
                singe_standard_id: standard_id
              },
              success:function(data)
              {
                  $('#others_retrieve_general_data').html("");

                  var intensity_cond1 = data.intensity_cond1;
                  var intensity_value1 = data.intensity_value1;
                  var intensity_value2 = data.intensity_value2;
                  var intensity_cond2 = data.intensity_cond2;

                  var speed_cond1 = data.speed_cond1;
                  var speed_value1 = data.speed_value1;
                  var speed_value2 = data.speed_value2;
                  var speed_cond2 = data.speed_cond2;

                  var temp_cond1 = data.temp_cond1;
                  var temp_value1 = data.temp_value1;
                  var temp_value2 = data.temp_value2;
                  var temp_cond2 = data.temp_cond2;

                  var ph_cond1 = data.ph_cond1;
                  var ph_value1 = data.ph_value1;
                  var ph_value2 = data.ph_value2;
                  var ph_cond2 = data.ph_cond2;

                  $.ajax(
                  {
                      url: "view_standard_select.php",
                      method: "POST",
                      data: {
                        pp_no_id: pp_no_id, 
                        pp_version: pp_version, 
                        pp_version_standard: pp_version_standard,

                        intensity_cond1: intensity_cond1,
                        intensity_value1: intensity_value1,
                        intensity_value2: intensity_value2,
                        intensity_cond2: intensity_cond2,

                        speed_cond1: speed_cond1,
                        speed_value1: speed_value1,
                        speed_value2: speed_value2,
                        speed_cond2: speed_cond2,

                        temp_cond1: temp_cond1,
                        temp_value1: temp_value1,
                        temp_value2: temp_value2,
                        temp_cond2: temp_cond2,

                        ph_cond1: ph_cond1,
                        ph_value1: ph_value1,
                        ph_value2: ph_value2,
                        ph_cond2: ph_cond2

                      },
                      success:function(new_data)
                      {
                          $('#others_retrieve_general_data').html(new_data);
                      }
                  });
                   
              }
          });
      }

      else if (pp_version_standard == 3)
      {
          $.ajax(
          {
              type: "POST",
              url: "bleaching_issunce_copy.php",
              method: "POST",
              dataType:"JSON",
              data: 
              {
                bleaching_standard_id: standard_id
              },
              success:function(data)
              {
                  $('#others_retrieve_general_data').html("");

                  var absorbency_cond1 = data.absorbency_cond1;
                  var absorbency_value1 = data.absorbency_value1;
                  var absorbency_value2 = data.absorbency_value2;
                  var absorbency_cond2 = data.absorbency_cond2;

                  var sizing_cond1 = data.sizing_cond1;
                  var sizing_value1 = data.sizing_value1;
                  var sizing_value2 = data.sizing_value2;
                  var sizing_cond2 = data.sizing_cond2;

                  var whiteness_cond1 = data.whiteness_cond1;
                  var whiteness_value1 = data.whiteness_value1;
                  var whiteness_value2 = data.whiteness_value2;
                  var whiteness_cond2 = data.whiteness_cond2;

                  var pilling_cond1 = data.pilling_cond1;
                  var pilling_value1 = data.pilling_value1;
                  var pilling_value2 = data.pilling_value2;
                  var pilling_cond2 = data.pilling_cond2;

                  var ph_cond1 = data.ph_cond1;
                  var ph_value1 = data.ph_value1;
                  var ph_value2 = data.ph_value2;
                  var ph_cond2 = data.ph_cond2;

                  $.ajax(
                  {
                      url: "view_standard_select.php",
                      method: "POST",
                      data: {
                        pp_no_id: pp_no_id, 
                        pp_version: pp_version, 
                        pp_version_standard: pp_version_standard,

                        absorbency_cond1: absorbency_cond1,
                        absorbency_value1: absorbency_value1,
                        absorbency_value2: absorbency_value2,
                        absorbency_cond2: absorbency_cond2,

                        sizing_cond1: sizing_cond1,
                        sizing_value1: sizing_value1,
                        sizing_value2: sizing_value2,
                        sizing_cond2: sizing_cond2,

                        whiteness_cond1: whiteness_cond1,
                        whiteness_value1: whiteness_value1,
                        whiteness_value2: whiteness_value2,
                        whiteness_cond2: whiteness_cond2,

                        pilling_cond1: pilling_cond1,
                        pilling_value1: pilling_value1,
                        pilling_value2: pilling_value2,
                        pilling_cond2: pilling_cond2,

                        ph_cond1: ph_cond1,
                        ph_value1: ph_value1,
                        ph_value2: ph_value2,
                        ph_cond2: ph_cond2

                      },
                      success:function(new_data)
                      {
                          $('#others_retrieve_general_data').html(new_data);
                      }
                  });
                   
              }
          });
      }


      else if (pp_version_standard == 4)
      {
          $.ajax(
          {
              type: "POST",
              url: "ready_mercerize_issunce_copy.php",
              method: "POST",
              dataType:"JSON",
              data: 
              {
                ready_mercerize_standard_id: standard_id
              },
              success:function(data)
              {
                  $('#others_retrieve_general_data').html("");

                  var whiteness_cond1 = data.whiteness_cond1;
                  var whiteness_value1 = data.whiteness_value1;
                  var whiteness_value2 = data.whiteness_value2;
                  var whiteness_cond2 = data.whiteness_cond2;

                  var bowing_and_skew_cond1 = data.bowing_and_skew_cond1;
                  var bowing_and_skew_value1 = data.bowing_and_skew_value1;
                  var bowing_and_skew_value2 = data.bowing_and_skew_value2;
                  var bowing_and_skew_cond2 = data.bowing_and_skew_cond2;

                  var ph_cond1 = data.ph_cond1;
                  var ph_value1 = data.ph_value1;
                  var ph_value2 = data.ph_value2;
                  var ph_cond2 = data.ph_cond2;

                  $.ajax(
                  {
                      url: "view_standard_select.php",
                      method: "POST",
                      data: {
                        pp_no_id: pp_no_id, 
                        pp_version: pp_version, 
                        pp_version_standard: pp_version_standard,

                        whiteness_cond1: whiteness_cond1,
                        whiteness_value1: whiteness_value1,
                        whiteness_value2: whiteness_value2,
                        whiteness_cond2: whiteness_cond2,

                        bowing_and_skew_cond1: bowing_and_skew_cond1,
                        bowing_and_skew_value1: bowing_and_skew_value1,
                        bowing_and_skew_value2: bowing_and_skew_value2,
                        bowing_and_skew_cond2: bowing_and_skew_cond2,

                        ph_cond1: ph_cond1,
                        ph_value1: ph_value1,
                        ph_value2: ph_value2,
                        ph_cond2: ph_cond2

                      },
                      success:function(new_data)
                      {
                          $('#others_retrieve_general_data').html(new_data);
                      }
                  });
                   
              }
          });
      }


      else if (pp_version_standard == 5)
      {
          $.ajax(
          {
              type: "POST",
              url: "mercerize_issunce_copy.php",
              method: "POST",
              dataType:"JSON",
              data: 
              {
                mercerize_standard_id: standard_id
              },
              success:function(data)
              {
                  $('#others_retrieve_general_data').html("");

                  var absorbency_cond1 = data.absorbency_cond1;
                  var absorbency_value1 = data.absorbency_value1;
                  var absorbency_value2 = data.absorbency_value2;
                  var absorbency_cond2 = data.absorbency_cond2;

                   var sizing_cond1 = data.sizing_cond1;
                  var sizing_value1 = data.sizing_value1;
                  var sizing_value2 = data.sizing_value2;
                  var sizing_cond2 = data.sizing_cond2;

                  var whiteness_cond1 = data.whiteness_cond1;
                  var whiteness_value1 = data.whiteness_value1;
                  var whiteness_value2 = data.whiteness_value2;
                  var whiteness_cond2 = data.whiteness_cond2;

                  var ph_cond1 = data.ph_cond1;
                  var ph_value1 = data.ph_value1;
                  var ph_value2 = data.ph_value2;
                  var ph_cond2 = data.ph_cond2;

                  $.ajax(
                  {
                      url: "view_standard_select.php",
                      method: "POST",
                      data: {
                        pp_no_id: pp_no_id, 
                        pp_version: pp_version, 
                        pp_version_standard: pp_version_standard,

                        absorbency_cond1: absorbency_cond1,
                        absorbency_value1: absorbency_value1,
                        absorbency_value2: absorbency_value2,
                        absorbency_cond2: absorbency_cond2,

                        sizing_cond1: sizing_cond1,
                        sizing_value1: sizing_value1,
                        sizing_value2: sizing_value2,
                        sizing_cond2: sizing_cond2,

                        whiteness_cond1: whiteness_cond1,
                        whiteness_value1: whiteness_value1,
                        whiteness_value2: whiteness_value2,
                        whiteness_cond2: whiteness_cond2,

                        ph_cond1: ph_cond1,
                        ph_value1: ph_value1,
                        ph_value2: ph_value2,
                        ph_cond2: ph_cond2

                      },
                      success:function(new_data)
                      {
                          $('#others_retrieve_general_data').html(new_data);
                      }
                  });
                   
              }
          });
      }

      else if (pp_version_standard == 6)
      {
          $.ajax(
          {
              type: "POST",
              url: "equalize_issunce_copy.php",
              method: "POST",
              dataType:"JSON",
              data: 
              {
                equalize_standard_id: standard_id
              },
              success:function(data)
              {
                  $('#others_retrieve_general_data').html("");

                  var whiteness_cond1 = data.whiteness_cond1;
                  var whiteness_value1 = data.whiteness_value1;
                  var whiteness_value2 = data.whiteness_value2;
                  var whiteness_cond2 = data.whiteness_cond2;

                  var bowing_and_skew_cond1 = data.bowing_and_skew_cond1;
                  var bowing_and_skew_value1 = data.bowing_and_skew_value1;
                  var bowing_and_skew_value2 = data.bowing_and_skew_value2;
                  var bowing_and_skew_cond2 = data.bowing_and_skew_cond2;

                  var ph_cond1 = data.ph_cond1;
                  var ph_value1 = data.ph_value1;
                  var ph_value2 = data.ph_value2;
                  var ph_cond2 = data.ph_cond2;

                  $.ajax(
                  {
                      url: "view_standard_select.php",
                      method: "POST",
                      data: {
                        pp_no_id: pp_no_id, 
                        pp_version: pp_version, 
                        pp_version_standard: pp_version_standard,

                        whiteness_cond1: whiteness_cond1,
                        whiteness_value1: whiteness_value1,
                        whiteness_value2: whiteness_value2,
                        whiteness_cond2: whiteness_cond2,

                        bowing_and_skew_cond1: bowing_and_skew_cond1,
                        bowing_and_skew_value1: bowing_and_skew_value1,
                        bowing_and_skew_value2: bowing_and_skew_value2,
                        bowing_and_skew_cond2: bowing_and_skew_cond2,

                        ph_cond1: ph_cond1,
                        ph_value1: ph_value1,
                        ph_value2: ph_value2,
                        ph_cond2: ph_cond2

                      },
                      success:function(new_data)
                      {
                          $('#others_retrieve_general_data').html(new_data);
                      }
                  });
                   
              }
          });
      }

      else if (pp_version_standard == 7)
      {
          $.ajax(
          {
              type: "POST",
              url: "printing_issunce_copy.php",
              method: "POST",
              dataType:"JSON",
              data: 
              {
                printing_standard_id: standard_id
              },
              success:function(data)
              {
                  $('#others_retrieve_general_data').html("");

                  var rubbing_dry_cond1 = data.rubbing_dry_cond1;
                  var rubbing_dry_value1 = data.rubbing_dry_value1;
                  var rubbing_dry_value2 = data.rubbing_dry_value2;
                  var rubbing_dry_cond2 = data.rubbing_dry_cond2;

                  var rubbing_wet_cond1 = data.rubbing_wet_cond1;
                  var rubbing_wet_value1 = data.rubbing_wet_value1;
                  var rubbing_wet_value2 = data.rubbing_wet_value2;
                  var rubbing_wet_cond2 = data.rubbing_wet_cond2;

                  $.ajax(
                  {
                      url: "view_standard_select.php",
                      method: "POST",
                      data: {
                        pp_no_id: pp_no_id, 
                        pp_version: pp_version, 
                        pp_version_standard: pp_version_standard,

                        rubbing_dry_cond1: rubbing_dry_cond1,
                        rubbing_dry_value1: rubbing_dry_value1,
                        rubbing_dry_value2: rubbing_dry_value2,
                        rubbing_dry_cond2: rubbing_dry_cond2,

                        rubbing_wet_cond1: rubbing_wet_cond1,
                        rubbing_wet_value1: rubbing_wet_value1,
                        rubbing_wet_value2: rubbing_wet_value2,
                        rubbing_wet_cond2: rubbing_wet_cond2

                      },
                      success:function(new_data)
                      {
                          $('#others_retrieve_general_data').html(new_data);
                      }
                  });
                   
              }
          });
      }


      else if (pp_version_standard == 8)
      {
          $.ajax(
          {
              type: "POST",
              url: "curing_issunce_copy.php",
              method: "POST",
              dataType:"JSON",
              data: 
              {
                curing_standard_id: standard_id
              },
              success:function(data)
              {
                  $('#others_retrieve_general_data').html("");

                  var rubbing_dry_cond1 = data.rubbing_dry_cond1;
                  var rubbing_dry_value1 = data.rubbing_dry_value1;
                  var rubbing_dry_value2 = data.rubbing_dry_value2;
                  var rubbing_dry_cond2 = data.rubbing_dry_cond2;

                  var rubbing_wet_cond1 = data.rubbing_wet_cond1;
                  var rubbing_wet_value1 = data.rubbing_wet_value1;
                  var rubbing_wet_value2 = data.rubbing_wet_value2;
                  var rubbing_wet_cond2 = data.rubbing_wet_cond2;

                  var time_cond1 = data.time_cond1;
                  var time_value1 = data.time_value1;
                  var time_value2 = data.time_value2;
                  var time_cond2 = data.time_cond2;

                  var temp_cond1 = data.temp_cond1;
                  var temp_value1 = data.temp_value1;
                  var temp_value2 = data.temp_value2;
                  var temp_cond2 = data.temp_cond2;

                  var yarn_warp_value2 = data.yarn_warp_value2;
                  var yarn_warp_value1 = data.yarn_warp_value1;
                  var yarn_warp_cond1 = data.yarn_warp_cond1;
                  var yarn_warp_cond2 = data.yarn_warp_cond2;

                  var yarn_weft_value2 = data.yarn_weft_value2;
                  var yarn_weft_value1 = data.yarn_weft_value1;
                  var yarn_weft_cond1 = data.yarn_weft_cond1;
                  var yarn_weft_cond2 = data.yarn_weft_cond2;

                  var thread_epi_cond1 = data.thread_epi_cond1;
                  var thread_epi_value1 = data.thread_epi_value1;
                  var thread_epi_value2 = data.thread_epi_value2;
                  var thread_epi_cond2 = data.thread_epi_cond2;

                  var thread_ppi_cond1 = data.thread_ppi_cond1;
                  var thread_ppi_value1 = data.thread_ppi_value1;
                  var thread_ppi_value2 = data.thread_ppi_value2;
                  var thread_ppi_cond2 = data.thread_ppi_cond2;

                  var gsm_warp_value2 = data.gsm_warp_value2;
                  var gsm_warp_value1 = data.gsm_warp_value1;
                  var gsm_warp_cond1 = data.gsm_warp_cond1;
                  var gsm_warp_cond2 = data.gsm_warp_cond2;

                  var wash_dry_warp_before_iron_cond1 = data.wash_dry_warp_before_iron_cond1;
                  var wash_dry_warp_before_iron_value1 = data.wash_dry_warp_before_iron_value1;
                  var wash_dry_warp_before_iron_value2 = data.wash_dry_warp_before_iron_value2;
                  var wash_dry_warp_before_iron_cond2 = data.wash_dry_warp_before_iron_cond2;

                  var wash_dry_weft_before_iron_cond1 = data.wash_dry_weft_before_iron_cond1;
                  var wash_dry_weft_before_iron_value1 = data.wash_dry_weft_before_iron_value1;
                  var wash_dry_weft_before_iron_value2 = data.wash_dry_weft_before_iron_value2;
                  var wash_dry_weft_before_iron_cond2 = data.wash_dry_weft_before_iron_cond2;

                  var wash_dry_warp_after_iron_value2 = data.wash_dry_warp_after_iron_value2;
                  var wash_dry_warp_after_iron_value1 = data.wash_dry_warp_after_iron_value1;
                  var wash_dry_warp_after_iron_cond1 = data.wash_dry_warp_after_iron_cond1;
                  var wash_dry_warp_after_iron_cond2 = data.wash_dry_warp_after_iron_cond2;

                  var wash_dry_weft_after_iron_cond1 = data.wash_dry_weft_after_iron_cond1;
                  var wash_dry_weft_after_iron_value1 = data.wash_dry_weft_after_iron_value1;
                  var wash_dry_weft_after_iron_value2 = data.wash_dry_weft_after_iron_value2;
                  var wash_dry_weft_after_iron_cond2 = data.wash_dry_weft_after_iron_cond2;

                  var tensile_warp_cond1 = data.tensile_warp_cond1;
                  var tensile_warp_value1 = data.tensile_warp_value1;
                  var tensile_warp_value2 = data.tensile_warp_value2;
                  var tensile_warp_cond2 = data.tensile_warp_cond2;
                  var tensile_warp_unit = data.tensile_warp_unit;

                  var tensile_weft_cond1 = data.tensile_weft_cond1;
                  var tensile_weft_value1 = data.tensile_weft_value1;
                  var tensile_weft_value2 = data.tensile_weft_value2;
                  var tensile_weft_cond2 = data.tensile_weft_cond2;
                  var tensile_weft_unit = data.tensile_weft_unit;

                  var tear_force_warp_cond1 = data.tear_force_warp_cond1;
                  var tear_force_warp_value1 = data.tear_force_warp_value1;
                  var tear_force_warp_value2 = data.tear_force_warp_value2;
                  var tear_force_warp_cond2 = data.tear_force_warp_cond2;
                  var tear_force_warp_unit = data.tear_force_warp_unit;

                  var tear_force_weft_cond1 = data.tear_force_weft_cond1;
                  var tear_force_weft_value1 = data.tear_force_weft_value1;
                  var tear_force_weft_value2 = data.tear_force_weft_value2;
                  var tear_force_weft_cond2 = data.tear_force_weft_cond2;
                  var tear_force_weft_unit = data.tear_force_weft_unit;

                  var washing_ph_cond1 = data.washing_ph_cond1;
                  var washing_ph_value1 = data.washing_ph_value1;
                  var washing_ph_value2 = data.washing_ph_value2;
                  var washing_ph_cond2 = data.washing_ph_cond2;

                  var pilling_cond1 = data.pilling_cond1;
                  var pilling_value1 = data.pilling_value1;
                  var pilling_value2 = data.pilling_value2;
                  var pilling_cond2 = data.pilling_cond2;

                  $.ajax(
                  {
                      url: "view_standard_select.php",
                      method: "POST",
                      data: {
                        pp_no_id: pp_no_id, 
                        pp_version: pp_version, 
                        pp_version_standard: pp_version_standard,

                        rubbing_dry_cond1: rubbing_dry_cond1,
                        rubbing_dry_value1: rubbing_dry_value1,
                        rubbing_dry_value2: rubbing_dry_value2,
                        rubbing_dry_cond2: rubbing_dry_cond2,

                        rubbing_wet_cond1: rubbing_wet_cond1,
                        rubbing_wet_value1: rubbing_wet_value1,
                        rubbing_wet_value2: rubbing_wet_value2,
                        rubbing_wet_cond2: rubbing_wet_cond2,

                        time_cond1: time_cond1,
                        time_value1: time_value1,
                        time_value2: time_value2,
                        time_cond2: time_cond2,

                        temp_cond1: temp_cond1,
                        temp_value1: temp_value1,
                        temp_value2: temp_value2,
                        temp_cond2: temp_cond2,

                        yarn_weft_cond1: yarn_weft_cond1,
                        yarn_weft_cond2: yarn_weft_cond2,
                        yarn_weft_value2: yarn_weft_value2,
                        yarn_weft_value1: yarn_weft_value1,

                        yarn_warp_cond1: yarn_warp_cond1,
                        yarn_warp_cond2: yarn_warp_cond2,
                        yarn_warp_value2: yarn_warp_value2,
                        yarn_warp_value1: yarn_warp_value1,

                        thread_epi_cond1: thread_epi_cond1,
                        thread_epi_value1: thread_epi_value1,
                        thread_epi_value2: thread_epi_value2,
                        thread_epi_cond2: thread_epi_cond2,

                        thread_ppi_cond1: thread_ppi_cond1,
                        thread_ppi_value1: thread_ppi_value1,
                        thread_ppi_value2: thread_ppi_value2,
                        thread_ppi_cond2: thread_ppi_cond2,

                        gsm_warp_cond1: gsm_warp_cond1,
                        gsm_warp_cond2: gsm_warp_cond2,
                        gsm_warp_value2: gsm_warp_value2,
                        gsm_warp_value1: gsm_warp_value1,

                        wash_dry_warp_before_iron_cond1 : wash_dry_warp_before_iron_cond1,
                        wash_dry_warp_before_iron_value1 : wash_dry_warp_before_iron_value1,
                        wash_dry_warp_before_iron_value2 : wash_dry_warp_before_iron_value2,
                        wash_dry_warp_before_iron_cond2 : wash_dry_warp_before_iron_cond2,

                        wash_dry_weft_before_iron_cond1 : wash_dry_weft_before_iron_cond1,
                        wash_dry_weft_before_iron_value1 : wash_dry_weft_before_iron_value1,
                        wash_dry_weft_before_iron_value2 : wash_dry_weft_before_iron_value2,
                        wash_dry_weft_before_iron_cond2 : wash_dry_weft_before_iron_cond2,

                        wash_dry_warp_after_iron_value2 : wash_dry_warp_after_iron_value2,
                        wash_dry_warp_after_iron_value1 : wash_dry_warp_after_iron_value1,
                        wash_dry_warp_after_iron_cond1 : wash_dry_warp_after_iron_cond1,
                        wash_dry_warp_after_iron_cond2 : wash_dry_warp_after_iron_cond2,

                        wash_dry_weft_after_iron_cond1 : wash_dry_weft_after_iron_cond1,
                        wash_dry_weft_after_iron_value1 : wash_dry_weft_after_iron_value1,
                        wash_dry_weft_after_iron_value2 : wash_dry_weft_after_iron_value2,
                        wash_dry_weft_after_iron_cond2 : wash_dry_weft_after_iron_cond2,

                        tensile_warp_cond1 : tensile_warp_cond1,
                        tensile_warp_value1 : tensile_warp_value1,
                        tensile_warp_value2 : tensile_warp_value2,
                        tensile_warp_cond2 : tensile_warp_cond2,
                        tensile_warp_unit : tensile_warp_unit,

                        tensile_weft_cond1 : tensile_weft_cond1,
                        tensile_weft_value1 : tensile_weft_value1,
                        tensile_weft_value2 : tensile_weft_value2,
                        tensile_weft_cond2 : tensile_weft_cond2,
                        tensile_weft_unit : tensile_weft_unit,

                        tear_force_warp_cond1 : tear_force_warp_cond1,
                        tear_force_warp_value1 : tear_force_warp_value1,
                        tear_force_warp_value2 : tear_force_warp_value2,
                        tear_force_warp_cond2 : tear_force_warp_cond2,
                        tear_force_warp_unit : tear_force_warp_unit,

                        tear_force_weft_cond1 : tear_force_weft_cond1,
                        tear_force_weft_value1 : tear_force_weft_value1,
                        tear_force_weft_value2 : tear_force_weft_value2,
                        tear_force_weft_cond2 : tear_force_weft_cond2,
                        tear_force_weft_unit : tear_force_weft_unit,

                        washing_ph_cond1 : washing_ph_cond1,
                        washing_ph_value1 : washing_ph_value1,
                        washing_ph_value2 : washing_ph_value2,
                        washing_ph_cond2 : washing_ph_cond2,

                        pilling_cond1: pilling_cond1,
                        pilling_value1: pilling_value1,
                        pilling_value2: pilling_value2,
                        pilling_cond2: pilling_cond2

                      },
                      success:function(new_data)
                      {
                          $('#others_retrieve_general_data').html(new_data);
                      }
                  });
                   
              }
          });
      }

      else if (pp_version_standard == 9) 
      {
          $.ajax(
          {
              type: "POST",
              url: "finishing_issunce_copy.php",
              method: "POST",
              dataType:"JSON",
              data: 
              {
                finishing_standard_id: standard_id
              },
              success:function(data)
              {
                  $('#others_retrieve_general_data').html("");

                  var cf_rubbing_dry_cond1 = data.cf_rubbing_dry_cond1;
                  var cf_rubbing_dry_value1 = data.cf_rubbing_dry_value1;
                  var cf_rubbing_dry_value2 = data.cf_rubbing_dry_value2;
                  var cf_rubbing_dry_cond2 = data.cf_rubbing_dry_cond2;

                  var cf_rubbing_wet_value1 = data.cf_rubbing_wet_value1;
                  var cf_rubbing_wet_value2 = data.cf_rubbing_wet_value2;
                  var cf_rubbing_wet_cond1 = data.cf_rubbing_wet_cond1;
                  var cf_rubbing_wet_cond2 = data.cf_rubbing_wet_cond2;

                  var wash_dry_warp_before_iron_cond1 = data.wash_dry_warp_before_iron_cond1;
                  var wash_dry_warp_before_iron_value1 = data.wash_dry_warp_before_iron_value1;
                  var wash_dry_warp_before_iron_value2 = data.wash_dry_warp_before_iron_value2;
                  var wash_dry_warp_before_iron_cond2 = data.wash_dry_warp_before_iron_cond2;

                  var wash_dry_weft_before_iron_cond1 = data.wash_dry_weft_before_iron_cond1;
                  var wash_dry_weft_before_iron_value1 = data.wash_dry_weft_before_iron_value1;
                  var wash_dry_weft_before_iron_value2 = data.wash_dry_weft_before_iron_value2;
                  var wash_dry_weft_before_iron_cond2 = data.wash_dry_weft_before_iron_cond2;

                  var wash_dry_warp_after_iron_value2 = data.wash_dry_warp_after_iron_value2;
                  var wash_dry_warp_after_iron_value1 = data.wash_dry_warp_after_iron_value1;
                  var wash_dry_warp_after_iron_cond1 = data.wash_dry_warp_after_iron_cond1;
                  var wash_dry_warp_after_iron_cond2 = data.wash_dry_warp_after_iron_cond2;


                  var wash_dry_weft_after_iron_cond1 = data.wash_dry_weft_after_iron_cond1;
                  var wash_dry_weft_after_iron_value1 = data.wash_dry_weft_after_iron_value1;
                  var wash_dry_weft_after_iron_value2 = data.wash_dry_weft_after_iron_value2;
                  var wash_dry_weft_after_iron_cond2 = data.wash_dry_weft_after_iron_cond2;

                  var dry_cleaning_warp_cond1 = data.dry_cleaning_warp_cond1;
                  var dry_cleaning_warp_value1 = data.dry_cleaning_warp_value1;
                  var dry_cleaning_warp_value2 = data.dry_cleaning_warp_value2;
                  var dry_cleaning_warp_cond2 = data.dry_cleaning_warp_cond2;

                  var dry_cleaning_weft_cond1 = data.dry_cleaning_weft_cond1;
                  var dry_cleaning_weft_value1 = data.dry_cleaning_weft_value1;
                  var dry_cleaning_weft_value2 = data.dry_cleaning_weft_value2;
                  var dry_cleaning_weft_cond2 = data.dry_cleaning_weft_cond2;

                  var yarn_count_warp_cond1 = data.yarn_count_warp_cond1;
                  var yarn_count_warp_value1 = data.yarn_count_warp_value1;
                  var yarn_count_warp_value2 = data.yarn_count_warp_value2;
                  var yarn_count_warp_cond2 = data.yarn_count_warp_cond2;
                  var yarn_count_warp_unit = data.yarn_count_warp_unit;

                  var yarn_count_weft_cond1 = data.yarn_count_weft_cond1;
                  var yarn_count_weft_value1 = data.yarn_count_weft_value1;
                  var yarn_count_weft_value2 = data.yarn_count_weft_value2;
                  var yarn_count_weft_cond2 = data.yarn_count_weft_cond2;
                  var yarn_count_weft_unit = data.yarn_count_weft_unit;

                  var number_thread_warp_cond1 = data.number_thread_warp_cond1;
                  var number_thread_warp_value1 = data.number_thread_warp_value1;
                  var number_thread_warp_value2 = data.number_thread_warp_value2;
                  var number_thread_warp_cond2 = data.number_thread_warp_cond2;
                  var number_thread_warp_unit = data.number_thread_warp_unit;

                  var number_thread_weft_cond1 = data.number_thread_weft_cond1;
                  var number_thread_weft_value1 = data.number_thread_weft_value1;
                  var number_thread_weft_value2 = data.number_thread_weft_value2;
                  var number_thread_weft_cond2 = data.number_thread_weft_cond2;
                  var number_thread_weft_unit = data.number_thread_weft_unit;

                  var mass_per_unit_per_area_cond1 = data.mass_per_unit_per_area_cond1;
                  var mass_per_unit_per_area_value1 = data.mass_per_unit_per_area_value1;
                  var mass_per_unit_per_area_value2 = data.mass_per_unit_per_area_value2;
                  var mass_per_unit_per_area_cond2 = data.mass_per_unit_per_area_cond2;
                  var mass_per_unit_per_area_unit = data.mass_per_unit_per_area_unit;

                  var surface_pilling_cond1 = data.surface_pilling_cond1;
                  var surface_pilling_value1 = data.surface_pilling_value1;
                  var surface_pilling_value2 = data.surface_pilling_value2;
                  var surface_pilling_cond2 = data.surface_pilling_cond2;

                  var tensile_warp_cond1 = data.tensile_warp_cond1;
                  var tensile_warp_value1 = data.tensile_warp_value1;
                  var tensile_warp_value2 = data.tensile_warp_value2;
                  var tensile_warp_cond2 = data.tensile_warp_cond2;
                  var tensile_warp_unit = data.tensile_warp_unit;

                  var tensile_weft_cond1 = data.tensile_weft_cond1;
                  var tensile_weft_value1 = data.tensile_weft_value1;
                  var tensile_weft_value2 = data.tensile_weft_value2;
                  var tensile_weft_cond2 = data.tensile_weft_cond2;
                  var tensile_weft_unit = data.tensile_weft_unit;

                  var tear_force_warp_cond1 = data.tear_force_warp_cond1;
                  var tear_force_warp_value1 = data.tear_force_warp_value1;
                  var tear_force_warp_value2 = data.tear_force_warp_value2;
                  var tear_force_warp_cond2 = data.tear_force_warp_cond2;
                  var tear_force_warp_unit = data.tear_force_warp_unit;

                  var tear_force_weft_cond1 = data.tear_force_weft_cond1;
                  var tear_force_weft_value1 = data.tear_force_weft_value1;
                  var tear_force_weft_value2 = data.tear_force_weft_value2;
                  var tear_force_weft_cond2 = data.tear_force_weft_cond2;
                  var tear_force_weft_unit = data.tear_force_weft_unit;

                  var seam_strength_warp_cond1 = data.seam_strength_warp_cond1;
                  var seam_strength_warp_value1 = data.seam_strength_warp_value1;
                  var seam_strength_warp_value2 = data.seam_strength_warp_value2;
                  var seam_strength_warp_cond2 = data.seam_strength_warp_cond2;
                  var seam_strength_warp_unit = data.seam_strength_warp_unit;

                  var seam_strength_weft_cond1 = data.seam_strength_weft_cond1;
                  var seam_strength_weft_value1 = data.seam_strength_weft_value1;
                  var seam_strength_weft_value2 = data.seam_strength_weft_value2;
                  var seam_strength_weft_cond2 = data.seam_strength_weft_cond2;
                  var seam_strength_weft_unit = data.seam_strength_weft_unit;

                  var abrasion_resistance_cond1 = data.abrasion_resistance_cond1;
                  var abrasion_resistance_value1 = data.abrasion_resistance_value1;
                  var abrasion_resistance_value2 = data.abrasion_resistance_value2;
                  var abrasion_resistance_cond2 = data.abrasion_resistance_cond2;

                  var abrasion_resistance_lose_cond1 = data.abrasion_resistance_lose_cond1;
                  var abrasion_resistance_lose_value1 = data.abrasion_resistance_lose_value1;
                  var abrasion_resistance_lose_value2 = data.abrasion_resistance_lose_value2;
                  var abrasion_resistance_lose_cond2 = data.abrasion_resistance_lose_cond2;

                  var abrasion_resistance_thread_break = data.abrasion_resistance_thread_break;
                  var print_durability = data.print_durability;
                  var revolution = data.revolution;

                  var washing_ph_cond1 = data.washing_ph_cond1;
                  var washing_ph_value1 = data.washing_ph_value1;
                  var washing_ph_value2 = data.washing_ph_value2;
                  var washing_ph_cond2 = data.washing_ph_cond2;

                  var formaldehyde_content_cond1 = data.formaldehyde_content_cond1;
                  var formaldehyde_content_value1 = data.formaldehyde_content_value1;
                  var formaldehyde_content_value2 = data.formaldehyde_content_value2;
                  var formaldehyde_content_cond2 = data.formaldehyde_content_cond2;
                  var formaldehyde_content_unit = data.formaldehyde_content_unit;

                  var cf_dry_cleaning_c_change_cond1 = data.cf_dry_cleaning_c_change_cond1;
                  var cf_dry_cleaning_c_change_value1 = data.cf_dry_cleaning_c_change_value1;
                  var cf_dry_cleaning_c_change_value2 = data.cf_dry_cleaning_c_change_value2;
                  var cf_dry_cleaning_c_change_cond2 = data.cf_dry_cleaning_c_change_cond2;

                  var cf_dry_cleaning_staining_cond1 = data.cf_dry_cleaning_staining_cond1;
                  var cf_dry_cleaning_staining_value1 = data.cf_dry_cleaning_staining_value1;
                  var cf_dry_cleaning_staining_value2 = data.cf_dry_cleaning_staining_value2;
                  var cf_dry_cleaning_staining_cond2 = data.cf_dry_cleaning_staining_cond2;

                  var cf_washing_c_change_cond1 = data.cf_washing_c_change_cond1;
                  var cf_washing_c_change_value1 = data.cf_washing_c_change_value1;
                  var cf_washing_c_change_value2 = data.cf_washing_c_change_value2;
                  var cf_washing_c_change_cond2 = data.cf_washing_c_change_cond2;

                  var cf_washing_staining_cond1 = data.cf_washing_staining_cond1;
                  var cf_washing_staining_value1 = data.cf_washing_staining_value1;
                  var cf_washing_staining_value2 = data.cf_washing_staining_value2;
                  var cf_washing_staining_cond2 = data.cf_washing_staining_cond2;

                  var cf_perspiration_acis_c_change_cond1 = data.cf_perspiration_acis_c_change_cond1;
                  var cf_perspiration_acis_c_change_value1 = data.cf_perspiration_acis_c_change_value1;
                  var cf_perspiration_acis_c_change_value2 = data.cf_perspiration_acis_c_change_value2;
                  var cf_perspiration_acis_c_change_cond2 = data.cf_perspiration_acis_c_change_cond2;

                  var cf_perspiration_acis_staining_cond1 = data.cf_perspiration_acis_staining_cond1;
                  var cf_perspiration_acis_staining_value1 = data.cf_perspiration_acis_staining_value1;
                  var cf_perspiration_acis_staining_value2 = data.cf_perspiration_acis_staining_value2;
                  var cf_perspiration_acis_staining_cond2 = data.cf_perspiration_acis_staining_cond2;

                  var cf_perspiration_alkali_c_change_cond1 = data.cf_perspiration_alkali_c_change_cond1;
                  var cf_perspiration_alkali_c_change_value1 = data.cf_perspiration_alkali_c_change_value1;
                  var cf_perspiration_alkali_c_change_value2 = data.cf_perspiration_alkali_c_change_value2;
                  var cf_perspiration_alkali_c_change_cond2 = data.cf_perspiration_alkali_c_change_cond2;

                  var cf_perspiration_alkali_staining_cond1 = data.cf_perspiration_alkali_staining_cond1;
                  var cf_perspiration_alkali_staining_value1 = data.cf_perspiration_alkali_staining_value1;
                  var cf_perspiration_alkali_staining_value2 = data.cf_perspiration_alkali_staining_value2;
                  var cf_perspiration_alkali_staining_cond2 = data.cf_perspiration_alkali_staining_cond2;

                  var cf_water_c_change_cond1 = data.cf_water_c_change_cond1;
                  var cf_water_c_change_value1 = data.cf_water_c_change_value1;
                  var cf_water_c_change_value2 = data.cf_water_c_change_value2;
                  var cf_water_c_change_cond2 = data.cf_water_c_change_cond2;

                  var cf_water_staining_cond1 = data.cf_water_staining_cond1;
                  var cf_water_staining_value1 = data.cf_water_staining_value1;
                  var cf_water_staining_value2 = data.cf_water_staining_value2;
                  var cf_water_staining_cond2 = data.cf_water_staining_cond2;

                  var cf_water_sotting_staining_cond1 = data.cf_water_sotting_staining_cond1;
                  var cf_water_sotting_staining_value1 = data.cf_water_sotting_staining_value1;
                  var cf_water_sotting_staining_value2 = data.cf_water_sotting_staining_value2;
                  var cf_water_sotting_staining_cond2 = data.cf_water_sotting_staining_cond2;

                  var cf_water_wetting_staining_cond1 = data.cf_water_wetting_staining_cond1;
                  var cf_water_wetting_staining_value1 = data.cf_water_wetting_staining_value1;
                  var cf_water_wetting_staining_value2 = data.cf_water_wetting_staining_value2;
                  var cf_water_wetting_staining_cond2 = data.cf_water_wetting_staining_cond2;

                  var cf_hyd_reactive_dyes_c_change_cond1 = data.cf_hyd_reactive_dyes_c_change_cond1;
                  var cf_hyd_reactive_dyes_c_change_value1 = data.cf_hyd_reactive_dyes_c_change_value1;
                  var cf_hyd_reactive_dyes_c_change_value2 = data.cf_hyd_reactive_dyes_c_change_value2;
                  var cf_hyd_reactive_dyes_c_change_cond2 = data.cf_hyd_reactive_dyes_c_change_cond2;

                  var cf_hyd_reactive_dyes_staining_cond1 = data.cf_hyd_reactive_dyes_staining_cond1;
                  var cf_hyd_reactive_dyes_staining_value1 = data.cf_hyd_reactive_dyes_staining_value1;
                  var cf_hyd_reactive_dyes_staining_value2 = data.cf_hyd_reactive_dyes_staining_value2;
                  var cf_hyd_reactive_dyes_staining_cond2 = data.cf_hyd_reactive_dyes_staining_cond2;

                  var cf_oidative_damage_c_change_cond1 = data.cf_oidative_damage_c_change_cond1;
                  var cf_oidative_damage_c_change_value1 = data.cf_oidative_damage_c_change_value1;
                  var cf_oidative_damage_c_change_value2 = data.cf_oidative_damage_c_change_value2;
                  var cf_oidative_damage_c_change_cond2 = data.cf_oidative_damage_c_change_cond2;

                  var cf_phenolic_staining_cond1 = data.cf_phenolic_staining_cond1;
                  var cf_phenolic_staining_value1 = data.cf_phenolic_staining_value1;
                  var cf_phenolic_staining_value2 = data.cf_phenolic_staining_value2;
                  var cf_phenolic_staining_cond2 = data.cf_phenolic_staining_cond2;

                  var cf_pvc_migration_staining_cond1 = data.cf_pvc_migration_staining_cond1;
                  var cf_pvc_migration_staining_value1 = data.cf_pvc_migration_staining_value1;
                  var cf_pvc_migration_staining_value2 = data.cf_pvc_migration_staining_value2;
                  var cf_pvc_migration_staining_cond2 = data.cf_pvc_migration_staining_cond2;

                  var cf_saliva_c_change_cond1 = data.cf_saliva_c_change_cond1;
                  var cf_saliva_c_change_value1 = data.cf_saliva_c_change_value1;
                  var cf_saliva_c_change_value2 = data.cf_saliva_c_change_value2;
                  var cf_saliva_c_change_cond2 = data.cf_saliva_c_change_cond2;

                  var cf_saliva_staining_cond1 = data.cf_saliva_staining_cond1;
                  var cf_saliva_staining_value1 = data.cf_saliva_staining_value1;
                  var cf_saliva_staining_value2 = data.cf_saliva_staining_value2;
                  var cf_saliva_staining_cond2 = data.cf_saliva_staining_cond2;

                  var cf_chlorinated_water_c_change_cond1 = data.cf_chlorinated_water_c_change_cond1;
                  var cf_chlorinated_water_c_change_value1 = data.cf_chlorinated_water_c_change_value1;
                  var cf_chlorinated_water_c_change_value2 = data.cf_chlorinated_water_c_change_value2;
                  var cf_chlorinated_water_c_change_cond2 = data.cf_chlorinated_water_c_change_cond2;

                  var cf_chlorinated_water_staining_cond1 = data.cf_chlorinated_water_staining_cond1;
                  var cf_chlorinated_water_staining_value1 = data.cf_chlorinated_water_staining_value1;
                  var cf_chlorinated_water_staining_value2 = data.cf_chlorinated_water_staining_value2;
                  var cf_chlorinated_water_staining_cond2 = data.cf_chlorinated_water_staining_cond2;

                  var cf_cholorine_bleach_c_change_cond1 = data.cf_cholorine_bleach_c_change_cond1;
                  var cf_cholorine_bleach_c_change_value1 = data.cf_cholorine_bleach_c_change_value1;
                  var cf_cholorine_bleach_c_change_value2 = data.cf_cholorine_bleach_c_change_value2;
                  var cf_cholorine_bleach_c_change_cond2 = data.cf_cholorine_bleach_c_change_cond2;

                  var cf_cholorine_bleach_staining_cond1 = data.cf_cholorine_bleach_staining_cond1;
                  var cf_cholorine_bleach_staining_value1 = data.cf_cholorine_bleach_staining_value1;
                  var cf_cholorine_bleach_staining_value2 = data.cf_cholorine_bleach_staining_value2;
                  var cf_cholorine_bleach_staining_cond2 = data.cf_cholorine_bleach_staining_cond2;

                  var cf_peroxide_bleach_c_change_cond1 = data.cf_peroxide_bleach_c_change_cond1;
                  var cf_peroxide_bleach_c_change_value1 = data.cf_peroxide_bleach_c_change_value1;
                  var cf_peroxide_bleach_c_change_value2 = data.cf_peroxide_bleach_c_change_value2;
                  var cf_peroxide_bleach_c_change_cond2 = data.cf_peroxide_bleach_c_change_cond2;

                  var cf_peroxide_bleach_staining_cond1 = data.cf_peroxide_bleach_staining_cond1;
                  var cf_peroxide_bleach_staining_value1 = data.cf_peroxide_bleach_staining_value1;
                  var cf_peroxide_bleach_staining_value2 = data.cf_peroxide_bleach_staining_value2;
                  var cf_peroxide_bleach_staining_cond2 = data.cf_peroxide_bleach_staining_cond2;

                  var cross_staining_cond1 = data.cross_staining_cond1;
                  var cross_staining_value1 = data.cross_staining_value1;
                  var cross_staining_value2 = data.cross_staining_value2;
                  var cross_staining_cond2 = data.cross_staining_cond2;

                  // var cf_artificial_light_c_change_cond1 = data.cf_artificial_light_c_change_cond1;
                  // var cf_artificial_light_c_change_value1 = data.cf_artificial_light_c_change_value1;
                  // var cf_artificial_light_c_change_value2 = data.cf_artificial_light_c_change_value2;
                  // var cf_artificial_light_c_change_cond2 = data.cf_artificial_light_c_change_cond2;

                  var spirality_cond1 = data.spirality_cond1;
                  var spirality_value1 = data.spirality_value1;
                  var spirality_value2 = data.spirality_value2;
                  var spirality_cond2 = data.spirality_cond2;

                  var water_absorption_cond1 = data.water_absorption_cond1;
                  var water_absorption_value1 = data.water_absorption_value1;
                  var water_absorption_value2 = data.water_absorption_value2;
                  var water_absorption_cond2 = data.water_absorption_cond2;
                  var water_absorption_unit = data.water_absorption_unit;

                  var durable_press_cond1 = data.durable_press_cond1;
                  var durable_press_value1 = data.durable_press_value1;
                  var durable_press_value2 = data.durable_press_value2;
                  var durable_press_cond2 = data.durable_press_cond2;

                  var ironability_cond1 = data.ironability_cond1;
                  var ironability_value1 = data.ironability_value1;
                  var ironability_value2 = data.ironability_value2;
                  var ironability_cond2 = data.ironability_cond2;

                  var cf_artificial_light_cond1 = data.cf_artificial_light_cond1;
                  var cf_artificial_light_value1 = data.cf_artificial_light_value1;
                  var cf_artificial_light_value2 = data.cf_artificial_light_value2;
                  var cf_artificial_light_cond2 = data.cf_artificial_light_cond2;

                  var moisture_content_cond1 = data.moisture_content_cond1;
                  var moisture_content_value1 = data.moisture_content_value1;
                  var moisture_content_value2 = data.moisture_content_value2;
                  var moisture_content_cond2 = data.moisture_content_cond2;

                  var evaporation_rate_cond1 = data.evaporation_rate_cond1;
                  var evaporation_rate_value1 = data.evaporation_rate_value1;
                  var evaporation_rate_value2 = data.evaporation_rate_value2;
                  var evaporation_rate_cond2 = data.evaporation_rate_cond2;

                  var seam_slipage_resistance = data.seam_slipage_resistance;

                  var seam_resistance_method1_warp_cond1 = data.seam_resistance_method1_warp_cond1;
                  var seam_resistance_method1_warp_value1 = data.seam_resistance_method1_warp_value1;
                  var seam_resistance_method1_warp_value2 = data.seam_resistance_method1_warp_value2;
                  var seam_resistance_method1_warp_cond2 = data.seam_resistance_method1_warp_cond2;
                  var seam_resistance_method1_warp_unit = data.seam_resistance_method1_warp_unit;

                  //Seam Slipage Resistance weft
                  var seam_resistance_method1_weft_cond1 = data.seam_resistance_method1_weft_cond1;
                  var seam_resistance_method1_weft_value1 = data.seam_resistance_method1_weft_value1;
                  var seam_resistance_method1_weft_value2 = data.seam_resistance_method1_weft_value2;
                  var seam_resistance_method1_weft_cond2 = data.seam_resistance_method1_weft_cond2;
                  var seam_resistance_method1_weft_unit = data.seam_resistance_method1_weft_unit;

                  //Seam Slipage Resistance Warp (mm)
                  var seam_resistance_method2_warp_cond1 = data.seam_resistance_method2_warp_cond1;
                  var seam_resistance_method2_warp_value1 = data.seam_resistance_method2_warp_value1;
                  var seam_resistance_method2_warp_value2 = data.seam_resistance_method2_warp_value2;
                  var seam_resistance_method2_warp_cond2 = data.seam_resistance_method2_warp_cond2;
                  var seam_resistance_method2_warp_unit = data.seam_resistance_method2_warp_unit;

                  //Seam Slipage Resistance weft
                  var seam_resistance_method2_weft_cond1 = data.seam_resistance_method2_weft_cond1;
                  var seam_resistance_method2_weft_value1 = data.seam_resistance_method2_weft_value1;
                  var seam_resistance_method2_weft_value2 = data.seam_resistance_method2_weft_value2;
                  var seam_resistance_method2_weft_cond2 = data.seam_resistance_method2_weft_cond2;
                  var seam_resistance_method2_weft_unit = data.seam_resistance_method2_weft_unit;


                  var fiber_content_select = data.fiber_content_select;

                  var fiber_total_name_polyester = data.fiber_total_name_polyester;
                  var fiber_total_polyester_value2 = data.fiber_total_polyester_value2;
                  var fiber_total_polyester_value1 = data.fiber_total_polyester_value1;
                  var fiber_total_polyester_cond1 = data.fiber_total_polyester_cond1;
                  var fiber_total_polyester_cond2 = data.fiber_total_polyester_cond2;

                  var fiber_total_name_cotton = data.fiber_total_name_cotton;
                  var fiber_total_cotton_value2 = data.fiber_total_cotton_value2;
                  var fiber_total_cotton_value1 = data.fiber_total_cotton_value1;
                  var fiber_total_cotton_cond1 = data.fiber_total_cotton_cond1;
                  var fiber_total_cotton_cond2 = data.fiber_total_cotton_cond2;

                  var fiber_total_name_thired = data.fiber_total_name_thired;
                  var fiber_total_thired_value2 = data.fiber_total_thired_value2;
                  var fiber_total_thired_value1 = data.fiber_total_thired_value1;
                  var fiber_total_thired_cond1 = data.fiber_total_thired_cond1;
                  var fiber_total_thired_cond2 = data.fiber_total_thired_cond2;

                  var fiber_total_name_fourth = data.fiber_total_name_fourth;
                  var fiber_total_fourth_value2 = data.fiber_total_fourth_value2;
                  var fiber_total_fourth_value1 = data.fiber_total_fourth_value1;
                  var fiber_total_fourth_cond1 = data.fiber_total_fourth_cond1;
                  var fiber_total_fourth_cond2 = data.fiber_total_fourth_cond2;

                  var fiber_warp_name_polyester = data.fiber_warp_name_polyester;
                  var fiber_warp_polyester_value2 = data.fiber_warp_polyester_value2;
                  var fiber_warp_polyester_value1 = data.fiber_warp_polyester_value1;
                  var fiber_warp_polyester_cond1 = data.fiber_warp_polyester_cond1;
                  var fiber_warp_polyester_cond2 = data.fiber_warp_polyester_cond2;

                  var fiber_warp_name_cotton = data.fiber_warp_name_cotton;
                  var fiber_warp_cotton_value2 = data.fiber_warp_cotton_value2;
                  var fiber_warp_cotton_value1 = data.fiber_warp_cotton_value1;
                  var fiber_warp_cotton_cond1 = data.fiber_warp_cotton_cond1;
                  var fiber_warp_cotton_cond2 = data.fiber_warp_cotton_cond2;

                  var fiber_warp_name_thired = data.fiber_warp_name_thired;
                  var fiber_warp_thired_value2 = data.fiber_warp_thired_value2;
                  var fiber_warp_thired_value1 = data.fiber_warp_thired_value1;
                  var fiber_warp_thired_cond1 = data.fiber_warp_thired_cond1;
                  var fiber_warp_thired_cond2 = data.fiber_warp_thired_cond2;

                  var fiber_warp_name_fourth = data.fiber_warp_name_fourth;
                  var fiber_warp_fourth_value2 = data.fiber_warp_fourth_value2;
                  var fiber_warp_fourth_value1 = data.fiber_warp_fourth_value1;
                  var fiber_warp_fourth_cond1 = data.fiber_warp_fourth_cond1;
                  var fiber_warp_fourth_cond2 = data.fiber_warp_fourth_cond2;

                  var fiber_weft_name_polyester = data.fiber_weft_name_polyester;
                  var fiber_weft_polyester_value2 = data.fiber_weft_polyester_value2;
                  var fiber_weft_polyester_value1 = data.fiber_weft_polyester_value1;
                  var fiber_weft_polyester_cond1 = data.fiber_weft_polyester_cond1;
                  var fiber_weft_polyester_cond2 = data.fiber_weft_polyester_cond2;

                  var fiber_weft_name_cotton = data.fiber_weft_name_cotton;
                  var fiber_weft_cotton_value2 = data.fiber_weft_cotton_value2;
                  var fiber_weft_cotton_value1 = data.fiber_weft_cotton_value1;
                  var fiber_weft_cotton_cond1 = data.fiber_weft_cotton_cond1;
                  var fiber_weft_cotton_cond2 = data.fiber_weft_cotton_cond2;

                  var fiber_weft_name_thired = data.fiber_weft_name_thired;
                  var fiber_weft_thired_value2 = data.fiber_weft_thired_value2;
                  var fiber_weft_thired_value1 = data.fiber_weft_thired_value1;
                  var fiber_weft_thired_cond1 = data.fiber_weft_thired_cond1;
                  var fiber_weft_thired_cond2 = data.fiber_weft_thired_cond2;

                  var fiber_weft_name_fourth = data.fiber_weft_name_fourth;
                  var fiber_weft_fourth_value2 = data.fiber_weft_fourth_value2;
                  var fiber_weft_fourth_value1 = data.fiber_weft_fourth_value1;
                  var fiber_weft_fourth_cond1 = data.fiber_weft_fourth_cond1;
                  var fiber_weft_fourth_cond2 = data.fiber_weft_fourth_cond2;

                  $.ajax(
                  {
                      url: "view_standard_select.php",
                      method: "POST",
                      data: {
                        pp_no_id: pp_no_id, 
                        pp_version: pp_version, 
                        pp_version_standard: pp_version_standard,

                        cf_rubbing_dry_cond1 : cf_rubbing_dry_cond1,
                        cf_rubbing_dry_value1 : cf_rubbing_dry_value1,
                        cf_rubbing_dry_value2 : cf_rubbing_dry_value2,
                        cf_rubbing_dry_cond2 : cf_rubbing_dry_cond2,

                        cf_rubbing_wet_value1 : cf_rubbing_wet_value1,
                        cf_rubbing_wet_value2 : cf_rubbing_wet_value2,
                        cf_rubbing_wet_cond1 : cf_rubbing_wet_cond1,
                        cf_rubbing_wet_cond2 : cf_rubbing_wet_cond2,

                        wash_dry_warp_before_iron_cond1 : wash_dry_warp_before_iron_cond1,
                        wash_dry_warp_before_iron_value1 : wash_dry_warp_before_iron_value1,
                        wash_dry_warp_before_iron_value2 : wash_dry_warp_before_iron_value2,
                        wash_dry_warp_before_iron_cond2 : wash_dry_warp_before_iron_cond2,

                        wash_dry_weft_before_iron_cond1 : wash_dry_weft_before_iron_cond1,
                        wash_dry_weft_before_iron_value1 : wash_dry_weft_before_iron_value1,
                        wash_dry_weft_before_iron_value2 : wash_dry_weft_before_iron_value2,
                        wash_dry_weft_before_iron_cond2 : wash_dry_weft_before_iron_cond2,

                        wash_dry_warp_after_iron_value2 : wash_dry_warp_after_iron_value2,
                        wash_dry_warp_after_iron_value1 : wash_dry_warp_after_iron_value1,
                        wash_dry_warp_after_iron_cond1 : wash_dry_warp_after_iron_cond1,
                        wash_dry_warp_after_iron_cond2 : wash_dry_warp_after_iron_cond2,


                        wash_dry_weft_after_iron_cond1 : wash_dry_weft_after_iron_cond1,
                        wash_dry_weft_after_iron_value1 : wash_dry_weft_after_iron_value1,
                        wash_dry_weft_after_iron_value2 : wash_dry_weft_after_iron_value2,
                        wash_dry_weft_after_iron_cond2 : wash_dry_weft_after_iron_cond2,

                        dry_cleaning_warp_cond1 : dry_cleaning_warp_cond1,
                        dry_cleaning_warp_value1 : dry_cleaning_warp_value1,
                        dry_cleaning_warp_value2 : dry_cleaning_warp_value2,
                        dry_cleaning_warp_cond2 : dry_cleaning_warp_cond2,

                        dry_cleaning_weft_cond1 : dry_cleaning_weft_cond1,
                        dry_cleaning_weft_value1 : dry_cleaning_weft_value1,
                        dry_cleaning_weft_value2 : dry_cleaning_weft_value2,
                        dry_cleaning_weft_cond2 : dry_cleaning_weft_cond2,

                        yarn_count_warp_cond1 : yarn_count_warp_cond1,
                        yarn_count_warp_value1 : yarn_count_warp_value1,
                        yarn_count_warp_value2 : yarn_count_warp_value2,
                        yarn_count_warp_cond2 : yarn_count_warp_cond2,
                        yarn_count_warp_unit : yarn_count_warp_unit,

                        yarn_count_weft_cond1 : yarn_count_weft_cond1,
                        yarn_count_weft_value1 : yarn_count_weft_value1,
                        yarn_count_weft_value2 : yarn_count_weft_value2,
                        yarn_count_weft_cond2 : yarn_count_weft_cond2,
                        yarn_count_weft_unit : yarn_count_weft_unit,

                        number_thread_warp_cond1 : number_thread_warp_cond1,
                        number_thread_warp_value1 : number_thread_warp_value1,
                        number_thread_warp_value2 : number_thread_warp_value2,
                        number_thread_warp_cond2 : number_thread_warp_cond2,
                        number_thread_warp_unit : number_thread_warp_unit,

                        number_thread_weft_cond1 : number_thread_weft_cond1,
                        number_thread_weft_value1 : number_thread_weft_value1,
                        number_thread_weft_value2 : number_thread_weft_value2,
                        number_thread_weft_cond2 : number_thread_weft_cond2,
                        number_thread_weft_unit : number_thread_weft_unit,

                        mass_per_unit_per_area_cond1 : mass_per_unit_per_area_cond1,
                        mass_per_unit_per_area_value1 : mass_per_unit_per_area_value1,
                        mass_per_unit_per_area_value2 : mass_per_unit_per_area_value2,
                        mass_per_unit_per_area_cond2 : mass_per_unit_per_area_cond2,
                        mass_per_unit_per_area_unit : mass_per_unit_per_area_unit,

                        surface_pilling_cond1 : surface_pilling_cond1,
                        surface_pilling_value1 : surface_pilling_value1,
                        surface_pilling_value2 : surface_pilling_value2,
                        surface_pilling_cond2 : surface_pilling_cond2,

                        tensile_warp_cond1 : tensile_warp_cond1,
                        tensile_warp_value1 : tensile_warp_value1,
                        tensile_warp_value2 : tensile_warp_value2,
                        tensile_warp_cond2 : tensile_warp_cond2,
                        tensile_warp_unit : tensile_warp_unit,

                        tensile_weft_cond1 : tensile_weft_cond1,
                        tensile_weft_value1 : tensile_weft_value1,
                        tensile_weft_value2 : tensile_weft_value2,
                        tensile_weft_cond2 : tensile_weft_cond2,
                        tensile_weft_unit : tensile_weft_unit,

                        tear_force_warp_cond1 : tear_force_warp_cond1,
                        tear_force_warp_value1 : tear_force_warp_value1,
                        tear_force_warp_value2 : tear_force_warp_value2,
                        tear_force_warp_cond2 : tear_force_warp_cond2,
                        tear_force_warp_unit : tear_force_warp_unit,

                        tear_force_weft_cond1 : tear_force_weft_cond1,
                        tear_force_weft_value1 : tear_force_weft_value1,
                        tear_force_weft_value2 : tear_force_weft_value2,
                        tear_force_weft_cond2 : tear_force_weft_cond2,
                        tear_force_weft_unit : tear_force_weft_unit,

                        seam_strength_warp_cond1 : seam_strength_warp_cond1,
                        seam_strength_warp_value1 : seam_strength_warp_value1,
                        seam_strength_warp_value2 : seam_strength_warp_value2,
                        seam_strength_warp_cond2 : seam_strength_warp_cond2,
                        seam_strength_warp_unit : seam_strength_warp_unit,

                        seam_strength_weft_cond1 : seam_strength_weft_cond1,
                        seam_strength_weft_value1 : seam_strength_weft_value1,
                        seam_strength_weft_value2 : seam_strength_weft_value2,
                        seam_strength_weft_cond2 : seam_strength_weft_cond2,
                        seam_strength_weft_unit : seam_strength_weft_unit,

                        abrasion_resistance_cond1 : abrasion_resistance_cond1,
                        abrasion_resistance_value1 : abrasion_resistance_value1,
                        abrasion_resistance_value2 : abrasion_resistance_value2,
                        abrasion_resistance_cond2 : abrasion_resistance_cond2,

                        abrasion_resistance_lose_cond1 : abrasion_resistance_lose_cond1,
                        abrasion_resistance_lose_value1 : abrasion_resistance_lose_value1,
                        abrasion_resistance_lose_value2 : abrasion_resistance_lose_value2,
                        abrasion_resistance_lose_cond2 : abrasion_resistance_lose_cond2,

                        abrasion_resistance_thread_break : abrasion_resistance_thread_break,
                        print_durability : print_durability,
                        revolution : revolution,

                        washing_ph_cond1 : washing_ph_cond1,
                        washing_ph_value1 : washing_ph_value1,
                        washing_ph_value2 : washing_ph_value2,
                        washing_ph_cond2 : washing_ph_cond2,

                        formaldehyde_content_cond1 : formaldehyde_content_cond1,
                        formaldehyde_content_value1 : formaldehyde_content_value1,
                        formaldehyde_content_value2 : formaldehyde_content_value2,
                        formaldehyde_content_cond2 : formaldehyde_content_cond2,
                        formaldehyde_content_unit : formaldehyde_content_unit,

                        cf_dry_cleaning_c_change_cond1 : cf_dry_cleaning_c_change_cond1,
                        cf_dry_cleaning_c_change_value1 : cf_dry_cleaning_c_change_value1,
                        cf_dry_cleaning_c_change_value2 : cf_dry_cleaning_c_change_value2,
                        cf_dry_cleaning_c_change_cond2 : cf_dry_cleaning_c_change_cond2,

                        cf_dry_cleaning_staining_cond1 : cf_dry_cleaning_staining_cond1,
                        cf_dry_cleaning_staining_value1 : cf_dry_cleaning_staining_value1,
                        cf_dry_cleaning_staining_value2 : cf_dry_cleaning_staining_value2,
                        cf_dry_cleaning_staining_cond2 : cf_dry_cleaning_staining_cond2,

                        cf_washing_c_change_cond1 : cf_washing_c_change_cond1,
                        cf_washing_c_change_value1 : cf_washing_c_change_value1,
                        cf_washing_c_change_value2 : cf_washing_c_change_value2,
                        cf_washing_c_change_cond2 : cf_washing_c_change_cond2,

                        cf_washing_staining_cond1 : cf_washing_staining_cond1,
                        cf_washing_staining_value1 : cf_washing_staining_value1,
                        cf_washing_staining_value2 : cf_washing_staining_value2,
                        cf_washing_staining_cond2 : cf_washing_staining_cond2,

                        cf_perspiration_acis_c_change_cond1 : cf_perspiration_acis_c_change_cond1,
                        cf_perspiration_acis_c_change_value1 : cf_perspiration_acis_c_change_value1,
                        cf_perspiration_acis_c_change_value2 : cf_perspiration_acis_c_change_value2,
                        cf_perspiration_acis_c_change_cond2 : cf_perspiration_acis_c_change_cond2,

                        cf_perspiration_acis_staining_cond1 : cf_perspiration_acis_staining_cond1,
                        cf_perspiration_acis_staining_value1 : cf_perspiration_acis_staining_value1,
                        cf_perspiration_acis_staining_value2 : cf_perspiration_acis_staining_value2,
                        cf_perspiration_acis_staining_cond2 : cf_perspiration_acis_staining_cond2,

                        cf_perspiration_alkali_c_change_cond1 : cf_perspiration_alkali_c_change_cond1,
                        cf_perspiration_alkali_c_change_value1 : cf_perspiration_alkali_c_change_value1,
                        cf_perspiration_alkali_c_change_value2 : cf_perspiration_alkali_c_change_value2,
                        cf_perspiration_alkali_c_change_cond2 : cf_perspiration_alkali_c_change_cond2,

                        cf_perspiration_alkali_staining_cond1 : cf_perspiration_alkali_staining_cond1,
                        cf_perspiration_alkali_staining_value1 : cf_perspiration_alkali_staining_value1,
                        cf_perspiration_alkali_staining_value2 : cf_perspiration_alkali_staining_value2,
                        cf_perspiration_alkali_staining_cond2 : cf_perspiration_alkali_staining_cond2,

                        cf_water_c_change_cond1 : cf_water_c_change_cond1,
                        cf_water_c_change_value1 : cf_water_c_change_value1,
                        cf_water_c_change_value2 : cf_water_c_change_value2,
                        cf_water_c_change_cond2 : cf_water_c_change_cond2,

                        cf_water_staining_cond1 : cf_water_staining_cond1,
                        cf_water_staining_value1 : cf_water_staining_value1,
                        cf_water_staining_value2 : cf_water_staining_value2,
                        cf_water_staining_cond2 : cf_water_staining_cond2,

                        cf_water_sotting_staining_cond1 : cf_water_sotting_staining_cond1,
                        cf_water_sotting_staining_value1 : cf_water_sotting_staining_value1,
                        cf_water_sotting_staining_value2 : cf_water_sotting_staining_value2,
                        cf_water_sotting_staining_cond2 : cf_water_sotting_staining_cond2,

                        cf_water_wetting_staining_cond1 : cf_water_wetting_staining_cond1,
                        cf_water_wetting_staining_value1 : cf_water_wetting_staining_value1,
                        cf_water_wetting_staining_value2 : cf_water_wetting_staining_value2,
                        cf_water_wetting_staining_cond2 : cf_water_wetting_staining_cond2,

                        cf_hyd_reactive_dyes_c_change_cond1 : cf_hyd_reactive_dyes_c_change_cond1,
                        cf_hyd_reactive_dyes_c_change_value1 : cf_hyd_reactive_dyes_c_change_value1,
                        cf_hyd_reactive_dyes_c_change_value2 : cf_hyd_reactive_dyes_c_change_value2,
                        cf_hyd_reactive_dyes_c_change_cond2 : cf_hyd_reactive_dyes_c_change_cond2,

                        cf_hyd_reactive_dyes_staining_cond1 : cf_hyd_reactive_dyes_staining_cond1,
                        cf_hyd_reactive_dyes_staining_value1 : cf_hyd_reactive_dyes_staining_value1,
                        cf_hyd_reactive_dyes_staining_value2 : cf_hyd_reactive_dyes_staining_value2,
                        cf_hyd_reactive_dyes_staining_cond2 : cf_hyd_reactive_dyes_staining_cond2,

                        cf_oidative_damage_c_change_cond1 : cf_oidative_damage_c_change_cond1,
                        cf_oidative_damage_c_change_value1 : cf_oidative_damage_c_change_value1,
                        cf_oidative_damage_c_change_value2 : cf_oidative_damage_c_change_value2,
                        cf_oidative_damage_c_change_cond2 : cf_oidative_damage_c_change_cond2,

                        cf_phenolic_staining_cond1 : cf_phenolic_staining_cond1,
                        cf_phenolic_staining_value1 : cf_phenolic_staining_value1,
                        cf_phenolic_staining_value2 : cf_phenolic_staining_value2,
                        cf_phenolic_staining_cond2 : cf_phenolic_staining_cond2,

                        cf_pvc_migration_staining_cond1 : cf_pvc_migration_staining_cond1,
                        cf_pvc_migration_staining_value1 : cf_pvc_migration_staining_value1,
                        cf_pvc_migration_staining_value2 : cf_pvc_migration_staining_value2,
                        cf_pvc_migration_staining_cond2 : cf_pvc_migration_staining_cond2,

                        cf_saliva_c_change_cond1 : cf_saliva_c_change_cond1,
                        cf_saliva_c_change_value1 : cf_saliva_c_change_value1,
                        cf_saliva_c_change_value2 : cf_saliva_c_change_value2,
                        cf_saliva_c_change_cond2 : cf_saliva_c_change_cond2,

                        cf_saliva_staining_cond1 : cf_saliva_staining_cond1,
                        cf_saliva_staining_value1 : cf_saliva_staining_value1,
                        cf_saliva_staining_value2 : cf_saliva_staining_value2,
                        cf_saliva_staining_cond2 : cf_saliva_staining_cond2,

                        cf_chlorinated_water_c_change_cond1 : cf_chlorinated_water_c_change_cond1,
                        cf_chlorinated_water_c_change_value1 : cf_chlorinated_water_c_change_value1,
                        cf_chlorinated_water_c_change_value2 : cf_chlorinated_water_c_change_value2,
                        cf_chlorinated_water_c_change_cond2 : cf_chlorinated_water_c_change_cond2,

                        cf_chlorinated_water_staining_cond1 : cf_chlorinated_water_staining_cond1,
                        cf_chlorinated_water_staining_value1 : cf_chlorinated_water_staining_value1,
                        cf_chlorinated_water_staining_value2 : cf_chlorinated_water_staining_value2,
                        cf_chlorinated_water_staining_cond2 : cf_chlorinated_water_staining_cond2,

                        cf_cholorine_bleach_c_change_cond1 : cf_cholorine_bleach_c_change_cond1,
                        cf_cholorine_bleach_c_change_value1 : cf_cholorine_bleach_c_change_value1,
                        cf_cholorine_bleach_c_change_value2 : cf_cholorine_bleach_c_change_value2,
                        cf_cholorine_bleach_c_change_cond2 : cf_cholorine_bleach_c_change_cond2,

                        cf_cholorine_bleach_staining_cond1 : cf_cholorine_bleach_staining_cond1,
                        cf_cholorine_bleach_staining_value1 : cf_cholorine_bleach_staining_value1,
                        cf_cholorine_bleach_staining_value2 : cf_cholorine_bleach_staining_value2,
                        cf_cholorine_bleach_staining_cond2 : cf_cholorine_bleach_staining_cond2,

                        cf_peroxide_bleach_c_change_cond1 : cf_peroxide_bleach_c_change_cond1,
                        cf_peroxide_bleach_c_change_value1 : cf_peroxide_bleach_c_change_value1,
                        cf_peroxide_bleach_c_change_value2 : cf_peroxide_bleach_c_change_value2,
                        cf_peroxide_bleach_c_change_cond2 : cf_peroxide_bleach_c_change_cond2,

                        cf_peroxide_bleach_staining_cond1 : cf_peroxide_bleach_staining_cond1,
                        cf_peroxide_bleach_staining_value1 : cf_peroxide_bleach_staining_value1,
                        cf_peroxide_bleach_staining_value2 : cf_peroxide_bleach_staining_value2,
                        cf_peroxide_bleach_staining_cond2 : cf_peroxide_bleach_staining_cond2,

                        cross_staining_cond1 : cross_staining_cond1,
                        cross_staining_value1 : cross_staining_value1,
                        cross_staining_value2 : cross_staining_value2,
                        cross_staining_cond2 : cross_staining_cond2,

                        // cf_artificial_light_c_change_cond1 : cf_artificial_light_c_change_cond1,
                        // cf_artificial_light_c_change_value1 : cf_artificial_light_c_change_value1,
                        // cf_artificial_light_c_change_value2 : cf_artificial_light_c_change_value2,
                        // cf_artificial_light_c_change_cond2 : cf_artificial_light_c_change_cond2,

                        spirality_cond1 : spirality_cond1,
                        spirality_value1 : spirality_value1,
                        spirality_value2 : spirality_value2,
                        spirality_cond2 : spirality_cond2,

                        water_absorption_cond1 : water_absorption_cond1,
                        water_absorption_value1 : water_absorption_value1,
                        water_absorption_value2 : water_absorption_value2,
                        water_absorption_cond2 : water_absorption_cond2,
                        water_absorption_unit : water_absorption_unit,

                        durable_press_cond1 : durable_press_cond1,
                        durable_press_value1 : durable_press_value1,
                        durable_press_value2 : durable_press_value2,
                        durable_press_cond2 : durable_press_cond2,

                        ironability_cond1 : ironability_cond1,
                        ironability_value1 : ironability_value1,
                        ironability_value2 : ironability_value2,
                        ironability_cond2 : ironability_cond2,

                        cf_artificial_light_cond1 : cf_artificial_light_cond1,
                        cf_artificial_light_value1 : cf_artificial_light_value1,
                        cf_artificial_light_value2 : cf_artificial_light_value2,
                        cf_artificial_light_cond2 : cf_artificial_light_cond2,

                        moisture_content_cond1 : moisture_content_cond1,
                        moisture_content_value1 : moisture_content_value1,
                        moisture_content_value2 : moisture_content_value2,
                        moisture_content_cond2 : moisture_content_cond2,

                        evaporation_rate_cond1 : evaporation_rate_cond1,
                        evaporation_rate_value1 : evaporation_rate_value1,
                        evaporation_rate_value2 : evaporation_rate_value2,
                        evaporation_rate_cond2 : evaporation_rate_cond2,

                        seam_slipage_resistance : seam_slipage_resistance,

                        seam_resistance_method1_warp_cond1 : seam_resistance_method1_warp_cond1,
                        seam_resistance_method1_warp_value1 : seam_resistance_method1_warp_value1,
                        seam_resistance_method1_warp_value2 : seam_resistance_method1_warp_value2,
                        seam_resistance_method1_warp_cond2 : seam_resistance_method1_warp_cond2,
                        seam_resistance_method1_warp_unit : seam_resistance_method1_warp_unit,

                        //Seam Slipage Resistance weft
                        seam_resistance_method1_weft_cond1 : seam_resistance_method1_weft_cond1,
                        seam_resistance_method1_weft_value1 : seam_resistance_method1_weft_value1,
                        seam_resistance_method1_weft_value2 : seam_resistance_method1_weft_value2,
                        seam_resistance_method1_weft_cond2 : seam_resistance_method1_weft_cond2,
                        seam_resistance_method1_weft_unit : seam_resistance_method1_weft_unit,

                        //Seam Slipage Resistance Warp (mm)
                        seam_resistance_method2_warp_cond1 : seam_resistance_method2_warp_cond1,
                        seam_resistance_method2_warp_value1 : seam_resistance_method2_warp_value1,
                        seam_resistance_method2_warp_value2 : seam_resistance_method2_warp_value2,
                        seam_resistance_method2_warp_cond2 : seam_resistance_method2_warp_cond2,
                        seam_resistance_method2_warp_unit : seam_resistance_method2_warp_unit,

                        //Seam Slipage Resistance weft
                        seam_resistance_method2_weft_cond1 : seam_resistance_method2_weft_cond1,
                        seam_resistance_method2_weft_value1 : seam_resistance_method2_weft_value1,
                        seam_resistance_method2_weft_value2 : seam_resistance_method2_weft_value2,
                        seam_resistance_method2_weft_cond2 : seam_resistance_method2_weft_cond2,
                        seam_resistance_method2_weft_unit : seam_resistance_method2_weft_unit,



                        fiber_content_select: fiber_content_select,

                        fiber_total_name_polyester: fiber_total_name_polyester,
                        fiber_total_polyester_cond1: fiber_total_polyester_cond1,
                        fiber_total_polyester_cond2: fiber_total_polyester_cond2,
                        fiber_total_polyester_value2: fiber_total_polyester_value2,
                        fiber_total_polyester_value1: fiber_total_polyester_value1,

                        fiber_total_name_cotton: fiber_total_name_cotton,
                        fiber_total_cotton_cond1: fiber_total_cotton_cond1,
                        fiber_total_cotton_cond2: fiber_total_cotton_cond2,
                        fiber_total_cotton_value2: fiber_total_cotton_value2,
                        fiber_total_cotton_value1: fiber_total_cotton_value1,

                        fiber_total_name_thired: fiber_total_name_thired,
                        fiber_total_thired_cond1: fiber_total_thired_cond1,
                        fiber_total_thired_cond2: fiber_total_thired_cond2,
                        fiber_total_thired_value2: fiber_total_thired_value2,
                        fiber_total_thired_value1: fiber_total_thired_value1,

                        fiber_total_name_fourth: fiber_total_name_fourth,
                        fiber_total_fourth_cond1: fiber_total_fourth_cond1,
                        fiber_total_fourth_cond2: fiber_total_fourth_cond2,
                        fiber_total_fourth_value2: fiber_total_fourth_value2,
                        fiber_total_fourth_value1: fiber_total_fourth_value1,

                        fiber_warp_name_polyester: fiber_warp_name_polyester,
                        fiber_warp_polyester_cond1: fiber_warp_polyester_cond1,
                        fiber_warp_polyester_cond2: fiber_warp_polyester_cond2,
                        fiber_warp_polyester_value2: fiber_warp_polyester_value2,
                        fiber_warp_polyester_value1: fiber_warp_polyester_value1,

                        fiber_warp_name_cotton: fiber_warp_name_cotton,
                        fiber_warp_cotton_cond1: fiber_warp_cotton_cond1,
                        fiber_warp_cotton_cond2: fiber_warp_cotton_cond2,
                        fiber_warp_cotton_value2: fiber_warp_cotton_value2,
                        fiber_warp_cotton_value1: fiber_warp_cotton_value1,

                        fiber_warp_name_thired: fiber_warp_name_thired,
                        fiber_warp_thired_cond1: fiber_warp_thired_cond1,
                        fiber_warp_thired_cond2: fiber_warp_thired_cond2,
                        fiber_warp_thired_value2: fiber_warp_thired_value2,
                        fiber_warp_thired_value1: fiber_warp_thired_value1,

                        fiber_warp_name_fourth: fiber_warp_name_fourth,
                        fiber_warp_fourth_cond1: fiber_warp_fourth_cond1,
                        fiber_warp_fourth_cond2: fiber_warp_fourth_cond2,
                        fiber_warp_fourth_value2: fiber_warp_fourth_value2,
                        fiber_warp_fourth_value1: fiber_warp_fourth_value1,

                        fiber_weft_name_polyester: fiber_weft_name_polyester,
                        fiber_weft_polyester_cond1: fiber_weft_polyester_cond1,
                        fiber_weft_polyester_cond2: fiber_weft_polyester_cond2,
                        fiber_weft_polyester_value2: fiber_weft_polyester_value2,
                        fiber_weft_polyester_value1: fiber_weft_polyester_value1,

                        fiber_weft_name_cotton: fiber_weft_name_cotton,
                        fiber_weft_cotton_cond1: fiber_weft_cotton_cond1,
                        fiber_weft_cotton_cond2: fiber_weft_cotton_cond2,
                        fiber_weft_cotton_value2: fiber_weft_cotton_value2,
                        fiber_weft_cotton_value1: fiber_weft_cotton_value1,

                        fiber_weft_name_thired: fiber_weft_name_thired,
                        fiber_weft_thired_cond1: fiber_weft_thired_cond1,
                        fiber_weft_thired_cond2: fiber_weft_thired_cond2,
                        fiber_weft_thired_value2: fiber_weft_thired_value2,
                        fiber_weft_thired_value1: fiber_weft_thired_value1,

                        fiber_weft_name_fourth: fiber_weft_name_fourth,
                        fiber_weft_fourth_cond1: fiber_weft_fourth_cond1,
                        fiber_weft_fourth_cond2: fiber_weft_fourth_cond2,
                        fiber_weft_fourth_value2: fiber_weft_fourth_value2,
                        fiber_weft_fourth_value1: fiber_weft_fourth_value1

                      },
                      success:function(new_data)
                      {
                          $('#others_retrieve_general_data').html(new_data);
                      }
                  });
                   
              }
          });
      }


      else if (pp_version_standard == 10)
      {
          $.ajax(
          {
              type: "POST",
              url: "scouring_bleaching_issunce_copy.php",
              method: "POST",
              dataType:"JSON",
              data: 
              {
                scouring_bleaching_standard_id: standard_id
              },
              success:function(data)
              {
                  $('#others_retrieve_general_data').html("");

                  var absorbency_cond1 = data.absorbency_cond1;
                  var absorbency_value1 = data.absorbency_value1;
                  var absorbency_value2 = data.absorbency_value2;
                  var absorbency_cond2 = data.absorbency_cond2;

                  var sizing_cond1 = data.sizing_cond1;
                  var sizing_value1 = data.sizing_value1;
                  var sizing_value2 = data.sizing_value2;
                  var sizing_cond2 = data.sizing_cond2;

                  var whiteness_cond1 = data.whiteness_cond1;
                  var whiteness_value1 = data.whiteness_value1;
                  var whiteness_value2 = data.whiteness_value2;
                  var whiteness_cond2 = data.whiteness_cond2;

                  var pilling_cond1 = data.pilling_cond1;
                  var pilling_value1 = data.pilling_value1;
                  var pilling_value2 = data.pilling_value2;
                  var pilling_cond2 = data.pilling_cond2;

                  var ph_cond1 = data.ph_cond1;
                  var ph_value1 = data.ph_value1;
                  var ph_value2 = data.ph_value2;
                  var ph_cond2 = data.ph_cond2;

                  $.ajax(
                  {
                      url: "view_standard_select.php",
                      method: "POST",
                      data: {
                        pp_no_id: pp_no_id, 
                        pp_version: pp_version, 
                        pp_version_standard: pp_version_standard,

                        absorbency_cond1: absorbency_cond1,
                        absorbency_value1: absorbency_value1,
                        absorbency_value2: absorbency_value2,
                        absorbency_cond2: absorbency_cond2,

                        sizing_cond1: sizing_cond1,
                        sizing_value1: sizing_value1,
                        sizing_value2: sizing_value2,
                        sizing_cond2: sizing_cond2,

                        whiteness_cond1: whiteness_cond1,
                        whiteness_value1: whiteness_value1,
                        whiteness_value2: whiteness_value2,
                        whiteness_cond2: whiteness_cond2,

                        pilling_cond1: pilling_cond1,
                        pilling_value1: pilling_value1,
                        pilling_value2: pilling_value2,
                        pilling_cond2: pilling_cond2,

                        ph_cond1: ph_cond1,
                        ph_value1: ph_value1,
                        ph_value2: ph_value2,
                        ph_cond2: ph_cond2

                      },
                      success:function(new_data)
                      {
                          $('#others_retrieve_general_data').html(new_data);
                      }
                  });
                   
              }
          });
      }


      else if (pp_version_standard == 11)
      {
          $.ajax(
          {
              type: "POST",
              url: "scouring_issunce_copy.php",
              method: "POST",
              dataType:"JSON",
              data: 
              {
                scouring_standard_id: standard_id
              },
              success:function(data)
              {
                  $('#others_retrieve_general_data').html("");

                  var absorbency_cond1 = data.absorbency_cond1;
                  var absorbency_value1 = data.absorbency_value1;
                  var absorbency_value2 = data.absorbency_value2;
                  var absorbency_cond2 = data.absorbency_cond2;

                  var sizing_cond1 = data.sizing_cond1;
                  var sizing_value1 = data.sizing_value1;
                  var sizing_value2 = data.sizing_value2;
                  var sizing_cond2 = data.sizing_cond2;

                  var whiteness_cond1 = data.whiteness_cond1;
                  var whiteness_value1 = data.whiteness_value1;
                  var whiteness_value2 = data.whiteness_value2;
                  var whiteness_cond2 = data.whiteness_cond2;

                  var pilling_cond1 = data.pilling_cond1;
                  var pilling_value1 = data.pilling_value1;
                  var pilling_value2 = data.pilling_value2;
                  var pilling_cond2 = data.pilling_cond2;

                  var ph_cond1 = data.ph_cond1;
                  var ph_value1 = data.ph_value1;
                  var ph_value2 = data.ph_value2;
                  var ph_cond2 = data.ph_cond2;

                  $.ajax(
                  {
                      url: "view_standard_select.php",
                      method: "POST",
                      data: {
                        pp_no_id: pp_no_id, 
                        pp_version: pp_version, 
                        pp_version_standard: pp_version_standard,

                        absorbency_cond1: absorbency_cond1,
                        absorbency_value1: absorbency_value1,
                        absorbency_value2: absorbency_value2,
                        absorbency_cond2: absorbency_cond2,

                        sizing_cond1: sizing_cond1,
                        sizing_value1: sizing_value1,
                        sizing_value2: sizing_value2,
                        sizing_cond2: sizing_cond2,

                        pilling_cond1: pilling_cond1,
                        pilling_value1: pilling_value1,
                        pilling_value2: pilling_value2,
                        pilling_cond2: pilling_cond2,

                        ph_cond1: ph_cond1,
                        ph_value1: ph_value1,
                        ph_value2: ph_value2,
                        ph_cond2: ph_cond2

                      },
                      success:function(new_data)
                      {
                          $('#others_retrieve_general_data').html(new_data);
                      }
                  });
                   
              }
          });
      }

      else if (pp_version_standard == 12) 
      {
          $.ajax(
          {
              type: "POST",
              url: "washing_issunce_copy.php",
              method: "POST",
              dataType:"JSON",
              data: 
              {
                washing_standard_id: standard_id
              },
              success:function(data)
              {
                  $('#others_retrieve_general_data').html("");

                  var cf_rubbing_dry_cond1 = data.cf_rubbing_dry_cond1;
                  var cf_rubbing_dry_value1 = data.cf_rubbing_dry_value1;
                  var cf_rubbing_dry_value2 = data.cf_rubbing_dry_value2;
                  var cf_rubbing_dry_cond2 = data.cf_rubbing_dry_cond2;

                  var cf_rubbing_wet_value1 = data.cf_rubbing_wet_value1;
                  var cf_rubbing_wet_value2 = data.cf_rubbing_wet_value2;
                  var cf_rubbing_wet_cond1 = data.cf_rubbing_wet_cond1;
                  var cf_rubbing_wet_cond2 = data.cf_rubbing_wet_cond2;

                  var washing_ph_cond1 = data.washing_ph_cond1;
                  var washing_ph_value1 = data.washing_ph_value1;
                  var washing_ph_value2 = data.washing_ph_value2;
                  var washing_ph_cond2 = data.washing_ph_cond2;

                  var cf_dry_cleaning_c_change_cond1 = data.cf_dry_cleaning_c_change_cond1;
                  var cf_dry_cleaning_c_change_value1 = data.cf_dry_cleaning_c_change_value1;
                  var cf_dry_cleaning_c_change_value2 = data.cf_dry_cleaning_c_change_value2;
                  var cf_dry_cleaning_c_change_cond2 = data.cf_dry_cleaning_c_change_cond2;

                  var cf_dry_cleaning_staining_cond1 = data.cf_dry_cleaning_staining_cond1;
                  var cf_dry_cleaning_staining_value1 = data.cf_dry_cleaning_staining_value1;
                  var cf_dry_cleaning_staining_value2 = data.cf_dry_cleaning_staining_value2;
                  var cf_dry_cleaning_staining_cond2 = data.cf_dry_cleaning_staining_cond2;

                  var cf_washing_c_change_cond1 = data.cf_washing_c_change_cond1;
                  var cf_washing_c_change_value1 = data.cf_washing_c_change_value1;
                  var cf_washing_c_change_value2 = data.cf_washing_c_change_value2;
                  var cf_washing_c_change_cond2 = data.cf_washing_c_change_cond2;

                  var cf_washing_staining_cond1 = data.cf_washing_staining_cond1;
                  var cf_washing_staining_value1 = data.cf_washing_staining_value1;
                  var cf_washing_staining_value2 = data.cf_washing_staining_value2;
                  var cf_washing_staining_cond2 = data.cf_washing_staining_cond2;

                  var cf_perspiration_acis_c_change_cond1 = data.cf_perspiration_acis_c_change_cond1;
                  var cf_perspiration_acis_c_change_value1 = data.cf_perspiration_acis_c_change_value1;
                  var cf_perspiration_acis_c_change_value2 = data.cf_perspiration_acis_c_change_value2;
                  var cf_perspiration_acis_c_change_cond2 = data.cf_perspiration_acis_c_change_cond2;

                  var cf_perspiration_acis_staining_cond1 = data.cf_perspiration_acis_staining_cond1;
                  var cf_perspiration_acis_staining_value1 = data.cf_perspiration_acis_staining_value1;
                  var cf_perspiration_acis_staining_value2 = data.cf_perspiration_acis_staining_value2;
                  var cf_perspiration_acis_staining_cond2 = data.cf_perspiration_acis_staining_cond2;

                  var cf_perspiration_alkali_c_change_cond1 = data.cf_perspiration_alkali_c_change_cond1;
                  var cf_perspiration_alkali_c_change_value1 = data.cf_perspiration_alkali_c_change_value1;
                  var cf_perspiration_alkali_c_change_value2 = data.cf_perspiration_alkali_c_change_value2;
                  var cf_perspiration_alkali_c_change_cond2 = data.cf_perspiration_alkali_c_change_cond2;

                  var cf_perspiration_alkali_staining_cond1 = data.cf_perspiration_alkali_staining_cond1;
                  var cf_perspiration_alkali_staining_value1 = data.cf_perspiration_alkali_staining_value1;
                  var cf_perspiration_alkali_staining_value2 = data.cf_perspiration_alkali_staining_value2;
                  var cf_perspiration_alkali_staining_cond2 = data.cf_perspiration_alkali_staining_cond2;

                  var cf_water_c_change_cond1 = data.cf_water_c_change_cond1;
                  var cf_water_c_change_value1 = data.cf_water_c_change_value1;
                  var cf_water_c_change_value2 = data.cf_water_c_change_value2;
                  var cf_water_c_change_cond2 = data.cf_water_c_change_cond2;

                  var cf_water_staining_cond1 = data.cf_water_staining_cond1;
                  var cf_water_staining_value1 = data.cf_water_staining_value1;
                  var cf_water_staining_value2 = data.cf_water_staining_value2;
                  var cf_water_staining_cond2 = data.cf_water_staining_cond2;

                  var cf_water_sotting_staining_cond1 = data.cf_water_sotting_staining_cond1;
                  var cf_water_sotting_staining_value1 = data.cf_water_sotting_staining_value1;
                  var cf_water_sotting_staining_value2 = data.cf_water_sotting_staining_value2;
                  var cf_water_sotting_staining_cond2 = data.cf_water_sotting_staining_cond2;

                  var cf_water_wetting_staining_cond1 = data.cf_water_wetting_staining_cond1;
                  var cf_water_wetting_staining_value1 = data.cf_water_wetting_staining_value1;
                  var cf_water_wetting_staining_value2 = data.cf_water_wetting_staining_value2;
                  var cf_water_wetting_staining_cond2 = data.cf_water_wetting_staining_cond2;

                  var cf_hyd_reactive_dyes_c_change_cond1 = data.cf_hyd_reactive_dyes_c_change_cond1;
                  var cf_hyd_reactive_dyes_c_change_value1 = data.cf_hyd_reactive_dyes_c_change_value1;
                  var cf_hyd_reactive_dyes_c_change_value2 = data.cf_hyd_reactive_dyes_c_change_value2;
                  var cf_hyd_reactive_dyes_c_change_cond2 = data.cf_hyd_reactive_dyes_c_change_cond2;

                  var cf_hyd_reactive_dyes_staining_cond1 = data.cf_hyd_reactive_dyes_staining_cond1;
                  var cf_hyd_reactive_dyes_staining_value1 = data.cf_hyd_reactive_dyes_staining_value1;
                  var cf_hyd_reactive_dyes_staining_value2 = data.cf_hyd_reactive_dyes_staining_value2;
                  var cf_hyd_reactive_dyes_staining_cond2 = data.cf_hyd_reactive_dyes_staining_cond2;

                  var cf_oidative_damage_c_change_cond1 = data.cf_oidative_damage_c_change_cond1;
                  var cf_oidative_damage_c_change_value1 = data.cf_oidative_damage_c_change_value1;
                  var cf_oidative_damage_c_change_value2 = data.cf_oidative_damage_c_change_value2;
                  var cf_oidative_damage_c_change_cond2 = data.cf_oidative_damage_c_change_cond2;

                  var cf_phenolic_staining_cond1 = data.cf_phenolic_staining_cond1;
                  var cf_phenolic_staining_value1 = data.cf_phenolic_staining_value1;
                  var cf_phenolic_staining_value2 = data.cf_phenolic_staining_value2;
                  var cf_phenolic_staining_cond2 = data.cf_phenolic_staining_cond2;

                  var cf_pvc_migration_staining_cond1 = data.cf_pvc_migration_staining_cond1;
                  var cf_pvc_migration_staining_value1 = data.cf_pvc_migration_staining_value1;
                  var cf_pvc_migration_staining_value2 = data.cf_pvc_migration_staining_value2;
                  var cf_pvc_migration_staining_cond2 = data.cf_pvc_migration_staining_cond2;

                  var cf_saliva_c_change_cond1 = data.cf_saliva_c_change_cond1;
                  var cf_saliva_c_change_value1 = data.cf_saliva_c_change_value1;
                  var cf_saliva_c_change_value2 = data.cf_saliva_c_change_value2;
                  var cf_saliva_c_change_cond2 = data.cf_saliva_c_change_cond2;

                  var cf_saliva_staining_cond1 = data.cf_saliva_staining_cond1;
                  var cf_saliva_staining_value1 = data.cf_saliva_staining_value1;
                  var cf_saliva_staining_value2 = data.cf_saliva_staining_value2;
                  var cf_saliva_staining_cond2 = data.cf_saliva_staining_cond2;

                  var cf_chlorinated_water_c_change_cond1 = data.cf_chlorinated_water_c_change_cond1;
                  var cf_chlorinated_water_c_change_value1 = data.cf_chlorinated_water_c_change_value1;
                  var cf_chlorinated_water_c_change_value2 = data.cf_chlorinated_water_c_change_value2;
                  var cf_chlorinated_water_c_change_cond2 = data.cf_chlorinated_water_c_change_cond2;

                  var cf_chlorinated_water_staining_cond1 = data.cf_chlorinated_water_staining_cond1;
                  var cf_chlorinated_water_staining_value1 = data.cf_chlorinated_water_staining_value1;
                  var cf_chlorinated_water_staining_value2 = data.cf_chlorinated_water_staining_value2;
                  var cf_chlorinated_water_staining_cond2 = data.cf_chlorinated_water_staining_cond2;

                  var cf_cholorine_bleach_c_change_cond1 = data.cf_cholorine_bleach_c_change_cond1;
                  var cf_cholorine_bleach_c_change_value1 = data.cf_cholorine_bleach_c_change_value1;
                  var cf_cholorine_bleach_c_change_value2 = data.cf_cholorine_bleach_c_change_value2;
                  var cf_cholorine_bleach_c_change_cond2 = data.cf_cholorine_bleach_c_change_cond2;

                  var cf_cholorine_bleach_staining_cond1 = data.cf_cholorine_bleach_staining_cond1;
                  var cf_cholorine_bleach_staining_value1 = data.cf_cholorine_bleach_staining_value1;
                  var cf_cholorine_bleach_staining_value2 = data.cf_cholorine_bleach_staining_value2;
                  var cf_cholorine_bleach_staining_cond2 = data.cf_cholorine_bleach_staining_cond2;

                  var cf_peroxide_bleach_c_change_cond1 = data.cf_peroxide_bleach_c_change_cond1;
                  var cf_peroxide_bleach_c_change_value1 = data.cf_peroxide_bleach_c_change_value1;
                  var cf_peroxide_bleach_c_change_value2 = data.cf_peroxide_bleach_c_change_value2;
                  var cf_peroxide_bleach_c_change_cond2 = data.cf_peroxide_bleach_c_change_cond2;

                  var cf_peroxide_bleach_staining_cond1 = data.cf_peroxide_bleach_staining_cond1;
                  var cf_peroxide_bleach_staining_value1 = data.cf_peroxide_bleach_staining_value1;
                  var cf_peroxide_bleach_staining_value2 = data.cf_peroxide_bleach_staining_value2;
                  var cf_peroxide_bleach_staining_cond2 = data.cf_peroxide_bleach_staining_cond2;

                  var cross_staining_cond1 = data.cross_staining_cond1;
                  var cross_staining_value1 = data.cross_staining_value1;
                  var cross_staining_value2 = data.cross_staining_value2;
                  var cross_staining_cond2 = data.cross_staining_cond2;

                  var cf_artificial_light_c_change_cond1 = data.cf_artificial_light_c_change_cond1;
                  var cf_artificial_light_c_change_value1 = data.cf_artificial_light_c_change_value1;
                  var cf_artificial_light_c_change_value2 = data.cf_artificial_light_c_change_value2;
                  var cf_artificial_light_c_change_cond2 = data.cf_artificial_light_c_change_cond2;

                  var cf_artificial_light_cond1 = data.cf_artificial_light_cond1;
                  var cf_artificial_light_value1 = data.cf_artificial_light_value1;
                  var cf_artificial_light_value2 = data.cf_artificial_light_value2;
                  var cf_artificial_light_cond2 = data.cf_artificial_light_cond2;

                  $.ajax(
                  {
                      url: "view_standard_select.php",
                      method: "POST",
                      data: {
                        pp_no_id: pp_no_id, 
                        pp_version: pp_version, 
                        pp_version_standard: pp_version_standard,

                        cf_rubbing_dry_cond1 : cf_rubbing_dry_cond1,
                        cf_rubbing_dry_value1 : cf_rubbing_dry_value1,
                        cf_rubbing_dry_value2 : cf_rubbing_dry_value2,
                        cf_rubbing_dry_cond2 : cf_rubbing_dry_cond2,

                        cf_rubbing_wet_value1 : cf_rubbing_wet_value1,
                        cf_rubbing_wet_value2 : cf_rubbing_wet_value2,
                        cf_rubbing_wet_cond1 : cf_rubbing_wet_cond1,
                        cf_rubbing_wet_cond2 : cf_rubbing_wet_cond2,

                        washing_ph_cond1 : washing_ph_cond1,
                        washing_ph_value1 : washing_ph_value1,
                        washing_ph_value2 : washing_ph_value2,
                        washing_ph_cond2 : washing_ph_cond2,

                        cf_dry_cleaning_c_change_cond1 : cf_dry_cleaning_c_change_cond1,
                        cf_dry_cleaning_c_change_value1 : cf_dry_cleaning_c_change_value1,
                        cf_dry_cleaning_c_change_value2 : cf_dry_cleaning_c_change_value2,
                        cf_dry_cleaning_c_change_cond2 : cf_dry_cleaning_c_change_cond2,

                        cf_dry_cleaning_staining_cond1 : cf_dry_cleaning_staining_cond1,
                        cf_dry_cleaning_staining_value1 : cf_dry_cleaning_staining_value1,
                        cf_dry_cleaning_staining_value2 : cf_dry_cleaning_staining_value2,
                        cf_dry_cleaning_staining_cond2 : cf_dry_cleaning_staining_cond2,

                        cf_washing_c_change_cond1 : cf_washing_c_change_cond1,
                        cf_washing_c_change_value1 : cf_washing_c_change_value1,
                        cf_washing_c_change_value2 : cf_washing_c_change_value2,
                        cf_washing_c_change_cond2 : cf_washing_c_change_cond2,

                        cf_washing_staining_cond1 : cf_washing_staining_cond1,
                        cf_washing_staining_value1 : cf_washing_staining_value1,
                        cf_washing_staining_value2 : cf_washing_staining_value2,
                        cf_washing_staining_cond2 : cf_washing_staining_cond2,

                        cf_perspiration_acis_c_change_cond1 : cf_perspiration_acis_c_change_cond1,
                        cf_perspiration_acis_c_change_value1 : cf_perspiration_acis_c_change_value1,
                        cf_perspiration_acis_c_change_value2 : cf_perspiration_acis_c_change_value2,
                        cf_perspiration_acis_c_change_cond2 : cf_perspiration_acis_c_change_cond2,

                        cf_perspiration_acis_staining_cond1 : cf_perspiration_acis_staining_cond1,
                        cf_perspiration_acis_staining_value1 : cf_perspiration_acis_staining_value1,
                        cf_perspiration_acis_staining_value2 : cf_perspiration_acis_staining_value2,
                        cf_perspiration_acis_staining_cond2 : cf_perspiration_acis_staining_cond2,

                        cf_perspiration_alkali_c_change_cond1 : cf_perspiration_alkali_c_change_cond1,
                        cf_perspiration_alkali_c_change_value1 : cf_perspiration_alkali_c_change_value1,
                        cf_perspiration_alkali_c_change_value2 : cf_perspiration_alkali_c_change_value2,
                        cf_perspiration_alkali_c_change_cond2 : cf_perspiration_alkali_c_change_cond2,

                        cf_perspiration_alkali_staining_cond1 : cf_perspiration_alkali_staining_cond1,
                        cf_perspiration_alkali_staining_value1 : cf_perspiration_alkali_staining_value1,
                        cf_perspiration_alkali_staining_value2 : cf_perspiration_alkali_staining_value2,
                        cf_perspiration_alkali_staining_cond2 : cf_perspiration_alkali_staining_cond2,

                        cf_water_c_change_cond1 : cf_water_c_change_cond1,
                        cf_water_c_change_value1 : cf_water_c_change_value1,
                        cf_water_c_change_value2 : cf_water_c_change_value2,
                        cf_water_c_change_cond2 : cf_water_c_change_cond2,

                        cf_water_staining_cond1 : cf_water_staining_cond1,
                        cf_water_staining_value1 : cf_water_staining_value1,
                        cf_water_staining_value2 : cf_water_staining_value2,
                        cf_water_staining_cond2 : cf_water_staining_cond2,

                        cf_water_sotting_staining_cond1 : cf_water_sotting_staining_cond1,
                        cf_water_sotting_staining_value1 : cf_water_sotting_staining_value1,
                        cf_water_sotting_staining_value2 : cf_water_sotting_staining_value2,
                        cf_water_sotting_staining_cond2 : cf_water_sotting_staining_cond2,

                        cf_water_wetting_staining_cond1 : cf_water_wetting_staining_cond1,
                        cf_water_wetting_staining_value1 : cf_water_wetting_staining_value1,
                        cf_water_wetting_staining_value2 : cf_water_wetting_staining_value2,
                        cf_water_wetting_staining_cond2 : cf_water_wetting_staining_cond2,

                        cf_hyd_reactive_dyes_c_change_cond1 : cf_hyd_reactive_dyes_c_change_cond1,
                        cf_hyd_reactive_dyes_c_change_value1 : cf_hyd_reactive_dyes_c_change_value1,
                        cf_hyd_reactive_dyes_c_change_value2 : cf_hyd_reactive_dyes_c_change_value2,
                        cf_hyd_reactive_dyes_c_change_cond2 : cf_hyd_reactive_dyes_c_change_cond2,

                        cf_hyd_reactive_dyes_staining_cond1 : cf_hyd_reactive_dyes_staining_cond1,
                        cf_hyd_reactive_dyes_staining_value1 : cf_hyd_reactive_dyes_staining_value1,
                        cf_hyd_reactive_dyes_staining_value2 : cf_hyd_reactive_dyes_staining_value2,
                        cf_hyd_reactive_dyes_staining_cond2 : cf_hyd_reactive_dyes_staining_cond2,

                        cf_oidative_damage_c_change_cond1 : cf_oidative_damage_c_change_cond1,
                        cf_oidative_damage_c_change_value1 : cf_oidative_damage_c_change_value1,
                        cf_oidative_damage_c_change_value2 : cf_oidative_damage_c_change_value2,
                        cf_oidative_damage_c_change_cond2 : cf_oidative_damage_c_change_cond2,

                        cf_phenolic_staining_cond1 : cf_phenolic_staining_cond1,
                        cf_phenolic_staining_value1 : cf_phenolic_staining_value1,
                        cf_phenolic_staining_value2 : cf_phenolic_staining_value2,
                        cf_phenolic_staining_cond2 : cf_phenolic_staining_cond2,

                        cf_pvc_migration_staining_cond1 : cf_pvc_migration_staining_cond1,
                        cf_pvc_migration_staining_value1 : cf_pvc_migration_staining_value1,
                        cf_pvc_migration_staining_value2 : cf_pvc_migration_staining_value2,
                        cf_pvc_migration_staining_cond2 : cf_pvc_migration_staining_cond2,

                        cf_saliva_c_change_cond1 : cf_saliva_c_change_cond1,
                        cf_saliva_c_change_value1 : cf_saliva_c_change_value1,
                        cf_saliva_c_change_value2 : cf_saliva_c_change_value2,
                        cf_saliva_c_change_cond2 : cf_saliva_c_change_cond2,

                        cf_saliva_staining_cond1 : cf_saliva_staining_cond1,
                        cf_saliva_staining_value1 : cf_saliva_staining_value1,
                        cf_saliva_staining_value2 : cf_saliva_staining_value2,
                        cf_saliva_staining_cond2 : cf_saliva_staining_cond2,

                        cf_chlorinated_water_c_change_cond1 : cf_chlorinated_water_c_change_cond1,
                        cf_chlorinated_water_c_change_value1 : cf_chlorinated_water_c_change_value1,
                        cf_chlorinated_water_c_change_value2 : cf_chlorinated_water_c_change_value2,
                        cf_chlorinated_water_c_change_cond2 : cf_chlorinated_water_c_change_cond2,

                        cf_chlorinated_water_staining_cond1 : cf_chlorinated_water_staining_cond1,
                        cf_chlorinated_water_staining_value1 : cf_chlorinated_water_staining_value1,
                        cf_chlorinated_water_staining_value2 : cf_chlorinated_water_staining_value2,
                        cf_chlorinated_water_staining_cond2 : cf_chlorinated_water_staining_cond2,

                        cf_cholorine_bleach_c_change_cond1 : cf_cholorine_bleach_c_change_cond1,
                        cf_cholorine_bleach_c_change_value1 : cf_cholorine_bleach_c_change_value1,
                        cf_cholorine_bleach_c_change_value2 : cf_cholorine_bleach_c_change_value2,
                        cf_cholorine_bleach_c_change_cond2 : cf_cholorine_bleach_c_change_cond2,

                        cf_cholorine_bleach_staining_cond1 : cf_cholorine_bleach_staining_cond1,
                        cf_cholorine_bleach_staining_value1 : cf_cholorine_bleach_staining_value1,
                        cf_cholorine_bleach_staining_value2 : cf_cholorine_bleach_staining_value2,
                        cf_cholorine_bleach_staining_cond2 : cf_cholorine_bleach_staining_cond2,

                        cf_peroxide_bleach_c_change_cond1 : cf_peroxide_bleach_c_change_cond1,
                        cf_peroxide_bleach_c_change_value1 : cf_peroxide_bleach_c_change_value1,
                        cf_peroxide_bleach_c_change_value2 : cf_peroxide_bleach_c_change_value2,
                        cf_peroxide_bleach_c_change_cond2 : cf_peroxide_bleach_c_change_cond2,

                        cf_peroxide_bleach_staining_cond1 : cf_peroxide_bleach_staining_cond1,
                        cf_peroxide_bleach_staining_value1 : cf_peroxide_bleach_staining_value1,
                        cf_peroxide_bleach_staining_value2 : cf_peroxide_bleach_staining_value2,
                        cf_peroxide_bleach_staining_cond2 : cf_peroxide_bleach_staining_cond2,

                        cross_staining_cond1 : cross_staining_cond1,
                        cross_staining_value1 : cross_staining_value1,
                        cross_staining_value2 : cross_staining_value2,
                        cross_staining_cond2 : cross_staining_cond2,

                        cf_artificial_light_c_change_cond1 : cf_artificial_light_c_change_cond1,
                        cf_artificial_light_c_change_value1 : cf_artificial_light_c_change_value1,
                        cf_artificial_light_c_change_value2 : cf_artificial_light_c_change_value2,
                        cf_artificial_light_c_change_cond2 : cf_artificial_light_c_change_cond2,

                        cf_artificial_light_cond1 : cf_artificial_light_cond1,
                        cf_artificial_light_value1 : cf_artificial_light_value1,
                        cf_artificial_light_value2 : cf_artificial_light_value2,
                        cf_artificial_light_cond2 : cf_artificial_light_cond2

                      },
                      success:function(new_data)
                      {
                          $('#others_retrieve_general_data').html(new_data);
                      }
                  });
                   
              }
          });
      }

      else if (pp_version_standard == 13) 
      {
          $.ajax(
          {
              type: "POST",
              url: "calendering_issunce_copy.php",
              method: "POST",
              dataType:"JSON",
              data: 
              {
                calendering_standard_id: standard_id
              },
              success:function(data)
              {
                  $('#others_retrieve_general_data').html("");

                  var cf_rubbing_dry_cond1 = data.cf_rubbing_dry_cond1;
                  var cf_rubbing_dry_value1 = data.cf_rubbing_dry_value1;
                  var cf_rubbing_dry_value2 = data.cf_rubbing_dry_value2;
                  var cf_rubbing_dry_cond2 = data.cf_rubbing_dry_cond2;

                  var cf_rubbing_wet_value1 = data.cf_rubbing_wet_value1;
                  var cf_rubbing_wet_value2 = data.cf_rubbing_wet_value2;
                  var cf_rubbing_wet_cond1 = data.cf_rubbing_wet_cond1;
                  var cf_rubbing_wet_cond2 = data.cf_rubbing_wet_cond2;

                  var wash_dry_warp_before_iron_cond1 = data.wash_dry_warp_before_iron_cond1;
                  var wash_dry_warp_before_iron_value1 = data.wash_dry_warp_before_iron_value1;
                  var wash_dry_warp_before_iron_value2 = data.wash_dry_warp_before_iron_value2;
                  var wash_dry_warp_before_iron_cond2 = data.wash_dry_warp_before_iron_cond2;

                  var wash_dry_weft_before_iron_cond1 = data.wash_dry_weft_before_iron_cond1;
                  var wash_dry_weft_before_iron_value1 = data.wash_dry_weft_before_iron_value1;
                  var wash_dry_weft_before_iron_value2 = data.wash_dry_weft_before_iron_value2;
                  var wash_dry_weft_before_iron_cond2 = data.wash_dry_weft_before_iron_cond2;

                  var wash_dry_warp_after_iron_value2 = data.wash_dry_warp_after_iron_value2;
                  var wash_dry_warp_after_iron_value1 = data.wash_dry_warp_after_iron_value1;
                  var wash_dry_warp_after_iron_cond1 = data.wash_dry_warp_after_iron_cond1;
                  var wash_dry_warp_after_iron_cond2 = data.wash_dry_warp_after_iron_cond2;


                  var wash_dry_weft_after_iron_cond1 = data.wash_dry_weft_after_iron_cond1;
                  var wash_dry_weft_after_iron_value1 = data.wash_dry_weft_after_iron_value1;
                  var wash_dry_weft_after_iron_value2 = data.wash_dry_weft_after_iron_value2;
                  var wash_dry_weft_after_iron_cond2 = data.wash_dry_weft_after_iron_cond2;

                  var dry_cleaning_warp_cond1 = data.dry_cleaning_warp_cond1;
                  var dry_cleaning_warp_value1 = data.dry_cleaning_warp_value1;
                  var dry_cleaning_warp_value2 = data.dry_cleaning_warp_value2;
                  var dry_cleaning_warp_cond2 = data.dry_cleaning_warp_cond2;

                  var dry_cleaning_weft_cond1 = data.dry_cleaning_weft_cond1;
                  var dry_cleaning_weft_value1 = data.dry_cleaning_weft_value1;
                  var dry_cleaning_weft_value2 = data.dry_cleaning_weft_value2;
                  var dry_cleaning_weft_cond2 = data.dry_cleaning_weft_cond2;

                  var yarn_count_warp_cond1 = data.yarn_count_warp_cond1;
                  var yarn_count_warp_value1 = data.yarn_count_warp_value1;
                  var yarn_count_warp_value2 = data.yarn_count_warp_value2;
                  var yarn_count_warp_cond2 = data.yarn_count_warp_cond2;
                  var yarn_count_warp_unit = data.yarn_count_warp_unit;

                  var yarn_count_weft_cond1 = data.yarn_count_weft_cond1;
                  var yarn_count_weft_value1 = data.yarn_count_weft_value1;
                  var yarn_count_weft_value2 = data.yarn_count_weft_value2;
                  var yarn_count_weft_cond2 = data.yarn_count_weft_cond2;
                  var yarn_count_weft_unit = data.yarn_count_weft_unit;

                  var number_thread_warp_cond1 = data.number_thread_warp_cond1;
                  var number_thread_warp_value1 = data.number_thread_warp_value1;
                  var number_thread_warp_value2 = data.number_thread_warp_value2;
                  var number_thread_warp_cond2 = data.number_thread_warp_cond2;
                  var number_thread_warp_unit = data.number_thread_warp_unit;

                  var number_thread_weft_cond1 = data.number_thread_weft_cond1;
                  var number_thread_weft_value1 = data.number_thread_weft_value1;
                  var number_thread_weft_value2 = data.number_thread_weft_value2;
                  var number_thread_weft_cond2 = data.number_thread_weft_cond2;
                  var number_thread_weft_unit = data.number_thread_weft_unit;

                  var mass_per_unit_per_area_cond1 = data.mass_per_unit_per_area_cond1;
                  var mass_per_unit_per_area_value1 = data.mass_per_unit_per_area_value1;
                  var mass_per_unit_per_area_value2 = data.mass_per_unit_per_area_value2;
                  var mass_per_unit_per_area_cond2 = data.mass_per_unit_per_area_cond2;
                  var mass_per_unit_per_area_unit = data.mass_per_unit_per_area_unit;

                  var surface_pilling_cond1 = data.surface_pilling_cond1;
                  var surface_pilling_value1 = data.surface_pilling_value1;
                  var surface_pilling_value2 = data.surface_pilling_value2;
                  var surface_pilling_cond2 = data.surface_pilling_cond2;

                  var tensile_warp_cond1 = data.tensile_warp_cond1;
                  var tensile_warp_value1 = data.tensile_warp_value1;
                  var tensile_warp_value2 = data.tensile_warp_value2;
                  var tensile_warp_cond2 = data.tensile_warp_cond2;
                  var tensile_warp_unit = data.tensile_warp_unit;

                  var tensile_weft_cond1 = data.tensile_weft_cond1;
                  var tensile_weft_value1 = data.tensile_weft_value1;
                  var tensile_weft_value2 = data.tensile_weft_value2;
                  var tensile_weft_cond2 = data.tensile_weft_cond2;
                  var tensile_weft_unit = data.tensile_weft_unit;

                  var tear_force_warp_cond1 = data.tear_force_warp_cond1;
                  var tear_force_warp_value1 = data.tear_force_warp_value1;
                  var tear_force_warp_value2 = data.tear_force_warp_value2;
                  var tear_force_warp_cond2 = data.tear_force_warp_cond2;
                  var tear_force_warp_unit = data.tear_force_warp_unit;

                  var tear_force_weft_cond1 = data.tear_force_weft_cond1;
                  var tear_force_weft_value1 = data.tear_force_weft_value1;
                  var tear_force_weft_value2 = data.tear_force_weft_value2;
                  var tear_force_weft_cond2 = data.tear_force_weft_cond2;
                  var tear_force_weft_unit = data.tear_force_weft_unit;

                  var seam_strength_warp_cond1 = data.seam_strength_warp_cond1;
                  var seam_strength_warp_value1 = data.seam_strength_warp_value1;
                  var seam_strength_warp_value2 = data.seam_strength_warp_value2;
                  var seam_strength_warp_cond2 = data.seam_strength_warp_cond2;
                  var seam_strength_warp_unit = data.seam_strength_warp_unit;

                  var seam_strength_weft_cond1 = data.seam_strength_weft_cond1;
                  var seam_strength_weft_value1 = data.seam_strength_weft_value1;
                  var seam_strength_weft_value2 = data.seam_strength_weft_value2;
                  var seam_strength_weft_cond2 = data.seam_strength_weft_cond2;
                  var seam_strength_weft_unit = data.seam_strength_weft_unit;
                  

                  var seam_slipage_resistance = data.seam_slipage_resistance;

                  var seam_resistance_method1_warp_cond1 = data.seam_resistance_method1_warp_cond1;
                  var seam_resistance_method1_warp_value1 = data.seam_resistance_method1_warp_value1;
                  var seam_resistance_method1_warp_value2 = data.seam_resistance_method1_warp_value2;
                  var seam_resistance_method1_warp_cond2 = data.seam_resistance_method1_warp_cond2;
                  var seam_resistance_method1_warp_unit = data.seam_resistance_method1_warp_unit;

                  //Seam Slipage Resistance weft
                  var seam_resistance_method1_weft_cond1 = data.seam_resistance_method1_weft_cond1;
                  var seam_resistance_method1_weft_value1 = data.seam_resistance_method1_weft_value1;
                  var seam_resistance_method1_weft_value2 = data.seam_resistance_method1_weft_value2;
                  var seam_resistance_method1_weft_cond2 = data.seam_resistance_method1_weft_cond2;
                  var seam_resistance_method1_weft_unit = data.seam_resistance_method1_weft_unit;

                  //Seam Slipage Resistance Warp (mm)
                  var seam_resistance_method2_warp_cond1 = data.seam_resistance_method2_warp_cond1;
                  var seam_resistance_method2_warp_value1 = data.seam_resistance_method2_warp_value1;
                  var seam_resistance_method2_warp_value2 = data.seam_resistance_method2_warp_value2;
                  var seam_resistance_method2_warp_cond2 = data.seam_resistance_method2_warp_cond2;
                  var seam_resistance_method2_warp_unit = data.seam_resistance_method2_warp_unit;

                  //Seam Slipage Resistance weft
                  var seam_resistance_method2_weft_cond1 = data.seam_resistance_method2_weft_cond1;
                  var seam_resistance_method2_weft_value1 = data.seam_resistance_method2_weft_value1;
                  var seam_resistance_method2_weft_value2 = data.seam_resistance_method2_weft_value2;
                  var seam_resistance_method2_weft_cond2 = data.seam_resistance_method2_weft_cond2;
                  var seam_resistance_method2_weft_unit = data.seam_resistance_method2_weft_unit;
                  

                  $.ajax(
                  {
                      url: "view_standard_select.php",
                      method: "POST",
                      data: {
                        pp_no_id: pp_no_id, 
                        pp_version: pp_version, 
                        pp_version_standard: pp_version_standard,

                        cf_rubbing_dry_cond1 : cf_rubbing_dry_cond1,
                        cf_rubbing_dry_value1 : cf_rubbing_dry_value1,
                        cf_rubbing_dry_value2 : cf_rubbing_dry_value2,
                        cf_rubbing_dry_cond2 : cf_rubbing_dry_cond2,

                        cf_rubbing_wet_value1 : cf_rubbing_wet_value1,
                        cf_rubbing_wet_value2 : cf_rubbing_wet_value2,
                        cf_rubbing_wet_cond1 : cf_rubbing_wet_cond1,
                        cf_rubbing_wet_cond2 : cf_rubbing_wet_cond2,

                        wash_dry_warp_before_iron_cond1 : wash_dry_warp_before_iron_cond1,
                        wash_dry_warp_before_iron_value1 : wash_dry_warp_before_iron_value1,
                        wash_dry_warp_before_iron_value2 : wash_dry_warp_before_iron_value2,
                        wash_dry_warp_before_iron_cond2 : wash_dry_warp_before_iron_cond2,

                        wash_dry_weft_before_iron_cond1 : wash_dry_weft_before_iron_cond1,
                        wash_dry_weft_before_iron_value1 : wash_dry_weft_before_iron_value1,
                        wash_dry_weft_before_iron_value2 : wash_dry_weft_before_iron_value2,
                        wash_dry_weft_before_iron_cond2 : wash_dry_weft_before_iron_cond2,

                        wash_dry_warp_after_iron_value2 : wash_dry_warp_after_iron_value2,
                        wash_dry_warp_after_iron_value1 : wash_dry_warp_after_iron_value1,
                        wash_dry_warp_after_iron_cond1 : wash_dry_warp_after_iron_cond1,
                        wash_dry_warp_after_iron_cond2 : wash_dry_warp_after_iron_cond2,


                        wash_dry_weft_after_iron_cond1 : wash_dry_weft_after_iron_cond1,
                        wash_dry_weft_after_iron_value1 : wash_dry_weft_after_iron_value1,
                        wash_dry_weft_after_iron_value2 : wash_dry_weft_after_iron_value2,
                        wash_dry_weft_after_iron_cond2 : wash_dry_weft_after_iron_cond2,

                        dry_cleaning_warp_cond1 : dry_cleaning_warp_cond1,
                        dry_cleaning_warp_value1 : dry_cleaning_warp_value1,
                        dry_cleaning_warp_value2 : dry_cleaning_warp_value2,
                        dry_cleaning_warp_cond2 : dry_cleaning_warp_cond2,

                        dry_cleaning_weft_cond1 : dry_cleaning_weft_cond1,
                        dry_cleaning_weft_value1 : dry_cleaning_weft_value1,
                        dry_cleaning_weft_value2 : dry_cleaning_weft_value2,
                        dry_cleaning_weft_cond2 : dry_cleaning_weft_cond2,

                        yarn_count_warp_cond1 : yarn_count_warp_cond1,
                        yarn_count_warp_value1 : yarn_count_warp_value1,
                        yarn_count_warp_value2 : yarn_count_warp_value2,
                        yarn_count_warp_cond2 : yarn_count_warp_cond2,
                        yarn_count_warp_unit : yarn_count_warp_unit,

                        yarn_count_weft_cond1 : yarn_count_weft_cond1,
                        yarn_count_weft_value1 : yarn_count_weft_value1,
                        yarn_count_weft_value2 : yarn_count_weft_value2,
                        yarn_count_weft_cond2 : yarn_count_weft_cond2,
                        yarn_count_weft_unit : yarn_count_weft_unit,

                        number_thread_warp_cond1 : number_thread_warp_cond1,
                        number_thread_warp_value1 : number_thread_warp_value1,
                        number_thread_warp_value2 : number_thread_warp_value2,
                        number_thread_warp_cond2 : number_thread_warp_cond2,
                        number_thread_warp_unit : number_thread_warp_unit,

                        number_thread_weft_cond1 : number_thread_weft_cond1,
                        number_thread_weft_value1 : number_thread_weft_value1,
                        number_thread_weft_value2 : number_thread_weft_value2,
                        number_thread_weft_cond2 : number_thread_weft_cond2,
                        number_thread_weft_unit : number_thread_weft_unit,

                        mass_per_unit_per_area_cond1 : mass_per_unit_per_area_cond1,
                        mass_per_unit_per_area_value1 : mass_per_unit_per_area_value1,
                        mass_per_unit_per_area_value2 : mass_per_unit_per_area_value2,
                        mass_per_unit_per_area_cond2 : mass_per_unit_per_area_cond2,
                        mass_per_unit_per_area_unit : mass_per_unit_per_area_unit,

                        surface_pilling_cond1 : surface_pilling_cond1,
                        surface_pilling_value1 : surface_pilling_value1,
                        surface_pilling_value2 : surface_pilling_value2,
                        surface_pilling_cond2 : surface_pilling_cond2,

                        tensile_warp_cond1 : tensile_warp_cond1,
                        tensile_warp_value1 : tensile_warp_value1,
                        tensile_warp_value2 : tensile_warp_value2,
                        tensile_warp_cond2 : tensile_warp_cond2,
                        tensile_warp_unit : tensile_warp_unit,

                        tensile_weft_cond1 : tensile_weft_cond1,
                        tensile_weft_value1 : tensile_weft_value1,
                        tensile_weft_value2 : tensile_weft_value2,
                        tensile_weft_cond2 : tensile_weft_cond2,
                        tensile_weft_unit : tensile_weft_unit,

                        tear_force_warp_cond1 : tear_force_warp_cond1,
                        tear_force_warp_value1 : tear_force_warp_value1,
                        tear_force_warp_value2 : tear_force_warp_value2,
                        tear_force_warp_cond2 : tear_force_warp_cond2,
                        tear_force_warp_unit : tear_force_warp_unit,

                        tear_force_weft_cond1 : tear_force_weft_cond1,
                        tear_force_weft_value1 : tear_force_weft_value1,
                        tear_force_weft_value2 : tear_force_weft_value2,
                        tear_force_weft_cond2 : tear_force_weft_cond2,
                        tear_force_weft_unit : tear_force_weft_unit,

                        seam_strength_warp_cond1 : seam_strength_warp_cond1,
                        seam_strength_warp_value1 : seam_strength_warp_value1,
                        seam_strength_warp_value2 : seam_strength_warp_value2,
                        seam_strength_warp_cond2 : seam_strength_warp_cond2,
                        seam_strength_warp_unit : seam_strength_warp_unit,

                        seam_strength_weft_cond1 : seam_strength_weft_cond1,
                        seam_strength_weft_value1 : seam_strength_weft_value1,
                        seam_strength_weft_value2 : seam_strength_weft_value2,
                        seam_strength_weft_cond2 : seam_strength_weft_cond2,
                        seam_strength_weft_unit : seam_strength_weft_unit,


                        seam_slipage_resistance : seam_slipage_resistance,

                        seam_resistance_method1_warp_cond1 : seam_resistance_method1_warp_cond1,
                        seam_resistance_method1_warp_value1 : seam_resistance_method1_warp_value1,
                        seam_resistance_method1_warp_value2 : seam_resistance_method1_warp_value2,
                        seam_resistance_method1_warp_cond2 : seam_resistance_method1_warp_cond2,
                        seam_resistance_method1_warp_unit : seam_resistance_method1_warp_unit,

                        //Seam Slipage Resistance weft
                        seam_resistance_method1_weft_cond1 : seam_resistance_method1_weft_cond1,
                        seam_resistance_method1_weft_value1 : seam_resistance_method1_weft_value1,
                        seam_resistance_method1_weft_value2 : seam_resistance_method1_weft_value2,
                        seam_resistance_method1_weft_cond2 : seam_resistance_method1_weft_cond2,
                        seam_resistance_method1_weft_unit : seam_resistance_method1_weft_unit,

                        //Seam Slipage Resistance Warp (mm)
                        seam_resistance_method2_warp_cond1 : seam_resistance_method2_warp_cond1,
                        seam_resistance_method2_warp_value1 : seam_resistance_method2_warp_value1,
                        seam_resistance_method2_warp_value2 : seam_resistance_method2_warp_value2,
                        seam_resistance_method2_warp_cond2 : seam_resistance_method2_warp_cond2,
                        seam_resistance_method2_warp_unit : seam_resistance_method2_warp_unit,

                        //Seam Slipage Resistance weft
                        seam_resistance_method2_weft_cond1 : seam_resistance_method2_weft_cond1,
                        seam_resistance_method2_weft_value1 : seam_resistance_method2_weft_value1,
                        seam_resistance_method2_weft_value2 : seam_resistance_method2_weft_value2,
                        seam_resistance_method2_weft_cond2 : seam_resistance_method2_weft_cond2,
                        seam_resistance_method2_weft_unit : seam_resistance_method2_weft_unit

                      },
                      success:function(new_data)
                      {
                          $('#others_retrieve_general_data').html(new_data);
                      }
                  });
                   
              }
          });
      }

      else if (pp_version_standard == 14) 
      {
          $.ajax(
          {
              type: "POST",
              url: "sanforizing_issunce_copy.php",
              method: "POST",
              dataType:"JSON",
              data: 
              {
                sanforizing_standard_id: standard_id
              },
              success:function(data)
              {
                  $('#others_retrieve_general_data').html("");

                  var cf_rubbing_dry_cond1 = data.cf_rubbing_dry_cond1;
                  var cf_rubbing_dry_value1 = data.cf_rubbing_dry_value1;
                  var cf_rubbing_dry_value2 = data.cf_rubbing_dry_value2;
                  var cf_rubbing_dry_cond2 = data.cf_rubbing_dry_cond2;

                  var cf_rubbing_wet_value1 = data.cf_rubbing_wet_value1;
                  var cf_rubbing_wet_value2 = data.cf_rubbing_wet_value2;
                  var cf_rubbing_wet_cond1 = data.cf_rubbing_wet_cond1;
                  var cf_rubbing_wet_cond2 = data.cf_rubbing_wet_cond2;

                  var wash_dry_warp_before_iron_cond1 = data.wash_dry_warp_before_iron_cond1;
                  var wash_dry_warp_before_iron_value1 = data.wash_dry_warp_before_iron_value1;
                  var wash_dry_warp_before_iron_value2 = data.wash_dry_warp_before_iron_value2;
                  var wash_dry_warp_before_iron_cond2 = data.wash_dry_warp_before_iron_cond2;

                  var wash_dry_weft_before_iron_cond1 = data.wash_dry_weft_before_iron_cond1;
                  var wash_dry_weft_before_iron_value1 = data.wash_dry_weft_before_iron_value1;
                  var wash_dry_weft_before_iron_value2 = data.wash_dry_weft_before_iron_value2;
                  var wash_dry_weft_before_iron_cond2 = data.wash_dry_weft_before_iron_cond2;

                  var wash_dry_warp_after_iron_value2 = data.wash_dry_warp_after_iron_value2;
                  var wash_dry_warp_after_iron_value1 = data.wash_dry_warp_after_iron_value1;
                  var wash_dry_warp_after_iron_cond1 = data.wash_dry_warp_after_iron_cond1;
                  var wash_dry_warp_after_iron_cond2 = data.wash_dry_warp_after_iron_cond2;


                  var wash_dry_weft_after_iron_cond1 = data.wash_dry_weft_after_iron_cond1;
                  var wash_dry_weft_after_iron_value1 = data.wash_dry_weft_after_iron_value1;
                  var wash_dry_weft_after_iron_value2 = data.wash_dry_weft_after_iron_value2;
                  var wash_dry_weft_after_iron_cond2 = data.wash_dry_weft_after_iron_cond2;

                  var dry_cleaning_warp_cond1 = data.dry_cleaning_warp_cond1;
                  var dry_cleaning_warp_value1 = data.dry_cleaning_warp_value1;
                  var dry_cleaning_warp_value2 = data.dry_cleaning_warp_value2;
                  var dry_cleaning_warp_cond2 = data.dry_cleaning_warp_cond2;

                  var dry_cleaning_weft_cond1 = data.dry_cleaning_weft_cond1;
                  var dry_cleaning_weft_value1 = data.dry_cleaning_weft_value1;
                  var dry_cleaning_weft_value2 = data.dry_cleaning_weft_value2;
                  var dry_cleaning_weft_cond2 = data.dry_cleaning_weft_cond2;

                  var yarn_count_warp_cond1 = data.yarn_count_warp_cond1;
                  var yarn_count_warp_value1 = data.yarn_count_warp_value1;
                  var yarn_count_warp_value2 = data.yarn_count_warp_value2;
                  var yarn_count_warp_cond2 = data.yarn_count_warp_cond2;
                  var yarn_count_warp_unit = data.yarn_count_warp_unit;

                  var yarn_count_weft_cond1 = data.yarn_count_weft_cond1;
                  var yarn_count_weft_value1 = data.yarn_count_weft_value1;
                  var yarn_count_weft_value2 = data.yarn_count_weft_value2;
                  var yarn_count_weft_cond2 = data.yarn_count_weft_cond2;
                  var yarn_count_weft_unit = data.yarn_count_weft_unit;

                  var number_thread_warp_cond1 = data.number_thread_warp_cond1;
                  var number_thread_warp_value1 = data.number_thread_warp_value1;
                  var number_thread_warp_value2 = data.number_thread_warp_value2;
                  var number_thread_warp_cond2 = data.number_thread_warp_cond2;
                  var number_thread_warp_unit = data.number_thread_warp_unit;

                  var number_thread_weft_cond1 = data.number_thread_weft_cond1;
                  var number_thread_weft_value1 = data.number_thread_weft_value1;
                  var number_thread_weft_value2 = data.number_thread_weft_value2;
                  var number_thread_weft_cond2 = data.number_thread_weft_cond2;
                  var number_thread_weft_unit = data.number_thread_weft_unit;

                  var mass_per_unit_per_area_cond1 = data.mass_per_unit_per_area_cond1;
                  var mass_per_unit_per_area_value1 = data.mass_per_unit_per_area_value1;
                  var mass_per_unit_per_area_value2 = data.mass_per_unit_per_area_value2;
                  var mass_per_unit_per_area_cond2 = data.mass_per_unit_per_area_cond2;
                  var mass_per_unit_per_area_unit = data.mass_per_unit_per_area_unit;

                  var surface_pilling_cond1 = data.surface_pilling_cond1;
                  var surface_pilling_value1 = data.surface_pilling_value1;
                  var surface_pilling_value2 = data.surface_pilling_value2;
                  var surface_pilling_cond2 = data.surface_pilling_cond2;

                  var tensile_warp_cond1 = data.tensile_warp_cond1;
                  var tensile_warp_value1 = data.tensile_warp_value1;
                  var tensile_warp_value2 = data.tensile_warp_value2;
                  var tensile_warp_cond2 = data.tensile_warp_cond2;
                  var tensile_warp_unit = data.tensile_warp_unit;

                  var tensile_weft_cond1 = data.tensile_weft_cond1;
                  var tensile_weft_value1 = data.tensile_weft_value1;
                  var tensile_weft_value2 = data.tensile_weft_value2;
                  var tensile_weft_cond2 = data.tensile_weft_cond2;
                  var tensile_weft_unit = data.tensile_weft_unit;

                  var tear_force_warp_cond1 = data.tear_force_warp_cond1;
                  var tear_force_warp_value1 = data.tear_force_warp_value1;
                  var tear_force_warp_value2 = data.tear_force_warp_value2;
                  var tear_force_warp_cond2 = data.tear_force_warp_cond2;
                  var tear_force_warp_unit = data.tear_force_warp_unit;

                  var tear_force_weft_cond1 = data.tear_force_weft_cond1;
                  var tear_force_weft_value1 = data.tear_force_weft_value1;
                  var tear_force_weft_value2 = data.tear_force_weft_value2;
                  var tear_force_weft_cond2 = data.tear_force_weft_cond2;
                  var tear_force_weft_unit = data.tear_force_weft_unit;

                  var seam_strength_warp_cond1 = data.seam_strength_warp_cond1;
                  var seam_strength_warp_value1 = data.seam_strength_warp_value1;
                  var seam_strength_warp_value2 = data.seam_strength_warp_value2;
                  var seam_strength_warp_cond2 = data.seam_strength_warp_cond2;
                  var seam_strength_warp_unit = data.seam_strength_warp_unit;

                  var seam_strength_weft_cond1 = data.seam_strength_weft_cond1;
                  var seam_strength_weft_value1 = data.seam_strength_weft_value1;
                  var seam_strength_weft_value2 = data.seam_strength_weft_value2;
                  var seam_strength_weft_cond2 = data.seam_strength_weft_cond2;
                  var seam_strength_weft_unit = data.seam_strength_weft_unit;
                  

                  var seam_slipage_resistance = data.seam_slipage_resistance;

                  var seam_resistance_method1_warp_cond1 = data.seam_resistance_method1_warp_cond1;
                  var seam_resistance_method1_warp_value1 = data.seam_resistance_method1_warp_value1;
                  var seam_resistance_method1_warp_value2 = data.seam_resistance_method1_warp_value2;
                  var seam_resistance_method1_warp_cond2 = data.seam_resistance_method1_warp_cond2;
                  var seam_resistance_method1_warp_unit = data.seam_resistance_method1_warp_unit;

                  //Seam Slipage Resistance weft
                  var seam_resistance_method1_weft_cond1 = data.seam_resistance_method1_weft_cond1;
                  var seam_resistance_method1_weft_value1 = data.seam_resistance_method1_weft_value1;
                  var seam_resistance_method1_weft_value2 = data.seam_resistance_method1_weft_value2;
                  var seam_resistance_method1_weft_cond2 = data.seam_resistance_method1_weft_cond2;
                  var seam_resistance_method1_weft_unit = data.seam_resistance_method1_weft_unit;

                  //Seam Slipage Resistance Warp (mm)
                  var seam_resistance_method2_warp_cond1 = data.seam_resistance_method2_warp_cond1;
                  var seam_resistance_method2_warp_value1 = data.seam_resistance_method2_warp_value1;
                  var seam_resistance_method2_warp_value2 = data.seam_resistance_method2_warp_value2;
                  var seam_resistance_method2_warp_cond2 = data.seam_resistance_method2_warp_cond2;
                  var seam_resistance_method2_warp_unit = data.seam_resistance_method2_warp_unit;

                  //Seam Slipage Resistance weft
                  var seam_resistance_method2_weft_cond1 = data.seam_resistance_method2_weft_cond1;
                  var seam_resistance_method2_weft_value1 = data.seam_resistance_method2_weft_value1;
                  var seam_resistance_method2_weft_value2 = data.seam_resistance_method2_weft_value2;
                  var seam_resistance_method2_weft_cond2 = data.seam_resistance_method2_weft_cond2;
                  var seam_resistance_method2_weft_unit = data.seam_resistance_method2_weft_unit;
                  

                  $.ajax(
                  {
                      url: "view_standard_select.php",
                      method: "POST",
                      data: {
                        pp_no_id: pp_no_id, 
                        pp_version: pp_version, 
                        pp_version_standard: pp_version_standard,

                        cf_rubbing_dry_cond1 : cf_rubbing_dry_cond1,
                        cf_rubbing_dry_value1 : cf_rubbing_dry_value1,
                        cf_rubbing_dry_value2 : cf_rubbing_dry_value2,
                        cf_rubbing_dry_cond2 : cf_rubbing_dry_cond2,

                        cf_rubbing_wet_value1 : cf_rubbing_wet_value1,
                        cf_rubbing_wet_value2 : cf_rubbing_wet_value2,
                        cf_rubbing_wet_cond1 : cf_rubbing_wet_cond1,
                        cf_rubbing_wet_cond2 : cf_rubbing_wet_cond2,

                        wash_dry_warp_before_iron_cond1 : wash_dry_warp_before_iron_cond1,
                        wash_dry_warp_before_iron_value1 : wash_dry_warp_before_iron_value1,
                        wash_dry_warp_before_iron_value2 : wash_dry_warp_before_iron_value2,
                        wash_dry_warp_before_iron_cond2 : wash_dry_warp_before_iron_cond2,

                        wash_dry_weft_before_iron_cond1 : wash_dry_weft_before_iron_cond1,
                        wash_dry_weft_before_iron_value1 : wash_dry_weft_before_iron_value1,
                        wash_dry_weft_before_iron_value2 : wash_dry_weft_before_iron_value2,
                        wash_dry_weft_before_iron_cond2 : wash_dry_weft_before_iron_cond2,

                        wash_dry_warp_after_iron_value2 : wash_dry_warp_after_iron_value2,
                        wash_dry_warp_after_iron_value1 : wash_dry_warp_after_iron_value1,
                        wash_dry_warp_after_iron_cond1 : wash_dry_warp_after_iron_cond1,
                        wash_dry_warp_after_iron_cond2 : wash_dry_warp_after_iron_cond2,


                        wash_dry_weft_after_iron_cond1 : wash_dry_weft_after_iron_cond1,
                        wash_dry_weft_after_iron_value1 : wash_dry_weft_after_iron_value1,
                        wash_dry_weft_after_iron_value2 : wash_dry_weft_after_iron_value2,
                        wash_dry_weft_after_iron_cond2 : wash_dry_weft_after_iron_cond2,

                        dry_cleaning_warp_cond1 : dry_cleaning_warp_cond1,
                        dry_cleaning_warp_value1 : dry_cleaning_warp_value1,
                        dry_cleaning_warp_value2 : dry_cleaning_warp_value2,
                        dry_cleaning_warp_cond2 : dry_cleaning_warp_cond2,

                        dry_cleaning_weft_cond1 : dry_cleaning_weft_cond1,
                        dry_cleaning_weft_value1 : dry_cleaning_weft_value1,
                        dry_cleaning_weft_value2 : dry_cleaning_weft_value2,
                        dry_cleaning_weft_cond2 : dry_cleaning_weft_cond2,

                        yarn_count_warp_cond1 : yarn_count_warp_cond1,
                        yarn_count_warp_value1 : yarn_count_warp_value1,
                        yarn_count_warp_value2 : yarn_count_warp_value2,
                        yarn_count_warp_cond2 : yarn_count_warp_cond2,
                        yarn_count_warp_unit : yarn_count_warp_unit,

                        yarn_count_weft_cond1 : yarn_count_weft_cond1,
                        yarn_count_weft_value1 : yarn_count_weft_value1,
                        yarn_count_weft_value2 : yarn_count_weft_value2,
                        yarn_count_weft_cond2 : yarn_count_weft_cond2,
                        yarn_count_weft_unit : yarn_count_weft_unit,

                        number_thread_warp_cond1 : number_thread_warp_cond1,
                        number_thread_warp_value1 : number_thread_warp_value1,
                        number_thread_warp_value2 : number_thread_warp_value2,
                        number_thread_warp_cond2 : number_thread_warp_cond2,
                        number_thread_warp_unit : number_thread_warp_unit,

                        number_thread_weft_cond1 : number_thread_weft_cond1,
                        number_thread_weft_value1 : number_thread_weft_value1,
                        number_thread_weft_value2 : number_thread_weft_value2,
                        number_thread_weft_cond2 : number_thread_weft_cond2,
                        number_thread_weft_unit : number_thread_weft_unit,

                        mass_per_unit_per_area_cond1 : mass_per_unit_per_area_cond1,
                        mass_per_unit_per_area_value1 : mass_per_unit_per_area_value1,
                        mass_per_unit_per_area_value2 : mass_per_unit_per_area_value2,
                        mass_per_unit_per_area_cond2 : mass_per_unit_per_area_cond2,
                        mass_per_unit_per_area_unit : mass_per_unit_per_area_unit,

                        surface_pilling_cond1 : surface_pilling_cond1,
                        surface_pilling_value1 : surface_pilling_value1,
                        surface_pilling_value2 : surface_pilling_value2,
                        surface_pilling_cond2 : surface_pilling_cond2,

                        tensile_warp_cond1 : tensile_warp_cond1,
                        tensile_warp_value1 : tensile_warp_value1,
                        tensile_warp_value2 : tensile_warp_value2,
                        tensile_warp_cond2 : tensile_warp_cond2,
                        tensile_warp_unit : tensile_warp_unit,

                        tensile_weft_cond1 : tensile_weft_cond1,
                        tensile_weft_value1 : tensile_weft_value1,
                        tensile_weft_value2 : tensile_weft_value2,
                        tensile_weft_cond2 : tensile_weft_cond2,
                        tensile_weft_unit : tensile_weft_unit,

                        tear_force_warp_cond1 : tear_force_warp_cond1,
                        tear_force_warp_value1 : tear_force_warp_value1,
                        tear_force_warp_value2 : tear_force_warp_value2,
                        tear_force_warp_cond2 : tear_force_warp_cond2,
                        tear_force_warp_unit : tear_force_warp_unit,

                        tear_force_weft_cond1 : tear_force_weft_cond1,
                        tear_force_weft_value1 : tear_force_weft_value1,
                        tear_force_weft_value2 : tear_force_weft_value2,
                        tear_force_weft_cond2 : tear_force_weft_cond2,
                        tear_force_weft_unit : tear_force_weft_unit,

                        seam_strength_warp_cond1 : seam_strength_warp_cond1,
                        seam_strength_warp_value1 : seam_strength_warp_value1,
                        seam_strength_warp_value2 : seam_strength_warp_value2,
                        seam_strength_warp_cond2 : seam_strength_warp_cond2,
                        seam_strength_warp_unit : seam_strength_warp_unit,

                        seam_strength_weft_cond1 : seam_strength_weft_cond1,
                        seam_strength_weft_value1 : seam_strength_weft_value1,
                        seam_strength_weft_value2 : seam_strength_weft_value2,
                        seam_strength_weft_cond2 : seam_strength_weft_cond2,
                        seam_strength_weft_unit : seam_strength_weft_unit,


                        seam_slipage_resistance : seam_slipage_resistance,

                        seam_resistance_method1_warp_cond1 : seam_resistance_method1_warp_cond1,
                        seam_resistance_method1_warp_value1 : seam_resistance_method1_warp_value1,
                        seam_resistance_method1_warp_value2 : seam_resistance_method1_warp_value2,
                        seam_resistance_method1_warp_cond2 : seam_resistance_method1_warp_cond2,
                        seam_resistance_method1_warp_unit : seam_resistance_method1_warp_unit,

                        //Seam Slipage Resistance weft
                        seam_resistance_method1_weft_cond1 : seam_resistance_method1_weft_cond1,
                        seam_resistance_method1_weft_value1 : seam_resistance_method1_weft_value1,
                        seam_resistance_method1_weft_value2 : seam_resistance_method1_weft_value2,
                        seam_resistance_method1_weft_cond2 : seam_resistance_method1_weft_cond2,
                        seam_resistance_method1_weft_unit : seam_resistance_method1_weft_unit,

                        //Seam Slipage Resistance Warp (mm)
                        seam_resistance_method2_warp_cond1 : seam_resistance_method2_warp_cond1,
                        seam_resistance_method2_warp_value1 : seam_resistance_method2_warp_value1,
                        seam_resistance_method2_warp_value2 : seam_resistance_method2_warp_value2,
                        seam_resistance_method2_warp_cond2 : seam_resistance_method2_warp_cond2,
                        seam_resistance_method2_warp_unit : seam_resistance_method2_warp_unit,

                        //Seam Slipage Resistance weft
                        seam_resistance_method2_weft_cond1 : seam_resistance_method2_weft_cond1,
                        seam_resistance_method2_weft_value1 : seam_resistance_method2_weft_value1,
                        seam_resistance_method2_weft_value2 : seam_resistance_method2_weft_value2,
                        seam_resistance_method2_weft_cond2 : seam_resistance_method2_weft_cond2,
                        seam_resistance_method2_weft_unit : seam_resistance_method2_weft_unit

                      },
                      success:function(new_data)
                      {
                          $('#others_retrieve_general_data').html(new_data);
                      }
                  });
                   
              }
          });
      }

      else if (pp_version_standard == 15) 
      {
          $.ajax(
          {
              type: "POST",
              url: "raising_issunce_copy.php",
              method: "POST",
              dataType:"JSON",
              data: 
              {
                raising_standard_id: standard_id
              },
              success:function(data)
              {
                  $('#others_retrieve_general_data').html("");

                  

                  var tensile_warp_cond1 = data.tensile_warp_cond1;
                  var tensile_warp_value1 = data.tensile_warp_value1;
                  var tensile_warp_value2 = data.tensile_warp_value2;
                  var tensile_warp_cond2 = data.tensile_warp_cond2;
                  var tensile_warp_unit = data.tensile_warp_unit;

                  var tensile_weft_cond1 = data.tensile_weft_cond1;
                  var tensile_weft_value1 = data.tensile_weft_value1;
                  var tensile_weft_value2 = data.tensile_weft_value2;
                  var tensile_weft_cond2 = data.tensile_weft_cond2;
                  var tensile_weft_unit = data.tensile_weft_unit;

                  var tear_force_warp_cond1 = data.tear_force_warp_cond1;
                  var tear_force_warp_value1 = data.tear_force_warp_value1;
                  var tear_force_warp_value2 = data.tear_force_warp_value2;
                  var tear_force_warp_cond2 = data.tear_force_warp_cond2;
                  var tear_force_warp_unit = data.tear_force_warp_unit;

                  var tear_force_weft_cond1 = data.tear_force_weft_cond1;
                  var tear_force_weft_value1 = data.tear_force_weft_value1;
                  var tear_force_weft_value2 = data.tear_force_weft_value2;
                  var tear_force_weft_cond2 = data.tear_force_weft_cond2;
                  var tear_force_weft_unit = data.tear_force_weft_unit;


                  $.ajax(
                  {
                      url: "view_standard_select.php",
                      method: "POST",
                      data: {
                        pp_no_id: pp_no_id, 
                        pp_version: pp_version, 
                        pp_version_standard: pp_version_standard,

                        tensile_warp_cond1 : tensile_warp_cond1,
                        tensile_warp_value1 : tensile_warp_value1,
                        tensile_warp_value2 : tensile_warp_value2,
                        tensile_warp_cond2 : tensile_warp_cond2,
                        tensile_warp_unit : tensile_warp_unit,

                        tensile_weft_cond1 : tensile_weft_cond1,
                        tensile_weft_value1 : tensile_weft_value1,
                        tensile_weft_value2 : tensile_weft_value2,
                        tensile_weft_cond2 : tensile_weft_cond2,
                        tensile_weft_unit : tensile_weft_unit,

                        tear_force_warp_cond1 : tear_force_warp_cond1,
                        tear_force_warp_value1 : tear_force_warp_value1,
                        tear_force_warp_value2 : tear_force_warp_value2,
                        tear_force_warp_cond2 : tear_force_warp_cond2,
                        tear_force_warp_unit : tear_force_warp_unit,

                        tear_force_weft_cond1 : tear_force_weft_cond1,
                        tear_force_weft_value1 : tear_force_weft_value1,
                        tear_force_weft_value2 : tear_force_weft_value2,
                        tear_force_weft_cond2 : tear_force_weft_cond2,
                        tear_force_weft_unit : tear_force_weft_unit

                      },
                      success:function(new_data)
                      {
                          $('#others_retrieve_general_data').html(new_data);
                      }
                  });
                   
              }
          });
      }

      else if (pp_version_standard == 16) 
      {
          $.ajax(
          {
              type: "POST",
              url: "ready_for_raising_issunce_copy.php",
              method: "POST",
              dataType:"JSON",
              data: 
              {
                ready_for_raising_standard_id: standard_id
              },
              success:function(data)
              {
                  $('#others_retrieve_general_data').html("");

                  

                  var tensile_warp_cond1 = data.tensile_warp_cond1;
                  var tensile_warp_value1 = data.tensile_warp_value1;
                  var tensile_warp_value2 = data.tensile_warp_value2;
                  var tensile_warp_cond2 = data.tensile_warp_cond2;
                  var tensile_warp_unit = data.tensile_warp_unit;

                  var tensile_weft_cond1 = data.tensile_weft_cond1;
                  var tensile_weft_value1 = data.tensile_weft_value1;
                  var tensile_weft_value2 = data.tensile_weft_value2;
                  var tensile_weft_cond2 = data.tensile_weft_cond2;
                  var tensile_weft_unit = data.tensile_weft_unit;

                  var tear_force_warp_cond1 = data.tear_force_warp_cond1;
                  var tear_force_warp_value1 = data.tear_force_warp_value1;
                  var tear_force_warp_value2 = data.tear_force_warp_value2;
                  var tear_force_warp_cond2 = data.tear_force_warp_cond2;
                  var tear_force_warp_unit = data.tear_force_warp_unit;

                  var tear_force_weft_cond1 = data.tear_force_weft_cond1;
                  var tear_force_weft_value1 = data.tear_force_weft_value1;
                  var tear_force_weft_value2 = data.tear_force_weft_value2;
                  var tear_force_weft_cond2 = data.tear_force_weft_cond2;
                  var tear_force_weft_unit = data.tear_force_weft_unit;


                  $.ajax(
                  {
                      url: "view_standard_select.php",
                      method: "POST",
                      data: {
                        pp_no_id: pp_no_id, 
                        pp_version: pp_version, 
                        pp_version_standard: pp_version_standard,

                        tensile_warp_cond1 : tensile_warp_cond1,
                        tensile_warp_value1 : tensile_warp_value1,
                        tensile_warp_value2 : tensile_warp_value2,
                        tensile_warp_cond2 : tensile_warp_cond2,
                        tensile_warp_unit : tensile_warp_unit,

                        tensile_weft_cond1 : tensile_weft_cond1,
                        tensile_weft_value1 : tensile_weft_value1,
                        tensile_weft_value2 : tensile_weft_value2,
                        tensile_weft_cond2 : tensile_weft_cond2,
                        tensile_weft_unit : tensile_weft_unit,

                        tear_force_warp_cond1 : tear_force_warp_cond1,
                        tear_force_warp_value1 : tear_force_warp_value1,
                        tear_force_warp_value2 : tear_force_warp_value2,
                        tear_force_warp_cond2 : tear_force_warp_cond2,
                        tear_force_warp_unit : tear_force_warp_unit,

                        tear_force_weft_cond1 : tear_force_weft_cond1,
                        tear_force_weft_value1 : tear_force_weft_value1,
                        tear_force_weft_value2 : tear_force_weft_value2,
                        tear_force_weft_cond2 : tear_force_weft_cond2,
                        tear_force_weft_unit : tear_force_weft_unit

                      },
                      success:function(new_data)
                      {
                          $('#others_retrieve_general_data').html(new_data);
                      }
                  });
                   
              }
          });
      }

      else if (pp_version_standard == 17)
      {
          $.ajax(
          {
              type: "POST",
              url: "ready_for_print_issunce_copy.php",
              method: "POST",
              dataType:"JSON",
              data: 
              {
                ready_for_print_standard_id: standard_id
              },
              success:function(data)
              {
                  $('#others_retrieve_general_data').html("");

                  var whiteness_cond1 = data.whiteness_cond1;
                  var whiteness_value1 = data.whiteness_value1;
                  var whiteness_value2 = data.whiteness_value2;
                  var whiteness_cond2 = data.whiteness_cond2;

                  var bowing_and_skew_cond1 = data.bowing_and_skew_cond1;
                  var bowing_and_skew_value1 = data.bowing_and_skew_value1;
                  var bowing_and_skew_value2 = data.bowing_and_skew_value2;
                  var bowing_and_skew_cond2 = data.bowing_and_skew_cond2;

                  var ph_cond1 = data.ph_cond1;
                  var ph_value1 = data.ph_value1;
                  var ph_value2 = data.ph_value2;
                  var ph_cond2 = data.ph_cond2;

                  $.ajax(
                  {
                      url: "view_standard_select.php",
                      method: "POST",
                      data: {
                        pp_no_id: pp_no_id, 
                        pp_version: pp_version, 
                        pp_version_standard: pp_version_standard,

                        whiteness_cond1: whiteness_cond1,
                        whiteness_value1: whiteness_value1,
                        whiteness_value2: whiteness_value2,
                        whiteness_cond2: whiteness_cond2,

                        bowing_and_skew_cond1: bowing_and_skew_cond1,
                        bowing_and_skew_value1: bowing_and_skew_value1,
                        bowing_and_skew_value2: bowing_and_skew_value2,
                        bowing_and_skew_cond2: bowing_and_skew_cond2,

                        ph_cond1: ph_cond1,
                        ph_value1: ph_value1,
                        ph_value2: ph_value2,
                        ph_cond2: ph_cond2

                      },
                      success:function(new_data)
                      {
                          $('#others_retrieve_general_data').html(new_data);
                      }
                  });
                   
              }
          });
      }

      else if (pp_version_standard == 18)
      {
          $.ajax(
          {
              type: "POST",
              url: "ready_for_dying_issunce_copy.php",
              method: "POST",
              dataType:"JSON",
              data: 
              {
                ready_for_dying_standard_id: standard_id
              },
              success:function(data)
              {
                  $('#others_retrieve_general_data').html("");

                  var whiteness_cond1 = data.whiteness_cond1;
                  var whiteness_value1 = data.whiteness_value1;
                  var whiteness_value2 = data.whiteness_value2;
                  var whiteness_cond2 = data.whiteness_cond2;

                  var bowing_and_skew_cond1 = data.bowing_and_skew_cond1;
                  var bowing_and_skew_value1 = data.bowing_and_skew_value1;
                  var bowing_and_skew_value2 = data.bowing_and_skew_value2;
                  var bowing_and_skew_cond2 = data.bowing_and_skew_cond2;

                  var ph_cond1 = data.ph_cond1;
                  var ph_value1 = data.ph_value1;
                  var ph_value2 = data.ph_value2;
                  var ph_cond2 = data.ph_cond2;

                  $.ajax(
                  {
                      url: "view_standard_select.php",
                      method: "POST",
                      data: {
                        pp_no_id: pp_no_id, 
                        pp_version: pp_version, 
                        pp_version_standard: pp_version_standard,

                        whiteness_cond1: whiteness_cond1,
                        whiteness_value1: whiteness_value1,
                        whiteness_value2: whiteness_value2,
                        whiteness_cond2: whiteness_cond2,

                        bowing_and_skew_cond1: bowing_and_skew_cond1,
                        bowing_and_skew_value1: bowing_and_skew_value1,
                        bowing_and_skew_value2: bowing_and_skew_value2,
                        bowing_and_skew_cond2: bowing_and_skew_cond2,

                        ph_cond1: ph_cond1,
                        ph_value1: ph_value1,
                        ph_value2: ph_value2,
                        ph_cond2: ph_cond2

                      },
                      success:function(new_data)
                      {
                          $('#others_retrieve_general_data').html(new_data);
                      }
                  });
                   
              }
          });
      }

      else
      {

      }
      
  }

  function send_data_of_define_standard_of_greige_form_to_database(pp_version_id)
  {
      var formValidation = Form_Validation();
      //var formValidation = true;

      if(formValidation != false)
      {
          var formdata = new FormData(document.getElementById('gray_variable_form'));

          $.ajax(
          {
              type: "POST",
              url: "add_gray_variable_saving.php",// where you wanna post
              data: formdata,
              processData: false,
              contentType: false,
              error: function(jqXHR, textStatus, errorMessage) 
              {
                  alert(errorMessage);
              },
              success: function(data) 
              {
                  if (data == "Yes")
                  {
                      info_alert("Data not Submitted");
                  }
                  else
                  {
                      //alert(data);
                      var pp_no_id = document.getElementById("pp_no_id").value;
                      //var pp_version = document.getElementById("pp_version").value;
                      var pp_version_standard = document.getElementById("pp_version_standard").value;

                      $.ajax(
                      {
                          url: "view_standard_select.php",
                          method: "POST",
                          data: {pp_no_id: pp_no_id, pp_version: pp_version_id, pp_version_standard: pp_version_standard},
                          success:function(data)
                          {
                              //alert(data);
                              $('#retrieve_general_data').html(data);
                          }
                      });
                  }
              } 
          });
      }
  }

  function edit_for_gray_standard()
  {
      var pp_no = document.getElementById("pp_no").value;
      var color = document.getElementById("color").value;
      var version = document.getElementById("version").value;
      var gray_width = document.getElementById("gray_width").value;
      var pp_id_number = document.getElementById("pp_id_number").value;
      var pp_details_id = document.getElementById("pp_details_id").value;

      $.ajax(
      {
          type: "POST",
          url: "edit_view_standards.php",
          method: "POST",
          data: 
          {
            pp_no: pp_no, 
            color: color,
            version: version,
            gray_width: gray_width,
            pp_id_number: pp_id_number,
            pp_details_id: pp_details_id
          },
          success:function(data)
          {
              $('#retrieve_edit_data').html(data);
          }
      });
  }

  function update_edit_standard_data(pp_version_id)
  {
      var formValidation = Form_Validation();

      if(formValidation != false)
      {
        var formdata = new FormData(document.getElementById('gray_variable_form'));
        $.ajax(
        {
            type: "POST",
            url: "edit_gray_variable_saving.php",// where you wanna post
            data: formdata,
            processData: false,
            contentType: false,
            error: function(jqXHR, textStatus, errorMessage) 
            {
                alert(errorMessage);
            },
            success: function(data) 
            {
              //info_alert(data);
              // var pp_id_number = document.getElementById("pp_no_id").value;
              // success_alert("All Data Update Successfully", "../variable/gray_variable.php?pp_no_id="+pp_id_number);

              //var pp_id_number = document.getElementById("pp_no_id").value;
              //var pp_details_id = document.getElementById("pp_details_id").value;
              //success_alert("All Data Save Successfully", "../standard/gray_variable.php?pp_no_id="+pp_id_number+"&pp_version="+pp_details_id+"&pp_version_standard=1");
              if (data == "Yes")
              {
                  info_alert("Data not Submitted");
              }
              else
              {
                  // //success_alert("Data Update Successfully", "../standard/gray_variable.php");
                  // var pp_no_id = document.getElementById("pp_no_id").value;
                  // var pp_version = document.getElementById("pp_version").value;
                  // var pp_version_standard = document.getElementById("pp_version_standard").value;
                  // //var formdata = new FormData(document.getElementById("define-standard-form"));
                  // //alert(formdata);

                  // $.ajax(
                  // {
                  //     type: "POST",
                  //     url: "define_view_standards.php",
                  //     method: "POST",
                  //     data: 
                  //     {
                  //       pp_no_id: pp_no_id, 
                  //       pp_version: pp_version,
                  //       pp_version_standard: pp_version_standard
                  //     },
                  //     success:function(data)
                  //     {
                  //         $('#retrieve_general_data').html(data);
                  //     }
                  // });

                  var pp_no_id = document.getElementById("pp_no_id").value;
                  //var pp_version = document.getElementById("pp_version").value;
                  var pp_version_standard = document.getElementById("pp_version_standard").value;

                  $.ajax(
                  {
                      url: "view_standard_select.php",
                      method: "POST",
                      data: {pp_no_id: pp_no_id, pp_version: pp_version_id, pp_version_standard: pp_version_standard},
                      success:function(data)
                      {
                          //alert(data);
                          $('#others_retrieve_general_data').html(data);
                      }
                  });
              }
            } 
        });
      }
  }


  function send_data_of_define_standard_of_singe_form_to_database(pp_version_id)
  {
      var formValidation = Form_Validation_For_Singe();

      if(formValidation != false)
      {
          var formdata = new FormData(document.getElementById('singe_standard_form'));
          $.ajax(
          {
              type: "POST",
              url: "add_singe_standard_saving.php",// where you wanna post
              data: formdata,
              processData: false,
              contentType: false,
              error: function(jqXHR, textStatus, errorMessage) 
              {
                  alert(errorMessage);
              },
              success: function(data) 
              {
                  //info_alert(data);
                  // var pp_id_number = document.getElementById("pp_no_id").value;
                  // success_alert("All Data Save Successfully", "../variable/gray_variable.php?pp_no_id="+pp_id_number);
                  
                  //var pp_id_number = document.getElementById("pp_id_number").value;
                  //var pp_details_id = document.getElementById("pp_details_id").value;
                  //success_alert("All Data Save Successfully", "../standard/gray_variable.php?pp_no_id="+pp_id_number+"&pp_version="+pp_details_id+"&pp_version_standard=1");
                  
                  //window.location = 'gray_issue.php';

                  if (data == "Yes")
                  {
                      info_alert("Data not Submitted");
                  }
                  else
                  {
                      //success_alert("All Data Save Successfully", "../standard/gray_variable.php");
                      //success_alert("Data Update Successfully", "../standard/gray_variable.php");
                      // var pp_no_id = document.getElementById("pp_no_id").value;
                      // var pp_version = document.getElementById("pp_version").value;
                      // var pp_version_standard = document.getElementById("pp_version_standard").value;
                      // //var formdata = new FormData(document.getElementById("define-standard-form"));
                      // //alert(formdata);

                      // $.ajax(
                      // {
                      //     type: "POST",
                      //     url: "define_view_standards.php",
                      //     method: "POST",
                      //     data: 
                      //     {
                      //       pp_no_id: pp_no_id, 
                      //       pp_version: pp_version,
                      //       pp_version_standard: pp_version_standard
                      //     },
                      //     success:function(data)
                      //     {
                      //         $('#retrieve_general_data').html(data);
                      //     }
                      // });

                      var pp_no_id = document.getElementById("pp_no_id").value;
                      //var pp_version = document.getElementById("pp_version").value;
                      var pp_version_standard = document.getElementById("pp_version_standard").value;

                      $.ajax(
                      {
                          url: "view_standard_select.php",
                          method: "POST",
                          data: {pp_no_id: pp_no_id, pp_version: pp_version_id, pp_version_standard: pp_version_standard},
                          success:function(data)
                          {
                              //alert(data);
                              $('#retrieve_general_data').html(data);
                          }
                      });
                  }
              } 
          });
      }
  }


  function send_data_of_define_standard_of_bleaching_form_to_database(pp_version_id)
  {
      var formValidation = Form_Validation_For_Bleaching();

      if(formValidation != false)
      {
          var formdata = new FormData(document.getElementById('bleaching_standard_form'));
          $.ajax(
          {
              type: "POST",
              url: "add_bleaching_standard_saving.php",// where you wanna post
              data: formdata,
              processData: false,
              contentType: false,
              error: function(jqXHR, textStatus, errorMessage) 
              {
                  alert(errorMessage);
              },
              success: function(data) 
              {
                  //info_alert(data);
                  // var pp_id_number = document.getElementById("pp_no_id").value;
                  // success_alert("All Data Save Successfully", "../variable/gray_variable.php?pp_no_id="+pp_id_number);
                  
                  //var pp_id_number = document.getElementById("pp_id_number").value;
                  //var pp_details_id = document.getElementById("pp_details_id").value;
                  //success_alert("All Data Save Successfully", "../standard/gray_variable.php?pp_no_id="+pp_id_number+"&pp_version="+pp_details_id+"&pp_version_standard=1");
                  
                  //window.location = 'gray_issue.php';

                  if (data == "Yes")
                  {
                      info_alert("Data not Submitted");
                  }
                  else
                  {
                      //success_alert("All Data Save Successfully", "../standard/gray_variable.php");
                      //success_alert("Data Update Successfully", "../standard/gray_variable.php");
                      // var pp_no_id = document.getElementById("pp_no_id").value;
                      // var pp_version = document.getElementById("pp_version").value;
                      // var pp_version_standard = document.getElementById("pp_version_standard").value;
                      // //var formdata = new FormData(document.getElementById("define-standard-form"));
                      // //alert(formdata);

                      // $.ajax(
                      // {
                      //     type: "POST",
                      //     url: "define_view_standards.php",
                      //     method: "POST",
                      //     data: 
                      //     {
                      //       pp_no_id: pp_no_id, 
                      //       pp_version: pp_version,
                      //       pp_version_standard: pp_version_standard
                      //     },
                      //     success:function(data)
                      //     {
                      //         $('#retrieve_general_data').html(data);
                      //     }
                      // });


                      var pp_no_id = document.getElementById("pp_no_id").value;
                      //var pp_version = document.getElementById("pp_version").value;
                      var pp_version_standard = document.getElementById("pp_version_standard").value;

                      $.ajax(
                      {
                          url: "view_standard_select.php",
                          method: "POST",
                          data: {pp_no_id: pp_no_id, pp_version: pp_version_id, pp_version_standard: pp_version_standard},
                          success:function(data)
                          {
                              //alert(data);
                              $('#retrieve_general_data').html(data);
                          }
                      });
                  }
              } 
          });
      }
  }


  function send_data_of_define_standard_of_scouring_bleaching_form_to_database(pp_version_id)
  {
      var formValidation = Form_Validation_For_Scouring_Bleaching();

      if(formValidation != false)
      {
          var formdata = new FormData(document.getElementById('scouring_bleaching_standard_form'));
          $.ajax(
          {
              type: "POST",
              url: "add_scouring_bleaching_standard_saving.php",// where you wanna post
              data: formdata,
              processData: false,
              contentType: false,
              error: function(jqXHR, textStatus, errorMessage) 
              {
                  alert(errorMessage);
              },
              success: function(data) 
              {

                  if (data == "Yes")
                  {
                      info_alert("Data not Submitted");
                  }
                  else
                  {
                      var pp_no_id = document.getElementById("pp_no_id").value;
                      //var pp_version = document.getElementById("pp_version").value;
                      var pp_version_standard = document.getElementById("pp_version_standard").value;

                      $.ajax(
                      {
                          url: "view_standard_select.php",
                          method: "POST",
                          data: {pp_no_id: pp_no_id, pp_version: pp_version_id, pp_version_standard: pp_version_standard},
                          success:function(data)
                          {
                              //alert(data);
                              $('#retrieve_general_data').html(data);
                          }
                      });
                  }
              } 
          });
      }
  }

  function send_data_of_define_standard_of_scouring_form_to_database(pp_version_id)
  {
      var formValidation = Form_Validation_For_Scouring();

      if(formValidation != false)
      {
          var formdata = new FormData(document.getElementById('scouring_standard_form'));
          $.ajax(
          {
              type: "POST",
              url: "add_scouring_standard_saving.php",// where you wanna post
              data: formdata,
              processData: false,
              contentType: false,
              error: function(jqXHR, textStatus, errorMessage) 
              {
                  alert(errorMessage);
              },
              success: function(data) 
              {

                  if (data == "Yes")
                  {
                      info_alert("Data not Submitted");
                  }
                  else
                  {
                      var pp_no_id = document.getElementById("pp_no_id").value;
                      //var pp_version = document.getElementById("pp_version").value;
                      var pp_version_standard = document.getElementById("pp_version_standard").value;

                      $.ajax(
                      {
                          url: "view_standard_select.php",
                          method: "POST",
                          data: {pp_no_id: pp_no_id, pp_version: pp_version_id, pp_version_standard: pp_version_standard},
                          success:function(data)
                          {
                              //alert(data);
                              $('#retrieve_general_data').html(data);
                          }
                      });
                  }
              } 
          });
      }
  }


  function send_data_of_define_standard_of_ready_mercerize_form_to_database(pp_version_id)
  {
      var formValidation = Form_Validation_For_Ready_Mercetize();

      if(formValidation != false)
      {
          var formdata = new FormData(document.getElementById('ready_mercerize_standard_form'));
          $.ajax(
          {
              type: "POST",
              url: "add_ready_mercerize_standard_saving.php",// where you wanna post
              data: formdata,
              processData: false,
              contentType: false,
              error: function(jqXHR, textStatus, errorMessage) 
              {
                  alert(errorMessage);
              },
              success: function(data) 
              {
                  //info_alert(data);
                  // var pp_id_number = document.getElementById("pp_no_id").value;
                  // success_alert("All Data Save Successfully", "../variable/gray_variable.php?pp_no_id="+pp_id_number);
                  
                  //var pp_id_number = document.getElementById("pp_id_number").value;
                  //var pp_details_id = document.getElementById("pp_details_id").value;
                  //success_alert("All Data Save Successfully", "../standard/gray_variable.php?pp_no_id="+pp_id_number+"&pp_version="+pp_details_id+"&pp_version_standard=1");
                  
                  //window.location = 'gray_issue.php';

                  if (data == "Yes")
                  {
                      info_alert("Data not Submitted");
                  }
                  else
                  {
                      //success_alert("All Data Save Successfully", "../standard/gray_variable.php");
                      //success_alert("Data Update Successfully", "../standard/gray_variable.php");
                      // var pp_no_id = document.getElementById("pp_no_id").value;
                      // var pp_version = document.getElementById("pp_version").value;
                      // var pp_version_standard = document.getElementById("pp_version_standard").value;
                      // //var formdata = new FormData(document.getElementById("define-standard-form"));
                      // //alert(formdata);

                      // $.ajax(
                      // {
                      //     type: "POST",
                      //     url: "define_view_standards.php",
                      //     method: "POST",
                      //     data: 
                      //     {
                      //       pp_no_id: pp_no_id, 
                      //       pp_version: pp_version,
                      //       pp_version_standard: pp_version_standard
                      //     },
                      //     success:function(data)
                      //     {
                      //         $('#retrieve_general_data').html(data);
                      //     }
                      // });


                      var pp_no_id = document.getElementById("pp_no_id").value;
                      //var pp_version = document.getElementById("pp_version").value;
                      var pp_version_standard = document.getElementById("pp_version_standard").value;

                      $.ajax(
                      {
                          url: "view_standard_select.php",
                          method: "POST",
                          data: {pp_no_id: pp_no_id, pp_version: pp_version_id, pp_version_standard: pp_version_standard},
                          success:function(data)
                          {
                              //alert(data);
                              $('#retrieve_general_data').html(data);
                          }
                      });
                  }
              } 
          });
      }
  }


  function send_data_of_define_standard_of_equalize_form_to_database(pp_version_id)
  {
      var formValidation = Form_Validation_For_Equalize();

      if(formValidation != false)
      {
          var formdata = new FormData(document.getElementById('equalize_standard_form'));
          $.ajax(
          {
              type: "POST",
              url: "add_equalize_standard_saving.php",// where you wanna post
              data: formdata,
              processData: false,
              contentType: false,
              error: function(jqXHR, textStatus, errorMessage) 
              {
                  alert(errorMessage);
              },
              success: function(data) 
              {
                  //info_alert(data);
                  // var pp_id_number = document.getElementById("pp_no_id").value;
                  // success_alert("All Data Save Successfully", "../variable/gray_variable.php?pp_no_id="+pp_id_number);
                  
                  //var pp_id_number = document.getElementById("pp_id_number").value;
                  //var pp_details_id = document.getElementById("pp_details_id").value;
                  //success_alert("All Data Save Successfully", "../standard/gray_variable.php?pp_no_id="+pp_id_number+"&pp_version="+pp_details_id+"&pp_version_standard=1");
                  
                  //window.location = 'gray_issue.php';

                  if (data == "Yes")
                  {
                      info_alert("Data not Submitted");
                  }
                  else
                  {
                      //success_alert("All Data Save Successfully", "../standard/gray_variable.php");
                      //success_alert("Data Update Successfully", "../standard/gray_variable.php");
                      // var pp_no_id = document.getElementById("pp_no_id").value;
                      // var pp_version = document.getElementById("pp_version").value;
                      // var pp_version_standard = document.getElementById("pp_version_standard").value;
                      // //var formdata = new FormData(document.getElementById("define-standard-form"));
                      // //alert(formdata);

                      // $.ajax(
                      // {
                      //     type: "POST",
                      //     url: "define_view_standards.php",
                      //     method: "POST",
                      //     data: 
                      //     {
                      //       pp_no_id: pp_no_id, 
                      //       pp_version: pp_version,
                      //       pp_version_standard: pp_version_standard
                      //     },
                      //     success:function(data)
                      //     {
                      //         $('#retrieve_general_data').html(data);
                      //     }
                      // });


                      var pp_no_id = document.getElementById("pp_no_id").value;
                      //var pp_version = document.getElementById("pp_version").value;
                      var pp_version_standard = document.getElementById("pp_version_standard").value;

                      $.ajax(
                      {
                          url: "view_standard_select.php",
                          method: "POST",
                          data: {pp_no_id: pp_no_id, pp_version: pp_version_id, pp_version_standard: pp_version_standard},
                          success:function(data)
                          {
                              //alert(data);
                              $('#retrieve_general_data').html(data);
                          }
                      });
                  }
              } 
          });
      }
  }


  function send_data_of_define_standard_of_printing_form_to_database(pp_version_id)
  {
      var formValidation = Form_Validation_For_Printing();

      if(formValidation != false)
      {
          var formdata = new FormData(document.getElementById('printing_standard_form'));
          $.ajax(
          {
              type: "POST",
              url: "add_printing_standard_saving.php",// where you wanna post
              data: formdata,
              processData: false,
              contentType: false,
              error: function(jqXHR, textStatus, errorMessage) 
              {
                  alert(errorMessage);
              },
              success: function(data) 
              {
                  //info_alert(data);
                  // var pp_id_number = document.getElementById("pp_no_id").value;
                  // success_alert("All Data Save Successfully", "../variable/gray_variable.php?pp_no_id="+pp_id_number);
                  
                  //var pp_id_number = document.getElementById("pp_id_number").value;
                  //var pp_details_id = document.getElementById("pp_details_id").value;
                  //success_alert("All Data Save Successfully", "../standard/gray_variable.php?pp_no_id="+pp_id_number+"&pp_version="+pp_details_id+"&pp_version_standard=1");
                  
                  //window.location = 'gray_issue.php';

                  if (data == "Yes")
                  {
                      info_alert("Data not Submitted");
                  }
                  else
                  {
                      //success_alert("All Data Save Successfully", "../standard/gray_variable.php");
                      //success_alert("Data Update Successfully", "../standard/gray_variable.php");
                      // var pp_no_id = document.getElementById("pp_no_id").value;
                      // var pp_version = document.getElementById("pp_version").value;
                      // var pp_version_standard = document.getElementById("pp_version_standard").value;
                      // //var formdata = new FormData(document.getElementById("define-standard-form"));
                      // //alert(formdata);

                      // $.ajax(
                      // {
                      //     type: "POST",
                      //     url: "define_view_standards.php",
                      //     method: "POST",
                      //     data: 
                      //     {
                      //       pp_no_id: pp_no_id, 
                      //       pp_version: pp_version,
                      //       pp_version_standard: pp_version_standard
                      //     },
                      //     success:function(data)
                      //     {
                      //         $('#retrieve_general_data').html(data);
                      //     }
                      // });


                      var pp_no_id = document.getElementById("pp_no_id").value;
                      //var pp_version = document.getElementById("pp_version").value;
                      var pp_version_standard = document.getElementById("pp_version_standard").value;

                      $.ajax(
                      {
                          url: "view_standard_select.php",
                          method: "POST",
                          data: {pp_no_id: pp_no_id, pp_version: pp_version_id, pp_version_standard: pp_version_standard},
                          success:function(data)
                          {
                              //alert(data);
                              $('#retrieve_general_data').html(data);
                          }
                      });
                  }
              } 
          });
      }
  }


  function send_data_of_define_standard_of_curing_form_to_database(pp_version_id)
  {
      var formValidation = Form_Validation_For_Curing();

      if(formValidation != false)
      {
          var formdata = new FormData(document.getElementById('curing_standard_form'));
          $.ajax(
          {
              type: "POST",
              url: "add_curing_standard_saving.php",// where you wanna post
              data: formdata,
              processData: false,
              contentType: false,
              error: function(jqXHR, textStatus, errorMessage) 
              {
                  alert(errorMessage);
              },
              success: function(data) 
              {
                  //info_alert(data);
                  // var pp_id_number = document.getElementById("pp_no_id").value;
                  // success_alert("All Data Save Successfully", "../variable/gray_variable.php?pp_no_id="+pp_id_number);
                  
                  //var pp_id_number = document.getElementById("pp_id_number").value;
                  //var pp_details_id = document.getElementById("pp_details_id").value;
                  //success_alert("All Data Save Successfully", "../standard/gray_variable.php?pp_no_id="+pp_id_number+"&pp_version="+pp_details_id+"&pp_version_standard=1");
                  
                  //window.location = 'gray_issue.php';

                  if (data == "Yes")
                  {
                      info_alert("Data not Submitted");
                  }
                  else
                  {
                      //success_alert("All Data Save Successfully", "../standard/gray_variable.php");
                      //success_alert("Data Update Successfully", "../standard/gray_variable.php");
                      // var pp_no_id = document.getElementById("pp_no_id").value;
                      // var pp_version = document.getElementById("pp_version").value;
                      // var pp_version_standard = document.getElementById("pp_version_standard").value;
                      // //var formdata = new FormData(document.getElementById("define-standard-form"));
                      // //alert(formdata);

                      // $.ajax(
                      // {
                      //     type: "POST",
                      //     url: "define_view_standards.php",
                      //     method: "POST",
                      //     data: 
                      //     {
                      //       pp_no_id: pp_no_id, 
                      //       pp_version: pp_version,
                      //       pp_version_standard: pp_version_standard
                      //     },
                      //     success:function(data)
                      //     {
                      //         $('#retrieve_general_data').html(data);
                      //     }
                      // });


                      var pp_no_id = document.getElementById("pp_no_id").value;
                      //var pp_version = document.getElementById("pp_version").value;
                      var pp_version_standard = document.getElementById("pp_version_standard").value;

                      $.ajax(
                      {
                          url: "view_standard_select.php",
                          method: "POST",
                          data: {pp_no_id: pp_no_id, pp_version: pp_version_id, pp_version_standard: pp_version_standard},
                          success:function(data)
                          {
                              //alert(data);
                              $('#retrieve_general_data').html(data);
                          }
                      });
                  }
              } 
          });
      }
  }



  function send_data_of_define_standard_of_mercerize_form_to_database(pp_version_id)
  {
      var formValidation = Form_Validation_For_Mercetize();

      if(formValidation != false)
      {
          var formdata = new FormData(document.getElementById('mercerize_standard_form'));
          $.ajax(
          {
              type: "POST",
              url: "add_mercerize_standard_saving.php",// where you wanna post
              data: formdata,
              processData: false,
              contentType: false,
              error: function(jqXHR, textStatus, errorMessage) 
              {
                  alert(errorMessage);
              },
              success: function(data) 
              {
                  //info_alert(data);
                  // var pp_id_number = document.getElementById("pp_no_id").value;
                  // success_alert("All Data Save Successfully", "../variable/gray_variable.php?pp_no_id="+pp_id_number);
                  
                  //var pp_id_number = document.getElementById("pp_id_number").value;
                  //var pp_details_id = document.getElementById("pp_details_id").value;
                  //success_alert("All Data Save Successfully", "../standard/gray_variable.php?pp_no_id="+pp_id_number+"&pp_version="+pp_details_id+"&pp_version_standard=1");
                  
                  //window.location = 'gray_issue.php';

                  if (data == "Yes")
                  {
                      info_alert("Data not Submitted");
                  }
                  else
                  {
                      //success_alert("All Data Save Successfully", "../standard/gray_variable.php");
                      //success_alert("Data Update Successfully", "../standard/gray_variable.php");
                      // var pp_no_id = document.getElementById("pp_no_id").value;
                      // var pp_version = document.getElementById("pp_version").value;
                      // var pp_version_standard = document.getElementById("pp_version_standard").value;
                      // //var formdata = new FormData(document.getElementById("define-standard-form"));
                      // //alert(formdata);

                      // $.ajax(
                      // {
                      //     type: "POST",
                      //     url: "define_view_standards.php",
                      //     method: "POST",
                      //     data: 
                      //     {
                      //       pp_no_id: pp_no_id, 
                      //       pp_version: pp_version,
                      //       pp_version_standard: pp_version_standard
                      //     },
                      //     success:function(data)
                      //     {
                      //         $('#retrieve_general_data').html(data);
                      //     }
                      // });


                      var pp_no_id = document.getElementById("pp_no_id").value;
                      //var pp_version = document.getElementById("pp_version").value;
                      var pp_version_standard = document.getElementById("pp_version_standard").value;

                      $.ajax(
                      {
                          url: "view_standard_select.php",
                          method: "POST",
                          data: {pp_no_id: pp_no_id, pp_version: pp_version_id, pp_version_standard: pp_version_standard},
                          success:function(data)
                          {
                              //alert(data);
                              $('#retrieve_general_data').html(data);
                          }
                      });
                  }
              } 
          });
      }
  }





  function edit_for_singe_standard()
  {
      var pp_no = document.getElementById("pp_no").value;
      var color = document.getElementById("color").value;
      var version = document.getElementById("version").value;
      var gray_width = document.getElementById("gray_width").value;
      var pp_id_number = document.getElementById("pp_id_number").value;
      var pp_details_id = document.getElementById("pp_details_id").value;

      $.ajax(
      {
          type: "POST",
          url: "edit_standard_for_singe.php",
          method: "POST",
          data: 
          {
            pp_no: pp_no, 
            color: color,
            version: version,
            gray_width: gray_width,
            pp_id_number: pp_id_number,
            pp_details_id: pp_details_id
          },
          success:function(data)
          {
              $('#retrieve_edit_data').html(data);
          }
      });
  }

  function edit_for_bleaching_standard()
  {
      var pp_no = document.getElementById("pp_no").value;
      var color = document.getElementById("color").value;
      var version = document.getElementById("version").value;
      var gray_width = document.getElementById("gray_width").value;
      var pp_id_number = document.getElementById("pp_id_number").value;
      var pp_details_id = document.getElementById("pp_details_id").value;

      $.ajax(
      {
          type: "POST",
          url: "edit_standard_for_bleaching.php",
          method: "POST",
          data: 
          {
            pp_no: pp_no, 
            color: color,
            version: version,
            gray_width: gray_width,
            pp_id_number: pp_id_number,
            pp_details_id: pp_details_id
          },
          success:function(data)
          {
              $('#retrieve_edit_data').html(data);
          }
      });
  }


  function edit_for_scouring_bleaching_standard()
  {
      var pp_no = document.getElementById("pp_no").value;
      var color = document.getElementById("color").value;
      var version = document.getElementById("version").value;
      var gray_width = document.getElementById("gray_width").value;
      var pp_id_number = document.getElementById("pp_id_number").value;
      var pp_details_id = document.getElementById("pp_details_id").value;

      $.ajax(
      {
          type: "POST",
          url: "edit_standard_for_scouring_bleaching.php",
          method: "POST",
          data: 
          {
            pp_no: pp_no, 
            color: color,
            version: version,
            gray_width: gray_width,
            pp_id_number: pp_id_number,
            pp_details_id: pp_details_id
          },
          success:function(data)
          {
              $('#retrieve_edit_data').html(data);
          }
      });
  }


  function edit_for_scouring_standard()
  {
      var pp_no = document.getElementById("pp_no").value;
      var color = document.getElementById("color").value;
      var version = document.getElementById("version").value;
      var gray_width = document.getElementById("gray_width").value;
      var pp_id_number = document.getElementById("pp_id_number").value;
      var pp_details_id = document.getElementById("pp_details_id").value;

      $.ajax(
      {
          type: "POST",
          url: "edit_standard_for_scouring.php",
          method: "POST",
          data: 
          {
            pp_no: pp_no, 
            color: color,
            version: version,
            gray_width: gray_width,
            pp_id_number: pp_id_number,
            pp_details_id: pp_details_id
          },
          success:function(data)
          {
              $('#retrieve_edit_data').html(data);
          }
      });
  }


  function edit_for_ready_mercerize_standard()
  {
      var pp_no = document.getElementById("pp_no").value;
      var color = document.getElementById("color").value;
      var version = document.getElementById("version").value;
      var gray_width = document.getElementById("gray_width").value;
      var pp_id_number = document.getElementById("pp_id_number").value;
      var pp_details_id = document.getElementById("pp_details_id").value;

      $.ajax(
      {
          type: "POST",
          url: "edit_standard_for_ready_mercerize.php",
          method: "POST",
          data: 
          {
            pp_no: pp_no, 
            color: color,
            version: version,
            gray_width: gray_width,
            pp_id_number: pp_id_number,
            pp_details_id: pp_details_id
          },
          success:function(data)
          {
              $('#retrieve_edit_data').html(data);
          }
      });
  }


  function edit_for_equalize_standard()
  {
      var pp_no = document.getElementById("pp_no").value;
      var color = document.getElementById("color").value;
      var version = document.getElementById("version").value;
      var gray_width = document.getElementById("gray_width").value;
      var pp_id_number = document.getElementById("pp_id_number").value;
      var pp_details_id = document.getElementById("pp_version").value;

      $.ajax(
      {
          type: "POST",
          url: "edit_standard_for_equalize.php",
          method: "POST",
          data: 
          {
            pp_no: pp_no, 
            color: color,
            version: version,
            gray_width: gray_width,
            pp_id_number: pp_id_number,
            pp_details_id: pp_details_id
          },
          success:function(data)
          {
              $('#retrieve_edit_data').html(data);
          }
      });
  }



  function edit_for_printing_standard()
  {
      var pp_no = document.getElementById("pp_no").value;
      var color = document.getElementById("color").value;
      var version = document.getElementById("version").value;
      var gray_width = document.getElementById("gray_width").value;
      var pp_id_number = document.getElementById("pp_id_number").value;
      var pp_details_id = document.getElementById("pp_version").value;

      $.ajax(
      {
          type: "POST",
          url: "edit_standard_for_printing.php",
          method: "POST",
          data: 
          {
            pp_no: pp_no, 
            color: color,
            version: version,
            gray_width: gray_width,
            pp_id_number: pp_id_number,
            pp_details_id: pp_details_id
          },
          success:function(data)
          {
              $('#retrieve_edit_data').html(data);
          }
      });
  }


  function edit_for_curing_standard()
  {
      var pp_no = document.getElementById("pp_no").value;
      var color = document.getElementById("color").value;
      var version = document.getElementById("version").value;
      var gray_width = document.getElementById("gray_width").value;
      var pp_id_number = document.getElementById("pp_id_number").value;
      var pp_details_id = document.getElementById("pp_version").value;

      $.ajax(
      {
          type: "POST",
          url: "edit_standard_for_curing.php",
          method: "POST",
          data: 
          {
            pp_no: pp_no, 
            color: color,
            version: version,
            gray_width: gray_width,
            pp_id_number: pp_id_number,
            pp_details_id: pp_details_id
          },
          success:function(data)
          {
              $('#retrieve_edit_data').html(data);
          }
      });
  }



  function edit_for_mercerize_standard()
  {
      var pp_no = document.getElementById("pp_no").value;
      var color = document.getElementById("color").value;
      var version = document.getElementById("version").value;
      var gray_width = document.getElementById("gray_width").value;
      var pp_id_number = document.getElementById("pp_id_number").value;
      var pp_details_id = document.getElementById("pp_details_id").value;

      $.ajax(
      {
          type: "POST",
          url: "edit_standard_for_mercerize.php",
          method: "POST",
          data: 
          {
            pp_no: pp_no, 
            color: color,
            version: version,
            gray_width: gray_width,
            pp_id_number: pp_id_number,
            pp_details_id: pp_details_id
          },
          success:function(data)
          {
              $('#retrieve_edit_data').html(data);
          }
      });
  }

  function update_edit_singe_standard_data(pp_version_id)
  {
      var formValidation = Form_Validation_For_Singe();

      if(formValidation != false)
      {
        var formdata = new FormData(document.getElementById('singe_standard_form'));
        $.ajax(
        {
            type: "POST",
            url: "edit_singe_standard_for_saving.php",// where you wanna post
            data: formdata,
            processData: false,
            contentType: false,
            error: function(jqXHR, textStatus, errorMessage) 
            {
                alert(errorMessage);
            },
            success: function(data) 
            {
              //info_alert(data);
              // var pp_id_number = document.getElementById("pp_no_id").value;
              // success_alert("All Data Update Successfully", "../variable/gray_variable.php?pp_no_id="+pp_id_number);

              //var pp_id_number = document.getElementById("pp_no_id").value;
              //var pp_details_id = document.getElementById("pp_details_id").value;
              //success_alert("All Data Save Successfully", "../standard/gray_variable.php?pp_no_id="+pp_id_number+"&pp_version="+pp_details_id+"&pp_version_standard=1");
              if (data == "Yes")
              {
                  info_alert("Data not Submitted");
              }
              else
              {
                  // //success_alert("Data Update Successfully", "../standard/gray_variable.php");
                  // var pp_no_id = document.getElementById("pp_no_id").value;
                  // var pp_version = document.getElementById("pp_version").value;
                  // var pp_version_standard = document.getElementById("pp_version_standard").value;
                  // //var formdata = new FormData(document.getElementById("define-standard-form"));
                  // //alert(formdata);

                  // $.ajax(
                  // {
                  //     type: "POST",
                  //     url: "define_view_standards.php",
                  //     method: "POST",
                  //     data: 
                  //     {
                  //       pp_no_id: pp_no_id, 
                  //       pp_version: pp_version,
                  //       pp_version_standard: pp_version_standard
                  //     },
                  //     success:function(data)
                  //     {
                  //         $('#retrieve_general_data').html(data);
                  //     }
                  // });

                  var pp_no_id = document.getElementById("pp_no_id").value;
                  //var pp_version = document.getElementById("pp_version").value;
                  var pp_version_standard = document.getElementById("pp_version_standard").value;

                  $.ajax(
                  {
                      url: "view_standard_select.php",
                      method: "POST",
                      data: {pp_no_id: pp_no_id, pp_version: pp_version_id, pp_version_standard: pp_version_standard},
                      success:function(data)
                      {
                          //alert(data);
                          $('#others_retrieve_general_data').html(data);
                      }
                  });
              }
            } 
        });
      }
  }

  function update_edit_bleaching_standard_data(pp_version_id)
  {
      var formValidation = Form_Validation_For_Bleaching();

      if(formValidation != false)
      {
        var formdata = new FormData(document.getElementById('bleaching_standard_form'));
        $.ajax(
        {
            type: "POST",
            url: "edit_bleaching_standard_for_saving.php",// where you wanna post
            data: formdata,
            processData: false,
            contentType: false,
            error: function(jqXHR, textStatus, errorMessage) 
            {
                alert(errorMessage);
            },
            success: function(data) 
            {
              //info_alert(data);
              // var pp_id_number = document.getElementById("pp_no_id").value;
              // success_alert("All Data Update Successfully", "../variable/gray_variable.php?pp_no_id="+pp_id_number);

              //var pp_id_number = document.getElementById("pp_no_id").value;
              //var pp_details_id = document.getElementById("pp_details_id").value;
              //success_alert("All Data Save Successfully", "../standard/gray_variable.php?pp_no_id="+pp_id_number+"&pp_version="+pp_details_id+"&pp_version_standard=1");
              if (data == "Yes")
              {
                  info_alert("Data not Submitted");
              }
              else
              {
                  // //success_alert("Data Update Successfully", "../standard/gray_variable.php");
                  // var pp_no_id = document.getElementById("pp_no_id").value;
                  // var pp_version = document.getElementById("pp_version").value;
                  // var pp_version_standard = document.getElementById("pp_version_standard").value;
                  // //var formdata = new FormData(document.getElementById("define-standard-form"));
                  // //alert(formdata);

                  // $.ajax(
                  // {
                  //     type: "POST",
                  //     url: "define_view_standards.php",
                  //     method: "POST",
                  //     data: 
                  //     {
                  //       pp_no_id: pp_no_id, 
                  //       pp_version: pp_version,
                  //       pp_version_standard: pp_version_standard
                  //     },
                  //     success:function(data)
                  //     {
                  //         $('#retrieve_general_data').html(data);
                  //     }
                  // });

                  var pp_no_id = document.getElementById("pp_no_id").value;
                  //var pp_version = document.getElementById("pp_version").value;
                  var pp_version_standard = document.getElementById("pp_version_standard").value;

                  $.ajax(
                  {
                      url: "view_standard_select.php",
                      method: "POST",
                      data: {pp_no_id: pp_no_id, pp_version: pp_version_id, pp_version_standard: pp_version_standard},
                      success:function(data)
                      {
                          //alert(data);
                          $('#others_retrieve_general_data').html(data);
                      }
                  });
              }
            } 
        });
      }
  }


  function update_edit_scouring_bleaching_standard_data(pp_version_id)
  {
      var formValidation = Form_Validation_For_Scouring_Bleaching();

      if(formValidation != false)
      {
        var formdata = new FormData(document.getElementById('scouring_bleaching_standard_form'));
        $.ajax(
        {
            type: "POST",
            url: "edit_scouring_bleaching_standard_for_saving.php",// where you wanna post
            data: formdata,
            processData: false,
            contentType: false,
            error: function(jqXHR, textStatus, errorMessage) 
            {
                alert(errorMessage);
            },
            success: function(data) 
            {
              
              if (data == "Yes")
              {
                  info_alert("Data not Submitted");
              }
              else
              {

                  var pp_no_id = document.getElementById("pp_no_id").value;
                  var pp_version_standard = document.getElementById("pp_version_standard").value;

                  $.ajax(
                  {
                      url: "view_standard_select.php",
                      method: "POST",
                      data: {pp_no_id: pp_no_id, pp_version: pp_version_id, pp_version_standard: pp_version_standard},
                      success:function(data)
                      {
                          //alert(data);
                          $('#others_retrieve_general_data').html(data);
                      }
                  });
              }
            } 
        });
      }
  }


  function update_edit_scouring_standard_data(pp_version_id)
  {
      var formValidation = Form_Validation_For_Scouring();

      if(formValidation != false)
      {
        var formdata = new FormData(document.getElementById('scouring_standard_form'));
        $.ajax(
        {
            type: "POST",
            url: "edit_scouring_standard_for_saving.php",// where you wanna post
            data: formdata,
            processData: false,
            contentType: false,
            error: function(jqXHR, textStatus, errorMessage) 
            {
                alert(errorMessage);
            },
            success: function(data) 
            {
              
              if (data == "Yes")
              {
                  info_alert("Data not Submitted");
              }
              else
              {

                  var pp_no_id = document.getElementById("pp_no_id").value;
                  var pp_version_standard = document.getElementById("pp_version_standard").value;

                  $.ajax(
                  {
                      url: "view_standard_select.php",
                      method: "POST",
                      data: {pp_no_id: pp_no_id, pp_version: pp_version_id, pp_version_standard: pp_version_standard},
                      success:function(data)
                      {
                          $('#others_retrieve_general_data').html(data);
                      }
                  });
              }
            } 
        });
      }
  }


  function update_edit_ready_mercerize_standard_data(pp_version_id)
  {
      var formValidation = Form_Validation_For_Ready_Mercetize();

      if(formValidation != false)
      {
        var formdata = new FormData(document.getElementById('ready_mercerize_standard_form'));
        $.ajax(
        {
            type: "POST",
            url: "edit_ready_mercerize_standard_for_saving.php",// where you wanna post
            data: formdata,
            processData: false,
            contentType: false,
            error: function(jqXHR, textStatus, errorMessage) 
            {
                alert(errorMessage);
            },
            success: function(data) 
            {
              //info_alert(data);
              // var pp_id_number = document.getElementById("pp_no_id").value;
              // success_alert("All Data Update Successfully", "../variable/gray_variable.php?pp_no_id="+pp_id_number);

              //var pp_id_number = document.getElementById("pp_no_id").value;
              //var pp_details_id = document.getElementById("pp_details_id").value;
              //success_alert("All Data Save Successfully", "../standard/gray_variable.php?pp_no_id="+pp_id_number+"&pp_version="+pp_details_id+"&pp_version_standard=1");
              if (data == "Yes")
              {
                  info_alert("Data not Submitted");
              }
              else
              {
                  // //success_alert("Data Update Successfully", "../standard/gray_variable.php");
                  // var pp_no_id = document.getElementById("pp_no_id").value;
                  // var pp_version = document.getElementById("pp_version").value;
                  // var pp_version_standard = document.getElementById("pp_version_standard").value;
                  // //var formdata = new FormData(document.getElementById("define-standard-form"));
                  // //alert(formdata);

                  // $.ajax(
                  // {
                  //     type: "POST",
                  //     url: "define_view_standards.php",
                  //     method: "POST",
                  //     data: 
                  //     {
                  //       pp_no_id: pp_no_id, 
                  //       pp_version: pp_version,
                  //       pp_version_standard: pp_version_standard
                  //     },
                  //     success:function(data)
                  //     {
                  //         $('#retrieve_general_data').html(data);
                  //     }
                  // });

                  var pp_no_id = document.getElementById("pp_no_id").value;
                  //var pp_version = document.getElementById("pp_version").value;
                  var pp_version_standard = document.getElementById("pp_version_standard").value;

                  $.ajax(
                  {
                      url: "view_standard_select.php",
                      method: "POST",
                      data: {pp_no_id: pp_no_id, pp_version: pp_version_id, pp_version_standard: pp_version_standard},
                      success:function(data)
                      {
                          //alert(data);
                          $('#others_retrieve_general_data').html(data);
                      }
                  });
              }
            } 
        });
      }
  }


  function update_edit_equalize_standard_data(pp_version_id)
  {
      var formValidation = Form_Validation_For_Equalize();

      if(formValidation != false)
      {
        var formdata = new FormData(document.getElementById('equalize_standard_form'));
        $.ajax(
        {
            type: "POST",
            url: "edit_equalize_standard_for_saving.php",// where you wanna post
            data: formdata,
            processData: false,
            contentType: false,
            error: function(jqXHR, textStatus, errorMessage) 
            {
                alert(errorMessage);
            },
            success: function(data) 
            {
              //info_alert(data);
              // var pp_id_number = document.getElementById("pp_no_id").value;
              // success_alert("All Data Update Successfully", "../variable/gray_variable.php?pp_no_id="+pp_id_number);

              //var pp_id_number = document.getElementById("pp_no_id").value;
              //var pp_details_id = document.getElementById("pp_details_id").value;
              //success_alert("All Data Save Successfully", "../standard/gray_variable.php?pp_no_id="+pp_id_number+"&pp_version="+pp_details_id+"&pp_version_standard=1");
              if (data == "Yes")
              {
                  info_alert("Data not Submitted");
              }
              else
              {
                  // //success_alert("Data Update Successfully", "../standard/gray_variable.php");
                  // var pp_no_id = document.getElementById("pp_no_id").value;
                  // var pp_version = document.getElementById("pp_version").value;
                  // var pp_version_standard = document.getElementById("pp_version_standard").value;
                  // //var formdata = new FormData(document.getElementById("define-standard-form"));
                  // //alert(formdata);

                  // $.ajax(
                  // {
                  //     type: "POST",
                  //     url: "define_view_standards.php",
                  //     method: "POST",
                  //     data: 
                  //     {
                  //       pp_no_id: pp_no_id, 
                  //       pp_version: pp_version,
                  //       pp_version_standard: pp_version_standard
                  //     },
                  //     success:function(data)
                  //     {
                  //         $('#retrieve_general_data').html(data);
                  //     }
                  // });

                  var pp_no_id = document.getElementById("pp_no_id").value;
                  //var pp_version = document.getElementById("pp_version").value;
                  var pp_version_standard = document.getElementById("pp_version_standard").value;

                  $.ajax(
                  {
                      url: "view_standard_select.php",
                      method: "POST",
                      data: {pp_no_id: pp_no_id, pp_version: pp_version_id, pp_version_standard: pp_version_standard},
                      success:function(data)
                      {
                          //alert(data);
                          $('#others_retrieve_general_data').html(data);
                      }
                  });
              }
            } 
        });
      }
  }


  function update_edit_printing_standard_data(pp_version_id)
  {
      var formValidation = Form_Validation_For_Printing();

      if(formValidation != false)
      {
        var formdata = new FormData(document.getElementById('printing_standard_form'));
        $.ajax(
        {
            type: "POST",
            url: "edit_printing_standard_for_saving.php",// where you wanna post
            data: formdata,
            processData: false,
            contentType: false,
            error: function(jqXHR, textStatus, errorMessage) 
            {
                alert(errorMessage);
            },
            success: function(data) 
            {
              //info_alert(data);
              // var pp_id_number = document.getElementById("pp_no_id").value;
              // success_alert("All Data Update Successfully", "../variable/gray_variable.php?pp_no_id="+pp_id_number);

              //var pp_id_number = document.getElementById("pp_no_id").value;
              //var pp_details_id = document.getElementById("pp_details_id").value;
              //success_alert("All Data Save Successfully", "../standard/gray_variable.php?pp_no_id="+pp_id_number+"&pp_version="+pp_details_id+"&pp_version_standard=1");
              if (data == "Yes")
              {
                  info_alert("Data not Submitted");
              }
              else
              {
                  // //success_alert("Data Update Successfully", "../standard/gray_variable.php");
                  // var pp_no_id = document.getElementById("pp_no_id").value;
                  // var pp_version = document.getElementById("pp_version").value;
                  // var pp_version_standard = document.getElementById("pp_version_standard").value;
                  // //var formdata = new FormData(document.getElementById("define-standard-form"));
                  // //alert(formdata);

                  // $.ajax(
                  // {
                  //     type: "POST",
                  //     url: "define_view_standards.php",
                  //     method: "POST",
                  //     data: 
                  //     {
                  //       pp_no_id: pp_no_id, 
                  //       pp_version: pp_version,
                  //       pp_version_standard: pp_version_standard
                  //     },
                  //     success:function(data)
                  //     {
                  //         $('#retrieve_general_data').html(data);
                  //     }
                  // });

                  var pp_no_id = document.getElementById("pp_no_id").value;
                  //var pp_version = document.getElementById("pp_version").value;
                  var pp_version_standard = document.getElementById("pp_version_standard").value;

                  $.ajax(
                  {
                      url: "view_standard_select.php",
                      method: "POST",
                      data: {pp_no_id: pp_no_id, pp_version: pp_version_id, pp_version_standard: pp_version_standard},
                      success:function(data)
                      {
                          //alert(data);
                          $('#others_retrieve_general_data').html(data);
                      }
                  });
              }
            } 
        });
      }
  }


  function update_edit_curing_standard_data(pp_version_id)
  {
      var formValidation = Form_Validation_For_Curing();

      if(formValidation != false)
      {
        var formdata = new FormData(document.getElementById('curing_standard_form'));
        $.ajax(
        {
            type: "POST",
            url: "edit_curing_standard_for_saving.php",// where you wanna post
            data: formdata,
            processData: false,
            contentType: false,
            error: function(jqXHR, textStatus, errorMessage) 
            {
                alert(errorMessage);
            },
            success: function(data) 
            {
              //info_alert(data);
              // var pp_id_number = document.getElementById("pp_no_id").value;
              // success_alert("All Data Update Successfully", "../variable/gray_variable.php?pp_no_id="+pp_id_number);

              //var pp_id_number = document.getElementById("pp_no_id").value;
              //var pp_details_id = document.getElementById("pp_details_id").value;
              //success_alert("All Data Save Successfully", "../standard/gray_variable.php?pp_no_id="+pp_id_number+"&pp_version="+pp_details_id+"&pp_version_standard=1");
              if (data == "Yes")
              {
                  info_alert("Data not Submitted");
              }
              else
              {
                  // //success_alert("Data Update Successfully", "../standard/gray_variable.php");
                  // var pp_no_id = document.getElementById("pp_no_id").value;
                  // var pp_version = document.getElementById("pp_version").value;
                  // var pp_version_standard = document.getElementById("pp_version_standard").value;
                  // //var formdata = new FormData(document.getElementById("define-standard-form"));
                  // //alert(formdata);

                  // $.ajax(
                  // {
                  //     type: "POST",
                  //     url: "define_view_standards.php",
                  //     method: "POST",
                  //     data: 
                  //     {
                  //       pp_no_id: pp_no_id, 
                  //       pp_version: pp_version,
                  //       pp_version_standard: pp_version_standard
                  //     },
                  //     success:function(data)
                  //     {
                  //         $('#retrieve_general_data').html(data);
                  //     }
                  // });

                  var pp_no_id = document.getElementById("pp_no_id").value;
                  //var pp_version = document.getElementById("pp_version").value;
                  var pp_version_standard = document.getElementById("pp_version_standard").value;

                  $.ajax(
                  {
                      url: "view_standard_select.php",
                      method: "POST",
                      data: {pp_no_id: pp_no_id, pp_version: pp_version_id, pp_version_standard: pp_version_standard},
                      success:function(data)
                      {
                          //alert(data);
                          $('#others_retrieve_general_data').html(data);
                      }
                  });
              }
            } 
        });
      }
  }


  function update_edit_mercerize_standard_data(pp_version_id)
  {
      var formValidation = Form_Validation_For_Mercetize();

      if(formValidation != false)
      {
        var formdata = new FormData(document.getElementById('mercerize_standard_form'));
        $.ajax(
        {
            type: "POST",
            url: "edit_mercerize_standard_for_saving.php",// where you wanna post
            data: formdata,
            processData: false,
            contentType: false,
            error: function(jqXHR, textStatus, errorMessage) 
            {
                alert(errorMessage);
            },
            success: function(data) 
            {
              //info_alert(data);
              // var pp_id_number = document.getElementById("pp_no_id").value;
              // success_alert("All Data Update Successfully", "../variable/gray_variable.php?pp_no_id="+pp_id_number);

              //var pp_id_number = document.getElementById("pp_no_id").value;
              //var pp_details_id = document.getElementById("pp_details_id").value;
              //success_alert("All Data Save Successfully", "../standard/gray_variable.php?pp_no_id="+pp_id_number+"&pp_version="+pp_details_id+"&pp_version_standard=1");
              if (data == "Yes")
              {
                  info_alert("Data not Submitted");
              }
              else
              {
                  // //success_alert("Data Update Successfully", "../standard/gray_variable.php");
                  // var pp_no_id = document.getElementById("pp_no_id").value;
                  // var pp_version = document.getElementById("pp_version").value;
                  // var pp_version_standard = document.getElementById("pp_version_standard").value;
                  // //var formdata = new FormData(document.getElementById("define-standard-form"));
                  // //alert(formdata);

                  // $.ajax(
                  // {
                  //     type: "POST",
                  //     url: "define_view_standards.php",
                  //     method: "POST",
                  //     data: 
                  //     {
                  //       pp_no_id: pp_no_id, 
                  //       pp_version: pp_version,
                  //       pp_version_standard: pp_version_standard
                  //     },
                  //     success:function(data)
                  //     {
                  //         $('#retrieve_general_data').html(data);
                  //     }
                  // });

                  var pp_no_id = document.getElementById("pp_no_id").value;
                  //var pp_version = document.getElementById("pp_version").value;
                  var pp_version_standard = document.getElementById("pp_version_standard").value;

                  $.ajax(
                  {
                      url: "view_standard_select.php",
                      method: "POST",
                      data: {pp_no_id: pp_no_id, pp_version: pp_version_id, pp_version_standard: pp_version_standard},
                      success:function(data)
                      {
                          //alert(data);
                          $('#others_retrieve_general_data').html(data);
                      }
                  });
              }
            } 
        });
      }
  }

  
  function cancel_edit_singe_standard_data()
  {
      // //success_alert("Data Update Successfully", "../standard/gray_variable.php");
      // var pp_no_id = document.getElementById("pp_no_id").value;
      // var pp_version = document.getElementById("pp_version").value;
      // var pp_version_standard = document.getElementById("pp_version_standard").value;
      // //var formdata = new FormData(document.getElementById("define-standard-form"));
      // //alert(formdata);

      // $.ajax(
      // {
      //     type: "POST",
      //     url: "define_view_standards.php",
      //     method: "POST",
      //     data: 
      //     {
      //       pp_no_id: pp_no_id, 
      //       pp_version: pp_version,
      //       pp_version_standard: pp_version_standard
      //     },
      //     success:function(data)
      //     {
      //         $('#retrieve_general_data').html(data);
      //     }
      // });
      $('#others_retrieve_general_data').html(" ");
  }

  function cancel_edit_printing_standard_data()
  {
      // //success_alert("Data Update Successfully", "../standard/gray_variable.php");
      // var pp_no_id = document.getElementById("pp_no_id").value;
      // var pp_version = document.getElementById("pp_version").value;
      // var pp_version_standard = document.getElementById("pp_version_standard").value;
      // //var formdata = new FormData(document.getElementById("define-standard-form"));
      // //alert(formdata);

      // $.ajax(
      // {
      //     type: "POST",
      //     url: "define_view_standards.php",
      //     method: "POST",
      //     data: 
      //     {
      //       pp_no_id: pp_no_id, 
      //       pp_version: pp_version,
      //       pp_version_standard: pp_version_standard
      //     },
      //     success:function(data)
      //     {
      //         $('#retrieve_general_data').html(data);
      //     }
      // });
      $('#others_retrieve_general_data').html(" ");
  }

  function cancel_edit_bleaching_standard_data()
  {
      // //success_alert("Data Update Successfully", "../standard/gray_variable.php");
      // var pp_no_id = document.getElementById("pp_no_id").value;
      // var pp_version = document.getElementById("pp_version").value;
      // var pp_version_standard = document.getElementById("pp_version_standard").value;
      // //var formdata = new FormData(document.getElementById("define-standard-form"));
      // //alert(formdata);

      // $.ajax(
      // {
      //     type: "POST",
      //     url: "define_view_standards.php",
      //     method: "POST",
      //     data: 
      //     {
      //       pp_no_id: pp_no_id, 
      //       pp_version: pp_version,
      //       pp_version_standard: pp_version_standard
      //     },
      //     success:function(data)
      //     {
      //         $('#retrieve_general_data').html(data);
      //     }
      // });
      $('#others_retrieve_general_data').html(" ");
  }

  function cancel_edit_scouring_bleaching_standard_data()
  {
      $('#others_retrieve_general_data').html(" ");
  }

  function cancel_edit_scouring_standard_data()
  {
      $('#others_retrieve_general_data').html(" ");
  }


  function cancel_edit_ready_mercerize_standard_data()
  {
      // //success_alert("Data Update Successfully", "../standard/gray_variable.php");
      // var pp_no_id = document.getElementById("pp_no_id").value;
      // var pp_version = document.getElementById("pp_version").value;
      // var pp_version_standard = document.getElementById("pp_version_standard").value;
      // //var formdata = new FormData(document.getElementById("define-standard-form"));
      // //alert(formdata);

      // $.ajax(
      // {
      //     type: "POST",
      //     url: "define_view_standards.php",
      //     method: "POST",
      //     data: 
      //     {
      //       pp_no_id: pp_no_id, 
      //       pp_version: pp_version,
      //       pp_version_standard: pp_version_standard
      //     },
      //     success:function(data)
      //     {
      //         $('#retrieve_general_data').html(data);
      //     }
      // });
      $('#others_retrieve_general_data').html(" ");
  }

  function cancel_edit_equalize_standard_data()
  {
      // //success_alert("Data Update Successfully", "../standard/gray_variable.php");
      // var pp_no_id = document.getElementById("pp_no_id").value;
      // var pp_version = document.getElementById("pp_version").value;
      // var pp_version_standard = document.getElementById("pp_version_standard").value;
      // //var formdata = new FormData(document.getElementById("define-standard-form"));
      // //alert(formdata);

      // $.ajax(
      // {
      //     type: "POST",
      //     url: "define_view_standards.php",
      //     method: "POST",
      //     data: 
      //     {
      //       pp_no_id: pp_no_id, 
      //       pp_version: pp_version,
      //       pp_version_standard: pp_version_standard
      //     },
      //     success:function(data)
      //     {
      //         $('#retrieve_general_data').html(data);
      //     }
      // });
      $('#others_retrieve_general_data').html(" ");
  }

  function cancel_edit_standard_data()
  {
      // //success_alert("Data Update Successfully", "../standard/gray_variable.php");
      // var pp_no_id = document.getElementById("pp_no_id").value;
      // var pp_version = document.getElementById("pp_version").value;
      // var pp_version_standard = document.getElementById("pp_version_standard").value;
      // //var formdata = new FormData(document.getElementById("define-standard-form"));
      // //alert(formdata);

      // $.ajax(
      // {
      //     type: "POST",
      //     url: "define_view_standards.php",
      //     method: "POST",
      //     data: 
      //     {
      //       pp_no_id: pp_no_id, 
      //       pp_version: pp_version,
      //       pp_version_standard: pp_version_standard
      //     },
      //     success:function(data)
      //     {
      //         $('#retrieve_general_data').html(data);
      //     }
      // });
      $('#others_retrieve_general_data').html(" ");
  }




  function cf_rubbing_dry_condition()
  {
      var cf_rubbing_dry_value = document.getElementById("cf_rubbing_dry_value").value;
      var cf_rubbing_dry_cond = document.getElementById("cf_rubbing_dry_cond").value;

      if (cf_rubbing_dry_value == 'NA') 
      { 
          document.getElementById("cf_rubbing_dry_value1").value = 'N/A';
          document.getElementById("cf_rubbing_dry_value2").value = 'N/A';
      }

      else
      {
          if (cf_rubbing_dry_cond == 1) 
          {
              document.getElementById("cf_rubbing_dry_cond1").value = 2;
              document.getElementById("cf_rubbing_dry_cond2").value = 2;

              document.getElementById("cf_rubbing_dry_value1").value = cf_rubbing_dry_value;
              document.getElementById("cf_rubbing_dry_value2").value = 5;
          }

          else
          {
              document.getElementById("cf_rubbing_dry_cond1").value = 2;
              document.getElementById("cf_rubbing_dry_cond2").value = 2;

              document.getElementById("cf_rubbing_dry_value1").value = 1;
              document.getElementById("cf_rubbing_dry_value2").value = cf_rubbing_dry_value;
          }
      }

  }

  function cf_rubbing_wet_condition()
  {
      var cf_rubbing_wet_value = document.getElementById("cf_rubbing_wet_value").value;
      var cf_rubbing_wet_cond = document.getElementById("cf_rubbing_wet_cond").value;


      if (cf_rubbing_wet_value == 'NA') 
      { 
          document.getElementById("cf_rubbing_wet_value1").value = 'N/A';
          document.getElementById("cf_rubbing_wet_value2").value = 'N/A';
      }

      else
      {
          if (cf_rubbing_wet_cond == 1) 
          {
              document.getElementById("cf_rubbing_wet_cond1").value = 2;
              document.getElementById("cf_rubbing_wet_cond2").value = 2;

              document.getElementById("cf_rubbing_wet_value1").value = cf_rubbing_wet_value;
              document.getElementById("cf_rubbing_wet_value2").value = 5;
          }

          else
          {
              document.getElementById("cf_rubbing_wet_cond1").value = 2;
              document.getElementById("cf_rubbing_wet_cond2").value = 2;

              document.getElementById("cf_rubbing_wet_value1").value = 1;
              document.getElementById("cf_rubbing_wet_value2").value = cf_rubbing_wet_value;
          }
      }

  }


  function rubbing_dry_condition()
  {
      var rubbing_dry_value = document.getElementById("rubbing_dry_value").value;
      var rubbing_dry_cond = document.getElementById("rubbing_dry_cond").value;
       if (rubbing_dry_value == 'NA') 
      { 
          document.getElementById("rubbing_dry_value1").value = 'N/A';
          document.getElementById("rubbing_dry_value2").value = 'N/A';
      }

      else
      {
       if (rubbing_dry_cond == 1) 
      {
          document.getElementById("rubbing_dry_cond1").value = 2;
          document.getElementById("rubbing_dry_cond2").value = 2;

          document.getElementById("rubbing_dry_value1").value = rubbing_dry_value;
          document.getElementById("rubbing_dry_value2").value = 5;
      }

      else
      {
          document.getElementById("rubbing_dry_cond1").value = 2;
          document.getElementById("rubbing_dry_cond2").value = 2;

          document.getElementById("rubbing_dry_value1").value = 1;
          document.getElementById("rubbing_dry_value2").value = rubbing_dry_value;
      }
      }
  }

  function rubbing_wet_condition()
  {
      var rubbing_wet_value = document.getElementById("rubbing_wet_value").value;
      var rubbing_wet_cond = document.getElementById("rubbing_wet_cond").value;

      if (rubbing_wet_value == 'NA') 
      { 
          document.getElementById("rubbing_wet_value1").value = 'N/A';
          document.getElementById("rubbing_wet_value2").value = 'N/A';
      }
      else
      {
         if (rubbing_wet_cond == 1) 
      {
          document.getElementById("rubbing_wet_cond1").value = 2;
          document.getElementById("rubbing_wet_cond2").value = 2;

          document.getElementById("rubbing_wet_value1").value = rubbing_wet_value;
          document.getElementById("rubbing_wet_value2").value = 5;
      }

      else
      {
          document.getElementById("rubbing_wet_cond1").value = 2;
          document.getElementById("rubbing_wet_cond2").value = 2;

          document.getElementById("rubbing_wet_value1").value = 1;
          document.getElementById("rubbing_wet_value2").value = rubbing_wet_value;
      }
      }

  }



  function wash_dry_warp_before_iron_condition()
  {
      var condition = document.getElementById("wash_dry_warp_before_iron_cond1").value;



      if (condition == 1)
      {
          document.getElementById("wash_dry_warp_before_iron_cond1").value = 1;
          document.getElementById("wash_dry_warp_before_iron_cond2").value = 1;
      }

      else
      {
          document.getElementById("wash_dry_warp_before_iron_cond1").value = 2;
          document.getElementById("wash_dry_warp_before_iron_cond2").value = 2;
      }
  }

  function wash_dry_weft_before_iron_condition()
  {
      var condition = document.getElementById("wash_dry_weft_before_iron_cond1").value;

      if (condition == 1)
      {
          document.getElementById("wash_dry_weft_before_iron_cond1").value = 1;
          document.getElementById("wash_dry_weft_before_iron_cond2").value = 1;
      }

      else
      {
          document.getElementById("wash_dry_weft_before_iron_cond1").value = 2;
          document.getElementById("wash_dry_weft_before_iron_cond2").value = 2;
      }
  }


  function wash_dry_warp_after_iron_condition()
  {
      var condition = document.getElementById("wash_dry_warp_after_iron_cond1").value;

      if (condition == 1)
      {
          document.getElementById("wash_dry_warp_after_iron_cond1").value = 1;
          document.getElementById("wash_dry_warp_after_iron_cond2").value = 1;
      }

      else
      {
          document.getElementById("wash_dry_warp_after_iron_cond1").value = 2;
          document.getElementById("wash_dry_warp_after_iron_cond2").value = 2;
      }
  }


  function wash_dry_weft_after_iron_condition()
  {
      var condition = document.getElementById("wash_dry_weft_after_iron_cond1").value;

      if (condition == 1)
      {
          document.getElementById("wash_dry_weft_after_iron_cond1").value = 1;
          document.getElementById("wash_dry_weft_after_iron_cond2").value = 1;
      }

      else
      {
          document.getElementById("wash_dry_weft_after_iron_cond1").value = 2;
          document.getElementById("wash_dry_weft_after_iron_cond2").value = 2;
      }
  }


  function dry_cleaning_warp_condition()
  {
      var condition = document.getElementById("dry_cleaning_warp_cond1").value;

      if (condition == 1)
      {
          document.getElementById("dry_cleaning_warp_cond1").value = 1;
          document.getElementById("dry_cleaning_warp_cond2").value = 1;
      }

      else
      {
          document.getElementById("dry_cleaning_warp_cond1").value = 2;
          document.getElementById("dry_cleaning_warp_cond2").value = 2;
      }
  }


  function dry_cleaning_weft_condition()
  {
      var condition = document.getElementById("dry_cleaning_weft_cond1").value;

      if (condition == 1)
      {
          document.getElementById("dry_cleaning_weft_cond1").value = 1;
          document.getElementById("dry_cleaning_weft_cond2").value = 1;
      }

      else
      {
          document.getElementById("dry_cleaning_weft_cond1").value = 2;
          document.getElementById("dry_cleaning_weft_cond2").value = 2;
      }
  }


  function yarn_count_warp_tol_condition()
  {

      var yarn_count_warp_tol_value1 = parseFloat(document.getElementById("yarn_count_warp_tol_value1").value);
      var yarn_count_warp_tol_value2 = parseFloat(document.getElementById("yarn_count_warp_tol_value2").value);
      var yarn_count_warp_tol_cond = document.getElementById("yarn_count_warp_tol_cond").value;

      if (yarn_count_warp_tol_cond == 1) 
      {
          document.getElementById("yarn_count_warp_cond1").value = 2;
          document.getElementById("yarn_count_warp_cond2").value = 2;

          var tolarance = ((yarn_count_warp_tol_value2 * yarn_count_warp_tol_value1) / 100);
          var yarn_count_warp_tol_cal_value2 = yarn_count_warp_tol_value1 + tolarance;
          var yarn_count_warp_tol_cal_value1 = yarn_count_warp_tol_value1 - tolarance;

          document.getElementById("yarn_count_warp_value1").value = yarn_count_warp_tol_cal_value1.toFixed(5);
          document.getElementById("yarn_count_warp_value2").value = yarn_count_warp_tol_cal_value2.toFixed(5);
      }

      if (yarn_count_warp_tol_cond == 2)
      {
          document.getElementById("yarn_count_warp_cond1").value = 2;
          document.getElementById("yarn_count_warp_cond2").value = 2;

          var tolarance = ((yarn_count_warp_tol_value2 * yarn_count_warp_tol_value1) / 100);
          var yarn_count_warp_tol_cal_value2 = yarn_count_warp_tol_value1 + tolarance;

          document.getElementById("yarn_count_warp_value1").value = yarn_count_warp_tol_value1;
          document.getElementById("yarn_count_warp_value2").value = yarn_count_warp_tol_cal_value2.toFixed(5);
      }

      if (yarn_count_warp_tol_cond == 3)
      {
          document.getElementById("yarn_count_warp_cond1").value = 2;
          document.getElementById("yarn_count_warp_cond2").value = 2;

          var tolarance = ((yarn_count_warp_tol_value2 * yarn_count_warp_tol_value1) / 100);
          var yarn_count_warp_tol_cal_value2 = yarn_count_warp_tol_value1 - tolarance;

          document.getElementById("yarn_count_warp_value2").value = yarn_count_warp_tol_value1;
          document.getElementById("yarn_count_warp_value1").value = yarn_count_warp_tol_cal_value2.toFixed(5);
      }

      if(isNaN(document.getElementById("yarn_count_warp_tol_value1").value))
      {
          number_alert("yarn_count_warp_tol_value1");
          return false;
      }

      if(isNaN(document.getElementById("yarn_count_warp_tol_value2").value))
      {
          number_alert("yarn_count_warp_tol_value2");
          return false;
      }
  }


  function yarn_count_weft_tol_condition()
  {
      var yarn_count_weft_tol_value1 = parseFloat(document.getElementById("yarn_count_weft_tol_value1").value);
      var yarn_count_weft_tol_value2 = parseFloat(document.getElementById("yarn_count_weft_tol_value2").value);
      var yarn_count_weft_tol_cond = document.getElementById("yarn_count_weft_tol_cond").value;

      if (yarn_count_weft_tol_cond == 1) 
      {
          document.getElementById("yarn_count_weft_cond1").value = 2;
          document.getElementById("yarn_count_weft_cond2").value = 2;

          var tolarance = ((yarn_count_weft_tol_value2 * yarn_count_weft_tol_value1) / 100);
          var yarn_count_weft_tol_cal_value2 = yarn_count_weft_tol_value1 + tolarance;
          var yarn_count_weft_tol_cal_value1 = yarn_count_weft_tol_value1 - tolarance;

          document.getElementById("yarn_count_weft_value1").value = yarn_count_weft_tol_cal_value1.toFixed(5);
          document.getElementById("yarn_count_weft_value2").value = yarn_count_weft_tol_cal_value2.toFixed(5);
      }

      if (yarn_count_weft_tol_cond == 2)
      {
          document.getElementById("yarn_count_weft_cond1").value = 2;
          document.getElementById("yarn_count_weft_cond2").value = 2;

          var tolarance = ((yarn_count_weft_tol_value2 * yarn_count_weft_tol_value1) / 100);
          var yarn_count_weft_tol_cal_value2 = yarn_count_weft_tol_value1 + tolarance;

          document.getElementById("yarn_count_weft_value1").value = yarn_count_weft_tol_value1;
          document.getElementById("yarn_count_weft_value2").value = yarn_count_weft_tol_cal_value2.toFixed(5);
      }

      if (yarn_count_weft_tol_cond == 3)
      {
          document.getElementById("yarn_count_weft_cond1").value = 2;
          document.getElementById("yarn_count_weft_cond2").value = 2;

          var tolarance = ((yarn_count_weft_tol_value2 * yarn_count_weft_tol_value1) / 100);
          var yarn_count_weft_tol_cal_value2 = yarn_count_weft_tol_value1 - tolarance;

          document.getElementById("yarn_count_weft_value2").value = yarn_count_weft_tol_value1;
          document.getElementById("yarn_count_weft_value1").value = yarn_count_weft_tol_cal_value2.toFixed(5);
      }

      if(isNaN(document.getElementById("yarn_count_weft_tol_value1").value))
      {
          number_alert("yarn_count_weft_tol_value1");
          return false;
      }

      if(isNaN(document.getElementById("yarn_count_weft_tol_value2").value))
      {
          number_alert("yarn_count_weft_tol_value2");
          return false;
      }
  }



  function number_thread_warp_tol_condition()
  {

      var number_thread_warp_tol_value1 = parseFloat(document.getElementById("number_thread_warp_tol_value1").value);
      var number_thread_warp_tol_value2 = parseFloat(document.getElementById("number_thread_warp_tol_value2").value);
      var number_thread_warp_tol_cond = document.getElementById("number_thread_warp_tol_cond").value;

      if (number_thread_warp_tol_cond == 1) 
      {
          document.getElementById("number_thread_warp_cond1").value = 2;
          document.getElementById("number_thread_warp_cond2").value = 2;

          var tolarance = ((number_thread_warp_tol_value2 * number_thread_warp_tol_value1) / 100);
          var number_thread_warp_tol_cal_value2 = number_thread_warp_tol_value1 + tolarance;
          var number_thread_warp_tol_cal_value1 = number_thread_warp_tol_value1 - tolarance;

          document.getElementById("number_thread_warp_value1").value = number_thread_warp_tol_cal_value1.toFixed(5);
          document.getElementById("number_thread_warp_value2").value = number_thread_warp_tol_cal_value2.toFixed(5);
      }

      if (number_thread_warp_tol_cond == 2)
      {
          document.getElementById("number_thread_warp_cond1").value = 2;
          document.getElementById("number_thread_warp_cond2").value = 2;

          var tolarance = ((number_thread_warp_tol_value2 * number_thread_warp_tol_value1) / 100);
          var number_thread_warp_tol_cal_value2 = number_thread_warp_tol_value1 + tolarance;

          document.getElementById("number_thread_warp_value1").value = number_thread_warp_tol_value1;
          document.getElementById("number_thread_warp_value2").value = number_thread_warp_tol_cal_value2.toFixed(5);
      }

      if (number_thread_warp_tol_cond == 3)
      {
          document.getElementById("number_thread_warp_cond1").value = 2;
          document.getElementById("number_thread_warp_cond2").value = 2;

          var tolarance = ((number_thread_warp_tol_value2 * number_thread_warp_tol_value1) / 100);
          var number_thread_warp_tol_cal_value2 = number_thread_warp_tol_value1 - tolarance;

          document.getElementById("number_thread_warp_value2").value = number_thread_warp_tol_value1;
          document.getElementById("number_thread_warp_value1").value = number_thread_warp_tol_cal_value2.toFixed(5);
      }

      if(isNaN(document.getElementById("number_thread_warp_tol_value1").value))
      {
          number_alert("number_thread_warp_tol_value1");
          return false;
      }

      if(isNaN(document.getElementById("number_thread_warp_tol_value2").value))
      {
          number_alert("number_thread_warp_tol_value2");
          return false;
      }
  }


  function number_thread_weft_tol_condition()
  {
      var number_thread_weft_tol_value1 = parseFloat(document.getElementById("number_thread_weft_tol_value1").value);
      var number_thread_weft_tol_value2 = parseFloat(document.getElementById("number_thread_weft_tol_value2").value);
      var number_thread_weft_tol_cond = document.getElementById("number_thread_weft_tol_cond").value;

      if (number_thread_weft_tol_cond == 1) 
      {
          document.getElementById("number_thread_weft_cond1").value = 2;
          document.getElementById("number_thread_weft_cond2").value = 2;

          var tolarance = ((number_thread_weft_tol_value2 * number_thread_weft_tol_value1) / 100);
          var number_thread_weft_tol_cal_value2 = number_thread_weft_tol_value1 + tolarance;
          var number_thread_weft_tol_cal_value1 = number_thread_weft_tol_value1 - tolarance;

          document.getElementById("number_thread_weft_value1").value = number_thread_weft_tol_cal_value1.toFixed(5);
          document.getElementById("number_thread_weft_value2").value = number_thread_weft_tol_cal_value2.toFixed(5);
      }

      if (number_thread_weft_tol_cond == 2)
      {
          document.getElementById("number_thread_weft_cond1").value = 2;
          document.getElementById("number_thread_weft_cond2").value = 2;

          var tolarance = ((number_thread_weft_tol_value2 * number_thread_weft_tol_value1) / 100);
          var number_thread_weft_tol_cal_value2 = number_thread_weft_tol_value1 + tolarance;

          document.getElementById("number_thread_weft_value1").value = number_thread_weft_tol_value1;
          document.getElementById("number_thread_weft_value2").value = number_thread_weft_tol_cal_value2.toFixed(5);
      }

      if (number_thread_weft_tol_cond == 3)
      {
          document.getElementById("number_thread_weft_cond1").value = 2;
          document.getElementById("number_thread_weft_cond2").value = 2;

          var tolarance = ((number_thread_weft_tol_value2 * number_thread_weft_tol_value1) / 100);
          var number_thread_weft_tol_cal_value2 = number_thread_weft_tol_value1 - tolarance;

          document.getElementById("number_thread_weft_value2").value = number_thread_weft_tol_value1;
          document.getElementById("number_thread_weft_value1").value = number_thread_weft_tol_cal_value2.toFixed(5);
      }

      if(isNaN(document.getElementById("number_thread_weft_tol_value1").value))
      {
          number_alert("number_thread_weft_tol_value1");
          return false;
      }

      if(isNaN(document.getElementById("number_thread_weft_tol_value2").value))
      {
          number_alert("number_thread_weft_tol_value2");
          return false;
      }
  }




  // function number_thread_warp_tol()
  // {
  //     var number_thread_warp_tol_value = parseFloat(document.getElementById("number_thread_warp_tol_value").value);
  //     var number_thread_warp_tol_positive = parseFloat(document.getElementById("number_thread_warp_tol_positive").value);
  //     var number_thread_warp_tol_negative = document.getElementById("number_thread_warp_tol_negative").value;

  //     document.getElementById("number_thread_warp_cond1").value = 2;
  //     document.getElementById("number_thread_warp_cond2").value = 2;

  //     var positive_tolarance = ( (number_thread_warp_tol_value * number_thread_warp_tol_positive) / 100 );
  //     var negative_tolarance = ( (number_thread_warp_tol_value * number_thread_warp_tol_negative) / 100 );

  //     var number_thread_warp_tol_cal_value2 = number_thread_warp_tol_value + positive_tolarance;
  //     var number_thread_warp_tol_cal_value1 = number_thread_warp_tol_value - negative_tolarance;

  //     document.getElementById("number_thread_warp_value1").value = number_thread_warp_tol_cal_value1.toFixed(5);
  //     document.getElementById("number_thread_warp_value2").value = number_thread_warp_tol_cal_value2.toFixed(5);
      

  //     if(isNaN(document.getElementById("number_thread_warp_tol_positive").value))
  //     {
  //         number_alert("number_thread_warp_tol_positive");
  //         return false;
  //     }

  //     if(isNaN(document.getElementById("number_thread_warp_tol_negative").value))
  //     {
  //         number_alert("number_thread_warp_tol_negative");
  //         return false;
  //     }
  // }


  // function number_thread_weft_tol()
  // {
  //     var number_thread_weft_tol_value = parseFloat(document.getElementById("number_thread_weft_tol_value").value);
  //     var number_thread_weft_tol_positive = parseFloat(document.getElementById("number_thread_weft_tol_positive").value);
  //     var number_thread_weft_tol_negative = document.getElementById("number_thread_weft_tol_negative").value;

  //     document.getElementById("number_thread_weft_cond1").value = 2;
  //     document.getElementById("number_thread_weft_cond2").value = 2;

  //     var positive_tolarance = ( (number_thread_weft_tol_value * number_thread_weft_tol_positive) / 100 );
  //     var negative_tolarance = ( (number_thread_weft_tol_value * number_thread_weft_tol_negative) / 100 );

  //     var number_thread_weft_tol_cal_value2 = number_thread_weft_tol_value + positive_tolarance;
  //     var number_thread_weft_tol_cal_value1 = number_thread_weft_tol_value - negative_tolarance;

  //     document.getElementById("number_thread_weft_value1").value = number_thread_weft_tol_cal_value1.toFixed(5);
  //     document.getElementById("number_thread_weft_value2").value = number_thread_weft_tol_cal_value2.toFixed(5);
      

  //     if(isNaN(document.getElementById("number_thread_weft_tol_positive").value))
  //     {
  //         number_alert("number_thread_weft_tol_positive");
  //         return false;
  //     }

  //     if(isNaN(document.getElementById("number_thread_weft_tol_negative").value))
  //     {
  //         number_alert("number_thread_weft_tol_negative");
  //         return false;
  //     }
  // }


  function mass_per_unit_per_area_tol()
  {
      var mass_per_unit_per_area_tol_value = parseFloat(document.getElementById("mass_per_unit_per_area_tol_value").value);
      var mass_per_unit_per_area_tol_positive = parseFloat(document.getElementById("mass_per_unit_per_area_tol_positive").value);
      var mass_per_unit_per_area_tol_negative = document.getElementById("mass_per_unit_per_area_tol_negative").value;

      document.getElementById("mass_per_unit_per_area_cond1").value = 2;
      document.getElementById("mass_per_unit_per_area_cond2").value = 2;

      var positive_tolarance = ( (mass_per_unit_per_area_tol_value * mass_per_unit_per_area_tol_positive) / 100 );
      var negative_tolarance = ( (mass_per_unit_per_area_tol_value * mass_per_unit_per_area_tol_negative) / 100 );

      var mass_per_unit_per_area_tol_cal_value2 = mass_per_unit_per_area_tol_value + positive_tolarance;
      var mass_per_unit_per_area_tol_cal_value1 = mass_per_unit_per_area_tol_value - negative_tolarance;

      document.getElementById("mass_per_unit_per_area_value1").value = mass_per_unit_per_area_tol_cal_value1.toFixed(5);
      document.getElementById("mass_per_unit_per_area_value2").value = mass_per_unit_per_area_tol_cal_value2.toFixed(5);
      

      if(isNaN(document.getElementById("mass_per_unit_per_area_tol_positive").value))
      {
          number_alert("mass_per_unit_per_area_tol_positive");
          return false;
      }

      if(isNaN(document.getElementById("mass_per_unit_per_area_tol_negative").value))
      {
          number_alert("mass_per_unit_per_area_tol_negative");
          return false;
      }
  }


//   function mass_per_unit_per_area_tol_condition()
//   {
//       var mass_per_unit_per_area_tol_value1 = parseFloat(document.getElementById("mass_per_unit_per_area_tol_value1").value);
//       var mass_per_unit_per_area_tol_value2 = parseFloat(document.getElementById("mass_per_unit_per_area_tol_value2").value);
//       var mass_per_unit_per_area_tol_cond = document.getElementById("mass_per_unit_per_area_tol_cond").value;

//       if (mass_per_unit_per_area_tol_cond == 1) 
//       {
//           document.getElementById("mass_per_unit_per_area_cond1").value = 2;
//           document.getElementById("mass_per_unit_per_area_cond2").value = 2;

//           var tolarance = ((mass_per_unit_per_area_tol_value2 * mass_per_unit_per_area_tol_value1) / 100);
//           var mass_per_unit_per_area_tol_cal_value2 = mass_per_unit_per_area_tol_value1 + tolarance;
//           var mass_per_unit_per_area_tol_cal_value1 = mass_per_unit_per_area_tol_value1 - tolarance;

//           document.getElementById("mass_per_unit_per_area_value1").value = mass_per_unit_per_area_tol_cal_value1.toFixed(5);
//           document.getElementById("mass_per_unit_per_area_value2").value = mass_per_unit_per_area_tol_cal_value2.toFixed(5);
//       }

//       if (mass_per_unit_per_area_tol_cond == 2)
//       {
//           document.getElementById("mass_per_unit_per_area_cond1").value = 2;
//           document.getElementById("mass_per_unit_per_area_cond2").value = 2;

//           var tolarance = ((mass_per_unit_per_area_tol_value2 * mass_per_unit_per_area_tol_value1) / 100);
//           var mass_per_unit_per_area_tol_cal_value2 = mass_per_unit_per_area_tol_value1 + tolarance;

//           document.getElementById("mass_per_unit_per_area_value1").value = mass_per_unit_per_area_tol_value1;
//           document.getElementById("mass_per_unit_per_area_value2").value = mass_per_unit_per_area_tol_cal_value2.toFixed(5);
//       }

//       if (mass_per_unit_per_area_tol_cond == 3)
//       {
//           document.getElementById("mass_per_unit_per_area_cond1").value = 2;
//           document.getElementById("mass_per_unit_per_area_cond2").value = 2;

//           var tolarance = ((mass_per_unit_per_area_tol_value2 * mass_per_unit_per_area_tol_value1) / 100);
//           var mass_per_unit_per_area_tol_cal_value2 = mass_per_unit_per_area_tol_value1 - tolarance;

//           document.getElementById("mass_per_unit_per_area_value2").value = mass_per_unit_per_area_tol_value1;
//           document.getElementById("mass_per_unit_per_area_value1").value = mass_per_unit_per_area_tol_cal_value2.toFixed(5);
//       }

//       if(isNaN(document.getElementById("mass_per_unit_per_area_tol_value1").value))
//       {
//           number_alert("mass_per_unit_per_area_tol_value1");
//           return false;
//       }

//       if(isNaN(document.getElementById("mass_per_unit_per_area_tol_value2").value))
//       {
//           number_alert("mass_per_unit_per_area_tol_value2");
//           return false;
//       }
// }

function surface_pilling_condition()
{
    var surface_pilling_value = document.getElementById("surface_pilling_value").value;
    var surface_pilling_cond = document.getElementById("surface_pilling_cond").value;


       if (surface_pilling_value == 'NA') 
      { 
          document.getElementById("surface_pilling_value1").value = 'N/A';
          document.getElementById("surface_pilling_value2").value = 'N/A';
      }
      else
      {
         if (surface_pilling_cond == 1) 
    {
        document.getElementById("surface_pilling_cond1").value = 2;
        document.getElementById("surface_pilling_cond2").value = 2;

        document.getElementById("surface_pilling_value1").value = surface_pilling_value;
        document.getElementById("surface_pilling_value2").value = 5;
    }

    else
    {
        document.getElementById("surface_pilling_cond1").value = 2;
        document.getElementById("surface_pilling_cond2").value = 2;

        document.getElementById("surface_pilling_value1").value = 1;
        document.getElementById("surface_pilling_value2").value = surface_pilling_value;
    }

      }
   
}


function pilling_condition()
{
    var pilling_value = document.getElementById("pilling_value").value;
    var pilling_cond = document.getElementById("pilling_cond").value;

    if (pilling_value == 'NA') 
    {
        document.getElementById("pilling_value1").value = 'N/A';
        document.getElementById("pilling_value2").value = 'N/A';
    }

    else
    {
        if (pilling_cond == 1) 
        {
            document.getElementById("pilling_cond1").value = 2;
            document.getElementById("pilling_cond2").value = 2;

            document.getElementById("pilling_value1").value = pilling_value;
            document.getElementById("pilling_value2").value = 5;
        }

        else
        {
            document.getElementById("pilling_cond1").value = 2;
            document.getElementById("pilling_cond2").value = 2;

            document.getElementById("pilling_value1").value = 1;
            document.getElementById("pilling_value2").value = pilling_value;
        }
    }

}



function tensile_warp_condition()
{
    var tensile_warp_value = document.getElementById("tensile_warp_value").value;
    var tensile_warp_cond = document.getElementById("tensile_warp_cond").value;



    if (pilling_value == 'NA') 
    {
        document.getElementById("tensile_warp_value1").value = 'N/A';
        document.getElementById("tensile_warp_value2").value = 'N/A';
    }
    else
    {
     if (tensile_warp_cond == 1) 
    {
        document.getElementById("tensile_warp_cond1").value = 2;
        document.getElementById("tensile_warp_cond2").value = 2;

        document.getElementById("tensile_warp_value1").value = tensile_warp_value;
        document.getElementById("tensile_warp_value2").value = 1000;
    }

    else
    {
        document.getElementById("tensile_warp_cond1").value = 2;
        document.getElementById("tensile_warp_cond2").value = 2;

        document.getElementById("tensile_warp_value1").value = 1;
        document.getElementById("tensile_warp_value2").value = tensile_warp_value;
    }

    }
}


function tensile_weft_condition()
{
    var tensile_weft_value = document.getElementById("tensile_weft_value").value;
    var tensile_weft_cond = document.getElementById("tensile_weft_cond").value;

    if (tensile_weft_cond == 1) 
    {
        document.getElementById("tensile_weft_cond1").value = 2;
        document.getElementById("tensile_weft_cond2").value = 2;

        document.getElementById("tensile_weft_value1").value = tensile_weft_value;
        document.getElementById("tensile_weft_value2").value = 1000;
    }

    else
    {
        document.getElementById("tensile_weft_cond1").value = 2;
        document.getElementById("tensile_weft_cond2").value = 2;

        document.getElementById("tensile_weft_value1").value = 1;
        document.getElementById("tensile_weft_value2").value = tensile_weft_value;
    }

}


function tear_force_warp_condition()
{
    var tear_force_warp_value = document.getElementById("tear_force_warp_value").value;
    var tear_force_warp_cond = document.getElementById("tear_force_warp_cond").value;

    if (tear_force_warp_cond == 1) 
    {
        document.getElementById("tear_force_warp_cond1").value = 2;
        document.getElementById("tear_force_warp_cond2").value = 2;

        document.getElementById("tear_force_warp_value1").value = tear_force_warp_value;
        document.getElementById("tear_force_warp_value2").value = 500;
    }

    else
    {
        document.getElementById("tear_force_warp_cond1").value = 2;
        document.getElementById("tear_force_warp_cond2").value = 2;

        document.getElementById("tear_force_warp_value1").value = 1;
        document.getElementById("tear_force_warp_value2").value = tear_force_warp_value;
    }

}


function tear_force_weft_condition()
{
    var tear_force_weft_value = document.getElementById("tear_force_weft_value").value;
    var tear_force_weft_cond = document.getElementById("tear_force_weft_cond").value;

    if (tear_force_weft_cond == 1) 
    {
        document.getElementById("tear_force_weft_cond1").value = 2;
        document.getElementById("tear_force_weft_cond2").value = 2;

        document.getElementById("tear_force_weft_value1").value = tear_force_weft_value;
        document.getElementById("tear_force_weft_value2").value = 500;
    }

    else
    {
        document.getElementById("tear_force_weft_cond1").value = 2;
        document.getElementById("tear_force_weft_cond2").value = 2;

        document.getElementById("tear_force_weft_value1").value = 1;
        document.getElementById("tear_force_weft_value2").value = tear_force_weft_value;
    }

}


function seam_resistance_method1_warp_condition()
{
    var seam_resistance_method1_warp_value = document.getElementById("seam_resistance_method1_warp_value").value;
    var seam_resistance_method1_warp_cond = document.getElementById("seam_resistance_method1_warp_cond").value;

    if (seam_resistance_method1_warp_cond == 1) 
    {
        document.getElementById("seam_resistance_method1_warp_cond1").value = 2;
        document.getElementById("seam_resistance_method1_warp_cond2").value = 2;

        document.getElementById("seam_resistance_method1_warp_value1").value = seam_resistance_method1_warp_value;
        document.getElementById("seam_resistance_method1_warp_value2").value = 500;
    }

    else
    {
        document.getElementById("seam_resistance_method1_warp_cond1").value = 2;
        document.getElementById("seam_resistance_method1_warp_cond2").value = 2;

        document.getElementById("seam_resistance_method1_warp_value1").value = 1;
        document.getElementById("seam_resistance_method1_warp_value2").value = seam_resistance_method1_warp_value;
    }

}


function seam_resistance_method1_weft_condition()
{
    var seam_resistance_method1_weft_value = document.getElementById("seam_resistance_method1_weft_value").value;
    var seam_resistance_method1_weft_cond = document.getElementById("seam_resistance_method1_weft_cond").value;

    if (seam_resistance_method1_weft_cond == 1) 
    {
        document.getElementById("seam_resistance_method1_weft_cond1").value = 2;
        document.getElementById("seam_resistance_method1_weft_cond2").value = 2;

        document.getElementById("seam_resistance_method1_weft_value1").value = seam_resistance_method1_weft_value;
        document.getElementById("seam_resistance_method1_weft_value2").value = 500;
    }

    else
    {
        document.getElementById("seam_resistance_method1_weft_cond1").value = 2;
        document.getElementById("seam_resistance_method1_weft_cond2").value = 2;

        document.getElementById("seam_resistance_method1_weft_value1").value = 1;
        document.getElementById("seam_resistance_method1_weft_value2").value = seam_resistance_method1_weft_value;
    }

}


function seam_resistance_method2_warp_condition()
{
    var seam_resistance_method2_warp_value = document.getElementById("seam_resistance_method2_warp_value").value;
    var seam_resistance_method2_warp_cond = document.getElementById("seam_resistance_method2_warp_cond").value;

    if (seam_resistance_method2_warp_cond == 1) 
    {
        document.getElementById("seam_resistance_method2_warp_cond1").value = 2;
        document.getElementById("seam_resistance_method2_warp_cond2").value = 2;

        document.getElementById("seam_resistance_method2_warp_value1").value = seam_resistance_method2_warp_value;
        document.getElementById("seam_resistance_method2_warp_value2").value = 500;
    }

    else
    {
        document.getElementById("seam_resistance_method2_warp_cond1").value = 2;
        document.getElementById("seam_resistance_method2_warp_cond2").value = 2;

        document.getElementById("seam_resistance_method2_warp_value1").value = 1;
        document.getElementById("seam_resistance_method2_warp_value2").value = seam_resistance_method2_warp_value;
    }

}


function seam_resistance_method2_weft_condition()
{
    var seam_resistance_method2_weft_value = document.getElementById("seam_resistance_method2_weft_value").value;
    var seam_resistance_method2_weft_cond = document.getElementById("seam_resistance_method2_weft_cond").value;

    if (seam_resistance_method2_weft_cond == 1) 
    {
        document.getElementById("seam_resistance_method2_weft_cond1").value = 2;
        document.getElementById("seam_resistance_method2_weft_cond2").value = 2;

        document.getElementById("seam_resistance_method2_weft_value1").value = seam_resistance_method2_weft_value;
        document.getElementById("seam_resistance_method2_weft_value2").value = 500;
    }

    else
    {
        document.getElementById("seam_resistance_method2_weft_cond1").value = 2;
        document.getElementById("seam_resistance_method2_weft_cond2").value = 2;

        document.getElementById("seam_resistance_method2_weft_value1").value = 1;
        document.getElementById("seam_resistance_method2_weft_value2").value = seam_resistance_method2_weft_value;
    }

}



function seam_strength_warp_condition()
{
    var seam_strength_warp_value = document.getElementById("seam_strength_warp_value").value;
    var seam_strength_warp_cond = document.getElementById("seam_strength_warp_cond").value;

    if (seam_strength_warp_cond == 1) 
    {
        document.getElementById("seam_strength_warp_cond1").value = 2;
        document.getElementById("seam_strength_warp_cond2").value = 2;

        document.getElementById("seam_strength_warp_value1").value = seam_strength_warp_value;
        document.getElementById("seam_strength_warp_value2").value = 500;
    }

    else
    {
        document.getElementById("seam_strength_warp_cond1").value = 2;
        document.getElementById("seam_strength_warp_cond2").value = 2;

        document.getElementById("seam_strength_warp_value1").value = 1;
        document.getElementById("seam_strength_warp_value2").value = seam_strength_warp_value;
    }

}


function seam_strength_weft_condition()
{
    var seam_strength_weft_value = document.getElementById("seam_strength_weft_value").value;
    var seam_strength_weft_cond = document.getElementById("seam_strength_weft_cond").value;

    if (seam_strength_weft_cond == 1) 
    {
        document.getElementById("seam_strength_weft_cond1").value = 2;
        document.getElementById("seam_strength_weft_cond2").value = 2;

        document.getElementById("seam_strength_weft_value1").value = seam_strength_weft_value;
        document.getElementById("seam_strength_weft_value2").value = 500;
    }

    else
    {
        document.getElementById("seam_strength_weft_cond1").value = 2;
        document.getElementById("seam_strength_weft_cond2").value = 2;

        document.getElementById("seam_strength_weft_value1").value = 1;
        document.getElementById("seam_strength_weft_value2").value = seam_strength_weft_value;
    }

}


function abrasion_resistance_condition()
{
    var abrasion_resistance_value = document.getElementById("abrasion_resistance_value").value;
    var abrasion_resistance_cond = document.getElementById("abrasion_resistance_cond").value;

     if (abrasion_resistance_value == 'NA') 
      { 
          document.getElementById("abrasion_resistance_value1").value = 'N/A';
          document.getElementById("abrasion_resistance_value2").value = 'N/A';
      }
      else
      {
      if (abrasion_resistance_cond == 1) 
    {
        document.getElementById("abrasion_resistance_cond1").value = 2;
        document.getElementById("abrasion_resistance_cond2").value = 2;

        document.getElementById("abrasion_resistance_value1").value = abrasion_resistance_value;
        document.getElementById("abrasion_resistance_value2").value = 5;
    }

    else
    {
        document.getElementById("abrasion_resistance_cond1").value = 2;
        document.getElementById("abrasion_resistance_cond2").value = 2;

        document.getElementById("abrasion_resistance_value1").value = 1;
        document.getElementById("abrasion_resistance_value2").value = abrasion_resistance_value;
    }
      }
}



function abrasion_resistance_lose_condition()
{
    var abrasion_resistance_lose_value = document.getElementById("abrasion_resistance_lose_value").value;
    var abrasion_resistance_lose_cond = document.getElementById("abrasion_resistance_lose_cond").value;

    if (abrasion_resistance_lose_cond == 1) 
    {
        document.getElementById("abrasion_resistance_lose_cond1").value = 2;
        document.getElementById("abrasion_resistance_lose_cond2").value = 2;

        document.getElementById("abrasion_resistance_lose_value1").value = abrasion_resistance_lose_value;
        document.getElementById("abrasion_resistance_lose_value2").value = 5;
    }

    else
    {
        document.getElementById("abrasion_resistance_lose_cond1").value = 2;
        document.getElementById("abrasion_resistance_lose_cond2").value = 2;

        document.getElementById("abrasion_resistance_lose_value1").value = 1;
        document.getElementById("abrasion_resistance_lose_value2").value = abrasion_resistance_lose_value;
    }

}


function washing_ph_condition()
{
    var condition = document.getElementById("washing_ph_cond1").value;

    if (condition == 1)
    {
        document.getElementById("washing_ph_cond1").value = 1;
        document.getElementById("washing_ph_cond2").value = 1;
    }

    else
    {
        document.getElementById("washing_ph_cond1").value = 2;
        document.getElementById("washing_ph_cond2").value = 2;
    }
}

function formaldehyde_content_condition()
{
    var formaldehyde_content_value = document.getElementById("formaldehyde_content_value").value;
    var formaldehyde_content_cond = document.getElementById("formaldehyde_content_cond").value;

    if (formaldehyde_content_cond == 1) 
    {
        document.getElementById("formaldehyde_content_cond1").value = 1;
        document.getElementById("formaldehyde_content_cond2").value = 1;

        document.getElementById("formaldehyde_content_value1").value = formaldehyde_content_value;
        document.getElementById("formaldehyde_content_value2").value = 100;
    }

    else
    {
        document.getElementById("formaldehyde_content_cond1").value = 2;
        document.getElementById("formaldehyde_content_cond2").value = 2;

        document.getElementById("formaldehyde_content_value1").value = 1;
        document.getElementById("formaldehyde_content_value2").value = formaldehyde_content_value;
    }
}


function cf_dry_cleaning_c_change_condition()
{
    var cf_dry_cleaning_c_change_value = document.getElementById("cf_dry_cleaning_c_change_value").value;
    var cf_dry_cleaning_c_change_cond = document.getElementById("cf_dry_cleaning_c_change_cond").value;

    if (cf_dry_cleaning_c_change_value == 'NA') 
    {
        document.getElementById("cf_dry_cleaning_c_change_value1").value = 'N/A';
        document.getElementById("cf_dry_cleaning_c_change_value2").value = 'N/A';
    }
    else
    {
     if (cf_dry_cleaning_c_change_cond == 1) 
    {
        document.getElementById("cf_dry_cleaning_c_change_cond1").value = 2;
        document.getElementById("cf_dry_cleaning_c_change_cond2").value = 2;

        document.getElementById("cf_dry_cleaning_c_change_value1").value = cf_dry_cleaning_c_change_value;
        document.getElementById("cf_dry_cleaning_c_change_value2").value = 5;
    }

    else
    {
        document.getElementById("cf_dry_cleaning_c_change_cond1").value = 2;
        document.getElementById("cf_dry_cleaning_c_change_cond2").value = 2;

        document.getElementById("cf_dry_cleaning_c_change_value1").value = 1;
        document.getElementById("cf_dry_cleaning_c_change_value2").value = cf_dry_cleaning_c_change_value;
    }

    }  
}


function cf_dry_cleaning_staining_condition()
{
    var cf_dry_cleaning_staining_value = document.getElementById("cf_dry_cleaning_staining_value").value;
    var cf_dry_cleaning_staining_cond = document.getElementById("cf_dry_cleaning_staining_cond").value;

    if (cf_dry_cleaning_staining_value == 'NA') 
    {
        document.getElementById("cf_dry_cleaning_staining_value1").value = 'N/A';
        document.getElementById("cf_dry_cleaning_staining_value2").value = 'N/A';
    }
    else
    {
      if (cf_dry_cleaning_staining_cond == 1) 
    {
        document.getElementById("cf_dry_cleaning_staining_cond1").value = 2;
        document.getElementById("cf_dry_cleaning_staining_cond2").value = 2;

        document.getElementById("cf_dry_cleaning_staining_value1").value = cf_dry_cleaning_staining_value;
        document.getElementById("cf_dry_cleaning_staining_value2").value = 5;
    }

    else
    {
        document.getElementById("cf_dry_cleaning_staining_cond1").value = 2;
        document.getElementById("cf_dry_cleaning_staining_cond2").value = 2;

        document.getElementById("cf_dry_cleaning_staining_value1").value = 1;
        document.getElementById("cf_dry_cleaning_staining_value2").value = cf_dry_cleaning_staining_value;
    }
   }

}


function cf_washing_c_change_condition()
{
    var cf_washing_c_change_value = document.getElementById("cf_washing_c_change_value").value;
    var cf_washing_c_change_cond = document.getElementById("cf_washing_c_change_cond").value;

    if (cf_washing_c_change_value == 'NA') 
    {
        document.getElementById("cf_washing_c_change_value1").value = 'N/A';
        document.getElementById("cf_washing_c_change_value2").value = 'N/A';
    }
    else
    {
      
    if (cf_washing_c_change_cond == 1) 
    {
        document.getElementById("cf_washing_c_change_cond1").value = 2;
        document.getElementById("cf_washing_c_change_cond2").value = 2;

        document.getElementById("cf_washing_c_change_value1").value = cf_washing_c_change_value;
        document.getElementById("cf_washing_c_change_value2").value = 5;
    }

    else
    {
        document.getElementById("cf_washing_c_change_cond1").value = 2;
        document.getElementById("cf_washing_c_change_cond2").value = 2;

        document.getElementById("cf_washing_c_change_value1").value = 1;
        document.getElementById("cf_washing_c_change_value2").value = cf_washing_c_change_value;
    }


    }
}


function cf_washing_staining_condition()
{
    var cf_washing_staining_value = document.getElementById("cf_washing_staining_value").value;
    var cf_washing_staining_cond = document.getElementById("cf_washing_staining_cond").value;

    if (cf_washing_staining_value == 'NA') 
    {
        document.getElementById("cf_washing_staining_value1").value = 'N/A';
        document.getElementById("cf_washing_staining_value2").value = 'N/A';
    }

    else
    {
      if (cf_washing_staining_cond == 1) 
    {
        document.getElementById("cf_washing_staining_cond1").value = 2;
        document.getElementById("cf_washing_staining_cond2").value = 2;

        document.getElementById("cf_washing_staining_value1").value = cf_washing_staining_value;
        document.getElementById("cf_washing_staining_value2").value = 5;
    }

    else
    {
        document.getElementById("cf_washing_staining_cond1").value = 2;
        document.getElementById("cf_washing_staining_cond2").value = 2;

        document.getElementById("cf_washing_staining_value1").value = 1;
        document.getElementById("cf_washing_staining_value2").value = cf_washing_staining_value;
    }


    }

  }


function cf_perspiration_acis_c_change_condition()
{
    var cf_perspiration_acis_c_change_value = document.getElementById("cf_perspiration_acis_c_change_value").value;
    var cf_perspiration_acis_c_change_cond = document.getElementById("cf_perspiration_acis_c_change_cond").value;

    if (cf_perspiration_acis_c_change_value == 'NA') 
    {
        document.getElementById("cf_perspiration_acis_c_change_value1").value = 'N/A';
        document.getElementById("cf_perspiration_acis_c_change_value2").value = 'N/A';
    }
    else
    {
      if (cf_perspiration_acis_c_change_cond == 1) 
    {
        document.getElementById("cf_perspiration_acis_c_change_cond1").value = 2;
        document.getElementById("cf_perspiration_acis_c_change_cond2").value = 2;

        document.getElementById("cf_perspiration_acis_c_change_value1").value = cf_perspiration_acis_c_change_value;
        document.getElementById("cf_perspiration_acis_c_change_value2").value = 5;
    }

    else
    {
        document.getElementById("cf_perspiration_acis_c_change_cond1").value = 2;
        document.getElementById("cf_perspiration_acis_c_change_cond2").value = 2;

        document.getElementById("cf_perspiration_acis_c_change_value1").value = 1;
        document.getElementById("cf_perspiration_acis_c_change_value2").value = cf_perspiration_acis_c_change_value;
    }

    }
 }


function cf_perspiration_acis_staining_condition()
{
    var cf_perspiration_acis_staining_value = document.getElementById("cf_perspiration_acis_staining_value").value;
    var cf_perspiration_acis_staining_cond = document.getElementById("cf_perspiration_acis_staining_cond").value;

    if (cf_perspiration_acis_staining_value == 'NA') 
    {
        document.getElementById("cf_perspiration_acis_staining_value1").value = 'N/A';
        document.getElementById("cf_perspiration_acis_staining_value2").value = 'N/A';
    }
    else
    {
      if (cf_perspiration_acis_staining_cond == 1) 
    {
        document.getElementById("cf_perspiration_acis_staining_cond1").value = 2;
        document.getElementById("cf_perspiration_acis_staining_cond2").value = 2;

        document.getElementById("cf_perspiration_acis_staining_value1").value = cf_perspiration_acis_staining_value;
        document.getElementById("cf_perspiration_acis_staining_value2").value = 5;
    }

    else
    {
        document.getElementById("cf_perspiration_acis_staining_cond1").value = 2;
        document.getElementById("cf_perspiration_acis_staining_cond2").value = 2;

        document.getElementById("cf_perspiration_acis_staining_value1").value = 1;
        document.getElementById("cf_perspiration_acis_staining_value2").value = cf_perspiration_acis_staining_value;
    }

    }

    
}


function cf_perspiration_alkali_c_change_condition()
{
    var cf_perspiration_alkali_c_change_value = document.getElementById("cf_perspiration_alkali_c_change_value").value;
    var cf_perspiration_alkali_c_change_cond = document.getElementById("cf_perspiration_alkali_c_change_cond").value;

    if (cf_perspiration_alkali_c_change_value == 'NA') 
    {
        document.getElementById("cf_perspiration_alkali_c_change_value1").value = 'N/A';
        document.getElementById("cf_perspiration_alkali_c_change_value2").value = 'N/A';
    }
    else
    {

    if (cf_perspiration_alkali_c_change_cond == 1) 
    {
        document.getElementById("cf_perspiration_alkali_c_change_cond1").value = 2;
        document.getElementById("cf_perspiration_alkali_c_change_cond2").value = 2;

        document.getElementById("cf_perspiration_alkali_c_change_value1").value = cf_perspiration_alkali_c_change_value;
        document.getElementById("cf_perspiration_alkali_c_change_value2").value = 5;
    }

    else
    {
        document.getElementById("cf_perspiration_alkali_c_change_cond1").value = 2;
        document.getElementById("cf_perspiration_alkali_c_change_cond2").value = 2;

        document.getElementById("cf_perspiration_alkali_c_change_value1").value = 1;
        document.getElementById("cf_perspiration_alkali_c_change_value2").value = cf_perspiration_alkali_c_change_value;
    }

    }

}


function cf_perspiration_alkali_staining_condition()
{
    var cf_perspiration_alkali_staining_value = document.getElementById("cf_perspiration_alkali_staining_value").value;
    var cf_perspiration_alkali_staining_cond = document.getElementById("cf_perspiration_alkali_staining_cond").value;

    if (cf_perspiration_alkali_staining_value == 'NA') 
    {
        document.getElementById("cf_perspiration_alkali_staining_value1").value = 'N/A';
        document.getElementById("cf_perspiration_alkali_staining_value2").value = 'N/A';
    }
    else
    {
       if (cf_perspiration_alkali_staining_cond == 1) 
    {
        document.getElementById("cf_perspiration_alkali_staining_cond1").value = 2;
        document.getElementById("cf_perspiration_alkali_staining_cond2").value = 2;

        document.getElementById("cf_perspiration_alkali_staining_value1").value = cf_perspiration_alkali_staining_value;
        document.getElementById("cf_perspiration_alkali_staining_value2").value = 5;
    }

    else
    {
        document.getElementById("cf_perspiration_alkali_staining_cond1").value = 2;
        document.getElementById("cf_perspiration_alkali_staining_cond2").value = 2;

        document.getElementById("cf_perspiration_alkali_staining_value1").value = 1;
        document.getElementById("cf_perspiration_alkali_staining_value2").value = cf_perspiration_alkali_staining_value;
    }

    }

   
}


function cf_water_c_change_condition()
{
    var cf_water_c_change_value = document.getElementById("cf_water_c_change_value").value;
    var cf_water_c_change_cond = document.getElementById("cf_water_c_change_cond").value;

    if (cf_water_c_change_value == 'NA') 
    {
        document.getElementById("cf_water_c_change_value1").value = 'N/A';
        document.getElementById("cf_water_c_change_value2").value = 'N/A';
    }
    else
    {

    if (cf_water_c_change_cond == 1) 
    {
        document.getElementById("cf_water_c_change_cond1").value = 2;
        document.getElementById("cf_water_c_change_cond2").value = 2;

        document.getElementById("cf_water_c_change_value1").value = cf_water_c_change_value;
        document.getElementById("cf_water_c_change_value2").value = 5;
    }

    else
    {
        document.getElementById("cf_water_c_change_cond1").value = 2;
        document.getElementById("cf_water_c_change_cond2").value = 2;

        document.getElementById("cf_water_c_change_value1").value = 1;
        document.getElementById("cf_water_c_change_value2").value = cf_water_c_change_value;
    }

    }

}


function cf_water_staining_condition()
{
    var cf_water_staining_value = document.getElementById("cf_water_staining_value").value;
    var cf_water_staining_cond = document.getElementById("cf_water_staining_cond").value;

    if (cf_water_staining_value == 'NA') 
    {
        document.getElementById("cf_water_staining_value1").value = 'N/A';
        document.getElementById("cf_water_staining_value2").value = 'N/A';
    }
    else
    {

    if (cf_water_staining_cond == 1) 
    {
        document.getElementById("cf_water_staining_cond1").value = 2;
        document.getElementById("cf_water_staining_cond2").value = 2;

        document.getElementById("cf_water_staining_value1").value = cf_water_staining_value;
        document.getElementById("cf_water_staining_value2").value = 5;
    }

    else
    {
        document.getElementById("cf_water_staining_cond1").value = 2;
        document.getElementById("cf_water_staining_cond2").value = 2;

        document.getElementById("cf_water_staining_value1").value = 1;
        document.getElementById("cf_water_staining_value2").value = cf_water_staining_value;
    }

    }

}


function cf_water_sotting_staining_condition()
{
    var cf_water_sotting_staining_value = document.getElementById("cf_water_sotting_staining_value").value;
    var cf_water_sotting_staining_cond = document.getElementById("cf_water_sotting_staining_cond").value;


    if (cf_water_sotting_staining_value == 'NA') 
    {
        document.getElementById("cf_water_sotting_staining_value1").value = 'N/A';
        document.getElementById("cf_water_sotting_staining_value2").value = 'N/A';
    }
    else
    {

    if (cf_water_sotting_staining_cond == 1) 
    {
        document.getElementById("cf_water_sotting_staining_cond1").value = 2;
        document.getElementById("cf_water_sotting_staining_cond2").value = 2;

        document.getElementById("cf_water_sotting_staining_value1").value = cf_water_sotting_staining_value;
        document.getElementById("cf_water_sotting_staining_value2").value = 5;
    }

    else
    {
        document.getElementById("cf_water_sotting_staining_cond1").value = 2;
        document.getElementById("cf_water_sotting_staining_cond2").value = 2;

        document.getElementById("cf_water_sotting_staining_value1").value = 1;
        document.getElementById("cf_water_sotting_staining_value2").value = cf_water_sotting_staining_value;
    }

    }

}

function cf_water_wetting_staining_condition()
{
    var cf_water_wetting_staining_value = document.getElementById("cf_water_wetting_staining_value").value;
    var cf_water_wetting_staining_cond = document.getElementById("cf_water_wetting_staining_cond").value;

     if (cf_water_wetting_staining_value == 'NA') 
    {
        document.getElementById("cf_water_wetting_staining_value1").value = 'N/A';
        document.getElementById("cf_water_wetting_staining_value2").value = 'N/A';
    }
    else
    {

    if (cf_water_wetting_staining_cond == 1) 
    {
        document.getElementById("cf_water_wetting_staining_cond1").value = 2;
        document.getElementById("cf_water_wetting_staining_cond2").value = 2;

        document.getElementById("cf_water_wetting_staining_value1").value = cf_water_wetting_staining_value;
        document.getElementById("cf_water_wetting_staining_value2").value = 5;
    }

    else
    {
        document.getElementById("cf_water_wetting_staining_cond1").value = 2;
        document.getElementById("cf_water_wetting_staining_cond2").value = 2;

        document.getElementById("cf_water_wetting_staining_value1").value = 1;
        document.getElementById("cf_water_wetting_staining_value2").value = cf_water_wetting_staining_value;
    }

    }

}


function cf_hyd_reactive_dyes_c_change_condition()
{
    var cf_hyd_reactive_dyes_c_change_value = document.getElementById("cf_hyd_reactive_dyes_c_change_value").value;
    var cf_hyd_reactive_dyes_c_change_cond = document.getElementById("cf_hyd_reactive_dyes_c_change_cond").value;

    if (cf_hyd_reactive_dyes_c_change_value == 'NA') 
    {
        document.getElementById("cf_hyd_reactive_dyes_c_change_value1").value = 'N/A';
        document.getElementById("cf_hyd_reactive_dyes_c_change_value2").value = 'N/A';
    }
    else
    {
        if (cf_hyd_reactive_dyes_c_change_cond == 1) 
    {
        document.getElementById("cf_hyd_reactive_dyes_c_change_cond1").value = 2;
        document.getElementById("cf_hyd_reactive_dyes_c_change_cond2").value = 2;

        document.getElementById("cf_hyd_reactive_dyes_c_change_value1").value = cf_hyd_reactive_dyes_c_change_value;
        document.getElementById("cf_hyd_reactive_dyes_c_change_value2").value = 5;
    }

    else
    {
        document.getElementById("cf_hyd_reactive_dyes_c_change_cond1").value = 2;
        document.getElementById("cf_hyd_reactive_dyes_c_change_cond2").value = 2;

        document.getElementById("cf_hyd_reactive_dyes_c_change_value1").value = 1;
        document.getElementById("cf_hyd_reactive_dyes_c_change_value2").value = cf_hyd_reactive_dyes_c_change_value;
    }

    }

}


function cf_hyd_reactive_dyes_staining_condition()
{
    var cf_hyd_reactive_dyes_staining_value = document.getElementById("cf_hyd_reactive_dyes_staining_value").value;
    var cf_hyd_reactive_dyes_staining_cond = document.getElementById("cf_hyd_reactive_dyes_staining_cond").value;

    if (cf_hyd_reactive_dyes_staining_value == 'NA') 
    {
        document.getElementById("cf_hyd_reactive_dyes_staining_value1").value = 'N/A';
        document.getElementById("cf_hyd_reactive_dyes_staining_value2").value = 'N/A';
    }

    else
    {
       if (cf_hyd_reactive_dyes_staining_cond == 1) 
    {
        document.getElementById("cf_hyd_reactive_dyes_staining_cond1").value = 2;
        document.getElementById("cf_hyd_reactive_dyes_staining_cond2").value = 2;

        document.getElementById("cf_hyd_reactive_dyes_staining_value1").value = cf_hyd_reactive_dyes_staining_value;
        document.getElementById("cf_hyd_reactive_dyes_staining_value2").value = 5;
    }

    else
    {
        document.getElementById("cf_hyd_reactive_dyes_staining_cond1").value = 2;
        document.getElementById("cf_hyd_reactive_dyes_staining_cond2").value = 2;

        document.getElementById("cf_hyd_reactive_dyes_staining_value1").value = 1;
        document.getElementById("cf_hyd_reactive_dyes_staining_value2").value = cf_hyd_reactive_dyes_staining_value;
    }

    }
  
}


function cf_oidative_damage_c_change_condition()
{
    var cf_oidative_damage_c_change_value = document.getElementById("cf_oidative_damage_c_change_value").value;
    var cf_oidative_damage_c_change_cond = document.getElementById("cf_oidative_damage_c_change_cond").value;

    if (cf_oidative_damage_c_change_value == 'NA') 
    {
        document.getElementById("cf_oidative_damage_c_change_value1").value = 'N/A';
        document.getElementById("cf_oidative_damage_c_change_value2").value = 'N/A';
    }
    else
    {
        if (cf_oidative_damage_c_change_cond == 1) 
    {
        document.getElementById("cf_oidative_damage_c_change_cond1").value = 2;
        document.getElementById("cf_oidative_damage_c_change_cond2").value = 2;

        document.getElementById("cf_oidative_damage_c_change_value1").value = cf_oidative_damage_c_change_value;
        document.getElementById("cf_oidative_damage_c_change_value2").value = 5;
    }

    else
    {
        document.getElementById("cf_oidative_damage_c_change_cond1").value = 2;
        document.getElementById("cf_oidative_damage_c_change_cond2").value = 2;

        document.getElementById("cf_oidative_damage_c_change_value1").value = 1;
        document.getElementById("cf_oidative_damage_c_change_value2").value = cf_oidative_damage_c_change_value;
    }

    }

  
}


function cf_phenolic_staining_condition()
{
    var cf_phenolic_staining_value = document.getElementById("cf_phenolic_staining_value").value;
    var cf_phenolic_staining_cond = document.getElementById("cf_phenolic_staining_cond").value;

    if (cf_phenolic_staining_value == 'NA') 
    {
        document.getElementById("cf_phenolic_staining_value1").value = 'N/A';
        document.getElementById("cf_phenolic_staining_value2").value = 'N/A';
    }
    else
    {
       if (cf_phenolic_staining_cond == 1) 
    {
        document.getElementById("cf_phenolic_staining_cond1").value = 2;
        document.getElementById("cf_phenolic_staining_cond2").value = 2;

        document.getElementById("cf_phenolic_staining_value1").value = cf_phenolic_staining_value;
        document.getElementById("cf_phenolic_staining_value2").value = 5;
    }

    else
    {
        document.getElementById("cf_phenolic_staining_cond1").value = 2;
        document.getElementById("cf_phenolic_staining_cond2").value = 2;

        document.getElementById("cf_phenolic_staining_value1").value = 1;
        document.getElementById("cf_phenolic_staining_value2").value = cf_phenolic_staining_value;
    }

    }

   
}


function cf_pvc_migration_staining_condition()
{
    var cf_pvc_migration_staining_value = document.getElementById("cf_pvc_migration_staining_value").value;
    var cf_pvc_migration_staining_cond = document.getElementById("cf_pvc_migration_staining_cond").value;

    if (cf_pvc_migration_staining_value == 'NA') 
    {
        document.getElementById("cf_pvc_migration_staining_value1").value = 'N/A';
        document.getElementById("cf_pvc_migration_staining_value2").value = 'N/A';
    }
    else
    {
       if (cf_pvc_migration_staining_cond == 1) 
    {
        document.getElementById("cf_pvc_migration_staining_cond1").value = 2;
        document.getElementById("cf_pvc_migration_staining_cond2").value = 2;

        document.getElementById("cf_pvc_migration_staining_value1").value = cf_pvc_migration_staining_value;
        document.getElementById("cf_pvc_migration_staining_value2").value = 5;
    }

    else
    {
        document.getElementById("cf_pvc_migration_staining_cond1").value = 2;
        document.getElementById("cf_pvc_migration_staining_cond2").value = 2;

        document.getElementById("cf_pvc_migration_staining_value1").value = 1;
        document.getElementById("cf_pvc_migration_staining_value2").value = cf_pvc_migration_staining_value;
    }

    }

   
}


function cf_saliva_c_change_condition()
{
    var cf_saliva_c_change_value = document.getElementById("cf_saliva_c_change_value").value;
    var cf_saliva_c_change_cond = document.getElementById("cf_saliva_c_change_cond").value;


    if (cf_saliva_c_change_value == 'NA') 
    {
        document.getElementById("cf_saliva_c_change_value1").value = 'N/A';
        document.getElementById("cf_saliva_c_change_value2").value = 'N/A';
    }
    else
    {
       if (cf_saliva_c_change_cond == 1) 
    {
        document.getElementById("cf_saliva_c_change_cond1").value = 2;
        document.getElementById("cf_saliva_c_change_cond2").value = 2;

        document.getElementById("cf_saliva_c_change_value1").value = cf_saliva_c_change_value;
        document.getElementById("cf_saliva_c_change_value2").value = 5;
    }

    else
    {
        document.getElementById("cf_saliva_c_change_cond1").value = 2;
        document.getElementById("cf_saliva_c_change_cond2").value = 2;

        document.getElementById("cf_saliva_c_change_value1").value = 1;
        document.getElementById("cf_saliva_c_change_value2").value = cf_saliva_c_change_value;
    }

    }

   
}


function cf_saliva_staining_condition()
{
    var cf_saliva_staining_value = document.getElementById("cf_saliva_staining_value").value;
    var cf_saliva_staining_cond = document.getElementById("cf_saliva_staining_cond").value;

    if (cf_saliva_staining_value == 'NA') 
    {
        document.getElementById("cf_saliva_staining_value1").value = 'N/A';
        document.getElementById("cf_saliva_staining_value2").value = 'N/A';
    }
    else
    {
      if (cf_saliva_staining_cond == 1) 
    {
        document.getElementById("cf_saliva_staining_cond1").value = 2;
        document.getElementById("cf_saliva_staining_cond2").value = 2;

        document.getElementById("cf_saliva_staining_value1").value = cf_saliva_staining_value;
        document.getElementById("cf_saliva_staining_value2").value = 5;
    }

    else
    {
        document.getElementById("cf_saliva_staining_cond1").value = 2;
        document.getElementById("cf_saliva_staining_cond2").value = 2;

        document.getElementById("cf_saliva_staining_value1").value = 1;
        document.getElementById("cf_saliva_staining_value2").value = cf_saliva_staining_value;
    }

    }
    
}

function cf_chlorinated_water_c_change_condition()
{
    var cf_chlorinated_water_c_change_value = document.getElementById("cf_chlorinated_water_c_change_value").value;
    var cf_chlorinated_water_c_change_cond = document.getElementById("cf_chlorinated_water_c_change_cond").value;

    if (cf_chlorinated_water_c_change_value == 'NA') 
    {
        document.getElementById("cf_chlorinated_water_c_change_value1").value = 'N/A';
        document.getElementById("cf_chlorinated_water_c_change_value2").value = 'N/A';
    }
    else
    {
      if (cf_chlorinated_water_c_change_cond == 1) 
    {
        document.getElementById("cf_chlorinated_water_c_change_cond1").value = 2;
        document.getElementById("cf_chlorinated_water_c_change_cond2").value = 2;

        document.getElementById("cf_chlorinated_water_c_change_value1").value = cf_chlorinated_water_c_change_value;
        document.getElementById("cf_chlorinated_water_c_change_value2").value = 5;
    }

    else
    {
        document.getElementById("cf_chlorinated_water_c_change_cond1").value = 2;
        document.getElementById("cf_chlorinated_water_c_change_cond2").value = 2;

        document.getElementById("cf_chlorinated_water_c_change_value1").value = 1;
        document.getElementById("cf_chlorinated_water_c_change_value2").value = cf_chlorinated_water_c_change_value;
    }

    }

    
}


function cf_chlorinated_water_staining_condition()
{
    var cf_chlorinated_water_staining_value = document.getElementById("cf_chlorinated_water_staining_value").value;
    var cf_chlorinated_water_staining_cond = document.getElementById("cf_chlorinated_water_staining_cond").value;

    if (cf_chlorinated_water_staining_value == 'NA') 
    {
        document.getElementById("cf_chlorinated_water_staining_value1").value = 'N/A';
        document.getElementById("cf_chlorinated_water_staining_value2").value = 'N/A';
    }
    else
    {
      if (cf_chlorinated_water_staining_cond == 1) 
    {
        document.getElementById("cf_chlorinated_water_staining_cond1").value = 2;
        document.getElementById("cf_chlorinated_water_staining_cond2").value = 2;

        document.getElementById("cf_chlorinated_water_staining_value1").value = cf_chlorinated_water_staining_value;
        document.getElementById("cf_chlorinated_water_staining_value2").value = 5;
    }

    else
    {
        document.getElementById("cf_chlorinated_water_staining_cond1").value = 2;
        document.getElementById("cf_chlorinated_water_staining_cond2").value = 2;

        document.getElementById("cf_chlorinated_water_staining_value1").value = 1;
        document.getElementById("cf_chlorinated_water_staining_value2").value = cf_chlorinated_water_staining_value;
    }

    }

    
}

function cf_cholorine_bleach_c_change_condition()
{
    var cf_cholorine_bleach_c_change_value = document.getElementById("cf_cholorine_bleach_c_change_value").value;
    var cf_cholorine_bleach_c_change_cond = document.getElementById("cf_cholorine_bleach_c_change_cond").value;

    if (cf_cholorine_bleach_c_change_value == 'NA') 
    {
        document.getElementById("cf_cholorine_bleach_c_change_value1").value = 'N/A';
        document.getElementById("cf_cholorine_bleach_c_change_value2").value = 'N/A';
    }
    else
    {
      if (cf_cholorine_bleach_c_change_cond == 1) 
    {
        document.getElementById("cf_cholorine_bleach_c_change_cond1").value = 2;
        document.getElementById("cf_cholorine_bleach_c_change_cond2").value = 2;

        document.getElementById("cf_cholorine_bleach_c_change_value1").value = cf_cholorine_bleach_c_change_value;
        document.getElementById("cf_cholorine_bleach_c_change_value2").value = 5;
    }

    else
    {
        document.getElementById("cf_cholorine_bleach_c_change_cond1").value = 2;
        document.getElementById("cf_cholorine_bleach_c_change_cond2").value = 2;

        document.getElementById("cf_cholorine_bleach_c_change_value1").value = 1;
        document.getElementById("cf_cholorine_bleach_c_change_value2").value = cf_cholorine_bleach_c_change_value;
    }

    }
    
}


function cf_cholorine_bleach_staining_condition()
{
    var cf_cholorine_bleach_staining_value = document.getElementById("cf_cholorine_bleach_staining_value").value;
    var cf_cholorine_bleach_staining_cond = document.getElementById("cf_cholorine_bleach_staining_cond").value;

     if (cf_cholorine_bleach_staining_value == 'NA') 
    {
        document.getElementById("cf_cholorine_bleach_staining_value1").value = 'N/A';
        document.getElementById("cf_cholorine_bleach_staining_value2").value = 'N/A';
    }
    else
    {
      if (cf_cholorine_bleach_staining_cond == 1) 
    {
        document.getElementById("cf_cholorine_bleach_staining_cond1").value = 2;
        document.getElementById("cf_cholorine_bleach_staining_cond2").value = 2;

        document.getElementById("cf_cholorine_bleach_staining_value1").value = cf_cholorine_bleach_staining_value;
        document.getElementById("cf_cholorine_bleach_staining_value2").value = 5;
    }

    else
    {
        document.getElementById("cf_cholorine_bleach_staining_cond1").value = 2;
        document.getElementById("cf_cholorine_bleach_staining_cond2").value = 2;

        document.getElementById("cf_cholorine_bleach_staining_value1").value = 1;
        document.getElementById("cf_cholorine_bleach_staining_value2").value = cf_cholorine_bleach_staining_value;
    }

    }

   
}


function cf_peroxide_bleach_c_change_condition()
{
    var cf_peroxide_bleach_c_change_value = document.getElementById("cf_peroxide_bleach_c_change_value").value;
    var cf_peroxide_bleach_c_change_cond = document.getElementById("cf_peroxide_bleach_c_change_cond").value;

    if (cf_peroxide_bleach_c_change_value == 'NA') 
    {
        document.getElementById("cf_peroxide_bleach_c_change_value1").value = 'N/A';
        document.getElementById("cf_peroxide_bleach_c_change_value2").value = 'N/A';
    }
    else
    {
      if (cf_peroxide_bleach_c_change_cond == 1) 
    {
        document.getElementById("cf_peroxide_bleach_c_change_cond1").value = 2;
        document.getElementById("cf_peroxide_bleach_c_change_cond2").value = 2;

        document.getElementById("cf_peroxide_bleach_c_change_value1").value = cf_peroxide_bleach_c_change_value;
        document.getElementById("cf_peroxide_bleach_c_change_value2").value = 5;
    }

    else
    {
        document.getElementById("cf_peroxide_bleach_c_change_cond1").value = 2;
        document.getElementById("cf_peroxide_bleach_c_change_cond2").value = 2;

        document.getElementById("cf_peroxide_bleach_c_change_value1").value = 1;
        document.getElementById("cf_peroxide_bleach_c_change_value2").value = cf_peroxide_bleach_c_change_value;
    }

    }

    
}


function cf_peroxide_bleach_staining_condition()
{
    var cf_peroxide_bleach_staining_value = document.getElementById("cf_peroxide_bleach_staining_value").value;
    var cf_peroxide_bleach_staining_cond = document.getElementById("cf_peroxide_bleach_staining_cond").value;

     if (cf_peroxide_bleach_staining_value == 'NA') 
    {
        document.getElementById("cf_peroxide_bleach_staining_value1").value = 'N/A';
        document.getElementById("cf_peroxide_bleach_staining_value2").value = 'N/A';
    }
    else
    {

    if (cf_peroxide_bleach_staining_cond == 1) 
    {
        document.getElementById("cf_peroxide_bleach_staining_cond1").value = 2;
        document.getElementById("cf_peroxide_bleach_staining_cond2").value = 2;

        document.getElementById("cf_peroxide_bleach_staining_value1").value = cf_peroxide_bleach_staining_value;
        document.getElementById("cf_peroxide_bleach_staining_value2").value = 5;
    }

    else
    {
        document.getElementById("cf_peroxide_bleach_staining_cond1").value = 2;
        document.getElementById("cf_peroxide_bleach_staining_cond2").value = 2;

        document.getElementById("cf_peroxide_bleach_staining_value1").value = 1;
        document.getElementById("cf_peroxide_bleach_staining_value2").value = cf_peroxide_bleach_staining_value;
    }

    }

}



function cross_staining_condition()
{
    var cross_staining_value = document.getElementById("cross_staining_value").value;
    var cross_staining_cond = document.getElementById("cross_staining_cond").value;

    if (cross_staining_value == 'NA') 
    {
        document.getElementById("cross_staining_value1").value = 'N/A';
        document.getElementById("cross_staining_value2").value = 'N/A';
    }

    else
    {
        if (cross_staining_cond == 1) 
    {
        document.getElementById("cross_staining_cond1").value = 2;
        document.getElementById("cross_staining_cond2").value = 2;

        document.getElementById("cross_staining_value1").value = cross_staining_value;
        document.getElementById("cross_staining_value2").value = 5;
    }

    else
    {
        document.getElementById("cross_staining_cond1").value = 2;
        document.getElementById("cross_staining_cond2").value = 2;

        document.getElementById("cross_staining_value1").value = 1;
        document.getElementById("cross_staining_value2").value = cross_staining_value;
    }

    }

  
}


// function cross_staining_tol_condition()
// {
//     var cross_staining_tol_value1 = parseFloat(document.getElementById("cross_staining_tol_value1").value);
//     var cross_staining_tol_value2 = parseFloat(document.getElementById("cross_staining_tol_value2").value);
//     var cross_staining_tol_cond = document.getElementById("cross_staining_tol_cond").value;

//     if (cross_staining_tol_cond == 1) 
//     {
//         document.getElementById("cross_staining_cond1").value = 2;
//         document.getElementById("cross_staining_cond2").value = 2;

//         //var tolarance = ((thread_epi_tol_value2 * thread_epi_tol_value1) / 100);
//         var tolarance =cross_staining_tol_value2;
//         var cross_staining_tol_cal_value2 = cross_staining_tol_value1 + tolarance;
//         var cross_staining_tol_cal_value1 = cross_staining_tol_value1 - tolarance;

//         document.getElementById("cross_staining_value1").value = cross_staining_tol_cal_value1.toFixed(5);
//         document.getElementById("cross_staining_value2").value = cross_staining_tol_cal_value2.toFixed(5);
//     }

//     if (cross_staining_tol_cond == 2)
//     {
//         document.getElementById("cross_staining_cond1").value = 2;
//         document.getElementById("cross_staining_cond2").value = 2;

//         //var tolarance = ((thread_epi_tol_value2 * thread_epi_tol_value1) / 100);
//         var tolarance = cross_staining_tol_value2;
//         var cross_staining_tol_cal_value2 = cross_staining_tol_value1 + tolarance;

//         document.getElementById("cross_staining_value1").value = cross_staining_tol_value1;
//         document.getElementById("cross_staining_value2").value = cross_staining_tol_cal_value2.toFixed(5);
//     }

//     if (cross_staining_tol_cond == 3)
//     {
//         document.getElementById("cross_staining_cond1").value = 2;
//         document.getElementById("cross_staining_cond2").value = 2;

//         //var tolarance = ((thread_epi_tol_value2 * thread_epi_tol_value1) / 100);
//         var tolarance = cross_staining_tol_value2;
//         var cross_staining_tol_cal_value2 = cross_staining_tol_value1 - tolarance;

//         document.getElementById("cross_staining_value2").value = cross_staining_tol_value1;
//         document.getElementById("cross_staining_value1").value = cross_staining_tol_cal_value2.toFixed(5);
//     }

//     if(isNaN(document.getElementById("cross_staining_tol_value1").value))
//     {
//         number_alert("cross_staining_tol_value1");
//         return false;
//     }

//     if(isNaN(document.getElementById("cross_staining_tol_value2").value))
//     {
//         number_alert("cross_staining_tol_value2");
//         return false;
//     }
// }

function water_absorption_condition()
{
    var water_absorption_value = document.getElementById("water_absorption_value").value;
    var water_absorption_cond = document.getElementById("water_absorption_cond").value;
    var water_absorption_unit = document.getElementById("water_absorption_unit").value;
    
    if (water_absorption_cond == 1) 
    {
        if (water_absorption_unit == "Sec")
        {
            document.getElementById("water_absorption_cond1").value = 2;
            document.getElementById("water_absorption_cond2").value = 2;

            document.getElementById("water_absorption_value1").value = water_absorption_value;
            document.getElementById("water_absorption_value2").value = 15;
        }

        else
        {
            document.getElementById("water_absorption_cond1").value = 2;
            document.getElementById("water_absorption_cond2").value = 2;

            document.getElementById("water_absorption_value1").value = water_absorption_value;
            document.getElementById("water_absorption_value2").value = 50;
        }
        
    }

    else
    {

        if (water_absorption_unit == "Sec")
        {
            document.getElementById("water_absorption_cond1").value = 2;
            document.getElementById("water_absorption_cond2").value = 2;

            document.getElementById("water_absorption_value1").value = 0;
            document.getElementById("water_absorption_value2").value = water_absorption_value;
        }

        else
        {
            document.getElementById("water_absorption_cond1").value = 2;
            document.getElementById("water_absorption_cond2").value = 2;

            document.getElementById("water_absorption_value1").value = 30;
            document.getElementById("water_absorption_value2").value = water_absorption_value;
        }

        
    }

}



function cf_artificial_light_c_change_condition()
{
    var cf_artificial_light_c_change_value = document.getElementById("cf_artificial_light_c_change_value").value;
    var cf_artificial_light_c_change_cond = document.getElementById("cf_artificial_light_c_change_cond").value;

    if (cf_artificial_light_c_change_cond == 1) 
    {
        document.getElementById("cf_artificial_light_c_change_cond1").value = 2;
        document.getElementById("cf_artificial_light_c_change_cond2").value = 2;

        document.getElementById("cf_artificial_light_c_change_value1").value = cf_artificial_light_c_change_value;
        document.getElementById("cf_artificial_light_c_change_value2").value = 5;
    }

    else
    {
        document.getElementById("cf_artificial_light_c_change_cond1").value = 2;
        document.getElementById("cf_artificial_light_c_change_cond2").value = 2;

        document.getElementById("cf_artificial_light_c_change_value1").value = 1;
        document.getElementById("cf_artificial_light_c_change_value2").value = cf_artificial_light_c_change_value;
    }

}


function spirality_condition()
{
    var spirality_value = document.getElementById("spirality_value").value;
    var spirality_cond = document.getElementById("spirality_cond").value;

    if (spirality_cond == 1) 
    {
        document.getElementById("spirality_cond1").value = 2;
        document.getElementById("spirality_cond2").value = 2;

        document.getElementById("spirality_value1").value = spirality_value;
        document.getElementById("spirality_value2").value = 0;
    }

    else
    {
        document.getElementById("spirality_cond1").value = 2;
        document.getElementById("spirality_cond2").value = 2;

        document.getElementById("spirality_value1").value = 0;
        document.getElementById("spirality_value2").value = spirality_value;
    }

}

function abrasion_resistance_lose_condition()
{
    var abrasion_resistance_lose_value = document.getElementById("abrasion_resistance_lose_value").value;
    var abrasion_resistance_lose_cond = document.getElementById("abrasion_resistance_lose_cond").value;

    if (abrasion_resistance_lose_cond == 1) 
    {
        document.getElementById("abrasion_resistance_lose_cond1").value = 2;
        document.getElementById("abrasion_resistance_lose_cond2").value = 2;

        document.getElementById("abrasion_resistance_lose_value1").value = abrasion_resistance_lose_value;
        document.getElementById("abrasion_resistance_lose_value2").value = 0;
    }

    else
    {
        document.getElementById("abrasion_resistance_lose_cond1").value = 2;
        document.getElementById("abrasion_resistance_lose_cond2").value = 2;

        document.getElementById("abrasion_resistance_lose_value1").value = 0;
        document.getElementById("abrasion_resistance_lose_value2").value = abrasion_resistance_lose_value;
    }

}


function durable_press_condition()
{
    var durable_press_value = document.getElementById("durable_press_value").value;
    var durable_press_cond = document.getElementById("durable_press_cond").value;

    if (durable_press_value == 'NA') 
    {
        document.getElementById("durable_press_value1").value = 'N/A';
        document.getElementById("durable_press_value2").value = 'N/A';
    }
    else
    {
      if (durable_press_cond == 1) 
    {
        document.getElementById("durable_press_cond1").value = 2;
        document.getElementById("durable_press_cond2").value = 2;

        document.getElementById("durable_press_value1").value = durable_press_value;
        document.getElementById("durable_press_value2").value = 5;
    }

    else
    {
        document.getElementById("durable_press_cond1").value = 2;
        document.getElementById("durable_press_cond2").value = 2;

        document.getElementById("durable_press_value1").value = 1;
        document.getElementById("durable_press_value2").value = durable_press_value;
    }

    }

    
}

function ironability_condition()
{
    var ironability_value = document.getElementById("ironability_value").value;
    var ironability_cond = document.getElementById("ironability_cond").value;

    if (ironability_value == 'NA') 
    {
        document.getElementById("ironability_value1").value = 'N/A';
        document.getElementById("ironability_value2").value = 'N/A';
    }
    else
    {
       if (ironability_cond == 1) 
    {
        document.getElementById("ironability_cond1").value = 2;
        document.getElementById("ironability_cond2").value = 2;

        document.getElementById("ironability_value1").value = ironability_value;
        document.getElementById("ironability_value2").value = 5;
    }

    else
    {
        document.getElementById("ironability_cond1").value = 2;
        document.getElementById("ironability_cond2").value = 2;

        document.getElementById("ironability_value1").value = 1;
        document.getElementById("ironability_value2").value = ironability_value;
    }

    }
   
}

function cf_artificial_light_condition()
{
    var cf_artificial_light_value = document.getElementById("cf_artificial_light_value").value;
    var cf_artificial_light_cond = document.getElementById("cf_artificial_light_cond").value;

    if (cf_artificial_light_value == 'NA') 
    {
        document.getElementById("cf_artificial_light_value1").value = 'N/A';
        document.getElementById("cf_artificial_light_value2").value = 'N/A';
    }
    else
    {
      if (cf_artificial_light_cond == 1) 
    {
        document.getElementById("cf_artificial_light_cond1").value = 2;
        document.getElementById("cf_artificial_light_cond2").value = 2;

        document.getElementById("cf_artificial_light_value1").value = cf_artificial_light_value;
        document.getElementById("cf_artificial_light_value2").value = 5;
    }

    else
    {
        document.getElementById("cf_artificial_light_cond1").value = 2;
        document.getElementById("cf_artificial_light_cond2").value = 2;

        document.getElementById("cf_artificial_light_value1").value = 1;
        document.getElementById("cf_artificial_light_value2").value = cf_artificial_light_value;
    }

    }
    
}

function moisture_content_condition()
{
    var condition = document.getElementById("moisture_content_cond1").value;

    if (condition == 1)
    {
        document.getElementById("moisture_content_cond1").value = 1;
        document.getElementById("moisture_content_cond2").value = 1;
    }

    else
    {
        document.getElementById("moisture_content_cond1").value = 2;
        document.getElementById("moisture_content_cond2").value = 2;
    }
}

function evaporation_rate_condition()
{
    var condition = document.getElementById("evaporation_rate_cond1").value;

    if (condition == 1)
    {
        document.getElementById("evaporation_rate_cond1").value = 1;
        document.getElementById("evaporation_rate_cond2").value = 1;
    }

    else
    {
        document.getElementById("evaporation_rate_cond1").value = 2;
        document.getElementById("evaporation_rate_cond2").value = 2;
    }
}



function send_data_of_define_standard_of_finishing_form_to_database(pp_version_id)
  {
      var formValidation = Form_Validation_For_Finishing();

      if(formValidation != false)
      {
          var formdata = new FormData(document.getElementById('finishing_variable_form'));

          $.ajax(
          {
              type: "POST",
              url: "add_finishing_variable_saving.php",// where you wanna post
              data: formdata,
              processData: false,
              contentType: false,
              error: function(jqXHR, textStatus, errorMessage) 
              {
                  alert(errorMessage);
              },
              success: function(data) 
              {
                  if (data == "Yes")
                  {
                      info_alert("Data not Submitted");
                  }
                  else
                  {
                      //alert(data);
                      var pp_no_id = document.getElementById("pp_no_id").value;
                      //var pp_version = document.getElementById("pp_version").value;
                      var pp_version_standard = document.getElementById("pp_version_standard").value;

                      $.ajax(
                      {
                          url: "view_standard_select.php",
                          method: "POST",
                          data: {pp_no_id: pp_no_id, pp_version: pp_version_id, pp_version_standard: pp_version_standard},
                          success:function(data)
                          {
                              //alert(data);
                              $('#retrieve_general_data').html(data);
                          }
                      });
                  }
              } 
          });
      }
  }











































































  function yarn_warp_tol()
  {
      var yarn_warp_tol_value = parseFloat(document.getElementById("yarn_warp_tol_value").value);
      var yarn_warp_tol_positive = parseFloat(document.getElementById("yarn_warp_tol_positive").value);
      var yarn_warp_tol_negative = document.getElementById("yarn_warp_tol_negative").value;

      document.getElementById("yarn_warp_cond1").value = 2;
      document.getElementById("yarn_warp_cond2").value = 2;

      var positive_tolarance = ( (yarn_warp_tol_value * yarn_warp_tol_positive) / 100 );
      var negative_tolarance = ( (yarn_warp_tol_value * yarn_warp_tol_negative) / 100 );

      var yarn_warp_tol_cal_value2 = yarn_warp_tol_value + positive_tolarance;
      var yarn_warp_tol_cal_value1 = yarn_warp_tol_value - negative_tolarance;

      document.getElementById("yarn_warp_value1").value = yarn_warp_tol_cal_value1.toFixed(5);
      document.getElementById("yarn_warp_value2").value = yarn_warp_tol_cal_value2.toFixed(5);
      

      if(isNaN(document.getElementById("yarn_warp_tol_positive").value))
      {
          number_alert("yarn_warp_tol_positive");
          return false;
      }

      if(isNaN(document.getElementById("yarn_warp_tol_negative").value))
      {
          number_alert("yarn_warp_tol_negative");
          return false;
      }
  }

  function yarn_weft_tol()
  {
      var yarn_weft_tol_value = parseFloat(document.getElementById("yarn_weft_tol_value").value);
      var yarn_weft_tol_positive = parseFloat(document.getElementById("yarn_weft_tol_positive").value);
      var yarn_weft_tol_negative = document.getElementById("yarn_weft_tol_negative").value;

      document.getElementById("yarn_weft_cond1").value = 2;
      document.getElementById("yarn_weft_cond2").value = 2;

      var positive_tolarance = ( (yarn_weft_tol_value * yarn_weft_tol_positive) / 100 );
      var negative_tolarance = ( (yarn_weft_tol_value * yarn_weft_tol_negative) / 100 );

      var yarn_weft_tol_cal_value2 = yarn_weft_tol_value + positive_tolarance;
      var yarn_weft_tol_cal_value1 = yarn_weft_tol_value - negative_tolarance;

      document.getElementById("yarn_weft_value1").value = yarn_weft_tol_cal_value1.toFixed(5);
      document.getElementById("yarn_weft_value2").value = yarn_weft_tol_cal_value2.toFixed(5);
      

      if(isNaN(document.getElementById("yarn_weft_tol_positive").value))
      {
          number_alert("yarn_weft_tol_positive");
          return false;
      }

      if(isNaN(document.getElementById("yarn_weft_tol_negative").value))
      {
          number_alert("yarn_weft_tol_negative");
          return false;
      }
  }

  

  function thread_epi_tol_cal_1()
  {
      // var thread_epi_tol_value1 = parseFloat(document.getElementById("thread_epi_tol_value1").value);
      // var thread_epi_tol_value2 = parseFloat(document.getElementById("thread_epi_tol_value2").value);

      // if(isNaN(document.getElementById("thread_epi_tol_value1").value))
      // {
      //     number_alert("thread_epi_tol_value1");
      //     return false;
      // }

      // if(isNaN(document.getElementById("thread_epi_tol_value2").value))
      // {
      //     number_alert("thread_epi_tol_value2");
      //     return false;
      // }

      // document.getElementById("thread_epi_cond1").value = 1;
      // document.getElementById("thread_epi_cond2").value = 1;

      // var tolarance = (thread_epi_tol_value2 / 100);
      // var thread_epi_tol_cal_value2 = thread_epi_tol_value1 + tolarance;
      // var thread_epi_tol_cal_value1 = thread_epi_tol_value1 - tolarance;

      // document.getElementById("thread_epi_value1").value = thread_epi_tol_cal_value1.toFixed(5);
      // document.getElementById("thread_epi_value2").value = thread_epi_tol_cal_value2.toFixed(5);

      var thread_epi_tol_value1 = parseFloat(document.getElementById("thread_epi_tol_value1").value);
      var thread_epi_tol_value2 = parseFloat(document.getElementById("thread_epi_tol_value2").value);
      var thread_epi_tol_cond = document.getElementById("thread_epi_tol_cond").value;

      if (thread_epi_tol_cond == 1) 
      {
          document.getElementById("thread_epi_cond1").value = 2;
          document.getElementById("thread_epi_cond2").value = 2;

          //var tolarance = ((thread_epi_tol_value2 * thread_epi_tol_value1) / 100);
          var tolarance = thread_epi_tol_value2;
          var thread_epi_tol_cal_value2 = thread_epi_tol_value1 + tolarance;
          var thread_epi_tol_cal_value1 = thread_epi_tol_value1 - tolarance;

          document.getElementById("thread_epi_value1").value = thread_epi_tol_cal_value1.toFixed(5);
          document.getElementById("thread_epi_value2").value = thread_epi_tol_cal_value2.toFixed(5);
      }

      if (thread_epi_tol_cond == 2)
      {
          document.getElementById("thread_epi_cond1").value = 2;
          document.getElementById("thread_epi_cond2").value = 2;

          //var tolarance = ((thread_epi_tol_value2 * thread_epi_tol_value1) / 100);
          var tolarance = thread_epi_tol_value2;
          var thread_epi_tol_cal_value2 = thread_epi_tol_value1 + tolarance;

          document.getElementById("thread_epi_value1").value = thread_epi_tol_value1;
          document.getElementById("thread_epi_value2").value = thread_epi_tol_cal_value2.toFixed(5);
      }

      if (thread_epi_tol_cond == 3)
      {
          document.getElementById("thread_epi_cond1").value = 2;
          document.getElementById("thread_epi_cond2").value = 2;

          //var tolarance = ((thread_epi_tol_value2 * thread_epi_tol_value1) / 100);
          var tolarance = thread_epi_tol_value2;
          var thread_epi_tol_cal_value2 = thread_epi_tol_value1 - tolarance;

          document.getElementById("thread_epi_value2").value = thread_epi_tol_value1;
          document.getElementById("thread_epi_value1").value = thread_epi_tol_cal_value2.toFixed(5);
      }

      if(isNaN(document.getElementById("thread_epi_tol_value1").value))
      {
          number_alert("thread_epi_tol_value1");
          return false;
      }

      if(isNaN(document.getElementById("thread_epi_tol_value2").value))
      {
          number_alert("thread_epi_tol_value2");
          return false;
      }
  }


  function thread_epi_tol_cal_2()
  {
      var thread_epi_tol_value1 = parseFloat(document.getElementById("thread_epi_tol_value1").value);
      var thread_epi_tol_value2 = parseFloat(document.getElementById("thread_epi_tol_value2").value);
      var thread_epi_tol_cond = document.getElementById("thread_epi_tol_cond").value;

      if (thread_epi_tol_cond == 1) 
      {
          document.getElementById("thread_epi_cond1").value = 2;
          document.getElementById("thread_epi_cond2").value = 2;

          //var tolarance = ((thread_epi_tol_value2 * thread_epi_tol_value1) / 100);
          var tolarance = thread_epi_tol_value2;
          var thread_epi_tol_cal_value2 = thread_epi_tol_value1 + tolarance;
          var thread_epi_tol_cal_value1 = thread_epi_tol_value1 - tolarance;

          document.getElementById("thread_epi_value1").value = thread_epi_tol_cal_value1.toFixed(5);
          document.getElementById("thread_epi_value2").value = thread_epi_tol_cal_value2.toFixed(5);
      }

      if (thread_epi_tol_cond == 2)
      {
          document.getElementById("thread_epi_cond1").value = 2;
          document.getElementById("thread_epi_cond2").value = 2;

          //var tolarance = ((thread_epi_tol_value2 * thread_epi_tol_value1) / 100);
          var tolarance = thread_epi_tol_value2;
          var thread_epi_tol_cal_value2 = thread_epi_tol_value1 + tolarance;

          document.getElementById("thread_epi_value1").value = thread_epi_tol_value1;
          document.getElementById("thread_epi_value2").value = thread_epi_tol_cal_value2.toFixed(5);
      }

      if (thread_epi_tol_cond == 3)
      {
          document.getElementById("thread_epi_cond1").value = 2;
          document.getElementById("thread_epi_cond2").value = 2;

          //var tolarance = ((thread_epi_tol_value2 * thread_epi_tol_value1) / 100);
          var tolarance = thread_epi_tol_value2;
          var thread_epi_tol_cal_value2 = thread_epi_tol_value1 - tolarance;

          document.getElementById("thread_epi_value2").value = thread_epi_tol_value1;
          document.getElementById("thread_epi_value1").value = thread_epi_tol_cal_value2.toFixed(5);
      }

      if(isNaN(document.getElementById("thread_epi_tol_value1").value))
      {
          number_alert("thread_epi_tol_value1");
          return false;
      }

      if(isNaN(document.getElementById("thread_epi_tol_value2").value))
      {
          number_alert("thread_epi_tol_value2");
          return false;
      }
  }

  function thread_epi_tol_condition()
  {
      var thread_epi_tol_value1 = parseFloat(document.getElementById("thread_epi_tol_value1").value);
      var thread_epi_tol_value2 = parseFloat(document.getElementById("thread_epi_tol_value2").value);
      var thread_epi_tol_cond = document.getElementById("thread_epi_tol_cond").value;

      if (thread_epi_tol_cond == 1) 
      {
          document.getElementById("thread_epi_cond1").value = 2;
          document.getElementById("thread_epi_cond2").value = 2;

          //var tolarance = ((thread_epi_tol_value2 * thread_epi_tol_value1) / 100);
          var tolarance = thread_epi_tol_value2;
          var thread_epi_tol_cal_value2 = thread_epi_tol_value1 + tolarance;
          var thread_epi_tol_cal_value1 = thread_epi_tol_value1 - tolarance;

          document.getElementById("thread_epi_value1").value = thread_epi_tol_cal_value1.toFixed(5);
          document.getElementById("thread_epi_value2").value = thread_epi_tol_cal_value2.toFixed(5);
      }

      if (thread_epi_tol_cond == 2)
      {
          document.getElementById("thread_epi_cond1").value = 2;
          document.getElementById("thread_epi_cond2").value = 2;

          //var tolarance = ((thread_epi_tol_value2 * thread_epi_tol_value1) / 100);
          var tolarance = thread_epi_tol_value2;
          var thread_epi_tol_cal_value2 = thread_epi_tol_value1 + tolarance;

          document.getElementById("thread_epi_value1").value = thread_epi_tol_value1;
          document.getElementById("thread_epi_value2").value = thread_epi_tol_cal_value2.toFixed(5);
      }

      if (thread_epi_tol_cond == 3)
      {
          document.getElementById("thread_epi_cond1").value = 2;
          document.getElementById("thread_epi_cond2").value = 2;

          //var tolarance = ((thread_epi_tol_value2 * thread_epi_tol_value1) / 100);
          var tolarance = thread_epi_tol_value2;
          var thread_epi_tol_cal_value2 = thread_epi_tol_value1 - tolarance;

          document.getElementById("thread_epi_value2").value = thread_epi_tol_value1;
          document.getElementById("thread_epi_value1").value = thread_epi_tol_cal_value2.toFixed(5);
      }

      if(isNaN(document.getElementById("thread_epi_tol_value1").value))
      {
          number_alert("thread_epi_tol_value1");
          return false;
      }

      if(isNaN(document.getElementById("thread_epi_tol_value2").value))
      {
          number_alert("thread_epi_tol_value2");
          return false;
      }
  }


  function thread_ppi_tol_cal_1()
  {
      // var thread_ppi_tol_value1 = parseFloat(document.getElementById("thread_ppi_tol_value1").value);
      // var thread_ppi_tol_value2 = parseFloat(document.getElementById("thread_ppi_tol_value2").value);

      // if(isNaN(document.getElementById("thread_ppi_tol_value1").value))
      // {
      //     number_alert("thread_ppi_tol_value1");
      //     return false;
      // }

      // if(isNaN(document.getElementById("thread_ppi_tol_value2").value))
      // {
      //     number_alert("thread_ppi_tol_value2");
      //     return false;
      // }

      // document.getElementById("thread_ppi_cond1").value = 1;
      // document.getElementById("thread_ppi_cond2").value = 1;

      // var tolarance = (thread_ppi_tol_value2 / 100);
      // var thread_ppi_tol_cal_value2 = thread_ppi_tol_value1 + tolarance;
      // var thread_ppi_tol_cal_value1 = thread_ppi_tol_value1 - tolarance;

      // document.getElementById("thread_ppi_value1").value = thread_ppi_tol_cal_value1.toFixed(5);
      // document.getElementById("thread_ppi_value2").value = thread_ppi_tol_cal_value2.toFixed(5);


      var thread_ppi_tol_value1 = parseFloat(document.getElementById("thread_ppi_tol_value1").value);
      var thread_ppi_tol_value2 = parseFloat(document.getElementById("thread_ppi_tol_value2").value);
      var thread_ppi_tol_cond = document.getElementById("thread_ppi_tol_cond").value;

      if (thread_ppi_tol_cond == 1) 
      {
          document.getElementById("thread_ppi_cond1").value = 2;
          document.getElementById("thread_ppi_cond2").value = 2;

          //var tolarance = ((thread_ppi_tol_value2 * thread_ppi_tol_value1) / 100);
          var tolarance = thread_ppi_tol_value2;
          var thread_ppi_tol_cal_value2 = thread_ppi_tol_value1 + tolarance;
          var thread_ppi_tol_cal_value1 = thread_ppi_tol_value1 - tolarance;

          document.getElementById("thread_ppi_value1").value = thread_ppi_tol_cal_value1.toFixed(5);
          document.getElementById("thread_ppi_value2").value = thread_ppi_tol_cal_value2.toFixed(5);
      }

      if (thread_ppi_tol_cond == 2)
      {
          document.getElementById("thread_ppi_cond1").value = 2;
          document.getElementById("thread_ppi_cond2").value = 2;

          //var tolarance = ((thread_ppi_tol_value2 * thread_ppi_tol_value1) / 100);
          var tolarance = thread_ppi_tol_value2;
          var thread_ppi_tol_cal_value2 = thread_ppi_tol_value1 + tolarance;

          document.getElementById("thread_ppi_value1").value = thread_ppi_tol_value1;
          document.getElementById("thread_ppi_value2").value = thread_ppi_tol_cal_value2.toFixed(5);
      }

      if (thread_ppi_tol_cond == 3)
      {
          document.getElementById("thread_ppi_cond1").value = 2;
          document.getElementById("thread_ppi_cond2").value = 2;

          //var tolarance = ((thread_ppi_tol_value2 * thread_ppi_tol_value1) / 100);
          var tolarance = thread_ppi_tol_value2;
          var thread_ppi_tol_cal_value2 = thread_ppi_tol_value1 - tolarance;

          document.getElementById("thread_ppi_value2").value = thread_ppi_tol_value1;
          document.getElementById("thread_ppi_value1").value = thread_ppi_tol_cal_value2.toFixed(5);
      }

      if(isNaN(document.getElementById("thread_ppi_tol_value1").value))
      {
          number_alert("thread_ppi_tol_value1");
          return false;
      }

      if(isNaN(document.getElementById("thread_ppi_tol_value2").value))
      {
          number_alert("thread_ppi_tol_value2");
          return false;
      }

  }


  function thread_ppi_tol_cal_2()
  {
      var thread_ppi_tol_value1 = parseFloat(document.getElementById("thread_ppi_tol_value1").value);
      var thread_ppi_tol_value2 = parseFloat(document.getElementById("thread_ppi_tol_value2").value);
      var thread_ppi_tol_cond = document.getElementById("thread_ppi_tol_cond").value;

      if (thread_ppi_tol_cond == 1) 
      {
          document.getElementById("thread_ppi_cond1").value = 2;
          document.getElementById("thread_ppi_cond2").value = 2;

          //var tolarance = ((thread_ppi_tol_value2 * thread_ppi_tol_value1) / 100);
          var tolarance = thread_ppi_tol_value2;
          var thread_ppi_tol_cal_value2 = thread_ppi_tol_value1 + tolarance;
          var thread_ppi_tol_cal_value1 = thread_ppi_tol_value1 - tolarance;

          document.getElementById("thread_ppi_value1").value = thread_ppi_tol_cal_value1.toFixed(5);
          document.getElementById("thread_ppi_value2").value = thread_ppi_tol_cal_value2.toFixed(5);
      }

      if (thread_ppi_tol_cond == 2)
      {
          document.getElementById("thread_ppi_cond1").value = 2;
          document.getElementById("thread_ppi_cond2").value = 2;

          //var tolarance = ((thread_ppi_tol_value2 * thread_ppi_tol_value1) / 100);
          var tolarance = thread_ppi_tol_value2;
          var thread_ppi_tol_cal_value2 = thread_ppi_tol_value1 + tolarance;

          document.getElementById("thread_ppi_value1").value = thread_ppi_tol_value1;
          document.getElementById("thread_ppi_value2").value = thread_ppi_tol_cal_value2.toFixed(5);
      }

      if (thread_ppi_tol_cond == 3)
      {
          document.getElementById("thread_ppi_cond1").value = 2;
          document.getElementById("thread_ppi_cond2").value = 2;

          //var tolarance = ((thread_ppi_tol_value2 * thread_ppi_tol_value1) / 100);
          var tolarance = thread_ppi_tol_value2;
          var thread_ppi_tol_cal_value2 = thread_ppi_tol_value1 - tolarance;

          document.getElementById("thread_ppi_value2").value = thread_ppi_tol_value1;
          document.getElementById("thread_ppi_value1").value = thread_ppi_tol_cal_value2.toFixed(5);
      }

      if(isNaN(document.getElementById("thread_ppi_tol_value1").value))
      {
          number_alert("thread_ppi_tol_value1");
          return false;
      }

      if(isNaN(document.getElementById("thread_ppi_tol_value2").value))
      {
          number_alert("thread_ppi_tol_value2");
          return false;
      }
  }


  function thread_ppi_tol_condition()
  {
      var thread_ppi_tol_value1 = parseFloat(document.getElementById("thread_ppi_tol_value1").value);
      var thread_ppi_tol_value2 = parseFloat(document.getElementById("thread_ppi_tol_value2").value);
      var thread_ppi_tol_cond = document.getElementById("thread_ppi_tol_cond").value;

      if (thread_ppi_tol_cond == 1) 
      {
          document.getElementById("thread_ppi_cond1").value = 2;
          document.getElementById("thread_ppi_cond2").value = 2;

          //var tolarance = ((thread_ppi_tol_value2 * thread_ppi_tol_value1) / 100);
          var tolarance = thread_ppi_tol_value2;
          var thread_ppi_tol_cal_value2 = thread_ppi_tol_value1 + tolarance;
          var thread_ppi_tol_cal_value1 = thread_ppi_tol_value1 - tolarance;

          document.getElementById("thread_ppi_value1").value = thread_ppi_tol_cal_value1.toFixed(5);
          document.getElementById("thread_ppi_value2").value = thread_ppi_tol_cal_value2.toFixed(5);
      }

      if (thread_ppi_tol_cond == 2)
      {
          document.getElementById("thread_ppi_cond1").value = 2;
          document.getElementById("thread_ppi_cond2").value = 2;

          //var tolarance = ((thread_ppi_tol_value2 * thread_ppi_tol_value1) / 100);
          var tolarance = thread_ppi_tol_value2;
          var thread_ppi_tol_cal_value2 = thread_ppi_tol_value1 + tolarance;

          document.getElementById("thread_ppi_value1").value = thread_ppi_tol_value1;
          document.getElementById("thread_ppi_value2").value = thread_ppi_tol_cal_value2.toFixed(5);
      }

      if (thread_ppi_tol_cond == 3)
      {
          document.getElementById("thread_ppi_cond1").value = 2;
          document.getElementById("thread_ppi_cond2").value = 2;

          //var tolarance = ((thread_ppi_tol_value2 * thread_ppi_tol_value1) / 100);
          var tolarance = thread_ppi_tol_value2;
          var thread_ppi_tol_cal_value2 = thread_ppi_tol_value1 - tolarance;

          document.getElementById("thread_ppi_value2").value = thread_ppi_tol_value1;
          document.getElementById("thread_ppi_value1").value = thread_ppi_tol_cal_value2.toFixed(5);
      }

      if(isNaN(document.getElementById("thread_ppi_tol_value1").value))
      {
          number_alert("thread_ppi_tol_value1");
          return false;
      }

      if(isNaN(document.getElementById("thread_ppi_tol_value2").value))
      {
          number_alert("thread_ppi_tol_value2");
          return false;
      }
  }


  // function gsm_warp_tol_cal_1()
  // {
  //     // var gsm_warp_tol_value1 = parseFloat(document.getElementById("gsm_warp_tol_value1").value);
  //     // var gsm_warp_tol_value2 = parseFloat(document.getElementById("gsm_warp_tol_value2").value);

  //     // if(isNaN(document.getElementById("gsm_warp_tol_value1").value))
  //     // {
  //     //     number_alert("gsm_warp_tol_value1");
  //     //     return false;
  //     // }

  //     // if(isNaN(document.getElementById("gsm_warp_tol_value2").value))
  //     // {
  //     //     number_alert("gsm_warp_tol_value2");
  //     //     return false;
  //     // }

  //     // document.getElementById("gsm_warp_cond1").value = 1;
  //     // document.getElementById("gsm_warp_cond2").value = 1;

  //     // var tolarance = (gsm_warp_tol_value2 / 100);
  //     // var gsm_warp_tol_cal_value2 = gsm_warp_tol_value1 + tolarance;
  //     // var gsm_warp_tol_cal_value1 = gsm_warp_tol_value1 - tolarance;

  //     // document.getElementById("gsm_warp_value1").value = gsm_warp_tol_cal_value1.toFixed(5);
  //     // document.getElementById("gsm_warp_value2").value = gsm_warp_tol_cal_value2.toFixed(5);


  //     var gsm_warp_tol_value = parseFloat(document.getElementById("gsm_warp_tol_value").value);
  //     var gsm_warp_tol_positive = parseFloat(document.getElementById("gsm_warp_tol_positive").value);
  //     var gsm_warp_tol_negative = document.getElementById("gsm_warp_tol_negative").value;

  //     document.getElementById("gsm_warp_cond1").value = 2;
  //     document.getElementById("gsm_warp_cond2").value = 2;

  //     var gsm_warp_tol_cal_value2 = gsm_warp_tol_value + gsm_warp_tol_positive;
  //     var gsm_warp_tol_cal_value1 = gsm_warp_tol_value - gsm_warp_tol_negative;

  //     document.getElementById("gsm_warp_value1").value = gsm_warp_tol_cal_value1.toFixed(5);
  //     document.getElementById("gsm_warp_value2").value = gsm_warp_tol_cal_value2.toFixed(5);
      

  //     if(isNaN(document.getElementById("gsm_warp_tol_positive").value))
  //     {
  //         number_alert("gsm_warp_tol_positive");
  //         return false;
  //     }

  //     if(isNaN(document.getElementById("gsm_warp_tol_negative").value))
  //     {
  //         number_alert("gsm_warp_tol_negative");
  //         return false;
  //     }

  // }


  function gsm_warp_tol()
  {
      var gsm_warp_tol_value = parseFloat(document.getElementById("gsm_warp_tol_value").value);
      var gsm_warp_tol_positive = parseFloat(document.getElementById("gsm_warp_tol_positive").value);
      var gsm_warp_tol_negative = document.getElementById("gsm_warp_tol_negative").value;

      document.getElementById("gsm_warp_cond1").value = 2;
      document.getElementById("gsm_warp_cond2").value = 2;

      var positive_tolarance = ( (gsm_warp_tol_value * gsm_warp_tol_positive) / 100 );
      var negative_tolarance = ( (gsm_warp_tol_value * gsm_warp_tol_negative) / 100 );

      var gsm_warp_tol_cal_value2 = gsm_warp_tol_value + positive_tolarance;
      var gsm_warp_tol_cal_value1 = gsm_warp_tol_value - negative_tolarance;

      document.getElementById("gsm_warp_value1").value = gsm_warp_tol_cal_value1.toFixed(5);
      document.getElementById("gsm_warp_value2").value = gsm_warp_tol_cal_value2.toFixed(5);
      

      if(isNaN(document.getElementById("gsm_warp_tol_positive").value))
      {
          number_alert("gsm_warp_tol_positive");
          return false;
      }

      if(isNaN(document.getElementById("gsm_warp_tol_negative").value))
      {
          number_alert("gsm_warp_tol_negative");
          return false;
      }
  }

  function greige_width_tol_condition()
  {
      var greige_width_tol_value1 = parseFloat(document.getElementById("greige_width_tol_value1").value);
      var greige_width_tol_value2 = parseFloat(document.getElementById("greige_width_tol_value2").value);
      var greige_width_tol_cond = document.getElementById("greige_width_tol_cond").value;

      if (greige_width_tol_cond == 1) 
      {
          document.getElementById("greige_width_cond1").value = 2;
          document.getElementById("greige_width_cond2").value = 2;

          //var tolarance = ((greige_width_tol_value2 * greige_width_tol_value1) / 100);
          var tolarance = greige_width_tol_value2;
          var greige_width_tol_cal_value2 = greige_width_tol_value1 + tolarance;
          var greige_width_tol_cal_value1 = greige_width_tol_value1 - tolarance;

          document.getElementById("greige_width_value1").value = greige_width_tol_cal_value1.toFixed(5);
          document.getElementById("greige_width_value2").value = greige_width_tol_cal_value2.toFixed(5);
      }

      if (greige_width_tol_cond == 2)
      {
          document.getElementById("greige_width_cond1").value = 2;
          document.getElementById("greige_width_cond2").value = 2;

          //var tolarance = ((greige_width_tol_value2 * greige_width_tol_value1) / 100);
          var tolarance = greige_width_tol_value2;
          var greige_width_tol_cal_value2 = greige_width_tol_value1 + tolarance;

          document.getElementById("greige_width_value1").value = greige_width_tol_value1;
          document.getElementById("greige_width_value2").value = greige_width_tol_cal_value2.toFixed(5);
      }

      if (greige_width_tol_cond == 3)
      {
          document.getElementById("greige_width_cond1").value = 2;
          document.getElementById("greige_width_cond2").value = 2;

          //var tolarance = ((greige_width_tol_value2 * greige_width_tol_value1) / 100);
          var tolarance = greige_width_tol_value2;
          var greige_width_tol_cal_value2 = greige_width_tol_value1 - tolarance;

          document.getElementById("greige_width_value2").value = greige_width_tol_value1;
          document.getElementById("greige_width_value1").value = greige_width_tol_cal_value2.toFixed(5);
      }

      if(isNaN(document.getElementById("greige_width_tol_value1").value))
      {
          number_alert("greige_width_tol_value1");
          return false;
      }

      if(isNaN(document.getElementById("greige_width_tol_value2").value))
      {
          number_alert("greige_width_tol_value2");
          return false;
      }
  }


  function greige_width_tol_cal_1()
  {
      var greige_width_tol_value1 = parseFloat(document.getElementById("greige_width_tol_value1").value);
      var greige_width_tol_value2 = parseFloat(document.getElementById("greige_width_tol_value2").value);
      var greige_width_tol_cond = document.getElementById("greige_width_tol_cond").value;

      if (greige_width_tol_cond == 1) 
      {
          document.getElementById("greige_width_cond1").value = 2;
          document.getElementById("greige_width_cond2").value = 2;

          //var tolarance = ((greige_width_tol_value2 * greige_width_tol_value1) / 100);
          var tolarance = greige_width_tol_value2;
          var greige_width_tol_cal_value2 = greige_width_tol_value1 + tolarance;
          var greige_width_tol_cal_value1 = greige_width_tol_value1 - tolarance;

          document.getElementById("greige_width_value1").value = greige_width_tol_cal_value1.toFixed(5);
          document.getElementById("greige_width_value2").value = greige_width_tol_cal_value2.toFixed(5);
      }

      if (greige_width_tol_cond == 2)
      {
          document.getElementById("greige_width_cond1").value = 2;
          document.getElementById("greige_width_cond2").value = 2;

          //var tolarance = ((greige_width_tol_value2 * greige_width_tol_value1) / 100);
          var tolarance = greige_width_tol_value2;
          var greige_width_tol_cal_value2 = greige_width_tol_value1 + tolarance;

          document.getElementById("greige_width_value1").value = greige_width_tol_value1;
          document.getElementById("greige_width_value2").value = greige_width_tol_cal_value2.toFixed(5);
      }

      if (greige_width_tol_cond == 3)
      {
          document.getElementById("greige_width_cond1").value = 2;
          document.getElementById("greige_width_cond2").value = 2;

          //var tolarance = ((greige_width_tol_value2 * greige_width_tol_value1) / 100);
          var tolarance = greige_width_tol_value2;
          var greige_width_tol_cal_value2 = greige_width_tol_value1 - tolarance;

          document.getElementById("greige_width_value2").value = greige_width_tol_value1;
          document.getElementById("greige_width_value1").value = greige_width_tol_cal_value2.toFixed(5);
      }

      if(isNaN(document.getElementById("greige_width_tol_value1").value))
      {
          number_alert("greige_width_tol_value1");
          return false;
      }

      if(isNaN(document.getElementById("greige_width_tol_value2").value))
      {
          number_alert("greige_width_tol_value2");
          return false;
      }
  }


  function greige_width_tol_cal_2()
  {
      var greige_width_tol_value1 = parseFloat(document.getElementById("greige_width_tol_value1").value);
      var greige_width_tol_value2 = parseFloat(document.getElementById("greige_width_tol_value2").value);
      var greige_width_tol_cond = document.getElementById("greige_width_tol_cond").value;

      if (greige_width_tol_cond == 1) 
      {
          document.getElementById("greige_width_cond1").value = 2;
          document.getElementById("greige_width_cond2").value = 2;

          //var tolarance = ((greige_width_tol_value2 * greige_width_tol_value1) / 100);
          var tolarance = greige_width_tol_value2;
          var greige_width_tol_cal_value2 = greige_width_tol_value1 + tolarance;
          var greige_width_tol_cal_value1 = greige_width_tol_value1 - tolarance;

          document.getElementById("greige_width_value1").value = greige_width_tol_cal_value1.toFixed(5);
          document.getElementById("greige_width_value2").value = greige_width_tol_cal_value2.toFixed(5);
      }

      if (greige_width_tol_cond == 2)
      {
          document.getElementById("greige_width_cond1").value = 2;
          document.getElementById("greige_width_cond2").value = 2;

          //var tolarance = ((greige_width_tol_value2 * greige_width_tol_value1) / 100);
          var tolarance = greige_width_tol_value2;
          var greige_width_tol_cal_value2 = greige_width_tol_value1 + tolarance;

          document.getElementById("greige_width_value1").value = greige_width_tol_value1;
          document.getElementById("greige_width_value2").value = greige_width_tol_cal_value2.toFixed(5);
      }

      if (greige_width_tol_cond == 3)
      {
          document.getElementById("greige_width_cond1").value = 2;
          document.getElementById("greige_width_cond2").value = 2;

          //var tolarance = ((greige_width_tol_value2 * greige_width_tol_value1) / 100);
          var tolarance = greige_width_tol_value2;
          var greige_width_tol_cal_value2 = greige_width_tol_value1 - tolarance;

          document.getElementById("greige_width_value2").value = greige_width_tol_value1;
          document.getElementById("greige_width_value1").value = greige_width_tol_cal_value2.toFixed(5);
      }

      if(isNaN(document.getElementById("greige_width_tol_value1").value))
      {
          number_alert("greige_width_tol_value1");
          return false;
      }

      if(isNaN(document.getElementById("greige_width_tol_value2").value))
      {
          number_alert("greige_width_tol_value2");
          return false;
      }
  }
  

  function fiber_warp_tol_cal_1()
  {
      // var fiber_warp_tol_value1 = parseFloat(document.getElementById("fiber_warp_tol_value1").value);
      // var fiber_warp_tol_value2 = parseFloat(document.getElementById("fiber_warp_tol_value2").value);

      // if(isNaN(document.getElementById("fiber_warp_tol_value1").value))
      // {
      //     number_alert("fiber_warp_tol_value1");
      //     return false;
      // }

      // if(isNaN(document.getElementById("fiber_warp_tol_value2").value))
      // {
      //     number_alert("fiber_warp_tol_value2");
      //     return false;
      // }

      // document.getElementById("fiber_warp_cond1").value = 1;
      // document.getElementById("fiber_warp_cond2").value = 1;

      // var tolarance = (fiber_warp_tol_value2 / 100);
      // var fiber_warp_tol_cal_value2 = fiber_warp_tol_value1 + tolarance;
      // var fiber_warp_tol_cal_value1 = fiber_warp_tol_value1 - tolarance;

      // document.getElementById("fiber_warp_value1").value = fiber_warp_tol_cal_value1.toFixed(5);
      // document.getElementById("fiber_warp_value2").value = fiber_warp_tol_cal_value2.toFixed(5);

      var fiber_warp_tol_value1 = parseFloat(document.getElementById("fiber_warp_tol_value1").value);
      var fiber_warp_tol_value2 = parseFloat(document.getElementById("fiber_warp_tol_value2").value);
      var fiber_warp_tol_cond = document.getElementById("fiber_warp_tol_cond").value;

      if (fiber_warp_tol_cond == 1) 
      {
          document.getElementById("fiber_warp_cond1").value = 2;
          document.getElementById("fiber_warp_cond2").value = 2;

          var tolarance = (fiber_warp_tol_value2 / 100);
          var fiber_warp_tol_cal_value2 = fiber_warp_tol_value1 + tolarance;
          var fiber_warp_tol_cal_value1 = fiber_warp_tol_value1 - tolarance;

          document.getElementById("fiber_warp_value1").value = fiber_warp_tol_cal_value1.toFixed(5);
          document.getElementById("fiber_warp_value2").value = fiber_warp_tol_cal_value2.toFixed(5);
      }

      if (fiber_warp_tol_cond == 2)
      {
          document.getElementById("fiber_warp_cond1").value = 2;
          document.getElementById("fiber_warp_cond2").value = 2;

          var tolarance = (fiber_warp_tol_value2 / 100);
          var fiber_warp_tol_cal_value2 = fiber_warp_tol_value1 + tolarance;

          document.getElementById("fiber_warp_value1").value = fiber_warp_tol_value1;
          document.getElementById("fiber_warp_value2").value = fiber_warp_tol_cal_value2.toFixed(5);
      }

      if (fiber_warp_tol_cond == 3)
      {
          document.getElementById("fiber_warp_cond1").value = 2;
          document.getElementById("fiber_warp_cond2").value = 2;

          var tolarance = (fiber_warp_tol_value2 / 100);
          var fiber_warp_tol_cal_value2 = fiber_warp_tol_value1 - tolarance;

          document.getElementById("fiber_warp_value2").value = fiber_warp_tol_value1;
          document.getElementById("fiber_warp_value1").value = fiber_warp_tol_cal_value2.toFixed(5);
      }

      if(isNaN(document.getElementById("fiber_warp_tol_value1").value))
      {
          number_alert("fiber_warp_tol_value1");
          return false;
      }

      if(isNaN(document.getElementById("fiber_warp_tol_value2").value))
      {
          number_alert("fiber_warp_tol_value2");
          return false;
      }

  }


  function fiber_warp_tol_cal_2()
  {
      var fiber_warp_tol_value1 = parseFloat(document.getElementById("fiber_warp_tol_value1").value);
      var fiber_warp_tol_value2 = parseFloat(document.getElementById("fiber_warp_tol_value2").value);
      var fiber_warp_tol_cond = document.getElementById("fiber_warp_tol_cond").value;

      if (fiber_warp_tol_cond == 1) 
      {
          document.getElementById("fiber_warp_cond1").value = 2;
          document.getElementById("fiber_warp_cond2").value = 2;

          var tolarance = (fiber_warp_tol_value2 / 100);
          var fiber_warp_tol_cal_value2 = fiber_warp_tol_value1 + tolarance;
          var fiber_warp_tol_cal_value1 = fiber_warp_tol_value1 - tolarance;

          document.getElementById("fiber_warp_value1").value = fiber_warp_tol_cal_value1.toFixed(5);
          document.getElementById("fiber_warp_value2").value = fiber_warp_tol_cal_value2.toFixed(5);
      }

      if (fiber_warp_tol_cond == 2)
      {
          document.getElementById("fiber_warp_cond1").value = 2;
          document.getElementById("fiber_warp_cond2").value = 2;

          var tolarance = (fiber_warp_tol_value2 / 100);
          var fiber_warp_tol_cal_value2 = fiber_warp_tol_value1 + tolarance;

          document.getElementById("fiber_warp_value1").value = fiber_warp_tol_value1;
          document.getElementById("fiber_warp_value2").value = fiber_warp_tol_cal_value2.toFixed(5);
      }

      if (fiber_warp_tol_cond == 3)
      {
          document.getElementById("fiber_warp_cond1").value = 2;
          document.getElementById("fiber_warp_cond2").value = 2;

          var tolarance = (fiber_warp_tol_value2 / 100);
          var fiber_warp_tol_cal_value2 = fiber_warp_tol_value1 - tolarance;

          document.getElementById("fiber_warp_value2").value = fiber_warp_tol_value1;
          document.getElementById("fiber_warp_value1").value = fiber_warp_tol_cal_value2.toFixed(5);
      }

      if(isNaN(document.getElementById("fiber_warp_tol_value1").value))
      {
          number_alert("fiber_warp_tol_value1");
          return false;
      }

      if(isNaN(document.getElementById("fiber_warp_tol_value2").value))
      {
          number_alert("fiber_warp_tol_value2");
          return false;
      }
  }


  function fiber_warp_tol_condition()
  {
      var fiber_warp_tol_value1 = parseFloat(document.getElementById("fiber_warp_tol_value1").value);
      var fiber_warp_tol_value2 = parseFloat(document.getElementById("fiber_warp_tol_value2").value);
      var fiber_warp_tol_cond = document.getElementById("fiber_warp_tol_cond").value;

      if (fiber_warp_tol_cond == 1) 
      {
          document.getElementById("fiber_warp_cond1").value = 2;
          document.getElementById("fiber_warp_cond2").value = 2;

          var tolarance = (fiber_warp_tol_value2 / 100);
          var fiber_warp_tol_cal_value2 = fiber_warp_tol_value1 + tolarance;
          var fiber_warp_tol_cal_value1 = fiber_warp_tol_value1 - tolarance;

          document.getElementById("fiber_warp_value1").value = fiber_warp_tol_cal_value1.toFixed(5);
          document.getElementById("fiber_warp_value2").value = fiber_warp_tol_cal_value2.toFixed(5);
      }

      if (fiber_warp_tol_cond == 2)
      {
          document.getElementById("fiber_warp_cond1").value = 2;
          document.getElementById("fiber_warp_cond2").value = 2;

          var tolarance = (fiber_warp_tol_value2 / 100);
          var fiber_warp_tol_cal_value2 = fiber_warp_tol_value1 + tolarance;

          document.getElementById("fiber_warp_value1").value = fiber_warp_tol_value1;
          document.getElementById("fiber_warp_value2").value = fiber_warp_tol_cal_value2.toFixed(5);
      }

      if (fiber_warp_tol_cond == 3)
      {
          document.getElementById("fiber_warp_cond1").value = 2;
          document.getElementById("fiber_warp_cond2").value = 2;

          var tolarance = (fiber_warp_tol_value2 / 100);
          var fiber_warp_tol_cal_value2 = fiber_warp_tol_value1 - tolarance;

          document.getElementById("fiber_warp_value2").value = fiber_warp_tol_value1;
          document.getElementById("fiber_warp_value1").value = fiber_warp_tol_cal_value2.toFixed(5);
      }

      if(isNaN(document.getElementById("fiber_warp_tol_value1").value))
      {
          number_alert("fiber_warp_tol_value1");
          return false;
      }

      if(isNaN(document.getElementById("fiber_warp_tol_value2").value))
      {
          number_alert("fiber_warp_tol_value2");
          return false;
      }
  }

  function fiber_weft_tol_cal_1()
  {
      // var fiber_weft_tol_value1 = parseFloat(document.getElementById("fiber_weft_tol_value1").value);
      // var fiber_weft_tol_value2 = parseFloat(document.getElementById("fiber_weft_tol_value2").value);

      // if(isNaN(document.getElementById("fiber_weft_tol_value1").value))
      // {
      //     number_alert("fiber_weft_tol_value1");
      //     return false;
      // }

      // if(isNaN(document.getElementById("fiber_weft_tol_value2").value))
      // {
      //     number_alert("fiber_weft_tol_value2");
      //     return false;
      // }

      // document.getElementById("fiber_weft_cond1").value = 1;
      // document.getElementById("fiber_weft_cond2").value = 1;

      // var tolarance = (fiber_weft_tol_value2 / 100);
      // var fiber_weft_tol_cal_value2 = fiber_weft_tol_value1 + tolarance;
      // var fiber_weft_tol_cal_value1 = fiber_weft_tol_value1 - tolarance;

      // document.getElementById("fiber_weft_value1").value = fiber_weft_tol_cal_value1.toFixed(5);
      // document.getElementById("fiber_weft_value2").value = fiber_weft_tol_cal_value2.toFixed(5);

      var fiber_weft_tol_value1 = parseFloat(document.getElementById("fiber_weft_tol_value1").value);
      var fiber_weft_tol_value2 = parseFloat(document.getElementById("fiber_weft_tol_value2").value);
      var fiber_weft_tol_cond = document.getElementById("fiber_weft_tol_cond").value;

      if (fiber_weft_tol_cond == 1) 
      {
          document.getElementById("fiber_weft_cond1").value = 2;
          document.getElementById("fiber_weft_cond2").value = 2;

          var tolarance = (fiber_weft_tol_value2 / 100);
          var fiber_weft_tol_cal_value2 = fiber_weft_tol_value1 + tolarance;
          var fiber_weft_tol_cal_value1 = fiber_weft_tol_value1 - tolarance;

          document.getElementById("fiber_weft_value1").value = fiber_weft_tol_cal_value1.toFixed(5);
          document.getElementById("fiber_weft_value2").value = fiber_weft_tol_cal_value2.toFixed(5);
      }

      if (fiber_weft_tol_cond == 2)
      {
          document.getElementById("fiber_weft_cond1").value = 2;
          document.getElementById("fiber_weft_cond2").value = 2;

          var tolarance = (fiber_weft_tol_value2 / 100);
          var fiber_weft_tol_cal_value2 = fiber_weft_tol_value1 + tolarance;

          document.getElementById("fiber_weft_value1").value = fiber_weft_tol_value1;
          document.getElementById("fiber_weft_value2").value = fiber_weft_tol_cal_value2.toFixed(5);
      }

      if (fiber_weft_tol_cond == 3)
      {
          document.getElementById("fiber_weft_cond1").value = 2;
          document.getElementById("fiber_weft_cond2").value = 2;

          var tolarance = (fiber_weft_tol_value2 / 100);
          var fiber_weft_tol_cal_value2 = fiber_weft_tol_value1 - tolarance;

          document.getElementById("fiber_weft_value2").value = fiber_weft_tol_value1;
          document.getElementById("fiber_weft_value1").value = fiber_weft_tol_cal_value2.toFixed(5);
      }

      if(isNaN(document.getElementById("fiber_weft_tol_value1").value))
      {
          number_alert("fiber_weft_tol_value1");
          return false;
      }

      if(isNaN(document.getElementById("fiber_weft_tol_value2").value))
      {
          number_alert("fiber_weft_tol_value2");
          return false;
      }
  }


  function fiber_weft_tol_cal_2()
  {
      var fiber_weft_tol_value1 = parseFloat(document.getElementById("fiber_weft_tol_value1").value);
      var fiber_weft_tol_value2 = parseFloat(document.getElementById("fiber_weft_tol_value2").value);
      var fiber_weft_tol_cond = document.getElementById("fiber_weft_tol_cond").value;

      if (fiber_weft_tol_cond == 1) 
      {
          document.getElementById("fiber_weft_cond1").value = 2;
          document.getElementById("fiber_weft_cond2").value = 2;

          var tolarance = (fiber_weft_tol_value2 / 100);
          var fiber_weft_tol_cal_value2 = fiber_weft_tol_value1 + tolarance;
          var fiber_weft_tol_cal_value1 = fiber_weft_tol_value1 - tolarance;

          document.getElementById("fiber_weft_value1").value = fiber_weft_tol_cal_value1.toFixed(5);
          document.getElementById("fiber_weft_value2").value = fiber_weft_tol_cal_value2.toFixed(5);
      }

      if (fiber_weft_tol_cond == 2)
      {
          document.getElementById("fiber_weft_cond1").value = 2;
          document.getElementById("fiber_weft_cond2").value = 2;

          var tolarance = (fiber_weft_tol_value2 / 100);
          var fiber_weft_tol_cal_value2 = fiber_weft_tol_value1 + tolarance;

          document.getElementById("fiber_weft_value1").value = fiber_weft_tol_value1;
          document.getElementById("fiber_weft_value2").value = fiber_weft_tol_cal_value2.toFixed(5);
      }

      if (fiber_weft_tol_cond == 3)
      {
          document.getElementById("fiber_weft_cond1").value = 2;
          document.getElementById("fiber_weft_cond2").value = 2;

          var tolarance = (fiber_weft_tol_value2 / 100);
          var fiber_weft_tol_cal_value2 = fiber_weft_tol_value1 - tolarance;

          document.getElementById("fiber_weft_value2").value = fiber_weft_tol_value1;
          document.getElementById("fiber_weft_value1").value = fiber_weft_tol_cal_value2.toFixed(5);
      }

      if(isNaN(document.getElementById("fiber_weft_tol_value1").value))
      {
          number_alert("fiber_weft_tol_value1");
          return false;
      }

      if(isNaN(document.getElementById("fiber_weft_tol_value2").value))
      {
          number_alert("fiber_weft_tol_value2");
          return false;
      }
  }

  function fiber_weft_tol_condition()
  {
      var fiber_weft_tol_value1 = parseFloat(document.getElementById("fiber_weft_tol_value1").value);
      var fiber_weft_tol_value2 = parseFloat(document.getElementById("fiber_weft_tol_value2").value);
      var fiber_weft_tol_cond = document.getElementById("fiber_weft_tol_cond").value;

      if (fiber_weft_tol_cond == 1) 
      {
          document.getElementById("fiber_weft_cond1").value = 2;
          document.getElementById("fiber_weft_cond2").value = 2;

          var tolarance = (fiber_weft_tol_value2 / 100);
          var fiber_weft_tol_cal_value2 = fiber_weft_tol_value1 + tolarance;
          var fiber_weft_tol_cal_value1 = fiber_weft_tol_value1 - tolarance;

          document.getElementById("fiber_weft_value1").value = fiber_weft_tol_cal_value1.toFixed(5);
          document.getElementById("fiber_weft_value2").value = fiber_weft_tol_cal_value2.toFixed(5);
      }

      if (fiber_weft_tol_cond == 2)
      {
          document.getElementById("fiber_weft_cond1").value = 2;
          document.getElementById("fiber_weft_cond2").value = 2;

          var tolarance = (fiber_weft_tol_value2 / 100);
          var fiber_weft_tol_cal_value2 = fiber_weft_tol_value1 + tolarance;

          document.getElementById("fiber_weft_value1").value = fiber_weft_tol_value1;
          document.getElementById("fiber_weft_value2").value = fiber_weft_tol_cal_value2.toFixed(5);
      }

      if (fiber_weft_tol_cond == 3)
      {
          document.getElementById("fiber_weft_cond1").value = 2;
          document.getElementById("fiber_weft_cond2").value = 2;

          var tolarance = (fiber_weft_tol_value2 / 100);
          var fiber_weft_tol_cal_value2 = fiber_weft_tol_value1 - tolarance;

          document.getElementById("fiber_weft_value2").value = fiber_weft_tol_value1;
          document.getElementById("fiber_weft_value1").value = fiber_weft_tol_cal_value2.toFixed(5);
      }

      if(isNaN(document.getElementById("fiber_weft_tol_value1").value))
      {
          number_alert("fiber_weft_tol_value1");
          return false;
      }

      if(isNaN(document.getElementById("fiber_weft_tol_value2").value))
      {
          number_alert("fiber_weft_tol_value2");
          return false;
      }
  }


  //standard for singe
  function intensity_tol_cal_1()
  {
      // var intensity_tol_value1 = parseFloat(document.getElementById("intensity_tol_value1").value);
      // var intensity_tol_value2 = parseFloat(document.getElementById("intensity_tol_value2").value);

      // if(isNaN(document.getElementById("intensity_tol_value1").value))
      // {
      //     number_alert("intensity_tol_value1");
      //     return false;
      // }

      // if(isNaN(document.getElementById("intensity_tol_value2").value))
      // {
      //     number_alert("intensity_tol_value2");
      //     return false;
      // }

      // document.getElementById("intensity_cond1").value = 1;
      // document.getElementById("intensity_cond2").value = 1;

      // var tolarance = (intensity_tol_value2 / 100);
      // var intensity_tol_cal_value2 = intensity_tol_value1 + tolarance;
      // var intensity_tol_cal_value1 = intensity_tol_value1 - tolarance;

      // document.getElementById("intensity_value1").value = intensity_tol_cal_value1.toFixed(5);
      // document.getElementById("intensity_value2").value = intensity_tol_cal_value2.toFixed(5);


      var intensity_tol_value1 = parseFloat(document.getElementById("intensity_tol_value1").value);
      var intensity_tol_value2 = parseFloat(document.getElementById("intensity_tol_value2").value);
      var intensity_tol_cond = document.getElementById("intensity_tol_cond").value;

      if (intensity_tol_cond == 1) 
      {
          document.getElementById("intensity_cond1").value = 2;
          document.getElementById("intensity_cond2").value = 2;

          var tolarance = ((intensity_tol_value2 * intensity_tol_value1) / 100);
          var intensity_tol_cal_value2 = intensity_tol_value1 + tolarance;
          var intensity_tol_cal_value1 = intensity_tol_value1 - tolarance;

          document.getElementById("intensity_value1").value = intensity_tol_cal_value1.toFixed(5);
          document.getElementById("intensity_value2").value = intensity_tol_cal_value2.toFixed(5);
      }

      if (intensity_tol_cond == 2)
      {
          document.getElementById("intensity_cond1").value = 2;
          document.getElementById("intensity_cond2").value = 2;

          var tolarance = ((intensity_tol_value2 * intensity_tol_value1) / 100);
          var intensity_tol_cal_value2 = intensity_tol_value1 + tolarance;

          document.getElementById("intensity_value1").value = intensity_tol_value1;
          document.getElementById("intensity_value2").value = intensity_tol_cal_value2.toFixed(5);
      }

      if (intensity_tol_cond == 3)
      {
          document.getElementById("intensity_cond1").value = 2;
          document.getElementById("intensity_cond2").value = 2;

          var tolarance = ((intensity_tol_value2 * intensity_tol_value1) / 100);
          var intensity_tol_cal_value2 = intensity_tol_value1 - tolarance;

          document.getElementById("intensity_value2").value = intensity_tol_value1;
          document.getElementById("intensity_value1").value = intensity_tol_cal_value2.toFixed(5);
      }

      if(isNaN(document.getElementById("intensity_tol_value1").value))
      {
          number_alert("intensity_tol_value1");
          return false;
      }

      if(isNaN(document.getElementById("intensity_tol_value2").value))
      {
          number_alert("intensity_tol_value2");
          return false;
      }
  }


  function intensity_tol_cal_2()
  {
      var intensity_tol_value1 = parseFloat(document.getElementById("intensity_tol_value1").value);
      var intensity_tol_value2 = parseFloat(document.getElementById("intensity_tol_value2").value);
      var intensity_tol_cond = document.getElementById("intensity_tol_cond").value;

      if (intensity_tol_cond == 1) 
      {
          document.getElementById("intensity_cond1").value = 2;
          document.getElementById("intensity_cond2").value = 2;

          var tolarance = ((intensity_tol_value2 * intensity_tol_value1) / 100);
          var intensity_tol_cal_value2 = intensity_tol_value1 + tolarance;
          var intensity_tol_cal_value1 = intensity_tol_value1 - tolarance;

          document.getElementById("intensity_value1").value = intensity_tol_cal_value1.toFixed(5);
          document.getElementById("intensity_value2").value = intensity_tol_cal_value2.toFixed(5);
      }

      if (intensity_tol_cond == 2)
      {
          document.getElementById("intensity_cond1").value = 2;
          document.getElementById("intensity_cond2").value = 2;

          var tolarance = ((intensity_tol_value2 * intensity_tol_value1) / 100);
          var intensity_tol_cal_value2 = intensity_tol_value1 + tolarance;

          document.getElementById("intensity_value1").value = intensity_tol_value1;
          document.getElementById("intensity_value2").value = intensity_tol_cal_value2.toFixed(5);
      }

      if (intensity_tol_cond == 3)
      {
          document.getElementById("intensity_cond1").value = 2;
          document.getElementById("intensity_cond2").value = 2;

          var tolarance = ((intensity_tol_value2 * intensity_tol_value1) / 100);
          var intensity_tol_cal_value2 = intensity_tol_value1 - tolarance;

          document.getElementById("intensity_value2").value = intensity_tol_value1;
          document.getElementById("intensity_value1").value = intensity_tol_cal_value2.toFixed(5);
      }

      if(isNaN(document.getElementById("intensity_tol_value1").value))
      {
          number_alert("intensity_tol_value1");
          return false;
      }

      if(isNaN(document.getElementById("intensity_tol_value2").value))
      {
          number_alert("intensity_tol_value2");
          return false;
      }
  }

  function intensity_tol_condition()
  {
      var intensity_tol_value1 = parseFloat(document.getElementById("intensity_tol_value1").value);
      var intensity_tol_value2 = parseFloat(document.getElementById("intensity_tol_value2").value);
      var intensity_tol_cond = document.getElementById("intensity_tol_cond").value;

      if (intensity_tol_cond == 1) 
      {
          document.getElementById("intensity_cond1").value = 2;
          document.getElementById("intensity_cond2").value = 2;

          var tolarance = ((intensity_tol_value2 * intensity_tol_value1) / 100);
          var intensity_tol_cal_value2 = intensity_tol_value1 + tolarance;
          var intensity_tol_cal_value1 = intensity_tol_value1 - tolarance;

          document.getElementById("intensity_value1").value = intensity_tol_cal_value1.toFixed(5);
          document.getElementById("intensity_value2").value = intensity_tol_cal_value2.toFixed(5);
      }

      if (intensity_tol_cond == 2)
      {
          document.getElementById("intensity_cond1").value = 2;
          document.getElementById("intensity_cond2").value = 2;

          var tolarance = ((intensity_tol_value2 * intensity_tol_value1) / 100);
          var intensity_tol_cal_value2 = intensity_tol_value1 + tolarance;

          document.getElementById("intensity_value1").value = intensity_tol_value1;
          document.getElementById("intensity_value2").value = intensity_tol_cal_value2.toFixed(5);
      }

      if (intensity_tol_cond == 3)
      {
          document.getElementById("intensity_cond1").value = 2;
          document.getElementById("intensity_cond2").value = 2;

          var tolarance = ((intensity_tol_value2 * intensity_tol_value1) / 100);
          var intensity_tol_cal_value2 = intensity_tol_value1 - tolarance;

          document.getElementById("intensity_value2").value = intensity_tol_value1;
          document.getElementById("intensity_value1").value = intensity_tol_cal_value2.toFixed(5);
      }

      if(isNaN(document.getElementById("intensity_tol_value1").value))
      {
          number_alert("intensity_tol_value1");
          return false;
      }

      if(isNaN(document.getElementById("intensity_tol_value2").value))
      {
          number_alert("intensity_tol_value2");
          return false;
      }
  }

  function speed_tol_cal_1()
  {
      // var speed_tol_value1 = parseFloat(document.getElementById("speed_tol_value1").value);
      // var speed_tol_value2 = parseFloat(document.getElementById("speed_tol_value2").value);

      // if(isNaN(document.getElementById("speed_tol_value1").value))
      // {
      //     number_alert("speed_tol_value1");
      //     return false;
      // }

      // if(isNaN(document.getElementById("speed_tol_value2").value))
      // {
      //     number_alert("speed_tol_value2");
      //     return false;
      // }

      // document.getElementById("speed_cond1").value = 1;
      // document.getElementById("speed_cond2").value = 1;

      // var tolarance = (speed_tol_value2 / 100);
      // var speed_tol_cal_value2 = speed_tol_value1 + tolarance;
      // var speed_tol_cal_value1 = speed_tol_value1 - tolarance;

      // document.getElementById("speed_value1").value = speed_tol_cal_value1.toFixed(5);
      // document.getElementById("speed_value2").value = speed_tol_cal_value2.toFixed(5);


      var speed_tol_value1 = parseFloat(document.getElementById("speed_tol_value1").value);
      var speed_tol_value2 = parseFloat(document.getElementById("speed_tol_value2").value);
      var speed_tol_cond = document.getElementById("speed_tol_cond").value;

      if (speed_tol_cond == 1) 
      {
          document.getElementById("speed_cond1").value = 2;
          document.getElementById("speed_cond2").value = 2;

          var tolarance = ((speed_tol_value2 * speed_tol_value1) / 100);
          var speed_tol_cal_value2 = speed_tol_value1 + tolarance;
          var speed_tol_cal_value1 = speed_tol_value1 - tolarance;

          document.getElementById("speed_value1").value = speed_tol_cal_value1.toFixed(5);
          document.getElementById("speed_value2").value = speed_tol_cal_value2.toFixed(5);
      }

      if (speed_tol_cond == 2)
      {
          document.getElementById("speed_cond1").value = 2;
          document.getElementById("speed_cond2").value = 2;

          var tolarance = ((speed_tol_value2 * speed_tol_value1) / 100);
          var speed_tol_cal_value2 = speed_tol_value1 + tolarance;

          document.getElementById("speed_value1").value = speed_tol_value1;
          document.getElementById("speed_value2").value = speed_tol_cal_value2.toFixed(5);
      }

      if (speed_tol_cond == 3)
      {
          document.getElementById("speed_cond1").value = 2;
          document.getElementById("speed_cond2").value = 2;

          var tolarance = ((speed_tol_value2 * speed_tol_value1) / 100);
          var speed_tol_cal_value2 = speed_tol_value1 - tolarance;

          document.getElementById("speed_value2").value = speed_tol_value1;
          document.getElementById("speed_value1").value = speed_tol_cal_value2.toFixed(5);
      }

      if(isNaN(document.getElementById("speed_tol_value1").value))
      {
          number_alert("speed_tol_value1");
          return false;
      }

      if(isNaN(document.getElementById("speed_tol_value2").value))
      {
          number_alert("speed_tol_value2");
          return false;
      }
  }


  function speed_tol_cal_2()
  {
      var speed_tol_value1 = parseFloat(document.getElementById("speed_tol_value1").value);
      var speed_tol_value2 = parseFloat(document.getElementById("speed_tol_value2").value);
      var speed_tol_cond = document.getElementById("speed_tol_cond").value;

      if (speed_tol_cond == 1) 
      {
          document.getElementById("speed_cond1").value = 2;
          document.getElementById("speed_cond2").value = 2;

          var tolarance = ((speed_tol_value2 * speed_tol_value1) / 100);
          var speed_tol_cal_value2 = speed_tol_value1 + tolarance;
          var speed_tol_cal_value1 = speed_tol_value1 - tolarance;

          document.getElementById("speed_value1").value = speed_tol_cal_value1.toFixed(5);
          document.getElementById("speed_value2").value = speed_tol_cal_value2.toFixed(5);
      }

      if (speed_tol_cond == 2)
      {
          document.getElementById("speed_cond1").value = 2;
          document.getElementById("speed_cond2").value = 2;

          var tolarance = ((speed_tol_value2 * speed_tol_value1) / 100);
          var speed_tol_cal_value2 = speed_tol_value1 + tolarance;

          document.getElementById("speed_value1").value = speed_tol_value1;
          document.getElementById("speed_value2").value = speed_tol_cal_value2.toFixed(5);
      }

      if (speed_tol_cond == 3)
      {
          document.getElementById("speed_cond1").value = 2;
          document.getElementById("speed_cond2").value = 2;

          var tolarance = ((speed_tol_value2 * speed_tol_value1) / 100);
          var speed_tol_cal_value2 = speed_tol_value1 - tolarance;

          document.getElementById("speed_value2").value = speed_tol_value1;
          document.getElementById("speed_value1").value = speed_tol_cal_value2.toFixed(5);
      }

      if(isNaN(document.getElementById("speed_tol_value1").value))
      {
          number_alert("speed_tol_value1");
          return false;
      }

      if(isNaN(document.getElementById("speed_tol_value2").value))
      {
          number_alert("speed_tol_value2");
          return false;
      }
  }


  function speed_tol_condition()
  {
      var speed_tol_value1 = parseFloat(document.getElementById("speed_tol_value1").value);
      var speed_tol_value2 = parseFloat(document.getElementById("speed_tol_value2").value);
      var speed_tol_cond = document.getElementById("speed_tol_cond").value;

      if (speed_tol_cond == 1) 
      {
          document.getElementById("speed_cond1").value = 2;
          document.getElementById("speed_cond2").value = 2;

          var tolarance = ((speed_tol_value2 * speed_tol_value1) / 100);
          var speed_tol_cal_value2 = speed_tol_value1 + tolarance;
          var speed_tol_cal_value1 = speed_tol_value1 - tolarance;

          document.getElementById("speed_value1").value = speed_tol_cal_value1.toFixed(5);
          document.getElementById("speed_value2").value = speed_tol_cal_value2.toFixed(5);
      }

      if (speed_tol_cond == 2)
      {
          document.getElementById("speed_cond1").value = 2;
          document.getElementById("speed_cond2").value = 2;

          var tolarance = ((speed_tol_value2 * speed_tol_value1) / 100);
          var speed_tol_cal_value2 = speed_tol_value1 + tolarance;

          document.getElementById("speed_value1").value = speed_tol_value1;
          document.getElementById("speed_value2").value = speed_tol_cal_value2.toFixed(5);
      }

      if (speed_tol_cond == 3)
      {
          document.getElementById("speed_cond1").value = 2;
          document.getElementById("speed_cond2").value = 2;

          var tolarance = ((speed_tol_value2 * speed_tol_value1) / 100);
          var speed_tol_cal_value2 = speed_tol_value1 - tolarance;

          document.getElementById("speed_value2").value = speed_tol_value1;
          document.getElementById("speed_value1").value = speed_tol_cal_value2.toFixed(5);
      }

      if(isNaN(document.getElementById("speed_tol_value1").value))
      {
          number_alert("speed_tol_value1");
          return false;
      }

      if(isNaN(document.getElementById("speed_tol_value2").value))
      {
          number_alert("speed_tol_value2");
          return false;
      }
  }


  function temp_tol_cal_1()
  {
      // var temp_tol_value1 = parseFloat(document.getElementById("temp_tol_value1").value);
      // var temp_tol_value2 = parseFloat(document.getElementById("temp_tol_value2").value);

      // if(isNaN(document.getElementById("temp_tol_value1").value))
      // {
      //     number_alert("temp_tol_value1");
      //     return false;
      // }

      // if(isNaN(document.getElementById("temp_tol_value2").value))
      // {
      //     number_alert("temp_tol_value2");
      //     return false;
      // }

      // document.getElementById("temp_cond1").value = 1;
      // document.getElementById("temp_cond2").value = 1;

      // var tolarance = (temp_tol_value2 / 100);
      // var temp_tol_cal_value2 = temp_tol_value1 + tolarance;
      // var temp_tol_cal_value1 = temp_tol_value1 - tolarance;

      // document.getElementById("temp_value1").value = temp_tol_cal_value1.toFixed(5);
      // document.getElementById("temp_value2").value = temp_tol_cal_value2.toFixed(5);


      var temp_tol_value1 = parseFloat(document.getElementById("temp_tol_value1").value);
      var temp_tol_value2 = parseFloat(document.getElementById("temp_tol_value2").value);
      var temp_tol_cond = document.getElementById("temp_tol_cond").value;

      if (temp_tol_cond == 1) 
      {
          document.getElementById("temp_cond1").value = 2;
          document.getElementById("temp_cond2").value = 2;

          var tolarance = ((temp_tol_value2 * temp_tol_value1) / 100);
          var temp_tol_cal_value2 = temp_tol_value1 + tolarance;
          var temp_tol_cal_value1 = temp_tol_value1 - tolarance;

          document.getElementById("temp_value1").value = temp_tol_cal_value1.toFixed(5);
          document.getElementById("temp_value2").value = temp_tol_cal_value2.toFixed(5);
      }

      if (temp_tol_cond == 2)
      {
          document.getElementById("temp_cond1").value = 2;
          document.getElementById("temp_cond2").value = 2;

          var tolarance = ((temp_tol_value2 * temp_tol_value1) / 100);
          var temp_tol_cal_value2 = temp_tol_value1 + tolarance;

          document.getElementById("temp_value1").value = temp_tol_value1;
          document.getElementById("temp_value2").value = temp_tol_cal_value2.toFixed(5);
      }

      if (temp_tol_cond == 3)
      {
          document.getElementById("temp_cond1").value = 2;
          document.getElementById("temp_cond2").value = 2;

          var tolarance = ((temp_tol_value2 * temp_tol_value1) / 100);
          var temp_tol_cal_value2 = temp_tol_value1 - tolarance;

          document.getElementById("temp_value2").value = temp_tol_value1;
          document.getElementById("temp_value1").value = temp_tol_cal_value2.toFixed(5);
      }

      if(isNaN(document.getElementById("temp_tol_value1").value))
      {
          number_alert("temp_tol_value1");
          return false;
      }

      if(isNaN(document.getElementById("temp_tol_value2").value))
      {
          number_alert("temp_tol_value2");
          return false;
      }
  }


  function temp_tol_cal_2()
  {
      var temp_tol_value1 = parseFloat(document.getElementById("temp_tol_value1").value);
      var temp_tol_value2 = parseFloat(document.getElementById("temp_tol_value2").value);
      var temp_tol_cond = document.getElementById("temp_tol_cond").value;

      if (temp_tol_cond == 1) 
      {
          document.getElementById("temp_cond1").value = 2;
          document.getElementById("temp_cond2").value = 2;

          var tolarance = ((temp_tol_value2 * temp_tol_value1) / 100);
          var temp_tol_cal_value2 = temp_tol_value1 + tolarance;
          var temp_tol_cal_value1 = temp_tol_value1 - tolarance;

          document.getElementById("temp_value1").value = temp_tol_cal_value1.toFixed(5);
          document.getElementById("temp_value2").value = temp_tol_cal_value2.toFixed(5);
      }

      if (temp_tol_cond == 2)
      {
          document.getElementById("temp_cond1").value = 2;
          document.getElementById("temp_cond2").value = 2;

          var tolarance = ((temp_tol_value2 * temp_tol_value1) / 100);
          var temp_tol_cal_value2 = temp_tol_value1 + tolarance;

          document.getElementById("temp_value1").value = temp_tol_value1;
          document.getElementById("temp_value2").value = temp_tol_cal_value2.toFixed(5);
      }

      if (temp_tol_cond == 3)
      {
          document.getElementById("temp_cond1").value = 2;
          document.getElementById("temp_cond2").value = 2;

          var tolarance = ((temp_tol_value2 * temp_tol_value1) / 100);
          var temp_tol_cal_value2 = temp_tol_value1 - tolarance;

          document.getElementById("temp_value2").value = temp_tol_value1;
          document.getElementById("temp_value1").value = temp_tol_cal_value2.toFixed(5);
      }

      if(isNaN(document.getElementById("temp_tol_value1").value))
      {
          number_alert("temp_tol_value1");
          return false;
      }

      if(isNaN(document.getElementById("temp_tol_value2").value))
      {
          number_alert("temp_tol_value2");
          return false;
      }
  }

  function temp_tol_condition()
  {
      var temp_tol_value1 = parseFloat(document.getElementById("temp_tol_value1").value);
      var temp_tol_value2 = parseFloat(document.getElementById("temp_tol_value2").value);
      var temp_tol_cond = document.getElementById("temp_tol_cond").value;

      if (temp_tol_cond == 1) 
      {
          document.getElementById("temp_cond1").value = 2;
          document.getElementById("temp_cond2").value = 2;

          var tolarance = ((temp_tol_value2 * temp_tol_value1) / 100);
          var temp_tol_cal_value2 = temp_tol_value1 + tolarance;
          var temp_tol_cal_value1 = temp_tol_value1 - tolarance;

          document.getElementById("temp_value1").value = temp_tol_cal_value1.toFixed(5);
          document.getElementById("temp_value2").value = temp_tol_cal_value2.toFixed(5);
      }

      if (temp_tol_cond == 2)
      {
          document.getElementById("temp_cond1").value = 2;
          document.getElementById("temp_cond2").value = 2;

          var tolarance = ((temp_tol_value2 * temp_tol_value1) / 100);
          var temp_tol_cal_value2 = temp_tol_value1 + tolarance;

          document.getElementById("temp_value1").value = temp_tol_value1;
          document.getElementById("temp_value2").value = temp_tol_cal_value2.toFixed(5);
      }

      if (temp_tol_cond == 3)
      {
          document.getElementById("temp_cond1").value = 2;
          document.getElementById("temp_cond2").value = 2;

          var tolarance = ((temp_tol_value2 * temp_tol_value1) / 100);
          var temp_tol_cal_value2 = temp_tol_value1 - tolarance;

          document.getElementById("temp_value2").value = temp_tol_value1;
          document.getElementById("temp_value1").value = temp_tol_cal_value2.toFixed(5);
      }

      if(isNaN(document.getElementById("temp_tol_value1").value))
      {
          number_alert("temp_tol_value1");
          return false;
      }

      if(isNaN(document.getElementById("temp_tol_value2").value))
      {
          number_alert("temp_tol_value2");
          return false;
      }
  }

  function ph_tol_cal_1()
  {
      // var ph_tol_value1 = parseFloat(document.getElementById("ph_tol_value1").value);
      // var ph_tol_value2 = parseFloat(document.getElementById("ph_tol_value2").value);

      // if(isNaN(document.getElementById("ph_tol_value1").value))
      // {
      //     number_alert("ph_tol_value1");
      //     return false;
      // }

      // if(isNaN(document.getElementById("ph_tol_value2").value))
      // {
      //     number_alert("ph_tol_value2");
      //     return false;
      // }

      // document.getElementById("ph_cond1").value = 1;
      // document.getElementById("ph_cond2").value = 1;

      // var tolarance = (ph_tol_value2 / 100);
      // var ph_tol_cal_value2 = ph_tol_value1 + tolarance;
      // var ph_tol_cal_value1 = ph_tol_value1 - tolarance;

      // document.getElementById("ph_value1").value = ph_tol_cal_value1.toFixed(5);
      // document.getElementById("ph_value2").value = ph_tol_cal_value2.toFixed(5);

      var ph_tol_value1 = parseFloat(document.getElementById("ph_tol_value1").value);
      var ph_tol_value2 = parseFloat(document.getElementById("ph_tol_value2").value);
      var ph_tol_cond = document.getElementById("ph_tol_cond").value;

      if (ph_tol_cond == 1) 
      {
          document.getElementById("ph_cond1").value = 2;
          document.getElementById("ph_cond2").value = 2;

          var tolarance = ((ph_tol_value2 * ph_tol_value1) / 100);
          var ph_tol_cal_value2 = ph_tol_value1 + tolarance;
          var ph_tol_cal_value1 = ph_tol_value1 - tolarance;

          document.getElementById("ph_value1").value = ph_tol_cal_value1.toFixed(5);
          document.getElementById("ph_value2").value = ph_tol_cal_value2.toFixed(5);
      }

      if (ph_tol_cond == 2)
      {
          document.getElementById("ph_cond1").value = 2;
          document.getElementById("ph_cond2").value = 2;

          var tolarance = ((ph_tol_value2 * ph_tol_value1) / 100);
          var ph_tol_cal_value2 = ph_tol_value1 + tolarance;

          document.getElementById("ph_value1").value = ph_tol_value1;
          document.getElementById("ph_value2").value = ph_tol_cal_value2.toFixed(5);
      }

      if (ph_tol_cond == 3)
      {
          document.getElementById("ph_cond1").value = 2;
          document.getElementById("ph_cond2").value = 2;

          var tolarance = ((ph_tol_value2 * ph_tol_value1) / 100);
          var ph_tol_cal_value2 = ph_tol_value1 - tolarance;

          document.getElementById("ph_value2").value = ph_tol_value1;
          document.getElementById("ph_value1").value = ph_tol_cal_value2.toFixed(5);
      }

      if(isNaN(document.getElementById("ph_tol_value1").value))
      {
          number_alert("ph_tol_value1");
          return false;
      }

      if(isNaN(document.getElementById("ph_tol_value2").value))
      {
          number_alert("ph_tol_value2");
          return false;
      }
  }


  function ph_tol_cal_2()
  {
      var ph_tol_value1 = parseFloat(document.getElementById("ph_tol_value1").value);
      var ph_tol_value2 = parseFloat(document.getElementById("ph_tol_value2").value);
      var ph_tol_cond = document.getElementById("ph_tol_cond").value;

      if (ph_tol_cond == 1) 
      {
          document.getElementById("ph_cond1").value = 2;
          document.getElementById("ph_cond2").value = 2;

          var tolarance = ((ph_tol_value2 * ph_tol_value1) / 100);
          var ph_tol_cal_value2 = ph_tol_value1 + tolarance;
          var ph_tol_cal_value1 = ph_tol_value1 - tolarance;

          document.getElementById("ph_value1").value = ph_tol_cal_value1.toFixed(5);
          document.getElementById("ph_value2").value = ph_tol_cal_value2.toFixed(5);
      }

      if (ph_tol_cond == 2)
      {
          document.getElementById("ph_cond1").value = 2;
          document.getElementById("ph_cond2").value = 2;

          var tolarance = ((ph_tol_value2 * ph_tol_value1) / 100);
          var ph_tol_cal_value2 = ph_tol_value1 + tolarance;

          document.getElementById("ph_value1").value = ph_tol_value1;
          document.getElementById("ph_value2").value = ph_tol_cal_value2.toFixed(5);
      }

      if (ph_tol_cond == 3)
      {
          document.getElementById("ph_cond1").value = 2;
          document.getElementById("ph_cond2").value = 2;

          var tolarance = ((ph_tol_value2 * ph_tol_value1) / 100);
          var ph_tol_cal_value2 = ph_tol_value1 - tolarance;

          document.getElementById("ph_value2").value = ph_tol_value1;
          document.getElementById("ph_value1").value = ph_tol_cal_value2.toFixed(5);
      }

      if(isNaN(document.getElementById("ph_tol_value1").value))
      {
          number_alert("ph_tol_value1");
          return false;
      }

      if(isNaN(document.getElementById("ph_tol_value2").value))
      {
          number_alert("ph_tol_value2");
          return false;
      }
  }

  function ph_tol_condition()
  {
      var ph_tol_value1 = parseFloat(document.getElementById("ph_tol_value1").value);
      var ph_tol_value2 = parseFloat(document.getElementById("ph_tol_value2").value);
      var ph_tol_cond = document.getElementById("ph_tol_cond").value;

      if (ph_tol_cond == 1) 
      {
          document.getElementById("ph_cond1").value = 2;
          document.getElementById("ph_cond2").value = 2;

          var tolarance = ((ph_tol_value2 * ph_tol_value1) / 100);
          var ph_tol_cal_value2 = ph_tol_value1 + tolarance;
          var ph_tol_cal_value1 = ph_tol_value1 - tolarance;

          document.getElementById("ph_value1").value = ph_tol_cal_value1.toFixed(5);
          document.getElementById("ph_value2").value = ph_tol_cal_value2.toFixed(5);
      }

      if (ph_tol_cond == 2)
      {
          document.getElementById("ph_cond1").value = 2;
          document.getElementById("ph_cond2").value = 2;

          var tolarance = ((ph_tol_value2 * ph_tol_value1) / 100);
          var ph_tol_cal_value2 = ph_tol_value1 + tolarance;

          document.getElementById("ph_value1").value = ph_tol_value1;
          document.getElementById("ph_value2").value = ph_tol_cal_value2.toFixed(5);
      }

      if (ph_tol_cond == 3)
      {
          document.getElementById("ph_cond1").value = 2;
          document.getElementById("ph_cond2").value = 2;

          var tolarance = ((ph_tol_value2 * ph_tol_value1) / 100);
          var ph_tol_cal_value2 = ph_tol_value1 - tolarance;

          document.getElementById("ph_value2").value = ph_tol_value1;
          document.getElementById("ph_value1").value = ph_tol_cal_value2.toFixed(5);
      }

      if(isNaN(document.getElementById("ph_tol_value1").value))
      {
          number_alert("ph_tol_value1");
          return false;
      }

      if(isNaN(document.getElementById("ph_tol_value2").value))
      {
          number_alert("ph_tol_value2");
          return false;
      }
  }

  //standard for bleaching
  function absorbency_tol_cal_1()
  {
      // var absorbency_tol_value1 = parseFloat(document.getElementById("absorbency_tol_value1").value);
      // var absorbency_tol_value2 = parseFloat(document.getElementById("absorbency_tol_value2").value);

      // if(isNaN(document.getElementById("absorbency_tol_value1").value))
      // {
      //     number_alert("absorbency_tol_value1");
      //     return false;
      // }

      // if(isNaN(document.getElementById("absorbency_tol_value2").value))
      // {
      //     number_alert("absorbency_tol_value2");
      //     return false;
      // }

      // document.getElementById("absorbency_cond1").value = 1;
      // document.getElementById("absorbency_cond2").value = 1;

      // var tolarance = (absorbency_tol_value2 / 100);
      // var absorbency_tol_cal_value2 = absorbency_tol_value1 + tolarance;
      // var absorbency_tol_cal_value1 = absorbency_tol_value1 - tolarance;

      // document.getElementById("absorbency_value1").value = absorbency_tol_cal_value1.toFixed(5);
      // document.getElementById("absorbency_value2").value = absorbency_tol_cal_value2.toFixed(5);

      var absorbency_tol_value1 = parseFloat(document.getElementById("absorbency_tol_value1").value);
      var absorbency_tol_value2 = parseFloat(document.getElementById("absorbency_tol_value2").value);
      var absorbency_tol_cond = document.getElementById("absorbency_tol_cond").value;

      if (absorbency_tol_cond == 1) 
      {
          document.getElementById("absorbency_cond1").value = 2;
          document.getElementById("absorbency_cond2").value = 2;

          var tolarance = ((absorbency_tol_value2 * absorbency_tol_value1) / 100);
          var absorbency_tol_cal_value2 = absorbency_tol_value1 + tolarance;
          var absorbency_tol_cal_value1 = absorbency_tol_value1 - tolarance;

          document.getElementById("absorbency_value1").value = absorbency_tol_cal_value1.toFixed(5);
          document.getElementById("absorbency_value2").value = absorbency_tol_cal_value2.toFixed(5);
      }

      if (absorbency_tol_cond == 2)
      {
          document.getElementById("absorbency_cond1").value = 2;
          document.getElementById("absorbency_cond2").value = 2;

          var tolarance = ((absorbency_tol_value2 * absorbency_tol_value1) / 100);
          var absorbency_tol_cal_value2 = absorbency_tol_value1 + tolarance;

          document.getElementById("absorbency_value1").value = absorbency_tol_value1;
          document.getElementById("absorbency_value2").value = absorbency_tol_cal_value2.toFixed(5);
      }

      if (absorbency_tol_cond == 3)
      {
          document.getElementById("absorbency_cond1").value = 2;
          document.getElementById("absorbency_cond2").value = 2;

          var tolarance = ((absorbency_tol_value2 * absorbency_tol_value1) / 100);
          var absorbency_tol_cal_value2 = absorbency_tol_value1 - tolarance;

          document.getElementById("absorbency_value2").value = absorbency_tol_value1;
          document.getElementById("absorbency_value1").value = absorbency_tol_cal_value2.toFixed(5);
      }

      if(isNaN(document.getElementById("absorbency_tol_value1").value))
      {
          number_alert("absorbency_tol_value1");
          return false;
      }

      if(isNaN(document.getElementById("absorbency_tol_value2").value))
      {
          number_alert("absorbency_tol_value2");
          return false;
      }
  }


  function absorbency_tol_cal_2()
  {
      var absorbency_tol_value1 = parseFloat(document.getElementById("absorbency_tol_value1").value);
      var absorbency_tol_value2 = parseFloat(document.getElementById("absorbency_tol_value2").value);
      var absorbency_tol_cond = document.getElementById("absorbency_tol_cond").value;

      if (absorbency_tol_cond == 1) 
      {
          document.getElementById("absorbency_cond1").value = 2;
          document.getElementById("absorbency_cond2").value = 2;

          var tolarance = ((absorbency_tol_value2 * absorbency_tol_value1) / 100);
          var absorbency_tol_cal_value2 = absorbency_tol_value1 + tolarance;
          var absorbency_tol_cal_value1 = absorbency_tol_value1 - tolarance;

          document.getElementById("absorbency_value1").value = absorbency_tol_cal_value1.toFixed(5);
          document.getElementById("absorbency_value2").value = absorbency_tol_cal_value2.toFixed(5);
      }

      if (absorbency_tol_cond == 2)
      {
          document.getElementById("absorbency_cond1").value = 2;
          document.getElementById("absorbency_cond2").value = 2;

          var tolarance = ((absorbency_tol_value2 * absorbency_tol_value1) / 100);
          var absorbency_tol_cal_value2 = absorbency_tol_value1 + tolarance;

          document.getElementById("absorbency_value1").value = absorbency_tol_value1;
          document.getElementById("absorbency_value2").value = absorbency_tol_cal_value2.toFixed(5);
      }

      if (absorbency_tol_cond == 3)
      {
          document.getElementById("absorbency_cond1").value = 2;
          document.getElementById("absorbency_cond2").value = 2;

          var tolarance = ((absorbency_tol_value2 * absorbency_tol_value1) / 100);
          var absorbency_tol_cal_value2 = absorbency_tol_value1 - tolarance;

          document.getElementById("absorbency_value2").value = absorbency_tol_value1;
          document.getElementById("absorbency_value1").value = absorbency_tol_cal_value2.toFixed(5);
      }

      if(isNaN(document.getElementById("absorbency_tol_value1").value))
      {
          number_alert("absorbency_tol_value1");
          return false;
      }

      if(isNaN(document.getElementById("absorbency_tol_value2").value))
      {
          number_alert("absorbency_tol_value2");
          return false;
      }
  }

  function absorbency_tol_condition()
  {
      var absorbency_tol_value1 = parseFloat(document.getElementById("absorbency_tol_value1").value);
      var absorbency_tol_value2 = parseFloat(document.getElementById("absorbency_tol_value2").value);
      var absorbency_tol_cond = document.getElementById("absorbency_tol_cond").value;

      if (absorbency_tol_cond == 1) 
      {
          document.getElementById("absorbency_cond1").value = 2;
          document.getElementById("absorbency_cond2").value = 2;

          var tolarance = ((absorbency_tol_value2 * absorbency_tol_value1) / 100);
          var absorbency_tol_cal_value2 = absorbency_tol_value1 + tolarance;
          var absorbency_tol_cal_value1 = absorbency_tol_value1 - tolarance;

          document.getElementById("absorbency_value1").value = absorbency_tol_cal_value1.toFixed(5);
          document.getElementById("absorbency_value2").value = absorbency_tol_cal_value2.toFixed(5);
      }

      if (absorbency_tol_cond == 2)
      {
          document.getElementById("absorbency_cond1").value = 2;
          document.getElementById("absorbency_cond2").value = 2;

          var tolarance = ((absorbency_tol_value2 * absorbency_tol_value1) / 100);
          var absorbency_tol_cal_value2 = absorbency_tol_value1 + tolarance;

          document.getElementById("absorbency_value1").value = absorbency_tol_value1;
          document.getElementById("absorbency_value2").value = absorbency_tol_cal_value2.toFixed(5);
      }

      if (absorbency_tol_cond == 3)
      {
          document.getElementById("absorbency_cond1").value = 2;
          document.getElementById("absorbency_cond2").value = 2;

          var tolarance = ((absorbency_tol_value2 * absorbency_tol_value1) / 100);
          var absorbency_tol_cal_value2 = absorbency_tol_value1 - tolarance;

          document.getElementById("absorbency_value2").value = absorbency_tol_value1;
          document.getElementById("absorbency_value1").value = absorbency_tol_cal_value2.toFixed(5);
      }

      if(isNaN(document.getElementById("absorbency_tol_value1").value))
      {
          number_alert("absorbency_tol_value1");
          return false;
      }

      if(isNaN(document.getElementById("absorbency_tol_value2").value))
      {
          number_alert("absorbency_tol_value2");
          return false;
      }
  }

  function sizing_tol_cal_1()
  {
      // var sizing_tol_value1 = parseFloat(document.getElementById("sizing_tol_value1").value);
      // var sizing_tol_value2 = parseFloat(document.getElementById("sizing_tol_value2").value);

      // if(isNaN(document.getElementById("sizing_tol_value1").value))
      // {
      //     number_alert("sizing_tol_value1");
      //     return false;
      // }

      // if(isNaN(document.getElementById("sizing_tol_value2").value))
      // {
      //     number_alert("sizing_tol_value2");
      //     return false;
      // }

      // document.getElementById("sizing_cond1").value = 1;
      // document.getElementById("sizing_cond2").value = 1;

      // var tolarance = (sizing_tol_value2 / 100);
      // var sizing_tol_cal_value2 = sizing_tol_value1 + tolarance;
      // var sizing_tol_cal_value1 = sizing_tol_value1 - tolarance;

      // document.getElementById("sizing_value1").value = sizing_tol_cal_value1.toFixed(5);
      // document.getElementById("sizing_value2").value = sizing_tol_cal_value2.toFixed(5);

      var sizing_tol_value1 = parseFloat(document.getElementById("sizing_tol_value1").value);
      var sizing_tol_value2 = parseFloat(document.getElementById("sizing_tol_value2").value);
      var sizing_tol_cond = document.getElementById("sizing_tol_cond").value;

      if (sizing_tol_cond == 1) 
      {
          document.getElementById("sizing_cond1").value = 2;
          document.getElementById("sizing_cond2").value = 2;

          var tolarance = ((sizing_tol_value2 * sizing_tol_value1) / 100);
          var sizing_tol_cal_value2 = sizing_tol_value1 + tolarance;
          var sizing_tol_cal_value1 = sizing_tol_value1 - tolarance;

          document.getElementById("sizing_value1").value = sizing_tol_cal_value1.toFixed(5);
          document.getElementById("sizing_value2").value = sizing_tol_cal_value2.toFixed(5);
      }

      if (sizing_tol_cond == 2)
      {
          document.getElementById("sizing_cond1").value = 2;
          document.getElementById("sizing_cond2").value = 2;

          var tolarance = ((sizing_tol_value2 * sizing_tol_value1) / 100);
          var sizing_tol_cal_value2 = sizing_tol_value1 + tolarance;

          document.getElementById("sizing_value1").value = sizing_tol_value1;
          document.getElementById("sizing_value2").value = sizing_tol_cal_value2.toFixed(5);
      }

      if (sizing_tol_cond == 3)
      {
          document.getElementById("sizing_cond1").value = 2;
          document.getElementById("sizing_cond2").value = 2;

          var tolarance = ((sizing_tol_value2 * sizing_tol_value1) / 100);
          var sizing_tol_cal_value2 = sizing_tol_value1 - tolarance;

          document.getElementById("sizing_value2").value = sizing_tol_value1;
          document.getElementById("sizing_value1").value = sizing_tol_cal_value2.toFixed(5);
      }

      if(isNaN(document.getElementById("sizing_tol_value1").value))
      {
          number_alert("sizing_tol_value1");
          return false;
      }

      if(isNaN(document.getElementById("sizing_tol_value2").value))
      {
          number_alert("sizing_tol_value2");
          return false;
      }
  }


  function sizing_tol_cal_2()
  {
      var sizing_tol_value1 = parseFloat(document.getElementById("sizing_tol_value1").value);
      var sizing_tol_value2 = parseFloat(document.getElementById("sizing_tol_value2").value);
      var sizing_tol_cond = document.getElementById("sizing_tol_cond").value;

      if (sizing_tol_cond == 1) 
      {
          document.getElementById("sizing_cond1").value = 2;
          document.getElementById("sizing_cond2").value = 2;

          var tolarance = ((sizing_tol_value2 * sizing_tol_value1) / 100);
          var sizing_tol_cal_value2 = sizing_tol_value1 + tolarance;
          var sizing_tol_cal_value1 = sizing_tol_value1 - tolarance;

          document.getElementById("sizing_value1").value = sizing_tol_cal_value1.toFixed(5);
          document.getElementById("sizing_value2").value = sizing_tol_cal_value2.toFixed(5);
      }

      if (sizing_tol_cond == 2)
      {
          document.getElementById("sizing_cond1").value = 2;
          document.getElementById("sizing_cond2").value = 2;

          var tolarance = ((sizing_tol_value2 * sizing_tol_value1) / 100);
          var sizing_tol_cal_value2 = sizing_tol_value1 + tolarance;

          document.getElementById("sizing_value1").value = sizing_tol_value1;
          document.getElementById("sizing_value2").value = sizing_tol_cal_value2.toFixed(5);
      }

      if (sizing_tol_cond == 3)
      {
          document.getElementById("sizing_cond1").value = 2;
          document.getElementById("sizing_cond2").value = 2;

          var tolarance = ((sizing_tol_value2 * sizing_tol_value1) / 100);
          var sizing_tol_cal_value2 = sizing_tol_value1 - tolarance;

          document.getElementById("sizing_value2").value = sizing_tol_value1;
          document.getElementById("sizing_value1").value = sizing_tol_cal_value2.toFixed(5);
      }

      if(isNaN(document.getElementById("sizing_tol_value1").value))
      {
          number_alert("sizing_tol_value1");
          return false;
      }

      if(isNaN(document.getElementById("sizing_tol_value2").value))
      {
          number_alert("sizing_tol_value2");
          return false;
      }
  }

  function sizing_tol_condition()
  {
      var sizing_tol_value1 = parseFloat(document.getElementById("sizing_tol_value1").value);
      var sizing_tol_value2 = parseFloat(document.getElementById("sizing_tol_value2").value);
      var sizing_tol_cond = document.getElementById("sizing_tol_cond").value;

      if (sizing_tol_cond == 1) 
      {
          document.getElementById("sizing_cond1").value = 2;
          document.getElementById("sizing_cond2").value = 2;

          var tolarance = ((sizing_tol_value2 * sizing_tol_value1) / 100);
          var sizing_tol_cal_value2 = sizing_tol_value1 + tolarance;
          var sizing_tol_cal_value1 = sizing_tol_value1 - tolarance;

          document.getElementById("sizing_value1").value = sizing_tol_cal_value1.toFixed(5);
          document.getElementById("sizing_value2").value = sizing_tol_cal_value2.toFixed(5);
      }

      if (sizing_tol_cond == 2)
      {
          document.getElementById("sizing_cond1").value = 2;
          document.getElementById("sizing_cond2").value = 2;

          var tolarance = ((sizing_tol_value2 * sizing_tol_value1) / 100);
          var sizing_tol_cal_value2 = sizing_tol_value1 + tolarance;

          document.getElementById("sizing_value1").value = sizing_tol_value1;
          document.getElementById("sizing_value2").value = sizing_tol_cal_value2.toFixed(5);
      }

      if (sizing_tol_cond == 3)
      {
          document.getElementById("sizing_cond1").value = 2;
          document.getElementById("sizing_cond2").value = 2;

          var tolarance = ((sizing_tol_value2 * sizing_tol_value1) / 100);
          var sizing_tol_cal_value2 = sizing_tol_value1 - tolarance;

          document.getElementById("sizing_value2").value = sizing_tol_value1;
          document.getElementById("sizing_value1").value = sizing_tol_cal_value2.toFixed(5);
      }

      if(isNaN(document.getElementById("sizing_tol_value1").value))
      {
          number_alert("sizing_tol_value1");
          return false;
      }

      if(isNaN(document.getElementById("sizing_tol_value2").value))
      {
          number_alert("sizing_tol_value2");
          return false;
      }
  }


  function whiteness_tol_cal_1()
  {
      // var whiteness_tol_value1 = parseFloat(document.getElementById("whiteness_tol_value1").value);
      // var whiteness_tol_value2 = parseFloat(document.getElementById("whiteness_tol_value2").value);

      // if(isNaN(document.getElementById("whiteness_tol_value1").value))
      // {
      //     number_alert("whiteness_tol_value1");
      //     return false;
      // }

      // if(isNaN(document.getElementById("whiteness_tol_value2").value))
      // {
      //     number_alert("whiteness_tol_value2");
      //     return false;
      // }

      // document.getElementById("whiteness_cond1").value = 1;
      // document.getElementById("whiteness_cond2").value = 1;

      // var tolarance = (whiteness_tol_value2 / 100);
      // var whiteness_tol_cal_value2 = whiteness_tol_value1 + tolarance;
      // var whiteness_tol_cal_value1 = whiteness_tol_value1 - tolarance;

      // document.getElementById("whiteness_value1").value = whiteness_tol_cal_value1.toFixed(5);
      // document.getElementById("whiteness_value2").value = whiteness_tol_cal_value2.toFixed(5);

      var whiteness_tol_value1 = parseFloat(document.getElementById("whiteness_tol_value1").value);
      var whiteness_tol_value2 = parseFloat(document.getElementById("whiteness_tol_value2").value);
      var whiteness_tol_cond = document.getElementById("whiteness_tol_cond").value;

      if (whiteness_tol_cond == 1) 
      {
          document.getElementById("whiteness_cond1").value = 2;
          document.getElementById("whiteness_cond2").value = 2;

          var tolarance = ((whiteness_tol_value2 * whiteness_tol_value1) / 100);
          var whiteness_tol_cal_value2 = whiteness_tol_value1 + tolarance;
          var whiteness_tol_cal_value1 = whiteness_tol_value1 - tolarance;

          document.getElementById("whiteness_value1").value = whiteness_tol_cal_value1.toFixed(5);
          document.getElementById("whiteness_value2").value = whiteness_tol_cal_value2.toFixed(5);
      }

      if (whiteness_tol_cond == 2)
      {
          document.getElementById("whiteness_cond1").value = 2;
          document.getElementById("whiteness_cond2").value = 2;

          var tolarance = ((whiteness_tol_value2 * whiteness_tol_value1) / 100);
          var whiteness_tol_cal_value2 = whiteness_tol_value1 + tolarance;

          document.getElementById("whiteness_value1").value = whiteness_tol_value1;
          document.getElementById("whiteness_value2").value = whiteness_tol_cal_value2.toFixed(5);
      }

      if (whiteness_tol_cond == 3)
      {
          document.getElementById("whiteness_cond1").value = 2;
          document.getElementById("whiteness_cond2").value = 2;

          var tolarance = ((whiteness_tol_value2 * whiteness_tol_value1) / 100);
          var whiteness_tol_cal_value2 = whiteness_tol_value1 - tolarance;

          document.getElementById("whiteness_value2").value = whiteness_tol_value1;
          document.getElementById("whiteness_value1").value = whiteness_tol_cal_value2.toFixed(5);
      }

      if(isNaN(document.getElementById("whiteness_tol_value1").value))
      {
          number_alert("whiteness_tol_value1");
          return false;
      }

      if(isNaN(document.getElementById("whiteness_tol_value2").value))
      {
          number_alert("whiteness_tol_value2");
          return false;
      }
  }


  function whiteness_tol_cal_2()
  {
      var whiteness_tol_value1 = parseFloat(document.getElementById("whiteness_tol_value1").value);
      var whiteness_tol_value2 = parseFloat(document.getElementById("whiteness_tol_value2").value);
      var whiteness_tol_cond = document.getElementById("whiteness_tol_cond").value;

      if (whiteness_tol_cond == 1) 
      {
          document.getElementById("whiteness_cond1").value = 2;
          document.getElementById("whiteness_cond2").value = 2;

          var tolarance = ((whiteness_tol_value2 * whiteness_tol_value1) / 100);
          var whiteness_tol_cal_value2 = whiteness_tol_value1 + tolarance;
          var whiteness_tol_cal_value1 = whiteness_tol_value1 - tolarance;

          document.getElementById("whiteness_value1").value = whiteness_tol_cal_value1.toFixed(5);
          document.getElementById("whiteness_value2").value = whiteness_tol_cal_value2.toFixed(5);
      }

      if (whiteness_tol_cond == 2)
      {
          document.getElementById("whiteness_cond1").value = 2;
          document.getElementById("whiteness_cond2").value = 2;

          var tolarance = ((whiteness_tol_value2 * whiteness_tol_value1) / 100);
          var whiteness_tol_cal_value2 = whiteness_tol_value1 + tolarance;

          document.getElementById("whiteness_value1").value = whiteness_tol_value1;
          document.getElementById("whiteness_value2").value = whiteness_tol_cal_value2.toFixed(5);
      }

      if (whiteness_tol_cond == 3)
      {
          document.getElementById("whiteness_cond1").value = 2;
          document.getElementById("whiteness_cond2").value = 2;

          var tolarance = ((whiteness_tol_value2 * whiteness_tol_value1) / 100);
          var whiteness_tol_cal_value2 = whiteness_tol_value1 - tolarance;

          document.getElementById("whiteness_value2").value = whiteness_tol_value1;
          document.getElementById("whiteness_value1").value = whiteness_tol_cal_value2.toFixed(5);
      }

      if(isNaN(document.getElementById("whiteness_tol_value1").value))
      {
          number_alert("whiteness_tol_value1");
          return false;
      }

      if(isNaN(document.getElementById("whiteness_tol_value2").value))
      {
          number_alert("whiteness_tol_value2");
          return false;
      }
  }

  function whiteness_tol_condition()
  {
      var whiteness_tol_value1 = parseFloat(document.getElementById("whiteness_tol_value1").value);
      var whiteness_tol_value2 = parseFloat(document.getElementById("whiteness_tol_value2").value);
      var whiteness_tol_cond = document.getElementById("whiteness_tol_cond").value;

      if (whiteness_tol_cond == 1) 
      {
          document.getElementById("whiteness_cond1").value = 2;
          document.getElementById("whiteness_cond2").value = 2;

          var tolarance = ((whiteness_tol_value2 * whiteness_tol_value1) / 100);
          var whiteness_tol_cal_value2 = whiteness_tol_value1 + tolarance;
          var whiteness_tol_cal_value1 = whiteness_tol_value1 - tolarance;

          document.getElementById("whiteness_value1").value = whiteness_tol_cal_value1.toFixed(5);
          document.getElementById("whiteness_value2").value = whiteness_tol_cal_value2.toFixed(5);
      }

      if (whiteness_tol_cond == 2)
      {
          document.getElementById("whiteness_cond1").value = 2;
          document.getElementById("whiteness_cond2").value = 2;

          var tolarance = ((whiteness_tol_value2 * whiteness_tol_value1) / 100);
          var whiteness_tol_cal_value2 = whiteness_tol_value1 + tolarance;

          document.getElementById("whiteness_value1").value = whiteness_tol_value1;
          document.getElementById("whiteness_value2").value = whiteness_tol_cal_value2.toFixed(5);
      }

      if (whiteness_tol_cond == 3)
      {
          document.getElementById("whiteness_cond1").value = 2;
          document.getElementById("whiteness_cond2").value = 2;

          var tolarance = ((whiteness_tol_value2 * whiteness_tol_value1) / 100);
          var whiteness_tol_cal_value2 = whiteness_tol_value1 - tolarance;

          document.getElementById("whiteness_value2").value = whiteness_tol_value1;
          document.getElementById("whiteness_value1").value = whiteness_tol_cal_value2.toFixed(5);
      }

      if(isNaN(document.getElementById("whiteness_tol_value1").value))
      {
          number_alert("whiteness_tol_value1");
          return false;
      }

      if(isNaN(document.getElementById("whiteness_tol_value2").value))
      {
          number_alert("whiteness_tol_value2");
          return false;
      }
  }


  //for printing 
  //for rubbing dry
  function rubbing_dry_tol_cal_1()
  {
      // var rubbing_dry_dry__tol_value1 = parseFloat(document.getElementById("rubbing_dry_dry__tol_value1").value);
      // var rubbing_dry_tol_value2 = parseFloat(document.getElementById("rubbing_dry_tol_value2").value);

      // if(isNaN(document.getElementById("rubbing_dry_tol_value1").value))
      // {
      //     number_alert("rubbing_dry_tol_value1");
      //     return false;
      // }

      // if(isNaN(document.getElementById("rubbing_dry_tol_value2").value))
      // {
      //     number_alert("rubbing_dry_tol_value2");
      //     return false;
      // }

      // document.getElementById("rubbing_dry_cond1").value = 1;
      // document.getElementById("rubbing_dry_cond2").value = 1;

      // var tolarance = (rubbing_dry_tol_value2 / 100);
      // var rubbing_dry_tol_cal_value2 = rubbing_dry_tol_value1 + tolarance;
      // var rubbing_dry_tol_cal_value1 = rubbing_dry_tol_value1 - tolarance;

      // document.getElementById("rubbing_dry_value1").value = rubbing_dry_tol_cal_value1.toFixed(5);
      // document.getElementById("rubbing_dry_value2").value = rubbing_dry_tol_cal_value2.toFixed(5);

      var rubbing_dry_tol_value1 = parseFloat(document.getElementById("rubbing_dry_tol_value1").value);
      var rubbing_dry_tol_value2 = parseFloat(document.getElementById("rubbing_dry_tol_value2").value);
      var rubbing_dry_tol_cond = document.getElementById("rubbing_dry_tol_cond").value;

      if (rubbing_dry_tol_cond == 1) 
      {
          document.getElementById("rubbing_dry_cond1").value = 2;
          document.getElementById("rubbing_dry_cond2").value = 2;

          var tolarance = ((rubbing_dry_tol_value2 * rubbing_dry_tol_value1) / 100);
          var rubbing_dry_tol_cal_value2 = rubbing_dry_tol_value1 + tolarance;
          var rubbing_dry_tol_cal_value1 = rubbing_dry_tol_value1 - tolarance;

          document.getElementById("rubbing_dry_value1").value = rubbing_dry_tol_cal_value1.toFixed(5);
          document.getElementById("rubbing_dry_value2").value = rubbing_dry_tol_cal_value2.toFixed(5);
      }

      if (rubbing_dry_tol_cond == 2)
      {
          document.getElementById("rubbing_dry_cond1").value = 2;
          document.getElementById("rubbing_dry_cond2").value = 2;

          var tolarance = ((rubbing_dry_tol_value2 * rubbing_dry_tol_value1) / 100);
          var rubbing_dry_tol_cal_value2 = rubbing_dry_tol_value1 + tolarance;

          document.getElementById("rubbing_dry_value1").value = rubbing_dry_tol_value1;
          document.getElementById("rubbing_dry_value2").value = rubbing_dry_tol_cal_value2.toFixed(5);
      }

      if (rubbing_dry_tol_cond == 3)
      {
          document.getElementById("rubbing_dry_cond1").value = 2;
          document.getElementById("rubbing_dry_cond2").value = 2;

          var tolarance = ((rubbing_dry_tol_value2 * rubbing_dry_tol_value1) / 100);
          var rubbing_dry_tol_cal_value2 = rubbing_dry_tol_value1 - tolarance;

          document.getElementById("rubbing_dry_value2").value = rubbing_dry_tol_value1;
          document.getElementById("rubbing_dry_value1").value = rubbing_dry_tol_cal_value2.toFixed(5);
      }

      if(isNaN(document.getElementById("rubbing_dry_tol_value1").value))
      {
          number_alert("rubbing_dry_tol_value1");
          return false;
      }

      if(isNaN(document.getElementById("rubbing_dry_tol_value2").value))
      {
          number_alert("rubbing_dry_tol_value2");
          return false;
      }
  }


  function rubbing_dry_tol_cal_2()
  {
      var rubbing_dry_tol_value1 = parseFloat(document.getElementById("rubbing_dry_tol_value1").value);
      var rubbing_dry_tol_value2 = parseFloat(document.getElementById("rubbing_dry_tol_value2").value);
      var rubbing_dry_tol_cond = document.getElementById("rubbing_dry_tol_cond").value;

      if (rubbing_dry_tol_cond == 1) 
      {
          document.getElementById("rubbing_dry_cond1").value = 2;
          document.getElementById("rubbing_dry_cond2").value = 2;

          var tolarance = ((rubbing_dry_tol_value2 * rubbing_dry_tol_value1) / 100);
          var rubbing_dry_tol_cal_value2 = rubbing_dry_tol_value1 + tolarance;
          var rubbing_dry_tol_cal_value1 = rubbing_dry_tol_value1 - tolarance;

          document.getElementById("rubbing_dry_value1").value = rubbing_dry_tol_cal_value1.toFixed(5);
          document.getElementById("rubbing_dry_value2").value = rubbing_dry_tol_cal_value2.toFixed(5);
      }

      if (rubbing_dry_tol_cond == 2)
      {
          document.getElementById("rubbing_dry_cond1").value = 2;
          document.getElementById("rubbing_dry_cond2").value = 2;

          var tolarance = ((rubbing_dry_tol_value2 * rubbing_dry_tol_value1) / 100);
          var rubbing_dry_tol_cal_value2 = rubbing_dry_tol_value1 + tolarance;

          document.getElementById("rubbing_dry_value1").value = rubbing_dry_tol_value1;
          document.getElementById("rubbing_dry_value2").value = rubbing_dry_tol_cal_value2.toFixed(5);
      }

      if (rubbing_dry_tol_cond == 3)
      {
          document.getElementById("rubbing_dry_cond1").value = 2;
          document.getElementById("rubbing_dry_cond2").value = 2;

          var tolarance = ((rubbing_dry_tol_value2 * rubbing_dry_tol_value1) / 100);
          var rubbing_dry_tol_cal_value2 = rubbing_dry_tol_value1 - tolarance;

          document.getElementById("rubbing_dry_value2").value = rubbing_dry_tol_value1;
          document.getElementById("rubbing_dry_value1").value = rubbing_dry_tol_cal_value2.toFixed(5);
      }

      if(isNaN(document.getElementById("rubbing_dry_tol_value1").value))
      {
          number_alert("rubbing_dry_tol_value1");
          return false;
      }

      if(isNaN(document.getElementById("rubbing_dry_tol_value2").value))
      {
          number_alert("rubbing_dry_tol_value2");
          return false;
      }
  }

  function rubbing_dry_tol_condition()
  {
      var rubbing_dry_tol_value1 = parseFloat(document.getElementById("rubbing_dry_tol_value1").value);
      var rubbing_dry_tol_value2 = parseFloat(document.getElementById("rubbing_dry_tol_value2").value);
      var rubbing_dry_tol_cond = document.getElementById("rubbing_dry_tol_cond").value;

      if (rubbing_dry_tol_cond == 1) 
      {
          document.getElementById("rubbing_dry_cond1").value = 2;
          document.getElementById("rubbing_dry_cond2").value = 2;

          var tolarance = ((rubbing_dry_tol_value2 * rubbing_dry_tol_value1) / 100);
          var rubbing_dry_tol_cal_value2 = rubbing_dry_tol_value1 + tolarance;
          var rubbing_dry_tol_cal_value1 = rubbing_dry_tol_value1 - tolarance;

          document.getElementById("rubbing_dry_value1").value = rubbing_dry_tol_cal_value1.toFixed(5);
          document.getElementById("rubbing_dry_value2").value = rubbing_dry_tol_cal_value2.toFixed(5);
      }

      if (rubbing_dry_tol_cond == 2)
      {
          document.getElementById("rubbing_dry_cond1").value = 2;
          document.getElementById("rubbing_dry_cond2").value = 2;

          var tolarance = ((rubbing_dry_tol_value2 * rubbing_dry_tol_value1) / 100);
          var rubbing_dry_tol_cal_value2 = rubbing_dry_tol_value1 + tolarance;

          document.getElementById("rubbing_dry_value1").value = rubbing_dry_tol_value1;
          document.getElementById("rubbing_dry_value2").value = rubbing_dry_tol_cal_value2.toFixed(5);
      }

      if (rubbing_dry_tol_cond == 3)
      {
          document.getElementById("rubbing_dry_cond1").value = 2;
          document.getElementById("rubbing_dry_cond2").value = 2;

          var tolarance = ((rubbing_dry_tol_value2 * rubbing_dry_tol_value1) / 100);
          var rubbing_dry_tol_cal_value2 = rubbing_dry_tol_value1 - tolarance;

          document.getElementById("rubbing_dry_value2").value = rubbing_dry_tol_value1;
          document.getElementById("rubbing_dry_value1").value = rubbing_dry_tol_cal_value2.toFixed(5);
      }

      if(isNaN(document.getElementById("rubbing_dry_tol_value1").value))
      {
          number_alert("rubbing_dry_tol_value1");
          return false;
      }

      if(isNaN(document.getElementById("rubbing_dry_tol_value2").value))
      {
          number_alert("rubbing_dry_tol_value2");
          return false;
      }
  }


  function rubbing_wet_tol_cal_1()
  {
      // var rubbing_wet_tol_value1 = parseFloat(document.getElementById("rubbing_wet_tol_value1").value);
      // var rubbing_wet_tol_value2 = parseFloat(document.getElementById("rubbing_wet_tol_value2").value);

      // if(isNaN(document.getElementById("rubbing_wet_tol_value1").value))
      // {
      //     number_alert("rubbing_wet_tol_value1");
      //     return false;
      // }

      // if(isNaN(document.getElementById("rubbing_wet_tol_value2").value))
      // {
      //     number_alert("rubbing_wet_tol_value2");
      //     return false;
      // }

      // document.getElementById("rubbing_wet_cond1").value = 1;
      // document.getElementById("rubbing_wet_cond2").value = 1;

      // var tolarance = (rubbing_wet_tol_value2 / 100);
      // var rubbing_wet_tol_cal_value2 = rubbing_wet_tol_value1 + tolarance;
      // var rubbing_wet_tol_cal_value1 = rubbing_wet_tol_value1 - tolarance;

      // document.getElementById("rubbing_wet_value1").value = rubbing_wet_tol_cal_value1.toFixed(5);
      // document.getElementById("rubbing_wet_value2").value = rubbing_wet_tol_cal_value2.toFixed(5);

      var rubbing_wet_tol_value1 = parseFloat(document.getElementById("rubbing_wet_tol_value1").value);
      var rubbing_wet_tol_value2 = parseFloat(document.getElementById("rubbing_wet_tol_value2").value);
      var rubbing_wet_tol_cond = document.getElementById("rubbing_wet_tol_cond").value;

      if (rubbing_wet_tol_cond == 1) 
      {
          document.getElementById("rubbing_wet_cond1").value = 2;
          document.getElementById("rubbing_wet_cond2").value = 2;

          var tolarance = ((rubbing_wet_tol_value2 * rubbing_wet_tol_value1) / 100);
          var rubbing_wet_tol_cal_value2 = rubbing_wet_tol_value1 + tolarance;
          var rubbing_wet_tol_cal_value1 = rubbing_wet_tol_value1 - tolarance;

          document.getElementById("rubbing_wet_value1").value = rubbing_wet_tol_cal_value1.toFixed(5);
          document.getElementById("rubbing_wet_value2").value = rubbing_wet_tol_cal_value2.toFixed(5);
      }

      if (rubbing_wet_tol_cond == 2)
      {
          document.getElementById("rubbing_wet_cond1").value = 2;
          document.getElementById("rubbing_wet_cond2").value = 2;

          var tolarance = ((rubbing_wet_tol_value2 * rubbing_wet_tol_value1) / 100);
          var rubbing_wet_tol_cal_value2 = rubbing_wet_tol_value1 + tolarance;

          document.getElementById("rubbing_wet_value1").value = rubbing_wet_tol_value1;
          document.getElementById("rubbing_wet_value2").value = rubbing_wet_tol_cal_value2.toFixed(5);
      }

      if (rubbing_wet_tol_cond == 3)
      {
          document.getElementById("rubbing_wet_cond1").value = 2;
          document.getElementById("rubbing_wet_cond2").value = 2;

          var tolarance = ((rubbing_wet_tol_value2 * rubbing_wet_tol_value1) / 100);
          var rubbing_wet_tol_cal_value2 = rubbing_wet_tol_value1 - tolarance;

          document.getElementById("rubbing_wet_value2").value = rubbing_wet_tol_value1;
          document.getElementById("rubbing_wet_value1").value = rubbing_wet_tol_cal_value2.toFixed(5);
      }

      if(isNaN(document.getElementById("rubbing_wet_tol_value1").value))
      {
          number_alert("rubbing_wet_tol_value1");
          return false;
      }

      if(isNaN(document.getElementById("rubbing_wet_tol_value2").value))
      {
          number_alert("rubbing_wet_tol_value2");
          return false;
      }
  }


  function rubbing_wet_tol_cal_2()
  {
      var rubbing_wet_tol_value1 = parseFloat(document.getElementById("rubbing_wet_tol_value1").value);
      var rubbing_wet_tol_value2 = parseFloat(document.getElementById("rubbing_wet_tol_value2").value);
      var rubbing_wet_tol_cond = document.getElementById("rubbing_wet_tol_cond").value;

      if (rubbing_wet_tol_cond == 1) 
      {
          document.getElementById("rubbing_wet_cond1").value = 2;
          document.getElementById("rubbing_wet_cond2").value = 2;

          var tolarance = ((rubbing_wet_tol_value2 * rubbing_wet_tol_value1) / 100);
          var rubbing_wet_tol_cal_value2 = rubbing_wet_tol_value1 + tolarance;
          var rubbing_wet_tol_cal_value1 = rubbing_wet_tol_value1 - tolarance;

          document.getElementById("rubbing_wet_value1").value = rubbing_wet_tol_cal_value1.toFixed(5);
          document.getElementById("rubbing_wet_value2").value = rubbing_wet_tol_cal_value2.toFixed(5);
      }

      if (rubbing_wet_tol_cond == 2)
      {
          document.getElementById("rubbing_wet_cond1").value = 2;
          document.getElementById("rubbing_wet_cond2").value = 2;

          var tolarance = ((rubbing_wet_tol_value2 * rubbing_wet_tol_value1) / 100);
          var rubbing_wet_tol_cal_value2 = rubbing_wet_tol_value1 + tolarance;

          document.getElementById("rubbing_wet_value1").value = rubbing_wet_tol_value1;
          document.getElementById("rubbing_wet_value2").value = rubbing_wet_tol_cal_value2.toFixed(5);
      }

      if (rubbing_wet_tol_cond == 3)
      {
          document.getElementById("rubbing_wet_cond1").value = 2;
          document.getElementById("rubbing_wet_cond2").value = 2;

          var tolarance = ((rubbing_wet_tol_value2 * rubbing_wet_tol_value1) / 100);
          var rubbing_wet_tol_cal_value2 = rubbing_wet_tol_value1 - tolarance;

          document.getElementById("rubbing_wet_value2").value = rubbing_wet_tol_value1;
          document.getElementById("rubbing_wet_value1").value = rubbing_wet_tol_cal_value2.toFixed(5);
      }

      if(isNaN(document.getElementById("rubbing_wet_tol_value1").value))
      {
          number_alert("rubbing_wet_tol_value1");
          return false;
      }

      if(isNaN(document.getElementById("rubbing_wet_tol_value2").value))
      {
          number_alert("rubbing_wet_tol_value2");
          return false;
      }
  }

  function rubbing_wet_tol_condition()
  {
      var rubbing_wet_tol_value1 = parseFloat(document.getElementById("rubbing_wet_tol_value1").value);
      var rubbing_wet_tol_value2 = parseFloat(document.getElementById("rubbing_wet_tol_value2").value);
      var rubbing_wet_tol_cond = document.getElementById("rubbing_wet_tol_cond").value;

      if (rubbing_wet_tol_cond == 1) 
      {
          document.getElementById("rubbing_wet_cond1").value = 2;
          document.getElementById("rubbing_wet_cond2").value = 2;

          var tolarance = ((rubbing_wet_tol_value2 * rubbing_wet_tol_value1) / 100);
          var rubbing_wet_tol_cal_value2 = rubbing_wet_tol_value1 + tolarance;
          var rubbing_wet_tol_cal_value1 = rubbing_wet_tol_value1 - tolarance;

          document.getElementById("rubbing_wet_value1").value = rubbing_wet_tol_cal_value1.toFixed(5);
          document.getElementById("rubbing_wet_value2").value = rubbing_wet_tol_cal_value2.toFixed(5);
      }

      if (rubbing_wet_tol_cond == 2)
      {
          document.getElementById("rubbing_wet_cond1").value = 2;
          document.getElementById("rubbing_wet_cond2").value = 2;

          var tolarance = ((rubbing_wet_tol_value2 * rubbing_wet_tol_value1) / 100);
          var rubbing_wet_tol_cal_value2 = rubbing_wet_tol_value1 + tolarance;

          document.getElementById("rubbing_wet_value1").value = rubbing_wet_tol_value1;
          document.getElementById("rubbing_wet_value2").value = rubbing_wet_tol_cal_value2.toFixed(5);
      }

      if (rubbing_wet_tol_cond == 3)
      {
          document.getElementById("rubbing_wet_cond1").value = 2;
          document.getElementById("rubbing_wet_cond2").value = 2;

          var tolarance = ((rubbing_wet_tol_value2 * rubbing_wet_tol_value1) / 100);
          var rubbing_wet_tol_cal_value2 = rubbing_wet_tol_value1 - tolarance;

          document.getElementById("rubbing_wet_value2").value = rubbing_wet_tol_value1;
          document.getElementById("rubbing_wet_value1").value = rubbing_wet_tol_cal_value2.toFixed(5);
      }

      if(isNaN(document.getElementById("rubbing_wet_tol_value1").value))
      {
          number_alert("rubbing_wet_tol_value1");
          return false;
      }

      if(isNaN(document.getElementById("rubbing_wet_tol_value2").value))
      {
          number_alert("rubbing_wet_tol_value2");
          return false;
      }
  }

  //end of printing

  function pilling_tol_cal_1()
  {
      // var pilling_tol_value1 = parseFloat(document.getElementById("pilling_tol_value1").value);
      // var pilling_tol_value2 = parseFloat(document.getElementById("pilling_tol_value2").value);

      // if(isNaN(document.getElementById("pilling_tol_value1").value))
      // {
      //     number_alert("pilling_tol_value1");
      //     return false;
      // }

      // if(isNaN(document.getElementById("pilling_tol_value2").value))
      // {
      //     number_alert("pilling_tol_value2");
      //     return false;
      // }

      // document.getElementById("pilling_cond1").value = 1;
      // document.getElementById("pilling_cond2").value = 1;

      // var tolarance = (pilling_tol_value2 / 100);
      // var pilling_tol_cal_value2 = pilling_tol_value1 + tolarance;
      // var pilling_tol_cal_value1 = pilling_tol_value1 - tolarance;

      // document.getElementById("pilling_value1").value = pilling_tol_cal_value1.toFixed(5);
      // document.getElementById("pilling_value2").value = pilling_tol_cal_value2.toFixed(5);

      var pilling_tol_value1 = parseFloat(document.getElementById("pilling_tol_value1").value);
      var pilling_tol_value2 = parseFloat(document.getElementById("pilling_tol_value2").value);
      var pilling_tol_cond = document.getElementById("pilling_tol_cond").value;

      if (pilling_tol_cond == 1) 
      {
          document.getElementById("pilling_cond1").value = 2;
          document.getElementById("pilling_cond2").value = 2;

          var tolarance = ((pilling_tol_value2 * pilling_tol_value1) / 100);
          var pilling_tol_cal_value2 = pilling_tol_value1 + tolarance;
          var pilling_tol_cal_value1 = pilling_tol_value1 - tolarance;

          document.getElementById("pilling_value1").value = pilling_tol_cal_value1.toFixed(5);
          document.getElementById("pilling_value2").value = pilling_tol_cal_value2.toFixed(5);
      }

      if (pilling_tol_cond == 2)
      {
          document.getElementById("pilling_cond1").value = 2;
          document.getElementById("pilling_cond2").value = 2;

          var tolarance = ((pilling_tol_value2 * pilling_tol_value1) / 100);
          var pilling_tol_cal_value2 = pilling_tol_value1 + tolarance;

          document.getElementById("pilling_value1").value = pilling_tol_value1;
          document.getElementById("pilling_value2").value = pilling_tol_cal_value2.toFixed(5);
      }

      if (pilling_tol_cond == 3)
      {
          document.getElementById("pilling_cond1").value = 2;
          document.getElementById("pilling_cond2").value = 2;

          var tolarance = ((pilling_tol_value2 * pilling_tol_value1) / 100);
          var pilling_tol_cal_value2 = pilling_tol_value1 - tolarance;

          document.getElementById("pilling_value2").value = pilling_tol_value1;
          document.getElementById("pilling_value1").value = pilling_tol_cal_value2.toFixed(5);
      }

      if(isNaN(document.getElementById("pilling_tol_value1").value))
      {
          number_alert("pilling_tol_value1");
          return false;
      }

      if(isNaN(document.getElementById("pilling_tol_value2").value))
      {
          number_alert("pilling_tol_value2");
          return false;
      }
  }


  function pilling_tol_cal_2()
  {
      var pilling_tol_value1 = parseFloat(document.getElementById("pilling_tol_value1").value);
      var pilling_tol_value2 = parseFloat(document.getElementById("pilling_tol_value2").value);
      var pilling_tol_cond = document.getElementById("pilling_tol_cond").value;

      if (pilling_tol_cond == 1) 
      {
          document.getElementById("pilling_cond1").value = 2;
          document.getElementById("pilling_cond2").value = 2;

          var tolarance = ((pilling_tol_value2 * pilling_tol_value1) / 100);
          var pilling_tol_cal_value2 = pilling_tol_value1 + tolarance;
          var pilling_tol_cal_value1 = pilling_tol_value1 - tolarance;

          document.getElementById("pilling_value1").value = pilling_tol_cal_value1.toFixed(5);
          document.getElementById("pilling_value2").value = pilling_tol_cal_value2.toFixed(5);
      }

      if (pilling_tol_cond == 2)
      {
          document.getElementById("pilling_cond1").value = 2;
          document.getElementById("pilling_cond2").value = 2;

          var tolarance = ((pilling_tol_value2 * pilling_tol_value1) / 100);
          var pilling_tol_cal_value2 = pilling_tol_value1 + tolarance;

          document.getElementById("pilling_value1").value = pilling_tol_value1;
          document.getElementById("pilling_value2").value = pilling_tol_cal_value2.toFixed(5);
      }

      if (pilling_tol_cond == 3)
      {
          document.getElementById("pilling_cond1").value = 2;
          document.getElementById("pilling_cond2").value = 2;

          var tolarance = ((pilling_tol_value2 * pilling_tol_value1) / 100);
          var pilling_tol_cal_value2 = pilling_tol_value1 - tolarance;

          document.getElementById("pilling_value2").value = pilling_tol_value1;
          document.getElementById("pilling_value1").value = pilling_tol_cal_value2.toFixed(5);
      }

      if(isNaN(document.getElementById("pilling_tol_value1").value))
      {
          number_alert("pilling_tol_value1");
          return false;
      }

      if(isNaN(document.getElementById("pilling_tol_value2").value))
      {
          number_alert("pilling_tol_value2");
          return false;
      }
  }

  function pilling_tol_condition()
  {
      var pilling_tol_value1 = parseFloat(document.getElementById("pilling_tol_value1").value);
      var pilling_tol_value2 = parseFloat(document.getElementById("pilling_tol_value2").value);
      var pilling_tol_cond = document.getElementById("pilling_tol_cond").value;

      if (pilling_tol_cond == 1) 
      {
          document.getElementById("pilling_cond1").value = 2;
          document.getElementById("pilling_cond2").value = 2;

          var tolarance = ((pilling_tol_value2 * pilling_tol_value1) / 100);
          var pilling_tol_cal_value2 = pilling_tol_value1 + tolarance;
          var pilling_tol_cal_value1 = pilling_tol_value1 - tolarance;

          document.getElementById("pilling_value1").value = pilling_tol_cal_value1.toFixed(5);
          document.getElementById("pilling_value2").value = pilling_tol_cal_value2.toFixed(5);
      }

      if (pilling_tol_cond == 2)
      {
          document.getElementById("pilling_cond1").value = 2;
          document.getElementById("pilling_cond2").value = 2;

          var tolarance = ((pilling_tol_value2 * pilling_tol_value1) / 100);
          var pilling_tol_cal_value2 = pilling_tol_value1 + tolarance;

          document.getElementById("pilling_value1").value = pilling_tol_value1;
          document.getElementById("pilling_value2").value = pilling_tol_cal_value2.toFixed(5);
      }

      if (pilling_tol_cond == 3)
      {
          document.getElementById("pilling_cond1").value = 2;
          document.getElementById("pilling_cond2").value = 2;

          var tolarance = ((pilling_tol_value2 * pilling_tol_value1) / 100);
          var pilling_tol_cal_value2 = pilling_tol_value1 - tolarance;

          document.getElementById("pilling_value2").value = pilling_tol_value1;
          document.getElementById("pilling_value1").value = pilling_tol_cal_value2.toFixed(5);
      }

      if(isNaN(document.getElementById("pilling_tol_value1").value))
      {
          number_alert("pilling_tol_value1");
          return false;
      }

      if(isNaN(document.getElementById("pilling_tol_value2").value))
      {
          number_alert("pilling_tol_value2");
          return false;
      }
  }

  function ph_tol_cal_1()
  {
      // var ph_tol_value1 = parseFloat(document.getElementById("ph_tol_value1").value);
      // var ph_tol_value2 = parseFloat(document.getElementById("ph_tol_value2").value);

      // if(isNaN(document.getElementById("ph_tol_value1").value))
      // {
      //     number_alert("ph_tol_value1");
      //     return false;
      // }

      // if(isNaN(document.getElementById("ph_tol_value2").value))
      // {
      //     number_alert("ph_tol_value2");
      //     return false;
      // }

      // document.getElementById("ph_cond1").value = 1;
      // document.getElementById("ph_cond2").value = 1;

      // var tolarance = (ph_tol_value2 / 100);
      // var ph_tol_cal_value2 = ph_tol_value1 + tolarance;
      // var ph_tol_cal_value1 = ph_tol_value1 - tolarance;

      // document.getElementById("ph_value1").value = ph_tol_cal_value1.toFixed(5);
      // document.getElementById("ph_value2").value = ph_tol_cal_value2.toFixed(5);

      var ph_tol_value1 = parseFloat(document.getElementById("ph_tol_value1").value);
      var ph_tol_value2 = parseFloat(document.getElementById("ph_tol_value2").value);
      var ph_tol_cond = document.getElementById("ph_tol_cond").value;

      if (ph_tol_cond == 1) 
      {
          document.getElementById("ph_cond1").value = 2;
          document.getElementById("ph_cond2").value = 2;

          var tolarance = ((ph_tol_value2 * ph_tol_value1) / 100);
          var ph_tol_cal_value2 = ph_tol_value1 + tolarance;
          var ph_tol_cal_value1 = ph_tol_value1 - tolarance;

          document.getElementById("ph_value1").value = ph_tol_cal_value1.toFixed(5);
          document.getElementById("ph_value2").value = ph_tol_cal_value2.toFixed(5);
      }

      if (ph_tol_cond == 2)
      {
          document.getElementById("ph_cond1").value = 2;
          document.getElementById("ph_cond2").value = 2;

          var tolarance = ((ph_tol_value2 * ph_tol_value1) / 100);
          var ph_tol_cal_value2 = ph_tol_value1 + tolarance;

          document.getElementById("ph_value1").value = ph_tol_value1;
          document.getElementById("ph_value2").value = ph_tol_cal_value2.toFixed(5);
      }

      if (ph_tol_cond == 3)
      {
          document.getElementById("ph_cond1").value = 2;
          document.getElementById("ph_cond2").value = 2;

          var tolarance = ((ph_tol_value2 * ph_tol_value1) / 100);
          var ph_tol_cal_value2 = ph_tol_value1 - tolarance;

          document.getElementById("ph_value2").value = ph_tol_value1;
          document.getElementById("ph_value1").value = ph_tol_cal_value2.toFixed(5);
      }

      if(isNaN(document.getElementById("ph_tol_value1").value))
      {
          number_alert("ph_tol_value1");
          return false;
      }

      if(isNaN(document.getElementById("ph_tol_value2").value))
      {
          number_alert("ph_tol_value2");
          return false;
      }
  }


  function ph_tol_cal_2()
  {
      var ph_tol_value1 = parseFloat(document.getElementById("ph_tol_value1").value);
      var ph_tol_value2 = parseFloat(document.getElementById("ph_tol_value2").value);
      var ph_tol_cond = document.getElementById("ph_tol_cond").value;

      if (ph_tol_cond == 1) 
      {
          document.getElementById("ph_cond1").value = 2;
          document.getElementById("ph_cond2").value = 2;

          var tolarance = ((ph_tol_value2 * ph_tol_value1) / 100);
          var ph_tol_cal_value2 = ph_tol_value1 + tolarance;
          var ph_tol_cal_value1 = ph_tol_value1 - tolarance;

          document.getElementById("ph_value1").value = ph_tol_cal_value1.toFixed(5);
          document.getElementById("ph_value2").value = ph_tol_cal_value2.toFixed(5);
      }

      if (ph_tol_cond == 2)
      {
          document.getElementById("ph_cond1").value = 2;
          document.getElementById("ph_cond2").value = 2;

          var tolarance = ((ph_tol_value2 * ph_tol_value1) / 100);
          var ph_tol_cal_value2 = ph_tol_value1 + tolarance;

          document.getElementById("ph_value1").value = ph_tol_value1;
          document.getElementById("ph_value2").value = ph_tol_cal_value2.toFixed(5);
      }

      if (ph_tol_cond == 3)
      {
          document.getElementById("ph_cond1").value = 2;
          document.getElementById("ph_cond2").value = 2;

          var tolarance = ((ph_tol_value2 * ph_tol_value1) / 100);
          var ph_tol_cal_value2 = ph_tol_value1 - tolarance;

          document.getElementById("ph_value2").value = ph_tol_value1;
          document.getElementById("ph_value1").value = ph_tol_cal_value2.toFixed(5);
      }

      if(isNaN(document.getElementById("ph_tol_value1").value))
      {
          number_alert("ph_tol_value1");
          return false;
      }

      if(isNaN(document.getElementById("ph_tol_value2").value))
      {
          number_alert("ph_tol_value2");
          return false;
      }
  }

  function ph_tol_condition()
  {
      var ph_tol_value1 = parseFloat(document.getElementById("ph_tol_value1").value);
      var ph_tol_value2 = parseFloat(document.getElementById("ph_tol_value2").value);
      var ph_tol_cond = document.getElementById("ph_tol_cond").value;

      if (ph_tol_cond == 1) 
      {
          document.getElementById("ph_cond1").value = 2;
          document.getElementById("ph_cond2").value = 2;

          var tolarance = ((ph_tol_value2 * ph_tol_value1) / 100);
          var ph_tol_cal_value2 = ph_tol_value1 + tolarance;
          var ph_tol_cal_value1 = ph_tol_value1 - tolarance;

          document.getElementById("ph_value1").value = ph_tol_cal_value1.toFixed(5);
          document.getElementById("ph_value2").value = ph_tol_cal_value2.toFixed(5);
      }

      if (ph_tol_cond == 2)
      {
          document.getElementById("ph_cond1").value = 2;
          document.getElementById("ph_cond2").value = 2;

          var tolarance = ((ph_tol_value2 * ph_tol_value1) / 100);
          var ph_tol_cal_value2 = ph_tol_value1 + tolarance;

          document.getElementById("ph_value1").value = ph_tol_value1;
          document.getElementById("ph_value2").value = ph_tol_cal_value2.toFixed(5);
      }

      if (ph_tol_cond == 3)
      {
          document.getElementById("ph_cond1").value = 2;
          document.getElementById("ph_cond2").value = 2;

          var tolarance = ((ph_tol_value2 * ph_tol_value1) / 100);
          var ph_tol_cal_value2 = ph_tol_value1 - tolarance;

          document.getElementById("ph_value2").value = ph_tol_value1;
          document.getElementById("ph_value1").value = ph_tol_cal_value2.toFixed(5);
      }

      if(isNaN(document.getElementById("ph_tol_value1").value))
      {
          number_alert("ph_tol_value1");
          return false;
      }

      if(isNaN(document.getElementById("ph_tol_value2").value))
      {
          number_alert("ph_tol_value2");
          return false;
      }
  }



  //for fiber total polyester
  function fiber_total_polyester_tol_condition()
  {
      var fiber_total_polyester_tol_value1 = parseFloat(document.getElementById("fiber_total_polyester_tol_value1").value);
      var fiber_total_polyester_tol_value2 = parseFloat(document.getElementById("fiber_total_polyester_tol_value2").value);
      var fiber_total_polyester_tol_cond = document.getElementById("fiber_total_polyester_tol_cond").value;

      if (fiber_total_polyester_tol_cond == 1) 
      {
          document.getElementById("fiber_total_polyester_cond1").value = 2;
          document.getElementById("fiber_total_polyester_cond2").value = 2;

          //var tolarance = ((fiber_total_polyester_tol_value2 * fiber_total_polyester_tol_value1) / 100);
          var tolarance = fiber_total_polyester_tol_value2;
          var fiber_total_polyester_tol_cal_value2 = fiber_total_polyester_tol_value1 + tolarance;
          var fiber_total_polyester_tol_cal_value1 = fiber_total_polyester_tol_value1 - tolarance;

          document.getElementById("fiber_total_polyester_value1").value = fiber_total_polyester_tol_cal_value1.toFixed(2);
          document.getElementById("fiber_total_polyester_value2").value = fiber_total_polyester_tol_cal_value2.toFixed(2);
      }

      if (fiber_total_polyester_tol_cond == 2)
      {
          document.getElementById("fiber_total_polyester_cond1").value = 2;
          document.getElementById("fiber_total_polyester_cond2").value = 2;

          var tolarance = fiber_total_polyester_tol_value2;
          var fiber_total_polyester_tol_cal_value2 = fiber_total_polyester_tol_value1 + tolarance;

          document.getElementById("fiber_total_polyester_value1").value = fiber_total_polyester_tol_value1;
          document.getElementById("fiber_total_polyester_value2").value = fiber_total_polyester_tol_cal_value2.toFixed(2);
      }

      if (fiber_total_polyester_tol_cond == 3)
      {
          document.getElementById("fiber_total_polyester_cond1").value = 2;
          document.getElementById("fiber_total_polyester_cond2").value = 2;

          var tolarance = fiber_total_polyester_tol_value2;
          var fiber_total_polyester_tol_cal_value2 = fiber_total_polyester_tol_value1 - tolarance;

          document.getElementById("fiber_total_polyester_value2").value = fiber_total_polyester_tol_value1;
          document.getElementById("fiber_total_polyester_value1").value = fiber_total_polyester_tol_cal_value2.toFixed(2);
      }

      if(isNaN(document.getElementById("fiber_total_polyester_tol_value1").value))
      {
          number_alert("fiber_total_polyester_tol_value1");
          return false;
      }

      if(isNaN(document.getElementById("fiber_total_polyester_tol_value2").value))
      {
          number_alert("fiber_total_polyester_tol_value2");
          return false;
      }
  }

  function fiber_total_polyester_tol_cal_1()
  {
      var fiber_total_polyester_tol_value1 = parseFloat(document.getElementById("fiber_total_polyester_tol_value1").value);
      var fiber_total_polyester_tol_value2 = parseFloat(document.getElementById("fiber_total_polyester_tol_value2").value);
      var fiber_total_polyester_tol_cond = document.getElementById("fiber_total_polyester_tol_cond").value;

      if (fiber_total_polyester_tol_cond == 1) 
      {
          document.getElementById("fiber_total_polyester_cond1").value = 2;
          document.getElementById("fiber_total_polyester_cond2").value = 2;

          //var tolarance = ((fiber_total_polyester_tol_value2 * fiber_total_polyester_tol_value1) / 100);
          var tolarance = fiber_total_polyester_tol_value2;
          var fiber_total_polyester_tol_cal_value2 = fiber_total_polyester_tol_value1 + tolarance;
          var fiber_total_polyester_tol_cal_value1 = fiber_total_polyester_tol_value1 - tolarance;

          document.getElementById("fiber_total_polyester_value1").value = fiber_total_polyester_tol_cal_value1.toFixed(2);
          document.getElementById("fiber_total_polyester_value2").value = fiber_total_polyester_tol_cal_value2.toFixed(2);
      }

      if (fiber_total_polyester_tol_cond == 2)
      {
          document.getElementById("fiber_total_polyester_cond1").value = 2;
          document.getElementById("fiber_total_polyester_cond2").value = 2;

          var tolarance = fiber_total_polyester_tol_value2;
          var fiber_total_polyester_tol_cal_value2 = fiber_total_polyester_tol_value1 + tolarance;

          document.getElementById("fiber_total_polyester_value1").value = fiber_total_polyester_tol_value1;
          document.getElementById("fiber_total_polyester_value2").value = fiber_total_polyester_tol_cal_value2.toFixed(2);
      }

      if (fiber_total_polyester_tol_cond == 3)
      {
          document.getElementById("fiber_total_polyester_cond1").value = 2;
          document.getElementById("fiber_total_polyester_cond2").value = 2;

          var tolarance = fiber_total_polyester_tol_value2;
          var fiber_total_polyester_tol_cal_value2 = fiber_total_polyester_tol_value1 - tolarance;

          document.getElementById("fiber_total_polyester_value2").value = fiber_total_polyester_tol_value1;
          document.getElementById("fiber_total_polyester_value1").value = fiber_total_polyester_tol_cal_value2.toFixed(2);
      }

      if(isNaN(document.getElementById("fiber_total_polyester_tol_value1").value))
      {
          number_alert("fiber_total_polyester_tol_value1");
          return false;
      }

      if(isNaN(document.getElementById("fiber_total_polyester_tol_value2").value))
      {
          number_alert("fiber_total_polyester_tol_value2");
          return false;
      }
  }

  function fiber_total_polyester_tol_cal_2()
  {
      var fiber_total_polyester_tol_value1 = parseFloat(document.getElementById("fiber_total_polyester_tol_value1").value);
      var fiber_total_polyester_tol_value2 = parseFloat(document.getElementById("fiber_total_polyester_tol_value2").value);
      var fiber_total_polyester_tol_cond = document.getElementById("fiber_total_polyester_tol_cond").value;

      if (fiber_total_polyester_tol_cond == 1) 
      {
          document.getElementById("fiber_total_polyester_cond1").value = 2;
          document.getElementById("fiber_total_polyester_cond2").value = 2;

          //var tolarance = ((fiber_total_polyester_tol_value2 * fiber_total_polyester_tol_value1) / 100);
          var tolarance = fiber_total_polyester_tol_value2;
          var fiber_total_polyester_tol_cal_value2 = fiber_total_polyester_tol_value1 + tolarance;
          var fiber_total_polyester_tol_cal_value1 = fiber_total_polyester_tol_value1 - tolarance;

          document.getElementById("fiber_total_polyester_value1").value = fiber_total_polyester_tol_cal_value1.toFixed(2);
          document.getElementById("fiber_total_polyester_value2").value = fiber_total_polyester_tol_cal_value2.toFixed(2);
      }

      if (fiber_total_polyester_tol_cond == 2)
      {
          document.getElementById("fiber_total_polyester_cond1").value = 2;
          document.getElementById("fiber_total_polyester_cond2").value = 2;

          var tolarance = fiber_total_polyester_tol_value2;
          var fiber_total_polyester_tol_cal_value2 = fiber_total_polyester_tol_value1 + tolarance;

          document.getElementById("fiber_total_polyester_value1").value = fiber_total_polyester_tol_value1;
          document.getElementById("fiber_total_polyester_value2").value = fiber_total_polyester_tol_cal_value2.toFixed(2);
      }

      if (fiber_total_polyester_tol_cond == 3)
      {
          document.getElementById("fiber_total_polyester_cond1").value = 2;
          document.getElementById("fiber_total_polyester_cond2").value = 2;

          var tolarance = fiber_total_polyester_tol_value2;
          var fiber_total_polyester_tol_cal_value2 = fiber_total_polyester_tol_value1 - tolarance;

          document.getElementById("fiber_total_polyester_value2").value = fiber_total_polyester_tol_value1;
          document.getElementById("fiber_total_polyester_value1").value = fiber_total_polyester_tol_cal_value2.toFixed(2);
      }

      if(isNaN(document.getElementById("fiber_total_polyester_tol_value1").value))
      {
          number_alert("fiber_total_polyester_tol_value1");
          return false;
      }

      if(isNaN(document.getElementById("fiber_total_polyester_tol_value2").value))
      {
          number_alert("fiber_total_polyester_tol_value2");
          return false;
      }
  }

  function fiber_total_polyester_condition() 
  {
      if (document.getElementById("fiber_total_polyester_cond1").value == 1) 
      {
      document.getElementById("fiber_total_polyester_cond2").value = 1;
      }
      else
      {
      document.getElementById("fiber_total_polyester_cond2").value = 2;
      }
  }
  //for fiber total polyester end 



  //for fiber total cotton
  function fiber_total_cotton_tol_condition()
  {
      var fiber_total_cotton_tol_value1 = parseFloat(document.getElementById("fiber_total_cotton_tol_value1").value);
      var fiber_total_cotton_tol_value2 = parseFloat(document.getElementById("fiber_total_cotton_tol_value2").value);
      var fiber_total_cotton_tol_cond = document.getElementById("fiber_total_cotton_tol_cond").value;

      if (fiber_total_cotton_tol_cond == 1) 
      {
          document.getElementById("fiber_total_cotton_cond1").value = 2;
          document.getElementById("fiber_total_cotton_cond2").value = 2;

          //var tolarance = ((fiber_total_cotton_tol_value2 * fiber_total_cotton_tol_value1) / 100);
          var tolarance = fiber_total_cotton_tol_value2;
          var fiber_total_cotton_tol_cal_value2 = fiber_total_cotton_tol_value1 + tolarance;
          var fiber_total_cotton_tol_cal_value1 = fiber_total_cotton_tol_value1 - tolarance;

          document.getElementById("fiber_total_cotton_value1").value = fiber_total_cotton_tol_cal_value1.toFixed(2);
          document.getElementById("fiber_total_cotton_value2").value = fiber_total_cotton_tol_cal_value2.toFixed(2);
      }

      if (fiber_total_cotton_tol_cond == 2)
      {
          document.getElementById("fiber_total_cotton_cond1").value = 2;
          document.getElementById("fiber_total_cotton_cond2").value = 2;

          var tolarance = fiber_total_cotton_tol_value2;
          var fiber_total_cotton_tol_cal_value2 = fiber_total_cotton_tol_value1 + tolarance;

          document.getElementById("fiber_total_cotton_value1").value = fiber_total_cotton_tol_value1;
          document.getElementById("fiber_total_cotton_value2").value = fiber_total_cotton_tol_cal_value2.toFixed(2);
      }

      if (fiber_total_cotton_tol_cond == 3)
      {
          document.getElementById("fiber_total_cotton_cond1").value = 2;
          document.getElementById("fiber_total_cotton_cond2").value = 2;

          var tolarance = fiber_total_cotton_tol_value2;
          var fiber_total_cotton_tol_cal_value2 = fiber_total_cotton_tol_value1 - tolarance;

          document.getElementById("fiber_total_cotton_value2").value = fiber_total_cotton_tol_value1;
          document.getElementById("fiber_total_cotton_value1").value = fiber_total_cotton_tol_cal_value2.toFixed(2);
      }

      if(isNaN(document.getElementById("fiber_total_cotton_tol_value1").value))
      {
          number_alert("fiber_total_cotton_tol_value1");
          return false;
      }

      if(isNaN(document.getElementById("fiber_total_cotton_tol_value2").value))
      {
          number_alert("fiber_total_cotton_tol_value2");
          return false;
      }
  }

  function fiber_total_cotton_tol_cal_1()
  {
      var fiber_total_cotton_tol_value1 = parseFloat(document.getElementById("fiber_total_cotton_tol_value1").value);
      var fiber_total_cotton_tol_value2 = parseFloat(document.getElementById("fiber_total_cotton_tol_value2").value);
      var fiber_total_cotton_tol_cond = document.getElementById("fiber_total_cotton_tol_cond").value;

      if (fiber_total_cotton_tol_cond == 1) 
      {
          document.getElementById("fiber_total_cotton_cond1").value = 2;
          document.getElementById("fiber_total_cotton_cond2").value = 2;

          //var tolarance = ((fiber_total_cotton_tol_value2 * fiber_total_cotton_tol_value1) / 100);
          var tolarance = fiber_total_cotton_tol_value2;
          var fiber_total_cotton_tol_cal_value2 = fiber_total_cotton_tol_value1 + tolarance;
          var fiber_total_cotton_tol_cal_value1 = fiber_total_cotton_tol_value1 - tolarance;

          document.getElementById("fiber_total_cotton_value1").value = fiber_total_cotton_tol_cal_value1.toFixed(2);
          document.getElementById("fiber_total_cotton_value2").value = fiber_total_cotton_tol_cal_value2.toFixed(2);
      }

      if (fiber_total_cotton_tol_cond == 2)
      {
          document.getElementById("fiber_total_cotton_cond1").value = 2;
          document.getElementById("fiber_total_cotton_cond2").value = 2;

          var tolarance = fiber_total_cotton_tol_value2;
          var fiber_total_cotton_tol_cal_value2 = fiber_total_cotton_tol_value1 + tolarance;

          document.getElementById("fiber_total_cotton_value1").value = fiber_total_cotton_tol_value1;
          document.getElementById("fiber_total_cotton_value2").value = fiber_total_cotton_tol_cal_value2.toFixed(2);
      }

      if (fiber_total_cotton_tol_cond == 3)
      {
          document.getElementById("fiber_total_cotton_cond1").value = 2;
          document.getElementById("fiber_total_cotton_cond2").value = 2;

          var tolarance = fiber_total_cotton_tol_value2;
          var fiber_total_cotton_tol_cal_value2 = fiber_total_cotton_tol_value1 - tolarance;

          document.getElementById("fiber_total_cotton_value2").value = fiber_total_cotton_tol_value1;
          document.getElementById("fiber_total_cotton_value1").value = fiber_total_cotton_tol_cal_value2.toFixed(2);
      }

      if(isNaN(document.getElementById("fiber_total_cotton_tol_value1").value))
      {
          number_alert("fiber_total_cotton_tol_value1");
          return false;
      }

      if(isNaN(document.getElementById("fiber_total_cotton_tol_value2").value))
      {
          number_alert("fiber_total_cotton_tol_value2");
          return false;
      }
  }

  function fiber_total_cotton_tol_cal_2()
  {
      var fiber_total_cotton_tol_value1 = parseFloat(document.getElementById("fiber_total_cotton_tol_value1").value);
      var fiber_total_cotton_tol_value2 = parseFloat(document.getElementById("fiber_total_cotton_tol_value2").value);
      var fiber_total_cotton_tol_cond = document.getElementById("fiber_total_cotton_tol_cond").value;

      if (fiber_total_cotton_tol_cond == 1) 
      {
          document.getElementById("fiber_total_cotton_cond1").value = 2;
          document.getElementById("fiber_total_cotton_cond2").value = 2;

          //var tolarance = ((fiber_total_cotton_tol_value2 * fiber_total_cotton_tol_value1) / 100);
          var tolarance = fiber_total_cotton_tol_value2;
          var fiber_total_cotton_tol_cal_value2 = fiber_total_cotton_tol_value1 + tolarance;
          var fiber_total_cotton_tol_cal_value1 = fiber_total_cotton_tol_value1 - tolarance;

          document.getElementById("fiber_total_cotton_value1").value = fiber_total_cotton_tol_cal_value1.toFixed(2);
          document.getElementById("fiber_total_cotton_value2").value = fiber_total_cotton_tol_cal_value2.toFixed(2);
      }

      if (fiber_total_cotton_tol_cond == 2)
      {
          document.getElementById("fiber_total_cotton_cond1").value = 2;
          document.getElementById("fiber_total_cotton_cond2").value = 2;

          var tolarance = fiber_total_cotton_tol_value2;
          var fiber_total_cotton_tol_cal_value2 = fiber_total_cotton_tol_value1 + tolarance;

          document.getElementById("fiber_total_cotton_value1").value = fiber_total_cotton_tol_value1;
          document.getElementById("fiber_total_cotton_value2").value = fiber_total_cotton_tol_cal_value2.toFixed(2);
      }

      if (fiber_total_cotton_tol_cond == 3)
      {
          document.getElementById("fiber_total_cotton_cond1").value = 2;
          document.getElementById("fiber_total_cotton_cond2").value = 2;

          var tolarance = fiber_total_cotton_tol_value2;
          var fiber_total_cotton_tol_cal_value2 = fiber_total_cotton_tol_value1 - tolarance;

          document.getElementById("fiber_total_cotton_value2").value = fiber_total_cotton_tol_value1;
          document.getElementById("fiber_total_cotton_value1").value = fiber_total_cotton_tol_cal_value2.toFixed(2);
      }

      if(isNaN(document.getElementById("fiber_total_cotton_tol_value1").value))
      {
          number_alert("fiber_total_cotton_tol_value1");
          return false;
      }

      if(isNaN(document.getElementById("fiber_total_cotton_tol_value2").value))
      {
          number_alert("fiber_total_cotton_tol_value2");
          return false;
      }
  }

  function fiber_total_cotton_condition() 
  {
      if (document.getElementById("fiber_total_cotton_cond1").value == 1) 
      {
      document.getElementById("fiber_total_cotton_cond2").value = 1;
      }
      else
      {
      document.getElementById("fiber_total_cotton_cond2").value = 2;
      }
  }
  //for fiber total cotton end 

  //for fiber total thired
  function fiber_total_thired_tol_condition()
  {
      var fiber_total_thired_tol_value1 = parseFloat(document.getElementById("fiber_total_thired_tol_value1").value);
      var fiber_total_thired_tol_value2 = parseFloat(document.getElementById("fiber_total_thired_tol_value2").value);
      var fiber_total_thired_tol_cond = document.getElementById("fiber_total_thired_tol_cond").value;

      if (fiber_total_thired_tol_cond == 1) 
      {
          document.getElementById("fiber_total_thired_cond1").value = 2;
          document.getElementById("fiber_total_thired_cond2").value = 2;

          //var tolarance = ((fiber_total_thired_tol_value2 * fiber_total_thired_tol_value1) / 100);
          var tolarance = fiber_total_thired_tol_value2;
          var fiber_total_thired_tol_cal_value2 = fiber_total_thired_tol_value1 + tolarance;
          var fiber_total_thired_tol_cal_value1 = fiber_total_thired_tol_value1 - tolarance;

          document.getElementById("fiber_total_thired_value1").value = fiber_total_thired_tol_cal_value1.toFixed(2);
          document.getElementById("fiber_total_thired_value2").value = fiber_total_thired_tol_cal_value2.toFixed(2);
      }

      if (fiber_total_thired_tol_cond == 2)
      {
          document.getElementById("fiber_total_thired_cond1").value = 2;
          document.getElementById("fiber_total_thired_cond2").value = 2;

          var tolarance = fiber_total_thired_tol_value2;
          var fiber_total_thired_tol_cal_value2 = fiber_total_thired_tol_value1 + tolarance;

          document.getElementById("fiber_total_thired_value1").value = fiber_total_thired_tol_value1;
          document.getElementById("fiber_total_thired_value2").value = fiber_total_thired_tol_cal_value2.toFixed(2);
      }

      if (fiber_total_thired_tol_cond == 3)
      {
          document.getElementById("fiber_total_thired_cond1").value = 2;
          document.getElementById("fiber_total_thired_cond2").value = 2;

          var tolarance = fiber_total_thired_tol_value2;
          var fiber_total_thired_tol_cal_value2 = fiber_total_thired_tol_value1 - tolarance;

          document.getElementById("fiber_total_thired_value2").value = fiber_total_thired_tol_value1;
          document.getElementById("fiber_total_thired_value1").value = fiber_total_thired_tol_cal_value2.toFixed(2);
      }

      if(isNaN(document.getElementById("fiber_total_thired_tol_value1").value))
      {
          number_alert("fiber_total_thired_tol_value1");
          return false;
      }

      if(isNaN(document.getElementById("fiber_total_thired_tol_value2").value))
      {
          number_alert("fiber_total_thired_tol_value2");
          return false;
      }
  }

  function fiber_total_thired_tol_cal_1()
  {
      var fiber_total_thired_tol_value1 = parseFloat(document.getElementById("fiber_total_thired_tol_value1").value);
      var fiber_total_thired_tol_value2 = parseFloat(document.getElementById("fiber_total_thired_tol_value2").value);
      var fiber_total_thired_tol_cond = document.getElementById("fiber_total_thired_tol_cond").value;

      if (fiber_total_thired_tol_cond == 1) 
      {
          document.getElementById("fiber_total_thired_cond1").value = 2;
          document.getElementById("fiber_total_thired_cond2").value = 2;

          //var tolarance = ((fiber_total_thired_tol_value2 * fiber_total_thired_tol_value1) / 100);
          var tolarance = fiber_total_thired_tol_value2;
          var fiber_total_thired_tol_cal_value2 = fiber_total_thired_tol_value1 + tolarance;
          var fiber_total_thired_tol_cal_value1 = fiber_total_thired_tol_value1 - tolarance;

          document.getElementById("fiber_total_thired_value1").value = fiber_total_thired_tol_cal_value1.toFixed(2);
          document.getElementById("fiber_total_thired_value2").value = fiber_total_thired_tol_cal_value2.toFixed(2);
      }

      if (fiber_total_thired_tol_cond == 2)
      {
          document.getElementById("fiber_total_thired_cond1").value = 2;
          document.getElementById("fiber_total_thired_cond2").value = 2;

          var tolarance = fiber_total_thired_tol_value2;
          var fiber_total_thired_tol_cal_value2 = fiber_total_thired_tol_value1 + tolarance;

          document.getElementById("fiber_total_thired_value1").value = fiber_total_thired_tol_value1;
          document.getElementById("fiber_total_thired_value2").value = fiber_total_thired_tol_cal_value2.toFixed(2);
      }

      if (fiber_total_thired_tol_cond == 3)
      {
          document.getElementById("fiber_total_thired_cond1").value = 2;
          document.getElementById("fiber_total_thired_cond2").value = 2;

          var tolarance = fiber_total_thired_tol_value2;
          var fiber_total_thired_tol_cal_value2 = fiber_total_thired_tol_value1 - tolarance;

          document.getElementById("fiber_total_thired_value2").value = fiber_total_thired_tol_value1;
          document.getElementById("fiber_total_thired_value1").value = fiber_total_thired_tol_cal_value2.toFixed(2);
      }

      if(isNaN(document.getElementById("fiber_total_thired_tol_value1").value))
      {
          number_alert("fiber_total_thired_tol_value1");
          return false;
      }

      if(isNaN(document.getElementById("fiber_total_thired_tol_value2").value))
      {
          number_alert("fiber_total_thired_tol_value2");
          return false;
      }
  }

  function fiber_total_thired_tol_cal_2()
  {
      var fiber_total_thired_tol_value1 = parseFloat(document.getElementById("fiber_total_thired_tol_value1").value);
      var fiber_total_thired_tol_value2 = parseFloat(document.getElementById("fiber_total_thired_tol_value2").value);
      var fiber_total_thired_tol_cond = document.getElementById("fiber_total_thired_tol_cond").value;

      if (fiber_total_thired_tol_cond == 1) 
      {
          document.getElementById("fiber_total_thired_cond1").value = 2;
          document.getElementById("fiber_total_thired_cond2").value = 2;

          //var tolarance = ((fiber_total_thired_tol_value2 * fiber_total_thired_tol_value1) / 100);
          var tolarance = fiber_total_thired_tol_value2;
          var fiber_total_thired_tol_cal_value2 = fiber_total_thired_tol_value1 + tolarance;
          var fiber_total_thired_tol_cal_value1 = fiber_total_thired_tol_value1 - tolarance;

          document.getElementById("fiber_total_thired_value1").value = fiber_total_thired_tol_cal_value1.toFixed(2);
          document.getElementById("fiber_total_thired_value2").value = fiber_total_thired_tol_cal_value2.toFixed(2);
      }

      if (fiber_total_thired_tol_cond == 2)
      {
          document.getElementById("fiber_total_thired_cond1").value = 2;
          document.getElementById("fiber_total_thired_cond2").value = 2;

          var tolarance = fiber_total_thired_tol_value2;
          var fiber_total_thired_tol_cal_value2 = fiber_total_thired_tol_value1 + tolarance;

          document.getElementById("fiber_total_thired_value1").value = fiber_total_thired_tol_value1;
          document.getElementById("fiber_total_thired_value2").value = fiber_total_thired_tol_cal_value2.toFixed(2);
      }

      if (fiber_total_thired_tol_cond == 3)
      {
          document.getElementById("fiber_total_thired_cond1").value = 2;
          document.getElementById("fiber_total_thired_cond2").value = 2;

          var tolarance = fiber_total_thired_tol_value2;
          var fiber_total_thired_tol_cal_value2 = fiber_total_thired_tol_value1 - tolarance;

          document.getElementById("fiber_total_thired_value2").value = fiber_total_thired_tol_value1;
          document.getElementById("fiber_total_thired_value1").value = fiber_total_thired_tol_cal_value2.toFixed(2);
      }

      if(isNaN(document.getElementById("fiber_total_thired_tol_value1").value))
      {
          number_alert("fiber_total_thired_tol_value1");
          return false;
      }

      if(isNaN(document.getElementById("fiber_total_thired_tol_value2").value))
      {
          number_alert("fiber_total_thired_tol_value2");
          return false;
      }
  }

  function fiber_total_thired_condition() 
  {
      if (document.getElementById("fiber_total_thired_cond1").value == 1) 
      {
      document.getElementById("fiber_total_thired_cond2").value = 1;
      }
      else
      {
      document.getElementById("fiber_total_thired_cond2").value = 2;
      }
  }
  //for fiber total thired end 


  //for fiber total fourth
  function fiber_total_fourth_tol_condition()
  {
      var fiber_total_fourth_tol_value1 = parseFloat(document.getElementById("fiber_total_fourth_tol_value1").value);
      var fiber_total_fourth_tol_value2 = parseFloat(document.getElementById("fiber_total_fourth_tol_value2").value);
      var fiber_total_fourth_tol_cond = document.getElementById("fiber_total_fourth_tol_cond").value;

      if (fiber_total_fourth_tol_cond == 1) 
      {
          document.getElementById("fiber_total_fourth_cond1").value = 2;
          document.getElementById("fiber_total_fourth_cond2").value = 2;

          //var tolarance = ((fiber_total_fourth_tol_value2 * fiber_total_fourth_tol_value1) / 100);
          var tolarance = fiber_total_fourth_tol_value2;
          var fiber_total_fourth_tol_cal_value2 = fiber_total_fourth_tol_value1 + tolarance;
          var fiber_total_fourth_tol_cal_value1 = fiber_total_fourth_tol_value1 - tolarance;

          document.getElementById("fiber_total_fourth_value1").value = fiber_total_fourth_tol_cal_value1.toFixed(2);
          document.getElementById("fiber_total_fourth_value2").value = fiber_total_fourth_tol_cal_value2.toFixed(2);
      }

      if (fiber_total_fourth_tol_cond == 2)
      {
          document.getElementById("fiber_total_fourth_cond1").value = 2;
          document.getElementById("fiber_total_fourth_cond2").value = 2;

          var tolarance = fiber_total_fourth_tol_value2;
          var fiber_total_fourth_tol_cal_value2 = fiber_total_fourth_tol_value1 + tolarance;

          document.getElementById("fiber_total_fourth_value1").value = fiber_total_fourth_tol_value1;
          document.getElementById("fiber_total_fourth_value2").value = fiber_total_fourth_tol_cal_value2.toFixed(2);
      }

      if (fiber_total_fourth_tol_cond == 3)
      {
          document.getElementById("fiber_total_fourth_cond1").value = 2;
          document.getElementById("fiber_total_fourth_cond2").value = 2;

          var tolarance = fiber_total_fourth_tol_value2;
          var fiber_total_fourth_tol_cal_value2 = fiber_total_fourth_tol_value1 - tolarance;

          document.getElementById("fiber_total_fourth_value2").value = fiber_total_fourth_tol_value1;
          document.getElementById("fiber_total_fourth_value1").value = fiber_total_fourth_tol_cal_value2.toFixed(2);
      }

      if(isNaN(document.getElementById("fiber_total_fourth_tol_value1").value))
      {
          number_alert("fiber_total_fourth_tol_value1");
          return false;
      }

      if(isNaN(document.getElementById("fiber_total_fourth_tol_value2").value))
      {
          number_alert("fiber_total_fourth_tol_value2");
          return false;
      }
  }

  function fiber_total_fourth_tol_cal_1()
  {
      var fiber_total_fourth_tol_value1 = parseFloat(document.getElementById("fiber_total_fourth_tol_value1").value);
      var fiber_total_fourth_tol_value2 = parseFloat(document.getElementById("fiber_total_fourth_tol_value2").value);
      var fiber_total_fourth_tol_cond = document.getElementById("fiber_total_fourth_tol_cond").value;

      if (fiber_total_fourth_tol_cond == 1) 
      {
          document.getElementById("fiber_total_fourth_cond1").value = 2;
          document.getElementById("fiber_total_fourth_cond2").value = 2;

          //var tolarance = ((fiber_total_fourth_tol_value2 * fiber_total_fourth_tol_value1) / 100);
          var tolarance = fiber_total_fourth_tol_value2;
          var fiber_total_fourth_tol_cal_value2 = fiber_total_fourth_tol_value1 + tolarance;
          var fiber_total_fourth_tol_cal_value1 = fiber_total_fourth_tol_value1 - tolarance;

          document.getElementById("fiber_total_fourth_value1").value = fiber_total_fourth_tol_cal_value1.toFixed(2);
          document.getElementById("fiber_total_fourth_value2").value = fiber_total_fourth_tol_cal_value2.toFixed(2);
      }

      if (fiber_total_fourth_tol_cond == 2)
      {
          document.getElementById("fiber_total_fourth_cond1").value = 2;
          document.getElementById("fiber_total_fourth_cond2").value = 2;

          var tolarance = fiber_total_fourth_tol_value2;
          var fiber_total_fourth_tol_cal_value2 = fiber_total_fourth_tol_value1 + tolarance;

          document.getElementById("fiber_total_fourth_value1").value = fiber_total_fourth_tol_value1;
          document.getElementById("fiber_total_fourth_value2").value = fiber_total_fourth_tol_cal_value2.toFixed(2);
      }

      if (fiber_total_fourth_tol_cond == 3)
      {
          document.getElementById("fiber_total_fourth_cond1").value = 2;
          document.getElementById("fiber_total_fourth_cond2").value = 2;

          var tolarance = fiber_total_fourth_tol_value2;
          var fiber_total_fourth_tol_cal_value2 = fiber_total_fourth_tol_value1 - tolarance;

          document.getElementById("fiber_total_fourth_value2").value = fiber_total_fourth_tol_value1;
          document.getElementById("fiber_total_fourth_value1").value = fiber_total_fourth_tol_cal_value2.toFixed(2);
      }

      if(isNaN(document.getElementById("fiber_total_fourth_tol_value1").value))
      {
          number_alert("fiber_total_fourth_tol_value1");
          return false;
      }

      if(isNaN(document.getElementById("fiber_total_fourth_tol_value2").value))
      {
          number_alert("fiber_total_fourth_tol_value2");
          return false;
      }
  }

  function fiber_total_fourth_tol_cal_2()
  {
      var fiber_total_fourth_tol_value1 = parseFloat(document.getElementById("fiber_total_fourth_tol_value1").value);
      var fiber_total_fourth_tol_value2 = parseFloat(document.getElementById("fiber_total_fourth_tol_value2").value);
      var fiber_total_fourth_tol_cond = document.getElementById("fiber_total_fourth_tol_cond").value;

      if (fiber_total_fourth_tol_cond == 1) 
      {
          document.getElementById("fiber_total_fourth_cond1").value = 2;
          document.getElementById("fiber_total_fourth_cond2").value = 2;

          //var tolarance = ((fiber_total_fourth_tol_value2 * fiber_total_fourth_tol_value1) / 100);
          var tolarance = fiber_total_fourth_tol_value2;
          var fiber_total_fourth_tol_cal_value2 = fiber_total_fourth_tol_value1 + tolarance;
          var fiber_total_fourth_tol_cal_value1 = fiber_total_fourth_tol_value1 - tolarance;

          document.getElementById("fiber_total_fourth_value1").value = fiber_total_fourth_tol_cal_value1.toFixed(2);
          document.getElementById("fiber_total_fourth_value2").value = fiber_total_fourth_tol_cal_value2.toFixed(2);
      }

      if (fiber_total_fourth_tol_cond == 2)
      {
          document.getElementById("fiber_total_fourth_cond1").value = 2;
          document.getElementById("fiber_total_fourth_cond2").value = 2;

          var tolarance = fiber_total_fourth_tol_value2;
          var fiber_total_fourth_tol_cal_value2 = fiber_total_fourth_tol_value1 + tolarance;

          document.getElementById("fiber_total_fourth_value1").value = fiber_total_fourth_tol_value1;
          document.getElementById("fiber_total_fourth_value2").value = fiber_total_fourth_tol_cal_value2.toFixed(2);
      }

      if (fiber_total_fourth_tol_cond == 3)
      {
          document.getElementById("fiber_total_fourth_cond1").value = 2;
          document.getElementById("fiber_total_fourth_cond2").value = 2;

          var tolarance = fiber_total_fourth_tol_value2;
          var fiber_total_fourth_tol_cal_value2 = fiber_total_fourth_tol_value1 - tolarance;

          document.getElementById("fiber_total_fourth_value2").value = fiber_total_fourth_tol_value1;
          document.getElementById("fiber_total_fourth_value1").value = fiber_total_fourth_tol_cal_value2.toFixed(2);
      }

      if(isNaN(document.getElementById("fiber_total_fourth_tol_value1").value))
      {
          number_alert("fiber_total_fourth_tol_value1");
          return false;
      }

      if(isNaN(document.getElementById("fiber_total_fourth_tol_value2").value))
      {
          number_alert("fiber_total_fourth_tol_value2");
          return false;
      }
  }

  function fiber_total_fourth_condition() 
  {
      if (document.getElementById("fiber_total_fourth_cond1").value == 1) 
      {
      document.getElementById("fiber_total_fourth_cond2").value = 1;
      }
      else
      {
      document.getElementById("fiber_total_fourth_cond2").value = 2;
      }
  }
  //for fiber total fourth end 




  //now start fiber warp content from here
  //for fiber warp polyester
  function fiber_warp_polyester_tol_condition()
  {
      var fiber_warp_polyester_tol_value1 = parseFloat(document.getElementById("fiber_warp_polyester_tol_value1").value);
      var fiber_warp_polyester_tol_value2 = parseFloat(document.getElementById("fiber_warp_polyester_tol_value2").value);
      var fiber_warp_polyester_tol_cond = document.getElementById("fiber_warp_polyester_tol_cond").value;

      if (fiber_warp_polyester_tol_cond == 1) 
      {
          document.getElementById("fiber_warp_polyester_cond1").value = 2;
          document.getElementById("fiber_warp_polyester_cond2").value = 2;

          //var tolarance = ((fiber_warp_polyester_tol_value2 * fiber_warp_polyester_tol_value1) / 100);
          var tolarance = fiber_warp_polyester_tol_value2;
          var fiber_warp_polyester_tol_cal_value2 = fiber_warp_polyester_tol_value1 + tolarance;
          var fiber_warp_polyester_tol_cal_value1 = fiber_warp_polyester_tol_value1 - tolarance;

          document.getElementById("fiber_warp_polyester_value1").value = fiber_warp_polyester_tol_cal_value1.toFixed(2);
          document.getElementById("fiber_warp_polyester_value2").value = fiber_warp_polyester_tol_cal_value2.toFixed(2);
      }

      if (fiber_warp_polyester_tol_cond == 2)
      {
          document.getElementById("fiber_warp_polyester_cond1").value = 2;
          document.getElementById("fiber_warp_polyester_cond2").value = 2;

          var tolarance = fiber_warp_polyester_tol_value2;
          var fiber_warp_polyester_tol_cal_value2 = fiber_warp_polyester_tol_value1 + tolarance;

          document.getElementById("fiber_warp_polyester_value1").value = fiber_warp_polyester_tol_value1;
          document.getElementById("fiber_warp_polyester_value2").value = fiber_warp_polyester_tol_cal_value2.toFixed(2);
      }

      if (fiber_warp_polyester_tol_cond == 3)
      {
          document.getElementById("fiber_warp_polyester_cond1").value = 2;
          document.getElementById("fiber_warp_polyester_cond2").value = 2;

          var tolarance = fiber_warp_polyester_tol_value2;
          var fiber_warp_polyester_tol_cal_value2 = fiber_warp_polyester_tol_value1 - tolarance;

          document.getElementById("fiber_warp_polyester_value2").value = fiber_warp_polyester_tol_value1;
          document.getElementById("fiber_warp_polyester_value1").value = fiber_warp_polyester_tol_cal_value2.toFixed(2);
      }

      if(isNaN(document.getElementById("fiber_warp_polyester_tol_value1").value))
      {
          number_alert("fiber_warp_polyester_tol_value1");
          return false;
      }

      if(isNaN(document.getElementById("fiber_warp_polyester_tol_value2").value))
      {
          number_alert("fiber_warp_polyester_tol_value2");
          return false;
      }
  }

  function fiber_warp_polyester_tol_cal_1()
  {
      var fiber_warp_polyester_tol_value1 = parseFloat(document.getElementById("fiber_warp_polyester_tol_value1").value);
      var fiber_warp_polyester_tol_value2 = parseFloat(document.getElementById("fiber_warp_polyester_tol_value2").value);
      var fiber_warp_polyester_tol_cond = document.getElementById("fiber_warp_polyester_tol_cond").value;

      if (fiber_warp_polyester_tol_cond == 1) 
      {
          document.getElementById("fiber_warp_polyester_cond1").value = 2;
          document.getElementById("fiber_warp_polyester_cond2").value = 2;

          //var tolarance = ((fiber_warp_polyester_tol_value2 * fiber_warp_polyester_tol_value1) / 100);
          var tolarance = fiber_warp_polyester_tol_value2;
          var fiber_warp_polyester_tol_cal_value2 = fiber_warp_polyester_tol_value1 + tolarance;
          var fiber_warp_polyester_tol_cal_value1 = fiber_warp_polyester_tol_value1 - tolarance;

          document.getElementById("fiber_warp_polyester_value1").value = fiber_warp_polyester_tol_cal_value1.toFixed(2);
          document.getElementById("fiber_warp_polyester_value2").value = fiber_warp_polyester_tol_cal_value2.toFixed(2);
      }

      if (fiber_warp_polyester_tol_cond == 2)
      {
          document.getElementById("fiber_warp_polyester_cond1").value = 2;
          document.getElementById("fiber_warp_polyester_cond2").value = 2;

          var tolarance = fiber_warp_polyester_tol_value2;
          var fiber_warp_polyester_tol_cal_value2 = fiber_warp_polyester_tol_value1 + tolarance;

          document.getElementById("fiber_warp_polyester_value1").value = fiber_warp_polyester_tol_value1;
          document.getElementById("fiber_warp_polyester_value2").value = fiber_warp_polyester_tol_cal_value2.toFixed(2);
      }

      if (fiber_warp_polyester_tol_cond == 3)
      {
          document.getElementById("fiber_warp_polyester_cond1").value = 2;
          document.getElementById("fiber_warp_polyester_cond2").value = 2;

          var tolarance = fiber_warp_polyester_tol_value2;
          var fiber_warp_polyester_tol_cal_value2 = fiber_warp_polyester_tol_value1 - tolarance;

          document.getElementById("fiber_warp_polyester_value2").value = fiber_warp_polyester_tol_value1;
          document.getElementById("fiber_warp_polyester_value1").value = fiber_warp_polyester_tol_cal_value2.toFixed(2);
      }

      if(isNaN(document.getElementById("fiber_warp_polyester_tol_value1").value))
      {
          number_alert("fiber_warp_polyester_tol_value1");
          return false;
      }

      if(isNaN(document.getElementById("fiber_warp_polyester_tol_value2").value))
      {
          number_alert("fiber_warp_polyester_tol_value2");
          return false;
      }
  }

  function fiber_warp_polyester_tol_cal_2()
  {
      var fiber_warp_polyester_tol_value1 = parseFloat(document.getElementById("fiber_warp_polyester_tol_value1").value);
      var fiber_warp_polyester_tol_value2 = parseFloat(document.getElementById("fiber_warp_polyester_tol_value2").value);
      var fiber_warp_polyester_tol_cond = document.getElementById("fiber_warp_polyester_tol_cond").value;

      if (fiber_warp_polyester_tol_cond == 1) 
      {
          document.getElementById("fiber_warp_polyester_cond1").value = 2;
          document.getElementById("fiber_warp_polyester_cond2").value = 2;

          //var tolarance = ((fiber_warp_polyester_tol_value2 * fiber_warp_polyester_tol_value1) / 100);
          var tolarance = fiber_warp_polyester_tol_value2;
          var fiber_warp_polyester_tol_cal_value2 = fiber_warp_polyester_tol_value1 + tolarance;
          var fiber_warp_polyester_tol_cal_value1 = fiber_warp_polyester_tol_value1 - tolarance;

          document.getElementById("fiber_warp_polyester_value1").value = fiber_warp_polyester_tol_cal_value1.toFixed(2);
          document.getElementById("fiber_warp_polyester_value2").value = fiber_warp_polyester_tol_cal_value2.toFixed(2);
      }

      if (fiber_warp_polyester_tol_cond == 2)
      {
          document.getElementById("fiber_warp_polyester_cond1").value = 2;
          document.getElementById("fiber_warp_polyester_cond2").value = 2;

          var tolarance = fiber_warp_polyester_tol_value2;
          var fiber_warp_polyester_tol_cal_value2 = fiber_warp_polyester_tol_value1 + tolarance;

          document.getElementById("fiber_warp_polyester_value1").value = fiber_warp_polyester_tol_value1;
          document.getElementById("fiber_warp_polyester_value2").value = fiber_warp_polyester_tol_cal_value2.toFixed(2);
      }

      if (fiber_warp_polyester_tol_cond == 3)
      {
          document.getElementById("fiber_warp_polyester_cond1").value = 2;
          document.getElementById("fiber_warp_polyester_cond2").value = 2;

          var tolarance = fiber_warp_polyester_tol_value2;
          var fiber_warp_polyester_tol_cal_value2 = fiber_warp_polyester_tol_value1 - tolarance;

          document.getElementById("fiber_warp_polyester_value2").value = fiber_warp_polyester_tol_value1;
          document.getElementById("fiber_warp_polyester_value1").value = fiber_warp_polyester_tol_cal_value2.toFixed(2);
      }

      if(isNaN(document.getElementById("fiber_warp_polyester_tol_value1").value))
      {
          number_alert("fiber_warp_polyester_tol_value1");
          return false;
      }

      if(isNaN(document.getElementById("fiber_warp_polyester_tol_value2").value))
      {
          number_alert("fiber_warp_polyester_tol_value2");
          return false;
      }
  }

  function fiber_warp_polyester_condition() 
  {
      if (document.getElementById("fiber_warp_polyester_cond1").value == 1) 
      {
      document.getElementById("fiber_warp_polyester_cond2").value = 1;
      }
      else
      {
      document.getElementById("fiber_warp_polyester_cond2").value = 2;
      }
  }
  //for fiber warp polyester end 



  //for fiber warp cotton
  function fiber_warp_cotton_tol_condition()
  {
      var fiber_warp_cotton_tol_value1 = parseFloat(document.getElementById("fiber_warp_cotton_tol_value1").value);
      var fiber_warp_cotton_tol_value2 = parseFloat(document.getElementById("fiber_warp_cotton_tol_value2").value);
      var fiber_warp_cotton_tol_cond = document.getElementById("fiber_warp_cotton_tol_cond").value;

      if (fiber_warp_cotton_tol_cond == 1) 
      {
          document.getElementById("fiber_warp_cotton_cond1").value = 2;
          document.getElementById("fiber_warp_cotton_cond2").value = 2;

          //var tolarance = ((fiber_warp_cotton_tol_value2 * fiber_warp_cotton_tol_value1) / 100);
          var tolarance = fiber_warp_cotton_tol_value2;
          var fiber_warp_cotton_tol_cal_value2 = fiber_warp_cotton_tol_value1 + tolarance;
          var fiber_warp_cotton_tol_cal_value1 = fiber_warp_cotton_tol_value1 - tolarance;

          document.getElementById("fiber_warp_cotton_value1").value = fiber_warp_cotton_tol_cal_value1.toFixed(2);
          document.getElementById("fiber_warp_cotton_value2").value = fiber_warp_cotton_tol_cal_value2.toFixed(2);
      }

      if (fiber_warp_cotton_tol_cond == 2)
      {
          document.getElementById("fiber_warp_cotton_cond1").value = 2;
          document.getElementById("fiber_warp_cotton_cond2").value = 2;

          var tolarance = fiber_warp_cotton_tol_value2;
          var fiber_warp_cotton_tol_cal_value2 = fiber_warp_cotton_tol_value1 + tolarance;

          document.getElementById("fiber_warp_cotton_value1").value = fiber_warp_cotton_tol_value1;
          document.getElementById("fiber_warp_cotton_value2").value = fiber_warp_cotton_tol_cal_value2.toFixed(2);
      }

      if (fiber_warp_cotton_tol_cond == 3)
      {
          document.getElementById("fiber_warp_cotton_cond1").value = 2;
          document.getElementById("fiber_warp_cotton_cond2").value = 2;

          var tolarance = fiber_warp_cotton_tol_value2;
          var fiber_warp_cotton_tol_cal_value2 = fiber_warp_cotton_tol_value1 - tolarance;

          document.getElementById("fiber_warp_cotton_value2").value = fiber_warp_cotton_tol_value1;
          document.getElementById("fiber_warp_cotton_value1").value = fiber_warp_cotton_tol_cal_value2.toFixed(2);
      }

      if(isNaN(document.getElementById("fiber_warp_cotton_tol_value1").value))
      {
          number_alert("fiber_warp_cotton_tol_value1");
          return false;
      }

      if(isNaN(document.getElementById("fiber_warp_cotton_tol_value2").value))
      {
          number_alert("fiber_warp_cotton_tol_value2");
          return false;
      }
  }

  function fiber_warp_cotton_tol_cal_1()
  {
      var fiber_warp_cotton_tol_value1 = parseFloat(document.getElementById("fiber_warp_cotton_tol_value1").value);
      var fiber_warp_cotton_tol_value2 = parseFloat(document.getElementById("fiber_warp_cotton_tol_value2").value);
      var fiber_warp_cotton_tol_cond = document.getElementById("fiber_warp_cotton_tol_cond").value;

      if (fiber_warp_cotton_tol_cond == 1) 
      {
          document.getElementById("fiber_warp_cotton_cond1").value = 2;
          document.getElementById("fiber_warp_cotton_cond2").value = 2;

          //var tolarance = ((fiber_warp_cotton_tol_value2 * fiber_warp_cotton_tol_value1) / 100);
          var tolarance = fiber_warp_cotton_tol_value2;
          var fiber_warp_cotton_tol_cal_value2 = fiber_warp_cotton_tol_value1 + tolarance;
          var fiber_warp_cotton_tol_cal_value1 = fiber_warp_cotton_tol_value1 - tolarance;

          document.getElementById("fiber_warp_cotton_value1").value = fiber_warp_cotton_tol_cal_value1.toFixed(2);
          document.getElementById("fiber_warp_cotton_value2").value = fiber_warp_cotton_tol_cal_value2.toFixed(2);
      }

      if (fiber_warp_cotton_tol_cond == 2)
      {
          document.getElementById("fiber_warp_cotton_cond1").value = 2;
          document.getElementById("fiber_warp_cotton_cond2").value = 2;

          var tolarance = fiber_warp_cotton_tol_value2;
          var fiber_warp_cotton_tol_cal_value2 = fiber_warp_cotton_tol_value1 + tolarance;

          document.getElementById("fiber_warp_cotton_value1").value = fiber_warp_cotton_tol_value1;
          document.getElementById("fiber_warp_cotton_value2").value = fiber_warp_cotton_tol_cal_value2.toFixed(2);
      }

      if (fiber_warp_cotton_tol_cond == 3)
      {
          document.getElementById("fiber_warp_cotton_cond1").value = 2;
          document.getElementById("fiber_warp_cotton_cond2").value = 2;

          var tolarance = fiber_warp_cotton_tol_value2;
          var fiber_warp_cotton_tol_cal_value2 = fiber_warp_cotton_tol_value1 - tolarance;

          document.getElementById("fiber_warp_cotton_value2").value = fiber_warp_cotton_tol_value1;
          document.getElementById("fiber_warp_cotton_value1").value = fiber_warp_cotton_tol_cal_value2.toFixed(2);
      }

      if(isNaN(document.getElementById("fiber_warp_cotton_tol_value1").value))
      {
          number_alert("fiber_warp_cotton_tol_value1");
          return false;
      }

      if(isNaN(document.getElementById("fiber_warp_cotton_tol_value2").value))
      {
          number_alert("fiber_warp_cotton_tol_value2");
          return false;
      }
  }

  function fiber_warp_cotton_tol_cal_2()
  {
      var fiber_warp_cotton_tol_value1 = parseFloat(document.getElementById("fiber_warp_cotton_tol_value1").value);
      var fiber_warp_cotton_tol_value2 = parseFloat(document.getElementById("fiber_warp_cotton_tol_value2").value);
      var fiber_warp_cotton_tol_cond = document.getElementById("fiber_warp_cotton_tol_cond").value;

      if (fiber_warp_cotton_tol_cond == 1) 
      {
          document.getElementById("fiber_warp_cotton_cond1").value = 2;
          document.getElementById("fiber_warp_cotton_cond2").value = 2;

          //var tolarance = ((fiber_warp_cotton_tol_value2 * fiber_warp_cotton_tol_value1) / 100);
          var tolarance = fiber_warp_cotton_tol_value2;
          var fiber_warp_cotton_tol_cal_value2 = fiber_warp_cotton_tol_value1 + tolarance;
          var fiber_warp_cotton_tol_cal_value1 = fiber_warp_cotton_tol_value1 - tolarance;

          document.getElementById("fiber_warp_cotton_value1").value = fiber_warp_cotton_tol_cal_value1.toFixed(2);
          document.getElementById("fiber_warp_cotton_value2").value = fiber_warp_cotton_tol_cal_value2.toFixed(2);
      }

      if (fiber_warp_cotton_tol_cond == 2)
      {
          document.getElementById("fiber_warp_cotton_cond1").value = 2;
          document.getElementById("fiber_warp_cotton_cond2").value = 2;

          var tolarance = fiber_warp_cotton_tol_value2;
          var fiber_warp_cotton_tol_cal_value2 = fiber_warp_cotton_tol_value1 + tolarance;

          document.getElementById("fiber_warp_cotton_value1").value = fiber_warp_cotton_tol_value1;
          document.getElementById("fiber_warp_cotton_value2").value = fiber_warp_cotton_tol_cal_value2.toFixed(2);
      }

      if (fiber_warp_cotton_tol_cond == 3)
      {
          document.getElementById("fiber_warp_cotton_cond1").value = 2;
          document.getElementById("fiber_warp_cotton_cond2").value = 2;

          var tolarance = fiber_warp_cotton_tol_value2;
          var fiber_warp_cotton_tol_cal_value2 = fiber_warp_cotton_tol_value1 - tolarance;

          document.getElementById("fiber_warp_cotton_value2").value = fiber_warp_cotton_tol_value1;
          document.getElementById("fiber_warp_cotton_value1").value = fiber_warp_cotton_tol_cal_value2.toFixed(2);
      }

      if(isNaN(document.getElementById("fiber_warp_cotton_tol_value1").value))
      {
          number_alert("fiber_warp_cotton_tol_value1");
          return false;
      }

      if(isNaN(document.getElementById("fiber_warp_cotton_tol_value2").value))
      {
          number_alert("fiber_warp_cotton_tol_value2");
          return false;
      }
  }

  function fiber_warp_cotton_condition() 
  {
      if (document.getElementById("fiber_warp_cotton_cond1").value == 1) 
      {
      document.getElementById("fiber_warp_cotton_cond2").value = 1;
      }
      else
      {
      document.getElementById("fiber_warp_cotton_cond2").value = 2;
      }
  }
  //for fiber warp cotton end 

  //for fiber warp thired
  function fiber_warp_thired_tol_condition()
  {
      var fiber_warp_thired_tol_value1 = parseFloat(document.getElementById("fiber_warp_thired_tol_value1").value);
      var fiber_warp_thired_tol_value2 = parseFloat(document.getElementById("fiber_warp_thired_tol_value2").value);
      var fiber_warp_thired_tol_cond = document.getElementById("fiber_warp_thired_tol_cond").value;

      if (fiber_warp_thired_tol_cond == 1) 
      {
          document.getElementById("fiber_warp_thired_cond1").value = 2;
          document.getElementById("fiber_warp_thired_cond2").value = 2;

          //var tolarance = ((fiber_warp_thired_tol_value2 * fiber_warp_thired_tol_value1) / 100);
          var tolarance = fiber_warp_thired_tol_value2;
          var fiber_warp_thired_tol_cal_value2 = fiber_warp_thired_tol_value1 + tolarance;
          var fiber_warp_thired_tol_cal_value1 = fiber_warp_thired_tol_value1 - tolarance;

          document.getElementById("fiber_warp_thired_value1").value = fiber_warp_thired_tol_cal_value1.toFixed(2);
          document.getElementById("fiber_warp_thired_value2").value = fiber_warp_thired_tol_cal_value2.toFixed(2);
      }

      if (fiber_warp_thired_tol_cond == 2)
      {
          document.getElementById("fiber_warp_thired_cond1").value = 2;
          document.getElementById("fiber_warp_thired_cond2").value = 2;

          var tolarance = fiber_warp_thired_tol_value2;
          var fiber_warp_thired_tol_cal_value2 = fiber_warp_thired_tol_value1 + tolarance;

          document.getElementById("fiber_warp_thired_value1").value = fiber_warp_thired_tol_value1;
          document.getElementById("fiber_warp_thired_value2").value = fiber_warp_thired_tol_cal_value2.toFixed(2);
      }

      if (fiber_warp_thired_tol_cond == 3)
      {
          document.getElementById("fiber_warp_thired_cond1").value = 2;
          document.getElementById("fiber_warp_thired_cond2").value = 2;

          var tolarance = fiber_warp_thired_tol_value2;
          var fiber_warp_thired_tol_cal_value2 = fiber_warp_thired_tol_value1 - tolarance;

          document.getElementById("fiber_warp_thired_value2").value = fiber_warp_thired_tol_value1;
          document.getElementById("fiber_warp_thired_value1").value = fiber_warp_thired_tol_cal_value2.toFixed(2);
      }

      if(isNaN(document.getElementById("fiber_warp_thired_tol_value1").value))
      {
          number_alert("fiber_warp_thired_tol_value1");
          return false;
      }

      if(isNaN(document.getElementById("fiber_warp_thired_tol_value2").value))
      {
          number_alert("fiber_warp_thired_tol_value2");
          return false;
      }
  }

  function fiber_warp_thired_tol_cal_1()
  {
      var fiber_warp_thired_tol_value1 = parseFloat(document.getElementById("fiber_warp_thired_tol_value1").value);
      var fiber_warp_thired_tol_value2 = parseFloat(document.getElementById("fiber_warp_thired_tol_value2").value);
      var fiber_warp_thired_tol_cond = document.getElementById("fiber_warp_thired_tol_cond").value;

      if (fiber_warp_thired_tol_cond == 1) 
      {
          document.getElementById("fiber_warp_thired_cond1").value = 2;
          document.getElementById("fiber_warp_thired_cond2").value = 2;

          //var tolarance = ((fiber_warp_thired_tol_value2 * fiber_warp_thired_tol_value1) / 100);
          var tolarance = fiber_warp_thired_tol_value2;
          var fiber_warp_thired_tol_cal_value2 = fiber_warp_thired_tol_value1 + tolarance;
          var fiber_warp_thired_tol_cal_value1 = fiber_warp_thired_tol_value1 - tolarance;

          document.getElementById("fiber_warp_thired_value1").value = fiber_warp_thired_tol_cal_value1.toFixed(2);
          document.getElementById("fiber_warp_thired_value2").value = fiber_warp_thired_tol_cal_value2.toFixed(2);
      }

      if (fiber_warp_thired_tol_cond == 2)
      {
          document.getElementById("fiber_warp_thired_cond1").value = 2;
          document.getElementById("fiber_warp_thired_cond2").value = 2;

          var tolarance = fiber_warp_thired_tol_value2;
          var fiber_warp_thired_tol_cal_value2 = fiber_warp_thired_tol_value1 + tolarance;

          document.getElementById("fiber_warp_thired_value1").value = fiber_warp_thired_tol_value1;
          document.getElementById("fiber_warp_thired_value2").value = fiber_warp_thired_tol_cal_value2.toFixed(2);
      }

      if (fiber_warp_thired_tol_cond == 3)
      {
          document.getElementById("fiber_warp_thired_cond1").value = 2;
          document.getElementById("fiber_warp_thired_cond2").value = 2;

          var tolarance = fiber_warp_thired_tol_value2;
          var fiber_warp_thired_tol_cal_value2 = fiber_warp_thired_tol_value1 - tolarance;

          document.getElementById("fiber_warp_thired_value2").value = fiber_warp_thired_tol_value1;
          document.getElementById("fiber_warp_thired_value1").value = fiber_warp_thired_tol_cal_value2.toFixed(2);
      }

      if(isNaN(document.getElementById("fiber_warp_thired_tol_value1").value))
      {
          number_alert("fiber_warp_thired_tol_value1");
          return false;
      }

      if(isNaN(document.getElementById("fiber_warp_thired_tol_value2").value))
      {
          number_alert("fiber_warp_thired_tol_value2");
          return false;
      }
  }

  function fiber_warp_thired_tol_cal_2()
  {
      var fiber_warp_thired_tol_value1 = parseFloat(document.getElementById("fiber_warp_thired_tol_value1").value);
      var fiber_warp_thired_tol_value2 = parseFloat(document.getElementById("fiber_warp_thired_tol_value2").value);
      var fiber_warp_thired_tol_cond = document.getElementById("fiber_warp_thired_tol_cond").value;

      if (fiber_warp_thired_tol_cond == 1) 
      {
          document.getElementById("fiber_warp_thired_cond1").value = 2;
          document.getElementById("fiber_warp_thired_cond2").value = 2;

          //var tolarance = ((fiber_warp_thired_tol_value2 * fiber_warp_thired_tol_value1) / 100);
          var tolarance = fiber_warp_thired_tol_value2;
          var fiber_warp_thired_tol_cal_value2 = fiber_warp_thired_tol_value1 + tolarance;
          var fiber_warp_thired_tol_cal_value1 = fiber_warp_thired_tol_value1 - tolarance;

          document.getElementById("fiber_warp_thired_value1").value = fiber_warp_thired_tol_cal_value1.toFixed(2);
          document.getElementById("fiber_warp_thired_value2").value = fiber_warp_thired_tol_cal_value2.toFixed(2);
      }

      if (fiber_warp_thired_tol_cond == 2)
      {
          document.getElementById("fiber_warp_thired_cond1").value = 2;
          document.getElementById("fiber_warp_thired_cond2").value = 2;

          var tolarance = fiber_warp_thired_tol_value2;
          var fiber_warp_thired_tol_cal_value2 = fiber_warp_thired_tol_value1 + tolarance;

          document.getElementById("fiber_warp_thired_value1").value = fiber_warp_thired_tol_value1;
          document.getElementById("fiber_warp_thired_value2").value = fiber_warp_thired_tol_cal_value2.toFixed(2);
      }

      if (fiber_warp_thired_tol_cond == 3)
      {
          document.getElementById("fiber_warp_thired_cond1").value = 2;
          document.getElementById("fiber_warp_thired_cond2").value = 2;

          var tolarance = fiber_warp_thired_tol_value2;
          var fiber_warp_thired_tol_cal_value2 = fiber_warp_thired_tol_value1 - tolarance;

          document.getElementById("fiber_warp_thired_value2").value = fiber_warp_thired_tol_value1;
          document.getElementById("fiber_warp_thired_value1").value = fiber_warp_thired_tol_cal_value2.toFixed(2);
      }

      if(isNaN(document.getElementById("fiber_warp_thired_tol_value1").value))
      {
          number_alert("fiber_warp_thired_tol_value1");
          return false;
      }

      if(isNaN(document.getElementById("fiber_warp_thired_tol_value2").value))
      {
          number_alert("fiber_warp_thired_tol_value2");
          return false;
      }
  }

  function fiber_warp_thired_condition() 
  {
      if (document.getElementById("fiber_warp_thired_cond1").value == 1) 
      {
      document.getElementById("fiber_warp_thired_cond2").value = 1;
      }
      else
      {
      document.getElementById("fiber_warp_thired_cond2").value = 2;
      }
  }
  //for fiber warp thired end 


  //for fiber warp fourth
  function fiber_warp_fourth_tol_condition()
  {
      var fiber_warp_fourth_tol_value1 = parseFloat(document.getElementById("fiber_warp_fourth_tol_value1").value);
      var fiber_warp_fourth_tol_value2 = parseFloat(document.getElementById("fiber_warp_fourth_tol_value2").value);
      var fiber_warp_fourth_tol_cond = document.getElementById("fiber_warp_fourth_tol_cond").value;

      if (fiber_warp_fourth_tol_cond == 1) 
      {
          document.getElementById("fiber_warp_fourth_cond1").value = 2;
          document.getElementById("fiber_warp_fourth_cond2").value = 2;

          //var tolarance = ((fiber_warp_fourth_tol_value2 * fiber_warp_fourth_tol_value1) / 100);
          var tolarance = fiber_warp_fourth_tol_value2;
          var fiber_warp_fourth_tol_cal_value2 = fiber_warp_fourth_tol_value1 + tolarance;
          var fiber_warp_fourth_tol_cal_value1 = fiber_warp_fourth_tol_value1 - tolarance;

          document.getElementById("fiber_warp_fourth_value1").value = fiber_warp_fourth_tol_cal_value1.toFixed(2);
          document.getElementById("fiber_warp_fourth_value2").value = fiber_warp_fourth_tol_cal_value2.toFixed(2);
      }

      if (fiber_warp_fourth_tol_cond == 2)
      {
          document.getElementById("fiber_warp_fourth_cond1").value = 2;
          document.getElementById("fiber_warp_fourth_cond2").value = 2;

          var tolarance = fiber_warp_fourth_tol_value2;
          var fiber_warp_fourth_tol_cal_value2 = fiber_warp_fourth_tol_value1 + tolarance;

          document.getElementById("fiber_warp_fourth_value1").value = fiber_warp_fourth_tol_value1;
          document.getElementById("fiber_warp_fourth_value2").value = fiber_warp_fourth_tol_cal_value2.toFixed(2);
      }

      if (fiber_warp_fourth_tol_cond == 3)
      {
          document.getElementById("fiber_warp_fourth_cond1").value = 2;
          document.getElementById("fiber_warp_fourth_cond2").value = 2;

          var tolarance = fiber_warp_fourth_tol_value2;
          var fiber_warp_fourth_tol_cal_value2 = fiber_warp_fourth_tol_value1 - tolarance;

          document.getElementById("fiber_warp_fourth_value2").value = fiber_warp_fourth_tol_value1;
          document.getElementById("fiber_warp_fourth_value1").value = fiber_warp_fourth_tol_cal_value2.toFixed(2);
      }

      if(isNaN(document.getElementById("fiber_warp_fourth_tol_value1").value))
      {
          number_alert("fiber_warp_fourth_tol_value1");
          return false;
      }

      if(isNaN(document.getElementById("fiber_warp_fourth_tol_value2").value))
      {
          number_alert("fiber_warp_fourth_tol_value2");
          return false;
      }
  }

  function fiber_warp_fourth_tol_cal_1()
  {
      var fiber_warp_fourth_tol_value1 = parseFloat(document.getElementById("fiber_warp_fourth_tol_value1").value);
      var fiber_warp_fourth_tol_value2 = parseFloat(document.getElementById("fiber_warp_fourth_tol_value2").value);
      var fiber_warp_fourth_tol_cond = document.getElementById("fiber_warp_fourth_tol_cond").value;

      if (fiber_warp_fourth_tol_cond == 1) 
      {
          document.getElementById("fiber_warp_fourth_cond1").value = 2;
          document.getElementById("fiber_warp_fourth_cond2").value = 2;

          //var tolarance = ((fiber_warp_fourth_tol_value2 * fiber_warp_fourth_tol_value1) / 100);
          var tolarance = fiber_warp_fourth_tol_value2;
          var fiber_warp_fourth_tol_cal_value2 = fiber_warp_fourth_tol_value1 + tolarance;
          var fiber_warp_fourth_tol_cal_value1 = fiber_warp_fourth_tol_value1 - tolarance;

          document.getElementById("fiber_warp_fourth_value1").value = fiber_warp_fourth_tol_cal_value1.toFixed(2);
          document.getElementById("fiber_warp_fourth_value2").value = fiber_warp_fourth_tol_cal_value2.toFixed(2);
      }

      if (fiber_warp_fourth_tol_cond == 2)
      {
          document.getElementById("fiber_warp_fourth_cond1").value = 2;
          document.getElementById("fiber_warp_fourth_cond2").value = 2;

          var tolarance = fiber_warp_fourth_tol_value2;
          var fiber_warp_fourth_tol_cal_value2 = fiber_warp_fourth_tol_value1 + tolarance;

          document.getElementById("fiber_warp_fourth_value1").value = fiber_warp_fourth_tol_value1;
          document.getElementById("fiber_warp_fourth_value2").value = fiber_warp_fourth_tol_cal_value2.toFixed(2);
      }

      if (fiber_warp_fourth_tol_cond == 3)
      {
          document.getElementById("fiber_warp_fourth_cond1").value = 2;
          document.getElementById("fiber_warp_fourth_cond2").value = 2;

          var tolarance = fiber_warp_fourth_tol_value2;
          var fiber_warp_fourth_tol_cal_value2 = fiber_warp_fourth_tol_value1 - tolarance;

          document.getElementById("fiber_warp_fourth_value2").value = fiber_warp_fourth_tol_value1;
          document.getElementById("fiber_warp_fourth_value1").value = fiber_warp_fourth_tol_cal_value2.toFixed(2);
      }

      if(isNaN(document.getElementById("fiber_warp_fourth_tol_value1").value))
      {
          number_alert("fiber_warp_fourth_tol_value1");
          return false;
      }

      if(isNaN(document.getElementById("fiber_warp_fourth_tol_value2").value))
      {
          number_alert("fiber_warp_fourth_tol_value2");
          return false;
      }
  }

  function fiber_warp_fourth_tol_cal_2()
  {
      var fiber_warp_fourth_tol_value1 = parseFloat(document.getElementById("fiber_warp_fourth_tol_value1").value);
      var fiber_warp_fourth_tol_value2 = parseFloat(document.getElementById("fiber_warp_fourth_tol_value2").value);
      var fiber_warp_fourth_tol_cond = document.getElementById("fiber_warp_fourth_tol_cond").value;

      if (fiber_warp_fourth_tol_cond == 1) 
      {
          document.getElementById("fiber_warp_fourth_cond1").value = 2;
          document.getElementById("fiber_warp_fourth_cond2").value = 2;

          //var tolarance = ((fiber_warp_fourth_tol_value2 * fiber_warp_fourth_tol_value1) / 100);
          var tolarance = fiber_warp_fourth_tol_value2;
          var fiber_warp_fourth_tol_cal_value2 = fiber_warp_fourth_tol_value1 + tolarance;
          var fiber_warp_fourth_tol_cal_value1 = fiber_warp_fourth_tol_value1 - tolarance;

          document.getElementById("fiber_warp_fourth_value1").value = fiber_warp_fourth_tol_cal_value1.toFixed(2);
          document.getElementById("fiber_warp_fourth_value2").value = fiber_warp_fourth_tol_cal_value2.toFixed(2);
      }

      if (fiber_warp_fourth_tol_cond == 2)
      {
          document.getElementById("fiber_warp_fourth_cond1").value = 2;
          document.getElementById("fiber_warp_fourth_cond2").value = 2;

          var tolarance = fiber_warp_fourth_tol_value2;
          var fiber_warp_fourth_tol_cal_value2 = fiber_warp_fourth_tol_value1 + tolarance;

          document.getElementById("fiber_warp_fourth_value1").value = fiber_warp_fourth_tol_value1;
          document.getElementById("fiber_warp_fourth_value2").value = fiber_warp_fourth_tol_cal_value2.toFixed(2);
      }

      if (fiber_warp_fourth_tol_cond == 3)
      {
          document.getElementById("fiber_warp_fourth_cond1").value = 2;
          document.getElementById("fiber_warp_fourth_cond2").value = 2;

          var tolarance = fiber_warp_fourth_tol_value2;
          var fiber_warp_fourth_tol_cal_value2 = fiber_warp_fourth_tol_value1 - tolarance;

          document.getElementById("fiber_warp_fourth_value2").value = fiber_warp_fourth_tol_value1;
          document.getElementById("fiber_warp_fourth_value1").value = fiber_warp_fourth_tol_cal_value2.toFixed(2);
      }

      if(isNaN(document.getElementById("fiber_warp_fourth_tol_value1").value))
      {
          number_alert("fiber_warp_fourth_tol_value1");
          return false;
      }

      if(isNaN(document.getElementById("fiber_warp_fourth_tol_value2").value))
      {
          number_alert("fiber_warp_fourth_tol_value2");
          return false;
      }
  }

  function fiber_warp_fourth_condition() 
  {
      if (document.getElementById("fiber_warp_fourth_cond1").value == 1) 
      {
      document.getElementById("fiber_warp_fourth_cond2").value = 1;
      }
      else
      {
      document.getElementById("fiber_warp_fourth_cond2").value = 2;
      }
  }
  //for fiber warp fourth end 
  //end of fiber warp content



  //now start fiber weft content from here
  //for fiber weft polyester
  function fiber_weft_polyester_tol_condition()
  {
      var fiber_weft_polyester_tol_value1 = parseFloat(document.getElementById("fiber_weft_polyester_tol_value1").value);
      var fiber_weft_polyester_tol_value2 = parseFloat(document.getElementById("fiber_weft_polyester_tol_value2").value);
      var fiber_weft_polyester_tol_cond = document.getElementById("fiber_weft_polyester_tol_cond").value;

      if (fiber_weft_polyester_tol_cond == 1) 
      {
          document.getElementById("fiber_weft_polyester_cond1").value = 2;
          document.getElementById("fiber_weft_polyester_cond2").value = 2;

          //var tolarance = ((fiber_weft_polyester_tol_value2 * fiber_weft_polyester_tol_value1) / 100);
          var tolarance = fiber_weft_polyester_tol_value2;
          var fiber_weft_polyester_tol_cal_value2 = fiber_weft_polyester_tol_value1 + tolarance;
          var fiber_weft_polyester_tol_cal_value1 = fiber_weft_polyester_tol_value1 - tolarance;

          document.getElementById("fiber_weft_polyester_value1").value = fiber_weft_polyester_tol_cal_value1.toFixed(2);
          document.getElementById("fiber_weft_polyester_value2").value = fiber_weft_polyester_tol_cal_value2.toFixed(2);
      }

      if (fiber_weft_polyester_tol_cond == 2)
      {
          document.getElementById("fiber_weft_polyester_cond1").value = 2;
          document.getElementById("fiber_weft_polyester_cond2").value = 2;

          var tolarance = fiber_weft_polyester_tol_value2;
          var fiber_weft_polyester_tol_cal_value2 = fiber_weft_polyester_tol_value1 + tolarance;

          document.getElementById("fiber_weft_polyester_value1").value = fiber_weft_polyester_tol_value1;
          document.getElementById("fiber_weft_polyester_value2").value = fiber_weft_polyester_tol_cal_value2.toFixed(2);
      }

      if (fiber_weft_polyester_tol_cond == 3)
      {
          document.getElementById("fiber_weft_polyester_cond1").value = 2;
          document.getElementById("fiber_weft_polyester_cond2").value = 2;

          var tolarance = fiber_weft_polyester_tol_value2;
          var fiber_weft_polyester_tol_cal_value2 = fiber_weft_polyester_tol_value1 - tolarance;

          document.getElementById("fiber_weft_polyester_value2").value = fiber_weft_polyester_tol_value1;
          document.getElementById("fiber_weft_polyester_value1").value = fiber_weft_polyester_tol_cal_value2.toFixed(2);
      }

      if(isNaN(document.getElementById("fiber_weft_polyester_tol_value1").value))
      {
          number_alert("fiber_weft_polyester_tol_value1");
          return false;
      }

      if(isNaN(document.getElementById("fiber_weft_polyester_tol_value2").value))
      {
          number_alert("fiber_weft_polyester_tol_value2");
          return false;
      }
  }

  function fiber_weft_polyester_tol_cal_1()
  {
      var fiber_weft_polyester_tol_value1 = parseFloat(document.getElementById("fiber_weft_polyester_tol_value1").value);
      var fiber_weft_polyester_tol_value2 = parseFloat(document.getElementById("fiber_weft_polyester_tol_value2").value);
      var fiber_weft_polyester_tol_cond = document.getElementById("fiber_weft_polyester_tol_cond").value;

      if (fiber_weft_polyester_tol_cond == 1) 
      {
          document.getElementById("fiber_weft_polyester_cond1").value = 2;
          document.getElementById("fiber_weft_polyester_cond2").value = 2;

          //var tolarance = ((fiber_weft_polyester_tol_value2 * fiber_weft_polyester_tol_value1) / 100);
          var tolarance = fiber_weft_polyester_tol_value2;
          var fiber_weft_polyester_tol_cal_value2 = fiber_weft_polyester_tol_value1 + tolarance;
          var fiber_weft_polyester_tol_cal_value1 = fiber_weft_polyester_tol_value1 - tolarance;

          document.getElementById("fiber_weft_polyester_value1").value = fiber_weft_polyester_tol_cal_value1.toFixed(2);
          document.getElementById("fiber_weft_polyester_value2").value = fiber_weft_polyester_tol_cal_value2.toFixed(2);
      }

      if (fiber_weft_polyester_tol_cond == 2)
      {
          document.getElementById("fiber_weft_polyester_cond1").value = 2;
          document.getElementById("fiber_weft_polyester_cond2").value = 2;

          var tolarance = fiber_weft_polyester_tol_value2;
          var fiber_weft_polyester_tol_cal_value2 = fiber_weft_polyester_tol_value1 + tolarance;

          document.getElementById("fiber_weft_polyester_value1").value = fiber_weft_polyester_tol_value1;
          document.getElementById("fiber_weft_polyester_value2").value = fiber_weft_polyester_tol_cal_value2.toFixed(2);
      }

      if (fiber_weft_polyester_tol_cond == 3)
      {
          document.getElementById("fiber_weft_polyester_cond1").value = 2;
          document.getElementById("fiber_weft_polyester_cond2").value = 2;

          var tolarance = fiber_weft_polyester_tol_value2;
          var fiber_weft_polyester_tol_cal_value2 = fiber_weft_polyester_tol_value1 - tolarance;

          document.getElementById("fiber_weft_polyester_value2").value = fiber_weft_polyester_tol_value1;
          document.getElementById("fiber_weft_polyester_value1").value = fiber_weft_polyester_tol_cal_value2.toFixed(2);
      }

      if(isNaN(document.getElementById("fiber_weft_polyester_tol_value1").value))
      {
          number_alert("fiber_weft_polyester_tol_value1");
          return false;
      }

      if(isNaN(document.getElementById("fiber_weft_polyester_tol_value2").value))
      {
          number_alert("fiber_weft_polyester_tol_value2");
          return false;
      }
  }

  function fiber_weft_polyester_tol_cal_2()
  {
      var fiber_weft_polyester_tol_value1 = parseFloat(document.getElementById("fiber_weft_polyester_tol_value1").value);
      var fiber_weft_polyester_tol_value2 = parseFloat(document.getElementById("fiber_weft_polyester_tol_value2").value);
      var fiber_weft_polyester_tol_cond = document.getElementById("fiber_weft_polyester_tol_cond").value;

      if (fiber_weft_polyester_tol_cond == 1) 
      {
          document.getElementById("fiber_weft_polyester_cond1").value = 2;
          document.getElementById("fiber_weft_polyester_cond2").value = 2;

          //var tolarance = ((fiber_weft_polyester_tol_value2 * fiber_weft_polyester_tol_value1) / 100);
          var tolarance = fiber_weft_polyester_tol_value2;
          var fiber_weft_polyester_tol_cal_value2 = fiber_weft_polyester_tol_value1 + tolarance;
          var fiber_weft_polyester_tol_cal_value1 = fiber_weft_polyester_tol_value1 - tolarance;

          document.getElementById("fiber_weft_polyester_value1").value = fiber_weft_polyester_tol_cal_value1.toFixed(2);
          document.getElementById("fiber_weft_polyester_value2").value = fiber_weft_polyester_tol_cal_value2.toFixed(2);
      }

      if (fiber_weft_polyester_tol_cond == 2)
      {
          document.getElementById("fiber_weft_polyester_cond1").value = 2;
          document.getElementById("fiber_weft_polyester_cond2").value = 2;

          var tolarance = fiber_weft_polyester_tol_value2;
          var fiber_weft_polyester_tol_cal_value2 = fiber_weft_polyester_tol_value1 + tolarance;

          document.getElementById("fiber_weft_polyester_value1").value = fiber_weft_polyester_tol_value1;
          document.getElementById("fiber_weft_polyester_value2").value = fiber_weft_polyester_tol_cal_value2.toFixed(2);
      }

      if (fiber_weft_polyester_tol_cond == 3)
      {
          document.getElementById("fiber_weft_polyester_cond1").value = 2;
          document.getElementById("fiber_weft_polyester_cond2").value = 2;

          var tolarance = fiber_weft_polyester_tol_value2;
          var fiber_weft_polyester_tol_cal_value2 = fiber_weft_polyester_tol_value1 - tolarance;

          document.getElementById("fiber_weft_polyester_value2").value = fiber_weft_polyester_tol_value1;
          document.getElementById("fiber_weft_polyester_value1").value = fiber_weft_polyester_tol_cal_value2.toFixed(2);
      }

      if(isNaN(document.getElementById("fiber_weft_polyester_tol_value1").value))
      {
          number_alert("fiber_weft_polyester_tol_value1");
          return false;
      }

      if(isNaN(document.getElementById("fiber_weft_polyester_tol_value2").value))
      {
          number_alert("fiber_weft_polyester_tol_value2");
          return false;
      }
  }

  function fiber_weft_polyester_condition() 
  {
      if (document.getElementById("fiber_weft_polyester_cond1").value == 1) 
      {
      document.getElementById("fiber_weft_polyester_cond2").value = 1;
      }
      else
      {
      document.getElementById("fiber_weft_polyester_cond2").value = 2;
      }
  }
  //for fiber weft polyester end 



  //for fiber weft cotton
  function fiber_weft_cotton_tol_condition()
  {
      var fiber_weft_cotton_tol_value1 = parseFloat(document.getElementById("fiber_weft_cotton_tol_value1").value);
      var fiber_weft_cotton_tol_value2 = parseFloat(document.getElementById("fiber_weft_cotton_tol_value2").value);
      var fiber_weft_cotton_tol_cond = document.getElementById("fiber_weft_cotton_tol_cond").value;

      if (fiber_weft_cotton_tol_cond == 1) 
      {
          document.getElementById("fiber_weft_cotton_cond1").value = 2;
          document.getElementById("fiber_weft_cotton_cond2").value = 2;

          //var tolarance = ((fiber_weft_cotton_tol_value2 * fiber_weft_cotton_tol_value1) / 100);
          var tolarance = fiber_weft_cotton_tol_value2;
          var fiber_weft_cotton_tol_cal_value2 = fiber_weft_cotton_tol_value1 + tolarance;
          var fiber_weft_cotton_tol_cal_value1 = fiber_weft_cotton_tol_value1 - tolarance;

          document.getElementById("fiber_weft_cotton_value1").value = fiber_weft_cotton_tol_cal_value1.toFixed(2);
          document.getElementById("fiber_weft_cotton_value2").value = fiber_weft_cotton_tol_cal_value2.toFixed(2);
      }

      if (fiber_weft_cotton_tol_cond == 2)
      {
          document.getElementById("fiber_weft_cotton_cond1").value = 2;
          document.getElementById("fiber_weft_cotton_cond2").value = 2;

          var tolarance = fiber_weft_cotton_tol_value2;
          var fiber_weft_cotton_tol_cal_value2 = fiber_weft_cotton_tol_value1 + tolarance;

          document.getElementById("fiber_weft_cotton_value1").value = fiber_weft_cotton_tol_value1;
          document.getElementById("fiber_weft_cotton_value2").value = fiber_weft_cotton_tol_cal_value2.toFixed(2);
      }

      if (fiber_weft_cotton_tol_cond == 3)
      {
          document.getElementById("fiber_weft_cotton_cond1").value = 2;
          document.getElementById("fiber_weft_cotton_cond2").value = 2;

          var tolarance = fiber_weft_cotton_tol_value2;
          var fiber_weft_cotton_tol_cal_value2 = fiber_weft_cotton_tol_value1 - tolarance;

          document.getElementById("fiber_weft_cotton_value2").value = fiber_weft_cotton_tol_value1;
          document.getElementById("fiber_weft_cotton_value1").value = fiber_weft_cotton_tol_cal_value2.toFixed(2);
      }

      if(isNaN(document.getElementById("fiber_weft_cotton_tol_value1").value))
      {
          number_alert("fiber_weft_cotton_tol_value1");
          return false;
      }

      if(isNaN(document.getElementById("fiber_weft_cotton_tol_value2").value))
      {
          number_alert("fiber_weft_cotton_tol_value2");
          return false;
      }
  }

  function fiber_weft_cotton_tol_cal_1()
  {
      var fiber_weft_cotton_tol_value1 = parseFloat(document.getElementById("fiber_weft_cotton_tol_value1").value);
      var fiber_weft_cotton_tol_value2 = parseFloat(document.getElementById("fiber_weft_cotton_tol_value2").value);
      var fiber_weft_cotton_tol_cond = document.getElementById("fiber_weft_cotton_tol_cond").value;

      if (fiber_weft_cotton_tol_cond == 1) 
      {
          document.getElementById("fiber_weft_cotton_cond1").value = 2;
          document.getElementById("fiber_weft_cotton_cond2").value = 2;

          //var tolarance = ((fiber_weft_cotton_tol_value2 * fiber_weft_cotton_tol_value1) / 100);
          var tolarance = fiber_weft_cotton_tol_value2;
          var fiber_weft_cotton_tol_cal_value2 = fiber_weft_cotton_tol_value1 + tolarance;
          var fiber_weft_cotton_tol_cal_value1 = fiber_weft_cotton_tol_value1 - tolarance;

          document.getElementById("fiber_weft_cotton_value1").value = fiber_weft_cotton_tol_cal_value1.toFixed(2);
          document.getElementById("fiber_weft_cotton_value2").value = fiber_weft_cotton_tol_cal_value2.toFixed(2);
      }

      if (fiber_weft_cotton_tol_cond == 2)
      {
          document.getElementById("fiber_weft_cotton_cond1").value = 2;
          document.getElementById("fiber_weft_cotton_cond2").value = 2;

          var tolarance = fiber_weft_cotton_tol_value2;
          var fiber_weft_cotton_tol_cal_value2 = fiber_weft_cotton_tol_value1 + tolarance;

          document.getElementById("fiber_weft_cotton_value1").value = fiber_weft_cotton_tol_value1;
          document.getElementById("fiber_weft_cotton_value2").value = fiber_weft_cotton_tol_cal_value2.toFixed(2);
      }

      if (fiber_weft_cotton_tol_cond == 3)
      {
          document.getElementById("fiber_weft_cotton_cond1").value = 2;
          document.getElementById("fiber_weft_cotton_cond2").value = 2;

          var tolarance = fiber_weft_cotton_tol_value2;
          var fiber_weft_cotton_tol_cal_value2 = fiber_weft_cotton_tol_value1 - tolarance;

          document.getElementById("fiber_weft_cotton_value2").value = fiber_weft_cotton_tol_value1;
          document.getElementById("fiber_weft_cotton_value1").value = fiber_weft_cotton_tol_cal_value2.toFixed(2);
      }

      if(isNaN(document.getElementById("fiber_weft_cotton_tol_value1").value))
      {
          number_alert("fiber_weft_cotton_tol_value1");
          return false;
      }

      if(isNaN(document.getElementById("fiber_weft_cotton_tol_value2").value))
      {
          number_alert("fiber_weft_cotton_tol_value2");
          return false;
      }
  }

  function fiber_weft_cotton_tol_cal_2()
  {
      var fiber_weft_cotton_tol_value1 = parseFloat(document.getElementById("fiber_weft_cotton_tol_value1").value);
      var fiber_weft_cotton_tol_value2 = parseFloat(document.getElementById("fiber_weft_cotton_tol_value2").value);
      var fiber_weft_cotton_tol_cond = document.getElementById("fiber_weft_cotton_tol_cond").value;

      if (fiber_weft_cotton_tol_cond == 1) 
      {
          document.getElementById("fiber_weft_cotton_cond1").value = 2;
          document.getElementById("fiber_weft_cotton_cond2").value = 2;

          //var tolarance = ((fiber_weft_cotton_tol_value2 * fiber_weft_cotton_tol_value1) / 100);
          var tolarance = fiber_weft_cotton_tol_value2;
          var fiber_weft_cotton_tol_cal_value2 = fiber_weft_cotton_tol_value1 + tolarance;
          var fiber_weft_cotton_tol_cal_value1 = fiber_weft_cotton_tol_value1 - tolarance;

          document.getElementById("fiber_weft_cotton_value1").value = fiber_weft_cotton_tol_cal_value1.toFixed(2);
          document.getElementById("fiber_weft_cotton_value2").value = fiber_weft_cotton_tol_cal_value2.toFixed(2);
      }

      if (fiber_weft_cotton_tol_cond == 2)
      {
          document.getElementById("fiber_weft_cotton_cond1").value = 2;
          document.getElementById("fiber_weft_cotton_cond2").value = 2;

          var tolarance = fiber_weft_cotton_tol_value2;
          var fiber_weft_cotton_tol_cal_value2 = fiber_weft_cotton_tol_value1 + tolarance;

          document.getElementById("fiber_weft_cotton_value1").value = fiber_weft_cotton_tol_value1;
          document.getElementById("fiber_weft_cotton_value2").value = fiber_weft_cotton_tol_cal_value2.toFixed(2);
      }

      if (fiber_weft_cotton_tol_cond == 3)
      {
          document.getElementById("fiber_weft_cotton_cond1").value = 2;
          document.getElementById("fiber_weft_cotton_cond2").value = 2;

          var tolarance = fiber_weft_cotton_tol_value2;
          var fiber_weft_cotton_tol_cal_value2 = fiber_weft_cotton_tol_value1 - tolarance;

          document.getElementById("fiber_weft_cotton_value2").value = fiber_weft_cotton_tol_value1;
          document.getElementById("fiber_weft_cotton_value1").value = fiber_weft_cotton_tol_cal_value2.toFixed(2);
      }

      if(isNaN(document.getElementById("fiber_weft_cotton_tol_value1").value))
      {
          number_alert("fiber_weft_cotton_tol_value1");
          return false;
      }

      if(isNaN(document.getElementById("fiber_weft_cotton_tol_value2").value))
      {
          number_alert("fiber_weft_cotton_tol_value2");
          return false;
      }
  }

  function fiber_weft_cotton_condition() 
  {
      if (document.getElementById("fiber_weft_cotton_cond1").value == 1) 
      {
      document.getElementById("fiber_weft_cotton_cond2").value = 1;
      }
      else
      {
      document.getElementById("fiber_weft_cotton_cond2").value = 2;
      }
  }
  //for fiber weft cotton end 

  //for fiber weft thired
  function fiber_weft_thired_tol_condition()
  {
      var fiber_weft_thired_tol_value1 = parseFloat(document.getElementById("fiber_weft_thired_tol_value1").value);
      var fiber_weft_thired_tol_value2 = parseFloat(document.getElementById("fiber_weft_thired_tol_value2").value);
      var fiber_weft_thired_tol_cond = document.getElementById("fiber_weft_thired_tol_cond").value;

      if (fiber_weft_thired_tol_cond == 1) 
      {
          document.getElementById("fiber_weft_thired_cond1").value = 2;
          document.getElementById("fiber_weft_thired_cond2").value = 2;

          //var tolarance = ((fiber_weft_thired_tol_value2 * fiber_weft_thired_tol_value1) / 100);
          var tolarance = fiber_weft_thired_tol_value2;
          var fiber_weft_thired_tol_cal_value2 = fiber_weft_thired_tol_value1 + tolarance;
          var fiber_weft_thired_tol_cal_value1 = fiber_weft_thired_tol_value1 - tolarance;

          document.getElementById("fiber_weft_thired_value1").value = fiber_weft_thired_tol_cal_value1.toFixed(2);
          document.getElementById("fiber_weft_thired_value2").value = fiber_weft_thired_tol_cal_value2.toFixed(2);
      }

      if (fiber_weft_thired_tol_cond == 2)
      {
          document.getElementById("fiber_weft_thired_cond1").value = 2;
          document.getElementById("fiber_weft_thired_cond2").value = 2;

          var tolarance = fiber_weft_thired_tol_value2;
          var fiber_weft_thired_tol_cal_value2 = fiber_weft_thired_tol_value1 + tolarance;

          document.getElementById("fiber_weft_thired_value1").value = fiber_weft_thired_tol_value1;
          document.getElementById("fiber_weft_thired_value2").value = fiber_weft_thired_tol_cal_value2.toFixed(2);
      }

      if (fiber_weft_thired_tol_cond == 3)
      {
          document.getElementById("fiber_weft_thired_cond1").value = 2;
          document.getElementById("fiber_weft_thired_cond2").value = 2;

          var tolarance = fiber_weft_thired_tol_value2;
          var fiber_weft_thired_tol_cal_value2 = fiber_weft_thired_tol_value1 - tolarance;

          document.getElementById("fiber_weft_thired_value2").value = fiber_weft_thired_tol_value1;
          document.getElementById("fiber_weft_thired_value1").value = fiber_weft_thired_tol_cal_value2.toFixed(2);
      }

      if(isNaN(document.getElementById("fiber_weft_thired_tol_value1").value))
      {
          number_alert("fiber_weft_thired_tol_value1");
          return false;
      }

      if(isNaN(document.getElementById("fiber_weft_thired_tol_value2").value))
      {
          number_alert("fiber_weft_thired_tol_value2");
          return false;
      }
  }

  function fiber_weft_thired_tol_cal_1()
  {
      var fiber_weft_thired_tol_value1 = parseFloat(document.getElementById("fiber_weft_thired_tol_value1").value);
      var fiber_weft_thired_tol_value2 = parseFloat(document.getElementById("fiber_weft_thired_tol_value2").value);
      var fiber_weft_thired_tol_cond = document.getElementById("fiber_weft_thired_tol_cond").value;

      if (fiber_weft_thired_tol_cond == 1) 
      {
          document.getElementById("fiber_weft_thired_cond1").value = 2;
          document.getElementById("fiber_weft_thired_cond2").value = 2;

          //var tolarance = ((fiber_weft_thired_tol_value2 * fiber_weft_thired_tol_value1) / 100);
          var tolarance = fiber_weft_thired_tol_value2;
          var fiber_weft_thired_tol_cal_value2 = fiber_weft_thired_tol_value1 + tolarance;
          var fiber_weft_thired_tol_cal_value1 = fiber_weft_thired_tol_value1 - tolarance;

          document.getElementById("fiber_weft_thired_value1").value = fiber_weft_thired_tol_cal_value1.toFixed(2);
          document.getElementById("fiber_weft_thired_value2").value = fiber_weft_thired_tol_cal_value2.toFixed(2);
      }

      if (fiber_weft_thired_tol_cond == 2)
      {
          document.getElementById("fiber_weft_thired_cond1").value = 2;
          document.getElementById("fiber_weft_thired_cond2").value = 2;

          var tolarance = fiber_weft_thired_tol_value2;
          var fiber_weft_thired_tol_cal_value2 = fiber_weft_thired_tol_value1 + tolarance;

          document.getElementById("fiber_weft_thired_value1").value = fiber_weft_thired_tol_value1;
          document.getElementById("fiber_weft_thired_value2").value = fiber_weft_thired_tol_cal_value2.toFixed(2);
      }

      if (fiber_weft_thired_tol_cond == 3)
      {
          document.getElementById("fiber_weft_thired_cond1").value = 2;
          document.getElementById("fiber_weft_thired_cond2").value = 2;

          var tolarance = fiber_weft_thired_tol_value2;
          var fiber_weft_thired_tol_cal_value2 = fiber_weft_thired_tol_value1 - tolarance;

          document.getElementById("fiber_weft_thired_value2").value = fiber_weft_thired_tol_value1;
          document.getElementById("fiber_weft_thired_value1").value = fiber_weft_thired_tol_cal_value2.toFixed(2);
      }

      if(isNaN(document.getElementById("fiber_weft_thired_tol_value1").value))
      {
          number_alert("fiber_weft_thired_tol_value1");
          return false;
      }

      if(isNaN(document.getElementById("fiber_weft_thired_tol_value2").value))
      {
          number_alert("fiber_weft_thired_tol_value2");
          return false;
      }
  }

  function fiber_weft_thired_tol_cal_2()
  {
      var fiber_weft_thired_tol_value1 = parseFloat(document.getElementById("fiber_weft_thired_tol_value1").value);
      var fiber_weft_thired_tol_value2 = parseFloat(document.getElementById("fiber_weft_thired_tol_value2").value);
      var fiber_weft_thired_tol_cond = document.getElementById("fiber_weft_thired_tol_cond").value;

      if (fiber_weft_thired_tol_cond == 1) 
      {
          document.getElementById("fiber_weft_thired_cond1").value = 2;
          document.getElementById("fiber_weft_thired_cond2").value = 2;

          //var tolarance = ((fiber_weft_thired_tol_value2 * fiber_weft_thired_tol_value1) / 100);
          var tolarance = fiber_weft_thired_tol_value2;
          var fiber_weft_thired_tol_cal_value2 = fiber_weft_thired_tol_value1 + tolarance;
          var fiber_weft_thired_tol_cal_value1 = fiber_weft_thired_tol_value1 - tolarance;

          document.getElementById("fiber_weft_thired_value1").value = fiber_weft_thired_tol_cal_value1.toFixed(2);
          document.getElementById("fiber_weft_thired_value2").value = fiber_weft_thired_tol_cal_value2.toFixed(2);
      }

      if (fiber_weft_thired_tol_cond == 2)
      {
          document.getElementById("fiber_weft_thired_cond1").value = 2;
          document.getElementById("fiber_weft_thired_cond2").value = 2;

          var tolarance = fiber_weft_thired_tol_value2;
          var fiber_weft_thired_tol_cal_value2 = fiber_weft_thired_tol_value1 + tolarance;

          document.getElementById("fiber_weft_thired_value1").value = fiber_weft_thired_tol_value1;
          document.getElementById("fiber_weft_thired_value2").value = fiber_weft_thired_tol_cal_value2.toFixed(2);
      }

      if (fiber_weft_thired_tol_cond == 3)
      {
          document.getElementById("fiber_weft_thired_cond1").value = 2;
          document.getElementById("fiber_weft_thired_cond2").value = 2;

          var tolarance = fiber_weft_thired_tol_value2;
          var fiber_weft_thired_tol_cal_value2 = fiber_weft_thired_tol_value1 - tolarance;

          document.getElementById("fiber_weft_thired_value2").value = fiber_weft_thired_tol_value1;
          document.getElementById("fiber_weft_thired_value1").value = fiber_weft_thired_tol_cal_value2.toFixed(2);
      }

      if(isNaN(document.getElementById("fiber_weft_thired_tol_value1").value))
      {
          number_alert("fiber_weft_thired_tol_value1");
          return false;
      }

      if(isNaN(document.getElementById("fiber_weft_thired_tol_value2").value))
      {
          number_alert("fiber_weft_thired_tol_value2");
          return false;
      }
  }

  function fiber_weft_thired_condition() 
  {
      if (document.getElementById("fiber_weft_thired_cond1").value == 1) 
      {
      document.getElementById("fiber_weft_thired_cond2").value = 1;
      }
      else
      {
      document.getElementById("fiber_weft_thired_cond2").value = 2;
      }
  }
  //for fiber weft thired end 


  //for fiber weft fourth
  function fiber_weft_fourth_tol_condition()
  {
      var fiber_weft_fourth_tol_value1 = parseFloat(document.getElementById("fiber_weft_fourth_tol_value1").value);
      var fiber_weft_fourth_tol_value2 = parseFloat(document.getElementById("fiber_weft_fourth_tol_value2").value);
      var fiber_weft_fourth_tol_cond = document.getElementById("fiber_weft_fourth_tol_cond").value;

      if (fiber_weft_fourth_tol_cond == 1) 
      {
          document.getElementById("fiber_weft_fourth_cond1").value = 2;
          document.getElementById("fiber_weft_fourth_cond2").value = 2;

          //var tolarance = ((fiber_weft_fourth_tol_value2 * fiber_weft_fourth_tol_value1) / 100);
          var tolarance = fiber_weft_fourth_tol_value2;
          var fiber_weft_fourth_tol_cal_value2 = fiber_weft_fourth_tol_value1 + tolarance;
          var fiber_weft_fourth_tol_cal_value1 = fiber_weft_fourth_tol_value1 - tolarance;

          document.getElementById("fiber_weft_fourth_value1").value = fiber_weft_fourth_tol_cal_value1.toFixed(2);
          document.getElementById("fiber_weft_fourth_value2").value = fiber_weft_fourth_tol_cal_value2.toFixed(2);
      }

      if (fiber_weft_fourth_tol_cond == 2)
      {
          document.getElementById("fiber_weft_fourth_cond1").value = 2;
          document.getElementById("fiber_weft_fourth_cond2").value = 2;

          var tolarance = fiber_weft_fourth_tol_value2;
          var fiber_weft_fourth_tol_cal_value2 = fiber_weft_fourth_tol_value1 + tolarance;

          document.getElementById("fiber_weft_fourth_value1").value = fiber_weft_fourth_tol_value1;
          document.getElementById("fiber_weft_fourth_value2").value = fiber_weft_fourth_tol_cal_value2.toFixed(2);
      }

      if (fiber_weft_fourth_tol_cond == 3)
      {
          document.getElementById("fiber_weft_fourth_cond1").value = 2;
          document.getElementById("fiber_weft_fourth_cond2").value = 2;

          var tolarance = fiber_weft_fourth_tol_value2;
          var fiber_weft_fourth_tol_cal_value2 = fiber_weft_fourth_tol_value1 - tolarance;

          document.getElementById("fiber_weft_fourth_value2").value = fiber_weft_fourth_tol_value1;
          document.getElementById("fiber_weft_fourth_value1").value = fiber_weft_fourth_tol_cal_value2.toFixed(2);
      }

      if(isNaN(document.getElementById("fiber_weft_fourth_tol_value1").value))
      {
          number_alert("fiber_weft_fourth_tol_value1");
          return false;
      }

      if(isNaN(document.getElementById("fiber_weft_fourth_tol_value2").value))
      {
          number_alert("fiber_weft_fourth_tol_value2");
          return false;
      }
  }

  function fiber_weft_fourth_tol_cal_1()
  {
      var fiber_weft_fourth_tol_value1 = parseFloat(document.getElementById("fiber_weft_fourth_tol_value1").value);
      var fiber_weft_fourth_tol_value2 = parseFloat(document.getElementById("fiber_weft_fourth_tol_value2").value);
      var fiber_weft_fourth_tol_cond = document.getElementById("fiber_weft_fourth_tol_cond").value;

      if (fiber_weft_fourth_tol_cond == 1) 
      {
          document.getElementById("fiber_weft_fourth_cond1").value = 2;
          document.getElementById("fiber_weft_fourth_cond2").value = 2;

          //var tolarance = ((fiber_weft_fourth_tol_value2 * fiber_weft_fourth_tol_value1) / 100);
          var tolarance = fiber_weft_fourth_tol_value2;
          var fiber_weft_fourth_tol_cal_value2 = fiber_weft_fourth_tol_value1 + tolarance;
          var fiber_weft_fourth_tol_cal_value1 = fiber_weft_fourth_tol_value1 - tolarance;

          document.getElementById("fiber_weft_fourth_value1").value = fiber_weft_fourth_tol_cal_value1.toFixed(2);
          document.getElementById("fiber_weft_fourth_value2").value = fiber_weft_fourth_tol_cal_value2.toFixed(2);
      }

      if (fiber_weft_fourth_tol_cond == 2)
      {
          document.getElementById("fiber_weft_fourth_cond1").value = 2;
          document.getElementById("fiber_weft_fourth_cond2").value = 2;

          var tolarance = fiber_weft_fourth_tol_value2;
          var fiber_weft_fourth_tol_cal_value2 = fiber_weft_fourth_tol_value1 + tolarance;

          document.getElementById("fiber_weft_fourth_value1").value = fiber_weft_fourth_tol_value1;
          document.getElementById("fiber_weft_fourth_value2").value = fiber_weft_fourth_tol_cal_value2.toFixed(2);
      }

      if (fiber_weft_fourth_tol_cond == 3)
      {
          document.getElementById("fiber_weft_fourth_cond1").value = 2;
          document.getElementById("fiber_weft_fourth_cond2").value = 2;

          var tolarance = fiber_weft_fourth_tol_value2;
          var fiber_weft_fourth_tol_cal_value2 = fiber_weft_fourth_tol_value1 - tolarance;

          document.getElementById("fiber_weft_fourth_value2").value = fiber_weft_fourth_tol_value1;
          document.getElementById("fiber_weft_fourth_value1").value = fiber_weft_fourth_tol_cal_value2.toFixed(2);
      }

      if(isNaN(document.getElementById("fiber_weft_fourth_tol_value1").value))
      {
          number_alert("fiber_weft_fourth_tol_value1");
          return false;
      }

      if(isNaN(document.getElementById("fiber_weft_fourth_tol_value2").value))
      {
          number_alert("fiber_weft_fourth_tol_value2");
          return false;
      }
  }

  function fiber_weft_fourth_tol_cal_2()
  {
      var fiber_weft_fourth_tol_value1 = parseFloat(document.getElementById("fiber_weft_fourth_tol_value1").value);
      var fiber_weft_fourth_tol_value2 = parseFloat(document.getElementById("fiber_weft_fourth_tol_value2").value);
      var fiber_weft_fourth_tol_cond = document.getElementById("fiber_weft_fourth_tol_cond").value;

      if (fiber_weft_fourth_tol_cond == 1) 
      {
          document.getElementById("fiber_weft_fourth_cond1").value = 2;
          document.getElementById("fiber_weft_fourth_cond2").value = 2;

          //var tolarance = ((fiber_weft_fourth_tol_value2 * fiber_weft_fourth_tol_value1) / 100);
          var tolarance = fiber_weft_fourth_tol_value2;
          var fiber_weft_fourth_tol_cal_value2 = fiber_weft_fourth_tol_value1 + tolarance;
          var fiber_weft_fourth_tol_cal_value1 = fiber_weft_fourth_tol_value1 - tolarance;

          document.getElementById("fiber_weft_fourth_value1").value = fiber_weft_fourth_tol_cal_value1.toFixed(2);
          document.getElementById("fiber_weft_fourth_value2").value = fiber_weft_fourth_tol_cal_value2.toFixed(2);
      }

      if (fiber_weft_fourth_tol_cond == 2)
      {
          document.getElementById("fiber_weft_fourth_cond1").value = 2;
          document.getElementById("fiber_weft_fourth_cond2").value = 2;

          var tolarance = fiber_weft_fourth_tol_value2;
          var fiber_weft_fourth_tol_cal_value2 = fiber_weft_fourth_tol_value1 + tolarance;

          document.getElementById("fiber_weft_fourth_value1").value = fiber_weft_fourth_tol_value1;
          document.getElementById("fiber_weft_fourth_value2").value = fiber_weft_fourth_tol_cal_value2.toFixed(2);
      }

      if (fiber_weft_fourth_tol_cond == 3)
      {
          document.getElementById("fiber_weft_fourth_cond1").value = 2;
          document.getElementById("fiber_weft_fourth_cond2").value = 2;

          var tolarance = fiber_weft_fourth_tol_value2;
          var fiber_weft_fourth_tol_cal_value2 = fiber_weft_fourth_tol_value1 - tolarance;

          document.getElementById("fiber_weft_fourth_value2").value = fiber_weft_fourth_tol_value1;
          document.getElementById("fiber_weft_fourth_value1").value = fiber_weft_fourth_tol_cal_value2.toFixed(2);
      }

      if(isNaN(document.getElementById("fiber_weft_fourth_tol_value1").value))
      {
          number_alert("fiber_weft_fourth_tol_value1");
          return false;
      }

      if(isNaN(document.getElementById("fiber_weft_fourth_tol_value2").value))
      {
          number_alert("fiber_weft_fourth_tol_value2");
          return false;
      }
  }

  function fiber_weft_fourth_condition() 
  {
      if (document.getElementById("fiber_weft_fourth_cond1").value == 1) 
      {
      document.getElementById("fiber_weft_fourth_cond2").value = 1;
      }
      else
      {
      document.getElementById("fiber_weft_fourth_cond2").value = 2;
      }
  }
  //for fiber weft fourth end 
  //end of fiber weft content


  function bowing_and_skew_tol_cal_1()
  {
      // var bowing_and_skew_tol_value1 = parseFloat(document.getElementById("bowing_and_skew_tol_value1").value);
      // var bowing_and_skew_tol_value2 = parseFloat(document.getElementById("bowing_and_skew_tol_value2").value);

      // if(isNaN(document.getElementById("bowing_and_skew_tol_value1").value))
      // {
      //     number_alert("bowing_and_skew_tol_value1");
      //     return false;
      // }

      // if(isNaN(document.getElementById("bowing_and_skew_tol_value2").value))
      // {
      //     number_alert("bowing_and_skew_tol_value2");
      //     return false;
      // }

      // document.getElementById("bowing_and_skew_cond1").value = 1;
      // document.getElementById("bowing_and_skew_cond2").value = 1;

      // var tolarance = (bowing_and_skew_tol_value2 / 100);
      // var bowing_and_skew_tol_cal_value2 = bowing_and_skew_tol_value1 + tolarance;
      // var bowing_and_skew_tol_cal_value1 = bowing_and_skew_tol_value1 - tolarance;

      // document.getElementById("bowing_and_skew_value1").value = bowing_and_skew_tol_cal_value1.toFixed(5);
      // document.getElementById("bowing_and_skew_value2").value = bowing_and_skew_tol_cal_value2.toFixed(5);

      var bowing_and_skew_tol_value1 = parseFloat(document.getElementById("bowing_and_skew_tol_value1").value);
      var bowing_and_skew_tol_value2 = parseFloat(document.getElementById("bowing_and_skew_tol_value2").value);
      var bowing_and_skew_tol_cond = document.getElementById("bowing_and_skew_tol_cond").value;

      if (bowing_and_skew_tol_cond == 1) 
      {
          document.getElementById("bowing_and_skew_cond1").value = 2;
          document.getElementById("bowing_and_skew_cond2").value = 2;

          var tolarance = ((bowing_and_skew_tol_value2 * bowing_and_skew_tol_value1) / 100);
          var bowing_and_skew_tol_cal_value2 = bowing_and_skew_tol_value1 + tolarance;
          var bowing_and_skew_tol_cal_value1 = bowing_and_skew_tol_value1 - tolarance;

          document.getElementById("bowing_and_skew_value1").value = bowing_and_skew_tol_cal_value1.toFixed(5);
          document.getElementById("bowing_and_skew_value2").value = bowing_and_skew_tol_cal_value2.toFixed(5);
      }

      if (bowing_and_skew_tol_cond == 2)
      {
          document.getElementById("bowing_and_skew_cond1").value = 2;
          document.getElementById("bowing_and_skew_cond2").value = 2;

          var tolarance = ((bowing_and_skew_tol_value2 * bowing_and_skew_tol_value1) / 100);
          var bowing_and_skew_tol_cal_value2 = bowing_and_skew_tol_value1 + tolarance;

          document.getElementById("bowing_and_skew_value1").value = bowing_and_skew_tol_value1;
          document.getElementById("bowing_and_skew_value2").value = bowing_and_skew_tol_cal_value2.toFixed(5);
      }

      if (bowing_and_skew_tol_cond == 3)
      {
          document.getElementById("bowing_and_skew_cond1").value = 2;
          document.getElementById("bowing_and_skew_cond2").value = 2;

          var tolarance = ((bowing_and_skew_tol_value2 * bowing_and_skew_tol_value1) / 100);
          var bowing_and_skew_tol_cal_value2 = bowing_and_skew_tol_value1 - tolarance;

          document.getElementById("bowing_and_skew_value2").value = bowing_and_skew_tol_value1;
          document.getElementById("bowing_and_skew_value1").value = bowing_and_skew_tol_cal_value2.toFixed(5);
      }

      if(isNaN(document.getElementById("bowing_and_skew_tol_value1").value))
      {
          number_alert("bowing_and_skew_tol_value1");
          return false;
      }

      if(isNaN(document.getElementById("bowing_and_skew_tol_value2").value))
      {
          number_alert("bowing_and_skew_tol_value2");
          return false;
      }
  }


  function bowing_and_skew_tol_cal_2()
  {
      var bowing_and_skew_tol_value1 = parseFloat(document.getElementById("bowing_and_skew_tol_value1").value);
      var bowing_and_skew_tol_value2 = parseFloat(document.getElementById("bowing_and_skew_tol_value2").value);
      var bowing_and_skew_tol_cond = document.getElementById("bowing_and_skew_tol_cond").value;

      if (bowing_and_skew_tol_cond == 1) 
      {
          document.getElementById("bowing_and_skew_cond1").value = 2;
          document.getElementById("bowing_and_skew_cond2").value = 2;

          var tolarance = ((bowing_and_skew_tol_value2 * bowing_and_skew_tol_value1) / 100);
          var bowing_and_skew_tol_cal_value2 = bowing_and_skew_tol_value1 + tolarance;
          var bowing_and_skew_tol_cal_value1 = bowing_and_skew_tol_value1 - tolarance;

          document.getElementById("bowing_and_skew_value1").value = bowing_and_skew_tol_cal_value1.toFixed(5);
          document.getElementById("bowing_and_skew_value2").value = bowing_and_skew_tol_cal_value2.toFixed(5);
      }

      if (bowing_and_skew_tol_cond == 2)
      {
          document.getElementById("bowing_and_skew_cond1").value = 2;
          document.getElementById("bowing_and_skew_cond2").value = 2;

          var tolarance = ((bowing_and_skew_tol_value2 * bowing_and_skew_tol_value1) / 100);
          var bowing_and_skew_tol_cal_value2 = bowing_and_skew_tol_value1 + tolarance;

          document.getElementById("bowing_and_skew_value1").value = bowing_and_skew_tol_value1;
          document.getElementById("bowing_and_skew_value2").value = bowing_and_skew_tol_cal_value2.toFixed(5);
      }

      if (bowing_and_skew_tol_cond == 3)
      {
          document.getElementById("bowing_and_skew_cond1").value = 2;
          document.getElementById("bowing_and_skew_cond2").value = 2;

          var tolarance = ((bowing_and_skew_tol_value2 * bowing_and_skew_tol_value1) / 100);
          var bowing_and_skew_tol_cal_value2 = bowing_and_skew_tol_value1 - tolarance;

          document.getElementById("bowing_and_skew_value2").value = bowing_and_skew_tol_value1;
          document.getElementById("bowing_and_skew_value1").value = bowing_and_skew_tol_cal_value2.toFixed(5);
      }

      if(isNaN(document.getElementById("bowing_and_skew_tol_value1").value))
      {
          number_alert("bowing_and_skew_tol_value1");
          return false;
      }

      if(isNaN(document.getElementById("bowing_and_skew_tol_value2").value))
      {
          number_alert("bowing_and_skew_tol_value2");
          return false;
      }
  }

  function bowing_and_skew_tol_condition()
  {
      var bowing_and_skew_tol_value1 = parseFloat(document.getElementById("bowing_and_skew_tol_value1").value);
      var bowing_and_skew_tol_value2 = parseFloat(document.getElementById("bowing_and_skew_tol_value2").value);
      var bowing_and_skew_tol_cond = document.getElementById("bowing_and_skew_tol_cond").value;

      if (bowing_and_skew_tol_cond == 1) 
      {
          document.getElementById("bowing_and_skew_cond1").value = 2;
          document.getElementById("bowing_and_skew_cond2").value = 2;

          var tolarance = ((bowing_and_skew_tol_value2 * bowing_and_skew_tol_value1) / 100);
          var bowing_and_skew_tol_cal_value2 = bowing_and_skew_tol_value1 + tolarance;
          var bowing_and_skew_tol_cal_value1 = bowing_and_skew_tol_value1 - tolarance;

          document.getElementById("bowing_and_skew_value1").value = bowing_and_skew_tol_cal_value1.toFixed(5);
          document.getElementById("bowing_and_skew_value2").value = bowing_and_skew_tol_cal_value2.toFixed(5);
      }

      if (bowing_and_skew_tol_cond == 2)
      {
          document.getElementById("bowing_and_skew_cond1").value = 2;
          document.getElementById("bowing_and_skew_cond2").value = 2;

          var tolarance = ((bowing_and_skew_tol_value2 * bowing_and_skew_tol_value1) / 100);
          var bowing_and_skew_tol_cal_value2 = bowing_and_skew_tol_value1 + tolarance;

          document.getElementById("bowing_and_skew_value1").value = bowing_and_skew_tol_value1;
          document.getElementById("bowing_and_skew_value2").value = bowing_and_skew_tol_cal_value2.toFixed(5);
      }

      if (bowing_and_skew_tol_cond == 3)
      {
          document.getElementById("bowing_and_skew_cond1").value = 2;
          document.getElementById("bowing_and_skew_cond2").value = 2;

          var tolarance = ((bowing_and_skew_tol_value2 * bowing_and_skew_tol_value1) / 100);
          var bowing_and_skew_tol_cal_value2 = bowing_and_skew_tol_value1 - tolarance;

          document.getElementById("bowing_and_skew_value2").value = bowing_and_skew_tol_value1;
          document.getElementById("bowing_and_skew_value1").value = bowing_and_skew_tol_cal_value2.toFixed(5);
      }

      if(isNaN(document.getElementById("bowing_and_skew_tol_value1").value))
      {
          number_alert("bowing_and_skew_tol_value1");
          return false;
      }

      if(isNaN(document.getElementById("bowing_and_skew_tol_value2").value))
      {
          number_alert("bowing_and_skew_tol_value2");
          return false;
      }
  }


  function edit_for_finishing_standard()
  {
      var pp_no = document.getElementById("pp_no").value;
      var color = document.getElementById("color").value;
      var version = document.getElementById("version").value;
      var gray_width = document.getElementById("gray_width").value;
      var pp_id_number = document.getElementById("pp_id_number").value;
      var pp_details_id = document.getElementById("pp_details_id").value;

      $.ajax(
      {
          type: "POST",
          url: "edit_standard_for_finishing.php",
          method: "POST",
          data: 
          {
            pp_no: pp_no, 
            color: color,
            version: version,
            gray_width: gray_width,
            pp_id_number: pp_id_number,
            pp_details_id: pp_details_id
          },
          success:function(data)
          {
              $('#retrieve_edit_data').html(data);
          }
      });
  }


function update_edit_finishing_standard_data(pp_version_id)
  {
      var formValidation = Form_Validation_For_Finishing();

      if(formValidation != false)
      {
        var formdata = new FormData(document.getElementById('gray_variable_form'));
        $.ajax(
        {
            type: "POST",
            url: "edit_finishing_standard_for_saving.php",
            data: formdata,
            processData: false,
            contentType: false,
            error: function(jqXHR, textStatus, errorMessage) 
            {
                alert(errorMessage);
            },
            success: function(data) 
            {
              //alert(data);
              if (data == "Yes")
              {
                  info_alert("Data not Submitted");
              }
              else
              {
                  var pp_no_id = document.getElementById("pp_no_id").value;
                  var pp_version_standard = document.getElementById("pp_version_standard").value;

                  $.ajax(
                  {
                      url: "view_standard_select.php",
                      method: "POST",
                      data: {pp_no_id: pp_no_id, pp_version: pp_version_id, pp_version_standard: pp_version_standard},
                      success:function(data)
                      {
                          $('#others_retrieve_general_data').html(data);
                      }
                  });
              }
            } 
        });
      }
  }

function send_data_of_define_standard_of_washing_form_to_database(pp_version_id)
  {
      var formValidation = Form_Validation_For_Washing();

      if(formValidation != false)
      {
          var formdata = new FormData(document.getElementById('washing_variable_form'));

          $.ajax(
          {
              type: "POST",
              url: "add_washing_variable_saving.php",// where you wanna post
              data: formdata,
              processData: false,
              contentType: false,
              error: function(jqXHR, textStatus, errorMessage) 
              {
                  alert(errorMessage);
              },
              success: function(data) 
              {
                  if (data == "Yes")
                  {
                      info_alert("Data not Submitted");
                  }
                  else
                  {
                      //alert(data);
                      var pp_no_id = document.getElementById("pp_no_id").value;
                      //var pp_version = document.getElementById("pp_version").value;
                      var pp_version_standard = document.getElementById("pp_version_standard").value;

                      $.ajax(
                      {
                          url: "view_standard_select.php",
                          method: "POST",
                          data: {pp_no_id: pp_no_id, pp_version: pp_version_id, pp_version_standard: pp_version_standard},
                          success:function(data)
                          {
                              //alert(data);
                              $('#retrieve_general_data').html(data);
                          }
                      });
                  }
              } 
          });
      }
  }


function update_edit_washing_standard_data(pp_version_id)
  {
      var formValidation = Form_Validation_For_Washing();

      if(formValidation != false)
      {
        var formdata = new FormData(document.getElementById('washing_variable_form'));
        $.ajax(
        {
            type: "POST",
            url: "edit_washing_standard_for_saving.php",
            data: formdata,
            processData: false,
            contentType: false,
            error: function(jqXHR, textStatus, errorMessage) 
            {
                alert(errorMessage);
            },
            success: function(data) 
            {
              //alert(data);

              if (data == "Yes")
              {
                  info_alert("Data not Submitted");
              }
              else
              {
                  var pp_no_id = document.getElementById("pp_no_id").value;
                  var pp_version_standard = document.getElementById("pp_version_standard").value;

                  $.ajax(
                  {
                      url: "view_standard_select.php",
                      method: "POST",
                      data: {pp_no_id: pp_no_id, pp_version: pp_version_id, pp_version_standard: pp_version_standard},
                      success:function(data)
                      {
                          $('#others_retrieve_general_data').html(data);
                      }
                  });
              }
            } 
        });
      }
  }

function edit_for_washing_standard()
{
    var pp_no = document.getElementById("pp_no").value;
    var color = document.getElementById("color").value;
    var version = document.getElementById("version").value;
    var gray_width = document.getElementById("gray_width").value;
    var pp_id_number = document.getElementById("pp_id_number").value;
    var pp_details_id = document.getElementById("pp_details_id").value;

    $.ajax(
    {
        type: "POST",
        url: "edit_standard_for_washing.php",
        method: "POST",
        data: 
        {
          pp_no: pp_no, 
          color: color,
          version: version,
          gray_width: gray_width,
          pp_id_number: pp_id_number,
          pp_details_id: pp_details_id
        },
        success:function(data)
        {
            $('#retrieve_edit_data').html(data);
        }
    });
}


function send_data_of_define_standard_of_calendering_form_to_database(pp_version_id)
  {
      var formValidation = Form_Validation_For_Calendering();

      if(formValidation != false)
      {
          var formdata = new FormData(document.getElementById('calendering_variable_form'));

          $.ajax(
          {
              type: "POST",
              url: "add_calendering_variable_saving.php",// where you wanna post
              data: formdata,
              processData: false,
              contentType: false,
              error: function(jqXHR, textStatus, errorMessage) 
              {
                  alert(errorMessage);
              },
              success: function(data) 
              {
                  //alert(data);
                  if (data == "Yes")
                  {
                      info_alert("Data not Submitted");
                  }
                  else
                  {
                      //alert(data);
                      var pp_no_id = document.getElementById("pp_no_id").value;
                      //var pp_version = document.getElementById("pp_version").value;
                      var pp_version_standard = document.getElementById("pp_version_standard").value;

                      $.ajax(
                      {
                          url: "view_standard_select.php",
                          method: "POST",
                          data: {pp_no_id: pp_no_id, pp_version: pp_version_id, pp_version_standard: pp_version_standard},
                          success:function(data)
                          {
                              //alert(data);
                              $('#retrieve_general_data').html(data);
                          }
                      });
                  }
              } 
          });
      }
  }


function update_edit_calendering_standard_data(pp_version_id)
  {
      var formValidation = Form_Validation_For_Calendering();

      if(formValidation != false)
      {
        var formdata = new FormData(document.getElementById('calendering_variable_form'));
        $.ajax(
        {
            type: "POST",
            url: "edit_calendering_standard_for_saving.php",
            data: formdata,
            processData: false,
            contentType: false,
            error: function(jqXHR, textStatus, errorMessage) 
            {
                alert(errorMessage);
            },
            success: function(data) 
            {
              //alert(data);

              if (data == "Yes")
              {
                  info_alert("Data not Submitted");
              }
              else
              {
                  var pp_no_id = document.getElementById("pp_no_id").value;
                  var pp_version_standard = document.getElementById("pp_version_standard").value;

                  $.ajax(
                  {
                      url: "view_standard_select.php",
                      method: "POST",
                      data: {pp_no_id: pp_no_id, pp_version: pp_version_id, pp_version_standard: pp_version_standard},
                      success:function(data)
                      {
                          $('#others_retrieve_general_data').html(data);
                      }
                  });
              }
            } 
        });
      }
  }

function edit_for_calendering_standard()
{
    var pp_no = document.getElementById("pp_no").value;
    var color = document.getElementById("color").value;
    var version = document.getElementById("version").value;
    var gray_width = document.getElementById("gray_width").value;
    var pp_id_number = document.getElementById("pp_id_number").value;
    var pp_details_id = document.getElementById("pp_details_id").value;

    $.ajax(
    {
        type: "POST",
        url: "edit_standard_for_calendering.php",
        method: "POST",
        data: 
        {
          pp_no: pp_no, 
          color: color,
          version: version,
          gray_width: gray_width,
          pp_id_number: pp_id_number,
          pp_details_id: pp_details_id
        },
        success:function(data)
        {
            $('#retrieve_edit_data').html(data);
        }
    });
}


function send_data_of_define_standard_of_sanforizing_form_to_database(pp_version_id)
  {
      var formValidation = Form_Validation_For_Sanforizing();

      if(formValidation != false)
      {
          var formdata = new FormData(document.getElementById('sanforizing_variable_form'));

          $.ajax(
          {
              type: "POST",
              url: "add_sanforizing_variable_saving.php",// where you wanna post
              data: formdata,
              processData: false,
              contentType: false,
              error: function(jqXHR, textStatus, errorMessage) 
              {
                  alert(errorMessage);
              },
              success: function(data) 
              {
                  //alert(data);
                  if (data == "Yes")
                  {
                      info_alert("Data not Submitted");
                  }
                  else
                  {
                      //alert(data);
                      var pp_no_id = document.getElementById("pp_no_id").value;
                      //var pp_version = document.getElementById("pp_version").value;
                      var pp_version_standard = document.getElementById("pp_version_standard").value;

                      $.ajax(
                      {
                          url: "view_standard_select.php",
                          method: "POST",
                          data: {pp_no_id: pp_no_id, pp_version: pp_version_id, pp_version_standard: pp_version_standard},
                          success:function(data)
                          {
                              //alert(data);
                              $('#retrieve_general_data').html(data);
                          }
                      });
                  }
              } 
          });
      }
  }


function update_edit_sanforizing_standard_data(pp_version_id)
  {
      var formValidation = Form_Validation_For_Sanforizing();

      if(formValidation != false)
      {
        var formdata = new FormData(document.getElementById('sanforizing_variable_form'));
        $.ajax(
        {
            type: "POST",
            url: "edit_sanforizing_standard_for_saving.php",
            data: formdata,
            processData: false,
            contentType: false,
            error: function(jqXHR, textStatus, errorMessage) 
            {
                alert(errorMessage);
            },
            success: function(data) 
            {
              //alert(data);

              if (data == "Yes")
              {
                  info_alert("Data not Submitted");
              }
              else
              {
                  var pp_no_id = document.getElementById("pp_no_id").value;
                  var pp_version_standard = document.getElementById("pp_version_standard").value;

                  $.ajax(
                  {
                      url: "view_standard_select.php",
                      method: "POST",
                      data: {pp_no_id: pp_no_id, pp_version: pp_version_id, pp_version_standard: pp_version_standard},
                      success:function(data)
                      {
                          $('#others_retrieve_general_data').html(data);
                      }
                  });
              }
            } 
        });
      }
  }

function edit_for_sanforizing_standard()
{
    var pp_no = document.getElementById("pp_no").value;
    var color = document.getElementById("color").value;
    var version = document.getElementById("version").value;
    var gray_width = document.getElementById("gray_width").value;
    var pp_id_number = document.getElementById("pp_id_number").value;
    var pp_details_id = document.getElementById("pp_details_id").value;

    $.ajax(
    {
        type: "POST",
        url: "edit_standard_for_sanforizing.php",
        method: "POST",
        data: 
        {
          pp_no: pp_no, 
          color: color,
          version: version,
          gray_width: gray_width,
          pp_id_number: pp_id_number,
          pp_details_id: pp_details_id
        },
        success:function(data)
        {
            $('#retrieve_edit_data').html(data);
        }
    });
}


function send_data_of_define_standard_of_raising_form_to_database(pp_version_id)
  {
      var formValidation = Form_Validation_For_Raising();

      if(formValidation != false)
      {
          var formdata = new FormData(document.getElementById('raising_variable_form'));

          $.ajax(
          {
              type: "POST",
              url: "add_raising_variable_saving.php",// where you wanna post
              data: formdata,
              processData: false,
              contentType: false,
              error: function(jqXHR, textStatus, errorMessage) 
              {
                  alert(errorMessage);
              },
              success: function(data) 
              {
                  //alert(data);
                  if (data == "Yes")
                  {
                      info_alert("Data not Submitted");
                  }
                  else
                  {
                      //alert(data);
                      var pp_no_id = document.getElementById("pp_no_id").value;
                      //var pp_version = document.getElementById("pp_version").value;
                      var pp_version_standard = document.getElementById("pp_version_standard").value;

                      $.ajax(
                      {
                          url: "view_standard_select.php",
                          method: "POST",
                          data: {pp_no_id: pp_no_id, pp_version: pp_version_id, pp_version_standard: pp_version_standard},
                          success:function(data)
                          {
                              //alert(data);
                              $('#retrieve_general_data').html(data);
                          }
                      });
                  }
              } 
          });
      }
  }


function update_edit_raising_standard_data(pp_version_id)
  {
      var formValidation = Form_Validation_For_Raising();

      if(formValidation != false)
      {
        var formdata = new FormData(document.getElementById('raising_variable_form'));
        $.ajax(
        {
            type: "POST",
            url: "edit_raising_standard_for_saving.php",
            data: formdata,
            processData: false,
            contentType: false,
            error: function(jqXHR, textStatus, errorMessage) 
            {
                alert(errorMessage);
            },
            success: function(data) 
            {
              //alert(data);

              if (data == "Yes")
              {
                  info_alert("Data not Submitted");
              }
              else
              {
                  var pp_no_id = document.getElementById("pp_no_id").value;
                  var pp_version_standard = document.getElementById("pp_version_standard").value;

                  $.ajax(
                  {
                      url: "view_standard_select.php",
                      method: "POST",
                      data: {pp_no_id: pp_no_id, pp_version: pp_version_id, pp_version_standard: pp_version_standard},
                      success:function(data)
                      {
                          $('#others_retrieve_general_data').html(data);
                      }
                  });
              }
            } 
        });
      }
  }

function edit_for_raising_standard()
{
    var pp_no = document.getElementById("pp_no").value;
    var color = document.getElementById("color").value;
    var version = document.getElementById("version").value;
    var gray_width = document.getElementById("gray_width").value;
    var pp_id_number = document.getElementById("pp_id_number").value;
    var pp_details_id = document.getElementById("pp_details_id").value;

    $.ajax(
    {
        type: "POST",
        url: "edit_standard_for_raising.php",
        method: "POST",
        data: 
        {
          pp_no: pp_no, 
          color: color,
          version: version,
          gray_width: gray_width,
          pp_id_number: pp_id_number,
          pp_details_id: pp_details_id
        },
        success:function(data)
        {
            $('#retrieve_edit_data').html(data);
        }
    });
}


function send_data_of_define_standard_of_ready_for_raising_form_to_database(pp_version_id)
  {
      var formValidation = Form_Validation_For_Ready_For_Raising();

      if(formValidation != false)
      {
          var formdata = new FormData(document.getElementById('ready_for_raising_variable_form'));

          $.ajax(
          {
              type: "POST",
              url: "add_ready_raising_variable_saving.php",// where you wanna post
              data: formdata,
              processData: false,
              contentType: false,
              error: function(jqXHR, textStatus, errorMessage) 
              {
                  alert(errorMessage);
              },
              success: function(data) 
              {
                  //alert(data);
                  if (data == "Yes")
                  {
                      info_alert("Data not Submitted");
                  }
                  else
                  {
                      //alert(data);
                      var pp_no_id = document.getElementById("pp_no_id").value;
                      //var pp_version = document.getElementById("pp_version").value;
                      var pp_version_standard = document.getElementById("pp_version_standard").value;

                      $.ajax(
                      {
                          url: "view_standard_select.php",
                          method: "POST",
                          data: {pp_no_id: pp_no_id, pp_version: pp_version_id, pp_version_standard: pp_version_standard},
                          success:function(data)
                          {
                              //alert(data);
                              $('#retrieve_general_data').html(data);
                          }
                      });
                  }
              } 
          });
      }
  }


function update_edit_ready_for_raising_standard_data(pp_version_id)
  {
      var formValidation = Form_Validation_For_Ready_For_Raising();

      if(formValidation != false)
      {
        var formdata = new FormData(document.getElementById('ready_for_raising_variable_form'));
        $.ajax(
        {
            type: "POST",
            url: "edit_ready_raising_standard_for_saving.php",
            data: formdata,
            processData: false,
            contentType: false,
            error: function(jqXHR, textStatus, errorMessage) 
            {
                alert(errorMessage);
            },
            success: function(data) 
            {
              //alert(data);

              if (data == "Yes")
              {
                  info_alert("Data not Submitted");
              }
              else
              {
                  var pp_no_id = document.getElementById("pp_no_id").value;
                  var pp_version_standard = document.getElementById("pp_version_standard").value;

                  $.ajax(
                  {
                      url: "view_standard_select.php",
                      method: "POST",
                      data: {pp_no_id: pp_no_id, pp_version: pp_version_id, pp_version_standard: pp_version_standard},
                      success:function(data)
                      {
                          $('#others_retrieve_general_data').html(data);
                      }
                  });
              }
            } 
        });
      }
  }

function edit_for_ready_for_raising_standard()
{
    var pp_no = document.getElementById("pp_no").value;
    var color = document.getElementById("color").value;
    var version = document.getElementById("version").value;
    var gray_width = document.getElementById("gray_width").value;
    var pp_id_number = document.getElementById("pp_id_number").value;
    var pp_details_id = document.getElementById("pp_details_id").value;

    $.ajax(
    {
        type: "POST",
        url: "edit_standard_for_ready_raising.php",
        method: "POST",
        data: 
        {
          pp_no: pp_no, 
          color: color,
          version: version,
          gray_width: gray_width,
          pp_id_number: pp_id_number,
          pp_details_id: pp_details_id
        },
        success:function(data)
        {
            $('#retrieve_edit_data').html(data);
        }
    });
}


function water_absorption_tol_condition()
  {
      var water_absorption_tol_value1 = parseFloat(document.getElementById("water_absorption_tol_value1").value);
      var water_absorption_tol_value2 = parseFloat(document.getElementById("water_absorption_tol_value2").value);
      var water_absorption_tol_cond = document.getElementById("water_absorption_tol_cond").value;

      if (water_absorption_tol_cond == 1) 
      {
          document.getElementById("water_absorption_cond1").value = 2;
          document.getElementById("water_absorption_cond2").value = 2;

          //var tolarance = ((thread_epi_tol_value2 * thread_epi_tol_value1) / 100);
          var tolarance =water_absorption_tol_value2;
          var water_absorption_tol_cal_value2 = water_absorption_tol_value1 + tolarance;
          var water_absorption_tol_cal_value1 = water_absorption_tol_value1 - tolarance;

          document.getElementById("water_absorption_value1").value = water_absorption_tol_cal_value1.toFixed(5);
          document.getElementById("water_absorption_value2").value = water_absorption_tol_cal_value2.toFixed(5);
      }

      if (water_absorption_tol_cond == 2)
      {
          document.getElementById("water_absorption_cond1").value = 2;
          document.getElementById("water_absorption_cond2").value = 2;

          //var tolarance = ((thread_epi_tol_value2 * thread_epi_tol_value1) / 100);
          var tolarance = water_absorption_tol_value2;
          var water_absorption_tol_cal_value2 = water_absorption_tol_value1 + tolarance;

          document.getElementById("water_absorption_value1").value = water_absorption_tol_value1;
          document.getElementById("water_absorption_value2").value = water_absorption_tol_cal_value2.toFixed(5);
      }

      if (water_absorption_tol_cond == 3)
      {
          document.getElementById("water_absorption_cond1").value = 2;
          document.getElementById("water_absorption_cond2").value = 2;

          //var tolarance = ((thread_epi_tol_value2 * thread_epi_tol_value1) / 100);
          var tolarance = water_absorption_tol_value2;
          var water_absorption_tol_cal_value2 = water_absorption_tol_value1 - tolarance;

          document.getElementById("water_absorption_value2").value = water_absorption_tol_value1;
          document.getElementById("water_absorption_value1").value = water_absorption_tol_cal_value2.toFixed(5);
      }

      if(isNaN(document.getElementById("water_absorption_tol_value1").value))
      {
          number_alert("water_absorption_tol_value1");
          return false;
      }

      if(isNaN(document.getElementById("water_absorption_tol_value2").value))
      {
          number_alert("water_absorption_tol_value2");
          return false;
      }
  }



  // ready for print

  function send_data_of_define_standard_of_ready_for_print_form_to_database(pp_version_id)
  {
      var formValidation = Form_Validation_For_Ready_For_Print();

      if(formValidation != false)
      {
          var formdata = new FormData(document.getElementById('ready_for_print_standard_form'));
          $.ajax(
          {
              type: "POST",
              url: "add_ready_for_print_standard_saving.php",// where you wanna post
              data: formdata,
              processData: false,
              contentType: false,
              error: function(jqXHR, textStatus, errorMessage) 
              {
                  alert(errorMessage);
              },
              success: function(data) 
              {

                  if (data == "Yes")
                  {
                      info_alert("Data not Submitted");
                  }
                  else
                  {


                      var pp_no_id = document.getElementById("pp_no_id").value;
                      var pp_version_standard = document.getElementById("pp_version_standard").value;

                      $.ajax(
                      {
                          url: "view_standard_select.php",
                          method: "POST",
                          data: {pp_no_id: pp_no_id, pp_version: pp_version_id, pp_version_standard: pp_version_standard},
                          success:function(data)
                          {
                              //alert(data);
                              $('#retrieve_general_data').html(data);
                          }
                      });
                  }
              } 
          });
      }
  }


  function update_edit_ready_for_print_standard_data(pp_version_id)
  {
      var formValidation = Form_Validation_For_Ready_For_Print();

      if(formValidation != false)
      {
        var formdata = new FormData(document.getElementById('ready_for_print_standard_form'));
        $.ajax(
        {
            type: "POST",
            url: "edit_ready_for_print_standard_for_saving.php",
            data: formdata,
            processData: false,
            contentType: false,
            error: function(jqXHR, textStatus, errorMessage) 
            {
                alert(errorMessage);
            },
            success: function(data) 
            {
              
              if (data == "Yes")
              {
                  info_alert("Data not Submitted");
              }
              else
              {
                  var pp_no_id = document.getElementById("pp_no_id").value;
                  var pp_version_standard = document.getElementById("pp_version_standard").value;

                  $.ajax(
                  {
                      url: "view_standard_select.php",
                      method: "POST",
                      data: {pp_no_id: pp_no_id, pp_version: pp_version_id, pp_version_standard: pp_version_standard},
                      success:function(data)
                      {
                          $('#others_retrieve_general_data').html(data);
                      }
                  });
              }
            } 
        });
      }
  }


  function edit_for_ready_for_print_standard()
  {
      var pp_no = document.getElementById("pp_no").value;
      var color = document.getElementById("color").value;
      var version = document.getElementById("version").value;
      var gray_width = document.getElementById("gray_width").value;
      var pp_id_number = document.getElementById("pp_id_number").value;
      var pp_details_id = document.getElementById("pp_details_id").value;

      $.ajax(
      {
          type: "POST",
          url: "edit_standard_for_ready_for_print.php",
          method: "POST",
          data: 
          {
            pp_no: pp_no, 
            color: color,
            version: version,
            gray_width: gray_width,
            pp_id_number: pp_id_number,
            pp_details_id: pp_details_id
          },
          success:function(data)
          {
              $('#retrieve_edit_data').html(data);
          }
      });
  }


  // ready for dying 

  function send_data_of_define_standard_of_ready_for_dying_form_to_database(pp_version_id)
  {
      var formValidation = Form_Validation_For_Ready_For_Dying();

      if(formValidation != false)
      {
          var formdata = new FormData(document.getElementById('ready_for_dying_standard_form'));
          $.ajax(
          {
              type: "POST",
              url: "add_ready_for_dying_standard_saving.php",// where you wanna post
              data: formdata,
              processData: false,
              contentType: false,
              error: function(jqXHR, textStatus, errorMessage) 
              {
                  alert(errorMessage);
              },
              success: function(data) 
              {

                  if (data == "Yes")
                  {
                      info_alert("Data not Submitted");
                  }
                  else
                  {
                      var pp_no_id = document.getElementById("pp_no_id").value;
                      var pp_version_standard = document.getElementById("pp_version_standard").value;

                      $.ajax(
                      {
                          url: "view_standard_select.php",
                          method: "POST",
                          data: {pp_no_id: pp_no_id, pp_version: pp_version_id, pp_version_standard: pp_version_standard},
                          success:function(data)
                          {
                              $('#retrieve_general_data').html(data);
                          }
                      });
                  }
              } 
          });
      }
  }

  function update_edit_ready_for_dying_standard_data(pp_version_id)
  {
      var formValidation = Form_Validation_For_Ready_For_Dying();

      if(formValidation != false)
      {
        var formdata = new FormData(document.getElementById('ready_for_dying_standard_form'));
        $.ajax(
        {
            type: "POST",
            url: "edit_ready_for_dying_standard_for_saving.php",
            data: formdata,
            processData: false,
            contentType: false,
            error: function(jqXHR, textStatus, errorMessage) 
            {
                alert(errorMessage);
            },
            success: function(data) 
            {
              
              if (data == "Yes")
              {
                  info_alert("Data not Submitted");
              }
              else
              {
                  var pp_no_id = document.getElementById("pp_no_id").value;
                  var pp_version_standard = document.getElementById("pp_version_standard").value;

                  $.ajax(
                  {
                      url: "view_standard_select.php",
                      method: "POST",
                      data: {pp_no_id: pp_no_id, pp_version: pp_version_id, pp_version_standard: pp_version_standard},
                      success:function(data)
                      {
                          $('#others_retrieve_general_data').html(data);
                      }
                  });
              }
            } 
        });
      }
  }

  function edit_for_ready_for_dying_standard()
  {
      var pp_no = document.getElementById("pp_no").value;
      var color = document.getElementById("color").value;
      var version = document.getElementById("version").value;
      var gray_width = document.getElementById("gray_width").value;
      var pp_id_number = document.getElementById("pp_id_number").value;
      var pp_details_id = document.getElementById("pp_details_id").value;

      $.ajax(
      {
          type: "POST",
          url: "edit_standard_for_ready_for_dying.php",
          method: "POST",
          data: 
          {
            pp_no: pp_no, 
            color: color,
            version: version,
            gray_width: gray_width,
            pp_id_number: pp_id_number,
            pp_details_id: pp_details_id
          },
          success:function(data)
          {
              $('#retrieve_edit_data').html(data);
          }
      });
  }

</script>


</body>
</html>