<?php
$lang = pll_current_language();
?>
<div class="container-fluid bg-secondary text-dark mt-5 pt-5">
	<div class="row px-xl-5 pt-5">
		<div class="col-lg-4 col-md-12 mb-5 pr-3 pr-xl-5">
			<?php if (is_front_page()) { ?>
				<span class="text-decoration-none">
					<h1 class="mb-4 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border border-white px-3 mr-1">E</span>Shopper</h1>
				</span>
			<?php } else { ?>
				<a href="<?php echo get_home_url(); ?>" class="text-decoration-none">
					<h1 class="mb-4 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border border-white px-3 mr-1">E</span>Shopper</h1>
				</a>
			<?php } ?>
			<p class="copywrite">&copy; <?php echo esc_attr(pll__('All rights reserved')); ?></p>
			<img class="img-fluid" src="<?php echo get_template_directory_uri(); ?>/img/payments.png" alt="">
		</div>
		<div class="col-lg-8 col-md-12">
			<div class="row">
				<div class="col-md-4 mb-5">
					<h5 class="font-weight-bold text-dark mb-4"><?php echo esc_attr(pll__('Menu')); ?></h5>
					<ul class="d-flex flex-column justify-content-start p-0 list-style-type-none">
						<?php
						wp_nav_menu([
							'menu' => 'menu_main_footer',
							'theme_location' => 'menu_main_footer',
							'items_wrap' => '%3$s',
							'container' => false,
							'walker' => new footer_menu_Walker
						]);
						?>
					</ul>
				</div>
				<div class="col-md-4 mb-5">
					<h5 class="font-weight-bold text-dark mb-4"><?php echo esc_attr(pll__('Categories')); ?></h5>
					<div class="d-flex flex-column justify-content-start">
						<ul class="navbar-nav w-100 overflow-hidden">
							<?php
							wp_nav_menu([
								'menu' => 'menu_main_header',
								'theme_location' => 'categories',
								'items_wrap' => '%3$s',
								'container' => false,
								'walker' => new footer_menu_Walker
							]);
							?>
						</ul>
					</div>
				</div>
				<div class="col-md-4 mb-5">
					<h5 class="font-weight-bold text-dark mb-4"><?php echo esc_attr(pll__('Contacts')); ?></h5>
					<p>
						<?php if ($lang == 'ru') {
							echo get_field('contacts_address', 'option');
						} else if ($lang == 'en') {
							echo get_field('contacts_address_en', 'option');
						} else {
							echo get_field('contacts_address_kz', 'option');
						} ?>
					</p>
					<?php if (get_field('contacts_email', 'option')) { ?>
						<p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i><?php echo get_field('contacts_email', 'option'); ?></p>
					<?php } ?>
					<?php if (get_field('contacts_phone', 'option')) { ?>
						<p class="mb-2"><i class="fa fa-phone-alt text-primary mr-3"></i><?php echo get_field('contacts_phone', 'option'); ?></p>
					<?php } ?>

				</div>
			</div>
		</div>
	</div>

</div>


<a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>

<?php wp_footer(); ?>
</body>

</html>