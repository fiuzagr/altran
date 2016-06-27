<?php

namespace InventoryControl;


class Inventory
{

    public function __construct()
    {
        register_activation_hook(__FILE__, [&$this, 'pluginActivation']);

        register_deactivation_hook(__FILE__, [&$this, 'pluginDeactivation']);

        add_action('init', [&$this, 'init']);

        if ( is_admin() ) {
            add_action('init', [&$this, 'adminInit']);
        }

        add_action('plugins_loaded', [&$this, 'loadTextDomain']);

    }

    public function init ()
    {
        add_action('wp_before_admin_bar_render', [&$this, 'adminBar']);

        new PostType\Product();
        new PostType\Customer();
        new PostType\Order();
    }

    public function adminInit ()
    {
        add_action('admin_menu', [&$this, 'adminMenu']);
        add_action('wp_dashboard_setup', [&$this, 'dashboard']);

        add_filter('contextual_help', [&$this, 'removeHelp'], 999, 3);
        add_filter('screen_options_show_screen', '__return_false');
    }

    public function loadTextDomain ()
    {
        load_plugin_textdomain('inventory-control', false, 'inventory-control/languages');
    }

    public function adminMenu ()
    {
        remove_menu_page('edit.php');                    // Post
        remove_menu_page('upload.php' );                 // Media
        remove_menu_page('edit.php?post_type=page' );    // Pages
        remove_menu_page('edit-comments.php' );          // Comments
        remove_menu_page('themes.php' );                 // Appearance
        //remove_menu_page('users.php' );                  // Users
        remove_menu_page('tools.php' );                  // Tools
    }

    public function dashboard ()
    {
        remove_meta_box('dashboard_quick_press', 'dashboard', 'side');      //Quick Press widget
        remove_meta_box('dashboard_recent_drafts', 'dashboard', 'side');    //Recent Drafts
        remove_meta_box('dashboard_incoming_links','dashboard', 'normal');  //Incoming Links
        remove_meta_box('dashboard_plugins', 'dashboard', 'normal');        //Plugins
        remove_meta_box('dashboard_right_now', 'dashboard', 'normal');      //Plugins
        remove_meta_box('dashboard_primary', 'dashboard', 'side');          //WordPress.com Blog
        remove_meta_box('dashboard_secondary', 'dashboard', 'side');        //Other WordPress News
        remove_meta_box('dashboard_activity', 'dashboard', 'normal');       //Activity
        remove_action('welcome_panel', 'wp_welcome_panel');
    }

    public function removeHelp ($old_help, $screen_id, $screen)
    {
        $screen->remove_help_tabs();
        return $old_help;
    }

    public function adminBar ()
    {
        global $wp_admin_bar;

        $wp_admin_bar->remove_node('wp-logo');
        $wp_admin_bar->remove_node('themes');
        $wp_admin_bar->remove_node('customize-themes');
        $wp_admin_bar->remove_node('customize-widgets');
        $wp_admin_bar->remove_node('customize');
        //$wp_admin_bar->remove_menu('site-name');
        $wp_admin_bar->remove_menu('view-site');
        $wp_admin_bar->remove_menu('new-content');
        //$wp_admin_bar->remove_menu('edit');
        $wp_admin_bar->remove_menu('comments');
        $wp_admin_bar->remove_menu('widgets');
        $wp_admin_bar->remove_menu('menus');
        $wp_admin_bar->remove_menu('revslider');
    }


    public function pluginActivation ()
    {
    }

    public function pluginDeactivation ()
    {
    }
}
