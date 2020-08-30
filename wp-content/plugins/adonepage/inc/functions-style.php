<?php

function adonepage_style($ad_onepage_id, $group_data) {	
	$font_family_string = get_post_meta( $ad_onepage_id, 'font-family', true );
	$font_family = explode(":", $font_family_string);
	$font_family_name = explode("+", $font_family[0]);
	$font_weight = get_post_meta( $ad_onepage_id, 'font-weight', true );
	$font_style = get_post_meta( $ad_onepage_id, 'font-style', true );
	$color = get_post_meta( $ad_onepage_id, 'font-color', true );
	$color_link = get_post_meta( $ad_onepage_id, 'color-link', true );
	$color_link_over = get_post_meta( $ad_onepage_id, 'color-link-over', true );
	$menu_position = get_post_meta( $ad_onepage_id, 'menu-position', true );
	$active_sticky_menu = get_post_meta( $ad_onepage_id, 'active-sticky-menu', true );
	$menu_font_family_string = get_post_meta( $ad_onepage_id, 'menu-font-family', true );
	$menu_font_family = explode(":", $menu_font_family_string);
	$menu_font_family_name = explode("+", $menu_font_family[0]);		
	$menu_bg_color = get_post_meta( $ad_onepage_id, 'menu-bg-color', true );
	$menu_bg_opacity = get_post_meta( $ad_onepage_id, 'menu-bg-opacity', true );
	//$menu_item_bg_color = get_post_meta( $ad_onepage_id, 'menu-item-bg-color', true );
	//$menu_item_bg_color_over = get_post_meta( $ad_onepage_id, 'menu-item-bg-color-over', true );
	$menu_item_color = get_post_meta( $ad_onepage_id, 'menu-font-color', true );
	$menu_item_color_over = get_post_meta( $ad_onepage_id, 'menu-font-color-over', true );
	$menu_bbs = get_post_meta( $ad_onepage_id, 'menu-border-size', true );	
	$menu_bbc = get_post_meta( $ad_onepage_id, 'menu-border-color', true );
	$menu_bbshadow = get_post_meta( $ad_onepage_id, 'menu-border-shadow', true );	
	$rgb_menu_bbc = adonepagehex2rgb($menu_bbc);
	$rgba_menu_bbc = "rgba( ".$rgb_menu_bbc[0]." , ".$rgb_menu_bbc[1]." , ".$rgb_menu_bbc[2]." , 0.11)";				
	
	
	
	$logo_position = get_post_meta( $ad_onepage_id, 'logo-position', true );
	
	$spinner_color = get_post_meta( $ad_onepage_id, 'first-bg-slider-spinner-color', true );
	$spinner_bg_color = get_post_meta( $ad_onepage_id, 'first-bg-slider-spinner-bg-color', true );
	
	$footer_pattern = get_post_meta( $ad_onepage_id, 'footer-pattern', true );
	$footer_pattern_opacity = get_post_meta( $ad_onepage_id, 'footer-pattern-opacity', true );
	if(empty($footer_pattern_opacity) || $footer_pattern_opacity == '') { $footer_pattern_opacity = '0.5'; }
	$footer_bg_type = get_post_meta( $ad_onepage_id, 'footer-bg-type', true );
	$footer_bg_image_id = get_post_meta( $ad_onepage_id, 'footer-bg-image', true );
	$footer_bg_color = get_post_meta( $ad_onepage_id, 'footer-bg-color', true );
	
	?>
    <style>
	body {
		font-family: <?php 
		foreach($font_family_name as $font_family_name_split) {
			echo $font_family_name_split .' '; 
		}
		?>!important;
		font-weight: <?php echo $font_weight ?>;
		font-style: <?php echo $font_style ?>;
		color:<?php echo $color; ?>!important;
	}
	.slide {
		color:<?php echo $color; ?>;
	}
	#adonepage .slide {
		height:auto;
	}
	#adonepage .wrapper {
	<?php
	/* WRAPPER WIDTH */
		$wrapper = get_post_meta( $ad_onepage_id, 'wrapper-width', true );
		if(empty($wrapper) || $wrapper == '') {
		   echo 'width:100%;';
		} else {
		   echo 'width:'.$wrapper.'px;';
		}
	/* END WRAPPER */
	?>
		margin:0 auto;
	}
	.adonepage-menu {		
		<?php
			if(empty($menu_bg_opacity) || $menu_bg_opacity == '') { $menu_bg_opacity = '1'; } 
			$rgb_menu_bg_color = adonepagehex2rgb($menu_bg_color);
			$rgba_menu_bg_color = "rgba( ".$rgb_menu_bg_color[0] ." , ".$rgb_menu_bg_color[1]." , ".$rgb_menu_bg_color[2]." , ".$menu_bg_opacity.")";				
		?>
		background:<?php echo $rgba_menu_bg_color; ?>;
		font-size:<?php echo get_post_meta( $ad_onepage_id, 'menu-font-size', true ); ?>px;
		font-family: <?php 
		foreach($menu_font_family_name as $menu_font_family_name_split) {
			echo $menu_font_family_name_split .' '; 
		}
		?>!important;
		font-weight:<?php echo get_post_meta( $ad_onepage_id, 'menu-font-family-weight', true ); ?>;
	}
	.navigation, .navigation-wp {
		height:<?php echo get_post_meta( $ad_onepage_id, 'menu-height', true ); ?>px;
	}
	<?php
	if($logo_position == 'left' || $logo_position == 'right') { 
	?>
		.adonepage-menu .navigation > li, .adonepage-menu .navigation-wp > li {
			display:inline-block;
		}
	<?php } else { ?>		
		.adonepage-menu .adonepage-logo, .adonepage-menu .navigation, .adonepage-menu .navigation-wp {
			text-align:center;
		}
		.adonepage-menu .navigation li {
			display:inline-block;
			text-align:center;
		}	

	<?php }	?>	
	.adonepage-menu .navigation li a, .adonepage-menu .navigation-wp li a, .slicknav_nav a {
		color:<?php echo $menu_item_color; ?>!important;
	}
	.adonepage-menu .navigation-wp > li:before, .adonepage-menu .navigation > li:before {
		border-left:1px dotted <?php echo $menu_item_color; ?>!important;
	}
	.adonepage-menu .navigation li a:hover, .adonepage-menu .navigation-wp li a:hover, .slicknav_nav a {
		color:<?php echo $menu_item_color_over; ?>!important;
	}	
		.adonepage-menu .navigation li, .adonepage-menu .navigation-wp li {
			color:<?php echo get_post_meta( $ad_onepage_id, 'menu-font-color', true ); ?>;
		}
		.adonepage-menu .navigation li:hover, .adonepage-menu .navigation-wp li:hover {
			color:<?php echo get_post_meta( $ad_onepage_id, 'menu-font-color-over', true ); ?>;
		}
		.slicknav_menu, .slicknav_menu .slicknav_nav .sf-menu > li, .slicknav_menu .slicknav_nav .sf-menu > li:hover, .slicknav_nav, .slicknav_nav li a:hover {
			background:<?php echo $rgba_menu_bg_color; ?>!important;
		}
		.slicknav_nav a {
			color:<?php echo $menu_item_color; ?>!important;
		}
		.slicknav_nav a:hover {
			color:<?php echo $menu_item_color_over; ?>!important;
		}
	<?php 
		if($menu_position == 'top') {
	?>
		#adonepage .button {
			background-color:<?php echo get_post_meta( $ad_onepage_id, 'button-bg-color', true ); ?>;
		}
		#adonepage .button:hover {
			background-color:<?php echo get_post_meta( $ad_onepage_id, 'menu-font-color', true ); ?>;
		}
		#adonepage .button {
			bottom:0;
		}
		<?php } else { ?>
		#adonepage .button { 
			top: 0;
		}
		#adonepage.admin-bar .button { 
			top: 32px;
		}
		<?php } ?>
		
	<?php	
		// FIRST BLOCK
		$first_bg_type_active 				= get_post_meta( $ad_onepage_id, 'first-bg-type-active', true );
		$first_block_pattern 				= get_post_meta( $ad_onepage_id, 'first-block-pattern', true );
		$first_block_pattern_color 			= get_post_meta( $ad_onepage_id, 'first-block-pattern-color', true );
		$first_block_pattern_opacity 		= get_post_meta( $ad_onepage_id, 'first-block-pattern-opacity', true );
		$first_block_name_font_size 		= get_post_meta( $ad_onepage_id, 'first-block-name-font-size', true );
		$first_block_name_position 			= get_post_meta( $ad_onepage_id, 'first-block-name-position', true );
		$first_block_name_font_style 		= get_post_meta( $ad_onepage_id, 'first-block-name-font-style', true );
		$first_block_name_font_weight 		= get_post_meta( $ad_onepage_id, 'first-block-name-font-weight', true );
		$first_block_name_font_color 		= get_post_meta( $ad_onepage_id, 'first-block-name-font-color', true );
		$first_block_height 				= get_post_meta( $ad_onepage_id, 'first-block-height', true );
		$first_block_wrapper_padding 		= get_post_meta( $ad_onepage_id, 'first-block-wrapper-padding', true );
		$first_block_wrapper_custom_active 	= get_post_meta( $ad_onepage_id, 'first-block-wrapper-custom-active', true );		
		$first_block_wrapper_custom 		= get_post_meta( $ad_onepage_id, 'first-block-wrapper-custom', true );		
		$first_block_border_px 				= get_post_meta( $ad_onepage_id, 'first-block-border-px', true );	
		$first_block_border_bottom_color 	= get_post_meta( $ad_onepage_id, 'first-block-border-bottom-color', true );
		$first_block_border_bottom_type 	= get_post_meta( $ad_onepage_id, 'first-block-border-bottom-type', true );		
		$first_bg_image_id 					= get_post_meta( $ad_onepage_id, 'first-bg-image', true );
		$first_bg_color 					= get_post_meta( $ad_onepage_id, 'first-bg-color', true );					
	?>
	#slide1 {
		<?php
		if($first_bg_type_active == 'color') {
			echo 'background:'.$first_bg_color.';';
			
		} elseif ($first_bg_type_active == 'image') {
				$first_bg_image = wp_get_attachment_image_src( $first_bg_image_id, 'adonepage-background-block' );
				echo 'background:url('.$first_bg_image[0].') no-repeat center center fixed;';
		}
		echo 'height:'.$first_block_height.'!important;';
		echo 'border-bottom:'.$first_block_border_px.'px '.$first_block_border_bottom_type.' '.$first_block_border_bottom_color.';';
		?>	
	}
		<?php if($first_block_pattern != 'none') { ?>
		#adonepage .slide .block-pattern-1 {
			background-image:url('<?php echo adonepage_URL . 'assets/img/bg/'. $first_block_pattern . '.png'; ?>');
			background-repeat: repeat;
			background-color:<?php echo $first_block_pattern_color; ?>;
			position: absolute;
			width: 100%;
			height:100%;
			opacity:<?php 
			
			if(empty($first_block_pattern_opacity) || $first_block_pattern_opacity == '') {
				$first_block_pattern_opacity = '0.5';
			}
			
			echo $first_block_pattern_opacity; ?>;
			top:0;
			z-index:2;
		}
	<?php } else { ?>
		#adonepage .slide .block-pattern-1 {
			background-repeat: repeat;
			background-color:<?php echo $first_block_pattern_color; ?>;
			position: absolute;
			width: 100%;
			height:100%;
			opacity:<?php 
			
			if(empty($first_block_pattern_opacity) || $first_block_pattern_opacity == '') {
				$first_block_pattern_opacity = '0.5';
			}
			
			echo $first_block_pattern_opacity; ?>;
			top:0;
			z-index:2;
		}	
	<?php }
		if($first_block_wrapper_custom_active == 'on') {
			if(empty($first_block_wrapper_custom ) || $first_block_wrapper_custom  == '') { $first_block_wrapper_custom  = '100%'; }
	?>
	#slide1 .wrapper {
		width:<?php echo $first_block_wrapper_custom ; ?>
	}
	<?php } ?>	
	#slide1 .wrapper h1.title-block {
		text-align:<?php echo $first_block_name_position; ?>;
		font-size:<?php echo $first_block_name_font_size; ?>;
		font-style:<?php echo $first_block_name_font_style; ?>;
		font-weight:<?php echo $first_block_name_font_weight; ?>;
		color:<?php echo $first_block_name_font_color; ?>;
	 }
	#slide1 .wrapper {
		padding:<?php 
		if(!empty($first_block_wrapper_padding) || $first_block_wrapper_padding != '') { echo $first_block_wrapper_padding; } ?>;
	}		
	
	<?php
	// END FIRST BLOCK
	?>
	
	<?php
		$style_count=2;
		foreach ( $group_data as $single_field ) :
		echo '#slide'.$style_count.'{';
			if($single_field['bg-type-active'] == 'color') {
				echo 'background:'.$single_field['bg-color'].' no-repeat center center fixed;';
			} elseif ($single_field['bg-type-active'] == 'image')  {
				$bg_image_id = $single_field['bg-image'];
				$bg_image = wp_get_attachment_image_src( $bg_image_id, 'adonepage-background-block' );
				echo 'background:url('.$bg_image[0].') no-repeat center center fixed;';
			}
			echo 'height:'.$single_field['block-height'].'!important;';
			echo 'border-bottom:'.$single_field['block-border-px'].'px '.$single_field['block-border-bottom-type'].' '.$single_field['block-border-bottom-color'].';';
		echo '}';
		?>
		<?php if($single_field['block-pattern'] != 'none') { ?>
		#adonepage .slide .block-pattern-<?php echo $style_count; ?> {
			background-image:url('<?php echo adonepage_URL . 'assets/img/bg/'. $single_field['block-pattern'] . '.png'; ?>');
			background-repeat: repeat;
			background-color:<?php echo $single_field['block-pattern-color']; ?>;
			position: absolute;
			width: 100%;
			height:100%;
			opacity:<?php 
			
			if(empty($single_field['block-pattern-opacity']) || $single_field['block-pattern-opacity'] == '') {
				$single_field['block-pattern-opacity'] = '0.5';
			}
			
			echo $single_field['block-pattern-opacity']; ?>;
			top:0;
			z-index:2;
		}
	<?php } else { ?>
		#adonepage .slide .block-pattern-<?php echo $style_count; ?> {
			background-repeat: repeat;
			background-color:<?php echo $single_field['block-pattern-color']; ?>;
			position: absolute;
			width: 100%;
			height:100%;
			opacity:<?php 
			
			if(empty($single_field['block-pattern-opacity']) || $single_field['block-pattern-opacity'] == '') {
				$single_field['block-pattern-opacity'] = '0.5';
			}
			
			echo $single_field['block-pattern-opacity']; ?>;
			top:0;
			z-index:2;
		}	
	<?php }
		if($single_field['block-wrapper-custom-active'] == 'on') {
			$block_wrapper_custom = $single_field['block-wrapper-custom'];
			if(empty($block_wrapper_custom) || $block_wrapper_custom == '') { $block_wrapper_custom = '100%'; }
	?>
	#slide<?php echo $style_count; ?> .wrapper {
		width:<?php echo $block_wrapper_custom; ?>
	}
	<?php } ?>	
	#slide<?php echo $style_count; ?> .wrapper h1.title-block {
		text-align:<?php echo $single_field['block-name-position']; ?>;
		font-size:<?php echo $single_field['block-name-font-size']; ?>;
		font-style:<?php echo $single_field['block-name-font-style']; ?>;
		font-weight:<?php echo $single_field['block-name-font-weight']; ?>;
		color:<?php echo $single_field['block-name-font-color']; ?>;
	 }
	#slide<?php echo $style_count; ?> .wrapper {
		padding:<?php 
		$padding_wrap = $single_field['block-wrapper-padding'];
		if(empty($padding_wrap) || $padding_wrap == '') { echo '40px 0'; } else { echo $padding_wrap; } ?>;
	}
	 <?php
		$style_count++;
		endforeach;
	?>


	/* FOOTER */
	
	#adonepage .adonepage-footer {
		background: <?php 
		if($footer_bg_type == 'color') {
			echo $footer_bg_color;
		} else {
			$footer_bg_image = wp_get_attachment_image_src( $footer_bg_image_id, 'adonepage-background-block' );
			echo 'url('.$footer_bg_image[0].');';
		}
		?>
	}
	<?php if($footer_pattern != 'none') { ?>
	#adonepage .adonepage-footer .footer-pattern {
		background-image:url('<?php echo adonepage_URL . 'assets/img/bg/'. $footer_pattern . '.png'; ?>');
		background-repeat: repeat;
		background-color:<?php echo $single_field['footer-pattern-color']; ?>;
    	position: absolute;
    	width: 100%;
		height:100%;
		opacity:<?php echo $footer_pattern_opacity; ?>;
		top:0;
	}
	<?php } ?>
	#adonepage .adonepage-menu {
		<?php if($menu_bbshadow == 'off') { ?>
			border-bottom:<?php echo $menu_bbs; ?>px <?php echo $menu_bbc; ?> solid;
		<?php } else { ?>
			box-shadow:0 1px 3px <?php echo $rgba_menu_bbc; ?>;
		<?php } ?>
	}
	#adonepage .adonepage-menu .sf-menu ul li {
		background:<?php echo $rgba_menu_bg_color; ?>;
	}
	<?php if($active_sticky_menu == 'normal') { ?>
		#adonepage .sticky {
			display:none;
		}
	<?php }	if($active_sticky_menu == 'stickymenu-v2') {
		?>
		#adonepage .adonepage-menu {
			-webkit-transition: all .55s ease-in;
	  		-moz-transition: all .55s ease-in;
	  		-ms-transition: all .55s ease-in;
	  		-o-transition: all .55s ease-in;
	  		transition: all .55s ease-in;
			opacity:0;			
		}
		#adonepage .adonepage-menu.sticky {
			-webkit-transition: all .55s ease-in;
	  		-moz-transition: all .55s ease-in;
	  		-ms-transition: all .55s ease-in;
	  		-o-transition: all .55s ease-in;
	  		transition: all .55s ease-in;
			opacity:1;
	  }
	<?php } ?>
	#adonepage a {
		color:<?php echo $color_link; ?>
	}
	#adonepage a:hover {
		color:<?php echo $color_link_over; ?>
	}
	#adonepage .navigation .active a, #adonepage .navigation-wp .active a {
		color:<?php echo $color_link_over; ?>!important;
	}	
	/* SPINNER */
	
	#cycle-loader {
		background:<?php echo $spinner_bg_color; ?>;
	}
	.spinner-plane, 
	.spinner-wave > div, 
	.spinner-bounce .double-bounce1, .spinner-bounce .double-bounce2, 
	.spinner-cubes .cube1, .spinner-cubes .cube2, 
	.spinner-pulse,  
	.spinner-dots .dot1, .spinner-dots .dot2, 
	.spinner-three-bounce > div,  
	.spinner-circle .container1 > div, .spinner-circle .container2 > div, .spinner-circle .container3 > div { 
		background:<?php echo $spinner_color; ?>;
	}
	
	.wpcf7 {
		color:<?php echo $menu_item_color?>!important;
	}
	.wpcf7-form-control.wpcf7-submit:hover {
		background:<?php echo $menu_item_color_over; ?>!important;
	}
	.wpcf7-form-control.wpcf7-submit {
		color:<?php echo $menu_item_color?>!important;
	}
	h4.widget-title {
		border-bottom-color:<?php echo $menu_item_color_over; ?>!important;
	}
	</style>

<?php } ?>