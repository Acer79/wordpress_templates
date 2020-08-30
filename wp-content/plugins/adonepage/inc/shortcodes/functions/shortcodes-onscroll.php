<?php
/*
File: inc/shortcodes-onscroll.php
Description: Shortocodes Functions
Plugin: ADTHEME SHORTCODES
Author: Ad-theme.com
*/

function adop_onscroll($atts, $content = null)
{
    extract(
		shortcode_atts(
			array(
				"number" => '4',
				"category" => ''), 
				$atts)
	);
	global $post;
		$return = '';
     	$return .= '<script>
			jQuery(document).ready(function($){
				new cbpScroller( document.getElementById( \'cbp-so-scroller\' ) );
			});
		</script>';
		$return .= '<div id="cbp-so-scroller" class="cbp-so-scroller">';
		$query = 'post_type=Post&posts_per_page='.$number.'&post_status=publish';
		$query .= '&category_name='.$category.'';
		
		$loop = new WP_Query($query);
		if($loop) { 
		while ( $loop->have_posts() ) : $loop->the_post();
		// ADD FIX FOR MULTIPLE CATEGORIES
		$categories = get_the_category();
		$return .= '<section class="cbp-so-section"><article class="cbp-so-side cbp-so-side-left">';
		$return .= '<h2>'.get_the_title().'</h2>';
		$return .= '<p>'.substr(get_the_excerpt(), 0, 400).'<p>';
		$return .= '</article>';
		$return .= '<figure class="cbp-so-side cbp-so-side-right">';
		$return .= get_the_post_thumbnail($post->ID,'adtheme_shortcodes_size_600' );
		$return .= '</figure>';
		$return .= '</section>';
		endwhile;
		}
		$return .= '</div>';
		
		
        return wpautop($return);
} 

add_shortcode("adop_onscroll", "adop_onscroll");

function adop_onscroll_single($atts, $content = null)
{
    extract(
		shortcode_atts(
			array(
				"type" => 'text_image',
				"title" => '',
				"text" => '',
				"image" => ''
				), 
				$atts)
	);
		$random = rand(1,15000);
		$return = '';
     	$return .= '<script>
			jQuery(document).ready(function($){
				new cbpScroller( document.getElementById( \'cbp-so-scroller'.$random.'\' ) );
			});
		</script>';
		$return .= '<div id="cbp-so-scroller'.$random.'" class="cbp-so-scroller">';
		$return .= '<section class="cbp-so-section">';
		if($type == 'text_image') {
			$return .= '<article class="cbp-so-side cbp-so-side-left">';
			$return .= '<h2>'.$title.'</h2>';
			$return .= '<p>'.$text.'<p>';
			$return .= '</article>';
			$return .= '<figure class="cbp-so-side cbp-so-side-right">';
			$return .= '<img src="'.$image.'">';
			$return .= '</figure>';
		} else {
			$return .= '<figure class="cbp-so-side cbp-so-side-left">';
			$return .= '<img src="'.$image.'">';
			$return .= '</figure>';			
			$return .= '<article class="cbp-so-side cbp-so-side-right">';
			$return .= '<h2>'.$title.'</h2>';
			$return .= '<p>'.$text.'<p>';
			$return .= '</article>';
		}
		$return .= '</section>';
		$return .= '</div>';
		
		
        return wpautop($return);
} 

add_shortcode("adop_onscroll_single", "adop_onscroll_single");

function adop_onscroll_single_left($atts, $content = null)
{
		$random = rand(1,15000);
		$return = '';
     	$return .= '<script>
			jQuery(document).ready(function($){
				new cbpScroller( document.getElementById( \'cbp-so-scroller'.$random.'\' ) );
			});
		</script>';
		$return .= '<div id="cbp-so-scroller'.$random.'" class="cbp-so-scroller custom">';
		$return .= '<section class="cbp-so-section">';
		$return .= '<article class="cbp-so-side cbp-so-side-left">';
		$return .= do_shortcode($content);
		$return .= '</article>';
		
        return wpautop($return);
} 

add_shortcode("adop_onscroll_single_left", "adop_onscroll_single_left");			



function adop_onscroll_single_right($atts, $content = null)
{
	
		$return = '<article class="cbp-so-side cbp-so-side-right">';
		$return .= do_shortcode($content);
		$return .= '</article>';		
		$return .= '</section>';
		$return .= '</div>';
		
        return wpautop($return);
} 

add_shortcode("adop_onscroll_single_right", "adop_onscroll_single_right");		
?>