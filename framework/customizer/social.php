<?php
 //Social Icons
function inkzine_customize_register_social( $wp_customize ) {
    $wp_customize->add_section('inkzine_social_section', array(
        'title' => __('Social Icons','inkzine'),
        'priority' => 44 ,
        'panel'     => 'inkzine_hsetting',
    ));

    $social_networks = array( //Redefinied in Sanitization Function.
        'none' => __('-','inkzine'),
        'facebook' => __('Facebook','inkzine'),
        'twitter' => __('Twitter','inkzine'),
        'google-plus' => __('Google Plus','inkzine'),
        'instagram' => __('Instagram','inkzine'),
        'rss' => __('RSS Feeds','inkzine'),
        'vine' => __('Vine','inkzine'),
        'vimeo-square' => __('Vimeo','inkzine'),
        'youtube' => __('Youtube','inkzine'),
        'flickr' => __('Flickr','inkzine'),
        'pinterest' => __('Pinterest','inkzine'),
        'linkedin' => __('Linkedin','inkzine'),
    );

    $social_count = count($social_networks);

    for ($x = 1 ; $x <= ($social_count - 3) ; $x++) :

        $wp_customize->add_setting(
            'inkzine_social_'.$x, array(
            'sanitize_callback' => 'inkzine_sanitize_social',
            'default' => 'none'
        ));

        $wp_customize->add_control( 'inkzine_social_'.$x, array(
            'setting' => 'inkzine_social_'.$x,
            'label' => __('Icon ','inkzine').$x,
            'section' => 'inkzine_social_section',
            'type' => 'select',
            'choices' => $social_networks,
        ));

        $wp_customize->add_setting(
            'inkzine_social_url'.$x, array(
            'sanitize_callback' => 'esc_url_raw'
        ));

        $wp_customize->add_control( 'inkzine_social_url'.$x, array(
            'setting' => 'inkzine_social_url'.$x,
            'description' => __('Icon ','inkzine').$x.__(' Url','inkzine'),
            'section' => 'inkzine_social_section',
            'type' => 'url',
            'choices' => $social_networks,
        ));

    endfor;

    function inkzine_sanitize_social( $input ) {
        $social_networks = array(
            'none' ,
            'facebook',
            'twitter',
            'google-plus',
            'instagram',
            'rss',
            'vine',
            'vimeo-square',
            'youtube',
            'flickr',
            'pinterest',
            'linkedin'
        );
        if ( in_array($input, $social_networks) )
            return $input;
        else
            return '';
    }
}
add_action( 'customize_register', 'inkzine_customize_register_social' );