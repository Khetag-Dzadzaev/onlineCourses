<?php

add_action('wp_enqueue_scripts', 'currency_kzt_usd_wp_enqueue_scripts');
function currency_kzt_usd_wp_enqueue_scripts() {
	wp_enqueue_style('currency-kzt-usd', CURRENCYKZTUSD_PLUGIN_URL . 'assets/currency-kzt-usd.css');
	wp_enqueue_script('currency-kzt-usd', CURRENCYKZTUSD_PLUGIN_URL . 'assets/currency-kzt-usd.js');
	wp_add_inline_script('currency-kzt-usd', 'const currencyKztUsdName = ' . wp_json_encode(['currency_kzt_usd_name' => CURRENCYKZTUSD_PLUGIN_COOKIE]), 'before');
}
