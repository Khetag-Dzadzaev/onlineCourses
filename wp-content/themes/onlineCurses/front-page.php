<?php get_header(); ?>

<div class="stricky-header stricked-menu main-menu">
	<div class="sticky-header__content"></div><!-- /.sticky-header__content -->
</div><!-- /.stricky-header -->
<!--Hero Banner Start-->
<section class="hero-banner" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/shapes/banner-bg-1.png);">
	<div class="container">
		<div class="row">
			<div class="col-lg-6">
				<div class="hero-banner__content">
					<div class="hero-banner__bg-shape1 wow zoomIn" data-wow-delay="300ms">
						<div class="hero-banner__bg-round">
							<div class="hero-banner__bg-round-border"></div>
						</div>
					</div>
					<h2 class="hero-banner__title wow fadeInUp" data-wow-delay="400ms"><?php echo get_field('main_slider_text'); ?></h2>
					<p class="hero-banner__text wow fadeInUp" data-wow-delay="500ms"><?php echo get_field('main_slider_text_p'); ?>
						<img src="<?php echo get_template_directory_uri(); ?>/assets/images/shapes/banner-1-shape-1.png" alt="eduact">
					</p>
					<?php if (!empty(get_field('main_slider_link'))) { ?>
						<div class="hero-banner__btn wow fadeInUp" data-wow-delay="600ms">
							<a href="<?php echo get_field('main_slider_link'); ?>" class="eduact-btn eduact-btn-second"><span class="eduact-btn__curve"></span>Take
								Now<i class="icon-arrow"></i></a>
						</div><!-- banner-btn -->
					<?php	} ?>

				</div><!-- banner-content -->
			</div>
			<?php if (!empty(get_field('main_slider_img'))) { ?>
				<div class="col-lg-6">
					<div class="hero-banner__thumb wow fadeInUp" data-wow-delay="700ms">
						<img src="<?php echo get_field('main_slider_img')["url"]; ?>" alt="eduact">
						<div class="hero-banner__cap wow slideInDown" data-wow-delay="800ms"><img
								src="<?php echo get_template_directory_uri(); ?>/assets/images/shapes/banner-cap.png" alt="eduact"></div><!-- banner-cap -->
						<div class="hero-banner__star wow slideInDown" data-wow-delay="850ms"><img
								src="<?php echo get_template_directory_uri(); ?>/assets/images/shapes/banner-star.png" alt="eduact"></div><!-- banner-star -->
						<div class="hero-banner__map wow slideInDown" data-wow-delay="900ms"><img
								src="<?php echo get_template_directory_uri(); ?>/assets/images/shapes/banner-map.png" alt="eduact"></div><!-- banner-map -->
						<div class="hero-banner__book wow slideInUp" data-wow-delay="1000ms"><img
								src="<?php echo get_template_directory_uri(); ?>/assets/images/shapes/banner-book.png" alt="eduact"></div><!-- banner-book -->
						<div class="hero-banner__star2 wow slideInUp" data-wow-delay="1050ms"><img
								src="<?php echo get_template_directory_uri(); ?>/assets/images/shapes/banner-star2.png" alt="eduact"></div><!-- banner-star -->
					</div>
				</div>
			<?php 	} ?>

		</div>
	</div>
	<div class="hero-banner__border wow fadeInUp" data-wow-delay="1100ms"></div><!-- banner-border -->
</section>
<!--Hero Banner End-->
<?php if (have_rows('main_what_we_serve')) { ?>
	<!-- Service Start -->
	<section class="service-one">
		<div class="service-one__bg" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/shapes/service-bg-1.png);"></div>
		<div class="container">
			<div class="row">

				<?php
				$i = 1;
				while (have_rows('main_what_we_serve')) {
					the_row();
					$main_what_we_serve_title = get_sub_field('main_what_we_serve_title');
					$main_what_we_serve_text = get_sub_field('main_what_we_serve_text');
				?>
					<div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="100ms">
						<div class="service-one__item">
							<div class="service-one__wrapper">
								<div class="service-one__icon">
									<span class="icon-education"></span>
								</div><!-- /.service-icon -->
								<h3 class="service-one__title">
									<?php echo $main_what_we_serve_title; ?>
								</h3><!-- /.service-title -->
								<?php if (!empty($main_what_we_serve_text)) { ?>
									<p class="service-one__text"><?php echo $main_what_we_serve_text; ?></p>
								<?php } ?>
								<!-- /.service-content -->
								<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 118 129" fill="none">
									<path
										d="M0.582052 143.759C135.395 113.682 145.584 0.974413 145.584 0.974413L173.881 89.6286C173.881 89.6286 0.582054 322.604 0.582052 143.759Z"
										fill="#F1F2FD" />
								</svg>
							</div>
						</div><!-- /.service-card-one -->
					</div>
					<?php $i++; ?>
				<?php } ?>
			</div>
		</div>
	</section>
	<!-- Service End -->
<?php } ?>
<!-- About Start -->
<section class="about-one">
	<div class="container">
		<div class="row">
			<div class="col-xl-6">
				<div class="about-one__thumb wow fadeInLeft" data-wow-delay="100ms"><!-- about thumb start -->
					<div class="about-one__thumb__one eduact-tilt"
						data-tilt-options='{ "glare": false, "maxGlare": 0, "maxTilt": 2, "speed": 700, "scale": 1 }'>
						<img src="<?php echo get_field("about_img")["url"]; ?>" class="eduact-img" alt="eduact">
					</div>
					<div class="about-one__thumb__shape1 wow zoomIn" data-wow-delay="300ms">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/images/shapes/about-shape-1-1.png" alt="eduact">
					</div>
					<div class="about-one__thumb__shape2 wow zoomIn" data-wow-delay="400ms">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/images/shapes/about-shape-1-2.png" alt="eduact">
					</div>
				</div><!-- about thumb end -->
			</div>
			<div class="col-xl-6">
				<div class="about-one__content"><!-- about content start-->
					<div class="section-title">
						<h5 class="section-title__tagline">
							About Extremetour
							<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 133 13" fill="none">
								<path
									d="M9.76794 0.395L0.391789 9.72833C-0.130596 10.2483 -0.130596 11.095 0.391789 11.615C0.914174 12.135 1.76472 12.135 2.28711 11.615L11.6633 2.28167C12.1856 1.76167 12.1856 0.915 11.6633 0.395C11.1342 -0.131667 10.2903 -0.131667 9.76794 0.395Z"
									fill="#F1F2FD" />
								<path
									d="M23.1625 0.395L13.7863 9.72833C13.2639 10.2483 13.2639 11.095 13.7863 11.615C14.3087 12.135 15.1593 12.135 15.6816 11.615L25.0578 2.28167C25.5802 1.76167 25.5802 0.915 25.0578 0.395C24.5287 -0.131667 23.6849 -0.131667 23.1625 0.395Z"
									fill="#F1F2FD" />
								<path
									d="M36.5569 0.395L27.1807 9.72833C26.6583 10.2483 26.6583 11.095 27.1807 11.615C27.7031 12.135 28.5537 12.135 29.076 11.615L38.4522 2.28167C38.9746 1.76167 38.9746 0.915 38.4522 0.395C37.9231 -0.131667 37.0793 -0.131667 36.5569 0.395Z"
									fill="#F1F2FD" />
								<path
									d="M49.9514 0.395L40.5753 9.72833C40.0529 10.2483 40.0529 11.095 40.5753 11.615C41.0976 12.135 41.9482 12.135 42.4706 11.615L51.8467 2.28167C52.3691 1.76167 52.3691 0.915 51.8467 0.395C51.3176 -0.131667 50.4738 -0.131667 49.9514 0.395Z"
									fill="#F1F2FD" />
								<path
									d="M63.3459 0.395L53.9698 9.72833C53.4474 10.2483 53.4474 11.095 53.9698 11.615C54.4922 12.135 55.3427 12.135 55.8651 11.615L65.2413 2.28167C65.7636 1.76167 65.7636 0.915 65.2413 0.395C64.7122 -0.131667 63.8683 -0.131667 63.3459 0.395Z"
									fill="#F1F2FD" />
								<path
									d="M76.7405 0.395L67.3643 9.72833C66.8419 10.2483 66.8419 11.095 67.3643 11.615C67.8867 12.135 68.7373 12.135 69.2596 11.615L78.6358 2.28167C79.1582 1.76167 79.1582 0.915 78.6358 0.395C78.1067 -0.131667 77.2629 -0.131667 76.7405 0.395Z"
									fill="#F1F2FD" />
								<path
									d="M90.1349 0.395L80.7587 9.72833C80.2363 10.2483 80.2363 11.095 80.7587 11.615C81.2811 12.135 82.1317 12.135 82.6541 11.615L92.0302 2.28167C92.5526 1.76167 92.5526 0.915 92.0302 0.395C91.5011 -0.131667 90.6573 -0.131667 90.1349 0.395Z"
									fill="#F1F2FD" />
								<path
									d="M103.529 0.395L94.1533 9.72833C93.6309 10.2483 93.6309 11.095 94.1533 11.615C94.6756 12.135 95.5262 12.135 96.0486 11.615L105.425 2.28167C105.947 1.76167 105.947 0.915 105.425 0.395C104.896 -0.131667 104.052 -0.131667 103.529 0.395Z"
									fill="#F1F2FD" />
								<path
									d="M116.924 0.395L107.548 9.72833C107.025 10.2483 107.025 11.095 107.548 11.615C108.07 12.135 108.921 12.135 109.443 11.615L118.819 2.28167C119.342 1.76167 119.342 0.915 118.819 0.395C118.29 -0.131667 117.446 -0.131667 116.924 0.395Z"
									fill="#F1F2FD" />
								<path
									d="M130.318 0.395L120.942 9.72833C120.42 10.2483 120.42 11.095 120.942 11.615C121.465 12.135 122.315 12.135 122.838 11.615L132.214 2.28167C132.736 1.76167 132.736 0.915 132.214 0.395C131.685 -0.131667 130.841 -0.131667 130.318 0.395Z"
									fill="#F1F2FD" />
							</svg>
						</h5>
						<h2 class="section-title__title"><?php echo get_field('main_about_title'); ?></h2>
					</div><!-- section-title -->
					<p class="about-one__content__text">
						<?php echo get_field('main_about_tFavorite Topics To Learnext'); ?>
					</p>
					<?php
					while (have_rows('main_about_list')) {
						the_row();
						$main_about_list_item = get_sub_field('main_about_list_item');
					?>
						<div class="about-one__box">
							<div class="about-one__box__wrapper">
								<h4 class="about-one__box__title"><?php echo $main_about_list_item;  ?></h4>
							</div>
						</div><!-- /.icon-box -->
					<?php } ?>
					<a href="/o-kompanii/" class="eduact-btn"><span class="eduact-btn__curve"></span>Read more<i
							class="icon-arrow"></i></a><!-- /.btn -->
				</div><!-- about content end-->
			</div>
		</div>
	</div>
</section>
<!-- About End -->
<!-- Category Start -->
<section class="category-one" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/shapes/category-bg-1.jpg);">
	<div class="container">
		<div class="section-title text-center">
			<h5 class="section-title__tagline">
				Category
				<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 133 13" fill="none">
					<path
						d="M9.76794 0.395L0.391789 9.72833C-0.130596 10.2483 -0.130596 11.095 0.391789 11.615C0.914174 12.135 1.76472 12.135 2.28711 11.615L11.6633 2.28167C12.1856 1.76167 12.1856 0.915 11.6633 0.395C11.1342 -0.131667 10.2903 -0.131667 9.76794 0.395Z"
						fill="#F1F2FD" />
					<path
						d="M23.1625 0.395L13.7863 9.72833C13.2639 10.2483 13.2639 11.095 13.7863 11.615C14.3087 12.135 15.1593 12.135 15.6816 11.615L25.0578 2.28167C25.5802 1.76167 25.5802 0.915 25.0578 0.395C24.5287 -0.131667 23.6849 -0.131667 23.1625 0.395Z"
						fill="#F1F2FD" />
					<path
						d="M36.5569 0.395L27.1807 9.72833C26.6583 10.2483 26.6583 11.095 27.1807 11.615C27.7031 12.135 28.5537 12.135 29.076 11.615L38.4522 2.28167C38.9746 1.76167 38.9746 0.915 38.4522 0.395C37.9231 -0.131667 37.0793 -0.131667 36.5569 0.395Z"
						fill="#F1F2FD" />
					<path
						d="M49.9514 0.395L40.5753 9.72833C40.0529 10.2483 40.0529 11.095 40.5753 11.615C41.0976 12.135 41.9482 12.135 42.4706 11.615L51.8467 2.28167C52.3691 1.76167 52.3691 0.915 51.8467 0.395C51.3176 -0.131667 50.4738 -0.131667 49.9514 0.395Z"
						fill="#F1F2FD" />
					<path
						d="M63.3459 0.395L53.9698 9.72833C53.4474 10.2483 53.4474 11.095 53.9698 11.615C54.4922 12.135 55.3427 12.135 55.8651 11.615L65.2413 2.28167C65.7636 1.76167 65.7636 0.915 65.2413 0.395C64.7122 -0.131667 63.8683 -0.131667 63.3459 0.395Z"
						fill="#F1F2FD" />
					<path
						d="M76.7405 0.395L67.3643 9.72833C66.8419 10.2483 66.8419 11.095 67.3643 11.615C67.8867 12.135 68.7373 12.135 69.2596 11.615L78.6358 2.28167C79.1582 1.76167 79.1582 0.915 78.6358 0.395C78.1067 -0.131667 77.2629 -0.131667 76.7405 0.395Z"
						fill="#F1F2FD" />
					<path
						d="M90.1349 0.395L80.7587 9.72833C80.2363 10.2483 80.2363 11.095 80.7587 11.615C81.2811 12.135 82.1317 12.135 82.6541 11.615L92.0302 2.28167C92.5526 1.76167 92.5526 0.915 92.0302 0.395C91.5011 -0.131667 90.6573 -0.131667 90.1349 0.395Z"
						fill="#F1F2FD" />
					<path
						d="M103.529 0.395L94.1533 9.72833C93.6309 10.2483 93.6309 11.095 94.1533 11.615C94.6756 12.135 95.5262 12.135 96.0486 11.615L105.425 2.28167C105.947 1.76167 105.947 0.915 105.425 0.395C104.896 -0.131667 104.052 -0.131667 103.529 0.395Z"
						fill="#F1F2FD" />
					<path
						d="M116.924 0.395L107.548 9.72833C107.025 10.2483 107.025 11.095 107.548 11.615C108.07 12.135 108.921 12.135 109.443 11.615L118.819 2.28167C119.342 1.76167 119.342 0.915 118.819 0.395C118.29 -0.131667 117.446 -0.131667 116.924 0.395Z"
						fill="#F1F2FD" />
					<path
						d="M130.318 0.395L120.942 9.72833C120.42 10.2483 120.42 11.095 120.942 11.615C121.465 12.135 122.315 12.135 122.838 11.615L132.214 2.28167C132.736 1.76167 132.736 0.915 132.214 0.395C131.685 -0.131667 130.841 -0.131667 130.318 0.395Z"
						fill="#F1F2FD" />
				</svg>
			</h5>
			<h2 class="section-title__title">Favorite Topics To Learn</h2>
		</div><!-- section-title -->
		<div class="category-one__slider eduact-owl__carousel owl-with-shadow owl-theme owl-carousel" data-owl-options='{
            "items": 4,
            "margin": 30,
            "smartSpeed": 700,
            "loop":true,
            "autoplay": true,
            "nav":false,
            "dots":true,
            "navText": ["<span class=\"icon-arrow-left\"></span>","<span class=\"icon-arrow\"></span>"],
            "responsive":{
                "0":{
                    "items":1,
                    "nav":true,
                    "dots":false,
                    "margin": 0
                },
                "670":{
                    "nav":true,
                    "dots":false,
                    "items": 2
                },
                "992":{
                    "items": 3
                },
                "1200":{
                    "items": 3
                },
                "1400":{
                    "items": 4,
                    "margin": 36
                }
            }
            }'>
			<?php $terms = get_terms([
				'taxonomy' => 'product_cat',
				'exclude' => array_merge(
					[15, 24, 209],
				),
			]);
			foreach ($terms as  $value) { ?>
				<div class="item">
					<a href="<?php echo get_term_link($value); ?>" class="category-one__item">
						<div class="category-one__wrapper"
							style="background-color:#f1f2fd;">
							<div class="category-one__thumb"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/category/category-normal-1.png" alt="eduact" style="opacity:0;" />
							</div><!-- /.category-thumb -->
							<div class="category-one__content">
								<div class="category-one__icon">
									<img class="categoriImages" src="<?php echo get_field("foto_kategorii", 'term_' . $value->term_id)["url"]; ?>" alt="">
								</div><!-- /.category-icon -->
								<h3 class="category-one__title"><?php echo $value->name; ?></h3><!-- /.category-title -->
								<p class="category-one__text"><?php echo $value->count; ?> Курса</p><!-- /.category-content -->
							</div>
						</div>

					</a><!-- /.category-card-one -->
				</div>
			<?php		}
			?>


		</div>
	</div>
</section>
<!-- Category End -->
<!-- Course Start -->
<section class="course-one" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/shapes/course-bg-1.png);">
	<div class="container">
		<div class="section-title text-center">
			<h5 class="section-title__tagline">
				Best Course
				<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 133 13" fill="none">
					<path
						d="M9.76794 0.395L0.391789 9.72833C-0.130596 10.2483 -0.130596 11.095 0.391789 11.615C0.914174 12.135 1.76472 12.135 2.28711 11.615L11.6633 2.28167C12.1856 1.76167 12.1856 0.915 11.6633 0.395C11.1342 -0.131667 10.2903 -0.131667 9.76794 0.395Z"
						fill="#F1F2FD" />
					<path
						d="M23.1625 0.395L13.7863 9.72833C13.2639 10.2483 13.2639 11.095 13.7863 11.615C14.3087 12.135 15.1593 12.135 15.6816 11.615L25.0578 2.28167C25.5802 1.76167 25.5802 0.915 25.0578 0.395C24.5287 -0.131667 23.6849 -0.131667 23.1625 0.395Z"
						fill="#F1F2FD" />
					<path
						d="M36.5569 0.395L27.1807 9.72833C26.6583 10.2483 26.6583 11.095 27.1807 11.615C27.7031 12.135 28.5537 12.135 29.076 11.615L38.4522 2.28167C38.9746 1.76167 38.9746 0.915 38.4522 0.395C37.9231 -0.131667 37.0793 -0.131667 36.5569 0.395Z"
						fill="#F1F2FD" />
					<path
						d="M49.9514 0.395L40.5753 9.72833C40.0529 10.2483 40.0529 11.095 40.5753 11.615C41.0976 12.135 41.9482 12.135 42.4706 11.615L51.8467 2.28167C52.3691 1.76167 52.3691 0.915 51.8467 0.395C51.3176 -0.131667 50.4738 -0.131667 49.9514 0.395Z"
						fill="#F1F2FD" />
					<path
						d="M63.3459 0.395L53.9698 9.72833C53.4474 10.2483 53.4474 11.095 53.9698 11.615C54.4922 12.135 55.3427 12.135 55.8651 11.615L65.2413 2.28167C65.7636 1.76167 65.7636 0.915 65.2413 0.395C64.7122 -0.131667 63.8683 -0.131667 63.3459 0.395Z"
						fill="#F1F2FD" />
					<path
						d="M76.7405 0.395L67.3643 9.72833C66.8419 10.2483 66.8419 11.095 67.3643 11.615C67.8867 12.135 68.7373 12.135 69.2596 11.615L78.6358 2.28167C79.1582 1.76167 79.1582 0.915 78.6358 0.395C78.1067 -0.131667 77.2629 -0.131667 76.7405 0.395Z"
						fill="#F1F2FD" />
					<path
						d="M90.1349 0.395L80.7587 9.72833C80.2363 10.2483 80.2363 11.095 80.7587 11.615C81.2811 12.135 82.1317 12.135 82.6541 11.615L92.0302 2.28167C92.5526 1.76167 92.5526 0.915 92.0302 0.395C91.5011 -0.131667 90.6573 -0.131667 90.1349 0.395Z"
						fill="#F1F2FD" />
					<path
						d="M103.529 0.395L94.1533 9.72833C93.6309 10.2483 93.6309 11.095 94.1533 11.615C94.6756 12.135 95.5262 12.135 96.0486 11.615L105.425 2.28167C105.947 1.76167 105.947 0.915 105.425 0.395C104.896 -0.131667 104.052 -0.131667 103.529 0.395Z"
						fill="#F1F2FD" />
					<path
						d="M116.924 0.395L107.548 9.72833C107.025 10.2483 107.025 11.095 107.548 11.615C108.07 12.135 108.921 12.135 109.443 11.615L118.819 2.28167C119.342 1.76167 119.342 0.915 118.819 0.395C118.29 -0.131667 117.446 -0.131667 116.924 0.395Z"
						fill="#F1F2FD" />
					<path
						d="M130.318 0.395L120.942 9.72833C120.42 10.2483 120.42 11.095 120.942 11.615C121.465 12.135 122.315 12.135 122.838 11.615L132.214 2.28167C132.736 1.76167 132.736 0.915 132.214 0.395C131.685 -0.131667 130.841 -0.131667 130.318 0.395Z"
						fill="#F1F2FD" />
				</svg>
			</h5>
			<h2 class="section-title__title">Featured Course On This Month</h2>
		</div><!-- section-title -->
		<div class="row">
			<?php
			$catalog_query = new WP_Query([
				'post_type' => 'product',
				'posts_per_page' => 6,
				'post__in' => wc_get_featured_product_ids(),
			]);

			while ($catalog_query->have_posts()) {
				$catalog_query->the_post();
				$catalog_query->post;
				$post_id = get_the_ID();
				$tax = get_the_terms($post_id, "techer");

			?>
				<div class="col-xl-4 col-lg-6 wow fadeInUp" data-wow-delay="100ms">
					<div class="course-one__item">
						<div class="course-one__content">
							<?php
							wc_get_template_part('content', 'product');
							?>
							<?php foreach ($tax as $value) { ?>
								<div class="course-one__bottom">
									<div class="course-one__author">
										<img src="<?php echo get_field("foto_uchitelya", 'term_' . $value->term_id)["url"]; ?>" alt="eduact">

										<h5 class="course-one__author__name"><?php echo $value->name; ?></h5>


										<p class="course-one__author__designation"><?php echo get_field("dolzhnost", 'term_' . $value->term_id); ?></p>
									</div>
									<div class="course-one__meta">

										<p class="course-one__meta__class"><?php echo $value->count; ?> уроков</p>
									</div>
								</div>
							<?php } ?>
						</div><!-- /.course-content -->
					</div><!-- /.course-card-one -->
				</div>
			<?php }
			wp_reset_postdata();

			?>


		</div>
	</div>
</section>
<!-- Course End -->

<!-- Counter Start -->
<section class="counter-one" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/shapes/counter-bg-1.jpg);">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 wow fadeInLeft" data-wow-delay="200ms">
				<div class="counter-one__left">
					<h4 class="counter-one__left__title"><?php echo get_field("blok_nad_futeromzagolovok"); ?></h4>
					<div class="counter-one__left__content"><?php echo get_field("blok_nad_futeromtekst"); ?></div>

					<img src="<?php echo get_template_directory_uri(); ?>/assets/images/shapes/counter-dot.png" alt="eduact">
				</div>
			</div>
			<div class="col-lg-6">
				<div class="counter-one__shapes wow fadeInUp" data-wow-delay="200ms">
					<svg viewBox="0 0 581 596" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path
							d="M161.37 12.301C221.003 -53.0048 563.794 156.411 579.671 299.209C595.548 442.007 237.88 668.171 135.305 571.868C46.2938 488.252 -0.524429 189.658 161.37 12.301Z"
							fill="url(#paint0_linear_227_946)" />
						<path
							d="M289.511 579.243C203.626 594.241 -34.778 302.771 4.28926 182.908C43.3565 63.0458 313.639 12.301 483.973 114.853C666.745 224.904 435.092 553.933 289.511 579.243Z"
							fill="url(#paint1_linear_227_946)" />
						<defs>
							<linearGradient id="paint0_linear_227_946" x1="172.303" y1="27.9012" x2="521.418" y2="508.929"
								gradientUnits="userSpaceOnUse">
								<stop offset="0" stop-color="#4F5DE4" stop-opacity="0" />
								<stop offset="0.269374" stop-color="#9EA6F0" stop-opacity="0.550859" />
								<stop offset="1" stop-color="white" stop-opacity="0" />
							</linearGradient>
							<linearGradient id="paint1_linear_227_946" x1="123.876" y1="84.092" x2="408.261" y2="553.853"
								gradientUnits="userSpaceOnUse">
								<stop offset="0" stop-color="#FF7200" />
								<stop offset="1" stop-color="white" stop-opacity="0" />
							</linearGradient>
						</defs>
					</svg>
				</div>
				<div class="counter-one__area wow zoomIn" data-wow-delay="400ms">
					<img src="<?php echo get_field("blok_nad_futeromfotka")["url"]; ?>" alt="eduact">
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Counter End -->
<?php get_footer(); ?>