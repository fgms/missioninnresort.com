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

define( 'WP_DEBUG', true );

// ** MySQL settings ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'staging_missioninnresort' );

/** MySQL database username */
define( 'DB_USER', 'staging_missioninnresort' );

/** MySQL database password */
define( 'DB_PASSWORD', 'staging_missioninnresort' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '=bBMc$?`zjM^KJ9wO#!>DMv}#uFHI@j|Ot&G<oph)B|G<hG,*KdzE9b^0Tl,E?Q/' );
define( 'SECURE_AUTH_KEY',  ')4>]}G2h0uF&02[`X[3OH}.!DJg<@@|X/-`TE{m&KWTTy>6+t&LU:|=l/~%:VPAp' );
define( 'LOGGED_IN_KEY',    'aQfy&Nc$CXicDfepj{10Pb8>m8 sg9U!-t-MBknbFNq``+:_.05=D#qcQU?xa8.5' );
define( 'NONCE_KEY',        'bO72tdb8I>tGVF;r]mE_#;F*jGuOcC |>{ FpKAgrXgyL-jWE]s_4kmXr|{dsfE@' );
define( 'AUTH_SALT',        'T%>;`}|8ooqMt-e%KcFNF#]5eteRKG8PpSa6SMkCf%n$U%ck4FwV@`6.$~-q#fUL' );
define( 'SECURE_AUTH_SALT', '`.6Y*ZszBm9ChTb<6g!c9|X1}j^~57Yv#K@rKn_#p0~z cWJ_8I@JgBNQ|_}h=r@' );
define( 'LOGGED_IN_SALT',   'NMJ.1q4*giS-9S9`gF?sesJzKPIPJd$$`|<oBRjzU+L3xY+231D0tAhZ5.I:M-Mv' );
define( 'NONCE_SALT',       '@S/:1srLsV-2t8VH$:!^lY_o5(vQdG,.4k0^l^4a+W%a1Nz]P[;v?YI(&Fr^&-Jb' );

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';




/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) )
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
