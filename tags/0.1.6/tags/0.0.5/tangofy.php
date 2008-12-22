<?php

/*

Plugin Name:    Tangofy
Plugin URI:     http://op111.net/p65
Description:    Tangofies 16x16 icons and hides 32x32 icons in the administration area of WordPress 2.7.
Version:        0.0.5
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
CHANGELOG

0.0.5   2008-12-01
    +   Added readme.txt for wordpress.org.
0.0.4   2008-12-01
    +   Replaced accessories-text-editor (Tango) with accessories-text-editor (GNOME) for Posts.
0.0.3   2008-11-29
    +   Trying scissors+triangle icon (GNOME) for Appearance, and extensions icon (Firefox) for Plugins.
    +   Synced with WP CSS to reflect r9957 (http://trac.wordpress.org/changeset/9957).
    +   Thanks to Josh Wood (http://joshix.com/) for feedback and suggestions.
0.0.2   2008-11-28
    +   Dropped echo to use wp_enqueue_style().  Thanks to Viper007Bond.
0.0.1   2008-11-27
    +   Replaced emblem-symbolic-link (GNOME) with web-browser (GNOME) for Links.
0.0.0   2008-11-26
    +   Put together.
    +   Thanks to filosofo (http://www.ilfilosofo.com/) and Viper007Bond (http://www.viper007bond.com/) for suggesting the idea.

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