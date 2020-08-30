<?php

/**
 * Include widgets
 */

require_once plugin_dir_path( dirname( __FILE__ ) ) . 'widgets/widget-posts.php';
require_once plugin_dir_path( dirname( __FILE__ ) ) . 'widgets/widget-social.php';


/**
 * Register widgets
 */

function evatheme_core_register_widgets() {
	register_widget( 'evatheme_core_widget_post_thumb' );
	register_widget( 'evatheme_core_widget_social' );
}

add_action( 'widgets_init', 'evatheme_core_register_widgets' );