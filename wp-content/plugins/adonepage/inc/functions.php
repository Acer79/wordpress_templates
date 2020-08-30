<?php
/*
File: inc/functions.php
Description: Functions
Plugin: AD ONE PAGE
Author: Ad-theme.com
*/

//first register the column
add_filter('manage_adonepage_posts_columns', 'adonepage_columns');
function adonepage_columns($defaults){
    $defaults['Shortcode'] = __('Shortcode');
    return $defaults;
}
 
//then you need to render the column
add_action('manage_adonepage_posts_custom_column', 'adonepage_custom_columns', 5, 2);
function adonepage_custom_columns($column_name, $post_id){
    if($column_name === 'Shortcode'){
        echo get_post_meta($post_id,'_ad_postpreview_shortcode_name', true);
    }
}

add_filter('manage_edit-adonepage_columns', 'add_new_adonepage_columns');

function add_new_adonepage_columns($gallery_columns) {
    $new_columns['cb'] = '<input type="checkbox" />';
    $new_columns['title'] = _x('Preview Name', 'column name');
    $new_columns['Shortcode'] = _x('Shortcode', 'column name');
    $new_columns['date'] = _x('Date', 'column name');
 
    return $new_columns;
}


add_filter('widget_text', 'do_shortcode');
function adonepagehex2rgb($hex) {

   $hex = str_replace("#", "", $hex);

if(strlen($hex) == 3) {
		$r = hexdec(substr($hex,0,1).substr($hex,0,1));
		$g = hexdec(substr($hex,1,1).substr($hex,1,1));
		$b = hexdec(substr($hex,2,1).substr($hex,2,1));
	} else {
		$r = hexdec(substr($hex,0,2));
		$g = hexdec(substr($hex,2,2));
		$b = hexdec(substr($hex,4,2));
	}
	$rgb = array($r, $g, $b);
	//return implode(",", $rgb); // returns the rgb values separated by commas
	return $rgb; // returns an array with the rgb values
}

function adonepage_get_first_image() {
	global $post, $posts;
  	$first_img = '';
  	ob_start();
  	ob_end_clean();
  	$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
	if($output == '1') {
  	$first_img = $matches[1][0];
	}
  	if(empty($first_img)){ //Defines a default image
    	$first_img = WP_PLUGIN_URL . '/adonepage/assets/img/no-img.png';
  	}
	//echo $first_img;
  	return $first_img;
}

function adonepage_tag() {
	$posttags = get_the_tags();
	echo '<span class="icon-tags-2"></span>';
	if ($posttags) {
	  foreach($posttags as $tag) {
		echo '<a href="'.get_tag_link($tag->term_id).'">';  
		echo $tag->name . ' '; 
		echo '</a>';
	  }
	}
}

function adonepage_category($img_source) {
	if($img_source=='post') {
		$categories = get_the_category();
		$separator = ', ';
		$output = '';
		echo '<img src="'.adonepage_URL.'assets/img/category.png" alt="category" >';
		if($categories){
			foreach($categories as $category) {
				$output .= '<a href="'.get_category_link( $category->term_id ).'" title="' . esc_attr( sprintf( __( "View all posts in %s",'adt' ), $category->name ) ) . '">'.$category->cat_name.'</a>'.$separator;
			}
			echo trim($output, $separator);
		}
	}
	if($img_source=='woocommerce') {	
		$cat_array = wp_get_post_terms( get_the_ID(), 'product_cat');
		$cat_list = '';
		$cat_list2 = array();
		$separator = ', ';
		$output = '';
		echo '<img src="'.adonepage_URL.'assets/img/category.png" alt="category" >';
		foreach ( $cat_array as $category ) {
			$cat_list .= $category->slug.' ';
			$cat_list2[] = $category->name;
			$output .= '<a href="'.get_term_link( $category, 'product_cat').'" title="' . esc_attr( sprintf( __( "View all posts in %s",'adt' ), $category->name ) ) . '">'.$category->name.'</a>'.$separator;
		}	
	    echo trim($output, $separator);
	}
	if($img_source=='wp-ecommerce') {	
		$cat_array = wp_get_post_terms( get_the_ID(), 'wpsc_product_category');
		$cat_list = '';
		$cat_list2 = array();
		$separator = ', ';
		$output = '';
		echo '<img src="'.adonepage_URL.'assets/img/category.png" alt="category" >';
		foreach ( $cat_array as $category ) {
			$cat_list .= $category->slug.' ';
			$cat_list2[] = $category->name;
			$output .= '<a href="'.get_term_link( $category, 'wpsc_product_category').'" title="' . esc_attr( sprintf( __( "View all posts in %s",'adt' ), $category->name ) ) . '">'.$category->name.'</a>'.$separator;
		}	
	    echo trim($output, $separator);
	}
	if($img_source=='jigoshop') {	
		$cat_array = wp_get_post_terms( get_the_ID(), 'product_cat');
		$cat_list = '';
		$cat_list2 = array();
		$separator = ', ';
		$output = '';
		echo '<img src="'.adonepage_URL.'assets/img/category.png" alt="category" >';
		foreach ( $cat_array as $category ) {
			$cat_list .= $category->slug.' ';
			$cat_list2[] = $category->name;
			$output .= '<a href="'.get_term_link( $category, 'product_cat').'" title="' . esc_attr( sprintf( __( "View all posts in %s",'adt' ), $category->name ) ) . '">'.$category->name.'</a>'.$separator;
		}	
	    echo trim($output, $separator);
	}		
	if($img_source=='post_cat') {	
		$cat_array = wp_get_post_terms( get_the_ID(), 'adonepage_post_cat');
		$cat_list = '';
		$cat_list2 = array();
		$separator = ', ';
		$output = '';
		echo '<img src="'.adonepage_URL.'assets/img/category.png" alt="category" >';
		foreach ( $cat_array as $category ) {
			$cat_list .= $category->slug.' ';
			$cat_list2[] = $category->name;
			$output .= '<a href="'.get_term_link( $category, 'adonepage_post_cat').'" title="' . esc_attr( sprintf( __( "View all posts in %s",'adt' ), $category->name ) ) . '">'.$category->name.'</a>'.$separator;
		}	
	    echo trim($output, $separator);
	}		
}
function adonepage_first_category() {
	$categories = get_the_category();	
	echo $categories[0]->name;
}

function adonepage_format_icon() {
	$id_post = get_the_id(); 
    $format = get_post_format( $id_post );   
    if (empty($format)) { $format = 'standard'; }
	if ($format == 'standard') { echo '<span class="standard icon-file-3"></span>'; } 
    if ($format == 'gallery') { echo '<span class="gallery icon-images"></span>'; }
    if ($format == 'video') { echo '<span class="video icon-youtube-play"></span>'; }
    if ($format == 'audio') { echo '<span class="audio icon-headphones-2"></span>'; }
    if ($format == 'image') { echo '<span class="image icon-image-2"></span>'; } 
}

function adonepage_post_info(	$ad_postpreview_display_date,
					  	$ad_postpreview_display_comments,
						$ad_postpreview_display_author,
						$ad_postpreview_display_category,
						$ad_postpreview_display_views,
						$img_source	) { ?>		   

		   <?php 
		   if($ad_postpreview_display_date == 'true') {
		   
		   echo '<span class="date"><img src="'.adonepage_URL.'assets/img/date.png" alt="date" >' . get_the_date('m/d/Y') . '</span>'; 
			
		   } ?>
           
		   <?php 
		   if($ad_postpreview_display_comments == 'true') {	?>
           	   
           <span class="comment"><img src="<?php echo adonepage_URL; ?>assets/img/comments.png" alt="comment" ><a href="<?php comments_link(); ?>"><?php comments_number(); ?></a></span>
		   
           <?php } ?>		   
		   
		   <?php 
		   if($ad_postpreview_display_author == 'true') {	   
		   echo '<span class="author"><img src="'.adonepage_URL.'assets/img/author.png" alt="author" >'; 
		   echo the_author_posts_link();
		   echo '</span>'; 
		   } 
		   ?>
 		   <?php 
		   if($ad_postpreview_display_category == 'true') {
		   echo '<span class="category">'; 
 				ad_category($img_source); 
		   echo '</span>'; 
		   }
		   ?> 
           <?php 
		   if($ad_postpreview_display_views == 'true') { ?>         
		   <span class="view-post"><img src="<?php echo adonepage_URL;?>assets/img/visited.png" alt="read more" class="visited"><?php echo adonepage_get_post_views(get_the_ID()); ?></span>
		   <?php } ?>
		   <?php	
		   
}

function adonepage_share() {
	global $post;
	$pinterestimage = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
	
	?>	
	<ul class="share">
        <li><a target="_blank" class="icon-facebook" href="http://www.facebook.com/sharer.php?u=<?php the_permalink();?>&amp;t=<?php the_title(); ?>" title="<?php __('Click to share this post on Facebook','adt'); ?>"></a></li>
		<li><a target="_blank" class="icon-twitter" href="http://twitter.com/home?status=<?php the_permalink(); ?>" title="<?php __('Click to share this post on Twitter','adt'); ?>"></a></li>
        <li><a target="_blank" class="icon-google-plus" href="https://plus.google.com/share?url=<?php the_permalink(); ?>" title="<?php __('Click to share this post on Google+','adt'); ?>"></a></li>
        <li><a target="_blank" class="icon-linkedin" href="http://www.linkedin.com/shareArticle?mini=true&amp;url=<?php the_permalink(); ?>" title="<?php __('Click to share this post on Linkedin','adt'); ?>"></a></li>
    	<li><a target="_blank" class="icon-pinterest" href="http://pinterest.com/pin/create/button/?url=<?php echo urlencode(get_permalink($post->ID)); ?>&media=<?php echo $pinterestimage[0]; ?>&description=<?php the_title(); ?>" title="<?php __('Click to share this post on Pinterest','adt'); ?>"></a></li>
    </ul>
	
    <?php
    
}

remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

function adonepage_get_post_views($postID){
    $count_key = 'wpb_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
		$view = __('Views','adt');
        return "0";
    }
	//$views = __('Views','adt');
	$count_final = $count; 
	//$count_final .= ' ' . $views;
    return $count_final;
}

function adonepage_set_post_views() {
	if ( is_single() ) {
	global $post;
	$postID = $post->ID;	
    $count_key = 'wpb_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
	}
}
add_filter( 'wp_footer', 'adonepage_set_post_views', 200000 );


add_action( 'wp_head', 'mp6_override_toolbar_margin', 11 );
function mp6_override_toolbar_margin() {
	if ( is_admin_bar_showing() ) { ?>
		<style type="text/css" media="screen">
			html { margin-top: 0px !important; }
			* html body { margin-top: 0px !important; }
		</style>
	<?php }
}

/* MENU */
if (!function_exists('adonepage_setup')):

    function adonepage_setup() {
		register_nav_menus(
		array(
			'adonepage-menu' => __('AD One Page Menu', 'adonepage')
		)
		);
		$adonepage_number_menu = get_option( 'adonepage_number_menu', '' );
		if(!empty($adonepage_number_menu)) {
			for($i=1;$i<=$adonepage_number_menu;$i++) {
			
				register_nav_menus(
					array(
						'adonepage-menu-'.$i.'' => __('AD One Page Menu '.$i.'', 'adonepage')
					)
				);
					
				
			}
		}
		
		
		
	register_sidebar(
			array(
				'name'          => __('ADONEPAGE FOOTER 1', 'adonepage'),
				'id'            => 'adonapage-footer-1',
            	'description'   => __('Adonepage footer 1', 'adonepage'),				
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => "</div>",
				'before_title'  => '<h4 class="widget-title">',
				'after_title'   => '</h4>',
			)			
   	);
    register_sidebar(
        array(
            'name'          => __('ADONEPAGE FOOTER 2', 'adonepage'),
            'id'            => 'adonapage-footer-2',
            'description'   => __('Adonepage footer 2', 'adonepage'),			
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => "</div>",
            'before_title'  => '<h4 class="widget-title">',
            'after_title'   => '</h4>',
        )
		
    );    register_sidebar(
		array(
			'name'          => __('ADONEPAGE FOOTER 3', 'adonepage'),
            'id'            => 'adonapage-footer-3',
            'description'   => __('Adonepage footer 3', 'adonepage'),			
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => "</div>",
            'before_title'  => '<h4 class="widget-title">',
            'after_title'   => '</h4>',
        )
    );

    register_sidebar(
        array(
            'name'          => __('ADONEPAGE FOOTER 4', 'adonepage'),
            'id'            => 'adonapage-footer-4',
            'description'   => __('Adonepage footer 4', 'adonepage'),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => "</div>",
            'before_title'  => '<h4 class="widget-title">',
            'after_title'   => '</h4>'
        )
    );	
	}
endif;
add_action('after_setup_theme', 'adonepage_setup'); 
?>