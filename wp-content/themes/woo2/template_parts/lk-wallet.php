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

	<h1 class="article__main-title main-title"><?php echo esc_attr(pll__('Balance')); ?>: <?php echo $total; ?></h1>

<?php
} else {
	wp_safe_redirect(get_permalink(get_option('woocommerce_myaccount_page_id')));
	exit;
}
