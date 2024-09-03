<?php

/**
 * My Account Dashboard
 *
 * Shows the first intro screen on the account dashboard.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/dashboard.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 4.4.0
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

$allowed_html = array(
	'a' => array(
		'href' => array(),
	),
);
?>

<h3><?php echo esc_attr(pll__('Welcome to your personal account of the Extremetour service')); ?></h3>
<p class="text-size-16"><?php echo esc_attr(pll__('In your personal account, you have access to all the features of our site: placement and promotion of tours, withdrawal of balance, editing personal data, viewing order history.')); ?></p>

<h5><?php echo esc_attr(pll__('Helpful information')); ?></h5>
<div><a href="<?php echo get_permalink(pll_get_post(640)); ?>"><?php echo get_the_title(pll_get_post(640)); ?></a></div>
<div><a href="<?php echo get_permalink(pll_get_post(649)); ?>"><?php echo get_the_title(pll_get_post(649)); ?></a></div>
<div><a href="<?php echo get_permalink(pll_get_post(75)); ?>"><?php echo get_the_title(pll_get_post(75)); ?></a></div>
<div><a href="<?php echo get_permalink(pll_get_post(79)); ?>"><?php echo get_the_title(pll_get_post(79)); ?></a></div>


<?php
/**
 * My Account dashboard.
 *
 * @since 2.6.0
 */
do_action('woocommerce_account_dashboard');

/**
 * Deprecated woocommerce_before_my_account action.
 *
 * @deprecated 2.6.0
 */
do_action('woocommerce_before_my_account');

/**
 * Deprecated woocommerce_after_my_account action.
 *
 * @deprecated 2.6.0
 */
do_action('woocommerce_after_my_account');

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
