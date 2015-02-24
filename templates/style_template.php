<?php

/* Set the page title for the header */
add_filter('wp_title', 'custom_page_wp_title');
function custom_page_wp_title($page_title) {
    $page_title = '&raquo; Custom Ask-a-Question Page ' . $page_title;
    return($page_title);
}

/* Prevent custom filters from interfering with the theme */
add_action('get_header', 'custom_page_remove_filters');
add_action('get_sidebar', 'custom_page_remove_filters');
add_action('get_footer', 'custom_page_remove_filters');
function custom_page_remove_filters() {
    remove_filter('the_title', 'custom_page_title');
    remove_filter('the_content', 'custom_page_content');
}

add_action('loop_start', 'custom_page_add_filters');
function custom_page_add_filters() {

    add_filter('the_title', 'custom_page_title');
    add_filter('the_content', 'custom_page_content');
}

/* Internal page state, do prevent repetitions */
global $page_state;
$page_state = new stdClass();;
$page_state->displayed = false;

/* Leaving page title blank */
function custom_page_title($page_title) {
	return 'Style Page';
}

/* Display the content */
function custom_page_content() {
    global $page_state;
    
    if ($page_state->displayed) {
        return;
    }
?>

<?php 
	
	if (PARENT_AUTHOR == "WooThemes") {

	include ('style_woo.php');
	
				} else {
	include ('style_standard.php');

			}

	
?>

<?php
    $page_state->displayed = true;
}

/* Finally, we resolve what template from the theme we should use. */
if (file_exists(TEMPLATEPATH.'/page.php')) {
    include(get_page_template());
}
elseif (file_exists(TEMPLATEPATH.'/single.php')) {
    include(get_single_template());
}
else {
    include(TEMPLATEPATH.'/index.php');
}

?>