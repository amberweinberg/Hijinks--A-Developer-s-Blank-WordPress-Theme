<?php get_header(); ?>

	<section class="page-content search-results">
		<div class="container">
			<h1>Search Results for "<?php echo sanitize_text_field($s);?>"</h1>
			
			<?php if (have_posts()) { ?>
				<ul class="search-results">
					
					<?php while (have_posts()) : the_post(); ?>
				
						<li>
							<?php the_post_thumbnail( 'medium'); ?>
						
							<article>
								<h2><a href="<?php the_permalink() ?>"><?php the_title();?></a></h2>
								<?php the_excerpt();?>
								<p><a href="<?php the_permalink() ?>">Read More</a></p>
							</article>
						</li>
				
					<?php endwhile; ?>
				
				</ul>
		
			<?php } else { ?>
		
				<p>No posts found. Try a different search?</p>
				<?php get_search_form(); ?>
		
			<?php } ?>
		</div>
	</section>

<?php get_footer(); ?>