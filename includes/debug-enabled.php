<?php 
<<<<<<< HEAD
=======

>>>>>>> 14c24feae75fce7d829b8637caec7ef019e1eaba
/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
 
 
@ini_set('log_errors','On');
@ini_set('display_errors','on');
@ini_set('error_log', BAMBOO_PLUGIN_DIR . '/logs/php_error.log');
 
/**
 * This will log all errors notices and warnings to a file called debug.log in
 * wp-content (if Apache does not have write permission, you may need to create
 * the file first and set the appropriate permissions (i.e. use 666) ) 
 */
define('WP_DEBUG', true);
define('WP_DEBUG_LOG', true);
define('WP_DEBUG_DISPLAY', false);
@ini_set('display_errors',0);


?>