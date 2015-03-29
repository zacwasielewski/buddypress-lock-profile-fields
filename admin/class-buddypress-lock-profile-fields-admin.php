<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://wasielewski.org
 * @since      1.0.0
 *
 * @package    Buddypress_Lock_Profile_Fields
 * @subpackage Buddypress_Lock_Profile_Fields/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Buddypress_Lock_Profile_Fields
 * @subpackage Buddypress_Lock_Profile_Fields/admin
 * @author     Zac Wasielewski <zac@wasielewski.org>
 */
class Buddypress_Lock_Profile_Fields_Admin {

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
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Buddypress_Lock_Profile_Fields_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Buddypress_Lock_Profile_Fields_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/buddypress-lock-profile-fields-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Buddypress_Lock_Profile_Fields_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Buddypress_Lock_Profile_Fields_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/buddypress-lock-profile-fields-admin.js', array( 'jquery' ), $this->version, false );

	}

	public function register_admin_menu() {

    add_options_page(
      __('Lock BuddyPress Profile Fields','buddypress-lock-profile-fields'),
      __('Lock BuddyPress Profile Fields','buddypress-lock-profile-fields'),
      'manage_options',
      'buddypress-lock-profile-fields',
      array( $this, 'admin_settings_page' )
    );
	
	}
	
	public function register_admin_settings() {
	  
    register_setting( 'buddypress-lock-profile-fields', 'locked_fields' );

    // set default values
    add_option( 'locked_fields', array() );

	}

  public function admin_settings_page() {
    $html = $this->get_partial( 'buddypress-lock-profile-fields-settings.php', array( 'plugin_admin' => $this ) );
    echo $html;
  }

	private function get_partial( $file, $variables = '' ) {
		$path = plugin_dir_path( __FILE__ ) . 'partials/' . $file ;
	  $partial = get_include_contents( $path, $variables );
	  return $partial;
	}

}
