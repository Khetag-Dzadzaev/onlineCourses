<?php

/**
 * Login Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-login.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 7.0.1
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

do_action('woocommerce_before_customer_login_form'); ?>

<form method="post" <?php do_action('woocommerce_register_form_tag'); ?> id="registration-form" class="registration-form">
	<div class="registration-form__title">
		<?php esc_html_e('Register', 'woocommerce'); ?>
	</div>

	<div class="registration-form__row row">
		<div class="col-12 col-md-8">
			<div class="custom-form-group">
				<label for="reg_email" class="custom-form-group__label">
					<?php esc_html_e('Email address', 'woocommerce'); ?>&nbsp;<span style="color: red;">*</span>
				</label>

				<input type="email" name="email" id="reg_email" autocomplete="email" value="<?php echo (!empty($_POST['email'])) ? esc_attr(wp_unslash($_POST['email'])) : ''; ?>" class="custom-form-group__input" />
			</div>
		</div>

		<div class="col-12 col-md-6">
			<div class="custom-form-group">
				<label for="reg_billing_first_name" class="custom-form-group__label">
					<?php esc_html_e('First name', 'woocommerce'); ?>
				</label>

				<input type="text" class="custom-form-group__input" name="billing_first_name" id="reg_billing_first_name" autocomplete="billing_first_name" value="<?php if (!empty($_POST['billing_first_name'])) esc_attr_e($_POST['billing_first_name']); ?>" />
			</div>
		</div>

		<div class="col-12 col-md-6">
			<div class="custom-form-group">
				<label for="reg_billing_last_name" class="custom-form-group__label">
					<?php esc_html_e('Last name', 'woocommerce'); ?>
				</label>

				<input type="text" class="custom-form-group__input" name="billing_last_name" id="reg_billing_last_name" autocomplete="billing_last_name" value="<?php if (!empty($_POST['billing_last_name'])) esc_attr_e($_POST['billing_last_name']); ?>" />
			</div>
		</div>

		<div class="col-12 col-md-6">
			<div class="custom-form-group custom-form-group_password">
				<label for="reg_password" class="custom-form-group__label">
					<?php esc_html_e('Password', 'woocommerce'); ?>&nbsp;<span style="color: red;">*</span>
				</label>

				<div class="custom-form-group__input-wrapper">
					<input type="password" class="custom-form-group__input" placeholder="Введите пароль" name="password" id="reg_password" autocomplete="new-password">

					<button type="button" class="custom-form-group__trigger">
						<i class="fa-solid fa-eye custom-form-group__trigger-first"></i>

						<i class="fa-solid fa-eye-slash custom-form-group__trigger-second"></i>
					</button>
				</div>
			</div>
		</div>
	</div>

	<?php do_action('woocommerce_register_form'); ?>

	<div class="registration-form__buttons">
		<?php wp_nonce_field('woocommerce-register', 'woocommerce-register-nonce'); ?>

		<div class="registration-form__button-submit">
			<button type="submit" class="custom-button" name="register" value="<?php esc_attr_e('Register', 'woocommerce'); ?>">
				<?php esc_html_e('Register', 'woocommerce'); ?>
			</button>
		</div>
	</div>

	<?php do_action('woocommerce_register_form_end'); ?>
</form>

<?php do_action('woocommerce_after_customer_login_form'); ?>