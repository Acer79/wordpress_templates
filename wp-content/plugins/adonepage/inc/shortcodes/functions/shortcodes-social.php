<?php
/*
File: inc/shortcodes-social.php
Description: Shortocodes Functions
Plugin: ADTHEME SHORTCODES
Author: Ad-theme.com
*/

function adop_social_link($atts, $content = null)
{
    extract(
		shortcode_atts(
			array(
				"fb" => '',
				"tw" => '',
				"in" => '', 
				"gplus" => '', 
				"pi" => '', 
				"yt" => '', 
				"fl" => '', 
				"tu" => '',
				"rss" => '',				
				"vi" => '',				
				"co" => '',
				"color" => '',
				"size" => '',
				"margin" => ''							
				), 
				$atts)
	);
    
	$return = '<style type="text/css">
	.ad-social-link a {
		color:'.$color.';
		margin:'.$margin.';
		font-size:'.$size.'!important;
	}
	</style>
	';
	
	$return .= '<div class="ad-social-link adtheme-icon">';
	
	if($fb != '') {
        	$return .= '<span class="ad-fb"><a class="icon-facebook2" href="'.$fb.'"></a></span>';
	}
	if($tw != '') {
        	$return .= '<span class="ad-tw"><a class="icon-twitter" href="'.$tw.'"></a></span>';
	}
	if($in != '') {
        	$return .= '<span class="ad-in"><a class="icon-linkedin" href="'.$in.'"></a></span>';
	}	
	if($gplus != '') {
        	$return .= '<span class="ad-gplus"><a class="icon-googleplus2" href="'.$gplus.'"></a></span>';
	}
	if($pi != '') {
        	$return .= '<span class="ad-pi"><a class="icon-pinterest2" href="'.$pi.'"></a></span>';
	}	
	if($yt != '') {
        	$return .= '<span class="ad-yt"><a class="icon-youtube" href="'.$yt.'"></a></span>';
	}
	if($fl != '') {
        	$return .= '<span class="ad-fl"><a class="icon-flickr2" href="'.$yt.'"></a></span>';
	}	
	if($tu != '') {
        	$return .= '<span class="ad-tu"><a class="icon-tumblr2" href="'.$tu.'"></a></span>';
	}
	if($rss != '') {
        	$return .= '<span class="ad-rss"><a class="icon-feed3" href="'.$rss.'"></a></span>';
	}
	if($vi != '') {
        	$return .= '<span class="ad-vimeo"><a class="icon-vimeo2" href="'.$vi.'"></a></span>';
	}		
	if($co != '') {
        	$return .= '<span class="ad-co"><a class="icon-mail2" href="mailto'.$co.'"></a></span>';
	}
	$return .= '</div>';				
	return $return;
} 

add_shortcode("adop_social_link", "adop_social_link");

function adop_social_share($atts, $content = null)
{
    extract(
		shortcode_atts(
			array(
				"fb" => 'yes',
				"tw" => 'yes',
				"in" => 'yes', 
				"gplus" => 'yes', 
				"pi" => 'yes',
				"color" => '',
				"size" => '',
				"margin" => ''							
				), 
				$atts)
	);
	$return = '<style type="text/css">
	.ad-social-share a {
		color:'.$color.'!important;
		margin:'.$margin.';
		font-size:'.$size.'!important;
	}
	</style>
	';
	    
	$return .= '<div class="ad-social-share adtheme-icon">';

	global $post;
	$pinterestimage = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
	
	
    	if($fb == 'yes') {	
		
		$return .= '<a target="_blank" class="icon-facebook2" href="http://www.facebook.com/sharer.php?u='.get_permalink().'&amp;t='.get_the_title().'" title="'.__('Click to share this post on Facebook','adt').'"></a>';
		
		}
		if($tw == 'yes') {	
		
		$return .= '<a target="_blank" class="icon-twitter" href="http://twitter.com/home?status='.get_permalink().'" title="'. __('Click to share this post on Twitter','adt').'"></a>';
        
		}
		if($in == 'yes') {		
		
		$return .= '<a target="_blank" class="icon-googleplus2" href="https://plus.google.com/share?url='.get_permalink().'" title="'. __('Click to share this post on Google+','adt').'"></a>';

		}
		if($gplus == 'yes') {

        $return .= '<a target="_blank" class="icon-linkedin2" href="http://www.linkedin.com/shareArticle?mini=true&amp;url='.get_permalink().'" title="'. __('Click to share this post on Linkedin','adt').'"></a>';

		}
		if($pi == 'yes') {

    	$return .= '<a target="_blank" class="icon-pinterest2" href="http://pinterest.com/pin/create/button/?url='.urlencode(get_permalink($post->ID)).'&media='.$pinterestimage[0].'&description='.get_the_title().'" title="'. __('Click to share this post on Pinterest','adt').'"></a>';

		}

		$return .= '</div>';
				
	return $return;
} 

add_shortcode("adop_social_share", "adop_social_share");



?>