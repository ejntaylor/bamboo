<?php



/* Flush the rewrite rules */
add_action('init', 'custom_page_init');
function custom_page_init() {
    global $wp_rewrite;
    $wp_rewrite->flush_rules();
}

/* Filter to map our custom page URLs to a query variable */
add_filter('generate_rewrite_rules', 'custom_page_generate_rewrite_rules');
function custom_page_generate_rewrite_rules($wp_rewrite) {
    $custom_page_rules = array(
		'bbstyle'  => 'index.php?custom=style',
    );
    $wp_rewrite->rules = $custom_page_rules + $wp_rewrite->rules;
}

/* Filter that inserts our query variable into the $wp_query */
add_filter('query_vars', 'custom_page_query_vars');
function custom_page_query_vars($qvars) {
    $qvars[] = 'custom';
    return $qvars;
}

/* Filter that maps the query variable to a template */
add_action('template_redirect', 'custom_page_template_redirect');
function custom_page_template_redirect() {
    global $wp_query;
    $custom_page = $wp_query->query_vars['custom'];
    if ($custom_page == 'style') {
        include(BAMBOO_PLUGIN_DIR .'/templates/style_template.php');

        exit;
    }
}





?>