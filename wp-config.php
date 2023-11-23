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
define( 'DB_NAME', 'hai2' );

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
define( 'AUTH_KEY',         'pG}sves_$REwvPUWG{ygJ^y1HLg-@ CzodWiI&+EpUZ)Lx#uC}&pv$s:bh1mK(fF' );
define( 'SECURE_AUTH_KEY',  ',<<j-%4W+?:/5g5O%<S<9S9;ygZ[c;m9)6L6 #tG#:zxQ`aGZRyG9l_Nw1*Ga0A9' );
define( 'LOGGED_IN_KEY',    '(+i.tjAqjuM/GP/VIKkY.I}*qO13rTOy1ONh)#UzWIiv/r0A n%OzFJV6% *A^ak' );
define( 'NONCE_KEY',        'o)8aHX1Qz[.8w!-l9K=E=}?q v95^|}!jG$s$ZzdIv1tT~wHy3!ZJ?^{;s<rQCQR' );
define( 'AUTH_SALT',        '#kBJcFt%zOPfj!jx6^Q 4x }0j@YRu`f[2$SvQ.Gh/k pm|SDxAnvc,wD8=PBARG' );
define( 'SECURE_AUTH_SALT', 'hnyMIozBS?)(r:O_P>QVk<b$q-DoB=o*=UN%Od[vKj=`#N2+OTB(^kvbK[T*QVV9' );
define( 'LOGGED_IN_SALT',   '%sx.HZRbl)OH /%*+hq00/]70.^K,k`lFNLE~n{+!tyB[HQ;{BJ{>:01zUSl}8MZ' );
define( 'NONCE_SALT',       '_h3M;TRjqg:hYe`T&F6l<I@o$XD.%.X0%Ud!6,*Okv9DAKJfBuG{bAQl4(y~NtI6' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
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
