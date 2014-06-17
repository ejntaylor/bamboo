<?php







// Add Menu Items
function bamboo_options_panel(){
  add_menu_page('', 'Bamboo', 'manage_options', 'bamboo_options', 'bamboo_options', null, 2.11);
  
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