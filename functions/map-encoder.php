<?php

function ww_get_map_information_listing( $query ) {

    $map_location_set = false;
    $map = [];

    foreach( $query->posts as $post ) {

        setup_postdata( $post );

        $ID = $post->ID;

        $image = get_field( 'images', $ID )[0]['image'];
        $image = $image['sizes']['370x222'];

        if( !$map_location_set ) {
            if( get_field( 'property_map_longitude', $ID ) && get_field( 'property_map_latitude', $ID ) ) {

                // Build JSON structure for map parameters
                $map['map'] = array(
                    'mapParams' => array(
                        'longitude' => get_field( 'property_map_longitude', $ID ),
                        'latitude'  => get_field( 'property_map_latitude', $ID ),
                        'zoom'      => 10
                    ),
                    // Create array for markers
                    'locations' => $markers['locations'] = array()
                );
                $map_location_set = true;
            }
        }

        if( get_field( 'property_map_longitude', $ID ) && get_field( 'property_map_latitude', $ID ) ) {

            $marker = array(
                'longitude' => get_field( 'property_map_longitude', $ID ),
                'latitude'  => get_field( 'property_map_latitude', $ID ),
                'area'      => get_field( 'area', $ID ),
                'street'    => get_field( 'address', $ID ),
                'price'     => get_field( 'price', $ID ) . ' ' . icl_t('Theme-form', 'Eur/month'),
                'url'       => get_permalink( $ID ),
                'img'       => $image,
            );
            array_push( $map['map']['locations'], $marker );
        }

    }

    wp_reset_postdata();

    // Create JSON and send to googlemaps.js
    return json_encode( $map, JSON_NUMERIC_CHECK );
}


function ww_get_map_information_single() {

    global $post;

    $ID = $post->ID;
    $map = [];

    $image = get_field( 'images', $ID )[0]['image'];
    $image = $image['sizes']['370x222'];

    if( get_field( 'property_map_longitude', $ID ) && get_field( 'property_map_latitude', $ID ) ) {

        // Build JSON structure for map parameters
        $map['map'] = array(
            'mapParams' => array(
                'longitude' => get_field( 'property_map_longitude', $ID ),
                'latitude'  => get_field( 'property_map_latitude', $ID ),
                'zoom'      => 10
            ),
            // Create array for markers
            'locations' => $markers['locations'] = array()
        );

        $marker = array(
            'longitude' => get_field( 'property_map_longitude', $ID ),
            'latitude'  => get_field( 'property_map_latitude', $ID ),
            'area'      => get_field( 'area', $ID ),
            'street'    => get_field( 'address', $ID ),
            'price'     => get_field( 'price', $ID ) . ' ' . icl_t('Theme-form', 'Eur/month'),
            'url'       => get_permalink( $ID ),
            'img'       => $image,
        );
        array_push( $map['map']['locations'], $marker );
    }

    return json_encode( $map, JSON_NUMERIC_CHECK );
}
