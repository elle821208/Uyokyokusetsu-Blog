<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('WP_CACHE', true);
define( 'WPCACHEHOME', '/home/c3788340/public_html/elle-consultation.com/wp-content/plugins/wp-super-cache/' );
define( 'DB_NAME', 'yd26l_srvhj75b' );

/** Database username */
define( 'DB_USER', 'yd26l_mhve383u' );

/** Database password */
define( 'DB_PASSWORD', 'y67F4,|G868' );

/** Database hostname */
define( 'DB_HOST', 'mysql46.conoha.ne.jp' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define( 'AUTH_KEY',          'Lf:]%@#Vz$qYK}f/1egk|{t@e$-^+oL~799ao<@)tbbfG.Yae A>%BBK]56OvGUv' );
define( 'SECURE_AUTH_KEY',   '-)i*oqZFY2Z*H$RC6`3/_zA8^3gwW]#Y,FMu;B%u__VuE>?sDB%^RQ;qE`{l_#a<' );
define( 'LOGGED_IN_KEY',     'p,UdzIV%H*oK;BZ,#l9se=GEvEL-p&r6_SEPiVm@U-UsWYPNWBFL:|24`y26Sz!=' );
define( 'NONCE_KEY',         'VF2H@%GS@Br>k+yU@0]n^gO#JUz+52AT;!yVT+[_V~ q[99,j@:#Q(XkA&*=(bvf' );
define( 'AUTH_SALT',         'r$U8MDu15+7cz/eI9vNCTazO<d<q{)&VbCUimx$LF!,P:3wOKu2X*nKGK4t@o)(h' );
define( 'SECURE_AUTH_SALT',  'C8/SI_EID44l0j(|:YL}V85h@K5MkUPgaBH_lojVyAj6>XW*8?ZG(=Gn.{pt;|~_' );
define( 'LOGGED_IN_SALT',    ')Jxq+0},?>aYr+PD/|s@IBu~oB%s|LnG1kb/{H6bFJCqmHg]d`l&^LM!@64e8CCb' );
define( 'NONCE_SALT',        'n<C`3/Ij|aQO@2`2m*q%L=3R>zEk=_F&o:r=G5s|?-l&L8f99|%p34We+z_+8|!|' );
define( 'WP_CACHE_KEY_SALT', '<HE/Z6p*J:]Pv`+ ^&l<CuANU@^dQ vX)`_t:-djfVmedgl}Hq$G_dMuK_x,d:G^' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

if (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === "https") {
    $_SERVER['HTTPS'] = 'on';
    define('FORCE_SSL_LOGIN', true);
    define('FORCE_SSL_ADMIN', true);
}


/* Add any custom values between this line and the "stop editing" line. */



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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

define( 'CW_DASHBOARD_PLUGIN_SID', 'Np_bhAgOjT9Y4v3rtZTRnSVdiMouhI-JrgZD_8tI17ceWtcmeCzOETGlwYUQGIH06dGfPzv7SCTWK5ZTwzkgE2vuZDJ_ac_M4tA-_3lYVQU.' );
define( 'CW_DASHBOARD_PLUGIN_DID', 'CVBysPIw2FNCntPRESxG0dyQW6jDvnt5Av4teQEd7sJQ8XxMkjQpB8XqYVKP3C-doJVyChuPrxKr0PWi_kNjRJnvtT8KijCC0cj7OHtUsXA.' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
