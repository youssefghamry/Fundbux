<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Fundbux
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function fundbux_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'blog_sidebar' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'fundbux_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function fundbux_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'fundbux_pingback_header' );

if ( ! function_exists( 'fundbux_post_cat' ) ) :
	function fundbux_post_cat(){
		if ( 'post' === get_post_type() ) {
			$categories_list = get_the_category_list( esc_html__( ', ', 'fundbux' ) );
			if ( $categories_list ) {
				printf( '<span class="cat-links">%1$s</span>', $categories_list );
			}
		}
	}
endif;
