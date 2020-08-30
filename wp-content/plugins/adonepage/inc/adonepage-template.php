<?php
/*
File: inc/tpl/page-books.php
Template Name: AD ONE PAGE
Description: Page TPL for ONE PAGE
Plugin: AD ONE PAGE
Author: Ad-theme.com
*/
require('functions-style.php');
require('functions-seo.php');
require('functions-menu.php');
require('functions-block.php');
require('functions-footer.php');
require('functions-custom-css-js.php');
while (have_posts()) : the_post(); 

// LOAD ID ONE PAGE
$ad_onepage_id = get_post_meta( $id, '_ad_onepage_id', true );
// LOAD GROUP NAME
$group_data = get_post_meta( $ad_onepage_id, 'gp', false );


// LOAD METABOX
$favicon_id = get_post_meta( $ad_onepage_id, 'adonepage-favicon', true );
$favicon = wp_get_attachment_image_src( $favicon_id );
$font_family_string = get_post_meta( $ad_onepage_id, 'font-family', true );

// FOOTER
$footer_active = get_post_meta( $ad_onepage_id, 'footer-active', true );
// ANALYTICS
$analytics = get_post_meta( $ad_onepage_id, 'analytics', true );
?>
<!DOCTYPE html>

<html>

<head> 

    <meta charset="<?php bloginfo('charset'); ?>"/>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>"/>
    
    <!-- FAVICON -->
	<link rel="shortcut icon" href="<?php echo $favicon[0]; ?>">
    <!-- END FAVICON -->
    <?php 
	
	/* SEO */
	
	adonepage_seo($ad_onepage_id); 
	
	?>
    <link href='http://fonts.googleapis.com/css?family=<?php echo $font_family_string; ?>' rel='stylesheet' type='text/css'>
	<?php 
		// LOAD FUNCTION STYLE
		adonepage_style($ad_onepage_id, $group_data);
		
		// CUSTOM FUNCTION
		adonepage_custom_css_js($ad_onepage_id);
		/* WP HEAD */
		
		wp_head(); 
	?>
</head>
<body id="adonepage" <?php body_class(); ?> class="<?php echo get_post_permalink( $ad_onepage_id ); ?>">

<?php 

/* MENU */

adonepage_menu($ad_onepage_id, $group_data); 

?>

<?php 

/* BLOCK */

adonepage_block($ad_onepage_id, $group_data); 

?>

<?php

/* FOOTER */
if($footer_active == 'on') {
	adonepage_footer($ad_onepage_id);
}
?>	
    
    <?php endwhile; ?>
    <?php echo $analytics; ?>
    <?php wp_footer(); ?>
</body>
</html>