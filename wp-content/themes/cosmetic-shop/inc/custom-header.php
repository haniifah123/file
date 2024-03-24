<?php
/**
 * Custom header implementation
 */

function cosmetic_shop_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'cosmetic_shop_custom_header_args', array(
		'default-text-color' => 'fff',
		'header-text' 	     =>	false,
		'width'              => 600,
		'height'             => 650,
		'flex-width'         => true,
		'flex-height'        => true,
	) ) );
}

add_action( 'after_setup_theme', 'cosmetic_shop_custom_header_setup' );