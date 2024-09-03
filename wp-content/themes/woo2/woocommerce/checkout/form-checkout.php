<?php

/**
 * Checkout Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-checkout.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.0
 */

if (!defined('ABSPATH')) {
	exit;
}



// If checkout registration is disabled and not logged in, the user cannot checkout.
if (!$checkout->is_registration_enabled() && $checkout->is_registration_required() && !is_user_logged_in()) {
	echo esc_html(apply_filters('woocommerce_checkout_must_be_logged_in_message', __('You must be logged in to checkout.', 'woocommerce')));
	return;
}

?>
<div class="container-fluid bg-secondary mb-5">
	<div class="inner-first d-flex flex-column align-items-center justify-content-center">
		<h1 class="font-weight-semi-bold text-uppercase mb-3"><?php the_title(); ?></h1>
		<?php echo get_template_part("template_parts/breadcrumb-block"); ?>
	</div>
</div>
<?php do_action('woocommerce_before_checkout_form', $checkout); ?>

<div class="container-fluid pt-5">
	<form name="checkout" method="post" class="checkout woocommerce-checkout" action="<?php echo esc_url(wc_get_checkout_url()); ?>" enctype="multipart/form-data">

		<?php if ($checkout->get_checkout_fields()) : ?>

			<?php do_action('woocommerce_checkout_before_customer_details'); ?>
			<div class="row px-xl-5">
				<div class="col-lg-8" id="customer_details">
					<div class="mb-4">
						<?php do_action('woocommerce_checkout_billing'); ?>
						<?php do_action('woocommerce_checkout_shipping'); ?>
					</div>
				</div>
				<div class="col-lg-4">
					<?php do_action('woocommerce_checkout_before_order_review_heading'); ?>

					<div class="card-header bg-secondary border-0">
						<h4 id="order_review_heading" class="font-weight-semi-bold m-0"><?php esc_html_e('Your order', 'woocommerce'); ?></h4>
					</div>


					<?php do_action('woocommerce_checkout_before_order_review'); ?>

					<div id="order_review" class="woocommerce-checkout-review-order">
						<?php do_action('woocommerce_checkout_order_review'); ?>
					</div>

					<?php do_action('woocommerce_checkout_after_order_review'); ?>
				</div>
			</div>


			<?php do_action('woocommerce_checkout_after_customer_details'); ?>

		<?php endif; ?>



	</form>
</div>
<?php do_action('woocommerce_after_checkout_form', $checkout); ?>