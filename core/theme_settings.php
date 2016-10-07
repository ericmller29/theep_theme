<?php

class ThemeSettings {
	function __construct(){
		add_action('admin_init', array($this, 'settings'));
		add_action('admin_menu', array($this, 'menu') );
	}

	function menu(){
	    add_options_page(
	    	'Theme Options',
	    	'Theme Options',
	    	'manage_options',
	    	'epco-options',
	    	array($this, 'buildPage') 	
	    );
	}

	function settings(){
		register_setting( 'pluginPage', 'epco_settings' );

		add_settings_section(
			'epco_pluginPage_section', 
			null,
			array($this, 'settingsCallback'), 
			'pluginPage'
		);

		add_settings_field( 
			'epco_copyright', 
			__( 'Copyright Text', 'wordpress' ), 
			array($this, 'copyrightRender'), 
			'pluginPage', 
			'epco_pluginPage_section' 
		);

		add_settings_field( 
			'epco_twitter', 
			__( 'Twitter URL', 'wordpress' ), 
			array($this, 'twitterRender'), 
			'pluginPage', 
			'epco_pluginPage_section' 
		);

		add_settings_field( 
			'epco_facebook', 
			__( 'Facebook URL', 'wordpress' ), 
			array($this, 'facebookRender'), 
			'pluginPage', 
			'epco_pluginPage_section' 
		);
	}

	function settingsCallback(){
		echo __( 'The options for our theme, yo.', 'wordpress' );
	}

	function copyrightRender(  ) { 

		$options = get_option( 'epco_settings' );
		echo "<input type='text' name='epco_settings[epco_copyright]' value='" . $options['epco_copyright'] . "' class='regular-text'>";

	}
	function twitterRender(  ) { 

		$options = get_option( 'epco_settings' );
		echo "<input type='text' name='epco_settings[epco_twitter]' value='" . $options['epco_twitter'] . "' class='regular-text'>";

	}
	function facebookRender(  ) { 

		$options = get_option( 'epco_settings' );
		echo "<input type='text' name='epco_settings[epco_facebook]' value='" . $options['epco_facebook'] . "' class='regular-text'>";

	}

	function buildPage(){
?>
	<div class="wrap">
		<form action='options.php' method='post'>
			<h1>EP Co</h1>
			<table class="form-table">
				<tbody>
					<?php
						settings_fields( 'pluginPage' );
						do_settings_sections( 'pluginPage' );
						submit_button();
					?>
				</tbody>
			</table>
		</form>
	</div>
<?php
	}
}
$theme_settings = new ThemeSettings();