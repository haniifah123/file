<?php 

	$cosmetic_shop_custom_style = '';

	// Logo Size
	$cosmetic_shop_logo_top_padding = get_theme_mod('cosmetic_shop_logo_top_padding');
	$cosmetic_shop_logo_bottom_padding = get_theme_mod('cosmetic_shop_logo_bottom_padding');
	$cosmetic_shop_logo_left_padding = get_theme_mod('cosmetic_shop_logo_left_padding');
	$cosmetic_shop_logo_right_padding = get_theme_mod('cosmetic_shop_logo_right_padding');

	if( $cosmetic_shop_logo_top_padding != '' || $cosmetic_shop_logo_bottom_padding != '' || $cosmetic_shop_logo_left_padding != '' || $cosmetic_shop_logo_right_padding != ''){
		$cosmetic_shop_custom_style .=' .logo {';
			$cosmetic_shop_custom_style .=' padding-top: '.esc_attr($cosmetic_shop_logo_top_padding).'px; padding-bottom: '.esc_attr($cosmetic_shop_logo_bottom_padding).'px; padding-left: '.esc_attr($cosmetic_shop_logo_left_padding).'px; padding-right: '.esc_attr($cosmetic_shop_logo_right_padding).'px;';
		$cosmetic_shop_custom_style .=' }';
	}

	//Site title color
	$cosmetic_shop_site_title_color = get_theme_mod('cosmetic_shop_site_title_color');
	if ( $cosmetic_shop_site_title_color != '') {
		$cosmetic_shop_custom_style .=' h1.site-title a, p.site-title a {';
			$cosmetic_shop_custom_style .=' color:'.esc_attr($cosmetic_shop_site_title_color).';';
		$cosmetic_shop_custom_style .=' }';
	}

	//Site tagline color
	$cosmetic_shop_site_tagline_color = get_theme_mod('cosmetic_shop_site_tagline_color');
	if ( $cosmetic_shop_site_tagline_color != '') {
		$cosmetic_shop_custom_style .=' p.site-description {';
			$cosmetic_shop_custom_style .=' color:'.esc_attr($cosmetic_shop_site_tagline_color).';';
		$cosmetic_shop_custom_style .=' }';
	}

	$cosmetic_shop_menu_color = get_theme_mod('cosmetic_shop_menu_color');
	if ( $cosmetic_shop_menu_color != '') {
		$cosmetic_shop_custom_style .=' .nav-menu ul li a {';
			$cosmetic_shop_custom_style .=' color:'.esc_attr($cosmetic_shop_menu_color).';';
		$cosmetic_shop_custom_style .=' }';
	}

	$cosmetic_shop_submenu_color = get_theme_mod('cosmetic_shop_submenu_color');
	$cosmetic_shop_submenubg_color = get_theme_mod('cosmetic_shop_submenubg_color');
	if ( $cosmetic_shop_submenu_color != '') {
		$cosmetic_shop_custom_style .=' .nav-menu ul ul a {';
			$cosmetic_shop_custom_style .=' color:'.esc_attr($cosmetic_shop_submenu_color).'; background-color:'.esc_attr($cosmetic_shop_submenubg_color).';';
		$cosmetic_shop_custom_style .=' }';
	}

	$cosmetic_shop_cartic_color = get_theme_mod('cosmetic_shop_cartic_color');
	if ( $cosmetic_shop_cartic_color != '') {
		$cosmetic_shop_custom_style .=' #header .s-btn a i, #header .hbtn.Nmob span.cart-value {';
			$cosmetic_shop_custom_style .=' color:'.esc_attr($cosmetic_shop_cartic_color).';';
		$cosmetic_shop_custom_style .=' }';
	}

	$cosmetic_shop_hdrbtn_color = get_theme_mod('cosmetic_shop_hdrbtn_color');
	$cosmetic_shop_hdrbtnbg_color = get_theme_mod('cosmetic_shop_hdrbtnbg_color');
	if ( $cosmetic_shop_hdrbtn_color != '') {
		$cosmetic_shop_custom_style .=' #header .accnt a {';
			$cosmetic_shop_custom_style .=' color:'.esc_attr($cosmetic_shop_hdrbtn_color).'; background-color:'.esc_attr($cosmetic_shop_hdrbtnbg_color).';';
		$cosmetic_shop_custom_style .=' }';
	}

	//Slider color
	$cosmetic_shop_slider_title_color = get_theme_mod('cosmetic_shop_slider_title_color');
	if ( $cosmetic_shop_slider_title_color != '') {
		$cosmetic_shop_custom_style .=' #slider h2 {';
			$cosmetic_shop_custom_style .=' color:'.esc_attr($cosmetic_shop_slider_title_color).';';
		$cosmetic_shop_custom_style .=' }';
	}

	$cosmetic_shop_slider_bdr_color = get_theme_mod('cosmetic_shop_slider_bdr_color');
	if ( $cosmetic_shop_slider_bdr_color != '') {
		$cosmetic_shop_custom_style .=' #slider .sld-brd {';
			$cosmetic_shop_custom_style .=' border-top-color:'.esc_attr($cosmetic_shop_slider_bdr_color).';';
		$cosmetic_shop_custom_style .=' }';
	}

	$cosmetic_shop_slider_text_color = get_theme_mod('cosmetic_shop_slider_text_color');
	if ( $cosmetic_shop_slider_text_color != '') {
		$cosmetic_shop_custom_style .=' #slider p {';
			$cosmetic_shop_custom_style .=' color:'.esc_attr($cosmetic_shop_slider_text_color).';';
		$cosmetic_shop_custom_style .=' }';
	}

	$cosmetic_shop_slider_btn_color = get_theme_mod('cosmetic_shop_slider_btn_color');
	$cosmetic_shop_slider_btnbg_color = get_theme_mod('cosmetic_shop_slider_btnbg_color');
	if ( $cosmetic_shop_slider_btn_color != '') {
		$cosmetic_shop_custom_style .=' #slider a.read-btn {';
			$cosmetic_shop_custom_style .=' color:'.esc_attr($cosmetic_shop_slider_btn_color).'; background-color:'.esc_attr($cosmetic_shop_slider_btnbg_color).';';
		$cosmetic_shop_custom_style .=' }';
	}

	//featureproduct color
	$cosmetic_shop_featureproduct_color = get_theme_mod('cosmetic_shop_featureproduct_color');
	if ( $cosmetic_shop_featureproduct_color != '') {
		$cosmetic_shop_custom_style .=' .featureproduct-box .featureproduct-content h4 {';
			$cosmetic_shop_custom_style .=' color:'.esc_attr($cosmetic_shop_featureproduct_color).';';
		$cosmetic_shop_custom_style .=' }';
	}