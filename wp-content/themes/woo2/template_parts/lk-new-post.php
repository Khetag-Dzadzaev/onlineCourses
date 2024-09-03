<?php if (is_user_logged_in() && current_user_can('customer') || is_user_logged_in() && current_user_can('administrator')) { ?>


	<?php
	/* 

	$posts_query = new WP_Query([
		'post_type' => 'product',
		'posts_per_page' => -1,
		'author' => wp_get_current_user()->ID,
		'post_status' => 'any'
	]);


	while ($posts_query->have_posts()) {
		$posts_query->the_post();
		$posts_query->post; ?>

		<a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
	<?php
		wp_reset_postdata();
	}
	 */
	?>

	<h1 class="article__main-title main-title mb-30 mt-30"><?php echo esc_attr(pll__('Add new product')); ?></h1>


	<form class="add-new-post-form" action="<?php echo get_template_directory_uri(); ?>/php/new-post.php" method="POST" enctype="multipart/form-data" onsubmit="return formSend(this);">

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
		<div class="add-new-post-form__row">
			<div class="add-new-post-form__col">
				<label for="post_place" class="add-new-post-form__label">Место проведения</label>
				<input class="add-new-post-form__input" name="post_place" id="post_place" type="text" />
			</div>
			<div class="add-new-post-form__col">
				<label for="post_place_en" class="add-new-post-form__label">Место проведения En</label>
				<input class="add-new-post-form__input" name="post_place_en" id="post_place_en" type="text" />
			</div>
		</div>
		<div class="add-new-post-form__block">
			<label for="post_price" class="add-new-post-form__label">Цена билета</label>
			<input class="add-new-post-form__input" name="post_price" id="post_price" type="text" />
		</div>
		<?php
		$categories = get_terms([
			'taxonomy' => 'product_cat',
			'hide_empty' => false,
			'exclude' => [15, 24, 95]
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
			<div class="add-new-post-form__label">Изображение статьи</div>
			<input type="file" name="post_image" id="post_image" accept=".jpg,.jpeg,.png" onchange="return readImg(this);" />
			<div class="add-new-post-form__img-block"></div>
		</div>
		<?php wp_nonce_field('new_post_nonce_action', 'new_post_nonce_field'); ?>
		<button class="add-new-post-form__btn amado-btn">Отправить</button>
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
	</div>
<?php
} else {
	wp_safe_redirect(get_permalink(get_option('woocommerce_myaccount_page_id')));
	exit;
}
