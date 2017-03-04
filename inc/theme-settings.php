<?php
/**
 * Check and setup theme's default settings
 *
 * @package freeshop
 *
 */
function setup_theme_default_settings() {

	// check if settings are set, if not set defaults.
	// Caution: DO NOT check existence using === always check with == .
	// Latest blog posts style.
	$freeshop_posts_index_style = get_theme_mod( 'freeshop_posts_index_style' );
	if ( '' == $freeshop_posts_index_style ) {
		set_theme_mod( 'freeshop_posts_index_style', 'default' );
	}

	// Sidebar position.
	$freeshop_sidebar_position = get_theme_mod( 'freeshop_sidebar_position' );
	if ( '' == $freeshop_sidebar_position ) {
		set_theme_mod( 'freeshop_sidebar_position', 'right' );
	}

	// Container width.
	$freeshop_container_type = get_theme_mod( 'freeshop_container_type' );
	if ( '' == $freeshop_container_type ) {
		set_theme_mod( 'freeshop_container_type', 'container' );
	}
}
