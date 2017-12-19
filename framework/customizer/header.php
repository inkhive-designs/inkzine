<?php
function inkzine_customize_register_header( $wp_customize ) {
$wp_customize->add_panel('inkzine_hsetting',
    array(
        'title' => __('Header Settings', 'inkzine'),
        'priority' => 2,
    )
);

}
add_action( 'customize_register', 'inkzine_customize_register_header' );