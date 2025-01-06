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
         $subject_web = $_GET['course:'];
              ?>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
      <meta name="mobile-web-app-capable" content="yes">
      <meta name="apple-mobile-web-app-capable" content="yes">
      <?php 
         $sql = (mysqli_query($con,"SELECT * FROM all_web WHERE subject_web = '$subject_web' "));
         		while($row = mysqli_fetch_assoc($sql)){
         	
         	$subject_web = $row['subject_web'];
         				   			
         ?>
      <title><?php echo $row['subject_web']; ?></title>
      <?php } ?>
      <?php require_once('include/includecss.php');?>
   <body class="page-template-default page page-id-2305 page-child parent-pageid-2040 theme-tabula bt_bb_plugin_active bt_bb_fe_preview_toggle woocommerce-no-js btHeadingWeight_default btHeadingDash_dot btMenuWeight_default btCapitalizeMainMenuItems btHasCrest btNoLogo btHasAltLogo btMenuLeftEnabled btMenuBelowLogo btStickyEnabled btHideHeadline btLightSkin btBelowMenu noBodyPreloader btHardRoundedButtons btTransparentLightHeader btNoSidebar" >
     
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
                  <div class='btCrest'><a href='../index'><img src='../wp-content/uploads/sites/2/2019/03/mowgli.png' class='btCrestImg' alt='Sunny'/></a></div>
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
                        <div class='btCrest'><a href='../index'><img src='../wp-content/uploads/sites/2/2019/03/mowgli.png' class='btCrestImg' alt='Sunny'/></a></div>
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
                                  <a href="../index" aria-current="page">Home</a>
                				</li>
                			   
                               <li id="menu-item-43" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-43">
                                  <a href="../aboutus/aboutus/about_us">About Us</a>
                               </li>
                			   
                			   <li id="menu-item-43" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-43">
                                  <a href="../aboutus/team/team">Our Work</a>
                               </li>
                			  
                               <li id="menu-item-40" class="menu-item menu-item-type-post_type current_page_item current-menu-ancestor current_page_ancestor menu-item-object-page menu-item-has-children menu-item-40">
                                  <a href="view/courses">Courses</a>
                                  <ul class="sub-menu">
                            
                                     <li id="menu-item-2733" class="menu-item menu-item-type-post_type menu-item-object-post menu-item-has-children menu-item-2733">
                                        <a href="view/graphics_design">Graphics Design</a>
                                     </li>
                                     <li id="menu-item-59" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-59">
                                        <a href="view/web_design_development">Web Design & Development</a>
                                     </li>
                					 
                					 <li id="menu-item-59" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-59">
                                        <a href="view/digital_marketing">Digital Marketing</a>
                                     </li>
                                  </ul>
                               </li>
                			   
                			   <li id="menu-item-43" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-43">
                                  <a href="../aboutus/contact/contact">Contact Us</a>
                               </li>
                			  
                			   <div style="background-color:#0673BA; border-radius: 12px;" class="bt_bb_button bt_bb_icon_position_left  bt_bb_style_filled bt_bb_size_medium bt_bb_width_inline bt_bb_shape_inherit bt_bb_align_inherit">
                			       <a href="../registration.php" target="_self" class="bt_bb_link" title="APPLY TODAY"><span style="color:white;" class="bt_bb_button_text">REGISTER NOW</span></a></div>
                			   
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
						
						$sql = (mysqli_query($con,"SELECT * FROM all_web WHERE subject_web='$subject_web' "));
						while($row = mysqli_fetch_assoc($sql)){
							
						   $subject_web = $row['subject_web'];
							$web_about = $row['web_about'];
							$web_price = $row['web_price'];
							$web_image = $row['web_image'];
							$web_duration = $row['web_duration'];
							$web_effort = $row['web_effort'];
							$web_language = $row['web_language'];
							$web_certificate = $row['web_certificate'];
							$web_total_class = $row['web_total_class'];
						
					?>
                     <section id="bt_bb_section5fe4d4f9dc409" data-parallax="0.7" data-parallax-offset="0" data-background_image_src="'../admin/build/user_pic/<?php echo $row['web_image']; ?>'" class="bt_bb_section bt_bb_top_spacing_large bt_bb_bottom_spacing_large bt_bb_color_scheme_1 bt_bb_layout_boxed_1200 bt_bb_vertical_align_top bt_bb_parallax btLazyLoadBackground bt_bb_background_image bt_bb_background_overlay_dark_solid" style="background-image:url(http_/tabula.bold-themes.com/sunny/wp-content/plugins/bold-page-builder/img/blank.html);">
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
                                                   <h3><!--span class="bt_bb_headline_superheadline">FRENCH STREET</span!--><span class="bt_bb_headline_content"><span><?php echo $row['subject_web']; ?></span></span></h3>
                                                </header>
                                                <div class="bt_bb_separator bt_bb_bottom_spacing_100 bt_bb_border_style_none"></div>
                                             </div>
                                          </div>
                                       </div>
                                       <div  class="bt_bb_column col-md-3 col-sm-6 col-ms-12 bt_bb_align_right bt_bb_vertical_align_middle bt_bb_animation_fade_in animate bt_bb_padding_normal"  data-width="3">
									   <div>Course Fee: <?php echo $row['web_price']; ?></div>
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
									   <div class="bt_bb_image"><span><img style="height:700px; width:800px;" src="../admin/build/user_pic/<?php echo $row['web_image']; ?>" title="courses_01" alt="admin/biuld/user_pic/<?php echo $row['courses_image']; ?>"></span></div>
                                          <div class="bt_bb_column_content">
                                             <div class="bt_bb_column_content_inner">
                                                <div  class="bt_bb_text" >
                                                   <p><?php echo $row['web_about']; ?>.</p>
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
                                                         <div class="bt_bb_accordion_item_title">Effort of This Course</div>
                                                      </div>
                                                      <div class="bt_bb_accordion_item_content">
                                                         <div  class="bt_bb_text" >
                                                            <p><?php echo $row['web_effort']; ?></p>
                                                         </div>
                                                      </div>
                                                   </div>
												   <div class="bt_bb_accordion_item btWithIcon">
                                                      <div class="bt_bb_accordion_item_title_content">
                                                         <span  data-ico-artistic="&#xf113;" class="bt_bb_icon_holder"></span>
                                                         <div class="bt_bb_accordion_item_title">Duration</div>
                                                      </div>
                                                      <div class="bt_bb_accordion_item_content">
                                                         <div  class="bt_bb_text" >
                                                            <p><?php echo $row['web_duration']; ?></p>
                                                         </div>
                                                      </div>
                                                   </div>
												   <div class="bt_bb_accordion_item btWithIcon">
                                                      <div class="bt_bb_accordion_item_title_content">
                                                         <span  data-ico-artistic="&#xf10d;" class="bt_bb_icon_holder"></span>
                                                         <div class="bt_bb_accordion_item_title">Total Class</div>
                                                      </div>
                                                      <div class="bt_bb_accordion_item_content">
                                                         <div  class="bt_bb_text" >
                                                            <p><?php echo $row['web_total_class']; ?></p>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class="bt_bb_accordion_item btWithIcon">
                                                      <div class="bt_bb_accordion_item_title_content">
                                                         <span  data-ico-artistic="&#xf125;" class="bt_bb_icon_holder"></span>
                                                         <div class="bt_bb_accordion_item_title">Certificate?</div>
                                                      </div>
                                                      <div class="bt_bb_accordion_item_content">
                                                         <div  class="bt_bb_text" >
                                                            <p><?php echo $row['web_certificate']; ?></p>
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
        
         <!-- /btSiteFooter -->
         <?php 
   require_once('footer_include.php');
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