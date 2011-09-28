<?php get_header(); ?>
	
	<?php query_posts('pagename=home'); if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
		<?php  // put loop info here! ?>
	<?php endwhile; ?>

<?php get_footer(); ?>
