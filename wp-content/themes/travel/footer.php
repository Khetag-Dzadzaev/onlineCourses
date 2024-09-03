<?php
$lang = pll_current_language();
?>
<section class="float-left w-100 position-relative main-box footer-con">
	<div class="container">
		<div class="middle-portion">
			<div class="row">
				<div class="col-lg-4 col-md-6 col-sm-6 col-12 footer-logo-con">
					<?php if (is_front_page()) { ?>
						<span>
							<figure class="footer-logo">
								<img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo-icon1.png" class="img-fluid" alt="">
							</figure>
						</span>
					<?php } else { ?>
						<a href="<?php echo get_home_url(); ?>">
							<figure class="footer-logo">
								<img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo-icon1.png" class="img-fluid" alt="">
							</figure>
						</a>
					<?php } ?>
					<figure class="mb-0 payment-icon">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/images/visa-mastercard.png" class="img-fluid" alt="">
					</figure>
					<p class="text-size-16 d-none d-sm-block mt-3">&copy; <?php echo esc_attr(pll__('All rights reserved')); ?></p>
				</div>
				<div class="col-lg-3 col-md-6 col-sm-6 col-12">
					<div class="links">
						<h4 class="heading"><?php echo esc_attr(pll__('Menu')); ?></h4>
						<hr class="line">
						<ul class="list-unstyled mb-0">
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
				</div>
				<div class="col-lg-2 col-md-6 col-sm-6 col-12">
					<div class="links var1">
						<h4 class="heading"><?php echo esc_attr(pll__('Categories')); ?></h4>
						<hr class="line">
						<ul class="list-unstyled mb-0">
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
				<div class="col-lg-3 col-md-6 col-sm-6 col-12 d-sm-block">
					<div class="icon">
						<h4 class="heading"><?php echo esc_attr(pll__('Contacts')); ?></h4>
						<hr class="line">
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
							<p class="mb-2"><i class="fa fa-envelope mr-3" style="color: #1ec28b;"></i><?php echo get_field('contacts_email', 'option'); ?></p>
						<?php } ?>
						<?php if (get_field('contacts_phone', 'option')) { ?>
							<p class="mb-2"><i class="fa fa-phone-alt mr-3" style="color: #1ec28b;"></i><?php echo get_field('contacts_phone', 'option'); ?></p>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
		<div class="copyright-con d-sm-none">
			<div class="row">
				<div class="col-12">
					<p class="text-size-16">&copy; <?php echo esc_attr(pll__('All rights reserved')); ?></p>
				</div>
			</div>
		</div>
	</div>
</section>

<button id="back-to-top-btn" title="Back to Top"></button>

<div data-auth-modal class="custom-modal">
	<div data-auth-modal-backdrop class="custom-modal__backdrop"></div>

	<div class="custom-modal__content">
		<form class="auth-modal">
			<div class="auth-modal__title">
				<?php esc_html_e('Login', 'woocommerce'); ?>
			</div>

			<div class="auth-modal__response"></div>

			<div class="auth-modal__form-groups">
				<div class="custom-form-group">
					<label class="custom-form-group__label">
						<?php esc_html_e('Username or email address', 'woocommerce'); ?>
					</label>

					<input type="text" class="custom-form-group__input" name="login">
				</div>

				<div class="custom-form-group custom-form-group_password">
					<label class="custom-form-group__label"><?php esc_html_e('Password', 'woocommerce'); ?></label>

					<div class="custom-form-group__input-wrapper">
						<input type="password" class="custom-form-group__input" name="password">

						<button type="button" class="custom-form-group__trigger">
							<i class="fa-solid fa-eye custom-form-group__trigger-first"></i>

							<i class="fa-solid fa-eye-slash custom-form-group__trigger-second"></i>
						</button>
					</div>
				</div>
			</div>

			<div class="auth-modal__button">
				<button type="submit" class="custom-button">
					<?php esc_html_e('Log in', 'woocommerce'); ?>
				</button>
			</div>

			<div class="auth-modal__sidelinks">
				<div>
					<a href="/moj-akkaunt/lost-password/"><?php esc_html_e('Lost your password?', 'woocommerce'); ?></a>
				</div>

				<div>
					<a href="/moj-akkaunt/"><?php esc_html_e('Sign Up', 'woocommerce') ?></a>
				</div>
			</div>
		</form>
	</div>
</div>

<?php wp_footer(); ?>
</body>

</html>