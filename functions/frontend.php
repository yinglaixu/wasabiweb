<?php
/**
 * Load stylesheets
 */
function wwLoadStylesheet()
{
    wp_enqueue_style(
        'css-main',
        get_template_directory_uri() . '/build/css/style.min.css',
        '',
        '1.0.1'
    );
}

add_action('wp_enqueue_scripts', 'wwLoadStylesheet');

/**
 * Load Javascripts
 */
function wwLoadJavascript()
{


    wp_enqueue_script(
        'main-script',
        get_template_directory_uri() . '/build/js/main.min.js',
        array('jquery'),
        '1.0.6',
        true
    );

    // Load CDN version of Jquery rather than local
    // wp_deregister_script('jquery');
    // wp_enqueue_script(
    //     'jquery',
    //     'https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js',
    //     '',
    //     '',
    //     true
    // );
    // or local jQuery
     wp_enqueue_script('jquery');


    wp_register_script(
        'googlemaps-cdn',
        'http://maps.google.com/maps/api/js?sensor=false&libraries=places',
        '',
        '',
        true
    );
    if ( is_page_template( 'page-search.php' || 'property' == get_post_type() ) || is_singular( 'property' ) ) {
        wp_enqueue_script('googlemaps-cdn');

        $countries = get_terms('property-countries');
        $countries = array_values($countries);
        $cities = get_terms('property-cities');
        $cities = array_values($cities);

        // Get the objects
        $country = sanitize_text_field( $_GET['country'] ) ?: $countries[0]->slug;
        $city = sanitize_text_field( $_GET['city'] ) ?: $cities[0]->slug;
        $order = sanitize_text_field( $_GET['sort'] ) ?: 'asc';

        if ( is_single() ) {
            $single = 'true';
        }
        else {
            $single = 'false';
        }

        wp_localize_script( 
            'main-script', 
            'settings', 
            array( 
                'ajaxurl'  => get_admin_url() . 'admin-ajax.php',
                'security' => wp_create_nonce( 'ajax_nonce' ),
                'country'  => $country,
                'city'     => $city,
                'order'    => $order,
                'postid'   => get_the_ID(),
                'single'   => $single
            )
        );
    }

    
}

add_action('wp_enqueue_scripts', 'wwLoadJavascript');
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
