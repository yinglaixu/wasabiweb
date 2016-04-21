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

			$mail->addRecipient( get_field( 'email', 'options' ) );

			$vars = [
				'subject'   => 'En besökare har ansökt om bostad',
				'property'  => $_POST['apply']['address'],
				'email'     => $_POST['apply']['email'],
				'telephone' => $_POST['apply']['telephone'],
				'date'   	=> $_POST['apply']['select-date'],
			];

			$customer_mail = new Ww_Contact_Simple_Rap();
			$customer_mail
				->addRecipient( $vars['email'] )
				->setFrom( 'noreply-renthia@oshi.wasabiweb.se', 'Renthia.com' );
			$customer_mail
				->rapEscapeSetVariables($vars)
				->rapBuildSetBody( get_template_directory() . '/partials/mails/apply-customer-mail.php' )
				->setSubject('Renthia.com - Thank you for the application');
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
			->rapValidateEmail( 'support-email', $_POST['support']['email'] )
			->rapValidateRequiredField( 'support-message', $_POST['support']['message'], 3 );

		if ( ! $mail->rapCheckErrors() ) {

			$mail->addRecipient( get_field('email', 'options') );

			$vars = [
				'subject'   => 'En besökare behöver hjälp',
				'name'      => $_POST['support']['name'],
				'email'     => $_POST['support']['email'],
				'telephone' => $_POST['support']['telephone'],
				'problem'   => $_POST['support']['problem'],
				'message'   => $_POST['support']['message'],
			];

			$customer_mail = new Ww_Contact_Simple_Rap();
			$customer_mail
				->addRecipient( $vars['email'] )
				->setFrom( 'noreply-renthia@oshi.wasabiweb.se', 'Renthia.com' );
			$customer_mail
				->rapEscapeSetVariables($vars)
				->rapBuildSetBody( get_template_directory() . '/partials/mails/support-customer-mail.php' )
				->setSubject('Renthia.com - We will get back to you');
			$customer_mail->rapSend();

			$mail
				->rapEscapeSetVariables( $vars )
				->rapBuildSetBody( get_template_directory() . '/partials/mails/support-mail.php' )
				->rapSend( 'support-mail-fail' )
				->rapLog( 'mails_support.json' )
				->rapRedirect();
		}
	}
}
