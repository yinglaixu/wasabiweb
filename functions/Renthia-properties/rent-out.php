<?php

if ( 'true' === $_POST['rentoutform'] ) {

	$mail = $GLOBALS['simplerap'];

	// Validate fields $_POST['rentout']['']
	$mail
		->rapValidateRequiredField( 'rentout-area', $_POST['rentout']['area'] )
		->rapValidateRequiredField( 'rentout-property-type', $_POST['rentout']['property-type'] )
		->rapValidateNumber( 'rentout-rooms', $_POST['rentout']['rooms'] )
		->rapValidateNumber( 'rentout-volume', $_POST['rentout']['volume'] )
		->rapValidateRequiredField( 'rentout-address', $_POST['rentout']['address'] )
		->rapValidateRequiredField( 'rentout-postcode', $_POST['rentout']['postcode'] )
		->rapValidateRequiredField( 'rentout-date-from', $_POST['rentout']['date-from'] )
		->rapValidateRequiredField( 'rentout-date-to', $_POST['rentout']['date-to'] )
		->rapValidateNumber( 'rentout-price', $_POST['rentout']['price'] )
		->rapValidateRequiredField( 'rentout-description', $_POST['rentout']['description'] );

	// Multiple image files
	for ( $i = 0; $i < count( $_FILES['images']['name'] ); $i ++ ) {

		$new_file = [
			'type' => $_FILES['images']['type'][ $i ],
			'size' => $_FILES['images']['size'][ $i ],
		];

		if ( $i > 0 ) {
			$mail->rapValidateOr();
		}

		$mail->rapValidateFile( $new_file, 'rentout-filefail',
			[
				'jpg|jpeg|jpe' => 'image/jpeg',
				'gif'          => 'image/gif',
				'png'          => 'image/png',
				'bmp'          => 'image/bmp',
			]
		);
	}

	if ( ! $mail->rapCheckErrors() ) {

		$user = is_user_logged_in() ? wp_get_current_user() : false;

		$mail
			->rapSetSuccessPage( icl_t( 'Theme-options', 'Landlord landing page' ) )
			->setFrom( 'noreply-renthia@oshi.wasabiweb.se', 'Renthia.com' )
			->addRecipient( get_field( 'email', 'options' ) );

		$vars = [
			'subject'       => 'New object for renting',
			'area'          => $_POST['rentout']['area'],
			'property_type' => $_POST['rentout']['property-type'],
			'rooms'         => $_POST['rentout']['rooms'],
			'volume'        => $_POST['rentout']['volume'],
			'address'       => $_POST['rentout']['address'],
			'postcode'      => $_POST['rentout']['postcode'],
			'date_from'     => $_POST['rentout']['date-from'],
			'date_to'       => $_POST['rentout']['date-to'],
			'price'         => $_POST['rentout']['price'],
			'description'   => $_POST['rentout']['description'],
			'utils'         => $_POST['rentout']['utils'],
			'open_date'     => $_POST['rentout']['open-date'],
			'open_time'     => $_POST['rentout']['open-time'],
			/*'first_name'    => $_POST['rentout']['firstname'],
			'surname'       => $_POST['rentout']['surname'],
			'telephone'     => $_POST['rentout']['telephone'],*/
			'extras'        => $_POST['rentout']['extras'],
		];


		$vars['email'] = $user ? $user->user_email : 'Inte inloggad/registrerad';


		$files = [ ];
		for ( $i = 0; $i < count( $_FILES['images']['name'] ); $i ++ ) {

			$new_file = [
				'name'     => $_FILES['images']['name'][ $i ],
				'type'     => $_FILES['images']['type'][ $i ],
				'tmp_name' => $_FILES['images']['tmp_name'][ $i ],
				'size'     => $_FILES['images']['size'][ $i ],
			];
			$files[]  = $new_file;
			$mail->rapAddAttachment( $new_file );
		}

		// Creating and inserting data/images to db/disk
		$property               = new Renthia_Property();
		$property->mainContent  = $vars['description'];
		$property->price        = $vars['price'];
		$property->location     = $vars['area'];
		$property->propertyType = $vars['property_type'];
		$property->address      = sprintf( '%s, %s', $vars['address'], $vars['postcode'] );

		// Date save format must be: yyyymmdd
		$property->dateFrom = str_replace( '-', '', $vars['date_from'] );
		$property->dateTo   = str_replace( '-', '', $vars['date_to'] );

		$property->rooms            = $vars['rooms'];
		$property->volume           = $vars['volume'];
		$property->utilities        = $vars['utils'];
		/*$property->contactFirstName = $vars['first_name'];
		$property->contactSurname   = $vars['surname'];
		$property->contactTelephone = $vars['telephone'];*/
		$property->contactEmail     = $vars['email'];
		$property->owner            = $user ? $user->ID : 0;
		$property
			->lookUpGeoLocation()
			->saveSetImages( $files )
			->setShowings( $vars['open_date'], $vars['open_time'] )
			->makePosts()
			->saveMetaDataToDb();

		// Did geo location lookup worked?
		$vars['geolookup'] = $property->geoLocationFound() ? 'Ja' : 'Nej';

		if( $user ) {
			// Creating and sending confirmation e-mail to the customer
			$customer_mail = new Ww_Contact_Simple_Rap();
			$customer_mail
				->addRecipient($vars['email'])
				->setFrom('noreply-renthia@oshi.wasabiweb.se', 'Renthia.com');
			$customer_mail
				->rapEscapeSetVariables($vars)
				->rapBuildSetBody(get_template_directory() . '/partials/mails/rent-out-customer-mail.php')
				->setSubject('Renthia.com - Thank you for using Renthia');
			$customer_mail->rapSend();
		} else {
			// NOT LOGGED IN
			// Set cookie to connect a user with the property in a later stage
			setcookie(
				'renthia_registration',
				$property->getFirstId() . '-' . $property->getSecondId(),
				time() + (86400 * 30),
				'/',
				'renthia.com',
				false,
				true
			);
		}

		// Sending the main mail to Renthia
		$mail
			->rapEscapeSetVariables( $vars )
			->rapBuildSetBody( get_template_directory() . '/partials/mails/rent-out-mail.php' )
			->rapSend( 'rentout-mail-fail' )
			->rapLog( 'rentout-mails.json' );

		if( $user ) {
			$mail->rapRedirect();
		} else {
			wp_safe_redirect( site_url() . '/login' );
			exit;
		}
	}
}
