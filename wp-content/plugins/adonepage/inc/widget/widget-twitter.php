<?php



add_action( 'widgets_init', 'ad_twitter_widgets' );



function ad_twitter_widgets() {







	register_widget('AD_Twitter_Widget');







}



class AD_Twitter_Widget extends WP_Widget {



	// Initialize the widget







	function __construct() {







		$widget_ops = array('classname' => 'widget_twitter', 'description' => 'Show Your recent tweets' );







        $this->WP_Widget('twitter_widget', 'AD Twitter Widget', $widget_ops);  







	}



	// Output of the widget







	function widget( $args, $instance ) {







		extract( $args );



		$title = apply_filters('widget_title', $instance['title'] );







		$twitter_username = $instance['twitter_username'];







		$show_num = $instance['show_num'];



		



		$tweets_wrap = $instance['tweets_wrap'];



		



		$tweets_wrap_al = $instance['tweets_wrap_al'];







		$consumer_key = $instance['consumer_key'];







		$consumer_secret = $instance['consumer_secret'];







		$access_token = $instance['access_token'];







		$access_token_secret = $instance['access_token_secret'];		







		// Opening of widget







		echo $before_widget;





		// Open of title tag







		if ( $title ){ 







			echo $before_title . $title . $after_title; 







		}





			$connection = getConnectionWithAccessToken($consumer_key, $consumer_secret, $access_token, $access_token_secret);







			$tweets = $connection->get("https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name=".$twitter_username."&count=" . $show_num) or die('Couldn\'t retrieve tweets! Wrong username?');







			







			if(!empty($tweets->errors)){







				if($tweets->errors[0]->message == 'Invalid or expired token'){







					echo '<strong>'.$tweets->errors[0]->message.'!</strong><br />You\'ll need to regenerate it <a href="https://dev.twitter.com/apps" target="_blank">here</a>!' . $after_widget;







				}else{







					echo '<strong>'.$tweets->errors[0]->message.'</strong>' . $after_widget;







				}







				return;







			}



			$tweets_data = array();







			for($i = 0;$i <= count($tweets); $i++){







				if(!empty($tweets[$i])){







					$tweets_data[$i]['created_at'] = $tweets[$i]->created_at;







					$tweets_data[$i]['text'] = $tweets[$i]->text;			







					$tweets_data[$i]['status_id'] = $tweets[$i]->id_str;			







				}	







			}			







			







			update_option('gdl_twitter_widget_tweets',serialize($tweets_data));							







		







		







		echo '<div class="tweets-wrap"  id="tweets" style="height:'.$tweets_wrap.'px; text-align:'.$tweets_wrap_al.';">';







		echo '<ul class="tweetList">';







		foreach( $tweets_data as $each_tweet ){







			echo '<li>';







			echo '<p><span class="hash"><i class="icon-twitter ac2"></i>' . convert_links($each_tweet['text']) . '</span></p>';







			echo '<a class="small" target="_blank" href="http://twitter.com/'.$twitter_username.'/statuses/'.$each_tweet['status_id'].'">'.relative_time($each_tweet['created_at']).'</a>';







			echo '</li>';







		}







		echo '</ul>';







		echo '</div>';



		// Closing of widget







		echo $after_widget;	







	}



	// Widget Form







	function form( $instance ) {







		if ( $instance ) {







			$title = esc_attr( $instance[ 'title' ] );







			$twitter_username = esc_attr( $instance[ 'twitter_username' ] );







			$show_num = esc_attr( $instance[ 'show_num' ] );



			



			$tweets_wrap = esc_attr( $instance[ 'tweets_wrap' ] );



			



			$tweets_wrap_al = esc_attr( $instance[ 'tweets_wrap_al' ] );







			$consumer_key = esc_attr( $instance[ 'consumer_key' ] );







			$consumer_secret = esc_attr( $instance[ 'consumer_secret' ] );







			$access_token = esc_attr( $instance[ 'access_token' ] );







			$access_token_secret = esc_attr( $instance[ 'access_token_secret' ] );







		







		} else {







			$title = '';







			$twitter_username = '';







			$show_num = '5';



			



			$tweets_wrap = '28';



			



			$tweets_wrap_al = 'left';







			$consumer_key = '';







			$consumer_secret = '';







			$access_token = '';







			$access_token_secret = '';







			







		}







		?>



		<!-- Text Input -->







		<p>







			<label for="<?php echo $this->get_field_id('title'); ?>">Title</label> 







			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />







		</p>



		<!-- Twitter Username -->







		<p>







			<label for="<?php echo $this->get_field_id('twitter_username'); ?>">Twitter username: </label> 







			<input class="widefat" id="<?php echo $this->get_field_id('twitter_username'); ?>" name="<?php echo $this->get_field_name('twitter_username'); ?>" type="text" value="<?php echo $twitter_username; ?>" />







		</p>		







		







		<!-- Show Num --> 







		<p>







			<label for="<?php echo $this->get_field_id( 'show_num' ); ?>">Show Count: </label>







			<input class="widefat" id="<?php echo $this->get_field_id( 'show_num' ); ?>" name="<?php echo $this->get_field_name( 'show_num' ); ?>" type="text" value="<?php echo $show_num; ?>" />







		</p>



        



        <!-- Show  Tweets Wrap --> 







		<p>







			<label for="<?php echo $this->get_field_id( 'tweets_wrap' ); ?>">Tweets Wrap height (px): </label>







			<input class="widefat" id="<?php echo $this->get_field_id( 'tweets_wrap' ); ?>" name="<?php echo $this->get_field_name( 'tweets_wrap' ); ?>" type="text" value="<?php echo $tweets_wrap; ?>" />







		</p>



        



        <p>







			<label for="<?php echo $this->get_field_id( 'tweets_wrap_al' ); ?>">Tweets Wrap alignment: </label>



            



            <select id="<?php echo $this->get_field_id( 'tweets_wrap_al' ); ?>" name="<?php echo $this->get_field_name( 'tweets_wrap_al' ); ?>" class="widefat">



            <option <?php if ($tweets_wrap == 'left' ){echo 'selected="selected"';} ?> value="left">Left</option>



            <option <?php if ($tweets_wrap == 'center' ){echo 'selected="selected"';} ?> value="center">Center</option>



            <option <?php if ($tweets_wrap == 'right' ){echo 'selected="selected"';} ?> value="right">right</option>



            </select>







		</p>		







		<!-- Consumer Key --> 







		<p>







			<label for="<?php echo $this->get_field_id( 'consumer_key' ); ?>">Consumer Key: </label>







			<input class="widefat" id="<?php echo $this->get_field_id( 'consumer_key' ); ?>" name="<?php echo $this->get_field_name( 'consumer_key' ); ?>" type="text" value="<?php echo $consumer_key; ?>" />







		</p>



		<!-- Consumer Secret --> 







		<p>







			<label for="<?php echo $this->get_field_id( 'consumer_secret' ); ?>">Consumer Secret: </label>







			<input class="widefat" id="<?php echo $this->get_field_id( 'consumer_secret' ); ?>" name="<?php echo $this->get_field_name( 'consumer_secret' ); ?>" type="text" value="<?php echo $consumer_secret; ?>" />







		</p>



		<!-- Access Token --> 







		<p>







			<label for="<?php echo $this->get_field_id( 'access_token' ); ?>">Access Token: </label>







			<input class="widefat" id="<?php echo $this->get_field_id( 'access_token' ); ?>" name="<?php echo $this->get_field_name( 'access_token' ); ?>" type="text" value="<?php echo $access_token; ?>" />







		</p>



		<!-- Access Token Secret --> 







		<p>







			<label for="<?php echo $this->get_field_id( 'access_token_secret' ); ?>">Access Token Secret: </label>







			<input class="widefat" id="<?php echo $this->get_field_id( 'access_token_secret' ); ?>" name="<?php echo $this->get_field_name( 'access_token_secret' ); ?>" type="text" value="<?php echo $access_token_secret; ?>" />







		</p>		



		







	<?php







	}







	







	// Update the widget







	function update( $new_instance, $old_instance ) {







		$instance = $old_instance;







		$instance['title'] = strip_tags( $new_instance['title'] );







		$instance['twitter_username'] = strip_tags( $new_instance['twitter_username'] );







		$instance['show_num'] = strip_tags( $new_instance['show_num'] );



		



		$instance['tweets_wrap'] = strip_tags( $new_instance['tweets_wrap'] );



		



		$instance['tweets_wrap_al'] = strip_tags( $new_instance['tweets_wrap_al'] );







		$instance['consumer_key'] = strip_tags( $new_instance['consumer_key'] );







		$instance['consumer_secret'] = strip_tags( $new_instance['consumer_secret'] );







		$instance['access_token'] = strip_tags( $new_instance['access_token'] );







		$instance['access_token_secret'] = strip_tags( $new_instance['access_token_secret'] );







		return $instance;







	}	







}



?>