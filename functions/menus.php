<?php
/**
 * Add Menu support
 */
register_nav_menu('header', 'Header meny');
register_nav_menu('footer', 'Footer meny');
/**
 * Register two widget areas.
 *
 * @since Twenty Thirteen 1.0
 *
 * @return void
 */
function twentythirteen_widgets_init() {
    register_sidebar( array(
        'name'          => __( 'Main Widget Area', 'twentythirteen' ),
        'id'            => 'sidebar-1',
        'description'   => __( 'Appears in the footer section of the site.', 'twentythirteen' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Secondary Widget Area', 'twentythirteen' ),
        'id'            => 'sidebar-2',
        'description'   => __( 'Appears on posts and pages in the sidebar.', 'twentythirteen' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
}
add_action( 'widgets_init', 'twentythirteen_widgets_init' );


