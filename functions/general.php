<?php
/**
 * Add support for PHP Redirects (Header Location)
 */
add_action('init', 'clean_output_buffer');
function clean_output_buffer()
{
    ob_start();
}

/**
 * Check if page is a parent page
 *
 * @author Andreas Glimbrant <andreas@wasabiweb.se>
 * @copyright Wasabi Web AB, 2014
 * @url http://www.wasabiweb.se
 * @version 1.0
 *
 * @global array $post
 * @return bool
 */
function is_parent()
{ 
    global $post;

    if ( is_page() && $post->post_parent ) {
        // This is a subpage
        return;

    } else {
        // This is not a subpage
        return true;
    }
    
}

/**
 * Get field from current page or parent pages
 *
 * @author Andreas Glimbrant <andreas@wasabiweb.se>
 * @copyright Wasabi Web AB, 2014
 * @url http://www.wasabiweb.se
 * @version 1.0
 *
 * @global array $post
 * @param string $field_name ACF Field name
 * @param string $id Current Page ID
 * @return mixed
 */
function get_field_parents($field_name, $id)
{
    global $post;

    for($i=1; ; $i++) {
        $field_value = get_field($field_name, $id);

        if($field_value) {
            // Field data was found, return it!
            return $field_value;
            break;

        } else {

            // No field data was found
            if($id == $post->post_parent){
                // Current page is top parent
                break;
            } else {
                // Current page doesnt have a value, check parent page
                $id = $post->post_parent;
                $field_value = get_field($field_name, $id);
                return $field_value;
                break;
            }

        }

    }

}

/**
 * Check if a post has a specific taxonomyterm
 *
 * @author Henrik Steen <henrik@wasabiweb.se>
 * @copyright Wasabi Web AB, 2015
 * @url http://www.wasabiweb.se
 * @version 1.0
 *
 * @global array $post
 * @param string $slug The terms slug
 * @return bool
 */
function custom_has_term($slug) {
    global $post;
    $tax = get_the_taxonomies( $post );
    foreach ($tax as $key => $value) {
        $terms = wp_get_post_terms( $post->ID, $key );
        foreach( $terms as $term ) {
            if( $term->slug == $slug ) {
                return true;
            }
        }
    }
    return false;
}

function ww_get_post_chain(){
    global $post;
    $current_post = $post;
    $pages = array();

    array_push( $pages, $current_post );
    while( $current_post->post_parent != 0 ) {
        $current_post = get_post( $current_post->post_parent );
        array_push( $pages, $current_post );
    }

    return $pages;
}


/**
 * Gets the top parent
 *
 * @author Henrik Steen <henrik@wasabiweb.se>
 * @copyright Wasabi Web AB, 2015
 * @url http://www.wasabiweb.se
 * @version 1.2
 *
 * @global wp_post $post
 * @param int $id Post ID (Optional)
 * @return wp_post object
 */
function ww_get_top_parent( $id = null ) {
    global $post;
    $temp_post = $id ? get_post( $id ) : $post;
    while( $temp_post->post_parent != 0 ) {
        $temp_post = get_post( $temp_post->post_parent );
    }
    return $temp_post;
}
