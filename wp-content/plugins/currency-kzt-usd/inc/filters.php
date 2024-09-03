<?php
// курс валюты в зависимости от куки
add_filter('woocommerce_currency', 'filter_woocommerce_currency', 200);
function filter_woocommerce_currency($currency) {
	if (isset($_COOKIE[CURRENCYKZTUSD_PLUGIN_COOKIE]) && $_COOKIE[CURRENCYKZTUSD_PLUGIN_COOKIE] === 'USD' && !is_admin()) {
		$currency = 'USD';
		return $currency;
	}
	return $currency;
}

// цена товара
add_filter('woocommerce_get_price_html', 'filter_woocommerce_get_price_html', 10, 2);
function filter_woocommerce_get_price_html($price, $product) {
	$product_type = $product->get_type();
	if ($_COOKIE[CURRENCYKZTUSD_PLUGIN_COOKIE] === 'USD' && !is_admin()) {
		if ($product_type === 'simple') {
			if (!empty($product->sale_price)) {
				return '<del>' . convert_kzt_to_usd($product->regular_price) . ' $</del> ' . convert_kzt_to_usd($product->sale_price) . ' $';
			}
			return convert_kzt_to_usd($product->regular_price) . ' $';
		}
		if ($product_type === 'variable') {
			if ($product->is_on_sale()) {
				return convert_kzt_to_usd($product->get_variation_sale_price('min')) . ' $ - ' . convert_kzt_to_usd($product->get_variation_sale_price('max')) . ' $';
			} else {
				return convert_kzt_to_usd($product->get_variation_regular_price('min')) . ' $ - ' . convert_kzt_to_usd($product->get_variation_regular_price('max')) . ' $';
			}
		}
	}
	return $price;
}


add_filter('woocommerce_cart_item_subtotal', 'filter_woocommerce_cart_item_subtotal', 10, 3);
function filter_woocommerce_cart_item_subtotal($subtotal, $cart_item, $cart_item_key) {
	if ($_COOKIE[CURRENCYKZTUSD_PLUGIN_COOKIE] === 'USD') {
		return convert_kzt_to_usd($cart_item['line_subtotal']) . ' $';
	}
	return $subtotal;
}

// товар в выполненом заказе и в лк
add_filter('woocommerce_order_formatted_line_subtotal', 'filter_order_formatted_line_subtotal', 10, 3);
function filter_order_formatted_line_subtotal($subtotal, $item, $order) {
	if ($_COOKIE[CURRENCYKZTUSD_PLUGIN_COOKIE] === 'USD') {
		return convert_kzt_to_usd($item['line_subtotal']) . ' $';
	}
	if ($_COOKIE[CURRENCYKZTUSD_PLUGIN_COOKIE] !== 'USD' && $order->currency === 'USD') {
		return $order->get_total() . ' ₸';
	}
	return $subtotal;
}

// итог и подытог в выполненом заказе и в лк
add_filter('woocommerce_get_order_item_totals', 'filter_woocommerce_get_order_item_totals', 10, 3);
function filter_woocommerce_get_order_item_totals($total_rows, $that, $tax_display) {
	if ($_COOKIE[CURRENCYKZTUSD_PLUGIN_COOKIE] === 'USD') {
		$total_rows['cart_subtotal']['value'] = convert_kzt_to_usd($that->get_total()) . ' $';
		$total_rows['order_total']['value'] = convert_kzt_to_usd($that->get_total()) . ' $';
	}
	if ($_COOKIE[CURRENCYKZTUSD_PLUGIN_COOKIE] !== 'USD' && $that->currency === 'USD') {

		$total_rows['cart_subtotal']['value'] = $that->get_total() . ' ₸';
		$total_rows['order_total']['value'] = $that->get_total() . ' ₸';
	}
	return $total_rows;
}

// итог в выполненом заказе и в лк
add_filter('woocommerce_get_formatted_order_total', 'filter_woocommerce_get_formatted_order_total', 10, 4);
function filter_woocommerce_get_formatted_order_total($formatted_total, $order, $tax_display, $display_refunded) {
	if ($_COOKIE[CURRENCYKZTUSD_PLUGIN_COOKIE] === 'USD' && !is_admin()) {
		$formatted_total = convert_kzt_to_usd($order->get_total()) . ' $';
	}
	if ($_COOKIE[CURRENCYKZTUSD_PLUGIN_COOKIE] === 'USD' && is_admin()) {
		return $order->get_total() . ' ₸';
	}
	if ($_COOKIE[CURRENCYKZTUSD_PLUGIN_COOKIE] !== 'USD' && $order->currency === 'USD') {
		return $order->get_total() . ' ₸';
	}

	return $formatted_total;
}

// в корзине карточка товара
add_filter('woocommerce_cart_item_price', 'filter_woocommerce_cart_item_price', 10, 3);
function filter_woocommerce_cart_item_price($price, $cart_item, $cart_item_key) {
	if ($_COOKIE[CURRENCYKZTUSD_PLUGIN_COOKIE] === 'USD') {
		return convert_kzt_to_usd($cart_item['data']->price) . ' $';
	}
	return $price;
}

// в корзине и в оформлении промежуточный итог
add_filter('woocommerce_cart_subtotal', 'filter_woocommerce_cart_subtotal', 10, 3);
function filter_woocommerce_cart_subtotal($cart_subtotal, $compound, $instance) {
	if ($_COOKIE[CURRENCYKZTUSD_PLUGIN_COOKIE] === 'USD') {
		return convert_kzt_to_usd(WC()->cart->total) . ' $';
	}
	return $cart_subtotal;
};

// в корзине и в оформлении итог
add_filter('woocommerce_cart_total', 'filter_woocommerce_cart_total', 10, 3);
function filter_woocommerce_cart_total($wc_price) {
	if ($_COOKIE[CURRENCYKZTUSD_PLUGIN_COOKIE] === 'USD') {
		return convert_kzt_to_usd(WC()->cart->total) . ' $';
	}
	return $wc_price;
};
