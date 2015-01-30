	<div class="changelog dash-col dash-left">	
			<h4><?php _e( 'Video Guides and the Manual', 'bamboo' ); ?></h4>
			<p><?php _e( 'If you want to check how to do something then take a look under the Manual tab on the left. This includes Videos and a PDF which outlines how to use Wordpress and WooCommerce.', 'bamboo' ); ?></p>

			<h4><?php _e( 'Editing Pages', 'bamboo' ); ?></h4>
			<p><?php _e( 'Where possible we have made content editable from the Wordpress backend. This means you can goto the edit screen of whatever section you want to amend and will see an option to edit. For example for a post, page, product, category etc... Some global options will be set under the <strong>Options menu</strong> on the right hand menu. Sidebars are often setup using Widgets which can be found as a sub-category in the Options menu. ', 'bamboo' ); ?></p>	
					
	</div>
	

	<div class="dash-col dash-right">
	
			<h4><?php _e( 'Asana', 'bamboo' ); ?></h4>
			<p><?php _e( 'You can follow progress on your site and add your input in Asana. Asana is the project management tool we use. If you want us to address an issue related to your website please create a new task under the Asana project and assign it to us. It\'s what we use instead of email.', 'bamboo' ); ?></p>
			
			<h4><?php _e( 'Feedback', 'bamboo' ); ?></h4>
			<p><?php _e( 'When you are in the Feedback stage of your site build we will show a red Feedback box. This will appear at the bottom of the screen when on the front-facing part of your site. Click on it to load a Feedback Popup. Make notes, highlight sections of the site and then click submit. This will send us a screenshot of the page you are on with your notes - straight into your Asana project. ', 'bamboo' ); ?></p>	
			
				
	</div>
	
<div class="woo-sc-divider"></div>	
	
<div id="dashboard-rss">
	
	<div class="">	
	
		<h2><?php _e( 'Latest Blog Posts from Raison:', 'bamboo' ); ?></h2>
	
		<?php
		
		// Get a SimplePie feed object from the specified feed source.
		$rss = fetch_feed( 'http://feeds.feedburner.com/raison/blog/' );
		
		if ( ! is_wp_error( $rss ) ) : // Checks that the object is created correctly
		
		    // Figure out how many total items there are, but limit it to 5. 
		    $maxitems = $rss->get_item_quantity( 3 ); 
		
		    // Build an array of all the items, starting with element 0 (first element).
		    $rss_items = $rss->get_items( 0, $maxitems );
		
		endif;
		?>
		
		<ul>
		    <?php if ( $maxitems == 0 ) : ?>
		        <li><?php _e( 'No items', 'bamboo' ); ?></li>
		        		    <?php else : ?>
		        <?php // Loop through each feed item and display each item as a hyperlink. ?>
		        <?php foreach ( $rss_items as $item ) : ?>
		            <li>
		                <a href="<?php echo esc_url( $item->get_permalink() ); ?>"
		                    title="<?php printf( __( 'Posted %s', 'bamboo' ), $item->get_date('j F Y | g:i a') ); ?>">
		                    <?php echo esc_html( $item->get_title() ); ?>
		                </a>
		                <p><?php //echo $item->get_description(); ?>
		                
		                <?php
		                
				$string = $item->get_description();        
				$stringall=strlen($string);
				$striphtml = strip_tags($string);
				$stringnohtml=strlen($striphtml);
				$differ=($stringall-$stringnohtml);
				$stringsize=($differ + 300);
				$limited = substr($string, 0, $stringsize).' [...]';
				//echo $limited;
				echo strip_tags($limited);
				?>
</p>
		            </li>
		        <?php endforeach; ?>
		    <?php endif; ?>
		</ul>	
	
	</div>	
	
</div>

