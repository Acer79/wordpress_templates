<?php
/*
File: inc/shortcodes-qtrotator.php
Description: Shortocodes Functions
Plugin: ADTHEME SHORTCODES
Author: Ad-theme.com
*/

function adtheme_qtrotator($attr,$content){
		  $excerpt = $attr['excerpt'];
		  $number = $attr['num'];
		  $source = $attr['source'];
		  if($source == 'posts') {
		  	$category = $attr['cat'];
		   	if($category == 'all') { $category = ''; }
		  }
		  $color = $attr['color'];
		  
		  $return = '<style>';
		  $return .= '.cbp-qtrotator .cbp-qtcontent {
					border-bottom: 1px solid '.$color.';
		  }
		  .cbp-qtprogress {
			  	background: '.$color.';
		  }';
		  $return .= '</style>';
		// OPEN CONTAINER 	
		$return .= '<div id="cbp-qtrotator" class="cbp-qtrotator">';		
		$query = 'posts_per_page='.$number.'&post_status=publish';
		
		
		if($source == 'posts') {
			$query .= '$post_type=Post&category_name='.$category.'';
		}
		if($source == 'clients') {
			$query .= '&post_type=adclients_post';
		}
		if($source == 'team') {
			$query .= '&post_type=adteam_post';
		}
		

		$loop = new WP_Query($query);
			$i=1;
            if($loop) { 
			while ( $loop->have_posts() ) : $loop->the_post();
			
				$return .= '<div class="cbp-qtcontent">';
					if(has_post_thumbnail()){ 					
						$thumbnail_url = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_id() ), 'adonepage_posts-slider-medium');
						$return .= '<img src="'.$thumbnail_url[0].'" alt="'.get_the_title().'">'; 					 
						} else {                                     
						$return .= '<img src="' . adtheme_shortcodes_URL . '/assets/img/no-img.png" alt="no img" >';                             
					}
				$return .= '<blockquote>';
				$return .= '<p>'.substr(get_the_excerpt(), 0, $excerpt).'</p>';
				$return .= '<footer>'.get_the_title().'</footer>';
				$return .= '</blockquote>';
				$return .= '</div>';
		    
			$i++;
            endwhile;  
			}
		$return .= '</div>'; // CLOSE CONTAINER

		$return .= "
		  	<script>
				jQuery(document).ready(function($){
						$( '#cbp-qtrotator' ).cbpQTRotator();
				});	
			</script>";
		
		return $return;
}
add_shortcode("adtheme_qtrotator","adtheme_qtrotator");