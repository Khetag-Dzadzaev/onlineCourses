<?php get_header("all");
/* Template Name: Контакты*/
?>

<section class="page-header page-header--bg-two" data-jarallax data-speed="0.3" data-imgPosition="50% -100%">
	<div class="page-header__bg jarallax-img" style="	background-image: url(<?php if (!empty(get_field("zadnij_fon", "option"))) {
																																							echo get_field("zadnij_fon", "option")["url"];
																																						} else {
																																							echo (get_template_directory_uri() . "/assets/images/backgrounds/page-header-bg-1-1.jpg)");
																																						} ?>
																																						"></div><!-- /.page-header-bg -->
	<div class="page-header__overlay"></div><!-- /.page-header-overlay -->
	<div class="container text-center">
		<h2 class="page-header__title"><?php the_title(); ?></h2><!-- /.page-title -->
		<ul class="page-header__breadcrumb list-unstyled">
			<?php bcn_display(); ?>
		</ul><!-- /.page-breadcrumb list-unstyled -->
	</div><!-- /.container -->
</section><!-- /.page-header -->
<!-- Contact Start -->
<section class="contact-one">
	<div class="container wow fadeInUp" data-wow-delay="300ms">
		<div class="section-title  text-center">
			<h5 class="section-title__tagline">
				Contact with Us
				<svg class="arrow-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 55 13">
					<g clip-path="url(#clip0_324_36194)">
						<path
							d="M10.5406 6.49995L0.700562 12.1799V8.56995L4.29056 6.49995L0.700562 4.42995V0.819946L10.5406 6.49995Z" />
						<path
							d="M25.1706 6.49995L15.3306 12.1799V8.56995L18.9206 6.49995L15.3306 4.42995V0.819946L25.1706 6.49995Z" />
						<path
							d="M39.7906 6.49995L29.9506 12.1799V8.56995L33.5406 6.49995L29.9506 4.42995V0.819946L39.7906 6.49995Z" />
						<path
							d="M54.4206 6.49995L44.5806 12.1799V8.56995L48.1706 6.49995L44.5806 4.42995V0.819946L54.4206 6.49995Z" />
					</g>
				</svg>
			</h5>
			<h2 class="section-title__title">Feel Free to Write us Anytime</h2>
		</div><!-- section-title -->
		<div class="contact-one__form-box  text-center">
			<form action="assets/inc/sendemail.php" class="contact-one__form contact-form-validated"
				novalidate="novalidate">
				<div class="row">
					<div class="col-md-6">
						<div class="contact-one__input-box">
							<input type="text" placeholder="Your Name" name="name">
						</div>
					</div>
					<div class="col-md-6">
						<div class="contact-one__input-box">
							<input type="email" placeholder="Email Address" name="email">
						</div>
					</div>
					<div class="col-md-6">
						<div class="contact-one__input-box">
							<input type="text" placeholder="Phone" name="phone">
						</div>
					</div>
					<div class="col-md-6">
						<div class="contact-one__input-box">
							<input type="text" placeholder="Subject" name="subject">
						</div>
					</div>
					<div class="col-md-12">
						<div class="contact-one__input-box text-message-box">
							<textarea name="message" placeholder="Write a Message"></textarea>
						</div>
						<div class="contact-one__btn-box">
							<button type="submit" class="eduact-btn eduact-btn-second"><span class="eduact-btn__curve"></span>Send
								a Message<i class="icon-arrow"></i></button>
						</div>
					</div>
				</div>
			</form>
			<div class="result"></div>
		</div>
	</div>
</section>
<!-- Contact End -->
<!-- Info Start -->
<section class="contact-info">
	<div class="container">
		<ul class="contact-info__wrapper">
			<?php if (!empty(get_field('contacts_phone', 'option'))) { ?>
				<li>
					<div class="contact-info__icon"><span class="icon-Call"></span></div>
					<p class="contact-info__title">Have any question?</p>
					<h4 class="contact-info__text">Free <a href="tel:<?php echo get_field('contacts_phone', 'option'); ?>"><?php echo get_field('contacts_phone', 'option'); ?></a></h4>
				</li>
			<?php } ?>
			<?php if (!empty(get_field('contacts_email', 'option'))) { ?>
				<li class="active">
					<div class="contact-info__icon"><span class="icon-Email"></span></div>
					<p class="contact-info__title">Send Email</p>
					<h4 class="contact-info__text"><a href="mailto:<?php echo get_field('contacts_email', 'option'); ?>"><?php echo get_field('contacts_email', 'option'); ?></a></h4>
				</li>
			<?php } ?>
			<?php if (!empty(get_field('contacts_address', 'option'))) { ?>
				<li>
					<div class="contact-info__icon"><span class="icon-Location"></span></div>
					<p class="contact-info__title">Visit Anytime</p>
					<h4 class="contact-info__text"><?php echo get_field('contacts_address', 'option') ?></h4>
				</li>
			<?php } ?>
		</ul>
	</div>
</section>
<!-- Info End -->
<?php get_footer(); ?>