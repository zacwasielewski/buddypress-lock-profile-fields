<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://wasielewski.org
 * @since             0.1.0
 * @package           Buddypress_Lock_Profile_Fields
 *
 * @wordpress-plugin
 * Plugin Name:       Lock BuddyPress Profile Fields
 * Plugin URI:        http://github.com/zacwasielewski/buddypress-lock-profile-fields
 * Description:       Lock editing of specific BuddyPress profile fields.
 * Version:           0.3.1
 * Author:            Zac Wasielewski
 * Author URI:        http://wasielewski.org
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       buddypress-lock-profile-fields
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-buddypress-lock-profile-fields-activator.php
 */
function activate_plugin_name() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-buddypress-lock-profile-fields-activator.php';
	Buddypress_Lock_Profile_Fields_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-buddypress-lock-profile-fields-deactivator.php
 */
function deactivate_plugin_name() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-buddypress-lock-profile-fields-deactivator.php';
	Buddypress_Lock_Profile_Fields_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_plugin_name' );
register_deactivation_hook( __FILE__, 'deactivate_plugin_name' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-buddypress-lock-profile-fields.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_plugin_name() {

	$plugin = new Buddypress_Lock_Profile_Fields();
	$plugin->run();

}
run_plugin_name();
