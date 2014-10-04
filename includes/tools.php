<?php

// add css media queries to page bottom
if ( WP_DEBUG && current_user_can( 'manage_options' )  ) {
	add_action ('wp_head','custom_debug_top', 100);
}

function custom_debug_top() { ?>


<div class="debug-screen-size">
<div class="element-hover"></div>

	<ul>
		<li class="debug-size size-1140px">Large Screen 2 | min-width: 1140px | 1140px</li>
		<li class="debug-size size-1025px">Large Screen 1 | (min-width: 1025px) and (max-width: 1139px) | 1025px</li>
		<li class="debug-size size-960px">Horizontal Tablet | (min-width: 960px) and (max-width: 1024px) | 960px</li>
		<li class="debug-size size-768px">Vertical Tablet | (min-width: 768px) and (max-width: 959px) | 768px</li>
		<li class="debug-size size-480px">Horizontal Phone | (min-width: 480px) and (max-width: 767px) | 480px</li>
		<li class="debug-size size-320px">Vertical Phone | (max-width: 479px) | 320px </li>
		<li class="debug-size actual-size"><span id="jqWidth">0</span>px, <span id="jqHeight">0</span>px</li>
	</ul>



</div>


<?php }




// Style Switcher

if ( WP_DEBUG && current_user_can( 'manage_options' )  ) {
	add_action ('wp_head','style_switch', 150);
}

function style_switch() {

//if (get_template_directory_uri()  != get_stylesheet_directory_uri() ) $child_active = true;


	?>
	
	

	
	<div id="sideWrapper" class="ui-widget-content">
		<div id="innerSideWrapper">
		
		<i class="fa fa-angle-right slidetoggle-open slidetoggle"></i> <!-- // Open Icon -->
		<i class="fa fa-angle-left slidetoggle-close slidetoggle"></i><!-- // Close Icon -->
			<div class="switchNav">
						<?php switch_menu_start(); ?>

						<i class="styles fa fa-pencil  <?php global $switch_overwrite; if ($switch_overwrite !=true) echo 'active'; ?>"></i>
						<i class="styletheme fa fa-th-list"></i>
						<i class="jsprint fa fa-coffee "></i>
						<i class="hooks fa fa-dot-circle-o "></i>


						<?php switch_menu_end(); ?>

			</div>
			
			<div id="switchWrapper">
			
			<div class="styletheme">
			
				<i class="fa fa-cogs" title="Show Advanced CSS Output"></i> 
				
				<div class="stylesBasic stylesToggle">
						<?php if (is_child_theme()){	?>		
						
										<div class="switchChildlist">
										<h3>Child CSS Printout</h3>
											<div class="scroll">
													<table></table>
												</div>
											</div>
						<?php } ?>
						
										<div class="switchParentlist">
										<h3>Parent CSS Printout</h3>
											<div class="scroll">
													<table></table>
												</div>
											</div>
				</div>
				
				<div class="stylesAdvanced stylesToggle" style="display:none;">
					<div class="styleprint">
					<h3>All CSS Printout</h3>
						<div class="scroll">
							<table></table>
						</div>
					</div>
				</div>

			</div> <!-- // Stylesheet Printout -->

									



<?php switch_menu_items_start(); ?>
<div class="styles" <?php global $switch_overwrite; if ($switch_overwrite !=true) echo 'style="display:block"'; ?>>

				<h3>Styles Debug</h3>

<ul>

<li><a href="javascript:void(0)" class="stylesCSSToggle"><i class="fa fa-bullseye"></i><span>Element Detector Toggle</span></a></li>
<li><a href="javascript:void(0)" class="ajaxload"><i class="fa fa-mobile"></i><span>Responsive Screen Tester</span></a></li>
<li><a href="javascript:void(0)" class="hideOverlays"><i class="fa fa-moon-o"></i><span>Hide Overlays</span></a></li>
</ul>


<hr>

				<h3>Templates</h3>


<?php

// get theme templates

    $theme = wp_get_theme();
    $templates = $theme->get_page_templates();
    $current_template = basename(get_page_template());

    echo '<table><tbody><tr><th>File Name</th><th>Name</th></tr>';

    foreach ( $templates as $template_filename => $template_name )
    {
		$template_class = '';
    	if ($current_template == $template_filename ) {$template_class = 'class="current"';}
        echo '<tr '. $template_class .'><td>'. $template_filename . '</td><td>'.$template_name.'</td></tr>';
        unset($template_class);
    }


    echo '</table></tbody>';

?>


</div> <!-- // Styles -->
			
			
			<div class="hooks">
			<i class="fa fa-angle-left slidetoggle-close slidetoggle"></i>
					<h3>Hooks Debug</h3>
				<?php $hookIcon = '<i class="fa fa-check-square-o"></i>'; ?>

				
				<form>
				
				<select name="debug_hooks">
				<?php $hooks = "";
						if (isset($_GET['debug_hooks'])) {
							$hooks = $_GET['debug_hooks'];
						}
				?>
				
					<option value="none" <?php if ($hooks == "" ) {echo 'selected="selected"';} ?> >Hide All Hooks</option>
					<option value="woo_all" <?php if ($hooks == 'woo_all' ) {echo 'selected="selected"';} ?>>All Woo Hooks</option>
					<option value="woo_framework" <?php if ($hooks == 'woo_framework' ) {echo 'selected="selected"';} ?>>Woo Framework Hooks</option>
					<option value="woo_commerce" <?php if ($hooks == 'woo_commerce' ) {echo 'selected="selected"';} ?>>WooCommerce Hooks</option>
					<option value="all" <?php if ($hooks == 'all' ) {echo 'selected="selected"';} ?> >All Hooks</option>

				</select>
				<br />
				<br />
				<input type="submit" value="Go" />
		
				</form>
				
				
			
			
			</div> <!-- // Hooks -->
			
			
			<div class="jsprint">
				<h3>JS Printout</h3>
				<div class="scroll">
				<table>
					<th>#</th><th>File</th><th>Version</th>
					
				</table>
				</div>
				
			</div> <!-- // JS Printout -->		
			
		</div>	<!-- // switchWrapper -->
			
		</div> <!-- // sideWrapper -->


	
</div>	
	
	
		
	<?php

}	 



// 

function screen_size_div() {
	?>
	<div class="screen_size_div"></div>

<?php
}


add_action('wp_head','screen_size_div', 200);




// js variables

function js_vars() {
?>
<script type="text/javascript">
	var templateDir = "<?php echo get_template_directory_uri(); ?>";
	var childDir = "<?php echo get_stylesheet_directory_uri(); ?>";
</script>
<?php
}

add_action ('wp_head','js_vars', 5);




// info tab

add_action('switch_menu_end','bb_info_menu');

function bb_info_menu() { echo '<i class="info fa fa-info"></i>'; }
 
add_action('switch_menu_items_start','bb_info_div');

function bb_info_div() { ?>

			<div class="info">
				<?php require_once(BAMBOO_PLUGIN_DIR . '/includes/inserts/site-info.php'); ?>
			</div> <!-- // JS Printout -->	
			

	<?php 
}








?>