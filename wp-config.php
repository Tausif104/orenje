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
define( 'DB_NAME', 'orenje' );

/** MySQL database username */
define( 'DB_USER', 'orenje' );

/** MySQL database password */
define( 'DB_PASSWORD', 'orenje' );

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
define( 'AUTH_KEY',         '.O<xITRIRyB)>5)[&dUC@iJ?7Fy|j`Gg{B@=jPyeO%ZtYd6tS6Zsa*a9mx[CsTt#' );
define( 'SECURE_AUTH_KEY',  '}]o xTLQ(wF~obJj>Chb|o(}qfNr74FZA9`-V(aoNn.SBb3:zM*$bg5eS0aFJA>N' );
define( 'LOGGED_IN_KEY',    ':#o UJbW/NT3Rmh-e}7#I8sN_?yVP`[w.cG@tQYap+wFT7k0<{2_6mB085dwaxi|' );
define( 'NONCE_KEY',        '`9pM}c^(0K I!yAoLD#00jFDGK8loqQ<.2wMLGjY*><.s27Myf#MKUj$!0uUmG)L' );
define( 'AUTH_SALT',        'xAvA<o?HEsxz_*2UCR!^j3i,&8Bb%A/?LPi$PnGRWh7atSbl6iMZaC=7mk;R(|p6' );
define( 'SECURE_AUTH_SALT', 'KD$j:j]QmRQ%T9e(RkxHh1EIjbiKY!=P;2}(o )bE?)z2{b,2YV}A:h3<-*g(WD:' );
define( 'LOGGED_IN_SALT',   '+w-)h`5_Y-sKWwP>Q$S?2:]FkEW=X%2/8C!PdAFf?gYOl/;B^n@x58qk=h(Oma.O' );
define( 'NONCE_SALT',       'DPWFgsAw4vJhtL#=b#OaeV_F;-TP0T^>!_Go.D9~PdHg$v )Wl.=Kcz2C?3+, Mv' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'orenje_';

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
