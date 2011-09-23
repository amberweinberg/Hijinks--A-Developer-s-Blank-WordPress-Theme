<!--[if IEMobile 7 ]><html class="no-js iem7" manifest="default.appcache?v=1"><![endif]-->
<!--[if lt IE 7 ]><html class="no-js ie6" lang="en"><![endif]-->
<!--[if IE 7 ]><html class="no-js ie7" lang="en"><![endif]-->
<!--[if IE 8 ]><html class="no-js ie8" lang="en"><![endif]-->
<!--[if (gte IE 9)|(gt IEMobile 7)|!(IEMobile)|!(IE)]><!--><html class="no-js" manifest="default.appcache?v=1" lang="en"><!--<![endif]-->

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8"/>
		
		<title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>
		
		<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>"/>
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
		
		<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
		<?php wp_head(); ?>
		
		 <meta name="viewport" content="width=device-width,initial-scale=1">

  		<script src="<?php bloginfo('template_url');?>/js/libs/modernizr-2.0.6.min.js"></script>
	</head>
	
	<body <?php body_class(); ?>>
	
		<header>
			<?php wp_nav_menu( array('menu' => 'Main', 'container' => false, )); ?>
		</header>
