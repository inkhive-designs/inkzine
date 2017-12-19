<?php
/**
 * Created by PhpStorm.
 * User: Gourav
 * Date: 12/18/2017
 * Time: 3:27 PM
 */

function inkzine_custom_css_mods(){
    $custom_css = "";

    if(get_theme_mod('inkzine_sidebar_layout') == 'right'):
        $custom_css .= ".single #primary{ float: right;}";
        endif;
    if(get_theme_mod('inkzine_sidebar_layout') == 'left'):
        $custom_css .= ".single #primary{ float: left;}";
    endif;

wp_add_inline_style( 'inkzine-main-style', wp_strip_all_tags($custom_css) );

}

add_action('wp_enqueue_scripts', 'inkzine_custom_css_mods');