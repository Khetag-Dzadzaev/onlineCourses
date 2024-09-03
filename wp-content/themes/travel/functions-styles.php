<?php
add_action('wp_enqueue_scripts', 'site_scripts');

function site_scripts()
{
	$ver = '1.0.2';
	wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css', [], $ver);
	wp_enqueue_style('animate', get_template_directory_uri() . '/assets/css/animate.css', [], $ver);
	wp_enqueue_style('blog', get_template_directory_uri() . '/assets/css/blog.css', [], $ver);
	wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/bootstrap/bootstrap.min.css', [], $ver);
	wp_enqueue_style('superclasses', get_template_directory_uri() . '/assets/css/superclasses.css', [], $ver);
	wp_enqueue_style('custom', get_template_directory_uri() . '/assets/css/custom.css', [], $ver);
	wp_enqueue_style('responsive', get_template_directory_uri() . '/assets/css/responsive.css', [], $ver);
	wp_enqueue_style('owl', get_template_directory_uri() . '/assets/css/owl.carousel.min.css', [], $ver);
	wp_enqueue_style('owl-theme', get_template_directory_uri() . '/assets/css/owl.theme.default.min.css', [], $ver);
	wp_enqueue_style('magnific', get_template_directory_uri() . '/assets/css/magnific-popup.css', [], $ver);
	wp_enqueue_style('style', get_stylesheet_uri(), [], $ver);

	wp_deregister_script('wp-embed');
	wp_deregister_style('wp-block-library');
	wp_dequeue_style('global-styles');
	wp_dequeue_style('classic-theme-styles');

	// wp_enqueue_script( 'reacaptcha_js', 'https://www.google.com/recaptcha/api.js?render=6LfdrnwaAAAAABDn2Il7mXGDJuqnRIwyXsGV-3YS', '', '', true);
	// wp_enqueue_script('jquery', get_template_directory_uri() . '/assets/js/jquery.min.js', [], $ver, true);
	wp_enqueue_script('popper', get_template_directory_uri() . '/assets/js/popper.min.js', [], $ver, true);
	wp_enqueue_script('bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', [], $ver, true);
	wp_enqueue_script('owl', get_template_directory_uri() . '/assets/js/owl.carousel.js', [], $ver, true);
	wp_enqueue_script('contact', get_template_directory_uri() . '/assets/js/contact-form.js', [], $ver, true);
	wp_enqueue_script('video-popup', get_template_directory_uri() . '/assets/js/video-popup.js', [], $ver, true);
	wp_enqueue_script('video-section', get_template_directory_uri() . '/assets/js/video-section.js', [], $ver, true);
	wp_enqueue_script('validate', get_template_directory_uri() . '/assets/js/jquery.validate.js', [], $ver, true);
	wp_enqueue_script('wow', get_template_directory_uri() . '/assets/js/wow.js', [], $ver, true);
	wp_enqueue_script('counter', get_template_directory_uri() . '/assets/js/counter.js', [], $ver, true);
	wp_enqueue_script('custom', get_template_directory_uri() . '/assets/js/custom.js', [], $ver, true);
	wp_enqueue_script('search', get_template_directory_uri() . '/assets/js/search.js', [], $ver, true);
}
