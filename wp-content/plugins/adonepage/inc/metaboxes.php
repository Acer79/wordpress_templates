<?php
/*
File: inc/metaboxes.php
Description: Metaboxes
Plugin: AD ONE PAGE
Author: Ad-theme.com
*/

function adonepage_add_custom_box() {

    $screens = array( 'page' );

    foreach ( $screens as $screen ) {

        add_meta_box(
            'adonepage_sectionid',
            __( 'AD ONE PAGE', 'adonepage' ),
            'adonepage_inner_custom_box',
            $screen, 'normal', 'high'
        );
    }
}
add_action( 'add_meta_boxes', 'adonepage_add_custom_box' );


function adonepage_inner_custom_box( $post ) {

    wp_nonce_field( 'adonepage_inner_custom_box', 'adonepage_inner_custom_box_nonce' );
	$ad_onepage_id = get_post_meta( $post->ID, '_ad_onepage_id', true );
  
  echo '<label for="ad_onepage_id">';
       _e( "Select Landing Page", 'adonepage' );
  echo '</label> '; 
 
  ?>
  <select id="ad_onepage_id" name="ad_onepage_id" class="">

	   <?php 		
	   
		$adonepage_args = 'post_type=adonepage&post_status=publish&posts_per_page=-1';
		$adonepage_posts = query_posts( $adonepage_args );
			
		foreach($adonepage_posts as $adonepage_post) {
		
		echo '<option class="adonepage-shortcode"'; 
		
		if($ad_onepage_id == $adonepage_post->ID) { echo 'selected="selected" '; }
		
		echo 'value="'.$adonepage_post->ID.'">';
		echo $adonepage_post->post_title;
		echo '</option>'; 		
		
		}
				
		?>
		
  </select>
  
  
        
  
  <?php    
  echo '<input type="hidden" id="ad_postpreview_show_shortcode" name="ad_postpreview_show_shortcode" value="update">';
  echo '<br>';
  ?>
<?php
}

/**
 * When the post is saved, saves our custom data.
 *
 * @param int $post_id The ID of the post being saved.
 */
function adonepage_save_postdata( $post_id ) {

  /*
   * We need to verify this came from the our screen and with proper authorization,
   * because save_post can be triggered at other times.
   */

  // Check if our nonce is set.
  if ( ! isset( $_POST['adonepage_inner_custom_box_nonce'] ) )
    return $post_id;

  $nonce = $_POST['adonepage_inner_custom_box_nonce'];

  // Verify that the nonce is valid.
  if ( ! wp_verify_nonce( $nonce, 'adonepage_inner_custom_box' ) )
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
  
  $ad_onepage_id = sanitize_text_field( $_POST['ad_onepage_id'] );
  update_post_meta( $post_id, '_ad_onepage_id', $ad_onepage_id );                                                 
}
add_action( 'save_post', 'adonepage_save_postdata' );