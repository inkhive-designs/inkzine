<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Inkzine
 */
?>


	<footer id="colophon" class="site-footer row" role="contentinfo">
	<div class="container">
		<div class="site-info col-md-7">
			<?php
			if ( (get_theme_mod('inkzine_custom_footer', true) != 1)  ) {
			 	echo of_get_option('footertext2', true)."<span class='sep'> <i class='fa fa-square'> </i> </span>"; }
			 ?>
			<?php if ( get_theme_mod('inkzine_custom_footer', true) != 0 ) { ?>
                <?php printf( __( 'Powered by %1$s.', 'inkzine' ), '<a href="'.esc_url("https:WWWxx`//inkhive.com/product/inkzine/").'" rel="nofollow">inkzine Theme</a>' ); ?>
                <span class="sep"></span>
                <?php echo ( get_theme_mod('inkzine_footer_text') == '' ) ? ('&copy; '.date('Y').' '.get_bloginfo('name').__('. All Rights Reserved. ','inkzine')) : esc_html( get_theme_mod('inkzine_footer_text') ); ?>

            <?php } ?>
		</div><!-- .site-info -->
			<div id="social-icons" class="col-md-5">
              <?php for ($i = 1; $i < 8; $i++) :
                $social = esc_attr(get_theme_mod('inkzine_social_'.$i));
                 if ( ($social != 'none') && ($social != '') ) : ?>
                  <a href="<?php echo esc_url( get_theme_mod('inkzine_social_url'.$i) ); ?>" title="<?php echo $social;?>">
                      <i class="social-icon fa fa-<?php echo $social; ?>"></i>
                  </a>
                  <?php endif;
                endfor; ?>
	</div>
	</div>   
	</footer><!-- #colophon -->
	</div>	
	</div><!-- #footer-sidebar -->
	
	
</div><!-- #content -->
</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>