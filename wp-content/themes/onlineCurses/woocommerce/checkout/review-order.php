<?php

/**
 * Review order table
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/review-order.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 5.2.0
 */

defined('ABSPATH') || exit;
?>

<div class="card-body">
	<h5 class="font-weight-medium mb-3"><?php esc_html_e('Product', 'woocommerce'); ?></h5>

	<?php
	do_action('woocommerce_review_order_before_cart_contents');

	foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) {
		$_product = apply_filters('woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key);

		if ($_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters('woocommerce_checkout_cart_item_visible', true, $cart_item, $cart_item_key)) {
	?>
			<div class="d-flex justify-content-between <?php echo esc_attr(apply_filters('woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key)); ?>">
				<p class="product-name"><?php echo wp_kses_post(apply_filters('woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key)) . '&nbsp;'; ?>
					<?php echo apply_filters('woocommerce_checkout_cart_item_quantity', ' <strong class="product-quantity">' . sprintf('&times;&nbsp;%s', $cart_item['quantity']) . '</strong>', $cart_item, $cart_item_key);	?>
					<?php echo wc_get_formatted_cart_item_data($cart_item); ?></p>
				<p class="product-total"><?php echo apply_filters('woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal($_product, $cart_item['quantity']), $cart_item, $cart_item_key); ?></p>
			</div>
	<?php
		}
	}
	do_action('woocommerce_review_order_after_cart_contents');
	?>

	<hr class="mt-0">
	<div class="d-flex justify-content-between mb-3 pt-1 cart-subtotal">
		<h6 class="font-weight-medium"><?php esc_html_e('Subtotal', 'woocommerce'); ?></h6>
		<h6 class="font-weight-medium"><?php wc_cart_totals_subtotal_html(); ?></h6>
	</div>

	<?php do_action('woocommerce_review_order_before_order_total'); ?>

	<div class="d-flex justify-content-between mb-3 pt-1 order-total">
		<h6 class="font-weight-medium"><?php esc_html_e('Total', 'woocommerce'); ?></h6>
		<h6 class="font-weight-medium"><?php wc_cart_totals_order_total_html(); ?></h6>
	</div>

	<?php do_action('woocommerce_review_order_after_order_total'); ?>

</div>