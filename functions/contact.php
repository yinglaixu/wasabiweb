<?php
$GLOBALS['simplerap'] = new Ww_Contact_Simple_Rap();

if ( isset( $_POST['formname'] ) ) {
	// Setting up
	$mail = $GLOBALS['simplerap'];
	$mail->rapSetFormName( $_POST['formname'] );
	$mail->setFrom( 'noreply-renthia@oshi.wasabiweb.se', 'Renthia.com' );

	if( 'true' === $_POST['applyform'] ) {

		$mail->rapSetSuccessPage( icl_t('Theme-options', 'Apply landing page') );

		$mail
			->rapValidateEmail( 'apply-email', $_POST['apply']['email'] )
			->rapValidatePhone( 'apply-phone', $_POST['apply']['telephone'] );

		if( ! $mail->rapCheckErrors() ) {

			$vars = [
				'subject'   => 'A tenant is looking for apartments',
				'property'  => $_POST['apply']['address'],
				'email'     => $_POST['apply']['email'],
				'telephone' => $_POST['apply']['telephone'],
				'date'   	=> $_POST['apply']['select-date'],
				'link'		=> $_POST['apply']['link'],
				'assistant' => $_POST['apply']['assistant-email'],
				'country'   => $_POST['apply']['country'],
				'landlordFirstname' => $_POST['apply']['landlord-firstname'],
				'landlordSurname'   => $_POST['apply']['landlord-surname'],
				'landlordTelephone' => $_POST['apply']['landlord-telephone'],
				'landlordEmail'     => $_POST['apply']['landlord-email']
			];

			if ($vars['country'] === 'Sweden' || $vars['country'] === 'Sverige' || $vars['country'] === 'Zweden'){
				$mail->addRecipient( get_field('email', 'options') );
			}
			else if($vars['country'] === 'Netherlands' || $vars['country'] === 'Nederland'){
				$mail->addRecipient( get_field('email-nl', 'options') );
			}else{
				$mail->addRecipient( get_field('email', 'options') );
			}

			$mail->addRecipient( $_POST['apply']['assistant-email']);

			$customer_mail = new Ww_Contact_Simple_Rap();
			$customer_mail
				->addRecipient( $vars['email'] )
				->setFrom( 'noreply-renthia@oshi.wasabiweb.se', 'Renthia.com' );

			// separate different emails to different countries
			if ($vars['country'] === 'Sweden' || $vars['country'] === 'Sverige' || $vars['country'] === 'Zweden'){
				$customer_mail
					->rapEscapeSetVariables($vars)
					->rapBuildSetBody( get_template_directory() . '/partials/mails/apply-customer-mail.php' )
					->setSubject('Renthia.com - Thank you for the application');
			}
			else if($vars['country'] === 'Netherlands' || $vars['country'] === 'Nederland'){
				$customer_mail
					->rapEscapeSetVariables($vars)
					->rapBuildSetBody( get_template_directory() . '/partials/mails/apply-customer-mail-dutch.php' )
					->setSubject('Renthia.com - Thank you for the application');
			}else{
				$customer_mail
					->rapEscapeSetVariables($vars)
					->rapBuildSetBody( get_template_directory() . '/partials/mails/apply-customer-mail.php' )
					->setSubject('Renthia.com - Thank you for the application');
			}

			$customer_mail->rapSend();

			$mail
				->rapEscapeSetVariables( $vars )
				->rapBuildSetBody( get_template_directory() . '/partials/mails/apply-mail.php' )
				->rapSend( 'apply-mail-fail' )
				->rapLog( 'mails_apply.json' )
				->rapRedirect();

		}
	}

	if ( 'true' === $_POST['supportform'] ) {

		$mail->rapSetSuccessPage( icl_t('Theme-options', 'Thank you page') );

		$mail
			->rapValidateRequiredField( 'support-name', $_POST['support']['name'] )
			->rapValidateRequiredField( 'support-address', $_POST['support']['address'] )
			->rapValidateEmail( 'support-email', $_POST['support']['email'] )
			->rapValidateRequiredField( 'support-message', $_POST['support']['message'], 3 );

		if ( ! $mail->rapCheckErrors() ) {

			$vars = [
				'subject'   => 'A customer needs help',
				'name'      => $_POST['support']['name'],
				'email'     => $_POST['support']['email'],
				'telephone' => $_POST['support']['telephone'],
				'problem'   => $_POST['support']['problem'],
				'country'	=> $_POST['support']['country'],
				'city'		=> $_POST['support']['city'],
				'address'	=> $_POST['support']['address'],
				'message'   => $_POST['support']['message'],
			];

			$customer_mail = new Ww_Contact_Simple_Rap();
			$customer_mail
				->addRecipient( $vars['email'] )
				->setFrom( 'noreply-renthia@oshi.wasabiweb.se', 'Renthia.com' );



			if ($vars['country'] === 'Sweden' || $vars['country'] === 'Sverige'|| $vars['country'] === 'Zweden'){

				$mail->addRecipient( get_field('support_email_sweden', 'options') );

				$customer_mail
					->rapEscapeSetVariables($vars)
					->rapBuildSetBody( get_template_directory() . '/partials/mails/support-customer-mail.php' )
					->setSubject('Renthia.com - We will get back to you');

				$customer_mail->rapSend();
			}
			else if($vars['country'] === 'Netherlands' || $vars['country'] === 'Nederland'){

				$mail->addRecipient( get_field('support_email_netherlands', 'options') );

				$customer_mail
					->rapEscapeSetVariables($vars)
					->rapBuildSetBody( get_template_directory() . '/partials/mails/support-customer-mail-dutch.php' )
					->setSubject('Renthia.com - We will get back to you');

				$customer_mail->rapSend();
			}




			$mail
				->rapEscapeSetVariables( $vars )
				->rapBuildSetBody( get_template_directory() . '/partials/mails/support-mail.php' )
				->rapSend( 'support-mail-fail' )
				->rapLog( 'mails_support.json' )
				->rapRedirect();
		}
	}
}
