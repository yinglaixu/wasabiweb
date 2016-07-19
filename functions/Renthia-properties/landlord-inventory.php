<?php

if ('true' === $_POST['inventoryform']) {
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


	$mail = $GLOBALS['simplerap'];

	$mail
		->setFrom( 'noreply-renthia@oshi.wasabiweb.se', 'Renthia.com' )
		->addRecipient( get_field( 'email', 'options' ) );



	$property = new Renthia_Property();
	// Load the first and second ID's, continue on success
	if ( $property->loadIds( $obj_id ) ) {

		$mail->rapSetSuccessPage( icl_t('Theme-options', 'Apply landing page') );

		$vars = $_POST['inventory'];

		$vars = [
			'subject'   	=> 'landlord submit inventory list',
			'address'		=> $_POST['inventory']['address'],
			'landlordname'  => $_POST['inventory']['useremail'],
			'first_name'	=> $_POST['inventory']['first_name'],
			'surname'		=> $_POST['inventory']['surname']
		];


		// Creating and inserting data/images to db/disk
		$property->address      = $vars['address'];
		$property
			->setInventoryKitchen( $_POST['inventory']['kitchen-name'],  $_POST['inventory']['kitchen-count'] )
			->setInventoryLivingroom( $_POST['inventory']['livingroom-name'],  $_POST['inventory']['livingroom-count'] )
			->setInventoryBathroom( $_POST['inventory']['bathroom-name'],  $_POST['inventory']['bathroom-count'] )
			->setInventoryToalett( $_POST['inventory']['toalett-name'],  $_POST['inventory']['toalett-count'] )
			->setInventoryBedroom( $_POST['inventory']['bedroom-name'],  $_POST['inventory']['bedroom-count'] )
			->setInventoryEntrance( $_POST['inventory']['entrance-name'],  $_POST['inventory']['entrance-count'] )
			->setInventoryOthers( $_POST['inventory']['others-name'],  $_POST['inventory']['others-count'] )
			->saveInventoryDataInDb()
			->updatePost();

		$vars['inventory1'] = $property->inventoryListKitchen[0][0];
		 //Sending the main mail to Renthia
		$mail
			->rapEscapeSetVariables( $vars )
			->rapBuildSetBody( get_template_directory() . '/partials/mails/landlord-inventory-mail.php' )
			->rapSimpleSend();

	}else {

		echo "Something went wrong with the update of the property";
		die;
	}
}