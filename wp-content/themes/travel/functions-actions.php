<?php
add_action('wp_ajax_signin', 'signin_action');
add_action('wp_ajax_nopriv_signin', 'signin_action');

function signin_action()
{
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') die();

    $errors = [];

    if (empty($_POST['login'])) {
        $errors['login'] = 'Введите ваш логин';
    }

    if (empty($_POST['password'])) {
        $errors['password'] = 'Введите ваш пароль';
    }

    if (!empty($errors)) {
        http_response_code(422);

        echo json_encode(
            [
                'success' => false,
                'errors' => $errors,
                'message' => 'Заполните обязательные поля!'
            ]
        );

        die();
    }

    $creds = array();

    $creds['user_login'] = $_POST['login'];
    $creds['user_password'] = $_POST['password'];
    $creds['remember'] = true;

    $user = wp_signon($creds, true);

    if (is_wp_error($user)) {
        $errorMessage = '';

        if ($user->get_error_code() === 'incorrect_password') {
            $errorMessage = 'Неверный пароль!';
            $errors['password'] = 'password';
        }

        if ($user->get_error_code() === 'invalid_username') {
            $errorMessage = 'Неверный логин!';
            $errors['login'] = 'login';
        }

        http_response_code(422);

        echo json_encode(
            [
                'success' => false,
                'errors' => $errors,
                'message' => $errorMessage
            ]
        );

        die();
    }

    http_response_code(200);

    echo json_encode(
        [
            'success' => true
        ]
    );

    die();
}
