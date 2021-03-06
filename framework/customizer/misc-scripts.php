<?php
//upgrade
function inkzine_customize_register_misc( $wp_customize ) {
    $wp_customize->add_section(
        'inkzine_sec_upgrade',
        array(
            'title'     => __('Discover inkzine Pro','inkzine'),
            'priority'  => 1,
        )
    );

    $wp_customize->add_setting(
        'inkzine_upgrade',
        array( 'sanitize_callback' => 'sanitize_text_field' )
    );

    $wp_customize->add_control(
        new WP_Customize_Upgrade_Control(
            $wp_customize,
            'inkzine_upgrade',
            array(
                'label' => __('More of Everything','inkzine'),
                'description' => __('inkzine Pro has more of Everything. More New Features, More Options, Unlimited Colors, 650+ Fonts, More Layouts, Configurable Slider, Inbuilt Advertising Options, Multiple Skins, More Widgets, and a lot more options and comes with Dedicated Support. To Know More about the Pro Version, click here: <a href="http://inkhive.com/product/inkzine-plus/">Upgrade to Pro</a>.','inkzine'),
                'section' => 'inkzine_sec_upgrade',
                'settings' => 'inkzine_upgrade',
            )
        )
    );
}
add_action( 'customize_register', 'inkzine_customize_register_misc' );