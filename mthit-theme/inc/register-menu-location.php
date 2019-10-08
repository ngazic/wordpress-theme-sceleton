<?php
/* This is for registering custom menus to the dashboard .
needs to be called on the template using wp_nav_menu() function*/
function mthit_theme_setup() {

	//first parameter is id on the page , second one is the description in the dashboard menu
	register_nav_menu('primary', 'Primary Header Navigation');
	register_nav_menu('secondary', 'Footer Navigation');
	
}
add_action('init', 'mthit_theme_setup');
?>