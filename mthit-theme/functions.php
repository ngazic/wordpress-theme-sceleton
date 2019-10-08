<?php
require get_template_directory() . '/inc/include-CSS-JS.php';
require get_template_directory() . '/inc/mthit-theme-setup.php';
require get_template_directory() . '/inc/register-menu-location.php';
require get_template_directory() . '/inc/register-widget-area.php';
require get_template_directory() . '/inc/register-custom-post-type.php';
require get_template_directory() . '/inc/register-custom-taxonomies.php';
require get_template_directory() . '/inc/mthit-admin-options-page.php';
require get_template_directory() . '/inc/create-meta-box-to-post.php';
require get_template_directory() . '/inc/widget-mthit.php';


/*
	===============================================================================
    Head function for hiding wordpress version in meta tag "generator" for security
	===============================================================================
*/
function mthit_remove_version_info() {
	//this must be empty string
	return '';
}
add_filter('the_generator', 'mthit_remove_version_info');