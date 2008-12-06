<?php
load_plugin_textdomain('tangofy');
/* Rights? */
if ( !current_user_can('manage_options') ) {
	die( __('Permission denied', 'tangofy') );
} elseif ( $_POST['action'] && $_POST['action'] == 'update' ) {
	/* Ensure post comes from expected form that has wp_nonce_field(). */
	check_admin_referer( 'tangofy_save_options' );
	update_option( 'tangofy_iconset', strip_tags(stripslashes($_POST['iconset']) ) );
	echo '<div id="message" class="updated fade"><p>' . __( 'Your changes were saved. <a href="./options-general.php?page=tangofy/tangofy-ui.php" title="Click to reload the page and see your changes!"><em>Reload this page to see them!</em></a>', 'tangofy' ) . '</p></div>';
}
?>

<div class="wrap">
	<h2><?php _e('Tangofy', 'tangofy') ?></h2>
	<form name="tangofy_options_update" method="post" action="<?php echo $_SERVER['REQUEST_URI'] ?>">
<?php wp_nonce_field('tangofy_save_options'); echo "\n"; ?>
		<h3><?php _e('Tangofy Options', 'tangofy') ?></h3>
		<table class="form-table" summary="<?php _e('Icon Options', 'tangofy') ?>">
			<tr valign="top">
				<th scope="row"><label for="icon_options"><?php _e('Admin menu icons', 'tangofy') ?></label></th>
				<td>
					<fieldset>
						<legend class="hidden"><?php _e( 'Icon Set', 'tangofy' ) ?></legend>
						<select name="iconset" id="iconset">
<?php
							$iconsets = array(
								'tango' => __('Tango', 'tangofy'),
								'tango2' => __('Tango 2', 'tangofy'),
								'silk'  => __('Silk', 'tangofy'),
								'fugue' => __('Fugue', 'tangofy'),
								'alt' => __('Alt.', 'tangofy'),
							);
							foreach ( $iconsets as $iconset => $name ) {
								echo '					<option value="' . $iconset . '"';
								selected( get_option('tangofy_iconset'), $iconset );
								echo '>' . $name . "</option>\n";
							}
?>
						</select>
						<br />
					</fieldset>
				</td>
			</tr>
		</table>
		<p class="setting-description">
			<?php _e( 'Use the “Alt.” option to add your own icon set or to modify an included one.  Just make a set, name it <kbd>menu-alt.png</kbd> and put it in <code>wp-content/plugins/tangofy/images</code>.  If there is no file named <kbd>menu-alt.png</kbd>, “Alt.” shows empty spaces for icons.&nbsp;:-)', 'tangofy' ); ?>
		</p>
		<input type="hidden" name="action" value="update" />
		<input type="hidden" name="page_options" value="tangofy_iconset" />
		<p class="submit">
			<input id="update" name="update" type="submit" value="<?php _e('Save changes', 'tangofy') ?>" accesskey="S" />
		</p>
	</form>
	<h3><?php _e( 'Links', 'tangofy' ) ?></h3>
	<p>The Fugue set is a selection from <a href="http://www.pinvoke.com/" title="<?php _e('Homepage of Fugue Icons  [pinvoke.com]', 'tangofy') ?>">Fugue Icons</a>.</p>
	<p>The Silk set is a selection from <a href="http://www.famfamfam.com/lab/icons/silk/" title="<?php _e('Homepage of Silk Icons  [famfamfam.com]', 'tangofy') ?>">Silk Icons</a>.</p>
	<p>The Tango sets use icons by the Tango Project and by projects whose icons follow the Tango guidelines:  <a href="http://www.gimp.org/" title="<?php _e('The GNU Image Manipulation Program  [gimp.org]', 'tangofy') ?>">GIMP</a>, <a href="http://www.gnome.org/" title="<?php _e('GNOME: The Free Software Desktop Project  [gnome.org]', 'tangofy') ?>">GNOME</a>, <a href="http://pidgin.im/" title="<?php _e('Pidgin, a cross-platform instant messenger  [pidgin.im]', 'tangofy') ?>">Pidgin</a>, <a href="http://tango.freedesktop.org/" title="<?php _e('Tango Desktop Project   [tango.freedesktop.org]', 'tangofy') ?>">Tango</a>.</p>
</div>
