<?php

class Plugins{
	function __construct(){
		add_action('tgmpa_register', array($this, 'registerPlugins') );
	}

	function registerPlugins(){
		// The plugins array allows us to define multiple plugins we want to include.
		// The commented out example shows how we can include and activation a bundled
		// plugin zip file in our theme.
		$plugins = array(
			'name'               => 'Advanced Custom Fields Pro', // The plugin name.
			'slug'               => 'advanced-custom-fields-pro', // The plugin slug (typically the folder name).
			'source'             => get_template_directory_uri() . '/core/plugins/advanced-custom-fields-pro.zip', // The plugin source.
			'required'           => true, // If false, the plugin is only 'recommended' instead of required.
			'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
			'force_activation'   => true, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
			'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
			'external_url'       => '', // If set, overrides default API URL and points to an external URL.
			'is_callable'        => '' // If set, this callable will be be checked for availability to determine if a plugin is active.
		);

		$theme_text_domain = 'wp';

		$config = array(
			'id'           => 'epco',                 // Unique ID for hashing notices for multiple instances of TGMPA.
			'default_path' => '',                      // Default absolute path to bundled plugins.
			'menu'         => 'epco-install-plugins', // Menu slug.
			'parent_slug'  => 'themes.php',            // Parent menu slug.
			'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
			'has_notices'  => true,                    // Show admin notices or not.
			'dismissable'  => false,                    // If false, a user cannot dismiss the nag message.
			'dismiss_msg'  => 'You must have advanced custom fields installed.',                      // If 'dismissable' is false, this message will be output at top of nag.
			'is_automatic' => true,                   // Automatically activate plugins after installation or not.
			'message'      => ''
		);

		tgmpa( $plugins, $config );
	}
}
$plugins = new Plugins();