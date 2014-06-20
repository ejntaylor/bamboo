<?php

// get woocommerce version

function wpbo_get_woo_version_number() {
        // If get_plugins() isn't available, require it
	if ( ! function_exists( 'get_plugins' ) )
		require_once( ABSPATH . 'wp-admin/includes/plugin.php' );

        // Create the plugins folder and file variables
	$plugin_folder = get_plugins( '/' . 'woocommerce' );
	$plugin_file = 'woocommerce.php';

	// If the plugin version number is set, return it
	if ( isset( $plugin_folder[$plugin_file]['Version'] ) ) {
		return $plugin_folder[$plugin_file]['Version'];

	} else {
	// Otherwise return null
		return NULL;
	}
}

$woo_version = wpbo_get_woo_version_number();

// get WP version

global $wp_version;

// get theme information


	$child_theme = wp_get_theme('');
	$childVersion = $child_theme->get( 'Version' );
	//$childAuthor = $child_theme->get( 'Author' );

	if ($childVersion == 0) $childVersion = 'No Version Number';
	global $parent_theme_name;

	?>

<!-- HTML -->

	<h3>Theme Info</h3>

	<table id="site-info">
		<tr>
			<th></th>
			<th>Name</th>
			<th>Author</th>
			<th>Version</th>
		</tr>
		<tr>
			<td>Parent</td>
			<td><a href="<?php echo $parent_theme_name->get( 'ThemeURI' ); ?>"><?php echo $parent_theme_name; ?></a></td>
			<td><a href="<?php echo $parent_theme_name->get( 'AuthorURI' ); ?>"><?php echo $parent_theme_name->get('Author'); ?></a></td>
			<td><?php echo PARENT_VERSION; ?></td>
		</tr>

		<?php if (is_child_theme()) : ?>

		<tr>
			<td>Child</td>
			<td><a href="<?php echo $child_theme->get( 'ThemeURI' ); ?>"><?php echo $child_theme->get( 'Name' ); ?></a></td>
			<td><a href="<?php echo $child_theme->get( 'AuthorURI' ); ?>"><?php echo $child_theme->get( 'Author' ); ?></td></th>
			<td><?php echo $childVersion; ?></td>
		</tr>

		<?php else : ?>

		<tr>
			<td>Child</td>
			<td colspan="4"><em>No Child Theme Activated</em></td>
		</tr>

		<?php endif; ?>

	</table>

	<br />
	<hr>

<?php

$notavailable = 'Not Available';

	if (!function_exists('phpversion')) {
		$php = $notavailable;
	} else {
		$php = phpversion();
	}

	if (!function_exists('getMySqlVersion')) {
		$mysql = $notavailable;
	} else {
		$mysql = getMySqlVersion();
	}

	if (!function_exists('apache_get_version')) {
		$apache = $notavailable;
	} else {
		$apache = apache_get_version();
	}

		$plugins = get_option('active_plugins', array());

		$n = 0;
		foreach ( $plugins as $plugin ) {
			$n++;
		}


	echo '<h3>Site Info</h3>';


echo '<table><tbody>';
if ( WP_DEBUG ) { echo '<tr><td>Debug</td><td>Enabled - Site in Development <i class="fa fa-wrench"></i></td></tr>'; } else { echo '<tr><td>Debug</td><tr><i class="fa fa-globe"></i> WP Debug Not Enabled: Site Live</td></tr>'; }
echo '<tr><td>Bamboo Version</td><td>' . BAMBOO_VERSION_NUM .'</td></tr>';
echo '<tr><td>Wordpress Version</td><td>'. $wp_version . '</td></tr>';
if ($woo_version) echo '<tr><td>WooCommerce Version</td><td>'. $woo_version . '</td></tr>';
echo '<tr><td>Active Plugins</td><td>' . $n . '</td></tr>';
echo '<tr><td>Language</td><td>'. get_locale() . '</td></tr>';
echo '<tr><td>PHP Version</td><td>'. $php . '</td></tr>';
echo '<tr><td>MySQL Version</td><td>'. $mysql . '</td></tr>';
echo '<tr><td>Apache Version</td><td>'. $apache . '</td></tr>';
echo '<tr><td>WP Memory Limit</td><td>' . WP_MEMORY_LIMIT . '</td></tr>';



echo '</tbody></table>';

?>


<h3>Image Sizes</h3>

<?php

 function list_thumbnail_sizes(){
     global $_wp_additional_image_sizes;
     	$sizes = array();
 		foreach( get_intermediate_image_sizes() as $s ){
 			$sizes[ $s ] = array( 0, 0 );
 			if( in_array( $s, array( 'thumbnail', 'medium', 'large' ) ) ){
 				$sizes[ $s ][0] = get_option( $s . '_size_w' );
 				$sizes[ $s ][1] = get_option( $s . '_size_h' );
 			}else{
 				if( isset( $_wp_additional_image_sizes ) && isset( $_wp_additional_image_sizes[ $s ] ) )
 					$sizes[ $s ] = array( $_wp_additional_image_sizes[ $s ]['width'], $_wp_additional_image_sizes[ $s ]['height'], );
 			}
 		}
 
 		echo '<table><tbody>';
 		foreach( $sizes as $size => $atts ){
 			echo '<tr><td>';
 			echo $size . '</td><td>' . implode( 'x', $atts ) . "\n";
 			echo '</td></tr>';
 			
 		}
 		echo '</table></tbody>';

 }
 
    
    list_thumbnail_sizes();
    
    
  
  ?>


<?php do_action('info_panel_items'); ?>