<?php 
    // Template Name: Home
    get_header(); 
?>

	<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
	
	    <!--Hero-->
		
		<section id="hero">
    		<div class="container">
        		
    		</div>
		</section>
		
	<?php endwhile; ?>

<?php get_footer(); ?>
