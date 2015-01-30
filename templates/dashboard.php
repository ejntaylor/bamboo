
<div class="wrap about-wrap">

	<h1><?php _e( 'Welcome to your Site', 'bamboo' ); ?></h1>
	
	<?php  // global $wp_meta_boxes; ?>
	<pre><?php // print_r($wp_meta_boxes); ?></pre>

<div class="dash-head">
	
	<div class="about-text">
		<?php _e('You are in the control panel for your site.', 'bamboo' ); ?>
	</div>
	
	<a href="/" class="admin-button" style="background: #DC3022 ;border-color: transparent;"><span class="woo-">Visit the Main Site Now</span></a>
	
</div>
	
	<?php

$active_tab = isset( $_GET[ 'tab' ] ) ? $_GET[ 'tab' ] : 'news';  


?>
	
	<h2 class="nav-tab-wrapper">
		<a href="?page=dashboard&tab=news" class="nav-tab <?php echo $active_tab == 'news' ? 'nav-tab-active' : ''; ?>">
			<?php _e( 'Welcome', 'bamboo' ); ?></a>
			<a href="?page=dashboard&tab=stats" class="nav-tab <?php echo $active_tab == 'stats' ? 'nav-tab-active' : ''; ?>">
			<?php _e( 'Site Overview', 'bamboo' ); ?></a>
	</h2>
	
	
	

			<?php
			if( $active_tab == 'news' ) {
				require_once('dashboard_news.php');
			} elseif ( $active_tab == 'stats' )  {
				require_once('dashboard_stats.php');
			}

			?>