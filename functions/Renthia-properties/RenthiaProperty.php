<?php

// Files used by the wp_handle_upload function
include_once ABSPATH . 'wp-admin/includes/media.php';
include_once ABSPATH . 'wp-admin/includes/file.php';
include_once ABSPATH . 'wp-admin/includes/image.php';

class Renthia_Property {

	// ACF field keys
	// TEXT/NUMBER/DATE PICKER/RADIO BUTTON fields (one field)
	const FK_OVERVIEW_TEXT = 'field_567964acb6694';
	const FK_PRICE = 'field_567964025084b';
	const FK_LOCATION = 'field_56795baa2b7ab';
	const FK_PROPERTY_TYPE = 'field_56795baf2b7ac';
	const FK_ADDRESS = 'field_56795bb82b7ad';
	const FK_DATE_FROM = 'field_56795bdf2b7ae';
	const FK_DATE_TO = 'field_56795be42b7af';
	const FK_ROOMS = 'field_56795c762ad00';
	const FK_VOLUME = 'field_56795c7b2ad01';
	const FK_LATITUDE = 'field_567b1f42d1e54';
	const FK_LONGITUDE = 'field_567b1f55d1e55';
	// Contact person
	const FK_CONTACT_FIRST_NAME = 'field_56797d68fa05d';
	const FK_CONTACT_SURNAME = 'field_56797d74fa05e';
	const FK_CONTACT_TELEPHONE = 'field_56797d78fa05f';
	const FK_CONTACT_EMAIL = 'field_56797d84fa060';

	const FK_OWNER = 'field_56c1ab8f3abe7';

	// CHECKBOX fields (Array)
	const FK_UTILITIES = 'field_56795cc7864e2';
	// REPEATER fields (Array with arrays - with key value pairs)
	const FK_IMAGES = 'field_56797732da095';
	const FK_SHOWINGS = 'field_567aed55c2fa2';

	/*
	Fields not in use at the moment
	public $overviewText;
	*/

	private $first_id;
	private $second_id;
	private $trid;
	private $latitude;
	private $longitude;

	public $mainContent;
	public $price;
	public $location;
	public $propertyType;
	public $address;
	public $dateFrom;
	public $dateTo;
	public $rooms;
	public $volume;
	public $contactFirstName;
	public $contactSurname;
	public $contactTelephone;
	public $contactEmail;
	public $owner;
	/** @var  array */
	public $utilities = [ ];
	// Repeater fields
	/** @var  array */
	private $images = [ ];
	/** @var  array */
	private $showings = [ ];

	private $setToDraftAfterUpdate = false;

	/**
	 * @return mixed
	 */
	public function getFirstId() {
		return $this->first_id;
	}

	/**
	 * @return mixed
	 */
	public function getSecondId() {
		return $this->second_id;
	}

	/**
	 * Creating a post in different languages and creates the translation connection
	 *
	 * @return $this
	 */
	public function makePosts() {

		global $sitepress;
		$lang_order = $this->getLanguageOrder();

		if ( $lang_order ) {
			$this->first_id  = $this->createPost();
			$this->trid      = intval( $sitepress->get_element_trid( $this->first_id ) );
			$this->second_id = $this->createPost();
			// Changes the language and "trid" of the second post to make the translation connection to the first post
			$sitepress->set_element_language_details( $this->second_id, 'post_property', $this->trid, $lang_order[0], $lang_order[1] );
		}

		return $this;
	}


	/**
	 * Creates one post in the database, based on the current language
	 *
	 * @return int|WP_Error
	 */
	private function createPost() {

		$post_status = $this->owner === 0 ? 'trash' : 'draft';

		$args = [
			'post_status'  => $post_status,
			'post_type'    => 'property',
			'post_title'   => $this->address,
			'post_content' => $this->mainContent,
		];

		$id = wp_insert_post( $args );

		return $id;
	}


	/**
	 * Take a post id and setting the first and second ids (both languages)
	 *
	 * @param int $id
	 *
	 * @return bool
	 */
	public function loadIds( $id ) {

		$first_post = get_post( $id );

		if( $first_post ) {

			$lang_order = $this->getLanguageOrder();

			$second_id = apply_filters( 'wpml_object_id', $first_post->ID, 'post', false, $lang_order[0] );

			if( $second_id ) {

				$this->first_id = $first_post->ID;
				$this->second_id = $second_id;

				return true;
			}
		}

		return false;
	}


	/**
	 * Returns an array with the right language order based on the current language, called from makePosts()
	 *
	 * @return array|bool
	 */
	private function getLanguageOrder() {

		$currentLang = ICL_LANGUAGE_CODE;

		if ( $currentLang === 'sv' ) {
			return [ 'en', 'sv' ];
		} else if ( $currentLang === 'en' ) {
			return [ 'sv', 'en' ];
		}

		return false;
	}


	/**
	 * Transforms the date and time array to the right format
	 *
	 * @param array $dates
	 * @param array $times
	 *
	 * @return $this
	 */
	public function setShowings( $dates = [], $times = [] ) {
		if( $dates && $times ) {
			$i = - 1;
			foreach ( $dates as $date ) {
				$i ++;
				$this->showings[] = [ 'time_and_date' => sprintf( '%s - %s', $dates[ $i ], $times[ $i ] ) ];
			}
		}

		return $this;
	}


	/**
	 * Saves images from $_FILES to disk/db, and creating an array according to the ACF repeater field standard
	 *
	 * @param array $files
	 *
	 * @return $this
	 */
	public function saveSetImages( array $files ) {

		if( $files ) {
			foreach ( $files as $file ) {

				if( count( $this->images ) < 6 ) {

					$saved_image = $this->saveImageToDisk( $file );
					$saved_id    = $this->saveImageToDb( $saved_image );

					$this->images[] = [ 'image' => $saved_id, 'caption' => '' ];
				}
			}
		}

		return $this;
	}


	/**
	 * Saves an image to the WP upload folder, and returns the result of wp_handle_upload()
	 *
	 * @param array $file
	 *
	 * @return array|bool
	 */
	private function saveImageToDisk( array $file ) {

		$replace_characters = [ 'å', 'ä', 'ö', 'Å', 'Ä', 'Ö' ];
		$replace_with       = [ 'a', 'a', 'o', 'A', 'A', 'O' ];
		$file['name']       = str_replace( $replace_characters, $replace_with, $file['name'] );

		$upload_override = [ 'test_form' => false ];
		$moved_file      = wp_handle_upload( $file, $upload_override );

		if ( isset( $moved_file['error'] ) ) {

			return false;
		}

		return $moved_file;
	}


	/**
	 * Saves the connection to an image in the db, $file should be the result of wp_handle_upload()
	 *
	 * @param array $file
	 *
	 * @return int
	 */
	private function saveImageToDb( array $file ) {

		//$wp_upload_dir = wp_upload_dir();
		$attachment    = [
			'guid'           => $file['url'],
			'post_mime_type' => $file['type'],
			'post_title'     => preg_replace( '/\.[^.]+$/', '', basename( $file['file'] ) ),
			'post_content'   => '',
			'post_status'    => 'publish',
		];

		$id = wp_insert_attachment( $attachment, $file['file'] );
		$attach_data = wp_generate_attachment_metadata( $id, $file['file'] );
		wp_update_attachment_metadata( $id, $attach_data );

		return $id;
	}


	/**
	 * Trying to get the latitude and longitude from the Google Maps API
	 *
	 * @return $this
	 */
	public function lookUpGeoLocation() {

		if( $this->address ) {

			$parameter = urlencode( $this->address );

			// Trying to get the geo location info from google maps
			$result = file_get_contents( "http://maps.googleapis.com/maps/api/geocode/json?address=$parameter&sensor=false" );
			$result = json_decode( $result, true );

			if( $result['status'] === "OK" ) {

				// Found it!
				$this->latitude = $result['results'][0]['geometry']['location']['lat'];
				$this->longitude = $result['results'][0]['geometry']['location']['lng'];
			}

		} else {

			echo "The address must be set before 'Geo Location Lookup'";
			die;
		}

		return $this;
	}


	public function geoLocationFound() {

		return ( $this->latitude && $this->longitude );
	}


	/**
	 * On property update, this will get the current images from db and add it to image array.
	 * Run updateDeleteUnwantedImages before this
	 *
	 * @return $this
	 */
	public function updateAddCurrentImages() {

		// Get the posts images
		$imagesInDb = get_field( 'images', $this->first_id );
		// Get all the image ID's
		$onlyDbIds = array_map( function( $item ) { return $item['image']['id']; }, $imagesInDb );

		if( $onlyDbIds ) {

			foreach( $onlyDbIds as $imageId ) {

				// No empty rows
				if( $imageId ) {

					$this->images[] = [ 'image' => $imageId, 'caption' => '' ];
				}
			}
		}

		return $this;
	}


	/**
	 * This will delete image(s) from wordpress (db and disk)
	 *
	 * @param array $imageIds
	 *
	 * @return $this
	 */
	public function updateDeleteUnwantedImages( $imageIds = [] ) {

		if( $imageIds && ! is_array( $imageIds ) ) {
			$imageIds = [ $imageIds ];
		}

		if( $imageIds ) {

			// Translate all the stringnumbers to int
			$imageIds = array_map( 'intval', $imageIds );
			// Get the posts images
			$imagesInDb = get_field( 'images', $this->first_id );
			// Get all the image ID's
			$onlyDbIds = array_map( function( $item ) { return $item['image']['id']; }, $imagesInDb );

			foreach( $imageIds as $imageId ) {

				// Do the object contains this image? OK for deletion
				if( in_array( $imageId, $onlyDbIds ) ) {

					wp_delete_attachment( $imageId, true );
				}
			}
		}

		return $this;
	}


	/**
	 * Saves all the meta data to a property to the db
	 *
	 * @return $this
	 */
	public function saveMetaDataToDb() {

		/*
		  Skipped fields:
		  overview_text
		*/

		$price = ICL_LANGUAGE_CODE === 'sv' ? ' kr' : ' euro';
		$price = $this->price . $price;
		update_field( static::FK_PRICE, $price, $this->first_id );
		update_field( static::FK_PRICE, $price, $this->second_id );

		update_field( static::FK_LOCATION, $this->location, $this->first_id );
		update_field( static::FK_LOCATION, $this->location, $this->second_id );

		update_field( static::FK_PROPERTY_TYPE, $this->propertyType, $this->first_id );
		update_field( static::FK_PROPERTY_TYPE, $this->propertyType, $this->second_id );

		update_field( static::FK_ADDRESS, $this->address, $this->first_id );
		update_field( static::FK_ADDRESS, $this->address, $this->second_id );

		update_field( static::FK_DATE_FROM, $this->dateFrom, $this->first_id );
		update_field( static::FK_DATE_FROM, $this->dateFrom, $this->second_id );

		update_field( static::FK_DATE_TO, $this->dateTo, $this->first_id );
		update_field( static::FK_DATE_TO, $this->dateTo, $this->second_id );

		update_field( static::FK_ROOMS, $this->rooms, $this->first_id );
		update_field( static::FK_ROOMS, $this->rooms, $this->second_id );

		update_field( static::FK_VOLUME, $this->volume, $this->first_id );
		update_field( static::FK_VOLUME, $this->volume, $this->second_id );

		update_field( static::FK_CONTACT_FIRST_NAME, $this->contactFirstName, $this->first_id );
		update_field( static::FK_CONTACT_FIRST_NAME, $this->contactFirstName, $this->second_id );

		update_field( static::FK_CONTACT_SURNAME, $this->contactSurname, $this->first_id );
		update_field( static::FK_CONTACT_SURNAME, $this->contactSurname, $this->second_id );

		update_field( static::FK_CONTACT_TELEPHONE, $this->contactTelephone, $this->first_id );
		update_field( static::FK_CONTACT_TELEPHONE, $this->contactTelephone, $this->second_id );

		update_field( static::FK_CONTACT_EMAIL, $this->contactEmail, $this->first_id );
		update_field( static::FK_CONTACT_EMAIL, $this->contactEmail, $this->second_id );

		update_field( static::FK_UTILITIES, $this->utilities, $this->first_id );
		update_field( static::FK_UTILITIES, $this->utilities, $this->second_id );

		update_field( static::FK_IMAGES, $this->images, $this->first_id );
		update_field( static::FK_IMAGES, $this->images, $this->second_id );

		update_field( static::FK_SHOWINGS, $this->showings, $this->first_id );
		update_field( static::FK_SHOWINGS, $this->showings, $this->second_id );

		update_field( static::FK_OWNER, $this->owner, $this->first_id );
		update_field( static::FK_OWNER, $this->owner, $this->second_id );

		update_field( static::FK_LATITUDE, $this->latitude, $this->first_id );
		update_field( static::FK_LATITUDE, $this->latitude, $this->second_id );

		update_field( static::FK_LONGITUDE, $this->longitude, $this->first_id );
		update_field( static::FK_LONGITUDE, $this->longitude, $this->second_id );

		return $this;
	}


	/**
	 * Updates all the meta data to a property in the db
	 *
	 * @return $this
	 */
	public function updateMetaDataInDb() {

		/*
		  Skipped fields:
		  overview_text
		  property_map_longitude - IMPORTANT - put latitude here
		  property_map_latitude - IMPORTANT - put longitude here
		*/
		if( $this->priceNeedsUpdate() ) {
			$price = ICL_LANGUAGE_CODE === 'sv' ? ' kr' : ' euro';
			$price = $this->price . $price;
			update_field( static::FK_PRICE, $price, $this->first_id );
			update_field( static::FK_PRICE, $price, $this->second_id );
		}

		update_field( static::FK_LOCATION, $this->location, $this->first_id );
		update_field( static::FK_LOCATION, $this->location, $this->second_id );

		update_field( static::FK_PROPERTY_TYPE, $this->propertyType, $this->first_id );
		update_field( static::FK_PROPERTY_TYPE, $this->propertyType, $this->second_id );

		update_field( static::FK_ADDRESS, $this->address, $this->first_id );
		update_field( static::FK_ADDRESS, $this->address, $this->second_id );

		update_field( static::FK_DATE_FROM, $this->dateFrom, $this->first_id );
		update_field( static::FK_DATE_FROM, $this->dateFrom, $this->second_id );

		update_field( static::FK_DATE_TO, $this->dateTo, $this->first_id );
		update_field( static::FK_DATE_TO, $this->dateTo, $this->second_id );

		update_field( static::FK_ROOMS, $this->rooms, $this->first_id );
		update_field( static::FK_ROOMS, $this->rooms, $this->second_id );

		update_field( static::FK_VOLUME, $this->volume, $this->first_id );
		update_field( static::FK_VOLUME, $this->volume, $this->second_id );

		update_field( static::FK_UTILITIES, $this->utilities, $this->first_id );
		update_field( static::FK_UTILITIES, $this->utilities, $this->second_id );

		update_field( static::FK_IMAGES, $this->images, $this->first_id );
		update_field( static::FK_IMAGES, $this->images, $this->second_id );

		update_field( static::FK_LATITUDE, $this->latitude, $this->first_id );
		update_field( static::FK_LATITUDE, $this->latitude, $this->second_id );

		update_field( static::FK_LONGITUDE, $this->longitude, $this->first_id );
		update_field( static::FK_LONGITUDE, $this->longitude, $this->second_id );

		return $this;
	}


	/**
	 * Checks if the price needs to updated
	 *
	 * @return bool
	 */
	private function priceNeedsUpdate() {

		$first_price = intval( get_field( 'price', $this->first_id ) );
		$second_price = intval( get_field( 'price', $this->second_id ) );
		$new_price = intval( $this->price );

		if( $first_price === $new_price || $second_price === $new_price ) {

			return false;
		}

		$this->setToDraftAfterUpdate = true;
		return true;
	}


	/**
	 * If main content is set, replace the content with the new content
	 *
	 * @return $this
	 */
	public function updatePost() {

		$first = [ 'ID' => $this->first_id, 'post_title' => $this->address ];
		$second = [ 'ID' => $this->second_id, 'post_title' => $this->address ];

		if( $this->mainContent ) {

			$this->setToDraftAfterUpdate = true;

			$first['post_content'] = $this->mainContent;
			$second['post_content'] = $this->mainContent;
		}

		if( $this->setToDraftAfterUpdate ) {

			$first['post_status'] = 'draft';
			$second['post_status'] = 'draft';
		}

		wp_update_post( $first );
		wp_update_post( $second );
		
		return $this;
	}
}
