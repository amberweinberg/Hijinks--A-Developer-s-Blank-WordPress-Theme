<!doctype html>
<html>
	<head>
	  	<meta charset="utf-8">
	  	<meta name="viewport" content="width=device-width, initial-scale=1">
			
		<title><?php bloginfo('title') . wp_title(' | ');?></title>
		
		<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>"/>
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
		
		<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
		<?php wp_head(); ?>
	</head>
	
	<body <?php body_class(); ?>>
		
		<!--Header-->
	
		<header>
			<div class="container">
				<a class="logo" href="<?php bloginfo('url');?>"><img src="<?php bloginfo('template_url');?>/svgs/logo.svg" alt="<?php bloginfo('title');?>"/></a>
				
				<button class="mobile-menu">
					<i class="fas fa-bars"></i>
					<i class="fas fa-times"></i>
					<span class="accessibility">Menu</span>
				</button>
				
				<nav><?php wp_nav_menu( array('menu' => 'Main', 'container' => false, )); ?></nav>
			</div>
		</header>

		<!--Main Content-->
		
		<main>