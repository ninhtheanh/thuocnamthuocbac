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
$domainName =  isset($_SERVER['SERVER_NAME']) && $_SERVER['SERVER_NAME'] != "" ? $_SERVER['SERVER_NAME'] : "" ;
if($domainName == "")
	$domainName =  isset($_SERVER['HTTP_HOST']) && $_SERVER['HTTP_HOST'] != "" ? $_SERVER['HTTP_HOST'] : "" ;
if($domainName == "localhost" || strpos($domainName, "127.0.0.1") !== FALSE)
{
	// ** MySQL settings - You can get this info from your web host ** //
	/** The name of the database for WordPress */
	define('DB_NAME', 'thuocnamthuocbac');
	/** MySQL database username */
	define('DB_USER', 'root');
	/** MySQL database password */
	define('DB_PASSWORD', '');
	/** MySQL hostname */
	define('DB_HOST', 'localhost');
	
	//define('WP_HOME','localhost:8080/Wordpress/thuocnamthuocbac/');
	//define('WP_SITEURL','localhost:8080/Wordpress/thuocnamthuocbac/');
}
else
{
	// ** MySQL settings - You can get this info from your web host ** //
	/** The name of the database for WordPress */
	define('DB_NAME', 'thuocnamthuocbac');
	/** MySQL database username */
	define('DB_USER', 'root');
	/** MySQL database password */
	define('DB_PASSWORD', '');
	/** MySQL hostname */
	define('DB_HOST', 'localhost');

	define('WP_HOME','http://dongydinhtuan.com');
	define('WP_SITEURL','http://dongydinhtuan.com');
}

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
define('AUTH_KEY',         '-z<?[Tu(4:BE B@2To*0I27h9|PJWPc N(h*Y0?hdqu6,p:%J+8h[L >lAPToJB1');
define('SECURE_AUTH_KEY',  'y,r1:*Kv+T~<6{TM:JrI_HR>cbBt~cdng|Bmca`<rs-JFgl|PO~h&Lq}:5)A<]lU');
define('LOGGED_IN_KEY',    'r[QS6k(VGS.~_4yJ0W7W#pVZuiWn<-@fr{NpI8$G.]Depqw,<5y~V->u_,08{M~#');
define('NONCE_KEY',        '(z55@!J|CktARgY6&hw r_o+y@_t6POoON)BtGKy~=}M?WU3[`P|$&!4m=%8aE%-');
define('AUTH_SALT',        'hOS^w=S3{lvv+MwDS+~GQ`e4hEQ{zf+*UT[P4?=!bBt]-VirfIQ`1) 6a jF=p7%');
define('SECURE_AUTH_SALT', '^]Ch-;t>l+c640KD||ic+mx( >$J_/Zo?6k,uZy+Ldyjd(x7!-#o @/Cm[S ,D@j');
define('LOGGED_IN_SALT',   'e-Gc|[%cW(T_v5Hxl<.;Rs+|tpBO)4 J%W;T,I}98[zq1<4^XEthj>sJ+7G&j QO');
define('NONCE_SALT',       '4@Rw-8=t>9Az-e|CzB|]GZp+`Pwcu8oa4.5{j,Kh7^E|SMp2W?NK5z9{8!eD|[xM');

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
