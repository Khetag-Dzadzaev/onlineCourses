<?php get_header("all");
/* Template Name: О нас*/
?>

<section class="page-header page-header--bg-two" data-jarallax data-speed="0.3" data-imgPosition="50% -100%">
	<div class="page-header__bg jarallax-img" style="	background-image: url(<?php if (!empty(get_field("zadnij_fon", "option"))) {
																																							echo get_field("zadnij_fon", "option")["url"];
																																						} else {
																																							echo (get_template_directory_uri() . "/<?php echo get_template_directory_uri(); ?>/assets/images/backgrounds/page-header-bg-1-1.jpg)");
																																						} ?>
																																						"></div><!-- /.page-header-bg -->
	<div class="page-header__overlay"></div><!-- /.page-header-overlay -->
	<div class="container text-center">
		<h2 class="page-header__title"><?php the_title(); ?></h2><!-- /.page-title -->
		<ul class="page-header__breadcrumb list-unstyled">
			<?php bcn_display(); ?>
		</ul><!-- /.page-breadcrumb list-unstyled -->
	</div><!-- /.container -->
</section><!-- /.page-header -->
<!-- About Start -->
<section class="about-two about-two--about">
	<div class="container">
		<div class="row">
			<div class="col-xl-6">
				<div class="about-two__thumb wow fadeInLeft" data-wow-delay="100ms"><!-- about thumb start -->
					<div class="about-two__thumb__one eduact-tilt"
						data-tilt-options='{ "glare": false, "maxGlare": 0, "maxTilt": 2, "speed": 700, "scale": 1 }'>
						<?php if (!empty(get_field("fotografiya_1"))) { ?>
							<img src="<?php echo get_field("fotografiya_1")["url"]; ?>" alt="eduact">
						<?php	} else { ?>
							<img src="<?php echo get_template_directory_uri(); ?>/assets/images/resources/about-2-2-about.jpg" alt="eduact">
						<?php } ?>

					</div><!-- /.about-thumb-one -->
					<div class="about-two__thumb__two">
						<?php if (!empty(get_field("fotografiya_2"))) { ?>
							<img src="<?php echo get_field("fotografiya_2")["url"]; ?>" alt="eduact">
						<?php	} else { ?>
							<img src="<?php echo get_template_directory_uri(); ?>/assets/images/resources/about-2-1-about.jpg" alt="eduact">
						<?php } ?>
					</div><!-- /.about-thumb-two -->

					<div class="about-two__thumb__shape1 wow zoomIn" data-wow-delay="300ms">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/images/shapes/about-2-shape-1.png" alt="eduact">
					</div><!-- /.about-shape-one -->
					<div class="about-two__thumb__shape2 wow zoomIn" data-wow-delay="400ms">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/images/shapes/about-2-shape-2.png" alt="eduact">
					</div><!-- /.about-shape-two -->
					<div class="about-two__thumb__shape3 wow zoomIn" data-wow-delay="400ms">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/images/shapes/about-2-shape-3.png" alt="eduact">
					</div><!-- /.about-shape-two -->
					<div class="about-two__thumb__shape4 wow zoomIn" data-wow-delay="400ms">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/images/shapes/about-2-shape-4.png" alt="eduact">
					</div><!-- /.about-shape-two -->
				</div><!-- about thumb end -->
			</div>
			<div class="col-xl-6 wow fadeInRight" data-wow-delay="100ms">
				<div class="about-two__about-box__text"><!-- about content start-->
					<?php the_content(); ?>
				</div><!-- about content end -->
			</div>
		</div>
	</div>
</section>
<!-- About End -->
<?php if (!empty(get_field("dostizheniya"))) { ?>
	<!-- Counter Start -->
	<section class="fact-one" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/shapes/fact-bg-1.png);">
		<div class="container">
			<div class="row">
				<?php $time = 100;
				foreach (get_field("dostizheniya") as $value) { ?>
					<div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="<?php echo $time; ?>ms">
						<div class="fact-one__item text-center">
							<svg viewBox="0 0 303 181" fill="none" xmlns="http://www.w3.org/2000/svg">
								<rect x="1.5" y="2.00049" width="300" height="177" rx="7" stroke="#4F5DE4" stroke-width="3"
									stroke-linecap="round" stroke-linejoin="round" stroke-dasharray="20 20" />
							</svg>
							<div class="fact-one__count">
								<span class="count-box">
									<span class="count-text" data-stop="<?php echo $value["chislo"]; ?>" data-speed="1500"></span>
								</span><?php echo $value["edenicza_izmereniya"]; ?>
							</div><!-- /.fact-one__count -->
							<h3 class="fact-one__title"><?php echo $value["nazvanie"]; ?></h3><!-- /.fact-one__title -->
						</div><!-- /.fact-item -->
					</div>
				<?php } ?>

			</div>
		</div>
	</section>
	<!-- Counter End -->
<?php } ?>
<?php
$catalog_query = new WP_Query([
	'post_type' => 'product',
	'posts_per_page' => 6,
	'post__in' => wc_get_featured_product_ids(),
]);
if ($catalog_query) { ?>
	<!-- Course Start -->
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
			<div class="course-two__slider eduact-owl__carousel owl-with-shadow owl-theme owl-carousel" data-owl-options='{
            "items": 3,
            "margin": 30,
            "smartSpeed": 700,
            "loop":true,
            "autoplay": true,
            "dots":false,
            "nav":true,
            "navText": ["<span class=\"icon-arrow-left\"></span>","<span class=\"icon-arrow\"></span>"],
            "responsive":{
                "0":{
                    "items":1
                },
                "992":{
                    "items": 2
                },
                "1200":{
                    "items": 3
                },
                "1400":{
                    "margin": 36,
                    "items": 3
                }
            }
            }'>
				<?php
				while ($catalog_query->have_posts()) {
					$catalog_query->the_post();
					$catalog_query->post;
					$post_id = get_the_ID();
					$tax = get_the_terms($post_id, "techer");

				?>
					<div class="item">
						<div class="course-two__item">
							<?php
							wc_get_template_part('content', 'product-personal');
							?>
							<?php foreach ($tax as $value) { ?>
								<div class="course-two__bottom">
									<div class="course-two__author">
										<img src="<?php echo get_field("foto_uchitelya", 'term_' . $value->term_id)["url"]; ?>" alt="eduact">
										<h5 class="course-two__author__name"><?php echo $value->name; ?></h5>
										<p class="course-two__author__designation"><?php echo get_field("dolzhnost", 'term_' . $value->term_id); ?></p>
									</div>
									<div class="course-two__meta">

										<p class="course-two__meta__class"><?php echo $value->count; ?> уроков</p>
									</div>
								</div>
							<?php } ?>

						</div><!-- /.course-content -->
					</div><!-- /.course-card-two -->
			</div>
		<?php } ?>
		</div>
		</div>
		<div class="course-two__shape-bottom wow fadeInLeft" data-wow-delay="400ms"><img
				src="<?php echo get_template_directory_uri(); ?>/assets/images/shapes/course-shape-2.png" alt="eduact"></div>
	</section>
<?php } ?>
<!-- Course End -->
<?php get_footer(); ?>