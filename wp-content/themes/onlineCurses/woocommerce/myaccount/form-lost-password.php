<?php

/**
 * Lost password form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-lost-password.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 7.0.1
 */

defined('ABSPATH') || exit;

do_action('woocommerce_before_lost_password_form');
?>

<form method="post" class="registration-form">
	<p>
		<?php echo apply_filters('woocommerce_lost_password_message', esc_html__('Lost your password? Please enter your username or email address. You will receive a link to create a new password via email.', 'woocommerce')); ?>
	</p>

	<div class="registration-form__row row">
		<div class="col-12 col-md-8">
			<div class="custom-form-group">
				<label for="user_login" class="custom-form-group__label">
					<?php esc_html_e('Username or email', 'woocommerce'); ?>&nbsp;<span style="color: red;">*</span>
				</label>

				<input type="text" name="user_login" id="user_login" autocomplete="username" class="custom-form-group__input" />
			</div>
		</div>
	</div>

	<?php do_action('woocommerce_lostpassword_form'); ?>

	<div class="registration-form__buttons">
		<?php wp_nonce_field('woocommerce-register', 'woocommerce-register-nonce'); ?>

		<div class="registration-form__button-submit">
			<input type="hidden" name="wc_reset_password" value="true" />

			<button type="submit" class="custom-button" value="<?php esc_attr_e('Reset password', 'woocommerce'); ?>">
				<?php esc_html_e('Reset password', 'woocommerce'); ?>
			</button>
		</div>
	</div>

	<?php wp_nonce_field('lost_password', 'woocommerce-lost-password-nonce'); ?>
</form>

<?php
do_action('woocommerce_after_lost_password_form');
