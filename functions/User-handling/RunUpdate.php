<?php

if( isset( $_POST['update_user_nonce'] ) ) {

	if( is_user_logged_in() ) {

		if ( wp_verify_nonce( $_POST['update_user_nonce'], 'update_user' ) && is_email( $_POST['update']['email'] ) ) {

			$wp_user = wp_get_current_user();

			$data = $_POST['update'];

			// UPDATE USER
			$user = new \User_Handling\User();
			$user
				->setWpUserId( $wp_user->ID )
				->setEmail( $data['email'] )
				->setFirstName( $data['firstname'] )
				->setSurname( $data['surname'] )
				->setPhone( $data['phone'] )
				->update();

			// UPDATE PROPERTY INFORMATION
			$args = [
			    'post_type' => 'property',
			    'post_status' => 'any',
				'posts_per_page' => -1,
			    'meta_query' => [
				    [
					    'key' => 'owner',
					    'value' => $wp_user->ID,
					    'compare' => '=',
				    ],
			    ],
			];
			$query = new WP_Query( $args );
			foreach( $query->posts as $item ) {

				update_field( Renthia_Property::FK_CONTACT_EMAIL, $data['email'], $item->ID );
				update_field( Renthia_Property::FK_CONTACT_FIRST_NAME, $data['firstname'], $item->ID );
				update_field( Renthia_Property::FK_CONTACT_SURNAME, $data['surname'], $item->ID );
				update_field( Renthia_Property::FK_CONTACT_TELEPHONE, $data['phone'], $item->ID );
			}
		}
	}
}
