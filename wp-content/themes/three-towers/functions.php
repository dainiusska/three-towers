<?php
function theme_setup() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'menus' );

    register_nav_menus( array(
        'main-menu' => __( 'Main Menu' ),
    ));

    add_theme_support( 'editor-styles' );
    add_editor_style( 'style.css' );
}
add_action( 'after_setup_theme', 'theme_setup' );

function theme_enqueue_styles() {
    wp_enqueue_style( 'style', get_stylesheet_uri() );
    wp_enqueue_script( 'scripts', get_template_directory_uri() . '/assets/js/scripts.js', array( 'jquery' ), null, true );
}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );

require_once get_template_directory() . '/inc/blocks.php';