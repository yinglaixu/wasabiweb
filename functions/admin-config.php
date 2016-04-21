<?php

// SANITIZING HTML WHEN UPDATING VALUES IN ACF, ALSO USED IN RenthiaProperty.php
function my_kses_post( $value ) {
    // is array
    if( is_array($value) ) {
        return array_map('my_kses_post', $value);
    }
    // return
    return wp_kses_post( $value );
}
add_filter('acf/update_value', 'my_kses_post', 10, 1);

/**
 * Disable admin bar on the frontend of your website
 * for subscribers.
 */
function ww_disable_admin_bar() {
    if ( ! current_user_can('edit_posts') ) {
        add_filter('show_admin_bar', '__return_false');
    }
}
add_action( 'after_setup_theme', 'ww_disable_admin_bar' );

/**
 * Redirect back to homepage and not allow access to
 * WP admin for Subscribers.
 */
function ww_redirect_admin(){
    if ( ! defined('DOING_AJAX') && ! current_user_can('edit_posts') ) {
        wp_redirect( site_url() );
        exit;
    }
}
add_action( 'admin_init', 'ww_redirect_admin' );

/**
 * Add Custom Post Type menu support so its add a active class
 * To use this: Add a child page from the CPT in the wordpress menu, and add a cpt name title to it.
 * To use this: Make sure the function removeTitleNavMenu() is being run in app.js
 */
add_filter('nav_menu_css_class', 'current_type_nav_class', 10, 2);
function current_type_nav_class($classes, $item)
{
    $post_type = get_query_var('post_type');
    if ($item->attr_title != '' && $item->attr_title == $post_type) {
        array_push($classes, 'current-menu-item');
    };

    return $classes;
}


/**
 * Make Dashboard only output one column instead of two columns.
 */
function shapeSpace_screen_layout_columns($columns)
{
    $columns['dashboard'] = 1;

    return $columns;
}

add_filter('screen_layout_columns', 'shapeSpace_screen_layout_columns');
function shapeSpace_screen_layout_dashboard()
{
    return 1;
}

add_filter('get_user_option_screen_layout_dashboard', 'shapeSpace_screen_layout_dashboard');

/**
 * Remove unwanted widgets in dashboard
 */
function remove_dashboard_widget()
{
    remove_meta_box('dashboard_browser_nag', 'dashboard', 'side');
    remove_meta_box('dashboard_right_now', 'dashboard', 'side');
    remove_meta_box('dashboard_activity', 'dashboard', 'side');
    remove_meta_box('dashboard_quick_press', 'dashboard', 'side');
    remove_meta_box('dashboard_primary', 'dashboard', 'side');
}

add_action('wp_dashboard_setup', 'remove_dashboard_widget');

/**
 * Add a widget to the dashboard.
 *
 * This function is hooked into the 'wp_dashboard_setup' action below.
 */
function add_dashboard_widgets()
{

    wp_add_dashboard_widget(
        'picture-editor', // Widget slug.
        'Edit your pictures before upload - <em>Optimized images decrease page load time and will help conversions.</em>',
        // Title.
        'dashboard_widget_function' // Display function.
    );
}

add_action('wp_dashboard_setup', 'add_dashboard_widgets');

/**
 * Create the function to output the contents of our Dashboard Widget.
 */
function dashboard_widget_function()
{

    // Display whatever it is you want to show.
    echo '<iframe id="pixlr" type="text/html" width="100%" height="740px" src="http://pixlr.com/editor/" frameborder="0"></iframe>';
}

/**
 * Remove sidebar items for all users who are not admin or wasabiweb
 */
function remove_dashboard_menu_items()
{

    $admins = array(
        'wasabiweb',
        'admin',
        'Marcus',
    );
    $current_user = wp_get_current_user();

    if (!in_array($current_user->user_login, $admins)) {

        // Hide particular pages from view on the back end.
        add_action('pre_get_posts', 'exclude_this_page');
        function exclude_this_page($query)
        {
            if (!is_admin()) {
                return $query;
            }
            global $pagenow;

            // WordPress 3.0
            if ('edit.php' == $pagenow && (get_query_var('post_type') && 'page' == get_query_var('post_type'))) {
                $query->set('post__not_in', array(47, 19, 15));
            }

            return $query;
        }


        // REMOVE META BOXES FROM WORDPRESS DASHBOARD FOR ALL USERS
        function example_remove_dashboard_widgets()
        {

            // Globalize the metaboxes array, this holds all the widgets for wp-admin
            global $wp_meta_boxes;
            unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
            unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);
            unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
            unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);
            unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']);
            unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_recent_drafts']);
            unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);
            unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_welcome_panel']);
            unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);
        }

        add_action('wp_dashboard_setup', 'example_remove_dashboard_widgets');
        remove_action('welcome_panel', 'wp_welcome_panel');

        function remove_admin_menu_items()
        {

            // Remove parent nav items
            $remove_menu_items = array(
                __('Links'),
                __('Plugins'),
                __('Tools'),
                __('Settings'),
                __('Dashboard')
            );
            global $menu;
            end($menu);
            while (prev($menu)) {
                $item = explode(' ', $menu[key($menu)][0]);
                if (in_array($item[0] != null ? $item[0] : "", $remove_menu_items)) {
                    unset($menu[key($menu)]);
                }
            }
        }

        add_action('admin_menu', 'remove_admin_menu_items');

        function sb_remove_admin_menus()
        {

            // Remove submenu items
            remove_submenu_page('themes.php', 'customize.php'); // Appearance
            remove_submenu_page('themes.php', 'themes.php');
            remove_submenu_page('themes.php', 'theme-editor.php');
        }

        add_action('admin_menu', 'sb_remove_admin_menus');

        function remove_menu_pages()
        {

            // Remove advanced custom fields menu item
            remove_menu_page('edit.php?post_type=acf');
            remove_menu_page('w3tc_dashboard');
        }

        add_action('admin_menu', 'remove_menu_pages', 999);

        function remove_editor_menu()
        {

            // remove the editor submenu from appearences
            remove_action('admin_menu', '_add_themes_utility_last', 101);
        }

        add_action('_admin_menu', 'remove_editor_menu', 1);

        function remove_admin_bar_links()
        {

            global $wp_admin_bar;
            $wp_admin_bar->remove_menu('wp-logo'); // Remove the WordPress logo
            $wp_admin_bar->remove_menu('about'); // Remove the about WordPress link
            $wp_admin_bar->remove_menu('wporg'); // Remove the WordPress.org link
            $wp_admin_bar->remove_menu('documentation'); // Remove the WordPress documentation link
            $wp_admin_bar->remove_menu('support-forums'); // Remove the support forums link
            $wp_admin_bar->remove_menu('feedback'); // Remove the feedback link
            $wp_admin_bar->remove_menu('updates'); // Remove the updates link
            $wp_admin_bar->remove_menu('w3tc'); // If you use w3 total cache remove the performance link
            $wp_admin_bar->remove_menu('wpseo-menu'); // If you use w3 total cache remove the performance link
        }

        add_action('wp_before_admin_bar_render', 'remove_admin_bar_links');

    }

}

remove_dashboard_menu_items();

function wasabiweb_login_logo() { ?>
    <style type="text/css">
        body.login div#login h1 a {
            background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/build/img/site-logo.svg);
            background-size: contain;
            width: 100%;
            margin-bottom: 30px;
        }
        body.login #login {
            padding-top: 0;
            position: absolute;
            top: 50%;
            left: 50%;
            -webkit-transform: translateX(-50%) translateY(-50%);
            -moz-transform: translateX(-50%) translateY(-50%);
            transform: translateX(-50%) translateY(-50%);
        }
        body.login form {
            margin-top: 0;
            background: rgba(255,255,255,0.3);
            transition: background 0.2s;
        }
        body.login form:hover {
            background: rgba(255,255,255,0.35);
        }
        body.login form label {
            color: white;
        }
        body.login {
            background-image: -webkit-radial-gradient(circle at 50% 129%,#AD4C21 8%,#6B3015 39%,#212121 65%,#000);
            background-image: radial-gradient(circle at 50% 129%,#AD4C21 8%,#6B3015 39%,#212121 65%,#000);
        }
        body.login #backtoblog a,
        body.login #nav a {
            color: white;
        }
        body #wp-submit {
            background: #ee7844;
            height: auto;
            line-height: 40px;
            text-shadow: none;
            border: 0;
            box-shadow: none;
            font-weight: bold;
            text-transform: uppercase;
            width: 100%;
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'wasabiweb_login_logo' );
