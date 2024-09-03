<?php

/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе установки.
 * Необязательно использовать веб-интерфейс, можно скопировать файл в "wp-config.php"
 * и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки базы данных
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://ru.wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */
// ** Параметры базы данных: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define('DB_NAME', 'onlineCurses');
/** Имя пользователя базы данных */
define('DB_USER', 'root');
/** Пароль к базе данных */
define('DB_PASSWORD', '');
/** Имя сервера базы данных */
define('DB_HOST', 'localhost');
/** Кодировка базы данных для создания таблиц. */
define('DB_CHARSET', 'utf8mb4');
/** Схема сопоставления. Не меняйте, если не уверены. */
define('DB_COLLATE', '');
/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу. Можно сгенерировать их с помощью
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}.
 *
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными.
 * Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '`8x,p8PEs0oo7/yI{WGYI5qtE23b]L5vMzu%Z3(,sS/BfnO~lVA^I{9_oT6EP20-');
define('SECURE_AUTH_KEY',  '(_39`%A{p/xRwVlCF>I1&s|)t%D8^3)-?su*|>J]fbI`Zc=^S:]:}tJAThh$$[b|');
define('LOGGED_IN_KEY',    'JH)<+YYE@tf$i$V4&jSf*t8gTvvKork<Bwiy|@5:=H@^AoWSE%pq&C<pZF0cz)bi');
define('NONCE_KEY',        'j)Me98,q,=Z|]eoxIpy1[TUJ;V8{i7Tq|-[%w|5I&1~0@_A1JeZoNz3w5)A@!0r9');
define('AUTH_SALT',        'vp4Wlp$x21(E2bK)wpt1~_KhNwvApvVQ` DQ[`o[sU/u8Voi~zCfDA$gr(V0G(x)');
define('SECURE_AUTH_SALT', 'mXf$ZQb:Eh*G0AiXzqckWIgc-5[AOh~)%,Dv+sa{BPPidVB<gX}FRd`1>eeO*:@N');
define('LOGGED_IN_SALT',   'em Bz?:#vP}+H&iyqv5fv`OL@T!yTj(iz%7Z]ot&P6A%AQMYn$M4L&3Ysy0jEo|N');
define('NONCE_SALT',       'a}Bn`e?$%AW*a;nwd~=<WtuQ3RSY|Il!-q&;qm~XnVQyc*8z=!Nw6=Q,.AlId_sC');
/**#@-*/
/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix = 'wp_';
/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 *
 * Информацию о других отладочных константах можно найти в документации.
 *
 * @link https://ru.wordpress.org/support/article/debugging-in-wordpress/
 */
define('WP_DEBUG', false);
/* Произвольные значения добавляйте между этой строкой и надписью "дальше не редактируем". */
/* Это всё, дальше не редактируем. Успехов! */
/** Абсолютный путь к директории WordPress. */
if (!defined('ABSPATH')) {
	define('ABSPATH', __DIR__ . '/');
}
/** Инициализирует переменные WordPress и подключает файлы. */
require_once ABSPATH . 'wp-settings.php';
//Disable File Edits
if (!defined('DISALLOW_FILE_EDIT')) {
	define('DISALLOW_FILE_EDIT', true);
}
