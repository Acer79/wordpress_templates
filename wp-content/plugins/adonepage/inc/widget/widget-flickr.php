<?php
/*
File: inc/widget-flickr.php
Description: Widget Flickr
Plugin: AD ONE PAGE
Author: Ad-theme.com
*/


add_action( 'widgets_init', 'ad_flickr_widget' );

function ad_flickr_widget() {

	register_widget( 'ad_flickr' );

}

class ad_flickr extends WP_Widget {



	function __construct() {

		$widget_ops = array( 'classname' => 'flickr-widget' );

		$control_ops = array( 'width' => 250, 'height' => 350, 'id_base' => 'flickr_widget' );

		$this->WP_Widget( 'flickr_widget','AD Flickr', $widget_ops, $control_ops );

	}

	

	function widget( $args, $instance ) {

		extract( $args );



		$flickr_title = apply_filters('widget_flickr_title', $instance['flickr_title'] );

		$no_of_photos = $instance['no_of_photos'];

		$flickr_id = $instance['flickr_id'];

		$flickr_display = $instance['flickr_display'];



		echo $before_widget;

		if ( $flickr_title )

			echo $before_title;

			echo $flickr_title ; ?>

		<?php echo $after_title; ?>
        
		<div class="clear"></div>
        
		<script type="text/javascript" src="http://www.flickr.com/badge_code_v2.gne?count=<?php echo $no_of_photos; ?>&amp;display=<?php echo $flickr_display; ?>&amp;size=s&amp;layout=y&amp;source=user&amp;user=<?php echo $flickr_id; ?>"></script>        

		<div class="clear"></div>

	<?php 

		echo $after_widget;

	}



	function update( $new_instance, $old_instance ) {

		$instance = $old_instance;

		$instance['flickr_title'] = strip_tags( $new_instance['flickr_title'] );

		$instance['no_of_photos'] = strip_tags( $new_instance['no_of_photos'] );

		$instance['flickr_id'] = strip_tags( $new_instance['flickr_id'] );

		$instance['flickr_display'] = strip_tags( $new_instance['flickr_display'] );

		return $instance;

	}



	function form( $instance ) {

		$defaults = array( 

				'flickr_id' => __( '52617155@N08','adt' ),

				'flickr_title' =>__( 'Flickr' , 'adt'), 

				'no_of_photos' => '6' , 

				'flickr_display' => 'latest' 

		);

		$instance = wp_parse_args( (array) $instance, $defaults ); ?>



		<p>

			<label for="<?php echo $this->get_field_id( 'flickr_title' ); ?>">Title : </label>

			<input id="<?php echo $this->get_field_id( 'flickr_title' ); ?>" name="<?php echo $this->get_field_name( 'flickr_title' ); ?>" value="<?php echo $instance['flickr_title']; ?>" class="widefat" type="text" />

		</p>

		<p>

			<label for="<?php echo $this->get_field_id( 'flickr_id' ); ?>">Flickr ID : </label>

			<input id="<?php echo $this->get_field_id( 'flickr_id' ); ?>" name="<?php echo $this->get_field_name( 'flickr_id' ); ?>" value="<?php echo $instance['flickr_id']; ?>" class="widefat" type="text" />

			<small> Find Your ID at(<a href="http://www.idgettr.com">idGettr</a>)</small>

		</p>

		<p>

			<label for="<?php echo $this->get_field_id( 'no_of_photos' ); ?>">Number of photos to show : </label>

			<input id="<?php echo $this->get_field_id( 'no_of_photos' ); ?>" name="<?php echo $this->get_field_name( 'no_of_photos' ); ?>" value="<?php echo $instance['no_of_photos']; ?>" type="text" size="3" />

		</p>

		<p>

			<label for="<?php echo $this->get_field_id( 'flickr_display' ); ?>">Display </label>

			<select id="<?php echo $this->get_field_id( 'flickr_display' ); ?>" name="<?php echo $this->get_field_name( 'flickr_display' ); ?>" >

				<option value="latest" <?php if( $instance['flickr_display'] == 'latest' ) echo "selected=\"selected\""; else echo ""; ?>>Most recent</option>

				<option value="random" <?php if( $instance['flickr_display'] == 'random' ) echo "selected=\"selected\""; else echo ""; ?>>Random selection</option>

			</select>

		</p>



	<?php

	}

}

?>