<?php
/*
 * Template Name: О нас
**/

get_header();
?>

<section class="float-left w-100 about-travel-con position-relative main-box padding-top padding-bottom">
    <img alt="vector" class="vector5 wow bounceInUp img-fluid position-absolute" data-wow-duration="2s" src="<?= get_template_directory_uri(); ?>/assets/images/vector5.png">

    <img alt="vector" class="vector6 img-fluid position-absolute" src="<?= get_template_directory_uri(); ?>/assets/images/vector6.png">

    <div class="container wow bounceInUp" data-wow-duration="2s">
        <div class="row">
            <div class="col-lg-6">
                <div class="about-travel-img-con position-relative">
                    <figure class="about-img">
                        <img class="img-fluid" alt="<?php the_field('title'); ?>" src="<?= the_field('img'); ?>">
                    </figure>
                    <!-- about travel img con -->
                </div>
                <!-- col -->
            </div>

            <div class="col-lg-6">
                <div class="about-travel-content">
                    <h2>
                        <?php the_field('title'); ?>
                    </h2>

                    <?php the_content(); ?>

                    <ul class="list-unstyled p-0 listing">
                        <?php
                        $advantages = get_field('list_repeater');
                        ?>

                        <?php foreach ($advantages as $advantage) : ?>
                            <li class="position-relative">
                                <i class="fa-solid fa-check mr-3"></i>

                                <?= $advantage['content']; ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                    <!-- about travel content -->
                </div>
                <!-- col -->
            </div>
            <!-- row -->
        </div>
        <!-- container -->
    </div>
    <!-- about travel con -->
</section>

<section class="float-left w-100 plan-trip-con position-relative main-box padding-top padding-bottom">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8 col-md-8 order-xl-0 order-lg-0 order-md-0 order-1">
                <div class="plan-trip-sub-con">
                    <div class="heading-content text-left position-relative">
                        <h2 class="text-uppercase">
                            <?php the_field('banner_title'); ?>
                        </h2>

                        <div class="green-btn d-inline-block">
                            <a href="<?php the_field('banner_button_link'); ?>" class="d-inline-block">
                                <?php the_field('banner_button_text'); ?>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- col -->
            </div>

            <div class="col-lg-4 col-md-4">
                <figure>
                    <img class="img-fluid" src="<?= get_template_directory_uri(); ?>/assets/images/plan-trip-img.png" alt="image">
                </figure>
                <!-- col -->
            </div>
            <!-- row -->
        </div>
        <!-- container -->
    </div>
    <!-- plan your trip con -->
</section>

<?php
get_footer();
?>