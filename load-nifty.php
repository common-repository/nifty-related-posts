<?php
/*
	Plugin Name: Nifty Related Posts
	Plugin URI: https://www.edwardrjenkins.com/wordpress-plugins/nifty-related-posts
	Description: Adds related posts by category to the bottom of your post template. Includes options for thumbnail size and alignment, excerpt length, related posts per page, and more. Minimal styling and disable CSS option to fit with your theme.
	Author: Edward R. Jenkins
	Version: 1.0
	Author URI: https://www.edwardrjenkins.com
	Text Domain: niftyrp
	Domain Path: /lang
 */
add_action('admin_init', 'niftyrp_init' );
add_action('admin_menu', 'niftyrp_add_page');
// niftyrp init
function niftyrp_init(){
	register_setting( 'niftyrp_options', 'niftyrp', 'niftyrp_validate' );
}
// adds menu page
function niftyrp_add_page() {
	add_options_page('Nifty Related Posts', 'Nifty Related Posts', 'manage_options', 'niftyrp', 'niftyrp_do_page');
}
// writes the menu page
function niftyrp_do_page() {
	$supportsite = 'https://www.edwardrjenkins.com';
		_e('<h4>For paid support or customizations, please contact me at <a href="'.$supportsite.'" target="_blank">edwardrjenkins.com</a></h4>','niftyrp');
		?>
		<div class="wrap">
		<h2><?php _e ('Nifty Related Posts Options', 'niftyrp'); ?></h2>
		<form method="post" action="options.php">
			<?php settings_fields('niftyrp_options'); ?>
			<?php $niftyrpoptions = get_option('niftyrp'); ?>
			<table class="form-table">
				<tr valign="top"><th scope="row"><?php _e ('Number of Related Posts to Show'); ?></th>
				<td><input type="number" size="80" max="20" name="niftyrp[perpage]" value='<?php echo $niftyrpoptions['perpage']; ?>' />
					<p class="description"><?php _e('Set the number of related posts to display. Leave blank for the default of 3.', 'niftyrp'); ?></p>
				</td>
				</tr>
				<tr valign="top"><th scope="row"><?php _e ('Related Image Alignment'); ?></th>
				<td>
				<select name="niftyrp[nrpalign]">
					<option name="niftyrp[alignleft]" value="1"<?php selected( $niftyrpoptions['nrpalign'], 1 ); ?>>Align Left</option>
					<option name="niftyrp[aligncenter]" value="2"<?php selected( $niftyrpoptions['nrpalign'], 2 ); ?>>Align Center</option>
					<option name="niftyrp[alignright]" value="3"<?php selected( $niftyrpoptions['nrpalign'], 3 ); ?>>Align Right</option>
					<option name="niftyrp[alignnone]" value="4"<?php selected( $niftyrpoptions['nrpalign'], 4 ); ?>>Align None</option>
				</select>
					<p class="description"><?php _e('Choose the thumbnail alignment.', 'niftyrp'); ?></p>
				</td>
				</tr>
				<tr valign="top"><th scope="row"><?php _e ('Related Image Size'); ?></th>
				<td>
				<select name="niftyrp[nrpthumb]">
					<option name="niftyrp[nrpsmall]" value="1"<?php selected( $niftyrpoptions['nrpthumb'], 1 ); ?>>Thumbnail</option>
					<option name="niftyrp[nrpmedium]" value="2"<?php selected( $niftyrpoptions['nrpthumb'], 2 ); ?>>Medium</option>
					<option name="niftyrp[nrplarge]" value="3"<?php selected( $niftyrpoptions['nrpthumb'], 3 ); ?>>Large</option>
					<option name="niftyrp[nrpnone]" value="4"<?php selected( $niftyrpoptions['nrpthumb'], 4 ); ?>>Disable Images</option>
				</select>
					<p class="description"><?php _e('Choose the thumbnail alignment.', 'niftyrp'); ?></p>
				</td>
				</tr>
				<tr valign="top"><th scope="row"><?php _e ('Related Posts Excerpt Length'); ?></th>
				<td><input type="number" size="80" max="100" name="niftyrp[elength]" value='<?php echo $niftyrpoptions['elength']; ?>' />
					<p class="description"><?php _e('Set the length of the related post excerpt. The default is 40 characters.', 'niftyrp'); ?></p>
				</td>
				</tr>
				<tr valign="top"><th scope="row"><?php _e ('Related Posts Heading Title'); ?></th>
				<td><input type="text" size="80" name="niftyrp[rptitle]" value='<?php echo $niftyrpoptions['rptitle']; ?>' />
					<p class="description"><?php _e('Set a custom title for the related posts section. Leave blank to use the default.', 'niftyrp'); ?></p>
				</td>
				</tr>
				<tr valign="top"><th scope="row"><?php _e ('Disable CSS'); ?></th>
				<td><input name="niftyrp[disablecss]" type="checkbox" value="1" <?php checked(true, $niftyrpoptions['disablecss']); ?> />
					<p class="description"><?php _e('Check this box to disable all Nifty Related Posts CSS. This prevents the stylesheet from loading. Savvy users can add the CSS to their theme stylesheet to prevent loading the additional resource.'); ?></p>
				</td>
				</tr>
				<tr valign="top"><th scope="row"><?php _e ('Custom CSS'); ?></th>
				<td>
				<textarea rows="20" class="large-text" type="text" name="niftyrp[customcss]" cols="50" rows="10" /><?php echo $niftyrpoptions['customcss']; ?></textarea>
				<p class="description"><?php _e('Input your custom style rules here.', 'niftyrp'); ?></p>
				</td>
				</tr>
			</table>
			<p class="submit">
			<input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
			</p>
		</form>

		<?php esc_attr_e('Thank you for using Nifty Related Posts. A lot of time went into development. Donations small or large are always appreciated.' , 'niftyrp'); ?></p>
		<form action="https://www.paypal.com/cgi-bin/webscr" target="_blank" method="post">
			<input type="hidden" name="cmd" value="_s-xclick">
			<input type="hidden" name="hosted_button_id" value="QD8ECU2CY3N8J">
			<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
			<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
		</form>
	</div>
	<?php	
	}
// sanitize and validate input
function niftyrp_validate($input) {
	// Our first value is either 0 or 1
	if ( ! isset( $input['disablecss'] ) )
	$input['disablecss'] = null;
	// Say our second option must be safe text with no HTML tags
	$input['perpage'] =  esc_html( $input['perpage'] );
	$input['elength'] = esc_html ( $input['elength'] );
	$input['nrpalign'] = esc_attr ( $input['nrpalign'] );
	$input['nrpthumb'] = esc_attr ( $input['nrpthumb'] );
	//if ( ! isset ($input['slug'] ) ) {
	$input['rptitle'] = ucfirst ($input['rptitle']);
	//} else {
	//$input['slug'] = 'staff';
	//}
	$input['customcss'] = wp_kses_post ( $input['customcss'] );
		return $input;
	// in case of slug change
	flush_rewrite_rules();
}

function nifty_related_posts($content) {
	if ( is_single() ) {
	$niftyrpoptions = get_option ('niftyrp');
	$id = get_the_ID();
	$cats = get_the_category($id);

	if ( $cats == true ) {
		$cat_id = array();
		foreach ( $cats as $cat ) { 
			$cat_id[] = $cat->term_id;
			}
	// related posts per page with fallback
	if ( $niftyrpoptions['perpage'] != '' ) {
		$number_of_posts = '3';
		} else {
		$number_of_posts = $niftyrpoptions['perpage'];
		}
	// passes query attributes
	$args = array (
			'category__in' => $cat_id,
			'post__not_in' => array ( $id ),
			'posts_per_page'=> $number_of_posts
		); 
$relatedposts = get_posts( $args );
if ( $relatedposts ) {
	// sets image alignment
	if ( $niftyrpoptions['nrpalign'] == '1' ) {
		$nrpimagealignment = 'alignleft';
		}
	if ( $niftyrpoptions['nrpalign'] == '2' ) {
		$nrpimagealignment = 'aligncenter';
		}
	if ( $niftyrpoptions['nrpalign'] == '3' ) {
		$nrpimagealignment = 'alignright';
		}
	if ( $niftyrpoptions['nrpalign'] == '4' ) {
		$nrpimagealignment = 'alignnone';
		}
	if ( $niftyrpoptions['nrpthumb'] == '1' ) {
		$nrpthumbnailsize = 'thumbnail';
		}
	if ( $niftyrpoptions['nrpthumb'] == '2' ) {
		$nrpthumbnailsize = 'medium';
		}
	if ( $niftyrpoptions['nrpthumb'] == '3' ) {
		$nrpthumbnailsize = 'large';
		}
	if ( $niftyrpoptions['nrpthumb'] == '4' ) {
		$nrpthumbnailsize = null;
		}
	// sets related posts block title
	if ( $niftyrpoptions['rptitle'] == '' ) {
		$related_post_title = 'Related Posts';
		} else {
		$related_post_title = $niftyrpoptions['rptitle'];
		}
	// sets excerpt length
	if ( $niftyrpoptions['elength'] == '' ) {
		$related_excerpt_length = '40';
		} else {
		$related_excerpt_length = $niftyrpoptions['elength'];
		}
	// assigning variables
	$related_open_wrapper = '<div id="nifty-related-posts"><h3>' . $related_post_title . '</h3><ul id="nifty-related-posts-list">';
	$related_close_wrapper = '</ul></div>';
	// appending to content
	$content = $content . $related_open_wrapper;
	foreach ( $relatedposts as $post ) {
		$related_list_open = '<li class="nifty-related-content">';
		$related_list_close = '</li>';
		$related_permalink = get_the_permalink($post->ID);
		$related_title = get_the_title($post->ID);
		$related_excerpt =  get_the_title ($post->ID);
		if ( $nrpthumbnailsize != null ) {
		$related_thumbnail = get_the_post_thumbnail($post->ID, $nrpthumbnailsize, array ('class' => $nrpimagealignment ) );
		}
		else {
		$related_thumbnail = '';
		}
		setup_postdata( $post );
		$related_excerpt = get_the_content ($post);
		$content = $content . $related_list_open .
		$related_thumbnail .
		'<a class="related-title" href="' .  $related_permalink . '">' . 
		$related_title . '</a><br>' . wp_trim_words ($related_excerpt, $related_excerpt_length) . $related_list_close;
	}
	$content = $content . $related_close_wrapper;
}
wp_reset_postdata();
}
}
return $content;
}
	
add_filter ('the_content', 'nifty_related_posts' );

// loads the default css
function niftyrp_load_css() {
	wp_register_style ('niftyrp-style', plugins_url( 'styles/niftyrp-style.css', __FILE__) );
	$niftyrpoptions = get_option('niftyrp');
	if ($niftyrpoptions['disablecss'] != '1') {
	wp_enqueue_style ('niftyrp-style');
	}
	wp_enqueue_style ('niftyrp-font-awesome');
	}
add_action ('wp_enqueue_scripts','niftyrp_load_css');

// loads up any custom css
function niftyrp_custom_styles() {
	$niftyrpoptions = get_option ('niftyrp');
		if ($niftyrpoptions['customcss'] != '' ) {
			$niftyrpcustomcss = $niftyrpoptions['customcss'];
			print ( '<!-- Nifty Related Posts Custom CSS --><style>' . $niftyrpcustomcss . '</style>');
						}
						}
add_action ('wp_head', 'niftyrp_custom_styles' );