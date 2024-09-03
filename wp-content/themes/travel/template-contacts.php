<?php get_header(); /* Template Name: Контакты*/ ?>


<section class="float-left w-100 banner-con sub-banner-con position-relative main-box">
	<img alt="vector" class="vector1  img-fluid position-absolute" src="<?php echo get_template_directory_uri(); ?>/assets/images/vector1.png">
	<img alt="vector" class="vector2 img-fluid position-absolute" src="<?php echo get_template_directory_uri(); ?>/assets/images/vector2.png">
	<div class="container">
		<div class="row">
			<div class="col-lg-7">
				<div class="sub-banner-inner-con padding-bottom">
					<h1><?php the_title(); ?></h1>
					<?php echo get_template_part("template_parts/breadcrumb-block"); ?>
				</div>
			</div>
		</div>
	</div>

</section>
</div>

<section class="float-left w-100 about-travel-con talk-to-us-con position-relative main-box padding-top padding-bottom">
	<img alt="vector" class="vector5 wow bounceInUp img-fluid position-absolute" data-wow-duration="2s" src="<?php echo get_template_directory_uri(); ?>/assets/images/vector5.png">
	<div class="container wow bounceInUp" data-wow-duration="2s">
		<div class="row">
			<div class="col-lg-6">
				<div class="about-travel-img-con position-relative">
					<figure class="about-img">
						<img class="img-fluid" alt="image" src="<?php echo get_template_directory_uri(); ?>/assets/images/talk-to-us-img1.jpg">
					</figure>
					<figure class="about-img2">
						<img class="img-fluid" alt="image" src="<?php echo get_template_directory_uri(); ?>/assets/images/talk-to-us-img2.jpg">
					</figure>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="about-travel-content">
					<h2><?php echo esc_attr(pll__('Get in Touch With Us')); ?></h2>
					<?php the_content(); ?>
					<div class="contact-info">
						<h4 class="text-uppercase sub-heading"><?php echo esc_attr(pll__('Contact Info')); ?></h4>
						<ul class="list-unstyled p-0 m-0 contact-info-inner-wrapper">
							<?php if (get_field('contacts_email', 'option')) { ?>
								<li><a href="mailto:support@traveltek.com"><i class="fa-solid fa-envelope"></i> <?php echo get_field('contacts_email', 'option'); ?></a></li>
							<?php } ?>
							<?php if (get_field('contacts_phone', 'option')) { ?>
								<li><a href="tel:+1(0800)123456"><i class="fa-solid fa-square-phone"></i> <?php echo get_field('contacts_phone', 'option'); ?></a></li>
							<?php } ?>
							<li>
								<i class="fa-solid fa-location-dot"></i>

								<?
								$lang = get_locale();
								?>

								<?php if ($lang == 'ru_RU') {
									echo get_field('contacts_address', 'option');
								} else if ($lang == 'en_US') {
									echo get_field('contacts_address_en', 'option');
								} else {
									echo get_field('contacts_address_kz', 'option');
								} ?>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="float-left w-100 talk-width-our-team-con position-relative main-box padding-top padding-bottom">
	<img alt="vector" class="vector11 img-fluid position-absolute wow bounceInUp" data-wow-duration="2s" src="<?php echo get_template_directory_uri(); ?>/assets/images/vector11.png">
	<img alt="vector" class="vector9 wow bounceInUp img-fluid position-absolute" data-wow-duration="2s" src="<?php echo get_template_directory_uri(); ?>/assets/images/vector9.png">
	<div class="container wow bounceInUp" data-wow-duration="2s">
		<div class="heading-title text-center">
			<h4 class="text-uppercase"><?php echo esc_attr(pll__('Talk with our team')); ?></h4>
			<h2><?php echo esc_attr(pll__('Any Question? Feel Free to Contact')); ?></h2>
		</div>
		<div class="row">
			<div class="col-12">
				<div class="register-box">
					<form id="contactpage" method="POST">
						<div class="row">
							<div class="col-lg-6 col-md-6 col-sm-12 col-12">
								<div class="row">
									<div class="col-12">
										<div class="form-group">
											<label><?php echo esc_attr(pll__('Your Name')); ?>:</label>
											<input type="text" class="form_style" name="fname" id="fname">
										</div>
									</div>
									<div class="col-12">
										<div class="form-group">
											<label><?php echo esc_attr(pll__('Your Email')); ?>:</label>
											<input type="email" class="form_style" name="email" id="email">
										</div>
									</div>
									<div class="col-12">
										<div class="form-group fon-con">
											<label><?php echo esc_attr(pll__('Your Phone')); ?>:</label>
											<input type="tel" class="mb-md-0 form_style" name="phone" id="phone">
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-12 col-12">
								<div class="row">
									<div class="col-12">
										<div class="form-group mb-0">
											<label><?php echo esc_attr(pll__('Your Message')); ?>:</label>
											<textarea class="form_style" rows="5" name="msg"></textarea>
										</div>
									</div>
									<div class="col-12">
										<div class="manage-button">
											<button type="submit" id="submit" class="register_now text-white text-decoration-none w-100"><?php echo esc_attr(pll__('Send Message')); ?></button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>


<?php get_footer(); ?>