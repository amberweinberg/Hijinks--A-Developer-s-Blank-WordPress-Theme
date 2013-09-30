		<footer></footer>
		
		<script src="<?php bloginfo('template_url');?>/js/plugins.js"></script>
		<script src="<?php bloginfo('template_url');?>/js/script.js"></script>
		
		<script> // Change UA-XXXXX-X to be your site's ID
		window._gaq = [['_setAccount','UAXXXXXXXX1'],['_trackPageview'],['_trackPageLoadTime']];
		Modernizr.load({
		  load: ('https:' == location.protocol ? '//ssl' : '//www') + '.google-analytics.com/ga.js'
		});
		</script>
		
		<!--[if lt IE 8 ]>
		  <script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
		  <script>window.attachEvent('onload',function(){CFInstall.check({mode:'overlay'})})</script>
		<![endif]-->
		
		<?php wp_footer(); ?>
	
	</body>
</html>
