<?php
/**
 * @package VW Pet Care 
 * Setup the WordPress core custom header feature.
 *
 * @uses vw_pet_care_header_style()
*/
function vw_pet_care_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'vw_pet_care_custom_header_args', array(
		'header-text' 			 =>	false,
		'width'                  => 1200,
		'height'                 => 70,
		'flex-width'    		 => true,
		'flex-height'    		 => true,
		'wp-head-callback'       => 'vw_pet_care_header_style',
	) ) );
}
add_action( 'after_setup_theme', 'vw_pet_care_custom_header_setup' );

if ( ! function_exists( 'vw_pet_care_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see vw_pet_care_custom_header_setup().
 */
add_action( 'wp_enqueue_scripts', 'vw_pet_care_header_style' );

function vw_pet_care_header_style() {
	if ( get_header_image() ) :
	$custom_css = "
        .page-template-custom-home-page .home-page-header, .home-page-header{
			background-image:url('".esc_url(get_header_image())."');
			background-position: center top;
		    background-size: cover;
		}";
	   	wp_add_inline_style( 'vw-pet-care-basic-style', $custom_css );
	endif;
}
endif;