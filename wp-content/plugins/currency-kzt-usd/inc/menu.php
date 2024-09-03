<?php
add_action('admin_menu', 'kzt_usd_add_admin_menu');
function kzt_usd_add_admin_menu() {
	add_submenu_page(
		'options-general.php',
		'Курс KZT',
		'Курс KZT',
		'manage_options',
		'kzt-usd-page',
		'kzt_usd_page',
		100
	);
}

function kzt_usd_page() {
	require_once CURRENCYKZTUSD_PLUGIN_PATH . 'inc/kzt_usd_page.php';
}
