<?php
//
///**
// * Register custom post types
// */
function ww_register_post_types()
{
    /** Testimonials */
    register_post_type(
        'testimonial',
        array(
            'labels' => array(
                'name'          => 'Testimonials',
                'singular_name' => 'Testimonial',
            ),
            'description'  => 'All testimonials',
            'public'       => true,
            //'has_archive'  => true,
            'hierarchical' => true,
            //'rewrite'      => array('slug' => '/medarbetare'),
            'menu_icon'    => 'dashicons-format-quote',
        )
    );

    /** Partners */
    register_post_type(
        'partner',
        array(
            'labels' => array(
                'name'          => 'Partners',
                'singular_name' => 'Partner',
            ),
            'description'  => 'All partners',
            'public'       => true,
            //'has_archive'  => true,
            'hierarchical' => true,
            //'rewrite'      => array('slug' => '/partner'),
            'menu_icon'    => 'dashicons-thumbs-up',
        )
    );
    /** Employees */
    register_post_type(
        'employee',
        array(
            'labels' => array(
                'name'          => 'Employees',
                'singular_name' => 'Employee',
            ),
            'description'  => 'All employees',
            'public'       => true,
            //'has_archive'  => true,
            'hierarchical' => true,
            //'rewrite'      => array('slug' => '/employees'),
            'menu_icon'    => 'dashicons-businessman',
        )
    );

    /** Properties */
    register_post_type(
        'property',
        array(
            'labels' => array(
                'name'          => 'Properties',
                'singular_name' => 'Property',
            ),
            'description'  => 'All properties',
            'public'       => true,
            'has_archive'  => true,
            'hierarchical' => true,
            'rewrite'      => array('slug' => '/property'),
            'menu_icon'    => 'dashicons-admin-home',
        )
    );
    flush_rewrite_rules();
}

add_action('init', 'ww_register_post_types');

///**
// * Register taxonomies
// */
function ww_register_taxonomies()
{
    /** Organize projects */
    register_taxonomy(
        'property-countries',
        'property',
        array(
            'labels' => array(
                'name'          => 'Countries',
                'singular_name' => 'Country',
            ),
            //'rewrite'      => array('slug' => '/projekt', 'with_front' => false),
            'hierarchical' => true,
            'show_admin_column' => true
            //'has_archive'  => true,
        )
    );
    register_taxonomy(
        'property-cities',
        'property',
        array(
            'labels' => array(
                'name'          => 'Cities',
                'singular_name' => 'City',
            ),
            //'rewrite'      => array('slug' => '/projekt', 'with_front' => false),
            'hierarchical' => true,
            'show_admin_column' => true
            //'has_archive'  => true,
        )
    );

    flush_rewrite_rules();
}

add_action('init', 'ww_register_taxonomies');
