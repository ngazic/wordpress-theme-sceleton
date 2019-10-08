<?php

// Customize Appearance Options
function guardsman_customize_register( $wp_customize ) {

    //settings = database 
    //controls = UI
    //sections = groups

	$wp_customize->add_setting('gardsman_header_btn_color', array(
		'default' => '#00a4a6',
		'transport' => 'refresh',
	));

	$wp_customize->add_setting('gardsman_header_btn_background_color', array(
		'default' => '#fff',
		'transport' => 'refresh',
	));
    
	$wp_customize->add_setting('gardsman_btn_hover_color', array(
        'default' => '#004C87',
		'transport' => 'refresh',
    ));
    
    $wp_customize->add_setting('gardsman_footer_btn_color', array(
		'default' => '#fff',
		'transport' => 'refresh',
	));

    
    $wp_customize->add_setting('gardsman_footer_btn_background_color', array(
        'default' => '#00a4a6',
        'transport' => 'refresh',
    ));

	$wp_customize->add_section('gardsman_standard_colors', array(
		'title' => __('Gardsman Standard Colors', 'gardsmanWordPress'),
		'priority' => 30,
	));


	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'gardsman_header_btn_color', array(
		'label' => __('Header Button Color', 'gardsmanWordPress'),
		'section' => 'gardsman_standard_colors',
		'settings' => 'gardsman_header_btn_color',
	) ) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'gardsman_header_btn_background_color', array(
		'label' => __('Header Button Background Color', 'gardsmanWordPress'),
		'section' => 'gardsman_standard_colors',
		'settings' => 'gardsman_header_btn_background_color',
	) ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'gardsman_btn_hover_color', array(
		'label' => __('Button Hover Color', 'gardsmanWordPress'),
		'section' => 'gardsman_standard_colors',
		'settings' => 'gardsman_btn_hover_color',
	) ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'gardsman_footer_btn_color', array(
        'label' => __('Footer Button  Color', 'gardsmanWordPress'),
        'section' => 'gardsman_standard_colors',
        'settings' => 'gardsman_footer_btn_color',
    ) ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'gardsman_footer_btn_background_color', array(
		'label' => __('Footer Button Background Color', 'gardsmanWordPress'),
		'section' => 'gardsman_standard_colors',
		'settings' => 'gardsman_footer_btn_background_color',
    ) ) );
    

}

add_action('customize_register', 'guardsman_customize_register');





// Output Customize CSS
function learningWordPress_customize_css() { ?>

	<style type="text/css">

        
        .button:hover {
            background-color: <?php echo get_theme_mod('gardsman_btn_hover_color'); ?>;
            
        }
        .button {
            color: <?php echo get_theme_mod('gardsman_footer_btn_color'); ?>;
			background-color: <?php echo get_theme_mod('gardsman_footer_btn_background_color'); ?>;
            
        }
        
        .button--white {
            color: <?php echo get_theme_mod('gardsman_header_btn_color'); ?>;
            background-color: <?php echo get_theme_mod('gardsman_header_btn_background_color'); ?>;
        }

	</style>

<?php }

add_action('wp_head', 'learningWordPress_customize_css');

// Add Footer callout section to admin appearance customize screen
function gardsman_footer_callout($wp_customize) {
	$wp_customize->add_section('gardsman-footer-callout-section', array(
		'title' => 'Footer '
	));



	$wp_customize->add_setting('gardsman-footer-callout-image');

	$wp_customize->add_control( new WP_Customize_Cropped_Image_Control($wp_customize, 'lwp-footer-callout-image-control', array(
            'label' => 'Image',
            'default' => 'img/footerImage.png',
			'section' => 'gardsman-footer-callout-section',
            'settings' => 'gardsman-footer-callout-image',
            'width' => 1750,
			'height' => 1500
			
		)));
}

add_action('customize_register', 'gardsman_footer_callout');