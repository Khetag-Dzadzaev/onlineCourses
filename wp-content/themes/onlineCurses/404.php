<?php get_header("all");
?>

<section class="page-header page-header--bg-two" data-jarallax data-speed="0.3" data-imgPosition="50% -100%">
	<div class="page-header__bg jarallax-img" style="	background-image: url(<?php if (!empty(get_field("zadnij_fon", "option"))) {
																																							echo get_field("zadnij_fon", "option")["url"];
																																						} else {
																																							echo (get_template_directory_uri() . "/<?php echo get_template_directory_uri(); ?>/<?php echo get_template_directory_uri(); ?>/assets/images/backgrounds/page-header-bg-1-1.jpg)");
																																						} ?>
																																						"></div><!-- /.page-header-bg -->
	<div class="page-header__overlay"></div><!-- /.page-header-overlay -->
	<div class="container text-center">
		<h2 class="page-header__title">404</h2><!-- /.page-title -->
		<ul class="page-header__breadcrumb list-unstyled">
			<?php bcn_display(); ?>
		</ul><!-- /.page-breadcrumb list-unstyled -->
	</div><!-- /.container -->
</section><!-- /.page-header -->
<!-- About Start -->
<!-- Error Start -->
<section class="error-page">
	<div class="container">
		<div class="error-page__content">
			<!--<h1 class="error-page__404-title">404</h1>-->
			<div class="error-page__thumb">
				<div class="error-page__404"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/shapes/404.png" alt="eduact"></div>
				<!-- 404-image -->
				<div class="error-page__shape1 wow zoomIn" data-wow-delay="300ms">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/images/shapes/404-shape-1.png" alt="eduact">
				</div><!-- 404-shape-01 -->
				<div class="error-page__shape2 wow zoomIn" data-wow-delay="400ms">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/images/shapes/404-shape-2.png" alt="eduact">
				</div><!-- 404-shape-02 -->
				<div class="error-page__shape3">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/images/shapes/404-shape-3.png" alt="eduact">
				</div><!-- 404-shape-03 -->
				<div class="error-page__shape4">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/images/shapes/404-shape-4.png" alt="eduact">
				</div><!-- 404-shape-04 -->
				<div class="error-page__shape5">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/images/shapes/404-shape-5.png" alt="eduact">
				</div><!-- 404-shape-05 -->
				<div class="error-page__shape6">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/images/shapes/404-shape-6.png" alt="eduact">
				</div><!-- 404-shape-06 -->
				<div class="error-page__shape7">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/images/shapes/404-shape-7.png" alt="eduact">
				</div><!-- 404-shape-07 -->
				<div class="error-page__shape8">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/images/shapes/404-shape-8.png" alt="eduact">
				</div><!-- 404-shape-08 -->
				<div class="error-page__shape9">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/images/shapes/404-shape-9.png" alt="eduact">
				</div><!-- 404-shape-09 -->
				<div class="error-page__shape10">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/images/shapes/404-shape-10.png" alt="eduact">
				</div><!-- 404-shape-10 -->
				<div class="error-page__shape11">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/images/shapes/404-shape-11.png" alt="eduact">
				</div><!-- 404-shape-11 -->
			</div>
			<h4 class="error-page__title">Oops! Page not Found</h4><!-- 404-title -->
			<p class="error-page__text">The page you are looking for is not exist.</p><!-- 404-content -->
			<a href="/" class="eduact-btn eduact-btn-second"><span class="eduact-btn__curve"></span>Back to
				Home<i class="icon-arrow"></i></a><!-- 404-btn -->
		</div><!-- 404-info -->
	</div>
</section>
<!-- Error End -->

<?php get_footer(); ?>