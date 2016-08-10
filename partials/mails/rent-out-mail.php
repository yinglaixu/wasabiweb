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
			<p><strong>Country: </strong><?php echo $country; ?></p>
			<p><strong>City: </strong><?php echo $city; ?></p>
			<p><strong>Area: </strong><?php echo $area; ?></p>
			<p><strong>Type of property: </strong><?php echo $property_type; ?></p>
			<p><strong>Rooms: </strong><?php echo $rooms; ?></p>
			<p><strong>Volume: </strong><?php echo $volume; ?> m2</p>
			<p><strong>Address: </strong><?php echo $address; ?></p>
			<p><strong>Postcode: </strong><?php echo $postcode; ?></p>
			<p><strong>Longitud/Latitud hittad: </strong><?php echo $geolookup; ?></p>
			<p><strong>Date from: </strong><?php echo $date_from; ?></p>
			<p><strong>Date to: </strong><?php echo $date_to; ?></p>
			<?php
				$currency = "SEK/Month";
				if ($country === 'Netherlands'||$country === 'Nederland'){
					$currency = "Eur/Month";
				}
			?>
			<p><strong>Price: </strong><?php echo $price; ?> <?php echo $currency; ?></p>
			<p><strong>Description: </strong><br><?php echo $description; ?></p>
			<?php if( is_array( $utils ) ) : ?>
			<?php $utils_merge = implode( ', ', $utils ); ?>
				<p><strong>Utilities: </strong><br><?php echo $utils_merge; ?></p>
			<?php endif; ?>
			<p>
				<strong>Open house:</strong>
				<?php for( $i = 0; $i < count( $open_date ); $i++ ) : ?>
					<br>
					<?php echo $open_date[$i] . ' - ' . $open_time[$i]; ?>
				<?php endfor; ?>
			</p>
			<p><strong>First name: </strong><?php echo $first_name; ?></p>
			<p><strong>Surname: </strong><?php echo $surname; ?></p>
			<p><strong>Telephone: </strong><?php echo $telephone; ?></p>
			<p><strong>E-mail: </strong><?php echo $email; ?></p>
			<?php if( is_array( $extras ) ) : ?>
			<?php $extras_merge = implode( ', ', $extras ); ?>
				<p><strong>Extras: </strong><br><?php echo $extras_merge; ?></p>
			<?php endif; ?>
		</div>
	</body>
</html>
