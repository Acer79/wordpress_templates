<?php
/*
File: inc/shortcodes-effects.php
Description: Shortocodes Functions
Plugin: ADTHEME SHORTCODES
Author: Ad-theme.com
*/


function adop_effects_left($atts, $content = null)
{
		$effects = $atts['effects'];
		$align = $atts['align'];
		$return = '';
		$return .= '<div data-position="left" class="effects-align-'.$align.' notViewed animBlock floatr '.$effects.' animated">';
		$return .= do_shortcode($content);
		$return .= '</div>';
		
        return wpautop($return);
} 

add_shortcode("adop_effects_left", "adop_effects_left");			


function adop_effects_right($atts, $content = null)
{
		$effects = $atts['effects'];
		$align = $atts['align'];		
		$return = '';
		$return .= '<div data-position="right" class="effects-align-'.$align.' notViewed animBlock floatr '.$effects.' animated">';
		$return .= do_shortcode($content);
		$return .= '</div>';
		
        return wpautop($return);

} 

add_shortcode("adop_effects_right", "adop_effects_right");


function adop_effects_none($atts, $content = null)
{
		$effects = $atts['effects'];
		$align = $atts['align'];		
		$return = '';
		$return .= '<div data-position="none" class="effects-align-'.$align.' notViewed animBlock floatr '.$effects.' animated">';
		$return .= do_shortcode($content);
		$return .= '</div>';
		
        return wpautop($return);

} 

add_shortcode("adop_effects_none", "adop_effects_none");			
?>