<?php

/**
 * @package Symoco
 * 
 * Plugin Name:     Symoco for woo
 * Description:     Symoco
 * Version:         1.0.0
 */

if (!defined('ABSPATH')) {
	die;
}

define('SYMOCO_PLUGIN_FILENAME', __FILE__);
define('SYMOCO_PLUGIN_DIR', plugin_dir_path(__FILE__));
define('SYMOCO_PLUGIN_URL', plugin_dir_url(__FILE__));
// define('SYMOCO_PLUGIN_API_URL', 'https://api.symoco.com/v1/');

require(SYMOCO_PLUGIN_DIR . 'inc/class-symoco-init.php');

if (class_exists('Symoco_Init')) {
	Symoco_Init::init();
}
