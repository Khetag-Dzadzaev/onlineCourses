<?php

/**
 * Related Products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/related.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     3.9.0
 */

if (!defined('ABSPATH')) {
	exit;
}

if ($related_products) : ?>





	<section class="course-two">
		<div class="course-two__shape-top wow fadeInRight" data-wow-delay="300ms"><img
				src="<?php echo get_template_directory_uri(); ?>/assets/images/shapes/course-shape-1.png" alt="eduact"></div>
		<div class="container wow fadeInUp" data-wow-delay="200ms">
			<div class="section-title text-center">
				<h5 class="section-title__tagline">
					Туры
					<svg class="arrow-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 55 13">
						<g clip-path="url(#clip0_324_36194)">
							<path
								d="M10.5406 6.49995L0.700562 12.1799V8.56995L4.29056 6.49995L0.700562 4.42995V0.819946L10.5406 6.49995Z" />
							<path
								d="M25.1706 6.49995L15.3306 12.1799V8.56995L18.9206 6.49995L15.3306 4.42995V0.819946L25.1706 6.49995Z" />
							<path
								d="M39.7906 6.49995L29.9506 12.1799V8.56995L33.5406 6.49995L29.9506 4.42995V0.819946L39.7906 6.49995Z" />
							<path
								d="M54.4206 6.49995L44.5806 12.1799V8.56995L48.1706 6.49995L44.5806 4.42995V0.819946L54.4206 6.49995Z" />
						</g>
					</svg>
				</h5>
				<h2 class="section-title__title">Лучшие туры за последний месяц</h2>
			</div><!-- section-title -->

			<div class="tab-content">
				<?php woocommerce_product_loop_start(); ?>
				<?php foreach ($related_products as $related_product) : ?>
					<div class="col-lg-4">
						<?php
						$post_object = get_post($related_product->get_id());

						setup_postdata($GLOBALS['post'] = &$post_object); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited, Squiz.PHP.DisallowMultipleAssignments.Found

						wc_get_template_part('content', 'product');
						?>
					</div>

				<?php endforeach; ?>


				<?php woocommerce_product_loop_end(); ?>
			</div>
		</div>
	</section>
<?php
endif;

wp_reset_postdata();
