<?php

class Globals { 

	function __construct(){
		$this->registerGlobals();
	}

	function registerGlobals(){
		global $ep;

		$ep = array(
			'imgs' => get_template_directory_uri() . '/dist/img',
			'scripts' => get_template_directory_uri() . '/dist/js',
			'styles' => get_template_directory_uri() . '/dist/css'
		);
	}
}
$globals = new Globals();