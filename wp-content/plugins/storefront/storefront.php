<?php
/**
 * Plugin Name:     Storefront
 * Plugin URI:      https://weatherforddigital.com
 * Description:     PLUGIN DESCRIPTION HERE
 * Author:          Carla Chalmers
 * Author URI:      https://weatherforddigital.com
 * Text Domain:     storefront
 * Domain Path:     /languages
 * Version:         0.1.0
 *
 * @package         Storefront
 */

// Include ACF in plugin

// Define path and URL to the ACF plugin.
define( 'MY_ACF_PATH', plugin_dir_path(__FILE__) . '/includes/acf/' );
define( 'MY_ACF_URL', plugin_dir_url(__FILE__) . '/includes/acf/' );

// Include the ACF plugin.
include_once( MY_ACF_PATH . 'acf.php' );

// Customize the url setting to fix incorrect asset URLs.
add_filter('acf/settings/url', 'my_acf_settings_url');
function my_acf_settings_url( $url ) {
    return MY_ACF_URL;
}

// (Optional) Hide the ACF admin menu item.
add_filter('acf/settings/show_admin', '__return_true');

// When including the PRO plugin, hide the ACF Updates menu
add_filter('acf/settings/show_updates', '__return_false', 100);

function my_acf_json_save_point( $path ) {
    return plugin_dir_path(__FILE__) . '/acf-json';
}
add_filter( 'acf/settings/save_json', 'my_acf_json_save_point' );
