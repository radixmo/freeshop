<?php
/**
 * Freeshop Theme Customizer
 *
 * @package freeshop
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
if ( ! function_exists( 'freeshop_customize_register' ) ) {
	/**
	 * Register basic customizer support.
	 *
	 * @param object $wp_customize Customizer reference.
	 */
	function freeshop_customize_register( $wp_customize ) {
		$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
		$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
		$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	}
}
add_action( 'customize_register', 'freeshop_customize_register' );

if ( ! function_exists( 'freeshop_theme_customize_register' ) ) {
	/**
	 * Register individual settings through customizer's API.
	 *
	 * @param WP_Customize_Manager $wp_customize Customizer reference.
	 */
	function freeshop_theme_customize_register( $wp_customize ) {

		// Theme layout settings.
		$wp_customize->add_section( 'freeshop_theme_layout_options', array(
			'title'       => __( 'Theme Layout Settings', 'freeshop' ),
			'capability'  => 'edit_theme_options',
			'description' => __( 'Container width and sidebar defaults', 'freeshop' ),
			'priority'    => 160,
		) );

		$wp_customize->add_setting( 'freeshop_container_type', array(
			'default'           => 'container',
			'type'              => 'theme_mod',
			'sanitize_callback' => 'esc_textarea',
			'capability'        => 'edit_theme_options',
		) );

		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'container_type', array(
					'label'       => __( 'Container Width', 'freeshop' ),
					'description' => __( "Choose between Bootstrap's container and container-fluid", 'freeshop' ),
					'section'     => 'freeshop_theme_layout_options',
					'settings'    => 'freeshop_container_type',
					'type'        => 'select',
					'choices'     => array(
						'container'       => __( 'Fixed width container', 'freeshop' ),
						'container-fluid' => __( 'Full width container', 'freeshop' ),
					),
					'priority'    => '10',
				)
			) );

		$wp_customize->add_setting( 'freeshop_sidebar_position', array(
			'default'           => 'right',
			'type'              => 'theme_mod',
			'sanitize_callback' => 'esc_textarea',
			'capability'        => 'edit_theme_options',
		) );

		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'freeshop_sidebar_position', array(
					'label'       => __( 'Sidebar Positioning', 'freeshop' ),
					'description' => __( "Set sidebar's default position. Can either be: right, left, both or none. Note: this can be overridden on individual pages.",
					'freeshop' ),
					'section'     => 'freeshop_theme_layout_options',
					'settings'    => 'freeshop_sidebar_position',
					'type'        => 'select',
					'choices'     => array(
						'right' => __( 'Right sidebar', 'freeshop' ),
						'left'  => __( 'Left sidebar', 'freeshop' ),
						'both'  => __( 'Left & Right sidebars', 'freeshop' ),
						'none'  => __( 'No sidebar', 'freeshop' ),
					),
					'priority'    => '20',
				)
			) );
	}
} // endif function_exists( 'freeshop_theme_customize_register' ).
add_action( 'customize_register', 'freeshop_theme_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
if ( ! function_exists( 'freeshop_customize_preview_js' ) ) {
	/**
	 * Setup JS integration for live previewing.
	 */
	function freeshop_customize_preview_js() {
		wp_enqueue_script( 'freeshop_customizer', get_template_directory_uri() . '/js/customizer.js',
			array( 'customize-preview' ), '20130508', true );
	}
}
add_action( 'customize_preview_init', 'freeshop_customize_preview_js' );
