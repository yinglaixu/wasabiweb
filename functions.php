<?php
/**
 * The functions file is divided into multiple files.
 * It uses an instance of \Ww_Core_Fileloader to load files, classes and interfaces
 *
 * @author Johan Palmfjord <johan@wasabiweb.se>
 * @copyright Wasabi Web Ab, 2014
 * @url http://www.wasabiweb.se
 */

// Get the file loader
if ( ! class_exists( 'Ww_Core_Fileloader' ) ) {
	require_once get_template_directory() . '/functions/Core/Fileloader.php';
}

// Setup the file loader. The file loader needs to know where to find the functions file, and that's whats passed in the
// construct
$functionFilesLoader = new \Ww_Core_Fileloader( get_template_directory() . '/functions' );

$functionFilesLoader
	// Core
	->loadClass( 'Ww_Core_Routing_Router' )
	->loadClass( 'Ww_Core_Routing_HttpHelper' )
	->loadClass( 'Ww_Core_Routing_Controller_AbstractController' )
	// Contact module
	->loadClass( 'Ww_Contact_Simplemail' )
	->loadClass( 'Ww_Contact_Form_Validator' )
	->loadClass( 'Ww_Contact_Akismet_Talker' );

// Load function files
$functionFilesLoader
	->loadFile( 'translations' )
	->loadFile( 'simplerap' )
	->loadFile( 'contact' )
	->loadFile( 'acf' )
	->loadFile( 'admin-config' )
	->loadFile( 'content' )
	->loadFile( 'post-types' )
	->loadFile( 'frontend' )
	->loadFile( 'map-encoder' )
	->loadFile( 'general' )
	->loadFile( 'header' )
	->loadFile( 'images' )
	->loadFile( 'menus' )
	->loadFile( 'seo' )
	->loadFile( '/Renthia-properties/Init' )
	->loadFile( '/User-handling/Init' );
