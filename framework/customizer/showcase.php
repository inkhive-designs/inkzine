<?php
function inkzine_customize_register_fshowcase( $wp_customize ) {
    $wp_customize->add_panel('inkzine_fshowcase',
        array(
            'title' => __('Featured Showcase', 'inkzine'),
            'priority' => 50,
        )
    );
    $wp_customize->add_section('inkzine_showcase_enable_section',
        array(
            'title' => __('Enable/Disable', 'inkzine'),
            'priority' => 10,
            'panel' => 'inkzine_fshowcase',
        )
    );

    $wp_customize->add_setting('inkzine_showcase_enable_set',
        array(
            'sanitize_callback' => 'inkzine_sanitize_checkbox'
        ));

    $wp_customize->add_control('inkzine_showcase_enable_set',
        array(
            'setting' => 'inkzine_showcase_enable_set',
            'section' => 'inkzine_showcase_enable_section',
            'label' => __('Enable Featured Showcase', 'inkzine'),
            'type' => 'checkbox',
            'default' => false,
        )
    );
    //Showcase 1
    $wp_customize->add_section('inkzine_featured_showcase1_section',
        array(
            'title' => __('Showcase Item 1', 'inkzine'),
            'priority' => 10,
            'panel' => 'inkzine_fshowcase',
        )
    );

    //title 1
    $wp_customize->add_setting('inkzine_showcase_title1',
        array(
            'sanitize_callback' => 'sanitize_text_field'
        ));

    $wp_customize->add_control('inkzine_showcase_title1',
        array(
            'setting' => 'inkzine_showcase_title1',
            'section' => 'inkzine_featured_showcase1_section',
            'label' => __(' Showcase Title 1', 'inkzine'),
            'type' => 'text',
            'active_callback' => 'inkzine_fshowcase_active_callback'
        )
    );


    $wp_customize->add_setting(
        'inkzine_showcase_cat1',
        array( 'sanitize_callback' => 'inkzine_sanitize_category' )
    );

    $wp_customize->add_control(
        new inkzine_WP_Customize_Category_Control(
            $wp_customize,
            'inkzine_showcase_cat1',
            array(
                'label'    => __('Posts Category.','inkzine'),
                'settings' => 'inkzine_showcase_cat1',
                'section'  => 'inkzine_featured_showcase1_section'
            )
        )
    );
    $wp_customize->add_setting(
        'inkzine_showcase_count1',
        array( 'sanitize_callback' => 'inkzine_sanitize_positive_number' )
    );

    $wp_customize->add_control(
        'inkzine_showcase_count1', array(
            'settings' => 'inkzine_showcase_count1',
            'label'    => __( 'Select no of posts', 'inkzine' ),
            'section'  => 'inkzine_featured_showcase1_section',
            'type'     => 'number',
        )
    );


    //Showcase 2
    $wp_customize->add_section('inkzine_featured_showcase2_section',
        array(
            'title' => __('Showcase Item 2', 'inkzine'),
            'priority' => 10,
            'panel' => 'inkzine_fshowcase',
        )
    );

    //title 2
    $wp_customize->add_setting('inkzine_showcase_title2',
        array(
            'sanitize_callback' => 'sanitize_text_field'
        ));

    $wp_customize->add_control('inkzine_showcase_title2',
        array(
            'setting' => 'inkzine_showcase_title2',
            'section' => 'inkzine_featured_showcase2_section',
            'label' => __(' Showcase Title 2', 'inkzine'),
            'type' => 'text',
            'active_callback' => 'inkzine_fshowcase_active_callback'
        )
    );

    $wp_customize->add_setting(
        'inkzine_showcase_cat2',
        array( 'sanitize_callback' => 'inkzine_sanitize_category' )
    );

    $wp_customize->add_control(
        new inkzine_WP_Customize_Category_Control(
            $wp_customize,
            'inkzine_showcase_cat2',
            array(
                'label'    => __('Posts Category.','inkzine'),
                'settings' => 'inkzine_showcase_cat2',
                'section'  => 'inkzine_featured_showcase2_section'
            )
        )
    );
    $wp_customize->add_setting(
        'inkzine_showcase_count2',
        array( 'sanitize_callback' => 'inkzine_sanitize_positive_number' )
    );

    $wp_customize->add_control(
        'inkzine_showcase_count2', array(
            'settings' => 'inkzine_showcase_count2',
            'label'    => __( 'Select no of posts', 'inkzine' ),
            'section'  => 'inkzine_featured_showcase2_section',
            'type'     => 'number',
        )
    );
    //Showcase 3
    $wp_customize->add_section('inkzine_featured_showcase3_section',
        array(
            'title' => __('Showcase Item 3', 'inkzine'),
            'priority' => 10,
            'panel' => 'inkzine_fshowcase',
        )
    );


    //title 3
    $wp_customize->add_setting('inkzine_showcase_title3',
        array(
            'sanitize_callback' => 'sanitize_text_field'
        ));

    $wp_customize->add_control('inkzine_showcase_title3',
        array(
            'setting' => 'inkzine_showcase_title3',
            'section' => 'inkzine_featured_showcase3_section',
            'label' => __(' Showcase Title 3', 'inkzine'),
            'type' => 'text',
            'active_callback' => 'inkzine_fshowcase_active_callback'
        )
    );

    $wp_customize->add_setting(
        'inkzine_showcase_cat3',
        array( 'sanitize_callback' => 'inkzine_sanitize_category' )
    );

    $wp_customize->add_control(
        new inkzine_WP_Customize_Category_Control(
            $wp_customize,
            'inkzine_showcase_cat3',
            array(
                'label'    => __('Posts Category.','inkzine'),
                'settings' => 'inkzine_showcase_cat3',
                'section'  => 'inkzine_featured_showcase3_section'
            )
        )
    );
    $wp_customize->add_setting(
        'inkzine_showcase_count3',
        array( 'sanitize_callback' => 'inkzine_sanitize_positive_number' )
    );
    $wp_customize->add_control(
        'inkzine_showcase_count3', array(
            'settings' => 'inkzine_showcase_count3',
            'label'    => __( 'Select no of posts', 'inkzine' ),
            'section'  => 'inkzine_featured_showcase3_section',
            'type'     => 'number',
        )
    );

    function inkzine_fshowcase_active_callback( $control ) {
        $option = $control->manager->get_setting('inkzine_showcase_enable_set');
        return $option->value() == true;
    }


}
add_action( 'customize_register', 'inkzine_customize_register_fshowcase' );

