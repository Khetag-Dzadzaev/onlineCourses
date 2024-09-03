<?php
add_action('wp_enqueue_scripts', 'site_scripts');

function site_scripts()
{
	$ver = '1.0.2';


	wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/vendors/bootstrap/css/bootstrap.min.css', [], $ver);
	wp_enqueue_style('bootstrap-select', get_template_directory_uri() . '/assets/vendors/bootstrap-select/bootstrap-select.min.css', [], $ver);
	wp_enqueue_style('jquery-ui', get_template_directory_uri() . '/assets/vendors/jquery-ui/jquery-ui.css', [], $ver);
	wp_enqueue_style('animate', get_template_directory_uri() . '/assets/vendors/animate/animate.min.css', [], $ver);
	wp_enqueue_style('fontawesome', get_template_directory_uri() . '/assets/vendors/fontawesome/css/all.min.css', [], $ver);
	wp_enqueue_style('eduact-icons', get_template_directory_uri() . '/assets/vendors/eduact-icons/style.css', [], $ver);
	wp_enqueue_style('jarallax', get_template_directory_uri() . '/assets/vendors/jarallax/jarallax.css', [], $ver);
	wp_enqueue_style('jquery-magnific-popup', get_template_directory_uri() . '/assets/vendors/jquery-magnific-popup/jquery.magnific-popup.css', [], $ver);
	wp_enqueue_style('nouislider', get_template_directory_uri() . '/assets/vendors/nouislider/nouislider.min.css', [], $ver);
	wp_enqueue_style('nouislider-pips', get_template_directory_uri() . '/assets/vendors/nouislider/nouislider.pips.css', [], $ver);
	wp_enqueue_style('odometer', get_template_directory_uri() . '/assets/vendors/odometer/odometer.min.css', [], $ver);
	wp_enqueue_style('tiny-slider', get_template_directory_uri() . '/assets/vendors/tiny-slider/tiny-slider.min.css', [], $ver);
	wp_enqueue_style('owl-carousel', get_template_directory_uri() . '/assets/vendors/owl-carousel/assets/owl.carousel.min.css', [], $ver);
	wp_enqueue_style('owl-carousel-theme', get_template_directory_uri() . '/assets/vendors/owl-carousel/assets/owl.theme.default.min.css', [], $ver);
	wp_enqueue_style('eduact', get_template_directory_uri() . '/assets/css/eduact.css', [], $ver);
	wp_enqueue_style('style', get_stylesheet_uri(), [], $ver);

	wp_deregister_script('wp-embed');
	wp_deregister_style('wp-block-library');
	wp_dequeue_style('global-styles');
	wp_dequeue_style('classic-theme-styles');

	// wp_enqueue_script( 'reacaptcha_js', 'https://www.google.com/recaptcha/api.js?render=6LfdrnwaAAAAABDn2Il7mXGDJuqnRIwyXsGV-3YS', '', '', true);
	// wp_enqueue_script('jquery', get_template_directory_uri() . '/assets/js/jquery.min.js', [], $ver, true);
	wp_enqueue_script('jquery', get_template_directory_uri() . '/assets/vendors/jquery/jquery-3.5.1.min.js', [], $ver, true);
	wp_enqueue_script('bootstrap', get_template_directory_uri() . '/assets/vendors/bootstrap/js/bootstrap.bundle.min.js', [], $ver, true);
	wp_enqueue_script('bootstrap-select', get_template_directory_uri() . '/assets/vendors/bootstrap-select/bootstrap-select.min.js', [], $ver, true);
	wp_enqueue_script('jquery-ui', get_template_directory_uri() . '/aassets/vendors/jquery-ui/jquery-ui.js', [], $ver, true);
	wp_enqueue_script('jarallax', get_template_directory_uri() . '/assets/vendors/jarallax/jarallax.min.js', [], $ver, true);
	wp_enqueue_script('jquery-ajaxchimp', get_template_directory_uri() . '/assets/vendors/jquery-ajaxchimp/jquery.ajaxchimp.min.js', [], $ver, true);
	wp_enqueue_script('jquery-appear', get_template_directory_uri() . '/assets/vendors/jquery-appear/jquery.appear.min.js', [], $ver, true);
	wp_enqueue_script('jquery-circle-progress', get_template_directory_uri() . '/assets/vendors/jquery-circle-progress/jquery.circle-progress.min.js', [], $ver, true);
	wp_enqueue_script('jquery-magnific-popup', get_template_directory_uri() . '/assets/vendors/jquery-magnific-popup/jquery.magnific-popup.min.js', [], $ver, true);
	wp_enqueue_script('jquery-validate', get_template_directory_uri() . '/assets/vendors/jquery-validate/jquery.validate.min.js', [], $ver, true);
	wp_enqueue_script('nouislider', get_template_directory_uri() . '/assets/vendors/nouislider/nouislider.min.js', [], $ver, true);
	wp_enqueue_script('odometer', get_template_directory_uri() . '/assets/vendors/odometer/odometer.min.js', [], $ver, true);
	wp_enqueue_script('tiny-slider', get_template_directory_uri() . '/assets/vendors/tiny-slider/tiny-slider.min.js', [], $ver, true);
	wp_enqueue_script('owl-carousel', get_template_directory_uri() . '/assets/vendors/owl-carousel/owl.carousel.min.js', [], $ver, true);
	wp_enqueue_script('wnumb', get_template_directory_uri() . '/assets/vendors/wnumb/wNumb.min.js', [], $ver, true);
	wp_enqueue_script('jquery-circleType', get_template_directory_uri() . '/assets/vendors/jquery-circleType/jquery.circleType.js', [], $ver, true);
	wp_enqueue_script('jquery-lettering', get_template_directory_uri() . '/assets/vendors/jquery-lettering/jquery.lettering.min.js', [], $ver, true);
	wp_enqueue_script('tilt', get_template_directory_uri() . '/assets/vendors/tilt/tilt.jquery.js', [], $ver, true);
	wp_enqueue_script('wow', get_template_directory_uri() . '/assets/vendors/wow/wow.js', [], $ver, true);
	wp_enqueue_script('isotope', get_template_directory_uri() . '/assets/vendors/isotope/isotope.js', [], $ver, true);
	wp_enqueue_script('countdown', get_template_directory_uri() . '/assets/vendors/countdown/countdown.min.js', [], $ver, true);
	wp_enqueue_script('eduact', get_template_directory_uri() . '/assets/js/eduact.js', [], $ver, true);
}
