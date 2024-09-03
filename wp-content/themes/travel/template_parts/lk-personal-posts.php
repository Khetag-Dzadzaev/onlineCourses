<?php
if (is_user_logged_in() && current_user_can('customer') || is_user_logged_in() && current_user_can('administrator')) :

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        if (array_key_exists('post', $_GET) && array_key_exists('key', $_GET)) {
            (function () {
                $post_id = $_GET['post'];
                $key = $_GET['key'];

                if (get_post_meta($post_id, 'activation_key')[0] !== $key) {
                    return;
                }

                $posts = pll_get_post_translations($post_id);
                $active_until = get_post_meta($post_id, 'active_until')[0] ?? date('U');

                foreach ($posts as $post_id) {
                    $new_post = [
                        'ID' => $post_id,
                        'post_status' => 'publish',
                        'meta_input' => [
                            'active_until' => date('U', strtotime("+1 week", $active_until)),
                            'activation_key' => '',
                        ],
                    ];

                    wp_update_post($new_post);
                }

                http_response_code(200);
                echo '<div class="success"><p>Запись успешно продлена!</p></div>';
            })();
        }
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (array_key_exists('extend-id', $_POST)) {
            (function () {
                $extend_id = $_POST['extend-id'];

                $activation_key = generateRandomString();

                $posts = pll_get_post_translations($extend_id);

                foreach ($posts as $post_id) {
                    $new_post = [
                        'ID' => $post_id,
                        'meta_input' => [
                            'activation_key' => $activation_key,
                        ],
                    ];

                    wp_update_post($new_post);
                }

                $price = 3;
                $currency = get_woocommerce_currency();

                if ($currency === 'KZT') {
                    $price = $price * 476.26;
                }

                $response = symocoPay(json_encode([
                    'description' => 'Extend tour #' . $post_id,
                    'autoConfirm' => true,
                    'amount' => [
                        'value' => '' . $price . '',
                        'currency' => $currency,
                    ],
                    'successUrl' => 'https://kzticket.kz/akkaunt/personal-posts?post=' . $post_id . '&key=' . $activation_key,
                ]));

                header('Location: ' . $response['object']['payUrl']);
                die();
            })();
        }

        if (array_key_exists('delete-id', $_POST)) {
            (function () {
                $delete_id = $_POST['delete-id'];

                $posts = pll_get_post_translations($delete_id);

                foreach ($posts as $post_id) {
                    wh_deleteProduct($post_id, TRUE);
                }

                http_response_code(200);
                echo '<div class="success"><p>Запись успешно удалена!</p></div>';
            })();
        }
    }
?>
    <div class="travel-tour-con travel-tour-con-hide-category">
        <div class="tab-content row mx-n2">
            <?php

            $catalog_query = new WP_Query([
                'post_type' => 'product',
                'number_posts' => '-',
                'author' => get_current_user_id(),
                'post_status' => 'any',
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
                        wc_get_template_part('content', 'product-personal');
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
