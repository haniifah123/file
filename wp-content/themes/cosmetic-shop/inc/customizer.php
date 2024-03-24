<?php
/**
 * Cosmetic Shop: Customizer
 *
 * @subpackage Cosmetic Shop
 * @since 1.0
 */

use WPTRT\Customize\Section\Cosmetic_Shop_Button;

add_action( 'customize_register', function( $manager ) {

	$manager->register_section_type( Cosmetic_Shop_Button::class );

	$manager->add_section(
		new Cosmetic_Shop_Button( $manager, 'cosmetic_shop_pro', [
			'title' => __( 'Cosmetic Shop Pro', 'cosmetic-shop' ),
			'priority' => 0,
			'button_text' => __( 'Go Pro', 'cosmetic-shop' ),
			'button_url'  => esc_url( 'https://www.luzuk.com/product/cosmetics-shop-wordpress-theme', 'cosmetic-shop')
		] )
	);

} );

// Load the JS and CSS.
add_action( 'customize_controls_enqueue_scripts', function() {

	$version = wp_get_theme()->get( 'Version' );

	wp_enqueue_script(
		'cosmetic-shop-customize-section-button',
		get_theme_file_uri( 'vendor/wptrt/customize-section-button/public/js/customize-controls.js' ),
		[ 'customize-controls' ],
		$version,
		true
	);

	wp_enqueue_style(
		'cosmetic-shop-customize-section-button',
		get_theme_file_uri( 'vendor/wptrt/customize-section-button/public/css/customize-controls.css' ),
		[ 'customize-controls' ],
 		$version
	);

} );

function cosmetic_shop_customize_register( $wp_customize ) {

	$wp_customize->add_setting('cosmetic_shop_logo_padding',array(
		'sanitize_callback'	=> 'esc_html'
	));
	$wp_customize->add_control('cosmetic_shop_logo_padding',array(
		'label' => __('Logo Margin','cosmetic-shop'),
		'section' => 'title_tagline'
	));

	$wp_customize->add_setting('cosmetic_shop_logo_top_padding',array(
		'default' => '',
		'sanitize_callback'	=> 'cosmetic_shop_sanitize_float'
	));
	$wp_customize->add_control('cosmetic_shop_logo_top_padding',array(
		'type' => 'number',
		'description' => __('Top','cosmetic-shop'),
		'section' => 'title_tagline',
	));

	$wp_customize->add_setting('cosmetic_shop_logo_bottom_padding',array(
		'default' => '',
		'sanitize_callback'	=> 'cosmetic_shop_sanitize_float'
	));
	$wp_customize->add_control('cosmetic_shop_logo_bottom_padding',array(
		'type' => 'number',
		'description' => __('Bottom','cosmetic-shop'),
		'section' => 'title_tagline',
	));

	$wp_customize->add_setting('cosmetic_shop_logo_left_padding',array(
		'default' => '',
		'sanitize_callback'	=> 'cosmetic_shop_sanitize_float'
	));
	$wp_customize->add_control('cosmetic_shop_logo_left_padding',array(
		'type' => 'number',
		'description' => __('Left','cosmetic-shop'),
		'section' => 'title_tagline',
	));

	$wp_customize->add_setting('cosmetic_shop_logo_right_padding',array(
		'default' => '',
		'sanitize_callback'	=> 'cosmetic_shop_sanitize_float'
 	));
 	$wp_customize->add_control('cosmetic_shop_logo_right_padding',array(
		'type' => 'number',
		'description' => __('Right','cosmetic-shop'),
		'section' => 'title_tagline',
    ));

	$wp_customize->add_setting('cosmetic_shop_show_site_title',array(
		'default' => true,
		'sanitize_callback'	=> 'cosmetic_shop_sanitize_checkbox'
	));
	$wp_customize->add_control('cosmetic_shop_show_site_title',array(
		'type' => 'checkbox',
		'label' => __('Show / Hide Site Title','cosmetic-shop'),
		'section' => 'title_tagline'
	));

	$wp_customize->add_setting( 'cosmetic_shop_site_title_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cosmetic_shop_site_title_color', array(
		'label' => 'Title Color',
		'section' => 'title_tagline',
	)));

	$wp_customize->add_setting('cosmetic_shop_show_tagline',array(
		'default' => true,
		'sanitize_callback'	=> 'cosmetic_shop_sanitize_checkbox'
	));
	$wp_customize->add_control('cosmetic_shop_show_tagline',array(
		'type' => 'checkbox',
		'label' => __('Show / Hide Site Tagline','cosmetic-shop'),
		'section' => 'title_tagline'
	));

	$wp_customize->add_setting( 'cosmetic_shop_site_tagline_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cosmetic_shop_site_tagline_color', array(
		'label' => 'Tagline Color',
		'section' => 'title_tagline',
	)));

	$wp_customize->add_panel( 'cosmetic_shop_panel_id', array(
		'priority' => 10,
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => __( 'Theme Settings', 'cosmetic-shop' ),
		'description' => __( 'Description of what this panel does.', 'cosmetic-shop' ),
	) );

	$wp_customize->add_section( 'cosmetic_shop_theme_options_section', array(
    	'title'      => __( 'General Settings', 'cosmetic-shop' ),
		'priority'   => 30,
		'panel' => 'cosmetic_shop_panel_id'
	) );

	$wp_customize->add_setting('cosmetic_shop_theme_options',array(
		'default' => 'One Column',
		'sanitize_callback' => 'cosmetic_shop_sanitize_choices'
	));
	$wp_customize->add_control('cosmetic_shop_theme_options',array(
		'type' => 'select',
		'label' => __('Blog Page Sidebar Layout','cosmetic-shop'),
		'section' => 'cosmetic_shop_theme_options_section',
		'choices' => array(
		   'Left Sidebar' => __('Left Sidebar','cosmetic-shop'),
		   'Right Sidebar' => __('Right Sidebar','cosmetic-shop'),
		   'One Column' => __('One Column','cosmetic-shop'),
		   'Grid Layout' => __('Grid Layout','cosmetic-shop')
		),
	));

	$wp_customize->add_setting('cosmetic_shop_single_post_sidebar',array(
		'default' => 'Right Sidebar',
		'sanitize_callback' => 'cosmetic_shop_sanitize_choices'
	));
	$wp_customize->add_control('cosmetic_shop_single_post_sidebar',array(
        'type' => 'select',
        'label' => __('Single Post Sidebar Layout','cosmetic-shop'),
        'section' => 'cosmetic_shop_theme_options_section',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','cosmetic-shop'),
            'Right Sidebar' => __('Right Sidebar','cosmetic-shop'),
            'One Column' => __('One Column','cosmetic-shop')
        ),
	));

	$wp_customize->add_setting('cosmetic_shop_page_sidebar',array(
		'default' => 'One Column',
		'sanitize_callback' => 'cosmetic_shop_sanitize_choices'
	));
	$wp_customize->add_control('cosmetic_shop_page_sidebar',array(
        'type' => 'select',
        'label' => __('Page Sidebar Layout','cosmetic-shop'),
        'section' => 'cosmetic_shop_theme_options_section',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','cosmetic-shop'),
            'Right Sidebar' => __('Right Sidebar','cosmetic-shop'),
            'One Column' => __('One Column','cosmetic-shop')
        ),
	));

	$wp_customize->add_setting('cosmetic_shop_archive_page_sidebar',array(
		'default' => 'One Column',
		'sanitize_callback' => 'cosmetic_shop_sanitize_choices'
	));
	$wp_customize->add_control('cosmetic_shop_archive_page_sidebar',array(
        'type' => 'select',
        'label' => __('Archive & Search Page Sidebar Layout','cosmetic-shop'),
        'section' => 'cosmetic_shop_theme_options_section',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','cosmetic-shop'),
            'Right Sidebar' => __('Right Sidebar','cosmetic-shop'),
            'One Column' => __('One Column','cosmetic-shop'),
            'Grid Layout' => __('Grid Layout','cosmetic-shop')
        ),
	));

	//home page header
	$wp_customize->add_section( 'cosmetic_shop_header_section' , array(
    	'title'    => __( 'Header Settings', 'cosmetic-shop' ),
		'priority' => null,
		'panel' => 'cosmetic_shop_panel_id'
	) );

    $wp_customize->add_setting('cosmetic_shop_contact_btn_text',array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('cosmetic_shop_contact_btn_text',array(
		'label'	=> __('Button Text','cosmetic-shop'),
		'section' => 'cosmetic_shop_header_section',
		'type' => 'text'
	));

	$wp_customize->add_setting( 'cosmetic_shop_menu_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	   ));
	 $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cosmetic_shop_menu_color', array(
		'label' => 'Menu Color',
		'section' => 'cosmetic_shop_header_section',
	)));

	$wp_customize->add_setting( 'cosmetic_shop_submenu_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	   ));
	 $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cosmetic_shop_submenu_color', array(
		'label' => 'Submenu Color',
		'section' => 'cosmetic_shop_header_section',
	)));

	$wp_customize->add_setting( 'cosmetic_shop_submenubg_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	   ));
	 $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cosmetic_shop_submenubg_color', array(
		'label' => 'Submenu Bg Color',
		'section' => 'cosmetic_shop_header_section',
	)));

	$wp_customize->add_setting( 'cosmetic_shop_cartic_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cosmetic_shop_cartic_color', array(
		'label' => 'Cart Icon Color',
		'section' => 'cosmetic_shop_header_section',
	)));

	$wp_customize->add_setting( 'cosmetic_shop_hdrbtn_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cosmetic_shop_hdrbtn_color', array(
		'label' => 'Button Text Color',
		'section' => 'cosmetic_shop_header_section',
	)));

	$wp_customize->add_setting( 'cosmetic_shop_hdrbtnbg_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cosmetic_shop_hdrbtnbg_color', array(
		'label' => 'Button Bg Color',
		'section' => 'cosmetic_shop_header_section',
	)));

	//home page slider
	$wp_customize->add_section( 'cosmetic_shop_slider_section' , array(
    	'title'    => __( 'Slider Settings', 'cosmetic-shop' ),
		'priority' => null,
		'panel' => 'cosmetic_shop_panel_id'
	) );

	$wp_customize->add_setting('cosmetic_shop_slider_hide_show',array(
    	'default' => false,
    	'sanitize_callback'	=> 'cosmetic_shop_sanitize_checkbox'
	));
	$wp_customize->add_control('cosmetic_shop_slider_hide_show',array(
	   	'type' => 'checkbox',
	   	'label' => __('Show / Hide Slider','cosmetic-shop'),
	   	'section' => 'cosmetic_shop_slider_section',
	));

	
	$wp_customize->add_setting(
    	'slider_image1',
	    array(
	        'sanitize_callback' => 'esc_url_raw'
	    )
	);
	$wp_customize->add_control(
	    new WP_Customize_Image_Control(
	        $wp_customize,
	        'slider_image1',
	        array(
			    'label'   		=> __('Slider 1','cosmetic-shop'),
	            'section' => 'cosmetic_shop_slider_section',
	            'settings' => 'slider_image1',
	        )
	    )
	);

	$wp_customize->add_setting(
    	'slider_image2',
	    array(
	        'sanitize_callback' => 'esc_url_raw'
	    )
	);
	$wp_customize->add_control(
	    new WP_Customize_Image_Control(
	        $wp_customize,
	        'slider_image2',
	        array(
			    'label'   		=> __('Slider 2','cosmetic-shop'),
	            'section' => 'cosmetic_shop_slider_section',
	            'settings' => 'slider_image2',
	        )
	    )
	);

	$wp_customize->add_setting(
    	'slider_image3',
	    array(
	        'sanitize_callback' => 'esc_url_raw'
	    )
	);
	$wp_customize->add_control(
	    new WP_Customize_Image_Control(
	        $wp_customize,
	        'slider_image3',
	        array(
			    'label'   		=> __('Slider 3','cosmetic-shop'),
	            'section' => 'cosmetic_shop_slider_section',
	            'settings' => 'slider_image3',
	        )
	    )
	);

	for ( $count = 1; $count <= 4; $count++ ) {
		$wp_customize->add_setting( 'cosmetic_shop_slider' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'cosmetic_shop_sanitize_dropdown_pages'
		));
		$wp_customize->add_control( 'cosmetic_shop_slider' . $count, array(
			'label' => __('Select Slider Image Page', 'cosmetic-shop' ),
			'description' => __('Image Size ( 600 x 650 )', 'cosmetic-shop' ),
			'section' => 'cosmetic_shop_slider_section',
			'type' => 'dropdown-pages'
		));
	}

	$wp_customize->add_setting('cosmetic_shop_slider_excerpt_length',array(
		'default' => '15',
		'sanitize_callback'	=> 'cosmetic_shop_sanitize_float'
	));
	$wp_customize->add_control('cosmetic_shop_slider_excerpt_length',array(
		'type' => 'number',
		'label' => __('Slider Excerpt Length','cosmetic-shop'),
		'section' => 'cosmetic_shop_slider_section',
	));

	$wp_customize->add_setting( 'cosmetic_shop_slider_title_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	   ));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cosmetic_shop_slider_title_color', array(
		'label' => 'Title Color',
		'section' => 'cosmetic_shop_slider_section',
	)));

	$wp_customize->add_setting( 'cosmetic_shop_slider_bdr_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	   ));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cosmetic_shop_slider_bdr_color', array(
		'label' => 'Border Color',
		'section' => 'cosmetic_shop_slider_section',
	)));

	$wp_customize->add_setting( 'cosmetic_shop_slider_text_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	   ));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cosmetic_shop_slider_text_color', array(
		'label' => 'Text Color',
		'section' => 'cosmetic_shop_slider_section',
	)));

	$wp_customize->add_setting( 'cosmetic_shop_slider_btn_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	   ));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cosmetic_shop_slider_btn_color', array(
		'label' => 'Button Text Color',
		'section' => 'cosmetic_shop_slider_section',
	)));
	
	$wp_customize->add_setting( 'cosmetic_shop_slider_btnbg_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	   ));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cosmetic_shop_slider_btnbg_color', array(
		'label' => 'Button Bg Color',
		'section' => 'cosmetic_shop_slider_section',
	)));

	//productcategory Section
	$wp_customize->add_section('cosmetic_shop_productcategory_section',array(
		'title'	=> __('Product Category Section','cosmetic-shop'),
		'description'=> __('<b>Note :</b> This section will appear below the Slider Section.','cosmetic-shop'),
		'panel' => 'cosmetic_shop_panel_id',
	));
 
    $wp_customize->add_setting('cosmetic_shop_productcategorysection_title',array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('cosmetic_shop_productcategorysection_title',array(
		'label'	=> __('Section Title','cosmetic-shop'),
		'section' => 'cosmetic_shop_productcategory_section',
		'type' => 'text'
	));

	$wp_customize->add_setting('cosmetic_shop_productcategorysection_subtitle',array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('cosmetic_shop_productcategorysection_subtitle',array(
		'label'	=> __('Section Sub Title','cosmetic-shop'),
		'section' => 'cosmetic_shop_productcategory_section',
		'type' => 'text'
	));


	// Featureproduct Section
	$wp_customize->add_section('cosmetic_shop_featureproduct_section',array(
		'title'	=> __('Feature Product Section','cosmetic-shop'),
		'description'=> __('<b>Note :</b> This section will appear below the Category Section.','cosmetic-shop'),
		'panel' => 'cosmetic_shop_panel_id',
	));

 
    $wp_customize->add_setting('cosmetic_shop_section_title',array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('cosmetic_shop_section_title',array(
		'label'	=> __('Section Title','cosmetic-shop'),
		'section' => 'cosmetic_shop_featureproduct_section',
		'type' => 'text'
	));

	$wp_customize->add_setting('cosmetic_shop_section_subtitle',array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('cosmetic_shop_section_subtitle',array(
		'label'	=> __('Section Sub Title','cosmetic-shop'),
		'section' => 'cosmetic_shop_featureproduct_section',
		'type' => 'text'
	));


	$wp_customize->add_setting( 'cosmetic_shop_featureproduct_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	   ));
	 $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cosmetic_shop_featureproduct_color', array(
		   'label' => 'Text Color',
		'section' => 'cosmetic_shop_featureproduct_section',
	   )));

	//Footer
    $wp_customize->add_section( 'cosmetic_shop_footer', array(
    	'title'  => __( 'Footer Text', 'cosmetic-shop' ),
		'priority' => null,
		'panel' => 'cosmetic_shop_panel_id'
	) );

	$wp_customize->add_setting('cosmetic_shop_show_back_totop',array(
       'default' => true,
       'sanitize_callback'	=> 'cosmetic_shop_sanitize_checkbox'
    ));
    $wp_customize->add_control('cosmetic_shop_show_back_totop',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Back to Top','cosmetic-shop'),
       'section' => 'cosmetic_shop_footer'
    ));

    $wp_customize->add_setting('cosmetic_shop_footer_copy',array(
		'default' => 'Cosmetic Shop WordPress Theme By Luzuk',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('cosmetic_shop_footer_copy',array(
		'label'	=> __('Footer Text','cosmetic-shop'),
		'section' => 'cosmetic_shop_footer',
		'setting' => 'cosmetic_shop_footer_copy',
		'type' => 'text'
	));

	$wp_customize->add_setting('cosmetic_shop_footer_copylink',array(
		'default' => 'https://www.luzuk.com/themes/cosmetic-shop-wordpress-theme',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('cosmetic_shop_footer_copylink',array(
		'label'	=> __('Footer Link','cosmetic-shop'),
		'section' => 'cosmetic_shop_footer',
		'setting' => 'cosmetic_shop_footer_copylink',
		'type' => 'text'
	));

	$wp_customize->get_setting( 'blogname' )->transport          = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport   = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport  = 'postMessage';

	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector' => '.site-title a',
		'render_callback' => 'cosmetic_shop_customize_partial_blogname',
	) );
	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector' => '.site-description',
		'render_callback' => 'cosmetic_shop_customize_partial_blogdescription',
	) );
}
add_action( 'customize_register', 'cosmetic_shop_customize_register' );

function cosmetic_shop_customize_partial_blogname() {
	bloginfo( 'name' );
}

function cosmetic_shop_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

if (class_exists('WP_Customize_Control')) {

   	class cosmetic_shop_Fontawesome_Icon_Chooser extends WP_Customize_Control {

      	public $type = 'icon';

      	public function render_content() { ?>
	     	<label>
	            <span class="customize-control-title">
	               <?php echo esc_html($this->label); ?>
	            </span>

	            <?php if ($this->description) { ?>
	                <span class="description customize-control-description">
	                   <?php echo wp_kses_post($this->description); ?>
	                </span>
	            <?php } ?>

	            <div class="cosmetic-shop-selected-icon">
	                <i class="fa <?php echo esc_attr($this->value()); ?>"></i>
	                <span><i class="fa fa-angle-down"></i></span>
	            </div>

	            <ul class="cosmetic-shop-icon-list clearfix">
	                <?php
	                $cosmetic_shop_font_awesome_icon_array = cosmetic_shop_font_awesome_icon_array();
	                foreach ($cosmetic_shop_font_awesome_icon_array as $cosmetic_shop_font_awesome_icon) {
	                   $icon_class = $this->value() == $cosmetic_shop_font_awesome_icon ? 'icon-active' : '';
	                   echo '<li class=' . esc_attr($icon_class) . '><i class="' . esc_attr($cosmetic_shop_font_awesome_icon) . '"></i></li>';
	                }
	                ?>
	            </ul>
	            <input type="hidden" value="<?php $this->value(); ?>" <?php $this->link(); ?> />
	        </label>
	        <?php
      	}
  	}
}
function cosmetic_shop_customizer_script() {
   wp_enqueue_style( 'font-awesome-1', get_template_directory_uri().'/assets/css/fontawesome-all.css');
}
add_action( 'customize_controls_enqueue_scripts', 'cosmetic_shop_customizer_script' );