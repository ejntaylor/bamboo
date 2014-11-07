<?php

// Not used - Just for reference 

// Adding a new item to Styles Pop Out

// switch menu

add_action('switch_menu_start','bambino_switch_menu',10);

function bambino_switch_menu() {

	if (defined('BAMBINO_INSTALLED')) {
	global $switch_overwrite; 
	$switch_overwrite = true;
	echo '<i class="bambino fa fa-circle-o active"></i>';
	}
}


add_action('switch_menu_items_start','bambino_switch_menu_item',10);


function bambino_switch_menu_item() {

	if (defined('BAMBINO_INSTALLED')) : ?>

			<div class="bambino" style="display:block;">
				<h3>Bambino Debug</h3>

					<p>Coming Soon</p>
								
			</div> <!-- // Bambino -->

<?php  endif; // IF Bambino installed 

} // switch_menu_items_start



?>