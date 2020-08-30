<?php
/*
Script Name: 	Custom Metaboxes and Fields
Contributors: 	Andrew Norcross ( @norcross / andrewnorcross.com )
				Jared Atchison ( @jaredatch / jaredatchison.com )
				Bill Erickson ( @billerickson / billerickson.net )
				Human Made Limited ( @humanmadeltd / hmn.md )
				Jonathan Bardo ( @jonathanbardo / jonathanbardo.com )
Description: 	This will create metaboxes with custom fields that will blow your mind.
Version: 	1.0.1
*/

/**
 * Released under the GPL license
 * http://www.opensource.org/licenses/gpl-license.php
 *
 * This is an add-on for WordPress
 * http://wordpress.org/
 *
 * **********************************************************************
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * **********************************************************************
 */

/**
 * Defines the url to which is used to load local resources.
 * This may need to be filtered for local Window installations.
 * If resources do not load, please check the wiki for details.
 */

if ( ! defined( 'adonepagecmb_DEV') )
	define( 'adonepagecmb_DEV', false );

if ( ! defined( 'adonepagecmb_PATH') )
	define( 'adonepagecmb_PATH', str_replace( '\\', '/', dirname( __FILE__ ) ) );

if ( ! defined( 'adonepagecmb_URL' ) )
	define( 'adonepagecmb_URL', str_replace( str_replace( '\\', '/', WP_CONTENT_DIR ), str_replace( '\\', '/', WP_CONTENT_URL ), adonepagecmb_PATH ) );

include_once( adonepagecmb_PATH . '/classes.fields.php' );
include_once( adonepagecmb_PATH . '/class.cmb-meta-box.php' );

// Make it possible to add fields in locations other than post edit screen.
include_once( adonepagecmb_PATH . '/fields-anywhere.php' );

// include_once( adonepagecmb_PATH . '/example-functions.php' );

/**
 * Get all the meta boxes on init
 *
 * @return null
 */
function adonepagecmb_init() {

	if ( ! is_admin() )
		return;

	// Load translations
	$textdomain = 'adonepagecmb';
	$locale = apply_filters( 'plugin_locale', get_locale(), $textdomain );

	// By default, try to load language files from /wp-content/languages/custom-meta-boxes/
	load_textdomain( $textdomain, WP_LANG_DIR . '/custom-meta-boxes/' . $textdomain . '-' . $locale . '.mo' );
	load_textdomain( $textdomain, adonepagecmb_PATH . '/languages/' . $textdomain . '-' . $locale . '.mo' );

	$meta_boxes = apply_filters( 'adonepagecmb_meta_boxes', array() );

	if ( ! empty( $meta_boxes ) )
		foreach ( $meta_boxes as $meta_box )
			new adonepagecmb_Meta_Box( $meta_box );

}
add_action( 'init', 'adonepagecmb_init' );

/**
 * Return an array of built in available fields
 *
 * Key is field name, Value is class used by field.
 * Available fields can be modified using the 'adonepagecmb_field_types' filter.
 *
 * @return array
 */
function _adonepagecmb_available_fields() {

	return apply_filters( 'adonepagecmb_field_types', array(
		'text'				=> 'adonepagecmb_Text_Field',
		'text_small' 		=> 'adonepagecmb_Text_Small_Field',
		'text_url'			=> 'adonepagecmb_URL_Field',
		'url'				=> 'adonepagecmb_URL_Field',
		'radio'				=> 'adonepagecmb_Radio_Field',
		'checkbox'			=> 'adonepagecmb_Checkbox',
		'file'				=> 'adonepagecmb_File_Field',
		'image' 			=> 'adonepagecmb_Image_Field',
		'wysiwyg'			=> 'adonepagecmb_wysiwyg',
		'textarea'			=> 'adonepagecmb_Textarea_Field',
		'textarea_code'		=> 'adonepagecmb_Textarea_Field_Code',
		'select'			=> 'adonepagecmb_Select',
		'taxonomy_select'	=> 'adonepagecmb_Taxonomy',
		'post_select'		=> 'adonepagecmb_Post_Select',
		'date'				=> 'adonepagecmb_Date_Field',
		'date_unix'			=> 'adonepagecmb_Date_Timestamp_Field',
		'datetime_unix'		=> 'adonepagecmb_Datetime_Timestamp_Field',
		'time'				=> 'adonepagecmb_Time_Field',
		'colorpicker'		=> 'adonepagecmb_Color_Picker',
		'title'				=> 'adonepagecmb_Title',
		'group'				=> 'adonepagecmb_Group_Field',
	) );

}

/**
 * Get a field class by type
 *
 * @param  string $type
 * @return string $class, or false if not found.
 */
function _adonepagecmb_field_class_for_type( $type ) {

	$map = _adonepagecmb_available_fields();

	if ( isset( $map[$type] ) )
		return $map[$type];

	return false;

}

/**
 * For the order of repeatable fields to be guaranteed, orderby meta_id needs to be set.
 * Note usermeta has a different meta_id column name.
 *
 * Only do this for older versions as meta is now ordered by ID (since 3.8)
 * See http://core.trac.wordpress.org/ticket/25511
 *
 * @param  string $query
 * @return string $query
 */
function adonepagecmb_fix_meta_query_order($query) {

    $pattern = '/^SELECT (post_id|user_id), meta_key, meta_value FROM \w* WHERE post_id IN \([\d|,]*\)$/';

    if (
            0 === strpos( $query, "SELECT post_id, meta_key, meta_value" ) &&
            preg_match( $pattern, $query, $matches )
    ) {

            if ( isset( $matches[1] ) && 'user_id' == $matches[1] )
                    $meta_id_column = 'umeta_id';
            else
                    $meta_id_column = 'meta_id';

            $meta_query_orderby = ' ORDER BY ' . $meta_id_column;

            if ( false === strpos( $query, $meta_query_orderby ) )
                    $query .= $meta_query_orderby;

    }

    return $query;

}

if ( version_compare( get_bloginfo( 'version' ), '3.8', '<' ) )
	add_filter( 'query', 'adonepagecmb_fix_meta_query_order', 1 );