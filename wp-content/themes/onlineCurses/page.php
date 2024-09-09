<?php get_header("all");
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
		<div class="content"><!-- about content start-->
			<?php the_content(); ?>
		</div><!-- about content end -->
	</div>
</section>

<?php get_footer(); ?>