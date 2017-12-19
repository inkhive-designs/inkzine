<?php
function inkzine_customize_register_layouts( $wp_customize ) {
    // Layout and Design
    $wp_customize->add_panel( 'inkzine_design_panel', array(
        'priority'       => 80,
        'capability'     => 'edit_theme_options',
        'theme_supports' => '',
        'title'          => __('Design & Layout','inkzine'),
    ) );

    $wp_customize->add_section(
        'inkzine_sidebar_options',
        array(
            'title'     => __('Sidebar Layout','inkzine'),
            'priority'  => 0,
            'panel'     => 'inkzine_design_panel'
        )
    );
    $wp_customize->add_setting(
        'inkzine_sidebar_layout',
        array( 'sanitize_callback' => 'inkzine_sanitize_blog_layout' ));

    function inkzine_sanitize_blog_layout( $input ) {
        if ( in_array($input, array('left','right') ) )
            return $input;
        else
            return '';
    }

    $wp_customize->add_control(
        'inkzine_sidebar_layout',array(
            'label' => __('Select sidebar Layout','inkzine'),
            'settings' => 'inkzine_sidebar_layout',
            'section'  => 'inkzine_sidebar_options',
            'type' => 'select',
            'choices' => array(
                'left' => __('Left','inkzine'),
                'right' => __('Right','inkzine'),
            )
        )
    );
    
    //custom CSS
    /* Active Callback Function */
    class inkzine_Custom_CSS_Control extends WP_Customize_Control
    {
        public $type = 'textarea';

        public function render_content()
        {
            ?>
            <label>
                <span class="customize-control-title"><?php echo esc_html($this->label); ?></span>
                <textarea rows="8"
                          style="width:100%;" <?php $this->link(); ?>><?php echo esc_textarea($this->value()); ?></textarea>
            </label>
            <?php
        }
    }

    $wp_customize->add_section(
        'inkzine_custom_codes',
        array(
            'title' => __('Custom CSS', 'inkzine'),
            'description' => __('Enter your Custom CSS to Modify design.', 'inkzine'),
            'priority' => 2,
            'panel' => 'inkzine_design_panel'
        )
    );

    $wp_customize->add_setting(
        'inkzine_custom_css',
        array(
            'default' => '',
            'sanitize_callback' => 'inkzine_sanitize_text'
        )
    );

    $wp_customize->add_control(
        new inkzine_Custom_CSS_Control(
            $wp_customize,
            'inkzine_custom_css',
            array(
                'section' => 'inkzine_custom_codes',
                'settings' => 'inkzine_custom_css'
            )
        )
    );

    function inkzine_sanitize_text($input)
    {
        return wp_kses_post(force_balance_tags($input));
    }
    //footer text
    $wp_customize-> add_section(
        'inkzine_custom_footer',
        array(
            'title'			=> __('Custom Footer Text','inkzine'),
            'description'	=> __('Enter your Own Copyright Text.','inkzine'),
            'priority'		=> 12,
            'panel'			=> 'inkzine_design_panel'
        )
    );

    $wp_customize->add_setting(
        'inkzine_footer_text',
        array(
            'default'		=> '',
            'sanitize_callback'	=> 'sanitize_text_field'
        )
    );

    $wp_customize->add_control(
        'inkzine_footer_text',
        array(
            'section' => 'inkzine_custom_footer',
            'settings' => 'inkzine_footer_text',
            'type' => 'text'
        )
    );


}
add_action('customize_register', 'inkzine_customize_register_layouts');