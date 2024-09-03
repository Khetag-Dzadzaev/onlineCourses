<?php

/**
 * Single Product Image
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-image.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 7.8.0
 */

defined('ABSPATH') || exit;

// Note: `wc_get_gallery_image_html` was added in WC 3.3.2 and did not exist prior. This check protects against theme overrides being used on older versions of WC.
if (!function_exists('wc_get_gallery_image_html')) {
	return;
}

global $product;

$post_thumbnail_id = $product->get_image_id();

$thumbnail_url = wp_get_attachment_image_url($post_thumbnail_id, 'woocommerce_single') ? wp_get_attachment_image_url($post_thumbnail_id, 'woocommerce_single') : wc_placeholder_img_src('woocommerce_single');

$attachment_ids = $product->get_gallery_image_ids();

?>

<div class="carousel-item active">
	<img class="w-100 h-100" src="<?php echo $thumbnail_url; ?>" alt="<?php echo get_the_title(); ?>">
</div>
<?php
if ($attachment_ids) {
	foreach ($attachment_ids as $attachment_id) {
		$img = wp_get_attachment_image_url($attachment_id, 'woocommerce_single'); ?>
		<div class="carousel-item">
			<img class="w-100 h-100" src="<?php echo $img; ?>" alt="<?php echo get_the_title(); ?>">
		</div>
<?php
	}
}
?>