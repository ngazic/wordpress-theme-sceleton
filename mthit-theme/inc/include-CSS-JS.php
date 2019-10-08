<?php
	
function mthit_script_enqueue() {
	wp_enqueue_style('customstyle', get_template_directory_uri() . '/css/mthit.css', array(), '1.0.0', 'all');
	wp_enqueue_script('customjs', get_template_directory_uri() . '/js/mthit.js', array(), '1.0.1', true);
	
}

//we need to seperate admin from regular pages:
function admin_enqueue_scripts() {
	wp_enqueue_media();
	wp_enqueue_script( 'vendor', get_theme_file_uri( 'js/upload-admin.js' ) );
  }


add_action( 'wp_enqueue_scripts', 'mthit_script_enqueue');
add_action( 'admin_enqueue_scripts', 'admin_enqueue_scripts' );
?>