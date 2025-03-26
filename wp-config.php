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
define( 'DB_NAME', 'semenov_49624' );

/** Database username */
define( 'DB_USER', 'semenov_49624' );

/** Database password */
define( 'DB_PASSWORD', '50af6f6764ae5140e7ae' );

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
define( 'AUTH_KEY',         'B0km>N;R{5F=kHA_`+C+4D,;/W9bvm7OP!;O*`h${Xs!i`=R1).^a$IyrX78a2!$' );
define( 'SECURE_AUTH_KEY',  '~EMc<$h_4NyD,uDc>.|A|3K-zJc!ztG)Aj]l5OHG9cW}>qgIR=/c?;ZBO;7bSA/?' );
define( 'LOGGED_IN_KEY',    'W( .s&s5xzJpu2Sn6Kd!w{a#Et}pS_}pFQE6skAZp!apZ^DF}{ylU:m?27luy=L|' );
define( 'NONCE_KEY',        'ZzjJU/05s|7zwW4*D:A7=,Sbxpq2jWIj`lDg=P*lve%y?(x7]:rg|p[4,Ap90D@f' );
define( 'AUTH_SALT',        'c(f{x-pZ@=na+|oqeX jf`R(vX6x]2|e62f*6eb|kdY&$>(>@DOO1wA!z7%PNZ?v' );
define( 'SECURE_AUTH_SALT', 'U?P&etNEg@}^d=6^/2Eqhu$*2}4WRo.`qf&vn[zNz-J.lYg,H9T2iKFeAgU8UEqG' );
define( 'LOGGED_IN_SALT',   'hv@Mn1<Tymq[@>]?bRK|Obbh6VOGX_r{5V|@,z,aP=FD))D]ecb0(5/B,yn,wD_r' );
define( 'NONCE_SALT',       '|ySoM-nI_?(@!qfyk2c![+6s#YcP}Pva}8ZaAKh5Oaf`&l1ek;]6*j,hszk2Fab/' );

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
$table_prefix = 'wp_Xy89E_';


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



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';