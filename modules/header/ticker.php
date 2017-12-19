<?php
if (get_theme_mod('inkzine_ticker_enable') && is_home())
    { ?>
        <div id="tickr-wrapper" class="col-md-12 clearfix">
            <div id="tickr-bg">
                <div class="tickr-inner-wrapper container">
                    <ul class="bxtickr">
                        <?php
                        $args = array( 'posts_per_page' => get_theme_mod('inkzine_ticker_count'), 'category' => get_theme_mod('inkzine_ticker_cat') );
                        $lastposts = get_posts( $args );
                        foreach ( $lastposts as $post ) :
                            setup_postdata( $post ); ?>
                            <li><a title="<?php the_title(); ?>" href='<?php the_permalink(); ?>'>
                                    <?php the_title(); ?>
                                </a></li>
                        <?php endforeach;
                        wp_reset_postdata();
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    <?php } ?>