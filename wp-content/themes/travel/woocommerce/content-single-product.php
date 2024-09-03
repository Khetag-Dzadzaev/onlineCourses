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

<section class="float-left w-100 banner-con sub-banner-con position-relative main-box">
	<img alt="vector" class="vector1  img-fluid position-absolute" src="<?php echo get_template_directory_uri(); ?>/assets/images/vector1.png">
	<img alt="vector" class="vector2 img-fluid position-absolute" src="<?php echo get_template_directory_uri(); ?>/assets/images/vector2.png">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="sub-banner-inner-con padding-bottom">

					<?php echo get_template_part("template_parts/breadcrumb-block"); ?>
				</div>
			</div>
		</div>
	</div>

</section>
</div>

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


		<!-- Shop Detail Start -->
		<div id="product-<?php the_ID(); ?>" <?php wc_product_class('', $product); ?>>
			<div class="row">
				<div class="col-lg-7 col-md-12 col-sm-12 col-12 order-1 order-lg-0">
					<div class="product-main-box">
						<div id="product-carousel" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner border">
								<?php
								/**
								 * Hook: woocommerce_before_single_product_summary.
								 *
								 * @hooked woocommerce_show_product_sale_flash - 10
								 * @hooked woocommerce_show_product_images - 20
								 */
								do_action('woocommerce_before_single_product_summary');
								?>

							</div>
							<?php if (!empty($product->get_gallery_image_ids())) { ?>
								<a class="carousel-control-prev" href="#product-carousel" data-slide="prev">
									<i class="fa fa-2x fa-angle-left text-dark"></i>
								</a>
								<a class="carousel-control-next" href="#product-carousel" data-slide="next">
									<i class="fa fa-2x fa-angle-right text-dark"></i>
								</a>
							<?php } ?>
						</div>

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

				<div class="col-lg-5 col-md-12 col-sm-12 col-12 column order-0 order-lg-1">
					<div class="product-main-box mb-5">
						<h2 class="product-title"><?php the_title(); ?></h2>
					</div>

					<div class="product-main-box">
						<?php do_action('woocommerce_single_product_summary_right'); ?>
					</div>
				</div>
			</div>

		</div>

		<!-- Shop Detail End -->


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