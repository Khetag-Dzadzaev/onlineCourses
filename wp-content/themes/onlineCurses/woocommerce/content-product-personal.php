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


<a href="<?php the_permalink(); ?>" class="course-two__thumb">
	<?php
	/**
	 * Hook: woocommerce_before_shop_loop_item_title.
	 *
	 * @hooked woocommerce_show_product_loop_sale_flash - 10
	 * @hooked woocommerce_template_loop_product_thumbnail - 10
	 */
	do_action('woocommerce_before_shop_loop_item_title');
	?>
	<svg xmlns=" http://www.w3.org/2000/svg" viewBox="0 0 353 177">
		<path
			d="M37 0C16.5655 0 0 16.5655 0 37V93.4816C0 103.547 4.00259 113.295 11.7361 119.737C54.2735 155.171 112.403 177 176.496 177C240.589 177 298.718 155.171 341.261 119.737C348.996 113.295 353 103.546 353 93.4795V37C353 16.5655 336.435 0 316 0H37Z" />
	</svg>
</a>
<div class="course-two__content">
	<div class="course-two__time"><?php echo $product->get_categories(); ?></div>
	<h4 class="course-two__meta__price"> <?php
																				/**
																				 * Hook: woocommerce_after_shop_loop_item_title.
																				 *
																				 * @hooked woocommerce_template_loop_rating - 5
																				 * @hooked woocommerce_template_loop_price - 10
																				 */
																				do_action('woocommerce_after_shop_loop_item_title');
																				?></h4>
	<h3 class="course-two__title"><?php
																/**
																 * Hook: woocommerce_shop_loop_item_title.
																 *
																 * @hooked woocommerce_template_loop_product_title - 10
																 */
																do_action('woocommerce_shop_loop_item_title');
																?>
	</h3>