<?php
/*
File: inc/posttype.php
Description: Register AD POST PREVIEW Post Type
Plugin: AD ONE PAGE
Author: Ad-theme.com
*/

// Post Type Registration

add_action( 'init', 'adonepage_register_posttype' );



function adonepage_register_posttype() {



	$labels = array(

		'name'               => __('AD ONEPAGE', PLG_NAME_ADONEPAGE),

		'singular_name'      => __('AD ONEPAGE Panel', PLG_NAME_ADONEPAGE),

		'add_new'            => __('Add New ONE PAGE', PLG_NAME_ADONEPAGE),

		'add_new_item'       => __('Add New ONE PAGE', PLG_NAME_ADONEPAGE),

		'edit_item'          => __('Edit ONE PAGE', PLG_NAME_ADONEPAGE),

		'new_item'           => __('New ONE PAGE', PLG_NAME_ADONEPAGE),

		'all_items'          => __('All ONE PAGE', PLG_NAME_ADONEPAGE),

		'view_item'          => __('View ONE PAGE', PLG_NAME_ADONEPAGE),

		'search_items'       => __('Search ONE PAGE', PLG_NAME_ADONEPAGE),

		'not_found'          => __('No ONE PAGE found', PLG_NAME_ADONEPAGE),

		'not_found_in_trash' => __('No ONE PAGE found in Trash', PLG_NAME_ADONEPAGE),

		'parent_item_colon'  => '',

		'menu_name'          => __('AD ONEPAGE', PLG_NAME_ADONEPAGE)

	  );

	

	  $args = array(

		'labels'             => $labels,

		'public'             => false,

		'publicly_queryable' => true,

		'show_ui'            => true,

		'show_in_menu'       => true,

		'query_var'          => true,

		'rewrite'            => array( 'slug' => 'adonepage' ),

		'capability_type'    => 'post',

		'has_archive'        => true,

		'hierarchical'       => false,

		'show_in_nav_menus'  => false,

		'menu_position'      => null,		

		'menu_icon'			 => plugins_url( PLG_NAME_ADONEPAGE.'/assets/img/main_icon.png'),

		'supports'           => array( 'title' )

	  );

	

	  register_post_type( 'adonepage', $args );



}