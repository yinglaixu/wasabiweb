<?php

if ( 'true' === $_POST['updatepropertyform'] ) {

	if ( isset( $_POST['update_property_nonce'] ) && wp_verify_nonce( $_POST['update_property_nonce'], 'update_property_validation' ) ) {

		// Is user logged in?
		if ( ! is_user_logged_in() ) {
			wp_safe_redirect( site_url() . '/login' );
			exit;
		}

		// Do this user own this property?
		$user   = wp_get_current_user();
		$obj_id = intval( $_POST['property_id'] );
		$owner  = get_field( 'owner', $obj_id );
		if ( ! ( intval( $user->ID ) === intval( $owner['ID'] ) ) ) {
			wp_safe_redirect( site_url() . '/login' );
			exit;
		};

		$property = new Renthia_Property();

		// Load the first and second ID's, continue on success
		if ( $property->loadIds( $obj_id ) ) {

			$vars = $_POST['rentout'];

			// Preparing new images
			$files = [ ];
			for ( $i = 0; $i < count( $_FILES['images']['name'] ); $i ++ ) {

				$new_file = [
					'name'     => $_FILES['images']['name'][ $i ],
					'type'     => $_FILES['images']['type'][ $i ],
					'tmp_name' => $_FILES['images']['tmp_name'][ $i ],
					'size'     => $_FILES['images']['size'][ $i ],
				];
				$files[]  = $new_file;
			}

			// Creating and inserting data/images to db/disk
			if( $vars['update-content'] ) {
				$property->mainContent = $vars['description'];
			}
			$property->price        = $vars['price'];
			$property->location     = $vars['area'];
			$property->propertyType = $vars['property-type'];
			$property->address      = $vars['address'];

			// Date save format must be: yyyymmdd
			$property->dateFrom = str_replace( '-', '', $vars['date-from'] );
			$property->dateTo   = str_replace( '-', '', $vars['date-to'] );

			$property->rooms     = $vars['rooms'];
			$property->volume    = $vars['volume'];
			$property->utilities = $vars['utils'];
			$property
				->lookUpGeoLocation()
				->updateDeleteUnwantedImages( $_POST['deleteImages'] )
				->updateAddCurrentImages()
				->saveSetImages( $files )
				->updateMetaDataInDb()
				->updatePost();

		} else {

			echo "Something went wrong with the update of the property";
			die;
		}
	}
}
