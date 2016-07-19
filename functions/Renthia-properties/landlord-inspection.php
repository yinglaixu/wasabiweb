<?php

if ('true' === $_POST['inspectionform']) {
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

		$vars = $_POST['inspection'];

		$vars = [
			'subject'   	=> 'landlord submit inspection list',
			'address'		=> $_POST['inspection']['address'],
			'landlordname'  => $_POST['inspection']['useremail'],
			'first_name'	=> $_POST['inspection']['first_name'],
			'surname'		=> $_POST['inspection']['surname']
		];


		// Creating and inserting data/images to db/disk
		$property->address      = $vars['address'];
		$property
			->setInspectionKitchen($_POST['inspection']['kitchen'])
			->setInspectionLivingroom($_POST['inspection']['livingroom'])
			->setInspectionBathroom($_POST['inspection']['bathroom'])
			->setInspectionToalett($_POST['inspection']['toalett'])
			->setInspectionBedroom($_POST['inspection']['bedroom'])
			->setInspectionEntrance($_POST['inspection']['entrance'])
			->setInspectionOthers($_POST['inspection']['others'])
			->saveInspectionDataInDb()
			->updatePost();

		$vars['inspection1'] = $property->inspectionListKitchen[0];
		 //Sending the main mail to Renthia
		$mail
			->rapEscapeSetVariables( $vars )
			->rapBuildSetBody( get_template_directory() . '/partials/mails/landlord-inspection-mail.php' )
			->rapSimpleSend();

	}else {

		echo "Something went wrong with the update of the property";
		die;
	}
}