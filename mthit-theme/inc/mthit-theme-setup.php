<?php
/* THEME SETUP IS USED FOR ADDING EXTRA MENU OPTIONS TO THE DASHBOARD (e.g. menus, custom options .....)
*/

// bellow is the extra theme support for our theme , e.g. extra options fot the dasboard
//this will be shown in appearence menu
add_theme_support('menus');
add_theme_support('custom-background');
add_theme_support('custom-header');

//this will be shown in post edit menu
add_theme_support('post-thumbnails');

// adding extra post formats in posts EDIT menu 
//post formats can be: ASIDE, GALLERY, IMAGE, LINK, QUOTE , STATUS, VIDEO, AUDIO, CHAT
add_theme_support('post-formats',array('aside','image','video'));

//to apply html5 formating to search form:
add_theme_support('html5',array('search-form'));
?>