<?php
add_action('wp_enqueue_scripts', 'site_scripts');

function site_scripts() {
	$ver = '1.0.1';
	wp_enqueue_style('awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css', null, null);
	wp_enqueue_style('carousel', get_template_directory_uri() . '/lib/owlcarousel/assets/owl.carousel.min.css', [], $ver);
	wp_enqueue_style('main', get_template_directory_uri() . '/css/style.css', [], $ver);
	wp_enqueue_style('style', get_stylesheet_uri(), [], $ver);

	wp_deregister_script('wp-embed');
	wp_deregister_style('wp-block-library');
	wp_dequeue_style('global-styles');
	wp_dequeue_style('classic-theme-styles');

	// wp_enqueue_script( 'reacaptcha_js', 'https://www.google.com/recaptcha/api.js?render=6LfdrnwaAAAAABDn2Il7mXGDJuqnRIwyXsGV-3YS', '', '', true);
	wp_enqueue_script('jQuery', 'https://code.jquery.com/jquery-3.4.1.min.js', null, null, true);
	wp_enqueue_script('bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js', null, null, true);
	wp_enqueue_script('easing', get_template_directory_uri() . '/lib/easing/easing.min.js', [], $ver, true);
	wp_enqueue_script('carousel', get_template_directory_uri() . '/lib/owlcarousel/owl.carousel.min.js', [], $ver, true);
	wp_enqueue_script('main', get_template_directory_uri() . '/js/main.js', [], $ver, true);
}
