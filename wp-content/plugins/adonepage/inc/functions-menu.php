<?php

function adonepage_menu($ad_onepage_id, $group_data) {
	$logo_link = get_post_meta( $ad_onepage_id, 'logo-link', true );
	$adonepage_logo_id = get_post_meta( $ad_onepage_id, 'adonepage-logo', true );
	$adonepage_logo = wp_get_attachment_image_src( $adonepage_logo_id , 'full');
	$menu = get_post_meta( $ad_onepage_id, 'menu', true );
	$logo_position = get_post_meta( $ad_onepage_id, 'logo-position', true );
	$woo_cartbutton_active = get_post_meta( $ad_onepage_id, 'woocommerce-menu-active', true );
	?>

<div class="adonepage-menu <?php echo get_post_meta( $ad_onepage_id, 'menu-position', true ); ?> nosticky">
    <div class="wrapper">
    <?php if($logo_position == 'left') {  ?>
    	<div class="adonepage-logo logoposition-<?php echo $logo_position; ?>">
        	<a href="<?php 			
			if($logo_link == 'home') {
			echo site_url(); 
			} else {
				the_permalink();
			}
			?>
            ">
        	<img src="<?php echo $adonepage_logo[0]; ?>" >
            </a>        
        </div>
   <?php } ?>
   <div class="menu-container logoposition-<?php echo $logo_position; ?>">     
		<?php
				
                if($menu == 'landing-page') { 
					
					echo '<ul class="navigation adop-menu-top sf-menu">';
										
					$first_block_name 				= get_post_meta( $ad_onepage_id, 'first-block-name', true ); //
					$first_block_name_active_menu 	= get_post_meta( $ad_onepage_id, 'first-block-name-active-menu', true );
					
					if(!empty($first_block_name) && $first_block_name_active_menu == 'yes') {
						echo '<li data-slide="1"><a href="#slide1">'.$first_block_name.'</a></li>';
					}
					
					$i=2;
					foreach ( $group_data as $single_field ) :
					if(!empty($single_field['block-name']) && $single_field['block-name-active-menu'] == 'yes') {
						echo '<li data-slide="'.$i.'"><a href="#slide'.$i.'">'.$single_field['block-name'].'</a></li>';
					}
					
					$i++;
					endforeach;				
									
					echo '</ul>';						

					} else {
					
					if ( function_exists( 'wp_nav_menu' ) && has_nav_menu($menu) )  {
						wp_nav_menu(array(
							'container'       => 'ul', 
							'theme_location'  => $menu,
							'container_class' => false, 
							'container_id'    => false,
							 'menu_class'     => 'navigation-wp adop-menu-top sf-menu', 
							'fallback_cb'	  => 'nav_fallback',
							 'menu_id'        => false
						)
						);
					 }
					 
				} // END ELSE
                    
               	// WOOCOMMERCE ACTIVE
	
        if($woo_cartbutton_active == 'on' && class_exists( 'woocommerce' )) { ?>

                        <?php global $woocommerce; 
						$cart_url = $woocommerce->cart->get_cart_url();?>
                        <div class="adop-woocommerce-menu">
						<ul class="navigation">
                            <li class="adtheme-icon"><i class="icon-cart"></i>
                                <a class="cart-contents" href="<?php echo $cart_url ; ?>" title="<?php _e('View your shopping cart', 'adonepage'); ?>">
                                <?php echo sprintf(_n('%d item', '%d items', $woocommerce->cart->cart_contents_count, 'adonepage'), $woocommerce->cart->cart_contents_count);?>    
                                </a></li>
                            <li class="adtheme-icon"><i class="icon-coin"></i>
                                <a class="cart-contents" href="<?php echo $cart_url; ?>" title="<?php _e('View your shopping cart', 'adonepage'); ?>">
                                <?php echo $woocommerce->cart->get_cart_total(); ?></a>
                            </li>                                                                                              
						</ul>
                        </div>
              	<?php	} // END WOOCOMMERCE CART

        ?>
        </div>				

        <?php if($logo_position == 'right') {  ?>
    	<div class="adonepage-logo logoposition-<?php echo $logo_position; ?>">
        	<a href="<?php 			
			if($logo_link == 'home') {
			echo site_url(); 
			} else {
				the_permalink();
			}
			?>
            ">
        	<img src="<?php echo $adonepage_logo[0]; ?>" >
            </a>        
        </div>
   <?php } ?> 
    </div>
</div>		

<?php } ?>