<?php
/*
File: inc/shortcodes-gallery.php
Description: Shortocodes Functions
Plugin: ADTHEME SHORTCODES
Author: Ad-theme.com
*/

function adop_gallery( $attr ) {
	$id = rand(1,1000);
	$category = $attr['category'];
	$number = $attr['n'];
	if(empty($number) || ($number == '')) { $number == '6'; }
	$bg = $attr['bg'];
	$color = $attr['co'];
	$padding = $attr['pa'];
	$show_filter = $attr['sf'];
	$filter_position = $attr['fp'];
	$columns = $attr['col'];	

$return = '<style type="text/css">
.adtheme-shortcodes-gallery.gallery_conteiner'.$id.' .gallery {
	padding:'.$padding.';
}
.adtheme-shortcodes-gallery.gallery_conteiner'.$id.' #filters {
	text-align:'.$filter_position.';
}
.adtheme-shortcodes-gallery.gallery_conteiner'.$id.' #filters li span.active {
	background:'.$bg.';
	color:'.$color.'!important;
}
.adtheme-shortcodes-gallery.gallery_conteiner'.$id.' .gallery .label-bg {
	background:'.$bg.';
	color:'.$color.'!important;
}
.adtheme-shortcodes-gallery.gallery_conteiner'.$id.' #filters li:hover span {
	background:'.$bg.';
	color:'.$color.'!important;
}
</style>';
$return .= "<script type=\"text/javascript\">
jQuery(document).ready(function($){
	$(function () {	
		var filterList = {
			init: function () {
				// MixItUp plugin
				// http://mixitup.io
				$('#gallerylist.gallery".$id."').mixitup({
					targetSelector: '.gallery',
					filterSelector: '.galleryfilter',
					effects: ['fade'],
					easing: 'snap',
					// call the hover effect
					onMixEnd: filterList.hoverEffect()
				});				
			},			
			hoverEffect: function () {		
				// Simple parallax effect
			/*	$('#gallerylist .gallery').hover(
					function () {
						$(this).find('.label').stop().animate({bottom: 0}, 200, 'easeOutQuad');
						$(this).find('a img').stop().animate({top: -40}, 500, 'easeOutQuad');				
					},
					function () {
						$(this).find('.label').stop().animate({bottom: -100}, 200, 'easeInQuad');
						$(this).find('a img').stop().animate({top: 0}, 300, 'easeOutQuad');								
					}		
				);*/							
			}
		};	
		// Run the show!
		filterList.init();	
	});	
	$('#gallerylist').photobox('a.hi-icon', { 
				thumbs:true,
				time:2000,
				autoplay: true,
				counter: true 			 
	});
});
</script>";

$return .= '<div class="adtheme-shortcodes-gallery gallery_conteiner'.$id.'">';

$return .= '<ul id="filters" class="clearfix '.$filter_position.'"'; 

if($show_filter == 'no') { $return .= 'style="display:none"'; }

$return .= '>';
$return .= '<li><span class="galleryfilter active" data-filter="all">All</span></li>';
	if ($category == 'all') {
    	$categories = get_categories('taxonomy=adgallery_post_cat');
	  foreach ( $categories as $category ) {
	  $return .= '<li><span class="galleryfilter" data-filter="' . $category->slug . '">' . $category->name . '</span></li>';
    }
	$category = '';
	} else {
		
		$category_single = explode( ',', $category );
		foreach ( $category_single as $category_name ) {
			$term = get_term_by('name', $category_name , 'adgallery_post_cat');
      		$return .= '<li><span class="galleryfilter" data-filter="' . $term->slug . '">'; 
			$return .= $category_name;
			//$category_name . 
			$return .= '</span></li>';
    	}
		
	}
    
$return .= '</ul>';   


$return .= '<div id="gallerylist" class="gallery'.$id.'">';
	
		$separator = ' ';

		$query = 'posts_per_page='.$number.'&post_status=publish&post_type=adgallery_post';
		$query .= '&adgallery_post_cat='.$category.'';	
		$i=1;
		$loop = new WP_Query($query);
		
		if($loop) { 
		while ( $loop->have_posts() ) : $loop->the_post();
		
		$cat_array = wp_get_post_terms( get_the_ID(), 'adgallery_post_cat');
		$cat_list = '';
		$cat_list2 = array();
		foreach ( $cat_array as $category ) {
					$cat_list .= $category->slug.' ';
					$cat_list2[] = $category->name;
		}	
	?>    
		    <?php 
			
			$gallery_image = get_post_meta( get_the_id(), 'gallery-image', false );
            foreach ( $gallery_image as $single_image_id ):
			
			if($columns == 'col_1_4' || $columns == 'col_1_5' || $columns == 'col_1_6') {
				$single_image = wp_get_attachment_image_src( $single_image_id, 'adtheme_shortcodes_size_600' );
			} else {
				$single_image = wp_get_attachment_image_src( $single_image_id, 'adtheme_shortcodes_size_1000' );
			}
			
			$single_image_large = wp_get_attachment_image_src( $single_image_id, 'adtheme_shortcodes_size_1000' );

			
			$return .= '<div class="gallery '.$columns.' ';  
			
			$return .= $cat_list;
			$return .= '" data-cat="'.$cat_list.'">';

			$return .=	'<div class="gallery-wrapper">			
                    <a href="'.$single_image[0].'" title="'.get_the_title().'">';

					
			$return .=	'<img src="'.$single_image[0].'">';


            $return .=  '<div class="label">
						<div class="label-text">
                        		<div class="hi-icon-wrap hi-icon-effect-1 hi-icon-effect-1a">
									<a class="hi-icon hi-icon-refresh" href="'.$single_image_large[0].'" title="'.get_the_title().'">
                                    <div style="display:none">
										<img src="'.$single_image_large[0].'">  
                                    </div>                                                                
                                    </a>
								</div>
                        </div>						
					</div>
                    </a>                                                                           
				</div>
           </div>';
	if( $i == $number ) { break; }
	$i++;
	endforeach;
	//if( $i == $number ) { break; }
	endwhile; 
	}            

	$return .= '</div>	
	<div class="adclear"></div>		
	</div>';
	
	return $return;
	
    }  
add_shortcode("adop_gallery", "adop_gallery");