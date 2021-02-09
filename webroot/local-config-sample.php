<?php

// Declare if we're developing locally
# define( 'WP_LOCAL_DEV', true );

// Database constants
define( 'DB_NAME', 'wp_concertai' );
define( 'DB_USER', 'root' );
define( 'DB_PASSWORD', 'root' );
define( 'DB_HOST', 'localhost' ); // Probably 'localhost'
define( 'WP_ENVIRONMENT', 'LOCAL');

// ==============================================================
// GENERATE THESE SALTS!!!
// Grab these from: https://api.wordpress.org/secret-key/1.1/salt
// ==============================================================
define('AUTH_KEY',         NULL);
define('SECURE_AUTH_KEY',  NULL);
define('LOGGED_IN_KEY',    NULL);
define('NONCE_KEY',        NULL);
define('AUTH_SALT',        NULL);
define('SECURE_AUTH_SALT', NULL);
define('LOGGED_IN_SALT',   NULL);
define('NONCE_SALT',       NULL);



// Custom table prefix
# $table_prefix  = 'wp_';

// Loopback connections can suck, disable if you don't need cron
# define( 'DISABLE_WP_CRON', true );

// You'll probably want Automatic Updates disabled during development
# define( 'AUTOMATIC_UPDATER_DISABLED', true );

// You'll probably want debug logging during development
# define( 'WP_DEBUG_LOG', true );