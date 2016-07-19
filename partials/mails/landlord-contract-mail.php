<?php
/**
 * Landlord contract mail for Renthia
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
			<p><strong>First name: </strong><?php echo $first_name; ?></p>
			<p><strong>Surname: </strong><?php echo $surname; ?></p>
			<p><strong>Address: </strong><?php echo $address; ?></p>
			<p><strong>User account: </strong><?php echo $landlordname; ?></p>
		</div>
	</body>
</html>
