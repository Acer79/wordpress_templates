<?php
/*
Plugin Name: AD ONE PAGE
Plugin URI: http://www.ad-theme.com
Description: AD ONE PAGE - One Page Builder
Author: Ad-theme.com
Version: 1.4
Author URI: http://demo.ad-theme.com/plugin/adonepage/newdemo/
Compatibility: WP 3.6.x - 3.7.x - 3.8.x - 3.9.x - 4.x.
*/

// Basic plugin definitions 

define ('PLG_NAME_ADONEPAGE', 'adonepage');
define( 'PLG_VERSION_ADONEPAGE', '1.4' );
define( 'adonepage_URL', WP_PLUGIN_URL . '/' . str_replace( basename(__FILE__), '', plugin_basename(__FILE__) ));
define( 'adonepage_DIR', WP_PLUGIN_DIR . '/' . str_replace( basename(__FILE__), '', plugin_basename(__FILE__) ));


// LANGUAGE
add_action('init', 'localization_init');
function localization_init() {
    $path = dirname(plugin_basename( __FILE__ )) . '/languages/';
    $loaded = load_plugin_textdomain( 'adonepage', false, $path);
}

// Plugin INIT

require_once(adonepage_DIR.'inc/install.php');