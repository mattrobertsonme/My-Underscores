<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Global_Themes_Plus
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function global_themes_plus_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'global_themes_plus_body_classes' );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function global_themes_plus_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'global_themes_plus_pingback_header' );

/* -----------------------------------------------------------------------------
    
    =HEADER
  
----------------------------------------------------------------------------- */
    
    /*------------------------------------*\
       =REMOVE DIV SURROUNDING NAVIGATION
    \*------------------------------------*/    
    
    function global_themes_plus_nav_menu_args($args = '') {
        $args['container'] = false;
        return $args;
    }
    
    add_filter('wp_nav_menu_args', 'global_themes_plus_nav_menu_args');
    
    /*------------------------------------*\
       =REGISTER NAVS
    \*------------------------------------*/   

    function global_themes_plus_header_nav() {
        wp_nav_menu(
        array(
            'theme_location'  => 'header-menu',
            'menu'            => '',
            'container'       => 'div',
            'container_class' => 'menu-{menu slug}-container',
            'container_id'    => '',
            'menu_class'      => 'menu',
            'menu_id'         => '',
            'echo'            => true,
            'fallback_cb'     => 'wp_page_menu',
            'before'          => '',
            'after'           => '',
            'link_before'     => '',
            'link_after'      => '',
            'items_wrap'      => '<ul class="nav navbar-nav">%3$s</ul>',
            'depth'           => 0,
            'walker'            => new WP_Bootstrap_Navwalker()
            )
        );
    }
    
    function global_themes_plus_mobile_nav() {
        wp_nav_menu(
        array(
            'theme_location'  => 'mobile-menu',
            'menu'            => '',
            'container'       => 'div',
            'container_class' => 'menu-{menu slug}-container',
            'container_id'    => '',
            'menu_class'      => 'menu',
            'menu_id'         => '',
            'echo'            => true,
            'fallback_cb'     => 'wp_page_menu',
            'before'          => '',
            'after'           => '',
            'link_before'     => '',
            'link_after'      => '',
            'items_wrap'      => '<ul>%3$s</ul>',
            'depth'           => 0,
            'walker'            => new WP_Pushy_Navwalker()
            )
        );
    }
    
    function global_themes_plus_footer_nav() {
        wp_nav_menu(
        array(
            'theme_location'  => 'footer-menu',
            'menu'            => '',
            'container'       => 'div',
            'container_class' => 'menu-{menu slug}-container',
            'container_id'    => '',
            'menu_class'      => 'menu',
            'menu_id'         => '',
            'echo'            => true,
            'fallback_cb'     => 'wp_page_menu',
            'before'          => '',
            'after'           => '',
            'link_before'     => '',
            'link_after'      => '',
            'items_wrap'      => '<ul class="nav navbar-nav">%3$s',
            'depth'           => 0,
            'walker'            => new WP_Bootstrap_Navwalker()
            )
        );
    }
    
    function registerglobal_themes_plus_menu() {
        register_nav_menus(array(
            'header-menu' => __('Header Menu', 'global-themes-plus'),
            'footer-menu' => __('Footer Menu', 'global-themes-plus'),
            'mobile-menu' => __('Mobile Menu', 'global-themes-plus')
        ));
    }
    
    add_action('init', 'registerglobal_themes_plus_menu');

