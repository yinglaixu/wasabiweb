<?php

namespace User_Handling;


class Router {

	private $user;
	private $username;
	private $password;
	private $validator;
	private $errors = [];


	public function __construct( $username, $password ) {

		$this->validator = new \Ww_Contact_Form_Validator();
		$this->user = new User( $username, $password );
		$this->username = $username;
		$this->password = $password;
	}

	public function validateFields() {

		$this->validator
			->assertStringMinLength( 'login-username', $this->username, 3 )
			->assertStringMinLength( 'login-password', $this->password, 1 );

		if( $this->validator->hasErrors() ) {

			$this->errors['fields-validation'] = true;
			$_SESSION['fields-validation'] = true;

			return false;

		} else {

			return true;
		}
	}

	public function verifyNonce() {

		if( wp_verify_nonce( $_POST['user_nonce'], 'user_validation' ) && ! $_POST['login']['ask'] ) {

			return true;

		} else {

			$this->errors['nonce-fail'] = true;

			return false;
		}
	}

	public function isRegistration() {

		return isset( $_POST['login']['register'] ) && $_POST['login']['register'] === 'true';
	}

	public function registration() {

		if( strlen( $this->username ) < 61 ) {

			$attempt = $this->user->register();

			if( is_wp_error( $attempt ) ) {

				$this->errors['email-already-taken'] = true;
				$_SESSION['email-already-taken'] = true;

			} else {

				// After registration, login
				$this->login();
			}

		} else {

			// Username cant be longer than 60 symbols
			$this->errors['username-too-long'] = true;
			$_SESSION['username-too-long'] = true;
		}
	}

	public function login() {

		// Try to login
		$attempt = $this->user->login();

		if( is_wp_error( $attempt ) ) {

			$this->errors['login-failed'] = true;
			$_SESSION['login-failed'] = true;

 		}
	}

	public function redirect() {

		if( $this->hasErrors() ) {

			// Somethings went wrong - Redirect to login page
			header( 'location: ' . site_url() . '/login' );
			exit;

		} else {

			// Valid user - Redirect to "my pages"
			header( 'location: ' . site_url() . '/my-pages' );
			exit;
		}

	}

	private function hasErrors() {

		return ! empty( $this->errors );
	}
}
