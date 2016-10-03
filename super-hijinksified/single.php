<?php get_header(); ?>

	<article>
		<div class="container">
			<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
				<h1><?php the_title();?></h1>
				<?php the_content();?>
			<?php endwhile; ?>
		
			<?php comments_template(); ?>
		</div>
	</article>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
