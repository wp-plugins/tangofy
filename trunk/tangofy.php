<?php

/*

Plugin Name:    Tangofy
Plugin URI:     http://op111.net/p65
Description:    Tangofies 16x16 icons and hides 32x32 icons in the administration area of WordPress 2.7.
Version:        0.0.6
Author:         Demetris
Author URI:     http://op111.net/

Licence:        http://www.gnu.org/licenses/gpl-2.0.html

FIREFOX ICONS:  Plugins
Source:         http://releases.mozilla.org/pub/mozilla.org/firefox/
Licence:        http://www.gnu.org/licenses/gpl-2.0.html

GNOME ICONS:    Appearance, Links, Posts, Settings
Source:         http://ftp.gnome.org/pub/GNOME/desktop/
Licence:        http://www.gnu.org/licenses/gpl-2.0.html

TANGO ICONS:    Comments, Dashboard, Media, Pages, Tools,  Users
Source:         http://tango.freedesktop.org/
Licence:        http://creativecommons.org/licenses/by-sa/2.5/

------------------------------------------------------------------------------
TO DO

+   Replace generic.png (see: wp-admin/includes/plugin.php).
+   Add options page.

*/

if (is_admin()) {

    function tangofy_icons() {
        wp_enqueue_style('tangofy_style', plugins_url() . '/tangofy/tangofy.css', '', '', 'all');
        wp_print_styles('tangofy_style');
    }

    add_action('admin_head', 'tangofy_icons');
    
}

?>