<?php

class Scripts { 

	private $jQueryVersion = '3.1.0';

	function __construct() {
		/*
		* Include jQuery the right way. Ensures there's only one version and it takes it
		* from whatever I specify!
		*/
		$this->includeJquery();
		$this->includeVendors();
	}

	function includeJquery() {
		/*
		* I leave it alone on the Admin since I don't control that.
		*/
		if(!is_admin()){
			wp_deregister_script('jquery');
			wp_register_script('jquery', ("https://ajax.googleapis.com/ajax/libs/jquery/" . $this->jQueryVersion . "/jquery.min.js"), false, null, true);
			wp_enqueue_script('jquery');
		}
	}

	function includeVendors(){
		if(!is_admin()){
			wp_enqueue_script( 'vendor', get_template_directory_uri() . '/dist/js/vendor.js', '', '', true );
		}
	}
}
$scripts = new Scripts();