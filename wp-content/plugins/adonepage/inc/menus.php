<?php
/*
File: inc/menus.php
Description: Plugin Menus
Plugin: AD ONE PAGE
Author: Ad-theme.com
*/

add_action('admin_menu', 'adonepage_menus');

function adonepage_menus() {

    add_submenu_page( 'edit.php?post_type=adonepage', __('AD ONE PAGE', PLG_NAME_ADONEPAGE), __('Settings', PLG_NAME_ADONEPAGE), 'manage_options', 'adonepage_settings', 'adonepage_settings', plugins_url( PLG_NAME_ADONEPAGE.'/assets/img/main_icon.png' ));

}