<?php
 require_once('config/db_connection.php');?>
 
 <!DOCTYPE html>
<html class="no-js" lang="en-US" data-bt-theme="Tabula 1.0.3">
   <!-- Mirrored from tabula.bold-themes.com/sunny/about-us/contact/ by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 31 Dec 2020 07:00:01 GMT -->
   <!-- Added by HTTrack -->
   <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
   <!-- /Added by HTTrack -->
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
      <meta name="mobile-web-app-capable" content="yes">
      <meta name="apple-mobile-web-app-capable" content="yes">
      <title>Mowgli | Registration</title>
	
	<!-- Sweet Alert CSS -->
    <link rel="stylesheet" type="text/css" href="registration/sweetalert2.js">
	
	
      <!-- Icons font CSS-->
    <link href="registration/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="registration/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="registration/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="registration/vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">
    <link href="registration/sweetalert.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="registration/css/main.css" rel="stylesheet" media="all">
      
	  <?php require_once('registration/includecss.php');?>
   
   
   <body class="page-template-default page page-id-13 page-child parent-pageid-11 theme-tabula bt_bb_plugin_active bt_bb_fe_preview_toggle woocommerce-no-js btHeadingWeight_default btHeadingDash_dot btMenuWeight_default btCapitalizeMainMenuItems btHasCrest btNoLogo btHasAltLogo btMenuLeftEnabled btMenuBelowLogo btStickyEnabled btHideHeadline btLightSkin btBelowMenu noBodyPreloader btHardRoundedButtons btTransparentLightHeader btNoSidebar" >
      <!-- Load Facebook SDK for JavaScript -->
      <div id="fb-root"></div>
      <script>
        window.fbAsyncInit = function() {
          FB.init({
            xfbml            : true,
            version          : 'v9.0'
          });
        };

        (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));</script>

      <!-- Your Chat Plugin code -->
      <div class="fb-customerchat"
        attribution=setup_tool
        page_id="107096287918911">
      </div>
      <div class="btPageWrap" id="top">
         <div class="btVerticalHeaderTop">
            <div class="btVerticalMenuTrigger">
               &nbsp;
               <div class="bt_bb_icon"><a href="#" target="_self"   data-ico-fa="&#xf0c9;" class="bt_bb_icon_holder"></a></div>
            </div>
            <div class="btLogoArea">
               <!-- Crest & Logo -->
               <div class="logo">
                  <div class='btCrest'><a href='index'><img src='wp-content/uploads/sites/2/2019/03/mowgli.png' class='btCrestImg' alt='Sunny'/></a></div>
               </div>
               <!-- Only Logo -->
            </div>
            <!-- /btLogoArea -->
         </div>
         <!-- /btVerticalHeaderTop -->
         <header class="mainHeader btClear gutter ">
            <div class="mainHeaderInner">
               <div class="btLogoArea menuHolder btClear">
                  <div class="port">
                     <div class="btHorizontalMenuTrigger">
                        &nbsp;
                        <div class="bt_bb_icon"><a href="#" target="_self"   data-ico-fa="&#xf0c9;" class="bt_bb_icon_holder"></a></div>
                     </div>
                     <!-- Crest & Logo -->
                     <div class="logo">
                        <div class='btCrest'><a href='index'><img src='wp-content/uploads/sites/2/2019/03/mowgli.png' class='btCrestImg' alt='Sunny'/></a></div>
                     </div>
                     <!-- Only Logo -->
                     <div class="topBarInLogoArea">
                        <div class="topBarInLogoAreaCell">
                           <div class="btIconWidget  btWidgetWithText">
                              <div class="btIconWidgetIcon"><span  data-ico-dripicons="&#xe973;" class="bt_bb_icon_holder"></span></div>
                              <div class="btIconWidgetContent"><span class="btIconWidgetTitle">EMAIL</span><span class="btIconWidgetText">info@mowgli-it.com</span></div>
                           </div>
                           <div class="btIconWidget  btWidgetWithText">
                              <div class="btIconWidgetIcon"><span  data-ico-dripicons="&#xe98e;" class="bt_bb_icon_holder"></span></div>
                              <div class="btIconWidgetContent"><span class="btIconWidgetTitle">CALL</span><span class="btIconWidgetText">01886234760</span></div>
                           </div>
                           <div class="btIconWidget  btWidgetWithText">
                              <div class="btIconWidgetIcon"><span  data-ico-dripicons="&#xe970;" class="bt_bb_icon_holder"></span></div>
                              <div class="btIconWidgetContent"><span class="btIconWidgetTitle">ADDRESS</span><span class="btIconWidgetText">24/D, Topkhana Road, Segun Bagicha, Dhaka-1000</span></div>
                           </div>
                        </div>
                        <!-- /topBarInLogoAreaCell -->
                     </div>
                     <!-- /topBarInLogoArea -->
                  </div>
                  <!-- /port -->
               </div>
               <!-- /menuHolder -->
               <div class="btBelowLogoArea btClear">
                  <div class="port">
                     <div class="menuPort">
                        <div class="topBarInMenu">
                           <div class="topBarInMenuCell">
                              <a href="" target="_blank" class="btIconWidget ">
                                 <div class="btIconWidgetIcon"><span  data-ico-fontawesome="&#xf099;" class="bt_bb_icon_holder"></span></div>
                              </a>
                              <a href="https://www.facebook.com/mowgliitschool" target="_blank" class="btIconWidget ">
                                 <div class="btIconWidgetIcon"><span  data-ico-fontawesome="&#xf09a;" class="bt_bb_icon_holder"></span></div>
                              </a>
                              <a href="" target="_blank" class="btIconWidget ">
                                 <div class="btIconWidgetIcon"><span  data-ico-fontawesome="&#xf16a;" class="bt_bb_icon_holder"></span></div>
                              </a>
                              <a href="#" target="_self" class="btIconWidget ">
                                 <div class="btIconWidgetIcon"><span  data-ico-fontawesome="&#xf16d;" class="bt_bb_icon_holder"></span></div>
                              </a>
                           </div>
                           <!-- /topBarInMenu -->
                        </div>
                        <!-- /topBarInMenuCell -->
                       <nav>
            <ul id="menu-primary-menu" class="menu">
				<li id="menu-item-3134" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home   menu-item-has-children menu-item-3134">
                  <a href="index" aria-current="page">Home</a>
				</li>
			   
               <li id="menu-item-43" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-43">
                  <a href="aboutus/team/team">About-Us</a>
               </li>
			   
			   <li id="menu-item-43" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-43">
                  <a href="aboutus/aboutus/about_us">Our Work</a>
               </li>
			  
               <li id="menu-item-40" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-40">
                  <a href="courses/view/courses">Courses</a>
                  <ul class="sub-menu">
            
                     <li id="menu-item-2733" class="menu-item menu-item-type-post_type menu-item-object-post menu-item-has-children menu-item-2733">
                        <a href="courses/view/graphics_design">Graphics Design</a>
                     </li>
                     <li id="menu-item-59" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-59">
                        <a href="courses/view/web_design_development">Web Design & Development</a>
                     </li>
					 
					 <li id="menu-item-59" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-59">
                        <a href="courses/view/digital_marketing">Digital Marketing</a>
                     </li>
                  </ul>
               </li>
			   
			   <li id="menu-item-43" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-43">
                  <a href="aboutus/contact/contact">Contact Us</a>
               </li>
			   
               <!--li id="menu-item-41" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-41">
                  <a href="shop/index.html">Account</a>
                  <ul class="sub-menu">
                     <li id="menu-item-152" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-152"><a href="registration.php">Sign Up</a></li>
                     <li id="menu-item-47" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-47"><a href="signin.php">Login</a></li>
                  </ul>
               </li!-->
			   <div style="background-color:#0673BA; border-radius: 12px;" class="bt_bb_button bt_bb_icon_position_left  current_page_item current-menu-ancestor current_page_ancestor bt_bb_style_filled bt_bb_size_medium bt_bb_width_inline bt_bb_shape_inherit bt_bb_align_inherit">
			       <a href="registration" target="_self" class="bt_bb_link" title="APPLY TODAY"><span style="color:white;" class="bt_bb_button_text">REGISTER NOW</span></a></div>
			   
            </ul>
         </nav>
                     </div>
                     <!-- .menuPort -->
                  </div>
                  <!-- /port -->
               </div>
               <!-- /menuHolder / btBelowLogoArea -->
            </div>
            <!-- / inner header for scrolling -->
         </header>
         <!-- /.mainHeader -->
         <div class="btContentWrap btClear">
            <div class="btContentHolder">
               <div class="btContent">
                  <div class="bt_bb_wrapper">
                     <section id="bt_bb_section5fe4d4c415d12"  data-background_image_src="'as.jpeg'" class="bt_bb_section bt_bb_top_spacing_large bt_bb_bottom_spacing_large bt_bb_layout_boxed_1200 bt_bb_vertical_align_top btLazyLoadBackground bt_bb_background_image bt_bb_background_overlay_dark_solid" style="background-image:url(http_/tabula.bold-themes.com/sunny/wp-content/plugins/bold-page-builder/img/blank.html);">
                        <div class="bt_bb_port">
                           <div class="bt_bb_cell">
                              <div class="bt_bb_cell_inner">
                                 <div class="bt_bb_row_wrapper">
                                    <div  class="bt_bb_row" >
                                       <div  class="bt_bb_column col-md-6 col-sm-12 bt_bb_align_left bt_bb_vertical_align_top bt_bb_animation_fade_in animate bt_bb_padding_normal bt_bb_shape_inherit"  data-width="6">
                                          <div class="bt_bb_column_content">
                                             <div class="bt_bb_column_content_inner">
                                                <div class="bt_bb_separator bt_bb_top_spacing_large bt_bb_border_style_none bt_bb_hidden_xs bt_bb_hidden_ms"></div>
                                                <header class="bt_bb_headline bt_bb_color_scheme_1 bt_bb_dash_none bt_bb_size_extralarge bt_bb_subheadline bt_bb_align_inherit">
                                                   <h1><span class="bt_bb_headline_content"><span>Pre-registration Open Now!!!</span></span></h1>
                                                   <div class="bt_bb_headline_subheadline">Please input all the information accurately, we will contact you soon after the registration has been successfully completed!</div>
                                                </header>
                                             </div>
                                          </div>
                                       </div>
                                       <div  class="bt_bb_column col-md-6 col-sm-12 bt_bb_align_left bt_bb_vertical_align_top bt_bb_padding_normal"  data-width="6">
                                          <div class="bt_bb_column_content">
                                             <div class="bt_bb_column_content_inner"></div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </section>
							<div class="page-wrapper p-t-100 p-b-100 font-robo">
								<div class="wrapper wrapper--w680">
									<div class="card card-1">
										<!--div class="card-heading"></div!-->
										<div class="card-body">
											<h2 class="title">Registration Form.</h2>
											
											<form method="POST" id="registration_form" action="" enctype="multipart/form-data">
												<div class="row row-space">
													<div class="col-2">
														<div class="input-group">
															<input class="input--style-1" type="text" placeholder="Full Name" name="full_name" required/>
														</div>
													</div>
													
													<div class="col-2">
														<div class="input-group">
															<input class="input--style-1" type="Email" placeholder="Email" name="student_email" required/>
														</div>
													</div>
													
												</div>
												
												<div class="row row-space">
													<div class="col-2">
														<div class="input-group">
															<input class="input--style-1" type="text" placeholder="Phone Number" name="contact_number" required/>
														</div>
													</div>
													
													<div class="col-2">
														<div class="input-group">Date of Birth
															<input class="input--style-1" type="date" placeholder="Birth Date" name="date_of_birth" required/>
															
														</div>
													</div>
												</div>
												
												<div class="row row-space">
													<div class="col-2">
														<div class="input-group">
															<input class="input--style-1" type="text" placeholder="Father Name" name="father_name" required/>
														</div>
													</div>
													<div class="col-2">
														<div class="input-group">
															<input class="input--style-1" type="text" placeholder="Mother Name" name="mother_name" required/>
														</div>
													</div>
												</div>
												
												<div class="row row-space">
													<div class="col-2">
														<div class="input-group">
															<input class="input--style-1" type="text" placeholder="Present Address" name="present_address" required/>
														</div>
													</div>
													<div class="col-2">
														<div class="input-group">
															<input class="input--style-1" type="text" placeholder="Permanent Address" name="permanent_address" required/>
														</div>
													</div>
												</div>
												
												<div class="row row-space">
													<div class="col-2">
														<div class="input-group">
															<input class="input--style-1" type="number" placeholder="Nid/Birth Certificate Number" name="nid_birth" required/>
														</div>
													</div>
													<div class="col-2">
														<div class="input-group">
															<div class="rs-select2 js-select-simple select--no-search">
																<select name="subject_area">
																	<option disabled="disabled">Select Sujects</option>
																	<option value="Graphics Design Crash">Graphics Design Crash</option>
																	<option value="Graphics Design Basic">Graphics Design Basic</option>
																	<option value="Graphics Design Advance">Graphics Design Advance</option>
																	<option value="Web Development Basic">Web Development Basic</option>
																	<option value="Web Development Advance">Web Development Advance</option>
																	<option value="Digital Marketing SEO">Digital Marketing SEO</option>
																	<option value="Digital Marketing SMM">Digital Marketing SMM</option>
																	<option value="Digital Marketing Advance">Digital Marketing Advance</option>
																</select>
																<div class="select-dropdown"></div>
															</div>
														</div>
													</div>
												</div>
												
												<div class="row row-space">
													<div class="col-2">
														<div class="input-group">
															<div class="rs-select2 js-select-simple select--no-search">
																<select name="gender">
																	<option disabled="disabled">Gender</option>
																	<option value="Male">Male</option>
																	<option value="Female">Female</option>
																	<option value="Other">Other</option>
																</select>
																<div class="select-dropdown"></div>
															</div>
														</div>
													</div>
													<div class="col-2">
														<i>Profile Picture*</i>
														<div class="input-group">
															<input class="input--style-1" type="file" placeholder="Profile" name="user_image_p" required/>
														</div>
													</div>
												</div>
												
												<div class="row row-space">
													<div class="col-2">
													<i>Signature*</i>
														<div class="input-group">
															<input class="input--style-1" type="file" placeholder="Profile" name="user_signature" required/>
															<i></i>
														</div>
													</div>
													
													<div class="col-2">
													<i>NID/Birth File attach*</i>
														<div class="input-group">
															<input class="input--style-1" type="file" placeholder="Profile" name="nid_birth_image" required/>
														</div>
													</div>
												</div>
												
												<div class="p-t-20">
													<button class="btn btn--radius btn--green" id="submit" name="submit" type="submit">Submit</button>
												</div>
											</form>
											
										</div>
									</div>
								</div>
							</div>
                     
								
							<script>
								window.setTimeout(function() {
								$(".alert").fadeTo(500, 220).slideUp(500, function(){
									$(this).remove(); 
								});
								}, 3000);

							</script>
							<style>
								.alert {
									position:fixed; 
									top: 60px; 
									left: 700px; 
									width: 70%;
									z-index:9999; 
								}
							</style>
                     
                  </div>
               </div>
               <!-- /boldthemes_content -->
            </div>
            <!-- /contentHolder -->
         </div>
		 <?php  require_once('registration/footer/footer.php'); ?>
		 
		 <?php 
	date_default_timezone_set("Asia/Dhaka");
		$date    = date('Y-m-d'); 
		$time    = date('h:i:s A');
	//====================================Add
	
	if(isset($_POST['submit'])){
	$full_name = $_POST['full_name'];
  $student_email = $_POST['student_email'];
  $father_name = $_POST['father_name'];
  $mother_name = $_POST['mother_name'];
  $subject_area = $_POST['subject_area'];
  $contact_number = $_POST['contact_number'];
  $date_of_birth = $_POST['date_of_birth'];
  $nid_birth = $_POST['nid_birth'];
  $present_address = $_POST['present_address'];
  $permanent_address = $_POST['permanent_address'];
  $gender = $_POST['gender'];
  $user_active_from=date('Y-m-d H:i:s'); 

	$pp_id="";	

		
		$customer_check_query = "SELECT mowgli_code FROM students_registration ";
	$customer_check_res = mysqli_query($con, $customer_check_query) or die(mysqli_error($con));

	if (mysqli_num_rows($customer_check_res) < 1)
	{
		$pp_id = 100000;
	}

	else
	{
		$sql = 'SELECT mowgli_code FROM students_registration ORDER BY mowgli_code DESC LIMIT 1';
		$sql_res = mysqli_query($con, $sql) or die(mysqli_error($con));
		$sql_row = mysqli_fetch_assoc($sql_res);
		$pp_id = $sql_row['mowgli_code'] + 1;
	}		
			
  
				if ($_FILES["user_image_p"]["error"] > 0) {
                    $user_image_p = "No .jpg";
                    
                } else {
                    $user_image_p = time().$_FILES["user_image_p"]["name"];
                    move_uploaded_file($_FILES["user_image_p"]["tmp_name"],"registration/upload/" . $user_image_p);
                }
                if ($_FILES["user_signature"]["error"] > 0) {
                    $user_signature = "No .jpg";
                    
                } else {
                    $user_signature = time().$_FILES["user_signature"]["name"];
                    move_uploaded_file($_FILES["user_signature"]["tmp_name"],"registration/upload/" . $user_signature);
                }
                if ($_FILES["nid_birth_image"]["error"] > 0) {
                    $nid_birth_image = "No .jpg";
                    
                } else {
                    $nid_birth_image = time().$_FILES["nid_birth_image"]["name"];
                    move_uploaded_file($_FILES["nid_birth_image"]["tmp_name"],"registration/upload/" . $nid_birth_image);
                }
				
				  $login_query = "INSERT INTO students_registration
				  (
				  full_name,
				  student_email,
				  father_name,
				  mother_name,
				  subject_area,
				  contact_number,
				  date_of_birth,
				  nid_birth,
				  present_address,
				  permanent_address,gender,user_image_p,
				  user_signature,
				  nid_birth_image,
				  created_on,
				  mowgli_code) 
				  VALUES 
				  ('$full_name',
				  '$student_email',
				  '$father_name',
				  '$mother_name',
				  '$subject_area',
				  '$contact_number',
				  '$date_of_birth',
				  '$nid_birth',
				  '$present_address',
				  '$permanent_address',
				  '$gender',
				  '$user_image_p',
				  '$user_signature',
				  '$nid_birth_image',
				  '$user_active_from',
				  '$pp_id')";
				  $login = mysqli_query($con,$login_query);
        
		
			if($login_query == true){
			echo '<script>
			setTimeout(function() {
				swal({
				title: "Registration Completed Successfully!!! ",
				text: "Your Registration ID is ' . $pp_id . '. Thank you.!!! ",
				type: "success"
				}, function() {
				window.location = "index";
				});
			}, 1000);
			</script>';
		
  }

}
		
?>
		 
      </div>
      <!-- /pageWrap -->
      <script type="text/javascript">
         (function () {
         	var c = document.body.className;
         	c = c.replace(/woocommerce-no-js/, 'woocommerce-js');
         	document.body.className = c;
         })()
      </script>
      <script type='text/javascript' id='contact-form-7-js-extra'>
         /* <![CDATA[ */
         var wpcf7 = {"apiSettings":{"root":"http:\/\/tabula.bold-themes.com\/sunny\/wp-json\/contact-form-7\/v1","namespace":"contact-form-7\/v1"},"cached":"1"};
         /* ]]> */
      </script>
      <script src="wp-content/cache/minify/2/6360f.js"></script>
      <script type='text/javascript' id='wc-add-to-cart-js-extra'>
         /* <![CDATA[ */
         var wc_add_to_cart_params = {"ajax_url":"\/sunny\/wp-admin\/admin-ajax.php","wc_ajax_url":"\/sunny\/?wc-ajax=%%endpoint%%","i18n_view_cart":"View cart","cart_url":"http:\/\/tabula.bold-themes.com\/sunny\/shop\/cart\/","is_cart":"","cart_redirect_after_add":"no"};
         /* ]]> */
      </script>
      <script src="wp-content/cache/minify/2/dc06c.js"></script>
      <script type='text/javascript' id='woocommerce-js-extra'>
         /* <![CDATA[ */
         var woocommerce_params = {"ajax_url":"\/sunny\/wp-admin\/admin-ajax.php","wc_ajax_url":"\/sunny\/?wc-ajax=%%endpoint%%"};
         /* ]]> */
      </script>
      <script src="wp-content/cache/minify/2/63a69.js"></script>
      <script type='text/javascript' id='wc-cart-fragments-js-extra'>
         /* <![CDATA[ */
         var wc_cart_fragments_params = {"ajax_url":"\/sunny\/wp-admin\/admin-ajax.php","wc_ajax_url":"\/sunny\/?wc-ajax=%%endpoint%%","cart_hash_key":"wc_cart_hash_96354a5a70d30497a46aaa2f950b7e8a","fragment_name":"wc_fragments_96354a5a70d30497a46aaa2f950b7e8a","request_timeout":"5000"};
         /* ]]> */
      </script>
      <script src="wp-content/cache/minify/2/6e105.js"></script>
      <script type='text/javascript' id='tabula-header-js-before'>
         window.BoldThemesURI = "http://tabula.bold-themes.com/wp-content/themes/tabula/"; window.BoldThemesAJAXURL = "wp-admin/admin-ajax.html";window.boldthemes_text = [];window.boldthemes_text.previous = 'previous';window.boldthemes_text.next = 'next';
      </script>
      <script src="wp-content/cache/minify/2/35f12.js"></script>
      <script type='text/javascript' id='boldthemes-framework-misc-js-after'>
         var boldthemes_dropdown = document.querySelector( ".widget_categories #cat" );
         function boldthemes_onCatChange() {
         	if ( boldthemes_dropdown.options[boldthemes_dropdown.selectedIndex].value > 0 ) {
         		location.href = "http://tabula.bold-themes.com/sunny/?cat="+boldthemes_dropdown.options[boldthemes_dropdown.selectedIndex].value;
         	}
         }
         if ( boldthemes_dropdown !== null ) {
         	boldthemes_dropdown.onchange = boldthemes_onCatChange;
         }
         
      </script>
      <script src="wp-content/cache/minify/2/e9071.js"></script>
      <script type='text/javascript' src='https://maps.googleapis.com/maps/api/js?key=AIzaSyBEGFl8-fAbZvbqsrCN-ro82ZzycIfyY8s&amp;ver=5.6' id='gmaps_api-js'></script>
      <script type='text/javascript' id='gmaps_api-js-after'>
         var bt_bb_google_map_map_canvas5fe4d4c416e1d_init_finished = false;  document.addEventListener("readystatechange", function() {  if ( !bt_bb_google_map_map_canvas5fe4d4c416e1d_init_finished && ( document.readyState === "interactive" || document.readyState === "complete" ) ) {  if ( typeof( bt_bb_gmap_init ) !== typeof(Function) ) { return false; } bt_bb_gmap_init( "map_canvas5fe4d4c416e1d", 16, "WwogICAgewogICAgICAgICJmZWF0dXJlVHlwZSI6ICJsYW5kc2NhcGUubWFuX21hZGUiLAogICAgICAgICJlbGVtZW50VHlwZSI6ICJnZW9tZXRyeSIsCiAgICAgICAgInN0eWxlcnMiOiBbCiAgICAgICAgICAgIHsKICAgICAgICAgICAgICAgICJodWUiOiAiI2ZmMDAwMCIKICAgICAgICAgICAgfQogICAgICAgIF0KICAgIH0sCiAgICB7CiAgICAgICAgImZlYXR1cmVUeXBlIjogImxhbmRzY2FwZS5tYW5fbWFkZSIsCiAgICAgICAgImVsZW1lbnRUeXBlIjogImdlb21ldHJ5LmZpbGwiLAogICAgICAgICJzdHlsZXJzIjogWwogICAgICAgICAgICB7CiAgICAgICAgICAgICAgICAiaHVlIjogIiNmZjMyMDAiCiAgICAgICAgICAgIH0sCiAgICAgICAgICAgIHsKICAgICAgICAgICAgICAgICJ2aXNpYmlsaXR5IjogIm9uIgogICAgICAgICAgICB9CiAgICAgICAgXQogICAgfQpd" ); bt_bb_google_map_map_canvas5fe4d4c416e1d_init_finished = true; };}, false);
      </script>
	  
	  <!-- Jquery JS-->
    <script src="registration/vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="registration/vendor/select2/select2.min.js"></script>
    <script src="registration/vendor/datepicker/moment.min.js"></script>
    <script src="registration/vendor/datepicker/daterangepicker.js"></script>
	<!-- sweetalert-->
	<script src="registration/sweetalert2.min.js"></script>
    <!-- Main JS-->
    <script src="registration/js/global.js"></script>
        
   </body>
  
</html>
