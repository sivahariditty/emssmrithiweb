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
define( 'DB_NAME', 'emssmrithi' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'VeebleMySQL' );

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
define( 'AUTH_KEY',         'jHs7tkpUE5l5ob>gWMq86Lm`uQp7D{j@21y?X|en4A={5i*dE3-PePkExu1U&ILd' );
define( 'SECURE_AUTH_KEY',  'Caxyg!dRu)23bjhcT0%R>m2 .tF2l:eq^sTI,O;{wChC0=z2_fM1YFp6n)qD9)LE' );
define( 'LOGGED_IN_KEY',    '@F1s8o JU4 ^_$hRtI3)0&N9K<)70Dm?>!rB5el|WU4GdT4Pp%Ann])MtF|<U9d@' );
define( 'NONCE_KEY',        'EPHm+IAMD,oLL,X{Y|{Hk<yX2[0._,-C5pQ!q*}`6x$&q*u-HQ#VzMfx%QE-lI l' );
define( 'AUTH_SALT',        '(1]K_:x%A&iU(o<,47/%fNq(}->lL3vzR{q-L vFQ|~/p}-E~/WKZ{^Z&+vFMF7j' );
define( 'SECURE_AUTH_SALT', '3J_3WlFh8%l,u+vO9nU8Ia2EytZ<yWJAsX !x)uce8Q!gX<297R<.%D7kCxp2=R<' );
define( 'LOGGED_IN_SALT',   '!c!U9$9O}/+-KhP`j ZH[>6sW5KiH~D$3ZHGOh%-YE,[|xZQEqF9>`q77Sh#}v;v' );
define( 'NONCE_SALT',       'UumeRIGrTuoL?``@/XbK_kmM-`;Z5&FVmA7!8TZR(jf|b+F0]1;;?Ia`D-nJh#o9' );

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
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
