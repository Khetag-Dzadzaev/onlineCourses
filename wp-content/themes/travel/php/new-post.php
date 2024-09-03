<?php



// Название, Дата, Место проведения, Цена билета, Описание

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once('../../../../wp-load.php');

    $_POST = cleanPostArr($_POST);

    /* в форме: wp_nonce_field('_nonce_action', '_nonce_field'); */
    if (!wp_verify_nonce($_POST['new_post_nonce_field'], 'new_post_nonce_action')) {
        http_response_code(422);
        echo 'Что-то пошло не так.';
        die();
    }

    $whitelist_type = array('image/jpeg', 'image/png', 'image/gif');
    $fileinfo = finfo_open(FILEINFO_MIME_TYPE);

    if (empty($_POST['post_title'])) {
        $errors['post_title'] = 'Введите название поста';
    }
    if (empty($_POST['post_title_en'])) {
        $errors['post_title_en'] = 'Введите название поста';
    }
    if (empty($_POST['post_article'])) {
        $errors['post_article'] = 'Введите содержимое поста';
    }
    if (empty($_POST['post_article_en'])) {
        $errors['post_article_en'] = 'Введите содержимое поста';
    }
    if (empty($_POST['post_date'])) {
        $errors['post_date'] = 'Введите содержимое поста';
    }
    if (empty($_POST['post_price'])) {
        $errors['post_price'] = 'Введите содержимое поста';
    }
    if (empty($_POST['post_categories'])) {
        $errors['post_categories'] = 'Введите содержимое поста';
    }


    if (!empty($_FILES['post_image']) && $_FILES['post_image']['size'] > 2097152) {
        $errors['post_file_size'] = 'Слишком большой файл! Нужен меньше 2mb';
    }

    if (!empty($errors)) {
        $error_output = '';
        $error_output  .= '<ul class="errors-list">';

        foreach ($errors as $key => $value) {
            if ($key == 'post_file_type') {
                $error_output .= '<li class="errors-list__item">' . $value . '</li>';
            } elseif ($key == 'post_file_size') {
                $error_output .= '<li class="errors-list__item">' . $value . '</li>';
            } else {
                $error_output .= '<li data-error="' . $key . '"></li>';
            }
        }

        $error_output .= '<li class="errors-list__item">Заполните обязательные поля!</li>';
        $error_output .= '</ul>';
        http_response_code(422);
        echo $error_output;
        die();
    }

    global $user_ID;
    global $wpdb;

    $langArr = ['ru', 'en', 'kk'];
    $savePostTrans = [];
    $imageId = '';

    foreach ($langArr as $el) {

        $new_post = array(
            'post_status' => 'publish',
            'post_date' => date('Y-m-d H:i:s'),
            'post_author' => $user_ID,
            'post_type' => 'product',
            'meta_input'   => [
                'product_date' => $_POST['post_date'],
            ],
        );

        if ($el == 'ru') {
            $new_post['post_title'] = sanitize_text_field($_POST['post_title']);
            $new_post['post_content'] = $_POST['post_article'];
        }
        if ($el == 'en') {
            $new_post['post_title'] = sanitize_text_field($_POST['post_title_en']);
            $new_post['post_content'] = $_POST['post_article_en'];
        }
        if ($el == 'kk') {
            $new_post['post_title'] = sanitize_text_field($_POST['post_title_kz']);
            $new_post['post_content'] = $_POST['post_article_kz'];
        }

        $post_id = wp_insert_post(wp_slash($new_post));
        pll_set_post_language($post_id, $el);
        $savePostTrans[$el] = $post_id;

        $product = wc_get_product($post_id);
        $product->set_regular_price($_POST['post_price']);
        if ($el == 'ru') {
            $product->set_category_ids([pll_get_term_translations($_POST['post_categories'])['ru']]);
        }
        if ($el == 'en') {
            $product->set_category_ids([pll_get_term_translations($_POST['post_categories'])['en']]);
        }
        if ($el == 'kk') {
            $product->set_category_ids([pll_get_term_translations($_POST['post_categories'])['kk']]);
        }
        $product->save();

        if ($_FILES['post_image']) {
            if ($el == 'ru') {
                $file = $_FILES['post_image']['tmp_name'];
                $filename = $_FILES['post_image']['name'];

                $upload_file = wp_upload_bits($filename, null, @file_get_contents($file));

                if (!$upload_file['error']) {
                    $filetype = wp_check_filetype($filename, null);
                    $wp_upload_dir = wp_upload_dir();
                    $attachment = array(
                        'post_mime_type' => $filetype['type'],
                        'post_title'     => preg_replace('/\.[^.]+$/', '', $filename),
                        'post_content'   => '',
                        'post_status'    => 'inherit',
                        'post_parent'    => $post_id
                    );
                    $attach_id = wp_insert_attachment($attachment, $upload_file['file'], $post_id);
                    $imageId = $attach_id;

                    if (!is_wp_error($attach_id)) {
                        require_once(ABSPATH . 'wp-admin/includes/image.php');
                        $attach_data = wp_generate_attachment_metadata($attach_id, $upload_file['file']);
                        wp_update_attachment_metadata($attach_id, $attach_data);
                        set_post_thumbnail($post_id, $attach_id);
                    }
                }
            } else {
                update_post_meta($post_id, '_thumbnail_id', $imageId);
            }
        }
    }
    pll_save_post_translations($savePostTrans);

    // $postTitle = sanitize_text_field($_POST['post_title']);
    // $postContent = $_POST['post_article'];


    // $product = new WC_Product_Simple();
    // $product->set_name( $postTitle ); 
    // $product->set_description( $postContent );
    // $product->set_regular_price( $_POST['post_price'] );
    // $product->set_category_ids([$_POST['post_categories']]);


    // $product->set_image_id( 90 );


    // you can also use $product->set_tag_ids() for tags, brands etc

    // $product->save();


    // $new_post = array(
    // 	'post_title' => $postTitle,
    // 	'post_content' => $postContent,
    // 	'post_status' => 'draft',
    // 	'post_date' => date('Y-m-d H:i:s'),
    // 	'post_author' => $user_ID,
    // 	'post_type' => 'product',
    // );

    // $current_user = wp_get_current_user();
    // $termId = get_field('avtor-id', 'user_' . $current_user->ID);


    // $post_id = wp_insert_post(wp_slash($new_post));


    // pll_set_post_language($post_id, 'en_US');

    // $product = wc_get_product($post_id);
    // $product->set_regular_price($_POST['post_price']);
    // $product->set_category_ids([$_POST['post_categories']]);
    // $product->save();

    // update_post_meta($post_id, 'product_date', $_POST['post_date']);
    // update_post_meta($post_id, 'product_place', $_POST['post_place']);

    // update_post_meta($post_id, '_regular_price', $_POST['post_price']);
    // wp_set_object_terms($post_id, $_POST['post_categories'], 'product_cat');

    // $file = $_FILES['post_image']['tmp_name'];
    // $filename = $_FILES['post_image']['name'];

    // $upload_file = wp_upload_bits($filename, null, @file_get_contents($file));


    // if (!$upload_file['error']) {
    // 	$filetype = wp_check_filetype($filename, null);
    // 	$wp_upload_dir = wp_upload_dir();
    // 	$attachment = array(
    // 		'post_mime_type' => $filetype['type'],
    // 		'post_title'     => preg_replace('/\.[^.]+$/', '', $filename),
    // 		'post_content'   => '',
    // 		'post_status'    => 'inherit',
    // 		'post_parent'    => $post_id
    // 	);
    // 	$attach_id = wp_insert_attachment($attachment, $upload_file['file'], $post_id);

    // 	if (!is_wp_error($attach_id)) {
    // 		require_once(ABSPATH . 'wp-admin/includes/image.php');
    // 		$attach_data = wp_generate_attachment_metadata($attach_id, $upload_file['file']);
    // 		wp_update_attachment_metadata($attach_id, $attach_data);
    // 		set_post_thumbnail($post_id, $attach_id);
    // 	}
    // }

    // wp_set_object_terms($post_id, $termId, 'bloggers');
    // $attached_image = get_children(array(
    // 	'post_parent' => 2288, 'post_type' => 'attachment',
    // ));

    // if ($attached_image) {
    // 	foreach ($attached_image as $attachment_id => $attachment)
    // 		// set_post_thumbnail($post_id, $attachment_id);
    // 		wp_update_post(array(
    // 			'ID' => $attachment_id,
    // 			'post_parent' => $post_id
    // 		), true);
    // }
    if ($post_id) {
        $ok = true;
    }
    if ($ok) {
        http_response_code(200);
        echo '<div class="success"><p>Запись опубликована!</p></div>';
    } else {
        http_response_code(422);
        echo '<ul class="errors-list"><li class="errors-list__item">Что-то пошло не так!</li></ul>';
    }
} else {
    header('Location: /404/');
    die();
}
