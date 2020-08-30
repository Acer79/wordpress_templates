<?php
/*
File: inc/assets.php
Description: Assets inclusion
Plugin: AD ONE PAGE
Author: Ad-theme.com
*/

//********************************************************************************//
// CSS
//********************************************************************************//


// Frontend
add_action( 'wp_enqueue_scripts', 'adonepage_frontend_styles' );

function adonepage_frontend_styles() {
	
	// Main
	wp_register_style( 'adonepage-main-style',  adonepage_URL . 'assets/css/frontend.css' );
    wp_enqueue_style( 'adonepage-main-style' );

	// Maximage
	wp_register_style( 'adtheme-widget',  adonepage_URL . 'assets/css/widget.css' );
    wp_enqueue_style( 'adtheme-widget' );

	// SLICK NAV
	wp_register_style( 'slicknav',  adonepage_URL . 'assets/css/slicknav.css' );
    wp_enqueue_style( 'slicknav' );

	// Maximage
	wp_register_style( 'maximagecss',  adonepage_URL . 'assets/css/jquery.maximage.css' );
    wp_enqueue_style( 'maximagecss' );

	// YTPlayer
	wp_register_style( 'YTPlayer',  adonepage_URL . 'assets/css/YTPlayer.css' );
    wp_enqueue_style( 'YTPlayer' );

	// Superfish
	wp_register_style( 'superfish',  adonepage_URL . 'assets/css/superfish.css' );
    wp_enqueue_style( 'superfish' );
	
	// Inline
	wp_add_inline_style( 'adonepage-main-style', get_option('adonepage_custom_css') ); 
	
}


// Backend
add_action( 'admin_enqueue_scripts', 'adonepage_backend_styles' );

function adonepage_backend_styles() {
	
	// Main
	wp_register_style( 'adonepage-backend-style',  adonepage_URL . 'assets/css/backend.css' );
    wp_enqueue_style( 'adonepage-backend-style' );
	
}



//********************************************************************************//
// JS
//********************************************************************************//


// Frontend
add_action('wp_enqueue_scripts', 'adonepage_frontend_scripts');

function adonepage_frontend_scripts() {
	
	// Load WP jQuery if not included
	wp_enqueue_script('jquery');
	
	// Load main js script
	wp_enqueue_script('adonepage-frontend-script', adonepage_URL . 'assets/js/frontend.js', array('jquery'), '', true);

	wp_enqueue_script('jquery.parallax-1.1.3.js', adonepage_URL . 'assets/js/jquery.parallax-1.1.3.js', array('jquery'), '', true);		
	
	// SlickNav
	wp_enqueue_script('jquery.slicknav', adonepage_URL . 'assets/js/jquery.slicknav.js', array('jquery'), '', true);	

	// Cycle
	wp_enqueue_script('jquery.cycle', adonepage_URL . 'assets/js/jquery.cycle.all.js', array('jquery'), '', true);	
	// Maximage
	wp_enqueue_script('jquery.maximage', adonepage_URL . 'assets/js/jquery.maximage.js', array('jquery'), '', true);		
	// Maximage
	wp_enqueue_script('jquery.mb.YTPlayer', adonepage_URL . 'assets/js/jquery.mb.YTPlayer.js', array('jquery'), '', true);	

	// SUPERFISH
	wp_enqueue_script('hoverIntent', adonepage_URL . 'assets/js/hoverIntent.js', array('jquery'), '', true);	
	wp_enqueue_script('superfish', adonepage_URL . 'assets/js/superfish.js', array('jquery'), '', true);	

}


// Backend
add_action('admin_enqueue_scripts', 'adonepage_backend_scripts');

function adonepage_backend_scripts() {
	
	// Load WP jQuery if not included
	wp_enqueue_script('jquery');
	wp_enqueue_script('jquery-ui-tabs'); //load tabs

	// Load main js script
	wp_enqueue_script('adonepage-backend-script', adonepage_URL . 'assets/js/backend.js', array('jquery'), '', true);
		
}

if (!function_exists('adtheme_theme_setup')):

    function adtheme_theme_setup() {
		add_image_size( 'adonepage_custom_size_default', 260, 260, true );
		add_image_size( 'adonepage_large', 800, 600, true );
		add_image_size( 'adonepage-background-block', 2000, 1250, true );
	}
	
endif;

add_action('after_setup_theme', 'adtheme_theme_setup');