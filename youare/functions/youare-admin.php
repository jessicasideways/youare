<?php

array_unshift($alt_stylesheets, 'Select a stylesheet:');

$options = array (
	//COLOR THEME
	array(	"name" => "Alternate Styles", "type" => "subhead"),
	array(	"name" => "Alternate Theme Stylesheet",
			"desc" => __("<a href=\"http://www.flickr.com/photos/youarecom/tags/wpschemes\">Preview</a>. Place additional theme stylesheets in the <code>themes/youare/</code> subdirectory to have them automatically detected.", 'youare'),
			"id" => $shortname."_alt_stylesheet",
			"std" => "Select a stylesheet:",
			"type" => "select",
			"options" => $alt_stylesheets),

	//AUTHOR BOX
	array(	"name" => "Author Box Sidebar",
			"type" => "subhead"),
	array(	"name" => "About you (A brief description)",
			"id" => $shortname."_about",
			"desc" => "2 lines recommended. XHTML allowed. eg: I am founder of &lt;a href=\"http://domain.com\"&gt;Company Name&lt;/a&gt;, a creative web design agency based in London.",
			"type" => "textarea",
			"options" => array("rows" => "2",
			"cols" => "80") ),

	//SOCIAL PROFILES. FOLLOW LINKS
	array(	"name" => "Online identity",
			"type" => "subhead"),
	array(	"name" => "Twitter URL (<a href=\"http://twitter.com/signup\">Have an account?</a>)",
			"id" => $shortname."_twitter",
			"desc" => "eg: http://twitter.com/eventoblog",
			"type" => "text",
			"style" => "width: 300px",
			"row_style" => "background-color: #f1f1f1;"),
	array(  "name" => "Twitter link in author box",
			"id" => $shortname."_twitter_toggle_link",
			"desc" => "Activate Twitter link.",
			"std" => "",
			"type" => "checkbox"),

	//REAL-TIME SERVICES LATEST UPDATES
	array(	"name" => "Real-time services",
			"type" => "subhead"),
	array(  "name" => "Latest Twitter Updates",
			"id" => $shortname."_twitter_toggle_updates",
			"desc" => "Show my latest updates. You should activate 'Latest Twitter Updates plugin' before.",
			"std" => "",
			"type" => "checkbox"),

	//FEEDBURNER	
	array(	"name" => "RSS / Feedburner Options",
			"type" => "subhead"),
	array ( "name" => "Feedburner Username (<a href=\"http://feedburner.google.com\">Have an account?</a>)",
			"id" => $shortname."_feedburner_username",
			"std" => "",
			"type" => "text"),
	array ( "name" => "FeedCount Image"		,
			"desc" => __("Paste the dynamic graphic that always displays your feed's current circulation", 'youare'),
			"id" => $shortname."_feedburner_counter",
			"std" => "",
	    	"type" => "textarea",
			"options" => array("rows" => "3",
			"cols" => "80") ),
	array ( "name" => "Allow readers to receive email updates"		,
			"desc" => __("Activate Email Subscription.", 'youare'),
			"id" => $shortname."_feedburner_email",
			"std" => "",
	        "type" => "checkbox"),

	//FLICKR SIDEBAR
	array(  "name" => "Flickr (Your latest photos in Sidebar)",
			"type" => "subhead"),
	array(	"name" => "Flickr Username",
			"id" => $shortname."_flickr",
			"desc" => "http://flickr.com/photos/<strong>username</strong>",
			"type" => "text",
			"style" => "width: 300px"),
	array(	"name" => "Activate Flickr",
			"id" => $shortname."_flickr_off",
			"desc" => "Activate Flickr.",
			"std" => "",
			"type" => "checkbox"),

	//SIDEBAR ADS 125X125
 	array(	"name" => "Sidebar Ads",
			"type" => "subhead"),
	array(	"name" => "Ads (125x125px)",
			"id" => $shortname."_adbox",
			"desc" => "Enable the sidebar ads.",
			"std" => "",
			"type" => "checkbox"),
	array(  "name" => "Ad 1 Image",
			"id" => $shortname."_adurl_1",
			"desc" => " eg: ad1.gif. Place your image in the <code>/wp-content/themes/youare/images/sidebar</code> subdirectory",
			"std" => "",
			"type" => "text"), 
	array(  "name" => "Ad 1 URL",
			"id" => $shortname."_adlink_1",
			"desc" => "Please include http://",
			"std" => "",
			"type" => "text",
			"row_style" => "background-color: #f1f1f1;"), 
	array(  "name" => "Ad 1 alt",
			"id" => $shortname."_adalt_1",
			"desc" => "Alt tag for the first ad",
			"std" => "",
			"type" => "text"),
	array(  "name" => "Ad 2 Image",
			"id" => $shortname."_adurl_2",
			"desc" => "eg: ad2.gif. Place your image in the <code>/wp-content/themes/youare/images/sidebar</code> subdirectory",
			"std" => "",
			"type" => "text"),   
	array(  "name" => "Ad 2 URL",
			"id" => $shortname."_adlink_2",
			"desc" => "Please include http://",
			"std" => "",
			"type" => "text",
			"row_style" => "background-color: #f1f1f1;"), 
	array(  "name" => "Ad 2 alt",
			"id" => $shortname."_adalt_2",
			"desc" => "Alt tag for the second ad",
			"std" => "",
			"type" => "text"),
);

function mytheme_add_admin() {

    global $themename, $shortname, $options;

    if ( $_GET['page'] == basename(__FILE__) ) {
    
        if ( 'save' == $_REQUEST['action'] ) {

                foreach ($options as $value) {
                    update_option( $value['id'], $_REQUEST[ $value['id'] ] ); }

                foreach ($options as $value) {
                    if( isset( $_REQUEST[ $value['id'] ] ) ) { update_option( $value['id'], $_REQUEST[ $value['id'] ]  ); } else { delete_option( $value['id'] ); } }

                header("Location: themes.php?page=youare-admin.php&saved=true");
                die;

        } else if( 'reset' == $_REQUEST['action'] ) {

            foreach ($options as $value) {
                delete_option( $value['id'] ); }

            header("Location: themes.php?page=youare-admin.php&reset=true");
            die;

        }
    }

    add_theme_page($themename." Options", "$themename Options", 'edit_themes', basename(__FILE__), 'mytheme_admin');

}

//add_theme_page($themename . 'Header Options', 'Header Options', 'edit_themes', basename(__FILE__), 'headimage_admin');

function headimage_admin(){
	
}

function mytheme_admin() {

    global $themename, $shortname, $options;

    if ( $_REQUEST['saved'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings saved.</strong></p></div>';
    if ( $_REQUEST['reset'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings reset.</strong></p></div>';
    
?>
<div class="wrap">
<h2 class="updatehook">You Are Options</h2>

<table class="widefat" style="margin: 20px 0 0;">
	<thead>

		<tr>
			<th scope="col" style="width: 50%; font: 1.6em Baskerville, palatino, georgia, times, serif;">About You Are Theme</th>
			<th scope="col" style="font: 1.6em Baskerville, palatino, georgia, times, serif;">Support</th>
		</tr>
	</thead>
	<tbody>
		<tr style="background: #f1f1f1; color: #222">
			<td>
				<p>The You Are Theme is currently being recoded to be compatible with WordPress 3.7 (and is <em>very</em> alpha) and is released under GPL License. Plugins required and recommended are in the zip files that you downloaded. Upload and activate plugins, before activating the theme itself.</p>
				<p>This theme is designed and developed by <a href="http://jessicasideways.com">Jessica Sideways</a> and was inspired on several themes like <a href="http://themes.jestro.com/titan/">Titan</a> and <a href="http://curtishenson.com/checkmate-20-a-free-premium-wordpress-theme/">Checkmate</a>.</p>
			</td>
			<td>
				<p>I will not provide any support via e-mail. If you have questions about using or extending this theme, the best resources are: <a href="http://notmypony.com">Not My Pony</a>, <a href="https://github.com/jessicasideways/youare">You Are Theme on Github</a> (you can post your issues there, and you will be more likely to get a positive response), and <a href="http://wordpress.org/support/">the official WordPress Forums</a>.</p>
				<p>I love feedback. Feel free to give me your suggestions on the Github project page.</p>
			</td>
		</tr>
	</tbody>
</table>

<form method="post">
<?php foreach ($options as $value) { 	
	switch ( $value['type'] ) {
		case 'subhead':
		?>
<hr style="border: 1px dotted #dfdfdf; margin: 20px 0">

<table class="widefat">
	<thead>
		<tr>
			<th scope="col" style="width:20%" class="column-title"><?php echo $value['name']; ?></th>
			<th scope="col"></th>
		</tr>
	</thead>		
		<?php
		break;

		case 'text':
		?>
	<tr valign="top" style="<?php echo $value['row_style']; ?>"> 
		<th scope="row"><?php echo $value['name']; ?>:</th>
			<td>
				<input style="<?php echo $value['style']; ?>" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_settings( $value['id'] ) != "") { echo get_settings( $value['id'] ); } else { echo $value['std']; } ?>" />
				<?php echo $value['desc']; ?>
			</td>
		</tr>
		<?php
		break;
		
		case 'select':
		?>
		<tr valign="top"> 
			<th scope="row"><?php echo $value['name']; ?>:</th>
			<td>
				<select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
					<?php foreach ($value['options'] as $option) { ?>
	               		<option<?php if ( get_settings( $value['id'] ) == $option) { echo ' selected="selected"'; } elseif ($option == $value['std']) { echo ' selected="selected"'; } ?>><?php echo $option; ?></option>
					<?php } ?>
				</select>
				<?php echo $value['desc']; ?>
			</td>
		</tr>
		<?php
		break;
		
		case 'textarea':
		$ta_options = $value['options'];
		?>
		<tr valign="top"> 
	        <th scope="row"><?php echo $value['name']; ?>:</th>
	        <td>
			    <?php echo $value['desc']; ?>
				<textarea name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" cols="<?php echo $ta_options['cols']; ?>" rows="<?php echo $ta_options['rows']; ?>"><?php 
				if( get_settings($value['id']) != "") {
						echo stripslashes(get_settings($value['id']));
					}else{
						echo $value['std'];
				}?></textarea>
	        </td>
	    </tr>
		<?php
		break;

		case "radio":
		?>
		<tr valign="top"> 
	        <th scope="row"><?php echo $value['name']; ?>:</th>
	        <td>
	            <?php foreach ($value['options'] as $key=>$option) { 
				$radio_setting = get_settings($value['id']);
				if($radio_setting != ''){
		    		if ($key == get_settings($value['id']) ) {
						$checked = "checked=\"checked\"";
						} else {
							$checked = "";
						}
				}else{
					if($key == $value['std']){
						$checked = "checked=\"checked\"";
					}else{
						$checked = "";
					}
				}?>
	            <input type="radio" name="<?php echo $value['id']; ?>" value="<?php echo $key; ?>" <?php echo $checked; ?> /><?php echo $option; ?><br />
	            <?php } ?>
	        </td>
	    </tr>
		<?php
		break;
		
		case "checkbox":
		?>
			<tr valign="top"> 
		        <th scope="row"><?php echo $value['name']; ?>:</th>
		        <td>
		           <?php
						if(get_settings($value['id'])){
							$checked = "checked=\"checked\"";
						}else{
							$checked = "";
						}
					?>
		            <input type="checkbox" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" value="true" <?php echo $checked; ?> />

			    <?php echo $value['desc']; ?>
		        </td>
		    </tr>
			<?php
		break;
		
		case "cats_ids":
		?>
			<tr valign="top"> 
		        <th scope="row"><?php echo $value['name']; ?>:</th>
		        <td>
				<p>	<?php
				$pages = get_pages('depth=1&orderby=ID&hide_empty=0');
				//print_r($pages);
				echo '<strong>Page IDs and Names</strong> (<em>Archives Page</em> you can\'t exclude). <a href="http://wptheme.youare.com/wp-content/themes/youare/images/screenshot_archives_page.png">How to make an archives page</a>.<br />'; 
					foreach($pages as $page) { 
					    echo $page->ID . ' = ' . $page->post_name . '<br />'; 
					} 
					?>
				</p>
		        </td>
		    </tr>
			<?php
		break;

		default:

		break;
	}
}
?>

</table>

<p class="submit">
	<input name="save" type="submit" value="Save changes" />    
	<input type="hidden" name="action" value="save" />
</p>
</form>
<?php
}

function option_wrapper_header($values){
	?>
	<tr valign="top"> 
	    <th scope="row"><?php echo $values['name']; ?>:</th>
	    <td>
	<?php
}
function option_wrapper_footer($values){
	?>
		<br />
		<?php echo $values['desc']; ?>
	    </td>
	</tr>
	<?php 
}
function option_wrapper_footer_nobreak($values){
	?>
		<?php echo $values['desc']; ?>
	    </td>
	</tr>
	<?php 
}
add_action('admin_menu', 'mytheme_add_admin'); 
?>