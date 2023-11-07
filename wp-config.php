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
define( 'DB_NAME', 'wp_practical' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

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
define( 'AUTH_KEY',         'fc}0S9R Ie0!6X9L/Hugzr:Bw/9qv.<7ldHDo mXa_o]./71zJ_u.rDl,xXW 7]7' );
define( 'SECURE_AUTH_KEY',  '3]Jkf|eNLj_;T9v{QYH<_cf`}~Uk(rj,`hjNs2t/-9mW6S@)^5z?:4@,-*GVYLf7' );
define( 'LOGGED_IN_KEY',    'AdK/*}e*Z=tQzu=k>A8qxt0#6E:NXJHZI$SCT~6Hbbhw[qoaw2#K#EVxQH_;j%Fh' );
define( 'NONCE_KEY',        '<t:W-b9y]pbhF)r@q,A[uEW-O.$W!<&;;J-).9Jxs4bm,NaG?Q6#O3:u hE<GiV)' );
define( 'AUTH_SALT',        'L$;$yDL9/fwv~g|AmgwzcEXGU%KkIq91-n:DME:)ym:LY)%(&#h&,?~vhVzRh)Ru' );
define( 'SECURE_AUTH_SALT', 'vl-#/mqUv;{F=Qx};;9f]BktttF)FJE}oyVt#k:PDjI578y_7=ozcwEzoP|P2=vc' );
define( 'LOGGED_IN_SALT',   'Eyg!3BgC:H{A;./TVw{Q-G2?gn;0$H<=?}@^P}PGS9v B*]W)nY^E@D6U@,e=3iU' );
define( 'NONCE_SALT',       'FQy5eaYH2RQ0YR{%5uc+,Sm+=Ts#o+,mezzJ+R4XW:98aNJ$z>O(>G(j[m%O:A;`' );

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
