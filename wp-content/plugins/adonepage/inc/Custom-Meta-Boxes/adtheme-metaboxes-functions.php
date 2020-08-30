<?php
/**
 * Define the metabox and field configurations.
 *
 * @param  array $meta_boxes
 * @return array
 */
function adonepage_adonepagecmb_metaboxes( array $meta_boxes ) {

	require('gfonts-list.php');
	require('pattern-list.php');
	
	$fields = array(
		
		array( 'id' => 'block-name',  
				'name' => 'Block Name', 
				'type' => 'text',
				'cols' => 2
		),		
		array( 
			'id' => 'block-pattern',  
			'name' => 'Pattern', 
			'type' => 'select', 
			'options' => $pattern_list,
			'cols' => 2		 
		),
		array( 
			'id' => 'block-pattern-color',  
			'name' => 'Pattern BG Color', 
			'type' => 'colorpicker',
			'cols' => 4 		 
		),			
		array( 
			'id' => 'block-pattern-opacity',  
			'name' => 'Pattern Opacity (0.1 to 1)', 
			'type' => 'text',
			'cols' => 4
		),
		array( 
			'id' => 'block-name-active-menu',  
			'name' => 'Show Name In Menu',
			'type' => 'select', 
			'options' => array( 
						'yes' => 'Yes',
						'no' => 'no'						
						), 
			'cols' => 4		 
		),		
		array( 
			'id' => 'block-name-active',  
			'name' => 'Show Name',
			'type' => 'select', 
			'options' => array( 
						'yes' => 'Yes',
						'no' => 'no'						
						), 
			'cols' => 4		 
		),
		array( 
			'id' => 'block-name-effects',  
			'name' => 'Name Effects',
			'type' => 'select', 
			'options' => array(
						'none'  => 'none', 
						'left'  => 'Left',
						'right' => 'Right'						
						), 
			'cols' => 4			 
		),		
		array( 
			'id' => 'block-name-font-size',  
			'name' => 'Size', 
			'type' => 'text',  
			'cols' => 2 
		),		
		array( 
			'id' => 'block-name-position',  
			'name' => 'Position', 
			'type' => 'select', 
			'options' => array( 
						'left' => 'left', 
						'right' => 'right',
						'center' => 'center'						 
						), 
			'cols' => 2
		),		
		array( 
			'id' => 'block-name-font-style',  
			'name' => 'Name Style', 
			'type' => 'select', 
			'options' => array( 
						'normal' => 'Normal', 
						'italic' => 'Italic',
						 
						),  
			'cols' => 2 
		),		
		array( 
			'id' => 'block-name-font-weight',  
			'name' => 'Name Font Weight', 
			'type' => 'select', 
			'options' => array( 					 
					 'normal' => 'normal',
						'100' => '100', 
						'200' => '200',
						'300' => '300', 
						'400' => '400',
						'500' => '500', 
						'600' => '600',
						'700' => '700', 
						'800' => '800',
						'900' => '900', 																								 
						),  
			'cols' => 2 
		),
		array( 
			'id' => 'block-name-font-color', 
			'name' => 'Name Font Color', 
			'type' => 'colorpicker',  
			'cols' => 4 
		),										
		array( 
			'id' => 'block-height',  
			'name' => 'Block Height',			 
			'type' => 'select', 
			'options' => array( 
						'auto' => 'auto', 
						'100%' => '100%',
						 
						),
			'cols' => 2
		),	
		array( 
			'id' => 'block-wrapper-padding',  
			'name' => 'Wrap Padding',
			'desc' => 'ex 20px or 120px 0 120px 0',			 
			'type' => 'text',
			'cols' => 2
		),		 	
		array( 
			'id' => 'block-wrapper-custom-active',  
			'name' => 'Active Block Wrapper',
			'desc' => 'If you active this option you can customize wrapper width of single block',  
			'type' => 'select', 
			'options' => array( 
						'off' => 'Off',
						'on' => 'On'						
						), 
			'cols' => 3			 
		),		
		array( 
			'id' => 'block-wrapper-custom',  
			'name' => 'Wrapper Block (Leave Empty for 100%)',
			'desc' => 'Work Only if you set "Active Block Wrapper" on ON',   
			'type' => 'text',
			'cols' => 5
		),		
		array( 
			'id' => 'bg-type-active',  
			'name' => 'Choose Block Background', 
			'desc' => 'Choose while background you want on onepage block', 
			'type' => 'select', 
			'options' => array( 
						'color' => 'Color',
						'image' => 'Image',
						'video' => 'Video'						
						), 
			'cols' => 12		 
		),
		array( 
			'id'   => 'bg-image-title', 
			'name' => 'Image Background', 
			'type' => 'title', 
		),
		array( 
			'id' => 'bg-image', 
			'name' => 'Background Block', 
			'type' => 'image', 
			'repeatable' => false, 
			'show_size' => false,
			'cols' => 12	
		),
		array( 
			'id'   => 'bg-color-title', 
			'name' => 'Color Background', 
			'type' => 'title', 
		),		
		array( 
			'id' => 'bg-color', 
			'name' => 'Color BG', 
			'type' => 'colorpicker',
			'cols' => 12	 
		),
		array( 
			'id'   => 'bg-video-title', 
			'name' => 'Video Background', 
			'type' => 'title', 
		),		
		array( 
			'id' => 'bg-video', 
			'name' => 'Youtube Url Video', 
			'type' => 'url',
			'cols' => 6	 
		),
		array( 
			'id' => 'bg-video-audio', 
			'name' => 'Audio', 
			'type' => 'select', 
			'options' => array( 
						'false' => 'On',
						'true' => 'Off'																			
						),
			'cols' => 6	 
		),	
		/*
		array( 
			'id'   => 'bg-slider-title', 
			'name' => 'Slider Background', 
			'type' => 'title', 
		),			
		array( 
			'id' => 'bg-slider-image', 
			'name' => 'Slider Image', 
			'type' => 'image',
			'repeatable' => true,
			'sortable' => true,
			'cols' => 4	 
		),
		array( 
			'id' => 'bg-slider-text', 
			'name' => 'Slider Text', 
			'type' => 'text',
			'repeatable' => true,
			'sortable' => true,
			'cols' => 4 
		),
		array( 
			'id' => 'bg-slider-text-effects', 
			'name' => 'Slider Text Effects', 
			'type' => 'select', 
			'options' => array( 
						'solid' => 'solid',
						'dashed' => 'dashed',
						'dotted' => 'dotted',
						'double' => 'double',
						'groove' => 'groove',
						'ridge' => 'ridge',
						'inset' => 'inset',
						'outset' => 'outset',
						'initial' => 'initial'																			
						), 
			'repeatable' => true,
			'sortable' => true,
			'cols' => 4 
		),
		*/				
		array( 
			'id' => 'content-block',  
			'name' => 'Content Block', 
			'type' => 'wysiwyg', 
			'options' => array( 
				'editor_height' => '100' 
			), 
			'repeatable' => false, 
			'sortable' => false 
		),
		array( 
			'id' => 'block-border-px',  
			'name' => 'Block Px Border Bottom (ex 3)',   
			'type' => 'text',
			'cols' => 4
		),
		array( 
			'id' => 'block-border-bottom-color', 
			'name' => 'Color Boder Bottom', 
			'type' => 'colorpicker',
			'cols' => 4			 
		),	
		array( 
			'id' => 'block-border-bottom-type',  
			'name' => 'Border Type',  
			'type' => 'select', 
			'options' => array( 
						'solid' => 'solid',
						'dashed' => 'dashed',
						'dotted' => 'dotted',
						'double' => 'double',
						'groove' => 'groove',
						'ridge' => 'ridge',
						'inset' => 'inset',
						'outset' => 'outset',
						'initial' => 'initial'																			
						), 
			'cols' => 4	 
		),			
	);



	$fields_slider = array(  		
		array( 
			'id' => 'first-bg-slider-image', 
			'name' => 'Slider Image', 
			'type' => 'image',
			'size' => 'height=200&width=795'	 
		),		
		array( 
			'id' => 'first-bg-slider-content-area', 
			'name' => 'Slider Content Area',
			'type' => 'wysiwyg',
			'options' => array( 
				'editor_height' => '200' 
			)			
		)						
	);




	$first_block = array(
		
		array( 'id' => 'first-block-name',  
				'name' => 'Block Name', 
				'type' => 'text',
				'cols' => 4
		),		
		array( 
			'id' => 'first-block-pattern',  
			'name' => 'Pattern', 
			'type' => 'select', 
			'options' => $pattern_list,
			'cols' => 2		 
		),
		array( 
			'id' => 'first-block-pattern-color',  
			'name' => 'Pattern BG Color', 
			'type' => 'colorpicker',
			'cols' => 4 		 
		),			
		array( 
			'id' => 'first-block-pattern-opacity',  
			'name' => 'Pattern Opacity (0.1 to 1)', 
			'type' => 'text',
			'cols' => 2
		),
		array( 
			'id' => 'first-block-name-active-menu',  
			'name' => 'Show Name In Menu',
			'type' => 'select', 
			'options' => array( 
						'yes' => 'Yes',
						'no' => 'no'						
						), 
			'cols' => 6			 
		),		
		array( 
			'id' => 'first-block-height',  
			'name' => 'Block Height',			 
			'type' => 'select', 
			'options' => array( 
						'auto' => 'auto', 
						'100%' => '100%',
						 
						),
			'cols' => 6
		),	
		array( 
			'id' => 'first-block-wrapper-padding',  
			'name' => 'Wrap Padding',
			'desc' => 'ex 20px or 120px 0 120px 0',			 
			'type' => 'text',
			'cols' => 3
		),		 	
		array( 
			'id' => 'first-block-wrapper-custom-active',  
			'name' => 'Active Block Wrapper',
			'desc' => 'If you active this option you can customize wrapper width of single block',  
			'type' => 'select', 
			'options' => array( 
						'off' => 'Off',
						'on' => 'On'						
						), 
			'cols' => 4		 
		),		
		array( 
			'id' => 'first-block-wrapper-custom',  
			'name' => 'Wrapper Block (Leave Empty for 100%)',
			'desc' => 'Work Only if you set "Active Block Wrapper" on ON',   
			'type' => 'text',
			'cols' => 5
		),		
		array( 
			'id' => 'first-bg-type-active',  
			'name' => 'Choose Block Background', 
			'desc' => 'Choose while background you want on onepage block', 
			'type' => 'radio', 
			'options' => array( 
						'color' => 'Color',
						'image' => 'Image',
						'video' => 'Video',
						'slider' => 'Slider'						
						), 
			'cols' => 12		 
		),
		array( 
			'id'   => 'first-bg-image-title', 
			'name' => 'Image Background', 
			'type' => 'title', 
		),
		array( 
			'id' => 'first-bg-image', 
			'name' => 'Background Block', 
			'type' => 'image', 
			'repeatable' => false, 
			'show_size' => false,
			'cols' => 12	
		),
		array( 
			'id'   => 'first-bg-color-title', 
			'name' => 'Color Background', 
			'type' => 'title', 
		),		
		array( 
			'id'   => 'first-bg-color', 
			'name' => 'Color BG', 
			'type' => 'colorpicker',
			'cols' => 12	 
		),
		array( 
			'id'   => 'first-bg-video-title', 
			'name' => 'Video Background', 
			'type' => 'title', 

		),		
		array( 
			'id' => 'first-bg-video', 
			'name' => 'Url Video', 
			'type' => 'url',
			'cols' => 6	 
		),
		array( 
			'id' => 'first-bg-video-audio', 
			'name' => 'Audio', 
			'type' => 'select', 
			'options' => array( 
						'false' => 'On',
						'true' => 'Off'																			
						),
			'cols' => 6	 
		),
		array( 
			'id'   => 'first-bg-slider-title', 
			'name' => 'Slider Option', 
			'type' => 'title', 

		),
		array( 
			'id' => 'first-bg-slider-spinner',  
			'name' => 'Type Spinner',  
			'type' => 'select', 
			'options' => array( 
						'plane' => 'Plane',
						'bounce' => 'Bounce',
						'wave' => 'Wave',
						'cubes' => 'Cubes',
						'pulse' => 'Pulse',
						'dots' => 'Dots',
						'three-bounce' => 'Three Bounce',
						'circle' => 'Circle'																			
						), 
			'cols' => 4	 
		),		
		array( 
			'id'   => 'first-bg-slider-spinner-color', 
			'name' => 'Spinner Color', 
			'type' => 'colorpicker',
			'cols' => 4	 
		),
		array( 
			'id'   => 'first-bg-slider-spinner-bg-color', 
			'name' => 'Spinner Background Color', 
			'type' => 'colorpicker',
			'cols' => 4	 
		),/*
		array( 
			'id' => 'first-slider-effects',  
			'name' => 'Slider Effects',  
			'type' => 'select', 
			'options' => array( 
						'fade' 			=> 'fade',
						'fadeZoom' 		=> 'fadeZoom',
						'blindX' 		=> 'blindX',
						'blindY' 		=> 'blindY',
						'blindZ' 		=> 'blindZ',
						'cover' 		=> 'cover',
						'curtainX' 		=> 'curtainX',
						'curtainY' 		=> 'curtainY',
						'growX' 		=> 'growX',
						'growY' 		=> 'growY',	
						'cover' 		=> 'cover',
						'none' 			=> 'none',
						'scrollUp' 		=> 'scrollUp',
						'scrollDown' 	=> 'scrollDown',
						'scrollLeft' 	=> 'scrollLeft',						
						'scrollRight' 	=> 'scrollRight',
						'scrollHorz' 	=> 'scrollHorz',
						'scrollVert' 	=> 'scrollVert',
						'shuffle' 		=> 'shuffle',						
						'slideX' 		=> 'slideX',
						'slideY' 		=> 'slideY',
						'toss' 			=> 'toss',						
						'turnUp' 		=> 'turnUp',
						'turnDown' 		=> 'turnDown',
						'turnLeft' 		=> 'turnLeft',
						'turnRight'		=> 'turnRight',						
						'uncover'		=> 'uncover',
						'wipe' 			=> 'wipe',
						'zoom' 			=> 'zoom'																
						), 
			'cols' => 4	 
		),	*/	
		array( 
			'id' => 'first-slider-autoplay',  
			'name' => 'Slider Autoplay',  
			'type' => 'select', 
			'options' => array( 
						'yes' 	=> 'Yes',
						'no' 	=> 'no'																			
						), 
			'cols' => 6	 
		),
		array( 
			'id' => 'first-slider-speed',  
			'name' => 'Slider Speed (ex 1000)',  
			'type' => 'text',
			'cols' => 6 	 
		),																	
		array( 
			'id'   => 'slider-group', 
			'name' => 'Slider Background', 
			'type' => 'group',
			'repeatable' => true, 
			'sortable' => true,
			'fields' => $fields_slider // An array of fields. 
		),			
		array( 
			'id' => 'first-content-block',  
			'name' => 'Content Block', 
			'type' => 'wysiwyg', 
			'options' => array( 
				'editor_height' => '100' 
			), 
			'repeatable' => false, 
			'sortable' => false 
		),
		array( 
			'id' => 'first-block-border-px',  
			'name' => 'Block Px Border Bottom (ex 3)',   
			'type' => 'text',
			'cols' => 4
		),
		array( 
			'id' => 'first-block-border-bottom-color', 
			'name' => 'Color Boder Bottom', 
			'type' => 'colorpicker',
			'cols' => 4			 
		),	
		array( 
			'id' => 'first-block-border-bottom-type',  
			'name' => 'Border Type',  
			'type' => 'select', 
			'options' => array( 
						'solid' => 'solid',
						'dashed' => 'dashed',
						'dotted' => 'dotted',
						'double' => 'double',
						'groove' => 'groove',
						'ridge' => 'ridge',
						'inset' => 'inset',
						'outset' => 'outset',
						'initial' => 'initial'																			
						), 
			'cols' => 4	 
		),			
	);





	// Groups and Columns

	$general_configuration = array(
		array( 
			'id' => 'adonepage-logo', 
			'name' => 'Logo', 
			'type' => 'image', 
			'repeatable' => false, 
			'show_size' => false, 
			'cols' => 6
		),
		array( 
			'id' => 'adonepage-favicon', 
			'name' => 'Favicon', 
			'type' => 'image', 
			'repeatable' => false, 
			'show_size' => false,
			'cols' => 6
		),		
		array( 
			'id' => 'wrapper-width',  
			'name' => 'Wrapper Width (Ex: 1000 - Empty for 100%)', 
			'type' => 'text',
			'cols' => 4
		),
		array( 
			'id' => 'logo-position',  
			'name' => 'Logo Position', 
			'type' => 'select', 
			'options' => array( 
						'left' => 'left', 
						'right' => 'right'						 
						), 
			'cols' => 4
		),
		array( 
			'id' => 'logo-link',  
			'name' => 'Logo Link', 
			'type' => 'select', 
			'options' => array( 
						'home' => 'Home', 
						'Page' => 'Page'						 
						), 
			'cols' => 4
		),				
		array( 
			'id' => 'font-family',  
			'name' => 'Font Family', 
			'type' => 'select', 
			'options' => $adonepage_gfonts_list,  
			'cols' => 4 
		),
		array( 
			'id' => 'font-style',  
			'name' => 'Font Style', 
			'type' => 'select', 
			'options' => array( 
						'normal' => 'Normal', 
						'italic' => 'Italic',
						 
						),  
			'cols' => 4 
		),
		array( 
			'id' => 'font-weight',  
			'name' => 'Font Weight', 
			'type' => 'select', 
			'options' => array( 					 
					 'normal' => 'normal',
						'100' => '100', 
						'200' => '200',
						'300' => '300', 
						'400' => '400',
						'500' => '500', 
						'600' => '600',
						'700' => '700', 
						'800' => '800',
						'900' => '900', 																								 
						),  
			'cols' => 4 
		),
		array( 
			'id' => 'font-color', 
			'name' => 'Font Color', 
			'type' => 'colorpicker',  
			'cols' => 4 
		),
		array( 
			'id' => 'color-link', 
			'name' => 'Color Link', 
			'type' => 'colorpicker',  
			'cols' => 4   
		),
		array( 
			'id' => 'color-link-over', 
			'name' => 'Color Link Over', 
			'type' => 'colorpicker',  
			'cols' => 4   
		)
	);

	$menu_list1 = array();
	
	$menu_list1[] = 'landing-page';
	$menu_list1[] = 'adonepage-menu';	
	
	$adonepage_number_menu = get_option( 'adonepage_number_menu', '' );
		if(!empty($adonepage_number_menu)) {
			for($i=1;$i<=$adonepage_number_menu;$i++) {
				$menu_list1[] = 'adonepage-menu-'.$i.'';
			}
		}	
	$menu_list2 = array();	
	
	$menu_list2[] = 'Landing Page';
	$menu_list2[] = 'Wp Menu (ADOnePage)';
			
		if(!empty($adonepage_number_menu)) {
			for($i=1;$i<=$adonepage_number_menu;$i++) {
				$menu_list2[] = 'Wp Menu (ADOnePage) '.$i.'';
			}
		}	
	
	$menu_list = array_combine($menu_list1, $menu_list2);
		
	$menu_configuration = array(
		array( 
			'id' => 'menu',  
			'name' => 'Select Menu', 
			'type' => 'select', 
			'options' => $menu_list,  
			'cols' => 4 
		),
		array( 
			'id' => 'menu-position',  
			'name' => 'Position Menu', 
			'type' => 'select', 
			'options' => array( 
						'top' => 'Top', 
						'bottom' => 'Bottom' 
						),  
			'cols' => 4  
		),
		array( 
			'id' => 'active-sticky-menu',  
			'name' => 'Type Menu', 
			'type' => 'select', 
			'options' => array( 
						'normal' => 'normal (Sticky menu OFF)', 
						'stickymenu' => 'Sticky Menu',
						'stickymenu-v2' => 'Sticky Menu (First Slide no menu)',
						),
			'cols' => 4
		),
		array( 
			'id' => 'menu-font-family',  
			'name' => 'Menu Font Family', 
			'type' => 'select', 
			'options' => $adonepage_gfonts_list,  
			'cols' => 3 
		),
		array( 
			'id' => 'menu-font-family-weight',  
			'name' => 'Menu Font Weight', 
			'type' => 'select', 
			'options' => array( 					 
					 'normal' => 'normal',
						'100' => '100', 
						'200' => '200',
						'300' => '300', 
						'400' => '400',
						'500' => '500', 
						'600' => '600',
						'700' => '700', 
						'800' => '800',
						'900' => '900', 																								 
						),  
			'cols' => 2 
		),					
		array( 
			'id' => 'menu-bg-color', 
			'name' => 'Color Background', 
			'type' => 'colorpicker',  
			'cols' => 4   
		),
		array( 
			'id' => 'menu-bg-opacity',  
			'name' => 'Opacity Background (0.1 to 1)', 
			'type' => 'text',
			'cols' => 3
		),					
		array( 
			'id' => 'menu-font-color', 
			'name' => 'Font Color', 
			'type' => 'colorpicker',  
			'cols' => 4
		),
		array( 
			'id' => 'menu-font-color-over', 
			'name' => 'Font Color Over', 
			'type' => 'colorpicker',  
			'cols' => 4 
		),
		array( 
			'id' => 'woocommerce-menu-active', 
			'name' => 'Woocommerce Menu', 
			'type' => 'select', 
			'options' => array( 
						'off' => 'Off',
						'on' => 'On'						 
						),  
			'cols' => 4 
		),			
		array( 
			'id' => 'menu-border-size',  
			'name' => 'Border Bottom Size (ex 1)', 
			'type' => 'text',
			'cols' => 4
		),		
		array( 
			'id' => 'menu-border-color',  
			'name' => 'Border Bottom Color', 
			'type' => 'colorpicker',
			'cols' => 4
		),
		array( 
			'id' => 'menu-border-shadow',  
			'name' => 'Border Shadow', 
			'type' => 'select', 
			'options' => array( 
						'on' => 'On', 
						'off' => 'Off' 
						), 
			'cols' => 4 
		),										
	);

	$seo_configuration = array(
		array( 
			'id' => 'title-page',  
			'name' => 'SEO: Page Title', 
			'type' => 'textarea', 
			'cols' => 4 
		),
		array( 
			'id' => 'description-page',  
			'name' => 'SEO: Page Description', 
			'type' => 'textarea', 
			'cols' => 4 
		),
		array( 
			'id' => 'keyword-page',  
			'name' => 'SEO: Page Keyword', 
			'type' => 'textarea', 
			'cols' => 4		
		)
	);

	$footer_configuration = array(
		array( 
			'id' => 'footer-active',  
			'name' => 'Footer Active', 
			'type' => 'select', 
			'options' => array( 
						'on' => 'On', 
						'off' => 'Off' 
						), 
			'cols' => 2 
		),
		array( 
			'id' => 'footer-pattern',  
			'name' => 'Footer Pattern', 
			'type' => 'select', 
			'options' => $pattern_list,
			'cols' => 2 		 
		),
		array( 
			'id' => 'footer-pattern-color',  
			'name' => 'Pattern BG Color', 
			'type' => 'colorpicker',
			'cols' => 4 		 
		),		
		array( 
			'id' => 'footer-pattern-opacity',  
			'name' => 'P. Opacity (0.1 to 1)', 
			'type' => 'text',
			'cols' => 2
		),		
		array( 
			'id' => 'footer-bg-type',  
			'name' => 'Choose Block BG',  
			'type' => 'select', 
			'options' => array( 
						'color' => 'color',
						'image' => 'image'
						), 
			'cols' => 2  
		),
		array( 
			'id' => 'footer-bg-image', 
			'name' => 'Background Footer', 
			'type' => 'image', 
			'repeatable' => false, 
			'show_size' => false,
			'size' =>  'height=400&width=1000'
		),
		array( 
			'id' => 'footer-bg-color', 
			'name' => 'Color BG Footer', 
			'type' => 'colorpicker' 
		),
		array( 
			'id' => 'active-widget',  
			'name' => 'Active Widget', 
			'type' => 'select', 
			'options' => array( 
						'on' => 'On', 
						'off' => 'Off' 
						), 
			'cols' => 6 
		),
		array( 
			'id' => 'number-column-widget',  
			'name' => 'Number column Widget', 
			'type' => 'select', 
			'options' => array( 
						'1' => '1', 
						'2' => '2',
						'3' => '3', 
						'4' => '4' 						 
						), 
			'cols' => 6		
		),
		array( 
			'id' => 'footer-text',  
			'name' => 'Footer Content', 
			'type' => 'wysiwyg', 
			'options' => array( 
				'editor_height' => '200' 
			), 
			'repeatable' => false, 
			'sortable' => false 
		)
	);

	$advanced_configuration = array(
		array( 
			'id' => 'analytics',  
			'name' => 'Analytics Code', 
			'type' => 'textarea', 
			'cols' => 4 
		),
		array( 
			'id' => 'custom-css',  
			'name' => 'Custom CSS', 
			'type' => 'textarea', 
			'cols' => 4 
		),
		array( 
			'id' => 'custom-js',  
			'name' => 'Custom JS', 
			'type' => 'textarea', 
			'cols' => 4		
		)
	);

	$meta_boxes[] = array(
		'title' => 'General Configuration',
		'pages' => 'adonepage',
		'fields' => $general_configuration
	);

	$meta_boxes[] = array(
		'title' => 'Menu Configuration',
		'pages' => 'adonepage',
		'fields' => $menu_configuration
	);

	$meta_boxes[] = array(
		'title' => 'First Block',
		'pages' => 'adonepage',
		'fields' => $first_block
	);
	
	// Example of repeatable group. Using all fields.
	// For this example, copy fields from $fields, update I
	$group_fields = $fields;
	foreach ( $group_fields as &$field ) {
		$field['id'] = str_replace( 'field', 'gfield', $field['id'] );
	}

	$meta_boxes[] = array(
		'title' => 'Landing Page Block',
		'pages' => 'adonepage',
		'fields' => array(
			array( 
				'id' => 'gp', 
				'name' => 'Block for Landing Page', 
				'type' => 'group', 
				'repeatable' => true,
				'sortable' => true,
				'fields' => $group_fields,
				'desc' => 'Compile your landing page block'
			)
		)
	);

	$meta_boxes[] = array(
		'title' => 'Footer',
		'pages' => 'adonepage',
		'fields' => $footer_configuration
	);

	$meta_boxes[] = array(
		'title' => 'SEO Configuration',
		'pages' => 'adonepage',
		'fields' => $seo_configuration
	);
	
	$meta_boxes[] = array(
		'title' => 'Advanced Configuration',
		'pages' => 'adonepage',
		'fields' => $advanced_configuration
	);
	

	$gallery_image = array(
		array( 
			'id' => 'gallery-image', 
			'name' => 'Image', 
			'type' => 'image', 
			'repeatable' => true, 
			'show_size' => false,
			'size' =>  'height=400&width=1000'
		)
	);	
	
	$meta_boxes[] = array(
		'title' => 'GALLERY',
		'pages' => 'adgallery_post',
		'fields' => $gallery_image
	);

	$team_fields = array(
		array( 
			'id' => 'facebook-team', 
			'name' => 'Facebook Link (leave empty for disable)', 
			'type' => 'text',
			'cols' => 4
		),
		array( 
			'id' => 'twitter-team', 
			'name' => 'Twitter Link (leave empty for disable)', 
			'type' => 'text',
			'cols' => 4
		),
		array( 
			'id' => 'googleplus-team', 
			'name' => 'Google Plus Link (leave empty for disable)', 
			'type' => 'text',
			'cols' => 4
		),
		array( 
			'id' => 'google-team', 
			'name' => 'Google Link (leave empty for disable)', 
			'type' => 'text',
			'cols' => 4
		),		
		array( 
			'id' => 'vimeo-team', 
			'name' => 'Vimeo Link (leave empty for disable)', 
			'type' => 'text',
			'cols' => 4
		),						
		array( 
			'id' => 'feed-team', 
			'name' => 'Feed Link (leave empty for disable)', 
			'type' => 'text',
			'cols' => 4
		),
		array( 
			'id' => 'youtube-team', 
			'name' => 'Youtube Link (leave empty for disable)', 
			'type' => 'text',
			'cols' => 4
		),
		array( 
			'id' => 'flickr-team', 
			'name' => 'Flickr Link (leave empty for disable)', 
			'type' => 'text',
			'cols' => 4
		),						
		array( 
			'id' => 'linkedin-team', 
			'name' => 'Linkedin Link (leave empty for disable)', 
			'type' => 'text',
			'cols' => 4
		),	
		array( 
			'id' => 'tumblr-team', 
			'name' => 'Tumblr Link (leave empty for disable)', 
			'type' => 'text',
			'cols' => 4
		),
		array( 
			'id' => 'blogger-team', 
			'name' => 'Blogger Link (leave empty for disable)', 
			'type' => 'text',
			'cols' => 4
		),
		array( 
			'id' => 'mail-team', 
			'name' => 'Mail Link (leave empty for disable)', 
			'type' => 'text',
			'cols' => 4
		),	
		array( 
			'id' => 'github-team', 
			'name' => 'Github Link (leave empty for disable)', 
			'type' => 'text',
			'cols' => 4
		),
		array( 
			'id' => 'pinterest-team', 
			'name' => 'Pinterest Link (leave empty for disable)', 
			'type' => 'text',
			'cols' => 4
		),
		array( 
			'id' => 'skype-team', 
			'name' => 'Skype Link (leave empty for disable)', 
			'type' => 'text',
			'cols' => 4
		),	
		array( 
			'id' => 'picassa-team', 
			'name' => 'Picassa Link (leave empty for disable)', 
			'type' => 'text',
			'cols' => 4
		),
		array( 
			'id' => 'dribbble-team', 
			'name' => 'Dribbble Link (leave empty for disable)', 
			'type' => 'text',
			'cols' => 4
		),
		array( 
			'id' => 'yahoo-team', 
			'name' => 'Yahoo Link (leave empty for disable)', 
			'type' => 'text',
			'cols' => 4
		),								
	);


	$meta_boxes[] = array(
		'title' => 'Social Team',
		'pages' => 'adteam_post',
		'fields' => $team_fields
	);	
	
	
	$partner_fields = array(
		array( 
			'id' => 'url-partner', 
			'name' => 'Url Link Partner (leave empty for disable)', 
			'type' => 'text',
			'cols' => 4
		)	
	);
	$meta_boxes[] = array(
		'title' => 'URL Partners',
		'pages' => 'adpartners_post',
		'fields' => $partner_fields
	);	
	
	return $meta_boxes;

}
add_filter( 'adonepagecmb_meta_boxes', 'adonepage_adonepagecmb_metaboxes' );
