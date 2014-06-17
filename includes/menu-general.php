<?php
	if (!current_user_can('manage_options'))  {
		wp_die( __('You do not have sufficient permissions to access this page.', 'bamboo') );
	} else {
	$active_tab = isset( $_GET[ 'tab' ] ) ? $_GET[ 'tab' ] : 'welcome';
?>


<div class="wrap about-wrap">

	<h1><?php _e( 'Welcome to Bamboo', 'bamboo' ); ?></h1>


<div class="dash-head">

	<div class="about-text">
		<?php _e('Bamboo works out of the box.<br /> You can find some tools and information here.', 'bamboo' ); ?>
	</div>

	<a href="/" class="admin-button" style="background: #DC3022 ;border-color: transparent;"><span>Visit the Main Site Now</span></a>

</div>


    <!-- Output for Options Page -->

        	<h2 class="nav-tab-wrapper">
				<a href="?page=bamboo_options" class="nav-tab <?php echo $active_tab == 'welcome'  ? 'nav-tab-active' : ''; ?>">
				<?php _e( 'Bamboo Status', 'bamboo' ); ?></a>

				<a href="<?php echo admin_url(); ?>" class="nav-tab">
				<?php _e( 'Goto Client Dashboard', 'bamboo' ); ?></a>

				<a href="https://raison.co/bamboo" target="_blank" class="nav-tab">
				<?php _e( 'Get Bamboo Premium', 'bamboo' ); ?></a>
				
				<a href="https://app.asana.com" target="_blank" class="nav-tab">
				<?php _e( 'Goto Asana', 'bamboo' ); ?></a>

			</h2>


<div class="wrap bamboo-general">

			<?php

			if( $active_tab == 'welcome' ) {

				require_once(BAMBOO_PLUGIN_DIR . '/includes/inserts/site-info.php');




				}

				elseif ( $active_tab == 'tab2' )  {
					require_once('dashboard-stats.php');
				}






				}

?>

</div><!-- // wrap -->