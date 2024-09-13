<?php

/**
 * My Account page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/my-account.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.0
 */

defined('ABSPATH') || exit;
?>
<section class="">
	<div class="container">
		<div class="row">
			<div class="col-xl-3 col-lg-4 wow fadeInLeft" data-wow-delay="200ms">
				<div class="product__sidebar product__sidebar--left">
					<div class="product__sidebar__single product__categories">

						<ul class="list-unstyled">
							<?
							/**
							 * My Account navigation.
							 *
							 * @since 2.6.0
							 */
							do_action('woocommerce_account_navigation');
							?>
						</ul>
					</div><!-- /.category-widget -->
				</div><!-- /.shop-sidebar -->
			</div><!-- /.column -->
			<div class="col-xl-9 col-lg-8">
				<?php
				/**
				 * My Account content.
				 *
				 * @since 2.6.0
				 */
				do_action('woocommerce_account_content');
				?>
			</div>
		</div>
	</div>
</section>