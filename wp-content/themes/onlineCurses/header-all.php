<!DOCTYPE html>
<html lang="ru">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta name="theme-color" content="#ffffff">
	<!-- fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link
		href="https://fonts.googleapis.com/css2?family=Urbanist:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Water+Brush&display=swap"
		rel="stylesheet">
	<?php wp_head(); ?>
</head>

<body class="custom-cursor">

	<div class="custom-cursor__cursor"></div>
	<div class="custom-cursor__cursor-two"></div>

	<div class="preloader">
		<div class="preloader__image" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/loader.png);"></div>
	</div>
	<!-- /.preloader -->
	<div class="page-wrapper">
		<header class="main-header">
			<nav class="main-menu main-menu_bg">
				<div class="container">
					<div class="main-menu__logo">
						<a href="/">
							<img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo-light.png" width="183" height="48" alt="Eduact">
						</a>
					</div><!-- /.main-menu__logo -->
					<div class="main-menu__nav">
						<ul class="main-menu__list">
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
					</div><!-- /.main-menu__nav -->
					<div class="main-menu__right">
						<a href="#" class="main-menu__toggler mobile-nav__toggler">
							<i class="fa fa-bars"></i>
						</a><!-- /.mobile menu btn -->
						<a href="<?php echo get_permalink(pll_get_post(11)); ?>" class="main-menu__search ">
							<i class="icon-portfolio"></i>
						</a><!-- /.search btn -->
						<a <?= is_user_logged_in() === false ? 'data-auth-modal-trigger' : ''; ?> href="<?php echo get_permalink(pll_get_post(13)); ?>" class=" main-menu__login">
							<?= is_user_logged_in() ? esc_attr(pll__('Leave personal account')) : esc_attr(pll__('Enter personal account')); ?>
							<i class="icon-account-1"></i>
						</a><!-- /.login btn -->
					</div><!-- /.main-menu__right -->
				</div><!-- /.container -->
			</nav>
			<!-- /.main-menu -->
		</header><!-- /.main-header -->