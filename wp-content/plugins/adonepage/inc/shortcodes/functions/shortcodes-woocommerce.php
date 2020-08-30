<?php
/*
File: inc/shortcodes-woocommerce.php
Description: Shortocodes Functions
Plugin: ADTHEME SHORTCODES
Author: Ad-theme.com
*/

function adop_carousel_woocommerce( $attr ) {
	$id = rand(1,1000);
	$lazyload = $attr['lazy']; // true / false
	if(empty($lazyload)) { $lazyload = 'on'; }
	$navigation = $attr['nav'];	// true / false	
	$item_show = $attr['item_show'];
	if(empty($item_show) || $item_show == '') { $item_show = '4'; }		
	$number = $attr['number'];
	if(empty($number) || $number == '') { $number = '-1'; }
	$color = $attr['color'];
	$autoplay = $attr['autoplay'];
	$paginationSpeed = $attr['ps'];
	if(empty($paginationSpeed) || $paginationSpeed == '') { $paginationSpeed = '1000'; }
	$goToFirstSpeed = $attr['gtfs'];
	if(empty($goToFirstSpeed) || $goToFirstSpeed == '') { $goToFirstSpeed = '2000'; }
	$transitionStyle = $attr['transition'];
	if(empty($transitionStyle) || $transitionStyle == '') { $transitionStyle = 'fade'; }
	$woocommerce_cat = $attr['cat'];	

	if(empty($woocommerce_cat)) { $woocommerce_cat = 'all'; }
	if($woocommerce_cat=='all') {
		$woocommerce_category = '';
	} else {
		$woocommerce_category = $woocommerce_cat;		
	}
		  
	// OPEN CONTAINER		
	$query = 'posts_per_page='.$number.'&post_status=publish';
		
						
	if($woocommerce_category != '') {
		$query .= '&product_cat='.$woocommerce_category;
	}
	$query .= '&post_type=product';

$return = '<style type="text/css">
			.adop-woocommerce.style-1 .added_to_cart, .adop-woocommerce.style-1 .product_sales, .adop-woocommerce.style-1 .icon-plus, .adop-woocommerce.style-1 .icon-cart {
				border-color:'.$color.';
			}
			.adop-woocommerce.style-1 .sale_price {
				color:'.$color.';
			}
			.adop-woocommerce.style-1 .product_sales {
				background:'.$color.';
			}
		  </style>';
$return .= '<script type="text/javascript">
			jQuery(document).ready(function($){
				var owl = $("#adop-carousel-'.$id.'");
				  owl.owlCarousel({
					items : '.$item_show.',
					lazyLoad : '.$lazyload.',
					navigation : '.$navigation.',
					stopOnHover : true,
					';
					
					if(!empty($autoplay) || $autoplay != '') { 
						$return .= 'autoPlay: ' . $autoplay .',
						';
					}
					
			$return	.= 'paginationSpeed : '. $paginationSpeed.', 
					goToFirstSpeed : '. $goToFirstSpeed .',
					itemsTablet: [480,1],
					itemsMobile : false
				});
			});
			</script>';

$return	.= '<div id="adonepage-carousel">
        <div id="adop-carousel-'.$id.'" class="owl-carousel'.$id.' woo-carousel adtheme-icon">';
	
		$separator = ' ';
		$loop = new WP_Query($query);
		if($loop) { 
		while ( $loop->have_posts() ) : $loop->the_post();
		
		$link = get_permalink(); 
		$categories = get_the_category();
		$id_post = get_the_id();		
		$product = new WC_Product( $id_post );
		$price = $product->regular_price;
		$price_sales = $product->sale_price;
		$symbol = get_woocommerce_currency_symbol();
		/* END LOAD METABOXES */
		
		$return .=	'<div class="adop-woocommerce style-1">';				
					if(has_post_thumbnail()){ 				
								$single_image = wp_get_attachment_image_src( get_post_thumbnail_id($id_post), 'adtheme_shortcodes_size_600' );	 					 
						 } else {               
                         		$single_image[0] = adtheme_shortcodes_URL .'/assets/img/no-img.png';               
                     } 
					 if($lazyload == 'true') {
                     	$return .=	'<img class="lazyOwl" data-src="'.$single_image[0].'" alt="Lazy Owl Image">';
                     } else {
                     	$return .=	'<img class="no-lazyOwl" src="'.$single_image[0].'" alt="'.get_the_title().'">';
                     }
					 if(!empty($price_sales)) { 
                     
                     $return .=	'<div class="product_sales">'.__('Sale','adonepage').'</div>';
                     
                    } 
           			$return .=	'<div class="label">
                    			<h1><a href="'.$link.'">'.get_the_title().'</a></h1>
                                <div class="text">
									<span class="regular_price';
									if(!empty($price_sales)) {
									$return .= ' line-through';
									}
								$return .=	'">'.$price.' '.$symbol.'</span>';
									if(!empty($price_sales)) {
									
									$return .= '<span class="sale_price">'.$price_sales.' '.$symbol.'</span>';
									
									}
									
					$return .=	'</div>
								<a href="'.get_permalink().'" class="icon-plus"></a>';
					$return .= '<a class="add_to_cart_button product_type_simple added icon-cart" data-product_sku="" data-product_id="'.$id_post.'" rel="nofollow" href="?add-to-cart='.$id_post.'"></a>';
			$return .=  '</div>            
           </div>';             
	
	endwhile;
    }            
$return .= '</div>	
<div class="adclear"></div>		
</div>';

return $return;
    }  
add_shortcode("adop_carousel_woocommerce", "adop_carousel_woocommerce");



function adop_last_product_woocommerce( $attr ) {
	
	$id_last_product = rand(1,1000);
	$color = $attr['color'];
	$woocommerce_cat = $attr['cat'];	
	$col = $attr['col'];
    $infinite_scroll = $attr['is'];
	$number = $attr['num'];
	$description = $attr['description'];
	
	if(empty($woocommerce_cat)) { $woocommerce_cat = 'all'; }
	if($woocommerce_cat=='all') {
		$woocommerce_category = '';
	} else {
		$woocommerce_category = $woocommerce_cat;		
	}	
		
		
	$query = 'posts_per_page='.$number.'&post_status=publish';
	
	
	// INFINITE SCROLL 
	if($infinite_scroll == 'on') {
		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
		$paged_value = ",'paged' => ".$paged ;
	}	
	if($infinite_scroll == 'on') {
			$query .= '&paged='.$paged;
	}
	// INFINITE SCROLL END		
						
	if($woocommerce_category != '') {
		$query .= '&product_cat='.$woocommerce_category;
	}
	$query .= '&post_type=product';
	
	$return = '<style type="text/css">
				.grid-'.$id_last_product.' .product_info .product_name:before, .grid-'.$id_last_product.' .product_info {
					background-color:'.$color.';
				}
				.grid-'.$id_last_product.' .product_content .product_sales, .grid-'.$id_last_product.' .product_event .icon-plus, .grid-'.$id_last_product.' .product_event .icon-cart, .grid-'.$id_last_product.' .product_event .added_to_cart {
 					border-color:'.$color.';
				}
				.grid-'.$id_last_product.' .product_content .product_sales {
 					color:'.$color.';
				}
			</style>';

  // INFINITE SCROLL
  if($infinite_scroll == 'on') { 
	  $return .= '<script type="text/javascript">
	  				jQuery(function($){ 				
					var $container = $(\'.grid-'.$id_last_product.'\')
						$container.infinitescroll({
						  navSelector  : \'#nav-below\',    
						  nextSelector : \'#nav-below .nav-previous a\',  
						  itemSelector : \'.item_product\',     
						  loading: {
							  finishedMsg: \'No more pages to load.\',
							  img: \''.adtheme_shortcodes_URL .'/assets/img/AjaxLoader.gif\'
							}
						  });									
	  				});
	  			</script>';
  	}	
	// INFINITE SCROLL END
	
	
	
	
$return .= '<div id="container-last-product" class="grid-'.$id_last_product.' adtheme-icon">';	
		$i = '1';
		$loop = new WP_Query($query);
		if($loop) { 
		while ( $loop->have_posts() ) : $loop->the_post();
		
		$link = get_permalink(); 
		$categories = get_the_category();
		$id_post = get_the_id();		
		$product = new WC_Product( $id_post );
		$price = $product->regular_price;
		$price_sales = $product->sale_price;
		$symbol = get_woocommerce_currency_symbol();	
		
		/* GRID */
			
 		$return .= '<div class="woo_one_';
		if($col == '2') {
				$return .= 'half';
				if(!($i%2)) {
					$return .= ' masonry-last';
				}
		}
		if($col == '3') {
			$return .= 'third';
				if(!($i%3)) {
					$return .= ' masonry-last';
				}			
		}		
		if($col == '4') {
			$return .= 'fourth';
				if(!($i%4)) {
					$return .= ' masonry-last';
				}
		}
		if($col == '5') {
			$return .= 'fifth';
				if(!($i%5)) {
					$return .= ' masonry-last';
				}
		}		
		$return .= ' item_product">
		<div class="content_selector">
			<div class="product_content">';
 					if(has_post_thumbnail()){ 				
								$single_image = wp_get_attachment_image_src( get_post_thumbnail_id($id_post), 'adtheme_shortcodes_size_600' );	 					 
						 } else {               
                         		$single_image[0] = adtheme_shortcodes_URL .'/assets/img/no-img.png';               
                     } 
                     $return .=	'<img class="product_image" src="'.$single_image[0].'" alt="'.get_the_title().'">';
					 if(!empty($price_sales)) {                      
                     			$return .=	'<div class="product_sales">'.__('Sale','adonepage').'</div>';                    
                     }
					 $return .= '<div class="product_event">'; 
					 $return .= '<a href="'.get_permalink().'" class="icon-plus"></a>';
					 $return .= '<a class="add_to_cart_button product_type_simple added icon-cart" data-product_sku="" data-product_id="'.$id_post.'" rel="nofollow" href="?add-to-cart='.$id_post.'"></a>';					 				 
					 $return .= '</div></div>';
					 $return .= '<div class="product_info">
					 			 <div class="product_name"><a href="'.$link.'">'.get_the_title().'</a></div>';
					 $return .= '<div class="product_price"><span class="regular_price';
									if(!empty($price_sales)) {
									$return .= ' line-through';
									}
								$return .=	'">'.$price.' '.$symbol.'</span>';
									if(!empty($price_sales)) {
									
									$return .= '<span class="sale_price">'.$price_sales.' '.$symbol.'</span>';
									
									}
					$return .= '</div>';
					if($description == 'on') {
						$return .= '<div class="product_description">';										
						$return .= '<span class="description_title">'. __('Description Product','adonepage') . '</span>: <span class="description_text">' . adonepage_woo_excerpt(200) . '</span>';				
						$return .= '</div>';
					}
					$return .= '</div>';
					 
	 
		/* END GRID */
			
		$return .= '</div></div>';
				
		
		$i++;
		endwhile;	
		
		
		// INFINITE SCROLL	
		if($infinite_scroll == 'on') { 

		$return .= '<nav id="nav-below">
        <ul>
            <li class="nav-previous">'.get_next_posts_link( 'Read More', $loop->max_num_pages).'</li>
        </ul>
        </nav>';

    	}
		// END INFINITE SCROLL			
				
		}  
$return .= '</div>';

return $return;

}  
add_shortcode("adop_last_product_woocommerce", "adop_last_product_woocommerce");