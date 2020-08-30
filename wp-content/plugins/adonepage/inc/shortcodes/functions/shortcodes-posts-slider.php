<?php
/*
File: inc/shortcodes-posts-slider.php
Description: Shortocodes Functions
Plugin: ADTHEME SHORTCODES
Author: Ad-theme.com
*/

function adtheme_posts_slider($attr,$content){
		  $excerpt = $attr['excerpt'];
		  $number = $attr['num'];
		  $category = $attr['cat'];
		  if($category == 'all') { $category = ''; }
		  $color = $attr['color'];
		  
		  $return = '<style>';
		  $return .= '.cbp-contentslider {
			  			border: 4px solid '.$color.';
		  }
		  .cbp-contentslider nav {
			  	border-top: 4px solid '.$color.';
		  }
		  .cbp-contentslider nav a {
			  color:'.$color.';
			  border-right: 4px solid '.$color.';
		  }
		  .cbp-contentslider nav a:last-child {
			  	box-shadow: 1px 0 '.$color.';
		  }
		  .cbp-contentslider nav a:hover, .cbp-contentslider nav a.rc-active, .cbp-read-more {
			  	background: '.$color.';
		  }
		  .cbp-contentslider h3 {
			    color:'.$color.';
				border-bottom: 4px solid '.$color.';
		  }
		  .cbp-contentslider p {
			    color:'.$color.';
		  }
		  .cbp-image {
			    border-right: 1px solid '.$color.';
		  }';
		  $return .= "</style>";
		// OPEN CONTAINER 	
		$return .= '<div id="cbp-contentslider" class="cbp-contentslider">';
		$return .= '<ul>';
		$query = 'post_type=Post&posts_per_page='.$number.'&post_status=publish';
		$query .= '&category_name='.$category.'';
		$loop = new WP_Query($query);
		
			$i=1;
			if($loop) { 
			while ( $loop->have_posts() ) : $loop->the_post();
			  
			  $return .= '<li id="posts-slider-'. $i . '">
					<h3>'.get_the_title().'</h3>
						<div>
							<div class="cbp-image">';
							
							if(has_post_thumbnail()){ 					
							$thumbnail_url = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_id() ), 'adonepage_posts-slider-medium');
							$return .= '<img src="'.$thumbnail_url[0].'" alt="'.get_the_title().'">'; 
					 
						 	} else {             
                         
						  	$return .= '<img src="' . adtheme_shortcodes_URL . '/assets/img/no-img.png" alt="no img" >';               
                    	
							}
			  $return .= '</div>
							<div class="cbp-content">
									'.substr(get_the_excerpt(), 0, $excerpt).'
									<span class="cbp-read-more"><a href="'.get_permalink().'" alt="read more">'.__('Read More','adonepage').'</a></span>
								</div>
						</div>
			   </li>';
			$i++;
            endwhile;  
			}
			
        $return .= '</ul>';
        $return .= '<nav>';
			$i=1;
            if($loop) { 
			while ( $loop->have_posts() ) : $loop->the_post();
			
				$return .= '<a href="#posts-slider-' . $i . '">';
				$return .= '<span class="nav-image">';
					if(has_post_thumbnail()){ 					
						$thumbnail_url = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_id() ), 'adonepage_posts-slider-small');
						$return .= '<img src="'.$thumbnail_url[0].'" alt="'.get_the_title().'">'; 					 
						} else {                                     
						$return .= '<img src="' . adtheme_shortcodes_URL . '/assets/img/no-img.png" alt="no img" >';                             
					}
				$return .= '</span>';
				$return .= '<span class="nav-title">';
				$return .= get_the_title();
				$return .= '</span>';
				$return .= '</a>';
		    
			$i++;
            endwhile;  
			}
    	$return .= '</nav>';
		$return .= '</div>'; // CLOSE CONTAINER

		$return .= "
		  	<script>
				jQuery(document).ready(function($){
						$( '#cbp-contentslider' ).cbpContentSlider();
				});	
			</script>";
		
		return $return;
}
add_shortcode("adtheme_posts_slider","adtheme_posts_slider");