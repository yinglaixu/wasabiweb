<?php

// Files used by the wp_handle_upload function
include_once ABSPATH . 'wp-admin/includes/media.php';
include_once ABSPATH . 'wp-admin/includes/file.php';
include_once ABSPATH . 'wp-admin/includes/image.php';

class Renthia_Property
{

	// ACF field keys
	// TEXT/NUMBER/DATE PICKER/RADIO BUTTON fields (one field)
	const FK_OVERVIEW_TEXT = 'field_567964acb6694';
	const FK_PRICE = 'field_567964025084b';
	const FK_LOCATION = 'field_56795baa2b7ab';
	const FK_PROPERTY_TYPE = 'field_56795baf2b7ac';
	const FK_ADDRESS = 'field_56795bb82b7ad';
	const FK_DATE_FROM = 'field_56795bdf2b7ae';
	const FK_DATE_TO = 'field_56795be42b7af';
	const FK_ROOMS = 'field_56795c762ad00';
	const FK_VOLUME = 'field_56795c7b2ad01';
	const FK_LATITUDE = 'field_567b1f42d1e54';
	const FK_LONGITUDE = 'field_567b1f55d1e55';
	// Contact person
	const FK_CONTACT_FIRST_NAME = 'field_56797d68fa05d';
	const FK_CONTACT_SURNAME = 'field_56797d74fa05e';
	const FK_CONTACT_TELEPHONE = 'field_56797d78fa05f';
	const FK_CONTACT_EMAIL = 'field_56797d84fa060';

	const FK_OWNER = 'field_56c1ab8f3abe7';

	// Landlord contract
	const FK_CONTRACT_ENTER_DATE = 'field_578de6731304a';
	const FK_CONTRACT_LANDLORD_PERSONAL_NUMBER = 'field_578de2c813035';
	const FK_CONTRACT_LANDLORD_ROOM_NUMBER = 'field_578f6499bbc11';
	const FK_CONTRACT_RENTAL_PERIOD_CHOICE = 'field_578de2db13036';
	const FK_CONTRACT_RENTAL_PERIOD_1 = 'field_578de31213037';
	const FK_CONTRACT_RENTAL_PERIOD_2_DATE_FROM = 'field_578de33213038';
	const FK_CONTRACT_RENTAL_PERIOD_2_DATE_TO = 'field_578de34213039';
	const FK_CONTRACT_RENTAL_PERIOD_3_DATE_FROM = 'field_578de4521303a';
	const FK_CONTRACT_RENTAL_PERIOD_3_DATE_TO = 'field_578de4a91303b';
	const FK_CONTRACT_FURNISHED_CONDITION = 'field_578de4ba1303c';
	const FK_CONTRACT_LANDLORD_BANK_NAME = 'field_578de4e71303d';
	const FK_CONTRACT_LANDLORD_BANK_CLEARING_NUMBER = 'field_578de50d1303e';
	const FK_CONTRACT_LANDLORD_BANK_ACCOUNT_NUMBER = 'field_578de51a1303f';
	const FK_CONTRACT_APARTMENT_RENTAL_UTILITIES = 'field_578de53313040';
	const FK_CONTRACT_ELECTRICITY_FEE = 'field_578de55d13041';
	const FK_CONTRACT_EXTRA_NOTE = 'field_578de63513047';
		// for house
	const FK_CONTRACT_HOUSE_KALLHYRA = 'field_578de57b13042';
	const FK_CONTRACT_HOUSE_RENTAL_UTILITIES = 'field_578de5c813043';
	const FK_CONTRACT_OPERATION_FEE = 'field_578de5ef13044';
	const FK_CONTRACT_KEEP_PETS = 'field_578de5ff13045';
	const FK_CONTRACT_KEY_SETS = 'field_578de62013046';

	// Tenant contract
	const FK_CONTRACT_TENANT_NAME = 'field_578de6841304b';
	const FK_CONTRACT_TENANT_PERSONAL_NUMBER = 'field_578de6931304c';
	const FK_CONTRACT_TENANT_EMAIL = 'field_578de6a51304d';
	const FK_CONTRACT_TENANT_DEPOSIT = 'field_578de6b11304e';
	const FK_CONTRACT_RENTHIA_CHARGE_PORTION = 'field_578de6c61304f';

	// CHECKBOX fields (Array)
	const FK_UTILITIES = 'field_56795cc7864e2';
	// REPEATER fields (Array with arrays - with key value pairs)
	const FK_IMAGES = 'field_56797732da095';
	const FK_SHOWINGS = 'field_567aed55c2fa2';
		// inventory list repeat lists
	const FK_INVENTORY_LIST_KITCHEN = 'field_578dda449436b';
	const FK_INVENTORY_LIST_LIVINGROOM = 'field_578dda8c9436e';
	const FK_INVENTORY_LIST_BATHROOM = 'field_578ddaec94371';
	const FK_INVENTORY_LIST_TOALETT = 'field_578ddb2594374';
	const FK_INVENTORY_LIST_BEDROOM = 'field_578ddb6e94377';
	const FK_INVENTORY_LIST_ENTRANCE = 'field_578ddbbe9437a';
	const FK_INVENTORY_LIST_OTHERS = 'field_578ddbed9437d';

	// inspection list repeat lists
	const FK_INSPECTION_LIST_KITCHEN = 'field_578dd87528fab';
	const FK_INSPECTION_LIST_LIVINGROOM = 'field_578dd8c028fad';
	const FK_INSPECTION_LIST_BATHROOM = 'field_578dd93e28faf';
	const FK_INSPECTION_LIST_TOALETT = 'field_578dd96f28fb1';
	const FK_INSPECTION_LIST_BEDROOM = 'field_578dd99528fb3';
	const FK_INSPECTION_LIST_ENTRANCE = 'field_578dd9b028fb5';
	const FK_INSPECTION_LIST_OTHERS = 'field_578dd9cf28fb7';

//	Fields not in use at the moment
//	public $overviewText;


	private $first_id;
	private $second_id;
	private $trid;
	private $latitude;
	private $longitude;

	public $mainContent;
	public $price;
	public $location;
	public $propertyType;
	public $address;
	public $dateFrom;
	public $dateTo;
	public $rooms;
	public $volume;
	public $contactFirstName;
	public $contactSurname;
	public $contactTelephone;
	public $contactEmail;
	public $owner;

	// landlord contract
	public $contractLandlordPersonalNumber;
	public $contractLandlordRoomNumber;
	public $contractRentalPeriodChoice;
	public $contractRentalPeriodF;
	public $contractRentalPeriod2DateFrom;
	public $contractRentalPeriod2DateTo;
	public $contractRentalPeriod3DateFrom;
	public $contractRentalPeriod3DateTo;
	public $contractFurnishedCondition;
	public $contractLandlordBankName;
	public $contractLandlordBankClearingNumber;
	public $contractLandlordBankAccountNumber;
	public $contractHouseKallhyra;
	public $contractElectricityFee;
	public $contractOperationFee;
	public $contractKeepPets;
	public $contractKeySets;
	public $contractLandlordExtraNote;
	// tenant contract
	public $contractEnterDate;
	public $contractTenantName;
	public $contractTenantPersonalNumber;
	public $contractTenantEmail;
	public $contractTenantDeposit;
	public $contractRenthiaChargePortion;

	/** @var  array */
	public $utilities = [];
	public $contractApartmentRentalUtilities = [];
	public $contractHouseRentalUtilities = [];
	// Repeater fields
	/** @var  array */
	private $images = [];
	/** @var  array */
	private $showings = [];
	/** @var array for inventory list*/
	public $inventoryListKitchen = [];
	private $inventoryListLivingroom = [];
	private $inventoryListBathroom = [];
	private $inventoryListToalett = [];
	private $inventoryListBedroom = [];
	private $inventoryListEntrance = [];
	private $inventoryListOthers = [];

	/** @var array for inspection list*/
	public $inspectionListKitchen = [];
	public $inspectionListLivingroom = [];
	public $inspectionListBathroom = [];
	public $inspectionListToalett = [];
	public $inspectionListBedroom = [];
	public $inspectionListEntrance = [];
	public $inspectionListOthers = [];

	public $setToDraftAfterUpdate = false;

	/**
	 * @return mixed
	 */
	public function getFirstId()
	{
		return $this->first_id;
	}

	/**
	 * @return mixed
	 */
	public function getSecondId()
	{
		return $this->second_id;
	}

	/**
	 * Creating a post in different languages and creates the translation connection
	 *
	 * @return $this
	 */
	public function makePosts()
	{

		global $sitepress;
		$lang_order = $this->getLanguageOrder();


		if ($lang_order) {
			$this->first_id = $this->createPost();
			$this->trid = intval($sitepress->get_element_trid($this->first_id));
			$this->second_id = $this->createPost();
			// Changes the language and "trid" of the second post to make the translation connection to the first post
			$sitepress->set_element_language_details($this->second_id, 'post_property', $this->trid, $lang_order[0], $lang_order[1]);
		}

		return $this;
	}


	/**
	 * Creates one post in the database, based on the current language
	 *
	 * @return int|WP_Error
	 */
	private function createPost()
	{

		$post_status = $this->owner === 0 ? 'trash' : 'draft';

		$args = [
			'post_status' => $post_status,
			'post_type' => 'property',
			'post_title' => $this->address,
			'post_content' => $this->mainContent,
		];

		$id = wp_insert_post($args);

		return $id;
	}


//	public function addCategory($country){
//
//		$sv_cat_id = array(14);
//		$nl_cat_id = array(91);
//
//		$sv_cat_id = array_map( 'intval', $sv_cat_id );
//		$sv_cat_id = array_unique( $sv_cat_id );
//
//		$nl_cat_id = array_map( 'intval', $nl_cat_id );
//		$nl_cat_id = array_unique( $nl_cat_id );
//		// set the country category of the post
//		if($country === 'Sweden' || $country === 'Sverige'){
//			wp_set_object_terms( 1733, $sv_cat_id, 'property-countries', true );
//			wp_set_object_terms( 1733, $sv_cat_id, 'property-countries', true );
//		}
//		else if($country === 'Netherlands'){
//			wp_set_object_terms( 1733, $nl_cat_id, 'property-countries', true );
//			wp_set_object_terms( 1733, $nl_cat_id, 'property-countries', true );
//		}
//
//		return $this;
//	}

	/**
	 * Take a post id and setting the first and second ids (both languages)
	 *
	 * @param int $id
	 *
	 * @return bool
	 */
	public function loadIds($id)
	{

		$first_post = get_post($id);

		if ($first_post) {

			$lang_order = $this->getLanguageOrder();

			$second_id = apply_filters('wpml_object_id', $first_post->ID, 'post', false, $lang_order[0]);

			if ($second_id) {

				$this->first_id = $first_post->ID;
				$this->second_id = $second_id;

				return true;
			}
		}

		return false;
	}


	/**
	 * Returns an array with the right language order based on the current language, called from makePosts()
	 *
	 * @return array|bool
	 */
	private function getLanguageOrder()
	{

		$currentLang = ICL_LANGUAGE_CODE;

		if ($currentLang === 'sv') {
			return ['en', 'sv'];
		} else if ($currentLang === 'en') {
			return ['sv', 'en'];
		} else if ($currentLang === 'nl') {
			return ['en', 'nl'];
		}

		return false;
	}


	/**
	 * Transforms the date and time array to the right format
	 *
	 * @param array $dates
	 * @param array $times
	 *
	 * @return $this
	 */
	public function setShowings($dates = [], $times = [])
	{
		if ($dates && $times) {
			$i = -1;
			foreach ($dates as $date) {
				$i++;
				$this->showings[] = ['time_and_date' => sprintf('%s - %s', $dates[$i], $times[$i])];
			}
		}

		return $this;
	}


	/**
	 * Saves images from $_FILES to disk/db, and creating an array according to the ACF repeater field standard
	 *
	 * @param array $files
	 *
	 * @return $this
	 */
	public function saveSetImages(array $files)
	{

		if ($files) {
			foreach ($files as $file) {

				if (count($this->images) < 6) {

					$saved_image = $this->saveImageToDisk($file);
					$saved_id = $this->saveImageToDb($saved_image);

					$this->images[] = ['image' => $saved_id, 'caption' => ''];
				}
			}
		}

		return $this;
	}


	/**
	 * Saves an image to the WP upload folder, and returns the result of wp_handle_upload()
	 *
	 * @param array $file
	 *
	 * @return array|bool
	 */
	private function saveImageToDisk(array $file)
	{

		$replace_characters = ['å', 'ä', 'ö', 'Å', 'Ä', 'Ö'];
		$replace_with = ['a', 'a', 'o', 'A', 'A', 'O'];
		$file['name'] = str_replace($replace_characters, $replace_with, $file['name']);

		$upload_override = ['test_form' => false];
		$moved_file = wp_handle_upload($file, $upload_override);

		if (isset($moved_file['error'])) {

			return false;
		}

		return $moved_file;
	}


	/**
	 * Saves the connection to an image in the db, $file should be the result of wp_handle_upload()
	 *
	 * @param array $file
	 *
	 * @return int
	 */
	private function saveImageToDb(array $file)
	{

		//$wp_upload_dir = wp_upload_dir();
		$attachment = [
			'guid' => $file['url'],
			'post_mime_type' => $file['type'],
			'post_title' => preg_replace('/\.[^.]+$/', '', basename($file['file'])),
			'post_content' => '',
			'post_status' => 'publish',
		];

		$id = wp_insert_attachment($attachment, $file['file']);
		$attach_data = wp_generate_attachment_metadata($id, $file['file']);
		wp_update_attachment_metadata($id, $attach_data);

		return $id;
	}


	/**
	 * Trying to get the latitude and longitude from the Google Maps API
	 *
	 * @return $this
	 */
	public function lookUpGeoLocation()
	{

		if ($this->address) {

			$parameter = urlencode($this->address);

			// Trying to get the geo location info from google maps
			$result = file_get_contents("http://maps.googleapis.com/maps/api/geocode/json?address=$parameter&sensor=false");
			$result = json_decode($result, true);

			if ($result['status'] === "OK") {

				// Found it!
				$this->latitude = $result['results'][0]['geometry']['location']['lat'];
				$this->longitude = $result['results'][0]['geometry']['location']['lng'];
			}

		} else {

			echo "The address must be set before 'Geo Location Lookup'";
			die;
		}

		return $this;
	}


	public function geoLocationFound()
	{

		return ($this->latitude && $this->longitude);
	}


	/**
	 * On property update, this will get the current images from db and add it to image array.
	 * Run updateDeleteUnwantedImages before this
	 *
	 * @return $this
	 */
	public function updateAddCurrentImages()
	{

		// Get the posts images
		$imagesInDb = get_field('images', $this->first_id);
		// Get all the image ID's
		$onlyDbIds = array_map(function ($item) {
			return $item['image']['id'];
		}, $imagesInDb);

		if ($onlyDbIds) {

			foreach ($onlyDbIds as $imageId) {

				// No empty rows
				if ($imageId) {

					$this->images[] = ['image' => $imageId, 'caption' => ''];
				}
			}
		}

		return $this;
	}


	/**
	 * This will delete image(s) from wordpress (db and disk)
	 *
	 * @param array $imageIds
	 *
	 * @return $this
	 */
	public function updateDeleteUnwantedImages($imageIds = [])
	{

		if ($imageIds && !is_array($imageIds)) {
			$imageIds = [$imageIds];
		}

		if ($imageIds) {

			// Translate all the stringnumbers to int
			$imageIds = array_map('intval', $imageIds);
			// Get the posts images
			$imagesInDb = get_field('images', $this->first_id);
			// Get all the image ID's
			$onlyDbIds = array_map(function ($item) {
				return $item['image']['id'];
			}, $imagesInDb);

			foreach ($imageIds as $imageId) {

				// Do the object contains this image? OK for deletion
				if (in_array($imageId, $onlyDbIds)) {

					wp_delete_attachment($imageId, true);
				}
			}
		}

		return $this;
	}


	/**
	 * Saves all the meta data to a property to the db
	 *
	 * @return $this
	 */
	public function saveMetaDataToDb()
	{

		/*
		  Skipped fields:
		  overview_text
		*/

//		$price = ICL_LANGUAGE_CODE === 'sv' ? ' kr' : ' euro';
//		$price = $this->price . $price;
		update_field(static::FK_PRICE, $this->price, $this->first_id);
		update_field(static::FK_PRICE, $this->price, $this->second_id);

		update_field(static::FK_LOCATION, $this->location, $this->first_id);
		update_field(static::FK_LOCATION, $this->location, $this->second_id);

		update_field(static::FK_PROPERTY_TYPE, $this->propertyType, $this->first_id);
		update_field(static::FK_PROPERTY_TYPE, $this->propertyType, $this->second_id);

		update_field(static::FK_ADDRESS, $this->address, $this->first_id);
		update_field(static::FK_ADDRESS, $this->address, $this->second_id);

		update_field(static::FK_DATE_FROM, $this->dateFrom, $this->first_id);
		update_field(static::FK_DATE_FROM, $this->dateFrom, $this->second_id);

		update_field(static::FK_DATE_TO, $this->dateTo, $this->first_id);
		update_field(static::FK_DATE_TO, $this->dateTo, $this->second_id);

		update_field(static::FK_ROOMS, $this->rooms, $this->first_id);
		update_field(static::FK_ROOMS, $this->rooms, $this->second_id);

		update_field(static::FK_VOLUME, $this->volume, $this->first_id);
		update_field(static::FK_VOLUME, $this->volume, $this->second_id);

		update_field(static::FK_CONTACT_FIRST_NAME, $this->contactFirstName, $this->first_id);
		update_field(static::FK_CONTACT_FIRST_NAME, $this->contactFirstName, $this->second_id);

		update_field(static::FK_CONTACT_SURNAME, $this->contactSurname, $this->first_id);
		update_field(static::FK_CONTACT_SURNAME, $this->contactSurname, $this->second_id);

		update_field(static::FK_CONTACT_TELEPHONE, $this->contactTelephone, $this->first_id);
		update_field(static::FK_CONTACT_TELEPHONE, $this->contactTelephone, $this->second_id);

		update_field(static::FK_CONTACT_EMAIL, $this->contactEmail, $this->first_id);
		update_field(static::FK_CONTACT_EMAIL, $this->contactEmail, $this->second_id);

		update_field(static::FK_UTILITIES, $this->utilities, $this->first_id);
		update_field(static::FK_UTILITIES, $this->utilities, $this->second_id);

		update_field(static::FK_IMAGES, $this->images, $this->first_id);
		update_field(static::FK_IMAGES, $this->images, $this->second_id);

		update_field(static::FK_SHOWINGS, $this->showings, $this->first_id);
		update_field(static::FK_SHOWINGS, $this->showings, $this->second_id);

		update_field(static::FK_OWNER, $this->owner, $this->first_id);
		update_field(static::FK_OWNER, $this->owner, $this->second_id);

		update_field(static::FK_LATITUDE, $this->latitude, $this->first_id);
		update_field(static::FK_LATITUDE, $this->latitude, $this->second_id);

		update_field(static::FK_LONGITUDE, $this->longitude, $this->first_id);
		update_field(static::FK_LONGITUDE, $this->longitude, $this->second_id);

		return $this;
	}


	/**
	 * Updates all the meta data to a property in the db
	 *
	 * @return $this
	 */
	public function updateMetaDataInDb()
	{

		/*
		  Skipped fields:
		  overview_text
		  property_map_longitude - IMPORTANT - put latitude here
		  property_map_latitude - IMPORTANT - put longitude here
		*/
		if ($this->priceNeedsUpdate()) {
			$price = ICL_LANGUAGE_CODE === 'sv' ? ' kr' : ' euro';
			$price = $this->price . $price;
			update_field(static::FK_PRICE, $price, $this->first_id);
			update_field(static::FK_PRICE, $price, $this->second_id);
		}

		update_field(static::FK_LOCATION, $this->location, $this->first_id);
		update_field(static::FK_LOCATION, $this->location, $this->second_id);

		update_field(static::FK_PROPERTY_TYPE, $this->propertyType, $this->first_id);
		update_field(static::FK_PROPERTY_TYPE, $this->propertyType, $this->second_id);

		update_field(static::FK_ADDRESS, $this->address, $this->first_id);
		update_field(static::FK_ADDRESS, $this->address, $this->second_id);

		update_field(static::FK_DATE_FROM, $this->dateFrom, $this->first_id);
		update_field(static::FK_DATE_FROM, $this->dateFrom, $this->second_id);

		update_field(static::FK_DATE_TO, $this->dateTo, $this->first_id);
		update_field(static::FK_DATE_TO, $this->dateTo, $this->second_id);

		update_field(static::FK_ROOMS, $this->rooms, $this->first_id);
		update_field(static::FK_ROOMS, $this->rooms, $this->second_id);

		update_field(static::FK_VOLUME, $this->volume, $this->first_id);
		update_field(static::FK_VOLUME, $this->volume, $this->second_id);

		update_field(static::FK_UTILITIES, $this->utilities, $this->first_id);
		update_field(static::FK_UTILITIES, $this->utilities, $this->second_id);

		update_field(static::FK_IMAGES, $this->images, $this->first_id);
		update_field(static::FK_IMAGES, $this->images, $this->second_id);

		update_field(static::FK_LATITUDE, $this->latitude, $this->first_id);
		update_field(static::FK_LATITUDE, $this->latitude, $this->second_id);

		update_field(static::FK_LONGITUDE, $this->longitude, $this->first_id);
		update_field(static::FK_LONGITUDE, $this->longitude, $this->second_id);

		return $this;
	}


	/**
	 * Checks if the price needs to updated
	 *
	 * @return bool
	 */
	private function priceNeedsUpdate()
	{

		$first_price = intval(get_field('price', $this->first_id));
		$second_price = intval(get_field('price', $this->second_id));
		$new_price = intval($this->price);

		if ($first_price === $new_price || $second_price === $new_price) {

			return false;
		}

		$this->setToDraftAfterUpdate = true;
		return true;
	}


	/**
	 * If main content is set, replace the content with the new content
	 *
	 * @return $this
	 */
	public function updatePost()
	{

		$first = ['ID' => $this->first_id, 'post_title' => $this->address];
		$second = ['ID' => $this->second_id, 'post_title' => $this->address];

		if ($this->mainContent) {

			$this->setToDraftAfterUpdate = true;

			$first['post_content'] = $this->mainContent;
			$second['post_content'] = $this->mainContent;
		}

		if ($this->setToDraftAfterUpdate) {

			$first['post_status'] = 'draft';
			$second['post_status'] = 'draft';
		}

		wp_update_post($first);
		wp_update_post($second);

		return $this;
	}


	// new functions for my-page

		// set inventory list
	// set kitchen inventory list data
	public function setInventoryKitchen($names = [], $counts = [])
	{

		$length = count($names);
		if ($length > 0){
			for($i = 0; $i < $length; $i++){
				$this->inventoryListKitchen[] = ['inventory_list_kitchen_name' => $names[$i] , 'inventory_list_kitchen_count' => $counts[$i]];
			}
		}
		else{
			$this->inventoryListKitchen[] = ['inventory_list_kitchen_name' => ' ', 'inventory_list_kitchen_count' => ' '];
		}
		return $this;
	}

	// set living room inventory list data
	public function setInventoryLivingroom($names = [], $counts = [])
	{

		$length = count($names);
		if ($length > 0){
			for($i = 0; $i < $length; $i++){
				$this->inventoryListLivingroom[] = ['inventory_list_livingroom_name' => $names[$i] , 'inventory_list_livingroom_count' => $counts[$i]];
			}
		}
		else{
			$this->inventoryListLivingroom[] = ['inventory_list_livingroom_name' => ' ', 'inventory_list_livingroom_count' => ' '];
		}
		return $this;
	}

	// set bathroom inventory list data
	public function setInventoryBathroom($names = [], $counts = [])
	{

		$length = count($names);
		if ($length > 0){
			for($i = 0; $i < $length; $i++){
				$this->inventoryListBathroom[] = ['inventory_list_bathroom_name' => $names[$i] , 'inventory_list_bathroom_count' => $counts[$i]];
			}
		}
		else{
			$this->inventoryListBathroom[] = ['inventory_list_bathroom_name' => ' ', 'inventory_list_bathroom_count' => ' '];
		}
		return $this;
	}

	// set toalett inventory list data
	public function setInventoryToalett($names = [], $counts = [])
	{

		$length = count($names);
		if ($length > 0){
			for($i = 0; $i < $length; $i++){
				$this->inventoryListToalett[] = ['inventory_list_toalett_name' => $names[$i] , 'inventory_list_toalett_count' => $counts[$i]];
			}
		}
		else{
			$this->inventoryListToalett[] = ['inventory_list_toalett_name' => ' ', 'inventory_list_toalett_count' => ' '];
		}
		return $this;
	}

	// set bedroom inventory list data
	public function setInventoryBedroom($names = [], $counts = [])
	{

		$length = count($names);
		if ($length > 0){
			for($i = 0; $i < $length; $i++){
				$this->inventoryListBedroom[] = ['inventory_list_bedroom_name' => $names[$i] , 'inventory_list_bedroom_count' => $counts[$i]];
			}
		}
		else{
			$this->inventoryListBedroom[] = ['inventory_list_bedroom_name' => ' ', 'inventory_list_bedroom_count' => ' '];
		}
		return $this;
	}

	// set entrance inventory list data
	public function setInventoryEntrance($names = [], $counts = [])
	{

		$length = count($names);
		if ($length > 0){
			for($i = 0; $i < $length; $i++){
				$this->inventoryListEntrance[] = ['inventory_list_entrance_name' => $names[$i] , 'inventory_list_entrance_count' => $counts[$i]];
			}
		}
		else{
			$this->inventoryListEntrance[] = ['inventory_list_entrance_name' => ' ', 'inventory_list_entrance_count' => ' '];
		}
		return $this;
	}

	// set other inventory list data
	public function setInventoryOthers($names = [], $counts = [])
	{

		$length = count($names);
		if ($length > 0){
			for($i = 0; $i < $length; $i++){
				$this->inventoryListOthers[] = ['inventory_list_others_name' => $names[$i] , 'inventory_list_others_count' => $counts[$i]];
			}
		}
		else{
			$this->inventoryListOthers[] = ['inventory_list_others_name' => ' ', 'inventory_list_others_count' => ' '];
		}
		return $this;
	}

	// save the inventory list to database
	public function saveInventoryDataInDb(){

//
//		for($i = 0; $i < $length; $i++){
//			update_row(static::FK_INVENTORY_LIST_KITCHEN, $i, $this->inventoryListKitchen[$i], $this->first_id);
//			update_row(static::FK_INVENTORY_LIST_KITCHEN, $i, $this->inventoryListKitchen[$i], $this->second_id);
//		}
		// set address as the title
		update_field(static::FK_ADDRESS, $this->address, $this->first_id);
		update_field(static::FK_ADDRESS, $this->address, $this->second_id);

		update_field(static::FK_INVENTORY_LIST_KITCHEN, $this->inventoryListKitchen, $this->first_id);
		update_field(static::FK_INVENTORY_LIST_KITCHEN, $this->inventoryListKitchen, $this->second_id);

		update_field(static::FK_INVENTORY_LIST_LIVINGROOM, $this->inventoryListLivingroom, $this->first_id);
		update_field(static::FK_INVENTORY_LIST_LIVINGROOM, $this->inventoryListLivingroom, $this->second_id);

		update_field(static::FK_INVENTORY_LIST_TOALETT, $this->inventoryListToalett, $this->first_id);
		update_field(static::FK_INVENTORY_LIST_TOALETT, $this->inventoryListToalett, $this->second_id);

		update_field(static::FK_INVENTORY_LIST_BATHROOM, $this->inventoryListBathroom, $this->first_id);
		update_field(static::FK_INVENTORY_LIST_BATHROOM, $this->inventoryListBathroom, $this->second_id);

		update_field(static::FK_INVENTORY_LIST_BEDROOM, $this->inventoryListBedroom, $this->first_id);
		update_field(static::FK_INVENTORY_LIST_BEDROOM, $this->inventoryListBedroom, $this->second_id);

		update_field(static::FK_INVENTORY_LIST_ENTRANCE, $this->inventoryListEntrance, $this->first_id);
		update_field(static::FK_INVENTORY_LIST_ENTRANCE, $this->inventoryListEntrance, $this->second_id);

		update_field(static::FK_INVENTORY_LIST_OTHERS, $this->inventoryListOthers, $this->first_id);
		update_field(static::FK_INVENTORY_LIST_OTHERS, $this->inventoryListOthers, $this->second_id);

		return $this;
	}

		// set inspection list
	// set kitchen inspection list data
	public function setInspectionKitchen($notes = [])
	{
		$length = count($notes);
		if($length > 0){
			for($i = 0; $i < $length; $i++){
				$this->inspectionListKitchen[] = ['notes' => $notes[$i]];
			}
		}
		else{
			$currentList[] = ['notes' => ' '];
		}
		return $this;
	}

	// set kitchen inspection list data
	public function setInspectionLivingroom($notes = [])
	{
		$length = count($notes);
		if($length > 0){
			for($i = 0; $i < $length; $i++){
				$this->inspectionListLivingroom[] = ['notes' => $notes[$i]];
			}
		}
		else{
			$currentList[] = ['notes' => ' '];
		}
		return $this;
	}

	// set kitchen inspection list data
	public function setInspectionBathroom($notes = [])
	{
		$length = count($notes);
		if($length > 0){
			for($i = 0; $i < $length; $i++){
				$this->inspectionListBathroom[] = ['notes' => $notes[$i]];
			}
		}
		else{
			$currentList[] = ['notes' => ' '];
		}
		return $this;
	}

	// set kitchen inspection list data
	public function setInspectionToalett($notes = [])
	{
		$length = count($notes);
		if($length > 0){
			for($i = 0; $i < $length; $i++){
				$this->inspectionListToalett[] = ['notes' => $notes[$i]];
			}
		}
		else{
			$currentList[] = ['notes' => ' '];
		}
		return $this;
	}

	// set kitchen inspection list data
	public function setInspectionBedroom($notes = [])
	{
		$length = count($notes);
		if($length > 0){
			for($i = 0; $i < $length; $i++){
				$this->inspectionListBedroom[] = ['notes' => $notes[$i]];
			}
		}
		else{
			$currentList[] = ['notes' => ' '];
		}
		return $this;
	}

	// set kitchen inspection list data
	public function setInspectionEntrance($notes = [])
	{
		$length = count($notes);
		if($length > 0){
			for($i = 0; $i < $length; $i++){
				$this->inspectionListEntrance[] = ['notes' => $notes[$i]];
			}
		}
		else{
			$currentList[] = ['notes' => ' '];
		}
		return $this;
	}

	// set kitchen inspection list data
	public function setInspectionOthers($notes = [])
	{
		$length = count($notes);
		if($length > 0){
			for($i = 0; $i < $length; $i++){
				$this->inspectionListOthers[] = ['notes' => $notes[$i]];
			}
		}
		else{
			$currentList[] = ['notes' => ' '];
		}
		return $this;
	}

	// save the inspection list to database
	public function saveInspectionDataInDb(){

//
//		for($i = 0; $i < $length; $i++){
//			update_row(static::FK_INVENTORY_LIST_KITCHEN, $i, $this->inventoryListKitchen[$i], $this->first_id);
//			update_row(static::FK_INVENTORY_LIST_KITCHEN, $i, $this->inventoryListKitchen[$i], $this->second_id);
//		}
		// set address as the title
		update_field(static::FK_ADDRESS, $this->address, $this->first_id);
		update_field(static::FK_ADDRESS, $this->address, $this->second_id);

		update_field(static::FK_INSPECTION_LIST_KITCHEN, $this->inspectionListKitchen, $this->first_id);
		update_field(static::FK_INSPECTION_LIST_KITCHEN, $this->inspectionListKitchen, $this->second_id);

		update_field(static::FK_INSPECTION_LIST_LIVINGROOM, $this->inspectionListLivingroom, $this->first_id);
		update_field(static::FK_INSPECTION_LIST_LIVINGROOM, $this->inspectionListLivingroom, $this->second_id);

		update_field(static::FK_INSPECTION_LIST_TOALETT, $this->inspectionListToalett, $this->first_id);
		update_field(static::FK_INSPECTION_LIST_TOALETT, $this->inspectionListToalett, $this->second_id);

		update_field(static::FK_INSPECTION_LIST_BATHROOM, $this->inspectionListBathroom, $this->first_id);
		update_field(static::FK_INSPECTION_LIST_BATHROOM, $this->inspectionListBathroom, $this->second_id);

		update_field(static::FK_INSPECTION_LIST_BEDROOM, $this->inspectionListBedroom, $this->first_id);
		update_field(static::FK_INSPECTION_LIST_BEDROOM, $this->inspectionListBedroom, $this->second_id);

		update_field(static::FK_INSPECTION_LIST_ENTRANCE, $this->inspectionListEntrance, $this->first_id);
		update_field(static::FK_INSPECTION_LIST_ENTRANCE, $this->inspectionListEntrance, $this->second_id);

		update_field(static::FK_INSPECTION_LIST_OTHERS, $this->inspectionListOthers, $this->first_id);
		update_field(static::FK_INSPECTION_LIST_OTHERS, $this->inspectionListOthers, $this->second_id);

		return $this;
	}

	/**
	 * save the contract data to db
	 *
	 * @return $this
	 */

	public function saveContractDataInDb()
	{
//
//		update_field( static::FK_CONTACT_FIRST_NAME, $this->contactFirstName, $this->first_id );
//		update_field( static::FK_CONTACT_FIRST_NAME, $this->contactFirstName, $this->second_id );
//
//		update_field( static::FK_CONTACT_SURNAME, $this->contactSurname, $this->first_id );
//		update_field( static::FK_CONTACT_SURNAME, $this->contactSurname, $this->second_id );

		update_field(static::FK_CONTRACT_LANDLORD_PERSONAL_NUMBER, $this->contractLandlordPersonalNumber, $this->first_id);
		update_field(static::FK_CONTRACT_LANDLORD_PERSONAL_NUMBER, $this->contractLandlordPersonalNumber, $this->second_id);

//		update_field( static::FK_ROOMS, $this->rooms, $this->first_id );
//		update_field( static::FK_ROOMS, $this->rooms, $this->second_id );
//
//		update_field( static::FK_VOLUME, $this->volume, $this->first_id );
//		update_field( static::FK_VOLUME, $this->volume, $this->second_id );

		update_field(static::FK_ADDRESS, $this->address, $this->first_id);
		update_field(static::FK_ADDRESS, $this->address, $this->second_id);

		update_field(static::FK_CONTRACT_RENTAL_PERIOD_CHOICE, $this->contractRentalPeriodChoice, $this->first_id);
		update_field(static::FK_CONTRACT_RENTAL_PERIOD_CHOICE, $this->contractRentalPeriodChoice, $this->second_id);

		update_field(static::FK_CONTRACT_LANDLORD_ROOM_NUMBER, $this->contractLandlordRoomNumber, $this->first_id);
		update_field(static::FK_CONTRACT_LANDLORD_ROOM_NUMBER, $this->contractLandlordRoomNumber, $this->second_id);

		update_field(static::FK_CONTRACT_RENTAL_PERIOD_1, $this->contractRentalPeriodF, $this->first_id);
		update_field(static::FK_CONTRACT_RENTAL_PERIOD_1, $this->contractRentalPeriodF, $this->second_id);

		update_field(static::FK_CONTRACT_RENTAL_PERIOD_2_DATE_FROM, $this->contractRentalPeriod2DateFrom, $this->first_id);
		update_field(static::FK_CONTRACT_RENTAL_PERIOD_2_DATE_FROM, $this->contractRentalPeriod2DateFrom, $this->second_id);

		update_field(static::FK_CONTRACT_RENTAL_PERIOD_2_DATE_TO, $this->contractRentalPeriod2DateTo, $this->first_id);
		update_field(static::FK_CONTRACT_RENTAL_PERIOD_2_DATE_TO, $this->contractRentalPeriod2DateTo, $this->second_id);

		update_field(static::FK_CONTRACT_RENTAL_PERIOD_3_DATE_FROM, $this->contractRentalPeriod3DateFrom, $this->first_id);
		update_field(static::FK_CONTRACT_RENTAL_PERIOD_3_DATE_FROM, $this->contractRentalPeriod3DateFrom, $this->second_id);

		update_field(static::FK_CONTRACT_RENTAL_PERIOD_3_DATE_TO, $this->contractRentalPeriod3DateTo, $this->first_id);
		update_field(static::FK_CONTRACT_RENTAL_PERIOD_3_DATE_TO, $this->contractRentalPeriod3DateTo, $this->second_id);

		update_field(static::FK_CONTRACT_FURNISHED_CONDITION, $this->contractFurnishedCondition, $this->first_id);
		update_field(static::FK_CONTRACT_FURNISHED_CONDITION, $this->contractFurnishedCondition, $this->second_id);

		update_field(static::FK_CONTRACT_LANDLORD_BANK_NAME, $this->contractLandlordBankName, $this->first_id);
		update_field(static::FK_CONTRACT_LANDLORD_BANK_NAME, $this->contractLandlordBankName, $this->second_id);

		update_field(static::FK_CONTRACT_LANDLORD_BANK_CLEARING_NUMBER, $this->contractLandlordBankClearingNumber, $this->first_id);
		update_field(static::FK_CONTRACT_LANDLORD_BANK_CLEARING_NUMBER, $this->contractLandlordBankClearingNumber, $this->second_id);

		update_field(static::FK_CONTRACT_LANDLORD_BANK_ACCOUNT_NUMBER, $this->contractLandlordBankAccountNumber, $this->first_id);
		update_field(static::FK_CONTRACT_LANDLORD_BANK_ACCOUNT_NUMBER, $this->contractLandlordBankAccountNumber, $this->second_id);

		update_field(static::FK_CONTRACT_APARTMENT_RENTAL_UTILITIES, $this->contractApartmentRentalUtilities, $this->first_id);
		update_field(static::FK_CONTRACT_APARTMENT_RENTAL_UTILITIES, $this->contractApartmentRentalUtilities, $this->second_id);

		update_field(static::FK_CONTRACT_HOUSE_KALLHYRA, $this->contractHouseKallhyra, $this->first_id);
		update_field(static::FK_CONTRACT_HOUSE_KALLHYRA, $this->contractHouseKallhyra, $this->second_id);

		update_field(static::FK_CONTRACT_HOUSE_RENTAL_UTILITIES, $this->contractHouseRentalUtilities, $this->first_id);
		update_field(static::FK_CONTRACT_HOUSE_RENTAL_UTILITIES, $this->contractHouseRentalUtilities, $this->second_id);

		update_field(static::FK_CONTRACT_OPERATION_FEE, $this->contractOperationFee, $this->first_id);
		update_field(static::FK_CONTRACT_OPERATION_FEE, $this->contractOperationFee, $this->second_id);

		update_field(static::FK_CONTRACT_ELECTRICITY_FEE, $this->contractElectricityFee, $this->first_id);
		update_field(static::FK_CONTRACT_ELECTRICITY_FEE, $this->contractElectricityFee, $this->second_id);

		update_field(static::FK_CONTRACT_KEEP_PETS, $this->contractKeepPets, $this->first_id);
		update_field(static::FK_CONTRACT_KEEP_PETS, $this->contractKeepPets, $this->second_id);

		update_field(static::FK_CONTRACT_KEY_SETS, $this->contractKeySets, $this->first_id);
		update_field(static::FK_CONTRACT_KEY_SETS, $this->contractKeySets, $this->second_id);

		update_field(static::FK_CONTRACT_EXTRA_NOTE, $this->contractLandlordExtraNote, $this->first_id);
		update_field(static::FK_CONTRACT_EXTRA_NOTE, $this->contractLandlordExtraNote, $this->second_id);

		return $this;

	}

}















