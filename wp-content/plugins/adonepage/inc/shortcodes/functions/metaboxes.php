<?php
/*
File: inc/metaboxes.php
Description: Metaboxes
Plugin: ADTHEME SHORTCODES
Author: Ad-theme.com
*/

function adtheme_shortcodes_add_custom_box() {

    $screens = array( 'post' );

    foreach ( $screens as $screen ) {

        add_meta_box(
            'adtheme_shortcodes_sectionid',
            __( 'ADTHEME SHORTCODES OPTIONS', 'adonepage' ),
            'adtheme_shortcodes_inner_custom_box',
            $screen, 'normal', 'high'
        );
    }
}
add_action( 'add_meta_boxes', 'adtheme_shortcodes_add_custom_box' );


function adtheme_shortcodes_inner_custom_box( $post ) {

    wp_nonce_field( 'adtheme_shortcodes_inner_custom_box', 'adtheme_shortcodes_inner_custom_box_nonce' );

	$portfolio_url_value = get_post_meta( $post->ID, '_adtheme_portfolio_url_value', true );
  

  /*********************** PANEL WIDTH *************************/
  
  echo '<label for="adtheme_shortcodes_url_field">';
       _e( "URL ", 'adportfolio' );
  echo '</label> ';
  echo '<input type="text" id="adtheme_shortcodes_url_field" name="adtheme_shortcodes_url_field" value="' . esc_attr( $portfolio_url_value ) . '" size="25" />';  

  echo '<br>';

}

/**
 * When the post is saved, saves our custom data.
 *
 * @param int $post_id The ID of the post being saved.
 */
function adtheme_shortcodes_save_postdata( $post_id ) {

  /*
   * We need to verify this came from the our screen and with proper authorization,
   * because save_post can be triggered at other times.
   */

  // Check if our nonce is set.
  if ( ! isset( $_POST['adtheme_shortcodes_inner_custom_box_nonce'] ) )
    return $post_id;

  $nonce = $_POST['adtheme_shortcodes_inner_custom_box_nonce'];

  // Verify that the nonce is valid.
  if ( ! wp_verify_nonce( $nonce, 'adtheme_shortcodes_inner_custom_box' ) )
      return $post_id;

  // If this is an autosave, our form has not been submitted, so we don't want to do anything.
  if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
      return $post_id;

  // Check the user's permissions.
  if ( 'page' == $_POST['post_type'] ) {

    if ( ! current_user_can( 'edit_page', $post_id ) )
        return $post_id;
  
  } else {

    if ( ! current_user_can( 'edit_post', $post_id ) )
        return $post_id;
  }

  /* OK, its safe for us to save the data now. */
  
  // Sanitize user input.
  $adtheme_shortcodes_url_field = sanitize_text_field( $_POST['adtheme_shortcodes_url_field'] );

  // Update the meta field in the database.
  update_post_meta( $post_id, '_adtheme_portfolio_url_value', $adtheme_shortcodes_url_field );  
              
}
add_action( 'save_post', 'adtheme_shortcodes_save_postdata' );