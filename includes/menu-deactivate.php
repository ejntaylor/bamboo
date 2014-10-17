<?php

// Page Logic

    if($_GET['action'] == 'deactivate'){
        de_plug();
    }elseif($_GET['action'] == 'activate'){
		newSaved();
    }


// Saved Plugins

function savedPlugins() {

	$savedPlugins = get_option('savedPlugins');
	if ($savedPlugins) :
		echo '<ul class="chk-container">';
		echo '<form>';
		echo '<input type="submit" value="Activate Selected Plugins" />';
		echo '<br /><br />';
		echo '<li><input type="checkbox" id="selecctall" checked="checked"/><strong>Selecct / De-select All</strong></li>';

			foreach($savedPlugins as $plugin => $value) {
				echo '<li><input class="checkbox1" type="checkbox" name="plugins[]" value="' .$value. '" checked="checked">' . $value . "</li>";
			}


		echo '<input type="hidden" name="action" value="activate"><br>';
		echo '<input type="hidden" name="page" value="bamboo-deactivate">';
		echo '</form>';
		echo '</ul>';
		else: echo 'There are no saved plugins - Deactivate first';
		endif;

}


// Activating Plugins


function newSaved() {
	$savedPlugins = get_option('savedPlugins');
	$chosenPlugins = $_GET['plugins'];
	$filteredUpdate = array_diff($savedPlugins, $chosenPlugins);
	
	echo '<div class="updated"><p>Plugins Activated</p>';      
		
		$n = 0;
		foreach($chosenPlugins as $plugin) {
			activate_plugin($plugin);
			$n++;
			echo $plugin . ' | ';
	    }
		echo '<br /><br /><strong>Total Activated: '. $n . '</strong>';
		$n = 0;
    echo '</div>';
   	update_option('savedPlugins', $filteredUpdate);


   
   }


// Deactivating Plugins


function de_plug() {

	$savedPlugins = get_option('savedPlugins');	
	$active_plugins = get_option('active_plugins');
	$exclude_file_1 = "bamboo/bamboo.php";
	$exclude_file_2 = "woocommerce/woocommerce.php";
	
	$exclude = array($exclude_file_1, $exclude_file_2);
	$filtered = array_diff($active_plugins, $exclude);
	add_option('savedPlugins', $filtered);
	
	if ($_GET['save'] == 'nochanges') {
	
		echo 'Saved Plugins not updated';
		
		}
		
		elseif ($_GET['save'] == 'update') {
		
			$updateList = array_merge($filtered, $savedPlugins);
			update_option('savedPlugins', $updateList);

	
	} else {
		
		update_option('savedPlugins', $filtered);
		
	
	}
	
	deactivate_plugins( $filtered );
	
	
	    echo '<div class="updated">
		      <p>Plugins Deactivated</p>';
	
					$n = 0;
				    foreach($filtered as $key => $value) {
				        //$string = explode('/',$value); // Folder name will be displayed
				        echo $value . ' | ';
				        $n++;
				    }
					echo '<br /><br /><strong>Total Deactivated: '. $n . '</strong>';				    
				    $n = 0;
				    
	  
			echo '</div>';

}

?>

<div class="bb_twocol">
<h3>Deactivate Plugins</h3>

<p>Click to deactivate all plugins*. Deactivated plugins can be saved in a list below and then activated there. The radio buttons provide options on how to manage the save list.</p>

<form>
	<input type="hidden" name="action" value="deactivate">
	<div class="bb-plugins"><input type="radio" name="save" value="overwrite" checked="checked">Overwrite Plugins List<br></div>
	<div class="bb-plugins"><input type="radio" name="save" value="nochanges">Leave Plugins List<br></div>
	<div class="bb-plugins"><input type="radio" name="save" value="update">Update Saved Plugins List<br></div>
	
	<input type="hidden" name="page" value="bamboo-deactivate">

	<input type="submit" value="Deactivate Plugins" /> 

</form>
<p><em>*WooCommerce and Bamboo are not deactivated here</em></p>
<hr>
</div>
<div class="bb_twocol last">

<h3>Activate Saved Plugins</h3>
<p>Select plugins to be activated. Once activated they will be removed from the save list.</p>


<?php savedPlugins(); ?>
</div>