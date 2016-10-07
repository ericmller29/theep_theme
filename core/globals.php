<?php

class Globals { 

	function __construct(){
		$this->registerGlobals();
		$this->registerOptions();
	}

	function registerGlobals(){
		global $ep;

		$ep = array(
			'imgs' => get_template_directory_uri() . '/dist/img',
			'scripts' => get_template_directory_uri() . '/dist/js',
			'styles' => get_template_directory_uri() . '/dist/css'
		);
	}

	function registerOptions(){
		add_option( 'myhack_extraction_length', '255', '', 'yes' );
	}
}
$globals = new Globals();