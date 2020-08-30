<?php

/*
File: inc/install.php
Description: Install functions
Plugin: AD ONE PAGE
Author: Ad-theme.com
*/

//***************************************************************************

// Options Install/Unistall

//***************************************************************************

register_activation_hook(__FILE__,'adonepage_install_options');
register_deactivation_hook(__FILE__, 'adonepage_uninstall_options');

// Install Options Function

function adonepage_install_options() {

	// Force to uninstall past options

    adonepage_uninstall_options();

	// Add the options

	add_option('adonepage_custom_css','');

	// Update the revrite rules on activation

	flush_rewrite_rules();

}

// Uninstall Options Function

function adonepage_uninstall_options() { 
	// Remove Options

	delete_option('adonepage_custom_css');

	// Update the revrite rules on deactivation

	flush_rewrite_rules();

}

//***************************************************************************

// Plugin INIT

//***************************************************************************

// ASSETS

require_once(adonepage_DIR.'inc/assets.php');

// MENUS & PAGES SETTINGS

require_once(adonepage_DIR.'inc/menus.php');
require_once(adonepage_DIR.'inc/settings.php');

// FUNCTION

require_once(adonepage_DIR.'inc/functions.php');

// SHORTCODES

require_once(adonepage_DIR.'inc/add.size.php');

// POST TYPE

require_once(adonepage_DIR.'inc/posttype.php');

// METABOXES

require_once(adonepage_DIR.'inc/metaboxes.php');

// METABOXES FRAMEWORK

require_once( adonepage_DIR.'inc/Custom-Meta-Boxes/custom-meta-boxes.php' );
require_once( adonepage_DIR.'inc/Custom-Meta-Boxes/adtheme-metaboxes-functions.php' );

// ADTHEME SHORTCODES

require_once(adonepage_DIR.'inc/shortcodes/adtheme-shortcodes.php');

// SHORTCODES

require_once(adonepage_DIR.'inc/templates.php');

// WIDGET

require_once(adonepage_DIR.'inc/widget/widget-mega-posts.php');
require_once(adonepage_DIR.'inc/widget/widget-flickr.php');
require_once(adonepage_DIR.'inc/widget/widget-woo-mega.php');
require_once(adonepage_DIR.'inc/widget/widget-contacts.php');

// UPDATE LIBRARY

require_once(adonepage_DIR.'inc/update-notifier.php');