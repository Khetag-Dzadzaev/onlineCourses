<!DOCTYPE html>
<html lang="zxx">

<head>
	<title>EXTREMETOUR </title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">

	<link rel="apple-touch-icon" sizes="57x57" href="<?php echo get_template_directory_uri(); ?>/assets/images/favicon/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="<?php echo get_template_directory_uri(); ?>/assets/images/favicon/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_template_directory_uri(); ?>/assets/images/favicon/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="<?php echo get_template_directory_uri(); ?>/assets/images/favicon/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_template_directory_uri(); ?>/assets/images/favicon/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="<?php echo get_template_directory_uri(); ?>/assets/images/favicon/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="<?php echo get_template_directory_uri(); ?>/assets/images/favicon/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="<?php echo get_template_directory_uri(); ?>/assets/images/favicon/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri(); ?>/assets/images/favicon/apple-icon-180x180.png">
	<link rel="icon" type="image/png" sizes="192x192" href="<?php echo get_template_directory_uri(); ?>/assets/images/favicon/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_template_directory_uri(); ?>/assets/images/favicon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="<?php echo get_template_directory_uri(); ?>/assets/images/favicon/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_template_directory_uri(); ?>/assets/images/favicon/favicon-16x16.png">
	<link rel="manifest" href="<?php echo get_template_directory_uri(); ?>/assets/images/favicon/manifest.json">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/assets/images/favicon/ms-icon-144x144.png">
	<meta name="theme-color" content="#ffffff">

	<?php wp_head(); ?>
</head>

<body>

	<div class="bg-outer-wrapper <?php if (!is_front_page()) echo 'sub-banner-outer-wrapper'; ?> float-left w-100">
		<div class="w-100 float-left top-bar-con main-box">
			<div class="container">
				<div class="top-bar-inner-con d-flex align-items-center justify-content-between">

					<ul class="lang">
						<?php
						wp_nav_menu([
							'menu' => 'lang_switcher',
							'theme_location' => 'lang_switcher',
							'items_wrap' => '%3$s',
							'container' => false,
							'walker' => new langswitcher_Walker
						]);
						?>
					</ul>
					<div class="menu-right">
						<a class="d-flex align-items-center" <?= is_user_logged_in() === false ? 'data-auth-modal-trigger' : ''; ?> href="<?php echo get_permalink(pll_get_post(13)); ?>">
							<i class="fa fa-user mr-1"></i>

							<?= is_user_logged_in() ? esc_attr(pll__('Leave personal account')) : esc_attr(pll__('Enter personal account')); ?>
						</a>

						<?php echo do_shortcode('[currencykztusd]'); ?>

						<a href="<?php echo get_permalink(pll_get_post(11)); ?>" class="btn" id="cart-sidebar">
							<i class="fas fa-shopping-cart"></i>
							<span class="badge"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
						</a>
					</div>

				</div>
			</div>
		</div>
		<div class="clearfix"></div>
		<header class="w-100 flaot-left header-con main-box position-relative">
			<div class="container">
				<nav class="navbar navbar-expand-lg navbar-light">
					<?php if (is_front_page()) { ?>
						<span class="navbar-brand">
							<figure class="mb-0">
								<img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo-icon1.png" alt="logo-icon">
							</figure>
						</span>
					<?php } else { ?>
						<a class="navbar-brand" href="<?php echo get_home_url(); ?>">
							<figure class="mb-0">
								<img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo-icon1.png" alt="logo-icon">
							</figure>
						</a>
					<?php } ?>
					<button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
						<span class="navbar-toggler-icon"></span>
						<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<ul class="navbar-nav ml-auto">
							<?php
							wp_nav_menu([
								'menu' => 'menu_main_header',
								'theme_location' => 'menu_main_header',
								'items_wrap' => '%3$s',
								'container' => false,
								'walker' => new main_nav_menu_Walker
							]);
							?>
						</ul>
					</div>
				</nav>
			</div>
		</header>