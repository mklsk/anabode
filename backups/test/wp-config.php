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
define('DB_NAME', 'anabode_net');

/** MySQL database username */
define('DB_USER', 'anabode_net');

/** MySQL database password */
define('DB_PASSWORD', 'jUTotZo4');

/** MySQL hostname */
define('DB_HOST', 'anabode.net.mysql');

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
define('AUTH_KEY',         ',}c2!QOD7oBV^MHf<(B2fy14l~k6x74s&ZLLO#=dt.5p?`#0Z9||Thq=@3!fO=n:');
define('SECURE_AUTH_KEY',  '4R-f*Z1QHp6b!rzBwY..Sjf7p=H*&QO7LfhW/@iuJ#-,|<zOUJ75`a1FGGAG2M|G');
define('LOGGED_IN_KEY',    '[O`KS%|fH`Dwj?Zqz*Xie%gfiz;bC!sJ,i%o$:mUfqT}=Ts8jl0on-ifuCMw3cXQ');
define('NONCE_KEY',        'htrOk=q$H!jA_9OUHf?8MvZ_8^$T+U1!R/bcG96m;5T;nqSsICdaqjf<}M.I2=am');
define('AUTH_SALT',        'Y ^zn>}rC!}25E`DVPa(ik*;,^Vy4v6?.b8ZW/Ay8R|n2?r<:Aq.;gq#sG+cvDV8');
define('SECURE_AUTH_SALT', '24obCG$9@ISk.ycQo5o1,9WBb.j&UJC]d-uWHB5*QJO&6ZS4W{03v6a8:wPWJ9Tt');
define('LOGGED_IN_SALT',   '!cZe>AvNEnL;CzQ}c^u/Ew#/b.){ZRgg2`/DZPd|qWy&-hD)?OG!`(2,qfqy%m;n');
define('NONCE_SALT',       '{{$SnbhXsKM$.J{KZ>_e}cf :=?H`R3QLc5wlO9BIKWg{s E8Jtz#a[5)3%eVSa7');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wordpress_';

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
