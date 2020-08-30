<?php
/*
File: inc/widget-mega-posts.php
Description: Widget Mega Posts
Plugin: AD ONE PAGE
Author: Ad-theme.com
*/
 
add_action( 'widgets_init', 'mega_posts_widgets' );
function mega_posts_widgets() {
	register_widget('AD_Widget_Mega_Posts');
}
 
class AD_Widget_Mega_Posts extends WP_Widget {
	function __construct() {
		$widget_ops = array('classname' => 'widget_mega_entries', 'description' => 'Display your posts as you want!' );
		parent::__construct('mega-posts', 'AD Mega Posts', $widget_ops);
		$this->alt_option_name = 'widget_mega_entries';
		add_action( 'save_post', array(&$this, 'flush_widget_cache') );
		add_action( 'deleted_post', array(&$this, 'flush_widget_cache') );
		add_action( 'switch_theme', array(&$this, 'flush_widget_cache') );
	}
	function widget($args, $instance) {
		$cache = wp_cache_get('widget_mega_posts', 'widget');
		if ( !is_array($cache) )
			$cache = array();
		if ( ! isset( $args['widget_id'] ) )
			$args['widget_id'] = $this->id;
		if ( isset( $cache[ $args['widget_id'] ] ) ) {
			echo $cache[ $args['widget_id'] ];
			return;
		}
		ob_start();
		extract($args);
		$title = apply_filters('widget_title', empty($instance['title']) ? 'Mega Posts' : $instance['title'], $instance, $this->id_base);
		if ( empty( $instance['number'] ) || ! $number = absint( $instance['number'] ) ) {
 			$number = 5;
		}
		
		if ( !empty( $instance['orderby'] ) ) {
 			$orderby = $instance['orderby'];
			
		}else{
			
			$orderby = 'none';
			
		}
		
		if ( !empty( $instance['orderdir'] ) ) {
 			$orderdir = $instance['orderdir'];
			
		}else{
			
			$orderdir = 'DESC';
			
		}
		
		if ( !empty( $instance['cat_filter'] ) ) {
 			$cat_filter = $instance['cat_filter'];
			
		}else{
			
			$cat_filter = '0';
			
		}

		$r = new WP_Query( apply_filters( 'widget_posts_args', array( 'posts_per_page' => $number, 'no_found_rows' => true, 'post_status' => 'publish', 'ignore_sticky_posts' => true, 'category__in' => $cat_filter, 'meta_key' => 'wpb_post_views_count', 'orderby' => $orderby, 'order' => $orderdir ) ) );
		if ($r->have_posts()) :
?>
		<?php echo $before_widget; ?>
		<?php if ( $title ) echo $before_title . $title . $after_title; ?>
		<div class="mega-posts">
        <ul>
		<?php  while ($r->have_posts()) : $r->the_post(); ?>
		
        <?php 		
		$id_post = get_the_id();
		$format = get_post_format( $id_post );
		if (empty($format)) { $format = 'standard'; }
		switch  ($format) {
			
			case 'image':
			$format_url = get_template_directory_uri().'/assets/img/widget-image.png';
			break;
			
			case 'standard':
			$format_url = get_template_directory_uri().'/assets/img/widget-standard.png';
			break;
			
			case 'gallery':
			$format_url = get_template_directory_uri().'/assets/img/widget-gallery.png';
			break;
			
			case 'link':
			$format_url = get_template_directory_uri().'/assets/img/widget-link.png';
			break;
			
			case 'video':
			$format_url = get_template_directory_uri().'/assets/img/widget-video.png';
			break;
			
			case 'audio':
			$format_url = get_template_directory_uri().'/assets/img/widget-audio.png';
			break;
	
		}
		
		?>
        <?php echo '<li>'; ?>
        
		<?php if (has_post_thumbnail() ) { ?>
		
        <div class="mega-thumb">
		<a href="<?php the_permalink() ?>" title="<?php echo esc_attr(get_the_title() ? get_the_title() : get_the_ID()); ?>"><?php the_post_thumbnail('adonepage_mega_post'); ?></a>
		</div>	
        
		<?php } ?>
        
        <div class="mega-info">
        <div class="mega-title">
        <a href="<?php the_permalink() ?>" title="<?php echo esc_attr(get_the_title() ? get_the_title() : get_the_ID()); ?>">		
		<?php if ( get_the_title() ) the_title(); else the_ID(); ?>
        </a>
		</div>
		
		<?php if ( get_the_date() ) { ?>
        
        <div class="mega-date">
        <?php echo get_the_date('M d, Y'); ?>
        </div>
        
        <?php } ?>
        
        
        <div class="mega-numbers adtheme-icon">
        <span class="icon-bubble"></span> <?php comments_number('0','1','%'); ?> 
        <span class="icon-eye"></span> <?php echo adonepage_get_post_views(get_the_ID()); ?>
        </div>
        
        
		</div>
        
        <div class="clearfix"></div>
        
        </li>
		<?php endwhile; ?>
        </ul>
		</div>
		<?php echo $after_widget; ?>
<?php
		// Reset the global $the_post as this query will have stomped on it
		wp_reset_postdata();
		endif;
		$cache[$args['widget_id']] = ob_get_flush();
		wp_cache_set('widget_mega_posts', $cache, 'widget');
	}
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['number'] = (int) $new_instance['number'];
		
		$instance['cat_filter'] = $new_instance['cat_filter'];
		
		$instance['orderby'] = $new_instance['orderby'];
		
		$instance['orderdir'] = $new_instance['orderdir'];
		$this->flush_widget_cache();
		$alloptions = wp_cache_get( 'alloptions', 'options' );
		if ( isset($alloptions['widget_mega_entries']) )
			delete_option('widget_mega_entries');
		return $instance;
	}
	function flush_widget_cache() {
		wp_cache_delete('widget_mega_posts', 'widget');
	}
	function form( $instance ) {
		$title = isset($instance['title']) ? esc_attr($instance['title']) : '';
		$number = isset($instance['number']) ? absint($instance['number']) : 5;
		
		$cat_filter = isset($instance['cat_filter']) ? $instance['cat_filter'] : '0';
		
		$orderby = isset($instance['orderby']) ? $instance['orderby'] : 'none';
		
		$orderdir = isset($instance['orderdir']) ? $instance['orderdir'] : 'DESC';
?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php echo 'Title:'; ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></p>
		<p><label for="<?php echo $this->get_field_id('number'); ?>"><?php echo 'Number of posts to show:'; ?></label>
		<input id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo $number; ?>" size="3" /></p>
        
       
        <p><label for="<?php echo $this->get_field_id('cat_filter'); ?>"><?php echo 'Filter posts by category:'; ?></label>
       
        <?php $categories = get_categories(array('orderby' => 'name','order' => 'ASC')); ?>
        
		       
        
        <select multiple="multiple" id="<?php echo $this->get_field_id( 'cat_filter' ); ?>" name="<?php echo $this->get_field_name( 'cat_filter' ).'[]'; ?>" class="widefat">
        <?php foreach ($categories as $category) {  ?>
        <?php echo $cat_filter;?>
        <option <?php if ( $cat_filter && in_array($category->term_id, $cat_filter) ){echo 'selected="selected"';} ?> value="<?php echo $category->term_id; ?>"><?php echo $category->name; ?></option>
		<?php } ?>
		</select>
      
        
        </p>
        
        <p><label for="<?php echo $this->get_field_id('orderby'); ?>"><?php echo 'Order posts by:'; ?></label>
		<select id="<?php echo $this->get_field_id( 'orderby' ); ?>" name="<?php echo $this->get_field_name( 'orderby' ); ?>" class="widefat">
            <option <?php if ($orderby == 'none' ){echo 'selected="selected"';} ?> value="none">No order</option>
            <option <?php if ($orderby == 'comment_count' ){echo 'selected="selected"';} ?> value="comment_count">Comment Count</option>
            <option <?php if ($orderby == 'meta_value_num' ){echo 'selected="selected"';} ?> value="meta_value_num">Post Views</option>
            <option <?php if ($orderby == 'date' ){echo 'selected="selected"';} ?> value="date">Creation Date</option>
            <option <?php if ($orderby == 'modified' ){echo 'selected="selected"';} ?> value="modified">Edit Date</option>
            <option <?php if ($orderby == 'title' ){echo 'selected="selected"';} ?> value="title">Title</option>
            <option <?php if ($orderby == 'rand' ){echo 'selected="selected"';} ?> value="rand">Random</option>
        </select>
        </p>
        
        <p><label for="<?php echo $this->get_field_id('orderdir'); ?>"><?php echo 'Order direction:'; ?></label>
		<select id="<?php echo $this->get_field_id( 'orderdir' ); ?>" name="<?php echo $this->get_field_name( 'orderdir' ); ?>" class="widefat">
            <option <?php if ($orderdir == 'ASC' ){echo 'selected="selected"';} ?> value="ASC">Ascending order </option>
            <option <?php if ($orderdir == 'DESC' ){echo 'selected="selected"';} ?> value="DESC">Descending order</option>
        </select>
        </p>
<?php
	}
}
?>