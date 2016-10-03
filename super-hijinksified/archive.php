<?php get_header(); ?>

	<section class="blog-content">
		<div class="container">
		
			<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
				<div class="post">
					<h2><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
					<?php wpe_excerpt('wpe_excerptlength_index', 'wpe_excerptmore'); ?>
				</div>
			<?php endwhile; ?>
		</div>
	</section>
	
<?php get_sidebar(); ?>
<?php get_footer(); ?>
