<?php get_header(); ?>
<?php
$terms = get_terms([
	'taxonomy'   => 'product_cat',
	// 'hide_empty' => false,
	'exclude' => [15, 24],
	// 'number' => 4
]);

?>
<div class="container-fluid pt-5">
	<div class="row px-xl-5 pb-3">
		<?php foreach ($terms as $term) { ?>
			<div class="col-xl-3 col-lg-4 col-md-6 pb-1">
				<div class="cat-item d-flex flex-column border mb-4" style="padding: 30px;">
					<!-- <p class="text-right"><?php echo $term->count; ?> <?php echo esc_attr(pll__('Products')); ?></p> -->
					<a href="<?php echo get_term_link($term); ?>" class="cat-img position-relative overflow-hidden mb-3 text-center">
						<?php
						$thumbnail_id = get_term_meta($term->term_id, 'thumbnail_id', true);
						$image = wp_get_attachment_url($thumbnail_id) ? wp_get_attachment_image_src($thumbnail_id, 'cat-item')[0] : wc_placeholder_img_src('cat-item');  ?>
						<img class="img-fluid w-100" src="<?php echo $image; ?>" alt="<?php echo $term->name; ?>">
					</a>
					<h5 class="font-weight-semi-bold m-0"><?php echo $term->name; ?></h5>
				</div>
			</div>
		<?php } ?>
	</div>
</div>

<?php
$product_query = new WP_Query([
	'post_type' => 'product',
	'posts_per_page' => 8,
	'post__in' => wc_get_featured_product_ids(),
]);
if ($product_query->have_posts()) {
?>
	<div class="container-fluid pt-5">
		<div class="text-center mb-4">
			<h2 class="section-title px-5"><span class="px-2"><?php echo esc_attr(pll__('Popular Products')); ?></span></h2>
		</div>
		<div class="row px-xl-5 pb-3">
			<?php
			while ($product_query->have_posts()) {
				$product_query->the_post();
				$product_query->post;
				wc_get_template_part('content', 'product');
			}
			wp_reset_postdata();
			?>
		</div>
	</div>
<?php } ?>


<?php if (get_field('main_info_block_title') && get_field('main_info_block_text')) { ?>
	<div class="container-fluid bg-secondary my-5">
		<div class="row justify-content-md-center py-5 px-xl-5">
			<div class="col-md-6 col-12 py-5">
				<div class="text-center mb-2 pb-2">
					<h2 class="section-title px-5 mb-3"><span class="bg-secondary px-2"><?php echo get_field('main_info_block_title'); ?></span></h2>
					<p><?php echo get_field('main_info_block_text'); ?></p>
				</div>
			</div>
		</div>
	</div>
<?php } ?>


<?php
$product_query = new WP_Query([
	'post_type' => 'product',
	'posts_per_page' => 8,
]);
if ($product_query->have_posts()) {
?>
	<div class="container-fluid pt-5">
		<div class="text-center mb-4">
			<h2 class="section-title px-5"><span class="px-2"><?php echo esc_attr(pll__('Just Arrived')); ?></span></h2>
		</div>
		<div class="row px-xl-5 pb-3">
			<?php
			while ($product_query->have_posts()) {
				$product_query->the_post();
				$product_query->post;
				wc_get_template_part('content', 'product');
			}
			wp_reset_postdata();
			?>
		</div>
	</div>
<?php } ?>


<?php get_footer(); ?>