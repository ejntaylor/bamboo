<?php
/**
 * Template Name: Style Guide New
 *

 *
 * @package WooFramework
 * @subpackage Template
 */
 
 
 

 	
 	
 add_action ('loop_start', 'custom_loop');
 
 function custom_loop() {
	 echo 'test loop';
 }	
 	
/*
 	
			IF (PARENT_AUTHOR == "WooThemes") {
					require_once('content/style_woo.php');
				} else {
					require_once('content/style_standard.php');

			}
			
*/
			
?>