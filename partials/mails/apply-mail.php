<?php
/**
 * Contact request email
 *
 * @author Johan Palmfjord <johan@wasabiweb.se>
 * @copyright Wasabi Web Ab, 2014
 * @url http://www.wasabiweb.se
 * @version 1.0
 */

?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo $subject; ?></title>
	<style>
		body {
			font-family: sans-serif;
		}
	</style>
</head>
<body>
	<header>
		<h1><?php echo $subject; ?></h1>
	</header>
	<div class='main'>
		<h3 style="color: #33BCB1;">The tenant's information</h3>

		<p><strong>E-mail: </strong><?php echo $email; ?></p>
		<p><strong>Telephone: </strong><?php echo $telephone; ?></p>
		<p><strong>Time and date: </strong><?php echo $date; ?></p>
		<p style="margin-top: 50px;"></p>

		<h3 style="color: #33BCB1;">The property's information</h3>
		<p><strong>Property: </strong><?php echo $property; ?></p>
		<p><strong>Link of the property: </strong><?php echo $link; ?></p>
		<p><strong>Landlord Firstname: </strong><?php echo $landlordFirstname; ?></p>
		<p><strong>Landlord Surname: </strong><?php echo $landlordSurname; ?></p>
		<p><strong>Landlord Telephone: </strong><?php echo $landlordTelephone; ?></p>
		<p><strong>Landlord Email: </strong><?php echo $landlordEmail; ?></p>
		<p><strong>Asssistant Email: </strong><?php echo $assistant; ?></p>
		<p style="margin-top: 50px;"></p>

		<p>
			*Notes: It's common to miss some information from the landlords, they might don't want to fill in their telephone number or name, but there should be at least an email account to contact the landlord.<br/>
			If the email account is empty, please forward this email to: yinglai.xu@renthia.com.
		</p>

	</div>
</body>
</html>
