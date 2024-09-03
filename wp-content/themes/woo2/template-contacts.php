<?php get_header(); /* Template Name: Contacts*/ ?>
<?php
$lang = pll_current_language();
?>
<div class="container-fluid bg-secondary mb-5">
	<div class="inner-first d-flex flex-column align-items-center justify-content-center">
		<h1 class="font-weight-semi-bold text-uppercase mb-3"><?php the_title(); ?></h1>
		<?php echo get_template_part("template_parts/breadcrumb-block"); ?>
	</div>
</div>
<div class="container-fluid pt-5">
	<div class="text-center mb-4">
		<h2 class="section-title px-5"><span class="px-2"><?php echo esc_attr(pll__('Contact For Any Queries')); ?></span></h2>
	</div>
	<div class="row px-xl-5">
		<div class="col-lg-7 mb-5">
			<div class="contact-form">
				<div id="success"></div>
				<form name="sentMessage" id="contactForm" novalidate="novalidate">
					<div class="control-group">
						<input type="text" class="form-control" id="name" placeholder="<?php echo esc_attr(pll__('Your Name')); ?>" required="required" data-validation-required-message="Please enter your name" />
						<p class="help-block text-danger"></p>
					</div>
					<div class="control-group">
						<input type="email" class="form-control" id="email" placeholder="<?php echo esc_attr(pll__('Your Email')); ?>" required="required" data-validation-required-message="Please enter your email" />
						<p class="help-block text-danger"></p>
					</div>
					<div class="control-group">
						<input type="text" class="form-control" id="subject" placeholder="<?php echo esc_attr(pll__('Subject')); ?>" required="required" data-validation-required-message="Please enter a subject" />
						<p class="help-block text-danger"></p>
					</div>
					<div class="control-group">
						<textarea class="form-control" rows="6" id="message" placeholder="<?php echo esc_attr(pll__('Message')); ?>" required="required" data-validation-required-message="Please enter your message"></textarea>
						<p class="help-block text-danger"></p>
					</div>
					<div>
						<button class="btn btn-primary py-2 px-4" type="submit" id="sendMessageButton"><?php echo esc_attr(pll__('Send Message')); ?></button>
					</div>
				</form>
			</div>
		</div>
		<div class="col-lg-5 mb-5">
			<h5 class="font-weight-semi-bold mb-3">Get In Touch</h5>
			<p>
				<?php if ($lang == 'ru') {
					echo get_field('contacts_address', 'option');
				} else if ($lang == 'en') {
					echo get_field('contacts_address_en', 'option');
				} else {
					echo get_field('contacts_address_kz', 'option');
				} ?>
			</p>
			<div class="d-flex flex-column mb-3">
				<?php if (get_field('contacts_email', 'option')) { ?>
					<p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i><?php echo get_field('contacts_email', 'option'); ?></p>
				<?php } ?>
				<?php if (get_field('contacts_phone', 'option')) { ?>
					<p class="mb-2"><i class="fa fa-phone-alt text-primary mr-3"></i><?php echo get_field('contacts_phone', 'option'); ?></p>
				<?php } ?>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>