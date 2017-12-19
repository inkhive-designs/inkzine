<?php

function inkzine_customize_ticker( $wp_customize ) {
    //Featured Posts 2 - ticker
    $wp_customize->add_section(
        'inkzine_ticker_section',
        array(
            'title'     => __('Ticker','inkzine'),
            'priority'  => 20,
            'panel'     => 'inkzine_hsetting',
        )
    );

    $wp_customize->add_setting(
        'inkzine_ticker_enable',
        array( 'sanitize_callback' => 'inkzine_sanitize_checkbox' )
    );

    $wp_customize->add_control(
        'inkzine_ticker_enable', array(
            'settings' => 'inkzine_ticker_enable',
            'label'    => __( 'Enable Ticker', 'inkzine' ),
            'section'  => 'inkzine_ticker_section',
            'type'     => 'checkbox',
        )
    );

    $wp_customize->add_setting(
        'inkzine_ticker_cat',
        array( 'sanitize_callback' => 'inkzine_sanitize_category' )
    );

    $wp_customize->add_control(
        new inkzine_WP_Customize_Category_Control(
            $wp_customize,
            'inkzine_ticker_cat',
            array(
                'label'    => __('Posts Category.','inkzine'),
                'settings' => 'inkzine_ticker_cat',
                'section'  => 'inkzine_ticker_section'
            )
        )
    );
    $wp_customize->add_setting(
        'inkzine_ticker_count',
        array( 'sanitize_callback' => 'inkzine_sanitize_positive_number' )
    );

    $wp_customize->add_control(
        'inkzine_ticker_count', array(
            'settings' => 'inkzine_ticker_count',
            'label'    => __( 'Select no of posts', 'inkzine' ),
            'section'  => 'inkzine_ticker_section',
            'type'     => 'number',
        )
    );
}
add_action('customize_register', 'inkzine_customize_ticker');