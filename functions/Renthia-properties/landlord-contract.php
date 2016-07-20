<?php

if ('true' === $_POST['contractform']) {
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

		$vars = $_POST['contract'];

		// Creating and inserting data/images to db/disk
//		$property->contactFirstName						   = $vars['firstname'];
//		$property->contactSurname					   	   = $vars['surname'];
		$property->contractLandlordPersonalNumber          = $vars['landlordpersonalnumber'];
//		$property->rooms     							   = $vars['rooms'];
//		$property->volume    							   = $vars['volume'];
		$property->address     			                   = $vars['address'];
		$property->contractLandlordRoomNumber              = $vars['roomnumber'];

		$property->contractRentalPeriodChoice			   = $vars['rental_period_choice'];
		// Date save format must be: yyyymmdd
		$property->contractRentalPeriodF 				   = str_replace( '-', '', $vars['rentalperiod1']);
		$property->contractRentalPeriod2DateFrom           = str_replace( '-', '', $vars['rentalperiod2datefrom']);
		$property->contractRentalPeriod2DateTo             = str_replace( '-', '', $vars['rentalperiod2dateto']);
		$property->contractRentalPeriod3DateFrom           = str_replace( '-', '', $vars['rentalperiod3datefrom']);
		$property->contractRentalPeriod3DateTo             = str_replace( '-', '', $vars['rentalperiod3dateto']);
		
		$property->contractFurnishedCondition              = $vars['furnishedcondition'];
		$property->contractLandlordBankName                = $vars['landlordbankname'];
		$property->contractLandlordBankClearingNumber      = $vars['landlordbankclearingnumber'];
		$property->contractLandlordBankAccountNumber       = $vars['landlordbankaccountnumber'];
		$property->contractHouseKallhyra				   = $vars['kallhyra'];
		$property->contractApartmentRentalUtilities        = $vars['apartmentrentalutilities'];
		$property->contractHouseRentalUtilities            = $vars['houserentalutilities'];
		$property->contractElectricityFee                  = $vars['electricityfee'];
		$property->contractOperationFee                    = $vars['operationfee'];
		$property->contractKeepPets                        = $vars['keeppets'];
		$property->contractKeySets                         = $vars['keysets'];
		$property->contractLandlordExtraNote               = $vars['extranote'];


		$property
			->saveContractDataInDb()
			->updatePost();

		$vars = [
			'subject'   	=> 'landlord submit contract',
			'address'		=> $_POST['contract']['address'],
			'landlordname'  => $_POST['contract']['useremail'],
			'first_name'	=> $_POST['contract']['first_name'],
			'surname'	=> $_POST['contract']['surname']
		];
		// Sending the main mail to Renthia
		$mail
			->rapEscapeSetVariables( $vars )
			->rapBuildSetBody( get_template_directory() . '/partials/mails/landlord-contract-mail.php' )
			->rapSimpleSend();

	}else {

		echo "Something went wrong with the update of the property";
		die;
	}
}