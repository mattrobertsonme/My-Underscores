<?php
/**
 * Global_Themes_Plus Theme Customizer
 *
 * @package Global_Themes_Plus
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function global_themes_plus_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'global_themes_plus_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'global_themes_plus_customize_partial_blogdescription',
		) );
	}
}
add_action( 'customize_register', 'global_themes_plus_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function global_themes_plus_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function global_themes_plus_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function global_themes_plus_customize_preview_js() {
	wp_enqueue_script( 'global-themes-plus-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'global_themes_plus_customize_preview_js' );

/**
 * Add the theme configuration
 */
global_themes_plus_Kirki::add_config( 'global_themes_plus_theme', array(
	'option_type' => 'theme_mod',
	'capability'  => 'edit_theme_options',
) );

/* -----------------------------------------------------------------------------
    
    =GLOBAL SETTINGS
  
----------------------------------------------------------------------------- */
    
    global_themes_plus_Kirki::add_panel( 'global_settings', array(
        'priority'    => 1,
        'title'       => esc_attr__( 'Global Settings', 'global-themes-plus' ),
        'description' => esc_attr__( 'My panel description', 'global-themes-plus' ), 
    ) );
    
    /*------------------------------------*\
       =PANELS 
    \*------------------------------------*/    
    
    // Get the WordPress default 'Site Identity' and place it under Global Settings 
    global_themes_plus_Kirki::add_section( 'title_tagline', array(
        'title'      => esc_attr__( 'Site Identity', 'global-themes-plus' ),
        'priority'   => 1,
        'panel'      => 'global_settings',
        'capability' => 'edit_theme_options',
    ) );
    
    // Get the Kirki default 'Colors' and place it under Global Settings 
    global_themes_plus_Kirki::add_section( 'colors', array(
        'title'      => esc_attr__( 'Colors', 'global-themes-plus' ),
        'priority'   => 3,
        'panel'      => 'global_settings',
        'capability' => 'edit_theme_options',
    ) );
    
    // Get the Kirki default 'Typography' and place it under Global Settings 
    global_themes_plus_Kirki::add_section( 'typography', array(
        'title'      => esc_attr__( 'Typography', 'global-themes-plus' ),
        'priority'   => 4,
        'panel'      => 'global_settings',
        'capability' => 'edit_theme_options',
    ) );
    
    // Get the WordPress default 'Background Image' and place it under Global Settings 
    global_themes_plus_Kirki::add_section( 'background_image', array(
        'title'      => esc_attr__( 'Background Image', 'global-themes-plus' ),
        'priority'   => 5,
        'panel'      => 'global_settings',
        'capability' => 'edit_theme_options',
    ) );
    
/* -----------------------------------------------------------------------------
    
    =HOMEPAGE SETTINGS
  
----------------------------------------------------------------------------- */
    
    global_themes_plus_Kirki::add_panel( 'home_page_settings', array(
        'priority'    => 1,
        'title'       => esc_attr__( 'Home Page Settings', 'global-themes-plus' ),
        'description' => esc_attr__( 'My panel description', 'global-themes-plus' ), 
    ) );
    
    /*------------------------------------*\
       =PANELS 
    \*------------------------------------*/ 
    
    // Get the WordPress default 'Static Front Page' and place it under Homepage Settings 
    global_themes_plus_Kirki::add_section( 'static_front_page', array(
        'title'      => esc_attr__( 'Static Front Page', 'global-themes-plus' ),
        'priority'   => 1,
        'panel'      => 'home_page_settings',
        'capability' => 'edit_theme_options',
    ) );
    
    // Get the WordPress default 'Static Front Page' and place it under Homepage Settings 
    global_themes_plus_Kirki::add_section( 'header_image', array(
        'title'      => esc_attr__( 'Header Image', 'global-themes-plus' ),
        'priority'   => 2,
        'panel'      => 'home_page_settings',
        'capability' => 'edit_theme_options',
    ) );
    
/* -----------------------------------------------------------------------------
    
    =TYPOGRAPHY
  
----------------------------------------------------------------------------- */
    
    global_themes_plus_Kirki::add_field( 'global_themes_plus_theme', array(
        'type'        => 'typography',
        'settings'    => 'body_typography',
        'label'       => esc_attr__( 'Body Typography', 'global-themes-plus' ),
        'description' => esc_attr__( 'Select the main typography options for your site.', 'global-themes-plus' ),
        'help'        => esc_attr__( 'The typography options you set here apply to all content on your site.', 'global-themes-plus' ),
        'section'     => 'typography',
        'priority'    => 10,
        'default'     => array(
            'font-family'    => 'Roboto',
            'variant'        => '400',
            'font-size'      => '16px',
            'line-height'    => '1.5',
            // 'letter-spacing' => '0',
            'color'          => '#333333',
        ),
        'output' => array(
            array(
                'element' => 'body',
            ),
        ),
    ) );
    
    global_themes_plus_Kirki::add_field( 'global_themes_plus_theme', array(
        'type'        => 'typography',
        'settings'    => 'headers_typography',
        'label'       => esc_attr__( 'Headers Typography', 'global-themes-plus' ),
        'description' => esc_attr__( 'Select the typography options for your headers.', 'global-themes-plus' ),
        'help'        => esc_attr__( 'The typography options you set here will override the Body Typography options for all headers on your site (post titles, widget titles etc).', 'global-themes-plus' ),
        'section'     => 'typography',
        'priority'    => 10,
        'default'     => array(
            'font-family'    => 'Roboto',
            'variant'        => '400',
            // 'font-size'      => '16px',
            // 'line-height'    => '1.5',
            // 'letter-spacing' => '0',
            // 'color'          => '#333333',
        ),
        'output' => array(
            array(
                'element' => array( 'h1', 'h2', 'h3', 'h4', 'h5', 'h6', '.h1', '.h2', '.h3', '.h4', '.h5', '.h6' ),
            ),
        ),
    ) );
    
/* -----------------------------------------------------------------------------
    
    =ERROR 404
  
----------------------------------------------------------------------------- */
    
    global_themes_plus_Kirki::add_section( '404', array(
        'title'      => esc_attr__( 'Error 404', 'global-themes-plus' ),
        'priority'   => 10,
        'capability' => 'edit_theme_options',
    ) );
    
    global_themes_plus_Kirki::add_field( 'global_themes_plus', array(
        'type'        => 'toggle',
        'settings'    => '404_search',
        'label'       => __( 'Show Search Form', 'global-themes-plus' ),
        'section'     => '404',
        'default'     => '1',
        'priority'    => 10,
    ) );
    
    global_themes_plus_Kirki::add_field( 'global_themes_plus', array(
        'type'        => 'toggle',
        'settings'    => '404_button',
        'label'       => __( 'Show Button', 'global-themes-plus' ),
        'section'     => '404',
        'default'     => false,
        'priority'    => 20,
    ) );
    
    global_themes_plus_Kirki::add_field( 'global_themes_plus', array(
        'type'      => 'text',
        'settings'  => '404_button_text',
        'label'     => esc_html__( 'Button Text' , 'global-themes-plus' ),
        'section'   => '404',
        'default'   => esc_html__( 'Return Home?', 'global-themes-plus' ),
        'priority'  => 21,
        'active_callback' => array(
            array(
                'setting'  => '404_button',
                'operator' => '==',
                'value'    => '1',
            ),
        ),
    ) );
    
    global_themes_plus_Kirki::add_field( 'global_themes_plus', array(
        'type'        => 'toggle',
        'settings'    => '404_picture',
        'label'       => __( 'Show An Image', 'global-themes-plus' ),
        'section'     => '404',
        'default'     => false,
        'priority'    => 30,
    ) );
    
    global_themes_plus_Kirki::add_field( 'global_themes_plus', array(
        'type'      => 'image',
        'settings'  => '404_image',
        'label'     => esc_html__( 'Image' , 'global-themes-plus' ),
        'description' => __( 'Choose an image to display alongside your text', 'global-themes-plus' ),
        'help'        => __( 'This is some extra help text.', 'global-themes-plus' ),
        'section'   => '404',
        'default'   => esc_html__( '', 'global-themes-plus' ),
        'priority'  => 31,
        'active_callback' => array(
            array(
                'setting'  => '404_picture',
                'operator' => '==',
                'value'    => '1',
            ),
        ),
    ) );  
    
    global_themes_plus_Kirki::add_field( 'global_themes_plus', array(
        'type'        => 'toggle',
        'settings'    => '404_background',
        'label'       => __( 'Show Background Image', 'global-themes-plus' ),
        'section'     => '404',
        'default'     => false,
        'priority'    => 40,
    ) );
    
    global_themes_plus_Kirki::add_field( 'global_themes_plus', array(
        'type'      => 'image',
        'settings'  => '404_background_image',
        'label'     => esc_html__( 'Background Image' , 'global-themes-plus' ),
        'description' => __( 'Choose a full sized image background', 'global-themes-plus' ),
        'help'        => __( 'This is some extra help text.', 'global-themes-plus' ),
        'section'   => '404',
        'default'   => esc_html__( '', 'global-themes-plus' ),
        'priority'  => 41,
        'active_callback' => array(
            array(
                'setting'  => '404_background',
                'operator' => '==',
                'value'    => '1',
            ),
        ),
    ) );  