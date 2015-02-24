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
				<a href="?page=dashboard" class="nav-tab <?php echo $active_tab == 'welcome'  ? 'nav-tab-active' : ''; ?>">
				<?php _e( 'Bamboo Status', 'bamboo' ); ?></a>
				
				<a href="/bbstyle/" target="_blank" class="nav-tab">
				<?php _e( 'Style Page', 'bamboo' ); ?></a>

				<a href="?page=dashboard&tab=tab3" class="nav-tab <?php echo $active_tab == 'tab3'  ? 'nav-tab-active' : ''; ?>">
				<?php _e( 'Error Log', 'bamboo' ); ?></a>

				<a href="?page=dashboard&tab=tab4" class="nav-tab <?php echo $active_tab == 'tab4'  ? 'nav-tab-active' : ''; ?>">
				<?php _e( 'PHP Info', 'bamboo' ); ?></a>
				
				<a href="<?php echo admin_url(); ?>" class="nav-tab">
				<?php _e( 'Goto Client Dashboard', 'bamboo' ); ?></a>
				

			</h2>


<div class="wrap bamboo-general">

			<?php

			if( $active_tab == 'welcome' ) {

				require_once(BAMBOO_PLUGIN_DIR . '/includes/inserts/site-info.php');




				}

				elseif ( $active_tab == 'tab2' )  {
					require_once('dashboard-stats.php');
				}


				

				elseif ( $active_tab == 'tab3' )  {
					//require_once('dashboard-logs.php');
					//readfile( plugins_url( ) . '/bamboo/logs/php_error.log' );
					
					$file = file_get_contents( plugins_url( ) . '/bamboo/logs/php_error.log' );
					echo nl2br( $file );

				
				}


				elseif ( $active_tab == 'tab4' )  {
				
				 echo '<style>a:link, body {background-color:initial!important;}</style>';

					phpinfo();

				
				}
				
				





				}

// blog posts

				require_once('dashboard_news.php');


?>



</div>
</div><!-- // wrap -->