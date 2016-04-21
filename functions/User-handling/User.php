<?php
namespace User_Handling;

class User {

	private $username;
	private $passoword;
	private $first_name;
	private $surname;
	private $phone;
	private $email;
	private $wp_user_id;

	public function __construct( $username = '', $password = '' ) {

		$this->username = $username;
		$this->passoword = $password;
	}

	public function login() {

		$args = [
			'user_login'    => $this->username,
			'user_password' => $this->passoword,
			'remember'      => 'true',
		];

		return wp_signon( $args, false );
	}

	public function register() {

		$args = [
			'user_login'    => $this->username,
			'user_email'    => $this->username,
			'user_pass'     => $this->passoword,
			'role'          => 'subscriber',
		];

		$result = wp_insert_user( $args );

		if( ! is_wp_error( $result ) ) {

			$this->wp_user_id = $result;
		}

		return $result;
	}

	public function update( ) {

		if( $this->wp_user_id ) {

			$args = [ 'ID' => $this->wp_user_id ];

			if ( $this->first_name ) {
				$args['first_name'] = $this->first_name;
			}
			if ( $this->surname ) {
				$args['last_name'] = $this->surname;
			}
			if ( $this->phone ) {
				$args['description'] = $this->phone;
			}
			if ( $this->email ) {
				$args['user_email'] = $this->email;
			}

			wp_update_user( $args );
		}

		return $this;
	}

	public static function needUpdate() {

		$user = get_current_user_id();
		$user = get_userdata( $user );

		if( $user->first_name && $user->last_name && $user->description ) {

			return false;
		}

		return true;
	}

	/**
	 * @param mixed $email
	 */
	public function setEmail( $email ) {
		$this->email = $email;
		return $this;
	}

	/**
	 * @param mixed $wp_user_id
	 */
	public function setWpUserId( $wp_user_id ) {
		$this->wp_user_id = $wp_user_id;
		return $this;
	}

	/**
	 * @param mixed $first_name
	 */
	public function setFirstName( $first_name ) {
		$this->first_name = $first_name;
		return $this;
	}

	/**
	 * @param mixed $surname
	 */
	public function setSurname( $surname ) {
		$this->surname = $surname;
		return $this;
	}

	/**
	 * @param mixed $phone
	 */
	public function setPhone( $phone ) {
		$this->phone = $phone;
		return $this;
	}
}
