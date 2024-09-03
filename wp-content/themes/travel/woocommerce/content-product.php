<?php

/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined('ABSPATH') || exit;

global $product;

// Ensure visibility.
if (empty($product) || !$product->is_visible()) {
	return;
}
?>

<div <?php wc_product_class('package-box', $product); ?>>
	<span class="d-block location-span"> <i class="fa-solid fa-location-dot"></i> <?php echo $product->get_categories(); ?></span>
	<?php
	/**
	 * Hook: woocommerce_shop_loop_item_title.
	 *
	 * @hooked woocommerce_template_loop_product_title - 10
	 */
	do_action('woocommerce_shop_loop_item_title');
	?>
	<a href="<?php the_permalink(); ?>">
		<?php
		/**
		 * Hook: woocommerce_before_shop_loop_item_title.
		 *
		 * @hooked woocommerce_show_product_loop_sale_flash - 10
		 * @hooked woocommerce_template_loop_product_thumbnail - 10
		 */
		do_action('woocommerce_before_shop_loop_item_title');
		?>
	</a>
	<div class="pkg-btn-con d-flex align-items-center justify-content-between">
		<?php
		/**
		 * Hook: woocommerce_after_shop_loop_item_title.
		 *
		 * @hooked woocommerce_template_loop_rating - 5
		 * @hooked woocommerce_template_loop_price - 10
		 */
		do_action('woocommerce_after_shop_loop_item_title');
		?>
		<div class="grey-btn d-inline-block">
			<a href="<?php the_permalink(); ?>" class="d-inline-block"><?php echo esc_attr(pll__('View Detail')); ?></a>
		</div>

		<!-- package btn con -->
	</div>
	<!-- package box -->
</div>

<!-- 
<div class="col-lg-3 col-md-6 col-sm-12 pb-1">
	<div <?php wc_product_class('card product-item border-0 mb-4', $product); ?>>
		<a href="<?php the_permalink(); ?>" class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
			<?php
			/**
			 * Hook: woocommerce_before_shop_loop_item_title.
			 *
			 * @hooked woocommerce_show_product_loop_sale_flash - 10
			 * @hooked woocommerce_template_loop_product_thumbnail - 10
			 */
			do_action('woocommerce_before_shop_loop_item_title');
			?>
		</a>
		<div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
			<?php
			/**
			 * Hook: woocommerce_shop_loop_item_title.
			 *
			 * @hooked woocommerce_template_loop_product_title - 10
			 */
			do_action('woocommerce_shop_loop_item_title');
			?>

			<?php
			/**
			 * Hook: woocommerce_after_shop_loop_item_title.
			 *
			 * @hooked woocommerce_template_loop_rating - 5
			 * @hooked woocommerce_template_loop_price - 10
			 */
			do_action('woocommerce_after_shop_loop_item_title');
			?>

		</div>
		<div class="card-footer d-flex justify-content-between bg-light border">
			<a href="<?php the_permalink(); ?>" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i><?php echo esc_attr(pll__('View Detail')); ?></a>
			<?php
			/**
			 * Hook: woocommerce_after_shop_loop_item.
			 *
			 * @hooked woocommerce_template_loop_product_link_close - 5
			 * @hooked woocommerce_template_loop_add_to_cart - 10
			 */
			do_action('woocommerce_after_shop_loop_item');
			?>
		</div>
	</div>
</div> -->