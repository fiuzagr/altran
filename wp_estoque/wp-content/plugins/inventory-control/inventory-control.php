<?php
/*
Plugin Name: Inventory Control
Plugin URI: http://fiuzagr.github.io/wp_ic
Description: Inventory Control.
Version: 1.0.0
Author: Fiuzagr
Author URI: http://fiuzagr.github.io/
License: GPLv2 or later
Text Domain: inventory-control
Domain Path: /languages
*/

// Make sure we don't expose any info if called directly
if (!function_exists('add_action')) {
    exit('Just a wordpress plugin.');
}

define('IC_VERSION', '1.0.0');
define('IC_PLUGIN_DIR', plugin_dir_path(__FILE__));
define('IC_VIEWS_DIR', IC_PLUGIN_DIR . 'views/');

require 'autoload.php';

new \InventoryControl\Inventory();

