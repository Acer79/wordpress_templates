<?php

/*
File: inc/add.size.php
Description: Custom ADD SIZE
Plugin: AD ONE PAGE
Author: Ad-theme.com
*/

function adonepage_add_image_sizes() {

$adonepage_custom1_size_width = get_option( 'adonepage_custom1_size_width', '' );

$adonepage_custom1_size_height = get_option( 'adonepage_custom1_size_height', '' );

$adonepage_custom1_size_crop = get_option( 'adonepage_custom1_size_crop', '' );



$adonepage_custom2_size_width = get_option( 'adonepage_custom2_size_width', '' );

$adonepage_custom2_size_height = get_option( 'adonepage_custom2_size_height', '' );

$adonepage_custom2_size_crop = get_option( 'adonepage_custom2_size_crop', '' );

	

$adonepage_custom3_size_width = get_option( 'adonepage_custom3_size_width', '' );

$adonepage_custom3_size_height = get_option( 'adonepage_custom3_size_height', '' );

$adonepage_custom3_size_crop = get_option( 'adonepage_custom3_size_crop', '' );

	

$adonepage_custom4_size_width = get_option( 'adonepage_custom4_size_width', '' );

$adonepage_custom4_size_height = get_option( 'adonepage_custom4_size_height', '' );

$adonepage_custom4_size_crop = get_option( 'adonepage_custom4_size_crop', '' );



$adonepage_custom_size_grid = get_option( 'adonepage_custom_size_grid', '' );



if(!empty($adonepage_custom1_size_width)) {

	add_image_size( 'adonepage_custom1_size', $adonepage_custom1_size_width, $adonepage_custom1_size_height, $adonepage_custom1_size_crop );

}

if(!empty($adonepage_custom2_size_width)) {

add_image_size( 'adonepage_custom2_size', $adonepage_custom2_size_width, $adonepage_custom2_size_height, $adonepage_custom2_size_crop );

}

if(!empty($adonepage_custom3_size_width)) {

add_image_size( 'adonepage_custom3_size', $adonepage_custom3_size_width, $adonepage_custom3_size_height, $adonepage_custom3_size_crop );

}

if(!empty($adonepage_custom4_size_width)) {

add_image_size( 'adonepage_custom4_size', $adonepage_custom4_size_width, $adonepage_custom4_size_height, $adonepage_custom4_size_crop );

}

if(!empty($adonepage_custom_size_grid )) {

add_image_size( 'adonepage_custom_size_grid', $adonepage_custom_size_grid );

}

}

add_action( 'init', 'adonepage_add_image_sizes' );



add_filter( 'image_size_names_choose', 'adonepage_custom_image_sizes_choose' );

function adonepage_custom_image_sizes_choose( $sizes ) {

    $custom_sizes = array(

        'adonepage_custom1_size' => 'Custom Size 1',

        'adonepage_custom2_size' => 'Custom Size 2',

		'adonepage_custom3_size' => 'Custom Size 3',

        'adonepage_custom4_size' => 'Custom Size 4',

		'adonepage_custom_size_grid' => 'Custom Size Grid'

    );

    return array_merge( $sizes, $custom_sizes );

}