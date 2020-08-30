<?php
/**
 *	Evatheme Gallery Shortcode
 */

if ( ! function_exists( 'evatheme_core_vc_gallery_shortcode' ) ) {
	function evatheme_core_vc_gallery_shortcode( $atts, $content = NULL ) {
		
		$atts = vc_map_get_attributes( 'evatheme_core_vc_gallery', $atts );
		extract( $atts );
		
		wp_enqueue_script( 'evatheme_core-appeared' );
		wp_enqueue_style( 'evatheme_core-element-gallery' );
		
		$row_class = '';
		$item_class = '';
		$metro_class = '';
		$thumbnail = '';
		$column_class = $title = $el_class = $css = '';
		$large_img_src = '';
		$gal_images = '';
		$link_start = '';
		$link_end = '';
		$el_start = '';
		$el_end = '';
		$slides_wrap_start = '';
		$slides_wrap_end = '';
		
		$i = 0;
		$split_base_count = 1;
		$split_even_count = 1;
		$split_odd_count = 1;
		
		if ( 'split_slider' === $type ) {
			
			wp_enqueue_script( 'evatheme_core-splitslider' );
			wp_enqueue_style( 'evatheme_core-splitslider' );

			$slides_wrap_start = '<div class="split_wrapper"><div class="split">';
			$slides_wrap_end = '</div></div>';
		} elseif ( 'grid' === $type ) {
			
			if( 2 == $columns ) {
				$item_class .= ' col-sm-6';
			} elseif( 3 == $columns ) {
				$item_class .= ' col-sm-4';
			} elseif( 4 == $columns ) {
				$item_class .= ' col-sm-3';
			} elseif( 5 == $columns ) {
				$item_class .= ' col-sm-25';
			} else {
				$item_class .= ' col-sm-12';
			}
			
			if( 0 != $indent ) {
				$row_class .= 'ml-' . $indent . ' mr-' . $indent . ' ';
				$item_class .= ' pl' . $indent . ' pr' . $indent . ' pb' . $indent * 2 . ' ';
			} else {
				$item_class .= ' pl' . $indent . ' pr' . $indent . ' pb' . $indent * 2 . ' ';
			}
			
			$el_start = '<li class="isotope-items '. $item_class .'">';
			$el_end = '</li>';
			$slides_wrap_start = '<div class="isotope_container_wrap"><ul class="isotope-container row '. $row_class .'">';
			$slides_wrap_end = '</ul></div>';
			
		} elseif ( 'metro' === $type ) {
			
			$slides_wrap_start = '<div class="isotope_container_wrap"><ul class="isotope-container row ml-15 mr-15">';
			$slides_wrap_end = '</ul></div>';
			
		} elseif ( 'justified' === $type ) {
			
			wp_enqueue_script( 'justified-gallery' );
			wp_enqueue_style( 'justified-gallery' );
			
			$el_start = '';
			$el_end = '';
			$slides_wrap_start = '';
			$slides_wrap_end = '';
			
		}
		
		if ( '' === $images ) {
			$images = '-1,-2,-3';
		}
		
		$images = explode( ',', $images );
		
		foreach ( $images as $i => $image ) {
			$img_id = preg_replace( '/[^\d]/', '', $image );
			$img = wpb_getImageBySize( array(
				'attach_id' => $image,
				'thumb_size' => $img_size,
			) );
			$large_img_src = wp_get_attachment_image_src( $img_id, 'full' );
			if ( $large_img_src ) {
				$large_img_src = $large_img_src[0];
			}
			if ( 'metro' == $type ) {
				if( $i == 0 || $i == 5 || $i == 10 || $i == 13 || $i == 16 ) {
					$metro_class = ' metro_width2_height2';
				} elseif ( $i == 3 || $i == 11|| $i == 17 ) {
					$metro_class = ' metro_width2';
				} elseif ( $i == 4 || $i == 14 ) {
					$metro_class = ' metro_height2';
				} else {
					$metro_class = '';
				}
				
				$el_start = '<li class="isotope-items metro_item ' . $item_class . ' ' . $metro_class . '">';
				$el_end = '</li>';
				
				$thumbnail = '<span class="gallery_img_bg" style="background-image:url(' . $large_img_src . ')"></span>';
			} else {
				$thumbnail = $img['thumbnail'];
			}
			
			if ( 'split_slider' == $type ) {
				
				if( ( $split_base_count % 2 ) == 0 ) {
					$split_slide_class = 'even_slide' . $split_even_count;
					$split_slide_style = 'even_slide';
					$split_slide_data_count = $split_even_count;
					$split_even_count++;
				} else {
					$split_slide_class = 'odd_slide' . $split_odd_count;
					$split_slide_style = 'odd_slide';
					$split_slide_data_count = $split_odd_count;
					$split_odd_count++;
				}
				$split_base_count++;
				
				$link_start = '<div class="split_slide ' . $split_slide_class . ' ' . $split_slide_style . '" data-count="' . $split_slide_data_count . '" style="background-image:url(' . $large_img_src . ')">';
				$link_end = '</div>';
				
				$thumbnail = '';

			} else {
				$link_start = '<a class="swipebox" href="' . $large_img_src . '" data-appear-top-offset="250" data-animated="fadeInUp">';
				$link_end = '<span class="gallery_zoom"></span></a>';
			}

			$gal_images .= $el_start . $link_start . $thumbnail . $link_end . $el_end;
		}
		
		$i++;
		
		$output = '';
		$output .= '<div class="' . $el_class . '">';
		$output .= '<div class="wpb_wrapper">';
		$output .= wpb_widget_title( array(
			'title' => $title,
			'extraclass' => 'wpb_gallery_heading',
		) );
		$output .= '<div class="wpb_gallery_images gallery_' . $type . '">' . $slides_wrap_start . $gal_images . $slides_wrap_end . '</div>';
		$output .= '</div>';
		$output .= '</div>';
        
		return $output;

	}
}
add_shortcode( 'evatheme_core_vc_gallery', 'evatheme_core_vc_gallery_shortcode' );

if ( ! function_exists( 'evatheme_core_vc_gallery_shortcode_map' ) ) {
	function evatheme_core_vc_gallery_shortcode_map() {
		
		vc_map(array(
			'base'			=> 'evatheme_core_vc_gallery',
			'name'			=> esc_html__('Evatheme Gallery', 'evatheme_core'),
			'description'	=> esc_html__('Display Images with custom Evatheme styles', 'evatheme_core'),
			'category'		=> esc_html__('Evatheme Modules', 'evatheme_core'),
			'icon'			=> 'cstheme-vc-icon',
			'params' 		=> array(
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Gallery type', 'evatheme_core' ),
					'param_name' => 'type',
					'value' => array(
						esc_html__( 'Grid', 'evatheme_core' ) => 'grid',
						esc_html__( 'Metro Style', 'evatheme_core' ) => 'metro',
						esc_html__( 'Justified Gallery', 'evatheme_core' ) => 'justified',
						esc_html__( 'Split Showcase', 'evatheme_core' ) => 'split_slider',
					),
					'description' => esc_html__( 'Select gallery type.', 'evatheme_core' ),
				),
				array(
					'type' => 'attach_images',
					'heading' => esc_html__( 'Images', 'evatheme_core' ),
					'param_name' => 'images',
					'value' => '',
					'description' => esc_html__( 'Select images from media library.', 'evatheme_core' ),
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Columns', 'evatheme_core' ),
					'description' => esc_html__( 'Select the number of columns in row.', 'evatheme_core' ),
					'param_name' => 'columns',
					'value' => array( 2, 3, 4, 5, 6 ),
					'dependency'	=> array(
						'element'		=> 'type',
						'value'			=> array( 'grid', 'masonry' ),
					),
				),
				array(
					'type'			=> 'dropdown',
					'heading' => esc_html__( 'Indent', 'evatheme_core' ),
					'description' => esc_html__('Indent between images in pixels. min - 0, max - 20', 'evatheme_core'),
					'param_name' => 'indent',
					'admin_label' 	=> true,
					'value'			=> array(
						esc_html__( '0px', 'evatheme_core' )	=> 0,
						esc_html__( '5px', 'evatheme_core' )	=> 5,
						esc_html__( '10px', 'evatheme_core' )	=> 10,
						esc_html__( '15px', 'evatheme_core' )	=> 15,
						esc_html__( '20px', 'evatheme_core' )	=> 20,
					),
					'dependency'	=> array(
						'element'		=> 'type',
						'value'			=> array( 'grid', 'masonry' ),
					),
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Image size', 'evatheme_core' ),
					'description' => esc_html__( 'Enter image size. Example: thumbnail, medium, large, full or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height). Leave empty to use "thumbnail" size.', 'evatheme_core' ),
					'param_name' => 'img_size',
					'value' => 'full',
					'dependency'	=> array(
						'element'		=> 'type',
						'value'			=> array( 'grid', 'justified' ),
					),
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Extra class name', 'evatheme_core' ),
					'param_name' => 'el_class',
					'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'evatheme_core' ),
				),
			)
		));
	}
}
add_action( 'vc_before_init', 'evatheme_core_vc_gallery_shortcode_map' );