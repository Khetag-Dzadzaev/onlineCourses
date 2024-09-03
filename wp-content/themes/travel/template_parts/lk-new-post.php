<?php if (is_user_logged_in() && current_user_can('customer') || is_user_logged_in() && current_user_can('administrator')) : ?>

	<?
	if ($_SERVER['REQUEST_METHOD'] === 'GET' && array_key_exists('activate-post', $_GET) && array_key_exists('activation-key', $_GET)) {
		(function () {
			$post_id = $_GET['activate-post'];
			$activation_key = $_GET['activation-key'];

			if (get_post_meta($post_id, 'activation_key')[0] !== $activation_key) {
				return;
			}

			$posts = pll_get_post_translations($post_id);

			foreach ($posts as $post_id) {
				$new_post = [
					'ID' => $post_id,
					'post_status' => 'publish',
					'meta_input' => [
						'active_until' => date('U', strtotime("+1 week")),
						'activation_key' => '',
					],
				];

				wp_update_post($new_post);
			}

			http_response_code(200);
			echo '<div class="success"><p>Запись опубликована!</p></div>';
		})();
	}

	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		(function () {
			require_once($_SERVER['DOCUMENT_ROOT'] . '/wp-load.php');

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

			$activation_key = generateRandomString();

			foreach ($langArr as $el) {

				$new_post = array(
					'post_status' => 'draft',
					'post_date' => date('Y-m-d H:i:s'),
					'post_author' => $user_ID,
					'post_type' => 'product',
					'meta_input'   => [
						'product_date' => $_POST['post_date'],
						'activation_key' => $activation_key,
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

				if ($_FILES['post_image'] && $_FILES['post_image']['name']) {
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

			$price = 3;
			$currency = get_woocommerce_currency();

			if ($currency === 'KZT') {
				$price = $price * 476.26;
			}

			$response = symocoPay(json_encode([
				'description' => 'Publish tour #' . $post_id,
				'autoConfirm' => true,
				'amount' => [
					'value' => '' . $price . '',
					'currency' => $currency,
				],
				'successUrl' => 'https://kzticket.kz/akkaunt/add-product?activate-post=' . $post_id . '&activation-key=' . $activation_key,
			]));

			header('Location: ' . $response['object']['payUrl']);
			die();
		})();
	}
	?>

	<?php
	$special_cat_ids = getSpecialCategoriesIds();
	?>

	<h3 class="article__main-title main-title mb-5 mt-5"><?php echo esc_attr(pll__('Add new product')); ?></h3>

	<form class="add-new-post-form" method="POST" enctype="multipart/form-data">
		<div class="add-new-post-form__row row">
			<div class="add-new-post-form__col col-12 col-lg-4">
				<label for="post_title" class="add-new-post-form__label">Название</label>
				<input class="add-new-post-form__input" name="post_title" id="post_title" type="text" />
			</div>

			<div class="add-new-post-form__col col-12 col-lg-4">
				<label for="post_title_en" class="add-new-post-form__label">Название En</label>
				<input class="add-new-post-form__input" name="post_title_en" id="post_title_en" type="text" />
			</div>

			<div class="add-new-post-form__col col-12 col-lg-4">
				<label for="post_title_kz" class="add-new-post-form__label">Название Kz</label>
				<input class="add-new-post-form__input" name="post_title_kz" id="post_title_kz" type="text" />
			</div>
		</div>

		<div class="add-new-post-form__block">
			<label for="post_date" class="add-new-post-form__label">Дата</label>
			<input class="add-new-post-form__input" name="post_date" id="post_date" type="date" />
		</div>

		<div class="add-new-post-form__block">
			<label for="post_price" class="add-new-post-form__label">Цена билета</label>
			<input class="add-new-post-form__input" name="post_price" id="post_price" type="text" />
		</div>

		<?php
		$categories = get_terms([
			'taxonomy' => 'product_cat',
			'hide_empty' => false,
			'exclude' => array_merge(
				[15, 24, 95],
				array_values($special_cat_ids),
			)
		]);

		?>
		<div class="add-new-post-form__block">
			<div class="add-new-post-form__label">Категория</div>

			<select name="post_categories">
				<?php foreach ($categories as $cat) {
				?>
					<option value="<?php echo $cat->term_id; ?>"><?php echo $cat->name; ?></option>
				<?php } ?>
			</select>
		</div>

		<div class="add-new-post-form__block">
			<div class="add-new-post-form__label">Содержание</div>

			<?php
			wp_editor('', 'text', array('textarea_name' => 'post_article', 'quicktags' => false, 'media_buttons' => false));
			?>
		</div>

		<div class="add-new-post-form__block">
			<div class="add-new-post-form__label">Содержание En</div>

			<?php
			wp_editor('', 'texten', array('textarea_name' => 'post_article_en', 'quicktags' => false, 'media_buttons' => false));
			?>
		</div>

		<div class="add-new-post-form__block">
			<div class="add-new-post-form__label">Содержание Kz</div>

			<?php
			wp_editor('', 'textkz', array('textarea_name' => 'post_article_kz', 'quicktags' => false, 'media_buttons' => false));
			?>
		</div>

		<div class="add-new-post-form__block">
			<div class="add-new-post-form__label">Изображение статьи</div>

			<input type="file" name="post_image" id="post_image" accept=".jpg,.jpeg,.png" onchange="return readImg(this);" />

			<div class="add-new-post-form__img-block"></div>
		</div>

		<?php wp_nonce_field('new_post_nonce_action', 'new_post_nonce_field'); ?>

		<button class="add-new-post-form__btn amado-btn">Отправить и оплатить</button>
	</form>

	<div class="response"></div>

	<script>
		function readImg(el) {
			let block = el.nextElementSibling;
			let imgCheck = block.querySelector('.add-new-post-form__img');
			let removeLinkCheck = block.querySelector('.add-new-post-form__img-remove');
			if (imgCheck && removeLinkCheck) {
				imgCheck.remove();
				removeLinkCheck.remove();
			}
			if (el.files && el.files[0]) {
				var reader = new FileReader();
				let img = document.createElement('img');
				img.classList.add('add-new-post-form__img');
				reader.onload = function(e) {
					img.setAttribute('src', e.target.result);
				}
				reader.readAsDataURL(el.files[0]);
				el.nextElementSibling.insertAdjacentElement('afterbegin', img);
				let removeLink = document.createElement('span');
				removeLink.classList.add('add-new-post-form__img-remove');
				removeLink.textContent = 'Удалить';
				el.nextElementSibling.insertAdjacentElement('beforeend', removeLink);
				removeLink.addEventListener('click', () => {
					img.remove();
					removeLink.remove();
					el.value = '';
				});
			}
		}

		function formSend(e) {

			let editor = tinyMCE.get('text');
			let contentEditor = editor.getContent()
			let textarea = document.querySelector('#text');
			textarea.value = contentEditor;

			let editorEn = tinyMCE.get('texten');
			let contentEditorEn = editorEn.getContent()
			let textareaEn = document.querySelector('#texten');
			textareaEn.value = contentEditorEn;

			var act = e.getAttribute("action");
			var file = e.querySelector('input[type=file]').files;
			var btn = e.querySelector('.add-new-post-form__btn');

			var blockImg = e.querySelector('input[type=file]').nextElementSibling;
			var imgCheck = blockImg.querySelector('.add-new-post-form__img');
			var removeLinkCheck = blockImg.querySelector('.add-new-post-form__img-remove');

			var btnText = btn.textContent;
			btn.setAttribute('disabled', 'disabled');
			btn.textContent = 'Загрузка...';

			var request = new XMLHttpRequest();
			var formData = new FormData();
			for (let formItem of e) {
				formData.append(formItem.name, formItem.value);
			}
			formData.append("post_image", file[0]);

			request.open('POST', act, true);
			request.onreadystatechange = function() {
				if (request.readyState === 4) {
					if (request.status === 422) {
						btn.textContent = btnText;
						btn.removeAttribute('disabled');
						e.nextElementSibling.innerHTML = request.response;
						let inputs = e.querySelectorAll('input, select, textarea');
						inputs.forEach(el => {
							el.addEventListener('mouseenter', () => {
								el.removeAttribute("style");
								el.classList.remove('error');
							});
						});

						let iframe = e.querySelectorAll('textarea');
						iframe.forEach(el => {
							el.previousElementSibling.addEventListener('mouseenter', () => {
								el.previousElementSibling.removeAttribute("style");
								el.previousElementSibling.classList.remove('error');
							});
						});

						// let iframe = e.querySelector('textarea').previousElementSibling;
						// iframe.addEventListener('mouseenter', () => {
						// 	iframe.removeAttribute("style");
						// 	iframe.classList.remove('error');
						// });
						let errors = e.nextElementSibling.querySelectorAll("[data-error]");
						errors.forEach(el => {
							let dataAt = el.getAttribute("data-error");
							let input = e.querySelector("input[name=" + dataAt + "], select[name=" + dataAt + "], textarea[name=" + dataAt + "]");
							input.style.borderColor = "#da4c4c";
							input.style.border = "1px solid #da4c4c";
							input.classList.add('error');
							if (input.classList.contains('wp-editor-area')) {
								input.previousElementSibling.style.border = "1px solid #da4c4c";
								input.previousElementSibling.classList.add('error');
							}
						});
					} else {
						btn.textContent = btnText;
						btn.removeAttribute('disabled');
						e.nextElementSibling.innerHTML = request.response;
						if (imgCheck) {
							imgCheck.remove();
						}
						if (removeLinkCheck) {
							removeLinkCheck.remove();
						}
						e.reset();
					}
				}
			}
			request.send(formData);
			return false;
		}
	</script>
<?php else : ?>
	<?php
	wp_safe_redirect(get_permalink(get_option('woocommerce_myaccount_page_id')));
	exit;
	?>
<?php
endif;
