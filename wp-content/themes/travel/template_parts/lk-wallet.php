<?php
if (is_user_logged_in() && current_user_can('customer') || is_user_logged_in() && current_user_can('administrator')) {
	$user = wp_get_current_user();
	$user_wallet = get_user_meta($user->ID, 'account_wallet', true) ? get_user_meta($user->ID, 'account_wallet', true) : 0;

	$total = number_format($user_wallet, 0, '', ' ') . ' ₸';
	if ($_COOKIE['currency_kzt_usd_cookie'] === 'USD') {
		if (function_exists('convert_kzt_to_usd')) {
			$total = convert_kzt_to_usd(intval($user_wallet)) . ' $';
		} else {
			$total = number_format(round(intval($user_wallet), 2) / 450, 2, '.', ' ') . ' $';
		}
	}

?>

	<?php $lang = pll_current_language(); ?>

	<h3 class="article__main-title main-title mb-5 mt-5"><?php echo esc_attr(pll__('Balance')); ?>: <?php echo $total; ?></h3>
	<h2 class="product-title mb-5"><?php echo esc_attr(pll__('Request a withdrawal')); ?></h2>
	<form class="add-new-post-form " action="<?php echo get_template_directory_uri(); ?>/php/wallet.php" method="POST" onsubmit="return formSend(this);">

		<div class="add-new-post-form__row">
			<div class="add-new-post-form__col">
				<label for="post_title" class="add-new-post-form__label"><?php echo esc_attr(pll__('Your Name')); ?></label>
				<input class="add-new-post-form__input" name="wallet_name" id="post_title" type="text" />
			</div>
		</div>
		<div class="add-new-post-form__row">
			<div class="add-new-post-form__col">
				<label for="post_title" class="add-new-post-form__label"><?php echo esc_attr(pll__('Your Phone')); ?></label>
				<input class="add-new-post-form__input" name="wallet_phone" id="post_title" type="text" />
			</div>
		</div>
		<div class="add-new-post-form__row">
			<div class="add-new-post-form__col">
				<label for="post_title" class="add-new-post-form__label"><?php echo esc_attr(pll__('Your Email')); ?></label>
				<input class="add-new-post-form__input" name="wallet_email" id="post_title" type="text" />
			</div>
		</div>
		<div class="add-new-post-form__row">
			<div class="add-new-post-form__col">
				<label for="post_title" class="add-new-post-form__label"><?php echo esc_attr(pll__('Sum')); ?></label>
				<input class="add-new-post-form__input" name="wallet_sum" id="post_title" type="number" />
			</div>
		</div>
		<input type="hidden" name="locale" value="<?php echo $lang == 'ru' || $lang == 'kk' ? 'ru' : 'en'; ?>">

		<?php wp_nonce_field('wallet_nonce_action', 'wallet_nonce_field'); ?>
		<button class="add-new-post-form__btn btn btn-primary btn-style-2 btn-rounded"><?php echo esc_attr(pll__('Send')); ?></button>
		<div class="add-new-post-form__row">
			<div class="add-new-post-form__col">
				<div class="response"></div>
			</div>
		</div>

	</form>

<?php
} else {
	wp_safe_redirect(get_permalink(get_option('woocommerce_myaccount_page_id')));
	exit;
}
