<?php $url = wp_get_attachment_image_url( get_field('hero_background_image'), 'xlarge' ); ?>

<section class="page-hero" style="background-image: url('<?php echo $url;?>');">
	<div class="container">
		
		<h1><?php the_field('hero_heading');?></h1>
		
	</div>
</section>