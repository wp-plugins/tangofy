<?php

/*

Plugin Name:    Tangofy
Plugin URI:     http://op111.net/65
Description:    Better icons for the admin menu of WordPress 2.7:  Select an included icon set (Fugue, Silk, Tango, Tango 2) or add your own!
Version:        0.2.0
Author:         Demetris
Author URI:     http://op111.net/
Text Domain:    tangofy

Contact:        op111.net@gmail.com
Licence:        http://www.gnu.org/licenses/gpl-2.0.html

Fugue Icons:    http://www.pinvoke.com/
                http://creativecommons.org/licenses/by/3.0/
GIMP Icons:     http://gimp.org/
                http://www.gnu.org/licenses/gpl-2.0.html
GNOME Icons:    http://ftp.gnome.org/pub/GNOME/desktop/
                http://www.gnu.org/licenses/gpl-2.0.html
Pidgin Icons:   http://pidgin.im/
                http://www.gnu.org/licenses/gpl-2.0.html
Silk Icons:     http://www.famfamfam.com/lab/icons/silk/
                http://creativecommons.org/licenses/by/2.5/
Tango Icons:    http://tango.freedesktop.org/
                http://creativecommons.org/licenses/by-sa/2.5/

------------------------------------------------------------------------------
TO DO
+   Replace generic.png (see: wp-admin/includes/plugin.php).
+   Add more options to Options.

DONE
+   Add options page. (v. 0.1.0, 2008-12-05)

*/

/* Activation */
function tangofy_actv() {
	/* Create our option, set it to something. */
	add_option( 'tangofy_iconset', 'tango', '', 'yes' );
}

/* Deactivation */
function tangofy_dactv() {
	delete_option( 'tangofy_iconset' );
}

/* Create admin menu and options page. */
function tangofy_admin_ui() {
	if ( function_exists('add_options_page') ) {
		/* add_options_page(page_title, menu_title, access_level/capability, file, [function]) */
		add_options_page( __( 'Tangofy Options', 'tangofy' ), __( 'Tangofy!', 'tangofy' ), 'manage_options', 'tangofy/tangofy-ui.php', '' );
	}
}

/* Link to options page in active plugins list. */
function tangofy_add_plugin_action_link($action_links, $file) {	
	$plugin_self = plugin_basename(__FILE__);
	if ( $file == $plugin_self ) {
		$link = '<a href="' . admin_url('options-general.php?page=tangofy/tangofy-ui.php') . '">' . __('Settings') . '</a>';
		array_unshift( $action_links, $link );
	}
	return $action_links;
}

/* Create a stylesheet URI, enqueue, and emit it. */
function tangofy_admin_head() {
	$ss = plugins_url() . '/tangofy/css/' . get_option('tangofy_iconset') . '.css';
	wp_enqueue_style( 'tangofy_style', $ss, '', '', 'all' );
	wp_print_styles( 'tangofy_style' );
}

/* Inform WP about activate/deactivate functions. */
register_activation_hook( __FILE__, 'tangofy_actv' );
register_deactivation_hook( __FILE__, 'tangofy_dactv' );
/* For localization: load_plugin_textdomain(Name, xxx, /path/to/pofiles) */
load_plugin_textdomain( 'tangofy', false, '/tangofy/languages' );
/* Register the admin menu item/page function to be called. */
add_action( 'admin_menu', 'tangofy_admin_ui' );
/* Arrange for settings link to be inserted in plugin screen list. */
add_filter( 'plugin_action_links', 'tangofy_add_plugin_action_link', 10, 2 );
/* Arrange for the replacement stylesheet function to run. */
add_action( 'admin_head', 'tangofy_admin_head' );
