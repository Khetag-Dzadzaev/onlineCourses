<?php if (is_cart() || is_checkout() || is_woocommerce() || is_account_page()) { ?>
	<?php get_header(); ?>
	<section class="float-left w-100 banner-con sub-banner-con position-relative main-box">
		<img alt="vector" class="vector1  img-fluid position-absolute" src="<?php echo get_template_directory_uri(); ?>/assets/images/vector1.png">
		<img alt="vector" class="vector2 img-fluid position-absolute" src="<?php echo get_template_directory_uri(); ?>/assets/images/vector2.png">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="sub-banner-inner-con padding-bottom">
						<h1><?php the_title(); ?></h1>
						<?php echo get_template_part("template_parts/breadcrumb-block"); ?>
					</div>
				</div>
			</div>
		</div>

	</section>
	</div>
	<div class="blog-tabs-section w-100 float-left padding-top padding-bottom background-gradient">
		<div class="container<?php /* if (is_cart() || is_checkout()) echo '-fluid'; */ ?>">
			<?php the_content(); ?>
		</div>
	</div>
	<?php get_footer(); ?>
<?php } else { ?>
	<?php get_header(); ?>

	<section class="float-left w-100 banner-con sub-banner-con position-relative main-box">
		<img alt="vector" class="vector1  img-fluid position-absolute" src="<?php echo get_template_directory_uri(); ?>/assets/images/vector1.png">
		<img alt="vector" class="vector2 img-fluid position-absolute" src="<?php echo get_template_directory_uri(); ?>/assets/images/vector2.png">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="sub-banner-inner-con padding-bottom">
						<h1><?php the_title(); ?></h1>
						<?php echo get_template_part("template_parts/breadcrumb-block"); ?>
					</div>
				</div>
			</div>
		</div>

	</section>
	</div>

	<div class="blog-tabs-section w-100 float-left padding-top padding-bottom background-gradient">
		<div class="container">
			<?php the_content(); ?>
		</div>
	</div>

	<?php get_footer(); ?>
<?php } ?>