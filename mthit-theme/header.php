<?php
//	ALL BLOG INFO STUFF GOES INTO HEAD TAG OF PAGE (title, language attributes,description for the SEO)
?>
<!doctype html>
<html <?php language_attributes();//language based on installation of wordpress ?> >
<head>
<meta charset="<?php bloginfo('charset'); ?>">
<title><?php bloginfo('name'); ?><?php wp_title('|'); ?></title>
<meta name="description" content="<?php bloginfo('description'); ?>">
	<?php
		
		/* wp_head function is necessary 
		that included styles would be added to the head tag */
		 wp_head();
	?>

</head>
<?php 
		
		if( is_front_page() ):
			$change_body_classes = array( 'front-page', 'my-class' );
		else:
			$change_body_classes = array( 'usual-page' );
		endif;
		
	?>
	
	<body <?php body_class( $change_body_classes ); ?>>

<?php wp_nav_menu(array('theme_location'=>'primary',
						'menu_class'=> 'mthit-menu')); ?>
<?php 
//in the image tag is custom theme support for customize header 
?>						
<img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="" />

<p class="header"> this is header of the page </p>