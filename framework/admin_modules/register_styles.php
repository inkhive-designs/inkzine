<?php
function inkzine_scripts() {
    wp_enqueue_style( 'inkzine-fonts', 'http://fonts.googleapis.com/css?family=Lato:100,300,400,700,300italic|Armata' );
    wp_enqueue_style( 'inkzine-basic-style', get_stylesheet_uri() );
    if ( (function_exists( 'of_get_option' )) && (of_get_option('sidebar-layout', true) != 1) ) {
        if (of_get_option('sidebar-layout', true) ==  'right') {
            wp_enqueue_style( 'inkzine-layout', get_template_directory_uri()."/css/layouts/content-sidebar.css" );
        }
        else {
            wp_enqueue_style( 'inkzine-layout', get_template_directory_uri()."/css/layouts/sidebar-content.css" );
        }
    }
    else {
        wp_enqueue_style( 'inkzine-layout', get_template_directory_uri()."/css/layouts/content-sidebar.css" );
    }

    wp_enqueue_style( 'inkzine-bxslider-style', get_template_directory_uri()."/css/bxslider/jquery.bxslider.css" );

    wp_enqueue_style( 'inkzine-bootstrap-style', get_template_directory_uri()."/css/bootstrap/bootstrap.min.css", array('inkzine-layout') );

//    wp_enqueue_style( 'inkzine-main-style', get_template_directory_uri()."/css/skins/main.css", array('inkzine-layout','inkzine-bootstrap-style') );


    wp_enqueue_style( 'inkzine-main-style', get_template_directory_uri()."/assets/theme-styles/css/default.css", array('inkzine-layout','inkzine-bootstrap-style') );






    wp_enqueue_script( 'inkzine-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

    wp_enqueue_script( 'inkzine-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

    wp_enqueue_style('inkzine-nivo-lightbox', get_template_directory_uri()."/css/nivo/lightbox/nivo-lightbox.css" );

    wp_enqueue_style( 'inkzine-nivo-lightbox-default-theme', get_template_directory_uri()."/css/nivo/lightbox/themes/default/default.css" );

    wp_enqueue_script( 'inkzine-sliphover', get_template_directory_uri() . '/js/sliphover.js', array('jquery') );

    wp_enqueue_script( 'inkzine-bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery') );

    wp_enqueue_script( 'inkzine-bxslider', get_template_directory_uri() . '/js/bxslider.min.js', array('jquery') );

    wp_enqueue_script( 'inkzine-stellar', get_template_directory_uri() . '/js/stellar.js', array('jquery') );

    wp_enqueue_script( 'inkzine-custom', get_template_directory_uri() . '/js/custom.js', array('jquery') );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }

    if ( is_singular() && wp_attachment_is_image() ) {
        wp_enqueue_script( 'inkzine-keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20120202' );
    }
}
add_action( 'wp_enqueue_scripts', 'inkzine_scripts' );