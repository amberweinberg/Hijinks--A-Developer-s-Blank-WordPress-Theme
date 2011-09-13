<?php get_header(); ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
	<h2><?php the_title();?></h2>
	<?php the_content();?>
<?php endwhile; ?>

<?php comments_template(); ?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
