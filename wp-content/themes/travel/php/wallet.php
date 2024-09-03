<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	require_once('../../../../wp-load.php');

	foreach ($_POST as $key => $val) {
		$_POST[$key] = cleanInputs($val);
	}

	if (!wp_verify_nonce($_POST['wallet_nonce_field'], 'wallet_nonce_action')) {
		http_response_code(422);
		echo '<ul class="errors-list"><li class="errors-list__item">nonce Something went wrong.</li></ul>';
		die();
	}

	$errors = [];
	if (empty($_POST['wallet_name'])) {
		$errors['wallet_name'] = 'Введите Ваше имя';
	}
	if (empty($_POST['wallet_phone'])) {
		$errors['wallet_phone'] = 'Введите Ваше телефон';
	}
	if (empty($_POST['wallet_sum'])) {
		$errors['wallet_sum'] = 'Введите сумму';
	}

	if (empty($_POST['wallet_email']) || !filter_var($_POST['wallet_email'], FILTER_VALIDATE_EMAIL)) {
		$errors['wallet_email'] = 'Введите email';
	}

	if (!empty($errors)) {
		$error_output = '';
		$error_output  .= '<ul class="errors-list">';
		foreach ($errors as $key => $value) {
			$error_output .= '<li data-error="' . $key . '"></li>';
		}
		if ($_POST['locale'] === 'en') {
			$error_output .= '<li class="errors-list__item">Fill in required fields!</li>';
		} else {
			$error_output .= '<li class="errors-list__item">Заполните обязательные поля!</li>';
		}

		$error_output .= '</ul>';
		http_response_code(422);
		echo $error_output;
		die();
	}

	if ($_POST['locale'] === 'ru') {
		http_response_code(200);
		echo '<div class="success"><p>Ваше сообщение успешно отправлено!</p></div>';
		die();
	} else if ($_POST['locale'] === 'en') {
		http_response_code(200);
		echo '<div class="success"><p>Your message has been sent successfully!</p></div>';
		die();
	} else {
		http_response_code(422);
		echo '<ul class="errors-list"><li class="errors-list__item">Something went wrong.</li></ul>';
		die();
	}
} else {
	header('Location: /');
	exit;
}
