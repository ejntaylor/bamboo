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



		$BambooPlugin->update_setting('remove_woo_nav', 'no');
		/*
		$BambooPlugin->update_setting('req_plugins_arr', 'woocommerce/woocommerce.php; wordpress-seo/wp-seo.php; usersnap/usersnap.php; video-user-manuals/plugin.php;
woodojo/woodojo.php;
worker/functions.php;
advanced-custom-fields/acf.php;
admin-menu-editor-pro/menu-editor.php;
image-widget/image-widget.php ;
bwp-minify/bwp-minify.php;
cookies-for-comments/cookies-for-comments.php;
debug-bar/debug-bar.php;
woocommerce-debug-bar/woocommerce-debug-bar.php;
woothemes-updater');

	*/
		// This is how the array should look like.
		$plugin_array = Array(
			0 => array(
				'name' => 'WooCommerce',
				'slug' => 'woocommerce',
				'required' => true,
			) ,
			1 => array(
				'name' => 'Cookies for Comments',
				'slug' => 'cookies-for-comments',
				'required' => false,
			),
			2 => array(
				'name' => 'Wordpress SEO',
				'slug' => 'wordpress-seo',
				'required' => false,
			) ,
			3 => array(
				'name' => 'Usersnap',
				'slug' => 'usersnap',
				'required' => false,
			) ,
			4 => array(
				'name' => 'Video User Manuals',
				'slug' => 'video-user-manuals',
				'required' => false,
			) ,
			5 => array(
				'name' => 'Woo Dojo',
				'slug' => 'woodojo',
				'required' => true,
			) ,
			6 => array(
				'name' => 'WooThemes Updater',
				'slug' => 'woothemes-updater',
				'required' => true,
			) ,
			7 => array(
				'name' => 'Advanced Custom Fields',
				'slug' => 'advanced-custom-fields',
				'required' => true,
			) ,
			8 => array(
				'name' => 'BWP Minify',
				'slug' => 'bwp-minify',
				'required' => false,
			) ,

		);

	$BambooPlugin->update_setting('req_plugins_arr', $plugin_array);

$plugin_array = Array(
	0 => array(
		'name' => 'Bamboo',
		'slug' => 'bamboo',
		'required' => true,
		'version' => '1.1',
		'force_activation' => true,
		'force_deactivation' => false,
		'external_url' => '',
	) ,
	1 => array(
		'name' => 'WooCommerce',
		'slug' => 'woocommerce',
		'source' => '',
		'required' => true,
	) ,
	2 => array(
		'name' => 'Wordpress SEO',
		'slug' => 'wordpress-seo',
		'required' => false,
	) ,
	3 => array(
		'name' => 'Usersnap',
		'slug' => 'usersnap',
		'required' => false,
	) ,
	4 => array(
		'name' => 'Video User Manuals',
		'slug' => 'video-user-manuals',
		'required' => false,
	) ,
	5 => array(
		'name' => 'Woo Dojo',
		'slug' => 'woodojo',
		'required' => true,
	) ,
	6 => array(
		'name' => 'Manage WP',
		'slug' => 'worker',
		'required' => false,
	) ,
	7 => array(
		'name' => 'WooThemes Updater',
		'slug' => 'woothemes-updater',
		'required' => true,
	) ,
	8 => array(
		'name' => 'Advanced Custom Fields',
		'slug' => 'advanced-custom-fields',
		'required' => true,
	) ,
	9 => array(
		'name' => 'BWP Minify',
		'slug' => 'bwp-minify',
		'required' => false,
	) ,
	10 => array(
		'name' => 'Cookies for Comments',
		'slug' => 'cookies-for-comments',
		'required' => false,
	) ,
);



	}



?>

<script type="text/javascript">

// http://jesin.tk/dynamic-textbox-jquery-php/

jQuery(document).ready(function($){
    $('.my-form .add-box').click(function(){
        var n = $('.text-box').length + 1;
        if( 20 < n ) {
            alert('Limited to 20 Plugins - Come on you don\'t need that many!');
            return false;
        }
        var box_html = $('<p class="text-box">\n\
			<label for="box' + n + '">Plugin <span class="box-number">' + n + '</span></label>\n\
			<input type="text" name="bamboo_setting[req_plugins_arr][multiarray][' + n + '][name]" value="" id="box' + n + '" />\n\
			<label for="box1">Slug </label>\n\
			<input type="text" name="bamboo_setting[req_plugins_arr][multiarray][' + n + '][slug]" value="" id="box' + n + '" />\n\
			<label for="box1">Required </label>\n\
			<input type="hidden" name="bamboo_setting[req_plugins_arr][multiarray][' + n + '][required]" value="0" />\n\
			<input type="checkbox" name="bamboo_setting[req_plugins_arr][multiarray][' + n + '][required]" value="1" id="box' + n + '" />\n\
			<a href="#" class="remove-box">Remove</a></p>');
        box_html.hide();
        $('.my-form p.text-box:last').after(box_html);
        box_html.fadeIn('slow');
        return false;
    });
    $('.my-form').on('click', '.remove-box', function(){
        $(this).parent().css( 'background-color', '#FF6C6C' );
        $(this).parent().fadeOut("slow", function() {
            $(this).remove();
            $('.box-number').each(function(index){
                $(this).text( index + 1 );
            });
        });
        return false;
    });

    $('.my-form .domain-add-box').click(function(){
        var n = $('.domain-text-box').length + 1;
        if( 20 < n ) {
            alert('Limited to 20 Plugins - Come on you don\'t need that many!');
            return false;
        }

        var box_html = $('<p class="domain-text-box">\n\
			<label for="box1">Domain Name <span class="domain-box-number">' + n + '</span></label>\n\
			<input type="text" name="bamboo_setting[allowed_domains_arr][multiarray][]" value="" id="domain-box' + n + '" />\n\
			<a href="#" class="remove-box">Remove</a></p>');
        box_html.hide();
        $('.my-form p.domain-text-box:last').after(box_html);
        box_html.fadeIn('slow');
        return false;
    });


});
</script>

    <form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
    	<?php $BambooPlugin->the_nonce(); ?>
    	<table class="form-table">
		<tbody>


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
			

			<th colspan="2" ><h3>Plugin Installer</h3></th>


			<tr class="my-form">
				<th scope="row" valign="top">Required Plugins List</th>
				<td>

<?php

// ******** MULTIPLE ITEMS SECTION *********


if (!empty($default_plugins)) {
	$i = 0;
	foreach ($default_plugins as $key => $values) :
		?>

		<p class="text-box">
			<label for="box<?php echo $key+1; ?>">Plugin <span class="box-number"><?php echo $key+1; ?></span>
			<input type="text" name="<?php echo $BambooPlugin->get_field_name('req_plugins_arr', $type = "multiarray"); ?>[<?php echo $i; ?>][name]" value="<?php echo $values['name']; ?>" id="box<?php echo $key+1; ?>" />
			</label>

			<label for="box1">Slug</label>
			<input type="text" name="<?php echo $BambooPlugin->get_field_name('req_plugins_arr', $type = "multiarray"); ?>[<?php echo $i; ?>][slug]" value="<?php echo $values['slug']; ?>" id="box<?php echo $key+1; ?>" />
			<label for="box1">Required</label>
			<input type="hidden" name="<?php echo $BambooPlugin->get_field_name('req_plugins_arr', $type = "multiarray"); ?>[<?php echo $i; ?>][required]" value="0" />
			<input type="checkbox" name="<?php echo $BambooPlugin->get_field_name('req_plugins_arr', $type = "multiarray"); ?>[<?php echo $i; ?>][required]" value="1" <?php if ( isset($values['required']) && '1' == $values['required'] ) echo 'checked="checked"'; ?> id="box<?php echo $key+1; ?>" />
			<?php echo ( 0 == $key ? '' : '<a href="#" class="remove-box">Remove</a>' ); ?>
		</p>
		<?php
		 $i++;
	endforeach;
	echo '<p><a href="#" class="add-box">Add More</a></p>';
} else {

	global $BambooPlugin;

    ?>
        <p class="text-box">
            <label for="box1">Name <span class="box-number">1</span></label>
            <input type="text" name="<?php echo $BambooPlugin->get_field_name('req_plugins_arr', $type = "multiarray"); ?>[0][name]" value="" id="box1" />
            <label for="box1">Slug</label>
            <input type="text" name="<?php echo $BambooPlugin->get_field_name('req_plugins_arr', $type = "multiarray"); ?>[0][slug]" value="" id="box1" />
            <label for="box1">Required</label>
	    <input type="hidden" name="<?php echo $BambooPlugin->get_field_name('req_plugins_arr', $type = "multiarray"); ?>[0][required]" value="0" />
            <input type="checkbox" name="<?php echo $BambooPlugin->get_field_name('req_plugins_arr', $type = "multiarray"); ?>[0][required]" value="1" id="box1" />
        </p>
	<p><a href="#" class="add-box">Add More</a></p>
<?php
    }



?>
			</td>
		</tr>
		
		
<?php bb_settings_end(); ?>		
		
		
		
		
		
		
		
		
		
		
		
	</tbody>
</table>
<input class="button-primary" type="submit" value="Save Settings" />
</form>
<p><a href="<?php echo admin_url( '/admin.php?page=bamboo-settings&reset' ); ?>">RESET</a></p>