<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'wordpress');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'PHor81K{~j8>)[/GP<D0Xylg@I9u0t7uI;m]x=P3>75w9^oo/O}MRj:fN1OA^FFf');
define('SECURE_AUTH_KEY',  'USv%.&iG7c*C(:p:o!lbmFKXic5L]YT>ihQ#D+=N2Hj^7p^i65(WPqyYv2@P&;H7');
define('LOGGED_IN_KEY',    'Z9Ei(RhlRM57z?<8deMko|+|yHT4H.a5z<,!95*PBhA!LH3x{&eo,<t_CMvx^49{');
define('NONCE_KEY',        '$-/)o$N],fvGQ;8+2CBxgD86O*{d.9I^+L]/!Rr]vEl9fGNQBT*W::aNm)qP~HFb');
define('AUTH_SALT',        'U[4r6u|GXr;qy}x5z<tzB;C)/ln(9N!-|-_:CH6=TJkQdesC[rPNCDg8 QUz*Y@G');
define('SECURE_AUTH_SALT', 'MLk+,8$Y.#J|:;em+wF+iqpEWjzq4sSU,XmvhFcI`haUoN%*n<eVlQ.%yo 3rbdT');
define('LOGGED_IN_SALT',   '$^-.pZEBa<`kc4@Ar)A+TI@n/]R2|KW!xh-[@B+B;E.{ Q>.KfrkvI: =zRyG47p');
define('NONCE_SALT',       'd[Q,-7-mJ?XxR+pIeCpR++VPtY+0+%e*nuNUOQEu_&G`h|PIxBw[CDc|s#{|RF-;');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

define('WP_POST_REVISIONS', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
