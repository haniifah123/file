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
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'database' );

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
define( 'AUTH_KEY',         'OnB)Ev|V$QGN5@Ko8#`OU}Z8m^7]|Ia`md{X.$na4^ &k*_@.;[6~]_T.?I&Y{C#' );
define( 'SECURE_AUTH_KEY',  'y1xZ:Mj%Ni;~L25#D*^5/f MzY.(/}_w{}2G8N?aJjnb;Ee>!,8V<v._Ki{T*r~S' );
define( 'LOGGED_IN_KEY',    'Y#j1N2<|`jO2.@}L>0or2C`BuwiR%ZBiH>+%#HDZn[/@UUr X_zSZ>0!N3NPS~?Z' );
define( 'NONCE_KEY',        '8e&[;KN?qPR+)#*fIFT,cc$*Omxspk^gN2Pn4.17cCSxg]%}X8!#^0X1C!G7$T&,' );
define( 'AUTH_SALT',        '(PP$}8FM(uF]yf_tBaodYx;I}9s8R3fwvBdPZ*>s|>d$vT;v`q(!|Xof^+?Qg`=J' );
define( 'SECURE_AUTH_SALT', '3<jw!Nz}w+[jHOAe&Pif#IdA~S9W_bD^-2j=rmQp0*K?MoG[V.pY2LO$0|!XrHn*' );
define( 'LOGGED_IN_SALT',   '2*/PZ3l_ d[?IOkE4_VH3/fBLDL._m4{Vf3k]|+]hB)Ixh&.2C*CArVdasJOMPD&' );
define( 'NONCE_SALT',       '~xi~}>4kW:i88wmwOuj`uqM0&Umf8`9J&~g@G1F[V<@<Kx-fyPRSC&]/USafaORe' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_admin';

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
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
