<?php

if( class_exists('Ultimate_VC_Addons')) {
	
	//	Visual Composer custom shortcodes
	require_once plugin_dir_path( __FILE__ ) . 'includes/shortcodes/evatheme_before-after.php';
	require_once plugin_dir_path( __FILE__ ) . 'includes/shortcodes/evatheme_blog.php';
	require_once plugin_dir_path( __FILE__ ) . 'includes/shortcodes/evatheme_gallery.php';
	require_once plugin_dir_path( __FILE__ ) . 'includes/shortcodes/evatheme_partners.php';
	require_once plugin_dir_path( __FILE__ ) . 'includes/shortcodes/evatheme_portfolio.php';
	require_once plugin_dir_path( __FILE__ ) . 'includes/shortcodes/evatheme_testimonials.php';

	require_once plugin_dir_path( __FILE__ ) . 'includes/custom_params.php';
	
}
?>