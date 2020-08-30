<?php
/*
File: inc/shortcodes-lists.php
Description: Shortocodes Functions
Plugin: ADTHEME SHORTCODES
Author: Ad-theme.com
*/

function list_check($attr,$content){
          return '<ul class="adtheme_list adtheme-icon">'.do_shortcode($content).'</ul>';
}
add_shortcode("list_check","list_check");

function li_field($attr,$content){
		  $type  = $attr['type'];
		  $color = $attr['color'];
          return '<li><i class="'.$type.'" style="color:'.$color.';"></i>'.do_shortcode($content).'</li>';
}
add_shortcode("li_field","li_field");