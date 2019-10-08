<?php
//the point with setting api callback is that pages, sections and fields are rendered using callbacks


//add admin page and subpage
function mthit_add_admin_page() {
	//Generate mthit Admin Page
	add_menu_page( 'mthit Theme Options', 'mthit Header & Footer', 'manage_options', 'mthit', 'mthit_theme_create_page', '', 110 );
	//Generate mthit Admin Sub Pages
	add_submenu_page( 'mthit', 'mthit Theme Options', 'General', 'manage_options', 'mthit', 'mthit_theme_create_page' );
}

//function for creating admin page
function mthit_theme_create_page() {
	require_once( get_template_directory() . '/templates/mthit-admin.php' );
}


function mthit_custom_settings () {
	$setting_group = 'mthit-setting-group';
	$header_section_id = 'mthit-header-options';
	$footer_section_id = 'mthit-footer-options';
	$page = 'mthit';
	
	//register settings: register_setting($option_group, $option_name, $sanitize_callback=“”)
	register_setting( $setting_group, 'logo' );
	register_setting( $setting_group, 'footer_title' );
	register_setting( $setting_group, 'checkbox_content' );
	
	//add sections:  add_settings_section($id, $title, $callbackForRendering, $page);
	add_settings_section( $header_section_id, 'Header Option', 'mthit_header_render_callback', $page );
	add_settings_section( $footer_section_id, 'Footer Option', 'mthit_footer_render_callback', $page );

	//header-settings-fields: add_settings_field($id, $title, $callback, $page, $section, $args = array());
	add_settings_field( 'header-logo-picture', 'Logo Picture', 'mthit_header_logo', $page, $header_section_id );
	add_settings_field( 'header-checkbox', 'header checkbox handler', 'mthit_header_checkbox_content', $page, $header_section_id );

	//footer-settings-fields: 
	add_settings_field( 'footer-title', 'Footer title handler', 'mthit_footer_title', $page, $footer_section_id );

}

//Sanitization settings
function mthit_sanitize_twitter_handler( $input ){
	$output = sanitize_text_field( $input );
	$output = str_replace( '@', '', $output );
	return $output;
}

//section rendering callbacks
function mthit_header_render_callback() {
	echo 'Customize your Header Information';
}
function mthit_footer_render_callback() {
	echo 'Customize your Header Information';
}

//fields rendering callbacks:
function mthit_header_logo() {
	$logo = esc_attr( get_option( 'logo' ) );
	echo '<input type="button" class="button button-secondary upload-button" value="Upload Logo Picture"><input type="hidden" class="upload-picture" name="logo" value="'.$logo.'" />';
}
function mthit_header_checkbox_content() {
	$checkbox_content = esc_attr( get_option( 'checkbox_content' ) );
	echo '<textarea name="checkbox_content" cols="45" placeholder="Text for checkbox" />'.$checkbox_content.'</textarea><p class="description">This is content for checkbox inside header.</p>';
}
function mthit_footer_title() {
		//making a setting field as an array: 
	$logos = array('first', 'second');
	$footer_title[] =  get_option( 'footer_title' ) ;
	//it's good practice to echo or var_dump varible to see what format is 
	// echo 'this is my echo<br>';
	// var_dump($footer_title);
	foreach($logos as $l) {
	echo '<input type="text" size="45" name="footer_title['.$l.']" value="'.$footer_title[0][$l].'" placeholder="Footer title" style="height:36px; border-radius:4px;" /><p class="description">This is title on top of footer.</p>';
}
}


//HOOKS
add_action( 'admin_menu', 'mthit_add_admin_page' );
//Activate custom settings
add_action( 'admin_init', 'mthit_custom_settings' );
