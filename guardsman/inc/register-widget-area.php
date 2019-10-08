<?php
//register widget zone
function ourWidgetsInit() {

		register_sidebar( array(
			'name' => 'Blog Detail Template Area',
			'id' => 'blog_detail_widget_area',
			'description' => 'Appears in the footer area',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		) );

		register_sidebar( array(
			'name' => 'Workflow Template Area',
			'id' => 'workflow_widget_area',
			'description' => 'Appears in page lending',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		) );
}

add_action( 'widgets_init', 'ourWidgetsInit' );
