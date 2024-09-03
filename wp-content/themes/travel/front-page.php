<?php get_header(); ?>
<?php /* echo get_template_part("template_parts/block"); */ ?>

<?php
$special_cat_ids = getSpecialCategoriesIds();
?>

<?php
if (have_rows('main_slider')) { ?>
	<section class="float-left w-100 banner-con position-relative main-box">
		<img alt="vector" class="vector1  img-fluid position-absolute" src="<?php echo get_template_directory_uri(); ?>/assets/images/vector1.png">
		<img alt="vector" class="vector2 img-fluid position-absolute" src="<?php echo get_template_directory_uri(); ?>/assets/images/vector2.png">
		<img alt="vector" class="vector3 img-fluid position-absolute" src="<?php echo get_template_directory_uri(); ?>/assets/images/vector3.png">
		<div class="container">
			<div class="owl-carousel">
				<?php
				$i = 1;
				while (have_rows('main_slider')) {
					the_row();
					$main_slider_img = get_sub_field('main_slider_img');
					$main_slider_text = get_sub_field('main_slider_text');
					$main_slider_text_p = get_sub_field('main_slider_text_p');
					$main_slider_link = get_sub_field('main_slider_link');
				?>
					<div class="item">
						<div class="row align-items-center">
							<div class="col-lg-6  order-xl-0 order-lg-0 mb-3 mb-lg-0">
								<div class="banner-inner-content">
									<h4><?php echo esc_attr(pll__('Explore the World!')); ?> <i class="fa-solid fa-earth-americas"></i></h4>
									<h1><?php echo $main_slider_text; ?></h1>
									<?php if (!empty($main_slider_text_p)) { ?>
										<p class="font-size-20"><?php echo $main_slider_text_p; ?></p>
									<?php } ?>
									<?php if (!empty($main_slider_link)) { ?>
										<div class="green-btn d-inline-block">
											<a href="<?php echo $main_slider_link; ?>" class="d-inline-block"><?php echo esc_attr(pll__('Read more')); ?></a>
										</div>
									<?php } ?>
								</div>
							</div>
							<div class="col-lg-6">
								<figure class="banner-image-con">
									<img src="<?php echo $main_slider_img['url'] ?>" alt="image" class="">
								</figure>
							</div>
						</div>
					</div>
					<?php $i++; ?>
				<?php } ?>
			</div>
		</div>
	</section>
<?php } ?>

<?php if (have_rows('main_what_we_serve')) { ?>
	<section class="float-left w-100 what-we-serve-con position-relative main-box padding-top padding-bottom">
		<img alt="vector" class="vector4 wow bounceInUp img-fluid position-absolute" data-wow-duration="2s" src="<?php echo get_template_directory_uri(); ?>/assets/images/vector4.png">
		<img alt="vector" class="vector5 wow bounceInUp img-fluid position-absolute" data-wow-duration="2s" src="<?php echo get_template_directory_uri(); ?>/assets/images/vector5.png">
		<div class="container wow bounceInUp" data-wow-duration="2s">
			<div class="row">
				<div class="col-lg-5">
					<h4 class="mustard-text text-uppercase"><?php echo esc_attr(pll__('What We Serve')); ?></h4>
					<h2 class="text-uppercase text-right"><?php echo esc_attr(pll__('Top Values For You!')); ?></h2>
				</div>
				<div class="col-xl-10 col-12 mr-auto ml-auto serve-outer text-center">
					<?php
					$i = 1;
					while (have_rows('main_what_we_serve')) {
						the_row();
						$main_what_we_serve_title = get_sub_field('main_what_we_serve_title');
						$main_what_we_serve_text = get_sub_field('main_what_we_serve_text');
					?>
						<div class="server-box var<?php echo $i; ?>">
							<img class="img-fluid" src="<?php echo get_template_directory_uri(); ?>/assets/images/serve-icon<?php echo $i; ?>.png" alt="icon">
							<h4><?php echo $main_what_we_serve_title; ?></h4>
							<?php if (!empty($main_what_we_serve_text)) { ?>
								<p class="mb-0"><?php echo $main_what_we_serve_text; ?></p>
							<?php } ?>
						</div>
						<?php $i++; ?>
					<?php } ?>
				</div>
			</div>
		</div>
	</section>
<?php } ?>
<!-- bg outer wrapper -->
</div>


<section class="float-left w-100 travel-tour-con position-relative">
	<div class="color-overlay position-relative padding-top padding-bottom main-box">
		<div class="container wow bounceInUp" data-wow-duration="2s">
			<img alt="vector" class="vector7 wow bounceInUp img-fluid position-absolute" data-wow-duration="2s" src="<?php echo get_template_directory_uri(); ?>/assets/images/vector7.png">
			<div class="heading-content text-center position-relative">

				<h2 class="text-white"><?php echo esc_attr(pll__('Visit Popular Destinations in the World')); ?></h2>
			</div>
			<?php
			$terms = get_terms([
				'taxonomy'   => 'product_cat',
				// 'hide_empty' => false,
				'exclude' => array_merge(
					[15, 24],
					array_values($special_cat_ids)
				),
				// 'number' => 4
			]);
			?>

			<ul class="nav nav-tabs text-center align-items-center justify-content-center" id="myTab1" role="tablist">
				<?php
				$i = 1;
				foreach ($terms as $term) {
				?>
					<li class="nav-item" role="presentation">
						<button class="nav-link <?php echo  $i === 1 ? 'active' : ''; ?>" id="<?php echo $term->slug; ?>-tab" data-toggle="tab" data-target="#tab<?php echo $i; ?>" type="button" role="tab" aria-controls="tab<?php echo $i; ?>" aria-selected="true"><?php echo $term->name; ?></button>
					</li>
					<?php $i++; ?>
				<?php } ?>
			</ul>
			<div class="tab-content" id="myTabContent1">
				<?php
				$i = 1;
				foreach ($terms as $term) {
				?>
					<div class="tab-pane fade <?php echo  $i === 1 ? 'show active' : ''; ?>" id="tab<?php echo $i; ?>" role="tabpanel" aria-labelledby="<?php echo $term->slug; ?>-tab">
						<div class="owl-carousel">
							<?php
							$catalog_query = new WP_Query([
								'post_type' => 'product',
								'posts_per_page' => 6,
								'tax_query' => [[
									'taxonomy' => 'product_cat',
									'field'    => 'slug',
									'terms'    => $term->slug
								]]
							]);
							if ($catalog_query->have_posts()) {
								while ($catalog_query->have_posts()) {
									$catalog_query->the_post();
									$catalog_query->post;
									wc_get_template_part('content', 'product');
								}
								wp_reset_postdata();
							}
							?>
						</div>
					</div>
					<?php $i++; ?>
				<?php } ?>
			</div>
		</div>
	</div>
</section>

<section class="float-left w-100 about-travel-con position-relative main-box padding-top padding-bottom">
	<img alt="vector" class="vector5 wow bounceInUp img-fluid position-absolute" data-wow-duration="2s" src="<?php echo get_template_directory_uri(); ?>/assets/images/vector5.png">
	<div class="container wow bounceInUp" data-wow-duration="2s">
		<div class="row">
			<div class="col-lg-6">
				<div class="about-travel-img-con position-relative">
					<figure class="about-img"><img class="img-fluid" alt="image" src="<?php echo get_template_directory_uri(); ?>/assets/images/about-travel-img1.jpg">
					</figure>
					<figure class="about-img2"><img class="img-fluid" alt="image" src="<?php echo get_template_directory_uri(); ?>/assets/images/about-travel-img2.jpg">
					</figure>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="about-travel-content">
					<h4 class="text-uppercase"><?php echo esc_attr(pll__('About Extremetour')); ?></h4>
					<h2><?php echo get_field('main_about_title'); ?></h2>
					<p><?php echo get_field('main_about_text'); ?></p>
					<?php if (have_rows('main_about_list')) { ?>
						<ul class="list-unstyled p-0 listing">
							<?php
							while (have_rows('main_about_list')) {
								the_row();
								$main_about_list_item = get_sub_field('main_about_list_item');
							?>
								<li class="position-relative"><i class="fa-solid fa-check mr-3"></i><?php echo $main_about_list_item;  ?></li>
							<?php } ?>
						</ul>
					<?php } ?>
					<?php if (have_rows('main_about_numbers')) { ?>
						<ul class="list-unstyled p-0 m-0 d-flex align-items-center about-count">
							<?php
							while (have_rows('main_about_numbers')) {
								the_row();
								$main_about_numbers_num = get_sub_field('main_about_numbers_num');
								$main_about_numbers_text = get_sub_field('main_about_numbers_text');
							?>
								<li><span class="d-inline-block counter"><?php echo $main_about_numbers_num; ?> </span><span class="mb-0 plus1 d-inline-block">+</span> <br>
									<?php echo $main_about_numbers_text; ?>
								</li>
							<?php } ?>
						</ul>
					<?php } ?>
					<div class="green-btn d-inline-block">
						<a href="<?php echo get_permalink(pll_get_post(10)); ?>" class="d-inline-block"><?php echo esc_attr(pll__('Find Tours')); ?></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="float-left w-100 top-destinations-con position-relative padding-top padding-bottom main-box travel-tour-con">
	<img alt="vector" class="vector4 wow bounceInUp img-fluid position-absolute" data-wow-duration="2s" src="<?php echo get_template_directory_uri(); ?>/assets/images/vector4.png">
	<img alt="vector" class="vector5 wow bounceInUp img-fluid position-absolute" data-wow-duration="2s" src="<?php echo get_template_directory_uri(); ?>/assets/images/vector5.png">
	<div class="container top-destination-con1 wow bounceInUp tab-content" data-wow-duration="2s">
		<div class="heading-title text-center">

			<h2><?php echo esc_attr(pll__('Explore the Beauty of The World')); ?></h2>
		</div>
		<div class="owl-carousel">
			<?php
			$catalog_query = new WP_Query([
				'post_type' => 'product',
				'posts_per_page' => 6,
				'post__in' => wc_get_featured_product_ids(),
			]);
			if ($catalog_query->have_posts()) {
				while ($catalog_query->have_posts()) {
					$catalog_query->the_post();
					$catalog_query->post;
					wc_get_template_part('content', 'product');
				}
				wp_reset_postdata();
			}
			?>
		</div>
	</div>
</section>


<section class="float-left w-100 review-testimonial-con position-relative travel-tour-con">
	<div class="color-overlay position-relative padding-top padding-bottom main-box tab-content">
		<div class="container wow bounceInUp" data-wow-duration="2s">
			<img alt="vector" class="vector7 wow bounceInUp img-fluid position-absolute" data-wow-duration="2s" src="<?php echo get_template_directory_uri(); ?>/assets/images/vector7.png">
			<div class="heading-content text-center position-relative">

				<h2 class="text-white"><?php echo esc_attr(pll__('Just Arrived Text')); ?></h2>
			</div>
			<div class="owl-carousel">
				<?php
				$catalog_query = new WP_Query([
					'post_type' => 'product',
					'posts_per_page' => 8,
					'tax_query' => [
						[
							'taxonomy' => 'product_cat',
							'field'    => 'id',
							'terms'    => array_values($special_cat_ids),
							'operator' => 'NOT IN',
						]
					],
				]);
				if ($catalog_query->have_posts()) {
					while ($catalog_query->have_posts()) {
						$catalog_query->the_post();
						$catalog_query->post;
						wc_get_template_part('content', 'product');
					}
					wp_reset_postdata();
				} ?>
			</div>
		</div>
	</div>
</section>
<?php get_footer(); ?>