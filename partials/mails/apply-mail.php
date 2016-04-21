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
		<p><strong>Property: </strong><?php echo $property; ?></p>
		<p><strong>E-mail: </strong><?php echo $email; ?></p>
		<p><strong>Telephone: </strong><?php echo $telephone; ?></p>
		<p><strong>Time and date: </strong><?php echo $date; ?></p>
	</div>
</body>
</html>
