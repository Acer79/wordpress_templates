<?php
/*
File: inc/shortcodes-portflio.php
Description: Shortocodes Functions
Plugin: ADTHEME SHORTCODES
Author: Ad-theme.com
*/

function adop_portfolio( $attr ) {
	$id = rand(1,1000);
	$category = $attr['category'];
	$number = $attr['n'];
	if(empty($number) || ($number == '')) { $number = '8'; }
	$bg = $attr['bg'];
	$color = $attr['co'];
	$padding = $attr['pa'];
	$show_filter = $attr['sf'];
	$filter_position = $attr['fp'];
	$columns = $attr['col'];
	$link_post_url = $attr['lpurl'];
	$link_target = $attr['lt'];
	$title = $attr['title'];
	$category_active = $attr['ca'];
	$date = $attr['date'];
	$text = $attr['text'];
	$excerpt = $attr['excerpt'];
	if(empty($excerpt) || ($excerpt == '')) { $excerpt = '50'; }      
						

$return = '<style type="text/css">
.adtheme-shortcodes-portfolio.portfolio_conteiner'.$id.' .portfolio {
	padding:'.$padding.';
}
.adtheme-shortcodes-portfolio.portfolio_conteiner'.$id.' #filters {
	text-align:'.$filter_position.';
}
.adtheme-shortcodes-portfolio.portfolio_conteiner'.$id.' #filters li span.active {
	background:'.$bg.';
	color:'.$color.'!important;
}
.adtheme-shortcodes-portfolio.portfolio_conteiner'.$id.' #filters li span {
	color:'.$bg.'!important;	
}
.adtheme-shortcodes-portfolio.portfolio_conteiner'.$id.' .portfolio .label-bg {
	background:'.$bg.';
	color:'.$color.'!important;
}
.adtheme-shortcodes-portfolio.portfolio_conteiner'.$id.' #filters li:hover span {
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
				$('#portfoliolist.portfolio".$id."').mixitup({
					targetSelector: '.portfolio',
					filterSelector: '.filter',
					effects: ['fade'],
					easing: 'snap',
					// call the hover effect
					onMixEnd: filterList.hoverEffect()
				});				
			},			
			hoverEffect: function () {		
				// Simple parallax effect
				$('#portfoliolist .portfolio').hover(
					function () {
						$(this).find('.label').stop().animate({bottom: 0}, 200, 'easeOutQuad');
						$(this).find('img').stop().animate({top: -40}, 500, 'easeOutQuad');				
					},
					function () {
						$(this).find('.label').stop().animate({bottom: -180}, 200, 'easeInQuad');
						$(this).find('img').stop().animate({top: 0}, 300, 'easeOutQuad');								
					}		
				);							
			}
		};	
		// Run the show!
		filterList.init();	
	});	
});
</script>";

$return .= '<div class="adtheme-shortcodes-portfolio portfolio_conteiner'.$id.'">';


$return .=  '<ul id="filters" class="clearfix '.$filter_position .'"';
if($show_filter == 'no'){
$return .=  'style="display:none"'; 
} 
$return .= '>';
$return .= '<li><span class="filter active" data-filter="all">All</span></li>';

	if ($category == 'all') {
    	$categories = get_categories();
	  foreach ( $categories as $category ) {
	  $return .=  '<li><span class="filter" data-filter="' . $category->slug . '">' . $category->name . '</span></li>';
    }
	$category = '';
	} else {
		$category_single = explode( ',', $category );
		foreach ( $category_single as $category_name ) {
      		$return .=  '<li><span class="filter" data-filter="' . $category_name . '">'; 
			
			$idObj = get_category_by_slug($category_name); 
  			$name = $idObj->term_id;
			$return .=  get_cat_name($name);
			//$category_name . 
			$return .=  '</span></li>';
    	}
		
	}

$return .= '</ul>';   

$return .= '<div id="portfoliolist" class="portfolio'.$id.'">';
		
		$separator = ' ';

		$query = 'post_type=Post&posts_per_page='.$number.'&post_status=publish';
		$query .= '&category_name='.$category.'';
		$loop = new WP_Query($query);
		if($loop) { 
		while ( $loop->have_posts() ) : $loop->the_post();
		// ADD FIX FOR MULTIPLE CATEGORIES
		$categories = get_the_category();
		// END FIX
		// LINK
									
		if($link_post_url != 'no') { // IF POST URL
				if($link_post_url == 'post') {
					$link = get_permalink();
		}
		if($link_post_url == 'url') {
					$link = get_post_meta( get_the_id(), '_adtheme_portfolio_url_value', true );
				}	
		} 
		// END IF POST URL
		
	    
		
		$return .= 	'<div class="portfolio '.$columns.' ';  
			
			// ADD FIX FOR MULTIPLE CATEGORIES
			
			if($categories){
				foreach($categories as $category_class) {
					$return .=  $category_class->slug;
					$return .=  $separator;
				}	
			}
			
			// END FIX 
			
			$return .= '" data-cat="'.$categories[0]->slug.'">';
			$return .= '<div class="portfolio-wrapper">';				
					if(has_post_thumbnail()){ 
						$id_post = get_the_id();					
						if($columns == 'col_1_4' || $columns == 'col_1_5' || $columns == 'col_1_6') {													
								$single_image = wp_get_attachment_image_src( get_post_thumbnail_id($id_post), 'adtheme_shortcodes_size_600' );	
							} else {
								$single_image = wp_get_attachment_image_src( get_post_thumbnail_id($id_post), 'adtheme_shortcodes_size_1000' );	
							}						 
						 } else {               
                         $single_image[0] = adtheme_shortcodes_URL.'/assets/img/no-img.png';               
                    }
					$return .= '<img src="'.$single_image[0].'" alt="'.get_the_title().'" >';
					$return .= '<div class="label">
						<div class="label-text">';
                        	if($title == 'yes') { 
								$return .= '<a class="text-title" href="'.$link.'" title="'.get_the_title().'" target="'.$link_target.'">'.get_the_title().'</a>';
                            }
							$return .= '<div class="text-category">';
                                                                             
                            if($text == 'yes') {                            
                            $return .= '<span class="text">'.substr(get_the_excerpt(), 0, $excerpt).'</span>';                                                              
                               }
                            if($date == 'yes') {                                      
                            $return .= '<span class="date">'.get_the_date('m/d/Y').', </span>'; 
                            }   
                                                             
                            if($category_active == 'yes') {
							$return .= '<span class="category-name">';
									if($categories){
									 	foreach($categories as $category_class) {
											$return .= $category_class->name;
											$return .= $separator;
										}	
									}									
									$return .= '</span>';
                               }                                              
                                                                  
                         $return .= '</div>
						</div>
						<div class="label-bg"></div>
					</div>
				</div>
           </div>';     
    endwhile;
    }          
$return .= '</div>	
<div class="adclear"></div>		
</div>';

return $return;

    }  
add_shortcode("adop_portfolio", "adop_portfolio");