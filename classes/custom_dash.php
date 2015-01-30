<?php


/*
Version: 0.1
Author: Remi Corson
Author URI: http://remicorson.com


Main Class

*/

class rc_sweet_custom_dashboard {
	/*--------------------------------------------*
	 * Constructor
	 *--------------------------------------------*/
 
	/**
	 * Initializes the plugin by setting localization, filters, and administration functions.
	 */
	function __construct() {
	
		add_action('admin_menu', array( &$this,'rc_scd_register_menu') );
		add_action('load-index.php', array( &$this,'rc_scd_redirect_dashboard') );
 
	} // end constructor
 
	function rc_scd_redirect_dashboard() {
	
		if( is_admin() ) {
			$screen = get_current_screen();
			
			if( $screen->base == 'dashboard' ) {

				//wp_redirect( admin_url( 'index.php?page=dashboard' ) );
				
			}
		}

	}

	
	
	
	function rc_scd_register_menu() {
		add_dashboard_page( 'Welcome', 'Welcome', 'read', 'dashboard', array( &$this,'rc_scd_create_dashboard') );
	}
	
	function rc_scd_create_dashboard() {
	

		/** Load WordPress dashboard API */
		require_once(ABSPATH . 'wp-admin/includes/dashboard.php');
		
		wp_dashboard_setup();
		
		wp_enqueue_script( 'dashboard' );
		if ( current_user_can( 'edit_theme_options' ) )
			wp_enqueue_script( 'customize-loader' );
		if ( current_user_can( 'install_plugins' ) )
			wp_enqueue_script( 'plugin-install' );
		if ( current_user_can( 'upload_files' ) )
			wp_enqueue_script( 'media-upload' );
		add_thickbox();
		
		
		
		
		
		require_once( ABSPATH . 'wp-load.php' );
		require_once( ABSPATH . 'wp-admin/admin.php' );
		require_once( ABSPATH . 'wp-admin/admin-header.php' );

		require_once(BAMBOO_PLUGIN_DIR . '/templates/dashboard.php');

	}

 
}
 
// instantiate plugin's class
$GLOBALS['sweet_custom_dashboard'] = new rc_sweet_custom_dashboard();



?>