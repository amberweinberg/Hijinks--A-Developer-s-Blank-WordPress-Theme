<?php 
    // Template Name: Home
    get_header(); 
?>

	<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
	
	    <!--Hero-->
	    
	    <?php $url = wp_get_attachment_image_url( get_sub_field('hero_background_image'), 'xlarge' ); ?>
		
		<section class="hero" style="background-image: url('<?php echo $url;?>');">
    		<div class="container">
        		
    		</div>
		</section>
		
	<?php endwhile; ?>

<?php get_footer(); ?>
