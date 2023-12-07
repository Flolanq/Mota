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
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}


define('AUTH_KEY',         'L/M+kq8FMOwF+eTvscsM+6WZRjYmj0UiOrKTNttgxWe2KMtfd4TboU7nFNiQURo1xrGwd8bJMeHvqL3E7eW1BQ==');
define('SECURE_AUTH_KEY',  '00jkhUMmkTYGmOUP0NHCBpeftctZDeCAWTHRdX3+cs96h75n6MLuv92KaqicsBVQrAl26c6YibilhhuKd7K8vA==');
define('LOGGED_IN_KEY',    'nUh+rX2zxyMcH0obn1toYJipQDx1SaYtOYMI/FNOLo1bzskJuByFMu90HKbirAieX+2ilWplUBalqzf3OcMpNw==');
define('NONCE_KEY',        '6dSZZf+skguLEe8Jwruv2wJO3SdaabFwxxLVgdmj0CkDGcazffCv3GT7EfPlQM/ZwSNhgTuwjjt7LCxKNJD2qQ==');
define('AUTH_SALT',        'cxDlaQSHful4iC2cDJx7reLFzrt+5dYwEeDxYh+NhiJsLgsNPAv7dcLbZScbwqUksZ+WYQDvrblphTS1bYZ7VA==');
define('SECURE_AUTH_SALT', '4u7AdEQauItY7fGQici7/dYFZ3NN2hqA7un9Mn5uGo2zPQuPWro6txpGteg4brXxxsW7Q6iG2TuB1+Lup3Z/9A==');
define('LOGGED_IN_SALT',   'yDJoGW7KG1uqLYjocOKva6uvbLDmn3V2ThP1T/zYVIcHNDJ/iAjteejTDqRw82DufW/0d0MkBIrdFaDDDTliLA==');
define('NONCE_SALT',       'npjm5gYbHxdLMQyzAlgzcyr8KWkLEtQjtxOyU0rmyi6c0uLIZurFFGsAkNhx8a31Q6/3hEl3an4H5iNbv7iqPQ==');
define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
