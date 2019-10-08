<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<title><?php wp_title( '' ); ?><?php if( wp_title( '', false ) ) { echo ' :'; } ?> <?php bloginfo( 'name' );?></title>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="<?php bloginfo( 'description' ); ?>">
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
		<!-- wrapper -->
		<div class="wrapper">
			<!-- header -->
			<header class="header">
				<div class="flex-container">
					<div class="col-lg-10 col-md-11 col-xs-12">
						<div class="logo-wrap">
							<img src="<?php if( empty( esc_attr ( get_option( 'logo' ) ) ) ){
									echo get_template_directory_uri(); ?>./img/logo.png".
												<?php }
												else {
													echo esc_attr( get_option( 'logo' ) );
												} ?>" class="logo-img" alt="Logo image">
						</div>
						<?php wp_nav_menu( array( 'theme_location' => 'header', 'container_class' => 'header-nav', 'menu_class' => 'header-nav' ) );?>
					</div>
					<div class="col-lg-2 col-md-1 col-xs-12 justify-content-end">
						<div class="btn-wrap">
							<a class="button button--white" href="<?php echo esc_attr( get_option( 'button_link' ) )?>"><?php echo esc_attr( get_option( 'button_text' ) )?></a>
						</div>
					</div>
				</div>
			</header>
			<!-- /header -->