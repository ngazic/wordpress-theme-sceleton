<?php
//register widget zone
//needs to be called in the page with the dynamic_sidebar() function
function ourWidgetsInit() {

		register_sidebar( array(
			'name' => 'MTHIT sidebar 1',
			'id' => 'mthit_sidebar1_widget_area',
			'description' => 'Appears in the footer area',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		) );
}

add_action( 'widgets_init', 'ourWidgetsInit' );
