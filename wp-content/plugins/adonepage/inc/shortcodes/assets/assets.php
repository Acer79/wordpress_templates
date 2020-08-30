<?php
/*
File: assets.php
Description: Assets SHORTCODES ADTHEME
Plugin: ADTHEME SHORTCODES
Author: Ad-theme.com
*/

// Frontend
add_action( 'wp_enqueue_scripts', 'adtheme_shortcodes_styles' );

function adtheme_shortcodes_styles() {

	// SHORTCODES
	wp_enqueue_style( 'jquery-masonry' );
	wp_register_style( 'shortcodes',  adtheme_shortcodes_URL . 'assets/css/shortcodes.css' );
    wp_enqueue_style( 'shortcodes' ); 
	wp_register_style( 'photobox',  adtheme_shortcodes_URL . 'assets/css/photobox.css' );
    wp_enqueue_style( 'photobox' ); 
	wp_register_style( 'photoboxie',  adtheme_shortcodes_URL . 'assets/css/photobox.ie.css' );
    wp_enqueue_style( 'photoboxie' ); 
	wp_register_style( 'onscroll',  adtheme_shortcodes_URL . 'assets/css/onscroll.css' );
    wp_enqueue_style( 'onscroll' ); 	
	wp_register_style( 'shortcodes-posts-slider',  adtheme_shortcodes_URL . 'assets/css/shortcodes-posts-slider.css' );
    wp_enqueue_style( 'shortcodes-posts-slider' );	
	wp_register_style( 'shortcodes-qtrotator',  adtheme_shortcodes_URL . 'assets/css/shortcodes-qtrotator.css' );
    wp_enqueue_style( 'shortcodes-qtrotator' );	
	wp_register_style( 'animated',  adtheme_shortcodes_URL . 'assets/css/animated.css' );
    wp_enqueue_style( 'animated' );	
	wp_register_style( 'owl.carousel',  adtheme_shortcodes_URL . 'assets/css/owl.carousel.css' );
    wp_enqueue_style( 'owl.carousel' );	
	wp_register_style( 'owl.theme',  adtheme_shortcodes_URL . 'assets/css/owl.theme.css' );
    wp_enqueue_style( 'owl.theme' );	
	wp_register_style( 'charts',  adtheme_shortcodes_URL . 'assets/css/charts.css' );
    wp_enqueue_style( 'charts' );
	wp_register_style( 'adonepage-woocommerce',  adtheme_shortcodes_URL . 'assets/css/woocommerce.css' );
    wp_enqueue_style( 'adonepage-woocommerce' );
	wp_register_style( 'adonepage-cf7',  adtheme_shortcodes_URL . 'assets/css/cf7.css' );
    wp_enqueue_style( 'adonepage-cf7' );									
}

// Backend
add_action( 'admin_enqueue_scripts', 'adtheme_shortcodes_backend_styles' );

function adtheme_shortcodes_backend_styles() {
	
	// Main
	wp_register_style( 'shortcodes-backend',  adtheme_shortcodes_URL . 'assets/css/backend.css' );
    wp_enqueue_style( 'shortcodes-backend' );

	// Fonts
	wp_register_style( 'adonepage-backend-fonts',  adtheme_shortcodes_URL . 'assets/css/backend-fonts.css' );
    wp_enqueue_style( 'adonepage-backend-fonts' );

	// Fonts
	wp_register_style( 'adonepage-backend-fonts-v2',  adtheme_shortcodes_URL . 'assets/css/fonts.css' );
    wp_enqueue_style( 'adonepage-backend-fonts-v2' );

}

// Backend
add_action('admin_enqueue_scripts', 'adtheme_shortcodes_backend_scripts');

function adtheme_shortcodes_backend_scripts() {
	
	wp_enqueue_script('jquery');
	wp_enqueue_script('adtheme-shortcodes-backend', adtheme_shortcodes_URL . 'assets/js/adtheme-shortcodes-backend.js', array('jquery'), '', true);
	wp_enqueue_style( 'wp-color-picker' );
    wp_enqueue_script( 'wp-color-picker-script', adtheme_shortcodes_URL . 'assets/js/colorpicker.js', array( 'wp-color-picker' ), false, true );
	
}

// Frontend
add_action('wp_enqueue_scripts', 'adtheme_shortcodes_frontend_scripts');

function adtheme_shortcodes_frontend_scripts() {
	
		 
	wp_enqueue_script('jquery-masonry');		
	wp_enqueue_script('adtheme-shortcodes-mixitup', adtheme_shortcodes_URL . 'assets/js/jquery.mixitup.js', array('jquery'), '', true);	
	wp_enqueue_script('adtheme-shortcodes-photobox', adtheme_shortcodes_URL . 'assets/js/photobox.js', array('jquery'), '', true);	
	
	wp_enqueue_script('adtheme-shortcodes-jquery.easing', adtheme_shortcodes_URL . 'assets/js/jquery.easing.1.3.js', array('jquery'), '', true);	
	
	
	wp_enqueue_script('shortcodes-posts-slider-modernizr.js', adtheme_shortcodes_URL . 'assets/js/shortcodes-posts-slider-modernizr.js', array('jquery'), '', true);
	wp_enqueue_script('jquery.cbpContentSlider.js', adtheme_shortcodes_URL . 'assets/js/jquery.cbpContentSlider.js', array('jquery'), '', true);	
	wp_enqueue_script('jquery.cbpQTRotator.js', adtheme_shortcodes_URL . 'assets/js/jquery.cbpQTRotator.js', array('jquery'), '', true);	

	wp_enqueue_script('onscroll-modernizr.custom.js', adtheme_shortcodes_URL . 'assets/js/onscroll-modernizr.custom.js', array('jquery'), '', true);	
	wp_enqueue_script('onscroll-cbpScroller.js', adtheme_shortcodes_URL . 'assets/js/onscroll-cbpScroller.js', array('jquery'), '', true);	
	wp_enqueue_script('onscroll-classie', adtheme_shortcodes_URL . 'assets/js/onscroll-classie.js', array('jquery'), '', true);	
	wp_enqueue_script('gallery-modernizr.custom.js', adtheme_shortcodes_URL . 'assets/js/gallery-modernizr.custom.js', array('jquery'), '', true);	
	
	wp_enqueue_script('scrollview.js', adtheme_shortcodes_URL . 'assets/js/scrollview.js', array('jquery'), '', true);
	
	wp_enqueue_script('owl.carousel.js', adtheme_shortcodes_URL . 'assets/js/owl.carousel.js', array('jquery'), '', true);

	wp_enqueue_script('jquery.appear.js', adtheme_shortcodes_URL . 'assets/js/jquery.appear.js', array('jquery'), '', true);
	wp_enqueue_script('jquery.infinitescroll.js', adtheme_shortcodes_URL . 'assets/js/jquery.infinitescroll.js', array('jquery'), '', true);
	wp_enqueue_script('jquery.easypiechart.min.js', adtheme_shortcodes_URL . 'assets/js/jquery.easypiechart.min.js', array('jquery'), '', true);
	
	wp_enqueue_script('jquery.countdown.js', adtheme_shortcodes_URL . 'assets/js/jquery.countdown.js', array('jquery'), '', true);
	
}