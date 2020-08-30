<?php
/*
File: inc/shortcodes-columns.php
Description: Shortocodes Functions
Plugin: ADTHEME SHORTCODES
Author: Ad-theme.com
*/

function ad_one_third( $atts, $content = null ) {
    return '<div class="ad_one_third">' . do_shortcode($content) . '</div>';
}
add_shortcode('ad_one_third', 'ad_one_third');
     
function ad_one_third_last( $atts, $content = null ) {
    return '<div class="ad_one_third last">' . do_shortcode($content) . '</div><div class="clearboth"></div>';
}
add_shortcode('ad_one_third_last', 'ad_one_third_last');
     
function ad_two_third( $atts, $content = null ) {
    return '<div class="ad_two_third">' . do_shortcode($content) . '</div>';
}
add_shortcode('ad_two_third', 'ad_two_third');
     
function ad_two_third_last( $atts, $content = null ) {
    return '<div class="ad_two_third last">' . do_shortcode($content) . '</div><div class="clearboth"></div>';
}
add_shortcode('ad_two_third_last', 'ad_two_third_last');
     
function ad_one_half( $atts, $content = null ) {
    return '<div class="ad_one_half">' . do_shortcode($content) . '</div>';
}
add_shortcode('ad_one_half', 'ad_one_half');
     
function ad_one_half_last( $atts, $content = null ) {
    return '<div class="ad_one_half last">' . do_shortcode($content) . '</div><div class="clearboth"></div>';
}
add_shortcode('ad_one_half_last', 'ad_one_half_last');
     
function ad_one_fourth( $atts, $content = null ) {
    return '<div class="ad_one_fourth">' . do_shortcode($content) . '</div>';
}
add_shortcode('ad_one_fourth', 'ad_one_fourth');
     
function ad_one_fourth_last( $atts, $content = null ) {
    return '<div class="ad_one_fourth last">' . do_shortcode($content) . '</div><div class="clearboth"></div>';
}
add_shortcode('ad_one_fourth_last', 'ad_one_fourth_last');
     
function ad_three_fourth( $atts, $content = null ) {
    return '<div class="ad_three_fourth">' . do_shortcode($content) . '</div>';
}
add_shortcode('ad_three_fourth', 'ad_three_fourth');
     
function ad_three_fourth_last( $atts, $content = null ) {
    return '<div class="ad_three_fourth last">' . do_shortcode($content) . '</div><div class="clearboth"></div>';
}
add_shortcode('ad_three_fourth_last', 'ad_three_fourth_last');
     
function ad_one_fifth( $atts, $content = null ) {
    return '<div class="ad_one_fifth">' . do_shortcode($content) . '</div>';
}
add_shortcode('ad_one_fifth', 'ad_one_fifth');
     
function ad_one_fifth_last( $atts, $content = null ) {
    return '<div class="ad_one_fifth last">' . do_shortcode($content) . '</div><div class="clearboth"></div>';
}
add_shortcode('ad_one_fifth_last', 'ad_one_fifth_last');
     
function ad_two_fifth( $atts, $content = null ) {
    return '<div class="ad_two_fifth">' . do_shortcode($content) . '</div>';
}
add_shortcode('ad_two_fifth', 'ad_two_fifth');
     
function ad_two_fifth_last( $atts, $content = null ) {
    return '<div class="ad_two_fifth last">' . do_shortcode($content) . '</div><div class="clearboth"></div>';
}
add_shortcode('ad_two_fifth_last', 'ad_two_fifth_last');
     
function ad_three_fifth( $atts, $content = null ) {
    return '<div class="ad_three_fifth">' . do_shortcode($content) . '</div>';
}
add_shortcode('ad_three_fifth', 'ad_three_fifth');
     
function ad_three_fifth_last( $atts, $content = null ) {
    return '<div class="ad_three_fifth last">' . do_shortcode($content) . '</div><div class="clearboth"></div>';
}
add_shortcode('ad_three_fifth_last', 'ad_three_fifth_last');
     
function ad_four_fifth( $atts, $content = null ) {
    return '<div class="ad_four_fifth">' . do_shortcode($content) . '</div>';
}
add_shortcode('ad_four_fifth', 'ad_four_fifth');
     
function ad_four_fifth_last( $atts, $content = null ) {
    return '<div class="ad_four_fifth last">' . do_shortcode($content) . '</div><div class="clearboth"></div>';
}
add_shortcode('ad_four_fifth_last', 'ad_four_fifth_last');
     
function ad_one_sixth( $atts, $content = null ) {
    return '<div class="ad_one_sixth">' . do_shortcode($content) . '</div>';
}
add_shortcode('ad_one_sixth', 'ad_one_sixth');
     
function ad_one_sixth_last( $atts, $content = null ) {
    return '<div class="ad_one_sixth last">' . do_shortcode($content) . '</div><div class="clearboth"></div>';
}
add_shortcode('ad_one_sixth_last', 'ad_one_sixth_last');
     
function ad_five_sixth( $atts, $content = null ) {
    return '<div class="ad_five_sixth">' . do_shortcode($content) . '</div>';
}
add_shortcode('ad_five_sixth', 'ad_five_sixth');
     
function ad_five_sixth_last( $atts, $content = null ) {
    return '<div class="ad_five_sixth last">' . do_shortcode($content) . '</div><div class="clearboth"></div>';
}
add_shortcode('ad_five_sixth_last', 'ad_five_sixth_last');

?>