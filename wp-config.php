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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress_local' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         ')uzag!Y[BCcBo0SDn#^e&7@13Qqa1GWd(|Hp[Kv.#{<59~:kr0O&wYsCJP:@QpQ}' );
define( 'SECURE_AUTH_KEY',  '9+OBO*[ZyXV>SD$0o >.8pUUF@d/3@Z]3lenM0t+!FMJV1gI=Ie<a4WMP,yTT8qW' );
define( 'LOGGED_IN_KEY',    '*:K_:+xTmC:SvC|vUS{#yk%WnGqh45kDHFKF?j@j= fFVvl)MZ2t$uEqo-IMC8B=' );
define( 'NONCE_KEY',        '`u/CCp#:#gpRH/8Dz-:*#+=%aP~fb@9Sp:LC#$_O3T?fDgPuran78q xp_c=b:H9' );
define( 'AUTH_SALT',        'Uip^sOghu(.%RNj4*dm{afURDA;&Vu&y}AEi=uu+r(S+NVPPcmR=u-50xKJ0;<Zz' );
define( 'SECURE_AUTH_SALT', '@r&=!^WkFR1Hd[Dh_-unA9WvK)(Qy|!VUmlo8P1rI>wcXs_{R:f]cv(@`2?*jggN' );
define( 'LOGGED_IN_SALT',   'XekW#ub8.#>#bX:I@=en( :Pb$pF;dJGFd6`4q_gGe^@SX@RG1Z%d<VSa3.m9>8p' );
define( 'NONCE_SALT',       '|L6h:G[lRH}l7#SqeNMaiX3=/<Y^]V2v/af&A(|x7324BiXi2pnMS8W9I(7aP~]=' );

/**#@-*/

/**
 * WordPress Database Table prefix.
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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
