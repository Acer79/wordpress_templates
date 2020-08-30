<?php

/**
 * Widget Name: Social Profiles
 */


if (!class_exists('evatheme_core_widget_social')) {
	class evatheme_core_widget_social extends WP_Widget {

		function __construct() {
			parent::__construct(
				false,
				esc_html__('Evatheme Social Profiles', 'evatheme_core'),
				array(
					'classname' => 'evatheme_social_icons',
					'description' => esc_html__('Widget for displaying links to your social media profiles', 'evatheme_core')
				)
			);
		}

		function widget($args, $instance) {
			extract($args);
			$title = apply_filters('widget_title', $instance['title']);
			echo $before_widget;
				if ($title){echo $before_title . $title . $after_title;}
				
				$evatheme_core_widget_social_links = array(
					'facebook' => array(
						'name' => 'facebook_username',
						'link' => '*',
					),
					'twitter' => array(
						'name' => 'twitter_username',
						'link' => '*',
					),
					'linkedin' => array(
						'name' => 'linkedin_username',
						'link' => '*'
					),
					'pinterest' => array(
						'name' => 'pinterest_username',
						'link' => '*',
					),
					'google-plus' => array(
						'name' => 'googleplus_username',
						'link' => '*'
					),
					'flickr' => array(
						'name' => 'flickr_username',
						'link' => '*'
					),
					'instagram' => array(
						'name' => 'instagram_username',
						'link' => '*',
					),
					'behance' => array(
						'name' => 'behance_username',
						'link' => '*'
					),
					'youtube' => array(
						'name' => 'youtube_username',
						'link' => '*',
					),
					'vimeo' => array(
						'name' => 'vimeo_username',
						'link' => '*',
					),
					'rss' => array(
						'name' => 'rss_username',
						'link' => '*'
					),
					'tumblr' => array(
						'name' => 'tumblr_username',
						'link' => '*'
					),
					'reddit' => array(
						'name' => 'reddit_username',
						'link' => '*'
					),
					'dribbble' => array(
						'name' => 'dribbble_username',
						'link' => '*',
					),
					'digg' => array(
						'name' => 'digg_username',
						'link' => '*',
					),
					'skype' => array(
						'name' => 'skype_username',
						'link' => 'skype:*'
					),
					'yahoo' => array(
						'name' => 'yahoo_username',
						'link' => '*'
					),
					'vk' => array(
						'name' => 'vk_username',
						'link' => '*'
					),
					'tripadvisor' => array(
						'name' => 'tripadvisor_username',
						'link' => '*'
					),
				);
				
				echo '<div class="social_links_wrap clearfix">';
				foreach ($evatheme_core_widget_social_links as $key => $social) {
					if(!empty($instance[$social['name']])){
						echo '<a class="social_link ' . $key . '" href="' . str_replace('*',$instance[$social['name']],$social['link']) . '" target="_blank" title="' . $key . '"><i class="fa fa-' . $key . '"></i><i class="fa fa-' . $key . '"></i></a>';
					}
				}
				echo '</div>';
			echo $after_widget;
		}

		function update($new_instance, $old_instance) {
			$instance = $old_instance;
			$instance = $new_instance;
			/* Strip tags (if needed) and update the widget settings. */
			$instance['title'] = strip_tags($new_instance['title']);
			return $instance;
		}

		function form($instance) {
			
			$evatheme_core_widget_social_links = array(
				'facebook' => array(
					'name' => 'facebook_username',
					'link' => '*',
				),
				'twitter' => array(
					'name' => 'twitter_username',
					'link' => '*',
				),
				'linkedin' => array(
					'name' => 'linkedin_username',
					'link' => '*'
				),
				'pinterest' => array(
					'name' => 'pinterest_username',
					'link' => '*',
				),
				'google-plus' => array(
					'name' => 'googleplus_username',
					'link' => '*'
				),
				'flickr' => array(
					'name' => 'flickr_username',
					'link' => '*'
				),
				'instagram' => array(
					'name' => 'instagram_username',
					'link' => '*',
				),
				'behance' => array(
					'name' => 'behance_username',
					'link' => '*'
				),
				'youtube' => array(
					'name' => 'youtube_username',
					'link' => '*',
				),
				'vimeo' => array(
					'name' => 'vimeo_username',
					'link' => '*',
				),
				'rss' => array(
					'name' => 'rss_username',
					'link' => '*'
				),
				'tumblr' => array(
					'name' => 'tumblr_username',
					'link' => '*'
				),
				'reddit' => array(
					'name' => 'reddit_username',
					'link' => '*'
				),
				'dribbble' => array(
					'name' => 'dribbble_username',
					'link' => '*',
				),
				'digg' => array(
					'name' => 'digg_username',
					'link' => '*',
				),
				'skype' => array(
					'name' => 'skype_username',
					'link' => 'skype:*'
				),
				'yahoo' => array(
					'name' => 'yahoo_username',
					'link' => '*'
				),
				'vk' => array(
					'name' => 'vk_username',
					'link' => '*'
				),
				'tripadvisor' => array(
					'name' => 'tripadvisor_username',
					'link' => '*'
				),
			);
			
			?>
			<p>
				<label for="<?php echo $this->get_field_id('title'); ?>"><?php esc_html_e('Title:', 'evatheme_core'); ?></label>
				<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" type="text" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo isset($instance['title']) ? $instance['title'] : ''; ?>"  />
			</p> <?php
			foreach ($evatheme_core_widget_social_links as $key => $social) { ?>
				<p>
					<label for="<?php echo $this->get_field_id($social['name']); ?>"><?php echo $key; if($key==='linkedin'){echo ' URL';} ?>:</label>
					<input class="widefat" id="<?php echo $this->get_field_id($social['name']); ?>" type="text" name="<?php echo $this->get_field_name($social['name']); ?>" value="<?php echo isset($instance[$social['name']]) ? $instance[$social['name']] : ''; ?>"  />
				</p><?php
			}
		}
	}
}