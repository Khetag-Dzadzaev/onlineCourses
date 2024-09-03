<?php if (is_cart() || is_checkout() || is_woocommerce() || is_account_page()) { ?>
	<?php get_header(); ?>
	<?php if (is_account_page()) { ?>
		<div class="container-fluid bg-secondary mb-5">
			<div class="inner-first d-flex flex-column align-items-center justify-content-center">
				<h1 class="font-weight-semi-bold text-uppercase mb-3"><?php the_title(); ?></h1>
				<?php echo get_template_part("template_parts/breadcrumb-block"); ?>
			</div>
		</div>
	<?php } ?>
	<?php the_content(); ?>
	<?php get_footer(); ?>
<?php } else { ?>
	<?php get_header(); ?>
	<div class="container-fluid bg-secondary mb-5">
		<div class="inner-first d-flex flex-column align-items-center justify-content-center">
			<h1 class="font-weight-semi-bold text-uppercase mb-3"><?php the_title(); ?></h1>
			<?php echo get_template_part("template_parts/breadcrumb-block"); ?>
		</div>
	</div>
	<div class="container">
		<?php the_content(); ?>
		<?php /*echo get_template_part("template_parts/block");*/ ?>
	</div>
	<?php get_footer(); ?>
<?php } ?>