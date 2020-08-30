<?php
/**
 * Page Settings Metabox
 * Developed & Designed exclusively for the Evatheme WordPress themes
 * Do not copy, re-sell or reproduce!
 *
 * @package Evatheme WordPress Themes
 * @subpackage Framework
 * @version 1.0
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// The Metabox class
class evatheme_core_Post_Metaboxes {
	private $post_types;

	/**
	 * Register this class with the WordPress API
	 *
	 * @since 1.0.0
	 */
	public function __construct() {

		// Post types to add the metabox to
		$this->post_types = apply_filters( 'evatheme_core_main_metaboxes_post_types', array(
			'post'         => 'post',
			'page'         => 'page',
			'portfolio'    => 'portfolio',
			'product'      => 'product',
		) );

		// Loop through post types and add metabox to corresponding post types
		if ( $this->post_types ) {
			foreach( $this->post_types as $key => $val ) {
				add_action( 'add_meta_boxes_'. $val, array( $this, 'post_meta' ), 11 );
			}
		}

		// Save meta
		add_action( 'save_post', array( $this, 'save_meta_data' ) );

		// Load scripts for the metabox
		add_action( 'admin_enqueue_scripts', array( $this, 'load_scripts' ) );

	}

	/**
	 * The function responsible for creating the actual meta box.
	 *
	 * @since 1.0.0
	 */
	public function post_meta( $post ) {
		
		$obj = get_post_type_object( $post->post_type );
		
		// Add metabox
		add_meta_box(
			'evatheme_core-metabox',
			$obj->labels->singular_name . ' ' . esc_html__( 'Settings', 'despero' ),
			array( $this, 'display_meta_box' ),
			$post->post_type,
			'normal',
			'high'
		);

	}

	/**
	 * Enqueue scripts and styles needed for the metaboxes
	 *
	 * @since 1.0.0
	 */
	public function load_scripts( $hook ) {

		// Only needed on these admin screens
		if ( $hook != 'edit.php' && $hook != 'post.php' && $hook != 'post-new.php' ) {
			return;
		}

		// Get global post
		global $post;

		// Return if post is not object
		if ( ! is_object( $post ) ) {
			return;
		}

		// Enqueue metabox css
		wp_enqueue_style(
			'evatheme_core-post-metabox',
			plugin_dir_url( __FILE__ ) .'evatheme_core-metabox.css',
			array(),
			'1.0'
		);

		// Enqueue media js
		wp_enqueue_media();

		// Enqueue color picker
		wp_enqueue_style( 'wp-color-picker' );
		wp_enqueue_script( 'wp-color-picker' );

		// Enqueue metabox js
		wp_enqueue_script(
			'evatheme_core-post-metabox',
			plugin_dir_url( __FILE__ ) .'evatheme_core-metabox.js',
			array( 'jquery', 'wp-color-picker' ),
			'1.0',
			true
		);

		wp_localize_script( 'evatheme_core-post-metabox', 'evatheme_core_metabox', array(
			'reset'  => esc_html__(  'Reset Settings', 'despero' ),
			'cancel' => esc_html__(  'Cancel Reset', 'despero' ),
		) );

	}

	/**
	 * Renders the content of the meta box.
	 *
	 * @since 1.0.0
	 */
	public function display_meta_box( $post ) {

		// Add an nonce field so we can check for it later.
		wp_nonce_field( 'evatheme_core_metabox', 'evatheme_core_metabox_nonce' );

		// Get current post data
		$post_id   = $post->ID;
		$post_type = get_post_type();

		// Get tabs
		$tabs = $this->meta_array( $post );

		// Empty notice
		$empty_notice = esc_html__( 'No meta settings available for this post type or user.', 'despero' );

		// Make sure tabs aren't empty
		if ( empty( $tabs ) ) {
			echo '<p>'. esc_html( $empty_notice ) .'</p>'; return;
		}

		// Store tabs that should display on this specific page in an array for use later
		$active_tabs = array();
		foreach ( $tabs as $tab ) {
			$tab_post_type = isset( $tab['post_type'] ) ? $tab['post_type'] : '';
			if ( ! $tab_post_type ) {
				$display_tab = true;
			} elseif ( in_array( $post_type, $tab_post_type ) ) {
				$display_tab = true;
			} else {
				$display_tab = false;
			}
			if ( $display_tab ) {
				$active_tabs[] = $tab;
			}
		}

		// No active tabs
		if ( empty( $active_tabs ) ) {
			echo '<p>'. esc_html( $empty_notice ) .'</p>'; return;
		} ?>

		<ul class="wp-tab-bar">
			<?php
			// Output tab links
			$count=0;
			foreach ( $active_tabs as $tab ) {
				$count++;
				// Define tab title
				$tab_title = $tab['title'] ? $tab['title'] : esc_html__( 'Other', 'despero' ); ?>
				<li<?php if ( '1' == $count ) echo ' class="wp-tab-active"'; ?>>
					<a href="javascript:;" data-tab="#evatheme_core-mb-tab-<?php echo esc_attr( $count ); ?>">
						<?php if ( isset( $tab['icon'] ) ) { ?>
							<span class="<?php echo esc_attr( $tab['icon'] ) ; ?>"></span>
						<?php } ?>
						<?php echo esc_html( $tab_title ); ?>
					</a>
				</li>
			<?php } ?>
		</ul><!-- .evatheme_core-mb-tabnav -->

		<?php
		// Output tab sections
		$count=0;
		foreach ( $active_tabs as $tab ) {
			$count++; ?>
			<div id="evatheme_core-mb-tab-<?php echo esc_attr( $count ); ?>" class="wp-tab-panel clr">
				<table class="form-table">
					<?php
					foreach ( $tab['settings'] as $setting ) {

						$meta_id     = $setting['id'];
						$title       = $setting['title'];
						$hidden      = isset( $setting['hidden'] ) ? $setting['hidden'] : false;
						$type        = isset( $setting['type'] ) ? $setting['type'] : 'text';
						$default     = isset( $setting['default'] ) ? $setting['default'] : '';
						$description = isset( $setting['description'] ) ? $setting['description'] : '';
						$meta_value  = get_post_meta( $post_id, $meta_id, true );
						$meta_value  = $meta_value ? $meta_value : $default; ?>

						<tr<?php if ( $hidden ) echo ' style="display:none;"'; ?> id="<?php echo esc_attr( $meta_id ); ?>_tr">
							<th>
								<label for="evatheme_core_main_layout"><strong><?php echo esc_html( $title ); ?></strong></label>
								<?php
								// Display field description
								if ( $description ) { ?>
									<p class="evatheme_core-mb-description"><?php echo esc_html( $description ); ?></p>
								<?php } ?>
							</th>

							<?php
							// Text Field
							if ( 'text' == $type ) { ?>

								<td><input name="<?php echo esc_attr( $meta_id ); ?>" type="text" value="<?php echo esc_attr( $meta_value ); ?>"></td>

							<?php
							}

							// Button Group
							if ( 'button_group' == $type ) {

								$options = isset ( $setting['options'] ) ? $setting['options'] : '';

								if ( is_array( $options ) ) { ?>

									<td>

										<div class="evatheme_core-mb-btn-group">

											<?php foreach ( $options as $option_value => $option_name ) {

												$class = 'evatheme_core-mb-btn evatheme_core-mb-' . esc_attr( $option_value );

												if ( $option_value == $meta_value ) {
													$class .= ' active';
												}  ?>

												<button type="button" class="<?php echo esc_attr( $class ); ?>" data-value="<?php echo esc_attr( $option_value ); ?>"><?php echo esc_html( $option_name ); ?></button>

											<?php } ?>

											<input name="<?php echo esc_attr( $meta_id ); ?>" type="hidden" value="<?php echo esc_attr( $meta_value ); ?>" class="evatheme_core-mb-hidden">

										</div>

									</td>

								<?php }

							}

							// Enable Disable button group
							if ( 'button_group_ed' == $type ) {

								$options = isset ( $setting['options'] ) ? $setting['options'] : '';

								if ( is_array( $options ) ) { ?>

									<td>

										<div class="evatheme_core-mb-btn-group">
											
											<?php
											// Default
											$active = ! $meta_value ? 'evatheme_core-mb-btn evatheme_core-default active' : 'evatheme_core-mb-btn evatheme_core-default'; ?>

											<button type="button" class="<?php echo esc_attr( $active ); ?>" data-value=""><?php echo esc_html_e( 'Default', 'despero' ); ?></button>

											<?php
											// Enable
											$active = ( $options['enable'] == $meta_value ) ? 'evatheme_core-mb-btn evatheme_core-on active' : 'evatheme_core-mb-btn evatheme_core-on'; ?>

											<button type="button" class="<?php echo esc_attr( $active ); ?>" data-value="<?php echo esc_attr( $options['enable'] ); ?>"><?php echo esc_html_e( 'Enable', 'despero' ); ?></button>

											<?php
											// Disable
											$active = ( $options['disable'] == $meta_value ) ? 'evatheme_core-mb-btn evatheme_core-off active' : 'evatheme_core-mb-btn evatheme_core-off'; ?>

											<button type="button" class="<?php echo esc_attr( $active ); ?>" data-value="<?php echo esc_attr( $options['disable'] ); ?>"><?php echo esc_html_e( 'Disable', 'despero' ); ?></button>

											<input name="<?php echo esc_attr( $meta_id ); ?>" type="hidden" value="<?php echo esc_attr( $meta_value ); ?>" class="evatheme_core-mb-hidden">

										</div>

									</td>

								<?php }

							}

							// Number Field
							elseif ( 'number' == $type ) {

								$step = isset( $setting['step'] ) ? $setting['step'] : '1';
								$min  = isset( $setting['min'] ) ? $setting['min'] : '1';
								$max  = isset( $setting['max'] ) ? $setting['max'] : '10'; ?>

								<td>
									<input name="<?php echo esc_attr( $meta_id ); ?>" type="number" value="<?php echo esc_attr( $meta_value ); ?>" step="<?php echo floatval( $step ); ?>" min="<?php echo floatval( $min ); ?>" max="<?php echo floatval( $max ); ?>">
								</td>

							<?php }

							// Textarea Field
							elseif ( 'textarea' == $type ) {
								$rows = isset ( $setting['rows'] ) ? absint( $setting['rows'] ) : 4; ?>

								<td>
									<textarea rows="<?php echo esc_attr( $rows ); ?>" cols="1" name="<?php echo esc_attr( $meta_id ); ?>" type="text" class="evatheme_core-mb-textarea"><?php echo esc_textarea( $meta_value ); ?></textarea>
								</td>

							<?php }

							// Code Field
							elseif ( 'code' == $type ) {
								$rows = isset ( $setting['rows'] ) ? absint( $setting['rows'] ) : 1; ?>

								<td>
									<pre><textarea rows="<?php echo esc_attr( $rows ); ?>" cols="1" name="<?php echo esc_attr( $meta_id ); ?>" type="text" class="evatheme_core-mb-textarea-code"><?php echo apply_filters( "the_content", wp_specialchars_decode( $meta_value ) ); ?></textarea></pre>
								</td>

							<?php }

							// Checkbox
							elseif ( 'checkbox' == $type ) {

								$meta_value = ( 'on' != $meta_value ) ? false : true; ?>
								<td><input name="<?php echo esc_attr( $meta_id ); ?>" type="checkbox" <?php checked( $meta_value, true, true ); ?>></td>

							<?php }

							// Select
							elseif ( 'select' == $type ) {

								$options = isset ( $setting['options'] ) ? $setting['options'] : '';

								if ( ! empty( $options ) ) { ?>

									<td><select id="<?php echo esc_attr( $meta_id ); ?>" name="<?php echo esc_attr( $meta_id ); ?>">
									
									<?php foreach ( $options as $option_value => $option_name ) { ?>
										
										<option value="<?php echo esc_attr( $option_value ); ?>" <?php selected( $meta_value, $option_value, true ); ?>><?php echo esc_attr( $option_name ); ?></option>

									<?php } ?>

									</select></td>

								<?php }

							}

							// Color
							elseif ( 'color' == $type ) { ?>

								<td><input name="<?php echo esc_attr( $meta_id ); ?>" type="text" value="<?php echo esc_attr( $meta_value ); ?>" class="evatheme_core-mb-color-field"></td>

							<?php }
							
							//	Layout
							elseif ( 'layout' == $type ) { ?>
					
								<td class="metabox_type_layout">
									<?php  foreach ($setting['options'] as $val => $option) {
										echo '<a href="#" data-value="' . $val . '" ' . ( $val == $meta_value ? ' class="active"' : '' ) . '><img src="'.esc_url($option['img']).'">'.esc_html($option['title']).'</a>';
									} ?>
									<input name="<?php echo esc_attr( $meta_id ); ?>" type="hidden" value="<?php echo esc_attr( $meta_value ); ?>" />
								</td>

							<?php }
							
							// Media
							elseif ( 'media' == $type ) {

								// Validate data if array - old Redux cleanup
								if ( is_array( $meta_value ) ) {
									if ( ! empty( $meta_value['url'] ) ) {
										$meta_value = $meta_value['url'];
									} else {
										$meta_value = '';
									}
								} ?>
								<td>
									<div class="uploader">
									<input type="text" name="<?php echo esc_attr( $meta_id ); ?>" value="<?php echo esc_attr( $meta_value ); ?>">
									<input class="evatheme_core-mb-uploader button-secondary" name="<?php echo esc_attr( $meta_id ); ?>" type="button" value="<?php esc_html_e( 'Upload', 'despero' ); ?>" />
									<?php if ( $meta_value ) {
											if ( is_numeric( $meta_value ) ) {
												$meta_value = wp_get_attachment_image_src( $meta_value, 'full' );
												$meta_value = $meta_value[0];
											} ?>
										<div class="evatheme_core-mb-thumb" style="padding-top:10px;"><img src="<?php echo esc_url( $meta_value ); ?>" height="40" width="" style="height:40px;width:auto;max-width:100%;" /></div>
									<?php } ?>
									</div>
								</td>

							<?php }
							
							// Gallery
							elseif ( 'gallery' == $type ) {

								?>
								<td>
									<div id="evatheme_core_gallery_images_container">
										<?php
											$gallery_thumbs = '';
											
											// Validate data if array - old Redux cleanup
											if ( is_array( $meta_value ) ) {
												if ( ! empty( $meta_value['url'] ) ) {
													$meta_value = $meta_value['url'];
												} else {
													$meta_value = '';
												}
											}
											
											if( $meta_value ) {
												$attachments = array_filter( explode( ',', $meta_value ) );
												foreach ( $attachments as $attachment_id ) {
													if ( wp_attachment_is_image ( $attachment_id  ) ) {
														$gallery_thumbs .= '<li class="image" data-attachment_id="' . $attachment_id . '"><div class="attachment-preview"><div class="thumbnail">
																	' . wp_get_attachment_image( $attachment_id, array(32,32) ) . '</div>
																	<a href="#" class="evatheme_core-gmb-remove" title="' . esc_attr__( 'Remove image', 'despero' ) . '"><div class="media-modal-icon"></div></a>
																</div></li>';
													}
												}
											}
										?>
										<input type="hidden" id="image_gallery" name="<?php echo esc_attr( $meta_id ); ?>" value="<?php echo esc_attr( $meta_value ); ?>" />
										<?php wp_nonce_field( 'easy_image_gallery', 'easy_image_gallery' ); ?>
										<?php echo '<ul class="evatheme_core_gallery_images" style="font-size:0;margin-top:6px;">'. $gallery_thumbs .'</ul>'; ?>
									</div>
									<p class="add_evatheme_core_gallery_images hide-if-no-js">
										<a href="#" class="button-primary"><?php esc_html_e( 'Add/Edit Images', 'despero' ); ?></a>
									</p>
								</td>

							<?php }

							// Editor
							elseif ( 'editor' == $type ) {
								$teeny= isset( $setting['teeny'] ) ? $setting['teeny'] : false;
								$rows = isset( $setting['rows'] ) ? $setting['rows'] : '10';
								$media_buttons= isset( $setting['media_buttons'] ) ? $setting['media_buttons'] : true; ?>
								<td><?php wp_editor( $meta_value, $meta_id, array(
									'textarea_name' => $meta_id,
									'teeny'         => $teeny,
									'textarea_rows' => $rows,
									'media_buttons' => $media_buttons,
								) ); ?></td>
							<?php } ?>
						</tr>

					<?php } ?>
				</table>
			</div>
		<?php } ?>

		<div class="evatheme_core-mb-reset">
			<a class="button button-secondary evatheme_core-reset-btn"><?php esc_html_e( 'Reset Settings', 'despero' ); ?></a>
			<div class="evatheme_core-reset-checkbox"><input type="checkbox" name="evatheme_core_metabox_reset"> <?php esc_html_e( 'Are you sure? Check this box, then update your post to reset all settings.', 'despero' ); ?></div>
		</div>

		<div class="clear"></div>

	<?php }

	/**
	 * Save metabox data
	 *
	 * @since 1.0.0
	 */
	public function save_meta_data( $post_id ) {

		// Get array of settings to save
		$tabs = $this->meta_array( get_post( $post_id ) );

		// No tabs so lets bail
		if ( ! $tabs ) {
			return;
		}

		/*
		 * We need to verify this came from our screen and with proper authorization,
		 * because the save_post action can be triggered at other times.
		 */

		// Check if our nonce is set.
		if ( ! isset( $_POST['evatheme_core_metabox_nonce'] ) ) {
			return;
		}

		// Verify that the nonce is valid.
		if ( ! wp_verify_nonce( $_POST['evatheme_core_metabox_nonce'], 'evatheme_core_metabox' ) ) {
			return;
		}

		// If this is an autosave, our form has not been submitted, so we don't want to do anything.
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return;
		}

		// Check the user's permissions.
		if ( isset( $_POST['post_type'] ) && 'page' == $_POST['post_type'] ) {

			if ( ! current_user_can( 'edit_page', $post_id ) ) {
				return;
			}

		} else {

			if ( ! current_user_can( 'edit_post', $post_id ) ) {
				return;
			}
		}

		/* OK, it's safe for us to save the data now. Now we can loop through fields */

		// Check reset field
		$reset = isset( $_POST['evatheme_core_metabox_reset'] ) ? $_POST['evatheme_core_metabox_reset'] : '';

		// Loop through tabs
		$settings = array();
		foreach( $tabs as $tab ) {
			foreach ( $tab['settings'] as $setting ) {
				$settings[] = $setting;
			}
		}

		// Loop through settings and validate
		foreach ( $settings as $setting ) {

			// Vars
			$value = '';
			$id    = $setting['id'];
			$type  = isset ( $setting['type'] ) ? $setting['type'] : 'text';

			// Make sure field exists and if so validate the data
			if ( isset( $_POST[ $id ] ) ) {

				$value = $_POST[ $id ];

				// Validate text
				if ( 'text' == $type || 'text_html' == $type ) {
					$value = wp_kses_post( $value ); // @todo change this?
				}

				// Validate textarea
				elseif ( 'textarea' == $type ) {
					$value = esc_html( $value );
				}

				// Links
				elseif ( 'link' == $type ) {
					$value = esc_url( $value );
				}

				// Validate select
				elseif ( 'select' == $type ) {
					if ( 'default' == $value ) {
						$value = '';
					} else {
						$value = wp_strip_all_tags( $value );
					}
				}

				// Validate media
				elseif ( 'media' == $type ) {

					// Move old evatheme_core_post_self_hosted_shortcode_redux to evatheme_core_post_self_hosted_media
					if ( 'evatheme_core_post_self_hosted_media' == $id && empty( $value )
						&& $old = get_post_meta( $post_id, 'evatheme_core_post_self_hosted_shortcode_redux', true )
					) {
						$value = $old;
						delete_post_meta( $post_id, 'evatheme_core_post_self_hosted_shortcode_redux' );
					}

				}

				// Validate editor
				elseif ( 'editor' == $type ) {

					$value = ( '<p><br data-mce-bogus="1"></p>' == $value ) ? '' : $value;

				}

				// Update meta if value exists
				if ( $value && 'on' != $reset ) {
					update_post_meta( $post_id, $id, $value );
				}

				// Otherwise cleanup stuff
				else {
					delete_post_meta( $post_id, $id );
				}

			}

		}

	}

	/**
	 * Get menus
	 */
	public static function get_menus() {
		$menus = array( esc_html__( 'Default', 'despero' ) );
		$get_menus = get_terms( 'nav_menu', array( 'hide_empty' => true ) );
		foreach ( $get_menus as $menu) {
			$menus[$menu->term_id] = $menu->name;
		}
		return $menus;
	}

	/**
	 * Get title styles
	 */
	public static function get_title_styles() {
		return apply_filters( 'evatheme_core_title_styles', array(
			'' => esc_html__( 'Default', 'despero' ),
			'left' => esc_html__( 'Left', 'despero' ),
			'center' => esc_html__( 'Centered', 'despero' )
		) );
	}
	
	
	/**
	 * Get visibly element
	 */
	public static function get_element_visibly() {
		return apply_filters( 'evatheme_core_element_visibly', array(
			'' => esc_html__( 'Default', 'despero' ),
			'show' => esc_html__( 'Shown', 'despero' ),
			'hide' => esc_html__( 'Hidden', 'despero' ),
		) );
	}

	/**
	 * Settings Array
	 */
	private function meta_array( $post = null ) {

		// Prefix
		$prefix = 'despero_';
		
		$theme_uri = get_template_directory_uri();

		// Define array
		$array = array();

		// Store repeatable strings as vars
		$s_default = esc_html__( 'Default', 'despero' );
		$s_enable  = esc_html__( 'Enable', 'despero' );
		$s_disable = esc_html__( 'Disable', 'despero' );
		
		
		if( get_page_template_slug() != "page-comingsoon.php" ) {
			
			// Main Tab
			$array['main'] = array(
				'title' => esc_html__( 'Main', 'despero' ),
				'post_type' => array( 'page' ),
				'settings' => array(
					'page_layout' =>array(
						'title' => esc_html__( 'Page Layout', 'despero' ),
						'type' => 'select',
						'id' => $prefix . 'page_layout',
						'description' => esc_html__( 'Select the layout for this page.', 'despero' ),
						'options' => array(
							'' => esc_html__( 'Default', 'despero' ),
							'full-width' => esc_html__( 'Full-Width', 'despero' ),
							'boxed' => esc_html__( 'Boxed', 'despero' ),
						),
					),
					'page_bg_color' => array(
						'title' 		=> esc_html__( 'Page Background Color', 'despero' ),
						'description' 	=> esc_html__( 'Select a color for page background.', 'despero' ),
						'id' 			=> $prefix .'page_bg_color',
						'type' 			=> 'color',
						'default' 		=> '',
					),
					'page_bg_image' => array(
						'title' => esc_html__( 'Page Background Image', 'despero'),
						'description' => esc_html__( 'Select a custom background image for your page.', 'despero' ),
						'id' => $prefix . 'page_bg_image',
						'type' => 'media',
					),
					'page_bg_repeat' => array(
						'title' 		=> esc_html__( 'Page Background Repeat', 'despero' ),
						'type' 			=> 'select',
						'id' 			=> $prefix . 'page_bg_repeat',
						'options' 		=> array(	
											''				=> esc_html__( 'Default', 'despero' ),
											'repeat'		=> esc_html__( 'Repeat', 'despero' ),
											'repeat-x'		=> esc_html__( 'Repeat-x', 'despero' ),
											'repeat-y'		=> esc_html__( 'Repeat-y', 'despero' ),
											'no-repeat' 	=> esc_html__( 'No Repeat',  'despero' )
										),
						'default' 		=> '',
					),
					'page_bg_attachment' => array(
						'title' 		=> esc_html__( 'Page Background Attachment', 'despero' ),
						'type' 			=> 'select',
						'id' 			=> $prefix . 'page_bg_attachment',
						'options' 		=> array(	
											''			=> esc_html__( 'Default', 'despero' ),
											'scroll'	=> esc_html__( 'Scroll', 'despero' ),
											'fixed'		=> esc_html__( 'Fixed', 'despero' )
										),
						'default' 		=> '',
					),
					'page_bg_position' => array(
						'title' 		=> esc_html__( 'Page Background Position', 'despero' ),
						'type' 			=> 'select',
						'id' 			=> $prefix . 'page_bg_position',
						'options' 		=> array(	
											'' 				=> esc_html__( 'Default', 'despero' ),
											'left top' 		=> esc_html__( 'Left Top', 'despero' ),
											'left center' 	=> esc_html__( 'Left Center', 'despero' ),
											'left bottom' 	=> esc_html__( 'Left Bottom', 'despero' ),
											'center top' 	=> esc_html__( 'Center Top', 'despero' ),
											'center center' => esc_html__( 'Center Center', 'despero' ),
											'center bottom' => esc_html__( 'Center Bottom', 'despero' ),
											'right top' 	=> esc_html__( 'Right Top', 'despero' ),
											'right center' 	=> esc_html__( 'Right Center', 'despero' ),
											'right bottom' 	=> esc_html__( 'Right Bottom', 'despero' )
										),
						'default' 		=> '',
					),
					'page_bg_full' => array(
						'title' 		=> esc_html__( 'Page Background Size', 'despero' ),
						'type' 			=> 'select',
						'id' 			=> $prefix . 'page_bg_full',
						'options' 		=> array(	
											'' 				=> esc_html__( 'Default', 'despero' ),
											'inherit' 		=> esc_html__( 'Inherit', 'despero' ),
											'cover' 		=> esc_html__( 'Cover', 'despero' )
										),
						'default' 		=> '',
					),
				),
			);

			// Header Tab
			$array['header'] = array(
				'title' => esc_html__( 'Header', 'despero' ),
				'post_type' => array( 'page' ),
				'settings' => array(
					'header_layout' => array(
						'title' => esc_html__( 'Header Layout', 'despero' ),
						'id' => $prefix . 'header_layout',
						'type' => 'select',
						'description' => esc_html__( 'You can choose between a header full width style menu or a boxed style menu.', 'despero' ),
						'options' => array(
							'' => esc_html__( 'Default', 'despero' ),
							'full_width' => esc_html__( 'Full Width', 'despero' ),
							'boxed' => esc_html__( 'Boxed', 'despero' )
						),
						'default' => '',
					),
					'header_page_bg_style' => array(
						'title' => esc_html__( 'Header Background Style', 'despero' ),
						'id' => $prefix . 'header_page_bg_style',
						'type' => 'select',
						'description' => esc_html__( 'Select a background style for this header. settings of background color, transparency or settings of gradient will be taken from the Theme Options.', 'despero' ),
						'options' => array(
							'' => esc_html__( 'Default', 'despero' ),
							'gradient' => esc_html__( 'Gradient', 'despero' ),
							'bgcolor' => esc_html__( 'Background Color', 'despero' ),
						),
						'default' => '',
					),
				),
			);

			// Title Tab
			$array['title'] = array(
				'title' => esc_html__( 'Title', 'despero' ),
				'post_type' => array( 'page' ),
				'settings' => array(
					'pagetitle' => array(
						'title' => esc_html__( 'Title', 'despero' ),
						'description' => esc_html__( 'Enable or disable title on this page or post.', 'despero' ),
						'id' => $prefix . 'pagetitle',
						'type' => 'select',
						'options' => $this->get_element_visibly(),
						'default' => '',
					),
					'pagetitle_text' => array(
						'title' => esc_html__( 'Page Title', 'despero' ),
						'description' => esc_html__( 'Please enter the page title.', 'despero' ),
						'type' => 'text',
						'id' => $prefix . 'pagetitle_text',
					),
					'pagetitle_subtext' => array(
						'title' => esc_html__( 'Subheading', 'despero' ),
						'description' => esc_html__( 'Enter your page subheading.', 'despero' ),
						'type' => 'text',
						'id' => $prefix . 'pagetitle_subtext',
					),
					'pagetitle_style' => array(
						'title' => esc_html__( 'Title Style', 'despero' ),
						'description' => esc_html__( 'Select a custom title style for this page or post.', 'despero' ),
						'type' => 'select',
						'id' => $prefix . 'pagetitle_style',
						'options' => array(
							'' => esc_html__( 'Default', 'despero' ),
							'background-image' => esc_html__( 'Background Image', 'despero' ),
						),
					),
					'pagetitle_bg_color' => array(
						'title' 		=> esc_html__( 'Page Title Background Color', 'despero' ),
						'description' 	=> esc_html__( 'Select a color.', 'despero' ),
						'id' 			=> $prefix .'pagetitle_bg_color',
						'type' 			=> 'color',
						'default' 		=> '',
					),
					'pagetitle_bg_image' => array(
						'title' => esc_html__( 'Page Title Background Image', 'despero'),
						'description' => esc_html__( 'Select a custom header image for your main title.', 'despero' ),
						'id' => $prefix . 'pagetitle_bg_image',
						'type' => 'media',
					),
					'pagetitle_bg_repeat' => array(
						'title' 		=> esc_html__( 'Page Title Background Repeat', 'despero' ),
						'type' 			=> 'select',
						'id' 			=> $prefix . 'pagetitle_bg_repeat',
						'options' 		=> array(	
											''				=> esc_html__( 'Default', 'despero' ),
											'repeat'		=> esc_html__( 'Repeat', 'despero' ),
											'repeat-x'		=> esc_html__( 'Repeat-x', 'despero' ),
											'repeat-y'		=> esc_html__( 'Repeat-y', 'despero' ),
											'no-repeat' 	=> esc_html__( 'No Repeat',  'despero' )
										),
						'default' 		=> '',
					),
					'pagetitle_bg_attachment' => array(
						'title' 		=> esc_html__( 'Page Title Background Attachment', 'despero' ),
						'type' 			=> 'select',
						'id' 			=> $prefix . 'pagetitle_bg_attachment',
						'options' 		=> array(	
											''			=> esc_html__( 'Default', 'despero' ),
											'scroll'	=> esc_html__( 'Scroll', 'despero' ),
											'fixed'		=> esc_html__( 'Fixed', 'despero' )
										),
						'default' 		=> '',
					),
					'pagetitle_bg_position' => array(
						'title' 		=> esc_html__( 'Page Title Background Position', 'despero' ),
						'type' 			=> 'select',
						'id' 			=> $prefix . 'pagetitle_bg_position',
						'options' 		=> array(	
											''				=> esc_html__( 'Default', 'despero' ),
											'left top' 		=> esc_html__( 'Left Top', 'despero' ),
											'left center' 	=> esc_html__( 'Left Center', 'despero' ),
											'left bottom' 	=> esc_html__( 'Left Bottom', 'despero' ),
											'center top' 	=> esc_html__( 'Center Top', 'despero' ),
											'center center' => esc_html__( 'Center Center', 'despero' ),
											'center bottom' => esc_html__( 'Center Bottom', 'despero' ),
											'right top' 	=> esc_html__( 'Right Top', 'despero' ),
											'right center' 	=> esc_html__( 'Right Center', 'despero' ),
											'right bottom' 	=> esc_html__( 'Right Bottom', 'despero' )
										),
						'default' 		=> '',
					),
					'pagetitle_bg_full' => array(
						'title' 		=> esc_html__( 'Page Title Background Size', 'despero' ),
						'type' 			=> 'select',
						'id' 			=> $prefix . 'pagetitle_bg_full',
						'options' 		=> array(	
											''				=> esc_html__( 'Default', 'despero' ),
											'inherit' 		=> esc_html__( 'Inherit', 'despero' ),
											'cover' 		=> esc_html__( 'Cover', 'despero' )
										),
						'default' 		=> '',
					),
					'pagetitle_bg_image_parallax' => array(
						'title' 		=> esc_html__( 'Parallax Effect', 'despero' ),
						'description' 	=> esc_html__( 'Enable this to the parallax effect for background image.', 'despero' ),
						'type' 			=> 'select',
						'id' 			=> $prefix . 'pagetitle_bg_image_parallax',
						'options' 		=> array(	
											''		 		=> esc_html__( 'Default', 'despero' ),
											'disable' 		=> esc_html__( 'Disable', 'despero' ),
											'enable' 		=> esc_html__( 'Enable', 'despero' )
										),
						'default' 		=> '',
					),
					'pagetitle_text_color' => array(
						'title' 		=> esc_html__( 'Page Title Text Color', 'despero' ),
						'description' 	=> esc_html__( 'Select a text color.', 'despero' ),
						'id' 			=> $prefix .'pagetitle_text_color',
						'type' 			=> 'color',
						'default' 		=> '',
					),
					
					'breadcrumbs' => array(
						'title' => esc_html__( 'Breadcrumbs', 'despero' ),
						'description' => esc_html__( 'Enable or disable breadcrumbs on this page or post.', 'despero' ),
						'id' => $prefix . 'breadcrumbs',
						'type' => 'select',
						'options' => $this->get_element_visibly(),
						'default' => '',
					),
				),
			);
			

			// Footer tab
			$array['footer'] = array(
				'title' => esc_html__( 'Footer', 'despero' ),
				'post_type' => array( 'page' ),
				'settings' => array(
					'enable_prefooter' => array(
						'title' => esc_html__( 'Prefooter Area', 'despero' ),
						'description' => esc_html__( 'Show or hide prefooter area.', 'despero' ),
						'id' => $prefix . 'enable_prefooter',
						'type' => 'select',
						'options' => $this->get_element_visibly(),
						'default' => '',
					),
					'footer' => array(
						'title' => esc_html__( 'Footer Area', 'despero' ),
						'description' => esc_html__( 'Show or hide Footer Area.', 'despero' ),
						'id' => $prefix . 'footer',
						'type' => 'select',
						'options' => $this->get_element_visibly(),
						'default' => '',
					),
					'footer_layout' => array(
						'title' => esc_html__( 'Footer Layout', 'despero' ),
						'id' => $prefix . 'footer_layout',
						'type' => 'select',
						'description' => esc_html__( 'You can choose between a full width style or a boxed style footer.', 'despero' ),
						'options' => array(
							'' => esc_html__( 'Default', 'despero' ),
							'full_width' => esc_html__( 'Full Width', 'despero' ),
							'boxed' => esc_html__( 'Boxed', 'despero' )
						),
						'default' => '',
					),
				),
			);
		}

		// Post tab
		$array['media'] = array(
			'title' => esc_html__( 'Post', 'despero' ),
			'post_type' => array( 'post' ),
			'settings' => array(
				'metro' => array(
					'title' => esc_html__( 'Masonry Item Sizing', 'despero' ),
					'description' => esc_html__( 'This will only be used if you choose to display your Blog Posts in the "Metro Style" in element settings', 'despero' ),
					'id' => $prefix . 'metro',
					'type' => 'select',
					'options' => array(
						'' => esc_html__( 'Default', 'despero' ),
						'width2' => esc_html__( 'Double Width', 'despero' ),
						'height2' => esc_html__( 'Double Height', 'despero' ),
						'wh2' => esc_html__( 'Double Width and Height', 'despero' ),
					),
					'default' => '',
				),
				'post_single_style' => array(
					'title' => esc_html__( 'Featured Image Style', 'despero' ),
					'description' => esc_html__( 'Select the style of a single post page. featured image in full screen or standard', 'despero' ),
					'id' => $prefix . 'post_single_style',
					'type' => 'select',
					'options' => array(
						'' => esc_html__( 'Default', 'despero' ),
						'fullscreen' => esc_html__( 'Full screen', 'despero' ),
					),
				),
				'post_quote_text' => array(
					'title' => esc_html__( 'Quote', 'despero' ),
					'description' => esc_html__( 'Write your quote in this field. Will show only for Quote Post Format.', 'despero' ),
					'id' => $prefix . 'post_quote_text',
					'type' => 'textarea',
					'rows' => '2',
				),
				'post_quote_author' => array(
					'title' => esc_html__( 'Quote Author', 'despero' ),
					'description' => esc_html__( 'Write your quote author in this field. Will show only for Quote Post Format.', 'despero' ),
					'id' => $prefix . 'post_quote_author',
					'type' => 'text',
				),
				'post_quote_author_position' => array(
					'title' => esc_html__( 'Quote Author Position', 'despero' ),
					'description' => esc_html__( 'Write your quote author position in this field. Will show only for Quote Post Format.', 'despero' ),
					'id' => $prefix . 'post_quote_author_position',
					'type' => 'text',
				),
				'post_link' => array(
					'title' => esc_html__( 'Link', 'despero' ),
					'description' => esc_html__( 'Write your link in this field. Will show only for Link Post Format.', 'despero' ),
					'id' => $prefix . 'post_link',
					'type' => 'text',
				),
				'post_gallery' => array(
					'title' => esc_html__( 'Gallery', 'despero' ),
					'description' => esc_html__( 'Select the images that should be upload to this gallery. Will show only for Gallery Post Format.', 'despero' ),
					'id' => 'gallery_image_ids',
					'type' => 'gallery',
				),
				'post_video_embed' => array(
					'title' => esc_html__( 'Video Embed Code', 'despero' ),
					'description' => esc_html__( 'Insert Youtube or Vimeo embed code. Videos will show only for Video Post Format.', 'despero' ),
					'id' => $prefix . 'post_video_embed',
					'type' => 'textarea',
					'rows' => '2',
				),
				'post_audio_embed' => array(
					'title' => esc_html__( 'Audio Embed Code', 'despero' ),
					'description' => esc_html__( 'Insert audio embed code. Audios will show only for Audio Post Format.', 'despero' ),
					'id' => $prefix . 'post_audio_embed',
					'type' => 'textarea',
					'rows' => '2',
				),
			),
		);


		// Portfolio Tab
		if ( class_exists( 'evatheme_core' ) ) {
			$array['portfolio'] = array(
				'title' => esc_html__( 'Portfolio', 'despero' ),
				'post_type' => array( 'portfolio' ),
				'settings' => array(
					'portfolio_single_layout' => array(
						'title' => esc_html__( 'Layout', 'despero' ),
						'description' => esc_html__( 'Select page layout for single portfolio', 'despero' ),
						'id' => $prefix . 'portfolio_single_layout',
						'type' => 'select',
						'options' => array(
							'full_width' => esc_html__( 'Full width (Description on top, images bottom)', 'despero' ),
							'half_width' => esc_html__( 'Half width (Description right, images left)', 'despero' ),
						),
					),
					'portfolio_single_client' => array(
						'title' => esc_html__( 'Client', 'despero' ),
						'description' => '',
						'id' => $prefix . 'portfolio_single_client',
						'type' => 'text',
					),
					'portfolio_single_add_field_title' => array(
						'title' => esc_html__( 'Additional Field Title', 'despero' ),
						'description' => '',
						'id' => $prefix . 'portfolio_single_add_field_title',
						'type' => 'text',
					),
					'portfolio_single_add_field' => array(
						'title' => esc_html__( 'Additional Field', 'despero' ),
						'description' => '',
						'id' => $prefix . 'portfolio_single_add_field',
						'type' => 'text',
					),
					'portfolio_single_add_field_title2' => array(
						'title' => esc_html__( 'Additional Field Title 2', 'despero' ),
						'description' => '',
						'id' => $prefix . 'portfolio_single_add_field_title2',
						'type' => 'text',
					),
					'portfolio_single_add_field2' => array(
						'title' => esc_html__( 'Additional Field 2', 'despero' ),
						'description' => '',
						'id' => $prefix . 'portfolio_single_add_field2',
						'type' => 'text',
					),
					'portfolio_single_add_field_title3' => array(
						'title' => esc_html__( 'Additional Field Title 3', 'despero' ),
						'description' => '',
						'id' => $prefix . 'portfolio_single_add_field_title3',
						'type' => 'text',
					),
					'portfolio_single_add_field3' => array(
						'title' => esc_html__( 'Additional Field 3', 'despero' ),
						'description' => '',
						'id' => $prefix . 'portfolio_single_add_field3',
						'type' => 'text',
					),
					'portfolio_single_link' => array(
						'title' => esc_html__( 'Link', 'despero' ),
						'description' => '',
						'id' => $prefix . 'portfolio_single_link',
						'type' => 'text',
					),
					'portfolio_single_link_name' => array(
						'title' => esc_html__( 'Link Name', 'despero' ),
						'description' => '',
						'id' => $prefix . 'portfolio_single_link_name',
						'type' => 'text',
					),
					'posrtfolio_single_iframe' => array(
						'title' => esc_html__( 'Embed Code', 'despero' ),
						'description' => esc_html__( 'Insert your embed/iframe code.', 'despero' ),
						'id' => $prefix . 'posrtfolio_single_iframe',
						'type' => 'code',
						'rows' => '2',
					),
					'portfolio_single_gallery' => array(
						'title' => esc_html__( 'Gallery', 'despero' ),
						'description' => esc_html__( 'Select the images that should be upload to this gallery. Will show only for Gallery Post Format.', 'despero' ),
						'id' => 'gallery_image_ids',
						'type' => 'gallery',
					),
					'portfolio_single_carousel_enable' => array(
						'title' => esc_html__( 'Gallery Carousel', 'despero' ),
						'description' => esc_html__( 'Enable this to show images in carousel.', 'despero' ),
						'id' => $prefix . 'portfolio_single_carousel_enable',
						'type' => 'select',
						'options' => array(
							'enable' => esc_html__( 'Enable', 'despero' ),
							'disable' => esc_html__( 'Disable', 'despero' ),
						),
					),
					'portfolio_single_carousel_layout' => array(
						'title' => esc_html__( 'Gallery Layout', 'despero' ),
						'description' => esc_html__( 'Enable this to show full width carousel. Only for "Full Width Layout"', 'despero' ),
						'id' => $prefix . 'portfolio_single_carousel_layout',
						'type' => 'select',
						'options' => array(
							'boxed' => esc_html__( 'Boxed', 'despero' ),
							'full_width' => esc_html__( 'Full_width', 'despero' ),
						),
					),
					'portfolio_single_grid_pullleft' => array(
						'title' => esc_html__( 'Images Position', 'despero' ),
						'description' => esc_html__( 'Enable the option to press all of the images to the left side of the monitor. Only for "Gallery Carousel -> Disable"', 'despero' ),
						'id' => $prefix . 'portfolio_single_grid_pullleft',
						'type' => 'select',
						'options' => array(
							'disable' => esc_html__( 'Disable', 'despero' ),
							'enable' => esc_html__( 'Enable', 'despero' ),
						),
					),
				),
			);
		}
		
		//	WooCommerce
		if ( class_exists( 'woocommerce' ) ) {
			$array['product'] = array(
				'title'    	=> esc_html__( 'Product Video', 'despero' ),
				'post_type' => array( 'product' ),
				'settings' 	=> array(
					'product_video_url' => array(
						'title' => esc_html__( 'Video URL', 'despero' ),
						'description' => esc_html__( 'Enter URL of Youtube or Vimeo or specific filetypes such as mp4, m4v, webm, ogv, wmv, flv.', 'despero' ),
						'id' => $prefix . 'product_video_url',
						'type' => 'text',
						'default' => false,
					),
					'product_video_thumbnail' => array(
						'title' => esc_html__( 'Video Thumbnail', 'despero' ),
						'description' => esc_html__( 'Add video thumbnail', 'despero' ),
						'id' => $prefix . 'product_video_thumbnail',
						'type' => 'media',
						'default' => false,
					),
				),
			);
		}
		
		if (get_page_template_slug() == "page-comingsoon.php") {
			
			//	Coming Soon Tab
			$despero_comings_soon_years = array('2016'=>'2016','2017'=>'2017','2018'=>'2018','2019'=>'2019','2020'=>'2020');
			$despero_comings_soon_months = array(
				'01'=>esc_html__('January','despero'),'02'=>esc_html__('February','despero'),'03'=>esc_html__('March','despero'),
				'04'=>esc_html__('April','despero'),'05'=>esc_html__('May','despero'),'06'=>esc_html__('June','despero'),
				'07'=>esc_html__('July','despero'),'08'=>esc_html__('August','despero'),'09'=>esc_html__('Septempber','despero'),
				'10'=>esc_html__('October','despero'),'11'=>esc_html__('November','despero'),'12'=>esc_html__('December','despero'));
			$despero_comings_soon_days = array(
				'01' => '1','02' => '2','03' => '3','04' => '4','05' => '5',
				'06' => '6','07' => '7','08' => '8','09' => '9','10' => '10',
				'11' => '11','12' => '12','13' => '13','14' => '14','15' => '15',
				'16' => '16','17' => '17','18' => '18','19' => '19','20' => '20',
				'21' => '21','22' => '22','23' => '23','24' => '24','25' => '25',
				'26' => '26','27' => '27','28' => '28','29' => '29','30' => '30','31' => '31',
			);
			
			$array['coming_soon'] = array(
				'title' => esc_html__( 'Coming Soon', 'despero' ),
				'post_type' => array( 'page' ),
				'settings' => array(
					'coming_soon_years' => array(
						'title' => esc_html__( 'Years', 'despero' ),
						'description' => '',
						'id' => $prefix . 'comings_soon_years',
						'type' => 'select',
						'options' => $despero_comings_soon_years,
						'default' => '2020',
					),
					'coming_soon_months' => array(
						'title' => esc_html__( 'Months', 'despero' ),
						'description' => '',
						'id' => $prefix . 'comings_soon_months',
						'type' => 'select',
						'options' => $despero_comings_soon_months,
						'default' => '01',
					),
					'coming_soon_days' => array(
						'title' => esc_html__( 'Days', 'despero' ),
						'description' => '',
						'id' => $prefix . 'comings_soon_days',
						'type' => 'select',
						'options' => $despero_comings_soon_days,
						'default' => '01',
					),
					'coming_soon_subtitle' => array(
						'title' => esc_html__( 'Subtitle', 'despero' ),
						'description' => '',
						'id' => $prefix . 'coming_soon_subtitle',
						'type' => 'text',
						'default' => 'The site is under construction',
					),
					'coming_soon_title' => array(
						'title' => esc_html__( 'Title', 'despero' ),
						'description' => '',
						'id' => $prefix . 'coming_soon_title',
						'type' => 'text',
						'default' => 'Coming Soon',
					),
					'coming_soon_descr' => array(
						'title' => esc_html__( 'Description', 'despero' ),
						'description' => '',
						'id' => $prefix . 'coming_soon_descr',
						'type' => 'text',
						'default' => 'If you have any questions please contact us by e-mail:',
					),
					'coming_soon_email' => array(
						'title' => esc_html__( 'E-mail', 'despero' ),
						'description' => '',
						'id' => $prefix . 'coming_soon_email',
						'type' => 'text',
						'default' => 'info@evatheme.com',
					),
					'coming_soon_bg_color' => array(
						'title' 		=> esc_html__( 'Background Color', 'despero' ),
						'description' 	=> '',
						'id' 			=> $prefix .'coming_soon_bg_color',
						'type' 			=> 'color',
						'default' 		=> '#4c4e50',
					),
					'coming_soon_bg_image' => array(
						'title' => esc_html__( 'Background Image', 'despero'),
						'description' => '',
						'id' => $prefix . 'coming_soon_bg_image',
						'type' => 'media',
					),
					'coming_soon_bg_repeat' => array(
						'title' 		=> esc_html__( 'Background Repeat', 'despero' ),
						'type' 			=> 'select',
						'id' 			=> $prefix . 'coming_soon_bg_repeat',
						'options' 		=> array(	
											'repeat'		=> esc_html__( 'Repeat', 'despero' ),
											'repeat-x'		=> esc_html__( 'Repeat-x', 'despero' ),
											'repeat-y'		=> esc_html__( 'Repeat-y', 'despero' ),
											'no-repeat' 	=> esc_html__( 'No Repeat',  'despero' )
										),
						'default' 		=> 'no-repeat',
					),
					'coming_soon_bg_attachment' => array(
						'title' 		=> esc_html__( 'Background Attachment', 'despero' ),
						'type' 			=> 'select',
						'id' 			=> $prefix . 'coming_soon_bg_attachment',
						'options' 		=> array(	
											'scroll'	=> esc_html__( 'Scroll', 'despero' ),
											'fixed'		=> esc_html__( 'Fixed', 'despero' )
										),
						'default' 		=> 'scroll',
					),
					'coming_soon_bg_position' => array(
						'title' 		=> esc_html__( 'Background Position', 'despero' ),
						'type' 			=> 'select',
						'id' 			=> $prefix . 'coming_soon_bg_position',
						'options' 		=> array(	
											'left top' 		=> esc_html__( 'Left Top', 'despero' ),
											'left center' 	=> esc_html__( 'Left Center', 'despero' ),
											'left bottom' 	=> esc_html__( 'Left Bottom', 'despero' ),
											'center top' 	=> esc_html__( 'Center Top', 'despero' ),
											'center center' => esc_html__( 'Center Center', 'despero' ),
											'center bottom' => esc_html__( 'Center Bottom', 'despero' ),
											'right top' 	=> esc_html__( 'Right Top', 'despero' ),
											'right center' 	=> esc_html__( 'Right Center', 'despero' ),
											'right bottom' 	=> esc_html__( 'Right Bottom', 'despero' )
										),
						'default' 		=> 'center center',
					),
					'coming_soon_bg_full' => array(
						'title' 		=> esc_html__( 'Background Size', 'despero' ),
						'type' 			=> 'select',
						'id' 			=> $prefix . 'coming_soon_bg_full',
						'options' 		=> array(	
											'inherit' 		=> esc_html__( 'Inherit', 'despero' ),
											'cover' 		=> esc_html__( 'Cover', 'despero' )
										),
						'default' 		=> 'cover',
					),
				),
			);
		}

		// Apply filter & return settings array
		return apply_filters( 'evatheme_core_metabox_array', $array, $post );

	}

}

// Start class if enabled => Filter can be used to disable class for certain users
new evatheme_core_Post_Metaboxes();