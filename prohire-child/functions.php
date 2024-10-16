<?php
/**
 * Setup prohire Child Theme's textdomain.
 *
 * Declare textdomain for this child theme.
 * Translations can be filed in the /languages/ directory.
 */
function prohire_child_theme_setup() {
	load_child_theme_textdomain( 'prohire-child', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'prohire_child_theme_setup' );


function prohire_enqueue_styles() {

    $parent_style = 'parent-style';

    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style )
    );
}
add_action( 'wp_enqueue_scripts', 'prohire_enqueue_styles' );