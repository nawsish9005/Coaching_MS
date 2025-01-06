<!DOCTYPE html>
<html lang="en">
<?php
session_start();
require_once("../includes/db_session_chk.php");
?>

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
                        <li>Test Result Form (TRF) Information</li>
                    </ol>
                  </div>
                </div>

                <!-- main content again -->
                <div class="clearfix"></div>
                <div class="row">
                   <div class="col-md-12 col-sm-12 col-xs-12">
                      <div class="x_panel">
                        <div class="x_title">
                          <h2>Test Result Form (TRF) Information</h2>
                          <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                          </ul>
                          <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
						<?php
							$name = $_GET['route'];
							$route_id ="";
					
							foreach ($name as $route)
							{ 
								$route_id = $route_id.$route;
							}
									echo $route_id;

							date_default_timezone_set("Asia/Dhaka");
                            $my_time = date("h:i:sa");
							
						?>
						 <form id='fiber_info' name='fiber_info'  action="" method="post" enctype="multipart/form-data" class="form-horizontal form-label-left" style="margin-bottom: 20px;">
                            <div class='x_content'>
							 <div class='col-md-6 col-sm-6 col-xs-12'>
							 <input type='hidden' id='route_id_all' name='route_id_all' value='<?php  echo rtrim($route_id, ',') ?>' placeholder='' class='form-control col-md-7 col-xs-12' tabindex="1" >
							 <div class='form-group'>
							<label class='control-label col-md-4 col-sm-4 col-xs-12' for='date_info'>Date<span class='required'>*</span>
							</label>
							<div class='col-md-8 col-sm-8 col-xs-12'>
							  <input type='text' id='date_info' name='date_info' value='<?php echo date('m-d-Y'); ?>' placeholder='' class='form-control col-md-7 col-xs-12' tabindex="1" >
							</div>
							  </div>
							  
							  <div class='form-group'>
							<label class='control-label col-md-4 col-sm-4 col-xs-12' for='time_info'>Time<span class='required'>*</span>
							</label>
							<div class='col-md-8 col-sm-8 col-xs-12'>
							  <input type='text' id='time_info' name='time_info' value='<?php echo $my_time; ?>' placeholder='' class='form-control col-md-7 col-xs-12' tabindex="1" >
							</div>
							  </div>
							  <div class='form-group'>
							<label class='control-label col-md-4 col-sm-4 col-xs-12' for='pp'>PP<span class='required'>*</span>
							</label>
							<div class='col-md-8 col-sm-8 col-xs-12'>
							 <select id="pp" name="pp" class="form-control select2" onchange="get_pp_info()">
                                  <option selected="selected" value="">Select PP No</option>
                                  <?php
                                  $sql = 'SELECT pp_id,pp_no FROM pp';
								  $customers_res = mysqli_query($con, $sql) or die(mysqli_error($con));
                                  while ($customers_row = mysqli_fetch_assoc($customers_res)) 
                                  {
                                      echo "<option value='".$customers_row['pp_id']."'>";
                                      echo $customers_row['pp_no'];
                                      echo "</option>";
                                  }
                                  ?>
                                </select>
							</div>
							  </div>
							  <div class='form-group'>
							<label class='control-label col-md-4 col-sm-4 col-xs-12' for='week_info'>Week<span class='required'>*</span>
							</label>
							<div class='col-md-8 col-sm-8 col-xs-12'>
							  <input type='text' id='week_info' name='week_info' value='' placeholder='' class='form-control col-md-7 col-xs-12' tabindex="1" >
							</div>
							  </div>
							  <div class='form-group'>
							<label class='control-label col-md-4 col-sm-4 col-xs-12' for='design'>design<span class='required'>*</span>
							</label>
							<div class='col-md-8 col-sm-8 col-xs-12'>
							  <input type='text' id='design' name='design' value='' placeholder='' class='form-control col-md-7 col-xs-12' tabindex="1" >
							</div>
							  </div>
							  
							  <div class='form-group'>
							<label class='control-label col-md-4 col-sm-4 col-xs-12' for='customer'>Customer<span class='required'>*</span>
							</label>
							<div class='col-md-8 col-sm-8 col-xs-12'>
							  <input type='text' id='customer' name='customer' value='' placeholder='' class='form-control col-md-7 col-xs-12' tabindex="1" >
							</div>
							  </div>
							  
							  <div class='form-group'>
							<label class='control-label col-md-4 col-sm-4 col-xs-12' for='fiber_coposition'>Fiber Composition<span class='required'>*</span>
							</label>
							<div class='col-md-8 col-sm-8 col-xs-12'>
							  <input type='text' id='fiber_coposition' name='fiber_coposition' value='' placeholder='' class='form-control col-md-7 col-xs-12' tabindex="1" >
							</div>
							  </div>
							  
							  <div class='form-group'>
							<label class='control-label col-md-4 col-sm-4 col-xs-12' for='version'>Version<span class='required'>*</span>
							</label>
							<div class='col-md-8 col-sm-8 col-xs-12'>
							<select id="version" name="version" class="form-control col-md-7 col-xs-12 select2" onchange="get_version()">
								<option selected="selected" value="">Select version</option>
								</select>
							</div>
							  </div>
							  
							<div class='form-group'>
								<label class='control-label col-md-4 col-sm-4 col-xs-12' for='width'>Width<span class='required'>*</span>
								</label>
								<div class='col-md-8 col-sm-8 col-xs-12'>
								  <input type='text' id='width' name='width' value='' placeholder='' class='form-control col-md-7 col-xs-12' tabindex="1" >
								</div>
							</div>
							  
							<div class='form-group'>
								<label class='control-label col-md-4 col-sm-4 col-xs-12' for='before_trolley_batcher'>Before Trolley/Batcher<span class='required'>*</span>
								</label>
								<div class='col-md-8 col-sm-8 col-xs-12'>
								  <input type='text' id='before_trolley_batcher' name='before_trolley_batcher' value='' placeholder='' class='form-control col-md-7 col-xs-12'>
								</div>
							</div>
							  
							  
							<div class='form-group'>
							<label class='control-label col-md-4 col-sm-4 col-xs-12' for='after_trolley_bather'>After Trolley/Bather<span class='required'>*</span>
							</label>
							<div class='col-md-8 col-sm-8 col-xs-12'>
							  <input type='text' id='after_trolley_bather' name='after_trolley_bather' value='' placeholder='' class='form-control col-md-7 col-xs-12' tabindex="1" >
							</div>
							  </div>
							  
							<div class='form-group'>
							<label class='control-label col-md-4 col-sm-4 col-xs-12' for='quantity'>Qty<span class='required'>*</span>
							</label>
							<div class='col-md-8 col-sm-8 col-xs-12'>
							  <input type='text' id='quantity' name='quantity' value='' placeholder='' class='form-control col-md-7 col-xs-12' tabindex="1" >
							</div>
							  </div>
							  
							<div class='form-group'>
								<label class='control-label col-md-4 col-sm-4 col-xs-12' for='machine_name'>Machine Name<span class='required'>*</span>
								</label>
								<div class='col-md-8 col-sm-8 col-xs-12'>
								  <select id="machine_name" name="machine_name" class="form-control select2" >
	                                  <option selected="selected" value="">Select Machine Name</option>
	                                  <?php
	                                  $sql = 'SELECT * FROM machine where route_id in ('.rtrim($route_id, ',').')';
									  $customers_res = mysqli_query($con, $sql) or die(mysqli_error($con));
	                                  while ($customers_row = mysqli_fetch_assoc($customers_res)) 
	                                  {
	                                      echo "<option value='".$customers_row['machine_id']."'>";
	                                      echo $customers_row['machine_name'];
	                                      echo "</option>";
	                                  }
	                                  ?>
	                                </select>
								</div>
							 </div>
							  
							</div>
							</div>
						  </div>
						</div>
						</form>
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

  

	<script>
	
		/*$(function()
		{

			$("#pp").autocomplete(
			{

				minLength: 0,
				source: 'get_pp_info.php',
				delay: 0,
				select: function( event, ui )
				{
					console.log()

					$("#pp").val(ui.item.pp_no);
					//$("#design_no_id").val(ui.item.label);
					$("#week_info").val(ui.item.week);
					$("#design").val(ui.item.design);
					$("#customer").val(ui.item.customers);
					//$("#fiber_coposition").val(ui.item.fiber_coposition);
					
					

					return false;
				}

			});
		});
		*/
	</script>
	<script>
	function get_pp_info()
	{
	
		var formData = new FormData(document.getElementsByName('fiber_info')[0]);
		
		$.ajax({
		  type: "POST",
		  url: "get_pp_info.php",// where you wanna post
		  data: formData,
		  processData: false,
		  contentType: false,
		  error: function(jqXHR, textStatus, errorMessage) 
		  {
			  alert(errorMessage);
		  },
		  success: function(data) 
		  {
			  
			  var obj=$.parseJSON(data);
			  document.getElementById("week_info").value =obj.week;
			  document.getElementById("design").value=obj.design;
			  document.getElementById("customer").value=obj.customers;
			  document.getElementById("fiber_coposition").value=obj.fiber_composition;
			  document.getElementById("width").value=obj.gray_width;
			  document.getElementById("version").innerHTML = obj.version;
			  
			
		  } 
		});
		
	}
	

	

	function get_version()
	{
	
		var formData = new FormData(document.getElementsByName('fiber_info')[0]);
		var versionID = document.getElementById("version");  
   		var GetversionID  = versionID.value;



		
		$.ajax({
		  type: "POST",
		  url: "get_version_info.php",// where you wanna post
		  data: formData,
		  processData: false,
		  contentType: false,
		  error: function(jqXHR, textStatus, errorMessage) 
		  {
			  alert(errorMessage);
		  },
		  success: function(data) 
		  {
		  	alert(data);

			  var obj=$.parseJSON(data);
			
			  document.getElementById("before_trolley_batcher").value=obj.b_batcher;

			  
			
		  } 
		});
			
		
	}
	 $(function()
        {
            //Initialize Select2 Elements
            $('.select2').select2()
        })
	</script>
</body>
</html>