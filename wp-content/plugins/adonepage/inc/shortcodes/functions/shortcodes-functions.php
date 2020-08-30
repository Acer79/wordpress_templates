<?php
/*
File: inc/shortcodes.php
Description: Shortocodes Functions
Plugin: AD ONE PAGE
Author: Ad-theme.com
*/

function adop_typography ( $attr ) {	
		$tag = $attr['tag'];
		$text = $attr['text'];		
		$return = '<span class="adonepage-typography"><'.$tag.'>'.$text.'</'.$tag.'></span>';
		return $return;
    }  
add_shortcode("adop_typography", "adop_typography");

function adop_typography_custom ( $attr ) {			
		extract(
			shortcode_atts(
				array(
					"fz" => '',
					"fw" => '',
					"fc" => '',
					"fs" => '', 
					"bs" => '', 
					"bc" => '', 
					"bt" => '',
					"pad" => '',
					"bg" => '',
					"op" => '',
					"lh" => '',
					"text" => '',
					"ri" => ''										
					), 
					$attr)
		);		 
		
		if(empty($op) || $op == '') { $op = '1'; } 
		$rgb_bg = adonepagehex2rgb($bg);
		$rgba_bg = "rgba( " . $rgb_bg[0] . ", " . $rgb_bg[1] . ", " . $rgb_bg[2] . ", " . $op . ")";				
    	if($bg == '' || empty($bg)) {
			$rgba_bg = 'none';	
		}
    	if($bc == '' || empty($bc) || $bs == '' || empty($bs)) {
			$bs = '0px';	
		}	
		
		$return = '<span class="adonepage-typography typoresponsive-'.$ri.'" style="border-width:'.$bs.'; border-color:'.$bc.'; border-style:'.$bt.';font-size:'.$fz.'; font-weight:'.$fw.'; color:'.$fc.'!important; font-style:'.$fs.';padding:'.$pad.';line-height:'.$lh.';';
		if(!empty($bg) || $bg != '') {
			$return .= 'background:'.$rgba_bg.';';
		}
		$return .= '">'.$text.'</span>';
		return $return;
	}  
add_shortcode("adop_typography_custom", "adop_typography_custom");

function adop_line ( $atts ) {
		
		extract(
			shortcode_atts(
				array(
					"color" => 'red',
					"height" => '1',
					"width" => '100%', 
					"align" => 'center', 
					"margin_top" => '2', 
					"margin_bottom" => '2',
					"type" => 'solid'						
					), 
					$atts)
		);
		if(empty($width) || $width == '') { $width = '100%'; } 
		if($width != '100%') { $width = $width . 'px'; }
		if(empty($color) || $color == '') { $color = 'none!important'; }
		if($align == 'left') { $margin = $margin_top . 'px auto ' . $margin_bottom . 'px 0 '; }
		if($align == 'right') { $margin = $margin_top . 'px 0 ' . $margin_bottom . 'px auto '; }
		if($align == 'center') { $margin = $margin_top . 'px auto ' . $margin_bottom . 'px auto '; }
		//$return = '';
		$return = '<hr style="background:none;height:'.$height.'px;width:'.$width.';margin:'.$margin.';border-top:'.$height.'px '.$type.' '.$color.'!important">';
		return $return;
	}  
add_shortcode("adop_line", "adop_line");

function adop_empty_line ( $atts ) {
		extract(
			shortcode_atts(
				array(
					"height" => ''						
					), 
					$atts)
		);	
	
		$return = '<span class="empty_line" style="margin:'.$height.'px;display:block;"></span>';
		return $return;
	}  
add_shortcode("adop_empty_line", "adop_empty_line");

function adop_button ( $attr ) {	
		$type = $attr['type'];
		$content_type = $attr['bct'];		
		$link = $attr['bl'];
		$target = $attr['bt'];
		$content = $attr['bcontent'];
		$return = '<span class="adonepage-button"><a href="'.$link.'" class="'.$type.'" target="'.$target.'">';
		
		if($content_type == 'image') {
			$return .= '<i class="'.$content.'"></i>';
		} else {
			$return .= $content;
		}
		
		$return .= '</a></span>';
		return $return;
    }  
add_shortcode("adop_button", "adop_button");

function adop_button_custom ( $attr ) {	
		$button_padding = $attr['bp'];
		$button_margin = $attr['bm'];
		$button_b_radius = $attr['bbr'];
		$button_font_size = $attr['bfs'];
		$button_font_color = $attr['bfc'];
		$button_color = $attr['bc'];
		$button_color_over = $attr['bco'];
		$button_opacity = $attr['bop'];		
		$content_type = $attr['bct'];		
		$link = $attr['bl'];
		$target = $attr['bt'];
		$content = $attr['bcontent'];
		$ri = $attr['ri'];
		$rgb_button = adonepagehex2rgb($button_color);
		$rgba_button = "rgba( ".$rgb_button[0]." , ".$rgb_button[1]." , ".$rgb_button[2]." , ".$button_opacity.")";
		$return = '<span class="adonepage-button buttonresponsive-'.$ri.'"><a href="'.$link.'" target="'.$target.'" style="font-size:'.$button_font_size.'px;color:'.$button_font_color.';padding:'.$button_padding.';margin:'.$button_margin.';border-radius:'.$button_b_radius.';background-color:'.$rgba_button.';display:inline-block;" onMouseOver="this.style.backgroundColor=\''.$button_color_over.'\'" onMouseOut="this.style.backgroundColor=\''.$rgba_button.'\'">';
		
		if($content_type == 'image') {
			$return .= '<i class="'.$content.'"></i>';
		} else {
			$return .= $content;
		}
		
		$return .= '</a></span>';
		return $return;		
    }  
add_shortcode("adop_button_custom", "adop_button_custom");

function adop_content_countdown($atts, $content = null){
  extract(shortcode_atts(array(
     'month' => '',
     'day'   => '',
     'year'  => ''
    ), $atts));
    $remain = ceil((mktime( 0,0,0,(int)$month,(int)$day,(int)$year) - time())/86400);
    if( $remain > 1 ){
        return $daysremain = "<div class=\"event\">Just <b>($remain)</b> days until content is available</div>";
    }else if($remain == 1 ){
        return $daysremain = "<div class=\"event\">Just <b>($remain)</b> day until content is available</div>";
    }else{
        return $content;
    }
}
add_shortcode('adop_cdt', 'adop_content_countdown');

function adop_countdown($atts){
  extract(shortcode_atts(array(
     'year'  => '',
     'month' => '',
     'day'   => ''     
    ), $atts));

	$return = "<script type='text/javascript'>
	jQuery(document).ready(function($){
		$('#clock').countdown('".$year."/".$month."/".$day."', function(event) {
		$(this).html(event.strftime(''
			 + '<div class=\"ad_one_fifth\"><span class=\"countdown-number\">%w</span> <span class=\"countdown-text\">weeks</span></div>'
			 + '<div class=\"ad_one_fifth\"><span class=\"countdown-number\">%d</span> <span class=\"countdown-text\">days</span></div>'
			 + '<div class=\"ad_one_fifth\"><span class=\"countdown-number\">%H</span> <span class=\"countdown-text\">hr</span></div>'
			 + '<div class=\"ad_one_fifth\"><span class=\"countdown-number\">%M</span> <span class=\"countdown-text\">min</span></div>'
			 + '<div class=\"ad_one_fifth last\"><span class=\"countdown-number\">%S</span> <span class=\"countdown-text\">sec</span></div>'));
		});
	});
	</script>";

	$return .= '<div id="clock" class="adop_clock"></div><div class="adclear"></div>';	
	return $return;
}
add_shortcode('adop_countdown', 'adop_countdown');


function adop_box($atts, $content = null){
  extract(shortcode_atts(array(
     'type'  	=> '',
     'mar' 		=> '',
     'pad'		=> '',	 
	 'bgc' 		=> '',
	 'bgo'	 	=> '',
	 'bt' 		=> '',
	 'bc' 		=> '',  
	 'bs' 		=> '',
	 'width' 	=> '',
	 'height' 	=> ''   
    ), $atts));
	
	if(empty($bgo) || $bgo == '') { $bgo = '1'; } 
	$rgb_bgc = adonepagehex2rgb($bgc);
	$rgba_bgc = "rgba( " . $rgb_bgc[0] . ", " . $rgb_bgc[1] . ", " . $rgb_bgc[2] . ", " . $bgo . ")";
    if($bgc == '' || empty($bgc)) {
		$rgba_bgc = 'none';	
	}
    if($bc == '' || empty($bc) || $bs == '' || empty($bs)) {
		$bs = '0px';	
	}	
	
	$return = '<div class="adop_box" style="margin:'.$mar.';padding:'.$pad.';background:'.$rgba_bgc.';border-width:'.$bs.'; border-color:'.$bc.'; border-style:'.$bt.';width:'.$width.';height:'.$height.';">';
	$return .= do_shortcode($content);
	$return .= '</div>';
	return $return;

}
add_shortcode('adop_box', 'adop_box');

function adop_icon ( $attr ) {	
		$icon = $attr['icon'];
		$size = $attr['size'];
		$color = $attr['color'];
		$color_over = $attr['color_over'];
		$margin = $attr['margin'];
		$padding = $attr['padding'];
		$float = $attr['float'];
		$return = '<span class="adtheme-icon"><i class="'.$icon.'" style="font-size:'.$size.';color:'.$color.';margin:'.$margin.';padding:'.$padding.';display:inline-block;float:'.$float.';" onMouseOver="this.style.color=\''.$color_over.'\'" onMouseOut="this.style.color=\''.$color.'\'"></i></span>';
		return $return;
    }  
add_shortcode("adop_icon", "adop_icon");

require('shortcodes-portfolio.php');
require('shortcodes-gallery.php');
require('shortcodes-map.php');
require('shortcodes-columns.php');
require('shortcodes-social.php');
require('shortcodes-onscroll.php');
require('shortcodes-lists.php');
require('shortcodes-posts-slider.php');
require('shortcodes-qtrotator.php');
require('shortcodes-effects.php');
require('shortcodes-carousel.php');
require('shortcodes-charts.php');
require('shortcodes-woocommerce.php');

?>