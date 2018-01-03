<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'staging_missioninnresort');

/** MySQL database username */
define('DB_USER', 'staging_missioninnresort');

/** MySQL database password */
define('DB_PASSWORD', 'staging_missioninnresort');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         'H:]gz!|LCh-juI9GL`A9N)&:-0k2hA/-M@F6D^3M]@7*<)#5(_=),vGAKSc=wD}r');
define('SECURE_AUTH_KEY',  'LiN7nchM(LCxncoU5;-hN#DHN~rw x~dm@-7k%ld_2`|IfmAEXD0#6-}115Ee2rC');
define('LOGGED_IN_KEY',    'j5:k1OM];jAa+~|$iQD3FI[m!4whV*57P[)FuB.O&]e0>!&wF}aSZ2&_+1)u`cr.');
define('NONCE_KEY',        'fos|P&X_ity-w&]_w51+HbE]f#*has31~>><[cF>TQ[Zln-+ ~8IaIV[w[J@Szi(');
define('AUTH_SALT',        'U#taptk)J8Za:klq[+Y@.9Ta(V ;zJiWkrn9q<VG$X!@)7qBJ<=gJj7C4bnl[J=p');
define('SECURE_AUTH_SALT', '?|Jr?-yW#wpIgu)+-PD:N$,4=ZJVd($H*<O4B}1@6Icj6y+LDGodmC9M9g|V&__,');
define('LOGGED_IN_SALT',   'X] C+-0e=2%WSA4i]HXt+Ra{Z!|%M<yHB6c!MN@J+@pUCv>*9C^E%=P>o~G{u0p ');
define('NONCE_SALT',       '|G<)eHF/?T&OHgZPn)pQrt5C6$xFiV2B[f]gO#uTTo9&IJf@sM742Dr;-PPkD@M1');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
