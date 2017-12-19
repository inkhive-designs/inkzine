<?php
if ( (get_theme_mod( 'inkzine_main_slider_enable' ))) {
    if ( ( get_theme_mod('inkzine_main_slider_count') != 0 ) && (is_home())  )
    {
        $count_x = $count = get_theme_mod('inkzine_main_slider_count');
        ?>
        <div class="slider-wrapper theme-default container">
            <div class="ribbon"></div>
            <div id="slider" class="nivoSlider">
                <?php
                $slider_flag = false;
                for ($i=1; $i<$count; $i++) {
                    $caption = get_theme_mod('inkzine_slide_title'.$i);
                    $url = get_theme_mod('inkzine_slide_url'.$i);

                    if ($caption != "" ) {
                        echo "<a href='".$url."'>
                        <img src='".get_theme_mod('inkzine_slide_img'.$i, true)."' title='".$caption."'></a>";
                        $slider_flag = true;
                    }
                }
                ?>
            </div>

            <?php ?>
        </div>
        <?php
    }
}
?>
