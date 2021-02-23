<?php

class simple_settings_page {
	private $options;

	public function __construct() {
		add_action( 'admin_menu', array( $this, 'add_settings_page' ) );
		add_action( 'admin_init', array( $this, 'page_init' ) );
	}

	public function add_settings_page() {
		add_menu_page(
			'Custom Settings', // Page title
			'Custom Settings Page', // Title
			'edit_pages', // Capability
			'custom-settings-page', // Url slug
			array( $this, 'create_admin_page' ) // Callback
		);
	}

	public function create_admin_page() {
		// Set class property
		$this->options = get_option( 'custom_settings' );
		?>
		<div class="wrap">
			<h2>Custom settings page</h2>           
			<form method="post" action="options.php">
			<?php
				// This prints out all hidden setting fields
				settings_fields( 'custom_settings_group' );   
				do_settings_sections( 'custom-settings-page' );
				submit_button(); 
			?>
			</form>
		</div>
	<?php
	}

	public function page_init() {
		register_setting(
			'custom_settings_group', // Option group
			'custom_settings', // Option name
			array( $this, 'sanitize' ) // Sanitize
		);

		add_settings_section(
			'custom_settings_section', // ID
			'Custom Settings', // Title
			array( $this, 'custom_settings_section' ), // Callback
			'custom-settings-page' // Page
		);

		add_settings_field(
			'custom_setting_1', // ID
			'Custom Setting 1', // Title 
			array( $this, 'custom_setting1_html' ), // Callback
			'custom-settings-page', // Page         
			'custom_settings_section'
		);

		add_settings_field(
			'custom_setting_2', 
			'Custom Setting 2', 
			array( $this, 'custom_setting2_html' ), 
			'custom-settings-page',
			'custom_settings_section'
		);
	}

	public function sanitize( $input ) {
		$sanitized_input= array();
		if( isset( $input['custom_setting_1'] ) )
			$sanitized_input['custom_setting_1'] = sanitize_text_field( $input['custom_setting_1'] );

		if( isset( $input['custom_setting_2'] ) )
			$sanitized_input['custom_setting_2'] = sanitize_text_field( $input['custom_setting_2'] );

		return $sanitized_input;
	}

	public function custom_settings_section() {
		print('Some text');
	}

	public function custom_setting1_html() {
		printf(
			'<input type="text" id="custom_setting_1" name="custom_settings[custom_setting_1]" value="%s" />',
			isset( $this->options['custom_setting_1'] ) ? esc_attr( $this->options['custom_setting_1']) : ''
		);
	}

	public function custom_setting2_html() {
		printf(
			'<input type="text" id="custom_setting_2" name="custom_settings[custom_setting_2]" value="%s" />',
			isset( $this->options['custom_setting_2'] ) ? esc_attr( $this->options['custom_setting_2']) : ''
		);
	}
}