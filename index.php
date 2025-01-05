<?php 

session_start(); // Start the session at the very top of your script

// Set Language variable if it's passed in the URL
if (isset($_GET['lang']) && !empty($_GET['lang'])) {
    $_SESSION['lang'] = $_GET['lang'];

    // Reload the page if the language changes
    if (isset($_SESSION['lang']) && $_SESSION['lang'] != $_GET['lang']) {
        echo "<script type='text/javascript'> location.reload(); </script>";
    }
}

// Include the appropriate language file based on the session value
if (isset($_SESSION['lang']) && $_SESSION['lang'] == 'bn') {
    include "lang_bn.php"; // Bengali language file
} else {
    include "lang_en.php"; // English language file
}

require_once('config/db_connection.php');
?>

 
<!DOCTYPE html>
<html class="no-js" lang="en-US" data-bt-theme="Tabula 1.0.3">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>

		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<meta name="mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-capable" content="yes">
		
	<title>MOWGLI | Home</title>
	
	<?php require_once('include/for_css.php');?>
	<?php require_once('include/header.php');?>
	<script data-ad-client="ca-pub-2683083731718670" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
	<style> 
    
  .box {
    float: right;
    width: 120px;
    height: 47px;
    border: 1px solid #999;
    font-size: 15px;
    color: #1c87c9;
    background-color: #eee;
    border-radius: 2px;
    margin-bottom: 12px;
    margin-right: 20px;
  }



@keyframes example {
  0%   { left:0px; top:0px;}
  25%  {bottom:20px; top:0px;}
  50%  {top:20px;}
  75%  {left:0px; top:20px;}
  100% { left:0px; top:0px;}
</style>
<script>
 function changeLang()
 {
  document.getElementById('form_lang').submit();
 }
</script>

</head>

<body class="home page-template-default page page-id-1546 page-parent theme-tabula bt_bb_plugin_active bt_bb_fe_preview_toggle woocommerce-no-js btHeadingWeight_default btHeadingDash_dot btMenuWeight_default btCapitalizeMainMenuItems btHasCrest btNoLogo btMenuLeftEnabled btMenuBelowLogo btStickyEnabled btHideHeadline btLightSkin btBelowMenu noBodyPreloader btHardRoundedButtons btTransparentDarkHeader btNoSidebar" >

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
		<div class="btVerticalMenuTrigger">&nbsp;
			<div class="bt_bb_icon">
				<a href="#" target="_self"   data-ico-fa="&#xf0c9;" class="bt_bb_icon_holder"></a>
			</div>
		</div>
			
	<div class="btLogoArea">
	<!-- Crest & Logo -->
		<div class="logo">
			<div class='btCrest'>
				<a href='index'><img src='wp-content/uploads/sites/2/2019/03/mowgli.png' class='btCrestImg' alt='Sunny'/></a>
			</div>
		</div>
	<!-- Only Logo -->
			
	</div><!-- /btLogoArea -->
	</div><!-- /btVerticalHeaderTop -->

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
                              <div class="btIconWidgetContent"><span class="btIconWidgetTitle">CALL</span><span class="btIconWidgetText"><?= _call ?></span></div>
                           </div>
                           <div class="btIconWidget  btWidgetWithText">
                              <div class="btIconWidgetIcon"><span  data-ico-dripicons="&#xe970;" class="bt_bb_icon_holder"></span></div>
                              <div class="btIconWidgetContent"><span class="btIconWidgetTitle">ADDRESS</span><span class="btIconWidgetText"><?= _address ?></span></div>
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
         <nav style="position: fixed;">
            <ul id="menu-primary-menu" class="menu">
				<li id="menu-item-3134" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home  current_page_item current-menu-ancestor current_page_ancestor menu-item-has-children menu-item-3134">
                  <a href="" aria-current="page"><?= _home ?></a>
				</li>
			   
               <li id="menu-item-43" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-43">
                  <a href="aboutus/team/team"><?= _about ?></a>
               </li>
			   
			   <li id="menu-item-43" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-43">
                  <a href="aboutus/aboutus/about_us"><?=_work ?></a>
               </li>
			  
               <li id="menu-item-40" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-40">
                  <a href="../courses/view/courses"><?=_courses ?></a>
                  <ul class="sub-menu">
            
                     <li id="menu-item-2733" class="menu-item menu-item-type-post_type menu-item-object-post menu-item-has-children menu-item-2733">
                        <a href="../courses/view/graphics_design">Graphics Design</a>
                     </li>
                     <li id="menu-item-59" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-59">
                        <a href="../courses/view/web_design_development">Web Design & Development</a>
                     </li>
					 
					 <li id="menu-item-59" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-59">
                        <a href="../courses/view/digital_marketing">Digital Marketing</a>
                     </li>
                  </ul>
               </li>
			   
			   <li id="menu-item-43" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-43">
                  <a href="aboutus/contact/contact"><?= _contact ?></a>
               </li>
               
               <li id="menu-item-43" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-43">
                  <form method='get' action='' id='form_lang' >
                   <select style="font-size: 14px!important;" class="box" name='lang' onchange='changeLang();' >
                       <option value='en' <?php if(isset($_SESSION['lang']) && $_SESSION['lang'] == 'en'){ echo "selected"; } ?> >English</option>
                       <option value='bn' <?php if(isset($_SESSION['lang']) && $_SESSION['lang'] == 'bn'){ echo "selected"; } ?> >বাংলা</option>
                   </select>
                 </form>
               </li>
               

			   
               <!--li id="menu-item-41" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-41">
                  <a href="shop/index.html">Account</a>
                  <ul class="sub-menu">
                     <li id="menu-item-152" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-152"><a href="registration.php">Sign Up</a></li>
                     <li id="menu-item-47" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-47"><a href="signin.php">Login</a></li>
                  </ul>
               </li!-->
			   <div style="background-color:#0673BA; border-radius: 12px;" class="bt_bb_button bt_bb_icon_position_left  bt_bb_style_filled bt_bb_size_medium bt_bb_width_inline bt_bb_shape_inherit bt_bb_align_inherit">
			       <a href="registration" target="_self" class="bt_bb_link" title="APPLY TODAY"><span style="color:white;" class="bt_bb_button_text"><?= _register ?></span></a></div>
			   
            </ul>
         </nav>
      </div>
      <!-- .menuPort -->
   </div>
   <!-- /port -->
</div>
</div>
<!-- / inner header for scrolling -->
    </header><!-- /.mainHeader -->
	<div class="btContentWrap btClear">
   <div class="btContentHolder">
      <div class="btContent">
         <div class="bt_bb_wrapper">
            <section id="bt_bb_section5fe49f51ec64a"  class="bt_bb_section bt_bb_layout_wide bt_bb_vertical_align_top" >
               <div class="bt_bb_port">
                  <div class="bt_bb_cell">
                     <div class="bt_bb_cell_inner">
                        <div class="bt_bb_row_wrapper">
                           <div  class="bt_bb_row bt_bb_hidden_xs bt_bb_hidden_ms bt_bb_shape_inherit" >
                              <div  class="bt_bb_column col-md-12 col-ms-12 bt_bb_align_center bt_bb_vertical_align_top bt_bb_animation_fade_in animate bt_bb_padding_normal bt_bb_shape_inherit"  data-width="12">
                                 <div class="bt_bb_column_content">
                                    <div class="bt_bb_column_content_inner">
                                       <div class="bt_bb_content_slider bt_bb_gap_no_gap bt_bb_arrows_size_no_arrows bt_bb_show_dots_bottom bt_bb_height_auto bt_bb_animation_fade">
                                          <div class="slick-slider fade"  data-slick='{ "lazyLoad": "progressive", "cssEase": "ease-out", "speed": "600", "fade": true, "arrows": false, "adaptiveHeight": true, "dots": true,"autoplay": true, "autoplaySpeed": 3000,"pauseOnHover": false}' >
                                             
                                             <div class="bt_bb_content_slider_item" style=";background-image:url(wp-content/uploads/sites/2/2019/05/hero_home_02-slider.jpg)">
                                                <div class="bt_bb_content_slider_item_content content">
                                                   <div class="bt_bb_separator bt_bb_top_spacing_normal bt_bb_bottom_spacing_large bt_bb_border_style_none"></div>
                                                   <div class="bt_bb_image bt_bb_shape_square bt_bb_align_inherit bt_bb_hover_style_simple bt_bb_content_display_always bt_bb_content_align_middle bt_bb_content_exists">
                                                      <span><img src="circle.png" title="draw_paint" alt="circle.png"></span>
                                                      <div class="bt_bb_image_content">
                                                         <div class="bt_bb_image_content_flex">
                                                            <div class="bt_bb_image_content_inner">
                                                               <div class="bt_bb_floating_image bt_bb_floating_image_horizontal_position_left bt_bb_floating_image_vertical_position_top bt_bb_floating_image_animation_delay_default bt_bb_floating_image_animation_duration_default bt_bb_floating_image_animation_style_ease_out" style="top: 5em;" data-speed="0.4">
                                                                  <div class="bt_bb_floating_image_image" data-speed="0.4" style="height:170px; width:200px;position: relative;animation-name: example;animation-duration: 2s;animation-iteration-count: infinite;">
                                                                     <div class="bt_bb_image"><span><img src = "wp-content/plugins/bold-page-builder/img/blank.gif" data-image_src="include/m.gif" title="dot_03" alt="http://tabula.bold-themes.com/sunny/wp-content/uploads/sites/2/2019/05/dot_03.png" class="btLazyLoadImage"></span></div>
                                                                  </div>
                                                               </div>
                                                               
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class="bt_bb_separator bt_bb_bottom_spacing_large bt_bb_border_style_none"></div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="bt_bb_row_wrapper">
                           <div  class="bt_bb_row bt_bb_hidden_sm bt_bb_hidden_md bt_bb_hidden_lg bt_bb_shape_inherit" >
                              <div  class="bt_bb_column col-md-12 col-ms-12 bt_bb_align_center bt_bb_vertical_align_top bt_bb_animation_fade_in animate bt_bb_padding_normal bt_bb_shape_inherit"  data-width="12">
                                 <div class="bt_bb_column_content">
                                    <div class="bt_bb_column_content_inner">
                                       <div class="bt_bb_content_slider bt_bb_gap_no_gap bt_bb_arrows_size_no_arrows bt_bb_show_dots_bottom bt_bb_height_auto bt_bb_animation_fade">
                                          <div class="slick-slider fade"  data-slick='{ "lazyLoad": "progressive", "cssEase": "ease-out", "speed": "600", "fade": true, "arrows": false, "adaptiveHeight": true, "dots": true,"autoplay": true, "autoplaySpeed": 4000}' >
                                             <div class="bt_bb_content_slider_item" style=";background-image:url(wp-content/uploads/sites/2/2019/05/hero_home_02-slider.jpg)">
                                                <div class="bt_bb_content_slider_item_content content">
                                                   <div class="bt_bb_separator bt_bb_top_spacing_normal bt_bb_bottom_spacing_large bt_bb_border_style_none"></div>
                                                   <div class="bt_bb_image bt_bb_shape_square bt_bb_align_inherit bt_bb_hover_style_simple bt_bb_content_display_always bt_bb_content_align_middle bt_bb_content_exists">
                                                      <span><img src="circle.png" title="draw_paint" alt="circle.png"></span>
                                                      <div class="bt_bb_image_content">
                                                         <div class="bt_bb_image_content_flex">
                                                            <div class="bt_bb_image_content_inner">
                                                               <div class="bt_bb_floating_image bt_bb_floating_image_horizontal_position_left bt_bb_floating_image_vertical_position_top bt_bb_floating_image_animation_delay_default bt_bb_floating_image_animation_duration_default bt_bb_floating_image_animation_style_ease_out" style="top: 5em;" data-speed="0.4">
                                                                  <div class="bt_bb_floating_image_image" data-speed="0.4"  style=" margin-top:-50px;height:140px; width:160px;position: relative;animation-name: example;animation-duration: 2s;animation-iteration-count: infinite;">
                                                                     <div class="bt_bb_image"><span><img src = "wp-content/plugins/bold-page-builder/img/blank.gif" data-image_src="include/m.gif" title="dot_03" alt="http://tabula.bold-themes.com/sunny/wp-content/uploads/sites/2/2019/05/dot_03.png" class="btLazyLoadImage"></span></div>
                                                                  </div>
                                                               </div>
                                                               
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class="bt_bb_separator bt_bb_bottom_spacing_large bt_bb_border_style_none"></div>
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
            </section>
			
            <!--section id="bt_bb_section5fe49f51efd13"  class="bt_bb_section bt_bb_layout_wide bt_bb_vertical_align_top" >
               <div class="bt_bb_port">
                  <div class="bt_bb_cell">
                     <div class="bt_bb_cell_inner">
                        <div class="bt_bb_row_wrapper">
                           <div  class="bt_bb_row btLimitColumn bt_bb_column_gap_30" >
                              <div  class="bt_bb_column col-md-6 col-sm-12 bt_bb_align_left bt_bb_vertical_align_middle bt_bb_animation_fade_in animate bt_bb_padding_double bt_bb_column_background_image bt_bb_shape_inherit" style="background-color: rgba(255, 222, 57, 1);background-image:url(http_/tabula.bold-themes.com/sunny/wp-content/uploads/sites/2/2019/03/yellow_brush_stroke_01.html);" data-width="6">
                                 <div class="bt_bb_column_content">
                                    <div class="bt_bb_column_content_inner">
                                       <div class="bt_bb_separator bt_bb_bottom_spacing_large bt_bb_border_style_none"></div>
                                       <div class="bt_bb_content_slider bt_bb_gap_no_gap bt_bb_arrows_size_no_arrows bt_bb_show_dots_bottom bt_bb_height_keep-height bt_bb_animation_fade bt_bb_color_scheme_6">
                                          <div class="slick-slider fade"  data-slick='{ "lazyLoad": "progressive", "cssEase": "ease-out", "speed": "600", "fade": true, "arrows": false, "dots": true,"autoplay": true, "autoplaySpeed": 3000}' >
                                             <div class="bt_bb_content_slider_item" style="">
                                                <div class="bt_bb_content_slider_item_content content">
                                                   <div class="bt_bb_image bt_bb_shape_square bt_bb_align_inherit bt_bb_hover_style_simple bt_bb_content_display_always bt_bb_content_align_middle"><span><img src="wp-content/uploads/sites/2/2019/03/testimonials_01.png" title="testimonials_01" alt="http://tabula.bold-themes.com/sunny/wp-content/uploads/sites/2/2019/03/testimonials_01.png"></span></div>
                                                   <div class="bt_bb_separator bt_bb_bottom_spacing_normal bt_bb_border_style_none"></div>
                                                   <div  class="bt_bb_text" >
                                                      <blockquote>
                                                         <p>„The Tabula drawing school in Greenpoint NY is a MUST for anyone interested in bettering their skills.”</p>
                                                      </blockquote>
                                                   </div>
                                                   <div class="bt_bb_separator bt_bb_bottom_spacing_normal bt_bb_border_style_none"></div>
                                                   <header class="bt_bb_headline btTestimonials bt_bb_color_scheme_5 bt_bb_dash_none bt_bb_size_medium bt_bb_superheadline bt_bb_subheadline bt_bb_align_inherit">
                                                      <h6><span class="bt_bb_headline_superheadline">LOUREAL SIMMONS</span></h6>
                                                      <div class="bt_bb_headline_subheadline">Student</div>
                                                   </header>
                                                   <div class="bt_bb_separator bt_bb_top_spacing_extra_small bt_bb_bottom_spacing_medium bt_bb_border_style_none"></div>
                                                </div>
                                             </div>
                                             <div class="bt_bb_content_slider_item" style="">
                                                <div class="bt_bb_content_slider_item_content content">
                                                   <div class="bt_bb_image bt_bb_shape_square bt_bb_align_inherit bt_bb_hover_style_simple bt_bb_content_display_always bt_bb_content_align_middle"><span><img src="wp-content/uploads/sites/2/2019/03/testimonials_02.png" title="testimonials_02" alt="http://tabula.bold-themes.com/sunny/wp-content/uploads/sites/2/2019/03/testimonials_02.png"></span></div>
                                                   <div class="bt_bb_separator bt_bb_bottom_spacing_normal bt_bb_border_style_none"></div>
                                                   <div  class="bt_bb_text" >
                                                      <blockquote>
                                                         <p>„Ramps fashion and modern art axe pinterest shaman food truck, distillery tilde squid narwhal bitters direct.”</p>
                                                      </blockquote>
                                                   </div>
                                                   <div class="bt_bb_separator bt_bb_bottom_spacing_normal bt_bb_border_style_none"></div>
                                                   <header class="bt_bb_headline btTestimonials bt_bb_color_scheme_5 bt_bb_dash_none bt_bb_size_medium bt_bb_superheadline bt_bb_subheadline bt_bb_align_inherit">
                                                      <h6><span class="bt_bb_headline_superheadline">RICARDO LOGAN</span></h6>
                                                      <div class="bt_bb_headline_subheadline">Student</div>
                                                   </header>
                                                   <div class="bt_bb_separator bt_bb_top_spacing_extra_small bt_bb_bottom_spacing_medium bt_bb_border_style_none"></div>
                                                </div>
                                             </div>
                                             <div class="bt_bb_content_slider_item" style="">
                                                <div class="bt_bb_content_slider_item_content content">
                                                   <div class="bt_bb_image bt_bb_shape_square bt_bb_align_inherit bt_bb_hover_style_simple bt_bb_content_display_always bt_bb_content_align_middle"><span><img src="wp-content/uploads/sites/2/2019/03/testimonials_03.png" title="testimonials_03" alt="http://tabula.bold-themes.com/sunny/wp-content/uploads/sites/2/2019/03/testimonials_03.png"></span></div>
                                                   <div class="bt_bb_separator bt_bb_bottom_spacing_normal bt_bb_border_style_none"></div>
                                                   <div  class="bt_bb_text" >
                                                      <blockquote>
                                                         <p>„Beard polaroid 8-bit hell of green juice whatever cray gluten-free raw denim bicycle rights sustainable.”</p>
                                                      </blockquote>
                                                   </div>
                                                   <div class="bt_bb_separator bt_bb_bottom_spacing_normal bt_bb_border_style_none"></div>
                                                   <header class="bt_bb_headline btTestimonials bt_bb_color_scheme_5 bt_bb_dash_none bt_bb_size_medium bt_bb_superheadline bt_bb_subheadline bt_bb_align_inherit">
                                                      <h6><span class="bt_bb_headline_superheadline">JILL ALLISON</span></h6>
                                                      <div class="bt_bb_headline_subheadline">Student</div>
                                                   </header>
                                                   <div class="bt_bb_separator bt_bb_top_spacing_extra_small bt_bb_bottom_spacing_medium bt_bb_border_style_none"></div>
                                                </div>
                                             </div>
                                             <div class="bt_bb_content_slider_item" style="">
                                                <div class="bt_bb_content_slider_item_content content">
                                                   <div class="bt_bb_image bt_bb_shape_square bt_bb_align_inherit bt_bb_hover_style_simple bt_bb_content_display_always bt_bb_content_align_middle"><span><img src="wp-content/uploads/sites/2/2019/03/testimonials_04.png" title="testimonials_04" alt="http://tabula.bold-themes.com/sunny/wp-content/uploads/sites/2/2019/03/testimonials_04.png"></span></div>
                                                   <div class="bt_bb_separator bt_bb_bottom_spacing_normal bt_bb_border_style_none"></div>
                                                   <div  class="bt_bb_text" >
                                                      <blockquote>
                                                         <p>„Cred tacos celiac af. Health goth actually polaroid plaid, distillery blog fanny pack truffaut tumblr.”</p>
                                                      </blockquote>
                                                   </div>
                                                   <div class="bt_bb_separator bt_bb_bottom_spacing_normal bt_bb_border_style_none"></div>
                                                   <header class="bt_bb_headline btTestimonials bt_bb_color_scheme_5 bt_bb_dash_none bt_bb_size_medium bt_bb_superheadline bt_bb_subheadline bt_bb_align_inherit">
                                                      <h6><span class="bt_bb_headline_superheadline">BENNIE PARKER</span></h6>
                                                      <div class="bt_bb_headline_subheadline">Student</div>
                                                   </header>
                                                   <div class="bt_bb_separator bt_bb_top_spacing_extra_small bt_bb_bottom_spacing_medium bt_bb_border_style_none"></div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="bt_bb_separator bt_bb_bottom_spacing_large bt_bb_border_style_none"></div>
                                    </div>
                                 </div>
                              </div>
                              <div  class="bt_bb_column col-md-6 col-sm-12 bt_bb_align_left bt_bb_vertical_align_middle bt_bb_animation_fade_in animate bt_bb_padding_double"  data-width="6">
                                 <div class="bt_bb_column_content">
                                    <div class="bt_bb_column_content_inner">
                                       <div class="bt_bb_separator bt_bb_bottom_spacing_large bt_bb_border_style_none"></div>
                                       <header class="bt_bb_headline bt_bb_color_scheme_5 bt_bb_dash_none bt_bb_size_extralarge bt_bb_superheadline bt_bb_subheadline bt_bb_align_inherit">
                                          <h3><span class="bt_bb_headline_superheadline">ABOUT US</span><span class="bt_bb_headline_content"><span>MOWGLI<br />
                                             IT school</span></span>
                                          </h3>
                                          <div class="bt_bb_headline_subheadline">Twee echo park celiac YOLO dreamcatcher bushwick. Pitchfork fam tousled sustainable mumblecore tote bag trust fund tacos organic four dollar toast kickstarter pork belly.</div>
                                       </header>
                                       <div class="bt_bb_separator bt_bb_bottom_spacing_normal bt_bb_border_style_none"></div>
                                       <div class="bt_bb_button bt_bb_icon_position_left bt_bb_color_scheme_6 bt_bb_style_filled bt_bb_size_large bt_bb_width_inline bt_bb_shape_inherit bt_bb_align_inherit"><a href="about-us/index.html" target="_self" class="bt_bb_link" title="VIEW MORE"><span class="bt_bb_button_text">VIEW MORE</span></a></div>
                                       <div class="bt_bb_separator bt_bb_bottom_spacing_large bt_bb_border_style_none"></div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </section!-->

            <!--section id="bt_bb_section5fe49f520053e"  data-background_image_src="'http://tabula.bold-themes.com/sunny/wp-content/uploads/sites/2/2019/03/pattern.jpg'" class="bt_bb_section bt_bb_top_spacing_medium bt_bb_layout_boxed_1200 bt_bb_vertical_align_top btLazyLoadBackground bt_bb_background_image" style="background-image:url(http_/tabula.bold-themes.com/sunny/wp-content/plugins/bold-page-builder/img/blank.html);">
               <div class="bt_bb_port">
                  <div class="bt_bb_cell">
                     <div class="bt_bb_cell_inner">
                        <div class="bt_bb_row_wrapper">
                           <div  class="bt_bb_row" >
                              <div  class="bt_bb_column col-md-3 col-sm-6 col-ms-12 bt_bb_align_center bt_bb_vertical_align_top bt_bb_animation_fade_in animate bt_bb_padding_normal bt_bb_shape_inherit"  data-width="3">
                                 <div class="bt_bb_column_content">
                                    <div class="bt_bb_column_content_inner">
                                       <div class="bt_bb_counter_holder bt_bb_size_normal bt_bb_color_scheme_5">
                                          <div class="bt_bb_counter_icon"><span  data-ico-artistic="&#xf11f;" class="bt_bb_icon_holder"></span></div>
                                          <div class="bt_bb_counter_content"><span class="bt_bb_counter animate" data-digit-length="4"><span class="onedigit p4 d2" data-digit="2"><span class="n0">0</span><span class="n1">1</span><span class="n2">2</span><span class="n3">3</span><span class="n4">4</span><span class="n5">5</span><span class="n6">6</span><span class="n7">7</span><span class="n8">8</span><span class="n9">9</span><span class="n0">0</span></span><span class="onedigit p3 d0" data-digit="0"><span class="n0">0</span><span class="n1">1</span><span class="n2">2</span><span class="n3">3</span><span class="n4">4</span><span class="n5">5</span><span class="n6">6</span><span class="n7">7</span><span class="n8">8</span><span class="n9">9</span><span class="n0">0</span></span><span class="onedigit p2 d0" data-digit="0"><span class="n0">0</span><span class="n1">1</span><span class="n2">2</span><span class="n3">3</span><span class="n4">4</span><span class="n5">5</span><span class="n6">6</span><span class="n7">7</span><span class="n8">8</span><span class="n9">9</span><span class="n0">0</span></span><span class="onedigit p1 d3" data-digit="3"><span class="n0">0</span><span class="n1">1</span><span class="n2">2</span><span class="n3">3</span><span class="n4">4</span><span class="n5">5</span><span class="n6">6</span><span class="n7">7</span><span class="n8">8</span><span class="n9">9</span><span class="n0">0</span></span></span><span class="bt_bb_counter_text">YEAR FOUNDED</span></div>
                                       </div>
                                       <div class="bt_bb_separator bt_bb_bottom_spacing_medium bt_bb_border_style_none"></div>
                                    </div>
                                 </div>
                              </div>
                              <div  class="bt_bb_column col-md-3 col-sm-6 col-ms-12 bt_bb_align_center bt_bb_vertical_align_top bt_bb_animation_fade_in animate bt_bb_padding_normal bt_bb_shape_inherit"  data-width="3">
                                 <div class="bt_bb_column_content">
                                    <div class="bt_bb_column_content_inner">
                                       <div class="bt_bb_counter_holder bt_bb_size_normal bt_bb_color_scheme_5">
                                          <div class="bt_bb_counter_icon"><span  data-ico-artistic="&#xf104;" class="bt_bb_icon_holder"></span></div>
                                          <div class="bt_bb_counter_content"><span class="bt_bb_counter animate" data-digit-length="2"><span class="onedigit p2 d2" data-digit="2"><span class="n0">0</span><span class="n1">1</span><span class="n2">2</span><span class="n3">3</span><span class="n4">4</span><span class="n5">5</span><span class="n6">6</span><span class="n7">7</span><span class="n8">8</span><span class="n9">9</span><span class="n0">0</span></span><span class="onedigit p1 d4" data-digit="4"><span class="n0">0</span><span class="n1">1</span><span class="n2">2</span><span class="n3">3</span><span class="n4">4</span><span class="n5">5</span><span class="n6">6</span><span class="n7">7</span><span class="n8">8</span><span class="n9">9</span><span class="n0">0</span></span></span><span class="bt_bb_counter_text">TEACHERS</span></div>
                                       </div>
                                       <div class="bt_bb_separator bt_bb_bottom_spacing_medium bt_bb_border_style_none"></div>
                                    </div>
                                 </div>
                              </div>
                              <div  class="bt_bb_column col-md-3 col-sm-6 col-ms-12 bt_bb_align_center bt_bb_vertical_align_top bt_bb_animation_fade_in animate bt_bb_padding_normal bt_bb_shape_inherit"  data-width="3">
                                 <div class="bt_bb_column_content">
                                    <div class="bt_bb_column_content_inner">
                                       <div class="bt_bb_counter_holder bt_bb_size_normal bt_bb_color_scheme_5">
                                          <div class="bt_bb_counter_icon"><span  data-ico-artistic="&#xf119;" class="bt_bb_icon_holder"></span></div>
                                          <div class="bt_bb_counter_content"><span class="bt_bb_counter animate" data-digit-length="3"><span class="onedigit p3 d6" data-digit="6"><span class="n0">0</span><span class="n1">1</span><span class="n2">2</span><span class="n3">3</span><span class="n4">4</span><span class="n5">5</span><span class="n6">6</span><span class="n7">7</span><span class="n8">8</span><span class="n9">9</span><span class="n0">0</span></span><span class="onedigit p2 d4" data-digit="4"><span class="n0">0</span><span class="n1">1</span><span class="n2">2</span><span class="n3">3</span><span class="n4">4</span><span class="n5">5</span><span class="n6">6</span><span class="n7">7</span><span class="n8">8</span><span class="n9">9</span><span class="n0">0</span></span><span class="onedigit p1 d5" data-digit="5"><span class="n0">0</span><span class="n1">1</span><span class="n2">2</span><span class="n3">3</span><span class="n4">4</span><span class="n5">5</span><span class="n6">6</span><span class="n7">7</span><span class="n8">8</span><span class="n9">9</span><span class="n0">0</span></span></span><span class="bt_bb_counter_text">STUDENTS</span></div>
                                       </div>
                                       <div class="bt_bb_separator bt_bb_bottom_spacing_medium bt_bb_border_style_none"></div>
                                    </div>
                                 </div>
                              </div>
                              <div  class="bt_bb_column col-md-3 col-sm-6 col-ms-12 bt_bb_align_center bt_bb_vertical_align_top bt_bb_animation_fade_in animate bt_bb_padding_normal bt_bb_shape_inherit"  data-width="3">
                                 <div class="bt_bb_column_content">
                                    <div class="bt_bb_column_content_inner">
                                       <div class="bt_bb_counter_holder bt_bb_size_normal bt_bb_color_scheme_5">
                                          <div class="bt_bb_counter_icon"><span  data-ico-artistic="&#xf12c;" class="bt_bb_icon_holder"></span></div>
                                          <div class="bt_bb_counter_content"><span class="bt_bb_counter animate" data-digit-length="4"><span class="onedigit p4 d1" data-digit="1"><span class="n0">0</span><span class="n1">1</span><span class="n2">2</span><span class="n3">3</span><span class="n4">4</span><span class="n5">5</span><span class="n6">6</span><span class="n7">7</span><span class="n8">8</span><span class="n9">9</span><span class="n0">0</span></span><span class="onedigit p3 d6" data-digit="6"><span class="n0">0</span><span class="n1">1</span><span class="n2">2</span><span class="n3">3</span><span class="n4">4</span><span class="n5">5</span><span class="n6">6</span><span class="n7">7</span><span class="n8">8</span><span class="n9">9</span><span class="n0">0</span></span><span class="onedigit p2 d7" data-digit="7"><span class="n0">0</span><span class="n1">1</span><span class="n2">2</span><span class="n3">3</span><span class="n4">4</span><span class="n5">5</span><span class="n6">6</span><span class="n7">7</span><span class="n8">8</span><span class="n9">9</span><span class="n0">0</span></span><span class="onedigit p1 d9" data-digit="9"><span class="n0">0</span><span class="n1">1</span><span class="n2">2</span><span class="n3">3</span><span class="n4">4</span><span class="n5">5</span><span class="n6">6</span><span class="n7">7</span><span class="n8">8</span><span class="n9">9</span><span class="n0">0</span></span></span><span class="bt_bb_counter_text">CLASSES HELD</span></div>
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
            </section!-->
            <section class="bt_bb_section bt_bb_top_spacing_50 bt_bb_color_scheme_6 bt_bb_layout_boxed_1200 bt_bb_vertical_align_top" >
               <div class="bt_bb_port">
                  <div class="bt_bb_cell">
                     <div class="bt_bb_cell_inner">
                        <div class="bt_bb_row_wrapper">
                           <div  class="bt_bb_row bt_bb_column_gap_0 bt_bb_hidden_xs bt_bb_hidden_ms" >
                              <div  class="bt_bb_column col-md-9 col-ms-12 bt_bb_align_left bt_bb_vertical_align_middle bt_bb_animation_fade_in animate bt_bb_padding_normal"  data-width="9">
                                 <div class="bt_bb_column_content">
                                    <div class="bt_bb_column_content_inner">
                                       <header style="margin-left:430px;" class="bt_bb_headline bt_bb_dash_none bt_bb_size_normal bt_bb_align_inherit">
                                          <h4><span class="bt_bb_headline_content"><span><?= _online ?></span></span></h4>
                                       </header>
                                       <div class="bt_bb_separator bt_bb_bottom_spacing_50 bt_bb_border_style_none"></div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="bt_bb_row_wrapper">
                           <div  class="bt_bb_row bt_bb_hidden_sm bt_bb_hidden_md bt_bb_hidden_lg" >
                              <div  class="bt_bb_column col-md-12 col-ms-12 bt_bb_align_center bt_bb_vertical_align_middle bt_bb_animation_fade_in animate bt_bb_padding_normal"  data-width="12">
                                 <div class="bt_bb_column_content">
                                    <div class="bt_bb_column_content_inner">
                                       <header class="bt_bb_headline bt_bb_dash_none bt_bb_size_normal bt_bb_align_inherit">
                                          <h4><span class="bt_bb_headline_content"><span><?= _online ?></span></span></h4>
                                       </header>
                                       <div class="bt_bb_separator bt_bb_bottom_spacing_50 bt_bb_border_style_none"></div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </section>
			
            <section id="bt_bb_section5fe49f5200e3f"  class="bt_bb_section bt_bb_top_spacing_large bt_bb_bottom_spacing_medium bt_bb_layout_boxed_900 bt_bb_vertical_align_top" style="background-color: cornsilk;" >
               <div class="bt_bb_port">
                  <div class="bt_bb_cell">
                     <div class="bt_bb_cell_inner">
                        <div class="bt_bb_row_wrapper">
                           <div  class="bt_bb_row" >
                              <div  class="bt_bb_column col-md-12 col-ms-12 bt_bb_align_left bt_bb_vertical_align_top bt_bb_padding_normal"  data-width="12">
                                 <div class="bt_bb_column_content">
                                    <div class="bt_bb_column_content_inner">
                                       <div class="bt_bb_step_line">
                                          <div class="bt_bb_inner_step">
                                             <div class="bt_bb_inner_step_content bt_bb_animation_fade_in animate">
                                                <div class="bt_bb_inner_step_content_holder">
                                                   <h3 class="bt_bb_inner_step_title">Web Design & Development</h3>
                                                   <div class="bt_bb_inner_step_text">Web development refers to building, creating, and an maintaining websites. It includes aspects such as web design, web publishing, web programming, and database management.</div>
                                                   <div class="bt_bb_inner_step_inner_content">
                                                      <div class="bt_bb_separator bt_bb_bottom_spacing_normal bt_bb_border_style_none"></div>
                                                      <div class="bt_bb_button bt_bb_icon_position_right bt_bb_color_scheme_3 bt_bb_style_clean bt_bb_size_medium bt_bb_width_inline bt_bb_shape_inherit bt_bb_align_inherit"><a href="courses/view/web_design_development" target="_self" class="bt_bb_link" title="VIEW MORE"><span class="bt_bb_button_text">VIEW MORE</span><span  data-ico-dripicons="&#xe90c;" class="bt_bb_icon_holder"></span></a></div>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="bt_bb_inner_step_image bt_bb_animation_fade_in animate">
                                                <div class="bt_bb_image"><span><img src="include/web.gif"  style="border-radius:50%;" title="info_01" alt="http://tabula.bold-themes.com/sunny/wp-content/uploads/sites/2/2019/03/info_01.png"></span></div>
                                             </div>
                                          </div>
                                          <div class="bt_bb_inner_step">
                                             <div class="bt_bb_inner_step_content bt_bb_animation_fade_in animate">
                                                <div class="bt_bb_inner_step_content_holder">
                                                   <h3 class="bt_bb_inner_step_title">Graphics Design</h3>
                                                   <div class="bt_bb_inner_step_text">Graphic design is a craft where professionals create visual content to communicate messages. By applying visual hierarchy and page layout techniques, designers use typography and pictures to meet users' specific needs and focus on the logic of displaying elements in interactive designs, to optimize the user experience.</div>
                                                   <div class="bt_bb_inner_step_inner_content">
                                                      <div class="bt_bb_separator bt_bb_bottom_spacing_normal bt_bb_border_style_none"></div>
                                                      <div class="bt_bb_button bt_bb_icon_position_right bt_bb_color_scheme_3 bt_bb_style_clean bt_bb_size_medium bt_bb_width_inline bt_bb_shape_inherit bt_bb_align_inherit">
                                                      <a href="courses/view/graphics_design" target="_self" class="bt_bb_link" title="VIEW MORE"><span class="bt_bb_button_text">VIEW MORE</span><span  data-ico-dripicons="&#xe90c;" class="bt_bb_icon_holder"></span></a></div>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="bt_bb_inner_step_image bt_bb_animation_fade_in animate">
                                                <div class="bt_bb_image"><span><img src="include/gd.gif" style="border-radius:50%;" title="info_02" alt="http://tabula.bold-themes.com/sunny/wp-content/uploads/sites/2/2019/03/info_02.png"></span></div>
                                             </div>
                                          </div>
                                          <div class="bt_bb_inner_step">
                                             <div class="bt_bb_inner_step_content bt_bb_animation_fade_in animate">
                                                <div class="bt_bb_inner_step_content_holder">
                                                   <h3 class="bt_bb_inner_step_title">Digital Marketing</h3>
                                                   <div class="bt_bb_inner_step_text">Digital marketing is the use of the Internet to reach consumers. Digital marketing is a broad field, including attracting customers via email, content marketing, search platforms, social media, and more.</div>
                                                   <div class="bt_bb_inner_step_inner_content">
                                                      <div class="bt_bb_separator bt_bb_bottom_spacing_normal bt_bb_border_style_none"></div>
                                                      <div class="bt_bb_button bt_bb_icon_position_right bt_bb_color_scheme_3 bt_bb_style_clean bt_bb_size_medium bt_bb_width_inline bt_bb_shape_inherit bt_bb_align_inherit">
                                                      <a href="courses/view/digital_marketing" target="_self" class="bt_bb_link" title="VIEW MORE"><span class="bt_bb_button_text">VIEW MORE</span><span  data-ico-dripicons="&#xe90c;" class="bt_bb_icon_holder"></span></a></div>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="bt_bb_inner_step_image bt_bb_animation_fade_in animate">
                                                <div class="bt_bb_image"><span><img src="include/dm.gif" style="border-radius:50%;" title="info_03" alt="http://tabula.bold-themes.com/sunny/wp-content/uploads/sites/2/2019/03/info_03.png"></span></div>
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
            </section>
            
            
        
            <!--section id="bt_bb_section5fe49f5206dc7"  class="bt_bb_section bt_bb_layout_wide bt_bb_vertical_align_top" >
               <div class="bt_bb_port">
                  <div class="bt_bb_cell">
                     <div class="bt_bb_cell_inner">
                        <div class="bt_bb_row_wrapper">
                           <div  class="bt_bb_row" >
                              <div  class="bt_bb_column col-md-12 col-ms-12 bt_bb_align_left bt_bb_vertical_align_top bt_bb_animation_fade_in animate bt_bb_padding_normal"  data-width="12">
                                 <div class="bt_bb_column_content">
                                    <div class="bt_bb_column_content_inner">
                                       <div class="bt_bb_masonry_image_grid bt_bb_grid_container bt_bb_columns_4 bt_bb_gap_no_gap" data-columns="4">
                                          <div class="bt_bb_masonry_post_image_content" data-columns="4">
                                             <div class="bt_bb_grid_sizer"></div>
                                             <div class="bt_bb_grid_item bt_bb_tile_format11" data-hw="1" data-src="http://tabula.bold-themes.com/sunny/wp-content/uploads/sites/2/2019/03/gallery_06.jpg" data-src-full="http://tabula.bold-themes.com/sunny/wp-content/uploads/sites/2/2019/03/gallery_06.jpg" data-title="gallery_06">
                                                <div class="bt_bb_grid_item_inner" data-hw="1" >
                                                   <div class="bt_bb_grid_item_inner_image"></div>
                                                   <div class="bt_bb_grid_item_inner_content"></div>
                                                </div>
                                             </div>
                                             <div class="bt_bb_grid_item bt_bb_tile_format11" data-hw="1" data-src="http://tabula.bold-themes.com/sunny/wp-content/uploads/sites/2/2019/03/gallery_04.jpg" data-src-full="http://tabula.bold-themes.com/sunny/wp-content/uploads/sites/2/2019/03/gallery_04.jpg" data-title="gallery_04">
                                                <div class="bt_bb_grid_item_inner" data-hw="1" >
                                                   <div class="bt_bb_grid_item_inner_image"></div>
                                                   <div class="bt_bb_grid_item_inner_content"></div>
                                                </div>
                                             </div>
                                             <div class="bt_bb_grid_item bt_bb_tile_format11" data-hw="1.4992503748126" data-src="http://tabula.bold-themes.com/sunny/wp-content/uploads/sites/2/2019/03/gallery_03.jpg" data-src-full="http://tabula.bold-themes.com/sunny/wp-content/uploads/sites/2/2019/03/gallery_03.jpg" data-title="gallery_03">
                                                <div class="bt_bb_grid_item_inner" data-hw="1.4992503748126" >
                                                   <div class="bt_bb_grid_item_inner_image"></div>
                                                   <div class="bt_bb_grid_item_inner_content"></div>
                                                </div>
                                             </div>
                                             <div class="bt_bb_grid_item bt_bb_tile_format11" data-hw="1" data-src="http://tabula.bold-themes.com/sunny/wp-content/uploads/sites/2/2019/03/gallery_01.jpg" data-src-full="http://tabula.bold-themes.com/sunny/wp-content/uploads/sites/2/2019/03/gallery_01.jpg" data-title="gallery_01">
                                                <div class="bt_bb_grid_item_inner" data-hw="1" >
                                                   <div class="bt_bb_grid_item_inner_image"></div>
                                                   <div class="bt_bb_grid_item_inner_content"></div>
                                                </div>
                                             </div>
                                             <div class="bt_bb_grid_item bt_bb_tile_format11" data-hw="0.5" data-src="http://tabula.bold-themes.com/sunny/wp-content/uploads/sites/2/2019/03/gallery_05.jpg" data-src-full="http://tabula.bold-themes.com/sunny/wp-content/uploads/sites/2/2019/03/gallery_05.jpg" data-title="gallery_05">
                                                <div class="bt_bb_grid_item_inner" data-hw="0.5" >
                                                   <div class="bt_bb_grid_item_inner_image"></div>
                                                   <div class="bt_bb_grid_item_inner_content"></div>
                                                </div>
                                             </div>
                                             <div class="bt_bb_grid_item bt_bb_tile_format11" data-hw="0.502" data-src="http://tabula.bold-themes.com/sunny/wp-content/uploads/sites/2/2019/03/gallery_07.jpg" data-src-full="http://tabula.bold-themes.com/sunny/wp-content/uploads/sites/2/2019/03/gallery_07.jpg" data-title="gallery_07">
                                                <div class="bt_bb_grid_item_inner" data-hw="0.502" >
                                                   <div class="bt_bb_grid_item_inner_image"></div>
                                                   <div class="bt_bb_grid_item_inner_content"></div>
                                                </div>
                                             </div>
                                             <div class="bt_bb_grid_item bt_bb_tile_format11" data-hw="0.5" data-src="http://tabula.bold-themes.com/sunny/wp-content/uploads/sites/2/2019/03/gallery_02.jpg" data-src-full="http://tabula.bold-themes.com/sunny/wp-content/uploads/sites/2/2019/03/gallery_02.jpg" data-title="gallery_02">
                                                <div class="bt_bb_grid_item_inner" data-hw="0.5" >
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

    <?php require_once('include/footer_include.php'); ?>
    
   <footer class="btLightSkin"></footer>
   
</div>
<!-- /btSiteFooter -->
</div><!-- /pageWrap -->
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
<script src="wp-content/cache/minify/2/dd18c.js"></script>
</body>
<!-- Mirrored from tabula.bold-themes.com/sunny/ by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 31 Dec 2020 06:55:54 GMT -->
</html>
<!--
   Performance optimized by W3 Total Cache. Learn more: https://www.boldgrid.com/w3-total-cache/
   
   Page Caching using disk: enhanced 
   Minified using disk
   
   Served from: tabula.bold-themes.com @ 2020-12-24 14:01:54 by W3 Total Cache
   -->