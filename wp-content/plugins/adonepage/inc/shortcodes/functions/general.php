<?php
/*
File: general.php
Description: ADTHEME SHORTCODES GENERAL FUNCTION
Plugin: ADTHEME SHORTCODES
Author: Ad-theme.com
*/

if (!function_exists('adtheme_shortcodes_setup')):

    function adtheme_shortcodes_setup() {
		add_image_size( 'adtheme_shortcodes_size_100', 100, 100, false );
		add_image_size( 'adtheme_shortcodes_size_200', 200, 200, false );
		add_image_size( 'adtheme_shortcodes_size_600', 600, 600, true );
		add_image_size( 'adtheme_shortcodes_size_1000', 1000, 1000, true );
		add_image_size( 'adonepage_posts-slider-small', 150, 100, true );
		add_image_size( 'adonepage_posts-slider-medium', 260, 180, true );
		add_image_size( 'adonepage_mega_post', 50, 50, true );	
		add_image_size( 'adonepage_woo_mega_only_image', 200, 200, true );	
	}
	
endif;

add_action('after_setup_theme', 'adtheme_shortcodes_setup');

// Post Type Registration

add_action( 'init', 'adonepage_adgallery_register_posttype_gallery_post' );

function adonepage_adgallery_register_posttype_gallery_post() {

	$labels = array(
		'name'               => __('AD Gallery', PLG_NAME_ADONEPAGE),
		'singular_name'      => __('AD Gallery', PLG_NAME_ADONEPAGE),
		'add_new'            => __('Add New Gallery', PLG_NAME_ADONEPAGE),
		'add_new_item'       => __('Add New Gallery', PLG_NAME_ADONEPAGE),
		'edit_item'          => __('Edit Gallery', PLG_NAME_ADONEPAGE),
		'new_item'           => __('New Gallery', PLG_NAME_ADONEPAGE),
		'all_items'          => __('All Gallery', PLG_NAME_ADONEPAGE),
		'view_item'          => __('View Gallery', PLG_NAME_ADONEPAGE),
		'search_items'       => __('Search Gallery', PLG_NAME_ADONEPAGE),
		'not_found'          => __('No Gallery found', PLG_NAME_ADONEPAGE),
		'not_found_in_trash' => __('No Gallery found in Trash', PLG_NAME_ADONEPAGE),
		'parent_item_colon'  => '',
		'menu_name'          => __('AD GALLERY', PLG_NAME_ADONEPAGE)
	  );

	  $args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'adgallery_post' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'show_in_nav_menus'  => false,
		'menu_position'      => null,		
		'menu_icon'			 => plugins_url( PLG_NAME_ADONEPAGE.'/assets/img/main_icon.png'),
		'supports'           => array( 'title' )
	  );

	  register_post_type( 'adgallery_post', $args );

}

// Custom Taxonomy

function adonepage_add_adgallery_post_cat_taxonomies() {

	register_taxonomy('adgallery_post_cat', 'adgallery_post', array(

		// Hierarchical taxonomy (like categories)
		'hierarchical' => true,
		'show_in_nav_menus'  => false,
		// This array of options controls the labels displayed in the WordPress Admin UI
		'labels' => array(
			'name' => _x( 'Gallery Category', 'taxonomy general name' ),
			'singular_name' => _x( 'Gallery Category', 'taxonomy singular name' ),
			'search_items' =>  __( 'Search Gallery Category' ),
			'all_items' => __( 'All Gallery Category' ),
			'parent_item' => __( 'Parent Gallery Category' ),
			'parent_item_colon' => __( 'Parent Gallery Category:' ),
			'edit_item' => __( 'Edit Gallery Category' ),
			'update_item' => __( 'Update Gallery Category' ),
			'add_new_item' => __( 'Add New Gallery Category' ),
			'new_item_name' => __( 'New Gallery Category' ),
			'menu_name' => __( 'Gallery Category' ),
		),
		// Control the slugs used for this taxonomy
		'rewrite' => array(
			'slug' => 'adgallery_post_cat', // This controls the base slug that will display before each term
			'with_front' => false, // Don't display the category base before "/locations/"
			'hierarchical' => true // This will allow URL's like "/locations/boston/cambridge/"		
		),
	));
}

add_action( 'init', 'adonepage_add_adgallery_post_cat_taxonomies', 0 );

// POST TYPE: TEAM

add_action( 'init', 'adonepage_adgallery_register_posttype_team_post' );

function adonepage_adgallery_register_posttype_team_post() {

	$labels = array(
		'name'               => __('Team', PLG_NAME_ADONEPAGE),
		'singular_name'      => __('Team', PLG_NAME_ADONEPAGE),
		'add_new'            => __('Add New User Team', PLG_NAME_ADONEPAGE),
		'add_new_item'       => __('Add New User Team', PLG_NAME_ADONEPAGE),
		'edit_item'          => __('Edit User Team', PLG_NAME_ADONEPAGE),
		'new_item'           => __('New User Team', PLG_NAME_ADONEPAGE),
		'all_items'          => __('All User Team', PLG_NAME_ADONEPAGE),
		'view_item'          => __('View User Team', PLG_NAME_ADONEPAGE),
		'search_items'       => __('Search User Team', PLG_NAME_ADONEPAGE),
		'not_found'          => __('No User Team', PLG_NAME_ADONEPAGE),
		'not_found_in_trash' => __('No User Team in Trash', PLG_NAME_ADONEPAGE),
		'parent_item_colon'  => '',
		'menu_name'          => __('TEAM', PLG_NAME_ADONEPAGE)
	  );

	  $args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'adteam_post' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'show_in_nav_menus'  => false,
		'menu_position'      => null,		
		'menu_icon'			 => plugins_url( PLG_NAME_ADONEPAGE.'/assets/img/main_icon.png'),
		'supports'           => array( 'title' , 'editor' , 'thumbnail' )
	  );

	  register_post_type( 'adteam_post', $args );

}

// POST TYPE: CLIENTS

add_action( 'init', 'adonepage_adgallery_register_posttype_clients_post' );

function adonepage_adgallery_register_posttype_clients_post() {

	$labels = array(
		'name'               => __('Clients', PLG_NAME_ADONEPAGE),
		'singular_name'      => __('Clients', PLG_NAME_ADONEPAGE),
		'add_new'            => __('Add New Client', PLG_NAME_ADONEPAGE),
		'add_new_item'       => __('Add New Client', PLG_NAME_ADONEPAGE),
		'edit_item'          => __('Edit Client', PLG_NAME_ADONEPAGE),
		'new_item'           => __('New Client', PLG_NAME_ADONEPAGE),
		'all_items'          => __('All Client', PLG_NAME_ADONEPAGE),
		'view_item'          => __('View Client', PLG_NAME_ADONEPAGE),
		'search_items'       => __('Search Client', PLG_NAME_ADONEPAGE),
		'not_found'          => __('No Client', PLG_NAME_ADONEPAGE),
		'not_found_in_trash' => __('No Client in Trash', PLG_NAME_ADONEPAGE),
		'parent_item_colon'  => '',
		'menu_name'          => __('CLIENT', PLG_NAME_ADONEPAGE)
	  );

	  $args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'adclients_post' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'show_in_nav_menus'  => false,
		'menu_position'      => null,		
		'menu_icon'			 => plugins_url( PLG_NAME_ADONEPAGE.'/assets/img/main_icon.png'),
		'supports'           => array( 'title' , 'editor' , 'thumbnail' )
	  );

	  register_post_type( 'adclients_post', $args );

}

// POST TYPE: PARTNERS

add_action( 'init', 'adonepage_adgallery_register_posttype_partners_post' );

function adonepage_adgallery_register_posttype_partners_post() {

	$labels = array(
		'name'               => __('Partners', PLG_NAME_ADONEPAGE),
		'singular_name'      => __('Partners', PLG_NAME_ADONEPAGE),
		'add_new'            => __('Add New Partner', PLG_NAME_ADONEPAGE),
		'add_new_item'       => __('Add New Partner', PLG_NAME_ADONEPAGE),
		'edit_item'          => __('Edit Partner', PLG_NAME_ADONEPAGE),
		'new_item'           => __('New Partner', PLG_NAME_ADONEPAGE),
		'all_items'          => __('All Partner', PLG_NAME_ADONEPAGE),
		'view_item'          => __('View Partner', PLG_NAME_ADONEPAGE),
		'search_items'       => __('Search Partner', PLG_NAME_ADONEPAGE),
		'not_found'          => __('No Partner', PLG_NAME_ADONEPAGE),
		'not_found_in_trash' => __('No Partner in Trash', PLG_NAME_ADONEPAGE),
		'parent_item_colon'  => '',
		'menu_name'          => __('PARTNERS', PLG_NAME_ADONEPAGE)
	  );

	  $args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'adpartners_post' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'show_in_nav_menus'  => false,
		'menu_position'      => null,		
		'menu_icon'			 => plugins_url( PLG_NAME_ADONEPAGE.'/assets/img/main_icon.png'),
		'supports'           => array( 'title' , 'thumbnail' )
	  );

	  register_post_type( 'adpartners_post', $args );

}

// WOOCOMMERCE EXCERPT
function adonepage_woo_excerpt($number) {
	global $post;
	$return = substr(get_the_excerpt(), 0, $number);
	$return .= ' <a class="woo-read-more" href="'. get_permalink($post->ID) . '">...</a>';
	return $return;
}

add_filter('widget_text', 'do_shortcode');