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
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'Fundbux' );

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
define( 'AUTH_KEY',         'v+HW9^v8hS^/8iG/_hW]:-8bA>%,~[{<UXSfl!7&!u![JYw`>E$inYTM11YuB8~V' );
define( 'SECURE_AUTH_KEY',  'U[9~<3Bg$fwvBe$o%dF()xGD7oa..}L?A7Ffy3++,~)b~v?}GNzH?BnKCcPE{;nA' );
define( 'LOGGED_IN_KEY',    'mhg39l!J5@2#L,z5F}nc[_-2%~meaT5MK0yw:t3{Fd}RZAN|G8e)Cw8j%6?x_k&q' );
define( 'NONCE_KEY',        '/w:6.9UN&V^YmoGN#`I?W`)F}vu(.-|edM8~{mmIt}}@.62(c-UsL8,qeO}0e]wP' );
define( 'AUTH_SALT',        '`2<D9),TLSo>((eh7lst-?f*=0TJ%M9>wushSeY1ZIe~I=eYm=S0F?%w@|}&:w{O' );
define( 'SECURE_AUTH_SALT', 'pw>a99/Yb>r>?lf8Qw3`_y&u=<aFZo_w<SvyK)/u[PpwFM1AHBfP6J7_Ale5rlMJ' );
define( 'LOGGED_IN_SALT',   '>%xkd(1[h/2b|KqIM#su59tM?d6Pa.Evn,GMyyNdrtgB3*|AVi6SMIaXr#.w=6)w' );
define( 'NONCE_SALT',       '?]$V21S$<X[-I|G?^:F/vnsl|5S~RQvPO =iN#j%Fu?h6 tN/:BXBOT4`OTO[[^T' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_Fundbux';

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
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
