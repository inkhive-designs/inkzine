<?php
/**
 * Inkzine Theme Customizer
 *
 * @package Inkzine
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function inkzine_customize_register( $wp_customize ) {
    $wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
    $wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
    $wp_customize->remove_control( 'header_textcolor');
    add_theme_support( 'custom-logo', array(
        'height'      => 100,
        'width'       => 400,
        'flex-height' => true,
        'flex-width'  => true,
        'header-text' => array( 'site-title', 'site-description' ),
    ) );
    $wp_customize->get_section('title_tagline')->panel = 'inkzine_hsetting';
    $wp_customize->get_section('colors')->panel = 'inkzine_design_panel';
    $wp_customize->get_section('background_image')->panel = 'inkzine_design_panel';


    $wp_customize->add_setting( 'inkzine_title_color', array (
        'default'	=> '#a7a7a7',
        'sanitize_callback'	=> 'sanitize_text_field'
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'inkzine_title_color', array(
        'label'    => __( 'Site Title Color', 'inkzine' ),
        'section'  => 'colors',
        'settings' => 'inkzine_title_color',
        'priority'    => 102,
    ) ) );

    $wp_customize->add_setting( 'inkzine_desc_color', array (
        'default'	=> '#ff8a00',
        'sanitize_callback'	=> 'sanitize_text_field'
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'inkzine_desc_color', array(
        'label'    => __( 'Site Description Color', 'inkzine' ),
        'section'  => 'colors',
        'settings' => 'inkzine_desc_color',
        'priority'    => 102,
    ) ) );

}
add_action( 'customize_register', 'inkzine_customize_register' );

if ( ! function_exists( 'inkzine_apply_color' ) ) :
    function inkzine_apply_color() { ?>
        <style id="inkzine-custom-style">
            <?php if (get_theme_mod('inkzine_desc_color') ) : ?>
            .site-description { color: <?php echo get_theme_mod('inkzine_desc_color') ?> }
            <?php endif; ?>
            <?php if (get_theme_mod('inkzine_title_color') ) : ?>
            .site-title a { color: <?php echo get_theme_mod('inkzine_title_color') ?> }
            <?php endif; ?>


        </style>

        <?php
    }
endif;

add_action( 'wp_head', 'inkzine_apply_color' );

require_once get_template_directory().'/framework/customizer/_sanitization.php';
require_once get_template_directory().'/framework/customizer/header.php';
    require_once get_template_directory().'/framework/customizer/slider.php';
require_once get_template_directory().'/framework/customizer/misc-scripts.php';
require_once get_template_directory().'/framework/customizer/social.php';
require_once get_template_directory().'/framework/customizer/ticker.php';
require_once get_template_directory().'/framework/customizer/layouts.php';
require_once get_template_directory().'/framework/customizer/showcase.php';

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function inkzine_customize_preview_js() {
    wp_enqueue_script( 'inkzine_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'inkzine_customize_preview_js' );



