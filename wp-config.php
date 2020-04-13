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
define( 'DB_NAME', 'unity_db' );

/** MySQL database username */
define( 'DB_USER', 'liakut' );

/** MySQL database password */
define( 'DB_PASSWORD', 'liakut' );

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
define( 'AUTH_KEY',         'ti>,Xsk6E=ze?M2Sm#+oWXuJcYj/a5%U-JD$.J7lz*/ Rv=lSx|?Fxl`U[Me6%~K' );
define( 'SECURE_AUTH_KEY',  '5<xuaCa2dkPWo![8z}gvtgTB^gN|Y#JOzl-IRy`zs[+HPs$qs?)LS@<Be+#9k.A9' );
define( 'LOGGED_IN_KEY',    'IZ,Kn^AAE)(H%HXfllrQqd;0zp}2P<bVTd&*fO/V&Iu &ngWK)tw&>*][dSgEc<m' );
define( 'NONCE_KEY',        '3V#0UQb8D@X>I?>U,hwr,Lt>b@vCQuTV*DYG}U~xqLcs2@3Z)l!bT<mFavxr7}C4' );
define( 'AUTH_SALT',        '=cr;?<wRsGt1BCFrmGC1`Y ?>S(d#(VbGQ#O9r]-2C&0wsV{LFBg**qucxE`@v%L' );
define( 'SECURE_AUTH_SALT', 'ZJR?R[@Nr_pOAITUr*g)z0y~K]Ft9VGtoKU^vO #d` K-x0Fp02B/X{J~,qhX}/n' );
define( 'LOGGED_IN_SALT',   '77-7+2:OBgDLz4EXRUh*GrQ,O Y>:V*;Nmvvd7)qC^Gd&xHeOa5*ece6xIh6HBf$' );
define( 'NONCE_SALT',       'U/JbRWIShg]lsjzQ(m#D1]hb.C#y-0i/FB04n5<)>xLq}j2?LIk|h0B(k-u+@mr{' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'ut_';

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
