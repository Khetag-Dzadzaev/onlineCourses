<?php

/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 8.6.0
 */

defined('ABSPATH') || exit;

get_header('shop'); ?>


<section class="float-left w-100 banner-con sub-banner-con position-relative main-box">
	<img alt="vector" class="vector1  img-fluid position-absolute" src="<?php echo get_template_directory_uri(); ?>/assets/images/vector1.png">
	<img alt="vector" class="vector2 img-fluid position-absolute" src="<?php echo get_template_directory_uri(); ?>/assets/images/vector2.png">
	<div class="container">
		<div class="row">
			<div class="col-lg-7">
				<div class="sub-banner-inner-con padding-bottom">
					<?php
					/**
					 * Hook: woocommerce_shop_loop_header.
					 *
					 * @since 8.6.0
					 *
					 * @hooked woocommerce_product_taxonomy_archive_header - 10
					 */
					do_action('woocommerce_shop_loop_header');
					?>
					<?php echo get_template_part("template_parts/breadcrumb-block"); ?>
				</div>
			</div>
		</div>
	</div>

</section>
</div>


<div class="blog-tabs-section w-100 float-left padding-top padding-bottom background-gradient">
	<?php

	/**
	 * Hook: woocommerce_before_main_content.
	 *
	 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
	 * @hooked woocommerce_breadcrumb - 20
	 * @hooked WC_Structured_Data::generate_website_data() - 30
	 */
	do_action('woocommerce_before_main_content');



	if (woocommerce_product_loop()) {

		/**
		 * Hook: woocommerce_before_shop_loop.
		 *
		 * @hooked woocommerce_output_all_notices - 10
		 * @hooked woocommerce_result_count - 20
		 * @hooked woocommerce_catalog_ordering - 30
		 */
		do_action('woocommerce_before_shop_loop');

	?>
		<div class="d-flex align-items-center justify-content-end mb-4 ">
			<?php do_action('woocommerce_before_shop_loop_custom'); ?>
		</div>
		<div class="travel-tour-con">
			<div class="tab-content">
				<?php
				woocommerce_product_loop_start();

				if (wc_get_loop_prop('total')) {
					while (have_posts()) {
						the_post();

						/**
						 * Hook: woocommerce_shop_loop.
						 */
						do_action('woocommerce_shop_loop');
				?>
						<div class="col-lg-4 mb-3">
							<?php

							wc_get_template_part('content', 'product');
							?>
						</div>
				<?php
					}
				}

				woocommerce_product_loop_end();
				?>
			</div>
		</div>
	<?php



		/**
		 * Hook: woocommerce_after_shop_loop.
		 *
		 * @hooked woocommerce_pagination - 10
		 */
		do_action('woocommerce_after_shop_loop');
	} else {
		/**
		 * Hook: woocommerce_no_products_found.
		 *
		 * @hooked wc_no_products_found - 10
		 */
		do_action('woocommerce_no_products_found');
	}

	/**
	 * Hook: woocommerce_after_main_content.
	 *
	 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
	 */
	do_action('woocommerce_after_main_content'); ?>
</div>
<?php

/**
 * Hook: woocommerce_sidebar.
 *
 * @hooked woocommerce_get_sidebar - 10
 */
do_action('woocommerce_sidebar');

get_footer('shop');
