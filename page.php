<?php get_header(); ?>

	<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
	
		<!--Page Hero-->
		
		<?php include_once('includes/page-hero.php');?>
		
		<!--Page Content-->
		
		<article class="page-content">
			<div class="container">
				<?php the_content();?>
			</div>
		</article>
		
	<?php endwhile; ?>

<?php get_footer(); ?>
