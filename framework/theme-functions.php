<?php
/**
 * Created by PhpStorm.
 * User: Gourav
 * Date: 12/18/2017
 * Time: 12:45 PM
 */
//Import Admin Modules
require get_template_directory() . '/framework/admin_modules/register_styles.php';
require get_template_directory() . '/framework/admin_modules/theme_setup.php';
require get_template_directory() . '/framework/admin_modules/register_widgets.php';


function inkzine_nav_menu_args( $args = '' )
{
    $args['container'] = false;
    return $args;
} // function
add_filter( 'wp_page_menu_args', 'inkzine_nav_menu_args' );

function inkzine_prefix_setup() {

    add_theme_support( 'custom-logo', array(
        'height'      => 100,
        'width'       => 400,
        'flex-width' => true,
    ) );

}
add_action( 'after_setup_theme', 'inkzine_prefix_setup' );


function inkzine_custom_head_codes() {
    if ( (function_exists( 'of_get_option' )) && (of_get_option('headcode1', true) != 1) ) {
        echo of_get_option('headcode1', true);
    }
    if ( (function_exists( 'of_get_option' )) && (of_get_option('style2', true) != 1) ) {
        echo "<style>".of_get_option('style2', true)."</style>";
    }
    if ( ( ( get_theme_mod('inkzine_main_slider_enable') != 0 ) && (is_home() ) )
        || ( (get_theme_mod('inkzine_main_slider_enable') != 0 ) && (is_front_page() ) ) )
    { ?>
        <script>
            jQuery(document).ready(function(){
                jQuery('#slider').bxSlider( {
                    mode: 'horizontal',
                    captions: true,
                    minSlides: 1,
                    maxSlides: 1,
                    auto: true,
                    preloadImages: 'all',
                    nextText: '<i class="fa fa-angle-right"></i>',
                    prevText: '<i class="fa fa-angle-left"></i>',
                    autoHover: true } );
            });

        </script>
    <?php }
    if ( get_header_image() ) :
        echo "<style>#parallax-bg { background: url('".get_header_image()."') center top repeat-x; }</style>";
    endif;
    if ( get_theme_mod('inkzine_custom_footer', true) != 0 ) {
        echo "<style>#colophon .sep { display: none; }</style>";
    }
}
add_action('wp_head', 'inkzine_custom_head_codes');




function inkzine_pagination() {
    global $wp_query;
    $big = 12345678;
    $page_format = paginate_links( array(
        'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
        'format' => '?paged=%#%',
        'current' => max( 1, get_query_var('paged') ),
        'total' => $wp_query->max_num_pages,
        'type'  => 'array'
    ) );
    if( is_array($page_format) ) {
        $paged = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged');
        echo '<div class="pagination"><div><ul>';
        echo '<li><span>'. $paged . ' of ' . $wp_query->max_num_pages .'</span></li>';
        foreach ( $page_format as $page ) {
            echo "<li>$page</li>";
        }
        echo '</ul></div></div>';
    }
}


/*
** Customizer Controls 
*/
if (class_exists('WP_Customize_Control')) {
    class inkzine_WP_Customize_Category_Control extends WP_Customize_Control {
        /**
         * Render the control's content.
         */
        public function render_content() {
            $dropdown = wp_dropdown_categories(
                array(
                    'name'              => '_customize-dropdown-categories-' . $this->id,
                    'echo'              => 0,
                    'show_option_none'  => __( '&mdash; Select &mdash;', 'inkzine' ),
                    'option_none_value' => '0',
                    'selected'          => $this->value(),
                )
            );

            $dropdown = str_replace( '<select', '<select ' . $this->get_link(), $dropdown );

            printf(
                '<label class="customize-control-select"><span class="customize-control-title">%s</span> %s</label>',
                $this->label,
                $dropdown
            );
        }
    }
}

if ( class_exists('WP_Customize_Control') && class_exists('woocommerce') ) {
    class inkzine_WP_Customize_Product_Category_Control extends WP_Customize_Control {
        /**
         * Render the control's content.
         */
        public function render_content() {
            $dropdown = wp_dropdown_categories(
                array(
                    'name'              => '_customize-dropdown-categories-' . $this->id,
                    'echo'              => 0,
                    'show_option_none'  => __( '&mdash; Select &mdash;', 'inkzine' ),
                    'option_none_value' => '0',
                    'taxonomy'          => 'product_cat',
                    'selected'          => $this->value(),
                )
            );

            $dropdown = str_replace( '<select', '<select ' . $this->get_link(), $dropdown );

            printf(
                '<label class="customize-control-select"><span class="customize-control-title">%s</span> %s</label>',
                $this->label,
                $dropdown
            );
        }
    }
}
if (class_exists('WP_Customize_Control')) {
    class inkzine_WP_Customize_Upgrade_Control extends WP_Customize_Control {
        /**
         * Render the control's content.
         */
        public function render_content() {
            printf(
                '<label class="customize-control-upgrade"><span class="customize-control-title">%s</span> %s</label>',
                $this->label,
                $this->description
            );
        }
    }
}
if (class_exists('WP_Customize_Control')) {
    class WP_Customize_Upgrade_Control extends WP_Customize_Control {
        /**
         * Render the control's content.
         */
        public function render_content() {
            printf(
                '<label class="customize-control-upgrade"><span class="customize-control-title">%s</span> %s</label>',
                $this->label,
                $this->description
            );
        }
    }
}