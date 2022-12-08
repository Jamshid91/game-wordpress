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
define( 'DB_NAME', 'my_game' );

/** Имя пользователя базы данных */
define( 'DB_USER', 'root' );

/** Пароль к базе данных */
define( 'DB_PASSWORD', '' );

/** Имя сервера базы данных */
define( 'DB_HOST', 'localhost' );

/** Кодировка базы данных для создания таблиц. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Схема сопоставления. Не меняйте, если не уверены. */
define( 'DB_COLLATE', '' );

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
define( 'AUTH_KEY',         ')X0|cW0j=]Aun,GQpwJP]AO%O}9%Wuq.U8^b#{><J4$DNPkgcdY^EW=k#)4x^k<>' );
define( 'SECURE_AUTH_KEY',  'w^{_W$^dbnW-|&b mF7:F==6RAgp-W@n#2;*Kx^k**]u*kL2=;y3y7Y@/ooeE=uH' );
define( 'LOGGED_IN_KEY',    '6MXz-yqk+28+B.-mZrODV0j@=ESw>?bCXa;TCUST{+*0r$<mF>Hf-w,VZ%J9(n84' );
define( 'NONCE_KEY',        'c>[=eu|6,&oIn|#>;`<b=%J5vL:i7o+y:d7Z9^.)^&SC8Gh$&W;XbGmuS?IteVAB' );
define( 'AUTH_SALT',        'q/I2f9tU*yJe}0 QnG#+UrXLaEH[bzJDREsoRL1f;8nmr-|GYXD$1V<p!HRQN6@e' );
define( 'SECURE_AUTH_SALT', '|umgCaK69b`=<^g[U0#*a&/bYRQ2_ LY0H2nU_mO4E+PU{<DajtTachdiA~JuIy`' );
define( 'LOGGED_IN_SALT',   '?xk`-SYk8AmJ<ctu<6_3v6~F8GYa$c,}?]aIZNq$~_:|Y11g@G}e(rie&H^=fOk+' );
define( 'NONCE_SALT',       'np{f2MDOVE5}BH/@~*13h0`dV>(_(JQhCu|!nZH4#)w2RbKSBt;ZPEMTNb)-3g=5' );

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
define( 'WP_DEBUG', false );

/* Произвольные значения добавляйте между этой строкой и надписью "дальше не редактируем". */



/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Инициализирует переменные WordPress и подключает файлы. */
require_once ABSPATH . 'wp-settings.php';
