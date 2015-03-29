<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://wasielewski.org
 * @since      1.0.0
 *
 * @package    Buddypress_Lock_Profile_Fields
 * @subpackage Buddypress_Lock_Profile_Fields/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Buddypress_Lock_Profile_Fields
 * @subpackage Buddypress_Lock_Profile_Fields/public
 * @author     Zac Wasielewski <zac@wasielewski.org>
 */
class Buddypress_Lock_Profile_Fields_Public {

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
		 * defined in Buddypress_Lock_Profile_Fields_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Buddypress_Lock_Profile_Fields_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/buddypress-lock-profile-fields-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
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

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/buddypress-lock-profile-fields-public.js', array( 'jquery' ), $this->version, false );

	}

  public function get_locked_profile_fields() {
    return array(
      'ZIP', 'Phone'
    );
  }

  public function exclude_locked_field_ids( $ids_string ) {
    $locked_ids = $this->get_locked_field_ids( $this->get_locked_profile_fields() );
    $ids = explode(',',$ids_string);
    return implode(',',array_diff($ids, $locked_ids));
  }

  public function modify_locked_profile_field_type( $type ) {
    if ($this->is_the_profile_field_locked()) {
      //return 'locked';
    }
    return $type;
  }

  public function disable_locked_profile_fields( $attributes ) {
    if ($this->is_the_profile_field_locked()) {
      $attributes['disabled'] = 'disabled';
      $attributes['readonly'] = 'readonly';
    }
    return $attributes;
  }

  private function get_locked_field_ids( $locked_field_names ) {
    $ids = array();
    while ( bp_profile_fields() ): bp_the_profile_field();
      $field_name = bp_get_the_profile_field_name();
      if ( in_array($field_name, $locked_field_names )) {
        $ids[] = bp_get_the_profile_field_id();
      }
    endwhile;
    return $ids;
  }

  private function is_the_profile_field_locked() {
    $locked_field_names = $this->get_locked_profile_fields();
    $field_name = bp_get_the_profile_field_name();
    if ( in_array($field_name, $locked_field_names )) {
      return true;
    }
    return false;
  }

}
