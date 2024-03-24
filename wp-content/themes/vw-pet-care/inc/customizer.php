<?php
/**
 * VW PetTheme Customizer
 *
 * @package VW Pet
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */

function vw_pet_care_custom_controls() {
	load_template( trailingslashit( get_template_directory() ) . '/inc/custom-controls.php' );
}
add_action( 'customize_register', 'vw_pet_care_custom_controls' );

function vw_pet_care_customize_register( $wp_customize ) {


	$wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

	load_template( trailingslashit( get_template_directory() ) . '/inc/icon-picker.php' );

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector' => '.logo .site-title a',
	 	'render_callback' => 'vw_pet_care_Customize_partial_blogname',
	));

	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector' => 'p.site-description',
		'render_callback' => 'vw_pet_care_Customize_partial_blogdescription',
	));

	// add home page setting pannel
	$wp_customize->add_panel( 'vw_pet_care_panel_id', array(
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => esc_html__( 'Homepage Settings', 'vw-pet-care' ),
		'priority' => 10,
	));

 	// Header Background color
	$wp_customize->add_setting('vw_pet_care_header_background_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_pet_care_header_background_color', array(
		'label'    => __('Header Background Color', 'vw-pet-care'),
		'section'  => 'header_image',
	)));

	$wp_customize->add_setting('vw_pet_care_header_img_position',array(
	  'default' => 'center top',
	  'transport' => 'refresh',
	  'sanitize_callback' => 'vw_pet_care_sanitize_choices'
	));
	$wp_customize->add_control('vw_pet_care_header_img_position',array(
		'type' => 'select',
		'label' => __('Header Image Position','vw-pet-care'),
		'section' => 'header_image',
		'choices' 	=> array(
			'left top' 		=> esc_html__( 'Top Left', 'vw-pet-care' ),
			'center top'   => esc_html__( 'Top', 'vw-pet-care' ),
			'right top'   => esc_html__( 'Top Right', 'vw-pet-care' ),
			'left center'   => esc_html__( 'Left', 'vw-pet-care' ),
			'center center'   => esc_html__( 'Center', 'vw-pet-care' ),
			'right center'   => esc_html__( 'Right', 'vw-pet-care' ),
			'left bottom'   => esc_html__( 'Bottom Left', 'vw-pet-care' ),
			'center bottom'   => esc_html__( 'Bottom', 'vw-pet-care' ),
			'right bottom'   => esc_html__( 'Bottom Right', 'vw-pet-care' ),
		),
		));

	//Topbar
	$wp_customize->add_section('vw_pet_care_topbar_section' , array(
  	'title' => __( 'Topbar Section', 'vw-pet-care' ),
		'panel' => 'vw_pet_care_panel_id'
	) );

	$wp_customize->add_setting('vw_pet_care_total_order',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_pet_care_total_order',array(
		'label'	=> esc_html__('Add Topbar Text','vw-pet-care'),
		'input_attrs' => array(
      'placeholder' => esc_html__( 'Welcome to pets WordPress Theme', 'vw-pet-care' ),
      ),
		'section'=> 'vw_pet_care_topbar_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_pet_care_phone_number_text',array(
		'default' => 'Phone:',
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_pet_care_phone_number_text',array(
		'label' => __('Phone Text','vw-pet-care'),
		'section' => 'vw_pet_care_topbar_section',
		'setting' => 'vw_pet_care_phone_number_text',
		'type' => 'text'
	));

  $wp_customize->add_setting('vw_pet_care_phone_number',array(
		'default'=> '',
		'sanitize_callback'	=> 'vw_pet_care_sanitize_phone_number'
	));
	$wp_customize->add_control('vw_pet_care_phone_number',array(
		'label'	=> __('Add Phone number','vw-pet-care'),
		'input_attrs' => array(
        'placeholder' => __( '+101 987-456-3210', 'vw-pet-care' ),
        ),
		'section'=> 'vw_pet_care_topbar_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_pet_care_phone_icon',array(
		'default'	=> 'fas fa-phone',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new VW_Pet_Care_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_pet_care_phone_icon',array(
		'label'	=> __('Add Phone Icon','vw-pet-care'),
		'transport' => 'refresh',
		'section'	=> 'vw_pet_care_topbar_section',
		'setting'	=> 'vw_pet_care_phone_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting( 'vw_pet_care_header_search',array(
  	'default' => 1,
  	'transport' => 'refresh',
  	'sanitize_callback' => 'vw_pet_care_switch_sanitization'
  ));
  $wp_customize->add_control( new VW_Pet_Care_Toggle_Switch_Custom_Control( $wp_customize, 'vw_pet_care_header_search',array(
  	'label' => esc_html__( 'Show / Hide Search','vw-pet-care' ),
  	'section' => 'vw_pet_care_topbar_section'
  )));

	$wp_customize->add_setting('vw_pet_care_search_topbar_icon',array(
		'default'	=> 'fas fa-search',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new VW_Pet_Care_Fontawesome_Icon_Chooser(
  $wp_customize,'vw_pet_care_search_topbar_icon',array(
		'label'	=> __('Add Search Icon','vw-pet-care'),
		'transport' => 'refresh',
		'section'	=> 'vw_pet_care_topbar_section',
		'setting'	=> 'vw_pet_care_search_topbar_icon',
		'type'		=> 'icon'
	)));

  $wp_customize->add_setting( 'vw_pet_care_cart_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_pet_care_switch_sanitization'
  ));
  $wp_customize->add_control( new VW_Pet_Care_Toggle_Switch_Custom_Control( $wp_customize, 'vw_pet_care_cart_hide_show',
     array(
		'label' => esc_html__( 'Show / Hide Cart','vw-pet-care' ),
		'section' => 'vw_pet_care_topbar_section'
  )));

	$wp_customize->add_setting('vw_pet_care_cart_topbar_icon',array(
		'default'	=> 'fas fa-shopping-cart',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new VW_Pet_Care_Fontawesome_Icon_Chooser(
  $wp_customize,'vw_pet_care_cart_topbar_icon',array(
		'label'	=> __('Add Cart Icon','vw-pet-care'),
		'transport' => 'refresh',
		'section'	=> 'vw_pet_care_topbar_section',
		'setting'	=> 'vw_pet_care_cart_topbar_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_pet_care_topbar_button_label',array(
		'default' => 'Join Rescue Team',
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_pet_care_topbar_button_label',array(
		'label' => __('Button','vw-pet-care'),
		'input_attrs' => array(
      'placeholder' => esc_html__( 'Join Rescue Team', 'vw-pet-care' ),
      ),
		'section' => 'vw_pet_care_topbar_section',
		'setting' => 'vw_pet_care_topbar_button_label',
		'type' => 'text'
	));

	$wp_customize->add_setting('vw_pet_care_topbar_button_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));

	$wp_customize->add_control('vw_pet_care_topbar_button_url',array(
		'label'	=> __('Add Button URL','vw-pet-care'),
		'section'	=> 'vw_pet_care_topbar_section',
		'setting'	=> 'vw_pet_care_topbar_button_url',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('vw_pet_care_topbar_icon',array(
		'default'	=> 'fas fa-long-arrow-alt-right',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new VW_Pet_Care_Fontawesome_Icon_Chooser(
  $wp_customize,'vw_pet_care_topbar_icon',array(
		'label'	=> __('Add Topbar Button Arrow Icon','vw-pet-care'),
		'transport' => 'refresh',
		'section'	=> 'vw_pet_care_topbar_section',
		'setting'	=> 'vw_pet_care_topbar_icon',
		'type'		=> 'icon'
	)));

	//Menus Settings
	$wp_customize->add_section( 'vw_pet_care_menu_section' , array(
    	'title' => __( 'Menus Settings', 'vw-pet-care' ),
		'panel' => 'vw_pet_care_panel_id'
	) );

	$wp_customize->add_setting('vw_pet_care_navigation_menu_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_pet_care_navigation_menu_font_size',array(
		'label'	=> __('Menus Font Size','vw-pet-care'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-pet-care'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-pet-care' ),
        ),
		'section'=> 'vw_pet_care_menu_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_pet_care_navigation_menu_font_weight',array(
        'default' => 700,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_pet_care_sanitize_choices'
	));
	$wp_customize->add_control('vw_pet_care_navigation_menu_font_weight',array(
        'type' => 'select',
        'label' => __('Menus Font Weight','vw-pet-care'),
        'section' => 'vw_pet_care_menu_section',
        'choices' => array(
        	'100' => __('100','vw-pet-care'),
            '200' => __('200','vw-pet-care'),
            '300' => __('300','vw-pet-care'),
            '400' => __('400','vw-pet-care'),
            '500' => __('500','vw-pet-care'),
            '600' => __('600','vw-pet-care'),
            '700' => __('700','vw-pet-care'),
            '800' => __('800','vw-pet-care'),
            '900' => __('900','vw-pet-care'),
        ),
	) );

	// text trasform
	$wp_customize->add_setting('vw_pet_care_menu_text_transform',array(
		'default'=> 'Capitalize',
		'sanitize_callback'	=> 'vw_pet_care_sanitize_choices'
	));
	$wp_customize->add_control('vw_pet_care_menu_text_transform',array(
		'type' => 'radio',
		'label'	=> __('Menus Text Transform','vw-pet-care'),
		'choices' => array(
            'Uppercase' => __('Uppercase','vw-pet-care'),
            'Capitalize' => __('Capitalize','vw-pet-care'),
            'Lowercase' => __('Lowercase','vw-pet-care'),
        ),
		'section'=> 'vw_pet_care_menu_section',
	));

	$wp_customize->add_setting('vw_pet_care_menus_item_style',array(
        'default' => '',
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_pet_care_sanitize_choices'
	));
	$wp_customize->add_control('vw_pet_care_menus_item_style',array(
        'type' => 'select',
        'section' => 'vw_pet_care_menu_section',
		'label' => __('Menu Item Hover Style','vw-pet-care'),
		'choices' => array(
            'None' => __('None','vw-pet-care'),
            'Zoom In' => __('Zoom In','vw-pet-care'),
        ),
	) );

	$wp_customize->add_setting('vw_pet_care_header_menus_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_pet_care_header_menus_color', array(
		'label'    => __('Menus Color', 'vw-pet-care'),
		'section'  => 'vw_pet_care_menu_section',
	)));

	$wp_customize->add_setting('vw_pet_care_header_menus_hover_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_pet_care_header_menus_hover_color', array(
		'label'    => __('Menus Hover Color', 'vw-pet-care'),
		'section'  => 'vw_pet_care_menu_section',
	)));

	$wp_customize->add_setting('vw_pet_care_header_submenus_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_pet_care_header_submenus_color', array(
		'label'    => __('Sub Menus Color', 'vw-pet-care'),
		'section'  => 'vw_pet_care_menu_section',
	)));

	$wp_customize->add_setting('vw_pet_care_header_submenus_hover_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_pet_care_header_submenus_hover_color', array(
		'label'    => __('Sub Menus Hover Color', 'vw-pet-care'),
		'section'  => 'vw_pet_care_menu_section',
	)));

	//Social links
	$wp_customize->add_section(
		'vw_pet_care_social_links', array(
			'title'		=>	__('Social Links', 'vw-pet-care'),
			'priority'	=>	null,
			'panel'		=>	'vw_pet_care_panel_id'
		));

	$wp_customize->add_setting('vw_pet_care_social_icons',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_pet_care_social_icons',array(
		'label' =>  __('Steps to setup social icons','vw-pet-care'),
		'description' => __('<p>1. Go to Dashboard >> Appearance >> Widgets</p>
			<p>2. Add Vw Social Icon Widget in Social Widget area.</p>
			<p>3. Add social icons url and save.</p>','vw-pet-care'),
		'section'=> 'vw_pet_care_social_links',
		'type'=> 'hidden'
	));
	$wp_customize->add_setting('vw_pet_care_social_icon_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_pet_care_social_icon_btn',array(
		'description' => "<a target='_blank' href='". admin_url('widgets.php') ." '>Setup Social Icons</a>",
		'section'=> 'vw_pet_care_social_links',
		'type'=> 'hidden'
	));

	//Slider
	$wp_customize->add_section( 'vw_pet_care_slidersettings' , array(
  	'title'      => __( 'Slider Settings', 'vw-pet-care' ),
		'panel' => 'vw_pet_care_panel_id',
	) );

	$wp_customize->add_setting( 'vw_pet_care_slider_hide_show',array(
    'default' => 0,
    'transport' => 'refresh',
    'sanitize_callback' => 'vw_pet_care_switch_sanitization'
	));
	$wp_customize->add_control( new VW_Pet_Care_Toggle_Switch_Custom_Control( $wp_customize, 'vw_pet_care_slider_hide_show',array(
		'label' => esc_html__( 'Show / Hide Slider','vw-pet-care' ),
		'section' => 'vw_pet_care_slidersettings'
	)));

	$wp_customize->add_setting('vw_pet_care_banner_image',array(
		'default'	=> esc_url(get_template_directory_uri()).'assets/images/defaultbanner.png',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'vw_pet_care_banner_image',array(
    'label' => __('Slider Background Image','vw-pet-care'),
    'section' => 'vw_pet_care_slidersettings'
	)));

	$wp_customize->add_setting('vw_pet_care_slide_number',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field',
	));
	$wp_customize->add_control('vw_pet_care_slide_number',array(
		'label'	=> __('Number of slides to show','vw-pet-care'),
		'description' => __('Add Max 3 number Of slide and refresh page','vw-pet-care'),
		'section'	=> 'vw_pet_care_slidersettings',
		'type'		=> 'number',
		'input_attrs' => array(
        'min' => 0,
        'max' => 3,
    )
	));

	$vw_pet_care_count =  get_theme_mod('vw_pet_care_slide_number');

	for($vw_pet_care_i=1; $vw_pet_care_i<=$vw_pet_care_count; $vw_pet_care_i++) {

		$wp_customize->add_setting('vw_pet_care_designation_small_text'.$vw_pet_care_i,array(
			'default'	=> '',
			'sanitize_callback'	=> 'sanitize_text_field'
		));
		$wp_customize->add_control('vw_pet_care_designation_small_text'.$vw_pet_care_i,array(
			'label'	=> __('Slider Small Text','vw-pet-care'),
			'section'	=> 'vw_pet_care_slidersettings',
			'type'		=> 'text',
			'input_attrs' => array(
	      'placeholder' => __( 'WELCOME TO PETS HOME', 'vw-pet-care' ),
	      ),
		));

	 	$wp_customize->add_setting('vw_pet_care_tagline_title'.$vw_pet_care_i,array(
			'default'	=> '',
			'sanitize_callback'	=> 'sanitize_text_field'
		));
		$wp_customize->add_control('vw_pet_care_tagline_title'.$vw_pet_care_i,array(
			'label'	=> __('Slider Title','vw-pet-care'),
			'section'	=> 'vw_pet_care_slidersettings',
			'input_attrs' => array(
	        'placeholder' => __( 'We love pets because they love us to', 'vw-pet-care' ),
	        ),
			'type'	=> 'text'
		));

	 	$wp_customize->add_setting('vw_pet_care_designation_text'.$vw_pet_care_i,array(
			'default'	=> '',
			'sanitize_callback'	=> 'sanitize_text_field'
		));
		$wp_customize->add_control('vw_pet_care_designation_text'.$vw_pet_care_i,array(
			'label'	=> __('Slider Content','vw-pet-care'),
			'section'	=> 'vw_pet_care_slidersettings',
			'type'		=> 'text'
		));

		$wp_customize->add_setting('vw_pet_care_banner_button_label'.$vw_pet_care_i,array(
			'default' => '',
			'sanitize_callback' => 'sanitize_text_field'
		));
		$wp_customize->add_control('vw_pet_care_banner_button_label'.$vw_pet_care_i,array(
			'label' => __('Button','vw-pet-care'),
			'section' => 'vw_pet_care_slidersettings',
			'setting' => 'vw_pet_care_banner_button_label',
			'type' => 'text'
		));

		$wp_customize->add_setting('vw_pet_care_top_button_url'.$vw_pet_care_i,array(
			'default'	=> '',
			'sanitize_callback'	=> 'esc_url_raw'
		));

		$wp_customize->add_control('vw_pet_care_top_button_url'.$vw_pet_care_i,array(
			'label'	=> __('Add Button URL','vw-pet-care'),
			'section'	=> 'vw_pet_care_slidersettings',
			'setting'	=> 'vw_pet_care_top_button_url',
			'type'	=> 'url'
		));

		$wp_customize->add_setting('vw_pet_care_banner_background_image_sec'.$vw_pet_care_i,array(
			'default'	=> '',
			'sanitize_callback'	=> 'esc_url_raw',
		));
		$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'vw_pet_care_banner_background_image_sec'.$vw_pet_care_i,array(
      'label' => __('Slider Background Image','vw-pet-care'),
      'section' => 'vw_pet_care_slidersettings'
		)));
	}

	$wp_customize->add_setting( 'vw_pet_care_slider_arrow_hide_show',array(
    'default' => 1,
    'transport' => 'refresh',
    'sanitize_callback' => 'vw_pet_care_switch_sanitization'
	));
	$wp_customize->add_control( new VW_Pet_Care_Toggle_Switch_Custom_Control( $wp_customize, 'vw_pet_care_slider_arrow_hide_show',array(
		'label' => esc_html__( 'Show / Hide Slider Arrows','vw-pet-care' ),
		'section' => 'vw_pet_care_slidersettings',
	)));

	$wp_customize->add_setting('vw_pet_care_slider_prev_icon',array(
		'default'	=> 'fas fa-arrow-left',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new VW_Pet_Care_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_pet_care_slider_prev_icon',array(
		'label'	=> __('Add Slider Prev Icon','vw-pet-care'),
		'transport' => 'refresh',
		'section'	=> 'vw_pet_care_slidersettings',
		'setting'	=> 'vw_pet_care_slider_prev_icon',
		'type'		=> 'icon',
	)));

	$wp_customize->add_setting('vw_pet_care_slider_next_icon',array(
		'default'	=> 'fas fa-arrow-right',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new VW_Pet_Care_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_pet_care_slider_next_icon',array(
		'label'	=> __('Add Slider Next Icon','vw-pet-care'),
		'transport' => 'refresh',
		'section'	=> 'vw_pet_care_slidersettings',
		'setting'	=> 'vw_pet_care_slider_next_icon',
		'type'		=> 'icon',
	)));

	//About Us Section
	$wp_customize->add_section('vw_pet_care_about_us', array(
		'title'       => __('About Us Section', 'vw-pet-care'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','vw-pet-care'),
		'priority'    => null,
		'panel'       => 'vw_pet_care_panel_id',
	));

	$wp_customize->add_setting('vw_pet_care_about_us_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_pet_care_about_us_text',array(
		'description' => __('<p>1. More options for about us section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for about us section.</p>','vw-pet-care'),
		'section'=> 'vw_pet_care_about_us',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('vw_pet_care_about_us_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_pet_care_about_us_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=vw_pet_care_guide') ." '>More Info</a>",
		'section'=> 'vw_pet_care_about_us',
		'type'=> 'hidden'
	));

	// Our Services
	$wp_customize->add_section('vw_pet_care_our_services_section',array(
		'title'	=> esc_html__('Our Services Settings','vw-pet-care'),
		'panel' => 'vw_pet_care_panel_id',
	));

	$wp_customize->add_setting('vw_pet_care_services_small_title',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_pet_care_services_small_title',array(
		'label'	=> __('Services Small Text','vw-pet-care'),
		'section'	=> 'vw_pet_care_our_services_section',
		'type'		=> 'text',
		'input_attrs' => array(
      'placeholder' => __( 'What We Offer For You', 'vw-pet-care' ),
        ),
	));

 	$wp_customize->add_setting('vw_pet_care_services_heading',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_pet_care_services_heading',array(
		'label'	=> __('Services Title','vw-pet-care'),
		'section'	=> 'vw_pet_care_our_services_section',
		'input_attrs' => array(
      'placeholder' => __( 'Our Services', 'vw-pet-care' ),
        ),
		'type'		=> 'text'
	));

	$wp_customize->add_setting('vw_pet_care_service_background_icon',array(
		'default'	=> 'fas fa-paw',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new VW_Pet_Care_Fontawesome_Icon_Chooser(
  $wp_customize,'vw_pet_care_service_background_icon',array(
		'label'	=> __('Add Service Text Icon','vw-pet-care'),
		'transport' => 'refresh',
		'section'	=> 'vw_pet_care_our_services_section',
		'setting'	=> 'vw_pet_care_service_background_icon',
		'type'		=> 'icon'
	)));


	$args = array('numberposts' => -1);
	$post_list = get_posts($args);
	$i = 0;
	$pst[]='Select';
	foreach($post_list as $post){
		$pst[$post->post_title] = $post->post_title;
	}

	for ( $vw_pet_care_count = 1; $vw_pet_care_count < 5; $vw_pet_care_count++ ) {

	$wp_customize->add_setting('vw_pet_care_services_category'.$vw_pet_care_count,array(
		'sanitize_callback' => 'vw_pet_care_sanitize_choices',
	));
	$wp_customize->add_control('vw_pet_care_services_category'.$vw_pet_care_count,array(
		'type'    => 'select',
		'choices' => $pst,
		'label' => __('Select post','vw-pet-care'),
		'section' => 'vw_pet_care_our_services_section',
	));

	$wp_customize->add_setting('vw_pet_care_service_service_top_icon'.$vw_pet_care_count,array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new VW_Pet_Care_Fontawesome_Icon_Chooser(
  $wp_customize,'vw_pet_care_service_service_top_icon'.$vw_pet_care_count,array(
		'label'	=> __('Add Service Icon','vw-pet-care'),
		'transport' => 'refresh',
		'section'	=> 'vw_pet_care_our_services_section',
		'setting'	=> 'vw_pet_care_service_service_top_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_pet_care_service_button_label'.$vw_pet_care_count,array(
		'default' => 'Know More',
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_pet_care_service_button_label'.$vw_pet_care_count,array(
		'label' => __('Add Service Button Text','vw-pet-care'),
		'section' => 'vw_pet_care_our_services_section',
		'setting' => 'vw_pet_care_service_button_label',
		'type' => 'text'
	));

	$wp_customize->add_setting('vw_pet_care_service_button_arrow_icon'.$vw_pet_care_count,array(
		'default'	=> 'fas fa-long-arrow-alt-right',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new VW_Pet_Care_Fontawesome_Icon_Chooser(
  $wp_customize,'vw_pet_care_service_button_arrow_icon'.$vw_pet_care_count,array(
		'label'	=> __('Add Service Button Arrow Icon','vw-pet-care'),
		'transport' => 'refresh',
		'section'	=> 'vw_pet_care_our_services_section',
		'setting'	=> 'vw_pet_care_service_button_arrow_icon',
		'type'		=> 'icon'
	)));
}

	//Services excerpt
	$wp_customize->add_setting( 'vw_pet_care_services_excerpt_number', array(
		'default'              => 20,
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_pet_care_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_pet_care_services_excerpt_number', array(
		'label'       => esc_html__( 'Services Excerpt length','vw-pet-care' ),
		'section'     => 'vw_pet_care_our_services_section',
		'type'        => 'range',
		'settings'    => 'vw_pet_care_services_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	//Our Gallery Section
	$wp_customize->add_section('vw_pet_care_our_Gallery', array(
		'title'       => __('Our Gallery Section', 'vw-pet-care'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','vw-pet-care'),
		'priority'    => null,
		'panel'       => 'vw_pet_care_panel_id',
	));

	$wp_customize->add_setting('vw_pet_care_our_Gallery_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_pet_care_our_Gallery_text',array(
		'description' => __('<p>1. More options for our gallery section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for our gallery section.</p>','vw-pet-care'),
		'section'=> 'vw_pet_care_our_Gallery',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('vw_pet_care_our_Gallery_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_pet_care_our_Gallery_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=vw_pet_care_guide') ." '>More Info</a>",
		'section'=> 'vw_pet_care_our_Gallery',
		'type'=> 'hidden'
	));

	//counter Section
	$wp_customize->add_section('vw_pet_care_counter', array(
		'title'       => __('Counter Section', 'vw-pet-care'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','vw-pet-care'),
		'priority'    => null,
		'panel'       => 'vw_pet_care_panel_id',
	));

	$wp_customize->add_setting('vw_pet_care_counter_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_pet_care_counter_text',array(
		'description' => __('<p>1. More options for counter section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for counter section.</p>','vw-pet-care'),
		'section'=> 'vw_pet_care_counter',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('vw_pet_care_counter_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_pet_care_counter_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=vw_pet_care_guide') ." '>More Info</a>",
		'section'=> 'vw_pet_care_counter',
		'type'=> 'hidden'
	));

	//Our Pricing Plans Section
	$wp_customize->add_section('vw_pet_care_our_pricing_plans', array(
		'title'       => __('Our Pricing Plans Section', 'vw-pet-care'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','vw-pet-care'),
		'priority'    => null,
		'panel'       => 'vw_pet_care_panel_id',
	));

	$wp_customize->add_setting('vw_pet_care_our_pricing_plans_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_pet_care_our_pricing_plans_text',array(
		'description' => __('<p>1. More options for about us section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for about us section.</p>','vw-pet-care'),
		'section'=> 'vw_pet_care_our_pricing_plans',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('vw_pet_care_our_pricing_plans_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_pet_care_our_pricing_plans_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=vw_pet_care_guide') ." '>More Info</a>",
		'section'=> 'vw_pet_care_our_pricing_plans',
		'type'=> 'hidden'
	));

	//Our Process Section
	$wp_customize->add_section('vw_pet_care_our_process', array(
		'title'       => __('Our Process Section', 'vw-pet-care'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','vw-pet-care'),
		'priority'    => null,
		'panel'       => 'vw_pet_care_panel_id',
	));

	$wp_customize->add_setting('vw_pet_care_our_process_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_pet_care_our_process_text',array(
		'description' => __('<p>1. More options for about us section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for about us section.</p>','vw-pet-care'),
		'section'=> 'vw_pet_care_our_process',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('vw_pet_care_our_process_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_pet_care_our_process_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=vw_pet_care_guide') ." '>More Info</a>",
		'section'=> 'vw_pet_care_our_process',
		'type'=> 'hidden'
	));


	//Our Testimonial Section
	$wp_customize->add_section('vw_pet_care_our_testimonial', array(
		'title'       => __('Our Testimonial Section', 'vw-pet-care'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','vw-pet-care'),
		'priority'    => null,
		'panel'       => 'vw_pet_care_panel_id',
	));

	$wp_customize->add_setting('vw_pet_care_our_testimonial_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_pet_care_our_testimonial_text',array(
		'description' => __('<p>1. More options for our testimonial section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for our testimonial section.</p>','vw-pet-care'),
		'section'=> 'vw_pet_care_our_testimonial',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('vw_pet_care_our_testimonial_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_pet_care_our_testimonial_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=vw_pet_care_guide') ." '>More Info</a>",
		'section'=> 'vw_pet_care_our_testimonial',
		'type'=> 'hidden'
	));

	//Our Team Section
	$wp_customize->add_section('vw_pet_care_our_team', array(
		'title'       => __('Our Team Section', 'vw-pet-care'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','vw-pet-care'),
		'priority'    => null,
		'panel'       => 'vw_pet_care_panel_id',
	));

	$wp_customize->add_setting('vw_pet_care_our_team_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_pet_care_our_team_text',array(
		'description' => __('<p>1. More options for our team section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for our team section.</p>','vw-pet-care'),
		'section'=> 'vw_pet_care_our_team',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('vw_pet_care_our_team_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_pet_care_our_team_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=vw_pet_care_guide') ." '>More Info</a>",
		'section'=> 'vw_pet_care_our_team',
		'type'=> 'hidden'
	));

	//Our Pets Section
	$wp_customize->add_section('vw_pet_care_our_pets', array(
		'title'       => __('Our Pets Section', 'vw-pet-care'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','vw-pet-care'),
		'priority'    => null,
		'panel'       => 'vw_pet_care_panel_id',
	));

	$wp_customize->add_setting('vw_pet_care_our_pets_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_pet_care_our_pets_text',array(
		'description' => __('<p>1. More options for our team section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for our team section.</p>','vw-pet-care'),
		'section'=> 'vw_pet_care_our_pets',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('vw_pet_care_our_pets_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_pet_care_our_pets_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=vw_pet_care_guide') ." '>More Info</a>",
		'section'=> 'vw_pet_care_our_pets',
		'type'=> 'hidden'
	));

	//Partner Section
	$wp_customize->add_section('vw_pet_care_partner', array(
		'title'       => __('Partner Section', 'vw-pet-care'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','vw-pet-care'),
		'priority'    => null,
		'panel'       => 'vw_pet_care_panel_id',
	));

	$wp_customize->add_setting('vw_pet_care_partner_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_pet_care_partner_text',array(
		'description' => __('<p>1. More options for partner section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for partner section.</p>','vw-pet-care'),
		'section'=> 'vw_pet_care_partner',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('vw_pet_care_partner_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_pet_care_partner_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=vw_pet_care_guide') ." '>More Info</a>",
		'section'=> 'vw_pet_care_partner',
		'type'=> 'hidden'
	));

	//Faq Section
	$wp_customize->add_section('vw_pet_care_faq', array(
		'title'       => __('Faq Section', 'vw-pet-care'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','vw-pet-care'),
		'priority'    => null,
		'panel'       => 'vw_pet_care_panel_id',
	));

	$wp_customize->add_setting('vw_pet_care_faq_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_pet_care_faq_text',array(
		'description' => __('<p>1. More options for faq section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for faq section.</p>','vw-pet-care'),
		'section'=> 'vw_pet_care_faq',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('vw_pet_care_faq_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_pet_care_faq_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=vw_pet_care_guide') ." '>More Info</a>",
		'section'=> 'vw_pet_care_faq',
		'type'=> 'hidden'
	));

	//our blog Section
	$wp_customize->add_section('vw_pet_care_our_blog', array(
		'title'       => __('Our Blog Section', 'vw-pet-care'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','vw-pet-care'),
		'priority'    => null,
		'panel'       => 'vw_pet_care_panel_id',
	));

	$wp_customize->add_setting('vw_pet_care_our_blog_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_pet_care_our_blog_text',array(
		'description' => __('<p>1. More options for our blog section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for our blog section.</p>','vw-pet-care'),
		'section'=> 'vw_pet_care_our_blog',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('vw_pet_care_our_blog_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_pet_care_our_blog_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=vw_pet_care_guide') ." '>More Info</a>",
		'section'=> 'vw_pet_care_our_blog',
		'type'=> 'hidden'
	));

	//Footer Text
	$wp_customize->add_section('vw_pet_care_footer',array(
		'title'	=> esc_html__('Footer Settings','vw-pet-care'),
		'panel' => 'vw_pet_care_panel_id',
	));

	// font size button
	$wp_customize->add_setting('vw_pet_care_button_footer_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_pet_care_button_footer_font_size',array(
		'label'	=> __('Footer Heading Font Size','vw-pet-care'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-pet-care'),
		'input_attrs' => array(
  		'placeholder' => __( '10px', 'vw-pet-care' ),
    ),
  	'type'        => 'text',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
		'section'=> 'vw_pet_care_footer',
	));

	$wp_customize->add_setting('vw_pet_care_button_footer_heading_letter_spacing',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_pet_care_button_footer_heading_letter_spacing',array(
		'label'	=> __('Heading Letter Spacing','vw-pet-care'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-pet-care'),
		'input_attrs' => array(
      	'placeholder' => __( '10px', 'vw-pet-care' ),
  ),
  	'type'        => 'text',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
	),
		'section'=> 'vw_pet_care_footer',
	));

	// text trasform
	$wp_customize->add_setting('vw_pet_care_button_footer_text_transform',array(
		'default'=> 'Capitalize',
		'sanitize_callback'	=> 'vw_pet_care_sanitize_choices'
	));
	$wp_customize->add_control('vw_pet_care_button_footer_text_transform',array(
		'type' => 'radio',
		'label'	=> __('Heading Text Transform','vw-pet-care'),
		'choices' => array(
      'Uppercase' => __('Uppercase','vw-pet-care'),
      'Capitalize' => __('Capitalize','vw-pet-care'),
      'Lowercase' => __('Lowercase','vw-pet-care'),
    ),
		'section'=> 'vw_pet_care_footer',
	));

	$wp_customize->add_setting('vw_pet_care_footer_heading_weight',array(
        'default' => 600,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_pet_care_sanitize_choices'
	));
	$wp_customize->add_control('vw_pet_care_footer_heading_weight',array(
        'type' => 'select',
        'label' => __('Heading Font Weight','vw-pet-care'),
        'section' => 'vw_pet_care_footer',
        'choices' => array(
        	'100' => __('100','vw-pet-care'),
            '200' => __('200','vw-pet-care'),
            '300' => __('300','vw-pet-care'),
            '400' => __('400','vw-pet-care'),
            '500' => __('500','vw-pet-care'),
            '600' => __('600','vw-pet-care'),
            '700' => __('700','vw-pet-care'),
            '800' => __('800','vw-pet-care'),
            '900' => __('900','vw-pet-care'),
        ),
	) );

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_pet_care_footer_text', array(
		'selector' => '.copyright p',
		'render_callback' => 'vw_pet_care_Customize_partial_vw_pet_care_footer_text',
	));

  $wp_customize->add_setting('vw_pet_care_footer_template',array(
      'default'	=> esc_html('vw_pet_care-footer-one'),
      'sanitize_callback'	=> 'vw_pet_care_sanitize_choices'
  ));
  $wp_customize->add_control('vw_pet_care_footer_template',array(
    'label'	=> esc_html__('Footer Style','vw-pet-care'),
    'section'	=> 'vw_pet_care_footer',
    'setting'	=> 'vw_pet_care_footer_template',
    'type' => 'select',
    'choices' => array(
        'vw_pet_care-footer-one' => esc_html__('Style 1', 'vw-pet-care'),
        'vw_pet_care-footer-two' => esc_html__('Style 2', 'vw-pet-care'),
        'vw_pet_care-footer-three' => esc_html__('Style 3', 'vw-pet-care'),
        'vw_pet_care-footer-four' => esc_html__('Style 4', 'vw-pet-care'),
        'vw_pet_care-footer-five' => esc_html__('Style 5', 'vw-pet-care'),
        )
  ));

	$wp_customize->add_setting('vw_pet_care_footer_background_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_pet_care_footer_background_color', array(
		'label'    => __('Footer Background Color', 'vw-pet-care'),
		'section'  => 'vw_pet_care_footer',
	)));

	$wp_customize->add_setting('vw_pet_care_footer_background_image',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'vw_pet_care_footer_background_image',array(
    'label' => __('Footer Background Image','vw-pet-care'),
    'section' => 'vw_pet_care_footer'
	)));

	$wp_customize->add_setting('vw_pet_care_footer_img_position',array(
	  'default' => 'center center',
	  'transport' => 'refresh',
	  'sanitize_callback' => 'vw_pet_care_sanitize_choices'
	));
	$wp_customize->add_control('vw_pet_care_footer_img_position',array(
		'type' => 'select',
		'label' => __('Footer Image Position','vw-pet-care'),
		'section' => 'vw_pet_care_footer',
		'choices' 	=> array(
			'left top' 		=> esc_html__( 'Top Left', 'vw-pet-care' ),
			'center top'   => esc_html__( 'Top', 'vw-pet-care' ),
			'right top'   => esc_html__( 'Top Right', 'vw-pet-care' ),
			'left center'   => esc_html__( 'Left', 'vw-pet-care' ),
			'center center'   => esc_html__( 'Center', 'vw-pet-care' ),
			'right center'   => esc_html__( 'Right', 'vw-pet-care' ),
			'left bottom'   => esc_html__( 'Bottom Left', 'vw-pet-care' ),
			'center bottom'   => esc_html__( 'Bottom', 'vw-pet-care' ),
			'right bottom'   => esc_html__( 'Bottom Right', 'vw-pet-care' ),
		),
	));

  // Footer
  $wp_customize->add_setting('vw_pet_care_img_footer',array(
    'default'=> 'scroll',
    'sanitize_callback' => 'vw_pet_care_sanitize_choices'
  ));
  $wp_customize->add_control('vw_pet_care_img_footer',array(
    'type' => 'select',
    'label' => __('Footer Background Attatchment','vw-pet-care'),
    'choices' => array(
      'fixed' => __('fixed','vw-pet-care'),
      'scroll' => __('scroll','vw-pet-care'),
    ),
    'section'=> 'vw_pet_care_footer',
  ));

  // footer padding
  $wp_customize->add_setting('vw_pet_care_footer_padding',array(
    'default'=> '',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control('vw_pet_care_footer_padding',array(
    'label' => __('Footer Top Bottom Padding','vw-pet-care'),
    'description' => __('Enter a value in pixels. Example:20px','vw-pet-care'),
    'input_attrs' => array(
      'placeholder' => __( '10px', 'vw-pet-care' ),
    ),
    'section'=> 'vw_pet_care_footer',
    'type'=> 'text'
  ));

  $wp_customize->add_setting('vw_pet_care_footer_widgets_heading',array(
    'default' => 'Left',
    'transport' => 'refresh',
    'sanitize_callback' => 'vw_pet_care_sanitize_choices'
  ));
  $wp_customize->add_control('vw_pet_care_footer_widgets_heading',array(
    'type' => 'select',
    'label' => __('Footer Widget Heading','vw-pet-care'),
    'section' => 'vw_pet_care_footer',
    'choices' => array(
      'Left' => __('Left','vw-pet-care'),
      'Center' => __('Center','vw-pet-care'),
      'Right' => __('Right','vw-pet-care')
    ),
  ) );

  $wp_customize->add_setting('vw_pet_care_footer_widgets_content',array(
    'default' => 'Left',
    'transport' => 'refresh',
    'sanitize_callback' => 'vw_pet_care_sanitize_choices'
  ));
  $wp_customize->add_control('vw_pet_care_footer_widgets_content',array(
    'type' => 'select',
    'label' => __('Footer Widget Content','vw-pet-care'),
    'section' => 'vw_pet_care_footer',
    'choices' => array(
      'Left' => __('Left','vw-pet-care'),
      'Center' => __('Center','vw-pet-care'),
      'Right' => __('Right','vw-pet-care')
  	),
	) );

	$wp_customize->add_setting('vw_pet_care_footer_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_pet_care_footer_text',array(
		'label'	=> esc_html__('Copyright Text','vw-pet-care'),
		'input_attrs' => array(
      'placeholder' => esc_html__( 'Copyright 2024, .....', 'vw-pet-care' ),
      ),
		'section'=> 'vw_pet_care_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_pet_care_copyright_hide_show',array(
	  'default' => 1,
	  'transport' => 'refresh',
	  'sanitize_callback' => 'vw_pet_care_switch_sanitization'
	));
	$wp_customize->add_control( new VW_Pet_Care_Toggle_Switch_Custom_Control( $wp_customize, 'vw_pet_care_copyright_hide_show',array(
		'label' => esc_html__( 'Show / Hide Copyright','vw-pet-care' ),
		'section' => 'vw_pet_care_footer'
	)));

	$wp_customize->add_setting('vw_pet_care_copyright_alingment',array(
    'default' => 'center',
    'sanitize_callback' => 'vw_pet_care_sanitize_choices'
	));
	$wp_customize->add_control(new VW_Pet_Care_Image_Radio_Control($wp_customize, 'vw_pet_care_copyright_alingment', array(
    'type' => 'select',
    'label' => esc_html__('Copyright Alignment','vw-pet-care'),
    'section' => 'vw_pet_care_footer',
    'settings' => 'vw_pet_care_copyright_alingment',
    'choices' => array(
        'left' => esc_url(get_template_directory_uri()).'/assets/images/copyright1.png',
        'center' => esc_url(get_template_directory_uri()).'/assets/images/copyright2.png',
        'right' => esc_url(get_template_directory_uri()).'/assets/images/copyright3.png'
  ))));

	$wp_customize->add_setting('vw_pet_care_copyright_background_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_pet_care_copyright_background_color', array(
		'label'    => __('Copyright Background Color', 'vw-pet-care'),
		'section'  => 'vw_pet_care_footer',
	)));

	$wp_customize->add_setting('vw_pet_care_copyright_font_size',array(
		'default'=> '',
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_pet_care_copyright_font_size',array(
		'label' => __('Copyright Font Size','vw-pet-care'),
		'description' => __('Enter a value in pixels. Example:20px','vw-pet-care'),
		'input_attrs' => array(
      	'placeholder' => __( '10px', 'vw-pet-care' ),
	    ),
		'section'=> 'vw_pet_care_footer',
		'type'=> 'text'
	));

  $wp_customize->add_setting( 'vw_pet_care_hide_show_scroll',array(
  	'default' => 1,
  	'transport' => 'refresh',
  	'sanitize_callback' => 'vw_pet_care_switch_sanitization'
  ));
  $wp_customize->add_control( new VW_Pet_Care_Toggle_Switch_Custom_Control( $wp_customize, 'vw_pet_care_hide_show_scroll',array(
  	'label' => esc_html__( 'Show / Hide Scroll to Top','vw-pet-care' ),
  	'section' => 'vw_pet_care_footer'
  )));

  //Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_pet_care_scroll_to_top_icon', array(
		'selector' => '.scrollup i',
		'render_callback' => 'vw_pet_care_Customize_partial_vw_pet_care_scroll_to_top_icon',
	));

  $wp_customize->add_setting('vw_pet_care_scroll_top_alignment',array(
    'default' => 'Right',
    'sanitize_callback' => 'vw_pet_care_sanitize_choices'
	));
	$wp_customize->add_control(new VW_Pet_Care_Image_Radio_Control($wp_customize, 'vw_pet_care_scroll_top_alignment', array(
    'type' => 'select',
    'label' => esc_html__('Scroll To Top','vw-pet-care'),
    'section' => 'vw_pet_care_footer',
    'settings' => 'vw_pet_care_scroll_top_alignment',
    'choices' => array(
        'Left' => esc_url(get_template_directory_uri()).'/assets/images/layout1.png',
        'Center' => esc_url(get_template_directory_uri()).'/assets/images/layout2.png',
        'Right' => esc_url(get_template_directory_uri()).'/assets/images/layout3.png'
  ))));

 	$wp_customize->add_setting('vw_pet_care_scroll_top_icon',array(
    'default' => 'fas fa-long-arrow-alt-up',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control(new VW_Pet_Care_Fontawesome_Icon_Chooser($wp_customize,'vw_pet_care_scroll_top_icon',array(
    'label' => __('Add Scroll to Top Icon','vw-pet-care'),
    'transport' => 'refresh',
    'section' => 'vw_pet_care_footer',
    'setting' => 'vw_pet_care_scroll_top_icon',
    'type'    => 'icon'
  )));

  $wp_customize->add_setting('vw_pet_care_scroll_to_top_font_size',array(
    'default'=> '',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control('vw_pet_care_scroll_to_top_font_size',array(
    'label' => __('Icon Font Size','vw-pet-care'),
    'description' => __('Enter a value in pixels. Example:20px','vw-pet-care'),
    'input_attrs' => array(
      'placeholder' => __( '10px', 'vw-pet-care' ),
    ),
    'section'=> 'vw_pet_care_footer',
    'type'=> 'text'
  ));

  $wp_customize->add_setting('vw_pet_care_scroll_to_top_padding',array(
    'default'=> '',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control('vw_pet_care_scroll_to_top_padding',array(
    'label' => __('Icon Top Bottom Padding','vw-pet-care'),
    'description' => __('Enter a value in pixels. Example:20px','vw-pet-care'),
    'input_attrs' => array(
      'placeholder' => __( '10px', 'vw-pet-care' ),
    ),
    'section'=> 'vw_pet_care_footer',
    'type'=> 'text'
  ));

  $wp_customize->add_setting('vw_pet_care_scroll_to_top_width',array(
    'default'=> '',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control('vw_pet_care_scroll_to_top_width',array(
    'label' => __('Icon Width','vw-pet-care'),
    'description' => __('Enter a value in pixels Example:20px','vw-pet-care'),
    'input_attrs' => array(
      'placeholder' => __( '10px', 'vw-pet-care' ),
  ),
	  'section'=> 'vw_pet_care_footer',
	  'type'=> 'text'
  ));

  $wp_customize->add_setting('vw_pet_care_scroll_to_top_height',array(
    'default'=> '',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control('vw_pet_care_scroll_to_top_height',array(
    'label' => __('Icon Height','vw-pet-care'),
    'description' => __('Enter a value in pixels. Example:20px','vw-pet-care'),
    'input_attrs' => array(
      'placeholder' => __( '10px', 'vw-pet-care' ),
    ),
    'section'=> 'vw_pet_care_footer',
    'type'=> 'text'
  ));

  $wp_customize->add_setting( 'vw_pet_care_scroll_to_top_border_radius', array(
    'default'              => '',
    'transport'        => 'refresh',
    'sanitize_callback'    => 'vw_pet_care_sanitize_number_range'
  ) );
  $wp_customize->add_control( 'vw_pet_care_scroll_to_top_border_radius', array(
    'label'       => esc_html__( 'Icon Border Radius','vw-pet-care' ),
    'section'     => 'vw_pet_care_footer',
    'type'        => 'range',
    'input_attrs' => array(
      'step'             => 1,
      'min'              => 1,
      'max'              => 50,
    ),
  ) );

 	//Blog Post
	$wp_customize->add_panel( 'vw_pet_care_blog_post_parent_panel', array(
		'title' => esc_html__( 'Blog Post Settings', 'vw-pet-care' ),
		'panel' => 'vw_pet_care_panel_id',
		'priority' => 20,
	));

	// Add example section and controls to the middle (second) panel
	$wp_customize->add_section( 'vw_pet_care_post_settings', array(
		'title' => esc_html__( 'Post Settings', 'vw-pet-care' ),
		'panel' => 'vw_pet_care_blog_post_parent_panel',
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_pet_care_toggle_postdate', array(
		'selector' => '.post-main-box h2 a',
		'render_callback' => 'vw_pet_care_Customize_partial_vw_pet_care_toggle_postdate',
	));

	//Blog layout
  $wp_customize->add_setting('vw_pet_care_blog_layout_option',array(
    'default' => 'Default',
    'sanitize_callback' => 'vw_pet_care_sanitize_choices'
  ));
  $wp_customize->add_control(new VW_Pet_Care_Image_Radio_Control($wp_customize, 'vw_pet_care_blog_layout_option', array(
    'type' => 'select',
    'label' => __('Blog Post Layouts','vw-pet-care'),
    'section' => 'vw_pet_care_post_settings',
    'choices' => array(
      'Default' => esc_url(get_template_directory_uri()).'/assets/images/blog-layout1.png',
      'Center' => esc_url(get_template_directory_uri()).'/assets/images/blog-layout2.png',
      'Left' => esc_url(get_template_directory_uri()).'/assets/images/blog-layout3.png',
  ))));

	$wp_customize->add_setting('vw_pet_care_theme_options',array(
    'default' => 'Right Sidebar',
    'sanitize_callback' => 'vw_pet_care_sanitize_choices'
	));
	$wp_customize->add_control('vw_pet_care_theme_options',array(
    'type' => 'select',
    'label' => esc_html__('Post Sidebar Layout','vw-pet-care'),
    'description' => esc_html__('Here you can change the sidebar layout for posts. ','vw-pet-care'),
    'section' => 'vw_pet_care_post_settings',
    'choices' => array(
        'Left Sidebar' => esc_html__('Left Sidebar','vw-pet-care'),
        'Right Sidebar' => esc_html__('Right Sidebar','vw-pet-care'),
        'One Column' => esc_html__('One Column','vw-pet-care'),
        'Grid Layout' => esc_html__('Grid Layout','vw-pet-care')
    ),
	) );

 	$wp_customize->add_setting('vw_pet_care_theme_options',array(
    'default' => 'Right Sidebar',
    'sanitize_callback' => 'vw_pet_care_sanitize_choices'
	));
	$wp_customize->add_control('vw_pet_care_theme_options',array(
    'type' => 'select',
    'label' => esc_html__('Post Sidebar Layout','vw-pet-care'),
    'description' => esc_html__('Here you can change the sidebar layout for posts. ','vw-pet-care'),
    'section' => 'vw_pet_care_post_settings',
    'choices' => array(
        'Left Sidebar' => esc_html__('Left Sidebar','vw-pet-care'),
        'Right Sidebar' => esc_html__('Right Sidebar','vw-pet-care'),
        'One Column' => esc_html__('One Column','vw-pet-care'),
        'Grid Layout' => esc_html__('Grid Layout','vw-pet-care')
        ),
	) );

	$wp_customize->add_setting('vw_pet_care_theme_options',array(
    'default' => 'Right Sidebar',
    'sanitize_callback' => 'vw_pet_care_sanitize_choices'
	));
	$wp_customize->add_control('vw_pet_care_theme_options',array(
    'type' => 'select',
    'label' => esc_html__('Post Sidebar Layout','vw-pet-care'),
    'description' => esc_html__('Here you can change the sidebar layout for posts. ','vw-pet-care'),
    'section' => 'vw_pet_care_post_settings',
    'choices' => array(
        'Left Sidebar' => esc_html__('Left Sidebar','vw-pet-care'),
        'Right Sidebar' => esc_html__('Right Sidebar','vw-pet-care'),
        'One Column' => esc_html__('One Column','vw-pet-care'),
        'Grid Layout' => esc_html__('Grid Layout','vw-pet-care')
        ),
	) );

	$wp_customize->add_setting('vw_pet_care_toggle_postdate_icon',array(
		'default'	=> 'fas fa-calendar-alt',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new VW_Pet_Care_Fontawesome_Icon_Chooser(
  $wp_customize,'vw_pet_care_toggle_postdate_icon',array(
		'label'	=> __('Add Post Date Icon','vw-pet-care'),
		'transport' => 'refresh',
		'section'	=> 'vw_pet_care_post_settings',
		'setting'	=> 'vw_pet_care_toggle_postdate_icon',
		'type'		=> 'icon'
	)));

 	$wp_customize->add_setting( 'vw_pet_care_blog_toggle_postdate',array(
    'default' => 1,
    'transport' => 'refresh',
    'sanitize_callback' => 'vw_pet_care_switch_sanitization'
  ));
  $wp_customize->add_control( new VW_Pet_Care_Toggle_Switch_Custom_Control( $wp_customize, 'vw_pet_care_blog_toggle_postdate',array(
    'label' => esc_html__( 'Show / Hide Post Date','vw-pet-care' ),
    'section' => 'vw_pet_care_post_settings'
  )));

	$wp_customize->add_setting('vw_pet_care_toggle_author_icon',array(
		'default'	=> 'fas fa-user',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new VW_Pet_Care_Fontawesome_Icon_Chooser(
  $wp_customize,'vw_pet_care_toggle_author_icon',array(
		'label'	=> __('Add Author Icon','vw-pet-care'),
		'transport' => 'refresh',
		'section'	=> 'vw_pet_care_post_settings',
		'setting'	=> 'vw_pet_care_toggle_author_icon',
		'type'		=> 'icon'
	)));

  $wp_customize->add_setting( 'vw_pet_care_blog_toggle_author',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_pet_care_switch_sanitization'
  ));
  $wp_customize->add_control( new VW_Pet_Care_Toggle_Switch_Custom_Control( $wp_customize, 'vw_pet_care_blog_toggle_author',array(
		'label' => esc_html__( 'Show / Hide Author','vw-pet-care' ),
		'section' => 'vw_pet_care_post_settings'
  )));

  $wp_customize->add_setting('vw_pet_care_toggle_comments_icon',array(
		'default'	=> 'fa fa-comments',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new VW_Pet_Care_Fontawesome_Icon_Chooser(
  $wp_customize,'vw_pet_care_toggle_comments_icon',array(
		'label'	=> __('Add Comments Icon','vw-pet-care'),
		'transport' => 'refresh',
		'section'	=> 'vw_pet_care_post_settings',
		'setting'	=> 'vw_pet_care_toggle_comments_icon',
		'type'		=> 'icon'
	)));

  $wp_customize->add_setting( 'vw_pet_care_blog_toggle_comments',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_pet_care_switch_sanitization'
  ) );
  $wp_customize->add_control( new VW_Pet_Care_Toggle_Switch_Custom_Control( $wp_customize, 'vw_pet_care_blog_toggle_comments',array(
		'label' => esc_html__( 'Show / Hide Comments','vw-pet-care' ),
		'section' => 'vw_pet_care_post_settings'
  )));

  $wp_customize->add_setting('vw_pet_care_toggle_time_icon',array(
		'default'	=> 'fas fa-clock',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new VW_Pet_Care_Fontawesome_Icon_Chooser(
  $wp_customize,'vw_pet_care_toggle_time_icon',array(
		'label'	=> __('Add Time Icon','vw-pet-care'),
		'transport' => 'refresh',
		'section'	=> 'vw_pet_care_post_settings',
		'setting'	=> 'vw_pet_care_toggle_time_icon',
		'type'		=> 'icon'
	)));

  $wp_customize->add_setting( 'vw_pet_care_blog_toggle_time',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_pet_care_switch_sanitization'
  ) );
  $wp_customize->add_control( new VW_Pet_Care_Toggle_Switch_Custom_Control( $wp_customize, 'vw_pet_care_blog_toggle_time',array(
		'label' => esc_html__( 'Show / Hide Time','vw-pet-care' ),
		'section' => 'vw_pet_care_post_settings'
  )));

  $wp_customize->add_setting( 'vw_pet_care_featured_image_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_pet_care_switch_sanitization'
	));
  $wp_customize->add_control( new VW_Pet_Care_Toggle_Switch_Custom_Control( $wp_customize, 'vw_pet_care_featured_image_hide_show', array(
		'label' => esc_html__( 'Show / Hide Featured Image','vw-pet-care' ),
		'section' => 'vw_pet_care_post_settings'
  )));

  $wp_customize->add_setting( 'vw_pet_care_featured_image_border_radius', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_pet_care_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_pet_care_featured_image_border_radius', array(
		'label'       => esc_html__( 'Featured Image Border Radius','vw-pet-care' ),
		'section'     => 'vw_pet_care_post_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting( 'vw_pet_care_featured_image_box_shadow', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_pet_care_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_pet_care_featured_image_box_shadow', array(
		'label'       => esc_html__( 'Featured Image Box Shadow','vw-pet-care' ),
		'section'     => 'vw_pet_care_post_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	//Featured Image
	$wp_customize->add_setting('vw_pet_care_blog_post_featured_image_dimension',array(
   'default' => 'default',
   'sanitize_callback'	=> 'vw_pet_care_sanitize_choices'
	));
	$wp_customize->add_control('vw_pet_care_blog_post_featured_image_dimension',array(
		'type' => 'select',
		'label'	=> __('Blog Post Featured Image Dimension','vw-pet-care'),
		'section'	=> 'vw_pet_care_post_settings',
		'choices' => array(
		'default' => __('Default','vw-pet-care'),
		'custom' => __('Custom Image Size','vw-pet-care'),
      ),
	));

	$wp_customize->add_setting('vw_pet_care_blog_post_featured_image_custom_width',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
		));
	$wp_customize->add_control('vw_pet_care_blog_post_featured_image_custom_width',array(
		'label'	=> __('Featured Image Custom Width','vw-pet-care'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-pet-care'),
		'input_attrs' => array(
    	'placeholder' => __( '10px', 'vw-pet-care' ),),
		'section'=> 'vw_pet_care_post_settings',
		'type'=> 'text',
		'active_callback' => 'vw_pet_care_blog_post_featured_image_dimension'
		));

	$wp_customize->add_setting('vw_pet_care_blog_post_featured_image_custom_height',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_pet_care_blog_post_featured_image_custom_height',array(
		'label'	=> __('Featured Image Custom Height','vw-pet-care'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-pet-care'),
		'input_attrs' => array(
    	'placeholder' => __( '10px', 'vw-pet-care' ),),
		'section'=> 'vw_pet_care_post_settings',
		'type'=> 'text',
		'active_callback' => 'vw_pet_care_blog_post_featured_image_dimension'
	));

  $wp_customize->add_setting( 'vw_pet_care_excerpt_number', array(
		'default'              => 30,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_pet_care_sanitize_number_range',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'vw_pet_care_excerpt_number', array(
		'label'       => esc_html__( 'Excerpt length','vw-pet-care' ),
		'section'     => 'vw_pet_care_post_settings',
		'type'        => 'range',
		'settings'    => 'vw_pet_care_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting('vw_pet_care_meta_field_separator',array(
		'default'=> '|',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_pet_care_meta_field_separator',array(
		'label'	=> __('Add Meta Separator','vw-pet-care'),
		'description' => __('Add the seperator for meta box. Example: "|", "/", etc.','vw-pet-care'),
		'section'=> 'vw_pet_care_post_settings',
		'type'=> 'text'
	));

  $wp_customize->add_setting('vw_pet_care_excerpt_settings',array(
    'default' => 'Excerpt',
    'transport' => 'refresh',
    'sanitize_callback' => 'vw_pet_care_sanitize_choices'
	));
	$wp_customize->add_control('vw_pet_care_excerpt_settings',array(
    'type' => 'select',
    'label' => esc_html__('Post Content','vw-pet-care'),
    'section' => 'vw_pet_care_post_settings',
    'choices' => array(
    	'Content' => esc_html__('Content','vw-pet-care'),
        'Excerpt' => esc_html__('Excerpt','vw-pet-care'),
        'No Content' => esc_html__('No Content','vw-pet-care')
        ),
	) );

  $wp_customize->add_setting('vw_pet_care_blog_page_posts_settings',array(
    'default' => 'Into Blocks',
    'transport' => 'refresh',
    'sanitize_callback' => 'vw_pet_care_sanitize_choices'
	));
	$wp_customize->add_control('vw_pet_care_blog_page_posts_settings',array(
    'type' => 'select',
    'label' => __('Display Blog Posts','vw-pet-care'),
    'section' => 'vw_pet_care_post_settings',
    'choices' => array(
    	'Into Blocks' => __('Into Blocks','vw-pet-care'),
        'Without Blocks' => __('Without Blocks','vw-pet-care')
        ),
	) );

	$wp_customize->add_setting( 'vw_pet_care_blog_pagination_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_pet_care_switch_sanitization'
  ));
  $wp_customize->add_control( new VW_Pet_Care_Toggle_Switch_Custom_Control( $wp_customize, 'vw_pet_care_blog_pagination_hide_show',array(
		'label' => esc_html__( 'Show / Hide Blog Pagination','vw-pet-care' ),
		'section' => 'vw_pet_care_post_settings'
  )));

	$wp_customize->add_setting('vw_pet_care_blog_excerpt_suffix',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_pet_care_blog_excerpt_suffix',array(
		'label'	=> __('Add Excerpt Suffix','vw-pet-care'),
		'input_attrs' => array(
      'placeholder' => __( '[...]', 'vw-pet-care' ),
        ),
		'section'=> 'vw_pet_care_post_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_pet_care_blog_pagination_type', array(
    'default'			=> 'blog-page-numbers',
    'sanitize_callback'	=> 'vw_pet_care_sanitize_choices'
  ));
  $wp_customize->add_control( 'vw_pet_care_blog_pagination_type', array(
    'section' => 'vw_pet_care_post_settings',
    'type' => 'select',
    'label' => __( 'Blog Pagination', 'vw-pet-care' ),
    'choices'		=> array(
      'blog-page-numbers'  => __( 'Numeric', 'vw-pet-care' ),
      'next-prev' => __( 'Older Posts/Newer Posts', 'vw-pet-care' ),
  )));

  // Button Settings
	$wp_customize->add_section( 'vw_pet_care_button_settings', array(
		'title' => esc_html__( 'Button Settings', 'vw-pet-care' ),
		'panel' => 'vw_pet_care_blog_post_parent_panel',
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_pet_care_button_text', array(
		'selector' => '.post-main-box .more-btn a',
		'render_callback' => 'vw_pet_care_Customize_partial_vw_pet_care_button_text',
	));

  $wp_customize->add_setting('vw_pet_care_button_text',array(
		'default'=> esc_html__('Read More','vw-pet-care'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_pet_care_button_text',array(
		'label'	=> esc_html__('Add Button Text','vw-pet-care'),
		'input_attrs' => array(
    'placeholder' => esc_html__( 'Read More', 'vw-pet-care' ),
        ),
		'section'=> 'vw_pet_care_button_settings',
		'type'=> 'text'
	));

	// font size button
	$wp_customize->add_setting('vw_pet_care_button_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_pet_care_button_font_size',array(
		'label'	=> __('Button Font Size','vw-pet-care'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-pet-care'),
		'input_attrs' => array(
  		'placeholder' => __( '10px', 'vw-pet-care' ),
    ),
  	'type'        => 'text',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
		'section'=> 'vw_pet_care_button_settings',
	));


	$wp_customize->add_setting( 'vw_pet_care_button_border_radius', array(
		'default'              => 5,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_pet_care_sanitize_number_range',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'vw_pet_care_button_border_radius', array(
		'label'       => esc_html__( 'Button Border Radius','vw-pet-care' ),
		'section'     => 'vw_pet_care_button_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	// button padding
	$wp_customize->add_setting('vw_pet_care_button_top_bottom_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_pet_care_button_top_bottom_padding',array(
		'label'	=> __('Button Top Bottom Padding','vw-pet-care'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-pet-care'),
		'input_attrs' => array(
      'placeholder' => __( '10px', 'vw-pet-care' ),
    ),
		'section'=> 'vw_pet_care_button_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_pet_care_button_left_right_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_pet_care_button_left_right_padding',array(
		'label'	=> __('Button Left Right Padding','vw-pet-care'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-pet-care'),
		'input_attrs' => array(
      'placeholder' => __( '10px', 'vw-pet-care' ),
    ),
		'section'=> 'vw_pet_care_button_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_pet_care_button_letter_spacing',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_pet_care_button_letter_spacing',array(
		'label'	=> __('Button Letter Spacing','vw-pet-care'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-pet-care'),
		'input_attrs' => array(
      	'placeholder' => __( '10px', 'vw-pet-care' ),
  ),
  	'type'        => 'text',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
	),
		'section'=> 'vw_pet_care_button_settings',
	));

	// text trasform
	$wp_customize->add_setting('vw_pet_care_button_text_transform',array(
		'default'=> 'Capitalize',
		'sanitize_callback'	=> 'vw_pet_care_sanitize_choices'
	));
	$wp_customize->add_control('vw_pet_care_button_text_transform',array(
		'type' => 'radio',
		'label'	=> __('Button Text Transform','vw-pet-care'),
		'choices' => array(
      'Uppercase' => __('Uppercase','vw-pet-care'),
      'Capitalize' => __('Capitalize','vw-pet-care'),
      'Lowercase' => __('Lowercase','vw-pet-care'),
    ),
		'section'=> 'vw_pet_care_button_settings',
	));

	// Related Post Settings
	$wp_customize->add_section( 'vw_pet_care_related_posts_settings', array(
		'title' => esc_html__( 'Related Posts Settings', 'vw-pet-care' ),
		'panel' => 'vw_pet_care_blog_post_parent_panel',
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_pet_care_related_post_title', array(
		'selector' => '.related-post h3',
		'render_callback' => 'vw_pet_care_Customize_partial_vw_pet_care_related_post_title',
	));

  $wp_customize->add_setting( 'vw_pet_care_related_post',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_pet_care_switch_sanitization'
  ) );
  $wp_customize->add_control( new VW_Pet_Care_Toggle_Switch_Custom_Control( $wp_customize, 'vw_pet_care_related_post',array(
		'label' => esc_html__( 'Related Post','vw-pet-care' ),
		'section' => 'vw_pet_care_related_posts_settings'
  )));

  $wp_customize->add_setting('vw_pet_care_related_post_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_pet_care_related_post_title',array(
		'label'	=> esc_html__('Add Related Post Title','vw-pet-care'),
		'input_attrs' => array(
      'placeholder' => esc_html__( 'Related Post', 'vw-pet-care' ),
        ),
		'section'=> 'vw_pet_care_related_posts_settings',
		'type'=> 'text'
	));

 	$wp_customize->add_setting('vw_pet_care_related_posts_count',array(
		'default'=> 3,
		'sanitize_callback'	=> 'vw_pet_care_sanitize_number_absint'
	));
	$wp_customize->add_control('vw_pet_care_related_posts_count',array(
		'label'	=> esc_html__('Add Related Post Count','vw-pet-care'),
		'input_attrs' => array(
      'placeholder' => esc_html__( '3', 'vw-pet-care' ),
        ),
		'section'=> 'vw_pet_care_related_posts_settings',
		'type'=> 'number'
	));

	$wp_customize->add_setting( 'vw_pet_care_related_posts_excerpt_number', array(
		'default'              => 20,
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_pet_care_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_pet_care_related_posts_excerpt_number', array(
		'label'       => esc_html__( 'Related Posts Excerpt length','vw-pet-care' ),
		'section'     => 'vw_pet_care_related_posts_settings',
		'type'        => 'range',
		'settings'    => 'vw_pet_care_related_posts_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	// Single Posts Settings
	$wp_customize->add_section( 'vw_pet_care_single_blog_settings', array(
		'title' => __( 'Single Post Settings', 'vw-pet-care' ),
		'panel' => 'vw_pet_care_blog_post_parent_panel',
	));

	$wp_customize->add_setting('vw_pet_care_single_postdate_icon',array(
		'default'	=> 'fas fa-calendar-alt',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new VW_Pet_Care_Fontawesome_Icon_Chooser(
  $wp_customize,'vw_pet_care_single_postdate_icon',array(
		'label'	=> __('Add Post Date Icon','vw-pet-care'),
		'transport' => 'refresh',
		'section'	=> 'vw_pet_care_single_blog_settings',
		'setting'	=> 'vw_pet_care_single_postdate_icon',
		'type'		=> 'icon'
	)));

  $wp_customize->add_setting( 'vw_pet_care_single_postdate',array(
    'default' => 1,
    'transport' => 'refresh',
    'sanitize_callback' => 'vw_pet_care_switch_sanitization'
	) );
	$wp_customize->add_control( new VW_Pet_Care_Toggle_Switch_Custom_Control( $wp_customize, 'vw_pet_care_single_postdate',array(
		'label' => esc_html__( 'Show / Hide Date','vw-pet-care' ),
		'section' => 'vw_pet_care_single_blog_settings'
	)));

	$wp_customize->add_setting('vw_pet_care_single_author_icon',array(
		'default'	=> 'fas fa-user',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new VW_Pet_Care_Fontawesome_Icon_Chooser(
  $wp_customize,'vw_pet_care_single_author_icon',array(
		'label'	=> __('Add Author Icon','vw-pet-care'),
		'transport' => 'refresh',
		'section'	=> 'vw_pet_care_single_blog_settings',
		'setting'	=> 'vw_pet_care_single_author_icon',
		'type'		=> 'icon'
	)));

  $wp_customize->add_setting( 'vw_pet_care_single_author',array(
    'default' => 1,
    'transport' => 'refresh',
    'sanitize_callback' => 'vw_pet_care_switch_sanitization'
	) );
	$wp_customize->add_control( new VW_Pet_Care_Toggle_Switch_Custom_Control( $wp_customize, 'vw_pet_care_single_author',array(
    'label' => esc_html__( 'Show / Hide Author','vw-pet-care' ),
    'section' => 'vw_pet_care_single_blog_settings'
	)));

 	$wp_customize->add_setting('vw_pet_care_single_comments_icon',array(
		'default'	=> 'fa fa-comments',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new VW_Pet_Care_Fontawesome_Icon_Chooser(
  $wp_customize,'vw_pet_care_single_comments_icon',array(
		'label'	=> __('Add Comments Icon','vw-pet-care'),
		'transport' => 'refresh',
		'section'	=> 'vw_pet_care_single_blog_settings',
		'setting'	=> 'vw_pet_care_single_comments_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting( 'vw_pet_care_single_comments',array(
    'default' => 1,
    'transport' => 'refresh',
    'sanitize_callback' => 'vw_pet_care_switch_sanitization'
	) );
	$wp_customize->add_control( new VW_Pet_Care_Toggle_Switch_Custom_Control( $wp_customize, 'vw_pet_care_single_comments',array(
    'label' => esc_html__( 'Show / Hide Comments','vw-pet-care' ),
    'section' => 'vw_pet_care_single_blog_settings'
	)));

	$wp_customize->add_setting('vw_pet_care_single_time_icon',array(
		'default'	=> 'fas fa-clock',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new VW_Pet_Care_Fontawesome_Icon_Chooser(
  $wp_customize,'vw_pet_care_single_time_icon',array(
		'label'	=> __('Add Time Icon','vw-pet-care'),
		'transport' => 'refresh',
		'section'	=> 'vw_pet_care_single_blog_settings',
		'setting'	=> 'vw_pet_care_single_time_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting( 'vw_pet_care_single_time',array(
    'default' => 1,
    'transport' => 'refresh',
    'sanitize_callback' => 'vw_pet_care_switch_sanitization'
	) );
	$wp_customize->add_control( new VW_Pet_Care_Toggle_Switch_Custom_Control( $wp_customize, 'vw_pet_care_single_time',array(
    'label' => esc_html__( 'Show / Hide Time','vw-pet-care' ),
    'section' => 'vw_pet_care_single_blog_settings'
	)));

	$wp_customize->add_setting( 'vw_pet_care_toggle_tags',array(
		'default' => 0,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_pet_care_switch_sanitization'
	));
  $wp_customize->add_control( new VW_Pet_Care_Toggle_Switch_Custom_Control( $wp_customize, 'vw_pet_care_toggle_tags', array(
		'label' => esc_html__( 'Show / Hide Tags','vw-pet-care' ),
		'section' => 'vw_pet_care_single_blog_settings'
  )));

	$wp_customize->add_setting( 'vw_pet_care_single_post_breadcrumb',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_pet_care_switch_sanitization'
  ) );
 	$wp_customize->add_control( new VW_Pet_Care_Toggle_Switch_Custom_Control( $wp_customize, 'vw_pet_care_single_post_breadcrumb',array(
		'label' => esc_html__( 'Show / Hide Breadcrumb','vw-pet-care' ),
		'section' => 'vw_pet_care_single_blog_settings'
  )));

	// Single Posts Category
 	 $wp_customize->add_setting( 'vw_pet_care_single_post_category',array(
		'default' => true,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_pet_care_switch_sanitization'
  ) );
	$wp_customize->add_control( new VW_Pet_Care_Toggle_Switch_Custom_Control( $wp_customize, 'vw_pet_care_single_post_category',array(
		'label' => esc_html__( 'Show / Hide Category','vw-pet-care' ),
		'section' => 'vw_pet_care_single_blog_settings'
  )));

	$wp_customize->add_setting('vw_pet_care_single_post_meta_field_separator',array(
		'default'=> '|',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_pet_care_single_post_meta_field_separator',array(
		'label'	=> __('Add Meta Separator','vw-pet-care'),
		'description' => __('Add the seperator for meta box. Example: "|", "/", etc.','vw-pet-care'),
		'section'=> 'vw_pet_care_single_blog_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_pet_care_single_blog_post_navigation_show_hide',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_pet_care_switch_sanitization'
	));
	$wp_customize->add_control( new VW_Pet_Care_Toggle_Switch_Custom_Control( $wp_customize, 'vw_pet_care_single_blog_post_navigation_show_hide', array(
	  'label' => esc_html__( 'Show / Hide Post Navigation','vw-pet-care' ),
	  'section' => 'vw_pet_care_single_blog_settings'
	)));

	$wp_customize->add_setting( 'vw_pet_care_single_post_breadcrumb',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_pet_care_switch_sanitization'
    ) );
 	$wp_customize->add_control( new VW_Pet_Care_Toggle_Switch_Custom_Control( $wp_customize, 'vw_pet_care_single_post_breadcrumb',array(
		'label' => esc_html__( 'Show / Hide Breadcrumb','vw-pet-care' ),
		'section' => 'vw_pet_care_single_blog_settings'
  )));

	//navigation text
	$wp_customize->add_setting('vw_pet_care_single_blog_prev_navigation_text',array(
		'default'=> 'PREVIOUS',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_pet_care_single_blog_prev_navigation_text',array(
		'label'	=> __('Post Navigation Text','vw-pet-care'),
		'input_attrs' => array(
      'placeholder' => __( 'PREVIOUS', 'vw-pet-care' ),
      ),
		'section'=> 'vw_pet_care_single_blog_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_pet_care_single_blog_next_navigation_text',array(
		'default'=> 'NEXT',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_pet_care_single_blog_next_navigation_text',array(
		'label'	=> __('Post Navigation Text','vw-pet-care'),
		'input_attrs' => array(
      'placeholder' => __( 'NEXT', 'vw-pet-care' ),
        ),
		'section'=> 'vw_pet_care_single_blog_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_pet_care_single_blog_comment_title',array(
		'default'=> 'Leave a Reply',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('vw_pet_care_single_blog_comment_title',array(
		'label'	=> __('Add Comment Title','vw-pet-care'),
		'input_attrs' => array(
      'placeholder' => __( 'Leave a Reply', 'vw-pet-care' ),
    	),
		'section'=> 'vw_pet_care_single_blog_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_pet_care_single_blog_comment_button_text',array(
		'default'=> 'Post Comment',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('vw_pet_care_single_blog_comment_button_text',array(
		'label'	=> __('Add Comment Button Text','vw-pet-care'),
		'input_attrs' => array(
    'placeholder' => __( 'Post Comment', 'vw-pet-care' ),
        ),
		'section'=> 'vw_pet_care_single_blog_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_pet_care_single_blog_comment_width',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_pet_care_single_blog_comment_width',array(
		'label'	=> __('Comment Form Width','vw-pet-care'),
		'description'	=> __('Enter a value in %. Example:50%','vw-pet-care'),
		'input_attrs' => array(
      'placeholder' => __( '100%', 'vw-pet-care' ),
        ),
		'section'=> 'vw_pet_care_single_blog_settings',
		'type'=> 'text'
	));

	 // Grid layout setting
	$wp_customize->add_section( 'vw_pet_care_grid_layout_settings', array(
		'title' => __( 'Grid Layout Settings', 'vw-pet-care' ),
		'panel' => 'vw_pet_care_blog_post_parent_panel',
	));

	$wp_customize->add_setting('vw_pet_care_grid_postdate_icon',array(
		'default'	=> 'fas fa-calendar-alt',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new VW_Pet_Care_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_pet_care_grid_postdate_icon',array(
		'label'	=> __('Add Post Date Icon','vw-pet-care'),
		'transport' => 'refresh',
		'section'	=> 'vw_pet_care_grid_layout_settings',
		'setting'	=> 'vw_pet_care_grid_postdate_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting( 'vw_pet_care_grid_postdate',array(
	  'default' => 1,
	  'transport' => 'refresh',
	  'sanitize_callback' => 'vw_pet_care_switch_sanitization'
  ) );
  $wp_customize->add_control( new VW_Pet_Care_Toggle_Switch_Custom_Control( $wp_customize, 'vw_pet_care_grid_postdate',array(
    'label' => esc_html__( 'Show / Hide Post Date','vw-pet-care' ),
    'section' => 'vw_pet_care_grid_layout_settings'
  )));

	$wp_customize->add_setting('vw_pet_care_grid_author_icon',array(
		'default'	=> 'fas fa-user',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new VW_Pet_Care_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_pet_care_grid_author_icon',array(
		'label'	=> __('Add Author Icon','vw-pet-care'),
		'transport' => 'refresh',
		'section'	=> 'vw_pet_care_grid_layout_settings',
		'setting'	=> 'vw_pet_care_grid_author_icon',
		'type'		=> 'icon'
	)));

  $wp_customize->add_setting( 'vw_pet_care_grid_author',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_pet_care_switch_sanitization'
  ) );
  $wp_customize->add_control( new VW_Pet_Care_Toggle_Switch_Custom_Control( $wp_customize, 'vw_pet_care_grid_author',array(
		'label' => esc_html__( 'Show / Hide Author','vw-pet-care' ),
		'section' => 'vw_pet_care_grid_layout_settings'
  )));

  $wp_customize->add_setting('vw_pet_care_grid_comments_icon',array(
		'default'	=> 'fa fa-comments',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new VW_Pet_Care_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_pet_care_grid_comments_icon',array(
		'label'	=> __('Add Comments Icon','vw-pet-care'),
		'transport' => 'refresh',
		'section'	=> 'vw_pet_care_grid_layout_settings',
		'setting'	=> 'vw_pet_care_grid_comments_icon',
		'type'		=> 'icon'
	)));

  $wp_customize->add_setting( 'vw_pet_care_grid_time',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_pet_care_switch_sanitization'
  ) );
  $wp_customize->add_control( new VW_Pet_Care_Toggle_Switch_Custom_Control( $wp_customize, 'vw_pet_care_grid_time',array(
		'label' => esc_html__( 'Show / Hide Time','vw-pet-care' ),
		'section' => 'vw_pet_care_grid_layout_settings'
  )));

  $wp_customize->add_setting('vw_pet_care_grid_time_icon',array(
		'default'	=> 'fas fa-clock',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new VW_Pet_Care_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_pet_care_grid_time_icon',array(
		'label'	=> __('Add Time Icon','vw-pet-care'),
		'transport' => 'refresh',
		'section'	=> 'vw_pet_care_grid_layout_settings',
		'setting'	=> 'vw_pet_care_grid_time_icon',
		'type'		=> 'icon'
	)));

  $wp_customize->add_setting( 'vw_pet_care_grid_comments',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_pet_care_switch_sanitization'
  ) );
  $wp_customize->add_control( new VW_Pet_Care_Toggle_Switch_Custom_Control( $wp_customize, 'vw_pet_care_grid_comments',array(
		'label' => esc_html__( 'Show / Hide Comments','vw-pet-care' ),
		'section' => 'vw_pet_care_grid_layout_settings'
  )));

 	$wp_customize->add_setting('vw_pet_care_grid_post_meta_field_separator',array(
		'default'=> '|',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_pet_care_grid_post_meta_field_separator',array(
		'label'	=> __('Add Meta Separator','vw-pet-care'),
		'description' => __('Add the seperator for meta box. Example: "|", "/", etc.','vw-pet-care'),
		'section'=> 'vw_pet_care_grid_layout_settings',
		'type'=> 'text'
	));

  $wp_customize->add_setting('vw_pet_care_display_grid_posts_settings',array(
    'default' => 'Into Blocks',
    'transport' => 'refresh',
    'sanitize_callback' => 'vw_pet_care_sanitize_choices'
	));
	$wp_customize->add_control('vw_pet_care_display_grid_posts_settings',array(
    'type' => 'select',
    'label' => __('Display Grid Posts','vw-pet-care'),
    'section' => 'vw_pet_care_grid_layout_settings',
    'choices' => array(
    	'Into Blocks' => __('Into Blocks','vw-pet-care'),
      'Without Blocks' => __('Without Blocks','vw-pet-care')
      ),
	) );

	$wp_customize->add_setting('vw_pet_care_grid_button_text',array(
		'default'=> esc_html__('Read More','vw-pet-care'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_pet_care_grid_button_text',array(
		'label'	=> esc_html__('Add Button Text','vw-pet-care'),
		'input_attrs' => array(
      'placeholder' => esc_html__( 'Read More', 'vw-pet-care' ),
        ),
		'section'=> 'vw_pet_care_grid_layout_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_pet_care_grid_excerpt_suffix',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_pet_care_grid_excerpt_suffix',array(
		'label'	=> __('Add Excerpt Suffix','vw-pet-care'),
		'input_attrs' => array(
        'placeholder' => __( '[...]', 'vw-pet-care' ),
        ),
		'section'=> 'vw_pet_care_grid_layout_settings',
		'type'=> 'text'
	));

  $wp_customize->add_setting('vw_pet_care_grid_excerpt_settings',array(
    'default' => 'Excerpt',
    'transport' => 'refresh',
    'sanitize_callback' => 'vw_pet_care_sanitize_choices'
	));
	$wp_customize->add_control('vw_pet_care_grid_excerpt_settings',array(
    'type' => 'select',
    'label' => esc_html__('Grid Post Content','vw-pet-care'),
    'section' => 'vw_pet_care_grid_layout_settings',
    'choices' => array(
    	'Content' => esc_html__('Content','vw-pet-care'),
      'Excerpt' => esc_html__('Excerpt','vw-pet-care'),
      'No Content' => esc_html__('No Content','vw-pet-care')
    ),
	) );

  $wp_customize->add_setting( 'vw_pet_care_grid_featured_image_border_radius', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_pet_care_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_pet_care_grid_featured_image_border_radius', array(
		'label'       => esc_html__( 'Grid Featured Image Border Radius','vw-pet-care' ),
		'section'     => 'vw_pet_care_grid_layout_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting( 'vw_pet_care_grid_featured_image_box_shadow', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_pet_care_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_pet_care_grid_featured_image_box_shadow', array(
		'label'       => esc_html__( 'Grid Featured Image Box Shadow','vw-pet-care' ),
		'section'     => 'vw_pet_care_grid_layout_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	//Other
	$wp_customize->add_panel( 'vw_pet_care_other_parent_panel', array(
		'title' => esc_html__( 'Other Settings', 'vw-pet-care' ),
		'panel' => 'vw_pet_care_panel_id',
		'priority' => 20,
	));

	// Layout
	$wp_customize->add_section( 'vw_pet_care_left_right', array(
  	'title' => esc_html__('General Settings', 'vw-pet-care'),
		'panel' => 'vw_pet_care_other_parent_panel'
	) );

	$wp_customize->add_setting('vw_pet_care_width_option',array(
    'default' => 'Full Width',
    'sanitize_callback' => 'vw_pet_care_sanitize_choices'
	));
	$wp_customize->add_control(new VW_Pet_Care_Image_Radio_Control($wp_customize, 'vw_pet_care_width_option', array(
    'type' => 'select',
    'label' => esc_html__('Width Layouts','vw-pet-care'),
    'description' => esc_html__('Here you can change the width layout of Website.','vw-pet-care'),
    'section' => 'vw_pet_care_left_right',
    'choices' => array(
        'Full Width' => esc_url(get_template_directory_uri()).'/assets/images/full-width.png',
        'Wide Width' => esc_url(get_template_directory_uri()).'/assets/images/wide-width.png',
        'Boxed' => esc_url(get_template_directory_uri()).'/assets/images/boxed-width.png',
  ))));

	$wp_customize->add_setting('vw_pet_care_page_layout',array(
    'default' => 'One_Column',
    'sanitize_callback' => 'vw_pet_care_sanitize_choices'
	));
	$wp_customize->add_control('vw_pet_care_page_layout',array(
    'type' => 'select',
    'label' => esc_html__('Page Sidebar Layout','vw-pet-care'),
    'description' => esc_html__('Here you can change the sidebar layout for pages. ','vw-pet-care'),
    'section' => 'vw_pet_care_left_right',
    'choices' => array(
        'Left_Sidebar' => esc_html__('Left Sidebar','vw-pet-care'),
        'Right_Sidebar' => esc_html__('Right Sidebar','vw-pet-care'),
        'One_Column' => esc_html__('One Column','vw-pet-care')
    ),
	) );

    // Pre-Loader 1
	$wp_customize->add_setting( 'vw_pet_care_loader_enable',array(
    'default' => 0,
    'transport' => 'refresh',
    'sanitize_callback' => 'vw_pet_care_switch_sanitization'
  ) );
  $wp_customize->add_control( new VW_Pet_Care_Toggle_Switch_Custom_Control( $wp_customize, 'vw_pet_care_loader_enable',array(
    'label' => esc_html__( ' Pre-Loader','vw-pet-care' ),
    'section' => 'vw_pet_care_left_right'
  )));

	$wp_customize->add_setting('vw_pet_care_preloader_bg_color', array(
		'default'           => '#FF642F',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_pet_care_preloader_bg_color', array(
		'label'    => __('Pre-Loader Background Color', 'vw-pet-care'),
		'section'  => 'vw_pet_care_left_right',
	)));

	$wp_customize->add_setting('vw_pet_care_preloader_border_color', array(
		'default'           => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_pet_care_preloader_border_color', array(
		'label'    => __('Pre-Loader Border Color', 'vw-pet-care'),
		'section'  => 'vw_pet_care_left_right',
	)));

	$wp_customize->add_setting('vw_pet_care_preloader_bg_img',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'vw_pet_care_preloader_bg_img',array(
    'label' => __('Preloader Background Image','vw-pet-care'),
    'section' => 'vw_pet_care_left_right'
	)));

    //404 Page Setting
	$wp_customize->add_section('vw_pet_care_404_page',array(
		'title'	=> __('404 Page Settings','vw-pet-care'),
		'panel' => 'vw_pet_care_other_parent_panel',
	));

	$wp_customize->add_setting('vw_pet_care_404_page_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('vw_pet_care_404_page_title',array(
		'label'	=> __('Add Title','vw-pet-care'),
		'input_attrs' => array(
            'placeholder' => __( '404 Not Found', 'vw-pet-care' ),
        ),
		'section'=> 'vw_pet_care_404_page',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_pet_care_404_page_content',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('vw_pet_care_404_page_content',array(
		'label'	=> __('Add Text','vw-pet-care'),
		'input_attrs' => array(
            'placeholder' => __( 'Looks like you have taken a wrong turn, Dont worry, it happens to the best of us.', 'vw-pet-care' ),
        ),
		'section'=> 'vw_pet_care_404_page',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_pet_care_404_page_button_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_pet_care_404_page_button_text',array(
		'label'	=> __('Add Button Text','vw-pet-care'),
		'input_attrs' => array(
            'placeholder' => __( 'Go Back', 'vw-pet-care' ),
        ),
		'section'=> 'vw_pet_care_404_page',
		'type'=> 'text'
	));

	//No Result Page Setting
	$wp_customize->add_section('vw_pet_care_no_results_page',array(
		'title'	=> __('No Results Page Settings','vw-pet-care'),
		'panel' => 'vw_pet_care_other_parent_panel',
	));

	$wp_customize->add_setting('vw_pet_care_no_results_page_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('vw_pet_care_no_results_page_title',array(
		'label'	=> __('Add Title','vw-pet-care'),
		'input_attrs' => array(
            'placeholder' => __( 'Nothing Found', 'vw-pet-care' ),
        ),
		'section'=> 'vw_pet_care_no_results_page',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_pet_care_no_results_page_content',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('vw_pet_care_no_results_page_content',array(
		'label'	=> __('Add Text','vw-pet-care'),
		'input_attrs' => array(
            'placeholder' => __( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'vw-pet-care' ),
        ),
		'section'=> 'vw_pet_care_no_results_page',
		'type'=> 'text'
	));

	//Social Icon Setting
	$wp_customize->add_section('vw_pet_care_social_icon_settings',array(
		'title'	=> __('Social Icons Settings','vw-pet-care'),
		'panel' => 'vw_pet_care_other_parent_panel',
	));

	$wp_customize->add_setting('vw_pet_care_social_icon_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_pet_care_social_icon_font_size',array(
		'label'	=> __('Icon Font Size','vw-pet-care'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-pet-care'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-pet-care' ),
        ),
		'section'=> 'vw_pet_care_social_icon_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_pet_care_social_icon_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_pet_care_social_icon_padding',array(
		'label'	=> __('Icon Padding','vw-pet-care'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-pet-care'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-pet-care' ),
        ),
		'section'=> 'vw_pet_care_social_icon_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_pet_care_social_icon_width',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_pet_care_social_icon_width',array(
		'label'	=> __('Icon Width','vw-pet-care'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-pet-care'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-pet-care' ),
        ),
		'section'=> 'vw_pet_care_social_icon_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_pet_care_social_icon_height',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_pet_care_social_icon_height',array(
		'label'	=> __('Icon Height','vw-pet-care'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-pet-care'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-pet-care' ),
        ),
		'section'=> 'vw_pet_care_social_icon_settings',
		'type'=> 'text'
	));

	//Responsive Media Settings
	$wp_customize->add_section('vw_pet_care_responsive_media',array(
		'title'	=> esc_html__('Responsive Media','vw-pet-care'),
		'panel' => 'vw_pet_care_other_parent_panel',
	));

  $wp_customize->add_setting( 'vw_pet_care_resp_scroll_top_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_pet_care_switch_sanitization'
  ));
  $wp_customize->add_control( new VW_Pet_Care_Toggle_Switch_Custom_Control( $wp_customize, 'vw_pet_care_resp_scroll_top_hide_show',array(
    	'label' => esc_html__( 'Show / Hide Scroll To Top','vw-pet-care' ),
    	'section' => 'vw_pet_care_responsive_media'
  )));

  $wp_customize->add_setting('vw_pet_care_res_open_menu_icon',array(
		'default'	=> 'fas fa-bars',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new VW_Pet_Care_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_pet_care_res_open_menu_icon',array(
		'label'	=> __('Add Open Menu Icon','vw-pet-care'),
		'transport' => 'refresh',
		'section'	=> 'vw_pet_care_responsive_media',
		'setting'	=> 'vw_pet_care_res_open_menu_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_pet_care_res_close_menu_icon',array(
		'default'	=> 'fas fa-times',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new VW_Pet_Care_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_pet_care_res_close_menu_icon',array(
		'label'	=> __('Add Close Menu Icon','vw-pet-care'),
		'transport' => 'refresh',
		'section'	=> 'vw_pet_care_responsive_media',
		'setting'	=> 'vw_pet_care_res_close_menu_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_pet_care_resp_menu_toggle_btn_bg_color', array(
		'default'           => '#FF642F',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_pet_care_resp_menu_toggle_btn_bg_color', array(
		'label'    => __('Toggle Button Bg Color', 'vw-pet-care'),
		'section'  => 'vw_pet_care_responsive_media',
	)));

  //Woocommerce settings
	$wp_customize->add_section('vw_pet_care_woocommerce_section', array(
		'title'    => __('WooCommerce Layout', 'vw-pet-care'),
		'priority' => null,
		'panel'    => 'woocommerce',
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'vw_pet_care_woocommerce_shop_page_sidebar', array( 'selector' => '.post-type-archive-product #sidebar',
		'render_callback' => 'vw_pet_care_customize_partial_vw_pet_care_woocommerce_shop_page_sidebar', ) );

    //Woocommerce Shop Page Sidebar
	$wp_customize->add_setting( 'vw_pet_care_woocommerce_shop_page_sidebar',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_pet_care_switch_sanitization'
  ) );
  $wp_customize->add_control( new VW_Pet_Care_Toggle_Switch_Custom_Control( $wp_customize, 'vw_pet_care_woocommerce_shop_page_sidebar',array(
		'label' => esc_html__( 'Show / Hide Shop Page Sidebar','vw-pet-care' ),
		'section' => 'vw_pet_care_woocommerce_section'
  )));

   $wp_customize->add_setting('vw_pet_care_shop_page_layout',array(
    'default' => 'Right Sidebar',
    'sanitize_callback' => 'vw_pet_care_sanitize_choices'
	));
	$wp_customize->add_control('vw_pet_care_shop_page_layout',array(
    'type' => 'select',
    'label' => __('Shop Page Sidebar Layout','vw-pet-care'),
    'section' => 'vw_pet_care_woocommerce_section',
    'choices' => array(
        'Left Sidebar' => __('Left Sidebar','vw-pet-care'),
        'Right Sidebar' => __('Right Sidebar','vw-pet-care'),
    ),
	) );

   //Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'vw_pet_care_woocommerce_single_product_page_sidebar', array( 'selector' => '.single-product #sidebar',
		'render_callback' => 'vw_pet_care_customize_partial_vw_pet_care_woocommerce_single_product_page_sidebar', ) );

    //Woocommerce Single Product page Sidebar
	$wp_customize->add_setting( 'vw_pet_care_woocommerce_single_product_page_sidebar',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_pet_care_switch_sanitization'
   ) );
 	$wp_customize->add_control( new VW_Pet_Care_Toggle_Switch_Custom_Control( $wp_customize, 'vw_pet_care_woocommerce_single_product_page_sidebar',array(
		'label' => esc_html__( 'Show / Hide Single Product Sidebar','vw-pet-care' ),
		'section' => 'vw_pet_care_woocommerce_section'
  )));

   $wp_customize->add_setting('vw_pet_care_single_product_layout',array(
    'default' => 'Right Sidebar',
    'sanitize_callback' => 'vw_pet_care_sanitize_choices'
	));
	$wp_customize->add_control('vw_pet_care_single_product_layout',array(
    'type' => 'select',
    'label' => __('Single Product Sidebar Layout','vw-pet-care'),
    'section' => 'vw_pet_care_woocommerce_section',
    'choices' => array(
        'Left Sidebar' => __('Left Sidebar','vw-pet-care'),
        'Right Sidebar' => __('Right Sidebar','vw-pet-care'),
    ),
	) );

	//Products padding
	$wp_customize->add_setting('vw_pet_care_products_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_pet_care_products_padding_top_bottom',array(
		'label'	=> __('Products Padding Top Bottom','vw-pet-care'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-pet-care'),
		'input_attrs' => array(
        'placeholder' => __( '10px', 'vw-pet-care' ),
        ),
		'section'=> 'vw_pet_care_woocommerce_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_pet_care_products_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_pet_care_products_padding_left_right',array(
		'label'	=> __('Products Padding Left Right','vw-pet-care'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-pet-care'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-pet-care' ),
        ),
		'section'=> 'vw_pet_care_woocommerce_section',
		'type'=> 'text'
	));

	//Products box shadow
	$wp_customize->add_setting( 'vw_pet_care_products_box_shadow', array(
		'default'              => '',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_pet_care_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_pet_care_products_box_shadow', array(
		'label'       => esc_html__( 'Products Box Shadow','vw-pet-care' ),
		'section'     => 'vw_pet_care_woocommerce_section',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	//Products border radius
    $wp_customize->add_setting( 'vw_pet_care_products_border_radius', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_pet_care_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_pet_care_products_border_radius', array(
		'label'       => esc_html__( 'Products Border Radius','vw-pet-care' ),
		'section'     => 'vw_pet_care_woocommerce_section',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting( 'vw_pet_care_products_button_border_radius', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_pet_care_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_pet_care_products_button_border_radius', array(
		'label'       => esc_html__( 'Products Button Border Radius','vw-pet-care' ),
		'section'     => 'vw_pet_care_woocommerce_section',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting('vw_pet_care_products_btn_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_pet_care_products_btn_padding_top_bottom',array(
		'label'	=> __('Products Button Padding Top Bottom','vw-pet-care'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-pet-care'),
		'input_attrs' => array(
        'placeholder' => __( '10px', 'vw-pet-care' ),
        ),
		'section'=> 'vw_pet_care_woocommerce_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_pet_care_products_btn_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_pet_care_products_btn_padding_left_right',array(
		'label'	=> __('Products Button Padding Left Right','vw-pet-care'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-pet-care'),
		'input_attrs' => array(
        'placeholder' => __( '10px', 'vw-pet-care' ),
        ),
		'section'=> 'vw_pet_care_woocommerce_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_pet_care_woocommerce_sale_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_pet_care_woocommerce_sale_font_size',array(
		'label'	=> __('Sale Font Size','vw-pet-care'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-pet-care'),
		'input_attrs' => array(
        'placeholder' => __( '10px', 'vw-pet-care' ),
        ),
		'section'=> 'vw_pet_care_woocommerce_section',
		'type'=> 'text'
	));

	//Products Sale Badge
	$wp_customize->add_setting('vw_pet_care_woocommerce_sale_position',array(
    'default' => 'right',
    'sanitize_callback' => 'vw_pet_care_sanitize_choices'
	));
	$wp_customize->add_control('vw_pet_care_woocommerce_sale_position',array(
    'type' => 'select',
    'label' => __('Sale Badge Position','vw-pet-care'),
    'section' => 'vw_pet_care_woocommerce_section',
    'choices' => array(
        'left' => __('Left','vw-pet-care'),
        'right' => __('Right','vw-pet-care'),
    ),
	) );

	$wp_customize->add_setting('vw_pet_care_woocommerce_sale_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_pet_care_woocommerce_sale_padding_top_bottom',array(
		'label'	=> __('Sale Padding Top Bottom','vw-pet-care'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-pet-care'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-pet-care' ),
        ),
		'section'=> 'vw_pet_care_woocommerce_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_pet_care_woocommerce_sale_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_pet_care_woocommerce_sale_padding_left_right',array(
		'label'	=> __('Sale Padding Left Right','vw-pet-care'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-pet-care'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-pet-care' ),
        ),
		'section'=> 'vw_pet_care_woocommerce_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_pet_care_woocommerce_sale_border_radius', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_pet_care_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_pet_care_woocommerce_sale_border_radius', array(
		'label'       => esc_html__( 'Sale Border Radius','vw-pet-care' ),
		'section'     => 'vw_pet_care_woocommerce_section',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	// Related Product
  $wp_customize->add_setting( 'vw_pet_care_related_product_show_hide',array(
    'default' => 1,
    'transport' => 'refresh',
    'sanitize_callback' => 'vw_pet_care_switch_sanitization'
  ) );
  $wp_customize->add_control( new VW_Pet_Care_Toggle_Switch_Custom_Control( $wp_customize, 'vw_pet_care_related_product_show_hide',array(
    'label' => esc_html__( 'Show / Hide Related product','vw-pet-care' ),
    'section' => 'vw_pet_care_woocommerce_section'
  )));

}

add_action( 'customize_register', 'vw_pet_care_customize_register' );

load_template( trailingslashit( get_template_directory() ) . '/inc/logo/logo-resizer.php' );

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class VW_Pet_Care_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	*/
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'VW_Pet_Care_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section( new VW_Pet_Care_Customize_Section_Pro( $manager,'vw_pet_care_go_pro', array(
			'priority'   => 1,
			'title'    => esc_html__( 'VW PET CARE PRO', 'vw-pet-care' ),
			'pro_text' => esc_html__( 'UPGRADE PRO', 'vw-pet-care' ),
			'pro_url'  => esc_url('https://www.vwthemes.com/themes/pet-shop-wordpress-theme/'),
		) )	);

	// Register sections.
		$manager->add_section(new VW_Pet_Care_Customize_Section_Pro($manager,'vw_pet_care_get_started_link',array(
			'priority'   => 1,
			'title'    => esc_html__( 'DOCUMENTATION', 'vw-pet-care' ),
			'pro_text' => esc_html__( 'DOCS', 'vw-pet-care' ),
			'pro_url'  => esc_url('https://preview.vwthemesdemo.com/docs/free-vw-pet-care/'),
		)));
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'vw-pet-care-customize-controls', trailingslashit( get_template_directory_uri() ) . '/assets/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'vw-pet-care-customize-controls', trailingslashit( get_template_directory_uri() ) . '/assets/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
VW_Pet_Care_Customize::get_instance();
