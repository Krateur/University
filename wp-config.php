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
define('DB_NAME', 'university');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

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
define('AUTH_KEY',         '|Op9uYb:<!pt&=VI*z1i,xMrPOu2fPDs[;8H$m@rEl9Eq$;V*{:+]g.faQ1xis`B');
define('SECURE_AUTH_KEY',  ',~(f[@s|J_Wyo.B58O8.AS<C`]pX:9v]Rm_1p!4G:BNAuf|_0x0-42+t~H6:tQkl');
define('LOGGED_IN_KEY',    '%;y#V9>(^@u}8M>}1cY_(OumT)hHKz05w&BtM$~`e&CfQ@zLF1$F1{FR<qf^_vU8');
define('NONCE_KEY',        'ChuuIZ8+[7%m}^#d+`^yB0S!]@geas.Sr/Pd!$, C/ bSPl|CQkGD-SQ[/-fv$OC');
define('AUTH_SALT',        '<x>Pk^?t4@mf6{?9{@&l@,rb}suMnm2#FDZNG2Bc|szCIxzml/GC3yA8c^l2njMu');
define('SECURE_AUTH_SALT', 'ETYgAd*t-o@.1AmLI3:m|lw!^QzOz,mg^[vrS0S#i7G$kt[9}L(hlcrWi ;Vaw5I');
define('LOGGED_IN_SALT',   'i}u>bm@PseJzh;]nrjw%k8H-x pBWs,N46;s<Py&dNU^)K#P>e0HfL)wCJijZ1P(');
define('NONCE_SALT',       'NsRDO`7L>/7K);,Jq+Su.bq7u^NJzDHV^d[&b?1tSpl6GyW#HtHt5R+p4^mHQVYW');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
