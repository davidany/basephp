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
define( 'DB_NAME', 'newword' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'pass' );

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
define( 'AUTH_KEY',         'kZ@NLn4xLF@fEm[|eJ=!zY>hlCR=9Y]`1h$$z>B6&E<-+v^hG{1Khal@!X>&]8^(' );
define( 'SECURE_AUTH_KEY',  'VFzssKs-5sv8|?}!kCn9LvVT4HYWcCo4zDeZY|cAb}6[6Dkw&JZD`I~2B77Z6>@s' );
define( 'LOGGED_IN_KEY',    'YL+XwkNPGzD0SQR:O:&|4%h)?>LXX,y:j/lUMFf<fyso*L3|GU+W|EYU9_@g50dc' );
define( 'NONCE_KEY',        'SWa(^0*$]Y-m uN{cfhlBe2&5wf)^MavaS?uK $}^K{[<Y8/o52k4frX4e)bgzc#' );
define( 'AUTH_SALT',        ':QaB6_1WUM-5x}}SR#r5]6T}#qD}uH7-~;a[qUFZqJ*Pv:J>z}C((l|<(NU}T7Ey' );
define( 'SECURE_AUTH_SALT', 'w#G?yPpl-}6xajtYShII}=sn?BDE}+Ntm5.LRU1Q)kK)AwBD9ro!(kV/6p4Xhp+Y' );
define( 'LOGGED_IN_SALT',   'gbHPx` TrqMTYZZnIvtMRKmre3?GKP^2AMt,hVcIjQ[Xj<zFgK]1B3TIhm)EN*>_' );
define( 'NONCE_SALT',       '+r}^L^eJU}xCS|0z[{*UZJJcil;IO9r`]pw~J{%na>[s[O[a47uI]!_!qzsc7Jq,' );

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
