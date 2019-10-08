<?php
/*
@package guardsmantheme
	========================
		ADMIN PAGE
	========================
*/

function guardsMan_add_admin_page() {
	//Generate GuardsMan Admin Page
	add_menu_page( 'GuardsMan Theme Options', 'GuardsMan Header & Footer', 'manage_options', 'guardsMan', 'guardsMan_theme_create_page', '', 110 );
	//Generate GuardsMan Admin Sub Pages
	add_submenu_page( 'guardsMan', 'GuardsMan Theme Options', 'General', 'manage_options', 'guardsMan', 'guardsMan_theme_create_page' );
}

add_action( 'admin_menu', 'guardsMan_add_admin_page' );

//Activate custom settings
	add_action( 'admin_init', 'guardsMan_custom_settings' );

function guardsMan_custom_settings() {
	register_setting( 'guardsMan-settings-group', 'logo' );
	register_setting( 'guardsMan-settings-group', 'button_text' );
	register_setting( 'guardsMan-settings-group', 'button_link' );
	register_setting( 'guardsMan-settings-group', 'footer_title' );
	register_setting( 'guardsMan-settings-group', 'footer_subtitle' );
	register_setting( 'guardsMan-settings-group', 'checkbox_content' );
	register_setting( 'guardsMan-settings-group', 'twitter_handler', 'guardsman_sanitize_twitter_handler' );
	register_setting( 'guardsMan-settings-group', 'facebook_handler' );
	register_setting( 'guardsMan-settings-group', 'internet_handler' );

	add_settings_section( 'guardsMan_header_options', 'Header Option', 'guardsMan_header_options', 'guardsMan' );
	add_settings_section( 'guardsMan_footer_options', 'Footer Option', 'guardsMan_footer_options', 'guardsMan' );

	//header-settings-fields
	add_settings_field( 'header-logo-picture', 'Logo Picture', 'guardsman_header_logo', 'guardsMan', 'guardsMan_header_options' );
	add_settings_field( 'header-button-text', 'Header button text', 'guardsman_header_button_text', 'guardsMan', 'guardsMan_header_options' );
	add_settings_field( 'header-button-link', 'Header button url', 'guardsman_header_button_url', 'guardsMan', 'guardsMan_header_options' );

	//footer-settings-fields
	add_settings_field( 'footer-title', 'Footer title handler', 'guardsman_footer_title', 'guardsMan', 'guardsMan_footer_options' );
	add_settings_field( 'footer-subtitle', 'Footer subtitle handler', 'guardsman_footer_subtitle', 'guardsMan', 'guardsMan_footer_options' );
	add_settings_field( 'footer-checkbox', 'Footer checkbox handler', 'guardsman_footer_checkbox_content', 'guardsMan', 'guardsMan_footer_options' );
	add_settings_field( 'footer-twitter', 'Twitter handler', 'guardsman_footer_twitter', 'guardsMan', 'guardsMan_footer_options' );
	add_settings_field( 'footer-facebook', 'Facebook handler', 'guardsman_footer_facebook', 'guardsMan', 'guardsMan_footer_options' );
	add_settings_field( 'footer-internet', 'Internet handler', 'guardsman_footer_internet', 'guardsMan', 'guardsMan_footer_options' );
}

//Header section
function guardsMan_header_options() {
	echo 'Customize your Header Information';
}

function guardsman_header_logo() {
	$logo = esc_attr( get_option( 'logo' ) );
	echo '<input type="button" class="button button-secondary upload-button" value="Upload Logo Picture"><input type="hidden" class="upload-picture" name="logo" value="'.$logo.'" />';
}

function guardsman_header_button_text() {
	$button_text = esc_attr( get_option( 'button_text' ) );
	echo '<input type="text" size="45" name="button_text" value="'.$button_text.'" placeholder="Enter text for button" style="height:36px; border-radius:4px;" /><p class="description">This is text for button on right side of header</p>';
}

function guardsman_header_button_url() {
	$button_link = esc_attr( get_option( 'button_link' ) );
	echo '<input type="url" size="45" name="button_link" value="'.$button_link.'" placeholder="Enter link for button" style="height:36px; border-radius:4px;" /><p class="description">This is url for button on right side of header</p>';
}

//Footer section
function guardsMan_footer_options() {
	echo 'Customize your Footer Information';
}

function guardsman_footer_title() {
	$footer_title = esc_attr( get_option( 'footer_title' ) );
	echo '<input type="text" size="45" name="footer_title" value="'.$footer_title.'" placeholder="Footer title" style="height:36px; border-radius:4px;" /><p class="description">This is title on top of footer.</p>';
}

function guardsman_footer_subtitle() {
	$footer_subtitle = esc_attr( get_option( 'footer_subtitle' ) );
	echo '<input type="text" size="45" name="footer_subtitle" value="'.$footer_subtitle.'" placeholder="Footer subtitle" style="height:36px;border-radius:4px;" /><p class="description">This is content bellow the footer title.</p>';
}

function guardsman_footer_checkbox_content() {
	$checkbox_content = esc_attr( get_option( 'checkbox_content' ) );
	echo '<textarea name="checkbox_content" cols="45" placeholder="Text for checkbox" />'.$checkbox_content.'</textarea><p class="description">This is content for checkbox inside footer.</p>';
}

function guardsman_footer_twitter() {
	$twitter = esc_attr( get_option( 'twitter_handler' ) );
	echo '<input type="url" size="45" name="twitter_handler" value="'.$twitter.'" placeholder="Twitter handler" style="height:36px; border-radius:4px;" /><p class="description">Insert url with https://</p>';
}

function guardsman_footer_facebook() {
	$facebook = esc_attr( get_option( 'facebook_handler' ) );
	echo '<input type="url" size="45" name="facebook_handler" value="'.$facebook.'" placeholder="Facebook handler" style="height:36px; border-radius:4px;" /><p class="description">Insert url with https://</p>';
}

function guardsman_footer_internet() {
	$internet_handler = esc_attr( get_option( 'internet_handler' ) );
	echo '<input type="url" size="45" name="internet_handler" value="'.$internet_handler.'" placeholder="Website handler" style="height:36px; border-radius:4px;" /><p class="description">Insert url with https://</p>';
}

//Sanitization settings
function guardsman_sanitize_twitter_handler( $input ){
	$output = sanitize_text_field( $input );
	$output = str_replace( '@', '', $output );
	return $output;
}

function guardsMan_theme_create_page() {
	require_once( get_template_directory() . '/templates/guardsMan-admin.php' );
}