<?php if (get_theme_mod('inkzine_showcase_enable_set') == true) { ?>
	</div>
	<div id="showcase">
	<div class="container">
	<?php
			// WP_Query arguments
			$qa = array (
				'post_type'              => 'post',
				'posts_per_page'		 => get_theme_mod('inkzine_showcase_count1'),
				'offset'				 => 0,
				'ignore_sticky_posts'    => 1,
				'cat'				     => get_theme_mod('inkzine_showcase_cat1')
	
			);
			
			// The Query
			$recent_articles = new WP_Query( $qa );
			if($recent_articles->have_posts()) : ?>
			<div class="showcase showcase-1 col-md-4 col-sm-4">
			<div class="sc-heading"><?php echo get_theme_mod('inkzine_showcase_title1') ?></div>
			<ul class="sc">
			<?php
				while($recent_articles->have_posts()) : 
				$recent_articles->the_post();
	         ?>
	         		 
			         <li class='sc-item'>
			         <?php if( has_post_thumbnail() ) : ?>
			         <div class='sc-thumb'><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbnail'); ?></a></div>
			         <?php 
			         else :
			         ?>
			         <div class='sc-thumb'><a href="<?php the_permalink(); ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/nthumb.png"></a></div>
			         <?php
			         endif; ?>	
			         <div class='sc-title'><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
			         <div class='sc-date'><?php the_time('M j, Y'); ?></div>
			         </li>      
			      
			<?php
			      endwhile;
			   else: 
			?>
			
			      Oops, there are no posts.
			
			<?php
			   endif;
			?>
			</ul>
			</div>
			
			<?php
			//Second Showcase
	
			// WP_Query arguments
			$qa = array (
				'post_type'              => 'post',
                'posts_per_page'		 => get_theme_mod('inkzine_showcase_count2'),
				'offset'				 => 0,
				'ignore_sticky_posts'    => 1,
                'cat'				     => get_theme_mod('inkzine_showcase_cat2')
	
			);
			
			// The Query
			$recent_articles = new WP_Query( $qa );
			if($recent_articles->have_posts()) : ?>
			<div class="showcase showcase-2 col-md-4 col-sm-4">
			<div class="sc-heading"><?php echo get_theme_mod('inkzine_showcase_title2')?></div>
			<ul class="sc">
			<?php
				while($recent_articles->have_posts()) : 
				$recent_articles->the_post();
	         ?>
	         		 
			         <li class='sc-item'>
			         <?php if( has_post_thumbnail() ) : ?>
			         <div class='sc-thumb'><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbnail'); ?></a></div>
			         <?php 
			         else :
			         ?>
			         <div class='sc-thumb'><a href="<?php the_permalink(); ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/nthumb.png"></a></div>
			         <?php
			         endif; ?>	
			         <div class='sc-title'><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
			         <div class='sc-date'><?php the_time('M j, Y'); ?></div>
			         </li>      
			      
			<?php
			      endwhile;
			   else: 
			?>
			
			      Oops, there are no posts.
			
			<?php
			   endif;
			?>
			</ul>
			</div>
			<?php
			
			//THIRD SHOWCASE
			
			// WP_Query arguments
			$qa = array (
				'post_type'              => 'post',
                'posts_per_page'		 => get_theme_mod('inkzine_showcase_count3'),
				'offset'				 => 0,
				'ignore_sticky_posts'    => 1,
                'cat'				     => get_theme_mod('inkzine_showcase_cat3')
	
			);
			
			// The Query
			$recent_articles = new WP_Query( $qa );
			if($recent_articles->have_posts()) : ?>
			<div class="showcase showcase-3 col-md-4 col-sm-4">
			<div class="sc-heading"><?php echo get_theme_mod('inkzine_showcase_title3')  ?></div>
			<ul class="sc">
			<?php
				while($recent_articles->have_posts()) : 
				$recent_articles->the_post();
	         ?>
	         		 
			         <li class='sc-item'>
			         <?php if( has_post_thumbnail() ) : ?>
			         <div class='sc-thumb'><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbnail'); ?></a></div>
			         <?php 
			         else :
			         ?>
			         <div class='sc-thumb'><a href="<?php the_permalink(); ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/nthumb.png"></a></div>
			         <?php
			         endif; ?>	
			         <div class='sc-title'><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
			         <div class='sc-date'><?php the_time('M j, Y'); ?></div>
			         </li>      
			      
			<?php
			      endwhile;
			   else: 
			?>
			
			      Oops, there are no posts.
			
			<?php
			   endif;
			?>
			</ul>
			</div>
	</div>
	</div><!--#showcase-->
	<div class="container">
<?php } ?>	