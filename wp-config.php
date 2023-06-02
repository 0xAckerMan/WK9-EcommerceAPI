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
define( 'DB_NAME', 'assessment9' );

/** Database username */
define( 'DB_USER', 'admin' );

/** Database password */
define( 'DB_PASSWORD', 'admin' );

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
define( 'AUTH_KEY',         'FU$af57V!P86ZNzdQQk(B=H(39$hydN+v~VD/A(}y9bmzQP_y.y%Nt$-)F1wk#g9' );
define( 'SECURE_AUTH_KEY',  'ru2Lm>BV;63^2%![hYGv^lWrTakW)1mbA~)4Nt0uhmtZh=*SJ4nRhHO/}@A40;Zf' );
define( 'LOGGED_IN_KEY',    'HUD9~$xlNqI(>6x3HReMP61SQPVMxn*)k)CD^f*~f>wY}4Fk=9u|M=J~uj@j#m=i' );
define( 'NONCE_KEY',        '28Ambjg@*Bna-xV4w_vFv7bN}0K<G%h%{w$&}ZHIhu*vK7Xd=jT[.:(y[S9&n|?;' );
define( 'AUTH_SALT',        'oQRQJ~2%g2OL3Q=V!aR$LH`~]!T}6]fWsdUTLdf:F_cLJA(qZ1$g-i,dW&|h!3=F' );
define( 'SECURE_AUTH_SALT', '#3qGtxSk@m1Dbli;oJ7PY2X9umT+z&O~]x!1`q:Va2xcjx9n&U;P7]Zc G;xL#AC' );
define( 'LOGGED_IN_SALT',   ' +$$4Cq5P|5{@c{L0*2Ezabl;iAO /SRHQfBu$1r5z&~gZeNk*wW0f^pm>CUKT/T' );
define( 'NONCE_SALT',       'KYecTdvGPl~e^>N:%:T;Qp97IC<qtti1?5&nt9MuPyb6lYoP*$QC#e#^u&M&=!~K' );

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
define( 'WP_DEBUG', true );

/* Add any custom values between this line and the "stop editing" line. */
define('JWT_AUTH_SECRET_KEY', 'djkashkjfhkjhjnfhjhfjkvjhccnajhkdfhjk');



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
