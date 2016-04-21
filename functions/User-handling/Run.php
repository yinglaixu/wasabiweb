<?php

if( isset( $_POST['user_nonce'] ) ) {

	// Login/Register form sent in
	$username = $_POST['login']['email'];
	$password = $_POST['login']['password'];

	$router = new \User_Handling\Router( $username, $password );

	if( $router->validateFields() ) {

		// Input fields OK

		if ( $router->verifyNonce() ) {

			// Nonce/"Ask" field verified - Request valid

			if ( $router->isRegistration() ) {

				// Register new user
				$router->registration();

			} else {

				// Login
				$router->login();
			}
		}
	}

	$router->redirect();
}
