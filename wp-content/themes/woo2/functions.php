<?php

require get_template_directory() . '/functions-default.php';
require get_template_directory() . '/functions-styles.php';
require get_template_directory() . '/functions-menu.php';
require get_template_directory() . '/functions-polylang.php';
require get_template_directory() . '/functions-woo.php';



// add_filter('gettext', 'translate_text');
// add_filter('gettext_woocommerce', 'translate_text');
// add_filter('ngettext', 'translate_text');
// add_filter('gettext_with_context', 'translate_text');

// function translate_text($translated) {
// 	$translated = str_ireplace(['Products', 'Товары'], ['Tours', 'Туры'], $translated);
// 	$translated = str_ireplace(['Product', 'Товар'], ['Tour', 'Тур'], $translated);
// 	return $translated;
// }

add_filter('woocommerce_register_post_type_product', 'filter_woocommerce_register_post_type_product');

function filter_woocommerce_register_post_type_product($args) {
	$args['labels'] = [
		'name' => esc_attr(pll__('Tours'))
	];
	return $args;
}

add_filter('bcn_breadcrumb_template', 'filter_bcn_breadcrumb_template', 10, 3);
function filter_bcn_breadcrumb_template($template, $this_type, $this_id) {
	if ($this_type[0] == "home" && pll_current_language() == "en") {
		$template = "<li class=\"breadcrumb-item\"><a href='/en/main/'>Main</a></li>";
	}
	if ($this_type[0] == "home" && pll_current_language() == "kk") {
		$template = "<li class=\"breadcrumb-item\"><a href='/kk/basty-bet/'>үй</a></li>";
	}
	return $template;
};
