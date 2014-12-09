<?php


// canvas enqueue


	$parent_theme = wp_get_theme();
	$parent_theme_dir = $parent_theme->get( 'Template' );
	$parent_theme_name = wp_get_theme($parent_theme_dir);
	$parent_theme_author = $parent_theme_name->get( 'Author' );

	
		if ($parent_theme_author == 'WooThemes') {	
		

add_action( 'init', 'bb_woo_enqueue', 25 );



function bb_woo_enqueue() {

		
			
			// wp_enqueue stylesheet for woo custom css
			if ( ! function_exists( 'woo_output_custom_css' ) ) {
				function woo_output_custom_css() {
					$theme_dir = get_template_directory_uri();
					if ( is_child_theme() && file_exists( get_stylesheet_directory() . '/custom.css' ) )
						$theme_dir = get_stylesheet_directory_uri();
			
			
					wp_register_style( 'woo-custom-css', esc_url( $theme_dir . '/custom.css' ), array(), BB_VERSION, 'all' );
					wp_enqueue_style( 'woo-custom-css' );
			
				} // End woo_output_custom_css()
			}
			
			add_action( 'wp_enqueue_scripts', 'woo_output_custom_css', 26 );
			
			
			
			
			




			

global $BambooPlugin;		
if ( $BambooPlugin->get_setting('disable_flex') != "yes") {			

	wp_register_script( 'flexslider', get_template_directory_uri() . '/includes/js/jquery.flexslider.min.js', array( 'jquery' ) );
	wp_enqueue_script( 'flexslider' );		
			}
			
			
		

	
} //bb_woo_enqueue



// wp_enqueue stylesheet for woo custom css
if ( ! function_exists( 'woo_output_custom_css' ) ) {
	function woo_output_custom_css() {
		$theme_dir = get_template_directory_uri();
		if ( is_child_theme() && file_exists( get_stylesheet_directory() . '/custom.css' ) )
			$theme_dir = get_stylesheet_directory_uri();


		wp_register_style( 'woo-custom-css', esc_url( $theme_dir . '/custom.css' ), array(), BB_VERSION, 'all' );
		wp_enqueue_style( 'woo-custom-css' );

	} // End woo_output_custom_css()
}

add_action( 'wp_enqueue_scripts', 'woo_output_custom_css', 26 );

			
	
		} // IF WooThemes






// wp_enqueue bamboo custom css

function bamboo_css() {



	
	global $BambooPlugin;		
	if ( $BambooPlugin->get_setting('disable_fontawe') != "yes") {		
	
		wp_register_style( 'font-awesome', '//netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.css', array(), BB_VERSION, 'all' );
		wp_enqueue_style( 'font-awesome' );
	}
	
	wp_enqueue_script("jquery-effects-core");

	// bamboo styles	
	wp_register_style( 'core-style', plugins_url( '../assets/css/core-styles.css' , __FILE__ ), array(), BB_VERSION, 'all' );
	wp_enqueue_style( 'core-style' );	


	if (defined('BAMBINO_INSTALLED')) {

	if (BAMBINO_VERSION_NUM > 1 && BAMBINO_VERSION_NUM < 1.2 ) {


	wp_register_style( 'woo-styling', get_stylesheet_directory_uri() . '/assets/css/woo-styling.css', array(), BB_VERSION, 'all' );
	wp_enqueue_style( 'woo-styling' );

	}
	
	// support for older (pre v.1) child themes
	
	if (BAMBINO_VERSION_NUM > 0.1 && BAMBINO_VERSION_NUM < 1 ) {
	
			wp_register_style( 'custom-styles', get_stylesheet_directory_uri() . '/assets/css/custom-styles.css', array(), BB_VERSION, 'all' );
			wp_enqueue_style( 'custom-styles' );
		
			wp_register_style( 'custom-main', get_stylesheet_directory_uri() . '/assets/css/custom-main.css', array(), BB_VERSION, 'all' );
			wp_enqueue_style( 'custom-main' );
		
			wp_register_style( 'custom-secondary', get_stylesheet_directory_uri() . '/assets/css/custom-secondary.css', array(), BB_VERSION, 'all' );
			wp_enqueue_style( 'custom-secondary' );
			
		}
		
	// Support for post 1.1 child themes
		
		elseif (BAMBINO_VERSION_NUM > 1 && BAMBINO_VERSION_NUM > 1.2 ) {
		
			wp_register_style( 'child_layout', get_stylesheet_directory_uri() . '/assets/css/layout.css', array(), BB_VERSION, 'all' );
			wp_enqueue_style( 'child_layout' );

			wp_register_style( 'child_styles', get_stylesheet_directory_uri() . '/assets/css/styles.css', array(), BB_VERSION, 'all' );
			wp_enqueue_style( 'child_styles' );
			
			wp_register_style( 'child_woocommerce', get_stylesheet_directory_uri() . '/assets/css/woocommerce.css', array(), BB_VERSION, 'all' );
			wp_enqueue_style( 'child_woocommerce' );
			
			wp_register_style( 'child_templates', get_stylesheet_directory_uri() . '/assets/css/templates.css', array(), BB_VERSION, 'all' );
			wp_enqueue_style( 'child_templates' );		
			
			wp_register_style( 'child_responsive_htabletplus', get_stylesheet_directory_uri() . '/assets/css/responsive-htabplus.css', array(), BB_VERSION, 'all' );
			wp_enqueue_style( 'child_responsive_htabletplus' );							

			wp_register_style( 'child_responsive_vtablet', get_stylesheet_directory_uri() . '/assets/css/responsive-vtablet.css', array(), BB_VERSION, 'all' );
			wp_enqueue_style( 'child_responsive_vtablet' );		

			wp_register_style( 'child_responsive_phones', get_stylesheet_directory_uri() . '/assets/css/responsive-phones.css', array(), BB_VERSION, 'all' );
			wp_enqueue_style( 'child_responsive_phones' );		
			
		}
		
		else {
				wp_deregister_style( 'woo-styling' );

		}
		
		} // bambino installed
		
	
	if ( WP_DEBUG ) {

	wp_register_style( 'custom-debug', plugins_url( '../assets/css/custom-debug.css' , __FILE__ ), array(), BB_VERSION, 'all' );
	wp_enqueue_style( 'custom-debug' );
    wp_register_style('BBgoogleFonts', '//fonts.googleapis.com/css?family=Raleway:400,900,100,200,300|Raleway+Dots');
	wp_enqueue_style( 'BBgoogleFonts');
	
	}


}

add_action( 'wp_enqueue_scripts', 'bamboo_css', 30 );



function bamboo_admin() {
	wp_register_style( 'admin-css', plugins_url( '../assets/css/admin.css' , __FILE__ ), array(), BB_VERSION, 'all' );
	wp_enqueue_style( 'admin-css' );
	wp_enqueue_script( 'admin-init', plugins_url( '../assets/js/jsbackend.js' , __FILE__ ), array('jquery'), null, true );

}

add_action( 'admin_enqueue_scripts', 'bamboo_admin', 30 );


add_action( 'wp_enqueue_script', 'load_jquery_assets' );

function load_jquery_assets() {
    wp_enqueue_script( 'jquery' );
    wp_enqueue_script( 'jquery-masonry' );
	wp_enqueue_script('jquery-ui-core');

}



function register_bamboo_js() {

	if (defined('BAMBINO_INSTALLED')) {
	wp_register_script('bambino-js',  get_stylesheet_directory_uri() . '/assets/js/jsgeneral.js', array('jquery'), BB_VERSION, true);
	}
	
		if ( WP_DEBUG ) {
			wp_register_script('jsadmin', plugins_url( '../assets/js/jsadmin.js' , __FILE__ ), array('jquery','jquery-ui-core','jquery-ui-draggable'), BB_VERSION, true);
			}

	wp_register_script('bamboo_general', plugins_url( '../assets/js/general.js' , __FILE__ ), array('jquery'), BB_VERSION, true);
	
	global $BambooPlugin;		
	if ( $BambooPlugin->get_setting('disable_modernizr') != "yes") {		
		wp_register_script('modernizr', plugins_url( '../assets/js/modernizr.js' , __FILE__ ), array('jquery'), BB_VERSION, true);
	}
	
	wp_register_script('print_debug_sizes', plugins_url( '../assets/js/debug-sizes.js' , __FILE__ ), array('jquery'), BB_VERSION, true);		
			

}

function print_bamboo_head() {
	if (defined('BAMBINO_INSTALLED')) {
		wp_print_scripts('bambino-js');
	}
		wp_print_scripts('bamboo_general');
		if ( WP_DEBUG ) { wp_print_scripts('jsadmin'); }


}


function print_bamboo_foot() {
	wp_print_scripts('modernizr');
}


add_action('init', 'register_bamboo_js');
add_action('wp_head', 'print_bamboo_head');
add_action('wp_footer', 'print_bamboo_foot');



if ( $BambooPlugin->get_setting('disable_prettyphoto') != "yes" ) {
	
	add_action( 'wp_enqueue_scripts', 'prettyphoto' );

	function prettyphoto() {

	
	wp_enqueue_script( 'prettyPhoto',  plugins_url( '../assets/js/jquery.prettyPhoto.js' , __FILE__ ), BB_VERSION, true );
	wp_enqueue_style( 'prettyPhoto_css', plugins_url( '../assets/css/prettyPhoto.css' , __FILE__ ) );
		
	}

	add_action ('wp_head', function() { echo '<style> $("a[rel^=\'prettyPhoto\']").prettyPhoto();</style>';  });

}

// remove version

function pu_remove_script_version( $src ){
    return remove_query_arg( 'ver', $src );
}

	if ( !WP_DEBUG ) {

add_filter( 'script_loader_src', 'pu_remove_script_version' );
add_filter( 'style_loader_src', 'pu_remove_script_version' );
}

?>