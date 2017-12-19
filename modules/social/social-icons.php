<div id="social-icons-top" class="col-md-12">
    <?php for ($i = 1; $i < 8; $i++) :
    $social = get_theme_mod('inkzine_social_'.$i);
    if ( ($social != 'none') && ($social != '') ) : ?>
    <a href="<?php echo esc_url( get_theme_mod('inkzine_social_url'.$i) ); ?>">
        <img class = "social-style" src="<?php echo get_template_directory_uri()."/images/social/".$social.".png"; ?>">
    </a>
    <?php endif;

endfor; ?>
</div>