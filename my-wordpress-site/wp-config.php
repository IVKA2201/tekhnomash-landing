<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress' );

/** Database username */
define( 'DB_USER', 'wpuser' );

/** Database password */
define( 'DB_PASSWORD', 'Новый_надёжный_пароль' );

/** Database hostname */
define( 'DB_HOST', 'db:3306' );

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
define( 'AUTH_KEY',         '+RBLJkN7B# |.-B:v.<A9X:28L&]41%?)>,l5~v9OiW{?IkylA2/G@WyWTRxIBg<' );
define( 'SECURE_AUTH_KEY',  'L/baAju>(%CA~S*HFsxDeF/xzkdioK;c75kIvBn`WQMXBZ^,dKIghDm&9UY:JREk' );
define( 'LOGGED_IN_KEY',    'F`O^gPR(Rc!NNHnq&W>KTb&#VSSWfZvl4tzg0T/TBNn&=T?qY~]n 2>eo78kVzRP' );
define( 'NONCE_KEY',        'CPF}45D^u/FLN}Sb{AKT*_Kj+,[w%7;jZA_4@=l=,IIylk2>rXgBUv> @qp/@W9}' );
define( 'AUTH_SALT',        '-kpSRI:dtMe&fVc(xGMbWk+1*KTM}Kj<jen.h*Kel(y(2.ZLWk7kT[Znm^E*=RU5' );
define( 'SECURE_AUTH_SALT', 'e,?&Jzs)rjClF9ii|bmF]17N4fjQM8Pt2~xgj3|MXqT.SYY?Co%oCkEfLoQD+0s&' );
define( 'LOGGED_IN_SALT',   'x0h?D_5g07 J U_9=dTT.|QM)Kq,rm/1ykLlDra+yhFMJ=>liS(_;>zyL*qh<_V;' );
define( 'NONCE_SALT',       'O$UqBHS}zd1>M*n$~hZ4+R(5TR*qZ ^jSz,]K.d2G9(-YxeII`:Y*0qCe9g[$V<v' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */


define('FS_METHOD', 'direct');
define( 'WP_HOME', 'http://192.168.2.224' );
define( 'WP_SITEURL', 'http://192.168.2.224' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
