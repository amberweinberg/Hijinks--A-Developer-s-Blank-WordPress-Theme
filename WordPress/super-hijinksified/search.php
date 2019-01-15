<?php get_header(); ?>

	<article>
		<h1>Search Results for "<?php echo sanitize_text_field($s);?>"</h1>
		
		<ul>
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<li>
					<h2><a href="<?php the_permalink() ?>"><?php the_title();?></a></h2>
					<?php the_excerpt();?>
				</li>
			<?php endwhile; ?>
		</ul>
	
		<?php else : ?>
	
			<p>No posts found. Try a different search?</p>
	
		<?php endif; ?>
		
		<?php posts_nav_link();?>
	</article>

<?php get_footer(); ?>
