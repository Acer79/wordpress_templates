<?php
/*
File: inc/shortcodes/adtheme-shortcodes.php
Description: ADTHEME SHORTCODES
Plugin: ADTHEME SHORTCODES
Author: Ad-theme.com
*/

define( 'adtheme_shortcodes_URL', WP_PLUGIN_URL . '/' . str_replace( basename(__FILE__), '', plugin_basename(__FILE__) ));

define( 'adtheme_shortcodes_DIR', WP_PLUGIN_DIR . '/' . str_replace( basename(__FILE__), '', plugin_basename(__FILE__) ));

require('functions/shortcodes-functions.php');
require('functions/metaboxes.php');
require('functions/general.php');
require('editor/shortcodes.php');
require('assets/assets.php');