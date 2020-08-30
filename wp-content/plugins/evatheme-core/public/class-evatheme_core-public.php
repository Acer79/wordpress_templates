<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://evatheme.com/
 * @since      1.0.0
 *
 * @package    Evatheme_core
 * @subpackage Evatheme_core/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Evatheme_core
 * @subpackage Evatheme_core/public
 */
class evatheme_core_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in evatheme_core_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The evatheme_core_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/evatheme_core-public.css', array(), $this->version, 'all' );
		
		wp_register_style( 'justified-gallery', plugin_dir_url( __FILE__ ) . 'css/justifiedGallery.min.css', array(), '3.6.3', 'all');
		
		wp_register_style( 'evatheme_core-splitslider', plugin_dir_url( __FILE__ ) . 'css/evatheme_core-splitslider.css', array(), false, 'all');
		
		wp_register_style( 'evatheme_core-element-gallery', plugin_dir_url( __FILE__ ) . 'css/evatheme_core-element-gallery.css', array(), false, 'all');

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in evatheme_core_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The evatheme_core_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/evatheme_core-public.js', array( 'jquery' ), $this->version, false );
		
		wp_register_script( 'justified-gallery', plugin_dir_url( __FILE__ ) . 'js/jquery.justifiedGallery.min.js', array( 'jquery' ), '3.6.3', true);
		
		wp_register_script( 'evatheme_core-appeared', plugin_dir_url( __FILE__ ) . 'js/evatheme_core-appeared.js', array( 'jquery' ), false, true);
		
		wp_register_script( 'evatheme_core-splitslider', plugin_dir_url( __FILE__ ) . 'js/evatheme_core-splitslider.js', array( 'jquery' ), false, true);

	}

}
