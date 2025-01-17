<?php

/**
 * Cart Page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 7.9.0
 */

defined('ABSPATH') || exit;

?>


<?php do_action('woocommerce_before_cart');  ?>

<section class="cart-page">
	<div class="container">
		<form action="<?php echo esc_url(wc_get_cart_url()); ?>" method="post">
			<div class="table-responsive">
				<?php do_action('woocommerce_before_cart_table'); ?>

				<table class="table cart-page__table" cellspacing="0">
					<thead>
						<tr>
							<th><?php esc_html_e('Product', 'woocommerce'); ?></th>
							<th><?php esc_html_e('Price', 'woocommerce'); ?></th>
							<th><?php esc_html_e('Quantity', 'woocommerce'); ?></th>
							<th><?php esc_html_e('Subtotal', 'woocommerce'); ?></th>
							<th><span class="screen-reader-text"><?php esc_html_e('Remove item', 'woocommerce'); ?></span></th>
						</tr>
					</thead>
					<tbody>
						<?php do_action('woocommerce_before_cart_contents'); ?>

						<?php
						foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) {
							$_product   = apply_filters('woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key);
							$product_id = apply_filters('woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key);
							/**
							 * Filter the product name.
							 *
							 * @since 2.1.0
							 * @param string $product_name Name of the product in the cart.
							 * @param array $cart_item The product in the cart.
							 * @param string $cart_item_key Key for the product in the cart.
							 */
							$product_name = apply_filters('woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key);

							if ($_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters('woocommerce_cart_item_visible', true, $cart_item, $cart_item_key)) {
								$product_permalink = apply_filters('woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink($cart_item) : '', $cart_item, $cart_item_key);
						?>
								<tr class="woocommerce-cart-form__cart-item <?php echo esc_attr(apply_filters('woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key)); ?>">



									<td data-title="<?php esc_attr_e('Product', 'woocommerce'); ?>">
										<div class="cart-page__table__meta">
											<div class="cart-page__table__meta-img">
												<?php
												$thumbnail = apply_filters('woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key);

												if (!$product_permalink) {
													echo $thumbnail; // PHPCS: XSS ok.
												} else {
													printf('<a href="%s">%s</a>', esc_url($product_permalink), $thumbnail); // PHPCS: XSS ok.
												}
												?>
											</div>
											<h3 class="cart-page__table__meta-title">
												<?php
												if (!$product_permalink) {
													echo wp_kses_post($product_name . '&nbsp;');
												} else {
													/**
													 * This filter is documented above.
													 *
													 * @since 2.1.0
													 */
													echo wp_kses_post(apply_filters('woocommerce_cart_item_name', sprintf('<a  href="%s">%s</a>', esc_url($product_permalink), $_product->get_name()), $cart_item, $cart_item_key));
												}

												do_action('woocommerce_after_cart_item_name', $cart_item, $cart_item_key);

												// Meta data.
												echo wc_get_formatted_cart_item_data($cart_item); // PHPCS: XSS ok.

												// Backorder notification.
												if ($_product->backorders_require_notification() && $_product->is_on_backorder($cart_item['quantity'])) {
													echo wp_kses_post(apply_filters('woocommerce_cart_item_backorder_notification', '<p class="backorder_notification">' . esc_html__('Available on backorder', 'woocommerce') . '</p>', $product_id));
												}
												?>
											</h3>
										</div>

									</td>

									<td data-title="<?php esc_attr_e('Price', 'woocommerce'); ?>">
										<?php
										echo apply_filters('woocommerce_cart_item_price', WC()->cart->get_product_price($_product), $cart_item, $cart_item_key); // PHPCS: XSS ok.
										?>
									</td>

									<td data-title="<?php esc_attr_e('Quantity', 'woocommerce'); ?>">
										<?php
										if ($_product->is_sold_individually()) {
											$min_quantity = 1;
											$max_quantity = 1;
										} else {
											$min_quantity = 0;
											$max_quantity = $_product->get_max_purchase_quantity();
										}

										$product_quantity = woocommerce_quantity_input(
											array(
												'input_name'   => "cart[{$cart_item_key}][qty]",
												'input_value'  => $cart_item['quantity'],
												'max_value'    => $max_quantity,
												'min_value'    => $min_quantity,
												'product_name' => $product_name,
											),
											$_product,
											false
										);

										echo apply_filters('woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item); // PHPCS: XSS ok.
										?>
									</td>

									<td data-title="<?php esc_attr_e('Subtotal', 'woocommerce'); ?>">
										<?php
										echo apply_filters('woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal($_product, $cart_item['quantity']), $cart_item, $cart_item_key); // PHPCS: XSS ok.
										?>
									</td>

									<td>
										<?php
										echo apply_filters( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
											'woocommerce_cart_item_remove_link',
											sprintf(
												'<a href="%s" class="btn btn-sm btn-primary" aria-label="%s" data-product_id="%s" data-product_sku="%s">&times;</a>',
												esc_url(wc_get_cart_remove_url($cart_item_key)),
												/* translators: %s is the product name */
												esc_attr(sprintf(__('Remove %s from cart', 'woocommerce'), wp_strip_all_tags($product_name))),
												esc_attr($product_id),
												esc_attr($_product->get_sku())
											),
											$cart_item_key
										);
										?>
									</td>
								</tr>
						<?php
							}
						}
						?>

						<?php do_action('woocommerce_cart_contents'); ?>


						<?php do_action('woocommerce_after_cart_contents'); ?>
					</tbody>
				</table>
				<div class="row">
					<div class="col-xl-8 col-lg-7">
						<?php if (wc_coupons_enabled()) { ?>
							<form action="#" class="cart-page__coupone-form">

								<input type="text" placeholder="<?php esc_attr_e('Coupon code', 'woocommerce'); ?>" class="cart-cupon__input">
								<button type="submit" class="eduact-btn eduact-btn-second"><span class="eduact-btn__curve"></span><?php esc_html_e('Apply coupon', 'woocommerce'); ?><i class="icon-arrow"></i></button>
								<?php do_action('woocommerce_cart_coupon'); ?>
							</form>
						<?php } ?>
					</div>
					<div class="col-xl-4 col-lg-5">

						<ul class="cart-page__cart-total list-unstyled">
							<li><span><?php esc_html_e('Subtotal', 'woocommerce'); ?></span><span class="cart-page__cart-total-amount" data-title="<?php esc_attr_e('Subtotal', 'woocommerce'); ?>"><?php wc_cart_totals_subtotal_html(); ?></span></li>
							<?php foreach (WC()->cart->get_coupons() as $code => $coupon) : ?>
								<li><span><?php wc_cart_totals_coupon_label($coupon); ?></span><span class="cart-page__cart-total-amount" data-title="<?php echo esc_attr(wc_cart_totals_coupon_label($coupon, false)); ?>"><?php wc_cart_totals_coupon_html($coupon); ?></span></li>
							<?php endforeach; ?>
							<?php if (WC()->cart->needs_shipping() && WC()->cart->show_shipping()) : ?>

								<?php do_action('woocommerce_cart_totals_before_shipping'); ?>

								<?php wc_cart_totals_shipping_html(); ?>

								<?php do_action('woocommerce_cart_totals_after_shipping'); ?>

							<?php elseif (WC()->cart->needs_shipping() && 'yes' === get_option('woocommerce_enable_shipping_calc')) : ?>
								<li><span><?php esc_html_e('Shipping', 'woocommerce'); ?></span><span class="cart-page__cart-total-amount" data-title="<?php esc_attr_e('Shipping', 'woocommerce'); ?>"><?php woocommerce_shipping_calculator(); ?></span></li>
							<?php endif; ?>
							<?php foreach (WC()->cart->get_fees() as $fee) : ?>
								<li><span><?php echo esc_html($fee->name); ?></span><span class="cart-page__cart-total-amount" data-title="<?php echo esc_attr($fee->name); ?>"><?php wc_cart_totals_fee_html($fee); ?></span></li>
							<?php endforeach; ?>
							<?php
							if (wc_tax_enabled() && !WC()->cart->display_prices_including_tax()) {
								$taxable_address = WC()->customer->get_taxable_address();
								$estimated_text  = '';

								if (WC()->customer->is_customer_outside_base() && !WC()->customer->has_calculated_shipping()) {
									/* translators: %s location. */
									$estimated_text = sprintf(' <small>' . esc_html__('(estimated for %s)', 'woocommerce') . '</small>', WC()->countries->estimated_for_prefix($taxable_address[0]) . WC()->countries->countries[$taxable_address[0]]);
								}

								if ('itemized' === get_option('woocommerce_tax_total_display')) {
									foreach (WC()->cart->get_tax_totals() as $code => $tax) { // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited
							?>
										<li><span><?php echo esc_html($tax->label) . $estimated_text; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped 
															?></span><span class="cart-page__cart-total-amount" data-title="<?php echo esc_attr($tax->label); ?>"><?php echo wp_kses_post($tax->formatted_amount); ?></span></li>
									<?php
									}
								} else {
									?>
									<li><span><?php echo esc_html(WC()->countries->tax_or_vat()) . $estimated_text; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped 
														?></span><span class="cart-page__cart-total-amount" data-title="<?php echo esc_attr(WC()->countries->tax_or_vat()); ?>"><?php wc_cart_totals_taxes_total_html(); ?></span></li>
							<?php
								}
							}
							?>
							<?php do_action('woocommerce_cart_totals_before_order_total'); ?>
							<li><span><?php esc_html_e('Total', 'woocommerce'); ?></span><span class="cart-page__cart-total-amount" data-title="<?php esc_attr_e('Total', 'woocommerce'); ?>"><?php wc_cart_totals_order_total_html(); ?></span></li>

							<?php do_action('woocommerce_cart_totals_after_order_total'); ?>
						</ul>
						<div class="cart-page__buttons">
							<button type="submit" class="eduact-btn eduact-btn-second update" name="update_cart" value="<?php esc_attr_e('Update cart', 'woocommerce'); ?>"><span class="eduact-btn__curve"></span> <?php esc_html_e('Update cart', 'woocommerce'); ?> </button>
							<div class="eduact-btn eduact-btn-second checkout"><span class="eduact-btn__curve"></span> <?php do_action('woocommerce_proceed_to_checkout'); ?></div>
						</div>
					</div>
				</div>
				<?php do_action('woocommerce_after_cart_table'); ?>
			</div>
		</form>
	</div>

</section>