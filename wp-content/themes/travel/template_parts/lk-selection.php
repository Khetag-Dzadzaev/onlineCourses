<?php
if (is_user_logged_in() && current_user_can('customer') || is_user_logged_in() && current_user_can('administrator')) :
?>
    <div class="travel-tour-con travel-tour-con-hide-category">
        <div class="tab-content row mx-n2">
            <?php

            $locale = get_locale();
            $termId;

            $special_cat_ids = getSpecialCategoriesIds();

            if ($locale === 'ru_RU') {
                $termId = $special_cat_ids['ru'];
            } elseif ($locale === 'en_US') {
                $termId = $special_cat_ids['en'];
            } elseif ($locale === 'kk') {
                $termId = $special_cat_ids['kk'];
            }

            $catalog_query = new WP_Query([
                'post_type' => 'product',
                'number_posts' => '-',
                'tax_query' => [[
                    'taxonomy' => 'product_cat',
                    'field'    => 'id',
                    'terms'    =>  [$termId],
                ]]
            ]);
            ?>

            <? if ($catalog_query->have_posts()) { ?>
                <? while ($catalog_query->have_posts()) { ?>
                    <?
                    $catalog_query->the_post();
                    $catalog_query->post;
                    ?>
                    <div class="col-12 col-sm-6 col-lg-4 px-2 mb-3">
                        <?
                        wc_get_template_part('content', 'product');
                        ?>
                    </div>
                <? } ?>

                <? wp_reset_postdata(); ?>
            <? } ?>
        </div>
    </div>
<?php
else :
?>
    <?php
    wp_safe_redirect(get_permalink(get_option('woocommerce_myaccount_page_id')));
    exit;
    ?>
<?php
endif;
