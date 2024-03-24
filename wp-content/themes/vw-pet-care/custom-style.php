<?php

	$vw_pet_care_custom_css= "";


	/*---------------------------Width Layout -------------------*/

	$vw_pet_care_theme_lay = get_theme_mod( 'vw_pet_care_width_option','Full Width');
    if($vw_pet_care_theme_lay == 'Boxed'){
		$vw_pet_care_custom_css .='body{';
			$vw_pet_care_custom_css .='max-width: 1140px; width: 100%; margin-right: auto; margin-left: auto;';
		$vw_pet_care_custom_css .='}';
		$vw_pet_care_custom_css .='.scrollup i{';
			$vw_pet_care_custom_css .='right: 100px;';
		$vw_pet_care_custom_css .='}';
		$vw_pet_care_custom_css .='.row.outer-logo{';
			$vw_pet_care_custom_css .='margin-left: 0px;';
		$vw_pet_care_custom_css .='}';
	}else if($vw_pet_care_theme_lay == 'Wide Width'){
		$vw_pet_care_custom_css .='body{';
			$vw_pet_care_custom_css .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';
		$vw_pet_care_custom_css .='}';
		$vw_pet_care_custom_css .='.scrollup i{';
			$vw_pet_care_custom_css .='right: 30px;';
		$vw_pet_care_custom_css .='}';
		$vw_pet_care_custom_css .='.row.outer-logo{';
			$vw_pet_care_custom_css .='margin-left: 0px;';
		$vw_pet_care_custom_css .='}';
	}else if($vw_pet_care_theme_lay == 'Full Width'){
		$vw_pet_care_custom_css .='body{';
			$vw_pet_care_custom_css .='max-width: 100%;';
		$vw_pet_care_custom_css .='}';
	}

	/*----------------Responsive Media -----------------------*/

	$vw_pet_care_resp_slider = get_theme_mod( 'vw_pet_care_resp_slider_hide_show',true);
	if($vw_pet_care_resp_slider == true && get_theme_mod( 'vw_pet_care_slider_hide_show', false) == false){
    	$vw_pet_care_custom_css .='#slider{';
			$vw_pet_care_custom_css .='display:none;';
		$vw_pet_care_custom_css .='} ';
	}
    if($vw_pet_care_resp_slider == true){
    	$vw_pet_care_custom_css .='@media screen and (max-width:575px) {';
		$vw_pet_care_custom_css .='#slider{';
			$vw_pet_care_custom_css .='display:block;';
		$vw_pet_care_custom_css .='} }';
	}else if($vw_pet_care_resp_slider == false){
		$vw_pet_care_custom_css .='@media screen and (max-width:575px) {';
		$vw_pet_care_custom_css .='#slider{';
			$vw_pet_care_custom_css .='display:none;';
		$vw_pet_care_custom_css .='} }';
		$vw_pet_care_custom_css .='@media screen and (max-width:575px){';
		$vw_pet_care_custom_css .='.page-template-custom-home-page.admin-bar .homepageheader{';
			$vw_pet_care_custom_css .='margin-top: 45px;';
		$vw_pet_care_custom_css .='} }';
	}

	$vw_pet_care_resp_sidebar = get_theme_mod( 'vw_pet_care_sidebar_hide_show',true);
    if($vw_pet_care_resp_sidebar == true){
    	$vw_pet_care_custom_css .='@media screen and (max-width:575px) {';
		$vw_pet_care_custom_css .='#sidebar{';
			$vw_pet_care_custom_css .='display:block;';
		$vw_pet_care_custom_css .='} }';
	}else if($vw_pet_care_resp_sidebar == false){
		$vw_pet_care_custom_css .='@media screen and (max-width:575px) {';
		$vw_pet_care_custom_css .='#sidebar{';
			$vw_pet_care_custom_css .='display:none;';
		$vw_pet_care_custom_css .='} }';
	}

	$vw_pet_care_resp_scroll_top = get_theme_mod( 'vw_pet_care_resp_scroll_top_hide_show',true);
	if($vw_pet_care_resp_scroll_top == true && get_theme_mod( 'vw_pet_care_hide_show_scroll',true) == false){
    	$vw_pet_care_custom_css .='.scrollup i{';
			$vw_pet_care_custom_css .='visibility:hidden !important;';
		$vw_pet_care_custom_css .='} ';
	}
    if($vw_pet_care_resp_scroll_top == true){
    	$vw_pet_care_custom_css .='@media screen and (max-width:575px) {';
		$vw_pet_care_custom_css .='.scrollup i{';
			$vw_pet_care_custom_css .='visibility:visible !important;';
		$vw_pet_care_custom_css .='} }';
	}else if($vw_pet_care_resp_scroll_top == false){
		$vw_pet_care_custom_css .='@media screen and (max-width:575px){';
		$vw_pet_care_custom_css .='.scrollup i{';
			$vw_pet_care_custom_css .='visibility:hidden !important;';
		$vw_pet_care_custom_css .='} }';
	}

	/*---------------------------Slider Height ------------*/

	$vw_pet_care_slider_height = get_theme_mod('vw_pet_care_slider_height');
	if($vw_pet_care_slider_height != false){
		$vw_pet_care_custom_css .='#slider img{';
			$vw_pet_care_custom_css .='height: '.esc_attr($vw_pet_care_slider_height).';';
		$vw_pet_care_custom_css .='}';
	}

/*------------------ Slider Opacity -------------------*/

	$vw_pet_care_theme_lay = get_theme_mod( 'vw_pet_care_slider_opacity_color','');
	if($vw_pet_care_theme_lay == '0'){
		$vw_pet_care_custom_css .='#slider img{';
			$vw_pet_care_custom_css .='opacity:0';
		$vw_pet_care_custom_css .='}';
		}else if($vw_pet_care_theme_lay == '0.1'){
		$vw_pet_care_custom_css .='#slider img{';
			$vw_pet_care_custom_css .='opacity:0.1';
		$vw_pet_care_custom_css .='}';
		}else if($vw_pet_care_theme_lay == '0.2'){
		$vw_pet_care_custom_css .='#slider img{';
			$vw_pet_care_custom_css .='opacity:0.2';
		$vw_pet_care_custom_css .='}';
		}else if($vw_pet_care_theme_lay == '0.3'){
		$vw_pet_care_custom_css .='#slider img{';
			$vw_pet_care_custom_css .='opacity:0.3';
		$vw_pet_care_custom_css .='}';
		}else if($vw_pet_care_theme_lay == '0.4'){
		$vw_pet_care_custom_css .='#slider img{';
			$vw_pet_care_custom_css .='opacity:0.4';
		$vw_pet_care_custom_css .='}';
		}else if($vw_pet_care_theme_lay == '0.5'){
		$vw_pet_care_custom_css .='#slider img{';
			$vw_pet_care_custom_css .='opacity:0.5';
		$vw_pet_care_custom_css .='}';
		}else if($vw_pet_care_theme_lay == '0.6'){
		$vw_pet_care_custom_css .='#slider img{';
			$vw_pet_care_custom_css .='opacity:0.6';
		$vw_pet_care_custom_css .='}';
		}else if($vw_pet_care_theme_lay == '0.7'){
		$vw_pet_care_custom_css .='#slider img{';
			$vw_pet_care_custom_css .='opacity:0.7';
		$vw_pet_care_custom_css .='}';
		}else if($vw_pet_care_theme_lay == '0.8'){
		$vw_pet_care_custom_css .='#slider img{';
			$vw_pet_care_custom_css .='opacity:0.8';
		$vw_pet_care_custom_css .='}';
		}else if($vw_pet_care_theme_lay == '0.9'){
		$vw_pet_care_custom_css .='#slider img{';
			$vw_pet_care_custom_css .='opacity:0.9';
		$vw_pet_care_custom_css .='}';
		}

	/*---------------------- Slider Image Overlay ------------------------*/

	$vw_pet_care_slider_image_overlay = get_theme_mod('vw_pet_care_slider_image_overlay', true);
	if($vw_pet_care_slider_image_overlay == false){
		$vw_pet_care_custom_css .='#slider img{';
			$vw_pet_care_custom_css .='opacity:1;';
		$vw_pet_care_custom_css .='}';
	}

	$vw_pet_care_slider_image_overlay_color = get_theme_mod('vw_pet_care_slider_image_overlay_color', true);
	if($vw_pet_care_slider_image_overlay_color != false){
		$vw_pet_care_custom_css .='#slider{';
			$vw_pet_care_custom_css .='background-color: '.esc_attr($vw_pet_care_slider_image_overlay_color).';';
		$vw_pet_care_custom_css .='}';
	}

	/*------------- Slider Content Padding Settings ------------------*/

	$vw_pet_care_slider_content_padding_top_bottom = get_theme_mod('vw_pet_care_slider_content_padding_top_bottom');
	$vw_pet_care_slider_content_padding_left_right = get_theme_mod('vw_pet_care_slider_content_padding_left_right');
	if($vw_pet_care_slider_content_padding_top_bottom != false || $vw_pet_care_slider_content_padding_left_right != false){
		$vw_pet_care_custom_css .='#slider .carousel-caption{';
			$vw_pet_care_custom_css .='top: '.esc_attr($vw_pet_care_slider_content_padding_top_bottom).'; bottom: '.esc_attr($vw_pet_care_slider_content_padding_top_bottom).';left: '.esc_attr($vw_pet_care_slider_content_padding_left_right).';right: '.esc_attr($vw_pet_care_slider_content_padding_left_right).';';
		$vw_pet_care_custom_css .='}';
	}

	/*-------------- Copyright Alignment ----------------*/

	$vw_pet_care_copyright_alingment = get_theme_mod('vw_pet_care_copyright_alingment');
	if($vw_pet_care_copyright_alingment != false){
		$vw_pet_care_custom_css .='.copyright p{';
			$vw_pet_care_custom_css .='text-align: '.esc_attr($vw_pet_care_copyright_alingment).';';
		$vw_pet_care_custom_css .='}';
	}

	/*------------- Preloader Background Color  -------------------*/

	$vw_pet_care_preloader_bg_color = get_theme_mod('vw_pet_care_preloader_bg_color');
	if($vw_pet_care_preloader_bg_color != false){
		$vw_pet_care_custom_css .='#preloader{';
			$vw_pet_care_custom_css .='background-color: '.esc_attr($vw_pet_care_preloader_bg_color).';';
		$vw_pet_care_custom_css .='}';
	}

	$vw_pet_care_preloader_border_color = get_theme_mod('vw_pet_care_preloader_border_color');
	if($vw_pet_care_preloader_border_color != false){
		$vw_pet_care_custom_css .='.loader-line{';
			$vw_pet_care_custom_css .='border-color: '.esc_attr($vw_pet_care_preloader_border_color).'!important;';
		$vw_pet_care_custom_css .='}';
	}

	$vw_pet_care_preloader_bg_img = get_theme_mod('vw_pet_care_preloader_bg_img');
	if($vw_pet_care_preloader_bg_img != false){
		$vw_pet_care_custom_css .='#preloader{';
			$vw_pet_care_custom_css .='background: url('.esc_attr($vw_pet_care_preloader_bg_img).');-webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover;';
		$vw_pet_care_custom_css .='}';
	}

	// banner background img

	$vw_pet_care_banner_image = get_theme_mod('vw_pet_care_banner_image');
	if($vw_pet_care_banner_image != false){
		$vw_pet_care_custom_css .='#slider{';
			$vw_pet_care_custom_css .='background: url('.esc_attr($vw_pet_care_banner_image).')no-repeat; background-size: 100%;height: 800px;';
		$vw_pet_care_custom_css .='}';
	}

	/*--------------------------- Slider -------------------*/

	$vw_pet_care_slider = get_theme_mod('vw_pet_care_slider_hide_show');
	if($vw_pet_care_slider == false){
		$vw_pet_care_custom_css .='.page-template-custom-home-page .home-page-header{';
			$vw_pet_care_custom_css .='position: static;';
		$vw_pet_care_custom_css .='}';
	}

	/*-------------- Copyright Alignment ----------------*/

	$vw_pet_care_copyright_alingment = get_theme_mod('vw_pet_care_copyright_alingment');
	if($vw_pet_care_copyright_alingment != false){
		$vw_pet_care_custom_css .='.copyright p{';
			$vw_pet_care_custom_css .='text-align: '.esc_attr($vw_pet_care_copyright_alingment).';';
		$vw_pet_care_custom_css .='}';
	}

	$vw_pet_care_copyright_background_color = get_theme_mod('vw_pet_care_copyright_background_color');
	if($vw_pet_care_copyright_background_color != false){
		$vw_pet_care_custom_css .='#footer-2{';
			$vw_pet_care_custom_css .='background-color: '.esc_attr($vw_pet_care_copyright_background_color).';';
		$vw_pet_care_custom_css .='}';
	}

	$vw_pet_care_footer_background_image = get_theme_mod('vw_pet_care_footer_background_image');
	if($vw_pet_care_footer_background_image != false){
		$vw_pet_care_custom_css .='#footer{';
			$vw_pet_care_custom_css .='background: url('.esc_attr($vw_pet_care_footer_background_image).')no-repeat;background-size:cover';
		$vw_pet_care_custom_css .='}';
	}

	$vw_pet_care_theme_lay = get_theme_mod( 'vw_pet_care_img_footer','scroll');
	if($vw_pet_care_theme_lay == 'fixed'){
		$vw_pet_care_custom_css .='#footer{';
			$vw_pet_care_custom_css .='background-attachment: fixed !important; background-position: center !important;';
		$vw_pet_care_custom_css .='}';
	}elseif ($vw_pet_care_theme_lay == 'scroll'){
		$vw_pet_care_custom_css .='#footer{';
			$vw_pet_care_custom_css .='background-attachment: scroll !important; background-position: center !important;';
		$vw_pet_care_custom_css .='}';
	}

	$vw_pet_care_footer_img_position = get_theme_mod('vw_pet_care_footer_img_position','center center');
	if($vw_pet_care_footer_img_position != false){
		$vw_pet_care_custom_css .='#footer{';
			$vw_pet_care_custom_css .='background-position: '.esc_attr($vw_pet_care_footer_img_position).'!important;';
		$vw_pet_care_custom_css .='}';
	}

	$vw_pet_care_footer_widgets_heading = get_theme_mod( 'vw_pet_care_footer_widgets_heading','Left');
    if($vw_pet_care_footer_widgets_heading == 'Left'){
		$vw_pet_care_custom_css .='#footer h3, #footer .wp-block-search .wp-block-search__label{';
		$vw_pet_care_custom_css .='text-align: left;';
		$vw_pet_care_custom_css .='}';
	}else if($vw_pet_care_footer_widgets_heading == 'Center'){
		$vw_pet_care_custom_css .='#footer h3, #footer .wp-block-search .wp-block-search__label{';
			$vw_pet_care_custom_css .='text-align: center;';
		$vw_pet_care_custom_css .='}';
	}else if($vw_pet_care_footer_widgets_heading == 'Right'){
		$vw_pet_care_custom_css .='#footer h3, #footer .wp-block-search .wp-block-search__label{';
			$vw_pet_care_custom_css .='text-align: right;';
		$vw_pet_care_custom_css .='}';
	}

	$vw_pet_care_footer_widgets_content = get_theme_mod( 'vw_pet_care_footer_widgets_content','Left');
    if($vw_pet_care_footer_widgets_content == 'Left'){
		$vw_pet_care_custom_css .='#footer .widget{';
		$vw_pet_care_custom_css .='text-align: left;';
		$vw_pet_care_custom_css .='}';
	}else if($vw_pet_care_footer_widgets_content == 'Center'){
		$vw_pet_care_custom_css .='#footer .widget{';
			$vw_pet_care_custom_css .='text-align: center;';
		$vw_pet_care_custom_css .='}';
	}else if($vw_pet_care_footer_widgets_content == 'Right'){
		$vw_pet_care_custom_css .='#footer .widget{';
			$vw_pet_care_custom_css .='text-align: right;';
		$vw_pet_care_custom_css .='}';
	}

	$vw_pet_care_copyright_font_size = get_theme_mod('vw_pet_care_copyright_font_size');
	if($vw_pet_care_copyright_font_size != false){
		$vw_pet_care_custom_css .='#footer-2 a, #footer-2 p{';
			$vw_pet_care_custom_css .='font-size: '.esc_attr($vw_pet_care_copyright_font_size).';';
		$vw_pet_care_custom_css .='}';
	}

	$vw_pet_care_copyright_alingment = get_theme_mod('vw_pet_care_copyright_alingment');
	if($vw_pet_care_copyright_alingment != false){
		$vw_pet_care_custom_css .='#footer-2 p{';
			$vw_pet_care_custom_css .='text-align: '.esc_attr($vw_pet_care_copyright_alingment).';';
		$vw_pet_care_custom_css .='}';
	}
	$vw_pet_care_copyright_padding_top_bottom = get_theme_mod('vw_pet_care_copyright_padding_top_bottom');
	if($vw_pet_care_copyright_padding_top_bottom != false){
		$vw_pet_care_custom_css .='#footer-2{';
			$vw_pet_care_custom_css .='padding-top: '.esc_attr($vw_pet_care_copyright_padding_top_bottom).'; padding-bottom: '.esc_attr($vw_pet_care_copyright_padding_top_bottom).';';
		$vw_pet_care_custom_css .='}';
	}

	$vw_pet_care_footer_padding = get_theme_mod('vw_pet_care_footer_padding');
	if($vw_pet_care_footer_padding != false){
		$vw_pet_care_custom_css .='#footer{';
			$vw_pet_care_custom_css .='padding: '.esc_attr($vw_pet_care_footer_padding).' 0;';
		$vw_pet_care_custom_css .='}';
	}

	$vw_pet_care_footer_icon = get_theme_mod('vw_pet_care_footer_icon');
	if($vw_pet_care_footer_icon == false){
		$vw_pet_care_custom_css .='#footer-2 p{';
			$vw_pet_care_custom_css .='width:100%; text-align:center; float:none;';
		$vw_pet_care_custom_css .='}';
	}

	/*----------------Scroll to top Settings ------------------*/

	$vw_pet_care_scroll_to_top_font_size = get_theme_mod('vw_pet_care_scroll_to_top_font_size');
	if($vw_pet_care_scroll_to_top_font_size != false){
		$vw_pet_care_custom_css .='.scrollup i{';
			$vw_pet_care_custom_css .='font-size: '.esc_attr($vw_pet_care_scroll_to_top_font_size).';';
		$vw_pet_care_custom_css .='}';
	}

	$vw_pet_care_scroll_to_top_padding = get_theme_mod('vw_pet_care_scroll_to_top_padding');
	$vw_pet_care_scroll_to_top_padding = get_theme_mod('vw_pet_care_scroll_to_top_padding');
	if($vw_pet_care_scroll_to_top_padding != false){
		$vw_pet_care_custom_css .='.scrollup i{';
			$vw_pet_care_custom_css .='padding-top: '.esc_attr($vw_pet_care_scroll_to_top_padding).';padding-bottom: '.esc_attr($vw_pet_care_scroll_to_top_padding).';';
		$vw_pet_care_custom_css .='}';
	}

	$vw_pet_care_scroll_to_top_width = get_theme_mod('vw_pet_care_scroll_to_top_width');
	if($vw_pet_care_scroll_to_top_width != false){
		$vw_pet_care_custom_css .='.scrollup i{';
			$vw_pet_care_custom_css .='width: '.esc_attr($vw_pet_care_scroll_to_top_width).';';
		$vw_pet_care_custom_css .='}';
	}

	$vw_pet_care_scroll_to_top_height = get_theme_mod('vw_pet_care_scroll_to_top_height');
	if($vw_pet_care_scroll_to_top_height != false){
		$vw_pet_care_custom_css .='.scrollup i{';
			$vw_pet_care_custom_css .='height: '.esc_attr($vw_pet_care_scroll_to_top_height).';';
		$vw_pet_care_custom_css .='}';
	}

	$vw_pet_care_scroll_to_top_border_radius = get_theme_mod('vw_pet_care_scroll_to_top_border_radius');
	if($vw_pet_care_scroll_to_top_border_radius != false){
		$vw_pet_care_custom_css .='.scrollup i{';
			$vw_pet_care_custom_css .='border-radius: '.esc_attr($vw_pet_care_scroll_to_top_border_radius).'px;';
		$vw_pet_care_custom_css .='}';
	}

	/*------------------ Logo  -------------------*/

	$vw_pet_care_logo_padding = get_theme_mod('vw_pet_care_logo_padding');
	if($vw_pet_care_logo_padding != false){
		$vw_pet_care_custom_css .='.logo{';
			$vw_pet_care_custom_css .='padding: '.esc_attr($vw_pet_care_logo_padding).' !important;';
		$vw_pet_care_custom_css .='}';
	}

	$vw_pet_care_logo_margin = get_theme_mod('vw_pet_care_logo_margin');
	if($vw_pet_care_logo_margin != false){
		$vw_pet_care_custom_css .='.logo{';
			$vw_pet_care_custom_css .='margin: '.esc_attr($vw_pet_care_logo_margin).';';
		$vw_pet_care_custom_css .='}';
	}

	// Site title Font Size
	$vw_pet_care_site_title_font_size = get_theme_mod('vw_pet_care_site_title_font_size');
	if($vw_pet_care_site_title_font_size != false){
		$vw_pet_care_custom_css .='.logo p.site-title, .logo h1{';
			$vw_pet_care_custom_css .='font-size: '.esc_attr($vw_pet_care_site_title_font_size).';';
		$vw_pet_care_custom_css .='}';
	}

	// Site tagline Font Size
	$vw_pet_care_site_tagline_font_size = get_theme_mod('vw_pet_care_site_tagline_font_size');
	if($vw_pet_care_site_tagline_font_size != false){
		$vw_pet_care_custom_css .='.logo p.site-description{';
			$vw_pet_care_custom_css .='font-size: '.esc_attr($vw_pet_care_site_tagline_font_size).';';
		$vw_pet_care_custom_css .='}';
	}

	$vw_pet_care_site_title_color = get_theme_mod('vw_pet_care_site_title_color');
	if($vw_pet_care_site_title_color != false){
		$vw_pet_care_custom_css .='p.site-title a, .logo h1 a{';
			$vw_pet_care_custom_css .='color: '.esc_attr($vw_pet_care_site_title_color).'!important;';
		$vw_pet_care_custom_css .='}';
	}

	$vw_pet_care_site_tagline_color = get_theme_mod('vw_pet_care_site_tagline_color');
	if($vw_pet_care_site_tagline_color != false){
		$vw_pet_care_custom_css .='.logo p.site-description{';
			$vw_pet_care_custom_css .='color: '.esc_attr($vw_pet_care_site_tagline_color).';';
		$vw_pet_care_custom_css .='}';
	}

	$vw_pet_care_logo_width = get_theme_mod('vw_pet_care_logo_width');
	if($vw_pet_care_logo_width != false){
		$vw_pet_care_custom_css .='.logo img{';
			$vw_pet_care_custom_css .='width: '.esc_attr($vw_pet_care_logo_width).';';
		$vw_pet_care_custom_css .='}';
	}

	$vw_pet_care_logo_height = get_theme_mod('vw_pet_care_logo_height');
	if($vw_pet_care_logo_height != false){
		$vw_pet_care_custom_css .='.logo img{';
			$vw_pet_care_custom_css .='height: '.esc_attr($vw_pet_care_logo_height).';';
		$vw_pet_care_custom_css .='}';
	}

	// Header Background Color
	$vw_pet_care_header_background_color = get_theme_mod('vw_pet_care_header_background_color');
	if($vw_pet_care_header_background_color != false){
		$vw_pet_care_custom_css .='.page-template-custom-home-page .home-page-header, .home-page-header{';
			$vw_pet_care_custom_css .='background-color: '.esc_attr($vw_pet_care_header_background_color).';';
		$vw_pet_care_custom_css .='}';
	}

	$vw_pet_care_header_img_position = get_theme_mod('vw_pet_care_header_img_position','center top');
	if($vw_pet_care_header_img_position != false){
		$vw_pet_care_custom_css .='.page-template-custom-home-page .home-page-header, .home-page-header{';
			$vw_pet_care_custom_css .='background-position: '.esc_attr($vw_pet_care_header_img_position).'!important;';
		$vw_pet_care_custom_css .='}';
	}

	/*---------------------------Blog Layout -------------------*/

	$vw_pet_care_theme_lay = get_theme_mod( 'vw_pet_care_blog_layout_option','Default');
    if($vw_pet_care_theme_lay == 'Default'){
		$vw_pet_care_custom_css .='.post-main-box{';
			$vw_pet_care_custom_css .='';
		$vw_pet_care_custom_css .='}';
	}else if($vw_pet_care_theme_lay == 'Center'){
		$vw_pet_care_custom_css .='.post-main-box, .post-main-box h2, .post-info, .new-text p, .content-bttn{';
			$vw_pet_care_custom_css .='text-align:center;';
		$vw_pet_care_custom_css .='}';
		$vw_pet_care_custom_css .='.post-info{';
			$vw_pet_care_custom_css .='margin-top:10px;';
		$vw_pet_care_custom_css .='}';
		$vw_pet_care_custom_css .='.post-info hr{';
			$vw_pet_care_custom_css .='margin:15px auto;';
		$vw_pet_care_custom_css .='}';
	}else if($vw_pet_care_theme_lay == 'Left'){
		$vw_pet_care_custom_css .='.post-main-box, .post-main-box h2, .post-info, .new-text p, .content-bttn, #our-services p{';
			$vw_pet_care_custom_css .='text-align:Left;';
		$vw_pet_care_custom_css .='}';
		$vw_pet_care_custom_css .='.post-info hr{';
			$vw_pet_care_custom_css .='margin-bottom:10px;';
		$vw_pet_care_custom_css .='}';
		$vw_pet_care_custom_css .='.post-main-box h2{';
			$vw_pet_care_custom_css .='margin-top:10px;';
		$vw_pet_care_custom_css .='}';
		$vw_pet_care_custom_css .='.service-text .more-btn{';
			$vw_pet_care_custom_css .='display:inline-block;';
		$vw_pet_care_custom_css .='}';
	}

	/*--------------------- Blog Page Posts -------------------*/

	$vw_pet_care_blog_page_posts_settings = get_theme_mod( 'vw_pet_care_blog_page_posts_settings','Into Blocks');
    if($vw_pet_care_blog_page_posts_settings == 'Without Blocks'){
		$vw_pet_care_custom_css .='.post-main-box{';
			$vw_pet_care_custom_css .='box-shadow: none; border: none; margin:30px 0;';
		$vw_pet_care_custom_css .='}';
	}

	// featured image dimention
	$vw_pet_care_blog_post_featured_image_dimension = get_theme_mod('vw_pet_care_blog_post_featured_image_dimension', 'default');
	$vw_pet_care_blog_post_featured_image_custom_width = get_theme_mod('vw_pet_care_blog_post_featured_image_custom_width',250);
	$vw_pet_care_blog_post_featured_image_custom_height = get_theme_mod('vw_pet_care_blog_post_featured_image_custom_height',250);
	if($vw_pet_care_blog_post_featured_image_dimension == 'custom'){
		$vw_pet_care_custom_css .='.post-main-box img{';
			$vw_pet_care_custom_css .='width: '.esc_attr($vw_pet_care_blog_post_featured_image_custom_width).'!important; height: '.esc_attr($vw_pet_care_blog_post_featured_image_custom_height).';';
		$vw_pet_care_custom_css .='}';
	}

	/*---------------- Posts Settings ------------------*/

	$vw_pet_care_featured_image_border_radius = get_theme_mod('vw_pet_care_featured_image_border_radius', 0);
	if($vw_pet_care_featured_image_border_radius != false){
		$vw_pet_care_custom_css .='.box-image img, .feature-box img{';
			$vw_pet_care_custom_css .='border-radius: '.esc_attr($vw_pet_care_featured_image_border_radius).'px;';
		$vw_pet_care_custom_css .='}';
	}

	$vw_pet_care_featured_image_box_shadow = get_theme_mod('vw_pet_care_featured_image_box_shadow',0);
	if($vw_pet_care_featured_image_box_shadow != false){
		$vw_pet_care_custom_css .='.box-image img, .feature-box img, #content-vw img{';
			$vw_pet_care_custom_css .='box-shadow: '.esc_attr($vw_pet_care_featured_image_box_shadow).'px '.esc_attr($vw_pet_care_featured_image_box_shadow).'px '.esc_attr($vw_pet_care_featured_image_box_shadow).'px #cccccc;';
		$vw_pet_care_custom_css .='}';
	}

	/*---------------- Button Settings ------------------*/

	$vw_pet_care_button_letter_spacing = get_theme_mod('vw_pet_care_button_letter_spacing',14);
	$vw_pet_care_custom_css .='.post-main-box .more-btn{';
		$vw_pet_care_custom_css .='letter-spacing: '.esc_attr($vw_pet_care_button_letter_spacing).';';
	$vw_pet_care_custom_css .='}';

	$vw_pet_care_button_border_radius = get_theme_mod('vw_pet_care_button_border_radius');
	if($vw_pet_care_button_border_radius != false){
		$vw_pet_care_custom_css .='.post-main-box .more-btn a{';
			$vw_pet_care_custom_css .='border-radius: '.esc_attr($vw_pet_care_button_border_radius).'px !important;';
		$vw_pet_care_custom_css .='}';
	}

	$vw_pet_care_button_top_bottom_padding = get_theme_mod('vw_pet_care_button_top_bottom_padding');
	$vw_pet_care_button_left_right_padding = get_theme_mod('vw_pet_care_button_left_right_padding');
	if($vw_pet_care_button_top_bottom_padding != false || $vw_pet_care_button_left_right_padding != false){
		$vw_pet_care_custom_css .='.post-main-box .more-btn{';
			$vw_pet_care_custom_css .='padding-top: '.esc_attr($vw_pet_care_button_top_bottom_padding).'!important; padding-bottom: '.esc_attr($vw_pet_care_button_top_bottom_padding).'!important;padding-left: '.esc_attr($vw_pet_care_button_left_right_padding).'!important;padding-right: '.esc_attr($vw_pet_care_button_left_right_padding).'!important;';
		$vw_pet_care_custom_css .='}';
	}

	$vw_pet_care_button_font_size = get_theme_mod('vw_pet_care_button_font_size',14);
	$vw_pet_care_custom_css .='.post-main-box .more-btn a{';
		$vw_pet_care_custom_css .='font-size: '.esc_attr($vw_pet_care_button_font_size).';';
	$vw_pet_care_custom_css .='}';

	$vw_pet_care_theme_lay = get_theme_mod( 'vw_pet_care_button_text_transform','Capitalize');
	if($vw_pet_care_theme_lay == 'Capitalize'){
		$vw_pet_care_custom_css .='.post-main-box .more-btn a{';
			$vw_pet_care_custom_css .='text-transform:Capitalize;';
		$vw_pet_care_custom_css .='}';
	}
	if($vw_pet_care_theme_lay == 'Lowercase'){
		$vw_pet_care_custom_css .='.post-main-box .more-btn a{';
			$vw_pet_care_custom_css .='text-transform:Lowercase;';
		$vw_pet_care_custom_css .='}';
	}
	if($vw_pet_care_theme_lay == 'Uppercase'){
		$vw_pet_care_custom_css .='.post-main-box .more-btn a{';
			$vw_pet_care_custom_css .='text-transform:Uppercase;';
		$vw_pet_care_custom_css .='}';
	}

	/*---------------- Single Blog Page Settings ------------------*/

	$vw_pet_care_single_blog_comment_button_text = get_theme_mod('vw_pet_care_single_blog_comment_button_text', 'Post Comment');
	if($vw_pet_care_single_blog_comment_button_text == ''){
		$vw_pet_care_custom_css .='#comments p.form-submit {';
			$vw_pet_care_custom_css .='display: none;';
		$vw_pet_care_custom_css .='}';
	}

	$vw_pet_care_comment_width = get_theme_mod('vw_pet_care_single_blog_comment_width');
	if($vw_pet_care_comment_width != false){
		$vw_pet_care_custom_css .='#comments textarea{';
			$vw_pet_care_custom_css .='width: '.esc_attr($vw_pet_care_comment_width).';';
		$vw_pet_care_custom_css .='}';
	}

	$vw_pet_care_single_blog_post_navigation_show_hide = get_theme_mod('vw_pet_care_single_blog_post_navigation_show_hide',true);
	if($vw_pet_care_single_blog_post_navigation_show_hide != true){
		$vw_pet_care_custom_css .='.post-navigation{';
			$vw_pet_care_custom_css .='display: none;';
		$vw_pet_care_custom_css .='}';
	}

	/*--------------------- Grid Posts Posts -------------------*/

	$vw_pet_care_display_grid_posts_settings = get_theme_mod( 'vw_pet_care_display_grid_posts_settings','Into Blocks');
    if($vw_pet_care_display_grid_posts_settings == 'Without Blocks'){
		$vw_pet_care_custom_css .='.grid-post-main-box{';
			$vw_pet_care_custom_css .='box-shadow: none; border: none; margin:30px 0;';
		$vw_pet_care_custom_css .='}';
	}

	/*----------------Woocommerce Products Settings ------------------*/

	$vw_pet_care_related_product_show_hide = get_theme_mod('vw_pet_care_related_product_show_hide',true);
	if($vw_pet_care_related_product_show_hide != true){
		$vw_pet_care_custom_css .='.related.products{';
			$vw_pet_care_custom_css .='display: none;';
		$vw_pet_care_custom_css .='}';
	}

	/*----------------Woocommerce Products Settings ------------------*/

	$vw_pet_care_products_padding_top_bottom = get_theme_mod('vw_pet_care_products_padding_top_bottom');
	if($vw_pet_care_products_padding_top_bottom != false){
		$vw_pet_care_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$vw_pet_care_custom_css .='padding-top: '.esc_attr($vw_pet_care_products_padding_top_bottom).'!important; padding-bottom: '.esc_attr($vw_pet_care_products_padding_top_bottom).'!important;';
		$vw_pet_care_custom_css .='}';
	}

	$vw_pet_care_products_padding_left_right = get_theme_mod('vw_pet_care_products_padding_left_right');
	if($vw_pet_care_products_padding_left_right != false){
		$vw_pet_care_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$vw_pet_care_custom_css .='padding-left: '.esc_attr($vw_pet_care_products_padding_left_right).'!important; padding-right: '.esc_attr($vw_pet_care_products_padding_left_right).'!important;';
		$vw_pet_care_custom_css .='}';
	}

	$vw_pet_care_products_box_shadow = get_theme_mod('vw_pet_care_products_box_shadow');
	if($vw_pet_care_products_box_shadow != false){
		$vw_pet_care_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
				$vw_pet_care_custom_css .='box-shadow: '.esc_attr($vw_pet_care_products_box_shadow).'px '.esc_attr($vw_pet_care_products_box_shadow).'px '.esc_attr($vw_pet_care_products_box_shadow).'px #ddd;';
		$vw_pet_care_custom_css .='}';
	}

	$vw_pet_care_products_border_radius = get_theme_mod('vw_pet_care_products_border_radius');
	if($vw_pet_care_products_border_radius != false){
		$vw_pet_care_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$vw_pet_care_custom_css .='border-radius: '.esc_attr($vw_pet_care_products_border_radius).'px;';
		$vw_pet_care_custom_css .='}';
	}

	$vw_pet_care_products_btn_padding_top_bottom = get_theme_mod('vw_pet_care_products_btn_padding_top_bottom');
	if($vw_pet_care_products_btn_padding_top_bottom != false){
		$vw_pet_care_custom_css .='.woocommerce a.button{';
			$vw_pet_care_custom_css .='padding-top: '.esc_attr($vw_pet_care_products_btn_padding_top_bottom).' !important; padding-bottom: '.esc_attr($vw_pet_care_products_btn_padding_top_bottom).' !important;';
		$vw_pet_care_custom_css .='}';
	}

	$vw_pet_care_products_btn_padding_left_right = get_theme_mod('vw_pet_care_products_btn_padding_left_right');
	if($vw_pet_care_products_btn_padding_left_right != false){
		$vw_pet_care_custom_css .='.woocommerce a.button{';
			$vw_pet_care_custom_css .='padding-left: '.esc_attr($vw_pet_care_products_btn_padding_left_right).' !important; padding-right: '.esc_attr($vw_pet_care_products_btn_padding_left_right).' !important;';
		$vw_pet_care_custom_css .='}';
	}

	$vw_pet_care_products_button_border_radius = get_theme_mod('vw_pet_care_products_button_border_radius', 0);
	if($vw_pet_care_products_button_border_radius != false){
		$vw_pet_care_custom_css .='.woocommerce ul.products li.product .button, a.checkout-button.button.alt.wc-forward,.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt,.woocommerce a.button{';
			$vw_pet_care_custom_css .='border-radius: '.esc_attr($vw_pet_care_products_button_border_radius).'px !important;';
		$vw_pet_care_custom_css .='}';
	}

	$vw_pet_care_woocommerce_sale_position = get_theme_mod( 'vw_pet_care_woocommerce_sale_position','right');
    if($vw_pet_care_woocommerce_sale_position == 'left'){
		$vw_pet_care_custom_css .='.woocommerce ul.products li.product .onsale{';
			$vw_pet_care_custom_css .='left: 12px !important; right: auto !important;';
		$vw_pet_care_custom_css .='}';
	}else if($vw_pet_care_woocommerce_sale_position == 'right'){
		$vw_pet_care_custom_css .='.woocommerce ul.products li.product .onsale{';
			$vw_pet_care_custom_css .='left: auto!important; right: 0 !important;';
		$vw_pet_care_custom_css .='}';
	}

	$vw_pet_care_woocommerce_sale_font_size = get_theme_mod('vw_pet_care_woocommerce_sale_font_size');
	if($vw_pet_care_woocommerce_sale_font_size != false){
		$vw_pet_care_custom_css .='.woocommerce span.onsale{';
			$vw_pet_care_custom_css .='font-size: '.esc_attr($vw_pet_care_woocommerce_sale_font_size).';';
		$vw_pet_care_custom_css .='}';
	}

	$vw_pet_care_woocommerce_sale_padding_top_bottom = get_theme_mod('vw_pet_care_woocommerce_sale_padding_top_bottom');
	if($vw_pet_care_woocommerce_sale_padding_top_bottom != false){
		$vw_pet_care_custom_css .='.woocommerce span.onsale{';
			$vw_pet_care_custom_css .='padding-top: '.esc_attr($vw_pet_care_woocommerce_sale_padding_top_bottom).'; padding-bottom: '.esc_attr($vw_pet_care_woocommerce_sale_padding_top_bottom).';';
		$vw_pet_care_custom_css .='}';
	}

	$vw_pet_care_woocommerce_sale_padding_left_right = get_theme_mod('vw_pet_care_woocommerce_sale_padding_left_right');
	if($vw_pet_care_woocommerce_sale_padding_left_right != false){
		$vw_pet_care_custom_css .='.woocommerce span.onsale{';
			$vw_pet_care_custom_css .='padding-left: '.esc_attr($vw_pet_care_woocommerce_sale_padding_left_right).'; padding-right: '.esc_attr($vw_pet_care_woocommerce_sale_padding_left_right).';';
		$vw_pet_care_custom_css .='}';
	}

	$vw_pet_care_woocommerce_sale_border_radius = get_theme_mod('vw_pet_care_woocommerce_sale_border_radius', 0);
	if($vw_pet_care_woocommerce_sale_border_radius != false){
		$vw_pet_care_custom_css .='.woocommerce span.onsale{';
			$vw_pet_care_custom_css .='border-radius: '.esc_attr($vw_pet_care_woocommerce_sale_border_radius).'px;';
		$vw_pet_care_custom_css .='}';
	}

	/*----------------Social Icons Settings ------------------*/

	$vw_pet_care_social_icon_font_size = get_theme_mod('vw_pet_care_social_icon_font_size');
	if($vw_pet_care_social_icon_font_size != false){
		$vw_pet_care_custom_css .='#sidebar .custom-social-icons i, #footer .custom-social-icons i{';
			$vw_pet_care_custom_css .='font-size: '.esc_attr($vw_pet_care_social_icon_font_size).';';
		$vw_pet_care_custom_css .='}';
	}

	$vw_pet_care_social_icon_padding = get_theme_mod('vw_pet_care_social_icon_padding');
	if($vw_pet_care_social_icon_padding != false){
		$vw_pet_care_custom_css .='#sidebar .custom-social-icons i, #footer .custom-social-icons i{';
			$vw_pet_care_custom_css .='padding: '.esc_attr($vw_pet_care_social_icon_padding).';';
		$vw_pet_care_custom_css .='}';
	}

	$vw_pet_care_social_icon_width = get_theme_mod('vw_pet_care_social_icon_width');
	if($vw_pet_care_social_icon_width != false){
		$vw_pet_care_custom_css .='#sidebar .custom-social-icons i, #footer .custom-social-icons i{';
			$vw_pet_care_custom_css .='width: '.esc_attr($vw_pet_care_social_icon_width).';';
		$vw_pet_care_custom_css .='}';
	}

	$vw_pet_care_social_icon_height = get_theme_mod('vw_pet_care_social_icon_height');
	if($vw_pet_care_social_icon_height != false){
		$vw_pet_care_custom_css .='#sidebar .custom-social-icons i, #footer .custom-social-icons i{';
			$vw_pet_care_custom_css .='height: '.esc_attr($vw_pet_care_social_icon_height).';';
		$vw_pet_care_custom_css .='}';
	}

	$vw_pet_care_social_icon_border_radius = get_theme_mod('vw_pet_care_social_icon_border_radius');
	if($vw_pet_care_social_icon_border_radius != false){
		$vw_pet_care_custom_css .='#sidebar .custom-social-icons i, #footer .custom-social-icons i{';
			$vw_pet_care_custom_css .='border-radius: '.esc_attr($vw_pet_care_social_icon_border_radius).'px;';
		$vw_pet_care_custom_css .='}';
	}

	$vw_pet_care_resp_menu_toggle_btn_bg_color = get_theme_mod('vw_pet_care_resp_menu_toggle_btn_bg_color');
	if($vw_pet_care_resp_menu_toggle_btn_bg_color != false){
		$vw_pet_care_custom_css .='.toggle-nav i{';
			$vw_pet_care_custom_css .='background: '.esc_attr($vw_pet_care_resp_menu_toggle_btn_bg_color).';';
		$vw_pet_care_custom_css .='}';
	}

	$vw_pet_care_grid_featured_image_box_shadow = get_theme_mod('vw_pet_care_grid_featured_image_box_shadow',0);
	if($vw_pet_care_grid_featured_image_box_shadow != false){
		$vw_pet_care_custom_css .='.grid-post-main-box .box-image img, .grid-post-main-box .feature-box img, #content-vw img{';
			$vw_pet_care_custom_css .='box-shadow: '.esc_attr($vw_pet_care_grid_featured_image_box_shadow).'px '.esc_attr($vw_pet_care_grid_featured_image_box_shadow).'px '.esc_attr($vw_pet_care_grid_featured_image_box_shadow).'px #cccccc;';
		$vw_pet_care_custom_css .='}';
	}

	/*-------------- Menus Setings ----------------*/

	$vw_pet_care_navigation_menu_font_size = get_theme_mod('vw_pet_care_navigation_menu_font_size');
	if($vw_pet_care_navigation_menu_font_size != false){
		$vw_pet_care_custom_css .='.main-navigation ul a{';
			$vw_pet_care_custom_css .='font-size: '.esc_attr($vw_pet_care_navigation_menu_font_size).';';
		$vw_pet_care_custom_css .='}';
	}

	$vw_pet_care_navigation_menu_font_weight = get_theme_mod('vw_pet_care_navigation_menu_font_weight','700');
	if($vw_pet_care_navigation_menu_font_weight != false){
		$vw_pet_care_custom_css .='.main-navigation ul a{';
			$vw_pet_care_custom_css .='font-weight: '.esc_attr($vw_pet_care_navigation_menu_font_weight).';';
		$vw_pet_care_custom_css .='}';
	}

	$vw_pet_care_theme_lay = get_theme_mod( 'vw_pet_care_menu_text_transform','Capitalize');
	if($vw_pet_care_theme_lay == 'Capitalize'){
		$vw_pet_care_custom_css .='.main-navigation ul a{';
			$vw_pet_care_custom_css .='text-transform:Capitalize;';
		$vw_pet_care_custom_css .='}';
	}
	if($vw_pet_care_theme_lay == 'Lowercase'){
		$vw_pet_care_custom_css .='.main-navigation ul a{';
			$vw_pet_care_custom_css .='text-transform:Lowercase;';
		$vw_pet_care_custom_css .='}';
	}
	if($vw_pet_care_theme_lay == 'Uppercase'){
		$vw_pet_care_custom_css .='.main-navigation ul a{';
			$vw_pet_care_custom_css .='text-transform:Uppercase;';
		$vw_pet_care_custom_css .='}';
	}

	$vw_pet_care_header_menus_color = get_theme_mod('vw_pet_care_header_menus_color');
	if($vw_pet_care_header_menus_color != false){
		$vw_pet_care_custom_css .='.main-navigation ul a{';
			$vw_pet_care_custom_css .='color: '.esc_attr($vw_pet_care_header_menus_color).';';
		$vw_pet_care_custom_css .='}';
	}

	$vw_pet_care_header_menus_hover_color = get_theme_mod('vw_pet_care_header_menus_hover_color');
	if($vw_pet_care_header_menus_hover_color != false){
		$vw_pet_care_custom_css .='.main-navigation ul a:hover{';
			$vw_pet_care_custom_css .='color: '.esc_attr($vw_pet_care_header_menus_hover_color).';';
		$vw_pet_care_custom_css .='}';
	}

	$vw_pet_care_header_submenus_color = get_theme_mod('vw_pet_care_header_submenus_color');
	if($vw_pet_care_header_submenus_color != false){
		$vw_pet_care_custom_css .='.main-navigation ul ul a{';
			$vw_pet_care_custom_css .='color: '.esc_attr($vw_pet_care_header_submenus_color).';';
		$vw_pet_care_custom_css .='}';
	}

	$vw_pet_care_header_submenus_hover_color = get_theme_mod('vw_pet_care_header_submenus_hover_color');
	if($vw_pet_care_header_submenus_hover_color != false){
		$vw_pet_care_custom_css .='.main-navigation ul.sub-menu a:hover{';
			$vw_pet_care_custom_css .='color: '.esc_attr($vw_pet_care_header_submenus_hover_color).';';
		$vw_pet_care_custom_css .='}';
	}

	$vw_pet_care_menus_item = get_theme_mod( 'vw_pet_care_menus_item_style','None');
    if($vw_pet_care_menus_item == 'None'){
		$vw_pet_care_custom_css .='.main-navigation ul a{';
			$vw_pet_care_custom_css .='';
		$vw_pet_care_custom_css .='}';
	}else if($vw_pet_care_menus_item == 'Zoom In'){
		$vw_pet_care_custom_css .='.main-navigation ul a:hover{';
			$vw_pet_care_custom_css .='transition: all 0.3s ease-in-out !important; transform: scale(1.2) !important;';
		$vw_pet_care_custom_css .='}';
	}

	/*---------------------------Footer Style -------------------*/

	$vw_pet_care_theme_lay = get_theme_mod( 'vw_pet_care_footer_template','vw_pet_care-footer-one');
    if($vw_pet_care_theme_lay == 'vw_pet_care-footer-one'){
		$vw_pet_care_custom_css .='#footer{';
			$vw_pet_care_custom_css .='';
		$vw_pet_care_custom_css .='}';

	}else if($vw_pet_care_theme_lay == 'vw_pet_care-footer-two'){
		$vw_pet_care_custom_css .='#footer{';
			$vw_pet_care_custom_css .='background: linear-gradient(to right, #f9f8ff, #dedafa);';
		$vw_pet_care_custom_css .='}';
		$vw_pet_care_custom_css .='#footer p, #footer li a, #footer, #footer h3, #footer a.rsswidget, #footer #wp-calendar a, .copyright a, #footer .custom_details, #footer ins span, #footer .tagcloud a, .main-inner-box span.entry-date a, nav.woocommerce-MyAccount-navigation ul li:hover a, #footer ul li a, #footer table, #footer th, #footer td, #footer caption, #sidebar caption,#footer nav.wp-calendar-nav a,#footer .search-form .search-field{';
			$vw_pet_care_custom_css .='color:#000;';
		$vw_pet_care_custom_css .='}';
		$vw_pet_care_custom_css .='#footer ul li::before{';
			$vw_pet_care_custom_css .='background:#000;';
		$vw_pet_care_custom_css .='}';
		$vw_pet_care_custom_css .='#footer table, #footer th, #footer td,#footer .search-form .search-field,#footer .tagcloud a{';
			$vw_pet_care_custom_css .='border: 1px solid #000;';
		$vw_pet_care_custom_css .='}';

	}else if($vw_pet_care_theme_lay == 'vw_pet_care-footer-three'){
		$vw_pet_care_custom_css .='#footer{';
			$vw_pet_care_custom_css .='background: #232524;';
		$vw_pet_care_custom_css .='}';
	}
	else if($vw_pet_care_theme_lay == 'vw_pet_care-footer-four'){
		$vw_pet_care_custom_css .='#footer{';
			$vw_pet_care_custom_css .='background: #f7f7f7;';
		$vw_pet_care_custom_css .='}';
		$vw_pet_care_custom_css .='#footer p, #footer li a, #footer, #footer h3, #footer a.rsswidget, #footer #wp-calendar a, .copyright a, #footer .custom_details, #footer ins span, #footer .tagcloud a, .main-inner-box span.entry-date a, nav.woocommerce-MyAccount-navigation ul li:hover a, #footer ul li a, #footer table, #footer th, #footer td, #footer caption, #sidebar caption,#footer nav.wp-calendar-nav a,#footer .search-form .search-field{';
			$vw_pet_care_custom_css .='color:#000;';
		$vw_pet_care_custom_css .='}';
		$vw_pet_care_custom_css .='#footer ul li::before{';
			$vw_pet_care_custom_css .='background:#000;';
		$vw_pet_care_custom_css .='}';
		$vw_pet_care_custom_css .='#footer table, #footer th, #footer td,#footer .search-form .search-field,#footer .tagcloud a{';
			$vw_pet_care_custom_css .='border: 1px solid #000;';
		$vw_pet_care_custom_css .='}';
	}
	else if($vw_pet_care_theme_lay == 'vw_pet_care-footer-five'){
		$vw_pet_care_custom_css .='#footer{';
			$vw_pet_care_custom_css .='background: linear-gradient(to right, #01093a, #2d0b00);';
		$vw_pet_care_custom_css .='}';
	}

	/*---------------- Footer Settings ------------------*/

	$vw_pet_care_button_footer_heading_letter_spacing = get_theme_mod('vw_pet_care_button_footer_heading_letter_spacing','');
	$vw_pet_care_custom_css .='#footer h3{';
		$vw_pet_care_custom_css .='letter-spacing: '.esc_attr($vw_pet_care_button_footer_heading_letter_spacing).';';
	$vw_pet_care_custom_css .='}';

	$vw_pet_care_button_footer_font_size = get_theme_mod('vw_pet_care_button_footer_font_size',14);
	$vw_pet_care_custom_css .='#footer h3{';
		$vw_pet_care_custom_css .='font-size: '.esc_attr($vw_pet_care_button_footer_font_size).';';
	$vw_pet_care_custom_css .='}';

	$vw_pet_care_theme_lay = get_theme_mod( 'vw_pet_care_button_footer_text_transform','Capitalize');
	if($vw_pet_care_theme_lay == 'Capitalize'){
		$vw_pet_care_custom_css .='#footer h3{';
			$vw_pet_care_custom_css .='text-transform:Capitalize;';
		$vw_pet_care_custom_css .='}';
	}
	if($vw_pet_care_theme_lay == 'Lowercase'){
		$vw_pet_care_custom_css .='#footer h3{';
			$vw_pet_care_custom_css .='text-transform:Lowercase;';
		$vw_pet_care_custom_css .='}';
	}
	if($vw_pet_care_theme_lay == 'Uppercase'){
		$vw_pet_care_custom_css .='#footer h3{';
			$vw_pet_care_custom_css .='text-transform:Uppercase;';
		$vw_pet_care_custom_css .='}';
	}

	$vw_pet_care_footer_heading_weight = get_theme_mod('vw_pet_care_footer_heading_weight','600');
	if($vw_pet_care_footer_heading_weight != false){
		$vw_pet_care_custom_css .='#footer h3{';
			$vw_pet_care_custom_css .='font-weight: '.esc_attr($vw_pet_care_footer_heading_weight).';';
		$vw_pet_care_custom_css .='}';
	}
