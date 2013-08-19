<?php get_header(); ?>
	
	<?php $query = new WP_Query('pagename=home'); if ( $query->have_posts() ) { while ( $query->have_posts() ) { $query->the_post(); ?>
		<?php the_title();?>
	<?php } } wp_reset_postdata(); ?>

<?php get_footer(); ?>
