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
define('DB_NAME', 'wordpress');

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
define('AUTH_KEY',         '!.[CR,GA&6-0*z:a_.z9gm.fs)yOC)2Ww5,h9yiD!^Na9uj.1K&[$UA{,P{,8V?/');
define('SECURE_AUTH_KEY',  ']$&w6Kd4J!_f$,RIbM;R6&vb^Yy`lY`=j~3C-Qa7&Wm%9MsO13>50Iz5A0biviYK');
define('LOGGED_IN_KEY',    '!NWADfZ?vFc-AKhy:hdt$O.((%?j];GP<9&Z5K2aM3=/LvWLLrAU:L8iCiIOl%%`');
define('NONCE_KEY',        'GL%[K4#VfR&i8d SSk}Th3- XsA[jgp1Zmuj+ x0pTF*TZ#o6l{Ca wkje8}}5.F');
define('AUTH_SALT',        ']OS`6KbFik`J$]`Q7JbmVasvP!mevzs&G8nma @R{7q+1Ou!@> 9RF4h`Wh[BSN:');
define('SECURE_AUTH_SALT', 'n*jELLc^Tb4_cgzr;Y$m5dywqkhvg38y%deqmSESjP=>[7Yt#U+&u+nCI,n/P?J^');
define('LOGGED_IN_SALT',   'I_6$i@*W4m%I&F8WMa.(Ws@S,~iL577^fALnJc#:f<ru;@y+++s:D>q=O5f##bf<');
define('NONCE_SALT',       '-_gX%]*8{U{u-c_C=/PD]};(u~cTRu(K>rI|P}fP1cSRk3ru7)i/KsX/f*a;8CN0');

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
define('WP_DEBUG', true);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
