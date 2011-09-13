<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8"/>
		
		<title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>
		
		<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>"/>
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
		
		<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
		<?php wp_head(); ?>
	</head>
	
	<body <?php body_class(); ?>>
	
		<div id="header">
			<?php wp_nav_menu( array('menu' => 'Main', 'container' => false, )); ?>
		</div>
