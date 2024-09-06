<?php
$lang = pll_current_language();
?>
<footer class="main-footer">
	<div class="main-footer__bg" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/shapes/footer-bg-1.png);"></div>
	<div class="container">
		<div class="row">
			<div class="col-xl-3 col-md-5 wow fadeInUp" data-wow-delay="100ms">
				<div class="main-footer__about">
					<a href="index.html" class="main-footer__logo">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/images/footer-logo.png" alt="eduact" width="213" height="55">
					</a><!-- /.footer-logo -->
					<p class="text-size-16 d-none d-sm-block mt-3">&copy; <?php echo esc_attr(pll__('All rights reserved')); ?></p>
				</div><!-- footer-top -->
			</div>
			<div class="col-xl-3 col-md-4 wow fadeInUp" data-wow-delay="200ms">
				<div class="main-footer__navmenu main-footer__widget01">
					<h3 class="main-footer__title">Quick Links</h3>
					<ul>
						<?php
						wp_nav_menu([
							'menu' => 'menu_main_footer',
							'theme_location' => 'menu_main_footer',
							'items_wrap' => '%3$s',
							'container' => false,
							'walker' => new footer_menu_Walker
						]);
						?>
					</ul><!-- /.list-unstyled -->
				</div><!-- /.footer-menu -->
			</div>
			<div class="col-xl-2 col-md-3 wow fadeInUp" data-wow-delay="300ms">
				<div class="main-footer__navmenu main-footer__widget02">
					<h3 class="main-footer__title">Explore</h3>
					<ul>
						<?php
						wp_nav_menu([
							'menu' => 'menu_main_header',
							'theme_location' => 'categories',
							'items_wrap' => '%3$s',
							'container' => false,
							'walker' => new footer_menu_Walker
						]);
						?>
					</ul><!-- /.list-unstyled -->
				</div><!-- /.footer-menu -->
			</div>
			<div class="col-xl-4 col-md-12 wow fadeInUp" data-wow-delay="400ms">
				<div class="main-footer__newsletter">
					<h3 class="main-footer__title">Contact Us</h3>
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
						<a href="mailto:<?php echo get_field('contacts_email', 'option'); ?>" class="mb-2"><?php echo get_field('contacts_email', 'option'); ?></a>
					<?php } ?>
					<?php if (get_field('contacts_phone', 'option')) { ?>
						<a href="tel:<?php echo get_field('contacts_phone', 'option'); ?>" class="mb-2"><?php echo get_field('contacts_phone', 'option'); ?></a>
					<?php } ?>
					<div class="mc-form__response"></div>
				</div><!-- /.footer-mailchimp -->
			</div>
		</div><!-- /.row -->
	</div><!-- /.container -->
</footer><!-- /.main-footer -->

<section class="copyright text-center">
	<div class="container wow fadeInUp" data-wow-delay="400ms">
		<p class="copyright__text">Copyright <span class="dynamic-year"></span><!-- /.dynamic-year --> | Eduact HTML
			Template. All Rights Reserved</p>
	</div><!-- /.container -->
</section><!-- /.copyright -->

</div><!-- /.page-wrapper -->


<div class="mobile-nav__wrapper">
	<div class="mobile-nav__overlay mobile-nav__toggler"></div>
	<!-- /.mobile-nav__overlay -->
	<div class="mobile-nav__content">
		<span class="mobile-nav__close mobile-nav__toggler"><i class="fa fa-times"></i></span>
		<div class="logo-box">
			<a href="index.html" aria-label="logo image"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo-light.png" width="183" height="48"
					alt="eduact" /></a>
		</div>
		<!-- /.logo-box -->
		<div class="mobile-nav__container"></div>
		<!-- /.mobile-nav__container -->
		<ul class="mobile-nav__contact list-unstyled">
			<?php if (get_field('contacts_email', 'option')) { ?>
				<li>
					<i class="fa fa-phone-alt"></i>
					<a href="tel:<?php echo get_field('contacts_phone', 'option'); ?>"><?php echo get_field('contacts_phone', 'option'); ?></a>
				</li>
			<?php } ?>
			<?php if (get_field('contacts_phone', 'option')) { ?>
				<li>
					<i class="fas fa-envelope"></i>
					<a href="mailto:<?php echo get_field('contacts_email', 'option'); ?>"><?php echo get_field('contacts_email', 'option'); ?></a>
				</li>
			<?php } ?>


		</ul><!-- /.mobile-nav__contact -->
	</div>
	<!-- /.mobile-nav__content -->
</div>
<!-- /.mobile-nav__wrapper -->

<div class="search-popup">
	<div class="search-popup__overlay search-toggler"></div>
	<!-- /.search-popup__overlay -->
	<div class="search-popup__content">
		<form role="search" method="get" class="search-popup__form" action="#">
			<input type="text" id="search" placeholder="Search Here..." />
			<button type="submit" class="eduact-btn"><span class="eduact-btn__curve"></span><i
					class="icon-Search"></i></button>
		</form>
	</div>
	<!-- /.search-popup__content -->
</div>
<!-- /.search-popup -->

<!-- back-to-top-start -->
<a href="#" class="scroll-top">
	<svg class="scroll-top__circle" width="100%" height="100%" viewBox="-1 -1 102 102">
		<path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
	</svg>
</a>
<!-- back-to-top-end -->

<?php wp_footer(); ?>
</body>

</html>