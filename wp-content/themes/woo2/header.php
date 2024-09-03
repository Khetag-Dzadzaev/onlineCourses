<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>EShopper - Bootstrap Shop Template</title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport">
	<meta content="Free HTML Templates" name="keywords">
	<meta content="Free HTML Templates" name="description">

	<!-- Favicon -->
	<link href="<?php echo get_template_directory_uri(); ?>/img/favicon.ico" rel="icon">

	<!-- Google Web Fonts -->
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">


	<?php wp_head(); ?>
</head>

<body>
	<!-- Topbar Start -->
	<div class="container-fluid">

		<div class="row align-items-center py-3 px-xl-5">
			<div class="col-lg-3 d-none d-lg-block">
				<?php if (is_front_page()) { ?>
					<span class="text-decoration-none">
						<h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">E</span>Shopper</h1>
					</span>
				<?php } else { ?>
					<a href="<?php echo get_home_url(); ?>" class="text-decoration-none">
						<h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">E</span>Shopper</h1>
					</a>
				<?php } ?>
			</div>
			<div class="col-sm-6 col-12 text-left mb-3 mb-sm-0">

				<form action="<?php echo esc_url(home_url('/')); ?>">
					<div class="input-group">
						<input type="text" class="form-control" placeholder="<?php echo esc_attr(pll__('Site search')); ?>" value="<?php the_search_query(); ?>" name="s" id="ss">
						<button class="input-group-append" type="submit">
							<span class="input-group-text bg-transparent text-primary">
								<i class="fa fa-search"></i>
							</span>
						</button>
					</div>
				</form>
			</div>
			<div class="col-lg-3 col-sm-6 col-12 text-right d-flex justify-content-end">
				<?php echo do_shortcode('[currencykztusd]'); ?>
				<ul class="lang ml-3 pl-3">
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
				<a href="<?php echo get_permalink(pll_get_post(11)); ?>" class="btn border ml-3" id="cart-sidebar">
					<i class="fas fa-shopping-cart text-primary"></i>
					<span class="badge"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
				</a>
			</div>
		</div>
	</div>
	<!-- Topbar End -->


	<!-- Navbar Start -->
	<div class="container-fluid">
		<div class="row border-top px-xl-5">
			<div class="col-lg-3 d-none d-lg-block">
				<a class="btn shadow-none d-flex align-items-center justify-content-between bg-primary text-white w-100" data-toggle="collapse" href="#navbar-vertical" style="height: 65px; margin-top: -1px; padding: 0 30px;">
					<h6 class="m-0"><?php echo esc_attr(pll__('Categories')); ?></h6>
					<i class="fa fa-angle-down text-dark"></i>
				</a>
				<nav class="<?php if (is_front_page()) echo 'show'; ?> collapse position-absolute navbar navbar-vertical navbar-light align-items-start p-0 border border-top-0 border-bottom-0 bg-light" style="width: calc(100% - 30px); z-index: 1;" id="navbar-vertical">

					<ul class="navbar-nav w-100 overflow-hidden" style="height: 410px">
						<?php
						wp_nav_menu([
							'menu' => 'menu_main_header',
							'theme_location' => 'categories',
							'items_wrap' => '%3$s',
							'container' => false,
							'walker' => new categories_menu_Walker
						]);
						?>
					</ul>
				</nav>
			</div>
			<div class="col-lg-9">
				<nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
					<?php if (is_front_page()) { ?>
						<span class="text-decoration-none d-block d-lg-none">
							<h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">E</span>Shopper</h1>
						</span>
					<?php } else { ?>
						<a href="<?php echo get_home_url(); ?>" class="text-decoration-none d-block d-lg-none">
							<h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">E</span>Shopper</h1>
						</a>
					<?php } ?>
					<button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
						<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
						<ul class="navbar-nav mr-auto py-0">
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
						<?php if (!is_user_logged_in()) { ?>
							<div class="navbar-nav ml-auto py-0">
								<a href="<?php echo get_permalink(pll_get_post(13)); ?>" class="nav-item nav-link"><?php echo esc_attr(pll__('Login')); ?></a>
								<a href="<?php echo get_permalink(pll_get_post(13)); ?>" class="nav-item nav-link"><?php echo esc_attr(pll__('Register')); ?></a>
							</div>
						<?php } ?>
					</div>
				</nav>
				<?php if (is_front_page()) { ?>
					<?php
					if (have_rows('main_slider')) { ?>
						<div id="header-carousel" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
								<?php
								$i = 1;
								while (have_rows('main_slider')) {
									the_row();
									$main_slider_img = get_sub_field('main_slider_img');
									$main_slider_text = get_sub_field('main_slider_text');
									$main_slider_link = get_sub_field('main_slider_link');
								?>
									<div class="carousel-item <?php if ($i === 1) echo 'active'; ?> " style="height: 410px;">
										<img class="img-fluid" src="<?php echo $main_slider_img['url'] ?>" alt="Image">
										<div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
											<div class="p-3" style="max-width: 700px;">
												<h3 class="display-4 text-white font-weight-semi-bold mb-4"><?php echo $main_slider_text; ?></h3>
												<?php if (!empty($main_slider_link)) { ?>
													<a href="<?php echo $main_slider_link; ?>" class="btn btn-light py-2 px-3"><?php echo esc_attr(pll__('Read more')); ?></a>
												<?php } ?>
											</div>
										</div>
									</div>
									<?php $i++; ?>
								<?php } ?>
							</div>
							<?php if (count(get_field('main_slider')) >= 2) { ?>
								<a class="carousel-control-prev" href="#header-carousel" data-slide="prev">
									<div class="btn btn-dark" style="width: 45px; height: 45px;">
										<span class="carousel-control-prev-icon mb-n2"></span>
									</div>
								</a>
								<a class="carousel-control-next" href="#header-carousel" data-slide="next">
									<div class="btn btn-dark" style="width: 45px; height: 45px;">
										<span class="carousel-control-next-icon mb-n2"></span>
									</div>
								</a>
							<?php } ?>
						</div>
					<?php } ?>
				<?php } ?>
			</div>
		</div>
	</div>
	<!-- Navbar End -->