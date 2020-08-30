<?php
/**
 * Blog shortcode
 */

if ( ! function_exists( 'cstheme_vc_blog_shortcode' ) ) {
	function cstheme_vc_blog_shortcode( $atts, $content = NULL ) {
		
		$atts = vc_map_get_attributes( 'cstheme_vc_blog', $atts );
		extract( $atts );
		
		$compile = '';

		
        list($query_args, $build_query) = vc_build_loop_query($build_query);

        global $post, $paged;
        
		if (empty($paged)) {
            $paged = (get_query_var('page')) ? get_query_var('page') : 1;
        }

        $query_args['paged'] = $paged;
		
		$post_class = '';
		
		if( $style == 'masonry_top_img' || $style == 'grid_top_img' || $style == 'grid_bg_img' || $style == 'masonry_bg_img' || $style == 'bg_img_card' || $style == 'grid_card' || $style == 'masonry_card' || $style == 'grid_card_min' || $style == 'masonry_card_min' || $style == 'frame_min' || $style == 'metro' ) {
			if( $columns != '' ) {
				if( $columns == 'col2' ) {
					$post_class .= ' col-md-6';
				} elseif( $columns == 'col3' ) {
					$post_class .= ' col-md-4';
				} elseif( $columns == 'col4' ) {
					$post_class .= ' col-md-3';
				} elseif( $columns == 'col5' ) {
					$post_class .= ' col-md-25';
				} else {
					$post_class .= ' col-md-12';
				}
			}
		}
		if ( $no_padding == true ) {
			$post_class .= ' pl0 pr0 pb0 pt0';
		}
		
		if ( $border_radius == true ) {
			$post_class .= ' border_radius';
		}
		
		
        global $despero_wp_query_in_shortcodes;
        $despero_wp_query_in_shortcodes = new WP_Query($query_args);
			
			$compile .= '<div id="blog_list" class="' . $style . ' ' . $columns . ' ' . $classes . '">';
				
				if( ( $style == 'masonry_top_img' || $style == 'grid_top_img' || $style == 'grid_bg_img' || $style == 'masonry_bg_img' || $style == 'bg_img_card' || $style == 'grid_card' || $style == 'masonry_card' || $style == 'grid_card_min' || $style == 'masonry_card_min' || $style == 'frame_min' || $style == 'metro' ) && ( $columns != 'col1' ) ) {
					$compile .= '
						<div class="row">
							<div class="isotope_container_wrap">
								<div class="isotope-container">
						';
				}
				
						if ($despero_wp_query_in_shortcodes->have_posts()) {
							while ($despero_wp_query_in_shortcodes->have_posts()) {
								$despero_wp_query_in_shortcodes->the_post();
									
									$metro = get_post_meta( $post->ID, 'despero_metro', true );
									if( ( $style == 'metro' ) && ( isset( $metro ) && $metro != '' ) ) {
										$sizing_class = ' sizing_' . $metro;
									} else {
										$sizing_class = '';
									}
									
									$compile .= '<article id="post-' . get_the_ID() . '" ';
										ob_start();
										post_class($post_class . $sizing_class);
										$compile .= ob_get_clean() .'>';
										
										ob_start();
										if ( $style == 'grid_top_img' || $style == 'masonry_top_img' ) {
											include( locate_template( 'templates/blog/loop-top_img.php' ) );
										} elseif ( $style == 'text_min' ) {
											include( locate_template( 'templates/blog/loop-text_min.php' ) );
										} elseif ( $style == 'grid_bg_img' || $style == 'masonry_bg_img' ) {
											include( locate_template( 'templates/blog/loop-bg_img.php' ) );
										} elseif ( $style == 'bg_img_card' ) {
											include( locate_template( 'templates/blog/loop-bg_img_card.php' ) );
										} elseif ( $style == 'grid_card' || $style == 'masonry_card' ) {
											include( locate_template( 'templates/blog/loop-card.php' ) );
										} elseif ( $style == 'grid_card_min' || $style == 'masonry_card_min' ) {
											include( locate_template( 'templates/blog/loop-card_min.php' ) );
										} elseif ( $style == 'frame_min' ) {
											include( locate_template( 'templates/blog/loop-frame_min.php' ) );
										} elseif ( $style == 'metro' ) {
											include( locate_template( 'templates/blog/loop-metro.php' ) );
										} else {
											include( locate_template( 'templates/blog/loop.php' ) );
										}
										$compile .= ob_get_clean();
										
									
									$compile .= '</article>';
							}

						}
						
				if( ( $style == 'masonry_top_img' || $style == 'grid_top_img' || $style == 'grid_bg_img' || $style == 'masonry_bg_img' || $style == 'bg_img_card' || $style == 'grid_card' || $style == 'masonry_card' || $style == 'grid_card_min' || $style == 'masonry_card_min' || $style == 'frame_min' || $style == 'metro' ) && ( $columns != 'col1' ) ) {
					$compile .= '
								</div>
							</div>
						</div>
					';
				}
				
					if( $pagination != 'hide' && $style != 'text_min' && $columns != 'col1' ) {
						if( $pagination == 'infinite' ) {
							$compile .= despero_infinite_scroll( $despero_wp_query_in_shortcodes->max_num_pages );
						} else if( $pagination == 'pagination' ) {
							$compile .= despero_pagination( $despero_wp_query_in_shortcodes->max_num_pages );
						}
					}
					if ( $style == 'text_min' || $columns == 'col1' ) {
						$compile .= despero_pagination( $despero_wp_query_in_shortcodes->max_num_pages );
					}
				
			$compile .= '</div>';
			
			wp_reset_postdata();

        return $compile;
        ?>
    
<?php

	}
}
add_shortcode( 'cstheme_vc_blog', 'cstheme_vc_blog_shortcode' );

if ( ! function_exists( 'cstheme_vc_blog_shortcode_map' ) ) {
	function cstheme_vc_blog_shortcode_map() {
		
		vc_map(array(
			'base'			=> 'cstheme_vc_blog',
			'name'			=> esc_html__('Blog Posts', 'evatheme_core'),
			'description'	=> esc_html__('Display blog posts', 'evatheme_core'),
			'category'		=> esc_html__('Evatheme Modules', 'evatheme_core'),
			'icon'			=> 'cstheme-vc-icon',
			'params' 		=> array(
				array(
					'type'			=> 'loop',
					'heading'		=> esc_html__( 'Blog Items', 'evatheme_core' ),
					'param_name'	=> 'build_query',
					'settings' 		=> array(
						'size' 			=> array('hidden' => false, 'value' => 4 * 3),
						'order_by' 		=> array('value' => 'date'),
						'post_type' 	=> array('value' => 'post', 'hidden' => false),
						'categories' 	=> array('hidden' => false),
						'tags' 			=> array('hidden' => false)
					),
					'description' 	=> esc_html__( 'Create WordPress loop, to populate content from your site.', 'evatheme_core' )
				),
				array(
					'type'			=> 'dropdown',
					'heading'		=> esc_html__( 'Blog Style', 'evatheme_core' ),
					'param_name'	=> 'style',
					'admin_label' 	=> true,
					'value'			=> array(
						esc_html__('Default', 'evatheme_core' ) 				=> 'default',
						esc_html__('Top Image Grid', 'evatheme_core') 			=> 'grid_top_img',
						esc_html__('Top Image Masonry', 'evatheme_core') 		=> 'masonry_top_img',
						esc_html__('Text Minimal', 'evatheme_core') 			=> 'text_min',
						esc_html__('Background Image Grid', 'evatheme_core') 	=> 'grid_bg_img',
						esc_html__('Background Image Masonry', 'evatheme_core') => 'masonry_bg_img',
						esc_html__('Background Image Card', 'evatheme_core') 	=> 'bg_img_card',
						esc_html__('Card Grid', 'evatheme_core') 				=> 'grid_card',
						esc_html__('Card Masonry', 'evatheme_core') 			=> 'masonry_card',
						esc_html__('Card Minimal Grid', 'evatheme_core') 		=> 'grid_card_min',
						esc_html__('Card Minimal Masonry', 'evatheme_core') 	=> 'masonry_card_min',
						esc_html__('Frame Minimal', 'evatheme_core') 			=> 'frame_min',
						esc_html__('Metro Style', 'evatheme_core') 				=> 'metro',
					)
				),
				array(
					'type'			=> 'dropdown',
					'heading'		=> esc_html__( 'Blog Grid Columns', 'evatheme_core' ),
					'param_name'	=> 'columns',
					'admin_label' 	=> true,
					'value'			=> array(
						esc_html__( '1 Column', 'evatheme_core' )	=> 'col1',
						esc_html__( '2 Columns', 'evatheme_core' )	=> 'col2',
						esc_html__( '3 Columns', 'evatheme_core' )	=> 'col3',
						esc_html__( '4 Columns', 'evatheme_core' )	=> 'col4',
						esc_html__( '5 Columns', 'evatheme_core' )	=> 'col5'
					),
					'dependency' => array(
						'element' => 'style',
						'value' => array( 'grid_top_img', 'masonry_top_img', 'grid_bg_img', 'masonry_bg_img', 'bg_img_card', 'grid_card', 'masonry_card', 'grid_card_min', 'masonry_card_min', 'frame_min', 'metro' ),
					),
				),
				array(
					'type' 			=> 'checkbox',
					'heading' 		=> esc_html__('Double thumbnail size', 'evatheme_core'),
					'description' 	=> esc_html__('If size of stretch row and content Full Screen', 'evatheme_core'),
					'param_name' 	=> 'thumb_size_2x',
					'dependency' 	=> array(
						'element' => 'style',
						'value' => array( 'grid_card', 'masonry_card' ),
					),
				),
				array(
					'type' => 'checkbox',
					'heading' => __( 'No padding', 'evatheme_core' ),
					'param_name' => 'no_padding',
					'dependency' => array(
						'element' => 'style',
						'value' => array( 'grid_bg_img', 'masonry_bg_img', 'bg_img_card', 'metro' ),
					),
				),
				array(
					'type' => 'checkbox',
					'heading' => __( 'Set rounded featured image corners?', 'evatheme_core' ),
					'param_name' => 'border_radius',
					'dependency' => array(
						'element' => 'style',
						'value' => array( 'grid_bg_img', 'masonry_bg_img', 'grid_card', 'masonry_card', 'grid_card_min', 'masonry_card_min', 'frame_min' ),
					),
				),
				array(
					'type'			=> 'number',
					'heading'		=> esc_html__( 'Excerpt Count', 'evatheme_core' ),
					'description'	=> esc_html__( 'How much blog words displayed in blog Excerpt. Must insert Digits including 0.', 'evatheme_core' ),
					'param_name'	=> 'excerpt_count',
					'value' 		=> '200',
					'dependency' => array(
						'element' => 'style',
						'value' => array( 'default', 'grid_top_img', 'masonry_top_img', 'text_min', 'grid_card', 'masonry_card', 'grid_card_min', 'masonry_card_min', 'bg_img_card' ),
					),
				),
				array(
					'type'			=> 'dropdown',
					'heading'		=> esc_html__( 'Pagination', 'evatheme_core' ),
					'param_name'	=> 'pagination',
					'value'			=> array(
						esc_html__( 'Hide', 'evatheme_core' )			=> 'hide',
						esc_html__( 'Pagination', 'evatheme_core' )		=> 'pagination',
						esc_html__( 'Infinite Scroll', 'evatheme_core' )	=> 'infinite'
					),
					'dependency' => array(
						'element' => 'style',
						'value' => array( 'grid_top_img', 'masonry_top_img', 'grid_bg_img', 'masonry_bg_img', 'grid_card', 'masonry_card', 'grid_card_min', 'masonry_card_min', 'frame_min', 'metro', 'bg_img_card' ),
					),
				),
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Extra Class', 'evatheme_core' ),
					'param_name'	=> 'classes',
					'value' 		=> '',
				),
			)
		));
	}
}
add_action( 'vc_before_init', 'cstheme_vc_blog_shortcode_map' );