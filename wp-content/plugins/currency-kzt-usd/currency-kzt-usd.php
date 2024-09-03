<?php

/**
 * @package currency-kzt-usd
 * 
 * Plugin Name:     Валюта kzt to usd
 * Description:     Валюта kzt to usd
 * Version:         1.0
 */

if (!defined('ABSPATH')) {
	die;
}

add_action('plugins_loaded', function () {
	if (!class_exists('WooCommerce')) {
		return;
	}
});

define('CURRENCYKZTUSD_PLUGIN_NAME', plugin_basename(__FILE__));
define('CURRENCYKZTUSD_PLUGIN_PATH', plugin_dir_path(__FILE__));
define('CURRENCYKZTUSD_PLUGIN_URL', plugin_dir_url(__FILE__));
define('CURRENCYKZTUSD_PLUGIN_COOKIE', 'currency_kzt_usd_cookie');

if (!isset($_COOKIE[CURRENCYKZTUSD_PLUGIN_COOKIE])) {
	setcookie(CURRENCYKZTUSD_PLUGIN_COOKIE, "KZT", strtotime('+365 days'), '/');
}

function convert_kzt_to_usd($val) {
	$currencyKztUsdOption = get_option('currency_kzt_usd') ? get_option('currency_kzt_usd') : 450;
	return number_format(round($val / intval($currencyKztUsdOption), 2), 2);
}

require_once CURRENCYKZTUSD_PLUGIN_PATH . 'inc/menu.php';
require_once CURRENCYKZTUSD_PLUGIN_PATH . 'inc/scripts.php';
require_once CURRENCYKZTUSD_PLUGIN_PATH . 'inc/shortcode.php';
require_once CURRENCYKZTUSD_PLUGIN_PATH . 'inc/filters.php';
