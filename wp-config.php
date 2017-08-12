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
define('WP_CACHE', true); //Added by WP-Cache Manager
define( 'WPCACHEHOME', '/Users/tjrogers/Documents/01 websites/TJ Rogers Design WP/wp-content/plugins/wp-super-cache/' ); //Added by WP-Cache Manager
define('DB_NAME', 'tjrwpdb');

/** MySQL database username */
define('DB_USER', 'tjrwpuser');

/** MySQL database password */
define('DB_PASSWORD', 'tjrwp76');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '[lulxXj%xkQjrj&SdJ(VW@rSi5kVGObswczRH`+dC%n 0d},@Ywj^.^>[ENy)a3m');
define('SECURE_AUTH_KEY',  '^JVpQP%*/0wl5$Tb#eqhM5-[#4#KylkNm!N$t6(e9&Lh[Z.byL#kHCrr&NXk3Z%~');
define('LOGGED_IN_KEY',    '*_}<2JT>_|Euwo}O)U?{im$kT?kTqX~ziWcSEb`)U3.Wa,HlOwovp=T8R0fQOoiv');
define('NONCE_KEY',        'yS-~1Zi.ZW0Gb[R05O|pYy-QEI4>vze]n<&3i~M6;.ymFoI73MlqkXZl<nK_)*f.');
define('AUTH_SALT',        'Z1e5,:@/cLwJ-;UQevF1ll`(]$3I8I0s<}6FSQ=T@d!|/:npU=7il/vFSb[qH9J}');
define('SECURE_AUTH_SALT', '<V]h94O?WlsP~OiO$66w|E@!j Em@gv=%K}xcfD*jTWrZ6cnhlPO- (.UVxVVbTc');
define('LOGGED_IN_SALT',   '@al;7gz`HoFlc%A)YQg8Fx<_|?Tq@>W#PZz:|<K{W&3Z;djNYW:EUg1jiQ-o|mVw');
define('NONCE_SALT',       '@;]1E.5-QKB9V%cIsORI/=PH2%Q1<D2)F:8+bFsx6WwVv:#;(Q7e!aAm.Emb<>:/');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wptest_';

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
