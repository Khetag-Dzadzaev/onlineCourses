<?php

/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
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

?>

<div class="blog-tabs-section w-100 float-left padding-top padding-bottom background-gradient">
	<div class="container">
		<?php
		/**
		 * Hook: woocommerce_before_single_product.
		 *
		 * @hooked woocommerce_output_all_notices - 10
		 */
		do_action('woocommerce_before_single_product');
		?>
		<!-- Products Start -->
		<section class="product-details">
			<div class="container">
				<!-- /.product-details -->
				<div class="row">
					<div class="col-lg-6 col-xl-7 wow fadeInLeft" data-wow-delay="200ms">
						<div class="product-details__img">
							<?php
							/**
							 * Hook: woocommerce_before_single_product_summary.
							 *
							 * @hooked woocommerce_show_product_sale_flash - 10
							 * @hooked woocommerce_show_product_images - 20
							 */
							do_action('woocommerce_before_single_product_summary');
							?>
						</div><!-- /.product-image -->
					</div><!-- /.column -->
					<div class="col-lg-6 col-xl-5 wow fadeInRight" data-wow-delay="300ms">
						<div class="product-details__content">
							<div class="product-details__top">
								<h3 class="product-details__title">
									<h2 class="product-title"><?php the_title(); ?></h2>
								</h3><!-- /.product-title -->
							</div>
							<div class="product-details__excerpt">
								<?php $short_description = apply_filters('woocommerce_short_description', $post->post_excerpt);

								if ($short_description) { ?>
									<p class="product-details__excerpt-text1">
										<?php echo
										$short_description;  ?>
									</p>
								<?php } ?>

							</div><!-- /.excerp-text -->
							<?php do_action('woocommerce_single_product_summary_right'); ?>
						</div>
					</div>
				</div>
				<!-- /.product-details -->
				<!-- /.product-description -->
				<div class="product-details__description wow fadeInUp" data-wow-delay="300ms">
					<h3 class="product-details__description__title">Description</h3>
					<div class="product-details__description__text">
						<?php
						/**
						 * Hook: woocommerce_single_product_summary.
						 *
						 * @hooked woocommerce_template_single_title - 5
						 * @hooked woocommerce_template_single_rating - 10
						 * @hooked woocommerce_template_single_price - 10
						 * @hooked woocommerce_template_single_excerpt - 20
						 * @hooked woocommerce_template_single_add_to_cart - 30
						 * @hooked woocommerce_template_single_meta - 40
						 * @hooked woocommerce_template_single_sharing - 50
						 * @hooked WC_Structured_Data::generate_product_data() - 60
						 */
						do_action('woocommerce_single_product_summary');
						?>
					</div>

				</div>
				<!-- /.product-description -->
				<!-- /.product-comment -->
				<!-- Course Start -->

			</div>
		</section>
		<!-- Products End -->




		<?php
		/**
		 * Hook: woocommerce_after_single_product_summary.
		 *
		 * @hooked woocommerce_output_product_data_tabs - 10
		 * @hooked woocommerce_upsell_display - 15
		 * @hooked woocommerce_output_related_products - 20
		 */
		do_action('woocommerce_after_single_product_summary');
		?>
	</div>
</div>
<?php do_action('woocommerce_after_single_product'); ?>