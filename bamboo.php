<?php

   /*
   Plugin Name: Bamboo
   Plugin URI: http://raison.co/bamboo
   Description: Strong, Light and Flexible Development Framework for Wordpress
   Version: 1.2.9
   Author: Raison
   Author URI: http://raison.co
   License: GPL
   Copyright: Raison Online LTD.
   Text Domain: bamboo
   @GitHub Plugin URI: https://github.com/raisonon/bamboo
      
   */


if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly 






// set paths

define('BAMBOO_PLUGIN_NAME', trim(dirname(plugin_basename(__FILE__)), '/'));
define('BAMBOO_PLUGIN_DIR', plugin_dir_path( __FILE__ ));
define('BAMBOO_PLUGIN_URL', dirname(__FILE__));

define('PARENT_THEME_DIR', ABSPATH . 'wp-content/themes/' . get_template());





// set version from plugin version

function plugin_get_version() {
	if ( ! function_exists( 'get_plugins' ) )
		require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
	$plugin_folder = get_plugins( '/' . plugin_basename( dirname( __FILE__ ) ) );
	$plugin_file = basename( ( __FILE__ ) );
	return $plugin_folder[$plugin_file]['Version'];
}


// set plugin parent info

if (!defined('PARENT_THEME'))
    define('PARENT_THEME', get_template());


$parent_theme = wp_get_theme();
$parent_theme_dir = $parent_theme->get( 'Template' );
$parent_theme_name = wp_get_theme($parent_theme_dir);
$parent_theme_author = $parent_theme_name->get( 'Author' );
$parent_theme_version = $parent_theme_name->get( 'Version' );

if (!defined('PARENT_AUTHOR'))
    define('PARENT_AUTHOR', $parent_theme_author);

if (!defined('PARENT_VERSION'))
    define('PARENT_VERSION', $parent_theme_version);





// set bamboo version

//define('BAMBOO_VERSION_KEY', 'BAMBOO_VERSION');
define('BAMBOO_VERSION_NUM', plugin_get_version());
add_option('BAMBOO_VERSION_KEY', 'BAMBOO_VERSION_NUM');


// get non-bambino theme info


function bambino_check() {


	if (!defined('BAMBINO_INSTALLED')) {
		$nonbb_currentheme = wp_get_theme();
		define('BAMBINO_VERSION_NUM', '0.11');
		define('BAMBINO_INSTALLED', false);

		if (empty($nonbb_currentheme)) { define('NONBB_VERSION_NUM', $nonbb_currentheme->get( 'Version' )); }
		else {define('NONBB_VERSION_NUM', 'na');}
	}

}

add_action ('after_setup_theme','bambino_check');



// debug version logic

if ( WP_DEBUG ) {define( 'BB_VERSION', time() );}
else {define( 'BB_VERSION', 'BAMBOO_VERSION_NUM' );}





// classes

require_once('classes/custom_dash.php');			// custom dashboard



// simple settings

if ( ! class_exists('WordPress_SimpleSettings') )
	require( BAMBOO_PLUGIN_DIR . '/classes/wordpress-simple-settings.php');

class BambooPlugin extends WordPress_SimpleSettings {
	var $prefix = 'bamboo'; // this is super recommended

	function __construct() {
		parent::__construct(); // this is required

		// Actions
		register_activation_hook(__FILE__, array($this, 'activate') );
	}




	function activate() {
		$this->add_setting('beta_items', 'no');
		$this->add_setting('enable_woo_custom_css', 'no');
		$this->add_setting('disallow_unauth', 'no');
		$this->add_setting('disallow_emails_enable', 'no');
		$this->add_setting('disallow_emails_address', get_bloginfo( 'admin_email' ));
		$this->add_setting('disallow_count', '0');
		$this->add_setting('disable_prettyphoto', 'no');
		$this->add_setting('disable_flex', 'no');
		$this->add_setting('disable_modernizr', 'no');
		$this->add_setting('disable_fontawe', 'no');
		$this->add_setting('remove_woo_nav', 'no');


	}
}


$BambooPlugin = new BambooPlugin();



// require php files

require_once('includes/templates.php');				// custom templates
require_once('includes/enqueue.php');				// javascript and css
require_once('includes/media.php');					// media sizes and upload limits
require_once('includes/general.php');				// general customisations

function bb_plugins_loaded() {
	require_once('includes/tools.php');					// admin menu
	
	// set debug
	// global $BambooPlugin;		
	// if ( $BambooPlugin->get_setting('debug') != "no" && !WP_DEBUG) require_once('includes/debug.php');	

}

add_action('plugins_loaded','bb_plugins_loaded');





?>