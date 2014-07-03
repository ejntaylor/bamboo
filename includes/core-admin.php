<?php
/*
Version: 0.1
Author: Remi Corson
Author URI: http://remicorson.com

*/




/*
|--------------------------------------------------------------------------
| MAIN CLASS
|--------------------------------------------------------------------------
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

				wp_redirect( admin_url( 'index.php?page=dashboard' ) );
				
			}
		}

	}
	
	
	
	function rc_scd_register_menu() {
		add_dashboard_page( 'Your Dashboard', 'Your Dashboard', 'read', 'dashboard', array( &$this,'rc_scd_create_dashboard') );
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






// Remove Dashboard widgets

add_action('wp_dashboard_setup', 'my_custom_dashboard_widgets');

function my_custom_dashboard_widgets() {
	global $wp_meta_boxes;
	//Right Now - Comments, Posts, Pages at a glance
	unset($wp_meta_boxes['dashboard_page_custom-dashboard']['normal']['core']['dashboard_right_now']);
	//Recent Comments
	unset($wp_meta_boxes['dashboard_page_custom-dashboard']['normal']['core']['dashboard_recent_comments']);
	//Incoming Links
	unset($wp_meta_boxes['dashboard_page_custom-dashboard']['normal']['core']['dashboard_incoming_links']);
	//Plugins - Popular, New and Recently updated WordPress Plugins
	unset($wp_meta_boxes['dashboard_page_custom-dashboard']['normal']['core']['dashboard_plugins']);

	//Wordpress Development Blog Feed
	unset($wp_meta_boxes['dashboard_page_custom-dashboard']['side']['core']['dashboard_primary']);
	//Other WordPress News Feed
	unset($wp_meta_boxes['dashboard_page_custom-dashboard']['side']['core']['dashboard_secondary']);
	//Quick Press Form
	unset($wp_meta_boxes['dashboard_page_custom-dashboard']['side']['core']['dashboard_quick_press']);
	//Recent Drafts List
	unset($wp_meta_boxes['dashboard_page_custom-dashboard']['side']['core']['dashboard_recent_drafts']);
	//Recent Activity
	unset($wp_meta_boxes['dashboard_page_custom-dashboard']['normal']['core']['dashboard_activity']);

}





// Add Menu Items
function bamboo_options_panel(){
  add_menu_page('', 'Bamboo', 'manage_options', 'bamboo_options', 'bamboo_options', null, 3.12);
  
  // add sub-menus
  add_submenu_page( 'bamboo_options', 'General', 'General', 'manage_options', 'bamboo_options');
  add_submenu_page( 'bamboo_options', 'Settings', 'Settings', 'manage_options', 'bamboo-settings', 'bb_func_settings');
  add_submenu_page( 'bamboo_options', 'Reference Links', 'Reference Links', 'manage_options', 'bamboo-ref', 'bb_func_ref');

}

add_action('admin_menu', 'bamboo_options_panel');



// Menu Items

function bb_func(){
                echo '<div class="wrap"><div id="icon-options-general" class="icon32"><br></div>
                <h2>Theme</h2></div>';
}

function bb_func_settings(){
                echo '<div class="wrap"><div id="icon-options-general" class="icon32"><br></div>
                <h2>Settings</h2></div>';
				require_once('menu-settings.php');

}




function bb_func_ref(){
                echo '<div class="wrap"><div id="icon-options-general" class="icon32"><br></div>
                <h2>Reference Links</h2></div>';
                
				require_once('menu-ref.php');

}


function bamboo_content(){
                echo '<div class="wrap"><div id="icon-options-general" class="icon32"><br></div>
                <h2>Bamboo Content</h2></div>';
}




// Define new menu page content
function bamboo_options() {

				require_once('menu-general.php');

}; 


?>