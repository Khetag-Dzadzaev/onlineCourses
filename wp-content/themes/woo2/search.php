<?php get_header(); ?>
<div class="container-fluid bg-secondary mb-5">
	<div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
		<h1 class="font-weight-semi-bold text-uppercase mb-3"><?php echo esc_attr(pll__('Search results')) . ': ' . '<span>' . get_search_query() . '</span>'; ?></h1>
		<?php echo get_template_part("template_parts/breadcrumb-block"); ?>
	</div>
</div>
<div class="container">
	<form class="subscribe-search-form subscribe-search-form_page" action="<?php echo esc_url(home_url('/')); ?>">
		<input type="text" class="subscribe-search-form__input" placeholder="<?php echo esc_attr(pll__('Site search')); ?>" value="<?php the_search_query(); ?>" name="s" id="ss">

		<button class="subscribe-search-form__btn ">
			<i class="fa fa-search"></i>
		</button>
	</form>
	<?php
	$i = 1;
	if (have_posts()) {
		while (have_posts()) {
			the_post();
			$link = get_the_permalink();
	?>
			<a href="<?php echo $link; ?>" class="search-item">
				<h2 class="search-item__title"><?php echo $i; ?>) <?php the_title(); ?></h2>
				<p class="search-item__text"><?php the_excerpt(); ?></p>
				<div class="search-item__link"><?php echo esc_attr(pll__('Read more')); ?></div>
			</a>
			<?php $i++; ?>
		<?php } ?>
	<?php } else { ?>
		<p><?php echo esc_attr(pll__('No publications found matching your request')); ?> <?php if ($_GET['s'])	echo ' "' . $_GET['s'] . '"'; ?>. <?php echo esc_attr(pll__('Please check if your query is entered correctly and if there are any typos. Try changing your query phrase or criteria.')); ?></p>
	<?php } ?>
	<?php if (function_exists('wp_pagenavi')) {
		wp_pagenavi();
	} ?>
</div>
<?php do_action('woocommerce_after_main_content'); ?>
<?php get_footer(); ?>