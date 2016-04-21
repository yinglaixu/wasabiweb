<?php

/**
 * A simple (w)rapper for Ww_Contact_Simplemail and Ww_Contact_Form_Validator
 *
 * @author Henrik Steen <henrik@wasabiweb.se>
 * @author Simplemail - Johan Palmfjord <johan@wasabiweb.se>
 * @copyright Wasabi Web Ab, 2015
 * @url http://www.wasabiweb.se
 * @version 0.1.4
 *
 * COPYRIGHT (C) Wasabi Web AB - ALL RIGHTS RESERVED
 * Unauthorized copying of this file, via any medium is strictly prohibited.
 * Proprietary and confidential
 */
class Ww_Contact_Simple_Rap extends Ww_Contact_Simplemail {

	protected $evalCode = null;
	protected $evalParams = [ ];
	private $rapBody = '';
	private $form = '';
	private $successPage = '';
	private $failPage = '';
	private $sent = false;
	private $variables = [ ];
	private $validator;


	public function __construct() {

		$this->validator = new Ww_Contact_Form_Validator();

		parent::__construct();
	}


	public function rapEscapeSetVariables( array $variables ) {

		$variables = static::rapEscapeArrayValues( $variables );

		$this->setSubject( $variables['subject'] );
		$this->variables = $variables;

		return $this;
	}


	private static function rapEscapeArrayValues( array $array ) {

		array_walk( $array, function ( &$value, $key ) {
			if ( is_array( $value ) ) {
				$value = static::rapEscapeArrayValues( $value );
			} else {
				$value = filter_var( trim( $value ), FILTER_SANITIZE_STRING );
			}
		} );

		return $array;
	}


	public function rapBuildSetBody( $file, array $variables = array() ) {

		$variables = $variables ?: $this->variables;

		$code = file_get_contents( $file );

		// if more opentags then closingtags, add closetag to the end
		if ( preg_match( '/<\?(php|=)/', $code ) > preg_match( '/\?>/', $code ) ) {
			$code .= '; ?>';
		}

		$this->rapBody = $this->rapEvaluate( $code, $variables );
		$this->setBody( $this->rapBody );

		return $this;
	}


	/**
	 * Execute php code in a "protected" environment. (However $this is always present)
	 *
	 * @param string $code The code to be executed
	 * @param array $variables Associative array of variables. Array keys gets converted to variable names.
	 *
	 * @return string
	 */
	private function rapEvaluate( $code, array $variables = array() ) {

		$this->evalCode   = $code;
		$this->evalParams = $variables;
		unset( $code, $variables );

		extract( $this->evalParams );

		ob_start();

		eval( '; ?>' . $this->evalCode . '<?php ;' );

		$this->evalCode   = null;
		$this->evalParams = array();

		return ob_get_clean();
	}


	public function rapLog( $file = null, $attachments = false ) {

		$file = $file ?: 'mails.json';
		$this->log( ABSPATH . '/' . $file, $attachments );

		return $this;
	}


	public function rapAddAttachment( array $file ) {

		$this->autoAddAttachment( $file['tmp_name'], $file['name'] );

		return $this;
	}


	public function rapSend( $error_key = '' ) {

		if ( $this->rapBody ) {

			$this->sent = $this->send();
		}

		if ( ! $this->sent && $error_key ) {

			$this->rapForceError( $error_key );
		}


		return $this;
	}


	public function rapIsSent() {

		return $this->sent;
	}


	public function rapSetFormName( $form ) {

		$this->form = $form;

		return $this;
	}


	public function rapSetSuccessPage( $page ) {

		$this->successPage = $page;

		return $this;
	}


	public function rapSetFailPage( $page ) {

		$this->failPage = $page;

		return $this;
	}


	public function rapRedirect( $successPage = '', $failPage = '' ) {

		$successPage = $successPage ?: $this->successPage;
		$failPage    = $failPage ?: $this->failPage;

		if ( $this->sent && $successPage ) {

			$form = $this->form ? '?form=' . $this->form : '';
			header( "Location: " . $successPage . $form );
			exit;

		} elseif ( ! $this->sent && $failPage ) {

			header( "Location: " . $failPage );
			exit;
		}

		return false;
	}


	public function rapSimpleSend() {

		$this->rapSend();
		$this->rapLog();
		$this->rapRedirect();

		return $this;
	}


	public function rapGetValidator() {

		return $this->validator;
	}


	public function  rapValidateRequiredField( $key, $field, $minChars = 1 ) {

		$this->validator->assertStringMinLength( $key, trim( $field ), $minChars );

		return $this;
	}


	public function rapValidateEmail( $key, $field ) {

		$this->validator->assertEmail( $key, trim( $field ) );

		return $this;
	}


	public function rapValidatePhone( $key, $field ) {

		$this->validator->assertPhoneNumber( $key, trim( $field ) );

		return $this;
	}


	public function rapValidateNumber( $key, $field ) {

		if ( ! is_numeric( $field ) ) {

			$this->validator->forceError( $key );
		}

		return $this;
	}


	public function rapValidateOr() {

		$this->validator->stateOr();

		return $this;
	}


	public function rapValidateFile( array $file, $type_error_key, array $valid_types = [ ], $limit_in_kb = 0, $size_error_key = '' ) {

		$valid_types = $valid_types ?: static::rapGetValidFileTypes();

		if ( ! in_array( $file['type'], $valid_types ) ) {

			$this->validator->forceError( $type_error_key );
		}

		if ( $limit_in_kb ) {

			$file_size_kb = intval( $file['size'] ) / 1024;

			if ( $file_size_kb > $limit_in_kb ) {

				$size_error_key = $size_error_key ?: $type_error_key;
				$this->validator->forceError( $size_error_key );
			}
		}

		return $this;
	}


	public function rapForceError( $key ) {

		$this->validator->forceError( $key );

		return $this;
	}


	public function rapCheckErrors() {

		return $this->validator->hasErrors();
	}


	public function rapCheckError( $key ) {

		return $this->validator->hasError( $key );
	}


	private static function rapGetValidFileTypes() {

		return array(
			// Image formats.
			'jpg|jpeg|jpe'                 => 'image/jpeg',
			'gif'                          => 'image/gif',
			'png'                          => 'image/png',
			'bmp'                          => 'image/bmp',
			'tiff|tif'                     => 'image/tiff',
			'ico'                          => 'image/x-icon',
			// Video formats.
			'asf|asx'                      => 'video/x-ms-asf',
			'wmv'                          => 'video/x-ms-wmv',
			'wmx'                          => 'video/x-ms-wmx',
			'wm'                           => 'video/x-ms-wm',
			'avi'                          => 'video/avi',
			'divx'                         => 'video/divx',
			'flv'                          => 'video/x-flv',
			'mov|qt'                       => 'video/quicktime',
			'mpeg|mpg|mpe'                 => 'video/mpeg',
			'mp4|m4v'                      => 'video/mp4',
			'ogv'                          => 'video/ogg',
			'webm'                         => 'video/webm',
			'mkv'                          => 'video/x-matroska',
			'3gp|3gpp'                     => 'video/3gpp', // Can also be audio
			'3g2|3gp2'                     => 'video/3gpp2', // Can also be audio
			// Text formats.
			'txt|asc|c|cc|h|srt'           => 'text/plain',
			'csv'                          => 'text/csv',
			'tsv'                          => 'text/tab-separated-values',
			'ics'                          => 'text/calendar',
			'rtx'                          => 'text/richtext',
			'css'                          => 'text/css',
			'htm|html'                     => 'text/html',
			'vtt'                          => 'text/vtt',
			'dfxp'                         => 'application/ttaf+xml',
			// Audio formats.
			'mp3|m4a|m4b'                  => 'audio/mpeg',
			'ra|ram'                       => 'audio/x-realaudio',
			'wav'                          => 'audio/wav',
			'ogg|oga'                      => 'audio/ogg',
			'mid|midi'                     => 'audio/midi',
			'wma'                          => 'audio/x-ms-wma',
			'wax'                          => 'audio/x-ms-wax',
			'mka'                          => 'audio/x-matroska',
			// Misc application formats.
			'rtf'                          => 'application/rtf',
			'js'                           => 'application/javascript',
			'pdf'                          => 'application/pdf',
			'swf'                          => 'application/x-shockwave-flash',
			'class'                        => 'application/java',
			'tar'                          => 'application/x-tar',
			'zip'                          => 'application/zip',
			'gz|gzip'                      => 'application/x-gzip',
			'rar'                          => 'application/rar',
			'7z'                           => 'application/x-7z-compressed',
			'exe'                          => 'application/x-msdownload',
			'psd'                          => 'application/octet-stream',
			'xcf'                          => 'application/octet-stream',
			// MS Office formats.
			'doc'                          => 'application/msword',
			'pot|pps|ppt'                  => 'application/vnd.ms-powerpoint',
			'wri'                          => 'application/vnd.ms-write',
			'xla|xls|xlt|xlw'              => 'application/vnd.ms-excel',
			'mdb'                          => 'application/vnd.ms-access',
			'mpp'                          => 'application/vnd.ms-project',
			'docx'                         => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
			'docm'                         => 'application/vnd.ms-word.document.macroEnabled.12',
			'dotx'                         => 'application/vnd.openxmlformats-officedocument.wordprocessingml.template',
			'dotm'                         => 'application/vnd.ms-word.template.macroEnabled.12',
			'xlsx'                         => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
			'xlsm'                         => 'application/vnd.ms-excel.sheet.macroEnabled.12',
			'xlsb'                         => 'application/vnd.ms-excel.sheet.binary.macroEnabled.12',
			'xltx'                         => 'application/vnd.openxmlformats-officedocument.spreadsheetml.template',
			'xltm'                         => 'application/vnd.ms-excel.template.macroEnabled.12',
			'xlam'                         => 'application/vnd.ms-excel.addin.macroEnabled.12',
			'pptx'                         => 'application/vnd.openxmlformats-officedocument.presentationml.presentation',
			'pptm'                         => 'application/vnd.ms-powerpoint.presentation.macroEnabled.12',
			'ppsx'                         => 'application/vnd.openxmlformats-officedocument.presentationml.slideshow',
			'ppsm'                         => 'application/vnd.ms-powerpoint.slideshow.macroEnabled.12',
			'potx'                         => 'application/vnd.openxmlformats-officedocument.presentationml.template',
			'potm'                         => 'application/vnd.ms-powerpoint.template.macroEnabled.12',
			'ppam'                         => 'application/vnd.ms-powerpoint.addin.macroEnabled.12',
			'sldx'                         => 'application/vnd.openxmlformats-officedocument.presentationml.slide',
			'sldm'                         => 'application/vnd.ms-powerpoint.slide.macroEnabled.12',
			'onetoc|onetoc2|onetmp|onepkg' => 'application/onenote',
			'oxps'                         => 'application/oxps',
			'xps'                          => 'application/vnd.ms-xpsdocument',
			// OpenOffice formats.
			'odt'                          => 'application/vnd.oasis.opendocument.text',
			'odp'                          => 'application/vnd.oasis.opendocument.presentation',
			'ods'                          => 'application/vnd.oasis.opendocument.spreadsheet',
			'odg'                          => 'application/vnd.oasis.opendocument.graphics',
			'odc'                          => 'application/vnd.oasis.opendocument.chart',
			'odb'                          => 'application/vnd.oasis.opendocument.database',
			'odf'                          => 'application/vnd.oasis.opendocument.formula',
			// WordPerfect formats.
			'wp|wpd'                       => 'application/wordperfect',
			// iWork formats.
			'key'                          => 'application/vnd.apple.keynote',
			'numbers'                      => 'application/vnd.apple.numbers',
			'pages'                        => 'application/vnd.apple.pages',
		);
	}
}
