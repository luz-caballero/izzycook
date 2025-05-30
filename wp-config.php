<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'izzycook_test_db' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'f;xfKi4$mvX<U$nM:.NB#dEMpcpf+u1mDz97:$q<[O5KNigU}sh$|:n9lM.:tW0t' );
define( 'SECURE_AUTH_KEY',  'Hkr)f}uzA@ {-9=;pp(&[2ImJ,+bMAQ|>t*C7N57l}Vrtpq~bKy6/$Lj)b!|8TA[' );
define( 'LOGGED_IN_KEY',    'vV6O^;g-2A{e3g1Awoy>S?*(D&]FnW8-hpBL$@U*SG8FUNanE/{3=`U`GX?.(Z[2' );
define( 'NONCE_KEY',        '7[%[)V]WTt/,d,QXTiM2*@oR9j#Lek-=/`/l.hK]5l<4n;Uf))[aYuQGL3(hYbj/' );
define( 'AUTH_SALT',        '9WVaGZ*CW#PmMKs [?^zB2;j*@LEhpl.)g;}WM)><{BtQ{x4?h$n3]B?l&=?cOPO' );
define( 'SECURE_AUTH_SALT', ',~r7;QmF_wx(.8L}4[8K;7f8mpBmVxg.2p9[%]i090em8Z)36,3#Gfz)U@hF :Nk' );
define( 'LOGGED_IN_SALT',   'Lww*?JSicLl#qjb_k[E@lxZ#?dTLv:p1lWPT4+|UAA?)=$`F-/.(lh@1Nh`C1rp%' );
define( 'NONCE_SALT',       'Zd>tj hJ@sbO!H`Ceu3~lc]pBfm3uGxDH|?e0,rssckCpk[%@|CrNVk=a]Ka,2?)' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
 */
define( 'WP_DEBUG', true );

define( 'WP_DEBUG_LOG', true );
define( 'WP_DEBUG_DISPLAY', true );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';

define('WP_HOME', 'http://localhost/izzycook-prod');
define('WP_SITEURL', 'http://localhost/izzycook-prod');
