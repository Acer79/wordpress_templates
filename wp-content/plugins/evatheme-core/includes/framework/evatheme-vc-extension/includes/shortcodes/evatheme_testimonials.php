<?php
/**
 * Testimonials shortcode
 */

if ( ! function_exists( 'cstheme_vc_testimonials_shortcode' ) ) {
	function cstheme_vc_testimonials_shortcode( $atts, $description_text ) {
		
		$testimonials_image = $custom_testimonials_class = $name = $position = $description_text = $testimonials_align_style = $testimonials_name_position = $title_text_typography = $name_color = $position_color = $description_color = $link_switch = $link = $testimonials_css = '';

		extract(shortcode_atts(array(
			"testimonials_image" 			=> "",
			"custom_testimonials_class" 	=> "",
			"name" 							=> "",
			"position" 						=> "",
			"description_text" 				=> "",
			"testimonials_align_style" 		=> "",
			"testimonials_name_position" 	=> "",
			"title_text_typography" 		=> "",
			"name_color" 					=> "",
			"position_color" 				=> "",
			"description_color" 			=> "",
			"link_switch" 					=> "",
			"link" 							=> "",
			"testimonials_css" 				=> "",
		),$atts));
		
		
		$testimonials_css = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $testimonials_css, ' ' ), "cstheme_vc_testimonials", $atts );
		
		$testimonials_class = ( isset( $custom_testimonials_class ) && trim( $custom_testimonials_class ) !== '' ) ? $custom_testimonials_class : '';
		
		$testimonials_class .= 'text-' . $testimonials_align_style;
		
		$img = apply_filters('ult_get_img_single', $testimonials_image, 'url', '70x70');
		
		$name_font_styling = '';
		if ( ! ($name_color == '') && ! ($name_color == 'inherit') ) {
			$name_font_styling .= 'color:' . $name_color . ';';
		}
		
		$position_font_styling = '';
		if ( ! ($position_color == '') && ! ($position_color == 'inherit') ) {
			$position_font_styling .= 'color:' . $position_color . ';';
		}
		
		$description_font_styling = '';
		if ( ! ($description_color == '') && ! ($description_color == 'inherit') ) {
			$description_font_styling .= 'color:' . $description_color . ';';
		}
		
		$with_img = '';
		if ( $testimonials_image ) {
			$with_img = 'with_img';
		}
		
		
		$compile = '<div class="cs_testimonials_item_wrap '. $testimonials_class .' '. $testimonials_css .'">';
			if ( 'top' == $testimonials_name_position ) {
				$compile .= '<div class="crearfix ' . $with_img . '">';
					if ( $testimonials_image ) {
						$compile .= '<div class="cs_testimonials_img">';
							$compile .= '<img src="' . $img . '" alt="" />';
						$compile .= '</div>';
					}
					$compile .= '<div class="cs_testimonials_author_inf">';
						if ( $position ) {
							$compile .= '<span class="cs_testimonials_position" style="' . $position_font_styling . '">' . $position . '</span>';
						}
						if ( $name ) {
							$compile .= '<h6 class="cs_testimonials_name" style="' . $name_font_styling . '">' . $name . '</h6>';
						}
					$compile .= '</div>';
				$compile .= '</div>';
				$compile .= '<div class="testimonials_space"></div>';
				if ( $description_text ) {
					$compile .= '<div class="cs_testimonials_descr" style="' . $description_font_styling . '">' . do_shortcode( $description_text ) . '</div>';
				}
			} else {
				if ( $description_text ) {
					$compile .= '<div class="cs_testimonials_descr" style="' . $description_font_styling . '">' . do_shortcode( $description_text ) . '</div>';
				}
				$compile .= '<div class="testimonials_space"></div>';
				$compile .= '<div class="crearfix ' . $with_img . '">';
					if ( $testimonials_image ) {
						$compile .= '<div class="cs_testimonials_img">';
							$compile .= '<img src="' . $img . '" alt="" />';
						$compile .= '</div>';
					}
					$compile .= '<div class="cs_testimonials_author_inf">';
						if ( $position ) {
							$compile .= '<span class="cs_testimonials_position" style="' . $position_font_styling . '">' . $position . '</span>';
						}
						if ( $name ) {
							$compile .= '<h6 class="cs_testimonials_name" style="' . $name_font_styling . '">' . $name . '</h6>';
						}
					$compile .= '</div>';
				$compile .= '</div>';
			}
		$compile .= '</div>';
        
		return $compile;

	}
}
add_shortcode( 'cstheme_vc_testimonials', 'cstheme_vc_testimonials_shortcode' );

if ( ! function_exists( 'cstheme_vc_testimonials_shortcode_map' ) ) {
	function cstheme_vc_testimonials_shortcode_map() {

		vc_map( array(
			'base'			=> 'cstheme_vc_testimonials',
			'name'			=> esc_html__('Testimonials', 'evatheme_core'),
			'description'	=> esc_html__('Display Testimonials', 'evatheme_core'),
			'category'		=> esc_html__('Evatheme Modules', 'evatheme_core'),
			'icon'			=> 'cstheme-vc-icon',
			'params' => array(
				array(
					'type'        => 'ult_img_single',
					'heading'     => esc_html__( 'Select Image', 'evatheme_core' ),
					'param_name'  => 'testimonials_image',
					'description' => '',
					'group'       => 'General'
				),
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__( 'Custom Class', 'evatheme_core' ),
					'param_name'  => 'custom_testimonials_class',
					'description' => '',
					'group'       => 'General'
				),
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__( 'Name', 'evatheme_core' ),
					'param_name'  => 'name',
					'admin_label' => true,
					'description' => '',
					'group'       => 'Text'
				),
				array(
					'type'        => 'colorpicker',
					'class'       => '',
					'heading'     => esc_html__( 'Name Color', 'evatheme_core' ),
					'param_name'  => 'name_color',
					'value'       => '',
					'description' => '',
					'group'       => 'Text',
				),
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__( 'Position', 'evatheme_core' ),
					'param_name'  => 'position',
					'description' => '',
					'group'       => 'Text'
				),
				array(
					'type'        => 'colorpicker',
					'class'       => '',
					'heading'     => esc_html__( 'Position Color', 'evatheme_core' ),
					'param_name'  => 'position_color',
					'value'       => '',
					'description' => '',
					'group'       => 'Text',
				),
				array(
					'type'        => 'textarea_html',
					'heading'     => esc_html__( 'Description', 'evatheme_core' ),
					'param_name'  => 'description_text',
					'description' => '',
					'group'       => 'Text'
				),
				array(
					'type'        => 'colorpicker',
					'class'       => '',
					'heading'     => esc_html__( 'Description Color', 'evatheme_core' ),
					'param_name'  => 'description_color',
					'value'       => '',
					'description' => '',
					'group'       => 'Text',
				),
				array(
					'type'        => 'dropdown',
					'class'       => '',
					'heading'     => esc_html__( 'Text Alignment', 'evatheme_core' ),
					'param_name'  => 'testimonials_align_style',
					'value'       => array(
						esc_html__( 'Left', 'evatheme_core' )  => 'left',
						esc_html__( 'Center', 'evatheme_core' )   => 'center',
						esc_html__( 'Right', 'evatheme_core' )  => 'right',
					),
					'description' => '',
					'group'       => 'Text',
				),
				array(
					'type'        => 'dropdown',
					'class'       => '',
					'heading'     => esc_html__( 'Name Position', 'evatheme_core' ),
					'param_name'  => 'testimonials_name_position',
					'value'       => array(
						esc_html__( 'Bottom', 'evatheme_core' )  => 'bottom',
						esc_html__( 'Top', 'evatheme_core' )  => 'top',
					),
					'description' => '',
					'group'       => 'Text',
				),
				array(
					'type'        => 'ult_switch',
					'class'       => '',
					'heading'     => esc_html__( 'Custom link to staff page', 'evatheme_core' ),
					'param_name'  => 'link_switch',
					'value'       => '',
					'options'     => array(
						'on' => array(
							'label' => esc_html__( 'Add custom link to employee page', 'evatheme_core' ),
							'on'    => 'Yes',
							'off'   => 'No',
						),
					),
					'description' => '',
					'dependency'  => '',
					'group'       => 'Advanced',
				),
				array(
					'type'        => 'vc_link',
					'class'       => '',
					'heading'     => esc_html__( 'Custom Link', 'evatheme_core' ),
					'param_name'  => 'link',
					'value'       => '',
					'description' => esc_html__( 'Add link to testimonials', 'evatheme_core' ),
					'group'       => esc_html__( 'Advanced', 'evatheme_core' ),
					'dependency'  => Array( 'element' => 'link_switch', 'value' => 'on' ),
				),
				array(
					'type' => 'css_editor',
					'heading' => esc_html__( 'CSS box', 'evatheme_core' ),
					'param_name' => 'testimonials_css',
					'group' => esc_html__( 'Design Options', 'evatheme_core' ),
				),
			) // params array
		));
	}
}
add_action( 'vc_before_init', 'cstheme_vc_testimonials_shortcode_map' );