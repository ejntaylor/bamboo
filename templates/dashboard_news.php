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

