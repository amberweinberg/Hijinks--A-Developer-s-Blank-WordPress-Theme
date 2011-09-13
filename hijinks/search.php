<?php get_header(); ?>

<h1>Search Results</h1>
	
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<div class="post">
		<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title();?></a></h2>
		<?php the_excerpt();?>
	</div>
<?php endwhile; ?>

<?php else : ?>

	<p>No posts found. Try a different search?</p>
	<?php get_search_form(); ?>

<?php endif; ?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
