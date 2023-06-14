<?php
/*
 * Plugin Name:       Frequently Brought Together
 * Plugin URI:        https://example.com/plugins/the-basics/
 * Description:       Handle the basics with the frequently brought products.
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Gokulakrishnan
 * Author URI:        https://author.example.com/
 * License:           GPL v3 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        https://example.com/my-plugin/
 * Text Domain:       Frequently Brought Together
 * Domain Path:       /languages
 */

defined('ABSPATH') || exit;

defined('FBT_PLUGIN_FILE') || define('FBT_PLUGIN_FILE', __FILE__);
defined('FBT_PLUGIN_PATH') || define('FBT_PLUGIN_PATH', plugin_dir_path(__FILE__));

// autoload files
if(file_exists(FBT_PLUGIN_PATH . '/vendor/autoload.php')) {
   require FBT_PLUGIN_PATH . 'vendor/autoload.php';
} else {
    wp_die('Error during autoload');
}


//calling Route
if (class_exists('FBT\app\Route')) {
    $route = new FBT\app\Route();
    $route->hook();
} else {
    wp_die('Error during calling route');
}


