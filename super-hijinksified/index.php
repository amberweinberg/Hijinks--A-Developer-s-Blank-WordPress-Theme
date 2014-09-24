<?php get_header(); ?>
	
	<?php $query = new WP_Query('pagename=home'); if ( $query->have_posts() ) { while ( $query->have_posts() ) { $query->the_post(); ?>
		
		<!--HERO-->
		
		<section id="hero">
			<ul class="slides">
				
				<?php if( have_rows('slides') ): while ( have_rows('slides') ) : the_row(); ?>
				 
					<li style="background: url('<?php the_sub_field('slide_image'); ?>') no-repeat; background-size: cover;">
						<div class="container">
							<?php the_sub_field('slide_content'); ?>
						</div>
					</li>
				 
				<?php endwhile; endif; ?>
				
			</ul>
		</section>
		
		
	<?php } } wp_reset_postdata(); ?>

<?php get_footer(); ?>
