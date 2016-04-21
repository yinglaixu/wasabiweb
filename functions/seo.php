<?php

/**
 * Change order for Wordpress SEO box on pages and posts
 */
function change_seo_box_prio() {
	return 'low';
}

apply_filters( 'wpseo_metabox_prio', 'change_seo_box_prio' );

// Override the og:image default with acf's if set
add_filter( 'wpseo_opengraph_image',
	function ( $img ) {
		$wpseo_social_options = get_option( 'wpseo_social' );

		// If image is not set or is default
		if ( ! $img || $img == $wpseo_social_options['og_default_image'] ) {
			// Text sections in general
			if ( $image = get_field( 'side-image' ) ) {
				return $image['sizes']['large'];

				// Text sections in general
			} elseif ( $image = get_field( 'image' ) ) {
				return $image['sizes']['large'];

				// Employees portrait (single employee)
			}

			// TODO: Add elseif statements with all image fields that might be relevant as featured image
		}

		return $img;
	} );
