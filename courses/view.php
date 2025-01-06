<?php 
   require_once('../config/db_connection.php');
    ?>
<!DOCTYPE html>
<html class="no-js" lang="en-US" data-bt-theme="Tabula 1.0.3">
   <!-- Mirrored from tabula.bold-themes.com/sunny/courses/workshop/ by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 31 Dec 2020 07:00:29 GMT -->
   <!-- Added by HTTrack -->
   <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
   <!-- /Added by HTTrack -->
   <head>
      <?php
         if(isset($_GET['course:'])){
         $course_subject = $_GET['course:'];
              ?>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
      <meta name="mobile-web-app-capable" content="yes">
      <meta name="apple-mobile-web-app-capable" content="yes">
      <?php 
         $sql = (mysqli_query($con,"SELECT * FROM m_courses WHERE course_subject = '$course_subject' "));
         		while($row = mysqli_fetch_assoc($sql)){
         	
         	$course_subject = $row['course_subject'];
         				   			
         ?>
      <title><?php echo $row['course_subject']; ?></title>
      <?php } ?>
      <?php require_once('include/includecss.php');?>
   <body class="page-template-default page page-id-2305 page-child parent-pageid-2040 theme-tabula bt_bb_plugin_active bt_bb_fe_preview_toggle woocommerce-no-js btHeadingWeight_default btHeadingDash_dot btMenuWeight_default btCapitalizeMainMenuItems btHasCrest btNoLogo btHasAltLogo btMenuLeftEnabled btMenuBelowLogo btStickyEnabled btHideHeadline btLightSkin btBelowMenu noBodyPreloader btHardRoundedButtons btTransparentLightHeader btNoSidebar" >
      <div class="btPageWrap" id="top">
         <div class="btVerticalHeaderTop">
            <div class="btVerticalMenuTrigger">
               &nbsp;
               <div class="bt_bb_icon"><a href="#" target="_self"   data-ico-fa="&#xf0c9;" class="bt_bb_icon_holder"></a></div>
            </div>
            <div class="btLogoArea">
               <!-- Crest & Logo -->
               <div class="logo">
                  <div class='btCrest'><a href='../index'><img src='../wp-content/uploads/sites/2/2019/03/crest.png' class='btCrestImg' alt='Sunny'/></a></div>
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
                        <div class='btCrest'><a href='../index'><img src='../wp-content/uploads/sites/2/2019/03/crest.png' class='btCrestImg' alt='Sunny'/></a></div>
                     </div>
                     <!-- Only Logo -->
                     <div class="topBarInLogoArea">
                        <div class="topBarInLogoAreaCell">
                           <div class="btIconWidget  btWidgetWithText">
                              <div class="btIconWidgetIcon"><span  data-ico-dripicons="&#xe932;" class="bt_bb_icon_holder"></span></div>
                              <div class="btIconWidgetContent"><span class="btIconWidgetTitle">HOURS</span><span class="btIconWidgetText">Mon - Fri 8 AM - 5 PM</span></div>
                           </div>
                           <div class="btIconWidget  btWidgetWithText">
                              <div class="btIconWidgetIcon"><span  data-ico-dripicons="&#xe98e;" class="bt_bb_icon_holder"></span></div>
                              <div class="btIconWidgetContent"><span class="btIconWidgetTitle">CALL</span><span class="btIconWidgetText">+2342 5446 67</span></div>
                           </div>
                           <div class="btIconWidget  btWidgetWithText">
                              <div class="btIconWidgetIcon"><span  data-ico-dripicons="&#xe970;" class="bt_bb_icon_holder"></span></div>
                              <div class="btIconWidgetContent"><span class="btIconWidgetTitle">ADDRESS</span><span class="btIconWidgetText">Greenpoint, Brooklyn</span></div>
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
                              <a href="https://twitter.com/bold_themes" target="_blank" class="btIconWidget ">
                                 <div class="btIconWidgetIcon"><span  data-ico-fontawesome="&#xf099;" class="bt_bb_icon_holder"></span></div>
                              </a>
                              <a href="https://www.facebook.com/boldthemes/" target="_blank" class="btIconWidget ">
                                 <div class="btIconWidgetIcon"><span  data-ico-fontawesome="&#xf09a;" class="bt_bb_icon_holder"></span></div>
                              </a>
                              <a href="https://www.youtube.com/channel/UCPL5LgX32KsbQ1i9nV-xiKA" target="_blank" class="btIconWidget ">
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
                              <li id="menu-item-3134" class="btMenuWideDropdown menu-item menu-item-type-post_type menu-item-object-page menu-item-home menu-item-has-children menu-item-3134">
                                 <a href="../index.html">Home</a>
                                 <ul class="sub-menu">
                                    <li id="menu-item-2421" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-2421">
                                       <a href="#">Sunny</a>
                                       <ul class="sub-menu">
                                          <li id="menu-item-1548" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home menu-item-1548"><a href="../index.html">Draw &#038; Paint</a></li>
                                          <li id="menu-item-3114" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-3114"><a href="../home/home-illustration/index.html">Illustration</a></li>
                                          <li id="menu-item-2336" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2336"><a href="../home/home-language/index.html">Language</a></li>
                                          <li id="menu-item-2378" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2378"><a href="../home/home-acting/index.html">Acting</a></li>
                                       </ul>
                                    </li>
                                    <li id="menu-item-2423" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-2423">
                                       <a href="#">Wavy</a>
                                       <ul class="sub-menu">
                                          <li id="menu-item-2424" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2424"><a href="http://tabula.bold-themes.com/wavy/">Language</a></li>
                                          <li id="menu-item-2425" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2425"><a href="http://tabula.bold-themes.com/wavy/home/home-music-courses/">Music Courses</a></li>
                                          <li id="menu-item-2426" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2426"><a href="http://tabula.bold-themes.com/wavy/home/home-music-school/">Music School</a></li>
                                          <li id="menu-item-2427" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2427"><a href="http://tabula.bold-themes.com/wavy/wavy/home/home-ballet/">Ballet</a></li>
                                       </ul>
                                    </li>
                                    <li id="menu-item-2422" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-2422">
                                       <a href="#">Shady</a>
                                       <ul class="sub-menu">
                                          <li id="menu-item-2428" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2428"><a href="http://tabula.bold-themes.com/shady/">Music</a></li>
                                          <li id="menu-item-2429" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2429"><a href="http://tabula.bold-themes.com/shady/home/home-contemporary-ballet/">Contemporary Ballet</a></li>
                                          <li id="menu-item-2430" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2430"><a href="http://tabula.bold-themes.com/shady/home/home-jazz-ballet/">Jazz Ballet</a></li>
                                          <li id="menu-item-2431" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2431"><a href="http://tabula.bold-themes.com/shady/home/home-acting/">Acting</a></li>
                                       </ul>
                                    </li>
                                 </ul>
                              </li>
                              <li id="menu-item-43" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-43">
                                 <a href="../../about-us/index.html">About</a>
                                 <ul class="sub-menu">
                                    <li id="menu-item-2035" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2035"><a href="../about-us/index.html">About Us</a></li>
                                    <li id="menu-item-2050" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2050"><a href="../about-us/about-me/index.html">About Me</a></li>
                                    <li id="menu-item-2048" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2048"><a href="../about-us/our-team/index.html">Our Team</a></li>
                                    <li id="menu-item-2059" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2059"><a href="../about-us/history/index.html">History</a></li>
                                    <li id="menu-item-2061" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2061"><a href="../about-us/testimonials/index.html">Testimonials</a></li>
                                    <li id="menu-item-42" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-42"><a href="../about-us/contact/index.html">Contact</a></li>
                                    <li id="menu-item-2461" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2461"><a href="../about-us/coming-soon/index.html">Coming Soon</a></li>
                                    <li id="menu-item-2702" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2702"><a href="../404.html">404</a></li>
                                 </ul>
                              </li>
                              <li id="menu-item-2046" class="menu-item menu-item-type-post_type menu-item-object-page current-page-ancestor current-menu-ancestor current-menu-parent current-page-parent current_page_parent current_page_ancestor menu-item-has-children menu-item-2046">
                                 <a href="../index.html">Courses</a>
                                 <ul class="sub-menu">
                                    <li id="menu-item-2062" class="menu-item menu-item-type-post_type menu-item-object-page current-page-ancestor current-page-parent menu-item-2062"><a href="../index.html">Courses</a></li>
                                    <li id="menu-item-2047" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2047"><a href="../single-course/index.html">Single Course</a></li>
                                    <li id="menu-item-2049" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2049"><a href="../schedule/index.html">Schedule</a></li>
                                    <li id="menu-item-2315" class="menu-item menu-item-type-post_type menu-item-object-page current-menu-item page_item page-item-2305 current_page_item menu-item-2315"><a href="index.html" aria-current="page">Workshop</a></li>
                                    <li id="menu-item-2318" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2318"><a href="../workshops-and-events/index.html">Workshops and Events</a></li>
                                    <li id="menu-item-2060" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2060"><a href="../get-quote/index.html">Get Quote</a></li>
                                 </ul>
                              </li>
                              <li id="menu-item-40" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-40">
                                 <a href="../../blog/index.html">Blog</a>
                                 <ul class="sub-menu">
                                    <li id="menu-item-1197" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1197"><a href="../blog/index.html">Standard view</a></li>
                                    <li id="menu-item-1198" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1198"><a href="../blog/index31ab.html?blog_list_view=columns">Columns view</a></li>
                                    <li id="menu-item-1199" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1199"><a href="../blog/index21d3.html?blog_list_view=simple">Simple view</a></li>
                                    <li id="menu-item-1205" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1205"><a href="../blog/blog-grid/index.html">Grid view</a></li>
                                    <li id="menu-item-2733" class="menu-item menu-item-type-post_type menu-item-object-post menu-item-has-children menu-item-2733">
                                       <a href="../../standard-profile-of-drawing-through-teaching-program/index.html">Single Post</a>
                                       <ul class="sub-menu">
                                          <li id="menu-item-2735" class="menu-item menu-item-type-post_type menu-item-object-post menu-item-2735"><a href="../../standard-profile-of-drawing-through-teaching-program/index.html">Standard Post</a></li>
                                          <li id="menu-item-2734" class="menu-item menu-item-type-post_type menu-item-object-post menu-item-2734"><a href="../../how-to-draw-a-school-step-by-step/index.html">Grid Gallery Post</a></li>
                                          <li id="menu-item-2739" class="menu-item menu-item-type-post_type menu-item-object-post menu-item-2739"><a href="../../colours-of-the-season-with-emma-jose/index.html">Carousel &#038; Columns Post</a></li>
                                          <li id="menu-item-2737" class="menu-item menu-item-type-post_type menu-item-object-post menu-item-2737"><a href="../../step-by-step-using-a-full-range-of-pencils/index.html">Quote Post</a></li>
                                          <li id="menu-item-2740" class="menu-item menu-item-type-post_type menu-item-object-post menu-item-2740"><a href="../../sketching-design-a-perfect-combo/index.html">Link Post</a></li>
                                          <li id="menu-item-2736" class="menu-item menu-item-type-post_type menu-item-object-post menu-item-2736"><a href="../../launch-of-young-artists-programme/index.html">Audio Post</a></li>
                                          <li id="menu-item-2738" class="menu-item menu-item-type-post_type menu-item-object-post menu-item-2738"><a href="../../drawing-year-alumni-return-from-india/index.html">Video Post</a></li>
                                       </ul>
                                    </li>
                                    <li id="menu-item-59" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-59">
                                       <a href="../../galleries/index.html">Galleries</a>
                                       <ul class="sub-menu">
                                          <li id="menu-item-1219" class="menu-item menu-item-type-post_type menu-item-object-portfolio menu-item-1219"><a href="../../galleries/tabula-school-the-foundation-year/index.html">Standard Post</a></li>
                                          <li id="menu-item-1215" class="menu-item menu-item-type-post_type menu-item-object-portfolio menu-item-1215"><a href="../../galleries/a-summer-of-drawing/index.html">Carousel Post</a></li>
                                          <li id="menu-item-1216" class="menu-item menu-item-type-post_type menu-item-object-portfolio menu-item-1216"><a href="../../galleries/the-tabula-drawing-marathon-2019/index.html">Columns &#038; Grid Layout</a></li>
                                          <li id="menu-item-1217" class="menu-item menu-item-type-post_type menu-item-object-portfolio menu-item-1217"><a href="../../galleries/the-drawing-year-2018-19-exhibition/index.html">Video Post</a></li>
                                          <li id="menu-item-1218" class="menu-item menu-item-type-post_type menu-item-object-portfolio menu-item-1218"><a href="../../galleries/student-stories-the-drawing-year-2018/index.html">Audio Post</a></li>
                                       </ul>
                                    </li>
                                 </ul>
                              </li>
                              <li id="menu-item-41" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-41">
                                 <a href="../../shop/index.html">Shop</a>
                                 <ul class="sub-menu">
                                    <li id="menu-item-152" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-152"><a href="../../shop/index.html">Products</a></li>
                                    <li id="menu-item-47" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-47"><a href="../../shop/cart/index.html">Cart</a></li>
                                    <li id="menu-item-46" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-46"><a href="../../shop/checkout/index.html">Checkout</a></li>
                                    <li id="menu-item-45" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-45"><a href="../../shop/my-account/index.html">My Account</a></li>
                                 </ul>
                              </li>
                              <li id="menu-item-2169" class="btMenuWideDropdown menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-2169">
                                 <a href="#">Elements</a>
                                 <ul class="sub-menu">
                                    <li id="menu-item-1296" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-1296">
                                       <a href="#">Base</a>
                                       <ul class="sub-menu">
                                          <li id="menu-item-1298" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1298"><a href="../../elements/headlines/index.html">Headlines</a></li>
                                          <li id="menu-item-1297" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1297"><a href="../../elements/buttons-icons/index.html">Buttons &#038; Icons</a></li>
                                          <li id="menu-item-1300" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1300"><a href="../../elements/images/index.html">Images</a></li>
                                          <li id="menu-item-3045" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-3045"><a href="../../elements/organic-animation/index.html">Organic Animation</a></li>
                                          <li id="menu-item-1301" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1301"><a href="../../elements/inner-row-inner-column/index.html">Inner Row &#038; Column</a></li>
                                          <li id="menu-item-1310" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1310"><a href="../../elements/countdown-counter/index.html">Countdown &#038; Counter</a></li>
                                       </ul>
                                    </li>
                                    <li id="menu-item-1343" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-1343">
                                       <a href="#">Common</a>
                                       <ul class="sub-menu">
                                          <li id="menu-item-1351" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1351"><a href="../../elements/price-list-progress/index.html">Price List &#038; Progress Bar</a></li>
                                          <li id="menu-item-1368" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1368"><a href="../../elements/google-maps/index.html">Google Maps</a></li>
                                          <li id="menu-item-1373" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1373"><a href="../../elements/service-element/index.html">Service</a></li>
                                          <li id="menu-item-1378" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1378"><a href="../../elements/accordions-tabs/index.html">Accordions &#038; Tabs</a></li>
                                          <li id="menu-item-2846" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2846"><a href="../../elements/card-event/index.html">Card &#038; Event</a></li>
                                          <li id="menu-item-2850" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2850"><a href="../../elements/schedule-step-line/index.html">Schedule &#038; Step Line</a></li>
                                       </ul>
                                    </li>
                                    <li id="menu-item-1419" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-1419">
                                       <a href="#">Presentational</a>
                                       <ul class="sub-menu">
                                          <li id="menu-item-1420" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1420"><a href="../../elements/team/index.html">Team</a></li>
                                          <li id="menu-item-1336" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1336"><a href="../../elements/slider/index.html">Slider</a></li>
                                          <li id="menu-item-1421" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1421"><a href="../../elements/elements-testimonials/index.html">Testimonials</a></li>
                                          <li id="menu-item-1357" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1357"><a href="../../elements/cost-calculator/index.html">Cost Calculator</a></li>
                                          <li id="menu-item-1393" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1393"><a href="../../elements/social-media/index.html">Social Media</a></li>
                                          <li id="menu-item-1320" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1320"><a href="../../elements/blog-layouts/index.html">Blog Layouts</a></li>
                                       </ul>
                                    </li>
                                 </ul>
                              </li>
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
				  <?php 
						
						$sql = (mysqli_query($con,"SELECT * FROM m_courses WHERE course_subject='$course_subject' "));
						while($row = mysqli_fetch_assoc($sql)){
							
						   $course_subject = $row['course_subject'];
							$about_courses = $row['about_courses'];
							$courses_price = $row['courses_price'];
							$courses_image = $row['courses_image'];
							$course_duration = $row['course_duration'];
							$courses_effort = $row['courses_effort'];
							$course_language = $row['course_language'];
							$certificate = $row['certificate'];
							$total_class = $row['total_class'];
						
					?>
                     <section id="bt_bb_section5fe4d4f9dc409" data-parallax="0.7" data-parallax-offset="0" data-background_image_src="'../admin/build/user_pic/<?php echo $row['courses_image']; ?>'" class="bt_bb_section bt_bb_top_spacing_large bt_bb_bottom_spacing_large bt_bb_color_scheme_1 bt_bb_layout_boxed_1200 bt_bb_vertical_align_top bt_bb_parallax btLazyLoadBackground bt_bb_background_image bt_bb_background_overlay_dark_solid" style="background-image:url(http_/tabula.bold-themes.com/sunny/wp-content/plugins/bold-page-builder/img/blank.html);">
                        <div class="bt_bb_port">
                           <div class="bt_bb_cell">
                              <div class="bt_bb_cell_inner">
                                 <div class="bt_bb_row_wrapper">
                                    <div  class="bt_bb_row" >
                                       <div  class="bt_bb_column col-md-9 col-ms-12 bt_bb_align_left bt_bb_vertical_align_top bt_bb_animation_fade_in animate bt_bb_padding_normal bt_bb_shape_inherit"  data-width="9">
                                          <div class="bt_bb_column_content">
                                             <div class="bt_bb_column_content_inner">
                                                <div class="bt_bb_separator bt_bb_top_spacing_large bt_bb_border_style_none bt_bb_hidden_xs bt_bb_hidden_ms"></div>
                                                <header class="bt_bb_headline bt_bb_color_scheme_6 bt_bb_dash_none bt_bb_size_extralarge bt_bb_superheadline bt_bb_subheadline bt_bb_align_inherit">
                                                   <h1><span class="bt_bb_headline_superheadline">####</span><span class="bt_bb_headline_content"><span> Mowgli IT School Course Details</span></span></h1>
                                                   <div class="bt_bb_headline_subheadline">June 06 - 08, 2020</div>
                                                </header>
                                             </div>
                                          </div>
                                       </div>
                                       <div  class="bt_bb_column col-md-3 col-sm-6 col-ms-12 bt_bb_align_left bt_bb_vertical_align_top bt_bb_padding_normal"  data-width="3">
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
					 
                     <section id="bt_bb_section5fe4d4f9dc6f7"  class="bt_bb_section bt_bb_top_spacing_large bt_bb_bottom_spacing_medium bt_bb_layout_boxed_1200 bt_bb_vertical_align_top" >
                        <div class="bt_bb_port">
                           <div class="bt_bb_cell">
                              <div class="bt_bb_cell_inner">
                                 <div class="bt_bb_row_wrapper">
                                    <div  class="bt_bb_row bt_bb_column_gap_0 bt_bb_shape_inherit" >
                                       <div  class="bt_bb_column col-md-9 col-ms-12 bt_bb_align_left bt_bb_vertical_align_bottom bt_bb_animation_fade_in animate bt_bb_padding_normal bt_bb_shape_inherit"  data-width="9">
                                          <div class="bt_bb_column_content">
                                             <div class="bt_bb_column_content_inner">
                                                <header class="bt_bb_headline bt_bb_color_scheme_5 bt_bb_dash_top_bottom bt_bb_size_large bt_bb_superheadline bt_bb_align_inherit bt_bb_dash_color_scheme_15">
                                                   <h3><!--span class="bt_bb_headline_superheadline">FRENCH STREET</span!--><span class="bt_bb_headline_content"><span><?php echo $row['course_subject']; ?></span></span></h3>
                                                </header>
                                                <div class="bt_bb_separator bt_bb_bottom_spacing_100 bt_bb_border_style_none"></div>
                                             </div>
                                          </div>
                                       </div>
                                       <div  class="bt_bb_column col-md-3 col-sm-6 col-ms-12 bt_bb_align_right bt_bb_vertical_align_middle bt_bb_animation_fade_in animate bt_bb_padding_normal"  data-width="3">
									   <div>Course Fee: 15000/-</div>
                                          <div class="bt_bb_column_content">
                                             <div class="bt_bb_column_content_inner">
                                                <div class="bt_bb_button bt_bb_icon_position_left bt_bb_color_scheme_6 bt_bb_style_filled bt_bb_size_medium bt_bb_width_inline bt_bb_shape_inherit bt_bb_align_inherit"><a href="../../about-us/contact/index.html" target="_self" class="bt_bb_link" title="APPLY NOW"><span class="bt_bb_button_text">APPLY NOW</span></a></div>
                                                <div class="bt_bb_separator bt_bb_bottom_spacing_medium bt_bb_border_style_none"></div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="bt_bb_row_wrapper">
                                    <div  class="bt_bb_row bt_bb_column_gap_30 bt_bb_shape_inherit" >
                                       <div  class="bt_bb_column col-md-6 col-sm-12 bt_bb_align_left bt_bb_vertical_align_top bt_bb_animation_fade_in animate bt_bb_padding_normal bt_bb_shape_inherit"  data-width="6">
									   <div class="bt_bb_image"><span><img style="height:700px; width:800px;" src="../admin/build/user_pic/<?php echo $row['courses_image']; ?>" title="courses_01" alt="admin/biuld/user_pic/<?php echo $row['courses_image']; ?>"></span></div>
                                          <div class="bt_bb_column_content">
                                             <div class="bt_bb_column_content_inner">
                                                <div  class="bt_bb_text" >
                                                   <p><?php echo $row['about_courses']; ?>.</p>
                                                </div>
                                                <div class="bt_bb_separator bt_bb_bottom_spacing_medium bt_bb_border_style_none"></div>
                                             </div>
                                          </div>
                                       </div>
                                       <div  class="bt_bb_column col-md-6 col-sm-12 bt_bb_align_left bt_bb_vertical_align_top bt_bb_animation_fade_in animate bt_bb_padding_normal bt_bb_shape_inherit"  data-width="6">
                                          <div class="bt_bb_column_content">
                                             <div class="bt_bb_column_content_inner">
                                                <div class="bt_bb_accordion bt_bb_color_scheme_3 bt_bb_style_simple bt_bb_shape_square" data-closed=closed>
                                                   <div class="bt_bb_accordion_item btWithIcon">
                                                      <div class="bt_bb_accordion_item_title_content">
                                                         <span  data-ico-artistic="&#127748;" class="bt_bb_icon_holder"></span>
                                                         <div class="bt_bb_accordion_item_title">A BOX OF CRAYONS</div>
                                                      </div>
                                                      <div class="bt_bb_accordion_item_content">
                                                         <div  class="bt_bb_text" >
                                                            <p>Inspired by the book “The Crayon Box That Talked“, this lesson will show children that when we all work together, the results are much more.</p>
                                                         </div>
                                                      </div>
                                                   </div>
												   <div class="bt_bb_accordion_item btWithIcon">
                                                      <div class="bt_bb_accordion_item_title_content">
                                                         <span  data-ico-artistic="&#xf10d;" class="bt_bb_icon_holder"></span>
                                                         <div class="bt_bb_accordion_item_title">A BOX OF CRAYONS</div>
                                                      </div>
                                                      <div class="bt_bb_accordion_item_content">
                                                         <div  class="bt_bb_text" >
                                                            <p>Inspired by the book “The Crayon Box That Talked“, this lesson will show children that when we all work together, the results are much more.</p>
                                                         </div>
                                                      </div>
                                                   </div>
												   <div class="bt_bb_accordion_item btWithIcon">
                                                      <div class="bt_bb_accordion_item_title_content">
                                                         <span  data-ico-artistic="&#xf10d;" class="bt_bb_icon_holder"></span>
                                                         <div class="bt_bb_accordion_item_title">A BOX OF CRAYONS</div>
                                                      </div>
                                                      <div class="bt_bb_accordion_item_content">
                                                         <div  class="bt_bb_text" >
                                                            <p>Inspired by the book “The Crayon Box That Talked“, this lesson will show children that when we all work together, the results are much more.</p>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class="bt_bb_accordion_item btWithIcon">
                                                      <div class="bt_bb_accordion_item_title_content">
                                                         <span  data-ico-artistic="&#xf125;" class="bt_bb_icon_holder"></span>
                                                         <div class="bt_bb_accordion_item_title">ORIGAMI FOR KIDS </div>
                                                      </div>
                                                      <div class="bt_bb_accordion_item_content">
                                                         <div  class="bt_bb_text" >
                                                            <p>Retro lomo copper mug gentrify ramps salvia, kinfolk hammock flexitarian. Hoodie tumblr taiyaki glossier. Godard gluten-free bread, messenger.</p>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class="bt_bb_accordion_item btWithIcon">
                                                      <div class="bt_bb_accordion_item_title_content">
                                                         <span  data-ico-artistic="&#xf113;" class="bt_bb_icon_holder"></span>
                                                         <div class="bt_bb_accordion_item_title">PAINTING IN CIRCLES</div>
                                                      </div>
                                                      <div class="bt_bb_accordion_item_content">
                                                         <div  class="bt_bb_text" >
                                                            <p>Coloring book unicorn glossier gluten-free cornhole af, enamel pin meggings drinking vinegar messenger bag edison bulb. Scenester hammock.</p>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="bt_bb_separator bt_bb_bottom_spacing_medium bt_bb_border_style_none"></div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </section>
					 <?php } ?>
                     <!--section id="bt_bb_section5fe4d4f9dd4a5"  class="bt_bb_section bt_bb_layout_boxed_1200 bt_bb_vertical_align_top" >
                        <div class="bt_bb_port">
                           <div class="bt_bb_cell">
                              <div class="bt_bb_cell_inner">
                                 <div class="bt_bb_row_wrapper">
                                    <div  class="bt_bb_row bt_bb_shape_inherit" >
                                       <div  class="bt_bb_column col-md-12 col-ms-12 bt_bb_align_left bt_bb_vertical_align_top bt_bb_animation_fade_in animate bt_bb_padding_normal bt_bb_shape_inherit"  data-width="12">
                                          <div class="bt_bb_column_content">
                                             <div class="bt_bb_column_content_inner">
                                                <div class="bt_bb_masonry_image_grid bt_bb_grid_container bt_bb_columns_4 bt_bb_gap_small" data-columns="4">
                                                   <div class="bt_bb_masonry_post_image_content" data-columns="4">
                                                      <div class="bt_bb_grid_sizer"></div>
                                                      <div class="bt_bb_grid_item bt_bb_tile_format11" data-hw="1" data-src="http://tabula.bold-themes.com/sunny/wp-content/uploads/sites/2/2019/04/inner_image_01.jpg" data-src-full="http://tabula.bold-themes.com/sunny/wp-content/uploads/sites/2/2019/04/inner_image_01.jpg" data-title="inner_image_01">
                                                         <div class="bt_bb_grid_item_inner" data-hw="1" >
                                                            <div class="bt_bb_grid_item_inner_image"></div>
                                                            <div class="bt_bb_grid_item_inner_content"></div>
                                                         </div>
                                                      </div>
                                                      <div class="bt_bb_grid_item bt_bb_tile_format11" data-hw="1" data-src="http://tabula.bold-themes.com/sunny/wp-content/uploads/sites/2/2019/04/inner_image_02.jpg" data-src-full="http://tabula.bold-themes.com/sunny/wp-content/uploads/sites/2/2019/04/inner_image_02.jpg" data-title="inner_image_02">
                                                         <div class="bt_bb_grid_item_inner" data-hw="1" >
                                                            <div class="bt_bb_grid_item_inner_image"></div>
                                                            <div class="bt_bb_grid_item_inner_content"></div>
                                                         </div>
                                                      </div>
                                                      <div class="bt_bb_grid_item bt_bb_tile_format11" data-hw="1" data-src="http://tabula.bold-themes.com/sunny/wp-content/uploads/sites/2/2019/04/inner_image_03.jpg" data-src-full="http://tabula.bold-themes.com/sunny/wp-content/uploads/sites/2/2019/04/inner_image_03.jpg" data-title="inner_image_03">
                                                         <div class="bt_bb_grid_item_inner" data-hw="1" >
                                                            <div class="bt_bb_grid_item_inner_image"></div>
                                                            <div class="bt_bb_grid_item_inner_content"></div>
                                                         </div>
                                                      </div>
                                                      <div class="bt_bb_grid_item bt_bb_tile_format11" data-hw="1" data-src="http://tabula.bold-themes.com/sunny/wp-content/uploads/sites/2/2019/04/inner_image_04.jpg" data-src-full="http://tabula.bold-themes.com/sunny/wp-content/uploads/sites/2/2019/04/inner_image_04.jpg" data-title="inner_image_04">
                                                         <div class="bt_bb_grid_item_inner" data-hw="1" >
                                                            <div class="bt_bb_grid_item_inner_image"></div>
                                                            <div class="bt_bb_grid_item_inner_content"></div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </section!-->
                     
                     
                  </div>
               </div>
               <!-- /boldthemes_content -->
            </div>
            <!-- /contentHolder -->
         </div>
         <!-- /contentWrap -->
         <div class="btSiteFooter">
            <div class="bt_bb_wrapper">
               <section id="bt_bb_section5fe4d4f9df1dd"  data-background_image_src="'http://tabula.bold-themes.com/sunny/wp-content/uploads/sites/2/2019/03/pattern.jpg'" class="bt_bb_section bt_bb_top_spacing_large bt_bb_bottom_spacing_medium bt_bb_layout_boxed_1200 bt_bb_vertical_align_top btLazyLoadBackground bt_bb_background_image" style="background-image:url(http_/tabula.bold-themes.com/sunny/wp-content/plugins/bold-page-builder/img/blank.html);">
                  <div class="bt_bb_port">
                     <div class="bt_bb_cell">
                        <div class="bt_bb_cell_inner">
                           <div class="bt_bb_row_wrapper">
                              <div  class="bt_bb_row bt_bb_column_gap_50" >
                                 <div  class="bt_bb_column col-md-3 col-sm-6 col-ms-12 bt_bb_align_left bt_bb_vertical_align_top bt_bb_animation_fade_in animate bt_bb_padding_normal"  data-width="3">
                                    <div class="bt_bb_column_content">
                                       <div class="bt_bb_column_content_inner">
                                          <header class="bt_bb_headline bt_bb_dash_none bt_bb_size_small bt_bb_align_inherit">
                                             <h5><span class="bt_bb_headline_content"><span>Contact us</span></span></h5>
                                          </header>
                                          <div class="bt_bb_separator bt_bb_bottom_spacing_normal bt_bb_border_style_none"></div>
                                          <div class="bt_bb_icon bt_bb_color_scheme_3 bt_bb_style_borderless bt_bb_size_xsmall bt_bb_shape_circle bt_bb_align_inherit"><span  data-ico-dripicons="&#xe970;" class="bt_bb_icon_holder"><span>Franklin St, Greenpoint Ave</span></span></div>
                                          <div class="bt_bb_separator bt_bb_bottom_spacing_small bt_bb_border_style_none"></div>
                                          <div class="bt_bb_icon bt_bb_color_scheme_3 bt_bb_style_borderless bt_bb_size_xsmall bt_bb_shape_circle bt_bb_align_inherit"><span  data-ico-dripicons="&#xe98e;" class="bt_bb_icon_holder"><span>+2342 5446 67</span></span></div>
                                          <div class="bt_bb_separator bt_bb_bottom_spacing_small bt_bb_border_style_none"></div>
                                          <div class="bt_bb_icon bt_bb_color_scheme_3 bt_bb_style_borderless bt_bb_size_xsmall bt_bb_shape_circle bt_bb_align_inherit"><span  data-ico-dripicons="&#xe900;" class="bt_bb_icon_holder"><span>Monday - Friday: 8 AM - 5 PM</span></span></div>
                                          <div class="bt_bb_separator bt_bb_bottom_spacing_normal bt_bb_border_style_none"></div>
                                          <div class="bt_bb_icon bt_bb_color_scheme_5 bt_bb_style_borderless bt_bb_size_xsmall bt_bb_shape_circle bt_bb_align_inherit"><a href="https://twitter.com/bold_themes"  target="_blank"   data-ico-fontawesome="&#xf099;" class="bt_bb_icon_holder"></a></div>
                                          <div class="bt_bb_icon bt_bb_color_scheme_5 bt_bb_style_borderless bt_bb_size_xsmall bt_bb_shape_circle bt_bb_align_inherit"><a href="https://www.instagram.com/bold_themes/"  target="_blank"   data-ico-fontawesome="&#xf16d;" class="bt_bb_icon_holder"></a></div>
                                          <div class="bt_bb_icon bt_bb_color_scheme_5 bt_bb_style_borderless bt_bb_size_xsmall bt_bb_shape_circle bt_bb_align_inherit"><a href="https://www.facebook.com/boldthemes/"  target="_blank"   data-ico-fontawesome="&#xf09a;" class="bt_bb_icon_holder"></a></div>
                                          <div class="bt_bb_icon bt_bb_color_scheme_5 bt_bb_style_borderless bt_bb_size_xsmall bt_bb_shape_circle bt_bb_align_inherit"><a href="https://www.youtube.com/channel/UCPL5LgX32KsbQ1i9nV-xiKA"  target="_blank"   data-ico-fontawesome="&#xf16a;" class="bt_bb_icon_holder"></a></div>
                                          <div class="bt_bb_separator bt_bb_bottom_spacing_medium bt_bb_border_style_none"></div>
                                       </div>
                                    </div>
                                 </div>
                                 <div  class="bt_bb_column col-md-3 col-sm-6 col-ms-12 bt_bb_align_left bt_bb_vertical_align_top bt_bb_animation_fade_in animate bt_bb_padding_normal"  data-width="3">
                                    <div class="bt_bb_column_content">
                                       <div class="bt_bb_column_content_inner">
                                          <header class="bt_bb_headline bt_bb_dash_none bt_bb_size_small bt_bb_align_inherit">
                                             <h5><span class="bt_bb_headline_content"><span>Quick Links</span></span></h5>
                                          </header>
                                          <div class="bt_bb_separator bt_bb_bottom_spacing_normal bt_bb_border_style_none"></div>
                                          <div class="bt_bb_custom_menu bt_bb_direction_vertical">
                                             <div class="menu-quick-links-container">
                                                <ul id="menu-quick-links" class="menu">
                                                   <li id="menu-item-1738" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1738"><a href="#">Home</a></li>
                                                   <li id="menu-item-1739" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1739"><a href="../../blog/index.html">Read our Blog</a></li>
                                                   <li id="menu-item-1740" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1740"><a href="../../about-us/contact/index.html">Contact</a></li>
                                                   <li id="menu-item-1741" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1741"><a href="../../shop/index.html">Shop</a></li>
                                                </ul>
                                             </div>
                                          </div>
                                          <div class="bt_bb_separator bt_bb_bottom_spacing_medium bt_bb_border_style_none"></div>
                                       </div>
                                    </div>
                                 </div>
                                 <div  class="bt_bb_column col-md-3 col-sm-6 col-ms-12 bt_bb_align_left bt_bb_vertical_align_top bt_bb_animation_fade_in animate bt_bb_padding_normal"  data-width="3">
                                    <div class="bt_bb_column_content">
                                       <div class="bt_bb_column_content_inner">
                                          <header class="bt_bb_headline bt_bb_dash_none bt_bb_size_small bt_bb_align_inherit">
                                             <h5><span class="bt_bb_headline_content"><span>About</span></span></h5>
                                          </header>
                                          <div class="bt_bb_separator bt_bb_bottom_spacing_normal bt_bb_border_style_none"></div>
                                          <div class="bt_bb_custom_menu bt_bb_direction_vertical">
                                             <div class="menu-custom-menu-container">
                                                <ul id="menu-custom-menu" class="menu">
                                                   <li id="menu-item-1289" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1289"><a href="../../about-us/index.html">About Us</a></li>
                                                   <li id="menu-item-2614" class="menu-item menu-item-type-post_type menu-item-object-page current-page-ancestor current-page-parent menu-item-2614"><a href="../index.html">Courses</a></li>
                                                   <li id="menu-item-2615" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2615"><a href="../workshops-and-events/index.html">Events</a></li>
                                                   <li id="menu-item-2616" class="menu-item menu-item-type-post_type menu-item-object-page current-menu-item page_item page-item-2305 current_page_item menu-item-2616"><a href="index.html" aria-current="page">Workshop</a></li>
                                                </ul>
                                             </div>
                                          </div>
                                          <div class="bt_bb_separator bt_bb_bottom_spacing_medium bt_bb_border_style_none"></div>
                                       </div>
                                    </div>
                                 </div>
                                 <div  class="bt_bb_column col-md-3 col-sm-6 col-ms-12 bt_bb_align_left bt_bb_vertical_align_top bt_bb_animation_fade_in animate bt_bb_padding_normal"  data-width="3">
                                    <div class="bt_bb_column_content">
                                       <div class="bt_bb_column_content_inner">
                                          <header class="bt_bb_headline bt_bb_dash_none bt_bb_size_small bt_bb_align_inherit">
                                             <h5><span class="bt_bb_headline_content"><span>Newsletter</span></span></h5>
                                          </header>
                                          <div class="bt_bb_separator bt_bb_bottom_spacing_45 bt_bb_border_style_none"></div>
                                          <div class="bt_bb_contact_form_7">
                                             <div role="form" class="wpcf7" id="wpcf7-f1292-p2305-o1" lang="en-US" dir="ltr">
                                                <div class="screen-reader-response">
                                                   <p role="status" aria-live="polite" aria-atomic="true"></p>
                                                   <ul></ul>
                                                </div>
                                                <form action="http://tabula.bold-themes.com/sunny/courses/workshop/#wpcf7-f1292-p2305-o1" method="post" class="wpcf7-form init" novalidate="novalidate" data-status="init">
                                                   <div style="display: none;">
                                                      <input type="hidden" name="_wpcf7" value="1292" />
                                                      <input type="hidden" name="_wpcf7_version" value="5.3.2" />
                                                      <input type="hidden" name="_wpcf7_locale" value="en_US" />
                                                      <input type="hidden" name="_wpcf7_unit_tag" value="wpcf7-f1292-p2305-o1" />
                                                      <input type="hidden" name="_wpcf7_container_post" value="2305" />
                                                      <input type="hidden" name="_wpcf7_posted_data_hash" value="" />
                                                   </div>
                                                   <div class="btNewsletter">
                                                      <div class="btNewsletterColumn"><span class="wpcf7-form-control-wrap your-email"><input type="email" name="your-email" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email" aria-required="true" aria-invalid="false" placeholder="Your email" /></span></div>
                                                      <div class="btNewsletterButton"><input type="submit" value="SUBSCRIBE" class="wpcf7-form-control wpcf7-submit" /></div>
                                                   </div>
                                                   <div class="wpcf7-response-output" aria-hidden="true"></div>
                                                </form>
                                             </div>
                                          </div>
                                          <div class="bt_bb_separator bt_bb_bottom_spacing_medium bt_bb_border_style_none"></div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </section>
            </div>
            <footer class="btLightSkin"></footer>
         </div>
         <!-- /btSiteFooter -->
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
      <script src="../wp-content/cache/minify/2/6360f.js"></script>
      <script type='text/javascript' id='wc-add-to-cart-js-extra'>
         /* <![CDATA[ */
         var wc_add_to_cart_params = {"ajax_url":"\/sunny\/wp-admin\/admin-ajax.php","wc_ajax_url":"\/sunny\/?wc-ajax=%%endpoint%%","i18n_view_cart":"View cart","cart_url":"http:\/\/tabula.bold-themes.com\/sunny\/shop\/cart\/","is_cart":"","cart_redirect_after_add":"no"};
         /* ]]> */
      </script>
      <script src="../wp-content/cache/minify/2/dc06c.js"></script>
      <script type='text/javascript' id='woocommerce-js-extra'>
         /* <![CDATA[ */
         var woocommerce_params = {"ajax_url":"\/sunny\/wp-admin\/admin-ajax.php","wc_ajax_url":"\/sunny\/?wc-ajax=%%endpoint%%"};
         /* ]]> */
      </script>
      <script src="../wp-content/cache/minify/2/63a69.js"></script>
      <script type='text/javascript' id='wc-cart-fragments-js-extra'>
         /* <![CDATA[ */
         var wc_cart_fragments_params = {"ajax_url":"\/sunny\/wp-admin\/admin-ajax.php","wc_ajax_url":"\/sunny\/?wc-ajax=%%endpoint%%","cart_hash_key":"wc_cart_hash_96354a5a70d30497a46aaa2f950b7e8a","fragment_name":"wc_fragments_96354a5a70d30497a46aaa2f950b7e8a","request_timeout":"5000"};
         /* ]]> */
      </script>
      <script src="../wp-content/cache/minify/2/6e105.js"></script>
      <script type='text/javascript' id='tabula-header-js-before'>
         window.BoldThemesURI = "http://tabula.bold-themes.com/wp-content/themes/tabula/"; window.BoldThemesAJAXURL = "../wp-admin/admin-ajax.html";window.boldthemes_text = [];window.boldthemes_text.previous = 'previous';window.boldthemes_text.next = 'next';
      </script>
      <script src="../wp-content/cache/minify/2/35f12.js"></script>
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
      <script src="../wp-content/cache/minify/2/906d9.js"></script>
   </body>
</html>
<?php } ?>