<?php

if( is_user_logged_in() && isset( $_COOKIE['renthia_registration'] ) ) {

	$split = explode( '-', $_COOKIE['renthia_registration'] );
	$user = wp_get_current_user();

	if( count( $split ) === 2 ) {

		$split = array_map( function( $item ){ return intval( $item ); }, $split );

		$connect = new ConnectUserProperty( $user, $split[0], $split[1] );

		if( $connect->inTrash() ) {

			$connect
				->setOwner()
				->updatePostStatus();
		}
	}

	setcookie(
		'renthia_registration',
		'',
		time() - 3600,
		'/',
		'renthia.com',
		false,
		true);
}
