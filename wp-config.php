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
define( 'DB_NAME', 'ma1mo' );

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
define( 'AUTH_KEY',         'Mu,@)6Y!T0DAq*BMr(=NOkT[WisSUgaGqoNI;B5T*:d3a*v&<H+NPGT+_e2SWG)`' );
define( 'SECURE_AUTH_KEY',  'zUHy[aRvn~CnAZwv-*7j^|cy}U`$oJ$s_k=<a%l}?<JBH16N};k=V{57v;I#$45m' );
define( 'LOGGED_IN_KEY',    'vEi1sp*1r0]*c)_*CaeTP-GL4^AT(X7``<yp1B3WE[7OS!]@{jd-uBjK&EP2t*g3' );
define( 'NONCE_KEY',        'UG}wxYN9$rOsqHbgGYj+NZQRK$27UQe*6/$o-(0rB<<eA=6)X}V=:nYA/UWS8@Lr' );
define( 'AUTH_SALT',        'S m>.Xz ?@YK^PgR1gQ$/[3l[)YiU24GjFr(aHf_9O[I~7;p[{!#tVQ~#![I1JPy' );
define( 'SECURE_AUTH_SALT', '5ii!;q ^u@e/#pDaB?IrnyKT<$;H$Q;5v7XjN3S 42b7t[L[P<V^E<UhjiM1 46<' );
define( 'LOGGED_IN_SALT',   '$gfIzuMhk-Nkek:&0JEA?;uP [O+ =RmaX:Q}w88,/Mu(f@a2Q=x;~x<8UZ7i(2B' );
define( 'NONCE_SALT',       'ue@u)i:rl&T<#s[iBu|keK]#cg~ MQ{QM Km.`6_+!|k7z/`._+<Veoj$PVI<SK}' );

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
