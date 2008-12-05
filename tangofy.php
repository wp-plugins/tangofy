<?php

/*

Plugin Name:    Tangofy
Plugin URI:     http://op111.net/p65
Description:    Adds better icons to the admin menu of WordPress 2.7:  Select from the included icon sets (Fugue, Silk, Tango, Tango 2) or add your own!
Version:        0.1.0
Author:         Demetris
Author URI:     http://op111.net/

Licence:        http://www.gnu.org/licenses/gpl-2.0.html

FUGUE ICONS
Source:         http://www.pinvoke.com/
Licence:        http://creativecommons.org/licenses/by/3.0/

GIMP ICONS
Source:         http://gimp.org/
Licence:        http://www.gnu.org/licenses/gpl-2.0.html

GNOME ICONS
Source:         http://ftp.gnome.org/pub/GNOME/desktop/
Licence:        http://www.gnu.org/licenses/gpl-2.0.html

PIDGIN ICONS
Source:         http://pidgin.im/
Licence:        http://www.gnu.org/licenses/gpl-2.0.html

SILK ICONS
Source:         http://www.famfamfam.com/lab/icons/silk/
Licence:        http://creativecommons.org/licenses/by/2.5/

TANGO ICONS
Source:         http://tango.freedesktop.org/
Licence:        http://creativecommons.org/licenses/by-sa/2.5/

------------------------------------------------------------------------------
TO DO

+   Replace generic.png (see: wp-admin/includes/plugin.php).
+   Add more options to Options.

DONE

+   Add options page. (v. 0.1.0, 2008-12-05)

*/

/* Set default on first activation. */
function tangofy_actv(){
	add_option('tangofy_iconset', 'tango', '', 'yes');
}
/* Clean up when turned off. */
function tangofy_dactv(){
	delete_option('tangofy_iconset');
}
/* Every time through */
function tangofy_init(){
	/* Admin options menu item and options page */
	if(function_exists('add_options_page')){
		/* add_options_page(page_title, menu_title, access_level/capability, file, [function]) */
		add_options_page( __( 'Tangofy Options', 'tangofy' ), __( 'Tangofy', 'tangofy' ), 'manage_options', 'tangofy/tangofy-ui.php', '' );
	}
}
/* Create a stylesheet URI, enqueue, and emit it. */
function tangofy_icons(){
	$ss = plugins_url() . '/tangofy/css/' . get_option('tangofy_iconset') . '.css';
	wp_enqueue_style( 'tangofy_style', $ss, '', '', 'all' );
	wp_print_styles( 'tangofy_style' );
}
/* Inform WP about activate/deactivate functions. */
register_activation_hook( __FILE__, 'tangofy_actv' );
register_deactivation_hook( __FILE__, 'tangofy_dactv' );
/* For localization: load_plugin_textdomain(Name, xxx, /path/to/pofiles) */
load_plugin_textdomain( 'tangofy', false, '/tangofy/l10n' );
/* Arrange for the replacement stylesheet function to run. */
if(is_admin()){
	add_action('admin_head', 'tangofy_icons');
}
/* Register the admin menu item/page function to be called. */
add_action( 'admin_menu', 'tangofy_init' );
?>