<header id="masthead" class="site-header row container" role="banner">
    <div class="site-branding col-md-12">
        <?php
            if ( function_exists( 'the_custom_logo' ) ) {
            the_custom_logo();
            }?>
        <div id="text-title-desc">
            <h1 class="site-title title-font"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
            <h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>

        </div>

    </div>
    <?php get_template_part('modules/social/social','icons'); ?>

</header><!-- #masthead -->