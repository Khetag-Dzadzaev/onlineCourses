<?php

class Symoco_Init {
	public static function init() {
		add_action('plugins_loaded', [__CLASS__, 'Symoco']);
	}

	public static function Symoco() {
		if (!class_exists('WooCommerce')) {
			return;
		}
		add_filter('woocommerce_payment_gateways', [__CLASS__, 'add_gateway_class']);

		// require(SYMOCO_PLUGIN_DIR . 'inc/class-cloud-payments-api.php');
		require(SYMOCO_PLUGIN_DIR . 'inc/wc-symoco-gateway.php');
	}

	public static function add_gateway_class($methods) {
		$methods[] = 'WC_Symoco_Gateway';
		return $methods;
	}
}
