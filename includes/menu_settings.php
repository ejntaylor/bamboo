<?php

// Settings

global $BambooPlugin; // we'll need this below


$default_plugins = $BambooPlugin->get_setting('req_plugins_arr','multiarray');


// reset settings

if (isset($_GET["reset"])) { reset_settings(); exit; }

function reset_settings() {
global $BambooPlugin; // we'll need this below

echo '<p>Settings Have Been Reset</p><p><a href="'. admin_url( '/admin.php?page=bamboo-settings' ) .'">Return to Settings</a>';

		$BambooPlugin->update_setting('enable_woo_custom_css', 'no');
		$BambooPlugin->update_setting('disallow_unauth', 'no');
		$BambooPlugin->update_setting('disallow_emails_enable', 'no');
		$BambooPlugin->update_setting('disallow_emails_address', get_bloginfo( 'admin_email' ));
		$BambooPlugin->update_setting('disallow_count', '0');
		$BambooPlugin->update_setting('disable_prettyphoto', 'no');
		$BambooPlugin->update_setting('disable_flex', 'no');
		$BambooPlugin->update_setting('disable_modernizr', 'no');
		$BambooPlugin->update_setting('disable_fontawe', 'no');
		$BambooPlugin->update_setting('disable_dash_welcome', 'no');
		$BambooPlugin->update_setting('remove_woo_nav', 'no');

	}



?>

    <form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
    	<?php $BambooPlugin->the_nonce(); ?>
    	<table class="form-table">
		<tbody>


			<th colspan="2" ><h3>General</h3></th>


			<tr>
				<th scope="row" valign="top">Disable Welcome Dashboard on Login</th>
				<td>
					<label>
						<input type="hidden" name="<?php echo $BambooPlugin->get_field_name('disable_dash_welcome'); ?>" value="no" />
						<input type="checkbox" name="<?php echo $BambooPlugin->get_field_name('disable_dash_welcome'); ?>" value="yes" <?php if ( $BambooPlugin->get_setting('disable_dash_welcome') == "yes") echo 'checked="checked"'; ?> />	Disable redirect to Bamboo Dash on login					</label>
				</td>
			</tr>
		
			

			<th colspan="2" ><h3>Libraries and Scripts</h3><p>Disables force enqueue. Libraries may be added by other plugins on specific areas of the site (eg. WooCommerce loads scripts on WooCommerce pages)</p></th>


			<tr>
				<th scope="row" valign="top">Disable Force PrettyPhoto</th>
				<td>
					<label>
						<input type="hidden" name="<?php echo $BambooPlugin->get_field_name('disable_prettyphoto'); ?>" value="no" />
						<input type="checkbox" name="<?php echo $BambooPlugin->get_field_name('disable_prettyphoto'); ?>" value="yes" <?php if ( $BambooPlugin->get_setting('disable_prettyphoto') == "yes") echo 'checked="checked"'; ?> />
					</label>
				</td>
			</tr>


			<tr>
				<th scope="row" valign="top">Disable Force Flexslider</th>
				<td>
					<label>
						<input type="hidden" name="<?php echo $BambooPlugin->get_field_name('disable_flex'); ?>" value="no" />
						<input type="checkbox" name="<?php echo $BambooPlugin->get_field_name('disable_flex'); ?>" value="yes" <?php if ( $BambooPlugin->get_setting('disable_flex') == "yes") echo 'checked="checked"'; ?> />
					</label>
				</td>
			</tr>

			<tr>
				<th scope="row" valign="top">Disable Force Modernizr</th>
				<td>
					<label>
						<input type="hidden" name="<?php echo $BambooPlugin->get_field_name('disable_modernizr'); ?>" value="no" />
						<input type="checkbox" name="<?php echo $BambooPlugin->get_field_name('disable_modernizr'); ?>" value="yes" <?php if ( $BambooPlugin->get_setting('disable_modernizr') == "yes") echo 'checked="checked"'; ?> />
					</label>
				</td>
			</tr>

			<tr>
				<th scope="row" valign="top">Disable Force FontAwesome</th>
				<td>
					<label>
						<input type="hidden" name="<?php echo $BambooPlugin->get_field_name('disable_fontawe'); ?>" value="no" />
						<input type="checkbox" name="<?php echo $BambooPlugin->get_field_name('disable_fontawe'); ?>" value="yes" <?php if ( $BambooPlugin->get_setting('disable_fontawe') == "yes") echo 'checked="checked"'; ?> />Not Recommended as Bamboo uses Font Awesome.
					</label>
				</td>
			</tr>
			
			
<?php if (PARENT_THEME == 'canvas') { ?>

		<th colspan="2" ><h3>Canvas Settings</h3></th>


			<tr>
				<th scope="row" valign="top">Add Woo Custom CSS</th>
				<td>
					<label>
						<input type="hidden" name="<?php echo $BambooPlugin->get_field_name('enable_woo_custom_css'); ?>" value="no" />
						<input type="checkbox" name="<?php echo $BambooPlugin->get_field_name('enable_woo_custom_css'); ?>" value="yes" <?php if ( $BambooPlugin->get_setting('enable_woo_custom_css') == "yes") echo 'checked="checked"'; ?> />Check this to add the WooFramework custom css
					</label>
				</td>
			</tr>



			<tr>
				<th scope="row" valign="top">Remove Woo Nav</th>
				<td>
					<label>
						<input type="hidden" name="<?php echo $BambooPlugin->get_field_name('remove_woo_nav'); ?>" value="no" />
						<input type="checkbox" name="<?php echo $BambooPlugin->get_field_name('remove_woo_nav'); ?>" value="yes" <?php if ( $BambooPlugin->get_setting('remove_woo_nav') == "yes") echo 'checked="checked"'; ?> />	Check this to remove the Woo Navigation
					</label>
				</td>
			</tr>


<?php } // if canvas ?>
			
		
		
<?php bb_settings_end(); ?>		
		
		
		
		
		
		
		
		
		
		
		
	</tbody>
</table>
<input class="button-primary" type="submit" value="Save Settings" />
</form>
<p><a href="<?php echo admin_url( '/admin.php?page=bamboo-settings&reset' ); ?>">RESET</a></p>