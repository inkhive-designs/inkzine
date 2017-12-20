<?php
if ( ! function_exists( 'inkzine_setup' ) ) :

function inkzine_setup() {

    load_theme_textdomain( 'inkzine', get_template_directory() . '/languages' );
    add_theme_support( 'custom-logo' );
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'post-thumbnails' );
    add_image_size('homepage-banner',725,400,true);
    add_image_size('carousel-thumb',390,240,true);
    add_image_size('grid-thumb',390,300,true);

    register_nav_menus( array(
        'primary' => __( 'Primary Menu', 'inkzine' )
    ) );

    add_theme_support( 'custom-background', apply_filters( 'inkzine_custom_background_args', array(
        'default-color' => 'ffffff',
        'default-image' => '',
    ) ) );

    add_theme_support( 'post-formats', array( 'image', 'video' ) );
    add_theme_support( 'title-tag' );
}
endif; // inkzine_setup
add_action( 'after_setup_theme', 'inkzine_setup' );