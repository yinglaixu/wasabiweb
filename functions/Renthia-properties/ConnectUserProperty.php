<?php

class ConnectUserProperty {

	/** @var WP_User  */
	protected $user;
	/** @var WP_Post  */
	protected $first_post;
	/** @var WP_Post  */
	protected $second_post;

	/**
	 * ConnectUserProperty constructor.
	 *
	 * @param WP_User $user
	 * @param Integer $first_post_id
	 * @param Integer $second_post_id
	 */
	public function __construct( WP_User $user, $first_post_id, $second_post_id ) {

		$this->first_post = get_post( $first_post_id );
		$this->second_post = get_post( $second_post_id );
		$this->user = $user;
	}

	public function inTrash() {

		return ( $this->first_post->post_status === 'trash' && $this->second_post->post_status === 'trash' );
	}

	public function updatePostStatus() {

		$args = [
			'ID' => $this->first_post->ID,
			'post_status' => 'draft',
		];
		$args2 = [
			'ID' => $this->second_post->ID,
			'post_status' => 'draft',
		];
		wp_update_post( $args );
		wp_update_post( $args2 );

		return $this;
	}

	public function setOwner() {

		update_field( Renthia_Property::FK_OWNER, $this->user->ID, $this->first_post->ID );
		update_field( Renthia_Property::FK_CONTACT_EMAIL, $this->user->user_email, $this->first_post->ID );

		update_field( Renthia_Property::FK_OWNER, $this->user->ID, $this->second_post->ID );
		update_field( Renthia_Property::FK_CONTACT_EMAIL, $this->user->user_email, $this->second_post->ID );

		return $this;
	}
}
