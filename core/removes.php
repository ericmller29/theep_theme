<?php

class Removes {
	function __construct(){

		/*
		* Remove all those dumbass emojis
		*/
		add_action('init', array($this, 'removeDumbassEmojis'));
		if ( !is_admin() ) wp_deregister_script('jquery');
	}

	function removeDumbassEmojis(){
		remove_action( 'admin_print_styles', 'print_emoji_styles' );
		remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
		remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
		remove_action( 'wp_print_styles', 'print_emoji_styles' );
		remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
		remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
		remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );

		// filter to remove TinyMCE emojis
		// add_filter( 'tiny_mce_plugins', 'disable_emojicons_tinymce' );
	}
}
$removes = new Removes();