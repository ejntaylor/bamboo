<?php 
/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
 
 



define( 'WP_DEBUG', true ); // Or false
if ( WP_DEBUG ) {
    define( 'WP_DEBUG_LOG', true );
    define( 'WP_DEBUG_DISPLAY', false );
    @ini_set( 'display_errors', 0 );
	//@ini_set('error_log', dirname(dirname(ABSPATH)) . '/WP-Globals/logs/php_error.log');

	// set global mu-plugins directory
	define( 'WPMU_PLUGIN_DIR', dirname(dirname(ABSPATH)) . '/WP-Globals/mu-plugins' );

	//echo dirname(dirname(ABSPATH)) . '/WP-Globals/mu-plugins';
	
}



?>